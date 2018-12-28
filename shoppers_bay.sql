-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2017 at 10:29 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2876963_shopping_cart_priyom`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'Sony'),
(5, 'LG'),
(6, 'Cloth Brand');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_title` varchar(30) NOT NULL,
  `p_image` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_address`, `u_id`, `p_title`, `p_image`, `quantity`, `price`) VALUES
(18, 4, '0', 8, 'Iphone 6', 'iphone6.jpg', 1, 700),
(19, 15, '0', 8, 'kids shirt 2', 'kids_wear2.jpg', 3, 45),
(20, 2, '0', 8, 'Samsung Galaxy s5', 'galaxy_s5.jpg', 1, 600),
(21, 13, '0', 8, 'ladis pant 1', 'ladis_wear3.jpg', 1, 32),
(22, 1, '0', 10, 'Galaxy S4', 'galaxy_s4.jpg', 2, 500),
(23, 2, '0', 10, 'Samsung Galaxy s5', 'galaxy_s5.jpg', 2, 600),
(24, 3, '0', 10, 'Samsung Tv', 'led_tv.jpg', 2, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `title`) VALUES
(1, 'Electronics'),
(2, 'Ladis Wear'),
(3, 'Kids Wear'),
(4, 'Furnitures'),
(5, 'Home Appliances'),
(6, 'Electronic Gadgets'),
(7, 'Mens Wear');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `brand`, `title`, `price`, `description`, `image`, `keywords`) VALUES
(1, 1, 2, 'Galaxy S4', 500, 'it is an android phone.', 'galaxy_s4.jpg', 'samsung mobile electronics'),
(2, 1, 2, 'Samsung Galaxy s5', 600, 'this a updated phone.', 'galaxy_s5.jpg', 'samsung mobile galaxy s5'),
(3, 1, 2, 'Samsung Tv', 1000, 'This is a LED tv', 'led_tv.jpg', 'led tv samsung tv'),
(4, 1, 3, 'Iphone 6', 700, 'This Iphone 6.', 'iphone6.jpg', 'apple iphone 6 iphone6'),
(5, 1, 3, 'Ipad mini', 450, 'This is ipad mini.', 'ipad_mini.jpg', 'ipad mini apple'),
(6, 5, 4, 'Sony LED TV', 789, 'This is Sony LED TELEVISION', 'sony_led_tv.jpg', 'sony tv led bravia'),
(7, 5, 5, 'LG refrigerator', 1234, 'This is a LG Refrigaretor', 'lg_fridge.jpg', 'LG fridge refrigarator lg'),
(8, 7, 6, 'mens shirt 1', 23, 'sssssssssssssssssssssssssssssssssss', 'mens_wear_1.jpg', 'men shirt'),
(9, 7, 6, 'mens shirt 2', 56, 'sssssssssssssss22222', 'mens_wear_2.jpg', 'men shirt'),
(10, 7, 6, 'mens pant 1', 56, 'ssssssssssss3', 'mens_wear_3.jpg', 'men shirt wear'),
(11, 2, 6, 'ladis shirt 1', 123, 'this is a shirt', 'ladis_wear1.jpg', 'ladis wear shirt'),
(12, 2, 6, 'ladis shirt 2', 56, 'this is a shirt', 'ladis_wear2.jpg', 'ladis wear shirt'),
(13, 2, 6, 'ladis pant 1', 32, 'this is a pant', 'ladis_wear3.jpg', 'ladis wear pant'),
(14, 3, 6, 'kids shirt 1', 23, 'This is a shirt', 'kids_wear1.jpg', 'kid kids shirt'),
(15, 3, 6, 'kids shirt 2', 45, 'This is a shirt', 'kids_wear2.jpg', 'kid kids shirt'),
(16, 3, 6, 'kids pant 1', 89, 'This is a pant', 'kids_wear3.jpg', 'kid kids shirt');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address1` varchar(40) NOT NULL,
  `address2` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `f_name`, `s_name`, `email`, `pass`, `mobile`, `address1`, `address2`) VALUES
(5, 'Priojeet', 'Priyom', 'priojeet333@gmail.com', '25D55AD283AA400AF464C76D713C07AD', '01685982696', '4/a, provati-40, purbo pirmoholla, sylhe', 'dhaka'),
(6, 'Priojeet', 'Priyom', 'priojeet333@yahoo.com', '25D55AD283AA400AF464C76D713C07AD', '01685982696', '4/a, provati-40, purbo pirmoholla, sylhe', 'dhaka'),
(8, 'prithijeet', 'pritom', 'prithijeetpritom@gmail.com', 'a2d636799c0e6b41c784eb92bf457476', '01717874732', 'sylhet', 'dhaka'),
(9, 'Prosad', 'Das', 'prosaddas@gmail.com', '25d55ad283aa400af464c76d713c07ad', '01712102125', 'sylhet', 'shamshernagar'),
(10, 'temp', 'temp', '1', 'C4CA4238A0B923820DCC509A6F75849B', '1', '1', '1'),
(11, 'susanto', 'roy', 'susantoroy@gmail.com', '25d55ad283aa400af464c76d713c07ad', '01716942291', 'babugonj', 'shibchar'),
(12, 'abc', 'bcd', 'acbd@gmail.com', '794fd8df6686e85e0d8345670d2cd4ae', '01623705558', 'abcd', 'acd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
