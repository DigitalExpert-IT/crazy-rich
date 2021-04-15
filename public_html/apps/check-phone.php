<?php

include('http://putin.smarttrade.top/assets/dbconnect.php');
if (isset($_POST["phone"])) {
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $query = "SELECT * FROM users WHERE phone = '" . $phone . "'";
    $result = mysqli_query($con, $query);
    echo mysqli_num_rows($result);
}
