-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 12:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mustore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(3, 'dahab', 'dahab@gmail.com', '$2y$12$Sqy1JVC7sBdFBwi40U5kSe10xyjRA7f6AJp/GcTHMxk.LVUxR52gW', '2024-12-19 22:37:38', '2024-12-19 22:37:38'),
(6, 'Mu', 'muadmin@gmail.com', '$2y$12$u.0gU5THoSRY7EIF4u3QrOPnvKOLODWz81clt.SZ8KW8Ui3uB7OXW', '2024-12-21 17:29:54', '2024-12-21 17:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('mu@gmail.com|127.0.0.1', 'i:2;', 1734406687),
('mu@gmail.com|127.0.0.1:timer', 'i:1734406687;', 1734406687);

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` varchar(20) NOT NULL,
  `qty` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `subtotal` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category_desc` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `category_desc`, `image`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Meats', 'Protein Rich Ingridients From Local Farmers', 'meats.jpg', 'roast-leg', '2024-12-08 14:28:02', '2024-12-08 14:28:02'),
(2, 'Fishes', 'Protein Rich Ingridients From Local Farmers', 'fish.jpg', 'fish-1', '2024-12-08 14:28:02', '2024-12-08 14:28:02'),
(3, 'Frozen Foods', 'Protein Rich Ingridients From Local Farmers', 'frozen.jpg', 'french-fries', '2024-12-08 14:29:20', '2024-12-08 14:29:20'),
(4, 'Fruits', 'Variety of Fruits From Local Growers', 'fruits.jpg', 'apple', '2024-12-08 14:29:20', '2024-12-08 14:29:20'),
(5, 'Packages', 'Protein Rich Ingridients From Local Farmers', 'package.jpg', 'appetizer', '2024-12-09 05:10:44', '2024-12-09 05:10:44'),
(6, 'Vegetables', 'Freshly Harvested Veggies From Local Growers', 'vegetables.jpg', 'carrot', '2024-12-09 05:11:39', '2024-12-21 19:06:06');

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
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `town` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zip_code` int(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `price` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_notes` text NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `last_name`, `address`, `town`, `state`, `zip_code`, `email`, `phone_number`, `price`, `user_id`, `order_notes`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Muhammad', 'Gamal', 'Appropriately empower go forward technology and backward-compatible e-markets. Holisticly initiate premier technologies without user friendly applications. Monotonectally predominate reliable.', 'Alexandria', 'Egypt', 1111, 'testj928@gmail.com', '01049492424', '1620', 1, 'Dynamically disintermediate dynamic e-tailers and tactical communities. Collaboratively synthesize cutting-edge portals without excellent architectures. Professionally negotiate low-risk high-yield meta-services without web-enabled total linkage. Efficiently formulate cross-platform functionalities via dynamic information. Compellingly re-engineer highly efficient partnerships whereas web-enabled process improvements.\r\n\r\nCompletely conceptualize inexpensive opportunities via top-line.', 'Processing', '2024-12-14 19:27:15', '2024-12-14 19:27:15'),
(10, 'Test', 'Test', 'Test', 'Test', 'قنا', 1111, 'testj928@gmail.com', '012912244', '520', 1, 'Test Ordere Notes', 'Processing', '2024-12-14 21:08:40', '2024-12-14 21:08:40'),
(11, 'Test', 'Test', 'Test', 'Test', 'قنا', 1111, 'testj928@gmail.com', '0100399388', '520', 1, 'Test asdad', 'Processing', '2024-12-14 21:14:36', '2024-12-14 21:14:36'),
(12, 'Test', 'Test', 'Test', 'Test', 'قنا', 1111, 'testj928@gmail.com', '125125', '1020', 1, 'sdgsdgsdg', 'Processing', '2024-12-14 21:19:09', '2024-12-14 21:19:09'),
(13, 'Test', 'Test', 'Test', 'Test', 'Testawy', 1111, 'testj928@gmail.com', '22331212', '620', 1, 'Order Notes', 'Processing', '2024-12-17 00:47:18', '2024-12-17 00:47:18'),
(15, 'Test', 'Test', 'Test', 'Test', 'قنا', 1111, 'testj928@gmail.com', '887', '120', 1, 'Test', 'Processing', '2024-12-18 23:02:51', '2024-12-18 23:02:51'),
(16, 'Test', 'Test', 'Test', 'Test', 'قنا', 1111, 'testj928@gmail.com', '125125', '120', 1, 'sdgsdg', 'Processing', '2024-12-19 00:28:39', '2024-12-21 21:52:36'),
(17, 'Test', 'Test', 'Test', 'Test', 'قنا', 1111, 'testj928@gmail.com', '125125', '370', 1, 'adsgagasg', 'Compeleted', '2024-12-19 00:29:12', '2024-12-21 21:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `exp_date` varchar(30) NOT NULL,
  `category_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `exp_date`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'La7ma Mafroma', 'meats.jpg', 'Completely underwhelm web-enabled systems before effective imperatives. Authoritatively whiteboard empowered e-services without cross-platform imperatives. Conveniently evolve market positioning paradigms via client-centric data. Monotonectally orchestrate mission-critical technology vis-a-vis adaptive leadership skills. Credibly integrate strategic e-tailers before cutting-edge convergence.\r\n\r\nObjectively iterate granular imperatives before wireless users. Credibly.', '200', '2025', 1, '2024-12-09 02:39:15', '2024-12-09 02:39:15');

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
('5st4jiWJi9SronoiCpFCM6pTRzGrgtEF5XvIJY4U', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYnRlbHhKanZMWE4yVzJ4ZzM0NnltMXRlZTJydUFDZkF5U1lpVEhIMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9vcmRlcnMiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7fQ==', 1734825324);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `fullName` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `postal` int(20) DEFAULT NULL,
  `phone` int(40) DEFAULT NULL,
  `image` varchar(200) DEFAULT 'web-coding.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `fullName`, `address`, `city`, `country`, `postal`, `phone`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mu', 'admin@gmail.com', NULL, '$2y$12$Sqy1JVC7sBdFBwi40U5kSe10xyjRA7f6AJp/GcTHMxk.LVUxR52gW', 'S4TD9oiPMGRyQNCC450YVQIc5EhUQnDDaojb45s7KzXczp1pqdTNSPvF8Imn', 'Muhammad Gamal', 'Test', 'Live', 'Testawyawy', 0, 0, 'web-coding.png', '2024-12-07 21:41:33', '2024-12-17 18:42:18'),
(2, 'Test Test', 'testj928@gmail.com', NULL, '$2y$12$Sqy1JVC7sBdFBwi40U5kSe10xyjRA7f6AJp/GcTHMxk.LVUxR52gW', NULL, '', '', '', '', 0, 0, 'web-coding.png', '2024-12-08 11:57:28', '2024-12-08 11:57:28'),
(4, 'testawy', 'testawy@gmail.com', NULL, '$2y$12$Kw0sAVtqsoXheUgizk1yVOjCpqbx0ax1kMs6A79Q.DhwCbbSpAlIe', NULL, 'Test Test', 'Test', 'Test', 'Switzerland', 1111, 12125, 'web-coding.png', '2024-12-19 00:30:46', '2024-12-19 00:30:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
