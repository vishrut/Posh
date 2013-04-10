<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

//session_set_cookie_params(0);
//session_start();
//if (!isset($_SESSION['username'])){
//	$_SESSION['loginfailed'] = 1;
//	header("location:../index.php");
//}

?>
<?php
	
	require_once 'dbconnect.php';
	
	$username= $_GET['q'];
	$random= $_GET['v'];

	$tbl_name="users";
	
	$randomno = DB::query( "SELECT * FROM users where username= %s",$username);
	$randomno = $randomno[0];
	$randomno = $randomno['random'];
	if($randomno == $random)
	{
		echo 'Validation successful';
		echo '<p><a href="index.php">Account validated, Go Back to Posh and log in</a></p>';
		DB::query( "UPDATE users SET confirmed = '1' where username= %s",$username);
	}
	else
		echo 'validate again';
	;
		
?> 