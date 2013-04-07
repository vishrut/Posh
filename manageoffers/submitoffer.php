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

$item = DB::queryFirstRow("SELECT * FROM inventory WHERE itemid=%s", $_POST['sellingitem']);

if(isset($_POST['buyoffer'])){
	DB::insert('offerdetails', array(
	  'buyer' => $_SESSION['username'],
	  'seller' => $item['owner'],
	  'ssr' => 'sell',
	  'sellingitem' => $item['itemid'],
	  'cash'  => $_POST['amount']
	));
}

else
	print_r($_POST);

?>
