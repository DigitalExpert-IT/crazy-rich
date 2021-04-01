<?php 
include("../../../assets/dbconnect.php");


  $updatepac="update  master_seting set value='$_POST[rateidr]' where autono='3'";
 
 mysqli_query($con,$updatepac);


echo json_encode(array("status"=>"Update Rate Success!"));


?>