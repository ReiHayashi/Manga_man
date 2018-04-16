-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 08:29 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mangaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Comdey'),
(4, 'Drama'),
(5, 'Slice of Life'),
(6, 'Fantasy'),
(7, 'Magic'),
(8, 'Supernatural'),
(9, 'Horror'),
(10, 'Mystery'),
(11, 'Psychological'),
(12, 'Romance'),
(13, 'Sci-Fi');

-- --------------------------------------------------------

--
-- Table structure for table `genres_in_series`
--

CREATE TABLE `genres_in_series` (
  `genre_id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres_in_series`
--

INSERT INTO `genres_in_series` (`genre_id`, `series_id`) VALUES
(1, 5),
(4, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`) VALUES
(1, 'English'),
(2, 'Russian'),
(3, 'Japanese'),
(4, 'Spanish'),
(5, 'Italian'),
(6, 'French');

-- --------------------------------------------------------

--
-- Table structure for table `languages_in_series`
--

CREATE TABLE `languages_in_series` (
  `language_id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages_in_series`
--

INSERT INTO `languages_in_series` (`language_id`, `series_id`) VALUES
(1, 5),
(2, 5),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `series_id` int(11) NOT NULL,
  `primaryname` varchar(44) CHARACTER SET utf8 NOT NULL,
  `author` varchar(44) CHARACTER SET utf8 NOT NULL,
  `synopsis` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`series_id`, `primaryname`, `author`, `synopsis`, `start_date`, `end_date`) VALUES
(5, 'Tokyo Ghoul', 'Ishida Sui', 'Lurking within the shadows of Tokyo are frightening beings known as \"ghouls,\" who satisfy their hunger by feeding on humans once night falls. An organization known as the Commission of Counter Ghoul (CCG) has been established in response to the constant attacks on citizens and as a means of purging these creatures. However, the problem lies in identifying ghouls as they disguise themselves as humans, living amongst the masses so that hunting prey will be easier. Ken Kaneki, an unsuspecting university freshman, finds himself caught in a world between humans and ghouls when his date turns out to be a ghoul after his flesh.\r\n\r\nBarely surviving this encounter after being taken to a hospital, he discovers that he has turned into a half-ghoul as a result of the surgery he received. Unable to satisfy his intense craving for human meat through conventional means, Kaneki is taken in by friendly ghouls who run a coffee shop in order to help him with his transition. As he begins what he thinks wi', '2011-09-08', '2014-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `support_id` int(11) NOT NULL,
  `firstname` varchar(42) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(42) CHARACTER SET utf8 NOT NULL,
  `email` varchar(42) CHARACTER SET utf8 NOT NULL,
  `problem_title` varchar(128) CHARACTER SET utf8 NOT NULL,
  `problem` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`support_id`, `firstname`, `lastname`, `email`, `problem_title`, `problem`) VALUES
(5, 'a', 'a', 'aa@a.a', 'a', ' aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(48) CHARACTER SET utf8 NOT NULL,
  `email` varchar(48) CHARACTER SET utf8 NOT NULL,
  `password` varchar(48) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `usertype` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usertype`) VALUES
(1, 'Admin', 'admin@admin.admin', 'admin', 1),
(10, 'regular', 'regular@example.nigger', '321', 0),
(11, 'niggers', 'nigger@hater.nigger', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `volumes`
--

CREATE TABLE `volumes` (
  `id` int(11) NOT NULL,
  `title` varchar(22) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `image` mediumtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volumes`
--

INSERT INTO `volumes` (`id`, `title`, `price`, `image`) VALUES
(6, 'berserk goes ham lmao', 34214, 'drummerdidthisinpaint.png'),
(7, 'asd', 0, 'HELPPPP.jpg'),
(8, 'Vol 1', 10, 'Tokyo_Ghoul_Volume_01.jpg'),
(9, 'Vol 2', 10, 'Tokyo_Ghoul_Volume_02.jpg'),
(10, 'Vol 3', 10, 'Tokyo_Ghoul_Volume_03.jpg'),
(11, 'Vol 4', 10, 'Tokyo_Ghoul_Volume_04.jpg'),
(12, 'Vol 5', 10, 'Tokyo_Ghoul_Volume_05.jpg'),
(13, 'Vol 6', 10, 'Tokyo_Ghoul_Volume_06.jpg'),
(14, 'Vol 7', 10, 'Tokyo_Ghoul_Volume_07.jpg'),
(15, 'Vol 8', 10, 'Tokyo_Ghoul_Volume_08.jpg'),
(16, 'Vol 9', 10, 'Tokyo_Ghoul_Volume_09.jpg'),
(17, 'Vol 9', 10, 'Tokyo_Ghoul_Volume_09.jpg'),
(18, 'Vol 10', 10, 'Tokyo_Ghoul_Volume_10.jpg'),
(19, 'Vol 11', 10, 'Tokyo_Ghoul_Volume_11.jpg'),
(20, 'Vol 12', 10, 'Tokyo_Ghoul_Volume_12.jpg'),
(21, 'Vol 13', 10, 'Tokyo_Ghoul_Volume_13.jpg'),
(22, 'Vol 14', 10, 'Tokyo_Ghoul_Volume_14.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `volumes_in_series`
--

CREATE TABLE `volumes_in_series` (
  `series_id` int(11) NOT NULL,
  `volume_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volumes_in_series`
--

INSERT INTO `volumes_in_series` (`series_id`, `volume_id`) VALUES
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(5, 15),
(5, 16),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(5, 21),
(5, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres_in_series`
--
ALTER TABLE `genres_in_series`
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `series_id` (`series_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages_in_series`
--
ALTER TABLE `languages_in_series`
  ADD KEY `language_id` (`language_id`),
  ADD KEY `series_id` (`series_id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`series_id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`support_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volumes`
--
ALTER TABLE `volumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volumes_in_series`
--
ALTER TABLE `volumes_in_series`
  ADD KEY `series_id` (`series_id`),
  ADD KEY `volume_id` (`volume_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `series_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `volumes`
--
ALTER TABLE `volumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `genres_in_series`
--
ALTER TABLE `genres_in_series`
  ADD CONSTRAINT `genres_in_series_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `genres_in_series_ibfk_2` FOREIGN KEY (`series_id`) REFERENCES `series` (`series_id`);

--
-- Constraints for table `languages_in_series`
--
ALTER TABLE `languages_in_series`
  ADD CONSTRAINT `languages_in_series_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `languages_in_series_ibfk_2` FOREIGN KEY (`series_id`) REFERENCES `series` (`series_id`);

--
-- Constraints for table `volumes_in_series`
--
ALTER TABLE `volumes_in_series`
  ADD CONSTRAINT `volumes_in_series_ibfk_1` FOREIGN KEY (`series_id`) REFERENCES `series` (`series_id`),
  ADD CONSTRAINT `volumes_in_series_ibfk_2` FOREIGN KEY (`volume_id`) REFERENCES `volumes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
