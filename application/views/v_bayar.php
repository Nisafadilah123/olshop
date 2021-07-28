<br><br><br><br><br><br><br>

<div class=row>
    <div class="col col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">No. Rekening Toko</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="card-body">
                <div class="form-group">
                    <p>Silahkan transfer uang ke Nomor Rekening di bawah ini, sebesar :
                    <h2 class="text-primary">Rp <?= number_format($pesanan->total_bayar) ?>.-</h2>
                    </p><br>
                    <table class="table">
                        <tr>
                            <th>Nama Bank</th>
                            <th>No. Rekening</th>
                            <th>Atas Nama</th>
                        </tr>

                        <?php foreach ($rekening as $key => $value) { ?>
                        <tr>
                            <td><?= $value->nama_bank ?></td>
                            <td><?= $value->no_rek ?></td>
                            <td><?= $value->atas_nama ?></td>

                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Upload Bukti Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
			// form_open_multipart digunakan untuk mengarahkan url contoller dan mengupload file di dalamnya
			// mengarahkan ke controller dengan id transaksi
			echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi);
			?>
            <div class="card-body">
                <div class="form-group">
                    <label>Atas Nama</label>
                    <input class="form-control" name="atas_nama" placeholder="Masukkan Atas Nama" required>
                </div>
                <div class="form-group">
                    <label>Nama Bank</label>
                    <input class="form-control" name="nama_bank" placeholder="Masukkan Nama Bank" required>
                </div>
                <div class="form-group">
                    <label>No. Rekening</label>
                    <input class="form-control" name="no_rek" placeholder="Masukkan Nomor Rekening" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Bukti Pembayaran</label>
                    <input type="file" name="bukti_bayar" class="form-control" id="exampleInputFile" required>

                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-success">Kembali</a>

            </div>
            <?php echo form_close()
			?>
        </div>
    </div>


</div>
<br>

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>/frontend/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/frontend/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>/frontend/assets/vendor/php-email-form/validate.js"></script>


<script src="<?= base_url() ?>/frontend/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>/frontend/assets/vendor/counterup/counterup.min.js"></script>
<script src="<?= base_url() ?>/frontend/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>/frontend/assets/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url() ?>/frontend/assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>/frontend/assets/js/main.js"></script>

</body>
</div>


</html>
