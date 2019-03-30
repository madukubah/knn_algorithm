-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2019 at 12:00 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knn`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE `advertise` (
  `advertise_id` int(5) NOT NULL,
  `advertise_photo` text NOT NULL,
  `advertise_desc` text NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`advertise_id`, `advertise_photo`, `advertise_desc`, `create_date`) VALUES
(2, '2019-03-12-03-09-09images (9).jpg', 'iklan', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `data_testing`
--

CREATE TABLE `data_testing` (
  `data_id` int(11) NOT NULL,
  `data_name` varchar(200) NOT NULL,
  `data_semester` double NOT NULL,
  `data_IPK` double NOT NULL,
  `data_gaji_ortu` double NOT NULL,
  `data_UKT` double NOT NULL,
  `data_tanggungan` double NOT NULL,
  `data_label` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_testing`
--

INSERT INTO `data_testing` (`data_id`, `data_name`, `data_semester`, `data_IPK`, `data_gaji_ortu`, `data_UKT`, `data_tanggungan`, `data_label`) VALUES
(58, 'A', 7, 3.6, 3500000, 3330000, 4, 1),
(59, 'B', 5, 2.75, 5500000, 3130000, 5, 1),
(60, 'C', 6, 2.7, 3700000, 2950000, 5, 1),
(61, 'D', 5, 2.63, 2800000, 3100000, 3, 0),
(62, 'E', 5, 2.82, 2790000, 2700000, 2, 1),
(63, 'F', 5, 2.65, 2995000, 2940000, 4, 0),
(64, 'G', 6, 2.93, 2560000, 3610000, 5, 1),
(65, 'H', 4, 2.7, 2550000, 3710000, 7, 1),
(66, 'I', 5, 2.66, 2860000, 2870000, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_testing_normalized`
--

CREATE TABLE `data_testing_normalized` (
  `data_id` int(11) NOT NULL,
  `data_name` varchar(200) NOT NULL,
  `data_semester` double NOT NULL,
  `data_IPK` double NOT NULL,
  `data_gaji_ortu` double NOT NULL,
  `data_UKT` double NOT NULL,
  `data_tanggungan` double NOT NULL,
  `data_label` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_testing_normalized`
--

INSERT INTO `data_testing_normalized` (`data_id`, `data_name`, `data_semester`, `data_IPK`, `data_gaji_ortu`, `data_UKT`, `data_tanggungan`, `data_label`) VALUES
(58, 'A', 1, 1, 0.322, 0.6238, 0.4, 1),
(59, 'B', 0.3333, 0.1237, 1, 0.4257, 0.6, 1),
(60, 'C', 0.6667, 0.0722, 0.3898, 0.2475, 0.6, 1),
(61, 'D', 0.3333, 0, 0.0847, 0.396, 0.2, 0),
(62, 'E', 0.3333, 0.1959, 0.0814, 0, 0, 1),
(63, 'F', 0.3333, 0.0206, 0.1508, 0.2376, 0.4, 0),
(64, 'G', 0.6667, 0.3093, 0.0034, 0.901, 0.6, 1),
(65, 'H', 0, 0.0722, 0, 1, 1, 1),
(66, 'I', 0.3333, 0.0309, 0.1051, 0.1683, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_uji`
--

CREATE TABLE `data_uji` (
  `data_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data_semester` double NOT NULL,
  `data_IPK` double NOT NULL,
  `data_gaji_ortu` double NOT NULL,
  `data_UKT` double NOT NULL,
  `data_tanggungan` double NOT NULL,
  `data_label` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_uji`
--

INSERT INTO `data_uji` (`data_id`, `user_id`, `data_semester`, `data_IPK`, `data_gaji_ortu`, `data_UKT`, `data_tanggungan`, `data_label`) VALUES
(5, 15, 3, 2.69, 4500000, 3550000, 6, -1),
(6, 16, 5, 2.63, 2800000, 3100000, 3, -1);

-- --------------------------------------------------------

--
-- Table structure for table `data_uji_normalized`
--

CREATE TABLE `data_uji_normalized` (
  `data_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data_semester` double NOT NULL,
  `data_IPK` double NOT NULL,
  `data_gaji_ortu` double NOT NULL,
  `data_UKT` double NOT NULL,
  `data_tanggungan` double NOT NULL,
  `data_label` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_uji_normalized`
--

INSERT INTO `data_uji_normalized` (`data_id`, `user_id`, `data_semester`, `data_IPK`, `data_gaji_ortu`, `data_UKT`, `data_tanggungan`, `data_label`) VALUES
(5, 15, -0.3333, 0.0619, 0.661, 0.8416, 0.8, 1),
(6, 16, 0.3333, 0, 0.0847, 0.396, 0.2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` mediumint(9) NOT NULL,
  `log_datetime` datetime NOT NULL,
  `log_message` text NOT NULL,
  `user_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_datetime`, `log_message`, `user_id`) VALUES
(1, '2019-03-12 03:25:48', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(2, '2019-03-12 03:25:50', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(3, '2019-03-12 03:25:54', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(4, '2019-03-12 03:30:42', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(5, '0000-00-00 00:00:00', 'true', 1),
(6, '2019-03-19 04:00:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(7, '2019-03-19 04:00:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(8, '2019-03-19 04:01:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(9, '2019-03-19 04:03:13', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(10, '2019-03-19 04:03:16', 'a person REGISTER in system ; result =>false', 0),
(11, '0000-00-00 00:00:00', 'true', 1),
(12, '2019-03-19 04:15:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(13, '2019-03-19 04:32:09', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(14, '2019-03-19 04:44:24', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(15, '2019-03-19 04:44:39', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(16, '2019-03-19 04:44:45', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(17, '0000-00-00 00:00:00', 'true', 1),
(18, '2019-03-19 07:42:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(19, '2019-03-19 08:46:54', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(20, '2019-03-19 08:47:54', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(21, '2019-03-19 09:01:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(22, '2019-03-19 09:06:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(23, '0000-00-00 00:00:00', 'true', 1),
(24, '2019-03-20 02:44:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(25, '2019-03-20 02:46:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(26, '2019-03-20 02:51:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(27, '2019-03-20 02:52:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(28, '2019-03-20 02:53:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(29, '2019-03-20 02:55:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(30, '2019-03-20 02:56:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(31, '2019-03-20 02:56:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(32, '2019-03-20 03:00:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(33, '2019-03-20 03:02:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(34, '2019-03-20 03:02:18', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(35, '0000-00-00 00:00:00', 'true', 1),
(36, '2019-03-20 03:02:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(37, '2019-03-20 03:05:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(38, '2019-03-20 03:05:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(39, '2019-03-20 03:09:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(40, '2019-03-20 03:13:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(41, '2019-03-20 03:20:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(42, '2019-03-20 03:24:27', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(43, '2019-03-20 03:25:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(44, '2019-03-20 04:03:59', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(45, '0000-00-00 00:00:00', 'true', 1),
(46, '2019-03-20 06:21:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(47, '0000-00-00 00:00:00', 'true', 1),
(48, '2019-03-20 08:39:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(49, '2019-03-20 08:40:07', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(50, '0000-00-00 00:00:00', 'true', 1),
(51, '2019-03-20 08:40:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(52, '2019-03-20 08:42:55', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(53, '0000-00-00 00:00:00', 'true', 1),
(54, '2019-03-20 14:14:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(55, '2019-03-20 14:16:20', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(56, '0000-00-00 00:00:00', 'true', 1),
(57, '2019-03-20 14:16:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(58, '2019-03-20 14:17:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(59, '2019-03-20 14:17:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(60, '2019-03-20 14:17:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(61, '2019-03-20 14:17:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(62, '2019-03-20 14:26:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(63, '2019-03-20 14:28:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(64, '2019-03-20 14:28:56', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(65, '0000-00-00 00:00:00', 'true', 1),
(66, '2019-03-20 16:52:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(67, '0000-00-00 00:00:00', 'true', 1),
(68, '2019-03-22 06:26:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(69, '0000-00-00 00:00:00', 'true', 1),
(70, '2019-03-24 06:33:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(71, '2019-03-24 06:37:43', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(72, '2019-03-24 06:37:52', 'EDIT USER (root1) BY ():  user => root( id = 1) ; result => true', 1),
(73, '2019-03-24 06:37:52', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(74, '2019-03-24 06:38:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(75, '2019-03-24 06:39:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(76, '2019-03-24 06:41:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(77, '2019-03-24 06:47:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(78, '2019-03-24 06:47:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(79, '2019-03-24 06:47:26', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(80, '0000-00-00 00:00:00', 'true', 1),
(81, '2019-03-24 06:47:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(82, '0000-00-00 00:00:00', 'true', 1),
(83, '2019-03-24 07:07:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(84, '2019-03-24 07:08:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(85, '2019-03-24 07:14:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(86, '2019-03-24 07:17:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(87, '2019-03-24 07:19:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(88, '2019-03-24 07:20:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(89, '2019-03-24 07:21:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(90, '2019-03-24 07:21:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(91, '2019-03-24 07:25:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(92, '2019-03-24 07:27:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(93, '2019-03-24 07:28:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(94, '2019-03-24 07:30:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(95, '2019-03-24 07:31:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(96, '2019-03-24 07:31:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(97, '2019-03-24 07:31:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(98, '2019-03-24 07:32:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(99, '2019-03-24 07:32:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(100, '2019-03-24 07:33:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(101, '2019-03-24 07:34:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(102, '2019-03-24 07:35:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(103, '2019-03-24 07:36:14', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(104, '0000-00-00 00:00:00', 'true', 1),
(105, '2019-03-24 07:36:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(106, '2019-03-24 07:36:24', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(107, '0000-00-00 00:00:00', 'true', 1),
(108, '2019-03-24 07:43:56', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(109, '2019-03-24 07:44:00', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(110, '0000-00-00 00:00:00', 'false =>Username atau password salah!', 0),
(111, '0000-00-00 00:00:00', 'true', 1),
(112, '2019-03-24 07:45:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(113, '2019-03-24 07:47:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(114, '2019-03-24 07:48:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(115, '2019-03-24 07:48:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(116, '2019-03-24 07:49:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(117, '2019-03-24 07:50:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(118, '2019-03-24 07:52:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(119, '2019-03-24 07:52:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(120, '2019-03-24 07:52:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(121, '2019-03-24 07:52:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(122, '2019-03-24 07:55:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(123, '2019-03-24 07:55:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(124, '2019-03-24 07:55:58', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(125, '2019-03-24 07:56:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(126, '2019-03-24 07:56:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(127, '2019-03-24 08:01:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(128, '2019-03-24 08:01:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(129, '2019-03-24 08:01:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(130, '2019-03-24 08:01:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(131, '2019-03-24 08:03:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(132, '2019-03-24 08:03:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(133, '2019-03-24 08:04:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(134, '2019-03-24 08:05:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(135, '2019-03-24 08:05:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(136, '2019-03-24 08:09:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(137, '2019-03-24 08:09:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(138, '2019-03-24 08:10:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(139, '2019-03-24 08:11:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(140, '2019-03-24 08:39:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(141, '2019-03-24 08:40:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(142, '2019-03-24 09:01:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(143, '2019-03-24 09:17:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(144, '2019-03-24 09:17:56', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(145, '0000-00-00 00:00:00', 'true', 1),
(146, '2019-03-25 04:44:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(147, '2019-03-25 04:44:41', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(148, '0000-00-00 00:00:00', 'true', 1),
(149, '2019-03-25 04:44:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(150, '2019-03-25 05:01:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(151, '2019-03-25 05:01:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(152, '2019-03-25 05:01:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(153, '2019-03-25 05:01:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(154, '2019-03-25 05:01:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(155, '2019-03-25 05:49:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(156, '2019-03-25 05:49:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(157, '2019-03-25 05:49:51', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(158, '0000-00-00 00:00:00', 'true', 1),
(159, '2019-03-25 05:50:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(160, '2019-03-25 05:50:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(161, '2019-03-25 05:51:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(162, '2019-03-25 05:51:48', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(163, '2019-03-25 05:53:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(164, '2019-03-25 05:53:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(165, '2019-03-25 05:56:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(166, '2019-03-25 05:57:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(167, '2019-03-25 05:59:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(168, '2019-03-25 05:59:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(169, '2019-03-25 05:59:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(170, '2019-03-25 06:00:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(171, '2019-03-25 06:00:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(172, '2019-03-25 06:04:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(173, '2019-03-25 06:05:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(174, '2019-03-25 06:05:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(175, '2019-03-25 06:05:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(176, '2019-03-25 06:06:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(177, '2019-03-25 06:07:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(178, '2019-03-25 06:07:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(179, '2019-03-25 06:07:56', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(180, '2019-03-25 06:07:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(181, '2019-03-25 06:09:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(182, '2019-03-25 06:09:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(183, '2019-03-25 06:09:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(184, '2019-03-25 06:10:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(185, '2019-03-25 06:17:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(186, '2019-03-25 06:17:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(187, '2019-03-25 06:17:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(188, '2019-03-25 06:18:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(189, '2019-03-25 06:55:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(190, '2019-03-25 07:00:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(191, '2019-03-25 07:00:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(192, '2019-03-25 07:00:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(193, '2019-03-25 07:00:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(194, '2019-03-25 07:01:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(195, '2019-03-25 07:02:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(196, '2019-03-25 07:02:54', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(197, '2019-03-25 07:04:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(198, '2019-03-25 07:05:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(199, '2019-03-25 07:06:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(200, '2019-03-25 07:07:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(201, '2019-03-25 07:08:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(202, '2019-03-25 07:09:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(203, '2019-03-25 07:10:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(204, '2019-03-25 07:11:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(205, '2019-03-25 07:13:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(206, '2019-03-25 07:13:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(207, '2019-03-25 07:13:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(208, '2019-03-25 07:13:40', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(209, '2019-03-25 07:15:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(210, '2019-03-25 07:23:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(211, '2019-03-25 07:35:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(212, '2019-03-25 07:38:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(213, '2019-03-25 07:43:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(214, '2019-03-25 07:44:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(215, '2019-03-25 07:48:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(216, '2019-03-25 07:48:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(217, '2019-03-25 07:49:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(218, '2019-03-25 07:49:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(219, '2019-03-25 07:50:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(220, '2019-03-25 07:50:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(221, '2019-03-25 07:50:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(222, '2019-03-25 07:51:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(223, '2019-03-25 07:51:56', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(224, '2019-03-25 07:51:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(225, '2019-03-25 07:53:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(226, '2019-03-25 07:53:03', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(227, '2019-03-25 07:53:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(228, '2019-03-25 07:53:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(229, '2019-03-25 07:53:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(230, '2019-03-25 07:56:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(231, '0000-00-00 00:00:00', 'true', 1),
(232, '2019-03-25 15:24:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(233, '2019-03-25 15:24:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(234, '2019-03-25 15:39:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(235, '2019-03-25 15:40:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(236, '2019-03-25 15:40:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(237, '2019-03-25 15:41:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(238, '2019-03-25 15:41:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(239, '2019-03-25 15:42:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(240, '2019-03-25 15:44:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(241, '2019-03-25 15:44:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(242, '2019-03-25 15:44:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(243, '2019-03-25 15:45:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(244, '2019-03-25 15:45:48', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(245, '2019-03-25 15:46:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(246, '2019-03-25 15:46:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(247, '2019-03-25 15:46:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(248, '2019-03-25 15:52:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(249, '2019-03-25 15:56:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(250, '2019-03-25 16:00:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(251, '2019-03-25 16:01:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(252, '2019-03-25 16:03:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(253, '2019-03-25 16:03:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(254, '2019-03-25 16:05:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(255, '2019-03-25 16:07:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(256, '2019-03-25 16:07:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(257, '2019-03-25 16:09:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(258, '2019-03-25 16:09:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(259, '2019-03-25 16:12:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(260, '2019-03-25 16:12:03', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(261, '2019-03-25 16:12:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(262, '2019-03-25 16:12:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(263, '2019-03-25 16:12:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(264, '2019-03-25 16:12:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(265, '2019-03-25 16:25:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(266, '2019-03-25 16:26:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(267, '2019-03-25 16:26:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(268, '2019-03-25 16:26:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(269, '2019-03-25 16:27:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(270, '2019-03-25 16:27:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(271, '2019-03-25 16:27:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(272, '2019-03-25 16:27:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(273, '2019-03-25 16:27:42', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(274, '2019-03-25 16:27:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(275, '2019-03-25 16:27:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(276, '2019-03-25 16:27:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(277, '2019-03-25 17:02:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(278, '2019-03-25 17:03:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(279, '2019-03-25 17:03:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(280, '2019-03-25 17:03:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(281, '2019-03-25 17:03:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(282, '2019-03-25 17:03:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(283, '2019-03-25 17:03:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(284, '2019-03-25 17:03:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(285, '2019-03-25 17:03:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(286, '2019-03-25 17:03:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(287, '2019-03-25 17:03:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(288, '2019-03-25 17:03:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(289, '2019-03-25 17:03:54', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(290, '2019-03-25 17:04:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(291, '2019-03-25 17:04:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(292, '2019-03-25 17:04:54', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(293, '2019-03-25 17:06:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(294, '2019-03-25 17:06:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(295, '2019-03-25 17:06:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(296, '2019-03-25 17:06:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(297, '2019-03-25 17:06:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(298, '2019-03-25 17:06:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(299, '2019-03-25 17:06:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(300, '2019-03-25 17:06:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(301, '2019-03-25 17:06:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(302, '2019-03-25 17:06:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(303, '2019-03-25 17:06:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(304, '2019-03-25 17:08:40', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(305, '2019-03-25 17:23:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(306, '2019-03-25 17:24:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(307, '2019-03-25 17:33:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(308, '2019-03-25 17:33:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(309, '2019-03-25 17:33:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(310, '2019-03-25 17:33:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(311, '2019-03-25 17:33:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(312, '2019-03-25 17:33:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(313, '2019-03-25 17:33:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(314, '2019-03-25 17:33:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(315, '2019-03-25 17:33:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(316, '2019-03-25 17:33:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(317, '2019-03-25 17:34:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(318, '2019-03-25 17:34:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(319, '2019-03-25 17:34:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(320, '2019-03-25 17:34:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(321, '2019-03-25 17:34:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(322, '2019-03-25 17:34:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(323, '2019-03-25 17:34:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(324, '2019-03-25 17:34:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(325, '2019-03-25 17:34:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(326, '2019-03-25 17:39:48', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(327, '2019-03-25 17:58:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(328, '2019-03-25 17:58:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(329, '2019-03-25 18:00:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(330, '2019-03-25 18:01:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(331, '2019-03-25 18:01:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(332, '2019-03-25 18:02:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(333, '2019-03-25 18:02:40', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(334, '2019-03-25 18:02:56', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(335, '2019-03-25 18:03:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(336, '2019-03-25 18:03:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(337, '2019-03-25 18:03:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(338, '2019-03-25 18:03:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(339, '2019-03-25 18:04:02', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(340, '2019-03-25 18:04:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(341, '2019-03-25 18:04:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(342, '0000-00-00 00:00:00', 'true', 1),
(343, '2019-03-27 08:51:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(344, '2019-03-27 08:51:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(345, '2019-03-27 08:52:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(346, '2019-03-27 08:53:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(347, '2019-03-27 08:57:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(348, '2019-03-27 08:57:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(349, '2019-03-27 08:58:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(350, '2019-03-27 09:00:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(351, '2019-03-27 09:00:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(352, '2019-03-27 09:08:03', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(353, '2019-03-27 09:08:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(354, '2019-03-27 09:08:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(355, '2019-03-27 09:09:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(356, '2019-03-27 09:09:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(357, '2019-03-27 09:09:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(358, '2019-03-27 09:09:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(359, '2019-03-27 09:13:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(360, '2019-03-27 09:14:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(361, '2019-03-27 09:14:13', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(362, '2019-03-27 09:15:46', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(363, '2019-03-27 09:17:34', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(364, '2019-03-27 09:17:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(365, '2019-03-27 09:17:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(366, '2019-03-27 09:17:40', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(367, '2019-03-27 09:17:43', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(368, '2019-03-27 10:11:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(369, '2019-03-27 10:11:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(370, '2019-03-27 10:13:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(371, '2019-03-27 10:13:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(372, '2019-03-27 10:14:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(373, '2019-03-27 10:15:36', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(374, '2019-03-27 10:15:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(375, '2019-03-27 10:16:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(376, '2019-03-27 10:16:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(377, '2019-03-27 10:16:21', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(378, '2019-03-27 10:17:07', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(379, '2019-03-27 10:24:25', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(380, '2019-03-27 10:26:17', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(381, '2019-03-27 10:26:24', 'EDIT USER (root1) BY ():  user => root( id = 1) ; result => true', 1),
(382, '2019-03-27 10:26:24', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(383, '2019-03-27 10:27:38', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(384, '2019-03-27 10:27:41', 'EDIT USER (root1) BY ():  user => root( id = 1) ; result => true', 1),
(385, '2019-03-27 10:27:41', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(386, '2019-03-27 10:27:47', 'EDIT USER (root1) BY ():  user => root( id = 1) ; result => true', 1),
(387, '2019-03-27 10:27:47', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(388, '2019-03-27 10:27:56', 'EDIT USER (root1) BY ():  user => root( id = 1) ; result => true', 1),
(389, '2019-03-27 10:27:56', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(390, '2019-03-27 10:28:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(391, '2019-03-27 10:28:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(392, '2019-03-27 10:31:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(393, '2019-03-27 10:31:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(394, '2019-03-27 10:32:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(395, '2019-03-27 10:34:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(396, '2019-03-27 10:35:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(397, '2019-03-27 10:35:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(398, '2019-03-27 10:36:06', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(399, '2019-03-27 10:37:47', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(400, '2019-03-27 10:38:54', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(401, '2019-03-27 10:38:58', 'EDIT USER (root1) BY ():  user => root( id = 1) ; result => true', 1),
(402, '2019-03-27 10:38:58', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(403, '2019-03-27 10:40:23', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(404, '2019-03-27 10:40:34', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(405, '2019-03-27 10:41:14', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(406, '2019-03-27 10:41:20', 'EDIT USER (root1) BY ():  user => root( id = 1) ; result => true', 1),
(407, '2019-03-27 10:41:20', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(408, '2019-03-27 10:41:25', 'EDIT USER (root1) BY ():  user => root( id = 1) ; result => true', 1),
(409, '2019-03-27 10:41:25', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(410, '2019-03-27 10:41:55', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(411, '2019-03-27 10:42:06', 'EDIT USER (root1) BY ():  user => root( id = 1) ; result => true', 1),
(412, '2019-03-27 10:42:06', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(413, '2019-03-27 10:43:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(414, '2019-03-27 10:44:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(415, '2019-03-27 10:44:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(416, '2019-03-27 10:44:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(417, '0000-00-00 00:00:00', 'true', 1),
(418, '2019-03-27 15:02:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(419, '2019-03-27 15:02:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(420, '2019-03-27 15:09:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(421, '2019-03-27 15:15:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(422, '2019-03-27 15:15:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(423, '2019-03-27 15:15:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(424, '2019-03-27 15:16:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(425, '2019-03-27 15:16:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(426, '2019-03-27 15:18:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(427, '2019-03-27 15:18:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(428, '2019-03-27 15:18:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(429, '2019-03-27 15:18:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(430, '2019-03-27 15:18:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(431, '2019-03-27 15:18:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(432, '2019-03-27 15:18:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(433, '2019-03-27 15:18:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(434, '2019-03-27 15:18:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(435, '2019-03-27 15:18:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(436, '2019-03-27 15:18:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(437, '2019-03-27 15:18:59', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(438, '2019-03-27 15:19:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(439, '2019-03-27 15:21:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(440, '2019-03-27 15:21:48', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(441, '2019-03-27 15:23:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(442, '2019-03-27 15:23:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(443, '2019-03-27 15:23:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(444, '2019-03-27 15:23:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(445, '2019-03-27 15:23:40', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(446, '2019-03-27 15:23:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(447, '2019-03-27 15:24:05', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(448, '2019-03-27 15:24:11', 'EDIT USER (root1) BY ():  user => root( id = 1) ; result => true', 1),
(449, '2019-03-27 15:24:12', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(450, '2019-03-27 15:24:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(451, '2019-03-27 15:24:59', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(452, '2019-03-27 15:25:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(453, '2019-03-27 15:25:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(454, '2019-03-27 15:25:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(455, '2019-03-27 15:26:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(456, '2019-03-27 15:26:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(457, '2019-03-27 15:26:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(458, '2019-03-27 15:26:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(459, '2019-03-27 15:31:08', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(460, '0000-00-00 00:00:00', 'true', 1),
(461, '2019-03-28 01:59:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(462, '2019-03-28 02:00:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(463, '2019-03-28 02:00:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(464, '2019-03-28 02:00:35', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(465, '2019-03-28 02:01:01', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(466, '2019-03-28 02:01:04', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(467, '2019-03-28 02:02:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(468, '2019-03-28 02:02:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(469, '2019-03-28 02:02:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(470, '2019-03-28 02:07:40', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(471, '2019-03-28 02:12:06', 'a person REGISTER in system ; result =>false', 0),
(472, '2019-03-28 02:25:37', 'a person REGISTER in system ; result =>false', 0),
(473, '2019-03-28 02:28:31', 'a person REGISTER in system ; result =>false', 0),
(474, '2019-03-28 02:30:36', 'a person REGISTER in system ; result =>false', 0),
(475, '2019-03-28 02:38:43', 'a person REGISTER in system ; result =>false', 0),
(476, '2019-03-28 02:38:58', 'a person REGISTER in system ; result =>false', 0),
(477, '2019-03-28 02:41:30', 'a person REGISTER in system ; result =>false', 0),
(478, '2019-03-28 02:41:32', 'a person REGISTER in system ; result =>false', 0),
(479, '2019-03-28 02:41:33', 'a person REGISTER in system ; result =>false', 0),
(480, '2019-03-28 02:41:34', 'a person REGISTER in system ; result =>false', 0),
(481, '2019-03-28 02:41:35', 'a person REGISTER in system ; result =>false', 0),
(482, '2019-03-28 02:49:24', 'a person REGISTER in system ; result =>false', 0),
(483, '2019-03-28 03:23:23', 'a person REGISTER in system ; result =>false', 0),
(484, '2019-03-28 03:24:01', 'a person REGISTER in system ; result =>false', 0),
(485, '2019-03-28 03:24:02', 'a person REGISTER in system ; result =>false', 0),
(486, '2019-03-28 03:25:13', 'a person REGISTER in system ; result =>false', 0),
(487, '2019-03-28 03:25:21', 'a person REGISTER in system ; result =>false', 0),
(488, '2019-03-28 03:25:41', 'a person REGISTER in system ; result =>false', 0),
(489, '2019-03-28 03:25:46', 'a person REGISTER in system ; result =>false', 0),
(490, '2019-03-28 03:25:53', 'a person REGISTER in system ; result =>false', 0),
(491, '2019-03-28 03:34:25', 'a person REGISTER in system ; result =>false', 0),
(492, '2019-03-28 03:36:06', 'a person REGISTER in system ; result =>false', 0),
(493, '2019-03-28 03:36:18', 'a person REGISTER in system ; result =>false; username sudah di gunakan, gunakan username lain', 0),
(494, '2019-03-28 03:36:18', 'a person REGISTER in system ; result =>false', 0),
(495, '2019-03-28 03:37:06', 'a person REGISTER in system ; result =>false', 0),
(496, '2019-03-28 03:38:04', 'a person REGISTER in system ; result =>false', 0),
(497, '2019-03-28 03:38:38', 'a person REGISTER in system ; result =>false', 0),
(498, '2019-03-28 03:38:40', 'a person REGISTER in system ; result =>false', 0),
(499, '2019-03-28 03:38:50', 'a person REGISTER in system ; result =>false', 0),
(500, '0000-00-00 00:00:00', 'true', 1),
(501, '2019-03-28 03:38:54', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(502, '2019-03-28 03:38:57', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(503, '2019-03-28 03:46:22', 'a person REGISTER in system ; result =>false', 0),
(504, '2019-03-28 03:46:34', 'a person REGISTER in system ; result =>false', 0),
(505, '2019-03-28 03:46:40', 'a person REGISTER in system ; result =>false', 0),
(506, '2019-03-28 03:46:45', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(507, '2019-03-28 03:47:32', 'a person REGISTER in system ; result =>false', 0),
(508, '2019-03-28 03:47:40', 'a person REGISTER in system ; result =>false', 0),
(509, '2019-03-28 03:48:05', 'a person REGISTER in system ; result =>false', 0),
(510, '2019-03-28 03:48:15', 'a person REGISTER in system ; result =>false', 0),
(511, '2019-03-28 03:48:42', 'a person REGISTER in system ; result =>false', 0),
(512, '2019-03-28 03:48:50', 'a person REGISTER in system ; result =>false', 0),
(513, '2019-03-28 03:49:50', 'a person REGISTER in system ; result =>false', 0),
(514, '2019-03-28 03:49:58', 'a person REGISTER in system ; result =>false', 0),
(515, '2019-03-28 03:51:47', 'a person REGISTER in system ; result =>false; username sudah di gunakan, gunakan username lain', 0),
(516, '2019-03-28 03:51:47', 'a person REGISTER in system ; result =>false', 0),
(517, '2019-03-28 03:52:13', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(518, '2019-03-28 03:52:15', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(519, '2019-03-28 03:54:59', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(520, '2019-03-28 03:56:13', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(521, '2019-03-28 03:56:31', 'a person REGISTER in system ; result =>false', 0),
(522, '2019-03-28 03:56:40', 'a person REGISTER in system ; result =>true', 0),
(523, '0000-00-00 00:00:00', 'true', 5),
(524, '2019-03-28 03:56:47', 'HOMEPAGE :  user => root123( id = 5) ; result => true', 5),
(525, '2019-03-28 03:59:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(526, '2019-03-28 03:59:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(527, '2019-03-28 04:00:40', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(528, '2019-03-28 04:04:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(529, '2019-03-28 04:05:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(530, '2019-03-28 04:05:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(531, '2019-03-28 04:05:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(532, '2019-03-28 04:05:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(533, '2019-03-28 04:06:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(534, '2019-03-28 04:06:06', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(535, '0000-00-00 00:00:00', 'true', 1),
(536, '0000-00-00 00:00:00', 'true', 1),
(537, '0000-00-00 00:00:00', 'true', 1),
(538, '0000-00-00 00:00:00', 'true', 1),
(539, '0000-00-00 00:00:00', 'true', 1),
(540, '2019-03-28 04:06:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(541, '0000-00-00 00:00:00', 'true', 1),
(542, '2019-03-28 04:07:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(543, '2019-03-28 04:09:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(544, '2019-03-28 04:11:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(545, '2019-03-28 04:11:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(546, '2019-03-28 04:12:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(547, '2019-03-28 04:12:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(548, '2019-03-28 04:12:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(549, '2019-03-28 04:13:40', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(550, '2019-03-28 04:13:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(551, '2019-03-28 04:13:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(552, '2019-03-28 04:13:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(553, '2019-03-28 04:13:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(554, '2019-03-28 04:13:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(555, '2019-03-28 04:14:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(556, '2019-03-28 04:14:18', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(557, '2019-03-28 04:14:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(558, '2019-03-28 04:15:36', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(559, '2019-03-28 04:17:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(560, '2019-03-28 04:17:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(561, '2019-03-28 04:17:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(562, '2019-03-28 04:17:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(563, '2019-03-28 04:17:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(564, '2019-03-28 04:17:46', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(565, '2019-03-28 04:17:50', 'EDIT USER (root1) BY ():  user => root( id = 1) ; result => true', 1),
(566, '2019-03-28 04:17:50', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(567, '2019-03-28 04:17:54', 'EDIT USER (root1) BY ():  user => root( id = 1) ; result => true', 1),
(568, '2019-03-28 04:17:54', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(569, '2019-03-28 04:17:56', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(570, '2019-03-28 04:18:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(571, '2019-03-28 04:22:40', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(572, '0000-00-00 00:00:00', 'true', 1),
(573, '2019-03-28 04:22:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(574, '2019-03-28 04:22:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(575, '2019-03-28 04:23:42', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(576, '2019-03-28 04:23:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(577, '2019-03-28 04:23:48', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(578, '0000-00-00 00:00:00', 'true', 1),
(579, '2019-03-28 04:27:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(580, '2019-03-28 04:27:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(581, '2019-03-28 04:28:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(582, '2019-03-28 04:28:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(583, '2019-03-28 04:31:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(584, '2019-03-28 04:31:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(585, '2019-03-28 04:31:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(586, '2019-03-28 04:31:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(587, '2019-03-28 04:31:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(588, '2019-03-28 04:31:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(589, '2019-03-28 04:31:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(590, '2019-03-28 04:31:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(591, '2019-03-28 04:31:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(592, '2019-03-28 04:31:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(593, '2019-03-28 04:31:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(594, '2019-03-28 04:31:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(595, '2019-03-28 04:31:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(596, '2019-03-28 04:31:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(597, '2019-03-28 04:31:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(598, '2019-03-28 04:31:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(599, '2019-03-28 04:31:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(600, '2019-03-28 04:31:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(601, '2019-03-28 04:31:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(602, '2019-03-28 04:31:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(603, '2019-03-28 04:31:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(604, '2019-03-28 04:31:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(605, '2019-03-28 04:31:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(606, '2019-03-28 04:31:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(607, '2019-03-28 04:32:04', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(608, '2019-03-28 04:32:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(609, '2019-03-28 04:32:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(610, '2019-03-28 04:34:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(611, '2019-03-28 04:34:07', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(612, '2019-03-28 04:34:31', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(613, '2019-03-28 04:37:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1);
INSERT INTO `log` (`log_id`, `log_datetime`, `log_message`, `user_id`) VALUES
(614, '2019-03-28 04:37:48', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(615, '2019-03-28 04:39:07', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(616, '2019-03-28 04:40:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(617, '2019-03-28 04:40:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(618, '2019-03-28 04:40:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(619, '2019-03-28 04:40:25', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(620, '2019-03-28 04:44:09', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(621, '0000-00-00 00:00:00', 'false =>Username atau password salah!', 0),
(622, '2019-03-28 04:44:29', 'a person REGISTER in system ; result =>false', 0),
(623, '2019-03-28 04:44:38', 'a person REGISTER in system ; result =>true', 0),
(624, '0000-00-00 00:00:00', 'true', 6),
(625, '2019-03-28 04:44:55', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(626, '0000-00-00 00:00:00', 'true', 6),
(627, '2019-03-28 04:45:39', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(628, '0000-00-00 00:00:00', 'true', 1),
(629, '2019-03-28 04:45:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(630, '2019-03-28 04:45:51', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(631, '2019-03-28 04:46:02', 'EDIT USER (root123) BY ():  user => root( id = 1) ; result => true', 1),
(632, '2019-03-28 04:46:02', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(633, '0000-00-00 00:00:00', 'true', 6),
(634, '2019-03-28 04:46:27', 'HOMEPAGE :  user => root123( id = 6) ; result => true', 6),
(635, '2019-03-28 04:47:58', 'HOMEPAGE :  user => root123( id = 6) ; result => true', 6),
(636, '2019-03-28 04:59:24', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(637, '2019-03-28 04:59:40', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(638, '0000-00-00 00:00:00', 'true', 1),
(639, '0000-00-00 00:00:00', 'true', 6),
(640, '2019-03-28 12:57:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(641, '2019-03-28 12:57:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(642, '2019-03-28 12:57:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(643, '2019-03-28 12:58:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(644, '2019-03-28 12:58:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(645, '2019-03-28 12:58:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(646, '2019-03-28 12:58:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(647, '2019-03-28 12:58:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(648, '2019-03-28 12:58:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(649, '2019-03-28 12:58:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(650, '2019-03-28 12:58:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(651, '2019-03-28 12:58:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(652, '2019-03-28 12:58:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(653, '2019-03-28 12:58:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(654, '2019-03-28 12:58:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(655, '2019-03-28 12:58:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(656, '2019-03-28 12:58:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(657, '2019-03-28 12:58:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(658, '2019-03-28 12:58:40', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(659, '2019-03-28 12:58:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(660, '2019-03-28 12:58:42', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(661, '2019-03-28 12:58:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(662, '2019-03-28 12:58:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(663, '2019-03-28 12:58:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(664, '2019-03-28 12:58:48', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(665, '2019-03-28 12:58:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(666, '2019-03-28 12:59:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(667, '2019-03-28 13:01:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(668, '2019-03-28 13:01:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(669, '2019-03-28 13:02:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(670, '2019-03-28 13:02:20', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(671, '2019-03-28 15:57:15', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(672, '0000-00-00 00:00:00', 'true', 6),
(673, '0000-00-00 00:00:00', 'true', 1),
(674, '2019-03-28 18:11:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(675, '2019-03-28 18:13:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(676, '0000-00-00 00:00:00', 'true', 1),
(677, '2019-03-29 04:14:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(678, '0000-00-00 00:00:00', 'true', 6),
(679, '0000-00-00 00:00:00', 'false =>Username atau password salah!', 0),
(680, '2019-03-29 04:33:44', 'a person REGISTER in system ; result =>false', 0),
(681, '0000-00-00 00:00:00', 'true', 1),
(682, '2019-03-29 06:41:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(683, '2019-03-29 06:41:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(684, '2019-03-29 06:41:29', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(685, '2019-03-29 06:45:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(686, '2019-03-29 06:45:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(687, '2019-03-29 06:45:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(688, '2019-03-29 06:45:40', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(689, '2019-03-29 06:45:42', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(690, '2019-03-29 06:45:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(691, '2019-03-29 06:45:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(692, '2019-03-29 06:45:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(693, '2019-03-29 06:45:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(694, '2019-03-29 06:45:48', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(695, '2019-03-29 06:45:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(696, '2019-03-29 06:45:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(697, '2019-03-29 06:46:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(698, '2019-03-29 06:46:59', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(699, '2019-03-29 06:47:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(700, '2019-03-29 06:47:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(701, '2019-03-29 06:47:47', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(702, '2019-03-29 06:48:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(703, '2019-03-29 06:48:47', 'LOGOUT  user => root123( id = 6) ; result => true', 6),
(704, '2019-03-29 06:48:50', 'a person REGISTER in system ; result =>false', 0),
(705, '2019-03-29 06:49:06', 'a person REGISTER in system ; result =>true', 0),
(706, '2019-03-29 06:49:19', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(707, '0000-00-00 00:00:00', 'true', 7),
(708, '2019-03-29 06:51:09', 'LOGOUT  user => aku123( id = 7) ; result => true', 7),
(709, '2019-03-29 06:51:12', 'a person REGISTER in system ; result =>false', 0),
(710, '0000-00-00 00:00:00', 'true', 7),
(711, '2019-03-29 06:56:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(712, '2019-03-29 06:56:10', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(713, '2019-03-29 07:02:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(714, '2019-03-29 07:02:44', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(715, '0000-00-00 00:00:00', 'true', 1),
(716, '2019-03-29 07:06:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(717, '2019-03-29 07:06:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(718, '2019-03-29 07:07:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(719, '2019-03-29 07:07:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(720, '2019-03-29 07:09:05', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(721, '2019-03-29 07:11:26', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(722, '0000-00-00 00:00:00', 'true', 7),
(723, '2019-03-29 07:35:29', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(724, '2019-03-29 07:36:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(725, '0000-00-00 00:00:00', 'true', 1),
(726, '2019-03-29 07:39:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(727, '2019-03-29 07:41:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(728, '0000-00-00 00:00:00', 'true', 1),
(729, '2019-03-29 07:46:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(730, '0000-00-00 00:00:00', 'true', 1),
(731, '2019-03-29 07:46:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(732, '0000-00-00 00:00:00', 'false =>Username atau password salah!', 0),
(733, '0000-00-00 00:00:00', 'true', 7),
(734, '0000-00-00 00:00:00', 'true', 1),
(735, '2019-03-29 07:50:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(736, '0000-00-00 00:00:00', 'true', 7),
(737, '0000-00-00 00:00:00', 'true', 1),
(738, '2019-03-29 09:06:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(739, '2019-03-29 09:06:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(740, '0000-00-00 00:00:00', 'true', 7),
(741, '0000-00-00 00:00:00', 'true', 1),
(742, '2019-03-29 11:47:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(743, '2019-03-29 11:47:28', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(744, '0000-00-00 00:00:00', 'true', 1),
(745, '2019-03-29 12:04:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(746, '2019-03-29 12:04:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(747, '2019-03-29 12:04:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(748, '2019-03-29 12:05:36', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(749, '2019-03-29 12:05:46', 'EDIT USER (1553856968) BY ():  user => root( id = 1) ; result => true', 1),
(750, '2019-03-29 12:05:47', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(751, '2019-03-29 12:05:51', 'EDIT USER (1553856968) BY ():  user => root( id = 1) ; result => true', 1),
(752, '2019-03-29 12:05:51', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(753, '2019-03-29 12:05:56', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(754, '2019-03-29 12:05:59', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(755, '2019-03-29 12:06:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(756, '0000-00-00 00:00:00', 'true', 1),
(757, '2019-03-29 14:36:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(758, '2019-03-29 14:36:52', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(759, '2019-03-29 14:40:02', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(760, '2019-03-29 14:40:05', 'DELETE USER (1553856968) BY ():  user => root( id = 1) ; result => true', 1),
(761, '2019-03-29 14:40:05', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(762, '2019-03-29 14:44:35', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(763, '2019-03-29 14:51:21', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(764, '2019-03-29 14:51:23', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(765, '2019-03-29 14:52:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(766, '2019-03-29 14:53:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(767, '2019-03-29 14:53:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(768, '2019-03-29 14:56:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(769, '2019-03-29 14:57:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(770, '2019-03-29 14:57:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(771, '2019-03-29 14:59:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(772, '0000-00-00 00:00:00', 'false =>Username atau password salah!', 0),
(773, '2019-03-29 15:00:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(774, '2019-03-29 15:01:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(775, '2019-03-29 15:02:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(776, '2019-03-29 15:07:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(777, '2019-03-29 15:08:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(778, '2019-03-29 15:08:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(779, '2019-03-29 15:08:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(780, '2019-03-29 15:09:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(781, '2019-03-29 15:09:48', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(782, '2019-03-29 15:09:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(783, '2019-03-29 15:13:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(784, '2019-03-29 15:13:49', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(785, '2019-03-29 15:13:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(786, '2019-03-29 15:22:54', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(787, '2019-03-29 15:23:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(788, '2019-03-29 15:26:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(789, '2019-03-29 15:26:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(790, '2019-03-29 15:26:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(791, '2019-03-29 15:29:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(792, '2019-03-29 15:29:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(793, '2019-03-29 15:29:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(794, '2019-03-29 15:30:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(795, '2019-03-29 15:31:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(796, '2019-03-29 15:32:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(797, '2019-03-29 17:16:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(798, '2019-03-29 17:16:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(799, '2019-03-29 17:16:22', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(800, '2019-03-29 17:16:25', 'DELETE USER (1553867350) BY ():  user => root( id = 1) ; result => true', 1),
(801, '2019-03-29 17:16:25', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(802, '2019-03-29 17:16:28', 'DELETE USER (1553867431) BY ():  user => root( id = 1) ; result => true', 1),
(803, '2019-03-29 17:16:28', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(804, '2019-03-29 17:16:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(805, '2019-03-29 17:16:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(806, '2019-03-29 17:16:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(807, '2019-03-29 17:18:03', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(808, '2019-03-29 17:18:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(809, '2019-03-29 17:18:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(810, '2019-03-29 17:35:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(811, '2019-03-29 17:35:57', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(812, '2019-03-29 17:36:00', 'DELETE USER (1553867051) BY ():  user => root( id = 1) ; result => true', 1),
(813, '2019-03-29 17:36:00', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(814, '2019-03-29 17:36:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(815, '2019-03-29 17:36:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(816, '2019-03-29 17:40:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(817, '2019-03-29 17:41:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(818, '2019-03-29 17:45:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(819, '2019-03-29 17:45:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(820, '2019-03-29 17:45:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(821, '2019-03-29 17:45:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(822, '2019-03-29 17:45:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(823, '2019-03-29 17:46:03', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(824, '2019-03-29 17:46:17', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(825, '2019-03-29 17:46:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(826, '2019-03-29 17:47:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(827, '2019-03-29 17:49:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(828, '2019-03-29 17:49:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(829, '2019-03-29 17:51:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(830, '2019-03-29 17:52:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(831, '2019-03-29 17:52:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(832, '2019-03-29 17:55:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(833, '2019-03-29 17:56:59', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(834, '2019-03-29 17:57:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(835, '2019-03-29 17:58:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(836, '2019-03-29 17:58:56', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(837, '2019-03-29 17:59:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(838, '2019-03-29 17:59:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(839, '2019-03-29 17:59:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(840, '2019-03-29 17:59:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(841, '2019-03-29 17:59:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(842, '2019-03-29 17:59:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(843, '2019-03-29 18:01:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(844, '2019-03-29 18:02:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(845, '2019-03-29 18:03:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(846, '2019-03-29 18:03:59', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(847, '2019-03-29 18:04:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(848, '2019-03-29 18:06:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(849, '2019-03-29 18:06:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(850, '2019-03-29 18:06:40', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(851, '2019-03-29 18:06:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(852, '2019-03-29 18:07:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(853, '2019-03-29 18:07:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(854, '2019-03-29 18:07:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(855, '2019-03-29 18:08:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(856, '2019-03-29 18:08:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(857, '2019-03-29 18:08:40', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(858, '2019-03-29 18:09:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(859, '2019-03-29 18:10:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(860, '2019-03-29 18:10:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(861, '2019-03-29 18:11:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(862, '2019-03-29 18:11:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(863, '0000-00-00 00:00:00', 'true', 1),
(864, '2019-03-30 03:32:56', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(865, '2019-03-30 03:33:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(866, '2019-03-30 03:35:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(867, '2019-03-30 03:42:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(868, '0000-00-00 00:00:00', 'true', 1),
(869, '2019-03-30 04:00:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(870, '2019-03-30 04:00:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(871, '2019-03-30 04:03:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(872, '2019-03-30 04:03:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(873, '2019-03-30 04:09:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(874, '2019-03-30 04:09:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(875, '2019-03-30 04:12:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(876, '2019-03-30 04:15:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(877, '2019-03-30 04:17:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(878, '2019-03-30 04:34:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(879, '2019-03-30 04:34:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(880, '2019-03-30 04:34:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(881, '2019-03-30 04:40:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(882, '2019-03-30 04:40:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(883, '2019-03-30 04:40:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(884, '2019-03-30 04:43:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(885, '2019-03-30 04:43:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(886, '2019-03-30 04:43:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(887, '2019-03-30 04:53:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(888, '2019-03-30 04:53:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(889, '2019-03-30 05:01:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(890, '2019-03-30 05:01:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(891, '2019-03-30 05:07:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(892, '2019-03-30 05:47:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(893, '2019-03-30 05:50:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(894, '2019-03-30 05:50:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(895, '2019-03-30 05:53:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(896, '2019-03-30 05:53:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(897, '2019-03-30 05:53:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(898, '2019-03-30 05:53:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(899, '2019-03-30 05:56:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(900, '2019-03-30 06:05:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(901, '2019-03-30 06:05:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(902, '2019-03-30 06:05:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(903, '2019-03-30 06:38:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(904, '2019-03-30 06:38:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(905, '0000-00-00 00:00:00', 'true', 1),
(906, '2019-03-30 15:19:48', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(907, '2019-03-30 15:19:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(908, '2019-03-30 15:26:42', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(909, '2019-03-30 16:31:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(910, '2019-03-30 16:33:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(911, '2019-03-30 16:33:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(912, '2019-03-30 16:33:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(913, '2019-03-30 16:34:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(914, '2019-03-30 16:34:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(915, '2019-03-30 16:35:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(916, '2019-03-30 16:38:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(917, '2019-03-30 16:43:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(918, '2019-03-30 16:43:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(919, '2019-03-30 16:43:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(920, '2019-03-30 16:44:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(921, '2019-03-30 16:44:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(922, '2019-03-30 16:47:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(923, '2019-03-30 16:47:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(924, '2019-03-30 16:47:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(925, '0000-00-00 00:00:00', 'true', 1),
(926, '2019-03-30 16:49:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(927, '2019-03-30 16:49:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(928, '2019-03-30 16:49:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(929, '2019-03-30 17:04:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(930, '0000-00-00 00:00:00', 'true', 1),
(931, '2019-03-30 21:26:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(932, '2019-03-30 21:26:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(933, '2019-03-30 21:26:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(934, '2019-03-30 21:29:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(935, '2019-03-30 22:38:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(936, '2019-03-30 22:39:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(937, '2019-03-30 22:39:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(938, '2019-03-30 22:47:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(939, '2019-03-30 22:48:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(940, '2019-03-30 22:48:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(941, '2019-03-30 22:48:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(942, '2019-03-30 22:50:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(943, '2019-03-30 22:50:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(944, '2019-03-30 22:50:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(945, '2019-03-30 22:53:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(946, '2019-03-30 22:53:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(947, '2019-03-30 23:00:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(948, '2019-03-30 23:00:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(949, '2019-03-30 23:06:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(950, '2019-03-30 23:06:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(951, '2019-03-30 23:09:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(952, '2019-03-30 23:09:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(953, '2019-03-30 23:10:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(954, '2019-03-30 23:10:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(955, '2019-03-30 23:11:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(956, '2019-03-30 23:11:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(957, '2019-03-30 23:12:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(958, '2019-03-30 23:13:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(959, '2019-03-30 23:13:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(960, '2019-03-30 23:14:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(961, '2019-03-30 23:14:54', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(962, '2019-03-30 23:14:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(963, '2019-03-30 23:15:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(964, '2019-03-30 23:15:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(965, '2019-03-30 23:15:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(966, '2019-03-30 23:15:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(967, '2019-03-30 23:15:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(968, '2019-03-30 23:15:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(969, '2019-03-30 23:15:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(970, '2019-03-30 23:16:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(971, '2019-03-30 23:16:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(972, '2019-03-30 23:16:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(973, '2019-03-30 23:16:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(974, '2019-03-30 23:16:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(975, '2019-03-30 23:17:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(976, '2019-03-30 23:17:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(977, '2019-03-30 23:17:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(978, '2019-03-30 23:18:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(979, '2019-03-30 23:20:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(980, '2019-03-30 23:20:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(981, '2019-03-30 23:20:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(982, '2019-03-30 23:22:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(983, '2019-03-30 23:25:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(984, '2019-03-30 23:25:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(985, '2019-03-30 23:26:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(986, '2019-03-30 23:28:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(987, '2019-03-30 23:28:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(988, '2019-03-30 23:28:40', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(989, '2019-03-30 23:28:42', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(990, '2019-03-30 23:31:54', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(991, '2019-03-30 23:31:56', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(992, '2019-03-30 23:32:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(993, '2019-03-30 23:32:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(994, '2019-03-30 23:32:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(995, '2019-03-30 23:32:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(996, '2019-03-30 23:32:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(997, '2019-03-30 23:35:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(998, '2019-03-30 23:35:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(999, '2019-03-30 23:36:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1000, '2019-03-30 23:37:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1001, '2019-03-30 23:38:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1002, '2019-03-30 23:39:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1003, '2019-03-30 23:39:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1004, '2019-03-30 23:45:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1005, '2019-03-30 23:45:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1006, '2019-03-30 23:45:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1007, '2019-03-30 23:46:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1008, '2019-03-30 23:50:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1009, '2019-03-30 23:50:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1010, '2019-03-30 23:54:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1011, '2019-03-30 23:54:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1012, '2019-03-30 23:54:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1013, '2019-03-30 23:57:03', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1014, '2019-03-30 23:57:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1015, '2019-03-30 23:59:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1016, '2019-03-30 23:59:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(1017, '2019-03-30 23:59:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(200) NOT NULL,
  `store_address` text NOT NULL,
  `store_description` text NOT NULL,
  `store_images` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `store_latitude` text NOT NULL,
  `store_langitude` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `store_address`, `store_description`, `store_images`, `user_id`, `create_date`, `store_latitude`, `store_langitude`) VALUES
(4, 'Alan developer corp', 'jln mutiara', 'developer perumahan', '1552355828-images (5).jpg', 1, '2019-03-12', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `store_item`
--

CREATE TABLE `store_item` (
  `store_item_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` smallint(6) NOT NULL,
  `user_username` varchar(200) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_level` int(5) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_status`, `user_level`, `create_date`) VALUES
(1, 'root', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '0000-00-00'),
(15, '1553877903', 'b05c36c5e472fe56c4000b83b5c06a49', 1, 2, '2019-03-29'),
(16, '1553986613', '49845effe0c14aa9fdda28399895ac81', 1, 2, '2019-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_id` int(10) NOT NULL,
  `user_profile_fullname` varchar(200) NOT NULL,
  `user_profile_address` text NOT NULL,
  `user_profile_image_path` text NOT NULL,
  `user_profile_email` varchar(200) NOT NULL,
  `user_profile_phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `user_profile_fullname`, `user_profile_address`, `user_profile_image_path`, `user_profile_email`, `user_profile_phone`) VALUES
(1, 'muhammad alfalah', 'jalan mutiara', '1553087818-WhatsApp Image 2019-03-01 at 13.44.17.jpeg', 'alan@gmail.com', '081342989185'),
(15, 'muh alfalah madukubah', 'jalan mutiara', '', '', '081342989185'),
(16, 'aku', 'jalanan', '', '', '123443211234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`advertise_id`);

--
-- Indexes for table `data_testing`
--
ALTER TABLE `data_testing`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `data_testing_normalized`
--
ALTER TABLE `data_testing_normalized`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `data_uji`
--
ALTER TABLE `data_uji`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `data_uji_normalized`
--
ALTER TABLE `data_uji_normalized`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `store_item`
--
ALTER TABLE `store_item`
  ADD PRIMARY KEY (`store_item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
  MODIFY `advertise_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_testing`
--
ALTER TABLE `data_testing`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `data_testing_normalized`
--
ALTER TABLE `data_testing_normalized`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `data_uji`
--
ALTER TABLE `data_uji`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_uji_normalized`
--
ALTER TABLE `data_uji_normalized`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1018;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store_item`
--
ALTER TABLE `store_item`
  MODIFY `store_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
