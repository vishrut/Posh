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
						<li><a href="../search/searchhome.php">Search</a></li>
						<li   class="active"><a href="../manageoffers/listoffersbyme.php">Offers & Transactions</a></li>
						<li><a href="../inventory/viewitems.php">Sell/Edit Item</a></li>
						<li><a href="../helpcenter.php">Help Center</a></li>
						<li><a href="../userdetails.php">My Account</a></li>
						<li><a href="../login/logout.php">Log Out</a></li>
					</ul>
				</div>
			</div>	
		</div>
		
		<div class="container" style="width: auto; padding: 20px 0px 0px 0px;">
			<div class="span3">
			<div class="row-fluid">
			<div class="bs-docs-sidebar">
				<ul class="nav nav-list bs-docs-sidenav">
					<li><a href="../manageoffers/listoffersbyme.php"><i class="icon-chevron-right"></i>Offers I Made</a></li>
					<li ><a href="../manageoffers/listoffersforme.php"><i class="icon-chevron-right"></i>Offers Made For Me</a></li>
					<li  class="active"><a href="../transactions/viewongoing.php"><i class="icon-chevron-right"></i>Ongoing Transactions</a></li>
					<li><a href="../transactions/archived.php"><i class="icon-chevron-right"></i>Archived Transactions</a></li>
				</ul>
			</div>
			</div>
			
			</div>
			
			<div class="span9">
			<?php
					
			$tbl_name = "offerdetails";
			$offers = DB::query("SELECT * FROM $tbl_name where seller=%s or buyer=%s",$_SESSION['username'],$_SESSION['username']);
			$counter = 0;
			
			echo '<hr>';
			echo '<div class="row-fluid">';
						echo '<p>Transactions initiated by you: </p>';

			echo '<ul class="thumbnails">';
			
			foreach($offers as $offer){
				
				if($offer['accepted']!=0){
					$transaction = DB::query("SELECT * FROM transaction where transactionid=%i",$offer['offerid']);
				$transaction = $transaction[0];
				if($transaction['status']!='totalcompleted'&&$transaction['status']!='totalincomplete'&&$transaction['status']!='bisc'&&$transaction['status']!='bcsi'){
				$item = DB::query("SELECT * FROM inventory where itemid=%i",$offer['sellingitem']);
				$item = $item[0];
				if($item['owner']!=$_SESSION['username']){	
					if($counter!=0 && $counter%4==0){
						echo '</ul>';
						echo '</div>';
						echo '<div class="row-fluid">';
						echo '<ul class="thumbnails">';
					}
						echo '<li class="span3">';
						echo '<div class="thumbnail">';
						echo '<img src="../upload/'.$item['image'].'" alt="">';
						echo '<div class="caption">';
						echo '<h3>'.$item['itemname'].'</h3>';
						echo '<p>Made Offer To: '.$offer['seller'].'</p>';
						echo '<p>User Rating: ';
						$user = DB::query("SELECT * from users where username=%s", $offer['seller']);
						$user = $user[0];
						echo round($user['rating'], 2);
						echo '</p>';

						if($offer['ssr']=='sell'){	
							echo '<p>Transaction Type: Buying </p>';
							echo '<p>Amount To Be Paid: Rs '.$offer['cash'].'</p>';
						}

						if($offer['ssr']=='rent'){	
							echo '<p>Transaction Type: Renting </p>';
							$rentdetails = DB::query("SELECT * FROM rentdetails where offerid=%i",$offer['offerid']);
							$rentdetails = $rentdetails[0];
							echo '<p>Rent To Be Paid: Rs '.$rentdetails['amount'].'<br>';
							echo '<p>Per every: '.$rentdetails['per'].'<br>';
							echo '<p>Renting Start Date: '.$rentdetails['startdate'].'<br>';
							echo '<p>Renting End Date: '.$rentdetails['enddate'].'</p>';
						}

						if($offer['ssr']=='swap'){	
							echo '<p>Transaction Type: Swapping </p>';
							echo '<p>Items To Be Swapped: </br>';
							if($offer['offereditem1']!=''){
								$offereditem = DB::query("SELECT * FROM inventory where itemid=%i",$offer['offereditem1']);
								$offereditem = $offereditem[0];
								echo $offereditem['itemname'].'<br>';	
							}
							if($offer['offereditem2']!=''){
								$offereditem = DB::query("SELECT * FROM inventory where itemid=%i",$offer['offereditem2']);
								$offereditem = $offereditem[0];
								echo $offereditem['itemname'].'<br>';	
							}
							if($offer['offereditem3']!=''){
								$offereditem = DB::query("SELECT * FROM inventory where itemid=%i",$offer['offereditem3']);
								$offereditem = $offereditem[0];
								echo $offereditem['itemname'].'<br>';	
							}
							if($offer['offereditem4']!=''){
								$offereditem = DB::query("SELECT * FROM inventory where itemid=%i",$offer['offereditem4']);
								$offereditem = $offereditem[0];
								echo $offereditem['itemname'].'<br>';	
							}

						}
						
						if($offer['ssr']=='rent')	
						echo '<p><a href="viewtransrent.php?status='.$transaction['status'].'&offerid='.$offer['offerid'].'"> <button class="btn btn-primary">Show</button></a>'; 
						if($offer['ssr']=='swap')	
						echo '<p><a href="viewtransswap.php?status='.$transaction['status'].'&offerid='.$offer['offerid'].'"> <button class="btn btn-primary">Show</button></a>'; 
						if($offer['ssr']=='sell')	
						echo '<p><a href="viewtranssell.php?status='.$transaction['status'].'&offerid='.$offer['offerid'].'"> <button class="btn btn-primary">Show</button></a>';
						

						//echo ' <button onclick="showConfirmation('.$offer['offerid'].')" class="btn btn-danger">Retract</button></p>';

						echo '</div>';
						echo '</div>';
						echo '</li>';
						$counter=$counter+1;
					}
				}
				}
			}
				echo '</ul>';
				echo '</div>';
			?>	
			
			<?php
			
			require_once '../dbconnect.php';
		
			$tbl_name = "offerdetails";
			$offers = DB::query("SELECT * FROM $tbl_name where seller=%s or buyer=%s",$_SESSION['username'],$_SESSION['username']);
			$counter = 0;
			
			echo '<hr>';
			echo '<div class="row-fluid">';
			echo '<p>Transactions initiated by others: </p>';
			echo '<ul class="thumbnails">';
			
			foreach($offers as $offer){
				if($offer['accepted']!=0){
					$transaction = DB::query("SELECT * FROM transaction where transactionid=%i",$offer['offerid']);
				$transaction = $transaction[0];
				if($transaction['status']!='totalcompleted'&&$transaction['status']!='totalincomplete'&&$transaction['status']!='bisc'&&$transaction['status']!='bcsi'){
				$item = DB::query("SELECT * FROM inventory where itemid=%i",$offer['sellingitem']);
				$item = $item[0];
				if($item['owner']==$_SESSION['username']){	
					if($counter!=0 && $counter%4==0){
						echo '</ul>';
						echo '</div>';
						echo '<div class="row-fluid">';
						echo '<ul class="thumbnails">';
					}
						echo '<li class="span3">';
						echo '<div class="thumbnail">';
						echo '<img src="../upload/'.$item['image'].'" alt="">';
						echo '<div class="caption">';
						echo '<h3>'.$item['itemname'].'</h3>';
						echo '<p>Offer from: '.$offer['buyer'].'</p>';
						echo '<p>User Rating: ';
						$user = DB::query("SELECT * from users where username=%s", $offer['buyer']);
						$user = $user[0];
						echo round($user['rating'], 2);
						echo '</p>';

						if($offer['ssr']=='sell'){	
							echo '<p>Transaction Type: Buying </p>';
							echo '<p>Amount To Be Received: Rs '.$offer['cash'].'</p>';
						}

						if($offer['ssr']=='rent'){	
							echo '<p>Transaction Type: Renting </p>';
							$rentdetails = DB::query("SELECT * FROM rentdetails where offerid=%i",$offer['offerid']);
							$rentdetails = $rentdetails[0];
							echo '<p>Rent To Be Received: Rs '.$rentdetails['amount'].'<br>';
							echo '<p>Per every: '.$rentdetails['per'].'<br>';
							echo '<p>Renting Start Date: '.$rentdetails['startdate'].'<br>';
							echo '<p>Renting End Date: '.$rentdetails['enddate'].'</p>';
						}

						if($offer['ssr']=='swap'){	
							echo '<p>Transaction Type: Swapping </p>';
							echo '<p>Offered Items: </br>';
							if($offer['offereditem1']!=''){
								$offereditem = DB::query("SELECT * FROM inventory where itemid=%i",$offer['offereditem1']);
								$offereditem = $offereditem[0];
								echo $offereditem['itemname'].'<br>';	
							}
							if($offer['offereditem2']!=''){
								$offereditem = DB::query("SELECT * FROM inventory where itemid=%i",$offer['offereditem2']);
								$offereditem = $offereditem[0];
								echo $offereditem['itemname'].'<br>';	
							}
							if($offer['offereditem3']!=''){
								$offereditem = DB::query("SELECT * FROM inventory where itemid=%i",$offer['offereditem3']);
								$offereditem = $offereditem[0];
								echo $offereditem['itemname'].'<br>';	
							}
							if($offer['offereditem4']!=''){
								$offereditem = DB::query("SELECT * FROM inventory where itemid=%i",$offer['offereditem4']);
								$offereditem = $offereditem[0];
								echo $offereditem['itemname'].'<br>';	
							}

						}
						
						if($offer['ssr']=='rent')	
						echo '<p><a href="viewtransrent.php?status='.$transaction['status'].'&offerid='.$offer['offerid'].'"> <button class="btn btn-primary">View Offer</button></a>'; 
						if($offer['ssr']=='swap')	
						echo '<p><a href="viewtransswap.php?status='.$transaction['status'].'&offerid='.$offer['offerid'].'"> <button class="btn btn-primary">View Offer</button></a>'; 
						if($offer['ssr']=='sell')	
						echo '<p><a href="viewtranssell.php?status='.$transaction['status'].'&offerid='.$offer['offerid'].'"> <button class="btn btn-primary">View Offer</button></a>';
						

						//echo ' <button onclick="showConfirmation('.$offer['offerid'].')" class="btn btn-danger">Retract</button></p>';

						echo '</div>';
						echo '</div>';
						echo '</li>';
						$counter=$counter+1;
					}
				}}
			}
				echo '</ul>';
				echo '</div>';
			?>

			</div>
			

		</div>
	<script>
	function showConfirmation(targetofferid){
		var x;
		var r=confirm("Are you sure you want to delete this offer?");
		if (r==true)
		  {
			//$.get('deleteitem.php', { q: targetitemid } );
			var url = "retractoffer.php?offerid="+targetofferid;    
			$(location).attr('href',url);
		  }
		else
		  {
		  }
		}
		
	</script>
	
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
  </body>
</html>
