-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 02:34 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `exam_category`
--

CREATE TABLE `exam_category` (
  `id` int(5) NOT NULL,
  `category` varchar(100) NOT NULL,
  `exam_time_in_minutes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_category`
--

INSERT INTO `exam_category` (`id`, `category`, `exam_time_in_minutes`) VALUES
(1, 'GEOGRAFIJA', '12'),
(2, 'MUZIKA', '12'),
(7, 'SPORT', '12'),
(8, 'ISTORIJA', '15'),
(9, 'KNJIŽEVNOST', '20'),
(10, 'FILM', '20'),
(11, 'ASTRONOMIJA', '25');

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `exam_type` varchar(100) NOT NULL,
  `total_question` varchar(10) NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `wrong_answer` varchar(10) NOT NULL,
  `exam_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`id`, `username`, `exam_type`, `total_question`, `correct_answer`, `wrong_answer`, `exam_time`) VALUES
(19, 'Korisnik111!', 'Geografija', '6', '2', '4', '2019-11-28 12:24:06'),
(20, 'Korisnik111!', 'Geografija', '6', '6', '0', '2019-11-28 12:39:45'),
(21, 'Korisnik111!', 'Muzika', '6', '4', '2', '2019-11-28 12:40:24'),
(22, 'Korisnik111!', 'Istorija', '6', '0', '6', '2019-11-28 12:57:50'),
(23, 'Korisnik111!', 'Geografija', '6', '4', '2', '2019-11-28 14:31:41'),
(24, 'Korisnik111!', 'Istorija', '6', '6', '0', '2019-11-28 17:15:23'),
(25, 'Korisnik111!', 'Sport', '6', '4', '2', '2019-11-28 18:06:20'),
(26, 'Korisnik111!', 'Geografija', '6', '0', '6', '2019-11-28 21:18:58'),
(27, 'Korisnik111!', 'Geografija', '6', '0', '6', '2019-11-28 21:38:47'),
(28, 'Korisnik111!', 'Geografija', '6', '0', '6', '2019-11-28 22:03:48'),
(29, 'Korisnik111!', 'Geografija', '6', '3', '3', '2019-11-28 22:04:29'),
(42, 'Korisnik111!', 'MUZIKA', '6', '4', '2', '2019-11-29 02:02:45'),
(43, 'Korisnik111!', 'ASTRONOMIJA', '0', '0', '0', '2019-11-29 02:03:12'),
(44, 'Korisnik111!', 'FILM', '0', '0', '0', '2019-11-29 02:03:22'),
(45, 'Korisnik111!', 'KNJIŽEVNOST', '0', '0', '0', '2019-11-29 02:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(5) NOT NULL,
  `question_no` varchar(5) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(100) NOT NULL,
  `opt2` varchar(100) NOT NULL,
  `opt3` varchar(100) NOT NULL,
  `opt4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `category`) VALUES
(100, '1', 'Kako se zove najsuvlja pustinja na svetu?', 'Atakama', 'Sahara', 'Mohave', 'Gobi', 'Atakama', 'Geografija'),
(101, '2', 'Najveći vodopadi na svetu su \"Anđeoski vodopadi. Oni se nalaze u:', 'Boliviji', 'Brazilu', 'Venecueli', 'Argentini', 'Venecueli', 'Geografija'),
(102, '3', 'Jedna država ima neverovatnu stopu pismenosti od 99,8. Koja?', 'SAD', 'Kuba', 'Francuska', 'Švajcarska', 'Kuba', 'Geografija'),
(103, '4', 'Kroz koji grad ne protiče reka Dunav?', 'Beč', 'Budimpešta', 'Beograd', 'Bukurešt', 'Bukurešt', 'Geografija'),
(104, '5', 'Najviša železnička pruga na svetu nalazi se u:', 'Švajcarska', 'Peru', 'SAD', 'Norveška', 'Peru', 'Geografija'),
(105, '6', 'Glavni grad Moldavije', 'Riga', 'Viljnus', 'Kišnjev', 'Talin', 'Kišnjev', 'Geografija'),
(106, '1', 'Džez je muzički pravac koji nastaje u ?', 'Africi', 'Južnoj Americi', 'Severnoj Americi', 'Evropi', 'Severnoj Americi', 'Muzika'),
(107, '2', 'Autor\"Mesečeve sonate\" je?', 'Bach', 'Mozart', 'Beethoven', 'Vivaldi', 'Beethoven', 'Muzika'),
(108, '3', 'U kom veku je rodjen Johann Sebastian Bach? ', '16.', '17.', '18.', '19.', '17.', 'Muzika'),
(109, '4', 'Ko je bio rodonačelnik fank muzike?', 'James Brown', 'Prince', 'Bobby Farrell', 'B.B.King', 'James Brown', 'Muzika'),
(110, '5', 'Komercijalno najuspešnija pop grupa na svetu je?', 'Boney M', 'ABBA', 'Bee Gees', 'The Rolling Stones', 'ABBA', 'Muzika'),
(111, '6', '\"God Save The Queen\" je pesma pank benda?', 'Sham 69', 'The Adicts', 'Sex Pistols', 'The Clash', 'Sex Pistols', 'Muzika'),
(112, '1', 'Koja je dužina maratonske trke?', '32200m', '40595m', '42195', '39815m', '42195', 'Sport'),
(113, '2', 'Koje godine su održane prve Olimpijske igre?', '1912', '1901', '1896', '1889', '1896', 'Sport'),
(114, '3', 'Koliko sekundi traje napad u košarci?', '30', '24', '20', '35', '24', 'Sport'),
(115, '4', 'Najveći broj titula šampiona formule 1 ima?', 'Luis Hamilton', 'Niki Lauda', 'Alen Prost', 'Mihael Šumaher', 'Mihael Šumaher', 'Sport'),
(116, '5', 'Kojim sportom se bavi Simon Aman?', 'plivanje', 'ski skokovi', 'boks', 'kuglanje', 'ski skokovi', 'Sport'),
(117, '6', 'Koja reprezentacija je pobednik svetskog prvenstva u fudbalu 2018 godine?', 'Francuska', 'Argentina', 'Nemačka', 'Engleska', 'Francuska', 'Sport'),
(118, '1', 'U kom mestu je Karađorđe izabran za vođu Prvog srpskog ustanka?', 'Takovo', 'Beograd', 'Orašac', 'Donji Milanovac', 'Orašac', 'Istorija'),
(119, '2', 'Koje godine su Turci osvojili Beograd?', '1523', '1531', '1521', '1519', '1521', 'Istorija'),
(120, '3', 'Koje godine je srušen Berlinski zid?', '1980', '1989', '1992', '1987', '1989', 'Istorija'),
(121, '4', 'Do raspada SSSR-a došlo je :  ', '1989', '1990', '1991', '1988', '1991', 'Istorija'),
(122, '5', 'Koje godine je bila francuska revolucija?', '1790', '1768', '1789', '1798', '1789', 'Istorija'),
(123, '6', 'Stara Mesopotamija se nalazila na teritoriji današnje države?', 'Iran', 'Irak', 'Turska', 'Azerbejdžan', 'Irak', 'Istorija');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_confirmation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `password_confirmation`) VALUES
(28, ' korisnik', 'korisnik', 'bra@gmail.com', 'Korisnik111!', '2b71275348f66f7c7c25ffa7358ca061', '2b71275348f66f7c7c25ffa7358ca061');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_category`
--
ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
