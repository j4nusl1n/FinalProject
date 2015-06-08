-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2014 at 09:52 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_0016201`
--

-- --------------------------------------------------------

--
-- Table structure for table `anounceboard`
--

CREATE TABLE IF NOT EXISTS `anounceboard` (
  `aid` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  `unread` int(11) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE IF NOT EXISTS `household` (
  `hid` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `size` double NOT NULL,
  `city` varchar(10) NOT NULL,
  `headid` varchar(15) NOT NULL,
  PRIMARY KEY (`hid`),
  UNIQUE KEY `address` (`address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `household`
--

INSERT INTO `household` (`hid`, `address`, `size`, `city`, `headid`) VALUES
('F1', '1001 University Rd.', 39.52, 'Hsinchu', '01'),
('F2', '222 King St.', 22.17, 'Taipei', '04'),
('F3', '138-2 Mingcheng Rd.', 76.42, 'Tainan', '06');

-- --------------------------------------------------------

--
-- Table structure for table `houselatlng`
--

CREATE TABLE IF NOT EXISTS `houselatlng` (
  `hid` varchar(15) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `houselatlng`
--

INSERT INTO `houselatlng` (`hid`, `latitude`, `longitude`) VALUES
('F1', 24.8039455, 120.9646866),
('F2', 25.091075, 121.5598345),
('F3', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `msgboard`
--

CREATE TABLE IF NOT EXISTS `msgboard` (
  `mid` int(32) NOT NULL DEFAULT '0',
  `sid` int(11) NOT NULL,
  `srcname` text NOT NULL,
  `did` int(11) NOT NULL,
  `dstname` text NOT NULL,
  `content` text NOT NULL,
  `unread` int(11) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`mid`),
  UNIQUE KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `msgboard`
--

INSERT INTO `msgboard` (`mid`, `sid`, `srcname`, `did`, `dstname`, `content`, `unread`, `time`) VALUES
(2, 2, 'kevin', 1, 'john', 'hello', 0, '2014-06-19 16:50:47'),
(3, 1, 'john', 2, 'kevin', 'fuck you', 0, '2014-06-19 17:15:55'),
(5, 1, 'john', 2, 'kevin', 'test test\r\n123', 1, '2014-06-20 23:16:25'),
(6, 2, 'kevin', 1, 'john', 'test', 1, '2014-06-22 19:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE IF NOT EXISTS `personal_info` (
  `uid` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sex` enum('M','F') NOT NULL,
  `birthday` date NOT NULL,
  `hid` varchar(15) NOT NULL,
  `modtime` datetime NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`uid`, `name`, `sex`, `birthday`, `hid`, `modtime`) VALUES
('01', 'johnson', 'M', '1991-01-01', 'F1', '2014-01-17 09:53:07'),
('02', 'KevinGarnnet', 'M', '1992-03-05', 'F1', '2014-01-17 10:20:12'),
('03', 'kkbox', 'F', '1993-05-01', 'F1', '2014-01-17 10:22:05'),
('04', 'KobeBrian', 'M', '1991-12-12', 'F2', '2014-03-17 09:14:51'),
('05', 'LeBronJames', 'M', '1995-07-02', 'F2', '2014-03-18 13:19:20'),
('06', 'Mary', 'F', '1989-11-02', 'F3', '2014-02-10 15:27:22'),
('07', 'moriarty', 'M', '2014-06-21', 'F3', '2014-06-21 16:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `pmod_history`
--

CREATE TABLE IF NOT EXISTS `pmod_history` (
  `historyid` int(15) NOT NULL DEFAULT '0',
  `uid` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sex` enum('M','F') NOT NULL,
  `birthday` date NOT NULL,
  `hid` varchar(15) NOT NULL,
  `ishead` tinyint(1) NOT NULL,
  `modtime` datetime NOT NULL,
  PRIMARY KEY (`historyid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pmod_history`
--

INSERT INTO `pmod_history` (`historyid`, `uid`, `name`, `sex`, `birthday`, `hid`, `ishead`, `modtime`) VALUES
(1, '01', 'johnson', 'M', '1991-01-01', 'F1', 1, '2014-01-17 09:53:07'),
(2, '02', 'KevinGarnnet', 'M', '1992-03-05', 'F1', 0, '2014-01-17 10:20:12'),
(3, '03', 'kkbox', 'F', '1993-05-01', 'F1', 0, '2014-01-17 10:22:05'),
(4, '06', 'Mary', 'F', '1989-11-02', 'F3', 1, '2014-02-10 15:27:22'),
(5, '05', 'LeBronJames', 'M', '1995-07-02', 'F3', 0, '2014-02-20 09:23:00'),
(6, '04', 'KobeBrian', 'M', '1991-12-12', 'F2', 1, '2014-03-17 09:14:51'),
(7, '05', 'LeBronJames', 'M', '1995-07-02', 'F2', 0, '2014-03-18 13:19:20'),
(8, '07', 'moriarty', 'M', '2014-06-21', 'F3', 0, '2014-06-21 16:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(15) NOT NULL,
  `password` char(32) NOT NULL,
  `uid` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`username`,`uid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `uid`, `email`, `isadmin`) VALUES
('john', '527bd5b5d689e2c32ae974c6229ff785', '01', 'john@gmail.com', 1),
('kevin', '9d5e3ecdeb4cdb7acfd63075ae046672', '02', 'kevin_cool@yahoo.com', 0),
('kkbox', '870cd34387781acbb5e3c82097dead41', '03', 'kkbox@gmail.com', 0),
('kobe', '2357e8fb9945f0a2039a7093422a3dee', '04', 'kobe@yahoo.com', 0),
('LBJ', 'a3aac5097340a9aa8c27278a39971223', '05', 'LBJ23@hotmail.com', 0),
('marry', '44d7231696044319858dc2c9a498f0da', '06', 'marry@gmail.com', 0),
('test', '912ec803b2ce49e4a541068d495ab570', '07', 'aaa@bbb.com', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
