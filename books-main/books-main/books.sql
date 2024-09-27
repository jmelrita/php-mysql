-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 09:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `isbn` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `copyright` int(4) NOT NULL,
  `edition` int(2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(6) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn`, `title`, `copyright`, `edition`, `price`, `quantity`, `total`) VALUES
('', '', 0, 0, '0.00', 0, '0.00'),
('2334432432', 'refdsfds', 456, 34234, '654645.00', 3312, '0.00'),
('23432', 'asdsadas', 0, 0, '0.00', 0, '0.00'),
('234324234', '', 0, 0, '0.00', 0, '0.00'),
('234534', 'fda', 432, 312, '312.00', 3, '0.00'),
('32423', '', 0, 0, '0.00', 0, '0.00'),
('32432', 'asd', 123, 213, '123.00', 12, '0.00'),
('32452', 'qwertyuiop', 12321, 1232, '123.00', 23, '0.00'),
('34324', 'asd', 1, 123, '2.00', 1, '0.00'),
('3453', 'dsada', 312, 312, '312.00', 312, '0.00'),
('34534', 'asdas', 123, 123, '1.00', 1, '0.00'),
('345345', 'sdsa', 3, 1, '12.00', 1, '0.00'),
('3453454', '', 0, 0, '0.00', 0, '0.00'),
('3456', 'sdfdsf', 12312, 123, '123.00', 123, '0.00'),
('345678', 'asdsad', 1233, 213, '3232.00', 122, '0.00'),
('3543534', 'asdsad', 3, 123, '132.00', 1, '0.00'),
('4122', 'aeqqq', 23, 3231, '32.00', 1, '0.00'),
('412432432', '', 0, 0, '0.00', 0, '0.00'),
('4234324', '', 0, 0, '0.00', 0, '0.00'),
('424242', '', 0, 0, '0.00', 0, '0.00'),
('4324', 'asdasd', 213, 123, '123.00', 123, '345.00'),
('432423', 'asd', 123, 123, '123.00', 1, '0.00'),
('432432', '', 0, 0, '0.00', 0, '0.00'),
('4324321', 'asdsad', 2313, 123, '12.00', 1231, '0.00'),
('4324324', '', 0, 0, '0.00', 0, '0.00'),
('43432', 'sdfsdf', 2134, 12, '12.00', 1, '0.00'),
('435', 'asd', 123, 123, '123.00', 1, '0.00'),
('435345', 'sadasaaaaaa', 123, 324, '123.00', 12321, '0.00'),
('444', '', 0, 0, '0.00', 0, '0.00'),
('456435', 'sdfdsf', 123, 123, '123.00', 0, '0.00'),
('45645645', '', 0, 0, '0.00', 0, '0.00'),
('5345345', 'sadsa', 23, 2, '1.00', 1, '0.00'),
('54334534', '', 0, 0, '0.00', 0, '0.00'),
('567890', '', 0, 0, '0.00', 0, '0.00'),
('798', 'sadsa', 213, 1, '2.00', 1, '0.00'),
('867', '', 0, 0, '0.00', 0, '0.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
