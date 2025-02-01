-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 01, 2025 at 11:04 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_listing`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

DROP TABLE IF EXISTS `add_product`;
CREATE TABLE IF NOT EXISTS `add_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `itemPhoto` varchar(50) NOT NULL,
  `itemTitle` varchar(50) NOT NULL,
  `itemSubtitle` varchar(50) NOT NULL,
  `itemLabel` varchar(50) NOT NULL,
  `itemCategory` varchar(50) NOT NULL,
  `itemDescription` varchar(200) NOT NULL,
  `itemPrice` decimal(10,0) NOT NULL,
  `itemQuantity` decimal(10,0) NOT NULL,
  `dated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`id`, `itemPhoto`, `itemTitle`, `itemSubtitle`, `itemLabel`, `itemCategory`, `itemDescription`, `itemPrice`, `itemQuantity`, `dated`) VALUES
(16, 'image20230501064427.jpeg', 'House Plant', '    SH               ', 'SH001', 'Annual Plant', 'This is a house plant.', '200', '10', '2022-11-26 17:13:33'),
(13, 'image20230501065130.jpeg', 'Potted Plant ', ' plant ', 'tst', 'Seed Plants', 'This is a potted plant.', '300', '10', '2022-11-26 07:44:14'),
(14, 'image20230502105504.webp', 'Flowers', 'FL', 'CAM001', 'Flowers', 'This is a Flower.', '150', '10', '2022-11-26 07:44:57'),
(12, 'image20230502103906.jpeg', 'Liveworts', 'Loveworts', 'S.DFNSD', 'Liverworts', 'This is a liveworts.', '300', '10', '2022-11-26 07:42:32'),
(15, 'image20230502102907.webp', 'Fresh Blenchy', 'House Plant', 'FW001', 'Flowers', 'This is a House plant.', '289', '10', '2022-11-26 07:54:36'),
(17, 'image20230501090018.jpeg', 'Green Plant ', 'myplant', 'plant001', 'Seed Plants', 'This is a seed plant', '220', '10', '2023-05-01 09:18:00'),
(18, 'image20230502122756.avif', 'Orchids Plant', 'Plant', 'PL001', 'Orchids', 'This is an orchid plant.', '300', '10', '2023-05-02 12:56:27'),
(19, 'image20230502120558.avif', 'Seed Plants', 'seed', 'SE001', 'Seed Plants', 'This is a seed plant.', '250', '10', '2023-05-02 12:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

DROP TABLE IF EXISTS `add_to_cart`;
CREATE TABLE IF NOT EXISTS `add_to_cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`id`, `product_id`, `user_id`, `quantity`) VALUES
(31, 13, 10201222, 1),
(30, 18, 15, 1),
(29, 16, 15, 1),
(32, 14, 16, 1),
(33, 19, 16, 1),
(34, 15, 16, 1),
(35, 17, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE IF NOT EXISTS `checkout` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `amount` int NOT NULL,
  `user_id` varchar(11) NOT NULL DEFAULT '0',
  `payment_method` int NOT NULL,
  `order_status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `fname`, `lname`, `email`, `mobile`, `address`, `amount`, `user_id`, `payment_method`, `order_status`, `created_at`) VALUES
(19, 'Muhammad', 'Usama', 'usama@gmail.com', '+123456789', '123 lahore', 400, '0', 1, 'PENDING', '2023-05-02 18:48:58'),
(15, 'Rashid', 'ali', 'mrashidali7541@gmail.com', '+923084827582', '123 lahore', 1818, '11', 2, 'DELIVERED', '2023-05-02 18:33:38'),
(20, 'M', 'Ali', 'ali@gmail.com', '1123123123', 'lahore pakistan', 2050, '11', 2, 'PENDING', '2023-09-19 18:58:28'),
(22, 'Rashid', 'Ali', 'mrashidali7541@gmail.com', '03084827582', 'Mohalla Haji park, Bhatta chowk, Bedian Road, Lahore', 1300, '15', 1, 'PENDING', '2023-09-19 20:45:09'),
(23, 'Rashid', 'Ali', 'mrashidali7541@gmail.com', '03084827582', 'Haji park, Khurram shehzad street, Bhatta chowk, bedian toad lahore', 1009, '16', 1, 'PENDING', '2025-02-01 06:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `register_users`
--

DROP TABLE IF EXISTS `register_users`;
CREATE TABLE IF NOT EXISTS `register_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `gender` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `dated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_users`
--

INSERT INTO `register_users` (`id`, `userEmail`, `userPassword`, `firstName`, `lastName`, `gender`, `address`, `dated`) VALUES
(11, 'usama@gmail.com', '123456', 'Muhammad', 'Usama', 'Male', '', '2023-05-02 11:56:44'),
(10, 'admin@admin.com', 'admin', 'Admin', '', 'Male', 'admin', '2023-05-02 11:50:57'),
(15, 'mrashidali7541@gmail.com', '123456', 'Rashid', 'Ali', 'Male', '', '2023-09-19 20:43:27'),
(16, 'rashid@gmail.com', '12345678', 'Rashid', 'Ali', 'Male', '', '2023-12-17 06:04:16'),
(17, 'asdfasd@gmail.com', 'asdfasd', 'afasdf', 'adfasdf', 'Male', '', '2024-05-11 19:11:58'),
(18, 'mrashidali754@gmail.com', '123456', 'Rashid', 'Ali', 'Male', '', '2024-05-12 10:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int NOT NULL AUTO_INCREMENT,
  `rating` int NOT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `rating`, `review`, `user_id`, `product_id`, `created_at`) VALUES
(1, 3, 'best plants ever', 16, 13, '2025-02-01 09:21:21'),
(5, 5, 'sessional plants. highly recommended to all customers', 16, 13, '2025-02-01 10:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

DROP TABLE IF EXISTS `shopping_cart`;
CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subTotal` int NOT NULL,
  `shippingAmount` int NOT NULL,
  `grandTotal` int NOT NULL,
  `user_id` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `subTotal`, `shippingAmount`, `grandTotal`, `user_id`) VALUES
(13, 950, 10, 1050, 11),
(12, 300, 10, 400, 0),
(14, 1200, 10, 1300, 15),
(15, 909, 10, 1009, 16);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
