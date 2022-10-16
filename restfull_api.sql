-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 07:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restfull_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_rest`
--

CREATE TABLE `login_rest` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_rest`
--

INSERT INTO `login_rest` (`id`, `username`, `email`, `password`) VALUES
(1, 'ammu', 'bc@gmail.com', '123'),
(2, 'ammutty', 'abcd@gmail.com', '12345'),
(3, 'Ammukutty', 'ammu@gmail.com', 'Ammu@123'),
(4, 'Ammukutty Pradeep', 'ammu@gmail.com', 'Ammu@123'),
(5, 'Anandhu', 'anandhu@gmail.com', 'Ananadhu'),
(6, 'taylor', 'taylor@gmail.com', 'Taylor@1');

-- --------------------------------------------------------

--
-- Table structure for table `product_tb`
--

CREATE TABLE `product_tb` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `SKU` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_tb`
--

INSERT INTO `product_tb` (`id`, `product_name`, `price`, `SKU`, `description`) VALUES
(1, 'variation', 300, 'woo-vneck-tee', 'Lorem ipsum dolor sit amet , consectetur adipiscing elit.Vestibulum sagittis orci ac odio dictum tincidunt.Denec ut metus leo .Class aptent'),
(2, 'simple', 600, 'woo-hoodie', 'Lorem ipsum dolor sit amet , consectetur adipiscing elit.Vestibulum sagittis orci ac odio dictum tincidunt.Denec ut metus leo .Class aptent'),
(3, 'new jersy', 400, 'woo-hoodie-with-logo', 'Lorem ipsum dolor sit amet , consectetur adipiscing elit.Vestibulum sagittis orci ac odio dictum tincidunt.Denec ut metus leo .Class aptent'),
(4, 'virtual', 450, 'woo-tshirt', 'Lorem ipsum dolor sit amet , consectetur adipiscing elit.Vestibulum sagittis orci ac odio dictum tincidunt.Denec ut metus leo .Class aptent'),
(5, 'blanket', 200, 'woo-cap', 'Lorem ipsum dolor sit amet , consectetur adipiscing elit.Vestibulum sagittis orci ac odio dictum tincidunt.Denec ut metus leo .Class aptent'),
(6, 'googly', 100, 'woo-belt', 'Lorem ipsum dolor sit amet , consectetur adipiscing elit.Vestibulum sagittis orci ac odio dictum tincidunt.Denec ut metus leo .Class aptent'),
(7, 'simus', 250, 'woo-sunglasses', 'Lorem ipsum dolor sit amet , consectetur adipiscing elit.Vestibulum sagittis orci ac odio dictum tincidunt.Denec ut metus leo .Class aptent'),
(8, 'bloh', 800, 'woo-beanie', 'Lorem ipsum dolor sit amet , consectetur adipiscing elit.Vestibulum sagittis orci ac odio dictum tincidunt.Denec ut metus leo .Class aptent'),
(9, 'variable', 100, 'woo-polo', 'Lorem ipsum dolor sit amet , consectetur adipiscing elit.Vestibulum sagittis orci ac odio dictum tincidunt.Denec ut metus leo .Class aptent'),
(10, 'global', 150, 'woo-single', 'Lorem ipsum dolor sit amet , consectetur adipiscing elit.Vestibulum sagittis orci ac odio dictum tincidunt.Denec ut metus leo .Class aptent'),
(11, 'variety', 1000, 'woo-vneck-tee-red', 'Lorem ipsum dolor sit amet , consectetur adipiscing elit.Vestibulum sagittis orci ac odio dictum tincidunt.Denec ut metus leo .Class aptent'),
(12, 'local', 235, 'woo-beanie-logo', 'Lorem ipsum dolor sit amet , consectetur adipiscing elit.Vestibulum sagittis orci ac odio dictum tincidunt.Denec ut metus leo .Class aptent'),
(13, 'looming', 450, 'woo-pennant', 'Lorem ipsum dolor sit amet , consectetur adipiscing elit.Vestibulum sagittis orci ac odio dictum tincidunt.Denec ut metus leo .Class aptent'),
(14, 'streaming', 275, 'woo-long-sleev-tee', 'Lorem ipsum dolor sit amet , consectetur adipiscing elit.Vestibulum sagittis orci ac odio dictum tincidunt.Denec ut metus leo .Class aptent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_rest`
--
ALTER TABLE `login_rest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_rest`
--
ALTER TABLE `login_rest`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_tb`
--
ALTER TABLE `product_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
