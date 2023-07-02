-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Jun 2023 pada 18.48
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
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, 'Administrator', 'admin', '$2y$12$rkDwgLvVVgNbzd0BAvXhIO4YPWcJR5eqmQhxrsposj25X9bk5nPUG', 'administrator@pmb-unidayan.com', '085944923123', '$2y$12$EYBPWVVCDm/fLXDh/9tRQe5jkrWJQUktEfLDk2rArA1bWlLQGYV8q', 'admin', 'verified', '2023-06-26 01:18:15', '2023-06-26 01:18:15'),
(2, 'Fathur Walkers', 'fathurwalkers', '$2y$12$HIBrmXUUOSmSZ73kj60AjO5/Y8VIR6e.9sB.RXRHH1b05EiGiWuM.', 'fathurwalkers@laravel.com', '084842848242', '$2y$12$SIu5ehOjlV7WF18BBKphzO12X1wM0QMek.PhJYTNo68d8LYKA3t6i', 'admin', 'verified', '2023-06-26 01:18:16', '2023-06-26 01:18:16'),
(3, 'Syarah', 'syarah', '$2y$12$LDNvk8ud9pE5lS1xEo2nJuPAIzquivU.ZTCTW/gqaAwynWnb3yW3C', 'syaral@flask.com', '08554929239', '$2y$12$r/AdYFF26L7tP9SyPHhQ5.KUdQAoFk8pvH9x0xr2eI3/dKXc7/JGe', 'admin', 'verified', '2023-06-26 01:18:17', '2023-06-26 01:18:17'),
(4, 'Example Users', 'example', '$2y$12$VoWTpFPqeiXDOBiwLpJ5I.Pfa8QBRpIuBRzCdSHWAWLIwiExg3bpm', 'user1@gmail.com', '085342072185', '$2y$12$8D0tQi7CGka5zqYMJGyTPe3gYOIt8MCQMvVbiyfa5pQmI60vCnz4K', 'user', 'verified', '2023-06-26 01:18:18', '2023-06-26 01:18:18'),
(5, 'User 2', 'user2', '$2y$12$RsMVlvKmrJpHQqiHTRYl7O9eG1p2u5IjQCrjgspfWpFKgCeDRe7wK', 'user2@gmail.com', '085342072185', '$2y$12$nPs85dMCvovGQgjsK7ax1umrMN9kdWeJWv9j3JPn.m5.0iKR0aXi6', 'user', 'verified', '2023-06-26 01:18:19', '2023-06-26 01:18:19'),
(6, 'Fathur Walkers', 'fathur', '$2y$12$bIlOLxCx5ZAnN8TgGv6UVeI3OCRUDjpy/z4PKx7a.hNjprSk5BP6.', 'fathurwalkers@gmail.com', '08492929191', '$2y$12$dUUvnnA1cI5RwI5fuy6ROe.F7GCYu4pgngzcil0V98ME1qwB1t/QO', 'user', 'verified', '2023-06-26 01:18:20', '2023-06-26 01:18:20');

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
(10, '2023_06_18_140319_create_keuangans_table', 1);

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
  `surat_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_tanggal` datetime DEFAULT NULL,
  `login_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id`, `surat_pengirim`, `surat_jenis`, `surat_kode`, `surat_status`, `surat_tanggal`, `login_id`, `created_at`, `updated_at`) VALUES
(1, 'Fathur Walkers', 'surat_domisili', '5rt0nokanhjs', 'diterima', NULL, 6, '2023-06-26 01:33:50', '2023-06-26 01:41:38'),
(2, 'Fathur Walkers', 'surat_keterangan_ahli_waris', '5rt0vcjpn5hy', 'diproses', '2023-06-25 18:37:23', 6, '2023-06-26 01:37:23', '2023-06-26 01:37:23');

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
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_login_id_foreign` (`login_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
