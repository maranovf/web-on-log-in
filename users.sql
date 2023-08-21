-- Adminer 4.8.1 MySQL 5.1.72-community dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `jmeno` varchar(40) NOT NULL,
  `heslo` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- 2023-08-21 01:23:12
