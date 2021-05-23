-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 23, 2021 at 05:58 PM
-- Server version: 8.0.18
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
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(2, 'Farzana', 'farzana@cuet.ac.bd', 'cuet', '2019-11-02 02:48:47', '2019-11-07'),
(3, 'admin', 'admin@gmail.com', 'admin', '2019-11-07 18:33:06', '2020-03-30'),
(4, 'dining', 'dining@gmail.com', 'dining', '2020-03-28 16:00:09', '0000-00-00'),
(5, 'official', 'official@gmail.com', 'official', '2020-03-28 16:00:49', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `booking_room`
--

DROP TABLE IF EXISTS `booking_room`;
CREATE TABLE IF NOT EXISTS `booking_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `room_no` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_room`
--

INSERT INTO `booking_room` (`id`, `user_email`, `room_no`) VALUES
(39, 'u1504091@student.cuet.ac.bd', 413),
(40, 'u1504115@student.cuet.ac.bd', 413),
(42, 'u1604075@student.cuet.ac.bd', 413),
(43, 'u1504116@student.cuet.ac.bd', 420),
(44, 'u1504098@student.cuet.ac.bd', 304);

-- --------------------------------------------------------

--
-- Table structure for table `dining`
--

DROP TABLE IF EXISTS `dining`;
CREATE TABLE IF NOT EXISTS `dining` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `Date` int(200) NOT NULL,
  `Mill` int(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dining`
--

INSERT INTO `dining` (`id`, `Date`, `Mill`, `Email`, `month`, `year`) VALUES
(42, 1, 2, 'u1504091@student.cuet.ac.bd', 'April', '2020'),
(43, 1, 2, 'u1504115@student.cuet.ac.bd', 'April', '2020'),
(45, 15, 1, 'u1604075@student.cuet.ac.bd', 'April', '2020'),
(46, 22, 1, 'u1504116@student.cuet.ac.bd', 'January', '2019'),
(47, 3, 1, 'u1504091@student.cuet.ac.bd', 'March', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `foodmenu`
--

DROP TABLE IF EXISTS `foodmenu`;
CREATE TABLE IF NOT EXISTS `foodmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(10) NOT NULL,
  `it1` text NOT NULL,
  `it2` text NOT NULL,
  `it3` text NOT NULL,
  `it4` text NOT NULL,
  `it5` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodmenu`
--

INSERT INTO `foodmenu` (`id`, `day`, `it1`, `it2`, `it3`, `it4`, `it5`) VALUES
(28, 1, 'vat', 'dal', 'vaji', 'mangsho', 'alu vorta'),
(29, 2, 'vuna khichuri', 'Mangsho', 'Begun vaji', 'Dal', 'Coke'),
(30, 3, 'Murgi vorta', 'vat', 'dal', 'Dim Vaji', 'Alu vaji');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomno` int(11) DEFAULT NULL,
  `seater` int(11) DEFAULT NULL,
  `feespy` int(11) DEFAULT NULL,
  `firstName` varchar(500) NOT NULL,
  `lastName` varchar(500) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `email` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `egycontactno` bigint(20) NOT NULL,
  `guardianName` varchar(50) NOT NULL,
  `guardianRelation` varchar(50) NOT NULL,
  `guardianContactno` bigint(20) NOT NULL,
  `corresAddress` varchar(100) NOT NULL,
  `pmntAddress` varchar(100) NOT NULL,
  `booking_date` timestamp NOT NULL,
  `food_status` int(11) NOT NULL,
  `alert` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `roomno`, `seater`, `feespy`, `firstName`, `lastName`, `contactno`, `email`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `pmntAddress`, `booking_date`, `food_status`, `alert`) VALUES
(28, 413, 4, 1000, 'Srijoni', 'Saha', 1759830993, 'u1504091@student.cuet.ac.bd', 1759830993, 'Nitish Saha', 'Father', 1711155591, 'Chittagong', 'Comilla', '2016-03-30 16:49:23', 1, 'green'),
(29, 413, 4, 1000, 'Rumi', 'Saha', 1723845936, 'u1504115@student.cuet.ac.bd', 1473284356, 'Bimol Saha', 'Father', 1943275645, 'Chittagong', 'Noakhali', '2017-03-30 16:50:25', 1, 'green'),
(31, 413, 4, 1000, 'taki', 'rahman', 1723845936, 'u1604075@student.cuet.ac.bd', 1680167919, 'Halima akter', 'mother', 1437568239, 'dhaka', 'dhaka', '2020-03-30 16:59:13', 1, 'DEALLOCATED'),
(32, 420, 4, 1000, 'dipannita', 'saha', 1759830993, 'u1504116@student.cuet.ac.bd', 1937453627, 'anima roy', 'mother', 1711155591, 'Chittagong', 'Comilla', '2020-03-30 17:41:04', 1, 'green'),
(33, 304, 4, 1000, 'Tanni', 'tabassum', 1827354632, 'u1504098@student.cuet.ac.bd', 1937453627, 'Nirja tabassum', 'Mother', 1923945439, 'Sylhet', 'Sylhet', '2021-03-16 06:12:15', 0, 'DEALLOCATED');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

DROP TABLE IF EXISTS `rent`;
CREATE TABLE IF NOT EXISTS `rent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_bill_paid` bigint(20) DEFAULT NULL,
  `verified` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ultimate_paid` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `total_bill_paid`, `verified`, `email`, `ultimate_paid`) VALUES
(8, 0, NULL, 'u1604075@student.cuet.ac.bd', 0),
(6, 0, NULL, 'u1504116@student.cuet.ac.bd', 0),
(7, 10, 'NOT VERIFIED', 'u1504091@student.cuet.ac.bd', 25),
(9, 0, NULL, 'u1504115@student.cuet.ac.bd', 0),
(10, 0, NULL, 'u1504098@student.cuet.ac.bd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seater` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `seater`, `room_no`, `fees`, `posting_date`) VALUES
(4, 3, 303, 1000, '2019-11-07 18:30:56'),
(5, 4, 304, 1000, '2019-11-07 18:56:01'),
(6, 3, 320, 1000, '2019-11-08 16:56:26'),
(9, 3, 413, 1000, '2020-03-25 14:39:20'),
(11, 4, 420, 1000, '2020-03-28 14:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

DROP TABLE IF EXISTS `userregistration`;
CREATE TABLE IF NOT EXISTS `userregistration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `contactNo` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `egycontactno` bigint(20) NOT NULL,
  `guardianName` varchar(50) NOT NULL,
  `guardianRelation` varchar(50) NOT NULL,
  `guardianContactno` bigint(20) NOT NULL,
  `corresAddress` varchar(50) NOT NULL,
  `pmntAddress` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `firstName`, `lastName`, `contactNo`, `email`, `password`, `regDate`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `pmntAddress`) VALUES
(9, 'Srijoni', 'Saha', 1759830993, 'u1504091@student.cuet.ac.bd', 'srij', '2020-03-22 16:47:22', 1759830993, 'Nitish Saha', 'Father', 1711155591, 'Chittagong', 'Comilla'),
(10, 'Rumi', 'Saha', 1723845936, 'u1504115@student.cuet.ac.bd', 'rumi', '2020-03-23 14:56:32', 1473284356, 'Bimol Saha', 'Father', 1943275645, 'Chittagong', 'Noakhali'),
(13, 'Tasmina', 'Tasin', 1839573846, 'u1504075@student.cuet.ac.bd', 'cuet', '2020-03-24 17:29:10', 1802365482, 'Jamal khan', 'father', 1836295746, 'Chittagong', 'Chittagong'),
(14, 'Shampriti', 'saha', 1680167919, 'u1904075@student.cuet.ac.bd', 'bulti', '2020-03-25 18:18:26', 1937453627, 'Nitish Saha', 'Father', 1711155591, 'Comila', 'Comilla'),
(17, 'dipannita', 'saha', 1759830993, 'u1504116@student.cuet.ac.bd', 'rumi', '2020-03-25 18:24:22', 1937453627, 'anima roy', 'mother', 1711155591, 'Chittagong', 'Comilla'),
(18, 'taki', 'rahman', 1723845936, 'u1604075@student.cuet.ac.bd', 'halim', '2020-03-25 18:49:04', 1680167919, 'Halima akter', 'mother', 1437568239, 'dhaka', 'dhaka'),
(19, 'jarin', 'tasnim', 1738926375, 'u1808091@student.cuet.ac.bd', 'tonvi', '2020-03-27 14:03:20', 1937453627, 'Fatima jahan', 'mother', 3783623452, 'Comila', 'Comilla'),
(20, 'jarin', 'tonvi', 1738926375, 'u1604080@student.cuet.ac.bd', 'tina', '2020-03-27 14:05:18', 1937453627, 'Ayesha siddiqa', 'mother', 3783623452, 'Comila', 'Comilla'),
(21, 'Hridy', 'hossain', 1827354632, 'u1502032@student.cuet.ac.bd', 'hridy', '2020-03-28 15:00:29', 1874635273, 'Rowshan jahan', 'Mother', 1923945392, 'Dhaka', 'Dhaka'),
(24, 'Anima', 'roy', 1680167919, 'u1104075@student.cuet.ac.bd', 'anima', '2020-03-29 16:15:26', 1937453627, 'Onnodaproshad roy', 'Father', 3783623452, 'Sylhet', 'Comilla'),
(25, 'Monisha', 'roy', 1982347564, '1304091@student.cuet.ac.bd', 'tumpa', '2020-03-30 15:51:24', 1874635273, 'Rita roy', 'Mother', 1876534256, 'Chittagomg', 'Chittagong'),
(26, 'Angkita', 'saha', 1856483725, '1605087@student.cuet.ac.bd', 'puchu', '2020-03-30 15:55:08', 1837625364, 'Sumitra Saha', 'Mother', 1875463542, 'Comilla', 'Comilla'),
(27, 'Shahrin', 'Keya', 1680167919, 'u1502119@student.cuet.ac.bd', 'keya', '2020-03-30 18:32:50', 1937453627, 'Rehana jahan', 'Mother', 173845364, 'Dhaka', 'Dhaka'),
(31, 'Tanni', 'tabassum', 1827354632, 'u1504098@student.cuet.ac.bd', 'tanni', '2021-03-16 06:09:27', 1937453627, 'Nirja tabassum', 'Mother', 1923945439, 'Sylhet', 'Sylhet'),
(32, 'jarin', 'naila', 1738926375, 'jarin@gmail.com', 'jarin', '2021-03-16 06:15:31', 1874635273, 'Rehana jahan', 'mother', 37836234527, 'dhaka', 'dhaka');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
