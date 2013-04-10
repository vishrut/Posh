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

$lastofferid = $_GET['offerid'];

if(isset($_SESSION['swap1'])){
	DB::update('offerdetails', array(
  'offereditem1' => $_SESSION['swap1']
  ), "offerid=%i", $lastofferid);
	unset($_SESSION['swap1']);
}

else{
	DB::update('offerdetails', array(
  'offereditem1' => NULL
  ), "offerid=%i", $lastofferid);
}

if(isset($_SESSION['swap2'])){
	DB::update('offerdetails', array(
  'offereditem2' => $_SESSION['swap2']
  ), "offerid=%i", $lastofferid);
	unset($_SESSION['swap2']);
}
else{
	DB::update('offerdetails', array(
  'offereditem2' => NULL
  ), "offerid=%i", $lastofferid);
}

if(isset($_SESSION['swap3'])){
	DB::update('offerdetails', array(
  'offereditem3' => $_SESSION['swap3']
  ), "offerid=%i", $lastofferid);
	unset($_SESSION['swap3']);
}
else{
	DB::update('offerdetails', array(
  'offereditem3' => NULL
  ), "offerid=%i", $lastofferid);
}

if(isset($_SESSION['swap4'])){
	DB::update('offerdetails', array(
  'offereditem4' => $_SESSION['swap4']
  ), "offerid=%i", $lastofferid);
	unset($_SESSION['swap4']);
}
else{
	DB::update('offerdetails', array(
  'offereditem4' => NULL
  ), "offerid=%i", $lastofferid);
}

//put this up on all pages that can be accessed from editofferswap
if(isset($_SESSION['firsttime']))
unset($_SESSION['firsttime']);

$offerid  = $_GET['offerid'];
header("location:../addnotification.php?type=editoffer&offerid=$offerid");
?>
