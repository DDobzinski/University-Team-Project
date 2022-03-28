-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2022 at 05:15 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2021_comp10120_z7`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_log`
--

CREATE TABLE `chat_log` (
  `chat_id` int NOT NULL,
  `user_id` int NOT NULL,
  `topic_id` int NOT NULL,
  `log_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text_content` varchar(1023) DEFAULT NULL,
  `reply_to` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `user_id` int NOT NULL,
  `sports` tinyint(1) DEFAULT NULL,
  `baking` tinyint(1) DEFAULT NULL,
  `art` tinyint(1) DEFAULT NULL,
  `social` tinyint(1) DEFAULT NULL,
  `music` tinyint(1) DEFAULT NULL,
  `dance` tinyint(1) DEFAULT NULL,
  `photography` tinyint(1) DEFAULT NULL,
  `singing` tinyint(1) DEFAULT NULL,
  `computers` tinyint(1) DEFAULT NULL,
  `biking` tinyint(1) DEFAULT NULL,
  `reading` tinyint(1) DEFAULT NULL,
  `fishing` tinyint(1) DEFAULT NULL,
  `traveling` tinyint(1) DEFAULT NULL,
  `cars` tinyint(1) DEFAULT NULL,
  `yoga` tinyint(1) DEFAULT NULL,
  `electronics` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int NOT NULL,
  `topic_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`, `date_created`) VALUES
(1, 'Hallo:topic', '2022-03-20 17:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `accommodation` varchar(255) DEFAULT NULL,
  `biography` varchar(511) DEFAULT NULL,
  `private_account` tinyint(1) NOT NULL DEFAULT '0',
  `hobbies` varchar(128) DEFAULT NULL,
  `tasks` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `username`, `firstname`, `lastname`, `hashed_password`, `email_address`, `phone_number`, `nationality`, `course`, `accommodation`, `biography`, `private_account`, `hobbies`, `tasks`) VALUES
(1, 'will', 'will', 'asbery', '$2y$10$EftjUdsv6E.91dx.HrbJE.NkFFy6XkkLUdkNcn8cIxFdjPvuuW5em', 'willasbery@gmail.com', '+44785812313', 'british', 'computer Science', 'denmark Road', 'Hi, my name is Will and I study Computer Science at the University of Manchester. I am testing the software.', 0, '5,12', NULL),
(2, 'admin', 'admin', 'admin', '$2y$10$a0OYu2O/J.GWVgw3XKYNDeN9li5kfbVXGFNOnDgJfFx7NAWWotpli', 'admin@gmail.com', '', 'afghan', '', '', '', 0, NULL, NULL),
(4, 'euan', NULL, NULL, '$2y$10$aVpORXJuR4Js80lwiJThaedmYAcF/VED86TkZ3iZZFqobg6dY7ejy', 'euan@gmail.com', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(5, 'Daniel', NULL, NULL, '$2y$10$4JJQneoppU3oV/9gRqzYwe9FfezKLfPHM/fU.o/R19IwObmPf5Dfu', 'daniel@gmail.com', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2,4,5,6,7,8,9,10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_log`
--
ALTER TABLE `chat_log`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `topic_id` (`topic_id`) USING BTREE;

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_log`
--
ALTER TABLE `chat_log`
  MODIFY `chat_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_log`
--
ALTER TABLE `chat_log`
  ADD CONSTRAINT `fk_chat` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_topic` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD CONSTRAINT `fk` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
