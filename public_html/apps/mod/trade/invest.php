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


if ($saldo < $paket) {
    echo json_encode(array("status" => "Insufficient Balance"));
} else {

    $quinvest = "insert into trading set contract_id='$contractid', user_id='$_SESSION[user_id]',reff_id='$_SESSION[reff_id]',persen_profit='$persen',paket_id='$paket_id',paket_invest='$paket',amount_invest='$paket',profit='0',date_invest='$time_now'";

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
