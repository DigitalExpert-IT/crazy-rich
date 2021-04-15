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

<div class="row">
  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="card-order">
          <h6 class="mb-2">Total Referral</h6>
          <h2 class="text-right "><i class="mdi mdi-account-multiple-plus icon-size float-left text-primary text-primary-shadow"></i><span><?= totreff($_SESSION['user_id']) ?></span></h2>
          <p class="mb-0">Referal This Month<span class="float-right"><?= monthref($_SESSION['user_id']) ?></span></p>
        </div>
      </div>
    </div>
  </div>
  <!-- COL END -->
  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
    <div class="card ">
      <div class="card-body">
        <div class="card-widget">
          <h6 class="mb-2">Total Referral Bonus</h6>
          <h2 class="text-right"><i class="mdi mdi-account-cash icon-size float-left text-success text-success-shadow"></i><span><?= angka(totbonus($_SESSION['user_id'])) ?></span></h2>
          <p class="mb-0">Monthly Ref Bonus<span class="float-right"><?= dolar(totbonus($_SESSION['user_id'])) ?></span></p>
        </div>
      </div>
    </div>
  </div>
  <!-- COL END -->
  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="card-widget">
          <h6 class="mb-2">Total Profit & Refund</h6>
          <h2 class="text-right"><i class="icon-size mdi mdi-square-inc-cash   float-left text-warning text-warning-shadow"></i><span><?= angka(profitInvest($_SESSION['user_id'])) ?></span></h2>
          <p class="mb-0">Monthly Profit<span class="float-right"><?= dolar(totprofitmonth($_SESSION['user_id'])) ?></span></p>
        </div>
      </div>
    </div>
  </div>
  <!-- COL END -->
  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
    <div class="card ">
      <div class="card-body">
        <div class="card-widget">
          <h6 class="mb-2">Total Investment</h6>
          <h2 class="text-right"><i class="mdi mdi-briefcase-clock icon-size float-left text-danger text-danger-shadow"></i><span><?= totalinvestment($_SESSION['user_id']) ?></span></h2>
          <p class="mb-0">Active Investment<span class="float-right"><?= activeinvestment($_SESSION['user_id']) ?></span></p>
        </div>
      </div>
    </div>
  </div>
  <!-- COL END -->
</div>
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
                <img class="d-block w-100" alt="gambar-banners" src="http://putin.smarttrade.top/assets/images/banners/<?= $gambar['nama_gambar']; ?>" data-holder-rendered="true">
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
          <img src="http://putin.smarttrade.top/assets/images/banners/video_unavailable.jpeg" alt="video_unavailable.jpeg">
        <?php else : ?>
          <?= $rwinfo['iframe_link']; ?>
        <?php endif ?>
      </div>
    </div>
  </div>
  <!-- end youtube -->
</div>

<script>
  $(document).ready(function() {
    $('#indicator-1').addClass('active');
    $('#banner-1').addClass('active');
  });
</script>