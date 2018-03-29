CREATE DATABASE  IF NOT EXISTS `wifira` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `wifira`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: wifira
-- ------------------------------------------------------
-- Server version	5.7.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `accountNo` int(11) NOT NULL,
  `roleId` enum('Admin','Staff') NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `accountStatus` enum('Enable','Disable') NOT NULL,
  `image` longblob,
  PRIMARY KEY (`accountNo`),
  KEY `accountNo` (`accountNo`),
  KEY `accoun_no` (`accountNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'Staff','Alfa Leizel Leones','Baguio City','alfa123','000','Enable',NULL),(2,'Staff','Joneil Argao','Zambales','joneil123','111','Enable',NULL),(3,'Staff','James Anonuevo','Baguio City','james123','222','Disable',NULL),(4,'Staff','Cyrene Jane Dispo','Pangasinan','cyrene123','333','Disable',NULL),(5,'Admin','Lou Philip Beltran','Baguio City','lou123','444','Enable',NULL),(6,'Staff','Katherine Turqueza','Abra','kath123','555','Enable',NULL),(7,'Staff','Maureen Nicole Calpito','Baguio City','mau123','666','Enable',NULL),(8,'Staff','Apollo Joshua Mina','Baguio City','ajm123','777','Enable',NULL),(9,'Admin','Madonna Beltran','Baguio City','pido123','888','Enable',NULL),(10,'Admin','Don Lopen Beltran','Baguio City','Lopen123','999','Enable',NULL),(11,'Staff','Darren Sison','Pangasinan','dars123','101','Disable','?'),(12,'Staff','Jon Snow','7114 Kundiman Street, Sampaloc City','jon001','690','Enable','?'),(13,'Staff','Damon Salvatore','1135 Quezon City, Metro Manila','dam002','806','Disable','?'),(14,'Admin','Khal Drogo','75 P. Domingo Street, Makati City','khal003','134','Enable','?'),(15,'Admin','Charles Xavier','235 Salcedo St., Makati City','char004','642','Enable','?'),(16,'Staff','Tony Stark','141 Abanao Extension, Baguio City','tony005','643','Disable','?'),(17,'Staff','Dominic Toretto','983 Rizal Avenue Extension, Metro Manila','dom006','124','Enable','?'),(18,'Staff','Daenerys Targaryen','456 San Jose Road, Zamboanga City','rys007','321','Disable','?'),(19,'Staff','Peter Parker','12 Gov. Villavert Street, Iloilo City','peter008','235','Enable','?'),(20,'Staff','Jean Grey','43 Iznart Street, Iloilo City','jean009','235','Disable','?'),(21,'Staff','Clark Kent','67 Villamonte, Bacolod City','clark100','464','Enable','?'),(22,'Staff','Diana Prince','546 Colon Street, Cebu City','diana101','578','Disable','?'),(23,'Admin','Tyrion Lannister','347 Gallares St., Tagbilaran City','tyr102','346','Enable','?'),(24,'Admin','Harry Potter','097 Burgos St., Cebu City','harry103','057','Enable','?'),(25,'Admin','Lord Voldemort','45 Valencia Street, Dumaguete City','lord104','118','Enable','?'),(26,'Staff','Ramsay Bolton','56 Artemio Mate Extension, Tacloban City','ram105','231','Disable','?'),(27,'Staff','Katniss Everdeen','76 Dr. Evangelista St., Zamboanga City','kat106','680','Enable','?'),(28,'Staff','Bruce Wayne','786 Arellano Extension, Dipolog City','bruce107','451','Disable','?'),(29,'Staff','Stannis Baratheon','34 Sagun Street, Pagadian City','stan108','245','Enable','?'),(30,'Staff','Hermione Granger','87 Fortich Street, Malaybalay City','hermi109','854','Disable','?'),(31,'Staff','Jack Wilder','875 Badelles St., Iligan City','jack110','670','Enable','?'),(32,'Staff','Ron Weasley','65 Don Anselmo Bernad Ave., Ozamiz City','ron111','352','Enable','?'),(33,'Staff','Steve Rogers','23 Don Rufino Alonzo St., Cotabato City','steve112','120','Enable','?'),(34,'Staff','Sandor Clegane','65 Bonifacio Street, Koronadal City','san113','125','Enable','?'),(35,'Staff','Nick Fury','35 Catolico Avenue, General Santos City','nick114','832','Enable','?');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kioskmachine`
--

DROP TABLE IF EXISTS `kioskmachine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kioskmachine` (
  `kioskId` int(11) NOT NULL,
  `kioskName` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `ipAddress` varchar(45) NOT NULL,
  `kioskStatus` enum('Enable','Disable') NOT NULL,
  PRIMARY KEY (`kioskId`),
  KEY `kioskId` (`kioskId`),
  KEY `kiosk_id` (`kioskId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kioskmachine`
--

LOCK TABLES `kioskmachine` WRITE;
/*!40000 ALTER TABLE `kioskmachine` DISABLE KEYS */;
INSERT INTO `kioskmachine` VALUES (100,'FSGS','SLU Main','192.168.9.0','Enable'),(101,'ASDF','SLU Bakakeng','192.168.9.1','Enable'),(102,'SDFF','UB','192.168.9.2','Enable'),(103,'SCFG','Session Road','192.168.9.3','Enable'),(104,'WSCF','Burnham Park','192.168.9.4','Enable'),(105,'QWER','Wright Park','192.168.9.5','Enable'),(106,'RTYU','Bell Church','192.168.9.6','Disable'),(107,'UIOP','Camp John Hay','192.168.9.7','Enable'),(108,'ASDF','Panagbenga Park ','192.168.9.8','Enable'),(109,'FGHJ','Malcolm Square','192.168.9.9','Enable'),(110,'HJKL','Sunshine Park','192.168.9.10','Disable'),(111,'ZXCV','Rose Garden','192.168.9.11','Enable'),(112,'VBNM','Porta Vaga Mall','192.168.9.12','Enable'),(113,'MNBV','Centermall','192.168.9.13','Disable'),(114,'VCXZ','Mines View Park','192.168.9.14','Enable'),(115,'LKJH','Centennial Park','192.168.9.15','Disable'),(116,'HGFD','Botanical Garden','192.168.9.16','Disable'),(117,'FDSA','Baguio Cathedral','192.168.9.17','Enable'),(118,'POIU','Baguio Eco Park','192.168.9.18','Enable'),(119,'UYTR','Philippine Military Academy','192.168.9.19','Enable'),(200,'REWQ','Diplomat Hotel','192.168.9.20','Disable');
/*!40000 ALTER TABLE `kioskmachine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `salesId` int(11) NOT NULL,
  `entity` enum('ADMIN','STAFF','KIOSK') NOT NULL,
  `voucherCode` varchar(45) NOT NULL,
  `dateUsed` date NOT NULL,
  `accountNo` int(11) DEFAULT NULL,
  `kioskId` int(11) DEFAULT NULL,
  PRIMARY KEY (`salesId`),
  KEY `voucherCode_idx` (`voucherCode`),
  KEY `kioskId_idx` (`kioskId`),
  KEY `kiosk_id_idx` (`kioskId`),
  KEY `account_no_idx` (`accountNo`),
  CONSTRAINT `account_no` FOREIGN KEY (`accountNo`) REFERENCES `accounts` (`accountNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `kiosk_id` FOREIGN KEY (`kioskId`) REFERENCES `kioskmachine` (`kioskId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `voucherCode` FOREIGN KEY (`voucherCode`) REFERENCES `vouchers` (`voucherCode`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (901,'STAFF','10005-00000','2017-10-12',1,NULL),(902,'STAFF','10006-00000','2017-10-12',1,NULL),(903,'STAFF','10008-00000','2017-12-15',31,NULL),(904,'STAFF','10009-00000','2017-12-15',31,NULL),(905,'STAFF','10010-00000','2017-12-15',31,NULL),(906,'STAFF','10013-00000','2017-12-25',12,NULL),(907,'ADMIN','10014-00000','2018-01-25',5,NULL),(908,'ADMIN','10017-00000','2018-01-25',5,NULL),(909,'ADMIN','10018-00000','2018-01-25',5,NULL),(910,'STAFF','10020-00000','2018-02-02',29,NULL),(911,'STAFF','10021-00000','2018-02-02',29,NULL),(912,'STAFF','10022-00000','2018-02-02',29,NULL),(913,'STAFF','10026-00000','2018-03-01',12,NULL),(914,'STAFF','10029-00000','2018-03-01',8,NULL),(915,'STAFF','10030-00000','2018-03-01',8,NULL),(916,'STAFF','10031-00000','2018-03-01',8,NULL),(917,'ADMIN','10032-00000','2018-03-28',24,NULL),(918,'KIOSK','10100-00000','2017-05-04',NULL,119),(919,'KIOSK','10101-00000','2017-06-12',NULL,108),(920,'KIOSK','10102-00000','2017-06-29',NULL,100),(921,'KIOSK','10103-00000','2017-07-18',NULL,101),(922,'KIOSK','10104-00000','2017-09-11',NULL,102),(923,'KIOSK','10105-00000','2017-12-29',NULL,103),(924,'KIOSK','10106-00000','2017-12-31',NULL,102),(925,'KIOSK','10107-00000','2018-01-05',NULL,109),(926,'KIOSK','10108-00000','2018-01-15',NULL,105),(927,'KIOSK','10109-00000','2018-01-20',NULL,119),(928,'KIOSK','10110-00000','2018-02-14',NULL,112),(929,'KIOSK','10111-00000','2018-03-09',NULL,111),(930,'KIOSK','10112-00000','2018-03-13',NULL,108),(931,'KIOSK','10113-00000','2018-03-21',NULL,107),(932,'KIOSK','10114-00000','2018-04-09',NULL,104),(933,'KIOSK','10115-00000','2018-04-10',NULL,114),(934,'KIOSK','10116-00000','2018-04-25',NULL,101),(935,'KIOSK','10117-00000','2018-05-03',NULL,111),(936,'KIOSK','10118-00000','2018-05-05',NULL,109),(937,'KIOSK','10119-00000','2018-05-19',NULL,107),(938,'KIOSK','10120-00000','2018-05-21',NULL,105);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vouchers`
--

DROP TABLE IF EXISTS `vouchers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vouchers` (
  `voucherCode` varchar(45) NOT NULL,
  `voucherType` enum('A','B','C') NOT NULL,
  `voucherAmount` enum('10','20','100') NOT NULL,
  `voucherStatus` enum('Sold','Unsold') NOT NULL,
  `datePrinted` date NOT NULL,
  `accountNo` int(11) DEFAULT NULL,
  `kioskId` int(11) DEFAULT NULL,
  PRIMARY KEY (`voucherCode`),
  KEY `accountNo_idx` (`accountNo`),
  KEY `voucherCode` (`voucherCode`),
  KEY `kioskId_idx` (`kioskId`),
  CONSTRAINT `accountNo` FOREIGN KEY (`accountNo`) REFERENCES `accounts` (`accountNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `kioskId` FOREIGN KEY (`kioskId`) REFERENCES `kioskmachine` (`kioskId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vouchers`
--

LOCK TABLES `vouchers` WRITE;
/*!40000 ALTER TABLE `vouchers` DISABLE KEYS */;
INSERT INTO `vouchers` VALUES ('10005-00000','A','10','Sold','2017-10-12',1,NULL),('10006-00000','A','10','Sold','2017-10-12',1,NULL),('10007-00000','A','10','Unsold','2017-10-12',1,NULL),('10008-00000','B','20','Sold','2017-12-15',31,NULL),('10009-00000','B','20','Sold','2017-12-15',31,NULL),('10010-00000','B','10','Sold','2017-12-15',31,NULL),('10011-00000','A','10','Unsold','2017-12-25',12,NULL),('10012-00000','A','10','Unsold','2017-12-25',12,NULL),('10013-00000','A','10','Sold','2017-12-25',12,NULL),('10014-00000','A','10','Sold','2018-01-25',5,NULL),('10015-00000','A','10','Unsold','2018-01-25',5,NULL),('10016-00000','A','10','Unsold','2018-01-25',5,NULL),('10017-00000','B','20','Sold','2018-01-25',5,NULL),('10018-00000','B','20','Sold','2018-01-25',5,NULL),('10019-00000','B','20','Unsold','2018-01-25',5,NULL),('10020-00000','B','20','Sold','2018-02-02',29,NULL),('10021-00000','B','20','Sold','2018-02-02',29,NULL),('10022-00000','B','20','Sold','2018-02-02',29,NULL),('10023-00000','A','10','Unsold','2018-02-04',17,NULL),('10024-00000','A','10','Unsold','2018-02-04',17,NULL),('10025-00000','A','10','Unsold','2018-02-04',17,NULL),('10026-00000','A','10','Sold','2018-03-01',12,NULL),('10027-00000','A','10','Unsold','2018-03-01',12,NULL),('10028-00000','A','10','Unsold','2018-03-01',12,NULL),('10029-00000','B','20','Sold','2018-03-01',8,NULL),('10030-00000','B','20','Sold','2018-03-01',8,NULL),('10031-00000','B','20','Sold','2018-03-01',8,NULL),('10032-00000','A','10','Sold','2018-03-28',24,NULL),('10033-00000','A','10','Unsold','2018-03-28',24,NULL),('10034-00000','A','10','Unsold','2018-03-28',24,NULL),('10035-00000','B','20','Unsold','2018-03-28',24,NULL),('10036-00000','B','20','Unsold','2018-03-28',24,NULL),('10037-00000','B','20','Unsold','2018-03-28',24,NULL),('10038-00000','B','20','Unsold','2018-03-31',27,NULL),('10039-00000','B','20','Unsold','2018-03-31',27,NULL),('10040-00000','B','20','Unsold','2018-03-31',27,NULL),('10100-00000','A','10','Sold','2017-05-04',NULL,119),('10101-00000','B','20','Sold','2017-06-12',NULL,108),('10102-00000','B','20','Sold','2017-06-29',NULL,100),('10103-00000','A','10','Sold','2017-07-18',NULL,101),('10104-00000','B','20','Sold','2017-09-11',NULL,102),('10105-00000','A','10','Sold','2017-12-29',NULL,103),('10106-00000','A','10','Sold','2017-12-31',NULL,102),('10107-00000','B','20','Sold','2018-01-05',NULL,109),('10108-00000','A','10','Sold','2018-01-15',NULL,105),('10109-00000','A','10','Sold','2018-01-20',NULL,119),('10110-00000','A','10','Sold','2018-02-14',NULL,112),('10111-00000','B','20','Sold','2018-03-09',NULL,111),('10112-00000','B','20','Sold','2018-03-13',NULL,108),('10113-00000','A','10','Sold','2018-03-21',NULL,107),('10114-00000','A','10','Sold','2018-04-09',NULL,104),('10115-00000','A','10','Sold','2018-04-10',NULL,114),('10116-00000','B','20','Sold','2018-04-25',NULL,101),('10117-00000','A','10','Sold','2018-05-03',NULL,111),('10118-00000','B','20','Sold','2018-05-05',NULL,109),('10119-00000','B','20','Sold','2018-05-19',NULL,107),('10120-00000','B','20','Sold','2018-05-21',NULL,105);
/*!40000 ALTER TABLE `vouchers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'wifira'
--

--
-- Dumping routines for database 'wifira'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-01  3:14:05
