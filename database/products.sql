-- phpMyAdmin SQL Dump
-- version 4.9.5deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2022 at 07:23 PM
-- Server version: 8.0.17-0ubuntu2
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `qty`, `price`, `status`, `created_date`) VALUES
(1, 'iphone', 'testing data', 'iphone.jpg', 4, 1000, 'active', '2022-03-17 10:53:04'),
(2, 'android', 'testing', 'android.jpg', 12, 600, 'active', '2022-03-17 10:53:04'),
(3, 'Laptop', 'laptop date', 'android.jpg', 5, 500, 'inactive', '2022-03-17 11:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `userpurchase`
--

CREATE TABLE `userpurchase` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userpurchase`
--

INSERT INTO `userpurchase` (`id`, `user_id`, `product_id`, `qty`, `price`, `created_date`) VALUES
(1, 1, 1, 2, 2000, '2022-03-17 18:06:35'),
(2, 1, 1, 2, 2000, '2022-03-17 18:09:36'),
(3, 1, 1, 2, 2000, '2022-03-17 18:10:13'),
(4, 1, 1, 2, 2000, '2022-03-17 18:12:58'),
(5, 1, 1, 2, 2000, '2022-03-17 18:13:26'),
(6, 1, 1, 2, 2000, '2022-03-17 18:13:41'),
(7, 1, 1, 2, 2000, '2022-03-17 18:13:56'),
(8, 1, 1, 2, 2000, '2022-03-17 18:14:08'),
(9, 1, 1, 2, 2000, '2022-03-17 18:16:48'),
(10, 1, 1, 2, 2000, '2022-03-17 18:19:20'),
(11, 1, 1, 2, 2000, '2022-03-17 18:19:54'),
(12, 1, 2, 2, 1200, '2022-03-17 18:27:44'),
(13, 1, 2, 1, 600, '2022-03-17 18:34:23'),
(14, 2, 2, 1, 600, '2022-03-17 18:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `verification_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isVerified` tinyint(1) NOT NULL COMMENT '0=No, 1=Yes',
  `role` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `verification_key`, `isVerified`, `role`, `created_at`) VALUES
(1, 'dipen@mailinator.com', '25f9e794323b453885f5181f1b624d0b', '503f179c96ab7d73bf68f3b4641b6fce', 1, 'user', '2022-03-17 13:07:00'),
(2, 'test@mailinator.com', '25f9e794323b453885f5181f1b624d0b', '09fe70de870e7d11075f4a28b65a553b', 1, 'user', '2022-03-17 13:21:49'),
(3, 'test2@mailinator.com', '25f9e794323b453885f5181f1b624d0b', 'd9efb667b6eb3e11bc96090997c9bc50', 0, 'user', '2022-03-17 13:22:30'),
(4, 'test5@mailinator.com', '25f9e794323b453885f5181f1b624d0b', 'a74c7f9f97a81fe5953dc51435df56f9', 1, 'user', '2022-03-17 13:24:06'),
(5, 'dipentest@mailinator.com', '25f9e794323b453885f5181f1b624d0b', 'bb5f54095e818fb4bb0916e342e240cb', 1, 'user', '2022-03-17 13:26:37'),
(6, 'romeshdgupta@gmail.com', '25f9e794323b453885f5181f1b624d0b', '3116863cf0a50580a867b1667fa5eb7b', 0, 'user', '2022-03-17 14:37:48'),
(7, 'dipenmodi@mailinator.com', '25f9e794323b453885f5181f1b624d0b', '5a749f7236a99d412a4938d930d885d7', 0, 'user', '2022-03-17 14:42:48'),
(8, 'dipu@mailinator.com', '25f9e794323b453885f5181f1b624d0b', 'e93ece10fec426facf1ef9265d38adc4', 0, 'user', '2022-03-17 14:47:13'),
(9, 'romesh@mailinator.com', '25f9e794323b453885f5181f1b624d0b', 'd8b46a110692e6b67452b47bede68310', 1, 'user', '2022-03-17 14:48:42'),
(10, 'admin@mailinator.com', '25f9e794323b453885f5181f1b624d0b', '61e15ec8a3f590fdba401e034fd20d03', 1, 'admin', '2022-03-17 15:10:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userpurchase`
--
ALTER TABLE `userpurchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userpurchase`
--
ALTER TABLE `userpurchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
