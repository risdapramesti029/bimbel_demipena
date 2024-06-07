-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 03:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `xx_admin`
--

CREATE TABLE `xx_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1. admin, 2. owner',
  `nama` varchar(100) NOT NULL COMMENT '\r\n',
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xx_admin`
--

INSERT INTO `xx_admin` (`id_admin`, `username`, `password`, `status`, `nama`, `created_by`, `created_at`) VALUES
(1, 'master', '$2y$10$ncKnTYyNSVyVoeSuiv4sk.gmOaNSJ6lrL4fYgo6j1K4A3vDSwSJ2m', 2, 'master', 'master', '2020-06-16 21:31:56'),
(7, 'elma_owner', '$2y$10$m50Mg/bsKDl5dnEfr0wSyO6FxGQMfOVhNq.F/owqj7oyURJR4Af/m', 2, 'Elma Risda', 'Giraldin', '2024-05-05 00:00:00'),
(8, 'trama_admin', '$2y$10$N6gPuMk2Aymt4tdi2M4p8OjIsC4NAaafPD5JfxwK1Zqw7yYmQhZM.', 1, 'Hadiyantrama', 'Giraldin', '2024-05-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `xx_jenis_kelamin`
--

CREATE TABLE `xx_jenis_kelamin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `value` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xx_jenis_kelamin`
--

INSERT INTO `xx_jenis_kelamin` (`id`, `nama`, `value`) VALUES
(1, 'Laki - Laki', 'L'),
(2, 'Perempuan', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `xx_kelas`
--

CREATE TABLE `xx_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(50) NOT NULL,
  `judul_kelas` varchar(100) NOT NULL,
  `jadwal_kelas` varchar(50) NOT NULL,
  `waktu_kelas` varchar(50) NOT NULL,
  `deskripsi_kelas` text NOT NULL,
  `harga_kelas` bigint(20) NOT NULL,
  `biaya_pendaftaran` bigint(20) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xx_kelas`
--

INSERT INTO `xx_kelas` (`id_kelas`, `kode_kelas`, `judul_kelas`, `jadwal_kelas`, `waktu_kelas`, `deskripsi_kelas`, `harga_kelas`, `biaya_pendaftaran`, `created_by`, `created_at`, `updated_at`) VALUES
(15, 'MTK', 'Matematika 6 SD', 'Senin, Rabu', '15.00-16.00', 'Grup Belajar 10 orang, Matematika kelas 6 SD kurikulum Merdeka', 60000, 20000, 'Bu Eka', '2024-05-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `xx_materi_`
--

CREATE TABLE `xx_materi_` (
  `id_materi` bigint(20) UNSIGNED NOT NULL,
  `judul_materi` varchar(225) DEFAULT NULL,
  `kode_kelas` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xx_materi_`
--

INSERT INTO `xx_materi_` (`id_materi`, `judul_materi`, `kode_kelas`) VALUES
(1, 'Bangun Ruang Tiga Dimensi', 'MTK'),
(2, 'sdc', 'sdc'),
(3, 'Bimbel Dewi Pena', 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `xx_pendaftaran`
--

CREATE TABLE `xx_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nomor_pendaftaran` varchar(50) NOT NULL,
  `status_pembayaran` int(11) NOT NULL DEFAULT 3 COMMENT '1. selesai bayar, 2. pending',
  `status` int(11) NOT NULL DEFAULT 2 COMMENT '1. active, 2. inactive',
  `admin_acc` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xx_pendaftaran`
--

INSERT INTO `xx_pendaftaran` (`id_pendaftaran`, `id_user`, `id_kelas`, `nomor_pendaftaran`, `status_pembayaran`, `status`, `admin_acc`, `bukti_pembayaran`, `created_at`) VALUES
(6, 3, 15, 'MTK314337644400', 1, 2, 'Hadiyantrama', '3MTK314337644400.jpeg', '2024-05-05'),
(7, 3, 15, 'MTK314337817200', 1, 1, 'Hadiyantrama', '3MTK314337817200.jpeg', '2024-05-07'),
(8, 3, 15, 'MTK314337817200', 3, 2, '', '', '2024-05-07'),
(9, 3, 15, 'MTK314337817200', 1, 1, 'Hadiyantrama', '3MTK314337817200.png', '2024-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `xx_profile`
--

CREATE TABLE `xx_profile` (
  `id_profile` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `umur` int(11) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xx_profile`
--

INSERT INTO `xx_profile` (`id_profile`, `id_user`, `foto`, `nama`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `umur`, `pendidikan`, `jenis_kelamin`, `alamat`, `created_at`) VALUES
(2, 2, '', 'Elma Risda Pramesti', '081359002138', 'jkt', '2009-12-17', 14, 'tk', 'P', 'Jakarta', '2024-05-04'),
(3, 3, '3.png', 'Elma Risda Pramesti', '081359002138', 'Banjarnegara', '2006-09-02', 17, 'SMA', 'P', 'Jakarta', '2024-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `xx_soal`
--

CREATE TABLE `xx_soal` (
  `id_soal` bigint(20) UNSIGNED NOT NULL,
  `kode_soal` varchar(255) DEFAULT NULL,
  `judul_soal` varchar(255) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xx_soal`
--

INSERT INTO `xx_soal` (`id_soal`, `kode_soal`, `judul_soal`, `jawaban`, `type`) VALUES
(1, 'IPA', 'Berapa Program Bimbel kita?', '5', '1'),
(2, 'IPA', '5', '5', '1a'),
(3, 'IPA', '8', '5', '1b'),
(4, 'IPA', '3', '5', '1c'),
(5, 'IPA', '5', '5', '1d'),
(6, 'IPA', 'Berapa Program Bimbel kita?', '5', '2'),
(7, 'IPA', '8', '5', '2a'),
(8, 'IPA', '3', '5', '2b'),
(9, 'IPA', '5', '5', '2c'),
(10, 'IPA', '2', '5', '2d'),
(11, 'IPA', 'Berapa Program Bimbel kita?', '4', '3'),
(12, 'IPA', '8', '4', '3a'),
(13, 'IPA', '2', '4', '3b'),
(14, 'IPA', '5', '4', '3c'),
(15, 'IPA', '4', '4', '3d'),
(16, 'IPA', 'Berapa Program Bimberl kita?', '8', '4'),
(17, 'IPA', '8', '8', '4a'),
(18, 'IPA', '54', '8', '4b'),
(19, 'IPA', '4', '8', '4c'),
(20, 'IPA', '6', '8', '4d'),
(21, 'IPA', 'Berapa Program Bimberl kita?', '2', '5'),
(22, 'IPA', '7', '2', '5a'),
(23, 'IPA', '5', '2', '5b'),
(24, 'IPA', '3', '2', '5c'),
(25, 'IPA', '2', '2', '5d');

-- --------------------------------------------------------

--
-- Table structure for table `xx_users`
--

CREATE TABLE `xx_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1 COMMENT '1. active,2.inactive\r\n',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xx_users`
--

INSERT INTO `xx_users` (`id_user`, `username`, `email`, `password`, `nama`, `is_active`, `created_at`) VALUES
(2, 'elmarisda', 'elmarisda029@gmail.com', '$2y$10$j1wEKYcpQX7TUn3YkH03ROVuGRJKDMNNbWkWEbZtuF7OYaGfh2DTO', 'Elma Risda Pramesti', 1, '2024-05-04'),
(3, 'risda', 'elma@gmail.com', '$2y$10$SeI9RoOTnHoCf3soPwRfyuTcEw2d8LGql.lREsXm8ni7vfs2nJz3i', 'Elma Risda Pramesti', 1, '2024-05-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `xx_admin`
--
ALTER TABLE `xx_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `xx_jenis_kelamin`
--
ALTER TABLE `xx_jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_kelas`
--
ALTER TABLE `xx_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `kode_kelas` (`kode_kelas`);

--
-- Indexes for table `xx_materi_`
--
ALTER TABLE `xx_materi_`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `xx_pendaftaran`
--
ALTER TABLE `xx_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `xx_profile`
--
ALTER TABLE `xx_profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `xx_soal`
--
ALTER TABLE `xx_soal`
  ADD UNIQUE KEY `id_soal` (`id_soal`);

--
-- Indexes for table `xx_users`
--
ALTER TABLE `xx_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nik` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xx_admin`
--
ALTER TABLE `xx_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `xx_jenis_kelamin`
--
ALTER TABLE `xx_jenis_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `xx_kelas`
--
ALTER TABLE `xx_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `xx_materi_`
--
ALTER TABLE `xx_materi_`
  MODIFY `id_materi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `xx_pendaftaran`
--
ALTER TABLE `xx_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `xx_profile`
--
ALTER TABLE `xx_profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `xx_soal`
--
ALTER TABLE `xx_soal`
  MODIFY `id_soal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `xx_users`
--
ALTER TABLE `xx_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
