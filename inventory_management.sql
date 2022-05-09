-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 04:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`) VALUES
(54, '1234'),
(21, 'asdasd'),
(47, 'dasdasd'),
(48, 'dasdddd'),
(52, 'dd'),
(46, 'ddd'),
(63, 'helloWorld ค้าบ'),
(61, 'ป๋อมแป๋ม'),
(62, 'สวัสดีจ้า'),
(57, 'อปปป');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productDetail` varchar(255) NOT NULL,
  `size` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `productImage` text NOT NULL,
  `productQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categoryId`, `productName`, `productDetail`, `size`, `color`, `productImage`, `productQuantity`) VALUES
(12, 47, 'ทดสอบ', 'อิอิ', '1*2*3', 'แดง', 'noProductImage.jpg', 1330),
(16, 47, 'ชื่อสินนค้าasd', '6666', 'asdasd', 'แดง', 'noProductImage.jpg', 512),
(17, 63, 'สวัสดีน้าบ', 'ddddddd', '50x50x50', 'แดง', 'สวัสดีน้าบ.jpg', 167);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `orderNumber` varchar(100) NOT NULL,
  `imageName` text NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `orderNumber`, `imageName`, `dateTime`) VALUES
(10, '4314134', '4314134.jpg', '2022-05-20 13:13:00'),
(16, 'vfvfvf', 'vfvfvf.jpg', '2022-05-09 11:23:00'),
(31, 'DramaStream', 'DramaStream.jpg', '2022-05-09 13:09:00'),
(42, 'alex', 'alex.jpg', '2022-05-09 13:38:00'),
(43, '54252455245245425245', '54252455245245425245.jpg', '2022-05-14 13:39:00'),
(45, 'DramaStream1', 'DramaStream1.png', '2022-05-09 13:50:00'),
(46, 'handsome', 'handsome.jpg', '2022-05-09 13:58:00'),
(47, 'ขี้แตก', 'ขี้แตก.jpg', '2022-05-09 13:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `firstName`, `lastName`, `email`, `tel`) VALUES
(2, 'admin', '5fb7b875c508202d964fbaafe213665b5bc210fd9fa1f23eac41d2b227ebe351', 0, 'เวนิส', 'test', 'admin@gmail.com', '0655899874'),
(4, 'kantapat', '5fb7b875c508202d964fbaafe213665b5bc210fd9fa1f23eac41d2b227ebe351', 1, 'kantapat', 'supaweerawat', 'kantapat@mail.com', '0987290448');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoryName` (`categoryName`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`categoryId`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderNumber` (`orderNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
