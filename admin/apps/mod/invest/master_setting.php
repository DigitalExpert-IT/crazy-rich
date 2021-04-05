<div class="page-content">
    <div class="container-fluid">
        <?php
        echo $_SESSION['info'];
        unset($_SESSION['info']);
        ?>
        <!-- Table Master Setting -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Master Setting</h4>

                        <div class="table-responsive">
                            <button type="button" id="addSetting" data-bs-toggle="modal" data-bs-target=".add" class="btn btn-primary waves-effect waves-light">Add New Setting</button>
                            <table id="table-master-setting" class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>autono</th>
                                        <th>Setting Name</th>
                                        <th>value</th>
                                        <th>Description</th>
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

        <!-- Modal Master Setting -->
        <div class="modal fade detail" id="modal-master-setting" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                        <input hidden type="text" id="autono">


                                        <div class="form-group">
                                            <label for="nama" id="nama_lable">Setting name</label>
                                            <input readonly type="text" class="form-control" id="nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="value" id="value_lable">Value</label>
                                            <input type="text" class="form-control" id="value">

                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan" id="keterangan_lable">Description</label>
                                            <input type="text" class="form-control" id="keterangan">
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-6 row">
                                                <label class="col-form-label">Value Type:</label>
                                                <div class="col-md-12">
                                                    <select class="form-select" name="type" id="value-type">
                                                        <option value="1">Percent</option>
                                                        <option value="0">Fixed</option>
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


        <!-- Modal Master Setting -->
        <div class="modal fade add" id="add-modal-master-setting" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Master Settings</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <div class="card">
                            <i class="fa fa-cog ml-5 text-center" style="font-size:100px"></i>
                            <div class="card-body">
                                <div class="col-md-12 col-sm-12">
                                    <form>
                                        <input hidden type="text" id="autono">


                                        <div class="form-group">
                                            <label for="nama" id="nama_lable">Setting name</label>
                                            <input readonly type="text" class="form-control" id="add_nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="value" id="value_lable">Value</label>
                                            <input type="text" class="form-control" id="add_value">

                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan" id="keterangan_lable">Description</label>
                                            <input type="text" class="form-control" id="add_keterangan">
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-6 row">
                                                <label class="col-form-label">Value Type:</label>
                                                <div class="col-md-12">
                                                    <select class="form-select" name="type" id="add_value_type">
                                                        <option value="1">Percent</option>
                                                        <option value="0">Fixed</option>
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
                        <button type="button" id="btn-save" class="btn btn-primary waves-effect waves-light">Submit</button>
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
        $('#table-master-setting').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/invest/data/master_seting_dt.php",
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

    // function view
    function clickButton(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'mod/invest/data/setting_invest_json.php',
            data: "id=" + id,
            success: function(res) {
                // console.log(res);

                var nama = res['setting']['nama_seting'];
                var value = res['setting']['value'];
                var keterangan = res['setting']['keterangan_seting'];
                var autono = res['setting']['autono'];
                var type = res['setting']['type'];

                $("#nama").val(nama);
                $("#value").val(value);
                $("#keterangan").val(keterangan);
                $("#autono").val(autono);
                $('#value-type').val(type);
            }
        });
    }
    // end function view

    // function submit change
    $("#btn-submit").click(function() {
        var autono = $("#autono").val();
        var value = $("#value").val();
        var keterangan = $("#keterangan").val();
        var nama = $("#nama").val();
        var type = $("#value-type").val();
        var formData = new FormData();
        formData.append("autono", autono);
        formData.append("value", value);
        formData.append("keterangan", keterangan);
        formData.append("nama", nama);
        formData.append('type', type);

        $.ajax({
            type: "POST",
            url: "mod/invest/data/ubah_master_setting.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(status) {
                var res = JSON.parse(status);
                if (res['status'] == 'Success') {
                    Swal.fire({
                        title: "Success",
                        text: "Master Setting Updated :)",
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
        })
    })
    // function submit change

    $("#btn-save").click(() => {
        var name = $("#add_nama").val();
        var value = $("#add_value").val();
        var desc = $("#add_keterangan").val();
        var type = $("#add_value_type").val();
        var formData = new FormData();
        formData.append('add_name', name);
        formData.append('add_value', value);
        formData.append('add_desc', desc);
        formData.append('add_type', type);

        $.ajax({
            type: "POST",
            url: "mod/invest/data/add-master-setting.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(status) {
                var res = JSON.parse(status);
                if (res['status'] == 'Success') {
                    Swal.fire({
                        title: "Success",
                        text: "Master Setting Added :)",
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
        })
    })
</script>

<script>
    setTimeout(() => {
        // let alert = document.querySelector(".alert");
        let alert = $(".alert");
        alert.remove();
    }, 4000);
</script>