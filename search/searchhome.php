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
			padding-bottom: 20px;
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
			var url = "test.php?query="+query+"&category="+category;
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
			<div class="row-fluid">
			<div class="bs-docs-sidebar">
				<ul class="nav nav-list bs-docs-sidenav">
					<li class="header"><i class="icon-chevron-down"></i>All Categories</li>
					<li ><a href="searchhome.php?category=A"><i class="icon-chevron-right"></i>Category A</a></li>
					<li ><a href="searchhome.php?category=B"><i class="icon-chevron-right"></i>Category B</a></li>
					<li><a href="searchhome.php?category=C"><i class="icon-chevron-right"></i>Category C</a></li>
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
						<li><a href="#" onclick="setCategory(this.text);return false;">Category A</a></li>
						<li><a href="#" onclick="setCategory(this.text);return false;">Category B</a></li>
					</ul>
					</div>
						
					<input id="query" name="query" type="text" class="span6" placeholder="Search the database">
					<button class="btn btn-info" onclick="submitQuery();">Search!</button>
				</div>
			</div>
			</div>
			

		</div>
		
		
		<div class="footer" style="width: auto; padding: 0px 0px 0px 20px;">
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
