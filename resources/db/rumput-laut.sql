-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 06:28 PM
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
  `no_ktp` bigint(100) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikels`
--

INSERT INTO `artikels` (`id_artikel`, `judul_artikel`, `isi_artikel`, `sumber_artikel`, `tglupload_artikel`, `gambar_artikel`, `no_ktp`, `status`) VALUES
(29, 'Potensi Rumput Laut Indonesia Raya', 'aaaaaaaaa', 'Kementrian P&K', '2022-07-05', '1656957812.png', 3333333333333333, 'final'),
(30, 'Pentingnya panen rumput laut sebelum 45 hari', 'aaaaaaaaaaaqq', 'qqqqqqq', '2022-07-05', '1656958455.png', 3333333333333333, ''),
(32, 'Potensi Rumput Laut Indonesia', '->where(\'sumber_artikel\', \'Like\', \'%\' . $search_artikel . \'%\')\r\n      ->where(\'sumber_artikel\', \'Like\', \'%\' . $search_artikel . \'%\')\r\n      ->where(\'sumber_artikel\', \'Like\', \'%\' . $search_artikel . \'%\')\r\n      ->where(\'sumber_artikel\', \'Like\', \'%\' . $search_artikel . \'%\')\r\n      ->where(\'sumber_artikel\', \'Like\', \'%\' . $search_artikel . \'%\')\r\n      ->where(\'sumber_artikel\', \'Like\', \'%\' . $search_artikel . \'%\')', 'Google Gambar', '2022-07-10', '1657439501.jpg', 737109, 'final'),
(34, 'aaaaaa', 'aaaaa', 'Google Gambar', '2022-07-04', '1657445688.jpg', 737109, 'final'),
(35, 'Potensi Rumput Laut Indonesia', 'zzzzzzzzzzzzzzz', 'Kementrian PK', '2022-07-04', '1657446437.jpg', 737109, 'final'),
(37, 'Pentingnya panen rumput laut sebelum 45 hari', 'zzzzzzzzzzzzzzz', 'Google', '2022-07-10', '1657447212.jpg', 737109, 'final'),
(38, 'Potensi Rumput Laut Indonesia', 'input type=”number” adalah bidang untuk memasukan angka.  input number akan memvalidasi dan menolak masukan selain angka.  pada saat inputan focus atau hover menggunakan mouse akan tampil panah untuk menambah angka atau menurunkan angkanya.', 'Google', '2022-07-10', '1657447391.jpg', 737109, 'final'),
(39, 'coba', 'cobacaaaaaaaaaaaa\'', 'cobaa', '2022-07-16', '1657952756.png', 737109, 'final'),
(40, 'seaweed', 'biasa', 'riri', '2022-07-20', '1658326093.jpeg', 1234567890123445, 'preview'),
(41, 'njnjn', 'nnjnjnjnn', 'yaaaa', '2022-07-20', '1658326491.jpeg', 737109, 'preview');

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
(1111111111111111, 'asdd', 'asd', 123321123, 'Perempuan', '1658411636.png', '2001-06-05', '2022-07-21 20:53:56', '2022-07-21 20:53:56'),
(1234567890123450, 'riri', 'btg', 123456789101, 'Perempuan', '1658325811.jpeg', '2000-12-31', '2022-07-20 21:03:31', '2022-07-20 21:03:31'),
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
(1122334455667788, 'Talitha', 8123456789, 'bandung', '2001-06-26', '1658411089.png', 'Perempuan', '2022-07-21 20:44:49', '2022-07-21 20:44:49'),
(1234123412341234, 'Talitha', 89765432123, 'bandung', '2001-06-26', '1658420181.png', 'Perempuan', '2022-07-21 23:16:21', '2022-07-21 23:16:21'),
(1234567812345678, 'aaaaaaaaa', 897654321, 'bdg', '2002-06-04', '1658413479.png', 'Laki-laki', '2022-07-21 21:24:39', '2022-07-21 21:24:39'),
(1234567890123444, 'riri', 12345678, 'bantaehg', '2000-12-31', '1658325459.jpeg', 'Perempuan', '2022-07-20 20:57:39', '2022-07-20 20:57:39'),
(1234567890123445, 'riri', 123456789101, 'btg', '2000-12-31', '1658325629.jpeg', 'Perempuan', '2022-07-20 21:00:29', '2022-07-20 21:00:29'),
(3333333333333333, 'Aku', 812345678, 'Bantaeng', '2022-06-27', '1656955943.png', 'Perempuan', '2022-07-05 00:32:23', '2022-07-05 00:32:23'),
(4321432143214321, 'Talitha', 89765432123, 'bandung', '2001-06-26', '1658420522.png', 'Perempuan', '2022-07-21 23:22:02', '2022-07-21 23:22:02'),
(4444444444444444, 'Talithaaa', 12345, 'bdg', '2004-01-01', '1657375950.jpg', 'Laki-laki', '2022-07-09 21:12:31', '2022-07-09 21:12:31'),
(5555555555555555, 'Talitha', 8912345678, 'Bantaeng', '2001-06-26', '1657002614.jpg', 'Perempuan', '2022-07-05 13:30:14', '2022-07-05 13:30:14'),
(6666666666666666, 'Talitha', 2111, 'bdg', '2001-06-26', '1657375599.jpg', 'Perempuan', '2022-07-09 21:06:39', '2022-07-09 21:06:39'),
(7777777777777777, 'talitha rizki 777', 111111111111, 'bdg', '2022-06-27', '1657373516.jpg', 'Perempuan', '2022-07-09 20:31:56', '2022-07-09 20:31:56'),
(8765432187654321, 'aaaaaaaaa', 897654321, 'bdg', '2002-06-04', '1658413829.png', 'Laki-laki', '2022-07-21 21:30:29', '2022-07-21 21:30:29'),
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
  `alasan_ditolak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi_testimoni` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_testimoni` date DEFAULT NULL,
  `waktu_testimoni` time DEFAULT NULL,
  `balasan_testimoni` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bintang_testimoni` int(100) DEFAULT NULL,
  `alasan_refund` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_tolakrefund` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id_pesanan`, `tgl_pesanan`, `waktu_pesanan`, `id_rumputlaut`, `noktp_pelanggan`, `jumlah_pesanan`, `total_pesanan`, `status_pesanan`, `ekspedisi_pesanan`, `konfirmasi_pesanan`, `bukti_pembayaran`, `alasan_ditolak`, `isi_testimoni`, `tgl_testimoni`, `waktu_testimoni`, `balasan_testimoni`, `bintang_testimoni`, `alasan_refund`, `alasan_tolakrefund`) VALUES
(50, '2022-07-16', '13:38:55', 34, 78993, 20, 220000, 'Direfund', 'Mitra', 'Belum Dikonfirmasi', '1657978735.jpg', NULL, 'jeleeeeeeeeeeek', '2022-07-21', '13:14:07', NULL, NULL, 'Pesanan Tidak Sesuai', NULL),
(52, '2022-07-21', '08:00:39', 24, 78993, 20, 1200000, 'Belum Disiapkan', 'JNE/J&T', NULL, '1658390439.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '2022-07-21', '08:02:24', 18, 78993, 2, 200000, 'Belum Disiapkan', 'Mitra', NULL, '1658390544.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(34, 'Ganggang Merah', 'aaaaaaaaaaaaa', 11000, 'Bantaeng', 12, 1, '1656956491.png', 737109),
(43, 'seaweed', 'ada', 10000, 'btg', 31, 3, '1658326137.jpeg', 1234567890123445),
(45, 'zzzzzzzzzzzzzzzzzzz', 'zzzzzzzzzzzzzzzzzzz', 60000, 'Makassar', 11, 0, '1658372270.png', 737109);

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
('Ce1h7J5repgiKn9n8eMTa1ZJTxMiDCsyBAtLTMQc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicDBNeWk1T05BTWlzQkFXeGJ2RFpwVERVbjR6ZGhpdks3OWdaYUJoVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtOO30=', 1658420522),
('DEN0W3Lg0bFdvgnhmhOQr2nY3cilftnBiHAuHK5Y', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSld1Tk5ib1ZQQVBoWVl0aG9lcWF2a21INkg4UEVKdTJadkdkZEljRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1658410054),
('YDp6xIbEAkRi3fGRiuVqEwQkhhsIspBiW80CtLAn', 13, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMWwwejdBZHJBdHM0UWowM2xmODk2NlFReTNISWlHY0ljZmo4RGFRQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaG93Y2FydC83ODk5MyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEzO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkWGZLQ2w0QlA3MUdwYWF2cXFZdUo5LjRqLmd5NUV4N2xua1FrWUxQSkcwbHgzNXV6QS5Sb2EiO30=', 1658391057);

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
(50, 'pelanggan2@gmail.com', 'Pelanggan', '0', '$2y$10$T/wrMHJvqDXAfG8Z1eN6Uua4uJFXKjdOsRxylWVFCzpQX/XptEzpC', 9875647382918574),
(51, 'riri@gmail.com', 'Pembudidaya', '1', '$2y$10$3sgToP1iBYB2ASfDq3kLEeGGll99Md.DnftpJXPiz3neTNBIkodqe', 1234567890123444),
(52, 'riri1@gmail.com', 'Pembudidaya', '1', '$2y$10$FmFwMAu.RkpOU.rSvHNCoeqQtZ2NqwyXtFLaoI3G4mJaR..0w6Gvu', 1234567890123445),
(53, 'riri19@gmail.com', 'Pelanggan', '0', '$2y$10$yYUcWS2yUczQ.HcGjx/7puZIbTD4ph2xYlc5rNaX8Xg1ZHvGGHziK', 1234567890123450),
(54, 'a@gmail.com', 'Pembudidaya', '1', '$2y$10$sx7Z/71FCB7k6HvcYvLn0OeEqFHoCnTMTOGXuFyq.ghz3xmX6FKES', 1122334455667788),
(55, 'ca@ca', 'Pelanggan', '0', '$2y$10$VHBP9HNaQYb4PDO8SdbwLOlyptsko58W34Ryj.4A8Xvz3ElO42Aja', 1111111111111111),
(56, 'a@aaaaa', 'Pembudidaya', '1', '$2y$10$5kNdEaL0bJ1nDlG/otWFIuIgQpzHqNxQWUhN/3EsptdkjCQ3HY6XK', 1234567812345678),
(57, 'a@aaaaaa', 'Pembudidaya', '1', '$2y$10$H2z/GsiLkvBGXs8ZcMVGIubKEcmJkThrzDm7n1zFr9XPsOD9XvJp.', 8765432187654321),
(58, 'aaa@gmail.com', 'Pembudidaya', '1', '$2y$10$N/vgcOWhrLE5cMMyS4qd8eaEi5Y7ltuF1S/HnJHVbl.MaxXELw7zm', 1234123412341234),
(59, 'aaaaa@gmail.com', 'Pembudidaya', '1', '$2y$10$lVWYGYe2W7of70t0YTdrKuYv.9j5vGeAntjkg/lqU1fH0QzdbO4Tm', 4321432143214321);

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
  MODIFY `id_artikel` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
  MODIFY `id_pesanan` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id_rumputlaut` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikels`
--
ALTER TABLE `artikels`
  ADD CONSTRAINT `artikels_ibfk_1` FOREIGN KEY (`no_ktp`) REFERENCES `pembudidayas` (`noktp_pembudidaya`);

--
-- Constraints for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_ibfk_2` FOREIGN KEY (`id_rumputlaut`) REFERENCES `produks` (`id_rumputlaut`),
  ADD CONSTRAINT `pesanans_ibfk_3` FOREIGN KEY (`noktp_pelanggan`) REFERENCES `pelanggans` (`noktp_pelanggan`);

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_ibfk_1` FOREIGN KEY (`noktp_pembudidaya`) REFERENCES `pembudidayas` (`noktp_pembudidaya`);

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
