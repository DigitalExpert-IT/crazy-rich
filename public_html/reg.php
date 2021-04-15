<?php
include('assets/dbconnect.php');
include('assets/PHPMailer/class.phpmailer.php');
include('assets/PHPMailer/class.smtp.php');
include('assets/PHPMailer/PHPMailerAutoload.php');
ini_set('display_errors', 1);


// Build POST request:
/*  $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LfpVMgUAAAAAGlJ38SzEnWxBFwYI_rmd0SojIdC';
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
    if ($recaptcha->success == 1) {
*/

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

$name = mysqli_real_escape_string($con, $_POST['fullname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$refcode = $_POST['reffcode'];

if (!empty($email)) {
  // cek email exist
  $qemailexist = "SELECT email_user FROM users where email_user='$email'";
  $proemailexist = mysqli_query($con, $qemailexist);
  $resemailexist = mysqli_fetch_array($proemailexist);
  if ($resemailexist[0] != NULL) {
    echo '<script>
  alert("This Email is Exist");
  window.location = "http://crazyrich.trade/register.php";
  </script>';
  } else {
    if ($refcode != '') {
      $quref = "select * from users where reff_code='$_POST[reffcode]'";
      $rsfref = mysqli_query($con, $quref);
      $rwfef = mysqli_fetch_array($rsfref);
      $idref = $rwfef['user_id'];
    } else {
      $idref = 0;
    }

    $passwords = password_hash($_POST['password1'], PASSWORD_DEFAULT);

    $quadd = "INSERT into users set reff_id='$idref',nama='$name',phone='$_POST[phone]',email_user='$_POST[email]',password='$passwords',verify_code='$mdun',reff_code='$randomkey',status='1',date_join='$time_now'";

    $regist = mysqli_query($con, $quadd);
    if ($regist) {
      echo "<script>alert('Register Success'); window.location.href = 'index.php';</script>";
    } else {
      echo "<script>alert('Register Fail, Please Try Again'); window.location.href = 'index.php';</script>";
    }
  }
} else {
  $passwords = password_hash($_POST['password1'], PASSWORD_DEFAULT);

  $quadd = "INSERT into users set reff_id='$idref',nama='$name',phone='$_POST[phone]',email_user=null,password='$passwords',verify_code='$mdun',reff_code='$randomkey',status='1',date_join='$time_now'";

  $regist = mysqli_query($con, $quadd);
  if ($regist) {
    echo "<script>alert('Register Success'); window.location.href = 'index.php';</script>";
  } else {
    echo "<script>alert('Register Fail, Please Try Again'); window.location.href = 'index.php';</script>";
  }
}
