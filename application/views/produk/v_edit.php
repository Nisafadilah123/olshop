<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Produk</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
			// notifikasi form kosong
			echo validation_errors('<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-info"></i>', '</h5> </div>');
			// notifikasi gagal upload
			if (isset($error_upload)) {
				echo '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5> </div>';
			}
			// mengarahkan ke controller produk dengan function edit jika berhasil edit data

			echo form_open_multipart('produk/edit/' . $produk->id_produk) ?>

            <div class="row">
                <div class="col-sm-12">
                    <!-- value digunakan untuk memanggil data yang telah tersimpan sebelumnya -->
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input name="nama_produk" class="form-control" placeholder="Masukkan Nama Produk"
                            value="<?= $produk->nama_produk ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Harga</label>
                        <input name="harga" class="form-control" placeholder="Masukkan Harga Produk"
                            value="<?= $produk->harga ?>">
                    </div>
                </div>

                <div class=" col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="<?= $produk->id_kategori ?>"><?= $produk->nama_kategori ?></option>
                            <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Berat Produk (Gr)</label>
                        <input type="number" min="0" name="berat" class="form-control"
                            placeholder="Masukkan berat Produk Dalam Satuan Gram" cols=" 10" rows="3"
                            value="<?= $produk->berat ?>">
                        </input>
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Stok Produk</label>
                        <input name="stok" class="form-control" placeholder="Masukkan stok Produk" cols=" 10" rows="3"
                            value="<?= $produk->stok ?>">
                        </input>
                    </div>
                </div>

                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Deskripsi Produk</label>
                        <input name="deskripsi" class="form-control" placeholder="Masukkan Keterangan Produk"
                            value="<?= $produk->deskripsi ?>">
                        </input>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ganti Gambar Produk</label>
                            <input type="file" class="form-control" id="preview_gambar" name="gambar">
                            </input>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <img src="<?= base_url('assets/gambar/' . $produk->gambar) ?>" id="gambar_load" alt=""
                                width="100px">
                        </div>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">Update
                        </button>
                        <a href="<?= base_url('produk') ?>" class="btn btn-success btn-sm">Kembali</a>
                    </div>
                </div>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
function bacaGambar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#gambar_load').attr('src', e.target.result);
        }
        r
eader.readAsDataURL(input.files[0]);
    }

}
$("#preview_gambar").change(function() {
    bacaGambar(this);
});
</script>