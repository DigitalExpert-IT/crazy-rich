<?php
ini_set('display_errors', 0);

$userdb = 'root';
$host = 'localhost';
$passdb = '';
$dbselect = 'db_genesis';

$baseurl = "http://crazyrich.trade";


$con = mysqli_connect($host, $userdb, $passdb) or die(mysqli_error());
mysqli_select_db($con, $dbselect);
