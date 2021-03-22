<?php
require '../../../../../public_html/assets/dbconnect.php';

$autono = $_POST['autono'];
$profit = $_POST['profit'];

$query_profit = "UPDATE master_invest SET profit_harinini='$profit' WHERE autono='$autono'";
$process_profit = mysqli_query($con, $query_profit);
