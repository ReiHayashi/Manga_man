-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 10:02 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
(4, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(1, 2),
(2, 2),
(4, 2),
(1, 3),
(3, 3),
(8, 3),
(13, 3),
(1, 4),
(11, 4),
(13, 4),
(1, 5),
(4, 5),
(6, 5),
(8, 5),
(10, 5),
(9, 6),
(10, 6),
(13, 6),
(1, 7),
(4, 7),
(8, 7),
(9, 7),
(10, 7),
(11, 7);

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
(3, 1),
(1, 2),
(3, 2),
(6, 2),
(1, 3),
(2, 3),
(3, 3),
(5, 3),
(1, 4),
(2, 4),
(3, 4),
(5, 4),
(1, 5),
(2, 5),
(3, 5),
(5, 5),
(1, 6),
(3, 6),
(1, 7),
(2, 7),
(3, 7),
(6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `datesubmitted` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `username`, `content`, `datesubmitted`) VALUES
(1, 'Admin', '<p>nigger</p>', '2018-04-18 06:21:41'),
(2, '', '<p>nigger</p>\r\n<p>&nbsp;</p>', '2018-04-18 06:23:53'),
(3, '', '<p>nigger</p>', '2018-04-18 06:26:12'),
(4, 'Admin', '<p>nigger</p>', '2018-04-18 06:26:49'),
(5, 'Admin', '<p>nigger</p>', '2018-04-18 06:28:39'),
(6, 'Admin', '<p>nigger</p>', '2018-04-18 06:30:24'),
(7, 'Admin', '<p>nigger nigge rnigger</p>', '2018-04-18 06:43:16'),
(8, 'Admin', '<p>NIGGERS</p>', '2018-04-18 06:44:45'),
(9, 'Admin', '<p>NIGGER</p>', '2018-04-18 06:48:00'),
(10, 'Admin', '<p>nigger</p>', '2018-04-18 06:50:54'),
(11, 'Admin', '<p>nigger</p>', '2018-04-18 06:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews_in_volumes`
--

CREATE TABLE `reviews_in_volumes` (
  `review_id` int(11) NOT NULL,
  `volume_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews_in_volumes`
--

INSERT INTO `reviews_in_volumes` (`review_id`, `volume_id`) VALUES
(1, 112),
(6, 112),
(7, 112),
(8, 110),
(9, 105),
(10, 105),
(11, 105);

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `series_id` int(11) NOT NULL,
  `primaryname` varchar(44) CHARACTER SET utf8 NOT NULL,
  `author` varchar(44) CHARACTER SET utf8 NOT NULL,
  `synopsis` varchar(2000) CHARACTER SET utf8 NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`series_id`, `primaryname`, `author`, `synopsis`, `start_date`, `end_date`, `dateadded`) VALUES
(1, 'Tokyo Ghoul', 'Ishida Sui', '<p class=\"MsoNormal\">Lurking within the shadows of Tokyo are frightening beings known as \"ghouls,\" who satisfy their hunger by feeding on humans once night falls. An organization known as the Commission of Counter Ghoul (CCG) has been established in response to the constant attacks on citizens and as a means of purging these creatures. However, the problem lies in identifying ghouls as they disguise themselves as humans, living amongst the masses so that hunting prey will be easier. Ken Kaneki, an unsuspecting university freshman, finds himself caught in a world between humans and ghouls when his date turns out to be a ghoul after his flesh.</p>', '2011-09-08', '2014-09-18', '0000-00-00 00:00:00'),
(2, 'Vinland Saga', 'Yukimura Makoto', '<p>Thorfinn, son of one of the Vikings greatest warriors, is among the finest fighters in the merry band of mercenaries run by the cunning Askeladd, an impressive feat for a person his age. However, Thorfinn is not part of the group for the plunder it entails&mdash;instead, for having caused his family great tragedy, the boy has vowed to kill Askeladd in a fair duel. Not yet skilled enough to defeat him, but unable to abandon his vengeance, Thorfinn spends his boyhood with the mercenary crew, honing his skills on the battlefield among the war-loving Danes, where killing is just another pleasure of life.<br /><br />One day, when Askeladd receives word that Danish prince Canute has been taken hostage, he hatches an ambitious plot&mdash;one that will decide the next King of England and drastically alter the lives of Thorfinn, Canute, and himself. Set in 11th century Europe,&nbsp;Vinland Saga&nbsp;tells a bloody epic in an era where violence, madness, and injustice are inescapable, providing a paradise for the battle-crazed and utter hell for the rest who live in it.</p>', '2005-07-15', '0000-00-00', '0000-00-00 00:00:00'),
(3, 'One Punch man', 'ONE, Murata Yusuke ', 'After rigorously training for three years, the ordinary Saitama has gained immense strength which allows him to take out anyone and anything with just one punch. He decides to put his new skill to good use by becoming a hero. However, he quickly becomes bored with easily defeating monsters, and wants someone to give him a challenge to bring back the spark of being a hero.\r\n\r\nUpon bearing witness to Saitamas amazing power, Genos, a cyborg, is determined to become Saitamas apprentice. During this time, Saitama realizes he is neither getting the recognition that he deserves nor known by the people due to him not being a part of the Hero Association. Wanting to boost his reputation, Saitama decides to have Genos register with him, in exchange for taking him in as a pupil. Together, the two begin working their way up toward becoming true heroes, hoping to find strong enemies and earn respect in the process.', '2012-06-14', '0000-00-00', '0000-00-00 00:00:00'),
(4, 'All You Need Is Kill', 'Obata  Takeshi, Sakurazaka Hiroshi, Takeuchi', '<p class=\"MsoNormal\">Strange creatures known as \"Mimics\" have invaded Earth, sparking a global war that has humanity fighting for survival. In response, mankind forms the United Defense Force, a joint organization whose purpose is to overcome this new threat. Dedicated to the extermination of the growing Mimic menace, soldiers are plunged into battle, wearing special exoskeleton combat suits in an attempt to gain the upper hand against their foes.<br /><br />New recruit Keiji Kiriya is immediately killed after his very first deployment, but to his shock, he wakes up exactly one day before his unit was dropped into a Mimic invasion. After experiencing the same event yet again, he realizes that he is stuck in a time loop triggered by his death. As he relives the day of the battle hundreds of times, Keiji begins to make use of what he has learned about the phenomenon, gradually building up his strength and improving his skills so that eventually, when he comes face-to-face with death once more, he will be ready to change his fate.</p>', '2014-01-09', '2014-05-28', '0000-00-00 00:00:00'),
(5, 'Attack on Titan', 'Isayama Hajime', 'Hundreds of years ago, horrifying creatures which resembled humans appeared. These mindless, towering giants, called \"titans,\" proved to be an existential threat, as they preyed on whatever humans they could find in order to satisfy a seemingly unending appetite. Unable to effectively combat the titans, mankind was forced to barricade themselves within large walls surrounding what may very well be humanitys last safe haven in the world.\r\n\r\nIn the present day, life within the walls has finally found peace, since the residents have not dealt with titans for many years. Eren Yeager, Mikasa Ackerman, and Armin Arlert are three young children who dream of experiencing all that the world has to offer, having grown up hearing stories of the wonders beyond the walls. But when the state of tranquility is suddenly shattered by the attack of a massive 60-meter titan, they quickly learn just how cruel the world can be. On that day, Eren makes a promise to himself that he will do whatever it takes ', '2009-09-09', '0000-00-00', '0000-00-00 00:00:00'),
(6, 'The Promised Neverland', 'Demizu Posuka, Shirai Kaiu', '<p class=\"MsoNormal\">At Grace Field House, life couldnt be better for the orphans! Though they have no parents, together with the other kids and a kind \"Mama\" who cares for them, they form one big, happy family. No child is ever overlooked, especially since they are all adopted by the age of 12. Their daily lives involve rigorous tests, but afterwards, they are allowed to play outside.&nbsp;<br /><br />There is only one rule they must obey: do not leave the orphanage. But one day, two top-scoring orphans, Emma and Norman, venture past the gate and unearth the horrifying reality behind their entire existence: they are all livestock, and their orphanage is a farm to cultivate food for a mysterious race of demons. With only a few months left to pull off an escape plan, the children must somehow change their predetermined fate.</p>', '2016-08-01', '0000-00-00', '0000-00-00 00:00:00'),
(7, 'Tokyo Ghoul:re', 'Ishida Sui ', '<p style=\"text-align: justify;\">Two years have passed since the CCG\'s raid on Anteiku. Although the atmosphere in Tokyo has changed drastically due to the increased influence of the CCG, ghouls continue to pose a problem as they have begun taking caution, especially the terrorist organization Aogiri Tree, who acknowledge the CCG\'s growing threat to their existence.<br /><br />The creation of a special team, known as the Quinx Squad, may provide the CCG with the push they need to exterminate Tokyo\'s unwanted residents. As humans who have undergone surgery in order to make use of the special abilities of ghouls, they participate in operations to eradicate the dangerous creatures. The leader of this group, Haise Sasaki, is a half-ghoul, half-human who has been trained by famed special class investigator, Kishou Arima. However, there\'s more to this young man than meets the eye, as unknown memories claw at his mind, slowly reminding him of the person he used to be.</p>', '2014-10-16', '0000-00-00', '0000-00-00 00:00:00');

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
  `problem` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`support_id`, `firstname`, `lastname`, `email`, `problem_title`, `problem`, `date`, `username`) VALUES
(8, 'niggetr', 'nigger', 'nigger@niggernigger', 'nigger', 'nigger nigger nigger  ', '2018-04-18 06:01:21', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(48) CHARACTER SET utf8 NOT NULL,
  `email` varchar(48) CHARACTER SET utf8 NOT NULL,
  `password` varchar(48) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `usertype` int(2) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usertype`, `date_created`) VALUES
(1, 'Admin', 'admin@admin.admin', 'admin', 1, '0000-00-00 00:00:00'),
(12, 'timoke', 'timoke@gmail.com', '123456', 0, '0000-00-00 00:00:00'),
(13, 'test', 'test@test.test', 'test', 0, '2018-04-18 05:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `volumes`
--

CREATE TABLE `volumes` (
  `id` int(11) NOT NULL,
  `title` varchar(22) CHARACTER SET utf8 NOT NULL,
  `price` float NOT NULL,
  `image` mediumtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volumes`
--

INSERT INTO `volumes` (`id`, `title`, `price`, `image`) VALUES
(9, 'Vol 1', 9.99, 'Tokyo_Ghoul_Volume_01.jpg'),
(10, 'Vol 2', 9.99, 'Tokyo_Ghoul_Volume_02.jpg'),
(11, 'Vol 3', 8.99, 'Tokyo_Ghoul_Volume_03.jpg'),
(12, 'Vol 4', 8.99, 'Tokyo_Ghoul_Volume_04.jpg'),
(13, 'Vol 5', 9.99, 'Tokyo_Ghoul_Volume_05.jpg'),
(14, 'Vol 6', 9.99, 'Tokyo_Ghoul_Volume_06.jpg'),
(15, 'Vol 7', 9.99, 'Tokyo_Ghoul_Volume_07.jpg'),
(16, 'Vol 8', 9.99, 'Tokyo_Ghoul_Volume_08.jpg'),
(17, 'Vol 9', 7.99, 'Tokyo_Ghoul_Volume_09.jpg'),
(18, 'Vol 10', 8.99, 'Tokyo_Ghoul_Volume_10.jpg'),
(19, 'Vol 11', 9.99, 'Tokyo_Ghoul_Volume_11.jpg'),
(20, 'Vol 12', 9.99, 'Tokyo_Ghoul_Volume_12.jpg'),
(21, 'Vol 13', 9.99, 'Tokyo_Ghoul_Volume_13.jpg'),
(22, 'Vol 14', 9.99, 'Tokyo_Ghoul_Volume_14.jpg'),
(23, 'Vol 1', 8.99, 'Vinland_Saga_Volume_01.jpg'),
(24, 'Vol 2', 9.99, 'Vinland_Saga_Volume_02.jpg'),
(25, 'Vol 3', 9.99, 'Vinland_Saga_Volume_03.jpg'),
(26, 'Vol 4', 9.99, 'Vinland_Saga_Volume_04.jpg'),
(27, 'Vol 5', 7.99, 'Vinland_Saga_Volume_05.jpg'),
(28, 'Vol 6', 9.99, 'Vinland_Saga_Volume_06.jpg'),
(29, 'Vol 7', 7.99, 'Vinland_Saga_Volume_07.jpg'),
(30, 'Vol 8', 9.99, 'Vinland_Saga_Volume_08.jpg'),
(31, 'Vol 9', 9.99, 'Vinland_Saga_Volume_09.jpg'),
(32, 'Vol 10', 8.99, 'Vinland_Saga_Volume_10.jpg'),
(33, 'Vol 11', 9.99, 'Vinland_Saga_Volume_11.jpg'),
(34, 'Vol 12', 9.99, 'Vinland_Saga_Volume_12.jpg'),
(35, 'Vol 13', 8.99, 'Vinland_Saga_Volume_13.jpg'),
(36, 'Vol 14', 9.99, 'Vinland_Saga_Volume_14.jpg'),
(37, 'Vol 15', 7.99, 'Vinland_Saga_Volume_15.jpg'),
(38, 'Vol 16', 7.99, 'Vinland_Saga_Volume_16.jpg'),
(39, 'Vol 17', 8.99, 'Vinland_Saga_Volume_17.jpg'),
(40, 'Vol 18', 7.99, 'Vinland_Saga_Volume_18.jpg'),
(41, 'Vol 19', 9.99, 'Vinland_Saga_Volume_19.jpg'),
(42, 'Vol 20', 9.99, 'Vinland_Saga_Volume_20.jpg'),
(43, 'Vol 1', 9.99, 'One_Punch_Man_Volume_01.png'),
(44, 'Vol 2', 8.99, 'One_Punch_Man_Volume_02.png'),
(45, 'Vol 3', 8.99, 'One_Punch_Man_Volume_03.jpg'),
(46, 'Vol 4', 9.99, 'One_Punch_Man_Volume_04.png'),
(47, 'Vol 5', 7.99, 'One_Punch_Man_Volume_05.png'),
(48, 'Vol 6', 8.99, 'One_Punch_Man_Volume_06.jpg'),
(49, 'Vol 7', 9.99, 'One_Punch_Man_Volume_07.jpg'),
(50, 'Vol 8', 7.99, 'One_Punch_Man_Volume_08.png'),
(51, 'Vol 9', 8.99, 'One_Punch_Man_Volume_09.jpg'),
(52, 'Vol 10', 9.99, 'One_Punch_Man_Volume_10.jpg'),
(53, 'Vol 11', 8.99, 'One_Punch_Man_Volume_11.jpg'),
(54, 'Vol 12', 9.99, 'One_Punch_Man_Volume_12.png'),
(55, 'Vol 13', 9.99, 'One_Punch_Man_Volume_13.jpg'),
(56, 'Vol 14', 9.99, 'One_Punch_Man_Volume_14.jpg'),
(57, 'Vol 15', 8.99, 'One_Punch_Man_Volume_15.jpg'),
(58, 'Vol 16', 8.99, 'One_Punch_Man_Volume_16.jpg'),
(59, 'Vol 1', 8.99, 'All_You_Need_Is_Kill_Volume_01.jpg'),
(60, 'Vol 2', 8.99, 'All_You_Need_Is_Kill_Volume_02.jpg'),
(65, 'Vol 1', 7.99, 'The_Promised_Neverland_Volume_01.jpg'),
(66, 'Vol 2', 9.99, 'The_Promised_Neverland_Volume_02.jpg'),
(67, 'Vol 3', 9.99, 'The_Promised_Neverland_Volume_03.jpg'),
(68, 'Vol 4', 9.99, 'The_Promised_Neverland_Volume_04.jpg'),
(69, 'Vol 5', 9.99, 'The_Promised_Neverland_Volume_05.jpg'),
(70, 'Vol 6', 9.99, 'The_Promised_Neverland_Volume_06.jpg'),
(71, 'Vol 7', 9.99, 'The_Promised_Neverland_Volume_07.jpg'),
(72, 'Vol 8', 9.99, 'The_Promised_Neverland_Volume_08.jpg'),
(73, 'Vol 1', 8.99, 'Attack_On_Titan_Volume_01.png'),
(74, 'Vol 2', 8.99, 'Attack_On_Titan_Volume_02.png'),
(75, 'Vol 3', 9.99, 'Attack_On_Titan_Volume_03.png'),
(76, 'Vol 4', 8.99, 'Attack_On_Titan_Volume_04.png'),
(77, 'Vol 5', 8.99, 'Attack_On_Titan_Volume_05.png'),
(78, 'Vol 6', 8.99, 'Attack_On_Titan_Volume_06.png'),
(79, 'Vol 7', 9.99, 'Attack_On_Titan_Volume_07.png'),
(80, 'Vol 8', 9.99, 'Attack_On_Titan_Volume_08.png'),
(81, 'Vol 9', 9.99, 'Attack_On_Titan_Volume_09.png'),
(82, 'Vol 10', 8.99, 'Attack_On_Titan_Volume_10.png'),
(83, 'Vol 11', 8.99, 'Attack_On_Titan_Volume_11.png'),
(84, 'Vol 12', 9.99, 'Attack_On_Titan_Volume_12.png'),
(85, 'Vol 13', 9.99, 'Attack_On_Titan_Volume_13.png'),
(86, 'Vol 14', 9.99, 'Attack_On_Titan_Volume_14.png'),
(87, 'Vol 15', 8.99, 'Attack_On_Titan_Volume_15.png'),
(88, 'Vol 16', 7.99, 'Attack_On_Titan_Volume_16.png'),
(89, 'Vol 17', 9.99, 'Attack_On_Titan_Volume_17.png'),
(90, 'Vol 18', 9.99, 'Attack_On_Titan_Volume_18.png'),
(91, 'Vol 19', 9.99, 'Attack_On_Titan_Volume_19.png'),
(92, 'Vol 20', 7.99, 'Attack_On_Titan_Volume_20.png'),
(93, 'Vol 21', 8.99, 'Attack_On_Titan_Volume_21.png'),
(94, 'Vol 22', 9.99, 'Attack_On_Titan_Volume_22.png'),
(95, 'Vol 23', 8.99, 'Attack_On_Titan_Volume_23.png'),
(96, 'Vol 24', 9.99, 'Attack_On_Titan_Volume_24.png'),
(97, 'Vol 25', 9.99, 'Attack_On_Titan_Volume_25.png'),
(98, 'Vol 1', 8.99, 'Tokyo_Ghoul_re_Volume_01.png'),
(99, 'Vol 2', 9.99, 'Tokyo_Ghoul_re_Volume_02.png'),
(100, 'Vol 3', 9.99, 'Tokyo_Ghoul_re_Volume_03.png'),
(101, 'Vol 4', 8.99, 'Tokyo_Ghoul_re_Volume_04.png'),
(102, 'Vol 5', 9.99, 'Tokyo_Ghoul_re_Volume_05.png'),
(103, 'Vol 6', 9.99, 'Tokyo_Ghoul_re_Volume_06.png'),
(104, 'Vol 7', 9.99, 'Tokyo_Ghoul_re_Volume_07.png'),
(105, 'Vol 8', 9.99, 'Tokyo_Ghoul_re_Volume_08.png'),
(106, 'Vol 9', 9.99, 'Tokyo_Ghoul_re_Volume_09.png'),
(107, 'Vol 10', 8.99, 'Tokyo_Ghoul_re_Volume_10.png'),
(108, 'Vol 11', 9.99, 'Tokyo_Ghoul_re_Volume_11.png'),
(109, 'Vol 12', 8.99, 'Tokyo_Ghoul_re_Volume_12.png'),
(110, 'Vol 13', 9.99, 'Tokyo_Ghoul_re_Volume_13.png'),
(111, 'Vol 14', 8.99, 'Tokyo_Ghoul_re_Volume_14.png'),
(112, 'Vol 15', 8.99, 'Tokyo_Ghoul_re_Volume_15.png');

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
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(3, 43),
(3, 44),
(3, 45),
(3, 46),
(3, 47),
(3, 48),
(3, 49),
(3, 50),
(3, 51),
(3, 52),
(3, 53),
(3, 54),
(3, 55),
(3, 56),
(3, 57),
(3, 58),
(4, 59),
(4, 60),
(6, 65),
(6, 66),
(6, 67),
(6, 68),
(6, 69),
(6, 70),
(6, 71),
(6, 72),
(5, 73),
(5, 74),
(5, 75),
(5, 76),
(5, 77),
(5, 78),
(5, 79),
(5, 80),
(5, 81),
(5, 82),
(5, 83),
(5, 84),
(5, 85),
(5, 86),
(5, 87),
(5, 88),
(5, 89),
(5, 90),
(5, 91),
(5, 92),
(5, 93),
(5, 94),
(5, 95),
(5, 96),
(5, 97),
(7, 98),
(7, 99),
(7, 100),
(7, 101),
(7, 102),
(7, 103),
(7, 104),
(7, 105),
(7, 106),
(7, 107),
(7, 108),
(7, 109),
(7, 110),
(7, 111),
(7, 112);

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
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews_in_volumes`
--
ALTER TABLE `reviews_in_volumes`
  ADD KEY `review_id` (`review_id`),
  ADD KEY `volume_id` (`volume_id`);

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
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `series_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `volumes`
--
ALTER TABLE `volumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

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
-- Constraints for table `reviews_in_volumes`
--
ALTER TABLE `reviews_in_volumes`
  ADD CONSTRAINT `reviews_in_volumes_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `review` (`id`),
  ADD CONSTRAINT `reviews_in_volumes_ibfk_2` FOREIGN KEY (`volume_id`) REFERENCES `volumes` (`id`);

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
