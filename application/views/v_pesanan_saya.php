<br><br><br><br><br><br><br>
<div class="row">


    <div class="col-12 col-sm-12">
        <?php
		if ($this->session->flashdata('pesan')) {
			echo '<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h5><i class="icon fas fa-check"></i>';
			echo $this->session->flashdata('pesan');
			echo '</h5>
	</div>';
		}
		?>
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                            href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                            aria-selected="true">Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                            href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                            aria-selected="false">Diproses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                            href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages"
                            aria-selected="false">Dikirim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill"
                            href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings"
                            aria-selected="false">Selesai</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                        aria-labelledby="custom-tabs-four-home-tab">
                        <!-- /.belum bayar -->

                        <table class="table">
                            <tr>
                                <th>No. Order</th>
                                <th>Atas Nama</th>
                                <th>Tanggal</th>
                                <th>Alamat</th>
                                <th>Ekspedisi</th>
                                <th>Total Bayar</th>
                                <th>Action</th>
                            </tr>
                            <?php
							foreach ($belum_bayar as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->atas_nama ?></td>
                                <td><?= $value->tgl_order ?></td>

                                <td><b><?= $value->alamat ?></b><br>
                                    Provinsi : <?= $value->provinsi ?><br>
                                    Kota : <?= $value->kota ?><br>
                                    Kode Pos : <?= $value->kode_pos ?><br>
                                    Estimasi : <?= $value->estimasi ?>

                                </td>

                                <td><b><?= $value->ekspedisi ?></b><br>
                                    Grant Total : Rp <?= number_format($value->grant_total) ?><br>
                                    Ongkir : Rp <?= number_format($value->ongkir) ?>
                                </td>
                                <td>
                                    <b>Rp <?= number_format($value->total_bayar) ?></b><br>
                                    <?php if ($value->status_bayar == 0) { ?>
                                    <span class="badge badge-warning">Belum Bayar</span>
                                    <?php } else { ?>
                                    <span class="badge badge-success">Sudah Bayar</span><br>
                                    <span class="badge badge-primary">Menunggu Konfirmasi</span>

                                    <?php } ?>
                                </td>
                                <td>

                                    <?php if ($value->status_bayar == 0) { ?>
                                    <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>"
                                        class="btn btn-sm btn-flat btn-primary">Bayar</a> <?php } else { ?>

                                    <?php } ?>


                                </td>

                            </tr>
                            <?php } ?>


                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-four-profile-tab">
                        <!-- /.diproses -->

                        <table class="table">
                            <tr>
                                <th>No. Order</th>
                                <th>Atas Nama</th>
                                <th>Tanggal</th>
                                <th>Alamat</th>
                                <th>Ekspedisi</th>
                                <th>Total Bayar</th>
                            </tr>
                            <?php
							foreach ($diproses as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->atas_nama ?></td>
                                <td><?= $value->tgl_order ?></td>

                                <td><b><?= $value->alamat ?></b><br>
                                    Provinsi : <?= $value->provinsi ?><br>
                                    Kota : <?= $value->kota ?><br>
                                    Kode Pos : <?= $value->kode_pos ?><br>
                                    Estimasi : <?= $value->estimasi ?>
                                </td>

                                <td><b><?= $value->ekspedisi ?></b><br>
                                    Grant Total : Rp <?= number_format($value->grant_total) ?><br>
                                    Ongkir : Rp <?= number_format($value->ongkir) ?>
                                </td>
                                <td>
                                    <b>Rp <?= number_format($value->total_bayar) ?></b><br>
                                    <span class="badge badge-success">Terproses</span><br>
                                    <span class="badge badge-primary">Diproses/Dikemas</span>
                                </td>

                            </tr>
                            <?php } ?>


                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                        aria-labelledby="custom-tabs-four-messages-tab">
                        <!-- /.dikirim -->

                        <table class="table">
                            <tr>
                                <th>No. Order</th>
                                <th>Atas Nama</th>
                                <th>Tanggal</th>
                                <th>Alamat</th>
                                <th>Ekspedisi</th>
                                <th>Total Bayar</th>
                                <th>No. Resi</th>
                            </tr>
                            <?php
							foreach ($dikirim as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->atas_nama ?></td>
                                <td><?= $value->tgl_order ?></td>

                                <td><b><?= $value->alamat ?></b><br>
                                    Provinsi : <?= $value->provinsi ?><br>
                                    Kota : <?= $value->kota ?><br>
                                    Kode Pos : <?= $value->kode_pos ?><br>
                                    Estimasi : <?= $value->estimasi ?>

                                </td>

                                <td><b><?= $value->ekspedisi ?></b><br>
                                    Grant Total : Rp <?= number_format($value->grant_total) ?><br>
                                    Ongkir : Rp <?= ($value->ongkir) ?>
                                </td>
                                <td>
                                    <b>Rp <?= number_format($value->total_bayar) ?></b><br>
                                    <span class="badge badge-success">Dikirim</span><br>
                                </td>
                                <td><?= $value->no_resi ?><br>
                                    <button class="btn btn-primary btn-xs btn-flat" data-toggle="modal"
                                        data-target="#diterima<?= $value->id_transaksi ?>">Diterima</button>
                                </td>

                            </tr>
                            <?php } ?>


                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel"
                        aria-labelledby="custom-tabs-four-settings-tab">

                        <table class="table">
                            <tr>
                                <th>No. Order</th>
                                <th>Atas Nama</th>
                                <th>Tanggal</th>
                                <th>Alamat</th>
                                <th>Ekspedisi</th>
                                <th>Total Bayar</th>
                                <th>No. Resi</th>
                            </tr>
                            <?php
							foreach ($selesai as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->atas_nama ?></td>
                                <td><?= $value->tgl_order ?></td>

                                <td><b><?= $value->alamat ?></b><br>
                                    Provinsi : <?= $value->provinsi ?><br>
                                    Kota : <?= $value->kota ?><br>
                                    Kode Pos : <?= $value->kode_pos ?><br>
                                    Estimasi : <?= $value->estimasi ?>

                                </td>

                                <td><b><?= $value->ekspedisi ?></b><br>
                                    Grant Total : Rp <?= number_format($value->grant_total) ?><br>
                                    Ongkir : Rp <?= number_format($value->ongkir) ?>
                                </td>
                                <td>
                                    <b>Rp <?= number_format($value->total_bayar) ?></b><br>
                                    <span class="badge badge-success">Selesai</span><br>
                                </td>
                                <td><?= $value->no_resi ?><br>

                                </td>

                            </tr>
                            <?php } ?>


                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
</div>


<!-- looping -->
<?php foreach ($dikirim as $key => $value) { ?>

<!-- /.Modal Pesanan dikirim -->
<div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pesanan Di terima</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">


                Apakah anda yakin pesanan telah diterima ?
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>"
                    class="btn btn-primary">Iya</a>
            </div>
            <?php echo form_close() ?>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>

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







<script src="<?= base_url() ?>/frontend/assets/js/main.js"></script>

<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 500)
</script>


</div>
</body>

</html>