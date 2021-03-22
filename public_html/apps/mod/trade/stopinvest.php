<?php
require( '../../template/fungsi.php' );
session_start();

 $quinvest="select * from trading where autono ='$_POST[num]' and user_id ='$_SESSION[user_id]'";
$rsinvest=mysqli_query($con,$quinvest);
$rwinvest=mysqli_fetch_array($rsinvest);

$paket=$rwinvest['paket_invest'];


 $quupdate="update trading set invest_status='Finish' where autono ='$_POST[num]' and user_id ='$_SESSION[user_id]' ";

mysqli_query($con,$quupdate);

$tambahsaldo="update users set saldo_aktif=saldo_aktif+$paket where user_id ='$_SESSION[user_id]'";
	
	mysqli_query($con,$tambahsaldo);

echo json_encode(array("status"=>"Stop Investment Success!"));
?>