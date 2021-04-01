<?php
$selwallet="select * from users where user_id='$_SESSION[user_id]'";
$rswalet=mysqli_query($con,$selwallet);
$rwwalet=mysqli_fetch_array($rswalet);

?>

<section class="content">
<div class="container-fluid">
<div class="row">

<!-- /.col -->
<div class="col-md-12">
<div id="alerts"> </div>
<div class="card">
<div class="card-header p-2">
  <ul class="nav nav-pills">
    
    <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Change Password</a></li>
  </ul>
</div>

<!-- /.card-header -->
<div class="card-body">
<div class="tab-content">

<div class="tab-pane" id="password">
<form class="form-horizontal">
<div class="form-group">
  <label for="inputName" class="col-sm-2 control-label">Old Password</label>
  <div class="col-sm-10">
    <input disabled type="password" class="form-control" id="oldpass" placeholder="old Password">
  </div>
</div>
<div class="form-group">
  <label for="inputEmail" class="col-sm-2 control-label">New Password</label>
  <div class="col-sm-10">
    <input disabled type="password" class="form-control" id="newpass" placeholder="New Password">
  </div>
</div>
<div  class="form-group">
  <label for="inputName2" class="col-sm-2 control-label">Re-Password</label>
  <div class="col-sm-10">
    <input disabled type="password" class="form-control" id="newpass2" placeholder="Re-Password">
  </div>
</div>
<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="button" onClick="savepass()" class="btn btn-warning">Save</button>
    <button type="button" onClick="editpass()" class="btn btn-secondary">Edit</button>
  </div>
</div>
</div>

<!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
</div>
<!-- /.card-body -->
</div>
<!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<script>
	
	function wallet(){
		document.getElementById("walletaddr").disabled = false;
        document.getElementById("crypto").disabled = false;	
		
		
	}
	
	
	
	function walletsave(){
		
	var c=	document.getElementById("crypto").value;
	var w=  document.getElementById("walletaddr").value;
		
	    
		 $.ajax({
    url:"mod/profile/save.php",
    method:"POST",
    data:{crypto:c,walletadres:w},
    dataType:"JSON",
	success:function(data)
    {
		if(data.status=='success'){
			
			document.getElementById("walletaddr").disabled = true;
        document.getElementById("crypto").disabled = true;	
			
			 $("#alerts").append('<div  class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Save Wallet Address Success! </strong></div>');
			
		$("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
	   $("#alerts").html("");
		});
		
		} else {
			
		 $("#alerts").append('<div  class="alert alert-danger" id="fail-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Save Wallet Address Failed! </strong></div>');
			
		$("#fail-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#fail-alert").slideUp(500);
	   $("#alerts").html("");
		});
		
		}
		
	}
   })
		
		
	}
	
	function editpass(){
		document.getElementById("oldpass").disabled = false;
        document.getElementById("newpass").disabled = false;	
		 document.getElementById("newpass2").disabled = false;
		
		
	}
	
	
		function savepass(){
		
	var o=	document.getElementById("oldpass").value;
	var n1=  document.getElementById("newpass").value;
	var n2=  document.getElementById("newpass2").value;
		
	    
		 $.ajax({
    url:"mod/profile/savepass.php",
    method:"POST",
    data:{oldpass:o,newpas1:n1,newpas2:n2},
    dataType:"JSON",
	success:function(data)
    {
		if(data.status=='success'){
			
		document.getElementById("oldpass").disabled = true;
        document.getElementById("newpass").disabled = true;	
		 document.getElementById("newpass2").disabled = true;	
			
			 $("#alerts").append('<div  class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>New Password Success! </strong></div>');
			
		$("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
	   $("#alerts").html("");
		});
		
		} else {
			
		 $("#alerts").append('<div  class="alert alert-danger" id="fail-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>'+data.status+'</strong></div>');
			
		$("#fail-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#fail-alert").slideUp(500);
	   $("#alerts").html("");
		});
		
		}
		
	}
   })
		
		
	}
	
	
	
	</script> 
