<?php 
session_start();
if(isset($_SESSION['admusername']))
			{
				
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
	<title>Add City</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body style="background-color: #deefde">
	<center><h2>From</h2></center>
	<center><img class="avatar" src="../images/avatar.jpg"></center>
	<form class="myform" action="addcity.php" method="post">
		<label><b>New City Name</b></label>
		<br>
		<input type="text" name="cityname" class="ipvalues" onkeyup="this.value=this.value.toUpperCase()" placeholder="Type City Name" required/>
		<br>
		<br>
		<input type="submit" name="submit_btn" id="register-button" value="Add" />
		<a href="index.php"><input type="button" id="back-button" value="<<Go Back" /></a>
		<br>
	</form>
	<?php
	if(isset($_POST['submit_btn']))
	{
		$cityname=$_POST['cityname'];
				
					$query="select * from city where cityname='$cityname'";
							$query_run=mysqli_query($con,$query);
							
							if(mysqli_num_rows($query_run)>0)
							{
								echo '<script type="text/javascript"> alert("City Already Proposed In Service") </script>';
							}
							else
							{
								$query="insert into city values('$cityname',0)";
								$query_run=mysqli_query($con,$query);
								if($query_run)
									echo '<script type="text/javascript"> alert("City Added but not connected yet") </script>';
								else
									echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
							}
				
	}

	 ?>
</body>
</html>