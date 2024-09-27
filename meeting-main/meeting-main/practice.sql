-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 06:16 PM
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
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `empNo` int(11) NOT NULL,
  `empFName` text NOT NULL,
  `empMName` text NOT NULL,
  `empLName` text NOT NULL,
  `empPosition` text NOT NULL,
  `empDept` text NOT NULL,
  `empCampus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`empNo`, `empFName`, `empMName`, `empLName`, `empPosition`, `empDept`, `empCampus`) VALUES
(1, 'Kurt Kainne', 'Cabante', 'Garcia', 'Programmer', 'CCS', 'UCMain'),
(2, 'Xyra Trisha', 'Cantalejo', 'Emboy', 'Graphic Designer', 'SAFAD', 'USCTC'),
(14, 'Juan', 'Cruz', 'De La Cruz', 'Programmer', 'CCS', 'TC'),
(15, 'Historia', 'Uy', 'Reise', 'Database Manager', 'SAFAD', 'Banilad');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `mtgCode` int(11) NOT NULL,
  `mtgAgenda` text NOT NULL,
  `mtgVenue` text NOT NULL,
  `mtgDate` date NOT NULL,
  `mtgTstart` time NOT NULL,
  `mtgTend` time NOT NULL,
  `mtgFaci` text NOT NULL,
  `mtgStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`mtgCode`, `mtgAgenda`, `mtgVenue`, `mtgDate`, `mtgTstart`, `mtgTend`, `mtgFaci`, `mtgStatus`) VALUES
(1, 'Skills Test Workshop', 'CCS AVR', '2023-11-13', '08:00:00', '12:00:00', 'Faculty', 'Open'),
(2, 'Practicum Orientation', 'CCS LAB', '2023-11-13', '08:00:00', '12:00:00', 'PSITS', 'Open'),
(7, 'Practicum Orientation', 'CCS LAB', '2023-11-17', '08:00:00', '12:00:00', 'CCSITS', 'Open');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`empNo`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`mtgCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `empNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `mtgCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
