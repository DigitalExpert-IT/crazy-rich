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

    $link = "<a href='#' class='btn btn-success detail' onclick='clickButton($id)' data-id='$id' data-toggle='modal' data-target='#modal-default'>Detail</a>";
    $link .= "<a href='#' class='btn btn-warning detail ml-3' onclick='editButton($id)' data-id='$id' data-toggle='modal' data-target='#editModal'>Edit</a>";
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

function status($member)
{
    if ($member == 1) {
        $member = 'Active';
        return $member;
    } else {
        $member = 'Deactive';
        return $member;
    }
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
    array('db' => 'nama',  'dt' => 1),
    array('db' => 'email_user', 'dt' => 2),
    // array(  'db' => 'saldo_eddcash', 'dt' => 3 ),

    array(
        'db'        => 'saldo_aktif',
        'dt'        => 3,
        'formatter' => function ($paket, $row) {
            return dolar($paket);
        }
    ),
    array(
        'db' => 'status',
        'dt' => 4,
        'formatter' => function ($member) {
            return status($member);
        }
    ),
    array(
        'db' => 'user_id',
        'dt' => 5,
        'formatter' => function ($id, $row) {
            return modal($id);
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
    SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "verify_email_status = 1")
);
