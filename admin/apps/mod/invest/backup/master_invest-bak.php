<!-- content -->
<div class="row pt-2">
  <div class="col-md-12 col-lg-12">
    <?php
    echo $_SESSION['info'];
    unset($_SESSION['info']);
    ?>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Master Invest Table</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="table-deposit" class="table table-striped table-bordered text-nowrap w-100">
            <thead>
              <tr>
                <th class="wd-15p">autono</th>
                <th class="wd-15p">ID Product</th>
                <th class="wd-20p">Product Name</th>
                <th class="wd-15p">Total Invest</th>
                <th class="wd-10p">Profit Daily</th>
                <th class="wd-10p">Profit Percent</th>
                <th class="wd-10p">Contract Circle</th>
                <th class="wd-10p">limit invest</th>
                <th class="wd-10p">ID Investo</th>
                <th class="wd-10p">Password Investor</th>
                <th class="wd-10p">Action</th>
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

<!-- modal profit hari ini -->
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="topup" aria-hidden="true">
  <div class="modal-dialog modal-lg" id="modal-dialog">
    <form method="post" action="index-menu-user-page-aksi_new_user.html">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Profit Daily</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 col-md-12">

                <div class="row">
                  <div class="col-md-8 col-sm-12">
                    <div class="row ml-1">
                      <input hidden type="text" id="autono">
                      <label for="profit">Profit Daily</label>
                      <input type="text" class="form-control" id="profit">
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success pull-left" id="btn-submit">Submit</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
</div>

<!-- modal lainnya -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="topup" aria-hidden="true">
  <div class="modal-dialog modal-lg" id="modal-dialog">
    <form method="post" action="index-menu-user-page-aksi_new_user.html">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Other Settings</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 col-md-12">

                <div class="row">
                  <div class="col-md-8 col-sm-12">
                    <div class="row ml-1">
                      <input hidden type="text" id="autono_lainnya">

                      <label for="nama_produk">Product Name</label>
                      <input type="text" class="form-control" id="nama_produk">

                      <label for="id_invest">ID Inverstor</label>
                      <input type="text" class="form-control" id="id_invest">

                      <label for="pass_invest">Password Investor</label>
                      <input type="text" class="form-control" id="pass_invest">

                      <label for="total">Total Invest</label>
                      <input type="text" class="form-control" id="total">

                      <label for="limit">Contract Circle</label>
                      <input type="text" class="form-control" id="limit">

                      <label for="persen_profit">Profit Percent</label>
                      <input type="text" class="form-control" id="persen_profit">
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success pull-left" id="btn-submit_lainnya">Submit</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->
<!-- end content -->


<script>
  $(document).ready(function() {
    // datatable
    $('#table-deposit').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "mod/invest/data/master_invest_dt.php",
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

  // function view daily profit
  function clickButton(id) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "mod/invest/data/master_invest_json.php",
      data: "id=" + id,
      success: function(res) {
        var dataHandler = $("#modal-body");

        console.log(res);

        var autono = res['trading']['autono'];
        var profit_harini = res['trading']['package_profit'];

        $("#autono").val(autono);
        $("#profit").val(profit_harini);
      }
    });
  };
  // end function view daily profit

  // function submit change daily profit
  $("#btn-submit").click(function() {
    var autono = $("#autono").val();
    var package_profit = $("#profit").val();
    var formdData_profit = new FormData();
    formdData_profit.append('autono', autono);
    formdData_profit.append('profit', package_profit);

    $.ajax({
      type: "POST",
      url: "mod/invest/data/profit_harini.php",
      data: formdData_profit,
      cache: false,
      processData: false,
      contentType: false,
      success: function() {
        alert('Save Changes');
        window.location = 'index.php?mod=invest&cmd=master_invest';
      }
    });
  });
  // function submit change daily profit

  // function other settings view
  function editButton(id) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "mod/invest/data/master_invest_json.php",
      data: "id=" + id,
      success: function(res) {
        // console.log(res);

        var nama_produk = res['trading']['nama_produk'];
        var id_invest = res['trading']['id_investor'];
        var password_invest = res['trading']['password_investor'];
        var total = res['trading']['invest_total'];
        var limit = res['trading']['contract_days'];
        var profit_persen = res['trading']['profit_persen'];
        var autono = res['trading']['autono'];

        $("#nama_produk").val(nama_produk);
        $("#id_invest").val(id_invest);
        $("#pass_invest").val(password_invest);
        $("#total").val(total);
        $("#limit").val(limit);
        $("#persen_profit").val(profit_persen);
        $("#autono_lainnya").val(autono);
      }
    });
  };
  // end function other settings view

  // function submit other settings
  $('#btn-submit_lainnya').click(function() {
    var nama_produk = $("#nama_produk").val();
    var id_invest = $("#id_invest").val();
    var pass_invest = $("#pass_invest").val();
    var total = $("#total").val();
    var limit = $("#limit").val();
    var persen_profit = $("#persen_profit").val();
    var autono = $("#autono_lainnya").val();

    var formDataLainnya = new FormData();
    formDataLainnya.append("nama_produk", nama_produk);
    formDataLainnya.append("id_invest", id_invest);
    formDataLainnya.append("pass_invest", pass_invest);
    formDataLainnya.append("total", total);
    formDataLainnya.append("limit", limit);
    formDataLainnya.append("persen_profit", persen_profit);
    formDataLainnya.append("autono", autono);

    $.ajax({
      type: "POST",
      url: "mod/invest/data/edit_master_invest_lainnya.php",
      data: formDataLainnya,
      cache: false,
      processData: false,
      contentType: false,
      success: function() {
        alert('Save Changes');
        window.location = 'index.php?mod=invest&cmd=master_invest';
      }
    });
  });
  // end function submit other settings
</script>

<script>
  setTimeout(() => {
    // let alert = document.querySelector(".alert");
    let alert = $(".alert");
    alert.remove();
  }, 4000);
</script>