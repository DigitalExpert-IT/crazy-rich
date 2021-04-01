
  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profit_tab" role="tab" aria-controls="profit_tab" aria-selected="true">Profit Trade</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#bonusreff_tab" role="tab" aria-controls="bonusreff_tab" aria-selected="false">Referral Bonus</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#refund_tab" role="tab" aria-controls="refund_tab" aria-selected="false">Refund Finish Investment</a>
  </li>
 

</ul>
    </div>
    
    <!-- /.card-header -->
    <div class="card-body">
      <div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active" id="profit_tab" role="tabpanel" aria-labelledby="profit_tab">
  <div class="table-responsive"> 
 <table id="profit" class="table table-bordered table-hover dataTable" style="width:100%">
        <thead>
            <tr>
            	<th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Profit</th>
                <th>Description</th>
            </tr>
        </thead>
       
        
    </table>
    </div></div>
  <div class="tab-pane fade" id="bonusreff_tab" role="tabpanel" aria-labelledby="bonusreff_tab"> 
  <div class="table-responsive">
 <table id="bonusreff" class="table table-bordered table-hover dataTable" style="width:100%">
        <thead>
            <tr>
            	<th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Profit</th>
                <th>Description</th>
               
            </tr>
        </thead>
 
    </table></div></div>
	
	 <div class="tab-pane fade" id="refund_tab" role="tabpanel" aria-labelledby="refund_tab"> 
  <div class="table-responsive">
 <table id="refund" class="table table-bordered table-hover dataTable" style="width:100%">
        <thead>
            <tr>
            	<th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Profit</th>
                <th>Description</th>
               
            </tr>
        </thead>
 
    </table></div></div>
  
</div>
    </div>
  </div>

<script>
 $(document).ready(function() {
  var table =  $('#profit').DataTable( {
        "processing": true,
        "serverSide": true,
		"order": [[ 0, "desc" ]],
		"ajax":"mod/transaction/data/profit.php",
		
    } );
	
	
	
} );

 $(document).ready(function() {
  var table =  $('#bonusreff').DataTable( {
        "processing": true,
        "serverSide": true,
		 "order": [[ 0, "desc" ]],
		"ajax":"mod/transaction/data/bonusreff.php",
		
    } );
	
	
	
	
	
} );

$(document).ready(function() {
  var table =  $('#refund').DataTable( {
        "processing": true,
        "serverSide": true,
		 "order": [[ 0, "desc" ]],
		"ajax":"mod/transaction/data/refund.php",
		
    } );
	
	
	
	
	
} );


</script>