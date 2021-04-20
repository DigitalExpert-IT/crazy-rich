<?php

session_start();

include_once '../assets/dbconnect.php';

if (!isset($_SESSION['autono'])) {
	header("Location: ../index.php");
}

include('template/fungsi.php');
?>

<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8" />
	<title>Dashboard | SmartTrade - Admin & Dashboard Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="../minible/images/favicon.ico">
	<!-- plugin css -->
	<link href="../minible/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="../minible/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
	<link href="../minible/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	<link href="../minible/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="../minible/libs/@chenfengyuan/datepicker/datepicker.min.css">
	<!-- Sweet Alert-->
	<link href="../minible/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

	<!-- Bootstrap Css -->
	<link href="../minible/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="../minible/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- Custome CSS -->
	<link href="../minible/css/custom.css" rel="stylesheet" type="text/css" />
	<style>
		.loader-hide {
			display: none;
		}
	</style>
	<!-- App Css-->
	<link href="../minible/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	<link href="../minible/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

	<!-- Datatable -->
	<!-- DataTables -->
	<link href="../minible/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="../minible/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

	<!-- Responsive datatable examples -->
	<link href="../minible/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<!-- JAVASCRIPT -->
	<script src="../minible/libs/jquery/jquery.min.js"></script>
	<script src="../minible/js/custom.js"></script>
</head>


<body>

	<div class="preloader-wrapper" id="preloader">
		<div class="col-xl-12">
			<div class="preloader">
				<div class="spinner-border text-primary m-1" role="status">
					<span class="sr-only">Loading...</span>
				</div>
			</div>
		</div>
	</div>
	<!-- Begin page -->
	<div id="layout-wrapper">
		<!-- JAVASCRIPT -->
		<script src="../minible/libs/jquery/jquery.min.js"></script>
		<script src="../minible/libs/metismenu/metisMenu.min.js"></script>

		<!-- apexcharts
		<script src="../minible/libs/apexcharts/apexcharts.min.js"></script> -->

		<!-- Required datatable js -->
		<script src="../minible/libs/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="../minible/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
		<!-- Buttons examples -->
		<script src="../minible/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
		<script src="../minible/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
		<script src="../minible/libs/jszip/jszip.min.js"></script>
		<script src="../minible/libs/pdfmake/build/pdfmake.min.js"></script>
		<script src="../minible/libs/pdfmake/build/vfs_fonts.js"></script>
		<script src="../minible/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
		<script src="../minible/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
		<script src="../minible/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
		<!-- plugins -->
		<script src="../minible/libs/select2/js/select2.min.js"></script>
		<script src="../minible/libs/spectrum-colorpicker2/spectrum.min.js"></script>
		<script src="../minible/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="../minible/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="../minible/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
		<script src="../minible/libs/@chenfengyuan/datepicker/datepicker.min.js"></script>
		<script src="../minible/libs/node-waves/waves.min.js"></script>
		<script src="../minible/libs/sweetalert2/sweetalert2.min.js"></script>
		<script src="../minible/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
		<script src="../minible/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
		<header id="page-topbar">
			<?php include('template/navbar.php') ?>
		</header>
		<!-- ========== Left Sidebar Start ========== -->
		<div class="vertical-menu">
			<?php include('template/left-sidebar.php') ?>
			<!-- Left Sidebar End -->
		</div>



		<!-- ============================================================== -->
		<!-- Start right Content here -->
		<!-- ============================================================== -->
		<div class="main-content">
			<?PHP
			if (empty($_GET['mod'])) {
				include_once "template/dashboard.php";
			} else {
				$file = $_GET["cmd"];
				$includeFile = "mod/" . $_GET['mod'] . "/" . $file . '.php';
				if (file_exists($includeFile)) {
					include_once($includeFile);
				} else {
					echo ("Script Not Found");
				}
			}
			?>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<script>
								document.write(new Date().getFullYear())
							</script> © SmartTrade.
						</div>
					</div>
				</div>
			</footer>
		</div>
		<!-- end main content-->

	</div>
	<!-- END layout-wrapper -->

	<!-- Right Sidebar -->
	<div class="right-bar">
		<div data-simplebar class="h-100">

			<div class="rightbar-title d-flex align-items-center px-3 py-4">

				<h5 class="m-0 me-2">Settings</h5>

				<a href="javascript:void(0);" class="right-bar-toggle ms-auto">
					<i class="mdi mdi-close noti-icon"></i>
				</a>
			</div>



			<!-- Settings -->
			<hr class="mt-0" />
			<h6 class="text-center mb-0">Choose Layouts</h6>

			<div class="p-4">
				<div class="mb-2">
					<img src="../minible/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
				</div>
				<div class="form-check form-switch mb-3">
					<input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" />
					<label class="form-check-label" for="light-mode-switch">Light Mode</label>
				</div>

				<div class="mb-2">
					<img src="../minible/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
				</div>
				<div class="form-check form-switch mb-3">
					<input type="checkbox" checked class="form-check-input theme-choice" id="dark-mode-switch" data-bsStyle="../minible/css/bootstrap-dark.min.css" data-appStyle="../minible/css/app-dark.min.css" />
					<label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
				</div>

				<div class="mb-2">
					<img src="../minible/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
				</div>
				<div class="form-check form-switch mb-5">
					<input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch" data-appStyle="../minible/css/app-rtl.min.css" />
					<label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
				</div>


			</div>

		</div> <!-- end slimscroll-menu-->
	</div>
	<!-- /Right-bar -->

	<!-- Right bar overlay-->
	<div class="rightbar-overlay"></div>
	<script src="../minible/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../minible/libs/simplebar/simplebar.min.js"></script>
	<script src="../minible/libs/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="../minible/libs/jquery.counterup/jquery.counterup.min.js"></script>
	<!-- Datatable init js -->
	<script src="../minible/js/pages/dashboard.init.js"></script>
	<script src="../minible/js/pages/datatables.init.js"></script>
	<script src="../minible/js/app.js"></script>

	<!-- init js -->
	<script src="../minible/js/pages/form-advanced.init.js"></script>

	<!-- Sweet Alerts js -->

	<!-- Sweet alert init js-->
	<script src="../minible/js/pages/sweet-alerts.init.js"></script>
	<script src="../minible/js/custom.js"></script>
	<script>
		function copyreff() {
			var copyText = document.getElementById("reflink");
			copyText.select();
			copyText.setSelectionRange(0, 99999)
			document.execCommand("copy");
			alert("Copied: " + copyText.value);
		}
	</script>
</body>

</html>