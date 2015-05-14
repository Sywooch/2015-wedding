-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2015 at 08:35 AM
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
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `id_contract` int(11) NOT NULL,
  `url_psd` varchar(350) COLLATE utf32_unicode_ci DEFAULT NULL,
  `numpage` int(11) NOT NULL,
  `time_complete` datetime DEFAULT NULL,
  `url_folder` int(11) DEFAULT NULL,
  `rate` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_album`),
  KEY `id_customer` (`id_contract`),
  KEY `id_contract` (`id_contract`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `id_contract`, `url_psd`, `numpage`, `time_complete`, `url_folder`, `rate`, `status`) VALUES
(13, 17, NULL, 40, NULL, NULL, NULL, 0),
(14, 18, NULL, 30, NULL, NULL, NULL, 0),
(15, 19, NULL, 15, NULL, NULL, NULL, 0),
(16, 20, NULL, 35, NULL, NULL, NULL, 0),
(17, 21, NULL, 35, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ambience`
--

CREATE TABLE IF NOT EXISTS `ambience` (
  `id_local_amb` int(11) NOT NULL AUTO_INCREMENT,
  `id_local` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_amb` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `info_amb` text COLLATE utf32_unicode_ci NOT NULL,
  `avatar` varchar(350) COLLATE utf32_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_local_amb`),
  KEY `id_local` (`id_local`),
  KEY `id_local_2` (`id_local`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bigimg`
--

CREATE TABLE IF NOT EXISTS `bigimg` (
  `id_contract` int(11) NOT NULL,
  `id_img` int(11) DEFAULT NULL,
  `size` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  KEY `id_contract` (`id_contract`,`id_img`,`size`),
  KEY `id_img` (`id_img`),
  KEY `size` (`size`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bigimg`
--

INSERT INTO `bigimg` (`id_contract`, `id_img`, `size`) VALUES
(17, NULL, '60x90'),
(18, NULL, '60x90'),
(19, NULL, '50x75'),
(20, NULL, '60x90'),
(21, NULL, '60x90');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `id_contract` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_local` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
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
  `have_album` int(11) DEFAULT '0',
  `total_time` double NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id_contract`),
  KEY `id_user` (`id_user`),
  KEY `id_contract` (`id_contract`),
  KEY `id_contract_2` (`id_contract`),
  KEY `id_user_2` (`id_user`),
  KEY `id_contract_3` (`id_contract`),
  KEY `id_local` (`id_local`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id_contract`, `id_user`, `id_local`, `start_time`, `end_time`, `create_day`, `total`, `payment1`, `payment2`, `payment3`, `timephoto`, `timeadd`, `timecomplete`, `have_album`, `total_time`, `status`) VALUES
(17, 11, 'L1429634734', '2015-05-23', '2015-05-26', '2015-05-06 11:46:05', 368937413, '2015-05-23', NULL, NULL, NULL, 0, NULL, 0, 3, 1),
(18, 13, 'L1429634734', '2015-05-10', '2015-05-13', '2015-05-06 22:37:34', 38970788, '2015-05-23', NULL, NULL, NULL, 0, NULL, 0, 3, 1),
(19, 5, 'L1429606564', '2015-05-23', '2015-05-28', '2015-05-13 00:50:04', 16750945, '2015-05-23', NULL, NULL, NULL, 0, NULL, 0, 5, 1),
(20, 7, 'L1429634759', '2015-05-04', '2015-05-05', '2015-05-13 00:58:58', 5950400, '2015-05-04', NULL, NULL, NULL, 0, NULL, 0, 1, 1),
(21, 11, 'L1429606564', '2015-06-10', '2015-06-15', '2015-05-13 01:00:51', 17950945, '2015-06-10', NULL, NULL, NULL, 0, NULL, 0, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dress`
--

CREATE TABLE IF NOT EXISTS `dress` (
  `id_dress` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name_dress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type_dress` int(11) NOT NULL,
  `info_dress` text COLLATE utf8_unicode_ci NOT NULL,
  `rate_hire` bigint(20) NOT NULL,
  `rate_sale` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_dress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dress`
--

INSERT INTO `dress` (`id_dress`, `name_dress`, `avatar`, `type_dress`, `info_dress`, `rate_hire`, `rate_sale`, `status`) VALUES
('D1429595409', 'Phong cách cổ điển', 'uploads/1429595409159161461832.jpg', 1, '1', 1000000, 1000000, 1),
('D1429605821', 'Áo cưới Phong cách châu âu 123', 'uploads/1429605821943542836411.jpg', 1, '1', 1000000, 1000000, 1),
('D1429607851', 'Áo cưới ngắn cá tính', 'uploads/1429607851392487899522.jpg', 1, '1', 1000000, 1000000, 1),
('D1429632433', 'Áo cưới Phong cách châu âu 123', 'uploads/142963243358671741637.jpg', 1, '1', 1000000, 12121212, 1),
('D1429633073', 'Áo cưới Phong cách châu âu235', 'uploads/1429633073148455647617.jpg', 1, '1', 121212121, 10000012, 1),
('D1429634405', 'Áo cưới Phong cách châu âuègfegf', 'uploads/1429634405170470153188.jpg', 1, 'q', 1000000, 1000000, 1),
('D1429634456', 'Áo cưới Phong cách châu âu23532', 'uploads/1429634456951389266678.jpg', 1, '2', 12123234, 12312334, 1),
('D1429634584', 'Phong cách cổ điển 12', 'uploads/142963458497246566350.jpg', 1, '1', 12, 12, 1),
('D1431522087', 'Áo cưới chữ U', 'uploads/1431522087515093863961.jpg', 1, 'áo cưới chữ U', 1000000, 1000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dresscontract`
--

CREATE TABLE IF NOT EXISTS `dresscontract` (
  `id_dress` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_contract` int(11) NOT NULL,
  KEY `id_dress` (`id_dress`),
  KEY `id_contract` (`id_contract`),
  KEY `id_dress_2` (`id_dress`),
  KEY `id_contract_2` (`id_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dresscontract`
--

INSERT INTO `dresscontract` (`id_dress`, `id_contract`) VALUES
('D1429633073', 17),
('D1429634405', 17),
('D1429634456', 18),
('D1429634584', 18),
('D1429595409', 19),
('D1429605821', 19),
('D1429607851', 19),
('D1429595409', 20),
('D1429605821', 20),
('D1429607851', 20),
('D1429595409', 21),
('D1429605821', 21),
('D1429607851', 21);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=191 ;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id_img`, `url`, `title`, `status`) VALUES
(139, 'uploads/dress/1429605834763722965676.jpg', NULL, 1),
(140, 'uploads/dress/142960583410369523277.jpg', NULL, 1),
(141, 'uploads/dress/142960583556467403622.jpg', NULL, 1),
(142, 'uploads/dress/1429605835900429393041.jpg', NULL, 1),
(143, 'uploads/dress/142960583533364139745.jpg', NULL, 1),
(144, 'uploads/dress/1429605835545747813444.jpg', NULL, 1),
(145, 'uploads/dress/1429605835324980879643.jpg', NULL, 1),
(146, 'uploads/dress/1429605835903456419371.jpg', NULL, 1),
(147, 'uploads/dress/142960631976999713320.jpg', NULL, 1),
(148, 'uploads/dress/1429606319955583279349.jpg', NULL, 1),
(149, 'uploads/dress/1429606319872086892114.jpg', NULL, 1),
(150, 'uploads/dress/1429606319784983185538.jpg', NULL, 1),
(151, 'uploads/dress/1429606319682164074303.jpg', NULL, 1),
(152, 'uploads/dress/142960632085402131961.jpg', NULL, 1),
(153, 'uploads/dress/1429606320386211312736.jpg', NULL, 1),
(154, 'uploads/dress/1429606320244991831750.jpg', NULL, 1),
(155, 'uploads/local/1429606589195930716038.jpg', NULL, 1),
(156, 'uploads/local/1429606589674340188163.jpg', NULL, 1),
(157, 'uploads/local/142960658991437301839.jpg', NULL, 1),
(158, 'uploads/local/1429606589128172277590.jpg', NULL, 1),
(159, 'uploads/local/1429606589260958664980.jpg', NULL, 1),
(160, 'uploads/local/142960659082588517351.jpg', NULL, 1),
(161, 'uploads/local/1429606590208786726748.jpg', NULL, 1),
(162, 'uploads/local/1429606590817832399769.jpg', NULL, 1),
(163, 'uploads/dress/1429630559928665543650.jpg', NULL, 1),
(164, 'uploads/dress/1429630560511128735733.jpg', NULL, 1),
(165, 'uploads/dress/142963056097297245426.jpg', NULL, 1),
(166, 'uploads/dress/1429630560207971158976.png', NULL, 1),
(167, 'uploads/dress/1429630560538152811747.jpg', NULL, 1),
(168, 'uploads/dress/14296305607051617625.jpg', NULL, 1),
(169, 'uploads/dress/1429630560456471376248.jpg', NULL, 1),
(170, 'uploads/dress/1429630561600115016423.jpg', NULL, 1),
(171, 'uploads/dress/1430796920634376305248.jpg', NULL, 1),
(172, 'uploads/dress/1430796920615762788703.jpg', NULL, 1),
(173, 'uploads/dress/143079692078306961740.jpg', NULL, 1),
(174, 'uploads/dress/143079692022567835686.jpg', NULL, 1),
(175, 'uploads/dress/1430796920616829775045.jpg', NULL, 1),
(176, 'uploads/dress/143079692033117998554.jpg', NULL, 1),
(177, 'uploads/dress/14307969206552761667.jpg', NULL, 1),
(178, 'uploads/dress/143079692096756243223.jpg', NULL, 1),
(179, 'uploads/dress/143079692026152455.jpg', NULL, 1),
(180, 'uploads/dress/1430796920888472776293.jpg', NULL, 1),
(181, 'uploads/dress/1430796920892789323091.jpg', NULL, 1),
(182, 'uploads/dress/1430796921816787947554.jpg', NULL, 1),
(183, 'uploads/dress/1431522112100790422689.jpg', NULL, 1),
(184, 'uploads/dress/1431522112889014351369.jpg', NULL, 1),
(185, 'uploads/dress/1431522112955376929033.jpg', NULL, 1),
(186, 'uploads/dress/1431522112500590543896.jpg', NULL, 1),
(187, 'uploads/dress/1431522112348458888379.jpg', NULL, 1),
(188, 'uploads/dress/143152211294194804954.jpg', NULL, 1),
(189, 'uploads/dress/1431522113971672636705.jpg', NULL, 1),
(190, 'uploads/dress/143152211381422516300.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `imgdress`
--

CREATE TABLE IF NOT EXISTS `imgdress` (
  `id_img` int(11) NOT NULL,
  `id_dress` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
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
(147, 'D1429605821'),
(148, 'D1429605821'),
(149, 'D1429605821'),
(150, 'D1429605821'),
(151, 'D1429605821'),
(152, 'D1429605821'),
(153, 'D1429605821'),
(154, 'D1429605821'),
(163, 'D1429595409'),
(164, 'D1429595409'),
(165, 'D1429595409'),
(166, 'D1429595409'),
(167, 'D1429595409'),
(168, 'D1429595409'),
(169, 'D1429595409'),
(170, 'D1429595409'),
(171, 'D1429633073'),
(172, 'D1429633073'),
(173, 'D1429633073'),
(174, 'D1429633073'),
(175, 'D1429633073'),
(176, 'D1429633073'),
(177, 'D1429633073'),
(178, 'D1429633073'),
(179, 'D1429633073'),
(180, 'D1429633073'),
(181, 'D1429633073'),
(182, 'D1429633073'),
(183, 'D1431522087'),
(184, 'D1431522087'),
(185, 'D1431522087'),
(186, 'D1431522087'),
(187, 'D1431522087'),
(188, 'D1431522087'),
(189, 'D1431522087'),
(190, 'D1431522087');

-- --------------------------------------------------------

--
-- Table structure for table `imglocal`
--

CREATE TABLE IF NOT EXISTS `imglocal` (
  `id_local` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_img` int(11) NOT NULL,
  KEY `id_local` (`id_local`,`id_img`),
  KEY `id_img` (`id_img`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imglocal`
--

INSERT INTO `imglocal` (`id_local`, `id_img`) VALUES
('L1429606564', 155),
('L1429606564', 156),
('L1429606564', 157),
('L1429606564', 158),
('L1429606564', 159),
('L1429606564', 160),
('L1429606564', 161),
('L1429606564', 162);

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
  `id_local` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name_local` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `info_local` text COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timework` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_local`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `localtion`
--

INSERT INTO `localtion` (`id_local`, `name_local`, `info_local`, `rate`, `avatar`, `timework`, `status`) VALUES
('L1429606564', 'Phú Mỹ Hưng Quận 7', 'Phú Mỹ Hưng Quận 7', 9500000, 'uploads/1429606564224921152356.jpg', 5, 1),
('L1429634734', 'Ảnh cưới thác Giang Điền (Trảng Bom - Đồng Nai)', '1', 9500000, 'uploads/1429634734901451311129.jpg', 3, 1),
('L1429634759', 'Hồ Đá Thủ Đức', '1', 1000012, 'uploads/142963475919661195557.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `makeupcontract`
--

CREATE TABLE IF NOT EXISTS `makeupcontract` (
  `id_user` int(11) NOT NULL,
  `id_contract` int(11) NOT NULL,
  KEY `id_user` (`id_user`,`id_contract`),
  KEY `id_contract` (`id_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `makeupcontract`
--

INSERT INTO `makeupcontract` (`id_user`, `id_contract`) VALUES
(16, 18),
(16, 19),
(16, 20),
(16, 21),
(20, 17);

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
-- Table structure for table `photocontract`
--

CREATE TABLE IF NOT EXISTS `photocontract` (
  `id_user` int(11) NOT NULL,
  `id_contract` int(11) NOT NULL,
  KEY `id_user` (`id_user`),
  KEY `id_contract` (`id_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photocontract`
--

INSERT INTO `photocontract` (`id_user`, `id_contract`) VALUES
(17, 17),
(17, 18),
(10, 19),
(18, 20),
(10, 21);

-- --------------------------------------------------------

--
-- Table structure for table `ratealbum`
--

CREATE TABLE IF NOT EXISTS `ratealbum` (
  `page_num` int(11) NOT NULL,
  `rate` bigint(20) NOT NULL,
  PRIMARY KEY (`page_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ratealbum`
--

INSERT INTO `ratealbum` (`page_num`, `rate`) VALUES
(15, 1000000),
(20, 1200000),
(25, 1400000),
(30, 1650000),
(35, 2000000),
(40, 2300000),
(45, 2500000),
(50, 2750000);

-- --------------------------------------------------------

--
-- Table structure for table `sizebigimg`
--

CREATE TABLE IF NOT EXISTS `sizebigimg` (
  `size` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rate` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`size`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sizebigimg`
--

INSERT INTO `sizebigimg` (`size`, `rate`) VALUES
('50x75', 750000),
('60x90', 950000),
('70x110', 1300000);

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
-- Table structure for table `status_album`
--

CREATE TABLE IF NOT EXISTS `status_album` (
  `status_album` int(11) NOT NULL,
  `name_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_album`
--

INSERT INTO `status_album` (`status_album`, `name_status`) VALUES
(0, 'Chưa làm gì'),
(1, 'Tạo file psd mẫu'),
(3, 'Phòng In'),
(4, 'Hoàn tất');

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
(0, 'Admin'),
(1, 'Customer'),
(2, 'Photo'),
(3, 'Make Up'),
(4, 'Assistant');

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
  `rate_user` bigint(11) DEFAULT '0',
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `type_user`, `range_user`, `rate_user`, `fullname`, `fullname2`, `tell`, `tell2`, `email`, `email2`, `info_user`, `address`, `avatar`, `have_contract`, `status`, `created_at`, `updated_at`) VALUES
(4, 'nhannguyen', 'Z79uTWbLCj6366cqfdw8tiDHLq5vrzsK', '$2y$13$E9j5kmFiCOWJKvnxIK0R1uNgvNu78jtyRASY.xf3uQ4RZbnfE4J02', NULL, 0, NULL, 100, '', NULL, '', NULL, 'vannhan.nguyen0405@gmail.coms', NULL, '', '', '', 0, 10, 1428396746, 1428396746),
(5, 'admin12', 'Z79uTWbLCj6366cqfdw8tiDHLq5vrzsK', '$2y$13$E9j5kmFiCOWJKvnxIK0R1uNgvNu78jtyRASY.xf3uQ4RZbnfE4J02', '', 1, 1, 200, '1', '', '1', '', 'nhannguyen@gmail.com221', '', '1', '1', '1', 1, 1, 1, 1),
(6, 'nhannguyen12', 'Z79uTWbLCj6366cqfdw8tiDHLq5vrzsK', '$2y$13$E9j5kmFiCOWJKvnxIK0R1uNgvNu78jtyRASY.xf3uQ4RZbnfE4J02', NULL, 0, NULL, 200, '', NULL, '', NULL, 'vannhan.nguyen0405@gmail.coms', NULL, '', '', '', 0, 10, 1428396746, 1428396746),
(7, 'zetnhan', 'AX5JIdDt7feAWqQGQV0Me1xh3LSZvCwX', '$2y$13$Dy.iwUPP6eP3vsQrXT7K2OlKX9BXwhTUx3OqmXQrOMg05Y4FkJokm', NULL, 1, NULL, 210, '', NULL, '', NULL, 'admin@gmail.com', NULL, '', '', '', 1, 10, 1428459152, 1428459152),
(8, 'zetnhantest', 'qx2prxjPEZ9LBL_HK4j1QUQ64fyU8IA8', '$2y$13$0uohBHCYvCFa.j/1otrDe.wOcVwtdOiW0yRx5NMczUQtzV51CCJDi', NULL, 0, NULL, 100, '', NULL, '', NULL, 'admin1@gmail.com', NULL, '', '', '', 0, 10, 1428459597, 1428459597),
(9, 'nhannguyencs101', 'szLkGOvsZlBcY41o6CEWKLko6ske3GZ8', '$2y$13$v56oTdIBwGt3yy/6HPcbeew18A0./9p0FRRaB3L1LqTg57cb2GauW', NULL, 0, NULL, 150, '', NULL, '', NULL, 'vannhan.nguyen0405@gmail.coms1', NULL, '', '', '', 0, 10, 1428462747, 1428462747),
(10, 'zetnhan1234', 'hX5fbK2UazahwVxg7CJoT2WOV3NTGN0g', '$2y$13$r8jdfVDLm/cVYnMfGIcBROKcvUNTz37T0oT9U1W4EA7d81vmllboW', NULL, 2, NULL, 89, '', NULL, '', NULL, 'vannhan.nguyen0405@gmail.com1231', NULL, '', '', '', 0, 10, 1428463965, 1428463965),
(11, 'admin1@gmail.com', 'CFFWhRAjwjFv4OCdaF6jKsoL1v-kqDHd', '$2y$13$MCm1WMxGMS72xFLuazrpy.zC2oVzI3Onds1JdDiweJe65uwVnkSly', NULL, 1, NULL, 102, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com12312313', NULL, '', '268 Lý thường kiệt', '', 1, 10, 1428464258, 1428464258),
(12, 'znhan', '3ZZ1CTIA58Rs3pzA7L-Kdstr3h5Hicku', '$2y$13$2kWi7hRL2raO4um2jfK91OWPkZKMce6swOx5ua/jxkkj8Zayua5sW', NULL, 1, NULL, 90, 'Nguyễn Văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com123123sd', NULL, 'Tao là customer', '268 Lý thường kiệt', '', 0, 10, 1428488501, 1428488501),
(13, 'adminkeke', 'fU0lUEwuvp8wAjaQU4d9QZzX5PA6rf1A', '$2y$13$hGagIdidM/44HyyMbbhdDOosYTQtZGHqaIZGWI5lZ8XJM772Rj15i', NULL, 1, NULL, 125, 'Nguyễn văn Nhàn', NULL, '1', NULL, 'vannhan.nguyen0405@gmail.com1', NULL, '1', '1', '', 0, 10, 1428903072, 1428903072),
(14, 'wtf', '-_Deuj3D57wNktce-lxWQqivlTuZ8nue', '$2y$13$zFMLAyyYBxU2nQ30ZbvAo.22kxjC7p7RcDmfKtsTfMka9w5g0ytiG', NULL, 2, NULL, 94, '1', NULL, '1', NULL, 'vannhan.nguyen0405@gmail.com11231', NULL, '12', '12', '', 0, 10, 1428903113, 1428903113),
(15, 'nguyenvannhan', 'mKn70uztNfrblknx3fEnTtmgV2vbbD2y', '$2y$13$I9ec3n6XEX9c1ia5MS68ge9y8NMqj8fUzzi4m9avmL.9IFFY20Hyu', NULL, 1, NULL, 175, 'Nguyễn Văn Nhàn', NULL, '0938194492', NULL, '51002201@hcmut.edu.vn', NULL, 'hello', '268 Lý thường kiệt', '', 0, 10, 1428992062, 1428992062),
(16, 'hoho', 'IRDYCBz0kp57Ht0SMu-2hDvXRV8Y-vQC', '$2y$13$lvtF5kb2ySjBQ/gdxtT04OZJrd/LRKWIzlJxoeLGPYvyMr1lNl5Jq', NULL, 3, NULL, 100, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com1212', NULL, '1', '268 Lý thường kiệt', '', 0, 10, 1429684226, 1429684226),
(17, 'nhannguyen92', 'zFI0KfVUiM3GzouGTsLpOutpwPEyhUhP', '$2y$13$rnMnxZ3DJ3y8LDNEvrdeHOhzI8UNAYcqWKaofehs0mO0SlbsqY.JG', NULL, 2, NULL, 250, 'Nguyễn văn Nhàn', NULL, '1', NULL, 'vannhan.nguyen0405@gmail.com21', NULL, '1', '1', '', 0, 10, 1429686424, 1429686424),
(18, 'nhannguyencs10', 'pu69cNXfoWnIsg2n0YM6CO8X5PV_Xwh1', '$2y$13$k.uildQVWJiUxwWiimavNO.PzBzHrFWPTy7g2rc9ba7My6QFDGDVG', NULL, 2, NULL, 300, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com132', NULL, '1', '1', '', 0, 10, 1429686477, 1429686477),
(19, 'znznznzn', '7gb2QYK3bYhMKROEQNoK4iJSIEZ04OAe', '$2y$13$mblPPR4nEBXvPPyrfTprJOSX9B8NJ7ra4ML2CHCz5ZFDeOZH012wq', NULL, 1, NULL, 82, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com765432', NULL, '1', '268 Lý thường kiệt', '', 0, 10, 1430731898, 1430731898),
(20, 'nhannguyen123', 'cjMMFr4dGI5bAgy6v7Zh0y0jnC2oi24Y', '$2y$13$qO9jJf48XjveX6wq6FwWB.8f/.8.6LF0ikQfS4C7EPyh8/VTciGry', NULL, 3, NULL, 100, 'Nguyễn Văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com12', NULL, '12', '268 Lý thường kiệt', '', 0, 10, 1430746652, 1430746652),
(21, 'nhannguyencs1234', 'zXfHg7T38ZS4YnUfxEmfVL18WowJFduu', '$2y$13$lJx9lc1JV9/QZYffESAH6.rObWVW.0Qa.L3WVnzrbwKIgfZ5NUpwe', NULL, 2, NULL, 0, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com1234', NULL, 'I''m photograper', '268 Lý thường kiệt', '', 0, 10, 1431424733, 1431424733),
(22, 'vannhan', 'OY9AkcDkAkcvWnu3PQ4x66JGgGFeygwT', '$2y$13$gLzTN.9HYaMFOiFYVQcrC.xiuiIwC3UOVYuLiJOGjrust37jFnQmW', NULL, 2, 1, 150000, 'Nguyễn Văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com21213', NULL, 'I am photograper', '268 Lý thường kiệt', '', 0, 10, 1431441917, 1431441917),
(25, 'admintor', 'IfHLn0HrLiG5VaP_xLOPI4kQkjWVmFB7', '$2y$13$w8izNT0uR3F24QYsngoteuapXIqK9Eq8xe37G2f.haKgfZ0O0h/6S', NULL, 0, NULL, NULL, 'Nguyễn Văn Nhàn', NULL, '0938194492', NULL, '51002201@hcmut.edu.vn12', NULL, '1', '268 Lý thường kiệt', '', 0, 10, 1431572471, 1431572471),
(26, '123456', 'IEdZYvMnXUelV5bGTSfKtesZXfpE-qtT', '$2y$13$rmQog1huU5uhY8imtRJSiu47KMBWvsNIvDt4jy3UxKNDn/hHhbmNe', NULL, 0, NULL, 0, '', NULL, '', NULL, 'vannhan.nguyen0405@gmail.com1223', NULL, '', '', '', 0, 10, 1431574784, 1431574784),
(27, 'admin', 'IEdZYvMnXUelV5bGTSfKtesZXfpE-qtT', '$2y$13$rmQog1huU5uhY8imtRJSiu47KMBWvsNIvDt4jy3UxKNDn/hHhbmNe', NULL, 0, NULL, NULL, '1', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com123123', NULL, '123', 'Tổ 10, KV8, P. Ngô Mây, TP. Quy Nhơn, tỉnh Bình Định', '', 0, 10, 1431584162, 1431584162);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_contract`) REFERENCES `contract` (`id_contract`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ambience`
--
ALTER TABLE `ambience`
  ADD CONSTRAINT `ambience_ibfk_1` FOREIGN KEY (`id_local`) REFERENCES `localtion` (`id_local`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bigimg`
--
ALTER TABLE `bigimg`
  ADD CONSTRAINT `bigimg_ibfk_1` FOREIGN KEY (`id_contract`) REFERENCES `contract` (`id_contract`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bigimg_ibfk_2` FOREIGN KEY (`id_img`) REFERENCES `img` (`id_img`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bigimg_ibfk_3` FOREIGN KEY (`size`) REFERENCES `sizebigimg` (`size`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_contract_img` FOREIGN KEY (`id_local`) REFERENCES `localtion` (`id_local`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_img_local` FOREIGN KEY (`id_img`) REFERENCES `img` (`id_img`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imgtool`
--
ALTER TABLE `imgtool`
  ADD CONSTRAINT `fk_img_tool` FOREIGN KEY (`id_tool`) REFERENCES `tool` (`id_tool`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tool_img` FOREIGN KEY (`id_img`) REFERENCES `img` (`id_img`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `makeupcontract`
--
ALTER TABLE `makeupcontract`
  ADD CONSTRAINT `makeupcontract_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `makeupcontract_ibfk_2` FOREIGN KEY (`id_contract`) REFERENCES `contract` (`id_contract`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photocontract`
--
ALTER TABLE `photocontract`
  ADD CONSTRAINT `photocontract_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `photocontract_ibfk_2` FOREIGN KEY (`id_contract`) REFERENCES `contract` (`id_contract`) ON DELETE CASCADE ON UPDATE CASCADE;

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
