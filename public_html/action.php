<?php
session_start();
include_once 'assets/dbconnect.php';

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
  $qulog = "SELECT * FROM users WHERE email_user='$email' or phone='$email'";

  $res = mysqli_query($con, "$qulog");
  $row = mysqli_fetch_array($res);
  $md5pass = md5($upass);


  if (password_verify($upass, $row['password'])) {

    // if ($row['verify_email_status'] == 0) {
    //   header("Location: email.php?e=" . $row['email_user'] . "&n=" . $row['nama'] . "&c=" . $row['verify_code']);
    // }
    if ($row['status'] == 0) {
      echo "<script>window.location.href = 'login.php'; alert('Your Acoount Has Been Banned, Contact Administrator For More Detail')</script>";
    } else {
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['reff_id'] = $row['reff_id'];
      $_SESSION['email_user'] = $row['email'];
      $_SESSION['nama'] = $row['nama'];
      $_SESSION['reffcode'] = $row['reff_code'];

      header("Location: apps/index.php");
    }
  } else {
    echo "<script>window.location.href = 'login.php'; alert('Email or Password Wrong')</script>";
  }
} else {
  echo "<script>window.location.href = 'login.php'; alert('Spammer Detected')</script>";
}
	/* } else {
        echo"<script>window.location.href = 'login.php'; alert('reChaptcha Failed')</script>";
		//print_r($recaptcha);
    } */
