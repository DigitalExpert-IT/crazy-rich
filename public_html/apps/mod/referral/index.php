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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Join Date</th>
                                    <th>Referral Code</th>
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

                "Nikmati kesempatan ini, agar bisa terwujud segala impian anda yang tertunda, menjadi nyata <br><br>"+


                "Salam Hormat <br>" +
                "Team Smart Trade </p>",
            // icon: "success"
        })
    });
</script>