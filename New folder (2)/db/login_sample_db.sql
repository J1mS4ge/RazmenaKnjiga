-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 11:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_sample_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `user_images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `user_images`) VALUES
(1, 561240584722816, 'assets/1.jpg'),
(2, 56124058472281600, 'assets/3.jpg'),
(4, 6839131056066778, 'assets/5.jpg'),
(5, 561240584722816, 'assets/4.jpg'),
(6, 683913105606672, 'assets/4.jpg'),
(7, 56124058472281600, 'assets/1.jpg'),
(8, 56124058472281600, 'assets/2.jpg'),
(9, 6839131056066778, 'assets/2.jpg'),
(10, 6839131056066778, 'assets/1.jpg'),
(11, 6839131056066778, 'assets/3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `kratak_opis` varchar(255) DEFAULT NULL,
  `produzeni_opis` varchar(255) DEFAULT NULL,
  `slika` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `kratak_opis`, `produzeni_opis`, `slika`, `password`) VALUES
(1, 56124058472281600, 'admin', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse finibus, orci non imperdiet fermentum, leo sapien semper odio, nec sollicitudin erat orci non nisl.', 'assets/user1.png', 'admin'),
(2, 6839131056066778, 'admin123', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse finibus, orci non imperdiet fermentum, leo sapien semper odio, nec sollicitudin erat orci non nisl. Nunc lacinia placerat justo. Nulla sit amet sem a enim porttitor laoreet. Donec at est', 'assets/user2.png', 'admin123'),
(3, 683913105606672, 'user1', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse finibus, orci non imperdiet fermentum, leo sapien semper odio, nec sollicitudin erat orci non nisl. ', 'assets/user3.png', '123'),
(4, 561240584722816, 'user2', 'Lorem ipsum dolor ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse finibus, orci non imperdiet fermentum, leo sapien semper odio, nec sollicitudin erat orci non nisl. Nunc lacinia placerat justo. Nulla sit amet sem a enim porttitor laoreet. Donec at est', 'assets/user4.png', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `username` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
