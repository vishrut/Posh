<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['username'])){
	$_SESSION['loginfailed'] = 1;
	header("location:index.php");
}

?>
<html lang="en">
  <head>
	<meta charset="utf-8">
    <title>Posh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/docs.css" rel="stylesheet">

    <style type="text/css">
		body {
			padding-top: 40px;
		}


	#container
	{
		padding:auto;
		margin:auto;
		width:700px; 
		overflow:auto;
		
		}
		body .modal {
    /* new custom width */
    width: 1000px;
    /* must be half of the width, minus scrollbar on the left (30px) */
    margin-left: -475px;
}


    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<script>
				
		function submitQuery(){
			var query = $("#query").val();
			var url = "user.php?query="+query;
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
						<li><a href="#">Search</a></li>
						<li><a href="#">What I'm Buying</a></li>
						<li><a href="inventory/viewitems.php">Sell an Item</a></li>
						<li><a href="#">Help Center</a></li>
						<li class="active"><a href="#">My Account</a></li>
						<li><a href="login/logout.php">Log Out</a></li>
					</ul>
				</div>
			</div>	
		</div>
        <div class="span9">
			
            
         <?php   
         
		 require_once 'dbconnect.php';
		 
		 if(isset($_GET['query']))
		 {
				
				$tbl_name = "users";
				$items = DB::query("SELECT * FROM $tbl_name WHERE username=%s",$_GET['query']);
				$counter = 0;
				
				foreach($items as $item){
				echo '<div id="container">';

				echo '<table height="300px" width="700px" cellpadding="10"><tr>';
				echo '<td width="200px" height = "100%" valign="top" bgcolor="#ffffff">';
				echo '<img src="https://10.100.56.31:8443/webapp/intranet/StudentPhotos/'.$item['studentid'].'.jpg" width="200px" 						height="200px" ></td>';
				echo '<td width="200px" height="100%" bgcolor="#ffffff">';

				echo '<table height="300px" width="450px" cellpadding="10">';
				echo '<tr>';
				echo '<td width="150px" height = "12.5%" valign="top" bgcolor="#ffffff">';
				echo '<font size="4"><b>Username:';
    			echo '<td width="300px" height = "12.5%" valign="top" bgcolor="#ffffff">';
    			echo '<font size="4"><i> ';
				echo ''.$item['username'].'';
				echo '</tr>';

				echo '<tr>';
				echo '<td width="150px"  valign="top" bgcolor="#ffffff">';
				echo '<font size="4"><b>Student ID:';
    echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo ''.$item['studentid'].'';
echo '</tr>';
echo '<tr>';
	echo '<td width="150px"  valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>First name:';
    echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo ''.$item['firstname'].'';
echo '</tr>';
echo '<tr>';
	echo '<td width="150px"  valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>Last name:';
    echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo ''.$item['lastname'].'<br>';
echo '</tr>';
echo '<tr>';
	echo '<td width="150px"  valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>Email:';
    echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo ''.$item['email'].'';
echo '</tr>';
echo '<tr>';
	echo '<td width="150px"  valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>Rating:';
    echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo ''.$item['rating'].'<br>';
echo '</tr>';
echo '<tr>';
	echo '<td width="150px"  valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>Wing:';
    echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo ''.$item['wing'].'<br>';
echo '</tr>';
echo '<tr>';
	echo '<td width="150px"  valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>Room no:';
    echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo ''.$item['roomno'].'<br>';
echo '</tr>';
echo '<tr>';
	echo '<td width="150px"  valign="top" bgcolor="#ffffff">';
	echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
 	echo '<font size="4"><i>';
	echo '<a  href="#myModal" role="button" data-toggle="modal">View all items of this user</a>';
echo '</tr>';
echo '</td>';

echo '</td>';
echo '</div>';
			}
		   
			$header = 'Other Items of'.$_GET['query'];
		echo ' <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:scroll; height:500px; width:920px;">';
		echo '<div class="modal-header">';
		echo '<!--button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button-->';
		echo '<h3 id="myModalLabel">Other items of this user.</h3>';
		echo '</div>';
            
        echo '          '; 

			require_once 'dbconnect.php';
			$tbl_name = "inventory";
			$items = DB::query("SELECT * FROM $tbl_name WHERE owner=%s",$_GET['query']);
			$counter = 0;
			echo '<div class="span9">';
			//echo '<p><h4><a href="viewitems.php">My Items </a></h4></p>';
			//echo '<hr>';
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
				echo '<img src="upload/'.$item['image'].'" alt="">';
				echo '<div class="caption">';
				echo '<h3>'.$item['itemname'].'</h3>';
				echo '<p>'.$item['description'].'</p>';
				//echo '<p><a href="edititem.php?q='.$item['itemid'].'"> <button class="btn btn-primary">Edit Item</button></a> '; 
				//echo '<button onclick="showConfirmation('.$item['itemid'].')" class="btn btn-danger">Delete Item</button></p>';
				echo '</div>';
				echo '</div>';
				echo '</li>';
				$counter=$counter+1;
			}
			
			echo '</ul>';
			echo '</div>';
			echo '</div>';

        echo '            </div>';
         echo '      </div>';     
         echo '   </div>';
}
			else echo 'Enter correct id';
            ?>  
       <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>      
            
        </body>
        </html>
        
        