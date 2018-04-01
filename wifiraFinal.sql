-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 10:08 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wifira`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `accountNo` int(11) NOT NULL AUTO_INCREMENT,
  `roleId` enum('Admin','Staff') NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `accountStatus` enum('Enable','Disable') NOT NULL,
  `visibility` enum('Visible','Hidden') NOT NULL,
  `contactNumber` bigint(11) NOT NULL,
  `emailAddress` varchar(320) CHARACTER SET big5 NOT NULL,
  PRIMARY KEY (`accountNo`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `accountNo` (`accountNo`),
  KEY `accoun_no` (`accountNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accountNo`, `roleId`, `name`, `address`, `username`, `password`, `accountStatus`, `visibility`, `contactNumber`, `emailAddress`) VALUES
(1, 'Admin', 'Lou Philip Beltran', 'Aurora Hill', 'lou123', '444', 'Enable', 'Visible', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `kioskmachine`
--

CREATE TABLE IF NOT EXISTS `kioskmachine` (
  `kioskId` int(11) NOT NULL AUTO_INCREMENT,
  `kioskName` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `ipAddress` varchar(45) NOT NULL,
  `kioskStatus` enum('Enable','Disable') NOT NULL,
  PRIMARY KEY (`kioskId`),
  KEY `kioskId` (`kioskId`),
  KEY `kiosk_id` (`kioskId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

--
-- Dumping data for table `kioskmachine`
--

INSERT INTO `kioskmachine` (`kioskId`, `kioskName`, `location`, `ipAddress`, `kioskStatus`) VALUES
(101, 'WIFIRALABS', 'aurora hill', '192.168.21', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `salesId` int(11) NOT NULL,
  `entity` enum('ADMIN','STAFF','KIOSK') NOT NULL,
  `voucherCode` varchar(45) NOT NULL,
  `dateUsed` date NOT NULL,
  `accountNo` int(11) DEFAULT NULL,
  `kioskId` int(11) DEFAULT NULL,
  PRIMARY KEY (`salesId`),
  KEY `voucherCode_idx` (`voucherCode`),
  KEY `accountNo_idx` (`accountNo`),
  KEY `kioskID_idx` (`kioskId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE IF NOT EXISTS `vouchers` (
  `voucherId` int(11) NOT NULL AUTO_INCREMENT,
  `voucherCode` varchar(45) NOT NULL,
  `voucherType` enum('A','B','C') NOT NULL,
  `voucherAmount` int(11) NOT NULL,
  `voucherStatus` enum('Sold','Unsold') NOT NULL,
  `datePrinted` date NOT NULL,
  `accountNo` int(11) DEFAULT NULL,
  `kioskId` int(11) DEFAULT NULL,
  `dateSold` date DEFAULT NULL,
  PRIMARY KEY (`voucherId`),
  KEY `voucherCode` (`voucherCode`),
  KEY `account_No_idx` (`accountNo`),
  KEY `kiosk_id_idx` (`kioskId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `accountNo` FOREIGN KEY (`accountNo`) REFERENCES `accounts` (`accountNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `kioskID` FOREIGN KEY (`kioskId`) REFERENCES `kioskmachine` (`kioskId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `voucherCode` FOREIGN KEY (`voucherCode`) REFERENCES `vouchers` (`voucherCode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `account_No` FOREIGN KEY (`accountNo`) REFERENCES `accounts` (`accountNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `kiosk_id` FOREIGN KEY (`kioskId`) REFERENCES `kioskmachine` (`kioskId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
