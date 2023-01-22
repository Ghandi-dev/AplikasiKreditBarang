-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 07:53 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_user`, `username`, `password`) VALUES
(1, 'Admin1', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `kode_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_hp` varchar(12) NOT NULL,
  `foto_ktp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `alamat`, `nomor_hp`, `foto_ktp`) VALUES
(1, 'Sonnya Ghandy', 'Kp. Selabaya Girang Rt: 007/04, Ds. Pasawahan, Kec. Pasawahan, Kab. Purwakarta', '089123123123', 'ktp2.jpg'),
(3, 'Mulyana', 'Jln. Mangga 5 blok D 62 RT 001 RW 003 Perumahan Klodran Indah, Klodran, Colomadu, Karanganyar', '089123123123', 'ktp21.jpg'),
(15, 'Naufal', 'Jl.wijaya kusuma 3 no.139 jakarta timur,prumnas klender, kec:Duren sawit.kel:Malaka sari', '089112341234', 'ktp22.jpg'),
(16, 'Tatan', 'Cikampek', '085887410090', 'ktp25.jpg'),
(18, 'Andrian H', 'Konohagakure', '08xxxxxxxxxx', ''),
(19, 'Ary', 'land of dawn', '08xxxxxxxxxx', 'ktp23.jpg'),
(36, 'Suci', 'Amerika', '089112341234', 'ktp24.jpg'),
(38, 'wanda', 'Jln. Mangga 5 blok D 62 RT 001 RW 003 Perumahan Klodran Indah, Klodran, Colomadu, Karanganyar', '087890076875', 'ktp1.jpg'),
(39, 'Lingga Pradana Putra', 'Di rumah', '089699478693', 'ktp26.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `kode_pembayaran` int(11) NOT NULL,
  `kode_penjualan` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`kode_pembayaran`, `kode_penjualan`, `tgl_bayar`, `bayar`, `sisa_bayar`) VALUES
(14, 7, '2022-06-27', 10000000, 210000000),
(15, 7, '2022-06-27', 10000000, 200000000),
(18, 6, '2022-06-27', 10000, 190000),
(19, 3, '2022-06-27', 1000000, 11000000),
(20, 1, '2022-06-28', 45000000, 55000000),
(21, 7, '2022-06-29', 5000000, 195000000),
(22, 8, '2022-06-29', 1000000, 2500000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `kode_penjualan` int(11) NOT NULL,
  `kode_pelanggan` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `nama_toko` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`kode_penjualan`, `kode_pelanggan`, `nama_barang`, `harga_beli`, `harga_jual`, `nama_toko`) VALUES
(1, 1, 'Komputer', 96000000, 100000000, 'Sukses Majuu'),
(3, 3, 'Motor', 11000000, 12000000, 'Ahhas'),
(6, 1, 'Kasur', 190000, 200000, 'Ammar'),
(7, 19, 'Mobil', 200000000, 220000000, 'Toyota'),
(8, 36, 'Tv', 3000000, 3500000, 'Panasonic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`kode_pembayaran`),
  ADD KEY `kode_penjualan` (`kode_penjualan`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`kode_penjualan`),
  ADD KEY `tb_penjualan_ibfk_1` (`kode_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `kode_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `kode_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `kode_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`kode_penjualan`) REFERENCES `tb_penjualan` (`kode_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD CONSTRAINT `tb_penjualan_ibfk_1` FOREIGN KEY (`kode_pelanggan`) REFERENCES `tb_pelanggan` (`kode_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
