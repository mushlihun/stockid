-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2020 at 10:09 AM
-- Server version: 10.3.23-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_stockit`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `satuan`, `harga_beli`, `harga_jual`) VALUES
(1, 'Perpanjangan USB 5 M (1)', 'pcs', 0, 0),
(2, 'Perpanjangan USB 1 M (1)', 'pcs', 0, 0),
(3, 'Kabel Pararel (1)', 'pcs', 0, 0),
(4, 'Baterai CMOS (3)', 'pcs', 0, 0),
(5, 'CD Blank reWrite (0)', 'pcs', 0, 0),
(6, 'DVD Blank reWrite (0)', 'pcs', 0, 0),
(7, 'Spray WD 40 (0)', 'botol', 0, 0),
(8, 'Spray Silicon (0)', 'botol', 0, 0),
(9, 'Kabel UTP (1)', 'Meter', 0, 0),
(10, 'BAREL  RJ45 (2)', 'pcs', 0, 0),
(11, 'PCI Card Ethernet (Gigabit) (1)', 'pcs', 0, 0),
(12, 'Konektor RJ-45 (10)', 'pcs', 0, 0),
(13, 'Fan CPU + Heatsink LGA 1155 (1)', 'pcs', 0, 0),
(14, 'Hardisk 500 GB (1)', 'pcs', 0, 0),
(15, 'Hardisk 250 GB (0)', 'pcs', 0, 0),
(16, 'Hardisk 160 GB (0)', 'pcs', 0, 0),
(17, 'SSD 240 GB (1)', 'pcs', 0, 0),
(18, 'Autocutter Printer Barcode Toshiba BSX-4T (1)', 'pcs', 0, 0),
(19, 'PRINT HEAD LX-310 (1)', 'pcs', 0, 0),
(20, 'PRINT HEAD LX-300 (1)', 'pcs', 0, 0),
(21, 'GEAR RIBON CATRIDGE LX-310 (1)', 'pcs', 0, 0),
(22, 'TRACKTOR LX-310 (1)', 'pcs', 0, 0),
(23, 'TRACKTOR LX-300 (1)', 'pcs', 0, 0),
(24, 'GEAR', 'pcs', 0, 0),
(25, 'KABEL PRINT HEAD LX-310 (1)', 'pcs', 0, 0),
(26, 'Power Supply (2)', 'pcs', 0, 0),
(27, 'RAM DDR3 1 GB (1)', 'pcs', 0, 0),
(28, 'RAM DDR3 2 GB (1)', 'pcs', 0, 0),
(29, 'RAM DDR2 512 MB (1)', 'pcs', 0, 0),
(30, 'RAM DDR2 1 GB (1)', 'pcs', 0, 0),
(31, 'RAM DDR3 8 GB (0)', 'pcs', 0, 0),
(32, 'RAM DDR3 4 GB (1)', 'pcs', 0, 0),
(46, 'KABEL DATA SCANER BARCODE (2)', 'pcs', 0, 0),
(34, 'RAM So-DIMM 1 GB (1)', 'pcs', 0, 0),
(35, 'Pita printer LX Series (5)', 'pcs', 0, 0),
(36, 'Baterai Scaner Wireless QBT New (2)', 'pcs', 0, 0),
(37, 'Tinta hitam (1)', 'botol', 0, 0),
(38, 'Tinta Cyan (1)', 'botol', 0, 0),
(39, 'Tinta Magenta (1)', 'botol', 0, 0),
(40, 'Tinta Yellow (1)', 'botol', 0, 0),
(41, 'Tinta Toner (1)', 'botol', 0, 0),
(42, 'KABEL PRINT HEAD LX-300 (1)', 'pcs', 0, 0),
(43, 'RAM So Dimm 2 GB', 'pcs', 0, 0),
(44, 'RAM So Dimm DDR3 1 Gb (1)', 'pcs', 0, 0),
(45, 'RAM DDR 1 GB (1)', 'pcs', 0, 0),
(47, 'Kabel Data Scanner', 'pcs', 1, 1),
(48, 'PRINT HEAD LQ 310 (1)', 'unit', 1, 1),
(49, 'USB WIFI TP-LINK TL-WN722N (2)', 'pcs', 0, 0),
(50, 'WIFI PCI EXPRESS CARD 1x TL-WN781D', 'pcs', 0, 0),
(51, 'WIFI PCI CARD TL-WN751ND (1)', 'pcs', 0, 0),
(52, 'ETHERNET PCI EXPRESS (1)', 'pcs', 0, 0),
(53, 'PRINT HEAD EPSON L SERIES (2)', 'pcs', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` int(11) NOT NULL,
  `kode_gudang` varchar(20) NOT NULL,
  `nama_gudang` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `kode_gudang`, `nama_gudang`) VALUES
(1, 'gudang-pusat', 'Gudang Pusat'),
(2, 'gudang-cab1', 'Gudang Cabang Surabaya'),
(3, 'gudang-cab2', 'Gudang Cabang Jember'),
(5, 'gudang-cab3', 'Gudang Cabang Makassar'),
(6, 'gudang-cab4', 'Gudang Cabang Bali'),
(7, 'gudang-cab5', 'Gudang Cabang Manado'),
(8, 'gudang-cab6', 'Gudang Cabang Kediri'),
(9, 'gudang-cab7', 'Gudang Cabang Samarinda');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `id_barang`, `id_gudang`, `stok`) VALUES
(1, 4, 1, 8),
(2, 10, 1, 5),
(3, 36, 1, 3),
(4, 5, 1, 22),
(5, 6, 1, 23),
(6, 24, 1, 4),
(7, 21, 1, 4),
(8, 3, 1, 2),
(9, 25, 1, 3),
(10, 9, 1, 200),
(11, 12, 1, 148),
(12, 42, 1, 2),
(13, 1, 1, 3),
(14, 35, 1, 20),
(15, 20, 1, 2),
(16, 19, 1, 2),
(17, 38, 1, 1),
(18, 39, 1, 1),
(19, 41, 1, 1),
(20, 40, 1, 1),
(21, 23, 1, 1),
(22, 22, 1, 5),
(23, 8, 1, 1),
(24, 7, 1, 2),
(25, 26, 1, 4),
(26, 13, 1, 1),
(27, 32, 1, 8),
(28, 34, 1, 2),
(29, 43, 1, 1),
(30, 44, 1, 1),
(31, 27, 1, 15),
(32, 29, 1, 3),
(33, 30, 1, 2),
(34, 45, 1, 2),
(35, 46, 1, 1),
(36, 48, 1, 3),
(37, 49, 1, 6),
(38, 50, 1, 5),
(39, 51, 1, 2),
(40, 52, 1, 1),
(41, 53, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_request` int(11) NOT NULL,
  `tgl_request` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'pcs'),
(2, 'kodi'),
(3, 'lusin'),
(4, 'unit'),
(5, 'pack'),
(6, 'kantong'),
(7, 'kotak'),
(8, 'bungkus'),
(11, 'biji'),
(10, 'lembar'),
(12, 'tes'),
(13, 'botol'),
(14, 'dus'),
(15, 'Meter');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `todo_id` int(11) NOT NULL,
  `todo_name` varchar(100) NOT NULL,
  `mark` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_transaksi` varchar(6) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `no_do` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `jenis_transaksi`, `id_barang`, `id_gudang`, `no_do`, `jumlah`, `keterangan`) VALUES
(1, '2020-07-09', 'Masuk', 4, 1, '', 9, 'Adjustment tanggal 09 Juli 2020'),
(2, '2020-07-09', 'Masuk', 10, 1, '', 5, 'adjustment 09 juli 2020'),
(3, '2020-07-15', 'Masuk', 36, 1, '', 3, 'Adjustment Tanggal 15 Juli 2020'),
(4, '2020-07-15', 'Masuk', 5, 1, '', 55, 'Adjustment 15 Juli 2020'),
(5, '2020-07-15', 'Keluar', 5, 1, '', 23, 'salah input '),
(6, '2020-07-15', 'Masuk', 6, 1, '', 23, 'Adjustment tanggal 15 Juli 2020'),
(7, '2020-07-15', 'Masuk', 24, 1, '', 4, 'Adjustment tanggal 15 Juli 2020'),
(8, '2020-07-15', 'Masuk', 21, 1, '', 4, 'Adjustment tanggal 15 Juli 2020'),
(9, '2020-07-15', 'Keluar', 5, 1, '', 10, 'Salah Input seharusnya 22'),
(10, '2020-07-15', 'Masuk', 3, 1, '', 2, 'Adjustment tanggal 15 Juli 2020'),
(11, '2020-07-15', 'Masuk', 25, 1, '', 3, 'Adjustment tanggal 15 Juli 2020'),
(12, '2020-07-15', 'Masuk', 9, 1, '', 200, 'Adjustment tanggal 15 Juli 2020'),
(13, '2020-07-15', 'Masuk', 12, 1, '', 148, 'Adjustment tanggal 15 Juli 2020'),
(14, '2020-07-15', 'Masuk', 42, 1, '', 2, 'Adjustment tanggal 15 Juli 2020'),
(15, '2020-07-15', 'Masuk', 1, 1, '', 3, 'Adjustment tanggal 15 Juli 2020'),
(16, '2020-07-15', 'Masuk', 35, 1, '', 5, 'Adjustment tanggal 15 Juli 2020'),
(17, '2020-07-15', 'Masuk', 20, 1, '', 2, 'Adjustment tanggal 15 Juli 2020'),
(18, '2020-07-15', 'Masuk', 19, 1, '', 2, 'Adjustment tanggal 15 Juli 2020'),
(19, '2020-07-15', 'Masuk', 38, 1, '', 1, 'Adjustment tanggal 15 Juli 2020'),
(20, '2020-07-15', 'Masuk', 39, 1, '', 1, 'Adjustment tanggal 15 Juli 2020'),
(21, '2020-07-15', 'Masuk', 41, 1, '', 1, 'Adjustment tanggal 15 Juli 2020'),
(22, '2020-07-15', 'Masuk', 40, 1, '', 1, 'Adjustment tanggal 15 Juli 2020'),
(23, '2020-07-15', 'Masuk', 23, 1, '', 1, 'Adjustment tanggal 15 Juli 2020'),
(24, '2020-07-15', 'Masuk', 22, 1, '', 5, 'Adjustment tanggal 15 Juli 2020'),
(25, '2020-07-15', 'Masuk', 8, 1, '', 1, 'Adjustment tanggal 15 Juli 2020'),
(26, '2020-07-15', 'Masuk', 7, 1, '', 2, 'Adjustment tanggal 15 Juli 2020'),
(27, '2020-07-15', 'Masuk', 26, 1, '', 3, 'Adjustment tanggal 15 Juli 2020'),
(28, '2020-07-15', 'Masuk', 13, 1, '', 1, 'Adjustment tanggal 15 Juli 2020'),
(29, '2020-07-15', 'Masuk', 32, 1, '', 7, 'Adjustment tanggal 15 Juli 2020'),
(30, '2020-07-15', 'Masuk', 34, 1, '', 2, 'Adjustment tanggal 15 Juli 2020'),
(31, '2020-07-15', 'Masuk', 43, 1, '', 1, 'Adjustment tanggal 15 Juli 2020'),
(32, '2020-07-15', 'Masuk', 44, 1, '', 1, 'Adjustment tanggal 15 Juli 2020'),
(33, '2020-07-15', 'Masuk', 27, 1, '', 11, 'Adjustment tanggal 15 Juli 2020'),
(34, '2020-07-15', 'Masuk', 29, 1, '', 3, 'Adjustment tanggal 15 Juli 2020'),
(35, '2020-07-15', 'Masuk', 30, 1, '', 2, 'Adjustment tanggal 15 Juli 2020'),
(36, '2020-07-15', 'Masuk', 45, 1, '', 2, 'Adjustment tanggal 15 Juli 2020'),
(37, '2020-07-16', 'Keluar', 35, 1, '', 1, 'Refill pita Aris CWH (SR-0720-021)'),
(38, '2020-07-17', 'Keluar', 35, 1, 'SR-0720-031', 1, 'Ganti pita realisasi karena sobek (SR-0720-031)'),
(39, '2020-07-17', 'Masuk', 35, 1, '', 20, 'ATK Masuk'),
(40, '2020-07-21', 'Masuk', 27, 1, '', 4, 'Ram EX PC makasar (bekas upgrade Server, melix, mega)'),
(41, '2020-07-29', 'Keluar', 35, 1, 'SR-0720-053', 1, 'Untuk refill Fuji (SR-0720-053)'),
(42, '2020-08-03', 'Keluar', 35, 1, '', 1, 'Refill Pita Riska (SR-0720-043)'),
(43, '2020-08-08', 'Keluar', 35, 1, '', 2, 'SR-0820-002 dan SR-0820-003\r\n\r\nRefill printer Busa BS dan Refill Printer realisasi'),
(44, '2020-08-13', 'Keluar', 35, 1, 'SR-0820-019', 1, 'Penggantian pita putus user vika (SR-0820-019)'),
(45, '2020-08-14', 'Keluar', 35, 1, '', 2, 'Untuk penggantian user Anis S dan Noer\r\n(SR-0820-014 dan SR-0820-021)'),
(46, '2020-08-18', 'Keluar', 35, 1, '', 1, 'Refill pita printer riahana - SR-0820-026'),
(47, '2020-08-19', 'Masuk', 46, 1, '', 2, 'adjust tanggal 19 Agustus 2020'),
(48, '2020-08-19', 'Keluar', 46, 1, '', 1, 'Untuk Penggantian Operasional Cab Mks - SR-0820-031'),
(49, '2020-08-21', 'Keluar', 35, 1, '', 1, 'Penggantian Pita Putus Noer (SR-0820-036)'),
(50, '2020-08-22', 'Keluar', 35, 1, '', 2, 'refill pita Nia dora dan Kiki (SR-0820-042 dan SR-0820-035)'),
(51, '2020-08-24', 'Masuk', 48, 1, '', 3, 'In dari bandung SYS/IT/200818142943R/I'),
(52, '2020-08-25', 'Masuk', 49, 1, 'adjust ment', 6, 'Adjustment Stock Awal'),
(53, '2020-08-25', 'Masuk', 50, 1, 'ADNUSTMENT', 5, 'ADJUSTMENT STOCK AWAL PENYMPANAN DI  LEMARI BROTHER'),
(54, '2020-08-25', 'Masuk', 51, 1, 'ADNUSTMENT', 1, 'ADJUSTMENT STOCK AWAL PENYIMPANAN DI LEMARI BROTHER'),
(55, '2020-08-25', 'Masuk', 52, 1, 'ADNUSTMENT', 1, 'ADJUSTMENT STOCK AWAL'),
(56, '2020-08-28', 'Masuk', 26, 1, 'Masuk tanggal 28 Agustus 2020', 1, 'Masuk dari PO 20211853'),
(57, '2020-09-01', 'Keluar', 35, 1, '', 3, 'Refill Printer untuk SR-0820-046 (alfan), SR-0820-049 (Maria Intan), SR-0820-052\r\n(aris)'),
(58, '2020-09-01', 'Keluar', 35, 1, '', 3, 'Untuk Uji Coba Printer dan Adjusment Stock'),
(59, '2020-09-01', 'Masuk', 51, 1, 'SN 2177176003479', 1, 'Bekas dari komputer manado rian gudang'),
(60, '2020-09-01', 'Masuk', 32, 1, 'RAM VISIPRO BELI TANGGAL 04-01-2017', 1, 'RAM VISIPRO DDR4 EKS KOMPUTER MANADO RIAN GUDANG'),
(61, '2020-09-02', 'Keluar', 4, 1, '', 1, 'Penggantian Baterai CMOS Laptop Showroom TP (SR-0920-001)'),
(62, '2020-09-07', 'Masuk', 35, 1, '', 15, 'Adjust Stok ATK'),
(63, '2020-09-09', 'Masuk', 53, 1, 'PO 20211977 DAN STOCK LAMA', 3, 'ADJUSTMENT DAN SCAN IN PO 20211977 DAN STOCK LAMA'),
(64, '2020-09-14', 'Keluar', 35, 1, 'SR-0920-030', 1, 'Ganti pita user aziz karena pita mbrudul. (SR-0920-030)');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `level`) VALUES
('demo', 'e10adc3949ba59abbe56e057f20f883e', 'demo@namadomain.com', 'administrator'),
('admin', '184b120220607386e1e6b6302b7aa902', 'admin@namadomain.com', 'administrator'),
('user1', '96e79218965eb72c92a549dd5a330112', 'user1@namadomain.com', 'report'),
('user2', '184b120220607386e1e6b6302b7aa902', 'user2@namadomain.com', 'gudang-pusat'),
('user3', '96e79218965eb72c92a549dd5a330112', 'user3@namadomain.com', 'gudang-cab1'),
('arif', '184b120220607386e1e6b6302b7aa902', 'arif.f@bestarimulia.co.id', 'administrator'),
('bakhtiyar', '184b120220607386e1e6b6302b7aa902', 'bakhtiyar@bestarimulia.co.id', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`todo_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
