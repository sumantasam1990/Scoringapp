-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2021 at 08:56 AM
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
(19, 11, 'Srobona Dutta', 'srobona@yahoo.com', '4567890989', NULL, '2021-10-04 09:31:15', '2021-10-04 09:31:15');

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
(24, 7, 11, 'Performance', '138D07', '2021-10-04 09:20:05', '2021-10-04 09:20:05');

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
(8, 1, 11, 'Main criteria 3', '2021-10-04 09:18:56', '2021-10-04 09:18:56');

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
(44, 57, NULL, NULL, '2021-10-04 09:44:05', '2021-10-04 09:44:05');

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
  `notes` text DEFAULT NULL,
  `score_files` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `user_id`, `subject_id`, `applicant_id`, `criteria_id`, `score_number`, `notes`, `score_files`, `created_at`, `updated_at`) VALUES
(49, 1, 11, 18, 19, 4, NULL, NULL, '2021-10-04 09:31:22', '2021-10-04 09:31:22'),
(50, 1, 11, 18, 23, 3, NULL, NULL, '2021-10-04 09:32:52', '2021-10-04 09:32:52'),
(51, 1, 11, 18, 22, 1, NULL, NULL, '2021-10-04 09:33:06', '2021-10-04 09:33:06'),
(52, 1, 11, 18, 20, 5, NULL, NULL, '2021-10-04 09:42:01', '2021-10-04 09:42:01'),
(53, 2, 11, 18, 19, 4, NULL, NULL, '2021-10-04 09:42:31', '2021-10-04 09:42:31'),
(54, 2, 11, 18, 20, 5, NULL, NULL, '2021-10-04 09:43:03', '2021-10-04 09:43:03'),
(55, 2, 11, 18, 21, 3, NULL, NULL, '2021-10-04 09:43:18', '2021-10-04 09:43:18'),
(56, 2, 11, 18, 24, 1, NULL, NULL, '2021-10-04 09:43:33', '2021-10-04 09:43:33'),
(57, 2, 11, 19, 23, 4, NULL, NULL, '2021-10-04 09:44:05', '2021-10-04 09:44:05');

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

INSERT INTO `teams` (`id`, user_email, `mainsubject_id`, `subject_id`, `created_at`, `updated_at`) VALUES
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
  `email_verified_at` datetime DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'James', 'james@gmail.com', '$2y$10$gO4hCRs9K1fiG2jX98eB5uAkdnpayJL7h9Mgarc07bqB/BlpIIz.e', '5L0LfVLSs492S7gkdeE8fEK88MayLLAuNW2P4d7560T0rocLyELxSwfgFJth', '2021-10-02 09:53:18', '2021-10-01 22:53:18', '2021-10-04 16:11:22'),
(2, NULL, 'Jennifer', 'jennifer@gmail.com', '$2y$10$I8U7VvDLKW8Mi4tBNNx/IOOgdRFfWm0N1J6hFoQUqJykBxwi5HIkG', 'QClmXGoYoBXV4Bg11SuvHl3jFSWmd9askLkpnEJtAtNhLkjcE2dxPZ3eAkmT', '2021-10-02 09:53:44', '2021-10-01 22:53:44', '2021-10-04 16:11:34');

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
-- Indexes for table `metadatas`
--
ALTER TABLE `metadatas`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bulkemails`
--
ALTER TABLE `bulkemails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `finalists`
--
ALTER TABLE `finalists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `maincriterias`
--
ALTER TABLE `maincriterias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mainsubjects`
--
ALTER TABLE `mainsubjects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `metadatas`
--
ALTER TABLE `metadatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
