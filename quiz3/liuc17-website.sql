-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2024 at 04:47 AM
-- Server version: 10.11.8-MariaDB-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mySite`
--

-- --------------------------------------------------------

--
-- Table structure for table `myFooter`
--

CREATE TABLE `myFooter` (
  `id` smallint(6) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myFooter`
--

INSERT INTO `myFooter` (`id`, `content`) VALUES
(1, 'Carina Liu - ITWS1100');

-- --------------------------------------------------------

--
-- Table structure for table `myLabs`
--

CREATE TABLE `myLabs` (
  `id` smallint(6) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myLabs`
--

INSERT INTO `myLabs` (`id`, `title`, `description`, `link`) VALUES
(2, 'Lab 1 - Setup', 'Azure setup and initial configuration.', '../lab01/liuc17-lab1-AzureStatus.jpg'),
(3, 'Lab 2 - Resume', 'HTML and CSS resume creation.', '../lab02/liuc17 - Lab 2 - HTML - Resume.pdf'),
(4, 'Lab 3 - Personal Website', 'Building a personal website.', '../lab03/index.html'),
(5, 'Lab 4 - RSS & Atom Feed', 'Creating RSS and Atom XML feeds.', '../lab04/RSS 2.0.xml'),
(6, 'Lab 5 - Javascript', 'Introduction to JavaScript and interactivity.', '../lab05/lab5.html'),
(7, 'Lab 6 - Javascript & jQuery', 'Using jQuery to manipulate DOM.', '../lab06/lab6.html'),
(8, 'Lab 7 - Project Mockups', 'Creating mockups for projects.', '../lab07/lab7.html'),
(9, 'Lab 8 - Dynamic Website', 'Loading dynamic content via JSON.', '../lab08/projects.json'),
(10, 'Lab 9 - PHP', 'Using PHP to generate dynamic websites.', '../lab09/iit.sql'),
(11, 'Lab 10 - Production', 'Moving projects to a production server.', '../lab10/index.php');

-- --------------------------------------------------------

--
-- Table structure for table `myProjects`
--

CREATE TABLE `myProjects` (
  `id` smallint(6) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(225) NOT NULL,
  `lab_id` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myProjects`
--

INSERT INTO `myProjects` (`id`, `title`, `description`, `link`, `lab_id`) VALUES
(1, 'AZURE SETUP', 'Azure setup and initial configuration.', '../lab01/liuc17-lab1-AzureStatus.jpg', 1),
(2, 'GITHUB', 'Information on setting up GitHub.', '../lab01/liuc17-lab1-GitHubInfo.jpg', 1),
(3, 'HELLO WORLD', 'Hello World application setup.', '../lab01/liuc17-lab1-HelloWorld.pdf', 1),
(4, 'PHP', 'Guide to using PHPMyAdmin.', '../lab01/liuc17-lab1-PHPMyAdmin.pdf', 1),
(5, 'RESUME', 'HTML resume project.', '../lab02/liuc17-Lab-2-HTML-Resume.pdf', 2),
(6, 'README', 'Documentation for Lab 2.', '../lab02/README.md', 2),
(7, 'HOME PAGE', 'Personal website home page.', '../lab03/index.html', 3),
(8, 'PROJECT PAGE', 'Dynamic project page for website.', '../lab03/projects.html', 3),
(9, 'CSS', 'CSS file for styling Lab 3.', '../lab03/resource/lab3.css', 3),
(10, 'RSS', 'RSS 2.0 feed for website.', '../lab04/RSS 2.0.xml', 4),
(11, 'ATOM FEED', 'Atom feed for website.', '../lab04/Atom 1.0.xml', 4),
(12, 'README', 'Documentation for Lab 4.', '../lab04/README.md', 4),
(13, 'HTML', 'HTML file for Lab 5.', '../lab05/lab5.html', 5),
(14, 'CSS', 'CSS file for Lab 5 styling.', '../lab05/lab5.css', 5),
(15, 'JS', 'JavaScript file for Lab 5.', '../lab05/lab5.js', 5),
(16, 'Website Link', 'Dynamic website for Lab 6.', 'http://127.0.0.1:3002/lab06/lab6.html', 6),
(17, 'jQuery', 'jQuery library for Lab 6.', '../lab06/resources/jquery-3.6.1.min.js', 6),
(18, 'Instructions', 'Instructions for Lab 6.', '../lab06/readme.md', 6),
(19, 'README', 'Documentation for Lab 6.', '../lab06/READMELAB6', 6),
(20, 'README', 'Documentation for Lab 8.', '../lab08/README.md', 8),
(21, 'README', 'Documentation for Lab 9.', '../lab09/README.md', 9),
(22, 'README', 'Documentation for Lab 10.', '../lab10/README.md', 10),
(23, 'HTML', 'HTML file for Lab 7', '../lab05/lab5.html', 7),
(24, 'CSS', 'CSS file for Lab 7', '../lab05/lab5.css', 7),
(25, 'JS', 'JavaScript file for Lab 7', '../lab05/lab5.js', 7),
(26, 'README', 'Documentation for Lab 7', '../lab05/README.md', 7),
(27, 'projects.json', 'JSON file for dynamic project data.', '../lab08/projects.json', 8),
(28, 'projects.js', 'JavaScript file for dynamic project functionality.', '../lab08/projects.js', 8),
(29, 'projects.html', 'HTML file for the dynamic project page.', '../lab03/projects.html', 8),
(30, 'README', 'Documentation for Lab 8.', '../lab08/README.md', 8),
(35, 'iit.sql', 'SQL file for database creation.', '../lab09/iit.sql', 9),
(36, 'iitstart.php', 'PHP file for starting the project.', '../lab09/index-iitstart.php', 9),
(37, 'index.php', 'Main PHP file for the project.', '../lab09/index.php', 9),
(38, 'movies.php', 'PHP file for managing movies.', '../lab09/movies.php', 9),
(39, 'actor-delete.php', 'PHP file for deleting actors.', '../lab09/actor-delete.php', 9),
(40, 'README', 'Documentation for Lab 9.', '../lab08/README.md', 9),
(41, 'projects.json', 'JSON file for project data.', '../lab10/index.php', 10),
(42, 'README', 'Documentation for Lab 10.', '../lab10/README.md', 10);

-- --------------------------------------------------------

--
-- Table structure for table `mySiteUsers`
--

CREATE TABLE `mySiteUsers` (
  `id` smallint(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_type` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mySiteUsers`
--

INSERT INTO `mySiteUsers` (`id`, `username`, `password`, `name`, `user_type`) VALUES
(1, 'johndoe', 'password123', 'John Doe', 'user'),
(3, 'admin1', 'password222', 'Admin User 1', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myFooter`
--
ALTER TABLE `myFooter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myLabs`
--
ALTER TABLE `myLabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myProjects`
--
ALTER TABLE `myProjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mySiteUsers`
--
ALTER TABLE `mySiteUsers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myFooter`
--
ALTER TABLE `myFooter`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `myLabs`
--
ALTER TABLE `myLabs`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `myProjects`
--
ALTER TABLE `myProjects`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `mySiteUsers`
--
ALTER TABLE `mySiteUsers`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
