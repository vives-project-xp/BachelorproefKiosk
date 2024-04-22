-- MariaDB dump 10.19  Distrib 10.11.6-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db_kiosk
-- ------------------------------------------------------
-- Server version	10.11.6-MariaDB-0+deb12u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `fiche`
--

DROP TABLE IF EXISTS `fiche`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fiche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentNaam` varchar(60) NOT NULL,
  `bedrijf` varchar(60) NOT NULL,
  `titel` varchar(30) NOT NULL,
  `link` varchar(60) NOT NULL,
  `tekst` varchar(4092) NOT NULL,
  `afbeelding1` varchar(60) NOT NULL,
  `afbeelding2` varchar(60) NOT NULL,
  `hashtags` varchar(120) NOT NULL,
  `richtingId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fiche`
--

LOCK TABLES `fiche` WRITE;
/*!40000 ALTER TABLE `fiche` DISABLE KEYS */;
INSERT INTO `fiche` VALUES
(1,'Jay D\'hulster','Vives','HET OPZETTEN VAN EEN','www.linkedin.com/in/jaydhulster','In deze bachelorproef heb ik een promotionele website opgezet om projecten tentoon te stellen voor de opleiding elektronica-ict. Verder heb ik het project Lannootree ondersteund, zodat het uploaden van gifs op deze unieke LED-paneel eenvoudig loopt.','jay1.png','jay2.png','#projects #gifs #lannootree',1),
(2,'Aaron Van Vyve','Canyon Clan','EEN 2D GOLF BROWSER SPEL MAKEN','www.linkedin.com/in/ aaron-van-vyve-b7479012b/','Deze bachelorproef leidt u door de werkwijze en de gedachtegang van het creëren van een 2D golf browser game. Het is een opdracht van de Royal Ostend Golf Club, een partner van Canyon Clan om spelers interactief kennis te doen maken met het golfterrein.','aaron1.png','aaron2.png','#BrowserGame #Golf #Phaser',2),
(3,'Arthur Coupé','Ordina Belgium','DESIGNING A CLOUD DASHBOARD','www.linkedin.com/in/arthurcoupe','In deze bachelorproef visualiseren wij de gemaakte kosten van een Amazon Web Services (AWS) account met behulp van Cloudhealth en de AWS tools.','arthur1.png','arthur2.png','#AWS #cloudhealth #dashboard',1);
/*!40000 ALTER TABLE `fiche` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `richting`
--

DROP TABLE IF EXISTS `richting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `richting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `richting`
--

LOCK TABLES `richting` WRITE;
/*!40000 ALTER TABLE `richting` DISABLE KEYS */;
INSERT INTO `richting` VALUES
(1,'ICT - ICT'),
(2,'ICT - AI');
/*!40000 ALTER TABLE `richting` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-19 17:11:12
