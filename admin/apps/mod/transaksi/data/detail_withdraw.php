<?php
require '../../../../../public_html/assets/dbconnect.php';
$id = $_GET['id'];

// get data deposit
$query_wd   = "SELECT * FROM withdraw WHERE autono='$id'";
$process_wd = mysqli_query($con, $query_wd);
$result_wd  = mysqli_fetch_assoc($process_wd);

// get data user
$user_id      = $result_wd['user_id'];
$query_user   = "SELECT nama, email_user FROM users WHERE user_id='$user_id'";
$process_user = mysqli_query($con, $query_user);
$result_user  = mysqli_fetch_assoc($process_user);

$arr = [
  "withdraw" => $result_wd,
  "user"    => $result_user
];

$myJSON = json_encode($arr);

print_r($myJSON);
