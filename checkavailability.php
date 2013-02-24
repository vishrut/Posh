<?php
	require_once 'dbconnect.php';
	$username = $_GET["q"];
	
	$tbl_name="users";

	//$sql="SELECT * FROM $tbl_name WHERE username='$username'";
	//$result=mysql_query($sql);

	$result = DB::query("SELECT * FROM $tbl_name WHERE username=%s", $username);
	
	// Mysql_num_row is counting table row
	$count=0;
	
	foreach ($result as $row) {
		$count = $count + 1;
	}
	
	if($count==0)
		echo "Available!";
	else
		echo "Unavailable :(";

?>
