-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: shopping_cart_main_project
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint NOT NULL DEFAULT '0',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions`
--

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` VALUES (1,'list','list',1,'minan','','2022-08-20 07:58:34','2022-08-20 07:58:34'),(2,'create','create',1,'minan','','2022-08-20 07:58:34','2022-08-20 07:58:34'),(3,'edit','edit',1,'minan','','2022-08-20 07:58:34','2022-08-20 07:58:34'),(4,'delete','delete',1,'minan','','2022-08-20 07:58:34','2022-08-20 07:58:34'),(19,'permission','permission',1,'minan',NULL,'2022-08-21 03:53:59','2022-08-21 03:53:59'),(21,'update','update',1,'minan',NULL,'2022-08-22 19:21:25','2022-08-22 19:21:25');
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Acer','acer',1,NULL,NULL,'2022-08-22 17:48:30','2022-08-22 17:48:30'),(2,'Asus','asus',1,NULL,NULL,'2022-08-22 17:48:36','2022-08-22 17:48:36'),(3,'Dell','dell',1,NULL,NULL,'2022-08-22 17:48:44','2022-08-22 17:48:44'),(4,'MSI','msi',1,NULL,NULL,'2022-08-22 17:48:53','2022-08-22 17:48:53');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Laptop',0,'laptop','2022-08-22 17:50:14','2022-08-22 17:50:14',NULL),(2,'Gaming',1,'gaming','2022-08-22 17:50:28','2022-08-22 17:50:39','2022-08-22 17:50:39'),(3,'Laptop gaming',1,'laptop-gaming','2022-08-22 17:50:47','2022-08-22 17:50:47',NULL),(4,'Office',0,'office','2022-08-22 17:50:54','2022-08-22 17:51:06','2022-08-22 17:51:06'),(5,'Laptop office',1,'laptop-office','2022-08-22 17:51:15','2022-08-22 17:51:15',NULL),(6,'Laptop apple',1,'laptop-apple','2022-08-22 17:51:22','2022-08-22 17:51:22',NULL),(7,'keyboard',0,'keyboard','2022-08-22 17:51:31','2022-08-22 17:51:31',NULL),(8,'Mouse',0,'mouse','2022-08-22 17:51:37','2022-08-22 17:51:37',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Laptop Gaming',0,'2022-08-22 18:12:33','2022-08-22 18:12:33','',NULL),(2,'Laptop Office',0,'2022-08-22 18:12:42','2022-08-22 18:12:42','',NULL),(3,'Keyboard',0,'2022-08-22 18:12:48','2022-08-22 18:12:48','',NULL),(4,'Mouse',0,'2022-08-22 18:12:51','2022-08-22 18:12:51','',NULL);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_08_11_141903_create_categories_table',1),(6,'2022_08_12_123604_add_column_deleted_at_table_categories',1),(7,'2022_08_12_124428_create_menus_table',1),(8,'2022_08_12_131723_add_column_slug_to_menus_table',1),(9,'2022_08_12_134617_add_column_soft_delete_to_menus_table',1),(10,'2022_08_12_141746_create_products_table',1),(11,'2022_08_12_141916_create_product_images_table',1),(12,'2022_08_12_142010_create_tags_table',1),(13,'2022_08_12_142035_create_product_tags_table',1),(14,'2022_08_13_013014_add_column_feature_image_name',1),(15,'2022_08_13_021126_add_column_image_name_to_product_image_tabe',1),(16,'2022_08_13_084617_add_column_deleted_at_to_product_table',1),(17,'2022_08_17_012523_create_roles_table',1),(18,'2022_08_17_021111_add_column_role_id_into_users_table',1),(19,'2022_08_17_024202_add_column_user_id_into_users_table',1),(20,'2022_08_17_052748_add-address-into-users-table',1),(21,'2022_08_20_042643_create_permissions_table',1),(22,'2022_08_20_043008_create_actions_table',1),(23,'2022_08_20_043818_add_column_active_into_users_table',1),(24,'2022_08_20_044011_create_role_permissions_table',1),(25,'2022_08_20_044049_create_permission_actions_table',1),(26,'2022_08_20_051530_add_column_permissions_into_users_table',1),(29,'2022_08_21_101738_add_column_permissions_encode_into_roles_table',2),(30,'2022_08_22_175724_add_column_is_admin_into_users_table',3),(31,'2022_08_23_004429_create_brands_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `permission_actions`
--

DROP TABLE IF EXISTS `permission_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_actions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` bigint NOT NULL,
  `action_id` bigint NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_actions`
--

LOCK TABLES `permission_actions` WRITE;
/*!40000 ALTER TABLE `permission_actions` DISABLE KEYS */;
INSERT INTO `permission_actions` VALUES (1,1,1,'minan','','2022-08-20 08:01:42','2022-08-20 08:01:42'),(2,1,2,'minan','','2022-08-20 08:01:42','2022-08-20 08:01:42'),(3,1,3,'minan','','2022-08-20 08:01:42','2022-08-20 08:01:42'),(4,1,4,'minan','','2022-08-20 08:01:42','2022-08-20 08:01:42'),(6,2,1,'minan','','2022-08-20 08:01:42','2022-08-20 08:01:42'),(7,2,2,'minan','','2022-08-20 08:01:42','2022-08-20 08:01:42'),(8,2,3,'minan','','2022-08-20 08:01:42','2022-08-20 08:01:42'),(9,2,4,'minan','','2022-08-20 08:01:42','2022-08-20 08:01:42'),(20,3,1,NULL,NULL,NULL,NULL),(21,3,2,NULL,NULL,NULL,NULL),(22,3,3,NULL,NULL,NULL,NULL),(23,3,4,NULL,NULL,NULL,NULL),(24,4,1,NULL,NULL,NULL,NULL),(25,4,2,NULL,NULL,NULL,NULL),(26,4,4,NULL,NULL,NULL,NULL),(27,4,3,NULL,NULL,NULL,NULL),(28,5,2,NULL,NULL,NULL,NULL),(29,5,4,NULL,NULL,NULL,NULL),(30,5,1,NULL,NULL,NULL,NULL),(31,5,3,NULL,NULL,NULL,NULL),(32,6,1,NULL,NULL,NULL,NULL),(33,6,2,NULL,NULL,NULL,NULL),(34,6,4,NULL,NULL,NULL,NULL),(35,6,3,NULL,NULL,NULL,NULL),(36,5,19,NULL,NULL,NULL,NULL),(37,8,1,NULL,NULL,NULL,NULL),(38,8,2,NULL,NULL,NULL,NULL),(39,8,3,NULL,NULL,NULL,NULL),(40,8,4,NULL,NULL,NULL,NULL),(42,3,21,NULL,NULL,NULL,NULL),(43,6,21,NULL,NULL,NULL,NULL),(44,4,21,NULL,NULL,NULL,NULL),(45,5,21,NULL,NULL,NULL,NULL),(46,8,21,NULL,NULL,NULL,NULL),(47,1,21,NULL,NULL,NULL,NULL),(48,2,21,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `permission_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint NOT NULL DEFAULT '0',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'user','users',1,'minan','','2022-08-20 07:45:58','2022-08-20 07:45:58'),(2,'menu','menus',1,'minan','','2022-08-20 07:45:58','2022-08-20 07:45:58'),(3,'product','products',1,'minan','','2022-08-21 10:50:12','2022-08-21 10:50:12'),(4,'category','categoriess',1,'minan','','2022-08-21 10:50:12','2022-08-21 10:50:12'),(5,'role','roless',1,'minan','','2022-08-21 10:50:12','2022-08-21 10:50:12'),(6,'action','actions',1,'minan','','2022-08-21 10:50:12','2022-08-21 10:50:12'),(8,'brand','brands',1,'minan',NULL,'2022-08-21 10:50:12','2022-08-21 10:50:12');
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
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (4,'Acer Predator Helios.jpg','/storage/product/1/FDwl8j0UBITrdlLeXCGkwW5pijRq1tRfpt5fPkDl.jpg',2,NULL,NULL),(5,'Acer Predator Triton 300.jpg','/storage/product/1/IRhScnHJjri2BuobDP6TxlLAMxMqIu63R7iqKsDA.jpg',2,NULL,NULL),(6,'Acer Predator Triton 500 SE.jpg','/storage/product/1/jstkvE35TdqP7joNYmI3K8p2TDIY9Uk4xhHxGwnV.jpg',2,NULL,NULL),(7,'Asus ROG Zephyrus .jpg','/storage/product/1/HoL5RLODXyO0Vj5albeTiBBUxmTR1KJQDOuvsn3Y.jpg',3,NULL,NULL),(8,'Asus Tuf FA506IHRB.jpg','/storage/product/1/CerzEfkEFSIUKpwht3GOshfaCrRl5mAw8XHUmCg2.jpg',3,NULL,NULL),(9,'Asus Tuf Gaming F15.jpg','/storage/product/1/l3xnCV3F6FFChZfUUPv2aaJCQCN2pr267JmU5kHP.jpg',3,NULL,NULL),(10,'Acer Predator Helios.jpg','/storage/product/1/cPOp2S5lg02RnZ00padLAQhvJKuJHHvRe95rWKlM.jpg',4,NULL,NULL),(11,'Acer Predator Triton 300.jpg','/storage/product/1/wvgMz5NZ9Dx36cApwTkBVlcT9P32FBeo6KZ2yNVO.jpg',4,NULL,NULL),(12,'Acer Predator Triton 500 SE.jpg','/storage/product/1/MfbokEg8dWpreQHs4bKPiRRh6PCZNCOIAFQXTkOa.jpg',4,NULL,NULL),(13,'MSI Bravo 15.jpg','/storage/product/1/6dqkNK2HAPVrDrD17mmTlJyN83DreBfde1sf2xEZ.jpg',5,NULL,NULL),(14,'MSI Crosshair 17.jpg','/storage/product/1/F4RBSKVgn0dLbWMmxhFebmSa5xY3uXIQchm6PHw8.jpg',5,NULL,NULL),(15,'MSI GF63 Thin 11SC.jpg','/storage/product/1/2KH91LBJPWqsKNtoU0Pf8aSGjuJFhaFxF19Qz7wQ.jpg',5,NULL,NULL),(16,'MSI Crosshair 17.jpg','/storage/product/1/cFzHmtOuu4GDcFFQFdTGKRx9AAXcVYbKboTCCLvg.jpg',6,NULL,NULL),(17,'MSI GF63 Thin 11SC.jpg','/storage/product/1/qNYVF4OnGq3AkeIAn8FbppiiFJg5MqRg4WmsVb2i.jpg',6,NULL,NULL),(18,'MSI Raider GE76.jpg','/storage/product/1/ceBvvHRrN11tuxQNyw5YEDmS7HpxnPaTS9lqTN8P.jpg',6,NULL,NULL),(19,'Acer Predator Helios.jpg','/storage/product/1/5XhezXEkXg4Bs1EzdxbIhbM1eEoOOGWdMkWXKDpr.jpg',7,NULL,NULL),(20,'Acer Predator Triton 300.jpg','/storage/product/1/7yCN9G3JyeZqyyZSqxkDiaMolDh3VewykRIvImT2.jpg',7,NULL,NULL),(21,'Acer Predator Triton 500 SE.jpg','/storage/product/1/EU7AzGrzGDnjeAG7Jvyy7jnTF9KpIKxUkb5TAzCZ.jpg',7,NULL,NULL),(22,'Acer Nitro 5 Eagle.jpg','/storage/product/1/jWGRozW8vdQV58brZHOYoplgpvwijkacN53bQXrD.jpg',8,NULL,NULL),(23,'Acer Predator Helios.jpg','/storage/product/1/9OYJcgMt5OacT6zeZLaGWZUs1SQvGSMh6vwAbZ0a.jpg',8,NULL,NULL),(24,'Acer Predator Triton 300.jpg','/storage/product/1/Ij1FpFDaxqKsXX8W6kyh4W5UrmNcXxsLGoSzbkSr.jpg',8,NULL,NULL),(25,'Asus ROG Zephyrus .jpg','/storage/product/1/aWddGW6yCGmsPBp28mHOwvcuNbIJgthMh9tYRRSL.jpg',9,NULL,NULL),(26,'Asus Tuf FA506IHRB.jpg','/storage/product/1/FtsYXE63kaLWQR4UcjwyeItwSWaYcfBZODPnHFPF.jpg',9,NULL,NULL),(27,'Asus Tuf Gaming F15.jpg','/storage/product/1/22bgQk6QLFpbtFR4zCNApDe4ObZCyYNxVJdng0OS.jpg',9,NULL,NULL),(28,'Dell Vostro 3400.jpg','/storage/product/1/TXkDfhD1RT7gtOTHDhgCbo7EEArjBspkswUo6gbY.jpg',10,NULL,NULL),(29,'MSI Modern 14 B11MOU.jpg','/storage/product/1/XtoNheBTXi8uF6uRcOcAFsm122WKhmOlPHOaOqSN.jpg',11,NULL,NULL),(30,'MSI Modern 15 A5M.jpg','/storage/product/1/Q6gHGZjbWtJ9kiYK6QoV60hhkFybY6xvtus1ifra.jpg',11,NULL,NULL),(31,'PBT Doubleshot.jpg','/storage/product/1/j0qBlbXNFFJdKLdbLnVGMhTmbdbjeUoPvLvpf1uh.jpg',12,NULL,NULL),(32,'AKKO – NEON.jpg','/storage/product/1/78RpnYBtMN5R7zr6DPBCmkC0gd9Pp1HPQPvbrb21.jpg',13,NULL,NULL),(33,'PBT Doubleshot.jpg','/storage/product/1/Ht0B0Qca0Ko6tNsX4k0DDRfQ3r5DtnN5nivqesAx.jpg',13,NULL,NULL),(34,'HyperX Pulsefire Haste Black Wireless.jpg','/storage/product/1/LoI0d79yN0pgbeif4PfYdebi4u98hNbq7aWQUUL9.jpg',14,NULL,NULL),(35,'Logitech Lift Vertical.jpg','/storage/product/1/w6hFOpwTAXrPTbOacCvEAvHZLUP27zMP90kiy3EO.jpg',14,NULL,NULL),(36,'SteelSeries Aerox 5 Wireless.jpg','/storage/product/1/VehkjoR7CBjLceMOkNfCHpUpUAH5Y5472Wo0yoUj.jpg',14,NULL,NULL),(37,'Dell Vostro 3400.jpg','/storage/product/1/hDhefsE6AnoHAo3qkGKsnbLrdwFufDtm0IWkqmFr.jpg',15,NULL,NULL),(38,'HyperX Pulsefire Haste Black Wireless.jpg','/storage/product/1/c9JOlgig9NVyO4I495QlvRR0RM1YsoDTPduhufeY.jpg',16,NULL,NULL),(39,'SteelSeries Aerox 5 Wireless.jpg','/storage/product/1/PjvO7DRwcBCWSADZXDwydSD807wJrijUMG6nTepJ.jpg',16,NULL,NULL),(40,'MSI Bravo 15.jpg','/storage/product/1/zj3ySg9kfPDndIJGLLL96GQuZdWnVufeDhEdP0Tp.jpg',17,NULL,NULL),(41,'MSI Crosshair 17.jpg','/storage/product/1/YLuOITEjX7ts0aCgpTQDvNIo5l7lIFhyTEMSCD1G.jpg',17,NULL,NULL),(42,'MSI GF63 Thin 11SC.jpg','/storage/product/1/3p8tHoX6rOziWqRdPX0DppxzO2OJhaRAeeYb2mGY.jpg',17,NULL,NULL),(43,'Acer Predator Helios.jpg','/storage/product/1/IYEcj90wGjtCyNoHHz5GyQkVRDzGETSLNyrsi0Ym.jpg',18,NULL,NULL),(44,'Acer Predator Triton 300.jpg','/storage/product/1/ZYn44nnPrapPptdSQ2ZiBH2pc5GPnI3KVo4SAxQ6.jpg',18,NULL,NULL),(45,'Acer Predator Triton 500 SE.jpg','/storage/product/1/0SdyE6XzpcQYr46g9zySLJANnEcEbxqtlAAJRnDq.jpg',18,NULL,NULL),(46,'Acer Predator Helios.jpg','/storage/product/1/jmoq5omdbb2MHxMw7csY00yDdtmxGR3LkH65i3Go.jpg',19,NULL,NULL),(47,'Acer Predator Triton 300.jpg','/storage/product/1/W5Cbn2BtCCgRFNcPbE1U67jugPN7HtI8PD86kwaS.jpg',19,NULL,NULL),(48,'Acer Predator Triton 500 SE.jpg','/storage/product/1/kps4hApUa2wWpaOre29AZ98mh8jlKlr5mSQYHQQ5.jpg',19,NULL,NULL),(49,'Acer Predator Helios.jpg','/storage/product/1/lT2Iyrp7HhYUBtDi7t1r9jm0ver7Y05PKfrLG2UA.jpg',20,NULL,NULL),(50,'Acer Predator Triton 300.jpg','/storage/product/1/hYfm0qixIDniYiidPeq6xzLZGfS2CyRvNVR4RKox.jpg',20,NULL,NULL),(51,'Acer Predator Triton 500 SE.jpg','/storage/product/1/1fds3N5Lq6Aj8IvNDZlRExcc9t2VN8hzrRbivOgV.jpg',20,NULL,NULL),(52,'MSI Crosshair 17.jpg','/storage/product/1/Y7SsxIvnfIN5MCg3Qvr73jpazd70l5XumhGlrh9J.jpg',21,NULL,NULL),(53,'MSI GF63 Thin 11SC.jpg','/storage/product/1/w8CpmB2s9tCENOZR6sGavTtCUTTCrdlLxZl0PQm8.jpg',21,NULL,NULL),(54,'MSI Raider GE76.jpg','/storage/product/1/hfnnVyqoIqRtnExdERM1R7xpEeOq4JuF0tDu4nEs.jpg',21,NULL,NULL);
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_tags`
--

DROP TABLE IF EXISTS `product_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `tag_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tags`
--

LOCK TABLES `product_tags` WRITE;
/*!40000 ALTER TABLE `product_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `brand_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'Acer Aspire 7 A715','15,490,000','/storage/product/1/TdX3zNizu008ok26XUJmg1gwTiz8E1WGh5iwpRV9.jpg','Acer Predator Helios.jpg','With an Intel Core i5-10300H CPU and powerful GeForce GTX™ 1650 GPU, action games will run fast, smoothly, and get the most out of the 144Hz refresh rate IPS display.',1,3,'2022-08-22 18:00:23','2022-08-22 18:00:23',NULL,1),(3,'ASUS TUF Gaming F15','15,490,000','/storage/product/1/WsjECAfPB8uDtDEKDUC7wIkb724Xz25Oxtnipjv9.jpg','Asus ROG Zephyrus .jpg','With an Intel Core i5-10300H CPU and powerful GeForce GTX™ 1650 GPU, action games will run fast, smoothly, and get the most out of the 144Hz refresh rate IPS display.',1,3,'2022-08-22 18:01:05','2022-08-22 18:01:05',NULL,2),(4,'Acer Aspire 3 A315','15,490,000','/storage/product/1/6WcxpAx21B9Hb1MdlQikaFVMla6osUrzvPSdT35w.jpg','Acer Predator Helios.jpg','With an Intel Core i5-10300H CPU and powerful GeForce GTX™ 1650 GPU, action games will run fast, smoothly, and get the most out of the 144Hz refresh rate IPS display.',1,3,'2022-08-22 18:01:30','2022-08-22 18:01:30',NULL,1),(5,'MSI Bravo 15 B5DD 276VN','15,490,000','/storage/product/1/0sWVOXCsGFbn208zy3abifeBZpaNweA7ywy0yxKi.jpg','MSI Bravo 15.jpg','With an Intel Core i5-10300H CPU and powerful GeForce GTX™ 1650 GPU, action games will run fast, smoothly, and get the most out of the 144Hz refresh rate IPS display.',1,3,'2022-08-22 18:01:58','2022-08-22 18:01:58',NULL,4),(6,'MSI Delta 15 A5EFK 095VN','15,490,000','/storage/product/1/3YbwttQS6IAstnfkmJ6PioQdNniCNTUlrhUrWML1.jpg','MSI Bravo 15.jpg','With an Intel Core i5-10300H CPU and powerful GeForce GTX™ 1650 GPU, action games will run fast, smoothly, and get the most out of the 144Hz refresh rate IPS display.',1,3,'2022-08-22 18:02:26','2022-08-22 18:02:26',NULL,4),(7,'Acer Swift 3 SF314 43 R52K','15,490,000','/storage/product/1/c20DSFAVXrXecPE9j2ZKZPEaytelyVaBQXt0xOeD.jpg','Acer Nitro 5 Eagle.jpg','With an Intel Core i5-10300H CPU and powerful GeForce GTX™ 1650 GPU, action games will run fast, smoothly, and get the most out of the 144Hz refresh rate IPS display.',1,3,'2022-08-22 18:02:59','2022-08-22 18:02:59',NULL,1),(8,'Acer Aspire 5 A514 54 59QK','15,490,000','/storage/product/1/Gg6vxAfPKdfodvFyp7CpzDDITiXiyxJaUJKAF5g5.jpg','Acer Predator Triton 500 SE.jpg','With an Intel Core i5-10300H CPU and powerful GeForce GTX™ 1650 GPU, action games will run fast, smoothly, and get the most out of the 144Hz refresh rate IPS display.',1,3,'2022-08-22 18:03:26','2022-08-22 18:03:26',NULL,1),(9,'Asus VivoBook A415EA','15,490,000','/storage/product/1/dwjyPrdvhxjrlVuEhJyJ0wqegW7jINlccBBoxgrq.jpg','Asus ROG Strix G15.jpg','With an Intel Core i5-10300H CPU and powerful GeForce GTX™ 1650 GPU, action games will run fast, smoothly, and get the most out of the 144Hz refresh rate IPS display.',1,3,'2022-08-22 18:03:50','2022-08-22 18:03:50',NULL,2),(10,'Dell Vostro 3420 70283384','15,490,000','/storage/product/1/aB2CIUgmvtoXSELIY9UT3NQixuzfAK0jyJTFHfti.jpg','Dell Vostro 3400.jpg','With an Intel Core i5-10300H CPU and powerful GeForce GTX™ 1650 GPU, action games will run fast, smoothly, and get the most out of the 144Hz refresh rate IPS display.',1,5,'2022-08-22 18:04:25','2022-08-22 18:04:25',NULL,3),(11,'MSI Modern 14 B5M 202VN','15,490,000','/storage/product/1/FtbYeksV8BhGjRu0VSCn6W7G62DQ10RtDVlrxWrT.jpg','MSI Modern 14 B11MOU.jpg','With an Intel Core i5-10300H CPU and powerful GeForce GTX™ 1650 GPU, action games will run fast, smoothly, and get the most out of the 144Hz refresh rate IPS display.',1,5,'2022-08-22 18:04:55','2022-08-22 18:04:55',NULL,4),(12,'AKKO – NEON','100,000','/storage/product/1/64FFVBzl7qEfuLMLTo2AlkXVJD4BsYCG5B5K9Opg.jpg','AKKO – NEON.jpg','With an Intel Core i5-10300H CPU and powerful GeForce GTX™ 1650 GPU, action games will run fast, smoothly, and get the most out of the 144Hz refresh rate IPS display.',1,7,'2022-08-22 18:05:30','2022-08-22 18:05:30',NULL,1),(13,'PBT Doubleshot','2,500,000','/storage/product/1/LVbpD5PHXyAuDCQxb78kRxWxkqxzBFdvaI6kGuas.jpg','AKKO – NEON.jpg','PBT Doubleshot',1,7,'2022-08-22 18:06:15','2022-08-22 18:06:15',NULL,1),(14,'Logitech Lift Vertical','15,490,000','/storage/product/1/jczQIaTzMS6qp80eBG0IkyEFO2IilnYqryK5XrQP.jpg','HyperX Pulsefire Haste Black Wireless.jpg','SteelSeries Aerox 5 Wireless',1,8,'2022-08-22 18:06:43','2022-08-22 18:06:43',NULL,1),(15,'Dell Vostro 3420','15,490,000','/storage/product/1/olxyMpmJu1URLUOQLE0RrsjLzcwpnDOcatRNLAxp.jpg','Dell Vostro 3400.jpg','Dell Vostro 3420',1,5,'2022-08-22 18:07:37','2022-08-22 18:07:37',NULL,3),(16,'SteelSeries Aerox 5 Wireless','15,490,000','/storage/product/1/EivztSQGiYR3UJ7kQQFisE3Qsk1IkAJBWHG2Ea3L.jpg','HyperX Pulsefire Haste Black Wireless.jpg','SteelSeries Aerox 5 Wireless',1,8,'2022-08-22 18:08:04','2022-08-22 18:08:04',NULL,1),(17,'MSI Modern 14 B5M 202VN123','15,490,000','/storage/product/1/BEqVTjvuJKJcYbtYBCSOBW2i8lXag9SePDjPAGx1.jpg','Laptop MSI Delta 15.jpg','MSI Modern 14 B5M 202VN123',1,3,'2022-08-22 18:08:44','2022-08-22 18:08:44',NULL,4),(18,'Acer Nitro 5 Eagle AN515','15,490,000','/storage/product/1/XCS63l99AztUtAHvSWgArL54dkEikrRUvva0AKuh.jpg','Acer Nitro 5 Eagle.jpg','<span style=\"color: rgb(0, 26, 51); font-family: &quot;Segoe UI&quot;, SegoeuiPc, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, &quot;Lucida Grande&quot;, Roboto, Ubuntu, Tahoma, &quot;Microsoft Sans Serif&quot;, Arial, sans-serif; font-size: 15px; white-space: pre-wrap;\">Acer Nitro 5 Eagle AN515</span>',1,3,'2022-08-22 18:09:04','2022-08-22 18:09:04',NULL,1),(19,'Acer Predator Triton 500','15,490,000','/storage/product/1/NKT40aG6ofOTKmALJIsmojoOYU9H7XqiowO0FIo3.jpg','Acer Predator Helios.jpg','Acer Predator Triton 500',1,3,'2022-08-22 18:09:24','2022-08-22 18:09:24',NULL,1),(20,'Acer Predator Helios 300','15,490,000','/storage/product/1/DDETqIBSTJ4EN3YHBWBDssGtCN1TIwUe15zXXmUZ.jpg','Acer Predator Triton 500 SE.jpg','<div class=\"chat-message wrap-message rotate-container  \" id=\"bb_msg_id_1661216948693\" data-node-type=\"bubble-message\" style=\"display: flex; user-select: none; justify-content: flex-start; align-items: flex-start; position: relative; color: rgb(0, 26, 51); font-family: &quot;Segoe UI&quot;, SegoeuiPc, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, &quot;Lucida Grande&quot;, Roboto, Ubuntu, Tahoma, &quot;Microsoft Sans Serif&quot;, Arial, sans-serif; font-size: 15px;\"><div class=\"\" style=\"display: flex; width: 735.2px;\"><div class=\"card  card--text\" data-id=\"div_ReceivedMsg_Text\" style=\"display: block; flex-flow: row nowrap; padding: 12px; border-radius: 8px; background: var(--white-300); margin-bottom: 4px; box-shadow: 0 1px 0 0 var(--box-popover); user-select: text; min-width: 32px; max-width: calc(100% - 38px);\"><div class=\"chat-message wrap-message rotate-container  \" id=\"bb_msg_id_1661216948693\" data-node-type=\"bubble-message\" style=\"display: flex; user-select: none; justify-content: flex-start; align-items: flex-start; position: relative;\"><div class=\"\" style=\"display: flex; width: 735.2px;\"><div class=\"card  card--text\" data-id=\"div_ReceivedMsg_Text\" style=\"display: block; flex-flow: row nowrap; padding: 12px; border-radius: 8px; background: var(--white-300); margin-bottom: 4px; box-shadow: 0 1px 0 0 var(--box-popover); user-select: text; min-width: 32px; max-width: calc(100% - 38px);\"><div><span id=\"mtc-3664374419688\"><span class=\"text\" style=\"user-select: text; white-space: pre-wrap;\">Acer Predator Helios 300</span></span></div><div style=\"margin: 3px -5px 0px;\"></div><div class=\"message-reaction-container  show-react-btn\" style=\"position: absolute; display: flex; bottom: -15px; z-index: 3; right: 12px; user-select: none;\"><div data-id=\"btn_ReceivedMsg_React\" style=\"position: relative;\"><div class=\"msg-reaction-icon\" style=\"position: relative; border-radius: 100%; padding: 5px; line-height: normal; font-size: 14px; text-align: center; cursor: pointer; border: 0.5px solid var(--grey-300); background-color: var(--white-300); z-index: 1;\"><div class=\"default-react-icon-thumb\" style=\"background-size: 13px; position: relative; width: 14px; height: 14px; background-repeat: no-repeat; background-image: url(&quot;https://res-zalo.zadn.vn/upload/media/2019/1/25/iconlike_1548389696575_103596.png&quot;);\"></div></div><div class=\"emoji-list-wrapper  hide-elist\" style=\"padding-bottom: 18px; position: absolute; left: -92px; top: -41px; visibility: hidden;\"><div class=\"reaction-emoji-list \" style=\"display: flex; opacity: 0.95; border-radius: 20px; padding: 0px 10px; box-shadow: 0 0 5px 0 var(--box-popover); background-color: var(--white-300);\"><div class=\"reaction-emoji-icon\" style=\"margin: 8px 7px 6px; position: relative; width: 22px; height: 22px; cursor: pointer;\"><span class=\"emoji-sizer emoji-outer \" style=\"display: inline-block; overflow: hidden; letter-spacing: 50px; color: transparent; text-shadow: none; width: 22px; height: 22px; position: relative; left: 0px; background: url(&quot;assets/emoji.1e7786c93c8a0c1773f165e2de2fd129.png?v=20180604&quot;) 84% 82.5% / 5100%; -webkit-user-drag: none; margin: -1px; top: 2px;\"></span></div><div class=\"reaction-emoji-icon\" style=\"margin: 8px 7px 6px; position: relative; width: 22px; height: 22px; cursor: pointer;\"><span class=\"emoji-sizer emoji-outer \" style=\"display: inline-block; overflow: hidden; letter-spacing: 50px; color: transparent; text-shadow: none; width: 22px; height: 22px; position: relative; left: 0px; background: url(&quot;assets/emoji.1e7786c93c8a0c1773f165e2de2fd129.png?v=20180604&quot;) 84% 72.5% / 5100%; -webkit-user-drag: none; margin: -1px; top: 2px;\"></span></div><div class=\"reaction-emoji-icon\" style=\"margin: 8px 7px 6px; position: relative; width: 22px; height: 22px; cursor: pointer;\"><span class=\"emoji-sizer emoji-outer \" style=\"display: inline-block; overflow: hidden; letter-spacing: 50px; color: transparent; text-shadow: none; width: 22px; height: 22px; position: relative; left: 0px; background: url(&quot;assets/emoji.1e7786c93c8a0c1773f165e2de2fd129.png?v=20180604&quot;) 82% 7.5% / 5100%; -webkit-user-drag: none; margin: -1px; top: 2px;\"></span></div><div class=\"reaction-emoji-icon\" style=\"margin: 8px 7px 6px; position: relative; width: 22px; height: 22px; cursor: pointer;\"><span class=\"emoji-sizer emoji-outer \" style=\"display: inline-block; overflow: hidden; letter-spacing: 50px; color: transparent; text-shadow: none; width: 22px; height: 22px; position: relative; left: 0px; background: url(&quot;assets/emoji.1e7786c93c8a0c1773f165e2de2fd129.png?v=20180604&quot;) 84% 20% / 5100%; -webkit-user-drag: none; margin: -1px; top: 2px;\"></span></div><div class=\"reaction-emoji-icon\" style=\"margin: 8px 7px 6px; position: relative; width: 22px; height: 22px; cursor: pointer;\"><span class=\"emoji-sizer emoji-outer \" style=\"display: inline-block; overflow: hidden; letter-spacing: 50px; color: transparent; text-shadow: none; width: 22px; height: 22px; position: relative; left: 0px; background: url(&quot;assets/emoji.1e7786c93c8a0c1773f165e2de2fd129.png?v=20180604&quot;) 84% 2.5% / 5100%; -webkit-user-drag: none; margin: -1px; top: 2px;\"></span></div><div class=\"reaction-emoji-icon\" style=\"margin: 8px 7px 6px; position: relative; width: 22px; height: 22px; cursor: pointer;\"><span class=\"emoji-sizer emoji-outer \" style=\"display: inline-block; overflow: hidden; letter-spacing: 50px; color: transparent; text-shadow: none; width: 22px; height: 22px; position: relative; left: 0px; background: url(&quot;assets/emoji.1e7786c93c8a0c1773f165e2de2fd129.png?v=20180604&quot;) 84% 5% / 5100%; -webkit-user-drag: none; margin: -1px; top: 2px;\"></span></div></div></div></div></div></div><div class=\"chat-message__actionholder \" style=\"contain: strict; pointer-events: none; min-height: 28px; margin-left: 10px; min-width: 116px;\"></div></div></div><div class=\"chat-message wrap-message rotate-container  -send-time\" id=\"bb_msg_id_1661216962043\" data-node-type=\"bubble-message\" style=\"display: flex; user-select: none; justify-content: flex-start; align-items: flex-start; position: relative;\"><div class=\"\" style=\"display: flex; width: 735.2px;\"><div class=\"card  pin-react  last-msg card--text\" data-id=\"div_LastReceivedMsg_Text\" style=\"display: block; flex-flow: row nowrap; padding: 12px; border-radius: 8px; background: var(--white-300); margin-bottom: 4px; box-shadow: 0 1px 0 0 var(--box-popover); user-select: text; min-width: 60px; max-width: calc(100% - 38px);\"></div></div></div></div></div></div>',1,3,'2022-08-22 18:09:46','2022-08-22 18:09:46',NULL,1),(21,'MSI Creator Z16 A11UET 218VN','15,490,000','/storage/product/1/5kuWettZSGFucLpH7EF8nnxnpxmcxtkzmQwZFd90.jpg','MSI Bravo 15.jpg','MSI Creator Z16 A11UET 218VN',1,5,'2022-08-22 18:10:09','2022-08-22 18:10:09',NULL,4);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint NOT NULL,
  `permisison_id` bigint NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `permissions_encode` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','{\"user\":[\"list\",\"create\",\"edit\",\"delete\",\"update\"],\"menu\":[\"list\",\"create\",\"edit\",\"delete\",\"post\",\"update\"],\"product\":[\"list\",\"create\",\"edit\",\"delete\",\"update\"],\"category\":[\"list\",\"create\",\"edit\",\"delete\",\"update\"],\"role\":[\"list\",\"create\",\"edit\",\"delete\",\"permission\",\"update\"],\"action\":[\"list\",\"create\",\"edit\",\"delete\",\"update\"],\"brand\":[\"list\",\"create\",\"edit\",\"delete\",\"update\"]}',1,'minan','','2022-08-20 05:37:22','2022-08-22 19:24:46'),(2,'guest','Guest','{\"menu\":[\"list\",\"create\",\"edit\",\"delete\"],\"product\":[\"list\",\"create\",\"edit\",\"delete\"],\"category\":[\"list\",\"create\",\"edit\",\"delete\"],\"brand\":[\"list\",\"create\",\"edit\",\"delete\"]}',1,'minan','','2022-08-20 05:37:22','2022-08-22 18:36:04'),(3,'developer','Developer','{\"user\":[\"list\",\"create\",\"edit\",\"delete\"],\"menu\":[\"list\",\"create\",\"edit\",\"delete\"],\"product\":[\"list\",\"create\",\"edit\",\"delete\"],\"category\":[\"list\",\"create\",\"edit\",\"delete\"],\"action\":[\"list\",\"create\",\"edit\",\"delete\"],\"brand\":[\"list\",\"create\",\"edit\",\"delete\"]}',1,'minan','','2022-08-20 05:37:22','2022-08-22 18:36:27');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint NOT NULL DEFAULT '0',
  `permisisons` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'minan','annogo123@gmail.com','2022-08-20 05:30:08','$2y$10$GlMZ7.dt8XCeT2ovmBFfZ.fmREBByalWHGdVGFvN.vewFuHsRsacO',NULL,'2022-08-20 05:30:08','2022-08-20 05:30:08','1','0','au duong lan','p3','q8',1,NULL,1),(2,'kyhung','kyhung123@gmail.com',NULL,'$2y$10$GlMZ7.dt8XCeT2ovmBFfZ.fmREBByalWHGdVGFvN.vewFuHsRsacO',NULL,'2022-08-21 05:09:51','2022-08-22 19:56:13','2','1','nguyen trai','ben thanh','1',0,NULL,0),(3,'minhan','dpnguyen@gmail.com',NULL,'$2y$10$GlMZ7.dt8XCeT2ovmBFfZ.fmREBByalWHGdVGFvN.vewFuHsRsacO',NULL,'2022-08-22 17:34:50','2022-08-22 17:34:50','0',NULL,NULL,NULL,NULL,0,NULL,0),(4,'Pham An','annogo1234@gmail.com',NULL,'$2y$10$KvO5DkTZxANZYDg97/K2/eZFul8kmMrK8An0B4psMSSoZuOmQHxZ.',NULL,'2022-08-22 18:14:29','2022-08-22 18:14:29','1','1','Au duong lan','p3','q8',0,NULL,0);
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

-- Dump completed on 2022-08-25  9:06:51
