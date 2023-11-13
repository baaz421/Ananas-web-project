-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 08:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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

CREATE TABLE `admin` (
  `AID` int(10) NOT NULL,
  `a_username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_phonecode` int(10) NOT NULL,
  `a_country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_country_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_vcode` int(10) NOT NULL,
  `a_vstatus` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_status` int(5) NOT NULL,
  `a_dateofbirth` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_createtime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_updatetime` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_profilepic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_signinmethod` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `a_username`, `a_fullname`, `a_email`, `a_gender`, `a_password`, `a_phone`, `a_phonecode`, `a_country`, `a_country_code`, `a_vcode`, `a_vstatus`, `a_status`, `a_dateofbirth`, `a_createtime`, `a_updatetime`, `a_address`, `a_profilepic`, `a_signinmethod`) VALUES
(1, 'baaz421', 'Shahbaaz Hussain', 'baazdesigner@gmail.com', 'male', '$2y$10$yneXgDEdAM0NX/SW9Sb0VePEJVGrB6PU.Kqv5HOT/dRKX4FQ0zcAq', '66703387', 974, 'Qatar (‫قطر‬‎)', 'IN', 287860, 'notverified', 1, '09-08-1994', '17-10-2021 01:39', '24-11-2021 04:49', NULL, 'A_1_1675273909.jpg', NULL),
(2, 'baazdesigner', 'Nadeem Hussain', 'shahbazhussain421@gmail.com', 'male', '$2y$10$q8zs67kiUpqexKtlZkfaHeEelT6bySgh8yEa2EqfckzrfmN/za90q', '55032608', 974, 'Qatar (‫قطر‬‎)', NULL, 671592, 'notverified', 1, '09-08-1994', '17-10-2021 03:02', '21-11-2021 21:12', NULL, 'A_2_1637109921.jpg', NULL),
(3, 'Nishajaan', 'Nisha Hussain', 'baaztest421@gmail.com', 'female', '$2y$10$rq3Jyo41S.a2tEcfGABSJOgcFPV4AX3s916irIUcK5m9P91PGx7zq', '44356667', 974, 'Qatar (‫قطر‬‎)', NULL, 340438, 'notverified', 1, '27-10-1996', '17-11-2021 03:52', '21-11-2021 21:13', NULL, 'A_3_1637115603.jpg', NULL),
(4, 'zahed1133', 'Syed Zahed', 'example@example.com', 'male', '$2y$10$SoNSESZ.6dJZ8QSEW28wK.riGuThggsLDvTWi//bMp4B4bPkkPDV.', '8987865643', 91, 'India (भारत)', NULL, 659668, 'notverified', 1, '01-12-1994', '17-11-2021 04:37', '24-11-2021 05:08', NULL, 'A_4_1637115951.jpg', NULL),
(200, 'jaan143', 'mere jaan', 'jaan@jaan.com', 'female', '$2y$10$LLDtXzeXmk2e2lyoEXoZFOLh/SYh7r7/q4kfHrPbO8Jn7Df4H68Z6', '912345786', 351, 'Portugal', NULL, 254792, 'notverified', 1, '19-01-1994', '24-11-2021 06:07', '', NULL, 'female-avatar.jpg', NULL),
(201, 'imh662', 'iyad', 'imh662@gmail.com', 'male', '$2y$10$XotTHu7FVM.tIQcyOeneiOHCx8BKiQrZlddklMF.a2AuGlvBRUVxW', '912665533', 351, 'Portugal', NULL, 531325, 'notverified', 1, '29-01-1976', '09-12-2021 16:00', '09-12-2021 16:32', NULL, 'A_201_1639054879.jpg', NULL),
(219, 'baaz company', 'shahbaaz Hussain', 'shahbaaz0421@gmail.com', 'male', '$2y$10$SMAqcQQyfz1.Sraya/ALEu7Ue1vuM33cECiZPB/LNPjxd4zZnE23q', '9110703891', 91, 'India (भारत)', NULL, 0, 'verified', 1, '09-08-1994', '26-12-2022 06:19', '', NULL, 'A_219_1672026451.jpg', NULL),
(220, 'New Design Co', 'Shahbaaz Hussain', 'shahbaaz04211@gmail.com', 'male', '$2y$10$Uu2vmdJerveoGaowocgDC.oixRGrxJJdXS9OIrx6/vV4CBCf6qJOu', '9110703891', 91, 'India (भारत)', 'IN', 0, 'verified', 1, '09-08-1994', '20-01-2023 06:34', '28-01-2023 23:28', NULL, 'A_220_1674185785.jpg', NULL),
(222, 'Nisha Artist', 'Nisha Hussain', 'nishabaaz@gmail.com', NULL, '$2y$10$EELrXGcGbSt2pJJbIyIzQeyixd7j.ZGXjPzHwtuum5g0jMCSFRtJS', '55038657', 974, 'Qatar (‫قطر‬‎)', 'QA', 0, 'verified', 1, NULL, '09-03-2023 22:47', '', NULL, 'avatar.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `b_id` int(10) NOT NULL,
  `des_img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mob_img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_status` int(5) DEFAULT NULL,
  `b_proccess` int(5) DEFAULT NULL,
  `create_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`b_id`, `des_img`, `mob_img`, `b_title`, `b_link`, `b_country`, `b_status`, `b_proccess`, `create_date`, `update_date`) VALUES
(1, 'B_1_1676224278.jpg', 'B_1_1676224894.jpg', 'Cherry Product on sale', '49', '102', 1, 0, '13-02-2023 00:10', '13-02-2023 00:57'),
(3, 'B_3_1676238595.jpg', 'B_3_1676238606.jpg', 'Fansy Plates', '49', '102', 1, 0, '13-02-2023 00:50', '13-02-2023 00:58'),
(4, 'B_4_1676239505.jpg', 'B_4_1676239522.jpg', 'Relaxing sofa set', '48', '235', 1, 0, '13-02-2023 01:06', '13-02-2023 01:08'),
(5, 'B_5_1676239584.jpg', 'B_5_1676239595.jpg', 'Flying drone new product', '39', '235', 1, 0, '13-02-2023 01:07', '13-02-2023 01:08'),
(6, 'B_6_1676239670.jpg', 'B_6_1676239685.jpg', 'Brown stylish bag', '43', '235', 1, 0, '13-02-2023 01:08', '13-02-2023 01:08'),
(7, 'B_7_1676792930.jpg', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `deal_id` int(15) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `user_id`, `product_id`, `deal_id`, `qty`, `unit_price`, `total`, `time`) VALUES
(88, 42, 23, 21, 3, '60.00', '180.00', '08-04-2022 05:54'),
(89, 42, 7, 22, 2, '40.00', '80.00', '08-04-2022 05:54'),
(279, 38, 43, 37, 1, '15.00', '15.00', '12-01-2023 05:14'),
(288, 55, 48, 48, 1, '3.00', '3.00', '16-02-2023 20:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(10) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_name_arabic` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `time` datetime DEFAULT current_timestamp(),
  `us_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `cat_name`, `cat_name_arabic`, `status`, `time`, `us_id`) VALUES
(1, 'Electronic', 'إلكترونيات', 1, NULL, 36),
(2, 'Accessories', 'مستلزمات', 1, NULL, 37),
(4, 'clothes', 'clothes', 1, '2021-09-27 23:35:37', 38),
(10, 'mobile', 'mobile', 1, '2021-09-28 02:09:21', 36),
(12, 'perfumes', 'perfumes', 1, '2021-09-28 13:51:57', 37),
(13, 'gifts', 'gifts', 1, '2021-09-28 13:53:01', 38),
(16, 'basket', 'basket', 1, '2021-09-28 21:52:17', 37),
(17, 'cars', 'cars', 1, '2021-09-28 21:52:26', 38),
(18, 'bike', 'bike', 1, '2021-09-28 21:52:32', 36),
(19, 'tablets', 'tablets', 1, '2021-09-28 21:52:46', 37),
(20, 'flowers', 'flowers', 1, '2021-09-28 22:01:56', 38),
(21, 'home', 'home', 0, '2021-09-28 22:04:19', 36),
(22, 'furniture', 'furniture', 0, '2021-09-28 22:04:31', 37),
(23, 'sports', 'sports', 0, '2021-09-28 22:04:45', 38),
(24, 'fashion', 'fashion baby', 0, '2021-09-28 22:04:59', 36),
(25, 'kids', 'kids', 0, '2021-09-28 22:05:24', 37),
(26, 'pets', 'pets', 0, '2021-09-28 22:05:31', 38),
(29, 'kids ', 'kids h', 0, '2021-10-13 15:02:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `ID` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `deal_ids` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deal_qtys` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_per` int(10) DEFAULT NULL,
  `coupon_id` int(50) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `current_bal` decimal(10,2) DEFAULT NULL,
  `available_bal` decimal(10,2) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `created_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`ID`, `user_id`, `deal_ids`, `deal_qtys`, `coupon_per`, `coupon_id`, `sub_total`, `total`, `current_bal`, `available_bal`, `status`, `created_date`) VALUES
(3, 43, '23', '4', 35, NULL, '80.00', '52.00', '160.00', '108.00', 1, '06-10-2022 02:46'),
(8, 38, '23-24', '2-2', 20, NULL, '100.00', '80.00', '99.00', '19.00', 1, '02-09-2022 05:59'),
(9, 38, '23', '1', 20, NULL, '20.00', '16.00', '19.00', '3.00', 1, '02-09-2022 06:07'),
(10, 38, '25', '1', 0, NULL, '100.00', '100.00', '153.00', '53.00', 1, '05-10-2022 20:50'),
(11, 38, '30', '2', 0, NULL, '140.00', '140.00', '251.00', '111.00', 1, '06-10-2022 02:03'),
(12, 43, '31', '1', 20, NULL, '100.00', '80.00', '160.00', '80.00', 1, '06-10-2022 03:05'),
(13, 49, '31', '2', 20, NULL, '200.00', '160.00', '200.00', '40.00', 1, '06-10-2022 03:07'),
(14, 48, '31', '1', 0, NULL, '100.00', '100.00', '360.00', '260.00', 1, '06-10-2022 03:10'),
(15, 50, '31', '4', 0, NULL, '400.00', '400.00', '500.00', '100.00', 1, '06-10-2022 03:27'),
(22, 37, '31', '2', 0, NULL, '200.00', '200.00', '300.00', '100.00', 1, '06-10-2022 04:58'),
(23, 43, '31', '2', 20, NULL, '200.00', '160.00', '320.00', '160.00', 1, '06-10-2022 05:06'),
(24, 43, '32', '1', 20, NULL, '100.00', '80.00', '160.00', '80.00', 1, '07-10-2022 16:32'),
(25, 43, '33', '1', 20, NULL, '50.00', '40.00', '160.00', '120.00', 1, '07-10-2022 16:55'),
(26, 43, '34', '1', 0, NULL, '50.00', '50.00', '170.00', '120.00', 1, '10-10-2022 03:46'),
(27, 43, '33', '2', 0, NULL, '100.00', '100.00', '120.00', '20.00', 1, '10-10-2022 03:48'),
(28, 48, '33', '2', 0, NULL, '100.00', '100.00', '260.00', '160.00', 1, '10-10-2022 04:17'),
(29, 49, '33', '1', 0, NULL, '50.00', '50.00', '90.00', '40.00', 1, '10-10-2022 04:20'),
(30, 40, '33', '1', 0, NULL, '50.00', '50.00', '70.00', '20.00', 1, '10-10-2022 05:06'),
(31, 38, '33', '1', 0, NULL, '50.00', '50.00', '299.00', '249.00', 1, '10-10-2022 05:07'),
(37, 43, '34', '1', 20, 13, '50.00', '40.00', '70.00', '30.00', 1, '10-10-2022 12:36'),
(38, 43, '34-37', '1-1', 20, 13, '65.00', '52.00', NULL, NULL, 0, NULL),
(39, 38, '34', '2', 0, NULL, '100.00', '100.00', '299.00', '199.00', 1, '05-12-2022 23:17'),
(40, 38, '34-37-36', '1-2-1', 10, 14, '100.00', '90.00', '109.00', '19.00', 1, '17-12-2022 23:00'),
(41, 38, '34-37-36', '1-2-1', 10, 14, '100.00', '90.00', '319.00', '229.00', 1, '18-12-2022 02:51'),
(42, 38, '36', '1', 0, NULL, '20.00', '20.00', '229.00', '209.00', 1, '18-12-2022 02:58'),
(43, 38, '36', '3', 0, NULL, '60.00', '60.00', '209.00', '149.00', 1, '18-12-2022 03:20'),
(44, 38, '36', '1', 0, NULL, '20.00', '20.00', '149.00', '129.00', 1, '18-12-2022 03:31'),
(45, 38, '36', '1', 0, NULL, '20.00', '20.00', '129.00', '109.00', 1, '18-12-2022 03:35'),
(46, 38, '36', '1', 0, NULL, '20.00', '20.00', '109.00', '89.00', 1, '18-12-2022 03:42'),
(47, 38, '34', '1', 0, NULL, '50.00', '50.00', '89.00', '39.00', 1, '20-12-2022 16:08'),
(48, 52, '37', '1', 0, NULL, '15.00', '15.00', '200.00', '185.00', 1, '21-12-2022 22:55'),
(49, 52, '36', '4', 0, NULL, '80.00', '80.00', '185.00', '105.00', 1, '24-12-2022 08:21'),
(50, 50, '36', '4', 0, NULL, '80.00', '80.00', '100.00', '20.00', 1, '24-12-2022 08:30'),
(51, 48, '36', '2', 0, NULL, '40.00', '40.00', '160.00', '120.00', 1, '24-12-2022 08:33'),
(52, 37, '36', '2', 0, NULL, '40.00', '40.00', '100.00', '60.00', 1, '24-12-2022 08:37'),
(53, 52, '37', '1', 10, 14, '15.00', '14.00', '105.00', '91.00', 1, '24-12-2022 16:25'),
(54, 52, '34', '1', 0, NULL, '50.00', '50.00', NULL, NULL, 0, NULL),
(55, 55, '37', '8', 0, NULL, '120.00', '120.00', '300.00', '180.00', 1, '28-01-2023 17:35'),
(56, 48, '36', '1', 0, NULL, '20.00', '20.00', '120.00', '100.00', 1, '21-01-2023 18:00'),
(57, 55, '37', '2', 0, NULL, '30.00', '30.00', '180.00', '150.00', 1, '28-01-2023 17:53'),
(59, 55, '37', '2', 0, NULL, '30.00', '30.00', '150.00', '120.00', 1, '28-01-2023 18:22'),
(60, 55, '47', '5', 0, NULL, '12.00', '12.00', '120.00', '108.00', 1, '29-01-2023 00:24');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `iso` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `iso3` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `dial` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso`, `iso3`, `dial`, `currency`, `currency_name`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', '93', 'AFN', 'Afghani'),
(2, 'Albania', 'AL', 'ALB', '355', 'ALL', 'Lek'),
(3, 'Algeria', 'DZ', 'DZA', '213', 'DZD', 'Algerian Dinar'),
(4, 'American Samoa', 'AS', 'ASM', '1-684', 'USD', 'US Dollar'),
(5, 'Andorra', 'AD', 'AND', '376', 'EUR', 'Euro'),
(6, 'Angola', 'AO', 'AGO', '244', 'AOA', 'Kwanza'),
(7, 'Anguilla', 'AI', 'AIA', '1-264', 'XCD', 'East Caribbean Dollar'),
(8, 'Antarctica', 'AQ', 'ATA', '672', NULL, NULL),
(9, 'Antigua and Barbuda', 'AG', 'ATG', '1-268', 'XCD', 'East Caribbean Dollar'),
(10, 'Argentina', 'AR', 'ARG', '54', 'ARS', 'Argentine Peso'),
(11, 'Armenia', 'AM', 'ARM', '374', 'AMD', 'Armenian Dram'),
(12, 'Aruba', 'AW', 'ABW', '297', 'AWG', 'Aruban Florin'),
(13, 'Australia', 'AU', 'AUS', '61', 'AUD', 'Australian Dollar'),
(14, 'Austria', 'AT', 'AUT', '43', 'EUR', 'Euro'),
(15, 'Azerbaijan', 'AZ', 'AZE', '994', 'AZN', 'Azerbaijanian Manat'),
(16, 'Bahamas', 'BS', 'BHS', '1-242', 'BSD', 'Bahamian Dollar'),
(17, 'Bahrain', 'BH', 'BHR', '973', 'BHD', 'Bahraini Dinar'),
(18, 'Bangladesh', 'BD', 'BGD', '880', 'BDT', 'Taka'),
(19, 'Barbados', 'BB', 'BRB', '1-246', 'BBD', 'Barbados Dollar'),
(20, 'Belarus', 'BY', 'BLR', '375', 'BYR', 'Belarussian Ruble'),
(21, 'Belgium', 'BE', 'BEL', '32', 'EUR', 'Euro'),
(22, 'Belize', 'BZ', 'BLZ', '501', 'BZD', 'Belize Dollar'),
(23, 'Benin', 'BJ', 'BEN', '229', 'XOF', 'CFA Franc BCEAO'),
(24, 'Bermuda', 'BM', 'BMU', '1-441', 'BMD', 'Bermudian Dollar'),
(25, 'Bhutan', 'BT', 'BTN', '975', 'INR', 'Indian Rupee'),
(26, 'Bolivia, Plurinational State of', 'BO', 'BOL', '591', 'BOB', 'Boliviano'),
(27, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES', '599', 'USD', 'US Dollar'),
(28, 'Bosnia and Herzegovina', 'BA', 'BIH', '387', 'BAM', 'Convertible Mark'),
(29, 'Botswana', 'BW', 'BWA', '267', 'BWP', 'Pula'),
(30, 'Bouvet Island', 'BV', 'BVT', '47', 'NOK', 'Norwegian Krone'),
(31, 'Brazil', 'BR', 'BRA', '55', 'BRL', 'Brazilian Real'),
(32, 'British Indian Ocean Territory', 'IO', 'IOT', '246', 'USD', 'US Dollar'),
(33, 'Brunei Darussalam', 'BN', 'BRN', '673', 'BND', 'Brunei Dollar'),
(34, 'Bulgaria', 'BG', 'BGR', '359', 'BGN', 'Bulgarian Lev'),
(35, 'Burkina Faso', 'BF', 'BFA', '226', 'XOF', 'CFA Franc BCEAO'),
(36, 'Burundi', 'BI', 'BDI', '257', 'BIF', 'Burundi Franc'),
(37, 'Cambodia', 'KH', 'KHM', '855', 'KHR', 'Riel'),
(38, 'Cameroon', 'CM', 'CMR', '237', 'XAF', 'CFA Franc BEAC'),
(39, 'Canada', 'CA', 'CAN', '1', 'CAD', 'Canadian Dollar'),
(40, 'Cape Verde', 'CV', 'CPV', '238', 'CVE', 'Cabo Verde Escudo'),
(41, 'Cayman Islands', 'KY', 'CYM', '1-345', 'KYD', 'Cayman Islands Dollar'),
(42, 'Central African Republic', 'CF', 'CAF', '236', 'XAF', 'CFA Franc BEAC'),
(43, 'Chad', 'TD', 'TCD', '235', 'XAF', 'CFA Franc BEAC'),
(44, 'Chile', 'CL', 'CHL', '56', 'CLP', 'Chilean Peso'),
(45, 'China', 'CN', 'CHN', '86', 'CNY', 'Yuan Renminbi'),
(46, 'Christmas Island', 'CX', 'CXR', '61', 'AUD', 'Australian Dollar'),
(47, 'Cocos (Keeling) Islands', 'CC', 'CCK', '61', 'AUD', 'Australian Dollar'),
(48, 'Colombia', 'CO', 'COL', '57', 'COP', 'Colombian Peso'),
(49, 'Comoros', 'KM', 'COM', '269', 'KMF', 'Comoro Franc'),
(50, 'Congo', 'CG', 'COG', '242', 'XAF', 'CFA Franc BEAC'),
(51, 'Congo, the Democratic Republic of the', 'CD', 'COD', '243', NULL, NULL),
(52, 'Cook Islands', 'CK', 'COK', '682', 'NZD', 'New Zealand Dollar'),
(53, 'Costa Rica', 'CR', 'CRI', '506', 'CRC', 'Costa Rican Colon'),
(54, 'Croatia', 'HR', 'HRV', '385', 'HRK', 'Croatian Kuna'),
(55, 'Cuba', 'CU', 'CUB', '53', 'CUP', 'Cuban Peso'),
(56, 'Curaçao', 'CW', 'CUW', '599', 'ANG', 'Netherlands Antillean Guilder'),
(57, 'Cyprus', 'CY', 'CYP', '357', 'EUR', 'Euro'),
(58, 'Czech Republic', 'CZ', 'CZE', '420', 'CZK', 'Czech Koruna'),
(59, 'Côte d\'Ivoire', 'CI', 'CIV', '225', 'XOF', 'CFA Franc BCEAO'),
(60, 'Denmark', 'DK', 'DNK', '45', 'DKK', 'Danish Krone'),
(61, 'Djibouti', 'DJ', 'DJI', '253', 'DJF', 'Djibouti Franc'),
(62, 'Dominica', 'DM', 'DMA', '1-767', 'XCD', 'East Caribbean Dollar'),
(63, 'Dominican Republic', 'DO', 'DOM', '1-809', 'DOP', 'Dominican Peso'),
(64, 'Ecuador', 'EC', 'ECU', '593', 'USD', 'US Dollar'),
(65, 'Egypt', 'EG', 'EGY', '20', 'EGP', 'Egyptian Pound'),
(66, 'El Salvador', 'SV', 'SLV', '503', 'USD', 'US Dollar'),
(67, 'Equatorial Guinea', 'GQ', 'GNQ', '240', 'XAF', 'CFA Franc BEAC'),
(68, 'Eritrea', 'ER', 'ERI', '291', 'ERN', 'Nakfa'),
(69, 'Estonia', 'EE', 'EST', '372', 'EUR', 'Euro'),
(70, 'Ethiopia', 'ET', 'ETH', '251', 'ETB', 'Ethiopian Birr'),
(71, 'Falkland Islands (Malvinas)', 'FK', 'FLK', '500', 'FKP', 'Falkland Islands Pound'),
(72, 'Faroe Islands', 'FO', 'FRO', '298', 'DKK', 'Danish Krone'),
(73, 'Fiji', 'FJ', 'FJI', '679', 'FJD', 'Fiji Dollar'),
(74, 'Finland', 'FI', 'FIN', '358', 'EUR', 'Euro'),
(75, 'France', 'FR', 'FRA', '33', 'EUR', 'Euro'),
(76, 'French Guiana', 'GF', 'GUF', '594', 'EUR', 'Euro'),
(77, 'French Polynesia', 'PF', 'PYF', '689', 'XPF', 'CFP Franc'),
(78, 'French Southern Territories', 'TF', 'ATF', '262', 'EUR', 'Euro'),
(79, 'Gabon', 'GA', 'GAB', '241', 'XAF', 'CFA Franc BEAC'),
(80, 'Gambia', 'GM', 'GMB', '220', 'GMD', 'Dalasi'),
(81, 'Georgia', 'GE', 'GEO', '995', 'GEL', 'Lari'),
(82, 'Germany', 'DE', 'DEU', '49', 'EUR', 'Euro'),
(83, 'Ghana', 'GH', 'GHA', '233', 'GHS', 'Ghana Cedi'),
(84, 'Gibraltar', 'GI', 'GIB', '350', 'GIP', 'Gibraltar Pound'),
(85, 'Greece', 'GR', 'GRC', '30', 'EUR', 'Euro'),
(86, 'Greenland', 'GL', 'GRL', '299', 'DKK', 'Danish Krone'),
(87, 'Grenada', 'GD', 'GRD', '1-473', 'XCD', 'East Caribbean Dollar'),
(88, 'Guadeloupe', 'GP', 'GLP', '590', 'EUR', 'Euro'),
(89, 'Guam', 'GU', 'GUM', '1-671', 'USD', 'US Dollar'),
(90, 'Guatemala', 'GT', 'GTM', '502', 'GTQ', 'Quetzal'),
(91, 'Guernsey', 'GG', 'GGY', '44', 'GBP', 'Pound Sterling'),
(92, 'Guinea', 'GN', 'GIN', '224', 'GNF', 'Guinea Franc'),
(93, 'Guinea-Bissau', 'GW', 'GNB', '245', 'XOF', 'CFA Franc BCEAO'),
(94, 'Guyana', 'GY', 'GUY', '592', 'GYD', 'Guyana Dollar'),
(95, 'Haiti', 'HT', 'HTI', '509', 'USD', 'US Dollar'),
(96, 'Heard Island and McDonald Islands', 'HM', 'HMD', '672', 'AUD', 'Australian Dollar'),
(97, 'Holy See (Vatican City State)', 'VA', 'VAT', '39-06', 'EUR', 'Euro'),
(98, 'Honduras', 'HN', 'HND', '504', 'HNL', 'Lempira'),
(99, 'Hong Kong', 'HK', 'HKG', '852', 'HKD', 'Hong Kong Dollar'),
(100, 'Hungary', 'HU', 'HUN', '36', 'HUF', 'Forint'),
(101, 'Iceland', 'IS', 'ISL', '354', 'ISK', 'Iceland Krona'),
(102, 'India', 'IN', 'IND', '91', 'INR', 'Indian Rupee'),
(103, 'Indonesia', 'ID', 'IDN', '62', 'IDR', 'Rupiah'),
(104, 'Iran, Islamic Republic of', 'IR', 'IRN', '98', 'IRR', 'Iranian Rial'),
(105, 'Iraq', 'IQ', 'IRQ', '964', 'IQD', 'Iraqi Dinar'),
(106, 'Ireland', 'IE', 'IRL', '353', 'EUR', 'Euro'),
(107, 'Isle of Man', 'IM', 'IMN', '44', 'GBP', 'Pound Sterling'),
(108, 'Israel', 'IL', 'ISR', '972', 'ILS', 'New Israeli Sheqel'),
(109, 'Italy', 'IT', 'ITA', '39', 'EUR', 'Euro'),
(110, 'Jamaica', 'JM', 'JAM', '1-876', 'JMD', 'Jamaican Dollar'),
(111, 'Japan', 'JP', 'JPN', '81', 'JPY', 'Yen'),
(112, 'Jersey', 'JE', 'JEY', '44', 'GBP', 'Pound Sterling'),
(113, 'Jordan', 'JO', 'JOR', '962', 'JOD', 'Jordanian Dinar'),
(114, 'Kazakhstan', 'KZ', 'KAZ', '7', 'KZT', 'Tenge'),
(115, 'Kenya', 'KE', 'KEN', '254', 'KES', 'Kenyan Shilling'),
(116, 'Kiribati', 'KI', 'KIR', '686', 'AUD', 'Australian Dollar'),
(117, 'Korea, Democratic People\'s Republic of', 'KP', 'PRK', '850', 'KPW', 'North Korean Won'),
(118, 'Korea, Republic of', 'KR', 'KOR', '82', 'KRW', 'Won'),
(119, 'Kuwait', 'KW', 'KWT', '965', 'KWD', 'Kuwaiti Dinar'),
(120, 'Kyrgyzstan', 'KG', 'KGZ', '996', 'KGS', 'Som'),
(121, 'Lao People\'s Democratic Republic', 'LA', 'LAO', '856', 'LAK', 'Kip'),
(122, 'Latvia', 'LV', 'LVA', '371', 'EUR', 'Euro'),
(123, 'Lebanon', 'LB', 'LBN', '961', 'LBP', 'Lebanese Pound'),
(124, 'Lesotho', 'LS', 'LSO', '266', 'ZAR', 'Rand'),
(125, 'Liberia', 'LR', 'LBR', '231', 'LRD', 'Liberian Dollar'),
(126, 'Libya', 'LY', 'LBY', '218', 'LYD', 'Libyan Dinar'),
(127, 'Liechtenstein', 'LI', 'LIE', '423', 'CHF', 'Swiss Franc'),
(128, 'Lithuania', 'LT', 'LTU', '370', 'EUR', 'Euro'),
(129, 'Luxembourg', 'LU', 'LUX', '352', 'EUR', 'Euro'),
(130, 'Macao', 'MO', 'MAC', '853', 'MOP', 'Pataca'),
(131, 'Macedonia, the Former Yugoslav Republic of', 'MK', 'MKD', '389', 'MKD', 'Denar'),
(132, 'Madagascar', 'MG', 'MDG', '261', 'MGA', 'Malagasy Ariary'),
(133, 'Malawi', 'MW', 'MWI', '265', 'MWK', 'Kwacha'),
(134, 'Malaysia', 'MY', 'MYS', '60', 'MYR', 'Malaysian Ringgit'),
(135, 'Maldives', 'MV', 'MDV', '960', 'MVR', 'Rufiyaa'),
(136, 'Mali', 'ML', 'MLI', '223', 'XOF', 'CFA Franc BCEAO'),
(137, 'Malta', 'MT', 'MLT', '356', 'EUR', 'Euro'),
(138, 'Marshall Islands', 'MH', 'MHL', '692', 'USD', 'US Dollar'),
(139, 'Martinique', 'MQ', 'MTQ', '596', 'EUR', 'Euro'),
(140, 'Mauritania', 'MR', 'MRT', '222', 'MRO', 'Ouguiya'),
(141, 'Mauritius', 'MU', 'MUS', '230', 'MUR', 'Mauritius Rupee'),
(142, 'Mayotte', 'YT', 'MYT', '262', 'EUR', 'Euro'),
(143, 'Mexico', 'MX', 'MEX', '52', 'MXN', 'Mexican Peso'),
(144, 'Micronesia, Federated States of', 'FM', 'FSM', '691', 'USD', 'US Dollar'),
(145, 'Moldova, Republic of', 'MD', 'MDA', '373', 'MDL', 'Moldovan Leu'),
(146, 'Monaco', 'MC', 'MCO', '377', 'EUR', 'Euro'),
(147, 'Mongolia', 'MN', 'MNG', '976', 'MNT', 'Tugrik'),
(148, 'Montenegro', 'ME', 'MNE', '382', 'EUR', 'Euro'),
(149, 'Montserrat', 'MS', 'MSR', '1-664', 'XCD', 'East Caribbean Dollar'),
(150, 'Morocco', 'MA', 'MAR', '212', 'MAD', 'Moroccan Dirham'),
(151, 'Mozambique', 'MZ', 'MOZ', '258', 'MZN', 'Mozambique Metical'),
(152, 'Myanmar', 'MM', 'MMR', '95', 'MMK', 'Kyat'),
(153, 'Namibia', 'NA', 'NAM', '264', 'ZAR', 'Rand'),
(154, 'Nauru', 'NR', 'NRU', '674', 'AUD', 'Australian Dollar'),
(155, 'Nepal', 'NP', 'NPL', '977', 'NPR', 'Nepalese Rupee'),
(156, 'Netherlands', 'NL', 'NLD', '31', 'EUR', 'Euro'),
(157, 'New Caledonia', 'NC', 'NCL', '687', 'XPF', 'CFP Franc'),
(158, 'New Zealand', 'NZ', 'NZL', '64', 'NZD', 'New Zealand Dollar'),
(159, 'Nicaragua', 'NI', 'NIC', '505', 'NIO', 'Cordoba Oro'),
(160, 'Niger', 'NE', 'NER', '227', 'XOF', 'CFA Franc BCEAO'),
(161, 'Nigeria', 'NG', 'NGA', '234', 'NGN', 'Naira'),
(162, 'Niue', 'NU', 'NIU', '683', 'NZD', 'New Zealand Dollar'),
(163, 'Norfolk Island', 'NF', 'NFK', '672', 'AUD', 'Australian Dollar'),
(164, 'Northern Mariana Islands', 'MP', 'MNP', '1-670', 'USD', 'US Dollar'),
(165, 'Norway', 'NO', 'NOR', '47', 'NOK', 'Norwegian Krone'),
(166, 'Oman', 'OM', 'OMN', '968', 'OMR', 'Rial Omani'),
(167, 'Pakistan', 'PK', 'PAK', '92', 'PKR', 'Pakistan Rupee'),
(168, 'Palau', 'PW', 'PLW', '680', 'USD', 'US Dollar'),
(169, 'Palestine, State of', 'PS', 'PSE', '970', NULL, NULL),
(170, 'Panama', 'PA', 'PAN', '507', 'USD', 'US Dollar'),
(171, 'Papua New Guinea', 'PG', 'PNG', '675', 'PGK', 'Kina'),
(172, 'Paraguay', 'PY', 'PRY', '595', 'PYG', 'Guarani'),
(173, 'Peru', 'PE', 'PER', '51', 'PEN', 'Nuevo Sol'),
(174, 'Philippines', 'PH', 'PHL', '63', 'PHP', 'Philippine Peso'),
(175, 'Pitcairn', 'PN', 'PCN', '870', 'NZD', 'New Zealand Dollar'),
(176, 'Poland', 'PL', 'POL', '48', 'PLN', 'Zloty'),
(177, 'Portugal', 'PT', 'PRT', '351', 'EUR', 'Euro'),
(178, 'Puerto Rico', 'PR', 'PRI', '1', 'USD', 'US Dollar'),
(179, 'Qatar', 'QA', 'QAT', '974', 'QAR', 'Qatari Rial'),
(180, 'Romania', 'RO', 'ROU', '40', 'RON', 'New Romanian Leu'),
(181, 'Russian Federation', 'RU', 'RUS', '7', 'RUB', 'Russian Ruble'),
(182, 'Rwanda', 'RW', 'RWA', '250', 'RWF', 'Rwanda Franc'),
(183, 'Réunion', 'RE', 'REU', '262', 'EUR', 'Euro'),
(184, 'Saint Barthélemy', 'BL', 'BLM', '590', 'EUR', 'Euro'),
(185, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', 'SHN', '290', 'SHP', 'Saint Helena Pound'),
(186, 'Saint Kitts and Nevis', 'KN', 'KNA', '1-869', 'XCD', 'East Caribbean Dollar'),
(187, 'Saint Lucia', 'LC', 'LCA', '1-758', 'XCD', 'East Caribbean Dollar'),
(188, 'Saint Martin (French part)', 'MF', 'MAF', '590', 'EUR', 'Euro'),
(189, 'Saint Pierre and Miquelon', 'PM', 'SPM', '508', 'EUR', 'Euro'),
(190, 'Saint Vincent and the Grenadines', 'VC', 'VCT', '1-784', 'XCD', 'East Caribbean Dollar'),
(191, 'Samoa', 'WS', 'WSM', '685', 'WST', 'Tala'),
(192, 'San Marino', 'SM', 'SMR', '378', 'EUR', 'Euro'),
(193, 'Sao Tome and Principe', 'ST', 'STP', '239', 'STD', 'Dobra'),
(194, 'Saudi Arabia', 'SA', 'SAU', '966', 'SAR', 'Saudi Riyal'),
(195, 'Senegal', 'SN', 'SEN', '221', 'XOF', 'CFA Franc BCEAO'),
(196, 'Serbia', 'RS', 'SRB', '381', 'RSD', 'Serbian Dinar'),
(197, 'Seychelles', 'SC', 'SYC', '248', 'SCR', 'Seychelles Rupee'),
(198, 'Sierra Leone', 'SL', 'SLE', '232', 'SLL', 'Leone'),
(199, 'Singapore', 'SG', 'SGP', '65', 'SGD', 'Singapore Dollar'),
(200, 'Sint Maarten (Dutch part)', 'SX', 'SXM', '1-721', 'ANG', 'Netherlands Antillean Guilder'),
(201, 'Slovakia', 'SK', 'SVK', '421', 'EUR', 'Euro'),
(202, 'Slovenia', 'SI', 'SVN', '386', 'EUR', 'Euro'),
(203, 'Solomon Islands', 'SB', 'SLB', '677', 'SBD', 'Solomon Islands Dollar'),
(204, 'Somalia', 'SO', 'SOM', '252', 'SOS', 'Somali Shilling'),
(205, 'South Africa', 'ZA', 'ZAF', '27', 'ZAR', 'Rand'),
(206, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', '500', NULL, NULL),
(207, 'South Sudan', 'SS', 'SSD', '211', 'SSP', 'South Sudanese Pound'),
(208, 'Spain', 'ES', 'ESP', '34', 'EUR', 'Euro'),
(209, 'Sri Lanka', 'LK', 'LKA', '94', 'LKR', 'Sri Lanka Rupee'),
(210, 'Sudan', 'SD', 'SDN', '249', 'SDG', 'Sudanese Pound'),
(211, 'Suriname', 'SR', 'SUR', '597', 'SRD', 'Surinam Dollar'),
(212, 'Svalbard and Jan Mayen', 'SJ', 'SJM', '47', 'NOK', 'Norwegian Krone'),
(213, 'Swaziland', 'SZ', 'SWZ', '268', 'SZL', 'Lilangeni'),
(214, 'Sweden', 'SE', 'SWE', '46', 'SEK', 'Swedish Krona'),
(215, 'Switzerland', 'CH', 'CHE', '41', 'CHF', 'Swiss Franc'),
(216, 'Syrian Arab Republic', 'SY', 'SYR', '963', 'SYP', 'Syrian Pound'),
(217, 'Taiwan, Province of China', 'TW', 'TWN', '886', 'TWD', 'New Taiwan Dollar'),
(218, 'Tajikistan', 'TJ', 'TJK', '992', 'TJS', 'Somoni'),
(219, 'Tanzania, United Republic of', 'TZ', 'TZA', '255', 'TZS', 'Tanzanian Shilling'),
(220, 'Thailand', 'TH', 'THA', '66', 'THB', 'Baht'),
(221, 'Timor-Leste', 'TL', 'TLS', '670', 'USD', 'US Dollar'),
(222, 'Togo', 'TG', 'TGO', '228', 'XOF', 'CFA Franc BCEAO'),
(223, 'Tokelau', 'TK', 'TKL', '690', 'NZD', 'New Zealand Dollar'),
(224, 'Tonga', 'TO', 'TON', '676', 'TOP', 'Pa’anga'),
(225, 'Trinidad and Tobago', 'TT', 'TTO', '1-868', 'TTD', 'Trinidad and Tobago Dollar'),
(226, 'Tunisia', 'TN', 'TUN', '216', 'TND', 'Tunisian Dinar'),
(227, 'Turkey', 'TR', 'TUR', '90', 'TRY', 'Turkish Lira'),
(228, 'Turkmenistan', 'TM', 'TKM', '993', 'TMT', 'Turkmenistan New Manat'),
(229, 'Turks and Caicos Islands', 'TC', 'TCA', '1-649', 'USD', 'US Dollar'),
(230, 'Tuvalu', 'TV', 'TUV', '688', 'AUD', 'Australian Dollar'),
(231, 'Uganda', 'UG', 'UGA', '256', 'UGX', 'Uganda Shilling'),
(232, 'Ukraine', 'UA', 'UKR', '380', 'UAH', 'Hryvnia'),
(233, 'United Arab Emirates', 'AE', 'ARE', '971', 'AED', 'UAE Dirham'),
(234, 'United Kingdom', 'GB', 'GBR', '44', 'GBP', 'Pound Sterling'),
(235, 'United States', 'US', 'USA', '1', 'USD', 'US Dollar'),
(236, 'United States Minor Outlying Islands', 'UM', 'UMI', '1', 'USD', 'US Dollar'),
(237, 'Uruguay', 'UY', 'URY', '598', 'UYU', 'Peso Uruguayo'),
(238, 'Uzbekistan', 'UZ', 'UZB', '998', 'UZS', 'Uzbekistan Sum'),
(239, 'Vanuatu', 'VU', 'VUT', '678', 'VUV', 'Vatu'),
(240, 'Venezuela, Bolivarian Republic of', 'VE', 'VEN', '58', 'VEF', 'Bolivar'),
(241, 'Viet Nam', 'VN', 'VNM', '84', 'VND', 'Dong'),
(242, 'Virgin Islands, British', 'VG', 'VGB', '1-284', 'USD', 'US Dollar'),
(243, 'Virgin Islands, U.S.', 'VI', 'VIR', '1-340', 'USD', 'US Dollar'),
(244, 'Wallis and Futuna', 'WF', 'WLF', '681', 'XPF', 'CFP Franc'),
(245, 'Western Sahara', 'EH', 'ESH', '212', 'MAD', 'Moroccan Dirham'),
(246, 'Yemen', 'YE', 'YEM', '967', 'YER', 'Yemeni Rial'),
(247, 'Zambia', 'ZM', 'ZMB', '260', 'ZMW', 'Zambian Kwacha'),
(248, 'Zimbabwe', 'ZW', 'ZWE', '263', 'ZWL', 'Zimbabwe Dollar'),
(249, 'Åland Islands', 'AX', 'ALA', '358', 'EUR', 'Euro');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(10) NOT NULL,
  `admin_id` int(10) DEFAULT NULL,
  `coupon_code` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_percentage` int(10) NOT NULL,
  `coupon_country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_status` int(5) NOT NULL,
  `expire_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `admin_id`, `coupon_code`, `coupon_percentage`, `coupon_country`, `coupon_status`, `expire_date`, `created_date`) VALUES
(4, 0, 'BAAZ1000', 20, 'M-Admin', 1, '2022-03-16', '15-03-2022 21:48'),
(5, 0, 'MOLLASITE', 30, 'M-Admin', 1, '2022-03-17', '15-03-2022 21:50'),
(6, 1, 'BaazAdmin', 10, 'Qatar (‫قطر‬‎)', 1, '2022-03-17', '15-03-2022 23:14'),
(7, 1, 'Admin_qatar', 20, 'Qatar (‫قطر‬‎)', 0, '2022-03-18', '16-03-2022 00:35'),
(12, 0, 'baaznew', 10, 'M-Admin', 1, '2022-06-27', '08-04-2022 00:52'),
(13, 0, 'testcode', 20, 'M-Admin', 1, '2022-12-01', '01-09-2022 15:03'),
(14, 0, 'emailtest', 10, 'M-Admin', 1, '2022-12-31', '17-12-2022 17:00');

-- --------------------------------------------------------

--
-- Table structure for table `current_balance`
--

CREATE TABLE `current_balance` (
  `cb_id` int(10) NOT NULL,
  `u_id` int(10) DEFAULT NULL,
  `cb_amount` decimal(10,2) DEFAULT NULL,
  `cb_date` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `current_balance`
--

INSERT INTO `current_balance` (`cb_id`, `u_id`, `cb_amount`, `cb_date`) VALUES
(1, 43, '30.00', '10-10-2022 12:36'),
(2, 38, '39.00', '20-12-2022 16:08'),
(3, 36, '170.00', '23-01-2022 14:02'),
(4, 40, '20.00', '10-10-2022 05:06'),
(5, 48, '100.00', '21-01-2023 18:00'),
(6, 49, '40.00', '10-10-2022 04:20'),
(7, 50, '20.00', '24-12-2022 08:30'),
(8, 37, '60.00', '24-12-2022 08:37'),
(9, 52, '91.00', '24-12-2022 16:25'),
(10, 55, '120.00', '29-01-2023 00:24');

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

CREATE TABLE `deal` (
  `DID` int(20) NOT NULL,
  `a_id` int(10) NOT NULL,
  `p_id` int(20) NOT NULL,
  `zone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deal_status` int(2) DEFAULT NULL,
  `m_value` decimal(10,2) DEFAULT NULL,
  `e_value` decimal(10,2) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `red_method` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_time_red` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `red_am` decimal(10,2) DEFAULT NULL,
  `e_time_red` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orange_method` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oran_per` int(10) DEFAULT NULL,
  `oran_days` int(5) DEFAULT NULL,
  `s_time_oran` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oran_am` decimal(10,2) DEFAULT NULL,
  `oran_c_amt` decimal(10,2) DEFAULT NULL,
  `e_time_oran` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `green_method` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `green_per` int(10) DEFAULT NULL,
  `green_days` int(5) DEFAULT NULL,
  `s_time_green` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `green_am` decimal(10,2) DEFAULT NULL,
  `green_c_amt` decimal(10,2) DEFAULT NULL,
  `e_time_green` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `winner_id` int(10) DEFAULT NULL,
  `create_time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_m_red` int(20) DEFAULT NULL,
  `total_m_oran` int(20) DEFAULT NULL,
  `total_m_green` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deal`
--

INSERT INTO `deal` (`DID`, `a_id`, `p_id`, `zone`, `deal_status`, `m_value`, `e_value`, `unit_price`, `red_method`, `s_time_red`, `red_am`, `e_time_red`, `orange_method`, `oran_per`, `oran_days`, `s_time_oran`, `oran_am`, `oran_c_amt`, `e_time_oran`, `green_method`, `green_per`, `green_days`, `s_time_green`, `green_am`, `green_c_amt`, `e_time_green`, `d_country`, `winner_id`, `create_time`, `update_time`, `total_m_red`, `total_m_oran`, `total_m_green`) VALUES
(2, 1, 6, 'fail', 0, '150.00', '200.00', '10.00', 'time', '24-10-2021 02:19', '0.00', '06-12-2022 01:27', 'percentage', NULL, NULL, '25-10-2021 02:19', NULL, NULL, NULL, 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 02:19', '06-12-2022 01:27', NULL, NULL, NULL),
(3, 1, 6, 'red', 0, '150.00', '200.00', '10.00', 'amount', '24-10-2021 02:22', NULL, '', 'percentage', NULL, NULL, '', NULL, NULL, NULL, 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 02:22', '06-11-2021 18:04', NULL, NULL, NULL),
(4, 1, 6, 'red', 0, '150.00', '200.00', '10.00', 'amount', '24-10-2021 02:51', NULL, '', 'percentage', NULL, NULL, '', NULL, NULL, NULL, 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 02:51', '06-11-2021 18:04', NULL, NULL, NULL),
(5, 1, 7, 'fail', 0, '200.00', '200.00', '5.00', 'time', '24-10-2021 02:56', '0.00', '06-12-2022 01:27', 'percentage', NULL, NULL, '26-10-2021 02:56', NULL, NULL, NULL, 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 02:56', '06-12-2022 01:27', NULL, NULL, NULL),
(6, 1, 5, 'red', 0, '350.00', '500.00', '50.00', 'amount', '24-10-2021 03:00', NULL, '', 'percentage', NULL, NULL, '', NULL, NULL, NULL, 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 03:00', '06-11-2021 18:04', NULL, NULL, NULL),
(7, 1, 7, 'red', 0, '200.00', '300.00', '10.00', 'amount', '24-10-2021 12:48', NULL, '', 'percentage', NULL, NULL, '', NULL, NULL, NULL, 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 12:48', '25-04-2022 01:02', NULL, NULL, NULL),
(8, 1, 7, 'fail', 0, '200.00', '300.00', '10.00', 'time', '24-10-2021 14:56', '0.00', '06-12-2022 01:27', 'percentage', NULL, NULL, '25-10-2021 14:57', NULL, NULL, NULL, 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 14:56', '06-12-2022 01:27', NULL, NULL, NULL),
(9, 1, 7, 'red', 0, '200.00', '300.00', '5.00', 'amount', '24-10-2021 15:07', NULL, '', 'percentage', NULL, NULL, '', NULL, NULL, NULL, 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 15:07', '25-04-2022 01:02', NULL, NULL, NULL),
(10, 1, 12, 'fail', 0, '250.00', '500.00', '20.00', 'time', '09-11-2021 15:23', '0.00', '06-12-2022 01:27', 'percentage', NULL, NULL, '11-11-2021 16:30', NULL, NULL, NULL, 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '09-11-2021 15:23', '06-12-2022 01:27', NULL, NULL, NULL),
(11, 1, 13, 'red', 0, '350.00', '500.00', '50.00', 'amount', '24-11-2021 05:15', NULL, '', 'time', NULL, NULL, '', NULL, NULL, NULL, 'percentage', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-11-2021 05:15', '24-11-2021 05:16', NULL, NULL, NULL),
(12, 201, 23, 'red', 0, '210.00', '250.00', '15.00', 'amount', '09-12-2021 16:37', NULL, '', 'time', NULL, NULL, '', NULL, NULL, NULL, 'percentage', NULL, NULL, NULL, NULL, NULL, NULL, 'Portugal', NULL, '09-12-2021 16:37', '26-03-2022 18:08', NULL, NULL, NULL),
(13, 1, 30, 'red', 0, '200.00', '400.00', '10.00', 'amount', '29-01-2022 20:06', NULL, '', 'time', NULL, NULL, '', NULL, NULL, NULL, 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '29-01-2022 20:06', '28-01-2023 12:51', NULL, NULL, NULL),
(14, 1, 30, 'red', 0, '200.00', '400.00', '20.00', 'amount', '01-02-2022 19:54', NULL, '', 'time', NULL, NULL, '', NULL, NULL, NULL, 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '01-02-2022 19:54', '28-01-2023 12:51', NULL, NULL, NULL),
(15, 1, 23, 'red', 0, '210.00', '400.00', '20.00', 'amount', '01-02-2022 19:56', NULL, '', 'time', NULL, NULL, '', NULL, NULL, NULL, 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '01-02-2022 19:56', '26-03-2022 18:08', NULL, NULL, NULL),
(16, 1, 9, 'red', 0, '250.00', '300.00', '10.00', 'amount', '27-02-2022 21:03', NULL, '', 'time', NULL, NULL, '', NULL, NULL, NULL, 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '27-02-2022 21:03', '01-03-2022 00:26', NULL, NULL, NULL),
(17, 1, 30, 'red', 0, '200.00', '300.00', '100.00', 'amount', '17-03-2022 02:56', NULL, '', 'time', NULL, NULL, '', NULL, NULL, NULL, 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '17-03-2022 02:56', '28-01-2023 12:51', NULL, NULL, NULL),
(18, 1, 30, 'red', 0, '200.00', '300.00', '100.00', 'amount', '17-03-2022 03:53', NULL, '', 'time', 0, 1, '', NULL, NULL, NULL, 'time', 0, 1, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '17-03-2022 03:53', '28-01-2023 12:51', NULL, NULL, NULL),
(19, 1, 23, 'red', 0, '210.00', '300.00', '50.00', 'amount', '17-03-2022 03:57', '250.00', '', 'percentage', 10, 0, '', NULL, NULL, NULL, 'time', 0, 1, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '17-03-2022 03:57', '26-03-2022 18:08', NULL, NULL, NULL),
(22, 1, 7, 'red', 0, '200.00', '400.00', '40.00', 'amount', '04-04-2022 01:44', NULL, '', 'percentage', 10, 0, '', NULL, NULL, NULL, 'time', 0, 1, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '04-04-2022 01:44', '25-04-2022 01:02', NULL, NULL, NULL),
(23, 5, 9, 'red', 0, '250.00', '300.00', '20.00', 'amount', '25-06-2022 21:50', '100.00', '', 'percentage', 10, 0, '', NULL, NULL, NULL, 'time', 0, 1, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '25-06-2022 21:50', '06-10-2022 02:52', 7, NULL, NULL),
(24, 5, 10, 'red', 0, '350.00', '450.00', '30.00', 'amount', '25-06-2022 21:51', '48.00', '', 'percentage', 10, 0, '', NULL, NULL, NULL, 'time', 0, 1, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '25-06-2022 21:51', '06-10-2022 01:51', 2, NULL, NULL),
(25, 5, 23, 'red', 0, '210.00', '299.00', '100.00', 'amount', '25-06-2022 21:51', '100.00', '', 'percentage', 10, 0, '', NULL, NULL, NULL, 'time', 0, 1, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '25-06-2022 21:51', '06-10-2022 01:33', 1, NULL, NULL),
(26, 5, 30, 'fail', 0, '200.00', '400.00', '20.00', 'time', '23-08-2022 00:51', '0.00', '23-08-2022 01:02', 'percentage', 10, 0, '24-08-2022 00:51', NULL, NULL, NULL, 'time', 0, 1, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '23-08-2022 00:51', '28-01-2023 12:51', NULL, NULL, NULL),
(27, 5, 30, 'red', 0, '200.00', '300.00', '20.00', 'amount', '05-10-2022 21:07', NULL, '', 'percentage', 10, 0, '', NULL, NULL, NULL, 'time', 0, 1, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '05-10-2022 21:07', '28-01-2023 12:51', NULL, NULL, NULL),
(28, 5, 30, 'red', 0, '200.00', '400.00', '50.00', 'amount', '05-10-2022 21:32', NULL, '', 'percentage', 10, 0, '', NULL, NULL, NULL, 'time', 0, 1, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '05-10-2022 21:32', '28-01-2023 12:51', NULL, NULL, NULL),
(29, 5, 30, 'red', 0, '200.00', '350.00', '60.00', 'amount', '05-10-2022 21:34', NULL, '', 'percentage', 10, 0, '', NULL, NULL, NULL, 'time', 0, 1, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '05-10-2022 21:34', '28-01-2023 12:51', NULL, NULL, NULL),
(30, 5, 23, 'red', 0, '210.00', '400.00', '70.00', 'amount', '06-10-2022 02:03', '140.00', '', 'percentage', 10, 0, '', NULL, NULL, NULL, 'time', 0, 1, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '06-10-2022 02:03', '06-10-2022 02:37', 2, NULL, NULL),
(31, 1, 23, 'completed', 0, '210.00', '300.00', '100.00', 'amount', '06-10-2022 03:02', '340.00', '', 'percentage', 10, 0, '06-10-2022 03:10', '400.00', NULL, NULL, 'percentage', 10, 0, '06-10-2022 03:27', '520.00', NULL, NULL, 'Qatar (‫قطر‬‎)', 43, '06-10-2022 03:02', '06-10-2022 06:21', 4, 4, 6),
(32, 5, 10, 'red', 0, '350.00', '400.00', '100.00', 'amount', '06-10-2022 04:56', '80.00', '', 'percentage', 10, 0, '', NULL, NULL, NULL, 'percentage', 10, 0, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '06-10-2022 04:56', '07-10-2022 16:35', 1, NULL, NULL),
(33, 1, 43, 'completed', 0, '150.00', '200.00', '50.00', 'amount', '07-10-2022 16:49', '240.00', '10-10-2022 04:17', 'percentage', 10, 0, '10-10-2022 04:17', '290.00', NULL, '10-10-2022 04:20', 'percentage', 10, 0, '10-10-2022 04:20', '364.00', NULL, '10-10-2022 05:07', 'Qatar (‫قطر‬‎)', 48, '07-10-2022 16:49', '10-10-2022 05:07', 5, 1, 2),
(34, 5, 37, 'completed', 0, '300.00', '500.00', '50.00', 'amount', '07-10-2022 20:09', '600.00', '28-01-2023 17:15', 'percentage', 10, 0, '28-01-2023 17:15', '60.00', '50.00', '28-01-2023 17:16', 'percentage', 10, 0, '28-01-2023 17:16', '60.00', '50.00', NULL, 'Qatar (‫قطر‬‎)', 43, '07-10-2022 20:09', '28-01-2023 17:17', 8, NULL, NULL),
(35, 5, 43, 'fail', 0, '150.00', '200.00', '50.00', 'time', '30-11-2022 01:42', '0.00', '05-12-2022 23:09', 'percentage', 10, 0, '01-12-2022 01:42', NULL, NULL, NULL, 'percentage', 10, 0, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '30-11-2022 01:42', '05-12-2022 23:09', NULL, NULL, NULL),
(36, 1, 7, 'completed', 0, '200.00', '250.00', '20.00', 'amount', '17-12-2022 17:02', '274.00', '24-12-2022 08:22', 'percentage', 10, 0, '24-12-2022 08:22', '354.00', NULL, '24-12-2022 08:31', 'percentage', 10, 0, '24-12-2022 08:31', '401.00', NULL, NULL, 'Qatar (‫قطر‬‎)', 38, '17-12-2022 17:02', '21-01-2023 18:01', 14, 4, 5),
(37, 1, 43, 'completed', 0, '150.00', '200.00', '15.00', 'amount', '17-12-2022 17:02', '230.00', '28-01-2023 17:35', 'percentage', 10, 0, '28-01-2023 17:35', '30.00', '20.00', '28-01-2023 17:53', 'percentage', 10, 0, '28-01-2023 17:53', '30.00', '20.00', NULL, 'Qatar (‫قطر‬‎)', 55, '17-12-2022 17:02', '28-01-2023 18:22', 16, 2, 2),
(38, 1, 48, 'red', 0, '10.43', '10.43', '2.36', 'amount', '13-01-2023 22:27', NULL, '', 'percentage', NULL, NULL, '', NULL, NULL, NULL, 'percentage', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '13-01-2023 22:27', '28-01-2023 02:03', NULL, NULL, NULL),
(39, 1, 30, 'red', 0, '200.00', '210.00', '22.34', 'amount', '28-01-2023 01:23', NULL, '', 'percentage', NULL, NULL, '', NULL, NULL, NULL, 'percentage', NULL, NULL, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '28-01-2023 01:23', '28-01-2023 12:51', NULL, NULL, NULL),
(40, 1, 48, 'red', 0, '10.43', '15.00', '2.50', 'amount', '28-01-2023 01:36', NULL, '', 'percentage', 10, 0, '', NULL, NULL, NULL, 'percentage', 10, 0, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '28-01-2023 01:36', '28-01-2023 02:03', NULL, NULL, NULL),
(41, 1, 37, 'red', 0, '300.00', '350.00', '50.00', 'time', '28-01-2023 01:39', NULL, '30-01-2023 11:30', 'percentage', 10, 0, '30-01-2023 11:30', NULL, NULL, NULL, 'percentage', 10, 0, NULL, NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '28-01-2023 01:39', '28-01-2023 02:03', NULL, NULL, NULL),
(42, 1, 30, 'red', 0, '200.00', '250.00', '60.00', 'amount', '28-01-2023 01:50', NULL, '', 'percentage', 10, 0, '', NULL, '0.00', NULL, 'percentage', 10, 0, NULL, NULL, '25.00', NULL, 'Qatar (‫قطر‬‎)', NULL, '28-01-2023 01:50', '28-01-2023 12:51', NULL, NULL, NULL),
(43, 1, 48, 'red', 0, '10.43', '20.00', '2.50', 'amount', '28-01-2023 01:56', NULL, '', 'percentage', 10, 0, '', NULL, '0.00', NULL, 'percentage', 10, 0, NULL, NULL, '2.00', NULL, 'Qatar (‫قطر‬‎)', NULL, '28-01-2023 01:56', '28-01-2023 02:03', NULL, NULL, NULL),
(44, 1, 37, 'red', 0, '300.00', '388.00', '70.00', 'amount', '28-01-2023 01:59', NULL, '', 'percentage', 10, 0, '', NULL, '38.80', NULL, 'percentage', 10, 0, NULL, NULL, '38.80', NULL, 'Qatar (‫قطر‬‎)', NULL, '28-01-2023 01:59', '28-01-2023 02:03', NULL, NULL, NULL),
(45, 1, 30, 'green', 0, '200.00', '370.00', '60.00', 'time', '28-01-2023 02:00', '600.00', '28-01-2023 15:24', 'percentage', 10, 0, '28-01-2023 15:24', '60.00', '37.00', '28-01-2023 17:11', 'percentage', 10, 0, '28-01-2023 17:11', '0.00', '37.00', NULL, 'Qatar (‫قطر‬‎)', NULL, '28-01-2023 02:00', '28-01-2023 17:11', NULL, NULL, NULL),
(46, 1, 30, 'green', 0, '200.00', '278.00', '25.00', 'amount', '28-01-2023 03:24', '300.00', '28-01-2023 15:51', 'percentage', 10, 0, '28-01-2023 15:51', '30.00', '27.80', '28-01-2023 16:53', 'percentage', 10, 0, '28-01-2023 16:53', '25.00', '27.80', NULL, 'Qatar (‫قطر‬‎)', NULL, '28-01-2023 03:24', '28-01-2023 16:53', NULL, NULL, NULL),
(47, 1, 48, 'cancelled', 0, '10.43', '13.00', '2.40', 'amount', '28-01-2023 23:32', '12.00', '', 'percentage', 10, 0, '', '0.00', '1.30', NULL, 'percentage', 10, 0, NULL, '0.00', '1.30', NULL, 'Qatar (‫قطر‬‎)', NULL, '28-01-2023 23:32', '29-01-2023 00:24', 5, NULL, NULL),
(48, 1, 48, 'cancelled', 0, '10.43', '12.00', '3.00', 'amount', '15-02-2023 21:36', '0.00', '', 'percentage', 10, 0, '', '0.00', '1.20', NULL, 'percentage', 10, 0, NULL, '0.00', '1.20', NULL, 'IN', NULL, '15-02-2023 21:36', '27-02-2023 22:34', NULL, NULL, NULL),
(49, 1, 37, 'cancelled', 0, '300.00', '450.00', '40.00', 'amount', '27-02-2023 22:25', '0.00', '', 'percentage', 10, 0, '', '0.00', '45.00', NULL, 'percentage', 10, 0, NULL, '0.00', '45.00', NULL, 'IN', NULL, '27-02-2023 22:25', '27-02-2023 22:34', NULL, NULL, NULL),
(50, 1, 30, 'cancelled', 0, '200.00', '60.00', '10.00', 'amount', '27-02-2023 22:27', '0.00', '', 'percentage', 10, 0, '', '0.00', '6.00', NULL, 'percentage', 10, 0, NULL, '0.00', '6.00', NULL, 'IN', NULL, '27-02-2023 22:27', '27-02-2023 22:34', NULL, NULL, NULL),
(51, 1, 10, 'cancelled', 0, '350.00', '500.00', '60.00', 'amount', '27-02-2023 22:30', '0.00', '', 'percentage', 10, 0, '', '0.00', '50.00', NULL, 'percentage', 10, 0, NULL, '0.00', '50.00', NULL, 'IN', NULL, '27-02-2023 22:30', '27-02-2023 22:34', NULL, NULL, NULL),
(52, 1, 48, 'red', 1, '10.43', '15.00', '2.00', 'amount', '26-03-2023 20:17', '0.00', '', 'percentage', 10, 0, '', '0.00', '1.50', NULL, 'percentage', 10, 0, NULL, '0.00', '1.50', NULL, 'IN', NULL, '26-03-2023 20:17', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deal_setting`
--

CREATE TABLE `deal_setting` (
  `ID` int(10) NOT NULL,
  `zone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_percentage` decimal(10,2) DEFAULT 10.00,
  `d_time` int(10) DEFAULT 2,
  `d_method` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT 't'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deal_setting`
--

INSERT INTO `deal_setting` (`ID`, `zone`, `d_percentage`, `d_time`, `d_method`) VALUES
(8, 'orange', '10.00', 1, 'p'),
(9, 'green', '10.00', 1, 'p');

-- --------------------------------------------------------

--
-- Table structure for table `deposite_amount`
--

CREATE TABLE `deposite_amount` (
  `da_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `d_amount` decimal(10,2) NOT NULL,
  `refund_amount` decimal(10,2) DEFAULT NULL,
  `method` int(5) DEFAULT NULL,
  `d_date` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposite_amount`
--

INSERT INTO `deposite_amount` (`da_id`, `u_id`, `d_amount`, `refund_amount`, `method`, `d_date`) VALUES
(2, 43, '100.00', NULL, NULL, '21-01-2022 05:13'),
(3, 43, '50.00', NULL, NULL, '21-01-2022 05:14'),
(4, 43, '10.00', NULL, NULL, '21-01-2022 15:15'),
(5, 38, '10.00', NULL, NULL, '21-01-2022 17:02'),
(6, 38, '20.00', NULL, NULL, '21-01-2022 17:03'),
(7, 36, '50.00', NULL, NULL, '23-01-2022 13:54'),
(8, 36, '80.00', NULL, NULL, '23-01-2022 13:54'),
(9, 36, '40.00', NULL, NULL, '23-01-2022 14:02'),
(10, 40, '70.00', NULL, NULL, '23-01-2022 17:06'),
(11, 48, '60.00', NULL, NULL, '24-01-2022 21:23'),
(12, 38, '69.00', NULL, NULL, '01-02-2022 20:16'),
(13, 38, '50.00', NULL, NULL, '07-09-2022 23:47'),
(14, 38, '100.00', NULL, NULL, '05-10-2022 20:50'),
(15, 38, '50.00', NULL, 1, '05-10-2022 21:01'),
(16, 38, '100.00', '100.00', 0, '06-10-2022 01:33'),
(17, 38, '24.00', '24.00', 0, '06-10-2022 01:51'),
(18, 38, '24.00', '24.00', 0, '06-10-2022 01:51'),
(19, 38, '140.00', NULL, 2, '06-10-2022 02:03'),
(20, 38, '70.00', '70.00', 0, '06-10-2022 02:37'),
(21, 38, '70.00', '70.00', 0, '06-10-2022 02:37'),
(22, 43, '52.00', NULL, 2, '06-10-2022 02:46'),
(23, 38, '16.00', '16.00', 0, '06-10-2022 02:52'),
(24, 38, '16.00', '16.00', 0, '06-10-2022 02:52'),
(25, 38, '16.00', '16.00', 0, '06-10-2022 02:52'),
(26, 43, '13.00', '13.00', 0, '06-10-2022 02:52'),
(27, 43, '13.00', '13.00', 0, '06-10-2022 02:52'),
(28, 43, '13.00', '13.00', 0, '06-10-2022 02:52'),
(29, 43, '13.00', '13.00', 0, '06-10-2022 02:52'),
(30, 43, '80.00', NULL, 2, '06-10-2022 03:05'),
(31, 49, '200.00', NULL, 1, '06-10-2022 03:06'),
(32, 49, '160.00', NULL, 2, '06-10-2022 03:07'),
(33, 48, '300.00', NULL, 1, '06-10-2022 03:09'),
(34, 48, '100.00', NULL, 2, '06-10-2022 03:10'),
(35, 50, '300.00', NULL, 1, '06-10-2022 03:27'),
(36, 50, '200.00', NULL, 1, '06-10-2022 03:27'),
(37, 50, '400.00', NULL, 2, '06-10-2022 03:27'),
(38, 37, '300.00', NULL, 1, '06-10-2022 03:47'),
(39, 37, '200.00', NULL, 2, '06-10-2022 04:58'),
(40, 43, '200.00', NULL, 1, '06-10-2022 05:00'),
(41, 43, '160.00', NULL, 2, '06-10-2022 05:04'),
(42, 43, '200.00', NULL, 1, '06-10-2022 05:05'),
(43, 43, '160.00', NULL, 2, '06-10-2022 05:06'),
(44, 43, '80.00', NULL, 2, '07-10-2022 16:32'),
(45, 43, '80.00', '80.00', 0, '07-10-2022 16:35'),
(46, 43, '40.00', NULL, 2, '07-10-2022 16:55'),
(47, 43, '50.00', NULL, 1, '07-10-2022 19:57'),
(48, 43, '50.00', NULL, 2, '10-10-2022 03:46'),
(49, 43, '100.00', NULL, 2, '10-10-2022 03:48'),
(50, 48, '100.00', NULL, 2, '10-10-2022 04:17'),
(51, 49, '50.00', NULL, 1, '10-10-2022 04:20'),
(52, 49, '50.00', NULL, 2, '10-10-2022 04:20'),
(53, 40, '50.00', NULL, 2, '10-10-2022 05:06'),
(54, 38, '50.00', NULL, 2, '10-10-2022 05:07'),
(55, 43, '50.00', NULL, 1, '10-10-2022 12:36'),
(56, 43, '40.00', NULL, 2, '10-10-2022 12:36'),
(57, 38, '50.00', NULL, 1, '05-12-2022 23:16'),
(58, 38, '100.00', NULL, 2, '05-12-2022 23:17'),
(59, 38, '90.00', NULL, 2, '17-12-2022 22:59'),
(60, 38, '90.00', NULL, 2, '17-12-2022 23:00'),
(61, 38, '300.00', NULL, 1, '18-12-2022 01:34'),
(62, 38, '90.00', NULL, 2, '18-12-2022 02:51'),
(63, 38, '20.00', NULL, 2, '18-12-2022 02:58'),
(64, 38, '60.00', NULL, 2, '18-12-2022 03:20'),
(65, 38, '20.00', NULL, 2, '18-12-2022 03:31'),
(66, 38, '20.00', NULL, 2, '18-12-2022 03:35'),
(67, 38, '20.00', NULL, 2, '18-12-2022 03:42'),
(68, 38, '50.00', NULL, 2, '20-12-2022 16:08'),
(69, 52, '200.00', NULL, 1, '21-12-2022 22:55'),
(70, 52, '15.00', NULL, 2, '21-12-2022 22:55'),
(71, 52, '80.00', NULL, 2, '24-12-2022 08:21'),
(72, 50, '80.00', NULL, 2, '24-12-2022 08:30'),
(73, 48, '40.00', NULL, 2, '24-12-2022 08:33'),
(74, 37, '40.00', NULL, 2, '24-12-2022 08:37'),
(75, 52, '14.00', NULL, 2, '24-12-2022 16:25'),
(76, 48, '20.00', NULL, 2, '21-01-2023 18:00'),
(77, 55, '300.00', NULL, 1, '28-01-2023 17:34'),
(78, 55, '120.00', NULL, 2, '28-01-2023 17:35'),
(79, 55, '30.00', NULL, 2, '28-01-2023 17:53'),
(80, 55, '30.00', NULL, 2, '28-01-2023 17:58'),
(81, 55, '30.00', '30.00', 0, '28-01-2023 18:14'),
(83, 55, '30.00', NULL, 2, '28-01-2023 18:22'),
(84, 55, '12.00', NULL, 2, '29-01-2023 00:24'),
(85, 55, '2.40', '2.40', 0, '29-01-2023 00:24'),
(86, 55, '2.40', '2.40', 0, '29-01-2023 00:24'),
(87, 55, '2.40', '2.40', 0, '29-01-2023 00:24'),
(88, 55, '2.40', '2.40', 0, '29-01-2023 00:24'),
(89, 55, '2.40', '2.40', 0, '29-01-2023 00:24');

-- --------------------------------------------------------

--
-- Table structure for table `imges_upload_test`
--

CREATE TABLE `imges_upload_test` (
  `ID` int(10) NOT NULL,
  `image_0` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_4` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `imges_upload_test`
--

INSERT INTO `imges_upload_test` (`ID`, `image_0`, `image_1`, `image_2`, `image_3`, `image_4`) VALUES
(47, 'p_2049978452.jpg', 'p_276495622.jpg', 'p_131740240.jpg', 'p_1145131325.jpg', 'p_2036285033.jpg'),
(48, 'p_1728629158.jpg', 'p_1964169562.jpg', 'p_458524713.jpg', 'p_654001628.jpg', 'p_1771497906.jpg'),
(49, 'p_1864302558.jpg', 'p_107484989.jpg', 'p_490225722.jpg', '', ''),
(50, 'p_1435392093.jpg', 'p_932627759.jpg', 'p_1943012916.jpg', 'p_200375271.jpg', 'p_691290262.jpg'),
(51, 'p_421763822.jpg', 'p_6391060.jpg', 'p_1464642064.jpg', '', ''),
(52, 'p_1833697587.jpg', 'p_1664475459.jpg', 'p_1919351699.jpg', 'p_1317674450.jpg', 'p_1373340488.jpg'),
(53, 'p_18720531.jpg', 'p_1202015871.jpg', 'p_976067442.jpg', '', ''),
(54, 'p_1707128676.jpg', '', '', '', ''),
(55, 'p_149039295.jpg', 'null', 'null', 'null', 'null'),
(56, 'p_1716840334.jpg', 'null', 'null', 'null', 'null'),
(57, 'p_687636270.jpg', 'p_1229612843.jpg', 'p_929238209.jpg', 'p_687499102.jpg', 'p_313768465.jpg'),
(58, 'p_304131724.jpg', 'p_516471179.jpg', 'p_118327688.jpg', 'p_1579681556.jpg', 'null'),
(59, 'p_1726832475.jpg', 'p_1141221782.jpg', 'p_2107792198.jpg', 'null', 'null'),
(60, 'p_1817081009.jpg', 'p_445783092.jpg', 'p_1982195487.jpg', 'p_1627370252.jpg', 'null'),
(61, 'p_1607200295.jpg', 'p_293355626.jpg', 'p_679896299.jpg', 'null', 'null'),
(62, 'p_361014639.jpg', 'p_725948647.jpg', 'null', 'null', 'null'),
(63, 'p_1886942423.jpg', 'p_949490661.jpg', 'p_94485791.jpg', 'null', 'null'),
(64, 'p_673898251.jpg', 'p_944324709.jpg', 'p_1811502623.jpg', 'null', 'null'),
(65, 'p_187379636.jpg', 'p_656723640.jpg', 'p_1959878460.jpg', 'p_1019089008.jpg', 'p_1378892330.jpg'),
(66, 'p_13847340.jpg', 'p_736412248.jpg', 'p_955786782.jpg', 'null', 'null'),
(67, 'p_398556765.jpg', 'p_1778833887.jpg', 'p_40032152.jpg', 'null', 'null'),
(68, 'p_2100848673.jpg', 'p_972580282.jpg', 'p_400930331.jpg', 'null', 'null'),
(69, 'p_1434422640.jpg', 'p_1841852134.jpg', 'p_738882042.jpg', 'p_197583690.jpg', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `m_admin`
--

CREATE TABLE `m_admin` (
  `AID` int(10) NOT NULL,
  `a_username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_phonecode` int(10) NOT NULL,
  `a_country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_vcode` int(10) NOT NULL,
  `a_vstatus` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_status` int(5) NOT NULL,
  `a_dateofbirth` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_createtime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_updatetime` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_profilepic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_signinmethod` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_admin`
--

INSERT INTO `m_admin` (`AID`, `a_username`, `a_fullname`, `a_email`, `a_gender`, `a_password`, `a_phone`, `a_phonecode`, `a_country`, `a_vcode`, `a_vstatus`, `a_status`, `a_dateofbirth`, `a_createtime`, `a_updatetime`, `a_address`, `a_profilepic`, `a_signinmethod`) VALUES
(5, 'baaz421', 'Shahbaaz Hussain', 'baazdesigner@gmail.com', 'male', '$2y$10$.Yz3jdwAkjStfmXKZhPHqOlyEQJanBsi5IVwN2aCZIz69ash12aa.', '66703387', 974, 'Qatar (‫قطر‬‎)', 287860, 'notverified', 1, '09-08-1994', '17-10-2021 01:39', '24-11-2021 05:58', NULL, 'A_5_1675616814.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `participators`
--

CREATE TABLE `participators` (
  `part_id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `deal_id` int(20) DEFAULT NULL,
  `deal_zone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `unit_percent` int(10) DEFAULT NULL,
  `coupon_id` int(50) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `join_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participators`
--

INSERT INTO `participators` (`part_id`, `user_id`, `deal_id`, `deal_zone`, `unit_price`, `unit_percent`, `coupon_id`, `status`, `join_date`) VALUES
(61, 38, 23, 'red', '16.00', NULL, NULL, 2, '02-09-2022 05:59'),
(62, 38, 23, 'red', '16.00', NULL, NULL, 2, '02-09-2022 05:59'),
(63, 38, 24, 'red', '24.00', NULL, NULL, 2, '02-09-2022 05:59'),
(64, 38, 24, 'red', '24.00', NULL, NULL, 2, '02-09-2022 05:59'),
(65, 38, 23, 'red', '16.00', NULL, NULL, 2, '02-09-2022 06:07'),
(66, 38, 25, 'red', '100.00', NULL, NULL, 2, '05-10-2022 20:50'),
(67, 38, 30, 'red', '70.00', NULL, NULL, 2, '06-10-2022 02:03'),
(68, 38, 30, 'red', '70.00', NULL, NULL, 2, '06-10-2022 02:03'),
(69, 43, 23, 'red', '13.00', NULL, NULL, 2, '06-10-2022 02:46'),
(70, 43, 23, 'red', '13.00', NULL, NULL, 2, '06-10-2022 02:46'),
(71, 43, 23, 'red', '13.00', NULL, NULL, 2, '06-10-2022 02:46'),
(72, 43, 23, 'red', '13.00', NULL, NULL, 2, '06-10-2022 02:46'),
(73, 43, 31, 'red', '80.00', NULL, NULL, 0, '06-10-2022 03:05'),
(74, 49, 31, 'red', '80.00', NULL, NULL, 0, '06-10-2022 03:07'),
(75, 49, 31, 'red', '80.00', NULL, NULL, 0, '06-10-2022 03:07'),
(76, 48, 31, 'red', '100.00', NULL, NULL, 0, '06-10-2022 03:10'),
(77, 50, 31, 'orange', '100.00', NULL, NULL, 0, '06-10-2022 03:27'),
(78, 50, 31, 'orange', '100.00', NULL, NULL, 0, '06-10-2022 03:27'),
(79, 50, 31, 'orange', '100.00', NULL, NULL, 0, '06-10-2022 03:27'),
(80, 50, 31, 'orange', '100.00', NULL, NULL, 0, '06-10-2022 03:27'),
(81, 37, 31, 'green', '100.00', NULL, NULL, 0, '06-10-2022 04:58'),
(82, 37, 31, 'green', '100.00', NULL, NULL, 0, '06-10-2022 04:58'),
(83, 43, 31, 'green', '80.00', NULL, NULL, 0, '06-10-2022 05:04'),
(84, 43, 31, 'green', '80.00', NULL, NULL, 0, '06-10-2022 05:04'),
(85, 43, 31, 'green', '80.00', NULL, NULL, 0, '06-10-2022 05:06'),
(86, 43, 31, 'green', '80.00', NULL, NULL, 0, '06-10-2022 05:06'),
(87, 43, 32, 'red', '80.00', NULL, NULL, 2, '07-10-2022 16:32'),
(88, 43, 33, 'red', '40.00', NULL, NULL, 0, '07-10-2022 16:55'),
(89, 43, 34, 'red', '50.00', NULL, NULL, 1, '10-10-2022 03:46'),
(90, 43, 33, 'red', '50.00', NULL, NULL, 0, '10-10-2022 03:48'),
(91, 43, 33, 'red', '50.00', NULL, NULL, 0, '10-10-2022 03:48'),
(92, 48, 33, 'red', '50.00', NULL, NULL, 0, '10-10-2022 04:17'),
(93, 48, 33, 'red', '50.00', NULL, NULL, 0, '10-10-2022 04:17'),
(94, 49, 33, 'orange', '50.00', NULL, NULL, 0, '10-10-2022 04:20'),
(95, 40, 33, 'green', '50.00', NULL, NULL, 0, '10-10-2022 05:06'),
(96, 38, 33, 'green', '50.00', NULL, NULL, 0, '10-10-2022 05:07'),
(97, 43, 34, 'red', '40.00', 20, 13, 1, '10-10-2022 12:36'),
(98, 38, 34, 'red', '50.00', 0, 0, 1, '05-12-2022 23:17'),
(99, 38, 34, 'red', '50.00', 0, 0, 1, '05-12-2022 23:17'),
(100, 38, 34, 'red', '45.00', 10, 14, 1, '17-12-2022 22:59'),
(101, 38, 37, 'red', '14.00', 10, 14, 0, '17-12-2022 22:59'),
(102, 38, 37, 'red', '14.00', 10, 14, 0, '17-12-2022 22:59'),
(103, 38, 36, 'red', '18.00', 10, 14, 0, '17-12-2022 22:59'),
(104, 38, 34, 'red', '45.00', 10, 14, 1, '17-12-2022 23:00'),
(105, 38, 37, 'red', '14.00', 10, 14, 0, '17-12-2022 23:00'),
(106, 38, 37, 'red', '14.00', 10, 14, 0, '17-12-2022 23:00'),
(107, 38, 36, 'red', '18.00', 10, 14, 0, '17-12-2022 23:00'),
(108, 38, 34, 'red', '45.00', 10, 14, 1, '18-12-2022 02:51'),
(109, 38, 37, 'red', '14.00', 10, 14, 0, '18-12-2022 02:51'),
(110, 38, 37, 'red', '14.00', 10, 14, 0, '18-12-2022 02:51'),
(111, 38, 36, 'red', '18.00', 10, 14, 0, '18-12-2022 02:51'),
(112, 38, 36, 'red', '20.00', 0, 0, 0, '18-12-2022 02:58'),
(113, 38, 36, 'red', '20.00', 0, 0, 0, '18-12-2022 03:20'),
(114, 38, 36, 'red', '20.00', 0, 0, 0, '18-12-2022 03:20'),
(115, 38, 36, 'red', '20.00', 0, 0, 0, '18-12-2022 03:20'),
(116, 38, 36, 'red', '20.00', 0, 0, 0, '18-12-2022 03:31'),
(117, 38, 36, 'red', '20.00', 0, 0, 0, '18-12-2022 03:35'),
(118, 38, 36, 'red', '20.00', 0, 0, 0, '18-12-2022 03:42'),
(119, 38, 34, 'red', '50.00', 0, 0, 1, '20-12-2022 16:08'),
(120, 52, 37, 'red', '15.00', 0, 0, 0, '21-12-2022 22:55'),
(121, 52, 36, 'red', '20.00', 0, 0, 0, '24-12-2022 08:21'),
(122, 52, 36, 'red', '20.00', 0, 0, 0, '24-12-2022 08:21'),
(123, 52, 36, 'red', '20.00', 0, 0, 0, '24-12-2022 08:21'),
(124, 52, 36, 'red', '20.00', 0, 0, 0, '24-12-2022 08:21'),
(125, 50, 36, 'orange', '20.00', 0, 0, 0, '24-12-2022 08:30'),
(126, 50, 36, 'orange', '20.00', 0, 0, 0, '24-12-2022 08:30'),
(127, 50, 36, 'orange', '20.00', 0, 0, 0, '24-12-2022 08:30'),
(128, 50, 36, 'orange', '20.00', 0, 0, 0, '24-12-2022 08:30'),
(129, 48, 36, 'green', '20.00', 0, 0, 0, '24-12-2022 08:33'),
(130, 48, 36, 'green', '20.00', 0, 0, 0, '24-12-2022 08:33'),
(131, 37, 36, 'green', '20.00', 0, 0, 0, '24-12-2022 08:37'),
(132, 37, 36, 'green', '20.00', 0, 0, 0, '24-12-2022 08:37'),
(133, 52, 37, 'red', '14.00', 10, 14, 0, '24-12-2022 16:25'),
(134, 48, 36, 'green', '20.00', 0, 0, 0, '21-01-2023 18:00'),
(135, 55, 37, 'red', '15.00', 0, 0, 0, '28-01-2023 17:35'),
(136, 55, 37, 'red', '15.00', 0, 0, 0, '28-01-2023 17:35'),
(137, 55, 37, 'red', '15.00', 0, 0, 0, '28-01-2023 17:35'),
(138, 55, 37, 'red', '15.00', 0, 0, 0, '28-01-2023 17:35'),
(139, 55, 37, 'red', '15.00', 0, 0, 0, '28-01-2023 17:35'),
(140, 55, 37, 'red', '15.00', 0, 0, 0, '28-01-2023 17:35'),
(141, 55, 37, 'red', '15.00', 0, 0, 0, '28-01-2023 17:35'),
(142, 55, 37, 'red', '15.00', 0, 0, 0, '28-01-2023 17:35'),
(143, 55, 37, 'orange', '15.00', 0, 0, 0, '28-01-2023 17:53'),
(144, 55, 37, 'orange', '15.00', 0, 0, 0, '28-01-2023 17:53'),
(147, 55, 37, 'green', '15.00', 0, 0, 0, '28-01-2023 18:22'),
(148, 55, 37, 'green', '15.00', 0, 0, 0, '28-01-2023 18:22'),
(149, 55, 47, 'red', '2.40', 0, 0, 2, '29-01-2023 00:24'),
(150, 55, 47, 'red', '2.40', 0, 0, 2, '29-01-2023 00:24'),
(151, 55, 47, 'red', '2.40', 0, 0, 2, '29-01-2023 00:24'),
(152, 55, 47, 'red', '2.40', 0, 0, 2, '29-01-2023 00:24'),
(153, 55, 47, 'red', '2.40', 0, 0, 2, '29-01-2023 00:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(15) NOT NULL,
  `admin_id` int(15) DEFAULT NULL,
  `product_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(5) DEFAULT NULL,
  `p_status` int(2) DEFAULT NULL,
  `deal_check` int(5) DEFAULT NULL,
  `image_0` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_4` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_price` decimal(10,2) DEFAULT NULL,
  `adding` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `admin_id`, `product_name`, `category_id`, `p_status`, `deal_check`, `image_0`, `image_1`, `image_2`, `image_3`, `image_4`, `country`, `description`, `m_price`, `adding`, `time`) VALUES
(4, 1, 'Brown Purse', 2, 1, 0, 'p_2010179415.jpg', 'p_1532524785.jpg', 'p_1809500759.jpg', 'p_429361133.jpg', 'null', 'IN', 'Brown color purse -size 30 X 40- stylish bag with suitable with any dress and golden frame work ', '300.00', NULL, '2021-10-08 11:31:32'),
(5, 1, 'Hig heel Sandal', 2, 1, 0, 'p_1520952134.jpg', 'p_452067129.jpg', 'p_312907487.jpg', 'p_1983303985.jpg', NULL, 'IN', 'golden color high heel sandal with cross belt , latest fashionable style , for any occasion  ', '350.00', NULL, '2021-10-08 12:22:12'),
(6, 1, 'Kurta style suit ', 4, 1, 0, 'p_1509947001.jpg', 'p_1133767679.jpg', 'p_1461108727.jpg', 'p_1267033111.jpg', 'null', 'IN', 'Stylish short khute , with nice pattern\r\nlemon color ', '150.00', NULL, '2021-10-08 12:25:48'),
(7, 1, 'Brown night suit with pajamas', 4, 1, 0, 'p_1642215992.jpg', 'p_157135756.jpg', 'p_874271354.jpg', 'p_471678602.jpg', 'null', 'IN', 'Brown night suit with pajamas with flower pattern', '200.00', NULL, '2021-10-08 12:44:12'),
(9, 1, 'Tiger Pattern Dress Suit', 4, 1, 0, 'p_1573713037.jpg', 'p_1043474764.jpg', 'p_1329361364.jpg', 'null', 'null', NULL, 'Short skirt dress with Tiger pattern, and Black shirt', '250.00', NULL, '2021-10-08 13:11:15'),
(10, 1, 'circle shape purse ', 2, 1, 0, 'p_1767178315.jpg', 'p_1280782257.jpg', 'p_228573533.jpg', 'p_566498302.jpg', 'p_1237800811.jpg', NULL, 'circle shape purse with golden metal finish and chain', '350.00', NULL, '2021-10-08 15:12:47'),
(23, 201, 'Portugal clothes ', 24, 1, 0, 'p_1188973222.jpg', 'p_1322982830.jpg', 'p_59836365.jpg', 'p_712591674.jpg', 'p_337931535.jpg', NULL, '100% cotton', '210.00', NULL, '2021-12-09 13:03:35'),
(30, 1, 'landscapes', 2, 1, 0, 'p_1092899148.jpg', 'p_819658621.jpg', 'p_468234187.jpg', 'p_1376622395.jpg', 'p_1592666059.jpg', NULL, 'beautifull images', '200.00', NULL, '2022-01-23 12:01:44'),
(37, 1, 'Black mens sandal', 19, 1, 0, 'p_1291295736.jpg', 'p_1038425785.jpg', 'p_2027901439.jpg', 'p_339445791.jpg', NULL, NULL, 'mens black sandal, with glorying shine and perfect for youngster  ', '300.00', '', '2022-04-07 17:43:03'),
(39, 4, 'Brown fur Jacket', 4, 1, NULL, 'p_1841115067.jpg', 'p_872810786.jpg', 'p_99308933.jpg', 'p_1139150912.jpg', 'p_995827063.jpg', NULL, 'super stylizes brown fur jacket for womens perfect for parties ', '300.00', '', '2022-04-07 21:14:20'),
(43, 5, 'Brown pursh with gold chain', 24, 1, 0, 'p_1244472881.jpg', 'p_1317257154.jpg', 'p_1405992755.jpg', 'p_652921995.jpg', 'p_1472201411.jpg', NULL, 'Brown pursh with gold chain', '150.00', '', '2022-06-03 09:22:04'),
(48, 1, 'Lether fur Sandal ', 2, 1, 1, 'p_83527630.jpg', 'p_2054413154.jpg', 'p_1516003804.jpg', 'p_549703025.jpg', 'p_770602246.jpg', NULL, 'Lether fur Sandal , with brown texture and multiple size ', '10.43', '', '2023-01-13 17:21:32'),
(49, 220, 'fake product', 2, 1, NULL, 'p_1543613629.jpg', 'p_2146859785.jpg', 'p_320264014.jpg', 'p_420542254.jpg', 'p_235636597.jpg', 'IN', 'fake products with fake images ', '20.00', '', '2023-01-20 04:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poll`
--

CREATE TABLE `tbl_poll` (
  `poll_id` int(11) NOT NULL,
  `php_framework` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_poll`
--

INSERT INTO `tbl_poll` (`poll_id`, `php_framework`) VALUES
(1, 'Laravel'),
(2, 'CakePHP'),
(3, 'Phalcon'),
(4, 'CodeIgniter'),
(5, 'Symfony'),
(6, 'CakePHP'),
(7, 'CakePHP'),
(8, 'CakePHP'),
(9, 'CakePHP'),
(10, 'CakePHP'),
(11, 'CakePHP'),
(12, 'CakePHP'),
(13, 'CakePHP'),
(14, 'CakePHP'),
(15, 'CakePHP'),
(16, 'Laravel'),
(17, 'Laravel'),
(18, 'Laravel'),
(19, 'Laravel'),
(20, 'Laravel'),
(21, 'Laravel');

-- --------------------------------------------------------

--
-- Table structure for table `test_product`
--

CREATE TABLE `test_product` (
  `ID` int(10) NOT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_product`
--

INSERT INTO `test_product` (`ID`, `p_name`, `price`) VALUES
(1, 'box', 50),
(2, 'cap', 20),
(3, 'pen', 80),
(4, 'cufflink', 120),
(5, 'wallet', 150),
(6, 'cards', 70),
(7, 'car', 60),
(8, 'bag', 10),
(9, 'candle', 55),
(10, 'bottle', 33),
(11, 'cup', 24),
(12, 'glass', 66),
(13, 'table', 180),
(14, 'computers', 200),
(15, 'cable', 15),
(16, 'mat', 35),
(17, 'watch', 35),
(18, 'marker', 40),
(19, 'scissor', 20),
(20, 'mobile', 155),
(21, 'perfume', 110);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countrycode` int(30) NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vcode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vstatus` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'USD',
  `iso` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createtime` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updatetime` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `country`, `countrycode`, `mobile`, `dob`, `profile_pic`, `vcode`, `vstatus`, `currency`, `iso`, `createtime`, `updatetime`, `u_status`) VALUES
(36, 'iyad', 'imh662@gmail.com', '$2y$10$ABE6tViBaANa7EONZGQWOuNBHqKvv5dddK3sgKmpAGpbC87vee4VO', 'Qatar (‫قطر‬‎)', 974, '55269182', '1976-01-30', NULL, '0', 'verified', 'USD', NULL, '16 09 2021 04:42:38 PM', '16 09 2021 04:48:22 PM', 1),
(37, 'salman', 'example@example.com', '$2y$10$N2FsJo7TmM6VD9bRfGhOvOVIYuYSW2HSmrWcY0PCrs6vA6uWeCFb.', 'Qatar (‫قطر‬‎)', 974, '33314579', '1976-09-14', NULL, '0', 'verified', 'USD', NULL, '16 09 2021 06:49:24 PM', '06-10-2022 03:46', 1),
(38, 'Baaz Hussain', 'baazdesigner@gmail.com', '$2y$10$P5ny1ridj1ZqBGlzgpLUVuywKUlQ8Xjv4GZxvTq10VWazGkpvqxAu', 'India (भारत)', 91, '66703387', NULL, NULL, '365472', 'notverified', 'QAR', NULL, NULL, '20-12-2022 18:45', 1),
(40, 'Fazal Khan', 'examplefazal@example.com', '$2y$10$hCh3RcTFuEjRl9EkQyxP5uE/RvNwAlGTOnKAA82ZlvNcHNcDzHKEu', 'Qatar (‫قطر‬‎)', 974, '55678900', '1992-08-09', NULL, '0', 'verified', 'USD', NULL, '10 10 2021 02:00:30 AM', '23-01-2022 17:01', 1),
(42, 'Hussain', 'hussain@gmail.com', '$2y$10$FACImx9dK0wWpiVE.rA3qu0ySUt8hdK2M.k2wTW/DPj/d51lCLbHK', 'Qatar (‫قطر‬‎)', 974, '33809057', '1995-10-27', NULL, '722504', 'notverified', 'USD', NULL, '18-01-2022 22:19', '', 1),
(43, 'zahed', 'zahed@gmail.com', '$2y$10$27X8Cu008z6ahoeS2PoK9.cvsYbd12f/MHkbuGBvtof.n1G1BpZZ.', 'Qatar (‫قطر‬‎)', 974, '69769796', '2005-12-06', NULL, '0', 'verified', 'QAR', NULL, '18-01-2022 22:23', '23-01-2022 14:07', 1),
(48, 'nisha hussain', 'nisha@love.com', '$2y$10$Ve6rAgTn9NCZaGOiOb4qnuiCAkm9BXSltLxMp4K95DWyUfFSchAoW', 'India (भारत)', 91, '8309655681', '1995-10-27', NULL, '0', 'verified', 'USD', NULL, '24-01-2022 21:21', '24-01-2022 21:21', 1),
(49, 'ali hussain', 'ali@gmail.com', '$2y$10$53Hjg/Rb0.byG7ey5etqxeoGRzEIv0yLo6ONCipYd.hRaAR8CJEGC', 'United Arab Emirates (‫الإمارات العربية المتحدة‬‎)', 971, '501234567', '1994-08-09', NULL, '0', 'verified', 'USD', NULL, '25-04-2022 02:27', '25-04-2022 02:37', 1),
(50, 'shahbaaz Hussain', 'shahbazhussain421@gmail.com', '$2y$10$KbzFhlaZ6N3rbO0b5FeNC.8MjAdAMb63pQdIxAC6zL9S2KehL2kg.', 'Qatar (‫قطر‬‎)', 974, '55032608', '1994-08-09', NULL, '0', 'verified', 'USD', NULL, '09-05-2022 16:07', '24-12-2022 08:28', 1),
(52, 'Ali Hussain', 'shahbaaz0421@gmail.com', '$2y$10$kXUY3Us3dPA5iPTgKHksNuanBMojbeqtlSfXFX4/lCfGqW44EOWoO', 'India (भारत)', 91, '9110703811', '1994-08-09', 'U_52_1676841340.jpg', '535943', 'notverified', 'INR', 'IN', '18-12-2022 04:33', '20-02-2023 00:11', 1),
(55, 'Aliyar Hussain', 'shahbaaz0421old@gmail.com', '$2y$10$pddfpUc2opcSHU0NC1I5bunt2SbA8Q8j6B1xPHhnlycJZf8qr7ZQ6', 'India (भारत)', 91, '9110703891', '1993-08-09', 'U_55_1676840315.jpg', '985841', 'notverified', 'INR', 'IN', '09-01-2023 23:50', '20-02-2023 00:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE `winner` (
  `w_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `deal_id` int(20) NOT NULL,
  `start_date` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_confirm` int(5) NOT NULL,
  `user_confirm_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_confirm` int(5) NOT NULL,
  `vendor_confirm_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(5) NOT NULL,
  `created_date` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `winner`
--

INSERT INTO `winner` (`w_id`, `user_id`, `admin_id`, `deal_id`, `start_date`, `end_date`, `user_confirm`, `user_confirm_date`, `vendor_confirm`, `vendor_confirm_date`, `status`, `created_date`) VALUES
(1, 38, 1, 36, '17-12-2022 17:02', '21-01-2023 18:01', 0, '22-01-2023 03:57', 0, '22-01-2023 03:20', 1, '21-01-2023 18:01'),
(2, 43, 1, 34, '07-10-2022 20:09', '28-01-2023 17:17', 1, NULL, 1, NULL, 0, '28-01-2023 17:17'),
(4, 55, 1, 37, '17-12-2022 17:02', '28-01-2023 18:22', 0, '28-01-2023 18:49', 0, '28-01-2023 18:46', 1, '28-01-2023 18:22');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `ID` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`ID`, `user_id`, `product_id`, `time`) VALUES
(99, 48, 23, '01-03-2022 00:03'),
(100, 48, 9, '01-03-2022 00:06'),
(159, 52, 43, '26-02-2023 10:09'),
(160, 52, 48, '26-02-2023 10:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_iso_iso3_dial_unique` (`name`,`iso`,`iso3`,`dial`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `current_balance`
--
ALTER TABLE `current_balance`
  ADD PRIMARY KEY (`cb_id`);

--
-- Indexes for table `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`DID`);

--
-- Indexes for table `deal_setting`
--
ALTER TABLE `deal_setting`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `deposite_amount`
--
ALTER TABLE `deposite_amount`
  ADD PRIMARY KEY (`da_id`);

--
-- Indexes for table `imges_upload_test`
--
ALTER TABLE `imges_upload_test`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `m_admin`
--
ALTER TABLE `m_admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `participators`
--
ALTER TABLE `participators`
  ADD PRIMARY KEY (`part_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_poll`
--
ALTER TABLE `tbl_poll`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `test_product`
--
ALTER TABLE `test_product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winner`
--
ALTER TABLE `winner`
  ADD PRIMARY KEY (`w_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `current_balance`
--
ALTER TABLE `current_balance`
  MODIFY `cb_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deal`
--
ALTER TABLE `deal`
  MODIFY `DID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `deal_setting`
--
ALTER TABLE `deal_setting`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `deposite_amount`
--
ALTER TABLE `deposite_amount`
  MODIFY `da_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `imges_upload_test`
--
ALTER TABLE `imges_upload_test`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `m_admin`
--
ALTER TABLE `m_admin`
  MODIFY `AID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `participators`
--
ALTER TABLE `participators`
  MODIFY `part_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_poll`
--
ALTER TABLE `tbl_poll`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `test_product`
--
ALTER TABLE `test_product`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `winner`
--
ALTER TABLE `winner`
  MODIFY `w_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
