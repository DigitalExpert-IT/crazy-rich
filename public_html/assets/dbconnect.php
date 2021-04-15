<?php
ini_set('display_errors', 0);

$userdb = 'root';
$host = 'localhost';
$passdb = '12qwwq21';
$dbselect = 'db_mining';

$baseurl = "http://smarttrade.top";


$con = mysqli_connect($host, $userdb, $passdb) or die(mysqli_error());
mysqli_select_db($con, $dbselect);
