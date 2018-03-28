<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Admin Account</title>

    <!-- Bootstrap core CSS -->
		  <meta charset="utf-8">
		  <link rel="stylesheet" href="css/adminSection.css" type="text/css">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  <script type="text/javascript" language="javascript" src="js/confirm.js"></script>
          
          
</head>

<body>
	<div class="container">
		<div class="row">
			<h1>VEHICLE TRACKING SYSTEM</h1>
			<center><h3>Welcome <?php echo $_SESSION['firstName']; ?> <?php echo $_SESSION['middleInitial']; ?>. <?php echo $_SESSION['lastName']; ?></h3></center>
				<nav class="navbar navbar-inverse">
			  		<div class="container-fluid">
			    		<div class="navbar-header">
			      			<a class="navbar-brand" href="#"></a>
			    		</div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="adminSection.php">Account's Section</a></li>
			      <li><a href="driverSection.php">Driver's Section</a></li>
			      <li><a href="vehicleSection.php">Vehicle's Section</a></li>
			      <li><a href="transactionSection.php">Transaction's Section</a></li>
			    </ul>
			  		</div>
				</nav>
			  
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							<a href="registration.php"><button type="button" class="btn btn-primary btn-block">Add</button></a>
						</div>
						<div class="col-sm-3">
							<a href="login.php"><button type="button" class="btn btn-primary btn-block">Logout</button></a>
						</div>
			  			<div class="col-sm-3">
							<input type="submit" class="btn btn-primary btn-block" name="search" value="Filter"></input>
						</div>
						<div class="col-sm-3">
							<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Id Number.."></input>
						</div>
					</div>
              </div>
        </div>

       	<table id="myTable">
        <tr>
        <th style="text-align: center">Id Number</th>
        <th style="text-align: center">First Name</th>
        <th style="text-align: center">Middle Initial</th>
        <th style="text-align: center">Last Name</th>
        <th style="text-align: center">Gender</th>
        <th style="text-align: center">Age</th>
        <th style="text-align: center">Address</th>
        <th style="text-align: center">Username</th>
        <th style="text-align: center">Password</th>
        </tr>
        <?php
        $query = "select * from registerdb";
        $query_run = mysqli_query($con, $query);
        
        while($row =mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
        echo "<form action=adminSection.php method=POST>";
        echo "<tr>";
        echo "<td>" . "<input type=text name=idNumber value= " . $row['idNumber'] . " </td>";
        echo "<td>" . "<input type=text name=firstName value= " . $row['firstName'] . " </td>";
        echo "<td>" . "<input type=text name=middleInitial value=" . $row['middleInitial'] . " </td>";
        echo "<td>" . "<input type=text name=lastName value=" . $row['lastName'] . " </td>";
        echo "<td>" . "<input type=text name=gender value=" . $row['gender'] . " </td>";
        echo "<td>" . "<input type=text name=age value=" . $row['age'] . " </td>";
        echo "<td>" . "<input type=text name=address value=" . $row['address'] . " </td>";
        echo "<td>" . "<input type=text name=username value=" . $row['username'] . " </td>";
        echo "<td>" . "<input type=text name=password value=" . $row['password'] . " </td>";

        echo "<td>" . "<input type=hidden name=hidden value=" . $row['idNumber'] . " </td>";
       	echo "<td>" . "<input type=submit name=update value=update " . "</td>";

       	echo "<td>" . "<input type=submit name=delete class=delete data-confirm=Delete? value=delete " . "</td>";
       	echo "</tr>";
        echo "</form>";
        }
        echo "</table>";


        if (isset($_POST['update'])){
		$UpdateQuery = "UPDATE registerdb SET idNumber='$_POST[idNumber]', firstName='$_POST[firstName]', middleInitial='$_POST[middleInitial]', lastname='$_POST[lastName]', gender='$_POST[gender]', address='$_POST[address]', username='$_POST[username]', password='$_POST[password]' WHERE idNumber='$_POST[hidden]'";

		mysqli_query($con, $UpdateQuery);
		};
        
        if (isset($_POST['delete'])){
		$DeleteQuery = "DELETE FROM registerdb WHERE idNumber='$_POST[hidden]'"; 
		mysqli_query($con, $DeleteQuery);
		};


        ?>
    </div>

<script  src="js/confirm.js"></script>
<script src="js/search.js"></script>
</body>


</html>
