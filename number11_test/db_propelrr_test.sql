-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 08:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_propelrr_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `bday` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`name`, `email`, `phone_no`, `bday`, `address`, `age`, `gender`) VALUES
('Marvin Esguerra', 'mrvndlnsgrr@gmail.com', '09496163883', '1998-03-14', NULL, 23, '1'),
('Marvin Esguerra', 'mrvndlnsgrr@gmail.com', '09496163883', '0000-00-00', NULL, 0, ''),
('Marvin Esguerra', 'mrvndlnsgrr@gmail.com', '09496163883', '1998-04-14', NULL, 23, '1'),
('Marvin Esguerra', 'mrvndlnsgrr@gmail.com', '09496163883', '1998-04-14', NULL, 23, '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
