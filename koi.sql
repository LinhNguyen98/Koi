-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 14, 2020 lúc 02:16 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `koi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `level` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`, `level`, `created_at`, `updated_at`) VALUES
(11, 'Nguyễn Quang Linh', 'abcd', 'admin1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1029384756, 1, 2, '2019-05-27 02:40:57', '2020-05-15 11:12:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT 0,
  `thunbar` varchar(100) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `home`, `thunbar`, `status`, `created_at`, `updated_at`) VALUES
(24, 'Thức ăn cá Koi', 'thuc-an-ca-koi', 1, 'thucan.png', 1, '2020-06-11 04:34:05', '2020-06-11 04:34:05'),
(25, 'Vật liệu lọc', 'vat-lieu-loc', 0, 'thiet-bi-ho-ca-koi.jpg', 1, '2020-06-12 12:09:41', '2020-06-12 12:09:41'),
(26, 'Koi', 'koi', 0, 'Koi.jpg', 1, '2020-06-12 11:57:23', '2020-06-12 11:57:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` tinyint(4) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(32, 28, 16, 3, 3750000, NULL, '2019-05-26 12:07:36'),
(33, 29, 16, 43, 3750000, NULL, '2019-05-26 12:12:11'),
(34, 30, 34, 1, 375000, NULL, '2019-05-28 13:24:45'),
(35, 30, 16, 6, 3500000, NULL, '2019-05-28 13:24:45'),
(36, 30, 17, 1, 3000000, NULL, '2019-05-28 13:24:45'),
(37, 31, 23, 4, 2250000, NULL, '2019-05-29 05:45:01'),
(38, 32, 16, 1, 3500000, NULL, '2019-05-29 07:25:59'),
(39, 36, 16, 1, 3500000, NULL, '2019-06-13 06:33:35'),
(40, 36, 54, 1, 90000, NULL, '2019-06-13 06:33:35'),
(41, 36, 34, 1, 375000, NULL, '2019-06-13 06:33:35'),
(42, 37, 41, 1, 15000, NULL, '2019-06-13 08:33:18'),
(43, 37, 19, 1, 3000000, NULL, '2019-06-13 08:33:18'),
(44, 37, 16, 1, 3500000, NULL, '2019-06-13 08:33:18'),
(45, 37, 30, 1, 225000, NULL, '2019-06-13 08:33:18'),
(46, 38, 18, 0, 4050000, NULL, '2019-06-16 04:36:39'),
(47, 38, 17, 1, 3000000, NULL, '2019-06-16 04:36:39'),
(48, 39, 88, 2, 12000000, NULL, '2020-06-14 06:08:40'),
(49, 39, 87, 1, 11000000, NULL, '2020-06-14 06:08:40'),
(50, 40, 88, 4, 12000000, NULL, '2020-06-14 06:20:15'),
(51, 40, 89, 4, 13000000, NULL, '2020-06-14 06:20:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT 0,
  `sale` tinyint(4) DEFAULT 0,
  `thunbar` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `pay` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `number`, `sale`, `thunbar`, `category_id`, `content`, `pay`, `created_at`, `updated_at`) VALUES
(86, 'SHUSUI 37- 38 CM', 'shusui-37--38-cm', 10000000, 10, 0, 'How-Fast-Koi-Grow.jpg', 26, 'SHUSUI 37- 38 CM', 0, '2020-06-12 12:01:41', NULL),
(87, 'KOI NISAI 45-56 CM', 'koi-nisai-45-56-cm', 11000000, 10, 0, 'koi1.jpg', 26, 'KOI NISAI 45-56 CM', 1, '2020-06-12 12:03:42', '2020-06-14 06:20:49'),
(88, 'Sandan Kohaku', 'sandan-kohaku', 12000000, 10, 0, 'How-Big-Will-Your-Koi-Fish-Grow.jpg', 26, 'Sandan Kohaku', 1, '2020-06-12 12:06:10', '2020-06-14 06:20:49'),
(89, 'Taisho Sanke', 'taisho-sanke', 13000000, 13, 0, 'koi-fish-pond.jpg', 26, 'Taisho Sanke', 0, '2020-06-12 12:18:25', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `users_id`, `status`, `note`, `created_at`, `updated_at`) VALUES
(36, 4361500, 30, 0, '', '2019-06-13 06:33:34', '2019-06-13 06:33:34'),
(37, 7414000, 30, 1, '', '2019-06-13 08:33:18', '2019-06-15 14:46:22'),
(38, 3300000, 30, 1, '', '2019-06-16 04:36:39', '2020-05-15 08:19:19'),
(39, 38500000, 28, 1, '', '2020-06-14 06:08:40', '2020-06-14 06:20:49'),
(40, 110000000, 28, 0, '', '2020-06-14 06:20:15', '2020-06-14 06:20:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `status`, `created_at`, `updated_at`) VALUES
(28, 'linh', 'linh@gmail.com', '456789', 'dfgj', '202cb962ac59075b964b07152d234b70', 1, NULL, NULL),
(31, 'Mai Văn Tài', 'taittt@gmail.com', '0295867098', 'Hiệp Bình Chánh, Thủ Đức, TP.HCM', 'fcea920f7412b5da7be0cf42b8c93759', 1, NULL, NULL),
(32, 'test', 'test@gmail.com', '0909209320', 'âf', '202cb962ac59075b964b07152d234b70', 1, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
