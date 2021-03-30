<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Change Password</h4>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Old Password</label>
                        <div class="col-md-10">
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