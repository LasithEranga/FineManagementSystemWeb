-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2021 at 10:05 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `nic` varchar(12) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` char(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`nic`, `fname`, `lname`, `full_name`, `email`, `contact_no`, `address`, `password`) VALUES
('925565820V', 'Kamal', 'jndsjkn', 'Kamal Silva', 'lasitheranga1@gmail.com', '0770543422', '200D sjdnfjknj sjdnfjk', '5d41402abc4b2a76b9719d911017c592'),
('945565820V', 'Kamal', 'jndsjkn', 'jksd', 'lasitheranga1@gmail.com', '0770543422', '200D sjdnfjknj sjdnfjk', '5d41402abc4b2a76b9719d911017c592'),
('990564520V', 'Ramila', 'Ransith', 'Ramila Ransith', 'ramila@gmail.com', '0770547822', 'Padukka Rd, Horana', NULL),
('990565450V', 'Ramila', 'Ransith', 'Kamal Silva', 'lasitheranga1@gmail.com', '0770543422', '200D sjdnfjknj sjdnfjk', NULL),
('990565820V', 'LasithEr', 'Eranga', 'Lasith Eranda', 'lasitheranga1@gmail.com', '0770543422', '200D sjdnfjknj sjdnfjk', '5d41402abc4b2a76b9719d911017c592'),
('990811130V', 'Nimal', 'Weerasinghe', 'Nimal Weerasinghe', 'nimal@gmail.com', '0777895244', 'B27,Mailagaswewa,Kandy', 'hello'),
('990815620V', 'Kamal', 'Silva', 'Kamal Silva', 'kamal@gmail.com', '0770547822', '232 Nuwara Eliya ', 'hello'),
('990856530V', 'Abhiru', 'Wijesinghe', 'Abhiru Wijesinghe', 'abhiru@gmail.com', '0770543252', 'B12,Udawatta,Matara', 'asdf'),
('998566530V', 'Lasith', 'Eranda', 'Lasith Eranda', 'lasith@gmail.com', '0770543255', 'B16,Inamaluwa,Matara', 'hello'),
('998896530V', 'Sineru', 'Perera', 'Sineru Perera', 'sineru@gmail.com', '0770325244', 'B26,Gelioya,Matara', 'hello'),
('998965530V', 'Kamal', 'Wijeesundara', 'Wijeesundara Silva', 'kamal@gmail.com', '0770328965', 'B19,Gangala,Kandy', NULL),
('998965820V', 'Kamal', 'jndsjkn', 'Lasith Eranda', 'lasitheranga1@gmail.com', '0770543422', '200D sjdnfjknj sjdnfjk', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fine_receipt`
--

DROP TABLE IF EXISTS `fine_receipt`;
CREATE TABLE IF NOT EXISTS `fine_receipt` (
  `Ref_No` bigint(20) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `time` time NOT NULL,
  `Amount` float NOT NULL,
  `State` tinyint(4) NOT NULL,
  `driver_nic` varchar(12) NOT NULL,
  `officer_id` varchar(5) NOT NULL,
  PRIMARY KEY (`Ref_No`),
  KEY `fine_receipt_ibfk_2` (`driver_nic`),
  KEY `fine_receipt_ibfk_1` (`officer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine_receipt`
--

INSERT INTO `fine_receipt` (`Ref_No`, `Date`, `time`, `Amount`, `State`, `driver_nic`, `officer_id`) VALUES
(2, '2021-07-30', '00:00:00', 200, 3, '990811130V', '35151'),
(3, '2021-11-24', '00:00:00', 545, 0, '990856530V', '35151'),
(4, '2021-07-25', '00:00:00', 54, 5, '990811130V', '35151'),
(5, '2021-11-17', '00:00:00', 458, 5, '990811130V', '35151'),
(6, '2021-07-12', '00:00:00', 218, 2, '990811130V', '35151'),
(7, '2020-03-19', '00:00:00', 545, 5, '990811130V', '35151'),
(8, '2021-11-30', '00:00:00', 654, 5, '990811130V', '35151'),
(9, '2021-07-30', '00:00:00', 654, 5, '998566530V', '35151'),
(10, '2021-07-29', '00:00:00', 654, 5, '990811130V', '35151'),
(11, '2021-07-28', '00:00:00', 654, 5, '990811130V', '35151'),
(12, '2021-11-18', '00:00:00', 654, 5, '990811130V', '35151'),
(13, '2021-07-26', '00:00:00', 654, 5, '990811130V', '35151'),
(14, '2021-07-25', '00:00:00', 654, 5, '990811130V', '35151'),
(15, '2021-11-15', '00:00:00', 654, 5, '990811130V', '35151'),
(16, '2021-07-23', '00:00:00', 654, 5, '990811130V', '35151'),
(17, '2021-07-23', '00:00:00', 654, 5, '990811130V', '35151'),
(18, '2021-07-23', '00:00:00', 658, 5, '990811130V', '35151'),
(19, '2021-08-05', '00:00:00', 5647, 3, '990811130V', '35151'),
(22, '2021-11-24', '00:00:00', 22, 2, '990811130V', '35151'),
(23, '2021-11-24', '00:00:00', 22, 2, '990811130V', '35151'),
(24, '2021-11-24', '00:00:00', 22, 2, '990811130V', '35151'),
(25, '2021-11-24', '20:15:00', 323, 0, '990811130V', '35151'),
(26, '2021-10-23', '16:18:00', 33344, 0, '990811130V', '35151'),
(27, '2021-11-17', '13:23:00', 21, 1, '990811130V', '35151'),
(28, '2021-11-17', '13:23:00', 21, 1, '990811130V', '35151'),
(29, '2021-11-17', '13:23:00', 21, 1, '990811130V', '35151'),
(30, '2021-10-23', '16:45:00', 32112, 0, '990811130V', '35151'),
(31, '2021-10-23', '16:45:00', 32112, 0, '990811130V', '35151'),
(32, '2021-10-23', '16:48:00', 1232, 0, '990811130V', '35151'),
(33, '2021-10-23', '16:51:00', 1232, 0, '990811130V', '35151'),
(34, '2021-10-23', '16:56:00', 1232, 0, '990811130V', '35151'),
(35, '2021-10-23', '16:57:00', 1232, 0, '990811130V', '35151'),
(36, '2021-10-23', '16:57:00', 1232, 0, '990811130V', '35151'),
(37, '2021-11-24', '13:23:00', 22, 0, '990811130V', '35151'),
(38, '2021-10-23', '17:00:00', 1232, 0, '990811130V', '35151'),
(39, '2021-10-23', '17:00:00', 1232, 0, '990811130V', '35151'),
(40, '2021-10-23', '17:00:00', 1232, 0, '990811130V', '35151'),
(41, '2021-10-23', '17:03:00', 1232, 0, '990811130V', '35151'),
(42, '2021-10-23', '17:04:00', 1232, 2, '990811130V', '35151'),
(43, '2021-10-23', '17:05:00', 1232, 0, '990811130V', '35151'),
(44, '2021-10-23', '17:06:00', 33344, 2, '990811130V', '35151'),
(45, '2021-10-23', '17:08:00', 33344, 2, '990811130V', '35151'),
(46, '2021-11-23', '17:08:00', 33344, 0, '990811130V', '35151'),
(47, '2021-10-23', '17:10:00', 33344, 0, '990811130V', '35151'),
(48, '2021-10-23', '17:10:00', 33344, 1, '990811130V', '35151'),
(49, '2021-10-23', '17:10:00', 33344, 0, '990811130V', '35151'),
(50, '2021-10-23', '17:10:00', 33344, 0, '990811130V', '35151'),
(51, '2021-10-23', '17:10:00', 33344, 0, '990811130V', '35151'),
(52, '2021-10-23', '17:26:00', 1232, 0, '990811130V', '35151'),
(53, '2021-11-18', '17:29:00', 1232, 0, '990811130V', '35151'),
(54, '2021-10-23', '17:30:00', 1232, 0, '998896530V', '35151'),
(55, '2021-10-23', '20:53:00', 2464, 0, '990811130V', '35151'),
(56, '2021-10-23', '20:55:00', 33344, 0, '990811130V', '35151'),
(58, '2021-10-26', '11:48:00', 1232.23, 0, '990811130V', '35151'),
(59, '2021-10-27', '14:44:00', 1232.23, 0, '990811130V', '35151'),
(60, '2021-11-01', '14:29:00', 2464.46, 0, '990811130V', '45564'),
(61, '2021-12-01', '18:07:00', 1232.23, 1, '990565820V', '45564'),
(62, '2021-12-02', '18:21:00', 1232.23, 0, '990565820V', '45564'),
(63, '2021-12-03', '11:56:00', 5645.23, 0, '990811130V', '45564');

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

DROP TABLE IF EXISTS `license`;
CREATE TABLE IF NOT EXISTS `license` (
  `id` char(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` float NOT NULL,
  `driver_nic` varchar(12) NOT NULL,
  `fince_receipt_Ref` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_nic` (`driver_nic`),
  KEY `fine_receipt` (`fince_receipt_Ref`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `date`, `amount`, `driver_nic`, `fince_receipt_Ref`) VALUES
(1, '2021-11-25', 1200, '990811130V', 2),
(2, '2021-08-05', 327, '990811130V', 7),
(3, '2021-11-01', 2564, '990856530V', 10),
(4, '2021-11-02', 5685, '998896530V', 57),
(5, '2021-11-03', 568, '990856530V', 3),
(6, '2021-12-01', 2367.23, '990811130V', 56);

-- --------------------------------------------------------

--
-- Table structure for table `police_station`
--

DROP TABLE IF EXISTS `police_station`;
CREATE TABLE IF NOT EXISTS `police_station` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

DROP TABLE IF EXISTS `rule`;
CREATE TABLE IF NOT EXISTS `rule` (
  `rule_id` int(11) NOT NULL,
  `rule_name` varchar(100) NOT NULL,
  `penalty_amount` float NOT NULL,
  `description` varchar(200) NOT NULL,
  `tag` varchar(20) NOT NULL,
  PRIMARY KEY (`rule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`rule_id`, `rule_name`, `penalty_amount`, `description`, `tag`) VALUES
(1, 'Double line crossed', 1232.23, 'The driver crossed double lines', 'double line'),
(2, 'Drunk and Drive', 32112.2, 'Driver is drunk and caugth while driving the vehicle', 'drunk drive'),
(32, 'kjdnjk', 2132.23, 'jkdnfjk', 'kjndj'),
(4587, 'Overtake on zebra crossing', 5645.23, 'Driver overtake the vehicle on zebra crossing ', 'zebra crossing');

-- --------------------------------------------------------

--
-- Table structure for table `rules_broken`
--

DROP TABLE IF EXISTS `rules_broken`;
CREATE TABLE IF NOT EXISTS `rules_broken` (
  `fine_receipt_id` bigint(20) NOT NULL,
  `rule_id` int(11) NOT NULL,
  PRIMARY KEY (`fine_receipt_id`,`rule_id`),
  KEY `rule_id` (`rule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules_broken`
--

INSERT INTO `rules_broken` (`fine_receipt_id`, `rule_id`) VALUES
(44, 1),
(45, 1),
(46, 1),
(50, 1),
(51, 2),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(56, 2),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 4587);

-- --------------------------------------------------------

--
-- Table structure for table `traffic_police_officer`
--

DROP TABLE IF EXISTS `traffic_police_officer`;
CREATE TABLE IF NOT EXISTS `traffic_police_officer` (
  `police_id` varchar(5) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `contact_no` char(21) NOT NULL,
  `post` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`police_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traffic_police_officer`
--

INSERT INTO `traffic_police_officer` (`police_id`, `fname`, `lname`, `full_name`, `email`, `nic`, `contact_no`, `post`, `address`, `password`) VALUES
('34276', 'Kamal', 'jndsjkn', 'Lasith Eranda', 'lasitheranga1@gmail.com', '990565820V', '0770543422', 'Officer', '200D sjdnfjknj sjdnfjk', NULL),
('34289', 'jsdnjk', 'jndsjkn', 'Lasith Eranda', 'lasitheranga1@gmail.com', '990565820V', '0770543422', 'Officer', '200D sjdnfjknj sjdnfjk', NULL),
('35151', 'Lasithl', 'Eranda', 'Lasith Eranda', 'lasith@gmail.com', '990811130V', '0770543231', 'Traffic Police Officer', 'B17,Madawalalanda,Dambulla', NULL),
('45564', 'Sineru', 'Perera', 'Sineru Perera', 'sineru@gmail.com', '990545645V', '0775354546', 'Traffic Police Officer', 'B12,Udawatta,Matara', '5d41402abc4b2a76b9719d911017c592'),
('56859', 'Kamal', 'jndsjkn', 'Lasith Eranda', 'lasitheranga1@gmail.com', '990565820V', '0770543422', 'Officer', '200D sjdnfjknj sjdnfjk', NULL),
('56895', 'Abhiru', 'Wijesinghe', 'Abhiru Wijesinghe', 'abhiru@gmail.com', '990721130V', '0770325244', 'Traffic Police Officer', 'B18,Dekinda,Kataragama', NULL),
('8399', 'jnfbjnsjd', 'jnsdjn', 'jnsdjn', 'jks@gmail.com', '232323', '3422343', 'sdjnkj', 'nsjdkn', NULL),
('89655', 'Ramila', 'Ransith', 'Ramila Ransith', 'ramila@gmail.com', '880565820V', '0550543422', 'Officer', 'Padukka Rd, Horana', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`) VALUES
(1, 'lasith', '13926153831969718150168391712481961204215'),
(2, 'lasith', '5d41402abc4b2a76b9719d911017c592'),
(3, 'eranga', '5d41402abc4b2a76b9719d911017c592');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fine_receipt`
--
ALTER TABLE `fine_receipt`
  ADD CONSTRAINT `fine_receipt_ibfk_1` FOREIGN KEY (`officer_id`) REFERENCES `traffic_police_officer` (`police_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fine_receipt_ibfk_2` FOREIGN KEY (`driver_nic`) REFERENCES `driver` (`nic`) ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fine_receipt` FOREIGN KEY (`fince_receipt_Ref`) REFERENCES `fine_receipt` (`Ref_No`),
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`driver_nic`) REFERENCES `driver` (`nic`) ON UPDATE CASCADE;

--
-- Constraints for table `rules_broken`
--
ALTER TABLE `rules_broken`
  ADD CONSTRAINT `rules_broken_ibfk_1` FOREIGN KEY (`rule_id`) REFERENCES `rule` (`rule_id`),
  ADD CONSTRAINT `rules_broken_ibfk_2` FOREIGN KEY (`fine_receipt_id`) REFERENCES `fine_receipt` (`Ref_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
