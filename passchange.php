<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['username'])){
	$_SESSION['loginfailed'] = 1;
	header("location:../index.php");
}

?>
<?php
	
	require_once 'dbconnect.php';
	
	// username and password sent from form
	//$myusername=$_POST['username'];
	$mypassword=$_POST['password'];
	//$myemail=$_POST['email'];
	//$mystudentid=$_POST['studentid'];
	//$myfirstname=$_POST['firstname'];
	//$mylastname=$_POST['lastname'];
	//$mywing=$_POST['wing'];
	//$myroomno=$_POST['roomno'];
	//$myrating = 5;

	$tbl_name="users";
	
	DB::query( "UPDATE users SET password = '$mypassword' where username=%s",$_SESSION['username']);
		header("location:userdetails.php");
		
?> 