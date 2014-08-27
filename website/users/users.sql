-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2014 at 12:32 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(150) COLLATE utf8_bin NOT NULL,
  `category_description` varchar(255) COLLATE utf8_bin NOT NULL,
  `last_post_date` datetime NOT NULL,
  `last_user_posted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_description`, `last_post_date`, `last_user_posted`) VALUES
(1, 'Recipe', '', '2014-08-26 13:12:11', 0),
(2, 'Utencils', '', '2014-08-26 13:13:06', 0),
(3, 'Soup Places', '', '2014-08-27 12:40:47', 0),
(4, 'Spices', '', '0000-00-00 00:00:00', 1),
(5, 'Chefs', '', '2014-08-27 12:38:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` varchar(50) COLLATE utf8_bin NOT NULL,
  `post_content` text COLLATE utf8_bin NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `topic_id`, `post_creator`, `post_content`, `post_date`) VALUES
(1, 2, 1, '1234', 'sasa', '2014-08-25 19:16:11'),
(2, 2, 2, '0', 'I love soup ve lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', '2014-08-26 13:09:13'),
(3, 1, 3, '0', 'sdfsdfsdfsdf', '2014-08-26 13:10:07'),
(4, 1, 4, '0', 'sdfsdfsdfsdf', '2014-08-26 13:12:11'),
(5, 2, 5, '0', 'asd', '2014-08-26 13:13:06'),
(6, 5, 6, '0', 'supa ve admin test', '2014-08-27 12:38:48'),
(7, 5, 6, 'admin', 'fgfdfg', '2014-08-27 12:40:19'),
(8, 5, 6, 'admin', 'fdgfddfgfds', '2014-08-27 12:40:23'),
(9, 5, 6, 'admin', 'gfdsfgfdsdfg', '2014-08-27 12:40:25'),
(10, 3, 7, 'admin', 'dai supa kopele', '2014-08-27 12:40:46'),
(11, 3, 7, 'admin', 'I na men ve', '2014-08-27 12:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL,
  `topic_title` varchar(150) COLLATE utf8_bin NOT NULL,
  `topic_creator` varchar(50) COLLATE utf8_bin NOT NULL,
  `topic_last_user` int(11) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_reply_date` datetime NOT NULL,
  `topic_views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `topic_title`, `topic_creator`, `topic_last_user`, `topic_date`, `topic_reply_date`, `topic_views`) VALUES
(1, 2, 'assa', '1234', 0, '2014-08-25 19:16:11', '2014-08-25 19:16:11', 0),
(2, 2, 'I love soup ve', '0', 0, '2014-08-26 13:09:13', '2014-08-26 13:09:13', 0),
(3, 1, 'dsfsdf', '0', 0, '2014-08-26 13:10:07', '2014-08-26 13:10:07', 0),
(4, 1, 'dsfsdf', '0', 0, '2014-08-26 13:12:11', '2014-08-26 13:12:11', 0),
(5, 2, 'Recipes', '0', 0, '2014-08-26 13:13:05', '2014-08-26 13:13:05', 0),
(6, 5, 'supa ve', '0', 0, '2014-08-27 12:38:48', '2014-08-27 12:38:48', 0),
(7, 3, 'Kopele qde mi se supa', 'admin', 0, '2014-08-27 12:40:46', '2014-08-27 12:40:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_bin NOT NULL,
  `lname` varchar(120) COLLATE utf8_bin NOT NULL,
  `uname` varchar(120) COLLATE utf8_bin NOT NULL,
  `email` varchar(120) COLLATE utf8_bin NOT NULL,
  `pass` varchar(128) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `uname`, `email`, `pass`) VALUES
(4, '12345', '12345', '12345', 'iliq9204@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, '1234', '12345', '1234', 'iliq9204@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'asd', 'asd', 'ASEN', 'asd@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(7, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(8, 'kiko', 'kiko', 'kiko', 'kiko@kiko.com', '202cb962ac59075b964b07152d234b70'),
(9, 'admin', 'admin', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
