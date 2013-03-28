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

else{
	require_once '../dbconnect.php';
		$item = DB::queryFirstRow("SELECT * FROM inventory WHERE itemid=%s", $_GET['q']);
		$ssrs = DB::query("SELECT * FROM ssritem WHERE itemid=%s", $_GET['q']);
		$sell = 0;
		$swap = 0;
		$rent = 0;
		foreach($ssrs as $ssr){
			if($ssr['ssr']=='sell')
				$sell = 1;
			if($ssr['ssr']=='swap')
				$swap = 1;
			if($ssr['ssr']=='rent')
				$rent = 1;
		}
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
	    <script src="../bootstrap/js/jquery.js"></script>


	<script>
	<?php

	echo '$(document).ready(function(){
		$("#inputDescription").val("'.$item['description'].'");
		$("#inputItemname").val("'.$item['itemname'].'");
		$("#inputCategory").val("'.$item['category'].'");
		$("#inputPricetag").val("'.$item['pricetag'].'");';
	if($item['condition']=='new')
		echo '$(\'input:radio[name=condition]\')[0].checked = true;';
	
	else 
		echo '$(\'input:radio[name=condition]\')[1].checked = true;';

	if($sell==1)
		echo '$(\'input:checkbox[name=ssrsell]\')[0].checked = true;';	
		
	if($swap==1)
		echo '$(\'input:checkbox[name=ssrswap]\')[0].checked = true;';	
		
	if($rent==1)
		echo '$(\'input:checkbox[name=ssrrent]\')[0].checked = true;';	
	
	echo '$("#inputImage").val("../upload/'.$item['image'].'")';
	
	echo	'});';
		
	?>
	</script>	
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
              <li ><a href="sellitem.php">Add an Item</a></li>
              <li class="active"><a href="viewitems.php">Items I'm Selling</a></li>
              <li><a href="#">My Services</a></li>
            </ul>
			</div>
			<div class="span9">
			<p><h4><a href="viewitems.php">My Items > </a><a href="">Edit Item</a><h4></p>			
			<hr>
			</div>
			<div class="span9">
				<form name="uploaditem" class="form-horizontal" action="uploadediteditem.php" method="post" enctype="multipart/form-data">
				<?php 
					if(isset($_SESSION['invalidfile']))
						if($_SESSION['invalidfile']==1){
							echo "<p><font color=\"red\">Oops! Invalid file format or exceeding size limit</p></font>";
							$_SESSION['invalidfile']=0;
						};		
				?>
						<div class="control-group" id="itemnamegroup">
							<label class="control-label" for="inputItemname">Item Name</label>
							<div class="controls">
							<input type="text" name="itemname" required id="inputItemname" placeholder="Item name" onkeyup="">
							<span class="help-inline" id="itemnamehelp"></span>
							</div>
						</div>
						<div class="control-group" id="categorygroup">
							<label class="control-label" for="inputCategory">Category</label>
							<div class="controls">
							<select name="category" required id="inputCategory">
								<option>A</option>
								<option>B</option>
								<option>C</option>
							</select>
							<span class="help-inline" id="categoryhelp"></span>
							</div>
						</div>
						<div class="control-group" id="pricetaggroup">
							<label class="control-label" for="inputPricetag">Price Tag</label>
							<div class="controls">
							<div class="input-prepend">
								<span class="add-on">Rs</span>
								<input class="span1" id="inputPricetag" required name="pricetag" type="text" placeholder="">
							</div>
							<span class="help-inline" id="pricetaghelp"></span>
							</div>
						</div>
						<div class="control-group" id="descriptiongroup">
							<label class="control-label" for="inputDescription">Description</label>
							<div class="controls">
							<textarea rows="4" name="description" required id="inputDescription" placeholder="Describe the item" onkeyup="">
							</textarea>
							<span class="help-inline" id="descriptionhelp"></span>
							</div>
						</div>
						<div class="control-group" id="conditiongroup">
							<label class="control-label" for="inputCondition">Item Condition</label>
							<div class="controls">
								<label class="radio">
								<input type="radio" name="condition" id="optionCondition1" value="new" checked>
								New
								</label>
								<label class="radio">
								<input type="radio" name="condition" id="optionCondition2" value="used">
								Used
								</label>
							<span class="help-inline" id="conditionhelp"></span>
							</div>
						</div>
						<div class="control-group" id="ssrgroup">
							<label class="control-label" for="inputSSR">Put item up for</label>
							<div class="controls">
								<label class="checkbox">
								<input type="checkbox" name="ssrsell" id="optionSSR1" value="sell">
								Selling
								</label>
								<label class="checkbox">
								<input type="checkbox" name="ssrswap" id="optionSSR2" value="swap">
								Swapping
								</label>
								<label class="checkbox">
								<input type="checkbox" name="ssrrent" id="optionSSR3" value="rent">
								Renting
								</label>
							<span class="help-inline" id="ssrhelp"></span>
							</div>
						</div>
						<div class="control-group" id="imagegroup">
							<label class="control-label" for="inputImage">New Image</label>
							<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="../bootstrap/img/noimage.gif" /></div>
								<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
								<div>
								<span class="btn btn-file"><span class="fileupload-new">Select new image</span><span class="fileupload-exists">Change</span><input type="file" name="file" id="inputImage"/></span>
								<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
							<span class="help-inline" id="imagehelp">Ignore if you do not want to change previous image</span>
							</div>
						</div>
						 <input type="hidden" name="itemid" value="<?php echo $item['itemid'];?>">
						 <div class="control-group">
							<div class="controls">
							<button type="submit" class="btn btn-large btn-success">Edit Item!</button>
							<a href="viewitems.php"><button type="button" class="btn btn-large btn-danger">Cancel</button></a>
							
							</div>
						</div>
			</form>
			</div>
			<!--div class="span4">
			<h1>Preview here</h1>
			</div-->
			</div>

		<hr>

		<div class="footer" style="width: auto; padding: 0px 0px 0px 20px;">
			<p>&copy; Company 2012</p>
		</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/bootstrap-fileupload.js"></script>	
	

	</body>
</html>
