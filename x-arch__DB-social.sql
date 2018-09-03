-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2018 at 02:19 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `liked`
--

CREATE TABLE `liked` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`) VALUES
(8, 'Fist clear post into the database.', 'simon_buryan', 'none', '2018-09-03 13:11:21', 'no', 'no', 0),
(9, 'Fist clear post into the database.', 'simon_buryan', 'none', '2018-09-03 13:18:25', 'no', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `post_body` int(11) NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(20, 'Å imon', 'Buryan', 'Å imon_buryan', 'Simon.buryan@seznam.cz', '0cbb3ad466ebb557f1317c066e3db03a', '2018-03-18', 'assets/images/profile_pics/defaults/head_belize_hole.png', 0, 0, 'no', ''),
(27, 'Å imon', 'Buryan', 'Å imon_buryan_1', 'Simon.buryan@cez.cz', '0129601396d16c84b32e0cc291f1d256', '2018-04-02', '', 0, 0, '', ''),
(28, 'SlavomÃ­r', 'CÃ¡ba', 'slavomÃ­r_cÃ¡ba', 'Slavomir.caba@cez.cz', '0129601396d16c84b32e0cc291f1d256', '2018-04-02', '', 0, 0, '', ''),
(31, 'LubomÃ­r', 'KuÄera', 'lubomÃ­r_kuÄera', 'Lubomir.kucera@cez.cz', '5df3419ef2d6e8d529f9f78eaa9dc473', '2018-05-07', '', 0, 0, '', ''),
(32, 'Pavel', 'DonÃ¡t', 'pavel_donÃ¡t', 'Pavel.donat@cez.cz', '29d847ffce86b63c39a756a25b198751', '2018-05-07', '', 0, 0, '', ''),
(33, 'Lokalita', 'Etu', 'lokalita_etu', 'Lokalita.etu@cez.cz', '5d0798e5fb24218c41048cfff19f3861', '2018-05-14', '', 0, 0, '', ''),
(34, 'Lokalita', 'Epr1', 'lokalita_epr1', 'Lokalita.epr1@cez.cz', 'bd5b4b14e5be021444c15ca73ff188b8', '2018-05-14', '', 0, 0, '', ''),
(35, 'Lokalita', 'Epr2', 'lokalita_epr2', 'Lokalita.epr2@cez.cz', '2d09bce7ad941cc6dbb6a1e2233ddbe7', '2018-05-14', '', 0, 0, '', ''),
(41, 'Jaromir', 'Jagr', 'jaromir_jagr', 'Jagr@jagr.cz', '29d847ffce86b63c39a756a25b198751', '2018-05-16', '', 0, 0, '', ''),
(42, 'Simon', 'Buryan', 'simon_buryan', 'Xburs02@vse.cz', '0cbb3ad466ebb557f1317c066e3db03a', '2018-09-03', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ',');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `liked`
--
ALTER TABLE `liked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
