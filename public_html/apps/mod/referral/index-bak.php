					<div class="row">
					  <div class="col-md-12 col-lg-12">
					    <div class="card">

					      <div class="container mt-5">
					        <div class="row">
					          <div class="col">
					            <div class="d-flex justify-content-between">
					              <h6 class="card-title"><i class="fa fa-users"></i> My Referral</h6>
					              <a href="?mod=referral&amp;cmd=adduser">
					                <button class="btn btn-md btn-warning float-right"><i class="fa  fa-sitemap"></i> Add New User</button>
					              </a>
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
					                <th>Join Date</th>
					                <th>Referral Code</th>
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
					    var table = $('#myreff').DataTable({
					      "processing": true,
					      "serverSide": true,
					      "ajax": "mod/referral/myreff.php",
					      "columnDefs": [{
					        "targets": [0],
					        "visible": false
					      }, ],

					    });




					  });
					</script>