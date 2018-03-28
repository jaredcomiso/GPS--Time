<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Vehicle Section</title>

    <!-- Bootstrap core CSS -->
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="css/transactionSection.css" type="text/css">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  <script type="text/javascript" language="javascript" src="js/confirm.js"></script>
          
          
</head>

<body>
	<div class="container">
		<div class="row">
			<h1>VEHICLE TRACKING SYSTEM</h1>
			<center><h3>Welcome <?php echo $_SESSION['username']; ?></h3></center>
				<nav class="navbar navbar-inverse">
			  		<div class="container-fluid">
			    		<div class="navbar-header">
			      			<a class="navbar-brand" href="#"></a>
			    		</div>
			    <ul class="nav navbar-nav">
			      <li><a href="adminSection.php">Account's Section</a></li>
			      <li><a href="driverSection.php">Driver's Section</a></li>
			      <li><a href="vehicleSection.php">Vehicle's Section</a></li>
			      <li class="active"><a href="transactionSection.php">Transaction's Section</a></li>
			    </ul>
			  		</div>
				</nav>
		</div>
	</div>
</body>