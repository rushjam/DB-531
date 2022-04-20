-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 06:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dfsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(5) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` char(45) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UpdationDate`) VALUES
(1, 'Admin', 'admin', 1234567899, 'admin@test.com', 'f925916e2754e5e03f75dd58a5733251', '2019-12-22 18:30:00', '2019-12-25 14:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `tblcow`
--

CREATE TABLE `tblcow` (
  `id` int(11) NOT NULL,
  `Cownumber` int(11) NOT NULL,
  `Gender` tinytext NOT NULL,
  `Breed` tinytext NOT NULL,
  `DateofBirth` date NOT NULL,
  `DateAcquired` date NOT NULL,
  `Status` varchar(150) NOT NULL,
  `DateRemoved` date NOT NULL,
  `Cause` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcowbreed`
--

CREATE TABLE `tblcowbreed` (
  `BreedID` int(11) NOT NULL,
  `BreedName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcwsale`
--

CREATE TABLE `tblcwsale` (
  `id` int(11) NOT NULL,
  `InvoiceNo` int(11) NOT NULL,
  `Date` int(11) NOT NULL,
  `CowNumber` int(100) NOT NULL,
  `Amount` int(100) NOT NULL,
  `Name` text NOT NULL,
  `Contact` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblfeed`
--

CREATE TABLE `tblfeed` (
  `id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `CowNumber` int(100) NOT NULL,
  `Remarks` text NOT NULL,
  `FoodItem` text NOT NULL,
  `Quantity` int(50) NOT NULL,
  `FeedingTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedsupplier`
--

CREATE TABLE `tblfeedsupplier` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Date` date NOT NULL,
  `Phone` int(11) NOT NULL,
  `QuantitySupplied` int(100) NOT NULL,
  `Total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblmcoll`
--

CREATE TABLE `tblmcoll` (
  `id` int(11) NOT NULL,
  `CollectionID` int(11) NOT NULL,
  `CowNumber` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Liter` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblmsale`
--

CREATE TABLE `tblmsale` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Date` date NOT NULL,
  `Liter` int(11) NOT NULL,
  `Priceperliter` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Emailid` varchar(70) NOT NULL,
  `Mobileno` int(11) NOT NULL,
  `Designation` text NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`id`, `Name`, `Emailid`, `Mobileno`, `Designation`, `Username`, `Password`) VALUES
(1, 'aa', 't@gmail.com', 2147483647, 'senior', '', 'admin'),
(2, 'trisha', 't@gmail.com', 1234567890, 'senior', '', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `tblvaccine`
--

CREATE TABLE `tblvaccine` (
  `id` int(11) NOT NULL,
  `CowNumber` int(255) NOT NULL,
  `VaccineDate` date NOT NULL,
  `Remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblvaccine`
--

INSERT INTO `tblvaccine` (`id`, `CowNumber`, `VaccineDate`, `Remarks`) VALUES
(1, 1, '2021-08-14', 'Hep-B');

-- --------------------------------------------------------

--
-- Table structure for table `tblvetdoctor`
--

CREATE TABLE `tblvetdoctor` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Location` text NOT NULL,
  `Phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);
--
-- Indexes for table `tblcow`
--
ALTER TABLE `tblcow`
  ADD PRIMARY KEY (`Cownumber`),
--
-- Indexes for table `tblcowbreed`
--
ALTER TABLE `tblcowbreed`
  ADD PRIMARY KEY (`BreedID`);
--
-- Indexes for table `tblcwsale`
--
ALTER TABLE `tblcwsale`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblfeed`
--
ALTER TABLE `tblfeed`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblfeedsupplier`
--
ALTER TABLE `tblfeedsupplier`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblmcoll`
--
ALTER TABLE `tblmcoll`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblmsale`
--
ALTER TABLE `tblmsale`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblvaccine`
--
ALTER TABLE `tblvaccine`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblvetdoctor`
--
ALTER TABLE `tblvetdoctor`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcow`
--
ALTER TABLE `tblcow`
  MODIFY `Cownumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcowbreed`
--
ALTER TABLE `tblcowbreed`
  MODIFY `BreedID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcwsale`
--
ALTER TABLE `tblcwsale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblfeed`
--
ALTER TABLE `tblfeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblfeedsupplier`
--
ALTER TABLE `tblfeedsupplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblmcoll`
--
ALTER TABLE `tblmcoll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblmsale`
--
ALTER TABLE `tblmsale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblvaccine`
--
ALTER TABLE `tblvaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblvetdoctor`
--
ALTER TABLE `tblvetdoctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcow`
--
ALTER TABLE `tblvaccine`
  ADD CONSTRAINT `fkey` FOREIGN KEY (`Cownumber`) REFERENCES `tblcow` (`id`);
  ADD CONSTRAINT `f1key` FOREIGN KEY (`VetID`) REFERENCES `tblvetdoctor` (`id`);
COMMIT;
ALTER TABLE `tblfeed`
  ADD CONSTRAINT `fkey` FOREIGN KEY (`Cownumber`) REFERENCES `tblcow` (`id`);
  ADD CONSTRAINT `f2key` FOREIGN KEY (`SupplierID`) REFERENCES `tblfeedsupplier` (`id`);
COMMIT;
ALTER TABLE `tblcowbreed`
  ADD CONSTRAINT `fkey` FOREIGN KEY (`Cownumber`) REFERENCES `tblcow` (`id`);
COMMIT;
ALTER TABLE `tblcowsale`
  ADD CONSTRAINT `fkey` FOREIGN KEY (`Cownumber`) REFERENCES `tblcow` (`id`);
COMMIT;
ALTER TABLE `tblmcoll`
  ADD CONSTRAINT `fkey` FOREIGN KEY (`Cownumber`) REFERENCES `tblcow` (`id`);
COMMIT;
ALTER TABLE `tblmilksale`
  ADD CONSTRAINT `fkey` FOREIGN KEY (`Cownumber`) REFERENCES `tblcow` (`id`);
  ADD CONSTRAINT `f3key` FOREIGN KEY (`CollectionID`) REFERENCES `tblmcoll` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
