-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 12:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahlemonpku`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `stok_bahan` int(11) NOT NULL,
  `gambar_bahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama_bahan`, `stok_bahan`, `gambar_bahan`) VALUES
(5, 'Gulakusadasdasa', 69, 'Xiao_(Genshin_Impact)_full_3209324.jpg'),
(6, 'Lemon', 70, 'lemon_segar.jpeg'),
(7, 'Sabun', 69, 'Face_Scrub.jpg'),
(8, 'adasdasda', 169, 'Body_Scrub_Lemon.jpeg'),
(9, 'Gula', 69, 'lemon.jpg'),
(10, 'Panir', 12, 'Xiao_(Genshin_Impact)_full_32093241.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `no_transaksi` varchar(50) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `no_transaksi`, `id_bahan`, `jumlah`) VALUES
(4, 'T-RLP-1657899654', 5, 10),
(5, 'T-RLP-1657899654', 6, 21),
(6, 'T-RLP-1657899654', 8, 1),
(7, 'T-RLP-1657945825', 6, 10),
(8, 'T-RLP-1657947747', 6, 68),
(9, 'T-RLP-1657947747', 7, 49),
(10, 'T-RLP-1657947747', 6, 68),
(11, 'T-RLP-1657947747', 7, 49),
(12, 'T-RLP-1657947793', 5, 39),
(13, 'T-RLP-1657947793', 8, 46),
(14, 'T-RLP-1657965565', 5, 1),
(15, 'T-RLP-1657965565', 6, 1),
(16, 'T-RLP-1657965755', 5, 59),
(17, 'T-RLP-1657965755', 9, 69);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_telp`) VALUES
(2, 'Bonbon', 'Jl. Sutomo', '0916262'),
(3, 'Fanny', 'Rowosari', 'xxxxxxxxxxxxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_transaksi` varchar(50) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `bukti_transaksi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status_transaksi` varchar(50) NOT NULL DEFAULT 'Menunggu Karyawan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_transaksi`, `id_karyawan`, `id_supplier`, `tanggal`, `bukti_transaksi`, `keterangan`, `status_transaksi`) VALUES
(2, 'T-RLP-1657899654', 2, 2, '15/07/2022', '1637c5f1-7a8f-4d0a-a783-4ca7d38a0447.png', 'Yo', 'Selesai'),
(3, 'T-RLP-1657945825', 4, 2, '16/07/2022', 'lemonv2.jpg', 'asdasd', 'Selesai'),
(4, 'T-RLP-1657947747', 4, 2, '16/07/2022', 'Xiao_(Genshin_Impact)_full_3209324.jpg', 'bismillah', 'Sudah mengambil bahan'),
(6, 'T-RLP-1657947793', 2, 2, '16/07/2022', 'lemon.jpg', 'slebew', 'Sedang mengambil bahan'),
(7, 'T-RLP-1657965565', 4, 2, '16/07/2022', '1637c5f1-7a8f-4d0a-a783-4ca7d38a04471.png', '-', 'Menunggu Karyawan'),
(8, 'T-RLP-1657965755', 2, 3, '16/07/2022', '9cdee7272495a769e52ea9443488f1a011.jpg', 'qdsdadsfasasfasda4tfas', 'Menunggu Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Karyawan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$Ax8sglkrMO7w.emB2dJ2ieF7LDxdyehwlV/HuEdh0jW/67kyhsooq', 'Admin'),
(2, 'Anton', 'anto@gmail.com', '$2y$10$BQmHCWXXg3sSN.TnqSDeaORqqtzkoIMB3.essTLNlgacu2mT8L0fC', 'Karyawan'),
(4, 'Aldi', 'adli@gmail.com', '$2y$10$QPiJa01JXe5YE1XFbWplgeEbk.nHVS3tth.A27Q8nmf0x.NLZPWTm', 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `fk_detail_transaksi_bahan` (`id_bahan`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_keranjang_bahan` (`id_bahan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `no_transaksi` (`no_transaksi`),
  ADD KEY `fk_karyawan_transaksi` (`id_karyawan`),
  ADD KEY `fk_supplier_transaksi` (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_detail_transaksi_bahan` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_keranjang_bahan` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_karyawan_transaksi` FOREIGN KEY (`id_karyawan`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `fk_supplier_transaksi` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
