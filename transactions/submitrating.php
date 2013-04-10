<!DOCTYPE html>
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['username'])){
	$_SESSION['loginfailed'] = 1;
	header("location:../index.php");
}

require_once("../dbconnect.php");

$userdetails = DB::query("SELECT * from users where username=%s",$_GET['targetuser']);
$userdetails = $userdetails[0];
$oldrating = $userdetails['rating'];
$ratingno = $userdetails['ratingno'] + 1;
$newrating = ($oldrating*($ratingno-1) + $_GET['rating'])/$ratingno;

$offerdetails = DB::query("SELECT * from offerdetails where offerid=%i",$_GET['offerid']);
$offerdetails = $offerdetails[0];

$transaction =  DB::query("SELECT * from transaction where transactionid=%i",$_GET['offerid']);
$transaction = $transaction[0];

if($transaction['status']=='started'){
if($offerdetails['buyer']!=$_SESSION['username']){
			echo "sellerreportedcompleted";

	DB::update('transaction', array(
  'status' => "sellerreportedcompleted",
  ), "transactionid=%i", $_GET['offerid']);
}
else{
				echo "buyerreportedcompleted";

	DB::update('transaction', array(
  'status' => "buyerreportedcompleted",
  ), "transactionid=%i", $_GET['offerid']);
}
}

elseif($transaction['status']=="buyerreportedcompleted"||$transaction['status']=="sellerreportedcompleted"){
		echo "totalcompleted";

	DB::update('transaction', array(
  'status' => "totalcompleted",
  ), "transactionid=%i", $_GET['offerid']);
}

elseif($transaction['status']=='buyerreportedincomplete'){
		echo "bisc";

	DB::update('transaction', array(
  'status' => "bisc",
  ), "transactionid=%i", $_GET['offerid']);
}

elseif($transaction['status']=='sellerreportedincomplete'){
	echo "bcsi";
	DB::update('transaction', array(
  'status' => "bcsi",
  ), "transactionid=%i", $_GET['offerid']);
}



DB::update('users', array(
  'rating' => $newrating,
  'ratingno' =>  $ratingno
  ), "username=%s", $_GET['targetuser']);

echo $transaction['status'];
	$offerid = $_GET['offerid'];
	header("location:../addnotification.php?type=transaction&offerid=$offerid");


?>