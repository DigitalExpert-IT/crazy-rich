<!-- content -->
<div class="row pt-2">
  <div class="col-md-12 col-lg-12">
    <?php
    echo $_SESSION['info'];
    unset($_SESSION['info']);
    ?>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">History Profit</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="table-deposit" class="table table-striped table-bordered text-nowrap w-100">
            <thead>
              <tr>
                <th class="wd-15p">autono</th>
                <th class="wd-15p">Username</th>
                <th class="wd-20p">profit percent</th>
                <th class="wd-15p">profit amount</th>
                <th class="wd-10p">Date</th>
                <th class="wd-10p">Description</th>
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


<script>
  // datatable
  $(document).ready(function() {
    $('#table-deposit').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "mod/transaksi/data/hs_profit.php",
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
    // end datatable
  });
</script>

<script>
  setTimeout(() => {
    // let alert = document.querySelector(".alert");
    let alert = $(".alert");
    alert.remove();
  }, 4000);
</script>