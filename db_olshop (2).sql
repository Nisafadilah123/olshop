-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2021 pada 14.44
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_olshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `ket` varchar(30) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `ket`, `gambar`) VALUES
(1, 1, 'matang', 'gambar (1).jpg'),
(2, 2, 'matang', 'gambar (2).jpg'),
(3, 5, 'matang', 'gambar (3).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(244) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Industri Olahan'),
(2, 'Hewan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `token` varchar(30) DEFAULT NULL,
  `created_at` time DEFAULT NULL,
  `is_active` int(2) DEFAULT NULL,
  `reset_password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `alamat`, `no_hp`, `foto`, `token`, `created_at`, `is_active`, `reset_password`) VALUES
(9, 'Nisa Fadilah', 'nisafadilah646@gmail.com', '$2y$10$xhD7Pk9rKAtYV046vyqB/u9.r4AWd.tNI5OCvLwuD8XRiVAQiB0FW', 'Blok Welut, Desa Gabus kulon, Kec. Gabuswetan, Kab. Indramayu', '085794337905', 'Start-up_(스타트업)_Kdrama_-_Team_Sticker_by_nurlaily.jpg', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `stok` varchar(30) DEFAULT NULL,
  `berat` varchar(30) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `harga`, `deskripsi`, `stok`, `berat`, `gambar`) VALUES
(1, 'Kerupuk kulit Ikan Bintang Ulam', 1, 10000, 'Terbuat dari kulit ikan segar, dan dijamin kerenyahan serta rasanya yang tak akan bisa di bohongi', '30', '300', 'bintang_ulam_(2).png'),
(2, 'Kerupuk kulit Ikan Dua Jari', 1, 10000, 'Terbuat dari kulit ikan segar, dan dijamin kerenyahan serta rasanya yang tak akan bisa di bohongi serta dengan harga yang terjangkau', '30', '350', 'Dua_Jari-Industri_Olahan_1.png'),
(5, 'Kerupuk kulit Sapi Kuda Laut', 1, 10000, 'Terbuat dari kulit sapi segar, dan dijamin kerenyahan serta rasanya yang tak akan bisa di bohongi serta dengan harga yang terjangkau.', '28', '350', 'Kuda_Laut-Industri_Olahan_2.png'),
(6, 'Kerupuk kulit Ikan Kuda Laut', 1, 10000, 'Terbuat dari kulit ikan segar, dan dijamin kerenyahan serta rasanya yang tak akan bisa di bohongi', '30', '350', 'Kuda_Laut-Industri_Olahan_1.jpeg'),
(7, 'Kerupuk kulit Ikan Pitaloka', 1, 10000, 'Terbuat dari kulit ikan segar, dan dijamin kerenyahan serta rasanya yang tak akan bisa di bohongi serta dengan harga yang terjangkau', '28', '350', 'Pita_Lka-Industri_Olahan_2.jpeg'),
(8, 'Kerupuk kulit Ikan Indy', 1, 10000, 'Terbuat dari kulit ikan segar, dan dijamin kerenyahan serta rasanya yang tak akan bisa di bohongi serta dengan harga yang terjangkau', '30', '350', 'Indy-Industri_Olahan_1.png'),
(9, 'Kerupuk Kulit Lambung Ikan Indy', 1, 10000, 'Terbuat dari lambung ikan yang biasanya di buang. Saat ini lambung ikan dapat diolah menjadi makanan yang enak untuk dimakan dengan harga terjangkau dan rasa yang tak berdusta', '30', '350', 'Indy-Industri_Olahan_3.jpeg'),
(10, 'Kerupuk Kulit Ikan Mujaer Nila YP', 1, 10000, 'Terbuat dari kulit ikan mujaer dan nila yang segar, dengan harga yang terjangkau dan kerenyahan yang tak diragukan lagi', '30', '350', 'Yoga_Putra-Industri_Olahan_2.jpeg'),
(11, 'Kerupuk Udang Putri Anjani', 1, 10000, 'Terbuat dari ekstrak udang dan kerenyahan yang khas dan aroma yang unik', '30', '350', 'Putri_Anjani-INdustri_Olahan_1.png'),
(12, 'Kerupuk Panggang Rz', 1, 10000, 'Terbuat dari bahan krupuk yang di goreng dengan sedikit minyak, yang tapi tetap enak meski dengan minyak sedikit', '30', '350', 'RZ-Industri_Olahan_1.jpeg'),
(13, 'Kerupuk Mie Crispy ', 1, 25000, 'Krupuk mie yang cocok untuk menemani teman makanmu, dengan harga yang terjangkau anda dapat menikmatinya', '30', '350', 'Rizal-Pembuatan_Kerupuk_mie_crispy.jpg'),
(14, 'Kerupuk Bawang Dua Udang', 1, 65000, 'Krupuk mentah siap dimasak', '29', '1000', 'Dua_Udang-Industri_Olahan.png'),
(15, 'Kerupuk Terasi Udang Kencana', 1, 60000, 'Kerupuk mentah yang siap dimasak untuk menemani teman makan anda sehari-hari', '30', '350', 'Kereta_Kencana-Industri_Olahan_2.jpeg'),
(16, 'Kerupuk Udang Menara', 1, 25000, 'Terbuat dari ekstrak udang dan kerenyahan yang khas dan aroma yang unik. Krupuk yang siap dimasak untuk menemani teman makan anda', '30', '350', 'Menara-Industri_Olahan_(1).png'),
(17, 'Keripik Pisang Rahmat', 1, 10000, 'Keripik pingsan dengan harga terjangkau', '30', '350', 'Rahmat-Industri_Olahan_1.png'),
(18, 'Keripik Usus Kenanga Mandiri', 1, 18000, 'Terbuat dari usus ayam yang di goreng kering dengan minyak yang disaring agar bisa dijadikan keripik', '30', '350', 'Retno_Indra_Siswanto-Industri_Olahan1.jpg'),
(19, 'Syrup Mangga Kenanga Mandiri', 1, 25000, 'Terbuat dari buah Mangga Gedong Gincu Pilihan yang diolah dan dikemas secara higienis sehingga menghasilkan produk yang layak dikonsumsi.', '30', '245', 'Retno_Indra_Siswanto-Industri_Olahan2.png'),
(20, 'Jambal Roti Kenanga Mandiri', 1, 25000, 'Terbuat dari Jambal Roti Pilihan yang diolah dan dikemas secara higienis sehingga menghasilkan produk yang layak dikonsumsi.', '30', '350', 'Retno_Indra_Siswanto-Industri_Olahan3.png'),
(21, 'Juice Mangga Kenanga Mandiri', 1, 8000, 'Terbuat dari buah Mangga Gedong Gincu Pilihan yang diolah dan dikemas secara higienis sehingga menghasilkan produk yang layak dikonsumsi. Berat 330 ml ', '30', '350', 'Retno_Indra_Siswanto-Industri_Olahan4.jpg'),
(22, 'Dodol Mangga Kenanga Mandiri', 1, 20000, 'Terbuat dari buah Gedong Gincu Pilihan yang diolah dan dikemas secara higienis sehingga menghasilkan produk yang layak dikonsumsi.', '30', '350', 'Retno_Indra_Siswanto-Industri_Olahan5.png'),
(23, 'Manisan Mangga Kenanga Mandiri', 1, 25000, '                            Harga per-bungkus												', '30', '350', 'Retno_Indra_Siswanto-Industri_Olahan.jpg'),
(24, 'Minuman \" Kenanga (N) \" Sweet Brown Flavour', 1, 3000, 'Minuman yang terbuat dengan bahan alami dan dapat menyegarkan di saat cuaca panas', '30', '350', 'Minuman_Kenangan_Industri_Olahan_31.jpg'),
(25, 'Minuman ', 1, 30000, 'Minuman yang terbuat dengan bahan alami dan dapat menyegarkan di saat cuaca panas', '30', '350', 'Minuman_Kenangn-Industri_Olahan_1.jpg'),
(26, 'Minuman \" Kenanga (N) \" Pink Lava Flavour', 1, 30000, 'Big size						', '30', '350', 'Minuman_Kenangan-Industri_Olahan_2.jpg'),
(27, 'Tempe Maskunah', 1, 3000, 'Harga per-pcs											', '30', '350', 'Maskunah-Industri_Olahan_(Pembuatan_Tempe)4.jpg'),
(28, 'Ikan Gurame Wamin', 2, 30000, 'ikan segar yang dirawat dengan baik', '30', '350', 'SCaKPFXHuxnSfYQUGviW7Cr3EqRk9CDHPninf97j.jpg'),
(29, 'Ikan Gurame Khusen', 2, 30000, 'ikan segar yang dirawat dengan baik', '30', '350', 'S46eXn5y4h6vV88WBEft3LdQb69qCq40FZ94qCZN.jpg'),
(30, 'Ikan Gurame Hadi Suwanto', 2, 30000, 'ikan segar yang dirawat dengan baik', '30', '350', 'PmyzWp5Rxi7KHzIZUHTDZhrkcQhVs9oOQQIsR7u8.jpg'),
(31, 'Ikan Gurame Karsijan', 2, 30000, 'ikan segar yang dirawat dengan baik', '30', '350', 'Xy1lDHUScHsgYSa26Exv7LDqJzvNUVwhsoe1v931.jpg'),
(32, 'Ikan Nila Merah Hadi Suwanto', 2, 25000, 'ikan segar yang dirawat dengan baik', '30', '1000', 'xyz6f8rZBeXtDVk1agB4XfntTWPm3axUJhkgtkmu.jpg'),
(33, 'Ikan Nila Merah Saepudin', 2, 25000, 'ikan segar yang dirawat dengan baik', '30', '350', 'sAHyxBdroZcrCFyBxKKkhnZVKlqoA1v6YrPKQ5cd.jpg'),
(34, 'Ikan Nila Merah Sanuri', 2, 25000, 'ikan segar yang dirawat dengan baik', '30', '350', 'juastyvKosbfqOaXBJFTrWp343SUI8rdoI4lDV7j.jpg'),
(35, 'Ikan Cupang Roby', 2, 50000, 'ikan segar yang dirawat dengan baik', '30', '350', 'CvlShnMYWRY0bjbHAEn8j5gEaM74uNIJoJohnO31.png'),
(36, 'Ikan Cupang Badrudin', 2, 30000, 'ikan segar yang dirawat dengan baik', '30', '350', 'GgTNDID43225cTE6hFESN0VuwDRCb8lKQxg3S1k2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(11) DEFAULT NULL,
  `no_rek` varchar(30) DEFAULT NULL,
  `atas_nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '420301012368535', 'Rizal Baharuddin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rinci_transaksi`
--

CREATE TABLE `tbl_rinci_transaksi` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(30) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rinci_transaksi`
--

INSERT INTO `tbl_rinci_transaksi` (`id_rinci`, `no_order`, `id_produk`, `qty`) VALUES
(5, '20210518H0OVFSCI', 5, 3),
(6, '20210518H0OVFSCI', 7, 1),
(7, '20210518H0OVFSCI', 10, 1),
(8, '20210518CXP5AFDL', 5, 3),
(9, '20210518CXP5AFDL', 7, 1),
(10, '20210518CXP5AFDL', 10, 1),
(11, '20210518CXP5AFDL', 9, 1),
(12, '20210518FY34OUQW', 18, 1),
(13, '20210518M3MZUHKD', 19, 1),
(14, '20210518M3MZUHKD', 15, 1),
(15, '202105196KQJOYAW', 15, 1),
(16, '20210519AZ9V4RX7', 13, 1),
(17, '20210519DTPOMBOW', 8, 1),
(18, '20210520DX7AZF6M', 10, 1),
(19, '20210520ZDKE9S0M', 7, 1),
(20, '20210520H4ZGKROV', 7, 1),
(21, '20210521QZLEID72', 8, 3),
(22, '20210521QZLEID72', 5, 1),
(23, '20210521QZLEID72', 7, 1),
(24, '20210521IEPUB5J4', 7, 2),
(25, '20210522CHTBQIOU', 7, 4),
(26, '20210522CHTBQIOU', 14, 1),
(27, '20210522CHTBQIOU', 1, 2),
(28, '20210522XAFAPN5J', 8, 1),
(29, '20210522UJ7FWAW5', 7, 1),
(30, '202105230GPZBA2E', 7, 1),
(31, '20210524HVNWDQY0', 7, 30),
(32, '20210528UIFW4WLG', 14, 1),
(33, '20210529VQC240AB', 5, 1),
(34, '20210601UUL79ISF', 7, 1),
(35, '20210603VE1JZLMA', 7, 1),
(36, '20210603MFSIKOPL', 1, 1),
(37, '202106065CVSHBNP', 5, 1);

--
-- Trigger `tbl_rinci_transaksi`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tbl_rinci_transaksi` FOR EACH ROW BEGIN
UPDATE produk set stok = stok-NEW.qty
WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(30) DEFAULT NULL,
  `lokasi` varchar(30) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_toko`, `lokasi`, `alamat`, `no_hp`) VALUES
(1, 'Tokokna', '149', 'Desa Kenanga, Kecamatan Sindang, Kabupaten Indramayu', '0895325496888');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_order` varchar(20) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(30) DEFAULT NULL,
  `no_hp` varchar(30) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(30) DEFAULT NULL,
  `berat` int(30) DEFAULT NULL,
  `ekspedisi` varchar(30) DEFAULT NULL,
  `paket` varchar(30) DEFAULT NULL,
  `estimasi` varchar(30) DEFAULT NULL,
  `ongkir` int(30) DEFAULT NULL,
  `grant_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` varchar(255) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(20) DEFAULT NULL,
  `nama_bank` varchar(30) DEFAULT NULL,
  `no_rek` varchar(30) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_pelanggan`, `no_order`, `tgl_order`, `nama_penerima`, `no_hp`, `provinsi`, `kota`, `alamat`, `kode_pos`, `berat`, `ekspedisi`, `paket`, `estimasi`, `ongkir`, `grant_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`) VALUES
(20, 7, '202105230GPZBA2E', '2021-05-23', 'hskakd', '082123456789', 'Kalimantan Selatan', 'Tapin', 'jkasjkd', '38729749', NULL, 'jne', '52000', '5-7 Hari', 52000, 10000, 62000, '1', 'Screenshot_(10).png', 'nisa', 'bri', '19837869210393939', 1, NULL),
(22, 7, '20210528UIFW4WLG', '2021-05-28', 'nisa', '085331456789', 'Jawa Barat', 'Indramayu', 'Desa Gabus', '35353', NULL, 'jne', '7000', '2-3 Hari', 7000, 65000, 72000, '1', 'Screenshot_(7).png', 'nisa', 'bri', '19837869210393939', 2, '723797139'),
(24, 7, '20210601UUL79ISF', '2021-06-01', 'sri', '085331456789', 'Kalimantan Utara', 'Bulungan (Bulongan)', 'tambi', '62681', NULL, 'jne', '63000', '5-7 Hari', 63000, 10000, 73000, '1', 'uml_proyek.png', 'sajsd', 'bri', '19837869210393939', 1, NULL),
(25, 9, '20210603VE1JZLMA', '2021-06-03', 'nisa', '085331456789', 'Jawa Barat', 'Indramayu', 'Indramayu kota', '454646', NULL, 'jne', '7000', '2-3 Hari', 7000, 10000, 17000, '1', 'Bukti-Transfer51.jpg', 'nisa', 'bri', '90324857287102', 3, '2719820180'),
(26, 9, '20210603MFSIKOPL', '2021-06-03', 'nisa', '085331456789', 'Jawa Barat', 'Indramayu', 'Indramayu kota', '464646', NULL, 'jne', '7000', '2-3 Hari', 7000, 10000, 17000, '1', 'Bukti-Transfer52.jpg', 'nisa', 'bri', '19837869210393939', 0, NULL),
(27, 9, '202106065CVSHBNP', '2021-06-06', 'alya', '085321456780', 'Kalimantan Timur', 'Balikpapan', 'balikpapan', '739279', NULL, 'jne', '50000', '3-5 Hari', 50000, 10000, 60000, '0', NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level_user` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `email`, `password`, `level_user`) VALUES
(23, 'Rizal', 'Admin 1', 'rizal@gmail.com', '$2y$10$3eufyLvMvFd0Nq12aOPhY.Nua28l0DcOZYd2FpZE9SgremzgqrMsu', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tokens`
--

CREATE TABLE `tokens` (
  `id_token` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id_token`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
