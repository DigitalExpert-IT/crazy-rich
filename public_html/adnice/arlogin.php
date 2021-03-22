<?php
session_start();
include_once '../assets/dbconnect.php';


if(isset($_SESSION['user'])!="")
{

}


if(isset($_POST['btn-login']))
{
if(empty($_POST['email']) || empty($_POST['password'])){
  echo"<script>window.location.href = 'login.php'; alert('Empty Login')</script>";
} 
$email = mysqli_real_escape_string($con,$_POST['email']);
$upass = mysqli_real_escape_string($con,$_POST['password']);
echo $qulog="SELECT * FROM admin_users WHERE email_admin='$email'";



$res=mysqli_query($con,"$qulog");
$row=mysqli_fetch_array($res);
$md5pass=md5($upass);


if($row['password_admin']==md5($upass))
{

 
    $_SESSION['admin_id'] = $row['autono'];
   
    $_SESSION['email_admin'] = $row['email_admin'];
   
	$_SESSION['status'] = $row['status'];
  
    header("Location: index.php");
  
}
else
{

    header("Location: login.php");

}

}else{
 echo $qulog;

}
?>
