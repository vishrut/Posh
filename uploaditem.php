﻿<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['username'])){
	$_SESSION['loginfailed'] = 1;
	header("location:index.php");
}

require_once 'dbconnect.php';

$allowedExts = array("gif", "jpeg", "jpg", "png");

$extension = end(explode(".", $_FILES["file"]["name"]));

$randomprefix = mt_rand(0,100000);
$filename = $randomprefix.$_FILES["file"]["name"];

if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 2000000)
	&& in_array($extension, $allowedExts)){
		if ($_FILES["file"]["error"] > 0){
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
		else{
			echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			echo "Type: " . $_FILES["file"]["type"] . "<br>";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
			
			if (file_exists("upload/" . $filename)){
				echo $filename . " already exists. ";
			}
			
			else{
				move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $filename);
				echo "Stored in: " . "upload/" . $filename;
			}
		}
	}
	
else{
	$_SESSION['invalidfile'] = 1;
	header("location:sellitem.php");
}

$tbl_name="inventory";
	
DB::insert($tbl_name, array(
		'owner' => $_SESSION['username'],
		'itemname' =>  $_POST['itemname'],
		'category' => $_POST['category'],
		'pricetag' => $_POST['pricetag'],
		'description' => $_POST['description'],
		'condition' => $_POST['condition'],
		'image' => $filename
));


?> 