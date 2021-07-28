<br><br><br><br><br><br><br>

<div class=row>
    <div class="col col-sm-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">My Account</h3>
            </div>
            <!-- /.card-header -->
            <!-- <?php var_dump($content); ?> -->
            <div class="card-body">
                <div class="form-group">
                    <p>Lengkapi Data Anda :
                    </p><br>
                    <table class="table">
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>No. Hp</th>
                            <th>Email</th>
                            <th>Foto</th>
                        </tr>
                        <tr>
                            <td><?= $content->nama_pelanggan; ?> </td>
                            <td><?= $content->alamat; ?> </td>
                            <td><?= $content->no_hp; ?> </td>
                            <td><?= $content->email; ?> </td>
                            <td><?php
								// jika tidak ada foto maka akan ada output "tidak ada foto"
								if ($content->foto == '') { ?>
                                <p>Tidak Ada Foto</p>
                                <?php } else { ?>
                                <!-- jika ada -->

                                <img src="<?= base_url('assets/pelanggan/' . $content->foto) ?>" width="100px">

                                <?php } ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
            </div>
            <!-- /.card-header -->
            <!-- notifikasi form kosong-->
            <?php

			// echo validation_errors('<div class="alert alert-warning alert-dismissible">
			// 	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			// 	<h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian </h5>', '</div>');

			// if (isset($error_upload)) {
			// 	echo '<div class="alert alert-danger alert-dismissible">
			// 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			// 		<h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5> </div>';
			// }
			echo form_open_multipart('akun/update_akun')

			?>
            <!-- <?php var_dump($content); ?> -->

            <div class="card-body">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control" name="nama_pelanggan" placeholder="Masukkan Nama Lengkap"
                        value="<?= set_value('nama_pelanggan') ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap"
                        value="<?= set_value('alamat') ?>">
                </div>
                <div class="form-group">
                    <label>No. Hp</label>
                    <input class="form-control" name="no_hp" placeholder="Masukkan No. Hp"
                        value="<?= set_value('no_hp') ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" placeholder="Masukkan Email"
                        value="<?= set_value('email') ?>">
                </div>
                <div class="form-group">
                    <label>Foto Profil</label>
                    <input type="file" name="foto" class="form-control" id="preview_foto">
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <img src="<?= base_url('uploads/') ?>" id="foto_load" alt="" width="100px">
                    </div>
                </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= base_url('akun') ?>" class="btn btn-success">Kembali</a>

            </div>
            <?php echo form_close()
			?>
        </div>
    </div>

</div>

<script>
function bacaFoto(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#foto_load').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }

}


$("#preview_foto").change(function() {
    bacaFoto(this);
});
</script>
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