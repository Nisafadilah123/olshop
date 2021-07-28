<br><br><br><br><br><br><br>
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <div class="col-sm-12">
                <?php
				// notifikasi pesan
				if ($this->session->flashdata('pesan')) {
					echo '<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h5><i class="icon fas fa-check"></i>';
					echo $this->session->flashdata('pesan');
					echo '</h5>
	</div>';
				}
				?>
            </div>


            <div class="col-sm-12">
                <?php
				// untuk perubahan inputan jumlah produk yang di beli dan perubahan harga serta berat berdasarkan jumlah produk yg di beli secara otomatis
				echo form_open('belanja/update'); ?>

                <table class="table" cellpadding="6" cellspacing="1" style="width:100%">

                    <tr>
                        <th width="85px">QTY</th>
                        <th>Nama Produk</th>
                        <th style="text-align:right">Harga</th>
                        <th style="text-align:right">Berat</th>
                        <th style="text-align:right">Sub-Total</th>
                        <th class="text-center">Action</th>
                    </tr>

                    <?php $i = 1; ?>

                    <?php
					$tot_berat = 0;
					foreach ($this->cart->contents() as $items) {
						$produk = $this->m_home->detail_produk($items['id']);
						$berat = $items['qty'] * $produk->berat;
						$tot_berat = $tot_berat + $berat;
					?>

                    <tr>
                        <td><?php echo form_input(array(
									'name' => $i . '[qty]',
									'value' => $items['qty'],
									'maxlength' => '3',
									'min' => '0',
									'size' => '5',
									'type' => 'number',
									'class' => 'form-control'
								)); ?>
                        </td>
                        <td>
                            <?php echo $items['name']; ?>

                        </td>
                        <td style="text-align:right">Rp <?php echo number_format($items['price']); ?></td>
                        <td style="text-align:right"><?php echo $berat; ?> Gr</td>
                        <td style="text-align:right">Rp <?php echo number_format($items['subtotal']); ?>
                        <td class="text-center">
                            <a href="<?= base_url('belanja/delete/' . $items['rowid']) ?>"
                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                        </td>
                    </tr>

                    <?php $i++; ?>

                    <?php } ?>

                    <tr>

                        <td class="left"><strong>Total : </strong></td>
                        <td class="left">
                            <strong>Rp <?php echo number_format($this->cart->total()); ?></strong>
                        </td>
                        <th>Total Berat :<?= $tot_berat ?> Gr</th>
                    </tr>

                </table>

                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?= base_url('#produk') ?>" class="btn btn-info btn-flat"><i
                                class="fas fa-arrow-left"></i> Kembali Ke Produk</a>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Update
                            Keranjang</button>
                        <a href="<?= base_url('belanja/clear') ?>" class="btn btn-danger btn-flat"><i
                                class="fa fa-trash"></i> Clear All</a>
                        <a href="<?= base_url('belanja/chekout') ?>" class="btn btn-success btn-flat"><i
                                class="fas fa-cart-plus"></i> Check Out</a>

                    </div>
                </div>

                <?php echo form_close(); ?>
                <br>

            </div>
        </div>

    </div>
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

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/template/dist/js/demo.js"></script>

<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 500)
</script>
</body>































</div>

</html>