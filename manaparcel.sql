-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:2020
-- Generation Time: Jul 05, 2023 at 12:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manaparcel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(10) NOT NULL,
  `adminEmail` varchar(25) NOT NULL,
  `adminPass` varchar(10) NOT NULL,
  `adminName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminEmail`, `adminPass`, `adminName`) VALUES
(1, 'a@a', '123', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `courierID` int(5) NOT NULL,
  `courierEmail` varchar(25) NOT NULL,
  `courierPass` varchar(10) NOT NULL,
  `courierName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`courierID`, `courierEmail`, `courierPass`, `courierName`) VALUES
(1, 'ayam@a', '123', 'samad');

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `parcelID` int(11) NOT NULL,
  `courierID` int(20) NOT NULL,
  `weight` float NOT NULL,
  `parcelStatus` varchar(25) NOT NULL,
  `userID` int(10) NOT NULL,
  `senderPoscode` int(10) NOT NULL,
  `senderName` varchar(255) NOT NULL,
  `senderPhone` int(11) NOT NULL,
  `senderAddress` varchar(255) NOT NULL,
  `trackID` varchar(255) NOT NULL,
  `recipientAddress` varchar(255) NOT NULL,
  `recipientPhone` int(11) NOT NULL,
  `recipientName` varchar(255) NOT NULL,
  `recipientPoscode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`parcelID`, `courierID`, `weight`, `parcelStatus`, `userID`, `senderPoscode`, `senderName`, `senderPhone`, `senderAddress`, `trackID`, `recipientAddress`, `recipientPhone`, `recipientName`, `recipientPoscode`) VALUES
(9, 1, 3, '', 1, 13700, 'Imi', 123456789, 'namsadasdasdasdasdasdas', '8729A768HT09', '1-07, KELISA HEIGHT APARTMENTS, JALAN KELISA EMAS 4', 113233232, 'ayam', 25300),
(10, 0, 32, '', 1, 13700, 'Imi', 123456789, 'namsadasdasdasdasdasdas', 'XU3CFSW6717C', 'dasdasdasdasda', 12312312, 'ayam', 323);

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `currentLocation` varchar(100) NOT NULL,
  `currentDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `trackID` varchar(255) NOT NULL,
  `parcelID` int(10) NOT NULL,
  `adminID` int(10) NOT NULL,
  `courierID` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`currentLocation`, `currentDate`, `trackID`, `parcelID`, `adminID`, `courierID`, `description`) VALUES
('dsdsad', '2023-07-04 16:00:00', '37EN4VLEGLTO', 8, 1, 0, 'dsadsa'),
('Seberang Jaya', '2023-07-04 16:00:00', '37EN4VLEGLTO', 8, 1, 0, 'takleh hantar sebab hujan :('),
('Seberang Jaya', '2023-07-04 16:00:00', '37EN4VLEGLTO', 8, 1, 0, 'takleh hantar sebab hujan :('),
('Seberang Jaya', '2023-07-04 16:00:00', '37EN4VLEGLTO', 8, 1, 0, 'takleh hantar sebab hujan :(dsd'),
('Seberang Jaya', '2023-07-04 16:00:00', '37EN4VLEGLTO', 8, 1, 0, 'takleh hantar sebab hujan :(dsd'),
('dsdsad', '2023-07-05 08:00:05', '37EN4VLEGLTO', 8, 1, 0, 'dsadsad'),
('Seberang Jaya', '2023-07-05 10:07:59', '8729A768HT09', 9, 1, 0, 'entah'),
('samad', '2023-07-05 10:08:17', '8729A768HT09', 9, 1, 0, 'entah la'),
('penang', '2023-07-05 10:15:22', '8729A768HT09', 9, 1, 0, 'hujan'),
('Seberang Jaya', '2023-07-05 10:34:49', 'XU3CFSW6717C', 10, 1, 0, 'dsadas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `userEmail` varchar(35) NOT NULL,
  `userUsername` varchar(25) NOT NULL,
  `userPass` varchar(25) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `userPhone` varchar(15) NOT NULL,
  `userAddress` varchar(255) NOT NULL,
  `userPoscode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userEmail`, `userUsername`, `userPass`, `userName`, `userPhone`, `userAddress`, `userPoscode`) VALUES
(1, 'imi0@gmail.com', 'imi0', 'imi0123', 'Imi', '0123456789', 'namsadasdasdasdasdasdas', 13700),
(2, 'test0@gmail.com', 'test00', 'test0001', 'test00', '01172955322', '', 0),
(3, 'test1@gmail.com', 'test1', 'test0123', 'test1', '0123455666', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`courierID`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`parcelID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `courierID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `parcelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
