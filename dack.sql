-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 27, 2019 lúc 12:46 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.3

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
(20, 32, 'RWYHMCaE1K', '2019-11-29 15:51:13'),
(21, 33, '7tsIIgKbQC', '2019-11-29 15:59:31'),
(22, 33, 'zMjSgzBV4X', '2019-11-29 16:08:33'),
(23, 35, 'J6puudsfrN', '2019-11-30 11:26:39'),
(24, 36, '7Cu3EjHRKk', '2019-11-30 18:56:01'),
(25, 36, '2lW3bLrPsz', '2019-11-30 18:56:05'),
(26, 38, 'XOvbAUVNxg', '2019-12-26 13:55:00'),
(27, 39, 'weW1voyxrD', '2019-12-26 13:59:06'),
(28, 39, 'Mnj3O7eOzh', '2019-12-26 14:06:01'),
(29, 41, 'JRsCyXbApy', '2019-12-27 17:04:15');

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
(28, 27, '2018-12-27 20:40:48'),
(36, 28, '2019-12-26 13:51:43'),
(39, 36, '2019-12-27 13:39:06'),
(36, 39, '2019-12-27 13:38:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id_msg` int(11) NOT NULL,
  `body` longtext NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id_msg`, `body`, `user_from`, `user_to`, `date_sent`) VALUES
(19, 'dasdasd', 36, 12, '0000-00-00 00:00:00'),
(20, 'dsadsadaaaaaaaaaaaaaaaaaa', 36, 12, '0000-00-00 00:00:00'),
(42, 'Hello, How are you?', 36, 39, '2019-12-26 14:50:35'),
(43, 'I\'m fine. Thank you and you?', 39, 36, '2019-12-26 14:50:53'),
(44, 'Very Good!', 36, 39, '2019-12-26 14:51:03'),
(45, 'Get out Bitch!', 39, 36, '2019-12-26 14:51:20'),
(46, 'M&oacute;a', 36, 39, '2019-12-26 15:21:22'),
(47, 'dsadasdsad', 36, 39, '2019-12-26 15:27:39'),
(48, 'dasdsadsjadbjkbaskjdbasd', 36, 39, '2019-12-26 15:27:45'),
(49, 'asdkjsajdbjksandkjnasdsad', 36, 39, '2019-12-26 15:27:48'),
(50, 'dasdasdasdsad', 36, 39, '2019-12-26 16:30:13'),
(51, 'dasdasdsdasdasdsdaweeads', 36, 39, '2019-12-26 16:30:19'),
(52, 'dsadasdasdasdasdedcxzc', 36, 39, '2019-12-26 16:32:08'),
(53, 'dwaddsd', 36, 39, '2019-12-26 16:32:14'),
(54, 'sadasdasdsadasdasdsa', 36, 39, '2019-12-26 16:32:21'),
(55, 'ditj me m', 39, 36, '2019-12-26 16:33:25'),
(56, 'thang mat dai', 39, 36, '2019-12-26 16:33:36'),
(57, 'xong rồi n&egrave;', 39, 36, '2019-12-27 06:26:42'),
(58, 'okeeeeeeeeeeeeee', 36, 39, '2019-12-27 06:26:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `count` int(11) NOT NULL,
  `quyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `content`, `userId`, `createdAt`, `count`, `quyen`) VALUES
(22, 'adasdsadsad', 36, '2019-12-27 13:14:36', 0, 1),
(23, 'dasdasdsd', 36, '2019-12-27 13:15:03', 0, 2),
(24, '', 36, '2019-12-27 13:15:16', 0, 3),
(25, 'dasdasdsad', 36, '2019-12-27 13:38:06', 0, 3),
(26, 'xin chào các bạn', 41, '2019-12-27 17:07:10', 0, 1),
(27, 'xin chào các bạn trẻ', 41, '2019-12-27 17:07:38', 0, 2),
(28, 'Nhìn cái Gì hả bạn', 41, '2019-12-27 17:15:16', 0, 1),
(29, 'có lẽ nào em vội quên tôi\r\n', 41, '2019-12-27 17:15:30', 0, 1),
(30, 'ngày xưa em và tôi', 41, '2019-12-27 17:15:55', 0, 1);

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
(16, 29, '6lyAH9k3Ow', '2018-12-27 20:51:07', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `used` int(11) NOT NULL,
  `born` date NOT NULL,
  `degree` text NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `used`, `born`, `degree`, `detail`) VALUES
(31, 'myforrever24@gmail.com', '$2y$10$GPU/4xQEJJjoFSxr4w0V4Oz8ueXXh5x5uG0u5hVWFoNfImOFouuoO', 'Lisa', 0, '0000-00-00', '', ''),
(36, 'cnghe22@gmail.com', '$2y$10$rk3v0U2Q3POouM29p.eQ3.VQwjEdR/t9WPfPp1pPX5FTE4WFRLzZS', 'phước nguyễn', 1, '1999-12-22', 'associate', 'là người của công chúng'),
(39, 'cnghe33@gmail.com', '$2y$10$7i8fEkyOUProuNt.QN4JFOWl5f78HDYY5WL.wywRYzb7XJRODdl32', 'Phuoc Nguyen 2', 1, '1999-10-20', 'associate', 'là người có tinh thần cầu tiến'),
(41, 'widebusinessman@gmail.com', '$2y$10$llqwb9kVRZtNJ.1arPYdSugEVI6aa8bTlI7ZLBdxGorV5Msab5Gu2', 'Minh Hiển', 1, '1998-04-07', 'associate', 'là người ham học hỏi');

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
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_msg`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
