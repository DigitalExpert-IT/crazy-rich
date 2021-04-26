<style>
    .font-bold {
        font-weight: bolder;
    }
</style>
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
<div class="page-content">
    <div class="container-fluid">
        <?php include('template/component/referral-card.php') ?>
        <div class="row">
            <div class="col-md-12 col-xl-12">

                <!-- Simple card -->
                <div class="card">
                    <div class="card-body">
                        <div class="info-box-icon">
                            <i class="fas fa-money-check-alt icon-card icon-green"></i>
                        </div>
                        <h4 class="card-title mt-0">Your Balance</h4>

                        <p class="card-text font-bold"><?= rupiah(saldo($_SESSION['user_id'])) * $rateidr ?></p>
                        <button type="button" class="btn btn-primary waves-effect waves-light w-sm" data-bs-toggle="modal" data-bs-target=".deposit"><i class="uil uil-money-insert me-2"></i>Deposit</button>

                        <button type="button" class="btn btn-warning waves-effect waves-light w-sm" data-bs-toggle="modal" data-bs-target=".withdraw"><i class="uil uil-money-withdraw me-2"></i>Withdraw</button>
                    </div>
                </div>
                <!-- Modal Deposit -->
                <div class="modal fade deposit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Deposit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">

                                <form>
                                    <label class="form-label" for="nama">Rate BIDR/IDR: <?= dolar(1.0) ?> / <?= rupiah($rateidr) ?>
                                    </label>
                                    <input hidden="" name="id_tf" id="id_tf2" value="">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="usd_depo">Deposit Amount IDR</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="usd_depoPrepend">Rp</span>
                                            </div>
                                            <input type="number" class="form-control" name="usd_depo" onKeyUp="rupiahh()" id="usd_depo" required placeholder="Input Your Amount Here">
                                        </div>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="idr_depo">Deposit Amount BIDR</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="idr_depoPrepend">BIDR</span>
                                            </div>
                                            <input class="form-control" type="text" readonly name="idr_depo" id="idr_depo">
                                        </div>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="idr_depo_fee">Deposit Fee Amount BIDR</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="idr_depo_feePrepend">BIDR</span>
                                            </div>
                                            <input class="form-control" type="text" readonly name="idr_depo_fee" id="idr_depo_fee">
                                        </div>
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="idr_depo_total">Total Deposit Amount BIDR</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="idr_depo_totalPrepend">BIDR</span>
                                            </div>
                                            <input class="form-control" type="text" readonly name="idr_depo_total" id="idr_depo_total">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Address Admin TRC-20 </label>
                                        <input type="text" class="form-control" id="address_admin" name="address_admin" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Please TX ID </label>
                                        <input type="text" class="form-control" placeholder="Input TX ID Here" name="indodax" id="vocer_indodax" required />
                                    </div>
                                    <div>
                                        <div>
                                            <button type="button" id="btn-deposit" class="btn btn-primary waves-effect waves-light me-1" onclick="deposit()">
                                                <span class="loader-hide" id="loader-btn-deposit"><img src="../minible/images/loader.gif" width="30" alt="" aria-hidden=""> </span>
                                                Deposit
                                            </button>
                                            <button data-bs-dismiss="modal" type="button" class="btn btn-secondary waves-effect">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <!-- /.end modal deposit -->

                <!-- Modal Withdraw -->
                <div class="modal fade withdraw" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Withdraw</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <input hidden="" name="id_tf" id="id_tf" value="">

                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="wd">Amount</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="wdPrepend">Rp</span>
                                            </div>
                                            <input type="number" class="form-control" name="beforefee" onKeyUp="cekfeewd()" id="wd" required placeholder="Input Your Amount Here">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Address </label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Input Addres Here" />
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="feewd">Fee Withdraw</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="feewdPrepend">Rp</span>
                                            </div>
                                            <input class="form-control" type="text" readonly name="feewd" id="feewd">
                                        </div>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="amountwd">Total Withdraw USD</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="amountwdPrepend">Rp</span>
                                            </div>
                                            <input class="form-control" type="text" readonly name="amountwd" id="amountwd">
                                        </div>
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="amountidr">Total Withdraw BIDR</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="amountidrPrepend">BIDR</span>
                                            </div>
                                            <input class="form-control" type="text" readonly name="amountidr" id="amountidr">
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <button type="button" id="btn-process-wd" class="btn btn-primary waves-effect waves-light me-1" onclick="processwd()">
                                                <span class="loader-hide" id="loader-btn-wd"><img src="../minible/images/loader.gif" width="30" alt=""> </span>
                                                Withdraw
                                            </button>
                                            <button data-bs-dismiss="modal" type="button" class="btn btn-secondary waves-effect">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <!-- /.end modal withdraw -->


            </div><!-- end col -->
        </div>

        <!-- Deposit Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Deposit History</h4>

                        <div class="table-responsive">
                            <table id="historydepo" class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Deposit ID</th>
                                        <th>Deposit USD</th>
                                        <th>Deposit USDT</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <!-- Withdraw Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Withdraw history</h4>

                        <div class="table-responsive">
                            <table id="historywd" class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Invest ID</th>
                                        <th>Total USD</th>
                                        <th>Total USDT</th>
                                        <th>Status</th>
                                        <th>TXID</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div> <!-- container-fluid -->
</div>
<script>
    $(document).ready(function() {
        var address = '<?= $resadd ?>';
        $("#address_admin").val(address);
    })

    $(document).ready(function() {
        var table = $('#historydepo').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/depowd/data/depotransaction.php",
            "order": [
                [0, "desc"]
            ]
        });
        // setInterval(function() {
        //     table.ajax.reload();
        // }, 30000);
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
        // setInterval(function() {
        //     table.ajax.reload();
        // }, 30000);
    });

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
            beforeSend: function() {
                $("#btn-deposit").attr('disabled', true);
                $("#loader-btn-deposit").removeClass('loader-hide');
            },
            success: function(data) {
                if (data.status == 'gagal') {
                    Swal.fire({
                        title: "Error",
                        text: "Please Fill All Input :)",
                        icon: "error"
                    })
                } else {
                    Swal.fire({
                        title: "Success",
                        text: "Deposit Success. Please Wait Until Admin Approve :)",
                        icon: "success"
                    }).then((res) => {
                        location.reload();
                        document.getElementById("usd_depo").value = "";
                    })
                }
            }
        }).done(function() {
            $("#btn-deposit").removeAttr('disabled');
            $("#loader-btn-deposit").addClass('loader-hide');
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
            beforeSend: function() {
                $("#loader-btn-wd").removeClass('loader-hide');
                $("#btn-process-wd").attr('disabled', true);
            },
            success: function(data) {
                if (data.status == 'Success') {
                    Swal.fire({
                        title: "Success",
                        text: "Withdraw Success. Please Wait Until Admin Approve :)",
                        icon: "success"
                    }).then((res) => {
                        location.reload();
                    })
                } else if (data.status == 'failed') {
                    Swal.fire({
                        title: "Error",
                        text: "Please Fill All Input :(",
                        icon: "error"
                    })
                } else if (data.status == 'Error') {
                    Swal.fire({
                        title: "Error",
                        text: "There's Something Wrong, Please Try Again :(",
                        icon: "error"
                    }).then((res) => {
                        location.reload();
                    })
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "Withdraw Failed Your Balance influence :(",
                        icon: "error"
                    })
                }
            }
        }).done(function() {
            $("#loader-btn-wd").addClass('loader-hide');
            $("#btn-process-wd").removeAttr('disabled');
        })
    }
</script>