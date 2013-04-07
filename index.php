<!DOCTYPE html>
<?php session_start() ?>
<html lang="en">
  <head>
	<script src="signup/validation.js"></script>
	<meta charset="utf-8">
    <title>Posh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="bootstrap/css/docs.css" rel="stylesheet">

    <style type="text/css">
		body {
			padding-top: 20px;
		}

		/* Custom container */
		.container-narrow {
			margin: 0 auto;
			max-width: 700px;
		}
		.container-narrow > hr {
			margin: 30px 0;
		}

		/* Main marketing message and sign up button */
		.jumbotron {
			margin: 60px 0;
			text-align: center;
		}
		.jumbotron h1 {
			font-size: 72px;
			line-height: 1;
		}
		  
		.jumbotron .btn-large {
			font-size: 21px;
			padding: 14px
		}

		/* Supporting marketing content */
		.marketing {
			margin: 60px 0;
		}
		.marketing p + h4 {
			margin-top: 28px;
		}
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	</head>

	<body>

    <div class="container-narrow">

		<div class="masthead">
			<ul class="nav nav-pills pull-right">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
			<h2 class="muted">Posh</h2>
		</div>

		<hr>

		<div class="jumbotron">
			<h1>Welcome to Posh!</h1>
			<p class="lead">Posh is your final destinantion for the inner merchant in you. It allows you to sell, swap and rent your goods with great ease!</p>
			<a class="btn btn-large btn-success" href="#myModal" role="button" data-toggle="modal">Sign up today!</a>
			<hr>
			<form class="form-inline" name="loginform" action="login/login.php" method="post">
				<p>Existing user?</p>
				<?php 
					if(isset($_SESSION['loginfailed']))
						if($_SESSION['loginfailed']==1){
							echo "<p><font color=\"red\">Oops! Please enter correct Username and Password</p></font>";
							$_SESSION['loginfailed']=0;
						};
					if (isset($_SESSION['username'])){
						if ($_SESSION['failedlogin'] == 0);
							header("location:search/searchhome.php");
					}			
				?>
				<input type="text" id="username" name="username" class="input-small" placeholder="Username" >
				<input type="password" id="password" name="password" class="input-small" placeholder="Password" >
				<button type="submit" class="btn" >Sign in</button>
				<hr>
			</form>
		</div>
	  
		<!-- Modal -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<!--button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button-->
				<h3 id="myModalLabel">Sign-up Details</h3>
			</div>
			<div class="modal-body">
				    <form name="signup" class="form-horizontal" action="signup/signup.php" method="post">
						<div class="control-group" id="usergroup">
							<label class="control-label" for="inputUsername">Username</label>
							<div class="controls">
							<input type="text" name="username" required id="inputUsername" placeholder="Username" onkeyup="validateuser(this.value);">
							<span class="help-inline" id="usernamehelp"></span>
							</div>
						</div>
						<div class="control-group" id="emailgroup">
							<label class="control-label" for="inputEmail">Email</label>
							<div class="controls">
							<input type="text" name="email" required id="inputEmail" placeholder="Email" onkeyup="validateemail(this.value);">
							<span class="help-inline" id="emailhelp"></span>
							</div>
						</div>
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
						<hr>
						<div class="control-group" id="studentidgroup">
							<label class="control-label" for="inputStudentid">Student ID</label>
							<div class="controls">
							<input type="text" name="studentid" required id="inputStudentid" placeholder="Your Student ID" onkeyup="validatestudentid(this.value);">
							<span class="help-inline" id="studentidhelp"></span>
							</div>
						</div>
						<div class="control-group" id="firstnamegroup">
							<label class="control-label" for="inputFirstname">First Name</label>
							<div class="controls">
							<input type="text" name="firstname" required id="inputFirstname" placeholder="First Name" onkeyup="validatefname(this.value)">
							<span class="help-inline" id="firstnamehelp"></span>
							</div>
						</div>
						<div class="control-group" id="lastnamegroup">
							<label class="control-label" for="inputLastname">Last Name</label>
							<div class="controls">
							<input type="text" name="lastname" required id="inputLastname" placeholder="Last Name" onkeyup="validatelname(this.value)">
							<span class="help-inline" id="lastnamehelp"></span>
							</div>
						</div>
						<div class="control-group" id="winggroup">
							<label class="control-label" for="inputWing">Room Number</label>
							<div class="controls">
							<select class="span1" name="wing" required id="inputWing">
								<option>A</option>
								<option>B</option>
								<option>C</option>
							</select>
							<input class="span1" type="text" name="roomno" required id="inputRoomno" placeholder="Room" onkeyup="validateroomno(this.value)">
							<span class="help-inline" id="winghelp"></span>
							</div>
						</div>
			</div>
			<div class="modal-footer">
				<button class="btn" type="button" data-dismiss="modal" aria-hidden="true">Close</button>
				<button class="btn btn-primary" type="submit" id="signupbtn" disabled>Submit</button>
			</div>
			</form>
		</div>

		<div class="row-fluid marketing">
			<div class="span6">
				<h4>Subheading</h4>
				<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

				<h4>Subheading</h4>
				<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

				<h4>Subheading</h4>
				<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
			</div>

			<div class="span6">
				<h4>Subheading</h4>
				<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

				<h4>Subheading</h4>
				<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

				<h4>Subheading</h4>
				<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
			</div>
		</div>

		<hr>

		

    </div> <!-- /container -->
	<div class="footer" style="width: auto; padding: 0px 0px 0px 0px;">
			<p>&copy; Company 2012</p>
			<p>Posh.com</p>
		</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
  </body>
</html>
