<?php
session_start();
require "../../../../../public_html/assets/dbconnect.php";

date_default_timezone_set("Asia/Jakarta");
$time = time();
$time_now = date("Y-m-d H:i:s", $time);

$autono = $_POST['autono'];
$user_id = $_POST['user_id'];
$status = $_POST['status'];
$invest = $_POST['invest'];
$invest = explode(" ", $invest);
$invest = floatval($invest[1]);
$admin = $_SESSION['status'];

if ($status == 1) {
  $status = 'Active';

  // update trading
  $query_trading = "UPDATE trading SET invest_status='$status', update_by='$admin', date_update='$time_now' WHERE autono='$autono'";
  $process_trading = mysqli_query($con, $query_trading);
  $result_trading = mysqli_fetch_assoc($process_trading);

  if (!$process_trading) {
    $arr = [
      "status" => "Failed"
    ];
  } else {
    $arr = [
      "status" => "Approve"
    ];
  }

  $myJSON = json_encode($arr);
  print_r($myJSON);
} else {
  $status = 'Reject';

  // update trading
  $query_trading = "UPDATE trading SET invest_status='$status', update_by='$admin', date_update='$time_now' WHERE autono='$autono'";
  $process_trading = mysqli_query($con, $query_trading);
  $result_trading = mysqli_fetch_assoc($process_trading);

  // get balance
  $query_balance = "SELECT saldo_aktif FROM users WHERE user_id='$user_id'";
  $process_balance = mysqli_query($con, $query_balance);
  $result_balance = mysqli_fetch_array($process_balance);


  $result_balance = floatval($result_balance['saldo_aktif']);
  $result_balance += $invest;

  // update balance
  $query_user = "UPDATE users SET saldo_aktif='$result_balance' WHERE user_id='$user_id'";
  $process_user = mysqli_query($con, $query_user);

  if (!$process_trading || !$process_user) {
    $arr = [
      "status" => "Failed"
    ];
  } else {
    $arr = [
      "status" => "Reject"
    ];
  }

  $myJSON = json_encode($arr);
  print_r($myJSON);
}
