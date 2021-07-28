<!-- Default box -->
<br><br><br><br><br><br><br>
<div class="card card-solid">

    <div class="card-body">
        <a href="<?= base_url('home') ?>" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
        <br>
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none"><?= $produk->nama_produk ?></h3>
                <div class="col-12">
                    <br>
                    <img src="<?= base_url('assets/gambar/' . $produk->gambar) ?>" class="product-image"
                        alt="Product Image" width="600px">
                </div>
                <!-- <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image">
                    </div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
                </div> -->
            </div>
            <div class="col-12 col-sm-4">
                <h3 class="my-3"><?= $produk->nama_produk ?></h3>
                <h4><?= $produk->nama_kategori ?></h4>
                <p>
                <h6>Deskripsi : <?= $produk->deskripsi ?></p>
                </h6>
                <p><?php if ($produk->stok <= 0) { ?>
                <h6><span class="badge badge-warning">
                        Stok Habis</span></h6>

                <hr>
                <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        Rp <?= number_format($produk->harga) ?>
                    </h2>

                </div>

                <?php } else { ?>
                <h6>Stok : <?= $produk->stok ?></h6>
                <h6>Berat : <?= $produk->berat ?> Gr</h6>

                <hr>

                <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        Rp <?= number_format($produk->harga) ?>
                    </h2>

                </div>

                <hr>
                <?php echo form_open('belanja/add');
						echo form_hidden('id', $produk->id_produk);
						echo form_hidden('price', $produk->harga);
						echo form_hidden('name', $produk->nama_produk);
						echo form_hidden('redirect_page', str_replace('index.php/', '', current_url())); ?>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-sm-4">
                            <input type="number" name="qty" class="form-control" value="1" min="1">
                        </div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-sm btn-primary swalDefaultSuccess">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php echo form_close(); ?>

            </div>

        </div>
        <!-- /.card-body -->
    </div>

    <!-- /.card -->
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

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/template/dist/js/demo.js"></script>

<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
$(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
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