-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `login` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `login`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `role`, `reg_date`, `last_login`) VALUES
(1,	'admin@localhost.hu',	'0cc175b9c0f1b6a831c399e269772661',	'System',	'Administrator',	1,	'2020-09-19 11:11:58',	'2020-09-19 11:10:07'),
(2,	'a@a',	'0cc175b9c0f1b6a831c399e269772661',	'Alma',	'Antal',	1,	'2020-09-19 11:11:58',	'2020-12-29 17:56:12');
