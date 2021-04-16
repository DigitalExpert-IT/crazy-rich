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
    $(document).ready(function() {
        var table = $('#myreff').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "mod/referral/myreff.php",
            "columnDefs": [{
                "targets": [0],
                "visible": false
            }, ],

        });

        Swal.fire({
            title: "SmarT-Trade",
            html: "<p><b>*SmarT-Trade, adalah Produk E.Book yang memberikan arahan investasi yang terbaik (Multi Trade).</b> <br><br>" +
                "Dengan masa waktu Profit yang telah di sepakati oleh investor <br>" +
                "4 hari, 10 hari, 30 hari, 60 hari <br><br>" +

                "Opsi Market yang tersedia di e.book SmarT-Trade adalah: <br>" +
                "# Cooking Oil <br>" +
                "# CryptoCurrency <br>" +
                "# Solar <br>" +
                "# Forex <br><br>" +

                "Cukup monitor keuntungan yang bertambah di akun anda, secara signifikan bersama SmarT-Trade. <br><br>" +
                "Salam Hormat, <br>" +
                "Team SmarT-Trade </p>",
            // icon: "success"
        })
    });
</script>