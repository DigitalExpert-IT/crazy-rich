 <div class="card">
    <div class="card-header">
      <h6 class="card-title"><i class="mdi mdi-cash-usd"></i> Setting Profit Today</h6>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="table-responsive">
     <tbody>
        <table id="pending" class="table table-bordered table-hover" style="width:100%">
          <thead>
            <tr>
             <th>Name Package</th>
            
             <th>Profit Today %</th>
              
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
             
              <td><?=$rwmastertrade['profit_harinini']?></td>
             
              
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
            <input disabled  type="text" name="totinvest" class="form-control" id="name">
          </div>
         
          <div class="form-group">
            <label for="profits">Profit %:</label>
            <input  type="text" name="profits" class="form-control" id="profit">
          </div>
          
         
         
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" onClick="savepackage()" class="btn btn-warning">Update Today Profit</button>
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
    url:"mod/profit/product.php",
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
	
	  document.getElementById("profit").value =data.profit_persen;
   	 
	   document.getElementById("name").value =data.name;
     
    }
   })
  }
 
 };
 
 function savepackage() {	 
 
 
 	 var i2= document.getElementById("id_pack").value;
	  
	  var p=  document.getElementById("profit").value; 
   	
 
   $.ajax({
    url:"mod/profit/savepackage.php",
    method:"POST",
    data:{idpack:i2,persen:p},
    dataType:"JSON",
	success:function(data)
    {
		alert(data.status);
		location.reload();
	}
   })
 
 };
 
 
 
 </script>
  