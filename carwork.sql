-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2025 at 06:55 PM
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
-- Database: `carwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `ID` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`ID`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `ID` int(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Address` text NOT NULL,
  `Phone` int(13) NOT NULL,
  `License_no` varchar(50) NOT NULL,
  `Engine_no` varchar(50) NOT NULL,
  `appointment_date` date NOT NULL,
  `mid` int(100) NOT NULL,
  `m.name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`ID`, `Name`, `Email`, `password`, `Address`, `Phone`, `License_no`, `Engine_no`, `appointment_date`, `mid`, `m.name`) VALUES
(1, 'Sirajum Munira Parly', '', '', 'house no.45,manda 1st street,9th lane,mugdha', 1722830311, '34e3rfeer3241234', 'efedf234r234', '2025-08-07', 0, ''),
(11, 'Sirajum Munira Parly', 'sirajummunira1318@gmail.com', '', 'house no.45,manda 1st street,9th lane,mugdha', 1722830311, '34e3rfeer3241234', 'efedf234r234', '2025-08-06', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `mechanicinfo`
--

CREATE TABLE `mechanicinfo` (
  `ID` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mechanicinfo`
--

INSERT INTO `mechanicinfo` (`ID`, `name`, `phone`) VALUES
(1, 'm1', 22222222),
(2, 'm2', 1717171717),
(3, 'm3', 2147483647),
(4, 'm4', 2147483647),
(5, 'm5', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Email`, `Password`) VALUES
(1, 'Sirajum Munira Parly', 'sirajummunira1318@gmail.com', '123'),
(2, 'munira', 'munira@gmail.com', '1212'),
(3, 'sirajum', 'sirajum@gmail.com', '2222'),
(4, 'azz', 'azz@gmail.com', '$2y$10$w65Xbhc18q73w1u/rr8oFOctkxzsH5SRmn2Hx70w1kSFvra/d6zbS'),
(5, 'aqq', 'aqq@gmail.com', '$2y$10$fT22Z9HDY0dE18i8.rynnuG4.CCwVbaQGp8VaID0l3skRcnT1fEHy'),
(6, 'pinky', 'pinky@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`ID`,`email`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `mechanicinfo`
--
ALTER TABLE `mechanicinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mechanicinfo`
--
ALTER TABLE `mechanicinfo`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
