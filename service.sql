-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 01:47 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_label` tinyint(4) NOT NULL COMMENT '1 for provider\r\n2 for customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `address`, `password`, `access_label`, `created_at`, `updated_at`) VALUES
(1, 'Luke farguson', 'luke@gmail.com', '0128849284884', 'New York', '$2y$10$ScZq6OkPsvqOVRyowMgDuuna1vnr7qwlZne4iUr3H6FVIq67BexNa', 1, '2021-06-16 05:57:04', '2021-06-16 05:57:04'),
(2, 'David Walker', 'david@gmail.com', '02392849832', 'New York', '$2y$10$/Q/KpD0N4EJjKtHINEf36O6K5JvddfnWZPOEfnQhEyQd.BLbb8HEK', 1, '2021-06-16 15:20:10', '2021-06-16 15:20:10'),
(3, 'Adam', 'adam@gmail.com', '012881828838', 'New York', '$2y$10$MT2pXXlVqORQmkEeoCRAR.bzG/RYPUHpVmyo1RWRd9d1CFCbWznt2', 2, '2021-06-16 15:47:06', '2021-06-16 15:47:06'),
(4, 'abd', 'abd@gmail.com', '00129909393', 'New York', '$2y$10$t0GAB1.WYSLGJ3IpoPGxGu58UsT.fchPaKHH/na1.lwqFcFB9Byqu', 2, '2021-06-18 08:34:49', '2021-06-18 08:34:49'),
(5, 'Mr. Service Provider', 'serviceprovider@gmail.com', '012901920993', 'uttara', '$2y$10$DyGj3WOyTj7JRUWfzxjhA.PpK/I26FONrhSRMo1xOke6e/5JmK5wO', 1, '2021-06-19 04:27:27', '2021-06-19 04:27:27'),
(6, 'Mr. Raihan', 'raihan@gmail.com', '01749969029', 'Banani', '$2y$10$WBCUmb1suHIOn1dOz.w.GeZqqi36ySR7TEsoP9IvTfs7xKXrpd.vK', 2, '2021-06-19 04:30:32', '2021-06-19 04:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `approve` tinyint(4) NOT NULL,
  `post_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `approve`, `post_id`, `provider_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(3, 0, 2, 1, 4, '2021-06-18 14:29:57', '2021-06-18 14:47:45'),
(4, 1, 3, 2, 3, '2021-06-18 15:10:54', '2021-06-18 22:11:51'),
(5, 0, 1, 1, 3, '2021-06-18 22:36:28', '2021-06-18 22:36:28'),
(6, 1, 3, 2, 4, '2021-06-18 22:37:49', '2021-06-18 22:41:07'),
(7, 1, 3, 2, 4, '2021-06-18 22:40:33', '2021-06-18 22:41:13'),
(8, 1, 6, 2, 4, '2021-06-19 04:24:11', '2021-06-19 04:24:46'),
(9, 0, 6, 2, 4, '2021-06-19 04:24:53', '2021-06-19 04:24:53'),
(10, 1, 7, 5, 6, '2021-06-19 04:32:37', '2021-06-19 04:33:29'),
(11, 0, 7, 5, 6, '2021-06-19 04:33:37', '2021-06-19 04:33:37');

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `provider_id`, `customer_id`, `post_id`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(135, 3, 1, 1, 'hei luke', 0, '2021-06-18 07:55:19', '2021-06-18 07:55:19'),
(136, 3, 1, 1, 'i need plumbing', 0, '2021-06-18 07:55:29', '2021-06-18 07:55:29'),
(137, 1, 3, 1, 'ok adam', 0, '2021-06-18 08:22:41', '2021-06-18 08:22:41'),
(138, 1, 3, 1, 'ok adam', 0, '2021-06-18 08:23:18', '2021-06-18 08:23:18'),
(139, 3, 1, 2, 'hi', 0, '2021-06-18 08:24:26', '2021-06-18 08:24:26'),
(140, 3, 1, 1, 'i will charge 20 dollar per hour', 0, '2021-06-18 08:30:17', '2021-06-18 08:30:17'),
(141, 3, 1, 2, 'hi i need home clean', 0, '2021-06-18 08:31:14', '2021-06-18 08:31:14'),
(142, 3, 1, 2, 'for 2000sqft house', 0, '2021-06-18 08:32:02', '2021-06-18 08:32:02'),
(143, 1, 3, 2, 'okkk adam i will available to do this', 0, '2021-06-18 08:32:22', '2021-06-18 08:32:22'),
(144, 3, 2, 3, 'hey david i need an electrician', 0, '2021-06-18 08:33:43', '2021-06-18 08:33:43'),
(145, 2, 3, 3, 'ok adam', 0, '2021-06-18 08:34:01', '2021-06-18 08:34:01'),
(146, 3, 2, 3, 'hi', 0, '2021-06-18 08:37:06', '2021-06-18 08:37:06'),
(147, 3, 1, 1, 'hi', 0, '2021-06-18 08:37:54', '2021-06-18 08:37:54'),
(148, 4, 1, 1, 'hei luke i need plumber', 0, '2021-06-18 08:40:26', '2021-06-18 08:40:26'),
(149, 4, 1, 1, 'ki', 0, '2021-06-18 08:57:34', '2021-06-18 08:57:34'),
(150, 4, 1, 1, 'hello', 0, '2021-06-18 09:18:35', '2021-06-18 09:18:35'),
(151, 1, 4, 1, 'hi how are you?', 0, '2021-06-18 09:18:57', '2021-06-18 09:18:57'),
(152, 4, 1, 2, 'hi luke?', 0, '2021-06-18 12:07:12', '2021-06-18 12:07:12'),
(153, 1, 4, 2, 'hi?', 0, '2021-06-18 12:07:37', '2021-06-18 12:07:37'),
(154, 4, 1, 2, 'are you available on sunday?', 0, '2021-06-18 12:08:01', '2021-06-18 12:08:01'),
(155, 4, 1, 2, 'yah im available', 0, '2021-06-18 12:08:35', '2021-06-18 12:08:35'),
(156, 3, 2, 3, 'price is $15', 0, '2021-06-18 15:09:29', '2021-06-18 15:09:29'),
(157, 4, 2, 3, 'hi david deal with 30 dollar?', 0, '2021-06-18 22:38:19', '2021-06-18 22:38:19'),
(158, 4, 2, 6, 'hi david', 0, '2021-06-19 04:23:07', '2021-06-19 04:23:07'),
(159, 4, 2, 6, 'hi david how are you', 0, '2021-06-19 04:23:46', '2021-06-19 04:23:46'),
(160, 2, 4, 6, 'hii abd', 0, '2021-06-19 04:23:56', '2021-06-19 04:23:56'),
(161, 6, 5, 7, 'hi mr. service provider', 0, '2021-06-19 04:31:10', '2021-06-19 04:31:10'),
(162, 5, 6, 7, 'i need service at 1500tk', 0, '2021-06-19 04:31:46', '2021-06-19 04:31:46'),
(163, 6, 5, 7, 'i will charge 1700', 0, '2021-06-19 04:32:09', '2021-06-19 04:32:09'),
(164, 5, 6, 7, 'its ok', 0, '2021-06-19 04:32:26', '2021-06-19 04:32:26');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_06_15_181519_create_sessions_table', 1),
(7, '2021_06_15_200155_create_services_table', 2),
(8, '2021_06_16_111539_create_providers_table', 3),
(9, '2021_06_16_114647_create_customers_table', 4),
(10, '2021_06_16_131743_create_posts_table', 5),
(11, '2021_06_16_180037_create_messages_table', 6),
(12, '2021_06_18_191038_create_deals_table', 7);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `provider_id` int(4) NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` tinyint(4) NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `service_id`, `provider_id`, `price`, `description`, `approve`, `long_description`, `image`, `created_at`, `updated_at`) VALUES
(5, 5, 1, 20.00, 'lorem ipsum', 1, 'lorem ipsum lorem ipsum lorem ipsum', 'post-image/1624096754-cert-3.png', '2021-06-19 03:59:14', '2021-06-19 04:01:01'),
(6, 1, 2, 40.00, 'lorem ipsum', 1, 'lorem ipsum lorem ipsum lorem ipsum', 'post-image/1624098070-cert-2.png', '2021-06-19 04:21:10', '2021-06-19 04:21:24'),
(7, 1, 5, 2000.00, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'post-image/1624098526-cert-3.png', '2021-06-19 04:28:46', '2021-06-19 04:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `name`, `email`, `mobile`, `address`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Adam James', 'adam@gmail.com', '019283847585', 'New York', '$2y$10$DegvQwiBufToqSDKVmuaYOQFmWBjwftW71sfZnwsba79kE6jlnQoa', '2021-06-16 05:38:16', '2021-06-16 05:38:16'),
(2, 'tom', 'tom@gmail.com', '01224928389', 'Dhaka', '$2y$10$2qvuH2qjy7yPROs8soARu.xcQzrj8Sh5NG/HrntyUf0NMU7SuX5Zm', '2021-06-16 13:12:57', '2021-06-16 13:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Plumber', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur', 1, '2021-06-15 14:15:57', '2021-06-15 14:15:57'),
(2, 'Electrician', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt', 1, '2021-06-15 14:17:11', '2021-06-15 14:36:27'),
(3, 'Home Cleaning', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni', 1, '2021-06-15 14:17:38', '2021-06-15 14:17:38'),
(5, 'Packers', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident', 1, '2021-06-15 14:39:45', '2021-06-15 14:39:45');

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
('5fNumM31EENAzYmBmnOBiauYpT2Jk81Typlj6nZW', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 'YToxMDp7czo2OiJfdG9rZW4iO3M6NDA6IklZYXlWRVV6b0xSZDg1SnE1ZWJkNncyQkJMaDBBWEdzeUpmZmxQdWsiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQxOiJodHRwOi8vbG9jYWxob3N0L3NlcnZpY2UvcHVibGljL3ZpZXctcG9zdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NzoicG9zdF9pZCI7aTo3O3M6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkWHU3Wm5Xc0U1bzBaUWhrck9ZNFZyLmIucjBsbXdTRTBUNUtGRFc2UFBSSTFjMC5pMFpieHUiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFh1N1puV3NFNW8wWlFoa3JPWTRWci5iLnIwbG13U0UwVDVLRkRXNlBQUkkxYzAuaTBaYnh1IjtzOjExOiJwcm92aWRlcl9pZCI7aTo1O3M6MTM6InByb3ZpZGVyX25hbWUiO3M6MjA6Ik1yLiBTZXJ2aWNlIFByb3ZpZGVyIjt9', 1624098890),
('A2VLerzg09VLa5IQo0DwtDZBWm2ppltHMDe8SEhZ', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWEJQOVJyUTkwcmN4bWR6Y0xCcUlmZzY2cXNwQ0FkWHcyMEw1ckFTcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3Qvc2VydmljZS9wdWJsaWMvcG9zdC1kZXRhaWxzLzciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1624102723),
('EQ5MzxpVorvodLEdLaEKj3nVVKPi1VXtu7C1r6ZO', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiV1FvUFpLSkNMUElDeDVkY2dKaXBVNFhzRXVsZHhHNnNBaGsxTFhOOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9sb2NhbGhvc3Qvc2VydmljZS9wdWJsaWMvYWRtaW4tYXBwcm92ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6ODoicHJvdmlkZXIiO2k6NTtzOjc6InBvc3RfaWQiO2k6NztzOjg6ImN1c3RvbWVyIjtpOjU7czoxMToiY3VzdG9tZXJfaWQiO2k6NjtzOjEzOiJjdXN0b21lcl9uYW1lIjtzOjEwOiJNci4gUmFpaGFuIjt9', 1624098817);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@gmail.com', NULL, '$2y$10$Xu7ZnWsE5o0ZQhkrOY4Vr.b.r0lmwSE0T5KFDW6PPRI1c0.i0Zbxu', NULL, NULL, NULL, NULL, NULL, '2021-06-15 12:57:58', '2021-06-15 12:57:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
