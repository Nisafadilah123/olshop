<div class="col-12">


    <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> <?= $title ?>
                    <small class="float-right">Bulan : <?= $tahun ?></small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">

            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Order</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $grand_total = 0;

                        foreach ($laporan as $key => $value) {
                            $grand_total = $grand_total + $value->grant_total

                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $value->no_order ?></td>
                            <td><?= $value->tgl_order ?></td>

                            <td>Rp <?= number_format($value->grant_total) ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <h4>
                    Grand Total : Rp <?= number_format($grand_total) ?>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <button onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i>
                    Print</button>
            </div>
            <div class="col-12">
                <a href="<?= base_url('laporan') ?>" class="btn btn-success"><i class="fas fa-back"></i>
                    Print</button>
            </div>
        </div>
    </div>
    <!-- /.invoice -->
</div>
<!-- /.col 
-->