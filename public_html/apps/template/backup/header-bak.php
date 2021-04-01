<!doctype html>
<html lang="en" dir="ltr">

<head>

	<!-- META DATA -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Investment Platform">
	<meta name="author" content="Crazy Rich Trading">
	<meta name="keywords" content="Trading">

	<!-- FAVICON -->
	<link rel="shortcut icon" type="image/x-icon" href="../assets/images/logo/Crazy_richLOGO_COLOR.png" />

	<!-- TITLE -->
	<title>Crazy Rich Trading - Smart Investment</title>

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
<?php
$quUser = "SELECT * FROM users WHERE user_id = '$_SESSION[user_id]'";
$resUser = mysqli_query($con, $quUser);
$fetchUser = mysqli_fetch_assoc($resUser);
$address = $fetchUser['crypto_address'];
?>

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
						<!-- <img src="../assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo"> -->
						<!-- <img src="../assets/images/brand/logo-1.png" class="header-brand-img toggle-logo" alt="logo">
						<img src="../assets/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
						<img src="../assets/images/brand/logo-3.png" class="header-brand-img light-logo3" alt="logo">
						<span style="color:black;font-size:18px !important;" class="brand-text font-weight-light">Genesis Trading</span> -->
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
							<h6 class=" mb-0 text-dark"><?= $_SESSION['nama'] ?></h6>
							<span class="text-muted app-sidebar__user-name text-md">Active Balance: <?= dolar(saldo($_SESSION['user_id'])) ?></span>
						</div>
					</div>
				</div>
				<div class="sidebar-navs">
					<ul class="nav  nav-pills-circle">
						<!-- <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Settings">
							<a href="?mod=profile&cmd=index" class="nav-link text-center m-2">
								<i class="fe fe-settings"></i>
							</a>
						</li>
						<li class="nav-item" data-toggle="tooltip" data-placement="top" title="Referral">
							<a href="?mod=referral&cmd=index" class="nav-link text-center m-2">
								<i class="fe fe-users"></i>
							</a>
						</li>
						<li class="nav-item" data-toggle="tooltip" data-placement="top" title="Deposit &amp; Withdraw">
							<a href="?mod=depowd&cmd=index" class="nav-link text-center m-2">
								<i class="fa fa-bank"></i>
							</a>
						</li> -->
						<li class="nav-item" data-toggle="tooltip" data-placement="top" title="Logout">
							<a href="logout.php" class="nav-link text-center m-2">
								<i class="fe fe-power"></i>
							</a>
						</li>
					</ul>
				</div>
				<ul class="side-menu">
					<li>
						<h3>Main</h3>
					</li>
					<li class="slide">
						<a class="side-menu__item <?php if ($_GET['mod'] == '') {
														echo 'active';
													} ?>" href="index.php?"><i class="side-menu__icon ti-home"></i><span class="side-menu__label">Dashboard</span></a>

					</li>
					<li>
						<h3>User Menu</h3>
					</li>

					<li>
						<a class="side-menu__item <?php if ($_GET['mod'] == 'depowd') {
														echo 'active';
													} ?>" href="?mod=depowd&cmd=index"><i class="side-menu__icon fa fa-money"></i><span class="side-menu__label">Deposit/Withdraw</span></a>
					</li>
					<li>
						<a class="side-menu__item <?php if ($_GET['mod'] == 'trade') {
														echo 'active';
													} ?>" href="?mod=trade&cmd=index"><i class="side-menu__icon fa fa-shopping-bag"></i><span class="side-menu__label">Investment</span></a>
					</li>
					<li>
						<a class="side-menu__item <?php if ($_GET['mod'] == 'referral') {
														echo 'active';
													} ?>" href="?mod=referral&cmd=index"><i class="side-menu__icon fa fa-sitemap"></i><span class="side-menu__label">Referral</span></a>
					</li>
					<li>
						<a class="side-menu__item <?php if ($_GET['mod'] == 'transaction') {
														echo 'active';
													} ?>" href="?mod=transaction&cmd=index"><i class="side-menu__icon fa fa-book"></i><span class="side-menu__label">Transaction</span></a>
					</li>
					<li>
						<a class="side-menu__item <?php if ($_GET['mod'] == 'daily-profit') {
														echo 'active';
													} ?>" href="?mod=daily-profit&cmd=index"><i class="side-menu__icon fa fa-percent"></i><span class="side-menu__label">Daily Profit</span></a>
					</li>
					<li>
						<a class="side-menu__item <?php if ($_GET['mod'] == 'profile') {
														echo 'active';
													} ?>" href="?mod=profile&cmd=index"><i class="side-menu__icon fa fa-address-card"></i><span class="side-menu__label">Profile & Setting</span></a>
					</li>


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
						<div class="col-md-4 col-10">
							<input readonly type="text" value="http://crazyrich.trade/register.php?referral=<?= $_SESSION['reffcode'] ?>" id="reflink" name="referal" class="form-control">

						</div>
						<div class="col-md-4">

							<button onClick="copyreff()" class="btn btn-success btn-md">Copy</button>
						</div>

						<div class="d-flex  ml-auto header-right-icons header-search-icon">

							<div class="dropdown d-md-flex">
								<a class="nav-link icon full-screen-link nav-link-bg">
									<i class="fe fe-maximize fullscreen-button"></i>
								</a>
							</div><!-- FULL-SCREEN -->


						</div>
					</div>