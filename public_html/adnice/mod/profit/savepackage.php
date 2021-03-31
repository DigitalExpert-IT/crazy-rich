<?php 
include("../../../assets/dbconnect.php");


 $updatepac="update  master_invest set package_profit='$_POST[persen]' where code_produk='$_POST[idpack]'";
 
 mysqli_query($con,$updatepac);


echo json_encode(array("status"=>"Update Investment Package Success!"));
