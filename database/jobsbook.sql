-- MySQL dump 10.13  Distrib 5.6.30, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: jobsbook
-- ------------------------------------------------------
-- Server version	5.6.30-1

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
-- Table structure for table `yh_admin`
--

DROP TABLE IF EXISTS `yh_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yh_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_fname` varchar(30) NOT NULL,
  `admin_lname` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yh_admin`
--

LOCK TABLES `yh_admin` WRITE;
/*!40000 ALTER TABLE `yh_admin` DISABLE KEYS */;
INSERT INTO `yh_admin` VALUES (1,'Admin','User','admin@gmail.com','81fb0d4fcb80cfe3bb4c86919e4173f0ca3b3361657fb48223ef10a950c9db23');
/*!40000 ALTER TABLE `yh_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yh_chat`
--

DROP TABLE IF EXISTS `yh_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yh_chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `from` (`from`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yh_chat`
--

LOCK TABLES `yh_chat` WRITE;
/*!40000 ALTER TABLE `yh_chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `yh_chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yh_chats`
--

DROP TABLE IF EXISTS `yh_chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yh_chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `message_read` tinyint(1) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `sent` tinyint(1) NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yh_chats`
--

LOCK TABLES `yh_chats` WRITE;
/*!40000 ALTER TABLE `yh_chats` DISABLE KEYS */;
/*!40000 ALTER TABLE `yh_chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yh_grades`
--

DROP TABLE IF EXISTS `yh_grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yh_grades` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(50) NOT NULL,
  `grade_color` varchar(50) DEFAULT NULL,
  `grade_status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yh_grades`
--

LOCK TABLES `yh_grades` WRITE;
/*!40000 ALTER TABLE `yh_grades` DISABLE KEYS */;
INSERT INTO `yh_grades` VALUES (1,'Grade 1','#408080','1'),(2,'Grade 2','#008000','1'),(3,'Grade 3','#ff00ff','1'),(4,'Grade 4','#008022','1');
/*!40000 ALTER TABLE `yh_grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yh_jobs`
--

DROP TABLE IF EXISTS `yh_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yh_jobs` (
  `job_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_desc` text NOT NULL,
  `start_date` date NOT NULL,
  `deadline_date` date NOT NULL,
  `date_entered` date NOT NULL,
  `assigned_to` tinyint(1) NOT NULL DEFAULT '0',
  `job_status` enum('0','1') NOT NULL DEFAULT '1',
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yh_jobs`
--

LOCK TABLES `yh_jobs` WRITE;
/*!40000 ALTER TABLE `yh_jobs` DISABLE KEYS */;
INSERT INTO `yh_jobs` VALUES (3,1,'Job1','dsnklsa.dsam.sad.m.sad','2016-06-26','2016-06-25','2016-06-26',0,'1',1),(4,2,'Job 2','Job 2','2016-07-04','2016-07-30','2016-07-04',1,'1',1),(5,3,'Job 3','Job 3','2016-07-04','2016-08-31','2016-07-04',1,'1',1),(6,4,'Job 4','Job 4','2016-07-04','2016-08-17','2016-07-04',1,'1',1),(7,2,'New job','New job','2016-07-13','2016-07-02','2016-07-13',0,'1',1),(8,1,'Job new','Job new','2016-07-16','2016-07-30','2016-07-16',0,'1',1);
/*!40000 ALTER TABLE `yh_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yh_jobs_files`
--

DROP TABLE IF EXISTS `yh_jobs_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yh_jobs_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `file_address` varchar(500) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yh_jobs_files`
--

LOCK TABLES `yh_jobs_files` WRITE;
/*!40000 ALTER TABLE `yh_jobs_files` DISABLE KEYS */;
INSERT INTO `yh_jobs_files` VALUES (9,3,'Chrysanthemum.jpg','Chrysanthemum',1),(10,4,'Chrysanthemum.jpg','Chrysanthemum',1),(11,5,'Penguins.jpg','Penguins',1),(12,6,'Jellyfish.jpg','Jellyfish',1),(13,7,'Desert.jpg','Desert',0),(14,7,'Hydrangeas.jpg','Hydrangeas',0),(15,7,'Penguins.jpg','Penguins',0),(16,7,'Koala.jpg','Koala',1),(17,7,'Lighthouse.jpg','Lighthouse',1),(18,7,'Tulips.jpg','Tulips',1),(19,8,'Chrys anthe mum.jpg','Chrys anthe mum',1);
/*!40000 ALTER TABLE `yh_jobs_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yh_user_to_jobs`
--

DROP TABLE IF EXISTS `yh_user_to_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yh_user_to_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `no_of_hours` int(15) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `rejected` tinyint(1) NOT NULL DEFAULT '0',
  `rejection_reason` varchar(500) DEFAULT NULL,
  `viewed` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yh_user_to_jobs`
--

LOCK TABLES `yh_user_to_jobs` WRITE;
/*!40000 ALTER TABLE `yh_user_to_jobs` DISABLE KEYS */;
INSERT INTO `yh_user_to_jobs` VALUES (3,2,4,'2016-07-01','2016-07-30',20,1,0,NULL,1),(6,2,5,'2016-07-01','2016-07-30',27,1,0,'Due to lack of Education',1),(8,1,6,'2016-07-01','2016-07-30',20,3,0,'Due to lack of Education',1),(9,1,5,'2016-07-02','2016-08-31',20,2,0,NULL,1),(10,1,3,'2016-07-02','2016-07-30',20,0,0,'Due to lack of Education',1),(11,1,4,'2016-07-16','2016-07-30',16,0,0,NULL,1),(12,1,8,'2016-07-23','2016-07-30',15,0,0,NULL,1),(13,1,7,'2016-07-01','2016-07-30',15,0,0,NULL,1);
/*!40000 ALTER TABLE `yh_user_to_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yh_users`
--

DROP TABLE IF EXISTS `yh_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yh_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) NOT NULL DEFAULT '0',
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `online` enum('1','0') NOT NULL DEFAULT '1',
  `profile_status` enum('0','1') NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yh_users`
--

LOCK TABLES `yh_users` WRITE;
/*!40000 ALTER TABLE `yh_users` DISABLE KEYS */;
INSERT INTO `yh_users` VALUES (1,1,'Sipmle','User 1','user1@gmail.com','81fb0d4fcb80cfe3bb4c86919e4173f0ca3b3361657fb48223ef10a950c9db23','','1','1',1),(2,2,'Simple','User 2','user2@gmail.com','81fb0d4fcb80cfe3bb4c86919e4173f0ca3b3361657fb48223ef10a950c9db23','','1','1',1);
/*!40000 ALTER TABLE `yh_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-25 21:22:56
