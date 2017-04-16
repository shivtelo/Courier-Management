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
	<title>Customers in City</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body style="background-color: #deefde">

<?php 

			$query="SELECT * from userinfo where city='".$_SESSION['city']."' ";
					$query_run=mysqli_query($con,$query);
				
					if($query_run)
					{
					echo "CUSTOMERS OF ". $_SESSION['city'];		
							echo "<table>"; // start a table tag in the HTML
					while($row = mysqli_fetch_array($query_run)){   //Creates a loop to loop through results
					echo "<tr><td>" . $row['pname'] . "</td><td>" . $row['phno'] . "</td></tr>";  //$row['index'] the index here is a field name
					echo "</table>";
				}}
				else
					echo "the query was wrong ;)";
 ?>

 <br>
 <a href="index.php"><input type="button" id="back-button" value="<<Go Back" /></a>

	</body>
</html>