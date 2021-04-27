<style>
    .text-sm {
        font-size: x-small;
    }

    span.a {
        display: inline;
    }
</style>
<div class="page-content">
    <?php
    echo $_SESSION['info'];
    unset($_SESSION['info']);
    ?>
    <div class="container-fluid">
        <!-- Table Depo WD -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Deposit Table</h4>
                        <div class="table-responsive">
                            <table id="table-deposit" class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>autono</th>
                                        <th>Username</th>
                                        <th>ID Order</th>
                                        <th>Fee Deposit</th>
                                        <th>Deposit BIDR</th>
                                        <th>Deposit IDR</th>
                                        <th>Total Deposit</th>
                                        <th>Status</th>
                                        <th>Action</th>
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

        <!-- Modal Detail Deposit -->
        <div class="modal fade detail" id="deposit-detail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Deposit Detail User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <div class="card">
                            <i class="fa fa-user ml-5 text-center" style="font-size:170px"></i>
                            <div class="card-body">
                                <h5 class="card-title text-center" id="username_depo"></h5>
                                <hr class="solid-divider">
                                <div class="col-md-12 col-sm-12">
                                    <form>
                                        <div class="row text-sm">
                                            <div class="col-4">Email</div>
                                            <div class="col-6" id="email"> </div>
                                        </div>
                                        <div class="row text-sm">
                                            <div class="col-4">Order ID</div>
                                            <div class="col-6" id="order_id"> </div>
                                        </div>
                                        <div class="row text-sm">
                                            <div class="col-4">TXID</div>
                                            <div class="col-6" id="voucher_idx"></div>
                                        </div>
                                        <div class="row text-sm">
                                            <div class="col-4">Deposit Date</div>
                                            <div class="col-6" id="tgl_pembuatan"> </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-6 row">
                                                <input hidden name="users" id="id_deposit">
                                                <input hidden name="balance" id="balance">
                                                <input hidden name="id_user" id="id_user">
                                                <label class="col-form-label">Deposit Approval:</label>
                                                <div class="col-md-12">
                                                    <select class="form-select" name="status_deposit" id="status_deposit">
                                                        <option value="none" selected disabled hidden>Status Confirmation</option>
                                                        <option value="2">Reject</option>
                                                        <option value="1">Accept</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <!-- approval -->

                                <!-- end -->
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn-submit-depo" class="btn btn-primary waves-effect waves-light">
                            <span class="loader-hide" id="loader-depo-change"><img src="../minible/images/loader.gif" width="30" alt="" aria-hidden=""> </span>
                            Submit
                        </button>
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.end modal Deposit -->

    <!-- Table WD -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Withdraw Table</h4>

                    <div class="table-responsive">
                        <table id="table-wd" class="table table-centered table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>autono</th>
                                    <th>Username</th>
                                    <th>ID Withdraw</th>
                                    <th>Fee eithdraw</th>
                                    <th>Withdraw Before fee</th>
                                    <th>Total Withdraw</th>
                                    <th>Total BIDR</th>
                                    <th>Status</th>
                                    <th>Action</th>
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

    <!-- Modal Detail WD -->
    <div class="modal fade detail" id="wd-detail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deposit Withdraw User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
                    <div class="card">
                        <i class="fa fa-user ml-5 text-center" style="font-size:170px"></i>
                        <div class="card-body">
                            <h5 class="card-title text-center" id="username"></h5>
                            <hr class="solid-divider">
                            <div class="col-md-12 col-sm-12">
                                <form>
                                    <div class="row">
                                        <div class="col-4">Email</div>
                                        <div class="col-8" id="email-wd">: </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">ID Withdraw</div>
                                        <div class="col-8" id="wd_id">: </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Withdraw Before Fee</div>
                                        <div class="col-8" id="wd_beforefee">: </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Fee Withdraw</div>
                                        <div class="col-8" id="fee_wd">: </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Total Withdraw</div>
                                        <div class="col-8" id="total_wd">: </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Total BIDR</div>
                                        <div class="col-8" id="total_idr">: </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">txid</div>
                                        <div class="col-8" id="txid_view">: </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Approve By</div>
                                        <div class="col-8" id="approve_by">: </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Approve Date</div>
                                        <div class="col-8" id="approve_date">: </div>
                                    </div>
                                    <hr class="solid-divider">

                                    <div class="form-group">
                                        <label for="txid_wd" id="address_lable">Address</label>
                                        <input type="text" name="address" id="address" readonly class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="txid_wd" id="txid_lable">txid withdraw</label>
                                        <input type="text" name="txid_wd" id="txid_wd" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-6 row">
                                            <input hidden name="users" id="id_wd">
                                            <input hidden name="id_user" id="id_user_wd">
                                            <label class="col-form-label">Withdraw Approval:</label>
                                            <div class="col-md-12">
                                                <select class="form-select" name="status_wd" id="status_wd" required>
                                                    <option value="none" selected disabled hidden>Status Confirmation</option>
                                                    <option value="2">Reject</option>
                                                    <option value="1">Accept</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <!-- approval -->

                            <!-- end -->
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-submit" class="btn btn-primary waves-effect waves-light">
                        <span class="loader-hide" id="loader-wd-change"><img src="../minible/images/loader.gif" width="30" alt="" aria-hidden=""> </span>
                        Submit
                    </button>
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.end modal WD -->
</div>
</div>

<!-- script depo -->
<script>
    // function datatable depo
    $(document).ready(function() {
        var table = $('#table-deposit').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/transaksi/data/deposit_dt.php",
            "pagingType": "simple_numbers",
            "leftColumns": 1,
            "rightColumns": 1,
            "columnDefs": [{
                "targets": [0],
                "visible": false
            }, ],
            "order": [
                [0, "desc"]
            ]
        });
        $.fn.DataTable.ext.pager.numbers_length = 5;
        // end function datatable depo

        //function get value select 
        $(document).on("change", "select", function() {
            $("option[value=" + this.value + "]", this)
                .attr("selected", true).siblings()
                .removeAttr("selected")
        });
        //end function get value select 

        //function submit depo
        $('#btn-submit-depo').click(function() {
            var value_option = $('#status_deposit').find(':selected').val();
            var id_deposit = $('#id_deposit').val();
            var balance_user = $('#balance').val();
            var user = $('#id_user').val();
            if (value_option == 'none') {
                alert('Select Approval');
            } else {
                var formData = new FormData();
                formData.append('id_deposit', id_deposit);
                formData.append('value', value_option);
                formData.append('balance', balance_user);
                formData.append('id_user', user);

                $.ajax({
                    type: "POST",
                    url: "mod/transaksi/data/approval_deposit.php",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $("#loader-depo-change").removeClass('loader-hide');
                        $("#btn-submit-depo").attr('disabled', true);
                    },
                    success: function(data) {
                        var res = JSON.parse(data)
                        if (res['status'] == 'OK' && res['data'] == 'Approve') {
                            Swal.fire({
                                title: "Success",
                                text: "Approve Success :)",
                                icon: "success"
                            }).then((res) => {
                                location.reload();
                            })
                        } else if (res['status'] == 'OK' && res['data'] == 'Reject') {
                            Swal.fire({
                                title: "Success",
                                text: "Reject Success :)",
                                icon: "success"
                            }).then((res) => {
                                location.reload();
                            })
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "There's Something Wrong. Please Try Again :(",
                                icon: "error"
                            })
                        }
                    }
                }).done(function() {
                    $("#loader-depo-change").addClass('loader-hide');
                    $("#btn-submit-depo").removeAttr('disabled');
                })
            };
        });
        //function submit depo

    });

    // function view depo
    function depoButton(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "mod/transaksi/data/detail_deposit.php",
            data: "id=" + id,
            success: function(res) {
                var dataHandler = $("#modal-body-depo");

                console.log(res);

                var nama_lengkap = res['user']['nama'];
                var email = res['user']['email_user'];
                var tglBuat = res['deposit']['date_create'];
                var keterangan = res['deposit']['keterangan'];
                if (keterangan == '' || keterangan == null) {
                    keterangan = '-';
                } else {
                    keterangan = keterangan;
                }
                var order = res['deposit']['order_id'];
                var voucher = res['deposit']['vocer_idx'];
                var user_id = res['deposit']['autono'];
                var balance = res['deposit']['total_deposit_usd'];
                var user = res['deposit']['user_id'];
                var status = res['deposit']['status'];

                if (status == 'Success' || status == 'Reject') {
                    $('#btn-submit-depo').attr('disabled', true);
                    $("#status_deposit").html('<option>' + status + '</option>').attr('disabled', true);
                } else {
                    $('#btn-submit-depo').attr('disabled', false);
                    $("#status_deposit").attr('disabled', false);
                }

                $("#username_depo").text(nama_lengkap);
                $("#email").text(`: ${email}`);
                $("#tgl_pembuatan").text(`: ${tglBuat}`);
                $("#order_id").text(`: ${order}`);
                $("#voucher_idx").html(`<span>: ${voucher}</span>`);
                $("#keterangan").text(`: ${keterangan}`);
                $("#id_deposit").val(user_id);
                $("#balance ").val(balance);
                $("#id_user ").val(user);
            }
        });
    };
    // end function view depo
</script>
<!-- end script depo -->

<!-- script wd -->
<script>
    // function datatable wd
    $(document).ready(function() {
        var table_wd = $('#table-wd').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/transaksi/data/wd_dt.php",
            "pagingType": "simple_numbers",
            "leftColumns": 1,
            "rightColumns": 1,
            "columnDefs": [{
                "targets": [0],
                "visible": false
            }, ],
            "order": [
                [0, "desc"]
            ]
        });
        $.fn.DataTable.ext.pager.numbers_length = 5;
        // end function datatable wd

        // function get value select
        $(document).on("change", "select", function() {
            $("option[value=" + this.value + "]", this)
                .attr("selected", true).siblings()
                .removeAttr("selected")
        });
        // end function get value select

        // function submit wd
        $('#btn-submit').click(function() {
            var value_option_wd = $('#status_wd').find(':selected').val();
            var id_wd = $('#id_wd').val();
            var user = $('#id_user_wd').val();
            var withdraw = $('#wd_beforefee').text();
            var txid_wd = $('#txid_wd').val();
            if (value_option_wd == undefined) {
                alert("Select Approval");
            } else if (value_option_wd == 1 && txid_wd == '') {
                alert('Fill the txid Field !');
            } else {
                var formData = new FormData();
                formData.append('value', value_option_wd);
                formData.append('id_wd', id_wd);
                formData.append('id_user', user);
                formData.append('withdraw', withdraw);
                formData.append('txid_wd', txid_wd);

                $.ajax({
                    type: "POST",
                    url: "mod/transaksi/data/approval_withdraw.php",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $("#loader-wd-change").removeClass('loader-hide');
                        $("#btn-submit").attr('disabled', true);
                    },
                    success: function(data) {
                        var data = JSON.parse(data);
                        if (data['status'] == 'OK' && data['data']['status'] == 'Approve') {
                            Swal.fire({
                                title: "Success",
                                text: "Approve Success :)",
                                icon: "success"
                            }).then((res) => {
                                location.reload();
                            })
                        } else if (data['status'] == 'OK' && data['data']['status'] == 'Reject') {
                            Swal.fire({
                                title: "Success",
                                text: "Reject Success :)",
                                icon: "success"
                            }).then((res) => {
                                location.reload();
                            })
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "There's Something Wrong. Please Try Again :(",
                                icon: "error"
                            })
                        }
                    }
                }).done(function() {
                    $("#loader-wd-change").addClass('loader-hide');
                    $("#btn-submit").removeAttr('disabled')
                })
            }
        });
        // end function submit wd

    });

    // function view wd
    function clickButton(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "mod/transaksi/data/detail_withdraw.php",
            data: "id=" + id,
            success: function(res) {
                var dataHandler = $("#modal-body");

                console.log(res);

                var nama_lengkap = res['user']['nama'];
                var email = res['user']['email_user'];
                var wd_id = res['withdraw']['wd_id'];
                var wd_beforefee = res['withdraw']['wd_beforefee'];
                var fee_wd = res['withdraw']['fee_wd'];
                var total_wd = res['withdraw']['total_wd'];
                var total_idr = res['withdraw']['total_idr'];
                var approve_by = res['withdraw']['approve_by'];
                var approve_date = res['withdraw']['approve_date'];
                var id_wd = res['withdraw']['autono'];
                var id_user = res['withdraw']['user_id'];
                var txid = res['withdraw']['txid'];
                var value = res['withdraw']['status_wd'];
                var address = res['withdraw']['address'];
                if (value == 'Success') {
                    value = 1;
                } else if (value == 'Reject') {
                    value = 2;
                }

                if (approve_by == null) {
                    approve_by = '-';
                } else {
                    approve_by = approve_by;
                }

                if (approve_date == null) {
                    approve_date = '-';
                } else {
                    approve_date = approve_date;
                }

                if (txid == null) {
                    txid = "-";
                } else {
                    txid = txid;
                }



                $("#username").text(nama_lengkap);
                $("#email-wd").text(`: ${email}`);
                $("#wd_id").text(`: ${wd_id}`);
                $("#wd_beforefee").text(`: ${wd_beforefee}`);
                $("#fee_wd").text(`: ${fee_wd}`);
                $("#total_wd").text(`: ${total_wd}`);
                $("#total_idr").text(`: ${total_idr}`);
                $("#approve_by").text(`: ${approve_by}`);
                $("#approve_date").text(`: ${approve_date}`);
                $("#txid_view").text(`: ${txid}`);
                $("#id_wd").val(id_wd);
                $("#id_user_wd ").val(id_user);
                $("#status_wd").val(value);
                $("#address").val(address);

                if (value == 1 || value == 2) {
                    $('#btn-submit').attr('disabled', true);
                    $("#status_wd").attr('disabled', true);
                    $("#txid_lable").attr('hidden', true);
                    $("#txid_wd").attr('hidden', true);
                } else {
                    $('#btn-submit').attr('disabled', false);
                    $("#status_wd").attr('disabled', false);
                    $("#txid_lable").attr('hidden', false);
                    $("#txid_wd").attr('hidden', false);
                }

            }
        });
    };
    // end function view wd
</script>
<!-- end script wd -->

<script>
    setTimeout(() => {
        // let alert = document.querySelector(".alert");
        let alert = $(".alert");
        alert.remove();
    }, 4000);
</script>