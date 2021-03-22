<?php
require "../../../../../public_html/assets/dbconnect.php";

$autono = $_POST['autono'];
$title = $_POST['title'];
$desc = $_POST['desc'];

$query = "UPDATE information SET title='$title', description='$desc' WHERE autono='$autono'";
$process = mysqli_query($con, $query);
