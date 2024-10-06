-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 10:15 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xsales`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `pro_id` varchar(1000) NOT NULL,
  `pro_name` varchar(1000) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `pro_id`, `pro_name`, `order_date`) VALUES
(1, 'Babatunde', 'tundeajayi@ymail.com', '5b oladimeji str ikorodu', '23 | 51', 'craps | fred', '2023-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(1000) NOT NULL,
  `pro_price` varchar(100) NOT NULL,
  `pro_qty` varchar(100) NOT NULL,
  `pro_size` varchar(100) NOT NULL,
  `pro_category` varchar(100) NOT NULL,
  `pro_subcategory` varchar(1000) NOT NULL,
  `pro_datepost` date NOT NULL,
  `pro_img` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_price`, `pro_qty`, `pro_size`, `pro_category`, `pro_subcategory`, `pro_datepost`, `pro_img`, `user_id`) VALUES
(1, 'Plasma Tv', '150000', '5', '50 inch', 'Electronics', 'Television', '2023-05-05', 'image14.jpeg', 2),
(2, 'Wrist Watch', '35000', '45', '5', 'Wears', 'Bumber jacket', '2023-05-11', 'image2.jpeg', 1),
(3, 'Wrist Watch', '40000', '5', '5', 'Wears', 'Others', '2023-05-11', 'image12.png', 1),
(4, 'Mart', '150000', '45', '5', 'Furniture', 'Chairs', '2023-05-11', 'image3.jpeg', 1),
(5, 'Laptop', '150000', '45', '5', 'Electronics', 'Others', '2023-05-11', 'image13.jpeg', 1),
(6, 'Chair', '150000', '45', '50 inch', 'Furniture', 'Chair', '2023-05-11', 'image6.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(1000) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_adrs` varchar(1000) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(1000) NOT NULL,
  `user_img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_email`, `user_adrs`, `password`, `role`, `user_img`) VALUES
(1, 'Babatunde', 'tundeajayi@ymail.com', '5b oladimeji str ikorodu', '00a206ecb8bd548bb774d5f5154e3e85', 'admin', ''),
(2, 'Babatunde', 'scarcet110@gmail.com', '5b oladimeji str ikorodu', '00a206ecb8bd548bb774d5f5154e3e85', 'customer', '');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
