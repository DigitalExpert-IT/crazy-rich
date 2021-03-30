<?php
require "../../../../../public_html/assets/dbconnect.php";

$autono = $_POST['autono'];
$nama = $_POST['nama'];
$value = $_POST['value'];
$keterangan = $_POST['keterangan'];

// update master setting
$query_setting = "UPDATE master_seting 
                  SET nama_seting='$nama',
                  value='$value',
                  keterangan_seting='$keterangan'
                  WHERE autono='$autono'";
$process_setting = mysqli_query($con, $query_setting);

if (!$process_setting) {
    $arr = [
        'status' => 'Failed'
    ];
} else {
    $arr = [
        'status' => 'Success'
    ];
}

echo json_encode($arr);
