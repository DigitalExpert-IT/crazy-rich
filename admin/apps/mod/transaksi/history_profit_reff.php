<div class="page-content">
    <div class="container-fluid">
        <?php
        echo $_SESSION['info'];
        unset($_SESSION['info']);
        ?>

        <!-- Table History Profit Reff -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">History Profit Reff</h4>

                        <table id="table-profit-reff" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>autono</th>
                                    <th>Username</th>
                                    <th>Bonus Reff Amount</th>
                                    <th>Date</th>
                                    <th>description</th>
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
        $('#table-profit-reff').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/transaksi/data/hs_profit_reff.php",
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
        // $.fn.DataTable.ext.pager.numbers_length = 5;
    });
</script>

<script>
    setTimeout(() => {
        // let alert = document.querySelector(".alert");
        let alert = $(".alert");
        alert.remove();
    }, 4000);
</script>