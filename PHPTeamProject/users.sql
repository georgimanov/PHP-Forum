-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2014 at 07:39 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_description`, `last_post_date`, `last_user_posted`) VALUES
(1, 'Title', 'Category we', '2014-08-26 15:16:14', 1234),
(2, 'Another', 'Cateegory', '2014-08-26 20:02:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` varchar(120) COLLATE utf8_bin NOT NULL,
  `post_content` text COLLATE utf8_bin NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=25 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `topic_id`, `post_creator`, `post_content`, `post_date`) VALUES
(1, 2, 1, '1234', 'sasa', '2014-08-25 19:16:11'),
(2, 2, 2, '1234', 'Content', '2014-08-26 14:22:50'),
(3, 1, 3, '1234', 'New', '2014-08-26 15:16:14'),
(4, 2, 2, '1234', 'asasa', '0000-00-00 00:00:00'),
(5, 2, 2, '1234', 'asasa', '0000-00-00 00:00:00'),
(6, 2, 2, '1234', 'asasaa', '2014-08-26 16:48:41'),
(7, 2, 2, '1234', 'Kvo staa', '2014-08-26 16:48:46'),
(8, 2, 2, '1234', 'Kvo staa', '2014-08-26 16:48:53'),
(9, 2, 2, '1234', 'Kvo staa', '2014-08-26 16:48:59'),
(10, 2, 2, '1234', 'asasa', '2014-08-26 16:49:43'),
(11, 2, 2, '1234', 'asasa', '2014-08-26 16:49:48'),
(12, 2, 2, '1234', 'E mn qsno', '2014-08-26 17:03:12'),
(13, 2, 2, '1234', 'E mn qsno be', '2014-08-26 17:03:38'),
(14, 2, 2, '1234', 'mn e qko', '2014-08-26 17:04:05'),
(15, 2, 4, '0', 'Alabala Content', '2014-08-26 19:35:03'),
(16, 2, 4, '0', 'kakdsak ', '2014-08-26 19:35:45'),
(17, 2, 5, '0', 'sasasa', '2014-08-26 19:44:06'),
(18, 2, 8, '0', 'Test mfcka', '2014-08-26 19:56:45'),
(19, 2, 9, '0', 'Test mfcka sa', '2014-08-26 19:57:23'),
(20, 2, 10, '0', 'Test mfcka sasas', '2014-08-26 19:57:58'),
(21, 2, 11, '0', 'Test mfcka sasas', '2014-08-26 20:00:41'),
(22, 2, 12, 'alabala', 'Test mfcka sasas', '2014-08-26 20:02:08'),
(23, 2, 12, 'alabala', 'kvo tesvash we', '2014-08-26 20:02:30'),
(24, 2, 12, '12345', 'tapaci', '2014-08-26 20:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL,
  `topic_title` varchar(150) COLLATE utf8_bin NOT NULL,
  `topic_creator` varchar(120) COLLATE utf8_bin NOT NULL,
  `topic_last_user` int(11) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_reply_date` datetime NOT NULL,
  `topic_views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `topic_title`, `topic_creator`, `topic_last_user`, `topic_date`, `topic_reply_date`, `topic_views`) VALUES
(1, 2, 'assa', '1234', 0, '2014-08-25 19:16:11', '2014-08-25 19:16:11', 0),
(2, 2, 'New Topic', '1234', 0, '2014-08-26 14:22:50', '2014-08-26 14:22:50', 0),
(3, 1, 'Second', '1234', 0, '2014-08-26 15:16:14', '2014-08-26 15:16:14', 0),
(4, 2, 'Alabala Topic', '0', 0, '2014-08-26 19:35:03', '2014-08-26 19:35:03', 0),
(5, 2, 'assaasasaasas', '0', 0, '2014-08-26 19:44:06', '2014-08-26 19:44:06', 0),
(6, 2, 'Test', '0', 0, '2014-08-26 19:55:02', '2014-08-26 19:55:02', 0),
(7, 2, 'Test', '0', 0, '2014-08-26 19:55:23', '2014-08-26 19:55:23', 0),
(8, 2, 'Test', '0', 0, '2014-08-26 19:56:45', '2014-08-26 19:56:45', 0),
(9, 2, 'Testasa', '0', 0, '2014-08-26 19:57:23', '2014-08-26 19:57:23', 0),
(10, 2, 'Testasasasasa', '0', 0, '2014-08-26 19:57:58', '2014-08-26 19:57:58', 0),
(11, 2, 'Random', 'alabala', 0, '2014-08-26 20:00:41', '2014-08-26 20:00:41', 0),
(12, 2, 'Random22', 'alabala', 0, '2014-08-26 20:02:08', '2014-08-26 20:02:08', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `uname`, `email`, `pass`) VALUES
(4, '12345', '12345', '12345', 'iliq9204@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, '1234', '12345', '1234', 'iliq9204@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, '1231', '24131', '21212', 'iliq9204@gmail.bg', 'b59c67bf196a4758191e42f76670ceba'),
(7, '1231', '24131', '31212', 'iliq9204@gmail.bg', 'b59c67bf196a4758191e42f76670ceba'),
(8, 'alabala', 'alabala', 'alabala', 'iliq9204@gmail.bg', '827ccb0eea8a706c4c34a16891f84e7b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
