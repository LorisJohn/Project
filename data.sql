-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: exam
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.15.10.1

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
-- Table structure for table `Artikel`
--

DROP TABLE IF EXISTS `Artikel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Artikel` (
  `productCode` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fabrieksCode` int(10) unsigned NOT NULL,
  `inkoopprijs` double NOT NULL,
  `verkoopprijs` double NOT NULL,
  PRIMARY KEY (`productCode`),
  KEY `artikel_fabriekscode_foreign` (`fabrieksCode`),
  CONSTRAINT `artikel_fabriekscode_foreign` FOREIGN KEY (`fabrieksCode`) REFERENCES `Fabriek` (`fabrieksCode`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Artikel`
--

LOCK TABLES `Artikel` WRITE;
/*!40000 ALTER TABLE `Artikel` DISABLE KEYS */;
INSERT INTO `Artikel` VALUES (1,'Workmate','WM 546',2,45.95,99.95),(2,'Boormachine','BM 323',1,99.95,179.99),(3,'Boormachine','DE 232',2,199.95,299.95);
/*!40000 ALTER TABLE `Artikel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Fabriek`
--

DROP TABLE IF EXISTS `Fabriek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Fabriek` (
  `fabrieksCode` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fabriek` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefoon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`fabrieksCode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Fabriek`
--

LOCK TABLES `Fabriek` WRITE;
/*!40000 ALTER TABLE `Fabriek` DISABLE KEYS */;
INSERT INTO `Fabriek` VALUES (1,'Worx','010-223232'),(2,'Bosh','010-203234');
/*!40000 ALTER TABLE `Fabriek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Locatie`
--

DROP TABLE IF EXISTS `Locatie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Locatie` (
  `locatieCode` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locatie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`locatieCode`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Locatie`
--

LOCK TABLES `Locatie` WRITE;
/*!40000 ALTER TABLE `Locatie` DISABLE KEYS */;
INSERT INTO `Locatie` VALUES (1,'Rotterdam'),(2,'Almere'),(3,'Almere');
/*!40000 ALTER TABLE `Locatie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Medewerker`
--

DROP TABLE IF EXISTS `Medewerker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Medewerker` (
  `medewerkersCode` int(11) NOT NULL,
  `voorletters` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voorvoegsels` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `achternaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gebruikersnaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wachtwoord` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Medewerker`
--

LOCK TABLES `Medewerker` WRITE;
/*!40000 ALTER TABLE `Medewerker` DISABLE KEYS */;
INSERT INTO `Medewerker` VALUES (0,'M.B.',NULL,'Jones','m.jones','$2y$10$y0FQUXot0EAuqU3nTYLCveL42jt23WTH9NmlcRwv/Z3sdXzU54YFa'),(0,'J.W.',NULL,'Heyman','j.heyman','$2y$10$vimBzl4vgKWGCi190ETA.u5oHypmaczRWx2TrNdkfynH116cPdQia');
/*!40000 ALTER TABLE `Medewerker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Voorraad`
--

DROP TABLE IF EXISTS `Voorraad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Voorraad` (
  `locatieCode` int(10) unsigned NOT NULL,
  `productCode` int(10) unsigned NOT NULL,
  `aantal` int(11) NOT NULL,
  PRIMARY KEY (`locatieCode`,`productCode`),
  KEY `voorraad_productcode_foreign` (`productCode`),
  CONSTRAINT `voorraad_locatiecode_foreign` FOREIGN KEY (`locatieCode`) REFERENCES `Locatie` (`locatieCode`),
  CONSTRAINT `voorraad_productcode_foreign` FOREIGN KEY (`productCode`) REFERENCES `Artikel` (`productCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Voorraad`
--

LOCK TABLES `Voorraad` WRITE;
/*!40000 ALTER TABLE `Voorraad` DISABLE KEYS */;
INSERT INTO `Voorraad` VALUES (1,1,10),(1,2,5),(2,1,32),(2,2,5);
/*!40000 ALTER TABLE `Voorraad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2016_05_24_080022_create_locatie_table',1),('2016_05_24_080023_create_fabriek_table',1),('2016_05_24_080024_create_artikel_table',1),('2016_05_24_080057_create_voorraad_table',1),('2016_05_24_080236_create_medewerker_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-25 14:47:06
