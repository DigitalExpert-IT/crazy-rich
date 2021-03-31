<?php
$selwallet = "select * from users where user_id='$_SESSION[user_id]'";
$rswalet = mysqli_query($con, $selwallet);
$rwwalet = mysqli_fetch_array($rswalet);

$query = "SELECT * FROM information";
$res = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($res);
$info = $result['autono'];
?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified bg-light" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-bs-toggle="tab" href="#navpills2-change-password" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-lock"></i></span>
                                    <span class="d-none d-sm-block">Change Password</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#navpills2-banners" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-images"></i></span>
                                    <span class="d-none d-sm-block">Banner</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#navpills2-youtube" role="tab">
                                    <span class="d-block d-sm-none"><i class="fab fa-youtube"></i></span>
                                    <span class="d-none d-sm-block">Youtube Streaming</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#navpills2-announcement" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-bullhorn"></i></span>
                                    <span class="d-none d-sm-block">Announcement</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="navpills2-change-password" role="tabpanel">
                                <?php include('component/change_password.php') ?>
                            </div>
                            <div class="tab-pane" id="navpills2-banners" role="tabpanel">
                                <?php include('component/banners.php') ?>
                            </div>
                            <div class="tab-pane" id="navpills2-youtube" role="tabpanel">
                                <?php include('component/youtube.php') ?>
                            </div>
                            <div class="tab-pane" id="navpills2-announcement" role="tabpanel">
                                <?php include('component/announcement.php') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
            input += '<button class="btn btn-danger waves-effect waves-light mt-3 btn-delete" type="button" data-id="' + i + '" data-toggle="tooltip" data-placement="top" title="Hapus Gambar"><i class="fe fe-minus-circle" style="color:white;">-</i></button> <br>';
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
                if (data.status == 'incorrect') {
                    Swal.fire({
                        title: "Error",
                        text: "Your'e Old Password Incorrect. Please Try Again :(",
                        icon: "error"
                    })
                } else if (data.status == 'unmatch') {
                    Swal.fire({
                        title: "Error",
                        text: "Your Password Doesn't Match. Please Try Again :(",
                        icon: "error"
                    })
                } else if (data.status == 'failed') {
                    Swal.fire({
                        title: "Error",
                        text: "Oppss, There's Something Wrong. Please Try Again :(",
                        icon: "error"
                    })
                } else {
                    Swal.fire({
                        title: "Success",
                        text: "Your Password Succesfully Updated  :)",
                        icon: "success"
                    }).then((res) => {
                        location.reload();
                    })

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
                    var res = data.status;
                    if (res == 'failed') {
                        Swal.fire({
                            title: "Error",
                            text: "Your File To Large. Maximum Image is 2MB :(",
                            icon: "error"
                        })
                    } else if (res == 'error') {
                        Swal.fire({
                            title: "Error",
                            text: "Oppss, There's Something Wrong. Please Try Again :(",
                            icon: "error"
                        })
                    } else {
                        Swal.fire({
                            title: "Success",
                            text: "Banner Succesfully Added  :)",
                            icon: "success"
                        }).then((res) => {
                            location.reload();
                        })
                    }
                }
            });
        } else {
            Swal.fire({
                title: "Error",
                text: "Oppss, One or More Image Still Empty :(",
                icon: "error"
            })
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
                mimeType: 'multipart/form-data',
                success: function(data) {
                    var res = data.status;
                    if (res == 'failed') {
                        Swal.fire({
                            title: "To Large",
                            text: "Oppss, Your File To Large. Image Max is 2MB :(",
                            icon: "error"
                        })
                    } else if (res == 'error') {
                        Swal.fire({
                            title: "Error",
                            text: "Oppss, There's Something Wrong. Please Try Again :(",
                            icon: "error"
                        })
                    } else {
                        Swal.fire({
                            title: "Success",
                            text: "Banners Succesfully Updated  :)",
                            icon: "success"
                        }).then((res) => {
                            location.reload();
                        })
                    }
                }
            });
        } else {
            Swal.fire({
                title: "Error",
                text: "Your Files Still Empty :(",
                icon: "error"
            })
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
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Yes, delete it!"
        }).then(function(t) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "mod/settings/hapus_gambar.php",
                data: {
                    'id': id
                },
                success: function(data) {
                    if (data.status == 'failed') {
                        Swal.fire({
                            title: "Error",
                            text: "Oppss, There's Something Wrong. Please Try Again :(",
                            icon: "error"
                        })
                    } else {
                        t.value && Swal.fire("Deleted!", "Your file has been deleted.", "success").then((t) => {
                            location.reload()
                        })
                    }


                }
            });
        })
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
                    var res = data.status;
                    if (res == 'error') {
                        Swal.fire({
                            title: "Error",
                            text: "Oppss, There's Something Wrong. Please Try Again :(",
                            icon: "error"
                        })
                    } else {
                        Swal.fire({
                            title: "Success",
                            text: "IFrame Succesfully Updated  :)",
                            icon: "success"
                        }).then((res) => {
                            location.reload();
                        })
                    }
                }
            });
        } else {
            Swal.fire({
                title: "Error",
                text: "Please Fill All Input :(",
                icon: "error"
            })
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
                var res = data.status;
                if (res == 'error') {
                    Swal.fire({
                        title: "Error",
                        text: "Oppss, There's Something Wrong. Please Try Again :(",
                        icon: "error"
                    })
                } else {
                    Swal.fire({
                        title: "Success",
                        text: "IFrame Succesfully Updated  :)",
                        icon: "success"
                    }).then((res) => {
                        location.reload();
                    })
                }
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
            success: function(data) {
                var res = data.status;
                if (res == 'error') {
                    Swal.fire({
                        title: "Error",
                        text: "Oppss, There's Something Wrong. Please Try Again :(",
                        icon: "error"
                    })
                } else {
                    Swal.fire({
                        title: "Success",
                        text: "Announcement Succesfully Added  :)",
                        icon: "success"
                    }).then((res) => {
                        location.reload();
                    })
                }
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
            success: function(data) {
                var res = data.status;
                if (res == 'error') {
                    Swal.fire({
                        title: "Error",
                        text: "Oppss, There's Something Wrong. Please Try Again :(",
                        icon: "error"
                    })
                } else {
                    Swal.fire({
                        title: "Success",
                        text: "Announcement Succesfully Updated  :)",
                        icon: "success"
                    }).then((res) => {
                        location.reload();
                    })
                }
            }
        });

    })
    // end announcemenet
</script>