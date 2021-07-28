<div class="col-12">
    <div class="invoice p-3 mb-3">
        <div class="row">
            <div class="col-12">
                <h4>
                    <img src="<?= base_url('assets/gambar/logo.png') ?>" width="100px"> <?= $title ?>
                    <!-- Memanggil variabel bulan dan tahun dari atribut function controller  laporan -->
                    <small class="float-right">Bulan : <?= $bulan ?>/<?= $tahun ?></small>
                </h4>
            </div>
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
                            <th>Nama Penerima</th>
                            <th>Tanggal</th>
                            <th>Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- memanggil data no.order, nama penerima, tgl order, dan total bayar berdasarkan tgl, bulan dan tahun pada tbl transaksi-->
                        <?php $no = 1;
						$grand_total = 0;

						foreach ($laporan as $key => $value) {
							// penambahan dari grant total (harga bayar) dengan grand total yang di mulai dari 0
							// menggunakan perulangan penambahan
							$grand_total = $grand_total + $value->grant_total

						?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $value->no_order ?></td>
                            <td><?= $value->atas_nama ?></td>
                            <td><?= $value->tgl_order ?></td>

                            <td>Rp <?= number_format($value->grant_total) ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <h4>
                    Total Penjualan: Rp <?= number_format($grand_total) ?>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <a href="<?= base_url('laporan') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i>
                    Kembali</a>

                <button onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i>
                    Print</button>
            </div>
        </div>
    </div>
    <!-- /.invoice -->
</div>
<!-- /.col 
-->
