-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 08:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` varchar(32) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `status` enum('pending','paid','done') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `alamat` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `metode_pembayaran` varchar(32) DEFAULT NULL,
  `no_wa` varchar(20) DEFAULT NULL,
  `metode_pengiriman` varchar(32) DEFAULT NULL,
  `biaya_pengiriman` int(11) DEFAULT NULL,
  `subtotal` int(11) NOT NULL DEFAULT 0,
  `total_diskon` int(11) NOT NULL DEFAULT 0,
  `biaya_layanan` int(11) NOT NULL DEFAULT 0,
  `total_pembayaran` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `total_price`, `status`, `created_at`, `alamat`, `catatan`, `metode_pembayaran`, `no_wa`, `metode_pengiriman`, `biaya_pengiriman`, `subtotal`, `total_diskon`, `biaya_layanan`, `total_pembayaran`) VALUES
(1, NULL, NULL, 16000, 'pending', '2025-07-09 01:04:09', 'kampus unibba', '', 'transfer', '089687446225', 'reguler', 10000, 0, 0, 0, 0),
(2, NULL, NULL, 6000, 'pending', '2025-07-09 01:07:49', 'kampus unibba', '', 'transfer', '089687446225', 'reguler', 10000, 0, 0, 0, 0),
(3, NULL, NULL, 6000, 'pending', '2025-07-09 01:17:18', 'kampus unibba', '', 'transfer', '089687446225', 'reguler', 10000, 0, 0, 0, 0),
(4, NULL, 1, 16000, 'pending', '2025-07-09 01:22:28', 'kampus unibba', '', 'transfer', '089687446225', 'reguler', 10000, 0, 0, 0, 0),
(5, NULL, 1, 53750, 'pending', '2025-07-09 04:46:50', 'sdn wanasuka', '', 'transfer', '089687446225', 'reguler', 10000, 0, 0, 0, 0),
(6, NULL, 1, 45000, 'pending', '2025-07-09 04:49:28', 'sdn wanasuka', '', 'transfer', '089687446225', 'reguler', 10000, 0, 0, 0, 0),
(7, NULL, 1, 30000, '', '2025-07-09 12:21:55', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(8, NULL, 1, 135000, 'pending', '2025-07-09 12:23:57', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(9, NULL, 1, 6000, 'pending', '2025-07-09 12:27:03', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(10, NULL, 1, 18750, 'pending', '2025-07-09 12:54:55', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(11, NULL, 1, 22000, 'pending', '2025-07-09 13:01:54', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(12, NULL, 1, 16000, 'pending', '2025-07-09 13:02:28', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(13, NULL, 1, 12750, 'pending', '2025-07-09 13:06:14', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(14, NULL, 1, 28750, 'pending', '2025-07-09 13:21:58', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(28, 'INV20250710052644419', 1, 16000, 'pending', '2025-07-09 22:26:44', NULL, NULL, NULL, NULL, NULL, 10000, 19200, 3200, 5000, 31000),
(29, 'INV20250710052721427', 1, 16000, 'pending', '2025-07-09 22:27:21', NULL, NULL, NULL, NULL, NULL, 10000, 19200, 3200, 5000, 31000),
(30, 'INV20250710053007325', 1, 16000, 'pending', '2025-07-09 22:30:07', NULL, NULL, NULL, NULL, NULL, 10000, 19200, 3200, 5000, 31000),
(31, 'INV20250710053250410', 1, 16000, 'pending', '2025-07-09 22:32:50', NULL, NULL, NULL, NULL, NULL, 10000, 19200, 3200, 5000, 31000),
(32, 'INV20250710053819997', 1, 12800, 'pending', '2025-07-09 22:38:19', NULL, NULL, NULL, NULL, NULL, 10000, 16000, 3200, 5000, 27800),
(33, 'INV20250710054122477', 1, 12800, 'pending', '2025-07-09 22:41:22', NULL, NULL, 'transfer', NULL, 'reguler', 10000, 16000, 3200, 5000, 27800),
(34, 'INV20250710065613407', 1, 4800, 'pending', '2025-07-09 23:56:13', NULL, NULL, 'transfer', NULL, 'reguler', 10000, 6000, 1200, 5000, 19800);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `harga_awal` int(11) DEFAULT NULL,
  `harga_diskon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `subtotal`, `harga_awal`, `harga_diskon`) VALUES
(1, 1, 2, 1, 16000, NULL, NULL),
(2, 2, 3, 1, 6000, NULL, NULL),
(3, 3, 3, 1, 6000, NULL, NULL),
(4, 4, 2, 1, 16000, NULL, NULL),
(5, 5, 1, 1, 12750, NULL, NULL),
(6, 5, 2, 1, 16000, NULL, NULL),
(7, 5, 5, 1, 15000, NULL, NULL),
(8, 6, 1, 1, 10200, NULL, NULL),
(9, 6, 2, 1, 12800, NULL, NULL),
(10, 6, 5, 1, 12000, NULL, NULL),
(11, 7, 5, 1, 15000, NULL, NULL),
(12, 7, 8, 1, 15000, NULL, NULL),
(13, 8, 28, 1, 135000, NULL, NULL),
(14, 9, 3, 1, 6000, NULL, NULL),
(15, 10, 1, 1, 12750, NULL, NULL),
(16, 10, 3, 1, 6000, NULL, NULL),
(17, 11, 2, 1, 16000, NULL, NULL),
(18, 11, 3, 1, 6000, NULL, NULL),
(19, 12, 2, 1, 16000, NULL, NULL),
(20, 13, 1, 1, 12750, NULL, NULL),
(21, 14, 1, 1, 12750, NULL, NULL),
(22, 14, 2, 1, 16000, NULL, NULL),
(37, 28, 2, 1, 12800, 16000, 12800),
(38, 29, 2, 1, 12800, 16000, 12800),
(39, 30, 2, 1, 12800, 16000, 12800),
(40, 31, 2, 1, 12800, 16000, 12800),
(41, 32, 2, 1, 12800, 16000, 12800),
(42, 33, 2, 1, 12800, 16000, 12800),
(43, 34, 3, 1, 4800, 6000, 4800);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `category` enum('bread','cake','pastry','cookies','doughnut') DEFAULT 'cake'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `created_at`, `image`, `category`) VALUES
(1, 'Apple Turnover', 'puff berbentuk segitiga isi apel kayu manis', 12750, 18, '2025-07-08 11:13:58', 'apple-turnover.jpg', 'pastry'),
(2, 'Brioche', 'roti lembut dan buttery, sering jadi dasar bread pudding', 16000, 6, '2025-07-08 11:20:01', 'brioche.jpg', 'pastry'),
(3, 'Cheese Stick Puff', 'stick renyah dengan taburan keju', 6000, 18, '2025-07-08 11:20:57', 'cheese-stick-puff.jpg', 'pastry'),
(4, 'Chicken Puff', 'puff isi daging ayam cincang berbumbu', 16000, 10, '2025-07-08 11:22:59', 'chicken-puff.jpg', 'pastry'),
(5, 'Croissant ', 'pastry berlapis, gurih,renyah,berbenatuk bulan sabit', 15000, 18, '2025-07-08 11:25:15', 'croissant.jpg', 'pastry'),
(6, 'Danish Pastry', 'adonan berlapis dengan topping buah, keju, atau krim', 17000, 10, '2025-07-08 11:26:45', 'danish-pastry.jpg', 'pastry'),
(7, 'Kouign Amann', 'pastry Prancis karamel renyah dan manis', 20000, 10, '2025-07-08 11:28:05', 'kouign-amann.jpg', 'pastry'),
(8, 'Pain Au Chocolate', 'croissant berbentuk persegi isi cokelat batang', 15000, 20, '2025-07-08 11:29:41', 'pain-au-chocolat.jpg', 'pastry'),
(9, 'Pain Aux Raisins', 'roti  gulung isi kismis dan krim pastry ', 15000, 10, '2025-07-08 11:31:13', 'pain-aux-raisins.jpg', 'pastry'),
(10, 'Palmier', 'pastry tipis dan renyah berbentuk hati atau kupu-kupu', 8000, 10, '2025-07-08 11:32:56', 'palmier.jpg', 'pastry'),
(11, 'Pie Mini Fruits', 'pie mini berisi buah dan saus krim', 4000, 20, '2025-07-08 11:34:26', 'pie-mini-fruits.jpg', 'pastry'),
(12, 'Sausage Roll', 'puff isi sosis', 4000, 20, '2025-07-08 11:35:23', 'sausage-roll.jpg', 'pastry'),
(13, 'Beignet', 'mirip donut, lebih padat, ditabur gula halus', 5000, 20, '2025-07-08 11:37:45', 'beignet.jpg', 'doughnut'),
(14, 'Berliner', 'donut isi ala jerman, dengan isi selai strawberry', 5500, 20, '2025-07-08 11:39:41', 'berliner.jpg', 'doughnut'),
(15, 'Bomboloni Mix', 'donut khas italia, bulat isi krim', 9000, 20, '2025-07-08 11:41:25', 'bomboloni.jpg', 'doughnut'),
(16, 'Cheese Donut', 'donut dengan topping keju', 4000, 20, '2025-07-08 11:42:38', 'chesee-donut_jpg.jpg', 'doughnut'),
(17, 'Churro Donut', 'bentuk lingkaran dari adonan churro', 6000, 20, '2025-07-08 11:43:17', 'churro-donut.jpg', 'doughnut'),
(18, 'Nutella Donut', 'donut dengan topping nutella', 5000, 20, '2025-07-08 11:45:12', 'decadent-hazelnut-nutella-donuts.jpg', 'doughnut'),
(19, 'Donut Coklat Meises', 'Donut dengan topping coklat meises', 4000, 20, '2025-07-09 15:13:11', 'donat-cokelat-meises.jpg', 'doughnut'),
(20, 'Donut Glazed', 'dilapisi gula glasur bening atau berwarna', 6000, 20, '2025-07-09 15:14:58', 'donat-glazed.jpg', 'doughnut'),
(21, 'Donut Lotus Biscoff', 'topping biskuit dan krim biscoff', 7000, 20, '2025-07-09 15:21:26', 'donat-lotus-biscoff.jpg', 'doughnut'),
(22, 'Donut Bola', 'disebut juga \"donut lubang\" / donut hole', 4000, 20, '2025-07-09 15:24:16', 'fried-donut-hole.jpg', 'doughnut'),
(23, 'Baguette', 'roti Prancis panjang', 12000, 20, '2025-07-09 15:25:48', 'baguette.jpg', 'bread'),
(24, 'Buttery Soft Pretzels', 'pretzel klasik yang dipanggang sempurna dan dilapisi mentega gurih', 8000, 20, '2025-07-09 15:28:23', 'buttery-soft-pretzels.jpg', 'bread'),
(25, 'Cinnamon Roll', 'Cinnamon Roll lembut dengan lapisan kayu manis manis dan gula merah, dipanggang sempurna lalu disiram dengan glaze vanilla yang meleleh', 14000, 20, '2025-07-09 15:30:42', 'cinnamon-roll.jpg', 'bread'),
(26, 'Coffee Bun', 'Roti lembut beraroma kopi dengan lapisan luar yang renyah dan wangi menggoda.', 13000, 20, '2025-07-09 15:34:09', 'coffe-bun.jpg', 'bread'),
(27, 'Black Forest', 'Kue klasik dengan lapisan cokelat lembut, krim segar, dan ceri manis yang menyatu dalam setiap gigitan', 125000, 10, '2025-07-09 15:35:22', 'black-forest.jpg', 'cake'),
(28, 'Blueberry Cheecake', 'Kue keju lembut dengan rasa creamy yang kaya, dipadukan dengan topping blueberry segar dan selai manis yang melimpah', 135000, 10, '2025-07-09 15:37:25', 'blueberry-cheesecake.jpg', 'cake'),
(29, 'Kastengel', 'Kue kering khas dengan rasa keju yang gurih dan tekstur renyah', 55000, 10, '2025-07-09 15:38:20', 'kastengel.jpg', 'cookies'),
(30, 'Nastar', 'Kue kering klasik berisi selai nanas manis legit dengan tekstur luar yang lembut dan lumer di mulut', 60000, 10, '2025-07-09 15:38:54', 'nastarjpg.jpg', 'cookies');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` varchar(16) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `mode` enum('all','category','product') NOT NULL DEFAULT 'all',
  `category` enum('all','product','category') DEFAULT 'all',
  `product_id` int(11) DEFAULT NULL,
  `product_category` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `discount_type` enum('percent','nominal') DEFAULT 'percent',
  `discount_value` int(11) DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id`, `title`, `description`, `start_date`, `end_date`, `mode`, `category`, `product_id`, `product_category`, `created_at`, `discount_type`, `discount_value`, `is_active`) VALUES
(5, 'grand opening', 'grand opening ', '2025-07-09', '2025-07-12', 'all', 'all', NULL, NULL, '2025-07-09 08:18:02', 'percent', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `cashier_id` int(11) DEFAULT NULL,
  `paid_amount` int(11) DEFAULT NULL,
  `change_amount` int(11) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','kasir','customer') DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `no_hp`, `password`, `role`, `created_at`) VALUES
(1, 'amelia', 'amelia@example.com', NULL, '$2y$10$YXI3UmR57zjlxPhbRoN6Te.l/AWuMFLH/jVgBLkQRUm1ajUtjNPPm', 'customer', '2025-07-07 16:24:19'),
(4, 'admin', 'admin@velvetcake.com', NULL, '$2y$10$0nE5Kjs99/wDgj/IsSm6LeDO.S5yu3KuFHRByvgxJ1iUUSKlhzBWC', 'admin', '2025-07-07 16:38:13'),
(5, 'kasir', 'kasir@velvetcake.com', NULL, '$2y$10$O5t1cEuq96ypRQ5ySdL/1eYa0JwfBexfQH.L92hjQv1ova4lbYai6', 'kasir', '2025-07-07 16:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_favorites`
--

CREATE TABLE `user_favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_favorites`
--

INSERT INTO `user_favorites` (`id`, `user_id`, `product_id`, `created_at`) VALUES
(1, 1, 1, '2025-07-10 02:43:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `cashier_id` (`cashier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_favorites`
--
ALTER TABLE `user_favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_favorites`
--
ALTER TABLE `user_favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`cashier_id`) REFERENCES `users` (`id`);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table cart
--

--
-- Metadata for table orders
--

--
-- Metadata for table order_items
--

--
-- Metadata for table products
--

--
-- Metadata for table product_reviews
--

--
-- Metadata for table promo
--

--
-- Metadata for table transactions
--

--
-- Metadata for table users
--

--
-- Metadata for table user_favorites
--

--
-- Metadata for database cakeshop
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
