<?php
ini_set('display_errors', 1);
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

// fungsi
function modal($id)
{
  include '../../../../../public_html/assets/dbconnect.php';

  $link = "<a href='#' class='btn btn-warning edit' onclick='editIframeButton($id)' data-id='$id' data-toggle='modal' data-target='#modal-edit-iframe'>Edit</a>";
  return $link;
}

function text($frame)
{
  $frame = htmlspecialchars($frame);
  return $frame;
}

// DB table to use
$table = 'youtube_streaming';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(

  // array(
  //   'db'    => 'users_id',
  //   'dt' => 0,
  //   'formatter' => function ($id, $row) {
  //     return userName($id);
  //   }
  // ),
  array('db'    => 'id',         'dt' => 0),
  array(
    'db'        => 'iframe_link',
    'dt'        => 1,
    'formatter' => function ($frame, $row) {
      return text($frame);
    }
  ),
  array(
    'db'        => 'id',
    'dt'        => 2,
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

echo json_encode(
  SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null)
);
