<div class="page-content">
    <div class="container-fluid">
        <?php
        echo $_SESSION['info'];
        unset($_SESSION['info']);
        ?>

        <!-- Table Trading -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Trading</h4>

                        <table id="table-trading-user" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>autono</th>
                                    <th>Username</th>
                                    <th>ID Contract</th>
                                    <th>Package ID</th>
                                    <th>Day Left</th>
                                    <th>Invest Status</th>
                                    <th>Date Invest</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <!-- Modal Detail Trading -->
        <div class="modal fade detail" id="trading-detail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Trading</h5>
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
                                            <div class="col-8" id="email">: </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-capitalize">iD contract</div>
                                            <div class="col-8" id="contract">: </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-capitalize">iD packet</div>
                                            <div class="col-8" id="paket">: </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-capitalize">invest</div>
                                            <div class="col-8" id="paket_invest">: </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Reff ID</div>
                                            <div class="col-8" id="reff">: </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Percent Profit</div>
                                            <div class="col-8" id="persen_profit">: </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Update By</div>
                                            <div class="col-8" id="update_by">: </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Date Update</div>
                                            <div class="col-8" id="date_update">: </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-6 row">
                                                <input hidden name="users" id="id_wd">
                                                <input hidden name="id_user" id="id_user">
                                                <label class="col-form-label">Trading Approval:</label>
                                                <div class="col-md-12">
                                                    <select class="form-select" name="status_trade" id="status_trade">
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
                        <button type="button" id="btn-submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.end modal Trading -->
</div>
</div>
<script>
    $(document).ready(function() {
        // datatable
        var table = $('#table-trading-user').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/invest/data/trading_dt.php",
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
        // end datatable
    });

    // view invest
    function clickButton(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "mod/invest/data/trading_json.php",
            data: "id=" + id,
            success: function(res) {
                console.log(res);
                var nama_lengkap = res['user']['nama'];
                var email = res['user']['email_user'];
                var contract = res['trading']['contract_id'];
                var paket = res['trading']['paket_id'];
                var reff = res['trading']['reff_id'];
                var profit = res['trading']['persen_profit'];
                var update_by = res['trading']['update_by'];
                var update_date = res['trading']['date_update'];
                var paket_invest = res['trading']['paket_invest'];
                var autono = res['trading']['autono'];
                var user_id = res['trading']['user_id'];
                var status = res['trading']['invest_status'];

                if (status == 'Active' || status == 'Reject' || status == 'Finish') {
                    $('#btn-submit').attr('disabled', true);
                    $("#status_trade").attr('disabled', true);
                } else {
                    $('#btn-submit').attr('disabled', false);
                    $("#status_trade").attr('disabled', false);
                }

                if (status == 'Active' || status == 'Finish') {
                    status = 1;
                } else if (status == 'Reject') {
                    status = 2;
                }

                if (update_by == null && update_date == null) {
                    update_by = '-';
                    update_date = '-';
                } else {
                    update_by = update_by;
                    update_date = update_date;
                }


                $("#username").text(nama_lengkap);
                $("#email").text(`: ${email}`);
                $("#contract").text(`: ${contract}`);
                $("#paket").text(`: ${paket}`);
                $("#reff").text(`: ${reff}`);
                $("#persen_profit").text(`: ${profit}`);
                $("#update_by").text(`: ${update_by}`);
                $("#date_update").text(`: ${update_date}`);
                $("#paket_invest").text(`: ${paket_invest}`);
                $("#id_wd").val(autono);
                $("#id_user").val(user_id);
                $("#status_trade").val(status);
            }
        })
    }
    // end view invest

    // submit invest
    $("#btn-submit").click(function() {
        var id_trading = $("#id_wd").val();
        var id_user = $("#id_user").val();
        var status = $("#status_trade").val();
        var invest = $("#paket_invest").text();
        if (status == undefined) {
            alert("Select Approval")
        } else {
            var formData = new FormData();
            formData.append('autono', id_trading);
            formData.append('user_id', id_user);
            formData.append('status', status);
            formData.append('invest', invest);

            $.ajax({
                type: "POST",
                url: "mod/invest/data/approve_trading.php",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(res) {
                    var status = JSON.parse(res);
                    if (status['status'] == 'Approve') {
                        Swal.fire({
                            title: "Success",
                            text: "Approve Success :)",
                            icon: "success"
                        }).then((res) => {
                            location.reload();
                        })
                    } else if (status['status'] == 'Reject') {
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
            });
        }
    });
    // end submit invest
</script>

<script>
    setTimeout(() => {
        // let alert = document.querySelector(".alert");
        let alert = $(".alert");
        alert.remove();
    }, 4000);
</script>