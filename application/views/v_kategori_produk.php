<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <br><br><br><br><br>
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?= base_url(); ?>/assets/slider/slide.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url(); ?>/assets/slider/slide1.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url(); ?>/assets/foto/family.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<section id="produk" class="pricing">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Category</h2>
            <h3>Semua Produk berdasarkan kategori <span>UMKM</span></h3>
            <p>Pilih Produk Yang Anda Inginkan</p>
        </div>

        <div class="row">
            <?php foreach ($produk as $key => $value) { ?>

            <div class="col-sm-4" style="margin-bottom: 10px;">
                <?php
					echo form_open('belanja/add');
					echo form_hidden('id', $value->id_produk);
					echo form_hidden('qty', 1);
					echo form_hidden('price', $value->harga);
					echo form_hidden('name', $value->nama_produk);
					echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
					?>
                <div>
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            <h4 class="lead"><?= $value->nama_produk ?></h4>
                            <p class="text-muted text-sm"><b>Kategori: </b> <?= $value->nama_kategori ?></p>
                            <p class="text-muted text-sm"><b>Stok: </b> <?php if ($value->stok <= 0) { ?>
                                <span class="badge badge-warning">Stok Habis</span>
                                <?php } else { ?>
                                <?= $value->stok ?>
                                <?php } ?>

                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <img src="<?= base_url('assets/gambar/' . $value->gambar); ?>" height="200px"
                                        width="200px">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-left">
                                        <h6>Rp <?= number_format($value->harga) ?></h6>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="text-right">
                                        <a href="<?= base_url('home/detail_produk/' . $value->id_produk) ?>"
                                            class="btn btn-sm btn-success">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <?php if ($value->stok <= 0) { ?>
                                        <?php } else { ?>

                                        <button type="submit" class="btn btn-sm btn-primary swalDefaultSuccess">
                                            <i class="fas fa-cart-plus"></i> Add
                                            <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
</section><!-- End Pricing Section -->


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


<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
$(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton = false,


        timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
        Toast.fire({
            icon: 'success',
            title: 'Barang Berhasil Ditambahkan ke Keranjang ',
        })
    });









});
</script>