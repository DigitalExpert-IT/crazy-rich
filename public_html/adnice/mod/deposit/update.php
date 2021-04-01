<?php


print_r($_POST);

$status=$_POST['statusdepo'];
$iddepo=$_POST['iddepo'];
$iduser=$_POST['iduser'];
$totaldepo=$_POST['totaldepo'];
$keterangan=$_POST['keterangan'];

if($status=='Success'){

$qubalance="update users set saldo_aktif=saldo_aktif+$totaldepo where user_id=$iduser";
    mysqli_query($con,$qubalance);

$qudepo="update deposit set status='$status',keterangan='$keterangan' where autono='$iddepo'";
mysqli_query($con,$qudepo);
}else {
    
    $qudepo="update deposit set status='$status',keterangan='$keterangan' where autono='$iddepo'";
mysqli_query($con,$qudepo);
}
?> 

<script>window.location = "index.php?mod=deposit&cmd=index";</script>