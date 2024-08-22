-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2024 at 03:15 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asm`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Áo', '2024-07-25 09:27:41', '2024-07-26 10:51:27'),
(2, 'Quần', '2024-07-25 10:11:03', '2024-08-05 09:01:35');

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
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2024_07_25_114734_create_category_table', 1),
(17, '2024_07_25_124901_create_products_table', 1),
(18, '2024_07_25_154059_update_users_table', 2),
(19, '2024_07_25_211317_rename_users_column', 3),
(20, '2024_07_27_170445_update_users_table', 4),
(21, '2024_07_27_181442_update_users_table', 5),
(22, '2024_08_05_205338_rename_id_user_to_id_in_users_table', 6),
(23, '2024_08_05_205503_create_orders_table', 7),
(24, '2024_08_05_205646_create_order_details_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Đã đặt hàng' COMMENT '1: Đã đặt hàng\r\n2: Đang giao hàng\r\n3: Đã giao hàng\r\n4: Đã hủy',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 27, '29.01', 'pending', '2024-08-05 15:35:47', '2024-08-05 16:07:25'),
(2, 27, '38.12', 'completed', '2024-08-05 15:35:47', '2024-08-05 15:57:56'),
(3, 29, '24.29', 'completed', '2024-08-05 15:35:47', '2024-08-06 05:38:05'),
(4, 27, '48.30', 'canceled', '2024-08-05 15:35:47', '2024-08-05 16:05:12'),
(5, 29, '35.91', 'canceled', '2024-08-05 15:35:47', '2024-08-05 16:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `id_category` int UNSIGNED NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `id_category`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Áo Manchester United mùa giải 2022-2023', 199000.00, 1, 'imageProducts/1721940212.webp', NULL, '2024-07-27 13:47:36'),
(2, 'Quần Manchester United mùa giải 2022-2023', 99000.00, 2, 'imageProducts/1721938784.jfif', '2024-07-25 13:19:44', '2024-07-27 13:48:34'),
(4, 'Áo Manchester United mùa giải 2007-2008 tay ngắn', 129000.00, 1, 'imageProducts/1722016457.webp', '2024-07-26 10:54:17', '2024-07-27 13:47:56'),
(5, 'Áo Manchester United mùa giải 2007-2008 tay dài', 159000.00, 1, 'imageProducts/1722016490.jpg', '2024-07-26 10:54:50', '2024-07-27 13:48:12'),
(6, 'Quần Manchester United mùa giải 2023-2024', 89000.00, 2, 'imageProducts/1722030736.jfif', '2024-07-26 14:52:16', '2024-07-27 13:48:54'),
(8, 'Áo Manchester United sân khách mùa giải 2023-2024', 119000.00, 1, 'imageProducts/1722031752.jfif', '2024-07-26 15:09:12', '2024-07-26 15:09:12'),
(10, 'Áo Manchester United mùa giải 2024-2025', 159000.00, 1, 'imageProducts/1722334642.jfif', '2024-07-30 03:17:22', '2024-07-30 03:17:22'),
(11, 'Áo Manchester United sân khách mùa giải 2022-2023', 129000.00, 1, 'imageProducts/1722334704.jfif', '2024-07-30 03:18:24', '2024-07-30 03:19:01'),
(12, 'Hồ Xuân Đăng 123', 999976.00, 1, 'imageProducts/1722346993.jfif', '2024-07-30 06:42:33', '2024-07-30 06:43:13'),
(13, 'Hồ Xuân Đăng', 9999.00, 2, 'imageProducts/1722951301.jfif', '2024-08-06 06:35:01', '2024-08-06 06:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `fullname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '1: Admin, 2: User',
  `gender` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `phone`, `address`, `role`, `gender`, `password`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`) VALUES
(27, 'Hồ Xuân Đăng', 'hodang204', 'hoda.g204@gmail.com', '0967365963', 'Tu Mục 2 - Yên Thọ - Yên Định - Thanh Hóa', '1', 'on', '$2y$12$ooqE6TMxIP8h0JK7aLS9IeVNGZsns40PteOTapClA1C8vGv7iAfdm', 'bkKVPUM7MV3w6VM697H6MYbmaaQ2ua4NcI8jqvk5NLn9TPd8IBrIcZNnFKUb', '2024-07-27 13:39:12', '2024-08-05 07:11:51', NULL),
(28, 'Nguyễn Thị Vân Anh', 'VanAnhCuteXiu', 'vanh2101@gmail.com', '0396172759', 'Yên Phong - Yên Định - Thanh Hóa', '2', 'on', '$2y$12$sQZed4h1eab7o7wQmC4ZEuIn8GXGgL.pt0aYRKSFBJuCYVl2311xO', 'BfsEXYzvy5xriqrYkqpAoyLy3iNTzj0q8hfMOapgNYGFewgTVT5jYwwavwBG', '2024-07-27 13:54:56', '2024-07-27 13:54:56', NULL),
(29, 'Phạm Viết Quyền', 'quyencuto', 'quyenpv204@gmail.com', '0874374387', 'Yên Hùng - Yên Định- Thanh Hóa', '2', 'on', '$2y$12$iFR2alP2faepevqhCeUaSuj6awYZVCh7WtLBdsERXvkl9s0w9SxcK', 'uGkiElgsUFoRsYYlljljrnhTBPOfxDOdqlh1uVf0IjZSyNGdlZ5ZR0SZRGJr', '2024-07-30 03:14:10', '2024-07-30 03:14:53', NULL),
(30, 'Hồ Xuân Đăng', 'HoXuanDang', 'hoda.g2004@gmail.com', '0967365963', 'Yên định thanh hóa', '2', 'on', '$2y$12$g/uNaUfFAQmkkaDuAAmT/.PXbxRuq8u/d8.qEC1uo4OzHsrZwv88i', 'zyJAbZqCW1wCad6SFSmA7x580EpgEDSTYeghkyvS1pu8VRPWFdMxU8hPW6QV', '2024-07-30 06:32:50', '2024-08-05 11:55:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_category_foreign` (`id_category`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
