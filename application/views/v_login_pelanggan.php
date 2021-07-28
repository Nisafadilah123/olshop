<br><br><br><br><br><br><br><br>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="register-box">

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Login Pelanggan</p>

                    <?php
					// notifikasi pesan eror
					echo validation_errors('<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-exclamation-triangle"></i> Alert </h5>', '</div>');

					if ($this->session->flashdata('pesan')) {
						echo '<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><i class="icon fas fa-check"></i> Success </h5>';
						echo $this->session->flashdata('pesan');
						echo '</div>';
					}

					if ($this->session->flashdata('error')) {
						echo '<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><i class="icon fas fa-ban"></i> Gagal </h5>';
						echo $this->session->flashdata('error');
						echo '</div>';
					}

					echo form_open('pelanggan/login'); ?>

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="<?= set_value('email') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password"
                            value="<?= set_value('password') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <?php echo form_close(); ?>
                    <a href="<?= base_url('pelanggan/register') ?>" class="text-center">Have Not Account ?</a><br>
                    <!-- <a href="<?= base_url('pelanggan/reset_password_validation') ?>" class="text-center">Forgot
                        Password</a> -->

                </div>
                <!-- /.form-box -->
            </div>
        </div>
    </div>


    <div class="col-sm-4"></div>
</div>

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

<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 500)
</script>

</body>














</html>