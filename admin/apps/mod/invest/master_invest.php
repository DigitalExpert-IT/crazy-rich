<div class="page-content">
    <div class="container-fluid">
        <?php
        echo $_SESSION['info'];
        unset($_SESSION['info']);
        ?>
        <!-- Table Master Invest -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Master Invest</h4>

                        <div class="table-responsive">

                            <table id="table-master-invest" class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>autono</th>
                                        <th>ID Product</th>
                                        <th>Product Name</th>
                                        <th>Total Invest</th>
                                        <th>Profit Daily</th>
                                        <th>Profit Percent</th>
                                        <th>Contract Circle</th>
                                        <th>limit invest</th>
                                        <th>ID Investo</th>
                                        <th>Password Investor</th>
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

        <!-- Modal Daily Profit -->
        <div class="modal fade detail" id="daily-profit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Profit Daily</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <div class="card">
                            <i class="fa fa-percent ml-5 text-center" style="font-size:100px"></i>
                            <div class="card-body">
                                <div class="col-md-12 col-sm-12">
                                    <form>
                                        <div class="form-group">
                                            <input type="hidden" name="autono" id="autono">
                                            <label for="profit" id="profit_lable">Daily Profit</label>
                                            <input type="text" class="form-control" id="profit">
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
    <!-- /.end modal Daily Profit -->



    <!-- Modal Other Setting -->
    <div class="modal fade detail" id="other-settings" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
                    <div class="card">
                        <i class="fa fa-cog ml-5 text-center" style="font-size:100px"></i>
                        <div class="card-body">
                            <div class="col-md-12 col-sm-12">
                                <form>
                                    <input hidden type="text" id="autono_lainnya">

                                    <div class="form-group">
                                        <label for="nama_produk" id="produk_lable">Product Name</label>
                                        <input type="text" class="form-control" id="nama_produk">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_invest" id="id_invest_lable">ID Inverstor</label>
                                        <input type="text" class="form-control" id="id_invest">
                                    </div>
                                    <div class="form-group">
                                        <label for="pass_invest" id="pass_lable">Password Investor</label>
                                        <input type="text" class="form-control" id="pass_invest">
                                    </div>
                                    <div class="form-group">
                                        <label for="total" id="total_lable">Total Invest</label>
                                        <input type="text" class="form-control" id="total">
                                    </div>
                                    <div class="form-group">
                                        <label for="limit" id="limit_lable">Contract Circle</label>
                                        <input type="text" class="form-control" id="limit">
                                    </div>
                                    <div class="form-group">
                                        <label for="persen_profit" id="persen_lable">Profit Percent</label>
                                        <input type="text" class="form-control" id="persen_profit">
                                    </div>
                            </div>

                            <!-- approval -->

                            <!-- end -->
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-submit-settings" class="btn btn-primary waves-effect waves-light">Submit</button>
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.end modal Setting -->


</div>
</div>
<script>
    $(document).ready(function() {
        // datatable
        $('#table-master-invest').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/invest/data/master_invest_dt.php",
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

    // function view daily profit
    function clickButton(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "mod/invest/data/master_invest_json.php",
            data: "id=" + id,
            success: function(res) {
                var dataHandler = $("#modal-body");

                console.log(res);

                var autono = res['trading']['autono'];
                var profit_harini = res['trading']['package_profit'];

                $("#autono").val(autono);
                $("#profit").val(profit_harini);
            }
        });
    };
    // end function view daily profit

    // function submit change daily profit
    $("#btn-submit").click(function() {
        var autono = $("#autono").val();
        var package_profit = $("#profit").val();
        var formdData_profit = new FormData();
        formdData_profit.append('autono', autono);
        formdData_profit.append('profit', package_profit);

        $.ajax({
            type: "POST",
            url: "mod/invest/data/profit_harini.php",
            data: formdData_profit,
            cache: false,
            processData: false,
            contentType: false,
            success: function(status) {
                var res = JSON.parse(status);
                if (res['status'] == 'Success') {
                    Swal.fire({
                        title: "Success",
                        text: "Daily Profit Updated :)",
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
    });
    // function submit change daily profit

    // function other settings view
    function editButton(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "mod/invest/data/master_invest_json.php",
            data: "id=" + id,
            success: function(res) {
                // console.log(res);

                var nama_produk = res['trading']['nama_produk'];
                var id_invest = res['trading']['id_investor'];
                var password_invest = res['trading']['password_investor'];
                var total = res['trading']['invest_total'];
                var limit = res['trading']['contract_circle'];
                var profit_persen = res['trading']['profit_persen'];
                var autono = res['trading']['autono'];

                $("#nama_produk").val(nama_produk);
                $("#id_invest").val(id_invest);
                $("#pass_invest").val(password_invest);
                $("#total").val(total);
                $("#limit").val(limit);
                $("#persen_profit").val(profit_persen);
                $("#autono_lainnya").val(autono);
            }
        });
    };
    // end function other settings view

    // function submit other settings
    $('#btn-submit-settings').click(function() {
        var nama_produk = $("#nama_produk").val();
        var id_invest = $("#id_invest").val();
        var pass_invest = $("#pass_invest").val();
        var total = $("#total").val();
        var limit = $("#limit").val();
        var persen_profit = $("#persen_profit").val();
        var autono = $("#autono_lainnya").val();

        var formDataLainnya = new FormData();
        formDataLainnya.append("nama_produk", nama_produk);
        formDataLainnya.append("id_invest", id_invest);
        formDataLainnya.append("pass_invest", pass_invest);
        formDataLainnya.append("total", total);
        formDataLainnya.append("limit", limit);
        formDataLainnya.append("persen_profit", persen_profit);
        formDataLainnya.append("autono", autono);

        $.ajax({
            type: "POST",
            url: "mod/invest/data/edit_master_invest_lainnya.php",
            data: formDataLainnya,
            cache: false,
            processData: false,
            contentType: false,
            success: function(status) {
                var res = JSON.parse(status);
                if (res['status'] == 'Success') {
                    Swal.fire({
                        title: "Success",
                        text: "Invest Package Updated :)",
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
    });
    // end function submit other settings
</script>

<script>
    setTimeout(() => {
        // let alert = document.querySelector(".alert");
        let alert = $(".alert");
        alert.remove();
    }, 4000);
</script>