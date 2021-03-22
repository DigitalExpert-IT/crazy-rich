<?php 
include("../../../assets/dbconnect.php");


  $updatepac="update  master_seting set value='$_POST[wdfee]' where autono='2'";
 
 mysqli_query($con,$updatepac);


echo json_encode(array("status"=>"Update Withdraw fee Success!"));


?>