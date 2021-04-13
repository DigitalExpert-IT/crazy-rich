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

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daily Profit</h4>

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified bg-light" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-bs-toggle="tab" href="#navpills2-s1" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-percent"></i></span>
                                    <span class="d-none d-sm-block">Ethereum + GPU Family Invest</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#navpills2-s2" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-percent"></i></span>
                                    <span class="d-none d-sm-block">All ASIC Invest</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#navpills2-s3" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-percent"></i></span>
                                    <span class="d-none d-sm-block">All Masternode Staking</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#navpills2-s4" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-percent"></i></span>
                                    <span class="d-none d-sm-block">All SHA256 Invest</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="navpills2-s1" role="tabpanel">
                                <?php include('component/invest_s1.php') ?>
                            </div>
                            <div class="tab-pane" id="navpills2-s2" role="tabpanel">
                                <?php include('component/invest_s2.php') ?>

                            </div>
                            <div class="tab-pane" id="navpills2-s3" role="tabpanel">
                                <?php include('component/invest_s3.php') ?>

                            </div>
                            <div class="tab-pane" id="navpills2-s4" role="tabpanel">
                                <?php include('component/invest_s4.php') ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<script>
    $(document).ready(function() {
        var s1 = $('#s1-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/daily-profit/data/s1-profit.php",
            "columnDefs": [{
                "targets": [0],
                "visible": false
            }, ],
            "order": [0, "desc"]

        });

        var s2 = $('#s2-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/daily-profit/data/s2-profit.php",
            "columnDefs": [{
                "targets": [0],
                "visible": false
            }, ],
            "order": [0, "desc"]

        });

        var s3 = $('#s3-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/daily-profit/data/s3-profit.php",
            "columnDefs": [{
                "targets": [0],
                "visible": false
            }, ],
            "order": [0, "desc"]

        });

        var s4 = $('#s4-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/daily-profit/data/s4-profit.php",
            "columnDefs": [{
                "targets": [0],
                "visible": false
            }, ],
            "order": [0, "desc"]

        });




    });
</script>