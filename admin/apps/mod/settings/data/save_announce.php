<?php
require "../../../../../public_html/assets/dbconnect.php";

$title = $_POST['title'];
$desc = $_POST['desc'];

$query = "INSERT INTO information SET title='$title', description='$desc'";
$process = mysqli_query($con, $query);
