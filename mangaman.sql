-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2018 at 11:34 PM
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
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(2, 2),
(3, 2);

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
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 2);

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
(1, 'asdgf', 'asdf', 'asdg', '0000-00-00', '0000-00-00'),
(2, 's', 'asdfgf', '', '2018-04-14', '2018-04-21');

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
(9, 'asd', 'asd@asd.asd', 'asd', 0),
(10, 'regular', 'regular@example.nigger', '321', 0),
(11, 'nigger', 'nigger@hater.nigger', 'nigger', 0);

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
(1, 'aaa', 55, 'aaaaaaaaaa.jpg'),
(2, 'asd', 33, 'help.png'),
(3, 'asdf', 0, '1506937883905.jpg'),
(4, 'asdf', 23, '1501865455585.png'),
(5, 'asdf', 33, 'DOnzzVIXkAAkhKe.png');

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
(1, 4),
(1, 5);

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
  MODIFY `series_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
