-- MySQL dump 10.13  Distrib 9.0.1, for macos14.7 (x86_64)
--
-- Host: localhost    Database: juegos
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `juegos`
--

DROP TABLE IF EXISTS `juegos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `juegos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  `genero` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL,
  `edad` int NOT NULL,
  `nota` decimal(3,2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `foto_caratula` varchar(255) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `descripcion` text COLLATE utf8mb3_spanish_ci,
  `tipo_juego` enum('Online','Local') COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juegos`
--

LOCK TABLES `juegos` WRITE;
/*!40000 ALTER TABLE `juegos` DISABLE KEYS */;
INSERT INTO `juegos` VALUES (1,'Demon\'s Souls','RPG',18,9.20,69.99,'img/1.jpg','2020-11-12','Remake del clásico juego de rol y acción.','Local'),(2,'Spider-Man: Miles Morales','Acción',12,8.50,49.99,'img/2.jpg','2020-11-12','Aventura de acción protagonizada por Miles Morales.','Online'),(3,'Ratchet & Clank: Rift Apart','Aventura',10,8.80,69.99,'img/3.jpg','2021-06-11','Juego de plataformas y acción con Ratchet y Clank.','Local'),(4,'Returnal','Acción',16,8.90,69.99,'img/4.jpg','2021-04-30','Juego de acción y disparos en tercera persona.','Local'),(5,'Sackboy: A Big Adventure','Plataformas',7,8.00,59.99,'img/5.jpg','2020-11-12','Juego de plataformas protagonizado por Sackboy.','Local'),(6,'Astro\'s Playroom','Plataformas',3,8.20,0.00,'img/6.jpg','2020-11-12','Juego de plataformas incluido con la PS5.','Local'),(7,'Resident Evil Village','Terror',18,9.00,59.99,'img/7.jpg','2021-05-07','Juego de terror y supervivencia.','Online'),(8,'Final Fantasy VII Remake Intergrade','RPG',16,9.10,69.99,'img/8.jpg','2021-06-10','Versión mejorada del remake de Final Fantasy VII.','Local'),(9,'Destruction AllStars','Acción',12,6.50,19.99,'img/9.jpg','2021-02-02','Juego de combate vehicular.','Online'),(10,'Hitman 3','Acción',18,8.70,59.99,'img/10.jpg','2021-01-20','Juego de sigilo y acción.','Online'),(11,'FIFA 22','Deportes',3,7.80,59.99,'img/11.jpg','2021-10-01','Juego de fútbol.','Online'),(12,'NBA 2K22','Deportes',3,7.50,59.99,'img/12.jpg','2021-09-10','Juego de baloncesto.','Online'),(15,'Cyberpunk 2077','RPG',18,7.00,59.99,'img/15.jpg','2020-12-10','Juego de rol y acción en un mundo abierto futurista.','Online'),(19,'Kena: Bridge of Spirits','Aventura',10,8.60,39.99,'img/19.jpg','2021-09-21','Juego de acción y aventura con elementos de plataformas.','Local');
/*!40000 ALTER TABLE `juegos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-13 23:23:21
