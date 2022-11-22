-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 01:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examination`
--

-- --------------------------------------------------------

--
-- Table structure for table `asign_student`
--

CREATE TABLE `asign_student` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asign_student`
--

INSERT INTO `asign_student` (`id`, `roll_no`, `class_id`, `student_id`, `created_at`) VALUES
(1, '22', '11', '24', '2021-11-06 20:21:28'),
(2, '50', '11', '25', '2021-11-06 20:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `asign_subject`
--

CREATE TABLE `asign_subject` (
  `id` int(11) NOT NULL,
  `class_id` int(255) NOT NULL,
  `subject_id` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asign_subject`
--

INSERT INTO `asign_subject` (`id`, `class_id`, `subject_id`, `created_at`) VALUES
(6, 11, 10, '2021-11-06 14:35:17'),
(7, 12, 10, '2021-11-06 14:36:46'),
(9, 11, 9, '2021-11-06 14:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`, `status`, `created_at`) VALUES
(11, 'BA', 1, '2021-11-06 14:21:17'),
(12, 'FA', NULL, '2021-11-06 14:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `exam_dur` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `exam_name`, `class_id`, `exam_dur`, `status`, `created_at`) VALUES
(6, 'Bachuler', '11', '30 Minute', 2, '2021-11-07 22:39:43'),
(10, 'Bachuler', '11', '5 Minute', 2, '2021-11-08 22:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `exam_subject`
--

CREATE TABLE `exam_subject` (
  `id` int(11) NOT NULL,
  `exam_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL,
  `exam_duraion` timestamp NULL DEFAULT NULL,
  `tot_q` varchar(255) NOT NULL,
  `correct_ans` varchar(255) NOT NULL,
  `wrong_ans` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_subject`
--

INSERT INTO `exam_subject` (`id`, `exam_id`, `subject_id`, `question_id`, `exam_duraion`, `tot_q`, `correct_ans`, `wrong_ans`, `status`, `created_at`) VALUES
(5, '6', '10', 1, '2021-11-11 08:00:00', '10 Question', '2 Mark', '-1 Mark', 1, '2021-11-08 20:19:28'),
(6, '8', '11', 0, '2021-11-05 07:00:00', '10 Question', '2 Mark', '-1 Mark', 1, '2021-11-08 22:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `qustion_one` varchar(255) NOT NULL,
  `qustion_two` varchar(255) NOT NULL,
  `question_three` varchar(255) NOT NULL,
  `question_four` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `qustion_one`, `qustion_two`, `question_three`, `question_four`) VALUES
(1, 'question 1', 'question 2', 'question 3', 'question 4'),
(2, 'question 5', 'question 6', 'question 7', 'question 8');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_address` varchar(255) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `s_image` longtext NOT NULL,
  `status` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `s_name`, `s_address`, `s_email`, `s_password`, `gender`, `dob`, `s_image`, `status`, `created_at`) VALUES
(24, 'zaeem', 'Lahore', 'huzaifa@gmail.com', 'iub12345678', 'Male', '2021-11-04', 'image2.jpg', 1, '2021-11-06 17:02:35'),
(25, 'Hamza', 'BWN', 'hamza@gmail.com', '12345678', 'Male', '2021-11-29', 'image5.jpg', 0, '2021-11-06 17:17:58'),
(26, 'zaeem', 'Lahore', 'zaeem@gmail.com', 'iub12345678', 'Male', '2021-11-25', 'images.jpg', NULL, '2021-11-06 21:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `status`, `created_at`) VALUES
(10, 'Computer Science', 1, '2021-11-06 14:21:53'),
(11, 'Subject', NULL, '2021-11-06 21:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `image` longtext NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_name`, `image`, `contact`, `email`, `password`, `status`, `created_at`) VALUES
(13, 'Admin', 'appstore.png', '000000', 'admin@gmail.com', 'iub12345678', 1, '2021-11-07 22:40:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asign_student`
--
ALTER TABLE `asign_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asign_subject`
--
ALTER TABLE `asign_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_subject`
--
ALTER TABLE `exam_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asign_student`
--
ALTER TABLE `asign_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `asign_subject`
--
ALTER TABLE `asign_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exam_subject`
--
ALTER TABLE `exam_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
