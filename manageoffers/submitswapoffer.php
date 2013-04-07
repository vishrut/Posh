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

require_once '../dbconnect.php';

$item = DB::queryFirstRow("SELECT * FROM inventory WHERE itemid=%s", $_GET['sellingitem']);

DB::insert('offerdetails', array(
  'buyer' => $_SESSION['username'],
  'seller' => $item['owner'],
  'ssr' => 'swap',
  'sellingitem' => $item['itemid']
));

$lastofferid=DB::insertID();

if(isset($_SESSION['swap1'])){
	DB::update('offerdetails', array(
  'offereditem1' => $_SESSION['swap1']
  ), "offerid=%i", $lastofferid);
	unset($_SESSION['swap1']);
}

if(isset($_SESSION['swap2'])){
	DB::update('offerdetails', array(
  'offereditem2' => $_SESSION['swap2']
  ), "offerid=%i", $lastofferid);
	unset($_SESSION['swap2']);
}

if(isset($_SESSION['swap3'])){
	DB::update('offerdetails', array(
  'offereditem3' => $_SESSION['swap3']
  ), "offerid=%i", $lastofferid);
	unset($_SESSION['swap3']);
}

if(isset($_SESSION['swap4'])){
	DB::update('offerdetails', array(
  'offereditem4' => $_SESSION['swap4']
  ), "offerid=%i", $lastofferid);
	unset($_SESSION['swap4']);
}
?>
