<?php
$queryDeposit = "SELECT * FROM deposit WHERE user_id = $_SESSION[user_id] ORDER BY date_create DESC LIMIT 6";
$resDeposit = mysqli_query($con, $queryDeposit);

$queryWd = "SELECT * FROM withdraw WHERE user_id = $_SESSION[user_id] ORDER BY tanggal_wd DESC LIMIT 6";
$resWd = mysqli_query($con, $queryWd);
$x = 0;
$i = 0;

$queryLevel = "SELECT * FROM users WHERE reff_id = $_SESSION[user_id]";
$resLevel = mysqli_query($con, $queryLevel);
$total2 = 0;
while ($resLvlArr = mysqli_fetch_array($resLevel)) {
    $userId1 = $resLvlArr['user_id'];
    $queryLvl2 = "SELECT * FROM users WHERE reff_id = $userId1";

    $counting2 = "SELECT COUNT(*) as reff_2 WHERE reff_id = $userId1";
    $resCounting2 = mysqli_query($con, $counting2);
    $arrCounting2 = mysqli_fetch_array($resCounting2);


    $total2 += mysqli_num_rows($resLvl2);
    $resLvl2 = mysqli_query($con, $queryLvl2);
    continue;

    while ($resLvlArr2 = mysqli_fetch_array($resLvl2)) {
        $userId2 = $resLvlArr2['user_id'];
        $queryLvl3 = "SELECT * FROM users WHERE reff_id = $userId2";
        $resLvl3 = mysqli_query($con, $queryLvl2);
        $getLvl3 = mysqli_fetch_array($resLvl2);
        $total3 = count($getLvl3);
    }
}

// echo $idLevel;




$queryLevel2 = "SELECT COUNT(*) as reff_2 FROM users WHERE reff_id = $idLevel";
$queryLevel2F = "SELECT * FROM users WHERE reff_id = $idLevel";

$resLevel2 = mysqli_query($con, $queryLevel2);
$countLvl2 = mysqli_fetch_array($resLevel2);
$resLvl2f = mysqli_query($con, $queryLevel2F);
$getLvl2f = mysqli_fetch_row($resLvl2f);

$idLevel2 = $countLvl2['reff_2'];
$idReff2 = $getLvl2f[0];

$queryLevel3 = "SELECT COUNT(*) as reff_3 FROM users WHERE reff_id = $idReff2";
$resLevel3 = mysqli_query($con, $queryLevel3);
$countLvl3 = mysqli_fetch_array($resLevel3);
?>
<div class="page-content">

    <div class="container-fluid">
        <?php include('component/referral-card.php') ?>

        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <i class="mdi mdi-account-group me-10 icon-card icon-blue"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><?= dolar(saldo($_SESSION['user_id'])) ?></h4>
                            <p class="text-muted mb-0">Your Balance</p>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1">
                                <?= rupiah(saldo($_SESSION['user_id']) * $rateidr) ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <i class="mdi mdi-account-group me-10 icon-card icon-blue"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?= totreff($_SESSION['user_id']) ?></span></h4>
                            <p class="text-muted mb-0">Total Referral Level 1</p>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1">
                                <?= dolar(totalProfitReff($_SESSION['user_id'], 1)) ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <i class="mdi mdi-account-group me-10 icon-card icon-blue"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?= $total2 ?></span></h4>
                            <p class="text-muted mb-0">Total Referral Level 2</p>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><?= dolar(totalProfitReff($_SESSION['user_id'], 2)) ?></span>
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <i class="mdi mdi-account-group me-10 icon-card icon-blue"></i>
                        </div>

                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?= $total3 ?></span></h4>
                            <p class="text-muted mb-0">Total Referral Level 3</p>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><?= dolar(totalProfitReff($_SESSION['user_id'], 3)) ?></span>
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->

            <!-- <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <i class="mdi mdi-account-cash me-1 icon-card text-success"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?= angka(totbonus($_SESSION['user_id'])) ?></span></h4>
                            <p class="text-muted mb-0">Total Referral Bonus</p>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><?= dolar(totbonus($_SESSION['user_id'])) ?></span> Monthly Ref Bonus
                        </p>
                    </div>
                </div>
            </div> -->
            <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <i class="fas fa-dollar-sign icon-card icon-yellow"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><?= dolar(profitInvest($_SESSION['user_id'])) ?></h4>
                            <p class="text-muted mb-0">Profit Invest</p>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><?= rupiah(profitInvest($_SESSION['user_id']) * $rateidr) ?></span>
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">

                <div class="card">
                    <div class="card-body">
                        <?php
                        $quactv = "select count(contract_id) as ci from trading where invest_status = 'Active' and user_id = $_SESSION[user_id]";
                        $rsactv = mysqli_query($con, $quactv);
                        $rwactv = mysqli_fetch_array($rsactv);
                        ?>
                        <div class="float-end mt-2">
                            <i class="mdi mdi-briefcase-clock-outline me-1 icon-card icon-red"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?= $rwactv['ci'] ?></span></h4>
                            <p class="text-muted mb-0">Active Investment</p>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1"></span>
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

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Latest Transaction History</h4>

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified bg-light" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-bs-toggle="tab" href="#navpills2-deposit" role="tab">
                                    <span class="d-block d-sm-none"><i class="uil uil-money-insert"></i></span>
                                    <span class="d-none d-sm-block">Deposit History</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#navpills2-withdraw" role="tab">
                                    <span class="d-block d-sm-none"><i class="uil uil-money-withdraw"></i></span>
                                    <span class="d-none d-sm-block">Invest History</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="navpills2-deposit" role="tabpanel">
                                <?php include('component/deposit.php') ?>
                            </div>
                            <div class="tab-pane" id="navpills2-withdraw" role="tabpanel">
                                <?php include('component/withdraw.php') ?>
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
                                        <img src="http://putin.smarttrade.top/assets/images/banners/<?= $gambar['nama_gambar']; ?>" class="d-block w-100" alt="...">
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
                                <img src="http://putin.smarttrade.top/assets/images/banners/video_unavailable.jpeg" alt="video_unavailable.jpeg">
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