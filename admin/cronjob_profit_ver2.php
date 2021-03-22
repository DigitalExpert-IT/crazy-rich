<?php
ini_set('display_errors', 0);

$userdb = 'sandy';
$host = 'localhost';
$passdb = 'superman';
$dbselect = 'db_genesis';

$baseurl = "#";

// set default time asia/jakarta
date_default_timezone_set("Asia/Jakarta");
$time = time();
$time_now = date("Y-m-d H:i:s", $time);

function hari_ini()
{
	$hari = date("D");

	switch ($hari) {
		case 'Sun':
			$hari_ini = "Minggu";
			break;

		case 'Mon':
			$hari_ini = "Senin";
			break;

		case 'Tue':
			$hari_ini = "Selasa";
			break;

		case 'Wed':
			$hari_ini = "Rabu";
			break;

		case 'Thu':
			$hari_ini = "Kamis";
			break;

		case 'Fri':
			$hari_ini = "Jumat";
			break;

		case 'Sat':
			$hari_ini = "Sabtu";
			break;

		default:
			$hari_ini = "Tidak di ketahui";
			break;
	}

	return  $hari_ini;
}

if (hari_ini() == 'Minggu' || hari_ini() == 'Senin') {

	echo 'No Trade';
} else {

	$con = mysqli_connect($host, $userdb, $passdb);
	mysqli_select_db($con, $dbselect);

	$quseting = "select * from master_seting where nama_seting ='reff_persen'";
	$rsseting = mysqli_query($con, $quseting);
	$rwseting = mysqli_fetch_array($rsseting);


	$persenreff = $rwseting['value'];


	$dayprofit = "select * from trading where day_left !=0 and invest_status='Active'";
	$rsprofit = mysqli_query($con, $dayprofit);

	while ($rwprofit = mysqli_fetch_array($rsprofit)) {

		$idtrade = $rwprofit['autono'];
		$kontrak = $rwprofit['contract_id'];
		$paketid =  $rwprofit['paket_id'];

		$qupersen = "select * from master_invest where code_produk='$paketid'";
		$rspersen = mysqli_query($con, $qupersen);
		$rwpersen = mysqli_fetch_array($rspersen);

		$persenmember = $rwpersen['profit_harinini'];
		$invest = $rwprofit['paket_invest'];
		$user_id = $rwprofit['user_id'];
		$reff_id = $rwprofit['reff_id'];
		$balikmodal = ($persenmember / 100) * $invest;

		$profimember = ($persenmember / 100) * $invest;

		$profitreff = ($persenreff / 100) * $profimember;

		//update balance user
		// $updatebalance = "update users set saldo_aktif=saldo_aktif+$profimember+$balikmodal where user_id='$user_id'";
		// mysqli_query($con, $updatebalance);

		$amount_user = "SELECT amount_invest FROM trading WHERE user_id='$user_id' AND invest_status='Active' AND contract_id='$kontrak'";
		$amount = mysqli_query($con, $amount_user);
		$res_amount = mysqli_fetch_assoc($amount);
		$amount = $res_amount['amount_invest'] - $balikmodal;
		// die(var_dump($amount));
		// die(var_dump(($persenmember / 100) * $invest));
		$profit_member = $res_amount['amount_invest'];
		if ($amount > -1) {

			//history profit member
			$historyprofit = "insert into history_profit set user_id='$user_id', profit_percen='$persenmember', profit='$profimember',tanggal='$time_now',keterangan='Trade Profit for contract: $kontrak'";
			mysqli_query($con, $historyprofit);
			//history balmod
			$historybalmod = "insert into history_balmod set user_id='$user_id',balmod='$profimember',tanggal='$time_now',keterangan='Investmend refund for contract: $kontrak'";
			$test = mysqli_query($con, $historybalmod);
			// die(var_dump($balikmodal));
			//update balik modal
			if ($persenmember < 0) {
				$balikmodal = abs($balikmodal);
				$amount_invest = $rwprofit['amount_invest'];
				$amount_invest -= $balikmodal;
				if ($amount_invest < 0) {
					$updatebalmod = "update trading set amount_invest=0 where user_id='$user_id' AND invest_status='Active' AND contract_id='$kontrak'";
					mysqli_query($con, $updatebalmod);
				} else {
					$updatebalmod = "update trading set amount_invest=amount_invest-$balikmodal where user_id='$user_id' AND invest_status='Active' AND contract_id='$kontrak'";
					mysqli_query($con, $updatebalmod);
				}
			} else {
				$updatebalmod = "update trading set amount_invest=amount_invest-$balikmodal where user_id='$user_id' AND invest_status='Active' AND contract_id='$kontrak'";
				mysqli_query($con, $updatebalmod);
			}
		} else {

			//history profit member
			$historyprofit = "insert into history_profit set user_id='$user_id', profit_percen='$persenmember', profit='$profit_member',tanggal='$time_now',keterangan='Trade Profit for contract: $kontrak'";
			mysqli_query($con, $historyprofit);
			//history balmod
			$historybalmod = "insert into history_balmod set user_id='$user_id',balmod='$profit_member',tanggal='$time_now',keterangan='Investmend refund for contract: $kontrak'";
			$test = mysqli_query($con, $historybalmod);

			if ($persenmember < 0) {
				$balikmodal = abs($balikmodal);
				$updatebalmod = "update trading set amount_invest=amount_invest-amount_invest where user_id='$user_id' AND invest_status='Active' AND contract_id='$kontrak'";
				mysqli_query($con, $updatebalmod);
			} else {
				$updatebalmod = "update trading set amount_invest=amount_invest-amount_invest where user_id='$user_id' AND invest_status='Active' AND contract_id='$kontrak'";
				mysqli_query($con, $updatebalmod);
			}
		}

		// update profit balik modal
		if ($amount > -1) {
			$tot_profit = $balikmodal + $profimember;
		} else {
			$tot_profit = $res_amount['amount_invest'] * 2;
		}

		$update_profit = "INSERT INTO tb_profit SET user_id='$user_id', contract_id='$kontrak', profit_value='$tot_profit', tanggal='$time_now'";
		mysqli_query($con, $update_profit);

		// update saldo invest
		if ($persenmember > 0) {
			$qusi = "UPDATE users SET saldo_invest=saldo_invest+$tot_profit WHERE user_id='$user_id'";
			mysqli_query($con, $qusi);
		}

		// mengurani hari trade
		$dayleft = "update trading set day_left=day_left-1 where autono='$idtrade'";
		mysqli_query($con, $dayleft);

		if ($persenreff > 0 && $reff_id > 0) {
			//history reff profit
			$history_reff = "insert into history_profit_reff set user_id='$reff_id',bonus_reff='$profitreff',tanggal='$time_now',keterangan='Bonus form referral for contract: $kontrak'";
			mysqli_query($con, $history_reff);

			//update balance user bonus referral
			$balancereff = "update users set saldo_invest=saldo_invest+$profitreff where user_id='$reff_id'";
			mysqli_query($con, $balancereff);
		}
	}

	// auto refund investment
	$dayprofit = "SELECT * FROM trading WHERE day_left=0 OR amount_invest=0 AND invest_status='Active'";
	$rsprofit = mysqli_query($con, $dayprofit);
	while ($rwprofit = mysqli_fetch_array($rsprofit)) {
		$contract_id = $rwprofit['contract_id'];
		$userrefun = $rwprofit['user_id'];
		$idrefund = $rwprofit['autono'];
		$refund = $rwprofit['amount_invest'];

		// $refunbalance = "update users set saldo_aktif=saldo_aktif+$refund where user_id='$userrefun'";
		// mysqli_query($con, $refunbalance);
		$dayleft = "update trading set invest_status='Finish' where autono='$idrefund'";
		mysqli_query($con, $dayleft);

		// total sisa invest ditambah total invest balance
		$qsi = "UPDATE users SET saldo_invest=saldo_invest+$refund WHERE user_id='$userrefun' AND contract_id='$contract_id'";
		$psi = mysqli_query($con, $qsi);

		// update amount invest
		$qsi = "UPDATE trading SET amount_invest=amount_invest-amount_invest WHERE user_id='$userrefun' AND contract_id='$contract_id'";
		$psi = mysqli_query($con, $qsi);

		// create hs refund
		$qhsr = "INSERT INTO history_refund SET user_id='$userrefun', refund='$refund', tanggal='$time_now', keterangan='Refund for contract: $kontrak'";
		$phsr = mysqli_query($con, $qhsr);
	}
}
