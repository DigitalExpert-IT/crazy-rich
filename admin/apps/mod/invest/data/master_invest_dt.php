<?php

session_start();
include '../../../../../public_html/assets/dbconnect.php';


/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
require('../../../template/fungsi.php');

// $user_id = $_SESSION['user_id'];

function modal($id)
{

  $link = "<a href='#' class='btn btn-success waves-effect waves-light detail' onclick='clickButton($id)' data-id='$id' data-bs-toggle='modal' data-bs-target='#daily-profit'>Edit Daily Profit</a>";
  $link .= "<a href='#' class='btn btn-warning waves-effect waves-light detail ml-3' onclick='editButton($id)' data-id='$id' data-bs-toggle='modal' data-bs-target='#other-settings'>Edit Other Settings</a>";
  return $link;
}

function count_member($user)
{
  include "../../../../../public_html/assets/dbconnect.php";

  $qu_user = "SELECT * FROM users WHERE reff_id ='$user'";
  $rs_user = mysqli_query($con, $qu_user);
  // $rw_user = mysqli_fetch_array($rs_user);

  return mysqli_num_rows($rs_user);
}

function badge($d)
{
  if ($d == 'Active') {
    $d = '<span class="badge badge-success">' . $d . '</span>';
    return $d;
  } else if ($d == 'Pending') {
    $d = '<span class="badge badge-warning" style="color:#edf4ff">' . $d . '</span>';
    return $d;
  } else {
    $d = '<span class="badge badge-danger">' . $d . '</span>';
    return $d;
  }
}

function name($name)
{

  global $con;
  $query = "select nama from users where user_id='$name'";
  $process = mysqli_query($con, $query);
  $result = mysqli_fetch_array($process);

  return $result['nama'];
}

function percent($d)
{
  $d = '<span>' . $d . '%</span>';
  return $d;
}



// DB table to use
$table = 'master_invest';

// Table's primary key
$primaryKey = 'autono';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

$columns = array(
  array('db' => 'autono', 'dt' => 0),
  array('db' => 'code_produk', 'dt' => 1),
  array('db' => 'nama_produk', 'dt' => 2),
  array('db' => 'invest_total', 'dt' => 3),
    array('db' => 'quota_usage', 'dt' => 4),
  array(
    'db' => 'package_profit',
    'dt' => 5,
    'formatter' => function ($d, $row) {
      return percent($d);
    }
  ),
  array('db' => 'profit_persen', 'dt' => 6),
  array('db' => 'contract_days', 'dt' => 7),
  array('db' => 'limit_invest', 'dt' => 8),
  array('db' => 'id_investor', 'dt' => 9),
  array('db' => 'password_investor', 'dt' => 10),
  array(
    'db' => 'autono',
    'dt' => 11,
    'formatter' => function ($d, $row) {
      return modal($d);
    }
  ),


);


// SQL server connection information
$sql_details = array(
  'user' => $userdb,
  'pass' => $passdb,
  'db'   => $dbselect,
  'host' => $host
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('ssp.class.php');

// $id = $_SESSION['user_id'];
echo json_encode(
  SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null)
);
