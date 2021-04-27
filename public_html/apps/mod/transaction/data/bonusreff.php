<?php
ini_set('display_errors', 0);
session_start();
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
include_once('../../../../assets/dbconnect.php');

// DB table to use
$table = 'history_profit_reff';

// Table's primary key
$primaryKey = 'autono';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
function getUsername($id)
{
    global $con;
    $query = "SELECT * FROM users WHERE user_id = $id";
    $res = mysqli_query($con, $query);
    $get = mysqli_fetch_array($res);

    return $get['nama'];
}
$columns = array(


    array(
        'db'        => 'tanggal',
        'dt'        => 0,
        'formatter' => function ($tanggal, $row) {
            return tanggal($tanggal);
        }
    ),
    array(
        'db'        => 'bonus_reff',
        'dt'        => 1,
        'formatter' => function ($rank, $row) {
            return rupiah($rank);
        }
    ),
    array(
        'db' => 'downline_id',
        'dt' => 2,
        'formatter' => function ($data, $row) {
            return getUsername($data);
        }
    ),
    array(
        'db' => 'level',
        'dt' => 3,
        'formatter' => function ($data, $row) {
            return "Level $data";
        }
    ),
    array('db' => 'keterangan',  'dt' => 4),
    array('db' => 'autono',  'dt' => 5)
);

// SQL server connection information
$sql_details = array(
    'user' => $userdb,
    'pass' => $passdb,
    'db'   => 'db_mining',
    'host' => 'localhost'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('../ssp.class.php');

echo json_encode(
    SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "user_id = '$_SESSION[user_id]'")
);
