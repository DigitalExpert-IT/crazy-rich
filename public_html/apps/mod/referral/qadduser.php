<?php
session_start();

include_once('../../../assets/dbconnect.php');
require('../../template/fungsi.php');
// set default timezone jakarta/asia
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

$verifyemailcode = md5($randomkey);

$firstPassword = $_POST['password1'];
$rePassword = $_POST['password2'];
$emailCheck = $_POST['email'];
$userCheck = "SELECT email_user FROM users where email_user='$emailCheck'";
$res = mysqli_query($con, $userCheck);
$userEmail = mysqli_fetch_assoc($res);

if ($userEmail != NULL) {
  $data['response'] = 'exists';
} else {
  if ($rePassword != $firstPassword) {
    $data['response'] = 'failed';
  } else {

    $passwords = password_hash($_POST['password1'], PASSWORD_DEFAULT);

    $quadd = "insert into users set reff_id='$_SESSION[user_id]',nama='$_POST[nama]',email_user='$_POST[email]',password='$passwords',reff_code='$randomkey',status='1',verify_code='$verifyemailcode',date_join='$time_now'";


    if (!mysqli_query($con, $quadd)) {
      ("Error description: " . mysqli_error($con));
      $data['response'] = 'error';
    }

    $data['response'] = 'success';
  }
}



echo json_encode($data);
