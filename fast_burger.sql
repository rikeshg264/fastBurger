-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 12:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fast_burger`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_tel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_tel`) VALUES
(1, 'John Doe', '123-456-7890'),
(2, 'Jane Smith', '987-654-3210'),
(3, 'Alice Johnson', '555-123-4567'),
(4, 'Bob Williams', '777-888-9999'),
(5, 'Emily Wilson', '555-555-5555'),
(6, 'Michael Brown', '111-222-3333'),
(7, 'Sarah Davis', '444-444-4444'),
(8, 'David Jones', '999-888-7777'),
(9, 'Laura Taylor', '666-777-8888'),
(10, 'Chris Anderson', '333-222-1111');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `item_cost` double(10,2) DEFAULT NULL,
  `stock_limit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_cost`, `stock_limit`) VALUES
(1, 'Classic Burger', 5.99, 100),
(2, 'Cheeseburger', 6.99, 120),
(3, 'Bacon Burger', 7.49, 150),
(4, 'BBQ Burger', 8.99, 180),
(5, 'Veggie Burger', 3.99, 200),
(6, 'Chicken Burger', 4.49, 250),
(7, 'Double Burger', 9.99, 90),
(8, 'Fish Burger', 10.49, 110),
(9, 'Mushroom Burger', 11.99, 80),
(10, 'Turkey Burger', 12.99, 70),
(11, 'French Fries (Regular)', 2.49, 300),
(12, 'French Fries (Large)', 3.49, 200),
(13, 'Onion Rings', 3.99, 150),
(14, 'Coleslaw', 1.99, 200),
(15, 'Soft Drink (Regular)', 1.99, 200),
(16, 'Soft Drink (Large)', 2.49, 150),
(17, 'Bottled Water', 1.49, 100);

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `menu_type_id` int(11) NOT NULL,
  `fk_saver_id` int(11) DEFAULT NULL,
  `fk_regular_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_type`
--

INSERT INTO `menu_type` (`menu_type_id`, `fk_saver_id`, `fk_regular_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_time` time DEFAULT NULL,
  `fk_customer_id` int(11) DEFAULT NULL,
  `fk_payment_id` int(11) DEFAULT NULL,
  `fk_staff_id` int(11) DEFAULT NULL,
  `fk_menu_type_id` int(11) DEFAULT NULL,
  `fk_store_id` int(11) DEFAULT NULL,
  `menu_name` varchar(64) NOT NULL DEFAULT 'saver'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_date`, `order_time`, `fk_customer_id`, `fk_payment_id`, `fk_staff_id`, `fk_menu_type_id`, `fk_store_id`, `menu_name`) VALUES
(11, '2024-04-01', '12:00:00', 1, 1, 2, 1, 1, 'saver'),
(12, '2024-04-02', '13:30:00', 2, 2, 1, 2, 2, 'regular'),
(13, '2024-04-03', '19:00:00', 3, 3, 1, 3, 3, 'saver'),
(14, '2024-04-04', '08:45:00', 4, 1, 4, 4, 4, 'saver'),
(15, '2024-04-05', '15:20:00', 5, 4, 5, 5, 5, 'regular'),
(16, '2024-04-06', '18:10:00', 6, 5, 6, 6, 6, 'regular'),
(17, '2024-04-07', '11:55:00', 7, 2, 7, 7, 7, 'saver'),
(18, '2024-04-08', '20:30:00', 8, 5, 10, 8, 8, 'regular'),
(19, '2024-04-09', '09:15:00', 9, 4, 9, 9, 9, 'saver'),
(20, '2024-04-10', '14:40:00', 10, 2, 10, 10, 10, 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_items_id` int(11) NOT NULL,
  `fk_item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `fk_order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_items_id`, `fk_item_id`, `quantity`, `fk_order_id`) VALUES
(1, 1, 2, 1),
(2, 2, 1, 2),
(3, 3, 3, 3),
(4, 4, 1, 4),
(5, 5, 2, 5),
(6, 6, 2, 6),
(7, 7, 1, 7),
(8, 8, 3, 8),
(9, 9, 2, 9),
(10, 10, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_type`) VALUES
(1, 'Cash'),
(2, 'Card'),
(3, 'Crypto'),
(4, 'Apple Pay'),
(5, 'Google Pay');

-- --------------------------------------------------------

--
-- Table structure for table `regular_menu`
--

CREATE TABLE `regular_menu` (
  `regular_menu_id` int(11) NOT NULL,
  `regular_menu_meal_type` varchar(255) DEFAULT NULL,
  `regular_menu_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regular_menu`
--

INSERT INTO `regular_menu` (`regular_menu_id`, `regular_menu_meal_type`, `regular_menu_type`) VALUES
(1, 'Lunch', 'Combo'),
(2, 'Lunch', 'Burger'),
(3, 'Dinner', 'Combo'),
(4, 'Dinner', 'Burger');

-- --------------------------------------------------------

--
-- Table structure for table `saver_menu`
--

CREATE TABLE `saver_menu` (
  `saver_menu_id` int(11) NOT NULL,
  `saver_menu_name` varchar(255) DEFAULT NULL,
  `saver_menu_item` varchar(255) DEFAULT NULL,
  `saver_menu_deal` varchar(255) DEFAULT NULL,
  `saver_menu_start` date DEFAULT NULL,
  `saver_menu_end` date DEFAULT NULL,
  `saver_menu_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saver_menu`
--

INSERT INTO `saver_menu` (`saver_menu_id`, `saver_menu_name`, `saver_menu_item`, `saver_menu_deal`, `saver_menu_start`, `saver_menu_end`, `saver_menu_type`) VALUES
(1, 'Lunch Combo', 'Classic Burger', 'Buy one get one free', '2024-04-01', '2024-04-30', 'Lunch'),
(2, 'Family Meal', 'Double Burger', '20% off for 4 or more', '2024-04-01', '2024-04-30', 'Dinner'),
(3, 'Student Deal', 'Cheeseburger', 'Free fries and drink', '2024-04-01', '2024-04-30', 'Lunch'),
(4, 'Weekend Special', 'Bacon Burger', '50% off on Saturdays', '2024-04-01', '2024-04-30', 'Dinner'),
(5, 'Combo Deal', 'Veggie Burger', 'Combo for $7.99', '2024-04-01', '2024-04-30', 'Lunch'),
(6, 'Double Up', 'Chicken Burger', 'Double patty for $1 extra', '2024-04-01', '2024-04-30', 'Dinner'),
(7, 'Family Pack', 'BBQ Burger', 'Family pack for $24.99', '2024-04-01', '2024-04-30', 'Dinner'),
(8, 'Veggie Combo', 'Veggie Burger', 'Buy one get one half off', '2024-04-01', '2024-04-30', 'Lunch'),
(9, 'Double Trouble', 'Double Burger', 'Two Double Burgers for $15', '2024-04-01', '2024-04-30', 'Dinner'),
(10, 'Kids Meal', 'Chicken Burger', 'Free toy with meal', '2024-04-01', '2024-04-30', 'Lunch');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_firstname` varchar(255) DEFAULT NULL,
  `staff_surname` varchar(255) DEFAULT NULL,
  `staff_role` varchar(255) DEFAULT NULL,
  `staff_tel` varchar(255) DEFAULT NULL,
  `staff_shift` varchar(8) NOT NULL DEFAULT 'Day'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_firstname`, `staff_surname`, `staff_role`, `staff_tel`, `staff_shift`) VALUES
(1, 'Michael', 'Brown', 'Manager', '111-222-3333', 'Day'),
(2, 'Emily', 'Davis', 'Cashier', '444-555-6666', 'Night'),
(3, 'David', 'Wilson', 'Chef', '777-888-9999', 'Day'),
(4, 'Sarah', 'Smith', 'Server', '888-777-6666', 'Day'),
(5, 'Chris', 'Johnson', 'Delivery', '555-444-3333', 'Night'),
(6, 'Rachel', 'Taylor', 'Manager', '333-222-1111', 'Day'),
(7, 'Kevin', 'Anderson', 'Cashier', '222-333-4444', 'Night'),
(8, 'Amanda', 'Martinez', 'Chef', '666-555-4444', 'Night'),
(9, 'Mark', 'Hernandez', 'Server', '777-666-5555', 'Day'),
(10, 'Jennifer', 'Young', 'Delivery', '888-999-0000', 'Day');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `store_location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `store_location`) VALUES
(1, 'Store A', '123 Main St'),
(2, 'Store B', '456 Elm St'),
(3, 'Store C', '789 Oak St'),
(4, 'Store D', '101 Pine St'),
(5, 'Store E', '222 Maple St'),
(6, 'Store F', '333 Cedar St'),
(7, 'Store G', '444 Walnut St'),
(8, 'Store H', '555 Birch St'),
(9, 'Store I', '666 Elmwood St'),
(10, 'Store J', '777 Oakwood St');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`menu_type_id`),
  ADD KEY `fk_saver_id` (`fk_saver_id`),
  ADD KEY `fk_regular_id` (`fk_regular_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_customer_id` (`fk_customer_id`),
  ADD KEY `fk_payment_id` (`fk_payment_id`),
  ADD KEY `fk_staff_id` (`fk_staff_id`),
  ADD KEY `fk_menu_type_id` (`fk_menu_type_id`),
  ADD KEY `fk_store_id` (`fk_store_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_items_id`),
  ADD KEY `fk_item_id` (`fk_item_id`),
  ADD KEY `fk_order_id` (`fk_order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `regular_menu`
--
ALTER TABLE `regular_menu`
  ADD PRIMARY KEY (`regular_menu_id`);

--
-- Indexes for table `saver_menu`
--
ALTER TABLE `saver_menu`
  ADD PRIMARY KEY (`saver_menu_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `menu_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `regular_menu`
--
ALTER TABLE `regular_menu`
  MODIFY `regular_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `saver_menu`
--
ALTER TABLE `saver_menu`
  MODIFY `saver_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD CONSTRAINT `menu_type_ibfk_1` FOREIGN KEY (`fk_saver_id`) REFERENCES `saver_menu` (`saver_menu_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`fk_customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`fk_payment_id`) REFERENCES `payment` (`payment_id`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`fk_staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `order_ibfk_4` FOREIGN KEY (`fk_menu_type_id`) REFERENCES `menu_type` (`menu_type_id`),
  ADD CONSTRAINT `order_ibfk_5` FOREIGN KEY (`fk_store_id`) REFERENCES `store` (`store_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`fk_item_id`) REFERENCES `item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
