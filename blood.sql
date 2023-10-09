-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2023 at 11:14 AM
-- Server version: 8.0.34-0ubuntu0.22.04.1
-- PHP Version: 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_25_061030_create_pages_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `created_at`, `updated_at`, `status`) VALUES
(4, 'dfdd', '2023-09-25 04:33:17', '2023-09-25 04:33:17', '1'),
(5, 'br', '2023-09-25 04:35:38', '2023-09-25 05:11:11', '1'),
(6, 'br1', '2023-09-25 04:45:58', '2023-09-25 05:11:04', '1'),
(7, 'br11', '2023-09-25 05:03:41', '2023-09-25 05:03:41', '1'),
(8, 'br112', '2023-09-25 05:03:51', '2023-09-25 05:03:51', '1');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'brpatel123', 'brp@gmail.com', NULL, '$2y$10$BQBrNMQS8bRzQnbVInUF9.fgQuttMVkPGNNeO6hyi.vBTGoWyz2R6', NULL, '2023-09-19 13:04:28', '2023-09-25 05:39:42'),
(2, 'ddddddd', 'asdas@gmail.com', NULL, '$2y$10$PP1N1q7S48Iw1WIPe.MuyeT1a2076f1CAkLRumecGV6uEjVIvl502', NULL, '2023-09-20 10:08:21', '2023-09-21 10:17:11'),
(6, 'brpatel', 'brp@gmail.com1', NULL, '$2y$10$BQBrNMQS8bRzQnbVInUF9.fgQuttMVkPGNNeO6hyi.vBTGoWyz2R6', NULL, '2023-09-19 13:04:28', '2023-09-25 05:14:04'),
(7, 'ddddddd', 'asdas@gmail.com1', NULL, '$2y$10$PP1N1q7S48Iw1WIPe.MuyeT1a2076f1CAkLRumecGV6uEjVIvl502', NULL, '2023-09-20 10:08:21', '2023-09-21 10:17:11'),
(8, 'brpatel', 'brp@gmail.com11', NULL, '$2y$10$BQBrNMQS8bRzQnbVInUF9.fgQuttMVkPGNNeO6hyi.vBTGoWyz2R6', NULL, '2023-09-19 13:04:28', '2023-09-21 10:19:39'),
(9, 'ddddddd', 'asdas@gmail.com11', NULL, '$2y$10$PP1N1q7S48Iw1WIPe.MuyeT1a2076f1CAkLRumecGV6uEjVIvl502', NULL, '2023-09-20 10:08:21', '2023-09-21 10:17:11'),
(10, 'brpatel', 'brp@gmail.com111', NULL, '$2y$10$BQBrNMQS8bRzQnbVInUF9.fgQuttMVkPGNNeO6hyi.vBTGoWyz2R6', NULL, '2023-09-19 13:04:28', '2023-09-21 10:19:39'),
(11, 'ddddddd', 'asdas@gmail.com111', NULL, '$2y$10$PP1N1q7S48Iw1WIPe.MuyeT1a2076f1CAkLRumecGV6uEjVIvl502', NULL, '2023-09-20 10:08:21', '2023-09-21 10:17:11'),
(28, 'brpatel', 'brp@gmail.com111c', NULL, '$2y$10$BQBrNMQS8bRzQnbVInUF9.fgQuttMVkPGNNeO6hyi.vBTGoWyz2R6', NULL, '2023-09-19 13:04:28', '2023-09-21 10:19:39'),
(29, 'ddddddd', 'asdas@gmail.com111s', NULL, '$2y$10$PP1N1q7S48Iw1WIPe.MuyeT1a2076f1CAkLRumecGV6uEjVIvl502', NULL, '2023-09-20 10:08:21', '2023-09-21 10:17:11'),
(30, 'brpatel', 'brp@gmail.com1111', NULL, '$2y$10$BQBrNMQS8bRzQnbVInUF9.fgQuttMVkPGNNeO6hyi.vBTGoWyz2R6', NULL, '2023-09-19 13:04:28', '2023-09-21 10:19:39'),
(31, 'ddddddd', 'asdas@gmail.com1111', NULL, '$2y$10$PP1N1q7S48Iw1WIPe.MuyeT1a2076f1CAkLRumecGV6uEjVIvl502', NULL, '2023-09-20 10:08:21', '2023-09-21 10:17:11'),
(32, 'brpatel', 'brp@gmail.com11111', NULL, '$2y$10$BQBrNMQS8bRzQnbVInUF9.fgQuttMVkPGNNeO6hyi.vBTGoWyz2R6', NULL, '2023-09-19 13:04:28', '2023-09-21 10:19:39'),
(33, 'ddddddd', 'asdas@gmail.com11111', NULL, '$2y$10$PP1N1q7S48Iw1WIPe.MuyeT1a2076f1CAkLRumecGV6uEjVIvl502', NULL, '2023-09-20 10:08:21', '2023-09-21 10:17:11'),
(34, 'brpatel', 'brp@gmail.com111111', NULL, '$2y$10$BQBrNMQS8bRzQnbVInUF9.fgQuttMVkPGNNeO6hyi.vBTGoWyz2R6', NULL, '2023-09-19 13:04:28', '2023-09-21 10:19:39'),
(35, 'pppss', 'asdas@gmail.com111111', NULL, '$2y$10$PP1N1q7S48Iw1WIPe.MuyeT1a2076f1CAkLRumecGV6uEjVIvl502', NULL, '2023-09-20 10:08:21', '2023-09-25 05:06:41');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
