-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2019 at 12:56 AM
-- Server version: 5.6.43
-- PHP Version: 7.1.20-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c1v3bl0g`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(20) UNSIGNED NOT NULL COMMENT 'the post''s id',
  `post_title` varchar(50) NOT NULL COMMENT 'the post''s title',
  `post_pic` varchar(50) NOT NULL COMMENT 'the post''s pic',
  `post_body` varchar(255) NOT NULL COMMENT 'the post''s body',
  `created_at` date NOT NULL COMMENT 'post created date',
  `user_id` int(20) UNSIGNED NOT NULL COMMENT 'the post''s author id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this is the post table';

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_pic`, `post_body`, `created_at`, `user_id`) VALUES
(1, 'C1v3-Bl0G CTF Released', 'start-hacking.png', 'Today C1v3-Bl0G CTF Challenge was released. This is the top and default post of these CTF challenge.  You can edit posts through the authenticated Admin page.', '2019-04-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) UNSIGNED NOT NULL COMMENT 'the user''s id',
  `username` varchar(15) NOT NULL COMMENT 'the username column',
  `password` varchar(255) NOT NULL COMMENT 'the password column',
  `access_level` varchar(25) NOT NULL COMMENT 'the user''s access level',
  `avatar` varchar(50) NOT NULL COMMENT 'the user''s avatar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this is the user table';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `access_level`, `avatar`) VALUES
(1, 'Admin', '97db1846570837fce6ff62a408f1c26a', 'Admin', 'uploads/avatar.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'the post''s id', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'the user''s id', AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `PostsUserFK` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
