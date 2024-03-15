-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 09:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spruhahealthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `EquipmentID` int(11) DEFAULT NULL,
  `Createdon` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `Categoryname` varchar(255) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `Categoryname`, `Status`) VALUES
(1, 'Cardiac Care', 1),
(2, 'Geriartic Care', 0),
(3, 'Sleep and Apnea Therapy', 1),
(4, 'Respiratory Care', 1),
(5, 'Orthopedic and Physio Care', 1),
(6, 'Mother and Baby Care', 1),
(7, 'Miscellaneous', 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `ID` int(11) NOT NULL,
  `StateID` int(11) NOT NULL,
  `Cityname` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ID`, `StateID`, `Cityname`) VALUES
(1, 1, 'Edison'),
(2, 2, 'Ahmedabad');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `ID` int(11) NOT NULL,
  `Countryname` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`ID`, `Countryname`) VALUES
(1, 'USA'),
(2, 'India'),
(3, 'Dubai'),
(4, 'Africa');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `ID` int(11) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Name` varchar(150) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Specification` varchar(255) DEFAULT NULL,
  `Color` varchar(10) DEFAULT NULL,
  `Comapny` varchar(100) DEFAULT NULL,
  `Image1` varchar(255) DEFAULT NULL,
  `Image2` varchar(255) DEFAULT NULL,
  `Image3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`ID`, `CategoryID`, `Name`, `Qty`, `Price`, `Description`, `Specification`, `Color`, `Comapny`, `Image1`, `Image2`, `Image3`) VALUES
(1, 1, 'Pace maker', 1, 1200, 'A pacemaker is a small, battery-powered device that prevents the heart from beating too slowly. You need surgery to get a pacemaker. The device is placed under the skin near the collarbone. A pacemaker also is called a cardiac pacing device', 'Lighweight \r\nSmall', 'White', 'Orthogen', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `ID` int(11) NOT NULL,
  `EquipmentID` int(11) DEFAULT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `Ordertype` tinyint(1) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `TechnicianID` int(11) DEFAULT NULL,
  `PaymentID` int(11) DEFAULT NULL,
  `Orderdate` date DEFAULT NULL,
  `Isshiping` tinyint(1) DEFAULT NULL,
  `Shipment` varchar(10) DEFAULT NULL,
  `Needtechnician` tinyint(1) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Totalamt` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `ID` int(11) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `Statename` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`ID`, `CountryID`, `Statename`) VALUES
(1, 1, 'New Jersey'),
(2, 2, 'Gujarat'),
(3, 1, 'New York');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `ID` int(11) NOT NULL,
  `CityID` int(11) DEFAULT NULL,
  `Firstname` varchar(30) DEFAULT NULL,
  `Lastname` varchar(30) DEFAULT NULL,
  `Mobile` varchar(10) DEFAULT NULL,
  `Altmobile` varchar(10) DEFAULT NULL,
  `Email` varchar(60) DEFAULT NULL,
  `Address` varchar(150) DEFAULT NULL,
  `Pincode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `CityID` int(11) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Altmobile` varchar(10) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Pincode` varchar(10) NOT NULL,
  `Countrycode` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `CityID`, `Username`, `Password`, `Firstname`, `Lastname`, `Mobile`, `Altmobile`, `Address`, `Pincode`, `Countrycode`) VALUES
(1, 1, 'avadhi81@gmail.com', 'Ny@12345', 'Avadhi', 'Shah', '9081234590', '981234591', '19, Calvert Ave, Edison', '08820', '1'),
(2, 1, 'as23710n@pace.edu', 'Ny123@ui', 'AVADHI', 'SHAH', '8482478668', '', '132 Alfred St', '08820', '1'),
(3, 1, 'as23710n@pace.edu', 'Ny123@ui', 'AVADHI', 'SHAH', '8482478668', '', '132 Alfred St', '08820', '1'),
(4, 1, 'Nia900@gmail.com', 'Ny47800@', 'Nia', 'Shah', '9022899008', '', '132 Alfred St', '08820', '1'),
(5, 1, 'Nia900@gmail.com', 'Ny47800@', 'Nia', 'Shah', '9022899008', '', '132 Alfred St', '08820', '1'),
(6, 1, 'Nia900@gmail.com', 'Ny47800@', 'Nia', 'Shah', '9022899008', '', '132 Alfred St', '08820', '1'),
(7, 1, 'mk99@gmail.com', 'mkoradia@12', 'Mudra', 'Koradia', '9089976451', '9988776655', '120, calvert street', '08830', '+1'),
(8, 1, 'mk99@gmail.com', 'mkoradia@12', 'Mudra', 'Koradia', '9089976451', '9988776655', '120, calvert street', '08830', '+1'),
(9, 1, 'mk99@gmail.com', 'mkoradia@12', 'Mudra', 'Koradia', '9089976451', '9988776655', '120, calvert street', '08830', '+1'),
(10, 2, 'br99@gmail.com', 'Br1234@', 'Brinda', 'Patel', '9091340981', '', '11,West street Belford\r\n', '11083', '+1');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `ID` int(11) NOT NULL,
  `EquipmentID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `UserID` (`UserID`),
  ADD KEY `EquipmentID` (`EquipmentID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `StateID` (`StateID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EquipmentID` (`EquipmentID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `TechnicianID` (`TechnicianID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CountryID` (`CountryID`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CityID` (`CityID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `CityID` (`CityID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EquipmentID` (`EquipmentID`),
  ADD KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`EquipmentID`) REFERENCES `equipment` (`ID`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`StateID`) REFERENCES `state` (`ID`);

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`ID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`EquipmentID`) REFERENCES `equipment` (`ID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`TechnicianID`) REFERENCES `technician` (`ID`);

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `FK_State` FOREIGN KEY (`CountryID`) REFERENCES `country` (`ID`),
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`CountryID`) REFERENCES `country` (`ID`);

--
-- Constraints for table `technician`
--
ALTER TABLE `technician`
  ADD CONSTRAINT `technician_ibfk_1` FOREIGN KEY (`CityID`) REFERENCES `city` (`ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`CityID`) REFERENCES `city` (`ID`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`EquipmentID`) REFERENCES `equipment` (`ID`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
