<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Latest Invest Transaction</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Invest ID</th>
                                <th>Fee</th>
                                <th>Before Fee</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($wd = mysqli_fetch_array($resWd)) { ?>
                                <tr>

                                    <?php

                                    if ($wd['status_wd'] == 'Success') {
                                        $class = 'success';
                                    } else if ($wd['status_wd'] == 'Reject') {
                                        $class = 'danger';
                                    } else {
                                        $class = 'warning';
                                    }
                                    ?>
                                    <td><?= $wd['wd_id'] ?></td>
                                    <td>$<?= $wd['fee_wd'] ?></td>
                                    <td>$<?= $wd['wd_beforefee'] ?></td>
                                    <td>$<?= $wd['total_wd'] ?></td>
                                    <td><?= $wd['tanggal_wd'] ?></td>
                                    <td><span class="badge rounded-pill bg-soft-<?= $class ?> font-size-12"><?= $wd['status_wd'] ?></span></td>
                                </tr>
                            <?php
                                $x++;
                            } ?>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>