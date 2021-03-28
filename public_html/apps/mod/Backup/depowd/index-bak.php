<div class="col-md-12">
  <div class="mb-5 mt-5" style="background: #30304d; border-radius:8px;box-shadow: 0 0 0 1px #30304d, 0 8px 16px 0 #30304d;">
    <span class=" info-box-icon" style="background: #30304d;">
      <i class="on ion-cash">
      </i>
    </span>
    <div class="info-box-content">
      <span class="info-box-text ">Your Balance
      </span>
      <span class="info-box-number font-weight-bold">
        <?= dolar(saldo($_SESSION['user_id'])) ?>
      </span>
      <div class="dropdown-divider">
        <div class="progress-bar" style="width: 100%">
        </div>
      </div>
      <?php

      // pending
      $qupending = "select * from deposit where user_id='$_SESSION[user_id]' and status='Pending'";
      $rspending = mysqli_query($con, $qupending);
      $rwpending = mysqli_fetch_array($rspending);
      $depositid = $rwpending['order_id'];
      $qucekwal = "select * from users where user_id='$_SESSION[user_id]'";
      $rscekwal = mysqli_query($con, $qucekwal);
      $rwcekwal = mysqli_fetch_array($rscekwal);

      // get adrress admin
      $qaddres = "SELECT keterangan_seting FROM master_seting WHERE autono=5";
      $paddress = mysqli_query($con, $qaddres);
      $resadd = mysqli_fetch_array($paddress);
      $resadd = $resadd['keterangan_seting'];

      ?>
      <span class="progress-description">

        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#deposit">
          <i class="mdi mdi-briefcase-upload-outline">
          </i> Deposit
        </button>

        <button onClick="loadaddress('<?= $_SESSION['user_id'] ?>')" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#trasfer">
          <i class="mdi mdi-briefcase-download">
          </i> Withdraw
        </button>

      </span>
    </div>
    <!-- /.info-box-content -->
  </div>
</div>
<div id="loading">
</div>
<style type="text/css">
  .dialog-background {
    background: none repeat scroll 0 0 rgba(4, 0, 0, 0.5);
    height: 100%;
    left: 0;
    margin: 0;
    padding: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 100;
  }

  .dialog-loading-wrapper {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: 0 none;
    height: 100px;
    left: 50%;
    margin-left: -50px;
    margin-top: -50px;
    position: fixed;
    top: 50%;
    width: 100px;
    z-index: 9999999;
  }

  .dialog-loading-icon {
    background-color: #FFFFFF !important;
    border-radius: 13px;
    display: block;
    height: 100px;
    line-height: 100px;
    margin: 0;
    padding: 1px;
    text-align: center;
    width: 100px;
  }
</style>

<div class="card">
  <div class="card-header">
    <h6 class="card-title">
      <i class="mdi mdi-history">
      </i> Deposit History
    </h6>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="table-responsive">
      <table id="historydepo" class="table table-bordered table-hover dataTable" style="width:100%">
        <thead>
          <tr>
            <th>Date
            </th>
            <th>Deposit ID
            </th>
            <th>Deposit USD
            </th>
            <th>Deposit USDT
            </th>
            <th>Status
            </th>
          </tr>
        </thead>

      </table>
    </div>
  </div>
  <!-- /.card-body -->
</div>
<div class="card">
  <div class="card-header">
    <h6 class="card-title">
      <i class="mdi mdi-history">
      </i> Withdraw History
    </h6>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="table-responsive">
      <table id="historywd" class="table table-bordered table-hover dataTable" style="width:100%">
        <thead>
          <tr>
            <th>Date
            </th>
            <th>Withdraw ID
            </th>
            <th>Withdraw USD
            </th>
            <th>Withdraw USDT
            </th>
            <th>Status
            </th>
            <th>Withdraw TXID
            </th>
            <th>Address
            </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <!-- /.card-body -->
</div>
<?php
$qufee = "select value from master_seting where nama_seting='wd_persen'";
$rsfee = mysqli_query($con, $qufee);
$rwfees = mysqli_fetch_array($rsfee);
$feewd = $rwfees['value'];

// select rate_currency
// $qurency = "SELECT nama_seting FROM master_seting WHERE autono = 3";
// $pqurency = mysqli_query($con, $qurency);
// $rqurency = mysqli_fetch_array($pqurency);
// $rate =  $rqurency['nama_seting'];

$qurate = "select value from master_seting where autono='3'";
$rsrate = mysqli_query($con, $qurate);
$rwrate = mysqli_fetch_array($rsrate);
$ratewd = $rwrate['value'];

$qurate_fee = "select value from master_seting where autono='4'";
$rsrate_fee = mysqli_query($con, $qurate_fee);
$rwrate_fee = mysqli_fetch_array($rsrate_fee);
$fee_depo = $rwrate_fee['value'];
$fee_depo /= 100;
?>
<div class="modal fade" id="deposit">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <img src="../assets/images/logo/Crazy_richLOGO_COLOR.png" alt="Genesis Trade Logo" class="avatar-md bradius">
        <h3 class="modal-title w-100 text-center font-weight-light"> Crazy Rich Trading Deposit
        </h3>
        <button type="button" class="close" data-dismiss="modal">&times;
        </button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <label for="nama">Rate USDT: <?= $ratewd ?>
        </label>
        <input hidden="" name="id_tf" id="id_tf2" value="">

        <div class="form-group">
          <label for="nama">Deposit Amount USD:
          </label>
          <input type="number" name="usd_depo" onKeyUp="rupiahh()" class="form-control" id="usd_depo">
        </div>
        <div class="form-group">
          <label for="nama">Deposit Amount USDT:
          </label>
          <input readonly type="number" name="idr_depo" class="form-control" id="idr_depo">
        </div>
        <div class="form-group">
          <label for="nama">Deposit Fee Amount USDT:
          </label>
          <input readonly type="number" name="idr_depo_fee" class="form-control" id="idr_depo_fee">
        </div>
        <div class="form-group">
          <label for="nama">Total Deposit Amount USDT:
          </label>
          <input readonly type="number" name="idr_depo_total" class="form-control" id="idr_depo_total">
        </div>
        <div class="form-group">
          <label for="nama">Address Admin TRC-20 :
          </label>
          <input readonly type="text" name="address_admin" class="form-control" id="address_admin">
        </div>
        <div class="form-group">
          <label for="nama">Please Input txid:
          </label>
          <input type="text" name="indodax" class="form-control" id="vocer_indodax" required>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn bg-secondary-gradient" style="color: white;" data-dismiss="modal">Close
        </button>
        <button type="button" onClick="deposit()" class="btn bg-warning-gradient" style="color: white;">Deposit
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="trasfer">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <img src="../assets/images/logo/Crazy_richLOGO_COLOR.png" alt="Genesis Trade Logo" class="avatar-md bradius">
        <h3 class="modal-title w-100 text-center font-weight-light"> Crazy Rich Trading Withdraw
        </h3>
        <button type="button" class="close" data-dismiss="modal">&times;
        </button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <input hidden="" name="id_tf" id="id_tf" value="">

        <div class="form-group">
          <label for="email">Amount:
          </label>
          <input type="number" step="any" onkeyup="cekfeewd()" name="beforefee" class="form-control" id="wd">
        </div>
        <div class="form-group">
          <label for="address">Address:
          </label>
          <input type="text" require name="address" class="form-control" id="address">
        </div>
        <div class="form-group">
          <label for="email">Fee Withdraw $ :
          </label>
          <input readonly="readonly" type="number" step="any" name="feewd" class="form-control" id="feewd">
        </div>
        <div class="form-group">
          <label for="email">Total Withdraw USD:
          </label>
          <input readonly type="number" step="any" name="amountwd" class="form-control" id="amountwd">
        </div>

        <div class="form-group">
          <label for="email">Total Withdraw USDT:
          </label>
          <input readonly type="number" step="any" name="amountidr" class="form-control" id="amountidr">
        </div>


        <!-- <div class="form-group">
          <label for="email">Address:
          </label>
          <input readonly type="text" step="any" name="address" class="form-control" id="cryptoaddress">
        </div> -->
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn bg-secondary-gradient" style="color: white;" data-dismiss="modal">Close
        </button>
        <button type="button" onClick="processwd()" class="btn bg-warning-gradient" style="color: white;">Withdraw
        </button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    var table = $('#historydepo').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "mod/depowd/data/depotransaction.php",
      "order": [
        [0, "desc"]
      ]
    });
    setInterval(function() {
      table.ajax.reload();
    }, 30000);
  });
  $(document).ready(function() {
    var table = $('#historywd').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "mod/depowd/data/wdtransaction.php",
      "order": [
        [0, "desc"]
      ]
    });
    setInterval(function() {
      table.ajax.reload();
    }, 30000);
  });
</script>

<!-- modal depo add address -->
<script>
  $(document).ready(function() {
    var address = '<?= $resadd ?>';
    $("#address_admin").val(address);
  })
</script>
<!-- end modal depo add address -->

<script>
  function rupiahh() {
    var deposit = document.getElementById("usd_depo").value;
    var rate = <?= $ratewd ?>;
    var fee_depo = <?= $fee_depo ?>;
    var total = deposit * rate;
    var fee = parseFloat(deposit) * parseFloat(fee_depo);
    var total_depo = parseFloat(total) + parseFloat(fee);


    var idr_depo = document.getElementById("idr_depo").value = total.toFixed(2);
    var idr_depo_fee = $("#idr_depo_fee").val(fee.toFixed(2));
    var idr_depo_total = $("#idr_depo_total").val(total_depo.toFixed(2));


  }

  function deposit() {
    $("#loading").append('<div  class="dialog-background"><div class="dialog-loading-wrapper"><span class="dialog-loading-icon"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></span></div></div>');
    var deposit = document.getElementById("usd_depo").value;
    var voceridx = document.getElementById("vocer_indodax").value;
    var idr_depo = document.getElementById("idr_depo").value;
    $('#deposit').modal('hide');
    $.ajax({
      url: "mod/depowd/order.php",
      method: "POST",
      data: {
        usd_depo: deposit,
        vocer: voceridx,
        idrdepo: idr_depo



      },
      dataType: "JSON",
      success: function(data) {
        if (data.status == 'failed') {
          alert("Failed to Make an Invoice Please fill in the correct Amount");
          location.reload();
        } else {

          $("#loading").html("");
          document.getElementById("usd_depo").value = "";
          location.reload();
        }
      }
    })
  };

  function loadaddress(id) {
    $.ajax({
      url: "mod/depowd/calladdress.php",
      method: "POST",
      data: {
        user_id: id
      },
      dataType: "JSON",
      success: function(data) {
        console.log(data);
        document.getElementById("cryptocurency").value = data.crypto;
        document.getElementById("addresscrypto").value = data.address;
      }
    })
  }

  function pleasepay(payid) {
    alert('Please finish your Deposit ID ' + payid + ' First!!!');
    location.reload();
  }

  function cekadress() {
    alert('Please set your USDT Address at profile settings ');
    location.reload();
  }
  var crypton = "";
  var addresscrypto = "";

  function cekfeewd() {
    fee = 0;
    wd = document.getElementById("wd").value;
    fee = wd * <?= $feewd ?> / 100;
    amountwd = wd - fee;
    var rate = <?= $ratewd ?>;
    rupiah = amountwd * rate;
    document.getElementById("feewd").value = fee;
    document.getElementById("amountwd").value = amountwd;
    idrwd = document.getElementById("amountidr").value = rupiah.toFixed(2);

  }

  function processwd() {
    var address = $("#address").val();
    $.ajax({
      url: "mod/depowd/withdraw.php",
      method: "POST",
      data: {
        feewd: fee,
        beforefee: wd,
        amountwd: amountwd,
        rupiahwd: idrwd,
        address: address,
      },
      dataType: "JSON",
      success: function(data) {
        if (data.status == 'Success') {
          alert('Withdraw Success');
          location.reload();
        } else if (data.status == 'Error') {
          alert("Ther's Something Wrong. Pleast Try Again")
          location.reload();
        } else {
          alert('Withdraw Failed Your Balance influence');
          location.reload();
        }
      }
    });
  }
</script>