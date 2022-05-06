-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: travel2020
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `n_service` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (65,'airport','3500','transfer.jpg','1',NULL),(64,'service prueba','3','b.jpg','1','1'),(63,'service puerta a puerta','3','a.jpg','1','2'),(62,'boca vs racing','4500','boca.jpg','1','3'),(66,'trans','250','images.jpg','1',NULL),(67,'boca','2300','sombra.png','1',NULL),(68,'asdasdddsdsd','50000','sin_foto.png','1','4');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(45) DEFAULT NULL,
  `discount` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon`
--

LOCK TABLES `coupon` WRITE;
/*!40000 ALTER TABLE `coupon` DISABLE KEYS */;
INSERT INTO `coupon` VALUES (1,'abc','20','Valid'),(2,'a','30','Valid');
/*!40000 ALTER TABLE `coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `servicio` varchar(45) DEFAULT NULL,
  `n_service` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (5,'boca','2300','sombra.png','football','3'),(4,'boca vs racing','4500','boca.jpg','football','3'),(17,'trans','250','images.jpg','maleta','1'),(13,'service puerta a puerta','3','a.jpg','','2'),(14,'service prueba','3','b.jpg','trasnfer','2'),(15,'airport','3500','transfer.jpg','','4'),(16,'asdasdddsdsd','50000','sin_foto.png','football','3');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) DEFAULT NULL,
  `titulo` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1,'d',NULL),(2,'food-5.png',NULL),(3,'COCA COLA',NULL),(4,'sandwich',NULL),(5,'food-3.png',NULL),(6,'food-6.png',NULL),(7,'food-6.png','papas'),(8,'food-6.png','papas'),(9,'food-6.png','papas'),(10,'food-6.png','papas'),(11,'food-6.png','papas'),(12,'food-1.png','burger'),(13,'food-1.png','burger'),(14,'food-1.png','burger'),(15,'food-1.png','burger'),(16,'food-1.png','burger'),(17,'food-1.png','burger'),(18,'food-1.png','burger'),(19,'food-1.png','burger'),(20,'food-1.png','burger'),(21,'food-1.png','burger'),(22,'food-1.png','burger'),(23,'food-1.png','burger'),(24,'food-1.png','burger'),(25,'food-1.png','burger'),(26,'food-1.png','burger'),(27,'food-2.png','pizza'),(28,'food-2.png','pizza'),(29,'food-2.png','pizza');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_members`
--

DROP TABLE IF EXISTS `tbl_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `member_password` varchar(45) DEFAULT NULL,
  `informacion` varchar(500) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `member_type` varchar(45) DEFAULT NULL,
  `pagina` varchar(155) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_members`
--

LOCK TABLES `tbl_members` WRITE;
/*!40000 ALTER TABLE `tbl_members` DISABLE KEYS */;
INSERT INTO `tbl_members` VALUES (9,'GUARDA MALETAS EN BUENOS AIRES','','Recogemos tus maletas en tu hotel o punto de encuentro y te la devolvemos de la misma manera. 24/7','1651223282-0.jpg','1','maleta.php'),(8,'FOOTBALL','','No te quedes sin ver un partido de football en argentina','1651223180-0.jpg','1','football.php'),(10,'TRANSFERS IN BUENOS AIRES','','Trasnfers desde aeropuerto/hotel y cualquier punto de buenos aires','1651223954-0.jpg','1','transfer.php'),(11,'INTERSHIP IN BUENOS AIRES','','Encontra tu practica ideal en argentina con travel n change','1651224219-0.jpg','1','intership.php');
/*!40000 ALTER TABLE `tbl_members` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-06 11:28:55
