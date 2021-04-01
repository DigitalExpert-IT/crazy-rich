<?php
require '../../../../public_html/assets/dbconnect.php';

$id = $_POST['id'];
$frame = $_POST['frame'];

$query = "UPDATE youtube_streaming SET iframe_link='$frame' WHERE id='$id'";
$process = mysqli_query($con, $query);

if (!$process) {
    $arr = json_encode(array('status' => 'error'));
} else {
    $arr = json_encode(array('status' => 'success'));
}
