-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2015 at 11:40 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sharon`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Aston Martin', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(2, 'Acura', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(3, 'Audi', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(4, 'Bentley', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(5, 'Bmw', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(6, 'Bugatti', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(7, 'Buick', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(8, 'Cadillac', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(9, 'Chevrolet', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(10, 'Chrysler', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(11, 'Dodge', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(12, 'Ferrari', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(13, 'Ford', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(14, 'Gmc', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(15, 'Honda', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(16, 'Hyundai', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(17, 'Infiniti', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(18, 'Jaguar', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(19, 'Jeep', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(20, 'Lamborghini', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(21, 'Lexus', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(22, 'Lincoln', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(23, 'Maserati', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(24, 'Mazda', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(25, 'Mercedes-Benz', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(26, 'Mitsubishi', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(27, 'Tesla', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(28, 'Nissan', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(29, 'Porsche', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(30, 'Rolls Royce', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(31, 'Subaru', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(32, 'Tesla', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(33, 'Toyota', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(34, 'Volkswagen', '2015-06-23 14:48:48', '2015-06-23 14:48:48'),
(35, 'Volvo', '2015-06-23 14:48:48', '2015-06-23 14:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1 is active, 0 is deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto',
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL COMMENT 'unique',
  `password` varchar(255) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL COMMENT '1=male, 2=female, null=not specified',
  `birthdate` date DEFAULT NULL,
  `hubby` text,
  `last_login_time` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_ip` varchar(20) NOT NULL COMMENT 'user ip address',
  `modified_ip` varchar(20) NOT NULL COMMENT 'user ip address',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `gender`, `birthdate`, `hubby`, `last_login_time`, `created`, `modified`, `created_ip`, `modified_ip`) VALUES
(1, 'sharon', 'sha@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', '5588d50552625.jpg', 'M', '0000-00-00', 'the onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe one', '2015-06-23 08:57:28', '2015-06-23 03:56:06', '2015-06-23 08:57:28', '127.0.0.1', '127.0.0.1'),
(2, 'judecal', 'jude@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', NULL, NULL, NULL, NULL, '2015-06-23 09:44:14', '2015-06-23 09:44:14', '2015-06-23 09:44:14', '127.0.0.1', '127.0.0.1'),
(3, 'janice', 'jan@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', NULL, NULL, NULL, NULL, '2015-06-23 10:26:46', '2015-06-23 10:26:46', '2015-06-23 10:26:46', '127.0.0.1', '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
