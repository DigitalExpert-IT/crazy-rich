<?php
include("../../../assets/dbconnect.php");
if(isset($_POST["id"]))
{

 $query = "SELECT * FROM master_invest WHERE code_produk = '".$_POST["id"]."'";
 $result = mysqli_query($con, $query);
 while($row = mysqli_fetch_array($result))
 {
  $data["produk_id"] = $row["code_produk"];
  $data["invest_total"] = $row["invest_total"];
  $data["profit_persen"] = $row["profit_persen"];
  $data["contract_circle"] = $row["contract_circle"];
  
 }

 echo json_encode($data);
}
