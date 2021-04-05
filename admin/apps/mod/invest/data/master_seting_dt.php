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

  $link = "<a href='#' class='btn btn-success waves-effect waves-light detail' onclick='clickButton($id)' data-id='$id' data-bs-toggle='modal' data-bs-target='#modal-master-setting'>Detail</a>";
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

// DB table to use
$table = 'master_seting';

// Table's primary key
$primaryKey = 'autono';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

$columns = array(
  array('db' => 'autono', 'dt' => 0),
  array('db' => 'nama_seting', 'dt' => 1),
  array(
    'db' => 'type',
    'dt' => 2,
    'formatter' => function ($d, $row) {
      // var_dump($d);
      if ($d == 0) {
        return dolar($row['value']);
      } else {
        return '<span>' . $row['value'] . '%</span>';
      }

      // return $result;
    }
  ),
  array('db' => 'keterangan_seting', 'dt' => 3),
  array(
    'db' => 'autono',
    'dt' => 4,
    'formatter' => function ($d, $row) {
      return modal($d);
    }
  )


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
