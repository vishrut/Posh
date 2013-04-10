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
$offerdetails = DB::query("SELECT * from offerdetails where offerid=%i",$_GET['offerid']);
$offerdetails = $offerdetails[0];
$transaction =  DB::query("SELECT * from transaction where transactionid=%i",$_GET['offerid']);
$transaction = $transaction[0];

if($transaction['status']=='started'){
if($offerdetails['buyer']!=$_SESSION['username']){
	DB::update('transaction', array(
  'status' => "sellerreportedincomplete",
  ), "transactionid=%i", $_GET['offerid']);
}
else{
	DB::update('transaction', array(
  'status' => "buyerreportedincomplete",
  ), "transactionid=%i", $_GET['offerid']);
}
}

elseif($transaction['status']=='buyerreportedincomplete'||$transaction['status']=='sellerreportedincomplete'){
	DB::update('transaction', array(
  'status' => "totalincomplete",
  ), "transactionid=%i", $_GET['offerid']);
}

elseif($transaction['status']=='buyerreportedcompleted'){
	DB::update('transaction', array(
  'status' => "bcsi",
  ), "transactionid=%i", $_GET['offerid']);
}

elseif($transaction['status']=='sellerreportedcompleted'){
	DB::update('transaction', array(
  'status' => "bisc",
  ), "transactionid=%i", $_GET['offerid']);
}

if($offerdetails['buyer']==$_SESSION['username'])
		$targetuser = DB::query("SELECT * from users where username=%s",$offerdetails['seller']);
else
		$targetuser = DB::query("SELECT * from users where username=%s",$offerdetails['buyer']);

$targetuser = $targetuser[0];
$newrating = $targetuser['rating']*$targetuser['ratingno']/($targetuser['ratingno']+1);	
$ratingno = $targetuser['ratingno']+1;

DB::update('users', array(
  'rating' => $newrating,
  'ratingno' =>  $ratingno
  ), "username=%s", $targetuser['username']);

$offerid = $_GET['offerid'];
  header("location:../addnotification.php?type=transaction&offerid=$offerid");
?>