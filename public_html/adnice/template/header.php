<!doctype html>
<html lang="en" dir="ltr">
<head>

<!-- META DATA -->
<meta charset="UTF-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="">

<!-- FAVICON -->
<link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico?v=2" />

<!-- TITLE -->
<title>Admin Dashboard Genesis</title>

<!-- BOOTSTRAP CSS -->
<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

<!-- STYLE CSS -->
<link href="../assets/css/style.css" rel="stylesheet"/>
<link href="../assets/css/skin-modes.css" rel="stylesheet"/>
<link href="../assets/css/dark-style.css" rel="stylesheet"/>

<!--HORIZONTAL CSS-->
<link href="../assets/plugins/horizontal-menu/horizontal-menu.css" rel="stylesheet" />

<!-- SINGLE-PAGE CSS -->
<link href="../assets/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">

<!--C3 CHARTS CSS -->
<link href="../assets/plugins/charts-c3/c3-chart.css" rel="stylesheet"/>

<!-- CUSTOM SCROLL BAR CSS-->
<link href="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

<!--- FONT-ICONS CSS -->
<link href="../assets/css/icons.css" rel="stylesheet"/>

<!-- SIDEBAR CSS -->
<link href="../assets/plugins/sidebar/sidebar.css" rel="stylesheet">

<!-- COLOR SKIN CSS -->
<link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/colors/color1.css" />

<!-- DATA TABLE CSS -->
<link href="../assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet"/>

<!-- JQUERY JS -->
<script src="../assets/js/jquery-3.4.1.min.js"></script>
</head>

<body>

<!-- GLOBAL-LOADER -->
<div id="global-loader"> <img src="../assets/images/loader.svg" class="loader-img" alt="Loader"> </div>
<!-- /GLOBAL-LOADER --> 

<!-- PAGE -->
<div class="page">
<div class="page-main">
<?php $qucron="select * from profit_time where cron_id='1'";
	  $rscron=mysqli_query($con,$qucron);
	  $rwcron=mysqli_fetch_array($rscron);?>

<!-- HEADER -->
<div class="header hor-header">
  <div class="container">
    <div class="d-flex"> <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a>
      <div class=""> <a class="header-brand1" href="index.html"> <img src="../assets/images/brand/logo-3.png" class="header-brand-img desktop-logo" alt="logo"> <img src="../assets/images/brand/logo.png" class="header-brand-img light-logo" alt="logo"> </a><!-- LOGO -->
 <span>Last Cron Profit: <?=$rwcron['last_profit']?></span>	  
      </div>
	 
      <div class="d-flex  ml-auto header-right-icons header-search-icon">
        <div class="dropdown d-md-flex"> <a class="nav-link icon full-screen-link nav-link-bg"> <i class="fe fe-maximize fullscreen-button"></i> </a> </div>
        <!-- FULL-SCREEN -->
        
        <div class="dropdown profile-1"> <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex"> <span> <img src="../assets/images/users/10.jpg" alt="profile-user" class="avatar  profile-user brround cover-image"> </span> </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <div class="drop-heading">
              <div class="text-center">
                
                <small class="text-muted"><?=$_SESSION['email_admin']?></small> </div>
            </div>
            <div class="dropdown-divider m-0"></div>
           
             <a class="dropdown-item" href="logout.php"> <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out </a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End HEADER --> 

<!--/Horizontal-main -->
<div class="horizontal-main hor-menu clearfix">
  <div class="horizontal-mainwrapper container clearfix"> 
    <!--Nav-->
    <nav class="horizontalMenu clearfix">
      <ul class="horizontalMenu-list">
        
        <li aria-haspopup="true"><a href="?mod=users&cmd=index" class="<?php if($_GET['mod']=='users'){ echo 'active'; }?>"><i class="ti-user"></i> Users</a></li>
        <li aria-haspopup="true"><a href="?mod=deposit&cmd=index" class="sub-icon <?php if($_GET['mod']=='deposit'){ echo 'active'; }?>"><i class="ti-wallet"></i>Deposit </a> </li>
        <li aria-haspopup="true"><a href="?mod=withdraw&cmd=index" class="sub-icon <?php if($_GET['mod']=='withdraw'){ echo 'active'; }?>"><i class="ti-agenda"></i> Withdraw </a> </li>
        <li aria-haspopup="true"><a href="?mod=trade&cmd=index" class="sub-icon <?php if($_GET['mod']=='trade'){ echo 'active'; }?>"><i class="ti-package"></i>Trading Investment </a> </li>
		<li aria-haspopup="true"><a href="?mod=profit&cmd=index" class="sub-icon <?php if($_GET['mod']=='profit'){ echo 'active'; }?>"><i class="ti-money"></i> Daily Profit Seting </i></a> </li>
		
        <li aria-haspopup="true"><a href="?mod=transaction&cmd=index" class="sub-icon <?php if($_GET['mod']=='transaction'){ echo 'active'; }?>"><i class="ti-files"></i> All Transaction </i></a> </li>
        <li aria-haspopup="true"><a href="?mod=setting&cmd=index" class="sub-icon <?php if($_GET['mod']=='setting'){ echo 'active'; }?>"><i class="ti-panel"></i> Settings </i></a> </li>
     <li aria-haspopup="true"><a href="?mod=information&cmd=index" class="sub-icon <?php if($_GET['mod']=='information'){ echo 'active'; }?>"><i class="ti-panel"></i> News &amp;Information </i></a> </li>
		
		 
      </ul>
    </nav>
    <!--Nav--> 
  </div>
</div>
<!--/Horizontal-main --> 

<!-- Mobile Header -->
<div class="mobile-header hor-mobile-header">
  <div class="container">
    <div class="d-flex"> <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a> <a class="header-brand" href="index.html"> <img src="../assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo"> <img src="../assets/images/brand/logo-3.png" class="header-brand-img desktop-logo mobile-light" alt="logo"> </a>
      <div class="d-flex order-lg-2 ml-auto header-right-icons">
        <button class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
									aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon fe fe-more-vertical text-white"></span> </button>
        <div class="dropdown profile-1"> <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex"> <span> <img src="../assets/images/users/10.jpg" alt="profile-user" class="avatar  profile-user brround cover-image"> </span> </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <div class="drop-heading">
              <div class="text-center">
                <h5 class="text-dark mb-0">Elizabeth Dyer</h5>
                <small class="text-muted">Administrator</small> </div>
            </div>
            <div class="dropdown-divider m-0"></div>
            <a class="dropdown-item" href="#"> <i class="dropdown-icon mdi mdi-account-outline"></i> Profile </a> <a class="dropdown-item" href="#"> <i class="dropdown-icon  mdi mdi-settings"></i> Settings </a> <a class="dropdown-item" href="#"> <span class="float-right"></span> <i class="dropdown-icon mdi  mdi-message-outline"></i> Inbox </a> <a class="dropdown-item" href="#"> <i class="dropdown-icon mdi mdi-comment-check-outline"></i> Message </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"> <i class="dropdown-icon mdi mdi-compass-outline"></i> Need help? </a> <a class="dropdown-item" href="login.html"> <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out </a> </div>
        </div>
        <div class="dropdown d-md-flex header-settings"> <a href="#" class="nav-link icon " data-toggle="sidebar-right" data-target=".sidebar-right"> <i class="fe fe-align-right"></i> </a> </div>
        <!-- SIDE-MENU --> 
      </div>
    </div>
  </div>
</div>
<div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-md-none bg-white">
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <div class="d-flex order-lg-2 ml-auto">
      <div class="dropdown d-md-flex"> <a class="nav-link icon full-screen-link nav-link-bg"> <i class="fe fe-maximize fullscreen-button"></i> </a> </div>
      <!-- FULL-SCREEN --> 
      
    </div>
  </div>
</div>
<!-- /Mobile Header --> 

<!--app-content open-->
<div class="container app-content">
<div class="p-15 col-md-12"></div>
