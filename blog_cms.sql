-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2018 at 11:31 AM
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
-- Database: `blog_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(11, 'php'),
(2, 'JavaScript'),
(12, 'Java'),
(14, 'Ruby ');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` text NOT NULL,
  `comment_email` varchar(200) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(200) NOT NULL,
  `commetn_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `commetn_date`) VALUES
(1, 1, 'gaurav', 'mailme@mail.com', 'this is comment by me', 'approve', '2017-12-20'),
(8, 2, 'saurav', 'mailme@gamil.com', 'this is second comment', 'approve', '2018-01-03'),
(14, 7, 'sakshi', 'sakshi@mailme.com', 'nice post\r\n', 'approve', '2018-04-09'),
(10, 2, 'gaurav', 'gaurav@gmail.com', 'comment on js\r\n', 'approve', '2018-01-03'),
(11, 2, 'Chanchal', 'Chanchal@gmail.com', 'This is comment', 'approve', '2018-01-03'),
(12, 2, 'Chanchal', 'Chanchal@gmail.com', 'This is comment', 'approve', '2018-01-03'),
(13, 1, 'leeco mobile', 'mobile@mobile.com', 'this is comment from mobile', 'approve', '2018-01-14'),
(15, 1, 'sakshi', 'sakshi@mailme.com', 'this is comment', 'approve', '2018-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_tags` text NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_category_id` int(3) NOT NULL,
  `post_title` text NOT NULL,
  `post_author` text NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_user` text CHARACTER SET utf8 COLLATE utf8_bin,
  `post_comments` text,
  `post_counts` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_tags`, `post_status`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_user`, `post_comments`, `post_counts`) VALUES
(16, 'js, Javascript', 'draft', 2, 'JavaScript', 'ABC', '2018-06-27', 'technics-q-c-900-300-8.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, NULL, 0),
(12, 'php, php 5', 'draft', 11, 'PHP 5 Tutorial ', 'gaurav pal', '2018-01-23', 'img-default-small.jpg', '<p style=\"box-sizing: inherit; font-family: Verdana, sans-serif; font-size: 16px;\">PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages</p>', NULL, NULL, 2),
(13, 'test', 'draft', 14, 'test post one', 'Me', '2018-06-25', 'technics-q-c-900-300-8.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada placerat aliquam. Cras vestibulum arcu nec mattis imperdiet. In at lorem tincidunt, mattis eros sed, iaculis nibh. Fusce dui erat, fermentum sit amet risus ut, convallis imperdiet ex. Mauris dictum tempor mauris, eu commodo libero ullamcorper et. Praesent aliquet feugiat volutpat. Sed non odio lorem. Aenean suscipit sodales lectus, pellentesque varius</p>\r\n<p>liquet feugiat volutpat. Sed non odio lorem. Aenean suscipit sodales lectus, pellentesque varius</p>', NULL, NULL, 3),
(14, 'unknown', 'draft', 12, 'test post two', 'ME', '2018-06-25', 'technics-q-c-900-300-9.jpg', '<h3>Lorem ipsum dolor sit amet,</h3>\r\n<p><em> consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</em> consequat.</p>\r\n<p style=\"text-align: right;\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` text NOT NULL,
  `user_password` text NOT NULL,
  `user_first_name` text NOT NULL,
  `user_last_name` text NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_image` text,
  `user_role` text NOT NULL,
  `user_salt` varchar(255) DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_first_name`, `user_last_name`, `user_email`, `user_image`, `user_role`, `user_salt`) VALUES
(1, 'gaurav.pal1231', '$1$ku/.d24.$GiuRoTH4EH3SAMECCFACi.', 'gaurav', 'palaspagar', 'gaurav.pal@gmail.com', '', 'admin', ''),
(2, 'saurav.pal123', 'toor', 'Saurav', 'palaspagar', 'saurav.pal@gmail.com', NULL, 'subscriber', NULL),
(4, 'root_123R', '1234', 'Rahul', 'Ingle', 'gaurav.palaspagar@hotmail.com', NULL, 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(10, 'userfname', 'userlname', 'username.1234', 'user@mail.com', '1234', NULL, 'Admin', '$2y$10$iusesomecrazystrings22'),
(9, 'guddu.1234', '1234', 'guddu', 'pal', 'guddu@gmail.com', NULL, 'admin', '$2y$10$iusesomecrazystrings22'),
(8, 'username.123', '12345', 'firstname', 'lastname', 'mail@mial.com', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(11, 'user12345', '$1$hw5.Wl..$YBZNVwdYqECuSdoFjXPCf/', 'user33', 'lastname', 'user@mail.com', NULL, 'Admin', '$2y$10$iusesomecrazystrings22'),
(12, '', '$1$AqbAZ3Wt$XXUjyjMXeng/wNFkiybc10', '', '', '', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(13, '', '$1$Yx9srw6r$UtREKzPx3qLmcj88qUMN8.', '', '', '', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(14, '', '$1$Vk4lbNZA$sY9WuxD5o1XYws.MTA2AI/', '', '', '', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(15, 'gaurav098', '$2y$12$HndSwczjPnQXWtMhOs23I.gUyjI8/4tZ0UkMuqFp6fV52VW0GOrmG', 'gaurav', 'palaspagar', 'gaurav.palaspagar@hotmail.com', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(16, 'rashmi123', '$2y$12$.jaqazymWTcznMBytGjuE.dC4IpFVHXpigR7/IoIWYeLT89O4d6iS', 'rashmi ', 'Ingle ', 'rashmi@mail.com', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(17, 'harmipappu', '$2y$12$3/YptA4F0BsEBIVaT.IW9uIWZE2xWHRhD9dyHaj9BxVCCTM53wmTq', 'pappu', 'harami', 'haramimain@gmail.com', NULL, 'Admin', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(400) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'piubrc75a7v5hh15pqkdc8scp7', 1529504051),
(2, '594a00vgof7a7na9sgrq2tkk8i', 1529503286),
(3, 't589jkduj8c22hh21amblad6g9', 1529859834),
(4, 'k2c34phrulhoh39ro41slntse0', 1529940697),
(5, 'o429ogrr1kp2m1riepu175gjev', 1529978872),
(6, '3s55r4tmj3m6m4i41fki7on78n', 1530088128),
(7, '9svm3o4bstbc7h1kc5b57o4j7u', 1530083719);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_post_id` (`comment_post_id`),
  ADD KEY `comment_post_id_2` (`comment_post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_category_id` (`post_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
