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
						<li class="active"><a href="../search/searchhome.php">Search</a></li>
						<li><a href="../manageoffers/listoffersbyme.php">Offers & Transactions</a></li>
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
					<li class="active"><a href="#"><i class="icon-chevron-right"></i>Make Offer</a></li>
					<li><a href="../search/searchhome.php"><i class="icon-chevron-right"></i>Back to Search</a></li>
				</ul>
			</div>
			
			<div class="span6">
			<div class="row-fluid">
			<h4><p class="text-info">Item Details > Make an Offer > Buy Item </p></h4>
			</div>
			<hr>
			
			<div class="row-fluid">
			<p>	
			<form name="makeofferrent" class="form-horizontal" action="submitrentoffer.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="sellingitem" id="sellingitemgroup" value="<?php echo $item['itemid']?>" />
						<input type="hidden" name="rentoffer" id="rentoffergroup" value="1" />

						<div class="control-group" id="startgroup">
							<label class="control-label" for="dpd1">Rent Start Date: </label>
							<div class="controls">
							<input class="span4" required name="startdate" id="dpd1" type="text">
							<span class="help-inline" id="starthelp"></span>
							</div>
						</div>
						<div class="control-group" id="endgroup">
							<label class="control-label" for="dpd2">Rent End Date: </label>
							<div class="controls">
							<input class="span4" required name="enddate" id="dpd2" type="text">
							<span class="help-inline" id="endhelp"></span>
							</div>
						</div>
						<hr>
						<div class="control-group" id="amountgroup">
							<label class="control-label" for="inputAmount">Proposed Rent Amount: </label>
							<div class="controls">
							<div class="input-prepend">
								<span class="add-on">Rs</span>
								<input class="span4" id="inputAmount" required name="amount" type="text" placeholder="">
							</div>
							<span class="help-inline" id="amounthelp"></span>
							</div>
						</div>
						<div class="control-group" id="pergroup">
							<label class="control-label" for="inputPer">Per every:  </label>
							<div class="controls">
							<select class="span3" name="per" required id="inputWing">
								<option>Day</option>
								<option>Week</option>
								<option>Month</option>
							</select>
							<span class="help-inline" id="perhelp"></span>
							</div>
						</div>
						<hr>
						<div class="control-group">
							<div class="controls">
							<button type="submit" class="btn btn-large btn-success">Make the Offer!</button>
							</div>
						</div>
			</form>		
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
					<td><?php echo substr($item['description'],0,20)."..."?></td>
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
					<th>Owner Rating</th>
					<td><?php 
					$user = DB::query("SELECT * from users where username=%s", $item['owner']);
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
