<?php
include('assets/dbconnect.php');
ini_set('display_errors', 1);


// set default time asia/jakarta
date_default_timezone_set("Asia/Jakarta");
$time = time();
$time_now = date("Y-m-d H:i:s", $time);

$name = mysqli_real_escape_string($con, $_POST['fullname']);
$refcode = $_POST['reffcode'];
$passwords = password_hash($_POST['password1'], PASSWORD_DEFAULT);

if (!empty($refcode)) {
  $quref = "select * from users where reff_code='$_POST[reffcode]'";
  $rsfref = mysqli_query($con, $quref);
  $rwfef = mysqli_fetch_array($rsfref);
  $idref = $rwfef['user_id'];
} else {
  $idref = 0;
}
if ($_POST['email'] != '') {
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $quadd = "INSERT into users set reff_id='$idref',nama='$name',phone='$_POST[phone]',email_user='$email',password='$passwords',verify_code='$mdun',reff_code='$randomkey',status='1',date_join='$time_now'";
} else {
  $quadd = "INSERT into users set reff_id='$idref',nama='$name',phone='$_POST[phone]',email_user=null,password='$passwords',verify_code='$mdun',reff_code='$randomkey',status='1',date_join='$time_now'";
}

$regist = mysqli_query($con, $quadd);
if ($regist) {
  echo "<script>alert('Register Success'); window.location.href = 'index.php';</script>";
} else {
  echo "<script>alert('Register Fail, Please Try Again'); window.location.href = 'index.php';</script>";
}
