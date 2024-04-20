-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 10:46 AM
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
-- Database: `base`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `NAME`) VALUES
(987654321, 'SAAD');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`ID`, `NAME`) VALUES
(123456789, 'OUALID SEBBIRRI');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `ID_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`ID`, `Nom`, `ID_project`) VALUES
(1, 'ROB JB OBC', 1),
(2, 'ROB JB OBD', 2),
(3, 'ROB JB OBA', 1),
(4, 'ROB JB OBH', 2);

-- --------------------------------------------------------

--
-- Table structure for table `holder`
--

CREATE TABLE `holder` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `ID_family` int(11) NOT NULL,
  `Activation` int(11) NOT NULL,
  `CPA` int(11) NOT NULL,
  `Bride` int(11) NOT NULL,
  `Cover` int(11) NOT NULL,
  `Latch` int(11) NOT NULL,
  `image_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holder`
--

INSERT INTO `holder` (`ID`, `NAME`, `ID_family`, `Activation`, `CPA`, `Bride`, `Cover`, `Latch`, `image_data`) VALUES
(1, '10A2C', 1, 10881650, 3333996, 33339726, 3333924, 3123996, 'image/1.jpg'),
(2, '10A2V', 2, 0, 0, 0, 0, 0, ''),
(3, '10A2M', 3, 0, 0, 0, 0, 0, ''),
(4, '10A2Z', 4, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ID`, `name`) VALUES
(1, 'CDPO'),
(2, 'CDPI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `relation` (`ID_project`);

--
-- Indexes for table `holder`
--
ALTER TABLE `holder`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `relation_1` (`ID_family`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `holder`
--
ALTER TABLE `holder`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `family`
--
ALTER TABLE `family`
  ADD CONSTRAINT `relation` FOREIGN KEY (`ID_project`) REFERENCES `project` (`ID`);

--
-- Constraints for table `holder`
--
ALTER TABLE `holder`
  ADD CONSTRAINT `relation_1` FOREIGN KEY (`ID_family`) REFERENCES `family` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
