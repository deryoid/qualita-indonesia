-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Agu 2021 pada 14.04
-- Versi server: 5.7.24
-- Versi PHP: 7.4.12

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
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(35) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tahun_produksi` varchar(25) NOT NULL,
  `lokasi_produksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `tahun_produksi`, `lokasi_produksi`) VALUES
('CVX15466237IIL2', 'ATM Set Cunvax', '2017', 'Jerman'),
('CVX15466332XY1', 'ATM Set Cunvax', '2017', 'Jerman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `maintance`
--

CREATE TABLE `maintance` (
  `id_maintance` int(11) NOT NULL,
  `id_sektoratm` int(11) NOT NULL,
  `status_maintance` varchar(75) NOT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `tgl_maintance` varchar(150) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `maintance`
--

INSERT INTO `maintance` (`id_maintance`, `id_sektoratm`, `status_maintance`, `id_petugas`, `tgl_maintance`, `keterangan`) VALUES
(5, 4, 'Maintance', 1, '2021-08-15', 'Pemeliharaan'),
(6, 3, 'Pemeliharaan', 1, '2021-08-25', 'Maintance');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` int(11) NOT NULL,
  `id_sektoratm` int(11) DEFAULT NULL,
  `tanggal_perbaikan` date DEFAULT NULL,
  `foto_sebelum` varchar(255) DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `foto_sesudah` varchar(255) DEFAULT NULL,
  `status_perbaikan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perbaikan`
--

INSERT INTO `perbaikan` (`id_perbaikan`, `id_sektoratm`, `tanggal_perbaikan`, `foto_sebelum`, `tanggal_selesai`, `foto_sesudah`, `status_perbaikan`) VALUES
(1, 3, '2021-07-14', '', '2021-07-15', '', 'Perbaikan Selesai'),
(2, 4, '2021-07-16', '87993.jpg', '2021-07-16', '32277.jpg', 'Sedang Diperbaiki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `email`) VALUES
(1, 'Abd. Malik', 'dery.fk.ulm@gmail.com\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sektor_atm`
--

CREATE TABLE `sektor_atm` (
  `id_sektoratm` int(11) NOT NULL,
  `kode_barang` varchar(35) NOT NULL,
  `bank` varchar(150) NOT NULL,
  `kecamatan` varchar(40) NOT NULL,
  `lokasi_atm` varchar(255) NOT NULL,
  `link_gmap` text NOT NULL,
  `tgl_peletakan` varchar(25) NOT NULL,
  `status` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sektor_atm`
--

INSERT INTO `sektor_atm` (`id_sektoratm`, `kode_barang`, `bank`, `kecamatan`, `lokasi_atm`, `link_gmap`, `tgl_peletakan`, `status`) VALUES
(3, 'CVX15466237IIL2', 'BRI', 'Banjarmasin Tengah', 'Jl. Let. Jend. S. Parman No.1, Antasan Besar, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70123', 'https://goo.gl/maps/4Amrs4RHfCKonVqa7', '2021-07-14', 'Aktif'),
(4, 'CVX15466237IIL2', 'BNI', 'Banjarmasin Tengah', 'Jl. Mayjen Sutoyo S No.Rt 18, Tlk. Dalam, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70117', 'https://goo.gl/maps/iwcS2uEnibTPWFhQ8', '2021-07-15', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
(2, 'teknisi', 'e21394aaeee10f917f581054d24b031f', 'Teknisi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `maintance`
--
ALTER TABLE `maintance`
  ADD PRIMARY KEY (`id_maintance`),
  ADD KEY `kode_barang` (`id_sektoratm`),
  ADD KEY `kode_barang_2` (`id_sektoratm`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD KEY `id_sektoratm` (`id_sektoratm`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `sektor_atm`
--
ALTER TABLE `sektor_atm`
  ADD PRIMARY KEY (`id_sektoratm`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_barang_2` (`kode_barang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `maintance`
--
ALTER TABLE `maintance`
  MODIFY `id_maintance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sektor_atm`
--
ALTER TABLE `sektor_atm`
  MODIFY `id_sektoratm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
