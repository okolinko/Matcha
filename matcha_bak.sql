-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: matcha
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `massege`
--

LOCK TABLES `massege` WRITE;
/*!40000 ALTER TABLE `massege` DISABLE KEYS */;
INSERT INTO `massege` VALUES (1,12,1,' loh','15:30:00','2019-06-20',1),(2,12,2,' loh','13:53:29','2019-06-20',1),(30,12,1,' loh','18:17:14','2019-06-21',1),(32,12,1,' loh','11:27:26','2019-06-21',1),(33,12,1,' loh','15:53:33','2019-06-22',1),(34,12,1,' loh','15:57:25','2019-06-22',1),(35,12,2,' loh','16:56:28','2019-06-22',1),(37,13,1,' loh','15:09:45','2019-06-26',1),(38,12,1,' loh','15:55:09','2019-06-26',1),(60,13,3,' loh','12:30:38','2019-06-29',1),(61,12,2,' loh','15:17:56','2019-07-06',1),(62,12,2,' loh','15:22:04','2019-07-06',1),(75,12,1,' loh','18:24:47','2019-07-06',1),(79,12,1,' loh','14:38:13','2019-10-29',1),(80,12,1,' loh','14:38:34','2019-10-29',1),(81,12,1,' loh','15:47:02','2019-10-29',1),(82,12,1,' loh','15:47:42','2019-10-29',1),(83,12,1,' loh','15:48:40','2019-10-29',1),(84,12,1,' loh','18:13:01','2019-10-30',1),(85,18,1,' loh','15:11:18','2019-10-31',1),(86,12,1,' loh','17:21:13','2019-10-31',1),(87,12,1,' loh','17:22:41','2019-10-31',1),(88,1,1,' loh','15:54:44','2019-11-04',0),(89,12,1,' loh','15:54:56','2019-11-04',1),(90,1,1,' loh','15:55:37','2019-11-04',0),(91,1,1,' loh','15:56:28','2019-11-04',0),(92,1,1,' loh','15:56:33','2019-11-04',0),(93,1,1,' loh','15:56:37','2019-11-04',0),(94,1,1,' loh','15:56:53','2019-11-04',0),(95,12,2,' loh','16:50:59','2019-11-04',1),(96,12,2,' loh','16:51:16','2019-11-04',1),(97,12,2,' loh','16:53:12','2019-11-04',1),(98,12,2,' loh','16:58:45','2019-11-04',1),(99,12,2,' loh','16:59:28','2019-11-04',1),(100,12,2,' loh','17:04:10','2019-11-04',1),(101,12,2,' loh','17:11:22','2019-11-04',1),(102,12,2,' loh','17:14:30','2019-11-04',1),(103,12,1,' loh','17:15:29','2019-11-04',1),(104,12,2,' loh','17:16:01','2019-11-04',1),(105,12,2,' loh','17:57:25','2020-01-27',1),(106,12,1,' loh','16:25:30','2020-01-29',1),(107,12,1,' loh','16:53:11','2020-02-04',1),(108,12,1,' loh','16:53:22','2020-02-04',1),(109,12,1,' loh','16:53:42','2020-02-04',1),(110,12,2,' loh','19:57:04','2020-02-04',1),(111,12,1,' loh','19:58:49','2020-02-04',1),(112,12,2,' loh','19:58:58','2020-02-04',1),(113,12,2,' loh','19:59:06','2020-02-04',1),(114,12,2,' loh','20:10:32','2020-02-04',1),(115,12,2,' loh','20:10:56','2020-02-04',1),(116,12,2,'ðŸ˜¢','20:20:44','2020-02-04',1),(117,12,2,'ÐÐ°Ð·Ð¾Ð²Ð¸ ÑÐ²Ð¾Ð¹ Ð»ÑŽÐ±Ð¸Ð¼Ñ‹Ð¹ Ñ„Ð¸Ð»ÑŒÐ¼. Ð’Ð¾Ð·Ð¼Ð¾Ð¶Ð½Ð¾, Ð¸Ð¼ÐµÐ½Ð½Ð¾ ÐµÐ³Ð¾ Ñ Ð¿Ð¾ÑÐ¼Ð¾Ñ‚Ñ€ÑŽ ÑÐµÐ³Ð¾Ð´Ð½Ñ Ð²ÐµÑ‡ÐµÑ€Ð¾Ð¼.','20:21:24','2020-02-04',1),(118,12,2,'Ð§Ñ‚Ð¾ Ð´Ð¾Ð»Ð¶ÐµÐ½ Ð½Ð°Ð¿Ð¸ÑÐ°Ñ‚ÑŒ Ð¸Ð½Ñ‚ÐµÑ€ÐµÑÐ½Ñ‹Ð¹ Ð¿Ð°Ñ€ÐµÐ½ÑŒ Ð¾Ñ‡ÐµÐ½ÑŒ ÐºÑ€Ð°ÑÐ¸Ð²Ð¾Ð¹ Ð´ÐµÐ²ÑƒÑˆÐºÐµ, Ñ‡Ñ‚Ð¾Ð±Ñ‹ Ð¾Ð½Ð° Ñ Ð½Ð¸Ð¼ Ð¿Ð¾Ð·Ð½Ð°ÐºÐ¾Ð¼Ð¸Ð»Ð°ÑÑŒ?','20:21:34','2020-02-04',1),(119,12,2,'kek\n','20:23:51','2020-02-04',1),(120,12,1,'ter','12:25:11','2020-02-05',1),(121,12,2,'lol\n','12:36:29','2020-02-05',1),(122,12,1,'asdfasdf','12:37:13','2020-02-05',1),(123,12,1,'asdf','12:38:06','2020-02-05',1),(124,12,1,'asdf\n','12:38:25','2020-02-05',1),(125,12,1,'loh pidor\n','12:38:53','2020-02-05',1),(126,12,2,'gandon\n','12:39:17','2020-02-05',1),(127,12,1,'1\n','12:39:46','2020-02-05',1),(128,12,1,'kek\n','12:45:10','2020-02-05',1),(129,12,1,'test\n','12:46:49','2020-02-05',1),(130,12,1,'ttttt\n','12:49:35','2020-02-05',1),(131,12,1,'tttttttt','12:50:15','2020-02-05',1),(132,12,1,'123\n','12:52:01','2020-02-05',1),(133,12,1,'asdfasdfasdfasdf','12:53:10','2020-02-05',1),(134,12,1,'123fasdf','12:54:24','2020-02-05',1),(135,12,1,'ðŸ˜“','12:56:41','2020-02-05',1),(136,12,1,'ðŸ˜‚','12:56:55','2020-02-05',1),(137,12,1,'asdf','12:56:59','2020-02-05',1),(138,12,1,'asdfasdf','12:58:58','2020-02-05',1),(139,12,1,'ttt','13:02:17','2020-02-05',1),(140,12,1,'asdffggg','13:03:17','2020-02-05',1),(141,12,1,'123','13:04:29','2020-02-05',1),(142,12,1,'&lt;script&gt;alert(1)&lt;/script&gt;\n','13:07:38','2020-02-05',1),(143,12,1,'&lt;script&gt;alert(1)&lt;/script&gt;','13:09:00','2020-02-05',1),(144,12,1,'asdfasdf','13:11:08','2020-02-05',1),(145,12,1,'asdfsdf','13:11:44','2020-02-05',1),(146,12,1,'\n','13:36:51','2020-02-05',1),(147,12,1,'asdfasdfasdf','13:40:02','2020-02-05',1),(148,12,1,'\n','13:41:22','2020-02-05',1),(149,12,1,'konkretno dlay testa','13:41:47','2020-02-05',1),(150,12,1,'cheburek','13:46:03','2020-02-05',1),(151,12,1,'asdf','13:47:20','2020-02-05',1),(152,12,1,'asdf','13:47:26','2020-02-05',1),(153,12,1,'asdf','13:55:03','2020-02-05',1),(154,12,1,'asdf','14:01:11','2020-02-05',1),(155,12,1,'asdf','14:06:27','2020-02-05',1),(156,12,1,'asdfasdf','14:10:08','2020-02-05',1),(157,12,1,'asdf','14:10:49','2020-02-05',1),(158,12,1,'asdf','14:12:20','2020-02-05',1),(159,12,1,'asdf','14:14:02','2020-02-05',1),(160,12,1,'asdfasdfasdf','14:14:07','2020-02-05',1),(161,12,1,'asdfasdfasdf','14:14:56','2020-02-05',1),(162,12,1,'asdfasdf','14:15:55','2020-02-05',1),(163,12,1,'retre','14:16:13','2020-02-05',1),(164,12,1,'ðŸ˜€','15:48:30','2020-02-05',1),(165,12,1,'ðŸ˜†','17:42:17','2020-02-05',1),(166,12,1,'ðŸ˜ƒ','12:34:14','2020-02-06',1),(167,12,1,'ðŸ˜ˆ','12:34:19','2020-02-06',1),(168,12,1,'ðŸ˜ƒ','12:46:06','2020-02-06',1),(169,12,2,'ðŸ˜…','12:46:16','2020-02-06',1),(170,12,1,'ðŸ˜ƒ','13:05:15','2020-02-06',1),(171,12,1,'ðŸ˜‡','13:06:27','2020-02-06',1),(172,12,1,'ðŸ˜ˆ','13:07:45','2020-02-06',1),(173,12,1,'yutyuy','13:09:36','2020-02-06',1),(174,12,1,'ðŸ˜†','13:09:57','2020-02-06',1),(175,12,1,'ðŸ˜¡','13:10:21','2020-02-06',1),(176,12,1,'ðŸ˜¹','13:10:39','2020-02-06',1),(177,12,1,'ðŸ™','13:13:03','2020-02-06',1),(178,12,1,'ðŸ™‰','13:14:29','2020-02-06',1),(179,12,1,'ðŸ˜ª','13:17:33','2020-02-06',1),(180,12,1,'ðŸ˜¾','13:22:23','2020-02-06',1),(181,12,1,'ðŸ˜’','13:22:38','2020-02-06',1),(182,12,2,'ðŸ˜ˆ','13:22:48','2020-02-06',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` VALUES (10,'foto2_2',2,'foto2_2.png'),(11,'foto3_2',3,'foto3_2.png'),(15,'foto2_5',2,'foto2_5.png'),(16,'foto2_4',2,'foto2_4.png'),(17,'foto2_3',2,'foto2_3.png'),(18,'foto2_1',2,'foto2_1.png'),(20,'foto4_4',4,'foto4_4.png'),(21,'foto5_5',5,'foto5_5.png'),(22,'foto6_1',6,'foto6_1.png'),(23,'foto7_2',7,'foto7_2.png'),(32,'foto1_5',1,'foto1_5.png');
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trackvisit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_visit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trackvisit`
--

LOCK TABLES `trackvisit` WRITE;
/*!40000 ALTER TABLE `trackvisit` DISABLE KEYS */;
INSERT INTO `trackvisit` VALUES (5,1,2),(7,2,3),(8,3,2),(15,1,3),(17,3,1),(19,4,1),(20,7,1),(21,2,1),(22,6,1),(23,5,1),(24,1,8),(25,8,1),(26,0,1),(27,0,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','7e66d1df5a1635675b5f7b3aac32ffe72595201b7a34145b1935d1807ba2a82034f42ebe260e304de193da50be464ff66a0b7b987141855cca5e706bb47f61a2',1,1,'virussania@gmail.com','61547a0d',1),(2,'User','7e66d1df5a1635675b5f7b3aac32ffe72595201b7a34145b1935d1807ba2a82034f42ebe260e304de193da50be464ff66a0b7b987141855cca5e706bb47f61a2',0,1,'test@gmail.com','15116114114',1),(3,'Qwerty','3188bb70545482bc5ae2f9fe69ce5c883e39c26fa6066192181549119c224007543f867e6c70282d74915b414246763f48959ade839d7b23ff3a236d297c54eb',0,1,'beloh@click-email.com','b1aab3884250a9e9b7cbbb9c0e715f7fe85eeb367ebfcc1c8f33a11dcf6f2568146d1df7d3bd277ec4559807397ef8fa9a52d875ffc0f4545d4f473edc575542',1),(6,'Sania123','e58e7af344db4cedaae80b77b1743906453ea2e83b76a42d0d333ae3fc118f8051f20f3d7ea482c22a89477a6139a7c49ac70b8c58be8dc349f0c57b39fc1074',0,0,'igjreioj@iojhio.com','b488b3e46596f7539dbe12892b582bcc4c3f1fa2cacdcb6e2880aa190914d191b752d3e35613f0f8f5d362596afd458421d79f856a940aa6e2021482471e8524',0),(7,'Sania2222','6254142511e0df6b85953cc8da207169684f79f81fab40dc547068a603349f96cfe0ca0b03faee6eeec255ecbeafad05a0aa8062a6ba96f8d7acd98bce662b07',0,0,'Vi0rgj@gjior.com','a490b96c76d3ed08b0b31d0153620f624f5178fb11ea12aededbff82015a0edcc5661a82e7bafde5918def099eec6366432403cf8139496568a3472215d729b1',0);
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

-- Dump completed on 2020-02-06 14:38:00
