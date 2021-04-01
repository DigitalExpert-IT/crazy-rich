<?php
require '../../../../../public_html/assets/dbconnect.php';
$id = $_GET['id'];

// get data deposit
$query_depo   = "SELECT * FROM deposit WHERE autono='$id'";
$process_depo = mysqli_query($con, $query_depo);
$result_depo  = mysqli_fetch_assoc($process_depo);

// get data user
$user_id      = $result_depo['user_id'];
$query_user   = "SELECT nama, email_user FROM users WHERE user_id='$user_id'";
$process_user = mysqli_query($con, $query_user);
$result_user  = mysqli_fetch_assoc($process_user);

$arr = [
  "deposit" => $result_depo,
  "user"    => $result_user
];

$myJSON = json_encode($arr);

print_r($myJSON);
