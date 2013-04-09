<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['username'])){
	$_SESSION['loginfailed'] = 1;
	header("location:../index.php");
}

$remove = $_GET['q'];
$selling = $_GET['selling'];

if($remove=='swap1')
	unset($_SESSION['swap1']);
elseif($remove=='swap2')
	unset($_SESSION['swap2']);
elseif($remove=='swap3')
	unset($_SESSION['swap3']);
elseif($remove=='swap4')
	unset($_SESSION['swap4']);

$_SESSION['firsttime']=0;
$offerid=$_SESSION['offerid'];
header("location:editofferswap.php?offerid=$offerid");
?>