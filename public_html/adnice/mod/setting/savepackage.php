<?php 
include("../../../assets/dbconnect.php");


  $updatepac="update  master_invest set nama_produk='$_POST[name]',invest_total='$_POST[amount]',profit_persen='$_POST[persen]',contract_circle='$_POST[days]',id_investor='$_POST[idinvestor]',password_investor='$_POST[passinvest]' where code_produk='$_POST[idpack]'";
 
 mysqli_query($con,$updatepac);


echo json_encode(array("status"=>"Update Investment Package Success!"));
