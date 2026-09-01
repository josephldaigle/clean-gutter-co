-- MySQL dump 10.13  Distrib 8.0.43, for macos15.4 (arm64)
--
-- Host: localhost    Database: cgc_dev
-- ------------------------------------------------------
-- Server version	8.0.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `business_profile`
--

DROP TABLE IF EXISTS `business_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `business_profile` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_state` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_zip` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_embed_src` longtext COLLATE utf8mb4_unicode_ci,
  `map_link_href` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bbb_profile_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bbb_seal_img_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bbb_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chamber_profile_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chamber_seal_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright_year` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_profile`
--

LOCK TABLES `business_profile` WRITE;
/*!40000 ALTER TABLE `business_profile` DISABLE KEYS */;
INSERT INTO `business_profile` VALUES (1,'Clean Gutter Co, LLC','(478) 216-1140','joe@cleangutterco.com','233 Long Leaf Trl','Byron','GA','31008','https://www.facebook.com/Clean-Gutter-Co-766713240388712','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d80113.936116061!2d-83.77153605314619!3d32.61627579367654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88f3efc55066884d%3A0x791214dbd77cdc1!2sClean+Gutter+Co!5e0!3m2!1sen!2sus!4v1556409228107!5m2!1sen!2sus','https://maps.google.com/maps?ll=32.66749,-83.774481&z=12&t=m&hl=en&gl=US&mapclient=embed&cid=545253647663484353','NFeij4SC6wg','https://www.bbb.org/us/ga/byron/profile/gutter-cleaning/clean-gutter-0743-99136#bbbseal','https://seal-centralgeorgia.bbb.org/logo/rbhzbul/clean-gutter-99136.png','Clean Gutter Co, LLC, Gutter Cleaning, Byron, GA','https://www.peachchamber.com/members/member/clean-gutter-co-840','Peach County Regional Chamber of Commerce Membership Seal','2020');
/*!40000 ALTER TABLE `business_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_review`
--

DROP TABLE IF EXISTS `customer_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_review` (
  `id` int NOT NULL AUTO_INCREMENT,
  `review_score` int NOT NULL,
  `review_scale` int NOT NULL,
  `reviewer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviewer_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_review`
--

LOCK TABLES `customer_review` WRITE;
/*!40000 ALTER TABLE `customer_review` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20190306020931','2026-05-17 18:56:25',18),('DoctrineMigrations\\Version20190310044023','2026-05-17 18:56:25',7),('DoctrineMigrations\\Version20190314030953','2026-05-17 18:56:25',3),('DoctrineMigrations\\Version20190314225546','2026-05-17 18:56:25',4),('DoctrineMigrations\\Version20190428141525','2026-05-17 18:56:25',4),('DoctrineMigrations\\Version20200614025155','2026-05-17 18:56:25',2),('DoctrineMigrations\\Version20260517185629','2026-05-17 18:56:50',37),('DoctrineMigrations\\Version20260518024018','2026-05-18 02:43:13',37);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_area_id` int DEFAULT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `IDX_E8FF75CC728B1200` (`service_area_id`),
  CONSTRAINT `FK_E8FF75CC728B1200` FOREIGN KEY (`service_area_id`) REFERENCES `service_area` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` VALUES (31,1,'Do you clean gutters in Warner Robins?','Yes — Warner Robins is one of our primary service areas. We serve homes throughout the city, including neighborhoods near Robins Air Force Base.',0,1),(32,1,'How much does gutter cleaning cost in Warner Robins?','We don\'t publish flat rates because every home is different. Fill out the quote form or call us and we\'ll schedule a free, no-obligation estimate at your property.',1,1),(33,1,'Do you have to use a ladder to clean my gutters?','No. We use a high-powered SkyVac vacuum system with carbon-fiber extension tubes that let us clean gutters up to three stories high without ever setting foot on a ladder or your roof.',2,1),(34,2,'Do you clean gutters in Macon?','Yes — Macon is one of our primary service areas. We clean gutters for homes and businesses throughout the city.',0,1),(35,2,'How much does gutter cleaning cost in Macon?','We don\'t publish flat rates because every job is different. Fill out the quote form or call us and we\'ll schedule a free estimate at your home.',1,1),(36,2,'How do I know my gutters are actually clean if no one goes on the roof?','Our vacuum system has a built-in high-definition wireless camera. We can see inside the gutter while we work, and we\'re happy to show you the footage.',2,1),(37,3,'Do you clean gutters in Perry?','Yes — Perry is a regular stop on our service route. We clean gutters for homes and businesses throughout Perry and the surrounding area.',0,1),(38,3,'How much does gutter cleaning cost in Perry?','We don\'t publish flat rates because every job is different. Fill out the quote form or call us and we\'ll schedule a free, no-obligation estimate.',1,1),(39,3,'Do I need to be home when you clean my gutters?','Not necessarily. As long as we can access all of your gutters and there are no free-roaming animals, we can complete the job while you\'re away. We\'ll email your invoice when we\'re done.',2,1),(40,4,'Do you clean gutters in Byron?','Yes — Byron is our home base. We serve homes and businesses throughout Byron and the surrounding communities, and we\'re never far away.',0,1),(41,4,'How much does gutter cleaning cost in Byron?','We don\'t publish flat rates because every home is different. Call us or fill out the quote form and we\'ll provide a free, no-obligation estimate.',1,1),(42,4,'How often should I clean my gutters in Byron?','Generally once a year is enough, but homes near trees may need more frequent cleanings. We\'ll assess your property and recommend a schedule that makes sense for your home.',2,1),(43,5,'Do you clean gutters in Fort Valley?','Yes — Fort Valley is part of our regular service area. We clean gutters for homes and businesses throughout the city.',0,1),(44,5,'How much does gutter cleaning cost in Fort Valley?','We don\'t publish flat rates because every job is different. Fill out the quote form or call us and we\'ll schedule a free estimate at your home.',1,1),(45,5,'Are you licensed and insured?','Yes. We carry a general liability policy through Hiscox Insurance Company, Inc. that covers accidental damage to your home. We\'re happy to share our coverage certificate on request.',2,1);
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_lead`
--

DROP TABLE IF EXISTS `form_lead`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form_lead` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_lead`
--

LOCK TABLES `form_lead` WRITE;
/*!40000 ALTER TABLE `form_lead` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_lead` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_area`
--

DROP TABLE IF EXISTS `service_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_area` (
  `id` int NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `nearby_cities` json DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_19D78984989D9B62` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_area`
--

LOCK TABLES `service_area` WRITE;
/*!40000 ALTER TABLE `service_area` DISABLE KEYS */;
INSERT INTO `service_area` VALUES (1,'warner-robins','Warner Robins','GA','Looking For A Gutter Cleaner In Warner Robins?','We clean gutters in Warner Robins, GA.','Gutter Cleaning in Warner Robins, GA | Clean Gutter Co','Professional gutter cleaning in Warner Robins, GA. No ladders, no mess. Licensed & insured. Call for a free quote.','[\"Macon\", \"Perry\", \"Byron\", \"Fort Valley\"]',1,0),(2,'macon','Macon','GA','Looking For A Gutter Cleaner In Macon?','We clean gutters in Macon, GA.','Gutter Cleaning in Macon, GA | Clean Gutter Co','Professional gutter cleaning in Macon, GA. No ladders, no mess. Licensed & insured. Call for a free quote.','[\"Warner Robins\", \"Perry\", \"Byron\", \"Fort Valley\"]',1,1),(3,'perry','Perry','GA','Looking For A Gutter Cleaner In Perry?','We clean gutters in Perry, GA.','Gutter Cleaning in Perry, GA | Clean Gutter Co','Professional gutter cleaning in Perry, GA. No ladders, no mess. Licensed & insured. Call for a free quote.','[\"Warner Robins\", \"Macon\", \"Byron\", \"Fort Valley\"]',1,2),(4,'byron','Byron','GA','Looking For A Gutter Cleaner In Byron?','We clean gutters in Byron, GA.','Gutter Cleaning in Byron, GA | Clean Gutter Co','Professional gutter cleaning in Byron, GA. No ladders, no mess. Licensed & insured. Call for a free quote.','[\"Macon\", \"Perry\", \"Warner Robins\", \"Fort Valley\"]',1,3),(5,'fort-valley','Fort Valley','GA','Looking For A Gutter Cleaner In Fort Valley?','We clean gutters in Fort Valley, GA.','Gutter Cleaning in Fort Valley, GA | Clean Gutter Co','Professional gutter cleaning in Fort Valley, GA. No ladders, no mess. Licensed & insured. Call for a free quote.','[\"Macon\", \"Perry\", \"Byron\", \"Warner Robins\"]',1,4);
/*!40000 ALTER TABLE `service_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tenant`
--

DROP TABLE IF EXISTS `tenant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tenant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `devices` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4E59C462D17F50A6` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenant`
--

LOCK TABLES `tenant` WRITE;
/*!40000 ALTER TABLE `tenant` DISABLE KEYS */;
INSERT INTO `tenant` VALUES (1,'josephldaigle@yahoo.com','[\"ROLE_ADMIN\"]','[]','$argon2id$v=19$m=65536,t=4,p=1$Lw4Gu40PxbRaUPHtH/0Pmg$F1pINF4o0ZFuenkRxZkdluwAAO5EANOfH0EXpayGHEo');
/*!40000 ALTER TABLE `tenant` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-26 20:31:16
