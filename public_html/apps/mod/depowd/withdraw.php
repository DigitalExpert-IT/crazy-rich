<?php
session_start();

include_once('../../../assets/dbconnect.php');
require('../../template/fungsi.php');
$wdid = "GNS/WD/" . $_SESSION['user_id'] . '/' . date("dmYHis");

// set default timezone asia/jakarta
date_default_timezone_set("Asia/Jakarta");
$time = time();
$time_now = date("Y-m-d H:i:s", $time);

$saldo = saldo($_SESSION['user_id']);
$towd = $_POST['beforefee'];


if ($saldo < $towd || $towd < 0) {

	$data["status"] = 'influence';
	echo json_encode($data);
} else {
	$feewd = abs($_POST['feewd']);
	$beforefee = abs($_POST['beforefee']);
	$amountwd = abs($_POST['amountwd']);
	$rupiahwd = abs($_POST['rupiahwd']);

	$quwd = "insert into withdraw set wd_id='$wdid',user_id='$_SESSION[user_id]',fee_wd='$feewd',wd_beforefee='$beforefee',total_wd='$amountwd',total_idr='$rupiahwd',tanggal_wd='$time_now', address='$_POST[address]'";
	$quwdbalance = "update users set saldo_aktif=saldo_aktif-$towd where user_id='$_SESSION[user_id]'";

	$wdQuery = mysqli_query($con, $quwd);

	if ($wdQuery) {
		mysqli_query($con, $quwdbalance);
		$data["status"] = 'Success';
	} else {
		$data["status"] = 'Error';
	}


	echo json_encode($data);
}
