<!-- content -->
<div class="row pt-2">
  <div class="col-md-12 col-lg-12">
    <?php
    echo $_SESSION['info'];
    unset($_SESSION['info']);
    ?>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Trading Table</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="table-deposit" class="table table-striped table-bordered text-nowrap w-100">
            <thead>
              <tr>
                <th class="wd-15p">autono</th>
                <th class="wd-15p">Username</th>
                <th class="wd-20p">id contract</th>
                <th class="wd-10p">id packet</th>
                <th class="wd-10p">day left</th>
                <th class="wd-10p">invest status</th>
                <th class="wd-10p">date invest</th>
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

<!-- modal view invest -->
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="topup" aria-hidden="true">
  <div class="modal-dialog modal-lg" id="modal-dialog">
    <form method="post" action="index-menu-user-page-aksi_new_user.html">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail</h4>
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
                          <div class="col-4 text-capitalize">iD contract</div>
                          <div class="col-8" id="contract">: </div>
                        </div>
                        <div class="row">
                          <div class="col-4 text-capitalize">iD packet</div>
                          <div class="col-8" id="paket">: </div>
                        </div>
                        <div class="row">
                          <div class="col-4 text-capitalize">invest</div>
                          <div class="col-8" id="paket_invest">: </div>
                        </div>
                        <div class="row">
                          <div class="col-4">Reff ID</div>
                          <div class="col-8" id="reff">: </div>
                        </div>
                        <div class="row">
                          <div class="col-4">Percent Profit</div>
                          <div class="col-8" id="persen_profit">: </div>
                        </div>
                        <div class="row">
                          <div class="col-4">Update By</div>
                          <div class="col-8" id="update_by">: </div>
                        </div>
                        <div class="row">
                          <div class="col-4">Date Update</div>
                          <div class="col-8" id="date_update">: </div>
                        </div>
                      </div>
                    </div>

                    <div class="row mt-5">
                      <div class="col-6"></div>
                      <div class="col-6" style="right: -100px;">
                        <form enctype='multipart/form-data'>
                          <div class="form-group">
                            <label for="bukti_bayar" class="d-block">Trading Approval</label>
                            <div class="row">
                              <div class="col-8">
                                <input hidden name="users" id="id_wd">
                                <input hidden name="id_user" id="id_user">
                                <select name="status_wd" id="status_wd" class="form-control" required>
                                  <option value="" selected disabled hidden>Status Confirmation</option>
                                  <option value="2">Reject</option>
                                  <option value="1">Accept</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
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
<!-- end modal view invest -->
<!-- end content -->

<script>
  $(document).ready(function() {
    // datatable
    var table = $('#table-deposit').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "mod/invest/data/trading_dt.php",
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
    setInterval(function() {
      table.ajax.reload();
    }, 5000);
    $.fn.DataTable.ext.pager.numbers_length = 5;
    // end datatable
  });

  // view invest
  function clickButton(id) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "mod/invest/data/trading_json.php",
      data: "id=" + id,
      success: function(res) {
        console.log(res);
        var nama_lengkap = res['user']['nama'];
        var email = res['user']['email_user'];
        var contract = res['trading']['contract_id'];
        var paket = res['trading']['paket_id'];
        var reff = res['trading']['reff_id'];
        var profit = res['trading']['persen_profit'];
        var update_by = res['trading']['update_by'];
        var update_date = res['trading']['date_update'];
        var paket_invest = res['trading']['paket_invest'];
        var autono = res['trading']['autono'];
        var user_id = res['trading']['user_id'];
        var status = res['trading']['invest_status'];

        if (status == 'Active' || status == 'Reject' || status == 'Finish') {
          $('#btn-submit').attr('disabled', true);
          $("#status_wd").attr('disabled', true);
        } else {
          $('#btn-submit').attr('disabled', false);
          $("#status_wd").attr('disabled', false);
        }

        if (status == 'Active' || status == 'Finish') {
          status = 1;
        } else if (status == 'Reject') {
          status = 2;
        }

        if (update_by == null && update_date == null) {
          update_by = '-';
          update_date = '-';
        } else {
          update_by = update_by;
          update_date = update_date;
        }


        $("#username").text(nama_lengkap);
        $("#email").text(`: ${email}`);
        $("#contract").text(`: ${contract}`);
        $("#paket").text(`: ${paket}`);
        $("#reff").text(`: ${reff}`);
        $("#persen_profit").text(`: ${profit}`);
        $("#update_by").text(`: ${update_by}`);
        $("#date_update").text(`: ${update_date}`);
        $("#paket_invest").text(`: ${paket_invest}`);
        $("#id_wd").val(autono);
        $("#id_user").val(user_id);
        $("#status_wd").val(status);
      }
    })
  }
  // end view invest

  // submit invest
  $("#btn-submit").click(function() {
    var id_trading = $("#id_wd").val();
    var id_user = $("#id_user").val();
    var status = $("#status_wd").val();
    var invest = $("#paket_invest").text();
    if (status == undefined) {
      alert("Select Approval")
    } else {
      var formData = new FormData();
      formData.append('autono', id_trading);
      formData.append('user_id', id_user);
      formData.append('status', status);
      formData.append('invest', invest);

      $.ajax({
        type: "POST",
        url: "mod/invest/data/approve_trading.php",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function(res) {
          var status = JSON.parse(res);
          alert('Trading ' + status['status']);
          window.location = "index.php?mod=invest&cmd=trading";
        }
      });
    }
  });
  // end submit invest
</script>

<script>
  setTimeout(() => {
    // let alert = document.querySelector(".alert");
    let alert = $(".alert");
    alert.remove();
  }, 4000);
</script>