<!DOCTYPE html>
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

//session_set_cookie_params(0);
//session_start();
//if (!isset($_SESSION['username'])){
//	$_SESSION['loginfailed'] = 1;
//	header("location:index.php");
//}

require_once 'dbconnect.php';

$mystudentid=$_POST['studentid2'];
$items = DB::query("SELECT * FROM users WHERE studentid=%s",$mystudentid);
$email = $mystudentid.'@daiict.ac.in';

foreach($items as $item){
$username = $item['username'];
$password = $item['password'];
require("PHPMailer_5.2.1/class.phpmailer.php"); // path to the PHPMailer class
 
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
          
           
          $mail->Subject  = "Forgot Password";
          $mail->Body     = "Dear User\n"."\nYour Username is: ".$username."  "."\nPassword:".$password."."."  "."\n\nThank You .";
          
          $mail->WordWrap = 42;  
          if(!$mail->Send()) {
          echo 'Message was not sent.';
          echo 'Mailer error: ' . $mail->ErrorInfo;
          echo '<p><a href="index.php">Please connect to the internet and try again</a></p>';
          } else {
                     echo '<p><a href="index.php">Password sent to your webmail account, Go Back to Posh</a></p>';
                    $error="Your password has been sent to your registered email id.";
          }


          
      }




?>