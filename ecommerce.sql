-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 03:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(60, 1, 'dick francis ', 45, 1, 'shattered.jpg '),
(61, 1, 'nightshade ', 12, 1, 'nightshade.jpg ');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` int(20) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 1, 'abrahman', 'admin2@gmail.com', 1234567, 'hii    '),
(3, 1, 'fgd', 'admin@gmail.com', 4355, '            efgfds'),
(4, 1, 'ghf', 'huzaifahibngufran@gmail.com', 231, '            wsAX'),
(5, 1, 'gbgfd', 'ibnegufran75074@gmail.com', 32, '            331'),
(6, 1, 'ghf', 'admin@gmail.com', 4454, '            4545'),
(9, 1, 'gbgfd', 'user2@gmail.com', 34, '            43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` int(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `total_products` varchar(200) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(11, 1, 'user1', 2314, 'user1@gmail.com', 'cash on delievery', 'flat no.234, jamun, india, maharashtra, mumbai-3214', 'night shade  (1) ', 139, 'Sun-Jun-2024', 'completed'),
(12, 1, 'gbgfd', 312, 'user1@gmail.com', 'cash on delievery', 'flat no.3221, jamun, india, maharashtra, mumbai-4234', 'clever lands  (1) ', 47, 'Sun-Jun-2024', 'pending'),
(13, 1, 'gbgfd', 2123, 'admin2@gmail.com', 'cash on delievery', 'flat no.123, jamun, india, maharashtra, mumbai-321', 'darknet  (1) ', 45, 'Sun-Jun-2024', 'pending'),
(14, 1, 'user1', 342, 'admin@gmail.com', 'cash on delievery', 'flat no.423, jamun, india, maharashtra, mumbai-432', 'sdadsd  (1) ', 94, 'Sun-Jun-2024', 'pending'),
(15, 1, 'user1', 5445, 'admin2@gmail.com', 'cash on delievery', 'flat no.3455, jamun, india, maharashtra, mumbai-53656', ', darknet  (1) , bash and lucy  (1) ', 79, 'Sun-Jun-2024', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(5, 'dick francis', 45, 'shattered.jpg'),
(7, 'bash and lucy', 34, 'bash_and_lucy-2.jpg'),
(8, 'history of modern', 45, 'history_of_modern_architecture.jpg'),
(16, 'the world', 23, 'the_world.jpg'),
(17, 'boring girls', 23, 'boring_girls_a_novel.jpg'),
(18, 'new book', 34, 'shattered.jpg'),
(20, 'nightshade', 12, 'nightshade.jpg'),
(21, 'economic', 20, 'economic.jpg'),
(22, 'red queen', 50, 'red_queen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'user1', 'user1@gmail.com', '123', 'user'),
(3, 'admin1', 'admin2@gmail.com', '123', 'admin'),
(4, 'user2', 'user2@gmail.com', '123', 'user'),
(5, 'new admin', 'newadmin@gmail.com', '123', 'admin'),
(6, 'abdurrahman ansari', 'abdurrahman@gmail.com', 'abdurrahman123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
