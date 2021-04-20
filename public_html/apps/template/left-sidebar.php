<!-- LOGO -->
<div class="navbar-brand-box">
    <a href="index.php" class="logo logo-dark">
        <span class="logo-sm">
            <img src="../images/logo/logo_round_sm.png" alt="" height="30">

        </span>
        <span class="logo-lg">
            <img src="../images/logo/logo_round_sm.png" alt="" height="50">
        </span>
    </a>

    <a href="index.php" class="logo logo-light">
        <span class="logo-sm">
            <img src="../images/logo/logo_round_sm.png" alt="" height="30">
        </span>
        <span class="logo-lg">
            <img src="../images/logo/logo_round_sm.png" alt="" height="50">
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
                <li class="<?php if ($_GET['mod'] == 'user') {
                                echo 'mm-active';
                            } ?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user-friends"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <ul class="sub-menu" aria-expanded="true">
                            <li class="<?php if ($_GET['mod'] == 'user' && $_GET['cmd'] == 'list') {
                                            echo 'mm-active';
                                        } ?>"><a href="?mod=user&cmd=list">List Users</a></li>
                        </ul>
                    </ul>
                </li>

                <li class="<?php if ($_GET['mod'] == 'transaksi') {
                                echo 'mm-active';
                            } ?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-book"></i>
                        <span>Transaction</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <ul class="sub-menu" aria-expanded="true">
                            <li class="<?php if ($_GET['mod'] == 'transaksi' && $_GET['cmd'] == 'depowd') {
                                            echo 'mm-active';
                                        } ?>"><a href="?mod=transaksi&cmd=depowd">Deposit & Withdraw</a></li>


                            <li class="<?php if ($_GET['mod'] == 'transaksi' && $_GET['cmd'] == 'wd_invest') {
                                            echo 'mm-active';
                                        } ?>"><a href="?mod=transaksi&cmd=wd_invest">Withdraw Invest</a></li>


                            <li class="<?php if ($_GET['mod'] == 'transaksi' && $_GET['cmd'] == 'history_profit') {
                                            echo 'mm-active';
                                        } ?>"><a href="?mod=transaksi&cmd=history_profit">History Profit</a></li>



                            <li class="<?php if ($_GET['mod'] == 'transaksi' && $_GET['cmd'] == 'history_profit_reff') {
                                            echo 'mm-active';
                                        } ?>"><a href="?mod=transaksi&cmd=history_profit_reff">History Profit Reff</a></li>


                            <li class="<?php if ($_GET['mod'] == 'transaksi' && $_GET['cmd'] == 'history_trading') {
                                            echo 'mm-active';
                                        } ?>"><a href="?mod=transaksi&cmd=history_trading">History Trading</a></li>
                        </ul>
                    </ul>
                </li>

                <li class="<?php if ($_GET['mod'] == 'invest') {
                                echo 'mm-active';
                            } ?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-bag-alt"></i>
                        <span>Invest</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <ul class="sub-menu" aria-expanded="true">
                            <li class="<?php if ($_GET['mod'] == 'invest' && $_GET['cmd'] == 'trading') {
                                            echo 'mm-active';
                                        } ?>"><a href="?mod=invest&cmd=trading">Trading</a></li>

                            <li class="<?php if ($_GET['mod'] == 'invest' && $_GET['cmd'] == 'master_invest') {
                                            echo 'mm-active';
                                        } ?>"><a href="?mod=invest&cmd=master_invest">Master Invest</a></li>

                            <li class="<?php if ($_GET['mod'] == 'invest' && $_GET['cmd'] == 'master_setting') {
                                            echo 'mm-active';
                                        } ?>"><a href="?mod=invest&cmd=master_setting">Master Setting</a></li>
                        </ul>
                    </ul>
                </li>


                <li class="<?php if ($_GET['mod'] == 'settings') {
                                echo 'mm-active';
                            } ?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-cog"></i>
                        <span>Asset</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <ul class="sub-menu" aria-expanded="true">
                            <li class="<?php if ($_GET['mod'] == 'settings' && $_GET['cmd'] == 'setting') {
                                            echo 'mm-active';
                                        } ?>"><a href="?mod=settings&cmd=setting">Settings</a></li>
                        </ul>
                    </ul>
                </li>


            </ul>
    </div>
    <!-- Sidebar -->
</div>