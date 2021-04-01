<?php
require "../../../../../public_html/assets/dbconnect.php";

$autono = $_GET['id'];

// get table
$query_setting = "SELECT * FROM master_seting WHERE autono='$autono'";
$process_setting = mysqli_query($con, $query_setting);
$result_setting = mysqli_fetch_assoc($process_setting);

$arr = [
  "setting" => $result_setting
];

$myJSON = json_encode($arr);
print_r($myJSON);
