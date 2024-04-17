-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2024 at 09:42 PM
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
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `Addresses`
--

CREATE TABLE `Addresses` (
  `AddressID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `AddressLine1` varchar(100) DEFAULT NULL,
  `AddressLine2` varchar(100) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `ZipCode` varchar(20) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Addresses`
--

INSERT INTO `Addresses` (`AddressID`, `UserID`, `AddressLine1`, `AddressLine2`, `City`, `State`, `ZipCode`, `Country`) VALUES
(1, 2, '123 Main St', NULL, 'New York', 'NY', '10001', 'USA'),
(2, 3, '456 Elm St', NULL, 'Los Angeles', 'CA', '90001', 'USA'),
(3, 2, '123 Main St', NULL, 'New York', 'NY', '10001', 'USA'),
(4, 3, '456 Elm St', NULL, 'Los Angeles', 'CA', '90001', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `Authors`
--

CREATE TABLE `Authors` (
  `AuthorID` int(11) NOT NULL,
  `AuthorName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Authors`
--

INSERT INTO `Authors` (`AuthorID`, `AuthorName`) VALUES
(1, 'John Smith'),
(2, 'Emily Johnson'),
(3, 'Michael Brown'),
(4, 'Emma Wilson'),
(9, 'Nguyen Nhat Anh'),
(10, 'J.K. Rowling');

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Fiction'),
(2, 'Non-fiction'),
(3, 'Science Fiction'),
(4, 'Fantasy'),
(5, 'Romance'),
(6, 'Mystery'),
(7, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `Coupons`
--

CREATE TABLE `Coupons` (
  `CouponID` int(11) NOT NULL,
  `CouponCode` varchar(50) DEFAULT NULL,
  `DiscountPercentage` decimal(5,2) DEFAULT NULL,
  `ExpiryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Coupons`
--

INSERT INTO `Coupons` (`CouponID`, `CouponCode`, `DiscountPercentage`, `ExpiryDate`) VALUES
(1, 'SPRINGSALE', 10.00, '2024-04-30'),
(2, 'SUMMERSALE', 15.00, '2024-06-30'),
(3, 'SPRINGSALE', 10.00, '2024-04-30'),
(4, 'SUMMERSALE', 15.00, '2024-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `Favorites`
--

CREATE TABLE `Favorites` (
  `FavoriteID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Favorites`
--

INSERT INTO `Favorites` (`FavoriteID`, `UserID`, `ProductID`) VALUES
(1, 2, 1),
(2, 3, 3),
(3, 2, 1),
(4, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Images`
--

CREATE TABLE `Images` (
  `ImageID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `ImageURL` varchar(255) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `AuthorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Images`
--

INSERT INTO `Images` (`ImageID`, `ProductID`, `ImageURL`, `UserID`, `AuthorID`) VALUES
(1, NULL, 'Nguyen_Nhat_Anh.jpg', NULL, 9),
(2, 2, 'harry_potter_the_philosopher_Stone.jpg', NULL, NULL),
(3, 3, 'https://example.com/image3.jpg', NULL, NULL),
(4, 1, '7741-ngay-xua-co-mot-chuyen-tinh-1.jpg', NULL, NULL),
(5, 2, 'https://example.com/image2.jpg', NULL, NULL),
(6, 3, 'https://example.com/image3.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetails`
--

CREATE TABLE `OrderDetails` (
  `OrderDetailID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `UnitPrice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `OrderDetails`
--

INSERT INTO `OrderDetails` (`OrderDetailID`, `OrderID`, `ProductID`, `Quantity`, `UnitPrice`) VALUES
(1, 1, 1, 1, 10.99),
(2, 1, 2, 1, 15.99),
(3, 2, 3, 1, 12.50),
(4, 1, 1, 1, 12.99),
(5, 1, 2, 2, 10.50),
(6, 2, 3, 1, 9.99),
(7, 2, 4, 1, 11.49);

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL,
  `TotalPrice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`OrderID`, `UserID`, `OrderDate`, `TotalPrice`) VALUES
(1, 2, '2024-04-15', 25.98),
(2, 3, '2024-04-16', 12.50),
(3, 2, '2024-04-15', 25.98),
(4, 3, '2024-04-16', 12.50);

-- --------------------------------------------------------

--
-- Table structure for table `Payments`
--

CREATE TABLE `Payments` (
  `PaymentID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `PaymentMethod` varchar(50) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Payments`
--

INSERT INTO `Payments` (`PaymentID`, `OrderID`, `PaymentMethod`, `PaymentDate`, `Amount`) VALUES
(1, 1, 'Credit Card', '2024-04-15', 25.98),
(2, 2, 'PayPal', '2024-04-16', 12.50),
(3, 1, 'Credit Card', '2024-04-15', 25.98),
(4, 2, 'PayPal', '2024-04-16', 12.50);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `StockQuantity` int(11) NOT NULL,
  `AuthorID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ProductID`, `ProductName`, `Description`, `Price`, `StockQuantity`, `AuthorID`, `CategoryID`) VALUES
(1, 'The Girl from Yesterday', 'A sweet love story by Nguyen Nhat Anh', 10.99, 50, 1, 7),
(2, 'Harry Potter and the Philosopher\'s Stone', 'The first book of the famous Harry Potter series', 15.99, 100, 2, 4),
(3, 'Norwegian Wood', 'One of the famous works by Haruki Murakami', 12.50, 80, 3, 3),
(4, 'Pride and Prejudice', 'One of the classic novels by Jane Austen', 9.99, 60, 4, 2),
(5, 'The Great Gatsby', 'A novel by F. Scott Fitzgerald', 12.99, 100, 3, 1),
(6, 'To Kill a Mockingbird', 'A classic by Harper Lee', 10.50, 80, 1, 7),
(7, '1984', 'A dystopian novel by George Orwell', 9.99, 120, 4, 7),
(8, 'Pride and Prejudice', 'A romantic novel by Jane Austen', 11.49, 90, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Publishers`
--

CREATE TABLE `Publishers` (
  `PublisherID` int(11) NOT NULL,
  `PublisherName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Publishers`
--

INSERT INTO `Publishers` (`PublisherID`, `PublisherName`) VALUES
(1, 'ABC Publications'),
(2, 'XYZ Books'),
(3, 'Bestseller Publishing'),
(4, 'Great Reads Press');

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `ReviewID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Comment` text DEFAULT NULL,
  `ReviewDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`ReviewID`, `UserID`, `ProductID`, `Rating`, `Comment`, `ReviewDate`) VALUES
(1, 2, 1, 4, 'The book is very good, I like the way the author writes.', '2024-04-15'),
(2, 3, 3, 5, 'One of my favorite works.', '2024-04-16'),
(3, 2, 1, 5, 'One of my favorite books!', '2024-04-15'),
(4, 3, 3, 4, 'Interesting read, but a bit too dark for my taste.', '2024-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`RoleID`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Guest'),
(4, 'Admin'),
(5, 'User'),
(6, 'Guest'),
(7, 'Admin'),
(8, 'User'),
(9, 'Guest'),
(10, 'Admin'),
(11, 'User'),
(12, 'Guest'),
(13, 'Admin'),
(14, 'User'),
(15, 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `Shipping`
--

CREATE TABLE `Shipping` (
  `ShippingID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `ShippingMethod` varchar(50) DEFAULT NULL,
  `TrackingNumber` varchar(100) DEFAULT NULL,
  `ShippingDate` date DEFAULT NULL,
  `EstimatedDeliveryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `RoleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `Username`, `Password`, `Email`, `RoleID`) VALUES
(1, 'admin', 'adminpassword', 'admin@example.com', 1),
(2, 'user1', 'userpassword', 'user1@example.com', 2),
(3, 'user2', 'userpassword', 'user2@example.com', 2),
(4, 'admin', 'adminpassword', 'admin@example.com', 1),
(5, 'user1', 'userpassword', 'user1@example.com', 2),
(6, 'user2', 'userpassword', 'user2@example.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Addresses`
--
ALTER TABLE `Addresses`
  ADD PRIMARY KEY (`AddressID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `Authors`
--
ALTER TABLE `Authors`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `Coupons`
--
ALTER TABLE `Coupons`
  ADD PRIMARY KEY (`CouponID`);

--
-- Indexes for table `Favorites`
--
ALTER TABLE `Favorites`
  ADD PRIMARY KEY (`FavoriteID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `Images`
--
ALTER TABLE `Images`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `fk_Images_UserID` (`UserID`),
  ADD KEY `fk_Images_AuthorID` (`AuthorID`);

--
-- Indexes for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `Payments`
--
ALTER TABLE `Payments`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `AuthorID` (`AuthorID`),
  ADD KEY `fk_Products_CategoryID` (`CategoryID`);

--
-- Indexes for table `Publishers`
--
ALTER TABLE `Publishers`
  ADD PRIMARY KEY (`PublisherID`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `Shipping`
--
ALTER TABLE `Shipping`
  ADD PRIMARY KEY (`ShippingID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Addresses`
--
ALTER TABLE `Addresses`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Authors`
--
ALTER TABLE `Authors`
  MODIFY `AuthorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Coupons`
--
ALTER TABLE `Coupons`
  MODIFY `CouponID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Favorites`
--
ALTER TABLE `Favorites`
  MODIFY `FavoriteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Images`
--
ALTER TABLE `Images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  MODIFY `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Payments`
--
ALTER TABLE `Payments`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Publishers`
--
ALTER TABLE `Publishers`
  MODIFY `PublisherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Shipping`
--
ALTER TABLE `Shipping`
  MODIFY `ShippingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Addresses`
--
ALTER TABLE `Addresses`
  ADD CONSTRAINT `Addresses_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`);

--
-- Constraints for table `Favorites`
--
ALTER TABLE `Favorites`
  ADD CONSTRAINT `Favorites_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`),
  ADD CONSTRAINT `Favorites_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `Products` (`ProductID`);

--
-- Constraints for table `Images`
--
ALTER TABLE `Images`
  ADD CONSTRAINT `Images_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `Products` (`ProductID`),
  ADD CONSTRAINT `fk_Images_AuthorID` FOREIGN KEY (`AuthorID`) REFERENCES `Authors` (`AuthorID`),
  ADD CONSTRAINT `fk_Images_UserID` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`);

--
-- Constraints for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD CONSTRAINT `OrderDetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `Orders` (`OrderID`),
  ADD CONSTRAINT `OrderDetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `Products` (`ProductID`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`);

--
-- Constraints for table `Payments`
--
ALTER TABLE `Payments`
  ADD CONSTRAINT `Payments_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `Orders` (`OrderID`);

--
-- Constraints for table `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `Products_ibfk_1` FOREIGN KEY (`AuthorID`) REFERENCES `Authors` (`AuthorID`),
  ADD CONSTRAINT `fk_Products_CategoryID` FOREIGN KEY (`CategoryID`) REFERENCES `Categories` (`CategoryID`);

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `Reviews_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`),
  ADD CONSTRAINT `Reviews_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `Products` (`ProductID`);

--
-- Constraints for table `Shipping`
--
ALTER TABLE `Shipping`
  ADD CONSTRAINT `Shipping_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `Orders` (`OrderID`);

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `Roles` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
