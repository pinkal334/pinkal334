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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
