<?php
//fuction rank

$userdb='root';
$host='localhost';
$passdb='!123Genesis';
$dbselect='db_mining';

$baseurl="";


$con=mysqli_connect($host,$userdb,$passdb);
mysqli_select_db($con,$dbselect);



function saldo($uid){
	
	
global $con;

    $quurank="select * from users where user_id='$uid'";
	$rsurank=mysqli_query($con,$quurank);
	$rwurank=mysqli_fetch_assoc($rsurank);


	return $rwurank['saldo_aktif'];
 
}

function balance($uid){
	
	
global $con;

    $quurank="select * from users where user_id='$uid'";
	$rsurank=mysqli_query($con,$quurank);
	$rwurank=mysqli_fetch_assoc($rsurank);

	$balance =$rwurank['saldo_aktif'];
	return $balance;
 
}

function dolar($dolar){
	

	$hasil_dolar = "$ " . number_format($dolar,3,',','.');
	return $hasil_dolar;
 
}

function rupiah($rupiah){
	

	$hasil_rupiah = "Rp. " . number_format($rupiah,0,',','.');
	return $hasil_rupiah;
 
}

function angka($dolar){
	

	$hasil_dolar = number_format($dolar,2,',','.');
	return $hasil_dolar;
 
}

function tanggal($tanggal){
	

	$date=date_create($tanggal); 
  
return date_format($date, "F/d/Y"); 
 
}

 
 function totalinvestment($userid){
	 
global $con;
	
$totinvesment="select count(autono) as totinvest FROM history_trading where user_id='$userid'";
$rstotinves=mysqli_query($con,$totinvesment);
$rwtotinves=mysqli_fetch_array($rstotinves);


return $rwtotinves['totinvest'];
 
}

function activeinvestment($userid){
	 
global $con;
	
$totinvesment="select count(autono) as active FROM trading where user_id='$userid' and invest_status='Active'";
$rstotinves=mysqli_query($con,$totinvesment);
$rwtotinves=mysqli_fetch_array($rstotinves);


return $rwtotinves['active'];
 
}

 function totprofit($userid){
	 
global $con;
	
$totinvesment="select sum(profit) as totprofit FROM history_profit where user_id='$userid'";
$rstotinves=mysqli_query($con,$totinvesment);
$rwtotinves=mysqli_fetch_array($rstotinves);


return $rwtotinves['totprofit'];
 
}


 function totreff($userid){
	 
global $con;
	
$qureff="select count(user_id) as totreff FROM users where reff_id='$userid'";
$rsreff=mysqli_query($con,$qureff);
$rwreff=mysqli_fetch_array($rsreff);


return $rwreff['totreff'];
 
}

function totbonus($userid){
	 
global $con;
	
$totinvesment="select sum(bonus_reff) as bonusreff FROM history_profit_reff where user_id='$userid'";
$rstotinves=mysqli_query($con,$totinvesment);
$rwtotinves=mysqli_fetch_array($rstotinves);


return $rwtotinves['bonusreff'];
 
}

 function namauser($userid){
	 
global $con;
	
$qureff="select * FROM users where user_id='$userid'";
$rsreff=mysqli_query($con,$qureff);
$rwreff=mysqli_fetch_array($rsreff);


return $rwreff['nama'];
 
}

 function emailuser($userid){
	 
global $con;
	
$qureff="select * FROM users where user_id='$userid'";
$rsreff=mysqli_query($con,$qureff);
$rwreff=mysqli_fetch_array($rsreff);


return $rwreff['email_user'];
 
}
