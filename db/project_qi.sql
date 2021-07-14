-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2021 at 03:19 AM
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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(35) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tahun_produksi` varchar(25) NOT NULL,
  `lokasi_produksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `tahun_produksi`, `lokasi_produksi`) VALUES
('CVX15466237IIL2', 'ATM Set Cunvax', '2017', 'Jerman'),
('CVX15466332XY1', 'ATM Set Cunvax', '2017', 'Jerman');

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` int(11) NOT NULL,
  `id_sektoratm` int(11) DEFAULT NULL,
  `tanggal_perbaikan` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status_perbaikan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbaikan`
--

INSERT INTO `perbaikan` (`id_perbaikan`, `id_sektoratm`, `tanggal_perbaikan`, `tanggal_selesai`, `status_perbaikan`) VALUES
(1, 3, '2021-07-14', '2021-07-15', 'Perbaikan Selesai'),
(2, 4, '2021-07-16', '2021-07-16', 'Perbaikan Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `sektor_atm`
--

CREATE TABLE `sektor_atm` (
  `id_sektoratm` int(11) NOT NULL,
  `kode_barang` varchar(35) NOT NULL,
  `lokasi_atm` varchar(255) NOT NULL,
  `link_gmap` text NOT NULL,
  `tgl_peletakan` varchar(25) NOT NULL,
  `status` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sektor_atm`
--

INSERT INTO `sektor_atm` (`id_sektoratm`, `kode_barang`, `lokasi_atm`, `link_gmap`, `tgl_peletakan`, `status`) VALUES
(3, 'CVX15466237IIL2', 'Jl. Let. Jend. S. Parman No.1, Antasan Besar, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70123', 'https://goo.gl/maps/4Amrs4RHfCKonVqa7', '2021-07-14', 'Tidak Aktif'),
(4, 'CVX15466332XY1', 'Banjarmasin', 'https://goo.gl/maps/iwcS2uEnibTPWFhQ8', '2021-07-15', 'Tidak Aktif');

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
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD KEY `id_sektoratm` (`id_sektoratm`);

--
-- Indexes for table `sektor_atm`
--
ALTER TABLE `sektor_atm`
  ADD PRIMARY KEY (`id_sektoratm`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_barang_2` (`kode_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sektor_atm`
--
ALTER TABLE `sektor_atm`
  MODIFY `id_sektoratm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
