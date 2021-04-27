<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Latest Deposit Transaction</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Order ID</th>
                                <th>IDR Total</th>
                                <th>Deposit Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($depo = mysqli_fetch_array($resDeposit)) { ?>
                                <tr>

                                    <?php

                                    if ($depo['status'] == 'Success') {
                                        $class = 'success';
                                    } else if ($depo['status'] == 'Reject') {
                                        $class = 'danger';
                                    } else {
                                        $class = 'warning';
                                    }
                                    ?>
                                    <td><?= $depo['order_id'] ?></td>
                                    <td><?= rupiah($depo['total_deposit_usd']) ?></td>
                                    <td><?= $depo['date_create'] ?></td>
                                    <td><span class="badge rounded-pill bg-soft-<?= $class ?> font-size-12"><?= $depo['status'] ?></span></td>
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