-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 06:23 AM
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
-- Database: `db_coternak`
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
(1, '2019-02-08-07-41-16download.png', 'asdf', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_description` text NOT NULL,
  `category_order` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_order`) VALUES
(0, 'coternak', 'coternak', 0),
(3, 'Sapi', 'Sapi', 0),
(5, 'kambing', 'kambing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_relation`
--

CREATE TABLE `category_relation` (
  `category_relation_id` int(11) NOT NULL,
  `category_relation_parent` int(11) NOT NULL,
  `category_relation_child` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_relation`
--

INSERT INTO `category_relation` (`category_relation_id`, `category_relation_parent`, `category_relation_child`) VALUES
(8, 0, 3),
(10, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `item_images` text NOT NULL,
  `item_ages` varchar(200) NOT NULL,
  `item_weight` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_description`, `category_id`, `store_id`, `create_date`, `item_images`, `item_ages`, `item_weight`) VALUES
(5, 'sapi yuhu', 10000000, 'sapi yuhu', 3, 3, '2019-02-19', '1550554246-ternak-0-.jpg', '10', '500'),
(6, 'sapi super', 12000000, 'sapi super', 3, 3, '2019-02-19', '1550554535-ternak-0-.jpg', '12', '600'),
(7, 'kambing gud', 1400000, 'kambing gud', 5, 3, '2019-02-19', '1550554752-ternak-0-.jpg', '5', '30'),
(8, 'kambing yuhu', 1300000, 'kambing yuhu', 5, 3, '2019-02-19', '1550554783-ternak-0-.jpg', '5', '40'),
(9, 'kambing super', 1400000, 'kambing super', 5, 3, '2019-02-19', '1550554831-ternak-0-.jpg', '6', '50');

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
(1, '0000-00-00 00:00:00', 'false =>Username atau password salah!', 0),
(2, '0000-00-00 00:00:00', 'false =>Username atau password salah!', 0),
(3, '0000-00-00 00:00:00', 'false =>Username atau password salah!', 0),
(4, '0000-00-00 00:00:00', 'true', 1),
(5, '2019-02-07 10:48:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(6, '2019-02-07 10:49:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(7, '2019-02-07 10:49:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(8, '2019-02-07 10:49:33', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(9, '2019-02-07 10:49:40', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(10, '2019-02-07 10:49:45', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(11, '2019-02-07 10:49:47', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(12, '2019-02-07 10:50:42', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(13, '2019-02-07 10:50:45', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(14, '2019-02-07 10:50:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(15, '2019-02-07 10:51:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(16, '0000-00-00 00:00:00', 'true', 1),
(17, '2019-02-07 16:07:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(18, '2019-02-07 16:07:33', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(19, '2019-02-07 16:07:40', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(20, '2019-02-07 16:07:42', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(21, '2019-02-07 16:08:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(22, '2019-02-07 16:08:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(23, '2019-02-07 16:08:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(24, '2019-02-07 16:09:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(25, '2019-02-07 16:09:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(26, '2019-02-07 16:11:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(27, '2019-02-07 16:12:10', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(28, '0000-00-00 00:00:00', 'true', 1),
(29, '2019-02-08 03:31:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(30, '2019-02-08 04:35:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(31, '2019-02-08 04:35:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(32, '2019-02-08 04:36:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(33, '2019-02-08 04:39:22', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(34, '2019-02-08 04:39:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(35, '2019-02-08 04:42:10', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(36, '2019-02-08 04:44:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(37, '2019-02-08 04:44:50', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(38, '2019-02-08 04:44:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(39, '2019-02-08 04:44:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(40, '2019-02-08 04:47:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(41, '2019-02-08 04:47:59', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(42, '2019-02-08 04:49:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(43, '2019-02-08 04:51:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(44, '2019-02-08 04:53:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(45, '2019-02-08 04:54:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(46, '2019-02-08 04:54:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(47, '2019-02-08 04:55:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(48, '2019-02-08 04:57:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(49, '2019-02-08 04:58:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(50, '2019-02-08 04:59:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(51, '2019-02-08 05:01:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(52, '2019-02-08 05:01:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(53, '2019-02-08 05:01:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(54, '2019-02-08 06:13:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(55, '2019-02-08 06:23:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(56, '2019-02-08 06:23:46', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(57, '2019-02-08 06:23:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(58, '2019-02-08 06:23:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(59, '2019-02-08 06:24:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(60, '2019-02-08 06:24:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(61, '2019-02-08 06:24:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(62, '2019-02-08 06:29:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(63, '2019-02-08 06:29:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(64, '2019-02-08 06:31:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(65, '2019-02-08 06:32:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(66, '2019-02-08 06:37:40', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(67, '2019-02-08 06:37:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(68, '2019-02-08 06:40:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(69, '2019-02-08 06:40:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(70, '2019-02-08 06:40:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(71, '2019-02-08 06:40:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(72, '2019-02-08 06:40:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(73, '2019-02-08 06:40:56', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(74, '2019-02-08 06:41:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(75, '2019-02-08 06:42:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(76, '2019-02-08 06:43:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(77, '2019-02-08 06:43:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(78, '2019-02-08 06:44:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(79, '2019-02-08 07:02:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(80, '2019-02-08 07:03:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(81, '2019-02-08 07:07:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(82, '2019-02-08 07:07:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(83, '2019-02-08 07:07:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(84, '2019-02-08 07:07:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(85, '2019-02-08 07:07:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(86, '2019-02-08 07:09:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(87, '2019-02-08 07:12:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(88, '2019-02-08 07:12:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(89, '2019-02-08 07:13:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(90, '2019-02-08 07:13:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(91, '2019-02-08 07:13:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(92, '2019-02-08 07:14:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(93, '2019-02-08 07:14:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(94, '2019-02-08 07:14:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(95, '2019-02-08 07:14:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(96, '2019-02-08 07:14:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(97, '2019-02-08 07:27:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(98, '2019-02-08 07:27:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(99, '2019-02-08 07:28:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(100, '2019-02-08 07:29:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(101, '2019-02-08 07:29:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(102, '2019-02-08 07:29:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(103, '2019-02-08 07:31:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(104, '2019-02-08 07:31:47', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(105, '2019-02-08 07:31:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(106, '2019-02-08 07:32:40', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(107, '2019-02-08 07:35:14', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(108, '2019-02-08 07:35:24', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(109, '2019-02-08 07:35:58', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(110, '2019-02-08 07:36:59', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(111, '2019-02-08 07:41:16', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(112, '2019-02-08 07:43:01', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(113, '2019-02-08 07:43:58', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(114, '2019-02-08 07:44:54', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(115, '2019-02-08 07:44:59', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(116, '2019-02-08 07:45:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(117, '2019-02-08 07:45:36', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(118, '2019-02-08 07:45:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(119, '2019-02-08 07:46:03', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(120, '2019-02-08 07:46:08', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(121, '2019-02-08 07:46:11', 'a person REGISTER in system ; result =>false', 0),
(122, '2019-02-08 07:49:08', 'a person REGISTER in system ; result =>false', 0),
(123, '2019-02-08 07:49:19', 'a person REGISTER in system ; result =>false; username sudah di gunakan, gunakan username lain', 0),
(124, '2019-02-08 07:49:20', 'a person REGISTER in system ; result =>false', 0),
(125, '2019-02-08 07:51:36', 'a person REGISTER in system ; result =>false', 0),
(126, '2019-02-08 07:51:55', 'a person REGISTER in system ; result =>true', 0),
(127, '0000-00-00 00:00:00', 'true', 1),
(128, '2019-02-08 07:51:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(129, '2019-02-08 07:52:01', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(130, '0000-00-00 00:00:00', 'false =>Username atau password salah!', 0),
(131, '0000-00-00 00:00:00', 'true', 1),
(132, '2019-02-08 07:52:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(133, '2019-02-08 07:52:07', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(134, '2019-02-08 07:52:15', 'EDIT USER (root1) BY ():  user => root( id = 1) ; result => true', 1),
(135, '2019-02-08 07:52:15', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(136, '2019-02-08 07:52:18', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(137, '0000-00-00 00:00:00', 'true', 3),
(138, '2019-02-08 07:52:21', 'HOMEPAGE :  user => root1( id = 3) ; result => true', 3),
(139, '2019-02-08 07:52:24', 'ADD DOCUMENT () :  user => root1( id = 3) ; result => VIEW; ', 3),
(140, '2019-02-08 07:52:26', 'HOMEPAGE :  user => root1( id = 3) ; result => true', 3),
(141, '2019-02-08 07:52:28', 'LOGOUT  user => root1( id = 3) ; result => true', 3),
(142, '0000-00-00 00:00:00', 'true', 1),
(143, '2019-02-08 07:52:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(144, '2019-02-08 07:57:19', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(145, '2019-02-08 08:13:41', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(146, '2019-02-08 08:13:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(147, '0000-00-00 00:00:00', 'true', 1),
(148, '2019-02-09 03:24:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(149, '2019-02-09 03:25:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(150, '2019-02-09 03:26:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(151, '2019-02-09 03:26:44', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(152, '2019-02-09 03:26:46', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(153, '2019-02-09 03:26:48', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(154, '2019-02-09 03:26:51', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(155, '2019-02-09 03:26:52', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(156, '2019-02-09 03:26:53', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(157, '2019-02-09 03:27:07', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(158, '2019-02-09 03:27:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(159, '2019-02-09 03:27:30', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(160, '2019-02-09 03:32:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(161, '2019-02-09 03:32:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(162, '2019-02-09 03:32:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(163, '2019-02-09 03:46:26', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(164, '2019-02-09 03:47:48', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(165, '2019-02-09 04:19:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(166, '0000-00-00 00:00:00', 'true', 1),
(167, '2019-02-09 07:13:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(168, '2019-02-09 07:39:30', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(169, '2019-02-09 07:41:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(170, '2019-02-09 07:42:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(171, '2019-02-09 07:45:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(172, '2019-02-09 07:50:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(173, '2019-02-09 07:51:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(174, '2019-02-09 07:52:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(175, '2019-02-09 07:52:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(176, '2019-02-09 07:53:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(177, '2019-02-09 08:03:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(178, '2019-02-09 08:03:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(179, '2019-02-09 08:04:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(180, '2019-02-09 08:04:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(181, '2019-02-09 08:05:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(182, '2019-02-09 08:06:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(183, '2019-02-09 08:07:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(184, '2019-02-09 08:07:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(185, '2019-02-09 08:07:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(186, '2019-02-09 08:08:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(187, '2019-02-09 08:08:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(188, '2019-02-09 08:08:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(189, '2019-02-09 08:18:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(190, '2019-02-09 08:19:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(191, '2019-02-09 08:19:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(192, '2019-02-09 08:19:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(193, '2019-02-09 08:19:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(194, '2019-02-09 08:20:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(195, '2019-02-09 08:20:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(196, '2019-02-09 08:21:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(197, '2019-02-09 08:21:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(198, '2019-02-09 08:22:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(199, '2019-02-09 08:22:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(200, '2019-02-09 10:03:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(201, '2019-02-09 10:18:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(202, '2019-02-09 10:18:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(203, '2019-02-09 10:18:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(204, '2019-02-09 10:19:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(205, '2019-02-09 10:19:11', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(206, '2019-02-09 10:27:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(207, '2019-02-09 10:27:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(208, '0000-00-00 00:00:00', 'true', 1),
(209, '2019-02-11 15:26:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(210, '2019-02-11 15:27:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(211, '2019-02-11 15:28:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(212, '0000-00-00 00:00:00', 'true', 1),
(213, '2019-02-12 07:56:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(214, '0000-00-00 00:00:00', 'true', 1),
(215, '2019-02-13 02:29:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(216, '0000-00-00 00:00:00', 'true', 1),
(217, '2019-02-13 07:15:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(218, '2019-02-13 07:30:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(219, '2019-02-13 07:31:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(220, '0000-00-00 00:00:00', 'true', 1),
(221, '2019-02-13 13:33:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(222, '2019-02-13 14:08:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(223, '2019-02-13 14:08:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(224, '2019-02-13 14:09:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(225, '2019-02-13 14:20:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(226, '2019-02-13 14:22:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(227, '2019-02-13 14:25:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(228, '2019-02-13 14:26:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(229, '2019-02-13 14:26:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(230, '2019-02-13 14:27:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(231, '2019-02-13 14:28:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(232, '2019-02-13 16:14:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(233, '2019-02-13 17:15:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(234, '0000-00-00 00:00:00', 'true', 1),
(235, '2019-02-15 16:12:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(236, '2019-02-15 16:14:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(237, '2019-02-15 16:21:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(238, '2019-02-15 16:21:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(239, '2019-02-15 16:45:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(240, '2019-02-15 16:46:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(241, '2019-02-15 16:46:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(242, '2019-02-15 16:47:42', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(243, '2019-02-15 16:48:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(244, '2019-02-15 16:48:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(245, '2019-02-15 16:48:48', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(246, '0000-00-00 00:00:00', 'true', 1),
(247, '2019-02-17 15:54:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(248, '2019-02-17 15:54:05', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(249, '0000-00-00 00:00:00', 'true', 1),
(250, '0000-00-00 00:00:00', 'true', 1),
(251, '2019-02-19 06:18:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(252, '2019-02-19 06:18:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(253, '2019-02-19 06:18:48', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(254, '2019-02-19 06:29:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(255, '2019-02-19 06:34:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(256, '2019-02-19 06:35:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(257, '2019-02-19 06:40:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(258, '2019-02-19 06:58:06', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(259, '2019-02-19 06:58:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(260, '0000-00-00 00:00:00', 'true', 1),
(261, '2019-02-25 07:28:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobile`
--

CREATE TABLE `mobile` (
  `mobile_id` int(5) NOT NULL,
  `mobile_version` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile`
--

INSERT INTO `mobile` (`mobile_id`, `mobile_version`) VALUES
(1, 2);

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
(3, 'peternakan Alan', 'jln mutiara no 8', 'perternakan sapi terbaik', '1550554209-images (5).jpg', 1, '2019-02-19', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `store_item`
--

CREATE TABLE `store_item` (
  `store_item_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item`
--

INSERT INTO `store_item` (`store_item_id`, `store_id`, `item_id`) VALUES
(6, 3, 5),
(7, 3, 6),
(8, 3, 7),
(9, 3, 8),
(10, 3, 9);

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
(3, 'root1', '21232f297a57a5a743894a0e4a801fc3', 1, 2, '2019-02-08');

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
(1, 'alan', 'jlanan', '', 'alan@gmail.com', '123412341234'),
(3, 'asdf', 'asdf', '', 'alan@gmail.com', '123412341234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`advertise_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `category_relation`
--
ALTER TABLE `category_relation`
  ADD PRIMARY KEY (`category_relation_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `mobile`
--
ALTER TABLE `mobile`
  ADD PRIMARY KEY (`mobile_id`);

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
  MODIFY `advertise_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_relation`
--
ALTER TABLE `category_relation`
  MODIFY `category_relation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store_item`
--
ALTER TABLE `store_item`
  MODIFY `store_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
