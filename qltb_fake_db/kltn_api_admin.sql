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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'S3qdrlrMMC','wvriud1T8n@gmail.com','$2y$10$E8JjnqpfRjdhcJiBkgIx/Oaf/O.rYliDlbkBSPI.UNRpPI8OIEck2',NULL,NULL),(2,'Xvuc5FBQQL','o3J1bbtRqt@gmail.com','$2y$10$nIE6m4HdIQyUkA00TSQULumyjsHI/OzLQDRBEJP9zTcI2UqmEBnPC',NULL,NULL),(3,'Zu5DcNSovM','Jp2ovoJRmu@gmail.com','$2y$10$Ga1osPfEi3QtxEav/Ym1/.UYt0hKKukzjAUOX2dbOUV8eHkC8b6w6',NULL,NULL),(4,'3xAI4fgqX7','EZHxwT1bVm@gmail.com','$2y$10$EdoMKnJFVOZD9HVLmjB0P.3SUfQhE99ecgWL0XLs3HTmRc5drd2WO',NULL,NULL),(5,'qn5RjL1aio','ZiAEmvWq3k@gmail.com','$2y$10$q3YhpfgxhxA7QYnUMhOnhOOoNLY5L5Pn8P04laJ5mvGCONnJwQbcm',NULL,NULL),(6,'7SjXZMikv1','n45XfhJ2GJ@gmail.com','$2y$10$FUBK8g.VMMYCCCGToadAgO9hRmUZMsH3VRs0NqnKsFknOFnqBn4.q',NULL,NULL),(7,'09DuvK7LEB','QiGNcnjPmP@gmail.com','$2y$10$A1LgH8O2Sj7AobmK6IweO.m2ZBgs6JKQ.ZTZgkXDMhkNx.51BLFIm',NULL,NULL),(8,'nnvbzwqFHY','RsuCRDMB0v@gmail.com','$2y$10$5z..n.IrRiDtWY2NIaL1J.9GSnMwn9vCY3EfyZMRxrwCr3olp6pOO',NULL,NULL),(9,'1VqRERgm8s','uqW42mAGMZ@gmail.com','$2y$10$timXb0LMjyfqLVXgYsY2yOhVm2FxXDF4K1uOLhIdxBS7ZW3QVYpJ.',NULL,NULL),(10,'UTEgTSJ6Rn','a9JQyfhgZ9@gmail.com','$2y$10$cWNO38XIHOn8ce6lQwm9nOMCw9MeWH5otbSSLV5FO451.w3IxYE36',NULL,NULL),(11,'GuOgw9Ep2E','h42cIQXm5Q@gmail.com','$2y$10$tD9pQAZIMh24gh67Dm5jZ.iriA/fQAStZp33p9FTZ4btdYfTduND6',NULL,NULL),(12,'uHiPNK2noR','cGAC4SkRph@gmail.com','$2y$10$ztlxuDM5PALhn2TcKI5nSOsmnJQUNhDtFur27sTMTqJy8b/JZYVFO',NULL,NULL),(13,'9UaviRzyVt','lObn5uGizF@gmail.com','$2y$10$UJt6Scd6pbuPZ.OMlAx3sew825mH00.mPx/qUPkjW30Blv.ubxcza',NULL,NULL),(14,'PdMB9TTLtS','tdqBxhAUX0@gmail.com','$2y$10$ed1z14NPjv7zlBFHeWDbHeDgENGP26hXNalbLG3BPvdiNeOKgVqZ.',NULL,NULL),(15,'F397LkZo8h','85viZNr1Id@gmail.com','$2y$10$fsCtjhDkLBqcOZoKoChRhO.HA5Y/fA9Pys8TyTx7dqQD/gh/xsgGm',NULL,NULL),(16,'cDJZR6TGFe','lpXNk1hdEZ@gmail.com','$2y$10$lb3cAjoGS2HwI9B48Povq.hauFVY/.ZOs9aVd46VDutU8PK7KgoC6',NULL,NULL),(17,'2pBpyOMyEA','ILS9GuGAmx@gmail.com','$2y$10$M1OaT4K3YTJCQlRRnBISvu6tE3a2.PwX9bsaINo4XFl.helbDuWEW',NULL,NULL),(18,'vnMCPoDz0c','rt3NJDkHef@gmail.com','$2y$10$aNU.Zk1WTHKRFUDwrDLwdu3G76MlYU/4D3CC06FS8xd0cFBQHaXAG',NULL,NULL),(19,'ejV4NO4mD7','vLjQAcidMm@gmail.com','$2y$10$kLrWIOi94IP7Zr7W8ElLFuzC5Vk5pVSNuk3WoM0a7pyxv2k8WQpDm',NULL,NULL),(20,'UqMCSOudw3','AkRyfOlg7H@gmail.com','$2y$10$5aAtytieBNZu7TV4g6nU/.bdwY4z8rWJ7KwSXR3AuhIKMkc.lbSDG',NULL,NULL),(21,'PrgM2FhFzS','nsoQSgOZNh@gmail.com','$2y$10$XwmgrwYipIoMSdz2R7AsduGT8xru5XvJJLqPD7Sy23o612sA2HlCu',NULL,NULL),(22,'X3bkpx7FZU','zXVBNyCGSS@gmail.com','$2y$10$DhapckbvLzSY8dkyDbYuhuFZ0734ekBmFtsMNlv9WWc8OmWb52Uju',NULL,NULL),(23,'x3gUMQNh7D','1DYpPnA63h@gmail.com','$2y$10$B6RHumVYgOHvLU7thxInC.E3CciRytVdp..u04t.7/3G5uEaGMgB2',NULL,NULL),(24,'ZIIS9qaWXD','uJRiRzCM4N@gmail.com','$2y$10$svR5/CbmzCuItfhOeyhuFudxse/ruM8tBEfmuKPhIjvHD0B/uppOa',NULL,NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-22  9:31:13
