<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['username'])){
	$_SESSION['loginfailed'] = 1;
	header("location:../index.php");
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
	<script>
				
		function submitQuery(){
			var query = $("#query").val();
			var url = "wishlist.php?query="+query;
			var uri = encodeURI(url);	
			$(location).attr('href',uri);
		}
	</script>
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
						<li><a href="helpcenter.php">Help Center</a></li>
						<li class="active"><a href="userdetails.php">My Account</a></li>
						<li><a href="login/logout.php">Log Out</a></li>
					</ul>
				</div>
			</div>	
		</div>
        <div class="container" style="width: auto; padding: 20px 0px 0px 0px;">
			<div class="span3 bs-docs-sidebar">
				<ul class="nav nav-list bs-docs-sidenav">
					<li ><a href="userdetails.php"><i class="icon-chevron-right"></i>Profile</a></li>
                    <li class="active"><a href="wishlist.php"><i class="icon-chevron-right"></i>My Wishlist</a></li>
                    <li><a href="viewnotifications.php"><i class="icon-chevron-right"></i>New Notifications</a></li>
					<li ><a href="previousnotifications.php"><i class="icon-chevron-right"></i>Previous Notifications</a></li>
				</ul>
			</div>
        <div class="span9">
			
            
         <?php   
         
		 require_once 'dbconnect.php';
		 	
		 
		 if(isset($_SESSION['username'])){
				
				$tbl_name = "users";
				$items = DB::query("SELECT * from wishlist natural join inventory where username=%s",$_SESSION['username']);
				$counter = 0;
				
				foreach($items as $item){
				if($counter!=0 && $counter%4==0){
				echo '</ul>';
				echo '</div>';
				echo '<div class="row-fluid">';
				echo '<ul class="thumbnails">';
			}
				echo '<li class="span3">';
				echo '<div class="thumbnail">';
				echo '<img src="upload/'.$item['image'].'" alt="">';
				echo '<div class="caption">';
				echo '<h3>'.$item['itemname'].'</h3>';
				echo '<p>Owner: '.$item['owner'].'</p>';
				echo '<p>Category: '.$item['category'].'</p>';
				echo '<p>'.$item['description'].'</p>';
				 
				echo '<button onclick="showConfirmation('.$item["itemid"].')" class="btn btn-danger">Remove</button></p>';
				echo '</div>';
				echo '</div>';
				echo '</li>';
				$counter=$counter+1;
			}
			
			echo '</ul>';
			echo '</div>';
			echo '</div>';


				}
			else echo 'Enter correct id'
		 ?> 
         
         <script type="text/javascript">function showConfirmation(targetitemid){
		var x;
		var r=confirm("Are you sure you want to delete this item?");
		if (r==true)
		  {
			//$.get('deleteitem.php', { q: targetitemid } );
			var url = "deleteitem.php?q="+targetitemid;    
			$(location).attr('href',url);
		  }
		else
		  {
		  }
		}
        </script>
        
             
       <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>      
           
        </body>
        </html>
        
        