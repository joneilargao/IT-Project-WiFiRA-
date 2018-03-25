-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2018 at 11:30 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wifira`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accountNo` int(11) NOT NULL,
  `roleId` enum('Admin','Staff') NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `accountStatus` enum('Enable','Disable') NOT NULL,
  `image` longblob,
  `visibility` enum('Visible','Hidden') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accountNo`, `roleId`, `name`, `address`, `username`, `password`, `accountStatus`, `image`, `visibility`) VALUES
(1, 'Staff', 'Alfa Leizel Leones', 'Baguio City', 'alfa123', '000', 'Enable', NULL, 'Visible'),
(2, 'Staff', 'Joneil Argao', 'Zambales', 'joneil123', '111', 'Enable', NULL, 'Hidden'),
(3, 'Staff', 'James Anonuevo', 'Baguio City', 'james123', '222', 'Disable', NULL, 'Visible'),
(4, 'Staff', 'Cyrene Jane Dispo', 'Pangasinan', 'cyrene123', '333', 'Disable', NULL, 'Hidden'),
(5, 'Admin', 'Lou Beltran', 'Baguio City', 'lou123', '444', 'Enable', NULL, 'Visible'),
(6, 'Staff', 'Katherine Turqueza', 'Abra', 'kath123', '555', 'Enable', NULL, 'Visible'),
(7, 'Staff', 'Maureen Nicole Calpito', 'Baguio City', 'mau123', '666', 'Enable', NULL, 'Visible'),
(8, 'Staff', 'Apollo Joshua Mina', 'Baguio City', 'ajm123', '777', 'Enable', NULL, 'Hidden'),
(9, 'Admin', 'Madonna Beltran', 'Baguio City', 'pido123', '111', 'Enable', NULL, 'Visible'),
(10, 'Admin', 'Don Lopen Beltran', 'Baguio City', 'Lopen123', '999', 'Enable', NULL, 'Visible'),
(11, 'Staff', 'Darren Sison', 'Pangasinan', 'dars123', '101', 'Disable', 0x3f, 'Visible'),
(12, 'Staff', 'Jon Snow', '7114 Kundiman Street, Sampaloc City', 'jon001', '690', 'Enable', 0x3f, 'Visible'),
(13, 'Staff', 'Damon Salvatore', '1135 Quezon City, Metro Manila', 'dam002', '806', 'Disable', 0x3f, 'Visible'),
(14, 'Admin', 'Khal Drogo', '75 P. Domingo Street, Makati City', 'khal003', '134', 'Enable', 0x3f, 'Visible'),
(15, 'Admin', 'Charles Xavier', '235 Salcedo St., Makati City', 'char004', '642', 'Enable', 0x3f, 'Visible'),
(16, 'Staff', 'Tony Stark', '141 Abanao Extension, Baguio City', 'tony005', '643', 'Disable', 0x3f, 'Visible'),
(17, 'Staff', 'Dominic Toretto', '983 Rizal Avenue Extension, Metro Manila', 'dom006', '124', 'Enable', 0x3f, 'Visible'),
(18, 'Staff', 'Daenerys Targaryen', '456 San Jose Road, Zamboanga City', 'rys007', '321', 'Disable', 0x3f, 'Hidden'),
(19, 'Staff', 'Peter Parker', '12 Gov. Villavert Street, Iloilo City', 'peter008', '235', 'Enable', 0x3f, 'Visible'),
(20, 'Staff', 'Jean Grey', '43 Iznart Street, Iloilo City', 'jean009', '235', 'Disable', 0x3f, 'Hidden'),
(21, 'Staff', 'Clark Kent', '67 Villamonte, Bacolod City', 'clark100', '464', 'Enable', 0x3f, 'Visible'),
(22, 'Staff', 'Diana Prince', '546 Colon Street, Cebu City', 'diana101', '578', 'Disable', 0x3f, 'Visible'),
(23, 'Admin', 'Tyrion Lannister', '347 Gallares St., Tagbilaran City', 'tyr102', '346', 'Enable', 0x3f, 'Visible'),
(24, 'Admin', 'Harry Potter', '097 Burgos St., Cebu City', 'harry103', '057', 'Enable', 0x3f, 'Visible'),
(25, 'Admin', 'Lord Voldemort', '45 Valencia Street, Dumaguete City', 'lord104', '118', 'Enable', 0x3f, 'Visible'),
(26, 'Staff', 'Ramsay Bolton', '56 Artemio Mate Extension, Tacloban City', 'ram105', '231', 'Disable', 0x3f, 'Hidden'),
(27, 'Staff', 'Katniss Everdeen', '76 Dr. Evangelista St., Zamboanga City', 'kat106', '680', 'Enable', 0x3f, 'Hidden'),
(28, 'Staff', 'Bruce Wayne', '786 Arellano Extension, Dipolog City', 'bruce107', '451', 'Disable', 0x3f, 'Hidden'),
(29, 'Staff', 'Stannis Baratheon', '34 Sagun Street, Pagadian City', 'stan108', '245', 'Enable', 0x3f, 'Visible'),
(30, 'Staff', 'Hermione Granger', '87 Fortich Street, Malaybalay City', 'hermi109', '854', 'Disable', 0x3f, 'Visible'),
(31, 'Staff', 'Jack Wilder', '875 Badelles St., Iligan City', 'jack110', '670', 'Enable', 0x3f, 'Visible'),
(32, 'Staff', 'Ron Weasley', '65 Don Anselmo Bernad Ave., Ozamiz City', 'ron111', '352', 'Enable', 0x3f, 'Hidden'),
(33, 'Staff', 'Steve Rogers', '23 Don Rufino Alonzo St., Cotabato City', 'steve112', '120', 'Enable', 0x3f, 'Hidden'),
(34, 'Staff', 'Sandor Clegane', '65 Bonifacio Street, Koronadal City', 'san113', '125', 'Enable', 0x3f, 'Visible'),
(35, 'Staff', 'Nick Fury', '35 Catolico Avenue, General Santos City', 'nick114', '832', 'Enable', 0x3f, 'Visible'),
(36, 'Staff', 'Li Lo', 'Disney', 'lilo', '000', 'Enable', NULL, 'Hidden'),
(37, 'Staff', 'Peter Pan', 'Neverland', 'peter', '000', 'Enable', NULL, 'Visible'),
(38, 'Admin', 'Lord Milori', 'Neverland', 'milori', '000', 'Enable', NULL, 'Visible'),
(39, 'Staff', 'Queen Clarion', 'Pixie Hollow', 'clarion', '000', 'Enable', NULL, 'Visible'),
(40, 'Staff', 'Iri Dessa', 'Pixie Hollow', 'iri', '000', 'Enable', NULL, 'Visible'),
(41, 'Staff', 'Silver Mist', 'Pixie Hollow', 'silver', '000', 'Enable', NULL, 'Visible');

-- --------------------------------------------------------

--
-- Table structure for table `kioskmachine`
--

CREATE TABLE `kioskmachine` (
  `kioskId` int(11) NOT NULL,
  `kioskName` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `ipAddress` varchar(45) NOT NULL,
  `kioskStatus` enum('Enable','Disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kioskmachine`
--

INSERT INTO `kioskmachine` (`kioskId`, `kioskName`, `location`, `ipAddress`, `kioskStatus`) VALUES
(100, 'FSGS', 'SLU Main', '192.168.9.0', 'Enable'),
(101, 'ASDF', 'SLU Bakakeng', '192.168.9.1', 'Enable'),
(102, 'SDFF', 'UB', '192.168.9.2', 'Enable'),
(103, 'SCFG', 'Session Road', '192.168.9.3', 'Enable'),
(104, 'WSCF', 'Burnham Park', '192.168.9.4', 'Enable'),
(105, 'QWER', 'Wright Park', '192.168.9.5', 'Enable'),
(106, 'RTYU', 'Bell Church', '192.168.9.6', 'Disable'),
(107, 'UIOP', 'Camp John Hay', '192.168.9.7', 'Enable'),
(108, 'ASDF', 'Panagbenga Park ', '192.168.9.8', 'Enable'),
(109, 'FGHJ', 'Malcolm Square', '192.168.9.9', 'Enable'),
(110, 'HJKL', 'Sunshine Park', '192.168.9.10', 'Disable'),
(111, 'ZXCV', 'Rose Garden', '192.168.9.11', 'Enable'),
(112, 'VBNM', 'Porta Vaga Mall', '192.168.9.12', 'Enable'),
(113, 'MNBV', 'Centermall', '192.168.9.13', 'Disable'),
(114, 'VCXZ', 'Mines View Park', '192.168.9.14', 'Enable'),
(115, 'LKJH', 'Centennial Park', '192.168.9.15', 'Disable'),
(116, 'HGFD', 'Botanical Garden', '192.168.9.16', 'Disable'),
(117, 'FDSA', 'Baguio Cathedral', '192.168.9.17', 'Enable'),
(118, 'POIU', 'Baguio Eco Park', '192.168.9.18', 'Enable'),
(119, 'UYTR', 'Philippine Military Academy', '192.168.9.19', 'Enable'),
(200, 'REWQ', 'Diplomat Hotel', '192.168.9.20', 'Disable'),
(201, 'lskdkldj', 'iifdjgohjhfjh', '192.168.9.89', 'Enable'),
(202, 'lskdkldj', 'iifdjgohjhfjh', '192.168.9.89', 'Enable'),
(203, 'lskdkldj', 'iifdjgohjhfjh', '192.168.9.89', 'Enable'),
(204, 'Werpa', 'Petmalu', '192.168.9.71', 'Enable'),
(205, 'Koala', 'kalog', '', 'Enable'),
(206, 'Koala', 'kalog', '', 'Enable'),
(207, 'lajfhasdfk', 'lkasddjflsaddf', '192.168.10.1', 'Enable'),
(208, 'lajfhasdfk', 'lkasddjflsaddf', '192.168.10.1', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `profilepic`
--

CREATE TABLE `profilepic` (
  `profileId` int(11) NOT NULL,
  `image` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profilepic`
--

INSERT INTO `profilepic` (`profileId`, `image`) VALUES
(1, NULL),
(2, NULL),
(3, NULL),
(4, NULL),
(5, NULL),
(6, NULL),
(7, NULL),
(8, NULL),
(9, NULL),
(10, NULL),
(11, NULL),
(12, NULL),
(13, NULL),
(14, NULL),
(15, NULL),
(16, NULL),
(17, NULL),
(18, NULL),
(19, NULL),
(20, NULL),
(21, NULL),
(22, NULL),
(23, NULL),
(24, NULL),
(25, NULL),
(26, NULL),
(27, NULL),
(28, NULL),
(29, NULL),
(30, NULL),
(31, NULL),
(32, NULL),
(33, NULL),
(34, NULL),
(35, NULL),
(36, NULL),
(37, NULL),
(38, NULL),
(39, NULL),
(40, NULL),
(41, NULL),
(89, '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesId` int(11) NOT NULL,
  `entity` enum('ADMIN','STAFF','KIOSK') NOT NULL,
  `voucherCode` varchar(45) NOT NULL,
  `dateUsed` date NOT NULL,
  `accountNo` int(11) DEFAULT NULL,
  `kioskId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesId`, `entity`, `voucherCode`, `dateUsed`, `accountNo`, `kioskId`) VALUES
(901, 'STAFF', '10005-00000', '2017-10-12', 1, NULL),
(902, 'STAFF', '10006-00000', '2017-10-12', 1, NULL),
(903, 'STAFF', '10008-00000', '2017-12-15', 31, NULL),
(904, 'STAFF', '10009-00000', '2017-12-15', 31, NULL),
(905, 'STAFF', '10010-00000', '2017-12-15', 31, NULL),
(906, 'STAFF', '10013-00000', '2017-12-25', 12, NULL),
(907, 'ADMIN', '10014-00000', '2018-01-25', 5, NULL),
(908, 'ADMIN', '10017-00000', '2018-01-25', 5, NULL),
(909, 'ADMIN', '10018-00000', '2018-01-25', 5, NULL),
(910, 'STAFF', '10020-00000', '2018-02-02', 29, NULL),
(911, 'STAFF', '10021-00000', '2018-02-02', 29, NULL),
(912, 'STAFF', '10022-00000', '2018-02-02', 29, NULL),
(913, 'STAFF', '10026-00000', '2018-03-01', 12, NULL),
(914, 'STAFF', '10029-00000', '2018-03-01', 8, NULL),
(915, 'STAFF', '10030-00000', '2018-03-01', 8, NULL),
(916, 'STAFF', '10031-00000', '2018-03-01', 8, NULL),
(917, 'ADMIN', '10032-00000', '2018-03-28', 24, NULL),
(918, 'KIOSK', '10100-00000', '2017-05-04', NULL, 119),
(919, 'KIOSK', '10101-00000', '2017-06-12', NULL, 108),
(920, 'KIOSK', '10102-00000', '2017-06-29', NULL, 100),
(921, 'KIOSK', '10103-00000', '2017-07-18', NULL, 101),
(922, 'KIOSK', '10104-00000', '2017-09-11', NULL, 102),
(923, 'KIOSK', '10105-00000', '2017-12-29', NULL, 103),
(924, 'KIOSK', '10106-00000', '2017-12-31', NULL, 102),
(925, 'KIOSK', '10107-00000', '2018-01-05', NULL, 109),
(926, 'KIOSK', '10108-00000', '2018-01-15', NULL, 105),
(927, 'KIOSK', '10109-00000', '2018-01-20', NULL, 119),
(928, 'KIOSK', '10110-00000', '2018-02-14', NULL, 112),
(929, 'KIOSK', '10111-00000', '2018-03-09', NULL, 111),
(930, 'KIOSK', '10112-00000', '2018-03-13', NULL, 108),
(931, 'KIOSK', '10113-00000', '2018-03-21', NULL, 107),
(932, 'KIOSK', '10114-00000', '2018-04-09', NULL, 104),
(933, 'KIOSK', '10115-00000', '2018-04-10', NULL, 114),
(934, 'KIOSK', '10116-00000', '2018-04-25', NULL, 101),
(935, 'KIOSK', '10117-00000', '2018-05-03', NULL, 111),
(936, 'KIOSK', '10118-00000', '2018-05-05', NULL, 109),
(937, 'KIOSK', '10119-00000', '2018-05-19', NULL, 107),
(938, 'KIOSK', '10120-00000', '2018-05-21', NULL, 105);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `voucherId` int(11) NOT NULL,
  `voucherCode` varchar(45) NOT NULL,
  `voucherType` enum('A','B','C') NOT NULL,
  `voucherAmount` int(11) NOT NULL,
  `voucherStatus` enum('Sold','Unsold') NOT NULL,
  `datePrinted` date NOT NULL,
  `accountNo` int(11) DEFAULT NULL,
  `kioskId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`voucherId`, `voucherCode`, `voucherType`, `voucherAmount`, `voucherStatus`, `datePrinted`, `accountNo`, `kioskId`) VALUES
(1, '10005-00000', 'A', 1, 'Sold', '2018-02-01', 1, NULL),
(2, '10006-00000', 'A', 1, 'Sold', '2018-02-21', 1, NULL),
(3, '10007-00000', 'A', 1, 'Unsold', '2018-02-04', 1, NULL),
(4, '10008-00000', 'B', 2, 'Sold', '2018-02-05', 31, NULL),
(5, '10009-00000', 'B', 2, 'Sold', '2018-02-19', 31, NULL),
(6, '10010-00000', 'B', 1, 'Sold', '2018-02-18', 31, NULL),
(7, '10011-00000', 'A', 1, 'Unsold', '2018-02-24', 12, NULL),
(8, '10012-00000', 'A', 1, 'Unsold', '2018-02-17', 12, NULL),
(9, '10013-00000', 'A', 1, 'Sold', '2017-12-19', 12, NULL),
(10, '10014-00000', 'A', 1, 'Sold', '2018-01-25', 5, NULL),
(11, '10015-00000', 'A', 1, 'Unsold', '2018-01-25', 5, NULL),
(12, '10016-00000', 'A', 1, 'Unsold', '2018-01-25', 5, NULL),
(13, '10017-00000', 'B', 2, 'Sold', '2018-01-25', 5, NULL),
(14, '10018-00000', 'B', 2, 'Sold', '2018-01-25', 5, NULL),
(15, '10019-00000', 'B', 2, 'Unsold', '2018-01-25', 5, NULL),
(16, '10020-00000', 'B', 2, 'Sold', '2018-02-02', 29, NULL),
(17, '10021-00000', 'B', 2, 'Sold', '2018-02-02', 29, NULL),
(18, '10022-00000', 'B', 2, 'Sold', '2018-02-02', 29, NULL),
(19, '10023-00000', 'A', 1, 'Unsold', '2018-02-04', 17, NULL),
(20, '10024-00000', 'A', 1, 'Unsold', '2018-02-04', 17, NULL),
(21, '10025-00000', 'A', 1, 'Unsold', '2018-02-04', 17, NULL),
(22, '10026-00000', 'A', 1, 'Sold', '2018-03-01', 12, NULL),
(23, '10027-00000', 'A', 1, 'Unsold', '2018-03-01', 12, NULL),
(24, '10028-00000', 'A', 1, 'Unsold', '2018-03-01', 12, NULL),
(25, '10029-00000', 'B', 2, 'Sold', '2018-03-01', 8, NULL),
(26, '10030-00000', 'B', 2, 'Sold', '2018-03-01', 8, NULL),
(27, '10031-00000', 'B', 2, 'Sold', '2018-03-01', 8, NULL),
(28, '10032-00000', 'A', 1, 'Sold', '2018-03-28', 24, NULL),
(29, '10033-00000', 'A', 1, 'Unsold', '2018-03-28', 24, NULL),
(30, '10034-00000', 'A', 1, 'Unsold', '2018-03-28', 24, NULL),
(31, '10035-00000', 'B', 2, 'Unsold', '2018-03-28', 24, NULL),
(32, '10036-00000', 'B', 2, 'Unsold', '2018-03-28', 24, NULL),
(33, '10037-00000', 'B', 2, 'Unsold', '2018-03-28', 24, NULL),
(34, '10038-00000', 'B', 2, 'Unsold', '2018-03-31', 27, NULL),
(35, '10039-00000', 'B', 2, 'Unsold', '2018-03-31', 27, NULL),
(36, '10040-00000', 'B', 2, 'Unsold', '2018-03-31', 27, NULL),
(37, '10100-00000', 'A', 1, 'Sold', '2017-05-04', NULL, 119),
(38, '10101-00000', 'B', 2, 'Sold', '2017-06-12', NULL, 108),
(39, '10102-00000', 'B', 2, 'Sold', '2017-06-29', NULL, 100),
(40, '10103-00000', 'A', 1, 'Sold', '2017-07-18', NULL, 101),
(41, '10104-00000', 'B', 2, 'Sold', '2017-09-11', NULL, 102),
(42, '10105-00000', 'A', 1, 'Sold', '2017-12-29', NULL, 103),
(43, '10106-00000', 'A', 1, 'Sold', '2017-12-31', NULL, 102),
(44, '10107-00000', 'B', 2, 'Sold', '2018-01-05', NULL, 109),
(45, '10108-00000', 'A', 1, 'Sold', '2018-01-15', NULL, 105),
(46, '10109-00000', 'A', 1, 'Sold', '2018-01-20', NULL, 119),
(47, '10110-00000', 'A', 1, 'Sold', '2018-02-14', NULL, 112),
(48, '10111-00000', 'B', 2, 'Sold', '2018-03-09', NULL, 111),
(49, '10112-00000', 'B', 2, 'Sold', '2018-03-13', NULL, 108),
(50, '10113-00000', 'A', 1, 'Sold', '2018-03-21', NULL, 107),
(51, '10114-00000', 'A', 1, 'Sold', '2018-04-09', NULL, 104),
(52, '10115-00000', 'A', 1, 'Sold', '2018-04-10', NULL, 114),
(53, '10116-00000', 'B', 2, 'Sold', '2018-04-25', NULL, 101),
(54, '10117-00000', 'A', 1, 'Sold', '2018-05-03', NULL, 111),
(55, '10118-00000', 'B', 2, 'Sold', '2018-05-05', NULL, 109),
(56, '10119-00000', 'B', 2, 'Sold', '2018-05-19', NULL, 107),
(57, '10120-00000', 'B', 2, 'Sold', '2018-05-21', NULL, 105);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accountNo`),
  ADD KEY `accountNo` (`accountNo`),
  ADD KEY `accoun_no` (`accountNo`);

--
-- Indexes for table `kioskmachine`
--
ALTER TABLE `kioskmachine`
  ADD PRIMARY KEY (`kioskId`),
  ADD KEY `kioskId` (`kioskId`),
  ADD KEY `kiosk_id` (`kioskId`);

--
-- Indexes for table `profilepic`
--
ALTER TABLE `profilepic`
  ADD PRIMARY KEY (`profileId`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesId`),
  ADD KEY `voucherCode_idx` (`voucherCode`),
  ADD KEY `accountNo_idx` (`accountNo`),
  ADD KEY `kioskID_idx` (`kioskId`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`voucherId`),
  ADD KEY `voucherCode` (`voucherCode`),
  ADD KEY `account_No_idx` (`accountNo`),
  ADD KEY `kiosk_id_idx` (`kioskId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `accountNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `kioskmachine`
--
ALTER TABLE `kioskmachine`
  MODIFY `kioskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;
--
-- AUTO_INCREMENT for table `profilepic`
--
ALTER TABLE `profilepic`
  MODIFY `profileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `profilepic`
--
ALTER TABLE `profilepic`
  ADD CONSTRAINT `profileId` FOREIGN KEY (`profileId`) REFERENCES `accounts` (`accountNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
