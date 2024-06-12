-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 07:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(2, 'maruf', 'maruf@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` text NOT NULL,
  `brand_img` text NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `brand_img`, `cat_id`) VALUES
(19, 'VillageArt', 'logo.png', 14),
(20, 'CraftyVillage', 'logo.png', 16),
(21, 'RuralArtisans', 'logo.png', 19),
(22, 'VillageThreads', 'logo.png', 15),
(23, 'VillageToys', 'logo.png', 20),
(24, 'VillageTreasures', 'logo.png', 21);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `costumer_email` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `p_id`, `costumer_email`, `qty`, `payment_id`) VALUES
(21, 9, 'nihar@gmail.com', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_img`) VALUES
(14, 'Pottery', 'cat1.png'),
(15, 'Textiles', 'cat1.png'),
(16, 'Woodwork', 'cat1.png'),
(19, 'Traditional Attire', 'cat1.png'),
(20, 'Wooden Toys', 'cat1.png'),
(21, 'Metal Crafts', 'cat1.png');

-- --------------------------------------------------------

--
-- Table structure for table `costumers`
--

CREATE TABLE `costumers` (
  `costumer_id` int(11) NOT NULL,
  `costumer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costumer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costumer_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costumer_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costumer_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costumer_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costumer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costumer_image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `costumers`
--

INSERT INTO `costumers` (`costumer_id`, `costumer_name`, `costumer_email`, `costumer_pass`, `costumer_country`, `state`, `costumer_city`, `costumer_contact`, `costumer_address`, `costumer_image`) VALUES
(10, 'Nihar Barange', 'nihar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'India', 'Madhya Pradesh', 'Indore', '12345', 'Bangali Chourah, Indore', 'face1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `costumer_orders`
--

CREATE TABLE `costumer_orders` (
  `order_id` int(11) NOT NULL,
  `costumer_id` int(11) NOT NULL,
  `due_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_products` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_order`
--

CREATE TABLE `m_order` (
  `id` int(11) NOT NULL,
  `costumer_email` varchar(255) NOT NULL,
  `bn` varchar(255) NOT NULL,
  `be` varchar(255) NOT NULL,
  `bp` varchar(255) NOT NULL,
  `ba` varchar(255) NOT NULL,
  `ba2` varchar(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  `se` varchar(255) NOT NULL,
  `sp` varchar(100) NOT NULL,
  `sa` varchar(255) NOT NULL,
  `sa2` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `payment_status` enum('Pending','Complete') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_order`
--

INSERT INTO `m_order` (`id`, `costumer_email`, `bn`, `be`, `bp`, `ba`, `ba2`, `sn`, `se`, `sp`, `sa`, `sa2`, `order_date`, `payment_status`) VALUES
(26, 'nihar@gmail.com', 'nihar', 'nihar@gmail.com', '123456', 'bangali chourah, indore', 'indore', 'nihar', 'nihar@gmail.com', '123456', 'bangali chourah, indore', 'indore', '2024-06-04 01:25:10', 'Pending'),
(27, 'nihar@gmail.com', 'nihar', 'nihar@gmail.com', '123456', 'bangali chourah, indore', 'indore', 'nihar', 'nihar@gmail.com', '123456', 'bangali chourah, indore', 'indore', '2024-06-04 01:26:18', 'Pending'),
(28, 'nihar@gmail.com', 'nihar', 'nihar@gmail.com', '12345', '123', '1234', 'nihar', 'nihar@gmail.com', '12345', '123', '1234', '2024-06-04 01:28:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costumer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` datetime DEFAULT current_timestamp(),
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `costumer_email`, `invoice_no`, `amount`, `payment_date`, `payment_status`) VALUES
(28, '', 'nihar@gmail.com', 1717444719, '150', '2024-06-04 01:28:03', 'Pending'),
(27, '', 'nihar@gmail.com', 1717444614, '200', '2024-06-04 01:26:18', 'Pending'),
(26, '', 'nihar@gmail.com', 1717444546, '200', '2024-06-04 01:25:10', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `costumer_id` int(11) NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_dsc` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `status` text NOT NULL,
  `product_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_dsc`, `status`, `product_keywords`) VALUES
(7, 16, 20, '2024-06-03 19:35:45', 'Wooden Stool', 'bamboo_stool.jpg', '', '', 200, 'stool made from wood products. ', 'on', 'stool, wood product, wood, wooden, bamboo'),
(9, 14, 19, '2024-06-03 19:40:10', 'Tokri', 'tokri.jpeg', '', '', 150, 'plastic free product made from wooden', 'on', 'tokri, wood, bamboo'),
(10, 16, 20, '2024-06-04 04:01:09', 'Charpai ', 'Screenshot_2024-06-04-06-36-27-57_fd1e8ef594b195c55a3bba4818d0ce35.jpg', 'Screenshot_2024-06-04-06-36-27-57_fd1e8ef594b195c55a3bba4818d0ce35.jpg', '', 2000, 'This charpai is constructed from sturdy and durable solid wood.', 'on', 'charpai, khatiya, wood, wooden '),
(11, 16, 20, '2024-06-04 04:03:24', 'Mudda Stool', 'Screenshot_2024-06-04-06-35-27-34_fd1e8ef594b195c55a3bba4818d0ce35.jpg', 'Screenshot_2024-06-04-06-35-47-51_fd1e8ef594b195c55a3bba4818d0ce35.jpg', '', 400, 'Uses Indoor and Outdoor ', 'on', 'stool, mudda stool, bamboo, wood'),
(12, 15, 22, '2024-06-04 04:05:21', 'Korai Pai', 'Screenshot_2024-06-04-06-34-20-95_fd1e8ef594b195c55a3bba4818d0ce35.jpg', 'Screenshot_2024-06-04-06-34-44-63_fd1e8ef594b195c55a3bba4818d0ce35.jpg', '', 200, 'Korai Pai Asans are ideal for placing deity idols during puja rituals', 'on', 'korai pai, pooja asan, textile'),
(13, 16, 19, '2024-06-04 04:07:46', 'Handheld Fan', 'Screenshot_2024-06-04-06-33-11-87_fd1e8ef594b195c55a3bba4818d0ce35.jpg', 'Screenshot_2024-06-04-06-33-11-87_fd1e8ef594b195c55a3bba4818d0ce35.jpg', '', 50, 'Light weight fan, can be carry anywhere', 'on', 'Handheld Fan, fan, wood, bamboo'),
(14, 16, 20, '2024-06-04 04:10:47', 'Bamboo Dala', 'Screenshot_2024-06-04-06-39-36-62_fd1e8ef594b195c55a3bba4818d0ce35.jpg', 'Screenshot_2024-06-04-06-39-55-01_fd1e8ef594b195c55a3bba4818d0ce35.jpg', '', 300, 'Mainly uses for traditional purpose', 'on', 'dala, dagra, bamboo,wood'),
(15, 14, 19, '2024-06-04 05:13:03', 'Cooker', 'Screenshot_2024-06-04-06-59-07-06_fd1e8ef594b195c55a3bba4818d0ce35.jpg', 'Screenshot_2024-06-04-06-59-23-07_fd1e8ef594b195c55a3bba4818d0ce35.jpg', '', 500, 'eco-friendly cooker made from mud', 'on', 'cooker,mud,pottery'),
(16, 21, 24, '2024-06-04 05:14:41', 'Tawa', 'Screenshot_2024-06-04-06-42-25-72_fd1e8ef594b195c55a3bba4818d0ce35.jpg', 'Screenshot_2024-06-04-06-42-37-16_fd1e8ef594b195c55a3bba4818d0ce35.jpg', '', 400, 'Metal tawa used for making chapati', 'on', 'tawa,metal'),
(17, 20, 23, '2024-06-04 05:15:49', 'Chess Board', 'Screenshot_2024-06-04-07-18-20-59_fd1e8ef594b195c55a3bba4818d0ce35.jpg', 'Screenshot_2024-06-04-07-18-31-69_fd1e8ef594b195c55a3bba4818d0ce35.jpg', '', 800, 'wooden chess board', 'on', 'toy,wood toy');

-- --------------------------------------------------------

--
-- Table structure for table `s_order`
--

CREATE TABLE `s_order` (
  `id` int(11) NOT NULL,
  `m_order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `costumer_email` varchar(255) NOT NULL,
  `deliver_status` enum('NOT DELIVER YET','DELIVERD') NOT NULL DEFAULT 'NOT DELIVER YET'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_order`
--

INSERT INTO `s_order` (`id`, `m_order_id`, `p_id`, `qty`, `product_price`, `costumer_email`, `deliver_status`) VALUES
(22, 26, 7, 1, 200, 'nihar@gmail.com', 'NOT DELIVER YET'),
(23, 27, 7, 1, 200, 'nihar@gmail.com', 'NOT DELIVER YET'),
(24, 28, 9, 1, 150, 'nihar@gmail.com', 'NOT DELIVER YET');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `costumers`
--
ALTER TABLE `costumers`
  ADD PRIMARY KEY (`costumer_id`);

--
-- Indexes for table `costumer_orders`
--
ALTER TABLE `costumer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `m_order`
--
ALTER TABLE `m_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `s_order`
--
ALTER TABLE `s_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_order_id` (`m_order_id`),
  ADD KEY `p_id` (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `costumers`
--
ALTER TABLE `costumers`
  MODIFY `costumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `costumer_orders`
--
ALTER TABLE `costumer_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_order`
--
ALTER TABLE `m_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `s_order`
--
ALTER TABLE `s_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE NO ACTION;

--
-- Constraints for table `s_order`
--
ALTER TABLE `s_order`
  ADD CONSTRAINT `s_order_ibfk_1` FOREIGN KEY (`m_order_id`) REFERENCES `m_order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_order_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
