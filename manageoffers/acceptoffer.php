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

$offer = DB::query("select * from offerdetails where offerid=%i", $_GET['offerid']);
$offer = $offer[0]; 

DB::update('offerdetails', array(
  'accepted' => 1
  ), "offerid=%i", $_GET['offerid']);

DB::insert('transaction', array(
  'transactionid' => $_GET['offerid'],
  'status' => 'started'
));

DB::delete('offerdetails', "sellingitem=%i AND accepted=0", $offer['sellingitem']);

$offerid = $_GET['offerid'];
header("location:../addnotification.php?type=acceptoffer&offerid=$offerid");

?>