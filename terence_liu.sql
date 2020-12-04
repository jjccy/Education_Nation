-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 08:04 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `terence_liu`
--
CREATE DATABASE IF NOT EXISTS `terence_liu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `terence_liu`;

-- --------------------------------------------------------

--
-- Table structure for table `cartadd`
--

DROP TABLE IF EXISTS `cartadd`;
CREATE TABLE IF NOT EXISTS `cartadd` (
  `c_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cart_id`),
  KEY `c_id` (`c_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `subject_name` char(30) DEFAULT NULL,
  `min_grade` decimal(2,0) DEFAULT NULL,
  `max_grade` decimal(2,0) DEFAULT NULL,
  PRIMARY KEY (`c_id`,`tutor_id`),
  KEY `tutor_id` (`tutor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `tutor_id`, `price`, `subject_name`, `min_grade`, `max_grade`) VALUES
(58, 265, '24.00', 'Math', '7', '9'),
(59, 265, '20.00', 'Science', '8', '10'),
(60, 264, '32.00', 'Computer Science', '11', '12'),
(61, 264, '16.00', 'Calculus', '11', '12'),
(62, 266, '21.00', 'Chemistry', '11', '12'),
(63, 268, '24.00', 'Biology', '11', '12'),
(64, 267, '19.00', 'English', '8', '12'),
(65, 266, '12.00', 'Biology', '0', '8'),
(66, 267, '90.00', 'Computer Science', '0', '12'),
(67, 264, '50.00', 'Math', '0', '12'),
(69, 266, '233.00', 'English', '2', '12'),
(70, 266, '23.00', 'Computer Science', '0', '12'),
(72, 282, '90.00', 'Math', '2', '8'),
(73, 283, '30.00', 'English', '0', '12'),
(74, 284, '80.00', 'Chemistry', '6', '12'),
(75, 285, '60.00', 'Calculus', '8', '12'),
(76, 280, '50.00', 'Biology', '0', '12'),
(77, 282, '150.00', 'Calculus', '11', '12'),
(78, 282, '1.00', 'Science', '0', '12'),
(79, 285, '100.00', 'English', '8', '12');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` char(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` char(128) DEFAULT NULL,
  `profile_address` varchar(260) DEFAULT NULL,
  `lname` char(30) DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=286 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `fname`, `email`, `password`, `profile_address`, `lname`) VALUES
(264, 'Jimmy', 'jimmy_chu@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_27.png', 'Chu'),
(265, 'David', 'david_cao@gmail.com', '$2y$10$5YM3N8OPcoqmuP94niSo1OlVZmQec3q0nuarA6MALhRBt8NphKktK', 'img/member/profile_picture_25.png', 'Cao'),
(266, 'Terence', 'terence_liu@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_26.png', 'Liu'),
(267, 'Sean', 'sean_jeong@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_11.png', 'Jeong'),
(268, 'Justin', 'justin_wang@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_5.png', 'Wang'),
(269, 'Tim', 'tim_tembo@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_19.png', 'Tembo'),
(270, 'Victor', 'victor_hau@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_24.png', 'Hau'),
(271, 'Linsey', 'linsey_gong@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_13.png', 'Gong'),
(272, 'Jone', 'jone_ko@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_4.png', 'Ko'),
(273, 'Samuel', 'samuel_fung@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_14.png', 'Fung'),
(274, 'Allen', 'allen_chen@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_10.png', 'Chen'),
(275, 'Bobby', 'blee@gmail.com', '$2y$10$K4MjQiOjdNICsiwycfqnK.7HGsfc8ZIVNrlc1Bw35RX/tFvKqriPu', NULL, 'Lee'),
(280, 'Howard', 'howard_chu@gmail.com', '$2y$10$HuXDlFoxXzqS5IsVzRiu1OhSIy2qHttJdBCCPBapkkdSpENvXus3S', 'img/member/profile_picture_23.png', 'Chu'),
(282, 'Theo', 'theo_tang@gmail.com', '$2y$10$vvr71UQlG.2Hc29eDaSabugrXIoIC0dudUB5HeZsyq.l5793slgZe', 'img/member/profile_picture_3.png', 'Tang'),
(283, 'John', 'john_doe@gmail.com', '$2y$10$gCZzhNWiEM0sD27QN75qTeII9wGwqQngynMWlDqecExuFJF3HWaja', 'img/member/profile_picture_2.png', 'Doe'),
(284, 'Jane', 'jane_smith@gmail.com', '$2y$10$wAa3gyBkrcLyj25SH.7sJ.6Nyo3ZF2w1ktpEL7rMShdwOaQG/2Jk2', 'img/member/profile_picture_22.png', 'Smith'),
(285, 'Justin', 'justin_li@gmail.com', '$2y$10$NJZdPmzgoaIHduVaAWbg7ezhEeQ0zsTpIQfbUlaY/BiRQYpm3dzLa', 'img/member/profile_picture_18.png', 'Li');

-- --------------------------------------------------------

--
-- Table structure for table `personalization`
--

DROP TABLE IF EXISTS `personalization`;
CREATE TABLE IF NOT EXISTS `personalization` (
  `student_id` int(11) NOT NULL,
  `grade` int(2) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `lang` varchar(30) DEFAULT NULL,
  `courses` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personalization`
--

INSERT INTO `personalization` (`student_id`, `grade`, `city`, `lang`, `courses`) VALUES
(269, 12, 'Burnaby', 'English, Cantonese', 'Biology_Calculus_Chemistry_Computer Science_English_Math_Science_Spatial Design'),
(272, 11, '', 'English', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp(),
  `rating` decimal(2,1) DEFAULT NULL,
  `comments` mediumtext DEFAULT NULL,
  PRIMARY KEY (`r_id`,`student_id`,`tutor_id`),
  KEY `student_id` (`student_id`),
  KEY `tutor_id` (`tutor_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`r_id`, `student_id`, `tutor_id`, `c_id`, `date_posted`, `rating`, `comments`) VALUES
(25, 274, 265, 59, '2020-11-06 20:12:12', '3.9', 'David is a very good tutor, he carried me through Math 9.'),
(26, 273, 264, 60, '2020-11-06 14:18:12', '5.0', 'Jimmy is a very good tutor, he carried me through AP Computer Science.'),
(27, 272, 264, 61, '2020-11-06 16:21:12', '2.5', 'Theo is a very good tutor, but he babbles for a very long time.'),
(28, 269, 266, 62, '2020-11-06 14:24:12', '3.8', 'Terence is a very good tutor, but he moves too quickly.'),
(29, 270, 268, 63, '2020-11-06 14:28:12', '0.0', 'Justin is always to late and ends sessions early, avoid him.'),
(30, 271, 267, 64, '2020-11-06 14:29:12', '4.0', 'Sean knows what to teach, and has high expectations.'),
(31, 269, 265, 59, '2020-11-08 08:34:11', '2.0', 'worst teacher ever'),
(36, 269, 265, 0, '2020-11-08 08:44:49', '4.0', 'Overall is not a bad teacher'),
(37, 269, 265, 58, '2020-11-08 08:46:40', '1.0', 'Just the math is so bad'),
(42, 269, 265, NULL, '2020-11-08 08:53:42', '0.0', 'last test'),
(43, 269, 264, 60, '2020-11-20 23:09:44', '5.0', 'Great course!'),
(44, 272, 265, 58, '2020-11-20 23:37:58', '5.0', 'Great tutor!'),
(45, 272, 264, 60, '2020-11-21 00:40:54', '5.0', 'Great guy. solid class!'),
(46, 269, 265, 58, '2020-11-30 07:31:20', '5.0', 'Great guy!'),
(47, 272, 265, 58, '2020-12-04 04:52:03', '5.0', 'Great math course!'),
(48, 272, 264, 67, '2020-12-04 05:04:03', '5.0', 'Jimmy is very good at adding.'),
(49, 272, 266, 69, '2020-12-04 05:16:34', '2.0', 'This is a very hard course. But Terence is very knowledgable in this field.'),
(50, 272, 266, 70, '2020-12-04 05:28:54', '5.0', 'Great Course!'),
(53, 272, 285, 75, '2020-12-04 06:49:46', '5.0', 'Great'),
(54, 272, 285, 79, '2020-12-04 06:49:55', '4.0', 'Its ok'),
(55, 272, 284, 74, '2020-12-04 06:51:20', '5.0', 'doesnt know anything about h20'),
(56, 272, 283, 73, '2020-12-04 06:53:22', '5.0', 'Doesnt know anything about English'),
(57, 272, 282, 72, '2020-12-04 06:53:47', '5.0', 'His knowledge in math is very solid'),
(58, 272, 282, 77, '2020-12-04 06:54:12', '4.0', 'His understand of logs are meh'),
(59, 272, 282, 78, '2020-12-04 06:54:34', '3.0', 'General science knowledge is good! But for the rate its kind of expensive'),
(60, 272, 280, 76, '2020-12-04 06:54:56', '1.0', 'Very expensive!!!!'),
(61, 272, 268, 63, '2020-12-04 06:55:35', '5.0', 'Great guy! Okay teaching ability');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL,
  `cur_grade` decimal(2,0) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `cur_grade`) VALUES
(269, '5'),
(270, '8'),
(271, '4'),
(272, '6'),
(273, '7'),
(274, '12'),
(275, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

DROP TABLE IF EXISTS `tutor`;
CREATE TABLE IF NOT EXISTS `tutor` (
  `tutor_id` int(11) NOT NULL,
  `balance` decimal(8,2) DEFAULT NULL,
  `bio` mediumtext DEFAULT NULL,
  `primary_language` tinytext DEFAULT NULL,
  `city` char(30) DEFAULT NULL,
  `country` char(30) DEFAULT NULL,
  PRIMARY KEY (`tutor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutor_id`, `balance`, `bio`, `primary_language`, `city`, `country`) VALUES
(264, '0.00', 'This is the biography for Jimmy.  lolol         ', 'English', 'Vancouver', 'Canada'),
(265, '150.40', 'This is the biography for David. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'English', 'Vancouver', 'Canada'),
(266, '350.47', 'UPDATE: This is the biography for Terence. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.                ', 'English, Cantonese', 'Burnaby', 'Canada'),
(267, '58.98', 'This is the biography for Sean. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'English, Korean', 'Mapleridge', 'Canada'),
(268, '888.88', 'This is the biography for Justin. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Mandarin', 'Vancouver', 'Canada'),
(280, '0.00', 'I am Howard!                ', 'English', 'Vancouver', 'Canada'),
(282, '0.00', 'I am Theo!', 'English', 'Vancouver', 'Canada'),
(283, '0.00', 'This is my bio', 'English', 'Vancouver', 'Canada'),
(284, '0.00', 'This is my bio', 'English', 'Vancouver', 'Canada'),
(285, '0.00', 'This is my bio', 'English', 'Vancouver', 'Canada');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartadd`
--
ALTER TABLE `cartadd`
  ADD CONSTRAINT `cartadd_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`),
  ADD CONSTRAINT `cartadd_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`);

--
-- Constraints for table `personalization`
--
ALTER TABLE `personalization`
  ADD CONSTRAINT `personalization_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `member` (`m_id`);

--
-- Constraints for table `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `member` (`m_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

GRANT RELOAD, SHUTDOWN, PROCESS, REFERENCES, SHOW DATABASES, SUPER, LOCK TABLES, REPLICATION SLAVE, REPLICATION CLIENT, CREATE USER ON *.* TO `login`@`localhost` WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON `terence_liu`.* TO `login`@`localhost` WITH GRANT OPTION;

GRANT SELECT ON *.* TO `view`@`localhost`;

GRANT USAGE ON *.* TO `jimmy_chu@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `jimmy_chu@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `david_ca0@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `david_ca0@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `terence_liu@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `terence_liu@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `sean_jeong@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `sean_jeong@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `justin_wang@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `justin_wang@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `tim_tembo@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `tim_tembo@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `victor_hau@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `victor_hau@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `linsey_gong@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `linsey_gong@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `jone_ko@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `jone_ko@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `samuel_fung@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `samuel_fung@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `allen_chen@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `allen_chen@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `howard_chu@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `howard_chu@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `theo_tang@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `theo_tang@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `jane_smith@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `jane_smith@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `justin_li@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `justin_li@gmail.com`@`localhost`;

GRANT USAGE ON *.* TO `john_doe@gmail.com`@`localhost` IDENTIFIED BY PASSWORD '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1';
GRANT SELECT, INSERT, UPDATE ON `terence_liu`.* TO `john_doe@gmail.com`@`localhost`;