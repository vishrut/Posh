<!DOCTYPE html>
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['username'])){
	$_SESSION['loginfailed'] = 1;
	header("location:../index.php");
}

$targetitemid=0;
?>

<html lang="en">
  <head>
	<meta charset="utf-8">
    <title>Posh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
		body {
			padding-top: 40px;
			padding-bottom: 20px;
		}

    </style>
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	</head>

	<body>
	
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container" style="width: auto; padding: 0 20px;">
					<a class="brand" href="#">Posh</a>
					<ul class="nav pull-right">
						<li><a href="#">Search</a></li>
						<li><a href="#">What I'm Buying</a></li>
						<li class="active"><a href="#">Sell an Item</a></li>
						<li><a href="#">Help Center</a></li>
						<li><a href="#">My Account</a></li>
						<li><a href="../login/logout.php">Log Out</a></li>
					</ul>
				</div>
			</div>	
		</div>
		
		<div class="container" style="width: auto; padding: 20px 0px 0px 0px;">
			<div class="span3">
			<ul class="nav nav-tabs nav-stacked">
              <li><a href="sellitem.php">Add an Item</a></li>
              <li class="active"><a href="#">Items I'm Selling</a></li>
              <li><a href="#">My Services</a></li>
            </ul>
			</div>
			
			<?php 
			require_once '../dbconnect.php';
			$tbl_name = "inventory";
			$items = DB::query("SELECT * FROM $tbl_name WHERE owner=%s", $_SESSION['username']);
			$counter = 0;
			echo '<div class="span9">';
			echo '<p><h4><a href="viewitems.php">My Items </a><h4></p>';
			echo '<hr>';
			echo '<div class="row-fluid">';
			echo '<ul class="thumbnails">';

			
			foreach($items as $item){
			if($counter!=0 && $counter%3==0){
				echo '</ul>';
				echo '</div>';
				echo '<div class="row-fluid">';
				echo '<ul class="thumbnails">';
			}
				echo '<li class="span4">';
				echo '<div class="thumbnail">';
				echo '<img src="../upload/'.$item['image'].'" alt="">';
				echo '<div class="caption">';
				echo '<h3>'.$item['itemname'].'</h3>';
				echo '<p>'.$item['description'].'</p>';
				echo '<p><a href="edititem.php?q='.$item['itemid'].'"> <button class="btn btn-primary">Edit Item</button></a> '; 
				echo '<button onclick="showConfirmation('.$item['itemid'].')" class="btn btn-danger">Delete Item</button></p>';
				echo '</div>';
				echo '</div>';
				echo '</li>';
				$counter=$counter+1;
			}
			
			echo '</ul>';
			echo '</div>';
			echo '</div>';
			
			
			?>
			
		</div>
			



		<hr>

		<div class="footer" style="width: auto; padding: 0px 0px 0px 20px;">
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
	
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
  </body>
</html>
