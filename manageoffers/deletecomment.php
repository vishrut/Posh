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

DB::delete('comments', "commentid=%s", $_GET['commentid']);

$prev = $_GET['prev'];
if ($prev=='viewtransswap') {
	$offerid = $_GET['offerid'];
	header("location:../transactions/viewtransswap.php?offerid=$offerid");
}
elseif ($prev=='viewtransrent') {
	$offerid = $_GET['offerid'];
	header("location:../transactions/viewtransrent.php?offerid=$offerid");
	
}
elseif ($prev=='viewtranssell') {
	$offerid = $_GET['offerid'];
	header("location:../transactions/viewtranssell.php?offerid=$offerid");
	# code...
}
else
header("location:$prev");

?>