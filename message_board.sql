-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2015 at 11:14 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `message_board`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_message`(IN `_from_id` INT, IN `_to_id` INT, IN `_content` VARCHAR(999), IN `_created` DATETIME, IN `_modified` DATETIME)
    NO SQL
Insert into `messages` (`from_id`,`to_id`,`content`,`created`,`modified`)
values(_from_id,_to_id,_content,_created,_modified)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_user`(IN `_name` VARCHAR(300), IN `_email` VARCHAR(300), IN `_password` VARCHAR(300), IN `_created` DATETIME, IN `_modified` DATETIME)
    NO SQL
Insert into `users` (`name`,`email`,`password`,`created`,`modified`)
values(_name,_email,_password,_created,_modified)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_message`(IN `_id` INT)
    NO SQL
Delete from `messages` where `id` = _id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_fetch_messages`(IN `_id` INT, IN `_from` INT, IN `_limit` INT)
    NO SQL
Select * from `messages` where `from_id` = _id or `to_id` = _id order by `created` desc limit _from,_limit$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_user`(IN `_id` INT)
    NO SQL
Select * from `users` where `id` = _id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_login`(IN `_email` VARCHAR(300), IN `_password` VARCHAR(300))
    NO SQL
Select * from `users` where `email` = _email and `password` = _password$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_search_users`(IN `_name` VARCHAR(300), IN `_from` INT)
    NO SQL
Select * from `users` where `name` LIKE concat('%',_name,'%') order by `name` ASC limit _from,10$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_userinfo`(IN `_id` INT, IN `_name` VARCHAR(300), IN `_birthdate` VARCHAR(300), IN `_gender` CHAR(1), IN `_hubby` VARCHAR(999))
    NO SQL
Update `users` set `name` = _name, `birthdate` = _birthdate, `gender` = _gender, `hubby` = _hubby where `id` = _id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `gender` char(1) NOT NULL,
  `birthdate` varchar(300) NOT NULL,
  `hubby` varchar(300) NOT NULL,
  `last_login_time` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_ip` varchar(300) NOT NULL,
  `modified_ip` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `gender`, `birthdate`, `hubby`, `last_login_time`, `created`, `modified`, `created_ip`, `modified_ip`) VALUES
(2, 'John Mart Belamide', 'belamide09@gmail.com', 'A1nm/JG7sBxi6', 'belamide09@gmail.com.png', 'M', '06/23/2015', 'Playing Computer games.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-04-22 10:43:02', '', '127.0.0.1'),
(3, 'John Mart Belamide', 'johnmart_belamide@yahoo.com', 'A1iVNbMj5X5Do', '', 'M', '06/04/1992', 'Wring quote.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-04-22 10:53:28', '', '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
