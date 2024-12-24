-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 24, 2024 lúc 11:43 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webshop_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `user_image` longtext DEFAULT NULL,
  `role` enum('customer','admin') NOT NULL DEFAULT 'customer',
  `ranking` enum('COPPER','SILVER','GOLD','DIAMOND') NOT NULL DEFAULT 'COPPER',
  `spending_score` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `google_id`, `facebook_id`, `user_first_name`, `user_last_name`, `user_address`, `user_phone`, `user_image`, `role`, `ranking`, `spending_score`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, 'Hòaa', 'Nguyễnn', 'Quarter 6, Linh Trung Ward, Thu Duc City, Ho Chi Minh City', '0368433716', 'z5976646560486_3429b121eea6ed7472246f6a03e0bd0b.jpg', 'admin', 'COPPER', 1, NULL, NULL),
(2, 'client@gmail.com', '62608e08adc29a8d6dbc9754e659f125', NULL, NULL, 'Hòa', 'Nguyễn', 'Hòn Đất, Kiên Giang', '0368433716', 'z6134876791501_48573009e0983a6aa1e0c6e10da01aa7.jpg', 'customer', 'GOLD', 46062001, NULL, NULL),
(3, 'ngvanhoa130504@gmail.com', '62608e08adc29a8d6dbc9754e659f125', NULL, NULL, 'Hòa', 'Nguyễn', NULL, NULL, NULL, 'customer', 'COPPER', 1, NULL, NULL),
(4, '22520454@gm.uit.edu.vn', '62608e08adc29a8d6dbc9754e659f125', NULL, NULL, 'Hòa', 'Nguyễn', NULL, NULL, NULL, 'customer', 'COPPER', 1, NULL, NULL),
(5, '22520214@gm.uit.edu.vn', '62608e08adc29a8d6dbc9754e659f125', NULL, NULL, 'Duy', 'Huỳnh', NULL, NULL, NULL, 'customer', 'COPPER', 1, NULL, NULL),
(6, '22520756@gm.uit.edu.vn', '62608e08adc29a8d6dbc9754e659f125', NULL, NULL, 'Linh', 'Đặng', NULL, NULL, NULL, 'customer', 'COPPER', 1, NULL, NULL),
(7, '22520314@gm.uit.edu.vn', '62608e08adc29a8d6dbc9754e659f125', NULL, NULL, 'Đạt', 'Lê', NULL, NULL, NULL, 'customer', 'COPPER', 1, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
