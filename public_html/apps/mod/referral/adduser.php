<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add New Member</h4>
                        <form id="add-member-form" method="post" enctype="multipart/form-data">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Referral ID</label>
                                <div class="col-md-10">
                                    <input hidden type="text" readonly value="<?= $_SESSION['user_id'] ?>" name="upline" class="form-control" id="up">
                                    <input class="form-control" type="text" readonly value="<?= $_SESSION['reffcode'] ?>" name="upline" id="referral">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-search-input" class="col-md-2 col-form-label">Full Name</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" placeholder="Ex: Jhon Doe" id="nama" name="nama">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="email" placeholder="bootstrap@example.com" id="email" name="email">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-url-input" class="col-md-2 col-form-label">Password</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="password" id="password1" name="password1">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-tel-input" class="col-md-2 col-form-label">Re-Password</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="password" id="password2" name="password2">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="form-group">
                                    <label class="col-md-2">Terms and Conditions:</label>
                                    <div style=" height:199px; margin:10px 0; padding:10px; border:1px solid #CCCCCC; overflow: auto;">
                                        <h4 style="text-align: center;"><strong><u>TERMS AND CONDITIONS</u></strong></h4>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <label>
                                        <input type="checkbox" required name="terms">
                                        I agree terms and conditions </label>
                                </div>
                            </div>

                            <div class="button-items">
                                <button id="register" type="submit" class="float-right btn btn-primary w-xs waves-effect waves-light">Register</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#add-member-form").on('submit', (e) => {
            e.preventDefault();
            var formData = {
                nama: $("#nama").val(),
                email: $("#email").val(),
                password1: $("#password1").val(),
                password2: $("#password2").val(),
            };

            $.ajax({
                type: 'POST',
                url: 'mod/referral/qadduser.php',
                data: formData,
                dataType: 'json',
                encode: true,
            }).done((data) => {
                var response = data.response;

                if (response == 'failed') {
                    Swal.fire({
                        title: "Error",
                        text: "Re-Password Does Not Match :(",
                        icon: "error"
                    })
                } else if (response == 'error') {
                    Swal.fire({
                        title: "Error",
                        text: "Oppss, There's Something Wrong. Please Try Again :(",
                        icon: "error"
                    })
                } else if (response == 'exists') {
                    Swal.fire({
                        title: "Error",
                        text: "Oppss, This Email Already Taken. Please Try Another Email :(",
                        icon: "error"
                    })
                } else {
                    Swal.fire({
                        title: "Success",
                        text: "Member Succesfully Added :)",
                        icon: "success"
                    }).then((res) => {
                        window.location = '?mod=referral&cmd=index';
                    })
                }
            })
        })
    })
</script>