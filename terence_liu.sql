-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 11:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

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
CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `subject_name` char(30) DEFAULT NULL,
  `min_grade` decimal(2,0) DEFAULT NULL,
  `max_grade` decimal(2,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `tutor_id`, `price`, `subject_name`, `min_grade`, `max_grade`) VALUES
(13, 158, '24.00', 'Math', '7', '9'),
(14, 158, '20.00', 'Science', '8', '10');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `m_id` int(11) NOT NULL,
  `fname` char(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` char(128) DEFAULT NULL,
  `profile_address` varchar(260) DEFAULT NULL,
  `lname` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `fname`, `email`, `password`, `profile_address`, `lname`) VALUES
(84, 'Jimmy', 'jimmy_chu@gmail.com', '$2y$10$NfILuhdaFm2CwOWbJ3AVsOd/pP.IT0/3L9JK3V.w4CW8.n/bqVV7q', 'img/member/26/Jennifer_PFP.png', 'Chu'),
(85, 'Theo', 'theo_tang@gmail.com', '$2y$10$NfILuhdaFm2CwOWbJ3AVsOd/pP.IT0/3L9JK3V.w4CW8.n/bqVV7q', '', 'Tang'),
(86, 'David', 'david_cao@gmail.com', '$2y$10$NfILuhdaFm2CwOWbJ3AVsOd/pP.IT0/3L9JK3V.w4CW8.n/bqVV7q', 'img/member/26/Jennifer_PFP.png', 'Cao'),
(87, 'Terence', 'terence_liu@gmail.com', '$2y$10$NfILuhdaFm2CwOWbJ3AVsOd/pP.IT0/3L9JK3V.w4CW8.n/bqVV7q', '', 'Liu'),
(88, 'Sean', 'sean_jeong@gmail.com', '$2y$10$NfILuhdaFm2CwOWbJ3AVsOd/pP.IT0/3L9JK3V.w4CW8.n/bqVV7q', 'img/member/26/Jennifer_PFP.png', 'Jeong'),
(89, 'Justin', 'justin_wang@gmail.com', '$2y$10$NfILuhdaFm2CwOWbJ3AVsOd/pP.IT0/3L9JK3V.w4CW8.n/bqVV7q', '', 'Wang'),
(90, 'Tim', 'tim_tembo@gmail.com', '$2y$10$NfILuhdaFm2CwOWbJ3AVsOd/pP.IT0/3L9JK3V.w4CW8.n/bqVV7q', 'img/member/26/Jennifer_PFP.png', 'Tembo'),
(91, 'Victor', 'victor_Hau@gmail.com', '$2y$10$NfILuhdaFm2CwOWbJ3AVsOd/pP.IT0/3L9JK3V.w4CW8.n/bqVV7q', '', 'Hau'),
(92, 'Linsey', 'linsey_gong@gmail.com', '$2y$10$NfILuhdaFm2CwOWbJ3AVsOd/pP.IT0/3L9JK3V.w4CW8.n/bqVV7q', 'img/member/26/Jennifer_PFP.png', 'Gong'),
(93, 'Jone', 'jone_ko@gmail.com', '$2y$10$NfILuhdaFm2CwOWbJ3AVsOd/pP.IT0/3L9JK3V.w4CW8.n/bqVV7q', '', 'Ko'),
(94, 'Samuel', 'samuel_fung@gmail.com', '$2y$10$NfILuhdaFm2CwOWbJ3AVsOd/pP.IT0/3L9JK3V.w4CW8.n/bqVV7q', 'img/member/26/Jennifer_PFP.png', 'Fung'),
(95, 'Allen', 'allen_chen@gmail.com', '$2y$10$NfILuhdaFm2CwOWbJ3AVsOd/pP.IT0/3L9JK3V.w4CW8.n/bqVV7q', '', 'Chen'),
(96, 'Jimmy', 'jimmy_chu@gmail.com', '$2y$10$BLgrbWSwzcxsU6bZ3YRbFehYb0S/tL/UzXAj1AC9UifrkJ9RsYG76', 'img/member/26/Jennifer_PFP.png', 'Chu'),
(97, 'Theo', 'theo_tang@gmail.com', '$2y$10$BLgrbWSwzcxsU6bZ3YRbFehYb0S/tL/UzXAj1AC9UifrkJ9RsYG76', '', 'Tang'),
(98, 'David', 'david_cao@gmail.com', '$2y$10$BLgrbWSwzcxsU6bZ3YRbFehYb0S/tL/UzXAj1AC9UifrkJ9RsYG76', 'img/member/26/Jennifer_PFP.png', 'Cao'),
(99, 'Terence', 'terence_liu@gmail.com', '$2y$10$BLgrbWSwzcxsU6bZ3YRbFehYb0S/tL/UzXAj1AC9UifrkJ9RsYG76', '', 'Liu'),
(100, 'Sean', 'sean_jeong@gmail.com', '$2y$10$BLgrbWSwzcxsU6bZ3YRbFehYb0S/tL/UzXAj1AC9UifrkJ9RsYG76', 'img/member/26/Jennifer_PFP.png', 'Jeong'),
(101, 'Justin', 'justin_wang@gmail.com', '$2y$10$BLgrbWSwzcxsU6bZ3YRbFehYb0S/tL/UzXAj1AC9UifrkJ9RsYG76', '', 'Wang'),
(102, 'Tim', 'tim_tembo@gmail.com', '$2y$10$BLgrbWSwzcxsU6bZ3YRbFehYb0S/tL/UzXAj1AC9UifrkJ9RsYG76', 'img/member/26/Jennifer_PFP.png', 'Tembo'),
(103, 'Victor', 'victor_Hau@gmail.com', '$2y$10$BLgrbWSwzcxsU6bZ3YRbFehYb0S/tL/UzXAj1AC9UifrkJ9RsYG76', '', 'Hau'),
(104, 'Linsey', 'linsey_gong@gmail.com', '$2y$10$BLgrbWSwzcxsU6bZ3YRbFehYb0S/tL/UzXAj1AC9UifrkJ9RsYG76', 'img/member/26/Jennifer_PFP.png', 'Gong'),
(105, 'Jone', 'jone_ko@gmail.com', '$2y$10$BLgrbWSwzcxsU6bZ3YRbFehYb0S/tL/UzXAj1AC9UifrkJ9RsYG76', '', 'Ko'),
(106, 'Samuel', 'samuel_fung@gmail.com', '$2y$10$BLgrbWSwzcxsU6bZ3YRbFehYb0S/tL/UzXAj1AC9UifrkJ9RsYG76', 'img/member/26/Jennifer_PFP.png', 'Fung'),
(107, 'Allen', 'allen_chen@gmail.com', '$2y$10$BLgrbWSwzcxsU6bZ3YRbFehYb0S/tL/UzXAj1AC9UifrkJ9RsYG76', '', 'Chen'),
(108, 'Jimmy', 'jimmy_chu@gmail.com', '$2y$10$6EXPE13IJIpFTPm7Zzv8/ei3HmYzQYYwla18M7/yLYNG9U1f24ev2', 'img/member/26/Jennifer_PFP.png', 'Chu'),
(109, 'Theo', 'theo_tang@gmail.com', '$2y$10$6EXPE13IJIpFTPm7Zzv8/ei3HmYzQYYwla18M7/yLYNG9U1f24ev2', '', 'Tang'),
(110, 'David', 'david_cao@gmail.com', '$2y$10$6EXPE13IJIpFTPm7Zzv8/ei3HmYzQYYwla18M7/yLYNG9U1f24ev2', 'img/member/26/Jennifer_PFP.png', 'Cao'),
(111, 'Terence', 'terence_liu@gmail.com', '$2y$10$6EXPE13IJIpFTPm7Zzv8/ei3HmYzQYYwla18M7/yLYNG9U1f24ev2', '', 'Liu'),
(112, 'Sean', 'sean_jeong@gmail.com', '$2y$10$6EXPE13IJIpFTPm7Zzv8/ei3HmYzQYYwla18M7/yLYNG9U1f24ev2', 'img/member/26/Jennifer_PFP.png', 'Jeong'),
(113, 'Justin', 'justin_wang@gmail.com', '$2y$10$6EXPE13IJIpFTPm7Zzv8/ei3HmYzQYYwla18M7/yLYNG9U1f24ev2', '', 'Wang'),
(114, 'Tim', 'tim_tembo@gmail.com', '$2y$10$6EXPE13IJIpFTPm7Zzv8/ei3HmYzQYYwla18M7/yLYNG9U1f24ev2', 'img/member/26/Jennifer_PFP.png', 'Tembo'),
(115, 'Victor', 'victor_Hau@gmail.com', '$2y$10$6EXPE13IJIpFTPm7Zzv8/ei3HmYzQYYwla18M7/yLYNG9U1f24ev2', '', 'Hau'),
(116, 'Linsey', 'linsey_gong@gmail.com', '$2y$10$6EXPE13IJIpFTPm7Zzv8/ei3HmYzQYYwla18M7/yLYNG9U1f24ev2', 'img/member/26/Jennifer_PFP.png', 'Gong'),
(117, 'Jone', 'jone_ko@gmail.com', '$2y$10$6EXPE13IJIpFTPm7Zzv8/ei3HmYzQYYwla18M7/yLYNG9U1f24ev2', '', 'Ko'),
(118, 'Samuel', 'samuel_fung@gmail.com', '$2y$10$6EXPE13IJIpFTPm7Zzv8/ei3HmYzQYYwla18M7/yLYNG9U1f24ev2', 'img/member/26/Jennifer_PFP.png', 'Fung'),
(119, 'Allen', 'allen_chen@gmail.com', '$2y$10$6EXPE13IJIpFTPm7Zzv8/ei3HmYzQYYwla18M7/yLYNG9U1f24ev2', '', 'Chen'),
(120, 'Jimmy', 'jimmy_chu@gmail.com', '$2y$10$3wgHl0e8gPmw2aLRmW9v8.nREUzA/e9ERgggWOee5BV0Ks2Eun9CG', 'img/member/26/Jennifer_PFP.png', 'Chu'),
(121, 'Theo', 'theo_tang@gmail.com', '$2y$10$3wgHl0e8gPmw2aLRmW9v8.nREUzA/e9ERgggWOee5BV0Ks2Eun9CG', '', 'Tang'),
(122, 'David', 'david_cao@gmail.com', '$2y$10$3wgHl0e8gPmw2aLRmW9v8.nREUzA/e9ERgggWOee5BV0Ks2Eun9CG', 'img/member/26/Jennifer_PFP.png', 'Cao'),
(123, 'Terence', 'terence_liu@gmail.com', '$2y$10$3wgHl0e8gPmw2aLRmW9v8.nREUzA/e9ERgggWOee5BV0Ks2Eun9CG', '', 'Liu'),
(124, 'Sean', 'sean_jeong@gmail.com', '$2y$10$3wgHl0e8gPmw2aLRmW9v8.nREUzA/e9ERgggWOee5BV0Ks2Eun9CG', 'img/member/26/Jennifer_PFP.png', 'Jeong'),
(125, 'Justin', 'justin_wang@gmail.com', '$2y$10$3wgHl0e8gPmw2aLRmW9v8.nREUzA/e9ERgggWOee5BV0Ks2Eun9CG', '', 'Wang'),
(126, 'Tim', 'tim_tembo@gmail.com', '$2y$10$3wgHl0e8gPmw2aLRmW9v8.nREUzA/e9ERgggWOee5BV0Ks2Eun9CG', 'img/member/26/Jennifer_PFP.png', 'Tembo'),
(127, 'Victor', 'victor_Hau@gmail.com', '$2y$10$3wgHl0e8gPmw2aLRmW9v8.nREUzA/e9ERgggWOee5BV0Ks2Eun9CG', '', 'Hau'),
(128, 'Linsey', 'linsey_gong@gmail.com', '$2y$10$3wgHl0e8gPmw2aLRmW9v8.nREUzA/e9ERgggWOee5BV0Ks2Eun9CG', 'img/member/26/Jennifer_PFP.png', 'Gong'),
(129, 'Jone', 'jone_ko@gmail.com', '$2y$10$3wgHl0e8gPmw2aLRmW9v8.nREUzA/e9ERgggWOee5BV0Ks2Eun9CG', '', 'Ko'),
(130, 'Samuel', 'samuel_fung@gmail.com', '$2y$10$3wgHl0e8gPmw2aLRmW9v8.nREUzA/e9ERgggWOee5BV0Ks2Eun9CG', 'img/member/26/Jennifer_PFP.png', 'Fung'),
(131, 'Allen', 'allen_chen@gmail.com', '$2y$10$3wgHl0e8gPmw2aLRmW9v8.nREUzA/e9ERgggWOee5BV0Ks2Eun9CG', '', 'Chen'),
(132, 'Jimmy', 'jimmy_chu@gmail.com', '$2y$10$PuhKYqv.vNOevf8DVK1v5.lb0nNGAuirgJL0Mk7ib.uf9YYeErltO', 'img/member/26/Jennifer_PFP.png', 'Chu'),
(133, 'Theo', 'theo_tang@gmail.com', '$2y$10$PuhKYqv.vNOevf8DVK1v5.lb0nNGAuirgJL0Mk7ib.uf9YYeErltO', '', 'Tang'),
(134, 'David', 'david_cao@gmail.com', '$2y$10$PuhKYqv.vNOevf8DVK1v5.lb0nNGAuirgJL0Mk7ib.uf9YYeErltO', 'img/member/26/Jennifer_PFP.png', 'Cao'),
(135, 'Terence', 'terence_liu@gmail.com', '$2y$10$PuhKYqv.vNOevf8DVK1v5.lb0nNGAuirgJL0Mk7ib.uf9YYeErltO', '', 'Liu'),
(136, 'Sean', 'sean_jeong@gmail.com', '$2y$10$PuhKYqv.vNOevf8DVK1v5.lb0nNGAuirgJL0Mk7ib.uf9YYeErltO', 'img/member/26/Jennifer_PFP.png', 'Jeong'),
(137, 'Justin', 'justin_wang@gmail.com', '$2y$10$PuhKYqv.vNOevf8DVK1v5.lb0nNGAuirgJL0Mk7ib.uf9YYeErltO', '', 'Wang'),
(138, 'Tim', 'tim_tembo@gmail.com', '$2y$10$PuhKYqv.vNOevf8DVK1v5.lb0nNGAuirgJL0Mk7ib.uf9YYeErltO', 'img/member/26/Jennifer_PFP.png', 'Tembo'),
(139, 'Victor', 'victor_Hau@gmail.com', '$2y$10$PuhKYqv.vNOevf8DVK1v5.lb0nNGAuirgJL0Mk7ib.uf9YYeErltO', '', 'Hau'),
(140, 'Linsey', 'linsey_gong@gmail.com', '$2y$10$PuhKYqv.vNOevf8DVK1v5.lb0nNGAuirgJL0Mk7ib.uf9YYeErltO', 'img/member/26/Jennifer_PFP.png', 'Gong'),
(141, 'Jone', 'jone_ko@gmail.com', '$2y$10$PuhKYqv.vNOevf8DVK1v5.lb0nNGAuirgJL0Mk7ib.uf9YYeErltO', '', 'Ko'),
(142, 'Samuel', 'samuel_fung@gmail.com', '$2y$10$PuhKYqv.vNOevf8DVK1v5.lb0nNGAuirgJL0Mk7ib.uf9YYeErltO', 'img/member/26/Jennifer_PFP.png', 'Fung'),
(143, 'Allen', 'allen_chen@gmail.com', '$2y$10$PuhKYqv.vNOevf8DVK1v5.lb0nNGAuirgJL0Mk7ib.uf9YYeErltO', '', 'Chen'),
(144, 'Jimmy', 'jimmy_chu@gmail.com', '$2y$10$LAxfXwKyG7hLBGPpwpUuGuyUjetDUNWp6l87f/TWBytGTfs73UuEy', 'img/member/26/Jennifer_PFP.png', 'Chu'),
(145, 'Theo', 'theo_tang@gmail.com', '$2y$10$LAxfXwKyG7hLBGPpwpUuGuyUjetDUNWp6l87f/TWBytGTfs73UuEy', '', 'Tang'),
(146, 'David', 'david_cao@gmail.com', '$2y$10$LAxfXwKyG7hLBGPpwpUuGuyUjetDUNWp6l87f/TWBytGTfs73UuEy', 'img/member/26/Jennifer_PFP.png', 'Cao'),
(147, 'Terence', 'terence_liu@gmail.com', '$2y$10$LAxfXwKyG7hLBGPpwpUuGuyUjetDUNWp6l87f/TWBytGTfs73UuEy', '', 'Liu'),
(148, 'Sean', 'sean_jeong@gmail.com', '$2y$10$LAxfXwKyG7hLBGPpwpUuGuyUjetDUNWp6l87f/TWBytGTfs73UuEy', 'img/member/26/Jennifer_PFP.png', 'Jeong'),
(149, 'Justin', 'justin_wang@gmail.com', '$2y$10$LAxfXwKyG7hLBGPpwpUuGuyUjetDUNWp6l87f/TWBytGTfs73UuEy', '', 'Wang'),
(150, 'Tim', 'tim_tembo@gmail.com', '$2y$10$LAxfXwKyG7hLBGPpwpUuGuyUjetDUNWp6l87f/TWBytGTfs73UuEy', 'img/member/26/Jennifer_PFP.png', 'Tembo'),
(151, 'Victor', 'victor_Hau@gmail.com', '$2y$10$LAxfXwKyG7hLBGPpwpUuGuyUjetDUNWp6l87f/TWBytGTfs73UuEy', '', 'Hau'),
(152, 'Linsey', 'linsey_gong@gmail.com', '$2y$10$LAxfXwKyG7hLBGPpwpUuGuyUjetDUNWp6l87f/TWBytGTfs73UuEy', 'img/member/26/Jennifer_PFP.png', 'Gong'),
(153, 'Jone', 'jone_ko@gmail.com', '$2y$10$LAxfXwKyG7hLBGPpwpUuGuyUjetDUNWp6l87f/TWBytGTfs73UuEy', '', 'Ko'),
(154, 'Samuel', 'samuel_fung@gmail.com', '$2y$10$LAxfXwKyG7hLBGPpwpUuGuyUjetDUNWp6l87f/TWBytGTfs73UuEy', 'img/member/26/Jennifer_PFP.png', 'Fung'),
(155, 'Allen', 'allen_chen@gmail.com', '$2y$10$LAxfXwKyG7hLBGPpwpUuGuyUjetDUNWp6l87f/TWBytGTfs73UuEy', '', 'Chen'),
(156, 'Jimmy', 'jimmy_chu@gmail.com', '$2y$10$YPg8pBjYWUApN7W/Icy7sO32oNE.dnwQZJiVZ4DIWXn8Xy6qRpBmq', 'img/member/26/Jennifer_PFP.png', 'Chu'),
(157, 'Theo', 'theo_tang@gmail.com', '$2y$10$YPg8pBjYWUApN7W/Icy7sO32oNE.dnwQZJiVZ4DIWXn8Xy6qRpBmq', '', 'Tang'),
(158, 'David', 'david_cao@gmail.com', '$2y$10$YPg8pBjYWUApN7W/Icy7sO32oNE.dnwQZJiVZ4DIWXn8Xy6qRpBmq', 'img/member/26/Jennifer_PFP.png', 'Cao'),
(159, 'Terence', 'terence_liu@gmail.com', '$2y$10$YPg8pBjYWUApN7W/Icy7sO32oNE.dnwQZJiVZ4DIWXn8Xy6qRpBmq', '', 'Liu'),
(160, 'Sean', 'sean_jeong@gmail.com', '$2y$10$YPg8pBjYWUApN7W/Icy7sO32oNE.dnwQZJiVZ4DIWXn8Xy6qRpBmq', 'img/member/26/Jennifer_PFP.png', 'Jeong'),
(161, 'Justin', 'justin_wang@gmail.com', '$2y$10$YPg8pBjYWUApN7W/Icy7sO32oNE.dnwQZJiVZ4DIWXn8Xy6qRpBmq', '', 'Wang'),
(162, 'Tim', 'tim_tembo@gmail.com', '$2y$10$YPg8pBjYWUApN7W/Icy7sO32oNE.dnwQZJiVZ4DIWXn8Xy6qRpBmq', 'img/member/26/Jennifer_PFP.png', 'Tembo'),
(163, 'Victor', 'victor_Hau@gmail.com', '$2y$10$YPg8pBjYWUApN7W/Icy7sO32oNE.dnwQZJiVZ4DIWXn8Xy6qRpBmq', '', 'Hau'),
(164, 'Linsey', 'linsey_gong@gmail.com', '$2y$10$YPg8pBjYWUApN7W/Icy7sO32oNE.dnwQZJiVZ4DIWXn8Xy6qRpBmq', 'img/member/26/Jennifer_PFP.png', 'Gong'),
(165, 'Jone', 'jone_ko@gmail.com', '$2y$10$YPg8pBjYWUApN7W/Icy7sO32oNE.dnwQZJiVZ4DIWXn8Xy6qRpBmq', '', 'Ko'),
(166, 'Samuel', 'samuel_fung@gmail.com', '$2y$10$YPg8pBjYWUApN7W/Icy7sO32oNE.dnwQZJiVZ4DIWXn8Xy6qRpBmq', 'img/member/26/Jennifer_PFP.png', 'Fung'),
(167, 'Allen', 'allen_chen@gmail.com', '$2y$10$YPg8pBjYWUApN7W/Icy7sO32oNE.dnwQZJiVZ4DIWXn8Xy6qRpBmq', '', 'Chen');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `r_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp(),
  `rating` decimal(2,1) DEFAULT NULL,
  `comments` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`r_id`, `student_id`, `tutor_id`, `date_posted`, `rating`, `comments`) VALUES
(6, 167, 158, '2020-11-06 20:12:12', '3.9', 'David is a very good tutor, he carried me through Math 9.');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `cur_grade` decimal(2,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `cur_grade`) VALUES
(102, '5'),
(103, '8'),
(104, '4'),
(105, '6'),
(106, '7'),
(107, '12'),
(114, '5'),
(115, '8'),
(116, '4'),
(117, '6'),
(118, '7'),
(119, '12'),
(126, '5'),
(127, '8'),
(128, '4'),
(129, '6'),
(130, '7'),
(131, '12'),
(138, '5'),
(139, '8'),
(140, '4'),
(141, '6'),
(142, '7'),
(143, '12'),
(150, '5'),
(151, '8'),
(152, '4'),
(153, '6'),
(154, '7'),
(155, '12'),
(162, '5'),
(163, '8'),
(164, '4'),
(165, '6'),
(166, '7'),
(167, '12');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

DROP TABLE IF EXISTS `tutor`;
CREATE TABLE `tutor` (
  `tutor_id` int(11) NOT NULL,
  `balance` decimal(8,2) DEFAULT NULL,
  `bio` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutor_id`, `balance`, `bio`) VALUES
(84, '0.00', 'This is the biography for Jimmy. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(85, '10.99', 'This is the biography for Theo. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(86, '150.40', 'This is the biography for David. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(87, '350.47', 'This is the biography for Terence. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(88, '58.98', 'This is the biography for Sean. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(89, '888.88', 'This is the biography for Justin. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(96, '0.00', 'This is the biography for Jimmy. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(97, '10.99', 'This is the biography for Theo. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(98, '150.40', 'This is the biography for David. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(99, '350.47', 'This is the biography for Terence. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(100, '58.98', 'This is the biography for Sean. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(101, '888.88', 'This is the biography for Justin. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(108, '0.00', 'This is the biography for Jimmy. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(109, '10.99', 'This is the biography for Theo. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(110, '150.40', 'This is the biography for David. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(111, '350.47', 'This is the biography for Terence. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(112, '58.98', 'This is the biography for Sean. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(113, '888.88', 'This is the biography for Justin. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(120, '0.00', 'This is the biography for Jimmy. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(121, '10.99', 'This is the biography for Theo. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(122, '150.40', 'This is the biography for David. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(123, '350.47', 'This is the biography for Terence. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(124, '58.98', 'This is the biography for Sean. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(125, '888.88', 'This is the biography for Justin. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(132, '0.00', 'This is the biography for Jimmy. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(133, '10.99', 'This is the biography for Theo. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(134, '150.40', 'This is the biography for David. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(135, '350.47', 'This is the biography for Terence. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(136, '58.98', 'This is the biography for Sean. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(137, '888.88', 'This is the biography for Justin. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(144, '0.00', 'This is the biography for Jimmy. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(145, '10.99', 'This is the biography for Theo. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(146, '150.40', 'This is the biography for David. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(147, '350.47', 'This is the biography for Terence. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(148, '58.98', 'This is the biography for Sean. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(149, '888.88', 'This is the biography for Justin. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(156, '0.00', 'This is the biography for Jimmy. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(157, '10.99', 'This is the biography for Theo. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(158, '150.40', 'This is the biography for David. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(159, '350.47', 'This is the biography for Terence. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(160, '58.98', 'This is the biography for Sean. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'),
(161, '888.88', 'This is the biography for Justin. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`,`tutor_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`r_id`,`student_id`,`tutor_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

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
