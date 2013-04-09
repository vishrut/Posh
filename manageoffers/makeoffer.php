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

require_once '../dbconnect.php';

$item = DB::queryFirstRow("SELECT * FROM inventory WHERE itemid=%s", $_GET['itemid']);
$existingswap = DB::query("SELECT * FROM offerdetails WHERE buyer=%s AND sellingitem=%i AND ssr='swap'", $_SESSION['username'], $_GET['itemid']);
$existingswap = DB::count();
$existingsell = DB::query("SELECT * FROM offerdetails WHERE buyer=%s AND sellingitem=%i AND ssr='sell'", $_SESSION['username'], $_GET['itemid']);
$existingsell = DB::count();
$existingrent = DB::query("SELECT * FROM offerdetails WHERE buyer=%s AND sellingitem=%i AND ssr='rent'", $_SESSION['username'], $_GET['itemid']);
$existingrent = DB::count();

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

    <style type="text/css">
		body {
			padding-top: 40px;
			padding-bottom: 20px;
		}
    </style>
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-fileupload.css" rel="stylesheet">
    <link href="../bootstrap/css/docs.css" rel="stylesheet">	
	
	</head>

	<body>
	
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container" style="width: auto; padding: 0 20px;">
					<a class="brand pull-left" href="#">Posh</a>
					<ul class="nav pull-right">
						<li class="active"><a href="#">Search</a></li>
						<li><a href="#">What I'm Buying</a></li>
						<li><a href="../inventory/viewitems.php">Sell an Item</a></li>
						<li><a href="#">Help Center</a></li>
						<li><a href="#">My Account</a></li>
						<li><a href="../login/logout.php">Log Out</a></li>
					</ul>
				</div>
			</div>	
		</div>
		
		<div class="container" style="width: auto; padding: 20px 0px 0px 0px;">
			<div class="span3 bs-docs-sidebar">
				<ul class="nav nav-list bs-docs-sidenav">
					<li ><a href="#"><i class="icon-chevron-right"></i>Back to Item Details</a></li>
					<li><a href="#"><i class="icon-chevron-right"></i>Back to User Details</a></li>
					<!--li><a href="#"><i class="icon-chevron-right"></i>Show similar items</a></li-->
				</ul>
			</div>
			<!--div class="span3">
			<ul class="nav nav-tabs nav-stacked">
              <li class="active"><a href="#">Add an Item</a></li>
              <li><a href="viewitems.php">Items I'm Selling</a></li>
              <li><a href="#">My Services</a></li>
            </ul>
			</div-->
			<div class="span6">
			<div class="row-fluid">
			<h4><p class="text-info">Item Details > Make an Offer </p></h4>
			</div>
			<hr>
			
			<div class="row-fluid">
			<p>	
			<?php 
			if(!in_array($_GET['itemid'], $involved)){
						$ssrvalue = DB::query("SELECT ssr FROM ssritem WHERE itemid=%i",$item['itemid']);
						$N = count($ssrvalue);
						//echo print_r($vals);
						$ssrstring = "";
						for($i=0;$i<$N;$i++){
							$val = array_values($ssrvalue[$i]);
							if($val[0]=='sell'){
								if($existingsell>0)
									echo '<a href=""><button class="btn btn-large btn-primary align-center disabled" type="button" >Buy This Item!</button> </a><hr>';
								else echo '<a href="../manageoffers/makeofferbuy.php?itemid='.$item['itemid'].'"><button class="btn btn-large btn-primary align-center" type="button">Buy This Item!</button> </a><hr>';
									
							}
							if($val[0]=='swap'){
								if($existingswap>0)
								echo '<a href=""><button class="btn btn-large btn-success disabled" type="button" >Swap For This Item!</button> </a><hr>';
							else echo '<a href="../manageoffers/makeofferswap.php?itemid='.$item['itemid'].'"><button class="btn btn-large btn-success" type="button" >Swap For This Item!</button> </a><hr>';
							}
							if($val[0]=='rent'){
								if($existingrent>0)
								echo '<a href=""><button class="btn btn-large btn-info disabled" type="button" >Rent This Item!</button> </a><hr>';
							else echo '<a href="../manageoffers/makeofferrent.php?itemid='.$item['itemid'].'"><button class="btn btn-large btn-info" type="button">Rent This Item!</button> </a><hr>';
							}
						}
						echo $ssrstring;
					}
					else
						echo 'This item is currently involved in another transaction';
					?>
			</p>		
			</div>
			</div>
			<div class="span3">
			<div class="thumbnail">
			<?php echo '<img src="../upload/'.$item['image'].'" alt="">';?>
			<div class="caption">
				<div class="row-fluid">
				<table class="table table-hover">
				<thead>
					<tr>
					<th></th>
					<th></th>
					</tr>
				</thead>
				<tr>
					<th>Item Name </th>
					<td><?php echo $item['itemname']?></td>
				</tr>
				<tr>
					<th>Item Description </th>
					<td><?php echo $item['description']?></td>
				</tr>
				<tr>
						<th>Category </th>
						<td><?php echo $item['category']?></td>
				</tr>
				<tr>
					<th>Price Tag </th>
					<td><?php echo $item['pricetag']?></td>
				</tr>
				<tr>
					<th>Condition </th>
					<td><?php echo $item['condition']?></td>
				</tr>
				<tr>
					<th>Item up for </th>
					<td>
					<?php 
						$ssrvalue = DB::query("SELECT ssr FROM ssritem WHERE itemid=%i",$item['itemid']);
						$N = count($ssrvalue);
						//echo print_r($vals);
						$ssrstring = "";
						for($i=0;$i<$N;$i++){
							$val = array_values($ssrvalue[$i]);
							if($val[0]=='sell')
								$ssrstring=$ssrstring."Selling ";
							if($val[0]=='swap')
								$ssrstring=$ssrstring."Swapping ";
							if($val[0]=='rent')
								$ssrstring=$ssrstring."Renting ";
						}
						echo $ssrstring;
					?>
					</td>
				</tr>
				<tr>
					<th>Owner </th>
					<td><?php echo $item['owner'];?></td>
				</tr>
				</table>
			</div>
			</div>
			</div>
			</div>
			</div>
		<!--div class="footer" style="width: auto; padding: 0px 0px 0px 0px;">
			<p>&copy; Company 2012</p>
		</div-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/bootstrap-fileupload.js"></script>	
	

	</body>
</html>
