<?php

include '../../../../public_html/assets/dbconnect.php';

$id = $_GET['id'];
$gambar = "SELECT * FROM banners WHERE autono='$id'";
$query = mysqli_query($con, $gambar);
$result = mysqli_fetch_array($query);

$arr = [
  'gambar' => $result
];

$myJson = json_encode($arr);

print_r($myJson);
