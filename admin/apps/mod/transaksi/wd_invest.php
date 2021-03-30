<div class="page-content">
    <div class="container-fluid">
        <?php
        echo $_SESSION['info'];
        unset($_SESSION['info']);
        ?>

        <!-- Table Wd Invest -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Withdraw Invest Table</h4>

                        <table id="table-wd-invest" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>autono</th>
                                    <th>Username</th>
                                    <th>ID Withdraw Invest</th>
                                    <th>Fee Withdraw</th>
                                    <th>Withdraw Before Fee</th>
                                    <th>Total Withdraw</th>
                                    <th>Status Withdraw</th>
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

        <!-- Modal Detail Deposit -->
        <div class="modal fade detail" id="wd-invest-detail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Withdraw Invest User</h5>
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
                                            <div class="col-4">ID Withdraw Invest</div>
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
                                            <div class="col-4">Approve By</div>
                                            <div class="col-8" id="approve_by">: </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Approve Date</div>
                                            <div class="col-8" id="approve_date">: </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-6 row">
                                                <input hidden name="users" id="id_wd">
                                                <input hidden name="id_user" id="id_user">
                                                <label class="col-form-label">Withdraw Invest Approval:</label>
                                                <div class="col-md-12">
                                                    <select class="form-select" name="status_wd" id="status_wd">
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
    <!-- /.end modal Deposit -->

</div>
</div>
<script>
    $(document).ready(function() {
        var table = $('#table-wd-invest').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/transaksi/data/wd_invest_dt.php",
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

        $(document).on("change", "select", function() {
            $("option[value=" + this.value + "]", this)
                .attr("selected", true).siblings()
                .removeAttr("selected")
        });

        $('#btn-submit').click(function() {
            var value_option = $('#status_wd').find(':selected').val();
            var id_wd = $('#id_wd').val();
            var user = $('#id_user').val();
            var withdraw = $('#wd_beforefee').text();
            var total_wd = $('#total_wd').text();
            if (value_option == undefined) {
                alert('Select Approval');
            } else {
                var formData = new FormData();
                formData.append('value', value_option);
                formData.append('id_wd', id_wd);
                formData.append('id_user', user);
                formData.append('withdraw', withdraw);
                formData.append('total_wd', total_wd);

                $.ajax({
                    type: "POST",
                    url: "mod/transaksi/data/approval_withdraw_invest.php",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
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
                });
            }
        });
    });

    function clickButton(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "mod/transaksi/data/detail_withdraw_invest.php",
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
                var approve_by = res['withdraw']['approve_by'];
                var approve_date = res['withdraw']['approve_date'];
                var id_wd = res['withdraw']['autono'];
                var id_user = res['withdraw']['user_id'];
                var value = res['withdraw']['status_wd'];
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



                $("#username").text(nama_lengkap);
                $("#email").text(`: ${email}`);
                $("#wd_id").text(`: ${wd_id}`);
                $("#wd_beforefee").text(`: ${wd_beforefee}`);
                $("#fee_wd").text(`: ${fee_wd}`);
                $("#total_wd").text(`: ${total_wd}`);
                $("#approve_by").text(`: ${approve_by}`);
                $("#approve_date").text(`: ${approve_date}`);
                $("#id_wd").val(id_wd);
                $("#id_user ").val(id_user);
                $("#status_wd").val(value);

                if (value == 1 || value == 2) {
                    $('#btn-submit').attr('disabled', true);
                    $("#status_wd").attr('disabled', true);
                } else {
                    $('#btn-submit').attr('disabled', false);
                    $("#status_wd").attr('disabled', false);
                }

            }
        });
    };
</script>