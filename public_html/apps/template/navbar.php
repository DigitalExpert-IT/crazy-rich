<?php
$qurateidr = "select value from master_seting where nama_seting='rate_idr_to_usd'";
$rsrate = mysqli_query($con, $qurateidr);
$rwrate = mysqli_fetch_array($rsrate);
$rateidr = $rwrate['value'];
?>
<style>
    @media all and (max-width: 699px) and (min-width: 520px),
    (min-width: 1151px) {
        #logout-sm {
            display: none;
        }
    }
</style>
<div class="navbar-header">
    <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="dashboard.php" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="../images/logo/logo_round_sm.png" alt="" height="30">

                </span>
                <span class="logo-lg">
                    <img src="../images/logo/logo_sm.png" alt="" height="50">
                </span>
            </a>

            <a href="dashboard.php" class="logo logo-light">
                <span class="logo-sm">
                    <img src="../images/logo/logo_round_sm.png" alt="" height="30">
                </span>
                <span class="logo-lg">
                    <img src="../images/logo/logo_sm.png" alt="" height="50">
                </span>
            </a>


        </div>

        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
        </button>


    </div>

    <div class="d-flex">
        <div class="dropdown d-none d-lg-inline-block ms-1">
            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                <i class="uil-minus-path"></i>
            </button>
        </div>

        <div class="dropdown d-inline-block">

            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15"><?= $_SESSION['nama'] ?></span>
                <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <!-- <a class="dropdown-item" href="#"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">View Profile</span></a> -->
                <span class="dropdown-item"><i class="uil uil-wallet font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Balance: <?= dolar(saldo($_SESSION['user_id'])) ?> (<?= rupiah(saldo($_SESSION['user_id']) * $rateidr) ?>)</span></span>
                <a class="dropdown-item d-block" href="?mod=profile&cmd=index"><i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Settings</span> <span class="badge bg-soft-success rounded-pill mt-1 ms-2"></span></a>
                <!-- <a class="dropdown-item" href="#"><i class="uil uil-lock-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Lock screen</span></a> -->
                <a class="dropdown-item" href="logout.php"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sign out</span></a>
            </div>

        </div>

        <div class="" id="logout-sm">
            <?php
            $name = $_SESSION['nama'];
            $username = explode(' ', $name);
            ?>
            <?= $username[0] ?>
            <a href="logout.php">
                <button data-bs-toggle="signout" type="button" class="btn header-item noti-icon waves-effect">
                    <i class="uil uil-sign-out-alt"></i>
                </button>
            </a>
        </div>

    </div>
</div>