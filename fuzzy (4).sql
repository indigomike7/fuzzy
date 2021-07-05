-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 03:33 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuzzy`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian_tanaman`
--

CREATE TABLE `bagian_tanaman` (
  `id` int(11) NOT NULL,
  `bagian` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bagian_tanaman`
--

INSERT INTO `bagian_tanaman` (`id`, `bagian`) VALUES
(3, 'Tanaman Dewasa'),
(4, 'Kedua Sisi Daun, Beberapa Cm Dari Ujung Daun'),
(5, 'Daun Mengering'),
(6, 'Daun Menggulung'),
(7, 'Tanaman Muda'),
(8, 'Tepi Daun'),
(9, 'Seluruh Daun'),
(10, 'Tanaman'),
(11, 'Bagian Luar Batang'),
(12, 'Batang'),
(13, 'Di Dalam Batang'),
(14, 'Pucuk Sampai Batang'),
(15, 'Daun'),
(16, 'Jumlah Anakan'),
(17, 'Jumlah Tunas'),
(18, 'Buah Yang Baru Tumbuh'),
(19, 'Biji Kecambah'),
(20, 'Kecambah'),
(21, 'Akar'),
(22, 'Biji Muda'),
(23, 'Titik Tumbuh Padi'),
(24, 'Leher Padi'),
(25, 'Padi Dewasa'),
(26, 'Pemasakan Makanan'),
(27, 'Pelepah Daun Berwarna Kehijauan Dekat Permukaan Air'),
(28, 'Produksi Gabah'),
(31, 'Pelepah Daun');

-- --------------------------------------------------------

--
-- Table structure for table `cbr_table`
--

CREATE TABLE `cbr_table` (
  `id` int(11) NOT NULL,
  `penyakit_id` int(11) NOT NULL,
  `diagnosa1` int(11) NOT NULL,
  `diagnosa2` int(11) DEFAULT NULL,
  `diagnosa3` int(11) DEFAULT NULL,
  `diagnosa4` int(11) DEFAULT NULL,
  `diagnosa5` int(11) DEFAULT NULL,
  `diagnosa6` int(11) DEFAULT NULL,
  `diagnosa7` int(11) DEFAULT NULL,
  `diagnosa8` int(11) DEFAULT NULL,
  `diagnosa9` int(11) DEFAULT NULL,
  `diagnosa10` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cbr_table`
--

INSERT INTO `cbr_table` (`id`, `penyakit_id`, `diagnosa1`, `diagnosa2`, `diagnosa3`, `diagnosa4`, `diagnosa5`, `diagnosa6`, `diagnosa7`, `diagnosa8`, `diagnosa9`, `diagnosa10`) VALUES
(5, 2, 3, 12, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id` int(11) NOT NULL,
  `gejala` varchar(1000) NOT NULL,
  `bagian_id` int(11) NOT NULL,
  `poin` decimal(30,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`id`, `gejala`, `bagian_id`, `poin`) VALUES
(2, 'Terjadi Pada', 3, '10.00'),
(3, 'Bercak Kebasan', 4, '20.00'),
(4, 'Berwarna Abu-abu Keputihan', 5, '80.00'),
(5, 'Terjadi', 6, '50.00'),
(6, 'Terjadi Pada', 7, '10.00'),
(7, 'Bercak Garis Kebasahan', 8, '20.00'),
(8, 'Meluas Hingga Berwarna Hijau Keabuan', 9, '30.00'),
(9, 'Layu', 10, '70.00'),
(10, 'Bercak Hitam Dan Tidak Teratur', 11, '30.00'),
(11, 'Busuk', 12, '90.00'),
(12, 'Jamur Berwarna Abu-abu Gelap', 11, '80.00'),
(13, 'Kerdil', 10, '20.00'),
(14, 'Daun Menguning', 14, '30.00'),
(15, 'Melintir', 15, '50.00'),
(16, 'Berkurang', 16, '30.00'),
(17, 'Menguning Dan Coklat', 15, '40.00'),
(18, 'Berkurang', 17, '20.00'),
(19, 'Bercak Berwarna Coklat Bentuk Ketupat', 15, '40.00'),
(20, 'Menyerang', 18, '20.00'),
(21, 'Busuk', 19, '70.00'),
(22, 'Menyerang', 20, '40.00'),
(23, 'Membusuk', 21, '100.00'),
(24, 'Terkulai', 15, '10.00'),
(25, 'Kecoklatan', 22, '50.00'),
(26, 'Menyerang', 23, '50.00'),
(27, 'Bercak Coklat', 15, '20.00'),
(28, 'Terdapat Pada', 24, '10.00'),
(29, 'Busuk Dan Mati', 25, '100.00'),
(30, 'Terhambat', 26, '70.00'),
(31, 'Bercak', 27, '20.00'),
(32, 'Menurun', 28, '60.00'),
(34, 'Bercak Berukuran 1-3 Cm Berbntuk Oval', 31, '30.00'),
(35, 'Pusat Bercak Warna Menjadi Putih Keabu-abuan Dengan Tepi Berwarna Coklat', 31, '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(11) NOT NULL,
  `penyakit` varchar(1000) NOT NULL,
  `deskripsi` text NOT NULL,
  `diagnosa1` int(11) NOT NULL,
  `diagnosa2` int(11) NOT NULL,
  `diagnosa3` int(11) NOT NULL,
  `diagnosa4` int(11) NOT NULL,
  `diagnosa5` int(11) NOT NULL,
  `diagnosa6` int(11) NOT NULL,
  `diagnosa7` int(11) NOT NULL,
  `diagnosa8` int(11) NOT NULL,
  `diagnosa9` int(11) NOT NULL,
  `diagnosa10` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id`, `penyakit`, `deskripsi`, `diagnosa1`, `diagnosa2`, `diagnosa3`, `diagnosa4`, `diagnosa5`, `diagnosa6`, `diagnosa7`, `diagnosa8`, `diagnosa9`, `diagnosa10`) VALUES
(2, 'Busuk Batang', 'Busuk Batang', 10, 11, 12, 0, 0, 0, 0, 0, 0, 0),
(3, 'Kresek / Layu Daun', 'Kresek / Layu Daun', 6, 7, 8, 9, 0, 0, 0, 0, 0, 0),
(4, 'Hawar Daun', 'Penyakit Hawar Daun', 2, 3, 4, 5, 0, 0, 0, 0, 0, 0),
(5, 'Tungro', 'Tungro', 13, 14, 15, 16, 17, 18, 0, 0, 0, 0),
(6, 'Bercak Daun', 'Bercak Daun', 19, 20, 21, 22, 0, 0, 0, 0, 0, 0),
(7, 'Furasium', 'Furasium', 23, 24, 25, 26, 0, 0, 0, 0, 0, 0),
(8, 'Blash', 'Blash', 27, 28, 29, 30, 0, 0, 0, 0, 0, 0),
(9, 'Hawar Pelepah Daun', 'Hawar Pelepah Daun', 31, 32, 34, 35, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `solusi_penyakit`
--

CREATE TABLE `solusi_penyakit` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `penyakit_id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solusi_penyakit`
--

INSERT INTO `solusi_penyakit` (`id`, `deskripsi`, `penyakit_id`, `type`) VALUES
(1, 'Penanaman Padi Dengan Sistem Jejer Legowo, Pengaliran Berselang, Pemupukan Berimbang Jangan Terlalu Banyak Menggunakan Pupuk N, Penyemprotan Menggunakanbakterisida.', 4, NULL),
(2, 'Penanaman Menggunakan Benih Yang Sehat, Hindari Pupuk N Yang Berlebihan Dan Gunalan Pupuk Kalium Yang Cukup, Hindarin Pemupukan Saat Masa Bunting Atau Tumbuh, Penggunaan Pestinisida Secara Berkala.', 3, NULL),
(3, 'Penyemprotan Fingisida Yang Berbahan Aktif Difenokonazol, Lakukan Pengelolaan Air Usahan Jangan Sampai Air Menggenang Terlalu Lama, Lakukan Pembakaran Pada Jerami Yang Telah Dipanen Dulu, Pemberian Pupuk Unsus K (kalium).', 2, NULL),
(4, 'Penyemprotan Insektisida, Sanitasi Lingkungan.', 5, NULL),
(5, 'Merenggangkan Jarak Tanam, Jangan Menggunkan Pupuk Orea Yang Berlebihan, Mencelupkan Benih Pada Larutan Merkuri, Menggunakan Fungsinisida', 6, NULL),
(6, 'Pemberian Pupuk Urea', 7, NULL),
(7, 'Penyemprotan Tanaman Menggunakan Fungisida, Menerapkan Pola Pemupukan Yang Tepat Dan Berimbang, Dan Melakukan Sanitisalahan.', 8, NULL),
(8, 'Pengaturan Jarak Tanaman Yang Tidak Terlalu Rapat, Pemupukan Menggunkan Orea, Membasmi Sanitisa Sisa Tanaman Padi, Dan Menggunkan Fungisida.', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_login`
--

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(1, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-13 17:37:27'),
(2, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-13 17:38:27'),
(3, 2, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Manager\"}', '::1', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-13 17:38:59'),
(4, 2, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Manager\"}', '::1', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-13 17:39:55'),
(5, 3, '{\"role\":\"3\",\"roleText\":\"Employee\",\"name\":\"Employee\"}', '::1', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-13 17:40:18'),
(6, 3, '{\"role\":\"3\",\"roleText\":\"Employee\",\"name\":\"Employee\"}', '::1', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-13 17:41:13'),
(7, 3, '{\"role\":\"3\",\"roleText\":\"Employee\",\"name\":\"Employee\"}', '::1', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-13 17:41:37'),
(8, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-13 17:43:45'),
(9, 9, '{\"role\":\"3\",\"roleText\":\"Employee\",\"name\":\"Michael\"}', '::1', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-13 17:46:48'),
(10, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-14 08:07:46'),
(11, 3, '{\"role\":\"3\",\"roleText\":\"Employee\",\"name\":\"Employee\"}', '::1', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-15 09:24:54'),
(12, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-15 09:28:21'),
(13, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 90.0.4430.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36', 'Windows 10', '2021-04-16 14:19:15'),
(14, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 90.0.4430.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36', 'Windows 10', '2021-05-09 16:15:52'),
(15, 3, '{\"role\":\"3\",\"roleText\":\"Employee\",\"name\":\"Employee\"}', '::1', 'Chrome 91.0.4472.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Windows 10', '2021-07-04 16:26:36'),
(16, 3, '{\"role\":\"3\",\"roleText\":\"Employee\",\"name\":\"Employee\"}', '::1', 'Chrome 91.0.4472.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Windows 10', '2021-07-04 16:34:36'),
(17, 3, '{\"role\":\"3\",\"roleText\":\"Employee\",\"name\":\"Employee\"}', '::1', 'Chrome 91.0.4472.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Windows 10', '2021-07-04 16:37:36'),
(18, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 91.0.4472.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Windows 10', '2021-07-04 16:38:15'),
(19, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 91.0.4472.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Windows 10', '2021-07-04 17:29:30'),
(20, 13, '{\"role\":\"3\",\"roleText\":\"Employee\",\"name\":null}', '::1', 'Chrome 91.0.4472.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Windows 10', '2021-07-04 17:39:00'),
(21, 14, '{\"role\":\"3\",\"roleText\":\"Employee\",\"name\":null}', '::1', 'Chrome 91.0.4472.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Windows 10', '2021-07-04 17:44:40'),
(22, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 91.0.4472.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Windows 10', '2021-07-05 13:20:31'),
(23, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 91.0.4472.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Windows 10', '2021-07-05 15:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` bigint(20) NOT NULL DEFAULT 1,
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Manager'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@example.com', '$2y$10$bUu.s0OH2WMv/.RRVSiZJeCe7hBdJzgxcB7wo4pS1klpwKkDTRWLi', 'System Administrator', '9890098900', 1, 0, 0, '2015-07-01 18:56:49', 1, '2021-04-14 04:21:32'),
(2, 'manager@example.com', '$2y$10$NUVSqO4Y3UswCWD1lDwMIe2VqLwtpnZf8ZkhZjDlHTjpF/DliBs6e', 'Manager', '9890098900', 2, 0, 1, '2016-12-09 17:49:56', 1, '2021-04-14 04:22:31'),
(3, 'employee@example.com', '$2y$10$bUu.s0OH2WMv/.RRVSiZJeCe7hBdJzgxcB7wo4pS1klpwKkDTRWLi', 'Employee', '9890098900', 3, 0, 1, '2016-12-09 17:50:22', 3, '2021-04-13 12:41:00'),
(9, 'indigomike7@gmail.com', '$2y$10$LiXU34/6ymNTMvcbbaa79umBnNHDV2kE5NpbhohEqvDiT86yy5Wve', 'Michael', '0812184459', 3, 0, 1, '2021-04-13 12:46:24', NULL, NULL),
(10, 'tete@tete.com', '$2y$10$96qJjUZBioFrzBFcTXbVCeDnBs6gpYSAlKtZOvtcDJjKWhIaMT0NC', 'Tete', '4386473643', 2, 0, 1, '2021-04-14 03:46:46', NULL, NULL),
(13, 'indigomikezone@gmail.com', '$2y$10$GaVCiYwbbBrlbvTFcRB8zOBbF7XAjay/43X/eTus8jNj2mbDsx4yC', NULL, NULL, 3, 0, 0, '2021-07-04 12:38:33', NULL, NULL),
(14, 'undoundo@gmail.com', '$2y$10$FkAvDepD7ibVxuF9tuQ9deyuvN3jmm8vVrF.qyP9WPtSQeN7xgrnu', NULL, NULL, 3, 0, 0, '2021-07-04 12:44:26', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian_tanaman`
--
ALTER TABLE `bagian_tanaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbr_table`
--
ALTER TABLE `cbr_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solusi_penyakit`
--
ALTER TABLE `solusi_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian_tanaman`
--
ALTER TABLE `bagian_tanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cbr_table`
--
ALTER TABLE `cbr_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `solusi_penyakit`
--
ALTER TABLE `solusi_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
