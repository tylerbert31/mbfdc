-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 07:55 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messageboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(5) NOT NULL,
  `sender` int(5) NOT NULL,
  `receiver` int(5) NOT NULL,
  `message_content` text NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `message_content`, `timestamp`) VALUES
(16, 55, 62, 'asdasd23rvaefve4fvserfv', '2023-10-05 07:55:00'),
(17, 55, 62, 'asdasdasdasdsadasdasdsad', '2023-10-05 07:55:00'),
(18, 55, 62, 'asdasdasdasdasdsadasdasdasd', '2023-10-05 07:55:00'),
(19, 55, 62, 'aaaaaaaaaaaaaaaaaaaaa', '2023-10-05 07:56:00'),
(22, 62, 55, '11111111111111111111111111111111', '2023-10-05 07:58:48'),
(34, 62, 55, 'hey', '2023-10-06 07:40:13'),
(46, 55, 62, 'hey', '2023-10-06 09:53:06'),
(47, 55, 62, 'was guud homie', '2023-10-06 09:53:16'),
(49, 55, 62, 'sis', '2023-10-06 09:55:43'),
(51, 55, 62, 'wassup', '2023-10-06 09:57:46'),
(53, 55, 62, 'liz', '2023-10-06 09:59:17'),
(54, 55, 61, 'Hi jade', '2023-10-06 10:42:17'),
(55, 61, 55, 'hi kuyaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\n', '2023-10-06 10:42:47'),
(57, 55, 61, 'pogi sige na', '2023-10-09 03:10:38'),
(58, 62, 61, 'hey', '2023-10-09 11:31:28'),
(59, 61, 62, 'oh hi', '2023-10-09 11:31:57'),
(60, 61, 55, 'you\'re always on my mind', '2023-10-09 13:06:51'),
(61, 55, 61, 'yieeee', '2023-10-09 13:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `age` int(11) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `joined` varchar(50) NOT NULL,
  `last_login` varchar(50) NOT NULL,
  `profile_url` text NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `lastname`, `firstname`, `password`, `age`, `birthday`, `gender`, `joined`, `last_login`, `profile_url`, `bio`) VALUES
(55, 'tylerbert@gmail.com', 'Baring', 'Tyler Bert', '61d5a7f24ea348b744b021ebd3c7eaea6f8a3ff9', 22, '07/31/2001', 'Male', '2023-10-04 02:57:36', '2023-10-09 13:09:12', 'img/profile_pics/55.jpg', '2023 Magna Cum Laude - BS Computer Science - USPF'),
(61, 'kelvinjade@gmail.com', 'Baring', 'Kelvin Jade', '61d5a7f24ea348b744b021ebd3c7eaea6f8a3ff9', 13, '08/13/2010', 'Male', '2023-10-04 05:37:49', '2023-10-09 11:31:48', 'img/profile_pics/61.jpg', 'Gamer'),
(62, 'shaliz@gmail.com', 'Baring', 'Trisha Liz', '61d5a7f24ea348b744b021ebd3c7eaea6f8a3ff9', 19, '10/27/2003', 'Female', '2023-10-04 05:45:05', '2023-10-09 11:31:00', 'img/profile_pics/62.jpg', 'BS Tourism 2nd Year - USPF Lahug');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
