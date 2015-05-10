-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2015 at 10:53 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambience`
--

CREATE TABLE IF NOT EXISTS `ambience` (
  `id_local_amb` int(11) NOT NULL AUTO_INCREMENT,
  `id_local` int(11) NOT NULL,
  `name_amb` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `info_amb` text COLLATE utf32_unicode_ci NOT NULL,
  `avatar` varchar(350) COLLATE utf32_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_local_amb`),
  KEY `id_local` (`id_local`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ambience`
--

INSERT INTO `ambience` (`id_local_amb`, `id_local`, `name_amb`, `info_amb`, `avatar`, `status`) VALUES
(1, 1, 'Nha xac', 'ten ten ten', 'uploads/1428284204615198659501.jpg', 1),
(2, 1, 'Khu nhà cao tầng', 'phong cách hoang sơ\r\nĐẹp vờ lờ', 'uploads/142830585948619767959.jpg', 1),
(3, 1, 'Khu nhà cao tầng 12', 'adas', 'uploads/142830593916942606885.png', 1),
(4, 1, 'Chung cư phú Mỹ Hưng', 'đẹp vãi', 'uploads/1428306018515345282530.jpg', 1),
(5, 2, 'hồ đá 1', '1213123', 'uploads/142830673613290199290.jpg', 1),
(6, 2, 'Đền Hùng quận 9', 'Qua nhiều ngàn năm dựng nước và giữ nước, Việt Nam có rất nhiều di tích lịch sử và công trình văn hóa quý báu tiêu biểu cho truyền thống đấu tranh kiên cường của các thế hệ người VIệt Nam để bảo tồn và phát triển bản sắc dân tộc.\r\n\r\nThế nhưng các di tích lịch sử và công trình văn hóa của đất nước nằm trải dài từ Bắc đến Nam không phải ai cũng có điều kiện đến được; cho nên việc xây dựng và thể hiện những cột mốc lịch sử và văn hóa dân tộc ở một địa điểm tương đối tập trung là rất cần thiết cho việc giáo dục, phát huy truyền thống dân tộc và tạo điều kiện giao lưu văn hóa trong nước, giới thiệu văn hóa Việt Nam với nước ngoài.....', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `id_contract` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_local` int(11) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date DEFAULT NULL,
  `create_day` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` bigint(20) DEFAULT NULL,
  `payment1` date NOT NULL,
  `payment2` date DEFAULT NULL,
  `payment3` date DEFAULT NULL,
  `timephoto` date DEFAULT NULL,
  `timeadd` int(11) NOT NULL,
  `timecomplete` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_contract`),
  KEY `id_user` (`id_user`),
  KEY `id_contract` (`id_contract`),
  KEY `id_contract_2` (`id_contract`),
  KEY `id_user_2` (`id_user`),
  KEY `id_contract_3` (`id_contract`),
  KEY `id_local` (`id_local`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id_contract`, `id_user`, `id_local`, `start_time`, `end_time`, `create_day`, `total`, `payment1`, `payment2`, `payment3`, `timephoto`, `timeadd`, `timecomplete`, `status`) VALUES
(2, 1, 1, '2015-04-28', '2015-04-16', '2015-04-08 15:48:26', NULL, '2015-04-07', '2015-04-14', '2015-04-09', '2015-04-09', 1, '0000-00-00 00:00:00', 1),
(3, 1, 1, '2015-04-28', '2015-04-16', '2015-04-08 16:21:05', NULL, '2015-04-07', '2015-04-14', '2015-04-09', '2015-04-09', 1, '0000-00-00 00:00:00', 1),
(4, 1, 1, '2015-04-01', '2015-04-08', '2015-04-08 16:35:12', 1, '2015-04-06', '2015-04-01', NULL, '2015-04-08', 2, '0000-00-00 00:00:00', 1),
(5, 1, 1, '2015-04-28', '2015-05-05', '2015-04-08 17:12:11', NULL, '2015-04-21', NULL, NULL, '2015-04-07', 2, '0000-00-00 00:00:00', 1),
(6, 1, 1, '2015-04-29', '2015-05-05', '2015-04-08 17:13:18', 1, '2015-04-24', NULL, NULL, NULL, 1, '0000-00-00 00:00:00', 1),
(7, 1, 1, '2015-04-29', '2015-05-05', '2015-04-08 17:14:47', 1, '2015-04-24', NULL, NULL, NULL, 1, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dress`
--

CREATE TABLE IF NOT EXISTS `dress` (
  `id_dress` int(11) NOT NULL AUTO_INCREMENT,
  `name_dress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type_dress` int(11) NOT NULL,
  `info_dress` text COLLATE utf8_unicode_ci NOT NULL,
  `rate_hire` bigint(20) NOT NULL,
  `rate_sale` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_dress`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `dress`
--

INSERT INTO `dress` (`id_dress`, `name_dress`, `avatar`, `type_dress`, `info_dress`, `rate_hire`, `rate_sale`, `status`) VALUES
(1, 'Áo cưới Phong cách châu âu', 'uploads/1428284204615198659501.jpg', 1, 'mang thương hiệu châu Âu', 100000, 1000, 1),
(2, 'Áo cưới Phong cách châu âu 123', 'uploads/1428369098574548093256.jpg', 1, '123', 12, 12, 1),
(3, 'Áo cưới Phong cách châu âu 123', 'uploads/1428069165428638082777jpg', 1, '123', 12, 12, 1),
(4, 'Áo cưới Phong cách châu âu235', 'uploads/1428246186847715859733.jpg', 123, '123', 123, 123, 1),
(5, 'Áo cưới Phong cách châu âu', 'uploads/142822328933956723834.jpg', 1, '1231', 1000, 1, 1),
(6, 'Áo cưới Phong cách châu âu a', 'uploads/14281627654609623678.jpg', 1, 'ád', 12, 12, 1),
(7, 'Phong cao Châu Phi', 'uploads/1428163241492973008073.jpg', 1, '12', 1, 1, 1),
(8, 'Phong cao Châu Phi', 'uploads/1428163259780041227475.jpg', 1, '12', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dresscontract`
--

CREATE TABLE IF NOT EXISTS `dresscontract` (
  `id_dress` int(11) NOT NULL,
  `id_contract` int(11) NOT NULL,
  KEY `id_dress` (`id_dress`),
  KEY `id_contract` (`id_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id_img`),
  KEY `url` (`url`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=119 ;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id_img`, `url`, `title`, `status`) VALUES
(55, 'uploads/dress/1428290693999451008428.jpg', NULL, 1),
(56, 'uploads/dress/1428290693351737323277.jpg', NULL, 1),
(57, 'uploads/dress/142829069479001529108.jpg', NULL, 1),
(58, 'uploads/dress/1428290694885842266787.jpg', NULL, 1),
(59, 'uploads/dress/1428290694630852772096.jpg', NULL, 1),
(60, 'uploads/dress/14282906942274520974.jpg', NULL, 1),
(61, 'uploads/dress/1428290695119677901931.jpg', NULL, 1),
(62, 'uploads/dress/142829069593866215410.jpg', NULL, 1),
(63, 'uploads/local/1428290940331515225314.jpg', NULL, 1),
(64, 'uploads/local/1428290940346598878391.jpg', NULL, 1),
(65, 'uploads/local/1428290940214840749407.jpg', NULL, 1),
(66, 'uploads/local/1428290940672586528492.jpg', NULL, 1),
(67, 'uploads/local/1428290940406349614510.jpg', NULL, 1),
(68, 'uploads/local/1428290940265510446537.jpg', NULL, 1),
(69, 'uploads/local/1428290940441175032537.jpg', NULL, 1),
(70, 'uploads/local/1428290940989180438972.jpg', NULL, 1),
(71, 'uploads/dress/1428375875144619413831.jpg', NULL, 1),
(72, 'uploads/dress/1428375875843164078176.jpg', NULL, 1),
(73, 'uploads/dress/1428375875647773891034.jpg', NULL, 1),
(74, 'uploads/dress/1428375875821942596250.png', NULL, 1),
(75, 'uploads/dress/1428375876501780084365.jpg', NULL, 1),
(76, 'uploads/dress/1428375876845130438480.jpg', NULL, 1),
(77, 'uploads/dress/1428375876898324294800.jpg', NULL, 1),
(78, 'uploads/dress/1428375877557353001622.jpg', NULL, 1),
(79, 'uploads/dress/142837587749752255504.jpg', NULL, 1),
(80, 'uploads/dress/1428375878446832558374.jpg', NULL, 1),
(81, 'uploads/dress/1428375878678244034328.jpg', NULL, 1),
(82, 'uploads/dress/142837587895513219866.jpg', NULL, 1),
(83, 'uploads/dress/1428375878788139086311.jpg', NULL, 1),
(84, 'uploads/dress/1428375878429386038170.jpg', NULL, 1),
(85, 'uploads/dress/1428375878393661236180.jpg', NULL, 1),
(86, 'uploads/dress/1428375878967813868793.jpg', NULL, 1),
(87, 'uploads/dress/1428377314682873281758.jpg', NULL, 1),
(88, 'uploads/dress/14283773157623454764.jpg', NULL, 1),
(89, 'uploads/dress/142837731519383073671.jpg', NULL, 1),
(90, 'uploads/dress/1428377315949490518754.jpg', NULL, 1),
(91, 'uploads/dress/1428377315491532039035.jpg', NULL, 1),
(92, 'uploads/dress/142837731514876246581.jpg', NULL, 1),
(93, 'uploads/dress/142837731528286681234.jpg', NULL, 1),
(94, 'uploads/dress/1428377315931563675537.jpg', NULL, 1),
(95, 'uploads/dress/142837731561856091589.jpg', NULL, 1),
(96, 'uploads/dress/1428377315890539136597.jpg', NULL, 1),
(97, 'uploads/dress/1428377315143239726857.jpg', NULL, 1),
(98, 'uploads/dress/1428377316552298352926.jpg', NULL, 1),
(99, 'uploads/dress/1428377316345225511732.jpg', NULL, 1),
(100, 'uploads/dress/1428377316295471382374.jpg', NULL, 1),
(101, 'uploads/dress/1428377317806562446350.jpg', NULL, 1),
(102, 'uploads/dress/1428377317467847679983.jpg', NULL, 1),
(103, 'uploads/local/1428377406276293736626.jpg', NULL, 1),
(104, 'uploads/local/1428377406962620482159.jpg', NULL, 1),
(105, 'uploads/local/1428377406852016212720.jpg', NULL, 1),
(106, 'uploads/local/1428377406609960184614.jpg', NULL, 1),
(107, 'uploads/local/1428377406196746283810.jpg', NULL, 1),
(108, 'uploads/local/1428377406954019766184.jpg', NULL, 1),
(109, 'uploads/local/1428377406158223369934.jpg', NULL, 1),
(110, 'uploads/local/1428377406420540223941.jpg', NULL, 1),
(111, 'uploads/dress/1428385010893856319433.jpg', NULL, 1),
(112, 'uploads/dress/1428385011364860956367.jpg', NULL, 1),
(113, 'uploads/dress/142838501177913115576.jpg', NULL, 1),
(114, 'uploads/dress/14283850114431917660.jpg', NULL, 1),
(115, 'uploads/dress/1428385012956962976324.jpg', NULL, 1),
(116, 'uploads/dress/1428385012162752617365.jpg', NULL, 1),
(117, 'uploads/dress/142838501287331554840.jpg', NULL, 1),
(118, 'uploads/dress/1428385012208535288178.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `imgdress`
--

CREATE TABLE IF NOT EXISTS `imgdress` (
  `id_img` int(11) NOT NULL,
  `id_dress` int(11) NOT NULL,
  KEY `id_img` (`id_img`,`id_dress`),
  KEY `id_dress` (`id_dress`),
  KEY `id_img_2` (`id_img`),
  KEY `id_dress_2` (`id_dress`),
  KEY `id_img_3` (`id_img`),
  KEY `id_dress_3` (`id_dress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imgdress`
--

INSERT INTO `imgdress` (`id_img`, `id_dress`) VALUES
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(83, 2),
(84, 2),
(85, 2),
(86, 2),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1);

-- --------------------------------------------------------

--
-- Table structure for table `imglocal`
--

CREATE TABLE IF NOT EXISTS `imglocal` (
  `id_local` int(11) NOT NULL,
  `id_img` int(11) NOT NULL,
  KEY `id_local` (`id_local`,`id_img`),
  KEY `id_img` (`id_img`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imglocal`
--

INSERT INTO `imglocal` (`id_local`, `id_img`) VALUES
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(2, 103),
(2, 104),
(2, 105),
(2, 106),
(2, 107),
(2, 108),
(2, 109),
(2, 110);

-- --------------------------------------------------------

--
-- Table structure for table `imgtool`
--

CREATE TABLE IF NOT EXISTS `imgtool` (
  `id_tool` int(11) NOT NULL,
  `id_img` int(11) NOT NULL,
  KEY `id_tool` (`id_tool`,`id_img`),
  KEY `id_img` (`id_img`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `localtion`
--

CREATE TABLE IF NOT EXISTS `localtion` (
  `id_local` int(11) NOT NULL AUTO_INCREMENT,
  `name_local` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `info_local` text COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timework` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_local`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `localtion`
--

INSERT INTO `localtion` (`id_local`, `name_local`, `info_local`, `rate`, `avatar`, `timework`, `status`) VALUES
(1, 'Phú Mỹ Hưng Quận 7', '123', 10000, 'uploads/1428287319217738861292.jpg', 5, 1),
(2, 'Hồ Đá Thủ Đức', 'Ảnh cưới ở Hồ Đá ở Thủ Đức luôn được khá nhiều cặp đôi yêu thích nhờ khung cảnh thiên nhiên bình dị lý tưởng cho những đôi uyên ương yêu cảnh vật tự nhiên\r\n\r\nHồ Đá ở Thủ Đức được biết đến là một nơi có cảnh quan thiên nhiên bình dị với những hồ nước nguyên sơ mộc mạc, những đồi cỏ lau trắng thơ mộng, chính vì thế Hồ Đá luôn là một địa điểm chụp ảnh cưới lý tưởng được đông đảo cô dâu chú rể yêu thích.\r\n\r\nCùng Cưới Hỏi Việt Nam xem qua những thước ảnh cưới thật đẹp thật bình dị tại Hồ Đá Thủ Đức được chụp bởi studio áo cưới Estella Bridal và studio T Wedding', 25000, 'uploads/142830665722867745101.jpg', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1427982328),
('m130524_201442_init', 1427982331);

-- --------------------------------------------------------

--
-- Table structure for table `staffcontract`
--

CREATE TABLE IF NOT EXISTS `staffcontract` (
  `id_user` int(11) NOT NULL,
  `id_contract` int(11) NOT NULL,
  KEY `id_user` (`id_user`,`id_contract`),
  KEY `id_contract` (`id_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timework`
--

CREATE TABLE IF NOT EXISTS `timework` (
  `id_timework` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `monthday` datetime NOT NULL,
  `timework` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_timework`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

CREATE TABLE IF NOT EXISTS `tool` (
  `id_tool` int(11) NOT NULL AUTO_INCREMENT,
  `name_tool` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img_tool` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rate_tool` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_tool`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `toolcontract`
--

CREATE TABLE IF NOT EXISTS `toolcontract` (
  `id_tool` int(11) NOT NULL,
  `id_contract` int(11) NOT NULL,
  KEY `id_tool` (`id_tool`),
  KEY `id_contract` (`id_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_user`
--

CREATE TABLE IF NOT EXISTS `type_user` (
  `id_type` int(11) NOT NULL,
  `name_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_user`
--

INSERT INTO `type_user` (`id_type`, `name_type`) VALUES
(1, 'Customer'),
(2, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_user` int(11) NOT NULL,
  `range_user` int(11) DEFAULT NULL,
  `rate_user` int(11) DEFAULT NULL,
  `fullname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fullname2` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tell` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `tell2` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info_user` text COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `have_contract` int(11) DEFAULT '0',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `type_user`, `range_user`, `rate_user`, `fullname`, `fullname2`, `tell`, `tell2`, `email`, `email2`, `info_user`, `address`, `avatar`, `have_contract`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', '$2y$13$0.jOKjGgjy8u5wdcaQHJfOykF/r3jJrnhEfhEKPDjqtKrxGXAmsfG', NULL, 1, NULL, NULL, '', NULL, '', NULL, 'vannhan.nguyen0405@gmail.com', NULL, '', '', '', 1, 10, 1427982490, 1427982490),
(4, 'nhannguyen', 'Z79uTWbLCj6366cqfdw8tiDHLq5vrzsK', '$2y$13$E9j5kmFiCOWJKvnxIK0R1uNgvNu78jtyRASY.xf3uQ4RZbnfE4J02', NULL, 0, NULL, NULL, '', NULL, '', NULL, 'vannhan.nguyen0405@gmail.coms', NULL, '', '', '', 0, 10, 1428396746, 1428396746),
(5, 'admin12', 'Z79uTWbLCj6366cqfdw8tiDHLq5vrzsK', '$2y$13$E9j5kmFiCOWJKvnxIK0R1uNgvNu78jtyRASY.xf3uQ4RZbnfE4J02', '', 1, 1, NULL, '1', '', '1', '', 'nhannguyen@gmail.com221', '', '1', '1', '1', 0, 1, 1, 1),
(6, 'nhannguyen12', 'Z79uTWbLCj6366cqfdw8tiDHLq5vrzsK', '$2y$13$E9j5kmFiCOWJKvnxIK0R1uNgvNu78jtyRASY.xf3uQ4RZbnfE4J02', NULL, 0, NULL, NULL, '', NULL, '', NULL, 'vannhan.nguyen0405@gmail.coms', NULL, '', '', '', 0, 10, 1428396746, 1428396746),
(7, 'zetnhan', 'AX5JIdDt7feAWqQGQV0Me1xh3LSZvCwX', '$2y$13$Dy.iwUPP6eP3vsQrXT7K2OlKX9BXwhTUx3OqmXQrOMg05Y4FkJokm', NULL, 0, NULL, NULL, '', NULL, '', NULL, 'admin@gmail.com', NULL, '', '', '', 0, 10, 1428459152, 1428459152),
(8, 'zetnhantest', 'qx2prxjPEZ9LBL_HK4j1QUQ64fyU8IA8', '$2y$13$0uohBHCYvCFa.j/1otrDe.wOcVwtdOiW0yRx5NMczUQtzV51CCJDi', NULL, 0, NULL, NULL, '', NULL, '', NULL, 'admin1@gmail.com', NULL, '', '', '', 0, 10, 1428459597, 1428459597),
(9, 'nhannguyencs101', 'szLkGOvsZlBcY41o6CEWKLko6ske3GZ8', '$2y$13$v56oTdIBwGt3yy/6HPcbeew18A0./9p0FRRaB3L1LqTg57cb2GauW', NULL, 0, NULL, NULL, '', NULL, '', NULL, 'vannhan.nguyen0405@gmail.coms1', NULL, '', '', '', 0, 10, 1428462747, 1428462747),
(10, 'zetnhan1234', 'hX5fbK2UazahwVxg7CJoT2WOV3NTGN0g', '$2y$13$r8jdfVDLm/cVYnMfGIcBROKcvUNTz37T0oT9U1W4EA7d81vmllboW', NULL, 0, NULL, NULL, '', NULL, '', NULL, 'vannhan.nguyen0405@gmail.com1231', NULL, '', '', '', 0, 10, 1428463965, 1428463965),
(11, 'admin1@gmail.com', 'CFFWhRAjwjFv4OCdaF6jKsoL1v-kqDHd', '$2y$13$MCm1WMxGMS72xFLuazrpy.zC2oVzI3Onds1JdDiweJe65uwVnkSly', NULL, 1, NULL, NULL, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com12312313', NULL, '', '268 Lý thường kiệt', '', 0, 10, 1428464258, 1428464258),
(12, 'znhan', '3ZZ1CTIA58Rs3pzA7L-Kdstr3h5Hicku', '$2y$13$2kWi7hRL2raO4um2jfK91OWPkZKMce6swOx5ua/jxkkj8Zayua5sW', NULL, 1, NULL, NULL, 'Nguyễn Văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com123123sd', NULL, 'Tao là customer', '268 Lý thường kiệt', '', 0, 10, 1428488501, 1428488501);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ambience`
--
ALTER TABLE `ambience`
  ADD CONSTRAINT `ambience_ibfk_1` FOREIGN KEY (`id_local`) REFERENCES `localtion` (`id_local`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `fk_contract_local` FOREIGN KEY (`id_local`) REFERENCES `localtion` (`id_local`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contract_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dresscontract`
--
ALTER TABLE `dresscontract`
  ADD CONSTRAINT `fk_contract_dress` FOREIGN KEY (`id_contract`) REFERENCES `contract` (`id_contract`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dress_contract` FOREIGN KEY (`id_dress`) REFERENCES `dress` (`id_dress`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imgdress`
--
ALTER TABLE `imgdress`
  ADD CONSTRAINT `id_dress_img` FOREIGN KEY (`id_dress`) REFERENCES `dress` (`id_dress`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_img_dress` FOREIGN KEY (`id_img`) REFERENCES `img` (`id_img`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imglocal`
--
ALTER TABLE `imglocal`
  ADD CONSTRAINT `fk_img_local` FOREIGN KEY (`id_img`) REFERENCES `img` (`id_img`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_local_img` FOREIGN KEY (`id_local`) REFERENCES `localtion` (`id_local`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imgtool`
--
ALTER TABLE `imgtool`
  ADD CONSTRAINT `fk_img_tool` FOREIGN KEY (`id_tool`) REFERENCES `tool` (`id_tool`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tool_img` FOREIGN KEY (`id_img`) REFERENCES `img` (`id_img`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staffcontract`
--
ALTER TABLE `staffcontract`
  ADD CONSTRAINT `fk_contract_staff` FOREIGN KEY (`id_contract`) REFERENCES `contract` (`id_contract`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_staff_contract` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timework`
--
ALTER TABLE `timework`
  ADD CONSTRAINT `fk_staff_timework` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `toolcontract`
--
ALTER TABLE `toolcontract`
  ADD CONSTRAINT `fk_contract_tool` FOREIGN KEY (`id_contract`) REFERENCES `contract` (`id_contract`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tool_contract` FOREIGN KEY (`id_tool`) REFERENCES `tool` (`id_tool`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
