<?php

include "../../../../public_html/assets/dbconnect.php";

$id = $_GET['id'];
$qu_user = "SELECT * FROM users WHERE user_id=$id";
$rs_user = mysqli_query($con, $qu_user);
$rw_user = mysqli_fetch_assoc($rs_user);
// $count   = mysqli_num_rows($rs_user); 

// DATA HITUNG
// $user_sponsor = $rw_user['users_id'];
// $qu_member = "SELECT * FROM users WHERE reff_id=$id";
// $rs_member = mysqli_query($con, $qu_member);

// DATA BUKTI PEMBAYARAN 
// $id_user = $rw_user['users_id'];
// $qu_pembayaran = "SELECT * FROM pembayaran_register WHERE users_id='$id'";
// $rs_pembayaran = mysqli_query($con, $qu_pembayaran);
// $rw_pembayaran = mysqli_fetch_assoc($rs_pembayaran);

// !empty($rw_pembayaran) ? $rw_pembayaran = $rw_pembayaran : $rw_pembayaran = 0;

// NUMBER 
// $arr = [
//     "user" => $rw_user,
//     "bayar"=> $rw_pembayaran,
//     "total"=> mysqli_num_rows($rs_member)
// ];

$arr = [
    "user" => $rw_user
];

$myJSON = json_encode($arr);

print_r($myJSON);
