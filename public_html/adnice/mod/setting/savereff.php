<?php 
include("../../../assets/dbconnect.php");


  $updatepac="update  master_seting set value='$_POST[profitreff]' where autono='1'";
 
 mysqli_query($con,$updatepac);


echo json_encode(array("status"=>"Update Referral Bonus Success!"));


?>