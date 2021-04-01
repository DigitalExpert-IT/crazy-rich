<div class="navbar-header">
    <div class="d-flex">
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


    </div>

    <div class="d-flex">
        <div class="dropdown d-none d-lg-inline-block ms-1">
            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                <i class="uil-minus-path"></i>
            </button>
        </div>

        <div class="dropdown d-inline-block">

            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">Admin</span>
                <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <!-- <a class="dropdown-item" href="#"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">View Profile</span></a> -->
                <a class="dropdown-item d-block" href="?mod=profile&cmd=index"><i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Settings</span> <span class="badge bg-soft-success rounded-pill mt-1 ms-2"></span></a>
                <!-- <a class="dropdown-item" href="#"><i class="uil uil-lock-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Lock screen</span></a> -->
                <a class="dropdown-item" href="logout.php"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sign out</span></a>
            </div>
        </div>

        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                <i class="uil-cog"></i>
            </button>
        </div>

    </div>
</div>