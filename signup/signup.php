<?php
	session_start();
	require_once '../dbconnect.php';
	
	// username and password sent from form
	$myusername=$_POST['username'];
	$mypassword=$_POST['password'];
	$myemail=$_POST['email'];
	$mystudentid=$_POST['studentid'];
	$myfirstname=$_POST['firstname'];
	$mylastname=$_POST['lastname'];
	$mywing=$_POST['wing'];
	$myroomno=$_POST['roomno'];
	$myrating = 5;

	$tbl_name="users";
	
	DB::insert($tbl_name, array(
			'username' => $myusername,
			'password' => $mypassword,
			'studentid' => $mystudentid,
			'email' => $myemail,
			'firstname' => $myfirstname,
			'lastname' => $mylastname,
			'wing' => $mywing,
			'roomno' => $myroomno,
			'rating' => $myrating,
			'confirmed' => '0'
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
		//$_SESSION['username'] = $myusername;
		//$_SESSION['loginfailed'] = 0;
		
		
		//Comment out if response time exceeds 30s
		//Sendgrid for e-mail authentication
		/*
		$ch = curl_init();
		$confirmlink = "localhost/Posh/confirmemail?q=".$myusername;
		$content = "Hi,%20%20Welcome%20to%20Posh!%20%20Please%20click%20the%20link%20below%20to%20activate%20your%20account.".$confirmlink."%20%20Happy%20Poshing!";
		$to = $_POST['email'];	
		$url="http://sendgrid.com/api/mail.send.json?to=".$to."&from=no-reply@posh.com&subject=Posh%20Welcomes%20You!&text=".$content."&api_user=vrp101&api_key=rbhalchandrap";
		curl_setopt($ch, CURLOPT_URL, $url);
        $output = curl_exec($ch);    
        curl_close($ch);
        */
		//end of sendgrid script
		
		
$mystudentid=$_POST['studentid'];
$items = DB::query("SELECT * FROM users WHERE studentid=%s",$mystudentid);
$email = $mystudentid.'@daiict.ac.in';

foreach($items as $item){
     $random = mt_rand(0,1000);
     DB::query("UPDATE users SET random = %d WHERE studentid=%s",$random ,$mystudentid);
$username = $item['username'];
$password = $item['password'];
$link = 'http://localhost/posh/validate.php?q='.$username.'&v='.$random ;
require("../PHPMailer_5.2.1/class.phpmailer.php"); // path to the PHPMailer class
 
          $mail = new PHPMailer();  
          //$mail->SMTPDebug = 2 ;
          $mail->IsSMTP();  // telling the class to use SMTP
          $mail->Mailer = "smtp";
          $mail->SMTPSecure = "ssl";
          $mail->Host = "smtp.gmail.com";
          $mail->Port = 465;
          $mail->SMTPAuth = true; // turn on SMTP authentication
          $mail->Username = "contactposhwebsite"; // SMTP username
          $mail->Password = "cryptograph"; // SMTP password 
           
          $mail->From ="contactposhwebsite@gmail.com";
          $mail->FromName ="Aman Jain";
          $mail->AddAddress($email," ");  
          
           
          $mail->Subject  = "Validate Account";
          $mail->Body     = "Dear User\n"."\nYour Username is: ".$username."\nPlease Click on the link below to validate = ".$link."  "."\n\nThank You .";
          
          $mail->WordWrap = 42;  
          if(!$mail->Send()) {
          echo 'Message was not sent.';
          echo 'Mailer error: ' . $mail->ErrorInfo;
          echo '<p><a href="../index.php">Please connect to the internet and try again</a></p>';
          DB::delete('users', "username=%s", $myusername);
          } else {
                     echo '<p><a href="../index.php">Confirmation mail has been sent to your webmail account, Go Back to Posh</a></p>';
          }
          
      }	}
	
	else {
		$_SESSION['loginfailed'] = 1;
		header("location:../index.php");
	}
	
?> 