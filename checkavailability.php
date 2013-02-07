<?php
	include 'dbconnect.php';
	$username = $_GET["q"];
	
	$tbl_name="users";

	$sql="SELECT * FROM $tbl_name WHERE username='$username'";
	$result=mysql_query($sql);

	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);
	
	if($count==0)
		echo "Available!";
	else
		echo "Unavailable :(";

?>
