-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2023 pada 04.04
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cbt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_guru`
--

CREATE TABLE `absen_guru` (
  `idAbsen` bigint(20) UNSIGNED NOT NULL,
  `guru_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absen_guru`
--

INSERT INTO `absen_guru` (`idAbsen`, `guru_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'dsdsa', '2023-07-05 08:42:27', '2023-07-06 08:42:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_siswa`
--

CREATE TABLE `absen_siswa` (
  `idAbsen` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absen_siswa`
--

INSERT INTO `absen_siswa` (`idAbsen`, `siswa_id`, `status`, `created_at`, `updated_at`) VALUES
(9, 1, 'hadir', '2023-08-03 09:57:03', '2023-08-03 09:57:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `nama_admin`, `email`, `password`, `avatar`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'beni', 'admin@gmail.com', '$2y$10$5po5nOzt..6eqcXzkTaFy.NFPwUIrdDddQJ6IYXzTRlgjf13sDdmy', 'default.png', 1, 1, '2023-07-22 22:48:27', '2023-08-03 09:37:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses_sesi`
--

CREATE TABLE `akses_sesi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` int(11) DEFAULT NULL,
  `sesi_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `akses_sesi`
--

INSERT INTO `akses_sesi` (`id`, `guru_id`, `sesi_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_essay`
--

CREATE TABLE `detail_essay` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `soal` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_essay`
--

INSERT INTO `detail_essay` (`id`, `kode`, `soal`, `created_at`, `updated_at`) VALUES
(9, '1rhU1EV18odp5wAuVjcfBgj2mpiZsP', '<p>fdsfds</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_ujian`
--

CREATE TABLE `detail_ujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `soal` longtext NOT NULL,
  `pg_1` varchar(255) NOT NULL,
  `pg_2` varchar(255) NOT NULL,
  `pg_3` varchar(255) NOT NULL,
  `pg_4` varchar(255) NOT NULL,
  `pg_5` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_ujian`
--

INSERT INTO `detail_ujian` (`id`, `kode`, `soal`, `pg_1`, `pg_2`, `pg_3`, `pg_4`, `pg_5`, `jawaban`, `created_at`, `updated_at`) VALUES
(54, 'P9hP0xx81Fmfw0U6APtAhAimMZjqeG', '<p>dasd</p>', 'A. asd', 'B. sad', 'C. dasd', 'D. dasdas', 'E. dasd', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `email_settings`
--

CREATE TABLE `email_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notif_akun` int(11) NOT NULL DEFAULT 1,
  `notif_materi` int(11) NOT NULL DEFAULT 1,
  `notif_tugas` int(11) NOT NULL DEFAULT 1,
  `notif_ujian` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `email_settings`
--

INSERT INTO `email_settings` (`id`, `notif_akun`, `notif_materi`, `notif_tugas`, `notif_ujian`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 0, 0, '2023-07-23 06:01:34', '2023-07-22 23:02:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `essay_siswa`
--

CREATE TABLE `essay_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detail_ujian_id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `jawaban` longtext DEFAULT NULL,
  `ragu` tinyint(1) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `essay_siswa`
--

INSERT INTO `essay_siswa` (`id`, `detail_ujian_id`, `kode`, `siswa_id`, `jawaban`, `ragu`, `nilai`) VALUES
(7, 9, '1rhU1EV18odp5wAuVjcfBgj2mpiZsP', 1, 'sdad', NULL, NULL);

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
-- Struktur dari tabel `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `files`
--

INSERT INTO `files` (`id`, `kode`, `nama`) VALUES
(1, 'KYSb6LInLuRTyOS4EZtd', 'kRDDINJcQsz81yTBswG1x4IAjm1BlkzF8b3RCo1a.xlsx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nama_guru`, `gender`, `email`, `password`, `avatar`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'beni', 'Laki - Laki', 'beni@gmail.com', '$2y$10$GDO2ZWebMtw6.9rGaVOPwuqPCkM0YmJyJ4eNZDAcwxooMZVtb44la', 'vScMctLkMNlcIh0mhuZ3RzpPir3SpFSxfO8yzdQz.png', 2, 1, '2023-07-23 11:12:15', '2023-07-25 05:08:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurukelas`
--

CREATE TABLE `gurukelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurukelas`
--

INSERT INTO `gurukelas` (`id`, `guru_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurumapel`
--

CREATE TABLE `gurumapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurumapel`
--

INSERT INTO `gurumapel` (`id`, `guru_id`, `mapel_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'IPA 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok_belajar`
--

CREATE TABLE `kelompok_belajar` (
  `id_kelompok` int(10) UNSIGNED NOT NULL,
  `nama_kelompok` varchar(255) NOT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_guru` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelompok_belajar`
--

INSERT INTO `kelompok_belajar` (`id_kelompok`, `nama_kelompok`, `id_kelas`, `created_at`, `updated_at`, `id_guru`) VALUES
(16, 'Kelompok IPA 2 1', 1, '2023-07-23 18:55:16', '2023-07-23 18:55:16', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok_belajar_siswa`
--

CREATE TABLE `kelompok_belajar_siswa` (
  `id_kelompok` int(10) UNSIGNED NOT NULL,
  `nis_siswa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelompok_belajar_siswa`
--

INSERT INTO `kelompok_belajar_siswa` (`id_kelompok`, `nis_siswa`) VALUES
(16, '123'),
(16, '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `km_materi`
--

CREATE TABLE `km_materi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `sesi_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `nama_materi` varchar(255) NOT NULL,
  `teks` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `km_materi`
--

INSERT INTO `km_materi` (`id`, `kode`, `guru_id`, `sesi_id`, `kelas_id`, `mapel_id`, `nama_materi`, `teks`, `created_at`, `updated_at`) VALUES
(1, 'KYSb6LInLuRTyOS4EZtd', 1, 2, 1, 1, 'tes', '<p><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/M88bldZeSwI\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><br></p>', '2023-07-23 19:09:40', '2023-07-25 08:22:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `km_tugas`
--

CREATE TABLE `km_tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `nama_tugas` varchar(255) NOT NULL,
  `teks` longtext NOT NULL,
  `due_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `km_tugas`
--

INSERT INTO `km_tugas` (`id`, `kode`, `guru_id`, `kelas_id`, `mapel_id`, `nama_tugas`, `teks`, `due_date`, `created_at`, `updated_at`) VALUES
(1, 'kJNZxbO8phZvbXTkANFZ', 1, 1, 1, 'tes', 'dasdas', '2023-07-25 03:02', '2023-07-23 19:11:33', '2023-07-23 19:11:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
(1, 'Bahasa Indonesia', NULL, NULL);

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
(1, '2022_10_25_012443_create_admins_table', 1),
(2, '2022_10_26_103328_create_guru_table', 1),
(3, '2022_10_26_104202_create_kelas_table', 1),
(4, '2022_10_26_104356_create_mapel_table', 1),
(5, '2022_10_26_121058_create_siswa_table', 1),
(6, '2022_11_01_103811_create_gurukelas_table', 1),
(7, '2022_11_01_133312_create_gurumapel_table', 1),
(8, '2022_11_02_184631_create_jobs_table', 1),
(9, '2022_11_03_110958_create_failed_jobs_table', 1),
(10, '2022_11_03_143730_create_tokens_table', 1),
(11, '2022_11_03_193550_create_materi_table', 1),
(12, '2022_11_04_091643_create_notifications_table', 1),
(13, '2022_11_04_093007_create_files_table', 1),
(14, '2022_11_07_065814_create_tugas_table', 1),
(15, '2022_11_07_071028_create_userchats_table', 1),
(16, '2022_11_07_080719_create_tugas_siswas_table', 1),
(17, '2022_11_08_182844_create_ujians_table', 1),
(18, '2022_11_08_184638_create_detail_ujians_table', 1),
(19, '2022_11_09_102442_create_pg_siswas_table', 1),
(20, '2022_11_09_122021_create_waktu_ujians_table', 1),
(21, '2022_11_13_205830_create_detail_essays_table', 1),
(22, '2022_11_14_082908_create_essay_siswas_table', 1),
(23, '2022_11_14_183529_create_email_settings_table', 1),
(24, '2023_06_09_222541_create_kelompok_belajar_table', 1),
(25, '2023_06_12_174724_create_sesi_table', 1),
(26, '2023_06_14_075029_add_column_to_table', 1),
(27, '2023_06_14_075439_add_column_to_table_kb', 1),
(28, '2023_06_14_112010_create_akses_sesi_table', 1),
(29, '2023_06_18_233459_rename_table_materi_to_km_materi', 1),
(30, '2023_06_18_235159_create_km_tugas_table', 1),
(32, '2023_07_28_113530_tb_absen_siswa', 2),
(33, '2023_07_31_151309_absen_guru', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `nama`, `siswa_id`, `key`, `kode`) VALUES
(2, 'tes', 2, 'materi', 'KYSb6LInLuRTyOS4EZtd'),
(3, 'tes', 3, 'materi', 'KYSb6LInLuRTyOS4EZtd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pg_siswa`
--

CREATE TABLE `pg_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detail_ujian_id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `benar` tinyint(1) DEFAULT NULL,
  `ragu` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pg_siswa`
--

INSERT INTO `pg_siswa` (`id`, `detail_ujian_id`, `kode`, `siswa_id`, `jawaban`, `benar`, `ragu`) VALUES
(91, 54, 'P9hP0xx81Fmfw0U6APtAhAimMZjqeG', 1, 'D', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sesi`
--

CREATE TABLE `sesi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_sesi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_guru` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sesi`
--

INSERT INTO `sesi` (`id`, `nama_sesi`, `deskripsi`, `created_at`, `updated_at`, `id_guru`) VALUES
(2, 'bahasa', 'sadsda', NULL, '2023-07-23 18:13:19', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama_siswa`, `gender`, `kelas_id`, `email`, `password`, `avatar`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '123456', 'beni', 'Laki - Laki', 1, 'beniketaren@gmail.com', '$2y$10$RIzIf48n4KqAEBzgLKbgL.9P4kjnZz0G1rQbqrs.5pwlq2budR.q6', 'default.png', 3, 1, '2023-07-04 02:54:44', '2023-07-09 02:54:49'),
(3, '123', 'tes123', 'Laki - Laki', 1, 'tes123@gmail.com', '$2y$10$LMkuUY5m481DNEZn.9g6dunD/c1hYMp4BaApmV6O2yqTxYvIKBGvO', 'default.png', 3, 1, '2023-07-10 02:54:57', '2023-07-10 02:54:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `nama_tugas` varchar(255) NOT NULL,
  `teks` longtext NOT NULL,
  `due_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_siswa`
--

CREATE TABLE `tugas_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `teks` longtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `date_send` varchar(255) DEFAULT NULL,
  `is_telat` tinyint(1) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `catatan_guru` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tugas_siswa`
--

INSERT INTO `tugas_siswa` (`id`, `kode`, `siswa_id`, `teks`, `file`, `date_send`, `is_telat`, `nilai`, `catatan_guru`, `created_at`, `updated_at`) VALUES
(1, 'kJNZxbO8phZvbXTkANFZ', 1, 'dasdas', 'WSqPDEpSaB5AC4IYBkNn', '2023-07-24 04:54:13', 0, 100, 'jawaban tidak boleh asal asalan', NULL, '2023-07-23 21:55:27'),
(3, 'kJNZxbO8phZvbXTkANFZ', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `jam` int(11) DEFAULT NULL,
  `menit` int(11) DEFAULT NULL,
  `acak` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`id`, `kode`, `nama`, `jenis`, `guru_id`, `kelas_id`, `mapel_id`, `materi_id`, `jam`, `menit`, `acak`, `created_at`, `updated_at`) VALUES
(13, 'P9hP0xx81Fmfw0U6APtAhAimMZjqeG', 'dsad', 0, 1, 1, 1, 1, NULL, NULL, 1, NULL, NULL),
(14, '1rhU1EV18odp5wAuVjcfBgj2mpiZsP', 'dsadas', 1, 1, 1, 1, 1, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `userchat`
--

CREATE TABLE `userchat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `chat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `userchat`
--

INSERT INTO `userchat` (`id`, `key`, `email`, `chat`, `created_at`, `updated_at`) VALUES
(1, 'KYSb6LInLuRTyOS4EZtd', 'beniketaren@gmail.com', 'semd', '2023-07-25 03:04:01', '2023-07-25 03:04:01'),
(2, 'KYSb6LInLuRTyOS4EZtd', 'beni@gmail.com', 'semua materi bisa dipahami kan?', '2023-07-25 03:07:12', '2023-07-25 03:07:12'),
(3, 'KYSb6LInLuRTyOS4EZtd', 'beniketaren@gmail.com', 'tes', '2023-07-27 04:19:29', '2023-07-27 04:19:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_ujian`
--

CREATE TABLE `waktu_ujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `waktu_berakhir` varchar(255) DEFAULT NULL,
  `selesai` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `waktu_ujian`
--

INSERT INTO `waktu_ujian` (`id`, `kode`, `siswa_id`, `waktu_berakhir`, `selesai`) VALUES
(25, 'P9hP0xx81Fmfw0U6APtAhAimMZjqeG', 1, '1970-01-01 7:00', 1),
(26, 'P9hP0xx81Fmfw0U6APtAhAimMZjqeG', 3, NULL, NULL),
(27, '1rhU1EV18odp5wAuVjcfBgj2mpiZsP', 1, '1970-01-01 7:00', 1),
(28, '1rhU1EV18odp5wAuVjcfBgj2mpiZsP', 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_guru`
--
ALTER TABLE `absen_guru`
  ADD PRIMARY KEY (`idAbsen`);

--
-- Indeks untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD PRIMARY KEY (`idAbsen`);

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `akses_sesi`
--
ALTER TABLE `akses_sesi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_essay`
--
ALTER TABLE `detail_essay`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_ujian`
--
ALTER TABLE `detail_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `essay_siswa`
--
ALTER TABLE `essay_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guru_email_unique` (`email`);

--
-- Indeks untuk tabel `gurukelas`
--
ALTER TABLE `gurukelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gurumapel`
--
ALTER TABLE `gurumapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelompok_belajar`
--
ALTER TABLE `kelompok_belajar`
  ADD PRIMARY KEY (`id_kelompok`),
  ADD KEY `kelompok_belajar_id_kelas_foreign` (`id_kelas`),
  ADD KEY `kelompok_belajar_id_guru_foreign` (`id_guru`);

--
-- Indeks untuk tabel `kelompok_belajar_siswa`
--
ALTER TABLE `kelompok_belajar_siswa`
  ADD PRIMARY KEY (`id_kelompok`,`nis_siswa`),
  ADD KEY `kelompok_belajar_siswa_nis_siswa_foreign` (`nis_siswa`);

--
-- Indeks untuk tabel `km_materi`
--
ALTER TABLE `km_materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `km_tugas`
--
ALTER TABLE `km_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pg_siswa`
--
ALTER TABLE `pg_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sesi_id_guru_foreign` (`id_guru`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`),
  ADD UNIQUE KEY `siswa_email_unique` (`email`);

--
-- Indeks untuk tabel `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `userchat`
--
ALTER TABLE `userchat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `waktu_ujian`
--
ALTER TABLE `waktu_ujian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_guru`
--
ALTER TABLE `absen_guru`
  MODIFY `idAbsen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  MODIFY `idAbsen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `akses_sesi`
--
ALTER TABLE `akses_sesi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_essay`
--
ALTER TABLE `detail_essay`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `detail_ujian`
--
ALTER TABLE `detail_ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `essay_siswa`
--
ALTER TABLE `essay_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `gurukelas`
--
ALTER TABLE `gurukelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `gurumapel`
--
ALTER TABLE `gurumapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kelompok_belajar`
--
ALTER TABLE `kelompok_belajar`
  MODIFY `id_kelompok` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `km_materi`
--
ALTER TABLE `km_materi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `km_tugas`
--
ALTER TABLE `km_tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pg_siswa`
--
ALTER TABLE `pg_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `sesi`
--
ALTER TABLE `sesi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `userchat`
--
ALTER TABLE `userchat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `waktu_ujian`
--
ALTER TABLE `waktu_ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelompok_belajar`
--
ALTER TABLE `kelompok_belajar`
  ADD CONSTRAINT `kelompok_belajar_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `kelompok_belajar_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelompok_belajar_siswa`
--
ALTER TABLE `kelompok_belajar_siswa`
  ADD CONSTRAINT `kelompok_belajar_siswa_id_kelompok_foreign` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok_belajar` (`id_kelompok`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelompok_belajar_siswa_nis_siswa_foreign` FOREIGN KEY (`nis_siswa`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sesi`
--
ALTER TABLE `sesi`
  ADD CONSTRAINT `sesi_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
