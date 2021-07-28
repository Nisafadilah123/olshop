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
                        aria-selected="true">Pesanan Masuk</a>
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
                    <table class="table">
                        <tr>
                            <th>No. Order</th>
                            <th>Atas Nama</th>
                            <th>Tanggal</th>
                            <th>Alamat</th>
                            <th>Ekspedisi</th>
                            <th>Total Bayar</th>
                            <th></th>
                        </tr>
                        <?php
						// pengecekan pesanan masuk sudah bayar atau belum
						// jika sudah bayar maka akan cek bukti pembayarannya
						// status order = 0
						foreach ($pesanan as $key => $value) { ?>
                        <tr>
                            <td><?= $value->no_order ?></td>
                            <td><?= $value->atas_nama ?></td>
                            <td><?= $value->tgl_order ?></td>

                            <td><b><?= $value->alamat ?></b><br>
                                Provinsi : <?= $value->provinsi ?><br>
                                Kota : <?= $value->kota ?><br>
                                Kode Pos : <?= $value->kode_pos ?><br>
                                No.Hp : <?= $value->no_hp ?>

                            </td>

                            <td><b><?= $value->ekspedisi ?></b><br>
                                Sub Total : Rp <?= number_format($value->grant_total) ?><br>
                                Ongkir : Rp <?= number_format($value->ongkir) ?><br>
                                Estimasi : <?= $value->estimasi ?>

                            </td>
                            <td>
                                <b>Rp <?= number_format($value->total_bayar) ?></b><br>
                                <?php if ($value->status_bayar == 0) { ?>
                                <span class="badge badge-danger">Belum Bayar</span>
                                <?php } else { ?>
                                <span class="badge badge-info">Sudah Bayar</span><br>
                                <span class="badge badge-warning">Menunggu Konfirmasi</span>

                                <?php } ?>
                            </td>
                            <td>

                                <?php if ($value->status_bayar == 1) { ?>
                                <button class="btn btn-sm btn-success btn-flat" data-toggle="modal"
                                    data-target="#cek<?= $value->id_transaksi ?>">Cek Bukti Bayar</button> <br><br>
                                <a href="<?= base_url('admin/verifikasi/' . $value->id_transaksi) ?>"
                                    class="btn btn-sm btn-flat btn-primary">Proses</a>
                                <?php } else if ($value->status_bayar == 0) { ?>

                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete<?= $value->id_transaksi ?>"><i
                                        class="fa fa-trash"></i></button>
                                <?php } else { ?>

                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>

                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-four-profile-tab">
                    <table class="table">
                        <tr>
                            <th>No. Order</th>
                            <th>Atas Nama</th>
                            <th>Tanggal</th>
                            <th>Alamat</th>
                            <th>Ekspedisi</th>
                            <th>Total Bayar</th>
                            <th></th>
                        </tr>
                        <?php
						// pengecekan pesanan masuk telah di proses admin atau belum
						// jika sudah konfirmasi maka akan muncul notifikasi
						// status order = 1
						foreach ($pesanan_diproses as $key => $value) { ?>
                        <tr>
                            <td><?= $value->no_order ?></td>
                            <td><?= $value->atas_nama ?></td>
                            <td><?= $value->tgl_order ?></td>

                            <td><b><?= $value->alamat ?></b><br>
                                Provinsi : <?= $value->provinsi ?><br>
                                Kota : <?= $value->kota ?><br>
                                Kode Pos : <?= $value->kode_pos ?><br>
                                No.Hp : <?= $value->no_hp ?>

                            </td>

                            <td><b><?= $value->ekspedisi ?></b><br>
                                Sub Total : Rp <?= number_format($value->grant_total) ?><br>
                                Ongkir : Rp <?= number_format($value->ongkir) ?><br>
                                Estimasi : <?= $value->estimasi ?>

                            </td>
                            <td>
                                <b>Rp <?= number_format($value->total_bayar) ?></b><br>

                                <span class="badge badge-primary">Diproses/Dikemas</span>
                            </td>
                            <td>
                                <?php if ($value->status_bayar == 1) { ?>
                                <button class="btn btn-sm btn-flat btn-info" data-toggle="modal"
                                    data-target="#kirim<?= $value->id_transaksi ?>"><i class="fas fa-truck-loading"></i>
                                    Kirim</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>


                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                    aria-labelledby="custom-tabs-four-messages-tab">
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
						// pengecekan pesanan dikirim dengan memasukkan no.resi
						// jika sudah di kirim, maka akan muncul notifikasi pengiriman
						// status order = 2
						foreach ($pesanan_dikirim as $key => $value) { ?>
                        <tr>
                            <td><?= $value->no_order ?></td>
                            <td><?= $value->atas_nama ?></td>
                            <td><?= $value->tgl_order ?></td>
                            <td><b><?= $value->alamat ?></b><br>
                                Provinsi : <?= $value->provinsi ?><br>
                                Kota : <?= $value->kota ?><br>
                                Kode Pos : <?= $value->kode_pos ?><br>
                                No.Hp : <?= $value->no_hp ?>

                            </td>

                            <td><b><?= $value->ekspedisi ?></b><br>
                                Sub Total : Rp <?= number_format($value->grant_total) ?><br>
                                Ongkir : Rp<?= number_format($value->ongkir) ?><br>
                                Estimasi : <?= $value->estimasi ?>

                            </td>
                            <td>
                                <b>Rp <?= number_format($value->total_bayar) ?></b><br>

                                <span class="badge badge-primary">Di Kirim</span>

                            </td>
                            <td><?= $value->no_resi ?></td>
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
						// pengecekan pesanan selesai atau sudah diterima atau belum
						// jika sudah di terima maka akan muncul notifikasi pesan barang telah di terima
						// status order = 3
						foreach ($pesanan_selesai as $key => $value) { ?>
                        <tr>
                            <td><?= $value->no_order ?></td>
                            <td><?= $value->atas_nama ?></td>
                            <td><?= $value->tgl_order ?></td>

                            <td><b><?= $value->alamat ?></b><br>
                                Provinsi : <?= $value->provinsi ?><br>
                                Kota : <?= $value->kota ?><br>
                                Kode Pos : <?= $value->kode_pos ?><br>
                                No.Hp : <?= $value->no_hp ?>

                            </td>

                            <td><b><?= $value->ekspedisi ?></b><br>
                                Sub Total : Rp <?= number_format($value->grant_total) ?><br>
                                Ongkir : Rp <?= number_format($value->ongkir) ?><br>
                                Estimasi : <?= $value->estimasi ?>

                            </td>
                            <td>
                                <b>Rp <?= number_format($value->total_bayar) ?></b><br>

                                <span class="badge badge-success">Selesai</span>

                            </td>
                            <td><?= $value->no_resi ?></td>
                            <td>

                                <?php if ($value->status_bayar == 1) { ?>
                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete<?= $value->id_transaksi ?>"><i
                                        class="fa fa-trash"></i></button>
                                <?php } ?>
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

<!-- looping -->
<?php foreach ($pesanan as $key => $value) { ?>

<!-- /.Modal Cek bukti Pembayaran -->
<div class="modal fade" id="cek<?= $value->id_transaksi ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= $value->no_order ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Nama Bank</th>
                        <th>:</th>
                        <td><?= $value->nama_bank ?></td>
                    </tr>
                    <tr>
                        <th>No. Rekening</th>
                        <th>:</th>

                        <td><?= $value->no_rek ?></td>
                    </tr>
                    <tr>
                        <th>Atas Nama</th>
                        <th>:</th>

                        <td><?= $value->atas_nama ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <td><b><?= $value->alamat ?></b><br>
                            Provinsi : <?= $value->provinsi ?><br>
                            Kota : <?= $value->kota ?><br>
                            Kode Pos : <?= $value->kode_pos ?><br>
                            No.Hp : <?= $value->no_hp ?><br>

                        </td>

                    </tr>
                    <tr>
                        <th>Total Bayar</th>
                        <th>:</th>

                        <td>Rp <?= number_format($value->total_bayar) ?></td>
                    </tr>


                </table>

                <img class="img-fluid pad" src="<?= base_url('assets/bukti_bayar/' . $value->bukti_bayar) ?>" alt="">
            </div>
            <div class="modal-footer justify-content-between">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>


<!-- looping -->
<?php foreach ($pesanan_diproses as $key => $value) { ?>

<!-- /.Modal Pesanan dikirim -->
<div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= $value->no_order ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <?php echo form_open('admin/kirim/' . $value->id_transaksi) ?>
                <table class="table">
                    <tr>
                        <th>Atas Nama</th>
                        <th>:</th>
                        <td><?= $value->atas_nama ?></td>
                    </tr>
                    <tr>
                        <th>Atas Nama</th>
                        <th>:</th>
                        <td><?= $value->alamat ?></td>
                    </tr>
                    <tr>
                        <th>Ekspedisi</th>
                        <th>:</th>
                        <td><?= $value->ekspedisi ?></td>
                    </tr>
                    <tr>
                        <th>Sub Total</th>
                        <th>:</th>

                        <td>Rp <?= number_format($value->grant_total) ?></td>
                    </tr>
                    <tr>
                        <th>Ongkir</th>
                        <th>:</th>

                        <td>Rp<?= number_format($value->ongkir) ?></td>
                    </tr>
                    <tr>
                        <th>No. Resi</th>
                        <th>:</th>

                        <th><input name="no_resi" class="form-control" placeholder="Masukkan No. Resi" required></th>
                    </tr>

                </table>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
            <?php echo form_close() ?>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>

<!-- /.modal delete pesanan selesai-->
<?php
foreach ($pesanan_selesai as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_transaksi ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete No. Order <?= $value->no_order ?></h4>


                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Apakah anda ingin menghapus data ini ?</h5>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="<?= base_url('admin/delete/' . $value->id_transaksi) ?>" class="btn btn-primary">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<?php } ?>

<!-- /.modal delete pesanan masuk-->
<?php
foreach ($pesanan as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_transaksi ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete No. Order <?= $value->no_order ?></h4>



                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Apakah anda ingin menghapus data ini ?</h5>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="<?= base_url('admin/delete/' . $value->id_transaksi) ?>" class="btn btn-primary">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<?php } ?>