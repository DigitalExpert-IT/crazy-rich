<?php
$wdid="SMT/DP/".$_SESSION['user_id'].'/'.date("dmYHis");


$saldo=saldo($_SESSION['user_id']);
$towd=$_POST['amountwd'];

if($saldo<$towd){
	
	echo"<script>window.location.href = '?mod=depowd&cmd=index'; alert('Your Active Balance influence')</script>";
	
} else {

$quwd="insert into withdraw set wd_id='$wdid',user_id='$_SESSION[user_id]',crypto_aset='$_POST[cryptocurency]',crypto_address='$_POST[addresscrypto]',total_wd='$_POST[amountwd]',tanggal_wd=now()";

mysqli_query($con,$quwd);

echo"<script>window.location.href = '?mod=depowd&cmd=index'; alert('Withdraw Success!!')</script>";

}
