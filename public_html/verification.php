<?php
include 'assets/dbconnect.php';
$email = mysqli_real_escape_string($con, $_GET['email']);
$code = mysqli_real_escape_string($con, $_GET['verification']);
$query = "select * from users where email_user = '$email' and verify_code='$code'";
$rs = mysqli_query($con, $query);
$rw = mysqli_fetch_array($rs);
$c = count($rw['nama']);
if ($c == '1') {
  $qu = "update users set verify_email_status='1' where email_user = '$email'";
  mysqli_query($con, $qu);
  $stat = "Congratulations, Email Verification Successful";
  $html = "Your account has been activated, please login";
} else {
  $stat = "Invalid Verification Code";
  $html = "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Crazy Rich Trading</title>
  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

</head>
<style>
  .message-page .message-con {
    border: 1px solid #d4d4d4;
    width: 680px;
    margin: 0 auto;
  }

  .list-message {
    padding: 25px;
    text-align: center;
    position: relative;
    font-size: 14px;
  }

  span {
    color: Black;
  }

  .btn-fornas {
    color: #9306d4;
    background-color: #B51BBD;
    border-color: #130269;
  }

  .btn {
    -webkit-border-radius: 28;
    -moz-border-radius: 28;
    border-radius: 28px;
    font-family: Arial;
    color: #9306d4;
    font-size: 20px;
    background: #a608a1;
    padding: 10px 20px 10px 20px;
    text-decoration: none;
  }

  .btn:hover {
    background: #3cb0fd;
    background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
    background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
    background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
    background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
    background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
    text-decoration: none;
  }

  ;
</style>

<div class="message-page">
  <div class="message-con" style="background:#fff">
    <div class="list-message">
      <div class="header"><img src="assets/images/logo/newLogo.png" width="300px" height="auto" /></div>
      <hgroup class="text-center">
        <h2><span><?= $stat ?></span></h2>
      </hgroup>
      <p><?= $html ?>.</p>
      <br>
      <a href="index.php"><button style="border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer; background-color: #9306d4;">Click Here to Continue</button>
        <BR />
    </div>

  </div>
</div>