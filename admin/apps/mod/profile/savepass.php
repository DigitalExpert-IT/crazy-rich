<?php
session_start();
ini_set('display_errors', 0);
require('../../template/fungsi.php');

// $oldpass = md5($_POST['oldpass']);
// $newpas1 = md5($_POST['newpas1']);
// $newpas2 = md5($_POST['newpas2']);

$oldpass = $_POST['oldpass'];
$newpas1 = $_POST['newpas1'];
$newpas2 = password_hash($_POST['newpas2'], PASSWORD_DEFAULT);

$qucek = "select * from admin_users where autono='$_SESSION[autono]'";
$rscek = mysqli_query($con, $qucek);
$rwcek = mysqli_fetch_array($rscek);

$olpasdb = $rwcek['password_admin'];

if (!password_verify($oldpass, $olpasdb)) {

	echo json_encode(array("status" => "Your old password is incorrect"));
} else if (!password_verify($newpas1, $newpas2)) {
	echo json_encode(array("status" => "Your passwords are not the same"));
} else {


	$update_pass = "update admin_users set password_admin='$newpas2' where autono='$_SESSION[autono]'";
	if (!mysqli_query($con, $update_pass)) {
		echo json_encode(array("status" => "failed"));
	} else {

		echo json_encode(array("status" => "success"));
	}
}
