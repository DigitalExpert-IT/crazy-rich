    <!-- Main content -->
    <section class="content">

    <div class="row">
    <?php 
	$qupaket="select * from master_invest";
	$rspaket=mysqli_query($con,$qupaket);
	$x=0;
	while($rwpaket=mysqli_fetch_array($rspaket)){ $x++;
                                                 
    $qucekinvest="select * from trading where paket_id='$rwpaket[code_produk]' and invest_status='Active' and user_id='$_SESSION[user_id]'";
    $rsinvest=mysqli_query($con,$qucekinvest);
    $rwinvest=mysqli_fetch_array($rsinvest);
    $cek=$rwinvest['paket_id'];
                                                 
    $totalinvest="select sum(paket_invest) as totalinvest from trading where paket_id='$rwpaket[code_produk]'  and invest_status='Active' ";
    $rstotinvest=mysqli_query($con,$totalinvest);
    $rwtotinvest=mysqli_fetch_array($rstotinvest);
    $totalinvestmnet=$rwtotinvest['totalinvest'];
	
	
	 ?><div class="col-sm-6 col-xl-3">
								<div class="card">
									<div class="card-status bg-success"></div>
									<div class="card-body text-center">
										<div class="card-category"><?=$rwpaket['nama_produk']?></div>
										<div class="display-7 my-4">Minimum Invest <?=dolar($rwpaket['invest_total']);?></div>
                                        <!-- <div class="display-7 my-4">Total Investment by all Users <?=dolar($totalinvestmnet);?></div> -->
										<ul class="list-unstyled leading-loose">
											<li>Get <?=$rwpaket['profit_persen']?> Daily</li>
											<li><i class="fe fe-check text-success mr-2"></i> <?=$rwpaket['contract_days']?> days contract circle</li>
                                            <li><i class="fe fe-user text-success mr-2"></i> Investor ID: <?php if($cek ==''){ echo '******';} else { echo $rwpaket['id_investor'];}?></li>
                                            <li><i class="fe fe-lock text-success mr-2"></i>Investor Password:<?php if($cek ==''){ echo '******';} else { echo $rwpaket['password_investor'];}?></li>
											
										</ul>
                    <?php
                    if($rwpaket['code_produk'] == 'S1' || $rwpaket['code_produk'] == 'S2') :
                    ?>
                    <div class="text-center mt-6">
                                         <a onClick="pakets('<?=$rwpaket['code_produk']?>')" href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#trade"><?=$rwpaket['nama_produk']?> <i class="fa fa-arrow-circle-right"></i></a>
											
                    </div>
                    <?php
                    else :
                    ?>
                    <div class="text-center mt-6">
                      <button disabled class="btn btn-success btn-block"><?=$rwpaket['nama_produk']?> <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    <?php
                    endif;
                    ?>
									</div>
								</div>
							</div>
     
                                    
         
         <? } ?>
        </div>

    </section>
    <!-- /.content -->

    <!-- wd section -->
    <div class="col-md-12">
  <div class="mb-5 mt-5" style="background: #30304d; border-radius:8px;box-shadow: 0 0 0 1px #30304d, 0 8px 16px 0 #30304d;">
    <span class=" info-box-icon" style="background: #30304d;">
      <i class="on ion-card">
      </i>
    </span>
    <div class="info-box-content">
      <span class="info-box-text ">Profit & Reffund
      </span>
      <span class="info-box-number font-weight-bold">
        <?= dolar(profitInvest($_SESSION['user_id'])) ?>
      </span>
      <div class="dropdown-divider">
        <div class="progress-bar" style="width: 100%">
        </div>
      </div>
      <?php

      // pending
      // $qupending = "select * from deposit where user_id='$_SESSION[user_id]' and status='Pending'";
      // $rspending = mysqli_query($con, $qupending);
      // $rwpending = mysqli_fetch_array($rspending);
      // $depositid = $rwpending['order_id'];
      // $qucekwal = "select * from users where user_id='$_SESSION[user_id]'";
      // $rscekwal = mysqli_query($con, $qucekwal);
      // $rwcekwal = mysqli_fetch_array($rscekwal);

      // get adrress admin
      $qaddres = "SELECT value FROM master_seting WHERE autono=5";
      $paddress = mysqli_query($con, $qaddres);
      $resadd = mysqli_fetch_array($paddress);
      $resadd = $resadd['value'];

      ?>
      <span class="progress-description">

        <button onClick="loadaddress('<?= $_SESSION['user_id'] ?>')" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#trasfer">
          <i class="mdi mdi-briefcase-download">
          </i> Withdraw
        </button>

      </span>
    </div>
    <!-- /.info-box-content -->
  </div>
</div>
    <!-- end wd section -->

     <div class="card">
    <div class="card-header">
      <h6 class="card-title"><i class="mdi mdi-cash-usd"></i> Take Out Investment</h6>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="table-responsive">
     <tbody>
        <table id="pending" class="table table-bordered table-hover" style="width:100%">
          <thead>
            <tr>
             <th>Invest Date</th>
              <th>Contract ID</th>
             <th>Type</th>
              <th>Amount</th>
             
               <th>Status</th>
              <th>Action</th>
			 
            </tr>
          </thead>
         <tfoot>
        <?php
             
          $qustopinvest="select * from trading where invest_status='Active' and profit='0' and user_id ='$_SESSION[user_id]'";
             $rsstopinvest=mysqli_query($con,$qustopinvest);
            while($rwstopinvest=mysqli_fetch_array($rsstopinvest)){
           echo  $rwtotinvest['contract_id'];
             ?>
          <tr>
              <td><?=tanggal($rwstopinvest['date_update']);?></td>
              <td><?=$rwstopinvest['contract_id']?></td>
              <td><?=paket($rwstopinvest['paket_id'])?></td>
              <td><?=dolar($rwstopinvest['paket_invest'])?></td>
              <td><?=$rwstopinvest['invest_status']?></td>
             
                <td><button onClick="stopinvest(<?=$rwstopinvest['autono']?>)" class="btn btn-md btn-success" data-toggle="modal" data-target="#wd">Stop</button></td>
            </tr>
        <? } ?>
            </tfoot>
         </tbody>
         
        </table>
        

      </div>
    </div>
    <!-- /.card-body --> 
  </div>
 
  <div class="card">
    <div class="card-header">
  <h6 class="card-title"><i class="fa fa-bar-chart"></i> Investment Transaction</h6>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="myreff" class="table table-bordered table-hover dataTable" style="width:100%">
          <thead>
            <tr>
              <th>Invest Date</th>
              <th>Contract ID</th>
             <th>Type</th>
              <th>Amount</th>
              <th>Investment</th>
              <th>Left Days</th>
               <th>Status</th>
            </tr>
          </thead>
         
        </table>
      </div>
    </div>
    <!-- /.card-body --> 
  </div>
  <!-- /.card --> 


  <div class="card">
  <div class="card-header">
    <h6 class="card-title">
      <i class="mdi mdi-history">
      </i> Withdraw History
    </h6>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="table-responsive">
      <table id="historywd" class="table table-bordered table-hover dataTable" style="width:100%">
        <thead>
          <tr>
            <th>Date
            </th>
            <th>Withdraw ID
            </th>
            <th>Withdraw Invest
            </th>
            <th>Amount Withdraw
            </th>
            <th>Status
            </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <!-- /.card-body -->
</div>
  <!-- /.card --> 

  <div class="modal fade" id="trade">
    <div class="modal-dialog modal-sm">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
       <div class="modal-header">
         <img src="../assets/images/logo/Crazy_richLOGO_COLOR.png" alt="Genesis Trade Logo" class="avatar-md bradius mr-1">
      <h3 class="modal-title w-100 text-center font-weight-light"> Crazy Rich Trading</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <input hidden="" name="id_tf" id="id_tf" value="">
          <input hidden name="min_inv" id="min_inv" value="">
          <div class="form-group">
            <label for="nama">Total Invest:</label>
            <input  type="number" min="" name="totinvest" class="form-control" id="invest">
          </div>
          <div class="form-group">
            <label for="profits">Profit %:</label>
            <input readonly type="text" name="profits" class="form-control" id="profit">
          </div>
          
          <div class="form-group">
            <label for="days">Days Contract:</label>
            <input readonly type="text" name="days" class="form-control" id="days">
          </div>
         
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn bg-secondary-gradient" style="color: white;" data-dismiss="modal">Close</button>
          <button type="button" onClick="process()" class="btn bg-warning-gradient" style="color: white;">Process</button>
        </div>
      </div>
    </div>
  </div>


  <!-- modal wd investmen -->
  <div class="modal fade" id="trasfer">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <img src="../assets/images/logo/Crazy_richLOGO_COLOR.png" alt="Genesis Trade Logo" class="avatar-md bradius">
          <h3 class="modal-title w-100 text-center font-weight-light"> Investment Withdraw
          </h3>
          <button type="button" class="close" data-dismiss="modal">&times;
          </button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <input hidden="" name="id_tf" id="id_tf" value="">

          <div class="form-group">
            <label for="email">Amount:
            </label>
            <input type="number" step="any" onkeyup="cekfeewd()" name="beforefee" class="form-control" id="wd">
          </div>
          <div class="form-group">
            <label for="email">Fee Withdraw $ :
            </label>
            <input readonly="readonly" type="number" step="any" name="feewd" class="form-control" id="feewd">
          </div>
          <div class="form-group">
            <label for="email">Total Withdraw USD:
            </label>
            <input readonly type="number" step="any" name="amountwd" class="form-control" id="amountwd">
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" onClick="processwd()" class="btn btn-warning">Withdraw
          </button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- /modal wd investmen -->

  <?php
  $qufee = "select value from master_seting where nama_seting='fee_kurs'";
  $rsfee = mysqli_query($con, $qufee);
  $rwfees = mysqli_fetch_array($rsfee);
  $feewd = $rwfees['value'];
  
  ?>

<script>
 $(document).ready(function() {
  var table =  $('#myreff').DataTable( {
        "processing": true,
        "serverSide": true,
		"ajax":"mod/trade/history.php",
		"order": [[ 0, "desc" ]]
		
    } );
    setInterval(function(){
      table.ajax.reload();
    }, 30000);
	
	
	
	
} );


</script>

<script>
var i =0;
var p= 0;
var d =0;

 function pakets(id_paket) {
  var id= id_paket;
  if(id != '')
  {
   $.ajax({
    url:"mod/trade/product.php",
    method:"POST",
    data:{id:id},
    dataType:"JSON",
    success:function(data)
    {
		
	pid=data.produk_id;
	i=data.invest_total;
	p=data.profit_persen;
	d=data.contract_days;
	  document.getElementById("invest").value =data.invest_total;
	  document.getElementById("profit").value =data.profit_persen;
   	  document.getElementById("days").value =data.contract_days;
    document.getElementById("invest").setAttribute("min",data.invest_total); 
    document.getElementById("min_inv").value= data.invest_total; 
     
    }
   })
  }
  else
  {
  
   
  }
 };

// function wd invesment
 function cekfeewd() {
    fee = 0;
    wd = document.getElementById("wd").value;
    fee = wd * <?= $feewd ?> / 100;
    amountwd = wd - fee;
    document.getElementById("feewd").value = fee.toFixed(2);
    document.getElementById("amountwd").value = amountwd.toFixed(2);

  }

  function processwd() {
    $.ajax({
      url: "mod/trade/data/withdraw.php",
      method: "POST",
      data: {
        feewd: fee,
        beforefee: wd,
        amountwd: amountwd
      },
      dataType: "JSON",
      success: function(data) {
        if (data.status == 'Success') {
          alert('Withdraw Success');
          location.reload();
        } else {
          alert('Withdraw Failed Your Balance influence');
          location.reload();
        }
      }
    });
  }
  

  $(document).ready(function() {
    var table_wd = $('#historywd').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [[ 0, "desc" ]],
      "ajax": "mod/trade/data/wd_dt.php"


    });
    setInterval(function(){
      table_wd.ajax.reload();
    },30000);
  });

  // endfunction wd invesment
 
 
  function process() {	 
     
      
var investasi= document.getElementById("invest").value;
var i= document.getElementById("min_inv").value;
console.log([investasi, i]);
      if(parseInt(investasi)<parseInt(i)){
          alert("Please input Minimum investment or more");
      } else {
   $.ajax({
    url:"mod/trade/invest.php",
    method:"POST",
    data:{totinvest:investasi,profits:p,days:d,idpaket:pid},
    dataType:"JSON",
	success:function(data)
    {
		alert(data.status);
		location.reload();
	}
   })
 
 };
  }
    
    function stopinvest(iv) {
  var txt;
  if (confirm("Are you sure for stop this investmetn? Balance will add to your wallet balance")) {
    alert("You pressed OK!");
      $.ajax({
    url:"mod/trade/stopinvest.php",
    method:"POST",
    data:{num:iv},
    dataType:"JSON",
	success:function(data)
    {
		alert(data.status);
		location.reload();
	}
   })
  } else {
    alert("You pressed Cancel!");
  }
  
}
</script>

  