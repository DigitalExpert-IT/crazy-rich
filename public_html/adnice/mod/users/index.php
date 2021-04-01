					<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									
                                        <div class="container mt-5">
  <div class="row">
    <div class="col">
    <div class="d-flex justify-content-between">
     <h6 class="card-title"><i class="fa fa-users"></i> All Users</h6>
     
    </div>

    
    </div>
  </div>
</div>
     




                                         
									
                                    
									<div class="card-body">
										<div class="table-responsive">
											<table id="myreff" class="table table-bordered table-hover dataTable" style="width:100%">
          <thead>
            <tr>
              <th>User ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Active Balance</th>
              <th>Refferal</th>
              <th>Active Investment</th>
              <th>Join Date</th>
              
            </tr>
          </thead>
         
        </table>
										</div>
									</div>
									<!-- TABLE WRAPPER -->
								</div>
								<!-- SECTION WRAPPER -->
							</div>
						</div>

<script>
 $(document).ready(function() {
  var table =  $('#myreff').DataTable( {
        "processing": true,
        "serverSide": true,
		"ajax":"mod/users/users.php",
		
    } );
	
	
	
	
} );


</script>

