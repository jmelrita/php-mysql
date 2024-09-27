-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 03:27 PM
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
-- Database: `election`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candID` int(11) NOT NULL,
  `candFName` varchar(255) NOT NULL,
  `candMName` varchar(255) NOT NULL,
  `candLName` varchar(255) NOT NULL,
  `posID` int(11) NOT NULL,
  `candStat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candID`, `candFName`, `candMName`, `candLName`, `posID`, `candStat`) VALUES
(1, 'Leody', 'Cap', 'De Guzman', 1, 'Inactive'),
(2, 'Ferdinand', 'Bongbong', 'Marcos', 1, 'Active'),
(3, 'Leni', 'Pink', 'Robredo', 1, 'Active'),
(4, 'Doc', 'Willie', 'Ong', 2, 'Inactive'),
(5, 'Kiko', 'John', 'Pangilinan', 2, 'Active'),
(6, 'Vicente', 'Tito', 'Sotto', 2, 'Active'),
(7, 'Abner', 'S', 'Afuang', 3, 'Active'),
(8, 'Mang', 'Jess', 'Arranza', 3, 'Active'),
(9, 'Ibrahim', 's', 'Albani', 3, 'Active'),
(10, 'Teddy', 'S', 'Bagilat', 3, 'Active'),
(11, 'Herbert', 'Bistek', 'Bautitsa', 3, 'Active'),
(12, 'Lutz', 'S', 'Barbo', 3, 'Active'),
(13, 'Ding', 'S', 'Diaz', 3, 'Active'),
(14, 'Jinggoy', 'J', 'Estrada', 3, 'Active'),
(15, 'Larry', 'S', 'Gadon', 3, 'Active'),
(16, 'Nur', 'Mahal', 'Kiram', 3, 'Active'),
(17, 'Kuya', 'Alex', 'Lacson', 3, 'Active'),
(18, 'Emily', 'S', 'Mallillin', 3, 'Active'),
(19, 'Lim', 'S', 'Ariel', 3, 'Active'),
(20, 'Francis', 'Leo', 'Marcos', 3, 'Active'),
(21, 'Sonny', 'S', 'Matula', 3, 'Active'),
(22, 'Sal', 'Panalo', 'Panelo', 3, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `posID` int(11) NOT NULL,
  `posName` varchar(255) NOT NULL,
  `numOfPositions` varchar(10) NOT NULL,
  `possStat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`posID`, `posName`, `numOfPositions`, `possStat`) VALUES
(1, 'President', '1', 'Active'),
(2, 'Vice-President', '1', 'Active'),
(3, 'Senator', '12', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`username`, `password`, `firstname`, `lastname`) VALUES
('admin', 'admin', 'Nathaniel', 'Tiempo');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `posID` int(11) NOT NULL,
  `voterID` int(11) NOT NULL,
  `candID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`posID`, `voterID`, `candID`) VALUES
(1, 4, 3),
(2, 4, 6),
(3, 4, 7),
(3, 4, 8),
(3, 4, 9),
(3, 4, 10),
(3, 4, 11),
(3, 4, 12),
(3, 4, 13),
(3, 4, 14),
(3, 4, 15),
(3, 4, 16),
(3, 4, 17),
(3, 4, 18),
(3, 4, 19),
(1, 4, 2),
(2, 4, 5),
(3, 4, 7),
(3, 4, 8),
(3, 4, 9),
(3, 4, 10),
(3, 4, 11),
(3, 4, 12),
(1, 1, 3),
(2, 1, 5),
(3, 1, 7),
(3, 1, 8),
(3, 1, 9),
(3, 1, 10),
(3, 1, 11),
(3, 1, 12),
(3, 1, 13),
(3, 1, 14),
(3, 1, 15),
(3, 1, 16),
(3, 1, 17),
(3, 1, 18),
(1, 2, 3),
(2, 2, 6),
(3, 2, 7),
(3, 2, 8),
(3, 2, 9),
(3, 2, 10),
(3, 2, 11),
(3, 2, 12),
(3, 2, 13),
(3, 2, 14),
(3, 2, 15),
(3, 2, 16),
(3, 2, 17),
(3, 2, 18),
(1, 3, 3),
(2, 3, 6),
(3, 3, 7),
(3, 3, 8),
(3, 3, 9),
(3, 3, 10),
(3, 3, 11),
(3, 3, 12),
(3, 3, 13),
(3, 3, 14),
(3, 3, 15),
(3, 3, 16),
(3, 3, 17),
(3, 3, 18),
(1, 5, 3),
(2, 5, 5),
(3, 5, 7),
(3, 5, 8),
(3, 5, 9),
(3, 5, 10),
(3, 5, 11),
(3, 5, 12),
(3, 5, 13),
(3, 5, 14),
(3, 5, 15),
(3, 5, 16),
(1, 6, 3),
(2, 6, 5),
(3, 6, 7),
(3, 6, 8),
(3, 6, 9),
(3, 6, 10),
(3, 6, 11),
(3, 6, 12),
(3, 6, 13),
(3, 6, 14),
(3, 6, 15),
(3, 6, 16),
(3, 6, 17),
(3, 6, 18),
(1, 7, 3),
(2, 7, 6),
(3, 7, 7),
(3, 7, 8),
(3, 7, 9),
(3, 7, 10),
(3, 7, 11),
(3, 7, 12),
(3, 7, 13),
(3, 7, 14),
(3, 7, 15),
(3, 7, 16),
(3, 7, 17),
(3, 7, 19),
(1, 8, 2),
(2, 8, 5),
(3, 8, 7),
(3, 8, 8),
(3, 8, 9),
(3, 8, 10),
(3, 8, 11),
(3, 8, 12),
(3, 8, 13),
(3, 8, 14),
(3, 8, 15),
(3, 8, 16),
(3, 8, 17),
(3, 8, 18);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `voterID` int(11) NOT NULL,
  `voterPass` varchar(255) NOT NULL,
  `voterFName` varchar(255) NOT NULL,
  `voterMName` varchar(255) NOT NULL,
  `voterLName` varchar(255) NOT NULL,
  `voterStat` varchar(10) NOT NULL,
  `voted` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`voterID`, `voterPass`, `voterFName`, `voterMName`, `voterLName`, `voterStat`, `voted`) VALUES
(1, '1', 'Kaye Denise', 'Mesterio', 'Racuya', 'Active', 'Yes'),
(2, '2', 'John ', 'Wilson', 'Nadela', 'Active', 'Yes'),
(3, '3', 'Allain Zenith', 'Nuñez', 'Sabandal', 'Active', 'Yes'),
(4, '4', 'Nathaniel', 'Cabual', 'Tiempo', 'Active', 'Yes'),
(5, '5', 'Chesty ', 'Mae', 'Flores', 'Active', 'Yes'),
(6, '6', 'Kyla Yvonne', 'Serafin', 'Belmonte', 'Active', 'Yes'),
(7, '7', 'Karl', 'James', 'Olivar', 'Active', 'Yes'),
(8, '8', 'John', 'Vincent', 'Miñoza', 'Active', 'Yes'),
(9, '9', 'Khyarah', 'Mae', 'Gesta', 'Active', 'No'),
(10, '10', 'Mico', 'Gimeno', 'Getalla', 'Active', 'No'),
(11, '11', 'Denzel', 'John', 'Ferraren', 'Active', 'No'),
(12, '12', 'Xerxes', 'S', 'Ondong III', 'Active', 'No'),
(13, '13', 'Angela', 'Sofia', 'Banogon', 'Active', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candID`),
  ADD KEY `posID` (`posID`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`posID`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD KEY `posID` (`posID`),
  ADD KEY `voterID` (`voterID`),
  ADD KEY `candID` (`candID`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`voterID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`posID`) REFERENCES `positions` (`posID`);

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`posID`) REFERENCES `positions` (`posID`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`voterID`) REFERENCES `voters` (`voterID`),
  ADD CONSTRAINT `vote_ibfk_3` FOREIGN KEY (`candID`) REFERENCES `candidates` (`candID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
