<div class="page-content">
    <div class="container-fluid">
        <?php include('template/component/referral-card.php') ?>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Transaction History</h4>

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified bg-light" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-bs-toggle="tab" href="#navpills2-profit" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-percent"></i></span>
                                    <span class="d-none d-sm-block">Profit Trade</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#navpills2-referral" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-user-friends"></i></span>
                                    <span class="d-none d-sm-block">Referral Bonus</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="navpills2-profit" role="tabpanel">
                                <?php include('component/profit-trade-table.php') ?>

                            </div>
                            <div class="tab-pane" id="navpills2-referral" role="tabpanel">
                                <?php include('component/referral-bonus-table.php') ?>

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
        var table = $('#profit').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "desc"]
            ],
            "ajax": "mod/transaction/data/profit.php",

        });


    });

    $(document).ready(function() {
        $('#profit_invest').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "desc"]
            ],
            "ajax": "mod/transaction/data/profit_invest.php",
        });
    });

    $(document).ready(function() {
        var table = $('#bonusreff').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "desc"]
            ],
            "ajax": "mod/transaction/data/bonusreff.php",

        });



    });

    $(document).ready(function() {
        var table = $('#refund').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "desc"]
            ],
            "ajax": "mod/transaction/data/refund.php",

        });




    });
</script>