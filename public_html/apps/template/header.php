<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Minible - Admin & Dashboard Template</title>
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
    <!-- App Css-->
    <link href="../minible/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

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
        <div class="col">
            <div class="preloader">

                <div class="spinner-grow text-primary m-1" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-secondary m-1" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-success m-1" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info m-1" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-warning m-1" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-danger m-1" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- GLOBAL-LOADER -->

        <!-- /GLOBAL-LOADER -->
        <header id="page-topbar">
            <?php include('navbar.php') ?>
        </header>
        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            <?php include('left-sidebar.php') ?>
            <!-- Left Sidebar End -->
        </div>



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">


            <!-- End Page-content -->