<?php
require '../../../../../public_html/assets/dbconnect.php';

$id_invest = $_GET['id'];

// master invest
$query_invest = "SELECT * FROM master_invest WHERE autono='$id_invest'";
$process_invest = mysqli_query($con, $query_invest);
$result_invest = mysqli_fetch_assoc($process_invest);

$arr = [
  "trading" => $result_invest
];

$myJSON = json_encode($arr);
print_r($myJSON);
