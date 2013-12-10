CREATE DATABASE  IF NOT EXISTS `intermediate_1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `intermediate_1`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: intermediate_1
-- ------------------------------------------------------
-- Server version	5.5.33

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
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pic_url` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (11,'Alex','Gonzalez','a@g.com','upload/1.png','2013-12-10 10:54:43','2013-12-10 10:54:43'),(12,'Bobby','Flay','b@f.com','upload/2.png','2013-12-10 10:55:08','2013-12-10 10:55:08'),(13,'Michael','Anthony','M@A.com','upload/IMG_0163.jpg','2013-12-10 10:57:00','2013-12-10 10:57:00'),(14,'Don','Giovanni','j@p.com','upload/IMG_0084.jpg','2013-12-10 10:57:40','2013-12-10 10:57:40'),(15,'Rosemary','Chen','r@c.com','upload/---_0017.jpg','2013-12-10 11:04:31','2013-12-10 11:04:31');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (1,'nodeJS','2013-12-09 17:43:29','2013-12-09 17:43:29'),(2,'Ruby on Rails','2013-12-09 17:43:40','2013-12-09 17:43:40'),(3,'iOS','2013-12-09 17:43:44','2013-12-09 17:43:44'),(4,'Python','2013-12-09 17:43:46','2013-12-09 17:43:46'),(5,'PHP','2013-12-09 17:43:49','2013-12-09 17:43:49'),(6,'Database Design','2013-12-09 17:43:53','2013-12-09 17:43:53'),(7,'App Engine','2013-12-09 17:43:57','2013-12-09 17:43:57'),(8,'JavaScript','2013-12-09 17:44:01','2013-12-09 17:44:01'),(9,'SQL','2013-12-09 17:44:04','2013-12-09 17:44:04');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics_has_students`
--

DROP TABLE IF EXISTS `topics_has_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics_has_students` (
  `topics_id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  PRIMARY KEY (`topics_id`,`students_id`),
  KEY `fk_topics_has_students_students1_idx` (`students_id`),
  KEY `fk_topics_has_students_topics_idx` (`topics_id`),
  CONSTRAINT `fk_topics_has_students_topics` FOREIGN KEY (`topics_id`) REFERENCES `topics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_topics_has_students_students1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics_has_students`
--

LOCK TABLES `topics_has_students` WRITE;
/*!40000 ALTER TABLE `topics_has_students` DISABLE KEYS */;
INSERT INTO `topics_has_students` VALUES (1,11),(1,12),(2,12),(3,12),(1,13),(2,13),(3,13),(4,13),(5,13),(6,13),(7,13),(8,13),(9,13),(5,14),(6,14),(7,14),(8,14),(9,14),(5,15),(6,15),(8,15),(9,15);
/*!40000 ALTER TABLE `topics_has_students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-10 11:13:48
