<!DOCTYPE html>
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['username'])){
	$_SESSION['loginfailed'] = 1;
	header("location:index.php");
}

require_once("dbconnect.php");

?>

<html lang="en">
  <head>
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
                    <li ><a href="wishlist.php"><i class="icon-chevron-right"></i>My Wishlist</a></li>
                    <li><a href="viewnotifications.php"><i class="icon-chevron-right"></i>New Notifications</a></li>
					<li class="active"><a href="#"><i class="icon-chevron-right"></i>Previous Notifications</a></li>
				</ul>
			</div>
			
			<?php 
			require_once 'dbconnect.php';
			
			$notifications = DB::query("SELECT * FROM notifications WHERE username=%s ORDER by time DESC", $_SESSION['username']);
			$counter = 0;
			echo '<div class="span9">';
			echo '<p><h4><a href="viewitems.php">My Items </a></h4></p>';
			echo '<hr>';
			echo '<div class="row-fluid">';
			echo '<table class="table table-hover">';
			echo '<tbody>';
			
			foreach($notifications as $notification){
				echo '<tr>';
				echo '<td><i>'.$notification['time'].'</i><br>';
				echo $notification['notificationdetails'];
				echo '</td>';
				echo '</tr>';
				DB::update('notifications', array(
  				'viewed' => 1
  				), "notificationid=%i", $notification['notificationid']);
  				$counter = $counter+1;
			}


			echo '</tbody>';
			echo '</table>';
			if($counter==0)
				echo '<p>No new notifications. Why dont you have a look at previous notifications?</p>';
			echo '</div>';
			echo '</div>';
			
			
			?>
			
		</div>
			



		<hr>

		<div class="footer" style="width: auto; padding: 0px 0px 0px 0px;">
			<p>&copy; Company 2012</p>
		</div>
	
	<script>
	function showConfirmation(targetitemid){
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
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
  </body>
</html>
