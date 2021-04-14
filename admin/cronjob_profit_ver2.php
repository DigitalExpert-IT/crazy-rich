<?php
// ini_set('display_errors', 0);

$userdb = 'root';
$host = 'localhost';
$passdb = 'Superman88';
$dbselect = 'db_mining';

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

$quseting2 = "SELECT * from master_seting where nama_seting ='reff_persen_2'";
$rsseting2 = mysqli_query($con, $quseting);
$rwseting2 = mysqli_fetch_array($rsseting);

$quseting3 = "SELECT * from master_seting where nama_seting ='reff_persen_3'";
$rsseting3 = mysqli_query($con, $quseting);
$rwseting3 = mysqli_fetch_array($rsseting);

$quseting4 = "SELECT * from master_seting where nama_seting ='reff_persen_4'";
$rsseting4 = mysqli_query($con, $quseting);
$rwseting4 = mysqli_fetch_array($rsseting);


$persenreff  = $rwseting['value'];
$persenreff2 = $rwseting2['value'];
$persenreff3 = $rwseting3['value'];
$persenreff4 = $rwseting4['value'];


$persenreff = $rwseting['value'];


$dayprofit = "SELECT * from trading where days !=0 and invest_status='Active'";
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

	$balikmodal = ($persenmember / 100) * $invest;

	$profimember = ($persenmember / 100) * $invest;

	$profitreff = ($persenreff / 100) * $profimember;

	$profitReff2 = ($persenreff2 / 100) * $profimember;

	$profitReff3 = ($persenreff3 / 100) * $profimember;

	$profitReff4 = ($persenreff4 / 100) * $profimember;

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

	$update_profit = "INSERT INTO tb_profit SET user_id='$user_id', contract_id='$kontrak', profit_value='1', tanggal='$time_now'";
	mysqli_query($con, $update_profit);

	// add profit
	$tradingProfitLeft = "UPDATE trading set days=days-1 where autono='$idtrade'";
	mysqli_query($con, $tradingProfitLeft);

	// add invest balance user
	$balanceUserInvest = "UPDATE users set saldo_invest=saldo_invest+$profimember where user_id='$user_id'";
	mysqli_query($con, $balanceUserInvest);


	/* UPLINE 1 */
	if ($persenreff > 0 && $reff_id > 0) {
		$history_reff = "INSERT into history_profit_reff set user_id='$reff_id',bonus_reff='$profitreff',tanggal='$time_now',keterangan='Bonus form referral for contract: $kontrak'";
		mysqli_query($con, $history_reff);

		$balancereff = "UPDATE users set saldo_invest=saldo_invest+$profitreff where user_id='$reff_id'";
		mysqli_query($con, $balancereff);
	}
	/* END UPLINE 1 */


	/* UPLINE 2 */
	$checkUser = "SELECT * FROM users where user_id='$reff_id'";
	$resCheckUser = mysqli_query($con, $checkUser);
	$getUpline1 = mysqli_fetch_array($resCheckUser);
	$reff2 = $getUpline1['reff_id'];
	if ($persenreff2 > 0 && $reff2 > 0) {
		$history_reff2 = "INSERT into history_profit_reff set user_id='$reff2',bonus_reff='$profitreff2',tanggal='$time_now',keterangan='Bonus form referral for contract: $kontrak'";
		$queryReff2 = mysqli_query($con, $history_reff2);

		$reffPersent1 = "UPDATE users set saldo_invest=saldo_invest+$profitreff2 WHERE user_id='$reff2'";
		$addBonus1 = mysqli_query($con, $reffPersent1);
		echo $addBonus1;
		echo "<br>";
	}
	/* END UPLINE 2 */

	/* UPLINE 3 */
	$checkUser1 = "SELECT * FROM users WHERE user_id='$reff2'";
	$resCheckUser1 = mysqli_query($con, $checkUser1);
	$getUpline2 = mysqli_fetch_array($resCheckUser1);
	$reff3 = $getUpline2['reff_id'];
	if ($persenreff3 > 0 && $reff3 > 0) {
		$history_reff3 = "INSERT into history_profit_reff set user_id='$reff3',bonus_reff='$profitreff3',tanggal='$time_now',keterangan='Bonus form referral for contract: $kontrak'";
		mysqli_query($con, $history_reff3);

		$reffPersent2 = "UPDATE users set saldo_invest=saldo_invest+$profitreff3 WHERE user_id='$reff3'";
		$addBonus2 = mysqli_query($con, $reffPersent2);
		echo $addBonus2;
		echo "<br>";
	}
	/* END UPLINE 3 */

	/* UPLINE 4 */
	$checkUser2 = "SELECT * FROM users WHERE user_id='$reff3'";
	$resCheckUser2 = mysqli_query($con, $checkUser1);
	$getUpline3 = mysqli_fetch_array($resCheckUser1);
	$reff4 = $getUpline3['reff_id'];
	if ($persenreff4 > 0 && $reff4 > 0) {
		$history_reff4 = "INSERT into history_profit_reff set user_id='$reff4',bonus_reff='$profitreff4',tanggal='$time_now',keterangan='Bonus form referral for contract: $kontrak'";
		mysqli_query($con, $history_reff4);

		$reffPersent3 = "UPDATE users set saldo_invest=saldo_invest+$profitreff4 WHERE user_id='$reff4'";
		$addBonus3 = mysqli_query($con, $reffPersent3);
		echo $addBonus3;
		echo "<br>";
	}
	/* END UPLINE 4 */
}

// auto refund investment
$dayprofit = "SELECT * FROM trading WHERE days=0 AND invest_status='Active'";
$rsprofit = mysqli_query($con, $dayprofit);
while ($rwprofit = mysqli_fetch_array($rsprofit)) {
	$contract_id = $rwprofit['contract_id'];
	$userrefun = $rwprofit['user_id'];
	$idrefund = $rwprofit['autono'];
	$refund = $rwprofit['amount_invest'];

	$tradingProfitLeft = "UPDATE trading set amount_invest=amount_invest-amount_invest, invest_status='Finish' where autono='$idrefund'";
	mysqli_query($con, $tradingProfitLeft);

	// total sisa invest ditambah total invest balance
	$qsi = "UPDATE users SET saldo_invest=saldo_invest+$refund WHERE user_id='$userrefun'";
	$psi = mysqli_query($con, $qsi);
}
echo 'test';
