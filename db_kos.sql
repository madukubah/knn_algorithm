-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2018 at 06:54 AM
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
-- Database: `db_kos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` smallint(6) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE `advertise` (
  `advertise_id` int(5) NOT NULL,
  `advertise_photo` text NOT NULL,
  `advertise_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`advertise_id`, `advertise_photo`, `advertise_desc`) VALUES
(3, '2018-11-19-06-48-35big6320417.jpg', 'iklan');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `facility_id` int(5) NOT NULL,
  `facility_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`facility_id`, `facility_name`) VALUES
(1, 'tempat tidur '),
(2, 'kamar mandi dalam'),
(3, 'lemari pakaian'),
(4, 'internet'),
(5, 'ac'),
(6, 'tv');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `kamar_id` smallint(6) NOT NULL,
  `kamar_type` varchar(50) NOT NULL,
  `kamar_harga` int(100) NOT NULL,
  `kamar_panjang` decimal(65,0) NOT NULL,
  `kamar_lebar` decimal(65,0) NOT NULL,
  `kamar_foto` varchar(200) NOT NULL,
  `kamar_facility` text NOT NULL,
  `kamar_quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`kamar_id`, `kamar_type`, `kamar_harga`, `kamar_panjang`, `kamar_lebar`, `kamar_foto`, `kamar_facility`, `kamar_quantity`) VALUES
(7, 'A1', 10000000, '2', '3', '2018-11-17-01-31-37Cari-Kost-Murah-di-Jakarta-itu.jpg', 'tempat tidur;kamar mandi dalam;lemari pakaian;internet;ac;tv', 4),
(8, 'A2', 2000000, '3', '3', '2018-11-17-07-17-53big6320417.jpg', 'tempat tidur;kamar mandi dalam;lemari pakaian;internet;ac;tv', 3),
(11, 'alfalah', 1000, '5', '5', '2018-11-17-02-13-38Kontrakan-petak-murah-tangerang.jpg', 'tempat tidur;kamar mandi dalam;lemari pakaian;internet;ac;tv', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kepemilikan`
--

CREATE TABLE `kepemilikan` (
  `kepemilikan_id` smallint(6) NOT NULL,
  `kost_id` smallint(6) NOT NULL,
  `kamar_id` smallint(6) NOT NULL,
  `kepemilikan_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepemilikan`
--

INSERT INTO `kepemilikan` (`kepemilikan_id`, `kost_id`, `kamar_id`, `kepemilikan_status`) VALUES
(7, 4, 7, 1),
(8, 4, 8, 1),
(11, 7, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kost`
--

CREATE TABLE `kost` (
  `kost_id` smallint(6) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `kost_name` varchar(200) NOT NULL,
  `kost_address` text NOT NULL,
  `kost_latitude` varchar(100) NOT NULL,
  `kost_langitude` varchar(100) NOT NULL,
  `kost_photo` text NOT NULL,
  `kost_keterangan` text NOT NULL,
  `kost_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kost`
--

INSERT INTO `kost` (`kost_id`, `user_id`, `kost_name`, `kost_address`, `kost_latitude`, `kost_langitude`, `kost_photo`, `kost_keterangan`, `kost_status`) VALUES
(4, 1, 'kos tetew', 'jalan supu yusuf', '12', '21', '2018-11-17-02-10-38download (1).jpg', 'kos murah meriah', 0),
(7, 5, 'kost alfalah', 'jalan mutiara no 19', '123', '2132', '2018-11-17-02-10-14download (1).jpg', 'kost alfalah', 0);

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
(1, '2018-10-25 23:05:12', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(2, '2018-10-25 23:05:12', 'access HOMEPAGE without session', 0),
(3, '2018-10-25 23:05:14', 'LOGIN user => root , result => false =>Username atau password salah!', 0),
(4, '2018-10-25 23:05:14', 'access HOMEPAGE without session', 0),
(5, '2018-10-25 23:05:16', 'a person REGISTER in system ; result =>false', 0),
(6, '2018-10-25 23:05:32', 'a person REGISTER in system ; result =>true', 0),
(7, '2018-10-25 23:05:32', 'access HOMEPAGE without session', 0),
(8, '2018-10-25 23:05:35', 'LOGIN user => root , result => false =>anda belum di aktivasi !!!!!', 0),
(9, '2018-10-25 23:05:35', 'access HOMEPAGE without session', 0),
(10, '2018-10-25 23:05:51', 'LOGIN user => root , result => true', 1),
(11, '2018-10-25 23:05:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(12, '2018-10-25 23:05:53', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(13, '2018-10-25 23:05:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(14, '2018-10-25 23:06:01', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(15, '2018-10-25 23:06:03', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(16, '2018-10-25 23:06:05', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(17, '2018-10-25 23:06:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(18, '2018-10-25 23:06:22', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(19, '2018-10-25 23:06:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(20, '2018-10-26 14:39:01', 'access HOMEPAGE without session', 0),
(21, '2018-10-26 14:39:06', 'LOGIN user => root , result => true', 1),
(22, '2018-10-26 14:39:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(23, '2018-10-26 14:39:08', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(24, '2018-10-26 14:39:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(25, '2018-10-26 14:41:03', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(26, '2018-10-26 14:41:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(27, '2018-10-26 14:41:15', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(28, '2018-10-26 14:41:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(29, '2018-10-26 14:41:20', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(30, '2018-10-26 14:41:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(31, '2018-10-26 14:43:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(32, '2018-10-26 14:43:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(33, '2018-10-26 14:43:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(34, '2018-10-26 14:43:48', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(35, '2018-10-26 14:49:03', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(36, '2018-10-26 14:49:17', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(37, '2018-10-26 14:49:17', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(38, '2018-10-26 14:49:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(39, '2018-10-26 14:50:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(40, '2018-10-26 14:55:54', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(41, '2018-10-26 14:56:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(42, '2018-10-26 14:56:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(43, '2018-10-26 15:52:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(44, '2018-10-26 15:52:17', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(45, '2018-10-26 15:54:57', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(46, '2018-10-26 15:54:59', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(47, '2018-10-26 15:56:09', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(48, '2018-10-26 15:56:21', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(49, '2018-10-26 15:57:12', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(50, '2018-10-26 15:57:15', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(51, '2018-10-26 15:57:17', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(52, '2018-10-26 15:57:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(53, '2018-10-26 15:57:22', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(54, '2018-10-26 15:57:23', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(55, '2018-10-26 16:02:04', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(56, '2018-10-26 16:02:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(57, '2018-10-26 16:02:07', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(58, '2018-10-26 16:02:09', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(59, '2018-10-26 16:02:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(60, '2018-10-26 16:02:12', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(61, '2018-10-26 16:03:08', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(62, '2018-10-26 16:03:10', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(63, '2018-10-26 16:03:11', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(64, '2018-10-26 16:03:13', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(65, '2018-10-26 16:03:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(66, '2018-10-26 16:03:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(67, '2018-10-26 16:03:33', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(68, '2018-10-26 16:03:33', 'access HOMEPAGE without session', 0),
(69, '2018-10-26 16:03:34', 'LOGIN user => root , result => true', 1),
(70, '2018-10-26 16:03:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(71, '2018-10-26 16:03:36', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(72, '2018-10-26 16:03:56', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(73, '2018-10-26 16:04:55', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(74, '2018-10-26 16:06:50', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(75, '2018-10-26 16:07:43', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(76, '2018-10-26 16:08:01', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(77, '2018-10-26 16:09:20', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(78, '2018-10-26 16:10:07', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(79, '2018-10-26 16:10:11', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(80, '2018-10-26 16:10:59', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(81, '2018-10-26 16:11:01', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(82, '2018-10-26 16:11:26', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(83, '2018-10-26 16:11:37', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(84, '2018-10-26 16:11:38', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(85, '2018-10-26 16:16:42', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(86, '2018-10-26 16:17:27', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(87, '2018-10-26 16:17:34', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(88, '2018-10-26 16:19:17', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(89, '2018-10-26 16:20:34', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(90, '2018-10-26 16:20:40', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(91, '2018-10-26 16:20:48', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(92, '2018-10-26 16:20:53', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(93, '2018-10-26 16:20:59', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(94, '2018-10-26 16:21:09', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(95, '2018-10-26 16:21:24', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(96, '2018-10-26 16:21:24', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(97, '2018-10-26 16:21:48', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(98, '2018-10-26 16:25:07', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(99, '2018-10-26 16:25:08', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(100, '2018-10-26 16:25:41', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(101, '2018-10-26 16:29:07', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(102, '2018-10-26 16:29:08', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(103, '2018-10-26 16:29:09', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(104, '2018-10-26 16:29:20', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(105, '2018-10-26 16:29:20', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(106, '2018-10-26 16:30:21', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(107, '2018-10-26 16:31:22', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(108, '2018-10-26 16:31:27', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(109, '2018-10-26 16:31:27', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(110, '2018-10-26 16:33:50', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(111, '2018-10-26 16:33:51', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(112, '2018-10-26 16:34:06', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(113, '2018-10-26 16:34:06', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(114, '2018-10-27 08:12:41', 'access ADDPAGE without session', 0),
(115, '2018-10-27 08:12:44', 'LOGIN user => root , result => true', 1),
(116, '2018-10-27 08:12:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(117, '2018-10-27 08:18:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(118, '2018-10-27 08:18:57', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(119, '2018-10-27 08:19:50', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(120, '2018-10-27 08:19:50', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(121, '2018-10-27 08:20:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(122, '2018-10-27 08:20:45', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(123, '2018-10-27 08:20:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(124, '2018-10-27 08:42:33', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(125, '2018-10-27 08:47:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(126, '2018-10-27 09:50:23', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(127, '2018-10-27 09:51:02', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(128, '2018-10-27 09:51:02', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(129, '2018-10-27 09:51:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(130, '2018-10-27 10:01:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(131, '2018-10-27 10:02:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(132, '2018-10-27 10:03:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(133, '2018-10-27 10:23:46', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(134, '2018-10-27 10:23:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(135, '2018-10-28 09:29:24', 'access HOMEPAGE without session', 0),
(136, '2018-10-28 09:29:27', 'LOGIN user => root , result => true', 1),
(137, '2018-10-28 09:29:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(138, '2018-10-28 09:44:22', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(139, '2018-10-28 09:48:27', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(140, '2018-10-28 10:03:29', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(141, '2018-10-28 10:03:29', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(142, '2018-10-28 10:07:41', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(143, '2018-10-28 10:09:42', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(144, '2018-10-28 10:11:12', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(145, '2018-10-28 10:11:13', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(146, '2018-10-28 10:11:55', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(147, '2018-10-28 10:12:11', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(148, '2018-10-28 10:12:11', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(149, '2018-10-28 10:12:51', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(150, '2018-10-28 10:12:51', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(151, '2018-10-28 10:58:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(152, '2018-10-28 10:58:34', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(153, '2018-10-28 10:58:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(154, '2018-10-28 11:00:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(155, '2018-10-28 12:37:22', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(156, '2018-10-28 12:37:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(157, '2018-10-29 21:45:58', 'access HOMEPAGE without session', 0),
(158, '2018-10-29 21:46:03', 'LOGIN user => root , result => true', 1),
(159, '2018-10-29 21:46:03', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(160, '2018-10-29 22:18:38', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(161, '2018-10-29 22:19:04', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(162, '2018-10-29 22:19:04', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(163, '2018-10-29 22:57:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(164, '2018-10-29 22:57:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(165, '2018-10-29 22:58:03', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(166, '2018-10-29 23:00:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(167, '2018-10-29 23:01:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(168, '2018-10-29 23:07:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(169, '2018-10-29 23:07:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(170, '2018-10-29 23:07:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(171, '2018-10-29 23:07:47', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(172, '2018-10-29 23:07:50', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(173, '2018-10-29 23:07:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(174, '2018-10-29 23:07:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(175, '2018-10-29 23:08:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(176, '2018-10-30 06:12:23', 'access HOMEPAGE without session', 0),
(177, '2018-10-30 06:12:25', 'LOGIN user => root , result => true', 1),
(178, '2018-10-30 06:12:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(179, '2018-10-30 06:30:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(180, '2018-10-30 06:31:02', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(181, '2018-10-30 06:31:03', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(182, '2018-10-30 06:31:04', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(183, '2018-10-30 06:31:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(184, '2018-10-30 06:36:33', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(185, '2018-10-30 06:36:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(186, '2018-10-30 06:38:41', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(187, '2018-10-30 06:38:56', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(188, '2018-10-30 06:38:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(189, '2018-10-30 06:40:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(190, '2018-10-30 06:41:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(191, '2018-10-30 06:42:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(192, '2018-10-30 06:42:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(193, '2018-10-30 06:43:17', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(194, '2018-10-30 06:43:18', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(195, '2018-10-30 06:43:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(196, '2018-10-30 06:43:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(197, '2018-10-30 06:49:00', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(198, '2018-10-30 06:49:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(199, '2018-10-30 06:49:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(200, '2018-10-31 10:57:16', 'access HOMEPAGE without session', 0),
(201, '2018-10-31 10:57:45', 'LOGIN user => root , result => true', 1),
(202, '2018-10-31 10:57:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(203, '2018-10-31 11:27:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(204, '2018-10-31 11:28:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(205, '2018-10-31 11:28:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(206, '2018-10-31 11:28:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(207, '2018-10-31 11:28:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(208, '2018-11-01 12:37:48', 'access HOMEPAGE without session', 0),
(209, '2018-11-01 12:37:50', 'LOGIN user => root , result => true', 1),
(210, '2018-11-01 12:37:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(211, '2018-11-01 12:44:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(212, '2018-11-01 13:26:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(213, '2018-11-01 13:26:55', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(214, '2018-11-01 13:26:57', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(215, '2018-11-01 13:26:59', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(216, '2018-11-01 13:28:48', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(217, '2018-11-01 13:29:15', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(218, '2018-11-01 13:29:15', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(219, '2018-11-01 13:29:28', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(220, '2018-11-01 13:29:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(221, '2018-11-01 13:36:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(222, '2018-11-01 13:36:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(223, '2018-11-02 09:51:51', 'access HOMEPAGE without session', 0),
(224, '2018-11-02 09:52:34', 'LOGIN user => root , result => true', 1),
(225, '2018-11-02 09:52:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(226, '2018-11-02 09:52:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(227, '2018-11-02 09:52:48', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(228, '2018-11-02 09:52:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(229, '2018-11-02 09:52:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(230, '2018-11-02 09:53:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(231, '2018-11-03 11:27:40', 'access HOMEPAGE without session', 0),
(232, '2018-11-03 11:27:43', 'LOGIN user => root , result => true', 1),
(233, '2018-11-03 11:27:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(234, '2018-11-03 11:27:51', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(235, '2018-11-03 11:28:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(236, '2018-11-03 11:28:26', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(237, '2018-11-03 11:28:28', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(238, '2018-11-03 11:28:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(239, '2018-11-03 16:53:20', 'access HOMEPAGE without session', 0),
(240, '2018-11-03 16:53:23', 'LOGIN user => root , result => true', 1),
(241, '2018-11-03 16:53:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(242, '2018-11-03 16:53:36', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(243, '2018-11-03 16:53:37', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(244, '2018-11-03 16:53:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(245, '2018-11-03 16:53:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(246, '2018-11-04 07:06:18', 'access HOMEPAGE without session', 0),
(247, '2018-11-04 07:06:20', 'LOGIN user => root , result => true', 1),
(248, '2018-11-04 07:06:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(249, '2018-11-04 07:20:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(250, '2018-11-04 07:21:54', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(251, '2018-11-04 07:23:58', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(252, '2018-11-04 07:24:02', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(253, '2018-11-04 07:24:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(254, '2018-11-04 10:08:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(255, '2018-11-08 20:53:35', 'access HOMEPAGE without session', 0),
(256, '2018-11-08 20:54:28', 'LOGIN user => root , result => true', 1),
(257, '2018-11-08 20:54:28', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(258, '2018-11-08 21:01:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(259, '2018-11-09 01:38:31', 'access HOMEPAGE without session', 0),
(260, '2018-11-09 01:38:46', 'LOGIN user => root , result => true', 1),
(261, '2018-11-09 01:38:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(262, '2018-11-09 01:38:51', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(263, '2018-11-09 01:38:53', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(264, '2018-11-09 01:38:55', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(265, '2018-11-09 01:38:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(266, '2018-11-09 01:39:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(267, '2018-11-09 01:39:16', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(268, '2018-11-09 01:39:16', 'access HOMEPAGE without session', 0),
(269, '2018-11-09 01:39:23', 'LOGIN user =>  , result => false =>Username atau password salah!', 0),
(270, '2018-11-09 01:39:23', 'access HOMEPAGE without session', 0),
(271, '2018-11-09 01:39:29', 'LOGIN user => root , result => true', 1),
(272, '2018-11-09 01:39:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(273, '2018-11-09 01:39:35', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(274, '2018-11-09 01:39:36', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(275, '2018-11-09 01:39:54', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(276, '2018-11-09 01:39:55', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(277, '2018-11-09 08:40:00', 'access HOMEPAGE without session', 0),
(278, '2018-11-09 08:40:01', 'LOGIN user => root , result => true', 1),
(279, '2018-11-09 08:40:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(280, '2018-11-09 01:40:15', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(281, '2018-11-09 01:40:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(282, '2018-11-09 01:40:48', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(283, '2018-11-09 01:40:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(284, '2018-11-09 01:40:53', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(285, '2018-11-09 01:40:54', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(286, '2018-11-09 01:40:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(287, '2018-11-09 01:41:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(288, '2018-11-09 01:41:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(289, '2018-11-09 01:43:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(290, '2018-11-09 01:44:03', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(291, '2018-11-09 01:44:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(292, '2018-11-09 01:44:12', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(293, '2018-11-09 01:44:13', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(294, '2018-11-09 02:08:04', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(295, '2018-11-09 02:08:44', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(296, '2018-11-09 02:08:49', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(297, '2018-11-09 02:08:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(298, '2018-11-09 02:09:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(299, '2018-11-09 02:09:34', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(300, '2018-11-09 02:09:36', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(301, '2018-11-09 02:09:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(302, '2018-11-09 02:10:31', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(303, '2018-11-09 09:10:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(304, '2018-11-09 02:10:45', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(305, '2018-11-09 02:10:45', 'access HOMEPAGE without session', 0),
(306, '2018-11-09 02:10:46', 'LOGIN user => root , result => true', 1),
(307, '2018-11-09 02:10:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(308, '2018-11-09 02:15:30', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(309, '2018-11-09 02:15:31', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(310, '2018-11-09 02:15:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(311, '2018-11-09 02:17:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(312, '2018-11-09 02:18:28', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(313, '2018-11-09 02:18:33', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(314, '2018-11-09 02:18:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(315, '2018-11-10 02:45:19', 'access HOMEPAGE without session', 0),
(316, '2018-11-10 02:45:24', 'access HOMEPAGE without session', 0),
(317, '2018-11-10 02:45:55', 'access HOMEPAGE without session', 0),
(318, '2018-11-10 02:46:14', 'access HOMEPAGE without session', 0),
(319, '2018-11-10 02:46:16', 'LOGIN user =>  , result => false =>Username atau password salah!', 0),
(320, '2018-11-10 02:46:16', 'access HOMEPAGE without session', 0),
(321, '2018-11-10 02:46:27', 'access HOMEPAGE without session', 0),
(322, '2018-11-10 02:46:36', 'access HOMEPAGE without session', 0),
(323, '2018-11-10 02:46:39', 'access HOMEPAGE without session', 0),
(324, '2018-11-10 02:46:54', 'access HOMEPAGE without session', 0),
(325, '2018-11-10 02:47:07', 'access HOMEPAGE without session', 0),
(326, '2018-11-10 02:47:37', 'access HOMEPAGE without session', 0),
(327, '2018-11-10 02:48:22', 'access HOMEPAGE without session', 0),
(328, '2018-11-10 02:48:48', 'access HOMEPAGE without session', 0),
(329, '2018-11-10 02:48:56', 'access HOMEPAGE without session', 0),
(330, '2018-11-10 02:49:02', 'access HOMEPAGE without session', 0),
(331, '2018-11-10 02:49:21', 'access HOMEPAGE without session', 0),
(332, '2018-11-10 02:49:24', 'LOGIN user => root , result => true', 1),
(333, '2018-11-10 02:49:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(334, '2018-11-10 02:50:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(335, '2018-11-10 02:50:20', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(336, '2018-11-10 02:50:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(337, '2018-11-10 03:04:33', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(338, '2018-11-10 03:06:30', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(339, '2018-11-10 03:06:57', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(340, '2018-11-10 03:06:57', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(341, '2018-11-10 03:07:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(342, '2018-11-10 03:07:02', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(343, '2018-11-10 03:09:09', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(344, '2018-11-10 03:09:44', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(345, '2018-11-10 03:13:33', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(346, '2018-11-10 03:15:58', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(347, '2018-11-10 03:16:10', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(348, '2018-11-10 03:16:29', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(349, '2018-11-10 03:23:33', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(350, '2018-11-10 03:23:55', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(351, '2018-11-10 03:24:54', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(352, '2018-11-10 03:24:55', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(353, '2018-11-10 03:26:26', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(354, '2018-11-10 03:28:23', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(355, '2018-11-10 03:31:21', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(356, '2018-11-10 03:31:21', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(357, '2018-11-10 03:31:23', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(358, '2018-11-10 03:31:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(359, '2018-11-10 03:41:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(360, '2018-11-10 03:46:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(361, '2018-11-10 04:05:40', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(362, '2018-11-10 04:11:08', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(363, '2018-11-10 04:12:11', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(364, '2018-11-10 04:12:11', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(365, '2018-11-10 04:12:13', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(366, '2018-11-10 04:12:15', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(367, '2018-11-10 04:24:15', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(368, '2018-11-10 04:35:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(369, '2018-11-10 04:38:30', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(370, '2018-11-10 04:38:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(371, '2018-11-10 04:38:35', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(372, '2018-11-10 04:38:37', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(373, '2018-11-10 05:06:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(374, '2018-11-10 05:06:29', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(375, '2018-11-10 05:06:29', 'access HOMEPAGE without session', 0),
(376, '2018-11-10 05:06:31', 'a person REGISTER in system ; result =>false', 0),
(377, '2018-11-10 05:06:36', 'access HOMEPAGE without session', 0),
(378, '2018-11-10 05:06:39', 'access HOMEPAGE without session', 0),
(379, '2018-11-10 05:06:41', 'a person REGISTER in system ; result =>false', 0),
(380, '2018-11-10 05:08:59', 'a person REGISTER in system ; result =>false', 0),
(381, '2018-11-10 05:09:23', 'access HOMEPAGE without session', 0),
(382, '2018-11-10 05:10:44', 'access HOMEPAGE without session', 0),
(383, '2018-11-10 05:10:46', 'LOGIN user => root , result => true', 1),
(384, '2018-11-10 05:10:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(385, '2018-11-10 05:10:54', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(386, '2018-11-10 05:10:56', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(387, '2018-11-10 05:11:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(388, '2018-11-10 05:11:07', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(389, '2018-11-10 05:11:07', 'access HOMEPAGE without session', 0),
(390, '2018-11-10 05:11:09', 'access ADDPAGE without session', 0),
(391, '2018-11-10 05:11:32', 'access ADDPAGE without session', 0),
(392, '2018-11-10 05:11:35', 'access ADDPAGE without session', 0),
(393, '2018-11-10 05:11:58', 'access ADDPAGE without session', 0),
(394, '2018-11-10 05:12:49', 'access ADDPAGE without session', 0),
(395, '2018-11-10 05:12:50', 'access HOMEPAGE without session', 0),
(396, '2018-11-10 05:12:51', 'access HOMEPAGE without session', 0),
(397, '2018-11-10 05:12:53', 'LOGIN user => root , result => true', 1),
(398, '2018-11-10 05:12:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(399, '2018-11-10 05:12:58', 'LOGIN user => root , result => true', 1),
(400, '2018-11-10 05:12:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(401, '2018-11-10 05:13:05', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(402, '2018-11-10 05:13:05', 'access HOMEPAGE without session', 0),
(403, '2018-11-10 05:13:08', 'access ADDPAGE without session', 0),
(404, '2018-11-10 05:13:08', 'access HOMEPAGE without session', 0),
(405, '2018-11-10 05:14:26', 'a person REGISTER in system ; result =>false', 0),
(406, '2018-11-10 05:17:15', 'access HOMEPAGE without session', 0),
(407, '2018-11-10 05:17:18', 'access HOMEPAGE without session', 0),
(408, '2018-11-10 05:17:20', 'LOGIN user => root , result => true', 1),
(409, '2018-11-10 05:17:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(410, '2018-11-10 05:17:48', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(411, '2018-11-10 05:17:48', 'access HOMEPAGE without session', 0),
(412, '2018-11-10 05:17:49', 'LOGIN user => root , result => true', 1),
(413, '2018-11-10 05:17:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(414, '2018-11-10 05:19:39', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(415, '2018-11-10 05:19:43', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(416, '2018-11-10 05:19:43', 'access HOMEPAGE without session', 0),
(417, '2018-11-10 05:19:45', 'LOGIN user => root , result => true', 1),
(418, '2018-11-10 05:19:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(419, '2018-11-10 05:21:04', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(420, '2018-11-10 06:01:30', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(421, '2018-11-10 06:02:34', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(422, '2018-11-10 06:03:34', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(423, '2018-11-10 07:36:28', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(424, '2018-11-10 07:36:37', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(425, '2018-11-10 07:36:57', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(426, '2018-11-10 07:36:57', 'access HOMEPAGE without session', 0),
(427, '2018-11-10 07:36:59', 'a person REGISTER in system ; result =>false', 0),
(428, '2018-11-10 07:37:24', 'a person REGISTER in system ; result =>false', 0),
(429, '2018-11-10 07:37:35', 'a person REGISTER in system ; result =>true', 0),
(430, '2018-11-10 07:37:35', 'access HOMEPAGE without session', 0),
(431, '2018-11-10 07:37:41', 'LOGIN user => alin , result => false =>Username atau password salah!', 0),
(432, '2018-11-10 07:37:41', 'access HOMEPAGE without session', 0),
(433, '2018-11-10 07:37:49', 'LOGIN user => alin , result => false =>anda belum di aktivasi !!!!!', 0),
(434, '2018-11-10 07:37:49', 'access HOMEPAGE without session', 0),
(435, '2018-11-10 07:38:04', 'LOGIN user => root , result => true', 1),
(436, '2018-11-10 07:38:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(437, '2018-11-10 07:38:06', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(438, '2018-11-10 07:39:44', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(439, '2018-11-10 07:42:41', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(440, '2018-11-10 07:48:09', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(441, '2018-11-10 07:52:04', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(442, '2018-11-10 07:53:12', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(443, '2018-11-10 08:00:20', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(444, '2018-11-10 08:00:44', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(445, '2018-11-10 08:00:48', 'EDIT USER (alin) BY ():  user => root( id = 1) ; result => true', 1),
(446, '2018-11-10 08:00:48', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(447, '2018-11-10 08:00:50', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(448, '2018-11-10 08:00:54', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(449, '2018-11-10 08:00:54', 'access HOMEPAGE without session', 0),
(450, '2018-11-10 08:01:06', 'access HOMEPAGE without session', 0),
(451, '2018-11-10 08:01:07', 'LOGIN user => root , result => true', 1),
(452, '2018-11-10 08:01:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(453, '2018-11-10 08:01:10', 'access HOMEPAGE without session', 0),
(454, '2018-11-10 08:01:15', 'LOGIN user => alin , result => false =>anda belum di aktivasi !!!!!', 0),
(455, '2018-11-10 08:01:15', 'access HOMEPAGE without session', 0),
(456, '2018-11-10 08:01:18', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(457, '2018-11-10 08:01:23', 'EDIT USER (alin) BY ():  user => root( id = 1) ; result => true', 1),
(458, '2018-11-10 08:01:23', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(459, '2018-11-10 08:01:30', 'LOGIN user => alin , result => true', 2),
(460, '2018-11-10 08:01:30', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(461, '2018-11-10 08:01:40', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(462, '2018-11-10 08:02:14', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => true', 2),
(463, '2018-11-10 08:02:14', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(464, '2018-11-10 08:02:16', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(465, '2018-11-10 08:02:20', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(466, '2018-11-10 08:02:56', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => true', 2),
(467, '2018-11-10 08:02:56', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(468, '2018-11-10 08:02:58', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(469, '2018-11-10 08:04:11', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(470, '2018-11-10 08:05:31', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(471, '2018-11-10 08:05:41', 'EDIT USER (alin) BY ():  user => root( id = 1) ; result => true', 1),
(472, '2018-11-10 08:05:41', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(473, '2018-11-10 08:05:49', 'LOGOUT  user => alin( id = 2) ; result => true', 2),
(474, '2018-11-10 08:05:49', 'access HOMEPAGE without session', 0),
(475, '2018-11-10 08:05:54', 'LOGIN user => alin , result => false =>Username atau password salah!', 0),
(476, '2018-11-10 08:05:54', 'access HOMEPAGE without session', 0),
(477, '2018-11-10 08:06:01', 'LOGIN user => alin , result => false =>Username atau password salah!', 0),
(478, '2018-11-10 08:06:01', 'access HOMEPAGE without session', 0),
(479, '2018-11-10 08:06:10', 'LOGIN user => alin , result => false =>Username atau password salah!', 0),
(480, '2018-11-10 08:06:10', 'access HOMEPAGE without session', 0),
(481, '2018-11-10 08:06:58', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(482, '2018-11-10 08:07:04', 'EDIT USER (alin) BY ():  user => root( id = 1) ; result => true', 1),
(483, '2018-11-10 08:07:04', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(484, '2018-11-10 08:07:11', 'LOGIN user => alin , result => true', 2),
(485, '2018-11-10 08:07:11', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(486, '2018-11-10 08:11:35', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(487, '2018-11-10 08:12:30', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(488, '2018-11-10 08:12:37', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(489, '2018-11-10 08:13:51', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(490, '2018-11-10 08:13:54', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(491, '2018-11-10 08:15:12', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(492, '2018-11-10 08:15:15', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(493, '2018-11-10 08:15:28', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(494, '2018-11-10 08:15:32', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(495, '2018-11-10 08:16:17', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(496, '2018-11-10 08:17:05', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(497, '2018-11-10 08:17:48', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(498, '2018-11-10 08:18:02', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(499, '2018-11-10 08:26:18', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(500, '2018-11-10 08:27:09', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(501, '2018-11-10 08:27:12', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(502, '2018-11-10 08:28:46', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(503, '2018-11-10 08:28:49', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(504, '2018-11-10 08:29:18', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(505, '2018-11-10 08:29:50', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(506, '2018-11-10 08:30:17', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(507, '2018-11-10 08:32:25', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(508, '2018-11-10 08:32:31', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(509, '2018-11-10 08:37:01', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(510, '2018-11-10 08:37:16', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(511, '2018-11-10 08:37:18', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(512, '2018-11-10 08:37:30', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(513, '2018-11-10 08:37:34', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(514, '2018-11-10 08:37:39', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(515, '2018-11-10 08:37:54', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(516, '2018-11-10 08:37:59', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(517, '2018-11-10 08:38:15', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(518, '2018-11-10 08:38:23', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(519, '2018-11-10 08:38:29', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(520, '2018-11-10 08:38:34', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(521, '2018-11-10 08:51:40', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(522, '2018-11-10 08:54:30', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(523, '2018-11-10 08:54:35', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(524, '2018-11-10 08:54:41', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(525, '2018-11-10 08:55:16', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(526, '2018-11-10 08:55:36', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(527, '2018-11-10 08:55:58', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(528, '2018-11-10 08:56:11', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(529, '2018-11-10 08:56:16', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(530, '2018-11-10 08:56:45', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(531, '2018-11-10 08:56:45', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(532, '2018-11-10 08:56:46', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(533, '2018-11-10 08:57:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(534, '2018-11-10 08:57:44', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(535, '2018-11-10 08:59:05', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(536, '2018-11-10 08:59:14', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(537, '2018-11-10 09:06:39', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(538, '2018-11-10 09:06:46', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(539, '2018-11-10 09:06:52', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(540, '2018-11-10 09:06:54', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(541, '2018-11-10 09:07:10', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(542, '2018-11-10 09:07:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(543, '2018-11-10 09:07:23', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(544, '2018-11-10 09:07:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(545, '2018-11-10 09:07:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(546, '2018-11-10 09:07:46', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(547, '2018-11-10 09:08:10', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(548, '2018-11-10 09:08:10', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(549, '2018-11-10 09:08:12', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(550, '2018-11-10 09:08:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(551, '2018-11-10 09:08:18', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(552, '2018-11-10 09:08:55', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(553, '2018-11-10 09:08:55', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(554, '2018-11-10 09:09:19', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(555, '2018-11-10 09:09:19', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(556, '2018-11-10 09:09:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(557, '2018-11-10 09:10:22', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(558, '2018-11-10 09:10:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(559, '2018-11-10 09:13:38', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(560, '2018-11-10 09:13:49', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(561, '2018-11-10 09:13:52', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(562, '2018-11-10 09:16:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(563, '2018-11-10 09:16:53', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(564, '2018-11-10 09:17:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(565, '2018-11-10 09:17:05', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(566, '2018-11-10 09:17:58', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(567, '2018-11-10 09:17:58', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(568, '2018-11-10 09:18:01', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(569, '2018-11-10 09:18:05', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(570, '2018-11-10 09:18:24', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(571, '2018-11-10 09:18:24', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(572, '2018-11-10 09:18:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(573, '2018-11-10 09:18:44', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(574, '2018-11-10 09:19:06', 'ADD DOCUMENT () :  user => root( id = 1) ; result => true', 1),
(575, '2018-11-10 09:19:06', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(576, '2018-11-10 09:19:08', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(577, '2018-11-16 11:41:02', 'access HOMEPAGE without session', 0),
(578, '2018-11-16 11:41:05', 'LOGIN user => root , result => true', 1),
(579, '2018-11-16 11:41:05', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(580, '2018-11-16 11:41:06', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(581, '2018-11-16 11:41:10', 'EDIT USER (alin) BY ():  user => root( id = 1) ; result => true', 1),
(582, '2018-11-16 11:41:10', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(583, '2018-11-16 11:49:38', 'EDIT USER (alin) BY ():  user => root( id = 1) ; result => true', 1),
(584, '2018-11-16 11:49:38', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(585, '2018-11-17 06:31:29', 'access HOMEPAGE without session', 0),
(586, '2018-11-17 06:31:31', 'LOGIN user => root , result => true', 1),
(587, '2018-11-17 06:31:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(588, '2018-11-17 06:31:34', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(589, '2018-11-17 06:31:43', 'EDIT USER (alin) BY ():  user => root( id = 1) ; result => true', 1),
(590, '2018-11-17 06:31:43', 'access ADMIN : VIEW user => root( id = 1) ', 1);
INSERT INTO `log` (`log_id`, `log_datetime`, `log_message`, `user_id`) VALUES
(591, '2018-11-17 06:31:45', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(592, '2018-11-17 06:31:49', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(593, '2018-11-17 06:31:50', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(594, '2018-11-17 06:32:00', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(595, '2018-11-17 06:32:00', 'access HOMEPAGE without session', 0),
(596, '2018-11-17 06:32:04', 'access ADDPAGE without session', 0),
(597, '2018-11-17 06:32:10', 'access ADDPAGE without session', 0),
(598, '2018-11-17 06:35:31', 'access HOMEPAGE without session', 0),
(599, '2018-11-17 06:37:26', 'access ADMIN : NOT ADMIN BYuser => ( id = ) ', 1),
(600, '2018-11-17 06:37:26', 'access HOMEPAGE without session', 0),
(601, '2018-11-17 06:38:03', 'access ADMIN : NOT ADMIN BYuser => ( id = -1) ', -1),
(602, '2018-11-17 06:38:03', 'access HOMEPAGE without session', 0),
(603, '2018-11-17 06:38:08', 'access ADDPAGE without session', 0),
(604, '2018-11-17 06:39:46', 'access ADDPAGE without session', 0),
(605, '2018-11-17 06:39:46', 'access HOMEPAGE without session', 0),
(606, '2018-11-17 06:39:53', 'access ADDPAGE without session', 0),
(607, '2018-11-17 06:39:53', 'access HOMEPAGE without session', 0),
(608, '2018-11-17 06:45:03', 'LOGIN user => root , result => true', 1),
(609, '2018-11-17 06:45:03', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(610, '2018-11-17 06:45:09', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(611, '2018-11-17 06:45:11', 'access HOMEPAGE without session', 0),
(612, '2018-11-17 06:45:18', 'LOGIN user => root , result => true', 1),
(613, '2018-11-17 06:45:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(614, '2018-11-17 06:45:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(615, '2018-11-17 06:46:25', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(616, '2018-11-17 06:47:53', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(617, '2018-11-17 06:47:53', 'access HOMEPAGE without session', 0),
(618, '2018-11-17 06:52:18', 'access HOMEPAGE without session', 0),
(619, '2018-11-17 06:52:28', 'access HOMEPAGE without session', 0),
(620, '2018-11-17 06:52:33', 'LOGIN user => root , result => true', 1),
(621, '2018-11-17 06:52:33', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(622, '2018-11-17 06:52:59', 'LOGOUT  user => root( id = 1) ; result => true', 1),
(623, '2018-11-17 06:52:59', 'access HOMEPAGE without session', 0),
(624, '2018-11-17 06:53:27', 'access HOMEPAGE without session', 0),
(625, '2018-11-17 06:53:39', 'access HOMEPAGE without session', 0),
(626, '2018-11-17 06:54:57', 'access HOMEPAGE without session', 0),
(627, '2018-11-17 06:55:20', 'access HOMEPAGE without session', 0),
(628, '2018-11-17 06:55:25', 'LOGIN user => root , result => true', 1),
(629, '2018-11-17 06:55:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(630, '2018-11-17 06:56:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(631, '2018-11-17 06:56:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(632, '2018-11-17 06:57:32', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(633, '2018-11-17 06:57:36', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(634, '2018-11-17 06:57:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(635, '2018-11-17 06:57:40', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(636, '2018-11-17 06:57:41', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(637, '2018-11-17 06:58:11', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(638, '2018-11-17 06:58:13', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(639, '2018-11-17 06:58:14', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(640, '2018-11-17 06:58:15', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(641, '2018-11-17 06:58:16', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(642, '2018-11-17 06:58:25', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(643, '2018-11-17 06:58:26', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(644, '2018-11-17 06:58:40', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(645, '2018-11-17 06:58:53', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(646, '2018-11-17 06:59:04', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(647, '2018-11-17 06:59:08', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(648, '2018-11-17 06:59:09', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(649, '2018-11-17 07:00:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(650, '2018-11-17 07:01:23', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(651, '2018-11-17 07:01:27', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(652, '2018-11-17 07:19:02', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(653, '2018-11-17 07:19:10', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(654, '2018-11-17 07:21:43', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(655, '2018-11-17 07:25:14', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(656, '2018-11-17 07:25:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(657, '2018-11-17 07:25:24', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(658, '2018-11-17 07:25:32', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(659, '2018-11-17 07:25:40', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(660, '2018-11-17 07:27:19', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(661, '2018-11-17 07:27:56', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(662, '2018-11-17 07:27:57', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(663, '2018-11-17 07:28:01', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(664, '2018-11-17 11:28:40', 'access HOMEPAGE without session', 0),
(665, '2018-11-17 11:28:42', 'LOGIN user => root , result => true', 1),
(666, '2018-11-17 11:28:42', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(667, '2018-11-17 11:28:44', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(668, '2018-11-17 12:42:56', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(669, '2018-11-17 12:43:29', 'access HOMEPAGE without session', 0),
(670, '2018-11-17 12:43:35', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(671, '2018-11-17 12:43:43', 'EDIT USER (alin) BY ():  user => root( id = 1) ; result => true', 1),
(672, '2018-11-17 12:43:43', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(673, '2018-11-17 12:43:56', 'LOGIN user => alin , result => true', 2),
(674, '2018-11-17 12:43:56', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(675, '2018-11-17 12:44:01', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(676, '2018-11-17 12:44:27', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => true', 2),
(677, '2018-11-17 12:44:28', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(678, '2018-11-17 12:44:30', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(679, '2018-11-17 12:44:51', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => true', 2),
(680, '2018-11-17 12:44:51', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(681, '2018-11-17 12:44:52', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(682, '2018-11-17 12:46:23', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(683, '2018-11-17 12:46:53', 'DELETE USER (alin) BY ():  user => root( id = 1) ; result => true', 1),
(684, '2018-11-17 12:46:53', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(685, '2018-11-17 12:47:02', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(686, '2018-11-17 12:47:04', 'ADD DOCUMENT () :  user => alin( id = 2) ; result => VIEW; ', 2),
(687, '2018-11-17 12:47:05', 'HOMEPAGE :  user => alin( id = 2) ; result => true', 2),
(688, '2018-11-17 12:47:10', 'LOGOUT  user => alin( id = 2) ; result => true', 2),
(689, '2018-11-17 12:47:10', 'access HOMEPAGE without session', 0),
(690, '2018-11-17 12:47:12', 'LOGIN user =>  , result => false =>Username atau password salah!', 0),
(691, '2018-11-17 12:47:12', 'access HOMEPAGE without session', 0),
(692, '2018-11-17 12:47:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(693, '2018-11-17 13:01:19', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(694, '2018-11-17 13:01:24', 'a person REGISTER in system ; result =>false', 0),
(695, '2018-11-17 13:03:51', 'a person REGISTER in system ; result =>true', 0),
(696, '2018-11-17 13:03:51', 'access HOMEPAGE without session', 0),
(697, '2018-11-17 13:03:57', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(698, '2018-11-17 13:04:33', 'EDIT USER (muhalfalah) BY ():  user => root( id = 1) ; result => true', 1),
(699, '2018-11-17 13:04:33', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(700, '2018-11-17 13:05:58', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(701, '2018-11-17 13:06:08', 'LOGIN user => muhalfalah , result => true', 3),
(702, '2018-11-17 13:06:08', 'HOMEPAGE :  user => muhalfalah( id = 3) ; result => true', 3),
(703, '2018-11-17 13:06:11', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(704, '2018-11-17 13:09:56', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(705, '2018-11-17 13:09:57', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(706, '2018-11-17 13:10:02', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(707, '2018-11-17 13:10:07', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(708, '2018-11-17 13:10:10', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(709, '2018-11-17 13:10:12', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(710, '2018-11-17 13:10:14', 'HOMEPAGE :  user => muhalfalah( id = 3) ; result => true', 3),
(711, '2018-11-17 13:10:47', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(712, '2018-11-17 13:10:50', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(713, '2018-11-17 13:10:54', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(714, '2018-11-17 13:10:59', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(715, '2018-11-17 13:14:04', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(716, '2018-11-17 13:14:07', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(717, '2018-11-17 13:14:10', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(718, '2018-11-17 13:14:13', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(719, '2018-11-17 13:14:25', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(720, '2018-11-17 13:14:31', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(721, '2018-11-17 13:14:36', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(722, '2018-11-17 13:14:37', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(723, '2018-11-17 13:15:17', 'HOMEPAGE :  user => muhalfalah( id = 3) ; result => true', 3),
(724, '2018-11-17 13:15:19', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(725, '2018-11-17 13:15:58', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => true', 3),
(726, '2018-11-17 13:15:58', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(727, '2018-11-17 13:16:00', 'HOMEPAGE :  user => muhalfalah( id = 3) ; result => true', 3),
(728, '2018-11-17 13:16:04', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(729, '2018-11-17 13:16:40', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => true', 3),
(730, '2018-11-17 13:16:40', 'ADD DOCUMENT () :  user => muhalfalah( id = 3) ; result => VIEW; ', 3),
(731, '2018-11-17 13:16:42', 'HOMEPAGE :  user => muhalfalah( id = 3) ; result => true', 3),
(732, '2018-11-17 13:17:39', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(733, '2018-11-17 13:17:44', 'EDIT USER (muhalfalah) BY ():  user => root( id = 1) ; result => true', 1),
(734, '2018-11-17 13:17:45', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(735, '2018-11-17 13:18:05', 'EDIT USER (muhalfalah) BY ():  user => root( id = 1) ; result => true', 1),
(736, '2018-11-17 13:18:05', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(737, '2018-11-17 13:22:37', 'EDIT USER (muhalfalah) BY ():  user => root( id = 1) ; result => true', 1),
(738, '2018-11-17 13:22:37', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(739, '2018-11-17 13:22:49', 'EDIT USER (muhalfalah) BY ():  user => root( id = 1) ; result => true', 1),
(740, '2018-11-17 13:22:49', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(741, '2018-11-17 13:23:07', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(742, '2018-11-17 13:31:21', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(743, '2018-11-17 13:31:22', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(744, '2018-11-17 13:31:26', 'EDIT USER (muhalfalah) BY ():  user => root( id = 1) ; result => true', 1),
(745, '2018-11-17 13:31:26', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(746, '2018-11-17 13:31:27', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(747, '2018-11-17 13:31:29', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(748, '2018-11-17 13:31:41', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(749, '2018-11-17 13:31:42', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(750, '2018-11-17 13:31:45', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(751, '2018-11-17 13:31:57', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(752, '2018-11-17 13:31:59', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(753, '2018-11-17 13:36:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(754, '2018-11-17 13:36:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(755, '2018-11-17 13:36:34', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(756, '2018-11-17 13:36:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(757, '2018-11-17 13:36:41', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(758, '2018-11-17 13:36:47', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(759, '2018-11-17 13:37:18', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(760, '2018-11-17 13:41:58', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(761, '2018-11-17 13:42:02', 'EDIT USER (muhalfalah) BY ():  user => root( id = 1) ; result => true', 1),
(762, '2018-11-17 13:42:02', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(763, '2018-11-17 13:42:57', 'DELETE USER (muhalfalah) BY ():  user => root( id = 1) ; result => true', 1),
(764, '2018-11-17 13:42:57', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(765, '2018-11-17 13:43:18', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(766, '2018-11-17 13:45:53', 'LOGOUT  user => muhalfalah( id = 3) ; result => true', 3),
(767, '2018-11-17 13:45:53', 'access HOMEPAGE without session', 0),
(768, '2018-11-17 13:45:55', 'LOGIN user =>  , result => false =>Username atau password salah!', 0),
(769, '2018-11-17 13:45:55', 'access HOMEPAGE without session', 0),
(770, '2018-11-17 13:45:56', 'LOGIN user =>  , result => false =>Username atau password salah!', 0),
(771, '2018-11-17 13:45:56', 'access HOMEPAGE without session', 0),
(772, '2018-11-17 13:45:56', 'LOGIN user =>  , result => false =>Username atau password salah!', 0),
(773, '2018-11-17 13:45:56', 'access HOMEPAGE without session', 0),
(774, '2018-11-17 13:45:58', 'LOGIN user =>  , result => false =>Username atau password salah!', 0),
(775, '2018-11-17 13:45:58', 'access HOMEPAGE without session', 0),
(776, '2018-11-17 13:46:00', 'a person REGISTER in system ; result =>false', 0),
(777, '2018-11-17 13:46:25', 'a person REGISTER in system ; result =>true', 0),
(778, '2018-11-17 13:46:25', 'access HOMEPAGE without session', 0),
(779, '2018-11-17 13:46:30', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(780, '2018-11-17 13:48:02', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(781, '2018-11-17 13:48:11', 'DELETE USER (muh alfalah) BY ():  user => root( id = 1) ; result => true', 1),
(782, '2018-11-17 13:48:11', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(783, '2018-11-17 13:49:18', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(784, '2018-11-17 13:49:22', 'access HOMEPAGE without session', 0),
(785, '2018-11-17 13:49:24', 'a person REGISTER in system ; result =>false', 0),
(786, '2018-11-17 13:49:48', 'a person REGISTER in system ; result =>true', 0),
(787, '2018-11-17 13:49:48', 'access HOMEPAGE without session', 0),
(788, '2018-11-17 13:49:53', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(789, '2018-11-17 13:50:05', 'EDIT USER (muhalfalah) BY ():  user => root( id = 1) ; result => true', 1),
(790, '2018-11-17 13:50:06', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(791, '2018-11-17 13:50:32', 'LOGIN user => muhalfalah , result => true', 5),
(792, '2018-11-17 13:50:32', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(793, '2018-11-17 13:50:36', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(794, '2018-11-17 13:50:43', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(795, '2018-11-17 13:50:46', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(796, '2018-11-17 13:53:18', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(797, '2018-11-17 13:53:22', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(798, '2018-11-17 13:53:24', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(799, '2018-11-17 13:53:45', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(800, '2018-11-17 13:54:12', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(801, '2018-11-17 13:54:26', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => false  = DATA VALIDATION ERROR', 5),
(802, '2018-11-17 13:54:26', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(803, '2018-11-17 13:54:31', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(804, '2018-11-17 13:54:54', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => true', 5),
(805, '2018-11-17 13:54:54', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(806, '2018-11-17 13:54:55', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(807, '2018-11-17 13:54:59', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(808, '2018-11-17 13:56:45', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(809, '2018-11-17 13:57:03', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(810, '2018-11-17 13:57:07', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(811, '2018-11-17 13:57:09', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(812, '2018-11-17 13:57:15', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(813, '2018-11-17 13:57:19', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(814, '2018-11-17 13:57:23', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(815, '2018-11-17 13:57:27', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(816, '2018-11-17 13:59:32', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(817, '2018-11-17 13:59:38', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(818, '2018-11-17 13:59:43', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(819, '2018-11-17 13:59:46', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(820, '2018-11-17 13:59:50', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(821, '2018-11-17 13:59:54', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => false  = DATA VALIDATION ERROR', 5),
(822, '2018-11-17 13:59:54', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(823, '2018-11-17 14:00:50', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(824, '2018-11-17 14:01:12', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => true', 5),
(825, '2018-11-17 14:01:12', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(826, '2018-11-17 14:01:14', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(827, '2018-11-17 14:01:15', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(828, '2018-11-17 14:01:42', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(829, '2018-11-17 14:03:50', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(830, '2018-11-17 14:03:57', 'EDIT USER (muhalfalah) BY ():  user => root( id = 1) ; result => true', 1),
(831, '2018-11-17 14:03:57', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(832, '2018-11-17 14:04:18', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(833, '2018-11-17 14:07:49', 'EDIT USER (muhalfalah) BY ():  user => root( id = 1) ; result => true', 1),
(834, '2018-11-17 14:07:49', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(835, '2018-11-17 14:08:16', 'EDIT USER (muhalfalah) BY ():  user => root( id = 1) ; result => true', 1),
(836, '2018-11-17 14:08:16', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(837, '2018-11-17 14:09:05', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(838, '2018-11-17 14:09:07', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(839, '2018-11-17 14:09:08', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(840, '2018-11-17 14:09:10', 'ADD DOCUMENT () :  user => muhalfalah( id = 5) ; result => VIEW; ', 5),
(841, '2018-11-17 14:09:14', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(842, '2018-11-17 14:09:45', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(843, '2018-11-17 14:10:01', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(844, '2018-11-17 14:10:04', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(845, '2018-11-17 14:10:14', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(846, '2018-11-17 14:10:20', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(847, '2018-11-17 14:10:25', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(848, '2018-11-17 14:10:38', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(849, '2018-11-17 14:11:02', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(850, '2018-11-17 14:14:03', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(851, '2018-11-17 14:14:06', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(852, '2018-11-17 14:14:29', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(853, '2018-11-17 14:14:38', 'EDIT USER (muhalfalah) BY ():  user => root( id = 1) ; result => true', 1),
(854, '2018-11-17 14:14:38', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(855, '2018-11-18 06:53:58', 'access HOMEPAGE without session', 0),
(856, '2018-11-18 06:53:59', 'LOGIN user => root , result => true', 1),
(857, '2018-11-18 06:53:59', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(858, '2018-11-18 06:54:05', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(859, '2018-11-18 06:54:06', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(860, '2018-11-18 06:54:20', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(861, '2018-11-18 06:54:31', 'access HOMEPAGE without session', 0),
(862, '2018-11-18 06:54:35', 'LOGIN user => muhalfalah , result => true', 5),
(863, '2018-11-18 06:54:35', 'HOMEPAGE :  user => muhalfalah( id = 5) ; result => true', 5),
(864, '2018-11-18 06:54:42', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(865, '2018-11-18 06:54:49', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(866, '2018-11-18 06:54:57', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(867, '2018-11-18 06:55:00', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(868, '2018-11-19 04:23:51', 'access HOMEPAGE without session', 0),
(869, '2018-11-19 04:23:54', 'LOGIN user => root , result => true', 1),
(870, '2018-11-19 04:23:55', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(871, '2018-11-19 04:24:04', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(872, '2018-11-19 04:27:28', 'ADD DOCUMENT () :  user => root( id = 1) ; result => VIEW; ', 1),
(873, '2018-11-19 04:27:30', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(874, '2018-11-19 04:34:34', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(875, '2018-11-19 04:34:45', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(876, '2018-11-19 04:36:54', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(877, '2018-11-19 04:40:05', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(878, '2018-11-19 04:40:42', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(879, '2018-11-19 04:47:01', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(880, '2018-11-19 04:47:12', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(881, '2018-11-19 05:04:38', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(882, '2018-11-19 05:05:07', 'HOMEPAGE :  user => root( id = 1) ; result => true', 1),
(883, '2018-11-19 05:05:10', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(884, '2018-11-19 05:05:34', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(885, '2018-11-19 05:07:36', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(886, '2018-11-19 05:07:40', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(887, '2018-11-19 05:17:05', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(888, '2018-11-19 05:17:18', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(889, '2018-11-19 05:21:54', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(890, '2018-11-19 05:22:14', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(891, '2018-11-19 05:22:21', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(892, '2018-11-19 05:23:25', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(893, '2018-11-19 05:35:10', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(894, '2018-11-19 05:37:55', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(895, '2018-11-19 05:38:48', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(896, '2018-11-19 05:39:06', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(897, '2018-11-19 05:43:05', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(898, '2018-11-19 05:44:48', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(899, '2018-11-19 05:45:32', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(900, '2018-11-19 05:50:24', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(901, '2018-11-19 05:50:51', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(902, '2018-11-19 05:53:02', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(903, '2018-11-19 06:08:31', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(904, '2018-11-19 06:08:49', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(905, '2018-11-19 06:21:21', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(906, '2018-11-19 06:21:26', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(907, '2018-11-19 06:22:48', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(908, '2018-11-19 06:22:50', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(909, '2018-11-19 06:24:28', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(910, '2018-11-19 06:25:40', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(911, '2018-11-19 06:25:56', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(912, '2018-11-19 06:27:53', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(913, '2018-11-19 06:28:13', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(914, '2018-11-19 06:28:22', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(915, '2018-11-19 06:29:37', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(916, '2018-11-19 06:29:44', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(917, '2018-11-19 06:29:49', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(918, '2018-11-19 06:29:54', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(919, '2018-11-19 06:30:01', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(920, '2018-11-19 06:30:14', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(921, '2018-11-19 06:30:46', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(922, '2018-11-19 06:32:11', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(923, '2018-11-19 06:32:17', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(924, '2018-11-19 06:33:05', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(925, '2018-11-19 06:33:25', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(926, '2018-11-19 06:33:30', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(927, '2018-11-19 06:33:45', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(928, '2018-11-19 06:37:31', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(929, '2018-11-19 06:46:35', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(930, '2018-11-19 06:46:42', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(931, '2018-11-19 06:47:00', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(932, '2018-11-19 06:47:07', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(933, '2018-11-19 06:47:22', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(934, '2018-11-19 06:47:25', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(935, '2018-11-19 06:47:45', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(936, '2018-11-19 06:48:04', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(937, '2018-11-19 06:48:07', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(938, '2018-11-19 06:48:18', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(939, '2018-11-19 06:48:23', 'access ADMIN : VIEW user => root( id = 1) ', 1),
(940, '2018-11-19 06:48:35', 'access ADMIN : VIEW user => root( id = 1) ', 1);

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
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` smallint(6) NOT NULL,
  `user_username` varchar(200) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_status`, `user_level`) VALUES
(1, 'root', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(5, 'muhalfalah', '2d4d202a7aeff1d20e22aae310f36696', 1, 2);

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
(5, 'muh alfalah', 'jln haeba dalam', '', 'alan@gmail.com', '081342989185');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`advertise_id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`kamar_id`);

--
-- Indexes for table `kepemilikan`
--
ALTER TABLE `kepemilikan`
  ADD PRIMARY KEY (`kepemilikan_id`,`kost_id`,`kamar_id`),
  ADD KEY `kamar_id` (`kamar_id`),
  ADD KEY `kost_id` (`kost_id`);

--
-- Indexes for table `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`kost_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
  MODIFY `advertise_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `facility_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `kamar_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kepemilikan`
--
ALTER TABLE `kepemilikan`
  MODIFY `kepemilikan_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kost`
--
ALTER TABLE `kost`
  MODIFY `kost_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=941;

--
-- AUTO_INCREMENT for table `mobile`
--
ALTER TABLE `mobile`
  MODIFY `mobile_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
