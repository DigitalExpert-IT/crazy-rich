<!doctype html>
<html lang="en" dir="ltr">

<head>

	<!-- META DATA -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Investment Platform">
	<meta name="author" content="Genesis Trading">
	<meta name="keywords" content="Trading">

	<!-- FAVICON -->
	<link rel="shortcut icon" type="image/x-icon" href="../assets/images/logo/Crazy_richLOGO_COLOR.png" />

	<!-- TITLE -->
	<title>SmartTrade Trading - Smart Investment</title>

	<!-- BOOTSTRAP CSS -->
	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

	<!-- STYLE CSS -->
	<link href="../assets/css/style.css" rel="stylesheet" />
	<link href="../assets/css/skin-modes.css" rel="stylesheet" />
	<link href="../assets/css/dark-style.css" rel="stylesheet" />

	<!-- SIDE-MENU CSS -->
	<link href="../assets/plugins/sidemenu/sidemenu.css" rel="stylesheet">

	<!-- SINGLE-PAGE CSS -->
	<link href="../assets/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">

	<!--C3 CHARTS CSS -->
	<link href="../assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

	<!-- CUSTOM SCROLL BAR CSS-->
	<link href="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

	<!--- FONT-ICONS CSS -->
	<link href="../assets/css/icons.css" rel="stylesheet" />

	<!-- SIDEBAR CSS -->
	<link href="../assets/plugins/sidebar/sidebar.css" rel="stylesheet">

	<!-- COLOR SKIN CSS -->
	<link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/colors/color4.css" />

	<!-- DATA TABLE CSS -->
	<link href="../assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />

	<!-- JQUERY JS -->
	<script src="../assets/js/jquery-3.4.1.min.js"></script>

</head>

<body class="dark-mode app sidebar-mini">

	<!-- GLOBAL-LOADER -->
	<div id="global-loader">
		<div class="lds-hourglass" style="margin-top: 275px;"></div>
	</div>
	<!-- /GLOBAL-LOADER -->

	<!-- PAGE -->
	<div class="page">
		<div class="page-main">

			<!--APP-SIDEBAR-->
			<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
			<aside class="app-sidebar">
				<div class="side-header">
					<a class="header-brand1" href="index.php">
						<img width="150" height="50" src="../assets/images/logo/newLogo.png" alt="">

					</a>
					<!-- LOGO -->
					<a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
				</div>
				<div class="app-sidebar__user">
					<div class="dropdown user-pro-body text-center">
						<div class="user-pic">
							<img hidden src="../assets/images/users/10.jpg" alt="user-img" class="avatar-xl rounded-circle">
						</div>
						<div class="user-info">
							<h6 class=" mb-0 text-dark text-capitalize"><?= $_SESSION['status'] ?></h6>
						</div>
					</div>
				</div>
				<div class="sidebar-navs">
					<ul class="nav  nav-pills-circle">
						<li class="nav-item" data-toggle="tooltip" data-placement="top" title="Logout">
							<a href="logout.php" class="nav-link text-center m-2">
								<i class="fe fe-power"></i>
							</a>
						</li>
					</ul>
				</div>

				<!-- side menu -->
				<ul class="side-menu">
					<!-- dashboard -->
					<li>
						<h3>Main</h3>
					</li>
					<li class="slide">
						<a class="side-menu__item <?php if ($_GET['mod'] == '') {
														echo 'active';
													} ?>" href="index.php?"><i class="side-menu__icon ti-home"></i><span class="side-menu__label">Dashboard</span></a>
					</li>
					<!-- end dashboard -->

					<!-- list menu user -->
					<li>
						<h3>Users</h3>
					</li>
					<li class="slide 
					<?php if ($_GET['mod'] == 'user') {
						echo 'is-expanded';
					} ?> ">
						<a class="side-menu__item 
						<?php if ($_GET['mod'] == 'user') {
							echo 'active';
						} ?> " data-toggle="slide" href="#"><i class="side-menu__icon ti-wallet"></i><span class="side-menu__label">Users</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<li class="
							<?php if ($_GET['mod'] == 'user' && $_GET['cmd'] == 'list') {
								echo 'active';
							} ?> "><a href="?mod=user&cmd=list" class="slide-item "> List Users</a></li>

						</ul>
					</li>
					<!-- end list menu user -->

					<!-- list menu transaksi -->
					<li>
						<h3>Transaction</h3>
					</li>
					<li class="slide 
					<?php if ($_GET['mod'] == 'transaksi') {
						echo 'is-expanded';
					} ?> ">
						<a class="side-menu__item 
						<?php if ($_GET['mod'] == 'transaksi') {
							echo 'active';
						} ?> " data-toggle="slide" href="#"><i class="side-menu__icon ti-wallet"></i><span class="side-menu__label">Transaction</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<li class="
							<?php if ($_GET['mod'] == 'transaksi' && $_GET['cmd'] == 'depowd') {
								echo 'active';
							} ?> "><a href="?mod=transaksi&cmd=depowd" class="slide-item "> Deposit &amp; Withdraw</a></li>
							<li class="
							<?php if ($_GET['mod'] == 'transaksi' && $_GET['cmd'] == 'wd_invest') {
								echo 'active';
							} ?> "><a href="?mod=transaksi&cmd=wd_invest" class="slide-item "> Withdraw Invest</a></li>
							<li class="
							<?php if ($_GET['mod'] == 'transaksi' && $_GET['cmd'] == 'history_profit') {
								echo 'active';
							} ?> "><a href="?mod=transaksi&cmd=history_profit" class="slide-item "> History Profit</a></li>
							<li class="
							<?php if ($_GET['mod'] == 'transaksi' && $_GET['cmd'] == 'history_refund_invest') {
								echo 'active';
							} ?> "><a href="?mod=transaksi&cmd=history_refund_invest" class="slide-item "> History Refund Invest</a></li>
							<li class="
							<?php if ($_GET['mod'] == 'transaksi' && $_GET['cmd'] == 'history_profit_reff') {
								echo 'active';
							} ?> "><a href="?mod=transaksi&cmd=history_profit_reff" class="slide-item "> History Profit Reff</a></li>
							<li class="
							<?php if ($_GET['mod'] == 'transaksi' && $_GET['cmd'] == 'history_refund') {
								echo 'active';
							} ?> "><a href="?mod=transaksi&cmd=history_refund" class="slide-item "> History Refund</a></li>
							<li class="
							<?php if ($_GET['mod'] == 'transaksi' && $_GET['cmd'] == 'history_trading') {
								echo 'active';
							} ?> "><a href="?mod=transaksi&cmd=history_trading" class="slide-item "> History Trading</a></li>

						</ul>
					</li>
					<!-- end list menu transaksi -->

					<!-- list menu invest -->
					<li>
						<h3>Invest</h3>
					</li>
					<li class="slide 
					<?php if ($_GET['mod'] == 'invest') {
						echo 'is-expanded';
					} ?> ">
						<a class="side-menu__item 
						<?php if ($_GET['mod'] == 'invest') {
							echo 'active';
						} ?> " data-toggle="slide" href="#"><i class="side-menu__icon fe fe-monitor"></i><span class="side-menu__label">Invest</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<li class="
							<?php if ($_GET['mod'] == 'invest' && $_GET['cmd'] == 'trading') {
								echo 'active';
							} ?> "><a href="?mod=invest&cmd=trading" class="slide-item "> Trading</a></li>
							<li class="
							<?php if ($_GET['mod'] == 'invest' && $_GET['cmd'] == 'master_invest') {
								echo 'active';
							} ?> "><a href="?mod=invest&cmd=master_invest" class="slide-item "> Master Invest</a></li>
							<li class="
							<?php if ($_GET['mod'] == 'invest' && $_GET['cmd'] == 'master_setting') {
								echo 'active';
							} ?> "><a href="?mod=invest&cmd=master_setting" class="slide-item "> Master Settings</a></li>

						</ul>
					</li>
					<!-- end list menu invest -->

					<!-- list menu asset -->
					<li>
						<h3>Aset</h3>
					</li>
					<li class="slide 
					<?php if ($_GET['mod'] == 'settings') {
						echo 'is-expanded';
					} ?> ">
						<a class="side-menu__item 
						<?php if ($_GET['mod'] == 'settings') {
							echo 'active';
						} ?> " data-toggle="slide" href="#"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Aset</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<li class="
							<?php if ($_GET['mod'] == 'settings' && $_GET['cmd'] == 'setting') {
								echo 'active';
							} ?>
							"><a href="?mod=settings&cmd=setting" class="slide-item "> Settings</a></li>
						</ul>
					</li>
					<!-- end list menu asset -->

				</ul>
				</li>
				</ul>
			</aside>
			<!--/APP-SIDEBAR-->

			<!-- Mobile Header -->
			<div class="mobile-header">
				<div class="container-fluid">
					<div class="d-flex">
						<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
						<a class="header-brand" href="index.php">
						</a>
						<div class="d-flex order-lg-2 ml-auto header-right-icons">

							<div class="dropdown profile-1">
								<a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
									<span>
										<img src="../assets/images/logo/Crazy_richLOGO_COLOR.png" style="background-color: white;" alt="profile-user" class="avatar  profile-user brround cover-image">
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

									<div class="dropdown-divider"></div>

									<a class="dropdown-item" href="logout.php">
										<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
									</a>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<script>
				function copyreff() {
					var copyText = document.getElementById("reflink");
					copyText.select();
					copyText.setSelectionRange(0, 99999)
					document.execCommand("copy");
					alert("Copied: " + copyText.value);
				}
			</script>
			<div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-md-none bg-white">
				<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
					<div class="d-flex order-lg-2 ml-auto">

						<div class="dropdown d-md-flex">
							<a class="nav-link icon full-screen-link nav-link-bg">
								<i class="fe fe-maximize fullscreen-button"></i>
							</a>
						</div><!-- FULL-SCREEN -->

					</div>
				</div>
			</div>
			<!-- /Mobile Header -->

			<!--app-content open-->
			<div class="app-content">
				<div class="side-app">

					<div class="page-header">



						<div class="d-flex  ml-auto header-right-icons header-search-icon">

							<div class="dropdown d-md-flex">
								<a class="nav-link icon full-screen-link nav-link-bg">
									<i class="fe fe-maximize fullscreen-button"></i>
								</a>
							</div><!-- FULL-SCREEN -->


						</div>
					</div>