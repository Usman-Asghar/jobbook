-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2016 at 09:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobsbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `yh_admin`
--

CREATE TABLE IF NOT EXISTS `yh_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_fname` varchar(30) NOT NULL,
  `admin_lname` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `yh_admin`
--

INSERT INTO `yh_admin` (`admin_id`, `admin_fname`, `admin_lname`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'User', 'admin@gmail.com', '81fb0d4fcb80cfe3bb4c86919e4173f0ca3b3361657fb48223ef10a950c9db23');

-- --------------------------------------------------------

--
-- Table structure for table `yh_chat`
--

CREATE TABLE IF NOT EXISTS `yh_chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `from` (`from`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yh_grades`
--

CREATE TABLE IF NOT EXISTS `yh_grades` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(50) NOT NULL,
  `grade_color` varchar(50) DEFAULT NULL,
  `grade_status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `yh_grades`
--

INSERT INTO `yh_grades` (`grade_id`, `grade_name`, `grade_color`, `grade_status`) VALUES
(1, 'Grade 1', '#408080', '1'),
(2, 'Grade 2', '#008000', '1'),
(3, 'Grade 3', '#ff00ff', '1'),
(4, 'Grade 4', '#008022', '1');

-- --------------------------------------------------------

--
-- Table structure for table `yh_jobs`
--

CREATE TABLE IF NOT EXISTS `yh_jobs` (
  `job_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_desc` text NOT NULL,
  `start_date` date NOT NULL,
  `deadline_date` date NOT NULL,
  `date_entered` date NOT NULL,
  `assigned_to` tinyint(1) NOT NULL DEFAULT '0',
  `job_status` enum('0','1') NOT NULL DEFAULT '1',
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `yh_jobs`
--

INSERT INTO `yh_jobs` (`job_id`, `grade_id`, `job_title`, `job_desc`, `start_date`, `deadline_date`, `date_entered`, `assigned_to`, `job_status`, `admin_id`) VALUES
(3, 1, 'Job1', 'dsnklsa.dsam.sad.m.sad', '2016-06-26', '2016-06-25', '2016-06-26', 0, '1', 1),
(4, 2, 'Job 2', 'Job 2', '2016-07-04', '2016-07-30', '2016-07-04', 1, '1', 1),
(5, 3, 'Job 3', 'Job 3', '2016-07-04', '2016-08-31', '2016-07-04', 1, '1', 1),
(6, 4, 'Job 4', 'Job 4', '2016-07-04', '2016-08-17', '2016-07-04', 1, '1', 1),
(7, 2, 'New job', 'New job', '2016-07-13', '2016-07-02', '2016-07-13', 0, '1', 1),
(8, 1, 'Job new', 'Job new', '2016-07-16', '2016-07-30', '2016-07-16', 0, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `yh_jobs_files`
--

CREATE TABLE IF NOT EXISTS `yh_jobs_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `file_address` varchar(500) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `yh_jobs_files`
--

INSERT INTO `yh_jobs_files` (`id`, `job_id`, `file_address`, `file_name`, `is_public`) VALUES
(9, 3, 'Chrysanthemum.jpg', 'Chrysanthemum', 1),
(10, 4, 'Chrysanthemum.jpg', 'Chrysanthemum', 1),
(11, 5, 'Penguins.jpg', 'Penguins', 1),
(12, 6, 'Jellyfish.jpg', 'Jellyfish', 1),
(13, 7, 'Desert.jpg', 'Desert', 0),
(14, 7, 'Hydrangeas.jpg', 'Hydrangeas', 0),
(15, 7, 'Penguins.jpg', 'Penguins', 0),
(16, 7, 'Koala.jpg', 'Koala', 1),
(17, 7, 'Lighthouse.jpg', 'Lighthouse', 1),
(18, 7, 'Tulips.jpg', 'Tulips', 1),
(19, 8, 'Chrys anthe mum.jpg', 'Chrys anthe mum', 1);

-- --------------------------------------------------------

--
-- Table structure for table `yh_users`
--

CREATE TABLE IF NOT EXISTS `yh_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) NOT NULL DEFAULT '0',
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `online` enum('1','0') NOT NULL DEFAULT '1',
  `profile_status` enum('0','1') NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `yh_users`
--

INSERT INTO `yh_users` (`user_id`, `grade_id`, `fname`, `lname`, `email`, `password`, `avatar`, `online`, `profile_status`, `admin_id`) VALUES
(1, 1, 'Sipmle', 'User 1', 'user1@gmail.com', '81fb0d4fcb80cfe3bb4c86919e4173f0ca3b3361657fb48223ef10a950c9db23', '', '1', '1', 1),
(2, 2, 'Simple', 'User 2', 'user2@gmail.com', '81fb0d4fcb80cfe3bb4c86919e4173f0ca3b3361657fb48223ef10a950c9db23', '', '1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `yh_user_to_jobs`
--

CREATE TABLE IF NOT EXISTS `yh_user_to_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `no_of_hours` int(15) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `rejected` tinyint(1) NOT NULL DEFAULT '0',
  `rejection_reason` varchar(500) DEFAULT NULL,
  `viewed` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `yh_user_to_jobs`
--

INSERT INTO `yh_user_to_jobs` (`id`, `user_id`, `job_id`, `start_date`, `end_date`, `no_of_hours`, `approved`, `rejected`, `rejection_reason`, `viewed`) VALUES
(3, 2, 4, '2016-07-01', '2016-07-30', 20, 1, 0, NULL, 1),
(6, 2, 5, '2016-07-01', '2016-07-30', 27, 1, 0, 'Due to lack of Education', 1),
(8, 1, 6, '2016-07-01', '2016-07-30', 20, 3, 0, 'Due to lack of Education', 1),
(9, 1, 5, '2016-07-02', '2016-08-31', 20, 2, 0, NULL, 1),
(10, 1, 3, '2016-07-02', '2016-07-30', 20, 0, 0, 'Due to lack of Education', 1),
(11, 1, 4, '2016-07-16', '2016-07-30', 16, 0, 0, NULL, 1),
(12, 1, 8, '2016-07-23', '2016-07-30', 15, 0, 0, NULL, 1),
(13, 1, 7, '2016-07-01', '2016-07-30', 15, 0, 0, NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
