-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2018 at 11:56 PM
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
-- Table structure for table `manga`
--

CREATE TABLE `manga` (
  `manga_id` int(11) NOT NULL,
  `manga_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `manga_creator` varchar(500) CHARACTER SET utf8 NOT NULL,
  `manga_date` date NOT NULL,
  `manga_description` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `manga_price` varchar(11) CHARACTER SET utf8 NOT NULL,
  `image` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manga`
--

INSERT INTO `manga` (`manga_id`, `manga_name`, `manga_creator`, `manga_date`, `manga_description`, `manga_price`, `image`) VALUES
(5, 'asdf', 'asdgf', '2222-02-22', 'asdgh', '123', 'avatar-166169.jpg');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`manga_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manga`
--
ALTER TABLE `manga`
  MODIFY `manga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
