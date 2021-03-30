<div class="page-content">
    <div class="container-fluid">
        <?php
        if (isset($_SESSION['info'])) {
            echo $_SESSION['info'];
            unset($_SESSION['info']);
        }
        ?>
        <!-- Table Referral -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="table-anggota" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <!-- <th>User id</th> -->
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Balance</th>
                                    <th>Status</th>
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
        <!-- Modal Detail -->
        <div class="modal fade detail" id="detail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <div class="card">
                            <div class="col-sm-8 col-lg-12">
                                <div class="card">
                                    <i class="fa fa-user ml-5 text-center" style="font-size:170px"></i>
                                    <div class="card-body">
                                        <h5 class="card-title text-center" id="username"></h5>
                                        <hr class="solid-divider">
                                        <div class="col-md-8 col-sm-12">
                                            <div class="row ml-1">
                                                <h3 class="display-5" id="username"></h3>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">Email</div>
                                                <div class="col-8" id="email">: </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">Join Date</div>
                                                <div class="col-8" id="tglJoin-user">: </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">Balance</div>
                                                <div class="col-8" id="saldo">: </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">Status Member</div>
                                                <div class="col-8" id="member">: </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">Verify Code</div>
                                                <div class="col-8" id="verify_code">: </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.end modal Detail -->

    <!-- Modal Edit -->
    <div class="modal fade detail" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
                    <div class="card">
                        <div class="col-sm-8 col-lg-12">
                            <div class="card">
                                <i class="fa fa-user ml-5 text-center" style="font-size:170px"></i>
                                <div class="card-body">
                                    <h5 class="card-title text-center" id="username"></h5>
                                    <hr class="solid-divider">
                                    <div class="col-md-8 col-sm-12">
                                        <form action="">
                                            <input hidden id="user_id" name="user_id" class="form-control">
                                            <div class="form-group">
                                                <label for="namaLengkap" class="col-form-label">Full Name:</label>
                                                <input type="text" class="form-control" id="namaLengkap" name="nama_lengkap">
                                            </div>
                                            <div class="form-group">
                                                <label for="emailUser" class="col-form-label">Email:</label>
                                                <input type="email" class="form-control" id="emailUser" name="email">
                                            </div>
                                            <div class="form-group">
                                                <div class="mb-6 row">
                                                    <label class="col-form-label">Status Member:</label>
                                                    <div class="col-md-12">
                                                        <select class="form-select" name="member" id="memberEdit">
                                                            <option value="1">Active</option>
                                                            <option value="0">Deactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="changeButton" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.end modal Edit -->
</div>
</div>
<!-- script datatable user -->
<script>
    $(document).ready(function() {
        $('#table-anggota').DataTable({
            "processing": false,
            "serverSide": true,
            "ajax": "mod/user/data/user.php",
        });
        $.fn.DataTable.ext.pager.numbers_length = 5;
    });
</script>
<!-- end script datatable user -->

<script>
    // function view user
    function clickButton(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "mod/user/detail_user.php",
            data: "id=" + id,
            success: function(res) {
                var dataHandler = $("#modal-body");

                // console.log(res);

                var nama_lengkap = res['user']['nama'];
                var email = res['user']['email_user'];
                var tglJoin = res['user']['date_join'];
                var saldo = res['user']['saldo_aktif'];
                var member = res['user']['status'];
                if (member == 1) {
                    member = 'Active';
                } else {
                    member = 'Deactive';
                }
                var verify_code = res['user']['verify_code'];

                $("#username").text(nama_lengkap);
                $("#email").text(`: ${email}`);
                $("#tglJoin-user").text(`: ${tglJoin}`);
                $("#saldo").text(`: ${saldo}`);
                $("#member").text(`: ${member}`);
                $("#verify_code").text(`: ${verify_code}`);

            }
        });
    }
    // end function view user

    // function view edit user
    function editButton(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "mod/user/detail_user.php",
            data: "id=" + id,
            success: function(res) {
                var dataHandler = $("#editModal");


                var namaLengkap = res['user']['nama'];
                var emailUsers = res['user']['email_user'];
                var users = res['user']['status'];
                var id = res['user']['user_id'];

                document.getElementById('namaLengkap').value = namaLengkap;
                document.getElementById('emailUser').value = emailUsers;
                document.getElementById('memberEdit').value = users;
                document.getElementById('user_id').value = id;
            }
        });
    }
    // end function view edit user

    // function save change user
    $('#changeButton').click(function() {
        var id_userEdit = $('#user_id').val();
        var nama = $('#namaLengkap').val();
        var member = $('#memberEdit').val();
        var email = $('#emailUser').val();
        console.log(id_userEdit);
        var formData = new FormData();
        formData.append('id', id_userEdit);
        formData.append('nama', nama);
        formData.append('member', member);
        formData.append('email', email);
        $.ajax({
            type: "POST",
            url: "mod/user/edit_user.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function() {
                Swal.fire({
                    title: "Success",
                    text: 'Change Data Success',
                    icon: "success"
                }).then((res) => {
                    location.reload();
                })
            }
        })
    })
    // end function save change user
</script>