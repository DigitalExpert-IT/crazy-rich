<?php
require '../../../../public_html/assets/dbconnect.php';

$frame = $_POST['frame'];

$query = "INSERT INTO youtube_streaming SET iframe_link='$frame'";
$process = mysqli_query($con, $query);
$result = mysqli_fetch_array($process);
if (!$result) {
    $arr = json_encode(array('status' => 'error'));
} else {
    $arr = json_encode(array('status' => 'success'));
}
