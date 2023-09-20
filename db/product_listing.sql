-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 02, 2023 at 06:55 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`id`, `product_id`, `user_id`, `quantity`) VALUES
(24, 18, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE IF NOT EXISTS `checkout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL DEFAULT '0',
  `payment_method` int(11) NOT NULL,
  `order_status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `fname`, `lname`, `email`, `mobile`, `address`, `amount`, `user_id`, `payment_method`, `order_status`, `created_at`) VALUES
(19, 'Muhammad', 'Usama', 'usama@gmail.com', '+123456789', '123 lahore', 400, '0', 1, 'PENDING', '2023-05-02 18:48:58'),
(15, 'Rashid', 'ali', 'mrashidali7541@gmail.com', '+923084827582', '123 lahore', 1818, '11', 2, 'DELIVERED', '2023-05-02 18:33:38'),
(18, 'abc', 'sjcds', 'abc@gmail.com', '+923084827582', '123 lahore', 2018, '0', 2, 'PENDING', '2023-05-02 17:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `register_users`
--

DROP TABLE IF EXISTS `register_users`;
CREATE TABLE IF NOT EXISTS `register_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `gender` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `dated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_users`
--

INSERT INTO `register_users` (`id`, `userEmail`, `userPassword`, `firstName`, `lastName`, `gender`, `address`, `dated`) VALUES
(11, 'usama@gmail.com', '123456', 'Muhammad', 'Usama', 'Male', '', '2023-05-02 11:56:44'),
(10, 'admin@admin.com', 'admin', 'Admin', '', 'Male', 'admin', '2023-05-02 11:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

DROP TABLE IF EXISTS `shopping_cart`;
CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subTotal` int(11) NOT NULL,
  `shippingAmount` int(11) NOT NULL,
  `grandTotal` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `subTotal`, `shippingAmount`, `grandTotal`, `user_id`) VALUES
(13, 1918, 10, 2018, 11),
(12, 300, 10, 400, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
