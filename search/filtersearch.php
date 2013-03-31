﻿<!DOCTYPE html>
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
	<meta charset="utf-8">
    <title>Posh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../bootstrap/css/docs.css" rel="stylesheet">
	    <script src="../bootstrap/js/jquery.js"></script>


    <style type="text/css">
		body {
			padding-top: 40px;
			padding-bottom: 0px;
		}

    </style>
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<script>
		$(document).ready(function(){
<?php

if(isset($_GET['query']))
	if($_GET['query']!='')
		echo '$("#query").val("'.$_GET['query'].'");'; 
  
if(isset($_GET['checkssr'])){	
  $ssr = $_GET['checkssr'];
  if(empty($ssr))
  {
  }
  else
  {
    $N = count($ssr);
 
    for($i=0; $i < $N; $i++)
    {
      echo 	'$("#check'.$ssr[$i].'").prop(\'checked\', true);';
    }
  }
  }
  
if(isset($_GET['checkcondition'])){	
  $cond = $_GET['checkcondition'];
  if(empty($cond))
  {
  }
  else
  {
    $N = count($cond);
 
    for($i=0; $i < $N; $i++)
    {
      echo 	'$("#check'.$cond[$i].'").prop(\'checked\', true);';
    }
  }
  }
  
  if(isset($_GET['pricerange'])){	
  $range = $_GET['pricerange'];
  if(empty($range))
  {
  }
  else
  {
      echo 	'$("#range'.$range.'").prop(\'checked\', true);';
  }
  }

if(isset($_GET['checkcategory'])){	
  $cat = $_GET['checkcategory'];
  if(empty($cat))
  {
		  
  }
  else
  {
      echo 	'$("#'.$cat.'").prop(\'checked\', true);';
	  //echo 'var astr = $("#check'.$cat.'").text();';
	  //echo  '$("#cat-btn").text(astr);'; 
  }
  }
else{
echo '$("#All").prop(\'checked\', true);';  
echo '$("#All").click()';  
}

?>
		});
	
		function setCategory(str1){
			$("#cat-btn").text(str1);
			if(str1=="All Categories")
				str1 = "All";
			$("#"+str1).prop('checked', true);
			$("#"+str1).click();
		}
		
		function submitQuery(){
			var query = $("#query").val();
			var category = $("#cat-btn").text();
			var url = "filtersearch.php?query="+query+"&category="+category;
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
			<div class="span3">
			<div class="row-fluid" style="width: auto; padding: 0px 12px 0px 0px;">
				<div class="well well-small">
					<h4>Categories</h4>
					<form name="cform" action="filtersearch.php" method="get">
				    <label class="radio">
					<!--The id of the radio buttons beow must be the same as the category button group text-->
					<input type="radio" id="All" name="checkcategory" onclick="document.cform.submit ();" value="All"> All Categories
					</label>
					<label class="radio">
					<input type="radio" id="A" name="checkcategory" onclick="document.cform.submit ();" value="A"> A
					</label>
					<label class="radio">
					<input type="radio" id="B" name="checkcategory" onclick="document.cform.submit ();" value="B"> B
					</label>
				</div>
			</div>
			
			<div class="row-fluid" style="width: auto; padding: 0px 12px 0px 0px;">
				<div class="well well-small">
					<h4>Item Condition</h4>
				    <label class="checkbox">
					<input type="checkbox" id="checknew" name="checkcondition[]" onclick="document.cform.submit ();" value="new"> Brand New
					</label>
					<label class="checkbox">
					<input type="checkbox" id="checkverygood" name="checkcondition[]" onclick="document.cform.submit ();" value="verygood"> Very Good
					</label>
					<label class="checkbox">
					<input type="checkbox" id="checkgood" name="checkcondition[]" onclick="document.cform.submit ();" value="good"> Good
					</label>
					<label class="checkbox">
					<input type="checkbox" id="checkacceptable" name="checkcondition[]" onclick="document.cform.submit ();" value="acceptable"> Acceptable
					</label>
					<label class="checkbox">
					<input type="checkbox" id="checkused" name="checkcondition[]" onclick="document.cform.submit ();" value="used"> Used
					</label>
					<!--input type="submit" name="formSubmit" value="Submit" -->
					<!--/form-->
				</div>
			</div>
			
			<div class="row-fluid" style="width: auto; padding: 0px 12px 0px 0px;">
				<div class="well well-small">
					<h4>Items up for<h4>
					<!--form name="sform" action="filtersearch.php" method="get"-->
				    <label class="checkbox">
					<input type="checkbox" id="checksell" name="checkssr[]" onclick="document.cform.submit ();" value="sell"> Selling
					</label>
					<label class="checkbox">
					<input type="checkbox" id="checkswap" name="checkssr[]" onclick="document.cform.submit ();" value="swap"> Swapping
					</label>
					<label class="checkbox">
					<input type="checkbox" id="checkrent" name="checkssr[]" onclick="document.cform.submit ();" value="rent"> Renting
					</label>
				</div>
			</div>
			
			<div class="row-fluid" style="width: auto; padding: 0px 12px 0px 0px;">
				<div class="well well-small">
					<h4>Price Range<h4>
				    <label class="radio">
					<input type="radio" name="pricerange" id="range100" onclick="document.cform.submit ();" value="100"> Up to Rs. 100
					</label>
					<label class="radio">
					<input type="radio" name="pricerange" id="range500" onclick="document.cform.submit ();" value="500"> Rs. 100 - Rs. 500
					</label>
					<label class="radio">
					<input type="radio" name="pricerange" id="rangeall" onclick="document.cform.submit ();" value="all"> All Price-ranges
					</label>

				</div>
			</div>
			
			</div>
			
			<div class="span9">
			<div class="row-fluid">
				<div class="span1"></div>
				<div class="input-prepend input-append">
					<div class="btn-group">
					<button name="category" id="cat-btn" class="btn"><?php if(isset($_GET['checkcategory'])) if($_GET['checkcategory']!='All')echo $_GET['checkcategory']; else echo 'All Categories';?></button>
					<button class="btn dropdown-toggle" data-toggle="dropdown">
					<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<!--The text of the below categories and the id of the category radio buttons must be the same, except for 'All Categories' -->
						<li><a href="#" onclick="setCategory(this.text);return false;">All Categories</a></li>
						<li><a href="#" onclick="setCategory(this.text);return false;">A</a></li>
						<li><a href="#" onclick="setCategory(this.text);return false;">B</a></li>
					</ul>
					</div>
						
					<input id="query" name="query" type="text" class="span6" ></input>
					<button class="btn btn-info" onclick="document.cform.submit ();">Search!</button>
					</form>
				</div>
			</div>
			
			<?php
			
			function match_word($input, $word){	
				if(strlen($input)>=strlen($word)){
					$lev1 = levenshtein($input, $word, 1, 1, 0);
				}
				else{
					$lev1 = levenshtein($input, $word, 0, 1, 1);
				}
				return $lev1;
			}
			
			require_once '../dbconnect.php';
			
			if(!isset($_GET['query'])&&!isset($_GET['category'])){
				
				$tbl_name = "inventory";
				$items = DB::query("SELECT * FROM $tbl_name");
				$counter = 0;
				
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
			}
			
			if(isset($_GET['query'])&&$_GET['query']==''&&isset($_GET['category'])&&$_GET['category']!=''){
				$tbl_name = "inventory";
				$items = DB::query("SELECT * FROM $tbl_name WHERE category=%s", $_GET['category']);
				$counter = 0;
				
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
			}
			
			if(isset($_GET['query'])&&$_GET['query']!=''&&isset($_GET['category'])&&$_GET['category']!=''){
				$tbl_name = "inventory";
				if($_GET['category']!='All Categories')
					$items = DB::query("SELECT * FROM $tbl_name WHERE category=%s", $_GET['category']);
				else
					$items = DB::query("SELECT * FROM $tbl_name");
				$idmatch = array();
				$mctr=0;
				foreach($items as $item){
					$idmatch[(string)$mctr]=match_word($_GET['query'],$item['itemname']);
					$mctr++;
				}
				asort($idmatch);
				$counter = 0;
				
				echo '<hr>';
				echo '<div class="row-fluid">';
				echo '<ul class="thumbnails">';
				
				foreach($idmatch as $id=>$mvalue){
				if($counter!=0 && $counter%3==0){
					echo '</ul>';
					echo '</div>';
					echo '<div class="row-fluid">';
					echo '<ul class="thumbnails">';
				}
					echo '<li class="span4">';
					echo '<div class="thumbnail">';
					echo '<img src="../upload/'.$items[$id]['image'].'" alt="">';
					echo '<div class="caption">';
					echo '<h3>'.$items[$id]['itemname'].'</h3>';
					echo '<p>Match Value - '.$mvalue.'</p>';
					echo '<p>'.$items[$id]['description'].'</p>';
					echo '<p><a href="edititem.php?q='.$items[$id]['itemid'].'"> <button class="btn btn-primary">Edit Item</button></a> '; 
					echo '<button onclick="showConfirmation('.$items[$id]['itemid'].')" class="btn btn-danger">Delete Item</button></p>';
					echo '</div>';
					echo '</div>';
					//echo $items[$id]['itemname'].'-'.$id.'-'.$mvalue;
					echo '</li>';
					$counter=$counter+1;
				}
				echo '</ul>';
				echo '</div>';
				echo '</div>';
			}
			
			
			?>
			</div>
			

		</div>
		
		
		<div class="footer" style="width: auto; padding: 0px 0px 0px 0px;">
			<p>&copy; Company 2012</p>
			<p>Posh.com</p>
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
	
    <script src="../bootstrap/js/bootstrap.js"></script>
  </body>
</html>
