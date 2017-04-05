-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2017 at 01:51 PM
-- Server version: 5.5.54-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `akademija`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'art'),
(2, 'design'),
(3, 'motivation'),
(4, 'tech');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`comment_id` int(11) NOT NULL,
  `comment_author` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_author`, `comment_text`, `post_id`) VALUES
(10, 10, 'Mladenov komantar', 16),
(11, 10, 'Mladenov drugi komentar', 16),
(12, 10, 'Holandski slikar', 14),
(13, 8, 'Komentar administratora', 14),
(14, 8, 'Komentar administratora', 16),
(15, 8, 'Best OS ever', 13),
(16, 9, 'Freedom, Choice, Beautiful', 13),
(17, 8, 'Administratorski komentar', 17),
(18, 11, 'Drugi administrator', 17),
(19, 11, 'Administratorski komentar', 14),
(20, 11, 'Administrator comment', 18);

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
`post_id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_text` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`post_id`, `post_title`, `post_text`, `post_date`, `cat_id`) VALUES
(12, 'New Post', 'Lorem ipsum dolor sit amet, mus varius eu rhoncus donec, nam libero sapien nec. Sed nascetur urna. Urna sed ut, suscipit ultrices aliquam augue velit non dui, sodales ante imperdiet non. Mauris augue tempor scelerisque laoreet, ipsum velit pellentesque sit, id vivamus velit et mi cras mi. Mauris montes mauris. Modi ut in integer vel, sollicitudin vivamus felis rhoncus malesuada vel. Mauris arcu in praesent ipsum sed fusce, parturient congue elit tortor. Mollis neque, aliquam inceptos in pretium mauris quisque. Et metus suspendisse aliquam vestibulum a, ante donec placerat sed suscipit placerat, vivamus sed cras quis netus leo, nulla morbi pellentesque magna feugiat pellentesque, egestas fames porta ante pellentesque porta. Malesuada ac, tempus massa in et elementum, cras ut blandit vel, sagittis consequat et justo mauris proin. Volutpat praesent, vitae duis. Faucibus amet morbi ligula, ullamcorper nec ante quisque fusce in a.', '2017-04-01 08:20:03', 4),
(13, 'Linux Debian', 'Lorem ipsum dolor sit amet, dolor ipsum vulputate. Turpis aliquam eu condimentum in. Curabitur nisl malesuada sed quis et, odio ut feugiat, posuere ante. At quis in vitae. Conubia a exercitationem ut, ac nonummy molestie id maecenas curabitur, a convallis ante lacinia enim diam, pellentesque aenean sit culpa. Urna praesent elit vulputate felis, vel lorem eleifend magna. Sit libero pretium, dolor odio purus aliquam duis sollicitudin phasellus. Ac in maecenas etiam convallis risus. Dolor interdum, leo morbi id nam proin non, quis nullam incidunt quam bibendum. Facilisi at ornare primis taciti at egestas. Sem lectus ac augue in hymenaeos, quis et in ultrices conubia convallis quis, wisi velit rhoncus aliquet sed placerat, est faucibus condimentum magna, nec pellentesque augue. Aliquam pede scelerisque, et enim dolor, condimentum mollis hac vitae duis sem amet, at et.', '2017-04-01 08:23:19', 4),
(14, 'Rembrandt', 'Lorem ipsum dolor sit amet, mus varius eu rhoncus donec, nam libero sapien nec. Sed nascetur urna. Urna sed ut, suscipit ultrices aliquam augue velit non dui, sodales ante imperdiet non. Mauris augue tempor scelerisque laoreet, ipsum velit pellentesque sit, id vivamus velit et mi cras mi. Mauris montes mauris. Modi ut in integer vel, sollicitudin vivamus felis rhoncus malesuada vel. Mauris arcu in praesent ipsum sed fusce, parturient congue elit tortor. Mollis neque, aliquam inceptos in pretium mauris quisque. Et metus suspendisse aliquam vestibulum a, ante donec placerat sed suscipit placerat, vivamus sed cras quis netus leo, nulla morbi pellentesque magna feugiat pellentesque, egestas fames porta ante pellentesque porta. Malesuada ac, tempus massa in et elementum, cras ut blandit vel, sagittis consequat et justo mauris proin. Volutpat praesent, vitae duis. Faucibus amet morbi ligula, ullamcorper nec ante quisque fusce in a.', '2017-04-01 08:35:03', 1),
(16, 'Web Design', 'Lorem ipsum dolor sit amet, mus varius eu rhoncus donec, nam libero sapien nec. Sed nascetur urna. Urna sed ut, suscipit ultrices aliquam augue velit non dui, sodales ante imperdiet nddsson. Mauris augue tempor scelerisque laoreet, ipsum velit pellentesque sit, id vivamus velit et mi cras mi. Mauris montes mauris. Modi ut in integer vel, sollicitudin vivamus felis rhoncus malesuada vel. Mauris arcu in praesent ipsum sed fusce, parturient congue elit tortor. Mollis neque, aliquam inceptos in pretium mauris quisque. Et metus suspendisse aliquam vestibulum a, ante donec placerat sed suscipit placerat, vivamus sed cras quis netus leo, nulla morbi pellentesque magna feugiat pellentesque, egestas fames porta ante pellentesque porta. Malesuada ac, tempus massa in et elementum, cras ut blandit vel, sagittis consequat et justo mauris proin. Volutpat praesent, vitae duis. Faucibus amet morbi ligula, ullamcorper nec ante quisque fusce in a.', '2017-04-01 08:31:57', 2),
(17, 'Success', 'Lorem ipsum dolor sit amet, mus varius eu rhoncus donec, nam libero sapien nec. Sed nascetur urna. Urna sed ut, suscipit ultrices aliquam augue velit non dui, sodales ante imperdiet non. Mauris augue tempor scelerisque laoreet, ipsum velit pellentesque sit, id vivamus velit et mi cras mi. Mauris montes mauris. Modi ut in integer vel, sollicitudin vivamus felis rhoncus malesuada vel. Mauris arcu in praesent ipsum sed fusce, parturient congue elit tortor. Mollis neque, aliquam inceptos in pretium mauris quisque. Et metus suspendisse aliquam vestibulum a, ante donec placerat sed suscipit placerat, vivamus sed cras quis netus leo, nulla morbi pellentesque magna feugiat pellentesque, egestas fames porta ante pellentesque porta. Malesuada ac, tempus massa in et elementum, cras ut blandit vel, sagittis consequat et justo mauris proin. Volutpat praesent, vitae duis. Faucibus amet morbi ligula, ullamcorper nec ante quisque fusce in a.', '2017-04-01 09:23:20', 1),
(18, 'Motivation', 'Lorem ipsum dolor sit amet, mus varius eu rhoncus donec, nam libero sapien nec. Sed nascetur urna. Urna sed ut, suscipit ultrices aliquam augue velit non dui, sodales ante imperdiet non. Mauris augue tempor scelerisque laoreet, ipsum velit pellentesque sit, id vivamus velit et mi cras mi. Mauris montes mauris. Modi ut in integer vel, sollicitudin vivamus felis rhoncus malesuada vel. Mauris arcu in praesent ipsum sed fusce, parturient congue elit tortor. Mollis neque, aliquam inceptos in pretium mauris quisque. Et metus suspendisse aliquam vestibulum a, ante donec placerat sed suscipit placerat, vivamus sed cras quis netus leo, nulla morbi pellentesque magna feugiat pellentesque, egestas fames porta ante pellentesque porta. Malesuada ac, tempus massa in et elementum, cras ut blandit vel, sagittis consequat et justo mauris proin. Volutpat praesent, vitae duis. Faucibus amet morbi ligula, ullamcorper nec ante quisque fusce in a.', '2017-04-01 10:01:06', 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`rol_id` int(11) NOT NULL,
  `rol_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_name`) VALUES
(1, 'administrator'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rol_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `rol_id`) VALUES
(8, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@admin.com', 1),
(9, 'editor', 'e10adc3949ba59abbe56e057f20f883e', 'editor@editor.com', NULL),
(10, 'mladen', 'e10adc3949ba59abbe56e057f20f883e', 'mloo@mlo.com', NULL),
(11, 'administrator', 'e10adc3949ba59abbe56e057f20f883e', 'administrator@admin.com', 1),
(12, 'user', 'e10adc3949ba59abbe56e057f20f883e', 'user@user.com', 2),
(16, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@admin.com', NULL);

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
 ADD PRIMARY KEY (`comment_id`), ADD KEY `post_id` (`post_id`), ADD KEY `comment_author` (`comment_author`);

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
 ADD PRIMARY KEY (`post_id`), ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`rol_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`comment_author`) REFERENCES `users` (`user_id`),
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `entries` (`post_id`);

--
-- Constraints for table `entries`
--
ALTER TABLE `entries`
ADD CONSTRAINT `entries_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`rol_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
