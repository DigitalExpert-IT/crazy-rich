<?php
$selwallet = "select * from users where user_id='$_SESSION[user_id]'";
$rswalet = mysqli_query($con, $selwallet);
$rwwalet = mysqli_fetch_array($rswalet);

?>

<!-- content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <!-- /.col -->
      <div class="col-md-12">
        <div id="alerts"> </div>
        <div class="card">
          <!-- list menu seting -->
          <div class="card-header p-2">
            <ul class="nav nav-pills">

              <li class="nav-item"><a class="nav-link active" href="#password" data-toggle="tab">Change Password</a></li>
              <li class="nav-item"><a class="nav-link" href="#banner" data-toggle="tab">Add Banners</a></li>
              <li class="nav-item"><a class="nav-link" href="#stream" data-toggle="tab">Add Youtube Live Stream</a></li>
              <li class="nav-item"><a class="nav-link" href="#announce" data-toggle="tab">Add Announcement</a></li>
            </ul>
          </div>
          <!-- end list menu seting -->

          <!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">

              <!-- tab password -->
              <div class="tab-pane active" id="password">
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
                  <div class="form-group">
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
              <!-- end tab password -->

              <!-- tab banner -->
              <div class="tab-pane" id="banner">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#bannerModal">Add banner</button>
                <div class="table-responsive">
                  <table id="banner_table" class="table table-striped table-bordered text-nowrap w-100">
                    <thead>
                      <tr>
                        <th class="wd-15p">autono</th>
                        <th class="wd-15p">Nama banner</th>
                        <th class="wd-10p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>

                <!-- Modal tambah -->
                <div class="modal fade" id="bannerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class=" modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add More Banners</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" multiple>
                          <div class="form-group">
                            <div class="col-sm-10">
                              <input type="file" class="form-control-file" id="original_banner" name="original_banner">
                              <div id="tambah_gambar"></div>
                              <button type="button" class="btn btn-primary mt-3 mb-3" id="btn-tambah" data-toggle="tooltip" data-placement="bottom" title="Tambah Gambar">+</button>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <!-- <button type="button" class="btn btn-warning" id="saveBanners">Save</button> -->
                              <!-- <button type="button" onClick="editpass()" class="btn btn-secondary">Edit</button> -->
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" id="saveBanners">Save</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Edit-->
                <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Gambar Banner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <img src="" alt="banner-img" id="gambar-banner">
                        <br>
                        <br>
                        <form class="form-horizontal" enctype="multipart/form-data" multiple>
                          <div class="form-group">
                            <div class="col-sm-10">
                              <input hidden type="text" name="autono-img" id="autono-img">
                              <label for="edit-img-banner">Ubah Gambar Banner</label>
                              <input type="file" class="form-control-file" id="edit-img-banner" name="edit-img-banner">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <!-- <button type="button" class="btn btn-warning" id="saveBanners">Save</button> -->
                              <!-- <button type="button" onClick="editpass()" class="btn btn-secondary">Edit</button> -->
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" id="EditBanners">Save</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end tab banner -->

              <!-- tab stream yutube -->
              <div class="tab-pane" id="stream">
                <?php
                $query = "SELECT * FROM youtube_streaming";
                $process = mysqli_query($con, $query);
                $result = mysqli_fetch_array($process);

                $iframe = $result['id'];
                ?>
                <?php if ($iframe == null) : ?>
                  <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#iframeModal">Make Live Stream</button>
                <?php else : ?>
                  <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#iframeModal" disabled>Make Live Stream</button>
                <?php endif; ?>
                <div class="table-responsive">
                  <table id="iframe_table" class="table table-striped table-bordered text-nowrap w-100">
                    <thead>
                      <tr>
                        <th class="wd-15p">id</th>
                        <th class="wd-15p">Iframe Link</th>
                        <th class="wd-10p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>

                <div class="modal fade" id="iframeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Link Iframe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form autocomplete="off">
                          <div class="form-group">
                            <label for="link_iframe">Link Iframe Youtube Live Stream</label>
                            <input type="text" class="form-control" id="link_iframe" aria-describedby="emailHelp">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" id="saveFrame">Save</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="modal-edit-iframe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Link Iframe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form autocomplete="off">
                          <div class="form-group">
                            <input hidden type="text" id="id-iframe-edit">
                            <label for="link_iframe">Link Iframe Youtube Live Stream</label>
                            <input type="text" class="form-control" id="link_iframe_edit" aria-describedby="emailHelp">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" id="editFrame">Save</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- end tab stream yutube -->

              <!-- tab announce -->
              <div class="tab-pane" id="announce">
                <?php
                $query = "SELECT * FROM information";
                $process = mysqli_query($con, $query);
                $result = mysqli_fetch_array($process);

                $iframe = $result['autono'];
                ?>
                <?php if ($iframe == null) : ?>
                  <button type="button" class="btn btn-primary mb-3 text-capitalize" data-toggle="modal" data-target="#announceModal">make announcement</button>
                <?php else : ?>
                  <button type="button" class="btn btn-primary mb-3 text-capitalize" data-toggle="modal" data-target="#announceModal" disabled>make announcement</button>
                <?php endif; ?>
                <div class="table-responsive">
                  <table id="announce_table" class="table table-striped table-bordered text-nowrap w-100">
                    <thead>
                      <tr>
                        <th class="wd-15p">id</th>
                        <th class="wd-15p">Title Announcement</th>
                        <th class="wd-10p">Description Announcement</th>
                        <th class="wd-10p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>

                <div class="modal fade" id="announceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-capitalize" id="exampleModalLabel">make announcement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form autocomplete="off">
                          <div class="form-group">
                            <label for="title">Title Announcement</label>
                            <input type="text" class="form-control" id="title_make" aria-describedby="emailHelp" required>

                            <label for="desc">Description Announcement</label>
                            <textarea name="desc" class="form-control" id="desc_make" cols="30" rows="10" required></textarea>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" id="saveAnnounce">Save</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="modal-edit-announce" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Announcement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form autocomplete="off">
                          <div class="form-group">
                            <input hidden type="text" id="id-announce">
                            <label for="title">Title Announcement</label>
                            <input type="text" class="form-control" id="title" aria-describedby="emailHelp" required>

                            <label for="desc">Description Announcement</label>
                            <textarea name="desc" class="form-control" id="desc" cols="30" rows="10" required></textarea>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" id="editAnnounce">Save</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- end tab announce -->

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
<!-- end content -->


<!-- script nambah gambar -->
<script>
  $(document).ready(function() {
    var i = 0;
    $('#btn-tambah').click(function() {
      i++;
      let arr_file = document.getElementsByClassName('row-file');
      for (let j = 0; j <= arr_file.length; j++) {
        if ($('input').hasClass('gambar' + i)) {
          i += 1;
        }
      }
      var input = '<div id="row' + i + '">';
      input += '<input type="file" class="row-file gambar' + i + '" form-control-file mt-3" id="banyak_banner' + i + '">';
      input += '<button class="btn btn-danger btn-delete mt-3" type="button" data-id="' + i + '" data-toggle="tooltip" data-placement="top" title="Hapus Gambar"><i class="fe fe-minus-circle" style="color:white;"></i></button> <br>';
      input += '</div>';

      $('#tambah_gambar').append(input);


    });

    $(document).on('click', '.btn-delete', function() {
      var button_id = $(this).attr("data-id");
      var hapus = $('#row' + button_id).remove();
      i = 0;
    });
  });
</script>
<!-- end script nambah gambar -->

<script>
  function wallet() {
    document.getElementById("walletaddr").disabled = false;
    document.getElementById("crypto").disabled = false;


  }



  function walletsave() {

    var c = document.getElementById("crypto").value;
    var w = document.getElementById("walletaddr").value;


    $.ajax({
      url: "mod/profile/save.php",
      method: "POST",
      data: {
        crypto: c,
        walletadres: w
      },
      dataType: "JSON",
      success: function(data) {
        if (data.status == 'success') {

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

  function editpass() {
    document.getElementById("oldpass").disabled = false;
    document.getElementById("newpass").disabled = false;
    document.getElementById("newpass2").disabled = false;


  }


  function savepass() {

    var o = document.getElementById("oldpass").value;
    var n1 = document.getElementById("newpass").value;
    var n2 = document.getElementById("newpass2").value;


    $.ajax({
      url: "mod/profile/savepass.php",
      method: "POST",
      data: {
        oldpass: o,
        newpas1: n1,
        newpas2: n2
      },
      dataType: "JSON",
      success: function(data) {
        if (data.status == 'success') {

          document.getElementById("oldpass").disabled = true;
          document.getElementById("newpass").disabled = true;
          document.getElementById("newpass2").disabled = true;

          $("#alerts").append('<div  class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>New Password Success! </strong></div>');

          $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
            $("#alerts").html("");
          });

        } else {

          $("#alerts").append('<div  class="alert alert-danger" id="fail-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>' + data.status + '</strong></div>');

          $("#fail-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#fail-alert").slideUp(500);
            $("#alerts").html("");
          });

        }

      }
    })


  }

  // script banner
  $('#saveBanners').click(function() {
    var arr = document.getElementsByClassName('row-file');
    var ori = $('#original_banner').prop('files')[0];
    var more_banner = [];
    var i = 0;

    for (var j = 1; j <= arr.length; j++) {
      i += 1;
      if (!$("input").hasClass("gambar" + i)) {
        i += 1;
        if (!$("input").hasClass("gambar" + i)) {
          i += 1;
        }
      }
      var newFile = $('#banyak_banner' + i).prop('files')[0];
      more_banner.push(newFile);
    }

    if (ori != undefined) {
      let formData = new FormData();
      formData.append('ori', ori);
      for (i = 0; i < arr.length; i++) {
        formData.append('more_banner[]', more_banner[i])
      }

      $.ajax({
        type: "POST",
        url: "mod/settings/data/tambah_gambar.php",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function(data) {
          alert("Image Success Uploaded");
          window.location = "index.php?mod=settings&cmd=setting";
        }
      });
    } else {
      alert('data tidak boleh kosong')
    }
  });

  $('#EditBanners').click(function() {
    var ori = $('#edit-img-banner').prop('files')[0];
    var id = $('#autono-img').val();

    if (ori != undefined) {
      let formData = new FormData();
      formData.append('ori', ori);
      formData.append('id', id);

      $.ajax({
        type: "POST",
        url: "mod/settings/ubah_gambar.php",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function(data) {
          alert("Image Success Uploaded");
          window.location = "index.php?mod=settings&cmd=setting";
        }
      });
    } else {
      alert('data tidak boleh kosong')
    }
  });

  // datatable banner
  $(document).ready(function() {
    $('#banner_table').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "mod/settings/data/banner.php",
      "columnDefs": [{
        "targets": [0],
        "visible": false
      }]
    });
  });

  function clickButton(id) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "mod/settings/detail_banner.php",
      data: "id=" + id,
      success: function(res) {
        var dataHandler = $("#modal-body");



        var id = res['gambar']['autono'];
        var username = res['gambar']['nama_gambar'];
        var path = '../assets/images/banners/';
        $('#gambar-banner').attr('src', path + username);
        $('#autono-img').val(id);
      }
    });
  }

  function hapusButton(id) {
    if (confirm('Ingin Menghapus Banner?')) {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "mod/settings/hapus_gambar.php",
        data: {
          'id': id
        },
        success: function(data) {
          alert('gambar berhasil dihapus');
          window.location = "index.php?mod=settings&cmd=setting";
        }
      });
      alert('gambar berhasil dihapus');
      window.location = "index.php?mod=settings&cmd=setting";
    }
  }

  // end script banner

  // script youtube live stream
  $(document).ready(function() {
    $('#iframe_table').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "mod/settings/data/iframe.php",
      "columnDefs": [{
        "targets": [0],
        "visible": false
      }]
    });
  });

  $('#saveFrame').click(function() {
    var frame = $('#link_iframe').val();

    if (frame != '') {
      var formDataLink = new FormData();
      formDataLink.append('frame', frame);

      $.ajax({
        type: "POST",
        data: formDataLink,
        url: "mod/settings/tambah_frame.php",
        cache: false,
        processData: false,
        contentType: false,
        success: function(data) {
          alert("Tambah Iframe Sukses");
          window.location = "index.php?mod=settings&cmd=setting";
        }
      });
    } else {
      alert('data tidak boleh kosong')
    }
  });

  $('#editFrame').click(function() {
    var frame_edit = $('#link_iframe_edit').val();
    var id = $('#id-iframe-edit').val();
    var formDataLink = new FormData();
    formDataLink.append('frame', frame_edit);
    formDataLink.append('id', id);

    $.ajax({
      type: "POST",
      data: formDataLink,
      url: "mod/settings/ubah_frame.php",
      cache: false,
      processData: false,
      contentType: false,
      success: function(data) {
        alert("Ganti Iframe Sukses");
        window.location = "index.php?mod=settings&cmd=setting";
      }
    });
  });

  function editIframeButton(id) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "mod/settings/detail_iframe.php",
      data: "id=" + id,
      success: function(res) {
        var dataHandler = $("#modal-body");

        $('#id-iframe-edit').val(res['iframe']['id']);
      }
    });
  };
  // endscript youtube live stream

  // announcemenet
  $(document).ready(function() {
    $("#announce_table").DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "mod/settings/data/announce_dt.php",
      "columnDefs": [{
        "targets": 0,
        "visible": false
      }]
    });
  });

  function announceButton(id) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "mod/settings/data/announce_json.php",
      data: "id=" + id,
      success: function(res) {


        var id = res["data"]["autono"];
        var title = res["data"]["title"];
        var desc = res["data"]["description"];

        $("#id-announce").val(id);
        $("#title").val(title);
        $("#desc").val(desc);
      }
    });
  }

  $("#saveAnnounce").click(function() {
    var title = $("#title_make").val();
    var desc = $("#desc_make").val();
    var formDataAnnSave = new FormData();
    formDataAnnSave.append('title', title);
    formDataAnnSave.append('desc', desc);

    $.ajax({
      type: "POST",
      url: "mod/settings/data/save_announce.php",
      data: formDataAnnSave,
      cache: false,
      contentType: false,
      processData: false,
      success: function() {
        alert("save data");
        window.location = "index.php?mod=settings&cmd=setting";
      }
    })

  })

  $("#editAnnounce").click(function() {
    var autono = $("#id-announce").val();
    var title = $("#title").val();
    var desc = $("#desc").val();

    var formDataAnn = new FormData();
    formDataAnn.append("autono", autono);
    formDataAnn.append("title", title);
    formDataAnn.append("desc", desc);

    $.ajax({
      type: "POST",
      url: "mod/settings/data/announce_edit.php",
      data: formDataAnn,
      cache: false,
      contentType: false,
      processData: false,
      success: function() {
        alert("save change");
        window.location = "index.php?mod=settings&cmd=setting";
      }
    });

  })
  // end announcemenet
</script>