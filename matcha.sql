-- MySQL dump 10.13  Distrib 5.7.24, for macos10.14 (x86_64)
--
-- Host: localhost    Database: matcha
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES UTF8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `like_users`
--

DROP TABLE IF EXISTS `like_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `likeUsers` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_users`
--

LOCK TABLES `like_users` WRITE;
/*!40000 ALTER TABLE `like_users` DISABLE KEYS */;
INSERT INTO `like_users` VALUES (1,1,'3,8,2,11'),(2,2,'3,1'),(4,3,'1,2'),(5,8,'1'),(6,11,'2,1');
/*!40000 ALTER TABLE `like_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `massege`
--

DROP TABLE IF EXISTS `massege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `massege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` text NOT NULL,
  `date` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `massege`
--

LOCK TABLES `massege` WRITE;
/*!40000 ALTER TABLE `massege` DISABLE KEYS */;
INSERT INTO `massege` VALUES (1,12,1,'HEllo:','15:30:00','2019-06-20',1),(2,12,2,'HEllo:','13:53:29','2019-06-20',1),(30,12,1,'HEllo:','18:17:14','2019-06-21',1),(32,12,1,'HEllo:','11:27:26','2019-06-21',1),(33,12,1,'HEllo:','15:53:33','2019-06-22',1),(34,12,1,'HEllo:','15:57:25','2019-06-22',1),(35,12,2,'HEllo:','16:56:28','2019-06-22',1),(37,13,1,'HEllo:','15:09:45','2019-06-26',1),(38,12,1,'HEllo:','15:55:09','2019-06-26',1),(60,13,3,'HEllo:','12:30:38','2019-06-29',1),(61,12,2,'HEllo:','15:17:56','2019-07-06',1),(62,12,2,'HEllo:','15:22:04','2019-07-06',1),(75,12,1,'HEllo:','18:24:47','2019-07-06',1),(79,12,1,'HEllo:','14:38:13','2019-10-29',1),(80,12,1,'HEllo:','14:38:34','2019-10-29',1),(81,12,1,'HEllo:','15:47:02','2019-10-29',1),(82,12,1,'HEllo:','15:47:42','2019-10-29',1),(83,12,1,'HEllo:','15:48:40','2019-10-29',1),(84,12,1,'HEllo:','18:13:01','2019-10-30',1),(85,18,1,'HEllo:','15:11:18','2019-10-31',1),(86,12,1,'HEllo:','17:21:13','2019-10-31',1),(87,12,1,'HEllo:','17:22:41','2019-10-31',1),(88,1,1,'HEllo:','15:54:44','2019-11-04',0),(89,12,1,'HEllo:','15:54:56','2019-11-04',1),(90,1,1,'HEllo:','15:55:37','2019-11-04',0),(91,1,1,'HEllo:','15:56:28','2019-11-04',0),(92,1,1,'HEllo:','15:56:33','2019-11-04',0),(93,1,1,'HEllo:','15:56:37','2019-11-04',0),(94,1,1,'HEllo:','15:56:53','2019-11-04',0),(95,12,2,'HEllo:','16:50:59','2019-11-04',1),(96,12,2,'HEllo:','16:51:16','2019-11-04',1),(97,12,2,'HEllo:','16:53:12','2019-11-04',1),(98,12,2,'HEllo:','16:58:45','2019-11-04',1),(99,12,2,'HEllo:','16:59:28','2019-11-04',1),(100,12,2,'HEllo:','17:04:10','2019-11-04',1),(101,12,2,'HEllo:','17:11:22','2019-11-04',1),(102,12,2,'HEllo:','17:14:30','2019-11-04',1),(103,12,1,'HEllo:','17:15:29','2019-11-04',1),(104,12,2,'HEllo:','17:16:01','2019-11-04',1),(105,12,1,'HEllo:','16:36:15','2020-02-15',0),(106,12,1,'HEllo:','16:36:23','2020-02-15',0),(107,12,1,'HEllo:','16:36:30','2020-02-15',0),(108,12,1,'HEllo:','16:36:41','2020-02-15',0),(109,12,1,'HEllo:','16:36:53','2020-02-15',0),(110,12,1,'HEllo:','16:37:03','2020-02-15',0),(111,12,1,'HEllo:','16:37:07','2020-02-15',0),(112,111,1,'HEllo:','16:52:01','2020-02-15',1),(113,111,1,'HEllo:','16:52:21','2020-02-15',1),(114,111,1,'HEllo:','16:52:42','2020-02-15',1),(115,111,1,'HEllo:','16:52:50','2020-02-15',1),(116,111,1,'HEllo:','16:53:04','2020-02-15',1),(117,111,1,'HEllo:','16:53:23','2020-02-15',1),(118,111,1,'HEllo:','16:53:51','2020-02-15',1),(119,111,1,'HEllo:','16:54:01','2020-02-15',1),(120,12,1,'HEllo:','16:54:52','2020-02-15',0),(121,12,1,'HEllo:','16:54:57','2020-02-15',0),(122,12,1,'HEllo:','16:55:00','2020-02-15',0),(123,12,1,'HEllo:','16:55:03','2020-02-15',0),(124,12,1,'HEllo:','16:55:07','2020-02-15',0),(125,12,1,'HEllo:','16:55:22','2020-02-15',0),(126,111,1,'HEllo:','17:58:53','2020-02-15',1),(127,111,1,'HEllo:','18:04:20','2020-02-15',1),(128,111,1,'HEllo:','18:05:18','2020-02-15',1),(129,111,1,'HEllo:','18:06:16','2020-02-15',1),(130,111,1,'HEllo:','18:08:05','2020-02-15',1),(131,111,1,'HEllo:','18:09:48','2020-02-15',1),(132,111,1,'HEllo:','18:14:55','2020-02-15',1),(133,111,1,'HEllo:','18:35:03','2020-02-15',1),(134,111,11,'HEllo:','18:35:10','2020-02-15',1),(135,111,1,'HEllo:','18:45:23','2020-02-15',1),(136,111,11,'HEllo:','18:45:35','2020-02-15',1),(137,111,1,'HEllo:','18:45:53','2020-02-15',1),(138,111,11,'HEllo:','18:46:01','2020-02-15',1),(139,111,11,'HEllo:','18:47:20','2020-02-15',1),(140,111,1,'HEllo:','18:50:49','2020-02-15',0),(141,111,1,'HEllo:','18:50:52','2020-02-15',0),(142,111,1,'HEllo:','18:51:17','2020-02-15',0),(143,111,1,'HEllo:','18:52:22','2020-02-15',0),(144,111,1,'HEllo:','18:53:55','2020-02-15',0),(145,111,1,'HEllo:','18:53:56','2020-02-15',0),(146,111,1,'HEllo:','18:53:58','2020-02-15',0);
/*!40000 ALTER TABLE `massege` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` VALUES (10,'foto2_2',2,'foto2_2.png'),(11,'foto3_2',3,'foto3_2.png'),(15,'foto2_5',2,'foto2_5.png'),(16,'foto2_4',2,'foto2_4.png'),(17,'foto2_3',2,'foto2_3.png'),(18,'foto2_1',2,'foto2_1.png'),(20,'foto4_4',4,'foto4_4.png'),(21,'foto5_5',5,'foto5_5.png'),(22,'foto6_1',6,'foto6_1.png'),(23,'foto7_2',7,'foto7_2.png'),(25,'foto11_5',11,'foto11_5.png'),(26,'foto11_4',11,'foto11_4.png'),(27,'foto1_4',1,'foto1_4.png');
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questionary`
--

DROP TABLE IF EXISTS `questionary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questionary` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `orientation` varchar(20) NOT NULL,
  `location` varchar(25) NOT NULL,
  `age` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionary`
--

LOCK TABLES `questionary` WRITE;
/*!40000 ALTER TABLE `questionary` DISABLE KEYS */;
INSERT INTO `questionary` VALUES (6,1,'Sania','male','heterosexual','50.4705 30.4642','27','Kyiv','#hello #kek'),(7,2,'User','male','heterosexual','50.4705 30.4642','28','Chernihiv','#hello #bo #skaydaiving'),(8,3,'User2','male','heterosexual','50.4705 30.4642','30','Vishorod','#skaydaiving #ewtrwet'),(9,4,'holop','female','heterosexual','50.4705 30.4642','25','Kiev','#sky'),(10,5,'Ania','female','heterosexual','50.4705 30.4642','26','Donetsk','#sky'),(11,6,'Yaroslava','female','heterosexual','50.4705 30.4642','21','Lviv','#sky'),(12,7,'Lola','female','heterosexual','50.4705 30.4642','18','Odesa','#sky'),(13,8,'Angela','female','heterosexual','50.4690 30.4623','27','Kyiv','#hello'),(14,11,'Sania444','male','heterosexual','50.4705 30.4642','28','Kyiv','esr');
/*!40000 ALTER TABLE `questionary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trackvisit`
--

DROP TABLE IF EXISTS `trackvisit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trackvisit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_visit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trackvisit`
--

LOCK TABLES `trackvisit` WRITE;
/*!40000 ALTER TABLE `trackvisit` DISABLE KEYS */;
INSERT INTO `trackvisit` VALUES (5,1,2),(7,2,3),(8,3,2),(15,1,3),(17,3,1),(19,4,1),(20,7,1),(21,2,1),(22,6,1),(23,5,1),(24,1,8),(25,8,1),(26,0,1),(27,0,11),(28,1,11),(29,11,1),(30,3,11);
/*!40000 ALTER TABLE `trackvisit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userban`
--

DROP TABLE IF EXISTS `userban`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `who_banned` int(11) DEFAULT NULL,
  `who_was_banned` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userban`
--

LOCK TABLES `userban` WRITE;
/*!40000 ALTER TABLE `userban` DISABLE KEYS */;
INSERT INTO `userban` VALUES (2,5,1);
/*!40000 ALTER TABLE `userban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `act_email` int(10) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash_email` varchar(255) NOT NULL,
  `notification` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','7e66d1df5a1635675b5f7b3aac32ffe72595201b7a34145b1935d1807ba2a82034f42ebe260e304de193da50be464ff66a0b7b987141855cca5e706bb47f61a2',1,1,'virussania@gmail.com','61547a0d',1),(2,'User','cf09c171997917f5271ac2af9205e9d89333e127fcadfecf434399e9e127b645778bd0c36b8661f395af73b2b904d2f25287ec800e404c8e4118bc31521757de',0,1,'test@gmail.com','15116114114',1),(3,'Qwerty','3188bb70545482bc5ae2f9fe69ce5c883e39c26fa6066192181549119c224007543f867e6c70282d74915b414246763f48959ade839d7b23ff3a236d297c54eb',0,1,'beloh@click-email.com','b1aab3884250a9e9b7cbbb9c0e715f7fe85eeb367ebfcc1c8f33a11dcf6f2568146d1df7d3bd277ec4559807397ef8fa9a52d875ffc0f4545d4f473edc575542',1),(6,'Sania123','e58e7af344db4cedaae80b77b1743906453ea2e83b76a42d0d333ae3fc118f8051f20f3d7ea482c22a89477a6139a7c49ac70b8c58be8dc349f0c57b39fc1074',0,0,'igjreioj@iojhio.com','b488b3e46596f7539dbe12892b582bcc4c3f1fa2cacdcb6e2880aa190914d191b752d3e35613f0f8f5d362596afd458421d79f856a940aa6e2021482471e8524',0),(7,'Sania2222','6254142511e0df6b85953cc8da207169684f79f81fab40dc547068a603349f96cfe0ca0b03faee6eeec255ecbeafad05a0aa8062a6ba96f8d7acd98bce662b07',0,0,'Vi0rgj@gjior.com','a490b96c76d3ed08b0b31d0153620f624f5178fb11ea12aededbff82015a0edcc5661a82e7bafde5918def099eec6366432403cf8139496568a3472215d729b1',0),(11,'Sani4444','7e66d1df5a1635675b5f7b3aac32ffe72595201b7a34145b1935d1807ba2a82034f42ebe260e304de193da50be464ff66a0b7b987141855cca5e706bb47f61a2',0,1,'lefegot501@nwesmail.com','25137b8c052fa9298bf43f5b41dbe78b55ab3b38cc711147931c97a9a3b297a244f00097ce4b1782451d0d7d52706d52a97c949c6f29abfd972d065ee91a7a90',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-15 19:29:44
