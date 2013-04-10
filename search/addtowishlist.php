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

DB::delete('wishlist', "username=%s and itemid=%i", $_SESSION['username'], $_GET['itemid']);
DB::insert('wishlist', array(
  'username' =>$_SESSION['username'],
  'itemid' =>  $_GET['itemid']
));
	header("location:searchhome.php");
?>