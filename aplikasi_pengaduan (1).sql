-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Jul 2023 pada 07.49
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_pengaduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaran`
--

CREATE TABLE `anggaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anggaran_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggaran_tipe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggaran`
--

INSERT INTO `anggaran` (`id`, `anggaran_nama`, `anggaran_tipe`, `created_at`, `updated_at`) VALUES
(1, 'KAS RUKUN KEMATIAN DAN SOSIAL', 'PENERIMAAN', '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(2, 'KAS RUKUN KEMATIAN DAN SOSIAL', 'PENGELUARAN', '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(3, 'KAS PEMBANGUNAN LINGKUNGAN TAHUN 2021', 'PENERIMAAN', '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(4, 'KAS PEMBANGUNAN LINGKUNGAN TAHUN 2021', 'PENGELUARAN', '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(5, 'KAS HUT KEMERDEKAAN RI TAHUN 2021', 'PENERIMAAN', '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(6, 'KAS HUT KEMERDEKAAN RI TAHUN 2021', 'PENGELUARAN', '2023-07-20 14:46:25', '2023-07-20 14:46:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `berita_judul` longtext COLLATE utf8mb4_unicode_ci,
  `berita_isi` longtext COLLATE utf8mb4_unicode_ci,
  `berita_jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berita_tanggal` datetime DEFAULT NULL,
  `berita_kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_anggaran`
--

CREATE TABLE `data_anggaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_anggaran_deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_anggaran_debet` int(11) DEFAULT NULL,
  `data_anggaran_kredit` int(11) DEFAULT NULL,
  `data_anggaran_tanggal` date DEFAULT NULL,
  `anggaran_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_anggaran`
--

INSERT INTO `data_anggaran` (`id`, `data_anggaran_deskripsi`, `data_anggaran_debet`, `data_anggaran_kredit`, `data_anggaran_tanggal`, `anggaran_id`, `created_at`, `updated_at`) VALUES
(1, 'Saldo kas awal', 2191, NULL, '2022-08-17', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(2, 'Iuran bulan Januari', 3643919, NULL, '2023-04-12', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(3, 'Iuran bulan Februari', 20102, NULL, '2022-11-24', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(4, 'Iuran bulan Maret', 995351711, NULL, '2023-06-19', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(5, 'Iuran bulan April', 37938895, NULL, '2022-09-20', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(6, 'Iuran bulan Mei', 676517174, NULL, '2022-12-02', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(7, 'Iuran bulan Juni', 41178518, NULL, '2023-07-12', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(8, 'Iuran bulan Juli', 67236, NULL, '2022-12-18', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(9, 'Iuran bulan Agustus', 687365, NULL, '2023-02-22', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(10, 'Iuran bulan September', 847410, NULL, '2022-10-27', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(11, 'Iuran bulan Oktober', 93452889, NULL, '2022-08-18', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(12, 'Iuran bulan November', 81694, NULL, '2023-07-12', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(13, 'Iuran bulan Desember', 661162288, NULL, '2023-06-04', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(14, 'Bantuan Sosial Warga yg Sakit', 887849300, NULL, '2023-02-25', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(15, 'Bantuan Sosial Warga Kurang Mampu', 266080550, NULL, '2023-07-18', 1, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(16, 'Saldo kas awal', NULL, 8599024, '2023-04-15', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(17, 'Iuran bulan Januari', NULL, 23986, '2022-08-30', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(18, 'Iuran bulan Februari', NULL, 74456033, '2023-01-24', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(19, 'Iuran bulan Maret', NULL, 5362191, '2022-11-25', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(20, 'Iuran bulan April', NULL, 64910, '2022-08-30', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(21, 'Iuran bulan Mei', NULL, 3504666, '2022-08-28', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(22, 'Iuran bulan Juni', NULL, 424278, '2023-04-10', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(23, 'Iuran bulan Juli', NULL, 1575640, '2023-01-05', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(24, 'Iuran bulan Agustus', NULL, 4517625, '2023-07-02', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(25, 'Iuran bulan September', NULL, 15537, '2023-05-22', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(26, 'Iuran bulan Oktober', NULL, 6879776, '2022-09-01', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(27, 'Iuran bulan November', NULL, 47818, '2023-06-22', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(28, 'Iuran bulan Desember', NULL, 63232, '2023-05-01', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(29, 'Bantuan Sosial Warga yg Sakit', NULL, 98193, '2023-03-09', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(30, 'Bantuan Sosial Warga Kurang Mampu', NULL, 25938, '2022-12-10', 2, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(31, 'Saldo kas awal', 3495466, NULL, '2022-12-18', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(32, 'Iuran bulan Januari', 81203493, NULL, '2023-04-30', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(33, 'Iuran bulan Februari', 8951231, NULL, '2023-05-01', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(34, 'Iuran bulan Maret', 26818304, NULL, '2022-09-22', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(35, 'Iuran bulan April', 2546593, NULL, '2022-09-20', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(36, 'Iuran bulan Mei', 41305900, NULL, '2023-07-18', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(37, 'Iuran bulan Juni', 8352080, NULL, '2023-05-28', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(38, 'Iuran bulan Juli', 6256, NULL, '2023-05-15', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(39, 'Iuran bulan Agustus', 616221317, NULL, '2023-05-13', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(40, 'Iuran bulan September', 38592, NULL, '2022-08-17', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(41, 'Iuran bulan Oktober', 2846059, NULL, '2022-09-06', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(42, 'Iuran bulan November', 106302481, NULL, '2023-02-18', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(43, 'Iuran bulan Desember', 2864130, NULL, '2022-12-23', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(44, 'Bantuan Sosial Warga yg Sakit', 137206349, NULL, '2022-08-07', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(45, 'Bantuan Sosial Warga Kurang Mampu', 21718673, NULL, '2023-06-09', 3, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(46, 'Saldo kas awal', NULL, 8366462, '2022-11-08', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(47, 'Iuran bulan Januari', NULL, 96862, '2022-12-17', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(48, 'Iuran bulan Februari', NULL, 877704587, '2022-12-30', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(49, 'Iuran bulan Maret', NULL, 164173, '2023-03-21', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(50, 'Iuran bulan April', NULL, 98116, '2022-12-18', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(51, 'Iuran bulan Mei', NULL, 660014, '2022-08-09', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(52, 'Iuran bulan Juni', NULL, 912588, '2023-04-27', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(53, 'Iuran bulan Juli', NULL, 61872, '2023-04-30', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(54, 'Iuran bulan Agustus', NULL, 171291328, '2022-08-14', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(55, 'Iuran bulan September', NULL, 79979569, '2023-04-16', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(56, 'Iuran bulan Oktober', NULL, 5613147, '2023-06-20', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(57, 'Iuran bulan November', NULL, 97100926, '2023-04-05', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(58, 'Iuran bulan Desember', NULL, 575202, '2022-10-14', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(59, 'Bantuan Sosial Warga yg Sakit', NULL, 45646616, '2022-12-26', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(60, 'Bantuan Sosial Warga Kurang Mampu', NULL, 38140, '2022-12-17', 4, '2023-07-20 14:46:25', '2023-07-20 14:46:25'),
(61, 'Saldo kas awal', 277232, NULL, '2023-04-21', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(62, 'Iuran bulan Januari', 14565, NULL, '2022-09-13', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(63, 'Iuran bulan Februari', 37863056, NULL, '2023-03-21', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(64, 'Iuran bulan Maret', 968116269, NULL, '2022-12-10', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(65, 'Iuran bulan April', 209603989, NULL, '2023-05-18', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(66, 'Iuran bulan Mei', 75850995, NULL, '2023-03-15', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(67, 'Iuran bulan Juni', 310140, NULL, '2023-04-24', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(68, 'Iuran bulan Juli', 78530, NULL, '2022-08-24', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(69, 'Iuran bulan Agustus', 798920325, NULL, '2022-10-31', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(70, 'Iuran bulan September', 348777936, NULL, '2022-08-08', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(71, 'Iuran bulan Oktober', 75944662, NULL, '2023-04-06', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(72, 'Iuran bulan November', 938909690, NULL, '2023-01-23', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(73, 'Iuran bulan Desember', 73391, NULL, '2022-11-21', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(74, 'Bantuan Sosial Warga yg Sakit', 461608930, NULL, '2023-01-04', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(75, 'Bantuan Sosial Warga Kurang Mampu', 54760345, NULL, '2023-03-17', 5, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(76, 'Saldo kas awal', NULL, 669484801, '2022-09-15', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(77, 'Iuran bulan Januari', NULL, 51476101, '2022-09-09', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(78, 'Iuran bulan Februari', NULL, 522879, '2022-08-15', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(79, 'Iuran bulan Maret', NULL, 76040618, '2023-02-26', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(80, 'Iuran bulan April', NULL, 77246, '2023-05-31', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(81, 'Iuran bulan Mei', NULL, 66643, '2022-07-28', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(82, 'Iuran bulan Juni', NULL, 107372, '2022-07-29', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(83, 'Iuran bulan Juli', NULL, 912041, '2023-04-04', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(84, 'Iuran bulan Agustus', NULL, 2938573, '2023-03-04', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(85, 'Iuran bulan September', NULL, 51338, '2023-02-22', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(86, 'Iuran bulan Oktober', NULL, 1703906, '2023-02-20', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(87, 'Iuran bulan November', NULL, 76052539, '2023-01-30', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(88, 'Iuran bulan Desember', NULL, 79707971, '2022-11-22', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(89, 'Bantuan Sosial Warga yg Sakit', NULL, 7186057, '2023-05-15', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26'),
(90, 'Bantuan Sosial Warga Kurang Mampu', NULL, 494603, '2023-06-01', 6, '2023-07-20 14:46:26', '2023-07-20 14:46:26');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritiksaran`
--

CREATE TABLE `kritiksaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kritiksaran_keterangan` longtext COLLATE utf8mb4_unicode_ci,
  `kritiksaran_tipe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kritiksaran_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kritiksaran_tanggal` datetime DEFAULT NULL,
  `login_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_token` text COLLATE utf8mb4_unicode_ci,
  `login_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `login_nama`, `login_username`, `login_password`, `login_email`, `login_telepon`, `login_token`, `login_level`, `login_status`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '$2y$12$n9i.Sal9tlsB7gvEKzrhuuP4KeBjjeRjOf0qWvTmQbhUD.aKJk5Im', 'administrator@pmb-unidayan.com', '085944923123', '$2y$12$8gR4I9izXqOyjWYLKyGUie2ns6iKK6x3sYn1OJisGCNYL23XWfpHe', 'admin', 'verified', '2023-07-20 14:46:20', '2023-07-20 14:46:20'),
(2, 'Fathur Walkers', 'fathurwalkers', '$2y$12$MieNsqHoI.XD08RA3wtP/eHdxKazyy5.Aq06nCNR9e7/BS.AyrIeu', 'fathurwalkers@laravel.com', '084842848242', '$2y$12$Uvc328HgTDj3czklGM9hpOHjI1RoXC8mm614PQy.21fN8yfBhdoRa', 'admin', 'verified', '2023-07-20 14:46:21', '2023-07-20 14:46:21'),
(3, 'Syarah', 'syarah', '$2y$12$W94Z7YWq8u5K3QONMD3hdeT4lsJzXZEy1kN5oH79OMMFPT781gcP6', 'syaral@flask.com', '08554929239', '$2y$12$hUuu3CECyPVBlJBGHAFU.u7OqcN40lGheoBvHxwej4.kCBTp0tOeG', 'admin', 'verified', '2023-07-20 14:46:22', '2023-07-20 14:46:22'),
(4, 'Example Users', 'example', '$2y$12$UM1jC26V7XqmwiTARr7QQOzzqJZ6Is0Xfd1BREKpayWwJjx48rW/a', 'user1@gmail.com', '085342072185', '$2y$12$Zj250rwjY1LCPNvxrtvdfuDmVL8kUPdEB9HwGLkBPQUmZTz3OulrC', 'user', 'verified', '2023-07-20 14:46:23', '2023-07-20 14:46:23'),
(5, 'User 2', 'user2', '$2y$12$3OCTVwelxIfu3ZoqvMxmquZUd9KbXVVHrN32SqMJeVspy9VzxCh2G', 'user2@gmail.com', '085342072185', '$2y$12$tmu666JgHTg1Nal.Fi5smudQIJx1cJ.7ST52TcNa2WBymQ8/96XEi', 'user', 'verified', '2023-07-20 14:46:24', '2023-07-20 14:46:24'),
(6, 'Fathur Walkers', 'fathur', '$2y$12$1JKkNVQBBH08gnumgJnx4eEPp961LtNzOEkVxNg66YKOrhC.ih4FO', 'fathurwalkers@gmail.com', '08492929191', '$2y$12$SjeMsdga6bTqui.0IWc9m.XEL58wqS2VQHg/mOQjEByZshiBLNIGu', 'user', 'verified', '2023-07-20 14:46:25', '2023-07-20 14:46:25');

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
(5, '2023_06_18_135700_create_logins_table', 1),
(6, '2023_06_18_135945_create_pengaduans_table', 1),
(7, '2023_06_18_140011_create_kritiksarans_table', 1),
(8, '2023_06_18_140026_create_beritas_table', 1),
(9, '2023_06_18_140210_create_surats_table', 1),
(10, '2023_07_20_061207_create_anggarans_table', 1),
(11, '2023_07_20_063121_create_dataanggarans_table', 1);

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
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengaduan_keterangan` longtext COLLATE utf8mb4_unicode_ci,
  `pengaduan_jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengaduan_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengaduan_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengaduan_tanggal` datetime DEFAULT NULL,
  `login_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surat_isi` longtext COLLATE utf8mb4_unicode_ci,
  `surat_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_nomor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_lampiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_perihal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_tanggal` date DEFAULT NULL,
  `surat_pelampir_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_pelampir_jenkel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_pelampir_tgllahir` date DEFAULT NULL,
  `surat_pelampir_statusperkawinan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_pelampir_goldarah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_pelampir_kewarganegaraan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_pelampir_pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_pelampir_agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_pelampir_alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
-- Indeks untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_login_id_foreign` (`login_id`);

--
-- Indeks untuk tabel `data_anggaran`
--
ALTER TABLE `data_anggaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_anggaran_anggaran_id_foreign` (`anggaran_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kritiksaran`
--
ALTER TABLE `kritiksaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kritiksaran_login_id_foreign` (`login_id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_login_username_unique` (`login_username`),
  ADD UNIQUE KEY `login_login_email_unique` (`login_email`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduan_login_id_foreign` (`login_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_login_id_foreign` (`login_id`);

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
-- AUTO_INCREMENT untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_anggaran`
--
ALTER TABLE `data_anggaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kritiksaran`
--
ALTER TABLE `kritiksaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_login_id_foreign` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_anggaran`
--
ALTER TABLE `data_anggaran`
  ADD CONSTRAINT `data_anggaran_anggaran_id_foreign` FOREIGN KEY (`anggaran_id`) REFERENCES `anggaran` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kritiksaran`
--
ALTER TABLE `kritiksaran`
  ADD CONSTRAINT `kritiksaran_login_id_foreign` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_login_id_foreign` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_login_id_foreign` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
