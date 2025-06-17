-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: safety-information-center
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `history_pengambilan_apd`
--

DROP TABLE IF EXISTS `history_pengambilan_apd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `history_pengambilan_apd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal_pengambilan` date NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sepatu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kacamata` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `earplug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pengambilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `total_potongan` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_pengambilan_apd`
--

LOCK TABLES `history_pengambilan_apd` WRITE;
/*!40000 ALTER TABLE `history_pengambilan_apd` DISABLE KEYS */;
INSERT INTO `history_pengambilan_apd` VALUES (1,'2025-01-30','42220451','ABDUL AZIZ','DRIVER','HCGA',NULL,'Kacamata Hitam','Earplug Merah','Helm Kuning',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(2,'2025-01-12','42210444','SUPIANUR','HELPER','PRODUKSI',NULL,'Sepatu Safety No 5','Helm Kuning',NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(3,'2025-03-28','42210444','SUPIANUR','HELPER','PRODUKSI',NULL,'Kacamata Hitam','Sepatu Safety No 5','Sepatu Safety No 5',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(4,'2025-02-17','42210444','SUPIANUR','HELPER','PRODUKSI','Masker Kain',NULL,NULL,NULL,NULL,'Potong Gaji','-',15000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(5,'2025-01-20','42210443','YUHIN NAWAWI','ADMIN','SHE','Kacamata Hitam','Sepatu Safety No 5','Helm Kuning',NULL,'Earplug Merah','Potong Gaji','-',45000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(6,'2025-01-14','42210405','MUHAMMAD RONI','ADMIN','HCGA','Earplug Merah','Masker Kain','Kacamata Hitam','Earplug Merah',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(7,'2025-02-11','42210436','FAISAL CHOLID SAPUTRA','DRIVER','HCGA',NULL,'Masker Kain',NULL,'Earplug Merah',NULL,'Potong Gaji','Rusak',45000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(8,'2025-01-09','42220451','ABDUL AZIZ','DRIVER','HCGA','Masker Kain',NULL,NULL,NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(9,'2025-01-06','42210433','IVAN','DRIVER','HCGA',NULL,'Masker Kain',NULL,'Sepatu Safety No 5','Masker Kain','Potong Gaji','Rusak',15000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(10,'2025-03-07','42210405','MUHAMMAD RONI','ADMIN','HCGA',NULL,NULL,'Sepatu Safety No 5',NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(11,'2025-02-11','42210433','IVAN','DRIVER','HCGA',NULL,'Kacamata Hitam',NULL,'Masker Kain',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(12,'2025-01-07','42220451','ABDUL AZIZ','DRIVER','HCGA','Helm Kuning',NULL,NULL,'Kacamata Hitam','Earplug Merah','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(13,'2025-03-09','42210443','YUHIN NAWAWI','ADMIN','SHE',NULL,'Masker Kain',NULL,NULL,'Helm Kuning','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(14,'2025-02-27','42220451','ABDUL AZIZ','DRIVER','HCGA','Earplug Merah',NULL,'Helm Kuning',NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(15,'2025-01-26','42210436','FAISAL CHOLID SAPUTRA','DRIVER','HCGA',NULL,'Masker Kain','Helm Kuning',NULL,'Earplug Merah','Potong Gaji','-',30000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(16,'2025-03-09','42210446','AMINULLAH','HELPER','PRODUKSI',NULL,'Kacamata Hitam',NULL,'Earplug Merah',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(17,'2025-03-28','42210444','SUPIANUR','HELPER','PRODUKSI','Sepatu Safety No 5',NULL,NULL,NULL,'Sepatu Safety No 5','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(18,'2025-01-10','42210444','SUPIANUR','HELPER','PRODUKSI','Masker Kain',NULL,'Helm Kuning',NULL,'Helm Kuning','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(19,'2025-02-14','42210443','YUHIN NAWAWI','ADMIN','SHE','Masker Kain','Masker Kain',NULL,NULL,'Masker Kain','Potong Gaji','Rusak',45000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(20,'2025-03-25','42220449','LINDA MARLINA','ADMIN','HCGA',NULL,NULL,NULL,'Kacamata Hitam',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(21,'2025-03-06','42210405','MUHAMMAD RONI','ADMIN','HCGA',NULL,NULL,'Kacamata Hitam','Earplug Merah','Sepatu Safety No 5','Potong Gaji','Hilang',60000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(22,'2025-03-12','42220451','ABDUL AZIZ','DRIVER','HCGA','Kacamata Hitam','Masker Kain',NULL,NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(23,'2025-02-01','42210438','I GUSTI NGURAH SUKE BAGIO','HELPER','HCGA','Masker Kain','Earplug Merah','Helm Kuning',NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(24,'2025-03-27','42210444','SUPIANUR','HELPER','PRODUKSI','Helm Kuning',NULL,'Helm Kuning','Helm Kuning',NULL,'Potong Gaji','Rusak',15000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(25,'2025-02-14','42210436','FAISAL CHOLID SAPUTRA','DRIVER','HCGA','Sepatu Safety No 5',NULL,NULL,NULL,NULL,'Potong Gaji','Hilang',30000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(26,'2025-03-08','42210438','I GUSTI NGURAH SUKE BAGIO','HELPER','HCGA','Sepatu Safety No 5',NULL,NULL,'Kacamata Hitam',NULL,'Potong Gaji','Rusak',45000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(27,'2025-01-15','42210446','AMINULLAH','HELPER','PRODUKSI','Masker Kain','Masker Kain','Kacamata Hitam','Kacamata Hitam','Helm Kuning','Potong Gaji','Perlu Ganti',45000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(28,'2025-01-09','42220450','RIAN SETIAJI','DRIVER','HCGA',NULL,NULL,'Masker Kain','Kacamata Hitam',NULL,'Potong Gaji','Perlu Ganti',15000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(29,'2025-02-11','42210444','SUPIANUR','HELPER','PRODUKSI','Masker Kain',NULL,'Sepatu Safety No 5',NULL,'Helm Kuning','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(30,'2025-01-10','42220449','LINDA MARLINA','ADMIN','HCGA','Kacamata Hitam',NULL,'Sepatu Safety No 5',NULL,NULL,'Potong Gaji','Rusak',45000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(31,'2025-01-30','42210436','FAISAL CHOLID SAPUTRA','DRIVER','HCGA',NULL,'Kacamata Hitam','Helm Kuning',NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(32,'2025-01-05','42210405','MUHAMMAD RONI','ADMIN','HCGA',NULL,NULL,'Earplug Merah',NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(33,'2025-01-07','42210405','MUHAMMAD RONI','ADMIN','HCGA',NULL,'Helm Kuning',NULL,'Sepatu Safety No 5',NULL,'Potong Gaji','-',15000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(34,'2025-01-01','42210438','I GUSTI NGURAH SUKE BAGIO','HELPER','HCGA','Helm Kuning',NULL,NULL,NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(35,'2025-03-02','42210405','MUHAMMAD RONI','ADMIN','HCGA','Earplug Merah',NULL,NULL,'Earplug Merah','Helm Kuning','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(36,'2025-03-30','42210443','YUHIN NAWAWI','ADMIN','SHE','Kacamata Hitam','Masker Kain',NULL,'Helm Kuning',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(37,'2025-03-26','42210446','AMINULLAH','HELPER','PRODUKSI','Sepatu Safety No 5','Sepatu Safety No 5','Helm Kuning','Masker Kain',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(38,'2025-03-10','42220451','ABDUL AZIZ','DRIVER','HCGA',NULL,'Kacamata Hitam',NULL,NULL,NULL,'Potong Gaji','Perlu Ganti',60000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(39,'2025-02-06','42220449','LINDA MARLINA','ADMIN','HCGA',NULL,NULL,NULL,'Earplug Merah',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(40,'2025-01-24','42220449','LINDA MARLINA','ADMIN','HCGA','Masker Kain','Kacamata Hitam','Sepatu Safety No 5',NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(41,'2025-02-26','42220450','RIAN SETIAJI','DRIVER','HCGA',NULL,'Sepatu Safety No 5','Kacamata Hitam','Earplug Merah',NULL,'Potong Gaji','-',30000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(42,'2025-03-18','42220449','LINDA MARLINA','ADMIN','HCGA','Earplug Merah','Earplug Merah',NULL,NULL,'Masker Kain','Potong Gaji','-',60000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(43,'2025-02-13','42210405','MUHAMMAD RONI','ADMIN','HCGA','Helm Kuning','Earplug Merah',NULL,NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(44,'2025-01-09','42210443','YUHIN NAWAWI','ADMIN','SHE',NULL,'Helm Kuning','Masker Kain','Earplug Merah',NULL,'Potong Gaji','Perlu Ganti',45000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(45,'2025-03-02','42220451','ABDUL AZIZ','DRIVER','HCGA','Helm Kuning','Earplug Merah',NULL,NULL,NULL,'Potong Gaji','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(46,'2025-03-27','42210443','YUHIN NAWAWI','ADMIN','SHE','Masker Kain','Kacamata Hitam','Masker Kain','Earplug Merah','Helm Kuning','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(47,'2025-02-06','42210405','MUHAMMAD RONI','ADMIN','HCGA',NULL,NULL,'Helm Kuning','Sepatu Safety No 5',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(48,'2025-01-18','42220451','ABDUL AZIZ','DRIVER','HCGA','Earplug Merah',NULL,'Kacamata Hitam','Sepatu Safety No 5',NULL,'Potong Gaji','Perlu Ganti',45000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(49,'2025-01-25','42210443','YUHIN NAWAWI','ADMIN','SHE',NULL,'Helm Kuning',NULL,'Sepatu Safety No 5',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(50,'2025-01-17','42220449','LINDA MARLINA','ADMIN','HCGA',NULL,NULL,'Masker Kain',NULL,'Earplug Merah','Potong Gaji','Hilang',60000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(51,'2025-01-22','42220450','RIAN SETIAJI','DRIVER','HCGA',NULL,'Masker Kain','Kacamata Hitam','Masker Kain','Earplug Merah','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(52,'2025-01-13','42220449','LINDA MARLINA','ADMIN','HCGA',NULL,NULL,'Sepatu Safety No 5',NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(53,'2025-02-08','42210433','IVAN','DRIVER','HCGA',NULL,'Masker Kain',NULL,'Helm Kuning','Kacamata Hitam','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(54,'2025-03-10','42210433','IVAN','DRIVER','HCGA','Earplug Merah',NULL,NULL,'Sepatu Safety No 5',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(55,'2025-03-23','42220449','LINDA MARLINA','ADMIN','HCGA','Earplug Merah',NULL,NULL,'Masker Kain','Kacamata Hitam','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(56,'2025-03-05','42220450','RIAN SETIAJI','DRIVER','HCGA',NULL,NULL,'Helm Kuning',NULL,'Helm Kuning','Potong Gaji','-',45000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(57,'2025-03-19','42210443','YUHIN NAWAWI','ADMIN','SHE','Helm Kuning','Earplug Merah',NULL,NULL,'Helm Kuning','Potong Gaji','Perlu Ganti',15000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(58,'2025-02-15','42210444','SUPIANUR','HELPER','PRODUKSI',NULL,NULL,'Helm Kuning','Kacamata Hitam','Helm Kuning','Potong Gaji','Rusak',15000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(59,'2025-02-14','42220451','ABDUL AZIZ','DRIVER','HCGA','Earplug Merah','Masker Kain',NULL,'Earplug Merah',NULL,'Potong Gaji','Hilang',30000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(60,'2025-03-14','42220449','LINDA MARLINA','ADMIN','HCGA',NULL,NULL,NULL,NULL,'Earplug Merah','Potong Gaji','Hilang',60000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(61,'2025-03-29','42220451','ABDUL AZIZ','DRIVER','HCGA',NULL,'Helm Kuning',NULL,NULL,'Earplug Merah','Potong Gaji','Rusak',60000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(62,'2025-01-04','42220450','RIAN SETIAJI','DRIVER','HCGA','Masker Kain',NULL,NULL,NULL,'Sepatu Safety No 5','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(63,'2025-02-16','42210433','IVAN','DRIVER','HCGA',NULL,NULL,NULL,NULL,'Earplug Merah','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(64,'2025-03-31','42210443','YUHIN NAWAWI','ADMIN','SHE',NULL,NULL,NULL,NULL,'Kacamata Hitam','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(65,'2025-04-01','42210446','AMINULLAH','HELPER','PRODUKSI','Sepatu Safety No 5',NULL,NULL,NULL,'Kacamata Hitam','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(66,'2025-02-20','42210405','MUHAMMAD RONI','ADMIN','HCGA',NULL,NULL,NULL,NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(67,'2025-01-18','42210433','IVAN','DRIVER','HCGA','Earplug Merah',NULL,NULL,NULL,'Kacamata Hitam','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(68,'2025-01-16','42210446','AMINULLAH','HELPER','PRODUKSI',NULL,'Earplug Merah','Helm Kuning','Helm Kuning','Helm Kuning','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(69,'2025-01-07','42220451','ABDUL AZIZ','DRIVER','HCGA','Earplug Merah','Sepatu Safety No 5',NULL,'Helm Kuning',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(70,'2025-02-16','42220450','RIAN SETIAJI','DRIVER','HCGA',NULL,NULL,'Kacamata Hitam','Masker Kain',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(71,'2025-01-18','42220449','LINDA MARLINA','ADMIN','HCGA',NULL,'Sepatu Safety No 5','Earplug Merah','Helm Kuning','Helm Kuning','Potong Gaji','-',30000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(72,'2025-02-21','42220450','RIAN SETIAJI','DRIVER','HCGA',NULL,NULL,'Kacamata Hitam',NULL,NULL,'Potong Gaji','Rusak',15000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(73,'2025-03-24','42210446','AMINULLAH','HELPER','PRODUKSI','Sepatu Safety No 5','Masker Kain',NULL,NULL,'Masker Kain','Potong Gaji','Rusak',30000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(74,'2025-02-09','42210446','AMINULLAH','HELPER','PRODUKSI',NULL,'Earplug Merah',NULL,'Masker Kain','Sepatu Safety No 5','Potong Gaji','Hilang',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(75,'2025-02-04','42210436','FAISAL CHOLID SAPUTRA','DRIVER','HCGA',NULL,NULL,'Earplug Merah','Sepatu Safety No 5','Sepatu Safety No 5','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(76,'2025-03-07','42210446','AMINULLAH','HELPER','PRODUKSI','Earplug Merah','Kacamata Hitam','Helm Kuning','Kacamata Hitam','Sepatu Safety No 5','Potong Gaji','Rusak',60000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(77,'2025-03-30','42210436','FAISAL CHOLID SAPUTRA','DRIVER','HCGA','Kacamata Hitam',NULL,NULL,'Masker Kain',NULL,'Potong Gaji','Hilang',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(78,'2025-02-14','42220451','ABDUL AZIZ','DRIVER','HCGA','Sepatu Safety No 5',NULL,'Earplug Merah',NULL,NULL,'Potong Gaji','-',30000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(79,'2025-02-26','42210438','I GUSTI NGURAH SUKE BAGIO','HELPER','HCGA',NULL,'Masker Kain',NULL,'Earplug Merah',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(80,'2025-03-13','42210446','AMINULLAH','HELPER','PRODUKSI',NULL,NULL,'Masker Kain','Sepatu Safety No 5','Earplug Merah','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(81,'2025-01-11','42220451','ABDUL AZIZ','DRIVER','HCGA','Masker Kain',NULL,NULL,NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(82,'2025-02-13','42210446','AMINULLAH','HELPER','PRODUKSI','Masker Kain',NULL,'Sepatu Safety No 5','Helm Kuning','Sepatu Safety No 5','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(83,'2025-02-18','42220449','LINDA MARLINA','ADMIN','HCGA',NULL,NULL,'Earplug Merah',NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(84,'2025-02-15','42210405','MUHAMMAD RONI','ADMIN','HCGA',NULL,'Kacamata Hitam','Masker Kain','Sepatu Safety No 5',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(85,'2025-03-06','42210405','MUHAMMAD RONI','ADMIN','HCGA','Masker Kain',NULL,'Earplug Merah','Helm Kuning',NULL,'Potong Gaji','Rusak',45000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(86,'2025-01-26','42210444','SUPIANUR','HELPER','PRODUKSI','Kacamata Hitam','Helm Kuning',NULL,'Sepatu Safety No 5',NULL,'Potong Gaji','Hilang',45000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(87,'2025-03-24','42210443','YUHIN NAWAWI','ADMIN','SHE',NULL,'Kacamata Hitam','Masker Kain',NULL,'Helm Kuning','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(88,'2025-03-28','42210436','FAISAL CHOLID SAPUTRA','DRIVER','HCGA','Sepatu Safety No 5','Earplug Merah',NULL,NULL,'Masker Kain','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(89,'2025-01-27','42210433','IVAN','DRIVER','HCGA',NULL,NULL,NULL,NULL,'Helm Kuning','Potong Gaji','Perlu Ganti',45000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(90,'2025-02-18','42210436','FAISAL CHOLID SAPUTRA','DRIVER','HCGA',NULL,'Earplug Merah',NULL,'Earplug Merah','Sepatu Safety No 5','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(91,'2025-02-20','42210443','YUHIN NAWAWI','ADMIN','SHE',NULL,'Sepatu Safety No 5',NULL,'Kacamata Hitam',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(92,'2025-02-17','42210446','AMINULLAH','HELPER','PRODUKSI','Masker Kain',NULL,'Kacamata Hitam','Sepatu Safety No 5',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(93,'2025-01-19','42210438','I GUSTI NGURAH SUKE BAGIO','HELPER','HCGA',NULL,NULL,NULL,'Helm Kuning',NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(94,'2025-02-25','42210438','I GUSTI NGURAH SUKE BAGIO','HELPER','HCGA','Helm Kuning','Earplug Merah',NULL,'Kacamata Hitam','Kacamata Hitam','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(95,'2025-03-15','42220451','ABDUL AZIZ','DRIVER','HCGA','Helm Kuning','Earplug Merah','Earplug Merah',NULL,'Helm Kuning','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(96,'2025-01-24','42210446','AMINULLAH','HELPER','PRODUKSI',NULL,NULL,'Earplug Merah','Helm Kuning','Masker Kain','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(97,'2025-03-30','42210438','I GUSTI NGURAH SUKE BAGIO','HELPER','HCGA',NULL,'Earplug Merah','Earplug Merah','Masker Kain','Masker Kain','Potong Gaji','Hilang',60000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(98,'2025-03-23','42210433','IVAN','DRIVER','HCGA',NULL,'Helm Kuning','Sepatu Safety No 5',NULL,'Sepatu Safety No 5','Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(99,'2025-02-10','42210436','FAISAL CHOLID SAPUTRA','DRIVER','HCGA','Masker Kain',NULL,NULL,'Masker Kain',NULL,'Potong Gaji','-',15000,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(100,'2025-01-01','42210438','I GUSTI NGURAH SUKE BAGIO','HELPER','HCGA',NULL,'Earplug Merah','Masker Kain',NULL,NULL,'Masa Pergantian','-',0,'2025-06-13 19:41:08','2025-06-13 19:41:08'),(101,'2025-06-14','42220449','LINDA MARLINA','ADMIN','HCGA','Sepatu Safety No 6',NULL,NULL,NULL,NULL,'Masa Pergantian','-',0,NULL,NULL),(102,'2025-06-14','42220449','LINDA MARLINA','ADMIN','HCGA','Sepatu Safety No 6','Helm Safety Biru',NULL,NULL,NULL,'Potong Gaji','-',278000,NULL,NULL),(103,'2025-06-14','42221190','ACHMAD RANDY AL MUGNI FAUZI','Admin','SHE','Sepatu Safety No 6','Helm Safety Biru','Kacamata Safety - Namesis','Masker','Earplug','Masa Pergantian','-',0,NULL,NULL);
/*!40000 ALTER TABLE `history_pengambilan_apd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `masa_ganti_apd`
--

DROP TABLE IF EXISTS `masa_ganti_apd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `masa_ganti_apd` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `masa_helm` int NOT NULL,
  `masa_sepatu` int NOT NULL,
  `masa_kacamata` int NOT NULL,
  `masa_masker` int NOT NULL,
  `masa_earplug` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masa_ganti_apd`
--

LOCK TABLES `masa_ganti_apd` WRITE;
/*!40000 ALTER TABLE `masa_ganti_apd` DISABLE KEYS */;
INSERT INTO `masa_ganti_apd` VALUES (1,'ADMIN','-',24,18,12,6,6,NULL,NULL),(2,'ASISTEN GL','-',24,12,6,2,2,NULL,NULL),(3,'ASSISTANT','ENGENERRING',24,12,6,2,2,NULL,NULL),(4,'BARISTA','FA LOGISTIK',24,18,12,6,6,NULL,NULL),(5,'CARPENTER','HCGA',24,12,6,2,2,NULL,NULL),(6,'DATA PROCESSOR','COE',24,18,12,6,6,NULL,NULL),(7,'DEPT HEAD','-',24,18,12,6,6,NULL,NULL),(8,'DEPUTY PROJECT MANAGER','-',24,18,12,6,6,NULL,NULL),(9,'DEVELOPER','COE',24,18,12,6,6,NULL,NULL),(10,'DISPATCH','COE',24,18,12,6,6,NULL,NULL),(11,'DOKTER','SHE',24,18,12,6,6,NULL,NULL),(12,'DRIVER','-',24,12,12,3,3,NULL,NULL),(13,'DRIVER TRUCK','-',24,12,12,3,3,NULL,NULL),(14,'ELECTRICIAN','HCGA',24,8,6,2,2,NULL,NULL),(15,'ERT','SHE',24,18,12,3,3,NULL,NULL),(16,'GROUP LEADER','PRODUKSI',24,12,6,2,2,NULL,NULL),(17,'GROUP LEADER','PLANT',24,12,6,2,2,NULL,NULL),(18,'GROUP LEADER','ENGENERRING',12,6,2,2,2,NULL,NULL),(19,'GROUP LEADER','FA LOGISTIK',24,12,6,2,2,NULL,NULL),(20,'HELPER','PLANT',24,8,6,2,2,NULL,NULL),(21,'HELPER','PRODUKSI',24,8,6,2,2,NULL,NULL),(22,'HELPER','ENGENERRING',24,12,6,2,2,NULL,NULL),(23,'HELPER','SHE',24,12,6,2,2,NULL,NULL),(24,'HELPER','COE',24,12,6,2,2,NULL,NULL),(25,'HELPER','FA LOGISTIK',24,18,12,6,6,NULL,NULL),(26,'HELPER KOKI','FA LOGISTIK',24,18,12,6,6,NULL,NULL),(27,'HELPER MART','FA LOGISTIK',24,18,12,6,6,NULL,NULL),(28,'ICT','COE',24,12,6,2,2,NULL,NULL),(29,'INSTRUMENT MAN','ENGENERRING',24,12,6,2,2,NULL,NULL),(30,'JUNIOR KOKI','FA LOGISTIK',24,18,12,6,6,NULL,NULL),(31,'JUNIOR MEKANIK','FA LOGISTIK',24,8,6,2,2,NULL,NULL),(32,'MECHANIC','PLANT',24,8,6,2,2,NULL,NULL),(33,'OPERATOR','-',24,12,12,3,3,NULL,NULL),(34,'OPERATOR A2B','-',24,12,12,3,3,NULL,NULL),(35,'OPERATOR DUMP TRUCK','-',24,12,12,3,3,NULL,NULL),(36,'OPERATOR SUPPORT','-',24,12,12,3,3,NULL,NULL),(37,'OPERATOR TRUCK SUPPORT','-',24,12,12,3,3,NULL,NULL),(38,'PARAMEDIC','SHE',24,12,6,2,2,NULL,NULL),(39,'PLDP','-',24,12,6,2,2,NULL,NULL),(40,'SECOND KOKI','FA LOGISTIK',24,18,12,6,6,NULL,NULL),(41,'SECTION HEAD','-',24,18,12,6,6,NULL,NULL),(42,'SECURITY','HCGA',24,18,12,6,6,NULL,NULL),(43,'SITE MANAGER','-',24,18,12,6,6,NULL,NULL),(44,'STUDENT','PRODUKSI',24,12,12,3,3,NULL,NULL),(45,'SYSTEM DEVELOPER','COE',24,18,12,6,6,NULL,NULL),(46,'TECHNICIAN','COE',24,12,6,2,2,NULL,NULL),(47,'TYRE MAN','PLANT',24,12,6,2,2,NULL,NULL);
/*!40000 ALTER TABLE `masa_ganti_apd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_sessions_table',1),(2,'0001_01_01_000000_create_users_table',1),(3,'0001_01_01_000001_create_cache_table',1),(4,'0001_01_01_000002_create_jobs_table',1),(5,'2025_06_11_122656_create_history_pengambilan_apd_table',1),(6,'2025_06_11_122728_create_masa_ganti_apd_table',1),(7,'2025_06_11_133627_create_history_pengambilan_apd_table',2),(8,'2025_06_14_022908_create_stok_apd_table',2),(9,'2025_06_14_025815_add_email_to_users_table',2),(10,'2025_06_14_030623_create_masa_ganti_apd_table',3),(11,'2025_06_14_113543_add_tanggal_masuk_to_users_table',4),(12,'2025_06_14_113704_add_status_to_users_table',5),(13,'2025_06_15_120449_create_sops_table',6),(14,'2025_06_15_130040_add_tanggal_terbit_to_sops_table',7),(15,'2025_06_15_134002_add_departemen_to_sops_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('0WpKQcrJY3jj3baK6C5YVsEAR3d0sWHzTTq7xzEp',53,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWUU1NThpam96dlpsWGxsT3F4OENFa1B2MElVejVoNHpwSG1qYkVnYSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTM7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1750054809),('6RIoFye3J9ldCDwpOndvTUhD7IB8iQ6s8o73v44k',53,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibDBoYmpQVG13ZWV0Rm5pbTdYNUNKYjZjdmxDdEJneXJpdGRKTU42YiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTM7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zb3AtaWsvc29wIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1750045629),('PclBklCrZzmTFIMuDvhnGR5CHiSQmhvOLtkvPf7M',53,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRG92elh0N09PeTU1WHVqdjN5eVpINUdEa29oR212ekZRODBNVUZjdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTM7fQ==',1749988304),('T4gIvdTSsZStfHkyzW0QkpX88bRjZ6gCgx6eexku',53,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidURzdzVsYWJXSTQzeFlmeTN5QmdNTE11SUJIWGxNM29SQTVyOWtmTSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTM7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zb3AtaWsvc29wL2RhZnRhci1zb3AiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1749995247);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sops`
--

DROP TABLE IF EXISTS `sops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sops` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_register` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `file_sop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_update` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sops_no_register_unique` (`no_register`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sops`
--

LOCK TABLES `sops` WRITE;
/*!40000 ALTER TABLE `sops` DISABLE KEYS */;
/*!40000 ALTER TABLE `sops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stok_apd`
--

DROP TABLE IF EXISTS `stok_apd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stok_apd` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_apd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_apd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stok_apd_kode_apd_unique` (`kode_apd`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok_apd`
--

LOCK TABLES `stok_apd` WRITE;
/*!40000 ALTER TABLE `stok_apd` DISABLE KEYS */;
INSERT INTO `stok_apd` VALUES (1,'SPT-05','Sepatu Safety No 5','Sepatu',1000,'2025-06-14 05:42:05','2025-06-14 00:45:36'),(2,'SPT-06','Sepatu Safety No 6','Sepatu',996,'2025-06-14 05:42:05','2025-06-14 05:42:05'),(3,'SPT-07','Sepatu Safety No 7','Sepatu',1000,'2025-06-14 05:42:05','2025-06-14 05:42:05'),(4,'SPT-08','Sepatu Safety No 8','Sepatu',1000,'2025-06-14 05:42:05','2025-06-14 05:42:05'),(5,'SPT-10','Sepatu Safety No 10','Sepatu',1000,'2025-06-14 05:42:05','2025-06-14 05:42:05'),(6,'SPT-11','Sepatu Safety No 11','Sepatu',1000,'2025-06-14 05:42:05','2025-06-14 05:42:05'),(7,'HLM-BIRU','Helm Biru','Helm',997,'2025-06-14 05:42:05','2025-06-14 05:42:05'),(8,'HLM-KUNING','Helm Kuning','Helm',1000,'2025-06-14 05:42:05','2025-06-14 05:42:05'),(9,'HLM-ORANGE','Helm Orange','Helm',1000,'2025-06-14 05:42:05','2025-06-14 05:42:05'),(10,'HLM-PUTIH','Helm Putih','Helm',1000,'2025-06-14 05:42:05','2025-06-14 05:42:05'),(11,'HLM-HIJAU','Helm Hijau','Helm',1000,'2025-06-14 05:42:05','2025-06-14 05:42:05'),(12,'KMT-NMS','Kacamata Namesis','Kacamata',998,'2025-06-14 05:42:05','2025-06-14 05:42:05'),(13,'KMT-HTM','Kacamata Hitam','Kacamata',1000,'2025-06-14 05:42:05','2025-06-14 05:42:05'),(14,'MSK-01','Masker','Masker',999,'2025-06-14 05:42:05','2025-06-14 05:42:05'),(15,'ERP-01','Earplug','Earplug',999,'2025-06-14 05:42:05','2025-06-14 05:42:05');
/*!40000 ALTER TABLE `stok_apd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nik_unique` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'MUHAMMAD RONI','muhammad28@ppasibib.co.id','42210405','ADMIN','HCGA',NULL,'Aktif','user',NULL,'$2y$12$7Vbxe7Sx5ebkOL7CLPkXnumtWRR9qB3mVMqI9A/aAYacoEy1/.9HC',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:43'),(4,'IVAN','ivan36@ppasibib.co.id','42210433','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$kcyUHHnVZv9E3xirUOLvie6S4owZrWmuph/F2ALt/RfFoCE6zBgVG',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:43'),(5,'FAISAL CHOLID SAPUTRA','faisal40@ppasibib.co.id','42210436','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$ZkYvgkEr4Da4.XC/K7S5cuAOtZxwWS95neZwy4b7P6fs9K8p9RmlG',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:43'),(6,'I GUSTI NGURAH SUKE BAGIO','i93@ppasibib.co.id','42210438','HELPER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$XPrZPQNlrz6jzVfBISbhN.kfm2Q1V36PGEpU2jQorrLkqjB3K63hG',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:43'),(7,'YUHIN NAWAWI','yuhin26@ppasibib.co.id','42210443','ADMIN','SHE',NULL,'Aktif','user',NULL,'$2y$12$QfvIeWsdRphRibDd6JRHreUTzgWCqJ1.D6W25DtW2qvrN5iegM0zK',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:43'),(8,'SUPIANUR','supianur48@ppasibib.co.id','42210444','HELPER','PRODUKSI',NULL,'Aktif','user',NULL,'$2y$12$EMBMvtBQam59vv4Gk8tvmO1fYz1jTu.mKdedETJR9Jc7ZnQP8F1bu',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:44'),(9,'AMINULLAH','aminullah56@ppasibib.co.id','42210446','HELPER','PRODUKSI',NULL,'Aktif','user',NULL,'$2y$12$GJ0ToqzjpDDyhE/OffKJs.wAkauoZimlSPGOChpPH7M2IMObZFSfu',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:44'),(10,'LINDA MARLINA','linda76@ppasibib.co.id','42220449','ADMIN','HCGA',NULL,'Aktif','user',NULL,'$2y$12$SOEjCnYn3/CM9FDFXwLO3eTdcYy8jIZl6B3iX22BkVYgygBg5hOgi',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:44'),(11,'RIAN SETIAJI','rian94@ppasibib.co.id','42220450','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$2r1Qiso4hjoK0KQN1AAFSeWAYPAZNApaIkGY9ObNfcF4sixyMS0CS',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:44'),(12,'ABDUL AZIZ','abdul17@ppasibib.co.id','42220451','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$Gl/pl4A/4BTic1b24v5rIu943R96qkHIGof5Z.Ljwk7G6OEF88Y6u',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:44'),(13,'AHMAD FIRDAUS','ahmad48@ppasibib.co.id','42220453','HELPER','PRODUKSI',NULL,'Aktif','user',NULL,'$2y$12$KiamhcLPdV1W/ArtvO3ItOziQ.1UD9mpKCpwq3rkNCXyYZpElr6Zi',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:45'),(14,'CAHYADI','cahyadi61@ppasibib.co.id','42220454','HELPER','PRODUKSI',NULL,'Aktif','user',NULL,'$2y$12$cycyCvu/h/bMy.KQkmgph.1C4O6DoIGL/eQpMIVl23T.vLJbDZ1dK',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:45'),(15,'AHMAD MULYADI','ahmad13@ppasibib.co.id','42220456','HELPER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$Qh4iFGStYKywDe9HIhzKYuXCDWmktoux0RxlYByQeBSB1ATSx3P5C',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:45'),(16,'AHNADI','ahnadi28@ppasibib.co.id','42220473','DRIVER TRUCK','HCGA',NULL,'Aktif','user',NULL,'$2y$12$2GfQv0B0hWGU9G3o6lHnaOtF14FlwiJ1QTZuuVcA2sAW8uqgw5LeO',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:45'),(17,'MISRAN','misran62@ppasibib.co.id','42220474','DRIVER TRUCK','HCGA',NULL,'Aktif','user',NULL,'$2y$12$b.XOlhTWdwyV4Vr2W7DYouidEipV2i69evLxU9nG8YeV4VgWVNhB2',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:45'),(18,'MUHAMMAD FAHRIZAL','muhammad34@ppasibib.co.id','42220475','ADMIN','HCGA',NULL,'Aktif','user',NULL,'$2y$12$IYvIa9wLI1destWUFwwrHedpNlyu5BDjfOp7YYjvoypQhCXfbkxP.',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:46'),(19,'LAILAN HAFIZI','lailan86@ppasibib.co.id','42220476','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$BAcYgRlwM8NTahh/XkTgFe/f26NCUTsbjOmC7/z2ik5QiCOlclxkO',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:46'),(20,'ABDUL HADI','abdul71@ppasibib.co.id','42220477','HELPER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$7nQbivh.HxR5bj.Iz3JiU.39pwPfA.ubzAhtvJGYqzL4/kPTtTqQu',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:46'),(21,'MUHAMMAD ZAILANI','muhammad96@ppasibib.co.id','42220478','HELPER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$SvzhNBDnMJ14TgIvxjP5uu0Ck/Sm9VmmOm3Ud7Tbn/pia6vtfS4d6',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:46'),(22,'SUPRIYADI','supriyadi96@ppasibib.co.id','42220479','DRIVER','PLANT',NULL,'Aktif','user',NULL,'$2y$12$q2/vMtmOI6AVZZdu0EMmrOdVyRuWKiehh1uU2/dQkMjJ6c8TA3OqK',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:46'),(23,'MUHAMAT RASAT','muhamat98@ppasibib.co.id','42220487','HELPER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$icfcxiz/.1GSlEStZ5/c1u8UdRX3VjB6RkhD8WuMSILV5uyeVbq8q',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:47'),(24,'MUHAMMAD TAJUDDIN','muhammad79@ppasibib.co.id','42220488','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$372Hcsg7HEWpaOxNdy5s9.qpU2.nRDD42f8CZ4SArO7k/OmcG.GUO',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:47'),(25,'AMIN','amin17@ppasibib.co.id','42220498','HELPER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$Y69T/47uhSiIAHzLIB/5n.OIRBubxLEDWOIdLA8g/aua/3Mzd28gS',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:47'),(26,'HERIYANI','heriyani21@ppasibib.co.id','42220500','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$xlqLar6mONIKuJ8bBRdmi.yYkhS5f1cWUTFrrtxlN9nJi8C.d426a',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:47'),(27,'ABNIARDI','abniardi92@ppasibib.co.id','42220502','HELPER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$2fbnyxrcZ0J7WbRCI/zSxuJY8rAauwQt3.1V7qSE1dVDbl74IFZeS',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:48'),(28,'AHMAD RIDHO','ahmad63@ppasibib.co.id','42220504','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$ZM9AjtF1J9mmHxab9emkL.myyA.Q7w/QoTfusqpN7u9Hu4F9D0F1W',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:48'),(29,'BARIAN RIZQY ANSYARI','barian57@ppasibib.co.id','42220523','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$KsFtYl8tkHsck8VfBGGIMe0uW/O2t2aguMl3mKH/Jck/KsOwhSPMK',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:48'),(30,'ROFENDI','rofendi34@ppasibib.co.id','42220524','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$xt7PLkbZaUsWK3HB4QFD6uDDnUuY.WNh4L6Cz9.BHinxLkK/K8JJe',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:48'),(31,'MARTIN ARGIT SADEWA','martin35@ppasibib.co.id','42220525','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$18rL1nQGJJe7pj1tm1EkHOUNb7E8G8hqvcUpVr1KqTDhqQVLXz8FK',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:48'),(32,'BAYU ADI SAPUTRA','bayu27@ppasibib.co.id','42220529','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$q0C84foneNvthyBmQOr49O/AzXMUV.m6XYamLcxdnsUF.BVGqMgpm',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:49'),(33,'EDI KURNIAWAN','edi31@ppasibib.co.id','42220541','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$AwReGHfQDIiwaWhnw5jmWe96O5vQu6pzRNfon1Nv8.6euU07bb21G',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:49'),(34,'I MADE SUWARDITA','i15@ppasibib.co.id','42220542','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$KfPzxaQJ.PF/vjyDJDIRBeWduekXmeZYgLaBnB8UqvhAZjX7o9qmm',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:49'),(35,'M. MIFTAKHUDINNUR','m.21@ppasibib.co.id','42220543','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$303CqpxoWFWLOggE0VKL5Oxz/qJtPY12VH7SZ1APotga.aS.9WBla',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:49'),(36,'HARTANTO','hartanto46@ppasibib.co.id','42220545','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$hQmsoi4rRckP9tjtw/HFSepSuc/a3FikdUK1ahDStXHn/Rl35CtVO',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:49'),(37,'BAYU ALAMSYAH','bayu16@ppasibib.co.id','42220546','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$u.QHXzaJYpnuZFsKITlkxe50EfZMdRNELia9vuROxae9sBxCU7.t2',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:50'),(38,'I PUTU ADE INDRAYANA','i69@ppasibib.co.id','42220549','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$TZQH8LBzi/auZ7OqcfvgnuLfnYIVPThjU6s6EARdbFb2na7v6olPO',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:50'),(39,'MUHAMMAD HAMDANI','muhammad75@ppasibib.co.id','42220551','HELPER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$FKLS8thfZupBdCwCL3poA.VBXxgEhHv9M3RjFQy4gWr.9ChAA1PKS',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:50'),(40,'ARHAM MAHESARANI','arham99@ppasibib.co.id','42220552','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$A6xQkFuuWE7vF/1mHPBukOsOJPrynKF7KK57T0hoOgsYdW03seAie',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:50'),(41,'MUHAMMAD FADLI','muhammad20@ppasibib.co.id','42220562','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$adQL74PS1JFnff2WQKbTGuWJAti1bt9G/0i0Jj8bLgi9n92mqM3BS',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:50'),(42,'SEPTIANOR','septianor18@ppasibib.co.id','42220563','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$RZv4Z0ZwScbw6Pu/c73Q2urwOIEU6WxuoXxG.nRRiFCMPDzXlSHWe',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:51'),(43,'MUHAMMAD HERIADI','muhammad24@ppasibib.co.id','42220564','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$Rd1tEj31rcmh32UOtXWcjenBu1TIf3tMc8h7ZefcEqKY.csqOC0Pu',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:51'),(44,'MURJANI','murjani28@ppasibib.co.id','42220565','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$atidPC3Y.b4BBS1eZBaaKeaK3xPqLD.rWhhP.sL.JclfmiBB3j0Oy',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:51'),(45,'M. REZA FAUZAN','m.37@ppasibib.co.id','42220575','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$8s2.qEKJT3PnrxNQri87qeh7Phiiw/qQb/X5/m1uEYVtEDrKFzNka',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:51'),(46,'BAHDATUL ANWAR','bahdatul21@ppasibib.co.id','42220577','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$.62J7Uu0G7I83cXsKOvn3.6kgubfYTOASBwxzPIVYwi4t9UFvdjgS',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:51'),(47,'RAFIK SAPUTRA MILLENIUM','rafik22@ppasibib.co.id','42220578','HELPER','PRODUKSI',NULL,'Aktif','user',NULL,'$2y$12$kc9nUT17vjXInqwviFH8nOfJ38qwWPa.Puz4A..lnyIiHDrTBjDVe',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:52'),(48,'MUHAMMAD MURJANI','muhammad53@ppasibib.co.id','42220579','HELPER','PRODUKSI',NULL,'Aktif','user',NULL,'$2y$12$sGfXIj7zyamviEd9dv9V1OPnuRZuQlQAnEngJgOMlPHXWuNYc4BXu',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:52'),(49,'MUHAMMAD ADRI','muhammad59@ppasibib.co.id','42220582','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$ML/jlwybHfC6BNfj43OLX.2.kAveI23FGY1uFVxyJ/HoUhT7HSJHe',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:52'),(50,'ARDANSYAH','ardansyah54@ppasibib.co.id','42220583','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$HdZjbO9z032xgDM5ULsoKOGY23Wmyv37jS3SRawexpJ8IDUadC9Fy',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:52'),(51,'ANGGIT EXO PRASETYO','anggit90@ppasibib.co.id','42220584','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$MF5OdjVLghEZavtHlLh4secAlplyEUTktmskWt/lC4Initf2s7MEm',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:52'),(52,'FIKRI HIKMATULLAH','fikri11@ppasibib.co.id','42220585','DRIVER','HCGA',NULL,'Aktif','user',NULL,'$2y$12$UAsM.8uFA0GhS5pVy5X4SOC.bN1Jqu4nVypKu8IYsZKAfrmlYf.WK',NULL,'2025-06-13 18:49:59','2025-06-13 21:51:53'),(53,'ACHMAD RANDY AL MUGNI FAUZI','randyfauzi24@gmail.com','42221190','Admin','SHE','2022-12-06','Aktif','user',NULL,'$2y$12$u7kCvtR0NqTOg.c2yFCR9upxuPmDsZ3/Jqzbn7YvuYzW5UWVFlbIq','xWKJ1oBNOUniPP2K9au4luG5evkdjvCE6nSzq1wEuNDUrQ3perzAoBA8rtZh','2025-06-14 03:37:42','2025-06-14 03:37:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'safety-information-center'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-17 22:19:49
