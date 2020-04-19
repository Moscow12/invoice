-- MySQL dump 10.13  Distrib 5.6.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: invoice
-- ------------------------------------------------------
-- Server version	5.6.35-1+deb.sury.org~xenial+0.1

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
-- Table structure for table `tbl_Proformer`
--

DROP TABLE IF EXISTS `tbl_Proformer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_Proformer` (
  `Proformer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Customer_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Proformer_ID`),
  KEY `Proformer_ID` (`Proformer_ID`),
  KEY `Customer_ID` (`Customer_ID`),
  KEY `user_ID` (`User_ID`),
  CONSTRAINT `tbl_Proformer_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `tbl_customer_registraion` (`Customer_ID`),
  CONSTRAINT `tbl_Proformer_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_Proformer`
--

LOCK TABLES `tbl_Proformer` WRITE;
/*!40000 ALTER TABLE `tbl_Proformer` DISABLE KEYS */;
INSERT INTO `tbl_Proformer` VALUES (2,1,1,'2020-01-16 21:35:26'),(3,1,1,'2020-01-28 21:14:14');
/*!40000 ALTER TABLE `tbl_Proformer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cell_product`
--

DROP TABLE IF EXISTS `tbl_cell_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cell_product` (
  `Cell_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Product_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Cell_ID`),
  KEY `Cell_ID` (`Cell_ID`),
  KEY `Product_ID` (`Product_ID`),
  KEY `Customer_ID` (`Customer_ID`),
  KEY `User_ID` (`User_ID`),
  CONSTRAINT `tbl_cell_product_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `tbl_product` (`Product_ID`),
  CONSTRAINT `tbl_cell_product_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `tbl_customer_registraion` (`Customer_ID`),
  CONSTRAINT `tbl_cell_product_ibfk_3` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cell_product`
--

LOCK TABLES `tbl_cell_product` WRITE;
/*!40000 ALTER TABLE `tbl_cell_product` DISABLE KEYS */;
INSERT INTO `tbl_cell_product` VALUES (1,3,40000,1,1,'2019-12-08 21:14:58'),(2,2,40000,1,1,'2019-12-08 21:15:07'),(3,1,10000,1,1,'2019-12-08 21:27:39'),(14,1,2333,1,1,'2019-12-08 21:57:27'),(15,2,2333,2,1,'2019-12-08 21:58:22'),(16,1,12334,1,1,'2019-12-10 00:07:23'),(17,2,12334,1,1,'2019-12-10 00:07:38'),(18,2,12334,1,1,'2019-12-10 00:07:45'),(19,3,12334,1,1,'2019-12-10 00:07:50'),(20,2,12334,1,1,'2019-12-10 00:20:50'),(21,4,12334,1,1,'2019-12-10 00:21:13'),(22,4,12334,2,1,'2019-12-10 00:23:05'),(23,3,12334,2,1,'2019-12-10 00:23:45'),(24,3,3,1,1,'2019-12-10 00:39:28'),(25,1,10000,1,1,'2019-12-11 18:35:25'),(26,1,123,2,1,'2019-12-11 19:00:44'),(27,2,123,2,1,'2019-12-11 19:00:54'),(28,1,2000,2,1,'2019-12-11 19:06:50'),(29,1,200000,2,1,'2019-12-11 19:10:41'),(30,1,200000,2,1,'2019-12-11 19:10:44'),(31,1,200000,2,1,'2019-12-11 19:10:46'),(32,1,200000,2,1,'2019-12-11 19:10:47'),(33,1,200000,2,1,'2019-12-11 19:10:58'),(34,1,1000,2,1,'2019-12-11 19:13:28'),(35,1,12333,2,1,'2019-12-11 19:24:40'),(36,1,15000,2,1,'2019-12-11 19:27:20'),(48,1,1000,1,1,'2019-12-12 14:52:08'),(49,3,234558,2,1,'2019-12-12 14:52:40'),(50,1,10,1,1,'2019-12-12 14:57:27'),(51,1,889,1,1,'2019-12-12 14:59:29'),(52,2,67,2,1,'2019-12-12 15:01:10'),(53,2,67,2,1,'2019-12-12 15:01:18'),(54,3,45,2,1,'2019-12-12 15:02:27'),(55,4,5,2,1,'2019-12-12 15:02:54'),(56,1,33,4,1,'2019-12-12 15:03:51'),(57,1,22,1,1,'2019-12-12 15:06:00'),(58,2,222,2,1,'2019-12-12 15:06:24'),(59,2,44,2,1,'2019-12-12 15:07:13'),(60,4,43,4,1,'2019-12-12 15:07:40'),(61,1,22,1,1,'2019-12-12 15:08:57'),(62,1,33,1,1,'2019-12-12 15:09:29'),(63,4,44,4,1,'2019-12-12 15:10:27'),(64,2,44444,4,1,'2019-12-12 15:10:42'),(65,1,1,2,1,'2019-12-12 15:15:32'),(66,1,1,2,1,'2019-12-12 15:25:10'),(67,2,2,2,1,'2019-12-12 15:29:05'),(68,2,3,2,1,'2019-12-12 15:30:45'),(69,1,0,4,1,'2019-12-12 15:32:31'),(70,3,2,4,1,'2019-12-12 15:34:36'),(71,2,100000,4,1,'2019-12-12 15:46:50'),(72,2,100000,4,1,'2019-12-12 15:47:09'),(73,4,1,2,1,'2019-12-13 11:51:23'),(74,1,1000,1,1,'2019-12-13 12:43:40'),(75,1,1000,1,1,'2019-12-15 22:01:29'),(76,3,2,1,1,'2019-12-16 23:33:10'),(77,4,1,1,1,'2019-12-16 23:33:19'),(78,3,5,1,1,'2019-12-16 23:33:55'),(79,4,1,1,1,'2019-12-17 00:36:41'),(80,2,1000,1,1,'2019-12-17 00:36:49'),(81,2,1000,4,1,'2019-12-17 22:12:41'),(82,3,2000,4,1,'2019-12-17 22:13:01'),(83,3,3,4,1,'2019-12-18 22:14:58'),(84,2,2000,4,1,'2019-12-18 22:15:07'),(85,4,1,1,1,'2019-12-19 00:20:26'),(86,3,2000,1,1,'2019-12-19 00:20:39'),(87,3,5000,2,1,'2019-12-19 20:34:47'),(88,2,20000,2,1,'2019-12-19 20:34:59'),(89,1,1000,1,1,'2019-12-19 22:48:51'),(90,3,1000,2,1,'2019-12-19 22:51:03'),(91,1,2000,4,1,'2019-12-21 05:38:39'),(92,3,200,4,1,'2019-12-21 05:38:52'),(93,5,10,2,1,'2019-12-25 22:05:59'),(94,6,10,2,1,'2019-12-25 22:06:58'),(95,6,2,4,1,'2019-12-29 14:47:08'),(96,5,20,4,1,'2019-12-29 14:47:18'),(97,2,2000,1,1,'2019-12-30 09:42:31'),(98,3,200,1,1,'2019-12-30 09:42:43'),(99,4,1,2,1,'2019-12-30 10:50:49'),(100,5,200,1,1,'2019-12-31 00:03:00'),(101,6,5,1,1,'2019-12-31 00:03:07'),(102,3,200,1,1,'2019-12-31 00:03:20'),(103,4,3,4,1,'2019-12-31 00:07:52'),(104,7,1,4,1,'2020-01-01 13:41:24'),(105,6,2,4,1,'2020-01-01 13:41:34'),(106,7,2,1,1,'2020-01-01 13:43:47'),(107,6,3,1,1,'2020-01-01 13:43:54'),(108,1,600,2,1,'2020-01-01 18:42:00'),(109,3,200,2,1,'2020-01-01 18:42:10'),(110,6,100,2,1,'2020-01-01 18:42:22'),(114,8,10,1,1,'2020-01-04 01:35:33'),(115,7,1,1,1,'2020-01-04 01:35:48'),(116,13,1,1,1,'2020-01-04 02:04:47'),(117,7,1,1,1,'2020-01-05 17:35:56'),(118,8,10,1,1,'2020-01-05 17:36:06'),(120,14,10,5,1,'2020-01-09 00:58:39'),(121,14,10,5,1,'2020-01-09 00:58:47'),(122,8,12,1,1,'2020-01-11 00:27:25'),(123,8,10,2,1,'2020-01-11 00:30:31'),(124,5,10,2,1,'2020-01-11 00:31:51'),(125,7,1,2,1,'2020-01-11 00:40:37'),(126,8,10,1,1,'2020-01-11 02:20:27'),(127,14,0,1,1,'2020-01-11 02:22:49'),(128,5,0,5,1,'2020-01-12 20:34:34'),(129,1,0,5,1,'2020-01-12 20:34:55'),(130,14,10,4,1,'2020-01-12 20:35:44'),(131,8,10,5,1,'2020-01-12 23:57:40'),(132,7,1,5,1,'2020-01-12 23:57:48'),(133,1,10,5,1,'2020-01-12 23:58:00'),(136,5,10,1,1,'2020-01-14 18:25:11'),(141,8,49,1,1,'2020-01-14 18:42:09'),(142,8,40,1,1,'2020-01-19 01:14:49'),(143,7,1,1,1,'2020-01-19 01:15:20'),(145,13,2,1,1,'2020-01-19 01:21:44'),(146,5,10,1,1,'2020-01-19 01:22:14'),(147,16,5,4,1,'2020-01-25 23:54:16'),(148,18,1,1,1,'2020-01-28 23:02:46'),(149,19,2,1,1,'2020-01-28 23:02:52'),(150,20,1,1,1,'2020-01-28 23:03:00'),(151,18,1,6,6,'2020-01-28 23:56:53'),(152,19,2,6,6,'2020-01-28 23:56:57'),(153,20,1,6,6,'2020-01-28 23:57:01'),(154,18,1,6,6,'2020-01-29 00:40:22'),(155,19,2,6,6,'2020-01-29 00:40:28'),(156,20,1,6,6,'2020-01-29 00:40:33'),(157,21,1,6,6,'2020-01-29 00:41:05'),(158,23,10,6,6,'2020-01-29 00:41:18'),(159,22,1,6,6,'2020-01-29 00:43:58'),(160,24,1,6,6,'2020-01-29 00:48:04'),(161,18,1,6,6,'2020-01-30 22:36:09'),(162,19,2,6,6,'2020-01-30 23:33:58'),(163,20,1,6,6,'2020-01-30 23:34:13'),(164,23,10,6,6,'2020-01-30 23:34:27'),(165,22,1,6,6,'2020-01-30 23:34:48'),(166,24,1,6,6,'2020-01-30 23:34:58'),(167,18,1,6,6,'2020-01-31 00:12:22'),(168,19,2,6,6,'2020-01-31 00:12:43'),(169,20,1,6,6,'2020-01-31 00:12:50'),(170,23,10,6,6,'2020-01-31 00:13:00'),(171,24,1,6,6,'2020-01-31 00:13:11'),(172,22,1,6,6,'2020-01-31 00:13:56'),(173,20,1,7,6,'2020-01-31 14:04:10'),(174,23,10,7,6,'2020-01-31 14:04:34'),(175,22,1,7,6,'2020-01-31 14:04:41'),(176,24,1,7,6,'2020-01-31 14:04:54'),(177,25,1,7,6,'2020-01-31 14:26:09'),(178,26,4,7,6,'2020-01-31 17:58:17');
/*!40000 ALTER TABLE `tbl_cell_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_company_account`
--

DROP TABLE IF EXISTS `tbl_company_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_company_account` (
  `account_ID` int(11) NOT NULL AUTO_INCREMENT,
  `account_type` varchar(100) NOT NULL,
  `account_name` varchar(250) NOT NULL,
  `Account_number` varchar(100) NOT NULL,
  `User_ID` int(11) NOT NULL,
  PRIMARY KEY (`account_ID`),
  KEY `account_ID` (`account_ID`),
  KEY `user_ID` (`User_ID`),
  CONSTRAINT `tbl_company_account_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_company_account`
--

LOCK TABLES `tbl_company_account` WRITE;
/*!40000 ALTER TABLE `tbl_company_account` DISABLE KEYS */;
INSERT INTO `tbl_company_account` VALUES (3,'Bank CRDB','eddd','213334545',1);
/*!40000 ALTER TABLE `tbl_company_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_company_registration`
--

DROP TABLE IF EXISTS `tbl_company_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_company_registration` (
  `company_ID` int(11) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(200) NOT NULL,
  `company_email` varchar(200) NOT NULL,
  `postaladdress` text NOT NULL,
  `phonenumber` int(12) NOT NULL,
  `company_region` varchar(100) NOT NULL,
  `company_district` varchar(100) NOT NULL,
  `company_street` varchar(100) NOT NULL,
  `company_block` varchar(100) NOT NULL,
  `company_logo` varchar(250) NOT NULL,
  `ceo_signature` varchar(250) NOT NULL,
  `User_ID` int(11) NOT NULL,
  PRIMARY KEY (`company_ID`),
  UNIQUE KEY `company_ID` (`company_ID`),
  KEY `company_ID_2` (`company_ID`),
  KEY `user_ID` (`User_ID`),
  CONSTRAINT `tbl_company_registration_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_company_registration`
--

LOCK TABLES `tbl_company_registration` WRITE;
/*!40000 ALTER TABLE `tbl_company_registration` DISABLE KEYS */;
INSERT INTO `tbl_company_registration` VALUES (1,'Charity ORG','charityinfo.org','P.O BOX 155\r\nRUBY, MLEBA\r\nTZ',2147483647,'Dodoma','dom municipal','Ng\'ox','102','invoice2.jpg','invoice3.jpg',1),(2,'gkcchief TECHNOLOGY','gkcchief@gmail.com','P.O Box 5280,\r\nMwanza Tanzania.',675644671,'Mwanza','Nyamagana-Isamilo','Nyakabungo B','No. 08096','','',6);
/*!40000 ALTER TABLE `tbl_company_registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_customer_registraion`
--

DROP TABLE IF EXISTS `tbl_customer_registraion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_customer_registraion` (
  `Customer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Client_name` varchar(200) NOT NULL,
  `Clint_PhoneNumber` int(11) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `postaladdress` text NOT NULL,
  `client_region` varchar(100) NOT NULL,
  `client_district` varchar(100) NOT NULL,
  `client_street` varchar(100) NOT NULL,
  `client_block` varchar(50) NOT NULL,
  `enabled_disabled` varchar(20) NOT NULL DEFAULT 'enabled',
  `User_ID` int(11) NOT NULL,
  PRIMARY KEY (`Customer_ID`),
  KEY `Customer_ID` (`Customer_ID`),
  KEY `User_ID` (`User_ID`),
  CONSTRAINT `tbl_customer_registraion_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_customer_registraion`
--

LOCK TABLES `tbl_customer_registraion` WRITE;
/*!40000 ALTER TABLE `tbl_customer_registraion` DISABLE KEYS */;
INSERT INTO `tbl_customer_registraion` VALUES (1,'KAKA KUONA',2147483647,'kuona@info.com','fxhyrf ft764r7647','DODOMA','Chamwino','sawee','A123','enabled',1),(2,'Mble kwa Mbele',2147483647,'kwambele@ig.co.tz','P.O BOX 2332\r\nMorogoro TZ','Morogoro','Msamvu','Stand','C005','enabled',1),(4,'KIRUNGU URASA',297664763,'kirungure@gmil.com','','DAr moja','Ubungo','Ubungo Plaza','1','enabled',1),(5,'Dioclesian Meshack',2147483647,'diomesh@co.go.tz','P.O Box 250,\r\nKilimanjaro, TZ.','Kilimanjaro','Moshi','Kiliomo','A 21','enabled',1),(6,'Humura Secondary School',788052090,'humurasec@blog.com','P.O BOX 152,\r\nRubya Muleba, Tanzania','Kagera','Muleba','Rubya','','enabled',6),(7,'Josiah Girls Secondary School',754750139,'josiahgirlssecshool','P.O BOX 1605 \r\nBUKOBA','Kagera','Bukoba Municipal','','','enabled',6);
/*!40000 ALTER TABLE `tbl_customer_registraion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_invoice`
--

DROP TABLE IF EXISTS `tbl_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_invoice` (
  `Invoice_ID` int(11) NOT NULL AUTO_INCREMENT,
  `duedate` varchar(20) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`Invoice_ID`),
  KEY `Invoice_ID` (`Invoice_ID`),
  KEY `Customer_ID` (`Customer_ID`),
  KEY `User_ID` (`User_ID`),
  CONSTRAINT `tbl_invoice_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `tbl_customer_registraion` (`Customer_ID`),
  CONSTRAINT `tbl_invoice_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_invoice`
--

LOCK TABLES `tbl_invoice` WRITE;
/*!40000 ALTER TABLE `tbl_invoice` DISABLE KEYS */;
INSERT INTO `tbl_invoice` VALUES (1,'2019-12-31',1,1,'2019-12-30 10:05:13','Pending'),(2,'2020-01-01',2,1,'2019-12-30 10:50:58','Pending'),(3,'2020-01-04',1,1,'2019-12-31 00:03:33','Pending'),(4,'2020-01-02',4,1,'2019-12-31 00:08:00','Pending'),(5,'2020-01-02',4,1,'2020-01-01 13:41:50','Pending'),(6,'2020-01-29',1,1,'2020-01-01 13:44:07','Pending'),(10,'2020-01-09',2,1,'2020-01-01 19:01:34','Pending'),(11,'2020-01-06',1,1,'2020-01-04 01:38:31','Pending'),(12,'2020-01-01',1,1,'2020-01-05 17:36:38','Pending'),(13,'2020-01-16',5,1,'2020-01-12 23:58:12','Pending'),(14,'2020-01-19',1,1,'2020-01-19 01:15:34','Pending'),(15,'2020-01-25',4,1,'2020-01-25 23:54:32','Pending'),(16,'2020-01-29',1,1,'2020-01-28 23:03:32','Pending'),(17,'2020-01-26',6,6,'2020-01-28 23:57:09','Pending'),(18,'2020-01-30',6,6,'2020-01-29 00:48:19','Pending'),(19,'2020-01-30',6,6,'2020-01-30 22:36:18','Pending'),(20,'2020-02-01',6,6,'2020-01-31 00:14:09','Pending'),(21,'2020-02-01',7,6,'2020-01-31 14:26:35','Pending');
/*!40000 ALTER TABLE `tbl_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product` (
  `Product_ID` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(150) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_unit` varchar(50) NOT NULL,
  `User_ID` int(11) NOT NULL,
  PRIMARY KEY (`Product_ID`),
  KEY `Product_ID` (`Product_ID`),
  KEY `User_ID` (`User_ID`),
  CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product`
--

LOCK TABLES `tbl_product` WRITE;
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` VALUES (1,'Cement','Twiga Cement','15','bug',1),(2,'Cement','TWiga CEment','15','bug',1),(3,'WEB design','website design of invoice template','50,000','Package',1),(4,'Nyumba','Nyumba ya vyumba 3 na sebule','15000000','pc',1),(5,'Image','Image ndogo ','2500','pc',1),(6,'Dompo','Dompo kubwa','12000','pc',1),(7,'Iphone X','I phone X full equiped with 128GB','700000','pc',1),(8,'Tiels','Tiels za 60X60cm','','pc',1),(10,'EHS','EHs sytem packege no 3','','Package',1),(11,'Vioo','Vioo tinted 1meter per each','','m',1),(12,'Kabati','kabati lavyombo vingi','','pc',1),(13,'Godoro','Godoro 6X6 tanform','','pc',1),(14,'Note Book','Note book kubwa','','pc',1),(15,'Spika','spika ndogo','','pc',1),(16,'Chipis','Chips mayai','','pc',1),(18,'Electronic School Management System(ESMS)','ESMS is software system  which is used in schools for managing all school payments, school expenditures, school revenue.\nManaging all students information\'s (student results and payments inclusive). \nManaging all employees information\'s like Salary and roles e.t.c \nESMS prepare monthly to annually school revenue reports.\nalso generate academic report, generate school time table.\n\nESMS notify results of the student to parents via text message through parents phone number\'s.','','Package',1),(19,'Computer Laptop ','HP Laptop with 500GB hard Disc, Processor 2.5GHz Intel quad core, Core I5,  4GB RAM ','','pc',1),(20,'Server','Computer Desktop with 500GB hard disk, Core i5, RAM 4GB','','pc',1),(21,'Access Point','Access Point are used to access network from router and distribute that network to connected computer.','','pc',6),(22,'Router','Router receive signal from server and send that signal to access point','','pc',6),(23,'Etharnet Cable','Etharnet is used to connect server and router then to access point  ','','m',6),(24,'Training and installation','Training user of the system and installation of Computer network together with installation of the system to computer.','','Package',6),(25,'Electronic School Management System(ESMS v2)','ESMS is software system  which is used for managing all school payments, school expenditures, school revenue.\r\nManaging all students information\'s (student results and payments inclusive). \r\nManaging all employees information\'s like Salary and their  roles e.t.c \r\nESMS prepare monthly to annually school revenue reports, generate academic report, generate school time table.\r\nESMS notify results of the student to parents via text message through parents phone number\'s provided during registration.','','Package',6),(26,'Computer  Desktop','Hard disk Drive 500GB, Core i5, Processor 2.5Ghz, Intel Quad core, RAM 4GB.','','pc',6);
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product_store`
--

DROP TABLE IF EXISTS `tbl_product_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product_store` (
  `InStore_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Product_ID` int(11) NOT NULL,
  `Selling_price` int(11) NOT NULL,
  `buying_price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`InStore_ID`),
  KEY `InStore_ID` (`InStore_ID`),
  KEY `User_ID` (`User_ID`),
  CONSTRAINT `tbl_product_store_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product_store`
--

LOCK TABLES `tbl_product_store` WRITE;
/*!40000 ALTER TABLE `tbl_product_store` DISABLE KEYS */;
INSERT INTO `tbl_product_store` VALUES (1,8,950,1100,120,1,'2020-01-03 22:46:06'),(2,7,200000,250000,2,1,'2020-01-03 23:48:22'),(3,5,2200,2500,30,1,'2020-01-03 23:51:58'),(4,13,210000,250000,10,1,'2020-01-04 02:04:31'),(5,10,2000000,25000000,3,1,'2020-01-04 02:14:07'),(6,14,3000,3500,50,1,'2020-01-09 00:58:14'),(7,1,15000,15000,100,1,'2020-01-10 00:37:41'),(8,16,1500,2000,100,1,'2020-01-25 23:53:41'),(9,18,2000000,1500000,1,1,'2020-01-28 22:42:03'),(10,19,650000,600000,2,1,'2020-01-28 22:50:41'),(11,20,350000,300000,1,1,'2020-01-28 23:01:59'),(12,21,250000,200000,1,6,'2020-01-29 00:34:51'),(13,23,5000,5000,100,6,'2020-01-29 00:35:26'),(14,22,350000,400000,1,6,'2020-01-29 00:42:46'),(15,24,500000,700000,1,6,'2020-01-29 00:47:43'),(16,25,3000000,2000000,1,6,'2020-01-31 14:24:51'),(17,26,350000,350000,4,6,'2020-01-31 17:58:01');
/*!40000 ALTER TABLE `tbl_product_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_proformer_invoice`
--

DROP TABLE IF EXISTS `tbl_proformer_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_proformer_invoice` (
  `Prof_Invo_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Product_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Proformer_ID` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Prof_Invo_ID`),
  KEY `Profomer_ID` (`Prof_Invo_ID`),
  KEY `Product_ID` (`Product_ID`),
  KEY `Customer_ID` (`Customer_ID`),
  KEY `User_ID` (`User_ID`),
  KEY `Proformer_ID` (`Proformer_ID`),
  CONSTRAINT `tbl_proformer_invoice_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `tbl_product` (`Product_ID`),
  CONSTRAINT `tbl_proformer_invoice_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `tbl_customer_registraion` (`Customer_ID`),
  CONSTRAINT `tbl_proformer_invoice_ibfk_3` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`),
  CONSTRAINT `tbl_proformer_invoice_ibfk_4` FOREIGN KEY (`Proformer_ID`) REFERENCES `tbl_Proformer` (`Proformer_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_proformer_invoice`
--

LOCK TABLES `tbl_proformer_invoice` WRITE;
/*!40000 ALTER TABLE `tbl_proformer_invoice` DISABLE KEYS */;
INSERT INTO `tbl_proformer_invoice` VALUES (2,8,1,1,2,'2020-01-16 21:38:02'),(3,7,1,1,2,'2020-01-16 21:38:02'),(4,5,1,1,2,'2020-01-16 21:38:03'),(5,13,1,1,2,'2020-01-16 21:42:24'),(6,10,1,1,2,'2020-01-16 21:42:24'),(8,8,1,1,3,'2020-01-28 21:14:25'),(9,7,1,1,3,'2020-01-28 21:14:25'),(10,5,1,1,3,'2020-01-28 21:14:25'),(15,13,1,1,3,'2020-01-28 22:03:44');
/*!40000 ALTER TABLE `tbl_proformer_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_terms_condition`
--

DROP TABLE IF EXISTS `tbl_terms_condition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_terms_condition` (
  `terms_ID` int(11) NOT NULL AUTO_INCREMENT,
  `terms_condition` text NOT NULL,
  `Shipping_terms` text NOT NULL,
  `User_ID` int(11) NOT NULL,
  PRIMARY KEY (`terms_ID`),
  KEY `User_ID` (`User_ID`),
  KEY `terms_ID` (`terms_ID`),
  CONSTRAINT `tbl_terms_condition_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_terms_condition`
--

LOCK TABLES `tbl_terms_condition` WRITE;
/*!40000 ALTER TABLE `tbl_terms_condition` DISABLE KEYS */;
INSERT INTO `tbl_terms_condition` VALUES (1,'kjdfnjvfdoiiuvoidv jdfvujodiv kfjdlkf kjjfdjf kdsjfkdjf klowris n jdsfd lkdfkdf jklfdkfldk dklflkdlf lkfldmlkf mklkf','lkdfldfkdlfkdklf klldkfldfkd kdjfljdkkf lkfkdlkfd lkfdfk',1),(2,'Service is given according to scope of the requirements and agreements adhered to our client.  ','We deliver service to our client',6),(3,'Service is given according to scope of the requirements and agreements adhered to our client.  ','We deliver service to our client',6);
/*!40000 ALTER TABLE `tbl_terms_condition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_photo` varchar(250) NOT NULL,
  PRIMARY KEY (`User_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'MESHACK THE DON','123','Meshack Steven',756077668,'meshackdone@gmail.com','screenshot_billings_desktop.jpg'),(2,'MESHACK Me2','81dc9bdb52d04dc20036dbd8313ed055','Meshack Steven',1235676888,'meshackdon@gmail.com',''),(3,'MESHACK Me2','81dc9bdb52d04dc20036dbd8313ed055','Meshack Steven',1235676888,'meshackdon@gmail.com',''),(4,'MESHACK Me2','81dc9bdb52d04dc20036dbd8313ed055','Meshack Steven',1235676888,'meshackdon@gmail.com',''),(5,'MESHACK Me2','81dc9bdb52d04dc20036dbd8313ed055','Meshack Steven',1235676888,'meshackdon@gmail.com',''),(6,'MESHACK MUGANYIZI','1234','MESHACK MUGANYIZI',756077558,'meshackstev@gmail.com','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-19  4:16:26
