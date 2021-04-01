<?php
require '../../../../../public_html/assets/dbconnect.php';

$autono = $_POST['autono'];
$profit = $_POST['profit'];

$query_profit = "UPDATE master_invest SET package_profit='$profit' WHERE autono='$autono'";
$process_profit = mysqli_query($con, $query_profit);

if (!$process_profit) {
    $arr = [
        'status' => 'Failed'
    ];
} else {
    $arr = [
        'status' => 'Success'
    ];
}

echo json_encode($arr);
