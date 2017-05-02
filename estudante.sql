-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2017 at 07:41 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estudante`
--
CREATE DATABASE IF NOT EXISTS `estudante`
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci;
USE `estudante`;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE IF NOT EXISTS `semester` (
  `sem_name`   INT(11) NOT NULL,
  `paper`      INT(11) NOT NULL,
  `no_classes` INT(11) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_name`, `paper`, `no_classes`) VALUES
  (1, 101, 0),
  (1, 102, 0),
  (1, 103, 0),
  (1, 104, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sem_student`
--

DROP TABLE IF EXISTS `sem_student`;
CREATE TABLE IF NOT EXISTS `sem_student` (
  `std_name`     TEXT        NOT NULL,
  `semester`     INT(11)     NOT NULL,
  `present_days` TEXT,
  `phone`        VARCHAR(10) NOT NULL,
  `email`        TEXT
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `sem_student`
--

INSERT INTO `sem_student` (`std_name`, `semester`, `present_days`, `phone`, `email`) VALUES
  ('ramesh ', 2, '0,0,0,0', '9706927523', 'dbishwabikash@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uname`      TINYTEXT NOT NULL,
  `fullname`   TINYTEXT NOT NULL,
  `privilege`  INT(11)  NOT NULL DEFAULT '0',
  `last_login` DATETIME NOT NULL,
  `uid`        INT(11)  NOT NULL,
  `pass`       TEXT     NOT NULL,
  `email`      TEXT     NOT NULL
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uname`, `fullname`, `privilege`, `last_login`, `uid`, `pass`, `email`) VALUES
  ('dbishwabikash', 'Bishwabikash Das', 1, '0000-00-00 00:00:00', 1,
   '$2a$10$nobiPdEiRugGEkOqGWeHNeGpoLlpT9he8oNhDw.uW0ogZ5b/efaw.', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `uid` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 2;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
