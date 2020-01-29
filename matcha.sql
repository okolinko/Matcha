-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: matcha
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `like_users`
--

DROP TABLE IF EXISTS `like_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `like_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `likeUsers` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_users`
--

LOCK TABLES `like_users` WRITE;
/*!40000 ALTER TABLE `like_users` DISABLE KEYS */;
INSERT INTO `like_users` VALUES (1,1,'3,8,2'),(2,2,'3,1'),(4,3,'1,2'),(5,8,',1');
/*!40000 ALTER TABLE `like_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `massege`
--

DROP TABLE IF EXISTS `massege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `massege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` text NOT NULL,
  `date` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `massege`
--

LOCK TABLES `massege` WRITE;
/*!40000 ALTER TABLE `massege` DISABLE KEYS */;
INSERT INTO `massege` VALUES (1,12,1,'Hello','15:30:00','2019-06-20',1),(2,12,2,'hihi','13:53:29','2019-06-20',1),(30,12,1,'2\n','18:17:14','2019-06-21',1),(32,12,1,'2212','11:27:26','2019-06-21',1),(33,12,1,'првагш\n','15:53:33','2019-06-22',1),(34,12,1,'gfidhgu','15:57:25','2019-06-22',1),(35,12,2,'lol\r\n','16:56:28','2019-06-22',1),(37,13,1,'1','15:09:45','2019-06-26',1),(38,12,1,'test 555','15:55:09','2019-06-26',1),(60,13,3,'ewe','12:30:38','2019-06-29',1),(61,12,2,'12121','15:17:56','2019-07-06',1),(62,12,2,'helolo','15:22:04','2019-07-06',1),(75,12,1,'helo','18:24:47','2019-07-06',1),(79,12,1,'ðŸ˜¡','14:38:13','2019-10-29',1),(80,12,1,'ðŸ˜‚','14:38:34','2019-10-29',1),(81,12,1,'ðŸ™”ðŸ™™ðŸ™™ðŸ™™ðŸ™™','15:47:02','2019-10-29',1),(82,12,1,'&lt;script&gt;alert(&quot;HI&quot;)&lt;/script&gt;','15:47:42','2019-10-29',1),(83,12,1,'ðŸ™ˆ','15:48:40','2019-10-29',1),(84,12,1,'ðŸ˜™','18:13:01','2019-10-30',1),(85,18,1,'`1123','15:11:18','2019-10-31',1),(86,12,1,'ÐÐµ Ð¿Ð¾Ð´ÑÐºÐ°Ð¶ÐµÑˆÑŒ, ÐºÐ°Ðº Ð¿Ð¾Ð¼ÐµÐ½ÑÑ‚ÑŒ ÑÐ²ÐµÑ‡Ð¸/Ð¼Ð°ÑÐ»Ð¾ Ð² Â«Ð»ÑŽÐ±Ð°Ñ Ð¼Ð°Ñ€ÐºÐ° Ð°Ð²Ñ‚Ð¾Ð¼Ð¾Ð±Ð¸Ð»ÑÂ»?ðŸ™Œ','17:21:13','2019-10-31',1),(87,12,1,'ÐŸÐ¾Ð¼Ð½Ð¸ÑˆÑŒ Ð¼ÐµÐ½Ñ? Ð¯ Ð¸Ð· Ñ‚Ð²Ð¾Ð¸Ñ… ÑÐ½Ð¾Ð². ÐŸÑ€Ð°Ð²Ð´Ð°, ÐºÐ¾Ð³Ð´Ð° Ð¼Ñ‹ Ð²ÑÑ‚Ñ€ÐµÑ‡Ð°Ð»Ð¸ÑÑŒ, Ñ Ð±Ñ‹Ð» Ð½Ð° Ð±ÐµÐ»Ð¾Ð¼ ÐºÐ¾Ð½Ðµ Ð¸ Ð² Ð´Ð¾ÑÐ¿ÐµÑ…Ð°Ñ….','17:22:41','2019-10-31',1),(88,1,1,'','15:54:44','2019-11-04',0),(89,12,1,'hi','15:54:56','2019-11-04',1),(90,1,1,'','15:55:37','2019-11-04',0),(91,1,1,'','15:56:28','2019-11-04',0),(92,1,1,'','15:56:33','2019-11-04',0),(93,1,1,'','15:56:37','2019-11-04',0),(94,1,1,'','15:56:53','2019-11-04',0),(95,12,2,'ðŸ˜¡','16:50:59','2019-11-04',1),(96,12,2,'ðŸ˜ ðŸ˜ ','16:51:16','2019-11-04',1),(97,12,2,'ðŸ˜‚ðŸ˜‚','16:53:12','2019-11-04',1),(98,12,2,'ðŸ˜‚ðŸ˜','16:58:45','2019-11-04',1),(99,12,2,'Ð”ÐµÐ²ÑƒÑˆÐºÐ°, Ñ Ñ‚Ð¾Ð½Ñƒ Ð² Ð²Ð°ÑˆÐ¸Ñ… Ð±ÐµÐ·Ð´Ð¾Ð½Ð½Ñ‹Ñ… Ð³Ð»Ð°Ð·Ð°Ñ…. ÐŸÐ¾Ð¼Ð¾Ð³Ð¸Ñ‚Ðµ Ð¶Ðµ Ð¼Ð½Ðµ.','16:59:28','2019-11-04',1),(100,12,2,'ðŸ˜‘ðŸ˜‘ðŸ˜‘','17:04:10','2019-11-04',1),(101,12,2,'ðŸ™ˆ','17:11:22','2019-11-04',1),(102,12,2,'ðŸ˜‡','17:14:30','2019-11-04',1),(103,12,1,'ðŸ˜·','17:15:29','2019-11-04',1),(104,12,2,'ðŸ™Š','17:16:01','2019-11-04',1);
/*!40000 ALTER TABLE `massege` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` VALUES (6,'foto1_2',1,'foto1_2.png'),(9,'foto1_1',1,'foto1_1.png'),(10,'foto2_2',2,'foto2_2.png'),(11,'foto3_2',3,'foto3_2.png'),(15,'foto2_5',2,'foto2_5.png'),(16,'foto2_4',2,'foto2_4.png'),(17,'foto2_3',2,'foto2_3.png'),(18,'foto2_1',2,'foto2_1.png'),(19,'foto1_4',1,'foto1_4.png'),(20,'foto4_4',4,'foto4_4.png'),(21,'foto5_5',5,'foto5_5.png'),(22,'foto6_1',6,'foto6_1.png'),(23,'foto7_2',7,'foto7_2.png');
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questionary`
--

DROP TABLE IF EXISTS `questionary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionary`
--

LOCK TABLES `questionary` WRITE;
/*!40000 ALTER TABLE `questionary` DISABLE KEYS */;
INSERT INTO `questionary` VALUES (6,1,'Sania','male','heterosexual','50.4704 30.6219','27','Kyiv','#??????? #????? ??????  #??????????????'),(7,2,'User','male','heterosexual','50.4705 30.4642','28','Chernihiv','#hello #bo #skaydaiving'),(8,3,'User2','male','heterosexual','50.4705 30.4642','30','Vishorod','#skaydaiving #ewtrwet'),(9,4,'holop','female','heterosexual','50.4705 30.4642','25','Kiev','#sky'),(10,5,'Ania','female','heterosexual','50.4705 30.4642','26','Donetsk','#sky'),(11,6,'Yaroslava','female','heterosexual','50.4705 30.4642','21','Lviv','#sky'),(12,7,'Lola','female','heterosexual','50.4705 30.4642','18','Odesa','#sky'),(13,8,'Angela','female','heterosexual','50.4690 30.4623','27','Kyiv','#hello');
/*!40000 ALTER TABLE `questionary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trackvisit`
--

DROP TABLE IF EXISTS `trackvisit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `trackvisit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_visit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trackvisit`
--

LOCK TABLES `trackvisit` WRITE;
/*!40000 ALTER TABLE `trackvisit` DISABLE KEYS */;
INSERT INTO `trackvisit` VALUES (5,1,2),(7,2,3),(8,3,2),(15,1,3),(17,3,1),(19,4,1),(20,7,1),(21,2,1),(22,6,1),(23,5,1),(24,1,8),(25,8,1);
/*!40000 ALTER TABLE `trackvisit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userban`
--

DROP TABLE IF EXISTS `userban`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `userban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `who_banned` int(11) DEFAULT NULL,
  `who_was_banned` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
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
/*!40101 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','cf09c171997917f5271ac2af9205e9d89333e127fcadfecf434399e9e127b645778bd0c36b8661f395af73b2b904d2f25287ec800e404c8e4118bc31521757de',1,1,'virussania@gmail.com','61547a0d',1),(2,'User','cf09c171997917f5271ac2af9205e9d89333e127fcadfecf434399e9e127b645778bd0c36b8661f395af73b2b904d2f25287ec800e404c8e4118bc31521757de',0,1,'test@gmail.com','15116114114',1),(3,'Qwerty','3188bb70545482bc5ae2f9fe69ce5c883e39c26fa6066192181549119c224007543f867e6c70282d74915b414246763f48959ade839d7b23ff3a236d297c54eb',0,1,'beloh@click-email.com','b1aab3884250a9e9b7cbbb9c0e715f7fe85eeb367ebfcc1c8f33a11dcf6f2568146d1df7d3bd277ec4559807397ef8fa9a52d875ffc0f4545d4f473edc575542',1),(6,'Sania123','e58e7af344db4cedaae80b77b1743906453ea2e83b76a42d0d333ae3fc118f8051f20f3d7ea482c22a89477a6139a7c49ac70b8c58be8dc349f0c57b39fc1074',0,0,'igjreioj@iojhio.com','b488b3e46596f7539dbe12892b582bcc4c3f1fa2cacdcb6e2880aa190914d191b752d3e35613f0f8f5d362596afd458421d79f856a940aa6e2021482471e8524',0),(7,'Sania2222','6254142511e0df6b85953cc8da207169684f79f81fab40dc547068a603349f96cfe0ca0b03faee6eeec255ecbeafad05a0aa8062a6ba96f8d7acd98bce662b07',0,0,'Vi0rgj@gjior.com','a490b96c76d3ed08b0b31d0153620f624f5178fb11ea12aededbff82015a0edcc5661a82e7bafde5918def099eec6366432403cf8139496568a3472215d729b1',0);
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

-- Dump completed on 2019-11-04 17:21:53
