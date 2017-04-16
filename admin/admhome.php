<?php 
session_start();

if(isset($_SESSION['admusername']))
		{
		#ok login
			}
	else
	{
		header('location:index.php');
	}			
require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Logged In</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body style="background-color: #deefde">
<div id="container">
	<center><h2>Admin Home Page</h2></center>

	<center><h3>Welcome Admin
	</h3></center>
	<center><img class="avatar" src="../images/avatar.jpg"></center>
	<form class="myform" action="admhome.php" method="post">
		<a href="addcity.php"><input type="button" id="register-button" value="Add City" /></a>
		<br>
		<a href="conectc.php"><input type="button" id="login-button" value="Connect" /></a>
		<br>
		<br>
		<a href="browsec.php"><input type="button" id="register-button" value="Browse Cities"></a>
		<br>
		<br>
		<input type="submit" name="logout" id="logout-button" value="Logout" />
		<br>
		<br>
		</form>
		<?php
		if(isset($_POST['logout']))
		{ 
			///we will log you out
				if(isset($_SESSION['admusername']))
					{
					$_SESSION = [];
					session_destroy();
					}
					header('location:admhome.php');
		}
		?>	
</div>
</body>

</html>