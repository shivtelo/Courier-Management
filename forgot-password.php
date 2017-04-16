<?php 
session_start();
if(isset($_SESSION['username']))
			{
				header('location:customer');
			}
else if(isset($_SESSION['empusername']))
			{
				header('location:employee');
			}	
else
	{
		#	echo '<script type="text/javascript"> alert("All in vain") </script>';
	}			
require 'dbconfig/config.php';
?><!DOCTYPE html>
<html>
<head>
        <title>Forgot Password | TYC </title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="js/jquery.min.js"></script>-->
<script src="js/jquery-1.8.3.js"></script>
 <!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
 <!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!----webfonts--->
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css' />-->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,900italic,900,700italic,700,500italic,500,400italic' rel='stylesheet' type='text/css' />
<!---//webfonts--->
    </head>
<body>
    <!---- container ---->
<!---- header ----->
<div class="header  about-head "  >
        <div class="container">
                <!--- logo ----->
                <div class="logo">
                    <img src="images/logo45.png" alt="Logo"  /> <a href="index.php"><span></span>TYC</a>
                </div>
                <!--- logo ----->
<!--- top-nav ----->
<div class="top-nav">
    <span class="menu"> </span>
    <ul>
        <li ><a href="index.php">Home</a></li>
        <!--<li ><a href="faq.php">FAQ</a></li>-->
        <li ><a href="contact.php">Contact</a></li>
                <li ><a href="login.php">Login</a></li>
        <li ><a href="register.php">Register</a></li>
            </ul>
</div>
<div class="clearfix"> </div>
<!--- top-nav ----->
        <!----- script-for-nav ---->
<script>
        $( "span.menu" ).click(function() {
          $( ".top-nav ul" ).slideToggle( "slow", function() {
            // Animation complete.
          });
        });
</script>
<!----- script-for-nav ---->
        </div>
    </div>
<!---- header ----->
<!------ about ---->
<div class="about">
    <!--- bradcrumbs ---->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-left">
                <h1>Reset Your Password</h1>
            </div>
            <div class="breadcrumbs-right">
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--- bradcrumbs ---->
</div>
<div class="about-top-grids">
        <div class="container">
        <div class="contact-grids">
            <div class="contact-right">
                <h2>Reset Your Password</h2>
                
               
<form name="post_load" id="post_load" method="post" autocomplete="off" action="forgot-password.php">
<!--    <p style="font:12px Arial,Helvetica,sans-serif;">Please Submit your Login Email Id.</p>-->
    <div>
        <span>Email Id</span>
        <input type="email" size="32" maxlength="48" class="required" name="eml" />
    </div>
    <input type="submit" Value="Reset Password" name="sendpwd" />
</form>
<?php  
if(isset($_POST['sendpwd']))
{
$eml=$_POST['eml'];
$query="select * from empuserinfo where eml='".$eml."'";
$query_run=mysqli_query($con,$query);

$query2="select * from userinfo where eml='".$eml."'";
$query_run2=mysqli_query($con,$query2);
if($row = mysqli_fetch_array($query_run))
{$_SESSION['tp']=$row['password'];
$_SESSION['eml']=$eml;
$_SESSION['unm']=$row['username'];
header("location:mailer.php");
}
else if($row = mysqli_fetch_array($query_run2))
{$_SESSION['tp']=$row['password'];
$_SESSION['eml']=$eml;
$_SESSION['unm']=$row['username'];
header("location:mailer.php");
}
else
{
 echo '<script type="text/javascript"> alert("Email Address Not in our data base") </script>';
}
}
?>


            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

</div>

<div class="footer">
    <div class="top-footer">
            <div class="container">
                    <div class="top-footer-grids">
                            <div class="top-footer-grid">
                                    <h3>Contact us</h3>
                                    <ul class="address">
                                        <li><span class="map-pin"> </span><label>AP Kanvide Bhawan <br>3122 3 Chatrawaas <br>Near Powai Lake, Bhopal MP (462003) </label></li>
                                        <li><span class="mob"> </span>Ph & Fax no - 0995-5377130, Mob- 8000000008</li>
                                        <li><span class="msg"> </span><a href="#">hello@tyc.in</a></li>
                                    </ul>
                            </div>
                            <div class="top-footer-grid">
                                    <h3>Important Links</h3>
                                    <ul class="latest-post">
                                        <li><a href="index.php">Home</a> </li>
                                         
                                        <li><a href="register.php">Register</a> </li>
                                        <li><a href="login.php">Login</a> </li>
                                    </ul>
                            </div>
                            <div class="top-footer-grid">
                                    <h3>Other Links</h3>
                                    <ul class="latest-post">
                                        <li><a href="about-us.php">About Us</a> </li>
                                        <li><a href="privacy-policy.php">Privacy Policy</a> </li>
                                        <li><a href="terms-and-condition.php">Terms & Conditions</a> </li>
                                        <li><a href="faq.php">Help & FAQs</a> </li>
                                        <li><a href="contact.php">Contact Us</a> </li>
                                    </ul>
                            </div>
                            <div class="clear"> </div>
                    </div>
            </div>
    </div>
    <!----start-bottom-footer---->
    <div class="bottom-footer">
            <div class="container"> 
                    <div class="bottom-footer-left">
                        
                             <p> &copy; 2017 TYC.in. All rights reserved | Powered by: <a href="http://www.facebook.com/shivtelo" target="_blank">Techvish Technologies</a></p>
                    </div>
                    <div class="clear"> </div>
            </div>
    </div>
    <!----//End-bottom-footer---->
</div>
    </body>
</html>