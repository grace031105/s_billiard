-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2025 at 05:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billiard`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `harga_default` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `harga_default`) VALUES
(1, 'Reguler', 30000),
(2, 'VIP', 60000),
(3, 'Platinum', 80000),
(4, 'VVIP', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `meja_billiard`
--

CREATE TABLE `meja_billiard` (
  `id_meja` int(11) NOT NULL,
  `nama_meja` varchar(100) NOT NULL,
  `harga_per_jam` int(11) DEFAULT NULL,
  `foto_meja` varchar(255) DEFAULT NULL,
  `id_pemilik` int(11) NOT NULL,
  `kode_meja` varchar(10) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meja_billiard`
--

INSERT INTO `meja_billiard` (`id_meja`, `nama_meja`, `harga_per_jam`, `foto_meja`, `id_pemilik`, `kode_meja`, `id_kategori`) VALUES
(19, 'Meja A', 30000, '1751901250_meja1.jpg', 1, 'MJ01', 1),
(20, 'Meja B', 60000, '1751901387_gambar5.jpeg', 1, 'MJ20', 2),
(21, 'Meja C', 90000, '1751901411_gambar6.jpeg', 1, 'MJ21', 3),
(22, 'Meja D', 30000, '1751942772_meja1.jpg', 1, 'MJ22', 1),
(23, 'Meja E', 100000, '1751971023_meja1.jpeg', 1, 'MJ23', 4),
(24, 'Meja F', 60000, '1752803189_meja1.jpg', 1, 'MJ24', 2);

--
-- Triggers `meja_billiard`
--
DELIMITER $$
CREATE TRIGGER `before_insert_meja` BEFORE INSERT ON `meja_billiard` FOR EACH ROW BEGIN
IF NEW.kode_meja IS NULL OR NEW.kode_meja = '' THEN
SET NEW.kode_meja = CONCAT('MJ', LPAD((SELECT IFNULL(MAX(id_meja), 0) + 1 FROM meja_billiard), 2, '0'));
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '0001_01_01_000000_create_users_table', 1),
(10, '0001_01_01_000001_create_cache_table', 1),
(11, '0001_01_01_000002_create_jobs_table', 1),
(12, '2025_06_04_143744_create_pemesanans_table', 1),
(13, '2025_06_17_012906_create_riwayat_penyewaan_table', 1),
(14, '2025_07_08_110139_add_is_seen_to_reservasi_table', 1),
(15, '2025_07_08_113835_add_expired_at_to_reservasi_table', 1),
(16, '2025_07_08_115547_add_timestamps_to_reservasi_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pengguna` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `id_pemilik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pengguna`, `email`, `nomor_hp`, `kata_sandi`, `id_pemilik`) VALUES
(1, 'Jena', 'Jena2@gmail.com', '081212121212', '123456', 1),
(9, 'zahrah', 'ufairah@gmail.com', '081266765432', '$2y$12$adIVGvX0YLKH.spZJ7nN9.5cNYjRSm.J5mqOblO9I6CUZySa5ByFO', NULL),
(10, 'atika', 'ufairahzahra2@gmail.com', '081266765432', '$2y$12$0XR9D1ilJGse7juOUC1uOu4BUbFbxB2X6mlww6B3MV62VSnGqPJ46', NULL),
(11, 'raisa', 'raisa34@gmail.com', '08764321456', '$2y$12$MAlkvh0SOJcLAFiIJAhCQOK34UFrQrdhm9UMDEPqErMGb.pQIj02a', NULL),
(12, 'aira', 'aira@gmail.com', '08992654321', '$2y$12$apBSWAioFNJYzXEHPPPJXuKB9HAA4dX/wtN37/9fzMOa4UdHg7Tha', NULL),
(13, 'gafi', 'gafi@gmail.com', '08764321456', '$2y$12$0CKk3aYQu.r6dr/o4NR.K.TC.C5Od6Usc61TP4qbQKJY8fDEenFz6', NULL),
(14, 'asa', 'asa1@gmail.com', '12345678', '$2y$12$CZv1JTFNerEbSC0PyNG03O434FBK271cazDyuHp3XpB2zc9um5Ve6', NULL),
(15, 'ayi', 'ayi2@gmail.com', '12345678', '$2y$12$/8hA9xqAybCIHJ9aFsOiROh.Sb6Ije.ld7J/c0LDINohTn.PRCJDS', NULL),
(16, 'gemes', 'gemes@gmail.com', '082385289497', '$2y$12$/roCy8SKeggOqxrv08.lNe.YN7Dlrnh7zTcpsPrQLhOCD4TxFZNey', NULL),
(17, 'ara', 'ara@gmail.com', '0876543467', '$2y$12$3kzoEkuhYCSCjLJvnp/9Ru.EE19irMUMrk5JMWMDoFVF107loF0GK', NULL),
(18, 'slebew', 'slebew@gmail.com', '12345678', '$2y$12$xUlGCwQkSgolFMZndE4WluD6qDl.AOLA.nrFah2SGNF8XeEaherVu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanans`
--

CREATE TABLE `pemesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nama_pemilik`, `email`, `kata_sandi`) VALUES
(1, 'Abby', 'billiard2@gmail.com', '$2y$12$l2NuQVESSoOwzIa76BRwruPKLgJlh2ENBvaFQexDBQFVU1SbHEwEK'),
(1, 'Abby', 'billiard2@gmail.com', '$2y$12$l2NuQVESSoOwzIa76BRwruPKLgJlh2ENBvaFQexDBQFVU1SbHEwEK');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_meja` int(11) DEFAULT NULL,
  `tanggal_reservasi` date NOT NULL,
  `jam` varchar(50) DEFAULT NULL,
  `id_waktu` int(11) DEFAULT NULL,
  `durasi_sewa` int(11) DEFAULT 1,
  `total_harga` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'menunggu_konfirmasi',
  `id_pemilik` int(11) NOT NULL,
  `kode_reservasi` varchar(50) DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `expired_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_pelanggan`, `id_transaksi`, `id_meja`, `tanggal_reservasi`, `jam`, `id_waktu`, `durasi_sewa`, `total_harga`, `status`, `id_pemilik`, `kode_reservasi`, `is_seen`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 14, 1, 19, '2025-07-18', '11:00:00-12:00:00', 1, 1, 30000, 'dikonfirmasi', 1, 'RS001', 1, '2025-07-18 13:34:47', '2025-07-18 13:32:47', '2025-07-18 13:33:18'),
(2, 14, 2, 20, '2025-07-18', '11:00:00-12:00:00', 1, 1, 60000, 'dikonfirmasi', 1, 'RS002', 1, '2025-07-18 13:39:12', '2025-07-18 13:37:12', '2025-07-18 13:37:42'),
(3, 14, 2, 21, '2025-07-18', '11:00:00-12:00:00', 1, 1, 80000, 'dikonfirmasi', 1, 'RS003', 1, '2025-07-18 13:39:12', '2025-07-18 13:37:12', '2025-07-18 13:37:46'),
(4, 14, 3, 19, '2025-07-18', '12:00:00-13:00:00', 2, 1, 30000, 'dikonfirmasi', 1, 'RS004', 1, '2025-07-18 14:12:37', '2025-07-18 14:10:37', '2025-07-19 04:02:06'),
(5, 14, 3, 20, '2025-07-19', '12:00:00-13:00:00', 2, 1, 60000, 'dikonfirmasi', 1, 'RS005', 1, '2025-07-19 03:14:26', '2025-07-19 03:12:26', '2025-07-19 03:28:58'),
(6, 14, 3, 24, '2025-07-19', '18:00:00-19:00:00', 8, 1, 60000, 'dikonfirmasi', 1, 'RS006', 1, '2025-07-19 03:14:26', '2025-07-19 03:12:26', '2025-07-19 03:29:05'),
(7, 14, 4, 20, '2025-07-19', '16:00:00-17:00:00', 6, 1, 60000, 'dikonfirmasi', 1, 'RS007', 1, '2025-07-19 04:06:15', '2025-07-19 04:04:15', '2025-07-19 04:05:37'),
(8, 14, NULL, 19, '2025-07-19', '13:00:00-14:00:00', 3, 1, 30000, 'dikonfirmasi', 1, 'RS008', 0, '2025-07-19 04:09:06', '2025-07-19 04:07:06', '2025-07-19 05:03:03'),
(9, 14, NULL, 19, '2025-07-19', '13:00:00-14:00:00', 3, 1, 30000, 'dikonfirmasi', 1, 'RS009', 1, '2025-07-19 04:22:43', '2025-07-19 04:20:43', '2025-07-19 05:03:04');

--
-- Triggers `reservasi`
--
DELIMITER $$
CREATE TRIGGER `before_insert_reservasi` BEFORE INSERT ON `reservasi` FOR EACH ROW BEGIN
IF NEW.kode_reservasi IS NULL OR NEW.kode_reservasi = '' THEN
SET NEW.kode_reservasi = CONCAT('RS', LPAD((SELECT IFNULL(MAX(id_reservasi), 0) + 1 FROM reservasi), 3, '0'));
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `resi_penyewaan`
--

CREATE TABLE `resi_penyewaan` (
  `id_resi` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `tanggal_cetak` date DEFAULT NULL,
  `kode_resi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resi_penyewaan`
--

INSERT INTO `resi_penyewaan` (`id_resi`, `id_transaksi`, `tanggal_cetak`, `kode_resi`) VALUES
(1, 1, '2025-07-18', 'RP001'),
(2, 2, '2025-07-18', 'RP002'),
(3, 3, '2025-07-19', 'RP003'),
(4, 4, '2025-07-19', 'RP004');

--
-- Triggers `resi_penyewaan`
--
DELIMITER $$
CREATE TRIGGER `before_insert_resi` BEFORE INSERT ON `resi_penyewaan` FOR EACH ROW BEGIN
IF NEW.kode_resi IS NULL OR NEW.kode_resi = '' THEN
SET NEW.kode_resi = CONCAT('RP', LPAD((SELECT IFNULL(MAX(id_resi), 0) + 1 FROM resi_penyewaan), 3, '0'));
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_penyewaan`
--

CREATE TABLE `riwayat_penyewaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resi` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('r55PDSm00wwKE64ZrTsR1beabUnHD70ZWC4epavu', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRkpYNVVaWTZDRDRuelNLNVFYWjg0cGw1NnJOSnRCdzAxaHlDZThnciI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2Rhc2giO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU2OiJsb2dpbl9wZWxhbmdnYW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNDtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3Jlc2VydmFzaT9maWx0ZXI9dG9kYXkiO31zOjU0OiJsb2dpbl9wZW1pbGlrXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1752901401);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembayaran`
--

CREATE TABLE `transaksi_pembayaran` (
  `id_transaksi` int(11) NOT NULL,
  `id_reservasi` int(11) DEFAULT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `total_bayar` int(11) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status` enum('belum_dibayar','menunggu_konfirmasi','dibayar') DEFAULT 'belum_dibayar',
  `id_pemilik` int(11) NOT NULL,
  `kode_transaksi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_pembayaran`
--

INSERT INTO `transaksi_pembayaran` (`id_transaksi`, `id_reservasi`, `metode_pembayaran`, `tanggal_transaksi`, `total_bayar`, `bukti_pembayaran`, `status`, `id_pemilik`, `kode_transaksi`) VALUES
(1, 1, 'bni', NULL, 30000, 'bukti_pembayaran/1752845583_buktipembayaran.png', 'belum_dibayar', 1, 'TR001'),
(2, 2, 'bni', NULL, 140000, 'bukti_pembayaran/1752845849_buktipembayaran.png', 'belum_dibayar', 1, 'TR002'),
(3, 5, 'bni', NULL, 120000, 'bukti_pembayaran/1752894767_buktipembayaran.png', 'belum_dibayar', 1, 'TR003'),
(4, 7, 'bni', NULL, 60000, 'bukti_pembayaran/1752897872_buktipembayaran.png', 'belum_dibayar', 1, 'TR004');

--
-- Triggers `transaksi_pembayaran`
--
DELIMITER $$
CREATE TRIGGER `before_insert_transaksi` BEFORE INSERT ON `transaksi_pembayaran` FOR EACH ROW BEGIN
IF NEW.kode_transaksi IS NULL OR NEW.kode_transaksi = '' THEN
SET NEW.kode_transaksi = CONCAT('TR', LPAD((SELECT IFNULL(MAX(id_transaksi), 0) + 1 FROM transaksi_pembayaran), 3, '0'));
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `waktu_sewa`
--

CREATE TABLE `waktu_sewa` (
  `id_waktu` int(11) NOT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waktu_sewa`
--

INSERT INTO `waktu_sewa` (`id_waktu`, `jam_mulai`, `jam_selesai`) VALUES
(1, '11:00:00', '12:00:00'),
(2, '12:00:00', '13:00:00'),
(3, '13:00:00', '14:00:00'),
(4, '14:00:00', '15:00:00'),
(5, '15:00:00', '16:00:00'),
(6, '16:00:00', '17:00:00'),
(7, '17:00:00', '18:00:00'),
(8, '18:00:00', '19:00:00'),
(9, '19:00:00', '20:00:00'),
(10, '20:00:00', '21:00:00'),
(11, '21:00:00', '22:00:00'),
(12, '22:00:00', '23:00:00'),
(13, '23:00:00', '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `meja_billiard`
--
ALTER TABLE `meja_billiard`
  ADD PRIMARY KEY (`id_meja`),
  ADD KEY `id_pemilik` (`id_pemilik`),
  ADD KEY `fk_kategori` (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `fk_id_transaksi` (`id_transaksi`);

--
-- Indexes for table `resi_penyewaan`
--
ALTER TABLE `resi_penyewaan`
  ADD PRIMARY KEY (`id_resi`);

--
-- Indexes for table `transaksi_pembayaran`
--
ALTER TABLE `transaksi_pembayaran`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `waktu_sewa`
--
ALTER TABLE `waktu_sewa`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meja_billiard`
--
ALTER TABLE `meja_billiard`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `resi_penyewaan`
--
ALTER TABLE `resi_penyewaan`
  MODIFY `id_resi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi_pembayaran`
--
ALTER TABLE `transaksi_pembayaran`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `waktu_sewa`
--
ALTER TABLE `waktu_sewa`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `fk_id_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi_pembayaran` (`id_transaksi`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
