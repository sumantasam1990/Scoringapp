-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 06:08 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

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
(2, 1, 'John', 'john@gmail.com', '2525252525', 'sca_61548eb08f94b1632931504.jpg', '2021-09-29 10:35:04', '2021-09-29 10:35:04'),
(3, 1, 'Maria', 'maria@gmail.com', '1235696969', 'sca_61548edbdb13d1632931547.jpg', '2021-09-29 10:35:47', '2021-09-29 10:35:47'),
(4, 2, 'Sumanta Kundu', 'sumanta@gmail.com', '1254789602', 'sca_61549005b66401632931845.jpg', '2021-09-29 10:40:45', '2021-09-29 10:40:45'),
(5, 4, 'Sam', 'sam@gmail.com', '1254896302', 'sca_615490ddd4ded1632932061.jpg', '2021-09-29 10:44:21', '2021-09-29 10:44:21'),
(6, 2, 'Peter', 'peter@gmail.com', '2541456590', 'sca_615574855c59a1632990341.jpg', '2021-09-30 02:55:41', '2021-09-30 02:55:41'),
(7, 2, 'Maria', 'm@gmail.com', '1245789630', 'sca_61559346e03b71632998214.jpg', '2021-09-30 05:06:54', '2021-09-30 05:06:54'),
(8, 2, 'Srobona Dutta', 'hykhkn@gmail.com', '1234567890', 'sca_6155a5362ee641633002806.jpg', '2021-09-30 06:23:26', '2021-09-30 06:23:26'),
(10, 2, 'Sam', 'sam123@gmail.com', '1245859630', 'sca_6155c73a6c76d1633011514.jpg', '2021-09-30 08:48:34', '2021-09-30 08:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `subject_id`, `title`, `priority`, `created_at`, `updated_at`) VALUES
(1, 2, 'Employment history', 'FCD40A,40F328', '2021-09-30 00:51:29', '2021-09-30 00:51:29'),
(2, 2, 'Personality', '138D07', '2021-09-30 01:47:04', '2021-09-30 01:47:04'),
(3, 2, 'References', 'FCD40A,F56A21', '2021-09-30 02:42:27', '2021-09-30 02:42:27'),
(5, 2, 'Others', 'F56A21,FC0A0A', '2021-09-30 08:46:42', '2021-09-30 08:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `criteria_id` int(11) DEFAULT NULL,
  `score_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `subject_id`, `applicant_id`, `criteria_id`, `score_number`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 2, 4, '2021-09-30 09:07:47', '2021-09-30 09:08:34'),
(2, 2, 4, 1, 5, '2021-09-30 09:07:47', '2021-09-30 09:08:34'),
(3, 2, 6, 1, 2, '2021-09-30 09:07:47', '2021-09-30 10:22:19'),
(8, 2, 7, 3, 5, '2021-09-30 06:09:24', '2021-09-30 06:09:24'),
(9, 2, 6, 2, 2, '2021-09-30 06:09:30', '2021-09-30 06:09:30'),
(16, 2, 4, 5, 3, '2021-09-30 08:47:18', '2021-09-30 08:47:18'),
(17, 2, 6, 3, 5, '2021-09-30 08:47:28', '2021-09-30 08:47:28'),
(18, 2, 7, 1, 5, '2021-09-30 08:47:37', '2021-09-30 08:47:37'),
(19, 2, 8, 1, 1, '2021-09-30 08:47:44', '2021-09-30 08:47:44'),
(20, 2, 10, 1, 5, '2021-09-30 08:48:53', '2021-09-30 08:48:53'),
(21, 2, 10, 2, 4, '2021-09-30 08:49:00', '2021-09-30 08:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `user_id`, `subject_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Job posting', '2021-09-29 08:40:28', '2021-09-29 14:45:17'),
(2, 1, 'Rental property', '2021-09-29 08:40:42', '2021-09-29 14:45:18'),
(4, 2, 'IT Engineer', '2021-09-29 10:37:36', '2021-09-30 05:44:55'),
(5, 2, 'Test subject', '2021-09-29 10:39:56', '2021-09-30 05:44:56'),
(6, 2, 'Test subject', '2021-09-29 10:43:45', '2021-09-30 05:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `remember_token` varchar(32) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'sam007', 'Sumanta', 'sam@gmail.com', '123456789', NULL, '2021-09-29 20:15:12', '2021-09-29 14:45:12', '2021-09-29 14:45:12');

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
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
