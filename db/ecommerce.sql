-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 04:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_password`) VALUES
(1, 'asma@gmail.com', 'asma');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `prod_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`prod_id`, `cust_id`, `qty`) VALUES
(60, 2, 2),
(37, 2, 1),
(19, 2, 1),
(64, 2, 1),
(48, 2, 1),
(63, 2, 1),
(28, 4, 2),
(46, 4, 1),
(63, 4, 1),
(59, 4, 1),
(18, 1, 1),
(28, 1, 2),
(10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'HOME'),
(2, 'KIDS'),
(3, 'BATHROOM'),
(4, 'LIVING-ROOM'),
(5, 'BEDROOM'),
(6, 'BABIES'),
(7, 'KITCHEN'),
(8, 'BOYS'),
(9, 'GIRLS'),
(10, 'OFFICE');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL,
  `color_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color_title`) VALUES
(1, 'BLACK'),
(2, 'WHITE'),
(3, 'GREEN'),
(4, 'BROWN'),
(5, 'YELLOW'),
(6, 'BEIGE'),
(7, 'PINK'),
(8, 'PURPLE'),
(9, 'GRAY'),
(10, 'RED'),
(11, 'ORANGE'),
(12, 'BLUE');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `cus_password` varchar(255) NOT NULL,
  `cus_country` varchar(255) NOT NULL,
  `cus_city` varchar(255) NOT NULL,
  `cus_phone` int(30) NOT NULL,
  `cus_address` varchar(255) NOT NULL,
  `cus_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `cus_name`, `cus_email`, `cus_password`, `cus_country`, `cus_city`, `cus_phone`, `cus_address`, `cus_date`) VALUES
(1, 'asma', 'asma@gmail.com', 'asma', 'Morocco', 'ESSAOUIRA', 622726943, 'Essaouira', '2023-03-27 17:11:38'),
(7, 'imane', 'imane10@gmail.com', 'azer', 'Morocco', 'ESSAOUIRA', 655789032, 'Essaouira', '2023-03-30 02:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `prod_id`, `cust_id`, `qty`, `invoice_no`, `status`, `order_date`) VALUES
(1, 4, 1, 4, 462643381, 'Completed', '2023-03-26 23:59:12'),
(2, 15, 1, 2, 481994455, 'in Progress', '2023-03-27 00:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `trx_id` varchar(20) NOT NULL,
  `currency` varchar(4) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `product_id`, `amount`, `customer_id`, `trx_id`, `currency`, `payment_date`) VALUES
(1, 4, 200, 1, '31B07494JS505133P', 'USD', '2023-03-26 23:59:14'),
(2, 15, 140, 1, '81B07409JS565133P', 'USD', '2023-03-27 02:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_cat` int(11) NOT NULL,
  `prod_theme` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `prod_title` text NOT NULL,
  `prod_colors` text NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_img` text NOT NULL,
  `prod_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_cat`, `prod_theme`, `price`, `prod_title`, `prod_colors`, `prod_desc`, `prod_img`, `prod_date`) VALUES
(1, 5, 1, 40, 'wall-sticker-bedroom', 'black ', ' <p>This is a great wall-sticker for bedroom with color black\r\nand white</p>', 'imgBE1.jpg', '2023-02-16 08:30:06'),
(3, 5, 1, 50, 'wall-sticker-bedroom-', 'green ', '<p>This is a great wall-sticker for bedroom -words&phrases</p>', 'imgBE10.jpg', '2023-02-16 09:29:47'),
(4, 5, 1, 50, 'wall-sticker-bedroom-', 'beige', '<p>This is a great wall-sticker for bedroom -words&phrases</p>', 'imgBE11.jpg', '2023-02-18 09:36:26'),
(5, 5, 1, 60, 'wall-sticker-bedroom', 'gray', '<p>This is a great wall-sticker for bedroom -words&phrases</p>', 'imgBE12.jpg', '2023-02-18 09:40:37'),
(6, 1, 1, 30, 'wall-sticker-home', 'black ', '<p>This is a great wall-sticker for bedroom -words&phrases</p>', 'imgH3.jpg', '2023-02-18 09:40:37'),
(7, 7, 1, 60, 'wall-sticker-Kitchen', 'black', '<p>This is a great wall-sticker for home -words&phrases</p>', 'imgKIT1.jpg', '2023-02-18 09:40:37'),
(8, 7, 1, 65, 'wall-sticker-Kitchen', 'black', '<p>This is a great wall-sticker for bedroom -words&phrases</p>', 'imgKIT8.jpg', '2023-02-18 09:47:40'),
(9, 7, 1, 49, 'wall-sticker-Kitchen', 'black', '<p>This is a great wall-sticker for kitchen -words&phrases</p>', 'imgKIT10.jpg', '2023-02-18 09:47:40'),
(10, 10, 1, 60, 'wall-sticker-office', 'black', '<p>This is a great wall-sticker for office -words&phrases</p>', 'imgOF3.jpg', '2023-02-18 09:47:40'),
(11, 10, 1, 70, 'wall-sticker-office', ' orange', '<p>This is a great wall-sticker for office -words&phrases</p>', 'imgOF9.jpg', '2023-02-18 09:47:40'),
(12, 5, 3, 59, 'wall-sticker-bedroom', 'blue white beige', '<p>This is a great wall-sticker for Bedroom -flowers</p>', 'imgBE3.jpg', '2023-02-18 09:55:18'),
(13, 0, 3, 70, 'wall-sticker-bedroom', 'green', '<p>This is a great wall-sticker for bedroom -Flowers</p>', 'imgBE6.jpg', '2023-02-18 09:55:18'),
(14, 5, 3, 60, 'wall-sticker-Bedroom', 'violet gray', '<p>This is a great wall-sticker for bedroom -Flowers</p>', 'imgBE14.jpg', '2023-02-18 09:55:18'),
(15, 9, 3, 70, 'wall-sticker-bedroom', 'pink ', '<p>This is a great wall-sticker-bedroom-girls-Flowers</p>', 'imgG1.jpg', '2023-02-18 09:55:18'),
(16, 9, 3, 39, 'wall-sticker-bedroom', 'pink', '<p>This is a great wall-sticker for bedroom -Flowers</p>', 'imgG4.jpg', '2023-02-18 10:03:17'),
(17, 9, 3, 50, 'wall-sticker-bedroom', 'gray', '<p>This is a great wall-sticker for bedroom -Flowers</p>', 'imgG7.jpg', '2023-02-18 10:03:17'),
(18, 9, 3, 59, ' wall-sticker-bedroom', 'purple', '<p>This is a great wall-sticker for bedroom -Flowers</p>', 'imgG9.jpg', '2023-02-18 10:03:17'),
(19, 1, 3, 70, 'wall-sticker-Home', 'pink green yellow', '<p>This is a great wall-sticker for home-Flowers</p>', 'imgH1.jpg', '2023-02-18 10:03:17'),
(20, 1, 3, 54, 'wall-sticker-Home', 'blue', '<p>This is a great wall-sticker for home -Flowers</p>', 'imgH10.jpg', '2023-02-18 10:03:17'),
(21, 2, 3, 30, 'wall-sticker-Kitchen', 'violet yellow brown ', '<p>This is a great wall-sticker for kitchen -Flowers</p>', 'imgK7.jpg', '2023-02-18 10:03:17'),
(23, 2, 3, 60, 'wall-sticker-KIDs', 'green violet pink orange', '<p>This is a great wall-sticker for bedroom kids -Flowers</p>', 'imgK9.jpg', '2023-02-18 10:15:08'),
(24, 4, 3, 70, 'wall-sticker-Living-room', 'green', '<p>This is a great wall-sticker for living room-Flowers</p>', 'imgL2.jpg', '2023-02-18 10:15:08'),
(25, 4, 3, 58, 'wall-sticker-living-room', 'purple', '<p>This is a great wall-sticker for living room-Flowers</p>', 'imgL4.jpg', '2023-02-18 10:15:08'),
(26, 5, 4, 50, 'wall-sticker-bedroom', 'yellow golden', '<p>This is a great wall-sticker for bedroom with color golden\r\n</p>', 'imgBE4.jpg', '2023-02-19 21:16:40'),
(27, 5, 4, 80, 'wall-sticker-bedroom', 'green ', '<p>This is a great wall-sticker for bedroom with color green</p>', 'imgBE8.jpg', '2023-02-19 21:16:40'),
(28, 9, 4, 54, 'wall-sticker-bedroom', 'purple', '<p>This is a great wall-sticker for girls with color purple\r\nand black</p>', 'imgG6.jpg', '2023-02-19 21:16:40'),
(29, 9, 4, 38, 'wall-sticker-bedroom', 'pink ', '<p>This is a great wall-sticker for bedroom with color black\r\nand pink</p>', 'imgG8.jpg', '2023-02-19 21:16:40'),
(30, 1, 4, 59, 'wall-sticker-home', 'pink purple', '<p>This is a great wall-sticker for home with color pink</p>', 'imgH4.jpg', '2023-02-19 21:16:40'),
(31, 1, 4, 45, 'wall-sticker-home-brown', 'brown', '<p>This is a great wall-sticker for home with color brown</p>', 'imgH5.jpg', '2023-02-19 21:16:40'),
(32, 1, 4, 45, 'wall-sticker-home-brown', 'brown', '<p>This is a great wall-sticker for home with color brown</p>', 'imgH6.jpg', '2023-02-19 21:16:40'),
(33, 6, 5, 60, 'wall-sticker-Babies', 'brown green gray', '<p>This is a great wall-sticker for bedroom with color brown\r\nand gray</p>', 'imgBA1.jpg', '2023-02-20 21:27:13'),
(34, 6, 5, 58, 'wall-sticker-Babies-pink', 'pink gray', '<p>This is a great wall-sticker for bedroom with color pink\r\nand gray</p>', 'imgBA9.jpg', '2023-02-20 21:27:13'),
(35, 6, 5, 70, 'wall-sticker-Babies-pink', 'beige', '<p>This is a great wall-sticker for bedroom with color pink\r\nand orange</p>', 'imgBA11.jpg', '2023-02-20 21:27:13'),
(36, 9, 5, 79, 'wall-sticker-Girl-purple', 'purple', '<p>This is a great wall-sticker for bedroom with color purple\r\nand green</p>', 'imgG2.jpg', '2023-02-20 21:27:13'),
(37, 9, 5, 64, 'wall-sticker-Girl-unicorn', 'beige', '<p>This is a great wall-sticker for bedroom with color pink\r\nand blue</p>', 'imgG3.jpg', '2023-02-20 21:27:13'),
(39, 2, 5, 67, 'wall-sticker-kids-cats', 'black white pink orange', '<p>This is a great wall-sticker for bedroom with color black\r\nand white and orange</p>', 'imgK2.jpg', '2023-02-20 21:27:13'),
(40, 2, 5, 77, 'wall-sticker-kids-Giraffes', 'brown yellow black orange', '<p>This is a great wall-sticker for bedroom with color black\r\nand brown</p>', 'imgK3.jpg', '2023-02-20 21:27:13'),
(41, 2, 5, 69, 'wall-sticker-kids-rabbits', 'orange gray', '<p>This is a great wall-sticker for bedroom with color orange\r\nand gray</p>', 'imgK5.jpg', '2023-02-20 21:27:13'),
(42, 2, 5, 66, 'wall-sticker-kids-elephant', 'green black pink', '<p>This is a great wall-sticker for bedroom with color black\r\nand pink</p>', 'imgK6.jpg', '2023-02-20 21:27:13'),
(43, 6, 6, 44, 'wall-sticker-bedroom', 'gray brown green', '<p>This is a great wall-sticker for babies with color gray\r\n</p>', 'imgBA1.jpg', '2023-02-21 20:28:29'),
(44, 6, 6, 55, 'wall-sticker-bedroom', 'blue gray white', '<p>This is a great wall-sticker for babies with color blue\r\n</p>', 'imgBA8.jpg', '2023-02-21 20:28:29'),
(45, 3, 6, 66, 'wall-sticker-bathroom', 'green gray white', '<p>This is a great wall-sticker for bathroom with color gray \r\n</p>', 'imgBAT2.jpg', '2023-02-21 20:28:29'),
(46, 3, 6, 67, 'wall-sticker-bathroom', 'black', '<p>This is a great wall-sticker for bathroom with color green\r\n</p>', 'imgBAT3.jpg', '2023-02-21 20:28:29'),
(47, 3, 6, 77, 'wall-sticker-bathroom-pink', 'red pink green ', '<p>This is a great wall-sticker for bathroom with color pink\r\n</p>', 'imgBAT6.jpg', '2023-02-21 20:28:29'),
(48, 3, 6, 45, 'wall-sticker-bathroom', 'green orange blue brown', '<p>This is a great wall-sticker for bathroom with color blue\r\n</p>', 'imgBAT7.jpg', '2023-02-21 20:28:29'),
(49, 5, 6, 78, 'wall-sticker-bedroom', 'Golden', '<p>This is a great wall-sticker for bedroom with color golden\r\n</p>', 'imgBE4.jpg', '2023-02-21 20:28:29'),
(50, 5, 6, 37, 'wall-sticker-bedroom', 'green gray yellow', '<p>This is a great wall-sticker for bedroom with color gray\r\n</p>', 'imgBE6.jpg', '2023-02-21 20:28:29'),
(51, 5, 6, 78, 'wall-sticker-bedroom', 'green', '<p>This is a great wall-sticker for bedroom with color green\r\n</p>', 'imgBE8.jpg', '2023-02-21 20:28:29'),
(52, 1, 6, 57, 'wall-sticker-home', 'green beige', '<p>This is a great wall-sticker for home with color green\r\n</p>', 'imgH8.jpg', '2023-02-21 20:28:29'),
(53, 2, 6, 70, 'wall-sticker-kids-brown', 'brown yellow black', '<p>This is a great wall-sticker for kids with color brown\r\n</p>', 'imgK3.jpg', '2023-02-21 20:28:29'),
(54, 2, 6, 69, 'wall-sticker-kids', 'blue white gray', '<p>This is a great wall-sticker for kids with color gray\r\n</p>', 'imgK4.jpg', '2023-02-21 20:28:29'),
(55, 2, 6, 72, 'wall-sticker-kids', 'black green', '<p>This is a great wall-sticker for kids with color green\r\n</p>', 'imgK6.jpg', '2023-02-21 20:28:29'),
(57, 8, 8, 60, 'wall-sticker-bedroom', 'black', '<p>This is a great wall-sticker for boys with color blue and red\r\nand white</p>', 'imgBO6.jpg', '2023-02-21 20:36:15'),
(58, 5, 12, 70, 'wall-sticker-bedroom', 'beige', '<p>This is a great wall-sticker for bedroom with color beige\r\n</p>', 'imgBE3.jpg', '2023-02-21 20:39:12'),
(59, 8, 14, 69, 'wall-sticker-bedroom', 'black white green', '<p>This is a great wall-sticker for bedroom with color black\r\nand white</p>', 'imgBO3.jpg', '2023-02-21 20:41:48'),
(60, 8, 9, 54, 'wall-sticker-bedroom-black', 'black', '<p>This is a great wall-sticker for bedroom with color black\r\n</p>', 'imgBO1.jpg', '2023-02-21 21:00:18'),
(61, 8, 9, 50, 'wall-sticker-bedroom-black', 'black', '<p>This is a great wall-sticker for bedroom with color black\r\n</p>', 'imgBO2.jpg', '2023-02-21 21:00:18'),
(62, 8, 9, 60, 'wall-sticker-bedroom', 'black green', '<p>This is a great wall-sticker for bedroom with color black\r\nand green</p>', 'imgBO3.jpg', '2023-02-21 21:00:18'),
(63, 8, 9, 69, 'wall-sticker-bedroom', 'black gray', '<p>This is a great wall-sticker for bedroom with color black\r\nand gray</p>', 'imgBO4.jpg', '2023-02-21 21:00:18'),
(64, 6, 11, 70, 'wall-sticker-bedroom', 'white blue', '<p>This is a great wall-sticker for bedroom with color blue\r\nand white</p>', 'imgBA2.jpg', '2023-02-21 21:00:18'),
(65, 6, 11, 77, 'wall-sticker-bedroom', 'gray blue', '<p>This is a great wall-sticker for bedroom with color blue\r\nand gray</p>', 'imgBA4.jpg', '2023-02-21 21:00:18'),
(66, 8, 11, 78, 'wall-sticker-bedroom', 'white', '<p>This is a great wall-sticker for bedroom with color  white</p>', 'imgBO8.jpg', '2023-02-21 21:00:18'),
(67, 8, 11, 69, 'wall-sticker-bedroom', 'white blue', '<p>This is a great wall-sticker for bedroom with color blue\nand white</p>', 'imgBO9.jpg', '2023-02-21 21:00:18'),
(78, 1, 5, 30, 'wall-sticker-home', 'orange', '<p>This is a great wall-sticker for home with color orange</p>', 'wall-sticker-butterflies-colorful.jpg', '2023-03-29 12:44:52'),
(79, 2, 13, 45, 'wall-sticker-kids-room', 'yellow pink', '<p>wall-sticker-kids-room-with-mini-mouse-colorful</p>', 'wall-sticker-kids-room-with-mini-mouse-colorful.jpg', '2023-03-29 12:54:38'),
(80, 2, 13, 40, 'wall-sticker-kids', 'pink', '<p>wall-sticker-kids-room-with-mini-mouse-colorful</p>', 'wall-sticker-kids-room-with-mini-mouse-colorful2.jpg', '2023-03-29 12:55:46'),
(81, 0, 5, 50, 'wall-sticker-kids-room', 'orange green', '<p>wall-sticker-kids-room-with-pooh-on-tree-pink</p>', 'wall-sticker-kids-room-with-pooh-on-tree-pink.jpg', '2023-03-29 12:57:44'),
(82, 2, 5, 55, 'wall-sticker-kids', 'yellow green', '<p>wall-sticker-kids-room-with-animals-yellow(green</p>', 'wall-sticker-kids-room-with-pooh-on-tree.jpg', '2023-03-29 13:00:10'),
(83, 7, 5, 45, 'wall-sticker-kitchen', 'black pink', '<p>wall-sticker-kitchen-with-cat</p>', 'wall-sticker-kitchen-with-cat.jpg', '2023-03-29 13:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `theme_id` int(11) NOT NULL,
  `theme_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`theme_id`, `theme_title`) VALUES
(1, 'WORDS&PHRASES'),
(2, 'LOVE'),
(3, 'FLOWERS'),
(4, 'TREES'),
(5, 'ANIMALS'),
(6, 'NATURE'),
(7, 'MUSIC'),
(8, 'GAMES'),
(9, 'SPORTS'),
(10, 'MOVIES'),
(11, 'STARS'),
(12, 'GLOWING'),
(13, 'DISENY'),
(14, 'ANIME'),
(15, '3D');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `prod_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`prod_id`, `cust_id`) VALUES
(60, 2),
(26, 2),
(16, 2),
(44, 1),
(28, 1),
(36, 1),
(43, 1),
(50, 1),
(66, 1),
(29, 1),
(61, 1),
(6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`theme_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
