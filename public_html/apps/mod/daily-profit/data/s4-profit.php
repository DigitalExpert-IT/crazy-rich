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
// fungsi
function status($d)
{
    if ($d == 'Success') {
        $d = '<span class="badge badge-success">' . $d . '</span>';
        return $d;
    } else if ($d == 'Pending') {
        $d = '<span class="badge badge-warning">' . $d . '</span>';
        return $d;
    } else {
        $d = '<span class="badge badge-danger">' . $d . '</span>';
        return $d;
    }
}

function percent($d)
{
    return $d . '%';
}

// DB table to use
$table = 'history_profit';

// Table's primary key
$primaryKey = 'autono';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array(
        'db' => 'autono',
        'dt' => 0,
    ),
    array(
        'db'        => 'tanggal',
        'dt'        => 1,
        'formatter' => function ($tanggal, $row) {
            return tanggal($tanggal);
        }
    ),
    array(
        'db'        => 'profit_percen',
        'dt'        => 2,
        'formatter' => function ($percent, $row) {
            return percent($percent);
        }
    ),
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

$where = "user_id = '$_SESSION[user_id]' AND date(tanggal) >= date(now()-interval 30 day) AND package_id = 'S4'";

require('../ssp.class.php');

echo json_encode(
    SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, $where)
);
