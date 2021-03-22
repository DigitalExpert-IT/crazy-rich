<?php
session_start();
include_once '../public_html/assets/dbconnect.php';

// Build POST request:
/*   $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LfpVMgUAAAAAGlJ38SzEnWxBFwYI_rmd0SojIdC';
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
    if ($recaptcha->success == 1) { */


if (isset($_SESSION['user']) != "") {
}
if (empty($_POST['email']) || empty($_POST['password'])) {
  echo $_POST['password'];
}

if (isset($_POST['btn-login'])) {
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $upass = mysqli_real_escape_string($con, $_POST['password']);
  $qulog = "SELECT * FROM admin_users WHERE email_admin='$email'";

  $res = mysqli_query($con, "$qulog");
  $row = mysqli_fetch_array($res);
  $md5pass = password_hash($upass, PASSWORD_DEFAULT);

  // var_dump([$qulog, $upass, $md5pass, $row]);
  // die;

  // if ($row['password_admin'] == password_hash($upass, PASSWORD_DEFAULT))
  if (password_verify($upass, $row['password_admin'])) {
    $_SESSION['autono'] = $row['autono'];
    $_SESSION['email_admin'] = $row['email'];
    $_SESSION['status'] = $row['status'];

    header("Location: apps/index.php");
  } else {
    echo "<script>window.location.href = 'index.php'; alert('Email & Password Wrong')</script>";
  }
} else {
  echo "<script>window.location.href = 'index.php'; alert('Spammer Detected')</script>";
}
	/* } else {
        echo"<script>window.location.href = 'index.php'; alert('reChaptcha Failed')</script>";
		//print_r($recaptcha);
    } */
