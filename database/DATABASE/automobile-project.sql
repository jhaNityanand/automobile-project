-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2022 at 12:05 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automobile-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

DROP TABLE IF EXISTS `admin_register`;
CREATE TABLE IF NOT EXISTS `admin_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `con_pass` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`id`, `name`, `gender`, `phone`, `email`, `password`, `con_pass`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nityanand Jha', 'Male', 9016201780, 'jha@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 1, '2022-01-19 05:03:23', '2022-04-17 14:05:22'),
(2, 'Alpesh Mishra', 'Male', 9016201780, 'mishra@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 0, '2022-01-19 05:05:12', '2022-04-02 11:21:05'),
(22, 'Saurabh Updhay', 'Male', 9016201780, 'updhaya@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 0, '2022-01-24 11:58:31', '2022-01-24 11:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `total_product` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `logo`, `status`, `total_product`, `created_at`, `updated_at`) VALUES
(1, 'C E A T', 'y36Z6COXx3.png', 0, 1, '2022-03-31 17:22:23', '2022-04-02 15:58:38'),
(2, 'M R F', 'k0rRDdiRkA.png', 0, 1, '2022-03-31 17:22:44', '2022-04-24 10:51:28'),
(3, 'T A T A', '8HUsGeTH0r.png', 0, 5, '2022-03-31 17:23:18', '2022-04-24 10:46:28'),
(4, 'Castrol', 'td0EcKfiN6.png', 0, 2, '2022-03-31 17:23:41', '2022-04-24 09:50:41'),
(5, 'Medisize', 'juu0GQHITu.jpg', 0, 1, '2022-03-31 17:26:43', '2022-04-24 08:12:45'),
(6, 'B M W', 'xsAAqWQ3BW.webp', 0, 3, '2022-03-31 17:28:21', '2022-04-24 08:42:33'),
(7, 'Ford', '1g7wTPTp6m.jpg', 0, 1, '2022-03-31 17:29:34', '2022-04-24 08:57:30'),
(8, 'Mahindra', 'r6cybmXcRs.png', 0, 1, '2022-03-31 17:39:59', '2022-04-24 06:29:29'),
(9, 'W A B C O', 'hnX2Tf1K7C.jpg', 0, 2, '2022-03-31 17:43:23', '2022-04-24 09:57:08'),
(10, 'Endurance', 'CtEUDU5cvm.png', 0, 1, '2022-03-31 17:44:27', '2022-04-24 08:49:16'),
(11, 'Varroc', 'nM1643Wd1y.jpg', 0, 2, '2022-03-31 17:45:51', '2022-04-24 08:22:51'),
(12, 'Motherson', 'jLcfuU66nR.png', 0, 2, '2022-03-31 17:47:25', '2022-04-24 09:39:23'),
(13, 'Hero', 'L4Ubl79qlc.png', 0, 1, '2022-04-02 14:39:50', '2022-04-24 08:30:43'),
(14, 'Honda', '9oAjXkwQui.png', 0, 1, '2022-04-02 14:40:46', '2022-04-24 09:17:16'),
(15, 'Bajaj', 'laKri4fU92.jpg', 0, 3, '2022-04-24 05:49:21', '2022-04-24 10:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL DEFAULT '1',
  `total_price` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `product_qty`, `total_price`, `created_at`, `updated_at`) VALUES
(9, 2, 28, 1, 2400, '2022-04-24 11:29:18', '2022-04-24 11:29:18'),
(7, 1, 7, 1, 9999, '2022-04-24 11:03:05', '2022-04-24 11:03:05'),
(6, 1, 14, 1, 7500, '2022-04-24 11:02:51', '2022-04-24 11:02:51'),
(5, 1, 19, 1, 6720, '2022-04-24 11:02:46', '2022-04-24 11:02:46'),
(10, 2, 10, 1, 4999, '2022-04-24 11:29:23', '2022-04-24 11:29:23'),
(12, 2, 23, 1, 3000, '2022-04-24 11:32:24', '2022-04-24 11:32:24'),
(19, 3, 27, 1, 12025, '2022-04-24 11:39:46', '2022-04-24 11:39:46'),
(18, 3, 12, 1, 1999, '2022-04-24 11:39:40', '2022-04-24 11:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `total_product` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `total_product`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Four Wheeler', 8, 0, '2022-03-30 03:14:41', '2022-04-24 09:46:34'),
(2, 'Heavy Vehicles', 7, 0, '2022-03-30 03:15:01', '2022-04-24 10:46:28'),
(3, 'Three Wheeler', 6, 0, '2022-03-30 03:15:33', '2022-04-24 10:51:28'),
(4, 'Two Wheeler', 6, 0, '2022-03-30 03:15:55', '2022-04-24 09:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `total_user` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `total_user`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mumbai', 0, 0, '2022-02-08 20:04:18', '2022-02-08 20:04:18'),
(2, 'Delhi', 0, 0, '2022-02-08 20:04:24', '2022-02-08 20:04:24'),
(3, 'Surat', 0, 0, '2022-02-08 20:04:28', '2022-02-08 20:04:28'),
(4, 'Ahemdabad', 0, 0, '2022-02-08 20:04:37', '2022-02-08 20:04:37'),
(5, 'Lucknow', 0, 0, '2022-02-08 20:04:51', '2022-02-08 20:04:51'),
(6, 'Kolkata', 0, 0, '2022-02-08 20:05:03', '2022-02-08 20:05:03'),
(7, 'Banglor', 0, 0, '2022-02-08 20:06:32', '2022-02-08 14:36:44'),
(8, 'Patna', 0, 0, '2022-03-31 17:34:44', '2022-03-31 17:34:44'),
(9, 'Indor', 0, 0, '2022-03-31 17:34:59', '2022-03-31 17:34:59'),
(10, 'Puna', 0, 0, '2022-03-31 17:35:39', '2022-03-31 17:35:39'),
(11, 'Amritsar', 0, 0, '2022-03-31 17:36:08', '2022-03-31 17:36:08'),
(12, 'Srinagar', 0, 0, '2022-03-31 17:36:37', '2022-03-31 17:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 'Add More Product', '2022-04-15 17:29:00', '2022-04-15 17:29:00'),
(2, 1, 'Hello Everyone', '2022-04-15 17:29:23', '2022-04-15 17:29:23'),
(3, 1, 'Just Testing', '2022-04-15 17:29:36', '2022-04-15 17:29:36'),
(4, 1, 'Work Hard and Complete your Project', '2022-04-24 11:13:37', '2022-04-24 11:13:37'),
(5, 2, 'Making Fast E-Commerce Website or App Like Amazon, Flipkart, etc.', '2022-04-24 11:31:34', '2022-04-24 11:31:34'),
(6, 2, 'Making Fast E-Commerce Website or App Like Amazon, Flipkart, etc.', '2022-04-24 11:31:34', '2022-04-24 11:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(300) NOT NULL,
  `product_name` varchar(3000) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `price` varchar(500) NOT NULL,
  `total_price` varchar(500) NOT NULL,
  `pay_type` int(11) NOT NULL,
  `order_date` timestamp NOT NULL,
  `payment_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `del_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `product_id`, `product_name`, `quantity`, `price`, `total_price`, `pay_type`, `order_date`, `payment_id`, `status`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 1, '16', 'Silver Matty Car Cover Without Mirror Pocket Dustproof & Heat Resistant Car Body Cover', '3', '750', '2250', 7, '2022-04-23 22:54:00', 0, 2, 0, '2022-04-24 10:54:47', '2022-04-24 11:02:33'),
(2, 1, '2,15,11,9', 'Full Synthetic Engine Oil for Petrol or Diesel and CNG Cars (3L),130mm Robot Wheel for ATV and DIY Robotics (Tyre | Tube | Rim | Full Set - 1 Piece),K D Tail light/ Back light assembly For Renault KWID (Right or Left/ Driver Side),PRIGAN Silver Black Wheel Cover 17\"  for All 17 Inch Cars Like Scorpio and XUV500', '4,1,2,1', '500,6799,7500,12599', '2000,6799,15000,12599', 4, '2022-04-23 22:56:00', 1, 2, 0, '2022-04-24 05:26:40', '2022-04-24 11:00:20'),
(3, 1, '5', 'Truck Mirror High Resolution | Tiksha Truck Side Mirror', '3', '4500', '13500', 1, '2022-04-23 22:58:00', 2, 3, 0, '2022-04-24 05:28:29', '2022-04-24 12:00:50'),
(4, 1, '6', 'Bajaj Three-Wheeler Head Light', '6', '1499', '8994', 3, '2022-04-23 22:58:00', 3, 3, 0, '2022-04-24 05:29:14', '2022-04-24 11:01:28'),
(5, 1, '14', 'Petslover Front Waterproof Seat Cover Oxford Fabric Material', '1', '7500', '7500', 7, '2022-04-23 22:59:00', 0, 1, 0, '2022-04-24 10:59:45', '2022-04-24 11:01:00'),
(6, 1, '28', '4.00-8 Three Wheeler Tyre', '1', '2400', '2400', 2, '2022-04-23 23:03:00', 4, 0, 0, '2022-04-24 05:34:20', '2022-04-24 05:34:20'),
(7, 1, '12', 'PA Bike LED Hand Guard Protector Universal for All KTM Models (Pack of 2) Red Colour R-51', '2', '1999', '3998', 5, '2022-04-23 23:06:00', 5, 1, 0, '2022-04-24 05:36:36', '2022-04-24 11:27:00'),
(8, 1, '26', 'RNM ALLIANCE (Renault or Nissan or Mitsubishi) Wiper Arm | HLDR BLADE', '1', '675', '675', 7, '2022-04-23 23:24:00', 0, 1, 0, '2022-04-24 11:24:08', '2022-04-24 11:41:59'),
(9, 1, '3', 'UltraMile UM 4X4 A/T BULL', '4', '34999', '139996', 3, '2022-04-23 23:24:00', 6, 0, 0, '2022-04-24 05:56:34', '2022-04-24 05:56:34'),
(10, 2, '9', 'PRIGAN Silver Black Wheel Cover 17\"  for All 17 Inch Cars Like Scorpio and XUV500', '1', '12599', '12599', 7, '2022-04-23 23:31:00', 0, 0, 0, '2022-04-24 11:31:59', '2022-04-24 11:31:59'),
(11, 2, '15', '130mm Robot Wheel for ATV and DIY Robotics (Tyre | Tube | Rim | Full Set - 1 Piece)', '3', '6799', '20397', 4, '2022-04-23 23:32:00', 7, 1, 0, '2022-04-24 06:02:49', '2022-04-24 11:41:49'),
(12, 2, '19', 'Tata Cooling Fan | ASSY CONDENSER SHROUD COMPLETE BEHR', '1', '6720', '6720', 4, '2022-04-23 23:33:00', 8, 0, 0, '2022-04-24 06:03:36', '2022-04-24 06:03:36'),
(13, 3, '5,16,18,3,6', 'Truck Mirror High Resolution | Tiksha Truck Side Mirror,Silver Matty Car Cover Without Mirror Pocket Dustproof & Heat Resistant Car Body Cover,Eagle Flip-Up With Clear Visor Motorsports Helmet (Black),UltraMile UM 4X4 A/T BULL,Bajaj Three-Wheeler Head Light', '1,2,1,1,1', '4500,750,2500,34999,1499', '4500,1500,2500,34999,1499', 3, '2022-04-23 23:36:00', 9, 1, 0, '2022-04-24 06:07:15', '2022-04-24 12:00:30'),
(14, 3, '1', 'Motorcycle Front Disc Brake', '1', '1499', '1499', 7, '2022-04-23 23:40:00', 0, 2, 0, '2022-04-24 11:40:20', '2022-04-24 11:42:46'),
(15, 3, '25', 'MGP Wiper Motor | MOTOR ASSY WIPER', '1', '2500', '2500', 4, '2022-04-23 23:40:00', 10, 0, 0, '2022-04-24 06:11:08', '2022-04-24 06:11:08'),
(16, 1, '5', 'Truck Mirror High Resolution | Tiksha Truck Side Mirror', '1', '4500', '4500', 3, '2022-04-24 00:01:00', 11, 0, 0, '2022-04-24 06:31:27', '2022-04-24 06:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `order_cancel`
--

DROP TABLE IF EXISTS `order_cancel`;
CREATE TABLE IF NOT EXISTS `order_cancel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `reason` varchar(350) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_cancel`
--

INSERT INTO `order_cancel` (`id`, `user_id`, `order_id`, `reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'More Costly', 0, '2022-04-24 11:00:20', '2022-04-24 11:00:20'),
(2, 1, 1, 'Just Testing', 0, '2022-04-24 11:02:33', '2022-04-24 11:02:33'),
(3, 3, 14, 'Testing Product', 0, '2022-04-24 11:42:46', '2022-04-24 11:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_return`
--

DROP TABLE IF EXISTS `order_return`;
CREATE TABLE IF NOT EXISTS `order_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `reason` varchar(350) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_return`
--

INSERT INTO `order_return` (`id`, `user_id`, `order_id`, `reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Defect Product', 0, '2022-04-24 11:01:28', '2022-04-24 11:01:28'),
(2, 1, 3, 'Late Delivered', 0, '2022-04-24 11:02:08', '2022-04-24 11:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `razorpay_payment_id` varchar(200) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `method` varchar(300) DEFAULT NULL,
  `status` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `razorpay_payment_id`, `amount`, `method`, `status`, `email`, `contact`, `created_at`, `updated_at`) VALUES
(1, 1, 'pay_JNAU9sC1NR6z4S', '36398', 'netbanking', 'authorized', 'jha@gmail.com', 9898058049, '2022-04-24 05:26:40', '2022-04-24 05:26:40'),
(2, 1, 'pay_JNAW4sXP3GSJNU', '13500', 'upi', 'authorized', 'jha@gmail.com', 9898058049, '2022-04-24 05:28:29', '2022-04-24 05:28:29'),
(3, 1, 'pay_JNAWsmnUIx0Akt', '8994', 'upi', 'authorized', 'jha@gmail.com', 9898058049, '2022-04-24 05:29:14', '2022-04-24 05:29:14'),
(4, 1, 'pay_JNAc6SbHIn478T', '2400', 'wallet', 'authorized', 'jha@gmail.com', 9898058049, '2022-04-24 05:34:20', '2022-04-24 05:34:20'),
(5, 1, 'pay_JNAefAehzguAte', '3998', 'upi', 'authorized', 'jha@gmail.com', 9898058049, '2022-04-24 05:36:36', '2022-04-24 05:36:36'),
(6, 1, 'pay_JNAzoCOlPs3vzz', '139996', 'paylater', 'authorized', 'jha@gmail.com', 9016201780, '2022-04-24 05:56:34', '2022-04-24 05:56:34'),
(7, 2, 'pay_JNB6M4YuMWwdq6', '20397', 'upi', 'authorized', 'sakshi@gmail.com', 9898058049, '2022-04-24 06:02:49', '2022-04-24 06:02:49'),
(8, 2, 'pay_JNB7BOyxM1E3eO', '6720', 'netbanking', 'authorized', 'sakshi@gmail.com', 9898058049, '2022-04-24 06:03:36', '2022-04-24 06:03:36'),
(9, 3, 'pay_JNBB1ZMQ242rV2', '44998', 'paylater', 'authorized', 'rakesh@gmail.com', 9375472645, '2022-04-24 06:07:15', '2022-04-24 06:07:15'),
(10, 3, 'pay_JNBF7oPusZPiEO', '2500', 'upi', 'authorized', 'rakesh@gmail.com', 9375472645, '2022-04-24 06:11:08', '2022-04-24 06:11:08'),
(11, 1, 'pay_JNBaasnwx5bZgi', '4500', 'upi', 'authorized', 'jha@gmail.com', 9898058049, '2022-04-24 06:31:27', '2022-04-24 06:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `pay_type`
--

DROP TABLE IF EXISTS `pay_type`;
CREATE TABLE IF NOT EXISTS `pay_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_type`
--

INSERT INTO `pay_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'G-Pay', '2022-02-08 20:02:51', '2022-02-08 20:02:51'),
(2, 'Phone Pay', '2022-02-08 20:03:02', '2022-02-08 20:03:02'),
(3, 'Paytm', '2022-02-08 20:03:11', '2022-02-08 20:03:11'),
(4, 'Amazon Pay', '2022-02-08 20:03:23', '2022-02-08 20:03:23'),
(5, 'Bhim (upi)', '2022-02-08 20:03:57', '2022-02-08 20:03:57'),
(6, 'Bharat Pay', '2022-03-31 17:33:02', '2022-03-31 17:33:02'),
(7, 'Cash On Develary', '2022-03-31 17:33:38', '2022-03-31 12:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` varchar(10) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `cat` varchar(100) NOT NULL,
  `sub_cat` varchar(100) NOT NULL,
  `image` varchar(300) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `user_id`, `name`, `description`, `price`, `brand`, `cat`, `sub_cat`, `image`, `status`, `user_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Motorcycle Front Disc Brake', 'Motorcycle Front Disc Brake Caliper Assembly Compatible for TVS Apache RTR (All Models) BS4 Brake Caliper', '1499', 'Motherson', 'Two Wheeler', 'Sport', 'zDn9otStYs.jpg,Wc3ZRKMJhV.jpg,VbEvdWmxcj.jpg,YFR9fmHHPk.jpg,k1LAurDHzq.jpg', 'In Stock', 'Alpesh Mishra', '2022-04-02 15:13:20', '2022-04-02 09:46:33'),
(2, 2, 'Full Synthetic Engine Oil for Petrol or Diesel and CNG Cars (3L)', 'Viscosity	5W-30 , \r\nLiquid Volume	3000 Millilitres , \r\nAbout this item , \r\nFull synthetic engine oil provides Non-Stop protection from every start, even for vehicles with modern stop-start technology\r\nDUALSHOCK Technology delivers 50% better protection from warm-up1 and stop-start2 wear\r\nUp to 60L annual fuel saving3 during busy stop-start driving, Cling to engine parts when the oil drains down', '500', 'Castrol', 'Four Wheeler', 'SUV', 'VyUXy5DyAK.webp,WPiffAdQQh.jpg,A4j6uzbR2w.webp,vzJ3O9ClHs.jpg,x99GvbuMwC.jpg', 'In Stock', 'Alpesh Mishra', '2022-04-02 15:37:06', '2022-04-23 23:51:49'),
(3, 2, 'UltraMile UM 4X4 A/T BULL', 'Ultra Mile’s UM 4x4 A/T BULL is an all-terrain tire designed to cater to the versatile SUV segment from the mini SUVs to the 4 wheel drive SUV as the tire rim sizes are available in 15 to 20 inches. These all-terrain tires are budget-friendly without compromising on the overall performance. The tires are capable of handling the highways and the off-roads with the ultimate confidence. UM, 4x4 A/T BULL tires are known for the high mileage and handling potential exhibited both on and off roads.', '34999', 'C E A T', 'Heavy Vehicles', 'Car Transporter/Car Carrier Trailer', 'SFmGIEMYWD.jpg,0pg4963mVj.jpg,A13VSa80ba.jpg,iI2Os9XKWO.webp,jecaQs2xN7.webp', 'In Stock', 'Alpesh Mishra', '2022-04-02 15:58:38', '2022-04-17 08:36:10'),
(4, 2, 'Stage 2604C 275W Wired Woofer - Black (Tricycle)', 'About this item, \r\nPower Handling:45Wrms, 270W peak Yes, \r\nImpedance 4ohms, \r\nSensitivity (@ 2.83V) 91dB, \r\nFrequency Response 55Hz – 20kHz,', '2999', 'Varroc', 'Three Wheeler', 'Tricycle Motorcycle', 't7fVqrrjFn.webp,N2mLuI9zIc.jpg,mHEzG1aSpq.jpg,1SRCj3iF3Y.jpg,8aQjDveI8i.jpg', 'In Stock', 'Alpesh Mishra', '2022-04-02 16:05:32', '2022-04-24 00:35:58'),
(5, 1, 'Truck Mirror High Resolution | Tiksha Truck Side Mirror', 'Truck Mirror High Resolution,\r\nMirror For Busses and trucks,\r\nHigh Quality,\r\nExport Quality,\r\nSize - Standard,\r\nMaterial - CASTING,\r\nVehicle Service Type - Truck,', '4500', 'T A T A', 'Heavy Vehicles', 'Car Transporter/Car Carrier Trailer', 'NxuUjLWaLN.jpg,bUp9Ngoyv8.jpg,aaCSHXxbdQ.jpg,UcAEtwSMNI.webp,Sb6ri7pWDq.jpg,ZStPZpyPjb.jpg', 'In Stock', 'Nityanand Jha', '2022-04-13 05:41:44', '2022-04-24 06:29:32'),
(6, 1, 'Bajaj Three-Wheeler Head Light', 'Product Description\r\nBajaj three-wheeler:\r\n4 stroke petrol & CNG engine, \r\nRear & front-engine , \r\nComplete range of spares, \r\nHigh quality.', '1499', 'Bajaj', 'Three Wheeler', 'Fule Auto', 'wI3LOTCbOP.jpg,wuUHUZ7Mx9.jpg,061NvqjLTr.jpg,oZ7Rz3xFUK.jpg,ykgcPLHzpj.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 05:54:10', '2022-04-24 05:54:10'),
(7, 1, 'GMC (Chevrolet - Opel) Fuel Tank or UNIT FUEL TANK SUB T97595310 4.2', 'GoMechanic Spares offer 100% genuine spare parts at the best prices with pan-India delivery. This India Gmc (Chevrolet, Opel) Fuel Tank, Unit Fuel Tank Sub T97595310 (T97595310) from Gmc (Chevrolet, Opel) is compatible with your car. The Gmc (Chevrolet, Opel) Fuel Tank, Unit Fuel Tank Sub T97595310 comes at a competitive price of ?1591 and is sold by our trusted seller, Parcit.', '9999', 'B M W', 'Four Wheeler', 'Sports Car', 'tKizR1ZYxh.jpg,V5Vtipw38x.jpg,ifjjjOCnZi.jpg,HZFbAqDmf6.jpg,67bbpqHhXd.webp,Fhi34Uv0oC.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 06:04:03', '2022-04-24 06:04:03'),
(8, 1, 'AllExtreme EXRSAS1 2 Pcs Silver Adjustable Suspension Spring Rear Shocker Set', 'Buy AllExtreme EXRSAS1 2 Pcs Silver Adjustable Suspension Spring Rear Shocker Set online in India at wholesale rates. If you have been looking for AllExtreme EXRSAS1 2 Pcs Silver Adjustable Suspension Spring Rear Shocker Set dealers, your search ends here as you can get the best AllExtreme EXRSAS1 2 Pcs Silver Adjustable Suspension Spring Rear Shocker Set distributors in top cities such as Delhi NCR, Mumbai, Chennai, Bengaluru, Kolkata, Chennai, Pune, Jaipur, Hyderabad, and Ahmedabad. You can pu', '4000', 'B M W', 'Two Wheeler', 'Dirt Dike', '8DcVZGLEBv.png,VTaLCpCEwa.png,c0L8NOeowG.png,Meggr1osJu.webp,qstLDOAxww.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 06:13:46', '2022-04-24 06:13:46'),
(9, 1, 'PRIGAN Silver Black Wheel Cover 17\"  for All 17 Inch Cars Like Scorpio and XUV500', 'About this item::\r\nCompatible with all cars having a wheel size of 17 inches.\r\nMADE IN INDIA, \r\nEASY TO INSTALL, \r\nPREMIUM QUALITY ABS WHEEL COVERS,', '12599', 'Mahindra', 'Four Wheeler', 'Pickup Truck', 'trGOPrJV3D.webp,bMFumoOosY.webp,XE1P2gXOWq.webp,ygIntdVrUq.webp,5RrhtcjAR5.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 06:29:29', '2022-04-24 06:29:29'),
(10, 1, 'TATA MOTORS SPORTS STEERING WHEEL (D-CUT) Vehicle Steering Wheel For Heavy Vehicles', 'PORTS STEERING WHEEL MARUTI HYUNDAI TO-YOTA MAHIND-RA VEHICLE', '4999', 'T A T A', 'Heavy Vehicles', 'Extra Duty Truck', 'ycs5WoiBoU.webp,olMyfzPlio.jpg,u85fY6K81E.jpg,t8qzfvHbwF.jpg,H3RnDNDauY.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 08:00:55', '2022-04-24 08:00:55'),
(11, 1, 'K D Tail light/ Back light assembly For Renault KWID (Right or Left/ Driver Side)', 'About this item:::\r\nVehicle Compatibility: KWID, \r\nSide- Right/ Driver Side, \r\nWEATHER RESISTANT: These headlights can withstand extreme weather conditions for a long time ensuring reduced change interval, \r\nBREAKPROOF: We ensure high quality engineered product range. Headlights have Top Coated Reflectors and Break Proof Glass, \r\nSCRATCH-RESISTANT: These Headlights are made up of Hard Coated Lens which provides Enhanced resistance to scratches.', '7500', 'Medisize', 'Four Wheeler', 'SUV', 'iM61JngFn0.jpg,yMTm8FVSX6.jpeg,4JF0pvk6em.jpg,PVb4ZNioUz.webp,YPXkLcR8zS.jpg,ZkwmZOq9EQ.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 08:12:45', '2022-04-24 08:14:30'),
(12, 1, 'PA Bike LED Hand Guard Protector Universal for All KTM Models (Pack of 2) Red Colour R-51', 'About this item:::\r\nProtect hands and levers, reduce hand/finger fatigue, ensure greater motorcycle handling\r\nMotorcycle racing handguards with turn signals, package: 2 pcs handle guard\r\nProtect hands and levers, reduce hand/finger fatigue, and ensure greater motorcycle handling. - easy to install, \r\nIncluded Components: 2 Hand Guard Protector; Part Number: Pa-Hand-Guard-Original-Ktm-Red-51; Fit Type: Vehicle Specific', '1999', 'Varroc', 'Two Wheeler', 'Sport', 'qEqFPF8Sf2.jpg,u70ayKuv4X.jpg,NrDDvu9v5m.jpg,GZTeeo6FQw.jpg,VfWkS3O3G1.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 08:22:51', '2022-04-24 08:22:51'),
(13, 1, 'Ahuja Enterprise Leg Guard for Hero Bike Original Fitting OE BS6 Model Bike Safety Guard | X blade', 'About this item:::\r\nVehicle Compatibility - Honda X BLADE BS6, \r\nEach pack of Ahuja enterprise Leg Guard for Honda X BLADE BS6 Contains 1 pc Of Leg Guard and 1 pc of long nut-bolt for lower fitment, \r\nEasy to install and perfect fitting, \r\nSize - Premium\r\nColour - Glossy black\r\nMaterial - Mild steel\r\nClosure Type - Hook and Loop', '1299', 'Hero', 'Two Wheeler', 'Dual-Purpose', 'TafQTpJSwV.webp,usCzUOyrxn.jpg,324XSOVd10.jpg,v9xeH2tlsE.jpg,ah27MHvQFO.jpg', 'Out of Stock', 'Nityanand Jha', '2022-04-24 08:30:43', '2022-04-24 05:40:06'),
(14, 1, 'Petslover Front Waterproof Seat Cover Oxford Fabric Material', 'About this item:::\r\nEasy to Vacuum and Spot Clean with a Damp Cleaning Cloth, \r\nQuilted Pattern for a High-End Luxury Feel, \r\nMade By 800 Oxford Fabric Material, \r\nVery Easy to Install And Even Easier to Clean. Machine Washable, \r\nProtects front Passenger Seats from Spills, Dirt, Scratches, Hair, and Other Messes.', '7500', 'B M W', 'Four Wheeler', 'Convertible', '4luPfCxDng.webp,6J4KJhABT4.webp,wDKFJTpfzv.jpg,ZmFjijZOvX.jpg', 'Out of Stock', 'Nityanand Jha', '2022-04-24 08:42:33', '2022-04-24 05:37:56'),
(15, 1, '130mm Robot Wheel for ATV and DIY Robotics (Tyre | Tube | Rim | Full Set - 1 Piece)', 'These large (130mm-diameter) wheels can be used as replacement parts or for custom robots that need to traverse complex, rugged terrain. The black tires are made of soft, spiked rubber for increased traction.\r\nAn included adapter lets you easily mount the wheel to motors with a 3mm, 4mm or 6mm output shaft.', '6799', 'Endurance', 'Three Wheeler', 'Tricycle Motorcycle', 'mWY91VLHjc.webp,IQpgfRbIf2.webp,dttxIqXCAl.webp,CPpeMdefyT.webp', 'In Stock', 'Nityanand Jha', '2022-04-24 08:49:16', '2022-04-24 08:49:16'),
(16, 1, 'Silver Matty Car Cover Without Mirror Pocket Dustproof & Heat Resistant Car Body Cover', 'Name : BOWRAIN Premium Silver Matty Car Cover Without Mirror Pocket Dustproof & Heat Resistant Car Body Cover for Maruti Suzuki Alto, (Silver Matty), (Tripple Stitched), \r\nAntenna Slot Available : No, \r\nUV Ray Protection : Yes, \r\nStorage Bag Included : No, \r\nTear Resistant : Yes, \r\nWeather Resistant : Yes, \r\nSuitable For : Car Cover, \r\nFastening Type : Buckle,', '750', 'Ford', 'Four Wheeler', 'Convertible', 'k4EW4Hhbl2.jpg,a8wjXiC7fH.jpg,6rI4cPUXYE.jpg,rsatmCGE9s.jpg,oIk6Tb1xAJ.jpg,rla41h8K7t.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 08:57:30', '2022-04-24 08:57:30'),
(17, 1, 'Uno Minda Taillight | TAIL LIGHT RH TL6691M For Tata Super Ace', 'This Uno Minda Taillight, Tail Light Rh Tl6691M For Tata Super Ace with part number TL6691M is compatible with your car. GoMechanic Spares offer the Uno Minda Taillight, Tail Light Rh Tl6691M For Tata Super Ace at the best price of ?300. This product is sold by our trusted seller, Parcel. GoMechanic Spares offers 100% OEM/OES spare parts at nationwide best prices along with free pan-India shipping*.100% Genuine India Uno Minda Taillight, Tail Light Rh Tl6691M For Tata Super Ace by Uno Minda enha', '720', 'Bajaj', 'Three Wheeler', 'Electrical Auto', 'Vh0c7meVzH.jpg,645I92w2vk.jpg,e1s3vr5iVj.jpg,sXS3lLjVYk.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 09:05:30', '2022-04-24 09:06:26'),
(18, 1, 'Eagle Flip-Up With Clear Visor Motorsports Helmet (Black)', 'You can rely on GoMechanic Spares for all your spare parts needs. From basic clamps to Gomechanic Animal Series -Eagle Flip-Up With Clear Visor Motorsports Helmet (Black), GoMechanic Spares covers more than 60 lakh spare parts that you need. This Gomechanic Animal Series -Eagle Flip-Up With Clear Visor Motorsports Helmet (Black) is compatible with your car. With pan-India free shipping*, you get a hassle-free experience and the best quality at the best price of ?899. The product is sold by our t', '2500', 'Honda', 'Two Wheeler', 'Standard', 'rRedDkFW51.jpg,UgsUIesyq0.jpg,pjzcnwcKEz.jpg,1wl4kvKDXy.jpg,fqsf4jGyvA.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 09:17:16', '2022-04-24 09:18:34'),
(19, 1, 'Tata Cooling Fan | ASSY CONDENSER SHROUD COMPLETE BEHR', 'You can rely on GoMechanic Spares for all your spare parts needs. From basic clamps to Tata Cooling Fan, Assy Condenser Shroud Complete Behr 283483400146, GoMechanic Spares covers more than 60 lakh spare parts that you need. This Tata Cooling Fan, Assy Condenser Shroud Complete Behr 283483400146 is compatible with your car. With pan-India free shipping*, you get a hassle-free experience and the best quality at the best price of ?1992. The product is sold by our trusted seller, Parcel.', '6720', 'T A T A', 'Heavy Vehicles', 'HCV – Heavy. commercial vehicle', 'Ql4FezYSGV.jpg,yujrzpi5pd.jpg,YKXndEBere.jpg,uGuT6PvW8b.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 09:23:52', '2022-04-24 09:23:52'),
(20, 1, 'MGP Cooling Fan | FAN ASSY | ENGINE COOLING', 'The Mgp Cooling Fan, Fan Assy, Engine Cooling 17100M60M00 offered by Mgp is of industrial-grade quality and is compatible with all major cars. This Mgp Cooling Fan, Fan Assy, Engine Cooling 17100M60M00 is available at a competitive price of ?5800 and is sold by our trusted seller, Parcit. The delivery is available PAN-India.', '8000', 'W A B C O', 'Heavy Vehicles', 'Double Decker Bus', 'kAClaO0e0K.jpg,AlD5Bdb0NL.jpg,b2i63FUe46.jpg,oxb6feII5V.jpg,z1l0zDyUte.jpg', 'Out of Stock', 'Nityanand Jha', '2022-04-24 09:31:29', '2022-04-24 05:40:40'),
(21, 1, 'Tata Oil Filter | OIL FILTER DSL', 'The Tata Oil Filter, Oil Filter Dsl 59063972 offered by Tata is of industrial-grade quality and is compatible with all major cars. This Tata Oil Filter, Oil Filter Dsl 59063972 is available at a competitive price of ?380 and is sold by our trusted seller, Parcit. The delivery is available PAN-India.', '720', 'Motherson', 'Four Wheeler', 'Minivan', 'V5hyBw0GNW.jpg,WyvW2OCKGb.jpg,lVaS70VwlS.jpg,9ge8eSv3Hf.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 09:34:02', '2022-04-24 04:28:33'),
(23, 1, 'MOBIS (Hyundai or Kia) Piston | PISTON & PIN', 'This Mobis (Hyundai, Kia) Piston, Piston & Pin Assy 2341022613 with part number 2341022613 is compatible with your car. GoMechanic Spares offer the Mobis (Hyundai, Kia) Piston, Piston & Pin Assy 2341022613 at the best price of ?1954. This product is sold by our trusted seller, Parcit. GoMechanic Spares offers 100% OEM/OES spare parts at nationwide best prices along with free pan-India shipping*.100% Genuine India Mobis (Hyundai, Kia) Piston, Piston & Pin Assy 2341022613 by Mobis (Hyundai, Kia) e', '3000', 'T A T A', 'Four Wheeler', 'Hatchback', 'y1ebTEr7e3.jpg,gUPgpNjIjS.jpg,KdNdqFXZ0L.jpg,l14ATkSDxc.jpg,Eyi0fcO81m.jpg,HF1MCNU4bn.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 09:46:34', '2022-04-24 09:46:34'),
(24, 1, 'BRAKE OIL DOT-3 250 ML Brake Fluid', 'The Gomechanic Brake Oil Dot-3 250 Ml Brake Fluid Gmunzzbo001 offered by Gomechanic is of industrial-grade quality and is compatible with all major cars. This Gomechanic Brake Oil Dot-3 250 Ml Brake Fluid Gmunzzbo001 is available at a competitive price of ?79 and is sold by our trusted seller, Parcit. The delivery is available PAN-India.', '199', 'Castrol', 'Two Wheeler', 'Cruiser', 'CZSZVGDw4D.jpg,0oegdOv5NQ.jpg,AiTFHMhqnP.jpg,QTjUMmjsSS.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 09:50:41', '2022-04-24 09:50:41'),
(25, 1, 'MGP Wiper Motor | MOTOR ASSY WIPER', 'The Mgp Wiper Motor, Motor Assy Wiper 38101M79120 offered by Mgp is of industrial-grade quality and is compatible with all major cars. This Mgp Wiper Motor, Motor Assy Wiper 38101M79120 is available at a competitive price of ?925 and is sold by our trusted seller, Parcit. The delivery is available PAN-India.', '2500', 'W A B C O', 'Heavy Vehicles', 'Cement Truck', 'IEOWJeG55d.jpg,NzSoCU0ibx.jpg,biRHDUIoKv.jpg,oEz9pbB7Jr.jpg,xxJcWchszZ.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 09:57:08', '2022-04-24 09:57:08'),
(26, 1, 'RNM ALLIANCE (Renault or Nissan or Mitsubishi) Wiper Arm | HLDR BLADE', 'This Ram Alliance (Renault, Nissan, Mitsubishi) Wiper Arm, Hldr Blade 288811490R with part number is compatible with your car. GoMechanic Spares offer the Rnm Alliance (Renault, Nissan, Mitsubishi) Wiper Arm, Hldr Blade 288811490R at the best price of ?806. This product is sold by our trusted seller, Parcit. GoMechanic Spares offers 100% OEM/OES spare parts at nationwide best prices along with free pan-India shipping*.', '675', 'Bajaj', 'Three Wheeler', 'Fule Auto', 'gMYf39bp2E.jpg,fUPC1ZkCHB.jpg,qcJAFNr8OW.jpg,twV4Z0izEg.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 10:43:20', '2022-04-24 10:43:20'),
(27, 1, 'MGP V-Belt, BELT WATER PUMP', 'You can rely on GoMechanic Spares for all your spare parts needs. From basic clamps to Mgp V-Belt, Belt Water Pump 17521M73M10, GoMechanic Spares covers more than 60 lakh spare parts that you need. This Mgp V-Belt, Belt Water Pump 17521M73M10 is compatible with your car. With pan-India free shipping*, you get a hassle-free experience and the best quality at the best price of ?142. The product is sold by our trusted seller, Parcit.', '12025', 'T A T A', 'Heavy Vehicles', 'Fire Truck', 'eo4Q9XRT5k.jpg,qEe4bKkh9J.jpg,N5Vr7VN0r2.jpg,p0ji6IOQOe.jpg,Kn3aYe3O75.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 10:46:28', '2022-04-24 10:46:28'),
(28, 1, '4.00-8 Three Wheeler Tyre', 'Efficient name in the industry involved in offering the optimum quality of Three Wheeler Tyre.', '2400', 'M R F', 'Three Wheeler', 'Tricycle Motorcycle', 'BqF5TraQzI.jpg,D3daIeC2c1.jpg,3YtUAk3IvW.jpg,ugE7282WBs.jpg,IfZjl7DR7V.jpg', 'In Stock', 'Nityanand Jha', '2022-04-24 10:51:28', '2022-04-24 10:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `message` varchar(350) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_name`, `product_id`, `rating`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Nityanand Jha', 1, 4, 'I like This Product', '2022-04-15 17:30:52', '2022-04-15 17:30:52'),
(2, 'Nityanand Jha', 2, 5, 'Good Quality Product', '2022-04-15 17:31:28', '2022-04-15 17:31:28'),
(3, 'Nityanand Jha', 5, 3, 'High Cost', '2022-04-15 17:31:49', '2022-04-15 17:31:49'),
(4, 'Nityanand Jha', 10, 4, 'Good Quality Product', '2022-04-24 10:55:34', '2022-04-24 10:55:34'),
(5, 'Nityanand Jha', 28, 4, 'Good Product for this cost', '2022-04-24 11:03:45', '2022-04-24 11:03:45'),
(6, 'Nityanand Jha', 4, 5, 'good sound Quality', '2022-04-24 11:04:56', '2022-04-24 11:04:56'),
(7, 'Nityanand Jha', 26, 2, 'Costly Not effective for this price', '2022-04-24 11:12:37', '2022-04-24 11:12:37'),
(8, 'Nityanand Jha', 26, 2, 'Costly Not effective for this price', '2022-04-24 11:12:37', '2022-04-24 11:12:37'),
(9, 'Sakshi Mohan', 20, 2, 'Product Out of Stock Really', '2022-04-24 11:30:30', '2022-04-24 11:30:30'),
(10, 'Rakesh Sharma', 1, 4, 'Hello Every One', '2022-04-24 11:40:11', '2022-04-24 11:40:11'),
(11, 'Rakesh Sharma', 25, 2, 'Costly Product', '2022-04-24 11:40:47', '2022-04-24 11:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `sub-category`
--

DROP TABLE IF EXISTS `sub-category`;
CREATE TABLE IF NOT EXISTS `sub-category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub-category`
--

INSERT INTO `sub-category` (`id`, `name`, `cat_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cement Truck', 'Heavy Vehicles', 0, '2022-03-31 15:28:23', '2022-03-31 15:28:23'),
(2, 'Cruiser', 'Two Wheeler', 0, '2022-03-31 15:28:45', '2022-03-31 15:28:45'),
(3, 'SUV', 'Four Wheeler', 0, '2022-03-31 15:29:08', '2022-03-31 11:46:38'),
(4, 'Hatchback', 'Four Wheeler', 0, '2022-03-31 15:29:27', '2022-03-31 15:29:27'),
(5, 'Sport', 'Two Wheeler', 0, '2022-03-31 15:29:53', '2022-03-31 15:29:53'),
(6, 'Crane Trucks/Mobile Cranes', 'Heavy Vehicles', 0, '2022-03-31 15:31:41', '2022-03-31 15:31:41'),
(7, 'Dump Truck', 'Heavy Vehicles', 0, '2022-03-31 15:33:02', '2022-03-31 15:33:02'),
(8, 'Dirt Dike', 'Two Wheeler', 0, '2022-03-31 16:46:11', '2022-03-31 11:18:10'),
(9, 'Standard', 'Two Wheeler', 0, '2022-03-31 16:46:29', '2022-03-31 11:16:44'),
(10, 'Dual-Purpose', 'Two Wheeler', 0, '2022-03-31 16:47:11', '2022-03-31 11:17:21'),
(11, 'Touring', 'Two Wheeler', 0, '2022-03-31 16:48:25', '2022-03-31 16:48:25'),
(12, 'Crossover', 'Four Wheeler', 0, '2022-03-31 16:48:48', '2022-03-31 16:48:48'),
(13, 'Convertible', 'Four Wheeler', 0, '2022-03-31 16:49:01', '2022-03-31 16:49:01'),
(14, 'Sedan', 'Four Wheeler', 0, '2022-03-31 16:49:26', '2022-03-31 16:49:26'),
(15, 'Sports Car', 'Four Wheeler', 0, '2022-03-31 16:50:01', '2022-03-31 16:50:01'),
(16, 'Coupe', 'Four Wheeler', 0, '2022-03-31 16:50:16', '2022-03-31 16:50:16'),
(17, 'Minivan', 'Four Wheeler', 0, '2022-03-31 16:50:32', '2022-03-31 16:50:32'),
(18, 'Pickup Truck', 'Four Wheeler', 0, '2022-03-31 16:52:02', '2022-03-31 16:52:02'),
(19, 'Station Wagon', 'Four Wheeler', 0, '2022-03-31 16:52:27', '2022-03-31 16:52:27'),
(20, 'Extra Duty Truck', 'Heavy Vehicles', 0, '2022-03-31 16:53:27', '2022-03-31 16:53:27'),
(21, 'Flatbed Truck', 'Heavy Vehicles', 0, '2022-03-31 16:54:08', '2022-03-31 16:54:08'),
(22, 'Fire Truck', 'Heavy Vehicles', 0, '2022-03-31 16:54:58', '2022-03-31 16:54:58'),
(23, 'Garbage Truck', 'Heavy Vehicles', 0, '2022-03-31 16:55:56', '2022-03-31 16:55:56'),
(24, 'Car Transporter/Car Carrier Trailer', 'Heavy Vehicles', 0, '2022-03-31 16:56:39', '2022-03-31 16:56:39'),
(25, 'LCV – Light commercial vehicle', 'Heavy Vehicles', 0, '2022-03-31 16:58:36', '2022-03-31 16:58:36'),
(26, 'MCV – Medium commercial vehicle', 'Heavy Vehicles', 0, '2022-03-31 16:58:54', '2022-03-31 16:58:54'),
(27, 'HCV – Heavy. commercial vehicle', 'Heavy Vehicles', 0, '2022-03-31 16:59:18', '2022-03-31 16:59:18'),
(28, 'Rigid Trucks', 'Heavy Vehicles', 0, '2022-03-31 16:59:42', '2022-03-31 16:59:42'),
(29, 'Double Decker Bus', 'Heavy Vehicles', 0, '2022-03-31 17:04:01', '2022-03-31 17:04:01'),
(30, 'Electrical Auto', 'Three Wheeler', 0, '2022-03-31 17:06:53', '2022-03-31 17:06:53'),
(31, 'Fule Auto', 'Three Wheeler', 0, '2022-03-31 17:07:53', '2022-03-31 11:43:06'),
(32, 'Tricycle Motorcycle', 'Three Wheeler', 0, '2022-03-31 17:16:50', '2022-03-31 11:47:51'),
(33, 'Electric Scooty', 'Two Wheeler', 0, '2022-04-02 14:36:16', '2022-04-02 14:36:16'),
(34, 'Scooty', 'Two Wheeler', 0, '2022-04-02 14:36:37', '2022-04-02 14:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

DROP TABLE IF EXISTS `user_register`;
CREATE TABLE IF NOT EXISTS `user_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `con_pass` varchar(100) NOT NULL,
  `register` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL DEFAULT '0',
  `image` varchar(100) NOT NULL DEFAULT '0',
  `city` int(11) NOT NULL DEFAULT '0',
  `address` varchar(350) NOT NULL DEFAULT '0',
  `lane` varchar(200) NOT NULL DEFAULT '0',
  `landmark` varchar(200) NOT NULL DEFAULT '0',
  `pincode` int(6) NOT NULL DEFAULT '0',
  `verify` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`id`, `name`, `gender`, `email`, `password`, `con_pass`, `register`, `phone`, `image`, `city`, `address`, `lane`, `landmark`, `pincode`, `verify`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nityanand Jha', 'Male', 'jha@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Active', 9898058049, 'WdwLxTWoh0.png', 3, '10 PNH AGAR BOMARA', 'mangal panday hall', 'mangal panday hall', 394210, 787157, 1, '2022-04-02 14:42:39', '2022-04-24 12:01:15'),
(2, 'Sakshi Mohan', 'Female', 'sakshi@gmail.com', '82144e0615bb228adb52c64664ec971678f61960', '82144e0615bb228adb52c64664ec971678f61960', 'Active', 9898058049, '0', 3, '10 PNH AGAR BOMARA', '123', 'www', 394210, 859613, 1, '2022-04-02 14:46:55', '2022-04-24 11:33:16'),
(3, 'VIDYANAND JHA', 'Male', 'rakesh@gmail.com', '9eadc8fa224eebb865f005688a041b3ba050c57f', '9eadc8fa224eebb865f005688a041b3ba050c57f', 'Active', 9375472645, '0', 3, '58 JALARAM NAGAR DINDOLI ROAD GODADRA NAVAGAM SURAT', 'Mangal Panday Hall', 'Mangal Panday Hall', 394210, 228528, 1, '2022-04-02 14:48:11', '2022-04-24 11:40:54'),
(4, 'Nisha Rajput', 'Female', 'nishaa@gmail.com', '41c4e585cadf2f7159c0481f54812f42a5051d01', '41c4e585cadf2f7159c0481f54812f42a5051d01', 'In-Active', 0, '0', 0, '0', '0', '0', 0, 190993, 1, '2022-04-02 14:50:04', '2022-04-02 14:50:32'),
(5, 'VIDYANAND JHA', 'Male', 'jha@gmail.comqq', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Active', 0, '0', 0, '0', '0', '0', 0, 180931, 0, '2022-04-18 16:44:59', '2022-04-18 16:44:59'),
(6, 'VIDYANAND JHA', 'Male', 'jha11@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Active', 0, '0', 0, '0', '0', '0', 0, 811595, 0, '2022-04-18 16:47:59', '2022-04-18 16:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

DROP TABLE IF EXISTS `wish`;
CREATE TABLE IF NOT EXISTS `wish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wish`
--

INSERT INTO `wish` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 9, '2022-04-24 10:53:17', '2022-04-24 16:23:17'),
(2, 1, 26, '2022-04-24 10:53:23', '2022-04-24 16:23:23'),
(3, 1, 23, '2022-04-24 10:53:27', '2022-04-24 16:23:27'),
(4, 1, 15, '2022-04-24 10:53:34', '2022-04-24 16:23:34'),
(5, 1, 19, '2022-04-24 10:53:43', '2022-04-24 16:23:43'),
(6, 2, 26, '2022-04-24 11:29:33', '2022-04-24 16:59:33'),
(7, 2, 13, '2022-04-24 11:29:38', '2022-04-24 16:59:38'),
(8, 2, 5, '2022-04-24 11:29:42', '2022-04-24 16:59:42'),
(9, 2, 4, '2022-04-24 11:29:47', '2022-04-24 16:59:47'),
(10, 3, 1, '2022-04-24 11:34:52', '2022-04-24 17:04:52'),
(11, 3, 6, '2022-04-24 11:35:11', '2022-04-24 17:05:11'),
(12, 3, 17, '2022-04-24 11:35:17', '2022-04-24 17:05:17'),
(13, 3, 19, '2022-04-24 11:35:29', '2022-04-24 17:05:29'),
(14, 3, 12, '2022-04-24 11:35:35', '2022-04-24 17:05:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
