<?php
require '../../../../../public_html/assets/dbconnect.php';

$id_trading = $_GET['id'];

// trading
$query_trading = "SELECT * FROM trading WHERE autono='$id_trading'";
$process_trading = mysqli_query($con, $query_trading);
$result_trading = mysqli_fetch_assoc($process_trading);

// user
$id_user = $result_trading['user_id'];

$query_user = "SELECT nama, email_user FROM users WHERE user_id='$id_user'";
$process_user = mysqli_query($con, $query_user);
$result_user = mysqli_fetch_assoc($process_user);

$arr = [
  "trading" => $result_trading,
  "user" => $result_user,
];

$myJSON = json_encode($arr);
print_r($myJSON);
