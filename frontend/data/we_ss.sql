-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2015 at 05:41 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `we@ss`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1445841009),
('m130524_201442_init', 1445841015);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_campuses`
--

CREATE TABLE IF NOT EXISTS `tbl_campuses` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `inst_id` int(11) NOT NULL COMMENT 'Mother Institution',
  `name` varchar(128) NOT NULL COMMENT 'Campus Name',
  `phone1` varchar(20) DEFAULT NULL COMMENT 'Phone 1',
  `phone2` varchar(20) DEFAULT NULL COMMENT 'Phone 2',
  `phone3` varchar(20) DEFAULT NULL COMMENT 'Phone 3',
  `email1` varchar(128) DEFAULT NULL COMMENT 'Email 1',
  `email2` varchar(128) DEFAULT NULL COMMENT 'Email 2',
  `postal_address` varchar(128) DEFAULT NULL COMMENT 'Postal Address',
  `county` int(11) NOT NULL COMMENT 'County',
  `constituency` int(11) NOT NULL COMMENT 'Constituency',
  `town` varchar(30) NOT NULL COMMENT 'Nearest Town/Urban',
  `physical_address` varchar(128) NOT NULL COMMENT 'Physical Address',
  `main` enum('yes','no') NOT NULL DEFAULT 'no' COMMENT 'Main Campus'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_campuses`
--

INSERT INTO `tbl_campuses` (`id`, `inst_id`, `name`, `phone1`, `phone2`, `phone3`, `email1`, `email2`, `postal_address`, `county`, `constituency`, `town`, `physical_address`, `main`) VALUES
(1, 7, 'Nakuru Town Campus', '', '', '', '', '', '', 1, 1, 'Nairobi', 'Nairobi Town', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_centers`
--

CREATE TABLE IF NOT EXISTS `tbl_centers` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `trainer_id` int(11) NOT NULL COMMENT 'Mother Institution',
  `name` varchar(128) NOT NULL COMMENT 'Center Name',
  `phone1` varchar(20) DEFAULT NULL COMMENT 'Phone 1',
  `phone2` varchar(20) DEFAULT NULL COMMENT 'Phone 2',
  `phone3` varchar(20) DEFAULT NULL COMMENT 'Phone 3',
  `email1` varchar(128) DEFAULT NULL COMMENT 'Email 1',
  `email2` varchar(128) DEFAULT NULL COMMENT 'Email 2',
  `postal_address` varchar(128) DEFAULT NULL COMMENT 'Postal Address',
  `county` int(11) NOT NULL COMMENT 'County',
  `constituency` int(11) NOT NULL COMMENT 'Constituency',
  `town` varchar(30) NOT NULL COMMENT 'Nearest Town/Urban',
  `physical_address` varchar(128) NOT NULL COMMENT 'Physical Address',
  `main` enum('yes','no') NOT NULL DEFAULT 'no' COMMENT 'Head Office'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_centers`
--

INSERT INTO `tbl_centers` (`id`, `trainer_id`, `name`, `phone1`, `phone2`, `phone3`, `email1`, `email2`, `postal_address`, `county`, `constituency`, `town`, `physical_address`, `main`) VALUES
(1, 6, 'Nairobi Center', '', '', '', '', '', '', 1, 1, 'Nairobi', 'Nairobi Town', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `author` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `content`, `status`, `create_time`, `author`, `email`, `url`, `post_id`) VALUES
(1, 'This is a test comment.', 2, 1230952187, 'Tester', 'tester@example.com', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_constituencies`
--

CREATE TABLE IF NOT EXISTS `tbl_constituencies` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `county_id` int(11) NOT NULL COMMENT 'County',
  `name` varchar(50) NOT NULL COMMENT 'Constituency'
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_constituencies`
--

INSERT INTO `tbl_constituencies` (`id`, `county_id`, `name`) VALUES
(1, 1, 'CHANGAMWE'),
(2, 1, 'JOMVU'),
(3, 1, 'KISAUNI'),
(4, 1, 'LIKONI'),
(5, 1, 'MVITA'),
(6, 1, 'NYALI'),
(7, 2, 'KINANGO'),
(8, 2, 'LUNGALUNGA'),
(9, 2, 'MATUGA'),
(10, 2, 'MSAMBWENI'),
(11, 3, 'GANZE'),
(12, 3, 'KALOLENI'),
(13, 3, 'KILIFI NORTH'),
(14, 3, 'KILIFI SOUTH'),
(15, 3, 'MAGARINI'),
(16, 3, 'MALINDI'),
(17, 3, 'RABAI'),
(18, 4, 'BURA'),
(19, 4, 'GALOLE'),
(20, 4, 'GARSEN'),
(21, 5, 'LAMU EAST'),
(22, 5, 'LAMU WEST'),
(23, 6, 'MWATATE'),
(24, 6, 'TAVETA'),
(25, 6, 'VOI'),
(26, 6, 'WUNDANYI'),
(27, 7, 'BALAMBALA'),
(28, 7, 'DADAAB'),
(29, 7, 'FAFI'),
(30, 7, 'GARISSA TOWNSHIP'),
(31, 7, 'IJARA'),
(32, 7, 'LAGDERA'),
(33, 8, 'ELDAS'),
(34, 8, 'TARBAJ'),
(35, 8, 'WAJIR EAST'),
(36, 8, 'WAJIR NORTH'),
(37, 8, 'WAJIR SOUTH'),
(38, 8, 'WAJIR WEST'),
(39, 9, 'BANISSA'),
(40, 9, 'LAFEY'),
(41, 9, 'MANDERA EAST'),
(42, 9, 'MANDERA NORTH'),
(43, 9, 'MANDERA SOUTH'),
(44, 9, 'MANDERA WEST'),
(45, 10, 'LAISAMIS'),
(46, 10, 'MOYALE'),
(47, 10, 'NORTH HORR'),
(48, 10, 'SAKU'),
(49, 11, 'ISIOLO NORTH'),
(50, 11, 'ISIOLO SOUTH'),
(51, 12, 'BUURI'),
(52, 12, 'CENTRAL IMENTI'),
(53, 12, 'IGEMBE CENTRAL'),
(54, 12, 'IGEMBE NORTH'),
(55, 12, 'IGEMBE SOUTH'),
(56, 12, 'NORTH IMENTI'),
(57, 12, 'SOUTH IMENTI'),
(58, 12, 'TIGANIA EAST'),
(59, 12, 'TIGANIA WEST'),
(60, 13, 'CHUKA/IGAMBANG''OMBE'),
(61, 13, 'MAARA'),
(62, 13, 'THARAKA'),
(63, 14, 'MANYATTA'),
(64, 14, 'MBEERE NORTH'),
(65, 14, 'MBEERE SOUTH'),
(66, 14, 'RUNYENJES'),
(67, 15, 'KITUI CENTRAL'),
(68, 15, 'KITUI EAST'),
(69, 15, 'KITUI RURAL'),
(70, 15, 'KITUI SOUTH'),
(71, 15, 'KITUI WEST'),
(72, 15, 'MWINGI CENTRAL'),
(73, 15, 'MWINGI NORTH'),
(74, 15, 'MWINGI WEST'),
(75, 16, 'KANGUNDO'),
(76, 16, 'KATHIANI'),
(77, 16, 'MACHAKOS TOWN'),
(78, 16, 'MASINGA'),
(79, 16, 'MATUNGULU'),
(80, 16, 'MAVOKO'),
(81, 16, 'MWALA'),
(82, 16, 'YATTA'),
(83, 17, 'KAITI'),
(84, 17, 'KIBWEZI EAST'),
(85, 17, 'KIBWEZI WEST'),
(86, 17, 'KILOME'),
(87, 17, 'MAKUENI'),
(88, 17, 'MBOONI'),
(89, 18, 'KINANGOP'),
(90, 18, 'KIPIPIRI'),
(91, 18, 'NDARAGWA'),
(92, 18, 'OL JOROK'),
(93, 18, 'OL KALOU'),
(94, 19, 'KIENI'),
(95, 19, 'MATHIRA'),
(96, 19, 'MUKURWEINI'),
(97, 19, 'NYERI TOWN'),
(98, 19, 'OTHAYA'),
(99, 19, 'TETU'),
(100, 20, 'GICHUGU'),
(101, 20, 'KIRINYAGA CENTRAL'),
(102, 20, 'MWEA'),
(103, 20, 'NDIA'),
(104, 21, 'GATANGA'),
(105, 21, 'KANDARA'),
(106, 21, 'KANGEMA'),
(107, 21, 'KIGUMO'),
(108, 21, 'KIHARU'),
(109, 21, 'MARAGWA'),
(110, 21, 'MATHIOYA'),
(111, 22, 'GATUNDU NORTH'),
(112, 22, 'GATUNDU SOUTH'),
(113, 22, 'GITHUNGURI'),
(114, 22, 'JUJA'),
(115, 22, 'KABETE'),
(116, 22, 'KIAMBAA'),
(117, 22, 'KIAMBU'),
(118, 22, 'KIKUYU'),
(119, 22, 'LARI'),
(120, 22, 'LIMURU'),
(121, 22, 'RUIRU'),
(122, 22, 'THIKA TOWN'),
(123, 23, 'LOIMA'),
(124, 23, 'TURKANA CENTRAL'),
(125, 23, 'TURKANA EAST'),
(126, 23, 'TURKANA NORTH'),
(127, 23, 'TURKANA SOUTH'),
(128, 23, 'TURKANA WEST'),
(129, 24, 'KACHELIBA'),
(130, 24, 'KAPENGURIA'),
(131, 24, 'POKOT SOUTH'),
(132, 24, 'SIGOR'),
(133, 25, 'SAMBURU EAST'),
(134, 25, 'SAMBURU NORTH'),
(135, 25, 'SAMBURU WEST'),
(136, 26, 'CHERANGANY'),
(137, 26, 'ENDEBESS'),
(138, 26, 'KIMININI'),
(139, 26, 'KWANZA'),
(140, 26, 'SABOTI'),
(141, 27, 'AINABKOI'),
(142, 27, 'KAPSERET'),
(143, 27, 'KESSES'),
(144, 27, 'MOIBEN'),
(145, 27, 'SOY'),
(146, 27, 'TURBO'),
(147, 28, 'KEIYO NORTH'),
(148, 28, 'KEIYO SOUTH'),
(149, 28, 'MARAKWET EAST'),
(150, 28, 'MARAKWET WEST'),
(151, 29, 'ALDAI'),
(152, 29, 'CHESUMEI'),
(153, 29, 'EMGWEN'),
(154, 29, 'MOSOP'),
(155, 29, 'NANDI HILLS'),
(156, 29, 'TINDERET'),
(157, 30, 'BARINGO  NORTH'),
(158, 30, 'BARINGO CENTRAL'),
(159, 30, 'BARINGO SOUTH'),
(160, 30, 'ELDAMA RAVINE'),
(161, 30, 'MOGOTIO'),
(162, 30, 'TIATY'),
(163, 31, 'LAIKIPIA EAST'),
(164, 31, 'LAIKIPIA NORTH'),
(165, 31, 'LAIKIPIA WEST'),
(166, 32, 'BAHATI'),
(167, 32, 'GILGIL'),
(168, 32, 'KURESOI NORTH'),
(169, 32, 'KURESOI SOUTH'),
(170, 32, 'MOLO'),
(171, 32, 'NAIVASHA'),
(172, 32, 'NAKURU TOWN EAST'),
(173, 32, 'NAKURU TOWN WEST'),
(174, 32, 'NJORO'),
(175, 32, 'RONGAI'),
(176, 32, 'SUBUKIA'),
(177, 33, 'EMURUA DIKIRR'),
(178, 33, 'KILGORIS'),
(179, 33, 'NAROK EAST'),
(180, 33, 'NAROK NORTH'),
(181, 33, 'NAROK SOUTH'),
(182, 33, 'NAROK WEST'),
(183, 34, 'KAJIADO CENTRAL'),
(184, 34, 'KAJIADO EAST'),
(185, 34, 'KAJIADO NORTH'),
(186, 34, 'KAJIADO SOUTH'),
(187, 34, 'KAJIADO WEST'),
(188, 35, 'AINAMOI'),
(189, 35, 'BELGUT'),
(190, 35, 'BURETI'),
(191, 35, 'KIPKELION EAST'),
(192, 35, 'KIPKELION WEST'),
(193, 35, 'SIGOWET/SOIN'),
(194, 36, 'BOMET CENTRAL'),
(195, 36, 'BOMET EAST'),
(196, 36, 'CHEPALUNGU'),
(197, 36, 'KONOIN'),
(198, 36, 'SOTIK'),
(199, 37, 'BUTERE'),
(200, 37, 'IKOLOMANI'),
(201, 37, 'KHWISERO'),
(202, 37, 'LIKUYANI'),
(203, 37, 'LUGARI'),
(204, 37, 'LURAMBI'),
(205, 37, 'MALAVA'),
(206, 37, 'MATUNGU'),
(207, 37, 'MUMIAS EAST'),
(208, 37, 'MUMIAS WEST'),
(209, 37, 'NAVAKHOLO'),
(210, 37, 'SHINYALU'),
(211, 38, 'EMUHAYA'),
(212, 38, 'HAMISI'),
(213, 38, 'LUANDA'),
(214, 38, 'SABATIA'),
(215, 38, 'VIHIGA'),
(216, 39, 'BUMULA'),
(217, 39, 'KABUCHAI'),
(218, 39, 'KANDUYI'),
(219, 39, 'KIMILILI'),
(220, 39, 'MT. ELGON'),
(221, 39, 'SIRISIA'),
(222, 39, 'TONGAREN'),
(223, 39, 'WEBUYE EAST'),
(224, 39, 'WEBUYE WEST'),
(225, 40, 'BUDALANGI'),
(226, 40, 'BUTULA'),
(227, 40, 'FUNYULA'),
(228, 40, 'MATAYOS'),
(229, 40, 'NAMBALE'),
(230, 40, 'TESO NORTH'),
(231, 40, 'TESO SOUTH'),
(232, 41, 'ALEGO USONGA'),
(233, 41, 'BONDO'),
(234, 41, 'GEM'),
(235, 41, 'RARIEDA'),
(236, 41, 'UGENYA'),
(237, 41, 'UGUNJA'),
(238, 42, 'KISUMU CENTRAL'),
(239, 42, 'KISUMU EAST'),
(240, 42, 'KISUMU WEST'),
(241, 42, 'MUHORONI'),
(242, 42, 'NYAKACH'),
(243, 42, 'NYANDO'),
(244, 42, 'SEME'),
(245, 43, 'HOMA BAY TOWN'),
(246, 43, 'KABONDO KASIPUL'),
(247, 43, 'KARACHUONYO'),
(248, 43, 'KASIPUL'),
(249, 43, 'MBITA'),
(250, 43, 'NDHIWA'),
(251, 43, 'RANGWE'),
(252, 43, 'SUBA'),
(253, 44, 'AWENDO'),
(254, 44, 'KURIA EAST'),
(255, 44, 'KURIA WEST'),
(256, 44, 'NYATIKE'),
(257, 44, 'RONGO'),
(258, 44, 'SUNA EAST'),
(259, 44, 'SUNA WEST'),
(260, 44, 'URIRI'),
(261, 45, 'BOBASI'),
(262, 45, 'BOMACHOGE BORABU'),
(263, 45, 'BOMACHOGE CHACHE'),
(264, 45, 'BONCHARI'),
(265, 45, 'KITUTU CHACHE NORTH'),
(266, 45, 'KITUTU CHACHE SOUTH'),
(267, 45, 'NYARIBARI CHACHE'),
(268, 45, 'NYARIBARI MASABA'),
(269, 45, 'SOUTH MUGIRANGO'),
(270, 46, 'BORABU'),
(271, 46, 'KITUTU MASABA'),
(272, 46, 'NORTH MUGIRANGO'),
(273, 46, 'WEST MUGIRANGO'),
(274, 47, 'DAGORETTI NORTH'),
(275, 47, 'DAGORETTI SOUTH'),
(276, 47, 'EMBAKASI CENTRAL'),
(277, 47, 'EMBAKASI EAST'),
(278, 47, 'EMBAKASI NORTH'),
(279, 47, 'EMBAKASI SOUTH'),
(280, 47, 'EMBAKASI WEST'),
(281, 47, 'KAMUKUNJI'),
(282, 47, 'KASARANI'),
(283, 47, 'KIBRA'),
(284, 47, 'LANGATA'),
(285, 47, 'MAKADARA'),
(286, 47, 'MATHARE'),
(287, 47, 'ROYSAMBU'),
(288, 47, 'RUARAKA'),
(289, 47, 'STAREHE'),
(290, 47, 'WESTLANDS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_counties`
--

CREATE TABLE IF NOT EXISTS `tbl_counties` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(50) NOT NULL COMMENT 'County'
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_counties`
--

INSERT INTO `tbl_counties` (`id`, `name`) VALUES
(1, 'MOMBASA'),
(2, 'KWALE'),
(3, 'KILIFI'),
(4, 'TANA RIVER'),
(5, 'LAMU'),
(6, 'TAITA TAVETA'),
(7, 'GARISSA'),
(8, 'WAJIR'),
(9, 'MANDERA'),
(10, 'MARSABIT'),
(11, 'ISIOLO'),
(12, 'MERU'),
(13, 'THARAKA - NITHI'),
(14, 'EMBU'),
(15, 'KITUI'),
(16, 'MACHAKOS'),
(17, 'MAKUENI'),
(18, 'NYANDARUA'),
(19, 'NYERI'),
(20, 'KIRINYAGA'),
(21, 'MURANG''A'),
(22, 'KIAMBU'),
(23, 'TURKANA'),
(24, 'WEST POKOT'),
(25, 'SAMBURU'),
(26, 'TRANS NZOIA'),
(27, 'UASIN GISHU'),
(28, 'ELGEYO/MARAKWET'),
(29, 'NANDI'),
(30, 'BARINGO'),
(31, 'LAIKIPIA'),
(32, 'NAKURU'),
(33, 'NAROK'),
(34, 'KAJIADO'),
(35, 'KERICHO'),
(36, 'BOMET'),
(37, 'KAKAMEGA'),
(38, 'VIHIGA'),
(39, 'BUNGOMA'),
(40, 'BUSIA'),
(41, 'SIAYA'),
(42, 'KISUMU'),
(43, 'HOMA BAY'),
(44, 'MIGORI'),
(45, 'KISII'),
(46, 'NYAMIRA'),
(47, 'NAIROBI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

CREATE TABLE IF NOT EXISTS `tbl_courses` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `inst_id` int(11) NOT NULL COMMENT 'Institution',
  `course_type` varchar(25) NOT NULL COMMENT 'Nature Of Course',
  `course_name` text NOT NULL COMMENT 'Course Name',
  `mean_grade` varchar(2) NOT NULL COMMENT 'Mean Grade',
  `annual_fees` int(11) NOT NULL COMMENT 'Annual Fees',
  `course_duration` int(1) NOT NULL COMMENT 'Course Duration',
  `sessions_per_year` int(1) NOT NULL COMMENT 'Sessions Per Year',
  `active` enum('yes','no') NOT NULL DEFAULT 'yes' COMMENT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_campuses`
--

CREATE TABLE IF NOT EXISTS `tbl_course_campuses` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `campus_id` int(11) NOT NULL COMMENT 'Campus',
  `course_id` int(11) NOT NULL COMMENT 'Course',
  `active` enum('yes','no') NOT NULL DEFAULT 'yes' COMMENT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_levels`
--

CREATE TABLE IF NOT EXISTS `tbl_course_levels` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `course_id` int(11) NOT NULL COMMENT 'Course',
  `level` varchar(15) NOT NULL COMMENT 'Graduation',
  `active` enum('yes','no') NOT NULL DEFAULT 'yes' COMMENT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_subject_cat_grades`
--

CREATE TABLE IF NOT EXISTS `tbl_course_subject_cat_grades` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `course_id` int(11) NOT NULL COMMENT 'Course',
  `category` varchar(25) NOT NULL COMMENT 'Category',
  `no_of_subjects` int(1) DEFAULT NULL COMMENT 'No Of Subjects',
  `min_grade` varchar(2) DEFAULT NULL COMMENT 'Minimum Grade'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_subject_grades`
--

CREATE TABLE IF NOT EXISTS `tbl_course_subject_grades` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `course_id` int(11) NOT NULL COMMENT 'Course',
  `subject` varchar(5) NOT NULL COMMENT 'Subject',
  `min_grade` varchar(2) DEFAULT NULL COMMENT 'Minimum Grade'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_institutions`
--

CREATE TABLE IF NOT EXISTS `tbl_institutions` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `inst_name` varchar(128) NOT NULL COMMENT 'Name of Institution',
  `inst_type` varchar(25) NOT NULL COMMENT 'Institution Type',
  `website` varchar(128) DEFAULT NULL COMMENT 'Website',
  `logo` varchar(128) DEFAULT NULL COMMENT 'Logo',
  `motto` text COMMENT 'Motto',
  `mission` text COMMENT 'Mission Statement',
  `vision` text COMMENT 'Vision Statement',
  `active` enum('yes','no') NOT NULL DEFAULT 'no' COMMENT 'Active'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_institutions`
--

INSERT INTO `tbl_institutions` (`id`, `inst_name`, `inst_type`, `website`, `logo`, `motto`, `mission`, `vision`, `active`) VALUES
(7, 'University of Nairobi', 'univ', '', '', '', '', '', 'no'),
(8, 'Strathmore', 'univ', '', '', '', '', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inst_types`
--

CREATE TABLE IF NOT EXISTS `tbl_inst_types` (
  `id` int(11) NOT NULL COMMENT 'id',
  `symbol` varchar(25) NOT NULL COMMENT 'symbol',
  `name` varchar(25) NOT NULL COMMENT 'name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='the institution types e.g. university';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lookup`
--

CREATE TABLE IF NOT EXISTS `tbl_lookup` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_lookup`
--

INSERT INTO `tbl_lookup` (`id`, `name`, `code`, `type`, `position`) VALUES
(1, 'Draft', 1, 'PostStatus', 1),
(2, 'Published', 2, 'PostStatus', 2),
(3, 'Archived', 3, 'PostStatus', 3),
(4, 'Pending Approval', 1, 'CommentStatus', 1),
(5, 'Approved', 2, 'CommentStatus', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_person`
--

CREATE TABLE IF NOT EXISTS `tbl_person` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `fname` varchar(25) NOT NULL COMMENT 'First/English Name',
  `mname` varchar(25) DEFAULT NULL COMMENT 'Middle/Given Name',
  `lname` varchar(25) NOT NULL COMMENT 'Family/Last/Surname',
  `gender` enum('Male','Female') NOT NULL COMMENT 'Gender',
  `dob` date DEFAULT NULL COMMENT 'Date of Birth',
  `id_no` varchar(8) DEFAULT NULL COMMENT 'Nat. ID. No.',
  `phone` varchar(13) DEFAULT NULL COMMENT 'Cell Phone No.',
  `cse_yr` int(4) NOT NULL COMMENT 'KCSE Year',
  `cse_index` varchar(13) NOT NULL COMMENT 'Index No.',
  `grade` varchar(2) NOT NULL COMMENT 'Mean Grade'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_person`
--

INSERT INTO `tbl_person` (`id`, `fname`, `mname`, `lname`, `gender`, `dob`, `id_no`, `phone`, `cse_yr`, `cse_index`, `grade`) VALUES
(4, 'Sarah', 'Khatete', 'Nendela', 'Female', '1985-08-05', '25265712', '0727171565', 2004, '602710010', 'B-'),
(5, 'Shadrack', 'Wabomba', 'Wanyonyi', 'Male', '1985-08-24', '24544153', '0725171265', 2003, '602101001', 'B+'),
(6, 'Siati', 'Siati', 'Siati', 'Male', '1985-08-05', '12345678', '0789129098', 2012, '602101001', 'A-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `content`, `tags`, `status`, `create_time`, `update_time`, `author_id`) VALUES
(1, 'Welcome!', 'This blog system is developed using Yii. It is meant to demonstrate how to use Yii to build a complete real-world application. Complete source code may be found in the Yii releases.\r\n\r\nFeel free to try this system by writing new posts and posting comments.', 'yii, blog', 2, 1230952187, 1230952187, 1),
(2, 'A Test Post', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'test', 2, 1230952187, 1230952187, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_subject_scores`
--

CREATE TABLE IF NOT EXISTS `tbl_student_subject_scores` (
  `id` int(11) NOT NULL COMMENT 'id',
  `stud_id` int(11) NOT NULL COMMENT 'Student ID',
  `subject` varchar(5) NOT NULL COMMENT 'Subject',
  `grade` varchar(2) DEFAULT NULL COMMENT 'Grade'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_subject_scores`
--

INSERT INTO `tbl_student_subject_scores` (`id`, `stud_id`, `subject`, `grade`) VALUES
(1, 4, 'phy', 'A'),
(2, 5, 'phy', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tag`
--

CREATE TABLE IF NOT EXISTS `tbl_tag` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_tag`
--

INSERT INTO `tbl_tag` (`id`, `name`, `frequency`) VALUES
(1, 'yii', 1),
(2, 'blog', 1),
(3, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trainers`
--

CREATE TABLE IF NOT EXISTS `tbl_trainers` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(128) NOT NULL COMMENT 'Name of Institution',
  `website` varchar(128) DEFAULT NULL COMMENT 'Website',
  `logo` varchar(128) DEFAULT NULL COMMENT 'Logo',
  `motto` text COMMENT 'Motto',
  `mission` text COMMENT 'Mission Statement',
  `vision` text COMMENT 'Vision Statement',
  `brief` text COMMENT 'Brief Description',
  `active` enum('yes','no') NOT NULL DEFAULT 'no' COMMENT 'Active'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_trainers`
--

INSERT INTO `tbl_trainers` (`id`, `name`, `website`, `logo`, `motto`, `mission`, `vision`, `brief`, `active`) VALUES
(6, 'Inspiration For Greatness', '', '', '', '', '', '', 'no'),
(9, 'ifg', '', '', '', '', '', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Email',
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  `date_created` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `password`, `salt`, `profile`, `date_created`, `last_login`) VALUES
(1, 'demo', 'demo@demo.com', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760', NULL, '0000-00-00 00:00:00', NULL),
(2, 'siati', 'siati@admin.com', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760', NULL, '0000-00-00 00:00:00', '2015-10-22 23:08:49'),
(3, 'wsiati', 'wsiati@live.com', 'ee3fcba726ac85f22c6f9866a3d405c3', '562b7c03511b03.75414100', 'student', '2015-10-24 14:39:31', '2015-10-28 09:01:57'),
(4, 'khate', 'snendela@gmail.com', '31de835049c7e8444e906615626582c1', '562ba1f3c84f87.36439614', 'student', '2015-10-24 17:21:23', '2015-10-28 04:39:57'),
(5, 'uoni', 'info@uoni.co.ke', 'uoni', '562bf55d0d18e4.40922889', 'institution', '2015-10-24 23:17:17', '2015-10-28 04:32:12'),
(6, 'i4g', 'i4g@gmail.com', '0a2c904c3321ba14c0e5bba880b0babd', '562cd5f4ee6f01.11632770', 'trainer', '2015-10-25 14:15:32', '2015-10-28 04:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `last_logged_in` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `profile`, `status`, `created_at`, `updated_at`, `last_logged_in`) VALUES
(1, 'me', 'RQ62yf25UfPQEaeEMHc5mLjnxWU-_Vd5', '$2y$13$78HZNJXh5WCyKFe4Gsz/De3AzmpHl3obEW7nbQsk.qO.sfCCw55M.', NULL, 'me@me.u', 'we@ss', 10, 1446051872, 1446051872, 0),
(2, 'wewe', 'wPZHKpQVu5CwRjs8vNsxniB5-4vRMUwq', '$2y$13$tFo8lbTe.xHazEjH4ZZ96u1Dvze3tgQxdaTc1JLrK0NAcIYTTb.wu', NULL, 'w@w.m', '', 10, 1446051872, 1446051872, 0),
(3, 'tu', '0EaT5-ihrxovm-D3VOXIEA0yaYgxiuZJ', '$2y$13$tKI6zMmEpD4TriOE3AttSeUi73GBzBRxGso5eMoPslDcwFhf3eCT2', NULL, 'y@g.m', '', 10, 1446051872, 1446051872, 0),
(4, 'rop', 'pLxqiFYGe7DWFyJAHngRO8YyZTz57_CN', '$2y$13$yHXmT4UNGcc2s0hTowsj1edJ4WQlmc333Y26Rz./l.gkxJmW9XX7K', NULL, 'rop@rop.rop', '', 10, 1446118445, 1446119537, 1446119537),
(5, 'siati', '1UI3ncV9VwBhp6pVqncZ21VoO5onah4u', '$2y$13$qDuVwE2rtIkDd65rt83qFeh02II3If6E8/cdu0odxuBp0aayF5xqa', NULL, 'wsiati@live.com', 'student', 10, 1446197418, 1446437639, 1446437639),
(6, 'sop', 'NFmnjPszPDsr_t4roQIPdm-hmPeBr8zz', '$2y$13$cddtHWiXq63cWiVyUJwIOOsejdQl/nSGWY17jPp4k7cQyxKJLbWoe', NULL, 'rop@rop.ro', 'student', 10, 1446216473, 1446216473, 0),
(7, 'uoni', 'NCJzXKQW_tZxFheTfz35CxMh6n0t-gGG', '$2y$13$Aqm5cJzaoDSgrUqak/RPLO2vImkOjAl2dXOxxza9n1foB4Z9TVKZq', NULL, 'uoni@live.com', 'institution', 10, 1446216721, 1446389697, 1446389697),
(8, 'strh', 'B1KP9bTMUWJPjX4-jtZvUCJpFhbJYe_d', '$2y$13$gW1gLyJS6aGAFJXpnxNyJ.vJV7XFoVd9FUbCISc3./E2NsCxxiOZm', NULL, 'strh@more.com', 'institution', 10, 1446217077, 1446217077, 0),
(9, 'ifg', 's3H1rhIzLk-Ixv9Z5W9Y6jYMxubVlthI', '$2y$13$1Z8Koy893ue.KT98JJ//a.nAsI365nUGbn03k3t1Rz.qBCMx3ftuG', NULL, 'ifg@ifg.com', 'trainer', 10, 1446217427, 1446217451, 1446217451);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tbl_campuses`
--
ALTER TABLE `tbl_campuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inst_id` (`inst_id`);

--
-- Indexes for table `tbl_centers`
--
ALTER TABLE `tbl_centers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inst_id` (`trainer_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_post` (`post_id`);

--
-- Indexes for table `tbl_constituencies`
--
ALTER TABLE `tbl_constituencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_counties`
--
ALTER TABLE `tbl_counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course_campuses`
--
ALTER TABLE `tbl_course_campuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course_levels`
--
ALTER TABLE `tbl_course_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course_subject_cat_grades`
--
ALTER TABLE `tbl_course_subject_cat_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course_subject_grades`
--
ALTER TABLE `tbl_course_subject_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_institutions`
--
ALTER TABLE `tbl_institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inst_types`
--
ALTER TABLE `tbl_inst_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `symbol` (`symbol`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_lookup`
--
ALTER TABLE `tbl_lookup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_person`
--
ALTER TABLE `tbl_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_post_author` (`author_id`);

--
-- Indexes for table `tbl_student_subject_scores`
--
ALTER TABLE `tbl_student_subject_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unique_user_subject` (`stud_id`,`subject`);

--
-- Indexes for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_trainers`
--
ALTER TABLE `tbl_trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_campuses`
--
ALTER TABLE `tbl_campuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_centers`
--
ALTER TABLE `tbl_centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_constituencies`
--
ALTER TABLE `tbl_constituencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=291;
--
-- AUTO_INCREMENT for table `tbl_counties`
--
ALTER TABLE `tbl_counties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- AUTO_INCREMENT for table `tbl_course_campuses`
--
ALTER TABLE `tbl_course_campuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- AUTO_INCREMENT for table `tbl_course_levels`
--
ALTER TABLE `tbl_course_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- AUTO_INCREMENT for table `tbl_course_subject_cat_grades`
--
ALTER TABLE `tbl_course_subject_cat_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- AUTO_INCREMENT for table `tbl_course_subject_grades`
--
ALTER TABLE `tbl_course_subject_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- AUTO_INCREMENT for table `tbl_institutions`
--
ALTER TABLE `tbl_institutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_inst_types`
--
ALTER TABLE `tbl_inst_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';
--
-- AUTO_INCREMENT for table `tbl_lookup`
--
ALTER TABLE `tbl_lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_person`
--
ALTER TABLE `tbl_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_student_subject_scores`
--
ALTER TABLE `tbl_student_subject_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_trainers`
--
ALTER TABLE `tbl_trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `tbl_post` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
