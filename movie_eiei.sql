-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2016 at 10:40 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_eiei`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `idGenre` int(20) NOT NULL,
  `genre` varchar(16) NOT NULL,
  `genreDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `idImage` int(16) NOT NULL DEFAULT '0',
  `idMovie` int(16) NOT NULL,
  `imageName` varchar(32) NOT NULL,
  `imageLink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `idMovie` int(20) NOT NULL,
  `movieName` varchar(64) NOT NULL,
  `dateRelease` date NOT NULL,
  `country` varchar(16) NOT NULL,
  `language` varchar(16) NOT NULL,
  `coverImage` text NOT NULL,
  `income` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `moviegenre`
--

CREATE TABLE `moviegenre` (
  `idMovieGenre` int(20) NOT NULL,
  `idGenre` int(20) NOT NULL,
  `idMovie` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `idPerson` int(20) NOT NULL DEFAULT '0',
  `name` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `birthDate` date NOT NULL,
  `mortal` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `personmovie`
--

CREATE TABLE `personmovie` (
  `idPersonMovie` int(16) NOT NULL,
  `idPerson` int(11) NOT NULL,
  `idMovie` int(11) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `idReview` int(20) NOT NULL,
  `detail` text NOT NULL,
  `rate` int(5) NOT NULL,
  `reviewDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reviewmovieuser`
--

CREATE TABLE `reviewmovieuser` (
  `idRemovieMovie` int(16) NOT NULL,
  `idReview` int(16) NOT NULL,
  `idMovie` int(16) NOT NULL,
  `idUser` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(20) NOT NULL DEFAULT '0',
  `idFacebook` int(20) NOT NULL,
  `name` int(20) NOT NULL,
  `lastName` int(20) NOT NULL,
  `email` varchar(32) NOT NULL,
  `userName` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(32) DEFAULT NULL,
  `created` datetime NOT NULL,
  `enabled` tinyint(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`idGenre`),
  ADD UNIQUE KEY `genre` (`genre`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idImage`),
  ADD UNIQUE KEY `imageName` (`imageName`),
  ADD UNIQUE KEY `idMovie` (`idMovie`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`idMovie`),
  ADD UNIQUE KEY `movieName` (`movieName`);

--
-- Indexes for table `moviegenre`
--
ALTER TABLE `moviegenre`
  ADD PRIMARY KEY (`idMovieGenre`),
  ADD UNIQUE KEY `idGenre` (`idGenre`),
  ADD UNIQUE KEY `idMovie` (`idMovie`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`idPerson`);

--
-- Indexes for table `personmovie`
--
ALTER TABLE `personmovie`
  ADD PRIMARY KEY (`idPersonMovie`),
  ADD UNIQUE KEY `idMovie` (`idMovie`),
  ADD UNIQUE KEY `idPerson` (`idPerson`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idReview`);

--
-- Indexes for table `reviewmovieuser`
--
ALTER TABLE `reviewmovieuser`
  ADD PRIMARY KEY (`idRemovieMovie`),
  ADD UNIQUE KEY `idReview` (`idReview`),
  ADD UNIQUE KEY `idMovie` (`idMovie`),
  ADD UNIQUE KEY `idUser` (`idUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `idFacebook` (`idFacebook`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`idMovie`) REFERENCES `movie` (`idMovie`);

--
-- Constraints for table `moviegenre`
--
ALTER TABLE `moviegenre`
  ADD CONSTRAINT `moviegenre_ibfk_1` FOREIGN KEY (`idMovie`) REFERENCES `movie` (`idMovie`),
  ADD CONSTRAINT `moviegenre_ibfk_2` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`idPerson`) REFERENCES `personmovie` (`idPerson`);

--
-- Constraints for table `personmovie`
--
ALTER TABLE `personmovie`
  ADD CONSTRAINT `personmovie_ibfk_1` FOREIGN KEY (`idMovie`) REFERENCES `movie` (`idMovie`);

--
-- Constraints for table `reviewmovieuser`
--
ALTER TABLE `reviewmovieuser`
  ADD CONSTRAINT `reviewmovieuser_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `reviewmovieuser_ibfk_2` FOREIGN KEY (`idReview`) REFERENCES `review` (`idReview`),
  ADD CONSTRAINT `reviewmovieuser_ibfk_3` FOREIGN KEY (`idMovie`) REFERENCES `movie` (`idMovie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
