-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 02:17 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobilestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `airpods`
--

CREATE TABLE `airpods` (
  `id` int(50) NOT NULL,
  `productName` char(50) NOT NULL,
  `productNum` char(50) NOT NULL,
  `productPrice` char(50) NOT NULL,
  `productCount` char(255) NOT NULL,
  `productImage` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `airpods`
--

INSERT INTO `airpods` (`id`, `productName`, `productNum`, `productPrice`, `productCount`, `productImage`) VALUES
(1, 'JBL', '2901', '119.95', '9', 'airpods1.jpg'),
(2, 'Apple', '2905', '159.00', '5', 'airpods2.jpg'),
(3, 'PwerBeats', '2980', '179.95', '12', 'airpods3.jpg'),
(4, 'Galaxy Buds', '2986', '99.00', '4', 'airpods4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(50) NOT NULL,
  `userName` char(50) NOT NULL,
  `productName` char(50) NOT NULL,
  `productNum` char(50) NOT NULL,
  `productPrice` char(50) NOT NULL,
  `productCount` char(255) NOT NULL,
  `productImage` char(255) NOT NULL,
  `quantity` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(50) NOT NULL,
  `firstName` char(50) NOT NULL,
  `lastName` char(50) NOT NULL,
  `email` char(255) NOT NULL,
  `phoneNumber` char(50) NOT NULL,
  `message` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `headphone`
--

CREATE TABLE `headphone` (
  `id` int(50) NOT NULL,
  `productName` char(50) NOT NULL,
  `productNum` char(50) NOT NULL,
  `productPrice` char(50) NOT NULL,
  `productCount` char(255) NOT NULL,
  `productImage` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `headphone`
--

INSERT INTO `headphone` (`id`, `productName`, `productNum`, `productPrice`, `productCount`, `productImage`) VALUES
(1, 'Beats Black', '10025', '199.95', '13', 'headphone1.jpg'),
(2, 'Beats Red', '10060', '249.95', '6', 'headphone4.jpeg'),
(3, 'Beats Pink', '10099', '179.95', '5', 'headphone2.jpg'),
(4, 'Beats Purple', '11000', '130.65', '30', 'headphone3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `iphone`
--

CREATE TABLE `iphone` (
  `id` int(50) NOT NULL,
  `productName` char(50) NOT NULL,
  `productNum` char(50) NOT NULL,
  `productPrice` char(50) NOT NULL,
  `productCount` char(255) NOT NULL,
  `productImage` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `iphone`
--

INSERT INTO `iphone` (`id`, `productName`, `productNum`, `productPrice`, `productCount`, `productImage`) VALUES
(1, 'Iphone SE', '1980', '768.56', '20', 'iphonese.jpg'),
(2, 'Iphone 13 Pro', '1992', '750.00', '10', 'iphone13.jpg'),
(3, 'Iphone 14', '2089', '897.25', '18', 'iphone14.jpg'),
(4, 'Iphone 14 Pro', '2190', '6700.00', '13', 'iphone14pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `userName`, `email`, `password`) VALUES
(1, 'manager', 'mehio2000@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(50) NOT NULL,
  `name` char(50) NOT NULL,
  `number` char(50) NOT NULL,
  `email` char(255) NOT NULL,
  `cardName` char(50) NOT NULL,
  `cardNumber` char(50) NOT NULL,
  `ccv` char(50) NOT NULL,
  `cardCode` char(50) NOT NULL,
  `city` char(50) NOT NULL,
  `streetName` char(255) NOT NULL,
  `buildName` char(255) NOT NULL,
  `flatNumber` char(255) NOT NULL,
  `totalPrice` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `number`, `email`, `cardName`, `cardNumber`, `ccv`, `cardCode`, `city`, `streetName`, `buildName`, `flatNumber`, `totalPrice`) VALUES
(1, 'hassan', '0952499718', 'hassan_najjar95@hotmail.com', '---', '---', '---', '---', 'aleppo', 'tishreen', 'alakhras', '22', '6591.35'),
(2, 'essa', '095889998', 'hassan_najjar95@hotmail.com', 'essa', '111', '222', '0000', 'aleppo', 'mogambo', 'najjar', '33', '5141.99');

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `id` int(50) NOT NULL,
  `userName` char(50) NOT NULL,
  `productName` char(50) NOT NULL,
  `productNum` char(50) NOT NULL,
  `productPrice` char(50) NOT NULL,
  `productCount` char(255) NOT NULL,
  `productImage` char(255) NOT NULL,
  `quantity` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `samsung`
--

CREATE TABLE `samsung` (
  `id` int(50) NOT NULL,
  `productName` char(50) NOT NULL,
  `productNum` char(50) NOT NULL,
  `productPrice` char(50) NOT NULL,
  `productCount` char(255) NOT NULL,
  `productImage` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `samsung`
--

INSERT INTO `samsung` (`id`, `productName`, `productNum`, `productPrice`, `productCount`, `productImage`) VALUES
(1, 'Samsung S20 Ultra', '2200', '850.80', '30', 'galaxy-s20-ultra.jpeg'),
(2, 'Samsung S21 Ultra', '2205', '900.95', '20', 'galaxy-s21-ultra.jpg'),
(3, 'Samsung S22 Ultra', '2208', '680.00', '22', 'galaxy-s22-ultra.webp'),
(4, 'Samsung S23 Ultra', '2250', '580.45', '18', 'galaxy-s23-ultra.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userproducts`
--

CREATE TABLE `userproducts` (
  `id` int(50) NOT NULL,
  `userName` char(50) NOT NULL,
  `productName` char(50) NOT NULL,
  `productNum` char(50) NOT NULL,
  `productPrice` char(50) NOT NULL,
  `productCount` char(255) NOT NULL,
  `productImage` char(255) NOT NULL,
  `quantity` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userproducts`
--

INSERT INTO `userproducts` (`id`, `userName`, `productName`, `productNum`, `productPrice`, `productCount`, `productImage`, `quantity`) VALUES
(17, 'hassan', 'Iphone 14', '2089', '897.25', '18', 'iphone14.jpg', '7'),
(18, 'hassan', 'PwerBeats', '2980', '179.95', '12', 'airpods3.jpg', '1'),
(19, 'hassan', 'Beats Purple', '11000', '130.65', '30', 'headphone3.jpg', '1'),
(20, 'essa', 'HTC Vive', '10389', '400.00', '33', 'vrGlasses2.jpg', '5'),
(21, 'essa', 'Meta', '10190', '999.99', '16', 'vrGlasses1.jpg', '1'),
(22, 'essa', 'Watch Original', '10490', '249.00', '50', 'watch3.jpg', '7'),
(23, 'essa', 'Watch Soprts Edition', '10504', '399.00', '11', 'watch1.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `image`, `email`, `password`, `status`) VALUES
(1, 'hassan', 'profile.svg', 'hassan_najjar95@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'offline'),
(2, 'ahmad', 'profile.svg', 'ahmad1999@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'offline'),
(3, 'raed', 'profile.svg', 'raed1998@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'offline'),
(4, 'essa', 'profile.svg', 'essa2003@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `vrglasses`
--

CREATE TABLE `vrglasses` (
  `id` int(50) NOT NULL,
  `productName` char(50) NOT NULL,
  `productNum` char(50) NOT NULL,
  `productPrice` char(50) NOT NULL,
  `productCount` char(255) NOT NULL,
  `productImage` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vrglasses`
--

INSERT INTO `vrglasses` (`id`, `productName`, `productNum`, `productPrice`, `productCount`, `productImage`) VALUES
(1, 'Meta', '10190', '999.99', '16', 'vrGlasses1.jpg'),
(2, 'Qual Gear', '10206', '130.45', '12', 'vrGlasses4.jpg'),
(3, 'Utobia 360', '10207', '16.00', '24', 'vrGlasses3.jpg'),
(4, 'HTC Vive', '10389', '400.00', '33', 'vrGlasses2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `watch`
--

CREATE TABLE `watch` (
  `id` int(50) NOT NULL,
  `productName` char(50) NOT NULL,
  `productNum` char(50) NOT NULL,
  `productPrice` char(50) NOT NULL,
  `productCount` char(255) NOT NULL,
  `productImage` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `watch`
--

INSERT INTO `watch` (`id`, `productName`, `productNum`, `productPrice`, `productCount`, `productImage`) VALUES
(1, 'Watch Limited Edition', '10405', '399.00', '20', 'watch4.jpg'),
(2, 'Watch Bracelet', '10455', '299.00', '45', 'watch2.jpg'),
(3, 'Watch Original', '10490', '249.00', '50', 'watch3.jpg'),
(4, 'Watch Soprts Edition', '10504', '399.00', '11', 'watch1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `xiaomi`
--

CREATE TABLE `xiaomi` (
  `id` int(50) NOT NULL,
  `productName` char(50) NOT NULL,
  `productNum` char(50) NOT NULL,
  `productPrice` char(50) NOT NULL,
  `productCount` char(255) NOT NULL,
  `productImage` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xiaomi`
--

INSERT INTO `xiaomi` (`id`, `productName`, `productNum`, `productPrice`, `productCount`, `productImage`) VALUES
(1, 'Xiaomi 12T', '2600', '380.66', '24', 'Xiaomi12T.png'),
(2, 'Xiaomi 13', '2680', '467.33', '26', 'Xiaomi13.png'),
(3, 'Xiaomi 13 Lite', '2720', '568.97', '19', 'Xiaomi13lite.png'),
(4, 'Xiaomi 13 Pro', '2744', '645.225', '10', 'Xiaomi13pro.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airpods`
--
ALTER TABLE `airpods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headphone`
--
ALTER TABLE `headphone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iphone`
--
ALTER TABLE `iphone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`id`);

--
-- Indexes for table `samsung`
--
ALTER TABLE `samsung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userproducts`
--
ALTER TABLE `userproducts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vrglasses`
--
ALTER TABLE `vrglasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watch`
--
ALTER TABLE `watch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xiaomi`
--
ALTER TABLE `xiaomi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airpods`
--
ALTER TABLE `airpods`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `headphone`
--
ALTER TABLE `headphone`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `iphone`
--
ALTER TABLE `iphone`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `samsung`
--
ALTER TABLE `samsung`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userproducts`
--
ALTER TABLE `userproducts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vrglasses`
--
ALTER TABLE `vrglasses`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `watch`
--
ALTER TABLE `watch`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `xiaomi`
--
ALTER TABLE `xiaomi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
