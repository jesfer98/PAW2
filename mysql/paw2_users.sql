-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: paw2
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `nick` varchar(45) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(150) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `imgUs` varchar(255) DEFAULT NULL,
  `imgPrt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `nick_UNIQUE` (`nick`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jes','fer','jesfer','jes@gmail.com','$2y$10$MrCsS6IyxaiFP9tZhAj6H.KoZXMfGIWzBSukCCuizu43ubMgSfZG2','2020-03-17 18:44:50','2020-03-17 18:44:50','810803453',NULL,NULL,NULL),(2,'a','b','c','d@gmail.com','$2y$10$VFAqqF.Y/whrfkWJYjrBXeVTdcM7E1PTcFDiSizQ5BosWrYeQXr4.','2020-03-17 21:49:14','2020-03-17 21:49:14',NULL,NULL,NULL,NULL),(3,'b','c','d','a@gmail.com','$2y$10$NXZm9RV6QdiEb8LBjX2mhuMN21CBKKvyR24B7CWxEzlOhM7rVTZ4W','2020-03-17 22:07:32','2020-03-17 22:07:32',NULL,NULL,NULL,NULL),(4,'c','d','s','r@gmail.com','$2y$10$kcOgDOZKD/fDPMos35GGl.KKRw.jSwvBvHpf7HBKdG3/J7bccm1/u','2020-03-17 22:21:59','2020-03-17 22:21:59',NULL,NULL,NULL,NULL),(5,'passas','passos','pass','pass@gmail.com','$2y$10$9r/JJ.5kvn4GkfZ8MgTvyuB8Z/j24gHdXixJxsb9FqaBSkaA9AOay','2020-03-17 22:37:19','2020-03-17 22:37:19','845','afds',NULL,NULL),(6,'abs','abs','abs','abs@gmail.com','$2y$10$vExdCdKg1QobeyF8SfYt1u8ZqT9Dcd1FPUdojEEc1skh9VsEK79di','2020-03-18 16:09:36','2020-03-18 16:09:36','86523','sadfa',NULL,NULL),(11,'a1','a1','a1','a1@gmail.com','$2y$10$TWbD2HekjeU46JkhFZp8J.iHbfvaofQD37BZdKDEIN6jA32hFGolO','2020-03-18 18:41:41','2020-03-18 18:41:41','5814263','asf','MmYBEqG0TXiFg39yXhkfO4umC7EyBETieGjHLUoL.jpeg',NULL);
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

-- Dump completed on 2020-03-20 12:48:11
