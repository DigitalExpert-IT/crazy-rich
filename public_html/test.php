<?php
include('assets/dbconnect.php');
session_start();


$queryLevel = "SELECT * FROM users WHERE reff_id = $_SESSION[user_id]";
$resLevel = mysqli_query($con, $queryLevel2);
$getLevel = mysqli_fetch_row($resLevel2);
$idLevel = $getLevel[0];

echo $idLevel;




$queryLevel2 = "SELECT * FROM users WHERE reff_id = $idLevel";
$resLevel2 = mysqli_query($con, $queryLevel2);
$countLvl2 = mysqli_fetch_array($resLevel2);
$idLevel2 = $countLvl2['user_id'];


$queryLevel3 = "SELECT COUNT(*) as reff_3 FROM users WHERE reff_id = $idLevel2";
$resLevel3 = mysqli_query($con, $queryLevel3);
$countLvl3 = mysqli_fetch_array($resLevel3);
