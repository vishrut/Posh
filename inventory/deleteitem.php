<!DOCTYPE html>
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['username'])){
	$_SESSION['loginfailed'] = 1;
	header("location:index.php");
}

require_once '../dbconnect.php';

$deleteitemid = $_GET['q'];

DB::delete('inventory', "itemid=%s", $deleteitemid);
header("location:viewitems.php");


?>