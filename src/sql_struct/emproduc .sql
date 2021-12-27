-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 08:33 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `emproduc`
--

CREATE TABLE `emproduc` (
  `product` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `unit` float DEFAULT NULL,
  `reorder` varchar(255) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emproduc`
--

INSERT INTO `emproduc` (`product`, `name`, `category`, `unit`, `reorder`, `quantity`) VALUES
(33, 'Pigrolac', 'Seeds', 123, '2', NULL),
(34, 'ADOBO', 'Seeds', 1, '2', NULL),
(35, 'CALDERETA', 'Pesticide', 1, '2', NULL),
(36, 'SHIVERS', 'Fertilizers', 1, '2', NULL),
(37, 'SIBUYAS', 'Seeds', 10.5, '1', 0),
(38, 'MOMO', 'Seeds', 3, '2', 0),
(39, 'SABON', 'Fertilizers', 3, '2', 0),
(40, 'MERRY XMAS', 'Pesticide', 9, '8', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emproduc`
--
ALTER TABLE `emproduc`
  ADD PRIMARY KEY (`product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emproduc`
--
ALTER TABLE `emproduc`
  MODIFY `product` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
