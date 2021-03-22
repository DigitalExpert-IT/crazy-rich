 <div class="card">
    <div class="card-header">
      <h6 class="card-title"><i class="mdi mdi-cash-usd"></i> Master Investment</h6>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="table-responsive">
     <tbody>
        <table id="pending" class="table table-bordered table-hover" style="width:100%">
          <thead>
            <tr>
             <th>Name Package</th>
             <th>Amount Invest</th>
             <th>Profit %</th>
              <th>Contract Days</th>
              <th>Action</th>
            </tr>
          </thead>
         <tfoot>
         <?php 
		  $mastertrade="select * from master_invest";
				  $rsmastertrade=mysqli_query($con,$mastertrade);
				  while($rwmastertrade=mysqli_fetch_array($rsmastertrade)){
		 ?>
          <tr>
             
              <td><?=$rwmastertrade['nama_produk']?></td>
              <td><?=$rwmastertrade['invest_total']?></td>
              <td><?=$rwmastertrade['profit_persen']?></td>
              <td><?=$rwmastertrade['hari_kontrak']?></td>
              
                <td><button data-toggle="modal" data-target="#trade" onClick="pakets('<?=$rwmastertrade['code_produk']?>')" class="btn btn-sm btn-primary">Action</button></td>
            </tr>
            <?php } ?>
            </tfoot>
         </tbody>
         
        </table>
        

      </div>
    </div>
    <!-- /.card-body --> 
  </div>
  
  <div class="card">
    <div class="card-header">
      <h6 class="card-title"><i class="mdi mdi-cash-usd"></i> Master Settings</h6>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="table-responsive">
     <tbody>
        <table id="pending" class="table table-bordered table-hover" style="width:100%">
          <thead>
            <tr>
             <th>Referral %</th>
             <th>Description</th>
             <th>Action</th>
              
            </tr>
          </thead>
         <tfoot>
         <?php 
		  $qupending="select * from master_seting where nama_seting='reff_persen' "; 
				  $rspending=mysqli_query($con,$qupending);
				  while($rwpending=mysqli_fetch_array($rspending)){
		 ?>
          <tr>
              <td><?=$rwpending['value']?></td>
              <td><?=$rwpending['keterangan_seting']?></td>
                <td><button data-toggle="modal" data-target="#reff"  class="btn btn-sm btn-primary">Action</button></td>
            </tr>
            <?php } ?>
            </tfoot>
         </tbody>
         
        </table>
        

      </div>
    </div>
	
	<div class="card-body">
    <div class="table-responsive">
     <tbody>
        <table id="pending" class="table table-bordered table-hover" style="width:100%">
          <thead>
            <tr>
             <th>Fee Withdraw %</th>
             <th>Description</th>
             <th>Action</th>
              
            </tr>
          </thead>
         <tfoot>
         <?php 
		  $qupending="select * from master_seting where nama_seting='wd_persen' ";
				  $rspending=mysqli_query($con,$qupending);
				  while($rwpending=mysqli_fetch_array($rspending)){
		 ?>
          <tr>
              <td><?=$rwpending['value']?></td>
              <td><?=$rwpending['keterangan_seting']?></td>
                <td><button data-toggle="modal" data-target="#wdfeemod"  class="btn btn-sm btn-primary">Action</button></td>
            </tr>
            <?php } ?>
            </tfoot>
         </tbody>
         
        </table>
        

      </div>
    </div>

<div class="card-body">
    <div class="table-responsive">
     <tbody>
        <table id="pending" class="table table-bordered table-hover" style="width:100%">
          <thead>
            <tr>
             <th>Rate IDR</th>
             <th>Description</th>
             <th>Action</th>
              
            </tr>
          </thead>
         <tfoot>
         <?php 
		  $qupending="select * from master_seting where nama_seting='rate_rupiah' ";
				  $rspending=mysqli_query($con,$qupending);
				  while($rwpending=mysqli_fetch_array($rspending)){
		 ?>
          <tr>
              <td><?=$rwpending['value']?></td>
              <td><?=$rwpending['keterangan_seting']?></td>
                <td><button data-toggle="modal" data-target="#rateidr"  class="btn btn-sm btn-primary">Action</button></td>
            </tr>
            <?php } ?>
            </tfoot>
         </tbody>
         
        </table>
        

      </div>
    </div>
    <!-- /.card-body --> 
  </div>
  
  
  
  
   <div class="modal fade" id="trade">
    <div class="modal-dialog modal-sm">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
       <div class="modal-header">
         <img src="../img/logo/logo.png" alt="Genesis Trade Logo" class="avatar-md bradius">
      <h3 class="modal-title w-100 text-center font-weight-light"> Genesis Trading</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <input hidden="" name="id_pack" id="id_pack" value="">
          <div class="form-group">
            <label for="nama">Name Package:</label>
            <input  type="text" name="totinvest" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="nama">Total Invest:</label>
            <input  type="text" name="totinvest" class="form-control" id="invest">
          </div>
          <div class="form-group">
            <label for="profits">Profit %:</label>
            <input  type="text" name="profits" class="form-control" id="profit">
          </div>
          
          <div class="form-group">
            <label for="days">Days Contract:</label>
            <input  type="text" name="days" class="form-control" id="days">
          </div>
            
             <div class="form-group">
            <label for="days">ID Investor:</label>
            <input  type="text" name="idinvest" class="form-control" id="idinvest">
          </div>
            
             <div class="form-group">
            <label for="days">Investor Password:</label>
            <input  type="text" name="invespass" class="form-control" id="invespass">
          </div>
         
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" onClick="savepackage()" class="btn btn-warning">save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  
    <div class="modal fade" id="reff">
    <div class="modal-dialog modal-sm">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
       <div class="modal-header">
         <img src="../img/logo/logo.png" alt="Genesis Trade Logo" class="avatar-md bradius">
      <h3 class="modal-title w-100 text-center font-weight-light"> Genesis Trading</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
       
          <div class="form-group">
            <label for="profits">Profit Referral %:</label>
            <input  type="text" name="refprofit" class="form-control" id="refprofit">
          </div>
          
          
         
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" onClick="savereff()" class="btn btn-warning">save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
   <div class="modal fade" id="wdfeemod">
    <div class="modal-dialog modal-sm">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
       <div class="modal-header">
         <img src="../img/logo/logo.png" alt="Genesis Trade Logo" class="avatar-md bradius">
      <h3 class="modal-title w-100 text-center font-weight-light"> Genesis Trading</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
       
          <div class="form-group">
            <label for="profits">Withdraw Fee %:</label>
            <input  type="text" name="wdfee" class="form-control" id="wdfee">
          </div>
          
          
         
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" onClick="savefee()" class="btn btn-warning">save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="rateidr">
    <div class="modal-dialog modal-sm">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
       <div class="modal-header">
         <img src="../img/logo/logo.png" alt="Genesis Trade Logo" class="avatar-md bradius">
      <h3 class="modal-title w-100 text-center font-weight-light"> Genesis Trading</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
       
          <div class="form-group">
            <label for="profits">Rate IDR:</label>
            <input  type="text" name="raterupiah" class="form-control" id="raterupiah">
          </div>
          
          
         
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" onClick="saverate()" class="btn btn-warning">save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <script>
  
    var i=0;
	var p=0;
	var d=0;
	var n=0;
	var i2=0;
	
   function pakets(id_paket) {
  var id= id_paket;
  if(id != '')
  {
   $.ajax({
    url:"mod/setting/product.php",
    method:"POST",
    data:{id:id},
    dataType:"JSON",
    success:function(data)
    {
		
	i=data.invest_total;
	p=data.profit_persen;
	d=data.hari_kontrak;
	n=data.name;
	i2=id;
     
	 
       document.getElementById("id_pack").value =id;
	  document.getElementById("invest").value =data.invest_total;
	  document.getElementById("profit").value =data.profit_persen;
   	  document.getElementById("days").value =data.hari_kontrak;
	   document.getElementById("name").value =data.name;
        document.getElementById("idinvest").value =data.id_investor;
        document.getElementById("invespass").value =data.password_investor;
     
    }
   })
  }
 
 };
 
 function savepackage() {	 
 
 
 	 var i2= document.getElementById("id_pack").value;
	   var i= document.getElementById("invest").value;
	  var p=  document.getElementById("profit").value; 
   	 var d=  document.getElementById("days").value;
	  var n=  document.getElementById("name").value;
     
     var idn=  document.getElementById("idinvest").value;
     var idp=  document.getElementById("invespass").value;
 
   $.ajax({
    url:"mod/setting/savepackage.php",
    method:"POST",
    data:{idpack:i2,name:n,amount:i,days:d,persen:p,idinvestor:idn,passinvest:idp},
    dataType:"JSON",
	success:function(data)
    {
		alert(data.status);
		location.reload();
	}
   })
 
 };
 
 
  function savereff() {	 
 
 
 	 var reef= document.getElementById("refprofit").value;
	  
 
   $.ajax({
    url:"mod/setting/savereff.php",
    method:"POST",
    data:{profitreff:reef},
    dataType:"JSON",
	success:function(data)
    {
		alert(data.status);
		location.reload();
	}
   })
 
 };
 
  function savefee() {	 
 
 
 	 var wdfee= document.getElementById("wdfee").value;
	  
 
   $.ajax({
    url:"mod/setting/wdfee.php",
    method:"POST",
    data:{wdfee:wdfee},
    dataType:"JSON",
	success:function(data)
    {
		alert(data.status);
		location.reload();
	}
   })
 
 };

    function saverate() {	 
 
 
 	 var rate= document.getElementById("raterupiah").value;
	  
 
   $.ajax({
    url:"mod/setting/rateidr.php",
    method:"POST",
    data:{rateidr:rate},
    dataType:"JSON",
	success:function(data)
    {
		alert(data.status);
		location.reload();
	}
   })
 
 };
 </script>
  