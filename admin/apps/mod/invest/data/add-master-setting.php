<?php
require "../../../../../public_html/assets/dbconnect.php";

$settingName = $_POST['add_name'];
$value = $_POST['add_value'];
$desc = $_POST['add_desc'];
$type = $_POST['add_type'];

$query = "INSERT INTO master_seting SET nama_setting='$settingName', value='$value', keterangan_seting='$desc', type='$type'";

$insert = mysqli_query($con, $query);
if (!$insert) {
    $arr = [
        'status' => 'Failed'
    ];
} else {
    $arr = [
        'status' => 'Success'
    ];
}
echo json_encode($arr);
