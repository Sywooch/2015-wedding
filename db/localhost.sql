-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2015 at 07:03 AM
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
(13, 17, '', 40, NULL, NULL, NULL, 1),
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
('D1431522087', 'Áo cưới chữ U', 'uploads/1431522087515093863961.jpg', 1, 'áo cưới chữ U', 1000000, 1000000, 1),
('D1431585670', 'Áo cưới chữ T', 'uploads/1431585670334313347201.jpg', 1, '12', 1300000, 1000000, 1),
('D1432142219', 'Áo cưới Phong cách châu âu 12323', 'uploads/avatar/1432142219293343737.jpg', 1, '32131', 1000000, 1000000, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=288 ;

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
(190, 'uploads/dress/143152211381422516300.jpg', NULL, 1),
(191, 'uploads/dress/143158568714217273514.jpg', NULL, 1),
(192, 'uploads/dress/14315856874025334112.jpg', NULL, 1),
(193, 'uploads/dress/1431585687915725736751.jpg', NULL, 1),
(194, 'uploads/dress/1431585687944838727196.jpg', NULL, 1),
(195, 'uploads/dress/1431585687876242176849.jpg', NULL, 1),
(196, 'uploads/dress/1431585687234682534357.jpg', NULL, 1),
(197, 'uploads/dress/1431585688527614619912.jpg', NULL, 1),
(198, 'uploads/dress/143158568880613382978.jpg', NULL, 1),
(199, 'uploads/local/143158572813022566910.jpg', NULL, 1),
(200, 'uploads/local/143158572977499112904.jpg', NULL, 1),
(201, 'uploads/local/14315857296881844484.jpg', NULL, 1),
(202, 'uploads/local/1431585729798777288147.jpg', NULL, 1),
(203, 'uploads/local/143158572953734395217.jpg', NULL, 1),
(204, 'uploads/local/143158572950743759200.jpg', NULL, 1),
(205, 'uploads/local/1431585729534394053836.jpg', NULL, 1),
(206, 'uploads/local/1431585729420852934574.png', NULL, 1),
(207, 'uploads/dress/1432095058275942298057.jpg', NULL, 1),
(208, 'uploads/dress/1432095058694127041367.jpg', NULL, 1),
(209, 'uploads/dress/1432095058666432485833.jpg', NULL, 1),
(210, 'uploads/dress/1432095058551695495787.jpg', NULL, 1),
(211, 'uploads/dress/143209505880833864147.jpg', NULL, 1),
(212, 'uploads/dress/143209505892433918600.jpg', NULL, 1),
(213, 'uploads/dress/1432095058690033038696.jpg', NULL, 1),
(214, 'uploads/dress/1432095058690932412658.jpg', NULL, 1),
(215, 'uploads/dress/143209505839349807610.jpg', NULL, 1),
(216, 'uploads/dress/1432095058699320438000.jpg', NULL, 1),
(217, 'uploads/dress/143209505834439953960.jpg', NULL, 1),
(218, 'uploads/dress/143209505815791804353.jpg', NULL, 1),
(219, 'uploads/dress/1432095058562446388256.jpg', NULL, 1),
(220, 'uploads/dress/1432095059175479723631.jpg', NULL, 1),
(221, 'uploads/dress/1432095059910928866941.jpg', NULL, 1),
(222, 'uploads/dress/1432095059432351772435.jpg', NULL, 1),
(223, 'uploads/dress/1432095059346789034897.jpg', NULL, 1),
(224, 'uploads/dress/14320950599034904555.jpg', NULL, 1),
(225, 'uploads/dress/143209505917075387948.jpg', NULL, 1),
(226, 'uploads/dress/1432095059347040453467.jpg', NULL, 1),
(227, 'uploads/dress/1432096486153358877744.jpg', NULL, 1),
(228, 'uploads/dress/143209648662457655319.jpg', NULL, 1),
(229, 'uploads/dress/1432096487149728994275.jpg', NULL, 1),
(230, 'uploads/dress/143209648798143729373.jpg', NULL, 1),
(231, 'uploads/dress/143209648749975637306.jpg', NULL, 1),
(232, 'uploads/dress/1432096487223228764749.jpg', NULL, 1),
(233, 'uploads/dress/1432096487623586674843.jpg', NULL, 1),
(234, 'uploads/dress/143209648772282097862.jpg', NULL, 1),
(235, 'uploads/dress/143209648748364688831.jpg', NULL, 1),
(236, 'uploads/dress/1432096487600862951815.jpg', NULL, 1),
(237, 'uploads/dress/1432096487337462907657.jpg', NULL, 1),
(238, 'uploads/dress/1432096487829956648897.jpg', NULL, 1),
(239, 'uploads/dress/1432096487235788258636.jpg', NULL, 1),
(240, 'uploads/dress/1432096487601488363081.jpg', NULL, 1),
(241, 'uploads/dress/143209648782304831528.jpg', NULL, 1),
(242, 'uploads/dress/1432096488575653827535.jpg', NULL, 1),
(243, 'uploads/dress/1432096488587465366030.jpg', NULL, 1),
(244, 'uploads/dress/143209648813138310108.jpg', NULL, 1),
(245, 'uploads/dress/1432096488111183536272.jpg', NULL, 1),
(246, 'uploads/dress/1432096488616365645842.jpg', NULL, 1),
(247, 'uploads/local/143209879226749194461.jpg', NULL, 1),
(248, 'uploads/local/1432098792846129812441.jpg', NULL, 1),
(249, 'uploads/local/143209879260081689753.jpg', NULL, 1),
(250, 'uploads/local/1432098792863263632012.jpg', NULL, 1),
(251, 'uploads/local/1432098792142591781464.jpg', NULL, 1),
(252, 'uploads/local/1432098792118114398767.jpg', NULL, 1),
(253, 'uploads/local/1432098792224998628230.jpg', NULL, 1),
(254, 'uploads/local/1432098792708546555241.jpg', NULL, 1),
(255, 'uploads/local/1432098792523688239620.jpg', NULL, 1),
(256, 'uploads/local/1432098865379615695001.jpg', NULL, 1),
(257, 'uploads/local/1432098865327550107086.jpg', NULL, 1),
(258, 'uploads/local/1432098865690993684721.jpg', NULL, 1),
(259, 'uploads/local/143209886586779073253.jpg', NULL, 1),
(260, 'uploads/local/1432098865386585295432.jpg', NULL, 1),
(261, 'uploads/local/1432098865461983813830.jpg', NULL, 1),
(262, 'uploads/local/1432098865392281549205.jpg', NULL, 1),
(263, 'uploads/local/1432098865676948143543.jpg', NULL, 1),
(264, 'uploads/local/1432099983319658608567.jpg', NULL, 1),
(265, 'uploads/local/1432099984905584051737.jpg', NULL, 1),
(266, 'uploads/local/1432099984485980873515.jpg', NULL, 1),
(267, 'uploads/local/143209998469718979443.jpg', NULL, 1),
(268, 'uploads/local/1432099984196662477621.jpg', NULL, 1),
(269, 'uploads/local/1432099984531121959254.jpg', NULL, 1),
(270, 'uploads/local/143209998496328787638.jpg', NULL, 1),
(271, 'uploads/local/143209998467718664332.jpg', NULL, 1),
(272, 'uploads/local/143209998467342076264.jpg', NULL, 1),
(273, 'uploads/local/1432099984686029182531.jpg', NULL, 1),
(274, 'uploads/local/1432099985509626504631.jpg', NULL, 1),
(275, 'uploads/local/1432099985733542998889.jpg', NULL, 1),
(276, 'uploads/local/1432099985530993064810.jpg', NULL, 1),
(277, 'uploads/local/1432099985776533898133.jpg', NULL, 1),
(278, 'uploads/local/1432099985256864652308.jpg', NULL, 1),
(279, 'uploads/local/1432099985850385097176.jpg', NULL, 1),
(280, 'uploads/dress/143214222942341907672.jpg', NULL, 1),
(281, 'uploads/dress/1432142229776891775.jpg', NULL, 1),
(282, 'uploads/dress/1432142229863866499152.jpg', NULL, 1),
(283, 'uploads/dress/1432142229679578653049.jpg', NULL, 1),
(284, 'uploads/dress/1432142230489381862541.jpg', NULL, 1),
(285, 'uploads/dress/1432142230341428025884.jpg', NULL, 1),
(286, 'uploads/dress/1432142230485461822566.jpg', NULL, 1),
(287, 'uploads/dress/1432142230583019924789.jpg', NULL, 1);

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
(190, 'D1431522087'),
(191, 'D1431585670'),
(192, 'D1431585670'),
(193, 'D1431585670'),
(194, 'D1431585670'),
(195, 'D1431585670'),
(196, 'D1431585670'),
(197, 'D1431585670'),
(198, 'D1431585670'),
(207, 'D1429632433'),
(208, 'D1429632433'),
(209, 'D1429632433'),
(210, 'D1429632433'),
(211, 'D1429632433'),
(212, 'D1429632433'),
(213, 'D1429632433'),
(214, 'D1429632433'),
(215, 'D1429632433'),
(216, 'D1429632433'),
(217, 'D1429632433'),
(218, 'D1429632433'),
(219, 'D1429632433'),
(220, 'D1429632433'),
(221, 'D1429632433'),
(222, 'D1429632433'),
(223, 'D1429632433'),
(224, 'D1429632433'),
(225, 'D1429632433'),
(226, 'D1429632433'),
(227, 'D1429595409'),
(228, 'D1429595409'),
(229, 'D1429595409'),
(230, 'D1429595409'),
(231, 'D1429595409'),
(232, 'D1429595409'),
(233, 'D1429595409'),
(234, 'D1429595409'),
(235, 'D1429595409'),
(236, 'D1429595409'),
(237, 'D1429595409'),
(238, 'D1429595409'),
(239, 'D1429595409'),
(240, 'D1429595409'),
(241, 'D1429595409'),
(242, 'D1429595409'),
(243, 'D1429595409'),
(244, 'D1429595409'),
(245, 'D1429595409'),
(246, 'D1429595409'),
(280, 'D1432142219'),
(281, 'D1432142219'),
(282, 'D1432142219'),
(283, 'D1432142219'),
(284, 'D1432142219'),
(285, 'D1432142219'),
(286, 'D1432142219'),
(287, 'D1432142219');

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
('L1429606564', 162),
('L1429606564', 256),
('L1429606564', 257),
('L1429606564', 258),
('L1429606564', 259),
('L1429606564', 260),
('L1429606564', 261),
('L1429606564', 262),
('L1429606564', 263),
('L1429634734', 247),
('L1429634734', 248),
('L1429634734', 249),
('L1429634734', 250),
('L1429634734', 251),
('L1429634734', 252),
('L1429634734', 253),
('L1429634734', 254),
('L1429634734', 255),
('L1429634734', 264),
('L1429634734', 265),
('L1429634734', 266),
('L1429634734', 267),
('L1429634734', 268),
('L1429634734', 269),
('L1429634734', 270),
('L1429634734', 271),
('L1429634734', 272),
('L1429634734', 273),
('L1429634734', 274),
('L1429634734', 275),
('L1429634734', 276),
('L1429634734', 277),
('L1429634734', 278),
('L1429634734', 279),
('L1431585715', 199),
('L1431585715', 200),
('L1431585715', 201),
('L1431585715', 202),
('L1431585715', 203),
('L1431585715', 204),
('L1431585715', 205),
('L1431585715', 206);

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
('L1429634759', 'Hồ Đá Thủ Đức', '1', 1000012, 'uploads/142963475919661195557.jpg', 1, 1),
('L1431585715', 'Rừng cao su Bù Đăng - Bình Phước', 'd', 9500000, 'uploads/1431585715664053424896.jpg', 5, 1);

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
-- Table structure for table `notify`
--

CREATE TABLE IF NOT EXISTS `notify` (
  `id_notify` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date_create` date NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_notify`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `type_user`, `range_user`, `rate_user`, `fullname`, `fullname2`, `tell`, `tell2`, `email`, `email2`, `info_user`, `address`, `avatar`, `have_contract`, `status`, `created_at`, `updated_at`) VALUES
(4, 'nhannguyen', 'Z79uTWbLCj6366cqfdw8tiDHLq5vrzsK', '$2y$13$E9j5kmFiCOWJKvnxIK0R1uNgvNu78jtyRASY.xf3uQ4RZbnfE4J02', NULL, 0, NULL, 100, '', NULL, '', NULL, 'vannhan.nguyen0405@gmail.coms', NULL, '', '', 'uploads/avatar/avatar.jpg', 0, 10, 1428396746, 1428396746),
(5, 'admin12', 'IEdZYvMnXUelV5bGTSfKtesZXfpE-qtT', '$2y$13$rmQog1huU5uhY8imtRJSiu47KMBWvsNIvDt4jy3UxKNDn/hHhbmNe', '', 1, 1, 200, '1', '', '1', '', 'nhannguyen@gmail.com221', '', '1', '1', 'uploads/avatar/avatar.jpg', 1, 1, 1, 1),
(6, 'nhannguyen12', 'Z79uTWbLCj6366cqfdw8tiDHLq5vrzsK', '$2y$13$E9j5kmFiCOWJKvnxIK0R1uNgvNu78jtyRASY.xf3uQ4RZbnfE4J02', NULL, 0, NULL, 200, '', NULL, '', NULL, 'vannhan.nguyen0405@gmail.coms', NULL, '', '', 'uploads/avatar/avatar.jpg', 0, 10, 1428396746, 1428396746),
(7, 'zetnhan', 'AX5JIdDt7feAWqQGQV0Me1xh3LSZvCwX', '$2y$13$Dy.iwUPP6eP3vsQrXT7K2OlKX9BXwhTUx3OqmXQrOMg05Y4FkJokm', NULL, 1, NULL, 210, '', NULL, '', NULL, 'admin@gmail.com', NULL, '', '', 'uploads/avatar/avatar.jpg', 1, 10, 1428459152, 1428459152),
(8, 'zetnhantest', 'qx2prxjPEZ9LBL_HK4j1QUQ64fyU8IA8', '$2y$13$0uohBHCYvCFa.j/1otrDe.wOcVwtdOiW0yRx5NMczUQtzV51CCJDi', NULL, 0, NULL, 100, '', NULL, '', NULL, 'admin1@gmail.com', NULL, '', '', 'uploads/avatar/avatar.jpg', 0, 10, 1428459597, 1428459597),
(9, 'nhannguyencs101', 'szLkGOvsZlBcY41o6CEWKLko6ske3GZ8', '$2y$13$v56oTdIBwGt3yy/6HPcbeew18A0./9p0FRRaB3L1LqTg57cb2GauW', NULL, 0, NULL, 150, '', NULL, '', NULL, 'vannhan.nguyen0405@gmail.coms1', NULL, '', '', 'uploads/avatar/avatar.jpg', 0, 10, 1428462747, 1428462747),
(10, 'zetnhan1234', 'hX5fbK2UazahwVxg7CJoT2WOV3NTGN0g', '$2y$13$r8jdfVDLm/cVYnMfGIcBROKcvUNTz37T0oT9U1W4EA7d81vmllboW', NULL, 2, NULL, 89, '', NULL, '', NULL, 'vannhan.nguyen0405@gmail.com1231', NULL, '', '', 'uploads/avatar/fam.jpg', 0, 10, 1428463965, 1428463965),
(11, 'admin1@gmail.com', 'CFFWhRAjwjFv4OCdaF6jKsoL1v-kqDHd', '$2y$13$MCm1WMxGMS72xFLuazrpy.zC2oVzI3Onds1JdDiweJe65uwVnkSly', NULL, 1, NULL, 102, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com12312313', NULL, '', '268 Lý thường kiệt', 'uploads/avatar/avatar.jpg', 1, 10, 1428464258, 1428464258),
(12, 'znhan', '3ZZ1CTIA58Rs3pzA7L-Kdstr3h5Hicku', '$2y$13$2kWi7hRL2raO4um2jfK91OWPkZKMce6swOx5ua/jxkkj8Zayua5sW', NULL, 1, NULL, 90, 'Nguyễn Văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com123123sd', NULL, 'Tao là customer', '268 Lý thường kiệt', 'uploads/avatar/avatar.jpg', 0, 10, 1428488501, 1428488501),
(13, 'adminkeke', 'fU0lUEwuvp8wAjaQU4d9QZzX5PA6rf1A', '$2y$13$hGagIdidM/44HyyMbbhdDOosYTQtZGHqaIZGWI5lZ8XJM772Rj15i', NULL, 1, NULL, 125, 'Nguyễn văn Nhàn', NULL, '1', NULL, 'vannhan.nguyen0405@gmail.com1', NULL, '1', '1', 'uploads/avatar/avatar.jpg', 0, 10, 1428903072, 1428903072),
(14, 'wtf', '-_Deuj3D57wNktce-lxWQqivlTuZ8nue', '$2y$13$zFMLAyyYBxU2nQ30ZbvAo.22kxjC7p7RcDmfKtsTfMka9w5g0ytiG', NULL, 2, NULL, 94, '1', NULL, '1', NULL, 'vannhan.nguyen0405@gmail.com11231', NULL, '12', '12', 'uploads/avatar/avatar.jpg', 0, 10, 1428903113, 1428903113),
(15, 'nguyenvannhan', 'mKn70uztNfrblknx3fEnTtmgV2vbbD2y', '$2y$13$I9ec3n6XEX9c1ia5MS68ge9y8NMqj8fUzzi4m9avmL.9IFFY20Hyu', NULL, 1, NULL, 175, 'Nguyễn Văn Nhàn', NULL, '0938194492', NULL, '51002201@hcmut.edu.vn', NULL, 'hello', '268 Lý thường kiệt', 'uploads/avatar/avatar.jpg', 0, 10, 1428992062, 1428992062),
(16, 'hoho', 'IRDYCBz0kp57Ht0SMu-2hDvXRV8Y-vQC', '$2y$13$lvtF5kb2ySjBQ/gdxtT04OZJrd/LRKWIzlJxoeLGPYvyMr1lNl5Jq', NULL, 3, NULL, 100, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com1212', NULL, '1', '268 Lý thường kiệt', 'uploads/avatar/avatar.jpg', 0, 10, 1429684226, 1429684226),
(17, 'nhannguyen92', 'IEdZYvMnXUelV5bGTSfKtesZXfpE-qtT', '$2y$13$rmQog1huU5uhY8imtRJSiu47KMBWvsNIvDt4jy3UxKNDn/hHhbmNe', NULL, 2, NULL, 250, 'Nguyễn văn Nhàn', NULL, '1', NULL, 'vannhan.nguyen0405@gmail.com21', NULL, '1', '1', 'uploads/avatar/beer.jpg', 0, 10, 1429686424, 1429686424),
(18, 'nhannguyencs10', 'pu69cNXfoWnIsg2n0YM6CO8X5PV_Xwh1', '$2y$13$k.uildQVWJiUxwWiimavNO.PzBzHrFWPTy7g2rc9ba7My6QFDGDVG', NULL, 2, NULL, 300, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com132', NULL, 'Nhàn Khùng', '1', 'uploads/avatar/beer.jpg', 0, 10, 1429686477, 1429686477),
(19, 'znznznzn', '7gb2QYK3bYhMKROEQNoK4iJSIEZ04OAe', '$2y$13$mblPPR4nEBXvPPyrfTprJOSX9B8NJ7ra4ML2CHCz5ZFDeOZH012wq', NULL, 1, NULL, 82, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com765432', NULL, '1', '268 Lý thường kiệt', 'uploads/avatar/avatar.jpg', 0, 10, 1430731898, 1430731898),
(20, 'nhannguyen123', 'cjMMFr4dGI5bAgy6v7Zh0y0jnC2oi24Y', '$2y$13$qO9jJf48XjveX6wq6FwWB.8f/.8.6LF0ikQfS4C7EPyh8/VTciGry', NULL, 3, NULL, 100, 'Nguyễn Văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com12', NULL, '12', '268 Lý thường kiệt', 'uploads/avatar/avatar.jpg', 0, 10, 1430746652, 1430746652),
(21, 'nhannguyencs1234', 'zXfHg7T38ZS4YnUfxEmfVL18WowJFduu', '$2y$13$lJx9lc1JV9/QZYffESAH6.rObWVW.0Qa.L3WVnzrbwKIgfZ5NUpwe', NULL, 2, NULL, 0, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com1234', NULL, 'I''m photograper', '268 Lý thường kiệt', 'uploads/avatar/fam.jpg', 0, 10, 1431424733, 1431424733),
(22, 'vannhan', 'OY9AkcDkAkcvWnu3PQ4x66JGgGFeygwT', '$2y$13$gLzTN.9HYaMFOiFYVQcrC.xiuiIwC3UOVYuLiJOGjrust37jFnQmW', NULL, 2, 1, 150000, 'Nguyễn Văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com21213', NULL, 'I am photograper', '268 Lý thường kiệt', 'uploads/avatar/avatar.jpg', 0, 10, 1431441917, 1431441917),
(25, 'admintor', 'IfHLn0HrLiG5VaP_xLOPI4kQkjWVmFB7', '$2y$13$w8izNT0uR3F24QYsngoteuapXIqK9Eq8xe37G2f.haKgfZ0O0h/6S', NULL, 0, NULL, NULL, 'Nguyễn Văn Nhàn', NULL, '0938194492', NULL, '51002201@hcmut.edu.vn12', NULL, '1', '268 Lý thường kiệt', 'uploads/avatar/avatar.jpg', 0, 10, 1431572471, 1431572471),
(26, '123456', 'IEdZYvMnXUelV5bGTSfKtesZXfpE-qtT', '$2y$13$rmQog1huU5uhY8imtRJSiu47KMBWvsNIvDt4jy3UxKNDn/hHhbmNe', NULL, 0, NULL, 0, 'Nguyen van nhan', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com1223', NULL, '1234', '12345', 'uploads/avatar/avatar.jpg', 0, 10, 1431574784, 1431574784),
(27, 'admin', 'IEdZYvMnXUelV5bGTSfKtesZXfpE-qtT', '$2y$13$rmQog1huU5uhY8imtRJSiu47KMBWvsNIvDt4jy3UxKNDn/hHhbmNe', NULL, 0, NULL, NULL, 'Nguyen Van Nhan', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com123123', NULL, 'I am Admin, Admin', 'Tổ 10, KV8, P. Ngô Mây, TP. Quy Nhơn, tỉnh Bình Định', 'uploads/avatar/avatar.jpg', 0, 10, 1431584162, 1431584162),
(28, 'customer', '5mzebdn-9NDXrYIXw0q70_9GJ7oAl3Kz', '$2y$13$WwgjVJUFxTkCjeaXAutuz.8OQFKirgcViNy0RZXkCAC1AqacPqgge', NULL, 1, NULL, NULL, 'Nhan Nguyen', NULL, '0938194492', NULL, 'hoho@gmail.com', NULL, 'I''m customer', 'Tổ 10, KV8, P. Ngô Mây, TP. Quy Nhơn, tỉnh Bình Định', 'uploads/avatar/avatar.jpg', 0, 10, 1431589231, 1431589231),
(29, 'nhannguyen12345', '6NjkShXGIbEs9Fo4ZPDJaC9OHtT8nkVK', '$2y$13$w7w3cy.ar3zr3vNCjNC7i.QOG87KmDCSIU.ZV7fxjRYNSBcqXto42', NULL, 2, 1, 150000, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com431', NULL, 'ád', 'Tổ 10, KV8, P. Ngô Mây, TP. Quy Nhơn, tỉnh Bình Định', 'uploads/1432139569978938733958.jpg', 0, 10, 1432139572, 1432139572),
(30, 'khachhang', 'Z79uTWbLCj6366cqfdw8tiDHLq5vrzsK', '$2y$13$E9j5kmFiCOWJKvnxIK0R1uNgvNu78jtyRASY.xf3uQ4RZbnfE4J02', NULL, 1, NULL, NULL, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, '51002201@hcmut.edu.vn21', NULL, 'asdds', '268 Lý thường kiệt', 'uploads/1432141659678846891467.jpg', 0, 10, 1432141660, 1432141660);

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
-- Constraints for table `notify`
--
ALTER TABLE `notify`
  ADD CONSTRAINT `notify_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
