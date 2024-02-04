-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: tistats
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `faction`
--

DROP TABLE IF EXISTS `faction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faction` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `shortName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faction`
--

LOCK TABLES `faction` WRITE;
/*!40000 ALTER TABLE `faction` DISABLE KEYS */;
INSERT INTO `faction` VALUES (1,'The Arborec','Arborec'),(2,'The Barony of Letnev','Letnev'),(3,'The Clan of Saar','Saar'),(4,'The Embers of Muaat','Muaat'),(5,'The Emirates of Hacan','Hacan'),(6,'The Federation of Sol','Sol'),(7,'The Ghosts of Creuss','Ghosts'),(8,'The L1Z1X Mindnet','L1Z1X'),(9,'The Mentak Coalition','Mentak'),(10,'The Naalu Collective','Naalu'),(11,'The Nekro Virus','Nekro'),(12,'Sardakk N’orr','Sardakk'),(13,'The Universities of Jol-Nar','JolNar'),(14,'The Winnu','Winnu'),(15,'The Xxcha Kingdom','Xxcha'),(16,'The Yin Brotherhood','Yin'),(17,'The Yssaril Tribes','Yssaril'),(18,'The Argent Flight','Argent'),(19,'The Empyrean','Empyrean'),(20,'The Mahact Gene-Sorcerers','Mahact'),(21,'The Naaz-Rokha Alliance','Naaz'),(22,'The Nomad','Nomad'),(23,'The Titans of Ul','Titans'),(24,'The Vuil\'Raith Cabal','Cabal'),(25,'The Council Keleres','Keleres');
/*!40000 ALTER TABLE `faction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `game` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `pok` tinyint unsigned DEFAULT '1',
  `players` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,'2019-02-23',0,6),(2,'2019-03-23',0,6),(3,'2019-05-11',0,6),(4,'2019-07-29',0,6),(5,'2019-11-16',0,5),(6,'2019-12-14',0,6),(7,'2020-01-11',0,6),(8,'2020-09-13',0,5),(9,'2020-10-17',0,4),(10,'2021-06-19',1,5),(11,'2021-08-14',1,4),(12,'2021-09-11',1,4),(13,'2021-12-29',1,5),(14,'2022-02-19',1,6),(15,'2022-03-26',1,5),(16,'2022-05-07',1,5),(17,'2022-07-10',1,5),(18,'2022-08-13',1,5),(19,'2022-09-17',1,5),(20,'2022-10-15',1,4),(21,'2022-11-12',1,6),(22,'2022-12-29',1,5),(23,'2023-02-18',1,6),(24,'2023-03-25',1,5),(25,'2023-05-20',1,6),(26,'2023-06-03',1,5),(27,'2023-06-24',1,5),(28,'2023-07-22',1,5),(29,'2023-08-26',1,5),(30,'2023-11-11',1,5),(31,'2023-12-31',1,5),(32,'2024-02-03',1,5);
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_xref`
--

DROP TABLE IF EXISTS `game_xref`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `game_xref` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_player_id` int unsigned NOT NULL,
  `fk_game_id` int unsigned NOT NULL,
  `fk_faction_id` int unsigned NOT NULL,
  `position` tinyint unsigned NOT NULL,
  `points` tinyint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gamexref_game_idx` (`fk_game_id`),
  KEY `fk_gamesxref_player_idx` (`fk_player_id`),
  CONSTRAINT `fk_gamesxref_player` FOREIGN KEY (`fk_player_id`) REFERENCES `player` (`id`),
  CONSTRAINT `fk_gamexref_game` FOREIGN KEY (`fk_game_id`) REFERENCES `game` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_xref`
--

LOCK TABLES `game_xref` WRITE;
/*!40000 ALTER TABLE `game_xref` DISABLE KEYS */;
INSERT INTO `game_xref` VALUES (1,6,1,2,1,NULL),(2,2,1,6,2,NULL),(3,1,1,16,3,NULL),(4,16,1,7,4,NULL),(5,10,1,15,5,NULL),(6,9,1,12,6,NULL),(7,1,2,13,1,NULL),(8,9,2,12,2,NULL),(9,17,2,2,3,NULL),(10,6,2,5,4,NULL),(11,3,2,5,5,NULL),(12,2,2,6,6,NULL),(13,2,3,5,1,10),(14,1,3,13,2,8),(15,17,3,6,3,8),(16,9,3,16,4,6),(17,4,3,4,5,4),(18,15,3,2,6,3),(21,3,4,2,1,NULL),(22,1,4,14,2,NULL),(23,4,4,13,3,NULL),(24,17,4,5,4,NULL),(25,9,4,7,5,NULL),(26,2,4,12,6,NULL),(27,4,5,11,1,10),(28,17,5,13,2,9),(29,2,5,2,3,8),(30,1,5,7,4,6),(31,15,5,4,5,5),(32,5,6,6,1,10),(33,1,6,5,2,9),(34,17,6,17,2,9),(35,4,6,4,4,8),(36,2,6,15,4,8),(37,6,6,7,6,4),(38,6,7,16,1,10),(39,5,7,5,2,9),(40,2,7,13,2,9),(41,4,7,2,4,8),(42,1,7,11,5,6),(43,15,7,4,6,5),(44,2,8,7,1,10),(45,5,8,5,2,9),(46,6,8,6,2,9),(47,4,8,13,2,9),(48,1,8,15,2,9),(49,1,9,1,1,14),(50,4,9,16,2,12),(51,5,9,13,3,11),(52,2,9,8,3,10),(53,4,10,23,1,NULL),(54,5,10,22,2,NULL),(55,6,10,20,3,NULL),(56,17,10,19,4,NULL),(57,2,10,21,5,NULL),(58,7,11,5,1,10),(59,4,11,4,3,7),(60,2,11,3,4,6),(61,1,11,16,2,8),(62,4,12,5,1,12),(63,2,12,24,2,11),(64,5,12,6,3,6),(65,6,12,8,3,6),(66,4,13,11,1,10),(67,2,13,23,2,9),(68,6,13,8,3,8),(69,17,13,6,4,7),(70,5,13,19,4,7),(71,4,14,21,1,12),(72,2,14,5,3,9),(73,13,14,6,3,9),(74,16,14,13,5,8),(75,10,14,18,6,7),(76,1,14,23,2,11),(77,5,15,6,1,10),(78,17,15,22,2,9),(79,12,15,15,2,9),(80,2,15,8,4,7),(81,4,15,10,5,6),(82,2,16,17,1,10),(83,1,16,21,2,7),(85,8,16,13,2,7),(86,5,16,5,2,7),(87,4,16,22,2,7),(88,2,17,3,1,10),(89,12,17,18,2,9),(90,4,17,23,3,8),(91,6,17,9,3,8),(92,8,17,13,5,5),(93,1,18,25,1,10),(94,4,18,10,2,8),(95,2,18,15,3,5),(96,8,18,19,3,5),(97,17,18,8,5,4),(98,4,19,10,1,10),(99,2,19,12,2,8),(100,14,19,23,3,7),(101,6,19,2,3,7),(102,17,19,8,3,7),(103,8,20,7,1,12),(104,2,20,18,2,11),(105,6,20,16,2,11),(106,1,20,1,2,11),(107,17,21,22,1,10),(108,6,21,8,2,8),(109,2,21,21,3,7),(110,4,21,24,3,7),(111,8,21,3,3,7),(112,1,21,18,6,6),(113,4,22,16,1,10),(114,2,22,10,2,7),(115,6,22,11,3,6),(116,17,22,22,3,6),(117,8,22,4,5,5),(118,6,23,2,1,10),(119,1,23,20,2,8),(120,17,23,24,3,7),(121,2,23,18,3,7),(122,8,23,9,3,7),(123,4,23,25,6,6),(124,1,24,7,1,NULL),(125,6,24,4,2,NULL),(126,4,24,24,3,NULL),(127,2,24,15,4,NULL),(128,8,24,13,5,NULL),(129,6,25,6,1,10),(130,17,25,3,2,9),(131,2,25,11,3,8),(132,4,25,24,4,7),(133,11,25,22,5,6),(134,8,25,25,5,6),(135,4,26,16,1,10),(136,2,26,24,2,7),(137,11,26,18,2,7),(138,17,26,19,2,7),(139,8,26,1,5,4),(140,2,27,4,1,10),(141,1,27,18,2,9),(142,8,27,21,3,8),(143,6,27,7,4,7),(144,4,27,23,5,5),(147,4,28,3,1,10),(148,2,28,13,2,8),(149,8,28,18,2,8),(150,17,28,4,2,8),(151,1,28,25,5,7),(152,6,29,2,1,10),(153,4,29,8,2,6),(154,8,29,15,3,5),(155,2,29,7,4,4),(156,17,29,1,5,3),(157,1,30,19,1,10),(158,6,30,20,2,9),(159,2,30,16,3,8),(160,4,30,14,3,8),(161,8,30,21,5,7),(162,1,31,23,1,10),(163,6,31,4,2,9),(164,4,31,3,3,7),(165,2,31,10,4,6),(166,8,31,11,5,4),(167,1,32,24,4,5),(168,2,32,20,3,7),(169,4,32,8,2,9),(170,6,32,13,1,10),(171,8,32,22,5,3);
/*!40000 ALTER TABLE `game_xref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guide`
--

DROP TABLE IF EXISTS `guide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guide` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_faction_id` int unsigned NOT NULL,
  `file` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `pok` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_guide_faction_idx` (`fk_faction_id`),
  CONSTRAINT `fk_guide_faction` FOREIGN KEY (`fk_faction_id`) REFERENCES `faction` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guide`
--

LOCK TABLES `guide` WRITE;
/*!40000 ALTER TABLE `guide` DISABLE KEYS */;
INSERT INTO `guide` VALUES (1,1,'greenisatrap.html','Green is a trap',0);
/*!40000 ALTER TABLE `guide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `player` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES (1,'Aidan'),(2,'Chris'),(3,'Brig'),(4,'Jon'),(5,'Ros'),(6,'Lee'),(7,'James F'),(8,'Timothy'),(9,'Ken'),(10,'Stuart'),(11,'Damiano'),(12,'Rob'),(13,'Sam'),(14,'Steve H'),(15,'Sy'),(16,'Paul'),(17,'Andrew');
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-04 17:06:33
