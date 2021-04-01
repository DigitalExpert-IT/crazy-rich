
 <?php
				  $qupending="select * from deposit where  status='Pending'";
				  $rspending=mysqli_query($con,$qupending);
				  $rwpending=mysqli_fetch_array($rspending);
				  $wdpending=$rwpending['status'];
				  
				  
				  
				   ?>

          <?php if (!empty($wdpending)) { ?>     

   <div class="card">
    <div class="card-header">
      <h6 class="card-title"><i class="mdi mdi-cash-usd"></i> Deposit Pending</h6>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="table-responsive">
     <tbody>
        <table id="pending" class="table table-bordered table-hover" style="width:100%">
          <thead>
            <tr>
            <th>Date</th>
              <th>Deposit ID</th>
               <th>Name</th>
               <th>Email</th>
              <th>Deposit USD</th>
                <th>Deposit IDR</th>
                <th>Vocer</th>
              <th>Status</th>
              <th>Action</th>
			 
            </tr>
          </thead>
         <tfoot>
         <?php 
		  $qupending="select * from deposit where  status='Pending'";
				  $rspending=mysqli_query($con,$qupending);
				  while($rwpending=mysqli_fetch_array($rspending)){
		 ?>
          <tr>
              <td><?=tanggal($rwpending['date_create'])?></td>
              <td><?=namauser($rwpending['user_id'])?></td>
              <td><?=emailuser($rwpending['user_id'])?></td>
              <td><?=$rwpending['order_id']?></td>
              <td><?=dolar($rwpending['total_deposit_usd'])?></td>
              <td><?=rupiah($rwpending['total_deposit_idr'])?></td>
              <td><?=$rwpending['vocer_idx']?></td>
               <td><?=$rwpending['status']?></td>
                <td><button onClick="depoform(<?=$rwpending['autono']?>,<?=$rwpending['total_deposit_usd']?>,<?=$rwpending['user_id']?>)" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#wd">Action</button></td>
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
      <h6 class="card-title"><i class="mdi mdi-history"></i> Deposit History</h6>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="table-responsive">
        <table id="historydepo" class="table table-bordered table-hover dataTable" style="width:100%">
          <thead>
            <tr>
              <th>Date</th>
              <th>Deposit ID</th>
               <th>Name</th>
               <th>Email</th>
              <th>Deposit USD</th>
                <th>Deposit IDR</th>
                <th>Vocer</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          
         </tbody>
         
        </table>
      </div>
      
    </div>
    <!-- /.card-body --> 
  </div>
  
<form enctype="multipart/form-data" action="?mod=deposit&cmd=update" method="post">
 <!-- The Modal -->
  <div class="modal fade" id="wd">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Status Deposit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="form-group">
    <label for="inputName" class="col-sm-6 control-label">Status <span class="badge badge-success"> Update status</span></label>
    <div class="col-sm-12">
      <select id="statusdepo" name="statusdepo" class="form-control" data-placeholder="Update Status Withdraw">
       <option value="" label="Update Status Deposit"></option>
        <option value="Success">Success</option>
        <option value="Reject">Reject</option>
       </select>
        
        
    </div>
  </div>
        <div class="form-group">
    <label for="inputName" class="col-sm-6 control-label">Status <span class="badge badge-success"> Description</span></label>
    <div class="col-sm-12">
      <textarea class="form-control" name="keterangan"></textarea>
         <input hidden="" class="form-control" name="iddepo" id="iddepo" type="text"> 
        <input hidden="" class="form-control" name="iduser" id="userid" type="text"> 
        <input hidden="" class="form-control" name="totaldepo" id="totaldepo" type="text">
        
        
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

 
  
 

<script>
 $(document).ready(function() {
  var table =  $('#historydepo').DataTable( {
        "processing": true,
        "serverSide": true,
		"ajax":"mod/deposit/data/depotransaction.php",
		"order": [[ 0, "desc" ]]
    } );
	
	setInterval( function () {
    table.ajax.reload();
}, 30000 );
	
} );

function depoform(id,depotot,userid){
	
document.getElementById("iddepo").value =id;
document.getElementById("totaldepo").value =depotot;
document.getElementById("userid").value =userid;
	
}


</script>
