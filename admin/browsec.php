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
	<title>Track Your Courier::City Browsing Page</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body style="background-color: #deefde">
<div id="container">
	<center><h2>City Browsing Page</h2></center>

	<center><img class="avatar" src="../images/avatar.jpg"></center>
	<form class="myform" action="browsec.php" method="post">
	<label > <b>City</b></label>
		<select name="city" class="ipvalues2" required>
		<option value="">--Select--</option>
		<?php 
			$query="select * from city";
					$query_run=mysqli_query($con,$query);
						while($row = mysqli_fetch_array($query_run)){
							if($row['constat']==1)
							echo "<option value='" . $row['cityname'] . "'>" . $row['cityname'] . "</option>";}
		 ?>
		 </select>
		 <br>
		 <br>
	<label > <b>BW</b></label>
		<select name="bw" class="ipvalues2" required>
		<option value="">--Select--</option>
		<option value="emp">Employee</option>
		<option value="cust">Cutomers</option>
		<option value="cons">Consignments</option>
		 </select>
		 <br>
		 <br>
		 <input type="submit" name="submit_btn" id="register-button" value="Browse" />
		 <a href="index.php"><input type="button" id="back-button" value="<<Go Back" /></a>
		<br>
		 </form>
		 <?php 
		 if(isset($_POST['submit_btn']))
		{
		//echo '<script type="text/javascript"> alert("Okey we will browse it later!!") </script>';
		 $city=$_POST['city'];
		 $ch=$_POST['bw'];
		 $_SESSION['city']=$city;
		 //echo $_SESSION['city'];
		if($ch=='emp')
		header('location:empview.php');
		else if($ch=='cust')
		header('location:custview.php');
		else
		header('location:consview.php');
		}
		  ?>
		 </div>
		 </body>
		 </html>