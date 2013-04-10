<?php
//Database=poshdb;Data Source=ap-cdbr-azure-east-a.cloudapp.net;User Id=b70d55a676a5fc;Password=7bea5405

	require_once 'meekrodb.2.1.class.php';

	
	//cosmo, simplex, cerulean, spacelab
	
	DB::$host = 'ap-cdbr-azure-east-a.cloudapp.net';
	DB::$user = 'b70d55a676a5fc';
	DB::$password = '7bea5405';
	DB::$dbName = 'poshdb';

	/* 
	//For first-time setup, please uncomment the block and execute the file. Once completed, re-comment the block.
	
	//Connect to Database
	$con = mysql_connect("ap-cdbr-azure-east-a.cloudapp.net","b8357f36e71242","ce7c4d24");

	if (!$con){
		die('Could not connect: ' . mysql_error());
	};

	// Create database
	if (mysql_query("CREATE DATABASE posh",$con)){
		echo "Database created";
	}
	else{
		echo "Error creating database: " . mysql_error();
	};

	//Select database
	mysql_select_db("posh", $con);
	
	// Create table
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
	mysql_query($sql);
	
	*/
?>	
