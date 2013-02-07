<?php
	$con = mysql_connect("ap-cdbr-azure-east-a.cloudapp.net","b8357f36e71242","ce7c4d24");
	//$con = mysql_connect("localhost","root","root");

	if (!$con){
		die('Could not connect: ' . mysql_error());
	};

	// Create database
	/*
	if (mysql_query("CREATE DATABASE posh",$con)){
		echo "Database created";
	}
	else{
		echo "Error creating database: " . mysql_error();
	};
	*/

	//Select database
	mysql_select_db("posh", $con);
	
	// Create table
	/*
	$sql = "CREATE TABLE users ( 
		id int(4) NOT NULL auto_increment,
		username varchar(65) NOT NULL default '',
		password varchar(65) NOT NULL default '',
		PRIMARY KEY (id),
		UNIQUE(username)
	)";

	mysql_query($sql);

	// Test entry for development
	$sql = "INSERT INTO users VALUES (1, 'john', '1234');";

	// Execute query
	mysql_query($sql);
	*/
	
?>	