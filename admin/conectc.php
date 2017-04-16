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
	<title>Track Your Courier::City Connection Page</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body style="background-color: #deefde">
<div id="container">
	<center><h2>City Connection Page</h2></center>

	<center><img class="avatar" src="../images/avatar.jpg"></center>
	<form class="myform" action="conectc.php" method="post">
	<label > <b>City1</b></label>
		<select name="sc" class="ipvalues2" required>
		<option value="">Road From</option>
		<?php 
			$query="select * from city";
					$query_run=mysqli_query($con,$query);
						while($row = mysqli_fetch_array($query_run)){
							if($row['constat']==1)
							echo "<option value='" . $row['cityname'] . "'>" . $row['cityname'] . "</option>";}
		 ?>
		 </select>
		 <label > <b>City2</b></label>
		<select name="dc" class="ipvalues2" required>
		<option value="">Road to</option>
		<?php 
			$query="select * from city";
					$query_run=mysqli_query($con,$query);
						while($row = mysqli_fetch_array($query_run)){
							if($row['constat']==0)
							echo "<option value='" . $row['cityname'] . "'>" . $row['cityname'] . "</option>";}
		 ?>
		 </select>
		 <br>
		 <label>Distance</label>
		 
		 <br>
		 <input type="text" name="dst" id="ipvalues" placeholder="Nearest to kilometers" required/>
		 <input type="submit" name="submit_btn" id="register-button" value="Connect Them" />
		 <a href="index.php"><input type="button" id="back-button" value="<<Go Back" /></a>
		<br>
		 </form>
		 <?php 
		 if(isset($_POST['submit_btn']))
		{
					//	echo '<script type="text/javascript"> alert("Addition Successful!!") </script>';
		 $city1=$_POST['sc'];
		 $city2=$_POST['dc'];
		 $dst=$_POST['dst'];
				
					$query3="SELECT * from distlist WHERE city1='$city1'";
					$query_run3=mysqli_query($con,$query3);
					while($row = mysqli_fetch_array($query_run3))
					{   //Creates a loop to loop through results
						$tcn=$row['city2'];
						$tcd=$row['dist'];
					$query4="insert into distlist values('$city2','$tcn','$tcd'+'$dst')";
					$query_run4=mysqli_query($con,$query4);
					$query4="insert into distlist values('$tcn','$city2','$tcd'+'$dst')";
					$query_run4=mysqli_query($con,$query4);
					}
		 
		 		$query="insert into distlist values('$city1','$city2','$dst')";
				$query_run=mysqli_query($con,$query);
				$query="insert into distlist values('$city2','$city1','$dst')";
				$query_run=mysqli_query($con,$query);

					$query2="UPDATE city SET constat=1 WHERE cityname='$city2'";
					$query_run2=mysqli_query($con,$query2);
					if($query_run2)
						{
							echo '<script type="text/javascript"> alert("Addition Successful!!") </script>';
							header('location: conectc.php');
						}
					else
						echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
		}
		  ?>
		 </div>
		 </body>
		 </html>