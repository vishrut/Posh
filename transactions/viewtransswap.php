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

$offerdetails = DB::query("SELECT * from offerdetails where offerid=%i", $_GET['offerid']);
$offerdetails = $offerdetails[0];

$selling = DB::query("SELECT * from inventory where itemid=%i", $offerdetails['sellingitem']);
$selling=$selling[0];

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
			<div class="span3 bs-docs-sidebar">
				<ul class="nav nav-list bs-docs-sidenav">
					<li><a href="../manageoffers/listoffersbyme.php"><i class="icon-chevron-right"></i>Offers I Made</a></li>
					<li ><a href="../manageoffers/listoffersforme.php"><i class="icon-chevron-right"></i>Offers Made For Me</a></li>
					<li   class="active"><a href="../transactions/viewongoing.php"><i class="icon-chevron-right"></i>Ongoing Transactions</a></li>
					<li ><a href="../transactions/archived.php"><i class="icon-chevron-right"></i>Archived Transactions</a></li>
				</ul>
			</div>
			<div class="span6">
			<div class="row-fluid">
			<h4><p class="text-info">View Transaction </p></h4>
			</div>
			<hr>
			
		<?php
			if($offerdetails['offereditem1']!=''){
				$item1=$offerdetails['offereditem1'];
				$tbl_name = "inventory";
				$items = DB::query("SELECT * FROM $tbl_name where itemid=%s",$item1);
								
				foreach ($items as $item) {
					echo '<div class="row-fluid">';
					echo '<div class="media">';
					echo '<a class="pull-left" href="#"><img src="../upload/'.$item['image'].'" height="128" width="128" alt=""></a>';
					echo '<div class="media-body">';
					echo '<h4 class="media-heading">'.$item['itemname'].'</h4>';
					echo '<p>'.$item['description'].'</p>';
					echo '<p>Category: '.$item['category'].'</p>';
					echo '<p>PriceTag: '.$item['pricetag'].'</p>';
					echo '<p>Condition: '.$item['condition'].'</p>';

					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '<hr>';
				}
			}
			?>
		<?php
			if($offerdetails['offereditem2']!=''){
				$item2=$offerdetails['offereditem2'];
				$tbl_name = "inventory";
				$items = DB::query("SELECT * FROM $tbl_name where itemid=%s",$item2);
								
				foreach ($items as $item) {
					echo '<div class="row-fluid">';
					echo '<div class="media">';
					echo '<a class="pull-left" href="#"><img src="../upload/'.$item['image'].'" height="128" width="128" alt=""></a>';
					echo '<div class="media-body">';
					echo '<h4 class="media-heading">'.$item['itemname'].'</h4>';
					echo '<p>'.$item['description'].'</p>';
					echo '<p>Category: '.$item['category'].'</p>';
					echo '<p>PriceTag: '.$item['pricetag'].'</p>';
					echo '<p>Condition: '.$item['condition'].'</p>';

					echo '<p></p>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '<hr>';
				}
			}
			?>
		<?php
			if($offerdetails['offereditem3']!=''){
				$item3=$offerdetails['offereditem3'];
				$tbl_name = "inventory";
				$items = DB::query("SELECT * FROM $tbl_name where itemid=%s",$item3);
								
				foreach ($items as $item) {
					echo '<div class="row-fluid">';
					echo '<div class="media">';
					echo '<a class="pull-left" href="#"><img src="../upload/'.$item['image'].'" height="128" width="128" alt=""></a>';
					echo '<div class="media-body">';
					echo '<h4 class="media-heading">'.$item['itemname'].'</h4>';
					echo '<p>'.$item['description'].'</p>';
					echo '<p>Category: '.$item['category'].'</p>';
					echo '<p>PriceTag: '.$item['pricetag'].'</p>';
					echo '<p>Condition: '.$item['condition'].'</p>';

					echo '<p></p>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '<hr>';
				}
			}
			?>
		<?php
			if($offerdetails['offereditem4']!=''){
				$item4=$offerdetails['offereditem4'];
				$tbl_name = "inventory";
				$items = DB::query("SELECT * FROM $tbl_name where itemid=%s",$item4);
								
				foreach ($items as $item) {
					echo '<div class="row-fluid">';
					echo '<div class="media">';
					echo '<a class="pull-left" href="#"><img src="../upload/'.$item['image'].'" height="128" width="128" alt=""></a>';
					echo '<div class="media-body">';
					echo '<h4 class="media-heading">'.$item['itemname'].'</h4>';
					echo '<p>'.$item['description'].'</p>';
					echo '<p>Category: '.$item['category'].'</p>';
					echo '<p>PriceTag: '.$item['pricetag'].'</p>';
					echo '<p>Condition: '.$item['condition'].'</p>';

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
				<div class="span2"></div>
				<?php
				$offeridthis = $_GET['offerid'];
				if(!((($offerdetails['buyer']==$_SESSION['username'])&&($_GET['status']=='buyerreportedcompleted'||$_GET['status']=='buyerreportedincomplete'))||(($offerdetails['seller']==$_SESSION['username'])&&($_GET['status']=='sellerreportedcompleted'||$_GET['status']=='sellerreportedincomplete'))))
				{
				echo	
			'<a class="btn btn-large btn-success" href="reportcompleted.php?offerid='.$offeridthis.'" role="button" data-toggle="modal">Report Successful!</a>';
			echo	
				' <a class="btn btn-large btn-danger" href="reportincomplete.php?offerid='.$offeridthis.'" role="button" data-toggle="modal">Report Incomplete!</a>';
			}
			else{
				echo '<b>You have reported this transaction as ';
				if($_GET['status']=='buyerreportedcompleted'||$_GET['status']=='sellerreportedcompleted')
					echo '<i>Completed</i> <br>The other user has yet to report the transaction.</b>';
				else
						echo '<i>Unsuccessful</i></b>';
				
			}
			
			?>
			
			</p>
			</div>
			<div class="row-fluid">
			<hr>
			
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
	<script>
	function showConfirmation(targetofferid){
		var x;
		var r=confirm("Are you sure you want to reject this offer?");
		if (r==true)
		  {
			//$.get('deleteitem.php', { q: targetitemid } );
			var url = "rejectoffer.php?offerid="+targetofferid;    
			$(location).attr('href',url);
		  }
		else
		  {
		  }
		}
		
	</script>
		<!--div class="footer" style="width: auto; padding: 0px 0px 0px 0px;">
			<p>&copy; Company 2012</p>
		</div-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   

	

	</body>
</html>
