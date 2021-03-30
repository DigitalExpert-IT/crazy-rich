<?php
// showing total invest users
$total_invest_query = 'SELECT SUM(paket_invest), COUNT(invest_status) FROM trading WHERE invest_status="Active"';
$get_total_invest = mysqli_query($con, $total_invest_query);
$res_total_invest = mysqli_fetch_array($get_total_invest);

// showing saldo invest users
$total_invest_refund = 'SELECT SUM(saldo_invest) AS total_profit, COUNT(saldo_invest > 0) FROM users';
$get_invest_refund = mysqli_query($con, $total_invest_refund);
$res_invest_refund = mysqli_fetch_assoc($get_invest_refund);

// showing total users saldo invest
$count_users_invest = 'SELECT COUNT(saldo_invest) AS total_users FROM users WHERE saldo_invest > 0';
$get_user_count = mysqli_query($con, $count_users_invest);
$res_user_count = mysqli_fetch_assoc($get_user_count);

// showing total main balance (saldo utama)
$sum_main_balance = "SELECT SUM(saldo_aktif) AS main_balance, COUNT(saldo_aktif) AS count_user FROM users";
$get_main_balance = mysqli_query($con, $sum_main_balance);
$res_main_balance = mysqli_fetch_assoc($get_main_balance);

// shwoing total pending wd main balance (saldo utama)
$sum_pending_wd_main = "SELECT SUM(wd_beforefee) AS wd_currency, COUNT(wd_beforefee) AS wd_users FROM withdraw WHERE status_wd='Pending'";
$get_pending_wd_main = mysqli_query($con, $sum_pending_wd_main);
$res_pending_wd_main = mysqli_fetch_assoc($get_pending_wd_main);

$sum_pending_wd_profit = "SELECT SUM(wd_beforefee) AS wd_currency, COUNT(wd_beforefee) AS wd_users FROM withdraw_invest WHERE status_wd='Pending'";
$get_pending_wd_profit = mysqli_query($con, $sum_pending_wd_profit);
$res_pending_wd_profit = mysqli_fetch_assoc($get_pending_wd_profit);

?>
<div class="page-content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <i class="mdi mdi-account-group me-10 icon-card icon-blue"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">$ <?= number_format($res_total_invest[0], 0, '', '.') ?></span></h4>
                            <p class="text-muted mb-0">Total Invest Users</p>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-account-group me-1"></i><?= $res_total_invest[1] ?></span> Active Users

                        </p>
                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <i class="mdi mdi-account-cash me-1 icon-card text-success"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?= angka(totbonus($_SESSION['user_id'])) ?></span></h4>
                            <p class="text-muted mb-0">$ <?= number_format($res_invest_refund['total_profit'], 0, '', '.') ?></p>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><?= $res_user_count['total_users'] ?></span> Total Users Investment
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <i class="fas fa-dollar-sign icon-card icon-yellow"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1">$<span data-plugin="counterup"><?= number_format($res_main_balance['main_balance'], 0, '', '.') ?></span></h4>
                            <p class="text-muted mb-0">Total Main Balance Users</p>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><?= $res_main_balance['count_user'] ?></span> Active Users
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">

                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <i class="mdi mdi-briefcase-clock-outline me-1 icon-card icon-red"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1">$<span data-plugin="counterup"> <?= number_format($res_pending_wd_main['wd_currency'], 0, '', '.') ?></span></h4>
                            <p class="text-muted mb-0">Total Pending Withdraw Main Balance Users</p>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><?= $res_pending_wd_main['wd_users'] ?></span> Pending Withdraws
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">

                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <i class="mdi mdi-briefcase-clock-outline me-1 icon-card icon-red"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1">$<span data-plugin="counterup"> <?= number_format($res_pending_wd_profit['wd_currency'], 0, '', '.') ?></span></h4>
                            <p class="text-muted mb-0">Total Pending Withdraw Profit & Refund Users</p>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><?= $res_pending_wd_profit['wd_users'] ?></span> Pending Withdraws
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->
        </div> <!-- end row-->
        <?php
        $quinfo = "select * from information";
        $rsinfo = mysqli_query($con, $quinfo);
        $rwinfo = mysqli_fetch_array($rsinfo);

        ?>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button bg-gradient-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: #FFF;">
                                        <?= $rwinfo['title'] ?>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong><?= $rwinfo['description'] ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
        <?php
        $quinfo = "select * from banners";
        $rsinfo = mysqli_query($con, $quinfo);

        $quinfo1 = "select * from banners";
        $rsinfo1 = mysqli_query($con, $quinfo1);

        ?>
        <!-- Carousel Row -->
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Banners</h4>

                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php $i = 1;
                                while ($gambar = mysqli_fetch_array($rsinfo1)) : ?>
                                    <div class="carousel-item" data-bs-interval="10000" id="banner-<?= $gambar['autono'] ?>">
                                        <img src="http://genshin.crazyrich.trade/assets/images/banners/<?= $gambar['nama_gambar']; ?>" class="d-block w-100" alt="...">
                                    </div>
                                    <?php $i++ ?>
                                <?php endwhile; ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Live Stream Youtube</h4>
                        <!-- <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p> -->

                        <!-- 1:1 aspect ratio -->
                        <?php
                        $quinfo = "SELECT iframe_link FROM youtube_streaming";
                        $rsinfo = mysqli_query($con, $quinfo);
                        $rwinfo = mysqli_fetch_array($rsinfo);
                        ?>
                        <div class="ratio ratio-16x9">
                            <?php if (empty($rwinfo['iframe_link'])) : ?>
                                <img src="http://genshin.crazyrich.trade/assets/images/banners/video_unavailable.jpeg" alt="video_unavailable.jpeg">
                            <?php else : ?>
                                <?= $rwinfo['iframe_link']; ?>
                            <?php endif ?>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        <script>
            $(document).ready(function() {
                $('#banner-2').addClass('active')
            });
        </script>
    </div> <!-- container-fluid -->
</div>