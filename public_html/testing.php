<?php

$userdb = 'root';
$host = 'localhost';
$passdb = '';
$dbselect = 'db_mining';

$baseurl = "";


$con = mysqli_connect($host, $userdb, $passdb);
mysqli_select_db($con, $dbselect);

$quinfo = "SELECT * FROM users";
$rsinfo = mysqli_query($con, $quinfo);

while ($rwinfo = mysqli_fetch_array($rsinfo)) {
  echo $rwinfo['user_id'];
}
