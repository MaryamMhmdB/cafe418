-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Apr 18, 2026 at 07:19 PM
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
-- Database: `cafe418db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(12) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Email` varchar(254) NOT NULL,
  `FName` varchar(25) NOT NULL,
  `LName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `Password`, `Phone`, `Email`, `FName`, `LName`) VALUES
(1957, '123123', '0580139038', 'admin1957@gmail.com', 'Maryam', 'Basuraih'),
(5103, '12345678', '0550709903', 'admin5103@gmail.com', 'Haya', 'Abusaq'),
(5283, 'B.B5283', '0550992677', 'admin5283@gmail.com', 'Bushra', 'Baaqeel'),
(9051, 'Maha2003', '0560276424', 'admin9051@gmail.com', 'Maha', 'Barakat'),
(9066, 'ma123123', '0554059796', 'admin9066@gmail.com', 'Mariam', 'Barakat');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(20) NOT NULL,
  `PName` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Size` varchar(10) DEFAULT NULL,
  `stockQuantity` int(100) NOT NULL,
  `PDesc` text NOT NULL,
  `ingredients` text NOT NULL,
  `Allergens` text DEFAULT NULL,
  `PImg` varchar(100) NOT NULL COMMENT 'a path',
  `created_by` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `PName`, `Category`, `Price`, `Size`, `stockQuantity`, `PDesc`, `ingredients`, `Allergens`, `PImg`, `created_by`) VALUES
(15, 'Iced Latte', 'Cold Drinks', 21.40, 'Medium', 80, 'Chilled espresso with cold milk', 'espresso, cold milk, ice', 'Lactose', '/images/iced-latte.png', 5103),
(16, 'Iced Caramel Macchiato', 'Cold Drinks', 16.90, 'Medium', 80, 'Sweet espresso with caramel drizzle', 'espresso, milk, caramel, ice', 'Lactose', '/images/iced-caramel-macchiato.png', 5103),
(17, 'Iced Americano', 'Cold Drinks', 16.10, 'Medium', 80, 'Refreshing bold espresso over ice', 'espresso, cool water, ice', NULL, '/images/iced-americano.png', 5103),
(18, 'Strawberry Matcha Latte', 'Cold Drinks', 24.40, 'Medium', 70, 'Layered earthy matcha with fresh strawberry puree', 'matcha, strawberry, cold milk, ice', 'Lactose', '/images/strawberry-matcha.png', 5103),
(19, 'Espresso', 'Hot Drinks', 13.10, 'Single', 90, 'Pure strong coffee', 'coffee, water', NULL, '/images/espresso.png', 5103),
(20, 'Cortado', 'Hot Drinks', 15.80, 'Medium', 80, 'Equal espresso & milk', 'espresso, milk', 'Lactose', '/images/cortado.png', 5103),
(21, 'Flat White', 'Hot Drinks', 18.00, 'Medium', 80, 'Smooth velvety coffee', 'espresso, milk', 'Lactose', '/images/flat-white.png', 5103),
(22, 'Cappuccino', 'Hot Drinks', 17.30, 'Medium', 80, 'Rich foam & espresso', 'espresso, milk, foam', 'Lactose', '/images/cappuccino.png', 5103),
(23, 'Matcha Latte', 'Hot Drinks', 21.80, 'Medium', 70, 'Smooth green tea latte', 'matcha, milk', 'Lactose', '/images/matcha-latte.png', 5103),
(24, 'Almond Croissant', 'Bakery & Pastries', 16.90, NULL, 40, 'Classic, golden-brown flaky croissant', 'flour, butter, egg, almonds', 'Gluten, Dairy, Eggs, Nuts', '/images/almond_croissant.png', 5103),
(25, 'Brownie', 'Bakery & Pastries', 15.00, NULL, 50, 'Rich, fudgy chocolate brownie', 'dark chocolate, cocoa, butter, sugar', 'Gluten, Dairy, Eggs', '/images/brownie.png', 5103),
(26, 'Cookies', 'Bakery & Pastries', 13.10, NULL, 60, 'Soft and chewy with chocolate chunks', 'flour, butter, chocolate chips, vanilla', 'Gluten, Dairy, Eggs', '/images/cookies.png', 5103),
(27, 'Carrot Cake', 'Bakery & Pastries', 20.60, NULL, 30, 'Spiced cake with cream cheese frosting', 'carrots, walnuts, cinnamon, cream cheese', 'Gluten, Dairy, Eggs, Nuts', '/images/carrot-cake.png', 5103),
(28, 'Blueberry Tart', 'Bakery & Pastries', 14.60, NULL, 35, 'Buttery tart with fresh blueberries', 'flour, butter, blueberries, sugar, eggs', 'Gluten, Dairy, Eggs', '/images/blueberry-tart.png', 5103),
(30, 'Iced Mocha', 'Cold Drinks', 19.50, 'Medium', 75, 'Chilled espresso with chocolate and cold milk over ice', 'espresso, cold milk, chocolate syrup, ice', 'Lactose', '/images/iced-mocha.png', 5103);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `Admin-id` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9067;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `admin` (`adminID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
