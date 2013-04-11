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

if(isset($_SESSION['firsttime']))
unset($_SESSION['firsttime']);

require_once 'dbconnect.php';

$items = DB::query("SELECT * FROM users WHERE username=%s",$_SESSION['username']);
$items = $items[0];
$password = $items['password'];


?>
<html lang="en">
  <head>
  <script src="signup/validation.js"></script>
  <script type="text/javascript">
		 
   			var password = "<?php echo $password; ?>";
   			var confirm='0';
		 function vop(str)
		 {
			 if (str == password)
			 {
				 document.getElementById("oldpasswordhelp").innerHTML="success";
				 confirm = '1';
				 document.getElementById("changepassworddetails").disabled = false;
			 }
			 else
			 {document.getElementById("oldpasswordhelp").innerHTML="incorrect";
			document.getElementById("changepassworddetails").disabled = true;
			 }
			 
		 }
		
        
		 </script>
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


    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<script>
				
		function submitQuery(){
			var query = $("#query").val();
			var url = "userdetails.php?query="+query;
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
						<li><a href="search/searchhome.php">Search</a></li>
						<li><a href="manageoffers/listoffersbyme.php">Offers & Transactions</a></li>
						<li><a href="inventory/viewitems.php">Sell/Edit Item</a></li>
						<li><a href="helpcenter.php">Help Center</a></li>
						<li class="active"><a href="userdetails.php">My Account</a></li>
						<li><a href="login/logout.php">Log Out</a></li>
					</ul>
				</div>
			</div>	
		</div>
        <div class="container" style="width: auto; padding: 20px 0px 0px 0px;">
			<div class="span3 bs-docs-sidebar">
				<ul class="nav nav-list bs-docs-sidenav">
					
					<li class="active"><a href="#"><i class="icon-chevron-right"></i>Profile</a></li>
                    <li ><a href="wishlist.php"><i class="icon-chevron-right"></i>My Wishlist</a></li>
                    <li><a href="viewnotifications.php"><i class="icon-chevron-right"></i>New Notifications</a></li>
					<li ><a href="#"><i class="icon-chevron-right"></i>Previous Notifications</a></li>
				</ul>
			</div>
        <div class="span9">
			
            
         <?php   
         
		 require_once 'dbconnect.php';
		 
		 if(isset($_SESSION['username'])){
				
				$tbl_name = "users";
				$items = DB::query("SELECT * FROM $tbl_name WHERE username=%s",$_SESSION['username']);
				$counter = 0;
				
				foreach($items as $item){
				$password = $item['password'];
				echo '<form name="changeform" class="form-horizontal" action="detailschange.php" method="post">';
				echo '<div id="container">';

				echo '<table height="300px" width="700px" cellpadding="10"><tr>';
				echo '<td width="250px" height = "100%" valign="top" bgcolor="#ffffff">';
				echo '<img src="https://10.100.56.31:8443/webapp/intranet/StudentPhotos/'.$item['studentid'].'.jpg" width="250px" height="250px" ></td>';
				echo '<td width="200px" height="100%" bgcolor="#ffffff">';

echo '<table height="300px" width="500px" cellpadding="10">';
echo '<tr>';
	echo '<td width="300px" height="12.5%" valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>Username:';
    echo '<td width="200px" height = "12.5%" valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i> ';
	echo $item['username'];
echo '</tr>';

echo '<tr>';
	echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>Student ID:';
    echo '<td width="200px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo ''.$item['studentid'].'';
echo '</tr>';
echo '<tr>';
	echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>First name:';
    echo '<td width="200px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo '<input type="text" name="firstname" required id="inputFirstname" value="'.$item['firstname'].'" onkeyup="validatefname(this.value)">';
echo '</tr>';
echo '<tr>';
	echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>Last name:';
    echo '<td width="200px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo '<input type="text" name="lastname" required id="inputLastname" value="'.$item['lastname'].'" onkeyup="validatelname(this.value)">';
echo '</tr>';
echo '<tr>';
	echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>Email:';
    echo '<td width="200px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo '<input type="text" name="email" required id="inputEmail" value="'.$item['email'].'" onkeyup="validateemail(this.value);">';
echo '</tr>';
echo '<tr>';
	echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>Rating:';
    echo '<td width="200px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo ''.$item['rating'].'<br>';
echo '</tr>';
echo '<tr>';
	echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>Wing:';
    echo '<td width="200px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo '<input type="text" name="Wing" required id="wing" value="'.$item['wing'].'" onkeyup="validatelname(this.value)">';
echo '</tr>';
echo '<tr>';
	echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>Room no:';
    echo '<td width="200px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo '<input class="span1" type="text" name="roomno" required id="inputRoomno" value="'.$item['roomno'].'" onkeyup="validateroomno(this.value)">';
echo '</tr>';
echo '<tr>';
	echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
	echo '<font size="4"><b>Password';
    echo '<td width="200px"  valign="top" bgcolor="#ffffff">';
    echo '<font size="4"><i>';
	echo '<a  href="#myModal" role="button" data-toggle="modal">Change Password</a>';
echo '</tr>';
echo '<tr>';
	echo '<td width="300px"  valign="top" bgcolor="#ffffff">';
	
    echo '<td width="200px"  valign="top" bgcolor="#ffffff">';
    
	echo ' <button class="btn btn-primary" type="submit" id="changedetails" >Save Changes</button>';
echo '</tr>';
echo '</td>';

echo '</td>';
echo '</div>';
echo '</form>>';
				
				
			}}
			else echo 'Enter correct id'
		 ?> 
         
        
         <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<!--button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button-->
				<h3 id="myModalLabel">Change Password</h3>
			</div>
            <div class="modal-body">
				    <form name="signup" class="form-horizontal" action="passchange.php" method="post">
                    <div class="control-group" id="passgroup">
							<label class="control-label" for="inputPassword">Password</label>
							<div class="controls">
							<input type="password" required name="password" id="inputPassword" placeholder="Password" onkeyup="validatepassword(this.value);">
							<span class="help-inline" id="passwordhelp"></span>
							</div>
						</div>
						<div class="control-group" id="verigroup">
							<label class="control-label" for="inputVerify">Verify Password</label>
							<div class="controls">
							<input type="password" name="verifypassword" required id="inputVerify" placeholder="Again Password" onkeyup="validateverify(this.value);">
							<span class="help-inline" id="verifyhelp"></span>
							</div>
						</div>
                        <div class="control-group" id="passgroup">
							<label class="control-label" for="CurrentPassword"> Current Password</label>
							<div class="controls">
							<input type="password" required name="oldpassword" id="inputoldPassword" placeholder="Password" onkeyup="vop(this.value);">
							<span class="help-inline" id="oldpasswordhelp"></span>
							</div>
						</div>

                   <button class="btn btn-primary" type="submit" id="changepassworddetails" disabled >Save Changes</button>
                    	
                    </div>
               </div>     
            </div> 
            
             
       <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>      
           
        </body>
        </html>
        
        