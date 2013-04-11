<?php
//Database=poshdb;Data Source=ap-cdbr-azure-east-a.cloudapp.net;User Id=b70d55a676a5fc;Password=7bea5405
	$location = "poshdb.sql";
	$con = mysql_connect("localhost","root","root");
	
	if (!$con){
		die('Could not connect: ' . mysql_error());
	};

	// Create database
	if (mysql_query("CREATE DATABASE poshdb",$con)){
		echo "Database created";
	}
	else{
		echo "Error creating database: " . mysql_error();
	};

	//Select database
	mysql_select_db("poshdb", $con);

    //load file
    $commands = file_get_contents($location);

    //delete comments
    $lines = explode("\n",$commands);
    $commands = '';
    foreach($lines as $line){
        $line = trim($line);
        if( $line && !startsWith($line,'--') ){
            $commands .= $line . "\n";
        }
    }

    //convert to array
    $commands = explode(";", $commands);

    //run commands
    $total = $success = 0;
    foreach($commands as $command){
        if(trim($command)){
            $success += (@mysql_query($command)==false ? 0 : 1);
            $total += 1;
        }
    }

    //return number of successful queries and total number of queries found
    return array(
        "success" => $success,
        "total" => $total
    );
	
	function startsWith($haystack, $needle)
	{
		return !strncmp($haystack, $needle, strlen($needle));
	}

?>