<?php 
session_start();
if(isset($_SESSION['eml']))
{
$to=$_SESSION['eml'];
$sub='Forgot Password Request';
$msg="Hi ".$_SESSION['unm'].", your password is ".$_SESSION['tp'].". Now you can go and login";
$hed='from: no-reply';
$sent=mail($to,$sub,$msg,$hed);
if($sent)
	{echo '<script type="text/javascript"> alert("Check Your Mail Box To Know Your Password") </script>';
											$_SESSION = [];
											session_destroy();
}
else
{
	echo '<script type="text/javascript"> alert("Sorry, unable to Send") </script>';
											$_SESSION = [];
											session_destroy();
}
}
else
{
	header('location:contact.php');
}
 ?>
<a href="index.php">click to go back</a>