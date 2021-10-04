# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.21-MariaDB)
# Database: scoring_app
# Generation Time: 2021-10-04 06:29:13 +0000
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
	(2,1,'John','john@gmail.com','2525252525','sca_61548eb08f94b1632931504.jpg','2021-09-29 16:05:04','2021-09-29 16:05:04'),
	(3,1,'Maria','maria@gmail.com','1235696969','sca_61548edbdb13d1632931547.jpg','2021-09-29 16:05:47','2021-09-29 16:05:47'),
	(4,2,'Sumanta Kundu','sumanta@gmail.com','1254789602','sca_61549005b66401632931845.jpg','2021-09-29 16:10:45','2021-09-29 16:10:45'),
	(5,4,'Sam','sam@gmail.com','1254896302','sca_615490ddd4ded1632932061.jpg','2021-09-29 16:14:21','2021-09-29 16:14:21'),
	(6,2,'Peter','peter@gmail.com','2541456590','sca_615574855c59a1632990341.jpg','2021-09-30 08:25:41','2021-09-30 08:25:41'),
	(7,2,'Maria','m@gmail.com','1245789630','sca_61559346e03b71632998214.jpg','2021-09-30 10:36:54','2021-09-30 10:36:54'),
	(8,2,'Srobona Dutta','hykhkn@gmail.com','1234567890','sca_6155a5362ee641633002806.jpg','2021-09-30 11:53:26','2021-09-30 11:53:26'),
	(10,2,'Sam','sam123@gmail.com','1245859630','sca_6155c73a6c76d1633011514.jpg','2021-09-30 14:18:34','2021-09-30 14:18:34'),
	(11,8,'John Doe','johndoe@yahoo.com','1234567890','sca_6158179d4acb31633163165.jpg','2021-10-02 08:26:05','2021-10-02 08:26:05');

/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;
UNLOCK TABLES;


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
	(1,1,2,'Employment history','FCD40A,40F328','2021-09-30 06:21:29','2021-10-03 22:37:51'),
	(2,1,2,'Personality','138D07','2021-09-30 07:17:04','2021-10-03 22:37:54'),
	(3,2,2,'References','FCD40A,F56A21','2021-09-30 08:12:27','2021-10-03 22:37:56'),
	(5,2,2,'Others','F56A21,FC0A0A','2021-09-30 14:16:42','2021-10-03 22:37:59'),
	(6,0,1,'Performance','138D07','2021-10-02 05:26:26','2021-10-02 05:26:26'),
	(7,0,1,'History','FCD40A,40F328','2021-10-02 05:26:51','2021-10-02 05:26:51'),
	(8,0,8,'Performance','138D07','2021-10-02 08:23:28','2021-10-02 08:23:28'),
	(9,0,8,'Employment history','40F328,138D07','2021-10-02 08:23:42','2021-10-02 08:23:42'),
	(10,0,8,'Others','FC0A0A','2021-10-02 08:27:29','2021-10-02 08:27:29');

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
	(1,2,4,'2021-10-03 13:28:40','2021-10-03 13:29:00'),
	(2,2,6,'2021-10-03 13:28:40','2021-10-03 13:29:00');

/*!40000 ALTER TABLE `finalists` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table maincriterias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `maincriterias`;

CREATE TABLE `maincriterias` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `criteria_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `maincriterias` WRITE;
/*!40000 ALTER TABLE `maincriterias` DISABLE KEYS */;

INSERT INTO `maincriterias` (`id`, `criteria_name`)
VALUES
	(1,'Main criteria 1'),
	(2,'Main criteria 2');

/*!40000 ALTER TABLE `maincriterias` ENABLE KEYS */;
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
	(12,33,'This is my first note.','','2021-10-03 07:31:02','2021-10-03 07:39:24'),
	(13,33,'',NULL,'2021-10-03 07:31:21','2021-10-03 07:39:20'),
	(14,34,'dsadddadsa','scF_61595ce23c7741633246434.pdf','2021-10-03 07:33:54','2021-10-03 07:33:54'),
	(15,34,'sddd4444','','2021-10-03 07:34:14','2021-10-03 07:39:03'),
	(16,34,'',NULL,'2021-10-03 07:34:52','2021-10-03 07:38:48'),
	(17,33,NULL,'scF_61595e328f2ce1633246770.pdf','2021-10-03 07:39:30','2021-10-03 07:39:30'),
	(18,26,NULL,NULL,'2021-10-03 08:21:14','2021-10-03 08:21:14'),
	(19,3,NULL,NULL,'2021-10-03 08:21:25','2021-10-03 08:21:25'),
	(20,35,NULL,NULL,'2021-10-03 19:33:23','2021-10-03 19:33:23'),
	(21,36,NULL,NULL,'2021-10-03 19:33:33','2021-10-03 19:33:33'),
	(22,37,NULL,NULL,'2021-10-03 19:33:43','2021-10-03 19:33:43'),
	(23,38,NULL,NULL,'2021-10-03 19:33:53','2021-10-03 19:33:53');

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
	(1,2,2,4,2,4,NULL,NULL,'2021-09-30 14:37:47','2021-10-01 12:02:13'),
	(3,1,2,6,1,5,NULL,NULL,'2021-09-30 14:37:47','2021-10-03 08:21:25'),
	(22,1,2,4,3,3,NULL,NULL,'2021-10-01 08:09:49','2021-10-01 13:40:00'),
	(23,1,2,4,2,5,NULL,NULL,'2021-10-01 08:10:26','2021-10-01 13:40:35'),
	(24,1,2,4,1,5,NULL,NULL,'2021-10-01 08:33:22','2021-10-01 08:33:22'),
	(25,2,2,4,1,3,NULL,NULL,'2021-10-01 08:33:35','2021-10-01 14:03:55'),
	(26,1,2,6,2,5,'Test note.','scF_61593caa279ae1633238186.pdf','2021-10-01 11:36:56','2021-10-03 08:21:14'),
	(27,1,1,2,6,4,'great performance.','scF_6157ee05828ea1633152517.png','2021-10-02 05:28:37','2021-10-02 05:29:29'),
	(28,1,1,3,7,1,NULL,NULL,'2021-10-02 05:40:57','2021-10-02 05:40:57'),
	(29,2,8,11,8,5,'great...',NULL,'2021-10-02 08:26:38','2021-10-02 08:26:38'),
	(30,1,8,11,8,5,'nice',NULL,'2021-10-02 08:27:04','2021-10-02 08:27:04'),
	(31,1,8,11,10,4,NULL,NULL,'2021-10-02 08:27:46','2021-10-02 08:27:46'),
	(32,2,8,11,10,5,NULL,NULL,'2021-10-02 08:28:06','2021-10-02 08:28:06'),
	(33,1,2,6,3,4,NULL,NULL,'2021-10-03 05:56:48','2021-10-03 07:39:30'),
	(34,1,2,6,5,1,NULL,NULL,'2021-10-03 05:58:53','2021-10-03 07:34:52'),
	(35,1,2,7,1,3,NULL,NULL,'2021-10-03 19:33:23','2021-10-03 19:33:23'),
	(36,1,2,7,3,3,NULL,NULL,'2021-10-03 19:33:33','2021-10-03 19:33:33'),
	(37,1,2,7,5,5,NULL,NULL,'2021-10-03 19:33:43','2021-10-03 19:33:43'),
	(38,1,2,7,2,1,NULL,NULL,'2021-10-03 19:33:53','2021-10-03 19:33:53');

/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table subjects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;

INSERT INTO `subjects` (`id`, `user_id`, `subject_name`, `created_at`, `updated_at`)
VALUES
	(1,1,'Job posting','2021-09-29 14:10:28','2021-09-29 20:15:17'),
	(2,1,'Rental property','2021-09-29 14:10:42','2021-10-01 09:47:09'),
	(4,3,'IT Engineer','2021-09-29 16:07:36','2021-10-02 10:04:24'),
	(5,3,'Test subject','2021-09-29 16:09:56','2021-10-02 10:04:25'),
	(6,3,'Test subject','2021-09-29 16:13:45','2021-10-02 10:04:27'),
	(7,1,'56 State St.','2021-10-02 05:42:15','2021-10-02 05:42:15'),
	(8,1,'Test Subject','2021-10-02 05:43:02','2021-10-02 05:43:02');

/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;

INSERT INTO `teams` (`id`, `user_id`, `subject_id`, `created_at`, `updated_at`)
VALUES
	(1,1,2,'2021-10-01 09:43:02','2021-10-01 09:54:51'),
	(2,2,2,'2021-10-01 09:54:56','2021-10-01 09:54:56'),
	(3,1,1,'2021-10-02 11:03:18','2021-10-02 11:03:18'),
	(4,1,7,'2021-10-02 05:42:15','2021-10-02 05:42:15'),
	(5,1,8,'2021-10-02 05:43:02','2021-10-02 05:43:02'),
	(7,2,1,'2021-10-02 06:57:20','2021-10-02 06:57:20'),
	(14,2,7,'2021-10-02 07:20:47','2021-10-02 07:20:47'),
	(15,2,8,'2021-10-02 08:21:19','2021-10-02 08:21:19');

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
	(1,NULL,'James','james@gmail.com','$2y$10$gO4hCRs9K1fiG2jX98eB5uAkdnpayJL7h9Mgarc07bqB/BlpIIz.e','m0X6oKizeYoqGmv4spV2H2ODtjwUcWuVD0znA851K4Gzf6b1WmTTsYBxTKvX','2021-10-02 09:53:18','2021-10-02 04:23:18','2021-10-03 11:12:34'),
	(2,NULL,'Jennifer','jennifer@gmail.com','$2y$10$I8U7VvDLKW8Mi4tBNNx/IOOgdRFfWm0N1J6hFoQUqJykBxwi5HIkG','fp13zHVy8rIV8Ik9zscEKeI2ZjbYE2PHKMu3NxtC5o2Skb9sEZUVoaxmXInG','2021-10-02 09:53:44','2021-10-02 04:23:44','2021-10-03 11:13:38');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
