<!-- content -->
<div class="row pt-2">
  <div class="col-md-12 col-lg-12">
    <?php
    echo $_SESSION['info'];
    unset($_SESSION['info']);
    ?>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Withdraw Invest Table</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="table-deposit" class="table table-striped table-bordered text-nowrap w-100">
            <thead>
              <tr>
                <th class="wd-15p">autono</th>
                <th class="wd-15p">Username</th>
                <th class="wd-20p">ID Withdraw Invest</th>
                <th class="wd-15p">fee Withdraw</th>
                <th class="wd-10p">Withdraw before fee</th>
                <th class="wd-10p">total withdraw</th>
                <th class="wd-10p">status withdraw</th>
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


<!-- modal approve wd invest -->
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="topup" aria-hidden="true">
  <div class="modal-dialog modal-lg" id="modal-dialog">
    <form method="post" action="index-menu-user-page-aksi_new_user.html">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Invest Withdraw</h4>
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
                          <div class="col-4">ID Withdraw Invest</div>
                          <div class="col-8" id="wd_id">: </div>
                        </div>
                        <div class="row">
                          <div class="col-4">Withdraw Before Fee</div>
                          <div class="col-8" id="wd_beforefee">: </div>
                        </div>
                        <div class="row">
                          <div class="col-4">Fee Withdraw</div>
                          <div class="col-8" id="fee_wd">: </div>
                        </div>
                        <div class="row">
                          <div class="col-4">Total Withdraw</div>
                          <div class="col-8" id="total_wd">: </div>
                        </div>
                        <div class="row">
                          <div class="col-4">Approve By</div>
                          <div class="col-8" id="approve_by">: </div>
                        </div>
                        <div class="row">
                          <div class="col-4">Approve Date</div>
                          <div class="col-8" id="approve_date">: </div>
                        </div>
                      </div>
                    </div>

                    <div class="row mt-5">
                      <div class="col-6"></div>
                      <div class="col-6" style="right: -20px;">
                        <form enctype='multipart/form-data'>
                          <div class="form-group">
                            <label for="bukti_bayar" class="d-block mt-3">Withdraw Approval</label>
                            <div class="row">
                              <div class="col-8">
                                <input hidden name="users" id="id_wd">
                                <input hidden name="id_user" id="id_user">
                                <select name="status_wd" id="status_wd" class="form-control" required>
                                  <option value="" selected disabled hidden>Confirmation Status</option>
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
<!-- end modal approve wd invest -->

<!-- end content -->


<script>
  $(document).ready(function() {
    var table = $('#table-deposit').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "mod/transaksi/data/wd_invest_dt.php",
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

    $(document).on("change", "select", function() {
      $("option[value=" + this.value + "]", this)
        .attr("selected", true).siblings()
        .removeAttr("selected")
    });

    $('#btn-submit').click(function() {
      var value_option = $('#status_wd').find(':selected').val();
      var id_wd = $('#id_wd').val();
      var user = $('#id_user').val();
      var withdraw = $('#wd_beforefee').text();
      var total_wd = $('#total_wd').text();
      if (value_option == undefined) {
        alert('Select Approval');
      } else {
        var formData = new FormData();
        formData.append('value', value_option);
        formData.append('id_wd', id_wd);
        formData.append('id_user', user);
        formData.append('withdraw', withdraw);
        formData.append('total_wd', total_wd);

        $.ajax({
          type: "POST",
          url: "mod/transaksi/data/approval_withdraw_invest.php",
          data: formData,
          cache: false,
          processData: false,
          contentType: false,
          success: function(data) {
            console.log(data);
            var data = JSON.parse(data);
            alert('Withdraw ' + data['data']['status']);
            window.location = "index.php?mod=transaksi&cmd=wd_invest";
          }
        });
      }
    });
  });

  function clickButton(id) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "mod/transaksi/data/detail_withdraw_invest.php",
      data: "id=" + id,
      success: function(res) {
        var dataHandler = $("#modal-body");

        console.log(res);

        var nama_lengkap = res['user']['nama'];
        var email = res['user']['email_user'];
        var wd_id = res['withdraw']['wd_id'];
        var wd_beforefee = res['withdraw']['wd_beforefee'];
        var fee_wd = res['withdraw']['fee_wd'];
        var total_wd = res['withdraw']['total_wd'];
        var approve_by = res['withdraw']['approve_by'];
        var approve_date = res['withdraw']['approve_date'];
        var id_wd = res['withdraw']['autono'];
        var id_user = res['withdraw']['user_id'];
        var value = res['withdraw']['status_wd'];
        if (value == 'Success') {
          value = 1;
        } else if (value == 'Reject') {
          value = 2;
        }

        if (approve_by == null) {
          approve_by = '-';
        } else {
          approve_by = approve_by;
        }

        if (approve_date == null) {
          approve_date = '-';
        } else {
          approve_date = approve_date;
        }



        $("#username").text(nama_lengkap);
        $("#email").text(`: ${email}`);
        $("#wd_id").text(`: ${wd_id}`);
        $("#wd_beforefee").text(`: ${wd_beforefee}`);
        $("#fee_wd").text(`: ${fee_wd}`);
        $("#total_wd").text(`: ${total_wd}`);
        $("#approve_by").text(`: ${approve_by}`);
        $("#approve_date").text(`: ${approve_date}`);
        $("#id_wd").val(id_wd);
        $("#id_user ").val(id_user);
        $("#status_wd").val(value);

        if (value == 1 || value == 2) {
          $('#btn-submit').attr('disabled', true);
          $("#status_wd").attr('disabled', true);
        } else {
          $('#btn-submit').attr('disabled', false);
          $("#status_wd").attr('disabled', false);
        }

      }
    });
  };
</script>

<script>
  setTimeout(() => {
    // let alert = document.querySelector(".alert");
    let alert = $(".alert");
    alert.remove();
  }, 4000);
</script>