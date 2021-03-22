<?php

include('../assets/dbconnect.php');
if(isset($_POST["email_cek"]))
{
$username = mysqli_real_escape_string($con, $_POST["email_cek"]);
$query = "SELECT * FROM users WHERE email_user = '".$username."'";
$result = mysqli_query($con, $query);
echo mysqli_num_rows($result);
}
?>