-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Jul 2023 pada 16.22
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_transporter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(200) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `stok_barang` int(11) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `deskripsi`, `stok_barang`, `harga_barang`, `created_at`, `updated_at`) VALUES
(3, 'B001', 'Helm NJS Kairoz', 'Helm Half Faces', 245, 460000, '2023-05-15 14:27:29', '2023-07-10 14:00:00'),
(4, 'B003', 'Vans Oldschool - Black', 'Sepatu Sneaker Pria', 80, 570000, '2023-05-17 05:27:45', '2023-07-10 14:00:48'),
(5, 'B005', 'Keyboard Vortex V4', 'Keyboard Gaming Mechacnical Red Switch', 280, 780000, '2023-05-17 13:48:29', '2023-07-10 14:09:39'),
(6, 'B002', 'Sendal Eiger', 'Sendal Gunung Unisex', 280, 45000, '2023-05-17 05:27:45', '2023-07-10 13:59:45'),
(7, 'B004', 'Keyboard Fantect Gaming - White', 'Keyboard gaming mechanical', 197, 250000, '2023-05-17 13:48:29', '2023-07-10 14:03:05'),
(11, 'B006', 'Mouse Fantech VX7 - White', 'Mouse gaming merk fantech dengan RBG led adjustable', 96, 145000, '2023-07-10 10:21:17', '2023-07-10 14:09:47'),
(12, 'B007', 'Thinkplus K3 Portable Speaker', 'Speaker mini bluetooth portable fulll bass', 78, 105000, '2023-07-10 14:06:36', '2023-07-10 14:06:36'),
(13, 'B009', 'Robot RB2 Hi-Fi Sound Speaker', 'Speaker bluetooth dengan koneksi bluetooth 5.0', 80, 230000, '2023-07-10 14:08:02', '2023-07-10 14:08:02'),
(14, 'B010', 'Aerostreet Riku - White', 'Sepatu sneaker pria dengan dasain modern', 60, 198000, '2023-07-10 14:09:18', '2023-07-10 14:09:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `kode_lokasi` varchar(10) DEFAULT NULL,
  `nama_lokasi` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `kode_lokasi`, `nama_lokasi`, `created_at`, `updated_at`) VALUES
(1, 'L001', 'Pasar Minggu', '2023-05-15 14:59:23', '2023-07-10 14:01:19'),
(3, 'L002', 'Pasar Senen', '2023-05-15 15:00:05', '2023-07-10 13:51:26'),
(4, 'L003', 'Kebayoran Baru', '2023-05-17 13:57:35', '2023-07-10 13:51:33'),
(8, 'L004', 'Kemanggisan', '2023-07-10 10:20:05', '2023-07-10 13:51:38'),
(9, 'L005', 'Mangga Besar', '2023-07-10 13:51:51', '2023-07-10 13:51:51'),
(10, 'L006', 'Menteng', '2023-07-10 13:52:10', '2023-07-10 13:52:10'),
(11, 'L007', 'Bintaro Sektor 9', '2023-07-10 13:52:25', '2023-07-10 13:52:25'),
(12, 'L008', 'Pasar Kemis', '2023-07-10 13:52:50', '2023-07-10 13:52:50'),
(13, 'L009', 'Pondok Pinang', '2023-07-10 13:53:08', '2023-07-10 13:53:08'),
(14, 'L010', 'Gandaria Selatan', '2023-07-10 13:53:25', '2023-07-10 13:53:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2023_07_10_080623_create_usages_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `no_pengiriman` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi_id` int(11) DEFAULT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `kurir_id` int(11) DEFAULT NULL,
  `is_approved` varchar(1) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `no_pengiriman`, `tanggal`, `lokasi_id`, `barang_id`, `jumlah_barang`, `harga_barang`, `kurir_id`, `is_approved`, `created_at`, `updated_at`) VALUES
(7, 'P0001', '2023-07-04', 4, 3, 500, 450000, 14, '1', '2023-05-17 05:30:14', '2023-07-10 14:10:19'),
(8, 'P0008', '2023-07-04', 3, 4, 127, 450000, 25, '1', '2023-05-17 14:04:22', '2023-07-10 14:20:33'),
(10, 'P0002', '2023-07-04', 4, 5, 120, 450000, 5, '1', '2023-05-17 05:30:14', '2023-07-10 14:10:27'),
(11, 'P0003', '2023-07-04', 8, 3, 25, 450000, 7, '1', '2023-05-17 05:30:14', '2023-07-10 14:21:49'),
(12, 'P0005', '2023-07-04', 4, 3, 47, 450000, 14, '1', '2023-05-17 05:30:14', '2023-07-10 14:21:40'),
(13, 'P0009', '2023-07-04', 11, 4, 90, 450000, 24, '1', '2023-05-17 14:04:22', '2023-07-10 14:11:54'),
(14, 'P0006', '2023-07-04', 1, 6, 350, 450000, 5, '1', '2023-05-17 05:30:14', '2023-07-10 14:19:38'),
(15, 'P0007', '2023-07-04', 12, 5, 40, 450000, 23, '1', '2023-05-17 05:30:14', '2023-07-10 14:19:30'),
(16, 'P0010', '2023-07-10', 14, 5, 120, 4000000, 23, '0', '2023-07-10 03:37:13', '2023-07-10 14:19:19'),
(17, 'P0011', '2023-07-10', 1, 6, 123, 123000, 7, '0', '2023-07-10 03:38:31', '2023-07-10 14:14:03'),
(18, 'P0012', '2023-07-10', 1, 13, 123, 120000, 5, '1', '2023-07-10 03:40:38', '2023-07-10 14:14:50'),
(19, 'P0013', '2023-07-10', 10, 3, 12, 12000, 7, '1', '2023-07-10 08:12:58', '2023-07-10 14:19:11'),
(20, 'P0014', '2023-07-10', 1, 4, 123, 321111, 5, '1', '2023-07-10 08:13:49', '2023-07-10 14:15:18'),
(21, 'P0015', '2023-07-10', 13, 7, 32, 49088, 13, '0', '2023-07-10 08:14:18', '2023-07-10 14:15:29'),
(22, 'P0016', '2023-07-10', 1, 5, 90, 903484, 23, '0', '2023-07-10 08:14:40', '2023-07-10 14:15:42'),
(23, 'P0017', '2023-07-10', 9, 13, 43, 90855, 25, '0', '2023-07-10 08:15:07', '2023-07-10 14:16:04'),
(24, 'P0018', '2023-07-10', 4, 4, 249, 8577888, 24, '0', '2023-07-10 08:15:34', '2023-07-10 14:20:54'),
(25, 'P0019', '2023-07-10', 13, 11, 34, 9845, 13, '0', '2023-07-10 08:24:33', '2023-07-10 14:16:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Kurir1 - Doni', 'kurir1@mail.com', NULL, '$2y$10$Hjxs5xTzwzjS2vJnt2JTWunj9Snhh6SedH.LdtASQaRP/g5MOKzWe', NULL, '2023-05-19 20:16:14', '2023-07-10 06:45:40'),
(6, 'Kurir2 - Ucup', 'kurir2@mail.com', NULL, '$2y$10$2ndbBQPBINgFFJZ3FkJc3.bdgEJAdSJO2FwMnJIwTuFRjfVwfWAnS', NULL, '2023-05-19 20:16:26', '2023-07-10 06:46:47'),
(7, 'Kurir3 - Jono', 'kurir3@mail.com', NULL, '$2y$10$PP1Q9SjFFT77ZDzfU96GtOMG6rzX30QzuX8cAOglcwd5S1FkQz6a2', NULL, '2023-05-30 00:26:03', '2023-07-10 06:47:15'),
(13, 'Kurir4 - Sigit', 'kurir4@mail.com', NULL, '$2y$10$K1289RLEDJegj.EKh/45SO4GjlbAHdfkPU8S6GMsIIHcHSM0UZ6.m', NULL, '2023-07-08 21:23:59', '2023-07-10 06:47:41'),
(14, 'Kurir5 - Beni', 'kurir5@mail.com', NULL, '$2y$10$a3U3ElxZHPicG2sAG/S7t.d0bRDUvl08JS4B8l51s3MRNrrnCmoNe', NULL, '2023-07-08 21:27:55', '2023-07-10 06:47:58'),
(23, 'Kurir6 - Hendri', 'kurir6@mail.com', NULL, '$2y$10$ar75VbHHEv9T..tlhS0BQuEJfuatAuyn8oTtCo3LtPi7vSg4rvTjC', NULL, '2023-07-10 03:21:48', '2023-07-10 06:48:31'),
(24, 'Kurir7 - Gita', 'kurir7@mail.com', NULL, '$2y$10$zQNP3XKXZRSF/4rOxUW1PeO54YZKPU8o3N3klyY7Su4Vw4r2dTybm', NULL, '2023-07-10 06:49:11', '2023-07-10 06:50:19'),
(25, 'Kurir8 - Noval', 'kurir8@mail.com', NULL, '$2y$10$Tfp2vtaiZvjO6Ucc9yjbB.2Oj646aNLiz5f25RA9lveOnN/RQtw.O', NULL, '2023-07-10 06:50:37', '2023-07-10 06:50:37');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pengiriman`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pengiriman` (
`id` int(11)
,`id_barang` int(11)
,`nama_barang` varchar(200)
,`kode_barang` varchar(10)
,`nama_lokasi` varchar(255)
,`id_lokasi` int(11)
,`jumlah_barang` int(11)
,`harga_barang` int(11)
,`tanggal` date
,`created_at` datetime
,`no_pengiriman` varchar(15)
,`updated_at` datetime
,`nama_pengirim` varchar(255)
,`kurir_id` bigint(20) unsigned
,`status` varchar(1)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pengiriman`
--
DROP TABLE IF EXISTS `view_pengiriman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pengiriman`  AS SELECT `pengiriman`.`id` AS `id`, `barang`.`id` AS `id_barang`, `barang`.`nama_barang` AS `nama_barang`, `barang`.`kode_barang` AS `kode_barang`, `lokasi`.`nama_lokasi` AS `nama_lokasi`, `lokasi`.`id` AS `id_lokasi`, `pengiriman`.`jumlah_barang` AS `jumlah_barang`, `pengiriman`.`harga_barang` AS `harga_barang`, `pengiriman`.`tanggal` AS `tanggal`, `pengiriman`.`created_at` AS `created_at`, `pengiriman`.`no_pengiriman` AS `no_pengiriman`, `pengiriman`.`updated_at` AS `updated_at`, `users`.`name` AS `nama_pengirim`, `users`.`id` AS `kurir_id`, `pengiriman`.`is_approved` AS `status` FROM (((`pengiriman` left join `barang` on(`pengiriman`.`barang_id` = `barang`.`id`)) left join `lokasi` on(`pengiriman`.`lokasi_id` = `lokasi`.`id`)) left join `users` on(`pengiriman`.`kurir_id` = `users`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
