<div class="page-content">
    <div class="container-fluid">
        <?php include('template/component/referral-card.php') ?>
        <!-- Table Referral -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
                            <h4 class="card-title">My Referral</h4>

                            <a href="?mod=referral&amp;cmd=adduser">
                                <button class="btn btn-md btn-warning float-right"><i class="fa  fa-sitemap"></i> Add New User</button>
                            </a>
                        </div>
                        <table id="myreff" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Join Date</th>
                                    <th>Referral Code</th>
                                </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>
<script>
    $(document).ready(function() {
        var table = $('#myreff').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/referral/myreff.php",
            "columnDefs": [{
                "targets": [0],
                "visible": false
            }, ],

        });
    });
</script>