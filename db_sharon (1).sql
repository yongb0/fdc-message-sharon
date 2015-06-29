-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2015 at 09:07 AM
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=224 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `to_id`, `from_id`, `content`, `created`, `modified`) VALUES
(126, 6, 2, 'testing', '2015-06-26 04:05:00', '2015-06-26 04:05:00'),
(135, 3, 1, 'kanice\r\n', '2015-06-26 04:21:24', '2015-06-26 04:21:24'),
(149, 5, 2, 'samsung samsung', '2015-06-26 04:57:51', '2015-06-26 04:57:51'),
(150, 3, 7, 'dfdfdf', '2015-06-26 05:38:34', '2015-06-26 05:38:34'),
(151, 1, 7, 'dfgdfdfdf', '2015-06-26 05:40:24', '2015-06-26 05:40:24'),
(153, 5, 7, 'dfdf df dfdf', '2015-06-26 05:44:07', '2015-06-26 05:44:07'),
(159, 3, 5, 'janice janice', '2015-06-26 07:05:39', '2015-06-26 07:05:39'),
(160, 3, 5, 'janice', '2015-06-26 07:05:54', '2015-06-26 07:05:54'),
(161, 3, 1, 'janice janice chuchu 0909', '2015-06-26 07:13:23', '2015-06-26 07:13:23'),
(162, 8, 9, 'hellow user 8 how are you', '2015-06-26 07:15:06', '2015-06-26 07:15:06'),
(163, 9, 8, 'im good how bout you', '2015-06-26 07:15:37', '2015-06-26 07:15:37'),
(164, 8, 9, 'sharon faith salvania macasaol', '2015-06-26 07:32:36', '2015-06-26 07:32:36'),
(165, 2, 9, 'jude calimbas bacasmas', '2015-06-26 07:32:58', '2015-06-26 07:32:58'),
(166, 2, 9, 'sharon ', '2015-06-26 07:33:13', '2015-06-26 07:33:13'),
(167, 9, 2, 'hello im madeline', '2015-06-26 07:33:45', '2015-06-26 07:33:45'),
(168, 6, 2, 'wse re rer er e rere re ere', '2015-06-26 07:52:27', '2015-06-26 07:52:27'),
(169, 3, 2, 'dfdfdf', '2015-06-26 07:53:13', '2015-06-26 07:53:13'),
(170, 6, 2, 'the one with the [power to vanquish the dark ', '2015-06-26 08:31:47', '2015-06-26 08:31:47'),
(171, 7, 1, 'dfdfdfdf', '2015-06-26 08:57:33', '2015-06-26 08:57:33'),
(172, 3, 1, 'sharon faith macasaol he one with the', '2015-06-26 09:08:05', '2015-06-26 09:08:05'),
(174, 9, 8, 'sharon salvania macasaol', '2015-06-26 09:10:17', '2015-06-26 09:10:17'),
(175, 3, 8, 'janice janice', '2015-06-26 09:10:33', '2015-06-26 09:10:33'),
(176, 2, 5, 'hey jude dont be afraid', '2015-06-26 09:33:57', '2015-06-26 09:33:57'),
(177, 13, 5, 'momomomomm lalalala', '2015-06-26 09:36:13', '2015-06-26 09:36:13'),
(178, 13, 5, 'the one with the powe', '2015-06-26 09:36:33', '2015-06-26 09:36:33'),
(179, 3, 5, 'hello janice', '2015-06-26 09:43:19', '2015-06-26 09:43:19'),
(180, 4, 5, 'hi sd sds sd', '2015-06-26 09:45:28', '2015-06-26 09:45:28'),
(181, 2, 5, 'saron faith macasaol', '2015-06-26 09:45:52', '2015-06-26 09:45:52'),
(182, 5, 14, 'hello sharonfaith', '2015-06-26 10:13:31', '2015-06-26 10:13:31'),
(183, 3, 14, 'dfdfdfdfd', '2015-06-26 10:13:47', '2015-06-26 10:13:47'),
(189, 13, 5, 'dfgddf dfd fd fdfd fdf', '2015-06-26 11:51:30', '2015-06-26 11:51:30'),
(191, 4, 8, 'sdsds sd s sd sd', '2015-06-26 12:57:40', '2015-06-26 12:57:40'),
(192, 13, 8, 'dfdfdf', '2015-06-26 12:58:04', '2015-06-26 12:58:04'),
(193, 8, 9, 'sdsds', '2015-06-26 13:02:01', '2015-06-26 13:02:01'),
(196, 19, 1, '', '2015-06-26 13:44:20', '2015-06-26 13:44:20'),
(197, 19, 1, 'ã‚¦ã‚£ã‚­ãƒšãƒ‡ã‚£ã‚¢æ—¥æœ¬èªžç‰ˆ', '2015-06-26 13:44:59', '2015-06-26 13:44:59'),
(200, 0, 1, 'hey janie', '2015-06-29 03:23:44', '2015-06-29 03:23:44'),
(204, 7, 1, 'sahron sharon', '2015-06-29 03:44:46', '2015-06-29 03:44:46'),
(206, 15, 21, 'ddfdf', '2015-06-29 05:51:58', '2015-06-29 05:51:58'),
(212, 7, 1, 'hellow', '2015-06-29 07:06:27', '2015-06-29 07:06:27'),
(213, 7, 1, 'sdsdsd', '2015-06-29 07:08:41', '2015-06-29 07:08:41'),
(214, 3, 22, 'hey janice', '2015-06-29 07:53:54', '2015-06-29 07:53:54'),
(216, 15, 24, 'hello children', '2015-06-29 08:50:07', '2015-06-29 08:50:07'),
(217, 15, 24, 'dfdfdfd', '2015-06-29 08:50:13', '2015-06-29 08:50:13'),
(219, 15, 24, 'fdf dfdfdfd', '2015-06-29 08:50:25', '2015-06-29 08:50:25'),
(222, 15, 24, 'dfdfdf dfd fdf', '2015-06-29 08:56:32', '2015-06-29 08:56:32'),
(223, 4, 1, 'sdsdsd', '2015-06-29 08:57:57', '2015-06-29 08:57:57');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `gender`, `birthdate`, `hubby`, `last_login_time`, `created`, `modified`, `created_ip`, `modified_ip`) VALUES
(1, 'sharon', 'formsdsd@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', '5590add4e44a0.jpg', 'F', '1970-01-24', 'the onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe onethe one', '2015-06-29 08:58:11', '2015-06-23 03:56:06', '2015-06-29 08:58:27', '127.0.0.1', '127.0.0.1'),
(2, 'judecal', 'jude@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', NULL, NULL, NULL, NULL, '2015-06-26 09:08:50', '2015-06-23 09:44:14', '2015-06-26 09:08:50', '127.0.0.1', '127.0.0.1'),
(3, 'janice', 'jan@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', NULL, NULL, NULL, NULL, '2015-06-23 10:26:46', '2015-06-23 10:26:46', '2015-06-23 10:26:46', '127.0.0.1', '127.0.0.1'),
(4, 'sdsdsd', 'popo@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', NULL, NULL, NULL, NULL, '2015-06-24 05:59:36', '2015-06-24 05:59:36', '2015-06-24 05:59:36', '127.0.0.1', '127.0.0.1'),
(5, 'Sharon Faith', 'samsung@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', '5590ed8b6b202.jpg', 'M', '1970-01-01', 'dfgd fdf dfdfd', '2015-06-29 03:02:03', '2015-06-25 10:53:16', '2015-06-29 03:02:35', '127.0.0.1', '127.0.0.1'),
(6, 'testing', 'test@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', '558ca0e15a777.jpg', 'M', '0000-00-00', 'enter a hobby', '2015-06-29 06:59:44', '2015-06-26 02:45:14', '2015-06-29 06:59:44', '127.0.0.1', '127.0.0.1'),
(7, 'register', 'reg@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', NULL, NULL, NULL, NULL, '2015-06-26 05:38:08', '2015-06-26 04:49:52', '2015-06-26 05:38:08', '127.0.0.1', '127.0.0.1'),
(8, 'user1', 'user1@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', '558d2e82a31e0.png', 'M', '0000-00-00', 'dfdfdfd', '2015-06-26 12:38:49', '2015-06-26 07:14:05', '2015-06-26 12:50:42', '127.0.0.1', '127.0.0.1'),
(9, 'user2', 'user2@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', '558d30773be02.png', 'M', '0000-00-00', 'sdsdsd', '2015-06-26 12:58:22', '2015-06-26 07:14:39', '2015-06-26 12:59:03', '127.0.0.1', '127.0.0.1'),
(10, 'oneoneone', 'one@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', NULL, NULL, NULL, NULL, '2015-06-26 08:49:43', '2015-06-26 08:49:43', '2015-06-26 08:49:43', '127.0.0.1', '127.0.0.1'),
(11, 'alcohol', 'shaeon@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', NULL, NULL, NULL, NULL, '2015-06-26 08:50:36', '2015-06-26 08:50:36', '2015-06-26 08:50:36', '127.0.0.1', '127.0.0.1'),
(12, 'sahron', 'alco@gmail.com', '7499a02e96a6dc5b7ebabc1bd3dcd37090464510', NULL, NULL, NULL, NULL, '2015-06-26 09:25:16', '2015-06-26 09:25:16', '2015-06-26 09:25:16', '127.0.0.1', '127.0.0.1'),
(13, 'momomom', 'mo@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', NULL, NULL, NULL, NULL, '2015-06-26 12:29:09', '2015-06-26 09:32:50', '2015-06-26 12:29:09', '127.0.0.1', '127.0.0.1'),
(14, 'sahron', 'shqwi@gmail.com', 'f46e32de9b62180acf532eddf273cc9aaadcb9f3', NULL, NULL, NULL, NULL, '2015-06-26 10:11:30', '2015-06-26 10:11:30', '2015-06-26 10:11:30', '127.0.0.1', '127.0.0.1'),
(15, 'regform', 'form@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', '5590d127ca33b.jpg', 'M', '1974-11-12', 'sharon faith sd  sdsd', '2015-06-29 07:00:26', '2015-06-26 11:33:42', '2015-06-29 01:01:27', '127.0.0.1', '127.0.0.1'),
(16, 'coffee', 'coffee@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', '558d2b2510bf7.png', 'M', '0000-00-00', 'sharon faith macasa', '2015-06-26 12:31:38', '2015-06-26 12:31:38', '2015-06-26 12:36:21', '127.0.0.1', '127.0.0.1'),
(17, 'thankyou', 'thank@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', '558d3532378a8.jpg', 'M', '2015-06-03', 'dfdfdfdfdfd', '2015-06-26 01:05:08', '2015-06-26 01:05:08', '2015-06-26 01:19:14', '127.0.0.1', '127.0.0.1'),
(18, 'the one ', 'theone@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', '558d389f9cdb8.jpg', 'M', '2015-06-03', 'sds ds sdsd sdsd', '2015-06-26 01:19:48', '2015-06-26 01:19:48', '2015-06-26 01:33:51', '127.0.0.1', '127.0.0.1'),
(19, 'samplesample', 'test2@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', '558d398900f0a.jpg', 'M', '2015-06-03', 'qsaww', '2015-06-26 01:37:19', '2015-06-26 01:37:19', '2015-06-26 01:37:45', '127.0.0.1', '127.0.0.1'),
(20, 'Shabert', 'shabert@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, NULL, NULL, NULL, '2015-06-26 01:41:12', '2015-06-26 01:41:12', '2015-06-26 01:41:12', '127.0.0.1', '127.0.0.1'),
(21, 'sharon fauth', 'formaddd@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', '5590ba86a6912.jpg', 'M', '2015-06-02', 'sdsdsd', '2015-06-29 04:31:29', '2015-06-29 04:31:29', '2015-06-29 06:35:49', '127.0.0.1', '127.0.0.1'),
(22, 'tissue', 'tissue@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', '5590d58f85b7f.jpg', 'F', '2015-06-10', 'sdsd sdsd sdsdsd sds', '2015-06-29 07:15:45', '2015-06-29 07:15:45', '2015-06-29 01:32:24', '127.0.0.1', '127.0.0.1'),
(23, 'sharona maca', 'sharon@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', NULL, NULL, NULL, NULL, '2015-06-29 08:31:16', '2015-06-29 08:31:16', '2015-06-29 08:31:16', '127.0.0.1', '127.0.0.1'),
(24, 'shasha ', 'iuiu@gmail.com', '8eccf540a3a8ff1851ce46f5ef00aa84b9908edf', '5590e6c398351.jpg', 'F', '2014-07-22', 'fgfgfgf', '2015-06-29 02:32:46', '2015-06-29 02:32:46', '2015-06-29 02:48:06', '127.0.0.1', '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
