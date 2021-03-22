<?php
session_start();
ini_set('display_errors',0);
require( '../../template/fungsi.php' );

$crypto=mysqli_real_escape_string($con,$_POST['crypto']);
 $wallets=mysqli_real_escape_string($con,$_POST['walletadres']);


$updatewallet="update users set crypto_def='$crypto',crypto_address='$wallets' where user_id='$_SESSION[user_id]'";

 if (!mysqli_query($con,$updatewallet))
  {
 echo json_encode(array("status"=>"failed"));
  }
else {
	
	echo json_encode(array("status"=>"success"));
	
}




?>