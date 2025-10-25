-- SQL script to add serial_number_id column to skudo_insurances table
-- Run this in your database to add the foreign key relationship

ALTER TABLE `skudo_insurances` 
ADD COLUMN `serial_number_id` bigint(20) UNSIGNED NULL AFTER `package_serial`,
ADD CONSTRAINT `skudo_insurances_serial_number_id_foreign` 
FOREIGN KEY (`serial_number_id`) REFERENCES `serial_numbers` (`id`) ON DELETE SET NULL;
