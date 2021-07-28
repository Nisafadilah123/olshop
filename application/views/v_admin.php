    <!-- Dash board -->

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $total_pesanan ?></h3>

                <p>Pesanan Masuk</p>
            </div>
            <div class="icon">
                <i class="fas fa-cart-arrow-down"></i>
            </div>
            <a href="<?= base_url('admin/pesanan_masuk') ?>" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $total_barang ?></h3>

                <p>Produk</p>
            </div>
            <div class="icon">
                <i class="fas fa-cubes"></i>
            </div>
            <a href="<?= base_url('produk') ?>" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $total_pelanggan ?></h3>

                <p>Pelanggan</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="<?= base_url('pelanggan') ?>" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $total_kategori ?></h3>

                <p>Kategori</p>
            </div>
            <div class="icon">
                <i class="fas fa-list"></i>
            </div>
            <a href="<?= base_url('kategori') ?>" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>















    </div>
    <!-- ./col -->