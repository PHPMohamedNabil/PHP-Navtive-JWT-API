-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 08:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `native_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Fashion', 'Category for anything related to fashion.', '2014-06-01 00:35:07', '2014-05-30 14:34:33'),
(2, 'Electronics', 'Gadgets, drones and more.', '2014-06-01 00:35:07', '2014-05-30 14:34:33'),
(3, 'Motors', 'Motor sports and more', '2014-06-01 00:35:07', '2014-05-30 14:34:54'),
(5, 'Movies', 'Movie products.', '0000-00-00 00:00:00', '2016-01-08 11:27:26'),
(6, 'Books', 'Kindle books, audio books and more.', '0000-00-00 00:00:00', '2016-01-08 11:27:47'),
(13, 'Sports', 'Drop into new winter gear.', '2016-01-09 02:24:24', '2016-01-08 23:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `migration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `created_at`) VALUES
(1, 'categories__2023_08_29_16_40_30.php', '2023-08-29 14:42:51'),
(2, 'products__2023_08_29_16_41_35.php', '2023-08-29 14:42:51'),
(3, 'users__2023_09_03_17_56_59.php', '2023-09-03 16:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `created`, `modified`) VALUES
(1, 'LG P880 4X HD', 'My first awesome phone!', 336, 3, '2014-06-01 01:12:26', '2014-05-31 14:12:26'),
(2, 'Google Nexus 4', 'The most awesome phone of 2013!', 299, 2, '2014-06-01 01:12:26', '2014-05-31 14:12:26'),
(6, 'Bench Shirt', 'The best shirt!', 29, 1, '2014-06-01 01:12:26', '2014-05-30 23:12:21'),
(7, 'Lenovo Laptop', 'My business partner.', 399, 2, '2014-06-01 01:13:45', '2014-05-30 23:13:39'),
(8, 'Samsung Galaxy Tab 10.1', 'Good tablet.', 259, 2, '2014-06-01 01:14:13', '2014-05-30 23:14:08'),
(9, 'Spalding Watch', 'My sports watch.', 199, 1, '2014-06-01 01:18:36', '2014-05-30 23:18:31'),
(10, 'test', 'The coolest smart watch!', 300, 2, '2014-06-06 17:10:01', '2014-06-05 15:09:51'),
(11, 'Huawei Y300', 'For testing purposes.', 100, 2, '2014-06-06 17:11:04', '2014-06-05 15:10:54'),
(12, 'Abercrombie Lake Arnold Shirt', 'Perfect as gift!', 60, 1, '2014-06-06 17:12:21', '2014-06-05 15:12:11'),
(13, 'Abercrombie Allen Brook Shirt', 'Cool red shirt!', 70, 1, '2014-06-06 17:12:59', '2014-06-05 15:12:49'),
(26, 'Another product', 'Awesome product!', 555, 2, '2014-11-22 19:07:34', '2014-11-21 18:07:34'),
(28, 'Wallet', 'You can absolutely use this one!', 799, 6, '2014-12-04 21:12:03', '2014-12-03 20:12:03'),
(31, 'Amanda Waller Shirt', 'New awesome shirt!', 333, 1, '2014-12-13 00:52:54', '2014-12-11 23:52:54'),
(42, 'Nike Shoes for Men', 'Nike Shoes', 12999, 3, '2015-12-12 06:47:08', '2015-12-12 03:47:08'),
(48, 'Bristol Shoes', 'Awesome shoes.', 999, 5, '2016-01-08 06:36:37', '2016-01-08 03:36:37'),
(60, 'Rolex Watch', 'Luxury watch.', 25000, 1, '2016-01-11 15:46:02', '2016-01-11 12:46:02'),
(61, 'habmola', 'hola ya wlad al hola', 20, 4, '0000-00-00 00:00:00', '2023-08-30 13:51:45'),
(62, 'habmola', 'hola ya wlad al hola', 20, 4, '0000-00-00 00:00:00', '2023-08-30 13:51:59'),
(63, 'habmola', 'hola ya wlad al hola', 20, 4, '0000-00-00 00:00:00', '2023-08-30 13:52:03'),
(64, 'habmola', 'hola ya wlad al hola', 20, 4, '0000-00-00 00:00:00', '2023-08-30 13:52:05'),
(65, 'habmola', 'hola ya wlad al hola', 20, 4, '0000-00-00 00:00:00', '2023-08-30 13:52:27'),
(66, 'habmola', 'hola ya wlad al hola', 20, 4, '0000-00-00 00:00:00', '2023-08-30 13:52:29'),
(67, 'habmola', 'hola ya wlad al hola', 20, 4, '0000-00-00 00:00:00', '2023-08-30 13:52:39'),
(68, 'habmola', 'hola ya wlad al hola', 20, 4, '0000-00-00 00:00:00', '2023-08-30 13:52:44'),
(69, 'Amazing Pillow 3.0', 'hola ya wlad al hola', 20, 4, '0000-00-00 00:00:00', '2023-08-30 13:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`, `modified`) VALUES
(12, 'mohamed', '$2y$10$uJ.dYTk7xQ6JnDdLpCQt.OSTXoO0XLmUBE/UHjqgnRvDsSpjaR93S', '2023-09-10 18:46:48', '2023-09-10 18:46:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
