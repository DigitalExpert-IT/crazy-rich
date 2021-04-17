<?php
ini_set('display_errors', 0);
session_start();
include "../../../../../public_html/assets/dbconnect.php";

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
require('../../template/fungsi.php');
function divReff($userId)
{
    global $con;
    $query = "SELECT COUNT(*) as total from users where reff_id='$userId'";
    $res = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($res);
    $link = "<a href='#' class='btn btn-success waves-effect waves-light detail' onclick='getReferral($userId)' data-id='$userId' data-bs-toggle='modal' data-bs-target='#reff-detail'>$data[total] Referral</a>";
    return $link;
}
// DB table to use
$table = 'users';

// Table's primary key
$primaryKey = 'user_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'user_id', 'dt' => 0),
    array('db' => 'nama', 'dt' => 1),
    array('db' => 'email_user',  'dt' => 2),

    array(
        'db'        => 'date_join',
        'dt'        => 3,
        'formatter' => function ($d, $row) {
            return tanggal($d);
        }
    ),
    array('db' => 'reff_code',  'dt' => 4),
    array(
        'db' => 'user_id',
        'dt' => 5,
        'formatter' => function ($data, $row) {
            return divReff($data);
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

require('ssp.class.php');

echo json_encode(
    SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "reff_id ='$_SESSION[user_id]' AND reff_id != '0'")
);
