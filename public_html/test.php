<?php
include('assets/dbconnect.php');
include('ap');
session_start();
ini_set('display_errors', 1);


$queryLevel = "SELECT * FROM users WHERE reff_id = $_SESSION[user_id]";
$resLevel = mysqli_query($con, $queryLevel);
$getLevel = mysqli_fetch_row($resLevel);
$idLevel = $getLevel[0];

// echo $idLevel;




$queryLevel2 = "SELECT COUNT(*) as reff_2 FROM users WHERE reff_id = $idLevel";
$resLevel2 = mysqli_query($con, $queryLevel2);
$countLvl2 = mysqli_fetch_array($resLevel2);
$idLevel2 = $countLvl2['reff_2'];


// $queryLevel3 = "SELECT COUNT(*) as reff_3 FROM users WHERE reff_id = $idLevel2";
// $resLevel3 = mysqli_query($con, $queryLevel3);
// $countLvl3 = mysqli_fetch_array($resLevel3);


echo $idLevel;
