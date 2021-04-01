<script src="../minible/libs/node-waves/waves.min.js"></script>

<!-- LOGO -->
<div class="navbar-brand-box">
    <a href="#" class="logo logo-dark">
        <span class="logo-sm">
            <img src="../assets/images/logo/newLogoCircle1.png" alt="" height="30">

        </span>
        <span class="logo-lg">
            <img src="../assets/images/logo/newLogo.png" alt="" height="50">
        </span>
    </a>

    <a href="index.html" class="logo logo-light">
        <span class="logo-sm">
            <img src="../assets/images/logo/newLogoCircle1.png" alt="" height="30">
        </span>
        <span class="logo-lg">
            <img src="../assets/images/logo/newLogo.png" alt="" height="50">
        </span>
    </a>
</div>



<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
    <i class="fa fa-fw fa-bars"></i>
</button>

<div data-simplebar class="sidebar-menu-scroll">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Main</li>

            <li class="<?php if ($_GET['mod'] == '') {
                            echo 'mm-active';
                        } ?>">
                <a href="index.php?" class="<?php if ($_GET['mod'] == '') {
                                                echo 'active';
                                            } ?>">
                    <i class="uil-home-alt"></i><span class="badge rounded-pill bg-primary float-end"></span>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-title">Apps</li>
            <li class="<?php if ($_GET['mod'] == 'depowd') {
                            echo 'mm-active';
                        } ?>">
                <a href="?mod=depowd&cmd=index" class="waves-effect <?php if ($_GET['mod'] == 'depowd') {
                                                                        echo 'active';
                                                                    } ?>">
                    <i class="uil-moneybag-alt"></i>
                    <span>Deposit/Withdraw</span>
                </a>
            </li>
            <li class="<?php if ($_GET['mod'] == 'trade') {
                            echo 'mm-active';
                        } ?>">
                <a href="?mod=trade&cmd=index" class="waves-effect <?php if ($_GET['mod'] == 'trade') {
                                                                        echo 'active';
                                                                    } ?>">
                    <i class="uil-bag-alt"></i>
                    <span>Mining</span>
                </a>
            </li>
            <li class="<?php if ($_GET['mod'] == 'referral') {
                            echo 'mm-active';
                        } ?>">
                <a href="?mod=referral&cmd=index" class="waves-effect <?php if ($_GET['mod'] == 'referral') {
                                                                            echo 'active';
                                                                        } ?>">
                    <i class="fas fa-user-friends"></i>
                    <span>Referral</span>
                </a>
            </li>

            <li class="<?php if ($_GET['mod'] == 'transaction') {
                            echo 'mm-active';
                        } ?>">
                <a href="?mod=transaction&cmd=index" class="waves-effect <?php if ($_GET['mod'] == 'transaction') {
                                                                                echo 'active';
                                                                            } ?>">
                    <i class="fas fa-book"></i>
                    <span>Transaction</span>
                </a>
            </li>

            <li class="<?php if ($_GET['mod'] == 'daily-profit') {
                            echo 'mm-active';
                        } ?>">
                <a href="?mod=daily-profit&cmd=index" class="waves-effect <?php if ($_GET['mod'] == 'daily-profit') {
                                                                                echo 'active';
                                                                            } ?>">
                    <i class="fas fa-percent"></i>
                    <span>Daily Profit</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Sidebar -->
</div>