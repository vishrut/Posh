<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['username'])){
	$_SESSION['loginfailed'] = 1;
	header("location:../index.php");
}

$itemid=$_GET['itemid'];
$selling=$_GET['selling'];
			
if(!isset($_SESSION['swap1']))
	$_SESSION['swap1']=$itemid;
elseif(!isset($_SESSION['swap2']))
	$_SESSION['swap2']=$itemid;
elseif(!isset($_SESSION['swap3']))
	$_SESSION['swap3']=$itemid;
elseif(!isset($_SESSION['swap4']))
	$_SESSION['swap4']=$itemid;
				
header("location:makeofferswap.php?itemid=$selling");
			

?>