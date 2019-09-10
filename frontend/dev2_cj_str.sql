-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2019 at 03:31 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev2_cj`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(5) NOT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `address_line1` varchar(200) DEFAULT NULL,
  `address_line2` varchar(200) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postal_code` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(4) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bareacts`
--

CREATE TABLE `bareacts` (
  `id` int(20) NOT NULL,
  `doc_id` varchar(40) NOT NULL,
  `sdoc_id` varchar(40) DEFAULT NULL,
  `sdoc_txt` varchar(100) DEFAULT NULL,
  `pdoc_id` varchar(40) DEFAULT NULL,
  `pdoc_txt` varchar(100) DEFAULT NULL,
  `act_state` varchar(255) NOT NULL,
  `act_title` varchar(255) NOT NULL,
  `chapt_no` int(4) DEFAULT NULL,
  `chapt_title` varchar(255) DEFAULT NULL,
  `sec_id` varchar(100) DEFAULT NULL,
  `sec_title` varchar(255) DEFAULT NULL,
  `body` longtext NOT NULL,
  `level` varchar(2) NOT NULL,
  `cdoc_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table For Bare Acts';

-- --------------------------------------------------------

--
-- Table structure for table `bareact_catg_mast`
--

CREATE TABLE `bareact_catg_mast` (
  `act_catg_code` int(4) NOT NULL DEFAULT 0,
  `act_catg_desc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `act_group_code` int(3) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bareact_count`
--

CREATE TABLE `bareact_count` (
  `j_doc_id` varchar(40) DEFAULT NULL,
  `bareact_code` varchar(10) DEFAULT NULL,
  `tot_count` bigint(21) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bareact_desc`
--

CREATE TABLE `bareact_desc` (
  `id` int(9) DEFAULT NULL,
  `doc_id` int(10) DEFAULT NULL,
  `bareact_code` varchar(10) DEFAULT NULL,
  `bareact_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bareact_detl`
--

CREATE TABLE `bareact_detl` (
  `id` int(20) NOT NULL DEFAULT 0,
  `level` varchar(2) NOT NULL,
  `sno` varchar(4) DEFAULT NULL,
  `doc_id` int(10) NOT NULL,
  `bareact_code` int(5) DEFAULT NULL,
  `bareact_desc` varchar(255) DEFAULT NULL,
  `act_group_code` int(2) DEFAULT NULL,
  `act_group_desc` varchar(25) DEFAULT NULL,
  `act_catg_code` int(3) DEFAULT NULL,
  `act_catg_desc` varchar(100) DEFAULT NULL,
  `act_sub_catg_code` int(4) DEFAULT NULL,
  `act_sub_catg_desc` varchar(100) DEFAULT NULL,
  `act_title` varchar(255) NOT NULL,
  `enact_date` date DEFAULT NULL,
  `act_status_mast` varchar(25) DEFAULT NULL,
  `act_status_detl` varchar(1) DEFAULT NULL,
  `pdoc_id` varchar(40) DEFAULT NULL,
  `pdoc_txt` varchar(100) DEFAULT NULL,
  `sdoc_id` varchar(40) DEFAULT NULL,
  `sdoc_txt` varchar(100) DEFAULT NULL,
  `cdoc_id` varchar(40) NOT NULL,
  `act_state` varchar(255) NOT NULL,
  `sec_id` varchar(100) DEFAULT NULL,
  `chapt_no` int(4) DEFAULT NULL,
  `chapt_title` varchar(255) DEFAULT NULL,
  `sec_title` varchar(255) DEFAULT NULL,
  `ref_doc_id` varchar(10) DEFAULT NULL,
  `body` longtext NOT NULL,
  `docid_ind` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bareact_group_mast`
--

CREATE TABLE `bareact_group_mast` (
  `act_group_code` int(3) DEFAULT NULL,
  `act_group_desc` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bareact_mast`
--

CREATE TABLE `bareact_mast` (
  `id` int(9) DEFAULT NULL,
  `doc_id` int(10) NOT NULL,
  `bareact_code` int(5) NOT NULL,
  `bareact_desc` varchar(255) DEFAULT NULL,
  `act_group_code` int(2) DEFAULT NULL,
  `act_group_desc` varchar(25) DEFAULT NULL,
  `act_catg_code` int(3) DEFAULT NULL,
  `act_catg_desc` varchar(100) DEFAULT NULL,
  `act_status` varchar(25) DEFAULT NULL,
  `enact_date` date DEFAULT NULL,
  `ref_doc_id` varchar(10) DEFAULT NULL,
  `act_sub_catg_code` int(4) DEFAULT NULL,
  `act_sub_catg_desc` varchar(100) DEFAULT NULL,
  `tot_section` int(3) DEFAULT NULL,
  `tot_chap` int(3) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bareact_subcatg_mast`
--

CREATE TABLE `bareact_subcatg_mast` (
  `act_sub_catg_code` int(4) DEFAULT NULL,
  `act_sub_catg_desc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `act_catg_code` int(4) DEFAULT NULL,
  `act_catg_desc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `act_group_code` int(3) DEFAULT NULL,
  `act_group_desc` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `browsing_log`
--

CREATE TABLE `browsing_log` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `browse_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `browse_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city_mast`
--

CREATE TABLE `city_mast` (
  `city_code` int(7) NOT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `shrt_name` varchar(10) DEFAULT NULL,
  `state_code` int(8) DEFAULT NULL,
  `state_name` varchar(25) DEFAULT NULL,
  `state_shrt_name` varchar(10) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) DEFAULT NULL,
  `country_shrt_name` varchar(10) DEFAULT NULL,
  `court_stat` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `college_mast`
--

CREATE TABLE `college_mast` (
  `college_code` varchar(4) DEFAULT NULL,
  `college_name` varchar(50) DEFAULT NULL,
  `total_students` int(4) DEFAULT NULL,
  `city_code` int(7) DEFAULT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `state_code` int(6) DEFAULT NULL,
  `state_name` varchar(25) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country_mast`
--

CREATE TABLE `country_mast` (
  `country_code` int(4) NOT NULL,
  `country_name` varchar(25) DEFAULT NULL,
  `shrt_name` varchar(10) DEFAULT NULL,
  `court_group_code` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code`
--

CREATE TABLE `coupon_code` (
  `coupon_id` int(4) NOT NULL,
  `rand_code` varchar(6) NOT NULL,
  `gen_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `use_limit` int(2) DEFAULT NULL,
  `used` int(2) DEFAULT NULL,
  `discount_type` varchar(1) NOT NULL,
  `discount_val` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_mast`
--

CREATE TABLE `course_mast` (
  `course_code` varchar(8) NOT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `course_duration` int(2) DEFAULT NULL,
  `course_fees` int(5) DEFAULT NULL,
  `course_level_name` varchar(50) DEFAULT NULL,
  `course_eligibility` varchar(50) DEFAULT NULL,
  `course_intro` text DEFAULT NULL,
  `course_objective` text DEFAULT NULL,
  `course_syllabus` text DEFAULT NULL,
  `course_content` text DEFAULT NULL,
  `course_summary` text DEFAULT NULL,
  `course_marking` text DEFAULT NULL,
  `tot_student` int(5) DEFAULT NULL,
  `tot_completed` int(5) DEFAULT NULL,
  `tot_ongoing` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `court_group_mast`
--

CREATE TABLE `court_group_mast` (
  `court_group_name` varchar(20) DEFAULT NULL,
  `short_desc` varchar(5) DEFAULT NULL,
  `court_group_code` int(3) DEFAULT NULL,
  `judgment_count` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `court_mast`
--

CREATE TABLE `court_mast` (
  `court_code` int(11) NOT NULL,
  `court_name` varchar(100) DEFAULT NULL,
  `court_shrt_name` varchar(20) DEFAULT NULL,
  `court_type` varchar(2) DEFAULT NULL,
  `bench_status` varchar(1) DEFAULT NULL,
  `court_status` varchar(20) DEFAULT NULL,
  `city_code` int(7) DEFAULT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `state_code` int(8) DEFAULT NULL,
  `state_name` varchar(25) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) DEFAULT NULL,
  `court_remark` varchar(100) DEFAULT NULL,
  `court_address` varchar(500) DEFAULT NULL,
  `bench_code` int(7) NOT NULL,
  `court_type_shrt_name` varchar(10) DEFAULT NULL,
  `court_group_code` int(3) DEFAULT NULL,
  `court_group_name` varchar(20) DEFAULT NULL,
  `court_type_name` varchar(20) DEFAULT NULL,
  `bench_name` varchar(100) DEFAULT NULL,
  `court_flag` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `court_mast_court`
-- (See below for the actual view)
--
CREATE TABLE `court_mast_court` (
`court_code` int(11)
,`court_name` varchar(100)
,`tot_judg` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `court_mast_hedr`
--

CREATE TABLE `court_mast_hedr` (
  `court_code` int(11) NOT NULL,
  `court_name` varchar(100) DEFAULT NULL,
  `court_shrt_name` varchar(20) DEFAULT NULL,
  `court_group_code` int(3) DEFAULT NULL,
  `court_group_name` varchar(20) DEFAULT NULL,
  `court_type` varchar(2) DEFAULT NULL,
  `court_type_name` varchar(20) DEFAULT NULL,
  `state_code` int(8) DEFAULT NULL,
  `state_name` varchar(25) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) DEFAULT NULL,
  `court_type_shrt_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `court_type_mast`
--

CREATE TABLE `court_type_mast` (
  `court_type` int(3) DEFAULT NULL,
  `court_type_desc` varchar(50) DEFAULT NULL,
  `short_desc` varchar(10) DEFAULT NULL,
  `court_group_code` int(1) DEFAULT NULL,
  `court_group_name` varchar(20) DEFAULT NULL,
  `country_code` int(3) DEFAULT NULL,
  `court_type_count` int(2) DEFAULT NULL,
  `judgment_count` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers_new`
--

CREATE TABLE `customers_new` (
  `id` int(5) NOT NULL DEFAULT 0,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `occupation` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cust_mast`
--

CREATE TABLE `cust_mast` (
  `custid` int(9) NOT NULL,
  `custname` varchar(100) NOT NULL,
  `userid` int(9) NOT NULL,
  `username` varchar(50) NOT NULL,
  `custlogo` varchar(200) DEFAULT NULL,
  `regsdate` date DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile1` varchar(12) DEFAULT NULL,
  `mobile2` int(10) DEFAULT NULL,
  `fax` varchar(10) DEFAULT NULL,
  `tele` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `custaddr` varchar(1000) DEFAULT NULL,
  `city_code` int(7) DEFAULT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `state_code` int(6) DEFAULT NULL,
  `state_name` varchar(25) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) DEFAULT NULL,
  `panno` varchar(20) DEFAULT NULL,
  `gstno` varchar(30) DEFAULT NULL,
  `adharno` varchar(30) DEFAULT NULL,
  `cust_status_id` int(2) DEFAULT NULL,
  `cust_status_name` varchar(30) DEFAULT NULL,
  `cust_type_id` int(2) DEFAULT NULL,
  `cust_type_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doc_catg_mast`
--

CREATE TABLE `doc_catg_mast` (
  `doc_catg_code` int(9) DEFAULT NULL,
  `doc_catg_name` varchar(50) DEFAULT NULL,
  `doc_catg_desc` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doc_mast`
--

CREATE TABLE `doc_mast` (
  `doc_numb` varchar(9) DEFAULT NULL,
  `doc_name` varchar(50) DEFAULT NULL,
  `doc_title` varchar(250) DEFAULT NULL,
  `doc_url` varchar(250) DEFAULT NULL,
  `doc_date` date DEFAULT NULL,
  `doc_yyyy` int(4) DEFAULT NULL,
  `doc_catg_code` int(9) DEFAULT NULL,
  `doc_catg_name` varchar(50) DEFAULT NULL,
  `doc_subcatg_code` int(9) DEFAULT NULL,
  `doc_subcatg_name` varchar(50) DEFAULT NULL,
  `doc_abstract` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doc_subcatg_mast`
--

CREATE TABLE `doc_subcatg_mast` (
  `doc_subcatg_code` int(9) DEFAULT NULL,
  `doc_subcatg_name` varchar(50) DEFAULT NULL,
  `doc_catg_code` int(9) DEFAULT NULL,
  `doc_subcatg_desc` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doc_type_mast`
--

CREATE TABLE `doc_type_mast` (
  `doc_type_id` int(2) NOT NULL,
  `doc_catg_id` int(2) NOT NULL,
  `doc_type_name` varchar(30) DEFAULT NULL,
  `doc_catg_name` varchar(30) DEFAULT NULL,
  `short_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `element_mast`
--

CREATE TABLE `element_mast` (
  `element_code` varchar(2) DEFAULT NULL,
  `element_name` varchar(25) DEFAULT NULL,
  `element_type` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(5) NOT NULL,
  `faq_catg_id` int(5) NOT NULL,
  `faq_title` varchar(50) NOT NULL,
  `faq_date` date NOT NULL,
  `faq_desc` varchar(100) NOT NULL,
  `status` varchar(2) NOT NULL,
  `posted_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq_catg_mast`
--

CREATE TABLE `faq_catg_mast` (
  `faq_catg_id` int(5) NOT NULL,
  `faq_catg_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instrument_catg`
--

CREATE TABLE `instrument_catg` (
  `instrument_id` int(3) NOT NULL,
  `instrument_mode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invc_detl`
--

CREATE TABLE `invc_detl` (
  `Id` int(10) NOT NULL,
  `invc_numb` int(10) DEFAULT NULL,
  `invc_qty` int(3) NOT NULL,
  `invc_rate` int(9) NOT NULL,
  `invc_amt` int(9) NOT NULL,
  `invc_desc` varchar(100) NOT NULL,
  `disc` int(4) DEFAULT NULL,
  `gst` decimal(10,2) DEFAULT NULL,
  `paid_amt` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invc_mast`
--

CREATE TABLE `invc_mast` (
  `invc_numb` int(10) NOT NULL,
  `invc_date` date NOT NULL,
  `userid` int(10) NOT NULL,
  `custid` int(10) NOT NULL,
  `invc_amt` decimal(9,2) NOT NULL,
  `GST` decimal(4,2) DEFAULT NULL,
  `invc_disc` int(4) DEFAULT NULL,
  `invoice_status` char(1) DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jcatg_mast`
--

CREATE TABLE `jcatg_mast` (
  `jcatg_id` int(4) NOT NULL,
  `jcatg_description` varchar(150) DEFAULT NULL,
  `jcatg_id1` int(4) DEFAULT NULL,
  `jcatg_description1` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `journal_mast`
--

CREATE TABLE `journal_mast` (
  `journal_code` int(4) NOT NULL,
  `journal_name` varchar(25) DEFAULT NULL,
  `shrt_name` varchar(10) DEFAULT NULL,
  `pub_freq` varchar(20) DEFAULT NULL,
  `remark` varchar(150) DEFAULT NULL,
  `court_code` int(11) DEFAULT NULL,
  `court_name` varchar(100) DEFAULT NULL,
  `city_code` int(7) DEFAULT NULL,
  `state_code` int(8) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jsub_catg_mast`
--

CREATE TABLE `jsub_catg_mast` (
  `jsub_catg_id` int(8) NOT NULL,
  `jcatg_id` int(4) DEFAULT NULL,
  `jsub_catg_description` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgement_year_count`
--

CREATE TABLE `judgement_year_count` (
  `YR` int(4) NOT NULL,
  `judgement_count` int(10) NOT NULL,
  `court_type` varchar(50) NOT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_shrt_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `judge_court_count`
--

CREATE TABLE `judge_court_count` (
  `Id` int(11) NOT NULL,
  `court_code` int(10) NOT NULL,
  `court_name` varchar(100) NOT NULL,
  `judgement_type` varchar(50) NOT NULL,
  `judgement_type_name` varchar(50) NOT NULL,
  `judgement_count` int(10) NOT NULL,
  `court_type` varchar(50) NOT NULL,
  `judgement_count1` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judge_court_count_new`
--

CREATE TABLE `judge_court_count_new` (
  `id` int(5) NOT NULL,
  `court_code` int(10) DEFAULT NULL,
  `court_name` varchar(100) DEFAULT NULL,
  `judgement_type` varchar(50) DEFAULT NULL,
  `judgement_type_name` varchar(50) DEFAULT NULL,
  `judgement_count` int(10) DEFAULT NULL,
  `court_type` varchar(50) DEFAULT NULL,
  `judgement_count1` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_act`
--

CREATE TABLE `judgment_act` (
  `j_doc_id` varchar(40) DEFAULT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `judgment_title` varchar(255) DEFAULT NULL,
  `id` int(15) NOT NULL,
  `doc_id` varchar(40) DEFAULT NULL,
  `act_group_code` int(2) DEFAULT NULL,
  `act_group_desc` varchar(25) DEFAULT NULL,
  `act_catg_code` int(3) DEFAULT NULL,
  `act_catg_desc` varchar(100) DEFAULT NULL,
  `act_sub_catg_code` int(4) DEFAULT NULL,
  `act_sub_catg_desc` varchar(100) DEFAULT NULL,
  `act_title` varchar(255) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_shrt_name` varchar(10) DEFAULT NULL,
  `bareact_code` varchar(10) DEFAULT NULL,
  `bareact_desc` varchar(255) DEFAULT NULL,
  `court_code` int(11) DEFAULT NULL,
  `court_name` varchar(100) DEFAULT NULL,
  `court_shrt_name` varchar(20) DEFAULT NULL,
  `bench_code` int(7) DEFAULT NULL,
  `bench_name` varchar(100) DEFAULT NULL,
  `level` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_actcatg_count`
--

CREATE TABLE `judgment_actcatg_count` (
  `act_catg_code` int(4) DEFAULT NULL,
  `act_catg_desc` varchar(25) DEFAULT NULL,
  `act_catg_count` bigint(21) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `judgment_actcatg_count_view`
-- (See below for the actual view)
--
CREATE TABLE `judgment_actcatg_count_view` (
`act_catg_code` int(3)
,`act_catg_desc` varchar(100)
,`act_catg_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `judgment_actsubcatg_count`
--

CREATE TABLE `judgment_actsubcatg_count` (
  `act_catg_code` int(4) DEFAULT NULL,
  `act_catg_desc` varchar(25) DEFAULT NULL,
  `act_sub_catg_code` int(4) DEFAULT NULL,
  `act_sub_catg_desc` varchar(25) DEFAULT NULL,
  `act_subcatg_count` bigint(21) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `judgment_actsubcatg_count_view`
-- (See below for the actual view)
--
CREATE TABLE `judgment_actsubcatg_count_view` (
`act_catg_code` int(3)
,`act_catg_desc` varchar(100)
,`act_sub_catg_code` int(4)
,`act_sub_catg_desc` varchar(100)
,`act_subcatg_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `judgment_act_count`
--

CREATE TABLE `judgment_act_count` (
  `doc_id` varchar(40) NOT NULL,
  `act_count` bigint(21) NOT NULL DEFAULT 0,
  `judgment_code` int(9) DEFAULT NULL,
  `judgment_title` varchar(255) DEFAULT NULL,
  `court_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `judgment_act_count_view`
-- (See below for the actual view)
--
CREATE TABLE `judgment_act_count_view` (
`id` int(15)
,`judgment_code` int(9)
,`doc_id` varchar(40)
,`tot_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `judgment_act_missing_title`
--

CREATE TABLE `judgment_act_missing_title` (
  `j_doc_id` varchar(40) DEFAULT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `judgment_title` varchar(255) DEFAULT NULL,
  `id` varchar(20) DEFAULT NULL,
  `doc_id` varchar(40) DEFAULT NULL,
  `act_group_code` int(2) DEFAULT NULL,
  `act_group_desc` varchar(25) DEFAULT NULL,
  `act_catg_code` int(3) DEFAULT NULL,
  `act_catg_desc` varchar(100) DEFAULT NULL,
  `act_sub_catg_code` int(4) DEFAULT NULL,
  `act_sub_catg_desc` varchar(100) DEFAULT NULL,
  `act_title` varchar(255) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_shrt_name` varchar(10) DEFAULT NULL,
  `bareact_code` varchar(10) DEFAULT NULL,
  `bareact_desc` varchar(255) DEFAULT NULL,
  `court_code` int(11) DEFAULT NULL,
  `court_name` varchar(100) DEFAULT NULL,
  `court_shrt_name` varchar(20) DEFAULT NULL,
  `bench_code` int(7) DEFAULT NULL,
  `bench_name` varchar(100) DEFAULT NULL,
  `level` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_act_ref`
--

CREATE TABLE `judgment_act_ref` (
  `doc_id` varchar(40) DEFAULT NULL,
  `act_count` bigint(21) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_act_ref_by`
--

CREATE TABLE `judgment_act_ref_by` (
  `doc_id` varchar(40) DEFAULT NULL,
  `judgment_count` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `judgment_act_view`
-- (See below for the actual view)
--
CREATE TABLE `judgment_act_view` (
`j_doc_id` varchar(40)
,`judgment_code` int(9)
,`judgment_title` varchar(255)
,`id` int(15)
,`doc_id` varchar(40)
,`act_group_code` int(2)
,`act_group_desc` varchar(25)
,`act_catg_code` int(3)
,`act_catg_desc` varchar(100)
,`act_sub_catg_code` int(4)
,`act_sub_catg_desc` varchar(100)
,`act_title` varchar(255)
,`country_code` int(4)
,`country_shrt_name` varchar(10)
,`bareact_code` varchar(10)
,`bareact_desc` varchar(255)
,`court_code` int(11)
,`court_name` varchar(100)
,`court_shrt_name` varchar(20)
,`bench_code` int(7)
,`bench_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `judgment_advocate`
--

CREATE TABLE `judgment_advocate` (
  `id` int(20) NOT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `advocate_name` varchar(50) DEFAULT NULL,
  `advocate_flag` varchar(1) DEFAULT NULL,
  `doc_id` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `judgment_adv_view`
-- (See below for the actual view)
--
CREATE TABLE `judgment_adv_view` (
`tot_adv` bigint(21)
,`doc_id` varchar(40)
);

-- --------------------------------------------------------

--
-- Table structure for table `judgment_bench_type`
--

CREATE TABLE `judgment_bench_type` (
  `bench_type_id` int(3) NOT NULL,
  `bench_type_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_citation`
--

CREATE TABLE `judgment_citation` (
  `id` int(20) NOT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `doc_id` varchar(40) DEFAULT NULL,
  `journal_code` int(4) DEFAULT NULL,
  `journal_name` varchar(25) DEFAULT NULL,
  `shrt_name` varchar(10) DEFAULT NULL,
  `judgment_date` date DEFAULT NULL,
  `citation` varchar(20) DEFAULT NULL,
  `journal_year` varchar(6) DEFAULT NULL,
  `journal_volume` varchar(2) DEFAULT NULL,
  `journal_pno` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_cited_by`
--

CREATE TABLE `judgment_cited_by` (
  `id` int(20) NOT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `judgment_source_code` varchar(40) NOT NULL,
  `judgment_code_ref` int(9) DEFAULT NULL,
  `judgment_source_code_ref` varchar(40) NOT NULL,
  `judgment_title_ref` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_cited_count`
--

CREATE TABLE `judgment_cited_count` (
  `judgment_code` int(9) DEFAULT NULL,
  `doc_id` varchar(40) DEFAULT NULL,
  `cited_count` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `judgment_cited_count_view`
-- (See below for the actual view)
--
CREATE TABLE `judgment_cited_count_view` (
`judgment_code` int(9)
,`doc_id` varchar(40)
,`cited_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `judgment_cited_ref`
--

CREATE TABLE `judgment_cited_ref` (
  `judgment_code` int(9) NOT NULL,
  `doc_id` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `ref_count` int(4) DEFAULT NULL,
  `cited_count` int(4) DEFAULT NULL,
  `act_count` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_count`
--

CREATE TABLE `judgment_count` (
  `sc_judgment` int(8) DEFAULT NULL,
  `hc_judgment` int(8) DEFAULT NULL,
  `fc_judgment` int(8) DEFAULT NULL,
  `tr_judgment` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_data_point`
--

CREATE TABLE `judgment_data_point` (
  `judgment_code` int(9) DEFAULT NULL,
  `element_code` int(2) DEFAULT NULL,
  `element_name` varchar(25) NOT NULL,
  `data_point` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_disposition`
--

CREATE TABLE `judgment_disposition` (
  `disposition_id` int(3) NOT NULL DEFAULT 0,
  `disposition_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_disposition_count`
--

CREATE TABLE `judgment_disposition_count` (
  `id` int(3) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `judgment_count` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_element`
--

CREATE TABLE `judgment_element` (
  `id` int(5) NOT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `element_code` varchar(2) DEFAULT NULL,
  `element_name` varchar(25) DEFAULT NULL,
  `element_text` text DEFAULT NULL,
  `weight_perc` int(3) DEFAULT NULL,
  `element_word_length` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_element2`
--

CREATE TABLE `judgment_element2` (
  `judgment_code` int(9) NOT NULL,
  `element_code` varchar(2) NOT NULL,
  `element_text` text DEFAULT NULL,
  `weight_perc` int(3) NOT NULL,
  `element_word_length` int(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_ext_remark`
--

CREATE TABLE `judgment_ext_remark` (
  `judgment_code` int(9) NOT NULL,
  `judgment_remark` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_judge`
--

CREATE TABLE `judgment_judge` (
  `id` int(20) NOT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `judge_name` varchar(50) DEFAULT NULL,
  `doc_id` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_jurisdiction`
--

CREATE TABLE `judgment_jurisdiction` (
  `judgment_jurisdiction_id` int(3) NOT NULL DEFAULT 0,
  `judgment_jurisdiction_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_mast`
--

CREATE TABLE `judgment_mast` (
  `judgment_code` int(9) NOT NULL,
  `court_code` int(7) DEFAULT NULL,
  `court_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `appeal_numb` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `judgment_date` date DEFAULT NULL,
  `jyear` year(4) DEFAULT NULL,
  `judgment_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `appellant_name` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `appellant_adv` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `appellant_adv_count` int(3) DEFAULT NULL,
  `respondant_name` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `respondant_adv` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `respondant_adv_count` int(3) DEFAULT NULL,
  `appeal_status` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `disposition_id` int(3) DEFAULT NULL,
  `disposition_text` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `bench_type_id` int(3) DEFAULT NULL,
  `bench_type_text` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `judgment_jurisdiction_id` int(3) DEFAULT NULL,
  `judgmnent_jurisdiction_text` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `citation` varchar(2000) CHARACTER SET latin1 DEFAULT NULL,
  `citation_count` int(3) DEFAULT NULL,
  `judges_name` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `judges_count` int(3) DEFAULT NULL,
  `hearing_date` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `hearing_place` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `judgment_abstract` longtext CHARACTER SET latin1 DEFAULT NULL,
  `judgment_text` longtext CHARACTER SET latin1 DEFAULT NULL,
  `judgment_text1` longtext DEFAULT 'NULL',
  `doc_id` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `judgment_type` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `judgment_source_name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `jcatg_id` int(4) DEFAULT NULL,
  `jcatg_description` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `jsub_catg_id` int(8) DEFAULT NULL,
  `jsub_catg_description` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `overrule_judgment` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `overruled_by_judgment` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `judgment_ext_remark_flag` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `jcount` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `uid` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `bench_code` int(7) DEFAULT NULL,
  `ref_count` int(4) DEFAULT NULL,
  `cited_count` int(4) DEFAULT NULL,
  `act_count` int(4) DEFAULT NULL,
  `country_shrt_name` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `bench_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `college_code` varchar(4) DEFAULT NULL,
  `datapoint_remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_overruledby`
--

CREATE TABLE `judgment_overruledby` (
  `id` int(11) NOT NULL,
  `judgment_code` int(9) NOT NULL,
  `over_ruledby_code` int(9) NOT NULL,
  `over_ruledby_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_overrules`
--

CREATE TABLE `judgment_overrules` (
  `id` int(11) NOT NULL,
  `judgment_code` int(9) NOT NULL,
  `over_rules_code` int(9) NOT NULL,
  `over_rules_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_parties`
--

CREATE TABLE `judgment_parties` (
  `judgment_party_id` int(10) NOT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `party_name` varchar(50) DEFAULT NULL,
  `party_flag` varchar(1) DEFAULT NULL,
  `doc_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_ref`
--

CREATE TABLE `judgment_ref` (
  `id` int(15) NOT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `doc_id` varchar(40) DEFAULT NULL,
  `judgment_title` varchar(255) DEFAULT NULL,
  `judgment_code_ref` int(9) DEFAULT NULL,
  `court_code` int(11) DEFAULT NULL,
  `court_name` varchar(100) DEFAULT NULL,
  `doc_id_ref` varchar(40) DEFAULT NULL,
  `judgment_title_ref` varchar(255) DEFAULT NULL,
  `court_code_ref` int(11) DEFAULT NULL,
  `court_name_ref` varchar(100) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_ref_by_count`
--

CREATE TABLE `judgment_ref_by_count` (
  `judgment_code` int(9) NOT NULL DEFAULT 0,
  `doc_id_ref` varchar(40) DEFAULT NULL,
  `ref_count` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `judgment_ref_by_count_view`
-- (See below for the actual view)
--
CREATE TABLE `judgment_ref_by_count_view` (
`judgment_code` int(9)
,`doc_id_ref` varchar(40)
,`ref_by_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `judgment_ref_by_view`
-- (See below for the actual view)
--
CREATE TABLE `judgment_ref_by_view` (
`judgment_code` int(9)
,`doc_id_ref` varchar(40)
,`judgment_title` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `judgment_ref_count`
--

CREATE TABLE `judgment_ref_count` (
  `doc_id` varchar(40) NOT NULL,
  `ref_count` bigint(21) NOT NULL DEFAULT 0,
  `judgment_code` int(9) DEFAULT NULL,
  `judgment_title` varchar(255) DEFAULT NULL,
  `court_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_ref_count_by`
--

CREATE TABLE `judgment_ref_count_by` (
  `judgment_code` int(9) NOT NULL DEFAULT 0,
  `doc_id_ref` varchar(40) DEFAULT NULL,
  `ref_by_count` bigint(21) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `judgment_ref_count_view`
-- (See below for the actual view)
--
CREATE TABLE `judgment_ref_count_view` (
`doc_id` varchar(40)
,`ref_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `judgment_search_summary`
--

CREATE TABLE `judgment_search_summary` (
  `judgment_code` int(9) DEFAULT NULL,
  `court_name` varchar(100) DEFAULT NULL,
  `appeal_numb` varchar(250) DEFAULT NULL,
  `judgment_date` date DEFAULT NULL,
  `judgment_title` varchar(255) DEFAULT NULL,
  `appellant_name` varchar(500) DEFAULT NULL,
  `respondant_name` varchar(500) DEFAULT NULL,
  `doc_id` varchar(40) DEFAULT NULL,
  `ref_count` int(4) DEFAULT NULL,
  `cited_count` int(4) DEFAULT NULL,
  `act_count` int(4) DEFAULT NULL,
  `court_code` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_title`
--

CREATE TABLE `judgment_title` (
  `doc_id` varchar(40) DEFAULT NULL,
  `judgment_code` int(9) NOT NULL,
  `judgment_title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `court_code` int(11) DEFAULT NULL,
  `court_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `missing_judgments`
--

CREATE TABLE `missing_judgments` (
  `SRNO` int(15) NOT NULL DEFAULT 0,
  `doc_id` varchar(40) DEFAULT NULL,
  `doc_id_ref` varchar(40) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `court_code` int(11) DEFAULT NULL,
  `court_code_ref` int(11) DEFAULT NULL,
  `judgment_title_ref` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(7) NOT NULL,
  `catg_id` int(3) NOT NULL,
  `news_title` varchar(100) NOT NULL,
  `news_date` date NOT NULL,
  `news_desc` longtext NOT NULL,
  `status` varchar(1) NOT NULL,
  `posted_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news_catg`
--

CREATE TABLE `news_catg` (
  `catg_id` int(3) NOT NULL,
  `catg_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `depth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan_master`
--

CREATE TABLE `plan_master` (
  `plan` varchar(50) NOT NULL,
  `plan_type` char(1) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(250) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan_master_new`
--

CREATE TABLE `plan_master_new` (
  `plan_code` int(5) NOT NULL DEFAULT 0,
  `court_code` int(11) DEFAULT NULL,
  `court_name` varchar(100) NOT NULL,
  `plan_type` char(1) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pooja`
--

CREATE TABLE `pooja` (
  `judgment_code` int(9) NOT NULL DEFAULT 0,
  `court_code` int(7) DEFAULT NULL,
  `court_name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `appeal_numb` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `judgment_date` date DEFAULT NULL,
  `jyear` year(4) DEFAULT NULL,
  `judgment_title` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `appellant_name` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `appellant_adv` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `appellant_adv_count` int(3) DEFAULT NULL,
  `respondant_name` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `respondant_adv` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `respondant_adv_count` int(3) DEFAULT NULL,
  `appeal_status` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `disposition_id` int(3) DEFAULT NULL,
  `disposition_text` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `bench_type_id` int(3) DEFAULT NULL,
  `bench_type_text` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `judgment_jurisdiction_id` int(3) DEFAULT NULL,
  `judgmnent_jurisdiction_text` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `citation` varchar(2000) CHARACTER SET utf8mb4 DEFAULT NULL,
  `citation_count` int(3) DEFAULT NULL,
  `judges_name` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `judges_count` int(3) DEFAULT NULL,
  `hearing_date` varchar(150) CHARACTER SET utf8mb4 DEFAULT NULL,
  `hearing_place` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `judgment_abstract` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `judgment_text` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `doc_id` varchar(40) CHARACTER SET utf8mb4 DEFAULT NULL,
  `judgment_type` varchar(1) CHARACTER SET utf8mb4 DEFAULT NULL,
  `judgment_source_name` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `jcatg_id` int(4) DEFAULT NULL,
  `jcatg_description` varchar(150) CHARACTER SET utf8mb4 DEFAULT NULL,
  `jsub_catg_id` int(8) DEFAULT NULL,
  `jsub_catg_description` varchar(150) CHARACTER SET utf8mb4 DEFAULT NULL,
  `overrule_judgment` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `overruled_by_judgment` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `judgment_ext_remark_flag` varchar(1) CHARACTER SET utf8mb4 DEFAULT NULL,
  `jcount` varchar(25) CHARACTER SET utf8mb4 DEFAULT NULL,
  `uid` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) CHARACTER SET utf8mb4 DEFAULT NULL,
  `bench_code` int(7) DEFAULT NULL,
  `ref_count` int(4) DEFAULT NULL,
  `cited_count` int(4) DEFAULT NULL,
  `act_count` int(4) DEFAULT NULL,
  `country_shrt_name` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `bench_name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `payment_date` date NOT NULL,
  `instrument_no` varchar(50) NOT NULL,
  `instrument_mode` varchar(50) NOT NULL,
  `instrument_date` date NOT NULL,
  `paid_amt` decimal(10,2) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `userid` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `state_mast`
--

CREATE TABLE `state_mast` (
  `state_code` int(8) NOT NULL,
  `state_name` varchar(25) DEFAULT NULL,
  `shrt_name` varchar(10) DEFAULT NULL,
  `zone` varchar(3) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) DEFAULT NULL,
  `country_shrt_name` varchar(10) DEFAULT NULL,
  `cr_date` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `userid` int(9) DEFAULT NULL,
  `student_name` varchar(50) DEFAULT NULL,
  `college_code` varchar(4) DEFAULT NULL,
  `college_name` varchar(50) DEFAULT NULL,
  `course_code` varchar(8) DEFAULT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `course_fees` int(5) DEFAULT NULL,
  `course_status` varchar(20) DEFAULT NULL,
  `enrol_no` varchar(11) DEFAULT NULL,
  `regs_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `city_code` varchar(4) DEFAULT NULL,
  `state_code` varchar(4) DEFAULT NULL,
  `country_code` int(3) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `qual_desc` varchar(100) DEFAULT NULL,
  `photo_url` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_catg_mast`
--

CREATE TABLE `syllabus_catg_mast` (
  `syllabus_catg_code` varchar(3) DEFAULT NULL,
  `syllabus_catg_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_detail`
--

CREATE TABLE `syllabus_detail` (
  `course_code` varchar(8) DEFAULT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `syllabus_catg_code` varchar(3) DEFAULT NULL,
  `syllabus_catg_name` varchar(50) DEFAULT NULL,
  `tot_count` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `col1` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tribunals`
--

CREATE TABLE `tribunals` (
  `judgment_code` int(11) NOT NULL,
  `court_code` int(7) DEFAULT NULL,
  `court_name` varchar(100) DEFAULT NULL,
  `appeal_numb` varchar(250) DEFAULT NULL,
  `judgment_date` date DEFAULT NULL,
  `jyear` year(4) DEFAULT NULL,
  `judgment_title` varchar(255) DEFAULT NULL,
  `appellant_name` varchar(500) DEFAULT NULL,
  `appellant_adv` varchar(500) DEFAULT NULL,
  `appellant_adv_count` int(3) DEFAULT NULL,
  `respondant_name` varchar(500) DEFAULT NULL,
  `respondant_adv` varchar(500) DEFAULT NULL,
  `respondant_adv_count` int(3) DEFAULT NULL,
  `appeal_status` varchar(10) DEFAULT NULL,
  `disposition_id` int(3) DEFAULT NULL,
  `disposition_text` varchar(255) DEFAULT NULL,
  `bench_type_id` int(3) DEFAULT NULL,
  `bench_type_text` varchar(255) DEFAULT NULL,
  `judgment_jurisdiction_id` int(3) DEFAULT NULL,
  `judgmnent_jurisdiction_text` varchar(255) DEFAULT NULL,
  `citation` varchar(2000) DEFAULT NULL,
  `citation_count` int(3) DEFAULT NULL,
  `judges_name` varchar(500) DEFAULT NULL,
  `judges_count` int(3) DEFAULT NULL,
  `hearing_date` varchar(150) DEFAULT NULL,
  `hearing_place` varchar(10) DEFAULT NULL,
  `judgment_abstract` longtext DEFAULT NULL,
  `judgment_text` longtext DEFAULT NULL,
  `doc_id` varchar(40) DEFAULT NULL,
  `judgment_type` varchar(1) DEFAULT NULL,
  `judgment_source_name` varchar(50) DEFAULT NULL,
  `jcatg_id` int(4) DEFAULT NULL,
  `jcatg_description` varchar(150) DEFAULT NULL,
  `jsub_catg_id` int(8) DEFAULT NULL,
  `jsub_catg_description` varchar(150) DEFAULT NULL,
  `overrule_judgment` varchar(20) DEFAULT NULL,
  `overruled_by_judgment` varchar(20) DEFAULT NULL,
  `judgment_ext_remark_flag` varchar(1) DEFAULT NULL,
  `jcount` varchar(25) DEFAULT NULL,
  `uid` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) DEFAULT NULL,
  `bench_code` int(7) DEFAULT NULL,
  `ref_count` int(4) DEFAULT NULL,
  `cited_count` int(4) DEFAULT NULL,
  `act_count` int(4) DEFAULT NULL,
  `country_shrt_name` varchar(10) DEFAULT NULL,
  `bench_name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uscourt_ref`
--

CREATE TABLE `uscourt_ref` (
  `SRNO` int(15) NOT NULL,
  `CASE_KEY` varchar(255) NOT NULL,
  `REFRENCE` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(9) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `conc_login` text DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_login_info`
--

CREATE TABLE `user_login_info` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `ip` varchar(100) CHARACTER SET latin1 NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_log_mast`
--

CREATE TABLE `user_log_mast` (
  `id` int(12) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `login_date` date DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_log_time`
--

CREATE TABLE `user_log_time` (
  `id` int(12) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `login_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_mast`
--

CREATE TABLE `user_mast` (
  `id` int(9) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `pan_no` varchar(25) DEFAULT NULL,
  `gst_no` varchar(25) DEFAULT NULL,
  `activation_date` date DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `user_type` varchar(25) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `profession` varchar(50) DEFAULT NULL,
  `no_of_laywers` varchar(25) DEFAULT NULL,
  `practise_area` text DEFAULT NULL,
  `user_ip` varchar(25) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `user_pic` varchar(255) DEFAULT NULL,
  `sign_date` datetime DEFAULT NULL,
  `bar_reg_no` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile_1` varchar(12) DEFAULT NULL,
  `mobile_2` varchar(12) DEFAULT NULL,
  `landline_1` varchar(16) DEFAULT NULL,
  `landline_2` varchar(16) DEFAULT NULL,
  `fax` varchar(16) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alt_email` varchar(255) DEFAULT NULL,
  `grad_yr` year(4) DEFAULT NULL,
  `practice_since` year(4) DEFAULT NULL,
  `city_code` int(7) DEFAULT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `state_code` int(6) DEFAULT NULL,
  `state_name` varchar(25) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `pin_code` int(6) DEFAULT NULL,
  `status` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_plan`
--

CREATE TABLE `user_plan` (
  `id` int(11) NOT NULL,
  `plan` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `tenure` int(2) NOT NULL,
  `plan_description` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `corporate_ip` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_plan_new`
--

CREATE TABLE `user_plan_new` (
  `court_code` int(11) DEFAULT NULL,
  `court_name` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `tenure` int(2) DEFAULT NULL,
  `payment_amount` varchar(10) DEFAULT NULL,
  `apply_date` date DEFAULT NULL,
  `expiry_date` date NOT NULL,
  `corporate_ip` varchar(25) DEFAULT NULL,
  `activattion_date` date DEFAULT NULL,
  `search_limit` int(4) DEFAULT NULL,
  `access_limit` varchar(4) DEFAULT NULL,
  `account_status` varchar(10) DEFAULT NULL,
  `concurrent_connection` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_subscription`
--

CREATE TABLE `user_subscription` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `plan_id` int(3) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `sub_date` date NOT NULL,
  `pay_date` date DEFAULT NULL,
  `pay_mode` varchar(100) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `payment_amount` varchar(10) DEFAULT NULL,
  `base_price` varchar(10) NOT NULL,
  `activattion_date` date DEFAULT NULL,
  `renew_date` date DEFAULT NULL,
  `search_limit` int(4) NOT NULL,
  `access_limit` varchar(4) NOT NULL,
  `static_ip` varchar(3) NOT NULL,
  `allowed_ip` varchar(100) NOT NULL,
  `account_status` varchar(10) NOT NULL,
  `concurrent_connection` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ussc_marker`
--

CREATE TABLE `ussc_marker` (
  `id` int(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_domain` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'vivvo@localhost',
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `slider_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `swf_file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` date NOT NULL,
  `last_edited` datetime NOT NULL,
  `body` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_read` datetime DEFAULT NULL,
  `times_read` int(6) DEFAULT 0,
  `today_read` int(6) DEFAULT 0,
  `status` int(3) NOT NULL DEFAULT 0,
  `sefriendly` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sef_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `abstract_alt` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `source_url` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `case_no` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `app_adv` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `acts_ref` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tp_citation` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `case_referred` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_num` int(6) DEFAULT NULL,
  `show_poll` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0',
  `show_comment` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0',
  `rss_feed` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0',
  `show_author` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '1',
  `show_abstract_image` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `media_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `media_type` enum('0','1','2','3','4') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '4',
  `keywords` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailed` int(11) DEFAULT 0,
  `vote_num` int(11) DEFAULT 0,
  `vote_sum` int(11) DEFAULT 0,
  `abstract` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_caption` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_attachment_webm` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_submition` tinyint(4) DEFAULT 0,
  `MARKER81` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_doj1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_doj2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_doj3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_doj4` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_doj5` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_doj6` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_doh` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_poh` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_poj` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_assessyr` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_app2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_app3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_app4` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_app5` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_resp2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_resp3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_resp4` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_resp5` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_counsels` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_counselsa` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_counselsr` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_amicus` text CHARACTER SET utf8 DEFAULT NULL,
  `courtdata_subcat` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_ind1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_ind2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_cor` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_ovrby` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_authref` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_rdiciden` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_held` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_relsec` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_file` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_phist` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_scstatus` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_citref` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_disp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_rep` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `courtdata_jurisdiction` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `courtdata_prayer` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `courtdata_appendix` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `courtdata_sub1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_sub2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_canli1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_canli2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_canli3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_canli4` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_canli5` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `courtdata_docket` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `junk` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `junk1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `court_mast_court`
--
DROP TABLE IF EXISTS `court_mast_court`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `court_mast_court`  AS  select `test`.`judgment_title`.`court_code` AS `court_code`,`test`.`judgment_title`.`court_name` AS `court_name`,count(0) AS `tot_judg` from `test`.`judgment_title` group by `test`.`judgment_title`.`court_code` ;

-- --------------------------------------------------------

--
-- Structure for view `judgment_actcatg_count_view`
--
DROP TABLE IF EXISTS `judgment_actcatg_count_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judgment_actcatg_count_view`  AS  select `test`.`judgment_act`.`act_catg_code` AS `act_catg_code`,`test`.`judgment_act`.`act_catg_desc` AS `act_catg_desc`,count(0) AS `act_catg_count` from `test`.`judgment_act` group by `test`.`judgment_act`.`act_catg_code`,`test`.`judgment_act`.`act_catg_desc` ;

-- --------------------------------------------------------

--
-- Structure for view `judgment_actsubcatg_count_view`
--
DROP TABLE IF EXISTS `judgment_actsubcatg_count_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judgment_actsubcatg_count_view`  AS  select `test`.`judgment_act`.`act_catg_code` AS `act_catg_code`,`test`.`judgment_act`.`act_catg_desc` AS `act_catg_desc`,`test`.`judgment_act`.`act_sub_catg_code` AS `act_sub_catg_code`,`test`.`judgment_act`.`act_sub_catg_desc` AS `act_sub_catg_desc`,count(0) AS `act_subcatg_count` from `test`.`judgment_act` group by `test`.`judgment_act`.`act_catg_code`,`test`.`judgment_act`.`act_catg_desc`,`test`.`judgment_act`.`act_sub_catg_code`,`test`.`judgment_act`.`act_sub_catg_desc` ;

-- --------------------------------------------------------

--
-- Structure for view `judgment_act_count_view`
--
DROP TABLE IF EXISTS `judgment_act_count_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judgment_act_count_view`  AS  select `test`.`judgment_act`.`id` AS `id`,`test`.`judgment_act`.`judgment_code` AS `judgment_code`,`test`.`judgment_act`.`doc_id` AS `doc_id`,count(0) AS `tot_count` from `test`.`judgment_act` group by `test`.`judgment_act`.`id`,`test`.`judgment_act`.`judgment_code`,`test`.`judgment_act`.`doc_id` ;

-- --------------------------------------------------------

--
-- Structure for view `judgment_act_view`
--
DROP TABLE IF EXISTS `judgment_act_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judgment_act_view`  AS  select `a`.`j_doc_id` AS `j_doc_id`,`a`.`judgment_code` AS `judgment_code`,`b`.`judgment_title` AS `judgment_title`,`a`.`id` AS `id`,`a`.`doc_id` AS `doc_id`,`a`.`act_group_code` AS `act_group_code`,`a`.`act_group_desc` AS `act_group_desc`,`a`.`act_catg_code` AS `act_catg_code`,`a`.`act_catg_desc` AS `act_catg_desc`,`a`.`act_sub_catg_code` AS `act_sub_catg_code`,`a`.`act_sub_catg_desc` AS `act_sub_catg_desc`,`a`.`act_title` AS `act_title`,`a`.`country_code` AS `country_code`,`a`.`country_shrt_name` AS `country_shrt_name`,`a`.`bareact_code` AS `bareact_code`,`a`.`bareact_desc` AS `bareact_desc`,`b`.`court_code` AS `court_code`,`a`.`court_name` AS `court_name`,`a`.`court_shrt_name` AS `court_shrt_name`,`a`.`bench_code` AS `bench_code`,`a`.`bench_name` AS `bench_name` from (`test`.`judgment_act` `a` left join `test`.`judgment_title` `b` on(`a`.`j_doc_id` = convert(`b`.`doc_id` using utf8mb4))) ;

-- --------------------------------------------------------

--
-- Structure for view `judgment_adv_view`
--
DROP TABLE IF EXISTS `judgment_adv_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judgment_adv_view`  AS  (select count(0) AS `tot_adv`,`b`.`doc_id` AS `doc_id` from (`judgment_mast` `a` join `judgment_advocate` `b`) where `a`.`doc_id` = `b`.`doc_id` group by `b`.`doc_id`) ;

-- --------------------------------------------------------

--
-- Structure for view `judgment_cited_count_view`
--
DROP TABLE IF EXISTS `judgment_cited_count_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judgment_cited_count_view`  AS  select `test`.`judgment_ref`.`judgment_code_ref` AS `judgment_code`,`test`.`judgment_ref`.`doc_id_ref` AS `doc_id`,count(0) AS `cited_count` from `test`.`judgment_ref` group by `test`.`judgment_ref`.`judgment_code_ref`,`test`.`judgment_ref`.`doc_id_ref` ;

-- --------------------------------------------------------

--
-- Structure for view `judgment_ref_by_count_view`
--
DROP TABLE IF EXISTS `judgment_ref_by_count_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judgment_ref_by_count_view`  AS  select `b`.`judgment_code` AS `judgment_code`,`a`.`doc_id_ref` AS `doc_id_ref`,count(0) AS `ref_by_count` from (`test`.`judgment_ref` `a` join `test`.`judgment_mast` `b`) where `a`.`doc_id_ref` = convert(`b`.`doc_id` using utf8mb4) group by `b`.`judgment_code`,`a`.`doc_id_ref` ;

-- --------------------------------------------------------

--
-- Structure for view `judgment_ref_by_view`
--
DROP TABLE IF EXISTS `judgment_ref_by_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judgment_ref_by_view`  AS  select `b`.`judgment_code` AS `judgment_code`,`a`.`doc_id_ref` AS `doc_id_ref`,`b`.`judgment_title` AS `judgment_title` from (`test`.`judgment_ref` `a` join `test`.`judgment_mast` `b`) where `a`.`doc_id_ref` = convert(`b`.`doc_id` using utf8mb4) ;

-- --------------------------------------------------------

--
-- Structure for view `judgment_ref_count_view`
--
DROP TABLE IF EXISTS `judgment_ref_count_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judgment_ref_count_view`  AS  select `test`.`judgment_ref`.`doc_id` AS `doc_id`,count(0) AS `ref_count` from `test`.`judgment_ref` group by `test`.`judgment_ref`.`doc_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `bareacts`
--
ALTER TABLE `bareacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bareact_catg_mast`
--
ALTER TABLE `bareact_catg_mast`
  ADD PRIMARY KEY (`act_catg_code`);

--
-- Indexes for table `bareact_detl`
--
ALTER TABLE `bareact_detl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doc_id` (`doc_id`),
  ADD KEY `bact_detl` (`doc_id`),
  ADD KEY `bareactdetl_bact` (`bareact_code`),
  ADD KEY `ind_bareact_detl_doc_id_ref` (`doc_id`),
  ADD KEY `ba_code_bareact_detl` (`bareact_code`),
  ADD KEY `bareact_detl_bareact_code` (`bareact_code`);

--
-- Indexes for table `bareact_mast`
--
ALTER TABLE `bareact_mast`
  ADD PRIMARY KEY (`bareact_code`),
  ADD KEY `bact_bact` (`bareact_code`),
  ADD KEY `bact_bact1` (`bareact_code`);

--
-- Indexes for table `browsing_log`
--
ALTER TABLE `browsing_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_mast`
--
ALTER TABLE `city_mast`
  ADD PRIMARY KEY (`city_code`),
  ADD KEY `citymast_statecode_fk` (`state_code`),
  ADD KEY `citymast_countrycode_fk` (`country_code`);

--
-- Indexes for table `country_mast`
--
ALTER TABLE `country_mast`
  ADD PRIMARY KEY (`country_code`),
  ADD UNIQUE KEY `country_name_un` (`country_name`);

--
-- Indexes for table `coupon_code`
--
ALTER TABLE `coupon_code`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `course_mast`
--
ALTER TABLE `course_mast`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `court_mast`
--
ALTER TABLE `court_mast`
  ADD PRIMARY KEY (`bench_code`),
  ADD KEY `courtmast_citycode_fk` (`city_code`),
  ADD KEY `courtmast_statecode_fk` (`state_code`),
  ADD KEY `courtmast_countrycode_fk` (`country_code`);

--
-- Indexes for table `court_type_mast`
--
ALTER TABLE `court_type_mast`
  ADD UNIQUE KEY `court_type` (`court_type`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `faq_catg_mast`
--
ALTER TABLE `faq_catg_mast`
  ADD PRIMARY KEY (`faq_catg_id`);

--
-- Indexes for table `instrument_catg`
--
ALTER TABLE `instrument_catg`
  ADD PRIMARY KEY (`instrument_id`);

--
-- Indexes for table `invc_detl`
--
ALTER TABLE `invc_detl`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `invc_mast`
--
ALTER TABLE `invc_mast`
  ADD PRIMARY KEY (`invc_numb`);

--
-- Indexes for table `jcatg_mast`
--
ALTER TABLE `jcatg_mast`
  ADD PRIMARY KEY (`jcatg_id`);

--
-- Indexes for table `journal_mast`
--
ALTER TABLE `journal_mast`
  ADD PRIMARY KEY (`journal_code`);

--
-- Indexes for table `jsub_catg_mast`
--
ALTER TABLE `jsub_catg_mast`
  ADD PRIMARY KEY (`jsub_catg_id`),
  ADD KEY `jsubcatgsubmast_jcatgid_fk` (`jcatg_id`);

--
-- Indexes for table `judge_court_count`
--
ALTER TABLE `judge_court_count`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `judge_court_count_new`
--
ALTER TABLE `judge_court_count_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judgment_act`
--
ALTER TABLE `judgment_act`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_jdocid` (`j_doc_id`),
  ADD KEY `judg_act_doc_id_ref` (`doc_id`),
  ADD KEY `judg_act_j_doc_id_ref` (`j_doc_id`),
  ADD KEY `judg_act_bareact_code` (`bareact_code`);

--
-- Indexes for table `judgment_act_count`
--
ALTER TABLE `judgment_act_count`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `judgment_advocate`
--
ALTER TABLE `judgment_advocate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judgmentadvocate_judgmentcode_fk` (`judgment_code`);

--
-- Indexes for table `judgment_bench_type`
--
ALTER TABLE `judgment_bench_type`
  ADD PRIMARY KEY (`bench_type_id`);

--
-- Indexes for table `judgment_citation`
--
ALTER TABLE `judgment_citation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judgmentcitation_judgmentcode_fk` (`judgment_code`),
  ADD KEY `judgmentjournalcode_journalcode_fk` (`journal_code`);

--
-- Indexes for table `judgment_cited_by`
--
ALTER TABLE `judgment_cited_by`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judgment_code` (`judgment_code`);

--
-- Indexes for table `judgment_disposition`
--
ALTER TABLE `judgment_disposition`
  ADD PRIMARY KEY (`disposition_id`);

--
-- Indexes for table `judgment_element`
--
ALTER TABLE `judgment_element`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judgment_element2`
--
ALTER TABLE `judgment_element2`
  ADD PRIMARY KEY (`judgment_code`,`element_code`);

--
-- Indexes for table `judgment_ext_remark`
--
ALTER TABLE `judgment_ext_remark`
  ADD PRIMARY KEY (`judgment_code`);

--
-- Indexes for table `judgment_judge`
--
ALTER TABLE `judgment_judge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judgmentjudge_judgmentcode_fk` (`judgment_code`);

--
-- Indexes for table `judgment_jurisdiction`
--
ALTER TABLE `judgment_jurisdiction`
  ADD PRIMARY KEY (`judgment_jurisdiction_id`);

--
-- Indexes for table `judgment_mast`
--
ALTER TABLE `judgment_mast`
  ADD PRIMARY KEY (`judgment_code`),
  ADD KEY `judgment_mast_doc_id` (`doc_id`);

--
-- Indexes for table `judgment_overruledby`
--
ALTER TABLE `judgment_overruledby`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judgment_code` (`judgment_code`);

--
-- Indexes for table `judgment_overrules`
--
ALTER TABLE `judgment_overrules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judgment_code` (`judgment_code`);

--
-- Indexes for table `judgment_parties`
--
ALTER TABLE `judgment_parties`
  ADD PRIMARY KEY (`judgment_party_id`),
  ADD KEY `judgmentparties_judgmentcode_fk` (`judgment_code`);

--
-- Indexes for table `judgment_ref`
--
ALTER TABLE `judgment_ref`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judg_ref_doc_id` (`doc_id`),
  ADD KEY `judg_ref_doc_id_ref` (`doc_id_ref`);

--
-- Indexes for table `judgment_ref_count`
--
ALTER TABLE `judgment_ref_count`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `judgment_search_summary`
--
ALTER TABLE `judgment_search_summary`
  ADD UNIQUE KEY `doc_id` (`doc_id`);

--
-- Indexes for table `judgment_title`
--
ALTER TABLE `judgment_title`
  ADD PRIMARY KEY (`judgment_code`),
  ADD UNIQUE KEY `doc_id` (`doc_id`),
  ADD KEY `ind_docid` (`doc_id`),
  ADD KEY `jtitle_ind` (`doc_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_newscatg_catgid` (`catg_id`);

--
-- Indexes for table `news_catg`
--
ALTER TABLE `news_catg`
  ADD PRIMARY KEY (`catg_id`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `plan_master`
--
ALTER TABLE `plan_master`
  ADD PRIMARY KEY (`plan`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_mast`
--
ALTER TABLE `state_mast`
  ADD PRIMARY KEY (`state_code`),
  ADD KEY `country_code_fk` (`country_code`);

--
-- Indexes for table `tribunals`
--
ALTER TABLE `tribunals`
  ADD PRIMARY KEY (`judgment_code`);

--
-- Indexes for table `uscourt_ref`
--
ALTER TABLE `uscourt_ref`
  ADD PRIMARY KEY (`SRNO`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_login_info`
--
ALTER TABLE `user_login_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_mast`
--
ALTER TABLE `user_mast`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_code` (`city_code`),
  ADD KEY `country_code` (`country_code`),
  ADD KEY `state_code` (`state_code`);

--
-- Indexes for table `user_subscription`
--
ALTER TABLE `user_subscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `ussc_marker`
--
ALTER TABLE `ussc_marker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bareacts`
--
ALTER TABLE `bareacts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `browsing_log`
--
ALTER TABLE `browsing_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city_mast`
--
ALTER TABLE `city_mast`
  MODIFY `city_code` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country_mast`
--
ALTER TABLE `country_mast`
  MODIFY `country_code` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_code`
--
ALTER TABLE `coupon_code`
  MODIFY `coupon_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `court_mast`
--
ALTER TABLE `court_mast`
  MODIFY `bench_code` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_catg_mast`
--
ALTER TABLE `faq_catg_mast`
  MODIFY `faq_catg_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instrument_catg`
--
ALTER TABLE `instrument_catg`
  MODIFY `instrument_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jcatg_mast`
--
ALTER TABLE `jcatg_mast`
  MODIFY `jcatg_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journal_mast`
--
ALTER TABLE `journal_mast`
  MODIFY `journal_code` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jsub_catg_mast`
--
ALTER TABLE `jsub_catg_mast`
  MODIFY `jsub_catg_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judge_court_count`
--
ALTER TABLE `judge_court_count`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judge_court_count_new`
--
ALTER TABLE `judge_court_count_new`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judgment_act`
--
ALTER TABLE `judgment_act`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judgment_advocate`
--
ALTER TABLE `judgment_advocate`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judgment_bench_type`
--
ALTER TABLE `judgment_bench_type`
  MODIFY `bench_type_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judgment_citation`
--
ALTER TABLE `judgment_citation`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judgment_cited_by`
--
ALTER TABLE `judgment_cited_by`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judgment_element`
--
ALTER TABLE `judgment_element`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judgment_judge`
--
ALTER TABLE `judgment_judge`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judgment_overruledby`
--
ALTER TABLE `judgment_overruledby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judgment_overrules`
--
ALTER TABLE `judgment_overrules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judgment_parties`
--
ALTER TABLE `judgment_parties`
  MODIFY `judgment_party_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_catg`
--
ALTER TABLE `news_catg`
  MODIFY `catg_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state_mast`
--
ALTER TABLE `state_mast`
  MODIFY `state_code` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tribunals`
--
ALTER TABLE `tribunals`
  MODIFY `judgment_code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uscourt_ref`
--
ALTER TABLE `uscourt_ref`
  MODIFY `SRNO` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login_info`
--
ALTER TABLE `user_login_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_subscription`
--
ALTER TABLE `user_subscription`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ussc_marker`
--
ALTER TABLE `ussc_marker`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_newscatg_catgid` FOREIGN KEY (`catg_id`) REFERENCES `news_catg` (`catg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `parcel`
--
ALTER TABLE `parcel`
  ADD CONSTRAINT `parcel_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
