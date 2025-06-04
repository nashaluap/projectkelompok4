-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2025 pada 03.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_catering`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_05_10_153720_add_id_user_to_tb_pelanggan1_table', 2),
(6, '2025_05_22_165614_add_status_to_tb_menu_table', 3),
(7, '2025_05_22_170432_add_timestamps_to_tb_menu_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `dibaca` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id`, `judul`, `pesan`, `dibaca`, `created_at`, `updated_at`) VALUES
(1, 6, 'Konfirmasi Pesanan Diterima', 'Pesanan Anda sudah kami terima dan sedang diproses.', 0, '2025-05-15 12:23:18', '2025-05-15 12:23:18');

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
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `id_pesanan` int(10) UNSIGNED NOT NULL,
  `tipe_pembayaran` enum('DP','Lunas') NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_bank` varchar(10) NOT NULL,
  `tgl_pembayaran` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesanan`, `tipe_pembayaran`, `nominal`, `created_at`, `updated_at`, `id_bank`, `tgl_pembayaran`) VALUES
(1, 13, '', 400000.00, '2025-06-03 14:13:27', '2025-06-03 14:13:27', 'B001', '2025-06-03 21:13:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id_bank` varchar(10) NOT NULL,
  `atas_nama` varchar(200) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `no_rekening` varchar(200) NOT NULL,
  `foto_bank` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_bank`
--

INSERT INTO `tb_bank` (`id_bank`, `atas_nama`, `nama_bank`, `no_rekening`, `foto_bank`) VALUES
('B001', 'MOCH SEPTIAN HADI', 'BCA', '055 053 2131', 'B001.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id_cart` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_menu` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id_chat` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  `pengirim` enum('pelanggan','admin') DEFAULT 'pelanggan',
  `is_read` tinyint(1) DEFAULT 0,
  `tipe_pesan` varchar(20) DEFAULT 'teks',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_chat`
--

INSERT INTO `tb_chat` (`id_chat`, `id_pelanggan`, `pesan`, `pengirim`, `is_read`, `tipe_pesan`, `created_at`, `updated_at`) VALUES
(4, 'PG0003', 'haii', 'pelanggan', 1, 'teks', '2025-05-31 14:56:20', '2025-05-31 07:56:20'),
(6, 'PG0003', 'Min mau nanya dong', 'pelanggan', 1, 'teks', '2025-05-31 14:56:20', '2025-05-31 07:56:20'),
(7, 'PG0003', 'hai min mau bertanya dong', 'pelanggan', 1, 'teks', '2025-05-31 14:56:20', '2025-05-31 07:56:20'),
(8, 'PG0003', 'iyaa', 'admin', 0, 'teks', '2025-05-31 07:56:29', '2025-05-31 07:56:29'),
(9, 'PG0003', 'baik kak, bertanya terkait apa?', 'admin', 0, 'teks', '2025-05-31 08:01:33', '2025-05-31 08:01:33'),
(10, 'PG0003', 'min', 'pelanggan', 1, 'teks', '2025-05-31 15:26:03', '2025-05-31 15:26:03'),
(11, 'PG0003', 'iya kak?', 'admin', 0, 'teks', '2025-05-31 15:26:09', '2025-05-31 15:26:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` varchar(10) NOT NULL,
  `id_paket` varchar(10) NOT NULL,
  `nama_menu` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_menu` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `id_paket`, `nama_menu`, `status`, `harga`, `deskripsi`, `foto_menu`, `created_at`, `updated_at`) VALUES
('MN0001', 'PK002', 'PAKET 1', 1, 11000, 'Isi 3 Kue (Asin dan Manis) & 1 Air Mineral Cup', 'MN0001.jpg', NULL, NULL),
('MN0002', 'PK003', 'Nampan Kecil', 0, 60000, 'Isi 5 jenis kue (asin & manis), jumlah kue kurang lebih 16 s/d 18 pcs.', 'MN0002.jpg', NULL, '2025-05-22 17:53:54'),
('MN0004', 'PK001', 'Pastel', 1, 3500, 'Isi Bihun', 'MN0004.jpg', NULL, NULL),
('MN0005', 'PK005', 'Tumpeng Mini', 1, 40000, 'Tersedia 5 jenis lauk pauk, sudah termasuk sambal dan lalapan dan menggunakan mika tebal berkualitas', 'MN0005.jpg', NULL, '2025-05-22 10:29:31'),
('MN0006', 'PK001', 'DADAR GULUNG', 0, 2500, 'Makanan khas indonesia', 'MN0006.jpg', NULL, '2025-05-22 10:21:27'),
('MN0007', 'PK001', 'Klepon', 1, 2500, 'KUE TRADISIONAL  DENGAN ISI GULA  AREN', 'MN0007.jpg', NULL, NULL),
('MN0008', 'PK002', 'PAKET 2', 1, 13500, 'ISI 4 KUE (ASIN  DAN MANIS)  1 AIR MINERAL  CUP', 'MN0008.jpg', NULL, NULL),
('MN0009', 'PK002', 'PAKET 3', 1, 16000, 'ISI 5 KUE (ASIN  DAN MANIS)  1 AIR MINERAL  CUP', 'MN0009.jpg', NULL, NULL),
('MN0010', 'PK002', 'PAKET 4', 1, 20000, 'ISI 5 KUE (ASIN  DAN MANIS)  1 AIR MINERAL  BOTOL KECIL  BUAH', 'MN0010.jpg', NULL, NULL),
('MN0011', 'PK003', 'NAMPAN SEDANG', 1, 80000, 'ISI 6 JENIS KUE  (ASIN & MANIS)  JUMLAH KUE  KURANG LEBIH  28 S/D 30 PCS', 'MN0011.jpg', NULL, NULL),
('MN0012', 'PK003', 'NAMPAN BESAR', 1, 150000, 'ISI 8 JENIS KUE  (ASIN & MANIS)  JUMLAH KUE  KURANG LEBIH  50 S/D 55 PCS', 'MN0012.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` varchar(10) NOT NULL,
  `paket` varchar(200) DEFAULT NULL,
  `uraian` text DEFAULT NULL,
  `foto_paket` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `paket`, `uraian`, `foto_paket`) VALUES
('PK001', 'KUE BASAH', 'Kue tradisional yang lembut, gurih, dan legit, cocok untuk camilan atau suguhan tamu.', 'PK001.jpg'),
('PK002', 'SNACK BOX', 'Aneka paket snack box berisi cemilan, cocok untuk berbagai acara.', 'PK002.jpg'),
('PK003', 'KUE NAMPAN', 'Kumpulan kue basah atau kering yang disusun dalam satu nampan, cocok untuk acara keluarga atau syukuran.', 'PK003.jpg'),
('PK004', 'KUE TAMPAH', 'Disajikan ditampah bambu dengan hiasan daun pisang, cocok untuk arisan, lamaran, dan acara adat.', 'PK004.jpg'),
('PK005', 'NASI TUMPENG', 'Nasi kuning berbentuk kerucut lengkap dengan lauk pauk khas, cocok untuk perayaan dan syukuran.', 'PK005.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan1`
--

CREATE TABLE `tb_pelanggan1` (
  `id_pelanggan` varchar(10) NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_pelanggan` varchar(200) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pelanggan1`
--

INSERT INTO `tb_pelanggan1` (`id_pelanggan`, `id_user`, `nama_pelanggan`, `alamat`, `no_telepon`, `email`) VALUES
('PG0001', 6, 'Nashalu Aprilianti', 'Subang', '0895320335637', 'nashaluap@gmail.com'),
('PG0002', 7, 'Fatimah Zahra', 'Belum diisi', '081222629691', 'fatimah@gmail.com'),
('PG0003', 8, 'Nashalu', 'Belum diisi', '089532035636', 'nashalu@gmail.com'),
('PG0004', 9, 'Zahra', 'Belum diisi', '082123456345', 'fatimah1@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(10) UNSIGNED NOT NULL,
  `id_pelanggan` varchar(10) DEFAULT NULL,
  `tgl_pesanan` datetime DEFAULT NULL,
  `status` enum('selesai','tertunda','diproses','dibatalkan') DEFAULT 'tertunda',
  `total_harga` int(11) DEFAULT NULL,
  `total_pesanan` int(11) DEFAULT NULL,
  `nama_pemesan` varchar(200) NOT NULL,
  `no_wa` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_pelanggan`, `tgl_pesanan`, `status`, `total_harga`, `total_pesanan`, `nama_pemesan`, `no_wa`, `alamat`, `catatan`, `created_at`) VALUES
(8, 'PG0003', NULL, 'tertunda', 165000, NULL, 'Nashalu Aprilianti', '089532035637', 'Subang', NULL, '2025-05-22 14:41:18'),
(9, 'PG0003', NULL, 'tertunda', 270000, NULL, 'Nashalu Aprilianti', '089532035637', 'Subang', NULL, '2025-05-23 00:55:48'),
(10, 'PG0003', NULL, 'tertunda', 270000, NULL, 'Nashalu Aprilianti', '089532035637', 'Subang', NULL, '2025-05-23 02:46:13'),
(11, 'PG0003', NULL, 'tertunda', 60000, NULL, 'Nashalu Aprilianti', '089532035637', 'Subang', NULL, '2025-05-23 02:51:54'),
(12, 'PG0003', NULL, 'tertunda', 252500, NULL, 'Nashalu Aprilianti', '089532035637', 'Talaga Sunda', NULL, '2025-05-23 03:04:53'),
(13, 'PG0003', '2025-05-24 00:00:00', 'selesai', 400000, 10, 'Nashalu Aprilianti', '089532035637', 'Talaga Sunda', NULL, '2025-05-23 03:06:48'),
(14, 'PG0003', '2025-05-26 11:00:00', 'tertunda', 275000, 25, 'Syifa', '089123123123', 'Curug Agung', NULL, '2025-05-23 03:11:40'),
(15, 'PG0003', '2025-05-26 14:00:00', 'tertunda', 400000, 10, 'Zahra', '089123123123', 'Cibogo', NULL, '2025-05-23 06:45:19'),
(16, 'PG0003', '2025-05-26 14:00:00', 'tertunda', 80000, 2, 'Zahra', '089123123123', 'Cibogo', NULL, '2025-05-23 06:52:36'),
(17, 'PG0003', '2025-05-26 11:00:00', 'tertunda', 60000, 20, 'Zahra', '089123123123', 'CIBOGO', 'SHJAH', '2025-05-23 07:30:11'),
(18, 'PG0003', '2025-06-02 11:00:00', 'tertunda', 87500, 25, 'Nayla', '081234565423', 'Subang Buana', NULL, '2025-05-28 15:00:11'),
(19, 'PG0004', '2025-06-06 11:00:00', 'tertunda', 18000, 3, 'Fatimah', '089123123123', 'Dawuan', NULL, '2025-06-02 14:35:41'),
(20, 'PG0004', '2025-06-06 11:00:00', 'tertunda', 400000, 5, 'Fatimah Az zahra', '089123123123', 'Dawuan', NULL, '2025-06-02 14:52:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan_menu`
--

CREATE TABLE `tb_pesanan_menu` (
  `id_detail` int(10) NOT NULL,
  `id_pesanan` int(10) UNSIGNED NOT NULL,
  `id_menu` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pesanan_menu`
--

INSERT INTO `tb_pesanan_menu` (`id_detail`, `id_pesanan`, `id_menu`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES
(26, 8, 'MN0001', 15, 165000, '2025-05-22 07:41:18', '2025-05-22 07:41:18'),
(27, 9, 'MN0005', 5, 200000, '2025-05-22 17:55:48', '2025-05-22 17:55:48'),
(28, 9, 'MN0004', 20, 70000, '2025-05-22 17:55:48', '2025-05-22 17:55:48'),
(29, 10, 'MN0004', 20, 70000, '2025-05-22 19:46:13', '2025-05-22 19:46:13'),
(30, 10, 'MN0005', 5, 200000, '2025-05-22 19:46:13', '2025-05-22 19:46:13'),
(31, 11, 'MN0007', 20, 60000, '2025-05-22 19:51:54', '2025-05-22 19:51:54'),
(32, 12, 'MN0005', 5, 200000, '2025-05-22 20:04:53', '2025-05-22 20:04:53'),
(33, 12, 'MN0004', 15, 52500, '2025-05-22 20:04:53', '2025-05-22 20:04:53'),
(34, 13, 'MN0005', 10, 400000, '2025-05-22 20:06:48', '2025-05-22 20:06:48'),
(35, 14, 'MN0001', 25, 275000, '2025-05-22 20:11:40', '2025-05-22 20:11:40'),
(36, 15, 'MN0005', 10, 400000, '2025-05-22 23:45:19', '2025-05-22 23:45:19'),
(37, 16, 'MN0005', 2, 80000, '2025-05-22 23:52:36', '2025-05-22 23:52:36'),
(38, 17, 'MN0004', 10, 35000, '2025-05-23 00:30:11', '2025-05-23 00:30:11'),
(39, 17, 'MN0007', 10, 25000, '2025-05-23 00:30:11', '2025-05-23 00:30:11'),
(40, 18, 'MN0004', 25, 87500, '2025-05-28 08:00:11', '2025-05-28 08:00:11'),
(41, 19, 'MN0001', 1, 11000, '2025-06-02 14:35:41', '2025-06-02 14:35:41'),
(42, 19, 'MN0004', 2, 7000, '2025-06-02 14:35:41', '2025-06-02 14:35:41'),
(43, 20, 'MN0011', 5, 400000, '2025-06-02 14:52:32', '2025-06-02 14:52:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rincian_menu`
--

CREATE TABLE `tb_rincian_menu` (
  `id_rincian` int(11) NOT NULL,
  `id_pesanan` int(10) UNSIGNED NOT NULL,
  `id_menu` varchar(10) NOT NULL,
  `id_paket` varchar(10) DEFAULT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `harga_satuan` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_pesanan` int(10) UNSIGNED NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `rating` tinyint(5) NOT NULL,
  `ulasan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_pesanan`, `id_pelanggan`, `rating`, `ulasan`, `created_at`) VALUES
(1, 13, 'PG0003', 5, 'Enakkk', '2025-05-22 20:20:52');

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
  `role` enum('admin','pelanggan','pemilik') NOT NULL DEFAULT 'pelanggan',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Nashalu Aprilianti', 'nashaluap@gmail.com', NULL, '$2y$10$s6DSQco/RcU4Oe.oyp7qdO104SOljEU5Xn1dND7tyA1lH67tjraFe', 'pelanggan', NULL, '2025-05-10 09:00:19', '2025-05-10 09:00:19'),
(7, 'Fatimah Zahra', 'fatimah@gmail.com', NULL, '$2y$10$7d.Xy94z5n0Root2J0FZtOdCA.qyaUgB.weijN0pvsGm6u/dd9Jfu', 'pelanggan', NULL, '2025-05-15 04:49:47', '2025-05-15 04:49:47'),
(8, 'Nashalu', 'nashalu@gmail.com', NULL, '$2y$10$NLeCouZ5r5mWMX0AECy5e.pJu8.fadnlvelRi5FeksqRfaEU4ESy6', 'pelanggan', NULL, '2025-05-15 18:22:56', '2025-05-15 18:22:56'),
(9, 'Zahra', 'fatimah1@gmail.com', NULL, '$2y$10$RyP/fr4eQDppm/eO1Nw88.Jy2.6EtlYUo7p5f5cwkcgGw62teKmJm', 'pelanggan', NULL, '2025-05-15 19:13:52', '2025-05-15 19:13:52'),
(10, 'admin1', 'admin1@gmail.com', NULL, '$2y$10$C6FdmsoxRoEnHjmbSgm8GOZGBx5bGs0QlLHOWl7wfUbnel7ru9zWq', 'admin', NULL, '2025-05-22 05:23:26', '2025-05-22 05:23:26');

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pesanan` (`id_pesanan`,`id_bank`),
  ADD KEY `id_bank` (`id_bank`),
  ADD KEY `id_pesanan_2` (`id_pesanan`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `tb_pelanggan1`
--
ALTER TABLE `tb_pelanggan1`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_pesanan_menu`
--
ALTER TABLE `tb_pesanan_menu`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_detail` (`id_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `tb_rincian_menu`
--
ALTER TABLE `tb_rincian_menu`
  ADD PRIMARY KEY (`id_rincian`),
  ADD KEY `id_pesanan` (`id_pesanan`,`id_menu`,`id_paket`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_pesanan` (`id_pesanan`,`id_pelanggan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id_cart` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id_chat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan_menu`
--
ALTER TABLE `tb_pesanan_menu`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tb_rincian_menu`
--
ALTER TABLE `tb_rincian_menu`
  MODIFY `id_rincian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_bank`) REFERENCES `tb_bank` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD CONSTRAINT `fk_cart_menu` FOREIGN KEY (`id_menu`) REFERENCES `tb_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD CONSTRAINT `tb_chat_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan1` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD CONSTRAINT `tb_menu_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `tb_pesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan1` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pesanan_menu`
--
ALTER TABLE `tb_pesanan_menu`
  ADD CONSTRAINT `tb_pesanan_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tb_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pesanan_menu_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rincian_menu`
--
ALTER TABLE `tb_rincian_menu`
  ADD CONSTRAINT `tb_rincian_menu_ibfk_3` FOREIGN KEY (`id_menu`) REFERENCES `tb_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rincian_menu_ibfk_4` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`),
  ADD CONSTRAINT `tb_rincian_menu_ibfk_5` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan1` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasan_ibfk_3` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
