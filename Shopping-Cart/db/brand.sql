-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 08:51 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
