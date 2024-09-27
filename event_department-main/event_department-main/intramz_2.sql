-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 09:44 PM
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
-- Database: `intramz`
--

-- --------------------------------------------------------

--
-- Table structure for table `athlete`
--

CREATE TABLE `athlete` (
  `idNum` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `deptID` int(11) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `middleInit` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `year` int(1) NOT NULL,
  `civilStatus` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `birthdate` date NOT NULL,
  `contactNo` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `coachID` int(11) NOT NULL,
  `deanID` int(11) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `approveDate` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `athlete`
--

INSERT INTO `athlete` (`idNum`, `eventID`, `deptID`, `lastName`, `firstName`, `middleInit`, `course`, `year`, `civilStatus`, `gender`, `birthdate`, `contactNo`, `address`, `coachID`, `deanID`, `status`, `approveDate`) VALUES
(2, 1, 1, 'Limbaga', 'Kazer Kynth', 'P', 'BSIT', 4, 'single', 'male', '2024-04-30', '11111111111111', 'Pardo', 13, 5, 'Approved', 'April 14 2024 09:41:32 PM'),
(14, 1, 1, 'Opuran', 'Cherry Mae', 'J', 'BSIT', 4, 'married', 'female', '2024-04-24', '11111111111111', 'Pardo', 13, 5, 'Disapproved', 'April 14 2024 09:42:37 PM');

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `userName` int(11) NOT NULL,
  `fName` varchar(200) NOT NULL,
  `lName` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `deptID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`userName`, `fName`, `lName`, `mobile`, `deptID`) VALUES
(4, 'cherry', 'maldita', '33333333333', 2),
(8, 'Quims', 'Gingoyon', '98888888888', 2),
(9, 'kharl', 'cabarrubias', '99999999999', 3),
(13, 'Dennis', 'Durano', '1231231231', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE `dean` (
  `userName` int(11) NOT NULL,
  `fName` varchar(200) NOT NULL,
  `lName` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `deptID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`userName`, `fName`, `lName`, `mobile`, `deptID`) VALUES
(5, 'Neil', 'Basabe', '55555555555', 1),
(10, 'Jane', 'Lopez', '22222222222', 2),
(11, 'Kharl', 'cabarrubias', '123123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptID` int(11) NOT NULL,
  `deptName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptID`, `deptName`) VALUES
(1, 'BSIT'),
(2, 'BSCS'),
(3, 'BSCP');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `eventName` varchar(200) NOT NULL,
  `noOfParticipant` int(11) NOT NULL,
  `tournamentManager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `category`, `eventName`, `noOfParticipant`, `tournamentManager`) VALUES
(1, 'Athletic', 'Football', 10, 3),
(2, 'Cultural', 'Solo Singing', 1, 6),
(3, 'Academic', 'Quiz Bowl', 5, 7),
(4, 'Athletic', 'Badminton', 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `regis`
--

CREATE TABLE `regis` (
  `userName` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirmPassword` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regis`
--

INSERT INTO `regis` (`userName`, `password`, `confirmPassword`, `role`) VALUES
(1, '123', '123', 'admin'),
(2, '123', '123', 'student'),
(3, '123', '123', 'tournamentManager'),
(4, '123', '123', 'coach'),
(5, '123', '123', 'dean'),
(6, '123', '123', 'tournamentManager'),
(7, '123', '123', 'tournamentManager'),
(8, '123', '123', 'coach'),
(9, '123', '123', 'coach'),
(10, '123', '123', 'dean'),
(11, '123', '123', 'dean'),
(13, '123', '123', 'coach'),
(14, '123', '123', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `tournamentmanager`
--

CREATE TABLE `tournamentmanager` (
  `userName` int(11) NOT NULL,
  `fName` varchar(200) NOT NULL,
  `lName` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `deptID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tournamentmanager`
--

INSERT INTO `tournamentmanager` (`userName`, `fName`, `lName`, `mobile`, `deptID`) VALUES
(3, 'kazer', 'limbaga', '11111111111', 2),
(6, 'kevin', 'libato', '22222222222', 2),
(7, 'JunMel', 'Rita', '33333333333', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athlete`
--
ALTER TABLE `athlete`
  ADD PRIMARY KEY (`idNum`),
  ADD KEY `eventID` (`eventID`),
  ADD KEY `deptID` (`deptID`),
  ADD KEY `coachID` (`coachID`),
  ADD KEY `deanID` (`deanID`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`userName`),
  ADD KEY `deptID` (`deptID`);

--
-- Indexes for table `dean`
--
ALTER TABLE `dean`
  ADD PRIMARY KEY (`userName`),
  ADD KEY `deptID` (`deptID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `tournamentManager` (`tournamentManager`);

--
-- Indexes for table `regis`
--
ALTER TABLE `regis`
  ADD PRIMARY KEY (`userName`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Indexes for table `tournamentmanager`
--
ALTER TABLE `tournamentmanager`
  ADD PRIMARY KEY (`userName`),
  ADD KEY `deptID` (`deptID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `athlete`
--
ALTER TABLE `athlete`
  ADD CONSTRAINT `athlete_ibfk_1` FOREIGN KEY (`idNum`) REFERENCES `regis` (`userName`),
  ADD CONSTRAINT `athlete_ibfk_2` FOREIGN KEY (`eventID`) REFERENCES `event` (`eventID`),
  ADD CONSTRAINT `athlete_ibfk_3` FOREIGN KEY (`deptID`) REFERENCES `department` (`deptID`),
  ADD CONSTRAINT `athlete_ibfk_4` FOREIGN KEY (`coachID`) REFERENCES `coach` (`userName`),
  ADD CONSTRAINT `athlete_ibfk_5` FOREIGN KEY (`deanID`) REFERENCES `dean` (`userName`);

--
-- Constraints for table `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`deptID`) REFERENCES `department` (`deptID`),
  ADD CONSTRAINT `coach_ibfk_2` FOREIGN KEY (`userName`) REFERENCES `regis` (`userName`);

--
-- Constraints for table `dean`
--
ALTER TABLE `dean`
  ADD CONSTRAINT `dean_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `regis` (`userName`),
  ADD CONSTRAINT `dean_ibfk_2` FOREIGN KEY (`deptID`) REFERENCES `department` (`deptID`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`tournamentManager`) REFERENCES `tournamentmanager` (`userName`);

--
-- Constraints for table `tournamentmanager`
--
ALTER TABLE `tournamentmanager`
  ADD CONSTRAINT `tournamentmanager_ibfk_1` FOREIGN KEY (`deptID`) REFERENCES `department` (`deptID`),
  ADD CONSTRAINT `tournamentmanager_ibfk_2` FOREIGN KEY (`userName`) REFERENCES `regis` (`userName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
