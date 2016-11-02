-- MySQL dump 10.13  Distrib 5.7.15, for Linux (x86_64)
--
-- Host: localhost    Database: lmjfdb
-- ------------------------------------------------------
-- Server version	5.7.15-0ubuntu0.16.04.1

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
-- Table structure for table `Absence`
--

DROP TABLE IF EXISTS `Absence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Absence` (
  `studentMatricule` varchar(45) NOT NULL,
  `TimePeriodID` int(11) NOT NULL,
  `Date` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`studentMatricule`,`TimePeriodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Absence`
--

LOCK TABLES `Absence` WRITE;
/*!40000 ALTER TABLE `Absence` DISABLE KEYS */;
/*!40000 ALTER TABLE `Absence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AverageGrade`
--

DROP TABLE IF EXISTS `AverageGrade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AverageGrade` (
  `studentMatricule` int(11) NOT NULL,
  `semestreID` int(11) NOT NULL,
  `comitteeAppreciation` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `NbrStudent` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`studentMatricule`,`semestreID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AverageGrade`
--

LOCK TABLES `AverageGrade` WRITE;
/*!40000 ALTER TABLE `AverageGrade` DISABLE KEYS */;
/*!40000 ALTER TABLE `AverageGrade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Classroom`
--

DROP TABLE IF EXISTS `Classroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Classroom` (
  `classRoomID` int(11) NOT NULL AUTO_INCREMENT,
  `classRomLocationName` varchar(45) DEFAULT NULL,
  `typeClassRoom` varchar(45) DEFAULT NULL,
  `BuildingLevel` varchar(45) DEFAULT NULL,
  `ClassRoomName` varchar(45) DEFAULT NULL,
  `ClassRoomDescription` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`classRoomID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Classroom`
--

LOCK TABLES `Classroom` WRITE;
/*!40000 ALTER TABLE `Classroom` DISABLE KEYS */;
INSERT INTO `Classroom` VALUES (1,NULL,NULL,NULL,'6ème1',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(2,NULL,NULL,NULL,'6ème2',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(3,NULL,NULL,NULL,'6ème3',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(4,NULL,NULL,NULL,'6ème4',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(5,NULL,NULL,NULL,'6ème5',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(6,NULL,NULL,NULL,'6ème6',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(7,NULL,NULL,NULL,'6ème7',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(8,NULL,NULL,NULL,'6ème8',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(9,NULL,NULL,NULL,'6ème9',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(10,NULL,NULL,NULL,'6ème10',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(11,NULL,NULL,NULL,'5ème1',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(12,NULL,NULL,NULL,'5ème2',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(13,NULL,NULL,NULL,'5ème3',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(14,NULL,NULL,NULL,'5ème4',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(15,NULL,NULL,NULL,'5ème5',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(16,NULL,NULL,NULL,'4ème1',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(17,NULL,NULL,NULL,'4ème2',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(18,NULL,NULL,NULL,'4ème3',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(19,NULL,NULL,NULL,'4ème4',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(20,NULL,NULL,NULL,'4ème5',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(21,NULL,NULL,NULL,'3ème1',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(22,NULL,NULL,NULL,'3ème2',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(23,NULL,NULL,NULL,'3ème3',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(24,NULL,NULL,NULL,'3ème4',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(25,NULL,NULL,NULL,'3ème5',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(26,NULL,'litteraire',NULL,'2ndA1',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(27,NULL,'litteraire',NULL,'2ndA2',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(28,NULL,'scientifique',NULL,'1èreA1',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(29,NULL,'scientifique',NULL,'1èreA2',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(30,NULL,'scientifique',NULL,'1èreC1',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(31,NULL,'scientifique',NULL,'1èreC2',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(32,NULL,'scientifique',NULL,'1èreD1',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(33,NULL,'scientifique',NULL,'1èreD2',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(34,NULL,'litteraire',NULL,'TleA1',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(35,NULL,'litteraire',NULL,'TleA2',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(36,NULL,'scientifique',NULL,'TleD1',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(37,NULL,'scientifique',NULL,'TleD2',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(38,NULL,'scientifique',NULL,'TleC1',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37'),(39,NULL,'scientifique',NULL,'TleC2',NULL,'2016-10-15 18:35:37','2016-10-15 18:35:37');
/*!40000 ALTER TABLE `Classroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Course`
--

DROP TABLE IF EXISTS `Course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Course` (
  `courseID` int(11) NOT NULL AUTO_INCREMENT,
  `cycleID` int(11) DEFAULT NULL,
  `courseName` varchar(45) DEFAULT NULL,
  `courseDescription` varchar(45) DEFAULT NULL,
  `courseCoeff` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Course`
--

LOCK TABLES `Course` WRITE;
/*!40000 ALTER TABLE `Course` DISABLE KEYS */;
INSERT INTO `Course` VALUES (1,1,'FRANÇAIS',NULL,'1','2016-10-15 21:07:37','2016-10-15 21:07:37'),(2,1,'ANGLAIS',NULL,'1','2016-10-15 21:07:37','2016-10-15 21:07:37'),(3,1,'HISTOIRE-GÉOGRAPHIE',NULL,'1','2016-10-15 21:07:37','2016-10-15 21:07:37'),(4,1,'ALLEMAND',NULL,'1','2016-10-15 21:07:37','2016-10-15 21:07:37'),(5,1,'ESPAGNOL',NULL,'1','2016-10-15 21:07:37','2016-10-15 21:07:37'),(6,1,'PHILOSOPHIE',NULL,'1','2016-10-15 21:07:37','2016-10-15 21:07:37'),(7,1,'MATHÉMATIQUES',NULL,'1','2016-10-15 21:07:37','2016-10-15 21:07:37'),(8,1,'PHYSIQUE - CHIMIE',NULL,'1','2016-10-15 21:07:37','2016-10-15 21:07:37'),(9,1,'SCIENCES DE LA VIE ET DE LA TERRE',NULL,'1','2016-10-15 21:07:37','2016-10-15 21:07:37'),(10,1,'EDUCATION PHYSIQUE ET SPORTIVE',NULL,'1','2016-10-15 21:07:37','2016-10-15 21:07:37'),(11,1,'MUSIQUE',NULL,'1','2016-10-15 21:09:11','2016-10-15 21:09:11'),(12,1,'CONDUITE',NULL,'1','2016-10-15 21:09:11','2016-10-15 21:09:11'),(13,1,'Education des Droits de l\'Homme',NULL,'1','2016-10-15 21:07:37','2016-10-15 21:07:37');
/*!40000 ALTER TABLE `Course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CourseChild`
--

DROP TABLE IF EXISTS `CourseChild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CourseChild` (
  `CourseChildID` int(11) NOT NULL AUTO_INCREMENT,
  `courseID` int(11) NOT NULL,
  `labelCourse` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`CourseChildID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CourseChild`
--

LOCK TABLES `CourseChild` WRITE;
/*!40000 ALTER TABLE `CourseChild` DISABLE KEYS */;
INSERT INTO `CourseChild` VALUES (1,1,'Expression écrite','2016-10-15 18:35:37','2016-10-15 18:35:37'),(2,1,'Expression orale','2016-10-15 18:35:37','2016-10-15 18:35:37'),(3,1,'Orthographe','2016-10-15 18:35:37','2016-10-15 18:35:37');
/*!40000 ALTER TABLE `CourseChild` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CourseSchedule`
--

DROP TABLE IF EXISTS `CourseSchedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CourseSchedule` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` int(11) NOT NULL,
  `TimePeriodID` int(11) NOT NULL,
  `ClassRoomID` int(11) NOT NULL,
  `TeacherID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CourseSchedule`
--

LOCK TABLES `CourseSchedule` WRITE;
/*!40000 ALTER TABLE `CourseSchedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `CourseSchedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cycle`
--

DROP TABLE IF EXISTS `Cycle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cycle` (
  `cycleID` int(11) NOT NULL AUTO_INCREMENT,
  `cycleName` varchar(45) DEFAULT NULL,
  `typeCycle` varchar(45) DEFAULT NULL,
  `cycleDescription` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cycleID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cycle`
--

LOCK TABLES `Cycle` WRITE;
/*!40000 ALTER TABLE `Cycle` DISABLE KEYS */;
INSERT INTO `Cycle` VALUES (1,'1er Cycle','-','Premier cycle des lycées et collèges','2016-10-15 18:35:37','2016-10-15 18:35:37'),(2,'2nd Cycle','scientifique','Second cycle des lycées et collèges','2016-10-15 18:35:37','2016-10-15 18:35:37'),(3,'2nd Cycle','litteraire','Second cycle des lycées et collèges','2016-10-15 18:35:37','2016-10-15 18:35:37');
/*!40000 ALTER TABLE `Cycle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Parent`
--

DROP TABLE IF EXISTS `Parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Parent` (
  `parentID` int(11) NOT NULL AUTO_INCREMENT,
  `parentFistName` varchar(45) DEFAULT NULL,
  `parentLastName` varchar(255) DEFAULT NULL,
  `parentPassword` varchar(45) DEFAULT NULL,
  `parentTelephone` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`parentID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Parent`
--

LOCK TABLES `Parent` WRITE;
/*!40000 ALTER TABLE `Parent` DISABLE KEYS */;
INSERT INTO `Parent` VALUES (1,'AHOUTOU','MARK','lmjfb','123','2016-10-18 07:31:52','2016-10-18 07:31:52'),(2,'AHOUTOU','MARK','lmjfb','123','2016-10-18 07:33:48','2016-10-18 07:33:48'),(3,'AHOUTOU','MARK','lmjfb','123','2016-10-18 07:36:50','2016-10-18 07:36:50'),(4,'AHOUTOU','MARK','lmjfb','123','2016-10-18 07:38:11','2016-10-18 07:38:11'),(5,'AHOUTOU','MARK','lmjfb','123','2016-10-18 07:42:23','2016-10-18 07:42:23'),(6,'AHOUTOU','MARK','lmjfb','123','2016-10-18 07:43:49','2016-10-18 07:43:49');
/*!40000 ALTER TABLE `Parent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProfPrincipal`
--

DROP TABLE IF EXISTS `ProfPrincipal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProfPrincipal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTeacher` int(11) NOT NULL,
  `classRoomID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProfPrincipal`
--

LOCK TABLES `ProfPrincipal` WRITE;
/*!40000 ALTER TABLE `ProfPrincipal` DISABLE KEYS */;
INSERT INTO `ProfPrincipal` VALUES (1,16,9,'2016-10-18 08:38:24','2016-10-18 08:38:24');
/*!40000 ALTER TABLE `ProfPrincipal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Retard`
--

DROP TABLE IF EXISTS `Retard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Retard` (
  `studentMatricule` varchar(45) NOT NULL,
  `TimePeriodID` int(11) NOT NULL,
  `Date` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`studentMatricule`,`TimePeriodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Retard`
--

LOCK TABLES `Retard` WRITE;
/*!40000 ALTER TABLE `Retard` DISABLE KEYS */;
/*!40000 ALTER TABLE `Retard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Semestre`
--

DROP TABLE IF EXISTS `Semestre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Semestre` (
  `semestreID` int(11) NOT NULL AUTO_INCREMENT,
  `semestreDescription` varchar(45) DEFAULT NULL,
  `academicYear` varchar(45) NOT NULL,
  `startDate` varchar(45) NOT NULL,
  `endDate` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`semestreID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Semestre`
--

LOCK TABLES `Semestre` WRITE;
/*!40000 ALTER TABLE `Semestre` DISABLE KEYS */;
INSERT INTO `Semestre` VALUES (1,'1er trimestre','2016-2017','-','-','2016-10-16 23:30:10','2016-10-16 23:30:10'),(2,'2e trimestre','2016-2017','-','-','2016-10-16 23:30:10','2016-10-16 23:30:10'),(3,'3e trimestre','2016-2017','-','-','2016-10-16 23:30:10','2016-10-16 23:30:10');
/*!40000 ALTER TABLE `Semestre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Student` (
  `studentMatricule` varchar(45) NOT NULL,
  `classRoomID` int(11) NOT NULL,
  `studentParentID` int(11) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `studentLastName` varchar(255) NOT NULL,
  `studentBirthdate` varchar(45) NOT NULL,
  `studentSexe` varchar(1) NOT NULL,
  `studentBirthPlace` varchar(225) DEFAULT NULL,
  `responsableStudent` varchar(45) NOT NULL,
  `contactresponsableStudent` varchar(45) NOT NULL,
  `studentRegime` varchar(45) DEFAULT NULL,
  `studentInterne` varchar(45) DEFAULT NULL,
  `studentAffecte` varchar(45) DEFAULT NULL,
  `studentRedoublant` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `academicYear` varchar(45) NOT NULL,
  PRIMARY KEY (`studentMatricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Student`
--

LOCK TABLES `Student` WRITE;
/*!40000 ALTER TABLE `Student` DISABLE KEYS */;
INSERT INTO `Student` VALUES ('1025',8,4,'Bo Mills','Rahsaan','2006-12-01','F','South Enid','Lenna Jaskolski','(534) 394-3192 x911','-','-','OUI',0,'2016-10-16 10:45:57','2016-10-16 10:45:57',''),('15169899C',10,6,'AHOUTOU',' AFFOUE ELIANE','3/16/2003','F','YABLASSOU','AHOUTOU MARK','123','-','-','OUI',0,'2016-10-18 07:43:49','2016-10-18 07:43:49','2016-2017'),('3232',8,8,'Oleta Beier','Shirley','1972-02-18','F','Juddland','Roel Parker','714-564-6478','-','-','OUI',0,'2016-10-16 10:45:57','2016-10-16 10:45:57',''),('4555',8,3,'Theresia Herzog','Minnie','1987-03-25','F','New Kanestad','Waino Mante','1-278-244-6095 x304','-','-','OUI',0,'2016-10-16 10:45:57','2016-10-16 10:45:57',''),('5758',8,9,'Reed Okuneva','Anahi','1977-08-30','F','East Sheldon','Larry Kihn III','862.250.1015 x6667','-','-','OUI',0,'2016-10-16 10:45:57','2016-10-16 10:45:57',''),('6503',8,6,'Prof. Obie Lueilwitz III','Amelie','1997-01-19','F','South Darianamouth','Prof. Jolie Davis II','373-585-2069 x77126','-','-','OUI',0,'2016-10-16 10:45:57','2016-10-16 10:45:57',''),('6548',8,7,'Vivienne Barton IV','Kiara','2000-08-05','F','Keiraside','Adrianna Oberbrunner','806-774-4033 x8021','-','-','OUI',0,'2016-10-16 10:45:56','2016-10-16 10:45:56',''),('8389',8,6,'Mrs. Leslie Boehm','Della','1970-12-01','F','Stacystad','Lola Jacobs','+1 (214) 863-3683','-','-','OUI',0,'2016-10-16 10:45:56','2016-10-16 10:45:56',''),('8582',8,7,'Dariana Rowe DVM','Angelita','1989-07-07','F','Port Ellie','Pearlie Stark','351-501-2071','-','-','OUI',0,'2016-10-16 10:45:56','2016-10-16 10:45:56',''),('9158',8,4,'Kaleb Nader MD','Edwina','2013-08-11','F','Marquardtmouth','Shannon D\'Amore','(402) 505-5748','-','-','OUI',0,'2016-10-16 10:45:56','2016-10-16 10:45:56',''),('9356',8,8,'Alexandre Tromp','Alize','2006-06-24','F','Wildermanfort','Dayne Hilpert','+17284160663','-','-','OUI',0,'2016-10-16 10:45:56','2016-10-16 10:45:56','');
/*!40000 ALTER TABLE `Student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Teacher`
--

DROP TABLE IF EXISTS `Teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTeacher` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `classRoomID` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pp` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Teacher`
--

LOCK TABLES `Teacher` WRITE;
/*!40000 ALTER TABLE `Teacher` DISABLE KEYS */;
INSERT INTO `Teacher` VALUES (1,10,1,8,'2016-10-16 13:39:39','2016-10-16 13:39:39',0),(5,16,8,6,'2016-10-18 08:38:24','2016-10-18 08:38:24',1),(6,16,8,8,'2016-10-18 08:38:24','2016-10-18 08:38:24',1);
/*!40000 ALTER TABLE `Teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Time_period`
--

DROP TABLE IF EXISTS `Time_period`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Time_period` (
  `TimePeriodID` int(11) NOT NULL AUTO_INCREMENT,
  `StartHour` varchar(45) DEFAULT NULL,
  `EndHour` varchar(45) DEFAULT NULL,
  `DayOFWeek` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`TimePeriodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Time_period`
--

LOCK TABLES `Time_period` WRITE;
/*!40000 ALTER TABLE `Time_period` DISABLE KEYS */;
/*!40000 ALTER TABLE `Time_period` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anneeScolaire`
--

DROP TABLE IF EXISTS `anneeScolaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anneeScolaire` (
  `academicYear` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`academicYear`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anneeScolaire`
--

LOCK TABLES `anneeScolaire` WRITE;
/*!40000 ALTER TABLE `anneeScolaire` DISABLE KEYS */;
INSERT INTO `anneeScolaire` VALUES ('2016-2017','2016-10-15 18:35:37','2016-10-15 18:35:37');
/*!40000 ALTER TABLE `anneeScolaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courseGrade`
--

DROP TABLE IF EXISTS `courseGrade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courseGrade` (
  `studentMatricule` int(11) NOT NULL,
  `semestreID` int(11) NOT NULL,
  `testID` int(11) NOT NULL,
  `Grade` varchar(45) DEFAULT NULL,
  `Appreciation` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`studentMatricule`,`semestreID`,`testID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courseGrade`
--

LOCK TABLES `courseGrade` WRITE;
/*!40000 ALTER TABLE `courseGrade` DISABLE KEYS */;
INSERT INTO `courseGrade` VALUES (1025,1,19,'12','-','2016-10-17 00:58:10','2016-10-17 00:58:10'),(3232,1,19,'20','-','2016-10-17 00:58:10','2016-10-17 00:58:10'),(4555,1,19,'11','-','2016-10-17 00:58:10','2016-10-17 00:58:10'),(5758,1,19,'9','-','2016-10-17 00:58:10','2016-10-17 00:58:10'),(6503,1,19,'12','-','2016-10-17 00:58:10','2016-10-17 00:58:10'),(6548,1,19,'12','-','2016-10-17 00:58:10','2016-10-17 00:58:10'),(8389,1,19,'17','-','2016-10-17 00:58:10','2016-10-17 00:58:10'),(8582,1,19,'13','-','2016-10-17 00:58:10','2016-10-17 00:58:10'),(9158,1,19,'18','-','2016-10-17 00:58:10','2016-10-17 00:58:10'),(9356,1,19,'19','-','2016-10-17 00:58:10','2016-10-17 00:58:10');
/*!40000 ALTER TABLE `courseGrade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courseTest`
--

DROP TABLE IF EXISTS `courseTest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courseTest` (
  `CoursetestID` int(11) NOT NULL AUTO_INCREMENT,
  `semestreID` int(11) NOT NULL,
  `CourseChildID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `classRoomID` int(11) DEFAULT NULL,
  `testName` varchar(225) DEFAULT NULL,
  `testDescription` varchar(225) DEFAULT NULL,
  `maxGradevalue` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`CoursetestID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courseTest`
--

LOCK TABLES `courseTest` WRITE;
/*!40000 ALTER TABLE `courseTest` DISABLE KEYS */;
INSERT INTO `courseTest` VALUES (19,1,1,10,8,NULL,'Premier devoir de niveau','20','2016-10-16 18:33:29','2016-10-16 18:33:29');
/*!40000 ALTER TABLE `courseTest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_10_16_011528_Roles',2),(4,'2016_10_16_012952_create_role_user_pivot_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Teacher','2016-10-15 22:47:40','2016-10-15 22:47:40');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_user`
--

DROP TABLE IF EXISTS `roles_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_user` (
  `roles_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`roles_id`,`user_id`),
  KEY `role_user_role_id_index` (`roles_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_user`
--

LOCK TABLES `roles_user` WRITE;
/*!40000 ALTER TABLE `roles_user` DISABLE KEYS */;
INSERT INTO `roles_user` VALUES (1,9),(1,10),(1,16);
/*!40000 ALTER TABLE `roles_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userFirstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userLastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userContact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_userlogin_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (9,'gjhghjj','hghjjhjvh','123','fdghg@lmjf.com','$2y$10$/0jTgBK7GdpacRr.R1GjLO0Ca5CV201RAzRTmIIr6UqqcU98hWFym',NULL,'2016-10-15 23:48:45','2016-10-15 23:48:45'),(10,'user','user','123','123@lmjf.com','$2y$10$7BorS1lXxT8IU1taqsUG5uICvoj8vw0CjAY6q3K.pUjgbDdl0p0wa','Z67ccwH0edgGuLxEP6Ti8cus7DdNhGbTrwn9snoQqEZICzQxz00Bj27YVi8g','2016-10-16 00:22:02','2016-10-18 08:08:40'),(16,'gjhghjj','hghjjhjvh','123','newuser67g@lmjf.com','$2y$10$Lkisofz.8u1RKzJxWvPc0uL2rQBrr1FhAWxtOaHcUgI2KPPktj7Ya',NULL,'2016-10-18 08:38:24','2016-10-18 08:38:24');
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

-- Dump completed on 2016-10-18 14:48:47
