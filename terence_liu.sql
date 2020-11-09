-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 06:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4;

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
(64, 267, '19.00', 'English', '8', '12');

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
) ENGINE=InnoDB AUTO_INCREMENT=275 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `fname`, `email`, `password`, `profile_address`, `lname`) VALUES
(264, 'Jimmy', 'jimmy_chu@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_1.png', 'Chu'),
(265, 'David', 'david_cao@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_3.png', 'Cao'),
(266, 'Terence', 'terence_liu@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_4.png', 'Liu'),
(267, 'Sean', 'sean_jeong@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_5.png', 'Jeong'),
(268, 'Justin', 'justin_wang@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', '', 'Wang'),
(269, 'Tim', 'tim_tembo@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_12.png', 'Tembo'),
(270, 'Victor', 'victor_hau@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', '', 'Hau'),
(271, 'Linsey', 'linsey_gong@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_13.png', 'Gong'),
(272, 'Jone', 'jone_ko@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', '', 'Ko'),
(273, 'Samuel', 'samuel_fung@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', 'img/member/profile_picture_14.png', 'Fung'),
(274, 'Allen', 'allen_chen@gmail.com', '$2y$10$oGBrwTVTTPemSjrl/wuDMujT9gu8a/Hy0DOfTgD4.o.Wg2RdnpF0.', '', 'Chen');

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

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
(42, 269, 265, NULL, '2020-11-08 08:53:42', '0.0', 'last test');

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
(274, '12');

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
(266, '350.47', 'This is the biography for Terence. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'English, Cantonese', 'Burnaby', 'Canada'),
(267, '58.98', 'This is the biography for Sean. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'English, Korean', 'Mapleridge', 'Canada'),
(268, '888.88', 'This is the biography for Justin. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Mandarin', 'Vancouver', 'Canada');

--
-- Constraints for dumped tables
--

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

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`);


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
