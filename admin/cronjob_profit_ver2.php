<?php
ini_set('display_errors', 0);

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
$rsseting2 = mysqli_query($con, $quseting2);
$rwseting2 = mysqli_fetch_array($rsseting2);

$quseting3 = "SELECT * from master_seting where nama_seting ='reff_persen_3'";
$rsseting3 = mysqli_query($con, $quseting3);
$rwseting3 = mysqli_fetch_array($rsseting3);

$quseting4 = "SELECT * from master_seting where nama_seting ='reff_persen_4'";
$rsseting4 = mysqli_query($con, $quseting4);
$rwseting4 = mysqli_fetch_array($rsseting4);


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

	if ($persenreff > 0 && $reff_id > 0) {

		$queryGetTrading = "SELECT * from trading WHERE user_id='$reff_id' AND invest_status='Active' AND paket_id != 'S1'";
		$resGetTrading = mysqli_query($con, $queryGetTrading);
		$activeTrading = mysqli_num_rows($resGetTrading);
		if ($activeTrading > 0) {
			//history reff profit
			$history_reff = "INSERT into history_profit_reff set downline_id = '$user_id', user_id='$reff_id',bonus_reff='$profitreff',tanggal='$time_now',keterangan='Bonus form referral for contract: $kontrak', level = 1";
			mysqli_query($con, $history_reff);
			//update balance user bonus referral
			$balancereff = "UPDATE users set saldo_invest=saldo_invest+$profitreff where user_id='$reff_id'";
			mysqli_query($con, $balancereff);
		}

		$checkUser = "SELECT * FROM users where user_id='$reff_id'";
		$resCheckUser = mysqli_query($con, $checkUser);
		$getUpline1 = mysqli_fetch_array($resCheckUser);
		$reff2 = $getUpline1['reff_id'];
		if ($persenreff2 > 0 && $reff2 > 0) {
			$queryGetTrading1 = "SELECT * from trading WHERE user_id='$reff2' AND invest_status='Active' AND paket_id != 'S1'";
			$resGetTrading1 = mysqli_query($con, $queryGetTrading1);
			$activeTrading1 = mysqli_num_rows($resGetTrading1);

			if ($activeTrading1 > 0) {
				//history reff2 profit
				$history_reff2 = "INSERT into history_profit_reff set downline_id = '$user_id', user_id='$reff2',bonus_reff='$profitReff2',tanggal='$time_now',keterangan='Bonus form referral for contract: $kontrak', level = 2";
				mysqli_query($con, $history_reff2);

				$reffPersent1 = "UPDATE users set saldo_invest=saldo_invest+$profitReff2 WHERE user_id='$reff2'";
				mysqli_query($con, $reffPersent1);
			}


			$checkUser1 = "SELECT * FROM users WHERE user_id='$reff2'";
			$resCheckUser1 = mysqli_query($con, $checkUser1);
			$getUpline2 = mysqli_fetch_array($resCheckUser1);
			$reff3 = $getUpline2['reff_id'];
			if ($persenreff3 > 0 && $reff3 > 0) {
				$queryGetTrading2 = "SELECT * from trading WHERE user_id='$reff3' AND invest_status='Active' AND paket_id != 'S1'";
				$resGetTrading2 = mysqli_query($con, $queryGetTrading2);
				$activeTrading2 = mysqli_num_rows($resGetTrading2);

				if ($activeTrading2 > 0) {
					$history_reff3 = "INSERT into history_profit_reff set downline_id = '$user_id', user_id='$reff3',bonus_reff='$profitReff3',tanggal='$time_now',keterangan='Bonus form referral for contract: $kontrak', level = 3";
					mysqli_query($con, $history_reff3);

					$reffPersent2 = "UPDATE users set saldo_invest=saldo_invest+$profitReff3 WHERE user_id='$reff3'";
					mysqli_query($con, $reffPersent2);
				}

				$checkUser2 = "SELECT * FROM users WHERE user_id='$reff3'";
				$resCheckUser2 = mysqli_query($con, $checkUser1);
				$getUpline3 = mysqli_fetch_array($resCheckUser1);
				$reff4 = $getUpline3['reff_id'];
				if ($persenreff4 > 0 && $reff4 > 0) {
					$queryGetTrading3 = "SELECT * from trading WHERE user_id='$reff4' AND invest_status='Active' AND paket_id != 'S1'";
					$resGetTrading3 = mysqli_query($con, $queryGetTrading3);
					$activeTrading3 = mysqli_num_rows($resGetTrading3);

					if ($activeTrading3 > 0) {
						//history reff4 profit
						$history_reff4 = "INSERT into history_profit_reff set downline_id = '$user_id', user_id='$reff4',bonus_reff='$profitReff4',tanggal='$time_now',keterangan='Bonus form referral for contract: $kontrak',, level = 4";
						mysqli_query($con, $history_reff4);

						$reffPersent3 = "UPDATE users set saldo_invest=saldo_invest+$profitReff4 WHERE user_id='$reff4'";
						mysqli_query($con, $reffPersent3);
					}
				}
			}
		}
	}
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
