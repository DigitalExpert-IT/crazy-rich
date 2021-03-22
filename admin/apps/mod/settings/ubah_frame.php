<?php
require '../../../../public_html/assets/dbconnect.php';

$id = $_POST['id'];
$frame = $_POST['frame'];

$query = "UPDATE youtube_streaming SET iframe_link='$frame' WHERE id='$id'";
$process = mysqli_query($con, $query);

var_dump([$query, $process, $_POST]);
