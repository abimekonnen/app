-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: APP
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

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
-- Table structure for table `atm`
--

DROP TABLE IF EXISTS `atm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atm` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `atm_name_unique` (`name`),
  UNIQUE KEY `atm_terminal_unique` (`terminal`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atm`
--

LOCK TABLES `atm` WRITE;
/*!40000 ALTER TABLE `atm` DISABLE KEYS */;
INSERT INTO `atm` VALUES (1,'ALETA CHUKO BRANCH ATM 1','ADL00001'),(2,'OTILCHO BRANCH ATM 01','ADL00002'),(3,'DARAKEBADO BRANCH ATM','ADL00003'),(4,'JEZIRA BRANCH ATM 1','ADL00004'),(5,'TUTIT BRANCH ATM 01','ADL00005'),(6,'TUTIT BRANCH ATM 2','ADL00006'),(7,'GERBAANO BARNCH ATM 1','ADL00007'),(8,'KERCHA BRANCH ATM 1','ADL00008'),(9,'GORO DUGDA BRANCH ATM 1','ADL00009'),(10,'GORODUGDA BRANCH ATM 02','ADL00010'),(11,'BULE HORA BRANCH ATM 1','ADL00011'),(12,'BULE HORA BRANCH ATM 2','ADL00012'),(13,'BULE HORA UNIVERSITY ATM','ADL00013'),(14,'BERISO DUKELE BRANCH ATM 1','ADL00014'),(15,'CHELELEKTU BRANCH ATM 1','ADL00015'),(16,'TORIE BRANCH ATM 1','ADL00016'),(17,'SESSA BRANCH ATM 2','ADL00035'),(18,'DERARO BRANCH ATM 01','ADL00024'),(21,'HANCHULLCHA BRANCH ATM','ADL00019'),(22,'YABELO BRANCH ATM 1','ADL00042'),(23,'MEGA BRANCH ATM','ADL00046'),(24,'MIEBOKU BRANCH ATM','ADL00039'),(25,'DUBULUK BRANCH ATM','ADL00044'),(26,'ANFELE BRANCH ATM 1','ADL00020'),(27,'SESSA BRANCH ATM 1','ADL00034'),(28,'MOYALE BRANCH ATM2','ADL00048'),(29,'YIRGA CHEFE BRANCH ATM 1','ADL00022'),(31,'MICHELE BRANCH ATM 1','ADL00032'),(32,'DILLA UNIVERSITY ODAYA CAMPUS','ADL00031'),(38,'YIRGA CHEFE BRANCH ATM 2','ADL00023'),(39,'GUMIGAYO BRANCH ATM 1','ADL00041'),(40,'URAGA BRANCH ATM 01','ADL00021'),(41,'DILLA BRANCH ATM 02','ADL00027'),(42,'HAMBELA BRANCH ATM','ADL00051'),(43,'BURJI SOYAMA BRANCH ATM 1','ADL00038'),(44,'DILLA UNIVERSITY MAIN CAMPUS A','ADL00030'),(45,'MICHILE BRANCH ATM 2','ADL00033'),(46,'DILLA BRANCH ATM 1','ADL00028'),(47,'GAMBO BER BRANCH ATM','ADL00050'),(48,'MOYALE BRANCH ATM 1','ADL00047');
/*!40000 ALTER TABLE `atm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incident`
--

DROP TABLE IF EXISTS `incident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incident` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('not solved','solved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not solved',
  `ticket` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `incident_ticket_unique` (`ticket`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incident`
--

LOCK TABLES `incident` WRITE;
/*!40000 ALTER TABLE `incident` DISABLE KEYS */;
INSERT INTO `incident` VALUES (42,'DILLA BRANCH ATM 02','Dispenser','not solved',218050,'2022-04-27 07:27:45','2022-04-27 07:27:45',NULL),(43,'HANCHULLCHA BRANCH ATM','Card Reader','solved',218098,'2022-04-27 10:20:22','2022-04-29 03:07:57',NULL),(44,'HAMBELA BRANCH ATM','Aptra','solved',218147,'2022-04-28 03:05:00','2022-05-03 08:05:53',NULL),(45,'TUTIT BRANCH ATM 01','Dispenser','solved',218182,'2022-04-28 04:17:11','2022-05-03 08:05:34',NULL),(46,'BULE HORA UNIVERSITY ATM','Aptra','solved',218215,'2022-04-28 05:32:28','2022-05-04 02:50:43',NULL),(47,'BURJI SOYAMA BRANCH ATM 1','Dispenser','solved',217556,'2022-04-24 08:07:51','2022-05-04 03:10:20',NULL),(49,'DILLA UNIVERSITY MAIN CAMPUS A','Aptra','solved',218265,'2022-04-28 09:15:23','2022-05-04 04:32:19',NULL),(50,'BULE HORA UNIVERSITY ATM','Dispenser','solved',218274,'2022-04-28 09:48:23','2022-05-04 02:50:34',NULL),(51,'YABELO BRANCH ATM 1','Dispenser','solved',218441,'2022-04-29 08:41:08','2022-05-04 05:45:11',NULL),(52,'DILLA BRANCH ATM 1','Card Reader','solved',218566,'2022-04-30 05:18:32','2022-05-03 08:05:14',NULL),(53,'OTILCHO BRANCH ATM 01','Screen','not solved',218821,'2022-05-03 04:10:39','2022-05-03 04:15:41',NULL),(55,'DERARO BRANCH ATM 01','Dispenser','solved',218777,'2022-05-03 04:14:12','2022-05-04 03:33:28',NULL),(56,'GAMBO BER BRANCH ATM','Dispenser','solved',218785,'2022-05-03 04:17:31','2022-05-04 03:32:39',NULL),(57,'GORO DUGDA BRANCH ATM 1','Dispenser belt','solved',218780,'2022-05-03 04:19:26','2022-05-04 03:33:43',NULL),(58,'GORODUGDA BRANCH ATM 02','Dispenser belt','solved',218781,'2022-05-03 04:20:18','2022-05-04 03:33:53',NULL),(61,'OTILCHO BRANCH ATM 01','Card Reader','not solved',218824,'2022-05-03 04:33:34','2022-05-03 04:33:34',NULL),(63,'DILLA BRANCH ATM 02','Shutter','solved',218869,'2022-05-03 05:01:25','2022-05-03 09:21:27',NULL),(67,'ALETA CHUKO BRANCH ATM 1','Dispenser','not solved',219069,'2022-05-04 03:18:42','2022-05-04 03:18:42',NULL),(68,'SESSA BRANCH ATM 2','Dispenser','not solved',218789,'2022-05-04 03:21:09','2022-05-04 03:21:09',NULL),(69,'DILLA UNIVERSITY MAIN CAMPUS A','UAWS Problem','not solved',219086,'2022-05-04 03:31:39','2022-05-04 03:31:39',NULL),(70,'BULE HORA UNIVERSITY ATM','UAWS Problem','not solved',219087,'2022-05-04 03:32:18','2022-05-04 03:32:18',NULL),(71,'MOYALE BRANCH ATM 1','UAWS Problem','not solved',219096,'2022-05-04 03:44:39','2022-05-04 03:44:39',NULL),(72,'YABELO BRANCH ATM 1','Dispenser','not solved',219158,'2022-05-04 05:40:19','2022-05-04 05:40:19',NULL);
/*!40000 ALTER TABLE `incident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (19,'2014_10_12_000000_create_users_table',1),(20,'2014_10_12_100000_create_password_resets_table',1),(21,'2019_08_19_000000_create_failed_jobs_table',1),(22,'2019_12_14_000001_create_personal_access_tokens_table',1),(23,'2022_03_25_062352_atm',1),(24,'2022_03_25_062512_incident',1),(25,'2022_05_03_102651_add_soft_delete_for_incident',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2022-05-04 13:21:07
