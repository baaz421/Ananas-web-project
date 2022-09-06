-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2021 at 07:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qegmolla`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `m-admin` (
  `AID` int(10) NOT NULL,
  `a_username` varchar(50) NOT NULL,
  `a_fullname` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_gender` varchar(10) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_phone` varchar(20) NOT NULL,
  `a_phonecode` int(10) NOT NULL,
  `a_country` varchar(50) NOT NULL,
  `a_vcode` int(10) NOT NULL,
  `a_vstatus` varchar(15) NOT NULL,
  `a_status` int(5) NOT NULL,
  `a_dateofbirth` varchar(50) NOT NULL,
  `a_createtime` varchar(50) NOT NULL,
  `a_updatetime` varchar(50) DEFAULT NULL,
  `a_address` longtext DEFAULT NULL,
  `a_profilepic` varchar(100) DEFAULT NULL,
  `a_signinmethod` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `m-admin` (`AID`, `a_username`, `a_fullname`, `a_email`, `a_gender`, `a_password`, `a_phone`, `a_phonecode`, `a_country`, `a_vcode`, `a_vstatus`, `a_status`, `a_dateofbirth`, `a_createtime`, `a_updatetime`, `a_address`, `a_profilepic`, `a_signinmethod`) VALUES
(1, 'baaz421', 'Shahbaaz Hussain', 'baazdesigner@gmail.com', 'male', '$2y$10$yneXgDEdAM0NX/SW9Sb0VePEJVGrB6PU.Kqv5HOT/dRKX4FQ0zcAq', '66703387', 974, 'Qatar (‫قطر‬‎)', 287860, 'notverified', 1, '09-08-1994', '17-10-2021 01:39', '21-11-2021 21:10', NULL, 'A_1_1637083181.jpg', NULL),
(2, 'baazdesigner', 'Nadeem Hussain', 'shahbazhussain421@gmail.com', 'male', '$2y$10$q8zs67kiUpqexKtlZkfaHeEelT6bySgh8yEa2EqfckzrfmN/za90q', '55032608', 974, 'Qatar (‫قطر‬‎)', 671592, 'notverified', 1, '09-08-1994', '17-10-2021 03:02', '21-11-2021 21:12', NULL, 'A_2_1637109921.jpg', NULL),
(3, 'Nishajaan', 'Nisha Hussain', 'baaztest421@gmail.com', 'female', '$2y$10$rq3Jyo41S.a2tEcfGABSJOgcFPV4AX3s916irIUcK5m9P91PGx7zq', '44356667', 974, 'Qatar (‫قطر‬‎)', 340438, 'notverified', 1, '27-10-1996', '17-11-2021 03:52', '21-11-2021 21:13', NULL, 'A_3_1637115603.jpg', NULL),
(4, 'zahed1133', 'Syed Zahed', 'example@example.com', 'male', '$2y$10$SoNSESZ.6dJZ8QSEW28wK.riGuThggsLDvTWi//bMp4B4bPkkPDV.', '8987865643', 91, 'India (भारत)', 659668, 'notverified', 1, '01-12-1994', '17-11-2021 04:37', '21-11-2021 21:14', NULL, 'A_4_1637115951.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `m-admin`
  ADD PRIMARY KEY (`AID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `m-admin`
  MODIFY `AID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
