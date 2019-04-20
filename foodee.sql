-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2019 at 01:20 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodee`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `card_no` int(16) NOT NULL,
  `type` varchar(10) NOT NULL,
  `cvv` int(3) NOT NULL,
  `password` text NOT NULL,
  `expiry_date` date NOT NULL,
  `balance` int(11) NOT NULL DEFAULT '500'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_no`, `type`, `cvv`, `password`, `expiry_date`, `balance`) VALUES
(123456789, 'visa', 123, '1234', '2018-09-27', 855);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `insert_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `uname`, `desc`, `status`) VALUES
(2, 'user', 'hiiii', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `dish_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `desc` varchar(50) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `image` text,
  `review` varchar(100) DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`dish_id`, `name`, `desc`, `price`, `type`, `likes`, `image`, `review`, `availability`) VALUES
(1, 'Spring Roll', 'veg', 145, 'Starter', NULL, 'images/dish/chilli_roll.jpeg', NULL, 1),
(2, 'chicken seekh kebab', 'non-veg', 140, 'Starter', NULL, 'images/dish/chicken_kebab.jpeg', NULL, 1),
(3, 'reshmi tikka', 'non-veg', 100, 'Starter', NULL, 'images/dish/reshmi_tikka.jpg', NULL, 1),
(4, 'honey chilli potato', 'veg', 75, 'Starter', NULL, 'images/dish/honey_chilli_potato.jpeg', NULL, 1),
(5, 'Fried Rice', 'veg', 165, 'Main Course', NULL, 'images/dish/fried_rice.jpeg', NULL, 1),
(6, 'pav bhaji', 'veg', 140, 'Main Course', NULL, 'images/dish/pav_bhaji.jpeg', NULL, 1),
(7, 'shahi paneer', 'veg', 210, 'Main Course', NULL, 'images/dish/shahi_paneer.jpeg', NULL, 1),
(8, 'chicken biryani', 'non-veg', 250, 'Main Course', NULL, 'images/dish/chk_biryani.jpeg', NULL, 1),
(9, 'gulab jamun', NULL, 120, 'Desert', NULL, 'images/dish/gulab_jamun.jpeg', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `designation` varchar(10) DEFAULT NULL,
  `experiance` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `uname` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `completion_status` tinyint(1) NOT NULL DEFAULT '0',
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delivery_status` tinyint(1) NOT NULL DEFAULT '0',
  `completion_time` timestamp NULL DEFAULT NULL,
  `delivery_time` timestamp NULL DEFAULT NULL,
  `payment` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `uname`, `dish_id`, `quantity`, `completion_status`, `order_time`, `delivery_status`, `completion_time`, `delivery_time`, `payment`) VALUES
(9, 'user', 1, 1, 0, '2018-10-07 12:19:24', 0, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `aprroved_to` int(11) DEFAULT NULL,
  `issue_date` timestamp NULL DEFAULT NULL,
  `complete_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `quantity`, `aprroved_to`, `issue_date`, `complete_date`) VALUES
(3, 'small container', 150, 24, '2018-10-10 18:30:00', NULL),
(4, 'big container', 300, 24, '2018-10-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_no` int(11) NOT NULL,
  `uname` varchar(10) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `issue_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`receipt_no`, `uname`, `total_price`, `issue_time`) VALUES
(21, 'user', 435, '2018-10-07 11:56:27'),
(22, 'user', 145, '2018-10-07 12:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_has_orders`
--

CREATE TABLE `receipt_has_orders` (
  `receipt_no` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt_has_orders`
--

INSERT INTO `receipt_has_orders` (`receipt_no`, `order_id`) VALUES
(8, 21),
(9, 21);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email_id` varchar(35) DEFAULT NULL,
  `contact_no` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uname`, `name`, `password`, `email_id`, `contact_no`, `address`, `type`) VALUES
('a', '<script>alert(\"Attacked\");</script>', '0cc175b9c0f1b6a831c399e269772661', 'a@gmail.com', 0, 'a', 'client'),
('ceouser', 'hozefa', '145abb7735b1009f12467b4eff319b5d', 'ceo@foodee.com', 753198426, 'foodee', 'ceo'),
('chefuser', 'chefuser', '1e4d3849210596c59daf94151e531bea', 'chefuser@gmail.com', 2147483647, 'xyz', 'chef'),
('hozefa', 'hozefa', '32f016b9f1689fc4d7aba896418d405c', 'hk@gmail.com', 789456123, 'abc', 'client'),
('user', 'Hozefa Kothari', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', 2147483647, 'xyz', 'client'),
('userfoodee', 'Hozefa Kothari', 'userfoodee', 'user@gmail.com', 2147483647, 'abc', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_card`
--

CREATE TABLE `user_has_card` (
  `uname` varchar(10) NOT NULL,
  `card_no` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `contact_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `name`, `contact_no`) VALUES
(21, 'zaid', 789456123),
(22, 'hozefa', 789456123),
(23, 'hozefa', 789456123),
(24, 'javed', 78456123);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_has_product`
--

CREATE TABLE `vendor_has_product` (
  `vendor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_has_product`
--

INSERT INTO `vendor_has_product` (`vendor_id`, `product_id`, `amount`) VALUES
(21, 3, 100),
(21, 4, 200),
(22, 3, 50),
(22, 4, 100),
(24, 3, 25),
(24, 4, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_no`),
  ADD UNIQUE KEY `card_no_UNIQUE` (`card_no`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `cart_id_UNIQUE` (`cart_id`),
  ADD KEY `fk_dish_id_idx` (`dish_id`),
  ADD KEY `fk_cart_uname_idx` (`uname`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD UNIQUE KEY `complaint_id_UNIQUE` (`complaint_id`),
  ADD KEY `fk_complaint_uname_idx` (`uname`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`dish_id`),
  ADD UNIQUE KEY `dish_id_UNIQUE` (`dish_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `fk_employee_uname_idx` (`uname`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `dish_id_idx` (`dish_id`),
  ADD KEY `fk_orders_uname` (`uname`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id_UNIQUE` (`product_id`),
  ADD KEY `fk_product_approved_to_idx` (`aprroved_to`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_no`),
  ADD KEY `fk_receipt_uname_idx` (`uname`);

--
-- Indexes for table `receipt_has_orders`
--
ALTER TABLE `receipt_has_orders`
  ADD PRIMARY KEY (`receipt_no`,`order_id`),
  ADD KEY `fk_receipt_has_orders_order_id_idx` (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uname`),
  ADD UNIQUE KEY `uname_UNIQUE` (`uname`);

--
-- Indexes for table `user_has_card`
--
ALTER TABLE `user_has_card`
  ADD PRIMARY KEY (`uname`,`card_no`),
  ADD KEY `fk_user_has_card_card_no_idx` (`card_no`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`),
  ADD UNIQUE KEY `vendor_id_UNIQUE` (`vendor_id`);

--
-- Indexes for table `vendor_has_product`
--
ALTER TABLE `vendor_has_product`
  ADD PRIMARY KEY (`vendor_id`,`product_id`),
  ADD KEY `fk_vendor_has_product_product_id_idx` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `dish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_dish_id` FOREIGN KEY (`dish_id`) REFERENCES `dish` (`dish_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cart_uname` FOREIGN KEY (`uname`) REFERENCES `user` (`uname`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `fk_complaint_uname` FOREIGN KEY (`uname`) REFERENCES `user` (`uname`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_uname` FOREIGN KEY (`uname`) REFERENCES `user` (`uname`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_dish_id` FOREIGN KEY (`dish_id`) REFERENCES `dish` (`dish_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_uname` FOREIGN KEY (`uname`) REFERENCES `user` (`uname`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_approved_to` FOREIGN KEY (`aprroved_to`) REFERENCES `vendor` (`vendor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `fk_receipt_uname` FOREIGN KEY (`uname`) REFERENCES `user` (`uname`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_card`
--
ALTER TABLE `user_has_card`
  ADD CONSTRAINT `fk_user_has_card_card_no` FOREIGN KEY (`card_no`) REFERENCES `card` (`card_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_card_uname` FOREIGN KEY (`uname`) REFERENCES `user` (`uname`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
