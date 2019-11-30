-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 30, 2019 lúc 10:13 AM
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dack`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `active_account`
--

CREATE TABLE `active_account` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `secretac` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `active_account`
--

INSERT INTO `active_account` (`id`, `userId`, `secretac`, `createdAt`) VALUES
(1, 6, 'WaSMFV9sy7', '2018-12-13 17:41:48'),
(2, 7, 'XPzl5Uc7gI', '2018-12-13 17:43:28'),
(3, 8, 'GMrA544tQC', '2018-12-13 17:46:58'),
(4, 9, '0QQK4XuU6a', '2018-12-13 17:50:39'),
(5, 10, 'PNBQd9704j', '2018-12-13 17:53:17'),
(6, 11, '1oziUThAik', '2018-12-13 17:54:53'),
(7, 12, 'VpYtkoyANV', '2018-12-13 18:04:51'),
(8, 13, '4ui79hE7jS', '2018-12-13 18:10:10'),
(9, 14, 'RsBgVYJgse', '2018-12-13 18:14:50'),
(10, 15, 'cO7K12cWYt', '2018-12-13 18:18:37'),
(11, 23, 'CEoXwIrKFu', '2018-12-14 10:29:36'),
(12, 24, 'lr32jpVJOG', '2018-12-14 10:33:49'),
(13, 25, 'mdkKckJn8Z', '2018-12-14 10:36:38'),
(14, 26, 'hCKqRJVGd6', '2018-12-14 10:41:17'),
(15, 27, 'e13G55zMCU', '2018-12-14 10:42:47'),
(16, 28, 'wWf4I3b408', '2018-12-15 11:22:13'),
(17, 29, 'rl0FZzSQJw', '2018-12-27 20:42:43'),
(18, 29, 'oJ0WwlGyoO', '2018-12-27 20:48:52'),
(19, 29, '4znctaPika', '2018-12-27 20:50:20'),
(20, 32, 'aewR2xjKkp', '2019-11-03 16:56:36'),
(21, 33, 'YSH8ZKyjaC', '2019-11-03 16:58:51'),
(22, 34, 'Llp7sxd7ix', '2019-11-03 16:59:58'),
(23, 34, 'JwcvXgOm8m', '2019-11-03 17:01:57'),
(24, 37, 'zcfaHfg1Wo', '2019-11-03 17:10:10'),
(25, 39, '8OPMbGUsJr', '2019-11-03 17:13:04'),
(26, 39, 'k32f0YTt8I', '2019-11-03 17:13:26'),
(27, 39, 'xNxYcir1Yt', '2019-11-03 17:15:17'),
(28, 42, '2KMDJAWKkc', '2019-11-29 10:18:51'),
(29, 43, 'CA4FUXRIYp', '2019-11-29 10:33:49'),
(30, 44, 'NtiygKmQrg', '2019-11-29 10:42:27'),
(31, 44, 'meUrirc5hg', '2019-11-29 10:51:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `follow`
--

CREATE TABLE `follow` (
  `users` int(11) NOT NULL,
  `usersfollow` int(11) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `follow`
--

INSERT INTO `follow` (`users`, `usersfollow`, `createAt`) VALUES
(28, 27, '2018-12-27 20:40:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `friends`
--

CREATE TABLE `friends` (
  `user1Id` int(11) NOT NULL,
  `user2Id` int(11) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `friends`
--

INSERT INTO `friends` (`user1Id`, `user2Id`, `createAt`) VALUES
(28, 27, '2018-12-27 20:40:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `content`, `userId`, `createdAt`, `count`) VALUES
(1, '123', 0, '2018-12-27 16:29:49', 0),
(2, '123', 0, '2018-12-27 16:30:11', 0),
(3, '123', 0, '2018-12-27 16:30:31', 0),
(4, '123', 0, '2018-12-27 16:30:57', 0),
(5, '123', 0, '2018-12-27 16:33:44', 0),
(6, '123', 0, '2018-12-27 16:36:12', 0),
(7, '123', 0, '2018-12-27 16:37:34', 0),
(8, '123', 0, '2018-12-27 16:40:30', 0),
(9, '123', 28, '2018-12-27 16:54:08', 0),
(10, '456', 28, '2018-12-27 16:54:23', 0),
(11, '123', 28, '2018-12-27 17:08:41', 0),
(12, 'khoi mat lol', 28, '2018-12-27 17:09:52', 0),
(13, 'khoi mat cac', 28, '2018-12-27 17:10:07', -2),
(14, 'suc vat khoi', 28, '2018-12-27 17:10:18', 1),
(15, '123ddd  ', 28, '2018-12-27 17:55:17', 2),
(16, '123 456', 28, '2018-12-27 18:26:24', 1),
(17, 'Tôi yêu em', 28, '2018-12-27 20:21:00', 6),
(18, '', 39, '2019-11-03 18:00:32', 5),
(19, 'khong co gi\r\n\r\n\r\n', 39, '2019-11-03 18:00:44', 61),
(20, '', 39, '2019-11-22 18:40:51', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `secret` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `reset_password`
--

INSERT INTO `reset_password` (`id`, `userId`, `secret`, `createdAt`, `used`) VALUES
(1, 5, '6HqxGf8lyy', '2018-12-13 16:51:27', 0),
(2, 5, 'WV5Qn0FYZu', '2018-12-13 16:53:38', 0),
(3, 5, '5FD9nUXLJB', '2018-12-13 16:54:28', 0),
(4, 5, 'eS4h4ftWYM', '2018-12-13 16:55:26', 0),
(5, 5, 'clOGhm7jia', '2018-12-13 16:56:48', 0),
(6, 5, 'ELdvsMspu1', '2018-12-13 16:59:41', 1),
(7, 5, 'EE1VSrPkhB', '2018-12-13 17:10:21', 1),
(8, 5, 'CLKvZacYM4', '2018-12-13 17:11:36', 1),
(9, 5, 'yIO4t08bC2', '2018-12-13 17:18:53', 1),
(10, 5, 'C2Z4GXPeln', '2018-12-13 17:24:42', 1),
(11, 17, 'w5ionqA6iY', '2018-12-13 18:25:58', 1),
(12, 17, '9NZYOaojpU', '2018-12-13 18:32:22', 1),
(13, 25, 'OxEweOORY7', '2018-12-14 10:37:08', 1),
(14, 25, 'Begjf2jE2Z', '2018-12-15 11:09:54', 1),
(15, 28, 'fh9i1EAFK5', '2018-12-15 11:23:13', 1),
(16, 29, '6lyAH9k3Ow', '2018-12-27 20:51:07', 1),
(17, 39, 'szy89i47Ov', '2019-11-22 18:20:50', 0),
(18, 39, 'kCBGtUwoEE', '2019-11-22 18:25:41', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `used`) VALUES
(27, 'myforrever22@gmail.com', '$2y$10$flHNWamUu5ld.aSqpfS1a..7lTHIP1jCHyWclNNvBzU4BIZv4t5K6', 'Kim', 1),
(28, 'myforrever21@gmail.com', '$2y$10$l9wKWZfLTQU4d7s52V.5p.lL/hBpiwtuBDIcEZ1k0FOXsClE6QhCO', 'Kim JiSoo', 1),
(29, 'myforrever24@gmail.com', '$2y$10$Ibb4R6W/f.M2P1mq1ccN4.Jv2zqmWDK9A0rvW9RTwlvTsZ1iLyU7e', 'Kim Jennie', 1),
(43, 'hienkoiu0123@gmail.com', '$2y$10$umOTA9KtRFg.Z8InCBpPjOKPutqdhhtobGL5clTnsH0znXaRV6/6W', 'wide', 0),
(44, 'widebusinessman@gmail.com', '$2y$10$ReYZeUbW.aXLQiySEdzZwuTq7Tsa9XlZyeKzmoJnOuCUNUG4oYOFy', 'hiển', 1),
(45, 'widebusinessman@gmail.com', '$2y$10$.zKEJtFr8tGZ8/mgVCbkaufHPCz4GyzfpRwN77bBBiNtUP3fKN5vK', 'hiển', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `active_account`
--
ALTER TABLE `active_account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`usersfollow`,`users`);

--
-- Chỉ mục cho bảng `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`user1Id`,`user2Id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reset_password`
--
ALTER TABLE `reset_password`
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
-- AUTO_INCREMENT cho bảng `active_account`
--
ALTER TABLE `active_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT cho bảng `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
