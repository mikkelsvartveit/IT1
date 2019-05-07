-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: italia
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `matrett`
--

DROP TABLE IF EXISTS `matrett`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matrett` (
  `idmatrett` int(11) NOT NULL AUTO_INCREMENT,
  `navn` varchar(100) DEFAULT NULL,
  `informasjon` text,
  `bilde` varchar(255) DEFAULT NULL,
  `pris` int(11) DEFAULT NULL,
  `type` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idmatrett`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matrett`
--

LOCK TABLES `matrett` WRITE;
/*!40000 ALTER TABLE `matrett` DISABLE KEYS */;
INSERT INTO `matrett` VALUES (6,'Pizza Margherita','Tomatsaus, mozzarellaost og basilikum.','pizza.jpg',120,'h'),(19,'Bruschetta','Sprøstekt brød, oliven, basilikum og hvitløk.','bruschetta.jpg',60,'f'),(21,'Fritert Calamari','Frityrstekte ringer av blekksprut.','calamari.jpg',80,'f'),(24,'Spaghetti Carbonara','Spagetti, egg, parmesan og bacon.','carbonara.jpg',110,'h'),(25,'Mozzarella Sticks','Frityrstekte sticks av mozzarella.','mozzarellasticks.jpg',50,'f'),(26,'Spaghetti Bolognese','Spagetti, kjøttdeig og tomatsaus.','bolognese.jpg',130,'h'),(27,'Cæsarsalat','Grønn salat, kylling, bacon, parmesan, krutonger og dressing.','ceasarsalat.jpg',100,'h'),(29,'Pizza Regina','Tomatsaus, mozzarellaost, skinke, sopp og oliven.','regina.jpg',130,'h'),(30,'Crème Brûlée','Crème Brûlée toppet med et lag av karamellisert sukker.','cremebrulee.jpg',60,'d'),(32,'Tiramisu','Fingerkjeks, kaffe og mascarpone-krem.','tiramisu.jpg',70,'d'),(33,'Panna Cotta','Panna Cotta av vanilje med bringebærsaus, toppet med friske bær.','pannacotta.jpg',80,'d');
/*!40000 ALTER TABLE `matrett` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-25 21:33:44
