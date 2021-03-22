
 <?php
				 $qupending="select * from trading where  invest_status='Pending'";
				  $rspending=mysqli_query($con,$qupending);
				  $rwpending=mysqli_fetch_array($rspending);
				  $wdpending=$rwpending['invest_status'];
				  
				  
				  
				   ?>

          <?php if (!empty($wdpending)) { ?>     

   <div class="card">
    <div class="card-header">
      <h6 class="card-title"><i class="mdi mdi-cash-usd"></i> Pending Investment</h6>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="table-responsive">
     <tbody>
        <table id="pending" class="table table-bordered table-hover" style="width:100%">
          <thead>
            <tr>
             <th>Date</th>
             <th>Name</th>
             <th>Email</th>
              <th>Contract ID</th>
              <th>Amount</th>
              <th>%</th>
              <th>Days</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
         <tfoot>
         <?php 
		  $qupending="select * from trading where  invest_status='Pending'";
				  $rspending=mysqli_query($con,$qupending);
				  while($rwpending=mysqli_fetch_array($rspending)){
		 ?>
          <tr>
              <td><?=tanggal($rwpending['date_invest'])?></td>
              <td><?=namauser($rwpending['user_id'])?></td>
              <td><?=emailuser($rwpending['user_id'])?></td>
              <td><?=$rwpending['contract_id']?></td>
              <td><?=dolar($rwpending['paket_invest'])?></td>
              <td><?=$rwpending['persen_profit']?></td>
              <td><?=$rwpending['day_left']?></td>
               <td><?=$rwpending['invest_status']?></td>
                <td><button data-toggle="modal" data-target="#trd" onClick="updatetrade(<?=$rwpending['autono']?>)" class="btn btn-sm btn-primary">Action</button></td>
            </tr>
            <?php } ?>
            </tfoot>
         </tbody>
         
        </table>
        

      </div>
    </div>
    <!-- /.card-body --> 
  </div>
  <? } ?>
   
    
 
  <div class="card">
    <div class="card-header">
  <h6 class="card-title"><i class="fa fa-bar-chart"></i> Active Investment</h6>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="active" class="table table-bordered table-hover dataTable" style="width:100%">
          <thead>
            <tr>
              <th>Invest Date</th>
              <th>Contract ID</th>
              <th>Amount</th>
              <th>Profit %</th>
              <th>Day Left</th>
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
  <h6 class="card-title"><i class="fa fa-bar-chart"></i> Complete Investment</h6>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="complete" class="table table-bordered table-hover dataTable" style="width:100%">
          <thead>
            <tr>
              <th>Invest Date</th>
              <th>Contract ID</th>
              <th>Amount</th>
              <th>Profit %</th>
              <th>Day Left</th>
               <th>Status</th>
            </tr>
          </thead>
         
        </table>
      </div>
    </div>
    <!-- /.card-body --> 
  </div>
  <!-- /.card --> 
  

<script>
 $(document).ready(function() {
  var table =  $('#active').DataTable( {
        "processing": true,
        "serverSide": true,
		"ajax":"mod/trade/active.php",
		"order": [[ 0, "desc" ]]
		
    } );
	
	
	
	
} );

 $(document).ready(function() {
  var table =  $('#complete').DataTable( {
        "processing": true,
        "serverSide": true,
		"ajax":"mod/trade/complete.php",
		"order": [[ 0, "desc" ]]
		
    } );
	
	
	
	
} );

function updatetrade(id){
	
document.getElementById("idtrd").value =id;
	
}

</script>


  <form enctype="multipart/form-data" action="?mod=trade&cmd=updatetrd" method="post">
 <!-- The Modal -->
  <div class="modal fade" id="trd">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Activation Trade</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <input name="idtrd" id="idtrd" hidden="" value="">
       
         
        <div class="form-group">
    <label for="inputName" class="col-sm-6 control-label">Status <span class="badge badge-success"> Update status</span></label>
    <div class="col-sm-5">
      <select id="statustrd" name="statustrd" class="form-control" data-placeholder="Update Status Withdraw">
       <option value="" label="Update Status Investment"></option>
        <option value="Active">Active</option>       
      </select>
    </div>
  </div>
  </div>
        
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button name="update" type="submit" class="btn btn-primary" >Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  </form>