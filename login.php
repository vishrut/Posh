﻿<?php
	session_start();
	require_once 'dbconnect.php';

	// username and password sent from form
	$myusername=$_POST['username'];
	$mypassword=$_POST['password'];
	
	// To protect MySQL injection
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);	
	//$myusername = mysql_real_escape_string($myusername);
	//$mypassword = mysql_real_escape_string($mypassword);

	$tbl_name="users";

	//$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
	//$result=mysql_query($sql);
	
	$result = DB::query("SELECT * FROM $tbl_name WHERE username=%s and password=%s", $myusername, $mypassword);


	// Mysql_num_row is counting table row
	//$count=mysql_num_rows($result);
	$count = 0;
	foreach ($result as $row) {
		$count = $count + 1;
	}

	
	// Session variables
	// username | loginfailed 	|	action
	// ---------------------------------------------------------------
	// set		| 	0			|	login_success
	// set		| 	1			|	never occurs
	// not set  | 	0			|	no login, no messages/errors
	// not set  | 	1			|	no login, display messages/errors
	
	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1){
		// Register $username and redirect to file "login_success.php"
		$_SESSION['username'] = $myusername;
		$_SESSION['loginfailed'] = 0;
		echo $_SESSION['username'];
		header("location:login_success.php");
	}
	else {
		$_SESSION['loginfailed'] = 1;
		header("location:index.php");
	}

	//mysql_close($con);
?> 