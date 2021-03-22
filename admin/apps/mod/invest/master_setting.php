<!-- content -->
<div class="row pt-2">
  <div class="col-md-12 col-lg-12">
    <?php
    echo $_SESSION['info'];
    unset($_SESSION['info']);
    ?>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Master Settings</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="table-deposit" class="table table-striped table-bordered text-nowrap w-100">
            <thead>
              <tr>
                <th class="wd-15p">autono</th>
                <th class="wd-15p">Setting Name</th>
                <th class="wd-20p">value</th>
                <th class="wd-15p">Description</th>
                <th class="wd-15p">Action</th>
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

<!-- modal view -->
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="topup" aria-hidden="true">
  <div class="modal-dialog modal-lg" id="modal-dialog">
    <form method="post" action="index-menu-user-page-aksi_new_user.html">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Setting</h4>
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

                      <label for="nama">Setting Name</label>
                      <input readonly type="text" class="form-control" id="nama">

                      <label for="value">Value</label>
                      <input type="text" class="form-control" id="value">

                      <label for="keterangan">Description</label>
                      <input type="text" class="form-control" id="keterangan">
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success pull-left" id="btn-submit">Save</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
</div>
<!-- end modal view -->
<!-- end content -->


<script>
  $(document).ready(function() {
    // datatable
    $('#table-deposit').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "mod/invest/data/master_seting_dt.php",
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

  // function view
  function clickButton(id) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: 'mod/invest/data/setting_invest_json.php',
      data: "id=" + id,
      success: function(res) {
        // console.log(res);

        var nama = res['setting']['nama_seting'];
        var value = res['setting']['value'];
        var keterangan = res['setting']['keterangan_seting'];
        var autono = res['setting']['autono'];

        $("#nama").val(nama);
        $("#value").val(value);
        $("#keterangan").val(keterangan);
        $("#autono").val(autono);
      }
    });
  }
  // end function view

  // function submit change
  $("#btn-submit").click(function() {
    var autono = $("#autono").val();
    var value = $("#value").val();
    var keterangan = $("#keterangan").val();
    var nama = $("#nama").val();
    var formData = new FormData();
    formData.append("autono", autono);
    formData.append("value", value);
    formData.append("keterangan", keterangan);
    formData.append("nama", nama);

    $.ajax({
      type: "POST",
      url: "mod/invest/data/ubah_master_setting.php",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function() {
        alert('Data Berhasil Diubah');
        window.location = "index.php?mod=invest&cmd=master_setting";
      }
    })
  })
  // function submit change
</script>

<script>
  setTimeout(() => {
    // let alert = document.querySelector(".alert");
    let alert = $(".alert");
    alert.remove();
  }, 4000);
</script>