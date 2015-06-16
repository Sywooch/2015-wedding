-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2015 at 05:22 PM
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
  `url_folder` varchar(250) COLLATE utf32_unicode_ci DEFAULT NULL,
  `rate` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_album`),
  KEY `id_customer` (`id_contract`),
  KEY `id_contract` (`id_contract`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `id_contract`, `url_psd`, `numpage`, `time_complete`, `url_folder`, `rate`, `status`) VALUES
(1, 1, '', 35, '2015-06-29 00:00:00', '', NULL, 3),
(2, 2, NULL, 40, NULL, '', NULL, 0),
(3, 3, NULL, 50, NULL, NULL, NULL, 0),
(4, 4, NULL, 40, NULL, NULL, NULL, 0),
(5, 5, NULL, 45, NULL, NULL, NULL, 0),
(6, 6, NULL, 35, NULL, NULL, NULL, 0),
(7, 7, NULL, 35, NULL, NULL, NULL, 0),
(8, 8, NULL, 40, NULL, NULL, NULL, 0),
(9, 9, NULL, 35, NULL, NULL, NULL, 0),
(10, 10, NULL, 20, NULL, NULL, NULL, 0),
(11, 11, NULL, 25, NULL, NULL, NULL, 0),
(12, 12, NULL, 35, NULL, NULL, NULL, 0);

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
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_local_amb`),
  KEY `id_local` (`id_local`),
  KEY `id_local_2` (`id_local`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bigimg`
--

CREATE TABLE IF NOT EXISTS `bigimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_contract` int(11) NOT NULL,
  `url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_contract` (`id_contract`,`url`,`size`),
  KEY `id_img` (`url`),
  KEY `size` (`size`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `bigimg`
--

INSERT INTO `bigimg` (`id`, `id_contract`, `url`, `size`) VALUES
(1, 1, 'uploads/album/1/bigimg/143446695549664796.jpg', '60x90'),
(2, 2, 'uploads/album/2/bigimg/143446653368673840.jpg', '60x90'),
(3, 3, NULL, '70x110'),
(4, 4, NULL, '60x90'),
(16, 5, NULL, '70x110'),
(6, 6, NULL, '70x110'),
(7, 7, NULL, '70x110'),
(8, 8, NULL, '70x110'),
(9, 9, NULL, '60x90'),
(10, 10, NULL, '70x110'),
(11, 11, NULL, '70x110'),
(12, 12, NULL, '70x110');

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
  `num_bigimg` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id_contract`, `id_user`, `id_local`, `start_time`, `end_time`, `create_day`, `total`, `payment1`, `payment2`, `payment3`, `timephoto`, `num_bigimg`, `timeadd`, `timecomplete`, `have_album`, `total_time`, `status`) VALUES
(1, 51, 'L1433515233', '2015-06-08', '2015-06-10', '2015-06-06 11:05:42', 11180000, '2015-06-06', '2015-06-08', NULL, NULL, 1, 1, NULL, 0, 2, 1),
(2, 64, 'L1433515233', '2015-06-06', '2015-06-07', '2015-06-06 12:14:16', 6515000, '2015-06-06', '2015-06-11', NULL, NULL, 1, 0, NULL, 0, 1, 1),
(3, 52, 'L1433517285', '2015-06-08', '2015-06-12', '2015-06-06 12:22:29', 10850000, '2015-06-08', '2015-06-11', NULL, NULL, 1, 1, NULL, 0, 4, 1),
(4, 61, 'L1433516702', '2015-07-08', '2015-07-12', '2015-06-06 12:34:34', 17710000, '2015-07-07', '2015-07-16', NULL, NULL, 1, 1, NULL, 0, 4, 1),
(5, 54, 'L1433516587', '2015-06-20', '2015-06-23', '2015-06-08 11:08:38', 13895000, '2015-06-20', '2015-06-22', NULL, NULL, 1, 2, NULL, 0, 3, 1),
(6, 58, 'L1433517541', '2016-03-18', '2016-03-23', '2015-06-09 23:19:52', 25175000, '2015-06-25', NULL, NULL, NULL, 2, 1, NULL, 0, 5, 1),
(7, 63, 'L1433517644', '2015-06-13', '2015-06-19', '2015-06-10 09:11:41', 23190000, '2015-06-13', NULL, NULL, NULL, 1, 1, NULL, 0, 6, 1),
(8, 53, 'L1433516702', '2015-06-13', '2015-06-18', '2015-06-10 09:41:54', 13350000, '2015-06-13', '2015-06-13', '2015-06-13', NULL, 1, 2, NULL, 0, 5, 1),
(9, 57, 'L1433515835', '2015-06-25', '2015-06-26', '2015-06-10 10:13:03', 4850000, '2015-06-13', '2015-06-18', NULL, NULL, 1, 0, NULL, 0, 1, 1),
(10, 59, 'L1433516587', '2015-06-25', '2015-06-27', '2015-06-10 10:14:02', 6300000, '2015-06-30', NULL, NULL, NULL, 1, 1, NULL, 0, 2, 1),
(11, 56, 'L1433516081', '2015-06-16', '2015-06-18', '2015-06-13 21:30:41', 8930000, '2015-06-17', NULL, NULL, NULL, 2, 1, NULL, 0, 2, 1),
(12, 60, 'L1433516081', '2016-07-30', '2016-08-01', '2015-06-16 00:50:33', 14230000, '2015-06-02', '2015-06-04', NULL, NULL, 2, 1, NULL, 0, 2, 1);

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
  `rate_sale` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_dress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dress`
--

INSERT INTO `dress` (`id_dress`, `name_dress`, `avatar`, `type_dress`, `info_dress`, `rate_hire`, `rate_sale`, `status`) VALUES
('D1433517868', ' Áo cưới truyền thống Việt Nam', 'uploads/avatar/1433517868965457331982.jpg', 1, ' Áo cưới truyền thống Việt Nam', 750000, 750000, 1),
('D1433517957', 'Áo cưới truyền thống Hàn Quốc', 'uploads/avatar/1433517957640385259654.jpg', 1, 'Áo cưới truyền thống Hàn Quốc', 800000, 800000, 1),
('D1433518051', '  Áo cưới truyền thống Nhật Bản', 'uploads/avatar/1433518051429988895309.jpg', 1, '  Áo cưới truyền thống Nhật Bản', 665000, 665000, 1),
('D1433518118', 'Áo cưới truyền thống Ấn Độ', 'uploads/avatar/1433518118394889504585.jpg', 1, 'Áo cưới truyền thống Ấn Độ', 700000, 700000, 1),
('D1433557310', 'Áo cưới ngắn', 'uploads/avatar/1433557310551237706901.jpg', 1, '1', 700000, 700000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dresscontract`
--

CREATE TABLE IF NOT EXISTS `dresscontract` (
  `id_dress` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_contract` int(11) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  KEY `id_dress` (`id_dress`),
  KEY `id_contract` (`id_contract`),
  KEY `id_dress_2` (`id_dress`),
  KEY `id_contract_2` (`id_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dresscontract`
--

INSERT INTO `dresscontract` (`id_dress`, `id_contract`, `start_time`, `end_time`) VALUES
('D1433517868', 1, '2015-06-08', '2015-06-10'),
('D1433517957', 1, '2015-06-08', '2015-06-10'),
('D1433518051', 1, '2015-06-08', '2015-06-10'),
('D1433518118', 1, '2015-06-08', '2015-06-10'),
('D1433518051', 2, '2015-06-06', '2015-06-07'),
('D1433518118', 2, '2015-06-06', '2015-06-07'),
('D1433557310', 2, '2015-06-06', '2015-06-07'),
('D1433557310', 3, '2015-06-08', '2015-06-12'),
('D1433517868', 4, '2015-07-08', '2015-07-12'),
('D1433517957', 4, '2015-07-08', '2015-07-12'),
('D1433518051', 4, '2015-07-08', '2015-07-12'),
('D1433517868', 6, '2016-03-18', '2016-03-23'),
('D1433517957', 6, '2016-03-18', '2016-03-23'),
('D1433518051', 6, '2016-03-18', '2016-03-23'),
('D1433518118', 6, '2016-03-18', '2016-03-23'),
('D1433517957', 7, '2015-06-13', '2015-06-19'),
('D1433518051', 7, '2015-06-13', '2015-06-19'),
('D1433518118', 7, '2015-06-13', '2015-06-19'),
('D1433517868', 8, '2015-06-13', '2015-06-18'),
('D1433518118', 9, '2015-06-25', '2015-06-26'),
('D1433557310', 10, '2015-06-25', '2015-06-27'),
('D1433517957', 11, '2015-06-16', '2015-06-18'),
('D1433518051', 11, '2015-06-16', '2015-06-18'),
('D1433517868', 12, '2016-07-30', '2016-08-01'),
('D1433517957', 12, '2016-07-30', '2016-08-01'),
('D1433518051', 12, '2016-07-30', '2016-08-01'),
('D1433518118', 12, '2016-07-30', '2016-08-01'),
('D1433557310', 12, '2016-07-30', '2016-08-01'),
('D1433517957', 5, '2015-06-20', '2015-06-23'),
('D1433518051', 5, '2015-06-20', '2015-06-23'),
('D1433518118', 5, '2015-06-20', '2015-06-23');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=137 ;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id_img`, `url`, `title`, `status`) VALUES
(1, 'uploads/dress/143351788777409738943.jpg', NULL, 1),
(2, 'uploads/dress/1433517888366324459532.jpg', NULL, 1),
(3, 'uploads/dress/1433517888492866657757.jpg', NULL, 1),
(4, 'uploads/dress/1433517888408644879257.jpg', NULL, 1),
(5, 'uploads/dress/1433517888836155749809.jpg', NULL, 1),
(6, 'uploads/dress/1433517888987639469934.jpg', NULL, 1),
(7, 'uploads/dress/1433517888807919599199.jpg', NULL, 1),
(9, 'uploads/dress/1433517973102856782993.jpg', NULL, 1),
(10, 'uploads/dress/1433517974139564765135.jpg', NULL, 1),
(11, 'uploads/dress/1433517974690887334405.jpg', NULL, 1),
(12, 'uploads/dress/1433517974496312715035.jpg', NULL, 1),
(13, 'uploads/dress/1433518069111937821981.jpg', NULL, 1),
(14, 'uploads/dress/1433518069421645958220.jpg', NULL, 1),
(15, 'uploads/dress/1433518070876745033988.jpg', NULL, 1),
(16, 'uploads/dress/1433518070771669405942.jpg', NULL, 1),
(17, 'uploads/dress/1433518070898882083686.jpg', NULL, 1),
(18, 'uploads/dress/143351807019714279632.jpg', NULL, 1),
(19, 'uploads/dress/1433518070119410279552.jpg', NULL, 1),
(20, 'uploads/dress/143351807092966536549.jpg', NULL, 1),
(21, 'uploads/dress/1433518134346369973948.jpg', NULL, 1),
(22, 'uploads/dress/1433518134895045859902.jpg', NULL, 1),
(23, 'uploads/dress/1433518134861532506468.jpg', NULL, 1),
(24, 'uploads/dress/1433518134583332625422.jpg', NULL, 1),
(25, 'uploads/dress/1433518134630182292577.jpg', NULL, 1),
(26, 'uploads/dress/1433518134640262715527.jpg', NULL, 1),
(27, 'uploads/dress/1433518134624821283564.jpg', NULL, 1),
(28, 'uploads/dress/1433557343201610776000.jpg', NULL, 1),
(29, 'uploads/dress/143355734331202334806.jpg', NULL, 1),
(30, 'uploads/dress/1433557343811465666477.jpg', NULL, 1),
(31, 'uploads/dress/1433557344351630972961.jpg', NULL, 1),
(32, 'uploads/dress/1433557344418618931890.jpg', NULL, 1),
(33, 'uploads/dress/1433557344449317979627.jpg', NULL, 1),
(34, 'uploads/dress/143355734442983502748.jpg', NULL, 1),
(35, 'uploads/dress/1433557344140396526717.jpg', NULL, 1),
(36, 'uploads/local/143390437628357648557.jpg', NULL, 1),
(37, 'uploads/local/1433904376911844424712.jpg', NULL, 1),
(38, 'uploads/local/143390437671203135456.jpg', NULL, 1),
(39, 'uploads/local/143390437659085072992.jpg', NULL, 1),
(40, 'uploads/local/14339043773014286906.jpg', NULL, 1),
(41, 'uploads/local/1433904377712718023786.jpg', NULL, 1),
(42, 'uploads/local/1433904377550589761508.jpg', NULL, 1),
(43, 'uploads/local/1433904377734564906978.jpg', NULL, 1),
(44, 'uploads/local/1433904402247248368561.jpg', NULL, 1),
(45, 'uploads/local/1433904402876912656368.jpg', NULL, 1),
(46, 'uploads/local/1433904402617265029805.jpg', NULL, 1),
(47, 'uploads/local/143390440222471238278.jpg', NULL, 1),
(48, 'uploads/local/1433904402902785939852.jpg', NULL, 1),
(49, 'uploads/local/1433904402378448708660.jpg', NULL, 1),
(50, 'uploads/local/1433904402779477098272.jpg', NULL, 1),
(51, 'uploads/local/1433904403261393909740.jpg', NULL, 1),
(52, 'uploads/local/1433904452129880869008.jpg', NULL, 1),
(53, 'uploads/local/1433904452871819279735.jpg', NULL, 1),
(54, 'uploads/local/1433904452939387561676.jpg', NULL, 1),
(55, 'uploads/local/1433904452558374929711.jpg', NULL, 1),
(56, 'uploads/local/1433904452148578191743.jpg', NULL, 1),
(57, 'uploads/local/1433904452127272903627.jpg', NULL, 1),
(58, 'uploads/local/14339044525585812727.jpg', NULL, 1),
(59, 'uploads/local/1433904453519974549962.jpg', NULL, 1),
(60, 'uploads/local/1433904464327131056137.jpg', NULL, 1),
(61, 'uploads/local/1433904464576846266.jpg', NULL, 1),
(62, 'uploads/local/1433904464558436181774.jpg', NULL, 1),
(63, 'uploads/local/1433904464622877467387.jpg', NULL, 1),
(64, 'uploads/local/1433904464814537751059.jpg', NULL, 1),
(65, 'uploads/local/1433904464676155129898.jpg', NULL, 1),
(66, 'uploads/local/1433904464896464274813.jpg', NULL, 1),
(67, 'uploads/local/1433904464678198966075.jpg', NULL, 1),
(68, 'uploads/local/1433904475331699041504.jpg', NULL, 1),
(69, 'uploads/local/1433904475769396685322.jpg', NULL, 1),
(70, 'uploads/local/1433904475276735321702.jpg', NULL, 1),
(71, 'uploads/local/14339044752528088101.jpg', NULL, 1),
(72, 'uploads/local/1433904475535818829064.jpg', NULL, 1),
(73, 'uploads/local/1433904475608815732398.jpg', NULL, 1),
(74, 'uploads/local/1433904475597271816284.jpg', NULL, 1),
(75, 'uploads/local/1433904475898949696066.jpg', NULL, 1),
(76, 'uploads/local/1433904486458918069565.jpg', NULL, 1),
(77, 'uploads/local/143390448643915374486.jpg', NULL, 1),
(78, 'uploads/local/1433904486635527107780.jpg', NULL, 1),
(79, 'uploads/local/1433904486586633604447.jpg', NULL, 1),
(80, 'uploads/local/143390448627451329019.jpg', NULL, 1),
(81, 'uploads/local/143390448692906206473.jpg', NULL, 1),
(82, 'uploads/local/1433904486676719259100.jpg', NULL, 1),
(83, 'uploads/local/1433904486907650422041.jpg', NULL, 1),
(84, 'uploads/local/1433904528563842279041.jpg', NULL, 1),
(85, 'uploads/local/143390452843447631950.jpg', NULL, 1),
(86, 'uploads/local/1433904528151582663946.jpg', NULL, 1),
(87, 'uploads/local/143390452960611416702.jpg', NULL, 1),
(88, 'uploads/local/1433904529912637458358.jpg', NULL, 1),
(89, 'uploads/local/143390452943112387191.jpg', NULL, 1),
(90, 'uploads/local/1433904529460291416223.jpg', NULL, 1),
(91, 'uploads/local/1433904529358623117519.jpg', NULL, 1),
(92, 'uploads/local/1433904541270178431904.jpg', NULL, 1),
(93, 'uploads/local/1433904541633667097793.jpg', NULL, 1),
(94, 'uploads/local/1433904541707479568900.jpg', NULL, 1),
(95, 'uploads/local/143390454197551521806.jpg', NULL, 1),
(96, 'uploads/local/143390454252129158683.jpg', NULL, 1),
(97, 'uploads/local/1433904542957565833463.jpg', NULL, 1),
(98, 'uploads/local/1433904542699739488950.jpg', NULL, 1),
(99, 'uploads/local/1433904542458599028615.jpg', NULL, 1),
(100, 'uploads/local/143390461550883347985.jpg', NULL, 1),
(101, 'uploads/local/1433904615402361952155.jpg', NULL, 1),
(102, 'uploads/local/143390461566156721579.jpg', NULL, 1),
(103, 'uploads/local/1433904615719313641520.jpg', NULL, 1),
(104, 'uploads/local/1433904615467931486173.jpg', NULL, 1),
(105, 'uploads/local/1433904615875639319710.jpg', NULL, 1),
(106, 'uploads/local/1433904615697795662772.jpg', NULL, 1),
(108, 'uploads/local/143390464070831766798.jpg', NULL, 1),
(109, 'uploads/local/143390464020369333114.jpg', NULL, 1),
(110, 'uploads/local/1433904640139754921641.jpg', NULL, 1),
(111, 'uploads/local/1433904641485081509554.jpg', NULL, 1),
(112, 'uploads/local/1433904641994631594491.jpg', NULL, 1),
(113, 'uploads/local/1433904641890851847230.jpg', NULL, 1),
(114, 'uploads/local/1433904641886032423293.jpg', NULL, 1),
(115, 'uploads/local/1433904641425046947245.jpg', NULL, 1),
(121, 'uploads/album/1/1434466389195366586836.jpg', NULL, 1),
(122, 'uploads/album/1/143446638966315404934.jpg', NULL, 1),
(123, 'uploads/album/1/143446638985587499632.jpg', NULL, 1),
(124, 'uploads/album/1/14344663898941690165.jpg', NULL, 1),
(125, 'uploads/album/2/1434466531380721429280.jpg', NULL, 1),
(126, 'uploads/album/2/143446653240142384256.jpg', NULL, 1),
(127, 'uploads/album/2/1434466532433228602271.jpg', NULL, 1),
(128, 'uploads/album/2/1434466532100667878563.jpg', NULL, 1),
(129, 'uploads/album/2/14344665329404158181.jpg', NULL, 1),
(130, 'uploads/album/2/1434466532580747204168.jpg', NULL, 1),
(131, 'uploads/album/2/1434466532265442824157.jpg', NULL, 1),
(132, 'uploads/album/2/1434466532595479418676.jpg', NULL, 1),
(133, 'uploads/album/2/1434466532865391274380.jpg', NULL, 1),
(134, 'uploads/album/2/143446653286754145873.jpg', NULL, 1),
(135, 'uploads/album/2/1434466532540989671570.jpg', NULL, 1),
(136, 'uploads/album/2/1434466533338294669239.png', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `imgalbum`
--

CREATE TABLE IF NOT EXISTS `imgalbum` (
  `id_album` int(11) NOT NULL,
  `id_img` int(11) NOT NULL,
  KEY `id_album` (`id_album`,`id_img`),
  KEY `id_img` (`id_img`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imgalbum`
--

INSERT INTO `imgalbum` (`id_album`, `id_img`) VALUES
(1, 121),
(1, 122),
(1, 123),
(1, 124),
(2, 125),
(2, 126),
(2, 127),
(2, 128),
(2, 129),
(2, 130),
(2, 131),
(2, 132),
(2, 133),
(2, 134),
(2, 135),
(2, 136);

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
(1, 'D1433517868'),
(2, 'D1433517868'),
(3, 'D1433517868'),
(4, 'D1433517868'),
(5, 'D1433517868'),
(6, 'D1433517868'),
(7, 'D1433517868'),
(9, 'D1433517957'),
(10, 'D1433517957'),
(11, 'D1433517957'),
(12, 'D1433517957'),
(13, 'D1433518051'),
(14, 'D1433518051'),
(15, 'D1433518051'),
(16, 'D1433518051'),
(17, 'D1433518051'),
(18, 'D1433518051'),
(19, 'D1433518051'),
(20, 'D1433518051'),
(21, 'D1433518118'),
(22, 'D1433518118'),
(23, 'D1433518118'),
(24, 'D1433518118'),
(25, 'D1433518118'),
(26, 'D1433518118'),
(27, 'D1433518118'),
(28, 'D1433557310'),
(29, 'D1433557310'),
(30, 'D1433557310'),
(31, 'D1433557310'),
(32, 'D1433557310'),
(33, 'D1433557310'),
(34, 'D1433557310'),
(35, 'D1433557310');

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
('L1433515233', 36),
('L1433515233', 37),
('L1433515233', 38),
('L1433515233', 39),
('L1433515233', 40),
('L1433515233', 41),
('L1433515233', 42),
('L1433515233', 43),
('L1433515835', 44),
('L1433515835', 45),
('L1433515835', 46),
('L1433515835', 47),
('L1433515835', 48),
('L1433515835', 49),
('L1433515835', 50),
('L1433515835', 51),
('L1433516081', 52),
('L1433516081', 53),
('L1433516081', 54),
('L1433516081', 55),
('L1433516081', 56),
('L1433516081', 57),
('L1433516081', 58),
('L1433516081', 59),
('L1433516263', 60),
('L1433516263', 61),
('L1433516263', 62),
('L1433516263', 63),
('L1433516263', 64),
('L1433516263', 65),
('L1433516263', 66),
('L1433516263', 67),
('L1433516338', 68),
('L1433516338', 69),
('L1433516338', 70),
('L1433516338', 71),
('L1433516338', 72),
('L1433516338', 73),
('L1433516338', 74),
('L1433516338', 75),
('L1433516587', 76),
('L1433516587', 77),
('L1433516587', 78),
('L1433516587', 79),
('L1433516587', 80),
('L1433516587', 81),
('L1433516587', 82),
('L1433516587', 83),
('L1433516702', 100),
('L1433516702', 101),
('L1433516702', 102),
('L1433516702', 103),
('L1433516702', 104),
('L1433516702', 105),
('L1433516702', 106),
('L1433517285', 108),
('L1433517285', 109),
('L1433517285', 110),
('L1433517285', 111),
('L1433517285', 112),
('L1433517285', 113),
('L1433517285', 114),
('L1433517285', 115),
('L1433517541', 84),
('L1433517541', 85),
('L1433517541', 86),
('L1433517541', 87),
('L1433517541', 88),
('L1433517541', 89),
('L1433517541', 90),
('L1433517541', 91),
('L1433517644', 92),
('L1433517644', 93),
('L1433517644', 94),
('L1433517644', 95),
('L1433517644', 96),
('L1433517644', 97),
('L1433517644', 98),
('L1433517644', 99);

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
('L1433515233', 'Chụp ảnh cưới ở nhà thờ Đức Bà và Bưu điện thành phố', 'Giống như Nhà thờ lớn ở Hà Nội, Nhà thờ Đức Bà của TP. HCM cũng thu hút không ít các đôi uyên ương tới chụp ảnh cưới. Đặc biệt, ở ven khu vực Nhà thờ còn có những quán cà phê bệt, vào cuối tuần còn có hàng đàn chim bồ câu thân thiện, là phông nền độc đáo cho bộ ảnh cưới.\r\nNgay cạnh Nhà thờ là Bưu điện thành phố với kiến trúc cũ, cũng là địa điểm đẹp để chụp ảnh.', 2000000, 'uploads/143351523372660612395.jpg', 1, 1),
('L1433515835', 'Khu du lịch Bình Quới 1 và 2 , Văn Thánh', 'Khu du lịch Bình Quới có không gian làng quê cổ với ao cá, dòng sông êm đềm, những sân vườn cỏ xanh mướt mát. Vì vậy nhiều đôi uyên ương đã chọn điểm đến rộng lớn này làm nơi chụp ảnh cưới. ', 2300000, 'uploads/14335158353561191684.jpg', 1, 1),
('L1433516081', ' Bảo tàng TP HCM', 'Khu vực bảo tàng thành phố với không gian trong và ngoài rộng lớn, kiến trúc đẹp là một gợi ý cho địa điểm chụp ảnh cưới của bạn. Nơi đây còn có lợi thế là nằm ở gần trung tâm, trên đường Lý Tự Trọng nên việc di chuyển giữa các địa điểm khác khá thuận lợi.', 2300000, 'uploads/143351608187626471975.jpg', 1, 1),
('L1433516263', 'Chụp ảnh cưới Hồ Đá – Thủ Đức', 'Hồ đá có khung cảnh thiên nhiên hoang sơ, hùng vĩ với những vách đá rất đẹp. Hồ nước có màu xanh lục và trong vắt. Nơi đây là địa điểm nhiều cặp đôi chọn để thực hiện bộ ảnh lưu lại những khoảnh khắc lãng mạn.  ', 2300000, 'uploads/143351685191033455675.jpg', 1, 1),
('L1433516338', 'Các quán cà phê tại TP HCM phục vụ chụp ảnh cưới', 'Ở Sài Gòn có nhiều quán cà phê sân vườn rộng rãi, với phong cách đa dạng, từ cổ điển, hiện đại, lãng mạn đến đơn giản, cầu kỳ.\r\nBạn sẽ choáng ngợp trước những quán cà phê được thiết kế rất đẹp này. ', 2300000, 'uploads/14335163386647135288.jpg', 1, 1),
('L1433516587', 'Chụp ảnh cưới lãng mạn tại Lâu đài Long Island – Quận 9', 'Tòa lâu đài Long Island Quận 9 mới xuất hiện gần đây khiến nhiều bạn trẻ tò mò bởi không gian đẹp và ấn tượng với lối kiến trúc mô phỏng Châu Âu cổ kính, sang trọng.\r\nCách trung tâm thành phố chưa đến 20km, đây là điểm đến lý tưởng cho những ai chịu khó di chuyển ra ngoài trung tâm để thưởng thức khung cảnh ngoại ô trong lành. Long Island Quận 9 sừng sững trước những rặng dừa nước yên ả, một quần thể kiến trúc Châu Âu luôn chào đón những bạn trẻ thích tìm cho mình những khung hình độc đáo cá tính…', 2500000, 'uploads/1433516908995872220.jpg', 1, 1),
('L1433516702', 'Chụp ảnh cưới ở Sài Gòn với các làng nghề truyền thống', 'Những làng nghề sẽ là các “background” lý tưởng cho những ai đam mê nét đẹp truyền thống Á Đông. Không cầu kỳ và cũng không quá sắc sảo nhưng khi đến những khu làng nghề này, bạn sẽ có được “shoot” hình lạ, mộc mạc và chân quê nhất. Tuy vậy, đoạn đường để đến được những nơi này sẽ hơi xa và mệt, nhưng bù lại, bạn sẽ được người dân ở đây tiếp đón nhiệt tình và bạn có thể yên tâm tạo kiểu mà không sợ mình sẽ tốn một khoản phí nào', 5000000, 'uploads/1433904428658731143820.png', 3, 1),
('L1433517285', 'Hồ Cốc- Vũng Tàu', 'Nếu miền Bắc tự hào có Vịnh Hạ Long thì miền Nam cũng không kém cạnh khi có Hồ Cốc. Sự kết hợp giữa một bên là rừng bạt ngàn với thảm lá dày và một bên là cảnh biển hoang sơ mà thanh bình đã khiến nơi đây trở thành điểm đến không thể bỏ qua của các cặp đôi khi chụp ảnh cưới.', 5500000, 'uploads/1433517285189921761632.jpg', 3, 1),
('L1433517541', 'Mũi Né- Phan Thiết', 'Điểm nhấn của địa điểm này chắc chắn là những cồn cái trải dài mênh mông. Đây là nơi phù hợp với cô dâu chú rể khi muốn những bức ảnh cưới độc đáo. Ngoài ra không thể kể đến Bàu Sen, một biển hồ bao la với bạt ngàn sen toả hương trên làn nước lấp lánh dưới ánh nắng của mặt trời phương Nam.', 6000000, 'uploads/1433517541461961279704.jpg', 4, 1),
('L1433517644', 'Phú Quốc- Kiên Giang', 'Được mệnh danh là đảo ngọc, Phú Quốc là điểm đến lí tưởng với đôi uyên ương muốn chụp ảnh cưới với chuyến đi trăng mật hay nghỉ dưỡng với nhau. Bên cạnh cảnh biển đẹp lãng mạng, Phú Quốc còn đem đến những bức ảnh cưới khung cảnh dưới nước với những rặng san hô trải dài.', 6500000, 'uploads/143351764434556759469.jpg', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `makeupcontract`
--

CREATE TABLE IF NOT EXISTS `makeupcontract` (
  `id_user` int(11) NOT NULL,
  `id_contract` int(11) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `status` int(11) DEFAULT '0',
  KEY `id_user` (`id_user`,`id_contract`),
  KEY `id_contract` (`id_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `makeupcontract`
--

INSERT INTO `makeupcontract` (`id_user`, `id_contract`, `start_time`, `end_time`, `status`) VALUES
(75, 1, '2015-06-20', '2015-06-23', 0),
(75, 2, '2015-06-20', '2015-06-23', 0),
(75, 3, '2015-06-20', '2015-06-23', 0),
(75, 4, '2015-06-20', '2015-06-23', 0),
(75, 5, '2015-06-20', '2015-06-23', 0),
(75, 6, '2015-06-20', '2015-06-23', 0),
(75, 7, '2015-06-20', '2015-06-23', 0),
(75, 8, '2015-06-20', '2015-06-23', 0),
(75, 9, '2015-06-20', '2015-06-23', 0),
(75, 10, '2015-06-20', '2015-06-23', 0),
(75, 11, '2015-06-20', '2015-06-23', 0),
(75, 12, '2015-06-20', '2015-06-23', 0);

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
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tell` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_create` date NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_notify`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=110 ;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id_notify`, `id_user`, `fullname`, `email`, `tell`, `date_create`, `content`, `status`) VALUES
(96, 63, 'Thanh Mai', 'thanhmai95@yahoo.com', '0938194492', '2015-06-13', 'Nhắc nhở khách hàng Thanh Mai đến studio chuẩn bị chụp ảnh cưới vào ngày 2015-06-13', 1),
(97, 53, 'Nguyễn Công Minh', 'minhnguyencong@yahoo.com', '01655703109', '2015-06-13', 'Nhắc nhở khách hàng Nguyễn Công Minh đến studio chuẩn bị chụp ảnh cưới vào ngày 2015-06-13', 1),
(98, 63, 'Thanh Mai', 'thanhmai95@yahoo.com', '0938194492', '2015-06-13', 'Nhắc nhở khách hàng Thanh Mai tới đợt thanh toán lần 1 vào ngày 2015-06-13', 1),
(99, 53, 'Nguyễn Công Minh', 'minhnguyencong@yahoo.com', '01655703109', '2015-06-13', 'Nhắc nhở khách hàng Nguyễn Công Minh tới đợt thanh toán lần 1 vào ngày 2015-06-13', 1),
(100, 57, 'Nguyễn Mai Kiều Oanh', 'maioanh@yahoo.com', '0979865955', '2015-06-13', 'Nhắc nhở khách hàng Nguyễn Mai Kiều Oanh tới đợt thanh toán lần 1 vào ngày 2015-06-13', 1),
(101, 53, 'Nguyễn Công Minh', 'minhnguyencong@yahoo.com', '01655703109', '2015-06-13', 'Nhắc nhở khách hàng Nguyễn Công Minh tới đợt thanh toán lần 2 vào ngày 2015-06-13', 1),
(102, 53, 'Nguyễn Công Minh', 'minhnguyencong@yahoo.com', '01655703109', '2015-06-13', 'Nhắc nhở khách hàng Nguyễn Công Minh tới đợt thanh toán lần 3 vào ngày 2015-06-13', 1),
(103, 56, 'nguyễn Thị Linh', 'linhnguyen92@gmail.com', '01655703109', '2015-06-16', 'Nhắc nhở khách hàng nguyễn Thị Linh đến studio chuẩn bị chụp ảnh cưới vào ngày 2015-06-16', 1),
(104, 56, 'nguyễn Thị Linh', 'linhnguyen92@gmail.com', '01655703109', '2015-06-17', 'Nhắc nhở khách hàng nguyễn Thị Linh tới đợt thanh toán lần 1 vào ngày 2015-06-17', 1),
(106, 57, 'Nguyễn Mai Kiều Oanh', 'maioanh@yahoo.com', '0979865955', '2015-06-18', 'Nhắc nhở khách hàng Nguyễn Mai Kiều Oanh tới đợt thanh toán lần 2 vào ngày 2015-06-18', 1),
(107, 54, 'Trần Thị Dung', 'dungtran92@yahoo.com', '0938194492', '2015-06-20', 'Nhắc nhở khách hàng Trần Thị Dung đến studio chuẩn bị chụp ảnh cưới vào ngày 2015-06-20', 1),
(108, 54, 'Trần Thị Dung', 'dungtran92@yahoo.com', '0938194492', '2015-06-20', 'Nhắc nhở khách hàng Trần Thị Dung tới đợt thanh toán lần 1 vào ngày 2015-06-20', 1),
(109, 54, 'Trần Thị Dung', 'dungtran92@yahoo.com', '0938194492', '2015-06-22', 'Nhắc nhở khách hàng Trần Thị Dung tới đợt thanh toán lần 2 vào ngày 2015-06-22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `photocontract`
--

CREATE TABLE IF NOT EXISTS `photocontract` (
  `id_user` int(11) NOT NULL,
  `id_contract` int(11) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `status` int(11) DEFAULT '0',
  KEY `id_user` (`id_user`),
  KEY `id_contract` (`id_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photocontract`
--

INSERT INTO `photocontract` (`id_user`, `id_contract`, `start_time`, `end_time`, `status`) VALUES
(67, 1, '2015-06-20', '2015-06-23', 0),
(67, 2, '2015-06-20', '2015-06-23', 0),
(67, 3, '2015-06-20', '2015-06-23', 0),
(67, 4, '2015-06-20', '2015-06-23', 0),
(67, 5, '2015-06-20', '2015-06-23', 0),
(67, 6, '2015-06-20', '2015-06-23', 0),
(67, 7, '2015-06-20', '2015-06-23', 0),
(67, 8, '2015-06-20', '2015-06-23', 0),
(67, 9, '2015-06-20', '2015-06-23', 0),
(67, 10, '2015-06-20', '2015-06-23', 0),
(67, 11, '2015-06-20', '2015-06-23', 0),
(67, 12, '2015-06-20', '2015-06-23', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=79 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `type_user`, `range_user`, `rate_user`, `fullname`, `fullname2`, `tell`, `tell2`, `email`, `email2`, `info_user`, `address`, `avatar`, `have_contract`, `status`, `created_at`, `updated_at`) VALUES
(27, 'admin', 'IEdZYvMnXUelV5bGTSfKtesZXfpE-qtT', '$2y$13$rmQog1huU5uhY8imtRJSiu47KMBWvsNIvDt4jy3UxKNDn/hHhbmNe', NULL, 0, NULL, NULL, 'Nguyen Van Nhan', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com123123', NULL, 'I am Admin, Admin', 'Tổ 10, KV8, P. Ngô Mây, TP. Quy Nhơn, tỉnh Bình Định', 'uploads/avatar/143417338818215953543.jpg', 0, 10, 1431584162, 1431584162),
(51, 'nhannguyen', 'lnHahU7YJ8ROKbSAE9x2X4vNVOSMLk7Y', '$2y$13$9iB7cqHp1wr910lItleQ3elQhHXqyKN9NCNmPDkuvtUoTTpDMZTEG', NULL, 1, NULL, NULL, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen0405@gmail.com', NULL, 'I am customer', 'Tổ 10, KV8, P. Ngô Mây, TP. Quy Nhơn, tỉnh Bình Định', 'uploads/avatar/avatar.jpg', 1, 10, 1433480905, 1433480905),
(52, 'nhannguyencs', '6JbthiW2KgorO0EqnBCmM8ZBQmhncgW8', '$2y$13$BMA/u4ToB7oNPN3Jg2u7EujTPwE5tW4pEZXdunISFRn9xhgBp6Sg6', NULL, 1, NULL, NULL, 'Nguyễn văn Nhàn', NULL, '0938194492', NULL, '51002201@hcmut.edu.vn', NULL, '123', 'Tổ 10, KV8, P. Ngô Mây, TP. Quy Nhơn, tỉnh Bình Định', 'uploads/avatar/avatar.jpg', 1, 10, 1433480962, 1433480962),
(53, 'nguyencongminh', 'ES5hBJUy3U1Xn3H7VcsxpGKQZFvYL4CM', '$2y$13$wqlWTfqBePc1qPSrCfBt/.3w90BEevMvz54ILFlHcf6WnEWropoDG', NULL, 1, NULL, NULL, 'Nguyễn Công Minh', NULL, '01655703109', NULL, 'minhnguyencong@yahoo.com', NULL, '12', 'Gò Vấp, Tp HCM', 'uploads/143348103995523183779.jpg', 1, 10, 1433481040, 1433481040),
(54, 'dungtran', 'r7dToHLeAxELZ7qWhA2Gs0r1vh3_52vq', '$2y$13$rsL96hi.5rLSFbBt8XZ3Hui9Kjj1xfumEFdpAHdhW6PZKpfatY4wm', NULL, 1, NULL, NULL, 'Trần Thị Dung', NULL, '0938194492', NULL, 'dungtran92@yahoo.com', NULL, '12', 'Gò Vấp, Tp HCM', 'uploads/avatar/avatar.jpg', 1, 10, 1433481075, 1433481075),
(55, 'kieuanh', 'lqB_WtDb80Dr7tzhWdnGeZrkQsx8uhnf', '$2y$13$4YGNRqq/UuB149zIaklPfevXOTnFaDcGINzg6crdmIXr0ve2PxcGu', NULL, 1, NULL, NULL, 'Hồ Thị Kiều Anh', NULL, '01666725421', NULL, 'kieuanh@gmail.com', NULL, '1', 'Phường Hiệp Bình Chánh, Thủ Đức', 'uploads/avatar/avatar.jpg', 0, 10, 1433481125, 1433481125),
(56, 'linhnguyen', '2k0p37g-iqJkSdyJJrT5-4tRFIg--yQ1', '$2y$13$vsHcn7Wz2.7yrsg1ZBhYKODMUwunHWVlVFMhFPV1naTeYFnZ2F2Fu', NULL, 1, NULL, NULL, 'nguyễn Thị Linh', NULL, '01655703109', NULL, 'linhnguyen92@gmail.com', NULL, '1', '268 Lý thường kiệt', 'uploads/avatar/avatar.jpg', 1, 10, 1433481181, 1433481181),
(57, 'maioanh', 'l6SUh4ThJii2tmQyoLRXXLxQR1vbII19', '$2y$13$nb31Ou9DD.SH5HdRIadw/eLvqBzx0teeuYGRD345URhzzn.f0hofG', NULL, 1, NULL, NULL, 'Nguyễn Mai Kiều Oanh', NULL, '0979865955', NULL, 'maioanh@yahoo.com', NULL, 'customer', 'hải cảng, quy nhơn, bình định', 'uploads/avatar/avatar.jpg', 1, 10, 1433486521, 1433486521),
(58, 'duongduyen', 'zh_4W9pq6fwBSdDYSi0ztz8_l8VLGBDn', '$2y$13$HTZ4bBL6vJzNbB9ywsHnQOGmxD8UQLnhWG1gu/tLR0iTEnFyoyBQC', NULL, 1, NULL, NULL, 'Dương Thùy Duyên', NULL, '01655703109', NULL, 'duongthuyduyen@yahoo.com', NULL, '123', 'Trần Thị Kỷ, Quy Nhơn, Bình Định', 'uploads/avatar/avatar.jpg', 1, 10, 1433486624, 1433486624),
(59, 'dungnguyen', 'a2htFF0Hf_ubKUOIKY-FHjWMesDqmq2_', '$2y$13$5Ea0RS6T6MDnBIUP5TRjWuK8cvjJxnYQIRoki.m3FJwFOjDpV/PN6', NULL, 1, NULL, NULL, 'Nguyễn Quốc Dũng', NULL, '01666725421', NULL, 'nguyenquocdung@gmail.com', NULL, '123', 'Lãnh vân, Xuân Lãnh, Đồng Xuân, Phú yên', 'uploads/avatar/avatar.jpg', 1, 10, 1433486762, 1433486762),
(60, 'phuongkage', 'eVeOnXJBtTqugFjMaU49JZaBj3lvTkiC', '$2y$13$Wmv5/OyEcQ2EjwxGGYmSkO9hRGddNYXuaC4VWbgPKPZWzvedoO9GG', NULL, 1, NULL, NULL, 'Nguyễn Hoàng Phương', NULL, '0123456789', NULL, 'nguyenhoangphuong@yahoo.com', NULL, 'hoàng Phương', 'Tánh Linh, Bình Thuận', 'uploads/avatar/avatar.jpg', 1, 10, 1433486871, 1433486871),
(61, 'luannguyen', 'L9jvglSU08QIWBKF2abZVI11-P8RUeYo', '$2y$13$M8N1UGpJh.xS20NHfwyQm.CxffKzJjyQgkSEywL4nQACI3gAnBJ3W', NULL, 1, NULL, NULL, 'Nguyễn Văn Luân', NULL, '0983182812', NULL, 'luannguyen28@gmail.com', NULL, 'a', 'Tân Bình, HCM', 'uploads/avatar/avatar.jpg', 1, 10, 1433486950, 1433486950),
(62, 'danielbk08', 'nzSQEBy4y6Js7PB84x6lt4ixa1YcsdME', '$2y$13$whcP8nbCt3k2J.a5Qi/n2uUb8Ay2a/r3c/7ue5svS9OL0mdHgV0CC', NULL, 1, NULL, NULL, 'Lê Minh Luân', NULL, '098989898', NULL, 'danielbk08@gmail.com', NULL, 'lê Minh Luân', 'Quận 12, TP HCM', 'uploads/avatar/avatar.jpg', 0, 10, 1433487008, 1433487008),
(63, 'thanhmai95', '__YkL5HIAyp6EXZrFWUSwXlzfxfrp8fg', '$2y$13$Dn5Th2hC7ltFUwlLh7zpkuhR.uNJKdUBftnRjto4/iQ0XsvKDQpzu', NULL, 1, NULL, NULL, 'Thanh Mai', NULL, '0938194492', NULL, 'thanhmai95@yahoo.com', NULL, 's', 'Hoàng Văn Thụ , TP HCM', 'uploads/avatar/avatar.jpg', 1, 10, 1433513006, 1433513006),
(64, 'thanhhien94', 'srBWepsN54s6tlNsA3c5t07dQthT2x7u', '$2y$13$keH656F9Mjp20Fxgjw0SwOXrIQZKa5PX4ftMwJJzS59g4Gmz1cwU.', NULL, 1, NULL, NULL, 'Nguyễn Thanh Hiền', NULL, '0938194492', NULL, 'thanhhien94@yahoo.com', NULL, '12', 'Phú Nhuận, Hồ Chí Minh', 'uploads/avatar/avatar.jpg', 1, 10, 1433513110, 1433513110),
(65, 'dungnguyen01', 'nE2hUjEClrn4uK3hlrH2TeZwKFzShHgS', '$2y$13$8ocLKo/s0X1cWuNaxGbGsexE8qHSqeXT1hp9YdOeMQMeZZnW7/kqG', NULL, 1, NULL, NULL, 'Nguyễn Quốc Dũng', NULL, '0938194492', NULL, 'nguyenquocdung2001@gmail.com', NULL, '1', 'Tổ 10, KV8, P. Ngô Mây, TP. Quy Nhơn, tỉnh Bình Định', 'uploads/avatar/avatar.jpg', 0, 10, 1433513318, 1433513318),
(66, 'nhoc_sky', '5MVAejdE4xcAC_DPSPEm5_SwXCk_BKSb', '$2y$13$QvZZuWHBWlx.0DcLeXCNKuGYkX.nq3kEkrt6/fgEF3WEgP7.Ovjy.', NULL, 2, 1, 700000, 'Nguyễn Trung Hiếu', NULL, '0938332332', NULL, 'sky_nhoc@gmail.com', NULL, '123', 'Đông Du, Bến Nghé Quận 1', 'uploads/avatar/1434169817620146957881.jpg', 0, 10, 1433513423, 1433513423),
(67, 'nhannguyenphoto', 'qGX73pPpIYE2smxjZqBylvQdti-l402I', '$2y$13$20e9QMtdwNC0/hdQrRrfVONLtW71k//oQIvf1qdr.7ATeksr8dMzK', NULL, 2, 1, 700000, 'Nguyễn Văn Nhàn', NULL, '0938194492', NULL, 'vannhan.nguyen04051992@gmail.com', NULL, 'Nguyễn Văn Nhàn', 'Tổ 10, KV8, P. Ngô Mây, TP. Quy Nhơn, tỉnh Bình Định', 'uploads/1433513602458476474488.jpg', 0, 10, 1433513606, 1433513606),
(68, 'anhhuyphoto', '13U7rpPxXKXovq7N2hRJE7Mj2u_89CTc', '$2y$13$hHyyijZcgXbnh8Xx3441BOhrx2Jhgs2PjtWTyLeR/Dw7UuoamSGwO', NULL, 2, 2, 500000, 'Nguyễn Anh Huy', NULL, '01655703109', NULL, 'anhhuy89@gmail.com', NULL, 'Nguyễn Anh Huy', '12 Tân Sơn, Gò Vấp, Hồ Chí Minh', 'uploads/avatar/avatar.jpg', 0, 10, 1433513769, 1433513769),
(69, 'phuongphoto', 'tPwe2j10yk6jiv2utqx8CULvpFL15dLv', '$2y$13$43eYL7whD6FmCplFokURr.a.v/yrR/unppJW6zyWWrYvZBxrlt/52', NULL, 2, 1, 700000, 'Nguyên Công Phương', NULL, '01657854258', NULL, 'phuongphoto@gmail.com', NULL, '1', 'Phường Hiệp Bình Chánh, Thủ Đức', 'uploads/avatar/avatar.jpg', 0, 10, 1433514080, 1433514080),
(70, 'nguyenvannhan', 'RB8wdtLpGEsMR3O6rDev5LKc02r3JN60', '$2y$13$QeQkfH7ddfdUZu5oChQO5O02XqONrGJgWD9i4mulVjm5fMY4ueGvW', NULL, 2, 1, 900000, 'Nguyễn Văn Nhàn', NULL, '0938194492', NULL, 'nguyenvannhan92@gmail.com', NULL, 'a', 'Tổ 10, KV8, P. Ngô Mây, TP. Quy Nhơn, tỉnh Bình Định', 'uploads/1433514187753620018600.jpg', 0, 10, 1433514194, 1433514194),
(71, 'nguyenhoangphuong', 'K5TKCg-4TLeygFFjuvZdZnKsVPy2awRy', '$2y$13$e7UFlvsZ2OSVLnAejjeFjuwv/.nF/ExZ1DaSimOto6dqkIKK9Al/.', NULL, 2, 3, 350000, 'Nguyễn Hoàng Phương', NULL, '01657854258', NULL, 'nguyenhoangphuong@gmail.com', NULL, '1', 'Phường Hiệp Bình Chánh, Thủ Đức', 'uploads/avatar/avatar.jpg', 0, 10, 1433514330, 1433514330),
(72, 'nhuhangphoto', 'YCBQzAK82jqhCxAkqPvTDQIAkZl-_Q7c', '$2y$13$Fbx7WgH9xsd4Yv3Wgi7BgOrKPx3OWntAWxzrvdTNzmAUnihdeTsym', NULL, 2, 2, 500000, 'Trương Như Hằng', NULL, '0938332332', NULL, 'nhuhang75@gmail.com', NULL, '1', 'Đặng Văn Bích, Quận 5, HCM', 'uploads/avatar/avatar.jpg', 0, 10, 1433514628, 1433514628),
(73, 'photograper', 'fzc_2rYZBLrQF-7VBkLeEejwu8VAaLB8', '$2y$13$5mD2LuzVpGraOsmxmDjQF.YME9rDfGJ4QP2VPLGD9z1aosy5kRO5W', NULL, 2, 2, 500000, 'Nguyễn Công Anh', NULL, '01657854258', NULL, 'photo@gmail.com', NULL, '1', 'Tổ 10, KV8, P. Ngô Mây, TP. Quy Nhơn, tỉnh Bình Định', 'uploads/avatar/avatar.jpg', 0, 10, 1433514824, 1433514824),
(74, 'vietkhanh', '5XxWvSKs5ZSU3rIkurYanT6EDGIQYUdD', '$2y$13$pB3t5yL/XzljjqIwxUrBnuyL6DsBM2GN9jOSoRd2HwDVHLhc5C1TS', NULL, 2, 1, 900000, 'Lê việt Khanh', NULL, '0938194492', NULL, 'vietkhanh@gmail.com', NULL, '1', '268 Lý thường kiệt', 'uploads/avatar/avatar.jpg', 0, 10, 1433514890, 1433514890),
(75, 'makeupsky', 'U8ISa0tYhm-K1mpyX1MkjCuhS576gGP9', '$2y$13$lyn6UImtAZl0RzdsfX1DnuFh9xnH8e7.q.cin8m9UPV7eqGxNY0NW', NULL, 3, 1, 500000, 'Nguyễn Thành Phong', NULL, '0938194492', NULL, 'sky_sky@yahoo.com', NULL, '1', 'Quang Trung,Gò Vấp, Tp HCM', 'uploads/avatar/avatar.jpg', 0, 10, 1433557442, 1433557442),
(76, 'makeupphuonglan', '93fM5bUUHvJCmIoTPDNUvVz7mbdiN5uc', '$2y$13$KzYHoJL1/sYkDkPE/M2k.e5xAZlJdMji3dSxMfabLfqdn/.AW.K4q', NULL, 3, 1, 650000, 'Nguyễn Thị Phương Lan', NULL, '01212131496', NULL, 'phuonglan@yahoo.com', NULL, '1', 'Lý Thái Tổ, Quận 5, TP HCM', 'uploads/avatar/14341730327091088378.jpg', 0, 10, 1433562544, 1433562544),
(77, 'makeuphary', 'uveNflEs5vkx2oerSlSp-dErDKDQRrQR', '$2y$13$pzWvub3V./UBjdiVz.XfjeTEixVLSqReYXb5iaAXlr32zTMdVQOfm', NULL, 3, 1, 500000, 'Nguyễn Kim Ngân', NULL, '01234667668', NULL, 'hary.hary93@yahoo.com', NULL, 'Nguyễn Kim Ngân', 'Cư Xá Lữ Gia, Quận 11, TP HCM', 'uploads/avatar/avatar.jpg', 0, 10, 1433562883, 1433562883),
(78, 'dungtranmakeup', 'BeD5atsZdXhzKHQnNMhrXrDX7OnDcKSY', '$2y$13$cPiUNrXIh4/iziZQwNMyauKwUNB/eb/m/zzMy6w5Tw0weoCxp8Smq', NULL, 3, 2, 500000, 'Trần Thị Thu Dung', NULL, '01655703109', NULL, 'dungtran1993@yahoo.com', NULL, '1', 'Quang Trung,Gò Vấp, Tp HCM', 'uploads/avatar/avatar.jpg', 0, 10, 1433563178, 1433563178);

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
-- Constraints for table `imgalbum`
--
ALTER TABLE `imgalbum`
  ADD CONSTRAINT `imgalbum_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `imgalbum_ibfk_2` FOREIGN KEY (`id_img`) REFERENCES `img` (`id_img`) ON DELETE CASCADE ON UPDATE CASCADE;

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
