<?php
require('../../template/fungsi.php');
session_start();
function contractid()
{
    mt_srand((float)microtime() * 10000);
    $charid = md5(uniqid(rand(), true));
    $c = unpack("C*", $charid);
    $c = implode("", $c);
    $depan = "GNS/TRD";
    $userid = $_SESSION['user_id'];
    $random = substr($c, 0, 10);
    $kontrak = $depan . '/' . $userid . '/' . $random;

    return $kontrak;
}

// set default timezone asia/jakarta
date_default_timezone_set("Asia/Jakarta");
$time = time();
$time_now = date("Y-m-d H:i:s", $time);

$paket = $_POST['totinvest'];
$paket_id = $_POST['idpaket'];
$persen = $_POST['profits'];
$saldo = balance($_SESSION['user_id']);
$contractid = contractid();

$getInvest = "SELECT contract_days, quota_usage FROM master_invest WHERE code_produk = '$paket_id'";
$resInvest = mysqli_query($con, $getInvest);
$invest = mysqli_fetch_array($resInvest);

$contractDays = $invest['contract_days'];
$quotaUsage = $invest['quota_usage'];

$quhispaket = "select count('contract_id') as total_trade from trading where paket_id = '$paket_id' and user_id = '$_SESSION[user_id]'";
$rshispaket = mysqli_query($con, $quhispaket);
$rwhispaket = mysqli_fetch_object($rshispaket);


if ($saldo < $paket) {
    echo json_encode(array("status" => "Insufficient Balance"));
} else if($rwhispaket->total_trade >= $quotaUsage && $quotaUsage != 0) {
    echo json_encode(array("status" => "Quota Limited"));
} else {

    $quinvest = "INSERT into trading set contract_id='$contractid', user_id='$_SESSION[user_id]',reff_id='$_SESSION[reff_id]',persen_profit='$persen',paket_id='$paket_id',paket_invest='$paket',amount_invest='$paket',days='$contractDays',date_invest='$time_now'";

    if (!mysqli_query($con, $quinvest)) {
        echo ("Error description: " . mysqli_error($con));
    } else {
        $kurangsaldo = "update users set saldo_aktif=saldo_aktif-$paket where user_id ='$_SESSION[user_id]'";

        mysqli_query($con, $kurangsaldo);

        $historytrade = "insert into history_trading set user_id='$_SESSION[user_id]',paket_invest='$paket',tanggal='$time_now',keterangan='Investment for contract: $contractid'";
        mysqli_query($con, $historytrade);

        echo json_encode(array("status" => "Investment Success!"));
    }
}
