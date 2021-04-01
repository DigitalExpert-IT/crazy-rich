<?php
require "../../../../../public_html/assets/dbconnect.php";

$query = "SELECT * FROM information";
$process = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($process);

$arr = [
  "data" => $result
];

$myJSON = json_encode($arr);
print_r($myJSON);
