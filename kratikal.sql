-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 10:27 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kratikal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `AdminEmail` text,
  `smtp` text,
  `ScriptName` text,
  `url` text,
  `contactno` varchar(30) NOT NULL,
  `smtpstatus` int(11) DEFAULT '0',
  `port` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `AdminEmail`, `smtp`, `ScriptName`, `url`, `contactno`, `smtpstatus`, `port`) VALUES
(0, 'sales@kritikalsolutions.com', '', 'KritiKal Solutions Inc.', 'http://localhost/kratikal/', '+1 (214) 440 8274', 0, 465);

-- --------------------------------------------------------

--
-- Table structure for table `admin1`
--

CREATE TABLE `admin1` (
  `id` int(11) NOT NULL,
  `LoginID` varchar(250) NOT NULL,
  `EmailAddress` varchar(50) DEFAULT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `Password` varchar(250) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Access` varchar(10) NOT NULL,
  `picture` text,
  `ApprovalStatus` int(11) NOT NULL,
  `AddedDate` datetime DEFAULT NULL,
  `record` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin1`
--

INSERT INTO `admin1` (`id`, `LoginID`, `EmailAddress`, `Mobile`, `Password`, `Name`, `Gender`, `Access`, `picture`, `ApprovalStatus`, `AddedDate`, `record`) VALUES
(7, 'sudhanshu1991', 'sudhanshu.chourey@gmail.com', '9301975143', 'sudhanshu1991', 'Sudhanshu Chourey', 'Male', '1', 'employee/585e4bcdcb11b227491c3396.png', 1, '2014-12-03 19:05:13', '2018-08-21 12:54:36'),
(21, 'sourabh', 'saurabhp@kritikalvision.ai', '9350649878', '123456', 'Sourabh Pandey', 'Male', '1', 'employee/585e4bcdcb11b227491c3396.png', 1, '2018-08-17 09:59:22', '2019-01-04 10:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `experience` int(11) NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `name`, `designation`, `experience`, `location`) VALUES
(33, 'sudhanshu chourey', 'full stack developer', 5, 'Jabalpur'),
(34, 'ashwin', 'hr', 2, 'Bangalore'),
(35, 'sam', 'web designer', 8, 'Noida'),
(36, 'soumitra', 'developer', 10, 'Jodhpur'),
(37, 'ankita', 'developer', 5, 'Jabalpur'),
(38, 'pooja', 'developer', 15, 'Allahabad'),
(40, 'krati', 'tester', 18, 'Noida');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `admin1`
--
ALTER TABLE `admin1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `LoginID` (`LoginID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin1`
--
ALTER TABLE `admin1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
