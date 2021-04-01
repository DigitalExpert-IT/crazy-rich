<?php
include("../../../assets/dbconnect.php");

$userid=$_POST['user_id'];
$qucek="select * from users where user_id='$userid'";
$rscek=mysqli_query($con,$qucek);
while($rwcek=mysqli_fetch_array($rscek))
{
	
  // $data["crypto"] = $rwcek["crypto_def"];
  $data["address"] = $rwcek["crypto_address"];
	
	
}

echo json_encode($data);
