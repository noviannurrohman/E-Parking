-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 07:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses_admin`
--

CREATE TABLE `tb_akses_admin` (
  `username` varchar(50) NOT NULL,
  `jam_login` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akses_admin`
--

INSERT INTO `tb_akses_admin` (`username`, `jam_login`) VALUES
('alex', '20:03'),
('alex', '14:11'),
('admin', '19:52'),
('admin', '19:54'),
('admin', '20:04'),
('admin', '20:27'),
('admin', '11:45'),
('admin', '08:38'),
('admin', '10:45'),
('admin', '10:51'),
('admin', '11:39'),
('rio', '11:48'),
('admin', '11:55'),
('royyan', '12:00'),
('admin', '12:07'),
('', '12:09'),
('', '12:09'),
('', '12:09'),
('', '12:11'),
('', '12:11'),
('', '12:11'),
('', '12:11'),
('', '12:12'),
('', '12:12'),
('admin', '12:17'),
('admin', '12:21'),
('user', '12:56'),
('user', '12:59'),
('a', '13:39'),
('hanifah', '14:04'),
('hanifah', '14:07'),
('hanifah', '14:29'),
('admin', '14:39'),
('admin', '10:13'),
('user', '20:22'),
('admin', '20:27'),
('admin', '18:23'),
('user', '18:32'),
('admin', '18:41'),
('admin', '19:11'),
('admin', '09:29'),
('admin', '09:36'),
('admin', '10:24'),
('user', '11:12'),
('user', '11:14'),
('user', '12:10'),
('petugas', '12:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_parkir`
--

CREATE TABLE `tb_daftar_parkir` (
  `id_daftar_parkir` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `plat_nomor` varchar(10) DEFAULT NULL,
  `jenis` varchar(22) DEFAULT NULL,
  `merk` varchar(30) DEFAULT NULL,
  `jam_masuk` varchar(9) DEFAULT NULL,
  `hitung_jam_masuk` int(2) DEFAULT NULL,
  `hitung_jam_keluar` int(2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `jam_keluar` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_daftar_parkir`
--

INSERT INTO `tb_daftar_parkir` (`id_daftar_parkir`, `kode`, `plat_nomor`, `jenis`, `merk`, `jam_masuk`, `hitung_jam_masuk`, `hitung_jam_keluar`, `status`, `jam_keluar`) VALUES
(1, 'EP619', 'M 123 B', 'Mobil', 'Yamaha', '11:53', 11, 0, 'ada', '12:00'),
(2, '', '', '', '', '', 0, 0, 'kosong', ''),
(3, 'EP865', 'B 1111 b', 'Mobil', 'Jazz', '12:00', 12, 0, 'ada', '13:00'),
(4, '', 'S 9732 BL', 'Mobil', 'Yamaha', '21:20', 21, 23, 'ada', '23:00'),
(5, '', 'L 8732 KL', 'Mobil', 'Ford', '20:27', 20, 21, 'ada', '21:30'),
(6, '', NULL, NULL, NULL, NULL, NULL, 0, 'kosong', NULL),
(7, '', NULL, NULL, NULL, NULL, NULL, 0, 'kosong', NULL),
(8, '', 'N 3333 B', 'Mobil', 'Yamaha', '11:31', 11, 0, 'ada', '12:00'),
(9, '', NULL, NULL, NULL, NULL, NULL, 0, 'kosong', NULL),
(10, '', '', '', '', '', 0, 0, 'kosong', ''),
(11, '', NULL, NULL, NULL, NULL, NULL, 0, 'kosong', NULL),
(12, '', NULL, NULL, NULL, NULL, NULL, 0, 'kosong', NULL),
(13, '', 'N 4545 BG', 'Mobil', 'Yamaha', '11:20', 11, 0, 'ada', '00:00'),
(14, '', NULL, NULL, NULL, NULL, NULL, 0, 'kosong', NULL),
(15, '', NULL, NULL, NULL, NULL, NULL, 0, 'kosong', NULL),
(16, '', NULL, NULL, NULL, NULL, NULL, 0, 'kosong', NULL),
(17, '', NULL, NULL, NULL, NULL, NULL, 0, 'kosong', NULL),
(18, '', NULL, NULL, NULL, NULL, NULL, 0, 'kosong', NULL),
(19, '', NULL, NULL, NULL, NULL, NULL, 0, 'kosong', NULL),
(20, '', NULL, NULL, NULL, NULL, NULL, 0, 'kosong', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_parkir_biasa`
--

CREATE TABLE `tb_daftar_parkir_biasa` (
  `kode` varchar(5) NOT NULL,
  `plat_nomor` varchar(10) NOT NULL,
  `jenis` varchar(22) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `jam_masuk` varchar(9) NOT NULL,
  `hitung_jam_masuk` int(2) NOT NULL,
  `status` varchar(2) NOT NULL,
  `jam_keluar` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_daftar_parkir_biasa`
--

INSERT INTO `tb_daftar_parkir_biasa` (`kode`, `plat_nomor`, `jenis`, `merk`, `jam_masuk`, `hitung_jam_masuk`, `status`, `jam_keluar`) VALUES
('EP135', 'F 2987', 'Mobil', 'Honda', '20:03', 20, '1', ''),
('EP820', 'N 3333 B', 'Mobil', 'Yamaha', '10:16', 10, '1', ''),
('EP126', 'M 123 B', 'Motor', 'Yamaha', '11:04', 11, '1', ''),
('EP701', 'B 555 M', 'Motor', 'Yamaha', '12:12', 12, '1', ''),
('EP122', 'n 11111 b', 'Motor', 'Yamaha', '12:14', 12, '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`) VALUES
('admin', 'admin'),
('petugas', 'petugas'),
('rio', 'rio'),
('royyan', 'royyan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama`, `username`, `password`) VALUES
(1, '', 'user', 'user'),
(2, 'a', 'a', 'a'),
(3, 'Hanifah', 'hanifah', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_daftar_parkir`
--
ALTER TABLE `tb_daftar_parkir`
  ADD PRIMARY KEY (`id_daftar_parkir`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daftar_parkir`
--
ALTER TABLE `tb_daftar_parkir`
  MODIFY `id_daftar_parkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
