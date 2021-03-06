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
if(isset($_SESSION['firsttime']))
unset($_SESSION['firsttime']);

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
	<script>
		function setCategory(str){
			$("#cat-btn").text(str);
		}
		
		function submitQuery(){
			var query = $("#query").val();
			var category = $("#cat-btn").text();
			if(category=="All Categories")
				category = "All";
			var url = "filtersearch.php?query="+query+"&checkcategory="+category;
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
						<li  class="active"><a href="../search/searchhome.php">Search</a></li>
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
			<div class="span3">
			<div class="row-fluid">
			<div class="bs-docs-sidebar">
				<ul class="nav nav-list bs-docs-sidenav">
					<li class="header"><i class="icon-chevron-down"></i>All Categories</li>
					<li ><a href="filtersearch.php?query=&checkcategory=Apparels"><i class="icon-chevron-right"></i>Apparels</a></li>
					<li ><a href="filtersearch.php?query=&checkcategory=Electronics"><i class="icon-chevron-right"></i>Electronics</a></li>
					<li ><a href="filtersearch.php?query=&checkcategory=Daily-Needs"><i class="icon-chevron-right"></i>Daily-Needs</a></li>
					<li ><a href="filtersearch.php?query=&checkcategory=Healthcare"><i class="icon-chevron-right"></i>Healthcare</a></li>
					<li ><a href="filtersearch.php?query=&checkcategory=Entertainment"><i class="icon-chevron-right"></i>Entertainment</a></li>
					<li ><a href="filtersearch.php?query=&checkcategory=Sports"><i class="icon-chevron-right"></i>Sports</a></li>
					<li ><a href="filtersearch.php?query=&checkcategory=Books"><i class="icon-chevron-right"></i>Books</a></li>
					<li ><a href="filtersearch.php?query=&checkcategory=Services"><i class="icon-chevron-right"></i>Services</a></li>
					<li ><a href="filtersearch.php?query=&checkcategory=Miscellaneous"><i class="icon-chevron-right"></i>Miscellaneous</a></li>

				</ul>
			</div>
			</div>
			
			</div>
			
			<div class="span9">
			<div class="row-fluid">
				<div class="span1"></div>
				<div class="input-prepend input-append">
					<div class="btn-group">
					<button name="category" id="cat-btn" class="btn">All Categories</button>
					<button class="btn dropdown-toggle" data-toggle="dropdown">
					<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="#" onclick="setCategory(this.text);return false;">All Categories</a></li>
						<li><a href="#" onclick="setCategory(this.text);return false;">Apparels</a></li>
						<li><a href="#" onclick="setCategory(this.text);return false;">Electronics</a></li>
						<li><a href="#" onclick="setCategory(this.text);return false;">Daily-Needs</a></li>
						<li><a href="#" onclick="setCategory(this.text);return false;">Healthcare</a></li>
						<li><a href="#" onclick="setCategory(this.text);return false;">Entertainment</a></li>
						<li><a href="#" onclick="setCategory(this.text);return false;">Sports</a></li>
						<li><a href="#" onclick="setCategory(this.text);return false;">Books</a></li>
						<li><a href="#" onclick="setCategory(this.text);return false;">Services</a></li>
						<li><a href="#" onclick="setCategory(this.text);return false;">Miscellaneous</a></li>
					</ul>
					</div>
						
					<input id="query" name="query" type="text" class="span6" placeholder="Search the database">
					<button class="btn btn-info" onclick="submitQuery();">Search!</button>
				</div>
			</div>
			<?php
				require_once("../dbconnect.php");
				$tbl_name = "inventory";
				$items = DB::query("SELECT * FROM $tbl_name group by addedon DESC");
				$counter = 0;
				
				echo '<hr>';
				echo '<div class="row-fluid">';
				echo '<p class="text-info">Newsfeed - Some items which were added or modified recently: </p>';
				echo '<ul class="thumbnails">';
				
				foreach($items as $item){
				if($item['owner']!=$_SESSION['username']&&$counter<4){
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
					//echo '<p>'.$item['description'].'</p>';
					echo '<p><a href="itemdetails.php?itemid='.$item['itemid'].'"> <button class="btn btn-primary">View Details</button></a></p> '; 
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
					//echo '<p>'.$item['description'].'</p>';
					echo '<p><a href="itemdetails.php?itemid='.$item['itemid'].'"> <button class="btn btn-primary">View Details</button></a></p> '; 
					//echo '<button onclick="" class="btn btn-info">Add to Wishlist</button></p>';
					echo '</div>';
					echo '</div>';
					echo '</li>';
					$counter=$counter+1;
				}
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
					//echo '<p>'.$item['description'].'</p>';
					echo '<p><a href="itemdetails.php?itemid='.$item['itemid'].'"> <button class="btn btn-primary">View Details</button></a></p> '; 
					//echo '<button onclick="" class="btn btn-info">Add to Wishlist</button></p>';
					echo '</div>';
					echo '</div>';
					echo '</li>';
					$counter=$counter+1;
				}
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
				if($items[$id]['owner']!=$_SESSION['username']){	
				if($counter!=0 && $counter%4==0){
					echo '</ul>';
					echo '</div>';
					echo '<div class="row-fluid">';
					echo '<ul class="thumbnails">';
				}
					echo '<li class="span3">';
					echo '<div class="thumbnail">';
					echo '<img src="../upload/'.$items[$id]['image'].'" alt="">';
					echo '<div class="caption">';
					echo '<h3>'.$items[$id]['itemname'].'</h3>';
					//echo '<p>Match Value - '.$mvalue.'</p>';
					//echo '<p>'.$items[$id]['description'].'</p>';
					echo '<p><a href="itemdetails.php?itemid='.$items[$id]['itemid'].'"> <button class="btn btn-primary">View Details</button></a></p> '; 
					//echo '<button onclick="" class="btn btn-info">Add to Wishlist</button></p>';
					echo '</div>';
					echo '</div>';
					//echo $items[$id]['itemname'].'-'.$id.'-'.$mvalue;
					echo '</li>';
					$counter=$counter+1;
				}
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
	
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
  </body>
</html>
