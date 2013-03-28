<?php
	require_once '../dbconnect.php';
	$sid = $_GET["q"];
	
	$tbl_name="users";

	$result = DB::query("SELECT * FROM $tbl_name WHERE studentid=%s", $sid);
	
	// Counting table rows
	$count=0;
	foreach ($result as $row) {
		$count = $count + 1;
	}
	
	if($count==0)
		echo "Available!";
	else
		echo "Preregistered";

?>
