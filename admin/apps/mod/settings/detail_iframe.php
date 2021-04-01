<?php

include '../../../../public_html/assets/dbconnect.php';

$id = $_GET['id'];
$gambar = "SELECT * FROM youtube_streaming WHERE id='$id'";
$query = mysqli_query($con, $gambar);
$result = mysqli_fetch_array($query);

$arr = [
  'iframe' => $result
];

$myJson = json_encode($arr);

print_r($myJson);
