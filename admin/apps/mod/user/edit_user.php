<?php
require '../../../../public_html/assets/dbconnect.php';

$id_user = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$member = $_POST['member'];

// var_dump([$id_user, $nama, $email, $member]);
$query = "UPDATE users SET nama='$nama', email_user='$email', status='$member' WHERE user_id='$id_user'";
$process = mysqli_query($con, $query);
