-- MySQL dump 10.13  Distrib 5.5.32, for Win32 (x86)
--
-- Host: localhost    Database: shop
-- ------------------------------------------------------
-- Server version	5.5.32

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
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_category`
--

LOCK TABLES `tbl_category` WRITE;
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` VALUES (1,'Men',0),(2,'Women',0),(3,'Dress',2),(4,'Skirts',2),(5,'Shoes',2),(6,'Shirts',1),(7,'Trousers',1),(8,'Shoes',1),(15,'child_Shirts 1',6),(16,'child_Shirts 3',6),(17,'level 4.0',15),(19,'level 4.1',15),(20,'level 4.2',16);
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_color`
--

DROP TABLE IF EXISTS `tbl_color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_color`
--

LOCK TABLES `tbl_color` WRITE;
/*!40000 ALTER TABLE `tbl_color` DISABLE KEYS */;
INSERT INTO `tbl_color` VALUES (1,'black'),(2,'blue'),(3,'gray'),(4,'white');
/*!40000 ALTER TABLE `tbl_color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_group_user`
--

DROP TABLE IF EXISTS `tbl_group_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_group_user` (
  `group_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`group_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_group_user`
--

LOCK TABLES `tbl_group_user` WRITE;
/*!40000 ALTER TABLE `tbl_group_user` DISABLE KEYS */;
INSERT INTO `tbl_group_user` VALUES (1,'Super Admin'),(3,'Admin Category');
/*!40000 ALTER TABLE `tbl_group_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_image`
--

DROP TABLE IF EXISTS `tbl_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_image`
--

LOCK TABLES `tbl_image` WRITE;
/*!40000 ALTER TABLE `tbl_image` DISABLE KEYS */;
INSERT INTO `tbl_image` VALUES (1,1,'public/images/big1.jpg'),(2,2,'public/images/big2.jpg'),(3,3,'public/images/big3.jpg'),(5,5,'public/images/ao-khoac-nam-807015_2_.JPG'),(6,6,'public/images/big2.jpg'),(7,7,'public/images/82304018X_2_.JPG');
/*!40000 ALTER TABLE `tbl_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_modules`
--

DROP TABLE IF EXISTS `tbl_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_modules`
--

LOCK TABLES `tbl_modules` WRITE;
/*!40000 ALTER TABLE `tbl_modules` DISABLE KEYS */;
INSERT INTO `tbl_modules` VALUES (1,'user'),(2,'category'),(4,'product'),(5,'roles');
/*!40000 ALTER TABLE `tbl_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_permision`
--

DROP TABLE IF EXISTS `tbl_permision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_permision` (
  `pm_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group_user` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`pm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_permision`
--

LOCK TABLES `tbl_permision` WRITE;
/*!40000 ALTER TABLE `tbl_permision` DISABLE KEYS */;
INSERT INTO `tbl_permision` VALUES (1,1,1),(3,1,2),(9,1,4),(10,1,5),(11,3,2);
/*!40000 ALTER TABLE `tbl_permision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product`
--

LOCK TABLES `tbl_product` WRITE;
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` VALUES (1,'Demo_Product_01',57,3,'<p>Demo_Product_01</p>\r\n',0),(2,'Demo_Product_02',58,2,'<p>Demo_Product_02</p>\r\n',0),(3,'Demo_Product_03',59,1,'<p>Demo_Product_03</p>\r\n',0),(5,'Demo_Product_05',61,4,'<p>Demo_Product_05</p>\r\n',0),(6,'Product_06',63,1,'<p>Product_06</p>\r\n',0),(7,'search',23,2,'<p>search</p>\r\n',0);
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product_category`
--

DROP TABLE IF EXISTS `tbl_product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product_category` (
  `pro_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`pro_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product_category`
--

LOCK TABLES `tbl_product_category` WRITE;
/*!40000 ALTER TABLE `tbl_product_category` DISABLE KEYS */;
INSERT INTO `tbl_product_category` VALUES (73,1,6),(74,2,7),(75,3,3),(77,5,6),(78,6,6),(79,7,6);
/*!40000 ALTER TABLE `tbl_product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `group_user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e','admin@gmail.com',1),(2,'Category','e10adc3949ba59abbe56e057f20f883e','product@gmail.com',3),(7,'binhpt','e10adc3949ba59abbe56e057f20f883e','binhpt@gmail.com',0),(8,'thainv','e10adc3949ba59abbe56e057f20f883e','thainv@gmail.com',0),(9,'tuhn','e10adc3949ba59abbe56e057f20f883e','tuhn@gmail.com',0),(10,'demo','e10adc3949ba59abbe56e057f20f883e','demo@demo.com',3),(11,'role_test','e10adc3949ba59abbe56e057f20f883e','role@gmail.com',3);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-19 17:12:03
