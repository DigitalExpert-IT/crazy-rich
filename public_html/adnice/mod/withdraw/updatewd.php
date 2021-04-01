<?php

$status=$_POST['statuswd'];
$wdbalance=$_POST['wdtot'];
$userid=$_POST['userid'];
$rejectbalance=$_POST['beforefee'];


if($status=='Reject'){
	
	 $rejectbalance="update users set saldo_aktif=saldo_aktif +$rejectbalance where user_id='$userid'";
	
	mysqli_query($con,$rejectbalance);
	
		$updatewd="update withdraw set txid='$_POST[txid]',status_wd='$_POST[statuswd]',approve_by='$_SESSION[status]',approve_date=now() where autono='$_POST[idwd]'";
 
 mysqli_query($con,$updatewd);
 
 
echo"<script>window.location.href = '?mod=withdraw&cmd=index'; alert('Reject Success!!')</script>";
	
}else {
	
	$updatewd="update withdraw set txid='$_POST[txid]',status_wd='$_POST[statuswd]',approve_by='$_SESSION[status]',approve_date=now() where autono='$_POST[idwd]'";
 
 mysqli_query($con,$updatewd);
 
 
echo"<script>window.location.href = '?mod=withdraw&cmd=index'; alert('Update Success!!')</script>";
	
}

 




 ?>