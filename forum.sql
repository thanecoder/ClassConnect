-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2016 at 05:15 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`a_id`, `q_id`, `s_id`, `answer`, `points`) VALUES
(1, 1, 1, 'It is very important skill.', 4),
(2, 1, 1, 'Web Technology is a subject which consists of web programming language and how to make web pages.', 4),
(12, 2, 1, 'html,css,php,javascript', 2),
(13, 2, 1, 'and jquery and bootstrap too!', 3),
(20, 1, 1, 'it is about making web pages', 5),
(21, 19, 1, 'PHP:Hypertext Preprocessor', 3),
(22, 19, 1, 'Server Side Scripting Language', 2),
(23, 22, 3, 'activity to verify that project can be started and successfully completed', 1),
(24, 9, 2, 'ring,bus,star', 1),
(25, 23, 4, 'programming interface', 2),
(26, 24, 2, 'Distance Vector Routing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `s_id`, `question`) VALUES
(1, 1, 'What is web technology?'),
(2, 1, 'What does web technology consist?'),
(3, 1, 'what are benefits of web technology?'),
(9, 2, 'what is lan topology?'),
(19, 1, 'what is php'),
(20, 1, 'what is the three tier programming'),
(21, 2, 'what is ARP'),
(22, 3, 'what is feasibility analysis'),
(23, 4, 'what are system calls'),
(24, 2, 'what is DVR');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(50) NOT NULL,
  `sem` int(11) NOT NULL,
  `branch` varchar(100) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`s_id`, `s_name`, `sem`, `branch`) VALUES
(1, 'Web Technology', 5, 'computer'),
(2, 'Computer Networks', 5, 'computer'),
(3, 'SOOAD', 5, 'computer'),
(4, 'Operating Systems', 5, 'computer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `roll_no` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `sem` int(11) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`roll_no`),
  UNIQUE KEY `roll_no` (`roll_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`roll_no`, `name`, `sem`, `branch`, `password`) VALUES
(1, 'abc', 5, 'computer', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
