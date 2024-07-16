-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 01:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('Pending','Completed') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `user_id`, `title`, `description`, `status`) VALUES
(1, 1, 'Lunch', 'Have Your Lunch', 'Completed'),
(2, 1, 'Snacks', 'Have Your Snacks', 'Pending'),
(3, 1, 'Dinner', 'Have Your Dinner', 'Pending'),
(4, 2, 'Breakfast', 'Have Your Breakfast', 'Completed'),
(5, 2, 'fd gvtbhyunjtd gfdc', 'Have Your Lunch', 'Completed'),
(7, 2, 'Dinner', 'Have you Dinner', 'Pending'),
(15, 1, 'Task 1', 'This is Task 1', 'Pending'),
(16, 1, 'Task 2', 'This is task2', 'Completed'),
(18, 1, 'Task 4', 'This is task4', 'Pending'),
(19, 1, 'task 5', 'this is task 5', 'Completed'),
(20, 1, 'Task 6', 'This is task 6', 'Completed'),
(21, 1, 'task 3', 'this is task 3', 'Completed'),
(22, 1, 'Task 7', 'This is task 7', 'Pending'),
(24, 1, 'Task 9', 'This is the task 9', 'Pending'),
(25, 1, 'aaaaa', 'aaaaa', 'Completed'),
(26, 1, 'bbb', 'bbb', 'Completed'),
(27, 1, 'zzzzz', 'zzzzz', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@admin', 'admin'),
(2, 'User', 'user@user', 'user'),
(3, 'akshat', 'akshat@gmail.com', 'akshat'),
(4, 'goel', 'goel@gmail.com', 'goel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todos`
--
ALTER TABLE `todos`
  ADD CONSTRAINT `todos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
