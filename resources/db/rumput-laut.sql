-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 08:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumput-laut`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `id_artikel` int(100) UNSIGNED NOT NULL,
  `judul_artikel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_artikel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_artikel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglupload_artikel` date NOT NULL,
  `gambar_artikel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` bigint(100) UNSIGNED NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikels`
--

INSERT INTO `artikels` (`id_artikel`, `judul_artikel`, `isi_artikel`, `sumber_artikel`, `tglupload_artikel`, `gambar_artikel`, `no_ktp`, `status`) VALUES
(29, 'Potensi Rumput Laut Indonesia Raya', 'aaaaaaaaa', 'Kementrian P&K', '2022-07-05', '1656957812.png', 3333333333333333, 'final'),
(30, 'Pentingnya panen rumput laut sebelum 45 hari', 'aaaaaaaaaaaqq', 'qqqqqqq', '2022-07-05', '1656958455.png', 3333333333333333, ''),
(32, 'Potensi Rumput Laut Indonesia', '->where(\'sumber_artikel\', \'Like\', \'%\' . $search_artikel . \'%\')\r\n      ->where(\'sumber_artikel\', \'Like\', \'%\' . $search_artikel . \'%\')\r\n      ->where(\'sumber_artikel\', \'Like\', \'%\' . $search_artikel . \'%\')\r\n      ->where(\'sumber_artikel\', \'Like\', \'%\' . $search_artikel . \'%\')\r\n      ->where(\'sumber_artikel\', \'Like\', \'%\' . $search_artikel . \'%\')\r\n      ->where(\'sumber_artikel\', \'Like\', \'%\' . $search_artikel . \'%\')', 'Google Gambar', '2022-07-10', '1657439501.jpg', 737109, ''),
(34, 'aaaaaa', 'aaaaa', 'Google Gambar', '2022-07-04', '1657445688.jpg', 737109, 'final'),
(35, 'Potensi Rumput Laut Indonesia', 'zzzzzzzzzzzzzzz', 'Kementrian PK', '2022-07-04', '1657446437.jpg', 737109, ''),
(37, 'Pentingnya panen rumput laut sebelum 45 hari', 'zzzzzzzzzzzzzzz', 'Google', '2022-07-10', '1657447212.jpg', 737109, 'final'),
(38, 'Potensi Rumput Laut Indonesia', 'input type=”number” adalah bidang untuk memasukan angka.  input number akan memvalidasi dan menolak masukan selain angka.  pada saat inputan focus atau hover menggunakan mouse akan tampil panah untuk menambah angka atau menurunkan angkanya.', 'Google', '2022-07-10', '1657447391.jpg', 737109, 'final'),
(39, 'coba', 'cobacaaaaaaaaaaaa\'', 'cobaa', '2022-07-16', '1657952756.png', 737109, 'final');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(100) UNSIGNED NOT NULL,
  `user_id` bigint(100) NOT NULL,
  `id_rumputlaut` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_05_07_173958_create_sessions_table', 1),
(6, '2021_05_11_135115_create_produks_table', 1),
(7, '2021_05_20_154711_create_reservations_table', 1),
(8, '2021_05_22_182742_create_chefs_table', 1),
(9, '2021_05_24_173716_create_artikels_table', 1),
(10, '2021_06_02_192654_create_tests_table', 1),
(11, '2021_06_04_145153_create_carts_table', 1),
(12, '2021_07_11_053537_create_pesanans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `noktp_pelanggan` bigint(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(255) NOT NULL,
  `nohp_pelanggan` bigint(13) NOT NULL,
  `jenkel_pelanggan` varchar(100) NOT NULL,
  `foto_pelanggan` varchar(255) NOT NULL,
  `tgllahir_pelanggan` date NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`noktp_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `nohp_pelanggan`, `jenkel_pelanggan`, `foto_pelanggan`, `tgllahir_pelanggan`, `updated_at`, `created_at`) VALUES
(78993, 'FeraJulianti', 'Lampung Utara', 8123456789, 'Perempuan', '1657482295.jpeg', '2021-03-09', '2022-07-11 02:55:50', '2022-06-29 16:36:21'),
(123456, 'Julianti', 'Lampung Selatan', 81245, 'Perempuan', '1656496301.jpeg', '2022-06-22', '2022-06-29 16:51:41', '2022-06-29 16:51:41'),
(1234567890123456, 'Feraaaaaa', 'Bandung', 8123456789, 'Perempuan', '1657453967.jpg', '2001-08-13', '2022-07-10 18:52:47', '2022-07-10 18:52:47'),
(9875647382918574, 'udin', 'bandung sukapura', 85234123745, 'Perempuan', '1657889486.jpeg', '1986-01-15', '2022-07-15 19:51:26', '2022-07-15 19:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `pembudidayas`
--

CREATE TABLE `pembudidayas` (
  `noktp_pembudidaya` bigint(100) NOT NULL,
  `nama_pembudidaya` varchar(100) NOT NULL,
  `nohp_pembudidaya` bigint(14) UNSIGNED NOT NULL,
  `alamat_pembudidaya` varchar(255) NOT NULL,
  `tgllahir_pembudidaya` date NOT NULL,
  `foto_pembudidaya` varchar(255) NOT NULL,
  `jenkel_pembudidaya` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembudidayas`
--

INSERT INTO `pembudidayas` (`noktp_pembudidaya`, `nama_pembudidaya`, `nohp_pembudidaya`, `alamat_pembudidaya`, `tgllahir_pembudidaya`, `foto_pembudidaya`, `jenkel_pembudidaya`, `updated_at`, `created_at`) VALUES
(737109, 'Pembudidaya', 89695, 'Bantaeng', '2001-06-26', '1657794555.png', 'Perempuan', '2022-07-14 17:29:15', '2022-06-29 12:33:27'),
(3333333333333333, 'Aku', 812345678, 'Bantaeng', '2022-06-27', '1656955943.png', 'Perempuan', '2022-07-05 00:32:23', '2022-07-05 00:32:23'),
(4444444444444444, 'Talithaaa', 12345, 'bdg', '2004-01-01', '1657375950.jpg', 'Laki-laki', '2022-07-09 21:12:31', '2022-07-09 21:12:31'),
(5555555555555555, 'Talitha', 8912345678, 'Bantaeng', '2001-06-26', '1657002614.jpg', 'Perempuan', '2022-07-05 13:30:14', '2022-07-05 13:30:14'),
(6666666666666666, 'Talitha', 2111, 'bdg', '2001-06-26', '1657375599.jpg', 'Perempuan', '2022-07-09 21:06:39', '2022-07-09 21:06:39'),
(7777777777777777, 'talitha rizki 777', 111111111111, 'bdg', '2022-06-27', '1657373516.jpg', 'Perempuan', '2022-07-09 20:31:56', '2022-07-09 20:31:56'),
(8888888888888888, 'Talitha', 1111111111, 'bandung', '2022-07-03', '1657367764.jpg', 'Perempuan', '2022-07-09 18:56:04', '2022-07-09 18:56:04'),
(9999999999999999, 'talitha26', 1111111111, 'aaaaa', '2022-07-05', '1657362992.jpg', 'Perempuan', '2022-07-09 17:36:32', '2022-07-09 17:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id_pesanan` int(100) UNSIGNED NOT NULL,
  `tgl_pesanan` date DEFAULT NULL,
  `waktu_pesanan` time DEFAULT NULL,
  `id_rumputlaut` int(100) DEFAULT NULL,
  `noktp_pelanggan` bigint(100) DEFAULT NULL,
  `jumlah_pesanan` int(100) DEFAULT NULL,
  `total_pesanan` int(100) DEFAULT NULL,
  `status_pesanan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ekspedisi_pesanan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konfirmasi_pesanan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi_testimoni` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_testimoni` date DEFAULT NULL,
  `waktu_testimoni` time DEFAULT NULL,
  `balasan_testimoni` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bintang_testimoni` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id_pesanan`, `tgl_pesanan`, `waktu_pesanan`, `id_rumputlaut`, `noktp_pelanggan`, `jumlah_pesanan`, `total_pesanan`, `status_pesanan`, `ekspedisi_pesanan`, `konfirmasi_pesanan`, `bukti_pembayaran`, `isi_testimoni`, `tgl_testimoni`, `waktu_testimoni`, `balasan_testimoni`, `bintang_testimoni`) VALUES
(28, '2022-05-29', '09:45:12', 18, 78993, 4, 100000, 'Direfund', 'JNE/J&T', 'Pending', 'bukti1.jpg', 'Terima kasih mas', '2022-06-30', NULL, 'Sama-sama bu', 5),
(29, '2022-02-24', '09:45:12', 24, 78993, 10, 60000, 'Selesai', 'JNE/J&T', 'Ditolak', 'bukti1.jpg', 'Bagus dan cepat sampai', '2022-06-30', '01:16:07', 'Sama-sama bu', 4),
(30, '2022-03-25', '09:45:12', 18, 78993, 15, 100000, 'Disiapkan', 'JNE/J&T', 'Ditolak', 'bukti1.jpg', 'Terima kasih mas', '2022-06-30', '06:16:23', 'Sama-sama bu', 5),
(35, '2022-07-04', '00:36:09', 34, 78993, 10, 34000, 'Disiapkan', NULL, 'Dikonfirmasi', '-', NULL, NULL, NULL, NULL, NULL),
(44, '2022-07-10', '15:31:33', 34, 9875647382918574, 3, 33000, 'Direfund', 'Mitra', 'Pending', '1657467093.jpg', 's', '2022-07-16', '15:22:09', NULL, NULL),
(45, '2022-07-10', '16:01:10', 24, 78993, 1, 60000, 'Direfund', 'Mitra', 'Pending', '1657468870.jpg', NULL, NULL, NULL, NULL, NULL),
(46, '2022-07-15', '12:53:26', 34, 9875647382918574, 1, 11000, 'Direfund', 'JNE/J&T', 'Pending', '1657889606.png', 'xcs', '2022-07-16', '15:29:35', NULL, NULL),
(47, '2022-07-16', '13:32:00', 34, 78993, 4, 44000, 'Belum Disiapkan', 'JNE/J&T', NULL, '1657978320.jpg', NULL, NULL, NULL, NULL, NULL),
(48, '2022-07-16', '13:32:38', 34, 78993, 4, 44000, 'Belum Disiapkan', 'JNE/J&T', NULL, '1657978358.jpg', NULL, NULL, NULL, NULL, NULL),
(49, '2022-07-16', '13:34:42', 34, 78993, 20, 220000, 'Disiapkan', 'JNE/J&T', 'Dikonfirmasi', '1657978482.jpg', NULL, NULL, NULL, NULL, NULL),
(50, '2022-07-16', '13:38:55', 34, 78993, 20, 220000, 'Disiapkan', 'Mitra', 'Dikonfirmasi', '1657978735.jpg', NULL, NULL, NULL, NULL, NULL),
(51, '2022-07-16', '14:50:05', 34, 78993, 20, 220000, 'Selesai', 'JNE/J&T', 'Dikonfirmasi', '1657983005.jpg', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id_rumputlaut` int(100) NOT NULL,
  `jenis_rumputlaut` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_rumputlaut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_rumputlaut` int(100) NOT NULL,
  `lokasi_rumputlaut` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasitahan_rumputlaut` int(100) NOT NULL,
  `stok_rumputlaut` int(100) NOT NULL,
  `gambar_rumputlaut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noktp_pembudidaya` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id_rumputlaut`, `jenis_rumputlaut`, `deskripsi_rumputlaut`, `harga_rumputlaut`, `lokasi_rumputlaut`, `durasitahan_rumputlaut`, `stok_rumputlaut`, `gambar_rumputlaut`, `noktp_pembudidaya`) VALUES
(18, 'Euchema cottonii', 'spesies dari Rhodophyta (rumput laut merah)', 100000, 'Bantaeng', 110, 9997, '1657795853.jpg', 737109),
(24, 'Euchema spinosum', 'spesies dari Rhodophyta (rumput laut merah)', 60000, 'Bantaeng', 20, 2996, '1656490520.jpg', 737109),
(34, 'Ganggang Merah', 'aaaaaaaaaaaaa', 11000, 'Bantaeng', 12, 5, '1656956491.png', 737109);

-- --------------------------------------------------------

--
-- Table structure for table `sarans`
--

CREATE TABLE `sarans` (
  `id_saran` int(100) NOT NULL,
  `isi_saran` varchar(255) NOT NULL,
  `noktp_pelanggan` bigint(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sarans`
--

INSERT INTO `sarans` (`id_saran`, `isi_saran`, `noktp_pelanggan`, `updated_at`, `created_at`) VALUES
(1, 'Tingkatkan lagi untuk pengamanannya', 78993, '', ''),
(2, 'Mohon tingkatkan produk yang dijual', 123456, '', ''),
(3, 'Tolong sediakan fitur untuk kurir', 123456, '2022-06-30 01:33:03', '2022-06-30 01:33:03'),
(4, 'Mohon disediakan bentuk android', 78993, '2022-07-10 23:05:30', '2022-07-10 23:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bikeViQnU8yMRZgPSgNUboSrZkDnJHhmckr8OwDH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZWJ2dE9rOWtrZkwxTmxWY1dxZ0t2d0R0eWk3eHRsUFB6UXoxRWxnVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1658038372),
('nkDOYVtvNvVU3gyWELG44FE2lTO6lxCcWQKyVNFb', 13, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYnlNMGhsaVU4bVNWVzhveVZqUTZ2c0w2cEVnY3dIdjk4YUp2OUNRdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaG93cmVmLzUxIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRYZktDbDRCUDcxR3BhYXZxcVl1SjkuNGouZ3k1RXg3bG5rUWtZTFBKRzBseDM1dXpBLlJvYSI7fQ==', 1657989486),
('SzVE45uuTWkgJPiJMpHsbtsdxKkCC2cGTSdazJ7V', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZmpBZXBnMUcxNHlSSTgxYU5nYlpzOVNwa0xyc3FHZ3NzZGVlZG1KdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZXNhbmFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCR6MTVUaXJONnBQaVFNZWpsMUs4Wjh1LzI4bVBmN1hHdUtWMnZDay9zeE5VYnlkaDNmODhNNiI7fQ==', 1658039114);

-- --------------------------------------------------------

--
-- Table structure for table `sukas`
--

CREATE TABLE `sukas` (
  `id_suka` bigint(100) NOT NULL,
  `noktp_pelanggan` bigint(100) NOT NULL,
  `id_artikel` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sukas`
--

INSERT INTO `sukas` (`id_suka`, `noktp_pelanggan`, `id_artikel`) VALUES
(23, 78993, 29);

-- --------------------------------------------------------

--
-- Table structure for table `tidaksukas`
--

CREATE TABLE `tidaksukas` (
  `id_tidaksuka` bigint(100) NOT NULL,
  `noktp_pelanggan` bigint(100) NOT NULL,
  `id_artikel` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tidaksukas`
--

INSERT INTO `tidaksukas` (`id_tidaksuka`, `noktp_pelanggan`, `id_artikel`) VALUES
(3, 78993, 29);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(100) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `role`, `usertype`, `password`, `no_ktp`) VALUES
(12, 'talitharizki26@gmail.com', 'Pembudidaya', '1', '$2y$10$z15TirN6pPiQMejl1K8Z8u/28mPf7XGuKV2vCk/sxNUbydh3f88M6', 737109),
(13, 'ferajulianti19@gmail.com', 'Pelanggan', '0', '$2y$10$XfKCl4BP71GpaavqqYuJ9.4j.gy5Ex7lnkQkYLPJG0lx35uzA.Roa', 78993),
(14, 'julianti@gmail.com', 'Pelanggan', '0', '$2y$10$M1mqbXrId3nfedNINDSTZe9.4sFskSnFfao4Zrf1WRrrc.oFxOPri', 123456),
(42, 'talitharizki23@gmail.com', 'Pembudidaya', '1', '$2y$10$u/PkVa9d3hXH6j9SLpJtMeUEHDoclWFzgVTMFJ8WHqYMWGe99G0qe', 3333333333333333),
(43, 'talitharizki5@gmail.com', 'Pembudidaya', '1', '$2y$10$RWwBVZe9cBQvNpOJ0mY69e9ubPD9hAk.XUX7VJ4rIqAOBzKj9JNgG', 5555555555555555),
(44, 'talitharizki99@gmail.com', 'Pembudidaya', '1', '$2y$10$IrFIBW2pR3FBp/Px7pSrq.KkkakA.boNFOFw4lwKqh95XVoM3t5sG', 9999999999999999),
(45, 'admin@admin', 'Pembudidaya', '1', '$2y$10$bK7.D.2iMD9wCJt8eOA1qe5OCfd/Ohvsoer6OaRoyUjstafE68JE.', 8888888888888888),
(46, 'admin@admin1', 'Pembudidaya', '1', '$2y$10$7QVegdueUzwAfxqO2X08leQwDGssiMx02QLH2GLJexmHoW.sHTona', 7777777777777777),
(47, 'a@a', 'Pembudidaya', '1', '$2y$10$jgh4smo9W4PYZcuhYBezp.f1kfY.UuSPckPpvWuHQV5WlZQUnoDRS', 6666666666666666),
(48, 'a@a2', 'Pembudidaya', '1', '$2y$10$A3H6xfpu7fCT5yKe4AOiSOoQMRnl7qr5Jrp8cjcDDc38IcxHxaRoe', 4444444444444444),
(49, 'fera@gmail.com', 'Pelanggan', '0', '$2y$10$ShfwZJUlM7H1ExVeQxNpS./GKjmXmEhml72ucAlCCQ5ilA.1RUht6', 1234567890123456),
(50, 'pelanggan2@gmail.com', 'Pelanggan', '0', '$2y$10$T/wrMHJvqDXAfG8Z1eN6Uua4uJFXKjdOsRxylWVFCzpQX/XptEzpC', 9875647382918574);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `no_ktp` (`no_ktp`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`noktp_pelanggan`);

--
-- Indexes for table `pembudidayas`
--
ALTER TABLE `pembudidayas`
  ADD PRIMARY KEY (`noktp_pembudidaya`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `noktp_pelanggan` (`noktp_pelanggan`),
  ADD KEY `id_rumputlaut` (`id_rumputlaut`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id_rumputlaut`),
  ADD KEY `produks_no_ktp_index` (`noktp_pembudidaya`);

--
-- Indexes for table `sarans`
--
ALTER TABLE `sarans`
  ADD PRIMARY KEY (`id_saran`),
  ADD KEY `noktp_pelanggan` (`noktp_pelanggan`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sukas`
--
ALTER TABLE `sukas`
  ADD PRIMARY KEY (`id_suka`),
  ADD KEY `id_artikel` (`id_artikel`),
  ADD KEY `noktp_pelanggan` (`noktp_pelanggan`);

--
-- Indexes for table `tidaksukas`
--
ALTER TABLE `tidaksukas`
  ADD PRIMARY KEY (`id_tidaksuka`),
  ADD KEY `noktp_pelanggan` (`noktp_pelanggan`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id_artikel` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `noktp_pelanggan` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9875647382918575;

--
-- AUTO_INCREMENT for table `pembudidayas`
--
ALTER TABLE `pembudidayas`
  MODIFY `noktp_pembudidaya` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000000000000000;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id_pesanan` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id_rumputlaut` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sarans`
--
ALTER TABLE `sarans`
  MODIFY `id_saran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sukas`
--
ALTER TABLE `sukas`
  MODIFY `id_suka` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tidaksukas`
--
ALTER TABLE `tidaksukas`
  MODIFY `id_tidaksuka` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_ibfk_2` FOREIGN KEY (`id_rumputlaut`) REFERENCES `produks` (`id_rumputlaut`),
  ADD CONSTRAINT `pesanans_ibfk_3` FOREIGN KEY (`noktp_pelanggan`) REFERENCES `pelanggans` (`noktp_pelanggan`);

--
-- Constraints for table `sarans`
--
ALTER TABLE `sarans`
  ADD CONSTRAINT `sarans_ibfk_1` FOREIGN KEY (`noktp_pelanggan`) REFERENCES `pelanggans` (`noktp_pelanggan`);

--
-- Constraints for table `sukas`
--
ALTER TABLE `sukas`
  ADD CONSTRAINT `sukas_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikels` (`id_artikel`),
  ADD CONSTRAINT `sukas_ibfk_2` FOREIGN KEY (`noktp_pelanggan`) REFERENCES `pelanggans` (`noktp_pelanggan`);

--
-- Constraints for table `tidaksukas`
--
ALTER TABLE `tidaksukas`
  ADD CONSTRAINT `tidaksukas_ibfk_1` FOREIGN KEY (`noktp_pelanggan`) REFERENCES `pelanggans` (`noktp_pelanggan`),
  ADD CONSTRAINT `tidaksukas_ibfk_2` FOREIGN KEY (`id_artikel`) REFERENCES `artikels` (`id_artikel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
