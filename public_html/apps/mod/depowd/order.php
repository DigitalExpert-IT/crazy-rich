<?php

include("../../../assets/dbconnect.php");
session_start();

date_default_timezone_set("Asia/Jakarta");
$time = time();
$time_now = date("Y-m-d H:i:s", $time);

$depousd = abs($_POST['usd_depo']);
$depoidr = abs($_POST['idrdepo']);
$voceridx = $_POST['vocer'];

$orderid = "GNS/DP/" . $_SESSION['user_id'] . '/' . date("dmYHis");
$dec = "Deposit Acount Crazyrich Trading " . $depousd . ' ' . 'USD';
$title = "Deposit Crazyrich Trading  #" . $orderid;

$calltoken = hash('sha256', $orderid);


$qudepo = "insert into deposit set user_id='$_SESSION[user_id]',order_id='$orderid',vocer_idx='$voceridx',total_deposit_usd='$depousd',total_deposit_idr='$depoidr',status='Pending',date_create='$time_now'";

mysqli_query($con, $qudepo);
echo json_encode(array("status" => "sukses"));
