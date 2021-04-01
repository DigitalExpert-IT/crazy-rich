
              

     <?php
				  $qupending="select * from withdraw where  status_wd='Pending'";
				  $rspending=mysqli_query($con,$qupending);
				  $rwpending=mysqli_fetch_array($rspending);
				  $wdpending=$rwpending['status_wd'];
				  
				  
				  
				   ?>

          <?php if (!empty($wdpending)) { ?>     

   <div class="card">
    <div class="card-header">
      <h6 class="card-title"><i class="mdi mdi-cash-usd"></i> Withdraw Pending</h6>
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
              <th>Withdraw ID</th>
              <th>Amount</th>
              
              <th>Status</th>
              <th>Action</th>
			 
            </tr>
          </thead>
         <tfoot>
         <?php 
		  $qupending="select * from withdraw where  status_wd='Pending'";
				  $rspending=mysqli_query($con,$qupending);
				  while($rwpending=mysqli_fetch_array($rspending)){
		 ?>
          <tr>
              <td><?=tanggal($rwpending['tanggal_wd'])?></td>
              <td><?=namauser($rwpending['user_id'])?></td>
              <td><?=emailuser($rwpending['user_id'])?></td>
              <td><?=$rwpending['wd_id']?></td>
              <td><?=dolar($rwpending['total_wd'])?></td>
             
               <td><?=$rwpending['status_wd']?></td>
                <td><button onClick="wdform(<?=$rwpending['autono']?>,<?=$rwpending['total_wd']?>,<?=$rwpending['user_id']?>,<?=$rwpending['wd_beforefee']?>)" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#wd">Action</button></td>
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
      <h6 class="card-title"><i class="mdi mdi-history"></i> Withdraw History</h6>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="table-responsive">
        <table id="historywd" class="table table-bordered table-hover dataTable" style="width:100%">
          <thead>
            <tr>
              <th>Date</th>
               <th>Name</th>
              <th>Email</th>
              <th>Withdraw ID</th>
              <th>Withdraw Amount</th>
              <th>Status</th>
			   <th>Txid</th>
            </tr>
          </thead>
        
         
        </table>
      </div>
      
    </div>
    <!-- /.card-body --> 
  </div>


  
<script>


 $(document).ready(function() {
  var table =  $('#historywd').DataTable( {
        "processing": true,
        "serverSide": true,
		"ajax":"mod/withdraw/data/wdtransaction.php",
		"order": [[ 0, "desc" ]]
    } );
	
	setInterval( function () {
    table.ajax.reload();
}, 30000 );
	
} );


function wdform(id,wdtot,userid,beforefee){
	
document.getElementById("idwd").value =id;
document.getElementById("wdtot").value =wdtot;
document.getElementById("userid").value =userid;
document.getElementById("beforefee").value =beforefee;
	
}


</script>
<form enctype="multipart/form-data" action="?mod=withdraw&cmd=updatewd" method="post">
 <!-- The Modal -->
  <div class="modal fade" id="wd">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Withdraw Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <input name="idwd" id="idwd" hidden="" value="">
		<input name="wdtot" id="wdtot" hidden="" value="">
		<input name="userid" id="userid" hidden="" value="">
        <input name="beforefee" id="beforefee" value="">

        <div class="form-group">
        <label for="inputName" class="col-sm-6 control-label">Voucher Indodax <span class="badge badge-danger">Make sure Voucher Corect</span></label>
        <div class="col-sm-10">
          <input name="txid" class="form-control">
          </div>
          
          </div>
         
        <div class="form-group">
    <label for="inputName" class="col-sm-6 control-label">Status <span class="badge badge-success"> Update status</span></label>
    <div class="col-sm-5">
      <select id="statuswd" name="statuswd" class="form-control" data-placeholder="Update Status Withdraw">
       <option value="" label="Update Status Withdraw"></option>
        <option value="Success">Success</option>
        <option value="Reject">Reject</option>
       
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