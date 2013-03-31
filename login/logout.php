<?php
// Put this code in first line of web page.
session_start();
session_destroy();
?>

<html>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<style type="text/css">
		body {
			padding-top: 20px;
		}
	</style>	

	<body>
		<p>Successfully logged out</p>
		<hr>
		<a class="btn" href="../index.php" role="button">Go back to Home Page</a>
    
		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="../bootstrap/js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>

	</body>
</html>