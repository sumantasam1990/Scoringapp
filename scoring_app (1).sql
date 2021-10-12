-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2021 at 05:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scoring_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `subject_id`, `name`, `email`, `phone`, `photo`, `created_at`, `updated_at`) VALUES
(18, 11, 'Sumanta Kundu', 'sumanta@gmail.com', '66666666', NULL, '2021-10-04 09:30:52', '2021-10-04 09:30:52'),
(19, 11, 'Srobona Dutta', 'srobona@yahoo.com', '4567890989', NULL, '2021-10-04 09:31:15', '2021-10-04 09:31:15'),
(22, 13, 'Sumanta Kundu', 'sam3456@yahoo.com', '6767676767', NULL, '2021-10-09 22:12:01', '2021-10-09 22:12:01'),
(23, 13, 'Srobona Dutta', 'dutta@g.com', '6767676767', NULL, '2021-10-11 13:05:47', '2021-10-11 13:05:47'),
(24, 13, 'jcjcc', 'hj@g.com', '6767676767', NULL, '2021-10-11 13:06:32', '2021-10-11 13:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `bulkemails`
--

CREATE TABLE `bulkemails` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `bulkemails`
--

INSERT INTO `bulkemails` (`id`, `subject_id`, `applicant_id`, `created_at`, `updated_at`) VALUES
(8, 11, 19, '2021-10-06 09:44:16', '2021-10-06 09:44:16'),
(9, 11, 18, '2021-10-06 09:46:17', '2021-10-06 09:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` int(11) NOT NULL,
  `maincriteria_id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `maincriteria_id`, `subject_id`, `title`, `priority`, `created_at`, `updated_at`) VALUES
(19, 6, 11, 'Personality', '138D07', '2021-10-04 09:17:50', '2021-10-04 09:17:50'),
(20, 6, 11, 'Employment history', 'FCD40A', '2021-10-04 09:18:05', '2021-10-04 09:18:05'),
(21, 7, 11, 'Personality', 'FCD40A,40F328', '2021-10-04 09:18:25', '2021-10-04 09:18:25'),
(22, 7, 11, 'Others', 'F56A21,FC0A0A', '2021-10-04 09:18:41', '2021-10-04 09:18:41'),
(23, 8, 11, 'Others', 'FCD40A,40F328', '2021-10-04 09:19:04', '2021-10-04 09:19:04'),
(24, 7, 11, 'Performance', '138D07', '2021-10-04 09:20:05', '2021-10-04 09:20:05'),
(27, 11, 13, 'Personality', '138D07', '2021-10-09 22:12:23', '2021-10-09 22:12:23'),
(28, 11, 13, 'History', 'FC0A0A', '2021-10-09 22:12:31', '2021-10-09 22:12:31'),
(29, 12, 13, 'Employment history', 'FCD40A', '2021-10-09 22:12:55', '2021-10-09 22:12:55'),
(30, 11, 13, 'Others', 'FC0A0A', '2021-10-09 22:13:08', '2021-10-09 22:13:08'),
(31, 12, 13, 'Test', 'F56A21', '2021-10-09 22:13:29', '2021-10-09 22:13:29'),
(32, 11, 13, 'Nothing', 'FC0A0A', '2021-10-11 13:03:46', '2021-10-11 13:03:46'),
(33, 12, 13, 'Ot', 'FC0A0A', '2021-10-11 13:04:39', '2021-10-11 13:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `finalists`
--

CREATE TABLE `finalists` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finalists`
--

INSERT INTO `finalists` (`id`, `subject_id`, `applicant_id`, `created_at`, `updated_at`) VALUES
(6, 11, 18, '2021-10-04 09:35:48', '2021-10-04 09:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `maincriterias`
--

CREATE TABLE `maincriterias` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `criteria_name` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maincriterias`
--

INSERT INTO `maincriterias` (`id`, `user_id`, `subject_id`, `criteria_name`, `created_at`, `updated_at`) VALUES
(6, 1, 11, 'Main criteria 1', '2021-10-04 09:17:37', '2021-10-04 09:17:37'),
(7, 1, 11, 'Main criteria 2', '2021-10-04 09:18:18', '2021-10-04 09:18:18'),
(8, 1, 11, 'Main criteria 3', '2021-10-04 09:18:56', '2021-10-04 09:18:56'),
(11, 1, 13, 'Main criteria Hello', '2021-10-09 22:12:14', '2021-10-09 22:12:14'),
(12, 1, 13, 'Main criteria Hi', '2021-10-09 22:12:43', '2021-10-09 22:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `mainsubjects`
--

CREATE TABLE `mainsubjects` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `main_subject_name` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mainsubjects`
--

INSERT INTO `mainsubjects` (`id`, `user_id`, `main_subject_name`, `created_at`, `updated_at`) VALUES
(5, 1, 'Main Subject 001', '2021-10-04 09:16:50', '2021-10-04 09:16:50'),
(6, 1, 'Main Subject 002', '2021-10-04 10:24:08', '2021-10-04 10:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_txt` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `subject_id`, `room_id`, `user_id`, `message_txt`, `created_at`, `updated_at`) VALUES
(7, 13, 2, 1, 'How are you everyone?', '2021-10-11 14:13:37', '2021-10-11 14:13:37'),
(8, 13, 1, 1, 'Hello!', '2021-10-11 14:14:41', '2021-10-11 14:14:41'),
(9, 11, 4, 1, 'test', '2021-10-11 14:35:43', '2021-10-11 14:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `metadatas`
--

CREATE TABLE `metadatas` (
  `id` int(11) NOT NULL,
  `score_id` int(11) DEFAULT NULL,
  `meta_notes` text DEFAULT NULL,
  `meta_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metadatas`
--

INSERT INTO `metadatas` (`id`, `score_id`, `meta_notes`, `meta_file`, `created_at`, `updated_at`) VALUES
(36, 49, NULL, NULL, '2021-10-04 09:31:22', '2021-10-04 09:31:22'),
(37, 50, NULL, NULL, '2021-10-04 09:32:52', '2021-10-04 09:32:52'),
(38, 51, NULL, NULL, '2021-10-04 09:33:06', '2021-10-04 09:33:06'),
(39, 52, NULL, NULL, '2021-10-04 09:42:01', '2021-10-04 09:42:01'),
(40, 53, NULL, NULL, '2021-10-04 09:42:31', '2021-10-04 09:42:31'),
(41, 54, NULL, NULL, '2021-10-04 09:43:03', '2021-10-04 09:43:03'),
(42, 55, NULL, NULL, '2021-10-04 09:43:18', '2021-10-04 09:43:18'),
(43, 56, 'bad', NULL, '2021-10-04 09:43:33', '2021-10-04 09:43:33'),
(44, 57, NULL, NULL, '2021-10-04 09:44:05', '2021-10-04 09:44:05'),
(45, 58, 'hvhv', NULL, '2021-10-06 10:07:41', '2021-10-06 10:07:41'),
(46, 59, NULL, NULL, '2021-10-06 10:37:18', '2021-10-06 10:37:18'),
(47, 60, 'sam', NULL, '2021-10-06 10:45:21', '2021-10-06 10:45:21'),
(48, 61, '', '', '2021-10-06 10:46:43', '2021-10-06 10:47:28'),
(49, 61, '', '', '2021-10-06 10:47:38', '2021-10-06 10:47:52'),
(50, 62, 'iii', '', '2021-10-06 10:56:16', '2021-10-06 10:56:36'),
(51, 63, NULL, NULL, '2021-10-06 10:56:27', '2021-10-06 10:56:27'),
(52, 64, NULL, NULL, '2021-10-06 11:12:45', '2021-10-06 11:12:45'),
(53, 57, 'no', NULL, '2021-10-06 11:12:59', '2021-10-06 11:12:59'),
(54, 54, NULL, NULL, '2021-10-06 11:13:46', '2021-10-06 11:13:46'),
(55, 65, NULL, NULL, '2021-10-09 22:13:41', '2021-10-09 22:13:41'),
(56, 66, NULL, NULL, '2021-10-09 22:13:47', '2021-10-09 22:13:47'),
(57, 67, NULL, NULL, '2021-10-09 22:13:52', '2021-10-09 22:13:52'),
(58, 68, NULL, NULL, '2021-10-09 22:13:57', '2021-10-09 22:13:57'),
(59, 69, NULL, NULL, '2021-10-09 22:14:03', '2021-10-09 22:14:03'),
(60, 67, NULL, NULL, '2021-10-11 12:57:59', '2021-10-11 12:57:59'),
(61, 68, NULL, NULL, '2021-10-11 12:58:06', '2021-10-11 12:58:06'),
(62, 70, NULL, NULL, '2021-10-11 13:04:48', '2021-10-11 13:04:48'),
(63, 71, NULL, NULL, '2021-10-11 13:04:54', '2021-10-11 13:04:54'),
(64, 72, NULL, NULL, '2021-10-11 13:06:45', '2021-10-11 13:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `reply_txt` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `subject_id`, `user_id`, `message_id`, `reply_txt`, `created_at`, `updated_at`) VALUES
(13, 13, 1, 7, '1st reply', '2021-10-11 14:15:05', '2021-10-11 14:15:05'),
(14, 13, 1, 8, 'Hi', '2021-10-11 14:15:35', '2021-10-11 14:15:35'),
(15, 11, 1, 9, 'fs', '2021-10-11 14:36:11', '2021-10-11 14:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `subject_id`, `room_name`, `created_at`, `updated_at`) VALUES
(1, 13, 'Room One', '2021-10-11 18:54:44', '2021-10-11 18:54:44'),
(2, 13, 'Room Two', '2021-10-11 18:54:56', '2021-10-11 18:54:56'),
(3, 13, 'Room Three', '2021-10-11 14:32:39', '2021-10-11 14:32:39'),
(4, 11, 'Room 1', '2021-10-11 14:35:35', '2021-10-11 14:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `subject_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `criteria_id` int(11) DEFAULT NULL,
  `score_number` int(11) DEFAULT NULL,
  `score_card_no` varchar(10) DEFAULT NULL COMMENT 'score_number - minimum score',
  `notes` text DEFAULT NULL,
  `score_files` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `user_id`, `subject_id`, `applicant_id`, `criteria_id`, `score_number`, `score_card_no`, `notes`, `score_files`, `created_at`, `updated_at`) VALUES
(49, 1, 11, 18, 19, 4, NULL, NULL, NULL, '2021-10-04 09:31:22', '2021-10-04 09:31:22'),
(50, 1, 11, 18, 23, 3, NULL, NULL, NULL, '2021-10-04 09:32:52', '2021-10-04 09:32:52'),
(51, 1, 11, 18, 22, 1, NULL, NULL, NULL, '2021-10-04 09:33:06', '2021-10-04 09:33:06'),
(52, 1, 11, 18, 20, 5, NULL, NULL, NULL, '2021-10-04 09:42:01', '2021-10-04 09:42:01'),
(53, 2, 11, 18, 19, 4, NULL, NULL, NULL, '2021-10-04 09:42:31', '2021-10-04 09:42:31'),
(54, 2, 11, 18, 20, 1, NULL, NULL, NULL, '2021-10-04 09:43:03', '2021-10-06 11:13:46'),
(55, 2, 11, 18, 21, 3, NULL, NULL, NULL, '2021-10-04 09:43:18', '2021-10-04 09:43:18'),
(56, 2, 11, 18, 24, 1, NULL, NULL, NULL, '2021-10-04 09:43:33', '2021-10-04 09:43:33'),
(57, 2, 11, 19, 23, 4, NULL, NULL, NULL, '2021-10-04 09:44:05', '2021-10-06 11:12:59'),
(60, 1, 11, 18, 21, 4, NULL, NULL, NULL, '2021-10-06 10:45:21', '2021-10-06 10:45:21'),
(62, 1, 11, 18, 24, 5, NULL, NULL, NULL, '2021-10-06 10:56:16', '2021-10-06 10:56:16'),
(63, 1, 11, 19, 21, 1, NULL, NULL, NULL, '2021-10-06 10:56:27', '2021-10-06 10:56:27'),
(64, 2, 11, 19, 19, 1, NULL, NULL, NULL, '2021-10-06 11:12:45', '2021-10-06 11:12:45'),
(65, 1, 13, 22, 27, 3, NULL, NULL, NULL, '2021-10-09 22:13:41', '2021-10-09 22:13:41'),
(66, 1, 13, 22, 28, 4, '3', NULL, NULL, '2021-10-09 22:13:47', '2021-10-10 18:28:02'),
(67, 1, 13, 22, 30, 5, '4', NULL, NULL, '2021-10-09 22:13:52', '2021-10-11 12:57:59'),
(68, 1, 13, 22, 29, 1, '-2', NULL, NULL, '2021-10-09 22:13:57', '2021-10-11 12:58:06'),
(69, 1, 13, 22, 31, 5, '3', NULL, NULL, '2021-10-09 22:14:03', '2021-10-10 18:29:21'),
(70, 1, 13, 22, 32, 4, '3', NULL, NULL, '2021-10-11 13:04:48', '2021-10-11 13:04:48'),
(71, 1, 13, 22, 33, 1, '0', NULL, NULL, '2021-10-11 13:04:54', '2021-10-11 13:04:54'),
(72, 1, 13, 23, 33, 1, '0', NULL, NULL, '2021-10-11 13:06:45', '2021-10-11 13:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mainsubject_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `user_id`, `mainsubject_id`, `subject_name`, `created_at`, `updated_at`) VALUES
(11, 1, 5, 'Job posting', '2021-10-04 09:17:08', '2021-10-04 09:17:08'),
(12, 1, 6, 'Car rental', '2021-10-04 10:24:25', '2021-10-04 10:24:25'),
(13, 1, 5, 'Real estate', '2021-10-04 10:25:48', '2021-10-04 10:25:48'),
(14, 1, 6, 'Other', '2021-10-04 10:30:27', '2021-10-04 10:30:27'),
(15, 1, 5, 'Test', '2021-10-04 10:32:56', '2021-10-04 10:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `mainsubject_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `mainsubject_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(19, 1, 5, 11, '2021-10-04 09:17:08', '2021-10-04 15:39:48'),
(20, 2, 5, 11, '2021-10-04 09:36:34', '2021-10-04 15:39:51'),
(21, 1, 6, 12, '2021-10-04 10:24:25', '2021-10-04 15:54:51'),
(22, 1, 5, 13, '2021-10-04 10:25:48', '2021-10-04 15:55:58'),
(23, 1, 6, 14, '2021-10-04 10:30:27', '2021-10-04 16:00:38'),
(24, 1, 5, 15, '2021-10-04 10:32:56', '2021-10-04 10:32:56'),
(26, 2, 6, 12, '2021-10-04 10:41:19', '2021-10-04 10:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'James', 'james@gmail.com', '$2y$10$aP9jPsdJpvajipZXWZq.Su05ILH1JnoX3TgkifP5EJxwGbAcxD4Pe', 'dnTvOkCokjFxeVWBhZRDzyF1EFLxH9t1ot4qCrDewGD4zhR4BiRg0Sxdz6Lq', '2021-10-07 18:11:40', '2021-10-07 12:38:29', '2021-10-11 20:24:28'),
(2, NULL, 'Jennifer', 'jennifer@gmail.com', '$2y$10$tuTOdztaLzB1XPRd4JKQXeArzHKyFYSega6guiw7wW3NhmJrBr/.q', 'FUh5gex23bMvQFF6bpBCheMRUMmeAkFrPIMMxBFnNAecVQr47uVkgBcpjtx4', '2021-10-07 18:12:29', '2021-10-07 12:38:52', '2021-10-07 18:23:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bulkemails`
--
ALTER TABLE `bulkemails`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finalists`
--
ALTER TABLE `finalists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maincriterias`
--
ALTER TABLE `maincriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mainsubjects`
--
ALTER TABLE `mainsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metadatas`
--
ALTER TABLE `metadatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bulkemails`
--
ALTER TABLE `bulkemails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `finalists`
--
ALTER TABLE `finalists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `maincriterias`
--
ALTER TABLE `maincriterias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mainsubjects`
--
ALTER TABLE `mainsubjects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `metadatas`
--
ALTER TABLE `metadatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
