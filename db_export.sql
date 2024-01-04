-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 08, 2023 at 06:55 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Dilema`
--

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

CREATE TABLE `Articles` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `submission_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_approved` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`article_id`, `user_id`, `title`, `content`, `category_id`, `submission_date`, `is_approved`) VALUES
(1, 1, 'Cel mai tehnic articol despre PHP', 'PHP este un limbaj de programare. Numele PHP provine din limba engleză și este un acronim recursiv : Php: Hypertext Preprocessor. Folosit inițial pentru a produce pagini web dinamice, este folosit pe scară largă în dezvoltarea paginilor și aplicațiilor web. Se folosește în principal înglobat în codul HTML, dar începând de la versiunea 4.3.0 se poate folosi și în mod „linie de comandă” (CLI), permițând crearea de aplicații independente. Este unul din cele mai importante limbaje de programare web[10] open-source și server-side, existând versiuni disponibile pentru majoritatea web serverelor și pentru toate sistemele de operare. Conform statisticilor este instalat pe 20 de milioane de site-uri web și pe 1 milion de servere web[11]. Este disponibil sub Licenṭa PHP ṣi Free Software Foundation îl consideră a fi un software liber.', 2, '2023-12-04 00:00:00', 1),
(2, 2, 'Asteptam titlu', 'Asteptam continut pentru ca Mariana nu vrea sa ne trimita nimic. Oare de ce?', 1, '2023-12-05 00:00:00', 1),
(5, 3, 'dadadada', 'ddadadadadadad', 4, '2023-12-07 20:53:17', 0),
(6, 3, 'Cel mai fashion articol creat', 'Cel mai fashion articol creat\r\n\r\n\r\nCel mai fashion articol creat\r\n\r\n\r\n\r\nCel mai fashion articol creat\r\nCel mai fashion articol creat\r\nCel mai fashion articol creat\r\nCel mai fashion articol creat\r\nCel mai fashion articol creat\r\nCel mai fashion articol creat\r\n\r\n\r\n\r\n\r\nDE mine!', 4, '2023-12-07 20:56:02', 0),
(7, 3, 'Cel mai fashion articol creat', 'Cel mai fashion articol creat\r\n\r\n\r\nCel mai fashion articol creat\r\n\r\n\r\n\r\nCel mai fashion articol creat\r\nCel mai fashion articol creat\r\nCel mai fashion articol creat\r\nCel mai fashion articol creat\r\nCel mai fashion articol creat\r\nCel mai fashion articol creat\r\n\r\n\r\n\r\n\r\nDE mine!', 4, '2023-12-07 20:57:11', 0),
(8, 3, 'PDO', 'PDOPDOPDOPDOPDO', 2, '2023-12-07 20:57:27', 1),
(9, 1, 'Cel mai articol dintre articole', 'Cel mai articol dintre articole...', 1, '2023-12-08 19:50:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`id`, `name`) VALUES
(1, 'Artistic'),
(2, 'Tehnic'),
(3, 'Science'),
(4, 'Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`id`, `name`) VALUES
(1, 'READER'),
(2, 'EDITOR'),
(6, 'JOURNALIST'),
(7, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `UserCategories`
--

CREATE TABLE `UserCategories` (
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UserCategories`
--

INSERT INTO `UserCategories` (`user_id`, `category_id`) VALUES
(1, 1),
(3, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `name`, `password`, `email`, `role`) VALUES
(1, 'Liviu Padurariu', '12345678', 'liviu@padurariu.ro', 7),
(2, 'Alex Nedelcu', '12345678', 'alex@dilema.ro', 2),
(3, 'Mihai Eminescu', '12345678', 'mihai@dilema.ro', 6),
(4, 'admin', '12345678', 'admin@dilema.ro', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `category_id` (`category_id`) USING BTREE;

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `UserCategories`
--
ALTER TABLE `UserCategories`
  ADD PRIMARY KEY (`user_id`,`category_id`),
  ADD KEY `fk_cat_category_id` (`category_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Articles`
--
ALTER TABLE `Articles`
  ADD CONSTRAINT `fk_art_category_id` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`id`),
  ADD CONSTRAINT `fk_art_user_id` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

--
-- Constraints for table `UserCategories`
--
ALTER TABLE `UserCategories`
  ADD CONSTRAINT `fk_cat_category_id` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`id`),
  ADD CONSTRAINT `fk_cat_user_id` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
