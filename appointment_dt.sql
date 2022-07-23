-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2022 at 04:58 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment_dt`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookID` int(12) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Fname` varchar(3000) NOT NULL,
  `PhoneNum` varchar(15) NOT NULL,
  `CompName` varchar(3000) NOT NULL,
  `CompEmail` varchar(30) NOT NULL,
  `DOV` date NOT NULL,
  `TimeVisit` varchar(1000) NOT NULL,
  `ptm_id` int(5) NOT NULL,
  `Reason` varchar(30000) NOT NULL,
  `FileLink` varchar(10000) NOT NULL,
  `Timestamp` datetime NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `Username`, `Fname`, `PhoneNum`, `CompName`, `CompEmail`, `DOV`, `TimeVisit`, `ptm_id`, `Reason`, `FileLink`, `Timestamp`, `Status`) VALUES
(12, 'Adnan Hussin', 'Asna', '01223456789', 'Ahmad Idsan Snd Bhd', 'afiq@gmail.com', '2022-07-09', '', 1, 'Kerepok Lekor Project', 'https://www.udemy.com', '2022-07-07 17:39:45', 'Rejected'),
(13, 'Adnan Hussin', 'Asna', '0194478988', 'Ahmad Idsan Snd Bhd', 'asjdndnn@gmail.com', '2022-07-11', '', 1, 'Kerepok Lekor Project', 'https://www.udemy.com', '2022-07-07 18:00:54', 'Accepted'),
(16, 'Adnan Hussin', 'Hassan', '01223456789', 'Ahmad Maliki Company', 'ahmadmalkicomp@gmail.com', '2022-07-12', 'TimeVisit', 1, 'Kerepok Lekor Project', 'https://www.udemy.com', '2022-07-10 15:35:04', 'Booking Registered.Wait for the update'),
(17, 'Adnan Hussin', 'Ahmad Tarmizi', '01223456789', 'Ahmad Maliki Company', 'ahmadmalkicomp@gmail.com', '2022-07-25', 'TimeVisit', 1, 'kmlm', 'https://www.udemy.com', '2022-07-22 00:50:08', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`name`, `dob`, `contact`, `email`, `username`, `password`) VALUES
('Adnan Hussin', '1996-01-24', 19288399, 'adnanhussin@gmail.com', 'Adnan Hussin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `persontomeet`
--

CREATE TABLE `persontomeet` (
  `ptm_id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persontomeet`
--

INSERT INTO `persontomeet` (`ptm_id`, `name`, `position`) VALUES
(1, 'Izhar Hakim', 'CEO'),
(2, 'Adlin Maafus', 'Project Manager');

-- --------------------------------------------------------

--
-- Table structure for table `persontomeet_availability`
--

CREATE TABLE `persontomeet_availability` (
  `ptm_id` int(5) NOT NULL,
  `day` varchar(100) NOT NULL,
  `endtime` time NOT NULL,
  `starttime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persontomeet_availability`
--

INSERT INTO `persontomeet_availability` (`ptm_id`, `day`, `endtime`, `starttime`) VALUES
(1, 'Monday', '13:07:00', '01:07:00'),
(1, 'Monday', '13:09:00', '01:09:00'),
(1, 'Tuesday', '13:09:00', '01:09:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`email`,`username`);

--
-- Indexes for table `persontomeet`
--
ALTER TABLE `persontomeet`
  ADD PRIMARY KEY (`ptm_id`);

--
-- Indexes for table `persontomeet_availability`
--
ALTER TABLE `persontomeet_availability`
  ADD PRIMARY KEY (`ptm_id`,`day`,`endtime`,`starttime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
