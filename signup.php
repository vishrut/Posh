<?php
	session_start();
	require_once 'dbconnect.php';
	
	// username and password sent from form
	$myusername=$_POST['username'];
	$mypassword=$_POST['password'];
	
	// To protect MySQL injection
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);	

	$tbl_name="users";
	
	DB::insert($tbl_name, array(
			'username' => $myusername,
			'password' => $mypassword
	));
	
	$result = DB::query("SELECT * FROM $tbl_name WHERE username=%s and password=%s", $myusername, $mypassword);

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
		
		/*
		//Comment out if response time exceeds 30s
		$ch = curl_init();
		$to = $_POST['email'];	$url="http://sendgrid.com/api/mail.send.json?to=".$to."&from=no-reply@posh.com&subject=PoshWelcomesYou!&text=HellosAndWelcomeToPosh!&api_user=vrp101&api_key=rbhalchandrap";
		curl_setopt($ch, CURLOPT_URL, $url);
        $output = curl_exec($ch);    
        curl_close($ch);
		*/
		
		header("location:login_success.php");
	}
	
	else {
		$_SESSION['loginfailed'] = 1;
		header("location:index.php");
	}
?> 