-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 23, 2023 lúc 10:31 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `name`, `image`, `description`, `content`, `created_at`, `updated_at`) VALUES
(13, 'blog1', 'blog1.jpg', 'blog1', '<p>blog1</p>', '2022-12-22 03:47:15', '2023-04-21 09:55:47'),
(14, 'blog2', 'blog2.jpg', 'blog2', '<p>blog2</p>', '2022-12-22 03:59:15', '2023-04-21 09:56:38'),
(15, 'blog3', 'blog3.jpg', 'blog3', '<p>blog3</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 16px; left: 80.7375px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '2022-12-22 04:29:37', '2023-04-21 10:02:55'),
(22, 'blog4', 'blog4.jpg', 'blog4', '<p>blog4</p>', '2023-04-21 10:04:03', '2023-04-21 10:04:03'),
(23, 'blog5', 'blog5.jpg', 'blog5', '<p>blog5</p>', '2023-04-21 10:04:39', '2023-04-21 10:04:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogcomment`
--

CREATE TABLE `blogcomment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogcomment`
--

INSERT INTO `blogcomment` (`id`, `comment`, `name`, `id_user`, `id_blog`, `image`, `level`, `created_at`, `updated_at`) VALUES
(24, 'asdsad', 'thinh12345', 17, 16, 'images (2).jpg', 0, '2023-01-06 02:48:52', '2023-01-06 02:48:52'),
(27, '11111', 'Lê Viết Thọ', 30, 16, 'tải xuống (4).jpg', 0, '2023-01-06 06:20:25', '2023-01-06 06:20:25'),
(28, 'tra loi', 'Lê Viết Thọ', 30, 16, 'tải xuống (4).jpg', 27, '2023-01-06 06:21:18', '2023-01-06 06:21:18'),
(30, 'adasd', 'Lê Viết Thọ', 30, 16, 'tải xuống (4).jpg', 24, '2023-01-06 06:45:01', '2023-01-06 06:45:01'),
(31, 'traloi1', 'Lê Viết Thọ', 30, 16, 'tải xuống (4).jpg', 24, '2023-01-06 07:04:34', '2023-01-06 07:04:34'),
(32, 'asdad', 'minh', 18, 16, 'images.jpg', 27, '2023-01-06 10:42:09', '2023-01-06 10:42:09'),
(33, 'asdad', 'minh', 18, 16, 'images.jpg', 24, '2023-01-06 10:42:23', '2023-01-06 10:42:23'),
(34, '1231', 'minh', 18, 16, 'images.jpg', 27, '2023-02-25 06:35:18', '2023-02-25 06:35:18'),
(35, 'day ne', 'minh', 18, 16, 'images.jpg', 27, '2023-02-25 06:37:03', '2023-02-25 06:37:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'degrey', '2023-01-10 06:53:04', '2023-01-10 06:53:04'),
(3, 'now', '2023-01-10 06:53:28', '2023-01-10 06:53:28'),
(5, 'bobui', '2023-01-10 06:53:46', '2023-01-10 06:53:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'kid', '2023-01-10 06:28:00', '2023-01-10 06:28:00'),
(4, 'woman', '2023-01-10 06:38:03', '2023-01-10 06:38:03'),
(6, 'man', '2023-01-10 06:38:24', '2023-01-10 06:38:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `country`
--

CREATE TABLE `country` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `country`
--

INSERT INTO `country` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Lào', '2022-12-11 02:59:06', '2022-12-11 02:59:06'),
(3, 'Mỹ', '2022-12-11 02:59:45', '2022-12-11 02:59:45'),
(7, 'Pháp', '2022-12-11 06:48:42', '2022-12-11 06:48:42'),
(11, 'Đức', '2022-12-12 06:18:32', '2022-12-12 06:18:32'),
(12, 'Hà Lan', '2022-12-12 07:14:33', '2022-12-12 07:14:33'),
(13, 'Nhật', '2022-12-12 07:22:34', '2022-12-12 07:22:34'),
(14, 'Hàn Quốc', '2022-12-12 07:23:29', '2022-12-12 07:23:29'),
(16, 'Việt Nam', '2023-04-17 00:56:21', '2023-04-17 00:56:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_05_140507_update_users1_table', 2),
(6, '2022_12_05_140619_update_users2_table', 3),
(7, '2022_12_05_140656_update_users3_table', 4),
(8, '2022_12_05_140931_update_users4_table', 5),
(9, '2022_12_09_135328_create_country_table', 6),
(10, '2022_12_13_153330_create_blog_table', 7),
(11, '2022_12_22_111300_update_blog_table', 8),
(12, '2022_12_23_131819_update_users5_table', 9),
(13, '2022_12_27_074908_create_blogdetail_table', 10),
(14, '2022_12_27_084107_update_blogdetail_table', 11),
(15, '2022_12_30_132024_create_blogcomment_table', 12),
(16, '2023_01_10_131749_create_category_table', 13),
(17, '2023_01_10_132150_update_category_table', 14),
(18, '2023_01_10_132314_update_category1_table', 15),
(19, '2023_01_10_134215_create_brand_table', 16),
(20, '2023_01_11_093840_create_sale_table', 17),
(21, '2023_01_11_140757_create_product_table', 18),
(22, '2023_02_18_104123_create_cart_table', 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_sale` int(11) NOT NULL COMMENT '1:no sale 2:sale',
  `sale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `id_category`, `id_brand`, `id_sale`, `sale`, `company`, `image`, `detail`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'áo sơ mi', '400$', 6, 1, 1, '0', 'sun1', '[\"cach-chup-hinh-san-pham-quan-ao-dep-4.jpg\",\"chup-anh-quan-ao-3.jpg\"]', '123456', 18, '2023-01-13 18:17:18', '2023-04-21 09:20:40'),
(2, 'áo house', '600$', 4, 3, 1, '0', 'sun', '[\"chup-anh-quan-ao-5.jpg\"]', '123', 18, '2023-01-13 18:28:43', '2023-04-21 09:15:00'),
(3, 'áo pijama', '2000$', 6, 5, 2, '2', 'sun2', '[\"Ao-pijama-11-min.jpg\",\"images (3).jpg\",\"images (4).jpg\"]', '12345', 18, '2023-01-13 18:31:55', '2023-04-21 09:16:39'),
(4, 'áo đầm', '600$', 4, 5, 1, '0', 'sun', '[\"Anh-3-4.jpg\"]', '1123123', 18, '2023-01-14 02:00:28', '2023-04-21 09:18:19'),
(13, 'áo len nam', '750$', 6, 3, 2, '10', 'sun2', '[\"ffa7cd675f534c08e9c4f7aa2e6835f8.jpg_720x720q80.jpg\",\"images (5).jpg\"]', '12345', 17, '2023-02-14 01:34:27', '2023-04-21 09:20:12'),
(14, 'áo thun thể thao', '300$', 6, 5, 1, '0', 'sun2', '[\"images (6).jpg\",\"lua-chon-bo-quan-ao-the-thao-phu-hop.png\"]', '12345', 18, '2023-02-14 01:35:36', '2023-04-21 09:22:40'),
(15, 'quần jean nữ', '3200$', 4, 3, 1, '0', 'sun2', '[\"images (7).jpg\",\"images (8).jpg\"]', '12345', 18, '2023-02-14 01:39:31', '2023-04-21 09:26:20'),
(22, 'quần jogger', '800$', 6, 3, 1, '0', '12313', '[\"images (8).jpg\",\"images (9).jpg\",\"images (10).jpg\"]', '1231321321', 18, '2023-02-25 07:25:01', '2023-04-22 06:56:05'),
(26, 'áo', '12$', 1, 1, 1, '0', 'Company', '[\"blog4.jpg\",\"blog5.jpg\",\"images (10).jpg\"]', 'Detail', 17, '2023-04-22 08:02:14', '2023-04-22 08:02:14'),
(27, 'Name12', 'Price123', 6, 1, 1, '0', 'Company', '[\"blog4.jpg\",\"blog5.jpg\",\"images (10).jpg\",\"Anh-3-4.jpg\"]', 'Detail', 18, '2023-04-22 08:47:12', '2023-04-22 08:47:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate`
--

CREATE TABLE `rate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_blog` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rate`
--

INSERT INTO `rate` (`id`, `rate`, `id_user`, `id_blog`, `created_at`, `updated_at`) VALUES
(1, '1', '26', '14', '2022-12-28 07:09:41', '2022-12-28 07:09:41'),
(2, '3', '26', '14', '2022-12-28 07:10:00', '2022-12-28 07:10:00'),
(5, '3', '18', '15', '2022-12-30 00:24:56', '2022-12-30 00:24:56'),
(7, '3', '18', '16', '2022-12-30 00:25:21', '2022-12-30 00:25:21'),
(8, '1', '18', '16', '2022-12-30 00:31:03', '2022-12-30 00:31:03'),
(9, '4', '18', '16', '2022-12-30 00:35:08', '2022-12-30 00:35:08'),
(11, '3', '18', '16', '2022-12-30 00:50:27', '2022-12-30 00:50:27'),
(14, '5', '18', '16', '2022-12-30 00:50:35', '2022-12-30 00:50:35'),
(15, '1', '18', '16', '2022-12-30 01:20:58', '2022-12-30 01:20:58'),
(16, '1', '18', '16', '2022-12-30 01:27:25', '2022-12-30 01:27:25'),
(17, '1', '18', '16', '2022-12-30 01:27:30', '2022-12-30 01:27:30'),
(18, '1', '18', '16', '2022-12-30 01:27:34', '2022-12-30 01:27:34'),
(19, '5', '18', '16', '2022-12-30 01:27:37', '2022-12-30 01:27:37'),
(20, '1', '18', '16', '2022-12-30 01:27:45', '2022-12-30 01:27:45'),
(21, '1', '18', '16', '2022-12-30 01:27:49', '2022-12-30 01:27:49'),
(22, '1', '18', '16', '2022-12-30 01:27:52', '2022-12-30 01:27:52'),
(23, '1', '18', '16', '2022-12-30 01:27:57', '2022-12-30 01:27:57'),
(24, '3', '18', '16', '2023-01-02 02:33:41', '2023-01-02 02:33:41'),
(25, '3', '18', '16', '2023-01-02 06:35:16', '2023-01-02 06:35:16'),
(26, '5', '30', '16', '2023-01-06 02:58:48', '2023-01-06 02:58:48'),
(27, '5', '30', '16', '2023-01-06 06:49:42', '2023-01-06 06:49:42'),
(28, '3', '18', '16', '2023-01-11 01:58:03', '2023-01-11 01:58:03'),
(29, '3', '18', '16', '2023-01-13 00:31:33', '2023-01-13 00:31:33'),
(30, '3', '18', '16', '2023-02-18 01:47:38', '2023-02-18 01:47:38'),
(31, '4', '18', '16', '2023-02-18 01:48:28', '2023-02-18 01:48:28'),
(32, '2', '18', '14', '2023-04-22 01:58:36', '2023-04-22 01:58:36'),
(33, '2', '18', '14', '2023-04-22 02:00:12', '2023-04-22 02:00:12'),
(34, '2', '18', '16', '2023-04-22 02:00:51', '2023-04-22 02:00:51'),
(35, '1', '18', '16', '2023-04-22 02:03:29', '2023-04-22 02:03:29'),
(36, '1', '18', '16', '2023-04-22 02:09:50', '2023-04-22 02:09:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sale`
--

CREATE TABLE `sale` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sale`
--

INSERT INTO `sale` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'no sale', '2023-01-11 02:47:37', '2023-01-11 02:47:37'),
(2, 'sale', '2023-01-11 02:49:07', '2023-01-11 02:49:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_country` int(11) DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1:admin 0:member',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `id_country`, `avatar`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(2, 'Lê Viết Thọ1', 'leviettho06112@gmail.com', NULL, '$2y$10$/skQKmcvuHWphCj8v3koHexypn3puM6pgX4uCOcivx7qifkUMjJOe', NULL, NULL, NULL, NULL, NULL, 1, '2022-12-05 08:32:02', '2022-12-05 08:32:02'),
(6, 'Lê Viết Thọ', 'leviet0611@gmail.com', NULL, '$2y$10$wgj47.w4boGjOaWKhQd/iO2vpGI8KYkeoj4UksCBwGlgSmIsRWpja', NULL, NULL, NULL, NULL, NULL, 1, '2022-12-06 06:15:12', '2022-12-06 06:15:12'),
(7, 'Lê Viết Thọ', 'letho0611@gmail.com', NULL, '$2y$10$5o5.d3wJifaCaMWiWzsQWOdZ1mgCuPtD9bHoGXUKPa90YgB8wKvMW', NULL, NULL, NULL, NULL, NULL, 1, '2022-12-06 06:16:23', '2022-12-06 06:16:23'),
(8, 'tho', 'thovietle@yahoo.com', NULL, '$2y$10$u4R9vDLLWhnlhuVuVzLVueKImwV9d5aIuvDGjyRYhJWGudimHXNOe', NULL, NULL, NULL, 'tải xuống (3).jpg', NULL, 1, '2022-12-09 02:08:16', '2022-12-09 06:20:37'),
(9, 'dacthinh', 'dacthinh@gmail.com', NULL, 'thinh123', NULL, NULL, NULL, 'images (1).jpg', NULL, 1, '2022-12-23 07:03:21', '2022-12-23 07:03:21'),
(14, 'th1', 'levie0611@gmail.com', NULL, 'tho123', NULL, NULL, NULL, '1.jpg', NULL, 1, '2022-12-23 07:26:58', '2022-12-23 07:26:58'),
(15, 'thtuhu', 'le@gmail.com', NULL, '$2y$10$b9hWVWTl4Y0hKa6IUaHKxu096fYOKMV26OBNdXvg.5qrsyTr1TKue', NULL, NULL, NULL, 'images.jpg', NULL, 1, '2022-12-23 07:28:15', '2022-12-23 07:28:15'),
(16, 't1231', 'th@gmail.com', NULL, '$2y$10$rhbI91YSTIxbdeWeLzVd7OQThPmHrTS9zskSeJ8Dz1JTrSwQxU4BG', NULL, NULL, NULL, 'images.jpg', NULL, 1, '2022-12-23 07:29:08', '2022-12-23 07:29:08'),
(17, 'thinh12345', 'thinh@gmail.com', NULL, '$2y$10$8tkKWHootdLpwEs2n4oZo.GL.2/5DkQ3keDXz1cTyCHOvdli7N4Zu', NULL, NULL, NULL, '2.jpg', NULL, 0, '2022-12-23 09:51:05', '2023-01-06 02:49:52'),
(18, 'minh', 'minh@gmail.com', NULL, '$2y$10$/QR2GDoAbo3gjXnyro0ByezcjjKn3mf3iFAqt610tcbiKgpYd7bCq', NULL, NULL, NULL, 'images.jpg', NULL, 0, '2022-12-24 07:48:32', '2023-04-22 08:32:16'),
(19, 'kiet', 'kiet@gmail.com', NULL, '$2y$10$ANko4vxuzV5T6/QBPvYiku555STxADucRso/otB4qQ5hOCHXPNQr6', NULL, NULL, NULL, '9e45c2ecf660373e6e71.jpg', NULL, 0, '2022-12-24 23:23:19', '2022-12-24 23:23:19'),
(20, 'kiet1', 'kiet1@gmail.com', NULL, '$2y$10$xS2GhvpmVstX3LFVoM0CHexpv.w2O7pfWLEM2Tahd01ZhSciEm8ZK', NULL, NULL, NULL, NULL, NULL, 1, '2022-12-24 23:25:48', '2022-12-24 23:25:48'),
(21, 'thinh1', 'thinh1@gmail.com', NULL, '$2y$10$HnfHh.jX7/RhkL5LTjOppu9TJDSleG5QBlXlDaMvIe2ISrf64uhh2', NULL, NULL, NULL, NULL, NULL, 1, '2022-12-24 23:34:49', '2022-12-24 23:34:49'),
(28, 'kiet', 'kiet123@gmail.com', NULL, '$2y$10$RcDrDRA.AoUd4DczqL88n.ay0l0gwzTFAUzuSbMvHHAhtIhQ02TO.', NULL, NULL, NULL, '3.jpg', NULL, 1, '2023-01-04 08:28:34', '2023-01-04 08:43:12'),
(30, 'Lê Viết Thọ', 'viettho0611@gmail.com', NULL, '$2y$10$octzuF1cPa4RCOrNSbCJOOfJuas4rIdDLBBrUv909gs0dUEHu8cjO', NULL, NULL, NULL, 'tải xuống (4).jpg', NULL, 0, '2023-01-06 02:52:18', '2023-01-06 06:11:46'),
(31, 'minh', 'minh123@gmail.com', NULL, '$2y$10$DtNnodWRct0zlBTa.A9vUOCiolXJXDcK0.U7vjN5B8k4HB/BCGkBW', '123', '12345', 11, 'tải xuống (4).jpg', NULL, 1, '2023-01-11 00:45:46', '2023-01-11 01:19:08'),
(34, 'l', 'l@gmail.com', NULL, '$2y$10$s8az81bKQnBt9gzFdZBGZ.2lDPyAhfw2mlBPDU7bTgvCsDSC6Q8TW', '123', NULL, NULL, 'images (2).jpg', NULL, 0, '2023-01-11 02:07:45', '2023-01-11 02:07:45'),
(38, 'r', 'r@gmail.com', NULL, '$2y$10$8u1NrhAH5JSnfAm1XKgtU.c0YbhO0IWlsLoH83Ol3LmeplSIGohmC', '123', '1234', NULL, '0cd47b994f158e4bd704.jpg', NULL, 0, '2023-01-11 06:19:36', '2023-01-11 06:19:36'),
(39, 'tho', 'tho123@gmail.com', NULL, '$2y$10$MrQP2//uhBtcjjnQ9zxkTewq6HstxPkObsKzO7iSinRBFoGZ.0AJW', NULL, NULL, NULL, NULL, NULL, 1, '2023-03-11 07:11:56', '2023-03-11 07:11:56'),
(40, 'thang', 'thang@gmail.com', NULL, '$2y$10$5hyub2nymMSqX2qK2duU/OUyINytsmGv9MkR3YeoWP8XElnhQMIFG', NULL, NULL, NULL, NULL, NULL, 1, '2023-03-13 02:02:08', '2023-03-13 02:02:08'),
(41, 'tho11111', 'tho11111@gmail.com', NULL, '$2y$10$VlN2tEuDonOE039FdRAmHuWGFXT2mVu9/Obthpdn0utQq4UA4gVdy', NULL, NULL, 2, 'Hinh-nen-iPad-4K.jpg', NULL, 1, '2023-04-17 00:40:01', '2023-04-17 01:06:03'),
(42, 'kiet222', 'kiet222@gmail.com', NULL, '$2y$10$nA0BnY58JewedGlzi4VECObRWV9SJoXNDw.h3P7AhUfKFyNuPKRu6', NULL, NULL, NULL, 'Hinh-nen-iPad-4K.jpg', NULL, 0, '2023-04-17 10:08:43', '2023-04-17 10:08:43'),
(43, 'tran', 'tran@gmail.com', NULL, '$2y$10$b4d7J1O.GlX2RilMjm7cce57vUnICtmYCwqYvS90QNeJ2Io5l5.su', NULL, NULL, 2, 'chup-anh-quan-ao-3.jpg', NULL, 1, '2023-04-21 09:45:02', '2023-04-22 07:07:51');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogcomment`
--
ALTER TABLE `blogcomment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `blogcomment`
--
ALTER TABLE `blogcomment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `rate`
--
ALTER TABLE `rate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `sale`
--
ALTER TABLE `sale`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
