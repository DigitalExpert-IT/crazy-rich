<div class="page-content">
    <div class="container-fluid">
        <?php
        echo $_SESSION['info'];
        unset($_SESSION['info']);
        ?>

        <!-- Table History Profit -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">History Profit User</h4>

                        <div class="table-responsive">

                            <table id="table-profit-user" class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>autono</th>
                                        <th>Username</th>
                                        <th>profit percent</th>
                                        <th>profit amount</th>
                                        <th>Date</th>
                                        <th>Description</th>
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
    </div>
</div>
<script>
    // datatable
    $(document).ready(function() {
        $('#table-profit-user').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/transaksi/data/hs_profit.php",
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
</script>

<script>
    setTimeout(() => {
        // let alert = document.querySelector(".alert");
        let alert = $(".alert");
        alert.remove();
    }, 4000);
</script>