-- MySQL dump 10.13  Distrib 8.0.21, for macos10.15 (x86_64)
--
-- Host: 127.0.0.1    Database: kltn_api
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `equipment_status_log`
--

DROP TABLE IF EXISTS `equipment_status_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipment_status_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `equipment_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `status` int NOT NULL,
  `type` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_status_log`
--

LOCK TABLES `equipment_status_log` WRITE;
/*!40000 ALTER TABLE `equipment_status_log` DISABLE KEYS */;
INSERT INTO `equipment_status_log` VALUES (1,8,6,34,4,NULL,NULL),(2,7,3,24,2,NULL,NULL),(3,2,8,30,3,NULL,NULL),(4,4,7,15,1,NULL,NULL),(5,6,6,80,1,NULL,NULL),(6,10,10,94,3,NULL,NULL),(7,2,4,56,1,NULL,NULL),(8,2,5,64,5,NULL,NULL),(9,10,8,4,4,NULL,NULL),(10,6,5,44,3,NULL,NULL),(11,7,10,23,1,NULL,NULL),(12,9,9,99,1,NULL,NULL),(13,9,7,6,2,NULL,NULL),(14,9,3,98,5,NULL,NULL),(15,6,2,44,5,NULL,NULL),(16,6,8,74,5,NULL,NULL),(17,4,7,46,3,NULL,NULL),(18,5,1,82,1,NULL,NULL),(19,4,7,38,4,NULL,NULL);
/*!40000 ALTER TABLE `equipment_status_log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-22  9:31:14
