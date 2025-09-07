-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 07, 2025 at 03:56 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amity_university`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `s_name` varchar(255) DEFAULT NULL,
  `s_entrollment` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `s_course` varchar(255) NOT NULL,
  `s_city` varchar(255) NOT NULL,
  `s_state` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_entrollment` (`s_entrollment`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `s_name`, `s_entrollment`, `s_course`, `s_city`, `s_state`, `created_at`, `updated_at`) VALUES
(1, 'KAMANI SMIT JAGDISHBHAI', 'A869117725004', 'MSC(DS)', 'RAJKOT', 'GUJARAT', '2025-09-06 09:53:22', '2025-09-06 09:58:58'),
(2, 'KAMANI JAY JAMANBHAI', 'A869117725007', 'MSC(AI & ML)', 'RAJKOT', 'GUJARAT', '2025-09-06 09:58:44', '2025-09-06 09:59:43'),
(3, 'HIRAPARA THIRTHKUMARK HARSHADBHAI', 'A869117725003', 'MSC(DS)', 'RAJKOT', 'GUJARAT', '2025-09-06 09:56:40', '2025-09-06 09:59:50'),
(4, 'RADADIYA VANSH ASHOKBHAI', 'A869117725002', 'MSC(DS)', 'SURAT', 'GUJARAT', '2025-09-06 09:55:40', NULL),
(5, 'MAVANI KRISHNAM VAJUBHAI', 'A8691177250', 'MSC(DS)', 'RAJKOT', 'GUJARAT', '2025-09-06 09:53:50', '2025-09-06 10:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
