# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.21-MariaDB)
# Database: scoring_app
# Generation Time: 2021-10-04 16:26:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table applicants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `applicants`;

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `applicants` WRITE;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;

INSERT INTO `applicants` (`id`, `subject_id`, `name`, `email`, `phone`, `photo`, `created_at`, `updated_at`)
VALUES
	(18,11,'Sumanta Kundu','sumanta@gmail.com','66666666',NULL,'2021-10-04 15:00:52','2021-10-04 15:00:52'),
	(19,11,'Srobona Dutta','srobona@yahoo.com','4567890989',NULL,'2021-10-04 15:01:15','2021-10-04 15:01:15');

/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bulkemails
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bulkemails`;

CREATE TABLE `bulkemails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;



# Dump of table criterias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `criterias`;

CREATE TABLE `criterias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maincriteria_id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `criterias` WRITE;
/*!40000 ALTER TABLE `criterias` DISABLE KEYS */;

INSERT INTO `criterias` (`id`, `maincriteria_id`, `subject_id`, `title`, `priority`, `created_at`, `updated_at`)
VALUES
	(19,6,11,'Personality','138D07','2021-10-04 14:47:50','2021-10-04 14:47:50'),
	(20,6,11,'Employment history','FCD40A','2021-10-04 14:48:05','2021-10-04 14:48:05'),
	(21,7,11,'Personality','FCD40A,40F328','2021-10-04 14:48:25','2021-10-04 14:48:25'),
	(22,7,11,'Others','F56A21,FC0A0A','2021-10-04 14:48:41','2021-10-04 14:48:41'),
	(23,8,11,'Others','FCD40A,40F328','2021-10-04 14:49:04','2021-10-04 14:49:04'),
	(24,7,11,'Performance','138D07','2021-10-04 14:50:05','2021-10-04 14:50:05');

/*!40000 ALTER TABLE `criterias` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table finalists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `finalists`;

CREATE TABLE `finalists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `finalists` WRITE;
/*!40000 ALTER TABLE `finalists` DISABLE KEYS */;

INSERT INTO `finalists` (`id`, `subject_id`, `applicant_id`, `created_at`, `updated_at`)
VALUES
	(6,11,18,'2021-10-04 15:05:48','2021-10-04 15:05:48');

/*!40000 ALTER TABLE `finalists` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table maincriterias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `maincriterias`;

CREATE TABLE `maincriterias` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `criteria_name` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `maincriterias` WRITE;
/*!40000 ALTER TABLE `maincriterias` DISABLE KEYS */;

INSERT INTO `maincriterias` (`id`, `user_id`, `subject_id`, `criteria_name`, `created_at`, `updated_at`)
VALUES
	(6,1,11,'Main criteria 1','2021-10-04 14:47:37','2021-10-04 14:47:37'),
	(7,1,11,'Main criteria 2','2021-10-04 14:48:18','2021-10-04 14:48:18'),
	(8,1,11,'Main criteria 3','2021-10-04 14:48:56','2021-10-04 14:48:56');

/*!40000 ALTER TABLE `maincriterias` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mainsubjects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mainsubjects`;

CREATE TABLE `mainsubjects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `main_subject_name` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `mainsubjects` WRITE;
/*!40000 ALTER TABLE `mainsubjects` DISABLE KEYS */;

INSERT INTO `mainsubjects` (`id`, `user_id`, `main_subject_name`, `created_at`, `updated_at`)
VALUES
	(5,1,'Main Subject 001','2021-10-04 14:46:50','2021-10-04 14:46:50'),
	(6,1,'Main Subject 002','2021-10-04 15:54:08','2021-10-04 15:54:08');

/*!40000 ALTER TABLE `mainsubjects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table metadatas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `metadatas`;

CREATE TABLE `metadatas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score_id` int(11) DEFAULT NULL,
  `meta_notes` text DEFAULT NULL,
  `meta_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `metadatas` WRITE;
/*!40000 ALTER TABLE `metadatas` DISABLE KEYS */;

INSERT INTO `metadatas` (`id`, `score_id`, `meta_notes`, `meta_file`, `created_at`, `updated_at`)
VALUES
	(36,49,NULL,NULL,'2021-10-04 15:01:22','2021-10-04 15:01:22'),
	(37,50,NULL,NULL,'2021-10-04 15:02:52','2021-10-04 15:02:52'),
	(38,51,NULL,NULL,'2021-10-04 15:03:06','2021-10-04 15:03:06'),
	(39,52,NULL,NULL,'2021-10-04 15:12:01','2021-10-04 15:12:01'),
	(40,53,NULL,NULL,'2021-10-04 15:12:31','2021-10-04 15:12:31'),
	(41,54,NULL,NULL,'2021-10-04 15:13:03','2021-10-04 15:13:03'),
	(42,55,NULL,NULL,'2021-10-04 15:13:18','2021-10-04 15:13:18'),
	(43,56,'bad',NULL,'2021-10-04 15:13:33','2021-10-04 15:13:33'),
	(44,57,NULL,NULL,'2021-10-04 15:14:05','2021-10-04 15:14:05');

/*!40000 ALTER TABLE `metadatas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table scores
# ------------------------------------------------------------

DROP TABLE IF EXISTS `scores`;

CREATE TABLE `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `subject_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `criteria_id` int(11) DEFAULT NULL,
  `score_number` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `score_files` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;

INSERT INTO `scores` (`id`, `user_id`, `subject_id`, `applicant_id`, `criteria_id`, `score_number`, `notes`, `score_files`, `created_at`, `updated_at`)
VALUES
	(49,1,11,18,19,4,NULL,NULL,'2021-10-04 15:01:22','2021-10-04 15:01:22'),
	(50,1,11,18,23,3,NULL,NULL,'2021-10-04 15:02:52','2021-10-04 15:02:52'),
	(51,1,11,18,22,1,NULL,NULL,'2021-10-04 15:03:06','2021-10-04 15:03:06'),
	(52,1,11,18,20,5,NULL,NULL,'2021-10-04 15:12:01','2021-10-04 15:12:01'),
	(53,2,11,18,19,4,NULL,NULL,'2021-10-04 15:12:31','2021-10-04 15:12:31'),
	(54,2,11,18,20,5,NULL,NULL,'2021-10-04 15:13:03','2021-10-04 15:13:03'),
	(55,2,11,18,21,3,NULL,NULL,'2021-10-04 15:13:18','2021-10-04 15:13:18'),
	(56,2,11,18,24,1,NULL,NULL,'2021-10-04 15:13:33','2021-10-04 15:13:33'),
	(57,2,11,19,23,4,NULL,NULL,'2021-10-04 15:14:05','2021-10-04 15:14:05');

/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table subjects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mainsubject_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;

INSERT INTO `subjects` (`id`, `user_id`, `mainsubject_id`, `subject_name`, `created_at`, `updated_at`)
VALUES
	(11,1,5,'Job posting','2021-10-04 14:47:08','2021-10-04 14:47:08'),
	(12,1,6,'Car rental','2021-10-04 15:54:25','2021-10-04 15:54:25'),
	(13,1,5,'Real estate','2021-10-04 15:55:48','2021-10-04 15:55:48'),
	(14,1,6,'Other','2021-10-04 16:00:27','2021-10-04 16:00:27'),
	(15,1,5,'Test','2021-10-04 16:02:56','2021-10-04 16:02:56');

/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `mainsubject_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;

INSERT INTO `teams` (`id`, user_email, `mainsubject_id`, `subject_id`, `created_at`, `updated_at`)
VALUES
	(19,1,5,11,'2021-10-04 14:47:08','2021-10-04 21:09:48'),
	(20,2,5,11,'2021-10-04 15:06:34','2021-10-04 21:09:51'),
	(21,1,6,12,'2021-10-04 15:54:25','2021-10-04 21:24:51'),
	(22,1,5,13,'2021-10-04 15:55:48','2021-10-04 21:25:58'),
	(23,1,6,14,'2021-10-04 16:00:27','2021-10-04 21:30:38'),
	(24,1,5,15,'2021-10-04 16:02:56','2021-10-04 16:02:56'),
	(26,2,6,12,'2021-10-04 16:11:19','2021-10-04 16:11:19');

/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`)
VALUES
	(1,NULL,'James','james@gmail.com','$2y$10$gO4hCRs9K1fiG2jX98eB5uAkdnpayJL7h9Mgarc07bqB/BlpIIz.e','5L0LfVLSs492S7gkdeE8fEK88MayLLAuNW2P4d7560T0rocLyELxSwfgFJth','2021-10-02 09:53:18','2021-10-02 04:23:18','2021-10-04 21:41:22'),
	(2,NULL,'Jennifer','jennifer@gmail.com','$2y$10$I8U7VvDLKW8Mi4tBNNx/IOOgdRFfWm0N1J6hFoQUqJykBxwi5HIkG','QClmXGoYoBXV4Bg11SuvHl3jFSWmd9askLkpnEJtAtNhLkjcE2dxPZ3eAkmT','2021-10-02 09:53:44','2021-10-02 04:23:44','2021-10-04 21:41:34');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
