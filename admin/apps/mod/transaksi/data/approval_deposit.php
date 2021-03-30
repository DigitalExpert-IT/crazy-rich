<?php

require '../../../../../public_html/assets/dbconnect.php';

$id_deposit = $_POST['id_deposit'];
$value = $_POST['value'];
$balance = $_POST['balance'];
$id_user = $_POST['id_user'];

if ($value == 1) {
  $value = 'Success';
  $get_saldo = "SELECT saldo_aktif FROM users WHERE user_id='$id_user'";
  $proc_saldo = mysqli_query($con, $get_saldo);
  $result_saldo = mysqli_fetch_array($proc_saldo);

  $saldo_now = $result_saldo['saldo_aktif'];

  $saldo_now += $balance;

  $query = "UPDATE deposit SET status='$value' WHERE autono='$id_deposit'";
  $process = mysqli_query($con, $query);
  // $result = mysqli_fetch_array($process);

  $query_balance = "UPDATE users SET saldo_aktif='$saldo_now' where user_id='$id_user'";
  $process_balance = mysqli_query($con, $query_balance);

  if ($process && $process_balance) {
    $arr = [
      'status' => 'OK',
      'data' => 'Approve'
    ];
  } else {
    $arr = [
      'status' => 'failed',
      'data' => 'FAILED'
    ];
  }
  $myJSON = json_encode($arr);

  echo $myJSON;
} else {
  $value = 'Reject';

  $query = "UPDATE deposit SET status='$value' WHERE autono='$id_deposit'";
  $process = mysqli_query($con, $query);

  $arr = [
    'status' => 'OK',
    'data' => $value
  ];
  $myJSON = json_encode($arr);

  echo $myJSON;
}
