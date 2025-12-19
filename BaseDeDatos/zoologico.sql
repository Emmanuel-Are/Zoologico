-- MySQL dump 10.13  Distrib 9.0.1, for Win64 (x86_64)
--
-- Host: localhost    Database: zoologico
-- ------------------------------------------------------
-- Server version	9.0.1

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
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animal` (
  `idAnimal` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `origen` varchar(100) DEFAULT NULL,
  `alimentacion` enum('Herbívoro','Carnívoro','Omnívoro') NOT NULL,
  `peso_aproximado` decimal(5,2) DEFAULT NULL,
  `peligrosidad` enum('Baja','Media','Alta') DEFAULT 'Media',
  PRIMARY KEY (`idAnimal`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal`
--

LOCK TABLES `animal` WRITE;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` VALUES (1,'Leo','León Africano','Kenia','Carnívoro',190.00,'Alta'),(2,'Tigre de Bengala','Panthera tigris','India','Carnívoro',220.50,'Alta'),(3,'Nala','Elefante Asiático','India','Herbívoro',540.70,'Baja'),(7,'Canguro Rojo','Macropus rufus','Australia','Herbívoro',85.30,'Baja'),(12,'Pepe','Tortuga','Cancun','Herbívoro',18.00,'Baja'),(13,'Paco','Oso','Polo Norte','Carnívoro',280.00,'Alta'),(14,'Paco','Oso','Polo Norte','Carnívoro',280.00,'Alta');
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atracciones`
--

DROP TABLE IF EXISTS `atracciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atracciones` (
  `idAtraccion` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `ubicacion` varchar(100) DEFAULT NULL,
  `horario` varchar(50) DEFAULT NULL,
  `edad_minima` int DEFAULT '0',
  `tipo` enum('Educativa','Recreativa','Interactiva') NOT NULL,
  PRIMARY KEY (`idAtraccion`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atracciones`
--

LOCK TABLES `atracciones` WRITE;
/*!40000 ALTER TABLE `atracciones` DISABLE KEYS */;
INSERT INTO `atracciones` VALUES (1,'Tour de Aves Exóticas','Paseo guiado para observar y aprender sobre aves exóticas del zoológico','Zona Aviarios','09:30-11:00',7,'Educativa'),(2,'Zona de Juegos Acuáticos','Área interactiva con chorros y toboganes','Sector Norte','10:00-17:00',5,'Recreativa'),(3,'Encuentro con Reptiles','Observación guiada y charla sobre reptiles','Pabellón Reptiles','14:00-15:00',8,'Educativa'),(4,'Mini Zoológico Infantil','Contacto con animales pequeños y seguros','Zona Infantil','09:00-12:00',3,'Interactiva'),(5,'Show de Aves','Demostración de aves en vuelo libre','Auditorio Principal','11:00-12:00',6,'Recreativa'),(6,'Norea','Una atraccion donde podras disfrutar de ver animales.','Area de juegos mecanicos','10:00-17:00',10,'Recreativa'),(8,'Alberca','Una piscina con pecesitos','Area Sur','10:00-17:00',12,'Recreativa');
/*!40000 ALTER TABLE `atracciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuidador`
--

DROP TABLE IF EXISTS `cuidador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuidador` (
  `idCuidador` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `especialidad` varchar(50) DEFAULT NULL,
  `turno` enum('Mañana','Tarde','Noche') NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idCuidador`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuidador`
--

LOCK TABLES `cuidador` WRITE;
/*!40000 ALTER TABLE `cuidador` DISABLE KEYS */;
INSERT INTO `cuidador` VALUES (1,'Carlos López','Mamíferos','Mañana','555-1234'),(3,'Jorge Silva','Aves','Noche','555-3456'),(4,'Lucía Torres','Herbívoros','Mañana','555-4567'),(5,'Pedro Ramírez','Carnívoros','Tarde','555-5678'),(6,'Lucio','Anfibios','Tarde','7321093403'),(7,'Pedro Ramírez','Aves','Noche','7671028660'),(8,'Richard','Aves','Mañana','7321058956');
/*!40000 ALTER TABLE `cuidador` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-19 12:15:44
