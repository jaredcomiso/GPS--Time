<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration Page</title>
        <link rel="stylesheet" href="css/register.css" type="text/css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>    
    </head>
    <body>
       <div class="container">
        <div class="card card-container">
            <h1 style="margin-bottom:20px;">Registration Page</h1>
            <p id="profile-name" class="profile-name-card"></p>


            
            
            <form class="form-signin" action="registration.php" method="post">
                <span id="registration" class="registration"></span>
                <input type="number" id="inputId" class="form-control" placeholder="Id Number" name="idNumber" required>
                <input type="text" id="inputFname" class="form-control" placeholder="First Name" name="firstName" required>
                <input type="text" id="inputMinitial" class="form-control" placeholder="Middle Initial" name="middleInitial" required>
                <input type="text" id="inputLname" class="form-control" placeholder="Last Name" name="lastName" required>
                
                <div class="row">
                       <div class="col-md-4">
                           <h4>Gender:</h4>
                       </div>
                        <div class="form-check col-md-4">
                            <label class="form-check-label">
                                <input type="radio" name="gender" class="form-check-input resize-button" value="Male">1 - Male
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <label class="form-check-label">
                                <input type="radio" name="gender" class="form-check-input" value="Female">2 - Female
                            </label>
                        </div>
                </div>
                <input type="number" id="inputAge" class="form-control" placeholder="Age" name="age" required>
                <input type="text" id="inputAddress" class="form-control" placeholder="Address" name="address" required>
                <input type="text" id="inputUserName" class="form-control" placeholder="Username" name="username" required>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <input type="password" id="inputPassword" class="form-control" placeholder="Confirm Password" name="cpassword" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="register_btn">Register</button>
            </form>
             <form class="form-signin" action="login.php" method="post">
               <a href="login.php"><button class="btn btn-lg btn-primary btn-block btn-signin" type="button">Cancel</button></a>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
      	<?php
			if(isset($_POST['register_btn']))
			{
                @$idNumber=$_POST['idNumber'];
                @$firstName=$_POST['firstName'];
                @$middleInitial=$_POST['middleInitial'];
                @$lastName=$_POST['lastName'];
                @$gender=$_POST['gender'];
                @$age=$_POST['age'];
                @$address=$_POST['address'];
				@$username=$_POST['username'];
				@$password=$_POST['password'];
                @$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$query = "SELECT * FROM registerdb where username='$username'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into registerdb values('$idNumber','$firstName','$middleInitial','$lastName','$gender','$age','$address','$username','$password')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['idNumber'] = $idNumber;
                                $_SESSION['firstName'] = $firstName;
                                $_SESSION['middleInitial'] = $middleInitial;
                                $_SESSION['lastName'] = $lastName;
                                $_SESSION['gender'] = $gender;
                                $_SESSION['age'] = $age;
                                $_SESSION['address'] = $address;
                                $_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								header( "Location: login.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
            else{
            
            }
        

?>
    </body>
</html>


