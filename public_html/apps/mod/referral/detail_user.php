<?php
ini_set('display_errors', 0);
session_start();
include "../../../../public_html/assets/dbconnect.php";

$user = $_POST['user_id'];
$qu_user = "SELECT * FROM users WHERE user_id='$user'";
$rs_user = mysqli_query($con, $qu_user);
$rw_user = mysqli_fetch_assoc($rs_user);

$user_sponsor = $rw_user['user_id'];
$qu_referral = "SELECT * FROM users WHERE reff_id = $user_sponsor";
$rs_referral = mysqli_query($con, $qu_referral);

// $rw_referral = mysqli_fetch_assoc($rs_referral);
while ($rw_referral  = mysqli_fetch_assoc($rs_referral)) {
    $data_referral[] = $rw_referral;
    $count = count($data_referral);

    // !empty($count) ? $count = $count : $count = 0;
    // if (empty($count)) {
    //     $count = 0;
    // }
}
!empty($data_referral) ? $data_referral = $data_referral : $data_referral = 0;

!empty($count) ? $count = $count : $count = 0;

for ($i=0; $i < $count ; $i++) {
    $user_id = $data_referral[$i]['users_id'];

    $qu_hitung = "SELECT * FROM users WHERE reff_id=$user_id";
    $rs_hitung = mysqli_query($con, $qu_hitung);
    $rw_hitung = mysqli_num_rows($rs_hitung);
    $count_referral[$i] = $rw_hitung;

}

$hitung = mysqli_num_rows($rs_referral);
!empty($hitung) ? $hitung = $hitung : $hitung = 0;
!empty($count_referral) ? $count_referral = $count_referral : $count_referral = 0;

$arr = [
    "user"          => $rw_user,
    "total"         => $hitung,
    "referral"        => $data_referral,
    "hitung"        => $count_referral
];

$myJSON = json_encode($arr);

print_r($myJSON);
?>