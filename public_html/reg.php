<?php
include('assets/dbconnect.php');
ini_set('display_errors', 1);


// set default time asia/jakarta
date_default_timezone_set("Asia/Jakarta");
$time = time();
$time_now = date("Y-m-d H:i:s", $time);

$d = date("d");
$m = date("m");
$y = date("Y");
$t = time();
$dmt = $d + $m + $y + $t;
$ran = rand(0, 10000000);
$dmtran = $dmt + $ran;
$un =  uniqid();
$dmtun = $dmt . $un;
$mdun = md5($dmtran . $un);
$randomkey = substr($mdun, 25); // if you want sort length code.

$name =  $_POST['fullname'];
$refcode = $_POST['reffcode'];
$passwords = password_hash($_POST['password1'], PASSWORD_DEFAULT);

if ($refcode != '') {
  $quref = "select * from users where reff_code='$_POST[reffcode]'";
  $rsfref = mysqli_query($con, $quref);
  $rwfef = mysqli_fetch_array($rsfref);
  $idref = $rwfef['user_id'];
} else {
  $idref = 0;
}
if ($_POST['email'] != '') {
  $email = mysqli_real_escape_string($con, $_POST['email']);
} else {
  $email = null;
}
$quadd = "INSERT into users set reff_id='$idref',nama='$name',phone='$_POST[phone]',email_user='$email',password='$passwords',verify_code='$mdun',reff_code='$randomkey',status='1',date_join='$time_now'";

$regist = mysqli_query($con, $quadd);
echo $quadd;
echo '<br>';
echo $regist;
if ($regist) {
  echo "<script>alert('Register Success'); window.location.href = 'index.php';</script>";
} else {
  echo "<script>alert('Register Fail, Please Try Again'); window.location.href = 'index.php';</script>";
}
