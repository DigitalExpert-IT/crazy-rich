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
        $d = '<span class="badge rounded-pill bg-success">' . $d . '</span>';
        return $d;
    } else if ($d == 'Pending') {
        $d = '<span class="badge rounded-pill bg-warning">' . $d . '</span>';
        return $d;
    } else {
        $d = '<span class="badge rounded-pill bg-danger">' . $d . '</span>';
        return $d;
    }
}

// DB table to use
$table = 'deposit';

// Table's primary key
$primaryKey = 'autono';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(

    array(
        'db'        => 'date_create',
        'dt'        => 0,
        'formatter' => function ($tanggal, $row) {
            return tanggal($tanggal);
        }
    ),
    array('db' => 'order_id', 'dt' => 1),

    array(
        'db'        => 'total_deposit_idr',
        'dt'        => 3,
        'formatter' => function ($paket, $row) {
            return angka($paket);
        }
    ),
    array(
        'db'        => 'total_deposit_usd',
        'dt'        => 2,
        'formatter' => function ($paket, $row) {
            return dolar($paket);
        }
    ),

    array(
        'db' => 'status',
        'dt' => 4,
        'formatter' => function ($d, $row) {
            return status($d);
        }
    )
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
    SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "user_id = '$_SESSION[user_id]' and status !='new'")
);
