-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2025 at 03:39 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pisces_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `close_drawers`
--

CREATE TABLE `close_drawers` (
  `id` bigint UNSIGNED NOT NULL,
  `kasir_id` bigint UNSIGNED NOT NULL,
  `waktu_tutup` timestamp NOT NULL,
  `saldo_akhir` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `saldo_awal` decimal(12,2) NOT NULL DEFAULT '0.00',
  `uang_masuk` decimal(12,2) NOT NULL DEFAULT '0.00',
  `uang_keluar` decimal(12,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `close_drawers`
--

INSERT INTO `close_drawers` (`id`, `kasir_id`, `waktu_tutup`, `saldo_akhir`, `created_at`, `updated_at`, `saldo_awal`, `uang_masuk`, `uang_keluar`) VALUES
(1, 2, '2025-11-15 01:19:49', '761000.00', '2025-11-15 01:19:49', '2025-11-15 01:19:49', '0.00', '0.00', '0.00'),
(2, 2, '2025-11-15 01:24:34', '761000.00', '2025-11-15 01:24:34', '2025-11-15 01:24:34', '0.00', '0.00', '0.00'),
(3, 2, '2025-11-15 01:25:23', '9021000.00', '2025-11-15 01:25:23', '2025-11-15 01:25:23', '0.00', '0.00', '0.00'),
(4, 2, '2025-11-18 17:06:48', '60000.00', '2025-11-18 17:06:48', '2025-11-18 17:06:48', '60000.00', '0.00', '0.00'),
(5, 2, '2025-11-19 00:41:39', '32.00', '2025-11-19 00:41:39', '2025-11-19 00:41:39', '32.00', '0.00', '0.00'),
(6, 2, '2025-11-20 03:52:24', '247000.00', '2025-11-20 03:52:24', '2025-11-20 03:52:24', '100000.00', '0.00', '0.00'),
(7, 2, '2025-11-20 03:52:45', '4000000.00', '2025-11-20 03:52:45', '2025-11-20 03:52:45', '4000000.00', '0.00', '0.00'),
(8, 2, '2025-11-20 04:04:48', '2380000.00', '2025-11-20 04:04:48', '2025-11-20 04:04:48', '1000000.00', '0.00', '0.00'),
(9, 2, '2025-11-20 04:04:51', '4527000.00', '2025-11-20 04:04:51', '2025-11-20 04:04:51', '3000000.00', '0.00', '0.00'),
(10, 2, '2025-11-20 04:04:52', '4655000.00', '2025-11-20 04:04:52', '2025-11-20 04:04:52', '3000000.00', '0.00', '0.00'),
(11, 2, '2025-11-20 04:04:53', '3820000.00', '2025-11-20 04:04:53', '2025-11-20 04:04:53', '2000000.00', '0.00', '0.00'),
(12, 2, '2025-11-20 08:26:08', '3009000.00', '2025-11-20 08:26:08', '2025-11-20 08:26:08', '3000000.00', '0.00', '0.00'),
(13, 2, '2025-11-27 15:37:41', '2000000.00', '2025-11-27 15:37:41', '2025-11-27 15:37:41', '2000000.00', '0.00', '0.00'),
(14, 2, '2025-11-29 11:54:44', '200000.00', '2025-11-29 11:54:44', '2025-11-29 11:54:44', '200000.00', '0.00', '0.00'),
(15, 2, '2025-11-29 12:02:39', '40000.00', '2025-11-29 12:02:39', '2025-11-29 12:02:39', '40000.00', '0.00', '0.00'),
(16, 2, '2025-11-29 12:09:24', '2222222.00', '2025-11-29 12:09:24', '2025-11-29 12:09:24', '2222222.00', '0.00', '0.00'),
(17, 2, '2025-12-02 22:38:34', '25772311.00', '2025-12-02 22:38:34', '2025-12-02 22:38:34', '25712311.00', '0.00', '0.00'),
(18, 2, '2025-12-02 22:53:48', '620000.00', '2025-12-02 22:53:48', '2025-12-02 22:53:48', '500000.00', '0.00', '0.00'),
(19, 2, '2025-12-03 10:08:05', '212242.00', '2025-12-03 10:08:05', '2025-12-03 10:08:05', '20000.00', '0.00', '0.00'),
(20, 2, '2025-12-03 11:47:34', '893363.00', '2025-12-03 11:47:34', '2025-12-03 11:47:34', '500000.00', '393363.00', '0.00'),
(21, 2, '2025-12-03 11:48:03', '833363.00', '2025-12-03 11:48:03', '2025-12-03 11:48:03', '500000.00', '393363.00', '0.00'),
(22, 2, '2025-12-03 11:49:07', '3393363.00', '2025-12-03 11:49:07', '2025-12-03 11:49:07', '3000000.00', '393363.00', '0.00'),
(23, 2, '2025-12-03 11:49:58', '914484.00', '2025-12-03 11:49:58', '2025-12-03 11:49:58', '500000.00', '414484.00', '0.00'),
(24, 2, '2025-12-03 12:44:35', '614484.00', '2025-12-03 12:44:35', '2025-12-03 12:44:35', '200000.00', '414484.00', '0.00'),
(25, 2, '2025-12-03 13:36:10', '414484.00', '2025-12-03 13:36:10', '2025-12-03 13:36:10', '0.00', '414484.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksis`
--

CREATE TABLE `detail_transaksis` (
  `id` bigint UNSIGNED NOT NULL,
  `transaksi_id` bigint UNSIGNED NOT NULL,
  `produk_id` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksis`
--

INSERT INTO `detail_transaksis` (`id`, `transaksi_id`, `produk_id`, `jumlah`, `subtotal`, `created_at`, `updated_at`) VALUES
(24, 24, 10, 1, '60000.00', '2025-11-19 05:52:07', '2025-11-19 05:52:07'),
(30, 29, 12, 1, '30000.00', '2025-11-19 20:41:13', '2025-11-19 20:41:13'),
(31, 30, 10, 1, '60000.00', '2025-11-20 03:51:58', '2025-11-20 03:51:58'),
(33, 32, 15, 1, '60000.00', '2025-11-20 04:02:18', '2025-11-20 04:02:18'),
(34, 33, 16, 1, '60000.00', '2025-11-20 04:03:28', '2025-11-20 04:03:28'),
(36, 34, 16, 1, '60000.00', '2025-11-20 08:25:01', '2025-11-20 08:25:01'),
(38, 36, 12, 1, '30000.00', '2025-11-27 15:37:14', '2025-11-27 15:37:14'),
(39, 37, 10, 1, '60000.00', '2025-12-01 12:33:16', '2025-12-01 12:33:16'),
(40, 38, 10, 2, '120000.00', '2025-12-02 22:52:22', '2025-12-02 22:52:22'),
(41, 39, 12, 1, '30000.00', '2025-12-03 06:18:50', '2025-12-03 06:18:50'),
(42, 40, 20, 1, '60000.00', '2025-12-03 07:12:11', '2025-12-03 07:12:11'),
(43, 41, 20, 1, '60000.00', '2025-12-03 07:24:21', '2025-12-03 07:24:21'),
(44, 42, 21, 1, '21121.00', '2025-12-03 07:28:02', '2025-12-03 07:28:02'),
(45, 43, 21, 1, '21121.00', '2025-12-03 10:06:23', '2025-12-03 10:06:23'),
(46, 44, 20, 1, '60000.00', '2025-12-03 10:08:30', '2025-12-03 10:08:30'),
(47, 45, 21, 1, '21121.00', '2025-12-03 10:18:50', '2025-12-03 10:18:50'),
(48, 46, 21, 1, '21121.00', '2025-12-03 11:49:43', '2025-12-03 11:49:43'),
(49, 47, 21, 1, '21121.00', '2025-12-03 14:21:29', '2025-12-03 14:21:29'),
(50, 48, 20, 1, '60000.00', '2025-12-03 14:22:08', '2025-12-03 14:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kasirs`
--

CREATE TABLE `kasirs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kasirs`
--

INSERT INTO `kasirs` (`id`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Gilbran', 'gilbran', '$2y$10$CwTycUXWue0Thq9StjUM0uJ8WcJR6Ddyzy0Y1jz1d5eUI1F4W4HkK', '2025-11-08 11:53:48', '2025-11-08 11:53:48'),
(2, 'root', 'root', '$2y$10$Cii2W0V.nsvmFOMyM6IdjuoPtbuOS.IEtiBA31tEdPbR80jOqfoWO', '2025-11-10 15:03:49', '2025-11-10 15:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produks`
--

CREATE TABLE `kategori_produks` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_produks`
--

INSERT INTO `kategori_produks` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Sparepart Motor', '2025-11-08 04:48:52', '2025-11-08 04:48:52'),
(3, 'Prias', '2025-11-18 23:06:59', '2025-12-03 12:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_10_05_134707_create_kasirs_table', 1),
(6, '2025_10_31_001000_create_kategori_produks_table', 1),
(7, '2025_10_31_002000_create_produks_table', 1),
(8, '2025_10_31_003000_create_transaksis_table', 1),
(9, '2025_10_31_003900_create_detail_transaksis_table', 1),
(10, '2025_10_31_003924_create_riwayat_transaksis_table', 1),
(11, '2025_10_31_003948_create_open_drawers_table', 1),
(12, '2025_10_31_004011_create_close_drawers_table', 1),
(13, '2025_11_12_023544_add_gambar_to_produks_table', 2),
(14, '2025_11_14_115411_add_drawer_id_to_transaksis_table', 3),
(15, '2025_11_15_084038_add_fields_to_close_drawers', 3),
(17, '2025_11_20_105944_add_softdeletes_to_produks_table', 4),
(20, '2025_12_03_175437_add_metode_to_transaksis_table', 5),
(21, '2025_12_03_175533_add_uang_fields_to_close_drawers_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `open_drawers`
--

CREATE TABLE `open_drawers` (
  `id` bigint UNSIGNED NOT NULL,
  `kasir_id` bigint UNSIGNED NOT NULL,
  `waktu_buka` timestamp NOT NULL,
  `saldo_awal` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `open_drawers`
--

INSERT INTO `open_drawers` (`id`, `kasir_id`, `waktu_buka`, `saldo_awal`, `created_at`, `updated_at`) VALUES
(25, 2, '2025-12-03 14:18:24', '222222.00', '2025-12-03 14:18:24', '2025-12-03 14:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `kode_produk`, `kategori_id`, `nama_produk`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, '', 1, 'Kalung', '60000.00', 208, 'images/produk/1763537037_WhatsApp Image 2025-07-30 at 10.58.27.jpg', '2025-11-19 00:21:25', '2025-12-03 11:52:12', '2025-12-03 11:52:12'),
(12, '', 1, 'Gelang', '30000.00', 209, 'images/produk/1763610053_PA010.jpg', '2025-11-19 20:40:53', '2025-12-03 11:52:15', '2025-12-03 11:52:15'),
(15, '', 1, 'Ikan Irjon', '60000.00', 199, 'images/produk/1763611325_PA003.jpg', '2025-11-20 04:02:05', '2025-12-03 11:52:17', '2025-12-03 11:52:17'),
(16, '', 1, 'Ikan Irjon', '60000.00', 209, 'images/produk/1763611395_Oasis Knebworth 1996_ In cinemas worldwide from September 23_.jpg', '2025-11-20 04:03:15', '2025-12-03 11:52:19', '2025-12-03 11:52:19'),
(18, '', 1, 'Kacang Panjang', '60000.00', 32, 'images/produk/1764257811_Screenshot 2025-11-27 222923.png', '2025-11-27 15:36:51', '2025-12-03 11:52:23', '2025-12-03 11:52:23'),
(19, '', 1, 'Kalung', '2213.00', 211, 'images/produk/1764417118_Screenshot 2025-01-17 103720.png', '2025-11-29 11:51:58', '2025-12-03 11:52:25', '2025-12-03 11:52:25'),
(20, 'PA0001', 3, '2322dd', '60000.00', 219, 'images/produk/1764741110_download.jpg', '2025-12-03 05:51:50', '2025-12-03 14:22:08', NULL),
(21, 'PA0002', 1, 'Kacang Panjangsasa', '21121.00', 217, 'images/produk/1764743246_Screenshot 2025-01-26 225348.png', '2025-12-03 06:27:26', '2025-12-03 14:21:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_transaksis`
--

CREATE TABLE `riwayat_transaksis` (
  `id` bigint UNSIGNED NOT NULL,
  `transaksi_id` bigint UNSIGNED NOT NULL,
  `waktu_transaksi` timestamp NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'selesai',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint UNSIGNED NOT NULL,
  `kasir_id` bigint UNSIGNED NOT NULL,
  `drawer_id` bigint UNSIGNED DEFAULT NULL,
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tunai',
  `kode_qr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` decimal(12,2) NOT NULL DEFAULT '0.00',
  `jumlah_bayar` decimal(12,2) DEFAULT '0.00',
  `kembalian` decimal(12,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `kasir_id`, `drawer_id`, `metode`, `kode_qr`, `total_harga`, `jumlah_bayar`, `kembalian`, `created_at`, `updated_at`) VALUES
(3, 2, NULL, 'Tunai', 'TRX-6913cccc79a00', '60000.00', '0.00', '0.00', '2025-11-11 16:54:52', '2025-11-11 16:54:52'),
(4, 2, NULL, 'Tunai', 'TRX-691677458a189', '21000.00', '0.00', '0.00', '2025-11-13 17:26:45', '2025-11-13 17:26:45'),
(5, 2, NULL, 'Tunai', 'TRX-6916a37deefd0', '21000.00', '0.00', '0.00', '2025-11-13 20:35:25', '2025-11-13 20:35:25'),
(6, 2, NULL, 'Tunai', 'TRX-6916a3b26e22d', '21000.00', '0.00', '0.00', '2025-11-13 20:36:18', '2025-11-13 20:36:18'),
(7, 2, NULL, 'Tunai', 'TRX-6916a486c2c94', '41000.00', '0.00', '0.00', '2025-11-13 20:39:50', '2025-11-13 20:39:50'),
(8, 2, NULL, 'Tunai', 'TRX-6916a4acbedcf', '20000.00', '0.00', '0.00', '2025-11-13 20:40:28', '2025-11-13 20:40:28'),
(9, 2, NULL, 'Tunai', 'TRX-691722ec11c5e', '20000.00', '0.00', '0.00', '2025-11-14 05:39:08', '2025-11-14 05:39:08'),
(10, 2, NULL, 'Tunai', 'TRX-691724e529a26', '21000.00', '0.00', '0.00', '2025-11-14 05:47:33', '2025-11-14 05:47:33'),
(11, 2, NULL, 'Tunai', 'TRX-6918379355926', '20000.00', '0.00', '0.00', '2025-11-15 01:19:31', '2025-11-15 01:19:31'),
(12, 2, NULL, 'Tunai', 'TRX-691838e99c99d', '21000.00', '0.00', '0.00', '2025-11-15 01:25:13', '2025-11-15 01:25:13'),
(13, 2, NULL, 'Tunai', 'TRX-691839500f3b0', '21000.00', '0.00', '0.00', '2025-11-15 01:26:56', '2025-11-15 01:26:56'),
(14, 2, NULL, 'Tunai', 'TRX-6918415085e9b', '21000.00', '0.00', '0.00', '2025-11-15 02:01:04', '2025-11-15 02:01:04'),
(15, 2, NULL, 'Tunai', 'TRX-6918429f96462', '20000.00', '0.00', '0.00', '2025-11-15 02:06:39', '2025-11-15 02:06:39'),
(16, 2, NULL, 'Tunai', 'TRX-691845c87f487', '20000.00', '0.00', '0.00', '2025-11-15 02:20:08', '2025-11-15 02:20:08'),
(17, 2, NULL, 'Tunai', 'TRX-6918470a307d1', '21000.00', '0.00', '0.00', '2025-11-15 02:25:30', '2025-11-15 02:25:30'),
(18, 2, NULL, 'Tunai', 'TRX-69198a75b3061', '20000.00', '30000.00', '10000.00', '2025-11-16 01:25:25', '2025-11-16 01:25:25'),
(19, 2, NULL, 'Tunai', 'TRX-69198cb241e18', '21000.00', '210000.00', '189000.00', '2025-11-16 01:34:58', '2025-11-16 01:34:58'),
(20, 2, NULL, 'Tunai', 'TRX-69198e189e177', '21000.00', '900000.00', '879000.00', '2025-11-16 01:40:56', '2025-11-16 01:40:56'),
(21, 2, NULL, 'Tunai', 'TRX-691bda47221d9', '21000.00', '24000.00', '3000.00', '2025-11-17 19:30:31', '2025-11-17 19:30:31'),
(22, 2, NULL, 'Tunai', 'TRX-691d07fe4050c', '26000.00', '26000.00', '0.00', '2025-11-18 16:57:50', '2025-11-18 16:57:50'),
(23, 2, NULL, 'Tunai', 'TRX-691dbc0bec4ce', '21000.00', '200000.00', '179000.00', '2025-11-19 05:46:03', '2025-11-19 05:46:03'),
(24, 2, NULL, 'Tunai', 'TRX-691dbd77d3798', '60000.00', '70000.00', '10000.00', '2025-11-19 05:52:07', '2025-11-19 05:52:07'),
(25, 2, NULL, 'Tunai', 'TRX-691e86f46d39a', '21000.00', '50000.00', '29000.00', '2025-11-19 20:11:48', '2025-11-19 20:11:48'),
(26, 2, NULL, 'Tunai', 'TRX-691e871fbaf9d', '5000.00', '5000.00', '0.00', '2025-11-19 20:12:31', '2025-11-19 20:12:31'),
(27, 2, NULL, 'Tunai', 'TRX-691e8a3e346e0', '26000.00', '32000.00', '6000.00', '2025-11-19 20:25:50', '2025-11-19 20:25:50'),
(28, 2, NULL, 'Tunai', 'TRX-691e8a5c5b462', '5000.00', '5000.00', '0.00', '2025-11-19 20:26:20', '2025-11-19 20:26:20'),
(29, 2, NULL, 'Tunai', 'TRX-691e8dd921f61', '30000.00', '50000.00', '20000.00', '2025-11-19 20:41:13', '2025-11-19 20:41:13'),
(30, 2, NULL, 'Tunai', 'TRX-691e905e11fa1', '60000.00', '60000.00', '0.00', '2025-11-20 03:51:58', '2025-11-20 03:51:58'),
(31, 2, NULL, 'Tunai', 'TRX-691e9107c3d3c', '1260000.00', '10000000.00', '8740000.00', '2025-11-20 03:54:47', '2025-11-20 03:54:47'),
(32, 2, NULL, 'Tunai', 'TRX-691e92ca76765', '60000.00', '600000.00', '540000.00', '2025-11-20 04:02:18', '2025-11-20 04:02:18'),
(33, 2, NULL, 'Tunai', 'TRX-691e931021ce0', '60000.00', '600000.00', '540000.00', '2025-11-20 04:03:28', '2025-11-20 04:03:28'),
(34, 2, NULL, 'Tunai', 'TRX-691ed05d63ad5', '69000.00', '69000.00', '0.00', '2025-11-20 08:25:01', '2025-11-20 08:25:01'),
(35, 2, NULL, 'Tunai', 'TRX-691ed08feb404', '9000.00', '10000.00', '1000.00', '2025-11-20 08:25:51', '2025-11-20 08:25:51'),
(36, 2, NULL, 'Tunai', 'TRX-6928702ae8279', '30000.00', '200000.00', '170000.00', '2025-11-27 15:37:14', '2025-11-27 15:37:14'),
(37, 2, NULL, 'Tunai', 'TRX-692d8b0c5e27c', '60000.00', '69999.00', '9999.00', '2025-12-01 12:33:16', '2025-12-01 12:33:16'),
(38, 2, NULL, 'Tunai', 'TRX-692f6da685112', '120000.00', '120000.00', '0.00', '2025-12-02 22:52:22', '2025-12-02 22:52:22'),
(39, 2, NULL, 'Tunai', 'TRX-692fd64a711f7', '30000.00', '70000.00', '40000.00', '2025-12-03 06:18:50', '2025-12-03 06:18:50'),
(40, 2, NULL, 'Tunai', 'TRX-692fe2cb0b739', '60000.00', '100000.00', '40000.00', '2025-12-03 07:12:11', '2025-12-03 07:12:11'),
(41, 2, NULL, 'Tunai', 'TRX-692fe5a57cdfd', '60000.00', '100000.00', '40000.00', '2025-12-03 07:24:21', '2025-12-03 07:24:21'),
(42, 2, NULL, 'Tunai', 'TRX-692fe682babdc', '21121.00', '30000.00', '8879.00', '2025-12-03 07:28:02', '2025-12-03 07:28:02'),
(43, 2, NULL, 'Tunai', 'TRX-69300b9fc1b40', '21121.00', '25000.00', '3879.00', '2025-12-03 10:06:23', '2025-12-03 10:06:23'),
(44, 2, NULL, 'Tunai', 'TRX-69300c1e3030a', '60000.00', '100000.00', '40000.00', '2025-12-03 10:08:30', '2025-12-03 10:08:30'),
(45, 2, NULL, 'Tunai', 'TRX-69300e8a661f3', '21121.00', '70000.00', '48879.00', '2025-12-03 10:18:50', '2025-12-03 10:18:50'),
(46, 2, NULL, 'Tunai', 'TRX-693023d7d7fb5', '21121.00', '70000.00', '48879.00', '2025-12-03 11:49:43', '2025-12-03 11:49:43'),
(47, 2, 25, 'Tunai', 'TRX-69304769c1079', '21121.00', '50000.00', '28879.00', '2025-12-03 14:21:29', '2025-12-03 14:21:29'),
(48, 2, 25, 'Tunai', 'TRX-6930479050fc7', '60000.00', '62000.00', '2000.00', '2025-12-03 14:22:08', '2025-12-03 14:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `close_drawers`
--
ALTER TABLE `close_drawers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `close_drawers_kasir_id_foreign` (`kasir_id`);

--
-- Indexes for table `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksis_transaksi_id_foreign` (`transaksi_id`),
  ADD KEY `detail_transaksis_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kasirs`
--
ALTER TABLE `kasirs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kasirs_username_unique` (`username`);

--
-- Indexes for table `kategori_produks`
--
ALTER TABLE `kategori_produks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_produks_nama_kategori_unique` (`nama_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `open_drawers`
--
ALTER TABLE `open_drawers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `open_drawers_kasir_id_foreign` (`kasir_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produks_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `riwayat_transaksis`
--
ALTER TABLE `riwayat_transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_transaksis_transaksi_id_foreign` (`transaksi_id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaksis_kode_qr_unique` (`kode_qr`),
  ADD KEY `transaksis_kasir_id_foreign` (`kasir_id`),
  ADD KEY `transaksis_drawer_id_foreign` (`drawer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `close_drawers`
--
ALTER TABLE `close_drawers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kasirs`
--
ALTER TABLE `kasirs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_produks`
--
ALTER TABLE `kategori_produks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `open_drawers`
--
ALTER TABLE `open_drawers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `riwayat_transaksis`
--
ALTER TABLE `riwayat_transaksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `close_drawers`
--
ALTER TABLE `close_drawers`
  ADD CONSTRAINT `close_drawers_kasir_id_foreign` FOREIGN KEY (`kasir_id`) REFERENCES `kasirs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD CONSTRAINT `detail_transaksis_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksis_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `open_drawers`
--
ALTER TABLE `open_drawers`
  ADD CONSTRAINT `open_drawers_kasir_id_foreign` FOREIGN KEY (`kasir_id`) REFERENCES `kasirs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_produks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `riwayat_transaksis`
--
ALTER TABLE `riwayat_transaksis`
  ADD CONSTRAINT `riwayat_transaksis_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_drawer_id_foreign` FOREIGN KEY (`drawer_id`) REFERENCES `open_drawers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transaksis_kasir_id_foreign` FOREIGN KEY (`kasir_id`) REFERENCES `kasirs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
