-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2026 at 02:09 AM
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
-- Database: `complaint_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `category` varchar(100) NOT NULL,
  `complaint_text` text NOT NULL,
  `status` varchar(30) DEFAULT 'Pending',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `title`, `category`, `complaint_text`, `status`, `created_at`) VALUES
(3, 1, 'Late Delivery', 'Delivery', 'My order arrived three days later than expected.', 'Pending', '2026-05-18 02:41:57'),
(4, 1, 'Bad Customer Service', 'Customer Service', 'The support agent was rude and did not solve my issue.', 'In Progress', '2026-05-18 02:41:57'),
(5, 1, 'Wrong Product Received', 'Shopping', 'I received a different item than the one I ordered.', 'Solved', '2026-05-18 02:41:57'),
(6, 1, 'Internet Connection Problem', 'Technical', 'The internet service disconnects every few minutes.', 'Pending', '2026-05-18 02:41:57'),
(7, 1, 'Application Crash', 'Software', 'The mobile application crashes whenever I open it.', 'In Progress', '2026-05-18 02:41:57'),
(8, 1, 'Refund Not Received', 'Payment', 'I requested a refund two weeks ago and still have not received it.', 'Pending', '2026-05-18 02:41:57'),
(9, 1, 'Account Login Issue', 'Account', 'I cannot log into my account even with the correct password.', 'Solved', '2026-05-18 02:41:57'),
(10, 1, 'Damaged Product', 'Shopping', 'The product arrived damaged and unusable.', 'Pending', '2026-05-18 02:41:57'),
(11, 1, 'Slow Website Performance', 'Technical', 'The website takes too long to load pages.', 'In Progress', '2026-05-18 02:41:57'),
(12, 1, 'Unprofessional Employee', 'Service', 'One of the employees treated customers disrespectfully.', 'Solved', '2026-05-18 02:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'ahmad', 'nothing@gmail.com', 'hi', '2026-05-18 02:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `created_at`) VALUES
(1, 'Aseel', 'Aseel@gmail.com', '$2y$10$N6qSJkHM.hqRzj2ucia1pOAgd63ZFxoQkaLsC6B/U63d4.sNk3LHK', '2026-05-18 02:16:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
