<?php
session_start();

include_once('../../../../assets/dbconnect.php');
require('../../../template/fungsi.php');
$wdid = "GNS/WD/INV/" . $_SESSION['user_id'] . '/' . date("dmYHis");

// default timezone asia/jakarta
date_default_timezone_set("Asia/Jakarta");
$time = time();
$time_now = date("Y-m-d H:i:s", $time);

$saldo = profitInvest($_SESSION['user_id']);
$towd = $_POST['beforefee'];

if ($saldo < $towd || $towd < 0) {

  $data["status"] = 'influence';
  echo json_encode($data);
} else {

  //  $quwda="insert into withdraw set wd_id='$wdid',user_id='$_SESSION[user_id]',fee_wd='$_POST[feewd]',wd_beforefee='$_POST[beforefee]',total_wd='$_POST[amountwd]',total_idr='$_POST[rupiahwd]',tanggal_wd=$time_now";

  // $quwd = "UPDATE users SET saldo_aktif=saldo_aktif+$_POST[amountwd] WHERE user_id='$_SESSION[user_id]'";

  // mysqli_query($con, $quwd);

  $qhswd = "INSERT INTO withdraw_invest SET wd_id='$wdid', user_id='$_SESSION[user_id]', fee_wd='$_POST[feewd]', wd_beforefee='$_POST[beforefee]', total_wd='$_POST[amountwd]', tanggal_wd='$time_now'";
  mysqli_query($con, $qhswd);

  $quwdbalance = "update users set saldo_invest=saldo_invest-$towd where user_id='$_SESSION[user_id]'";
  mysqli_query($con, $quwdbalance);

  $data["status"] = 'Success';
  echo json_encode($data);
}
