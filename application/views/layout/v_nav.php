<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
        <div class="contact-info mr-auto">

        </div>

    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><img src="<?= base_url() ?>frontend/assets/slider/logo.png" alt="">
            TOKOKNA<span>.</span></a></h1>
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>

                <li class="active">
                    <a href="<?= base_url() ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('#about') ?>">About Us</a>
                </li>
                <li><a href="<?= base_url('#produk') ?>">Product</a></li>

                <!-- list kategori -->

                <?php $kategori = $this->m_home->get_all_data_kategori(); ?>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">Category</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <?php foreach ($kategori as $key => $value) {
						?>
                        <li>
                            <div class="dropdown-divider"></div>

                            <a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>"
                                class="dropdown-item"><?= $value->nama_kategori ?> </a>
                        </li>
                        <?php } ?>


                    </ul>
                </li>
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">

                        <?php
						// jika email kosong maka akan muncul tampilan login/register dengan gambar foto pelanggan default
						if ($this->session->userdata('email') == "") { ?>
                        <a class="nav-link" href="<?= base_url('pelanggan/login') ?>">
                            <img src="<?= base_url(); ?>/template/dist/img/logo.png" width="30px"
                                class="brand-image img-circle elevation-3">
                            <span class="brand-text font-weight-light">Login/ Register</span>
                        </a>
                        <?php } else { ?>
                        <!--jika email terisi maka akan muncul tampilan nama dan foto pelanggan yang login-->

                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <img src="<?= base_url('assets/pelanggan/' . $this->session->userdata('foto')) ?>"
                                alt="User" class="brand-image img-circle elevation-3" style="width:50px;height:50px">
                            <span
                                class="brand-text font-weight-light"><?= $this->session->userdata('nama_pelanggan') ?></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('akun') ?>" class="dropdown-item">
                                <i class="fas fa-user"></i> My Account

                            </a>

                            <div class="dropdown-divider"></div>

                            <a href="<?= base_url('pesanan_saya') ?>" class="dropdown-item">
                                <i class="fas fa-shopping-cart"></i> My Order

                            </a>

                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('pelanggan/logout') ?>" class="dropdown-item dropdown-footer">Log
                                Out</a>
                        </div>
                        <?php } ?>

                    </li>

                    <!-- Messages Dropdown Menu -->
                    <?php
					$keranjang = $this->cart->contents();
					$jml_item = 0;
					foreach ($keranjang as $key => $value) {
						$jml_item = $jml_item + $value['qty'];
					}
					?>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="badge badge-danger navbar-badge"><?= $jml_item ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <?php if (empty($keranjang)) { ?>
                            <a href="#" class="dropdown-item">
                                <p>Keranjang Belanja Kosong</p>
                            </a>
                            <?php } else {
								// jika tidak
								// maka akan muncul perulangan dari keranjang terkait dengan detail produk berdasarkan nilai id
								foreach ($keranjang as $key => $value) {
									$produk = $this->m_home->detail_produk($value['id']);
								?>
                            <a href="#" class="dropdown-item">

                                <div class="media">
                                    <!-- yang akan di tampilkan jika keranjang tidak kosong adalah : gambar produk, nama produk, jumlah produk di beli dan di kali 
										dengan harga satuan dari produk, sub total -->

                                    <img src="<?= base_url('assets/gambar/' . $produk->gambar); ?>" alt="User Avatar"
                                        class="img-size-50 mr-3">
                                    <div class="media-body">
                                        <h6 class="dropdown-item-title">
                                            <?= $value['name'] ?>

                                        </h6>
                                        <p class="text-sm"><?= $value['qty'] ?> X Rp
                                            <?= number_format($value['price']) ?></p>
                                        <p class="text-sm text-muted"><i class="fa fa-calculator"></i> Rp
                                            <?php echo number_format($value['subtotal']); ?></p>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <?php } ?>
                            <a href="#" class="dropdown-item">
                                <div class="media">
                                    <div class="media-body">
                                        <tr>
                                            <td colspan="2"> </td>
                                            <td class="right"><strong>Total</strong></td>
                                            <td class="right">Rp <?php echo number_format($this->cart->total()); ?>
                                            </td>
                                        </tr>
                                    </div>
                                </div>
                            </a>


                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('belanja') ?>" class="dropdown-item dropdown-footer">View Cart</a>
                            <a href="<?= base_url('belanja/chekout') ?>" class="dropdown-item dropdown-footer">Check
                                Out</a>

                            <?php } ?>
                            <!-- Produk End -->

                        </div>
                    </li>
                    <!--Produk End -->
        </nav>
        <!-- .nav-
menu -->

































    </div>
</header><!-- End Header -->

<!-- Main content -->
<div class="content">
    <div class="container">