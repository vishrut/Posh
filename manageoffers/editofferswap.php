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
$_SESSION['offerid']=$_GET['offerid'];
require_once '../dbconnect.php';
$offerdetails = DB::query("SELECT * FROM offerdetails WHERE offerid=%i", $_GET['offerid']);
$offerdetails = $offerdetails[0];

$selling = DB::queryFirstRow("SELECT * FROM inventory WHERE itemid=%s", $offerdetails['sellingitem']);

if(!isset($_SESSION['firsttime'])){
if(isset($_SESSION['swap1']))
	unset($_SESSION['swap1']);
if(isset($_SESSION['swap2']))
	unset($_SESSION['swap2']);
if(isset($_SESSION['swap3']))
	unset($_SESSION['swap3']);
if(isset($_SESSION['swap4']))
	unset($_SESSION['swap4']);


if($offerdetails['offereditem1']!='')
	$_SESSION['swap1']=$offerdetails['offereditem1'];
if($offerdetails['offereditem2']!='')
	$_SESSION['swap2']=$offerdetails['offereditem2'];
if($offerdetails['offereditem3']!='')
	$_SESSION['swap3']=$offerdetails['offereditem3'];
if($offerdetails['offereditem4']!='')
	$_SESSION['swap4']=$offerdetails['offereditem4'];

//$_SESSION['firsttime'] = 0;
}
$item1=-1;
$item2=-1;
$item3=-1;
$item4=-1;

$itemcount=0;	
?>
<html lang="en">
  <head>
	<meta charset="utf-8">
    <title>Posh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="datepicker.css" rel="stylesheet">



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
						<li><a href="../search/searchhome.php">Search</a></li>
						<li class="active"><a href="../manageoffers/listoffersbyme.php">Offers & Transactions</a></li>
						<li><a href="../inventory/viewitems.php">Sell/Edit Item</a></li>
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
					<li><a href="listoffersbyme.php"><i class="icon-chevron-right"></i>Back to Offers I Made</a></li>
				</ul>
			
			</div>
			
			<div class="span6">
			<div class="row-fluid">
			<h4><p class="text-info">Edit Offer </p></h4>
			</div>
			<hr>
			
		<?php
			if(isset($_SESSION['swap1'])){
				$item1=$_SESSION['swap1'];
				$itemcount=$itemcount+1;
				$tbl_name = "inventory";
				$items = DB::query("SELECT * FROM $tbl_name where itemid=%s",$_SESSION['swap1']);
								
				foreach ($items as $item) {
					echo '<div class="row-fluid">';
					echo '<div class="media">';
					echo '<a class="pull-left" href="#"><img src="../upload/'.$item['image'].'" height="64" width="64" alt=""></a><a class="btn pull-right btn-mini" href="removeitemswap.php?q=swap1&selling='.$selling['itemid'].'" role="button" data-toggle="modal"><i class="icon-remove-sign"></i></a>';
					echo '<div class="media-body">';
					echo '<h4 class="media-heading">'.$item['itemname'].'</h4>';
					echo '<p></p>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '<hr>';
				}
			}
			?>
		<?php
			if(isset($_SESSION['swap2'])){
				$item2=$_SESSION['swap2'];
				$itemcount=$itemcount+1;
				$tbl_name = "inventory";
				$items = DB::query("SELECT * FROM $tbl_name where itemid=%s",$_SESSION['swap2']);
								
				foreach ($items as $item) {
					echo '<div class="row-fluid">';
					echo '<div class="media">';
					echo '<a class="pull-left" href="#"><img src="../upload/'.$item['image'].'" height="64" width="64" alt=""></a><a class="btn pull-right btn-mini" href="removeitemswap.php?q=swap2&selling='.$selling['itemid'].'" role="button" data-toggle="modal"><i class="icon-remove-sign"></i></a>';
					echo '<div class="media-body">';
					echo '<h4 class="media-heading">'.$item['itemname'].'</h4>';
					echo '<p></p>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '<hr>';
				}
			}
			?>
		<?php
			if(isset($_SESSION['swap3'])){
				$item3=$_SESSION['swap3'];
				$itemcount=$itemcount+1;
				$tbl_name = "inventory";
				$items = DB::query("SELECT * FROM $tbl_name where itemid=%s",$_SESSION['swap3']);
								
				foreach ($items as $item) {
					echo '<div class="row-fluid">';
					echo '<div class="media">';
					echo '<a class="pull-left" href="#"><img src="../upload/'.$item['image'].'" height="64" width="64" alt=""></a><a class="btn pull-right btn-mini" href="removeitemswap.php?q=swap3&selling='.$selling['itemid'].'" role="button" data-toggle="modal"><i class="icon-remove-sign"></i></a>';
					echo '<div class="media-body">';
					echo '<h4 class="media-heading">'.$item['itemname'].'</h4>';
					echo '<p></p>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '<hr>';
				}
			}
			?>
		<?php
			if(isset($_SESSION['swap4'])){
				$item4=$_SESSION['swap4'];
				$itemcount=$itemcount+1;
				$tbl_name = "inventory";
				$items = DB::query("SELECT * FROM $tbl_name where itemid=%s",$_SESSION['swap4']);
								
				foreach ($items as $item) {
					echo '<div class="row-fluid">';
					echo '<div class="media">';
					echo '<a class="pull-left" href="#"><img src="../upload/'.$item['image'].'" height="64" width="64" alt=""></a><a class="btn pull-right btn-mini" href="removeitemswap.php?q=swap4&selling='.$selling['itemid'].'" role="button" data-toggle="modal"><i class="icon-remove-sign"></i></a>';
					echo '<div class="media-body">';
					echo '<h4 class="media-heading">'.$item['itemname'].'</h4>';
					echo '<p></p>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '<hr>';
				}
			}
			?>

			<div class="row-fluid">
			<p>
			<a class="btn btn-success pull-right" href="#myModal" role="button" data-toggle="modal" <?php if($itemcount==4)echo 'disabled'?>>Add item to swap</a></p>
			</div>
			<div class="row-fluid">
			<hr>
			<div class="span4"></div>
			<p>
				<?php
			if($itemcount>0)
			echo '<a class="btn btn-info btn-large" href="updateswapoffer.php?offerid='.$_GET['offerid'].'" role="button" data-toggle="modal">Submit Offer!</a>';
			?>
			</p>
			</div>	
		</div>
			<div class="span3">
			<div class="thumbnail">
			<?php echo '<img src="../upload/'.$selling['image'].'" alt="">';?>
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
					<td><?php echo $selling['itemname']?></td>
				</tr>
				<tr>
					<th>Item Description </th>
					<td><?php echo substr($selling['description'],0,20)."..."?></td>
				</tr>
				<tr>
						<th>Category </th>
						<td><?php echo $selling['category']?></td>
				</tr>
				<tr>
					<th>Price Tag </th>
					<td><?php echo $selling['pricetag']?></td>
				</tr>
				<tr>
					<th>Condition </th>
					<td><?php echo $selling['condition']?></td>
				</tr>
				<tr>
					<th>Item up for </th>
					<td>
					<?php 
						$ssrvalue = DB::query("SELECT ssr FROM ssritem WHERE itemid=%i",$selling['itemid']);
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
					<td><?php echo $selling['owner'];?></td>
				</tr>
				<tr>
					<th>Owner Rating</th>
					<td><?php 
					$user = DB::query("SELECT * from users where username=%s", $selling['owner']);
					$user = $user[0];
					echo round($user['rating'], 2);
					?></td>
				</tr>
				</table>

			</div>
			</div>
			</div>
			</div>
		</div>

		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<!--button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button-->
				<h3 id="myModalLabel">Add item which you would like to swap</h3>
			</div>
			<div class="modal-body">
				<?php
				$tbl_name = "inventory";
				$items = DB::query("SELECT * FROM $tbl_name");
				$counter = 0;
				$offered = array();
				$prevoffers = DB::query("SELECT * FROM offerdetails where buyer=%s",$_SESSION['username']);
				foreach ($prevoffers as $prevoffer) {
					if($prevoffer['offerid']!=$_GET['offerid']){
					if($prevoffer['offereditem1']!='')
						array_push($offered, $prevoffer['offereditem1']);
					if($prevoffer['offereditem2']!='')
						array_push($offered, $prevoffer['offereditem2']);
					if($prevoffer['offereditem3']!='')
						array_push($offered, $prevoffer['offereditem3']);
					if($prevoffer['offereditem4']!='')
						array_push($offered, $prevoffer['offereditem4']);
					}						
				}
				
				echo '<div class="row-fluid">';
				echo '<ul class="thumbnails">';
				
				foreach($items as $item){
				if(($item['owner']==$_SESSION['username'])&&($item['itemid']!=$item1)&&($item['itemid']!=$item2)&&($item['itemid']!=$item3)&&($item['itemid']!=$item4)&&!(in_array($item['itemid'], $offered))){	
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
					echo '<p><b>'.$item['itemname'].'</b></p>';
					echo '<p><a href="addtoeditswap.php?selling='.$selling['itemid'].'&itemid='.$item['itemid'].'"> <button class="btn btn-primary">Add</button></a></p> '; 
					//echo '<button onclick="" class="btn btn-info">Add to Wishlist</button></p>';
					echo '</div>';
					echo '</div>';
					echo '</li>';
					$counter=$counter+1;
				}
				}
				echo '</ul>';
				echo '</div>';
				?>
			</div>
			<div class="modal-footer">
				<button class="btn" type="button" data-dismiss="modal" aria-hidden="false">Close</button>
			</div>
		</div>

    <script src="../bootstrap/js/jquery.js"></script>
    		<script src="../bootstrap/js/bootstrap.js"></script>
        	<script src="bootstrap-datepicker.js"></script>	
			<script>

		$(function(){
        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
		});

	</script>
		<!--div class="footer" style="width: auto; padding: 0px 0px 0px 0px;">
			<p>&copy; Company 2012</p>
		</div-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   

	

	</body>
</html>
