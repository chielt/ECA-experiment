-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2013 at 05:09 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.22

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `michiel_resmeth`
--

--
-- Dumping data for table `questionair`
--

INSERT INTO `questionair` (`ID`, `question_set`, `set_id`, `sort`, `question`, `left_answer`, `right_answer`, `scale_length`) VALUES
(3, 'TQ', 1, 1, 'The interface structure is easy to understand ', 'strongly disagree', 'strongly agree', 7),
(4, 'TQ', 2, 2, 'The interface is visually enjoyable', 'strongly disagree', 'strongly agree', 7),
(5, 'TQ', 3, 3, 'Using this interface requires a lot of mental effort', 'strongly disagree', 'strongly agree', 7),
(6, 'TQ', 4, 4, 'Using this interface is comfortable', 'strongly disagree', 'strongly agree', 7),
(7, 'TQ', 5, 5, 'Instructions provided with this interface were complete', 'strongly disagree', 'strongly agree', 7),
(8, 'TQ', 6, 6, 'Instructions provided with this interface were easy to understand', 'strongly disagree', 'strongly agree', 7),
(11, 'TQ', 7, 7, 'Instructions provided with this interface were easy to remember', 'strongly disagree', 'strongly agree', 7),
(12, 'AQ', 1, 1, 'The interface features are likeable', 'strongly disagree', 'strongly agree', 7),
(13, 'AQ', 2, 2, 'The interface made me feel at ease', 'strongly disagree', 'strongly agree', 7),
(14, 'AQ', 3, 3, 'The interface has a pleasant voice', 'strongly disagree', 'strongly agree', 7),
(15, 'AQ', 4, 4, 'Using this interface requires a lot of mental effort', 'strongly disagree', 'strongly agree', 7),
(16, 'AQ', 5, 5, 'Using this interface is comfortable	', 'strongly disagree', 'strongly agree', 7),
(17, 'AQ', 6, 6, 'Instructions provided with this interface were complete', 'strongly disagree', 'strongly agree', 7),
(18, 'AQ', 7, 7, 'Instructions provided with this interface were easy to understand', 'strongly disagree', 'strongly agree', 7),
(19, 'AQ', 8, 8, 'Instructions provided with this interface were easy to remember', 'strongly disagree', 'strongly agree', 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
