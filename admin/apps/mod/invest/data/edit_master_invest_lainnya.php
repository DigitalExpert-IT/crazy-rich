<?php
require '../../../../../public_html/assets/dbconnect.php';

$autono = $_POST['autono'];
$nama_produk = $_POST['nama_produk'];
$id_invest = $_POST['id_invest'];
$pass_invest = $_POST['pass_invest'];
$total = $_POST['total'];
$limit = $_POST['limit'];
$persen_profit = $_POST['persen_profit'];

// update master invest lainnya
$query_invest = "UPDATE master_invest 
                 SET nama_produk='$nama_produk', 
                 invest_total='$total', 
                 profit_persen='$persen_profit',
                 hari_kontrak='$limit',
                 id_investor='$id_invest',
                 password_investor='$pass_invest' WHERE autono='$autono'";
$process_invest = mysqli_query($con, $query_invest);

if (!$process_invest) {
    $arr = [
        'status' => 'Failed'
    ];
} else {
    $arr = [
        'status' => 'Success'
    ];
}

echo json_encode($arr);
