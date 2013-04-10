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
	$myusername=$_SESSION['username'];
	$myemail=$_POST['email'];
	$myfirstname=$_POST['firstname'];
	$mylastname=$_POST['lastname'];
	$mywing=$_POST['Wing'];
	$myroomno=$_POST['roomno'];
	

	$tbl_name="users";
	
	
	
	DB::query( "UPDATE users SET 
			
			email = '$myemail',
			firstname = '$myfirstname',
			lastname = 'abcd',
			wing = '$mywing',
			roomno = '$myroomno'
	 where username= '$myusername'");
	
	
//echo 'abcd';
		header("location:userdetails.php");
	
	
	
?> 