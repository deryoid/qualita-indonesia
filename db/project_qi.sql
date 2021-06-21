-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2021 at 10:09 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_qi`
--

-- --------------------------------------------------------

--
-- Table structure for table `atm`
--

CREATE TABLE `atm` (
  `id_atm` int(11) NOT NULL,
  `nama_atm` varchar(255) NOT NULL,
  `nama_pj` varchar(200) NOT NULL,
  `alamat_atm` varchar(220) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atm`
--

INSERT INTO `atm` (`id_atm`, `nama_atm`, `nama_pj`, `alamat_atm`, `file`) VALUES
(1, 'BTN', 'PT.Qualita Indonesia', 'PDAM Banjarmasin', ''),
(2, 'BTN', 'PT.Qualita Indonesia', 'KC Banjarmasin', ''),
(3, 'BTN', 'PT.Qualita Indonesia', 'RS Sari Mulia Banjarmasin', ''),
(4, 'BTN', 'PT.Qualita Indonesia', 'Duta Mall Banjarmasin', ''),
(5, 'BTN', 'PT.Qualita Indonesia', 'KK Ahmad Yani', ''),
(6, 'Bank KALSEL', 'PT.Qualita Indonesia', 'Duta Mall Banjarmasin', ''),
(7, 'Bank KALSEL', 'PT.Qualita Indonesia', 'RS Sari Mulia Banjarmasin', ''),
(8, 'Bank KALSEL', 'PT.Qualita Indonesia', 'PDAM Banjarmasin', ''),
(9, 'Bank KALSEL', 'PT.Qualita Indonesia', 'Hotel Blue Atlantic Banjarmasin', ''),
(10, 'Bank KALSEL', 'PT.Qualita Indonesia', 'RS Umum Daerah Ulin ', ''),
(11, 'MANDIRI', 'PT.Qualita Indonesia', 'Duta Mall Banjarmasin', ''),
(12, 'MANDIRI', 'PT.Qualita Indonesia', 'RS Umum Daerah Ulin', ''),
(13, 'MANDIRI', 'PT.Qualita Indonesia', 'PDAM Banjarmasin', ''),
(14, 'MANDIRI', 'PT.Qualita Indonesia', 'RS Sari Mulia', ''),
(15, 'MANDIRI', 'PT.Qualita Indonesia', 'Hotel Blue Atlantic', '');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_bk` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_bk`, `nama_barang`, `id_proyek`, `jumlah`, `tgl_keluar`) VALUES
(2, 'CMD-V4 STACKER MODUL W. SR VERT', 2, '1', '2021-03-15'),
(3, 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 3, '1', '2021-03-15'),
(4, 'CMD CONTROLLER II USB ASSD. WITH COVER', 4, '1', '2021-03-15'),
(5, 'DISTRIBUTOR BOARD 4X WITH COVER', 5, '1', '2021-03-15'),
(6, 'Shutter Lite DC Motor Assy PC280N FL', 6, '1', '2021-03-15');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `bk_delete` AFTER DELETE ON `barang_keluar` FOR EACH ROW BEGIN 
UPDATE stok SET 
stok = stok+OLD.jumlah
WHERE
nama_barang= OLD.nama_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bk_insert` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN 
UPDATE stok SET 
stok = stok-NEW.jumlah
WHERE
nama_barang= NEW.nama_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bk_update` AFTER UPDATE ON `barang_keluar` FOR EACH ROW BEGIN 
UPDATE stok SET
stok = stok+OLD.jumlah,
stok = stok-NEW.jumlah
WHERE
nama_barang = NEW.nama_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_bm` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_bm`, `nama_barang`, `id_jenis`, `id_satuan`, `jumlah`, `tgl_masuk`) VALUES
(1, 'CMD-V4 STACKER MODUL W. SR VERT', 1, 1, '5', '2021-03-01'),
(2, 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 1, 1, '5', '2021-03-01'),
(3, 'CMD CONTROLLER II USB ASSD. WITH COVER', 1, 1, '5', '2021-03-01'),
(4, 'Shutter Lite DC Motor Assy PC280N FL', 1, 1, '5', '2021-03-01'),
(5, 'DISTRIBUTOR BOARD 4X WITH COVER', 1, 1, '5', '2021-03-01'),
(6, 'TRANSPORT CMD-V4 HORIZONTAL FL 101MM', 1, 1, '5', '2021-03-01');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `bm_delete` AFTER DELETE ON `barang_masuk` FOR EACH ROW BEGIN 
UPDATE stok SET
stok=stok-OLD.jumlah
WHERE
nama_barang = OLD.nama_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bm_insert` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN 
INSERT 
INTO stok SET 
nama_barang = NEW.nama_barang,
id_jenis = NEW.id_jenis,
id_satuan = NEW.id_satuan,
stok = NEW.jumlah
ON DUPLICATE KEY 
UPDATE stok=stok+NEW.jumlah;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bm_update` AFTER UPDATE ON `barang_masuk` FOR EACH ROW BEGIN 
UPDATE stok SET 
nama_barang = NEW.nama_barang,
id_jenis = NEW.id_jenis,
id_satuan = NEW.id_satuan,
stok = stok-OLD.jumlah,
stok = stok+NEW.jumlah
WHERE
nama_barang = NEW.nama_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis`) VALUES
(1, 'Dispenser'),
(2, 'heading');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `kode_proyek` varchar(77) NOT NULL,
  `nama_proyek` varchar(150) NOT NULL,
  `id_atm` int(11) NOT NULL,
  `alamat_proyek` text NOT NULL,
  `estimasi` varchar(200) NOT NULL,
  `status_proyek` varchar(100) NOT NULL,
  `status_jalan` varchar(40) DEFAULT NULL,
  `ket_tunda` varchar(255) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `biaya` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `kode_proyek`, `nama_proyek`, `id_atm`, `alamat_proyek`, `estimasi`, `status_proyek`, `status_jalan`, `ket_tunda`, `tgl_mulai`, `tgl_selesai`, `biaya`) VALUES
(2, '00002', 'Corective Maintenance', 2, 'KC Banjarmasin', '1 hari', 'Di Tanggapi', 'Di Jalankan', NULL, '2021-03-15', '2021-03-15', '100000'),
(3, '00001', 'Corective Maintenance', 1, 'PDAM Banjarmasin', '1 hari', 'Di Tanggapi', 'Di Jalankan', NULL, '2021-03-15', '2021-03-15', '100000'),
(4, '00003', 'Corective Maintenance', 3, 'RS Sari Mulia Banjarmasin', '1 hari', 'Di Tanggapi', 'Di Jalankan', NULL, '2021-03-15', '2021-03-15', '100000'),
(5, '00004', 'Corective Maintenance', 4, 'Duta Mall Banjarmasin', '1 hari', 'Di Tanggapi', 'Di Jalankan', NULL, '2021-03-15', '2021-03-15', '100000'),
(6, '00005', 'Corective Maintenance', 5, 'KK Ahmad Yani', '1 hari', 'Di Tanggapi', 'Di Jalankan', NULL, '2021-03-15', '2021-03-15', '100000'),
(7, '00006', 'Corective Maintenance', 6, 'Duta Mall Banjarmasin', '1 hari', 'Di Tunda', NULL, NULL, NULL, NULL, '100000'),
(8, '00007', 'Corective Maintenance', 7, 'RS Sari Mulia Banjarmasin', '1 hari', 'Di Tunda', NULL, NULL, NULL, NULL, '100000'),
(9, '00008', 'Corective Maintenance', 8, 'PDAM Banjarmasin', '1 hari', 'Di Tunda', NULL, NULL, NULL, NULL, '100000'),
(10, '00009', 'Corective Maintenance', 9, 'Hotel Blue Atlantic Banjarmasin', '1 hari', 'Di Tunda', NULL, NULL, NULL, NULL, '100000'),
(11, '00010', 'Corective Maintenance', 10, 'RS Umum Daerah Ulin', '1 hari', 'Di Tunda', NULL, NULL, NULL, NULL, '100000'),
(12, '00011', 'Corective Maintenance', 11, 'Duta mall Banjarmasin', '1 hari', 'Menunggu', NULL, NULL, NULL, NULL, '100000'),
(13, '00012', 'Corective Maintenance', 12, 'RS Umum Daerah Ulin', '1 hari', 'Menunggu', NULL, NULL, NULL, NULL, '100000'),
(14, '00013', 'Corective Maintenance', 13, 'PDAM Banjarmasin', '1 hari', 'Menunggu', NULL, NULL, NULL, NULL, '100000'),
(15, '00014', 'Corective Maintenance', 14, 'RS Sari Mulia', '1 hari', 'Menunggu', NULL, NULL, NULL, NULL, '100000'),
(16, '00015', 'Corective Maintenance', 15, 'Hotel Blue Atlantic', '1 hari', 'Menunggu', NULL, NULL, NULL, NULL, '100000');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(170) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan`) VALUES
(1, 'UNIT'),
(2, 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `nama_barang` varchar(100) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `stok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`nama_barang`, `id_jenis`, `id_satuan`, `stok`) VALUES
('CMD CONTROLLER II USB ASSD. WITH COVER', 1, 1, '4'),
('CMD-V4 STACKER MODUL W. SR VERT', 1, 1, '4'),
('DISTRIBUTOR BOARD 4X WITH COVER', 1, 1, '4'),
('DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 1, 1, '4'),
('Shutter Lite DC Motor Assy PC280N FL', 1, 1, '4'),
('TRANSPORT CMD-V4 HORIZONTAL FL 101MM', 1, 1, '5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
(2, 'teknisi', 'e21394aaeee10f917f581054d24b031f', 'Teknisi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atm`
--
ALTER TABLE `atm`
  ADD PRIMARY KEY (`id_atm`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_bk`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_bm`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`),
  ADD KEY `id_perusahaan` (`id_atm`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`nama_barang`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atm`
--
ALTER TABLE `atm`
  MODIFY `id_atm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_bk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_bm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
