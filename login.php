<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Log in Page</title>
        <link rel="stylesheet" href="css/login.css" type="text/css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>    
    </head>
    <body>
       <div class="container">
        <div class="card card-container">
           <h1 style="text-align:center">Log-in Page</h1>
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="login.php" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputText" class="form-control" placeholder="Username" name="username" required>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">Sign in</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
    
    
    
    <?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				$query = "select * from registerdb where username='$username' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					header( "Location: adminSection.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
    </body>
</html>