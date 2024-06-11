-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2024 pada 04.40
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
-- Database: `aminvenbrg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Informa', NULL, '2024-04-20 18:05:18', '2024-04-20 18:05:18'),
(2, 'ASUS', NULL, '2024-04-20 18:05:18', '2024-04-20 18:05:18'),
(3, 'Epson', NULL, '2024-04-20 18:05:18', '2024-04-20 18:05:18'),
(4, 'Sinar Dunia', NULL, '2024-04-20 18:05:18', '2024-04-20 18:05:18'),
(5, 'Faber-Castell', NULL, '2024-04-20 18:05:19', '2024-04-20 18:05:19'),
(6, 'Gramedia', NULL, '2024-04-20 18:05:19', '2024-04-20 18:05:19'),
(7, 'Microsoft', NULL, '2024-04-20 18:05:19', '2024-04-20 18:05:19'),
(8, 'Yamaho', 'Motor yamaho', '2024-04-20 19:17:14', '2024-04-20 19:17:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Elektronik', 'Perangkat Elektronik', '2024-04-20 18:05:17', '2024-04-20 19:01:27'),
(2, 'Perabotan', 'Perabotan Dapur dll', '2024-04-20 18:05:18', '2024-04-20 19:01:01'),
(3, 'Alat Tulis', 'Alat Tulis Kantor', '2024-04-20 18:05:18', '2024-04-20 19:01:14'),
(5, 'Kendaraan', 'Kendaraan Operasional', '2024-04-20 19:16:23', '2024-04-20 19:16:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'ALFAZA INDRA', '08767776666', 'Jl. Raya Lampung No. 87', '2024-04-20 19:18:17', '2024-04-20 19:18:17');

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
-- Struktur dari tabel `goods_in`
--

CREATE TABLE `goods_in` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_received` date NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `goods_in`
--

INSERT INTO `goods_in` (`id`, `item_id`, `user_id`, `quantity`, `date_received`, `invoice_number`, `created_at`, `updated_at`, `supplier_id`) VALUES
(1, 3, 3, 5, '2024-04-21', 'BRGMSK-1713665982001', '2024-04-20 19:20:07', '2024-04-20 19:20:07', 1),
(2, 2, 3, 40, '2024-04-21', 'BRGMSK-1713666012945', '2024-04-20 19:20:28', '2024-04-20 19:20:28', 1),
(3, 2, 2, 34, '2024-04-21', 'BRGMSK-1713666310961', '2024-04-20 19:25:30', '2024-04-20 19:25:30', 2),
(4, 4, 2, 21, '2024-04-21', 'BRGMSK-1713666406805', '2024-04-20 19:27:00', '2024-04-20 19:27:00', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `goods_out`
--

CREATE TABLE `goods_out` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `date_out` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `goods_out`
--

INSERT INTO `goods_out` (`id`, `item_id`, `user_id`, `quantity`, `invoice_number`, `date_out`, `created_at`, `updated_at`, `customer_id`) VALUES
(1, 3, 3, 1, 'BRGMSK-1713666112854', '2024-04-21', '2024-04-20 19:22:07', '2024-04-20 19:22:07', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `name`, `image`, `code`, `price`, `quantity`, `created_at`, `updated_at`, `category_id`, `unit_id`, `brand_id`) VALUES
(1, 'LED TV 50in', 'tXYZUXACqnpBrIsaH4RtarH0e6YjO20RNXI79ToK.jpg', 'BRG-1713664944084', 'RP.35.000.000', 0, '2024-04-20 19:05:35', '2024-04-20 19:14:04', 1, 1, 2),
(2, 'Infokus', 'zuAGcJrhI0xVxky023MfTCrdtrLcEU7SvoFYOsuX.jpg', 'BRG-1713665726200', 'RP.5.000.000', 0, '2024-04-20 19:15:58', '2024-04-20 19:15:58', 1, 1, 1),
(3, 'Motor', 'cmx4w3rX9LJknvSsoovIy2PbursKloq7ke2Upc6K.jpg', 'BRG-1713665840900', 'RP.14.500.000', 0, '2024-04-20 19:17:43', '2024-04-20 19:17:43', 5, 1, 8),
(4, 'Motor 3 Tak', 'X2DBn68P30yTMQ97kpcsRiAsNWwOLHUaOkz6OS40.jpg', 'BRG-1713666347333', 'RP.25.000.000', 0, '2024-04-20 19:26:34', '2024-04-20 19:26:34', 5, 1, 8);

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
-- Struktur dari tabel `job_batches`
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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_03_22_130428_create_users_table', 1),
(4, '2024_03_22_130447_create_sessions_table', 1),
(5, '2024_03_22_130636_create_roles_table', 1),
(6, '2024_03_22_131346_add_column_role_id_to_users_table', 1),
(7, '2024_03_22_131820_create_items_table', 1),
(8, '2024_03_22_133316_create_categories_table', 1),
(9, '2024_03_22_133546_add_column_category_id_to_items_table', 1),
(10, '2024_03_22_133957_create_goods_in_table', 1),
(11, '2024_03_22_135222_create_suppliers_table', 1),
(12, '2024_03_22_135815_add_column_suppliers_id_to_goods_in_table', 1),
(13, '2024_03_22_140217_create_goods_out_table', 1),
(14, '2024_03_22_141112_create_customers_table', 1),
(15, '2024_03_22_141536_add_column_customer_id_to_goods_out_table', 1),
(16, '2024_03_22_205604_create_units_table', 1),
(17, '2024_03_22_205756_add_column_unit_id_to_items_table', 1),
(18, '2024_03_23_081721_create_brands_table', 1),
(19, '2024_03_23_081842_add_column_brand_id_to_items_table', 1),
(20, '2024_03_27_095427_create_settings_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` enum('admin','super_admin','staff') NOT NULL DEFAULT 'staff',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', '2024-04-20 18:05:14', '2024-04-20 18:05:14'),
(2, 'admin', '2024-04-20 18:05:14', '2024-04-20 18:05:14'),
(3, 'staff', '2024-04-20 18:05:14', '2024-04-20 18:05:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('a2QEl531NKFZCUFWOVs1x1QlI8MiM50MTtvxMjFq', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaUNPOFYzREhFUmZnNFdNZXYzOUdncHZmN0VyUXBjczIzbmlEc3FidyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1713666819),
('adq9HB0HjxAw8S7DBOxDrnt8Q32AVEBonN6JtooI', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRDZ4RU5LOXJmRWtNWURJWGVyckhIdVpHT0kwZFNoekVSTXpDSXJKRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1713667248);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`config`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `config`, `created_at`, `updated_at`) VALUES
(1, '{\"web\":{\"title\":\"Management Barang\",\"icon\":\"icon.jpg\",\"description\":\"aplikasi sistem inforamsi barang\"},\"roles\":{\"super_admin\":{\"transaction\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"report\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"item\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"customer\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"supplier\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"staff\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"web\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"admin\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true}},\"admin\":{\"transaction\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"report\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"item\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"customer\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"supplier\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"staff\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"web\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"admin\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true}},\"staff\":{\"transaction\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"report\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"item\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"customer\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"supplier\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"staff\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"web\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true},\"admin\":{\"read\":true,\"create\":true,\"update\":true,\"delete\":true}}}}', '2024-04-20 18:05:20', '2024-04-20 18:05:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `phone_number`, `email`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Alfaza Indra', 'Jl. Raya Lampung no. 87', '08777888777', 'alfaza@gmail.com', 'alfaza.com', '2024-04-20 19:19:33', '2024-04-20 19:19:33'),
(2, 'Marsudi', 'Jl. Raya Cilegon No. 22', '087677776', 'marsudi@gmail.com', 'marsudi.com', '2024-04-20 19:24:52', '2024-04-20 19:24:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `units`
--

INSERT INTO `units` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Unit', NULL, '2024-04-20 18:05:19', '2024-04-20 18:05:19'),
(2, 'Rim', NULL, '2024-04-20 18:05:19', '2024-04-20 18:05:19'),
(3, 'Psc', NULL, '2024-04-20 18:05:19', '2024-04-20 18:05:19'),
(4, 'Lisensi', NULL, '2024-04-20 18:05:20', '2024-04-20 18:05:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `username`, `password`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Alfaza Indra', 'VqYK32Xcg7DslJcgxCtq4v6z1dIiCgqSs1CDYWNS.png', 'staff', '$2y$10$r/d.vgI7R6CJOa97NW8bp.IiYWFnUxGIXUtamh.4hEO834v/Cl976', '2024-04-20 18:05:16', '2024-04-20 19:28:26', 3),
(2, 'admin', '9KCbf5BQie1kyf3pSXZ7uVs33Mo3BofJIKiDhNH7.png', 'admin', '$2y$12$7S4BQo/UtAEDTAOYF5twkOaTfONHAGIwOYVVINrpyt8C7FBpNyPjC', '2024-04-20 18:05:16', '2024-04-20 19:40:46', 2),
(3, 'super admin', 'A12cC95MRC0NQNsrMvXEmFMWZOHU1V0oujMJdnji.png', 'super_admin', '$2y$10$r/d.vgI7R6CJOa97NW8bp.IiYWFnUxGIXUtamh.4hEO834v/Cl976', '2024-04-20 18:05:17', '2024-04-20 19:23:15', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `goods_in`
--
ALTER TABLE `goods_in`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `goods_in_invoice_number_unique` (`invoice_number`),
  ADD KEY `goods_in_item_id_foreign` (`item_id`),
  ADD KEY `goods_in_user_id_foreign` (`user_id`),
  ADD KEY `goods_in_supplier_id_foreign` (`supplier_id`);

--
-- Indeks untuk tabel `goods_out`
--
ALTER TABLE `goods_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goods_out_item_id_foreign` (`item_id`),
  ADD KEY `goods_out_user_id_foreign` (`user_id`),
  ADD KEY `goods_out_customer_id_foreign` (`customer_id`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_code_unique` (`code`),
  ADD KEY `items_category_id_foreign` (`category_id`),
  ADD KEY `items_unit_id_foreign` (`unit_id`),
  ADD KEY `items_brand_id_foreign` (`brand_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `goods_in`
--
ALTER TABLE `goods_in`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `goods_out`
--
ALTER TABLE `goods_out`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `goods_in`
--
ALTER TABLE `goods_in`
  ADD CONSTRAINT `goods_in_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `goods_in_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `goods_in_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `goods_out`
--
ALTER TABLE `goods_out`
  ADD CONSTRAINT `goods_out_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `goods_out_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `goods_out_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `items_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
