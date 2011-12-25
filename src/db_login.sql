-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 25, 2011 at 08:00 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_login`
--

CREATE TABLE IF NOT EXISTS `log_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `log_login`
--

INSERT INTO `log_login` (`id`, `create_date`, `update_date`, `token`, `del_flg`) VALUES
(6, '2011-12-25 07:54:01', '2011-12-25 07:54:01', '10091e57d38128ec56da7185347b1b2cf9612654', 1),
(7, '2011-12-25 07:57:37', '2011-12-25 07:57:37', '3545eaa966195697bc02ce152be8a15ec74fef63', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`) VALUES
(1, 'ali', 'e364bce5e29eb2b4c39c2ac2771249b1c4dce6b661dc355982ff696b3e740ef4', 'c8b'),
(3, 'zav1', '73f2c769307006d497a66797145fc0ac54f0a34bbe2fcf40bbcda2f482dbb5dc', '9f5'),
(4, 'zav2', '2a9badee3917d0de28f916c19d96fc23bad9656a93cd0d0c104251e935e0d5bc', 'f8b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
