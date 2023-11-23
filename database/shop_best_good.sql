-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 09:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
    time_zone = "+07:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `shop_best_good`
--
-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE `users` (
    `user_id` int(10) UNSIGNED NOT NULL,
    `username` varchar(50) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    `address` varchar(255) NOT NULL,
    `phone_number` varchar(255) NOT NULL,
    `remember_token` varchar(100) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    `role` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

--
-- Dumping data for table `users`
--
INSERT INTO
    `users` (
        `user_id`,
        `username`,
        `email`,
        `password`,
        `address`,
        `phone_number`,
        `remember_token`,
        `created_at`,
        `updated_at`,
        `role`
    )
VALUES
    (
        1,
        'admin',
        'admin@gmail.com',
        '$2y$10$nk9PKJy6d9z4zOb4YoGpyOlIlXYwMTMsoAwdTbcm.ZTjukuBSxvWS',
        '12 Phạm đức nan',
        '0327249050',
        'tg8J0gFwCT3pol1dcP1FmscBjPeyuKgx8er4pTbhrXY1S34nvLCwglyTaAh6',
        '2023-10-17 07:15:30',
        '2023-10-17 07:15:30',
        1
    ),
    (
        2,
        'admin2',
        'admin2@gmail.com',
        '$2y$10$4OY7Zj/N7rgjrOjBf7suFegJYke8EHwwNNfUGqOd9MqNsSimtazQ.',
        'naw',
        '0123456789',
        'sVqh8teWqjwxvp7KLgihRonAU96OFXOejG0P4TjIRl44PSi3d4cPcgHFIrEP',
        NULL,
        NULL,
        1
    ),
    (
        112,
        'Dr. Canda',
        'arvilla.ledner@example.org',
        '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'Tomasa Koss',
        'Lk3FI0FPXo',
        NULL,
        '2023-10-22 02:22:56',
        '2023-10-23 19:24:23',
        0
    ),
    (
        113,
        'Ofelia',
        'shyann.reichert@example.net',
        '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'Vance Schinner',
        'bg83YtRre5',
        NULL,
        '2023-10-22 02:22:56',
        '2023-10-24 00:28:50',
        0
    ),
    (
        114,
        'Mrs. Janiya Goyette',
        'windler.aletha@example.net',
        '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'Cleora Bins',
        'zJdxDDU0K5',
        NULL,
        '2023-10-22 02:22:56',
        '2023-10-22 02:22:56',
        0
    );

-- COMMIT;
--
-- Indexes for dumped tables
--
--
-- Indexes for table `products`
-- --
-- Table structure for table `orders`
--
CREATE TABLE `orders` (
    `order_id` int(10) UNSIGNED NOT NULL,
    `order_code` varchar(255) NOT NULL,
    `user_id` int(10) UNSIGNED NOT NULL,
    `total_amount` decimal(10, 0) NOT NULL,
    `status` varchar(255) NOT NULL DEFAULT 'pending',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

--
-- Dumping data for table `orders`
--

--
-- Triggers `orders`
--

DELIMITER $$
CREATE TRIGGER generate_order_code BEFORE INSERT ON orders
FOR EACH ROW
BEGIN
    DECLARE random_num INT;
    SET random_num = FLOOR(RAND() * 10000);
    SET NEW.order_code = CONCAT('ORDER', LPAD(random_num, 4, '0'));
END;
$$
DELIMITER ;



--
-- Table structure for table `order_details`
--
CREATE TABLE `order_details` (
    `order_detail_id` int(10) UNSIGNED NOT NULL,
    `order_id` int(10) UNSIGNED NOT NULL,
    `product_id` int(10) UNSIGNED NOT NULL,
    `quantity` int(11) NOT NULL,
    `unit_price` decimal(10, 0) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

--
-- Dumping data for table `order_details`
--
--
-- Indexes for dumped tables
--
--
-- Indexes for table `order_details`
--
--
--   for dumped tables
--
--
--   for table `order_details`
--
--
-- Constraints for dumped tables
--

--
-- Table structure for table `categories`
--
CREATE TABLE `categories` (
    `category_id` int(10) UNSIGNED NOT NULL,
    `name` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

--
-- Dumping data for table `categories`
--
INSERT INTO
    `categories` (`category_id`, `name`)
VALUES
    (393, 'Hàng đông lạnh'),
    (397, 'Gia dụng'),
    (401, 'Rau, củ, quả'),
    (413, 'Ăn vặt');

--
-- Indexes for dumped tables
--
--
-- Indexes for table `categories`
--
--
--   for dumped tables
--
--
--   for table `categories`
--

--
-- Table structure for table `products`
--
CREATE TABLE `products` (
    `product_id` int(10) NOT NULL,
    `category_id` int(10) UNSIGNED NULL,
    `name` varchar(255) NOT NULL,
    `description` text DEFAULT NULL,
    `original_price` decimal(10, 0) NOT NULL,
    `selling_price` decimal(10, 0) NOT NULL,
    `image_url` varchar(255) DEFAULT NULL,
    `status` tinyint(4) NOT NULL DEFAULT 1,
    `quantity` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

--
-- Dumping data for table `products`
--
INSERT INTO
    `products` (
        `product_id`,
        `category_id`,
        `name`,
        `description`,
        `original_price`,
        `selling_price`,
        `image_url`,
        `status`,
        `quantity`,
        `created_at`,
        `updated_at`
    )
VALUES
    (
        1,
        393,
        'CỐT LẾT HEO MEAT MASTER KHAY 400G',
        'CỐT LẾT HEO MEAT MASTER KHAY 400G',
        70,
        0,
        'hiendeptrai.png',
        1,
        0,
        NULL,
        '2023-11-12 09:41:41'
    ),
    (
        2,
        393,
        'Ức gà tươi phi lê C.P khay 500g',
        'CỐT LẾT HEO MEAT MASTER KHAY 400G',
        70,
        0,
        'CỐT LẾT HEO MEAT MASTER KHAY 400G',
        1,
        0,
        NULL,
        NULL
    ),
    (
        3,
        393,
        'Nấm linh chi trắng hộp 150g',
        'CỐT LẾT HEO MEAT MASTER KHAY 400G',
        5,
        0,
        'CỐT LẾT HEO MEAT MASTER KHAY 400G',
        1,
        0,
        NULL,
        NULL
    ),
    (
        4,
        397,
        'KỆ TRANG TRÍ 1, ĐỒ GIA DỤNG, 50 X 10 X 10CM',
        'Những miếng thịt được cắt vừa ăn với phần thịt săn chắc xen lẫn với một ít phần mỡ là sự lựa chọn hoàn hảo cho các món thịt chiên. Cốt lết heo Meat Master không chỉ được sản xuất với những quy định nghiêm ngặt, mang đến chất lượng sản phẩm tuyệt vời mà còn có giá thành phải chăng cho mọi nhà.',
        12,
        0,
        'png.png',
        1,
        0,
        NULL,
        NULL
    ),
    (
        5,
        397,
        'KỆ BẾP (KÍCH THƯỚC 50X100)',
        'Những miếng thịt được cắt vừa ăn với phần thịt săn chắc xen lẫn với một ít phần mỡ là sự lựa chọn hoàn hảo cho các món thịt chiên. Cốt lết heo Meat Master không chỉ được sản xuất với những quy định nghiêm ngặt, mang đến chất lượng sản phẩm tuyệt vời mà còn có giá thành phải chăng cho mọi nhà.',
        54,
        0,
        'png.png',
        1,
        0,
        NULL,
        NULL
    ),
    (
        6,
        397,
        'GƯƠNG ĐỂ BÀN (KÍCH THƯỚC 30 X 40)',
        'Những miếng thịt được cắt vừa ăn với phần thịt săn chắc xen lẫn với một ít phần mỡ là sự lựa chọn hoàn hảo cho các món thịt chiên. Cốt lết heo Meat Master không chỉ được sản xuất với những quy định nghiêm ngặt, mang đến chất lượng sản phẩm tuyệt vời mà còn có giá thành phải chăng cho mọi nhà.',
        39,
        0,
        'PNG.PNG',
        1,
        0,
        NULL,
        NULL
    ),
    (
        7,
        397,
        'TẤM LÓT ĐĨA, KHĂN ĂN (KÍCH THƯỚC 35X25)',
        'Những miếng thịt được cắt vừa ăn với phần thịt săn chắc xen lẫn với một ít phần mỡ là sự lựa chọn hoàn hảo cho các món thịt chiên. Cốt lết heo Meat Master không chỉ được sản xuất với những quy định nghiêm ngặt, mang đến chất lượng sản phẩm tuyệt vời mà còn có giá thành phải chăng cho mọi nhà.',
        39,
        0,
        'PNG.PNG',
        1,
        0,
        NULL,
        NULL
    ),
    (
        8,
        401,
        'BƠ TÚI 700G - 800G (2 TRÁI)',
        'Những miếng thịt được cắt vừa ăn với phần thịt săn chắc xen lẫn với một ít phần mỡ là sự lựa chọn hoàn hảo cho các món thịt chiên. Cốt lết heo Meat Master không chỉ được sản xuất với những quy định nghiêm ngặt, mang đến chất lượng sản phẩm tuyệt vời mà còn có giá thành phải chăng cho mọi nhà.',
        5,
        0,
        'PNG.PNG',
        1,
        0,
        NULL,
        NULL
    ),
    (
        9,
        413,
        'BÒ VIÊN CHIÊN (HỘP 15 VIÊN)',
        'Những miếng thịt được cắt vừa ăn với phần thịt săn chắc xen lẫn với một ít phần mỡ là sự lựa chọn hoàn hảo cho các món thịt chiên. Cốt lết heo Meat Master không chỉ được sản xuất với những quy định nghiêm ngặt, mang đến chất lượng sản phẩm tuyệt vời mà còn có giá thành phải chăng cho mọi nhà.',
        5,
        0,
        'PNG.PNG',
        1,
        0,
        NULL,
        NULL
    ),
    (
        10,
        413,
        'XOÀI XẤY MUỐI ỚT (GÓI 150G)',
        'Những miếng thịt được cắt vừa ăn với phần thịt săn chắc xen lẫn với một ít phần mỡ là sự lựa chọn hoàn hảo cho các món thịt chiên. Cốt lết heo Meat Master không chỉ được sản xuất với những quy định nghiêm ngặt, mang đến chất lượng sản phẩm tuyệt vời mà còn có giá thành phải chăng cho mọi nhà.',
        3,
        0,
        'PNG.PNG',
        1,
        0,
        NULL,
        NULL
    ),
    (
        11,
        413,
        'MÍT XẤY ĐẲNG CẤP CHÂU ÂU',
        'Những miếng thịt được cắt vừa ăn với phần thịt săn chắc xen lẫn với một ít phần mỡ là sự lựa chọn hoàn hảo cho các món thịt chiên. Cốt lết heo Meat Master không chỉ được sản xuất với những quy định nghiêm ngặt, mang đến chất lượng sản phẩm tuyệt vời mà còn có giá thành phải chăng cho mọi nhà.',
        14,
        0,
        'PNG.PNG',
        1,
        0,
        NULL,
        NULL
    );

CREATE TABLE `payment_details`  (
  `payment_detail_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `receive_name` varchar(255) NOT NULL,
  `street` varchar(255),
  `ward` varchar(255),
  `district` varchar(255),
  `province` varchar(255),
  `phone_number` varchar(255),
  `method` varchar(255),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;
    
CREATE TABLE `discounts`  (
  `discount_id` int UNSIGNED NOT NULL,
  `discount_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL,
  `discount` decimal(10, 0) NOT NULL,
  `expire` date NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;


INSERT INTO `discounts` VALUES (1, 'PERCENT50', 1, 50, '2023-11-29', 'Giảm 50% giá trị đơn hàng', '2023-11-16 18:24:11', '2023-11-16 18:24:28');

--
-- Chỉ mục cho các bảng đã đổ
--
--
-- Chỉ mục cho bảng `users`
--

ALTER TABLE `users`
ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `orders`
--

ALTER TABLE `orders`
ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_details`
--

ALTER TABLE `order_details`
ADD PRIMARY KEY (`order_detail_id`);

--
-- Chỉ mục cho bảng `orders`
--

ALTER TABLE `categories`
ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `products`
--

ALTER TABLE `products`
ADD PRIMARY KEY (`product_id`);


--
-- Chỉ mục cho bảng `products`
--

ALTER TABLE `payment_details`
ADD PRIMARY KEY (`payment_detail_id`);

--
-- Chỉ mục cho bảng `discounts`
--

ALTER TABLE `discounts`
ADD PRIMARY KEY (`discount_id`);


--
-- AUTO_INCREMENT cho bảng `users`
--

ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--

ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT cho bảng `orders`
--

ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--

ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `discounts`
--

ALTER TABLE `discounts`
  MODIFY `discount_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payment_details`
--

ALTER TABLE `payment_details`
  MODIFY `payment_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--

ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Indexes for dumped tables
--
--
-- Indexes for table `orders`
--

ALTER TABLE `orders`
ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Indexes for table `products`
--

ALTER TABLE `products`
ADD CONSTRAINT `product_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `order_details`
--

ALTER TABLE `order_details`
ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);



--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
ADD CONSTRAINT `payment_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD CONSTRAINT `payment_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;