-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 03:56 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lechy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id_chat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `teks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_chat`
--

INSERT INTO `tb_chat` (`id_chat`, `id_user`, `id_room`, `teks`) VALUES
(1, 2, 1, 'Kapan sampai?'),
(2, 1, 1, 'Besok ya'),
(4, 2, 1, 'oke, saya tunggu.'),
(5, 63, 2, 'produk jaket tolong diperbanyak ya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diskon`
--

CREATE TABLE `tb_diskon` (
  `id_diskon` int(11) NOT NULL,
  `total_diskon` int(11) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_diskon`
--

INSERT INTO `tb_diskon` (`id_diskon`, `total_diskon`, `tanggal_awal`, `tanggal_akhir`, `deskripsi`, `status`) VALUES
(1, 50000, '2021-08-13', '2021-08-28', 'Diskon Gebyar', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dt_diskon`
--

CREATE TABLE `tb_dt_diskon` (
  `id_dt_diskon` int(11) NOT NULL,
  `id_diskon` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dt_diskon`
--

INSERT INTO `tb_dt_diskon` (`id_dt_diskon`, `id_diskon`, `id_produk`, `status`) VALUES
(1, 1, 24, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dt_transaksi`
--

CREATE TABLE `tb_dt_transaksi` (
  `id_dt_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dt_transaksi`
--

INSERT INTO `tb_dt_transaksi` (`id_dt_transaksi`, `id_transaksi`, `id_produk`, `banyak`, `id_warna`, `id_ukuran`) VALUES
(11, 10, 25, 1, 29, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `filename` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gambar`
--

INSERT INTO `tb_gambar` (`id_gambar`, `id_produk`, `filename`) VALUES
(7, 24, 'camelia-reversible4.jpg'),
(9, 25, 'camelia-reversible7.jpg'),
(10, 25, 'camelia-reversible7-big.jpg'),
(11, 25, 'camelia-reversible8.jpg'),
(12, 25, 'camelia-reversible9.jpg'),
(13, 24, 'camelia-reversible0.jpg'),
(14, 24, 'camelia-reversible2.jpg'),
(15, 24, 'camelia-reversible3.jpg'),
(16, 24, 'camelia-reversible5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_get_diskon`
--

CREATE TABLE `tb_get_diskon` (
  `id_get_diskon` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kupon` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_get_diskon`
--

INSERT INTO `tb_get_diskon` (`id_get_diskon`, `id_user`, `id_kupon`, `status`) VALUES
(1, 2, 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `jenis_kategori` varchar(144) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `jenis_kategori`, `status`) VALUES
(1, 'Celana', '0'),
(2, 'Sweeter', '0'),
(3, 'Jaket', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `id_user`, `id_produk`, `komentar`, `tanggal_komentar`) VALUES
(1, 2, 25, 'Great produk, i like this.', '2021-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kupon`
--

CREATE TABLE `tb_kupon` (
  `id_kupon` int(11) NOT NULL,
  `nama_kupon` varchar(144) NOT NULL,
  `jenis_kupon` enum('persen','potongan') NOT NULL,
  `total_diskon` int(11) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kupon`
--

INSERT INTO `tb_kupon` (`id_kupon`, `nama_kupon`, `jenis_kupon`, `total_diskon`, `masa_berlaku`, `deskripsi`, `status`) VALUES
(3, 'Mantap ', 'persen', 50, '2021-08-17', 'Belanja sepuasanya dengan potongan sebesar 50%', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `bank` varchar(144) NOT NULL,
  `no_virtual` varchar(155) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_transaksi`, `total_bayar`, `bank`, `no_virtual`, `status`) VALUES
(10, 10, 365000, 'bca', '87512758439', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(144) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `stok`, `harga_produk`, `berat_produk`, `id_kategori`, `deskripsi_produk`, `status`) VALUES
(24, 'Sweeter Gunung', 22, 550000, 750, 2, 'Produk terbaru', '0'),
(25, 'Jaket Jass', 34, 350000, 680, 3, 'Cocok digunakan untuk berpergian maupun menghadiri acara formal/non-formal.', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_room`
--

CREATE TABLE `tb_room` (
  `id_room` int(11) NOT NULL,
  `nama_room` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_room`
--

INSERT INTO `tb_room` (`id_room`, `nama_room`) VALUES
(1, 'Melia Cahyani'),
(2, 'Arya Pratama');

-- --------------------------------------------------------

--
-- Table structure for table `tb_topup`
--

CREATE TABLE `tb_topup` (
  `id_topup` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_topup` int(11) NOT NULL,
  `bank` varchar(144) NOT NULL,
  `no_virtual` int(11) NOT NULL,
  `tanggal_topup` date NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `no_order` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_order` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `jasa_pengiriman` varchar(144) NOT NULL,
  `durasi_ongkir` varchar(144) NOT NULL,
  `alamat_kirim` text NOT NULL,
  `nama_penerima` varchar(144) NOT NULL,
  `provinsi_kirim` varchar(144) NOT NULL,
  `kota_kirim` varchar(144) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `no_resi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `no_order`, `id_user`, `total_transaksi`, `jasa_pengiriman`, `durasi_ongkir`, `alamat_kirim`, `nama_penerima`, `provinsi_kirim`, `kota_kirim`, `tanggal_transaksi`, `no_resi`) VALUES
(10, '1805709378', 2, 365000, 'jne', '2-3 HARI', 'Kampung Bugel, RT. 01/04, Kelurahan Kaduagung, Kecamatan Tigaraksa, Kabupaten Tangerang, Banten, Indonesia.', 'M Dhifta', 'Banten', 'Tangerang', '2021-08-22', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ukuran`
--

CREATE TABLE `tb_ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jenis_ukuran` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ukuran`
--

INSERT INTO `tb_ukuran` (`id_ukuran`, `id_produk`, `jenis_ukuran`) VALUES
(20, 25, 'XL'),
(21, 25, 'L'),
(22, 25, 'M'),
(28, 24, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `fname` varchar(144) NOT NULL,
  `lname` varchar(144) DEFAULT NULL,
  `telephone` varchar(144) NOT NULL,
  `saldo` int(100) NOT NULL,
  `email` varchar(144) NOT NULL,
  `password` varchar(144) NOT NULL,
  `roles` enum('0','1','2') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `fname`, `lname`, `telephone`, `saldo`, `email`, `password`, `roles`, `status`) VALUES
(1, 'M Dhifta', 'Ramadhan', '085896274580', 0, 'dhifta48@gmail.com', '12345', '0', '0'),
(2, 'Selvy', 'Erhita', '085791419625', 0, 'selvyerhita@gmail.com', '123456', '1', '0'),
(63, 'Arya', 'Pratama', '085791419627', 0, 'aryasura@gmail.com', '12345', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_warna`
--

CREATE TABLE `tb_warna` (
  `id_warna` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jenis_warna` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_warna`
--

INSERT INTO `tb_warna` (`id_warna`, `id_produk`, `jenis_warna`) VALUES
(28, 25, 'Hitam'),
(29, 25, 'Biru'),
(30, 25, 'Merah'),
(31, 25, 'Kuning'),
(38, 24, 'Hitam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_room` (`id_room`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `tb_dt_diskon`
--
ALTER TABLE `tb_dt_diskon`
  ADD PRIMARY KEY (`id_dt_diskon`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_diskon` (`id_diskon`);

--
-- Indexes for table `tb_dt_transaksi`
--
ALTER TABLE `tb_dt_transaksi`
  ADD PRIMARY KEY (`id_dt_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_warna` (`id_warna`),
  ADD KEY `id_ukuran` (`id_ukuran`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_get_diskon`
--
ALTER TABLE `tb_get_diskon`
  ADD PRIMARY KEY (`id_get_diskon`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kupon` (`id_kupon`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_kupon`
--
ALTER TABLE `tb_kupon`
  ADD PRIMARY KEY (`id_kupon`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `tb_topup`
--
ALTER TABLE `tb_topup`
  ADD PRIMARY KEY (`id_topup`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  ADD PRIMARY KEY (`id_ukuran`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_warna`
--
ALTER TABLE `tb_warna`
  ADD PRIMARY KEY (`id_warna`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dt_diskon`
--
ALTER TABLE `tb_dt_diskon`
  MODIFY `id_dt_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dt_transaksi`
--
ALTER TABLE `tb_dt_transaksi`
  MODIFY `id_dt_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_get_diskon`
--
ALTER TABLE `tb_get_diskon`
  MODIFY `id_get_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kupon`
--
ALTER TABLE `tb_kupon`
  MODIFY `id_kupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_room`
--
ALTER TABLE `tb_room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_topup`
--
ALTER TABLE `tb_topup`
  MODIFY `id_topup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tb_warna`
--
ALTER TABLE `tb_warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD CONSTRAINT `tb_chat_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `tb_room` (`id_room`),
  ADD CONSTRAINT `tb_chat_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_dt_diskon`
--
ALTER TABLE `tb_dt_diskon`
  ADD CONSTRAINT `tb_dt_diskon_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`),
  ADD CONSTRAINT `tb_dt_diskon_ibfk_2` FOREIGN KEY (`id_diskon`) REFERENCES `tb_diskon` (`id_diskon`);

--
-- Constraints for table `tb_dt_transaksi`
--
ALTER TABLE `tb_dt_transaksi`
  ADD CONSTRAINT `tb_dt_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`),
  ADD CONSTRAINT `tb_dt_transaksi_ibfk_2` FOREIGN KEY (`id_warna`) REFERENCES `tb_warna` (`id_warna`),
  ADD CONSTRAINT `tb_dt_transaksi_ibfk_3` FOREIGN KEY (`id_ukuran`) REFERENCES `tb_ukuran` (`id_ukuran`),
  ADD CONSTRAINT `tb_dt_transaksi_ibfk_4` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Constraints for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD CONSTRAINT `tb_gambar_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Constraints for table `tb_get_diskon`
--
ALTER TABLE `tb_get_diskon`
  ADD CONSTRAINT `tb_get_diskon_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_get_diskon_ibfk_2` FOREIGN KEY (`id_kupon`) REFERENCES `tb_kupon` (`id_kupon`);

--
-- Constraints for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD CONSTRAINT `tb_komentar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_komentar_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`);

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`);

--
-- Constraints for table `tb_topup`
--
ALTER TABLE `tb_topup`
  ADD CONSTRAINT `tb_topup_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  ADD CONSTRAINT `tb_ukuran_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Constraints for table `tb_warna`
--
ALTER TABLE `tb_warna`
  ADD CONSTRAINT `tb_warna_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
