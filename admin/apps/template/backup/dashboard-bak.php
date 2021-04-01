<style>
  .yt-size iframe {
    width: 457px !important;
    height: 304px !important;
  }

  /* .carousel-inner .carousel-item img {
    width: 457px !important;
    height: 304px !important;
  } */

  @media(max-width: 1000px) {
    .yt-size iframe {
      width: 320px !important;
      height: 304px !important;
    }
  }

  @media(min-width: 1400px) {
    .yt-size iframe {
      width: 540px !important;
      height: 304px !important;
    }

    /* .carousel-inner .carousel-item img {
      width: 800px !important;
      height: 304px !important;
    } */

  }
</style>

<?php
// showing total invest users
$total_invest_query = 'SELECT SUM(paket_invest), COUNT(invest_status) FROM trading WHERE invest_status="Active"';
$get_total_invest = mysqli_query($con, $total_invest_query);
$res_total_invest = mysqli_fetch_array($get_total_invest);

// showing saldo invest users
$total_invest_refund = 'SELECT SUM(saldo_invest) AS total_profit, COUNT(saldo_invest > 0) FROM users';
$get_invest_refund = mysqli_query($con, $total_invest_refund);
$res_invest_refund = mysqli_fetch_assoc($get_invest_refund);

// showing total users saldo invest
$count_users_invest = 'SELECT COUNT(saldo_invest) AS total_users FROM users WHERE saldo_invest > 0';
$get_user_count = mysqli_query($con, $count_users_invest);
$res_user_count = mysqli_fetch_assoc($get_user_count);

// showing total main balance (saldo utama)
$sum_main_balance = "SELECT SUM(saldo_aktif) AS main_balance, COUNT(saldo_aktif) AS count_user FROM users";
$get_main_balance = mysqli_query($con, $sum_main_balance);
$res_main_balance = mysqli_fetch_assoc($get_main_balance);

// shwoing total pending wd main balance (saldo utama)
$sum_pending_wd_main = "SELECT SUM(wd_beforefee) AS wd_currency, COUNT(wd_beforefee) AS wd_users FROM withdraw WHERE status_wd='Pending'";
$get_pending_wd_main = mysqli_query($con, $sum_pending_wd_main);
$res_pending_wd_main = mysqli_fetch_assoc($get_pending_wd_main);

$sum_pending_wd_profit = "SELECT SUM(wd_beforefee) AS wd_currency, COUNT(wd_beforefee) AS wd_users FROM withdraw_invest WHERE status_wd='Pending'";
$get_pending_wd_profit = mysqli_query($con, $sum_pending_wd_profit);
$res_pending_wd_profit = mysqli_fetch_assoc($get_pending_wd_profit);

?>

<!-- card view -->
<div class="container">
  <div class="row">
    <!-- showing total invest users -->
    <div class="col-md-12 col-xl-4">
      <div class="card text-white bg-success">
        <div class="card-body">
          <h4 class="card-title">Total Invest Users</h4>
          <div class="row">
            <div class="col-6">
              <i class="fa fa-area-chart fa-3x"></i>
            </div>
            <div class="col-6" style="text-align: right;">
              <h3>$ <?= number_format($res_total_invest[0], 0, '', '.') ?></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-6">Active Users</div>
            <div class="col-6" style="text-align: right;"><?= $res_total_invest[1] ?> Users</div>
          </div>
        </div>
      </div>
    </div>
    <!-- end showing total invest users -->
    <!-- // showing saldo invest users -->
    <div class="col-md-12 col-xl-4">
      <div class="card text-white bg-success">
        <div class="card-body">
          <h4 class="card-title">Total Profit Invest and Refund</h4>
          <div class="row">
            <div class="col-6">
              <i class="ion ion-cash" style="font-size:3em;"></i>
            </div>
            <div class="col-6" style="text-align: right;">
              <h3>$ <?= number_format($res_invest_refund['total_profit'], 0, '', '.') ?></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-6">Total Users Investment</div>
            <div class="col-6" style="text-align: right;"><?= $res_user_count['total_users'] ?> Users</div>
          </div>
        </div>
      </div>
    </div>
    <!-- // end showing saldo invest users -->
    <!-- showing total main balance (saldo utama) -->
    <div class="col-md-12 col-xl-4">
      <div class="card text-white bg-success">
        <div class="card-body">
          <h4 class="card-title">Total Main Balance Users</h4>
          <div class="row">
            <div class="col-6">
              <i class="fa fa-usd fa-3x"></i>
            </div>
            <div class="col-6" style="text-align: right;">
              <h3>$ <?= number_format($res_main_balance['main_balance'], 0, '', '.') ?></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-6">Active Users</div>
            <div class="col-6" style="text-align: right;"><?= $res_main_balance['count_user'] ?> Users</div>
          </div>
        </div>
      </div>
    </div>
    <!-- end showing total main balance (saldo utama) -->
  </div>
  <div class="row">
    <!-- shwoing total pending wd main balance (saldo utama) -->
    <div class="col-md-12 col-xl-4">
      <div class="card text-white bg-success">
        <div class="card-body">
          <h4 class="card-title">Total Pending Withdraw Main Balance Users</h4>
          <div class="row">
            <div class="col-6">
              <i class="fa fa-clock-o fa-3x"></i>
            </div>
            <div class="col-6" style="text-align: right;">
              <h3>$ <?= number_format($res_pending_wd_main['wd_currency'], 0, '', '.') ?></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-6">Pending Withdraws</div>
            <div class="col-6" style="text-align: right;"><?= $res_pending_wd_main['wd_users'] ?> Users</div>
          </div>
        </div>
      </div>
    </div>
    <!-- end shwoing total pending wd main balance (saldo utama) -->
    <!-- shwoing total pending wd proifit & refund -->
    <div class="col-md-12 col-xl-4">
      <div class="card text-white bg-success">
        <div class="card-body">
          <h4 class="card-title">Total Pending Withdraw Profit & Refund Users</h4>
          <div class="row">
            <div class="col-6">
              <i class="fa fa-clock-o fa-3x"></i>
            </div>
            <div class="col-6" style="text-align: right;">
              <h3>$ <?= number_format($res_pending_wd_profit['wd_currency'], 0, '', '.') ?></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-6">Pending Withdraws</div>
            <div class="col-6" style="text-align: right;"><?= $res_pending_wd_profit['wd_users'] ?> Users</div>
          </div>
        </div>
      </div>
    </div>
    <!-- end shwoing total pending wd proifit & refund -->
  </div>
</div>


<!-- COL END -->
<!-- end card view -->

<?php
$quinfo = "select * from information";
$rsinfo = mysqli_query($con, $quinfo);
$rwinfo = mysqli_fetch_array($rsinfo);

?>
<div class="col-md-12 col-xl-12">
  <div class="card ">
    <div class="card-header text-white bg-warning-gradient">
      <h3 class="card-title"><?= $rwinfo['title'] ?></h3>
      <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div>
    </div>
    <div class="card-body"><?= $rwinfo['description'] ?></div>
    <div class="card-footer"></div>
  </div>
</div>

<div class="container">
  <div class="row">
    <!-- banners -->
    <!-- bug bagian ini -->
    <?php
    $quinfo = "select * from banners";
    $rsinfo = mysqli_query($con, $quinfo);

    $quinfo1 = "select * from banners";
    $rsinfo1 = mysqli_query($con, $quinfo1);

    ?>
    <div class="col-md-12 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Banners</h3>
        </div>
        <div class="card-body">
          <div id="carousel-indicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <?php $i = 1;
              while ($rwinfo = mysqli_fetch_array($rsinfo)) : ?>
                <li data-target="#carousel-indicators" data-id="<?= $rwinfo['autono']; ?>" id="indicator-<?= $i; ?>" data-slide-to="<?= $i - 1; ?>"></li>
                <?php $i++ ?>
              <?php endwhile; ?>
            </ol>
            <div class="carousel-inner">
              <?php $i = 1;
              while ($gambar = mysqli_fetch_array($rsinfo1)) : ?>
                <div class="carousel-item" id="banner-<?= $i; ?>">
                  <img class="d-block w-100" alt="gambar-banners" src="../assets/images/banners/<?= $gambar['nama_gambar']; ?>" data-holder-rendered="true">
                </div>
                <?php $i++ ?>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end banners -->

    <!-- youtube -->
    <?php
    $quinfo = "SELECT iframe_link FROM youtube_streaming";
    $rsinfo = mysqli_query($con, $quinfo);
    $rwinfo = mysqli_fetch_array($rsinfo);
    ?>
    <div class="col-md-12 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Live Stream Youtube</h3>
        </div>
        <div class="card-body yt-size">
          <?php if (empty($rwinfo['iframe_link'])) : ?>
            <img src="../assets/images/banners/video_unavailable.jpeg" alt="video_unavailable.jpeg">
          <?php else : ?>
            <?= $rwinfo['iframe_link']; ?>
          <?php endif ?>
        </div>
      </div>
    </div>
    <!-- end youtube -->
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#indicator-1').addClass('active');
    $('#banner-1').addClass('active');
  });
</script>