-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2014 at 07:33 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

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
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `git` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `interests` text NOT NULL,
  `dp` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `firstname`, `lastname`, `email`, `dob`, `git`, `gender`, `dept`, `interests`, `dp`) VALUES
('a9409623', '529a6b923e382614ddda1e768428061465712a44', 'Hars', '', 'speaker280@gmail.com', '2014-06-02', 'https://github.com/h', 'other', 'cse', '', 'a9409623'),
('djsn', '75855ef57b2ab015b8a588d36e56b03d5fe2746c', 'Harsh', '', 'engine1995@gmail.com', '2014-06-02', 'https://github.com/h', 'female', 'cse', '', 'djsn'),
('harsh', '5613341379fe895390992fe34ec30c408126a971', 'Harsh', '', 'harveer19harsh01@gmail.com', '1995-09-19', 'https://github.com/Harsh50', 'male', 'cse', '', 'harsh10383040_686277854775319_4711931898740654811_n.jpg'),
('HARSH1', '440496c2a91c0ec3ddc0dfbe7b2a549362101335', 'Harsh', 'Si', 'harveer19harsh01@gmail.com', '1995-09-19', 'http://github.com/Harsh50', 'male', 'cse', '', 'HARSH1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
