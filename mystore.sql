-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 04:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'sathees', 'satheeskumar0695@gmail.com', 'kumar'),
(2, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brands_id` int(50) NOT NULL,
  `brands_tittle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brands_id`, `brands_tittle`) VALUES
(1, 'NIKE'),
(2, 'FebIndia'),
(3, 'Zomota'),
(4, 'Amezon'),
(5, 'Lee Cooper'),
(6, 'dary milk'),
(7, 'Rolex daytona');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(50) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_tittle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_tittle`) VALUES
(1, 'Fruits'),
(2, 'T-Shirt'),
(3, 'Shoes'),
(4, 'Books'),
(5, 'jeans'),
(6, 'cloths'),
(7, 'food'),
(8, 'watch');

-- --------------------------------------------------------

--
-- Table structure for table `order_pending`
--

CREATE TABLE `order_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(25) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_pending`
--

INSERT INTO `order_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 769610285, 3, 1, 'pending'),
(2, 1, 1722837782, 3, 1, 'pending'),
(3, 1, 2065047667, 4, 1, 'pending'),
(4, 1, 756799023, 4, 1, 'pending'),
(5, 1, 1464855078, 3, 1, 'pending'),
(6, 1, 288932473, 3, 1, 'pending'),
(7, 1, 1249466380, 3, 1, 'pending'),
(8, 1, 2117207527, 4, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(100) NOT NULL,
  `brands_id` int(100) NOT NULL,
  `Product_image1` varchar(255) NOT NULL,
  `Product_image2` varchar(255) NOT NULL,
  `Product_image3` varchar(255) NOT NULL,
  `Product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brands_id`, `Product_image1`, `Product_image2`, `Product_image3`, `Product_price`, `date`, `status`) VALUES
(2, 'Shoes', 'Hex by hrithik roshan', 'shoes,nike, white shoes', 3, 1, 'shose1.jpg', 'shose.jpg', 'shose2.jpg', ' 550', '2023-09-09 18:56:07', ' true'),
(3, 'T-Shirt', 'casual t-shirt', 't-shirt ,whiteshirt', 2, 2, 'images (13).jpeg', 'tshirt3.jpg', 'tshirt2.jpg', ' 150', '2023-09-09 18:58:06', ' true'),
(4, 'Jeans', 'casual wear pants', 'jeans lee cooper pants', 5, 5, 'jeans.jpg', 'jeans1.jpg', 'jeans2.jpg', ' 450', '2023-09-10 19:56:10', ' true'),
(5, 'apple', 'apple are goods', 'apple', 1, 3, 'apple.jpg', 'apple.jpg', 'apple.jpg', ' 200', '2023-09-18 21:28:34', ' true'),
(6, 'boy baby', 'cloths', 'cloths, boy, girls,dress', 6, 5, 'boy3.jpg', 'boy2.jpg', 'boy1.jpg', ' 450', '2023-09-18 21:31:40', ' true'),
(7, 'girls baby', 'cloths for babys', 'girls ,, baby cloths', 6, 5, 'gril2.jpg', 'gril2.jpg', 'boy3.jpg', ' 300', '2023-09-18 21:33:18', ' true'),
(8, 'chocalte', 'darymilk chocaltes', 'chocalte,, darymilk', 7, 6, 'chocalte.jpg', 'choclte1.jpg', 'choclte2.jpg', ' 110', '2023-09-18 21:38:18', ' true'),
(9, 'men watches', 'all type of watches', 'watchs,men,rolex', 8, 7, 'watch2.jpg', 'watch1.jpg', 'watch.jpg', ' 299', '2023-09-18 21:45:23', ' true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 700, 769610285, 2, '2023-09-15 15:20:54', 'pending'),
(2, 1, 350, 1722837782, 2, '2023-09-15 15:21:48', 'pending'),
(3, 1, 450, 2065047667, 1, '2023-09-15 18:28:15', 'pending'),
(4, 1, 450, 756799023, 1, '2023-09-15 23:35:41', 'pending'),
(5, 1, 150, 1464855078, 1, '2023-09-17 04:34:20', 'pending'),
(6, 1, 150, 288932473, 1, '2023-09-18 15:25:45', 'pending'),
(7, 1, 150, 1249466380, 1, '2023-09-18 16:06:29', 'pending'),
(8, 1, 0, 1226760859, 0, '2023-09-18 16:08:39', 'pending'),
(9, 1, 450, 2117207527, 1, '2023-09-18 16:09:27', 'pending'),
(10, 1, 0, 656245201, 0, '2023-09-18 16:10:09', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, '', '', '$2y$10$2AnUaCmrZdFLw8teumyXzORgJ0Faz2vSpaTLzI6Yf5lFhJpYDqmtK', '::1', '', ''),
(2, 'sathees', 'kumar@gmail.com', '$2y$10$g5fVXQbFoT8IlkleJ9MQZ.e0DhCmk6KM28JD8Gls3BWcFQmgTM3B6', '::1', 'rasipuram', '9715283961'),
(3, 'saran', 'saran@gmail.com', '$2y$10$VeOdrNuO12D5YQawRPE6VOD59wnKpdY40pIisHZC2cSypwUqbYeU6', '::1', 'namakkal', '9715283961'),
(4, 'bhava', 'bhavan@gmail.com', '$2y$10$EeIr441P4bLcBUPJ7bSMq.M96KpNk1CmoxLYr4WoBxYto5ijoR2eS', '::1', 'karur', '8837134542');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brands_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order_pending`
--
ALTER TABLE `order_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brands_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
