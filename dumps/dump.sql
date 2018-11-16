-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: dizai_database
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `Campi`
--

DROP TABLE IF EXISTS `Campi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Campi` (
  `id_campi` int(11) NOT NULL AUTO_INCREMENT,
  `name_campi` varchar(30) NOT NULL,
  PRIMARY KEY (`id_campi`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Campi`
--

LOCK TABLES `Campi` WRITE;
/*!40000 ALTER TABLE `Campi` DISABLE KEYS */;
INSERT INTO `Campi` VALUES (1,'Apodi'),(2,'Caicó'),(3,'Canguaretama'),(4,'Ceará-Mirim'),(5,'Currais Novos'),(6,'Ipanguaçu'),(7,'João Câmara'),(8,'Lajes'),(9,'Macau'),(10,'Mossoró'),(11,'Natal - Central'),(12,'Natal - Cidade Alta'),(13,'Natal - Zona Norte'),(14,'Nova Cruz'),(15,'Parelhas'),(16,'Parnamirim'),(17,'Pau dos Ferros'),(18,'Santa Cruz'),(19,'São Gonçalo do Amarante'),(20,'São Paulo do Potengi');
/*!40000 ALTER TABLE `Campi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Message`
--

DROP TABLE IF EXISTS `Message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_send` datetime NOT NULL,
  `body_message` text NOT NULL,
  `issuer_name` varchar(45) DEFAULT NULL,
  `issuer_campi` int(11) DEFAULT NULL,
  `image` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_message_campi` (`issuer_campi`),
  CONSTRAINT `Message_ibfk_1` FOREIGN KEY (`issuer_campi`) REFERENCES `Campi` (`id_campi`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Message`
--

LOCK TABLES `Message` WRITE;
/*!40000 ALTER TABLE `Message` DISABLE KEYS */;
INSERT INTO `Message` VALUES (1,'2018-11-16 09:21:16','Vamo vamo vamo vamo','Matheus',18,''),(2,'2018-11-16 09:21:40','OlÃ¡','Daniel',18,'kcolrehs5beeb654845676.36132427.jpg'),(3,'2018-11-16 09:22:30','Sei sei','Mirosmar',18,''),(4,'2018-11-16 09:23:57','OlÃ¡aaaa','Franciane',18,''),(5,'2018-11-16 09:26:25','Vamo sim ','Ruth',18,''),(6,'2018-11-16 09:31:58','Oie','Adla',1,''),(7,'2018-11-16 09:41:50','Oie, sou muito gente boa.','Mathh',19,'kcolrehs5beebb0e5e6ec9.60106641.jpeg'),(8,'2018-11-16 09:49:20','','kkkk',1,''),(9,'2018-11-16 09:49:38','','kjjj',1,'');
/*!40000 ALTER TABLE `Message` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-16 10:16:14
