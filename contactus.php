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

?>
<html lang="en">
  <head>
  <script src="validation.js"></script>
 
	<meta charset="utf-8">
    <title>Posh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/docs.css" rel="stylesheet">

    <style type="text/css">
		body {
			padding-top: 40px;
		}


	#container
	{
		padding:auto;
		margin:auto;
		width:700px; 
		overflow:auto;
		
		}


    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	
	</head>

	<body>
	
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container" style="width: auto; padding: 0 20px;">
					<a class="brand" href="#">Posh</a>
					<ul class="nav pull-right">
						<li><a href="search/searchhome.php">Search</a></li>
						<li><a href="manageoffers/listoffersbyme.php">Offers & Transactions</a></li>
						<li><a href="inventory/viewitems.php">Sell/Edit Item</a></li>
						<li class="active"><a href="helpcenter.php">Help Center</a></li>
						<li ><a href="userdetails.php">My Account</a></li>
						<li><a href="login/logout.php">Log Out</a></li>
					</ul>
				</div>
			</div>	
		</div>
        <div class="container" style="width: auto; padding: 20px 0px 0px 0px;">
			<div class="span3 bs-docs-sidebar">
				<ul class="nav nav-list bs-docs-sidenav">
					
					<li><a href="helpcenter.php"><i class="icon-chevron-right"></i>FAQs</a></li>
                    <li ><a href="reportabuse.php"><i class="icon-chevron-right"></i>Report Abuse</a></li>
                    <li  class="active"><a href="contactus.php"><i class="icon-chevron-right"></i>Contact us</a></li>
				</ul>
			</div>
        	<div class="span9">
			<h1>Contact Us</h1 >         
         	<p><b>contactposhwebsite@gmail.com</b>


         
                    	
                    
            </div>     
        </div> 
            
             
       <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>      
           
        </body>
        </html>
        
        