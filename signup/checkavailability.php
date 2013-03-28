<?php
	require_once '../dbconnect.php';
	$username = $_GET["q"];
	
	$tbl_name="users";

	$result = DB::query("SELECT * FROM $tbl_name WHERE username=%s", $username);
	
	// Counting table rows
	$count=0;
	foreach ($result as $row) {
		$count = $count + 1;
	}
	
	if($count==0)
		echo "Available!";
	else
		echo "Unavailable :(";

?>
