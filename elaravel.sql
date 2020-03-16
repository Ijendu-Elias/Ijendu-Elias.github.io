-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 01:39 AM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'eliasijendu442@gmail.com', '6b71dfdc4c5603272482f5b80db96a0a', 'Ijendu Elias', '08035643234', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manufacture`
--

DROP TABLE IF EXISTS `manufacture`;
CREATE TABLE IF NOT EXISTS `manufacture` (
  `manufacture_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `manufacture_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(2) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`manufacture_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacture`
--

INSERT INTO `manufacture` (`manufacture_id`, `manufacture_name`, `manufacture_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'samsung', 'This is samsung Products', 1, NULL, NULL),
(9, 'Apple', 'This is Apple Products', 1, NULL, NULL),
(8, 'Otobi', ' This is Otobi Furnitures', 1, NULL, NULL),
(7, 'Zara', 'this is zara Products', 1, NULL, NULL),
(10, 'Adidas', 'This is Adidas Products', 1, NULL, NULL),
(13, 'Chilos Rose', 'This is for women', 1, NULL, NULL),
(15, 'Others', 'this is others', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2019_07_21_084910_create_admin_table', 1),
(7, '2019_07_22_144512_create_tbl_category_table', 2),
(8, '2019_07_25_135528_create_manufacture_table', 3),
(9, '2019_07_26_140924_create_tbl_products_table', 4),
(10, '2019_07_28_120947_create_tbl_slider_table', 5),
(11, '2019_08_02_131606_create_tbl_customers_registered_table', 6),
(12, '2019_08_03_182814_create_tbl_shipping_table', 7),
(13, '2019_08_10_091217_create_tbl_payment_table', 8),
(14, '2019_08_10_092132_create_tbl_order_table', 8),
(15, '2019_08_10_092642_create_tbl_order_details_table', 8),
(16, '2019_09_09_100622_create_tbl_comments_table', 9),
(17, '2019_09_09_104147_create_tbl_posts_table', 9),
(18, '2019_09_13_133221_create_tbl_forum_reply_table', 10),
(19, '2019_09_30_093417_create__tbl_category_table', 11),
(20, '2019_10_24_222156_create_tbl_users_upload_table', 12),
(21, '2019_11_26_203524_create_tbl_sale_reg_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(2) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(21, 'Kids', 'Kids where', 1, NULL, NULL),
(3, 'Furnitures', 'Woody Iterms and designs', 1, NULL, NULL),
(4, 'Kids', 'Children Play Kits', 1, NULL, NULL),
(5, 'Fashion', 'For Hockey Games', 1, NULL, NULL),
(6, 'Households', 'This is House Holds Items', 1, NULL, NULL),
(14, 'women', 'This is for women', 1, NULL, NULL),
(15, 'Sport Wears', 'This is Sport Wears', 1, NULL, NULL),
(16, 'Cloths', 'This is Unisex Cloths', 1, NULL, NULL),
(17, 'Bags', 'This Bag for male and female', 1, NULL, NULL),
(13, 'Men', 'this Men', 1, NULL, NULL),
(18, 'Shoes', 'This is Shoes Of all type', 1, NULL, NULL),
(19, 'Electronics', 'This All Kind of Electronics', 1, NULL, NULL),
(20, 'Laptop', 'This is laptop', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

DROP TABLE IF EXISTS `tbl_comments`;
CREATE TABLE IF NOT EXISTS `tbl_comments` (
  `forum_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `forum_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forum_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forum_body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`forum_id`, `forum_name`, `forum_number`, `forum_body`, `post_date`, `created_at`, `updated_at`) VALUES
(5, 'Jideofor', '08035643234', 'Sir Please How can we make payment', '2014-08-24 23:00:00', NULL, NULL),
(4, 'Abraham', '07035449154', 'Sir this Plateform is giving hard time to understand, what should i do?', '2019-09-08 23:00:00', NULL, NULL),
(6, 'Elias Ijendu', '07013654870', 'hi guys how is it going here? well i like here', '2019-09-09 23:00:00', NULL, NULL),
(7, 'Elias Ijendu', '08035643234', 'hello', '2019-09-09 23:00:00', NULL, NULL),
(11, 'Mosses', '11111111111', 'qsddcjanjcna', '2019-09-26 11:53:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers_registered`
--

DROP TABLE IF EXISTS `tbl_customers_registered`;
CREATE TABLE IF NOT EXISTS `tbl_customers_registered` (
  `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `last_activities` timestamp NULL DEFAULT NULL,
  `suspension` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customers_registered`
--

INSERT INTO `tbl_customers_registered` (`customer_id`, `customer_name`, `customer_email`, `phone_number`, `password`, `email_verified_at`, `last_activities`, `suspension`, `created_at`, `updated_at`) VALUES
(33, 'Emmanuel', 'emmanuel@gmail.com', '08035643234', 'e807f1fcf82d132f9bb018ca6738a19f', NULL, NULL, 1, NULL, NULL),
(25, 'Jideofor', 'jideofor442@gmail.com', '1234567890', 'e807f1fcf82d132f9bb018ca6738a19f', NULL, NULL, 0, NULL, NULL),
(24, 'Ijendu Elias', 'eliasijendu442@gmail.com', '08035643234', 'e807f1fcf82d132f9bb018ca6738a19f', '2019-09-19 17:08:24', '2019-12-12 14:28:02', 0, NULL, NULL),
(34, 'Obi', 'obi@gmail.com', '07035449154', 'e807f1fcf82d132f9bb018ca6738a19f', '2019-09-18 14:37:16', '2019-10-02 08:34:38', 0, NULL, NULL),
(41, 'Emmanuel', 'marioserverdevelop@gmail.com', '08055842538', 'e807f1fcf82d132f9bb018ca6738a19f', '2019-09-27 11:23:32', '2019-09-27 12:36:03', 0, NULL, NULL),
(47, 'Ebuka', 'comreliasijendu442@gmail.com', '07033332005', 'e807f1fcf82d132f9bb018ca6738a19f', '2019-10-05 10:25:54', '2019-10-05 10:48:51', 0, NULL, NULL),
(48, 'Elias', 'eliasijendu@hotmail.com', '00000000000', 'e807f1fcf82d132f9bb018ca6738a19f', '2019-10-15 11:01:11', '2019-10-15 11:06:44', 1, NULL, NULL),
(49, 'Michael', 'michk@gmail.com', '00000000101', 'e807f1fcf82d132f9bb018ca6738a19f', '2019-10-15 11:08:31', '2019-10-15 11:09:15', 1, NULL, NULL),
(58, 'Chisomg', 'eliasijendu@rocketmail.com', '08035643234', '$2y$10$9bUn4Bu57nNCdo0elKk5Jet409e4BMwJZV6BJ5s3TnsE7I65Xev6u', '2019-12-13 22:11:27', '2019-12-13 23:55:27', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forum_reply`
--

DROP TABLE IF EXISTS `tbl_forum_reply`;
CREATE TABLE IF NOT EXISTS `tbl_forum_reply` (
  `reply_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reply_body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_forum_reply`
--

INSERT INTO `tbl_forum_reply` (`reply_id`, `reply_body`, `reply_date`, `created_at`, `updated_at`) VALUES
(5, '@elias ok', '0000-00-00 00:00:00', NULL, NULL),
(7, '@Mosses, you are welcome here', '2019-09-26 11:58:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `shipping_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=211 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(93, 24, 63, 108, '8,000,000.00', 'pending', NULL, NULL),
(92, 24, 63, 107, '8,000,000.00', 'pending', NULL, NULL),
(91, 24, 63, 106, '8,000,000.00', 'pending', NULL, NULL),
(90, 24, 63, 105, '8,000,000.00', 'pending', NULL, NULL),
(89, 35, 62, 104, '1,200,000.00', 'pending', NULL, NULL),
(88, 35, 61, 103, '0.00', 'pending', NULL, NULL),
(87, 35, 60, 102, '604,000.00', 'pending', NULL, NULL),
(86, 35, 60, 101, '604,000.00', 'pending', NULL, NULL),
(85, 35, 60, 100, '604,000.00', 'pending', NULL, NULL),
(84, 35, 60, 99, '604,000.00', 'pending', NULL, NULL),
(83, 35, 59, 98, '604,000.00', 'pending', NULL, NULL),
(82, 24, 58, 97, '7,200,000.00', 'pending', NULL, NULL),
(81, 24, 58, 96, '7,200,000.00', 'pending', NULL, NULL),
(80, 24, 56, 95, '109,000.00', 'pending', NULL, NULL),
(79, 24, 55, 94, '100,000.00', 'pending', NULL, NULL),
(78, 24, 55, 93, '100,000.00', 'pending', NULL, NULL),
(77, 24, 55, 92, '100,000.00', 'pending', NULL, NULL),
(76, 24, 55, 91, '100,000.00', 'pending', NULL, NULL),
(75, 24, 53, 90, '7,500.00', 'pending', NULL, NULL),
(94, 24, 63, 109, '8,000,000.00', 'pending', NULL, NULL),
(95, 24, 63, 110, '8,000,000.00', 'pending', NULL, NULL),
(96, 24, 63, 111, '8,000,000.00', 'pending', NULL, NULL),
(210, 24, 69, 225, '84,000.00', 'pending', NULL, NULL),
(209, 24, 69, 224, '84,000.00', 'pending', NULL, NULL),
(207, 24, 69, 222, '84,000.00', 'pending', NULL, NULL),
(208, 24, 69, 223, '84,000.00', 'pending', NULL, NULL),
(103, 24, 63, 118, '8,000,000.00', 'pending', NULL, NULL),
(104, 24, 63, 119, '8,000,000.00', 'pending', NULL, NULL),
(105, 24, 63, 120, '8,000,000.00', 'pending', NULL, NULL),
(106, 24, 63, 121, '8,000,000.00', 'pending', NULL, NULL),
(107, 24, 63, 122, '8,000,000.00', 'pending', NULL, NULL),
(108, 24, 63, 123, '8,000,000.00', 'pending', NULL, NULL),
(109, 24, 63, 124, '8,000,000.00', 'pending', NULL, NULL),
(110, 24, 63, 125, '8,000,000.00', 'pending', NULL, NULL),
(111, 24, 63, 126, '8,000,000.00', 'pending', NULL, NULL),
(112, 24, 63, 127, '8,000,000.00', 'pending', NULL, NULL),
(113, 24, 63, 128, '8,000,000.00', 'pending', NULL, NULL),
(114, 24, 63, 129, '8,000,000.00', 'pending', NULL, NULL),
(115, 24, 63, 130, '8,000,000.00', 'pending', NULL, NULL),
(116, 24, 63, 131, '8,000,000.00', 'pending', NULL, NULL),
(117, 24, 63, 132, '8,000,000.00', 'pending', NULL, NULL),
(118, 24, 63, 133, '8,000,000.00', 'pending', NULL, NULL),
(119, 24, 63, 134, '8,000,000.00', 'pending', NULL, NULL),
(120, 24, 63, 135, '8,000,000.00', 'pending', NULL, NULL),
(121, 24, 63, 136, '8,000,000.00', 'pending', NULL, NULL),
(122, 24, 63, 137, '8,000,000.00', 'pending', NULL, NULL),
(123, 24, 63, 138, '8,000,000.00', 'pending', NULL, NULL),
(124, 24, 63, 139, '8,000,000.00', 'pending', NULL, NULL),
(125, 24, 63, 140, '8,000,000.00', 'pending', NULL, NULL),
(126, 24, 63, 141, '8,000,000.00', 'pending', NULL, NULL),
(127, 24, 63, 142, '8,000,000.00', 'pending', NULL, NULL),
(128, 24, 63, 143, '8,000,000.00', 'pending', NULL, NULL),
(129, 24, 63, 144, '8,000,000.00', 'pending', NULL, NULL),
(130, 24, 63, 145, '8,000,000.00', 'pending', NULL, NULL),
(131, 38, 64, 146, '3,000.00', 'pending', NULL, NULL),
(132, 38, 65, 147, '200,000.00', 'pending', NULL, NULL),
(133, 38, 65, 148, '200,000.00', 'pending', NULL, NULL),
(134, 38, 65, 149, '200,000.00', 'pending', NULL, NULL),
(135, 38, 65, 150, '200,000.00', 'pending', NULL, NULL),
(136, 38, 65, 151, '200,000.00', 'pending', NULL, NULL),
(137, 38, 65, 152, '200,000.00', 'pending', NULL, NULL),
(138, 38, 65, 153, '200,000.00', 'pending', NULL, NULL),
(139, 38, 65, 154, '200,000.00', 'pending', NULL, NULL),
(140, 38, 65, 155, '200,000.00', 'pending', NULL, NULL),
(141, 38, 65, 156, '200,000.00', 'pending', NULL, NULL),
(142, 38, 65, 157, '200,000.00', 'pending', NULL, NULL),
(143, 38, 65, 158, '200,000.00', 'pending', NULL, NULL),
(144, 38, 65, 159, '200,000.00', 'pending', NULL, NULL),
(145, 38, 65, 160, '500,000.00', 'pending', NULL, NULL),
(146, 38, 65, 161, '500,000.00', 'pending', NULL, NULL),
(147, 38, 65, 162, '500,000.00', 'pending', NULL, NULL),
(148, 38, 65, 163, '500,000.00', 'pending', NULL, NULL),
(149, 38, 65, 164, '500,000.00', 'pending', NULL, NULL),
(150, 38, 65, 165, '585,000.00', 'pending', NULL, NULL),
(151, 38, 65, 166, '585,000.00', 'pending', NULL, NULL),
(152, 38, 65, 167, '585,000.00', 'pending', NULL, NULL),
(153, 38, 65, 168, '585,000.00', 'pending', NULL, NULL),
(154, 38, 65, 169, '585,000.00', 'pending', NULL, NULL),
(155, 38, 65, 170, '585,000.00', 'pending', NULL, NULL),
(156, 38, 65, 171, '585,000.00', 'pending', NULL, NULL),
(157, 38, 65, 172, '585,000.00', 'pending', NULL, NULL),
(158, 38, 65, 173, '585,000.00', 'pending', NULL, NULL),
(159, 38, 65, 174, '585,000.00', 'pending', NULL, NULL),
(160, 38, 65, 175, '585,000.00', 'pending', NULL, NULL),
(161, 38, 65, 176, '585,000.00', 'pending', NULL, NULL),
(162, 38, 65, 177, '585,000.00', 'pending', NULL, NULL),
(163, 38, 65, 178, '585,000.00', 'pending', NULL, NULL),
(164, 38, 65, 179, '585,000.00', 'pending', NULL, NULL),
(165, 38, 65, 180, '585,000.00', 'pending', NULL, NULL),
(166, 38, 65, 181, '585,000.00', 'pending', NULL, NULL),
(167, 38, 65, 182, '585,000.00', 'pending', NULL, NULL),
(168, 38, 65, 183, '585,000.00', 'pending', NULL, NULL),
(169, 38, 65, 184, '585,000.00', 'pending', NULL, NULL),
(170, 38, 65, 185, '500,000.00', 'pending', NULL, NULL),
(171, 38, 65, 186, '500,000.00', 'pending', NULL, NULL),
(172, 38, 65, 187, '500,000.00', 'pending', NULL, NULL),
(173, 38, 65, 188, '500,000.00', 'pending', NULL, NULL),
(174, 38, 65, 189, '500,000.00', 'pending', NULL, NULL),
(175, 38, 65, 190, '509,000.00', 'pending', NULL, NULL),
(176, 38, 65, 191, '509,000.00', 'pending', NULL, NULL),
(177, 38, 65, 192, '509,000.00', 'pending', NULL, NULL),
(178, 38, 65, 193, '509,000.00', 'pending', NULL, NULL),
(179, 38, 65, 194, '509,000.00', 'pending', NULL, NULL),
(180, 38, 65, 195, '509,000.00', 'pending', NULL, NULL),
(181, 38, 65, 196, '509,000.00', 'pending', NULL, NULL),
(182, 38, 65, 197, '509,000.00', 'pending', NULL, NULL),
(183, 38, 65, 198, '509,000.00', 'pending', NULL, NULL),
(184, 38, 65, 199, '509,000.00', 'pending', NULL, NULL),
(185, 38, 65, 200, '509,000.00', 'pending', NULL, NULL),
(186, 38, 65, 201, '509,000.00', 'pending', NULL, NULL),
(187, 38, 65, 202, '509,000.00', 'pending', NULL, NULL),
(188, 38, 65, 203, '509,000.00', 'pending', NULL, NULL),
(189, 38, 65, 204, '509,000.00', 'pending', NULL, NULL),
(190, 38, 65, 205, '509,000.00', 'pending', NULL, NULL),
(191, 38, 65, 206, '509,000.00', 'pending', NULL, NULL),
(192, 38, 65, 207, '509,000.00', 'pending', NULL, NULL),
(193, 38, 65, 208, '509,000.00', 'pending', NULL, NULL),
(194, 38, 65, 209, '509,000.00', 'pending', NULL, NULL),
(195, 38, 65, 210, '509,000.00', 'pending', NULL, NULL),
(196, 38, 65, 211, '509,000.00', 'pending', NULL, NULL),
(197, 38, 65, 212, '509,000.00', 'pending', NULL, NULL),
(198, 38, 65, 213, '509,000.00', 'pending', NULL, NULL),
(199, 38, 65, 214, '509,000.00', 'pending', NULL, NULL),
(200, 38, 65, 215, '509,000.00', 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

DROP TABLE IF EXISTS `tbl_order_details`;
CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_details_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(69, 210, 9, 'cooking pots', '4000', '1', NULL, NULL),
(68, 210, 10, 'sweaters', '8000', '10', NULL, NULL),
(67, 131, 2, 'shirt', '3000', '1', NULL, NULL),
(66, 80, 11, 'jacket suit', '9000', '1', NULL, NULL),
(65, 80, 6, 'home theater', '100000', '1', NULL, NULL),
(64, 79, 6, 'home theater', '100000', '1', NULL, NULL),
(63, 79, 6, 'home theater', '100000', '1', NULL, NULL),
(62, 79, 6, 'home theater', '100000', '1', NULL, NULL),
(61, 75, 13, 'Natives Male Wear', '7500', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_data` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=226 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `payment_data`, `created_at`, `updated_at`) VALUES
(216, 'paypal', 'pending', NULL, NULL, NULL),
(94, 'paypal', 'approved', '{"status":true,"message":"Verification successful","data":{"id":268774042,"domain":"test","status":"success","reference":"QecPyMi6XFdCaSk2dfy15bENZ","amount":10000000,"message":null,"gateway_response":"Successful","paid_at":"2019-09-18T12:09:03.000Z","created_at":"2019-09-18T12:08:54.000Z","channel":"card","currency":"NGN","ip_address":"105.112.36.31","metadata":{"order_id":79,"payment_id":94,"product":[{"id":6,"name":"home theater","price":100000,"sales_quantity":"1"}]},"log":{"start_time":1568808449,"time_spent":7,"attempts":1,"errors":0,"success":true,"mobile":false,"input":[],"history":[{"type":"action","message":"Attempted to pay with card","time":7},{"type":"success","message":"Successfully paid with card","time":7}]},"fees":160000,"fees_split":null,"authorization":{"authorization_code":"AUTH_t0xg42pkxj","bin":"408408","last4":"4081","exp_month":"12","exp_year":"2020","channel":"card","card_type":"visa DEBIT","bank":"Test Bank","country_code":"NG","brand":"visa","reusable":true,"signature":"SIG_HU93pqLJc8YRaOgc8OhH"},"customer":{"id":12671837,"first_name":null,"last_name":null,"email":"eliasijeneu442@gmail.com","customer_code":"CUS_pgby0wlv84pmll4","phone":null,"metadata":null,"risk_action":"default"},"plan":null,"order_id":null,"paidAt":"2019-09-18T12:09:03.000Z","createdAt":"2019-09-18T12:08:54.000Z","transaction_date":"2019-09-18T12:08:54.000Z","plan_object":[],"subaccount":[]}}', NULL, NULL),
(95, 'paypal', 'approved', '{"status":true,"message":"Verification successful","data":{"id":268787303,"domain":"test","status":"success","reference":"pRPpSz9n6LuQ6pGBdyWl8MN6l","amount":10900000,"message":null,"gateway_response":"Successful","paid_at":"2019-09-18T12:29:34.000Z","created_at":"2019-09-18T12:29:15.000Z","channel":"card","currency":"NGN","ip_address":"105.112.36.31","metadata":{"order_id":80,"payment_id":95,"product":[{"id":6,"name":"home theater","price":100000,"sales_quantity":"1"},{"id":11,"name":"jacket suit","price":9000,"sales_quantity":"1"}]},"log":{"start_time":1568809671,"time_spent":16,"attempts":1,"errors":0,"success":true,"mobile":false,"input":[],"history":[{"type":"action","message":"Attempted to pay with card","time":16},{"type":"success","message":"Successfully paid with card","time":16}]},"fees":173500,"fees_split":null,"authorization":{"authorization_code":"AUTH_kbrfc16gib","bin":"408408","last4":"4081","exp_month":"12","exp_year":"2020","channel":"card","card_type":"visa DEBIT","bank":"Test Bank","country_code":"NG","brand":"visa","reusable":true,"signature":"SIG_HU93pqLJc8YRaOgc8OhH"},"customer":{"id":12671837,"first_name":null,"last_name":null,"email":"eliasijeneu442@gmail.com","customer_code":"CUS_pgby0wlv84pmll4","phone":null,"metadata":null,"risk_action":"default"},"plan":null,"order_id":null,"paidAt":"2019-09-18T12:29:34.000Z","createdAt":"2019-09-18T12:29:15.000Z","transaction_date":"2019-09-18T12:29:15.000Z","plan_object":[],"subaccount":[]}}', NULL, NULL),
(225, 'paypal', 'approved', '{"status":true,"message":"Verification successful","data":{"id":278003386,"domain":"test","status":"success","reference":"mNnIdpPu1HdPidesuZGIuMG8o","amount":8400000,"message":null,"gateway_response":"Successful","paid_at":"2019-09-27T12:04:36.000Z","created_at":"2019-09-27T12:04:16.000Z","channel":"card","currency":"NGN","ip_address":"197.210.58.125","metadata":{"order_id":210,"payment_id":225,"product":[{"id":10,"name":"sweaters","price":8000,"sales_quantity":"10"},{"id":9,"name":"cooking pots","price":4000,"sales_quantity":"1"}]},"log":{"start_time":1569585783,"time_spent":12,"attempts":1,"errors":0,"success":true,"mobile":false,"input":[],"history":[{"type":"action","message":"Attempted to pay with card","time":11},{"type":"success","message":"Successfully paid with card","time":12}]},"fees":136000,"fees_split":null,"authorization":{"authorization_code":"AUTH_z0eoly4kwm","bin":"408408","last4":"4081","exp_month":"12","exp_year":"2020","channel":"card","card_type":"visa DEBIT","bank":"Test Bank","country_code":"NG","brand":"visa","reusable":true,"signature":"SIG_HU93pqLJc8YRaOgc8OhH"},"customer":{"id":12671837,"first_name":null,"last_name":null,"email":"eliasijeneu442@gmail.com","customer_code":"CUS_pgby0wlv84pmll4","phone":null,"metadata":null,"risk_action":"default"},"plan":null,"order_id":null,"paidAt":"2019-09-27T12:04:36.000Z","createdAt":"2019-09-27T12:04:16.000Z","transaction_date":"2019-09-27T12:04:16.000Z","plan_object":[],"subaccount":[]}}', NULL, NULL),
(224, 'paypal', 'pending', NULL, NULL, NULL),
(223, 'paypal', 'pending', NULL, NULL, NULL),
(222, 'paypal', 'pending', NULL, NULL, NULL),
(221, 'paypal', 'pending', NULL, NULL, NULL),
(220, 'paypal', 'pending', NULL, NULL, NULL),
(219, 'paypal', 'pending', NULL, NULL, NULL),
(218, 'paypal', 'pending', NULL, NULL, NULL),
(217, 'paypal', 'pending', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

DROP TABLE IF EXISTS `tbl_posts`;
CREATE TABLE IF NOT EXISTS `tbl_posts` (
  `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_category_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(10) NOT NULL,
  `blog_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`post_id`, `blog_category_id`, `title`, `post_body`, `author`, `post_image`, `customer_id`, `blog_date`, `created_at`, `updated_at`) VALUES
(5, 7, 'social', 'Laravel utilizes Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.\n\nVia Laravel Installer\nFirst, download the Laravel installer using Composer:\n\ncomposer global require "laravel/installer=~1.1"\nMake sure to place the ~/.composer/vendor/bin directory in your PATH so the laravel executable can be located by your system.\n\nOnce installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel''s dependencies already installed. This method of installation is much faster than installing via Composer:\n\nlaravel new blog\nVia Composer Create-Project\nYou may also install Laravel by issuing the Composer creatInstalling Laravel\nLaravel utilizes Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.\n\nVia Laravel Installer\nFirst, download the Laravel installer using Composer:\n\ncomposer global require "laravel/installer=~1.1"\nMake sure to place the ~/.composer/vendor/bin directory in your PATH so the laravel executable can be located by your system.\n\nOnce installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel''s dependencies already installed. This method of installation is much faster than installing via Composer:\n\nlaravel new blog\nVia Composer Create-Project\nYou may also install Laravel by issuing the Composer create-project command in your terminal:e-project command in your terminal:', 'elias', 'blog_img/hm6pjSBggoDIto6iEUcN.jpg', 24, '2019-10-02 08:37:40', NULL, NULL),
(6, 2, 'ELIAS EXAMPLE FOUR', 'directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel''s dependencies already installed. This method of installation is much faster than installing via Composer: laravel new blog Via Composer Create-Project You may also install Laravel by issuing the Composer creatInstalling Laravel Laravel utilizes Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine. Via Laravel Installer First, download the Laravel installer using Composer: composer global require "laravel/installer=~1.1" Make sure to place the ~/.composer/vendor/bin directory in your PATH so the laravel executable can be located by your system. Once installed, the simple laravel new command will create', 'Chisom Aneke', 'blog_img/ySzt19gPaZr2tmLE0H1H.jpg', 24, '2019-10-12 16:03:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products` (
  `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `category_id`, `manufacture_id`, `product_name`, `product_short_description`, `product_long_description`, `product_price`, `product_image`, `product_size`, `product_color`, `publication_status`, `created_at`, `updated_at`) VALUES
(5, 19, 9, 'iphone10x', 'They are the best in the world', 'They are the best in the world', 600000.00, 'image/HtFw0JazOgoZg3zzYofF.jpg', '4.8inches', 'blue, red, white', 1, NULL, NULL),
(2, 13, 15, 'shirt', 'blues polo with neck', 'blues polo with neck', 3000.00, 'image/yNQHqsKXZ1SEcqOOHrjh.jpg', 'body fitted', 'blue, red, white', 1, NULL, NULL),
(3, 14, 7, 'gown', 'just dinner gown', 'just dinner gown', 8000.00, 'image/iQXvY0FVpW2vbu9pdkbm.jpg', '38', 'blue, red, white', 1, NULL, NULL),
(4, 14, 13, 'sleeveless', 'sleeveless female top', 'sleeveless female top', 1000.00, 'image/aMhF3HWptmZrv2mxXMbr.jpg', '17mini', 'ash, white and blue', 1, NULL, NULL),
(6, 19, 1, 'home theater', 'i love Samsung thats all', 'i love Samsung thats all', 100000.00, 'image/MIxGJnTCQrp8FdH2d9Br.jpg', 'long4', 'black', 1, NULL, NULL),
(7, 19, 9, 'laptop', 'i love love apple', 'i love love apple', 350000.00, 'image/wsNwX4Acpdgb8k1Kkemr.jpg', 'large', 'silver, white or ash', 1, NULL, NULL),
(8, 19, 15, 'Refrigerator', 'i need ice type', 'i need ice type', 85000.00, 'image/5xVGBRKhPgzLZV8shmAd.jpg', 'long , double door', 'white, black, or ash', 1, NULL, NULL),
(9, 6, 15, 'cooking pots', '3 set in one', '3 set in one', 4000.00, 'image/qpE4kQGnF3d5GN0fhoYs.jpg', 'big, medium, small', 'silver', 1, NULL, NULL),
(10, 13, 7, 'sweaters', 'sweater', 'sweater', 8000.00, 'image/NOO634jWPvfh9Dk7ipCL.jpg', 'large XL', 'ash, white and blue', 1, NULL, NULL),
(11, 14, 7, 'jacket suit', 'cool', 'cool', 9000.00, 'image/5oyQjV4riUntuWurSdau.jpg', 'moderate', 'milk, pink or green', 1, NULL, NULL),
(12, 6, 15, 'Chair', 'i love chair', 'i love chair', 1300.00, 'image/P2YxAJUqUSL102Tcy6Qv.jpg', 'chair', 'cream, white and yellow', 1, NULL, NULL),
(13, 13, 7, 'Natives Male Wear', 'native men wear', 'native men wear', 7500.00, 'image/cDsSE5xPt6HkOBotbOWz.jpg', 'large', 'blue, red, white', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_reg`
--

DROP TABLE IF EXISTS `tbl_sale_reg`;
CREATE TABLE IF NOT EXISTS `tbl_sale_reg` (
  `sale_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sale_email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agreed_status` int(1) DEFAULT '0',
  `sale_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sale_reg`
--

INSERT INTO `tbl_sale_reg` (`sale_id`, `sale_email`, `sale_phone`, `location1`, `location2`, `sale_country`, `state`, `local`, `sale_zip_code`, `agreed_status`, `sale_description`, `created_at`, `updated_at`) VALUES
(1, 'eliasijendu442@gmail.com', '08035643234', 'testin address', 'testin address2', 'Nigeria', 'Anambra State', 'Anambra East', '320211', 1, 'testing', NULL, NULL),
(2, 'eliasijendu442@gmail.com', '08035643234', 'testin address', 'testin address2', 'Nigeria', 'Adamawa State', 'Fufure', '320211', 1, 'testing', NULL, NULL),
(14, 'eliasijendu442@gmail.com', '08035643234', 'testin address', 'testin address2', 'Nigeria', 'Imo State', 'Ahiazu Mbaise', '320211', 1, 'dhfgjhk', NULL, NULL),
(13, 'eliasijendu442@gmail.com', '08035643234', 'testin address', 'testin address2', 'Nigeria', 'Imo State', 'Ahiazu Mbaise', '320211', 1, 'wdewfrgthygj', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

DROP TABLE IF EXISTS `tbl_shipping`;
CREATE TABLE IF NOT EXISTS `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_email`, `shipping_first_name`, `shipping_last_name`, `shipping_address`, `shipping_city`, `shipping_phone_number`, `created_at`, `updated_at`) VALUES
(69, 'eliasijeneu442@gmail.com', 'elias', 'ijendu', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba', '08035643234', NULL, NULL),
(68, 'eliasijeneu442@gmail.com', 'elias', 'ijendu', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba', '08035643234', NULL, NULL),
(67, 'eliasijeneu442@gmail.com', 'elias', 'ijendu', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba', '08035643234', NULL, NULL),
(66, 'eliasijeneu442@gmail.com', 'elias', 'ijendu', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba', '08035643234', NULL, NULL),
(64, 'eliasijeneu442@gmail.com', 'Moses', 'ijendu', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba', '08035643234', NULL, NULL),
(65, 'eliasijeneu442@gmail.com', 'elias', 'Fred', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba', '08035643234', NULL, NULL),
(63, 'eliasijeneu442@gmail.com', 'elias', 'ijendu', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba', '08035643234', NULL, NULL),
(62, 'eliasijeneu442@gmail.com', 'elias', 'ijendu', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba', '08035643234', NULL, NULL),
(61, 'eliasijendu442@gmail.com', 'elias', 'ijendu', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba', '08035643234', NULL, NULL),
(60, 'chisom@ksmartsolution', 'Chisom', 'Aneke', 'ksmartsolution enugu', 'Enugu', '08035643234', NULL, NULL),
(59, 'Chisom@ksmartsolution', 'Chisom', 'Aneke', 'ksmartsolution enugu', 'Enugu', '08035643234', NULL, NULL),
(58, 'eliasijeneu442@gmail.com', 'elias', 'ijendu', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba', '08035643234', NULL, NULL),
(56, 'eliasijeneu442@gmail.com', 'elias', 'ijendu', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba', '08035643234', NULL, NULL),
(57, 'eliasijeneu442@gmail.com', 'elias', 'ijendu', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba', '08035643234', NULL, NULL),
(55, 'eliasijeneu442@gmail.com', 'elias', 'ijendu', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba', '08035643234', NULL, NULL),
(54, 'eliasijeneu442@gmail.com', 'elias', 'ijendu', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba', '08035643234', NULL, NULL),
(53, 'eliasijeneu442@gmail.com', 'elias', 'ijendu', 'no 3, 4 ogbe ofustree asaba delta state, Nigeria', 'asaba, Delta State', '08035643234', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(2) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(13, 'slider/hvXkIzEz2u5NrYYLIMhk.png', 1, NULL, NULL),
(14, 'slider/20uXaneELlsybFMOJ0y0.jpg', 0, NULL, NULL),
(15, 'slider/AJc5xhowZrswPoSqW31D.png', 0, NULL, NULL),
(16, 'slider/9BpG7OM2bdClRzkHs7tI.jpg', 0, NULL, NULL),
(17, 'slider/EIywBU8NqQypvkE7RGVn.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_upload`
--

DROP TABLE IF EXISTS `tbl_users_upload`;
CREATE TABLE IF NOT EXISTS `tbl_users_upload` (
  `users_upload_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `users_product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_seller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_seller_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_image_front` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_image_back` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_product_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`users_upload_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `_tbl_blog_category`
--

DROP TABLE IF EXISTS `_tbl_blog_category`;
CREATE TABLE IF NOT EXISTS `_tbl_blog_category` (
  `blog_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`blog_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `_tbl_blog_category`
--

INSERT INTO `_tbl_blog_category` (`blog_category_id`, `slug`, `category_date`, `created_at`, `updated_at`) VALUES
(1, 'Technolgy', '2019-09-30 14:23:32', NULL, NULL),
(2, 'Finance', '2019-09-30 14:23:32', NULL, NULL),
(3, 'Education', '2019-09-30 14:23:32', NULL, NULL),
(4, 'News', '2019-09-30 14:23:32', NULL, NULL),
(7, 'story line', '2019-09-30 15:02:21', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
