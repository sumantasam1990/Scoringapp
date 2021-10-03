-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 06:20 PM
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
(10, 2, 'Sam', 'sam123@gmail.com', '1245859630', 'sca_6155c73a6c76d1633011514.jpg', '2021-09-30 08:48:34', '2021-09-30 08:48:34'),
(11, 8, 'John Doe', 'johndoe@yahoo.com', '1234567890', 'sca_6158179d4acb31633163165.jpg', '2021-10-02 02:56:05', '2021-10-02 02:56:05');

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
(5, 2, 'Others', 'F56A21,FC0A0A', '2021-09-30 08:46:42', '2021-09-30 08:46:42'),
(6, 1, 'Performance', '138D07', '2021-10-01 23:56:26', '2021-10-01 23:56:26'),
(7, 1, 'History', 'FCD40A,40F328', '2021-10-01 23:56:51', '2021-10-01 23:56:51'),
(8, 8, 'Performance', '138D07', '2021-10-02 02:53:28', '2021-10-02 02:53:28'),
(9, 8, 'Employment history', '40F328,138D07', '2021-10-02 02:53:42', '2021-10-02 02:53:42'),
(10, 8, 'Others', 'FC0A0A', '2021-10-02 02:57:29', '2021-10-02 02:57:29');

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
(1, 2, 4, '2021-10-03 07:58:40', '2021-10-03 07:59:00'),
(2, 2, 6, '2021-10-03 07:58:40', '2021-10-03 07:59:00');

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
(12, 33, 'This is my first note.', '', '2021-10-03 02:01:02', '2021-10-03 02:09:24'),
(13, 33, '', NULL, '2021-10-03 02:01:21', '2021-10-03 02:09:20'),
(14, 34, 'dsadddadsa', 'scF_61595ce23c7741633246434.pdf', '2021-10-03 02:03:54', '2021-10-03 02:03:54'),
(15, 34, 'sddd4444', '', '2021-10-03 02:04:14', '2021-10-03 02:09:03'),
(16, 34, '', NULL, '2021-10-03 02:04:52', '2021-10-03 02:08:48'),
(17, 33, NULL, 'scF_61595e328f2ce1633246770.pdf', '2021-10-03 02:09:30', '2021-10-03 02:09:30'),
(18, 26, NULL, NULL, '2021-10-03 02:51:14', '2021-10-03 02:51:14'),
(19, 3, NULL, NULL, '2021-10-03 02:51:25', '2021-10-03 02:51:25');

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
(1, 2, 2, 4, 2, 4, NULL, NULL, '2021-09-30 09:07:47', '2021-10-01 06:32:13'),
(3, 1, 2, 6, 1, 5, NULL, NULL, '2021-09-30 09:07:47', '2021-10-03 02:51:25'),
(22, 1, 2, 4, 3, 3, NULL, NULL, '2021-10-01 02:39:49', '2021-10-01 08:10:00'),
(23, 1, 2, 4, 2, 5, NULL, NULL, '2021-10-01 02:40:26', '2021-10-01 08:10:35'),
(24, 1, 2, 4, 1, 5, NULL, NULL, '2021-10-01 03:03:22', '2021-10-01 03:03:22'),
(25, 2, 2, 4, 1, 3, NULL, NULL, '2021-10-01 03:03:35', '2021-10-01 08:33:55'),
(26, 1, 2, 6, 2, 5, 'Test note.', 'scF_61593caa279ae1633238186.pdf', '2021-10-01 06:06:56', '2021-10-03 02:51:14'),
(27, 1, 1, 2, 6, 4, 'great performance.', 'scF_6157ee05828ea1633152517.png', '2021-10-01 23:58:37', '2021-10-01 23:59:29'),
(28, 1, 1, 3, 7, 1, NULL, NULL, '2021-10-02 00:10:57', '2021-10-02 00:10:57'),
(29, 2, 8, 11, 8, 5, 'great...', NULL, '2021-10-02 02:56:38', '2021-10-02 02:56:38'),
(30, 1, 8, 11, 8, 5, 'nice', NULL, '2021-10-02 02:57:04', '2021-10-02 02:57:04'),
(31, 1, 8, 11, 10, 4, NULL, NULL, '2021-10-02 02:57:46', '2021-10-02 02:57:46'),
(32, 2, 8, 11, 10, 5, NULL, NULL, '2021-10-02 02:58:06', '2021-10-02 02:58:06'),
(33, 1, 2, 6, 3, 4, NULL, NULL, '2021-10-03 00:26:48', '2021-10-03 02:09:30'),
(34, 1, 2, 6, 5, 1, NULL, NULL, '2021-10-03 00:28:53', '2021-10-03 02:04:52');

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
(2, 1, 'Rental property', '2021-09-29 08:40:42', '2021-10-01 04:17:09'),
(4, 3, 'IT Engineer', '2021-09-29 10:37:36', '2021-10-02 04:34:24'),
(5, 3, 'Test subject', '2021-09-29 10:39:56', '2021-10-02 04:34:25'),
(6, 3, 'Test subject', '2021-09-29 10:43:45', '2021-10-02 04:34:27'),
(7, 1, '56 State St.', '2021-10-02 00:12:15', '2021-10-02 00:12:15'),
(8, 1, 'Test Subject', '2021-10-02 00:13:02', '2021-10-02 00:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-10-01 04:13:02', '2021-10-01 04:24:51'),
(2, 2, 2, '2021-10-01 04:24:56', '2021-10-01 04:24:56'),
(3, 1, 1, '2021-10-02 05:33:18', '2021-10-02 05:33:18'),
(4, 1, 7, '2021-10-02 00:12:15', '2021-10-02 00:12:15'),
(5, 1, 8, '2021-10-02 00:13:02', '2021-10-02 00:13:02'),
(7, 2, 1, '2021-10-02 01:27:20', '2021-10-02 01:27:20'),
(14, 2, 7, '2021-10-02 01:50:47', '2021-10-02 01:50:47'),
(15, 2, 8, '2021-10-02 02:51:19', '2021-10-02 02:51:19');

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
(1, NULL, 'James', 'james@gmail.com', '$2y$10$gO4hCRs9K1fiG2jX98eB5uAkdnpayJL7h9Mgarc07bqB/BlpIIz.e', 'm0X6oKizeYoqGmv4spV2H2ODtjwUcWuVD0znA851K4Gzf6b1WmTTsYBxTKvX', '2021-10-02 09:53:18', '2021-10-01 22:53:18', '2021-10-03 05:42:34'),
(2, NULL, 'Jennifer', 'jennifer@gmail.com', '$2y$10$I8U7VvDLKW8Mi4tBNNx/IOOgdRFfWm0N1J6hFoQUqJykBxwi5HIkG', 'fp13zHVy8rIV8Ik9zscEKeI2ZjbYE2PHKMu3NxtC5o2Skb9sEZUVoaxmXInG', '2021-10-02 09:53:44', '2021-10-01 22:53:44', '2021-10-03 05:43:38');

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
-- Indexes for table `finalists`
--
ALTER TABLE `finalists`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `finalists`
--
ALTER TABLE `finalists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `metadatas`
--
ALTER TABLE `metadatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
