-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2022 at 05:01 PM
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
-- Database: `iot_data_logger`
--

-- --------------------------------------------------------

--
-- Table structure for table `distance_data`
--

CREATE TABLE `distance_data` (
  `id` int(11) NOT NULL,
  `distance` decimal(10,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remarks` varchar(192) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distance_data`
--

INSERT INTO `distance_data` (`id`, `distance`, `timestamp`, `remarks`) VALUES
(26, '0.00', '2022-07-05 14:14:44', 'not_working'),
(27, '0.00', '2022-07-05 14:14:50', 'not_working'),
(28, '0.00', '2022-07-05 14:14:55', 'not_working'),
(29, '0.00', '2022-07-05 14:15:02', 'not_working'),
(30, '0.00', '2022-07-05 14:15:07', 'not_working'),
(31, '0.00', '2022-07-05 14:15:13', 'not_working'),
(32, '0.00', '2022-07-05 14:15:18', 'not_working');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distance_data`
--
ALTER TABLE `distance_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distance_data`
--
ALTER TABLE `distance_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
