<div class="page-content">
    <div class="container-fluid">
        <?php include('template/component/referral-card.php') ?>
        <div class="row">
            <?php
            $qupaket = "select * from master_invest";
            $rspaket = mysqli_query($con, $qupaket);
            $x = 0;
            while ($rwpaket = mysqli_fetch_array($rspaket)) {
                $x++;

                $qucekinvest = "select * from trading where paket_id='$rwpaket[code_produk]' and invest_status='Active' and user_id='$_SESSION[user_id]'";
                $rsinvest = mysqli_query($con, $qucekinvest);
                $rwinvest = mysqli_fetch_array($rsinvest);
                $cek = $rwinvest['paket_id'];

                $totalinvest = "select sum(paket_invest) as totalinvest from trading where paket_id='$rwpaket[code_produk]'  and invest_status='Active' ";
                $rstotinvest = mysqli_query($con, $totalinvest);
                $rwtotinvest = mysqli_fetch_array($rstotinvest);
                $totalinvestmnet = $rwtotinvest['totalinvest'];

                $quhispaket = "select count('contract_id') as total_trade from trading where paket_id='$rwpaket[code_produk]' and user_id = '$_SESSION[user_id]'";
                $rshispaket = mysqli_query($con, $quhispaket);
                $rwhispaket = mysqli_fetch_object($rshispaket);

            ?>
                <!-- content -->
                <div class="col-lg-3">
                    <div class="card border border-primary">
                        <div class="card-header bg-transparent border-primary">
                            <h5 class="my-0 text-primary text-center"><?= $rwpaket['nama_produk'] ?></h5>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title mt-0">Min/Max Invest : <br> <?= rupiah($rwpaket['invest_total']); ?> - <?= $rwpaket['limit_invest'] == 0 ? 'unlimited' : rupiah($rwpaket['limit_invest']); ?></h5>
                            <ul class="list-unstyled leading-loose">
                                <li class="font-small solid-divider"> Get <?= $rwpaket['profit_persen'] ?> Daily</li>
                                <li class="font-small solid-divider"><i class="fas fa-check icon-green mr-2"></i> <?= $rwpaket['contract_days'] ?> days Contract Circle</li>
                                <li class="font-small solid-divider"><?php echo $rwpaket['id_investor']; ?></li>
                                <li class="font-small solid-divider"><?php echo $rwpaket['password_investor']; ?></li>
                            </ul>

                            <div class="text-center mt-6">
                                <a <?php if ($rwhispaket->total_trade >= $rwpaket['quota_usage'] && $rwpaket['quota_usage'] != 0) {
                                        echo '';
                                    } else { ?> onClick="pakets('<?= $rwpaket['code_produk'] ?>')" data-bs-toggle="modal" data-bs-target=".trade" <?php } ?> href="#" class="btn btn-primary waves-effect waves-light w-sm">
                                    <?php if ($rwhispaket->total_trade >= $rwpaket['quota_usage'] && $rwpaket['quota_usage'] != 0) {
                                        echo $rwpaket['nama_produk'] . ' hanya bisa di pakai ' . $rwpaket['quota_usage'] . '     kali';
                                    } else {
                                        echo $rwpaket['nama_produk'];
                                    } ?>
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Simple card -->
            <div class="card">
                <div class="card-body">
                    <div class="info-box-icon">
                        <i class="fas fa-money-check-alt icon-card icon-green"></i>
                    </div>
                    <h4 class="card-title mt-0">Your Main Balance</h4>

                    <p class="card-text font-bold"><?= rupiah(saldo($_SESSION['user_id'])) ?></p>
                </div>
            </div>
            <!-- Simple card -->
            <div class="card">
                <div class="card-body">
                    <div class="info-box-icon">
                        <i class="fas fa-money-check-alt icon-card icon-green"></i>
                    </div>
                    <h4 class="card-title mt-0">Profit Invest</h4>

                    <p class="card-text font-bold"><?= rupiah(profitInvest($_SESSION['user_id'])) ?></p>

                    <button type="button" class="btn btn-warning waves-effect waves-light w-sm" data-bs-toggle="modal" data-bs-target=".withdraw"><i class="uil uil-money-withdraw me-2"></i>Withdraw Invest</button>
                </div>
            </div>
        </div>
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
                                        <span class="input-group-text" id="wdPrepend">$</span>
                                    </div>
                                    <input type="number" class="form-control" name="beforefee" onKeyUp="cekfeewd()" id="wd" required placeholder="Input Your Amount Here">
                                </div>
                            </div>

                            <div class="mb-3 position-relative">
                                <label class="form-label" for="feewd">Fee Withdraw</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="feewdPrepend">$</span>
                                    </div>
                                    <input class="form-control" type="text" readonly name="feewd" id="feewd">
                                </div>
                            </div>
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="amountwd">Total Withdraw USD</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="amountwdPrepend">$</span>
                                    </div>
                                    <input class="form-control" type="text" readonly name="amountwd" id="amountwd">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <button type="button" id="wd-process" class="btn btn-primary waves-effect waves-light me-1" onclick="processwd()">
                                        <span class="loader-hide" id="loader-wd"><img src="../minible/images/loader.gif" width="30" alt="" aria-hidden=""> </span>
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

        <!-- Modal Trade -->
        <div class="modal fade trade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">SmartTrade Trading</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input hidden="" name="id_tf" id="id_tf" value="">
                            <input hidden name="min_inv" id="min_inv" value="">
                            <input hidden name="limit_inv" id="limit_inv" value="">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="invest">Profit Invest</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="investPrepend">$</span>
                                    </div>
                                    <input type="number" class="form-control" name="totinvest" id="invest" required placeholder="Input Your Amount Here">
                                </div>
                            </div>

                            <div class="mb-3 position-relative">
                                <label class="form-label" for="profit">Profit %</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="profitPrepend">%</span>
                                    </div>
                                    <input class="form-control" type="text" readonly name="profits" id="profit">
                                </div>
                            </div>
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="amountwd">Contract Days</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" readonly name="days" id="days">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="profitsPrepend">Days</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <button type="button" id="trade-proccess" class="btn btn-primary waves-effect waves-light me-1" onclick="process()">
                                        <span class="loader-hide" id="loader-trade"><img src="../minible/images/loader.gif" width="30" alt="" aria-hidden=""> </span>
                                        Trade
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
        <!-- /.end modal trade -->

        <!-- Table Investment Transaction -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Invest Transaction</h4>
                        <div class="table-responsive">
                            <table id="myreff" class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Invest Date</th>
                                        <th>Contract ID</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Contract Days Left</th>
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

        <!-- Table Withdraw History -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Invest Withdraw History</h4>
                        <div class="table-responsive">
                            <table id="historywd" class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Withdraw ID</th>
                                        <th>Withdraw Invest</th>
                                        <th>Amount Withdraw</th>
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

    </div>
</div>

<?php
$qufee = "select value from master_seting where nama_seting='fee_kurs'";
$rsfee = mysqli_query($con, $qufee);
$rwfees = mysqli_fetch_array($rsfee);
$feewd = $rwfees['value'];

?>

<script>
    Swal.fire({
        title: "Smart Trade",
        html: "<p><b>*Smart Trade, adalah produk digital yang memberikan arahan investasi yang terbaik (Multi Trade).</b> <br><br>" +
            "Dengan masa waktu Profit yang telah di sepakati oleh investor <br>" +
            "4 hari, 10 hari, 20 hari, 45 hari <br><br>" +

            "Opsi Market yang tersedia di Smart Trade adalah: <br>" +
            "# Cooking Oil <br>" +
            "# CryptoCurrency <br>" +
            "# Oil & Gas <br>" +
            "# Forex <br><br>" +

            "Cukup monitor keuntungan yang bertambah di akun anda, secara signifikan bersama Smart Trade. <br><br>" +
            "Salam Hormat <br>" +
            "Team Smart Trade </p>",
        // icon: "success"
    })
    $(document).ready(function() {
        var table = $('#myreff').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/trade/history.php",
            "order": [
                [0, "desc"]
            ]

        });
        // setInterval(function() {
        //     table.ajax.reload();
        // }, 30000);
    });
</script>

<script>
    var i = 0;
    var p = 0;
    var d = 0;
    var l = 0;

    function pakets(id_paket) {
        var id = id_paket;

        if (id != '') {
            $.ajax({
                url: "mod/trade/product.php",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(data) {

                    pid = data.produk_id;
                    i = data.invest_total;
                    p = data.profit_persen;
                    d = data.contract_days;
                    l = data.limit_invest;
                    document.getElementById("invest").value = data.invest_total;
                    document.getElementById("profit").value = data.profit_persen;
                    document.getElementById("days").value = `${data.contract_days}`;
                    document.getElementById("invest").setAttribute("min", data.invest_total);
                    document.getElementById("min_inv").value = data.invest_total;
                    document.getElementById("limit_inv").value = data.limit_invest;
                    if (data.limit_invest > 0) {
                        document.getElementById("invest").setAttribute("max", data.limit_invest);
                    }
                }
            })
        } else {


        }
    }

    // function wd invesment
    function cekfeewd() {
        fee = 0;
        wd = document.getElementById("wd").value;
        fee = wd * <?= $feewd ?> / 100;
        amountwd = wd - fee;
        document.getElementById("feewd").value = fee.toFixed(2);
        document.getElementById("amountwd").value = amountwd.toFixed(2);
    }

    function processwd() {
        $.ajax({
            url: "mod/trade/data/withdraw.php",
            method: "POST",
            data: {
                feewd: fee,
                beforefee: wd,
                amountwd: amountwd
            },
            dataType: "JSON",
            beforeSend: function() {
                $("#loader-wd").removeClass('loader-hide')
                $("#wd-process").attr('disabled', true);

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
                } else if (data.status == 'lacking') {
                    Swal.fire({
                        title: "Error",
                        text: "Withdraw Failed, Minimum Withdrawal is 2.5 :(",
                        icon: "error"
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
            $("#loader-wd").addClass('loader-hide');
            $("#wd-process").removeAttr('disabled');
        })
    }


    $(document).ready(function() {
        var table_wd = $('#historywd').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "desc"]
            ],
            "ajax": "mod/trade/data/wd_dt.php"


        });
        // setInterval(function() {
        //     table_wd.ajax.reload();
        // }, 30000);
    });

    // endfunction wd invesment


    function process() {
        var investasi = document.getElementById("invest").value;
        var i = document.getElementById("min_inv").value;
        var limit_inv = document.getElementById("limit_inv").value;
        if (investasi == '') {
            Swal.fire({
                title: "Error",
                text: "Please input Minimum investment or more :(",
                icon: "error"
            })
        } else {
            if (parseInt(investasi) < parseInt(i)) {
                Swal.fire({
                    title: "Error",
                    text: "Minimum " + i + ".",
                    icon: "error"
                })
            } else if (parseInt(limit_inv) > 0) {
                if (parseInt(investasi) > parseInt(limit_inv)) {
                    Swal.fire({
                        title: "Error",
                        text: "Maximum " + limit_inv + ".",
                        icon: "error"
                    })
                } else {
                    $.ajax({
                        url: "mod/trade/invest.php",
                        method: "POST",
                        data: {
                            totinvest: investasi,
                            profits: p,
                            idpaket: pid
                        },
                        dataType: "JSON",
                        beforeSend: function() {
                            $("#loader-trade").removeClass('loader-hide');
                            $('#trade-proccess').attr('disabled', true);
                        },
                        success: function(data) {
                            var res = data.status;
                            if (res == 'Insufficient Balance') {
                                Swal.fire({
                                    title: "Error",
                                    text: "Insufficient Balance :(",
                                    icon: "error"
                                })
                            } else if (res == 'Quota Limited') {
                                Swal.fire({
                                    title: "Error",
                                    text: "Out of limit usage :(",
                                    icon: "error"
                                })
                            } else {

                                Swal.fire({
                                    title: "Success",
                                    text: "Trade Success. Please Wait Until Admin Approve :)",
                                    icon: "success"
                                }).then((res) => {
                                    location.reload();
                                })
                            }
                        }
                    }).done(function() {
                        $("#loader-trade").addClass('loader-hide');
                        $('#trade-proccess').removeAttr('disabled');
                    })
                }
            } else {
                $.ajax({
                    url: "mod/trade/invest.php",
                    method: "POST",
                    data: {
                        totinvest: investasi,
                        profits: p,
                        idpaket: pid
                    },
                    dataType: "JSON",
                    beforeSend: function() {
                        $("#loader-trade").removeClass('loader-hide');
                        $('#trade-proccess').attr('disabled', true);
                    },
                    success: function(data) {
                        var res = data.status;
                        if (res == 'Insufficient Balance') {
                            Swal.fire({
                                title: "Error",
                                text: "Insufficient Balance :(",
                                icon: "error"
                            })
                        } else if (res == 'Quota Limited') {
                            Swal.fire({
                                title: "Error",
                                text: "Out of limit usage :(",
                                icon: "error"
                            })
                        } else {

                            Swal.fire({
                                title: "Success",
                                text: "Trade Success. Please Wait Until Admin Approve :)",
                                icon: "success"
                            }).then((res) => {
                                location.reload();
                            })
                        }
                    },
                }).done(function() {
                    $("#loader-trade").addClass('loader-hide');
                    $('#trade-proccess').removeAttr('disabled');
                })

            }
        }
    }

    function stopinvest(iv) {
        var txt;
        if (confirm("Are you sure for stop this investmetn? Balance will add to your wallet balance")) {
            alert("You pressed OK!");
            $.ajax({
                url: "mod/trade/stopinvest.php",
                method: "POST",
                data: {
                    num: iv
                },
                dataType: "JSON",
                success: function(data) {
                    alert(data.status);
                    location.reload();
                }
            })
        } else {
            alert("You pressed Cancel!");
        }

    }
</script>