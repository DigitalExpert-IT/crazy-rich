<?php

require '../../../../../public_html/assets/dbconnect.php';
session_start();
$admin = $_SESSION['status'];
date_default_timezone_set("Asia/Jakarta");
$time = time();
$time_now = date("Y-m-d H:i:s", $time);

$id_wd = $_POST['id_wd'];
$value = $_POST['value'];
$withdraw = $_POST['withdraw'];
$total_wd = $_POST['total_wd'];
$id_user = $_POST['id_user'];

$wd = explode(' ', $withdraw);
$wd_float = floatval($wd[1]);

$tot_wd = explode(' ', $total_wd);
$tot_wd_float = floatval($tot_wd[1]);

if ($value == 1) {
  $value = 'Success';
  // update status wd
  $query_wd = "UPDATE withdraw_invest SET status_wd='$value', approve_by='$admin', approve_date='$time_now' WHERE autono='$id_wd'";
  $process_wd = mysqli_query($con, $query_wd);

  $quwd = "UPDATE users SET saldo_aktif=saldo_aktif+$tot_wd_float WHERE user_id='$id_user'";
  mysqli_query($con, $quwd);

  if ($process_wd) {
    $arr = [
      "status" => "OK",
      "data" => [
        "update_wd" => $process_wd,
        "status" => 'Approve'
      ]

    ];
  } else {
    $arr = [
      "status" => "FAILED",
      "data" => [
        "update_wd" => $process_wd,
        "status" => 'failed'
      ]
    ];
  }

  $myJSON = json_encode($arr);
  print_r($myJSON);
} else {
  $value = 'Reject';
  // update status wd
  $query_wd = "UPDATE withdraw_invest SET status_wd='$value', approve_by='$admin', approve_date='$time_now' WHERE autono='$id_wd'";
  $process_wd = mysqli_query($con, $query_wd);

  // return saldo_aktif
  $query_get_saldo = "SELECT saldo_invest FROM users WHERE user_id='$id_user'";
  $process_get_saldo = mysqli_query($con, $query_get_saldo);
  $result_get_saldo = mysqli_fetch_array($process_get_saldo);

  $return_saldo = $wd_float + floatval($result_get_saldo['saldo_invest']);


  // update saldo_invest
  $query_saldo = "UPDATE users SET saldo_invest='$return_saldo' WHERE user_id='$id_user'";
  $process_saldo = mysqli_query($con, $query_saldo);

  if ($process_wd && $process_saldo) {
    $arr = [
      "status" => "OK",
      "data" => [
        "update status" => $process_wd,
        "return saldo" => $process_saldo,
        "status" => 'Reject'
      ]
    ];

    $myJSON = json_encode($arr);
    print_r($myJSON);
  } else {
    $arr = [
      "status" => "FAILED",
      "data" => [
        "update status" => $process_wd,
        "return saldo" => $process_saldo,
        "status" => 'failed'
      ]
    ];

    $myJSON = json_encode($arr);
    print_r($myJSON);
  }
}
