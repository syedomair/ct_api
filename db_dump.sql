-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: project1
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `catalog`
--

DROP TABLE IF EXISTS `catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog`
--

LOCK TABLES `catalog` WRITE;
/*!40000 ALTER TABLE `catalog` DISABLE KEYS */;
INSERT INTO `catalog` VALUES (1,'Test Catalog Name');
/*!40000 ALTER TABLE `catalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_64C19C1CC3C66FC` (`catalog_id`),
  CONSTRAINT `FK_64C19C1CC3C66FC` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,1,'Men'),(2,1,'Women'),(3,1,'Children');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD12469DE2` (`category_id`),
  CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,1,'Men Shirts Dress Khaki','EW239','46.99','The description for Men Shirt Dress Khaki','mens_shirts_dresscas_Dkhaki.gif'),(2,1,'Men Pants Dress','FD320','45.99','The description for Men Pants Dress','mens_pants_dress.gif'),(3,1,'Men Pants Cords','HG875','10.99','The description for Men Pants Cords','mens_pants_cords.gif'),(4,1,'Men Shirts Dress Stone','CY543','68.99','The description for Men Shirts Dress Stone','mens_shirts_dress_stone.gif'),(5,1,'Men Shirts Dress Stone II','TY332','67.99','The description for Men Shirts Dress Stone II','mens_shirts_dresscas_stone.gif'),(6,2,'Women Sleepwear','BC198','21.99','The description for Women Sleepwear','womens_sleepwear_short_Iblue.gif'),(7,2,'Women Dress','AY723','78.99','The description for Women Dress','womens_dress_pink_Db.gif'),(8,2,'Women Activewear Soccer','PO193','23.99','The description for Women Activewear Soccer','womens_activewear_soccer_Ob.gif'),(9,2,'Women Activewear 1Piece','CV389','32.99','The description for Women Activewear 1Piece','womens_activewear_1piece_in.gif'),(10,2,'Women Accessories Handbag','SBC163','15.99','The description for Women Accessories Handbag','womens_accessories_handbag.gif'),(11,2,'Women Accessories Belt Nav','AU0023','11.99','The description for Women Accessories Belt Nav','womens_accessories_belt_nav.gif'),(12,2,'Women Accessories Belt Brown','BC003','10.99','The discription for Women Accessories Belt Brown','womens_accessories_belt_brw.gif');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `email_verified` tinyint(1) DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (46,'omair@gmail.com','2016-03-26 16:39:01','2016-03-26 16:39:01',NULL,'atd1W/VW94/nY','atrasmpqeyo0ckg8okowocgo','Syed','omair'),(47,'syedkhalidomair@gmail.com','2016-12-26 10:24:52','2016-12-26 10:24:52',NULL,'538vBukAP8wlo','53q1x4ft8icc0sk0kosc4go4','Syed','Omair'),(48,'omair1@gmail.com','2016-12-26 14:15:23','2016-12-26 14:15:23',NULL,'fi/.s2eZOpXNU','fioys9rgls84ww0co4844008','Syed','Omair'),(49,'omair2@gmail.com','2017-01-11 17:30:58','2017-01-11 17:30:58',NULL,'1ab1rU5bPGYRM','1axbflhklaqs8ksogsk4c0cws','Syed','Omair'),(50,'omair4@gmail.com','2017-01-11 17:57:47','2017-01-11 17:57:47',NULL,'fxwvHzsg9KpOY','fxezmjrqmuosogkwk8k0oss4','Syed','Omair');
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

-- Dump completed on 2017-01-15 17:39:34
