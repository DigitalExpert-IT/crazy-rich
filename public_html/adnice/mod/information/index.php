 <div class="card">
    <div class="card-header">
      <h6 class="card-title"><i class="mdi mdi-cash-usd"></i> Dashboard News</h6>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="table-responsive">
     <tbody>
        <table id="pending" class="table table-bordered table-hover" style="width:100%">
          <thead>
            <tr>
             <th>Title</th>
             <th>Description</th>
              <th>Action</th>
			 
            </tr>
          </thead>
         <tfoot>
         <?php 
		  $quinfo="select * from information";
				  $rsinfo=mysqli_query($con,$quinfo);
				 $rwinfo=mysqli_fetch_array($rsinfo);
		 ?>
          <tr>
              <td><?=$rwinfo['title']?></td>
              <td><?=$rwinfo['description']?></td>
              
                <td><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#update">Update</button></td>
            </tr>
           
            </tfoot>
         </tbody>
         
        </table>
        

      </div>
    </div>
    <!-- /.card-body --> 
  </div>
<form action="?mod=information&cmd=update" enctype="multipart/form-data" method="post">
<div id="update" class="modal fade" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header pd-x-20">
        <h6 class="modal-title">Update News </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body pd-20">
        <div class="form-group">
          <label for="recipient-name" class="form-control-label">Title:</label>
          <input type="text" name="judul" value="<?=$rwinfo['title']?>" class="form-control" id="recipient-name">
        </div>
          <div class="form-group">
          <label for="recipient-name" class="form-control-label">Description:</label>
           <textarea class="form-control" name="news" cols="20" rows="10"><?=$rwinfo['description']?></textarea>
        </div>
       
      </div>
      <!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  <!-- MODAL DIALOG --> </div>
</form>
