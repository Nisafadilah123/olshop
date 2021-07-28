<div class="col-12">
    <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <img src="<?= base_url('assets/gambar/logo.png') ?>" width="100px"> <?= $title ?>
                    <!-- Memanggil variabel tanggal, bulan dan tahun dari atribut function controller  laporan -->
                    <small class="float-right">Tanggal : <?= $tanggal ?>/<?= $bulan ?>/<?= $tahun ?></small>
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
                            <th>Nama Penerima</th>
                            <th>Produk Yang Di Beli</th>
                            <th>Harga</th>
                            <th>Jumlah Beli</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- memanggil data no.order, nama penerima, produk, dan harga, jumlah beli, dan total bayar berdasarkan tgl, bulan dan tahun pada tbl transaksi, 
						tbl rinci transaksi dan tbl produk-->

                        <?php $no = 1;
						$grand_total = 0;

						foreach ($laporan as $key => $value) {

							// perkalian antara sub total dengan qty ( jumlah produk yang di beli)
							$tot_harga = $value->qty * $value->harga;

							// penambahan dari grand total = 0 dengan sub total 
							// menggunakan perulangan penambahan
							$grand_total = $grand_total + $tot_harga
						?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $value->no_order ?></td>
                            <td><?= $value->atas_nama ?></td>
                            <td><?= $value->nama_produk ?></td>
                            <td>Rp <?= number_format($value->harga) ?></td>
                            <td><?= $value->qty ?></td>
                            <td>Rp<?= number_format($tot_harga) ?></td>
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
