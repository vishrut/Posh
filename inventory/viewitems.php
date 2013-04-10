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
require_once("../dbconnect.php");

$involved = array();
$transactions = DB::query("SELECT * FROM transaction");
foreach ($transactions as $transaction) {
	$offerid = $transaction['transactionid'];
	$offerdetails = DB::query("SELECT * from offerdetails where offerid=%i",$offerid);
	$offerdetails = $offerdetails[0];
	array_push($involved, $offerdetails['sellingitem']);
	array_push($involved, $offerdetails['offereditem1']);
	array_push($involved, $offerdetails['offereditem2']);
	array_push($involved, $offerdetails['offereditem3']);
	array_push($involved, $offerdetails['offereditem4']);
}
?>

<html lang="en">
  <head>
	<meta charset="utf-8">
    <title>Posh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../bootstrap/css/docs.css" rel="stylesheet">

    <style type="text/css">
		body {
			padding-top: 40px;
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
						<li ><a href="../search/searchhome.php">Search</a></li>
						<li><a href="../manageoffers/listoffersbyme.php">Offers & Transactions</a></li>
						<li  class="active"><a href="../inventory/viewitems.php">Sell/Edit Item</a></li>
						<li><a href="../helpcenter.php">Help Center</a></li>
						<li><a href="../userdetails.php">My Account</a></li>
						<li><a href="../login/logout.php">Log Out</a></li>
					</ul>
				</div>
			</div>	
		</div>
		
		<div class="container" style="width: auto; padding: 20px 0px 0px 0px;">
			<div class="span3 bs-docs-sidebar">
				<ul class="nav nav-list bs-docs-sidenav">
					<li ><a href="sellitem.php"><i class="icon-chevron-right"></i>Add an Item</a></li>
					<li class="active"><a href="#"><i class="icon-chevron-right"></i>Items I'm Selling</a></li>
				</ul>
			</div>
			
			<?php 
			require_once '../dbconnect.php';
			$tbl_name = "inventory";
			$items = DB::query("SELECT * FROM $tbl_name WHERE owner=%s", $_SESSION['username']);
			$counter = 0;
			echo '<div class="span9">';
			echo '<p><h4><a href="viewitems.php">My Items </a></h4></p>';
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
				if(!in_array($item['itemid'], $involved)){
				echo '<p><a href="edititem.php?q='.$item['itemid'].'"> <button class="btn btn-primary">Edit Item</button></a> '; 
				echo '<button onclick="showConfirmation('.$item['itemid'].')" class="btn btn-danger">Delete Item</button></p>';
			}
			else
				echo '<p>This item is involved in a transaction, you cannot edit it.</p>';
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
	
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
  </body>
</html>
