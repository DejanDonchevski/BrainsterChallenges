-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 09:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_industry`
--

-- --------------------------------------------------------

--
-- Table structure for table `academy_award_winner`
--

CREATE TABLE `academy_award_winner` (
  `actorID` int(10) NOT NULL,
  `moviesID` int(10) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academy_award_winner`
--

INSERT INTO `academy_award_winner` (`actorID`, `moviesID`, `Role`, `Year`) VALUES
(1, 3, 'Jack Dawson', 1998),
(2, 1, 'Harry Potter', 2002),
(3, 2, 'Iron Man', 2013),
(8, 5, 'Han Solo', 1989),
(9, 4, 'Frodo Baggins', 2002);

-- --------------------------------------------------------

--
-- Table structure for table `acting`
--

CREATE TABLE `acting` (
  `actorID` int(10) NOT NULL,
  `filmID` int(10) NOT NULL,
  `feeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acting`
--

INSERT INTO `acting` (`actorID`, `filmID`, `feeID`) VALUES
(1, 3, 2),
(2, 1, 1),
(3, 2, 5),
(4, 10, 3),
(5, 7, 3),
(6, 8, 2),
(7, 9, 4),
(8, 5, 3),
(9, 4, 3),
(10, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `ID` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `agentID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`ID`, `name`, `surname`, `nickname`, `DateOfBirth`, `agentID`) VALUES
(1, 'Leonardo', 'DiCaprio', 'Leo', '1974-11-11', 2),
(2, 'Daniel', 'Radcliffe', 'Dan', '1989-07-23', 1),
(3, 'Robert', 'Downey Jr.', '', '1965-04-04', 3),
(4, 'Jeniffer', 'Aniston', 'Jen', '1969-02-11', 4),
(5, 'Emilia', 'Clarke', 'Emily', '1986-10-23', 5),
(6, 'Jim', 'Parson', 'Jim', '1973-03-24', 6),
(7, 'Wentworth', 'Miller', 'Wen', '1972-06-02', 7),
(8, 'Harrison', 'Ford', 'Harry', '1942-07-13', 8),
(9, 'Wood', 'Elijah', '', '1981-01-28', 5),
(10, 'Brown', 'Millie Bobby', '', '2004-02-19', 4);

-- --------------------------------------------------------

--
-- Table structure for table `actor_critics`
--

CREATE TABLE `actor_critics` (
  `actorID` int(10) NOT NULL,
  `criticID` int(10) NOT NULL,
  `acting` float NOT NULL COMMENT 'Rate from 1 to 10',
  `expression` float NOT NULL COMMENT 'Rate from 1 to 10',
  `naturalness` float NOT NULL COMMENT 'Rate from 1 to 10',
  `dedication` float NOT NULL COMMENT 'Rate from 1 to 10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actor_critics`
--

INSERT INTO `actor_critics` (`actorID`, `criticID`, `acting`, `expression`, `naturalness`, `dedication`) VALUES
(1, 1, 10, 10, 10, 10),
(1, 3, 10, 10, 10, 10),
(2, 5, 9.5, 10, 8.5, 9),
(2, 4, 9, 10, 8, 8.5),
(3, 2, 7.5, 8.5, 7, 9.5),
(3, 3, 8, 7.5, 8, 10),
(4, 1, 10, 10, 10, 10),
(5, 3, 5, 7.5, 6.5, 5),
(6, 5, 6, 5.5, 9, 10),
(7, 1, 5.5, 6.5, 7.5, 8.5),
(7, 2, 8.5, 6.5, 7.5, 9),
(8, 4, 10, 10, 10, 10),
(9, 2, 8.5, 9.5, 3.5, 10),
(10, 5, 9.5, 7, 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `critic`
--

CREATE TABLE `critic` (
  `ID` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `criticID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `critic`
--

INSERT INTO `critic` (`ID`, `Name`, `surname`, `password`, `criticID`) VALUES
(1, 'John', 'Doe', 'pass1', 1),
(2, 'Jane', 'Doe', 'pass2', 2),
(3, 'Dejan', 'Donchevski', 'pass3', 3),
(4, 'Maria', 'Gonzales', 'pass4', 4),
(5, 'Danny', 'Ocean', 'pass5', 5);

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `ID` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `expertise` varchar(20) NOT NULL,
  `genreID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`ID`, `name`, `surname`, `expertise`, `genreID`) VALUES
(1, 'Chris', 'Columbus', 'Creative Director', 6),
(2, 'Geoge', 'Lucas', 'Executive Director', 6),
(3, 'James', 'Cameron', 'Creative Director', 7),
(4, 'Peter ', 'Jackson', 'Director', 7),
(5, 'Joss', 'Whedon', 'Creative Director', 6);

-- --------------------------------------------------------

--
-- Table structure for table `directs`
--

CREATE TABLE `directs` (
  `movieID` int(10) NOT NULL,
  `directorID` int(10) NOT NULL,
  `feeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directs`
--

INSERT INTO `directs` (`movieID`, `directorID`, `feeID`) VALUES
(1, 1, 5),
(2, 5, 2),
(3, 3, 1),
(4, 4, 3),
(5, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `ID` int(10) NOT NULL,
  `fee` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`ID`, `fee`) VALUES
(1, 2598721),
(2, 23154),
(3, 5498721),
(4, 231358),
(5, 121454),
(6, 2158874);

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `ID` int(10) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `production` varchar(20) NOT NULL,
  `origin` varchar(20) NOT NULL,
  `DateOfPremiere` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`ID`, `Title`, `production`, `origin`, `DateOfPremiere`) VALUES
(1, 'Harry Potter', 'Warner Bros', 'UK', '2001-11-14'),
(2, 'Avengers', 'Marvel Studios', 'US', '2012-04-11'),
(3, 'Titanic', 'Paramount Pictures', 'US', '1997-11-01'),
(4, 'Lord of the Rings', 'New Line CInema', 'UK', '2001-12-10'),
(5, 'Star Wars', 'Lucasfilm', 'US', '1977-05-25'),
(6, 'Stranger Things', '21 Laps Entertainmes', 'US', '2016-07-15'),
(7, 'Game of Thrones', '20th Century Fox', 'UK', '2009-12-10'),
(8, 'The Big Bang Theory', 'Warner Bros', 'US', '2007-09-24'),
(9, 'Prison Break', 'Fox', 'US', '2005-08-29'),
(10, 'Friends', 'Warner Bros', 'US', '1994-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `film_critics`
--

CREATE TABLE `film_critics` (
  `filmID` int(10) NOT NULL,
  `criticID` int(10) NOT NULL,
  `rating` float NOT NULL COMMENT 'Rate from 1 to 10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film_critics`
--

INSERT INTO `film_critics` (`filmID`, `criticID`, `rating`) VALUES
(1, 1, 10),
(1, 3, 10),
(2, 2, 9),
(2, 3, 8.5),
(3, 4, 10),
(3, 5, 10),
(4, 4, 9),
(5, 4, 8.5),
(6, 2, 8.5),
(7, 1, 10),
(8, 3, 8.5),
(9, 3, 9),
(9, 4, 10),
(10, 5, 10),
(8, 3, 9.5);

-- --------------------------------------------------------

--
-- Table structure for table `film_genre`
--

CREATE TABLE `film_genre` (
  `filmID` int(10) NOT NULL,
  `genreID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film_genre`
--

INSERT INTO `film_genre` (`filmID`, `genreID`) VALUES
(1, 6),
(2, 6),
(3, 3),
(4, 6),
(5, 6),
(6, 6),
(7, 2),
(9, 4),
(0, 0),
(8, 7),
(10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `format`
--

CREATE TABLE `format` (
  `ID` int(10) NOT NULL,
  `format` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `format`
--

INSERT INTO `format` (`ID`, `format`) VALUES
(1, '2D'),
(2, '3D');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `ID` int(10) NOT NULL,
  `Genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`ID`, `Genre`) VALUES
(1, 'Horror'),
(2, 'Thriller'),
(3, 'Drama'),
(4, 'Action'),
(5, 'Romance'),
(6, 'Sci-Fi'),
(7, 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `ID` int(10) NOT NULL,
  `earnings` bigint(20) NOT NULL,
  `PlaceOfPremiere` varchar(32) DEFAULT NULL,
  `filmsID` int(10) NOT NULL,
  `sequel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`ID`, `earnings`, `PlaceOfPremiere`, `filmsID`, `sequel`) VALUES
(1, 1245572330, 'Leicester', 1, 6),
(2, 1519000000, 'Los Angeles', 2, 3),
(3, 2202000000, 'Tokyo', 3, 1),
(4, 897700000, 'Leicester', 4, 3),
(5, 775000000, 'US', 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `movies_format`
--

CREATE TABLE `movies_format` (
  `moviesID` int(10) NOT NULL,
  `formatID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies_format`
--

INSERT INTO `movies_format` (`moviesID`, `formatID`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 1),
(3, 1),
(4, 2),
(4, 1),
(5, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `ID` int(10) NOT NULL,
  `seasons` int(10) NOT NULL,
  `episodes` int(10) NOT NULL,
  `tv` varchar(20) NOT NULL,
  `filmsID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`ID`, `seasons`, `episodes`, `tv`, `filmsID`) VALUES
(1, 3, 25, 'Netflix', 6),
(2, 8, 73, 'HBO', 7),
(3, 12, 279, 'CBS', 8),
(4, 5, 90, 'Fox', 9),
(5, 10, 236, 'NBC', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `ID_2` (`ID`);

--
-- Indexes for table `critic`
--
ALTER TABLE `critic`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `directs`
--
ALTER TABLE `directs`
  ADD PRIMARY KEY (`movieID`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
