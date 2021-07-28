<br><br><br><br><br><br><br>
<!-- Main content -->
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-shopping-cart"></i> Check Out
                <small class="float-right">Date: <?= date('d-m-Y') ?></small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">

    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Nama Produk</th>
                        <th>Berat</th>
                        <th>Harga</th>
                        <th>Total Harga</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                    <?php
					$tot_berat = 0;

					foreach ($this->cart->contents() as $items) {
						// pemanggilan detail produk cart berdasarkan id
						$produk = $this->m_home->detail_produk($items['id']);
						// total berat = jumlah beli * berat produk per pcs
						$berat = $items['qty'] * $produk->berat;
						// total berat = $total berat = 0 + $berat
						$tot_berat = $tot_berat + $berat;
					?>
                    <tr>
                        <td><?= $items['qty'] ?></td>
                        <td><?= $items['name'] ?></td>
                        <td><?= $berat ?> Gr</td>
                        <td>Rp <?= number_format($items['price']) ?></td>
                        <td>Rp <?= number_format($items['subtotal']) ?></td>

                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <?php
	echo validation_errors('<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');

	?>


    <?php

	echo form_open('belanja/chekout');
	$no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
	//echo $no_order;
	?>
    <div class="row">
        <!-- accepted payments column -->
        <div class="col-sm-8 invoice-col">
            <!-- <p class="lead">Payment Methods:</p>
            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
           </p> -->
            Tujuan :
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" class="form-control"></select>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kota/Kabupaten </label>
                        <select name="kota" id="kota" class="form-control"></select>
                    </div>

                </div>

                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Ekspedisi</label>
                        <select name="ekspedisi" class="form-control"></select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Paket </label>
                        <select name="paket" id="paket" class="form-control"></select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" class="form-control" placeholder="Masukkan Alamat Lengkap Pengiriman"
                            required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kode Pos</label>
                        <input name="kode_pos" class="form-control" placeholder="Masukkan Kode Pos Tempat Pengiriman"
                            required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Penerima</label>
                        <input name="nama_penerima" class="form-control" placeholder="Masukkan Nama Lengkap Penerima"
                            required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>No. HP</label>
                        <input name="no_hp" class="form-control" placeholder="Masukkan No. Hp Penerima" required>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.col -->

        <div class="col-4">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Sub Total:</th>
                        <th>Rp <?= number_format($this->cart->total()) ?>
                            <!-- <input type="text" name="grant_total" value="<?= $this->cart->total() ?>"> -->
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%">Berat Total:</th>
                        <th><?= $tot_berat ?> Gr
                        </th>
                    </tr>

                    <tr>
                        <th>Biaya Pengiriman: </th>
                        <td><label id="ongkir"></label></td>
                    </tr>
                    <tr>
                        <th>Total Bayar: </th>
                        <td><label id="total_bayar"></label></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- simpan tranksaksi -->
    <input name="no_order" value="<?= $no_order ?>" hidden>
    <input name="estimasi" id="estimasi" hidden>
    <input name="ongkir" hidden>
    <input name="grant_total" value="<?= $this->cart->total() ?>" hidden><br><br>
    <input name="total_bayar" hidden>
    <input name="berat" value="<?= $tot_berat ?>" hidden>

    <input type="hidden" name="kota_value" id="kota_value">

    <!-- endsimpan tranksaksi -->
    <!-- simpan tranksaksi -->
    <?php
	$i = 1;
	foreach ($this->cart->contents() as $items) {
		echo form_hidden("qty" . $i++, $items['qty']);
	}
	?>
    <!-- endsimpan tranksaksi -->

    <br><br>
    <div class="row no-print">
        <div class="col-12">
            <a href="<?= base_url('belanja') ?>" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali Ke
                Keranjang</a>
            <button type="submit" class="btn btn-success float-right"><i class="fas fa-shopping-cart"></i> Proses
                Check Out
            </button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<!-- /.invoice -->

<script>
$(document).ready(function() {
    // masukkan data ke provinsi
    $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/provinsi') ?>",
        success: function(hasil_provinsi) {
            //console.log(hasil_provinsi);
            $("select[name=provinsi]").html(hasil_provinsi);
        }
    });
    // masukkan data ke kota
    $("select[name=provinsi]").on("change", function() {
        var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

        // console.log(id_provinsi_terpilih);
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/kota') ?>",
            data: 'id_provinsi=' + id_provinsi_terpilih,
            success: function(hasil_kota) {
                //console.log(hasil_kota);
                $("select[name=kota]").html(hasil_kota);
            }
        });
    });

    // dapat data ekspedisi
    $("select[name=kota]").on("change", function() {
        var id_kota_tujuan_terpilih = $("#kota option:selected").attr('id_kota');
        // console.log(id_kota_tujuan_terpilih);
        $('#kota_value').val(id_kota_tujuan_terpilih);

        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/ekspedisi') ?>",
            // data: 'id_kota=' + id_kota,

            success: function(hasil_ekspedisi) {
                //console.log(hasil_ekspedisi);
                $("select[name=ekspedisi]").html(hasil_ekspedisi);
            }
        });
    });

    // dapat data ekspedisi paket
    $("select[name=ekspedisi]").on("change", function() {
        // mendapatkan ekspedisi terpilih
        var ekspedisi_terpilih = $("select[name=ekspedisi]").val()
        // mendapat id kota tujuan terpilih
        var id_kota_tujuan_terpilih = $('#kota_value').val();;
        // $("#benih option:selected").attr(“lama”);
        var total_berat = <?= $tot_berat ?>;
        console.log(id_kota_tujuan_terpilih);
        //alert(total_berat);

        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/paket') ?>",
            data: {
                // kota: $("select[name=kota]").val(),
                kota: id_kota_tujuan_terpilih,
                service: $("select[name=ekspedisi]").val(),
                berat: +total_berat,
            },
            success: function(hasil_paket) {
                //console.log(hasil_paket);
                $("select[name=paket]").html(hasil_paket);
            }
        });
    });

    $("select[name=paket]").on("change", function() {
        var estimasivalue = $("#paket option:selected").attr('estimasi');


        // menampilkan biaya pengiriman
        var dataongkir = "Rp  " + $("select[name=paket]").val();

        var reverse = dataongkir.toString().split('').reverse().join(''),
            ribuan_ongkir = reverse.match(/\d{1,3}/g);
        ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');

        // Cetak hasil	
        //document.write(ribuan);

        $("#ongkir").html("Rp  " + ribuan_ongkir);

        //menghitung total bayar
        var ongkir = $("select[name=paket]").val();
        var total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total() ?>);

        var reverse2 = total_bayar.toString().split('').reverse().join(''),
            ribuan_total_bayar = reverse2.match(/\d{1,3}/g);
        ribuan_total_bayar = ribuan_total_bayar.join(',').split('').reverse().join('');

        $("#total_bayar").html("Rp  " + ribuan_total_bayar);
        // var gt = $('#grant_total').val();

        //estimasi dan ongkir

        var estimasi = $('input[name=estimasi]').val(estimasi);

        var paket = $("select[name=paket]").val();
        $("input[name=ongkir]").val(ongkir);
        $("input[name=total_bayar]").val(total_bayar);
        $("input[name=estimasi]").val(estimasivalue);


        console.log(estimasi);

    });

});
</script>

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