CREATE DATABASE  IF NOT EXISTS `sql577358_3` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sql577358_3`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: sql577358_3
-- ------------------------------------------------------
-- Server version	5.5.24-log

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
-- Table structure for table `users_has_users`
--

DROP TABLE IF EXISTS `users_has_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_has_users` (
  `idusers` int(11) NOT NULL,
  `idfriend` int(11) NOT NULL,
  PRIMARY KEY (`idusers`,`idfriend`),
  KEY `fk_users_has_users_users2` (`idfriend`),
  KEY `fk_users_has_users_users1` (`idusers`),
  CONSTRAINT `fk_users_has_users_users1` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_users_users2` FOREIGN KEY (`idfriend`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_has_users`
--

LOCK TABLES `users_has_users` WRITE;
/*!40000 ALTER TABLE `users_has_users` DISABLE KEYS */;
INSERT INTO `users_has_users` VALUES (25,1),(1,3);
/*!40000 ALTER TABLE `users_has_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places_has_users`
--

DROP TABLE IF EXISTS `places_has_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places_has_users` (
  `idplaces` int(11) NOT NULL,
  `idusers` int(11) NOT NULL,
  PRIMARY KEY (`idplaces`,`idusers`),
  KEY `fk_places_has_users_users1` (`idusers`),
  KEY `fk_places_has_users_places` (`idplaces`),
  CONSTRAINT `fk_places_has_users_places` FOREIGN KEY (`idplaces`) REFERENCES `places` (`idplaces`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_places_has_users_users1` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places_has_users`
--

LOCK TABLES `places_has_users` WRITE;
/*!40000 ALTER TABLE `places_has_users` DISABLE KEYS */;
INSERT INTO `places_has_users` VALUES (1,1),(3,1),(1,2),(2,2),(3,2);
/*!40000 ALTER TABLE `places_has_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`idusers`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'andrea','a','Andrea','Becks','andrea.beccarini@gmail.com'),(2,'stefano','s','Stefano','Godi','stefano.godi@gmail.com'),(3,'enrico','e','Enrico','Federici','enrfed@gmail.com'),(13,'leo','l','leonardo','beccarini','leonardo.beccarini@gmail.com'),(23,'leon','l','l','l','l'),(25,'luca','l','luca','torquati','lklkl');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places` (
  `idplaces` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`idplaces`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
INSERT INTO `places` VALUES (1,'Arca','via degli angeli','Tango argentino e Salsa'),(2,'Barrio','via del barrio','Tango Argentino e Salsa, Merengue e Bachata'),(3,'Soho','via del soho','Tango nuevo');
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'sql577358_3'
--

--
-- Dumping routines for database 'sql577358_3'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-04 12:23:27
