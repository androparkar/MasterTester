-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql107.infinityfree.com
-- Generation Time: Apr 24, 2025 at 04:16 PM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_38438621_master_tester`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_submission`
--

CREATE TABLE `answer_submission` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer_submission`
--

INSERT INTO `answer_submission` (`id`, `user_id`, `exam_id`, `question_id`, `answer`) VALUES
(62, 1, 12, 13, '1'),
(63, 1, 12, 14, '3'),
(64, 1, 12, 15, '2'),
(65, 1, 12, 16, '4'),
(66, 1, 13, 18, '3'),
(67, 1, 13, 20, '2'),
(68, 1, 13, 17, '4'),
(69, 1, 13, 19, '3'),
(70, 1, 13, 21, '3'),
(71, 1, 13, 0, '2a013dc718f09662db9762f82fcb5cae');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `create_date` date DEFAULT current_timestamp(),
  `teacher_id` int(11) DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `create_date`, `teacher_id`, `is_active`, `is_deleted`) VALUES
(17, 'Dcst semester 6', '2025-03-04', 1, 1, 0),
(19, 'NEW CLASS', '2025-03-06', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `schedule_date` date DEFAULT NULL,
  `starting_time` time DEFAULT NULL,
  `full_marks` int(11) DEFAULT NULL,
  `alotted_time` int(11) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `is_done` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `subject_id`, `class_id`, `create_date`, `schedule_date`, `starting_time`, `full_marks`, `alotted_time`, `description`, `is_active`, `is_done`) VALUES
(12, 'Internal Exam DWDM', 9, 17, '2025-04-21', '2025-05-10', '16:30:00', 4, 30, 'Internal 2 ', 0, 1),
(13, 'Internal Exam Machine Learning ', 8, 17, '2025-04-21', '2025-05-10', '16:00:00', 5, 30, 'Internal 2', 0, 0),
(14, 'Internal Exam EEPS', 10, 17, '2025-04-24', '2025-05-10', '15:30:00', 0, 30, 'Internal 2', 0, 0),
(15, 'Internal Exam EDS', 11, 17, '2025-04-24', '2025-05-10', '15:00:00', 0, 30, 'Internal 2', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_text` varchar(255) DEFAULT NULL,
  `options` varchar(255) DEFAULT NULL,
  `answer` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_text`, `options`, `answer`, `exam_id`) VALUES
(13, 'q1', 'ans,545,gfggf,ggggg', 1, 12),
(14, 'q2', 'dd,hgghg,ans,fdf', 3, 12),
(15, 'q3', 'atffg,ans,gry,yhtrhyr', 2, 12),
(16, 'q4', 'ggggfbyt,fte,frttctgc,ans', 4, 12),
(17, ' Which of the following is a type of Machine Learning?  ', 'Supervised Learning,Unsupervised Learning  ,Reinforcement Learning  ,All of the above ', 4, 13),
(18, 'In supervised learning, the algorithm learns from:', 'Unlabeled data  ,Feedback from environment  ,Labeled data ,Clustering ', 3, 13),
(19, 'What is the main goal of unsupervised learning?', 'Predict outcomes from labeled data ,Predict outcomes from labeled data ,Find hidden patterns or intrinsic structures in input data ,Learn from rewards and punishments ', 3, 13),
(20, ' Which of the following is NOT a supervised learning algorithm?', 'Decision Trees,K-Means Clustering  ,Support Vector Machines  , Linear Regression ', 2, 13),
(21, ' Overfitting in a machine learning model means:', 'The model performs well on new data  ,The model is too simple  ,The model performs well on training data but poorly on unseen data  ,The model ignores training data  ', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `exam_id`, `teacher_id`, `student_id`, `result`) VALUES
(1, 12, 1, 0, ''),
(2, 12, 1, 0, '4/40'),
(3, 12, 1, 1, '4/40'),
(4, 12, 1, 1, '4/40'),
(5, 12, 1, 1, '4/40'),
(6, 12, 1, 1, '4/40'),
(7, 12, 1, 1, '4/40'),
(8, 12, 1, 1, '4/40'),
(9, 13, 1, 1, '4/0'),
(10, 13, 1, 1, '4/0'),
(11, 13, 1, 1, '4/0');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(256) DEFAULT 'N/A',
  `about_comment` varchar(512) DEFAULT 'N/A',
  `profile_picture` varchar(256) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `join_date` date NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `password`, `address`, `about_comment`, `profile_picture`, `teacher_id`, `class_id`, `join_date`, `is_active`, `is_deleted`) VALUES
(1, 'Andro Parkar', 'andro@student.com', '8905746984', '0000', 'Howrah', 'I am a Student', NULL, 1, 17, '2024-11-13', 1, 0),
(3, 'avishek', 'avishek@email.com', '1234567890', '0000', 'N/A', 'N/A', NULL, 1, 17, '2025-01-08', 1, 0),
(5, 'anuja', 'anuja@email.com', '123654987', '0000', 'N/A', 'N/A', NULL, 1, 17, '2025-01-17', 1, 0),
(7, 'ananta', 'ananta@email.com', '4567891328', '1234', 'N/A', 'N/A', NULL, 1, 17, '2025-01-26', 1, 0),
(12, 'sancha', 'san@mail.com', NULL, '0000', 'N/A', 'N/A', NULL, NULL, NULL, '2025-03-05', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `class_id`, `create_date`, `is_active`) VALUES
(8, 'Machine Learning', 17, '2025-03-04', 1),
(9, 'Data Warehousing & Data Mining', 17, '2025-04-20', 1),
(10, 'Engineering Economics & Project Management ', 17, '2025-04-24', 1),
(11, 'Entrepreneurship & Start-ups ', 17, '2025-04-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(256) NOT NULL DEFAULT 'N/A',
  `about_comment` varchar(512) NOT NULL DEFAULT 'N/A',
  `profile_picture` varchar(256) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `phone`, `email`, `password`, `address`, `about_comment`, `profile_picture`, `is_deleted`) VALUES
(1, 'Sensei andro', 1234567890, 'andro@master.com', '0000', 'Kolkata', 'I am A teacher in computer', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `Email`, `password`, `access`) VALUES
(1, 'Sensei Andro', 'andro@admin.com', '0000', 'Master');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_submission`
--
ALTER TABLE `answer_submission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
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
-- AUTO_INCREMENT for table `answer_submission`
--
ALTER TABLE `answer_submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
