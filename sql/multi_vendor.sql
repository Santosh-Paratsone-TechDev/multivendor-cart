-- XAMPP-Lite
-- version 8.4.6
-- https://xampplite.sf.net/
--
-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2026 at 08:33 AM
-- Server version: 11.4.5-MariaDB-log
-- PHP Version: 8.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_vendor`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_15_144048_create_products_table', 1),
(5, '2026_01_15_160230_create_carts_table', 2),
(6, '2026_01_15_160231_create_cart_items_table', 2),
(7, '2026_01_15_160231_create_orders_table', 2),
(8, '2026_01_15_160232_create_order_items_table', 2),
(9, '2026_01_15_160232_create_payments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `vendor_id`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 0.00, 'completed', '2026-01-15 15:02:42', '2026-01-15 15:02:42'),
(3, 5, 2, 500.00, 'paid', '2026-01-15 15:11:49', '2026-01-15 15:11:49'),
(4, 5, 3, 509.00, 'paid', '2026-01-15 15:11:49', '2026-01-15 15:11:49'),
(5, 5, 3, 25000.00, 'paid', '2026-01-15 15:12:39', '2026-01-15 15:12:39'),
(6, 5, 2, 500.00, 'paid', '2026-01-15 15:12:39', '2026-01-15 15:12:39'),
(7, 5, 2, 50000.00, 'paid', '2026-01-15 15:22:04', '2026-01-15 15:22:04'),
(8, 5, 3, 25000.00, 'paid', '2026-01-15 15:22:04', '2026-01-15 15:22:04'),
(9, 5, 2, 4364.00, 'paid', '2026-01-15 15:36:06', '2026-01-15 15:36:06'),
(10, 5, 3, 5727.00, 'paid', '2026-01-15 15:36:06', '2026-01-15 15:36:06'),
(11, 4, 2, 9364.00, 'paid', '2026-01-15 16:15:10', '2026-01-15 16:15:10'),
(12, 4, 3, 4659.00, 'paid', '2026-01-15 16:15:10', '2026-01-15 16:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 3, 2, 500.00, 1, '2026-01-15 15:11:49', '2026-01-15 15:11:49'),
(3, 4, 11, 509.00, 1, '2026-01-15 15:11:49', '2026-01-15 15:11:49'),
(4, 5, 3, 25000.00, 1, '2026-01-15 15:12:39', '2026-01-15 15:12:39'),
(5, 6, 2, 500.00, 1, '2026-01-15 15:12:39', '2026-01-15 15:12:39'),
(6, 7, 1, 50000.00, 1, '2026-01-15 15:22:04', '2026-01-15 15:22:04'),
(7, 8, 3, 25000.00, 1, '2026-01-15 15:22:04', '2026-01-15 15:22:04'),
(8, 9, 5, 4364.00, 1, '2026-01-15 15:36:06', '2026-01-15 15:36:06'),
(9, 10, 9, 275.00, 10, '2026-01-15 15:36:06', '2026-01-15 15:36:06'),
(10, 10, 4, 2977.00, 1, '2026-01-15 15:36:06', '2026-01-15 15:36:06'),
(11, 11, 2, 500.00, 10, '2026-01-15 16:15:10', '2026-01-15 16:15:10'),
(12, 11, 5, 4364.00, 1, '2026-01-15 16:15:10', '2026-01-15 16:15:10'),
(13, 12, 15, 4659.00, 1, '2026-01-15 16:15:10', '2026-01-15 16:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@test.com', '$2y$12$yZbHRJXL78cz1bY.HgemJ.bi.ggrU/5jl/kyRK.QUXUpxonn6p1pK', '2026-01-16 01:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','paid') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'paid', '2026-01-15 15:11:49', '2026-01-15 15:11:49'),
(2, 4, 'paid', '2026-01-15 15:11:49', '2026-01-15 15:11:49'),
(3, 5, 'paid', '2026-01-15 15:12:39', '2026-01-15 15:12:39'),
(4, 6, 'paid', '2026-01-15 15:12:39', '2026-01-15 15:12:39'),
(5, 7, 'paid', '2026-01-15 15:22:04', '2026-01-15 15:22:04'),
(6, 8, 'paid', '2026-01-15 15:22:04', '2026-01-15 15:22:04'),
(7, 9, 'paid', '2026-01-15 15:36:06', '2026-01-15 15:36:06'),
(8, 10, 'paid', '2026-01-15 15:36:06', '2026-01-15 15:36:06'),
(9, 11, 'paid', '2026-01-15 16:15:10', '2026-01-15 16:15:10'),
(10, 12, 'paid', '2026-01-15 16:15:10', '2026-01-15 16:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `vendor_id`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 50000.00, 9, 2, '2026-01-15 09:22:39', '2026-01-15 15:22:04'),
(2, 'Mouse', 500.00, 38, 2, '2026-01-15 09:22:39', '2026-01-15 16:15:10'),
(3, 'Phone', 25000.00, 13, 3, '2026-01-15 09:22:39', '2026-01-15 15:22:04'),
(4, 'voluptas', 2977.00, 46, 3, '2026-01-15 10:39:23', '2026-01-15 15:36:06'),
(5, 'ut', 4364.00, 21, 2, '2026-01-15 10:39:23', '2026-01-15 16:15:10'),
(6, 'debitis', 2988.00, 40, 2, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(7, 'est', 2177.00, 35, 2, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(8, 'accusamus', 3187.00, 9, 2, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(9, 'aperiam', 275.00, 16, 3, '2026-01-15 10:39:23', '2026-01-15 15:36:06'),
(10, 'nemo', 676.00, 26, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(11, 'sed', 509.00, 16, 3, '2026-01-15 10:39:23', '2026-01-15 15:11:49'),
(12, 'est', 3264.00, 47, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(13, 'asperiores', 2380.00, 37, 2, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(14, 'hic', 262.00, 41, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(15, 'esse', 4659.00, 29, 3, '2026-01-15 10:39:23', '2026-01-15 16:15:10'),
(16, 'nesciunt', 3135.00, 37, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(17, 'exercitationem', 3486.00, 43, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(18, 'dolorem', 3428.00, 5, 2, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(19, 'rerum', 4086.00, 47, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(20, 'odio', 3542.00, 20, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(21, 'vel', 3032.00, 45, 2, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(22, 'consequatur', 1125.00, 32, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(23, 'sed', 3208.00, 23, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(24, 'odit', 4364.00, 18, 2, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(25, 'suscipit', 1470.00, 45, 2, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(26, 'excepturi', 1038.00, 6, 2, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(27, 'eveniet', 1452.00, 35, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(28, 'aspernatur11', 2899.00, 23, 3, '2026-01-15 10:39:23', '2026-01-15 16:48:09'),
(29, 'voluptatem', 2799.00, 18, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(30, 'maiores', 2137.00, 36, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(31, 'architecto', 3230.00, 11, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(32, 'cupiditate', 4799.00, 26, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(33, 'voluptatibus', 3552.00, 37, 3, '2026-01-15 10:39:23', '2026-01-15 10:39:23'),
(34, 'Test admin Prod', 1234.00, 129, 2, '2026-01-15 16:52:42', '2026-01-15 16:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('EVghXUlAsrbyslEH7UEQ1CRqdCCCzbJ5WBLjful0', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidVZiejMwMW1OWmhoRHlXZm1kUWVmWjJEc3cyV0JibG9TR1pLMEtqMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcm9kdWN0cy9jcmVhdGUiO3M6NToicm91dGUiO3M6MjE6ImFkbWluLnByb2R1Y3RzLmNyZWF0ZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1768515846),
('JVET6MogJrmuP7XdEpXZCz43LWSBVkGFoR1LvsEy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieDhiS3c5N1RPYzVKdHJKV1dHdXBxanQ5Q2hQTVBKeVUzckZ0bVdhYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9fQ==', 1768552090);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer','vendor') NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@test.com', NULL, '$2y$12$4fHG232/0sANSiYOEHuyJezjAzyOPdMpZnnyw3hPUOkmOor2kAwgm', 'admin', NULL, '2026-01-15 09:22:38', '2026-01-15 09:22:38'),
(2, 'Vendor One', 'vendor1@test.com', NULL, '$2y$12$hNT6UGLX1OAGZCDq7RFpp.HjriBqrJ6im6HYFwzObBf8EBcR6Mylm', 'vendor', NULL, '2026-01-15 09:22:38', '2026-01-15 09:22:38'),
(3, 'Vendor Two', 'vendor2@test.com', NULL, '$2y$12$rJrOPnCRYoqyPEvFgygZ9uinqx/U3EFSw2TR/eUuCc8aqgTFYwnSO', 'vendor', NULL, '2026-01-15 09:22:38', '2026-01-15 09:22:38'),
(4, 'Customer', 'customer@test.com', NULL, '$2y$12$bKhBEUsxf.SXenkX4et4KOHcEvNhAK6Bo0LA/UJGQ5qlxQdv7ERP2', 'customer', NULL, '2026-01-15 09:22:38', '2026-01-15 09:22:38'),
(5, 'Santosh', 'santoshpaskanti@gmail.com', NULL, '$2y$12$k7.NDyuJauLRDFpxcX.zaOdcvZubjZ/SYGga8D3JwzwscYo5iOyka', 'customer', 'C7JPJRM9MoBm9YeOfrSwlDKXwKQp1SFIPEeS3rFFkd3DKMrAvuxfVnaTmojx', '2026-01-15 13:27:26', '2026-01-15 13:27:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
