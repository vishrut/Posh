<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['username'])){
	$_SESSION['loginfailed'] = 1;
	header("location:index.php");
}

$reporter = $_SESSION['username'];
$abuser = $_POST['firstname'];
$details = $_POST['complain'];
require_once 'dbconnect.php';
DB::insert('reportabuse', array(
  'reporter' => $reporter,
  'abuser' => $abuser,
  'details' => $details
));

header("location:reportabuse.php");

?>
 
        
  
        
        