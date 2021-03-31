<div class="page-content">
    <div class="container-fluid">
        <?php include('template/component/referral-card.php') ?>
        <?php
        $profit_query = "SELECT SUM(profit_percen) as total_profit FROM history_profit WHERE date(tanggal) >= date(now()-interval 30 day) AND user_id=$_SESSION[user_id]";
        $profit_exec = mysqli_query($con, $profit_query);
        $profit_res = mysqli_fetch_assoc($profit_exec);
        $profit_res = $profit_res['total_profit'];
        $total = ceil($profit_res * 100) / 100;

        ?>
        <div class="row">
            <!-- Simple card -->
            <div class="card">
                <div class="card-body">
                    <div class="info-box-icon">
                        <i class="fas fa-percent icon-card icon-green"></i>
                    </div>
                    <h4 class="card-title mt-0">Total Profit Share (Last 30 Days )</h4>

                    <p class="card-text font-bold"><?= $total ?> %</p>
                </div>
            </div>
        </div>

        <!-- Deposit Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Daily Profit</h4>
                        <div class="table-responsive">
                            <table id="dailyprofit" class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Autono</th>
                                        <th>Date</th>
                                        <th>Profit</th>
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
    $(document).ready(function() {
        var table = $('#dailyprofit').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/daily-profit/data/dailyprofit.php",
            "columnDefs": [{
                "targets": [0],
                "visible": false
            }, ],
            "order": [0, "desc"]

        });




    });
</script>