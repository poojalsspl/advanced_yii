-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2020 at 10:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawhub_reserach`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `full_name` varchar(128) DEFAULT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(32) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `postal_code` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(4) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `art_catg_id` int(2) DEFAULT NULL,
  `art_catg_name` varchar(25) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `u_id` int(9) NOT NULL COMMENT 'admin id',
  `allocation_date` date DEFAULT NULL,
  `target_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `article_catg_mast`
--

CREATE TABLE `article_catg_mast` (
  `art_catg_id` int(2) DEFAULT NULL,
  `art_catg_name` varchar(25) DEFAULT NULL,
  `role` int(2) DEFAULT NULL COMMENT '1 for admin,2 for user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `docid_ind` varchar(1) DEFAULT NULL,
  `crdt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `country_name` varchar(25) DEFAULT NULL,
  `crdt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `b_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `b_name` varchar(50) NOT NULL,
  `b_address` varchar(200) NOT NULL,
  `b_created_date` datetime NOT NULL,
  `b_status` enum('active','inactive') NOT NULL
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
  `college_code` varchar(4) NOT NULL,
  `college_name` varchar(100) DEFAULT NULL,
  `total_students` int(4) DEFAULT NULL,
  `city_code` int(7) DEFAULT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `state_code` int(6) DEFAULT NULL,
  `state_name` varchar(25) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `college_mast_old`
--

CREATE TABLE `college_mast_old` (
  `college_code` varchar(4) NOT NULL,
  `college_name` varchar(50) DEFAULT NULL,
  `total_students` int(4) DEFAULT NULL,
  `city_code` int(7) DEFAULT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `state_code` int(6) DEFAULT NULL,
  `state_name` varchar(25) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `course_mast`
--

CREATE TABLE `course_mast` (
  `course_code` varchar(8) NOT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `course_duration` int(2) DEFAULT NULL,
  `course_fees` int(5) DEFAULT NULL,
  `course_type` varchar(1) DEFAULT NULL,
  `course_eligibility` varchar(50) DEFAULT NULL,
  `course_intro` text DEFAULT NULL,
  `course_objective` text DEFAULT NULL,
  `course_syllabus` text DEFAULT NULL,
  `course_content` text DEFAULT NULL,
  `course_summary` text DEFAULT NULL,
  `course_marking` text DEFAULT NULL,
  `tot_student` int(5) DEFAULT NULL,
  `tot_completed` int(5) DEFAULT NULL,
  `tot_ongoing` int(5) DEFAULT NULL,
  `affiliation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id` int(11) NOT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(54) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `x_th` varchar(200) DEFAULT NULL,
  `xii_th` varchar(200) DEFAULT NULL,
  `id_proof` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `element_mast`
--

CREATE TABLE `element_mast` (
  `element_code` varchar(2) DEFAULT NULL,
  `element_name` varchar(200) DEFAULT NULL,
  `element_desc` text DEFAULT NULL,
  `element_type` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jcatg_mast`
--

CREATE TABLE `jcatg_mast` (
  `jcatg_id` int(11) NOT NULL,
  `jcatg_description` varchar(150) DEFAULT NULL
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
-- Table structure for table `judgment_act`
--

CREATE TABLE `judgment_act` (
  `id` int(15) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `j_doc_id` varchar(40) DEFAULT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `judgment_title` varchar(255) DEFAULT NULL,
  `doc_id` int(10) DEFAULT NULL,
  `act_group_code` int(2) DEFAULT NULL,
  `act_group_desc` varchar(25) DEFAULT NULL,
  `act_catg_code` int(3) DEFAULT NULL,
  `act_catg_desc` varchar(100) DEFAULT NULL,
  `act_sub_catg_code` int(4) DEFAULT NULL,
  `act_sub_catg_desc` varchar(100) DEFAULT NULL,
  `act_title` varchar(255) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `country_shrt_name` varchar(10) DEFAULT NULL,
  `bareact_code` int(5) DEFAULT NULL,
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
-- Stand-in structure for view `judgment_act_view`
-- (See below for the actual view)
--
CREATE TABLE `judgment_act_view` (
`bareact_code` int(5)
,`username` varchar(50)
,`j_doc_id` varchar(40)
);

-- --------------------------------------------------------

--
-- Table structure for table `judgment_advocate`
--

CREATE TABLE `judgment_advocate` (
  `id` int(20) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `advocate_name` varchar(50) DEFAULT NULL,
  `advocate_flag` varchar(1) DEFAULT NULL,
  `doc_id` varchar(40) DEFAULT NULL,
  `exam_status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `username` varchar(50) DEFAULT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `doc_id` varchar(40) DEFAULT NULL,
  `journal_code` int(4) DEFAULT NULL,
  `journal_name` varchar(25) DEFAULT NULL,
  `shrt_name` varchar(10) DEFAULT NULL,
  `judgment_date` date DEFAULT NULL,
  `citation` varchar(20) DEFAULT NULL,
  `journal_year` varchar(6) DEFAULT NULL,
  `journal_volume` varchar(2) DEFAULT NULL,
  `journal_pno` int(4) DEFAULT NULL,
  `exam_status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_data_point`
--

CREATE TABLE `judgment_data_point` (
  `id` int(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `element_code` int(2) DEFAULT NULL,
  `element_name` varchar(25) NOT NULL,
  `data_point` varchar(15) NOT NULL,
  `weight_perc` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `judgment_element`
--

CREATE TABLE `judgment_element` (
  `id` int(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `doc_id` varchar(40) DEFAULT NULL,
  `element_code` varchar(2) DEFAULT NULL,
  `element_name` varchar(25) DEFAULT NULL,
  `element_text` text DEFAULT NULL,
  `weight_perc` int(3) DEFAULT NULL,
  `element_word_length` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `username` varchar(50) DEFAULT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `judge_name` varchar(50) DEFAULT NULL,
  `doc_id` varchar(40) DEFAULT NULL,
  `exam_status` varchar(1) DEFAULT NULL
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
  `username` varchar(50) DEFAULT NULL,
  `u_id` int(9) NOT NULL COMMENT 'admin id',
  `college_code` varchar(4) DEFAULT 'NULL',
  `judgment_code` int(9) NOT NULL,
  `court_code` int(7) DEFAULT NULL,
  `court_name` varchar(100) DEFAULT NULL,
  `court_type` varchar(2) DEFAULT NULL,
  `appeal_numb` varchar(250) DEFAULT NULL,
  `appeal_numb1` varchar(250) DEFAULT 'NULL',
  `judgment_date` date DEFAULT NULL,
  `judgment_date1` date DEFAULT NULL,
  `judgment_title` varchar(255) DEFAULT NULL,
  `appeal_status` varchar(10) DEFAULT NULL,
  `disposition_id` int(3) DEFAULT NULL,
  `disposition_id1` int(3) DEFAULT NULL,
  `disposition_text` varchar(255) DEFAULT NULL,
  `bench_type_id` int(3) DEFAULT NULL,
  `bench_type_id1` int(3) DEFAULT NULL,
  `bench_type_text` varchar(255) DEFAULT NULL,
  `judgment_jurisdiction_id` int(3) DEFAULT NULL,
  `judgment_jurisdiction_id1` int(3) DEFAULT NULL,
  `judgmnent_jurisdiction_text` varchar(255) DEFAULT NULL,
  `judgment_abstract` longtext DEFAULT NULL,
  `judgment_analysis` longtext DEFAULT NULL,
  `judgment_text` longtext DEFAULT NULL,
  `judgment_text1` longtext DEFAULT 'NULL',
  `search_tag` varchar(300) DEFAULT 'NULL',
  `doc_id` varchar(40) DEFAULT NULL,
  `judgment_type` varchar(1) DEFAULT NULL,
  `judgment_type1` varchar(1) DEFAULT NULL,
  `jcatg_id` int(4) DEFAULT NULL,
  `jcatg_id1` int(4) DEFAULT NULL,
  `jcatg_description` varchar(150) DEFAULT NULL,
  `jsub_catg_id` int(8) DEFAULT NULL,
  `jsub_catg_id1` int(8) DEFAULT NULL,
  `jsub_catg_description` varchar(150) DEFAULT NULL,
  `overrule_judgment` varchar(20) DEFAULT NULL,
  `overruled_by_judgment` varchar(20) DEFAULT NULL,
  `remark` varchar(2000) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `work_status` varchar(2) DEFAULT NULL COMMENT 'for_all_tabs',
  `status_2` int(1) DEFAULT NULL COMMENT 'for_elements&datapoints',
  `completion_status` varchar(1) DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `research_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_parties`
--

CREATE TABLE `judgment_parties` (
  `judgment_party_id` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `judgment_code` int(9) DEFAULT NULL,
  `party_name` varchar(50) DEFAULT NULL,
  `party_flag` varchar(1) DEFAULT NULL,
  `doc_id` varchar(40) NOT NULL,
  `exam_status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_ref`
--

CREATE TABLE `judgment_ref` (
  `id` int(15) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
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
  `flag` varchar(100) DEFAULT NULL,
  `exam_status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judgment_search_tag`
--

CREATE TABLE `judgment_search_tag` (
  `username` varchar(50) DEFAULT NULL,
  `judgment_code` int(9) NOT NULL,
  `doc_id` varchar(40) DEFAULT NULL,
  `search_tag` varchar(300) DEFAULT NULL,
  `tag_name` varchar(50) DEFAULT NULL,
  `tag_per` int(2) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `judgment_sub_catg_view`
-- (See below for the actual view)
--
CREATE TABLE `judgment_sub_catg_view` (
`tot` bigint(21)
,`username` varchar(50)
,`jsub_catg_id` int(8)
,`jsub_catg_description` varchar(150)
);

-- --------------------------------------------------------

--
-- Table structure for table `module_mast`
--

CREATE TABLE `module_mast` (
  `module_code` int(3) DEFAULT NULL,
  `module_description` varchar(25) DEFAULT NULL,
  `module_level` int(1) DEFAULT NULL
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
  `college_code` varchar(8) DEFAULT NULL,
  `college_name` varchar(100) DEFAULT NULL,
  `course_code` varchar(8) DEFAULT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `course_fees` int(5) DEFAULT NULL,
  `course_status` varchar(20) DEFAULT NULL,
  `enrol_no` varchar(11) NOT NULL,
  `regs_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `city_code` int(7) DEFAULT NULL,
  `state_code` int(6) DEFAULT NULL,
  `country_code` int(4) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `qual_desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_docs`
--

CREATE TABLE `student_docs` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `doc_tenth` varchar(30) CHARACTER SET utf8mb4 DEFAULT NULL,
  `doc_twelve` varchar(30) CHARACTER SET utf8mb4 DEFAULT NULL,
  `doc_id_proof` varchar(30) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_catg_mast`
--

CREATE TABLE `syllabus_catg_mast` (
  `syllabus_catg_code` varchar(5) DEFAULT NULL,
  `syllabus_catg_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_detail`
--

CREATE TABLE `syllabus_detail` (
  `course_code` varchar(8) DEFAULT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `syllabus_catg_code` varchar(5) DEFAULT NULL,
  `syllabus_catg_name` varchar(50) DEFAULT NULL,
  `tot_count` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `mobile_number` varchar(12) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `log_det` int(1) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `judgment_act_view`
--
DROP TABLE IF EXISTS `judgment_act_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judgment_act_view`  AS  (select distinct `judgment_act`.`bareact_code` AS `bareact_code`,`judgment_act`.`username` AS `username`,`judgment_act`.`j_doc_id` AS `j_doc_id` from `judgment_act`) ;

-- --------------------------------------------------------

--
-- Structure for view `judgment_sub_catg_view`
--
DROP TABLE IF EXISTS `judgment_sub_catg_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judgment_sub_catg_view`  AS  (select count(0) AS `tot`,`a`.`username` AS `username`,`a`.`jsub_catg_id` AS `jsub_catg_id`,`b`.`jsub_catg_description` AS `jsub_catg_description` from (`judgment_mast` `a` join `jsub_catg_mast` `b`) where `a`.`jcatg_id` = `b`.`jcatg_id` and `a`.`username` is not null and `a`.`jcatg_id` is not null group by `a`.`username`,`a`.`jsub_catg_id`,`b`.`jsub_catg_description`) ;

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`doc_id`),
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
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `city_mast`
--
ALTER TABLE `city_mast`
  ADD PRIMARY KEY (`city_code`),
  ADD KEY `citymast_statecode_fk` (`state_code`),
  ADD KEY `citymast_countrycode_fk` (`country_code`);

--
-- Indexes for table `college_mast`
--
ALTER TABLE `college_mast`
  ADD PRIMARY KEY (`college_code`);

--
-- Indexes for table `country_mast`
--
ALTER TABLE `country_mast`
  ADD PRIMARY KEY (`country_code`),
  ADD UNIQUE KEY `country_name_un` (`country_name`);

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
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `judgment_act`
--
ALTER TABLE `judgment_act`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_jdocid` (`j_doc_id`),
  ADD KEY `judg_act_doc_id_ref` (`doc_id`),
  ADD KEY `judg_act_j_doc_id_ref` (`j_doc_id`),
  ADD KEY `judg_act_bareact_code` (`bareact_code`);

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
-- Indexes for table `judgment_data_point`
--
ALTER TABLE `judgment_data_point`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `judgment_mast_doc_id` (`doc_id`),
  ADD KEY `judgment_mast_user` (`username`);

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
  ADD KEY `doc_id` (`doc_id`),
  ADD KEY `doc_id_ref` (`doc_id_ref`);

--
-- Indexes for table `judgment_search_tag`
--
ALTER TABLE `judgment_search_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_mast`
--
ALTER TABLE `state_mast`
  ADD PRIMARY KEY (`state_code`),
  ADD KEY `country_code_fk` (`country_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`enrol_no`),
  ADD KEY `city_code` (`city_code`),
  ADD KEY `state_code` (`state_code`,`country_code`);

--
-- Indexes for table `student_docs`
--
ALTER TABLE `student_docs`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `court_mast`
--
ALTER TABLE `court_mast`
  MODIFY `bench_code` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jcatg_mast`
--
ALTER TABLE `jcatg_mast`
  MODIFY `jcatg_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `judgment_data_point`
--
ALTER TABLE `judgment_data_point`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `judgment_mast`
--
ALTER TABLE `judgment_mast`
  MODIFY `judgment_code` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judgment_parties`
--
ALTER TABLE `judgment_parties`
  MODIFY `judgment_party_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judgment_ref`
--
ALTER TABLE `judgment_ref`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judgment_search_tag`
--
ALTER TABLE `judgment_search_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state_mast`
--
ALTER TABLE `state_mast`
  MODIFY `state_code` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_docs`
--
ALTER TABLE `student_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
