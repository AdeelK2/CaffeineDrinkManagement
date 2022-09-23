-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2022 at 03:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caffeine_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirm_password` varchar(20) NOT NULL,
  `created_at` datetime(5) NOT NULL DEFAULT current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `confirm_password`, `created_at`) VALUES
(1, 'test', 'test@test.com', 'test123', 'test123', '0000-00-00 00:00:00.00000');

-- --------------------------------------------------------

--
-- Table structure for table `customer_drinks_stats`
--

CREATE TABLE `customer_drinks_stats` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `caffeine_qty_consumed` int(20) DEFAULT NULL,
  `drink_name` varchar(20) NOT NULL,
  `drink_qty` int(10) DEFAULT NULL,
  `drink_caffeine_qty` int(50) DEFAULT NULL,
  `drink_price` int(50) DEFAULT NULL,
  `created_at` datetime(5) NOT NULL DEFAULT current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `id` int(11) NOT NULL,
  `drink_name` varchar(20) NOT NULL,
  `drink_company_name` varchar(20) NOT NULL,
  `price` int(50) DEFAULT NULL,
  `drink_code` int(10) NOT NULL,
  `drink_quantity` int(11) DEFAULT NULL,
  `caffeine_qty` int(50) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` datetime(5) NOT NULL DEFAULT current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`id`, `drink_name`, `drink_company_name`, `price`, `drink_code`, `drink_quantity`, `caffeine_qty`, `description`, `created_at`) VALUES
(1, 'Monster Ultra Sunris', 'Monster Energy', 50, 123, 2, 75, 'A refreshing orange beverage that has 75mg of caffeine per serving. Every can has two servings. ', '2022-09-19 15:38:07.31206'),
(2, 'Black Coffee', 'Coffeen', 30, 124, 2, 95, 'The classic, the average 8oz. serving of black coffee has 95mg of caffeine.', '2022-09-19 15:39:15.43942'),
(3, 'Americano ', 'AmericansCo', 50, 125, 5, 77, 'Sometimes you need to water it down a bit... and in comes the americano with an average of 77mg. of caffeine per serving', '0000-00-00 00:00:00.00000'),
(5, 'Sugar free NOS', 'NOS', 30, 126, 5, 130, 'Another orange delight without the sugar. It has 130 mg. per serving, and each can have two servings', '0000-00-00 00:00:00.00000'),
(6, '5 Hour Energy ', 'EnergyCo', 40, 127, 5, 200, 'amazing shot of get up and go! Each 2 fl. oz. container has 200mg of caffeine to get you going. ', '0000-00-00 00:00:00.00000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_drinks_stats`
--
ALTER TABLE `customer_drinks_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_drinks_stats`
--
ALTER TABLE `customer_drinks_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
