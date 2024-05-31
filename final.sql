-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2024 at 08:58 PM
-- Server version: 8.0.36
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aunni_Final_Project_Database`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Electronics'),
(2, 'Accessories'),
(3, 'Wearables');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int NOT NULL,
  `product_id` int NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `product_id`, `image_url`) VALUES
(1, 1, 'https://i5.walmartimages.com/seo/Sony-WH-CH720N-Noise-Canceling-Wireless-Bluetooth-Headphones-Black_8e3fa5d4-f841-4e6c-bb78-9959d29652ad.cc7bc3c09721e1951a7bc746c702ec58.jpeg?odnHeight=768&odnWidth=768&odnBg=FFFFFF'),
(2, 1, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MQTQ3?wid=1144&hei=1144&fmt=jpeg&qlt=90&.v=1687660671363'),
(3, 2, 'https://cdn.awsli.com.br/600x700/86/86779/produto/75483442/d046d65454.jpg'),
(4, 2, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MT5N3ref_VW_34FR+watch-49-titanium-ultra2_VW_34FR+watch-face-49-alpine-ultra2_VW_34FR?wid=750&hei=712&trim=1%2C0&fmt=p-jpg&qlt=95&.v=1694507270905'),
(5, 2, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/FNTY3?wid=1144&hei=1144&fmt=jpeg&qlt=90&.v=1676674564020'),
(6, 3, 'https://m.media-amazon.com/images/I/91sLOZjNWHL._AC_UF894,1000_QL80_.jpg'),
(7, 4, 'https://i5.walmartimages.com/seo/Portable-Bluetooth-Speaker-Wireless-Speaker-10W-Loud-Stereo-Sound-Outdoor-Speakers-5-0-30H-Playtime-66ft-Range-Dual-Pairing-Home-Party_5c462825-76ea-4776-8265-bd743590a8ca.5ae3c55c65970f584371f215042'),
(8, 4, 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6514/6514475_sd.jpg'),
(9, 5, 'https://cdn.mos.cms.futurecdn.net/Pk5ydxYo6ty2Q4SX9vznP6.jpg'),
(10, 6, 'https://i5.walmartimages.com/seo/Logitech-Silent-Wireless-Mouse-2-4-GHz-with-USB-Receiver-1000-DPI-Optical-Tracking-Black_ed3ac230-2b94-45b0-a201-627f4991f99e.628639fafa9e91c71e292a33702cf4a9.jpeg'),
(11, 7, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MT0U3?wid=2000&hei=2000&fmt=jpeg&qlt=95&.v=1693000313579'),
(12, 7, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MHLM3?wid=2000&hei=2000&fmt=jpeg&qlt=95&.v=1623348211000'),
(13, 8, 'https://c1.neweggimages.com/productimage/nb640/AXTXS2201080FW97J21.jpg'),
(14, 9, 'https://target.scene7.com/is/image/Target/GUEST_a2071fd7-c7b3-4800-a9e4-1afd589d63ad?wid=488&hei=488&fmt=pjpeg'),
(15, 10, 'https://m.media-amazon.com/images/I/61CGHv6kmWL.jpg'),
(16, 10, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuwTsrqdjuL0eFAucmN4yWrFoSqToL0vzsLTT4insbKzazP2DvxeMGXvNvJBgh1pMzeeA&usqp=CAU'),
(17, 10, 'https://ssl-product-images.www8-hp.com/digmedialib/prodimg/lowres/c08425598.png?impolicy=Png_Res');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `category_id`) VALUES
(1, 'Wireless Headphones', 'High-quality wireless headphones with noise cancellation', 149.99, 1),
(2, 'Smartwatch', 'Stylish smartwatch with fitness tracking and heart rate monitor', 199.99, 1),
(3, 'Laptop Backpack', 'Durable and spacious backpack for laptops up to 15 inches', 59.99, 2),
(4, 'Bluetooth Speaker', 'Portable Bluetooth speaker with excellent sound quality', 79.99, 1),
(5, 'Fitness Tracker', 'Lightweight fitness tracker with step counting and sleep monitoring', 49.99, 3),
(6, 'Wireless Mouse', 'Ergonomic wireless mouse with adjustable DPI', 29.99, 1),
(7, 'Smartphone Case', 'Protective case for popular smartphone models', 19.99, 2),
(8, 'Laptop Cooling Pad', 'Cooling pad to prevent laptop overheating', 39.99, 2),
(9, 'Power Bank', 'High-capacity power bank for charging devices on the go', 34.99, 1),
(10, 'Gaming Headset', 'Immersive gaming headset with surround sound', 89.99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1, 'john@example.com', 'johndoe', 'password123'),
(2, 'jane@example.com', 'janedoe', 'qwerty'),
(3, 'mike@example.com', 'mikesmithson', 'letmein'),
(4, 'sarah@example.com', 'sarahj', 'password456'),
(5, 'admin@example.com', 'ADMIN', 'ADMIN123'),
(6, 'david@example.com', 'davidbrown', 'password789'),
(7, 'emily@example.com', 'emilysmith', 'emilypwd'),
(8, 'chris@example.com', 'chrisbrown', 'chrispass'),
(9, 'olivia@example.com', 'oliviajones', 'olivia123'),
(10, 'daniel@example.com', 'daniellee', 'danielpwd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;