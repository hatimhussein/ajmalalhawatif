-- Run this SQL in your database to create the serial_numbers table

CREATE TABLE IF NOT EXISTS `serial_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_number` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `product_name_ar` varchar(255) DEFAULT NULL,
  `product_name_en` varchar(255) DEFAULT NULL,
  `product_serial` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial_numbers_product_serial_unique` (`product_serial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
