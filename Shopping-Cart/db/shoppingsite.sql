-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 08:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`) VALUES
(2, 'zara'),
(3, 'adidas'),
(4, 'Apple'),
(5, 'realme'),
(6, 'xiaomi'),
(7, 'HP'),
(8, 'noise'),
(10, 'LG'),
(11, 'Panasonic'),
(15, 'Hachette Book Group'),
(16, 'Bajaj'),
(38, 'Hopscotch'),
(40, 'us polo'),
(42, 'DELL'),
(43, 'Samsung'),
(46, 'Gucci'),
(47, 'Prada'),
(48, 'Calvin Klein'),
(49, 'Doir'),
(50, 'campus'),
(51, 'puma'),
(52, 'Red_chief'),
(53, 'crosin'),
(54, 'garnier'),
(55, 'mama earth'),
(56, 'danone'),
(57, 'Noor skincare'),
(58, 'gsk'),
(59, 'pigeon'),
(60, 'Nilkamal'),
(61, 'Supreme Industries'),
(62, 'Hot wheels'),
(63, 'LEGO'),
(64, 'zuru'),
(66, 'wipro');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(2, 'Electronics'),
(3, 'Books'),
(4, 'Mens fashion'),
(6, 'footwear'),
(7, 'womens fashion'),
(8, 'kids fashion'),
(9, 'Health and Beauty care'),
(10, 'Toys'),
(11, 'Kitchen');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `email`, `product_name`, `quantity`, `order_date`, `customer_id`, `price`) VALUES
(2, 'harsh', 'harshjdudhrejiya@gmail.com', 'Atomic habit', 1, '2024-04-07 10:06:12', 28, 100),
(3, 'test', 'test@gmail.com', 'pants', 1, '2024-04-08 07:24:55', 31, 3000),
(4, 'Krunal', 'krunal@gmail.com', 'iPhone 15', 1, '2024-04-22 00:55:03', 32, 79999);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `category`, `brand`, `price`, `details`) VALUES
(1, 'shirt', '4913.jpg', 'Mens', 'zara', 1299.00, 'Perfect product for a skinny fit.'),
(2, 'pants', 'pant.jpg', 'Mens', 'zara', 3000.00, ' About this item\r\n\r\n    Care Instructions: Machine Wash\r\n\r\n    Stretchable Waist: The pant waist is the same as the actual waist when measured with a measuring tape. In doubt, order a size smaller as our REVOLUTIONARY FLEXTECH WAISTBAND stretches up to 2 INCHES extra while fitting perfectly\r\n\r\n    PANT LENGTH: 41 inches. Pant can be altered to reduce the length, or, increase length by up to 2 inches due to margin in the fabric. Ensures optimal ankle length full pant\r\n\r\n    STRETCH FABRIC: Premium export quality clothing. Machine and hand washable. 95% poly viscose, 5% lycra elastane. Can be worn with a suit or coat\r\n\r\n    SLIM FIT: Snug fit from waist to ankle for the comfortable and formal man\r\n'),
(6, 'iPhone 15', 'iphone.jpg', 'Electronics', 'Apple', 79999.00, '*Retina Display\r\n*Type-C'),
(7, 'Atomic habit', '920_atomic_habit.jpg', 'Books', 'Hachette', 100.00, 'This is book.'),
(17, 'Realme Narzo 60', 'realme_narzo60.jpg', 'Electronics', 'realme', 15999.00, 'long battery\r\namoled display\r\n64 megapixel AI Camara'),
(19, 'YOU CAN', 'you can.jpg', 'Books', 'Hachette', 799.00, 'A powerful guide that asserts that you can do anything you set your mind to, you can is filled with quotes imparting the wisdom of a man whose teachings have inspired millions—Napoleon Hill, and commentary by the executive director of the Napoleon Hill Foundation, don M. Green.'),
(20, 'sealing fan', '51eRlRen8DL._SL1500_.jpg', 'Electronics', 'Bajaj', 1599.00, 'Bajaj Frore 1200 mm (48\") 1 star Rated Ceiling Fans for Home |BEE stars Rated Energy Efficient Ceiling Fan |Rust Free Coating for Long Life |High Air Delivery |2-Yr Warranty Brown '),
(21, '360 laptop', '360_laptop.jpg', 'Electronics', 'DELL', 79997.00, 'good battery, ips display, quick charge'),
(22, 'charger', 'charger.jpg', 'Electronics', 'xiaomi', 599.00, '35W Fast charging'),
(23, 'smart tv', 'smart_tv.jpg', 'Electronics', 'xiaomi', 45000.00, '55-inch IPS display, 30W Dolby speakers, Google TV, vivid Picture Engine'),
(24, 'smartwatch', 'smartwatch.jpg', 'Electronics', 'noise', 1599.00, 'long battery, Step count, heart rate sensor, 100+ watch faces.'),
(25, 'refrigerator', 'panasonic_fridge.jpg', 'Electronics', 'Panasonic', 60000.00, 'long cooling, Fresh storage, 30L capacity, Inbuilt Invertor.'),
(26, 'Adidas Shoes', 'Adidas.jpg', 'footwear', 'adidas', 10000.00, 'short shoes'),
(27, 'campus shoes', 'Campus.jpg', 'footwear', 'campus', 799.00, 'running shoes'),
(28, 'puma shoes', 'puma_shoes.jpg', 'footwear', 'puma', 14990.00, 'sport shoes'),
(29, 'red chief shoes', 'Red_chief.jpg', 'footwear', 'Red_chief', 12000.00, 'rigid shoes'),
(30, 'casual shoes', 'US_POLO.jpg', 'footwear', 'us', 9999.00, 'fit and comfortable'),
(31, 'crosin tablets', 'crosin.jpg', 'Health', 'crosin', 25.00, 'for instant relief of cold and headache'),
(32, 'facewash', 'face_wash.jpg', 'Health', 'garnier', 50.00, 'clear skin, remove dirt, remove oily substance'),
(33, 'lip stick', 'lip_stick.jpg', 'Health', 'mama', 898.00, 'only lipstick with no added chemicals'),
(34, 'protein ', 'protine.jpg', 'Health', 'danone', 1299.00, 'helps to gain real muscles '),
(35, 'under eye serum', 'serum.jpg', 'Health', 'Noor', 100.00, 'protects skin from dryness and makes dead cells repair'),
(36, 'vitamin pills', 'Vitamins.jpg', 'Health', 'gsk', 1389.00, 'for better gain of energy'),
(37, 'girl blue dress', 'blue_dress.jpg', 'kids', 'Hopscotch', 1500.00, '100% Cotton and stretchable comfort'),
(38, 'boy shirt and pant combo', 'combo1.jpg', 'kids', 'Hopscotch', 1299.00, 'easily adjustable light weight clothings, please read the instructions before washing'),
(39, 'white combo for kid', 'combo2.jpg', 'kids', 'Hopscotch', 999.00, 'white T-shirt and shorts are easily washable and dry fast.'),
(40, 'red night ware for girl', 'Red_nightware.jpg', 'kids', 'Hopscotch', 1490.00, 'pure 100% cotton cloth'),
(41, 'white dress', 'white_dress.jpg', 'kids', 'Hopscotch', 699.00, 'Light weight cotton material'),
(42, 'cooker', 'cooker.jpg', 'kitchen', 'pigeon', 1299.00, 'total space upto 4.2 liters'),
(43, 'pan', 'pan.jpg', 'kitchen', 'pigeon', 999.00, 'with nonstick technology and easy-to-wash'),
(44, 'bowl', 'bowl.jpg', 'kitchen', 'Supreme', 151.00, 'with premium quality material'),
(45, 'chopper', 'chopper.jpg', 'kitchen', 'Nilkamal', 99.00, 'Easy to make a paste '),
(46, 'knife', 'knife.jpg', 'kitchen', 'Nilkamal', 50.00, 'sharp and durable knife with combo.'),
(47, 'plates combo', 'plate.jpg', 'kitchen', 'Supreme', 299.00, 'Set of 6 plates'),
(48, 'spoons', 'spoon.jpg', 'kitchen', 'Supreme', 199.00, '12 sets of spoons and spikes'),
(49, 'shorts', 'shorts.jpg', 'Mens', 'Gucci', 800.00, 'comfort and easy to wash 100% cotton'),
(50, 'olive shirt', 'olive_shirt.jpg', 'Mens', 'zara', 1299.00, 'shirt with rich color and comfort'),
(51, 'cream pants', 'cream_pant.jpg', 'Mens', 'Gucci', 5000.00, 'with stretchable material and great comfort'),
(52, 'hot wheels cars ', 'hot_whjeels.jpg', 'Toys', 'Hot', 1599.00, 'easy to assemble and play'),
(53, 'Lego harry potter', 'lego.jpg', 'Toys', 'LEGO', 1999.00, 'build a block and create a stroy'),
(54, 'talking cactus', 'Talking_cactus.jpg', 'Toys', 'ZURU', 997.00, 'cactus dances and repeats sentences'),
(55, 'red dress', '11939.jpg', 'womens', 'Doir', 9000.00, 'slim design and and easy to wash'),
(56, 'yellow dress', '2148510342.jpg', 'womens', 'zara', 4500.00, 'clean design and better comfort feel'),
(57, 'black dress', '13052.jpg', 'womens', 'Gucci', 9000.00, 'great design with added patterns.'),
(58, 'Electric kettle', 'Electric kettle.jpg', 'Electronics', 'wipro', 1000.00, '*Best in range\r\n*Fast Heating\r\n*Durable\r\n*3 Year Warranty ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `username`, `mobile`, `email`, `photo`, `password`, `id`) VALUES
('tejas', 'makwana', 'tejas12', 1234567890, 'tejas@gmail.com', '121_user2.jpeg', '15e8e7c72ea16ca290930fd7c4db760b', 25),
('suraj', 'rajput', 'suraj12', 1234567890, 'suraj@gmail.com', 'user1.png', '8127a1ad276367223d9d0a2d264e4b2e', 27),
('Harsh', 'Dudharejiya', 'harsh', 6355040996, 'harshjdudhrejiya@gmail.com', '1.png', '25f9e794323b453885f5181f1b624d0b', 28),
('purav', 'desai', 'purav38', 1234567890, 'purav@gmail.com', 'user4.png', '3ae55b599efa62a325c7e585fcd6be4e', 30),
('KRUNAL', 'KONKANI', 'krunal23', 9016104179, 'krunalkonkani11102010@gmail.com', 'pic (1) (1).jpg', '472f83040bf80435b024f005b65179dc', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
