<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Change Password</h4>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Old Password</label>
                        <div class="col-md-10">
                            <input hidden type="text" readonly value="<?= $_SESSION['user_id'] ?>" name="upline" class="form-control" id="up">
                            <input class="form-control" type="password" disabled id="oldpass" placeholder="old Password">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">New Password</label>
                        <div class="col-md-10">
                            <input class="form-control" type="password" id="newpass" placeholder="New Password" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-email-input" class="col-md-2 col-form-label">Re-Type Password</label>
                        <div class="col-md-10">
                            <input class="form-control" type="password" placeholder="Re-Type New Password" id="newpass2" placeholder="Re-Password" disabled>
                        </div>
                    </div>

                    <div class="button-items">
                        <button type="button" class="float-right btn btn-primary w-xs waves-effect waves-light" onClick="savepass()">Save</button>
                        <button type="button" class="float-right btn btn-warning w-xs waves-effect waves-light" onClick="editpass()">Edit</button>
                    </div>

                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
<script>
    function editpass() {
        document.getElementById("oldpass").disabled = false;
        document.getElementById("newpass").disabled = false;
        document.getElementById("newpass2").disabled = false;
    }


    function savepass() {

        var o = document.getElementById("oldpass").value;
        var n1 = document.getElementById("newpass").value;
        var n2 = document.getElementById("newpass2").value;


        $.ajax({
            url: "mod/profile/savepass.php",
            method: "POST",
            data: {
                oldpass: o,
                newpas1: n1,
                newpas2: n2
            },
            dataType: "JSON",
            success: function(data) {
                if (data.status == 'success') {

                    document.getElementById("oldpass").disabled = true;
                    document.getElementById("newpass").disabled = true;
                    document.getElementById("newpass2").disabled = true;

                    Swal.fire({
                        title: "Success",
                        text: "Password Succesfully Update :)",
                        icon: "success"
                    }).then((res) => {
                        location.reload();
                    })

                } else {
                    Swal.fire({
                        title: "Error",
                        text: "There's something wrong. Please Check Your Input :(",
                        icon: "error"
                    })
                }

            }
        })


    }
</script>