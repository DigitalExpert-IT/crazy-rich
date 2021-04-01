<!-- content -->
<div class="row pt-2">
	<div class="col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">List Users</h3>
			</div>
			<div class="card-body">
				<?php
				if (isset($_SESSION['info'])) {
					echo $_SESSION['info'];
					unset($_SESSION['info']);
				}
				?>
				<div class="table-responsive">
					<table id="table-anggota" class="table table-striped table-bordered text-nowrap w-100">
						<thead>
							<tr>
								<th class="wd-15p">User id</th>
								<th class="wd-15p">Username</th>
								<th class="wd-20p">Email</th>
								<th class="wd-15p">Balance</th>
								<th class="wd-10p">Status</th>
								<th class="wd-25p">Action</th>

							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<!-- TABLE WRAPPER -->
		</div>
		<!-- SECTION WRAPPER -->
	</div>
</div>
<!-- end content -->

<!-- modal view -->
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="topup" aria-hidden="true">
	<div class="modal-dialog modal-lg" id="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 col-md-12">

							<div class="card">
								<div class="card-body">

									<div class="row">
										<div class="col-md-4 col-sm-12 text-center">
											<i class="fa fa-user ml-5" style="font-size:170px"></i>
										</div>
										<div class="col-md-8 col-sm-12">
											<div class="row ml-1">
												<h3 class="display-5" id="username"></h3>
											</div>
											<div class="row">
												<div class="col-4">Email</div>
												<div class="col-8" id="email">: </div>
											</div>
											<div class="row">
												<div class="col-4">Join Date</div>
												<div class="col-8" id="tglJoin-user">: </div>
											</div>
											<div class="row">
												<div class="col-4">Balance</div>
												<div class="col-8" id="saldo">: </div>
											</div>
											<div class="row">
												<div class="col-4">Status Member</div>
												<div class="col-8" id="member">: </div>
											</div>
											<div class="row">
												<div class="col-4">Verify Code</div>
												<div class="col-8" id="verify_code">: </div>
											</div>
										</div>
									</div>

								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 col-md-12">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>
<!-- end modal view -->

<!-- modal edit user -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="topup" aria-hidden="true">
	<div class="modal-dialog modal-lg" id="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="modal-body">
				<!-- form edit email -->
				<!-- mod/user/detail_user.php -->
				<form>
					<input hidden id="user_id" name="user_id" class="form-control">
					<div class="form-group">
						<label for="namaLengkap" class="col-form-label">Full Name:</label>
						<input type="text" class="form-control" id="namaLengkap" name="nama_lengkap">
					</div>
					<div class="form-group">
						<label for="emailUser" class="col-form-label">Email:</label>
						<input type="email" class="form-control" id="emailUser" name="email">
					</div>
					<div class="form-group">
						<label for="member" class="col-form-label">Status Member:</label>
						<!-- <input type="text" class="form-control" id="memberEdit" name="member"> -->
						<select name="member" id="memberEdit" class="form-control">
							<option value="1">Active</option>
							<option value="0">Deactive</option>
						</select>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success pull-left" name="save" id="changeButton">Save Change</button>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>
<!-- end modal edit user -->



<!-- script datatable user -->
<script>
	$(document).ready(function() {
		$('#table-anggota').DataTable({
			"processing": false,
			"serverSide": true,
			"ajax": "mod/user/data/user.php",
			"pagingType": "simple_numbers",
			"leftColumns": 1,
			"rightColumns": 1,
			"columnDefs": [{
				"targets": [0],
				"visible": false
			}, ],
			"order": [
				[0, "desc"]
			]
		});
		$.fn.DataTable.ext.pager.numbers_length = 5;
	});
</script>
<!-- end script datatable user -->

<script>
	// function view user
	function clickButton(id) {
		$.ajax({
			type: "GET",
			dataType: "json",
			url: "mod/user/detail_user.php",
			data: "id=" + id,
			success: function(res) {
				var dataHandler = $("#modal-body");

				// console.log(res);

				var nama_lengkap = res['user']['nama'];
				var email = res['user']['email_user'];
				var tglJoin = res['user']['date_join'];
				var saldo = res['user']['saldo_aktif'];
				var member = res['user']['status'];
				if (member == 1) {
					member = 'Active';
				} else {
					member = 'Deactive';
				}
				var verify_code = res['user']['verify_code'];

				$("#username").text(nama_lengkap);
				$("#email").text(`: ${email}`);
				$("#tglJoin-user").text(`: ${tglJoin}`);
				$("#saldo").text(`: ${saldo}`);
				$("#member").text(`: ${member}`);
				$("#verify_code").text(`: ${verify_code}`);

			}
		});
	}
	// end function view user

	// function view edit user
	function editButton(id) {
		$.ajax({
			type: "GET",
			dataType: "json",
			url: "mod/user/detail_user.php",
			data: "id=" + id,
			success: function(res) {
				var dataHandler = $("#editModal");


				var namaLengkap = res['user']['nama'];
				var emailUsers = res['user']['email_user'];
				var users = res['user']['status'];
				var id = res['user']['user_id'];

				document.getElementById('namaLengkap').value = namaLengkap;
				document.getElementById('emailUser').value = emailUsers;
				document.getElementById('memberEdit').value = users;
				document.getElementById('user_id').value = id;
			}
		});
	}
	// end function view edit user

	// function save change user
	$('#changeButton').click(function() {
		var id_userEdit = $('#user_id').val();
		var nama = $('#namaLengkap').val();
		var member = $('#memberEdit').val();
		var email = $('#emailUser').val();
		console.log(id_userEdit);
		var formData = new FormData();
		formData.append('id', id_userEdit);
		formData.append('nama', nama);
		formData.append('member', member);
		formData.append('email', email);
		$.ajax({
			type: "POST",
			url: "mod/user/edit_user.php",
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			success: function() {
				alert('Change Data Success');
				window.location = 'index.php?mod=user&cmd=list';
			}
		})
	})
	// end function save change user
</script>