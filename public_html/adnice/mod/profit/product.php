<?php
include("../../../assets/dbconnect.php");
if (isset($_POST["id"])) {

    $query = "SELECT * FROM master_invest WHERE code_produk = '" . $_POST["id"] . "'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $data["name"] = $row["nama_produk"];
        $data["invest_total"] = $row["invest_total"];
        $data["profit_persen"] = $row["package_profit"];
        $data["contract_days"] = $row["contract_days"];
    }

    echo json_encode($data);
}
