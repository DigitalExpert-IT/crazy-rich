<?php
// ini_set('display_errors', 0);

$userdb = 'root';
$host = 'localhost';
$passdb = 'Tester2021';
$dbselect = 'db_genesis';

$baseurl = "#";
// set default time asia/jakarta
date_default_timezone_set("Asia/Jakarta");
$time = time();
$time_now = date("Y-m-d H:i:s", $time);
// 
$con = mysqli_connect($host, $userdb, $passdb);
mysqli_select_db($con, $dbselect);

$quseting = "SELECT * from master_seting where nama_seting ='reff_persen'";
$rsseting = mysqli_query($con, $quseting);
$rwseting = mysqli_fetch_array($rsseting);


$persenreff = $rwseting['value'];


$dayprofit = "SELECT * from trading where profit !=300 and invest_status='Active'";
$rsprofit = mysqli_query($con, $dayprofit);

while ($rwprofit = mysqli_fetch_array($rsprofit)) {

	$idtrade = $rwprofit['autono'];
	$kontrak = $rwprofit['contract_id'];
	$paketid =  $rwprofit['paket_id'];

	$qupersen = "SELECT * from master_invest where code_produk='$paketid'";
	$rspersen = mysqli_query($con, $qupersen);
	$rwpersen = mysqli_fetch_array($rspersen);

	$persenmember = $rwpersen['package_profit'];
	$invest = $rwprofit['paket_invest'];
	$user_id = $rwprofit['user_id'];
	$reff_id = $rwprofit['reff_id'];
	$paket_invest = $rwprofit['paket_id'];
	$balikmodal = ($persenmember / 100) * $invest;

	$profimember = ($persenmember / 100) * $invest;

	$profitreff = ($persenreff / 100) * $profimember;

	$amount_user = "SELECT amount_invest FROM trading WHERE user_id='$user_id' AND invest_status='Active' AND contract_id='$kontrak'";
	$amount = mysqli_query($con, $amount_user);
	$res_amount = mysqli_fetch_assoc($amount);
	$profit_member = $res_amount['amount_invest'] + $profimember;

	//history profit member
	$historyprofit = "INSERT into history_profit set user_id='$user_id', profit_percen='$persenmember', profit='$profimember',tanggal='$time_now',keterangan='Trade Profit for contract: $kontrak'";
	mysqli_query($con, $historyprofit);
	//history balmod
	$historybalmod = "INSERT into history_balmod set user_id='$user_id',balmod='$profit_member',tanggal='$time_now',keterangan='Investmend refund for contract: $kontrak'";
	$test = mysqli_query($con, $historybalmod);

	$update_profit = "INSERT INTO tb_profit SET user_id='$user_id', contract_id='$kontrak', profit_value='1', tanggal='$time_now', package_id='$paket_invest'";
	mysqli_query($con, $update_profit);

	// add profit
	$tradingProfitLeft = "UPDATE trading set profit=profit+1 where autono='$idtrade'";
	mysqli_query($con, $tradingProfitLeft);

	// add invest balance user
	$balanceUserInvest = "UPDATE users set saldo_invest=saldo_invest+$profimember where user_id='$user_id'";
	mysqli_query($con, $balanceUserInvest);

	if ($persenreff > 0 && $reff_id > 0) {
		//history reff profit
		$history_reff = "INSERT into history_profit_reff set user_id='$reff_id',bonus_reff='$profitreff',tanggal='$time_now',keterangan='Bonus form referral for contract: $kontrak'";
		mysqli_query($con, $history_reff);
		//update balance user bonus referral
		$balancereff = "UPDATE users set saldo_invest=saldo_invest+$profimember where user_id='$reff_id'";
		mysqli_query($con, $balancereff);
	}
}

// auto refund investment
$dayprofit = "SELECT * FROM trading WHERE profit=300 AND invest_status='Active'";
$rsprofit = mysqli_query($con, $dayprofit);
while ($rwprofit = mysqli_fetch_array($rsprofit)) {
	$contract_id = $rwprofit['contract_id'];
	$userrefun = $rwprofit['user_id'];
	$idrefund = $rwprofit['autono'];
	$refund = $rwprofit['amount_invest'];

	$tradingProfitLeft = "UPDATE trading set amount_invest=amount_invest-amount_invest, invest_status='Finish' where autono='$idrefund'";
	mysqli_query($con, $tradingProfitLeft);

	// create hs refund
	// $qhsr = "INSERT INTO history_refund SET user_id='$userrefun', refund='$refund', tanggal='$time_now', keterangan='Refund for contract: $kontrak'";
	// $phsr = mysqli_query($con, $qhsr);
}
echo 'test';
