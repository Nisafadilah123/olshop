<br><br><br><br><br><br><br><br>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="register-box">

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Lupa Password Pelanggan</p>

                    <p>Untuk melakukan reset password, silakan masukkan alamat email anda. </p>
                    <?php echo form_open('lupa_password'); ?>
                    <p>Email:</p>
                    <p>
                        <input type="text" name="email" value="<?php echo set_value('email'); ?>" />
                    </p>
                    <p> <?php echo form_error('email'); ?> </p>
                    <p>
                        <input type="submit" name="btnSubmit" value="Submit" />
                    </p>

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
