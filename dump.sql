-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: sillybooks
-- ------------------------------------------------------
-- Server version	8.0.42

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
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-author.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (5,'╨д╨╡╨┤╨╛╤А ╨Ф╨╛╤Б╤В╨╛╨╡╨▓╤Б╨║╨╕╨╣','╨Ъ╨╗╨░╤Б╤Б╨╕╨║ ╤А╤Г╤Б╤Б╨║╨╛╨╣ ╨╕ ╨╝╨╕╤А╨╛╨▓╨╛╨╣ ╨╗╨╕╤В╨╡╤А╨░╤В╤Г╤А╤Л, ╨╛╤Б╨╜╨╛╨▓╨╛╨┐╨╛╨╗╨╛╨╢╨╜╨╕╨║ ╨┐╤Б╨╕╤Е╨╛╨╗╨╛╨│╨╕╤З╨╡╤Б╨║╨╛╨╣ ╨┐╤А╨╛╨╖╤Л ╨▓ ╨╗╨╕╤В╨╡╤А╨░╤В╤Г╤А╨╡ ╨╕ ╨┐╨╡╤А╤Б╨╛╨╜╨░╨╗╨╕╨╖╨╝╨░ ╨║╨░╨║ ╤Д╨╕╨╗╨╛╤Б╨╛╤Д╤Б╨║╨╛╨│╨╛ ╤В╨╡╤З╨╡╨╜╨╕╤П. ╨Ф╨╛╤Б╤В╨╛╨╡╨▓╤Б╨║╨╕╨╣ ╨╛╨║╨░╨╖╨░╨╗ ╨╛╨│╤А╨╛╨╝╨╜╨╛╨╡ ╨▓╨╗╨╕╤П╨╜╨╕╨╡ ╨╜╨░ ╨╝╨╕╤А╨╛╨▓╤Г╤О ╨╗╨╕╤В╨╡╤А╨░╤В╤Г╤А╤Г XX ╨▓╨╡╨║╨░, ╤Б╨┐╨╛╤Б╨╛╨▒╤Б╤В╨▓╨╛╨▓╨░╨╗ ╨┐╨╛╤П╨▓╨╗╨╡╨╜╨╕╤О ╤Н╨║╨╖╨╕╤Б╤В╨╡╨╜╤Ж╨╕╨░╨╗╨╕╨╖╨╝╨░. ╨д╤С╨┤╨╛╤А ╨Ф╨╛╤Б╤В╨╛╨╡╨▓╤Б╨║╨╕╨╣ ╤П╨▓╨╗╤П╨╡╤В╤Б╤П ╨░╨▓╤В╨╛╤А╨╛╨╝ 12 ╤А╨╛╨╝╨░╨╜╨╛╨▓.','1749010872_╨┤╨╛╤Б╤В╨╛╨╡╨▓╤Б╨║╨╕╨╣.png','2025-06-02 21:12:00','2025-06-03 20:21:12'),(6,'╨д╤А╨░╨╜╤Ж ╨Ъ╨░╤Д╨║╨░','╨д╤А╨░╨╜╤Ж ╨Ъ╨░╤Д╨║╨░ тАФ ╨░╨▓╤Б╤В╤А╨╕╨╣╤Б╨║╨╕╨╣ ╨┐╨╕╤Б╨░╤В╨╡╨╗╤М ╤З╨╡╤И╤Б╨║╨╛-╨╡╨▓╤А╨╡╨╣╤Б╨║╨╛╨│╨╛ ╨┐╤А╨╛╨╕╤Б╤Е╨╛╨╢╨┤╨╡╨╜╨╕╤П, ╤И╨╕╤А╨╛╨║╨╛ ╨┐╤А╨╕╨╖╨╜╨░╨▓╨░╨╡╨╝╤Л╨╣ ╨║╨░╨║ ╨╛╨┤╨╜╨░ ╨╕╨╖ ╨║╨╗╤О╤З╨╡╨▓╤Л╤Е ╤Д╨╕╨│╤Г╤А ╨╗╨╕╤В╨╡╤А╨░╤В╤Г╤А╤Л XX ╨▓╨╡╨║╨░. ╨С╨╛╠Б╨╗╤М╤И╨░╤П ╤З╨░╤Б╤В╤М ╤А╨░╨▒╨╛╤В ╨┐╨╕╤Б╨░╤В╨╡╨╗╤П ╨▒╤Л╨╗╨░ ╨╛╨┐╤Г╨▒╨╗╨╕╨║╨╛╨▓╨░╨╜╨░ ╨┐╨╛╤Б╨╝╨╡╤А╤В╨╜╨╛. ╨Х╨│╨╛ ╨┐╤А╨╛╨╕╨╖╨▓╨╡╨┤╨╡╨╜╨╕╤П, ╨┐╤А╨╛╨╜╨╕╨╖╨░╨╜╨╜╤Л╨╡ ╨░╨▒╤Б╤Г╤А╨┤╨╛╨╝ ╨╕ ╤Б╤В╤А╨░╤Е╨╛╨╝ ╨┐╨╡╤А╨╡╨┤ ╨▓╨╜╨╡╤И╨╜╨╕╨╝ ╨╝╨╕╤А╨╛╨╝ ╨╕ ╨▓╤Л╤Б╤И╨╕╨╝ ╨░╨▓╤В╨╛╤А╨╕╤В╨╡╤В╨╛╨╝, ╨╛╨▒╤К╨╡╨┤╨╕╨╜╤П╤О╤В ╨▓ ╤Б╨╡╨▒╨╡ ╤Н╨╗╨╡╨╝╨╡╨╜╤В╤Л ╤А╨╡╨░╨╗╨╕╨╖╨╝╨░ ╨╕ ╤Д╨░╨╜╤В╨░╤Б╤В╨╕╤З╨╡╤Б╨║╨╛╨│╨╛. ╨Ъ╨░╨║ ╨┐╤А╨░╨▓╨╕╨╗╨╛, ╨╛╨╜╨╕ ╨┐╨╛╨▓╨╡╤Б╤В╨▓╤Г╤О╤В ╨╛ ╤З╨╡╨╗╨╛╨▓╨╡╨║╨╡, ╤Б╤В╨░╨╗╨║╨╕╨▓╨░╤О╤Й╨╡╨╝╤Б╤П ╤Б ╨┐╤А╨╕╤З╤Г╨┤╨╗╨╕╨▓╤Л╨╝╨╕ ╨╕╨╗╨╕ ╤Б╤О╤А╤А╨╡╨░╨╗╨╕╤Б╤В╨╕╤З╨╡╤Б╨║╨╕╨╝╨╕ ╤В╤А╤Г╨┤╨╜╨╛╤Б╤В╤П╨╝╨╕ ╨╕ ╨╜╨╡╨┐╨╛╨╜╤П╤В╨╜╤Л╨╝╨╕ ╤Б╨╛╤Ж╨╕╨░╨╗╤М╨╜╤Л╨╝╨╕ ╨▒╤О╤А╨╛╨║╤А╨░╤В╨╕╤З╨╡╤Б╨║╨╕╨╝╨╕ ╤Б╨╕╨╗╨░╨╝╨╕.','1749010881_╨║╨░╤Д╨║╨░jpg.jpg','2025-06-03 19:38:41','2025-06-03 20:21:21'),(7,'╨в╨╛╨╝╨░╤Б ╨е╨░╤А╤А╨╕╤Б','╨Я╨╕╤Б╨░╤В╨╡╨╗╤М ╨╕ ╨╢╤Г╤А╨╜╨░╨╗╨╕╤Б╤В, ╤А╨╛╨┤╨╕╨╗╤Б╤П ╨▓ 1940 ╨│╨╛╨┤╤Г ╨▓ ╨│╨╛╤А╨╛╨┤╨║╨╡ ╨Ф╨╢╨╡╨║╤Б╨╛╨╜, ╤И╤В╨░╤В ╨в╨╡╨╜╨╜╨╡╤Б╤Б╨╕, ╨б╨и╨Р, ╨▓ ╤Б╨║╤А╨╛╨╝╨╜╨╛╨╣ ╤Б╨╡╨╝╤М╨╡ ╨╕╨╜╨╢╨╡╨╜╨╡╤А╨░.\r\n╨Ю╨╜ ╤А╨╛╤Б ╤В╨╕╤Е╨╕╨╝ ╤А╨╡╨▒╨╡╨╜╨║╨╛╨╝, ╨┐╨╛╨╝╨╡╤И╨░╨╜╨╜╤Л╨╝ ╨╜╨░ ╤З╤В╨╡╨╜╨╕╨╕. ╨г╤З╨░╤Б╤М ╨▓ ╨С╨╡╨╣╨╗╨╛╤А╤Б╨║╨╛╨╝ ╤Г╨╜╨╕╨▓╨╡╤А╤Б╨╕╤В╨╡╤В╨╡, ╨е╨░╤А╤А╨╕╤Б ╨╕╨╖╤Г╤З╨░╨╗ ╨░╨╜╨│╨╗╨╕╨╣╤Б╨║╨╕╨╣ ╤П╨╖╤Л╨║ ╨╕ ╤А╨░╨▒╨╛╤В╨░╨╗ ╨╢╤Г╤А╨╜╨░╨╗╨╕╤Б╤В╨╛╨╝ ╨▓ ╨╝╨╡╤Б╤В╨╜╨╛╨╣ ╨│╨░╨╖╨╡╤В╨╡. ╨Я╨╛╤Б╨╗╨╡ ╨╛╨║╨╛╨╜╤З╨░╨╜╨╕╤П ╤Г╤З╨╡╨▒╤Л ╨╜╨╡╨║╨╛╤В╨╛╤А╨╛╨╡ ╨▓╤А╨╡╨╝╤П ╨╛╨╜ ╨┐╤Г╤В╨╡╤И╨╡╤Б╤В╨▓╨╛╨▓╨░╨╗ ╨┐╨╛ ╨Х╨▓╤А╨╛╨┐╨╡, ╨░ ╨▓╨╡╤А╨╜╤Г╨▓╤И╨╕╤Б╤М ╨▓ ╨б╨и╨Р, ╤Г╤Б╤В╤А╨╛╨╕╨╗╤Б╤П ╤А╨░╨▒╨╛╤В╨░╤В╤М ╨▓ ╨╕╨╜╤Д╨╛╤А╨╝╨░╤Ж╨╕╨╛╨╜╨╜╨╛╨╡ ╨░╨│╨╡╨╜╤В╤Б╤В╨▓╨╛ Associated Press, ╨▒╨╗╨░╨│╨╛╨┤╨░╤А╤П ╨║╨╛╤В╨╛╤А╨╛╨╝╤Г ╤В╨╡╤Б╨╜╨╛ ╤Б╨╛╨┐╤А╨╕╨║╨╛╤Б╨╜╤Г╨╗╤Б╤П ╤Б ╨╝╨╕╤А╨╛╨╝ ╨┐╤А╨╡╤Б╤В╤Г╨┐╨╗╨╡╨╜╨╕╨╣ ╨╕ ╤А╨░╤Б╤Б╨╗╨╡╨┤╨╛╨▓╨░╨╜╨╕╨╣. ╨Ф╤П╨┤╤П ╨в╨╛╨╝╨░╤Б╨░ ╨▓ ╨╕╨╜╤В╨╡╤А╨▓╤М╤О The Guardian ╨╜╨░╨╖╨▓╨░╨╗ ╨╡╨│╨╛ ┬л╤З╨╡╨╗╨╛╨▓╨╡╨║╨╛╨╝ ╨▒╨╡╨╖ ╨║╨░╨┐╨╗╨╕ ╨╜╨░╤Б╨╕╨╗╨╕╤П┬╗, ╨║╨╛╤В╨╛╤А╤Л╨╣ ╨┐╤А╨╕ ╤Н╤В╨╛╨╝ ╤Б ╤Г╨┤╨╛╨▓╨╛╨╗╤М╤Б╤В╨▓╨╕╨╡╨╝ ╨┐╨╛╨│╤А╤Г╨╢╨░╨╗╤Б╤П ╨▓ ╨┤╨╡╤В╨░╨╗╨╕ ╨░╨╝╨╡╤А╨╕╨║╨░╨╜╤Б╨║╨╕╤Е ╨┐╤А╨╡╤Б╤В╤Г╨┐╨╗╨╡╨╜╨╕╨╣ ╨╕ ╤Г╨╝╨╡╨╗ ╨▒╨╗╨╡╤Б╤В╤П╤Й╨╡ ╨┐╨╡╤А╨╡╨┤╨░╤В╤М ╨╕╤Е ╨▓ ╤Б╨▓╨╛╨╕╤Е ╤А╨░╤Б╤Б╨╗╨╡╨┤╨╛╨▓╨░╨╜╨╕╤П╤Е.','1749010896_╤В╨╛╨╝╨░╤Б╤Е╨░╤А╤А╨╕╤Б.jpg','2025-06-03 19:53:22','2025-06-03 20:21:36');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_genre`
--

DROP TABLE IF EXISTS `book_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_genre` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `book_id` bigint unsigned NOT NULL,
  `genre_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `book_genre_book_id_genre_id_unique` (`book_id`,`genre_id`),
  KEY `book_genre_genre_id_foreign` (`genre_id`),
  CONSTRAINT `book_genre_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  CONSTRAINT `book_genre_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_genre`
--

LOCK TABLES `book_genre` WRITE;
/*!40000 ALTER TABLE `book_genre` DISABLE KEYS */;
INSERT INTO `book_genre` VALUES (16,4,6,NULL,NULL),(17,4,16,NULL,NULL),(18,4,20,NULL,NULL),(19,5,6,NULL,NULL),(20,5,16,NULL,NULL),(21,5,19,NULL,NULL),(22,6,3,NULL,NULL),(23,6,4,NULL,NULL),(24,6,17,NULL,NULL),(25,6,20,NULL,NULL),(26,6,25,NULL,NULL),(27,7,3,NULL,NULL),(28,7,4,NULL,NULL),(29,7,17,NULL,NULL),(30,8,3,NULL,NULL),(31,8,4,NULL,NULL),(32,8,15,NULL,NULL),(33,8,17,NULL,NULL),(34,9,3,NULL,NULL),(35,9,4,NULL,NULL),(36,9,17,NULL,NULL);
/*!40000 ALTER TABLE `book_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint unsigned NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `pages` int NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_bestseller` tinyint(1) NOT NULL DEFAULT '0',
  `average_rating` double NOT NULL DEFAULT '0',
  `views` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `books_author_id_foreign` (`author_id`),
  CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (4,'╨Я╤А╨╡╤Б╤В╤Г╨┐╨╗╨╡╨╜╨╕╨╡ ╨╕ ╨╜╨░╨║╨░╨╖╨░╨╜╨╕╨╡','┬л╨Я╤А╨╡╤Б╤В╤Г╨┐╨╗╨╡╨╜╨╕╨╡ ╨╕ ╨╜╨░╨║╨░╨╖╨░╨╜╨╕╨╡┬╗, ╨┐╨╛ ╨╝╨╜╨╡╨╜╨╕╤О ╨╝╨╜╨╛╨│╨╕╤Е ╨║╤А╨╕╤В╨╕╨║╨╛╨▓, ╤П╨▓╨╗╤П╨╡╤В╤Б╤П ╨╗╤Г╤З╤И╨╕╨╝ ╤А╨╛╨╝╨░╨╜╨╛╨╝ ╨д╨╡╨┤╨╛╤А╨░ ╨Ф╨╛╤Б╤В╨╛╨╡╨▓╤Б╨║╨╛╨│╨╛, ╨║╨╛╤В╨╛╤А╤Л╨╣ ╨╛╨║╨░╨╖╨░╨╗ ╨╖╨╜╨░╤З╨╕╤В╨╡╨╗╤М╨╜╨╛╨╡ ╨▓╨╗╨╕╤П╨╜╨╕╨╡ ╨╜╨░ ╤А╤Г╤Б╤Б╨║╤Г╤О ╨╕ ╨╝╨╕╤А╨╛╨▓╤Г╤О ╨╗╨╕╤В╨╡╤А╨░╤В╤Г╤А╤Г. ╨Т ╤Н╤В╨╛╨╣ ╨║╨╜╨╕╨│╨╡ ╨▓╤Л ╨╜╨░╨╣╨┤╨╡╤В╨╡ ╨╜╨╡ ╤В╨╛╨╗╤М╨║╨╛ ╨┐╨╛╨╗╨╜╤Л╨╣ ╤В╨╡╨║╤Б╤В ╨┐╤А╨╛╨╕╨╖╨▓╨╡╨┤╨╡╨╜╨╕╤П, ╨╜╨╛ ╨╕ ╨▓╤Б╤В╤Г╨┐╨╕╤В╨╡╨╗╤М╨╜╤Г╤О ╤Б╤В╨░╤В╤М╤О, ╨║╨╛╨╝╨╝╨╡╨╜╤В╨░╤А╨╕╨╕ ╨┐╤А╨╡╨┐╨╛╨┤╨░╨▓╨░╤В╨╡╨╗╤П ╨Ы╨╕╤В╨╡╤А╨░╤В╤Г╤А╨╜╨╛╨│╨╛ ╨╕╨╜╤Б╤В╨╕╤В╤Г╤В╨░ ╨╕╨╝╨╡╨╜╨╕ ╨Р.╨Ь.тАЙ╨У╨╛╤А╤М╨║╨╛╨│╨╛, ╨║╨╛╤В╨╛╤А╤Л╨╡ ╨┐╨╛╨╝╨╛╨│╤Г╤В ╨▓╨░╨╝ ╨┐╨╛╨┤╨│╨╛╤В╨╛╨▓╨╕╤В╤М╤Б╤П ╨║ ╤Н╨║╨╖╨░╨╝╨╡╨╜╨░╨╝.','1748927709.jpg',5,'╨Р╨╖╨▒╤Г╨║╨░ ╨Р╤В╤В╨╕╨║╤Г╤Б',2018,709,'╨а╤Г╤Б╤Б╨║╨╕╨╣',0,0,0,'2025-06-02 21:15:09','2025-06-02 21:15:09'),(5,'╨Я╤А╨╡╨▓╤А╨░╤Й╨╡╨╜╨╕╨╡','╨б╨░╨╝╨╛╨╡ ╨╕╨╖╨▓╨╡╤Б╤В╨╜╨╛╨╡ ╨┐╤А╨╛╨╕╨╖╨▓╨╡╨┤╨╡╨╜╨╕╨╡ ╨д╤А╨░╨╜╤Ж╨░ ╨Ъ╨░╤Д╨║╨╕ ╤А╨░╤Б╤Б╨║╨░╨╖╤Л╨▓╨░╨╡╤В ╨╛ ╨╝╨╛╨╗╨╛╨┤╨╛╨╝ ╨║╨╛╨╝╨╝╨╕╨▓╨╛╤П╨╢╤С╤А╨╡ ╨У╤А╨╡╨│╨╛╤А╨╡ ╨Ч╨░╨╝╨╖╨╡, ╨║╨╛╤В╨╛╤А╤Л╨╣ ╨┐╤А╨╛╤Б╨╜╤Г╨▓╤И╨╕╤Б╤М ╨╛╨┤╨╜╨░╨╢╨┤╤Л ╤Г╤В╤А╨╛╨╝ ╨╛╨▒╨╜╨░╤А╤Г╨╢╨╕╨▓╨░╨╡╤В, ╤З╤В╨╛ ╨┐╤А╨╡╨▓╤А╨░╤В╨╕╨╗╤Б╤П ╨▓ ╨╛╨│╤А╨╛╨╝╨╜╨╛╨╡ ╨╝╨╡╤А╨╖╨║╨╛╨╡ ╨╜╨░╤Б╨╡╨║╨╛╨╝╨╛╨╡. ╨Я╨╛╤З╨╡╨╝╤Г ╤Н╤В╨╛ ╨┐╤А╨╛╨╕╨╖╨╛╤И╨╗╨╛ ╨╕ ╤З╤В╨╛ ╨┐╤А╨╡╨┤╤И╨╡╤Б╤В╨▓╨╛╨▓╨░╨╗╨╛ ╤Н╤В╨╛╨╝╤Г ╤Б╨╛╨▒╤Л╤В╨╕╤О тАФ ╨╜╨╡╨╕╨╖╨▓╨╡╤Б╤В╨╜╨╛. ╨Т╤Б╨╡ ╨╝╤Л, ╨║╨░╨║ ╨╕ ╨│╨╡╤А╨╛╨╣ ╤А╨░╤Б╤Б╨║╨░╨╖╨░ ╨┐╤А╨╛╤Б╤В╨╛ ╨┐╨╛╤Б╤В╨░╨▓╨╗╨╡╨╜╤Л ╨┐╨╡╤А╨╡╨┤ ╤Д╨░╨║╤В╨╛╨╝ тАФ ╤Н╤В╨╛ ╤Б╨▓╨╡╤А╤И╨╕╨╗╨╛╤Б╤МтАж\r\n┬л╨Я╤А╨╡╨▓╤А╨░╤Й╨╡╨╜╨╕╨╡┬╗ ╨Ъ╨░╤Д╨║╨╕ тАУ ╤Н╤В╨╛ ╨│╤А╨╛╤В╨╡╤Б╨║╨╜╨░╤П ╨┐╤А╨╕╤В╤З╨░ ╨╛ ╨┐╨╛╨┐╤Л╤В╨║╨╡ ╨▓╨╛╤Б╤Б╤В╨░╨╜╨╕╤П ╨┐╤А╨╛╤В╨╕╨▓ ╨▒╨╡╤Б╤З╨╡╨╗╨╛╨▓╨╡╤З╨╜╨╛╤Б╤В╨╕. ╨Т ╨╛╨▒╨╗╨╕╨║╨╡ ╨╜╨░╤Б╨╡╨║╨╛╨╝╨╛╨│╨╛ ╨У╤А╨╡╨│╨╛╤А ╨┐╤А╨╡╨┤╤Б╤В╨░╨╡╤В ╨┐╨╡╤А╨╡╨┤ ╨╝╨╕╤А╨╛╨╝ ╤Б╨▓╨╛╨╡╨╛╨▒╤А╨░╨╖╨╜╤Л╨╝ ╨╖╨╡╤А╨║╨░╨╗╨╛╨╝, ╨┐╨╛╨║╨░╨╖╤Л╨▓╨░╤О╤Й╨╕╨╝ ╨▓╤Б╨╡ ╨┐╨╛╤А╨╛╨║╨╕ ╨╕ ╨╜╨╡╤Б╨╛╨▓╨╡╤А╤И╨╡╨╜╤Б╤В╨▓╨░ ╤Б╨╛╨▓╤А╨╡╨╝╨╡╨╜╨╜╨╛╨│╨╛ ╨╛╨▒╤Й╨╡╤Б╤В╨▓╨░тАж ╨С╨╡╤Б╤Б╨╕╨╗╤М╨╜╤Л╨╣ ╨║╤А╨╕╨║ ╨┐╤А╨╛╤В╨╡╤Б╤В╨░, ╨║╨╛╤В╨╛╤А╤Л╨╣ ╨▓ ╨║╨╛╨╜╤Ж╨╡ ╨║╨╛╨╜╤Ж╨╛╨▓ ╤В╨░╨║ ╨╕ ╨╛╤Б╤В╨░╨╗╤Б╤П ╨╜╨╡╤Г╤Б╨╗╤Л╤И╨░╨╜╨╜╤Л╨╝ ╨╕ ╨┐╨╛ ╤Б╨╡╨╣ ╨┤╨╡╨╜╤М, ╨┤╨╡╨╗╨░╨╡╤В ╤А╨░╤Б╤Б╨║╨░╨╖ ╨Ъ╨░╤Д╨║╨╕ ╨╛╨┤╨╜╨╕╨╝ ╨╕╨╖ ╤Б╨░╨╝╤Л╤Е ╨╖╨░╤Е╨▓╨░╤В╤Л╨▓╨░╤О╤Й╨╕╤Е ╨┐╤А╨╛╨╕╨╖╨▓╨╡╨┤╨╡╨╜╨╕╨╣ ╨╝╨╕╤А╨╛╨▓╨╛╨╣ ╨╗╨╕╤В╨╡╤А╨░╤В╤Г╤А╤Л.','1749008539.png',6,'╨Ы╨╕╤В╨╡╤А╨░╤В╤Г╤А╨╜╨╛╨╡ ╨░╨│╨╡╨╜╤В╤Б╤В╨▓╨╛ ╨д╨в╨Ь',2001,65,'╨а╤Г╤Б╤Б╨║╨╕╨╣',0,0,0,'2025-06-03 19:42:19','2025-06-03 19:42:19'),(6,'╨Ъ╤А╨░╤Б╨╜╤Л╨╣ ╨┤╤А╨░╨║╨╛╨╜','╨а╨╛╨╝╨░╨╜, ╨┐╤А╨╡╨┤╨▓╨░╤А╤П╤О╤Й╨╕╨╣ ╨║╤Г╨╗╤М╤В╨╛╨▓╤Г╤О ╨║╨╜╨╕╨│╤Г ┬л╨Ь╨╛╨╗╤З╨░╨╜╨╕╨╡ ╤П╨│╨╜╤П╤В┬╗. ╨Ч╨╜╨░╨╝╨╡╨╜╨╕╤В╨░╤П ╤Н╨║╤А╨░╨╜╨╕╨╖╨░╤Ж╨╕╤П ╤Б ╨н╨╜╤В╨╛╨╜╨╕ ╨е╨╛╨┐╨║╨╕╨╜╤Б╨╛╨╝ ╨▓ ╨│╨╗╨░╨▓╨╜╨╛╨╣ ╤А╨╛╨╗╨╕.\r\n╨Ч╨░╨╣╨┤╤П ╨▓ ╤В╤Г╨┐╨╕╨║ ╨▓ ╤А╨░╤Б╤Б╨╗╨╡╨┤╨╛╨▓╨░╨╜╨╕╨╕ ╨┤╨╡╨╗╨░ ╤Б╨╡╤А╨╕╨╣╨╜╨╛╨│╨╛ ╤Г╨▒╨╕╨╣╤Ж╤Л, ╨┐╤А╨╛╨╖╨▓╨░╨╜╨╜╨╛╨│╨╛ ╨Ъ╤А╨░╤Б╨╜╤Л╨╝ ╨Ф╤А╨░╨║╨╛╨╜╨╛╨╝, ╨д╨С╨а ╨╛╨▒╤А╨░╤Й╨░╨╡╤В╤Б╤П ╨║ ╨┤╨╛╨║╤В╨╛╤А╤Г ╨Ы╨╡╨║╤В╨╡╤А╤Г. ╨Т╨╡╨┤╤М ╤В╨╛╨╗╤М╨║╨╛ ╨╝╨░╨╜╤М╤П╨║ ╨╝╨╛╨╢╨╡╤В ╨┐╨╛╨╜╤П╤В╤М ╨╝╨░╨╜╤М╤П╨║╨░. ╨Ы╨╡╨│╨╡╨╜╨┤╨░╤А╨╜╨╛╨╝╤Г ╨У╨░╨╜╨╜╨╕╨▒╨░╨╗╤Г ╨Ы╨╡╨║╤В╨╡╤А╤Г ╨┐╤А╨╕╨┤╨╡╤В╤Б╤П ╨▓╤Б╤В╤Г╨┐╨╕╤В╤М ╨▓ ╨╕╨╜╤В╨╡╨╗╨╗╨╡╨║╤В╤Г╨░╨╗╤М╨╜╤Г╤О ╤Б╤Е╨▓╨░╤В╨║╤Г ╤Б ╨┤╤А╤Г╨│╨╕╨╝ ╤Б╨╡╤А╨╕╨╣╨╜╤Л╨╝ ╤Г╨▒╨╕╨╣╤Ж╨╡╨╣. ╨Ъ╨░╨║╤Г╤О ╨╕╨╖╨╛╤Й╤А╨╡╨╜╨╜╤Г╤О ╨╕╨│╤А╤Г ╤А╨╡╤И╨╕╨╗ ╨╖╨░╤В╨╡╤П╤В╤М ╨┤╨╛╨║╤В╨╛╤А, ╤А╨╡╤И╨╕╨▓ ╨┐╨╛╨╝╨╛╤З╤М ╨д╨С╨а?\r\n┬л╨Э╨╕╨║╤В╨╛ ╨╜╨╕╨║╨╛╨│╨┤╨░ ╨╜╨╡ ╨╛╤Б╨▓╨╡╤Й╨░╨╗ ╤В╤М╨╝╤Г ╨▓ ╨┤╤Г╤И╨░╤Е ╨╗╤О╨┤╨╡╨╣ ╨▒╨╛╨╗╨╡╨╡ ╨╛╤Б╨╜╨╛╨▓╨░╤В╨╡╨╗╤М╨╜╨╛ ╨╕ ╨╛╨▒╤К╨╡╨║╤В╨╕╨▓╨╜╨╛, ╤З╨╡╨╝ ╨в╨╛╨╝╨░╤Б ╨е╨░╤А╤А╨╕╤Б. ╨Ш, ╨╜╨░╨▓╨╡╤А╨╜╨╛╨╡, ╨▒╨╛╨╗╤М╤И╨╡ ╨╜╨╕╨║╨╛╨╝╤Г ╤Н╤В╨╛ ╨╜╨╡ ╨┐╨╛╨┤ ╤Б╨╕╨╗╤Г┬╗.','1749009366.jpg',7,'╨Ш╨╖╨┤╨░╤В╨╡╨╗╤М╤Б╤В╨▓╨╛ ┬л╨н╨║╤Б╨╝╨╛┬╗',2022,386,'╨а╤Г╤Б╤Б╨║╨╕╨╣',1,0,0,'2025-06-03 19:56:06','2025-06-03 19:56:06'),(7,'╨Ь╨╛╨╗╤З╨░╨╜╨╕╨╡ ╤П╨│╨╜╤П╤В','╨Ю╨┤╨╕╨╜ ╨╕╨╖ ╤Б╨░╨╝╤Л╤Е ╨║╤Г╨╗╤М╤В╨╛╨▓╤Л╤Е ╤В╤А╨╕╨╗╨╗╨╡╤А╨╛╨▓ ╨е╨е ╨▓╨╡╨║╨░. ╨Х╨│╨╛ ╤Б╨╡╨╜╤Б╨░╤Ж╨╕╨╛╨╜╨╜╨░╤П ╤Н╨║╤А╨░╨╜╨╕╨╖╨░╤Ж╨╕╤П ╤Б ╨н╨╜╤В╨╛╨╜╨╕ ╨е╨╛╨┐╨║╨╕╨╜╤Б╨╛╨╝ ╨╕ ╨Ф╨╢╨╛╨┤╨╕ ╨д╨╛╤Б╤В╨╡╤А ╨┐╨╛╨╗╤Г╤З╨╕╨╗╨░ ╨┐╤П╤В╤М ╨┐╤А╨╡╨╝╨╕╨╣ ┬л╨Ю╤Б╨║╨░╤А┬╗.\r\n╨Ь╤Л ╨▓╤Б╨╡ ╨▒╨╡╨╖╤Г╨╝╤Ж╤Л тАФ ╨╕╨╗╨╕, ╨╝╨╛╨╢╨╡╤В ╨▒╤Л╤В╤М, ╤Н╤В╨╛ ╨╝╨╕╤А ╨▓╨╛╨║╤А╤Г╨│ ╨╜╨░╤Б ╤Б╨╛╤И╨╡╨╗ ╤Б ╤Г╨╝╨░?\r\n╨Ф╨╛╨║╤В╨╛╤А ╨У╨░╨╜╨╜╨╕╨▒╨░╨╗ ╨Ы╨╡╨║╤В╨╡╤А тАФ ╨▒╨╗╨╡╤Б╤В╤П╤Й╨╕╨╣ ╨┐╤Б╨╕╤Е╨╕╨░╤В╤А, ╨╜╨╛ ╨╝╨╕╤А ╨╝╨╛╨╢╨╡╤В ╤Б╤З╨╕╤В╨░╤В╤М ╤Б╨╡╨▒╤П ╨▓ ╨▒╨╡╨╖╨╛╨┐╨░╤Б╨╜╨╛╤Б╤В╨╕ ╤В╨╛╨╗╤М╨║╨╛ ╨┤╨╛ ╤В╨╡╤Е ╨┐╨╛╤А, ╨┐╨╛╨║╨░ ╨╛╨╜ ╨▒╤Г╨┤╨╡╤В ╨╜╨░╤Е╨╛╨┤╨╕╤В╤М╤Б╤П ╨╖╨░ ╤Б╤В╨░╨╗╤М╨╜╨╛╨╣ ╨┤╨▓╨╡╤А╤М╤О ╨╛╨┤╨╕╨╜╨╛╤З╨╜╨╛╨╣ ╨║╨░╨╝╨╡╤А╤Л ╨▓ ╤В╤О╤А╤М╨╝╨╡ ╤Б╤В╤А╨╛╨│╨╛╨│╨╛ ╤А╨╡╨╢╨╕╨╝╨░. ╨Ф╨╛╨║╤В╨╛╤А ╨Ы╨╡╨║╤В╨╡╤А тАФ ╤Г╨▒╨╕╨╣╤Ж╨░. ╨Ю╨╜ тАФ ╨│╤Г╤А╨╝╨░╨╜-╨╗╤О╨┤╨╛╨╡╨┤. ╨Ъ╨╗╤Н╤А╨╕╤Б ╨б╤В╨╡╤А╨╗╨╕╨╜╨│ тАФ ╨║╤Г╤А╤Б╨░╨╜╤В ╨░╨║╨░╨┤╨╡╨╝╨╕╨╕ ╨д╨С╨а. ╨Ю╨╜╨░ ╨▓╨╛╤Б╨┐╤А╨╕╨╕╨╝╤З╨╕╨▓╨░ ╨║ ╤З╤Г╨╢╨╛╨╣ ╨▒╨╡╨┤╨╡, ╨╕ ╨╕╨╝╨╡╨╜╨╜╨╛ ╤Н╤В╨╛ ╨╛╨┐╤А╨╡╨┤╨╡╨╗╤П╨╡╤В ╨▓╤Б╨╡ ╨╡╨╡ ╨┐╨╛╤Б╤В╤Г╨┐╨║╨╕.\r\n╨б╤Г╨┤╤М╨▒╨░ ╨╖╨░╤Б╤В╨░╨▓╨╗╤П╨╡╤В ╨│╨╡╤А╨╛╨╡╨▓ ╨┤╨╡╨╣╤Б╤В╨▓╨╛╨▓╨░╤В╤М ╤Б╨╛╨▓╨╝╨╡╤Б╤В╨╜╨╛ ╨▓ ╨┤╨╡╨╗╨╡ ╨╛ ╨┐╨╛╨╕╨╝╨║╨╡ ╨С╤Г╤Д╤Д╨░╨╗╨╛ ╨С╨╕╨╗╨╗╨░ тАФ ╨╛╨┐╨░╤Б╨╜╨╡╨╣╤И╨╡╨│╨╛ ╨╝╨░╨╜╤М╤П╨║╨░-╤Г╨▒╨╕╨╣╤Ж╤ЛтАж','1749009553.jpg',7,'╨Ш╨╖╨┤╨░╤В╨╡╨╗╤М╤Б╤В╨▓╨╛ ┬л╨н╨║╤Б╨╝╨╛┬╗',2022,305,'╨а╤Г╤Б╤Б╨║╨╕╨╣',1,0,0,'2025-06-03 19:59:13','2025-06-03 19:59:13'),(8,'╨У╨░╨╜╨╜╨╕╨▒╨░╨╗','╨д╨╡╨╜╨╛╨╝╨╡╨╜╨░╨╗╤М╨╜╨╛╨╡ ╨┐╤А╨╛╨┤╨╛╨╗╨╢╨╡╨╜╨╕╨╡ ╤А╨╛╨╝╨░╨╜╨╛╨▓ ┬л╨Ъ╤А╨░╤Б╨╜╤Л╨╣ ╨┤╤А╨░╨║╨╛╨╜┬╗ ╨╕ ┬л╨Ь╨╛╨╗╤З╨░╨╜╨╕╨╡ ╤П╨│╨╜╤П╤В┬╗ ╨▒╤Л╨╗╨╛ ╤Н╨║╤А╨░╨╜╨╕╨╖╨╕╤А╨╛╨▓╨░╨╜╨╛ ╨╖╨╜╨░╨╝╨╡╨╜╨╕╤В╤Л╨╝ ╨а╨╕╨┤╨╗╨╕ ╨б╨║╨╛╤В╤В╨╛╨╝ ╤Б ╨╜╨╡╨┐╨╛╨┤╤А╨░╨╢╨░╨╡╨╝╤Л╨╝ ╨н╨╜╤В╨╛╨╜╨╕ ╨е╨╛╨┐╨║╨╕╨╜╤Б╨╛╨╝ ╨▓ ╨│╨╗╨░╨▓╨╜╨╛╨╣ ╤А╨╛╨╗╨╕.\r\n╨Ш╨╜╤В╨╡╨╗╨╗╨╡╨║╤В╤Г╨░╨╗╤М╨╜╤Л╨╣ ╨┐╨╛╨╡╨┤╨╕╨╜╨╛╨║ ╨╝╨╡╨╢╨┤╤Г ╨У╨░╨╜╨╜╨╕╨▒╨░╨╗╨╛╨╝ ╨Ы╨╡╨║╤В╨╡╤А╨╛╨╝ ╨╕ ╨Ъ╨╗╤Н╤А╨╕╤Б ╨б╤В╨░╤А╨╗╨╕╨╜╨│ ╨┐╤А╨╛╨┤╨╛╨╗╨╢╨░╨╡╤В╤Б╤П. ╨Ы╨╡╨│╨╡╨╜╨┤╨░╤А╨╜╤Л╨╣ ╤Г╨▒╨╕╨╣╤Ж╨░-╨║╨░╨╜╨╜╨╕╨▒╨░╨╗ тАФ ╨▓╨╛╤В ╤Г╨╢╨╡ ╤Б╨╡╨╝╤М ╨╗╨╡╤В ╨║╨░╨║ ╨╜╨░ ╤Б╨▓╨╛╨▒╨╛╨┤╨╡. ╨Ъ╨╗╤Н╤А╨╕╤Б ╨б╤В╨░╤А╨╗╨╕╨╜╨│ тАФ ╤Б╨┐╨╡╤Ж╨╕╨░╨╗╤М╨╜╤Л╨╣ ╨░╨│╨╡╨╜╤В ╨д╨С╨а тАФ ╨▓╨╛╤В ╤Г╨╢╨╡ ╨║╨╛╤В╨╛╤А╤Л╨╣ ╨│╨╛╨┤ ╨╗╨╡╨╗╨╡╨╡╤В ╨╝╨╡╤З╤В╤Г ╨░╤А╨╡╤Б╤В╨╛╨▓╨░╤В╤М ╨╡╨│╨╛. ╨Э╨╛ ╨╡╤Б╤В╤М ╨╕ ╤В╨╡, ╨║╤В╨╛ ╨╝╨╡╤З╤В╨░╨╡╤В ╨╛ ╨║╤А╨╛╨▓╨░╨▓╨╛╨╣ ╨╝╨╡╤Б╤В╨╕ ╨┤╨╛╨║╤В╨╛╤А╤Г ╨Ы╨╡╨║╤В╨╡╤А╤Г. ╨Ш ╨╕╤Е ╨╕╨╖╨╛╤Й╤А╨╡╨╜╨╜╤Л╨╡ ╨┐╨╗╨░╨╜╤Л ╨┤╨░╨╗╨╡╨║╨╕ ╨╛╤В ╨┐╤А╨░╨▓╨╛╤Б╤Г╨┤╨╕╤П. ╨г╤Б╨║╨╛╨╗╤М╨╖╨░╤П ╨╛╤В ╤Б╨▓╨╛╨╕╤Е ╨┐╤А╨╡╤Б╨╗╨╡╨┤╨╛╨▓╨░╤В╨╡╨╗╨╡╨╣, ╨╡╨╝╤Г ╨▓╤Б╨╡ ╨╢╨╡ ╨┐╤А╨╕╨┤╨╡╤В╤Б╤П ╤Б╤В╨╛╨╗╨║╨╜╤Г╤В╤М╤Б╤П ╤Б╨╛ ╤Б╨▓╨╛╨╕╨╝ ╨│╨╗╨░╨▓╨╜╤Л╨╝ ╨┐╤А╨╛╤В╨╕╨▓╨╜╨╕╨║╨╛╨╝ тАФ ╨░╨│╨╡╨╜╤В╨╛╨╝','1749009725.jpg',7,'╨Ш╨╖╨┤╨░╤В╨╡╨╗╤М╤Б╤В╨▓╨╛ ┬л╨н╨║╤Б╨╝╨╛┬╗',2022,530,'╨а╤Г╤Б╤Б╨║╨╕╨╣',1,0,0,'2025-06-03 20:02:05','2025-06-03 20:02:05'),(9,'╨Т╨╛╤Б╤Е╨╛╨╢╨┤╨╡╨╜╨╕╨╡ ╨│╨░╨╜╨╜╨╕╨▒╨░╨╗╨░','┬л╨Т╨╛╤Б╤Е╨╛╨╢╨┤╨╡╨╜╨╕╨╡ ╨У╨░╨╜╨╜╨╕╨▒╨░╨╗╨░┬╗ тАФ ╤А╨╛╨╝╨░╨╜ ╨╛ ╨▓╨╖╤А╨╛╤Б╨╗╨╡╨╜╨╕╨╕ ╨Ы╨╡╨║╤В╨╡╤А╨░ ╨╕ ╨╡╨│╨╛ ╨▓╨╛╤Б╤Е╨╛╨╢╨┤╨╡╨╜╨╕╨╕ ╨║ ╨▓╨╡╤А╤И╨╕╨╜╨░╨╝ ╨╖╨╗╨░. ╨н╤В╨╛ тАФ ╤Д╨╡╨╜╨╛╨╝╨╡╨╜╨░╨╗╤М╨╜╨░╤П ╨┐╤А╨╡╨┤╤Л╤Б╤В╨╛╤А╨╕╤П ╤Б╨╛╨▒╤Л╤В╨╕╨╣, ╨╕╨╖╨╗╨╛╨╢╨╡╨╜╨╜╤Л╤Е ╨в╨╛╨╝╨░╤Б╨╛╨╝ ╨е╨░╤А╤А╨╕╤Б╨╛╨╝ ╨▓ ┬л╨Ъ╤А╨░╤Б╨╜╨╛╨╝ ╨Ф╤А╨░╨║╨╛╨╜╨╡┬╗, ┬л╨Ь╨╛╨╗╤З╨░╨╜╨╕╨╕ ╤П╨│╨╜╤П╤В┬╗ ╨╕ ┬л╨У╨░╨╜╨╜╨╕╨▒╨░╨╗╨╡┬╗, ╤Б ╨╛╨│╤А╨╛╨╝╨╜╤Л╨╝ ╤Г╤Б╨┐╨╡╤Е╨╛╨╝ ╤Н╨║╤А╨░╨╜╨╕╨╖╨╕╤А╨╛╨▓╨░╨╜╨╜╤Л╤Е ╨▓ ╨У╨╛╨╗╨╗╨╕╨▓╤Г╨┤╨╡.\r\n╨Ф╨╛╨║╤В╨╛╤А ╨У╨░╨╜╨╜╨╕╨▒╨░╨╗ ╨Ы╨╡╨║╤В╨╡╤А тАФ ╨╗╨╡╨│╨╡╨╜╨┤╨░╤А╨╜╤Л╨╣ ╨░╨╜╤В╨╕╨│╨╡╤А╨╛╨╣ ╨╜╨░╤И╨╡╨│╨╛ ╨▓╤А╨╡╨╝╨╡╨╜╨╕, ╨│╨╡╨╜╨╕╨╣ ╨╕ ╨╖╨╗╨╛╨┤╨╡╨╣ ╨╛╨┤╨╜╨╛╨▓╤А╨╡╨╝╨╡╨╜╨╜╨╛. ╨з╤В╨╛ ╤Б╨┤╨╡╨╗╨░╨╗╨╛ ╨╡╨│╨╛ ╤В╨░╨║╨╕╨╝? ╨Ю╤В╨▓╨╡╤В ╨║╤А╨╛╨╡╤В╤Б╤П ╨▓ ╨┐╤А╨╛╤И╨╗╨╛╨╝ ╨│╨╡╤А╨╛╤П. ╨Ъ╨░╨║ ╨╜╨╡╨╝╨╛╨╣ ╨╕╤Б╨┐╤Г╨│╨░╨╜╨╜╤Л╨╣ ╨╝╨░╨╗╤М╤З╨╕╨║ ╤Б ╤Ж╨╡╨┐╤М╤О ╨╜╨░ ╤И╨╡╨╡, ╨╖╨░╨╝╨╡╤А╨╖╤И╨╕╨╣ ╨▓ ╤Б╨╜╨╡╨│╨░╤Е ╨Т╨╛╤Б╤В╨╛╤З╨╜╨╛╨│╨╛ ╤Д╤А╨╛╨╜╤В╨░, ╨╝╨╛╨│ ╨╜╨╛╤Б╨╕╤В╤М ╨▓ ╤Б╨╡╨▒╨╡ ╤Б╤В╨╛╨╗╤М╨║╨╛ ╨┤╨╡╨╝╨╛╨╜╨╛╨▓? ╨Ш, ╨╜╨╡╤Б╨╝╨╛╤В╤А╤П ╨╜╨░ ╨▓╨╜╨╛╨▓╤М ╨╛╨▒╤А╨╡╤В╨╡╨╜╨╜╤Г╤О ╤Б╨╡╨╝╤М╤О, ╤Н╤В╨╕ ╨┤╨╡╨╝╨╛╨╜╤Л ╨┐╤А╨╛╨┤╨╛╨╗╨╢╨░╨╗╨╕ ╨╜╨░╨▓╨╡╤Й╨░╤В╤М ╨╕ ╨╝╤Г╤З╨╕╤В╤М ╨У╨░╨╜╨╜╨╕╨▒╨░╨╗╨░. ╨Я╨╛╨║╨░ ╨╛╨╜ ╨╜╨╡ ╨▓╤Л╤А╨╛╤Б тАФ ╨╕ ╨╜╨╡ ╨╛╨▒╤А╨░╤В╨╕╨╗╤Б╤П ╨║ ╨╜╨╕╨╝ ╤Б╨░╨╝тАж','1749009819.jpg',7,'╨Ш╨╖╨┤╨░╤В╨╡╨╗╤М╤Б╤В╨▓╨╛ ┬л╨н╨║╤Б╨╝╨╛┬╗',2022,263,'╨а╤Г╤Б╤Б╨║╨╕╨╣',1,0,0,'2025-06-03 20:03:39','2025-06-03 21:08:58');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genres` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `genres_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'╨д╨░╨╜╤В╨░╤Б╤В╨╕╨║╨░','2025-06-01 19:32:40','2025-06-01 19:32:40'),(2,'╨д╤Н╨╜╤В╨╡╨╖╨╕','2025-06-01 19:32:40','2025-06-01 19:32:40'),(3,'╨Ф╨╡╤В╨╡╨║╤В╨╕╨▓','2025-06-01 19:32:40','2025-06-01 19:32:40'),(4,'╨в╤А╨╕╨╗╨╗╨╡╤А','2025-06-01 19:32:40','2025-06-01 19:32:40'),(5,'╨а╨╛╨╝╨░╨╜','2025-06-01 19:32:40','2025-06-01 19:32:40'),(6,'╨Ф╤А╨░╨╝╨░','2025-06-01 19:32:40','2025-06-01 19:32:40'),(7,'╨Ъ╨╛╨╝╨╡╨┤╨╕╤П','2025-06-01 19:32:40','2025-06-01 19:32:40'),(8,'╨г╨╢╨░╤Б╤Л','2025-06-01 19:32:40','2025-06-01 19:32:40'),(9,'╨Я╤А╨╕╨║╨╗╤О╤З╨╡╨╜╨╕╤П','2025-06-01 19:32:40','2025-06-01 19:32:40'),(10,'╨Ш╤Б╤В╨╛╤А╨╕╤З╨╡╤Б╨║╨░╤П ╨╗╨╕╤В╨╡╤А╨░╤В╤Г╤А╨░','2025-06-01 19:32:40','2025-06-01 19:32:40'),(11,'╨С╨╕╨╛╨│╤А╨░╤Д╨╕╤П','2025-06-01 19:32:40','2025-06-01 19:32:40'),(12,'╨Р╨▓╤В╨╛╨▒╨╕╨╛╨│╤А╨░╤Д╨╕╤П','2025-06-01 19:32:40','2025-06-01 19:32:40'),(13,'╨Э╨░╤Г╤З╨╜╨░╤П ╤Д╨░╨╜╤В╨░╤Б╤В╨╕╨║╨░','2025-06-01 19:32:40','2025-06-01 19:32:40'),(14,'╨Ь╨╕╤Б╤В╨╕╨║╨░','2025-06-01 19:32:40','2025-06-01 19:32:40'),(15,'╨Ы╤О╨▒╨╛╨▓╨╜╤Л╨╣ ╤А╨╛╨╝╨░╨╜','2025-06-01 19:32:40','2025-06-01 19:32:40'),(16,'╨Ъ╨╗╨░╤Б╤Б╨╕╤З╨╡╤Б╨║╨░╤П ╨╗╨╕╤В╨╡╤А╨░╤В╤Г╤А╨░','2025-06-01 19:32:40','2025-06-01 19:32:40'),(17,'╨б╨╛╨▓╤А╨╡╨╝╨╡╨╜╨╜╨░╤П ╨╗╨╕╤В╨╡╤А╨░╤В╤Г╤А╨░','2025-06-01 19:32:40','2025-06-01 19:32:40'),(18,'╨Я╨╛╤Н╨╖╨╕╤П','2025-06-01 19:32:40','2025-06-01 19:32:40'),(19,'╨д╨╕╨╗╨╛╤Б╨╛╤Д╨╕╤П','2025-06-01 19:32:40','2025-06-01 19:32:40'),(20,'╨Я╤Б╨╕╤Е╨╛╨╗╨╛╨│╨╕╤П','2025-06-01 19:32:40','2025-06-01 19:32:40'),(21,'╨б╨░╨╝╨╛╨┐╨╛╨╝╨╛╤Й╤М','2025-06-01 19:32:40','2025-06-01 19:32:40'),(22,'╨С╨╕╨╖╨╜╨╡╤Б','2025-06-01 19:32:40','2025-06-01 19:32:40'),(23,'╨Ю╨▒╤А╨░╨╖╨╛╨▓╨░╨╜╨╕╨╡','2025-06-01 19:32:40','2025-06-01 19:32:40'),(24,'╨Ф╨╡╤В╤Б╨║╨░╤П ╨╗╨╕╤В╨╡╤А╨░╤В╤Г╤А╨░','2025-06-01 19:32:40','2025-06-01 19:32:40'),(25,'╨Я╨╛╨┤╤А╨╛╤Б╤В╨║╨╛╨▓╨░╤П ╨╗╨╕╤В╨╡╤А╨░╤В╤Г╤А╨░','2025-06-01 19:32:40','2025-06-01 19:32:40');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000001_create_cache_table',1),(2,'0001_01_01_000002_create_jobs_table',1),(3,'2014_10_12_000000_create_roles_table',1),(4,'2014_10_12_000000_create_users_table',1),(5,'2014_10_12_000001_create_permissions_table',1),(6,'2014_10_12_000002_create_role_permission_table',1),(7,'2014_10_12_100000_create_password_reset_tokens_table',1),(8,'2024_05_16_000001_create_authors_table',1),(9,'2024_05_16_000002_create_books_table',1),(10,'2024_05_16_000003_create_genres_table',1),(11,'2024_05_16_000004_create_book_genre_table',1),(12,'2024_05_16_000005_create_reviews_table',1),(13,'2024_05_16_000006_create_user_books_table',1),(14,'2025_05_19_043039_create_sessions_table',1),(15,'2025_05_19_043505_create_personal_access_tokens_table',1),(16,'2025_05_19_045408_add_role_foreign_key_to_users_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` VALUES ('qwutp11@gmail.com','$2y$12$Ss1ejNww9gOQoZV5U0/Cs.xydycBsaBpT3h8j359mrYNi/sXyYtiC','2025-06-03 20:40:46');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Manage Users','manage-users','Manage Users permission','2025-05-18 21:09:44','2025-05-18 21:09:44'),(2,'Manage Books','manage-books','Manage Books permission','2025-05-18 21:09:44','2025-05-18 21:09:44'),(3,'Manage Authors','manage-authors','Manage Authors permission','2025-05-18 21:09:44','2025-05-18 21:09:44'),(4,'Manage Genres','manage-genres','Manage Genres permission','2025-05-18 21:09:44','2025-05-18 21:09:44'),(5,'Manage Reviews','manage-reviews','Manage Reviews permission','2025-05-18 21:09:44','2025-05-18 21:09:44'),(6,'View Admin Dashboard','view-admin-dashboard','View Admin Dashboard permission','2025-05-18 21:09:44','2025-05-18 21:09:44');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `book_id` bigint unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reviews_user_id_book_id_unique` (`user_id`,`book_id`),
  KEY `reviews_book_id_foreign` (`book_id`),
  CONSTRAINT `reviews_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (3,2,4,'╨Ф╨╛╨╗╨│╨╛, ╨╜╤Г╨┤╨╜╨╛, ╨╝╨╜╨╡ ╨┐╨╛╤А╨░╨▓╨╕╨╗╨╛╤Б╤М',5,'2025-06-02 23:34:05','2025-06-02 23:34:05'),(4,2,6,'╨║╨╗╨░╤Б',5,'2025-06-03 20:27:19','2025-06-03 20:27:19'),(5,1,5,'╨╗╨╛╨╗',1,'2025-06-03 20:39:53','2025-06-03 20:39:53'),(6,2,9,'╤Е╨░╤Е╨░╤Е╨░╤Е╨░╤Е╨░╤Е╤Е╨░╤Е╨░╤Е╨░',4,'2025-06-04 18:06:09','2025-06-04 18:06:09'),(8,2,8,'╨╖╨░╤Е╨┐╤Й╨▓╨╖╤Й╨▓╤Л',2,'2025-06-04 18:12:26','2025-06-04 18:13:23');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permission`
--

DROP TABLE IF EXISTS `role_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_permission` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `permission_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_permission_role_id_permission_id_unique` (`role_id`,`permission_id`),
  KEY `role_permission_permission_id_foreign` (`permission_id`),
  CONSTRAINT `role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permission`
--

LOCK TABLES `role_permission` WRITE;
/*!40000 ALTER TABLE `role_permission` DISABLE KEYS */;
INSERT INTO `role_permission` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL),(3,1,3,NULL,NULL),(4,1,4,NULL,NULL),(5,1,5,NULL,NULL),(6,1,6,NULL,NULL);
/*!40000 ALTER TABLE `role_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator','admin','Administrator with full access','2025-05-18 21:09:44','2025-05-18 21:09:44'),(2,'User','user','Regular user','2025-05-18 21:09:44','2025-05-18 21:09:44');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
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
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `sessions` VALUES ('YSbtyXDa0BaYfVTaCirFnAhmfkIIE2KbzPzjh1iq',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 YaBrowser/25.4.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaUdVbldpRm9wUGR5WHVnb1dUQ05HdUJuVzIwelI5b0hGRXN5eVRNRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==',1749091490);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_books`
--

DROP TABLE IF EXISTS `user_books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `book_id` bigint unsigned NOT NULL,
  `status` enum('reading','completed','want_to_read') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'want_to_read',
  `progress` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_books_user_id_book_id_unique` (`user_id`,`book_id`),
  KEY `user_books_book_id_foreign` (`book_id`),
  CONSTRAINT `user_books_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_books`
--

LOCK TABLES `user_books` WRITE;
/*!40000 ALTER TABLE `user_books` DISABLE KEYS */;
INSERT INTO `user_books` VALUES (3,2,4,'reading',0,'2025-06-02 21:19:39','2025-06-02 21:19:39'),(4,2,5,'completed',100,'2025-06-03 20:26:35','2025-06-03 20:26:35'),(5,2,9,'completed',100,'2025-06-03 20:36:18','2025-06-03 20:36:22'),(6,1,9,'want_to_read',0,'2025-06-03 21:05:50','2025-06-03 21:05:50'),(7,1,5,'completed',100,'2025-06-03 21:06:08','2025-06-03 21:06:08');
/*!40000 ALTER TABLE `user_books` ENABLE KEYS */;
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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-avatar.png',
  `role_id` bigint unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'qwutp','qwutp11@gmail.com',NULL,'$2y$12$ztzKPSfJmKuMKryu/9T4ZOPMKM//hl3GdN9Ii/YVfgCcDHuonJ0aO','1747709243.jpg',2,NULL,'2025-05-18 21:10:44','2025-05-19 18:48:08'),(2,'qwutp11','qwutp11@sillybooks.com',NULL,'$2y$12$yUGVe/wagSZKCXjCESlHJORiu7UWDrCc1bS8b90h4GmEqvr5qDFNK','1747709431.jpg',1,NULL,'2025-05-19 18:50:12','2025-05-19 18:50:31');
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

-- Dump completed on 2025-06-06  9:21:50
