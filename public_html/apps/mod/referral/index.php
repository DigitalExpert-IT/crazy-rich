<div class="page-content">
    <div class="container-fluid">
        <?php include('template/component/referral-card.php') ?>
        <!-- Table Referral -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
                            <h4 class="card-title">My Referral</h4>
                        </div>
                        <div class="table-responsive">
                            <table id="myreff" class="table table-centered table-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Join Date</th>
                                    <th>Referral Code</th>
                                    <th>Referral Total</th>
                                </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="topup" aria-hidden="true">

            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-md-12">

                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-4 col-sm-12 text-center">
                                                    <!-- <img src="" alt=""> -->
                                                    <i class="fa fa-user ml-5" style="font-size:170px"></i>
                                                </div>
                                                <div class="col-md-8 col-sm-12">
                                                    <div class="row ml-1">
                                                        <!-- <div class="col-4">Username</div>
                                                        <div class="col-8">: </div> -->
                                                        <h3 class="display-5" id="nama"></h3>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">Email</div>
                                                        <div class="col-8" id="email_user"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">Join Date</div>
                                                        <div class="col-8" id="join_date"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">Referral</div>
                                                        <div class="col-8" id="jumlah_referral"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="my-5 mx-5">
                            <div class="row" style="width:100%">
                                <div class="col-12 table-responsive">
                                    <table  class="table table-striped table-bordered nowrap" >
                                        <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Email - Phone</th>
                                            <th>Join Date</th>
                                            <th>Referral Code</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="table-referral"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        <!-- /.modal-dialog -->


    </div>
</div>
<script>
    $(document).ready(function () {
        var table = $('#myreff').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/referral/myreff.php",
            "columnDefs": [{
                "targets": [0],
                "visible": false
            },],

        });

        Swal.fire({
            title: "Smart Trade",
            html: "<p><b>Filosofi Semut</b>, di Smart Trade <br>" +
                "Semakin banyak semut, semakin besar pula sarang yang dimilikinya. " +
                "Setiap semut punya peran yang sama pentingnya dalam mengumpulkan makanan, <br>" +
                "besar kecilnya makanan yang terkumpul punya Tujuan dinikmati bersama-sama. <br> <br>" +

                "Dengan Program Refferal di Smart Trade, andalah yang memiliki peran penting kelangsungan perkembangan team. <br>" +
                "Anda berhak menerima Reward Refferal dari Smart Trade <br><br>" +

                "Bonus lv.1 : 8% <br>" +
                "Bonus lv.2 : 6% <br>" +
                "Bonus lv.3 : 4% <br><br>" +

                "Nikmati kesempatan ini, agar bisa terwujud segala impian anda yang tertunda, menjadi nyata <br><br>" +


                "Salam Hormat <br>" +
                "Team Smart Trade </p>",
            // icon: "success"
        })
    });

    function getReferral(user_id) {
        var id = user_id;

        if (id != '') {
            $.ajax({
                url: "mod/referral/detail_user.php",
                method: "POST",
                data: {
                    user_id: id
                },
                dataType: "JSON",
                success: function (data) {
                    $('.list-user-reff').remove();
                    let user = data['user'];

                    let nama = user['nama'];
                    // let users = user['user_id'];
                    let email = user['email_user'];
                    let join_date = user['date_join'];

                    let jumlah_referral = data['total'];


                    $("#nama").text(nama);
                    $("#email_user").text(`: ${email}`);
                    $("#join_date").text(`: ${join_date}`);
                    $("#jumlah_referral").text(`: ${jumlah_referral}`);

                    $("#table-member").html("");
                    $.each(data['referral'], function (i, val) {

                        $('#modal-default').modal('show');

                        $("#table-referral").append(`
                            <tr class='list-user-reff'>
                                <td>${val['nama']}</td>
                                <td>${val['email_user'] != null ? val['email_user'] : '-'} <br> ${val['phone'] != null ? val['phone'] : '-'}</td>
                                <td>${val['date_join']}</td>
                                <td>${val['reff_code']}</td>
                                <td><a href='#' id="Mymodal" class='btn btn-success' data-toggle='modal' data-target='#modal-default' onclick='getReferral(${val['user_id']})'>Detail</a></td>
                            </tr>
					    `);
                    });

                }
            })
        } else {


        }
    }

</script>