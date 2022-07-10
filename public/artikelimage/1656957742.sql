-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 04 Jul 2022 pada 13.07
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

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
-- Struktur dari tabel `artikels`
--

CREATE TABLE `artikels` (
  `id_artikel` int(100) UNSIGNED NOT NULL,
  `judul_artikel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_artikel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_artikel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglupload_artikel` date NOT NULL,
  `gambar_artikel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` int(100) UNSIGNED NOT NULL,
  `user_id` int(100) NOT NULL,
  `id_rumputlaut` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggans`
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
-- Dumping data untuk tabel `pelanggans`
--

INSERT INTO `pelanggans` (`noktp_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `nohp_pelanggan`, `jenkel_pelanggan`, `foto_pelanggan`, `tgllahir_pelanggan`, `updated_at`, `created_at`) VALUES
(1, '1', '1', 1, 'Perempuan', '1656832444.jpg', '2022-07-03', '2022-07-03 14:14:04', '2022-07-03 14:14:04'),
(2, '2', '2', 2, 'Perempuan', '1656831989.jpg', '2022-07-03', '2022-07-03 14:06:29', '2022-07-03 14:06:29'),
(3, '3', '3', 3, 'Perempuan', '1656832132.jpg', '2022-07-03', '2022-07-03 14:08:52', '2022-07-03 14:08:52'),
(11, 'a', 'a', 213, 'Perempuan', '1656830969.jpg', '2022-08-04', '2022-07-03 13:49:29', '2022-07-03 13:49:29'),
(16, '16', '16', 16, 'Perempuan', '1656832699.jpg', '2022-07-03', '2022-07-03 14:18:19', '2022-07-03 14:18:19'),
(17, '17', '17', 17, 'Perempuan', '1656832978.jpg', '2022-07-03', '2022-07-03 14:22:58', '2022-07-03 14:22:58'),
(18, '18', '18', 18, 'Perempuan', '1656833184.jpg', '2022-07-03', '2022-07-03 14:26:24', '2022-07-03 14:26:24'),
(12331, '123a', '13', 1, 'Perempuan', '1656792597.jpg', '2022-07-14', '2022-07-03 03:09:57', '2022-07-03 03:09:57'),
(78993, 'Fera', 'Lampung', 82187, 'Perempuan', '1656748357.jpg', '2022-06-15', '2022-07-02 14:54:37', '2022-06-29 16:36:21'),
(123311, '123a', '13', 1, 'Perempuan', '1656792655.jpg', '2022-07-14', '2022-07-03 03:10:55', '2022-07-03 03:10:55'),
(123456, 'Julianti', 'Lampung Selatan', 81245, 'Perempuan', '1656496301.jpeg', '2022-06-22', '2022-06-29 16:51:41', '2022-06-29 16:51:41'),
(1233111, '123a', '13', 1, 'Perempuan', '1656792820.jpg', '2022-07-14', '2022-07-03 03:13:40', '2022-07-03 03:13:40'),
(1111111111111111, '123', 'bandung', 1111111, 'Perempuan', '1656931719.jpg', '2022-07-04', '2022-07-04 17:48:39', '2022-07-04 17:48:39'),
(5555555555555555, '55', '555', 555555555, 'Perempuan', '1656931821.jpg', '2022-07-04', '2022-07-04 17:50:21', '2022-07-04 17:50:21'),
(6666666666666666, '666', '666', 6666666666, 'Perempuan', '1656931883.jpg', '2022-07-04', '2022-07-04 17:51:23', '2022-07-04 17:51:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembudidayas`
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
-- Dumping data untuk tabel `pembudidayas`
--

INSERT INTO `pembudidayas` (`noktp_pembudidaya`, `nama_pembudidaya`, `nohp_pembudidaya`, `alamat_pembudidaya`, `tgllahir_pembudidaya`, `foto_pembudidaya`, `jenkel_pembudidaya`, `updated_at`, `created_at`) VALUES
(1, '15', 15, '15', '2022-07-03', '1656832591.jpg', 'Laki-laki', '2022-07-03 14:16:31', '2022-07-03 14:16:31'),
(2, '2', 2, '2', '2022-07-03', '1656832058.jpg', 'Perempuan', '2022-07-03 14:07:38', '2022-07-03 14:07:38'),
(3, '3', 3, '3', '2022-07-03', '1656832150.jpg', 'Perempuan', '2022-07-03 14:09:10', '2022-07-03 14:09:10'),
(4, '4', 4, '4', '2022-07-03', '1656832236.jpg', 'Perempuan', '2022-07-03 14:10:36', '2022-07-03 14:10:36'),
(5, '3', 3, '3', '2022-07-03', '1656832185.jpg', 'Perempuan', '2022-07-03 14:09:45', '2022-07-03 14:09:45'),
(6, 'sa', 851235, 'a', '2022-07-28', 's', 's', '', ''),
(7, 'ok', 3, '3', '2022-07-03', '1656792553.jpg', 'Perempuan', '2022-07-03 03:09:13', '2022-07-03 03:09:13'),
(8, 'Talitha', 89695, 'Bantaeng', '2001-06-26', '1656517551.jpeg', 'Perempuan', '2022-07-01 16:17:32', '2022-06-29 12:33:27'),
(9878987654323131, 'egans', 8978987654, 'salmanhani', '2022-07-04', '1656930219.jpg', 'Perempuan', '2022-07-04 17:23:39', '2022-07-04 17:23:39'),
(9878987654323132, 'egans', 8978987654, 'salmanhani', '2022-07-04', '1656930170.jpg', 'Perempuan', '2022-07-04 17:22:50', '2022-07-04 17:22:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `pesanans`
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
  `balasan_testimoni` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bintang_testimoni` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id_pesanan`, `tgl_pesanan`, `waktu_pesanan`, `id_rumputlaut`, `noktp_pelanggan`, `jumlah_pesanan`, `total_pesanan`, `status_pesanan`, `ekspedisi_pesanan`, `konfirmasi_pesanan`, `bukti_pembayaran`, `isi_testimoni`, `tgl_testimoni`, `balasan_testimoni`, `bintang_testimoni`) VALUES
(28, '2022-01-29', '09:45:12', 18, 78993, 4, 100000, 'Selesai', 'JNE/J&T', 'Dikonfirmasi', 'bukti1.jpg', 'Terima kasih mas, bagus dan cepat sampai', '2022-06-30', 'Sama-sama bu', 5),
(29, '2022-02-24', '09:45:12', 24, 78993, 10, 60000, 'Selesai', 'JNE/J&T', 'Dikonfirmasi', 'bukti1.jpg', 'Terima kasih mas, bagus dan cepat sampai', '2022-06-30', 'Sama-sama bu', 4),
(30, '2022-03-25', '09:45:12', 18, 78993, 15, 100000, 'Selesai', 'JNE/J&T', 'Dikonfirmasi', 'bukti1.jpg', 'Terima kasih mas, bagus dan cepat sampai\n', '2022-06-30', 'Sama-sama bu', 5),
(31, '2022-04-29', '09:45:12', 17, 78993, 7, 100000, 'Selesai', 'JNE/J&T', 'Dikonfirmasi', 'bukti1.jpg', 'Terima kasih mas, bagus dan cepat sampai\n', '2022-06-30', 'Sama-sama bu', 4),
(32, '2022-05-29', '09:55:03', 18, 123456, 25, 300000, NULL, 'Mitra', 'Ditolak', 'bukti2.jpg', NULL, NULL, NULL, NULL),
(33, '2022-06-29', '10:36:53', 24, 78993, 18, 180000, 'Diantar', 'JNE/J&T', 'Dikonfirmasi', 'bukti1.jpg', NULL, NULL, NULL, NULL),
(41, '2022-07-02', '10:36:03', 17, 78993, 2, 20000, NULL, 'JNE/J&T', NULL, '1656758163.jpg', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
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
  `noktp_pembudidaya` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id_rumputlaut`, `jenis_rumputlaut`, `deskripsi_rumputlaut`, `harga_rumputlaut`, `lokasi_rumputlaut`, `durasitahan_rumputlaut`, `stok_rumputlaut`, `gambar_rumputlaut`, `noktp_pembudidaya`) VALUES
(17, 'Ganggang Merah', 'Alga merah atau Rhodophyta adalah salah satu filum dari alga berdasarkan zat warna atau pigmentasinya. Warna merah pada alga ini disebabkan oleh pigmen fikoeritrin dalam jumlah banyak dibandingkan pigmen klorofil, karoten, dan xantofil.', 10000, 'Bantaeng', 10, 499990, '1656484704.jpg', 737109),
(18, 'Euchema cottonii', 'Rumput laut jenis Eucheuma cottonii merupakan salah satu jenis rumput laut penghasil karaginan. Karaginan sangat penting peranannya sebagai stabilisator (pengatur keseimbangan)', 100000, 'Bantaeng', 110, 9997, '1656487892.jpg', 737109),
(24, 'Euchema spinosum', 'Eucheuma spinosum merupakan rumput laut telah dibudidayakan di Indonesia. Rumput laut dimanfaatkan sebagai bahan baku pembuatan tepung agar-agar, keraginan dan alginat.', 60000, 'Bantaeng', 20, 2996, '1656490520.jpg', 737109);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sarans`
--

CREATE TABLE `sarans` (
  `id_saran` int(100) NOT NULL,
  `isi_saran` varchar(255) NOT NULL,
  `noktp_pelanggan` bigint(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sarans`
--

INSERT INTO `sarans` (`id_saran`, `isi_saran`, `noktp_pelanggan`, `updated_at`, `created_at`) VALUES
(1, 'Tingkatkan lagi untuk pengamanannya', 78993, '', ''),
(2, 'Mohon tingkatkan produk yang dijual', 123456, '', ''),
(3, 'Tolong sediakan fitur untuk kurir', 123456, '2022-06-30 01:33:03', '2022-06-30 01:33:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('12Z6okR4d1AuiCV6LUqPeC4uSzHl7JiPbdJbq3F0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYjNyRGNsNkMxZWVBaklqV1htODZJRE1qQzV3YkxETzJqeWpOUk9TZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1656930003),
('eP1z2bFrYOXkj04HI98sDttUPil01xM1EMjfrn12', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieGVMSWdzaUduVGQzbzRGN1hLeEhXTTJvOGNZcnh1dUlxdWpjMk9seSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWRpcmVjdHMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHoxNVRpck42cFBpUU1lamwxSzhaOHUvMjhtUGY3WEd1S1YydkNrL3N4TlVieWRoM2Y4OE02Ijt9', 1656931926);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `email`, `role`, `usertype`, `password`, `no_ktp`) VALUES
(12, 'talitharizki26@gmail.com', 'Pembudidaya', '1', '$2y$10$z15TirN6pPiQMejl1K8Z8u/28mPf7XGuKV2vCk/sxNUbydh3f88M6', 737109),
(13, 'ferajulianti19@gmail.com', 'Pelanggan', '0', '$2y$10$XfKCl4BP71GpaavqqYuJ9.4j.gy5Ex7lnkQkYLPJG0lx35uzA.Roa', 78993),
(14, 'julianti@gmail.com', 'Pelanggan', '0', '$2y$10$M1mqbXrId3nfedNINDSTZe9.4sFskSnFfao4Zrf1WRrrc.oFxOPri', 123456),
(33, '1@1', 'Pelanggan', '0', '$2y$10$se.mNoyOptbtz0TUYd2s7eedBJgOO4qvRPu1pSC9/L0gZ5.UjaB7K', 1),
(34, '15@15', 'Pembudidaya', '1', '$2y$10$cLYPb92uzZF9Iig17VxHZO9yPcx/HxzQDcFhjXm2yrtDcPCYcYzJC', 15),
(35, '16@16', 'Pelanggan', '0', '$2y$10$dECxLFw/40zDjbLfovZim.OBUQFnRd2Bnn5SFkzLIikRPTsMht3CC', 16),
(36, '17@17', 'Pelanggan', '0', '$2y$10$6CMYAz8XJUCz3RhvZAcMd.uYF/c8oQg8v9.PUwTIRdrrrbZlCKPk2', 17),
(37, 'AAaa@AAaa', 'Pelanggan', '0', '$2y$10$xCNA0N0QDwCfVBa0BdMn/uwStXCuc3eZpdKjOUxsagkz3yPUVzk.a', 18),
(38, 'sal@sal', 'Pembudidaya', '1', '$2y$10$JUi3s3jM8KXT80fWMe9W8uHYM7qJFNrQUiuilvOFdFm6YNeaRKtsy', 9878987654323131),
(39, '1@1', 'Pelanggan', '0', '$2y$10$Z.fQxOUAlOZ3drM57NFeHeI8Ro2/f0vxUbLxDjVcglKdYqX0Nj3Ri', 1111111111111111),
(40, '51@51', 'Pelanggan', '0', '$2y$10$3orwfcHkrwz1HBgEMb9rq.a16rU8ArXona8jtePEF5sFrhjaaPuni', 5555555555555555),
(41, '61@61', 'Pelanggan', '0', '$2y$10$8eAip4kvDpN26dRmWNOvR.kDDecldibo06hHYXfFIiYBBIBNdCEsu', 6666666666666666);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `no_ktp` (`no_ktp`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`noktp_pelanggan`);

--
-- Indeks untuk tabel `pembudidayas`
--
ALTER TABLE `pembudidayas`
  ADD PRIMARY KEY (`noktp_pembudidaya`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `noktp_pelanggan` (`noktp_pelanggan`),
  ADD KEY `id_rumputlaut` (`id_rumputlaut`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id_rumputlaut`),
  ADD KEY `produks_no_ktp_index` (`noktp_pembudidaya`);

--
-- Indeks untuk tabel `sarans`
--
ALTER TABLE `sarans`
  ADD PRIMARY KEY (`id_saran`),
  ADD KEY `noktp_pelanggan` (`noktp_pelanggan`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id_artikel` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `noktp_pelanggan` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6666666666666667;

--
-- AUTO_INCREMENT untuk tabel `pembudidayas`
--
ALTER TABLE `pembudidayas`
  MODIFY `noktp_pembudidaya` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9878987654323133;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id_pesanan` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id_rumputlaut` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `sarans`
--
ALTER TABLE `sarans`
  MODIFY `id_saran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_ibfk_2` FOREIGN KEY (`id_rumputlaut`) REFERENCES `produks` (`id_rumputlaut`),
  ADD CONSTRAINT `pesanans_ibfk_3` FOREIGN KEY (`noktp_pelanggan`) REFERENCES `pelanggans` (`noktp_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `sarans`
--
ALTER TABLE `sarans`
  ADD CONSTRAINT `sarans_ibfk_1` FOREIGN KEY (`noktp_pelanggan`) REFERENCES `pelanggans` (`noktp_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
