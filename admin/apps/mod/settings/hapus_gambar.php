<?php
require '../../../../public_html/assets/dbconnect.php';

$id = $_POST['id'];

// unlink old image
$query_img = "SELECT nama_gambar FROM banners where autono='$id'";
$process_img = mysqli_query($con, $query_img);
$result_img = mysqli_fetch_array($process_img);

$old_img = $result_img['nama_gambar'];

unlink('../../../assets/images/banners/' . $old_img);

$query = "DELETE FROM banners where autono='$id'";
$process = mysqli_query($con, $query);
$result = mysqli_fetch_array($process);
