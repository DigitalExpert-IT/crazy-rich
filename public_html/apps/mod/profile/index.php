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
                                <a class="nav-link active" data-bs-toggle="tab" href="#navpills2-change-password" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-lock"></i></span>
                                    <span class="d-none d-sm-block">Change Password</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#navpills2-profile" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-user-cog"></i></span>
                                    <span class="d-none d-sm-block">Profile</span>
                                </a>
                            </li>
                            <!-- <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#navpills2-referral" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-user-friends"></i></span>
                                    <span class="d-none d-sm-block">Referral Bonus</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#navpills2-refund" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-undo-alt"></i></span>
                                    <span class="d-none d-sm-block">Refund Finish Investment</span>
                                </a>
                            </li> -->
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="navpills2-change-password" role="tabpanel">
                                <?php include('component/change-password.php') ?>
                            </div>
                            <div class="tab-pane" id="navpills2-profile" role="tabpanel">
                                <div class="col-md-12 col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <h4 class="mb-1 mt-1">Contact Admin If You Want To Update Your Profile</h4>
                                                <p class="text-muted mb-0">crazyrich@gmail.com</p>
                                            </div>

                                            </p>
                                        </div>
                                    </div>
                                </div> <!-- end col-->
                            </div>
                            <!-- <div class="tab-pane" id="navpills2-referral" role="tabpanel">

                            </div>
                            <div class="tab-pane" id="navpills2-refund" role="tabpanel">

                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>