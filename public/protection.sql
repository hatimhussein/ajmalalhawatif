-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2022 at 02:02 PM
-- Server version: 5.7.13-log
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `protection`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `orders_zones` longtext COLLATE utf8mb4_unicode_ci,
  `order_type` int(11) NOT NULL,
  `status_levels` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `orders_zones`, `order_type`, `status_levels`, `phone`, `phone_code_id`) VALUES
(1, 'ajmal', 'ajmal@ajmalalhawatif.com', 'ajmal@ajmalalhawatif.com', '$2y$10$V5sgEm215wjdpofXJhJ.XeNZAeZRJjUSW4.u/bBt713znGh7RD9Py', NULL, '2019-08-04 22:00:00', '2021-08-10 11:37:14', '47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198', 2, '1,2,3,4,6,7,9', '504756756', 157),
(3, 'سعد حسن الشمراني', '10110', 'saad@ajmalalhawatif.com', '$2y$10$w6Pd466qld9gVXWNsAks4usPBq8MB0j6vzilii0QI4XvzlIfvA8Dq', NULL, '2020-08-24 21:21:22', '2021-08-10 11:38:58', '47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198', 2, '1,2,3,4,6,7,9', '590099819', 157),
(4, 'علي حسن الشمراني', '10101', '3li@ajmalalhawatif.com', '$2y$10$MIMiqxwqx9GrhF6vUlu/WuqUCEFMCY0O.UlH3dhUigZSP1x8iLeK6', NULL, '2020-09-07 05:43:41', '2021-07-14 10:47:31', '47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192', 2, '1,2,3,4,6,7,9', '596656679', 157),
(5, 'حسن علي الشمراني', '10100', 'has19sa@ajmalalhawatif.com', '$2y$10$Mau20c4RO3rHasDhnqSaLuiK2JXwAalSVfL/97Ch6G0Lyh.3dbOJS', NULL, '2020-09-12 02:46:10', '2021-05-04 05:10:03', '47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192', 2, '1,2,3,4,6,7,9', NULL, NULL),
(6, 'ادارة المنطقة الشرقية', '10136', 'Eastern@alshammam.com', '$2y$10$hNinL01CkmPm9FCoW7LXZuLIKv6bSYDQU1OBhN/qoa4E01G9K3qJq', NULL, '2020-09-12 02:49:10', '2021-05-06 23:23:51', '106,107,108,109,110,111,112,113,114,115,116,117', 1, '1,2,3,4,6', NULL, NULL),
(7, 'ادارة المنطقة الغربية', '10133', 'Western@ajmalalhawatif.com', '$2y$10$/ld0B/iI2qkM55ae/h/f2.c3nIgncD5WGQMfKJ/83jLcq8psGQsyC', NULL, '2020-09-12 02:51:35', '2021-05-04 05:12:06', '67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92', 1, '1,2,3,4,6', NULL, NULL),
(9, 'ادارة المنطقة الجنوبية', '10134', 'Southern@ajmalalhawatif.com', '$2y$10$vAtzIn7CCZwfY9JMyMTEn.yKkMD4hbmHxDFN4ixErzvE4puN0dzFS', NULL, '2020-09-12 03:05:13', '2021-05-04 05:13:41', '118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185', 1, '1,2,3,4,6', NULL, NULL),
(10, 'ادارة منطقة الرياض', '10137', 'riyadh@alshammam.com', '$2y$10$8Ws6BSqe0G4WpEMN82yiA.ytgvQXzmFsIR5JSL/taQIqHNYuHR5hm', NULL, '2020-09-12 03:06:13', '2021-07-15 07:48:38', '47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66', 1, '1,2,3,4,6', '506454913', 157),
(11, 'ادارة التصميم', '10103', 'Designer@ajmalalhawatif.com', '$2y$10$UNNuXJI8OWsAULyGYrozR..7jyibUhoKwB4Hl7hrII9BQIQfjiMlG', NULL, '2020-09-12 03:07:09', '2021-05-30 19:03:01', '47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192', 2, '1,2,3,4,6,7,9', '594710425', 157),
(12, 'ادارة خدمة العملاء', '10135', 'care@ajmalalhawatif.com', '$2y$10$Mwr9jXzH8emCPbBwfLGGh.xOeqzrnjBnWo7FaFBgiI4fGsYcMEcvq', NULL, '2021-04-14 21:46:54', '2021-05-04 05:09:10', '47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192', 2, '1,2,3,4,6,7,9', NULL, NULL),
(14, 'الادارة المالية', '10127', 'aaccountant@alshammam.com', '$2y$10$FRk36OX7vFJ5uRAut8D3suENDp/8UV1Njl93hpYeI9OFAZuSIXYV.', NULL, '2021-06-19 19:03:45', '2021-06-19 19:04:24', '47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192', 2, '1,2,3,4,6,7,9', '594710340', 157),
(15, 'Ahmed', 'admin', 'admin@admin.com', '$2y$10$EEKJ0IZbqRVPANALYclsKu9m.sfM32ZOR001VggPbGGxvsZW5Jjni', NULL, '2021-08-10 12:07:57', '2021-08-10 12:13:39', '47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198', 2, '1,2,3,4,6,7,9', '1159411123', 57);

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `image_ar`, `link`, `position`, `title`, `created_at`, `updated_at`, `image_en`) VALUES
(1, '162938620602.jpg', 'http://protection2.pioneers-solutions.org/category/47', 1, 'الرئيسية تحت الاسليدر', NULL, '2021-08-19 16:16:46', '162938620602.jpg'),
(2, '162938622401.jpg', 'http://wagdystoreha.com/product-details/20', 2, 'الرئيسية تحت الاسليدر', NULL, '2021-08-19 16:17:04', '162938622401.jpg'),
(3, '162938641302.jpg', 'http://protection2.pioneers-solutions.org/category/47', 3, 'اسفل الرئيسية', NULL, '2021-08-19 16:20:13', '162938641302.jpg'),
(4, '162938642901.jpg', 'http://wagdystoreha.com/product-details/27', 4, 'اسفل الرئيسية', NULL, '2021-08-19 16:20:29', '162938642901.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `advertise_setttings`
--

CREATE TABLE `advertise_setttings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertise_setttings`
--

INSERT INTO `advertise_setttings` (`id`, `name_ar`, `name_en`, `status`, `created_at`, `updated_at`) VALUES
(1, 'اول اعلانين', 'the first two announcements', 1, NULL, '2021-08-19 16:11:54'),
(2, 'ثانى اعلانين', 'the second two announcement', 1, NULL, '2021-08-19 16:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(17, 'رقم الصنف', 'Item No', '2021-01-23 22:59:43', '2021-01-23 22:59:43'),
(18, 'سعة البطارية', 'Battery capacity', '2021-01-23 22:59:57', '2021-01-23 22:59:57'),
(19, 'الملحقات', 'Accessories', '2021-01-23 23:00:18', '2021-01-23 23:00:18'),
(20, 'السعة (الذاكره)', 'memory', '2021-01-23 23:00:33', '2021-01-23 23:00:33'),
(21, 'مقاس الشاشة', 'Screen size', '2021-01-23 23:00:49', '2021-01-23 23:00:49'),
(22, 'دقة وضوح الكاميرا', 'Camera resolution', '2021-01-23 23:01:04', '2021-01-23 23:01:04'),
(23, 'نظام التشغيل', 'Operating System', '2021-01-23 23:01:28', '2021-01-23 23:01:28'),
(24, 'شبكات الاتصال المدعومة', 'Supported networks', '2021-01-23 23:01:47', '2021-01-23 23:01:47'),
(25, 'عدد الشرائح المدعومة', 'Number of slides supported', '2021-01-23 23:02:04', '2021-01-23 23:02:04'),
(26, 'نوع الشريحة', 'Slide type', '2021-01-23 23:02:47', '2021-01-23 23:02:47'),
(27, 'اللون', 'color', '2021-01-23 23:03:04', '2021-01-23 23:03:04'),
(28, 'منفذ الشحن', 'Charging port', '2021-01-23 23:03:17', '2021-01-23 23:03:17'),
(29, 'بطارية قابلة للازالة', 'Removable battery', '2021-01-23 23:03:33', '2021-01-23 23:03:33'),
(30, 'دقة الشاشة', 'screen resolution', '2021-01-23 23:03:52', '2021-01-23 23:03:52'),
(31, 'العرض', 'Width', '2021-01-23 23:04:06', '2021-01-23 23:04:38'),
(32, 'الارتفاع', 'Height', '2021-01-23 23:04:21', '2021-01-23 23:04:21'),
(33, 'وزن الشحن (كجم)', 'Shipping Weight (kg)', '2021-01-23 23:05:13', '2021-01-23 23:05:13'),
(34, 'مدة الضمان (بالأشهر)', 'Warranty period (in months)', '2021-01-23 23:05:34', '2021-01-23 23:05:34'),
(35, 'عدد المنافذ', 'Number of ports', '2021-01-23 23:06:01', '2021-01-23 23:06:01'),
(36, 'الحد الاقصى لسرعة الشحن', 'Maximum charging speed', '2021-01-23 23:06:20', '2021-01-23 23:06:20'),
(37, 'تقنية شحن البطارية', 'Battery charging technology', '2021-01-23 23:06:33', '2021-01-23 23:06:33'),
(38, 'الموديلات المتوافقة', 'Compatible Models', '2021-01-23 23:06:50', '2021-01-23 23:06:50'),
(39, 'الطاقة القصوى', 'Maximum power', '2021-01-23 23:07:07', '2021-01-23 23:07:07'),
(40, 'عدد السماعات', 'Number of speakers', '2021-01-23 23:07:25', '2021-01-23 23:07:25'),
(41, 'عمر البطارية', 'Battery life', '2021-01-23 23:07:39', '2021-01-23 23:07:39'),
(42, 'نوع التوصيلة', 'Connection type', '2021-01-23 23:07:50', '2021-01-23 23:07:50'),
(43, 'مقاوم للماء', 'water resistant', '2021-01-23 23:08:04', '2021-01-23 23:08:04'),
(44, 'طول السلك', 'Length of the wire', '2021-01-23 23:08:46', '2021-01-23 23:08:46'),
(45, 'نوع القابس', 'Plug type', '2021-01-23 23:09:04', '2021-01-23 23:09:04'),
(46, 'التصميم', 'the design', '2021-01-23 23:09:23', '2021-01-23 23:09:23'),
(47, 'نوع الميكروفون', 'Microphone type', '2021-01-23 23:09:45', '2021-01-23 23:09:45'),
(48, 'عزل الصوت', 'Sound insulation', '2021-01-23 23:09:57', '2021-01-23 23:09:57'),
(49, 'ملتي بوينت - عدد الاجهزة المتصلة', 'Multi Point - the number of connected devices', '2021-01-23 23:10:10', '2021-01-23 23:10:10'),
(50, 'تحكم الصوت', 'Sound controller', '2021-01-23 23:10:23', '2021-01-23 23:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_ar`, `name_en`, `photo`, `sort_order`, `created_at`, `updated_at`) VALUES
(71, 'بروتكشن برو', 'Protection pro', '1610046183129301587416130.png', 1, '2021-01-05 20:30:04', '2021-01-07 20:03:03'),
(72, 'شاومي', 'Xiaomi', '1609875322qLB8xN2FxEHLrmehuD4lGmmKiQSr62S4wnLkSweX.png', 2, '2021-01-05 20:30:04', '2021-01-05 20:35:22'),
(73, 'باوراولوجي', 'Powerology', '1609913875jyk31aKvnJBSD4y0iIcDXaNSUZA74mkO1WbMriHx.png', 3, '2021-01-05 20:30:04', '2021-01-06 07:17:55'),
(74, 'برودو', 'Porodo', '1609875180z6NLfWaSvt7Fv9oSfHnQzd6eUa85r2RxasMtb2SH.png', 4, '2021-01-05 20:30:04', '2021-07-05 18:39:12'),
(75, 'ديفيا', 'Devia', '1609913897p8tRp0afSTQmPNr08MVxFKpEVp1wtG1wrVwQW505.png', 5, '2021-01-05 20:30:04', '2021-01-06 07:18:17'),
(76, 'ابل', 'Apple', '1609913848logo-apple-500x500.png', 6, '2021-01-05 20:30:04', '2021-01-06 07:17:28'),
(77, 'انكر', 'Anker', '1609913800Anker-Logo.png', 7, '2021-01-05 20:30:04', '2021-01-06 07:16:40'),
(78, 'ايلفنت', 'Elephant', '1609913989elephant-logo-icon-illustration_7688-1278.jpg', 8, '2021-01-05 20:30:04', '2021-01-06 07:19:49'),
(80, 'جيم سير', 'gamesir', '1609913174qEXdBOmJKozjEehdaj8RdJnkfut6wWkYf0uuNOKa.png', 10, '2021-01-05 20:30:04', '2021-01-06 07:06:14'),
(81, 'سامسونج', 'Samsung', '16099128603VXjvIdBvr33TocjenQUMzTt9oWiI4LfHpPK0wCz.png', 11, '2021-01-05 20:30:04', '2021-01-06 07:01:00'),
(82, 'هواوي', 'Huwawei', '16099133656c896f40-b0ab-4d3a-9a5d-9dbb7e8a4c0e.jpeg', 12, '2021-01-05 20:30:04', '2021-01-06 07:09:25'),
(83, 'جي بي ال', 'JBL', '1609875303ص.png', 13, '2021-01-05 20:30:04', '2021-01-05 20:35:03'),
(84, 'نوكيا', 'NOkia', '1609913710853739d9c213b7a789c5636f87c0ecc6.png', 14, '2021-01-05 20:30:04', '2021-01-06 07:15:10'),
(85, 'جريبون', 'Gripon', '1609913611PJrOQdLRNM0jNjQyr1QkzkIYuMPCZlcBdql9icmW.png', 15, '2021-01-05 20:30:04', '2021-01-06 07:13:31'),
(86, 'وولنيت', 'Walnut', '16099133400ce2783c-1e91-407c-b50f-c27abf454694.jpeg', 16, '2021-01-05 20:30:04', '2021-01-06 07:09:01'),
(87, 'بوب سوكيتس', 'Popsockets', '1609875240ششش.png', 17, '2021-01-05 20:30:04', '2021-01-05 20:34:00'),
(88, 'ايلاجو', 'elago', '1609875087ئ.png', 18, '2021-01-05 20:30:04', '2021-06-30 23:24:49'),
(89, 'راف باور', 'Ravepower', '1609912723bkleTa40Yqv9sM6NvXZ9o2PQwe16wyw8vLJ3MR3s.png', 19, '2021-01-05 20:30:04', '2021-01-06 06:58:43'),
(90, 'كوداك', 'Kodak', '1609912767Xbp5viMcg6ktsaBJXf8B2OGQjZHIrxocrZRKY3yY.png', 20, '2021-01-05 20:30:04', '2021-01-06 06:59:27'),
(91, 'بيلكن', 'Belkin', '1609875259ضض.png', 21, '2021-01-05 20:30:04', '2021-01-05 20:34:19'),
(92, 'بلانيت رونيكس', 'Plantronics', '1609875222ييي.png', 22, '2021-01-05 20:30:04', '2021-01-05 20:33:42'),
(93, 'هونر', 'honor', '1609913466تنزيل.png', 23, '2021-01-05 20:30:04', '2021-01-06 07:11:06'),
(94, 'اوبو', 'OPPO', '1609913634تنزيل (2).png', 24, '2021-01-05 20:30:04', '2021-01-06 07:13:54'),
(95, 'فيفا مدريد', 'VIVA MADRID', '1609912890zTgPPO9Ohl6it70FfNaJKGsN0GgBszXcvjVFc8ko.png', 25, '2021-01-05 20:30:04', '2021-07-05 19:03:25'),
(96, 'باور بيتس', 'Powerbeats', '1609913586تنزيل (1).png', 26, '2021-01-05 20:30:04', '2021-01-06 07:13:06'),
(98, 'يونيك', 'Uniq', '1609913501q3H2We1CUUm32b7OEW1LgzRStJ8Zy8uOlaLcTs1r.jpeg', 28, '2021-01-05 20:30:04', '2021-01-06 07:11:41'),
(99, 'موماكس', 'Momax', '1609912794anqbwRgb9mDWzx2aAPCRhgoYYMYw8Bg7I2ZSr9Bl.png', 29, '2021-01-05 20:30:04', '2021-01-06 06:59:54'),
(100, 'نوكيس', 'Nuckees', '1609911993LrahVI68LiUmfCrHl1zBhA06RMlZ4OTluK0sEp9A.png', 30, '2021-01-05 20:30:04', '2021-01-06 06:46:34'),
(101, 'دي جي اي', 'dji', '1609914312Tc05ERV9Q8vy8HJ3UVaOicmvyNglnZtN6oiISArF.png', 31, '2021-01-05 21:22:38', '2021-01-06 07:25:12'),
(102, 'جرين', 'Green', '1609914378IMvn63EJ1ad6DyTqrovmFpCsSb2lqHX5RWadOVg3.png', 32, '2021-01-06 07:26:18', '2021-06-30 23:26:07'),
(103, 'بوز', 'Bose', '1609914406Yv95pEpv5MYiD2kTyvvxMy2UmnqubHSi5HStyQrk.png', 33, '2021-01-06 07:26:46', '2021-01-06 07:26:46'),
(104, 'هاندل', 'Handel', '1609914440C8e0dtcgF59OStOIODzFobDkajktBF9YhSt9N3Q4.png', 34, '2021-01-06 07:27:20', '2021-01-06 07:27:20'),
(105, 'موفي', 'mophie', '1609914468CdchC6QOJ3FZIQKMZUarSkR4YZHenDwyfZXiC9Lj.png', 37, '2021-01-06 07:27:48', '2021-01-06 07:27:48'),
(106, 'بانزر قلاس', 'Panzer Glass', '1609914521تنزيل.png', 38, '2021-01-06 07:28:41', '2021-01-06 07:28:41'),
(107, 'جير فور', 'Gear 4', '1609914569xjbQRCeb.jpg', 39, '2021-01-06 07:29:29', '2021-01-06 07:29:29'),
(108, 'تيك 21', 'tec21', '1609914637brands-logods--324x324.jpg', 40, '2021-01-06 07:30:37', '2021-01-06 07:30:37'),
(109, 'اكس بانثر', 'X Panther', '1609914797iYlLzjqJ_400x400.jpg', 41, '2021-01-06 07:31:13', '2021-02-23 21:56:26'),
(110, 'سوني', 'Sony', '1609914743تنزيل (1).png', 42, '2021-01-06 07:32:23', '2021-01-06 07:32:23'),
(111, 'نمبر ون', 'Number One', '1625073389logo.png', 35, '2021-01-07 19:22:02', '2021-06-30 20:16:29'),
(112, 'عام', 'general', '1625500001اسود.jpg', 43, '2021-07-05 18:45:57', '2021-07-05 18:46:41'),
(113, 'لوكسار', 'Loksar', '1626117603شعار للماركات في المتجر الالكتروني-01.png', 44, '2021-07-05 18:57:09', '2021-07-12 22:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `item_combination` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `offer_price` double NOT NULL DEFAULT '0',
  `offer_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'value',
  `offer_end_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `offer_send_time` datetime DEFAULT NULL,
  `is_sent` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seen_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `item_combination`, `quantity`, `offer_price`, `offer_type`, `offer_end_time`, `offer_send_time`, `is_sent`, `created_at`, `updated_at`, `seen_at`) VALUES
(3, 284, 6185, NULL, 2, 0, 'value', '2021-09-29 17:48:37', NULL, 1, '2021-09-29 16:48:37', '2022-03-15 15:26:18', '2022-03-15 17:26:18'),
(4, 284, 5293, NULL, 1, 0, 'value', '2021-09-29 17:48:39', NULL, 1, '2021-09-29 16:48:39', '2022-03-15 15:26:18', '2022-03-15 17:26:18'),
(5, 284, 5294, NULL, 1, 0, 'value', '2021-12-19 15:57:34', NULL, 1, '2021-12-19 14:57:34', '2022-03-15 15:26:18', '2022-03-15 17:26:18'),
(10, 242, 5293, NULL, 10, 0, 'value', '2022-03-15 20:56:04', NULL, 1, '2022-03-15 19:56:04', '2022-03-15 19:56:12', NULL),
(11, 288, 5293, NULL, 4, 0, 'value', '2022-03-16 11:38:41', NULL, 1, '2022-03-16 10:38:41', '2022-03-16 10:38:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewed_levels` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `catalog_category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_categories`
--

CREATE TABLE `catalog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalog_categories`
--

INSERT INTO `catalog_categories` (`id`, `parent_id`, `name_ar`, `name_en`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'المطبوعات', 'Publications', '1625073745الايقونة الرئيسية -01.png', '2021-05-19 15:57:15', '2021-06-30 20:22:25', NULL),
(2, NULL, 'محتوى رقمي', 'digital content', '1625074090الايقونة الرئيسية -01.png', '2021-05-19 15:57:36', '2021-06-30 20:28:10', NULL),
(3, NULL, 'كتالوجات PDF', 'PDF Catalogs', '1625074131الايقونة الرئيسية -01.png', '2021-05-19 15:57:56', '2021-06-30 20:28:51', NULL),
(4, 1, 'بروشورات', 'brochures', '1625074387Untitled-3-01.png', '2021-05-19 15:58:59', '2021-06-30 20:33:07', NULL),
(5, 1, 'رول اب', 'Roll-Up', '1625074419Untitled-3-02.png', '2021-05-19 15:59:15', '2021-06-30 20:33:39', NULL),
(6, 1, 'ملصقات ( استكر)', 'Stickers', '1625074482Untitled-3-03.png', '2021-05-19 15:59:50', '2021-06-30 20:34:42', NULL),
(7, 1, 'فلاير', 'flyer', '1625074512Untitled-3-04.png', '2021-05-19 16:00:14', '2021-06-30 20:35:12', NULL),
(8, 1, 'معلقات', 'Hangings', '1625074543Untitled-3-05.png', '2021-05-19 16:00:28', '2021-06-30 20:35:43', NULL),
(9, NULL, 'محتوى مطبعي', 'محتوى مطبعي', '1622398241Black PNG-01.png', '2021-05-30 19:10:42', '2021-06-29 02:40:41', '2021-06-29 02:40:41'),
(10, 9, 'مواعيد', 'مواعيد', '1622398271اسود.png', '2021-05-30 19:11:11', '2021-06-29 02:40:33', '2021-06-29 02:40:33'),
(11, 2, 'تيست', 'test', '162443725416160617321603633975received_298269574858863.jpeg', '2021-06-23 09:34:15', '2021-06-29 02:40:49', '2021-06-29 02:40:49'),
(12, 2, 'محتوى انستقرام', 'Instagram content', '16250749781-03.png', '2021-06-29 02:42:09', '2021-06-30 20:42:58', NULL),
(13, 2, 'محتوى سناب شات', 'Snapchat content', '16250749911-02.png', '2021-06-29 02:42:40', '2021-06-30 20:43:11', NULL),
(14, 2, 'محتوى تويتر', 'Twitter content', '16250750041-01.png', '2021-06-29 02:43:22', '2021-06-30 20:43:24', NULL),
(15, 2, 'محتوى تيك توك', 'Tik Tok content', '1625075018Untitled-3-04.png', '2021-06-29 02:43:47', '2021-06-30 20:43:38', NULL),
(16, 2, 'محتوى يوتيوب', 'YouTube content', '16250750301-05.png', '2021-06-29 02:44:24', '2021-06-30 20:43:50', NULL),
(17, 3, 'ملفات بي دي اف', 'PDF files', '16249311171623980984CB3F6CBE-EB8E-401A-82CF-4E9D53D41C70.png', '2021-06-29 02:45:17', '2021-06-29 02:45:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `in_home_page` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `photo`, `status`, `created_at`, `updated_at`, `in_home_page`, `sort_order`, `banner`) VALUES
(113, NULL, 'الاجهزة الذكية', 'Smart Phones', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 0, 1, '162554903231D3729D-542B-43E1-A34E-3756042A347F.png'),
(114, NULL, 'البطاريات', 'Batteries', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 1, 1, '16255490855217C955-B7A0-4B8E-B762-07F716259439.png'),
(115, NULL, 'الكيابل', 'Cable', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 1, 1, '1626103931wertyuiop[01.jpg'),
(116, NULL, 'الكفرات', 'Covers', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 0, 1, '162554917195E82FB8-5805-4070-97FA-F639C98C917D.png'),
(117, NULL, 'مكبرات الصوت (سبيكر)', 'Speakers', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 1, 1, '16255491934F29436E-9B8C-4956-BC02-E4428F717251.png'),
(118, NULL, 'حماية الشاشة', 'Protection Screen', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 1, 1, '16255492693DD556F8-9432-447C-B23C-1CA9F993F55F.png'),
(119, NULL, 'الساعات الذكية', 'Smart watch', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 0, 1, '1625549251B577963D-27FC-40D1-94F7-E5C1CC4E91AE.png'),
(120, NULL, 'السماعات السلكية', 'Headphone', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 1, 1, '16255493353DABA122-6411-4EE9-B47E-B5CB32F5B1AC.png'),
(121, NULL, 'الطابعات', 'Printers', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 0, 1, '16255493568C1F0DEF-9735-4084-8ABD-CDAEDB93AB26.png'),
(122, NULL, 'الراوترات', 'Routers', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 0, 1, '16255493722F4A8DE3-6532-4110-947E-662F4A3ABF56.png'),
(123, NULL, 'الكاميرات وملحقاتها', 'Cameras and accessories', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 0, 1, '1625549389B217216C-FDCA-4B28-90C5-8BC9EA1619A3.png'),
(124, NULL, 'مستلزمات السيارة', 'Car accessories', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 1, 1, '16255494109FE7A37C-EE1E-4E5F-B037-B7184156B064.png'),
(125, NULL, 'الشواحن المنزلية', 'Home Charger', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 1, 1, '16255494262E6E6A6A-E0DC-4AEA-9C94-D500CD2A10F8.png'),
(126, NULL, 'مكائن التغليف الحراري', 'Machine', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 0, 1, '1625549460A1DBC25E-0368-441B-AFB2-F4B35C5C6336.png'),
(127, NULL, 'التغليف الحراري', 'Thermal Packaging', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 1, 1, '1625549496D5FC4AE9-8CF3-4D82-8805-17619BA07D7C.png'),
(128, NULL, 'قطع الغيار', 'Spare parts', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 1, 1, NULL),
(129, NULL, 'سماعات بلوتوث', 'Bluetooth headphones', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 1, 1, '1625549597C3DD3D75-81C4-4C52-B724-5535D4AD9A79.png'),
(130, NULL, 'ستاند (مثبت الاجهزة)', 'Mobile Holder', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 1, 1, '1625780500dsdsdsf.jpg'),
(131, NULL, 'اكسسوارات الساعات و الاساور', 'Accessories for watches and bracelets', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 1, 1, '1626027040قسم الساعات و الاساور.jpg'),
(132, NULL, 'المسكات و المقابض', 'Grips', '.', '.', NULL, 1, '2021-06-30 22:04:43', '2021-08-10 18:50:37', 1, 1, '1625549614F05E8AEB-3209-460C-8A58-1E896E6C302A.png'),
(133, NULL, 'الحقائب', 'Bags', '.', '.', NULL, 1, '2021-06-30 22:04:44', '2021-08-10 18:50:37', 1, 1, '1625781597fsafvxc.jpg'),
(134, NULL, 'الالعاب وملحقاتها', 'Games', '.', '.', NULL, 1, '2021-06-30 22:04:44', '2021-08-10 18:50:37', 0, 1, '162554965044B8D153-1EE6-4D84-B872-B796FB72D5B0.png'),
(135, NULL, 'التصوير وملحقاته', 'Photography and accessories', '.', '.', NULL, 1, '2021-06-30 22:04:44', '2021-08-10 18:50:37', 0, 1, NULL),
(136, NULL, 'ملحقات اخرى', 'Other Accessories', '.', '.', '16286134086.png', 1, '2021-06-30 22:04:44', '2021-08-10 18:50:37', 1, 1, '1625781018fdfadf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category_options`
--

CREATE TABLE `category_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `government_id` int(10) UNSIGNED DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_en`, `name_ar`, `government_id`, `country_id`, `created_at`, `updated_at`, `shipping_price`) VALUES
(56, 'Riyadh', 'الرياض', 11, 1, '2021-01-06 07:48:26', '2021-07-01 18:23:37', 39),
(57, 'Qassim', 'القصيم', 12, 1, '2021-01-06 07:48:26', '2021-06-17 06:33:00', 39),
(58, 'Tabuk', 'تبوك', 12, 1, '2021-01-06 07:48:26', '2021-06-17 06:33:13', 39),
(59, 'Hail', 'حائل', 12, 1, '2021-01-06 07:48:26', '2021-06-17 06:33:46', 39),
(60, 'alhudud alshamalia', 'الحدود الشمالية', 12, 1, '2021-01-06 07:48:26', '2021-06-17 06:33:31', 39),
(61, 'aljawf', 'الجوف', 12, 1, '2021-01-06 07:48:26', '2021-06-17 06:34:03', 39),
(62, 'Mecca', 'مكة المكرمة', 13, 1, '2021-01-06 07:50:35', '2021-06-17 06:34:17', 39),
(63, 'Medina', 'المدينة المنورة', 13, 1, '2021-01-06 07:50:58', '2021-07-01 18:23:45', 39),
(64, 'Dammam', 'الدمام', 14, 1, '2021-01-06 07:51:24', '2021-06-17 06:34:49', 39),
(65, 'easir', 'عسير', 15, 1, '2021-01-06 07:51:47', '2021-06-17 06:35:07', 39),
(66, 'Jazan', 'جازان', 15, 1, '2021-01-06 07:52:54', '2021-06-17 06:35:23', 39),
(67, 'Najran', 'نجران', 15, 1, '2021-01-06 07:53:19', '2021-06-17 06:35:39', 39),
(68, 'albaha', 'الباحه', 15, 1, '2021-01-06 07:53:43', '2021-06-17 06:35:54', 39),
(69, 'Emirates', 'الامارات', 16, 2, '2021-07-10 22:12:43', '2021-07-10 22:12:43', 0),
(70, 'Kuwait', 'الكويت', 17, 3, '2021-07-10 22:12:58', '2021-07-10 22:12:58', 0),
(71, 'Bahrain', 'البحرين', 18, 4, '2021-07-10 22:13:13', '2021-07-10 22:13:13', 0),
(72, 'Oman', 'عمان', 19, 5, '2021-07-10 22:13:26', '2021-07-10 22:13:26', 0),
(73, 'Qatar', 'قطر', 20, 6, '2021-07-10 22:13:46', '2021-07-10 22:13:46', 0),
(74, 'Egypt', 'مصر', 21, 7, '2021-07-10 22:14:04', '2021-07-10 22:14:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `key` varchar(191) NOT NULL,
  `name_ar` varchar(191) NOT NULL,
  `name_en` varchar(191) NOT NULL,
  `value` varchar(191) NOT NULL,
  `ex_value` text,
  `type` varchar(191) NOT NULL DEFAULT 'color',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `key`, `name_ar`, `name_en`, `value`, `ex_value`, `type`, `updated_at`, `created_at`) VALUES
(1, 'btn-primary-bg', 'الزر الرئيسى', 'Primary Button', '#585651', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(2, 'btn-primary-color', 'خط الزر الرئيسى', 'Primary Button Text', '#ffffff', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(3, 'btn-secondary-bg', 'الزر الثانوى', 'Secondary Button', '#3ac0c4', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(4, 'btn-secondary-color', 'خط الزر الثانوى', 'Secondary Button Text', '#ffffff', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(5, 'navbar-bg', 'شريط اعلى الصفحة', 'NavBar', '#3ac0c4', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(6, 'navbar-color', 'نص شريط اعلى الصفحة', 'NavBar Text', '#050505', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(7, 'brands-bg', 'العلامات التجارية', 'Brands', '#ffffff', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(8, 'newsletter-bg', 'خلفية القائمة البريدية', 'Newsletter Background', '#474747', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(9, 'footer-bg', 'اسفل الصفحة', 'Footer', '#000000', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(10, 'footer-color', 'نص اسفل الصفحة', 'Footer Text', '#ffffff', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(11, 'primary-color', 'اللون الرئيسى', 'Primary Color', '#000000', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(12, 'secondary-color', 'اللون الثانوى', 'Secondary Color', '#d1d1d1', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(13, 'cart-bg', 'اضف للسلة', 'Add to Cart', '#000000', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(14, 'cart-color', 'نص اضف للسلة', 'Add to Cart text', '#ffffff', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(15, 'cart-hover', 'تفعيل اضف للسلة', 'Add to cart hover', '#3ac0c4', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(16, 'font-ar', 'الخط العربى', 'Arabic Font', 'helvetica-regular', '/assets/front/assets/fonts/helvetica-regular.woff', 'font', '2021-05-04 09:35:05', '2020-11-29 09:01:43'),
(17, 'font-en', 'الخط الانجليزى', 'English Font', 'Roboto', '/assets/front/assets/fonts/Roboto-Bold.ttf', 'font', '2021-05-04 09:35:05', '2020-11-29 09:01:43'),
(18, 'header-bg', 'اعلى الصفحة', 'Header', '#000000', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(19, 'header-color', 'نص اعلى الصفحة', 'Header Text', '#ffffff', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(26, 'Icon-cart', 'لون مربع ايقونة السلة', 'Color Cart icon', '#010e0e', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(27, 'Cart-icon', 'لون ايقونة السلة', 'Color Cart icon', '#000000', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(28, 'Search-icon', 'لون زر المكبر البحث', 'Search Icon', '#ffffff', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(29, 'Login_text', 'نص تسجيل الدخول وحسابي', 'Login Text', '#ffffff', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(30, 'menu_color', 'لون خلفية القائمة', 'Menu Color', '#444645', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(31, 'menu_text_color', 'لون نص القائمة', 'Menu Text Color', '#ffffff', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(32, 'mobile_menu_color', 'لون خلفية قائمة الجوال', 'Mobile Menu Color', '#ffffff', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(33, 'mobile_menu_text_color', 'لون نص قائمة الجوال', 'Mobile Menu Text Color', '#000000', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43'),
(34, 'brands-color', 'نص العلامات التجارية', 'Brands Text', '#ff0000', NULL, 'color', '2021-05-27 17:52:32', '2020-11-29 09:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `key`, `display_name_ar`, `display_name_en`, `value_ar`, `value_en`, `category_id`, `photo`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'about', 'عن الشركة', 'About US', '<p style=\"margin-right:48px\"><img alt=\"\" src=\"https://g.top4top.io/p_2007c5pdx1.png\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p style=\"margin-right:48px\"><span style=\"font-size:22px\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>&nbsp;&nbsp;</strong><strong><span style=\"color:black\">شركة أجمل الهواتف</span></strong><strong><span style=\"color:black\">&nbsp;التجارية&nbsp;</span></strong></span></span></p>\r\n\r\n<p style=\"margin-right:48px\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">هي إحدى الشركات الرائدة فى السوق السعودي&nbsp;فى مجال الاتصالات وتقنية المعلومات .</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;انشئت الشركة فى مطلع عام 2008 م على يد نخبة من المتخصصين لنبدأ النشاط وننافس فى الريادة</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></span></span><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">هدفنا تمكين ودعم قطاعات الاتصالات وتقنية المعلومات&nbsp;فى الشرق الأوسط وتغيير مفهوم الشراء والبيع لدى التجار&nbsp;بطرق حديثه .</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">- حققنا العديد من الإنجازات فى تلك الفترة القصيرة واستحوذنا على ثقة العملاء وأصبح لدينا عملاء نعتز بهم من مختلف مناطق المملكة .</span></span></span></span></p>\r\n\r\n<p style=\"margin-right:144px\">&nbsp;</p>\r\n\r\n<p style=\"margin-right:144px\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:13.5pt\"><span style=\"background-color:#f39c12\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"color:black\">تهدف رسالة الشركة الى دعم نمو قطاع الأعمال من خلال :-</span></span></span></span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"list-style-type:none\">\r\n	<ul>\r\n		<li style=\"list-style-type:none\">\r\n		<ul>\r\n			<li style=\"list-style-type: none;\">&nbsp;</li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">- توفير منتجات ذات جوده عالية وخدمات&nbsp;متكاملة تبدأ من الطلب حتى استلام المنتج عبر لوحه تحكم&nbsp;كامله ومتابعة حالة الطلب حتى الاستلام .&nbsp;</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">- التطوير والتحديث الدائم للعملاء بما يلائم احتياجاتهم وتطلعاتهم لاستخدام أفضل وأحدث التقنيات</span></span><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"> لتسهيل اعمال التجاره لهم .</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">- مراعاة التكامل والجودة فى كل مانقوم بتطويره لتقديم أفضل النتائج لعملائنا</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">- تقديم أفضل خدمات مابعد البيع لتحقيق أقصى استفادة من استخدام منتجاتنا وتسهيل إدارة وتطوير أعمال عملائنا</span></span><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"> .</span></span></span></span></p>', '<pre>\r\nAjmal Alhawatif is one of the leading companies in the Saudi market in the field of communications and information technology.\r\n- It was established in early 2008 by a group of specialists to start its activity and compete in leadership.\r\n- It achieved many achievements in that short period and gained the confidence of customers, and we have clients that we cherish from different regions of the Kingdom.\r\nOur goal is to empower and support the telecommunications and information technology sectors in the Middle East and to change the concept of buying and selling with merchants in modern ways to manage integrated resources.\r\nThe company&#39;s mission aims to support the growth of the business sector through: -\r\nProviding high-quality products and integrated services starting from ordering until receiving the product with a control panel to manage their resources and develop their business\r\n</pre>\r\n\r\n<pre>\r\nContinuous development and modernization to suit their needs and aspirations to use the best and latest technologies\r\n- Taking into account integrity and quality in everything we develop to provide the best results for our clients\r\nProviding the best technical support and consulting services to make the most of the use of our applications and software solutions in managing and developing our clients&#39; businesses</pre>', 2, NULL, NULL, NULL, '2021-06-30 22:04:05'),
(2, 'map', 'خريطة الموقع', 'Site Map', '<div class=\"static-contain\">\r\n<h4>.</h4>\r\n</div>', '<div class=\"static-contain\">\r\n<h4>.</h4>\r\n</div>', 2, NULL, NULL, NULL, '2020-11-20 02:39:13'),
(3, 'return', 'سياسة الاسترجاع', 'Return Policy', '<h1 dir=\"LTR\" style=\"text-align:right\"><strong><span style=\"color:#ff0033\"><span style=\"font-size:24pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span dir=\"RTL\" lang=\"AR-SA\" style=\"font-size:26.0pt\"><span style=\"background-color:white\">سياسة الضمان والإستبدال والإسترجاع&nbsp; :&nbsp; &nbsp; &nbsp;</span></span>&nbsp;&nbsp;</span></span></span></span></strong></h1>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">- الجهاز المراد استبداله يكون بحالته الأصلية بدون أي استخدام بكامل اكسسواراته وبالتعبئه الأصلية له وبكامل اكسسوارات التغليف .</span></span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">- يحق للعميل الإستبدال خلال <span style=\"color:#ff0033\"><strong>( ثلاثة أيام (3) )</strong></span> من تاريخ الاستلام كحد أقصى والإسترجاع خلال <span style=\"color:#ff0033\"><strong>( يوم واحد (1) )</strong></span> من تاريخ الاستلام كحد أقصى .</span></span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">- للإستفادة من خدمة الضمان يلزم إحضار المنتج مع أصل فاتورة الشراء للمنتجات التي عليها ضمان فقط .&nbsp;</span></span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">- الضمان لا يغطي أي اضرار ناتجه عن حدوث <span style=\"color:#ff0033\"><strong>( الحوادث - سوء الاستخدام - الرطوبه - الصدأ- الاضرار الناتجه عن طول مدة الاستخدام - التعديلات - استخدام جهد كهربائي غير متوافق او بطريقه لا تتوافق مع تعليمات الشركة المصنعه - الاضرار الناتجه عن السقوط او التعرض للسوائل )</strong></span></span></span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">- الضمان يعتبر ملغي في حال تم إزالة او تعديل او طمس او تحريف بأي شكل من الاشكال الرقم التسلسلي للمنتج او فاتورة الشراء .</span></span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">- ينبغي على العميل تسليم المنتج ان كان به ضرر في مده لا تتجاوز<span style=\"color:#ff0033\"><strong> (48 ساعة)</strong></span> من تاريخ استلامه للتأكد وفحص المنتج ان كان به عطل مصنعي او سوء استخدام ويتم ارساله للشركة او الوكيل ويستغرق ذلك مده اقصاها <span style=\"color:#ff0033\"><strong>(15&nbsp; يوم)</strong></span> من تاريخ استلام المنتج من شركة الشحن .&nbsp;</span></span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">- المشتريات المدفوعه بقسائم شرائية او بطاقات ائتمانية او نقاط لا يمكن ارجاعها نقداً .</span></span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">- يمكنك التواصل معنا عبر البريد الإلكتروني </span></span><input name=\"البريد الالكتروني \" type=\"submit\" value=\"Ajmal@Ajmalalhawatif.com\" /><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">&nbsp; أو عبر مواقع التواصل الإجتماعي الخاصة بنا&nbsp; .</span></span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:right\">&nbsp;</p>\r\n\r\n<div class=\"row\" style=\"-webkit-text-stroke-width:0px; margin-left:-15px; margin-right:-15px; text-align:right; text-indent:0px\">\r\n<div class=\"panel-group\" style=\"margin-bottom:16px\">\r\n<div class=\"panel\" style=\"border-radius:0px\">\r\n<div class=\"panel-body text-gray\" style=\"padding:0px 20px 20px 0px\">\r\n<p dir=\"RTL\" style=\"margin-right:24px\">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '<pre>\r\nWarranty, Exchange and Return Policy:\r\nWarranty, Exchange and Return Policy:\r\n\r\n\r\n\r\n1- The device to be replaced shall be in its original condition without any use with all its accessories, its original packaging and complete packaging accessories.\r\n\r\n\r\n\r\n2- The customer is entitled to exchange within three (3) days from the date of receipt as a maximum, and to return within one (1) day from the date of receipt as a maximum.\r\n\r\n\r\n\r\n3- To benefit from the warranty service, it is necessary to bring the product with the original purchase invoice for the products that have a guarantee only.</pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n4- The warranty does not cover any damages resulting from the occurrence of (accidents - misuse - dampness - rust - damage resulting from prolonged use - modifications - use of incompatible electrical voltage or in a way that does not comply with the manufacturer&#39;s instructions - damage resulting from falling or exposure to liquids. )\r\n\r\n\r\n\r\n5- The warranty is considered invalid if the serial number of the product or the purchase invoice is removed, modified, obscured, or corrupted in any way.\r\n\r\n\r\n\r\n6- The customer should deliver the product if it is damaged within a period not exceeding 48 hours from the date of receiving it to make sure and examine the product if it has a manufacturing defect or misuse and it is sent to the company and this takes a maximum of 21 days from receiving the product from the shipping company.</pre>\r\n\r\n<pre>\r\n\r\n&nbsp;</pre>\r\n\r\n<pre>\r\n7- Purchases paid with vouchers, credit cards, or points that cannot be returned for cash.\r\n\r\n\r\n\r\n8- You can contact us via e-mail info@Ajmalalhawatif.com or via our social media sites or WhatsApp, click here.</pre>\r\n\r\n<p>&nbsp;</p>', 1, '162507357860dca7aa7fa2cاسود.jpg.jpg', NULL, NULL, '2021-06-30 21:35:41'),
(4, 'aman', 'سياسة الامان', 'Security Policy', '<p>سياسة الامان</p>', '<p>سياسة الامان</p>', 1, NULL, NULL, NULL, '2019-11-13 05:33:46'),
(5, 'privacy', 'سياسة الخصوصية', 'Privacy Policy', '<h1>سياسة الخصوصية</h1>\r\n\r\n<h2>من نحن</h2>\r\n\r\n<p>عنوان موقعنا على الويب: Ajmalalhawatif.com</p>\r\n\r\n<h2>ما البيانات الشخصية التي نجمعها ولماذا نقوم بجمعها</h2>\r\n\r\n<h3>تعليقات</h3>\r\n\r\n<p>عندما يترك الزائرون تعليقاتهم على الموقع، نجمع البيانات الموضحة في نموذج التعليقات، وكذلك عنوان IP الخاص بالزائر وسلسلة وكلاء متصفح المستخدم للمساعدة في اكتشاف الرسائل غير المرغوب فيها.</p>\r\n\r\n<p>قد يتم توفير سلسلة مجهولة المصدر تم إنشاؤها من عنوان بريدك الإلكتروني (وتسمى أيضًا hash) إلى خدمة Gravatar لمعرفة ما إذا كنت تستخدمها. سياسة خصوصية خدمة Gravatar متوفرة هنا: //automattic.com/privacy/. بعد الموافقة على تعليقك، ستكون صورة ملفك الشخصي مرئية للعامة في سياق تعليقك.</p>\r\n\r\n<h3>وسائط</h3>\r\n\r\n<p>إذا قمت بتحميل الصور إلى موقع الويب، يجب تجنب تحميل الصور مع بيانات الموقع المضمنة (EXIF GPS). يمكن لزوّار الموقع تنزيل واستخراج أي بيانات موقع من الصور على موقع الويب.</p>\r\n\r\n<h3>نماذج الاتصال</h3>\r\n\r\n<h3>ملفات تعريف الارتباط</h3>\r\n\r\n<p>إذا تركت تعليقًا على موقعنا، فيمكنك تمكين حفظ اسمك وعنوان بريدك الإلكتروني وموقعك الإلكتروني في ملفات تعريف الارتباط. هذه هي لراحتك حتى لا تضطر إلى ملء التفاصيل الخاصة بك مرة أخرى عند ترك تعليق آخر. ستستمر ملفات تعريف الارتباط هذه لمدة عام واحد.</p>\r\n\r\n<p>إذا قمت بزيارة صفحة تسجيل الدخول الخاصة بنا، فسنهيئ ملف تعريف ارتباط مؤقت لتحديد ما إذا كان مستعرضك يقبل هذه الملفات. لايحوي ملف تعريف الارتباط هذا أي بيانات شخصية كما يتم التخلص منه عندما تقوم بإغلاق متصفحك.</p>\r\n\r\n<p>عندما تسجّل الدخول نقوم أيضاً بتهيئة ملفات عديدة لتعريف الارتباط من أجل حفظ معلومات دخولك وخيارات شاشة العرض الخاصة بك. ملفات تعريف الارتباط لمعلومات الدخول تبقى ليومين، بينما تبقى ملفات تعريف ارتباط خيارات شاشة العرض لمدة سنة. سيستمر تسجيل دخولك طيلة أسبوعين عندما تختار \\&rdquo;تذكرني\\&rdquo;، وإذا قمت بتسجيل خروجك من الحساب، سيتم حذف ملفات تعريف ارتباط تسجيل الدخول.</p>\r\n\r\n<p>سيُحفظ ملف إضافي لتعريف الارتباط في مستعرضك إذا قمت بتحرير أو نشر مقال. وهذا الملف لايتضمن أي بيانات شخصية فكل ما في الأمر أنه يشير إلى معرّف المقالة التي حررتها. وستنتهي صلاحيته بعد يوم واحد.</p>\r\n\r\n<h3>المحتوى المضمّن من مواقع ويب أخرى</h3>\r\n\r\n<p>المقالات على هذا الموقع قد تشمل محتوى مضمّناً (على سبيل المثال: كمقاطع الفيديو، الصور، المقالات .. الخ). يتصرّف المحتوى المضمَّن من مواقع ويب أخرى بالطريقة نفسها تماماً كما لو أن الزائر زار الموقع الآخر.</p>\r\n\r\n<p>قد تجمع مواقع الويب هذه بيانات عنك، وتستخدم ملفات تعريف الارتباط، وتقوم بضمين تتبعًا إضافيًا &ndash; تابعًا لجهة ثالثة خارجية، وتراقب تفاعلك مع هذا المحتوى المضمّن، بما في ذلك تتبع تفاعلك مع المحتوى المضمن إذا كان لديك حساب وتم تسجيل دخولك إلى ذلك الموقع.</p>\r\n\r\n<h3>التحليلات</h3>\r\n\r\n<h2>مع من نشارك بياناتك</h2>\r\n\r\n<h2>ماهي مدة احتفاظنا ببياناتك</h2>\r\n\r\n<p>إذا تركت تعليقاً، فسيتم الاحتفاظ بالتعليق والبيانات الوصفية الخاصة به إلى أجل غير مسمى. وهذا حتى يمكننا التعرّف على أي تعليقات متتابعة والموافقة عليها تلقائياً بدلاً من الاحتفاظ بها في قائمة انتظار المراجعة للموافقة عليها.</p>\r\n\r\n<p>بالنسبة للمستخدمين الذين قاموا بالتسجيل على موقعنا (إن وجد)، نقوم أيضًا بتخزين المعلومات الشخصية التي يقدمونها في ملف تعريف المستخدم الخاص بهم. يمكن لجميع المستخدمين الاطلاع على معلوماتهم الشخصية أو تعديلها أو حذفها في أي وقت (باستثناء أنه لا يمكنهم تغيير اسم المستخدم الخاص بهم). يمكن لمسؤولي مواقع الويب أيضًا رؤية هذه المعلومات وتحريرها.</p>\r\n\r\n<h2>ماهي الحقوق العائدة لك على بياناتك</h2>\r\n\r\n<p>إذا كان لديك حساب على هذا الموقع، أو تركت تعليقات، يمكنك طلب الحصول على ملف يتم تصديره من البيانات الشخصية التي نحتفظ بها عنك، بما في ذلك أي بيانات قدمتها لنا. يمكنك أيضًا طلب حذف أي بيانات شخصية نحتفظ بها عنك. هذا لا يشمل أي بيانات نحن ملزمون بالحفاظ عليها لأغراض إدارية أو قانونية أو أمنية.</p>\r\n\r\n<h2>إلى أين نرسل بياناتك</h2>\r\n\r\n<p>يمكن التحقق من تعليقات الزوار من خلال خدمة الكشف عن الرسائل غير المرغوب فيها تلقائيًا.</p>\r\n\r\n<h2>&nbsp;</h2>', '<p>Privcy</p>', 1, NULL, NULL, NULL, '2021-07-13 21:02:33'),
(6, 'fb', 'الفيس بوك', 'Facebook', 'https://www.snapchat.com/add/ajmal.alhawatif', 'fa fa-facebook', 3, '1622148046سوشيل ميديا-04.png', NULL, NULL, '2021-07-04 11:23:30'),
(7, 'tw', 'تويتر', 'Twitter', 'https://twitter.com/ajmal_alhawatif?s=21', 'fa fa-facebook', 3, '1622147919سوشيل ميديا-02.png', NULL, NULL, '2021-07-04 11:23:30'),
(8, 'googleplus', 'جوجل بلس', 'Google Plus', '', 'https://plus.google.com/', 3, '16230237461622147919سوشيل ميديا-02.png', NULL, NULL, '2021-07-04 11:23:30'),
(9, 'rss', 'rss', 'Rss', '', 'https://www.facebook.com/', 3, '16230239351622147920سوشيل ميديا-05.png', NULL, NULL, '2021-07-04 11:23:30'),
(10, 'pintrest', 'بينترست', 'Pintrest', '', 'https://www.pinterest.com/', 3, '16230238591622147920سوشيل ميديا-03.png', NULL, NULL, '2021-07-04 11:23:30'),
(11, 'linkedin', 'لينكد ان', 'Linkedin', '', 'https://www.linkedin.com/', 3, '16230238151622147920سوشيل ميديا-06.png', NULL, NULL, '2021-07-04 11:23:30'),
(12, 'youtube', 'يوتيوب', 'Youtube', 'https://www.youtube.com/channel/UCQZ21WNrdF3J1Lkid25IF5Q', 'https://www.youtube.com/', 3, '1622147920سوشيل ميديا-06.png', NULL, NULL, '2021-07-04 11:23:30'),
(13, 'hotline', 'الرقم الموحد', 'Unified number', '‭920033762‬ , رقم المنطقة الوسطى : 0582442776 ,  رقم المنطقة الشرقية :  0599825476,  رقم المنطقة الغربية : 0580370756 , رقم المنطقة الشمالية : 0594710913 , رقم المنطقة الجنوبية : 0594710346', '19919', 4, '', NULL, NULL, '2021-10-31 18:07:50'),
(14, 'email', 'البريد الالكترونى', 'E-mail', '0', '0', 4, '', NULL, NULL, '2021-10-31 18:07:50'),
(16, 'lng', 'lat', 'lng', '39.65719869678723', '30.10021', 5, '', NULL, NULL, '2021-01-19 02:00:52'),
(19, 'lat', 'lat', 'lng', '24.453340106390208', '30.10021', 5, '', NULL, NULL, '2021-01-19 02:00:52'),
(20, 'seo_script', 'Seo Header', 'Seo Footer', '', '', 6, '', NULL, NULL, '2019-12-04 10:40:39'),
(22, 'site_name', 'اسم الموقع', 'Site Name', 'AJMAL ALHAWATIF', 'Wagdy store', 4, '', NULL, NULL, '2021-10-31 18:07:50'),
(23, 'timezone', 'Timezone', 'Timezone', 'Asia/Riyadh', '', 4, '', NULL, NULL, '2021-10-31 18:07:50'),
(24, 'driver', 'Driver', 'Driver', 'smtp', 'stmp', 7, '', NULL, NULL, '2021-05-26 16:02:21'),
(25, 'host', 'Host', 'Host', 'pioneers-solutions.com', 'Host', 7, '', NULL, NULL, '2021-05-26 16:02:21'),
(26, 'port', 'port', 'port', '587', 'port', 7, '', NULL, NULL, '2021-05-26 16:02:21'),
(27, 'from_email', 'from_email', 'from_email', 'sender@pioneers-solutions.com', 'from_email', 7, '', NULL, NULL, '2021-05-26 16:02:21'),
(28, 'encryption', 'encryption', 'encryption', '', 'encryption', 7, '', NULL, NULL, '2021-05-26 16:02:21'),
(29, 'username', 'username', 'username', 'sender@pioneers-solutions.com', 'username', 7, '', NULL, NULL, '2021-05-26 16:02:21'),
(30, 'password', 'password', 'password', 'lTHI%@L9', 'password', 7, '', NULL, NULL, '2021-05-26 16:02:21'),
(31, 'logo', 'شعار الموقع', 'website logo', 'logo', 'logo', 4, '1622134858white-01-01.png', NULL, NULL, '2021-05-27 18:00:59'),
(32, 'whatsapp', 'واتس اب', 'WhatsApp', 'https://api.whatsapp.com/send?phone=+966590099820', '+201040563015', 3, '1622147920سوشيل ميديا-05.png', NULL, '2020-11-04 09:04:02', '2021-07-04 11:23:30'),
(33, 'instagram', 'انستجرام', 'Instagram', 'https://instagram.com/ajmal.alhawatif?igshid=1aefsrpobw7rw', 'https://www.instagram.com/', 3, '1622147920سوشيل ميديا-03.png', NULL, '2020-11-04 09:01:57', '2021-07-04 11:23:30'),
(34, 'cancel_order', 'الغاء الطلب', 'Cancel Order', '1', '1', 4, '', NULL, '2020-11-24 09:47:44', '2021-10-31 18:07:50'),
(35, 'gift_price', 'سعر طلب الهدية', 'order Gift Price', '0', '0', 4, '', '{\"user_active\":\"0\",\"merchant_active\":\"0\"}', '2020-11-12 07:44:22', '2021-06-30 20:21:53'),
(36, 'favicon', 'ايقونة الموقع', 'website Favicon', 'favicon', 'favicon', 4, '1626208128non text black-01.png', NULL, NULL, '2021-07-13 23:28:48'),
(37, 'sms_driver', 'مزود الخدمة', 'Driver', 'MSEGAT', 'Driver', 8, NULL, NULL, '2021-02-09 15:58:37', '2021-02-17 08:58:17'),
(38, 'sms_username', 'username', 'username', 'ajmal alhawatif', 'username', 8, '', NULL, '2021-02-09 15:58:37', '2021-02-17 08:58:17'),
(39, 'sms_password', 'password', 'password', 'password', 'password', 8, '', NULL, '2021-02-09 15:58:37', '2021-02-17 08:58:17'),
(40, 'sms_api_key', 'API KEY', 'API KEY', '1e4e05390c2f726b6592377ffacf4ce6', 'API KEY', 8, NULL, NULL, '2021-02-09 15:58:37', '2021-02-17 08:58:17'),
(41, 'sms_sender_name', 'senderName', 'senderName', 'Ajmal Tec', 'senderName', 8, '', NULL, '2021-02-09 15:58:37', '2021-02-17 08:58:17'),
(42, 'sms_sender_phone', 'senderPhone', 'senderPhone', '', '', 8, '', NULL, '2021-02-09 15:58:37', '2021-02-17 08:58:17'),
(44, 'logo_footer', 'لوجو الفوتر', 'logo footer', 'logo_footer', 'logo_footer', 4, '1626208321white-01-01.png', NULL, NULL, '2021-10-31 18:07:50'),
(45, 'forward_account', 'حساب آجل', 'Forward account', '0', '1', 4, '', NULL, '2020-11-24 09:47:44', '2021-03-30 20:06:34'),
(53, 'faceshare', 'الفيس بوك', 'facebook', '', 'facebook', 10, '16213356611621325403facebook.png', '{\"class\":\"a2a_button_facebook\"}', NULL, '2021-10-26 16:10:40'),
(54, 'twittshare', 'تويتر', 'twitter', 'تويتر', 'twitter', 10, '16213356631621325953twitter.png', '{\"class\":\"a2a_button_twitter\"}', NULL, '2021-10-26 16:10:41'),
(55, 'whatsshare', 'الواتس', 'whatsapp', 'واتس اب', 'whatsapp', 10, '1635261041واتس.png', '{\"class\":\"a2a_button_whatsapp\"}', NULL, '2021-10-26 16:10:42'),
(56, 'telegramshare', 'تيليجرام', 'telegram', 'تيليجرام', 'telegram', 10, '16213356641621325953telegram.png', '{\"class\":\"a2a_button_telegram\"}', NULL, '2021-10-26 16:10:42'),
(57, 'emailshare', 'البريد', 'email', 'البريد', 'email', 10, '16213356651621325953mail.png', '{\"class\":\"a2a_button_email\"}', NULL, '2021-10-26 16:10:42'),
(58, 'smsshare', 'الرسالة النصية', 'sms', 'رسالة نصية', 'sms', 10, '16213356651621325953speech-bubble.png', '{\"class\":\"a2a_button_sms\"}', NULL, '2021-10-26 16:10:43'),
(59, 'copyshare', 'نسخ الرابط', 'copy link', 'نسخ الرابط', 'copy link', 10, '16213356661621325953copy.png', '{\"class\":\"a2a_button_copy_link\"}', NULL, '2021-10-26 16:10:43'),
(60, 'categories_slider', 'سلايدر الأقسام', 'Categories Slider', '0', '1', 4, '', NULL, '2020-11-24 09:47:44', '2021-10-31 18:07:50'),
(61, 'commercial_register', 'السجل التجارى', 'Commercial Register', '4650215209', '1', 4, '', NULL, '2020-11-24 09:47:44', '2021-10-31 18:07:50'),
(62, 'tax_number', 'الرقم الضريبى', 'Tax Number', '310379519400003', '1', 4, '', NULL, '2020-11-24 09:47:44', '2021-10-31 18:07:50'),
(63, 'insurance', 'سياسة الضمان', 'Insurance Policy', '<h1><img alt=\"\" src=\"https://e.top4top.io/p_2007qn2s31.jpg\" style=\"height:779px; width:400px\" /></h1>\r\n\r\n<h1><span style=\"color:#ff0033\"><span style=\"font-size:26px\"><strong>سياسة الضمان :</strong></span></span></h1>\r\n\r\n<p>- يعد الضمان معتمد لمنتج <strong><span style=\"color:#ff0033\">PRO</span>TECTION</strong>&nbsp; وهو ساري لمدة سنة على كسر الشاشة الامامية من دون الاطراف (الشاشة المضيئة) .</p>\r\n\r\n<p>-&nbsp; ضمان الكسر للشاشة الامامية فقط و لا يشمل الشاشة الخلفية .</p>\r\n\r\n<p>-&nbsp; تتحمل شركة اجمل الهواتف بصفتها الوكيل الرسمي في الشرق الاوسط مبلغ وقدره (<strong>500 ريال سعودي</strong>) او مايعادلها بالعملات الاخرى كحد اقصى عند كسر الشاشة (دون سوء استخدام)&nbsp;</p>\r\n\r\n<p>- يتم الاستفادة من التعويض المادي في مدة اقصاها 15 يوم عمل من تاريخ ابلاغ نقطة البيع ولا يحق لك المطالبة قبل انقضاء هذه المدة .</p>\r\n\r\n<p>-&nbsp; يتم الاستفادة من خدمة الضمان (التعويض لدى نقطة البيع التي يتم التركيب من خلالها ).</p>\r\n\r\n<p>-&nbsp; يلزم احضار <strong>QR CODE</strong> او صورة له مع فاتورة الشراء واحضار المنتج للإستفادة من خدمة الضمان .</p>\r\n\r\n<p>-&nbsp; كسر الشاشة الامامية للحدود الموضحة بالصورة فقط سواءً كان (ايباد - تابلت - جوال - ساعة ) الشاشة المضيئة فقط .</p>\r\n\r\n<p>- الضمان لا يشمل كسر الشاشة الداخلية .</p>\r\n\r\n<p>-&nbsp; عدم تسجيل الرقم التسلسلي او <strong>QR CODE</strong> او اسم المتجر الذي تم شراء المنتج منه تلغي وثيقة الضمان .</p>\r\n\r\n<p><span style=\"color:#ff0033\"><span style=\"font-size:26px\"><strong>ارشادات هامة :&nbsp;</strong></span></span></p>\r\n\r\n<p>- عدم التعرض لأشعة الشمس المباشرة او درجة حرارة مرتفعة (مثل وضعه داخل السيارة في فصل الصيف)</p>\r\n\r\n<p>&nbsp;- عدم تعريض المنتج لمواد (مثل العطور والكريمات والزيوت ..إلخ )&nbsp;</p>\r\n\r\n<p>-&nbsp; عدم العبث بأطراف المنتج وزواياه ،&nbsp; في حال الرغبه بتركيب غطاء خلفي يجب اختيار غطاء مرن .</p>', '<p>Insurance</p>', 1, '162507817160dcb99b749d1162446663160d364c79da6430379434-8198-480B-AC20-43E6197543A3-01.jpeg.jpeg', NULL, '2021-06-20 13:35:30', '2021-06-30 21:56:44'),
(91, 'insurance_years', 'عدد سنين الضمان', 'Insurance Years', '1', '2', 4, '', NULL, '2020-11-24 09:47:44', '2021-10-31 18:07:50'),
(133, 'user_name', 'اسم المستخدم', 'User Name', '1', '1', 11, 'text', '{\"sort\":\"1\",\"group\":\"2\",\"type\":\"text\"}', '2021-06-21 08:09:05', '2021-11-10 09:19:29'),
(134, 'phone', 'الهاتف', 'Phone', '1', '1', 11, 'number', '{\"sort\":\"1\",\"group\":\"2\",\"type\":\"number\"}', '2021-06-21 08:09:05', '2021-11-10 09:19:29'),
(135, 'email', 'البريد الالكترونى', 'E-Mail', '0', '0', 11, 'email', '{\"sort\":\"1\",\"group\":\"1\",\"type\":\"email\"}', '2021-06-21 08:09:05', '2021-11-10 09:19:29'),
(136, 'usage_date', 'تاريخ التركيب', 'Install Date', '0', '0', 11, 'date', '{\"sort\":\"1\",\"group\":\"2\",\"type\":\"date\"}', '2021-06-21 08:09:05', '2021-11-10 09:19:29'),
(137, 'dummy_text_1', 'نص اضافى 1', 'Dummy Text 1', '1', '1', 11, 'text', '{\"sort\":\"1\",\"group\":\"2\",\"type\":\"text\"}', '2021-06-21 08:09:05', '2021-11-10 09:19:29'),
(138, 'front_image', 'صورة الجهاز من الامام', 'Device Front Image', '1', '1', 11, 'file', '{\"sort\":\"3\",\"group\":\"4\",\"type\":\"file\"}', '2021-06-21 08:09:05', '2021-11-10 09:19:29'),
(139, 'back_image', 'صورة الجهاز من الخلف', 'Device Back Image', '0', '0', 11, 'file', '{\"sort\":\"3\",\"group\":\"4\",\"type\":\"file\"}', '2021-06-21 08:09:05', '2021-11-10 09:19:29'),
(140, 'warranty_image', 'صورة كارت الضمان', 'Card Image', '1', '1', 11, 'file', '{\"sort\":\"3\",\"group\":\"4\",\"type\":\"file\"}', '2021-06-21 08:09:05', '2021-11-10 09:19:29'),
(141, 'dummy_text_2', 'نص اضافى 2', 'Dummy Text 2', '0', '0', 11, 'text', '{\"sort\":\"1\",\"group\":\"2\",\"type\":\"text\"}', '2021-06-21 08:09:05', '2021-11-10 09:19:29'),
(142, 'dummy_text_3', 'نص اضافى 3', 'Dummy Text 3', '0', '0', 11, 'text', '{\"sort\":\"5\",\"group\":\"2\",\"type\":\"text\"}', '2021-06-21 08:09:05', '2021-11-10 09:19:29'),
(143, 'user_notes', 'الملاحظات', 'Notes', '0', '0', 11, 'textarea', '{\"sort\":\"1\",\"group\":\"3\",\"type\":\"textarea\"}', '2021-09-20 12:05:15', '2021-11-10 09:19:29'),
(144, 'front_image', 'صورة الجهاز من الامام', 'Device Front Image', '1', '1', 9, 'sms,card', '{\"sort\":\"1\",\"group\":\"4\",\"type\":\"file\"}', '2021-09-20 12:05:27', '2021-11-10 09:18:01'),
(145, 'back_image', 'صورة الجهاز من الخلف', 'Device Back Image', '1', '1', 9, 'sms,card', '{\"sort\":\"2\",\"group\":\"4\",\"type\":\"file\"}', '2021-09-20 12:05:24', '2021-11-10 09:18:01'),
(146, 'warranty_image', 'صورة بطاقة الضمان', 'Warranty Card Image', '1', '1', 9, 'sms,card', '{\"sort\":\"3\",\"group\":\"4\",\"type\":\"file\"}', '2021-09-20 12:05:21', '2021-11-10 09:18:01'),
(147, 'user_notes', 'الملاحظات', 'Notes', '0', '0', 9, 'sms,card', '{\"sort\":\"1\",\"group\":\"3\",\"type\":\"textarea\"}', '2021-09-20 12:05:15', '2021-11-10 09:18:01'),
(148, 'usage_date', 'تاريخ التركيب', 'Usage Date', '0', '0', 9, 'sms,card', '{\"sort\":\"2\",\"group\":\"2\",\"type\":\"date\"}', '2021-09-20 12:05:12', '2021-11-10 09:18:01'),
(149, 'dummy_text_1', 'نص اضافى 1', 'Dummy Text 1', '1', '1', 9, 'sms,card', '{\"sort\":\"3\",\"group\":\"2\",\"type\":\"text\"}', '2021-09-20 11:25:23', '2021-11-10 09:18:01'),
(150, 'dummy_text_2', 'نص اضافى 2', 'Dummy Text 2', '0', '0', 9, 'sms,card', '{\"sort\":\"4\",\"group\":\"2\",\"type\":\"text\"}', '2021-09-20 11:25:23', '2021-11-10 09:18:01'),
(151, 'dummy_text_3', 'نص اضافى 3', 'Dummy Text 3', '0', '0', 9, 'sms,card', '{\"sort\":\"5\",\"group\":\"2\",\"type\":\"text\"}', '2021-09-20 11:25:23', '2021-11-10 09:18:01'),
(152, 'front_image', 'صورة الجهاز من الامام', 'Device Front Image', '1', '1', 12, 'sms,card', '{\"sort\":\"1\",\"group\":\"4\",\"type\":\"file\"}', '2021-09-20 12:05:27', '2021-10-26 13:55:41'),
(153, 'back_image', 'صورة الجهاز من الخلف', 'Device Back Image', '0', '0', 12, 'sms,card', '{\"sort\":\"2\",\"group\":\"4\",\"type\":\"file\"}', '2021-09-20 12:05:24', '2021-10-26 13:55:41'),
(154, 'warranty_image', 'صورة بطاقة الضمان', 'Warranty Card Image', '0', '0', 12, 'sms,card', '{\"sort\":\"3\",\"group\":\"4\",\"type\":\"file\"}', '2021-09-20 12:05:21', '2021-10-26 13:55:42'),
(155, 'user_notes', 'الملاحظات', 'Notes', '0', '0', 12, 'sms,card', '{\"sort\":\"1\",\"group\":\"3\",\"type\":\"textarea\"}', '2021-09-20 12:05:15', '2021-10-26 13:55:42'),
(156, 'usage_date', 'تاريخ التركيب', 'Usage Date', '0', '0', 12, 'sms,card', '{\"sort\":\"2\",\"group\":\"2\",\"type\":\"date\"}', '2021-09-20 12:05:12', '2021-10-26 13:55:42'),
(157, 'user_name', 'اسم العميل الثلاثى', 'User Name', '1', '1', 12, 'sms', '{\"sort\":\"3\",\"group\":\"1\",\"type\":\"text\"}', '2021-09-20 11:25:23', '2021-10-26 13:55:42'),
(158, 'phone', 'الهاتف', 'Phnoe', '1', '1', 12, 'sms', '{\"sort\":\"4\",\"group\":\"1\",\"type\":\"number\"}', '2021-09-20 11:25:23', '2021-10-26 13:55:42'),
(159, 'dummy_text_1', 'نص اضافى 1', 'Dummy Text 1', '0', '0', 12, 'sms,card', '{\"sort\":\"3\",\"group\":\"2\",\"type\":\"text\"}', '2021-09-20 11:25:23', '2021-10-26 13:55:42'),
(160, 'dummy_text_2', 'نص اضافى 2', 'Dummy Text 2', '0', '0', 12, 'sms,card', '{\"sort\":\"4\",\"group\":\"2\",\"type\":\"text\"}', '2021-09-20 11:25:23', '2021-10-26 13:55:42'),
(161, 'dummy_text_3', 'نص اضافى 3', 'Dummy Text 3', '0', '0', 12, 'sms,card', '{\"sort\":\"5\",\"group\":\"2\",\"type\":\"text\"}', '2021-09-20 11:25:23', '2021-10-26 13:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `config_categories`
--

CREATE TABLE `config_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `config_categories`
--

INSERT INTO `config_categories` (`id`, `title_ar`, `title_en`, `key`, `created_at`, `updated_at`, `icon`) VALUES
(1, 'السياسات', 'Policey', 'policey', NULL, NULL, 'flaticon-notes-4'),
(2, 'عنا', 'About Us', 'about', NULL, NULL, 'flaticon-ruler-and-pencil'),
(3, 'السوشيال ميديا', 'social', 'social', NULL, NULL, 'flaticon-share-line'),
(4, 'بيانات الموقع', 'site_data', 'site_data', NULL, NULL, 'flaticon-settings-2'),
(5, 'الخريطة', 'Google Map', 'google_map', NULL, NULL, 'flaticon-location-1'),
(6, 'Seo', 'Seo', 'seo', NULL, NULL, 'flaticon-ruler-and-pencil'),
(7, 'اعدادت البريد الالكرترونى', 'Mail Settings', 'mail', NULL, NULL, 'flaticon-ruler-and-pencil'),
(8, 'اعدادت الرسائل', 'SMS Settings', 'sms', NULL, NULL, 'flaticon-mail-edit'),
(9, 'اعدادت الضمان', 'Warranty Settings', 'warranty', '2021-04-11 08:15:28', '2021-04-11 08:15:28', 'flaticon-wallet'),
(10, 'مشاركة السوشيال ميديا', 'socialShare', 'socialShare', NULL, NULL, 'flaticon-share-line'),
(11, 'تسجيل الضمان', 'Insurance', 'insurance', NULL, NULL, 'flaticon-share-line'),
(12, 'اعدادت الضمان باستخدام رسالة نصية', 'SMS Warranty Settings', 'sms_warranty', '2021-04-11 08:15:28', '2021-04-11 08:15:28', 'flaticon-wallet');

-- --------------------------------------------------------

--
-- Table structure for table `contactuses`
--

CREATE TABLE `contactuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seen_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_en`, `name_ar`, `phone_code`, `code`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Saudi', 'السعودية', '0255', '1', NULL, NULL, '2021-07-10 16:00:41'),
(2, 'Emirates', 'الامارات', NULL, '2', NULL, '2021-07-10 07:38:31', '2021-07-10 07:40:20'),
(3, 'Kuwait', 'الكويت', NULL, '3', NULL, '2021-07-10 07:39:28', '2021-07-10 07:39:28'),
(4, 'Bahrain', 'البحرين', NULL, '4', NULL, '2021-07-10 07:40:04', '2021-07-10 07:40:04'),
(5, 'Oman', 'عمان', NULL, '5', NULL, '2021-07-10 07:40:39', '2021-07-10 07:40:39'),
(6, 'Qatar', 'قطر', NULL, '6', NULL, '2021-07-10 07:41:01', '2021-07-10 07:41:01'),
(7, 'Egypt', 'مصر', NULL, '7', NULL, '2021-07-10 07:41:18', '2021-07-10 07:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_deafult` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name_ar`, `name_en`, `code`, `symbol`, `value`, `status`, `is_deafult`, `created_at`, `updated_at`) VALUES
(4, 'ر.س 🇸🇦', 'SR 🇸🇦', 'SAR', 'SR', 1, 1, 1, '2020-06-15 20:28:08', '2021-06-30 20:25:34'),
(5, 'دولار 🇺🇸', '🇺🇸 dollar', 'USD', '$', 0.267, 1, 0, '2020-06-15 20:29:00', '2021-07-01 05:32:55'),
(6, 'درهم 🇦🇪', 'AED 🇦🇪', 'AED', 'AED', 0.98, 1, 0, '2020-06-15 20:29:47', '2021-07-01 05:33:51'),
(7, 'دينار 🇰🇼', '🇰🇼Dinar', 'KWD', 'KWD', 0.082, 1, 0, '2020-06-15 20:35:19', '2021-07-01 05:34:58'),
(8, 'دينار 🇧🇭', '🇧🇭 dinar', 'BHD', 'BHD', 0.1, 1, 0, '2020-06-15 20:37:57', '2021-07-01 05:35:12'),
(9, 'ريال 🇴🇲', 'ريال 🇴🇲', 'ريال عماني', 'ريال عماني', 0.1, 1, 0, '2020-06-15 20:41:02', '2021-07-01 05:37:20'),
(10, 'جنيه 🇪🇬', '🇪🇬 Pound', 'EGP', 'جنيه مصري', 4.31, 1, 0, '2020-06-15 20:42:25', '2021-07-01 05:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `deliverytimes`
--

CREATE TABLE `deliverytimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deliverytime_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliverytime_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `for_user` tinyint(1) NOT NULL DEFAULT '1',
  `for_merchant` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliverytimes`
--

INSERT INTO `deliverytimes` (`id`, `deliverytime_ar`, `deliverytime_en`, `sort_order`, `for_user`, `for_merchant`, `created_at`, `updated_at`) VALUES
(17, 'مساءً من 8-10 م', 'Evening from 8-10 pm', 1, 0, 0, '2021-01-04 19:54:15', '2021-06-17 06:37:45'),
(18, 'مساءً من 5-8 م', 'Evening from 5-8 pm', 2, 0, 0, '2021-01-04 19:54:30', '2021-06-17 06:37:34'),
(19, 'مساءً من 2-5 م', 'Evening from 2-5 pm', 3, 0, 0, '2021-01-04 19:54:57', '2021-06-17 06:37:24'),
(20, 'صباحاً من 10-12 م', 'In the morning from 10-12 pm', 4, 0, 0, '2021-01-04 19:55:13', '2021-06-17 06:37:14'),
(21, 'صباحاً من 8-10 ص', 'In the morning from 8-10 am', 5, 0, 0, '2021-01-04 19:55:29', '2021-06-17 06:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `governments`
--

CREATE TABLE `governments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governments`
--

INSERT INTO `governments` (`id`, `name_en`, `name_ar`, `country_id`, `created_at`, `updated_at`) VALUES
(11, 'Central Region', 'المنطقة الوسطى', 1, '2020-06-15 13:05:22', '2020-09-12 03:11:40'),
(12, 'The northern area', 'المنطقة الشمالية', 1, '2020-06-15 13:05:43', '2020-09-12 03:10:47'),
(13, 'Western Region', 'المنطقة الغربية', 1, '2020-09-07 05:40:03', '2020-09-12 03:09:53'),
(14, 'Eastern Region', 'المنطقة الشرقية', 1, '2020-09-09 23:21:28', '2020-09-12 03:10:22'),
(15, 'Southern area', 'المنطقة الجنوبية', 1, '2020-09-12 03:11:16', '2020-09-12 03:11:16'),
(16, 'Emirates', 'الامارات', 2, '2021-07-10 16:01:16', '2021-07-10 16:01:16'),
(17, 'Kuwait', 'الكويت', 3, '2021-07-10 22:10:58', '2021-07-10 22:10:58'),
(18, 'Bahrain', 'البحرين', 4, '2021-07-10 22:11:26', '2021-07-10 22:11:26'),
(19, 'Oman', 'عمان', 5, '2021-07-10 22:11:37', '2021-07-10 22:11:37'),
(20, 'Qatar', 'قطر', 6, '2021-07-10 22:11:49', '2021-07-10 22:11:49'),
(21, 'Egypt', 'مصر', 7, '2021-07-10 22:12:02', '2021-07-10 22:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE `insurances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code_id` int(10) UNSIGNED DEFAULT NULL,
  `dummy_text_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dummy_text_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dummy_text_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usage_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=>pending,1=>activated,2=>rejected',
  `replied_at` datetime DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_notes` text COLLATE utf8mb4_unicode_ci,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `store_reason` text COLLATE utf8mb4_unicode_ci,
  `seen_at` datetime DEFAULT NULL,
  `front_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `back_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurances`
--

INSERT INTO `insurances` (`id`, `user_name`, `phone`, `phone_code_id`, `dummy_text_1`, `dummy_text_2`, `dummy_text_3`, `email`, `usage_date`, `status`, `replied_at`, `expire_date`, `admin_id`, `created_at`, `updated_at`, `user_notes`, `reason`, `store_reason`, `seen_at`, `front_image`, `back_image`, `warranty_image`, `user_id`) VALUES
(42, 'علي حسن الشمراني', '596656679', 157, NULL, NULL, NULL, NULL, '2021-10-06 17:50:09', 0, NULL, NULL, 1, '2021-10-06 16:50:09', '2021-10-12 14:52:43', NULL, NULL, 'test', '2021-10-06 18:50:42', '1633535409615dc5b15b781image.jpg', NULL, NULL, 242),
(43, 'سعد حسن الشمراني', '590099819', 157, NULL, NULL, NULL, NULL, '2021-10-06 17:51:36', 1, '2021-10-06 18:59:12', '2022-10-06 19:02:42', 1, '2021-10-06 16:51:36', '2021-10-06 17:02:42', NULL, 'لم يتم تركيب حماية', 'الصوره غير واضحه', '2021-10-06 18:51:40', '1633535496615dc6089de3eimage.jpg', NULL, NULL, 242),
(44, 'test test test', '1020754449', 157, NULL, NULL, NULL, NULL, '2021-10-10 16:49:32', 0, NULL, NULL, NULL, '2021-10-10 15:49:32', '2021-10-10 15:50:17', NULL, NULL, NULL, '2021-10-10 17:50:17', NULL, '16338773726162fd7c0a51abg-2.jpg', NULL, 242),
(45, 'علي حسن الشمراني', '596656679', 157, NULL, NULL, NULL, NULL, '2021-10-10 17:08:18', 1, '2021-10-10 18:13:32', '2022-10-10 18:13:32', 1, '2021-10-10 16:08:18', '2021-10-10 16:13:32', NULL, 'التاريخ خطأ', 'الصور غير', '2021-10-10 18:10:24', '1633878498616301e2b0e40image.jpg', NULL, '16338786196163025b2208cimage.jpg', 242),
(46, 'حسن علي الشمراني', '596656679', 157, NULL, NULL, NULL, NULL, '2021-10-11 01:01:54', 1, '2021-10-11 02:03:54', '2022-10-11 02:03:54', 1, '2021-10-11 00:01:54', '2021-10-11 00:03:54', NULL, NULL, NULL, '2021-10-11 02:03:25', '1633906914616370e292aecimage.jpg', NULL, '1633906914616370e2938b4AF847DAC-08EE-4084-80EB-85D0ADF79C03.jpeg', 242),
(47, 'علي حسن احمد', '596656679', 157, NULL, NULL, NULL, NULL, '2021-10-11 15:51:34', 1, '2021-10-11 16:52:16', '2022-10-11 16:52:16', 1, '2021-10-11 14:51:34', '2021-10-11 14:52:16', NULL, NULL, NULL, '2021-10-11 16:51:38', '1633960294616441666c531image.jpg', NULL, '1633960294616441666cd7dimage.jpg', 242),
(48, 'علي حسن خالد', '596656679', 157, NULL, NULL, NULL, NULL, '2021-10-12 14:59:41', 1, '2021-10-12 16:01:52', '2022-10-12 16:01:52', 1, '2021-10-12 13:59:41', '2021-10-12 14:01:52', NULL, NULL, 'غير واضح', '2021-10-12 15:59:48', '1634043581616586bd9061bimage.jpg', NULL, NULL, 242),
(49, 'بدر عبدالله الفيفي', '541363016', 157, NULL, NULL, NULL, NULL, '2021-10-12 17:07:57', 1, '2021-10-12 18:08:23', '2022-10-12 18:08:23', 1, '2021-10-12 16:07:57', '2021-10-12 16:08:23', NULL, NULL, NULL, '2021-10-12 18:08:16', '16340512776165a4cd4538001-01.png', NULL, NULL, 242),
(50, 'اريج حسنن الشمراني', '560353340', 157, NULL, NULL, NULL, NULL, '2021-10-12 23:41:11', 1, '2021-10-13 01:09:45', '2022-10-13 01:09:45', 1, '2021-10-12 22:41:11', '2021-10-12 23:09:45', NULL, NULL, 'سسسسسسسسسسسسسسسسس', '2021-10-13 00:44:32', '1634074871616600f7d6dd000027a89-f86c-4a2b-959b-0b79b8799de2.jpg', NULL, '1634074871616600f7d804800027a89-f86c-4a2b-959b-0b79b8799de2.jpg', 242),
(51, 'Ali hassan alshamrani', '596656679', 157, NULL, NULL, NULL, NULL, '2021-10-24 11:08:21', 1, '2021-10-24 12:09:58', '2022-10-24 12:09:58', 1, '2021-10-24 10:08:21', '2021-10-24 10:09:58', NULL, NULL, NULL, '2021-10-24 12:09:41', '163506650161752285a346aimage.jpg', NULL, '163506650161752285a3a7bimage.jpg', 242),
(52, 'fhfg fg fg fg', '105090801', 57, NULL, NULL, NULL, 'user12@gmail.com', '2021-10-26 11:42:07', 1, '2021-10-26 12:43:04', '2022-10-26 12:43:04', 1, '2021-10-26 10:42:07', '2021-10-26 10:43:04', NULL, NULL, NULL, '2021-10-26 12:42:14', '16352413276177cd6f06e0f1.jpg', NULL, NULL, 242),
(53, 'احمد محمد احمد', '105090801', 157, '12', '34', '54', 'user12@gmail', '2021-10-25 00:00:00', 1, '2021-10-26 13:09:05', '2022-10-26 13:09:05', 1, '2021-10-26 11:04:16', '2021-10-26 11:09:05', '1234', NULL, NULL, '2021-10-26 13:05:47', NULL, NULL, NULL, 242),
(54, 'Ali Hassan ali', '596656679', 157, NULL, NULL, NULL, NULL, '2021-10-26 12:24:57', 1, '2021-10-26 13:26:14', '2022-10-26 13:26:14', 1, '2021-10-26 11:24:57', '2021-10-26 11:26:14', NULL, NULL, NULL, '2021-10-26 13:25:48', '16352438976177d779ed93b3AE2E68F-ECA5-4733-B30A-7C875E865AA1.jpeg', NULL, '16352438976177d779ee043973D8AF3-371D-4F49-8BEA-A1947A6D124C.jpeg', 242),
(55, 'Ahmed Ali Ahmed', '105090801', 157, '1', '2', '3', 'user12@asddafdf', '2021-10-26 00:00:00', 2, '2021-10-26 14:02:48', NULL, 1, '2021-10-26 11:59:36', '2021-10-26 12:02:48', '1', 'مرفوض', 'صور غير واضحه', '2021-10-26 14:00:09', '16352459766177df98626716.jpg', '16352459766177df9862c6dHe44f89c10854485ba6c66c59426b7894X.jpg', '16352459766177df9862ffeqr code.jpg', 242),
(56, 'محمد سعيد محمد', '105090801', 157, '123', NULL, NULL, NULL, '2019-12-30 00:00:00', 2, '2021-10-26 14:14:55', NULL, 1, '2021-10-26 12:06:00', '2021-10-26 12:14:55', NULL, 'مر سنة على التركيب', NULL, '2021-10-26 14:14:05', NULL, NULL, '16352468166177e2e0cf8f1qr code.jpg', 242),
(57, 'حسن محمد حسن', '105090801', 157, '12', NULL, NULL, 'user12@gmail.com', '2021-10-26 00:00:00', 1, '2021-10-26 14:32:49', '2022-10-26 14:32:49', 1, '2021-10-26 12:20:55', '2021-10-26 12:32:49', '12', NULL, 'يرجى ارفاق ال QR Code', '2021-10-26 14:32:14', NULL, NULL, '16352475966177e5ecc3f45qr code.jpg', 242),
(58, 'محمد سعيد محمد', '105090801', 157, 'ؤرلا', NULL, NULL, 'user12@gmail.com', '2021-10-25 00:00:00', 1, '2021-10-26 14:54:27', '2022-10-26 14:54:27', 1, '2021-10-26 12:53:57', '2021-10-26 12:54:27', 'يبيباي', NULL, NULL, '2021-10-26 14:54:16', NULL, NULL, NULL, 242),
(59, 'محمد سعيد محمد', '105090801', 157, '54', NULL, NULL, 'user12@gmail.com', '2021-10-11 00:00:00', 0, NULL, NULL, 1, '2021-10-26 14:38:36', '2021-10-31 13:39:35', '545', NULL, 'اااااا', '2021-10-26 16:41:13', NULL, NULL, NULL, 242),
(60, 'اريج حسن الشمراني', '560353340', 157, NULL, NULL, NULL, NULL, '2021-10-26 15:41:26', 1, '2021-10-26 16:43:33', '2022-10-26 16:43:33', 1, '2021-10-26 14:41:26', '2021-10-26 14:43:33', NULL, NULL, NULL, '2021-10-26 16:41:42', '163525568661780586e8b57image.jpg', NULL, '163525568661780586e91acimage.jpg', 242),
(61, 'علي حسن الشمراني', '590099819', 157, NULL, NULL, NULL, NULL, '2021-10-27 19:44:25', 1, '2021-10-27 20:51:09', '2022-10-27 20:51:09', 1, '2021-10-27 18:44:25', '2021-10-27 18:51:09', NULL, NULL, 'الصور غير واضحة اعد رفعها', '2021-10-27 20:44:40', '163535666561798ff9d42575999D9B5-3AF5-4E6F-91A4-A29B3D8630C3.jpeg', NULL, '163535666561798ff9d47a9DA7B1C53-D011-4966-93C3-0C4BD797FA79.jpeg', 242),
(62, 'عبدالعزيز محمد علي', '546469338', 157, NULL, NULL, NULL, NULL, '2021-10-28 22:36:29', 1, '2021-10-28 23:37:31', '2022-10-28 23:37:31', 1, '2021-10-28 21:36:29', '2021-10-28 21:37:31', NULL, NULL, NULL, '2021-10-28 23:37:20', '1635453389617b09cdd6af8image.jpg', NULL, '1635453389617b09cdd73b6image.jpg', 242),
(63, 'خالد محمد القاضي', '507753771', 157, NULL, NULL, NULL, NULL, '2021-10-30 18:29:29', 1, '2021-10-30 19:31:03', '2022-10-30 19:31:03', 1, '2021-10-30 17:29:29', '2021-10-30 17:31:03', NULL, NULL, NULL, '2021-10-30 19:29:38', '1635611369617d72e9249e5image.jpg', NULL, '1635611369617d72e925067image.jpg', 242),
(65, 'خالد محمد احمد', '596656679', 157, NULL, NULL, NULL, NULL, '2021-10-31 18:55:45', 1, '2021-10-31 19:56:37', '2022-10-31 19:56:37', 1, '2021-10-31 17:55:45', '2021-10-31 17:56:37', NULL, NULL, '45777', '2021-10-31 19:55:49', '1635699345617eca9184334image.jpg', NULL, '1635699345617eca9184e08image.jpg', 242),
(66, 'علي علب هلب', '596656679', 157, NULL, NULL, NULL, NULL, '2021-10-31 19:02:40', 1, '2021-10-31 20:03:04', '2021-10-31 20:03:04', 1, '2021-10-31 18:02:40', '2021-10-31 18:03:04', NULL, NULL, NULL, '2021-10-31 20:02:56', '1635699760617ecc30c59baimage.jpg', NULL, '1635699760617ecc30c605eimage.jpg', 242),
(67, 'عزت ا ا ا', '596656679', 157, NULL, NULL, NULL, NULL, '2021-10-31 19:03:59', 1, '2021-10-31 20:04:13', '2024-10-31 20:04:13', 1, '2021-10-31 18:03:59', '2021-10-31 18:04:13', NULL, NULL, NULL, '2021-10-31 20:04:05', '1635699839617ecc7f68f6eimage.jpg', NULL, '1635699839617ecc7f695fdimage.jpg', 242),
(68, 'ع ا ل', '596656679', 157, NULL, NULL, NULL, NULL, '2021-10-31 19:05:19', 1, '2021-10-31 20:05:31', '2021-10-31 20:05:31', 1, '2021-10-31 18:05:19', '2021-10-31 18:05:31', NULL, NULL, NULL, '2021-10-31 20:05:24', '1635699919617ecccfde2d3image.jpg', NULL, '1635699919617ecccfdec1aimage.jpg', 242),
(69, 'ع ع ب', '596656679', 157, NULL, NULL, NULL, NULL, '2021-10-31 19:06:32', 1, '2021-10-31 20:06:40', '2021-10-31 20:06:40', 1, '2021-10-31 18:06:32', '2021-10-31 18:06:40', NULL, NULL, NULL, '2021-10-31 20:06:34', '1635699992617ecd1802fe2image.jpg', NULL, '1635699992617ecd18039efimage.jpg', 242),
(70, 'ه ن ب', '596656679', 157, NULL, NULL, NULL, NULL, '2021-10-31 19:07:22', 1, '2021-10-31 20:07:33', '2021-10-31 20:07:33', 1, '2021-10-31 18:07:22', '2021-10-31 18:07:33', NULL, NULL, NULL, '2021-10-31 20:07:24', '1635700042617ecd4a25adbimage.jpg', NULL, '1635700042617ecd4a26553image.jpg', 242),
(71, 'ع ع ت', '596656679', 157, NULL, NULL, NULL, NULL, '2021-10-31 19:08:38', 1, '2021-10-31 20:08:47', '2022-10-31 20:08:47', 1, '2021-10-31 18:08:38', '2021-10-31 18:08:47', NULL, NULL, NULL, '2021-10-31 20:08:40', '1635700118617ecd96ae0c9image.jpg', NULL, '1635700118617ecd96ae80bimage.jpg', 242),
(72, 'اريج حسن الشمراني', '560353340', 157, NULL, NULL, NULL, NULL, '2021-10-31 19:51:17', 1, '2021-10-31 20:53:06', '2022-10-31 20:53:06', 1, '2021-10-31 18:51:17', '2021-10-31 18:53:06', NULL, NULL, 'نمتايؤثلبنتسيلابهعسي', '2021-10-31 20:51:28', '1635702677617ed79579dc400027a89-f86c-4a2b-959b-0b79b8799de2.jpg', NULL, '1635702677617ed7957a3e600027a89-f86c-4a2b-959b-0b79b8799de2.jpg', 242),
(74, 'test test test', '1020754449', 157, NULL, NULL, NULL, NULL, '2021-11-01 10:24:57', 0, NULL, NULL, NULL, '2021-11-01 09:24:57', '2021-11-01 09:49:47', NULL, NULL, NULL, '2021-11-01 11:49:47', '1635755097617fa4591c130WhatsApp Video 2021-10-27 at 9.49.58 AM.mp4', NULL, '1635755097617fa4591c955WhatsApp Video 2021-10-26 at 3.58.38 PM.mp4', 242),
(75, 'صورة الجهاز من الامام * 65754696977__22DE22B3-D5AD-445E-8352-2A1777BD0F3E.MOV', '1020202020', 157, NULL, NULL, NULL, NULL, '2021-11-02 14:16:31', 0, NULL, NULL, NULL, '2021-11-02 13:16:31', '2021-11-02 13:48:19', NULL, NULL, NULL, '2021-11-02 15:48:19', '163585539161812c1f75deb65754696977__22DE22B3-D5AD-445E-8352-2A1777BD0F3E.MOV', NULL, '163585539161812c1f765019EE826B5-7DBE-4918-B024-2BACC0B97238.jpeg', 242),
(76, 'ع ا ا', '596656679', 157, NULL, NULL, NULL, NULL, '2021-11-02 14:47:43', 1, '2021-11-02 15:48:45', '2022-11-02 15:48:45', 1, '2021-11-02 13:47:43', '2021-11-02 13:48:45', NULL, NULL, NULL, '2021-11-02 15:48:19', '16358572636181336f619a865755003694__3378AE5D-307C-4D67-BA0D-8C92C10E5544.MOV', NULL, '16358572636181336f62101D06FE5FB-8266-431A-B2AA-A9A373FA4F19.jpeg', 242),
(77, 'علي حسن علي', '596656679', 157, NULL, NULL, NULL, NULL, '2021-11-02 22:56:42', 1, '2021-11-02 23:56:56', '2022-11-02 23:56:56', 1, '2021-11-02 21:56:42', '2021-11-02 21:56:56', NULL, NULL, NULL, '2021-11-02 23:56:48', '16358866026181a60a3b3301.jpg', NULL, '16358866026181a60a3c0db1.jpg', 242),
(81, 'خالد محمد ال محمد', '594710425', 157, 'iPhone 11', NULL, NULL, NULL, '2021-11-10 10:36:34', 1, '2021-11-10 11:37:35', '2022-11-10 11:37:35', 11, '2021-11-10 09:36:34', '2021-11-10 09:37:35', NULL, NULL, NULL, '2021-11-10 11:37:21', '1636533394618b8492662688ADB37F9-D65B-4280-B25C-511E1778D074.png', NULL, '1636533394618b849266e15406923F0-7CED-4FC4-AFCD-10A371B2EDC0.jpeg', 287);

-- --------------------------------------------------------

--
-- Table structure for table `menu_links`
--

CREATE TABLE `menu_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/',
  `sort` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_links`
--

INSERT INTO `menu_links` (`id`, `key`, `name`, `url`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'home', 'fronthomemodule::home.home', '/', 1, 1, '2021-02-01 14:58:31', '2021-03-14 16:56:26'),
(2, 'about', 'fronthomemodule::home.about', '/config/1', 7, 1, '2021-02-01 14:58:31', '2021-05-15 10:44:17'),
(3, 'latest_products', 'fronthomemodule::home.latest_products', '/latest_products', 6, 0, '2021-02-01 14:58:31', '2021-07-13 21:01:00'),
(4, 'offers', 'fronthomemodule::home.offers', '/discount-products', 3, 1, '2021-02-01 14:58:31', '2021-03-14 16:47:21'),
(5, 'suggestions', 'fronthomemodule::home.suggestions', '/suggestions', 8, 1, '2021-02-01 14:58:31', '2021-04-20 22:08:42'),
(6, 'contact_us', 'fronthomemodule::home.contact_us', '/contact_us', 4, 1, '2021-02-01 14:58:31', '2021-03-14 20:08:40'),
(7, 'all_products', 'fronthomemodule::home.all_products', '/all_products', 2, 1, '2021-02-01 14:58:31', '2021-08-10 17:41:25'),
(8, 'brands', 'fronthomemodule::home.brands', '/brands', 5, 0, '2021-02-01 14:58:31', '2021-12-16 20:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorized_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prices_level` int(11) DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `zone_id` int(10) UNSIGNED DEFAULT NULL,
  `government_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_111039_create_admins_table', 1),
(3, '2019_08_25_122253_create_permission_tables', 2),
(6, '2019_09_08_103535_create_categories_table', 4),
(16, '2019_09_10_085920_create_brands_table', 6),
(17, '2019_09_10_090000_create_attributes_table', 6),
(44, '2019_09_09_113505_create_products_table', 7),
(45, '2019_09_12_071418_create_options_table', 7),
(46, '2019_09_12_075430_create_option_values_table', 7),
(47, '2019_09_15_105326_create_product_options_table', 7),
(48, '2019_09_15_105616_create_product_option_values_table', 7),
(49, '2019_09_15_105617_create_product_combinations_table', 7),
(50, '2019_09_24_090151_create_product_images_table', 7),
(51, '2019_09_24_131142_create_poduct_attributes_table', 7),
(52, '2019_09_25_114908_create_product_discounts_table', 7),
(53, '2019_10_02_140213_add_fileds_to_combinations_table', 8),
(54, '2019_10_07_071109_create_sliders_table', 9),
(56, '2019_10_07_073252_create_advertisements_table', 10),
(57, '2019_10_07_102736_add_In_home_coulm', 11),
(59, '2019_10_08_074811_add_details_to_product', 12),
(60, '2019_10_10_080601_create_category_options_table', 13),
(65, '2019_10_14_080626_create_offers_table', 14),
(66, '2019_10_14_082020_add_offer_id_to_product_discount', 14),
(67, '2019_10_14_120526_create_config_categories_table', 15),
(68, '2019_10_14_120536_create_configs_table', 15),
(70, '2019_10_16_093946_add_photo_coulum_to_config', 16),
(71, '2019_10_16_133208_create_currencies_table', 17),
(72, '2019_10_17_111246_create_countries_table', 18),
(73, '2019_10_17_111630_create_governments_table', 18),
(74, '2019_10_17_111640_create_cities_table', 18),
(75, '2019_10_17_111647_create_zones_table', 18),
(76, '2019_08_29_075208_create_users_table', 19),
(78, '2019_10_20_083622_add_is_subscripe_newsletter_flag', 20),
(79, '2019_10_20_105757_create_user_addresses_table', 21),
(80, '2019_10_21_115834_create_verification_codes_table', 22),
(81, '2019_10_21_122248_add_is_active_to_users', 23),
(84, '2019_10_22_073817_create_reset_passwords_table', 24),
(85, '2019_10_23_112416_create_wishlists_table', 25),
(86, '2019_10_27_113124_create_orders_table', 26),
(87, '2019_10_27_134200_add_charge_to_city', 27),
(88, '2019_10_27_135939_create_order_products_table', 28),
(89, '2019_10_28_114013_create_discounts_table', 29),
(90, '2019_10_28_114528_create_vouchers_table', 29),
(92, '2019_10_29_085423_add_combination_name_to_order_table', 30),
(93, '2019_10_30_075426_add_currency_to_cart', 31),
(94, '2019_11_03_071534_create_suggestions_table', 32),
(95, '2019_11_03_073910_create_contactuses_table', 32),
(96, '2019_11_03_083044_create_newsletters_table', 32),
(97, '2019_11_03_091735_create_product_reviews_table', 32),
(98, '2019_11_10_082632_add_provider_id_to_users', 33),
(103, '2019_11_11_120306_create_status_types_table', 34),
(104, '2019_11_11_120327_create_statuses_table', 34),
(105, '2019_11_11_120344_create_order_statuses_table', 34),
(106, '2019_11_11_121643_add_status_to_order', 35),
(107, '2019_11_13_093819_add_icon_to_Config_cat', 36),
(109, '2019_11_19_110233_create_payment_methods_table', 37),
(111, '2019_11_24_102938_add_couloms_to_review_table', 38),
(112, '2019_12_02_135917_add_is_ban', 39),
(113, '2019_12_03_132414_create_newsletter_messages_table', 40),
(115, '2019_12_04_084752_create_seos_table', 41),
(116, '2020_01_05_161604_add_currency_id_to_orders', 42),
(117, '2020_06_01_131504_add_sort_order_to_categories_table', 43),
(119, '2020_06_01_160029_add_other_prices_to_products_table', 44),
(120, '2020_06_02_102224_add_county_column_to_user_addresses_table', 45),
(121, '2020_06_02_102312_add_county_column_to_users_table', 45),
(123, '2020_06_02_134239_create_merchants_table', 46),
(126, '2020_06_07_104804_add_more_columns_to_users_table', 47),
(128, '2020_06_07_133744_add_is_merchant_column_to_orders_table', 48),
(129, '2021_02_25_114240_add_link_to_slider', 56),
(130, '2021_02_24_152424_create_advertise_setttings_table', 56),
(131, '2021_02_16_125350_add_last_modifier_id_column_to_orders_table', 55),
(132, '2021_02_15_153515_create_notification_bodies_table', 54),
(133, '2021_02_15_105542_add_assigned_ids_column_to_orders_table', 53),
(134, '2021_02_10_151316_create_notifications_table', 52),
(135, '2020_12_28_143525_create_userlog_table', 50),
(136, '2020_12_16_171108_create_tax_table', 50),
(137, '2020_12_14_105319_create_deliverytimes_table', 50),
(138, '2020_11_25_114934_create_news_table', 50),
(139, '2020_08_19_105031_create_colors_table', 50),
(140, '2020_08_16_135754_add_viewed_levels_to_products_table', 50),
(141, '2020_08_16_113841_add_oreders_zone_id_to_admins_table', 50),
(142, '2021_02_01_110844_create_carts_table', 51),
(143, '2021_02_01_165535_create_menu_links_table', 49),
(145, '2021_03_15_134400_add_properties_column_to_configs_table', 57),
(146, '2021_03_21_144417_create_catalogs_table', 58),
(147, '2021_03_25_160312_create_transactions_table', 59),
(148, '2021_03_28_154739_add_transaction_column_id_to_orders_table', 59),
(149, '2021_04_06_125410_create_return_reasons_table', 60),
(150, '2021_04_06_125417_create_returns_table', 60),
(151, '2021_04_08_123246_create_warranties_table', 61),
(152, '2021_04_14_133352_add_seen_at_column_to_warranties_table', 62),
(153, '2021_05_10_121112_create_catalog_categories_table', 63),
(154, '2021_05_10_123525_add_catalog_category_id_to_catalogs_table', 63),
(155, '2021_05_11_144546_add_commercial_to_users_table', 63),
(156, '2021_05_17_154555_add_brand_id_column_to_catalog_categories_table', 64),
(157, '2021_05_17_154626_remove_brand_id_column_from_catalogs_table', 64),
(158, '2021_05_18_144458_add_can_cash_column_to_users_table', 65),
(159, '2021_05_18_145648_add-subject-to-suggestion', 65),
(160, '2021_05_18_151854_add-complete-show-to-suggestion', 65),
(161, '2021_05_18_160736_add-reply-type-to-suggestion', 65),
(162, '2021_05_19_114405_add_completed_at_column_to_orders_table', 65),
(163, '2021_05_20_115110_add_image_en_column_to_sliders_table', 66),
(164, '2021_05_20_115124_add_image_en_column_to_advertisements_table', 66),
(165, '2021_05_20_144853_add_banner_to_categories_table', 66),
(166, '2021_05_19_163036_add-number-user-to-suggestion', 67),
(167, '2021_05_19_163139_create_suggesstion_replies_table', 67),
(168, '2021_05_20_123103_switch_brand_id_column_from_categories_to_catalogs_table', 67),
(169, '2021_05_24_120323_add_phone_column_to_admins_table', 67),
(170, '2021_05_24_122812_alter_status_levels_column_from_admins_table', 67),
(171, '2019_08_19_000000_create_failed_jobs_table', 68),
(172, '2021_06_17_150425_create_insurances_table', 68),
(173, '2021_06_27_163357_add_untaxed_shipping_column_to_orders_table', 69),
(174, '2021_06_30_102625_add_short_desc_column_to_products_table', 70),
(175, '2021_09_21_172206_add_new_column_to_warranties_table', 71),
(176, '2021_09_26_172922_add_store_reason_to_warranties_table', 72),
(177, '2021_09_27_144103_add_user_notes_column_to_insurances_table', 72),
(178, '2021_09_28_114038_add_seen_column_to_users_table', 73),
(179, '2021_09_28_114149_add_seen_column_to_orders_table', 73),
(180, '2021_09_28_114205_add_seen_column_to_warranties_table', 73),
(181, '2021_09_28_114212_add_seen_column_to_insurances_table', 73),
(182, '2021_09_28_114253_add_seen_column_to_returns_table', 73),
(183, '2021_09_28_114343_add_seen_column_to_product_reviews_table', 73),
(184, '2021_09_28_120121_add_seen_column_to_suggestions_table', 73),
(185, '2021_09_28_120219_add_seen_column_to_carts_table', 73),
(186, '2021_10_04_141653_remove_column_from_warranties_table', 74),
(187, '2021_10_05_141218_add_new_column_to_insurances_table', 74),
(188, '2021_10_06_120338_add_user_id_column_to_insurances_table', 74),
(189, '2021_10_06_165703_add_insurance_id_to_warranties_table', 74),
(190, '2021_10_10_170335_add_seen_column_to_contactuses_table', 75);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(28, 'Modules\\AdminModule\\Entities\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(28, 'Modules\\AdminModule\\Entities\\Admin', 1),
(28, 'Modules\\AdminModule\\Entities\\Admin', 3),
(28, 'Modules\\AdminModule\\Entities\\Admin', 4),
(28, 'Modules\\AdminModule\\Entities\\Admin', 5),
(29, 'Modules\\AdminModule\\Entities\\Admin', 6),
(29, 'Modules\\AdminModule\\Entities\\Admin', 7),
(29, 'Modules\\AdminModule\\Entities\\Admin', 9),
(29, 'Modules\\AdminModule\\Entities\\Admin', 10),
(28, 'Modules\\AdminModule\\Entities\\Admin', 11),
(32, 'Modules\\AdminModule\\Entities\\Admin', 12),
(31, 'Modules\\AdminModule\\Entities\\Admin', 14),
(28, 'Modules\\AdminModule\\Entities\\Admin', 15);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `viewed_levels` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `desc_ar`, `desc_en`, `status`, `viewed_levels`, `created_at`, `updated_at`) VALUES
(4, 'عملاؤنا الكرام نسعى لتوفير خدمات الشحن خلال مدة لاتتجاوز 72 ساعة عمل فقط من وقت اتمام الطلب', '<span class=\"emoji-outer emoji-sizer\"><span class=\"emoji-inner\" style=\"background: url(chrome-extension://gaoflciahikhligngeccdecgfjngejlh/emoji-data/sheet_apple_32.png);background-position:73.97179788484137% 40.0117508813161%;background-size:5418.75% 5418.75%\" data-codepoints=\"1f6e0-fe0f\"></span></span>..Dear customers, the website is under maintenance. We apologize for inconveniencing you ..<span class=\"emoji-outer emoji-sizer\"><span class=\"emoji-inner\" style=\"background: url(chrome-extension://gaoflciahikhligngeccdecgfjngejlh/emoji-data/sheet_apple_32.png);background-position:73.97179788484137% 40.0117508813161%;background-size:5418.75% 5418.75%\" data-codepoints=\"1f6e0-fe0f\"></span></span>', 1, '1,2,3,4', '2020-12-08 09:03:41', '2021-11-10 09:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(6, 'Abcanv@gcd.com', '2020-07-01 04:16:01', '2020-07-01 04:16:01'),
(7, '3loosh7000@gmail.com', '2020-09-02 05:59:32', '2020-09-02 05:59:32'),
(8, 'sdfgf@sdfcv.com', '2020-09-10 00:17:53', '2020-09-10 00:17:53'),
(9, '3loosh@d.com', '2020-11-09 14:58:49', '2020-11-09 14:58:49'),
(10, 'Gfh@x.c', '2020-11-13 06:53:39', '2020-11-13 06:53:39'),
(11, '3loosh7000@gmail.comر', '2020-11-25 05:42:48', '2020-11-25 05:42:48'),
(12, 'Bdh@h.con', '2020-11-25 05:42:59', '2020-11-25 05:42:59'),
(13, '3loosh7000@gmail.comsbs', '2020-12-03 01:16:03', '2020-12-03 01:16:03'),
(14, 'des1sanad@gmail.com', '2021-01-03 17:57:05', '2021-01-03 17:57:05'),
(15, '3loosh7000@gmail.comh', '2021-02-17 08:18:11', '2021-02-17 08:18:11'),
(16, 'mazen@pioneers-solutions.com', NULL, NULL),
(17, 'eslam.tarek@pioneers-solutions.com', NULL, NULL),
(18, '3li@ajmalalhawatif.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_messages`
--

CREATE TABLE `newsletter_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_messages`
--

INSERT INTO `newsletter_messages` (`id`, `subject`, `message`, `attachment`, `created_at`, `updated_at`) VALUES
(1, NULL, 'hggggggggggg', NULL, '2020-12-08 04:14:32', '2020-12-08 04:14:32'),
(2, NULL, 'عررررررررروض خاصة', NULL, '2021-01-03 17:57:34', '2021-01-03 17:57:34'),
(3, 'Welcome', 'test', NULL, '2021-04-08 09:41:46', '2021-04-08 09:41:46'),
(4, 'Welcome', 'te', NULL, '2021-04-08 09:42:03', '2021-04-08 09:42:03'),
(5, 'Welcome', 'te', NULL, '2021-04-08 09:42:03', '2021-04-08 09:42:03'),
(6, 'test', 'test2', '1617871401.jpg', '2021-04-08 09:43:24', '2021-04-08 09:43:24'),
(7, 'المطالبة والضمان', 'عملاؤنا الكرام سيتم البدأ ب استقبال طلبات المطالبه والضمان عبر الموقع الالكتروني ابتداءً من يوم 01-06-2021 م وشكراً', '1618334029.pdf', '2021-04-13 18:13:51', '2021-04-13 18:13:51'),
(8, 'شبين الكوم', 'أهلا', NULL, '2021-05-26 16:02:54', '2021-05-26 16:02:54'),
(9, 'Welcome', 'Welcome', NULL, '2021-05-27 14:47:45', '2021-05-27 14:47:45'),
(10, 'ااااا', 'اااااااا', NULL, '2021-05-27 16:31:06', '2021-05-27 16:31:06'),
(11, 'test2', 'test2', NULL, '2021-06-23 10:30:51', '2021-06-23 10:30:51'),
(12, 'عررررررررروض خاصة', 'عررررررررروض خاصة', '163389782161634d5d9644f1.jpg', '2021-10-10 21:30:26', '2021-10-10 21:30:26'),
(13, 'عروض السبت لدى اجمل الهواتف', 'عملاؤنا التجار بدأت اقوى العروض لدى شركة اجمل الهواتف ستكون متاحه لمدة 24 ساعة فقط  (يوم السبت)  🔥 عبر الموقع الالكتروني ajmalalhawatif.com , نتشرف بخدمتكم .', '16446728176207b73196524اسود.jpg', '2022-02-12 14:33:43', '2022-02-12 14:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('045b5afa-b5f7-4234-9cb2-f4323cbc5d4c', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 25\",\"title_en\":\"Reply on Warranty Number #25\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 25\",\"body_en\":\"View Your warranty reply #25\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/25\",\"status\":null,\"body\":null}', '2021-10-12 22:42:58', '2021-10-12 16:07:12', '2021-10-12 22:42:58'),
('04615d00-0bf7-432f-a5c5-a37643f21568', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 56\",\"title_en\":\"Reply on Insurance Number #56\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 56\",\"body_en\":\"View Your Insurance reply #56\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=56\",\"status\":\"2\",\"body\":null}', '2021-10-26 12:15:11', '2021-10-26 12:14:56', '2021-10-26 12:15:11'),
('066e8420-744f-4515-a9f9-7aae7112df9b', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:42:57', '2021-02-14 09:42:57'),
('06af076e-2ee1-46a9-8f7f-4d9203ebbaa2', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-05-30 19:11:00\",\"body_en\":\"You have received a new cart offer. until2021-05-30 19:11:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-05-30 18:11:00\",\"offer_end_time\":\"2021-05-30 19:11:00\",\"offer_price\":1,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u0633\\u064a\\u0646 \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u0629 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-May-30 18:05 pm  \\u062d\\u062a\\u0649 2021-May-30 19:05 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-14 10:01:12', '2021-05-30 16:12:57', '2021-07-14 10:01:12'),
('07e61417-b83e-472b-b168-95a129e30cb6', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 72\",\"title_en\":\"Reply on Insurance Number #72\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 72\",\"body_en\":\"View Your Insurance reply #72\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance\\/72\",\"status\":\"1\",\"body\":null}', '2021-10-31 18:53:30', '2021-10-31 18:53:07', '2021-10-31 18:53:30'),
('0c2cabf2-9e8b-49ab-bfd3-525592f30486', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 50\",\"title_en\":\"Reply on Insurance Number #50\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 50\",\"body_en\":\"View Your Insurance reply #50\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=50\",\"status\":\"1\",\"body\":null}', '2021-10-13 10:49:21', '2021-10-12 23:09:45', '2021-10-13 10:49:21'),
('0cf0953f-58e3-4d9a-80f3-95468cbcbe1a', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 197, '{\"offer_send_time\":\"2021-03-14 22:46:00\",\"offer_end_time\":\"2021-03-14 23:46:00\",\"offer_price\":15,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u0633\\u0628\\u064a\\u0633 \\u0645\\u0648\\u0628\\u0627\\u064a\\u0644 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Mar-14 22:03 pm  \\u062d\\u062a\\u0649 2021-Mar-14 23:03 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-03-14 20:48:13', '2021-03-14 20:48:13'),
('0d66f799-41a0-4f57-bb49-dfca88d29bb2', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 62\",\"title_en\":\"Reply on Insurance Number #62\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 62\",\"body_en\":\"View Your Insurance reply #62\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=62\",\"status\":\"1\",\"body\":null}', '2021-10-30 17:30:42', '2021-10-28 21:37:34', '2021-10-30 17:30:42'),
('0e112231-fd96-426f-ac05-39092e342d72', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 218, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-05-26 15:43:00\",\"body_en\":\"You have received a new cart offer. until2021-05-26 15:43:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-05-25 14:43:00\",\"offer_end_time\":\"2021-05-26 15:43:00\",\"offer_price\":100,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 Mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-May-25 14:05 pm  \\u062d\\u062a\\u0649 2021-May-26 15:05 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-05-25 12:44:45', '2021-05-25 12:44:08', '2021-05-25 12:44:45'),
('0e32eda8-42f0-4422-9ff5-9e6fff081101', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 52\",\"title_en\":\"Reply on Insurance Number #52\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 52\",\"body_en\":\"View Your Insurance reply #52\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=52\",\"status\":\"1\",\"body\":null}', '2021-10-26 10:58:30', '2021-10-26 10:43:18', '2021-10-26 10:58:30'),
('0ea3c5ad-6d6b-4afb-abd2-574d222de702', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-08 06:50:00\",\"body_en\":\"You have received a new cart offer. until2021-07-08 06:50:00\",\"url\":\"https:\\/\\/ajmalalhawatif.com\\/cart\",\"offer_send_time\":\"2021-07-08 05:50:00\",\"offer_end_time\":\"2021-07-08 06:50:00\",\"offer_price\":323,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u0633\\u064a\\u0646 \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u0629 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-08 05:07 am  \\u062d\\u062a\\u0649 2021-Jul-08 06:07 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-14 10:01:12', '2021-07-08 05:50:31', '2021-07-14 10:01:12'),
('10ecf393-50e0-4c8d-98c4-928dd785b66b', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 278, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-10 20:50:00\",\"body_en\":\"You have received a new cart offer. until2021-07-10 20:50:00\",\"url\":\"https:\\/\\/ajmalalhawatif.com\\/cart\",\"offer_send_time\":\"2021-07-10 19:50:00\",\"offer_end_time\":\"2021-07-10 20:50:00\",\"offer_price\":33,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0635\\u062f\\u0649 \\u0627\\u0644\\u0645\\u0633\\u062a\\u0642\\u0628\\u0644 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-10 19:07 pm  \\u062d\\u062a\\u0649 2021-Jul-10 20:07 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-07-10 19:53:38', '2021-07-10 19:53:38'),
('110982cd-8769-46be-b213-59163cf454c9', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 209, '{\"offer_send_time\":\"2021-02-17 13:00:00\",\"offer_end_time\":\"2021-02-17 14:00:00\",\"offer_price\":30,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u062a\\u064a\\u0644\\u064a\\u0645\\u064a\\u062f\\u064a\\u0627 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Feb-17 13:02 pm  \\u062d\\u062a\\u0649 2021-Feb-17 14:02 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-02-17 11:00:39', '2021-02-17 11:00:39'),
('1532bfe1-fc91-450f-a0fd-903a5f22a5d8', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 63\",\"title_en\":\"Reply on Insurance Number #63\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 63\",\"body_en\":\"View Your Insurance reply #63\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=63\",\"status\":\"0\",\"body\":null}', '2021-10-30 17:30:42', '2021-10-30 17:30:35', '2021-10-30 17:30:42'),
('15d754d7-e4d3-4d27-af29-285c3b654916', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:46:11', '2021-02-14 09:46:11'),
('17f667cc-f9a3-4e6f-8470-e194dd11d44b', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 207, '{\"offer_send_time\":\"2021-02-17 11:39:00\",\"offer_end_time\":\"2021-02-17 12:39:00\",\"offer_price\":80,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 11:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 12:02 pm\"}', NULL, '2021-02-17 09:47:24', '2021-02-17 09:47:24'),
('1c8ca949-e028-4147-a5a2-2251ae3d8ca8', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 28\",\"title_en\":\"Reply on Warranty Number #28\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 28\",\"body_en\":\"View Your warranty reply #28\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/28\",\"status\":null,\"body\":null}', '2021-10-24 10:15:54', '2021-10-24 10:15:31', '2021-10-24 10:15:54'),
('1d3e2cd4-5f3e-4ef7-9c3b-e6f7e5dbc75e', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 204, '{\"offer_send_time\":\"2021-02-17 07:49:00\",\"offer_end_time\":\"2021-02-17 07:51:00\",\"offer_price\":12,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 ali hassan \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 07:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 07:02 am\"}', NULL, '2021-02-17 05:50:24', '2021-02-17 05:50:24'),
('1eb2b0f4-9cfc-4b0f-95fe-8db29694f5a3', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 207, '{\"offer_send_time\":\"2021-02-17 11:39:00\",\"offer_end_time\":\"2021-02-17 12:39:00\",\"offer_price\":89,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 11:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 12:02 pm\"}', NULL, '2021-02-17 09:39:44', '2021-02-17 09:39:44'),
('208708fe-3634-4bf3-b841-c8a9b0e70b8d', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-08-10 14:32:00\",\"body_en\":\"You have received a new cart offer. until2021-08-10 14:32:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-08-10 13:32:00\",\"offer_end_time\":\"2021-08-10 14:32:00\",\"offer_price\":1,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 Test \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Aug-10 13:08 pm  \\u062d\\u062a\\u0649 2021-Aug-10 14:08 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-08-10 11:34:09', '2021-08-10 11:33:03', '2021-08-10 11:34:09'),
('217120fb-8483-40e3-add1-f46ab76d5443', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:47:26', '2021-02-14 09:47:26'),
('23638769-e3d9-4816-b7ce-0fcb9d85ddef', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 26\",\"title_en\":\"Reply on Warranty Number #26\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 26\",\"body_en\":\"View Your warranty reply #26\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/26\",\"status\":null,\"body\":null}', '2021-10-24 10:05:21', '2021-10-20 12:23:27', '2021-10-24 10:05:21'),
('244fbe32-efad-4c43-9d3b-c75fd8053b32', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 25\",\"title_en\":\"Reply on Warranty Number #25\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 25\",\"body_en\":\"View Your warranty reply #25\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/25\",\"status\":null,\"body\":null}', '2021-10-24 10:05:21', '2021-10-20 12:28:41', '2021-10-24 10:05:21'),
('2492d0d0-db38-4c11-8923-9063a23e6cc4', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 50\",\"title_en\":\"Reply on Insurance Number #50\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 50\",\"body_en\":\"View Your Insurance reply #50\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=50\",\"status\":\"0\",\"body\":null}', '2021-10-12 23:08:06', '2021-10-12 23:07:53', '2021-10-12 23:08:06'),
('25cd42b9-a5bf-4a95-a734-351822798440', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:29:00\",\"offer_end_time\":\"2021-02-14 12:29:00\",\"offer_price\":60}', NULL, '2021-02-14 09:30:08', '2021-02-14 09:30:08'),
('262a6b56-bab1-4534-ba66-4c1158f24b62', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 61\",\"title_en\":\"Reply on Insurance Number #61\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 61\",\"body_en\":\"View Your Insurance reply #61\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=61\",\"status\":\"1\",\"body\":null}', '2021-10-30 17:30:42', '2021-10-27 18:51:10', '2021-10-30 17:30:42'),
('2639e6cc-2e4e-4f7e-b4b2-c1b9aec13e34', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 33\",\"title_en\":\"Reply on Warranty Number #33\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 33\",\"body_en\":\"View Your warranty reply #33\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/33\",\"status\":null,\"body\":null}', '2021-10-26 14:27:31', '2021-10-26 14:26:06', '2021-10-26 14:27:31'),
('2800251f-6ea5-4e6c-ac06-3a9c235e3c10', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 57\",\"title_en\":\"Reply on Insurance Number #57\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 57\",\"body_en\":\"View Your Insurance reply #57\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=57\",\"status\":\"1\",\"body\":null}', '2021-10-26 12:33:46', '2021-10-26 12:32:50', '2021-10-26 12:33:46'),
('29de5301-e0ff-45d2-a3ff-8207a4658ff2', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 209, '{\"offer_send_time\":\"2021-02-18 13:26:00\",\"offer_end_time\":\"2021-02-18 14:26:00\",\"offer_price\":2245,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u062a\\u064a\\u0644\\u064a\\u0645\\u064a\\u062f\\u064a\\u0627 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Feb-18 13:02 pm  \\u062d\\u062a\\u0649 2021-Feb-18 14:02 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-02-18 11:26:47', '2021-02-18 11:26:47'),
('2b972faf-dc78-4bb6-931c-5e64ed076fd2', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 54\",\"title_en\":\"Reply on Insurance Number #54\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 54\",\"body_en\":\"View Your Insurance reply #54\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=54\",\"status\":\"1\",\"body\":null}', '2021-10-26 12:01:46', '2021-10-26 11:26:15', '2021-10-26 12:01:46'),
('2d8f510b-0a1a-4127-a010-599a96e7144e', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 47\",\"title_en\":\"Reply on Warranty Number #47\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 47\",\"body_en\":\"View Your warranty reply #47\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/47\",\"status\":null,\"body\":null}', '2021-10-31 17:52:30', '2021-10-31 17:51:02', '2021-10-31 17:52:30'),
('2f85b83b-94de-4216-9fd0-88214b61c1ff', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 51\",\"title_en\":\"Reply on Insurance Number #51\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 51\",\"body_en\":\"View Your Insurance reply #51\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=51\",\"status\":\"1\",\"body\":null}', '2021-10-24 10:15:54', '2021-10-24 10:10:06', '2021-10-24 10:15:54'),
('31264c82-aed6-4dbe-898b-9556142ed717', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:56:04', '2021-02-14 09:56:04'),
('31633900-15f3-40a8-9272-ba621bff0b67', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 207, '{\"offer_send_time\":\"2021-02-17 12:19:00\",\"offer_end_time\":\"2021-02-17 13:19:00\",\"offer_price\":3700,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 12:02 pm \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 13:02 pm\"}', NULL, '2021-02-17 10:20:09', '2021-02-17 10:20:09'),
('34db2dea-3f49-46b4-b5b6-87ca7f810e96', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 45\",\"title_en\":\"Reply on Warranty Number #45\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 45\",\"body_en\":\"View Your warranty reply #45\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/45\",\"status\":null,\"body\":null}', '2021-10-31 13:47:13', '2021-10-31 13:45:43', '2021-10-31 13:47:13'),
('355c1083-f7f3-48e9-acd4-91e70e689d9c', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 25\",\"title_en\":\"Reply on Warranty Number #25\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 25\",\"body_en\":\"View Your warranty reply #25\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/25\",\"status\":null,\"body\":null}', '2021-10-12 22:42:58', '2021-10-12 15:44:13', '2021-10-12 22:42:58'),
('35be9290-f4b1-427f-a698-d98ad576edb3', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-16 11:45:00\",\"body_en\":\"You have received a new cart offer. until2021-07-16 11:45:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-07-15 10:45:00\",\"offer_end_time\":\"2021-07-16 11:45:00\",\"offer_price\":25,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 Test \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-15 10:07 am  \\u062d\\u062a\\u0649 2021-Jul-16 11:07 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-15 08:52:46', '2021-07-15 08:45:45', '2021-07-15 08:52:46'),
('35fd62d4-1d13-45fe-a1ed-ccee78be07b1', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 55\",\"title_en\":\"Reply on Insurance Number #55\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 55\",\"body_en\":\"View Your Insurance reply #55\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=55\",\"status\":\"0\",\"body\":null}', '2021-10-26 12:01:46', '2021-10-26 12:01:38', '2021-10-26 12:01:46'),
('361a3d94-b4bd-4dc3-9917-5a523028447a', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 39\",\"title_en\":\"Reply on Warranty Number #39\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 39\",\"body_en\":\"View Your warranty reply #39\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/39\",\"status\":null,\"body\":null}', '2021-10-27 18:43:22', '2021-10-27 18:43:15', '2021-10-27 18:43:22'),
('367b2d40-694a-45f4-b7e4-d49ea4d6be3d', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 204, '{\"offer_send_time\":\"2021-02-17 08:15:00\",\"offer_end_time\":\"2021-02-17 09:15:00\",\"offer_price\":22,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 ali hassan \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 08:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 09:02 am\"}', NULL, '2021-02-17 06:15:45', '2021-02-17 06:15:45'),
('373cd5af-9f8e-401a-bbd1-d822690a0dea', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-15 15:09:00\",\"body_en\":\"You have received a new cart offer. until2021-07-15 15:09:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-07-15 14:09:00\",\"offer_end_time\":\"2021-07-15 15:09:00\",\"offer_price\":59,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 Test \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-15 14:07 pm  \\u062d\\u062a\\u0649 2021-Jul-15 15:07 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-15 12:09:29', '2021-07-15 12:09:09', '2021-07-15 12:09:29'),
('39847501-5087-4d36-b1a3-98d53194c090', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 272, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-06-17 02:20:00\",\"body_en\":\"You have received a new cart offer. until2021-06-17 02:20:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-06-17 01:20:00\",\"offer_end_time\":\"2021-06-17 02:20:00\",\"offer_price\":12,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 ddd \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jun-17 01:06 am  \\u062d\\u062a\\u0649 2021-Jun-17 02:06 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-06-16 23:27:09', '2021-06-16 23:21:23', '2021-06-16 23:27:09'),
('3a893c4e-b5fb-4778-b72f-9622acc173ef', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 22\",\"title_en\":\"Reply on Warranty Number #22\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 22\",\"body_en\":\"View Your warranty reply #22\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/22\",\"status\":null,\"body\":null}', '2021-10-11 13:23:27', '2021-10-11 10:21:20', '2021-10-11 13:23:27'),
('3ad7c83a-7625-4d4c-a0be-6a249db997ab', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:54:55', '2021-02-14 09:54:55'),
('3ae0629c-dc73-4d71-b886-bf1e233fcfab', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 48\",\"title_en\":\"Reply on Insurance Number #48\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 48\",\"body_en\":\"View Your Insurance reply #48\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=48\",\"status\":\"1\",\"body\":null}', '2021-10-12 14:02:09', '2021-10-12 14:01:53', '2021-10-12 14:02:09'),
('3f810927-d0e7-4684-accc-4cf77a22a1ab', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 272, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-05-25 17:56:00\",\"body_en\":\"You have received a new cart offer. until2021-05-25 17:56:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-05-25 16:56:00\",\"offer_end_time\":\"2021-05-25 17:56:00\",\"offer_price\":5,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 ddd \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-May-25 16:05 pm  \\u062d\\u062a\\u0649 2021-May-25 17:05 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-05-25 14:57:12', '2021-05-25 14:56:13', '2021-05-25 14:57:12'),
('418568e1-2971-4cb9-97da-7a1d7e1d6f76', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 48\",\"title_en\":\"Reply on Warranty Number #48\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 48\",\"body_en\":\"View Your warranty reply #48\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/48\",\"status\":null,\"body\":null}', '2021-10-31 17:59:45', '2021-10-31 17:59:36', '2021-10-31 17:59:45'),
('42e3b9c7-a699-49c9-a366-91e28e872fb8', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 31\",\"title_en\":\"Reply on Warranty Number #31\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 31\",\"body_en\":\"View Your warranty reply #31\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/31\",\"status\":null,\"body\":null}', '2021-10-26 13:13:44', '2021-10-26 13:12:48', '2021-10-26 13:13:44'),
('44b20cb3-d0f0-44e1-b147-5771a774fbfb', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 207, '{\"offer_send_time\":\"2021-02-17 12:03:00\",\"offer_end_time\":\"2021-02-25 13:01:00\",\"offer_price\":40,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 12:02 pm \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-25 13:02 pm\"}', NULL, '2021-02-17 10:05:40', '2021-02-17 10:05:40'),
('48d0e8a8-066c-4a12-88db-5ddc413ad37c', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 48\",\"title_en\":\"Reply on Warranty Number #48\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 48\",\"body_en\":\"View Your warranty reply #48\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/48\",\"status\":null,\"body\":null}', '2021-10-31 18:44:35', '2021-10-31 18:01:06', '2021-10-31 18:44:35'),
('496275e6-f120-43a8-8ee1-4e61c8395f84', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 45\",\"title_en\":\"Reply on Insurance Number #45\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 45\",\"body_en\":\"View Your Insurance reply #45\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=45\",\"status\":\"1\",\"body\":null}', '2021-10-10 16:14:04', '2021-10-10 16:13:34', '2021-10-10 16:14:04'),
('49b9e2b8-8aba-405f-a3bb-037979fe4e88', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 273, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-05-30 20:59:00\",\"body_en\":\"You have received a new cart offer. until2021-05-30 20:59:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-05-30 19:59:00\",\"offer_end_time\":\"2021-05-30 20:59:00\",\"offer_price\":3,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0633\\u0646\\u062f \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-May-30 19:05 pm  \\u062d\\u062a\\u0649 2021-May-30 20:05 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-05-30 18:09:10', '2021-05-30 17:59:47', '2021-05-30 18:09:10');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('4a25b399-d50e-4646-9199-e7103a4430a8', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 276, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-09 03:13:00\",\"body_en\":\"You have received a new cart offer. until2021-07-09 03:13:00\",\"url\":\"https:\\/\\/ajmalalhawatif.com\\/cart\",\"offer_send_time\":\"2021-07-09 02:13:00\",\"offer_end_time\":\"2021-07-09 03:13:00\",\"offer_price\":26,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0631\\u0643\\u0646 \\u0627\\u0644\\u062c\\u0648\\u062f\\u0629 \\u0627\\u0644\\u0642\\u0635\\u0648\\u0649 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-09 02:07 am  \\u062d\\u062a\\u0649 2021-Jul-09 03:07 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-07-09 02:21:02', '2021-07-09 02:21:02'),
('4a5113fc-0d75-4e47-b649-823fa1e7be3d', 'Modules\\UserModule\\Notifications\\SuggestionRespnseNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0631\\u0633\\u0627\\u0626\\u0644\\u0643\",\"title_en\":\"Reply to your messages\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0631\\u0633\\u0627\\u0644\\u0629 \\u0631\\u0642\\u0645 bbTUTB\",\"body_en\":\"Message No bbTUTB has been answered\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/userReply\\/16\"}', '2021-07-14 10:01:12', '2021-05-25 12:58:55', '2021-07-14 10:01:12'),
('4b472b95-3cf2-4657-af10-dfeb29c1eb38', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:50:10', '2021-02-14 09:50:10'),
('4eca44bb-f782-46f3-ad21-4baa5f0ebab2', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:33:56', '2021-02-14 09:33:56'),
('51080597-7db2-4cee-bf4d-258d6ad01cd0', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:49:53', '2021-02-14 09:49:53'),
('511fe257-ec7c-4b2a-8cf4-b7a982272fbb', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-14 13:43:00\",\"body_en\":\"You have received a new cart offer. until2021-07-14 13:43:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-07-14 12:43:00\",\"offer_end_time\":\"2021-07-14 13:43:00\",\"offer_price\":70,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 Test \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-14 12:07 pm  \\u062d\\u062a\\u0649 2021-Jul-14 13:07 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-14 10:44:04', '2021-07-14 10:43:45', '2021-07-14 10:44:04'),
('52dfa4fd-8eca-423b-bf1f-0ebf851468b9', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 211, '{\"offer_send_time\":\"2021-02-18 04:31:00\",\"offer_end_time\":\"2021-02-18 05:31:00\",\"offer_price\":25,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 Fatima \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Feb-18 04:02 am  \\u062d\\u062a\\u0649 2021-Feb-18 05:02 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-02-18 02:32:01', '2021-02-18 02:32:01'),
('558a575f-0454-41d8-9872-e538d0e11614', 'Modules\\UserModule\\Notifications\\SuggestionRespnseNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0631\\u0633\\u0627\\u0626\\u0644\\u0643\",\"title_en\":\"Reply to your messages\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0631\\u0633\\u0627\\u0644\\u0629 \\u0631\\u0642\\u0645 ZyUNuS\",\"body_en\":\"Message No ZyUNuS has been answered\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/userReply\\/17\"}', '2021-07-14 10:01:12', '2021-05-25 14:19:57', '2021-07-14 10:01:12'),
('5686c20a-486e-442a-b492-6086455633d2', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":99}', NULL, '2021-02-14 09:49:38', '2021-02-14 09:49:38'),
('56c4b56e-0e2c-4c86-b72d-5a3adcef12ac', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 53\",\"title_en\":\"Reply on Insurance Number #53\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 53\",\"body_en\":\"View Your Insurance reply #53\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=53\",\"status\":\"1\",\"body\":null}', '2021-10-26 12:01:46', '2021-10-26 11:09:09', '2021-10-26 12:01:46'),
('57037331-0856-4833-9ee0-832138259d76', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 59\",\"title_en\":\"Reply on Insurance Number #59\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 59\",\"body_en\":\"View Your Insurance reply #59\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=59\",\"status\":\"0\",\"body\":null}', '2021-10-31 13:39:48', '2021-10-31 13:39:36', '2021-10-31 13:39:48'),
('5947cdb5-61f5-47f9-8801-6f7087c188de', 'Modules\\UserModule\\Notifications\\SuggestionRespnseNotification', 'Modules\\UserModule\\Entities\\User', 218, '{\"title_ar\":\"\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0631\\u0633\\u0627\\u0626\\u0644\\u0643\",\"title_en\":\"Reply to your messages\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0631\\u0633\\u0627\\u0644\\u0629 \\u0631\\u0642\\u0645 edLATe\",\"body_en\":\"Message No edLATe has been answered\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/userReply\\/14\"}', '2021-05-25 12:48:10', '2021-05-25 12:47:40', '2021-05-25 12:48:10'),
('59b76bc9-6f41-433e-b92e-700ba249fcc7', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 262, '{\"offer_send_time\":\"2021-03-28 18:13:00\",\"offer_end_time\":\"2021-03-28 19:13:00\",\"offer_price\":2,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u062a\\u062c\\u0631\\u0628\\u0629 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Mar-28 18:03 pm  \\u062d\\u062a\\u0649 2021-Mar-28 19:03 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-03-28 16:14:01', '2021-03-28 16:14:01'),
('59e5e839-6ce7-4377-8148-8cf5333776d5', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-10 16:56:00\",\"offer_end_time\":\"2021-02-10 17:56:00\",\"offer_price\":60}', NULL, '2021-02-10 14:57:13', '2021-02-10 14:57:13'),
('5bbc472b-006d-4a53-9efc-5ed38c68d333', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 115, '{\"offer_send_time\":\"2021-02-10 16:59:00\",\"offer_end_time\":\"2021-02-10 17:01:00\",\"offer_price\":10}', NULL, '2021-02-10 14:00:24', '2021-02-10 14:00:24'),
('5e775c26-19c8-417d-8cd1-c9105e1d1fc1', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-15 14:37:00\",\"offer_end_time\":\"2021-02-15 15:37:00\",\"offer_price\":60}', NULL, '2021-02-15 12:41:20', '2021-02-15 12:41:20'),
('5e94fcfe-32c6-40b4-8315-089a5fc6fcee', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:45:17', '2021-02-14 09:45:17'),
('5ef9dcce-0bb7-493d-b23a-b0a57a98fb6f', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-15 13:33:00\",\"body_en\":\"You have received a new cart offer. until2021-07-15 13:33:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-07-15 12:33:00\",\"offer_end_time\":\"2021-07-15 13:33:00\",\"offer_price\":10,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 Test \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-15 12:07 pm  \\u062d\\u062a\\u0649 2021-Jul-15 13:07 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-15 10:36:57', '2021-07-15 10:34:10', '2021-07-15 10:36:57'),
('6295ed5e-8ef9-4ded-bbbd-0fbe3a1a9806', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:52:28', '2021-02-14 09:52:28'),
('62e0152b-c9c2-418d-bb75-e5370ea19413', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 216, '{\"offer_send_time\":\"2021-02-21 01:13:00\",\"offer_end_time\":\"2021-02-21 02:13:00\",\"offer_price\":35,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u0633\\u0639\\u062f \\u062d\\u0633\\u0646 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Feb-21 01:02 am  \\u062d\\u062a\\u0649 2021-Feb-21 02:02 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-02-20 23:14:04', '2021-02-20 23:14:04'),
('64a3eb38-fa07-4c03-b596-86dd2506a5c8', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 58\",\"title_en\":\"Reply on Insurance Number #58\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 58\",\"body_en\":\"View Your Insurance reply #58\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=58\",\"status\":\"1\",\"body\":null}', '2021-10-26 12:54:41', '2021-10-26 12:54:28', '2021-10-26 12:54:41'),
('662c2ad7-0f7b-4731-81db-de8820c4f0f7', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 47\",\"title_en\":\"Reply on Insurance Number #47\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 47\",\"body_en\":\"View Your Insurance reply #47\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=47\",\"status\":\"1\",\"body\":null}', '2021-10-11 15:10:19', '2021-10-11 14:52:18', '2021-10-11 15:10:19'),
('66f0e5a5-3926-445c-8742-4b3ed23a0a7b', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-08 05:47:00\",\"body_en\":\"You have received a new cart offer. until2021-07-08 05:47:00\",\"url\":\"https:\\/\\/ajmalalhawatif.com\\/cart\",\"offer_send_time\":\"2021-07-08 04:47:00\",\"offer_end_time\":\"2021-07-08 05:47:00\",\"offer_price\":5917,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u0633\\u064a\\u0646 \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u0629 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-08 04:07 am  \\u062d\\u062a\\u0649 2021-Jul-08 05:07 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-14 10:01:12', '2021-07-08 04:47:59', '2021-07-14 10:01:12'),
('67df356e-1582-47a8-8ed5-a5eb88903604', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-05-25 16:01:00\",\"body_en\":\"You have received a new cart offer. until2021-05-25 16:01:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-05-25 15:01:00\",\"offer_end_time\":\"2021-05-25 16:01:00\",\"offer_price\":2,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u0633\\u064a\\u0646 \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u0629 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-May-25 15:05 pm  \\u062d\\u062a\\u0649 2021-May-25 16:05 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-14 10:01:12', '2021-05-25 13:02:15', '2021-07-14 10:01:12'),
('681adb96-5807-473b-9e4d-ab0c1d45c2c9', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 286, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 80\",\"title_en\":\"Reply on Insurance Number #80\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 80\",\"body_en\":\"View Your Insurance reply #80\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance\\/80\",\"status\":\"1\",\"body\":null}', '2021-11-07 05:17:02', '2021-11-07 05:04:42', '2021-11-07 05:17:02'),
('687b998e-0320-4861-b9d0-c6479c1dc1f2', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 48\",\"title_en\":\"Reply on Insurance Number #48\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 48\",\"body_en\":\"View Your Insurance reply #48\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=48\",\"status\":\"0\",\"body\":null}', '2021-10-12 14:00:13', '2021-10-12 14:00:04', '2021-10-12 14:00:13'),
('68855c03-1a65-4876-80ca-27b097b8c968', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 37\",\"title_en\":\"Reply on Warranty Number #37\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 37\",\"body_en\":\"View Your warranty reply #37\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/37\",\"status\":null,\"body\":null}', '2021-10-27 18:43:22', '2021-10-27 13:53:43', '2021-10-27 18:43:22'),
('6982e9b5-d211-4ddb-a0b2-dd9fb982b944', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 27\",\"title_en\":\"Reply on Warranty Number #27\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 27\",\"body_en\":\"View Your warranty reply #27\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/27\",\"status\":null,\"body\":null}', '2021-10-12 23:08:01', '2021-10-12 23:02:05', '2021-10-12 23:08:01'),
('6b1e4ac8-a483-4f88-8dda-3bb4a45b6edb', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 69\",\"title_en\":\"Reply on Insurance Number #69\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 69\",\"body_en\":\"View Your Insurance reply #69\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance\\/69\",\"status\":\"1\",\"body\":null}', '2021-10-31 18:44:35', '2021-10-31 18:06:41', '2021-10-31 18:44:35'),
('6dabba87-52b6-46e9-850f-1ad6ca8bf865', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:54:40', '2021-02-14 09:54:40'),
('6e01b23f-d7eb-4a69-92d0-c04f841e9a23', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-05-26 19:20:00\",\"body_en\":\"You have received a new cart offer. until2021-05-26 19:20:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-05-26 18:20:00\",\"offer_end_time\":\"2021-05-26 19:20:00\",\"offer_price\":1,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u0633\\u064a\\u0646 \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u0629 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-May-26 18:05 pm  \\u062d\\u062a\\u0649 2021-May-26 19:05 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-14 10:01:12', '2021-05-26 16:20:49', '2021-07-14 10:01:12'),
('716d4c47-61c9-4b77-92e2-7a426c5b9c21', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 23\",\"title_en\":\"Reply on Warranty Number #23\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 23\",\"body_en\":\"View Your warranty reply #23\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/23\",\"status\":null,\"body\":null}', '2021-10-11 14:44:24', '2021-10-11 14:44:15', '2021-10-11 14:44:24'),
('726f8423-b18e-4021-8315-524ac266e10f', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 209, '{\"offer_send_time\":\"2021-02-17 12:51:00\",\"offer_end_time\":\"2021-02-17 13:51:00\",\"offer_price\":122,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u062a\\u064a\\u0644\\u064a\\u0645\\u064a\\u062f\\u064a\\u0627 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0644\\u0641\\u062a\\u0631\\u0629 \\u0645\\u062d\\u062f\\u0648\\u062f\\u0629 \\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Feb-17 12:02 pm  \\u062d\\u062a\\u0649 2021-Feb-17 13:02 pm\\r\\n\\u0633\\u0627\\u0631\\u0639 \\u0628\\u0627\\u0644\\u062f\\u062e\\u0648\\u0644 \\u0644\\u062d\\u0633\\u0627\\u0628\\u0643 \\u0648 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0639\\u0645\\u0644\\u064a\\u0629 \\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645\"}', NULL, '2021-02-17 10:51:24', '2021-02-17 10:51:24'),
('73369027-bfe0-4ee6-9e6f-40edaee17737', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:50:33', '2021-02-14 09:50:33'),
('737b7796-559f-4f05-ab8a-a72a2f2ca4bb', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:50:53', '2021-02-14 09:50:53'),
('7b46a6bc-1533-46b7-9836-098a5158ad0f', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 45\",\"title_en\":\"Reply on Insurance Number #45\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 45\",\"body_en\":\"View Your Insurance reply #45\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=45\",\"status\":\"0\",\"body\":null}', '2021-10-10 16:12:14', '2021-10-10 16:11:52', '2021-10-10 16:12:14'),
('7d8a0b37-3ad0-40d4-bc54-f43b6d86209f', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 32\",\"title_en\":\"Reply on Warranty Number #32\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 32\",\"body_en\":\"View Your warranty reply #32\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/32\",\"status\":null,\"body\":null}', '2021-10-26 14:22:10', '2021-10-26 14:21:59', '2021-10-26 14:22:10'),
('7dd09480-dbb9-49b6-ac8f-095cce2f8b49', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:51:24', '2021-02-14 09:51:24'),
('83b99a52-098b-400b-b7b6-b0e06dbf06de', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:34:32', '2021-02-14 09:34:32'),
('851520b0-ff77-4548-ab70-4c7099d7d65a', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 272, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-05-25 17:55:00\",\"body_en\":\"You have received a new cart offer. until2021-05-25 17:55:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-05-25 16:55:00\",\"offer_end_time\":\"2021-05-25 17:55:00\",\"offer_price\":51,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 ddd \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-May-25 16:05 pm  \\u062d\\u062a\\u0649 2021-May-25 17:05 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-05-25 14:57:12', '2021-05-25 14:55:34', '2021-05-25 14:57:12'),
('854d6cb5-0af0-46fc-907f-318b53a85ef9', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 280, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-11 00:00:00\",\"body_en\":\"You have received a new cart offer. until2021-07-11 00:00:00\",\"url\":\"https:\\/\\/ajmalalhawatif.com\\/cart\",\"offer_send_time\":\"2021-07-10 23:00:00\",\"offer_end_time\":\"2021-07-11 00:00:00\",\"offer_price\":38,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0645\\u0634\\u0627\\u0639\\u0644 \\u0627\\u0644\\u0639\\u0627\\u0635\\u0645\\u0629 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-10 23:07 pm  \\u062d\\u062a\\u0649 2021-Jul-11 00:07 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-10 23:04:50', '2021-07-10 23:00:44', '2021-07-10 23:04:50'),
('8678dbd2-9ba7-458b-a046-33387dd19731', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"offer_send_time\":\"2021-04-17 04:59:00\",\"offer_end_time\":\"2021-04-17 05:59:00\",\"offer_price\":51,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u0633\\u064a\\u0646 \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u0629 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Apr-17 04:04 am  \\u062d\\u062a\\u0649 2021-Apr-17 05:04 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-14 10:01:12', '2021-04-17 03:01:07', '2021-07-14 10:01:12'),
('880d2f2f-5070-4711-a3fc-168be226837f', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 231, '{\"offer_send_time\":\"2021-03-18 02:58:00\",\"offer_end_time\":\"2021-03-18 03:58:00\",\"offer_price\":15,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 dukanphone \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Mar-18 02:03 am  \\u062d\\u062a\\u0649 2021-Mar-18 03:03 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-03-18 00:58:37', '2021-03-18 00:58:37'),
('8832485a-ba0f-4c1e-a6e5-0ff5f2a397b8', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 33\",\"title_en\":\"Reply on Warranty Number #33\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 33\",\"body_en\":\"View Your warranty reply #33\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/33\",\"status\":null,\"body\":null}', '2021-10-26 14:27:31', '2021-10-26 14:26:49', '2021-10-26 14:27:31'),
('8b25984e-7e81-4102-8219-627f99b99e74', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 21\",\"title_en\":\"Reply on Warranty Number #21\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 21\",\"body_en\":\"View Your warranty reply #21\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/21\",\"status\":null,\"body\":null}', '2021-10-10 16:29:59', '2021-10-10 16:29:49', '2021-10-10 16:29:59'),
('8b7a41d7-a6ef-4c67-a8a6-4c03c1057c0a', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 272, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-06-28 16:17:00\",\"body_en\":\"You have received a new cart offer. until2021-06-28 16:17:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-06-28 15:17:00\",\"offer_end_time\":\"2021-06-28 16:17:00\",\"offer_price\":4360,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 ddd \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jun-28 15:06 pm  \\u062d\\u062a\\u0649 2021-Jun-28 16:06 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-06-28 13:18:40', '2021-06-28 13:18:12', '2021-06-28 13:18:40'),
('8c8afa69-4f77-4373-90c1-87de6705f25a', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 46\",\"title_en\":\"Reply on Insurance Number #46\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 46\",\"body_en\":\"View Your Insurance reply #46\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=46\",\"status\":\"1\",\"body\":null}', '2021-10-11 00:04:23', '2021-10-11 00:03:56', '2021-10-11 00:04:23'),
('8eab3620-c2e3-44d6-80e2-012064e06ec0', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-15 15:09:00\",\"body_en\":\"You have received a new cart offer. until2021-07-15 15:09:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-07-15 14:09:00\",\"offer_end_time\":\"2021-07-15 15:09:00\",\"offer_price\":55,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 Test \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-15 14:07 pm  \\u062d\\u062a\\u0649 2021-Jul-15 15:07 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-15 12:10:13', '2021-07-15 12:09:45', '2021-07-15 12:10:13'),
('8ec2cf48-732b-455f-aea0-c8439eac9a58', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 42\",\"title_en\":\"Reply on Insurance Number #42\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 42\",\"body_en\":\"View Your Insurance reply #42\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=42\",\"status\":\"0\",\"body\":null}', '2021-10-12 14:53:04', '2021-10-12 14:52:43', '2021-10-12 14:53:04'),
('8f94fe18-84e0-4d2a-aed8-e6191fa16a14', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 207, '{\"offer_send_time\":\"2021-02-17 11:39:00\",\"offer_end_time\":\"2021-02-17 12:39:00\",\"offer_price\":89,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 11:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 12:02 pm\"}', NULL, '2021-02-17 09:40:47', '2021-02-17 09:40:47'),
('91cfcfb1-065f-4914-8610-1d355535e416', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 76\",\"title_en\":\"Reply on Insurance Number #76\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 76\",\"body_en\":\"View Your Insurance reply #76\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance\\/76\",\"status\":\"1\",\"body\":null}', '2021-11-02 13:50:27', '2021-11-02 13:48:47', '2021-11-02 13:50:27'),
('92b0c3d0-eff3-4ea6-9a1c-ed76c99b7a0c', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 50\",\"title_en\":\"Reply on Insurance Number #50\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 50\",\"body_en\":\"View Your Insurance reply #50\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=50\",\"status\":\"0\",\"body\":null}', '2021-10-12 22:45:47', '2021-10-12 22:43:32', '2021-10-12 22:45:47'),
('938c750a-39ca-4084-9d42-c81301a598bc', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 67\",\"title_en\":\"Reply on Insurance Number #67\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 67\",\"body_en\":\"View Your Insurance reply #67\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance\\/67\",\"status\":\"1\",\"body\":null}', '2021-10-31 18:44:35', '2021-10-31 18:04:14', '2021-10-31 18:44:35'),
('98531487-942f-4e27-8684-a4bf17954ec2', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 209, '{\"offer_send_time\":\"2021-02-18 05:12:00\",\"offer_end_time\":\"2021-02-18 06:12:00\",\"offer_price\":280,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u062a\\u064a\\u0644\\u064a\\u0645\\u064a\\u062f\\u064a\\u0627 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Feb-18 05:02 am  \\u062d\\u062a\\u0649 2021-Feb-18 06:02 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-02-18 03:12:32', '2021-02-18 03:12:32'),
('99438f18-7045-4771-bee9-7583687fdf39', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 38\",\"title_en\":\"Reply on Warranty Number #38\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 38\",\"body_en\":\"View Your warranty reply #38\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/38\",\"status\":null,\"body\":null}', '2021-10-27 18:43:22', '2021-10-27 14:00:46', '2021-10-27 18:43:22'),
('99885303-8881-4286-a2fe-4aeb66179b1e', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 207, '{\"offer_send_time\":\"2021-02-17 12:01:00\",\"offer_end_time\":\"2021-02-17 13:01:00\",\"offer_price\":90,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 12:02 pm \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 13:02 pm\"}', NULL, '2021-02-17 10:01:32', '2021-02-17 10:01:32');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('99d677f2-556a-4a0e-8ea7-afec2f7cdc0c', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:51:55', '2021-02-14 09:51:55'),
('9f08e7bc-5e7b-4ee8-90a6-b5bb55d21682', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 68\",\"title_en\":\"Reply on Insurance Number #68\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 68\",\"body_en\":\"View Your Insurance reply #68\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance\\/68\",\"status\":\"1\",\"body\":null}', '2021-10-31 18:44:35', '2021-10-31 18:05:32', '2021-10-31 18:44:35'),
('9f162e38-076d-4b37-8b1c-43482c155e3a', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 66\",\"title_en\":\"Reply on Insurance Number #66\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 66\",\"body_en\":\"View Your Insurance reply #66\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance\\/66\",\"status\":\"1\",\"body\":null}', '2021-10-31 18:44:35', '2021-10-31 18:03:04', '2021-10-31 18:44:35'),
('9f22599b-83ca-47d2-bf1a-9c3cfe9f4878', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-05-25 14:02:00\",\"body_en\":\"You have received a new cart offer. until2021-05-25 14:02:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-05-25 13:02:00\",\"offer_end_time\":\"2021-05-25 14:02:00\",\"offer_price\":3,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u0633\\u064a\\u0646 \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u0629 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-May-25 13:05 pm  \\u062d\\u062a\\u0649 2021-May-25 14:05 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-14 10:01:12', '2021-05-25 11:03:22', '2021-07-14 10:01:12'),
('9fd488fa-42d4-4126-b841-7e2f85be9f89', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 204, '{\"offer_send_time\":\"2021-02-17 08:14:00\",\"offer_end_time\":\"2021-02-17 09:14:00\",\"offer_price\":33,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 ali hassan \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 08:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 09:02 am\"}', NULL, '2021-02-17 06:15:04', '2021-02-17 06:15:04'),
('a3ce98da-eb80-4b18-8188-0959e28e40c4', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-08-10 14:40:00\",\"body_en\":\"You have received a new cart offer. until2021-08-10 14:40:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-08-10 13:40:00\",\"offer_end_time\":\"2021-08-10 14:40:00\",\"offer_price\":1,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 Test \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Aug-10 13:08 pm  \\u062d\\u062a\\u0649 2021-Aug-10 14:08 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-08-10 12:18:38', '2021-08-10 11:40:37', '2021-08-10 12:18:38'),
('a419fde3-affc-44db-a94c-10878d0d8deb', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 212, '{\"offer_send_time\":\"2021-02-18 21:19:00\",\"offer_end_time\":\"2021-02-18 22:19:00\",\"offer_price\":4000,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0633\\u0646\\u062f \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Feb-18 21:02 pm  \\u062d\\u062a\\u0649 2021-Feb-18 22:02 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-02-18 19:20:11', '2021-02-18 19:20:11'),
('a62181dc-4f0a-48ad-87c1-5523a88bde6e', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 65\",\"title_en\":\"Reply on Insurance Number #65\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 65\",\"body_en\":\"View Your Insurance reply #65\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance\\/65\",\"status\":\"1\",\"body\":null}', '2021-10-31 17:56:48', '2021-10-31 17:56:39', '2021-10-31 17:56:48'),
('a6218364-b215-418c-969e-2983ca0e3464', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 61\",\"title_en\":\"Reply on Insurance Number #61\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 61\",\"body_en\":\"View Your Insurance reply #61\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=61\",\"status\":\"0\",\"body\":null}', '2021-10-27 18:45:07', '2021-10-27 18:45:00', '2021-10-27 18:45:07'),
('a7334207-e6d0-4ebc-8d76-d13fb13dad1c', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-15 14:37:00\",\"offer_end_time\":\"2021-02-15 15:37:00\",\"offer_price\":45}', NULL, '2021-02-15 12:57:59', '2021-02-15 12:57:59'),
('a799d6bf-5c05-4f26-85ae-cf9e4d6b8f03', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 207, '{\"offer_send_time\":\"2021-02-17 12:03:00\",\"offer_end_time\":\"2021-02-25 13:01:00\",\"offer_price\":65,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 12:02 pm \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-25 13:02 pm\"}', NULL, '2021-02-17 10:03:15', '2021-02-17 10:03:15'),
('a8e4a444-c6bf-4c88-8744-15fe60d67136', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 40\",\"title_en\":\"Reply on Warranty Number #40\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 40\",\"body_en\":\"View Your warranty reply #40\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/40\",\"status\":null,\"body\":null}', '2021-10-30 17:30:42', '2021-10-27 18:52:47', '2021-10-30 17:30:42'),
('a9ecb3e1-ce25-42c5-a68d-cdc19aa84d23', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 52\",\"title_en\":\"Reply on Warranty Number #52\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 52\",\"body_en\":\"View Your warranty reply #52\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/52\",\"status\":null,\"body\":null}', '2021-11-03 10:03:18', '2021-11-02 21:58:05', '2021-11-03 10:03:18'),
('aa539650-ae9b-4702-9792-acbd1407ff25', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:45:27', '2021-02-14 09:45:27'),
('ab399fea-84fc-4b00-bc9b-cb49bc01ad3b', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 26\",\"title_en\":\"Reply on Warranty Number #26\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 26\",\"body_en\":\"View Your warranty reply #26\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/26\",\"status\":null,\"body\":null}', '2021-10-13 10:53:17', '2021-10-13 10:52:50', '2021-10-13 10:53:17'),
('ac9f5ce1-8262-4f15-8706-3ed2dd603b30', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-10 17:04:00\",\"offer_end_time\":\"2021-02-10 17:07:00\",\"offer_price\":50}', NULL, '2021-02-10 14:04:23', '2021-02-10 14:04:23'),
('ad5dc12e-32f0-4699-9712-bc623001ba99', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 38\",\"title_en\":\"Reply on Warranty Number #38\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 38\",\"body_en\":\"View Your warranty reply #38\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/38\",\"status\":null,\"body\":null}', '2021-10-27 18:43:22', '2021-10-27 13:59:12', '2021-10-27 18:43:22'),
('af606205-44ea-4159-83a9-1845a2a097ca', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 45\",\"title_en\":\"Reply on Insurance Number #45\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 45\",\"body_en\":\"View Your Insurance reply #45\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=45\",\"status\":\"2\",\"body\":null}', '2021-10-10 16:11:33', '2021-10-10 16:11:09', '2021-10-10 16:11:33'),
('b0bad6f1-0b12-4e74-a886-9764fbcc54d7', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 70\",\"title_en\":\"Reply on Insurance Number #70\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 70\",\"body_en\":\"View Your Insurance reply #70\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance\\/70\",\"status\":\"1\",\"body\":null}', '2021-10-31 18:44:35', '2021-10-31 18:07:34', '2021-10-31 18:44:35'),
('b25a2b2d-8347-46da-af8c-6db19fb7a747', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 26\",\"title_en\":\"Reply on Warranty Number #26\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 26\",\"body_en\":\"View Your warranty reply #26\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/26\",\"status\":null,\"body\":null}', '2021-10-12 22:52:08', '2021-10-12 22:50:51', '2021-10-12 22:52:08'),
('b2bdd7da-49ea-48b7-ba2b-271491b7d47b', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:55:29', '2021-02-14 09:55:29'),
('b484e438-20bd-415a-b8e1-7e5b987f0c74', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 278, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-10 23:59:00\",\"body_en\":\"You have received a new cart offer. until2021-07-10 23:59:00\",\"url\":\"https:\\/\\/ajmalalhawatif.com\\/cart\",\"offer_send_time\":\"2021-07-10 20:00:00\",\"offer_end_time\":\"2021-07-10 23:59:00\",\"offer_price\":122,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0635\\u062f\\u0649 \\u0627\\u0644\\u0645\\u0633\\u062a\\u0642\\u0628\\u0644 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-10 20:07 pm  \\u062d\\u062a\\u0649 2021-Jul-10 23:07 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-07-10 20:04:01', '2021-07-10 20:04:01'),
('b52d5770-b321-4641-bcb6-e89451959fba', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":65}', NULL, '2021-02-14 09:48:20', '2021-02-14 09:48:20'),
('b56dd614-06ec-436c-853f-bcf61b141abd', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 24\",\"title_en\":\"Reply on Warranty Number #24\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 24\",\"body_en\":\"View Your warranty reply #24\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/24\",\"status\":null,\"body\":null}', '2021-10-11 15:10:19', '2021-10-11 14:54:18', '2021-10-11 15:10:19'),
('b67274b3-96e8-460e-a342-d0394305bc4a', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 63\",\"title_en\":\"Reply on Insurance Number #63\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 63\",\"body_en\":\"View Your Insurance reply #63\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=63\",\"status\":\"1\",\"body\":null}', '2021-10-30 17:31:16', '2021-10-30 17:31:04', '2021-10-30 17:31:16'),
('b67b0eff-167f-4077-b1ab-03dcc02adbcc', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 278, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-13 23:59:00\",\"body_en\":\"You have received a new cart offer. until2021-07-13 23:59:00\",\"url\":\"https:\\/\\/ajmalalhawatif.com\\/cart\",\"offer_send_time\":\"2021-07-10 20:43:00\",\"offer_end_time\":\"2021-07-13 23:59:00\",\"offer_price\":38,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0635\\u062f\\u0649 \\u0627\\u0644\\u0645\\u0633\\u062a\\u0642\\u0628\\u0644 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-10 20:07 pm  \\u062d\\u062a\\u0649 2021-Jul-13 23:07 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-07-10 20:46:23', '2021-07-10 20:46:23'),
('b9a5570f-5f24-4314-ae15-9c13d0bc8205', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:46:44', '2021-02-14 09:46:44'),
('bcfc2b5d-5abd-438b-b6fc-9a78d26ad304', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 21\",\"title_en\":\"Reply on Warranty Number #21\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 21\",\"body_en\":\"View Your warranty reply #21\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/21\",\"status\":null,\"body\":null}', '2021-10-10 16:31:12', '2021-10-10 16:30:59', '2021-10-10 16:31:12'),
('bdb81358-88b6-44f6-bb36-aa00599c3781', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 72\",\"title_en\":\"Reply on Insurance Number #72\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 72\",\"body_en\":\"View Your Insurance reply #72\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance\\/72\",\"status\":\"0\",\"body\":null}', '2021-10-31 18:52:26', '2021-10-31 18:52:15', '2021-10-31 18:52:26'),
('bfa56812-190e-4b3e-ac7c-53beeb94c328', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-10 17:00:00\",\"offer_end_time\":\"2021-02-10 18:00:00\",\"offer_price\":66}', NULL, '2021-02-10 15:00:51', '2021-02-10 15:00:51'),
('c193adc9-f4f8-4e9c-9d30-f28080be1e39', 'Modules\\UserModule\\Notifications\\SuggestionRespnseNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0631\\u0633\\u0627\\u0626\\u0644\\u0643\",\"title_en\":\"Reply to your messages\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0631\\u0633\\u0627\\u0644\\u0629 \\u0631\\u0642\\u0645 7OFN4W\",\"body_en\":\"Message No 7OFN4W has been answered\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/userReply\\/15\"}', '2021-07-14 10:01:12', '2021-05-25 12:56:53', '2021-07-14 10:01:12'),
('c1b34efd-576a-47db-9a25-1a3b4219c2f1', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-10-27 00:59:00\",\"body_en\":\"You have received a new cart offer. until2021-10-27 00:59:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-10-26 23:59:00\",\"offer_end_time\":\"2021-10-27 00:59:00\",\"offer_price\":90,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 Test \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Oct-26 23:10 pm  \\u062d\\u062a\\u0649 2021-Oct-27 00:10 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-10-27 18:43:22', '2021-10-26 21:59:33', '2021-10-27 18:43:22'),
('c222d23f-ad78-403f-8e1e-c8bc25e27194', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:51:06', '2021-02-14 09:51:06'),
('c73869ab-703f-409e-9574-c84084cb8e29', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:35:26', '2021-02-14 09:35:26'),
('c8805c8b-c94c-4fd9-b62c-594f3d5c89bb', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:34:43', '2021-02-14 09:34:43'),
('ca1e6a63-39a4-4210-998d-ce50486a65a4', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 60\",\"title_en\":\"Reply on Insurance Number #60\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 60\",\"body_en\":\"View Your Insurance reply #60\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=60\",\"status\":\"1\",\"body\":null}', '2021-10-26 14:43:50', '2021-10-26 14:43:35', '2021-10-26 14:43:50'),
('cad192bd-c1f0-4a1b-b307-f46834f08094', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 23\",\"title_en\":\"Reply on Warranty Number #23\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 23\",\"body_en\":\"View Your warranty reply #23\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/23\",\"status\":null,\"body\":null}', '2021-10-11 14:46:15', '2021-10-11 14:45:00', '2021-10-11 14:46:15'),
('ce99f188-02ac-49d7-abbc-e6d88b446511', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-15 13:33:00\",\"body_en\":\"You have received a new cart offer. until2021-07-15 13:33:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-07-15 12:33:00\",\"offer_end_time\":\"2021-07-15 13:33:00\",\"offer_price\":22,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 Test \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-15 12:07 pm  \\u062d\\u062a\\u0649 2021-Jul-15 13:07 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-15 10:33:40', '2021-07-15 10:33:28', '2021-07-15 10:33:40'),
('cf15ce94-9378-430f-8296-5bcb3e0684ae', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 278, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-13 00:05:00\",\"body_en\":\"You have received a new cart offer. until2021-07-13 00:05:00\",\"url\":\"https:\\/\\/ajmalalhawatif.com\\/cart\",\"offer_send_time\":\"2021-07-11 21:05:00\",\"offer_end_time\":\"2021-07-13 00:05:00\",\"offer_price\":33,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0635\\u062f\\u0649 \\u0627\\u0644\\u0645\\u0633\\u062a\\u0642\\u0628\\u0644 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-11 21:07 pm  \\u062d\\u062a\\u0649 2021-Jul-13 00:07 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-07-11 21:27:02', '2021-07-11 21:27:02'),
('cfde6301-5d9c-4119-adb1-153992f573d5', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"offer_send_time\":\"2021-03-28 00:20:00\",\"offer_end_time\":\"2021-03-31 01:20:00\",\"offer_price\":2,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u0633\\u064a\\u0646 \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u0629 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Mar-28 00:03 am  \\u062d\\u062a\\u0649 2021-Mar-31 01:03 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-14 10:01:12', '2021-03-27 22:22:42', '2021-07-14 10:01:12'),
('d0d52ee5-07ce-4b31-8e79-c1ec00c8f8f3', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:54:20', '2021-02-14 09:54:20'),
('d121c79e-3a16-43ce-8197-3025811f7496', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-08 05:52:00\",\"body_en\":\"You have received a new cart offer. until2021-07-08 05:52:00\",\"url\":\"https:\\/\\/ajmalalhawatif.com\\/cart\",\"offer_send_time\":\"2021-07-08 05:50:00\",\"offer_end_time\":\"2021-07-08 05:52:00\",\"offer_price\":323,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u0633\\u064a\\u0646 \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u0629 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-08 05:07 am  \\u062d\\u062a\\u0649 2021-Jul-08 05:07 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-14 10:01:12', '2021-07-08 05:51:30', '2021-07-14 10:01:12'),
('d193bdb7-5b92-4710-aecf-1cf77aa2130e', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 34\",\"title_en\":\"Reply on Warranty Number #34\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 34\",\"body_en\":\"View Your warranty reply #34\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/34\",\"status\":null,\"body\":null}', '2021-10-26 14:35:25', '2021-10-26 14:35:16', '2021-10-26 14:35:25'),
('d423d79c-a20d-4f8f-bc47-f0de5f0718cc', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 278, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-10 23:59:00\",\"body_en\":\"You have received a new cart offer. until2021-07-10 23:59:00\",\"url\":\"https:\\/\\/ajmalalhawatif.com\\/cart\",\"offer_send_time\":\"2021-07-10 20:00:00\",\"offer_end_time\":\"2021-07-10 23:59:00\",\"offer_price\":126,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0635\\u062f\\u0649 \\u0627\\u0644\\u0645\\u0633\\u062a\\u0642\\u0628\\u0644 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-10 20:07 pm  \\u062d\\u062a\\u0649 2021-Jul-10 23:07 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-07-10 20:01:36', '2021-07-10 20:01:36'),
('d43f97f9-fb41-4457-97c1-8c12c8d7bce2', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:38:14', '2021-02-14 09:38:14'),
('d4bf038c-d096-41bf-85f3-488518dfe71b', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 286, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 54\",\"title_en\":\"Reply on Warranty Number #54\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 54\",\"body_en\":\"View Your warranty reply #54\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/54\",\"status\":null,\"body\":null}', '2021-11-07 05:17:02', '2021-11-07 05:12:02', '2021-11-07 05:17:02'),
('d52523d0-6e64-48c0-8aa1-72aa1f2249d4', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 55\",\"title_en\":\"Reply on Insurance Number #55\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 55\",\"body_en\":\"View Your Insurance reply #55\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=55\",\"status\":\"2\",\"body\":null}', '2021-10-26 12:03:47', '2021-10-26 12:02:49', '2021-10-26 12:03:47'),
('d62a0bd5-41d8-4b53-9a53-a9f12b7337a6', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 204, '{\"offer_send_time\":\"2021-02-17 07:52:00\",\"offer_end_time\":\"2021-02-17 07:53:00\",\"offer_price\":10,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 ali hassan \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 07:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 07:02 am\"}', NULL, '2021-02-17 05:52:18', '2021-02-17 05:52:18'),
('d66a2a47-faa1-46d8-a8de-28e307ccb0df', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 49\",\"title_en\":\"Reply on Warranty Number #49\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 49\",\"body_en\":\"View Your warranty reply #49\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/49\",\"status\":null,\"body\":null}', '2021-11-01 08:03:02', '2021-10-31 18:55:02', '2021-11-01 08:03:02'),
('d7905eb8-b847-48ce-83b9-b158c992d228', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 278, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-13 23:59:00\",\"body_en\":\"You have received a new cart offer. until2021-07-13 23:59:00\",\"url\":\"https:\\/\\/ajmalalhawatif.com\\/cart\",\"offer_send_time\":\"2021-07-10 20:43:00\",\"offer_end_time\":\"2021-07-13 23:59:00\",\"offer_price\":38,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0635\\u062f\\u0649 \\u0627\\u0644\\u0645\\u0633\\u062a\\u0642\\u0628\\u0644 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-10 20:07 pm  \\u062d\\u062a\\u0649 2021-Jul-13 23:07 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-07-10 20:49:38', '2021-07-10 20:49:38'),
('d8358e72-59df-4eb2-8f1d-a66a5f91c12e', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 287, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 81\",\"title_en\":\"Reply on Insurance Number #81\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 81\",\"body_en\":\"View Your Insurance reply #81\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance\\/81\",\"status\":\"1\",\"body\":null}', '2021-11-10 09:38:22', '2021-11-10 09:37:35', '2021-11-10 09:38:22'),
('d9812113-2a59-48c0-aaa7-4336695a5568', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 50\",\"title_en\":\"Reply on Warranty Number #50\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 50\",\"body_en\":\"View Your warranty reply #50\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/50\",\"status\":null,\"body\":null}', '2021-11-02 13:50:27', '2021-11-02 13:50:17', '2021-11-02 13:50:27'),
('db06ccac-6140-4936-b308-d3810abcc9e7', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-15 14:37:00\",\"offer_end_time\":\"2021-02-15 15:37:00\",\"offer_price\":50}', NULL, '2021-02-15 12:46:35', '2021-02-15 12:46:35'),
('db5a22ef-2a30-4f01-b304-0da08f35f723', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 204, '{\"offer_send_time\":\"2021-02-17 08:13:00\",\"offer_end_time\":\"2021-02-17 09:13:00\",\"offer_price\":44,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 ali hassan \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 08:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 09:02 am\"}', NULL, '2021-02-17 06:14:08', '2021-02-17 06:14:08'),
('db5bf39d-bab9-42db-9fa4-3cb7309103e0', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 65\",\"title_en\":\"Reply on Insurance Number #65\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 65\",\"body_en\":\"View Your Insurance reply #65\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance\\/65\",\"status\":\"0\",\"body\":null}', '2021-10-31 17:56:24', '2021-10-31 17:56:16', '2021-10-31 17:56:24'),
('dc64d439-00b8-4af4-a64c-08f8e7944e86', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:52:03', '2021-02-14 09:52:03'),
('dd1b2c87-6e9f-403c-9921-3f291135f887', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-15 14:37:00\",\"offer_end_time\":\"2021-02-15 15:37:00\",\"offer_price\":100}', NULL, '2021-02-15 13:07:10', '2021-02-15 13:07:10'),
('de0caebc-69bb-4beb-9b82-112f451db53d', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 50\",\"title_en\":\"Reply on Insurance Number #50\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 50\",\"body_en\":\"View Your Insurance reply #50\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=50\",\"status\":\"1\",\"body\":null}', '2021-10-12 22:45:47', '2021-10-12 22:44:48', '2021-10-12 22:45:47'),
('e226d203-8ac3-4972-aa19-aa46ae1eada8', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:47:07', '2021-02-14 09:47:07'),
('e2451525-0d02-402a-999d-6c38a85f951a', 'Modules\\UserModule\\Notifications\\SuggestionRespnseNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0631\\u0633\\u0627\\u0626\\u0644\\u0643\",\"title_en\":\"Reply to your messages\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0631\\u0633\\u0627\\u0644\\u0629 \\u0631\\u0642\\u0645 ZyUNuS\",\"body_en\":\"Message No ZyUNuS has been answered\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/userReply\\/17\"}', '2021-07-14 10:01:12', '2021-05-25 13:21:05', '2021-07-14 10:01:12'),
('e2485b47-8943-4a80-bb39-a5e4b5a188c4', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:45:51', '2021-02-14 09:45:51');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('e31804a3-2fe8-4df7-8036-7242204f5464', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 272, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-05-25 17:30:00\",\"body_en\":\"You have received a new cart offer. until2021-05-25 17:30:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-05-25 16:30:00\",\"offer_end_time\":\"2021-05-25 17:30:00\",\"offer_price\":2,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 ddd \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-May-25 16:05 pm  \\u062d\\u062a\\u0649 2021-May-25 17:05 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-05-25 14:30:37', '2021-05-25 14:30:23', '2021-05-25 14:30:37'),
('e3a280ad-c9ee-4661-bc57-4be4b37d9979', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 77\",\"title_en\":\"Reply on Insurance Number #77\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 77\",\"body_en\":\"View Your Insurance reply #77\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance\\/77\",\"status\":\"1\",\"body\":null}', '2021-11-03 10:03:18', '2021-11-02 21:56:57', '2021-11-03 10:03:18'),
('e3cd417e-f42a-4af5-b222-4413e76bfdd7', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":65}', NULL, '2021-02-14 09:49:31', '2021-02-14 09:49:31'),
('e50c0bef-501d-4b58-af5c-8730fc6fa715', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:55:07', '2021-02-14 09:55:07'),
('e5d0dbb2-47b0-481a-b27a-1a2e4327b8e0', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:35:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:58:25', '2021-02-14 09:58:25'),
('e8931b9c-9f49-4020-afe8-2532a7eb0125', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 71\",\"title_en\":\"Reply on Insurance Number #71\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 71\",\"body_en\":\"View Your Insurance reply #71\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance\\/71\",\"status\":\"1\",\"body\":null}', '2021-10-31 18:44:35', '2021-10-31 18:08:48', '2021-10-31 18:44:35'),
('e999b560-3c1b-4cfd-af61-da9e4d994023', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 45\",\"title_en\":\"Reply on Insurance Number #45\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 45\",\"body_en\":\"View Your Insurance reply #45\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=45\",\"status\":\"0\",\"body\":null}', '2021-10-10 16:11:33', '2021-10-10 16:09:11', '2021-10-10 16:11:33'),
('ea1cff4b-39fa-4118-aa0e-512b5d80453f', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 204, '{\"offer_send_time\":\"2021-02-17 07:49:00\",\"offer_end_time\":\"2021-02-17 07:52:00\",\"offer_price\":12,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 ali hassan \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 07:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 07:02 am\"}', NULL, '2021-02-17 05:49:49', '2021-02-17 05:49:49'),
('ec9cc048-74bf-44cf-b9f9-75925454638c', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 57\",\"title_en\":\"Reply on Insurance Number #57\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 57\",\"body_en\":\"View Your Insurance reply #57\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=57\",\"status\":\"0\",\"body\":null}', '2021-10-26 12:24:05', '2021-10-26 12:23:06', '2021-10-26 12:24:05'),
('ef5eae46-ca07-4baa-903a-7117efe527ba', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 51\",\"title_en\":\"Reply on Warranty Number #51\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 51\",\"body_en\":\"View Your warranty reply #51\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/51\",\"status\":null,\"body\":null}', '2021-11-02 21:55:57', '2021-11-02 21:55:46', '2021-11-02 21:55:57'),
('ef959104-677e-4080-b00c-8bf8bb7a868e', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 41\",\"title_en\":\"Reply on Warranty Number #41\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 41\",\"body_en\":\"View Your warranty reply #41\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/41\",\"status\":null,\"body\":null}', '2021-10-30 17:30:42', '2021-10-27 18:54:19', '2021-10-30 17:30:42'),
('f1c6a55d-1814-4b92-9490-75d7ed68a777', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-08 05:29:00\",\"body_en\":\"You have received a new cart offer. until2021-07-08 05:29:00\",\"url\":\"https:\\/\\/ajmalalhawatif.com\\/cart\",\"offer_send_time\":\"2021-07-08 04:29:00\",\"offer_end_time\":\"2021-07-08 05:29:00\",\"offer_price\":12,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u0633\\u064a\\u0646 \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u0629 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-08 04:07 am  \\u062d\\u062a\\u0649 2021-Jul-08 05:07 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-14 10:01:12', '2021-07-08 04:30:05', '2021-07-14 10:01:12'),
('f1c834c4-63f2-4b0a-85ef-6c04f0b279db', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 30\",\"title_en\":\"Reply on Warranty Number #30\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 30\",\"body_en\":\"View Your warranty reply #30\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/30\",\"status\":null,\"body\":null}', '2021-10-26 12:37:38', '2021-10-26 12:37:20', '2021-10-26 12:37:38'),
('f1f28f3d-c911-490e-9405-72569439893c', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 43\",\"title_en\":\"Reply on Warranty Number #43\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 43\",\"body_en\":\"View Your warranty reply #43\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/43\",\"status\":null,\"body\":null}', '2021-10-30 17:36:08', '2021-10-30 17:34:58', '2021-10-30 17:36:08'),
('f625d727-5cea-42e3-8ba0-16c2cd85c273', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-08-10 14:31:00\",\"body_en\":\"You have received a new cart offer. until2021-08-10 14:31:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-08-10 13:31:00\",\"offer_end_time\":\"2021-08-10 14:31:00\",\"offer_price\":1,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 Test \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Aug-10 13:08 pm  \\u062d\\u062a\\u0649 2021-Aug-10 14:08 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-08-10 11:32:12', '2021-08-10 11:31:20', '2021-08-10 11:32:12'),
('f64fb3a6-1c6b-4090-baca-898628a0c8e2', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-22 15:03:00\",\"body_en\":\"You have received a new cart offer. until2021-07-22 15:03:00\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/cart\",\"offer_send_time\":\"2021-07-15 14:03:00\",\"offer_end_time\":\"2021-07-22 15:03:00\",\"offer_price\":60,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 Test \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-15 14:07 pm  \\u062d\\u062a\\u0649 2021-Jul-22 15:07 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', '2021-07-15 12:03:50', '2021-07-15 12:03:37', '2021-07-15 12:03:50'),
('f7009f48-1e71-48d8-9941-3920b5fc9a56', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 276, '{\"title_ar\":\"\\u062a\\u062e\\u0641\\u064a\\u0636 \\u0639\\u0644\\u0649 \\u0633\\u0644\\u0629 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\",\"title_en\":\"Cart Items Offer\",\"body_ar\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062a\\u062e\\u0641\\u064a\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0644\\u0633\\u0644\\u0629 \\u0645\\u0634\\u062a\\u0631\\u064a\\u0627\\u062a\\u0643 \\u062d\\u062a\\u0649 2021-07-09 03:13:00\",\"body_en\":\"You have received a new cart offer. until2021-07-09 03:13:00\",\"url\":\"https:\\/\\/ajmalalhawatif.com\\/cart\",\"offer_send_time\":\"2021-07-09 02:13:00\",\"offer_end_time\":\"2021-07-09 03:13:00\",\"offer_price\":26,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0631\\u0643\\u0646 \\u0627\\u0644\\u062c\\u0648\\u062f\\u0629 \\u0627\\u0644\\u0642\\u0635\\u0648\\u0649 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Jul-09 02:07 am  \\u062d\\u062a\\u0649 2021-Jul-09 03:07 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-07-09 02:19:09', '2021-07-09 02:19:09'),
('f7fc4004-5267-459c-8ed8-52cd0da91d44', 'Modules\\WarrantyModule\\Notifications\\InsuranceReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 49\",\"title_en\":\"Reply on Insurance Number #49\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 49\",\"body_en\":\"View Your Insurance reply #49\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/insurance?q=49\",\"status\":\"1\",\"body\":null}', '2021-10-12 22:42:58', '2021-10-12 16:08:24', '2021-10-12 22:42:58'),
('fa2fbf3a-d324-4e16-963f-29cad3d3eb33', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 26\",\"title_en\":\"Reply on Warranty Number #26\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 26\",\"body_en\":\"View Your warranty reply #26\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/26\",\"status\":null,\"body\":null}', '2021-10-12 23:02:57', '2021-10-12 22:53:48', '2021-10-12 23:02:57'),
('fae98de0-d82c-42cd-aa54-38c496159984', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-10 17:04:00\",\"offer_end_time\":\"2021-02-10 18:05:00\",\"offer_price\":60}', NULL, '2021-02-10 14:55:55', '2021-02-10 14:55:55'),
('fb61ff09-e391-420b-aa77-40e61988769b', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 42\",\"title_en\":\"Reply on Warranty Number #42\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 42\",\"body_en\":\"View Your warranty reply #42\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/42\",\"status\":null,\"body\":null}', '2021-10-30 17:36:08', '2021-10-30 17:34:15', '2021-10-30 17:36:08'),
('fc7cb227-d9ea-41df-8c63-18a71e136783', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 29\",\"title_en\":\"Reply on Warranty Number #29\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 29\",\"body_en\":\"View Your warranty reply #29\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/29\",\"status\":null,\"body\":null}', '2021-10-26 12:01:46', '2021-10-26 11:19:05', '2021-10-26 12:01:46'),
('fe71e80d-9b3f-4f66-949f-28b82a7be8df', 'Modules\\WarrantyModule\\Notifications\\WarrantyReplyNotification', 'Modules\\UserModule\\Entities\\User', 242, '{\"title_ar\":\"\\u062a\\u0645 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0631\\u0642\\u0645 25\",\"title_en\":\"Reply on Warranty Number #25\",\"body_ar\":\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0644\\u0628\\u0647 \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646 \\u0631\\u0642\\u0645 25\",\"body_en\":\"View Your warranty reply #25\",\"url\":\"http:\\/\\/protection2.pioneers-solutions.org\\/warranty\\/25\",\"status\":null,\"body\":null}', '2021-10-12 14:49:32', '2021-10-12 14:04:45', '2021-10-12 14:49:32'),
('ff6bdde9-ff42-4e53-ad65-492fa9b00e8c', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:37:36', '2021-02-14 09:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `notification_bodies`
--

CREATE TABLE `notification_bodies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `replacements` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_sms` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_bodies`
--

INSERT INTO `notification_bodies` (`id`, `key`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `replacements`, `send_sms`, `created_at`, `updated_at`) VALUES
(1, 'cart_offer', 'خصم السله', 'Cart Offer', 'عميلنا العزيز {username} لقد حصلت على خصم لمنتجات سلتك \r\nابتداءً من {time_from}  حتى {time_to} يرجى اتمام الطلب للاستفادة من الخصم .\r\n\r\nشركة اجمل الهواتف , نتشرف بخدمتكم .', 'Hello {username} you received a new offer on your cart products \r\n\r\nstrats from: {time_from} \r\n\r\nand endts at: {time_to}', '{username},{time_from},{time_to}', 1, '2021-02-15 13:00:51', '2021-02-17 11:00:16'),
(2, 'register', 'تسجيل جديد', 'user Register', 'عميلنا العزيز  {username} مرحبا بك فى شركة أجمل الهواتف .🤩', 'Dear customer {username}, welcome to the Ajmal Alhawatif Company  .🤩', '{username},{email}', 1, '2021-02-15 13:00:51', '2021-02-25 20:18:55'),
(3, 'order', 'طلب جديد', 'New Order', 'عميلنا العزيز {username} تم استلام طلبك رقم #{order_id} بقيمه كليه {total} بنجاح .\r\n\r\nشركة اجمل الهواتف , نتشرف بخدمتكم .', 'Your Order #{order_id} have been received Successfully with total of {total}\r\n\r\nThe Ajmal Alhawatif Company, we are honored to serve you.', '{username},{order_id},{total}', 1, '2021-02-15 13:00:51', '2021-02-25 03:51:56'),
(4, 'employee_order_status', 'تغيير حالة الطلب لموظف', 'Status Change to Employee', 'حبيبنا {employee} الطلب رقم #{order_id} للعميل {username} اصبح {status} بسعر {cost} بتاريخ {datetime} في {governorate}', 'Order #{order_id} is {status}', '{employee},{username},{order_id},{status},{cost},{datetime},{governorate}', 1, '2021-02-15 13:00:51', '2021-06-17 00:02:44'),
(5, 'merchant_register', 'تفعيل تاجر', 'Merchant Activation', 'عملينا العزيز {username} مرحبا بك  في شركة أجمل الهواتف لقد تم تفعيل الحساب الخاص بك رقم {account_number} يرجى تسجيل الدخول للاستفاده من اسعار الجملة .', 'Dear Customer {username} Welcome to Ajmal Alhawatif Company, the account has been activated\r\nYour number {account_number} Please login to take advantage of wholesale prices.', '{username},{email},{account_number}', 1, '2021-02-15 13:00:51', '2021-07-09 01:21:33'),
(6, 'user_login', 'تسجيل دخول', 'user Login', '{code} هو رمز التفعيل الخاص بك \r\nمرحبا بك في شركة أجمل الهواتف .', 'Welcome {username} In Ajmal Alhawatif.\r\nYour Code is: {code}', '{username},{email},{code}', 1, '2021-02-15 13:00:51', '2021-03-11 11:18:18'),
(7, 'forgot_password', 'نسيت الرقم السرى', 'Forgot Password', 'عميلنا العزيز {username}, يمكنك استعادة كلمة السر عبر الرابط التالى:', 'Dear {username}, Reset Your Account Password From This Link:', '{username},{email}', 1, '2021-02-15 13:00:51', '2021-05-04 10:51:45'),
(8, 'insurance', 'تسجيل الضمان', 'Insurance', 'عميلنا العزيز {username}, تم تفعيل الضمان رقم {qr_code} بنجاح', 'Dear {username}, Your insurance have been accepted No. {qr_code}', '{username},{email},{qr_code}', 1, '2021-02-15 13:00:51', '2021-06-23 18:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci,
  `desc_en` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewed_levels` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name_ar`, `name_en`, `type`, `created_at`, `updated_at`) VALUES
(1, 'اللون', 'اللون', 'list', '2021-08-22 22:14:39', '2021-08-22 22:14:39'),
(2, 'مساحة التخزين', 'مساحة التخزين', 'list', '2021-08-22 22:15:10', '2021-08-22 22:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `option_values`
--

CREATE TABLE `option_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `option_values`
--

INSERT INTO `option_values` (`id`, `option_id`, `name_ar`, `name_en`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'احمر', 'احمر', '', '2021-08-22 22:15:34', '2021-08-22 22:15:34'),
(2, 1, 'اسود', 'اسود', '', '2021-08-22 22:15:45', '2021-08-22 22:15:45'),
(3, 1, 'ابيض', 'ابيض', '', '2021-08-22 22:15:59', '2021-08-22 22:15:59'),
(4, 2, '256 جيجا', '256 جيجا', '', '2021-08-22 22:16:13', '2021-08-22 22:16:13'),
(5, 2, '512 جيجا', '512 جيجا', '', '2021-08-22 22:16:31', '2021-08-22 22:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_address_id` int(10) UNSIGNED NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `shipping` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `delivery_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_ids` bigint(20) DEFAULT NULL,
  `currency_id` bigint(20) DEFAULT NULL,
  `deliverytime_id` int(11) NOT NULL,
  `current_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `current_status_type_id` int(10) UNSIGNED DEFAULT '1',
  `is_merchant` int(11) NOT NULL DEFAULT '0',
  `prices_level` int(11) NOT NULL DEFAULT '5',
  `currency_value` double NOT NULL DEFAULT '1',
  `send_gift` tinyint(4) NOT NULL DEFAULT '0',
  `gift_cost` double NOT NULL DEFAULT '0',
  `tax_percentage` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_ids` varchar(191) CHARACTER SET utf8mb4 DEFAULT NULL,
  `last_modifier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `untaxed_shipping` double NOT NULL DEFAULT '0',
  `seen_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_address_id`, `payment_type`, `sub_total`, `discount`, `shipping`, `tax`, `total`, `delivery_time`, `comment`, `coupon_code`, `created_at`, `updated_at`, `order_currency`, `currency_ids`, `currency_id`, `deliverytime_id`, `current_status_id`, `current_status_type_id`, `is_merchant`, `prices_level`, `currency_value`, `send_gift`, `gift_cost`, `tax_percentage`, `assigned_ids`, `last_modifier_id`, `transaction_id`, `completed_at`, `untaxed_shipping`, `seen_at`) VALUES
(541, 284, 193, 'cash_on_delivery', 17961.9075, 0, 44.85, NULL, 18006.76, NULL, 'ااا', '', '2021-09-29 16:45:49', '2021-09-29 16:46:25', 'ر.س 🇸🇦', NULL, 4, 0, 6, 2, 0, 5, 1, 0, 0, '15', NULL, 1, NULL, '2021-09-29 18:46:25', 39, '2021-09-29 18:46:15'),
(542, 242, 171, 'forward_account', 85.1, 0, 44.85, NULL, 129.95, NULL, NULL, '', '2021-10-16 18:45:28', '2021-10-16 18:48:47', 'ر.س 🇸🇦', NULL, 4, 0, 4, 1, 1, 2, 1, 0, 0, '15', NULL, 1, NULL, NULL, 39, '2021-10-16 20:47:43'),
(543, 242, 171, 'forward_account', 190.9, 0, 44.85, NULL, 235.75, NULL, NULL, '', '2021-11-02 14:02:48', '2021-11-02 15:59:35', 'ر.س 🇸🇦', NULL, 4, 0, 1, 1, 1, 2, 1, 0, 0, '15', NULL, NULL, NULL, NULL, 39, '2021-11-02 17:59:35'),
(544, 242, 171, 'cash_on_delivery', 179619.075, 0, 44.85, NULL, 179663.93, NULL, NULL, '', '2022-03-15 19:43:07', '2022-03-15 19:43:07', 'ر.س 🇸🇦', NULL, 4, 0, 1, 1, 1, 2, 1, 0, 0, '15', NULL, NULL, NULL, NULL, 39, NULL),
(545, 242, 171, 'forward_account', 1150, 0, 44.85, NULL, 1194.85, NULL, NULL, '', '2022-03-15 19:44:32', '2022-03-15 19:44:32', 'ر.س 🇸🇦', NULL, 4, 0, 1, 1, 1, 2, 1, 0, 0, '15', NULL, NULL, NULL, NULL, 39, NULL),
(546, 242, 191, 'forward_account', 1150, 100, 44.85, NULL, 1094.85, NULL, NULL, 'AAA', '2022-03-15 19:51:55', '2022-03-15 19:51:55', 'ر.س 🇸🇦', NULL, 4, 0, 1, 1, 1, 2, 1, 0, 0, '15', NULL, NULL, NULL, NULL, 39, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `combination_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `item_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_combination_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `combination_id`, `quantity`, `item_price`, `created_at`, `updated_at`, `item_combination_name`) VALUES
(1844, 541, 5293, NULL, 1, 17961.9075, '2021-09-29 16:45:49', '2021-09-29 16:45:49', NULL),
(1845, 542, 6008, NULL, 1, 24.15, '2021-10-16 18:45:28', '2021-10-16 18:45:28', NULL),
(1846, 542, 6007, NULL, 1, 24.15, '2021-10-16 18:45:28', '2021-10-16 18:45:28', NULL),
(1847, 542, 6146, NULL, 1, 36.8, '2021-10-16 18:45:28', '2021-10-16 18:45:28', NULL),
(1848, 543, 6014, NULL, 1, 105.8, '2021-11-02 14:02:48', '2021-11-02 14:02:48', NULL),
(1849, 543, 6008, NULL, 1, 24.15, '2021-11-02 14:02:48', '2021-11-02 14:02:48', NULL),
(1850, 543, 6007, NULL, 1, 24.15, '2021-11-02 14:02:48', '2021-11-02 14:02:48', NULL),
(1851, 543, 6146, NULL, 1, 36.8, '2021-11-02 14:02:48', '2021-11-02 14:02:48', NULL),
(1852, 544, 5293, NULL, 10, 17961.9075, '2022-03-15 19:43:07', '2022-03-15 19:43:07', NULL),
(1853, 545, 5293, NULL, 10, 115, '2022-03-15 19:44:32', '2022-03-15 19:44:32', NULL),
(1854, 546, 5293, NULL, 10, 115, '2022-03-15 19:51:55', '2022-03-15 19:51:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT '1',
  `status_type_id` int(10) UNSIGNED DEFAULT '1',
  `status_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `order_id`, `status_id`, `status_type_id`, `status_comment`, `created_at`, `updated_at`) VALUES
(733, 541, 1, 1, 'جديد', '2021-09-29 16:45:49', '2021-09-29 16:45:49'),
(734, 541, 6, 2, NULL, '2021-09-29 16:46:25', '2021-09-29 16:46:25'),
(739, 542, 1, 1, 'جديد', '2021-10-16 18:45:28', '2021-10-16 18:45:28'),
(740, 542, 2, 1, NULL, '2021-10-16 18:47:53', '2021-10-16 18:47:53'),
(741, 542, 3, 1, NULL, '2021-10-16 18:48:05', '2021-10-16 18:48:05'),
(742, 542, 4, 1, 'DHL:2512457845', '2021-10-16 18:48:47', '2021-10-16 18:48:47'),
(743, 543, 1, 1, 'جديد', '2021-11-02 14:02:48', '2021-11-02 14:02:48'),
(744, 544, 1, 1, 'جديد', '2022-03-15 19:43:07', '2022-03-15 19:43:07'),
(745, 545, 1, 1, 'جديد', '2022-03-15 19:44:32', '2022-03-15 19:44:32'),
(746, 546, 1, 1, 'جديد', '2022-03-15 19:51:56', '2022-03-15 19:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `image`, `created_at`, `updated_at`) VALUES
(6, '1616075708mada.png', '2021-03-18 14:55:09', '2021-03-18 14:55:09'),
(7, '1616075775visa_mastercard.png', '2021-03-18 14:56:15', '2021-03-18 14:56:15'),
(8, '1616075788stcpay.png', '2021-03-18 14:56:28', '2021-03-18 14:56:28'),
(10, '1616075807tamara.png', '2021-03-18 14:56:47', '2021-03-18 14:56:47'),
(11, '1616075815tabby_ar.png', '2021-03-18 14:56:56', '2021-03-18 14:56:56'),
(12, '1616075860apple_pay_mark.png', '2021-03-18 14:57:41', '2021-03-18 14:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `category_id`, `name`, `title`, `guard_name`, `created_at`, `updated_at`) VALUES
(9, 1, 'add_product', 'المنتجات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(10, 1, 'delete_product', 'المنتجات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(11, 1, 'update_product', 'المنتجات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(12, 1, 'show_product', 'المنتجات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(13, 1, 'add_category', 'الفئات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(14, 1, 'delete_category', 'الفئات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(15, 1, 'update_category', 'الفئات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(16, 1, 'show_category', 'الفئات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(17, 1, 'add_brand', 'الماركات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(18, 1, 'delete_brand', 'الماركات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(19, 1, 'update_brand', 'الماركات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(20, 1, 'show_brand', 'الماركات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(21, 1, 'add_options', 'خيارات المنتج', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(22, 1, 'delete_options', 'خيارات المنتج', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(23, 1, 'update_options', 'خيارات المنتج', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(24, 1, 'show_options', 'خيارات المنتج', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(25, 1, 'add_admins', 'الادمنز', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(26, 1, 'delete_admins', 'الادمنز', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(27, 1, 'update_admins', 'الادمنز', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(28, 1, 'show_admins', 'الادمنز', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(29, 1, 'add_attribute', 'خصائص المنتج', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(30, 1, 'delete_attribute', 'خصائص المنتج', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(31, 1, 'update_attribute', 'خصائص المنتج', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(32, 1, 'show_attribute', 'خصائص المنتج', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(33, 1, 'add_role', 'الصلاحيات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(34, 1, 'delete_role', 'الصلاحيات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(35, 1, 'update_role', 'الصلاحيات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(36, 1, 'show_role', 'الصلاحيات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(37, 1, 'add_voucher', 'الكوبونات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(38, 1, 'delete_voucher', 'الكوبونات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(39, 1, 'update_voucher', 'الكوبونات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(40, 1, 'show_voucher', 'الكوبونات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(41, 1, 'add_offer', 'العروض', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(42, 1, 'delete_offer', 'العروض', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(43, 1, 'update_offer', 'العروض', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(44, 1, 'show_offer', 'العروض', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(45, 1, 'add_slider', 'الاسليدر', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(46, 1, 'delete_slider', 'الاسليدر', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(47, 1, 'update_slider', 'الاسليدر', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(48, 1, 'show_slider', 'الاسليدر', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(49, 1, 'add_advertisment', 'الاعلانات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(50, 1, 'delete_advertisment', 'الاعلانات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(51, 1, 'update_advertisment', 'الاعلانات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(52, 1, 'show_advertisment', 'الاعلانات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(53, 1, 'add_payment_method', 'طرق الدفع', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(54, 1, 'delete_payment_method', 'طرق الدفع', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(55, 1, 'update_payment_method', 'طرق الدفع', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(56, 1, 'show_payment_method', 'طرق الدفع', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(73, 1, 'add_country', 'الدول', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(74, 1, 'delete_country', 'الدول', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(75, 1, 'update_country', 'الدول', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(76, 1, 'show_country', 'الدول', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(77, 1, 'add_government', 'المحافظات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(78, 1, 'delete_government', 'المحافظات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(79, 1, 'update_government', 'المحافظات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(80, 1, 'show_government', 'المحافظات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(81, 1, 'add_city', 'المدن', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(82, 1, 'delete_city', 'المدن', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(83, 1, 'update_city', 'المدن', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(84, 1, 'show_city', 'المدن', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(85, 1, 'add_zone', 'المناطق', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(86, 1, 'delete_zone', 'المناطق', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(87, 1, 'update_zone', 'المناطق', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(88, 1, 'show_zone', 'المناطق', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(89, 1, 'add_currency', 'العملات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(90, 1, 'delete_currency', 'العملات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(91, 1, 'update_currency', 'العملات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(92, 1, 'show_currency', 'العملات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(93, 2, 'users', 'المستخدمين', 'admin', NULL, NULL),
(94, 2, 'area', 'المناطق', 'admin', NULL, NULL),
(95, 2, 'orders', 'الطلبات', 'admin', NULL, NULL),
(96, 2, 'config', 'الاعدادات', 'admin', NULL, NULL),
(97, 2, 'markting', 'التسويق', 'admin', NULL, NULL),
(98, 2, 'products', 'المنتجات', 'admin', NULL, NULL),
(99, 2, 'admins', 'الادمنز', 'admin', NULL, NULL),
(100, 2, 'invoice_print', 'طباعة الفاتورة', 'admin', NULL, NULL),
(101, 2, 'newsletter', 'القائمة البريدية', 'admin', NULL, NULL),
(102, 2, 'order_status_change', 'تغيير حالات الطلب', 'admin', NULL, NULL),
(107, 1, 'add_status', 'حالة الطلب', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(108, 1, 'delete_status', 'حالة الطلب', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(109, 1, 'update_status', 'حالة الطلب', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(110, 1, 'show_status', 'حالة الطلب', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(111, 2, 'suggestions_complaint', 'الاقترحات والشكاوى', 'admin', NULL, NULL),
(112, 2, 'contactus', 'رسائل التواصل', 'admin', NULL, NULL),
(113, 2, 'reviews', 'التقييمات', 'admin', NULL, NULL),
(114, 2, 'order_details', 'تفاصيل الطلب', 'admin', NULL, NULL),
(115, 1, 'add_seo', 'Seo', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(116, 1, 'delete_seo', 'Seo', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(117, 1, 'update_seo', 'Seo', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(118, 1, 'show_seo', 'Seo', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(119, 1, 'add_merchant', 'التجار', 'admin', NULL, NULL),
(120, 1, 'delete_merchant', 'التجار', 'admin', NULL, NULL),
(121, 1, 'update_merchant', 'التجار', 'admin', NULL, NULL),
(122, 1, 'show_merchant', 'التجار', 'admin', NULL, NULL),
(123, 2, 'labels', 'اعدادات اللغة', 'admin', NULL, NULL),
(124, 2, 'News', 'شريط الاخبار', 'admin', '2020-11-25 11:05:35', NULL),
(125, 1, 'add_deliverytime', 'وقت التسليم', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(126, 1, 'delete_deliverytime', 'وقت التسليم', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(127, 1, 'update_deliverytime', 'وقت التسليم', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(128, 1, 'show_deliverytime', 'وقت التسليم', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(129, 2, 'show_report', 'التقارير', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(130, 1, 'show_tax', 'ضريبة القيمة المضافة', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(131, 1, 'add_order', 'الطلبات', 'admin', NULL, NULL),
(132, 1, 'report', 'التقارير', 'admin', NULL, NULL),
(133, 1, 'delete_order', 'الطلبات', 'admin', NULL, NULL),
(134, 2, 'menu_links', 'ترتيب القوائم', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(135, 2, 'tax', 'ضريبة القيمة المضافة', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(137, 2, 'abandoned_cart', 'السلات المتروكة', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(138, 2, 'assign_order', 'اسناد الطلب', 'admin', '2019-08-26 09:42:54', '2019-08-26 09:42:54'),
(139, 2, 'notify_body', 'نصوص الاشعارات', 'admin', '2019-08-26 09:42:54', '2019-08-26 09:42:54'),
(140, 1, 'update_order', 'الطلبات', 'admin', '2021-02-25 09:44:51', '2021-02-25 09:44:54'),
(141, 2, 'update_cart', 'تعديل السله', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(142, 1, 'add_shipping_method', 'طرق الشحن', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(143, 1, 'delete_shipping_method', 'طرق الشحن', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(144, 1, 'update_shipping_method', 'طرق الشحن', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(145, 1, 'show_shipping_method', 'طرق الشحن', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(162, 1, 'add_catalog', 'الكتالوجات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(163, 1, 'delete_catalog', 'الكتالوجات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(164, 1, 'update_catalog', 'الكتالوجات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(165, 1, 'show_catalog', 'الكتالوجات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(166, 2, 'returns', 'المرتجعات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(167, 2, 'return_reason', 'اسباب الارجاع', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(168, 2, 'warranty', 'المطالبة والضمان', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(169, 1, 'add_catalog_category', 'اقسام الكاتالوج', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(170, 1, 'delete_catalog_category', 'اقسام الكاتالوج', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(171, 1, 'update_catalog_category', 'اقسام الكاتالوج', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(172, 1, 'show_catalog_category', 'اقسام الكاتالوج', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(173, 2, 'insurance', 'تسجيلات الضمان', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_catrgory`
--

CREATE TABLE `permissions_catrgory` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions_catrgory`
--

INSERT INTO `permissions_catrgory` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'deafult', NULL, NULL),
(2, 'custom', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phone_codes`
--

CREATE TABLE `phone_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `iso` varchar(50) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '999',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone_codes`
--

INSERT INTO `phone_codes` (`id`, `name`, `iso`, `code`, `sort`, `status`) VALUES
(1, 'Palastine', 'PS', '+970', 999, 0),
(2, 'Afghanistan', 'AF', '+93', 999, 0),
(3, 'Albania', 'AL', '+355', 999, 0),
(4, 'Algeria', 'DZ', '+213', 999, 0),
(5, 'AmericanSamoa', 'AS', '+1 684', 999, 0),
(6, 'Andorra', 'AD', '+376', 999, 0),
(7, 'Angola', 'AO', '+244', 999, 0),
(8, 'Anguilla', 'AI', '+1 264', 999, 0),
(9, 'Antigua and Barbuda', 'AG', '+1268', 999, 0),
(10, 'Argentina', 'AR', '+54', 999, 0),
(11, 'Armenia', 'AM', '+374', 999, 0),
(12, 'Aruba', 'AW', '+297', 999, 0),
(13, 'Australia', 'AU', '+61', 999, 0),
(14, 'Austria', 'AT', '+43', 999, 0),
(15, 'Azerbaijan', 'AZ', '+994', 999, 0),
(16, 'Bahamas', 'BS', '+1 242', 999, 0),
(17, 'Bahrain', 'BH', '+973', 999, 0),
(18, 'Bangladesh', 'BD', '+880', 999, 0),
(19, 'Barbados', 'BB', '+1 246', 999, 0),
(20, 'Belarus', 'BY', '+375', 999, 0),
(21, 'Belgium', 'BE', '+32', 999, 0),
(22, 'Belize', 'BZ', '+501', 999, 0),
(23, 'Benin', 'BJ', '+229', 999, 0),
(24, 'Bermuda', 'BM', '+1 441', 999, 0),
(25, 'Bhutan', 'BT', '+975', 999, 0),
(26, 'Bosnia and Herzegovina', 'BA', '+387', 999, 0),
(27, 'Botswana', 'BW', '+267', 999, 0),
(28, 'Brazil', 'BR', '+55', 999, 0),
(29, 'British Indian Ocean Territory', 'IO', '+246', 999, 0),
(30, 'Bulgaria', 'BG', '+359', 999, 0),
(31, 'Burkina Faso', 'BF', '+226', 999, 0),
(32, 'Burundi', 'BI', '+257', 999, 0),
(33, 'Cambodia', 'KH', '+855', 999, 0),
(34, 'Cameroon', 'CM', '+237', 999, 0),
(35, 'Canada', 'CA', '+1', 999, 0),
(36, 'Cape Verde', 'CV', '+238', 999, 0),
(37, 'Cayman Islands', 'KY', '+ 345', 999, 0),
(38, 'Central African Republic', 'CF', '+236', 999, 0),
(39, 'Chad', 'TD', '+235', 999, 0),
(40, 'Chile', 'CL', '+56', 999, 0),
(41, 'China', 'CN', '+86', 999, 0),
(42, 'Christmas Island', 'CX', '+61', 999, 0),
(43, 'Colombia', 'CO', '+57', 999, 0),
(44, 'Comoros', 'KM', '+269', 999, 0),
(45, 'Congo', 'CG', '+242', 999, 0),
(46, 'Cook Islands', 'CK', '+682', 999, 0),
(47, 'Costa Rica', 'CR', '+506', 999, 0),
(48, 'Croatia', 'HR', '+385', 999, 0),
(49, 'Cuba', 'CU', '+53', 999, 0),
(50, 'Cyprus', 'CY', '+537', 999, 0),
(51, 'Czech Republic', 'CZ', '+420', 999, 0),
(52, 'Denmark', 'DK', '+45', 999, 0),
(53, 'Djibouti', 'DJ', '+253', 999, 0),
(54, 'Dominica', 'DM', '+1 767', 999, 0),
(55, 'Dominican Republic', 'DO', '+1 849', 999, 0),
(56, 'Ecuador', 'EC', '+593', 999, 0),
(57, 'Egypt', 'EG', '+20', 2, 0),
(58, 'El Salvador', 'SV', '+503', 999, 0),
(59, 'Equatorial Guinea', 'GQ', '+240', 999, 0),
(60, 'Eritrea', 'ER', '+291', 999, 0),
(61, 'Estonia', 'EE', '+372', 999, 0),
(62, 'Ethiopia', 'ET', '+251', 999, 0),
(63, 'Faroe Islands', 'FO', '+298', 999, 0),
(64, 'Fiji', 'FJ', '+679', 999, 0),
(65, 'Finland', 'FI', '+358', 999, 0),
(66, 'France', 'FR', '+33', 999, 0),
(67, 'French Guiana', 'GF', '+594', 999, 0),
(68, 'French Polynesia', 'PF', '+689', 999, 0),
(69, 'Gabon', 'GA', '+241', 999, 0),
(70, 'Gambia', 'GM', '+220', 999, 0),
(71, 'Georgia', 'GE', '+995', 999, 0),
(72, 'Germany', 'DE', '+49', 999, 0),
(73, 'Ghana', 'GH', '+233', 999, 0),
(74, 'Gibraltar', 'GI', '+350', 999, 0),
(75, 'Greece', 'GR', '+30', 999, 0),
(76, 'Greenland', 'GL', '+299', 999, 0),
(77, 'Grenada', 'GD', '+1 473', 999, 0),
(78, 'Guadeloupe', 'GP', '+590', 999, 0),
(79, 'Guam', 'GU', '+1 671', 999, 0),
(80, 'Guatemala', 'GT', '+502', 999, 0),
(81, 'Guinea', 'GN', '+224', 999, 0),
(82, 'Guinea-Bissau', 'GW', '+245', 999, 0),
(83, 'Guyana', 'GY', '+595', 999, 0),
(84, 'Haiti', 'HT', '+509', 999, 0),
(85, 'Honduras', 'HN', '+504', 999, 0),
(86, 'Hungary', 'HU', '+36', 999, 0),
(87, 'Iceland', 'IS', '+354', 999, 0),
(88, 'India', 'IN', '+91', 999, 0),
(89, 'Indonesia', 'ID', '+62', 999, 0),
(90, 'Iraq', 'IQ', '+964', 999, 0),
(91, 'Ireland', 'IE', '+353', 999, 0),
(92, 'Israel', 'IL', '+972', 999, 0),
(93, 'Italy', 'IT', '+39', 999, 0),
(94, 'Jamaica', 'JM', '+1 876', 999, 0),
(95, 'Japan', 'JP', '+81', 999, 0),
(96, 'Jordan', 'JO', '+962', 999, 0),
(97, 'Kazakhstan', 'KZ', '+7 7', 999, 0),
(98, 'Kenya', 'KE', '+254', 999, 0),
(99, 'Kiribati', 'KI', '+686', 999, 0),
(100, 'Kuwait', 'KW', '+965', 999, 0),
(101, 'Kyrgyzstan', 'KG', '+996', 999, 0),
(102, 'Latvia', 'LV', '+371', 999, 0),
(103, 'Lebanon', 'LB', '+961', 999, 0),
(104, 'Lesotho', 'LS', '+266', 999, 0),
(105, 'Liberia', 'LR', '+231', 999, 0),
(106, 'Liechtenstein', 'LI', '+423', 999, 0),
(107, 'Lithuania', 'LT', '+370', 999, 0),
(108, 'Luxembourg', 'LU', '+352', 999, 0),
(109, 'Madagascar', 'MG', '+261', 999, 0),
(110, 'Malawi', 'MW', '+265', 999, 0),
(111, 'Malaysia', 'MY', '+60', 999, 0),
(112, 'Maldives', 'MV', '+960', 999, 0),
(113, 'Mali', 'ML', '+223', 999, 0),
(114, 'Malta', 'MT', '+356', 999, 0),
(115, 'Marshall Islands', 'MH', '+692', 999, 0),
(116, 'Martinique', 'MQ', '+596', 999, 0),
(117, 'Mauritania', 'MR', '+222', 999, 0),
(118, 'Mauritius', 'MU', '+230', 999, 0),
(119, 'Mayotte', 'YT', '+262', 999, 0),
(120, 'Mexico', 'MX', '+52', 999, 0),
(121, 'Monaco', 'MC', '+377', 999, 0),
(122, 'Mongolia', 'MN', '+976', 999, 0),
(123, 'Montenegro', 'ME', '+382', 999, 0),
(124, 'Montserrat', 'MS', '+1664', 999, 0),
(125, 'Morocco', 'MA', '+212', 999, 0),
(126, 'Myanmar', 'MM', '+95', 999, 0),
(127, 'Namibia', 'NA', '+264', 999, 0),
(128, 'Nauru', 'NR', '+674', 999, 0),
(129, 'Nepal', 'NP', '+977', 999, 0),
(130, 'Netherlands', 'NL', '+31', 999, 0),
(131, 'Netherlands Antilles', 'AN', '+599', 999, 0),
(132, 'New Caledonia', 'NC', '+687', 999, 0),
(133, 'New Zealand', 'NZ', '+64', 999, 0),
(134, 'Nicaragua', 'NI', '+505', 999, 0),
(135, 'Niger', 'NE', '+227', 999, 0),
(136, 'Nigeria', 'NG', '+234', 999, 0),
(137, 'Niue', 'NU', '+683', 999, 0),
(138, 'Norfolk Island', 'NF', '+672', 999, 0),
(139, 'Northern Mariana Islands', 'MP', '+1 670', 999, 0),
(140, 'Norway', 'NO', '+47', 999, 0),
(141, 'Oman', 'OM', '+968', 999, 0),
(142, 'Pakistan', 'PK', '+92', 999, 0),
(143, 'Palau', 'PW', '+680', 999, 0),
(144, 'Panama', 'PA', '+507', 999, 0),
(145, 'Papua New Guinea', 'PG', '+675', 999, 0),
(146, 'Paraguay', 'PY', '+595', 999, 0),
(147, 'Peru', 'PE', '+51', 999, 0),
(148, 'Philippines', 'PH', '+63', 999, 0),
(149, 'Poland', 'PL', '+48', 999, 0),
(150, 'Portugal', 'PT', '+351', 999, 0),
(151, 'Puerto Rico', 'PR', '+1 939', 999, 0),
(152, 'Qatar', 'QA', '+974', 999, 0),
(153, 'Romania', 'RO', '+40', 999, 0),
(154, 'Rwanda', 'RW', '+250', 999, 0),
(155, 'Samoa', 'WS', '+685', 999, 0),
(156, 'San Marino', 'SM', '+378', 999, 0),
(157, 'Saudi Arabia', 'SA', '+966', 1, 1),
(158, 'Senegal', 'SN', '+221', 999, 0),
(159, 'Serbia', 'RS', '+381', 999, 0),
(160, 'Seychelles', 'SC', '+248', 999, 0),
(161, 'Sierra Leone', 'SL', '+232', 999, 0),
(162, 'Singapore', 'SG', '+65', 999, 0),
(163, 'Slovakia', 'SK', '+421', 999, 0),
(164, 'Slovenia', 'SI', '+386', 999, 0),
(165, 'Solomon Islands', 'SB', '+677', 999, 0),
(166, 'South Africa', 'ZA', '+27', 999, 0),
(167, 'South Georgia and the South Sandwich Islands', 'GS', '+500', 999, 0),
(168, 'Spain', 'ES', '+34', 999, 0),
(169, 'Sri Lanka', 'LK', '+94', 999, 0),
(170, 'Sudan', 'SD', '+249', 999, 0),
(171, 'Suriname', 'SR', '+597', 999, 0),
(172, 'Swaziland', 'SZ', '+268', 999, 0),
(173, 'Sweden', 'SE', '+46', 999, 0),
(174, 'Switzerland', 'CH', '+41', 999, 0),
(175, 'Tajikistan', 'TJ', '+992', 999, 0),
(176, 'Thailand', 'TH', '+66', 999, 0),
(177, 'Togo', 'TG', '+228', 999, 0),
(178, 'Tokelau', 'TK', '+690', 999, 0),
(179, 'Tonga', 'TO', '+676', 999, 0),
(180, 'Trinidad and Tobago', 'TT', '+1 868', 999, 0),
(181, 'Tunisia', 'TN', '+216', 999, 0),
(182, 'Turkey', 'TR', '+90', 999, 0),
(183, 'Turkmenistan', 'TM', '+993', 999, 0),
(184, 'Turks and Caicos Islands', 'TC', '+1 649', 999, 0),
(185, 'Tuvalu', 'TV', '+688', 999, 0),
(186, 'Uganda', 'UG', '+256', 999, 0),
(187, 'Ukraine', 'UA', '+380', 999, 0),
(188, 'United Arab Emirates', 'AE', '+971', 999, 0),
(189, 'United Kingdom', 'GB', '+44', 999, 0),
(190, 'United States', 'US', '+1', 999, 0),
(191, 'Uruguay', 'UY', '+598', 999, 0),
(192, 'Uzbekistan', 'UZ', '+998', 999, 0),
(193, 'Vanuatu', 'VU', '+678', 999, 0),
(194, 'Wallis and Futuna', 'WF', '+681', 999, 0),
(195, 'Yemen', 'YE', '+967', 999, 0),
(196, 'Zambia', 'ZM', '+260', 999, 0),
(197, 'Zimbabwe', 'ZW', '+263', 999, 0),
(198, 'land Islands', 'AX', '', 999, 0),
(199, 'Antarctica', 'AQ', '', 999, 0),
(200, 'Bolivia, Plurinational State of', 'BO', '+591', 999, 0),
(201, 'Brunei Darussalam', 'BN', '+673', 999, 0),
(202, 'Cocos (Keeling) Islands', 'CC', '+61', 999, 0),
(203, 'Congo, The Democratic Republic of the', 'CD', '+243', 999, 0),
(204, 'Coted\'Ivoire', 'CI', '+225', 999, 0),
(205, 'Falkland Islands (Malvinas)', 'FK', '+500', 999, 0),
(206, 'Guernsey', 'GG', '+44', 999, 0),
(207, 'Holy See (Vatican City State)', 'VA', '+379', 999, 0),
(208, 'Hong Kong', 'HK', '+852', 999, 0),
(209, 'Iran, Islamic Republic of', 'IR', '+98', 999, 0),
(210, 'Isle of Man', 'IM', '+44', 999, 0),
(211, 'Jersey', 'JE', '+44', 999, 0),
(212, 'Korea, Democratic People\'s Republic of', 'KP', '+850', 999, 0),
(213, 'Korea, Republic of', 'KR', '+82', 999, 0),
(214, 'Lao People\'s Democratic Republic', 'LA', '+856', 999, 0),
(215, 'Libyan Arab Jamahiriya', 'LY', '+218', 999, 0),
(216, 'Macao', 'MO', '+853', 999, 0),
(217, 'Macedonia, The Former Yugoslav Republic of', 'MK', '+389', 999, 0),
(218, 'Micronesia, Federated States of', 'FM', '+691', 999, 0),
(219, 'Moldova, Republic of', 'MD', '+373', 999, 0),
(220, 'Mozambique', 'MZ', '+258', 999, 0),
(221, 'Palestinian Territory, Occupied', 'PS', '+970', 999, 0),
(222, 'Pitcairn', 'PN', '+872', 999, 0),
(223, 'Réunion', 'RE', '+262', 999, 0),
(224, 'Russia', 'RU', '+7', 999, 0),
(225, 'Saint Barthélemy', 'BL', '+590', 999, 0),
(226, 'Saint Helena, Ascension and Tristan Da Cunha', 'SH', '+290', 999, 0),
(227, 'Saint Kitts and Nevis', 'KN', '+1 869', 999, 0),
(228, 'Saint Lucia', 'LC', '+1 758', 999, 0),
(229, 'Saint Martin', 'MF', '+590', 999, 0),
(230, 'Saint Pierre and Miquelon', 'PM', '+508', 999, 0),
(231, 'Saint Vincent and the Grenadines', 'VC', '+1 784', 999, 0),
(232, 'Sao Tome and Principe', 'ST', '+239', 999, 0),
(233, 'Somalia', 'SO', '+252', 999, 0),
(234, 'Svalbard and Jan Mayen', 'SJ', '+47', 999, 0),
(235, 'Syrian Arab Republic', 'SY', '+963', 999, 0),
(236, 'Taiwan, Province of China', 'TW', '+886', 999, 0),
(237, 'Tanzania, United Republic of', 'TZ', '+255', 999, 0),
(238, 'Timor-Leste', 'TL', '+670', 999, 0),
(239, 'Venezuela, Bolivarian Republic of', 'VE', '+58', 999, 0),
(240, 'Viet Nam', 'VN', '+84', 999, 0),
(241, 'Virgin Islands, British', 'VG', '+1 284', 999, 0),
(242, 'Virgin Islands, U.S.', 'VI', '+1 340', 999, 0);

-- --------------------------------------------------------

--
-- Table structure for table `poduct_attributes`
--

CREATE TABLE `poduct_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attribute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attribute_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poduct_attributes`
--

INSERT INTO `poduct_attributes` (`id`, `product_id`, `attribute_id`, `attribute_value`, `created_at`, `updated_at`) VALUES
(8449, 5294, 31, NULL, NULL, NULL),
(8450, 5294, 17, NULL, NULL, NULL),
(8451, 5295, 31, NULL, NULL, NULL),
(8452, 5295, 17, NULL, NULL, NULL),
(8453, 5296, 31, NULL, NULL, NULL),
(8454, 5296, 17, NULL, NULL, NULL),
(8455, 5297, 31, NULL, NULL, NULL),
(8456, 5297, 17, NULL, NULL, NULL),
(9283, 5711, 31, NULL, NULL, NULL),
(9284, 5711, 17, NULL, NULL, NULL),
(9865, 6002, 31, NULL, NULL, NULL),
(9866, 6002, 17, NULL, NULL, NULL),
(9867, 6003, 31, NULL, NULL, NULL),
(9868, 6003, 17, NULL, NULL, NULL),
(9869, 6004, 31, NULL, NULL, NULL),
(9870, 6004, 17, NULL, NULL, NULL),
(9871, 6005, 31, NULL, NULL, NULL),
(9872, 6005, 17, NULL, NULL, NULL),
(9873, 6006, 31, NULL, NULL, NULL),
(9874, 6006, 17, NULL, NULL, NULL),
(9875, 6007, 31, NULL, NULL, NULL),
(9876, 6007, 17, NULL, NULL, NULL),
(9877, 6008, 31, NULL, NULL, NULL),
(9878, 6008, 17, NULL, NULL, NULL),
(9879, 6009, 31, NULL, NULL, NULL),
(9880, 6009, 17, NULL, NULL, NULL),
(9881, 6010, 31, NULL, NULL, NULL),
(9882, 6010, 17, NULL, NULL, NULL),
(9883, 6011, 31, NULL, NULL, NULL),
(9884, 6011, 17, NULL, NULL, NULL),
(9885, 6012, 31, NULL, NULL, NULL),
(9886, 6012, 17, NULL, NULL, NULL),
(9887, 6013, 31, NULL, NULL, NULL),
(9888, 6013, 17, NULL, NULL, NULL),
(9889, 6014, 31, NULL, NULL, NULL),
(9890, 6014, 17, NULL, NULL, NULL),
(9891, 6015, 31, NULL, NULL, NULL),
(9892, 6015, 17, NULL, NULL, NULL),
(9893, 6016, 31, NULL, NULL, NULL),
(9894, 6016, 17, NULL, NULL, NULL),
(9895, 6017, 31, NULL, NULL, NULL),
(9896, 6017, 17, NULL, NULL, NULL),
(9897, 6018, 31, NULL, NULL, NULL),
(9898, 6018, 17, NULL, NULL, NULL),
(9899, 6019, 31, NULL, NULL, NULL),
(9900, 6019, 17, NULL, NULL, NULL),
(9901, 6020, 31, NULL, NULL, NULL),
(9902, 6020, 17, NULL, NULL, NULL),
(9903, 6021, 31, NULL, NULL, NULL),
(9904, 6021, 17, NULL, NULL, NULL),
(9905, 6022, 31, NULL, NULL, NULL),
(9906, 6022, 17, NULL, NULL, NULL),
(9907, 6023, 31, NULL, NULL, NULL),
(9908, 6023, 17, NULL, NULL, NULL),
(9909, 6024, 31, NULL, NULL, NULL),
(9910, 6024, 17, NULL, NULL, NULL),
(9911, 6025, 31, NULL, NULL, NULL),
(9912, 6025, 17, NULL, NULL, NULL),
(9913, 6026, 31, NULL, NULL, NULL),
(9914, 6026, 17, NULL, NULL, NULL),
(9915, 6027, 31, NULL, NULL, NULL),
(9916, 6027, 17, NULL, NULL, NULL),
(9917, 6028, 31, NULL, NULL, NULL),
(9918, 6028, 17, NULL, NULL, NULL),
(9919, 6029, 31, NULL, NULL, NULL),
(9920, 6029, 17, NULL, NULL, NULL),
(9921, 6030, 31, NULL, NULL, NULL),
(9922, 6030, 17, NULL, NULL, NULL),
(9923, 6031, 31, NULL, NULL, NULL),
(9924, 6031, 17, NULL, NULL, NULL),
(9925, 6032, 31, NULL, NULL, NULL),
(9926, 6032, 17, NULL, NULL, NULL),
(9927, 6033, 31, NULL, NULL, NULL),
(9928, 6033, 17, NULL, NULL, NULL),
(9929, 6034, 31, NULL, NULL, NULL),
(9930, 6034, 17, NULL, NULL, NULL),
(9931, 6035, 31, NULL, NULL, NULL),
(9932, 6035, 17, NULL, NULL, NULL),
(9933, 6036, 31, NULL, NULL, NULL),
(9934, 6036, 17, NULL, NULL, NULL),
(9935, 6037, 31, NULL, NULL, NULL),
(9936, 6037, 17, NULL, NULL, NULL),
(9937, 6038, 31, NULL, NULL, NULL),
(9938, 6038, 17, NULL, NULL, NULL),
(9939, 6039, 31, NULL, NULL, NULL),
(9940, 6039, 17, NULL, NULL, NULL),
(9941, 6040, 31, NULL, NULL, NULL),
(9942, 6040, 17, NULL, NULL, NULL),
(9943, 6041, 31, NULL, NULL, NULL),
(9944, 6041, 17, NULL, NULL, NULL),
(9945, 6042, 31, NULL, NULL, NULL),
(9946, 6042, 17, NULL, NULL, NULL),
(9947, 6043, 31, NULL, NULL, NULL),
(9948, 6043, 17, NULL, NULL, NULL),
(9949, 6044, 31, NULL, NULL, NULL),
(9950, 6044, 17, NULL, NULL, NULL),
(9951, 6045, 31, NULL, NULL, NULL),
(9952, 6045, 17, NULL, NULL, NULL),
(9953, 6046, 31, NULL, NULL, NULL),
(9954, 6046, 17, NULL, NULL, NULL),
(9955, 6047, 31, NULL, NULL, NULL),
(9956, 6047, 17, NULL, NULL, NULL),
(9957, 6048, 31, NULL, NULL, NULL),
(9958, 6048, 17, NULL, NULL, NULL),
(9959, 6049, 31, NULL, NULL, NULL),
(9960, 6049, 17, NULL, NULL, NULL),
(9961, 6050, 31, NULL, NULL, NULL),
(9962, 6050, 17, NULL, NULL, NULL),
(9963, 6051, 31, NULL, NULL, NULL),
(9964, 6051, 17, NULL, NULL, NULL),
(9965, 6052, 31, NULL, NULL, NULL),
(9966, 6052, 17, NULL, NULL, NULL),
(9967, 6053, 31, NULL, NULL, NULL),
(9968, 6053, 17, NULL, NULL, NULL),
(9969, 6054, 31, NULL, NULL, NULL),
(9970, 6054, 17, NULL, NULL, NULL),
(9971, 6055, 31, NULL, NULL, NULL),
(9972, 6055, 17, NULL, NULL, NULL),
(9973, 6056, 31, NULL, NULL, NULL),
(9974, 6056, 17, NULL, NULL, NULL),
(9975, 6057, 31, NULL, NULL, NULL),
(9976, 6057, 17, NULL, NULL, NULL),
(9977, 6058, 31, NULL, NULL, NULL),
(9978, 6058, 17, NULL, NULL, NULL),
(9979, 6059, 31, NULL, NULL, NULL),
(9980, 6059, 17, NULL, NULL, NULL),
(9981, 6060, 31, NULL, NULL, NULL),
(9982, 6060, 17, NULL, NULL, NULL),
(9983, 6061, 31, NULL, NULL, NULL),
(9984, 6061, 17, NULL, NULL, NULL),
(9985, 6062, 31, NULL, NULL, NULL),
(9986, 6062, 17, NULL, NULL, NULL),
(9987, 6063, 31, NULL, NULL, NULL),
(9988, 6063, 17, NULL, NULL, NULL),
(9989, 6064, 31, NULL, NULL, NULL),
(9990, 6064, 17, NULL, NULL, NULL),
(9991, 6065, 31, NULL, NULL, NULL),
(9992, 6065, 17, NULL, NULL, NULL),
(9993, 6066, 31, NULL, NULL, NULL),
(9994, 6066, 17, NULL, NULL, NULL),
(9995, 6067, 31, NULL, NULL, NULL),
(9996, 6067, 17, NULL, NULL, NULL),
(9997, 6068, 31, NULL, NULL, NULL),
(9998, 6068, 17, NULL, NULL, NULL),
(9999, 6069, 31, NULL, NULL, NULL),
(10000, 6069, 17, NULL, NULL, NULL),
(10001, 6070, 31, NULL, NULL, NULL),
(10002, 6070, 17, NULL, NULL, NULL),
(10003, 6071, 31, NULL, NULL, NULL),
(10004, 6071, 17, NULL, NULL, NULL),
(10005, 6072, 31, NULL, NULL, NULL),
(10006, 6072, 17, NULL, NULL, NULL),
(10007, 6073, 31, NULL, NULL, NULL),
(10008, 6073, 17, NULL, NULL, NULL),
(10009, 6074, 31, NULL, NULL, NULL),
(10010, 6074, 17, NULL, NULL, NULL),
(10011, 6075, 31, NULL, NULL, NULL),
(10012, 6075, 17, NULL, NULL, NULL),
(10013, 6076, 31, NULL, NULL, NULL),
(10014, 6076, 17, NULL, NULL, NULL),
(10015, 6077, 31, NULL, NULL, NULL),
(10016, 6077, 17, NULL, NULL, NULL),
(10017, 6078, 31, NULL, NULL, NULL),
(10018, 6078, 17, NULL, NULL, NULL),
(10019, 6079, 31, NULL, NULL, NULL),
(10020, 6079, 17, NULL, NULL, NULL),
(10021, 6080, 31, NULL, NULL, NULL),
(10022, 6080, 17, NULL, NULL, NULL),
(10023, 6081, 31, NULL, NULL, NULL),
(10024, 6081, 17, NULL, NULL, NULL),
(10025, 6082, 31, NULL, NULL, NULL),
(10026, 6082, 17, NULL, NULL, NULL),
(10027, 6083, 31, NULL, NULL, NULL),
(10028, 6083, 17, NULL, NULL, NULL),
(10029, 6084, 31, NULL, NULL, NULL),
(10030, 6084, 17, NULL, NULL, NULL),
(10031, 6085, 31, NULL, NULL, NULL),
(10032, 6085, 17, NULL, NULL, NULL),
(10033, 6086, 31, NULL, NULL, NULL),
(10034, 6086, 17, NULL, NULL, NULL),
(10035, 6087, 31, NULL, NULL, NULL),
(10036, 6087, 17, NULL, NULL, NULL),
(10037, 6088, 31, NULL, NULL, NULL),
(10038, 6088, 17, NULL, NULL, NULL),
(10039, 6089, 31, NULL, NULL, NULL),
(10040, 6089, 17, NULL, NULL, NULL),
(10041, 6090, 31, NULL, NULL, NULL),
(10042, 6090, 17, NULL, NULL, NULL),
(10043, 6091, 31, NULL, NULL, NULL),
(10044, 6091, 17, NULL, NULL, NULL),
(10045, 6092, 31, NULL, NULL, NULL),
(10046, 6092, 17, NULL, NULL, NULL),
(10047, 6093, 31, NULL, NULL, NULL),
(10048, 6093, 17, NULL, NULL, NULL),
(10049, 6094, 31, NULL, NULL, NULL),
(10050, 6094, 17, NULL, NULL, NULL),
(10051, 6095, 31, NULL, NULL, NULL),
(10052, 6095, 17, NULL, NULL, NULL),
(10053, 6096, 31, NULL, NULL, NULL),
(10054, 6096, 17, NULL, NULL, NULL),
(10055, 6097, 31, NULL, NULL, NULL),
(10056, 6097, 17, NULL, NULL, NULL),
(10057, 6098, 31, NULL, NULL, NULL),
(10058, 6098, 17, NULL, NULL, NULL),
(10059, 6099, 31, NULL, NULL, NULL),
(10060, 6099, 17, NULL, NULL, NULL),
(10061, 6100, 31, NULL, NULL, NULL),
(10062, 6100, 17, NULL, NULL, NULL),
(10063, 6101, 31, NULL, NULL, NULL),
(10064, 6101, 17, NULL, NULL, NULL),
(10065, 6102, 31, NULL, NULL, NULL),
(10066, 6102, 17, NULL, NULL, NULL),
(10067, 6103, 31, NULL, NULL, NULL),
(10068, 6103, 17, NULL, NULL, NULL),
(10069, 6104, 31, NULL, NULL, NULL),
(10070, 6104, 17, NULL, NULL, NULL),
(10071, 6105, 31, NULL, NULL, NULL),
(10072, 6105, 17, NULL, NULL, NULL),
(10073, 6106, 31, NULL, NULL, NULL),
(10074, 6106, 17, NULL, NULL, NULL),
(10075, 6107, 31, NULL, NULL, NULL),
(10076, 6107, 17, NULL, NULL, NULL),
(10077, 6108, 31, NULL, NULL, NULL),
(10078, 6108, 17, NULL, NULL, NULL),
(10079, 6109, 31, NULL, NULL, NULL),
(10080, 6109, 17, NULL, NULL, NULL),
(10081, 6110, 31, NULL, NULL, NULL),
(10082, 6110, 17, NULL, NULL, NULL),
(10083, 6111, 31, NULL, NULL, NULL),
(10084, 6111, 17, NULL, NULL, NULL),
(10085, 6112, 31, NULL, NULL, NULL),
(10086, 6112, 17, NULL, NULL, NULL),
(10087, 6113, 31, NULL, NULL, NULL),
(10088, 6113, 17, NULL, NULL, NULL),
(10089, 6114, 31, NULL, NULL, NULL),
(10090, 6114, 17, NULL, NULL, NULL),
(10091, 6115, 31, NULL, NULL, NULL),
(10092, 6115, 17, NULL, NULL, NULL),
(10093, 6116, 31, NULL, NULL, NULL),
(10094, 6116, 17, NULL, NULL, NULL),
(10095, 6117, 31, NULL, NULL, NULL),
(10096, 6117, 17, NULL, NULL, NULL),
(10097, 6118, 31, NULL, NULL, NULL),
(10098, 6118, 17, NULL, NULL, NULL),
(10099, 6119, 31, NULL, NULL, NULL),
(10100, 6119, 17, NULL, NULL, NULL),
(10101, 6120, 31, NULL, NULL, NULL),
(10102, 6120, 17, NULL, NULL, NULL),
(10103, 6121, 31, NULL, NULL, NULL),
(10104, 6121, 17, NULL, NULL, NULL),
(10105, 6122, 31, NULL, NULL, NULL),
(10106, 6122, 17, NULL, NULL, NULL),
(10107, 6123, 31, NULL, NULL, NULL),
(10108, 6123, 17, NULL, NULL, NULL),
(10109, 6124, 31, NULL, NULL, NULL),
(10110, 6124, 17, NULL, NULL, NULL),
(10111, 6125, 31, NULL, NULL, NULL),
(10112, 6125, 17, NULL, NULL, NULL),
(10113, 6126, 31, NULL, NULL, NULL),
(10114, 6126, 17, NULL, NULL, NULL),
(10115, 6127, 31, NULL, NULL, NULL),
(10116, 6127, 17, NULL, NULL, NULL),
(10117, 6128, 31, NULL, NULL, NULL),
(10118, 6128, 17, NULL, NULL, NULL),
(10119, 6129, 31, NULL, NULL, NULL),
(10120, 6129, 17, NULL, NULL, NULL),
(10121, 6130, 31, NULL, NULL, NULL),
(10122, 6130, 17, NULL, NULL, NULL),
(10123, 6131, 31, NULL, NULL, NULL),
(10124, 6131, 17, NULL, NULL, NULL),
(10125, 6132, 31, NULL, NULL, NULL),
(10126, 6132, 17, NULL, NULL, NULL),
(10127, 6133, 31, NULL, NULL, NULL),
(10128, 6133, 17, NULL, NULL, NULL),
(10129, 6134, 31, NULL, NULL, NULL),
(10130, 6134, 17, NULL, NULL, NULL),
(10131, 6135, 31, NULL, NULL, NULL),
(10132, 6135, 17, NULL, NULL, NULL),
(10133, 6136, 31, NULL, NULL, NULL),
(10134, 6136, 17, NULL, NULL, NULL),
(10137, 6138, 31, NULL, NULL, NULL),
(10138, 6138, 17, NULL, NULL, NULL),
(10139, 6139, 31, NULL, NULL, NULL),
(10140, 6139, 17, NULL, NULL, NULL),
(10141, 6140, 31, NULL, NULL, NULL),
(10142, 6140, 17, NULL, NULL, NULL),
(10143, 6141, 31, NULL, NULL, NULL),
(10144, 6141, 17, NULL, NULL, NULL),
(10145, 6142, 31, NULL, NULL, NULL),
(10146, 6142, 17, NULL, NULL, NULL),
(10147, 6143, 31, NULL, NULL, NULL),
(10148, 6143, 17, NULL, NULL, NULL),
(10149, 6144, 31, NULL, NULL, NULL),
(10150, 6144, 17, NULL, NULL, NULL),
(10151, 6145, 31, NULL, NULL, NULL),
(10152, 6145, 17, NULL, NULL, NULL),
(10153, 6146, 31, NULL, NULL, NULL),
(10154, 6146, 17, NULL, NULL, NULL),
(10155, 6147, 31, NULL, NULL, NULL),
(10156, 6147, 17, NULL, NULL, NULL),
(10157, 6148, 31, NULL, NULL, NULL),
(10158, 6148, 17, NULL, NULL, NULL),
(10159, 6149, 31, NULL, NULL, NULL),
(10160, 6149, 17, NULL, NULL, NULL),
(10161, 6150, 31, NULL, NULL, NULL),
(10162, 6150, 17, NULL, NULL, NULL),
(10163, 6151, 31, NULL, NULL, NULL),
(10164, 6151, 17, NULL, NULL, NULL),
(10165, 6152, 31, NULL, NULL, NULL),
(10166, 6152, 17, NULL, NULL, NULL),
(10167, 6153, 31, NULL, NULL, NULL),
(10168, 6153, 17, NULL, NULL, NULL),
(10169, 6154, 31, NULL, NULL, NULL),
(10170, 6154, 17, NULL, NULL, NULL),
(10171, 6155, 31, NULL, NULL, NULL),
(10172, 6155, 17, NULL, NULL, NULL),
(10173, 6156, 31, NULL, NULL, NULL),
(10174, 6156, 17, NULL, NULL, NULL),
(10175, 6157, 31, NULL, NULL, NULL),
(10176, 6157, 17, NULL, NULL, NULL),
(10177, 6158, 31, NULL, NULL, NULL),
(10178, 6158, 17, NULL, NULL, NULL),
(10179, 6159, 31, NULL, NULL, NULL),
(10180, 6159, 17, NULL, NULL, NULL),
(10181, 6160, 31, NULL, NULL, NULL),
(10182, 6160, 17, NULL, NULL, NULL),
(10183, 6161, 31, NULL, NULL, NULL),
(10184, 6161, 17, NULL, NULL, NULL),
(10185, 6162, 31, NULL, NULL, NULL),
(10186, 6162, 17, NULL, NULL, NULL),
(10187, 6163, 31, NULL, NULL, NULL),
(10188, 6163, 17, NULL, NULL, NULL),
(10189, 6164, 31, NULL, NULL, NULL),
(10190, 6164, 17, NULL, NULL, NULL),
(10191, 6165, 31, NULL, NULL, NULL),
(10192, 6165, 17, NULL, NULL, NULL),
(10193, 6166, 31, NULL, NULL, NULL),
(10194, 6166, 17, NULL, NULL, NULL),
(10195, 6167, 31, NULL, NULL, NULL),
(10196, 6167, 17, NULL, NULL, NULL),
(10197, 6168, 31, NULL, NULL, NULL),
(10198, 6168, 17, NULL, NULL, NULL),
(10199, 5293, 19, '10', NULL, NULL),
(10200, 5293, 27, '11', NULL, NULL),
(10201, 6169, 31, NULL, NULL, NULL),
(10202, 6169, 17, NULL, NULL, NULL),
(10203, 6170, 31, NULL, NULL, NULL),
(10204, 6170, 17, NULL, NULL, NULL),
(10205, 6171, 31, NULL, NULL, NULL),
(10206, 6171, 17, NULL, NULL, NULL),
(10207, 6172, 31, NULL, NULL, NULL),
(10208, 6172, 17, NULL, NULL, NULL),
(10209, 6173, 31, NULL, NULL, NULL),
(10210, 6173, 17, NULL, NULL, NULL),
(10211, 6174, 31, NULL, NULL, NULL),
(10212, 6174, 17, NULL, NULL, NULL),
(10213, 6175, 31, NULL, NULL, NULL),
(10214, 6175, 17, NULL, NULL, NULL),
(10215, 6176, 31, NULL, NULL, NULL),
(10216, 6176, 17, NULL, NULL, NULL),
(10217, 6177, 31, NULL, NULL, NULL),
(10218, 6177, 17, NULL, NULL, NULL),
(10219, 6178, 31, NULL, NULL, NULL),
(10220, 6178, 17, NULL, NULL, NULL),
(10221, 6179, 31, NULL, NULL, NULL),
(10222, 6179, 17, NULL, NULL, NULL),
(10223, 6180, 31, NULL, NULL, NULL),
(10224, 6180, 17, NULL, NULL, NULL),
(10225, 6181, 31, NULL, NULL, NULL),
(10226, 6181, 17, NULL, NULL, NULL),
(10227, 6182, 31, NULL, NULL, NULL),
(10228, 6182, 17, NULL, NULL, NULL),
(10229, 6183, 31, NULL, NULL, NULL),
(10230, 6183, 17, NULL, NULL, NULL),
(10231, 6184, 31, NULL, NULL, NULL),
(10232, 6184, 17, NULL, NULL, NULL),
(10233, 6185, 17, '120', NULL, NULL),
(10234, 6186, 31, NULL, NULL, NULL),
(10235, 6187, 31, NULL, NULL, NULL),
(10236, 6188, 31, NULL, NULL, NULL),
(10237, 6189, 31, NULL, NULL, NULL),
(10238, 6190, 31, NULL, NULL, NULL),
(10239, 6191, 31, NULL, NULL, NULL),
(10240, 6192, 31, NULL, NULL, NULL),
(10241, 6193, 31, NULL, NULL, NULL),
(10242, 6194, 31, NULL, NULL, NULL),
(10243, 6195, 31, NULL, NULL, NULL),
(10244, 6196, 31, NULL, NULL, NULL),
(10245, 6197, 31, NULL, NULL, NULL),
(10246, 6198, 31, NULL, NULL, NULL),
(10247, 6199, 31, NULL, NULL, NULL),
(10248, 6200, 31, NULL, NULL, NULL),
(10249, 6201, 31, NULL, NULL, NULL),
(10250, 6202, 31, NULL, NULL, NULL),
(10251, 6203, 31, NULL, NULL, NULL),
(10252, 6204, 31, NULL, NULL, NULL),
(10253, 6205, 31, NULL, NULL, NULL),
(10254, 6206, 31, NULL, NULL, NULL),
(10255, 6207, 31, NULL, NULL, NULL),
(10256, 6208, 31, NULL, NULL, NULL),
(10257, 6209, 31, NULL, NULL, NULL),
(10258, 6210, 31, NULL, NULL, NULL),
(10259, 6211, 31, NULL, NULL, NULL),
(10260, 6212, 31, NULL, NULL, NULL),
(10261, 6213, 31, NULL, NULL, NULL),
(10262, 6214, 31, NULL, NULL, NULL),
(10263, 6215, 31, NULL, NULL, NULL),
(10264, 6216, 31, NULL, NULL, NULL),
(10265, 6217, 31, NULL, NULL, NULL),
(10266, 6218, 31, NULL, NULL, NULL),
(10267, 6219, 31, NULL, NULL, NULL),
(10268, 6220, 31, NULL, NULL, NULL),
(10269, 6221, 31, NULL, NULL, NULL),
(10270, 6222, 31, NULL, NULL, NULL),
(10271, 6223, 31, NULL, NULL, NULL),
(10272, 6224, 31, NULL, NULL, NULL),
(10273, 6225, 31, NULL, NULL, NULL),
(10274, 6226, 31, NULL, NULL, NULL),
(10316, 6268, 31, NULL, NULL, NULL),
(10317, 6269, 31, NULL, NULL, NULL),
(10318, 6270, 31, NULL, NULL, NULL),
(10319, 6271, 31, NULL, NULL, NULL),
(10320, 6272, 31, NULL, NULL, NULL),
(10321, 6273, 31, NULL, NULL, NULL),
(10322, 6274, 31, NULL, NULL, NULL),
(10323, 6275, 31, NULL, NULL, NULL),
(10324, 6276, 31, NULL, NULL, NULL),
(10325, 6277, 31, NULL, NULL, NULL),
(10326, 6278, 31, NULL, NULL, NULL),
(10327, 6279, 31, NULL, NULL, NULL),
(10328, 6280, 31, NULL, NULL, NULL),
(10329, 6281, 31, NULL, NULL, NULL),
(10330, 6282, 31, NULL, NULL, NULL),
(10331, 6283, 31, NULL, NULL, NULL),
(10332, 6284, 31, NULL, NULL, NULL),
(10333, 6285, 31, NULL, NULL, NULL),
(10334, 6286, 31, NULL, NULL, NULL),
(10335, 6287, 31, NULL, NULL, NULL),
(10336, 6288, 31, NULL, NULL, NULL),
(10337, 6289, 31, NULL, NULL, NULL),
(10338, 6290, 31, NULL, NULL, NULL),
(10339, 6291, 31, NULL, NULL, NULL),
(10340, 6292, 31, NULL, NULL, NULL),
(10341, 6293, 31, NULL, NULL, NULL),
(10342, 6294, 31, NULL, NULL, NULL),
(10343, 6295, 31, NULL, NULL, NULL),
(10344, 6296, 31, NULL, NULL, NULL),
(10345, 6297, 31, NULL, NULL, NULL),
(10346, 6298, 31, NULL, NULL, NULL),
(10347, 6299, 31, NULL, NULL, NULL),
(10348, 6300, 31, NULL, NULL, NULL),
(10349, 6301, 31, NULL, NULL, NULL),
(10350, 6302, 31, NULL, NULL, NULL),
(10351, 6303, 31, NULL, NULL, NULL),
(10352, 6304, 31, NULL, NULL, NULL),
(10353, 6305, 31, NULL, NULL, NULL),
(10354, 6306, 31, NULL, NULL, NULL),
(10355, 6307, 31, NULL, NULL, NULL),
(10356, 6308, 31, NULL, NULL, NULL),
(10357, 6309, 31, NULL, NULL, NULL),
(10386, 6338, 31, NULL, NULL, NULL),
(10387, 6339, 31, NULL, NULL, NULL),
(10388, 6340, 31, NULL, NULL, NULL),
(10389, 6341, 31, NULL, NULL, NULL),
(10390, 6342, 31, NULL, NULL, NULL),
(10391, 6343, 31, NULL, NULL, NULL),
(10392, 6344, 31, NULL, NULL, NULL),
(10393, 6345, 31, NULL, NULL, NULL),
(10394, 6346, 31, NULL, NULL, NULL),
(10395, 6347, 31, NULL, NULL, NULL),
(10396, 6348, 31, NULL, NULL, NULL),
(10397, 6349, 31, NULL, NULL, NULL),
(10398, 6350, 31, NULL, NULL, NULL),
(10399, 6351, 31, NULL, NULL, NULL),
(10400, 6352, 31, NULL, NULL, NULL),
(10401, 6353, 31, NULL, NULL, NULL),
(10402, 6354, 31, NULL, NULL, NULL),
(10403, 6355, 31, NULL, NULL, NULL),
(10404, 6356, 31, NULL, NULL, NULL),
(10405, 6357, 31, NULL, NULL, NULL),
(10406, 6358, 31, NULL, NULL, NULL),
(10407, 6359, 31, NULL, NULL, NULL),
(10408, 6360, 31, NULL, NULL, NULL),
(10409, 6361, 31, NULL, NULL, NULL),
(10410, 6362, 31, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci,
  `desc_en` text COLLATE utf8mb4_unicode_ci,
  `short_desc_en` text COLLATE utf8mb4_unicode_ci,
  `short_desc_ar` text COLLATE utf8mb4_unicode_ci,
  `product_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_price1` double(8,2) NOT NULL DEFAULT '0.00',
  `product_price2` double(8,2) NOT NULL DEFAULT '0.00',
  `product_price3` double(8,2) NOT NULL DEFAULT '0.00',
  `product_price4` double(8,2) NOT NULL DEFAULT '0.00',
  `product_quantity` int(11) DEFAULT NULL,
  `length` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci,
  `details_en` text COLLATE utf8mb4_unicode_ci,
  `viewed_levels` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1_2_3_4_5',
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yt_video` text COLLATE utf8mb4_unicode_ci,
  `sort` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `parent_id`, `brand_id`, `product_code`, `status`, `type`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `short_desc_en`, `short_desc_ar`, `product_photo`, `product_price`, `product_price1`, `product_price2`, `product_price3`, `product_price4`, `product_quantity`, `length`, `width`, `height`, `length_class`, `weight`, `weight_class`, `created_at`, `updated_at`, `details_ar`, `details_en`, `viewed_levels`, `video`, `yt_video`, `sort`) VALUES
(5293, 126, 71, '855821005723', 1, 'simple', 'ماكينة حجم كبير', 'Starter Kit', '<p>&nbsp;&nbsp;<img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162566622432731.png\" style=\"height:95px; width:300px\" /></p>\n\n<p>&nbsp;</p>\n\n<p>هو نظام لحماية الشاشة و الجهاز لجعل الجهاز اكثر قوة وحماية وذلك عبر الماكينة المختصة بقص الغلاف الحراري على حسب الجهاز المراد تغليفه حراريًا بالكامل ابتداءً من الإصدارات القديمة الى الحديثة.</p>\n\n<p>&nbsp; &nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566649472461.png\" style=\"height:162px; width:300px\" /></p>\n\n<p>&nbsp;</p>\n\n<p>يوجد نوعين من التغليف الحراري : <strong>(&nbsp;ULTRA |&nbsp; MATTE ) :</strong></p>\n\n<p>ومن مميزات التغليف الحراري من شركة بروتكشن برو :&nbsp;</p>\n\n<p>&nbsp; &nbsp;&nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566740369941.png\" style=\"height:300px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp;&nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566785232231.png\" style=\"height:373px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162566840036431.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp;<img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162566855572871.png\" style=\"height:424px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566866136281.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566886081151.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566895634391.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566934211581.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp;<img src=\"https://mrkzgulfup.com/uploads/1625669463951.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566961000111.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566976350391.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"https://youtu.be/Avgl6Q1TG6w\" /><a href=\"https://www.youtube.com/watch?v=Avgl6Q1TG6w\" target=\"_blank\"><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567092002471.png\" style=\"height:143px; width:300px\" /></a></p>', '<p><span style=\"font-size:16px\">A large-sized machine for large projects that thermally wraps devices (iPads, mobile phones, watches, Air Pods, cameras, Playstations, Chinese mobiles, Apple TV, drones, Chinese tablets, laptops).</span></p>', 'big project machine,', 'وداعًا للمخزون المتراكم.', '1625493051855821005723.jpg', 100, 0.00, 100.00, 100.00, 100.00, 3456512, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 16:30:55', '2022-03-15 19:51:55', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(5294, 126, 71, '855821005730', 1, 'simple', 'ماكينة بروتكشن برو ( حجم وسط )', 'Express Starter Kit ( Protection Pro)', '<p>&nbsp; &nbsp; &nbsp;<img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162566622432731.png\" style=\"height:95px; width:300px\" /></p>\n\n<p>&nbsp;</p>\n\n<p>هو نظام لحماية الشاشة و الجهاز لجعل الجهاز اكثر قوة وحماية وذلك عبر الماكينة المختصة بقص الغلاف الحراري على حسب الجهاز المراد تغليفه حراريًا بالكامل ابتداءً من الإصدارات القديمة الى الحديثة.</p>\n\n<p>&nbsp; &nbsp; &nbsp;&nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566649472461.png\" style=\"height:162px; width:300px\" /></p>\n\n<p>&nbsp;</p>\n\n<p>يوجد نوعين من التغليف الحراري : <strong>(&nbsp;ULTRA |&nbsp; MATTE ) :</strong></p>\n\n<p>ومن مميزات التغليف الحراري من شركة بروتكشن برو :&nbsp;</p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566740369941.png\" style=\"height:300px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566785232231.png\" style=\"height:373px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162566840036431.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162566855572871.png\" style=\"height:424px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp; &nbsp;&nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566866136281.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566886081151.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp; &nbsp;&nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566895634391.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp; &nbsp;&nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566934211581.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp; &nbsp;&nbsp;<img src=\"https://mrkzgulfup.com/uploads/1625669463951.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp; &nbsp;&nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566961000111.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp; &nbsp;&nbsp;<img src=\"https://mrkzgulfup.com/uploads/162566976350391.png\" style=\"height:399px; width:300px\" /></p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp;<img alt=\"\" src=\"https://youtu.be/Avgl6Q1TG6w\" /><a href=\"https://www.youtube.com/watch?v=Avgl6Q1TG6w\" target=\"_blank\"><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567092002471.png\" style=\"height:143px; width:300px\" /></a></p>', '<p><span style=\"font-size:18px\">Machine size medium For medium projects the devices are thermally encapsulated (IPad, Mobile Phones, Watches, AirBuds, Cameras, Playstation, Chinese Phones, Apple TV, Dron Aircraft, Chinese Tablets)</span></p>', 'Machine size medium For medium projects the devices are thermally encapsulated', 'ماكينة حجم وسط للمشاريع المتوسطة تغلف الأجهزة حرارياً.', '1625493221855821005730.jpg', 5333.33, 0.00, 5333.33, 5333.33, 5333.33, 306, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 16:30:55', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(5295, 127, 71, '856076007005', 1, 'simple', 'تغليف حراري للساعات (شفاف) بروتكشن برو', 'Ultra Film Extra Small Blank (Clear) Protection Pro', '<p><strong><span style=\"font-size:16px\">تغليف حراري شفاف للاجهزة الصغيرة&nbsp; مثل :</span></strong></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">الساعات الذكية والأساور.</span></li>\n	<li><span style=\"font-size:16px\">السماعات الايربودز.</span></li>\n	<li><span style=\"font-size:16px\">شاشات الكاميرات الاحترافية.</span></li>\n</ul>\n\n<p><span style=\"font-size:16px\">___</span></p>\n\n<p><strong><span style=\"font-size:16px\">التغليف الحراري من شركة بروتكشن برو من مميزات التغليف :&nbsp;</span></strong></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">مقاوم للصدمات.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للخدوش.</span></li>\n	<li><span style=\"font-size:16px\">مرن مع الاطراف.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">عالي الوضوح.</span></li>\n	<li><span style=\"font-size:16px\">سُمكه اقل من 0.02 مم.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">منتجات شركة بروتكشن برو معتمده من قبل وكالة ناسا الامريكية .</span></li>\n</ul>', '<p>Transparent thermal packaging for small appliances such as:</p>\n\n<p>Smart watches and bracelets.<br />\nAirPods headphones.<br />\nProfessional camera monitors.<br />\n___</p>\n\n<p>Thermal packaging from Protection Pro Company of packaging features:</p>\n\n<p>Shock resistant.<br />\nScratch resistant.<br />\nFlexible with sides.<br />\nhigh-definition.<br />\nIts thickness is less than 0.02 mm.<br />\nProtection Pro products are certified by NASA.</p>', 'Thermal packaging for small appliances.', 'تغليف حراري للاجهزة الصغيرة.', '1625496738تغليف حراري-01.jpg', 60, 0.00, 30.00, 36.00, 36.00, 31, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 16:30:55', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(5296, 127, 71, '856076007012', 1, 'simple', 'تغليف حراري للجوالات (شفاف) بروتكشن برو', 'Ultra Film Small Blank 4.5X7.5Blank', '<p><strong>تغليف حراري شفاف للاجهزة مثل :</strong></p>\n\n<ul>\n	<li>الهواتف الذكية مثل الايفون والسامسونج والالأف من الاجهزة الذكية.</li>\n	<li>تغليف الايفون بالكامل.</li>\n</ul>\n\n<p><strong>التغليف الحراري من شركة بروتكشن برو من مميزات التغليف :&nbsp;</strong></p>\n\n<ul>\n	<li>مقاوم للصدمات.&nbsp;</li>\n	<li>مقاوم للخدوش.</li>\n	<li>مرن مع الاطراف.&nbsp;</li>\n	<li>عالي الوضوح.</li>\n	<li>سُمكه اقل من 0.02 مم.&nbsp;</li>\n	<li>منتجات شركة بروتكشن برو معتمده من قبل وكالة ناسا الامريكية .</li>\n</ul>', '<p>Transparent thermal packaging for devices such as:</p>\n\n<p>Smart phones such as the iPhone and Samsung and thousands of smart devices.<br />\nCompletely wrap the iPhone.<br />\nThermal packaging from Protection Pro Company of packaging features:</p>\n\n<p>Shock resistant.<br />\nScratch resistant.<br />\nFlexible with sides.<br />\nhigh-definition.<br />\nIts thickness is less than 0.02 mm.<br />\nProtection Pro products are certified by NASA.</p>', 'Thermal packaging for smartphones.', 'تغليف حراري للهواتف الذكية.', '1625498025تغليف حراري-02.jpg', 86.09, 0.00, 37.50, 45.00, 45.00, 5040, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 16:30:55', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(5297, 127, 71, '850005443544', 1, 'simple', 'تغليف حراري للجوالات (مطفي) بروتكشن برو', 'Ultra Matte Film Small 4.5X7.5Blank', '<p><strong>تغليف حراري شفاف مطفي&nbsp;للاجهزة مثل :</strong></p>\n\n<ul>\n	<li>الهواتف الذكية مثل الايفون والسامسونج و الآلاف&nbsp;من الاجهزة الذكية.</li>\n	<li>تغليف الايفون بالكامل.</li>\n</ul>\n\n<p><strong>التغليف الحراري من شركة بروتكشن برو من مميزات التغليف :&nbsp;</strong></p>\n\n<ul>\n	<li>مقاوم للصدمات.&nbsp;</li>\n	<li>مقاوم للبصمة لايترك آثر البصمات&nbsp;على الجهاز.</li>\n	<li>مقاوم للخدوش.</li>\n	<li>مرن مع الاطراف.&nbsp;</li>\n	<li>عالي الوضوح.</li>\n	<li>سُمكه اقل من 0.02 مم.&nbsp;</li>\n	<li>منتجات شركة بروتكشن برو معتمده من قبل وكالة ناسا الامريكية .</li>\n</ul>', '<p>Matte transparent thermal packaging for devices such as:</p>\n\n<p>Smartphones such as iPhone, Samsung and thousands of smart devices.<br />\nCompletely wrap the iPhone.<br />\nThermal packaging from Protection Pro Company of packaging features:</p>\n\n<p>Shock resistant.<br />\nAnti-fingerprint does not leave fingerprints on the device.<br />\nScratch resistant.<br />\nFlexible with sides.<br />\nhigh-definition.<br />\nIts thickness is less than 0.02 mm.<br />\nProtection Pro products are certified by NASA.</p>', 'Thermal packaging for smartphones', 'تغليف حراري للهواتف الذكية', '1625498775تغليف حراري-03.jpg', 86.09, 0.00, 37.50, 45.00, 45.00, 17938, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 16:30:55', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(5711, 127, 71, '856076007029', 1, 'simple', 'تغليف حراري للتابات (شفاف) بروتكشن برو', 'Ultra  Film Medium  7X10Blank', '<p><strong>تغليف حراري شفاف للاجهزة مثل :</strong></p>\n\n<ul>\n	<li>تابلت (الاجهزة اللوحية 7 انش ) ، ( طائرة الدرون ) ، ( ابل تي في ) والعديد من الاجهزة .&nbsp;</li>\n</ul>\n\n<p><strong>التغليف الحراري من شركة بروتكشن برو من مميزات التغليف :&nbsp;</strong></p>\n\n<ul>\n	<li>مقاوم للصدمات.&nbsp;</li>\n	<li>مقاوم للخدوش.</li>\n	<li>مرن مع الاطراف.&nbsp;</li>\n	<li>عالي الوضوح.</li>\n	<li>سُمكه اقل من 0.02 مم.&nbsp;</li>\n	<li>منتجات شركة بروتكشن برو معتمده من قبل وكالة ناسا الامريكية .</li>\n</ul>', '<p>Transparent thermal packaging for devices such as:</p>\n\n<p>Tablets (7 inch tablets), (drones), (Apple TV) and many more devices.<br />\nThermal packaging from Protection Pro Company of packaging features:</p>\n\n<p>Shock resistant.<br />\nScratch resistant.<br />\nFlexible with sides.<br />\nhigh-definition.<br />\nIts thickness is less than 0.02 mm.<br />\nProtection Pro products are certified by NASA.</p>', 'Thermal packaging for medium-sized devices', 'تغليف حراري للاجهزة حجم المتوسط', '16293080400123.jpg', 103.48, 0.00, 74.00, 80.00, 80.00, 19, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 18:51:00', '2021-08-18 18:34:01', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6002, 127, 71, '856076007036', 1, 'simple', 'تغليف حراري للآيبادات (شفاف) بروتكشن برو', 'Ultra  Film Large 8.5X12.5Blank', NULL, NULL, NULL, NULL, '1625502038تغليف حراري-05.jpg', 139, 0.00, 86.00, 94.00, 94.00, 1846, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6003, 127, 71, '857325008231', 1, 'simple', 'تغليف حراري للجوالات اومني (Omni) شفاف بروتكشن برو', 'Omni Film Clear Small 4.5 X 7.5 Blank', '<p><strong>تغليف حراري شفاف <span style=\"color:#e74c3c\">اومني</span> الاقتصادي&nbsp; للاجهزة مثل :</strong></p>\n\n<ul>\n	<li>الهواتف الذكية مثل الايفون والسامسونج والآلاف&nbsp;من الاجهزة الذكية.</li>\n	<li>تغليف الايفون بالكامل.</li>\n</ul>\n\n<p><strong>التغليف الحراري من شركة بروتكشن برو من مميزات التغليف :&nbsp;</strong></p>\n\n<ul>\n	<li>مقاوم للصدمات.&nbsp;</li>\n	<li>مقاوم للخدوش.</li>\n	<li>مرن مع الاطراف.&nbsp;</li>\n	<li>عالي الوضوح.</li>\n	<li>سُمكه اقل من 0.02 مم.&nbsp;</li>\n</ul>', '<p dir=\"ltr\">Economic transparent <strong><span style=\"color:#e74c3c\">omni </span></strong>thermal packaging for devices such as:</p>\n\n<p dir=\"ltr\">Smart phones such as the iPhone and Samsung and thousands of smart devices.<br />\nCompletely wrap the iPhone.<br />\nThermal packaging from Protection Pro Company of packaging features:</p>\n\n<p dir=\"ltr\">Shock resistant.<br />\nScratch resistant.<br />\nFlexible with sides.<br />\nhigh-definition.<br />\nIts thickness is less than 0.02 mm.</p>', 'Economical thermal packaging.', 'تغليف حراري اقتصادي .', '1625503435تغليف حراري-07.jpg', 49, 0.00, 23.00, 25.00, 32.00, 35942, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6004, 128, 71, '850017782662', 1, 'simple', 'خريطة لحجم ماكينة وسط', 'Cutting Mat (small-Express)3.0', NULL, NULL, 'Thermal packaging is installed on the map to cut the packaging through the machine for the appropriate packaging for each device.', 'يثبت التغليف الحراري على الخريطة لقص التغليف عبر المكاينة لتغليف المناسب لكل جهاز .', '1625504094850017782662.jpg', 108.75, 0.00, 108.75, 108.75, 108.75, 350, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6005, 128, 71, '855821005174', 1, 'simple', 'جل سائل', 'in-stoer Istall Gel 5oz', NULL, NULL, 'Gel transparent gel to install the cover on the devices. Strong stability and does not leave a trace', 'جل شفاف هلامي للتثبيت الغلاف على الاجهزة .ثبات قوي ولايترك اثر .', '1625507294855821005174.jpg', 30, 0.00, 30.00, 30.00, 30.00, 906, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6006, 128, 71, '856076007586', 1, 'simple', 'Pixscan Mat English', 'Pixscan Mat English', NULL, NULL, NULL, NULL, '1625509605856076007586.jpg', 149, 0.00, 149.00, 149.00, 149.00, 43, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6007, 115, 73, '7946043889086', 1, 'simple', 'كيبل باوراولوقي لايتنينج - يو اس بي 1.2م اسود', 'Powerology Basic Lightning Cable (1.2M) Black', '<ul>\n	<li><span style=\"font-size:16px\">نقل البيانات و الشحن بسرعة فائقة الجودة.</span></li>\n	<li><span style=\"font-size:16px\">حماية إضافية للطبقة الخارجية لتحسين المتانة و تقليل تآكل الأطراف.</span></li>\n	<li><span style=\"font-size:16px\">معتمد من شركة ابل</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">High-quality data transfer and charging.<br />\nAdditional outer layer protection to improve durability and reduce tip wear.<br />\nCertified by Apple</span></p>', 'Transfer and charge your data at lightning speed', 'انقل و اشحن بياناتك بسرعة البرق.', '16255097437946043889086.jpg', 68.7, 0.00, 21.00, 23.00, 25.00, 1038, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-11-02 14:02:48', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6008, 115, 73, '7946043888928', 1, 'simple', 'كيبل باوراولوقي لايتنينج - يو اس بي 1.2م ابيض', 'Powerology Basic Lightning Cable (1.2M) White', '<ul>\n	<li><span style=\"font-size:16px\">نقل البيانات و الشحن بسرعة فائقة الجودة.</span></li>\n	<li><span style=\"font-size:16px\">حماية إضافية للطبقة الخارجية لتحسين المتانة و تقليل تآكل الأطراف.</span></li>\n	<li><span style=\"font-size:16px\">معتمد من شركة ابل</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">High-quality data transfer and charging.<br />\nAdditional outer layer protection to improve durability and reduce tip wear.<br />\nCertified by Apple</span></p>', 'Transfer and charge your data at lightning speed', 'انقل و اشحن بياناتك بسرعة البرق⚡.', '16255100577946043888928.jpg', 68.72, 0.00, 21.00, 23.00, 25.00, 1191, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-11-02 14:02:48', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6009, 115, 73, '7946043888782', 1, 'simple', 'كيبل باوراولوقي لايتنينج - يو اس بي 1.2م ازرق', 'Powerology Basic Lightning Cable (1.2M) Blue', '<ul>\n	<li><span style=\"font-size:16px\">نقل البيانات و الشحن بسرعة فائقة الجودة.</span></li>\n	<li><span style=\"font-size:16px\">حماية إضافية للطبقة الخارجية لتحسين المتانة و تقليل تآكل الأطراف.</span></li>\n	<li><span style=\"font-size:16px\">معتمد من شركة ابل</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">High-quality data transfer and charging.<br />\nAdditional outer layer protection to improve durability and reduce tip wear.<br />\nCertified by Apple</span></p>', 'Transfer and charge your data at lightning speed', 'انقل و اشحن بياناتك بسرعة البرق⚡.', '16255102167946043888782.jpg', 68.7, 0.00, 21.00, 23.00, 25.00, 519, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6010, 115, 73, '7946043888850', 1, 'simple', 'كيبل باوراولوقي لايتنينج - يو اس بي 1.2م احمر', 'Powerology Basic Lightning Cable (1.2M) Red', '<ul>\n	<li><span style=\"font-size:16px\">نقل البيانات و الشحن بسرعة فائقة الجودة.</span></li>\n	<li><span style=\"font-size:16px\">حماية إضافية للطبقة الخارجية لتحسين المتانة و تقليل تآكل الأطراف.</span></li>\n	<li><span style=\"font-size:16px\">معتمد من شركة ابل</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">High-quality data transfer and charging.<br />\nAdditional outer layer protection to improve durability and reduce tip wear.<br />\nCertified by Apple</span></p>', 'Transfer and charge your data at lightning speed', 'انقل و اشحن بياناتك بسرعة البرق⚡.', '16255103097946043888850.jpg', 68.71, 0.00, 21.00, 23.00, 25.00, 431, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6011, 115, 73, '7946043887006', 1, 'simple', 'كيبل باوراولوقي لايتنينج - تايب سي 1.2م اسود', 'Powerology PVC Type-C to Lightning Cable (1.2m/4ft) Black', '<ul>\n	<li>كيبل تايب سي تو لايتنينج .</li>\n	<li>بطول 1.2 متر&nbsp;</li>\n	<li>للشحن و نقل البيانات.</li>\n	<li>عند استخدام فيش (مقبس) بمدخل Pd تشحن جهازك من 0% الى 60 % خلال 30 دقيقة&nbsp;</li>\n	<li>معتمد من شركة ابل&nbsp;</li>\n	<li>شركة ( باوراولوقي ) الكندية&nbsp;</li>\n</ul>', '<p>Cable Type C2 Lightning.<br />\n1.2 meters long<br />\nFor charging and data transfer.<br />\nWhen you use a socket (socket) in the Pd port, your device will be charged from 0% to 60% within 30 minutes<br />\nCertified by Apple<br />\nCanadian company (Bowrawlogi)</p>', 'Cable Type C for charging and data transfer ⚡ .', 'كيبل تايب سي للشحن و نقل البيانات⚡ .', '16255106817946043887006.jpg', 42.61, 0.00, 35.00, 39.00, 42.00, 219, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6012, 115, 73, '7946043888546', 1, 'simple', 'كيبل باوراولوقي لايتنينج - يو اس بي 1.8م قماش', 'Powerology Nylon Braided Fast Charge Data Lightning Connector Cable (1.8m/6ft)', '<ul>\n	<li>بطول 1.8 متر&nbsp;</li>\n	<li>مغطى بالقماش مما يساعده على مقاومة&nbsp; القطع بالاطراف .&nbsp;</li>\n	<li>للشحن و نقل البيانات.</li>\n	<li>معتمد من شركة ابل&nbsp;</li>\n	<li>شركة ( باوراولوقي ) الكندي</li>\n</ul>', '<p dir=\"ltr\">1.8m long<br />\nCovered with fabric, which helps it to resist cutting edges.<br />\nFor charging and data transfer.<br />\nCertified by Apple<br />\nCanadian company (Powerology)</p>', 'Covered with a cut-resistant fabric.', 'مغطى بالقماش المقاوم للقطع .', '16255108557946043888546.jpg', 51.3, 0.00, 32.00, 38.00, 42.00, 4, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6013, 114, 73, '7946044826448', 1, 'simple', 'بطارية متنقله 10000ملي امبير باوراولوقي اسود بمنفذين', 'Powerology 10000mAh Premium Design Power Bank', '<p>بطارية متنقلة بسعة 10000 مللي امبير&nbsp;</p>\n\n<p>بمنفذ من نوع USB-C وتقنية PD التي تقدم الشحن السريع لجهازك الايفون</p>\n\n<p>ومنفذ من نوع USB-A بتقنية كوالكوم 3.0</p>', '<p dir=\"ltr\">Portable battery with a capacity of 10000 mAh</p>\n\n<p dir=\"ltr\">With a USB-C port and PD technology that provides fast charging for your iPhone</p>\n\n<p dir=\"ltr\">USB-A port with Qualcomm 3.0</p>', 'Equipped with a PD input for fast charging.', 'مزودة بمدخل PD للشحن السريع .', '16255111447946044826448.jpg', 149, 0.00, 82.00, 89.00, 94.00, 96, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-08-10 16:09:48', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6014, 114, 73, '7946043886702', 1, 'simple', 'قاعدة شحن باوراولوقي - بطارية متنقلة 10000ملي امبير باوراولوقي بمنفذين اسود', 'Powerology 2in1 Fast Wireless Power Bank 10000mAh', '<ul>\n	<li><span style=\"font-size:16px\">يمكن فصل البطارية واستخدامها بشكل منفصل تدعم الشحن اللاسلكي.</span></li>\n	<li><span style=\"font-size:16px\">بطارية بسعة 10.000 mAh.</span></li>\n	<li><span style=\"font-size:16px\">البطارية مزودة بمنفذين ( USB)</span></li>\n	<li><span style=\"font-size:16px\">منتج يتميز بشحن لاسلكي، قم بالضغط على الزر لتشغيل الشاحن اللاسلكي ثم وضع هاتف آيفون.</span></li>\n	<li><span style=\"font-size:16px\">منتج يمكنه شحن الأجهزة التي تدعم أنظمة التشغيل Android أو أجهزة آيفون و الأجهزة الأخرى المزودة بمنفذ USB.</span></li>\n	<li><span style=\"font-size:16px\">كما أنه يدعم شحن ما يصل إلى جهازين في وقت واحد.</span></li>\n</ul>\n\n<p>&nbsp;</p>', '<p dir=\"ltr\">The battery can be separated and used separately, supports wireless charging.<br />\nBattery with a capacity of 10,000 mAh.<br />\nThe battery has two ports (USB)<br />\nProduct featuring wireless charging, press the button to turn on the wireless charger and then put the iPhone in.<br />\nA product that can charge devices that support Android operating systems or iPhone devices and other devices with USB port.<br />\nIt also supports charging up to two devices simultaneously.</p>', 'Charging platform suitable for office and home.', 'منصة شحن مناسبة للمكتب و المنزل.', '16255112657946043886702.jpg', 129.57, 0.00, 92.00, 97.00, 98.00, 158, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-11-02 14:02:48', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6015, 124, 73, '7946043889154', 1, 'simple', 'ادابتر باوراولوقي 36واط بمنفذين اسود + كيبل باوراولوقي تايب سي - تايب سي 1.2 اسود', 'Powerology Aluminum Ultra-Quick 36W Car Charger PD + QC3.0 with USB-C to USB-C Cable (0.9m/3ft)', '<p>ادابتر شاحن للسيارة من باوراولجي مصنوع من سبائك الألومنيوم.. بقوة 18w مزود بخاصية حماية الأجهزة من التيارات الكهربائبية الزائدة . متوافق مع جميع الأجهزة.</p>\n\n<p>. Input: 5V/2A 9V/1.67A 12V/1.5A</p>\n\n<p>Output: 15W/7.5W/10W/15W Charging Distance</p>\n\n<p>&nbsp;&lt; 10mm, Power Conversion : &lt;80% Smart Recognition</p>\n\n<p>, Wireless fast charger Automatic Induction, Automatic locking Automatic coil induction Automatic Grip and Touch-sensor Release</p>', '<p>&nbsp;</p>\n\n<p>A car charger adapter from Powerolgy made of aluminum alloy.. 18W with a feature to protect devices from excessive electrical currents. Compatible with all devices.</p>\n\n<p>. Input: 5V/2A 9V/1.67A 12V/1.5A</p>\n\n<p>Output: 15W/7.5W/10W/15W Charging Distance</p>\n\n<p>&nbsp;&lt; 10mm, Power Conversion : &lt;80% Smart Recognition</p>\n\n<p>, Wireless fast charger Automatic Induction, Automatic locking Automatic coil induction Automatic Grip and Touch-sensor Release</p>', 'For every driver', 'لكل قائد سيارة.', '16255116217946043889154.jpg', 68.7, 0.00, 48.00, 52.00, 54.00, 300, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6016, 124, 74, '6297000886237', 1, 'simple', 'مثبت جوال مغناطيس في السيارة من برودو فضي', 'Porodo Aluminum Magnetic Car Mount (Air Vent + Stick-On Holder) Silver', '<p><strong>قاعدة مغناطيس قوية مع لاصق 3M للتثبيت على السيارة</strong></p>\n\n<ul>\n	<li><strong>محتويات المنتج :</strong></li>\n	<li>قطعة ستاند تثبت خلف الهاتف</li>\n	<li>قطعة تثبت في الديكور مع امكانية الدوران 360 درجة</li>\n	<li>قعطة اضافية تثبت في ريش المكيف مع امانية الدوران 360 درجة</li>\n	<li>لاصق من شركة ثري ام العالمية</li>\n	<li>قطع معدن احتياط</li>\n</ul>', '<p>Strong magnet base with 3M adhesive to mount on the car</p>\n\n<p>Product Contents:<br />\nA piece of stand is attached to the back of the phone<br />\nA piece installed in the decor with the possibility of rotation 360 degrees<br />\nAn extra piece is installed in the air conditioner blades with 360 degree rotation safety الدوران<br />\n3M adhesive tape<br />\nspare metal parts</p>', 'Strong magnet base with 3M adhesive to mount on the car', 'قاعدة مغناطيس قوية مع لاصق 3M للتثبيت على السيارة', '16255117956297000886237.jpg', 51.3, 0.00, 21.00, 23.00, 26.00, 248, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6017, 124, 74, '6297000886220', 1, 'simple', 'مثبت جوال مغناطيس في السيارة من برودو اسود', 'Porodo Aluminum Magnetic Car Mount (Air Vent + Stick-On Holder) Black', '<p><strong>قاعدة مغناطيس قوية مع لاصق 3M للتثبيت على السيارة</strong></p>\n\n<ul>\n	<li><strong>محتويات المنتج :</strong></li>\n	<li>قطعة ستاند تثبت خلف الهاتف</li>\n	<li>قطعة تثبت في الديكور مع امكانية الدوران 360 درجة</li>\n	<li>قعطة اضافية تثبت في ريش المكيف مع امانية الدوران 360 درجة</li>\n	<li>لاصق من شركة ثري ام العالمية</li>\n	<li>قطع معدن احتياط</li>\n</ul>', '<p dir=\"ltr\">Strong magnet base with 3M adhesive to mount on the car</p>\n\n<p dir=\"ltr\">Product Contents:<br />\nA piece of stand is attached to the back of the phone<br />\nA piece installed in the decor with the possibility of rotation 360 degrees<br />\nAn extra piece is installed in the air conditioner blades with 360 degree rotation safety الدوران<br />\n3M adhesive tape<br />\nspare metal parts</p>', 'Strong magnet base with 3M adhesive to mount on the car', 'قاعدة مغناطيس قوية مع لاصق 3M للتثبيت على السيارة', '16255119036297000886220.jpg', 51.3, 0.00, 21.00, 23.00, 26.00, 54, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6018, 124, 74, '6297000886244', 1, 'simple', 'مثبت جوال مغناطيس في السيارة من برودو ذهبي', 'Porodo Aluminum Magnetic Car Mount (Air Vent + Stick-On Holder) Gold', '<p><strong>قاعدة مغناطيس قوية مع لاصق 3M للتثبيت على السيارة</strong></p>\n\n<ul>\n	<li><strong>محتويات المنتج :</strong></li>\n	<li>قطعة ستاند تثبت خلف الهاتف</li>\n	<li>قطعة تثبت في الديكور مع امكانية الدوران 360 درجة</li>\n	<li>قعطة اضافية تثبت في ريش المكيف مع امانية الدوران 360 درجة</li>\n	<li>لاصق من شركة ثري ام العالمية</li>\n	<li>قطع معدن احتياط</li>\n</ul>', '<p dir=\"ltr\">Strong magnet base with 3M adhesive to mount on the car</p>\n\n<p dir=\"ltr\">Product Contents:<br />\nA piece of stand is attached to the back of the phone<br />\nA piece installed in the decor with the possibility of rotation 360 degrees<br />\nAn extra piece is installed in the air conditioner blades with 360 degree rotation safety الدوران<br />\n3M adhesive tape<br />\nspare metal parts</p>', 'Strong magnet base with 3M adhesive to mount on the car', 'قاعدة مغناطيس قوية مع لاصق 3M للتثبيت على السيارة', '16255119856297000886244.jpg', 51.3, 0.00, 21.00, 23.00, 26.00, 246, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6019, 115, 76, '11', 1, 'simple', 'وصلة ابل اي يو اكس - لايتنينج ابيض', 'Apple Lightning Headphone Jack Adapter', NULL, NULL, NULL, NULL, '16256989051.jpg', 51.3, 0.00, 31.00, 33.00, 36.00, 26, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6020, 120, 76, '190198001733', 1, 'simple', 'سماعة سلكية ابل ابيض لايتنينج', 'Apple Earpods w/ Lightning Connector', NULL, NULL, NULL, NULL, '1625680102788DFCE9-DD1D-4309-B3DC-4663A740E378.jpeg', 120.87, 0.00, 89.00, 93.00, 96.00, 500, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6021, 120, 76, '190198107022', 1, 'simple', 'سماعة سلكية ابل ابيض اي يو اكس', 'Apple Earpods with 3.5mm Headphone Plug', '<ul>\n	<li><span style=\"font-size:16px\">قم بإضافة المزيد من الإثارة الى تجربتك الصوتية مع سماعات الاذن السلكية من ابل.</span></li>\n	<li><span style=\"font-size:16px\">سوف تصبح هذه السماعة قريباً ، رفيق الموسيقى المفضل لديك ، وستساعدك على خوض تجربة استماع استثنائية.</span></li>\n	<li><span style=\"font-size:16px\">عالية الوضوح و الصوت نقي جداً.</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنة من حاسبات العرب و متجر ابل الرسمي.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Add more excitement to your audio experience with these wired Apple earbuds.<br />\nThis headset will soon become your favorite music companion and help you experience an exceptional listening experience.<br />\nHigh definition and very pure sound.<br />\nOne year warranty from Arab computers and the official Apple Store.</span></p>', '.💙🎶 For those who love wired headphones', 'لمحبين السماعات السلكية💙🎶 .', '1625512165190198107022.jpg', 112.17, 0.00, 87.00, 91.00, 94.00, 36, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6022, 115, 76, '885909627653', 1, 'simple', 'ادابتر ابل اتش دي - لايتنينج ابيض', 'Apple Lightning Digital AV Adapter', '<ul>\n	<li><span style=\"font-size:16px\">يساعد المحول من ابل على وصل هاتفك الايفون او الايباد او الايبود الخاص بك ومشاهدة المحتوى عبر التلفاز او شاشة العرض او اي شاشة متوافقة و مزودة بمدخل HDMI.</span></li>\n	<li><span style=\"font-size:16px\">شاهد بجودة عالية FULL HD.</span></li>\n	<li><span style=\"font-size:16px\">فقط اشبك الوصلة و استمتع.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">The adapter from Apple helps you connect your iPhone, iPad, or iPod and watch content on your TV, monitor, or any compatible screen equipped with an HDMI input.<br />\nWatch in FULL HD quality.<br />\nJust plug the link and enjoy.</span></p>', 'Watch in FULL HD quality.', 'شاهد بجودة عالية FULL HD.', '1625512438885909627653.jpg', 190.43, 0.00, 152.00, 154.00, 156.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6023, 115, 76, '190199370388', 1, 'simple', 'كيبل ابل لايتنينج - تايب سي 1م ابيض', 'Apple USB-C to Lightning Cable 1M (2nd Generation) MQGJ2', '<ul>\n	<li>كيبل lightning إلى USB-C.</li>\n	<li>عند استخدام فيش (مقبس) بمدخل PD تشحن جهازك من 0% الى 60 % خلال 30 دقيقة .&nbsp;</li>\n	<li>اصلي من شركة ابل.</li>\n	<li>طول مترين - ابيض.</li>\n	<li>ضمان سنتين.</li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Lightning to USB-C cable.<br />\nWhen you use a socket (socket) in the PD input, your device will be charged from 0% to 60% within 30 minutes.<br />\nOriginal from Apple.<br />\nTwo meters long - white.<br />\nTwo years warranty.</span></p>', 'lightning إلى USB-C.', 'كيبل lightning إلى USB-C.', '1625512483190199370388.jpg', 86.09, 0.00, 73.00, 78.00, 82.00, 114, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6024, 115, 76, '190198531704', 1, 'simple', 'كيبل ابل لايتنينج - يو اس بي 1م ابيض', 'Apple Lightning to USB Cable 1M MQUE2', '<ul>\n	<li><span style=\"font-size:16px\">يدعم الشحن السريع مع معدل استهلاك طاقة قليل.</span></li>\n	<li><span style=\"font-size:16px\">اشحن هاتفك المحمول من خلال منفذ الكمبيوتر بواسطة كابل اليو اس بي.</span></li>\n	<li><span style=\"font-size:16px\">ايضا يمكنك نقل البيانات و تخزينها من الكمبيوتر الى هاتفك المحمول.</span></li>\n	<li><span style=\"font-size:16px\">اصلي من ابل&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين&nbsp;</span></li>\n</ul>', '<p>Supports fast charging with low power consumption.<br />\nCharge your mobile phone through the computer port with the USB cable.<br />\nYou can also transfer and store data from your computer to your mobile phone.<br />\noriginal from apple<br />\n2 years warranty</p>', 'Charge and transfer your data with ease.', 'اشحن وانقل بياناتك بكل سهولة.', '1625512947190198531704.jpg', 77.39, 0.00, 56.00, 59.00, 62.00, 16, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6025, 115, 76, '885909627448', 1, 'simple', 'كيبل ابل لايتنينج - يو اس بي 2م ابيض', 'Apple Lightning to USB Cable 2M MD819ZM/A', '<ul>\n	<li><span style=\"font-size:16px\">يدعم الشحن السريع مع معدل استهلاك طاقة قليل.</span></li>\n	<li><span style=\"font-size:16px\">اشحن هاتفك المحمول من خلال منفذ الكمبيوتر بواسطة كابل اليو اس بي.</span></li>\n	<li><span style=\"font-size:16px\">ايضا يمكنك نقل البيانات و تخزينها من الكمبيوتر الى هاتفك المحمول.</span></li>\n	<li><span style=\"font-size:16px\">اصلي من ابل&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين&nbsp;</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Supports fast charging with low power consumption.<br />\nCharge your mobile phone through the computer port with the USB cable.<br />\nYou can also transfer and store data from your computer to your mobile phone.<br />\noriginal from apple<br />\n2 years warranty</span></p>', 'Charge and transfer your data with ease.', 'اشحن وانقل بياناتك بكل سهولة.', '1625513057885909627448.jpg', 86.09, 0.00, 89.00, 93.00, 96.00, 16, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6026, 115, 76, '4547597946817', 1, 'simple', 'كيبل ابل تايب سي - تايب سي 2م ابيض', 'Apple USB-C Charge Cable 2M (2nd Generation) MLL82', NULL, NULL, 'Charge and transfer your data at lightning speed.', 'اشحن و انقل بياناتك بسرعة البرق .', '16255131614547597946817.jpg', 129, 0.00, 84.00, 86.00, 92.00, 38, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6027, 114, 77, '848061070132', 1, 'simple', 'بطارية متنقله 20100 ملي امبير انكر اسود منفذين', 'Anker Pwerbank 20100 black', '<ul>\n	<li><span style=\"font-size:16px\">مدخلين ( يو اس بي )</span></li>\n	<li><span style=\"font-size:16px\">بنك الطاقة المتميز عالي السعة 20100</span></li>\n	<li><span style=\"font-size:16px\">شحن أسرع وأكثر أمانًا باستخدام التكنولوجيا المتقدمة</span></li>\n	<li><span style=\"font-size:16px\">يتميز بتقنية PowerIQ و VoltageBoost</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Two inputs (USB)<br />\nPremium high capacity power bank 20100<br />\nFaster and safer charging with advanced technology<br />\nFeatures PowerIQ and VoltageBoost</span></p>', 'Be with you wherever you are.', 'بتكون معاك وين ماكنت.', '1625513281848061070132.jpg', 155.65, 0.00, 110.00, 118.00, 118.00, 207, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6028, 114, 77, '848061070125', 1, 'simple', 'بطارية متنقله 20100 ملي امبير انكر ابيض منفذين', 'Anker Pwerbank 20100 white', '<ul>\n	<li><span style=\"font-size:16px\">مدخلين ( يو اس بي )</span></li>\n	<li><span style=\"font-size:16px\">بنك الطاقة المتميز عالي السعة 20100</span></li>\n	<li><span style=\"font-size:16px\">شحن أسرع وأكثر أمانًا باستخدام التكنولوجيا المتقدمة</span></li>\n	<li><span style=\"font-size:16px\">يتميز بتقنية PowerIQ و VoltageBoost</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Two inputs (USB)<br />\nPremium high capacity power bank 20100<br />\nFaster and safer charging with advanced technology<br />\nFeatures PowerIQ and VoltageBoost</span></p>', 'Be with you wherever you are.', 'بتكون معاك وين ماكنت.', '1625513419848061070125.jpg', 155.65, 0.00, 110.00, 118.00, 118.00, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-09-29 16:38:41', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6029, 128, 112, '112233', 1, 'simple', 'فوطة زرقاء بروتكشن برو حجم صغير', 'BLUE Towel 30X30CM', '<p><span style=\"font-size:16px\">فوطة ناعمة&nbsp; مصنوعة من الفايبر مما تساعدك على ازالة الاوساخ و الاتربة و السوائل ..الخ </span></p>\n\n<p><span style=\"font-size:16px\">من دون ما تحدث خدوش او ضرر على جهازك .&nbsp;</span></p>', '<p dir=\"ltr\"><span style=\"font-size:16px\">A soft towel made of fiber, which helps you to remove dirt, dust, liquids, etc.<br />\nWithout causing any scratches or damage to your device.</span></p>', 'Towel made of fiber.', 'فوطة مصنوعة من الفايبر.', '1625513615112233.jpg', 19, 0.00, 19.00, 19.00, 19.00, 4394, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6030, 128, 112, '112234', 1, 'simple', 'فوطة خضراء بروتكشن برو حجم وسط', 'Green  Towel 30X30CM', '<p><span style=\"font-size:16px\">فوطة ناعمة&nbsp; مصنوعة من الفايبر مما تساعدك على ازالة الاوساخ و الاتربة و السوائل ..الخ</span></p>\n\n<p><span style=\"font-size:16px\">من دون ما تحدث خدوش او ضرر على جهازك .&nbsp;</span></p>', '<p dir=\"ltr\"><span style=\"font-size:16px\">A soft towel made of fiber, which helps you to remove dirt, dust, liquids, etc.<br />\nWithout causing any scratches or damage to your device.</span></p>', 'Towel made of fiber.', 'فوطة مصنوعة من الفايبر.', '1625513693112234.jpg', 29, 0.00, 29.00, 29.00, 29.00, 4259, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6031, 128, 112, '112235', 1, 'simple', 'فوطة رمادية بروتكشن برو حجم كبير', 'Grey Towel 30X30CM', '<p><span style=\"font-size:16px\">فوطة ناعمة&nbsp; مصنوعة من الفايبر مما تساعدك على ازالة الاوساخ و الاتربة و السوائل ..الخ</span></p>\n\n<p><span style=\"font-size:16px\">من دون ما تحدث خدوش او ضرر على جهازك .&nbsp;</span></p>', '<p><span style=\"font-size:16px\">A soft towel made of fiber, which helps you to remove dirt, dust, liquids, etc.<br />\nWithout causing any scratches or damage to your device.</span></p>', 'Towel made of fiber.', 'فوطة مصنوعة من الفايبر.', '1625513755112235.jpg', 39, 0.00, 39.00, 39.00, 39.00, 4393, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6032, 128, 71, 'BOPPT', 1, 'simple', 'رول لاصق بروتكشن برو', 'Quix Tec 1Dry Install', NULL, NULL, NULL, NULL, '1625513810BOPPT.jpg', 49, 0.00, 49.00, 49.00, 49.00, 111, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6033, 128, 71, '850015010507', 1, 'simple', 'ممسحة بلاستيكية اجمل الهواتف / بروتكشن برو', 'Ajmal Alhawatif Squeegee', NULL, NULL, NULL, NULL, '1625513870850015010507.jpg', 79, 0.00, 79.00, 79.00, 79.00, 1263, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6034, 128, 71, '855821005167', 1, 'simple', 'رول باركود بروتكشن برو', 'Adhesive Sticker roll2000', NULL, NULL, NULL, NULL, '1625513842855821005167.jpg', 99, 0.00, 99.00, 99.00, 99.00, 3, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6035, 114, 77, '848061049756', 1, 'simple', 'بطارية متنقله 20000ملي امبير انكر ابيض منفذين خاصية باوركور', 'Anker PowerCore II Power Bank Charger 20000 White', '<p>&nbsp;كفاءة تحويل عالية تقنية PowerIQ: حدّد جهازك واحصل على أسرع شحن ممكن لهذا الجهاز السعة 20000مللي أمبير/ الساعة/ 74.37 واط يحتوي الصندوق على كابل USB صغير لشحن الباور بانك والهواتف المحددة.</p>\n\n<p>PowerIQ 2.0 Amp-adjustment Technology</p>', '<p><strong>High conversion efficiency PowerIQ Technology: Select your device and get the fastest possible charge for this device Capacity: 20000mAh / 74.37W The box contains a micro USB cable to charge the power bank and selected phones.PowerIQ 2.0 Amp-adjustment Technology</strong></p>', NULL, NULL, '1625513928848061049756.jpg', 260, 0.00, 140.00, 150.00, 180.00, 66, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6036, 120, 81, '8806085692701', 1, 'simple', 'سماعة سلكية سامسونج  HS1303 - ابيض - اي يو اكس', 'Samsung Headset with Mic and Remote Controller - White', '<p><span style=\"font-size:16px\">يوفر التصميم البسيط وسماعات الأذن الناعمة الراحة دون الشعور بالتعب أو الانزعاج عند الاستماع إلى الموسيقى لفترة طويلة.</span></p>\n\n<p><span style=\"font-size:16px\">يوفر التوازن بين الطبقة النقية والواضحة والباس العميق تجربة سمعية غنية لجميع أنواع الموسيقى.</span></p>', '<p dir=\"ltr\"><span style=\"font-size:16px\">The simple design and soft earbuds provide comfort without feeling tired or uncomfortable when listening to music for a long time.</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The balance between crisp and clear bass and deep bass delivers a rich audio experience for all types of music.</span></p>', 'Wired headset with microphone.', 'سماعة سلكية مزودة بالميكروفون .', '16255142098806085692701.jpg', 42.61, 0.00, 26.00, 27.00, 30.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6037, 120, 81, '8806085691308', 1, 'simple', 'سماعة سلكية سامسونج  HS1303 - اسود - اي يو اكس', 'Samsung Headset with Mic and Remote Controller - Black', '<p><span style=\"font-size:16px\">يوفر التصميم البسيط وسماعات الأذن الناعمة الراحة دون الشعور بالتعب أو الانزعاج عند الاستماع إلى الموسيقى لفترة طويلة.</span></p>\n\n<p><span style=\"font-size:16px\">يوفر التوازن بين الطبقة النقية والواضحة والباس العميق تجربة سمعية غنية لجميع أنواع الموسيقى.</span></p>', '<p dir=\"ltr\"><span style=\"font-size:16px\">The simple design and soft earbuds provide comfort without feeling tired or uncomfortable when listening to music for a long time.</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The balance between crisp and clear bass and deep bass delivers a rich audio experience for all types of music.</span></p>', 'Wired headset with microphone.', 'سماعة سلكية مزودة بالميكروفون .', '16255143248806085691308.jpg', 42.61, 0.00, 26.00, 27.00, 30.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6038, 124, 73, '6297000886626', 1, 'simple', 'ادابتر سيارة + كابل تايب سي - لايتنينج من باوراولوجي 30 واط', 'powerology dual port car charger 30w USB 2.4A + PD 18W with Type-c to Mfi Lighting Cable 0.9 - black', NULL, NULL, NULL, NULL, '16255144736297000886626.jpg', 77.39, 0.00, 62.00, 60.00, 62.00, 280, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6039, 115, 73, '7946044826684', 1, 'simple', 'كيبل باوراولوقي تايب سي - يو اس بي 1.2م اسود', 'powerology PVC USB-A to type-c 3A cable 1.2 - black', '<ul>\n	<li><span style=\"font-size:16px\">مغطى بمادة PVC المتينة والمقاومة للحريق و التسخين الزائد والتيار الزائد.</span></li>\n	<li><span style=\"font-size:16px\">لشحن السريع و نقل البيانات بسرعة البرق.</span></li>\n	<li><span style=\"font-size:16px\">اصلي 100%</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Coated with durable PVC, which is resistant to fire, overheating and overcurrent.<br />\nFor fast charging and lightning-fast data transfer.<br />\n100% original</span></p>', 'For fast charging and lightning-fast data transfer.', 'لشحن السريع و نقل البيانات بسرعة البرق.', '16255146547946044826684.jpg', 60, 0.00, 16.00, 19.00, 23.00, 1000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6040, 115, 74, '6297000886060', 1, 'simple', 'كيبل برودو اتش دي - اتش دي 1.2م اسود', 'Porodo 8K HDMI to HDMI cable V2 1.2m /6.6ft - black', '<ul>\n	<li><span style=\"font-size:16px\">كيبل اتش دي ماي بجودة 8k .&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">بطول 2 متر .</span></li>\n	<li><span style=\"font-size:16px\">HDR ديناميكي.</span></li>\n	<li><span style=\"font-size:16px\">متوافق مع شاشات 4k.</span></li>\n	<li><span style=\"font-size:16px\">معدل التحديث المتغير (VRR): يسمح بمعدل تحديث ديناميكي سلس وسلس على الأجهزة التي تدعم تقنيات معدل التحديث المتغيرة</span></li>\n	<li><span style=\"font-size:16px\">مطلي باللون الذهبي : بحث يكون مقاوم للتأكل الاطراف.</span></li>\n</ul>\n\n<p>&nbsp;</p>', '<p>hdmi cable with 8k quality<br />\n2 meters long.<br />\nDynamic HDR.<br />\nCompatible with 4k screens.<br />\nVariable Refresh Rate (VRR): Allows a smooth, dynamic refresh rate on devices that support Variable Refresh Rate technologies<br />\nGold-plated: it is anti-corrosion on the edges.</p>', 'hdmi cable with 8k quality', 'كيبل اتش دي ماي بجودة 8k . ', '16255150696297000886060.jpg', 42.61, 0.00, 24.00, 26.00, 28.00, 30, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6041, 129, 103, '17817755023', 1, 'simple', 'سماعات لاسلكية بوس ساوند سبورت برتقالي', 'Bose soundSport free wireless in-earbuds -orange/ navy', '<p><strong>بدون اسلاك - بدون توقف.</strong></p>\n\n<ul>\n	<li>اشحنها مره واحدة</li>\n</ul>\n\n<p><strong>(تعمل السماعات لمده تصل الى 5 ساعات </strong></p>\n\n<ul>\n	<li><strong>اذا تم شحنها شحنتين اضافيتين :</strong></li>\n</ul>\n\n<p>(تعمل ما يصل الى 10 ساعات متواصله)</p>\n\n<p><strong>= يمنحك الشحن السريع لمدة 15 دقيقة ( 45 دقيقة) من البطارية. </strong></p>\n\n<p><strong>_________________________________</strong></p>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li><strong>مقاومة للتعرق و السوائل</strong></li>\n	<li><strong>قوية الثبات داخل الاذن (مناسبة جداً لتمارين الشاقة )</strong></li>\n	<li>&nbsp;</li>\n</ul>\n\n<p>_________________________________</p>\n\n<p>&nbsp;</p>\n\n<p>يمكن التحكم بالاعدادت السماعة عن طريق التطبيق الخاص بها :</p>\n\n<p><img src=\"https://cdn.salla.sa/gVRAK/dpFw6GOt0OJlQEwJSmz1fKaIlXcGF1TLjgUsQg86.png\" /></p>\n\n<p>&nbsp;</p>\n\n<p>ويمكن تحميله من ابل ستور و جوجل بلاي :</p>\n\n<p>&nbsp;</p>\n\n<p><strong>ابل ستور : </strong></p>\n\n<p>https://itunes.apple.com/us/app/bose-connect/id1046510029?mt=8</p>\n\n<p>&nbsp;</p>\n\n<p><strong>جوجل بلاي:</strong></p>\n\n<p>https://play.google.com/store/apps/details?id=com.bose.monet</p>\n\n<p>&nbsp;</p>', '<p>No wires - non-stop.</p>\n\n<p>Charge it once<br />\n(The headphones work for up to 5 hours</p>\n\n<p>If two additional shipments are shipped:<br />\n(works up to 10 hours continuously)</p>\n\n<p>= Fast charging gives you 15 minutes (45 minutes) of battery life.</p>\n\n<p>_________________________________</p>\n\n<p>Sweat and fluid resistant<br />\nStrong stability inside the ear (very suitable for strenuous exercises)</p>\n\n<p>_________________________________</p>\n\n<p>The headphone settings can be controlled via its own application:</p>\n\n<p>It can be downloaded from the App Store and Google Play:</p>\n\n<p>Apple Store :</p>\n\n<p>https://itunes.apple.com/us/app/bose-connect/id1046510029?mt=8</p>\n\n<p>Google Play:</p>\n\n<p>https://play.google.com/store/apps/details?id=com.bose.monet</p>', 'No wires - non-stop.', 'بدون اسلاك - بدون توقف.', '162551544917817755023.jpg', 868.7, 0.00, 640.00, 680.00, 780.00, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1);
INSERT INTO `products` (`id`, `parent_id`, `brand_id`, `product_code`, `status`, `type`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `short_desc_en`, `short_desc_ar`, `product_photo`, `product_price`, `product_price1`, `product_price2`, `product_price3`, `product_price4`, `product_quantity`, `length`, `width`, `height`, `length_class`, `weight`, `weight_class`, `created_at`, `updated_at`, `details_ar`, `details_en`, `viewed_levels`, `video`, `yt_video`, `sort`) VALUES
(6042, 129, 103, '17817731324', 1, 'simple', 'سماعات لاسلكية بوس ساوند سبورت ابيض/اخضر', 'Bose SoundSport Wireless In-Ear Headphones (Citron)', '<ul>\n	<li><span style=\"font-size:16px\">أقصى درجات الراحة والاستقرار ، مع مادة سيليكون ناعمة وشكل فريد يلائم أذنك بلطف.</span></li>\n	<li><span style=\"font-size:16px\">يمنحك EQ المُحسَّن حجم الصوت أداءً صوتيًا متوازنًا بأي مستوى صوت.</span></li>\n	<li><span style=\"font-size:16px\">توفر بطارية ليثيوم أيون ما يصل إلى 6 ساعات لكل شحنة.</span></li>\n	<li><span style=\"font-size:16px\">مقاومة للعرق والطقس للتمارين القاسية.</span></li>\n	<li><span style=\"font-size:16px\">يتيح لك الميكروفون المدمج وجهاز التحكم عن بعد التحكم بسهولة في مستوى الصوت وتخطي الموسيقية واستقبال المكالمات الهاتفية.</span></li>\n	<li><span style=\"font-size:16px\">تأتي معاها حقيبة للمحافظة عليها .</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Ultimate comfort and stability, with soft silicone material and a unique shape that fits gently in your ear.<br />\nVolume-optimized EQ gives you balanced audio performance at any volume level.<br />\nThe lithium-ion battery provides up to 6 hours per charge.<br />\nSweat and weather resistant for tough workouts.<br />\nThe built-in microphone and remote control allow you to easily control the volume, skip music, and take phone calls.<br />\nIt comes with a bag to keep it.</span></p>', 'No wires - non-stop.', 'بدون اسلاك - بدون توقف.', '162551569317817731324.jpg', 651.3, 0.00, 460.00, 500.00, 540.00, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6043, 132, 100, '841351172943', 1, 'simple', 'مسكة للجوال من نوكيس - liquid glitte gold', 'Nuckees stand and grip - liquid glitte gold', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:14px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:14px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625515951841351172943.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6044, 132, 100, '841351156028', 1, 'simple', 'مسكة للجوال من نوكيس - black', 'Nuckees stand and grip - black', '<p><strong>من مميزات المساكة :</strong></p>\n\n<ul>\n	<li>المساكة تغلق تلقائي عند عدم الاستخدام.</li>\n	<li>مصنوعة من مواد قوية مقاومة للتلف.</li>\n	<li>مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</li>\n	<li>مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</li>\n	<li>يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</li>\n	<li>مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625516040841351156028-1.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6045, 132, 100, '841351160193', 1, 'simple', 'مسكة للجوال من نوكيس - black diamond cluster', 'Nuckees stand and grip - black diamond cluster', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625516174841351160193.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6046, 132, 100, '841351160179', 1, 'simple', 'مسكة للجوال من نوكيس - rose gold diamond ciuster', 'Nuckees stand and grip - rose gold diamond ciuster', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625516442841351160179.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6047, 132, 100, '841351168731', 1, 'simple', 'مسكة للجوال من نوكيس - ombre diamond cluster gold/pink', 'Nuckees stand and grip - ombre diamond cluster gold/pink', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', NULL, NULL, 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625516544841351168731.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6048, 132, 100, '841351160315', 1, 'simple', 'مسكة للجوال من نوكيس -  black metal gem', 'Nuckees stand and grip - black metal gem', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625516662841351160315.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6049, 132, 100, '841351160322', 1, 'simple', 'مسكة للجوال من نوكيس - rose gold metal gem', 'Nuckees stand and grip - rose gold metal gem', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625516852841351160322.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6050, 132, 100, '841351167680', 1, 'simple', 'مسكة للجوال من نوكيس - blue metal gem', 'Nuckees stand and grip - blue metal gem', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625516976841351167680.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6051, 132, 100, '841351160186', 1, 'simple', 'مسكة للجوال من نوكيس -  silver diamond cluster', 'Nuckees stand and grip - silver diamond cluster', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\">Features of the grip:</p>\n\n<p dir=\"ltr\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625517057841351160186.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6052, 132, 100, '841351168779', 1, 'simple', 'مسكة للجوال من نوكيس - vegan croc white', 'Nuckees stand and grip - vegan croc white', '<p><span style=\"font-size:16px\">مساكة من نوكيس التي تمنح جهازك الفخامة بشكلها الجميل :</span></p>\n\n<p><span style=\"font-size:16px\">من مميزات المساكة :</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام .</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف .</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها .</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد .</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في 4 اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف .</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'A grip from Knox that gives your device luxury in its beautiful form', 'مساكة من نوكيس التي تمنح جهازك الفخامة بشكلها الجميل', '1625517173841351168779-1.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6053, 132, 100, '841351168809', 1, 'simple', 'مسكة للجوال من نوكيس - vegan croc red', 'Nuckees stand and grip - vegan croc red', '<p><strong>من مميزات المساكة :</strong></p>\n\n<ul>\n	<li>المساكة تغلق تلقائي عند عدم الاستخدام.</li>\n	<li>مصنوعة من مواد قوية مقاومة للتلف.</li>\n	<li>مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</li>\n	<li>مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</li>\n	<li>يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</li>\n	<li>مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625517338841351168809.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6054, 132, 100, '841351168762', 1, 'simple', 'مسكة للجوال من نوكيس - vegan croc black', 'Nuckees stand and grip - vegan croc black', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625517423841351168762.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6055, 132, 100, '841351168786', 1, 'simple', 'مسكة للجوال من نوكيس - vegan croc fuschia', 'Nuckees stand and grip - vegan croc fuschia', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625517501841351168786.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6056, 132, 100, '841351168663', 1, 'simple', 'مسكة للجوال من نوكيس - rose gold reverse sequin', 'Nuckees stand and grip - rose gold reverse sequin', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', NULL, 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625517576841351168663.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6057, 132, 100, '841351160360', 1, 'simple', 'مسكة للجوال من نوكيس - silver carbon graphite', 'Nuckees stand and grip - silver carbon graphite', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\">Features of the grip:</p>\n\n<p dir=\"ltr\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625517751841351160360.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6058, 132, 100, '841351160353', 1, 'simple', 'مسكة للجوال من نوكيس - rose gold carbon graphite', 'Nuckees stand and grip - rose gold carbon graphite', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625517819841351160353.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6059, 132, 100, '841351160216', 1, 'simple', 'مسكة للجوال من نوكيس - pink indescent', 'Nuckees stand and grip - pink indescent', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625517910841351160216-1.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6060, 132, 100, '841351160223', 1, 'simple', 'مسكة للجوال من نوكيس - blue indescent', 'Nuckees stand and grip - blue indescent', NULL, NULL, NULL, NULL, '1625518042841351160223.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6061, 132, 100, '841351160292', 1, 'simple', 'مسكة للجوال من نوكيس -  black metal vinyl', 'Nuckees stand and grip - black metal vinyl', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625518270841351160292.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6062, 132, 100, '841351172936', 1, 'simple', 'مسكة للجوال من نوكيس - gold metal gem', 'Nuckees stand and grip - gold metal gem', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625518448841351172936-1.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6063, 132, 100, '841351160285', 1, 'simple', 'مسكة للجوال من نوكيس - silver metal gem', 'Nuckees stand and grip - silver metal gem', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625518557841351160285.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6064, 132, 100, '841351168717', 1, 'simple', 'مسكة للجوال من نوكيس -  vibes vegan leather blue', 'Nuckees stand and grip - vibes vegan leather blue', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625578730841351168717-1.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 9, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6065, 132, 100, '841351167741', 1, 'simple', 'مسكة للجوال من نوكيس - wild tiger', 'Nuckees stand and grip - wild tiger', '<p><span style=\"font-size:16px\"><strong>من مميزات المساكة :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">المساكة تغلق تلقائي عند عدم الاستخدام.</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من مواد قوية مقاومة للتلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بحبل مطاطي مرن يمكنك بتحكم في المساكة 360 درجة دون فقدانها.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمغناطيس يسهل عليك تثبيتها بالمكان المراد.</span></li>\n	<li><span style=\"font-size:16px\">يمكنك بتثبيتها في<strong> 4</strong> اتجاهات ( للمشاهدة و للتصفح و للكتابة و للالتقاط سيلفي و المكالمة فيديو ).</span></li>\n	<li><span style=\"font-size:16px\">مزودة بغراء قوي مقاوم للتلف يمكنك استخدامها عدة مرات من دون ان تتلف.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the grip:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">The handle closes automatically when not in use.<br />\nMade of strong wear-resistant materials.<br />\nEquipped with a flexible rubber cord, you can control the grip 360 degrees without losing it.<br />\nEquipped with a magnet that makes it easy for you to attach it to the desired place.<br />\nYou can install it in 4 directions (to watch, browse, write, take a selfie and video call).<br />\nEquipped with a strong wear-resistant glue that you can use several times without getting damaged.</span></p>', 'The handle closes automatically when not in use.', 'المساكة تغلق تلقائي عند عدم الاستخدام.', '1625578901841351167741-4.jpg', 51.3, 0.00, 33.00, 42.00, 45.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6066, 114, 74, '2155387372849', 1, 'simple', 'بطارية متنقلة 10000 ملي امبير برودو  18 واط  منفذPD - احمر', 'porodo power bank 10000 mAh QC 3.0 with PD 18W - red', '<ul>\n	<li>بمنفذين : ( PD &amp; USB )</li>\n	<li>PD: شحن سريع 0% الى 60% خلال 35 دقيقة .</li>\n</ul>\n\n<p>= حماية متعددة و شديدة التحمل .</p>\n\n<ul>\n	<li>مزودة بمؤشر ليد لمعرفة حالة البطارية .</li>\n</ul>', '<p>With two ports: ( PD &amp; USB )<br />\nPD: Fast charge from 0% to 60% in 35 minutes.<br />\n= Multiple and heavy-duty protection.</p>\n\n<p>Equipped with an LED indicator to know the status of the battery.</p>', 'Small in size smaller than credit cards.', 'صغيره الحجم أصغر من بطاقات الائتمانية.', '16255789662155387372849.jpg', 112.17, 0.00, 68.00, 72.00, 74.00, 25, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-08-05 18:26:45', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6067, 114, 74, '2155387372832', 1, 'simple', 'بطارية متنقلة 10000 ملي امبير برودو  18 واط  منفذPD - فضي', 'porodo power bank 10000 mAh QC 3.0 with PD 18W - silver', '<ul>\n	<li><span style=\"font-size:16px\">بمنفذين : ( PD &amp; USB )</span></li>\n	<li><span style=\"font-size:16px\">PD: شحن سريع 0% الى 60% خلال 35 دقيقة .</span></li>\n</ul>\n\n<p><span style=\"font-size:16px\">= حماية متعددة و شديدة التحمل .</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">مزودة بمؤشر ليد لمعرفة حالة البطارية .</span></li>\n</ul>', '<p>With two ports: ( PD &amp; USB )<br />\nPD: Fast charge from 0% to 60% in 35 minutes.<br />\n= Multiple and heavy-duty protection.</p>\n\n<p>Equipped with an LED indicator to know the status of the battery.</p>', 'Small in size smaller than credit cards.', 'صغيره الحجم أصغر من بطاقات الائتمانية.', '16255790262155387372832.jpg', 112.17, 0.00, 68.00, 72.00, 74.00, 26, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6068, 132, 104, '811013032786', 1, 'simple', 'مسكة للجوال من هاندل - black', 'Handl smooth glitter phone grip - black', '<ul>\n	<li><span style=\"font-size:16px\">اسحبها وخلها بين اصابعك وتكون معاك مساكة لأحلى سيلفي.</span></li>\n	<li><span style=\"font-size:16px\">اسحبها للاسفل وبتكون معاك ستاند وتقدر تشاهد برامجك المفضلة اما بالطول والعرض.</span></li>\n	<li><span style=\"font-size:16px\">اسحبها للاسفل وبتكون معاك ستاند وكلم اصحابك و احبابك مكالمات فيديو بدون اهتزاز .</span></li>\n	<li><span style=\"font-size:16px\">مزودة بمطاط قوي يرجع المساكة في مكانها عند عدم الاستخدام</span></li>\n	<li><span style=\"font-size:16px\">مزودة بلاصق قوي جداً تقدر تثبتها بجوالك مباشرة او بالكفر نفسه</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Drag it and slip it between your fingers and you have the sweetest selfie with you.</span></li>\n	<li><span style=\"font-size:16px\">Drag it down and you will have a stand and you can watch your favorite programs either in length or width.</span></li>\n	<li><span style=\"font-size:16px\">Pull it down and you will have a stand and talk to your friends and loved ones for video calls without vibration.</span></li>\n	<li><span style=\"font-size:16px\">Equipped with a strong rubber grip that snaps back into place when not in use</span></li>\n	<li><span style=\"font-size:16px\">Equipped with a very strong adhesive, you can attach it to your mobile phone directly or to the cover itself</span></li>\n</ul>', 'Multiple use.', 'متعددة الاستخدام.', '1625579285811013032786.jpg', 51.3, 0.00, 37.00, 42.00, 44.00, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6069, 125, 73, '7946044829173', 1, 'simple', 'ادابتر  باور اولوقي بمنفذين بي دي ومنفذ يو اس بي بقوة 65 واط - اسود', 'powerology 3-Port 65w GaN Chatge with PD UK - black', '<p>فيش جداري من باوراولجي :</p>\n\n<ul>\n	<li>2 مدخل PD بقوة 65 وات .</li>\n	<li>1 مدخل USB QC للشحن السريع.</li>\n</ul>\n\n<p>اشحن ثلاثة اجهزة في وقت واحد.</p>\n\n<p>شحن سريع للكمبيوتر المحمول.</p>\n\n<p># اشحن اجهزتك من 0% الى 60 % في 35 دقيقة .</p>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Wall fish from Powerolgy:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">2 PD inputs with a power of 65 watts.<br />\n1 USB QC port for fast charging.<br />\nCharge three devices simultaneously.</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">Fast charging for laptop.</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\"># Charge your devices from 0% to 60% in 35 minutes.</span></p>', 'Charge three devices simultaneously.', 'اشحن ثلاثة اجهزة في وقت واحد.', '16255793397946044829173.jpg', 103.48, 0.00, 96.00, 104.00, 108.00, 200, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6070, 133, 73, '6297000886725', 1, 'simple', 'حقيبة من شركة باوراولوقي 8 ف1', 'powerology 8 in 1 PD charging combo - black', '<p>تحتوي على المنتجات التالية :</p>\n\n<ul>\n	<li>بطارية متنقلة بقوة 10000 امبير تدعم الشحن اللاسلاكي .</li>\n	<li>شاحن جداري بمدخلين قوته 30 وات يدعم الشحن السريع PD</li>\n	<li>قطعتين محول اروبي / امريكي الشاحن</li>\n	<li>شاحن سيارة بقوة 30 وات بمدخلين واحد منهم يدعم تقنية PD&nbsp;</li>\n	<li>كيبل من تايب سي الى لايتنينج للايفون بطول متر/ معتمد من ابل</li>\n	<li>كيبل من تايب سي الى تايب سي بطول متر</li>\n	<li>كيبل من تايب سي الى يو اس بي بطول متر</li>\n	<li>حقيبة انيقة و جميلة لترتيب اغراضك بكل سهولة بداخلها</li>\n	<li>كل ما تحتاجه فقط هذه الحقيبة الفاخرة.</li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Contains the following products:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">10000 mAh mobile battery supports wireless charging.<br />\n30W dual port wall charger supports PD fast charging<br />\nTwo Pieces European / American Charger Adapter<br />\n30W car charger with two inputs, one of them supports PD technology<br />\nCable from Type C to Lightning for iPhone 1 meter / Apple certified معتمد<br />\nA cable from Type C to Type C, with a length of one meter<br />\nCable from Type C to USB meter long<br />\nStylish and beautiful bag to organize your things with ease inside it<br />\nAll you need is this luxury bag.</span></p>', 'Everything you need in one bag', 'كل ما تحتاج في حقيبة واحدة', '16255251356297000886725.jpg', 303.48, 0.00, 224.00, 235.00, 245.00, 129, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6071, 115, 73, '7946044828800', 1, 'simple', 'كيبل باوراولوقي لايتنينج - يو اس بي 3.0م اسود', 'powerology USB-A to lightning cable 3M', '<p><span style=\"font-size:16px\">كيبل لايتنينج للايفون بطول 3 متر :</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">نقل البيانات والشحن الشحن السريع .</span></li>\n	<li><span style=\"font-size:16px\">حماية اضافية للطبقة الخارجية لتحسين و تقليل تآكل الاطراف.</span></li>\n	<li><span style=\"font-size:16px\">معتمد من شركة ابل&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين&nbsp;</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Lightning cable for iPhone 3 meters long:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">Data transfer and fast charging.<br />\nExtra protection for the outer layer to improve and reduce the wear of the ends.<br />\nCertified by Apple<br />\n2 years warranty</span></p>', '3 meters long.', 'بطول 3 متر .', '16255830917946044828800.jpg', 51.3, 0.00, 34.00, 38.00, 40.00, 300, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6072, 115, 73, '7946044829036', 1, 'simple', 'كيبل باوراولوقي لايتنينج - تايب سي 3.0م اسود', 'powerology USB-C to lightning cable 3M', '<ul>\n	<li><span style=\"font-size:16px\">نقل البيانات والشحن بسرعة فائقة</span></li>\n	<li><span style=\"font-size:16px\">حماية اضافية للطبقة الخارجية لتحسين المتانة و تقليل تآكل الأطراف</span></li>\n	<li><span style=\"font-size:16px\">&nbsp;معتمد من ابل.</span></li>\n	<li><span style=\"font-size:16px\">شركة باوراولجي الكندية&nbsp;</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Ultra-fast data transfer and charging<br />\nAdditional protection for the outer layer to improve durability and reduce tip wear<br />\nCertified by Apple.<br />\nCanadian Powerology Company</span></p>', 'Supports fast charging.', 'يدعم الشحن السريع.', '16255254627946044829036.jpg', 94.78, 0.00, 39.00, 43.00, 46.00, 330, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1);
INSERT INTO `products` (`id`, `parent_id`, `brand_id`, `product_code`, `status`, `type`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `short_desc_en`, `short_desc_ar`, `product_photo`, `product_price`, `product_price1`, `product_price2`, `product_price3`, `product_price4`, `product_quantity`, `length`, `width`, `height`, `length_class`, `weight`, `weight_class`, `created_at`, `updated_at`, `details_ar`, `details_en`, `viewed_levels`, `video`, `yt_video`, `sort`) VALUES
(6073, 115, 73, '6297000886527', 1, 'simple', 'كيبل باوراولوقي لايتنينج - اي يو اكس 1.2م رمادي', 'powerology aluminum braided lightining to 3.5mm AUX cable 1.2/4ft - gray', NULL, NULL, NULL, NULL, '16255254966297000886527.jpg', 68.7, 0.00, 39.00, 43.00, 46.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6074, 126, 111, '745760770502', 1, 'simple', 'ماكينة نمبر ون', 'N1M 0235', '<p><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567380082451.png\" style=\"height:424px; width:300px\" /></p>\n\n<p><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567380090162.png\" style=\"height:424px; width:300px\" /></p>\n\n<p><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567380097693.png\" style=\"height:424px; width:300px\" /></p>\n\n<p><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567380105374.png\" style=\"height:424px; width:300px\" /></p>\n\n<p><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567380114395.png\" style=\"height:424px; width:300px\" /></p>\n\n<p><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567380122996.png\" style=\"height:424px; width:300px\" /></p>\n\n<p><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567380130487.png\" style=\"height:424px; width:300px\" /></p>\n\n<p><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567380138098.png\" style=\"height:424px; width:300px\" /></p>\n\n<p><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567380145569.png\" style=\"height:424px; width:300px\" /></p>\n\n<p><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/1625673801530110.png\" style=\"height:424px; width:300px\" /></p>\n\n<p><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567406687381.png\" style=\"height:424px; width:300px\" /></p>\n\n<p><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567406694642.png\" style=\"height:424px; width:300px\" /></p>\n\n<p><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567406702063.png\" style=\"height:424px; width:300px\" /></p>\n\n<p><img alt=\"\" src=\"https://mrkzgulfup.com/uploads/162567406708894.png\" style=\"height:424px; width:300px\" /></p>\n\n<p><span style=\"color:#e74c3c\"><strong>ابدأ الان .</strong></span></p>', NULL, 'Number One machine, the first savior of stockpiling :)', 'ماكينة نمبر ون ، المنقذ الاول لتراكم المخزون :)', '1625529785machine.jpg', 2999, 0.00, 2999.00, 2999.00, 2999.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6075, 127, 111, '745760770519', 1, 'simple', 'تغليف حراري للجوال شفاف نمبر ون', 'Small Blank Clear Number One', '<ul>\n	<li><span style=\"font-size:16px\">تغليف حراري شفاف لحماية آمنة ومتكاملة لجهازك.</span></li>\n	<li><span style=\"font-size:16px\">عالي الوضوح.</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للخدوش.</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للصدمات.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مرن ومنحني مع الاطراف.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">سماعة اقل من 0.02 مم.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مخصص حسب اي جهاز.</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Transparent thermal laminator for safe, all-in-one protection for your device.</span></li>\n	<li><span style=\"font-size:16px\">high-definition.</span></li>\n	<li><span style=\"font-size:16px\">Scratch resistant.</span></li>\n	<li><span style=\"font-size:16px\">Shock resistant.</span></li>\n	<li><span style=\"font-size:16px\">Flexible and curved with the edges.</span></li>\n	<li><span style=\"font-size:16px\">Headphone less than 0.02 mm.</span></li>\n	<li><span style=\"font-size:16px\">Customized for any device.</span></li>\n</ul>', 'Safe and complete protection for your device.', 'حماية آمنة ومتكاملة لجهازك.', '16255856731-02.jpg', 86.09, 0.00, 29.00, 29.00, 29.00, 3550, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6076, 127, 111, '745760770540', 1, 'simple', 'تغليف حراري للجوال مطفي نمبر ون', 'Small Blank Matt Number One', '<ul>\n	<li><span style=\"font-size:16px\">تغليف حراري شفاف لحماية آمنة ومتكاملة لجهازك.</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للبصمة لايترك اثار البصمات على جهازك.</span></li>\n	<li><span style=\"font-size:16px\">عالي الوضوح.</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للخدوش.</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للصدمات.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مرن ومنحني مع الاطراف.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">سماعة اقل من 0.02 مم.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مخصص حسب اي جهاز.</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Transparent thermal laminator for safe, all-in-one protection for your device.</span></li>\n	<li><span style=\"font-size:16px\">high-definition.</span></li>\n	<li><span style=\"font-size:16px\">Scratch resistant.</span></li>\n	<li><span style=\"font-size:16px\">Shock resistant.</span></li>\n	<li><span style=\"font-size:16px\">Flexible and curved with the edges.</span></li>\n	<li><span style=\"font-size:16px\">Headphone less than 0.02 mm.</span></li>\n	<li><span style=\"font-size:16px\">Customized for any device.</span></li>\n</ul>', 'Safe and complete protection for your device.', 'حماية آمنة ومتكاملة لجهازك.', '16255865441-01.jpg', 86.09, 0.00, 29.00, 29.00, 29.00, 2550, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6077, 127, 111, '745760770526', 1, 'simple', 'تغليف حراري للآيباد شفاف نمبر ون', 'Medium Blank Clear Number One', '<ul>\n	<li><span style=\"font-size:16px\">تغليف حراري شفاف لحماية آمنة ومتكاملة لجهازك.</span></li>\n	<li><span style=\"font-size:16px\">عالي الوضوح.</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للخدوش.</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للصدمات.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مرن ومنحني مع الاطراف.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">سماعة اقل من 0.02 مم.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مخصص حسب اي جهاز.</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li>Transparent thermal laminator for safe, all-in-one protection for your device.</li>\n	<li>high-definition.</li>\n	<li>Scratch resistant.</li>\n	<li>Shock resistant.</li>\n	<li>Flexible and curved with the edges.</li>\n	<li>Headphone less than 0.02 mm.</li>\n	<li>Customized for any device.</li>\n</ul>', 'Safe and complete protection for your devices.', 'حماية آمنة ومتكاملة لأجهزتك.', '16255872631-02-01.jpg', 112.17, 0.00, 45.00, 45.00, 45.00, 300, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6078, 127, 111, '745760770533', 1, 'simple', 'تغليف حراري للابتوب شفاف نمبر ون', 'Large Blank Clear Number One', '<ul>\n	<li><span style=\"font-size:16px\">تغليف حراري شفاف لحماية آمنة ومتكاملة لجهازك.</span></li>\n	<li><span style=\"font-size:16px\">عالي الوضوح.</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للخدوش.</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للصدمات.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مرن ومنحني مع الاطراف.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">سماعة اقل من 0.02 مم.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مخصص حسب اي جهاز.</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Transparent thermal laminator for safe, all-in-one protection for your device.</span></li>\n	<li><span style=\"font-size:16px\">high-definition.</span></li>\n	<li><span style=\"font-size:16px\">Scratch resistant.</span></li>\n	<li><span style=\"font-size:16px\">Shock resistant.</span></li>\n	<li><span style=\"font-size:16px\">Flexible and curved with the edges.</span></li>\n	<li><span style=\"font-size:16px\">Headphone less than 0.02 mm.</span></li>\n	<li><span style=\"font-size:16px\">Customized for any device.</span></li>\n</ul>', 'Safe and complete protection for your devices.', 'حماية آمنة ومتكاملة لجهازك.', '16255879247572021204242-01.jpg', 129.57, 0.00, 65.00, 65.00, 65.00, 85, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6079, 115, 73, '7946044828978', 1, 'simple', 'كيبل باوراولوقي لايتنينج - يو اس بي 3.0م ابيض', 'powerology USB-A to lightning cable 3M white', '<ul>\n	<li><span style=\"font-size:16px\">مزامنة البيانات بسرعة وشحنها. 2.4 أمبير تيار الشحن يضمن وقت الشحن الأمثل.</span></li>\n	<li><span style=\"font-size:16px\">تضمن المواد المتينة والمقاومة للحريق السلامة من ارتفاع درجة الحرارة والتيار الزائد.</span></li>\n	<li><span style=\"font-size:16px\">معتمد من شركة ابل&nbsp;</span></li>\n</ul>\n\n<p>&nbsp;</p>', '<p>Quickly sync and charge data. 2.4A charging current ensures optimum charging time.<br />\nDurable and fire retardant materials ensure safety from overheating and overcurrent.<br />\nCertified by Apple</p>', 'Charge and transfer your data at lightning speed.', 'اشحن و انقل بياناتك بسرعة عالية.', '16255879887946044828978.jpg', 86.09, 0.00, 34.00, 38.00, 40.00, 300, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6080, 127, 71, '850005443575', 1, 'simple', 'تغليف حراري للساعات (مطفي) بروتكشن برو', 'Ultra Film Extra Small Blank (Matt)', '<p><span style=\"font-size:16px\"><strong>تغليف حراري شفاف مطفي&nbsp;للاجهزة مثل :</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">تغليف حراري مطفي ( للساعات الذكية والاساور ، و الايربودز بجميع اصدارتها ، وشاشات الكاميرات والعديد من الاجهزة الصغيرة الذكية )&nbsp;</span></li>\n</ul>\n\n<p><span style=\"font-size:16px\"><strong>التغليف الحراري من شركة بروتكشن برو من مميزات التغليف :&nbsp;</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">مقاوم للصدمات.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للبصمة لايترك آثر البصمات&nbsp;على الجهاز.</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للخدوش.</span></li>\n	<li><span style=\"font-size:16px\">مرن مع الاطراف.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">عالي الوضوح.</span></li>\n	<li><span style=\"font-size:16px\">سُمكه اقل من 0.02 مم.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">منتجات شركة بروتكشن برو معتمده من قبل وكالة ناسا الامريكية .</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Matte transparent thermal packaging for devices such as:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">Matte thermal packaging (for smart watches, bracelets, AirPods of all versions, camera screens and many smart small devices)<br />\nThermal packaging from Protection Pro Company of packaging features:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">Shock resistant.<br />\nAnti-fingerprint does not leave fingerprints on the device.<br />\nScratch resistant.<br />\nFlexible with sides.<br />\nhigh-definition.<br />\nIts thickness is less than 0.02 mm.<br />\nProtection Pro products are certified by NASA.</span></p>', 'Protect your small smart devices.', 'احمي اجهزتك الذكية الصغيرة .', '1625588745التغليف الحراري من بروتكشن برو للساعات التغليف المطفي-01.jpg', 60, 0.00, 30.00, 36.00, 36.00, 250, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6081, 127, 71, '850005443636', 1, 'simple', 'تغليف حراري للايباد (مطفي) بروتكشن برو', 'Ultra Film Large 8.5X12 Blank (Matt)', '<p><strong>تغليف حراري شفاف مطفي&nbsp;للاجهزة مثل :</strong></p>\n\n<ul>\n	<li>تغليف حراري&nbsp;شفاف للاجهزة المتوسطة الحجم مثل : ( الايباد ، والتابلت 7 انش , 10 انش ، والاجهزة الللوحية الاخرى )</li>\n</ul>\n\n<p><strong>التغليف الحراري من شركة بروتكشن برو من مميزات التغليف :&nbsp;</strong></p>\n\n<ul>\n	<li>مقاوم للصدمات.&nbsp;</li>\n	<li>مقاوم للبصمة لايترك آثر البصمات&nbsp;على الجهاز.</li>\n	<li>مقاوم للخدوش.</li>\n	<li>مرن مع الاطراف.&nbsp;</li>\n	<li>عالي الوضوح.</li>\n	<li>سُمكه اقل من 0.02 مم.&nbsp;</li>\n	<li>منتجات شركة بروتكشن برو معتمده من قبل وكالة ناسا الامريكية .</li>\n</ul>', '<p>Matte transparent thermal packaging for devices such as:</p>\n\n<p>Thermal transparent packaging for medium-sized devices such as: (iPad, 7-inch, 10-inch tablets, and other tablets)<br />\nThermal packaging from Protection Pro Company of packaging features:</p>\n\n<p>Shock resistant.<br />\nAnti-fingerprint does not leave fingerprints on the device.<br />\nScratch resistant.<br />\nFlexible with sides.<br />\nhigh-definition.<br />\nIts thickness is less than 0.02 mm.<br />\nProtection Pro products are certified by NASA.</p>', 'Your device is now protected.', 'اصبح جهازك محمي.', '1625589831850005443636-05.jpg', 139, 0.00, 86.00, 94.00, 94.00, 720, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6082, 127, 71, '850005443667', 1, 'simple', 'تغليف حراري للابتوبات (مطفي) بروتكشن برو', 'Ultra  Film X Large 8.5 X 12.5 Blank', NULL, NULL, NULL, NULL, '1625591873XL MATT-05.jpg', 199, 0.00, 112.00, 125.00, 125.00, 120, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6083, 115, 77, '848061041088', 1, 'simple', 'كيبل انكر  لايتننج - يو اس بي 0.9م اسود', 'Anker PowerLine II lightning - usb 3Ft Cable Black', '<ul>\n	<li><span style=\"font-size:16px\">معتمد من شركة ابل.</span></li>\n	<li><span style=\"font-size:16px\">للشحن و نقل البيانات بسرعة البرق.</span></li>\n	<li><span style=\"font-size:16px\">بطول 90 سم.</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين.</span></li>\n</ul>\n\n<p>&nbsp;</p>', '<p dir=\"ltr\"><span style=\"font-size:16px\"><strong>Certified by Apple.<br />\nFor charging and data transfer at lightning speed.<br />\n90 cm long.<br />\nTwo years warranty.</strong></span></p>', 'For charging and data transfer.', 'للشحن و نقل البيانات.', '1625529908848061041088.jpg', 77.39, 0.00, 28.00, 29.00, 30.00, 803, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6084, 115, 77, '848061016826', 1, 'simple', 'كيبل انكر  لايتننج - يو اس بي 0.9م قماش اسود', 'Anker PowerLine II lightning - usb 3Ft Cable Black', '<p><span style=\"font-size:16px\">من مميزات الكيبل :</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">معتمد من شركة ابل.</span></li>\n	<li><span style=\"font-size:16px\">للشحن و نقل البيانات بسرعة البرق.</span></li>\n	<li><span style=\"font-size:16px\">بطول 90 سم.</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للقطع.</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين.</span></li>\n</ul>\n\n<p>&nbsp;</p>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Features of the cable:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">Certified by Apple.<br />\nFor charging and data transfer at lightning speed.<br />\n90 cm long.<br />\nCut resistant.<br />\nTwo years warranty.</span></p>', 'Covered in a cut-resistant fabric.', 'مغطى بالقماش المقاوم للقطع.', '1625595463848061016826.jpg', 77.39, 0.00, 34.00, 35.00, 36.00, 250, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6085, 115, 77, '848061041460', 1, 'simple', 'كيبل انكر  لايتننج - يو اس بي 3م اسود', 'Anker PowerLine II lightning - usb 9Ft Cable Black', '<ul>\n	<li><span style=\"font-size:16px\">تم اختبار القوة&nbsp; التحمل للكيبل حتى 175 رطلاً&nbsp; وتم ثنيه&nbsp; 12000+&nbsp;.</span></li>\n	<li><span style=\"font-size:16px\">معتمد من شركة ابل&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">للشحن و نقل البيانات&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">بطول 3 متر&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين&nbsp;</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Cable has durability tested to 175 lbs and 12,000+ bends.<br />\nCertified by Apple<br />\nFor charging and data transfer<br />\n3 meters long<br />\n2 years warranty</span></p>', 'Cable for charging and data transfer with a length of 3 meters.', 'كيبل للشحن و نقل البيانات بطول 3 متر.', '1625596882848061041460.jpg', 42.61, 0.00, 44.00, 45.00, 47.00, 200, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6086, 114, 77, '848061038835', 1, 'simple', 'بطارية متنقلة  10050 ملي امبير انكر اسود بمنفذ كيو سي', 'Anker PowerCore+ 10050mAh Power Bank QC 3.0 - Black', NULL, NULL, NULL, NULL, '1625530006848061038835.jpg', 112.17, 0.00, 70.00, 72.00, 74.00, 117, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6087, 114, 77, '848061054620', 1, 'simple', 'بطارية متنقلة  10000ملي امبير انكر اسود بمنفذين.', 'Anker Pwerbank 10000 black', '<ul>\n	<li><span style=\"font-size:16px\">بسعة 10.000 مللي امبير.</span></li>\n	<li><span style=\"font-size:16px\">منفذ&nbsp; يو اس بي.</span></li>\n	<li><span style=\"font-size:16px\">منفذ&nbsp;</span>&nbsp;تايب سي.</li>\n	<li><span style=\"font-size:16px\">مؤشر ليد لمعرفة حالة البطارية.</span></li>\n	<li><span style=\"font-size:16px\">تدعم خاصية Qi.</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين.</span></li>\n</ul>\n\n<p>&nbsp;</p>', '<p dir=\"ltr\"><span style=\"font-size:16px\">With a capacity of 10,000 mAh.<br />\nUSB input.<br />\nType C entrance.<br />\nLED indicator for battery status.<br />\nSupports Qi feature.<br />\nTwo years warranty.</span></p>', 'Supports Qi fast charging.<span class=\"emoji-outer emoji-sizer\"><span class=\"emoji-inner\" style=\"background: url(chrome-extension://gaoflciahikhligngeccdecgfjngejlh/emoji-data/sheet_apple_32.png);background-position:95.94594594594594% 77.96709753231492%;background-size:5418.75% 5418.75%\" data-codepoints=\"26a1\"></span></span>', 'تدعم خاصية Qi للشحن السريع<span class=\"emoji-outer emoji-sizer\"><span class=\"emoji-inner\" style=\"background: url(chrome-extension://gaoflciahikhligngeccdecgfjngejlh/emoji-data/sheet_apple_32.png);background-position:95.94594594594594% 77.96709753231492%;background-size:5418.75% 5418.75%\" data-codepoints=\"26a1\"></span></span>.', '1625531647848061054620.jpg', 86.09, 0.00, 62.00, 63.00, 64.00, 70, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6088, 114, 77, '848061070156', 1, 'simple', 'بطارية متنقلة  10400ملي امبير انكر اسود بمنفذين', 'Anker Pwerbank 10400 black', '<ul>\n	<li><span style=\"font-size:16px\">بطارية بسعة 10400 ملي امبير</span></li>\n	<li><span style=\"font-size:16px\">منفذين يو اس بي</span></li>\n	<li><span style=\"font-size:16px\">مؤشر ليد لمعرفة حالة البطارية</span></li>\n	<li><span style=\"font-size:16px\">تدعم خاصية Qi</span></li>\n	<li><span style=\"font-size:16px\">اشحن جهازين في وقت واحد </span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين</span></li>\n</ul>\n\n<p>&nbsp;</p>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Battery with a capacity of 10400 mAh<br />\nTwo USB inputs<br />\nLED indicator for battery status<br />\nSupport Qi<br />\nCharge two devices at once<br />\n2 years warranty</span></p>', 'Small size, large mAh.', 'صغيرة الحجم كبيرة الامبير.', '1625531729848061070156.jpg', 86.09, 0.00, 62.00, 63.00, 64.00, 44, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6089, 115, 77, '848061010640', 1, 'simple', 'كيبل انكر لايتنينج - اي يو اكس  0.9 م اسود', 'ANKER CABLE IPHONE TO AUX 0.9', '<ul>\n	<li><span style=\"font-size:16px\">كيبل اي او اكس محول الى لايتنينج للايفون</span></li>\n	<li><span style=\"font-size:16px\">صوت نقي وعالي جدا</span></li>\n	<li><span style=\"font-size:16px\">بطول 90 سم</span></li>\n	<li><span style=\"font-size:16px\">معتمد من شركة ابل</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">AUX to Lightning Converter Cable for iPhone<br />\npure and loud sound<br />\n90 cm long<br />\nCertified by Apple<br />\n2 years warranty</span></p>', 'pure and loud sound', 'صوت نقي وعالي جدا', '1625531796848061010640.jpg', 77.39, 0.00, 46.00, 48.00, 49.00, 9, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6090, 125, 77, '848061038712', 1, 'simple', 'ادابتر انكر 18واط اسود + كيبل 0.9م مايكرو - يو اس بي', 'Anker PowerPort+ 1 with 3ft Micro USB Cable Black', '<ul>\n	<li><span style=\"font-size:16px\"><strong>بكج&nbsp; من شركة انكر 2 في 1 :</strong></span></li>\n	<li><span style=\"font-size:16px\">فيش جداري ثلاثي بقوة 18 واط بمدخل مايكرو (مقاوم للتيار الكهربائي).</span></li>\n	<li><span style=\"font-size:16px\">كيبل مايكرو بطول 90 سم.</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين.</span></li>\n</ul>\n\n<p>&nbsp;</p>', '<p>Package from Anker company 2 in 1 :<br />\nTriple wall socket with a power of 18 watts with a micro input (resisting the electric current).<br />\nMicro cable 90 cm long.<br />\nTwo years warranty.</p>', '2 in 1 package.', 'بكج 2 في 1 .', '1625531953848061038712.jpg', 112.17, 0.00, 42.00, 43.00, 44.00, 78, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6091, 115, 77, '848061016864', 1, 'simple', 'كيبل انكر  لايتنينج - يو اس بي  1.8م  قماش - اسود', 'Anker PowerLine Select+ USB Cable with Lightning 6ft - Black', '<ul>\n	<li><span style=\"font-size:16px\">معتمد من شركة ابل.</span></li>\n	<li><span style=\"font-size:16px\">مصنوع من القماش المقاوم للقطع.</span></li>\n	<li><span style=\"font-size:16px\">للشحن و نقل البيانات بسرعة البرق.</span></li>\n	<li><span style=\"font-size:16px\">بطول 1.80سم.</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للقطع.</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين.</span></li>\n</ul>\n\n<p>&nbsp;</p>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Certified by Apple.</span></li>\n	<li><span style=\"font-size:16px\">Made of cut-resistant fabric.</span></li>\n	<li><span style=\"font-size:16px\">For charging and data transfer at lightning speed.</span></li>\n	<li><span style=\"font-size:16px\">1.80 cm long.</span></li>\n	<li><span style=\"font-size:16px\">Cut resistant.</span></li>\n	<li><span style=\"font-size:16px\">Two years warranty.</span></li>\n</ul>', 'Covered with a cut-resistant fabric.', 'مغطى بالقماش المقاوم للقطع .', '1625531990848061016864.jpg', 51.3, 0.00, 36.00, 37.00, 40.00, 250, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6092, 115, 77, '848061043150', 1, 'simple', 'كيبل انكر  تايب سي - لايتننج 1.8م  قماش - اسود', 'Anker Powerline Select USB-C 6ft Cable With Lightning', '<ul>\n	<li><span style=\"font-size:16px\">معتمد من شركة ابل.</span></li>\n	<li><span style=\"font-size:16px\">مغطى بالقماش مما يساعده على مقاومة القطع و التلف .</span></li>\n	<li><span style=\"font-size:16px\">عند الاستخدام مع الكيبل فيش بمدخل PD تشحن جهاز الايفون من 0% الى 60% خلال 35 دقيقة .</span></li>\n	<li><span style=\"font-size:16px\">للشحن و نقل البيانات بسرعة البرق.</span></li>\n	<li><span style=\"font-size:16px\">بطول 1.80سم.</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين.</span></li>\n</ul>\n\n<p>&nbsp;</p>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Certified by Apple.<br />\nCovered with fabric, which helps it to resist cuts and damage.<br />\nWhen used with a cable with a PD input, the iPhone will be charged from 0% to 60% within 35 minutes.<br />\nFor charging and data transfer at lightning speed.<br />\n1.80 cm long.<br />\nTwo years warranty.</span></p>', 'Supports fast charging.', 'يدعم الشحن السريع.', '1625532187848061043150.jpg', 68.7, 0.00, 48.00, 49.00, 50.00, 40, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6093, 128, 71, '850017782303', 1, 'simple', 'ملقط للتركيب', 'Tweezer install', NULL, NULL, NULL, NULL, '1625681113850017782303-3.png', 9, 0.00, 9.00, 9.00, 9.00, 287, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-08-10 11:41:18', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6094, 118, 113, '855202100101', 1, 'simple', 'حماية لوكسار ايفون 12 برو ماكس شفاف قزاز', 'Protection Screen iphone 12 Pro Max Clear', '<p><strong><span style=\"font-size:16px\">استكر حماية من لوكسار:&nbsp;</span></strong></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">مقاوم للخدوش</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للصدمات&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">ناعم لا يأثر على استجابة اللمس&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">عالي الوضوح&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">سهلة التركيب .&nbsp;</span></li>\n</ul>\n\n<p><strong><span style=\"font-size:16px\">ملحقات العلبة :&nbsp;</span></strong></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">الاستكر الحماية</span></li>\n	<li><span style=\"font-size:16px\">قالب للتثبيت الاستكر بشكل متوازن على الجهاز.</span></li>\n	<li><span style=\"font-size:16px\">فوطة لإزالة البصمات و الاتربة .. إلخ.</span></li>\n	<li><span style=\"font-size:16px\">منديل كحولي للتعقيم.</span></li>\n	<li><span style=\"font-size:16px\">لاصق لازالة&nbsp; الشوائب قبل تركيب الاستكر على الجهاز.</span></li>\n</ul>\n\n<p>&nbsp;</p>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Loksar Protective Sticker:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">scratch resistant<br />\nShock Resistant<br />\nSoft and does not affect the touch response<br />\nhigh-definition<br />\nEasy to install.<br />\nCase accessories:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">protection sticker<br />\nA template for installing the sticker in a balanced manner on the device.<br />\nTowel to remove fingerprints and dust...etc.<br />\nAn alcohol wipe for sterilization.<br />\nAdhesive to remove impurities before installing the sticker on the device.</span></p>', 'STRONG - POWER - EFFICIENCY', 'حماية - صلابة - متانة .', '162560194401-05.jpg', 86.09, 0.00, 29.00, 32.00, 35.00, 197, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6095, 118, 113, '855202100102', 1, 'simple', 'حماية لوكسار ايفون 12 برو شفاف قزاز', 'Protection Screen iphone 12 Pro  Clear', '<p><span style=\"font-size:16px\"><strong>استكر حماية من لوكسار:&nbsp;</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">مقاوم للخدوش</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للصدمات&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">ناعم لا يأثر على استجابة اللمس&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">عالي الوضوح&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">سهلة التركيب .&nbsp;</span></li>\n</ul>\n\n<p><span style=\"font-size:16px\"><strong>ملحقات العلبة :&nbsp;</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">الاستكر الحماية</span></li>\n	<li><span style=\"font-size:16px\">قالب للتثبيت الاستكر بشكل متوازن على الجهاز.</span></li>\n	<li><span style=\"font-size:16px\">فوطة لإزالة البصمات و الاتربة .. إلخ.</span></li>\n	<li><span style=\"font-size:16px\">منديل كحولي للتعقيم.</span></li>\n	<li><span style=\"font-size:16px\">لاصق لازالة&nbsp; الشوائب قبل تركيب الاستكر على الجهاز.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Loksar Protective Sticker:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">scratch resistant<br />\nShock Resistant<br />\nSoft and does not affect the touch response<br />\nhigh-definition<br />\nEasy to install.<br />\nCase accessories:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">protection sticker<br />\nA template for installing the sticker in a balanced manner on the device.<br />\nTowel to remove fingerprints and dust...etc.<br />\nAn alcohol wipe for sterilization.<br />\nAdhesive to remove impurities before installing the sticker on the device.</span></p>', 'STRONG - POWER - EFFICIENCY', 'حماية - صلابة - متانة .', '162560348901-02.jpg', 86.09, 0.00, 29.00, 32.00, 35.00, 98, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-15 14:02:14', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6096, 118, 113, '855202100103', 1, 'simple', 'حماية لوكسار ايفون 12 شفاف قزاز', 'Protection Screen iphone 12 Clear', '<p><span style=\"font-size:16px\"><strong>استكر حماية من لوكسار:&nbsp;</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">مقاوم للخدوش</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للصدمات&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">ناعم لا يأثر على استجابة اللمس&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">عالي الوضوح&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">سهلة التركيب .&nbsp;</span></li>\n</ul>\n\n<p><span style=\"font-size:16px\"><strong>ملحقات العلبة :&nbsp;</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">الاستكر الحماية</span></li>\n	<li><span style=\"font-size:16px\">قالب للتثبيت الاستكر بشكل متوازن على الجهاز.</span></li>\n	<li><span style=\"font-size:16px\">فوطة لإزالة البصمات و الاتربة .. إلخ.</span></li>\n	<li><span style=\"font-size:16px\">منديل كحولي للتعقيم.</span></li>\n	<li><span style=\"font-size:16px\">لاصق لازالة&nbsp; الشوائب قبل تركيب الاستكر على الجهاز.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Loksar Protective Sticker:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">scratch resistant<br />\nShock Resistant<br />\nSoft and does not affect the touch response<br />\nhigh-definition<br />\nEasy to install.<br />\nCase accessories:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">protection sticker<br />\nA template for installing the sticker in a balanced manner on the device.<br />\nTowel to remove fingerprints and dust...etc.<br />\nAn alcohol wipe for sterilization.<br />\nAdhesive to remove impurities before installing the sticker on the device.</span></p>', 'STRONG - POWER - EFFICIENCY', 'حماية - صلابة - متانة .', '162560388001-03.jpg', 86.09, 0.00, 29.00, 32.00, 35.00, 96, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:17:51', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6097, 118, 113, '855202100104', 1, 'simple', 'حماية لوكسار ايفون 12 ميني شفاف قزاز', 'Protection Screen iphone 12 Mini Clear', '<p><strong>استكر حماية من لوكسار:&nbsp;</strong></p>\n\n<ul>\n	<li>مقاوم للخدوش</li>\n	<li>مقاوم للصدمات&nbsp;</li>\n	<li>ناعم لا يأثر على استجابة اللمس&nbsp;</li>\n	<li>عالي الوضوح&nbsp;</li>\n	<li>سهلة التركيب .&nbsp;</li>\n</ul>\n\n<p><strong>ملحقات العلبة :&nbsp;</strong></p>\n\n<ul>\n	<li>الاستكر الحماية</li>\n	<li>قالب للتثبيت الاستكر بشكل متوازن على الجهاز.</li>\n	<li>فوطة لإزالة البصمات و الاتربة .. إلخ.</li>\n	<li>منديل كحولي للتعقيم.</li>\n	<li>لاصق لازالة&nbsp; الشوائب قبل تركيب الاستكر على الجهاز.</li>\n</ul>', '<p dir=\"ltr\">Loksar Protective Sticker:</p>\n\n<p dir=\"ltr\">scratch resistant<br />\nShock Resistant<br />\nSoft and does not affect the touch response<br />\nhigh-definition<br />\nEasy to install.<br />\nCase accessories:</p>\n\n<p dir=\"ltr\">protection sticker<br />\nA template for installing the sticker in a balanced manner on the device.<br />\nTowel to remove fingerprints and dust...etc.<br />\nAn alcohol wipe for sterilization.<br />\nAdhesive to remove impurities before installing the sticker on the device.</p>', 'STRONG - POWER - EFFICIENCY', 'حماية - صلابة - متانة .', '162567470701-08.jpg', 86.09, 0.00, 29.00, 32.00, 35.00, 98, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:18:24', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6098, 118, 113, '855202100105', 1, 'simple', 'حماية لوكسار ايفون 12 برو ماكس خصوصية قزاز', 'Protection Screen iphone 12 Pro Max Privacy', '<p><span style=\"font-size:16px\"><strong>استكر حماية من لوكسار:&nbsp;</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">مقاوم للخدوش</span></li>\n	<li><span style=\"font-size:16px\">حماية للخصوصية</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للصدمات&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">ناعم لا يأثر على استجابة اللمس&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">عالي الوضوح&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">سهلة التركيب .&nbsp;</span></li>\n</ul>\n\n<p><span style=\"font-size:16px\"><strong>ملحقات العلبة :&nbsp;</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">الاستكر الحماية</span></li>\n	<li><span style=\"font-size:16px\">قالب للتثبيت الاستكر بشكل متوازن على الجهاز.</span></li>\n	<li><span style=\"font-size:16px\">فوطة لإزالة البصمات و الاتربة .. إلخ.</span></li>\n	<li><span style=\"font-size:16px\">منديل كحولي للتعقيم.</span></li>\n	<li><span style=\"font-size:16px\">لاصق لازالة&nbsp; الشوائب قبل تركيب الاستكر على الجهاز.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Loksar Protective Sticker:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">scratch resistant<br />\nShock Resistant<br />\nSoft and does not affect the touch response<br />\nhigh-definition<br />\nEasy to install.<br />\nCase accessories:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">protection sticker<br />\nA template for installing the sticker in a balanced manner on the device.<br />\nTowel to remove fingerprints and dust...etc.<br />\nAn alcohol wipe for sterilization.<br />\nAdhesive to remove impurities before installing the sticker on the device.</span></p>', 'STRONG - POWER - EFFICIENCY', 'حماية - صلابة - متانة .', '162567493901-01.jpg', 86.09, 0.00, 32.00, 34.00, 40.00, 197, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:18:33', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6099, 118, 113, '855202100106', 1, 'simple', 'حماية لوكسار ايفون 12 برو خصوصية قزاز', 'Protection Screen iphone 12 Pro  Privacy', NULL, NULL, NULL, NULL, '162577208401-02.jpg', 86.09, 0.00, 32.00, 34.00, 40.00, 98, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:18:51', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6100, 118, 113, '855202100107', 1, 'simple', 'حماية لوكسار ايفون 12 خصوصية قزاز', 'Protection Screen iphone 12 Privacy', '<p><span style=\"font-size:16px\"><strong>استكر حماية من لوكسار:&nbsp;</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">مقاوم للخدوش</span></li>\n	<li><span style=\"font-size:16px\">حماية للخصوصية</span></li>\n	<li><span style=\"font-size:16px\">مقاوم للصدمات&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">ناعم لا يأثر على استجابة اللمس&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">عالي الوضوح&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">سهلة التركيب .&nbsp;</span></li>\n</ul>\n\n<p><span style=\"font-size:16px\"><strong>ملحقات العلبة :&nbsp;</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">الاستكر الحماية</span></li>\n	<li><span style=\"font-size:16px\">قالب للتثبيت الاستكر بشكل متوازن على الجهاز.</span></li>\n	<li><span style=\"font-size:16px\">فوطة لإزالة البصمات و الاتربة .. إلخ.</span></li>\n	<li><span style=\"font-size:16px\">منديل كحولي للتعقيم.</span></li>\n	<li><span style=\"font-size:16px\">لاصق لازالة&nbsp; الشوائب قبل تركيب الاستكر على الجهاز.</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Loksar Protective Sticker:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">scratch resistant<br />\nShock Resistant<br />\nSoft and does not affect the touch response<br />\nhigh-definition<br />\nEasy to install.<br />\nCase accessories:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">protection sticker<br />\nA template for installing the sticker in a balanced manner on the device.<br />\nTowel to remove fingerprints and dust...etc.<br />\nAn alcohol wipe for sterilization.<br />\nAdhesive to remove impurities before installing the sticker on the device.</span></p>', 'STRONG - POWER - EFFICIENCY', 'حماية - صلابة - متانة .', '162568143901-03.jpg', 86.09, 0.00, 32.00, 34.00, 40.00, 96, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:19:00', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6101, 118, 113, '855202100108', 1, 'simple', 'حماية لوكسار ايفون 12 ميني خصوصية قزاز', 'Protection Screen iphone 12 Mini  Privacy', '<p><strong>استكر حماية من لوكسار:&nbsp;</strong></p>\n\n<ul>\n	<li>مقاوم للخدوش</li>\n	<li>حماية للخصوصية</li>\n	<li>مقاوم للصدمات&nbsp;</li>\n	<li>ناعم لا يأثر على استجابة اللمس&nbsp;</li>\n	<li>عالي الوضوح&nbsp;</li>\n	<li>سهلة التركيب .&nbsp;</li>\n</ul>\n\n<p><strong>ملحقات العلبة :&nbsp;</strong></p>\n\n<ul>\n	<li>الاستكر الحماية</li>\n	<li>قالب للتثبيت الاستكر بشكل متوازن على الجهاز.</li>\n	<li>فوطة لإزالة البصمات و الاتربة .. إلخ.</li>\n	<li>منديل كحولي للتعقيم.</li>\n	<li>لاصق لازالة&nbsp; الشوائب قبل تركيب الاستكر على الجهاز.</li>\n</ul>', '<p dir=\"ltr\">Loksar Protective Sticker:</p>\n\n<p dir=\"ltr\">scratch resistant<br />\nShock Resistant<br />\nSoft and does not affect the touch response<br />\nhigh-definition<br />\nEasy to install.<br />\nCase accessories:</p>\n\n<p dir=\"ltr\">protection sticker<br />\nA template for installing the sticker in a balanced manner on the device.<br />\nTowel to remove fingerprints and dust...etc.<br />\nAn alcohol wipe for sterilization.<br />\nAdhesive to remove impurities before installing the sticker on the device.</p>', 'STRONG - POWER - EFFICIENCY', 'حماية - صلابة - متانة .', '162568200101-04.jpg', 86.09, 0.00, 32.00, 34.00, 40.00, 97, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:20:36', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6102, 127, 111, '1234', 0, 'simple', 'تغليف نمبر ون خصوصية للجوالات - S', 'Small Blank Privacy Number One', NULL, NULL, NULL, NULL, '', 77.39, 0.00, 29.00, 29.00, 29.00, 3050, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-08 04:22:03', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6103, 136, 113, '8562021001166', 1, 'simple', 'كوب ذكي لوكسار لون اسود', 'Loksar smart cup, black color', '<p><span style=\"font-size:16px\">حافظة للذكية للسوائل من لوكسار :&nbsp;</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">حافظ على درجة حرارة مشروبك الحار و البارد لمدة تصل الى 10 ساعات.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بشاشة تعمل باللمس <strong>LED </strong>لمعرفة حرارة مشروبك الحار او البارد.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بصفاية قابلة للإزالة مصنوعة من الاستيل المقاوم للصدأ مناسبة لتصفية المشروبات الحارة من الشوائب.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">لاتحتاج الى شحن.</span></li>\n	<li><span style=\"font-size:16px\">بطارية طويلة المدى ( عمر البطارية ما يقارب سنة وسهلة التغيير)</span></li>\n	<li><span style=\"font-size:16px\">الشاشة واضحة ومضيئة تعمل تحت اشعة اشمس او في المكان المظلم.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">الحافظة مصنوعة بطبقة خارجية وداخلية من الستيل عازل للحرارة و غير قابلة للصدأ.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">بتكون معاك فياي مكان في المنزل او المكتب او في السفر&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مزودة بقاعدة بالاسفل مصنوعة من الجلد مما يمنع تحرك الكوب او انزلاقة في الاسطح الناعمة.</span></li>\n	<li><span style=\"font-size:16px\">السعة 500 مل.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">متوفرة بعدة الوان.&nbsp;</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Loksar smart liquid keeper:</span></p>\n\n<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Keep your drink hot and cold for up to 10 hours.</span></li>\n	<li><span style=\"font-size:16px\">Equipped with a LED touch screen to know the temperature of your hot or cold drink.</span></li>\n	<li><span style=\"font-size:16px\">Equipped with a removable filter made of stainless steel suitable for filtering hot drinks from impurities.</span></li>\n	<li><span style=\"font-size:16px\">No need to charge.</span></li>\n	<li><span style=\"font-size:16px\">Long life battery (battery life is about a year and easy to change)</span></li>\n	<li><span style=\"font-size:16px\">The screen is clear and bright, it works under the sun&#39;s rays or in the dark.</span></li>\n	<li><span style=\"font-size:16px\">The case is made of an outer and inner layer of heat-insulating and stainless steel.</span></li>\n	<li><span style=\"font-size:16px\">The capacity is 500 ml.</span></li>\n	<li><span style=\"font-size:16px\">Available in several colours.</span></li>\n</ul>', 'By touch you can know the temperature of your drink', 'باللمس تعرف درجة حرارة مشروبك.', '16257781828562021001166.jpg', 112.17, 0.00, 43.00, 43.00, 48.00, 1346, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:20:44', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6104, 136, 113, '8512021001116', 1, 'simple', 'كوب ذكي لوكسار لون ازرق', 'Loksar smart cup, blue color', '<p><span style=\"font-size:16px\">حافظة للذكية للسوائل من لوكسار :&nbsp;</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">حافظ على درجة حرارة مشروبك الحار و البارد لمدة تصل الى 10 ساعات.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بشاشة تعمل باللمس <strong>LED </strong>لمعرفة حرارة مشروبك الحار او البارد.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بصفاية قابلة للإزالة مصنوعة من الاستيل المقاوم للصدأ مناسبة لتصفية المشروبات الحارة من الشوائب.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">لاتحتاج الى شحن.</span></li>\n	<li><span style=\"font-size:16px\">بطارية طويلة المدى ( عمر البطارية ما يقارب سنة وسهلة التغيير)</span></li>\n	<li><span style=\"font-size:16px\">الشاشة واضحة ومضيئة تعمل تحت اشعة اشمس او في المكان المظلم.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">الحافظة مصنوعة بطبقة خارجية وداخلية من الستيل عازل للحرارة و غير قابلة للصدأ.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">بتكون معاك فياي مكان في المنزل او المكتب او في السفر&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مزودة بقاعدة بالاسفل مصنوعة من الجلد مما يمنع تحرك الكوب او انزلاقة في الاسطح الناعمة.</span></li>\n	<li><span style=\"font-size:16px\">السعة 500 مل.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">متوفرة بعدة الوان.&nbsp;</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Loksar smart liquid keeper:</span></p>\n\n<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Keep your drink hot and cold for up to 10 hours.</span></li>\n	<li><span style=\"font-size:16px\">Equipped with a LED touch screen to know the temperature of your hot or cold drink.</span></li>\n	<li><span style=\"font-size:16px\">Equipped with a removable filter made of stainless steel suitable for filtering hot drinks from impurities.</span></li>\n	<li><span style=\"font-size:16px\">No need to charge.</span></li>\n	<li><span style=\"font-size:16px\">Long life battery (battery life is about a year and easy to change)</span></li>\n	<li><span style=\"font-size:16px\">The screen is clear and bright, it works under the sun&#39;s rays or in the dark.</span></li>\n	<li><span style=\"font-size:16px\">The case is made of an outer and inner layer of heat-insulating and stainless steel.</span></li>\n	<li><span style=\"font-size:16px\">The capacity is 500 ml.</span></li>\n	<li><span style=\"font-size:16px\">Available in several colours.</span></li>\n</ul>', 'By touch you can know the temperature of your drink', 'باللمس تعرف درجة حرارة مشروبك.', '16257779098512021001116.jpg', 112.17, 0.00, 43.00, 43.00, 48.00, 1263, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:20:51', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6105, 136, 113, '8522021001122', 1, 'simple', 'كوب ذكي لوكسار لون روز', 'Loksar smart cup, rose color', '<p><span style=\"font-size:16px\">حافظة للذكية للسوائل من لوكسار :&nbsp;</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">حافظ على درجة حرارة مشروبك الحار و البارد لمدة تصل الى 10 ساعات.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بشاشة تعمل باللمس <strong>LED </strong>لمعرفة حرارة مشروبك الحار او البارد.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بصفاية قابلة للإزالة مصنوعة من الاستيل المقاوم للصدأ مناسبة لتصفية المشروبات الحارة من الشوائب.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">لاتحتاج الى شحن.</span></li>\n	<li><span style=\"font-size:16px\">بطارية طويلة المدى ( عمر البطارية ما يقارب سنة وسهلة التغيير)</span></li>\n	<li><span style=\"font-size:16px\">الشاشة واضحة ومضيئة تعمل تحت اشعة اشمس او في المكان المظلم.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">الحافظة مصنوعة بطبقة خارجية وداخلية من الستيل عازل للحرارة و غير قابلة للصدأ.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">بتكون معاك فياي مكان في المنزل او المكتب او في السفر&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مزودة بقاعدة بالاسفل مصنوعة من الجلد مما يمنع تحرك الكوب او انزلاقة في الاسطح الناعمة.</span></li>\n	<li><span style=\"font-size:16px\">السعة 500 مل.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">متوفرة بعدة الوان.&nbsp;</span></li>\n</ul>', NULL, NULL, 'باللمس تعرف درجة حرارة مشروبك.', '16257765718522021001122.jpg', 112.17, 0.00, 43.00, 43.00, 48.00, 303, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:20:58', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6106, 115, 73, '6083749655698', 1, 'simple', 'كيبل باوراولوجي قماش يو اس بي - لايتنننج 1.2 م - ابيض', 'Powerology Braied USB-A To Lightining Cable 1.2 M - White', '<ul>\n	<li><span style=\"font-size:16px\">مغطى بمادة PVC المتينة والمقاومة للحريق السلامة من الإفراط في التسخين والتيار الزائد.</span></li>\n	<li><span style=\"font-size:16px\">مغطى بقماش منسوج بإحكام ، تم اختباره لتحمل ما يصل إلى 15000+ انحناء.</span></li>\n	<li><span style=\"font-size:16px\">مزامنة وشحن سريع للبيانات: 3 أمبير لشحن جهازك بأقصى سرعة.</span></li>\n	<li><span style=\"font-size:16px\">متوافق ومعتمد&nbsp; مع جميع أجهزة Apple Lightning</span></li>\n	<li>ضمان سنتين&nbsp;</li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Durable and fire retardant PVC covered with safety from overheating and overcurrent.<br />\nCovered in a tightly woven fabric, tested to withstand up to 15,000+ bends.<br />\nFast data sync and charge: 3A to charge your device at full speed.<br />\nCompatible and certified with all Apple Lightning devices<br />\n2 years warranty</span></p>', 'Covered in a tightly woven fabric.', 'مغطى بقماش منسوج بإحكام.', '162567919836C49C65-0085-4480-870C-0F2DF8EFD4C8.jpeg', 77.39, 0.00, 32.00, 34.00, 36.00, 245, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:21:49', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6107, 115, 73, '6083749655070', 1, 'simple', 'كيبل باور اولوجي تايب سي - لايتننج قماش 1.2 م - احمر', 'Powerology Braided USB-C to Lightning Cable 1.2M - Red', '<ul>\n	<li><span style=\"font-size:16px\">مغطى بمادة PVC المتينة والمقاومة للحريق السلامة من الإفراط في التسخين والتيار الزائد.</span></li>\n	<li><span style=\"font-size:16px\">مزود بمنفذ تايب سي وعند الاستخدام فيش بمدخل PD&nbsp; تشحن جهاز الايفون من 0% الى 60% خلال 35 دقيقة.</span></li>\n	<li><span style=\"font-size:16px\">مغطى بقماش منسوج بإحكام ، تم اختباره لتحمل ما يصل إلى 15000+ انحناء.</span></li>\n	<li><span style=\"font-size:16px\">مزامنة وشحن سريع للبيانات: 3 أمبير لشحن جهازك بأقصى سرعة.</span></li>\n	<li><span style=\"font-size:16px\">متوافق ومعتمد&nbsp; مع جميع أجهزة Apple Lightning</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين&nbsp;</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Durable and fire retardant PVC covered with safety from overheating and overcurrent.<br />\nCovered in a tightly woven fabric, tested to withstand up to 15,000+ bends.<br />\nFast data sync and charge: 3A to charge your device at full speed.<br />\nCompatible and certified with all Apple Lightning devices<br />\n2 years warranty</span></p>', 'Covered in a tightly woven fabric.', 'مغطى بقماش منسوج بإحكام.', '16256835166083749655070.jpg', 86.09, 0.00, 42.00, 43.00, 46.00, 500, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:22:05', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6108, 115, 73, '6083749655384', 1, 'simple', 'كيبل باوراولوجي قماش تايب سي - لايتننيج 2م - ابيض', 'Powerology Braided USB-C to Lightning Cable 2M - White', '<ul>\n	<li>مغطى بمادة PVC المتينة والمقاومة للحريق السلامة من الإفراط في التسخين والتيار الزائد.</li>\n	<li>عند الاستخدام فيش بمدخل PD&nbsp; تشحن جهازك الايفون من 0% الى 60% خلال 35 دقيقة.</li>\n	<li>مغطى بقماش منسوج بإحكام ، تم اختباره لتحمل ما يصل إلى 15000+ انحناء.</li>\n	<li>مزامنة وشحن سريع للبيانات: 3 أمبير لشحن جهازك بأقصى سرعة.</li>\n	<li>متوافق ومعتمد&nbsp;مع جميع أجهزة Apple Lightning</li>\n	<li>ضمان سنتين&nbsp;</li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Durable and fire retardant PVC covered with safety from overheating and overcurrent.<br />\nCovered in a tightly woven fabric, tested to withstand up to 15,000+ bends.<br />\nFast data sync and charge: 3A to charge your device at full speed.<br />\nCompatible and certified with all Apple Lightning devices<br />\n2 years warranty</span></p>', 'Covered in a tightly woven fabric.', 'مغطى بقماش منسوج بإحكام.', '162567926706BDD65A-64B5-4281-A7F2-42BC1E817F0A.jpeg', 86.09, 0.00, 46.00, 47.00, 49.00, 200, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:22:21', NULL, NULL, '1_2_3_4', NULL, NULL, 1);
INSERT INTO `products` (`id`, `parent_id`, `brand_id`, `product_code`, `status`, `type`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `short_desc_en`, `short_desc_ar`, `product_photo`, `product_price`, `product_price1`, `product_price2`, `product_price3`, `product_price4`, `product_quantity`, `length`, `width`, `height`, `length_class`, `weight`, `weight_class`, `created_at`, `updated_at`, `details_ar`, `details_en`, `viewed_levels`, `video`, `yt_video`, `sort`) VALUES
(6109, 115, 73, '6083749655766', 1, 'simple', 'كيبل باوراولوجي قماش يو اس بي - تايب سي 1.2م - اسود', 'Powerology Braided USB-A to Type-C Cable 1.2M - Black', '<ul>\n	<li><span style=\"font-size:16px\">مغطى بمادة PVC المتينة والمقاومة للحريق السلامة من الإفراط في التسخين والتيار الزائد.</span></li>\n	<li><span style=\"font-size:16px\">عند الاستخدام فيش بمدخل PD&nbsp; تشحن جهازك الايفون من 0% الى 60% خلال 35 دقيقة.</span></li>\n	<li><span style=\"font-size:16px\">مغطى بقماش منسوج بإحكام ، تم اختباره لتحمل ما يصل إلى 15000+ انحناء.</span></li>\n	<li><span style=\"font-size:16px\">مزامنة وشحن سريع للبيانات: 3 أمبير لشحن جهازك بأقصى سرعة.</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين&nbsp;</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Durable and fire retardant PVC covered with safety from overheating and overcurrent.<br />\nCovered in a tightly woven fabric, tested to withstand up to 15,000+ bends.<br />\nFast data sync and charge: 3A to charge your device at full speed.<br />\n2 years warranty</span></p>', 'Covered in a tightly woven fabric.', 'مغطى بقماش منسوج بإحكام.', '16256843526083749655766.jpg', 68.7, 0.00, 16.00, 18.00, 20.00, 1000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:22:38', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6110, 115, 73, '6083749655834', 1, 'simple', 'كيبل باوراولوجي قماش تايب سي - تايب سي 2م - اسود', 'Powerology Braided USB-C to USB-C Cable 2M 100W- Black', '<ul>\n	<li><span style=\"font-size:16px\">مغطى بمادة PVC المتينة والمقاومة للحريق السلامة من الإفراط في التسخين والتيار الزائد.</span></li>\n	<li><span style=\"font-size:16px\">عند الاستخدام فيش بمدخل PD&nbsp; تشحن جهازك الايفون من 0% الى 60% خلال 35 دقيقة.</span></li>\n	<li><span style=\"font-size:16px\">مغطى بقماش منسوج بإحكام ، تم اختباره لتحمل ما يصل إلى 15000+ انحناء.</span></li>\n	<li><span style=\"font-size:16px\">مزامنة وشحن سريع للبيانات: 3 أمبير لشحن جهازك بأقصى سرعة.</span></li>\n	<li><span style=\"font-size:16px\">ضمان سنتين&nbsp;</span></li>\n</ul>', '<p><span style=\"font-size:16px\">Durable and fire retardant PVC covered with safety from overheating and overcurrent.<br />\nCovered in a tightly woven fabric, tested to withstand up to 15,000+ bends.<br />\nFast data sync and charge: 3A to charge your device at full speed.<br />\n2 years warranty</span></p>', 'Covered in a tightly woven fabric.', 'مغطى بقماش منسوج بإحكام.', '16256845226083749655834.jpg', 77.39, 0.00, 24.00, 26.00, 28.00, 1000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:23:01', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6111, 125, 73, '6083749656060', 1, 'simple', 'ادابتر منزلي باوراولوجي 61 واط PD + كيبل تايب سي - تايب سي 2م  اسود', 'Powerology Ultra-Compact 61W PD GaN Charger UK with Type-C to Type-C Cable 2M - Black', '<p>بكج 2 في 1 من باور اولجي :&nbsp;</p>\n\n<p><strong>فيش (ادابتر ) جداري ثلاثي :&nbsp;</strong></p>\n\n<ul>\n	<li>بمدخل <strong>PD</strong> بقوة 65 وات بخاصية <strong>GaN</strong>&nbsp;.&nbsp;</li>\n	<li>تقدر تشحن جهاز الاندرويد الذي يدعم كيبل تايب سي&nbsp; من 0% الى 60 % خلال 35 دقيقة&nbsp;</li>\n	<li>تشحن جهازك الماك بوك &quot;13 انش&quot;&nbsp; 100% خلال 2 ساعة فقط.&nbsp;</li>\n</ul>\n\n<p><strong>كيبل تايب سي تو تايب سي :&nbsp;</strong></p>\n\n<ul>\n	<li>كيبل بطول 2 متر.</li>\n	<li>اشحن وانقل بياناتك بسرعة البرق.&nbsp;</li>\n</ul>\n\n<p>= ضمان سنتين.</p>\n\n<p>&nbsp;</p>', '<p dir=\"ltr\"><span style=\"font-size:16px\">2-in-1 package from Powerology:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">Triple wall adapter:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">With a PD input of 65 watts with GaN feature.<br />\nYou can charge an Android device that supports the Type C cable from 0% to 60% within 35 minutes<br />\nCharge your MacBook &quot;13 inch&quot; to 100% in just 2 hours.<br />\nType C to Type C Cable:</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">2 meter long cable.<br />\nCharge and transfer your data at lightning speed.<br />\n= Two years warranty.</span></p>', '2-in-1 package from Powerology . With a power of 65 watts.', 'بكج 2 في 1 من باور اولجي. بقوة 61 وات.', '1625679361CC385D01-92EE-496C-8CBC-AF4BFEDE8CB4.jpeg', 112.17, 0.00, 85.00, 88.00, 90.00, 200, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:23:10', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6112, 125, 73, '6083749656374', 1, 'simple', 'توصيلة باوراولوجي 4 منافذ  + 3 منفذ يو اس بي + منفذ بي دي بطول 2م - اسود', 'Powerology 4 AC 3 USB & USB-C PD 35W Multiport Socket with Phone Stand and Timer 2M - Black', '<p><strong><span style=\"font-size:16px\">توصيلة بطول 2 متر: </span></strong></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">4&nbsp; منافذ كهربائية.</span></li>\n	<li><span style=\"font-size:16px\">3&nbsp; منافذ USB.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">1 مدخل إضافي PD بتقنية&nbsp;QC3.0 للشحن السريع.</span></li>\n	<li><span style=\"font-size:16px\">مدمج ب Timer ليمكنك فصل الكهرباء&nbsp;&nbsp;تلقائي عند إنتهاء الوقت.</span></li>\n	<li><span style=\"font-size:16px\">مصنعة من مواد غير قابلة للحريق و مدمج بها (فيوز)&nbsp;يفصل الطاقة الكهربائية تلقائي عن&nbsp;التوصيلة&nbsp;عند حدوث التحمل الزائد او الحرائق لاسمح الله.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">يشحن&nbsp; منفذ PD الهواتف المحمولة من 0٪ إلى 60٪ في 35 دقيقة. يعتمد وقت الشحن على الجهاز والاستخدام.<span style=\"color:#e74c3c\">*</span></span></li>\n	<li><span style=\"font-size:16px\">USB-C PD Output قادر على شحن Macbook 13 &quot;Retina و 12&quot; Macbook (2015) وLenovo&nbsp; والاجهزة المحمولة المماثلة.</span></li>\n	<li><span style=\"font-size:16px\">الإدخال: 100-250 فولت ، خرج التيار المتردد: 13 أمبير 3000 وات USB-C مخرج PD: 35 وات ، USB-A QC Out: 18 وات USB-A مخرج: 12 وات 5 فولت .</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">2 meter extension:</span></li>\n	<li><span style=\"font-size:16px\">4 electrical outlets.</span></li>\n	<li><span style=\"font-size:16px\">3 USB ports.</span></li>\n	<li><span style=\"font-size:16px\">1 auxiliary PD input with QC3.0 technology for fast charging.</span></li>\n	<li><span style=\"font-size:16px\">Built in timer so you can turn off the power automatically when the time is up.</span></li>\n	<li><span style=\"font-size:16px\">It is made of non-combustible materials and has a built-in fuse that automatically disconnects the electrical power from the connection in the event of an overload or fire, God forbid.</span></li>\n	<li><span style=\"font-size:16px\">The PD port charges mobile phones from 0% to 60% in 35 minutes. Charging time depends on device and usage<span style=\"color:#e74c3c\">*</span></span></li>\n	<li><span style=\"font-size:16px\">USB-C PD Output is capable of charging Macbook 13&quot; Retina and 12&quot; Macbook (2015), Lenovo and similar portable devices.</span></li>\n	<li><span style=\"font-size:16px\">Input: 100-250V, AC output: 13A 3000W USB-C PD Output: 35W, USB-A QC Out: 18W USB-A Output: 12W 5V.</span></li>\n</ul>', 'Built in timer so you can turn off the power automatically when the time is up.', 'مدمج ب Timer ليمكنك فصل الكهرباء  تلقائي عند إنتهاء الوقت.', '1625679438B53D9332-5D5A-40C4-BA41-912406AB3921.jpeg', 120.87, 0.00, 86.00, 88.00, 90.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:23:21', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6113, 125, 73, '6083749656442', 1, 'simple', 'توصيلة باوراولوجي 4 منافذ ادابتر ثلالثي + 3 منفذ يو اس بي + منفذ بي دي بطول 3م - اسود', 'Powerology 4 AC 3 USB & USB-C PD 35W Multiport Socket with Phone Stand and Timer 3M - Black', '<p><span style=\"font-size:16px\"><strong>توصيلة بطول 3 متر: </strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">4&nbsp; منافذ كهربائية.</span></li>\n	<li><span style=\"font-size:16px\">3&nbsp; منافذ USB.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">1 مدخل إضافي PD بتقنية&nbsp;QC3.0 للشحن السريع.</span></li>\n	<li><span style=\"font-size:16px\">مدمج ب Timer ليمكنك فصل الكهرباء&nbsp;&nbsp;تلقائي عند إنتهاء الوقت.</span></li>\n	<li><span style=\"font-size:16px\">مصنعة من مواد غير قابلة للحريق و مدمج بها (فيوز)&nbsp;يفصل الطاقة الكهربائية تلقائي عن&nbsp;التوصيلة&nbsp;عند حدوث التحمل الزائد او الحرائق لاسمح الله.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">يشحن&nbsp; منفذ PD الهواتف المحمولة من 0٪ إلى 60٪ في 35 دقيقة. يعتمد وقت الشحن على الجهاز والاستخدام<span style=\"color:#e74c3c\">*</span></span></li>\n	<li><span style=\"font-size:16px\">USB-C PD Output قادر على شحن Macbook 13 &quot;Retina و 12&quot; Macbook (2015) وLenovo&nbsp; والاجهزة المحمولة المماثلة.</span></li>\n	<li><span style=\"font-size:16px\">الإدخال: 100-250 فولت ، خرج التيار المتردد: 13 أمبير 3000 وات USB-C مخرج PD: 35 وات ، USB-A QC Out: 18 وات USB-A مخرج: 12 وات 5 فولت .</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li>3 meter extension:</li>\n	<li>4 electrical outlets.</li>\n	<li>3 USB ports.</li>\n	<li>1 auxiliary PD input with QC3.0 technology for fast charging.</li>\n	<li>Built in timer so you can turn off the power automatically when the time is up.</li>\n	<li>It is made of non-combustible materials and has a built-in fuse that automatically disconnects the electrical power from the connection in the event of an overload or fire, God forbid.</li>\n	<li>The PD port charges mobile phones from 0% to 60% in 35 minutes. Charging time depends on device and usage*</li>\n	<li>USB-C PD Output is capable of charging Macbook 13&quot; Retina and 12&quot; Macbook (2015), Lenovo and similar portable devices.</li>\n	<li>Input: 100-250V, AC output: 13A 3000W USB-C PD Output: 35W, USB-A QC Out: 18W USB-A Output: 12W 5V.</li>\n</ul>', 'Built in timer so you can turn off the power automatically when the time is up.', 'مدمج ب Timer ليمكنك فصل الكهرباء  تلقائي عند إنتهاء الوقت.', '162567948115F991AC-B928-42B1-A00F-A575F78F29E2.jpeg', 129.57, 0.00, 90.00, 93.00, 95.00, 90, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:23:33', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6114, 125, 73, '7946044829364', 1, 'simple', 'منصة باوراولوجي 4 منافذ 156 واط 2 يو اس بي  2 بي دي بطول 1.5م - اسود', 'Powerology 4-Port Quick Charging Power Terminal 156W UK - Black', '<ul>\n	<li><span style=\"font-size:16px\"><strong>منصة للشحن و التوصيل الاجهزة :&nbsp;</strong></span></li>\n	<li><span style=\"font-size:16px\">يحتوي على 4 مخارج بشحن سريع يعادل 156 وات.</span></li>\n	<li><span style=\"font-size:16px\">2 مدخل يو اس بي QC&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">2 مدخل PD</span></li>\n	<li><span style=\"font-size:16px\">شحن سريع متزامن لجهازين لاب توب وهاتفين.</span></li>\n	<li><span style=\"font-size:16px\">مخصص بكابل طاقة بطول 1.5 متر.</span></li>\n	<li><span style=\"font-size:16px\">يعمل على تيار متردد 100-240 فولت، و 50-60 هيرتز.</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Platform for charging and delivery devices:</span></li>\n	<li><span style=\"font-size:16px\">It has 4 outputs with fast charging equivalent to 156W.</span></li>\n	<li><span style=\"font-size:16px\">2 entrances</span></li>\n	<li><span style=\"font-size:16px\">Simultaneous fast charging of two laptops and two phones.</span></li>\n	<li><span style=\"font-size:16px\">Dedicated to a 1.5m power cable.</span></li>\n	<li><span style=\"font-size:16px\">Operates on AC 100-240V, 50-60Hz.</span></li>\n</ul>', 'Platform for shipping and delivery devices', 'منصة للشحن و التوصيل الاجهزة', '16256795253E306408-F30E-48D1-B81E-620157398DD8.jpeg', 199.13, 0.00, 147.00, 149.00, 152.00, 140, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:23:46', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6115, 115, 89, '6972103463294', 1, 'simple', 'كيبل راف باور تايب سي - لايتننج 1م - اسود', 'RAVPower Type-C to Lightning Cable 1m / 3.3ft - Black', '<ul>\n	<li>سلك أيفون Type-C بتقنية ال PD للشحن السريع</li>\n	<li>يشحن 50٪ في نصف ساعة</li>\n	<li>ينحني أكثر من 12,000 مرة</li>\n	<li>معتمد&nbsp;من ابل ويتوافق مع جميع أجهزتها</li>\n	<li>طوله 1m</li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">iPhone Type-C cable with PD technology for fast charging</span></li>\n	<li><span style=\"font-size:16px\">Charges 50% in half an hour</span></li>\n	<li><span style=\"font-size:16px\">Bend over 12,000 times</span></li>\n	<li><span style=\"font-size:16px\">Certified by Apple and compatible with all Apple devices</span></li>\n	<li><span style=\"font-size:16px\">Its length is 1m</span></li>\n</ul>', 'Bend over 12,000 times', 'ينحني أكثر من 12,000 مرة', '1625679591230FC689-6F95-427E-8C15-2CFE5519A7DC.jpeg', 68.7, 0.00, 28.50, 29.00, 32.00, 652, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:24:13', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6116, 133, 89, '6972103464772', 1, 'simple', 'حقيبة راف باور 1*6 - اسود', 'RAVPower 6 in 1 Prime Power Bank Combo - Black', '<p><span style=\"font-size:16px\"><strong>محتويات الحقيبة :&nbsp;</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">بطارية راف باور 10050 مللي امبير بتقنه اي سمارت ومنفذين USB</span></li>\n	<li><span style=\"font-size:16px\">شاحن جداري من راف باور بمنفذين USB بتقنيه اي سمارت</span></li>\n	<li><span style=\"font-size:16px\">شاحن سيارة من راف باور بمنفذين USB بقنيه اي سمارت 2.0</span></li>\n	<li><span style=\"font-size:16px\">كيبل شحن من راف باور مايكرو USB بطول 0.6m</span></li>\n	<li><span style=\"font-size:16px\">كيبل شحن من راف باور لايتننق USB بطول 1m</span></li>\n	<li><span style=\"font-size:16px\">كيبل شحن من راف باور تايب سي بطول 1m</span></li>\n	<li><span style=\"font-size:16px\">شنطه مميزه للبكج</span></li>\n</ul>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li><span style=\"font-size:16px\"><strong>فوائد تقنية اي سمارات iSmart&nbsp;</strong></span></li>\n	<li><span style=\"font-size:16px\">&bull; حماية من درجات الحرارة العالية</span></li>\n	<li><span style=\"font-size:16px\">&bull; حماية من الشحن الزائد</span></li>\n	<li><span style=\"font-size:16px\">&bull; حماية من الماس الكهربائى</span></li>\n	<li><span style=\"font-size:16px\">&bull; مثبت تيار الجهد</span></li>\n	<li><span style=\"font-size:16px\">تعطي كل جهاز حقه من الامبير.&nbsp;</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li>Bag contents:</li>\n	<li>RAVPower battery 10050 mAh with i-smart technology and two USB ports</li>\n	<li>RAVPower Wall Charger with Dual USB Ports with iSmart Technology</li>\n	<li>RAVPower Car Charger with Dual USB Ports with iSmart 2.0</li>\n	<li>RAVPower Micro USB Charging Cable Length 0.6m</li>\n	<li>RAV Power Lightning USB Charging Cable 1m</li>\n	<li>Charging cable from RAV Power Type C, length 1m</li>\n	<li>A special bag for the bag</li>\n	<li>&nbsp;</li>\n	<li>iSmart Technology Benefits</li>\n	<li>&bull; High temperature protection</li>\n	<li>&bull; Overcharging protection</li>\n	<li>Short circuit protection</li>\n	<li>Voltage Stabilizer</li>\n	<li>Give each device its right amount of amps.</li>\n</ul>', 'All you need is this bag.', 'كل ما تحتاجه هذه الحقيبة فقط.', '16256796404E1B2855-D09A-489B-B7F3-787CEECC8C72.jpeg', 173.04, 0.00, 146.00, 148.00, 152.00, 174, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:24:36', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6117, 136, 76, '123456', 1, 'simple', 'ابل ايرتاغ', 'Apple AirTag (1 Pack)', '<p><strong>لاضياع بعد اليوم</strong></p>\n\n<p>جهاز AirTag هو طريقة ولا أسهل لتتبع أغراضك. ثبّت واحداً على مفاتيحك وضع واحداً آخر في حقيبتك، ليظهرا على رادارك بكل بساطة في تطبيق تحديد الموقع، حيث يمكنك أيضاً تتبع جميع أجهزتك من Apple، ومتابعة أصدقائك وأفراد عائلتك أيضاً. مع AirTag، مسلسل ضياع أغراضك وصل إلى&nbsp;نهايته.</p>\n\n<p><strong>إشارتك، دليلك.</strong></p>\n\n<p>لم يعد فقدان محفظتك مثلاً قصة&nbsp;كبيرة. فبمجرد تثبيت AirTag عليها، عليها الأمان. يمكنك تشغيل صوت على السماعة المدمجة عن طريق الذهاب إلى علامة &ldquo;الأغراض&rdquo; الجديدة في تطبيق تحديد الموقع، أو القول &ldquo;يا&nbsp;Siri، أين محفظتي؟&rdquo;. وإذا كان ما تبحث عنه قريباً منك، تحت الكنبة&nbsp;أو&nbsp;في الغرفة المجاورة مثلاً، ما&nbsp;عليك سوى تتبع الصوت&nbsp;لتجده. من هذه اللحظة، إن فقدت أغراضك، لن تفقد أعصابك.</p>\n\n<p><strong>كيف يعمل؟</strong></p>\n\n<p>يرسل AirTag إشارات Bluetooth آمنة، يمكن أن تكتشفها الأجهزة القريبة من خلال شبكة تحديد الموقع. ترسل هذه الأجهزة بدورها موقع جهازك AirTag إلى iCloud، ثم تنتقل بعدها إلى تطبيق تحديد الموقع لرؤيته على الخريطة. تتم العملية بأكملها من دون الكشف عن أي هويات ومع تشفير محكم، ما يحمي خصوصيتك ويضمن راحة بالك. يحدث هذا كله بكفاءة عالية، فلا داعٍ للقلق بشأن عمر البطارية أو استهلاك البيانات.</p>\n\n<p><strong>المقاس</strong></p>\n\n<p>القطر: 31.9&nbsp;مم</p>\n\n<p>السمك: 8.0&nbsp;مم</p>\n\n<p><strong>الوزن</strong></p>\n\n<p>11&nbsp;غم</p>\n\n<p><strong>بطارية طويلة العمر</strong></p>\n\n<p>يعمل AirTag ببطارية عادية يصل عمرها لأكثر من عام وقابلة للاستبدال بكل سهولة ويخبرك iPhone عندما يحين موعد&nbsp;تغييرها.</p>\n\n<p><strong>مقاوم للماء</strong></p>', NULL, NULL, 'لاضياع لأغراضك بعد اليوم مع آير تاغ.', '162567968655080209-2D80-4AD1-B46F-D0848E0C17C9.jpeg', 149.96, 0.00, 124.00, 125.00, 128.00, 300, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:25:10', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6118, 131, 95, '8886461238112', 1, 'simple', 'سوار ساعة ابل قماش فيفا مدريد مقاس 44/42 مم - اسود', 'Viva Madrid Crisben Watch Strap for Apple Watch 42/44MM - Black', '<ul>\n	<li><span style=\"font-size:16px\">&nbsp;سوار Apple Watch&nbsp; ذو الخيوط المضفرة القابلة للتمدد ، وهو مريح وسهل الارتداء والخلع على معصمك.</span></li>\n	<li>\n	<p><span style=\"font-size:16px\">316&nbsp; مشبك من الفولاذ المقاوم للصدأ لضبط الحزام لملاءمة مثالية&nbsp;</span></p>\n	</li>\n	<li>\n	<p><span style=\"font-size:16px\">مقاومة العرق والماء: خيوط بوليستر عالية الجودة متشابكة بإحكام لمقاومة الماء و السوائل.</span></p>\n	</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>', '<ul>\n	<li>CRISBEN: Stretchable braided loop Apple watch band that is comfortable to wear and easy to slip on and off your wrist.</li>\n	<li>316 Stainless Steel Buckle Slide to adjust the band for that perfect fit</li>\n	<li>Sweat &amp; Water Resistance: High-quality polyester threads interlocked tightly to create water-proof surface</li>\n</ul>', 'Suitable for everyone.', 'مناسب للجميع.', '1625679725BE5E912A-80A7-4253-A173-3EB1D6DDA9EE.jpeg', 103.48, 0.00, 67.00, 68.00, 70.00, 80, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:25:22', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6119, 131, 95, '8886461238129', 1, 'simple', 'سوار ساعة ابل قماش فيفا مدريد مقاس 44/42 مم - ازرق', 'Viva Madrid Crisben Watch Strap for Apple Watch 42/44MM - Blue', '<ul>\n	<li>&nbsp;سوار Apple Watch&nbsp; ذو الخيوط المضفرة القابلة للتمدد ، وهو مريح وسهل الارتداء والخلع على معصمك.</li>\n	<li>\n	<p>316&nbsp; مشبك من الفولاذ المقاوم للصدأ لضبط الحزام لملاءمة مثالية&nbsp;</p>\n	</li>\n	<li>\n	<p>مقاومة العرق والماء: خيوط بوليستر عالية الجودة متشابكة بإحكام لمقاومة الماء و السوائل</p>\n	</li>\n</ul>', NULL, NULL, 'مناسب للجميع.', '1625679757B9E42967-4A0B-4458-894F-1BBFFB03C4DC.jpeg', 103.48, 0.00, 67.00, 68.00, 70.00, 80, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:25:35', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6120, 131, 95, '8886461238136', 1, 'simple', 'سوار ساعة ابل قماش فيفا مدريد مقاس 44/42 مم - رمادي', 'Viva Madrid Crisben Watch Strap for Apple Watch 42/44MM - Gray', '<ul>\n	<li><span style=\"font-size:16px\">&nbsp;سوار Apple Watch&nbsp; ذو الخيوط المضفرة القابلة للتمدد ، وهو مريح وسهل الارتداء والخلع على معصمك.</span></li>\n	<li>\n	<p><span style=\"font-size:16px\">316&nbsp; مشبك من الفولاذ المقاوم للصدأ لضبط الحزام لملاءمة مثالية&nbsp;</span></p>\n	</li>\n	<li>\n	<p><span style=\"font-size:16px\">مقاومة العرق والماء: خيوط بوليستر عالية الجودة متشابكة بإحكام لمقاومة الماء و السوائل</span></p>\n	</li>\n</ul>', '<ul>\n	<li>CRISBEN: Stretchable braided loop Apple watch band that is comfortable to wear and easy to slip on and off your wrist.</li>\n	<li>316 Stainless Steel Buckle Slide to adjust the band for that perfect fit</li>\n	<li>Sweat &amp; Water Resistance: High-quality polyester threads interlocked tightly to create water-proof surface</li>\n</ul>', 'Suitable for everyone.', 'مناسب للجميع.', '1625679789A4797939-92F8-4F24-9A4B-3DC5A98A8722.jpeg', 103.48, 0.00, 67.00, 68.00, 70.00, 35, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:26:22', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6121, 131, 95, '8886461238563', 1, 'simple', 'سوار ساعة ابل قماش فيفا مدريد مقاس 44/42 مم - اسود - ابيض', 'Viva Madrid Crisben Watch Strap for Apple Watch 42/44MM -  Mono Black/White', '<ul>\n	<li><span style=\"font-size:16px\">&nbsp;سوار Apple Watch&nbsp; ذو الخيوط المضفرة القابلة للتمدد ، وهو مريح وسهل الارتداء والخلع على معصمك.</span></li>\n	<li>\n	<p><span style=\"font-size:16px\">316&nbsp; مشبك من الفولاذ المقاوم للصدأ لضبط الحزام لملاءمة مثالية&nbsp;</span></p>\n	</li>\n	<li>\n	<p><span style=\"font-size:16px\">مقاومة العرق والماء: خيوط بوليستر عالية الجودة متشابكة بإحكام لمقاومة الماء و السوائل.</span></p>\n	</li>\n</ul>\n\n<p>&nbsp;</p>', '<ul>\n	<li><span style=\"font-size:16px\">CRISBEN: Stretchable braided loop Apple watch band that is comfortable to wear and easy to slip on and off your wrist.</span></li>\n	<li><span style=\"font-size:16px\">316 Stainless Steel Buckle Slide to adjust the band for that perfect fit</span></li>\n	<li><span style=\"font-size:16px\">Sweat &amp; Water Resistance: High-quality polyester threads interlocked tightly to create water-proof surface</span></li>\n</ul>', 'Suitable for everyone.', 'مناسب للجميع.', '1625679813792AD03B-8CE7-4167-8B2A-C7D9FFE8D2C7.jpeg', 103.48, 0.00, 67.00, 68.00, 70.00, 85, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:26:44', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6122, 136, 95, '8886461238570', 1, 'simple', 'حافظة ابل ايرتاغ 2 قطعة من شركة فيفا مدريد لون بنفسجي - وردي', 'Viva Madrid Airtrax Flexo Duo Bundle Pack Silicone Case For AirTag - Pink & Purple', '<ul>\n	<li><span style=\"font-size:16px\">حافظة مقاومة للصدمات المصنوعة&nbsp; من السيليكون مع حلقة للتعليق معدنية (بالاضافة الى طبقة شفافة مضادة للخدش)</span></li>\n	<li><span style=\"font-size:16px\">تحمي قطعة الاير تاغ الخاصة بك من الخدوش والغبار&nbsp;و التلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بالتعليقه ( لتثبيت الاير تاغ في الحقيبة او الجيب..إلخ&nbsp;</span></li>\n</ul>\n\n<p>&nbsp;</p>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Shockproof silicone case with metal hanging loop (plus clear anti-scratch coating)</span></li>\n	<li><span style=\"font-size:16px\">Protects your Air Tag from scratches, dust and damage.</span></li>\n	<li><span style=\"font-size:16px\">Supplied with the suspension (to install the Air Tag in the bag or pocket..etc.</span></li>\n</ul>', 'Protective case with hanging.', 'حافظة للحماية مع تعليقه.', '1625679848D366AA49-4340-44BF-BAF0-E343ADE2FA66.jpeg', 77.39, 0.00, 38.00, 40.00, 42.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:26:52', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6123, 136, 95, '8886461238556', 1, 'simple', 'حافظة ابل ايرتاغ 2 قطعة من شركة فيفا مدريد لون اسود - ازرق', 'Viva Madrid Airtrax Flexo Duo Bundle Pack Silicone Case For AirTag - Black & Blue', '<ul>\n	<li>حافظة مقاومة للصدمات المصنوعة&nbsp; من السيليكون مع حلقة للتعليق معدنية (بالاضافة الى طبقة شفافة مضادة للخدش)</li>\n	<li>تحمي قطعة الاير تاغ الخاصة بك من الخدوش والغبار&nbsp;و التلف.</li>\n	<li>مزودة بالتعليقه ( لتثبيت الاير تاغ في الحقيبة او الجيب..إلخ&nbsp;</li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Shockproof silicone case with metal hanging loop (plus clear anti-scratch coating)</span></li>\n	<li><span style=\"font-size:16px\">Protects your Air Tag from scratches, dust and damage.</span></li>\n	<li><span style=\"font-size:16px\">Supplied with the suspension (to install the Air Tag in the bag or pocket..etc.</span></li>\n</ul>', 'Protective case with hanging.', 'حافظة للحماية مع تعليقه.', '1625679888EA3A95AE-55AE-475E-B787-54294AA80C7B.jpeg', 77.39, 0.00, 38.00, 40.00, 42.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:26:58', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6124, 136, 95, '8886461237238', 1, 'simple', 'حافظة ابل ايرتاغ من شركة فيفا مدريد جلد لون رمادي', 'Viva Madrid Airtrax Leather Case for AirTag - Grey', '<ul>\n	<li>حافظة مقاومة للصدمات المصنوعة&nbsp; من الجلد الفاخر مع حلقة للتعليق معدنية (بالاضافة الى طبقة شفافة مضادة للخدش)</li>\n	<li>تحمي قطعة الاير تاغ الخاصة بك من الخدوش والغبار&nbsp;و التلف.</li>\n	<li>مزودة بالتعليقه ( لتثبيت الاير تاغ في الحقيبة او الجيب..إلخ&nbsp;</li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Shock-resistant case made of premium leather with a metal carabiner (plus a clear anti-scratch coating)<br />\nProtects your Air Tag from scratches, dust and damage.<br />\nSupplied with the suspension (to install the Air Tag in the bag or pocket..etc.</span></p>', 'Protective case made of premium leather with hanging attachment.', 'حافظة للحماية مصنوعة من الجلد الفاخر مع تعليقه للتثبيت.', '16256799208B03FA3B-955B-408B-82DF-58DB6766C9A0.jpeg', 77.39, 0.00, 42.00, 43.00, 46.00, 95, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:27:06', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6125, 136, 95, '8886461237214', 1, 'simple', 'حافظة ابل ايرتاغ من شركة فيفا مدريد جلد لون اسود', 'Viva Madrid Airtrax Leather Case for AirTag - Black', '<ul>\n	<li>حافظة مقاومة للصدمات المصنوعة&nbsp; من الجلد الفاخر مع حلقة للتعليق معدنية (بالاضافة الى طبقة شفافة مضادة للخدش)</li>\n	<li>تحمي قطعة الاير تاغ الخاصة بك من الخدوش والغبار&nbsp;و التلف.</li>\n	<li>مزودة بالتعليقه ( لتثبيت الاير تاغ في الحقيبة او الجيب..إلخ&nbsp;</li>\n</ul>', '<p><span style=\"font-size:16px\">Shock-resistant case made of premium leather with a metal carabiner (plus a clear anti-scratch coating)<br />\nProtects your Air Tag from scratches, dust and damage.<br />\nSupplied with the suspension (to install the Air Tag in the bag or pocket..etc.</span></p>', 'Protective case made of premium leather with hanging attachment.', 'حافظة للحماية مصنوعة من الجلد الفاخر مع تعليقه للتثبيت.', '1625680453CCF18AC7-ABE0-48E4-9DD7-BB073AF891DE.jpeg', 77.39, 0.00, 42.00, 43.00, 46.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:27:13', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6126, 136, 95, '8886461237245', 1, 'simple', 'حافظة ابل ايرتاغ من شركة فيفا مدريد جلد لون احمر', 'Viva Madrid Airtrax Leather Case for AirTag - Red', '<ul>\n	<li><span style=\"font-size:16px\">حافظة مقاومة للصدمات المصنوعة&nbsp; من الجلد الفاخر مع حلقة للتعليق معدنية (بالاضافة الى طبقة شفافة مضادة للخدش)</span></li>\n	<li><span style=\"font-size:16px\">تحمي قطعة الاير تاغ الخاصة بك من الخدوش والغبار&nbsp;و التلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بالتعليقه ( لتثبيت الاير تاغ في الحقيبة او الجيب..إلخ&nbsp;</span></li>\n</ul>', '<p><span style=\"font-size:16px\">Shock-resistant case made of premium leather with a metal carabiner (plus a clear anti-scratch coating)<br />\nProtects your Air Tag from scratches, dust and damage.<br />\nSupplied with the suspension (to install the Air Tag in the bag or pocket..etc.</span></p>', 'Protective case made of premium leather with hanging attachment.', 'حافظة للحماية مصنوعة من الجلد الفاخر مع تعليقه للتثبيت.', '162568059098E4FB8E-5C4C-4145-A5C4-8E9B0877A401.jpeg', 77.39, 0.00, 42.00, 43.00, 46.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:27:21', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6127, 136, 95, '8886461237221', 1, 'simple', 'حافظة ابل ايرتاغ من شركة فيفا مدريد جلد لون ازرق', 'Viva Madrid Airtrax Leather Case for AirTag - Blue', '<ul>\n	<li><span style=\"font-size:16px\">حافظة مقاومة للصدمات المصنوعة&nbsp; من الجلد الفاخر مع حلقة للتعليق معدنية (بالاضافة الى طبقة شفافة مضادة للخدش)</span></li>\n	<li><span style=\"font-size:16px\">تحمي قطعة الاير تاغ الخاصة بك من الخدوش والغبار&nbsp;و التلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بالتعليقه ( لتثبيت الاير تاغ في الحقيبة او الجيب..إلخ&nbsp;</span></li>\n</ul>', '<p><span style=\"font-size:16px\">Shock-resistant case made of premium leather with a metal carabiner (plus a clear anti-scratch coating)<br />\nProtects your Air Tag from scratches, dust and damage.<br />\nSupplied with the suspension (to install the Air Tag in the bag or pocket..etc.</span></p>', 'Protective case made of premium leather with hanging attachment.', 'حافظة للحماية مصنوعة من الجلد الفاخر مع تعليقه للتثبيت.', '1625680628A764542E-2AD7-4319-9275-0105590E49A9.jpeg', 77.39, 0.00, 42.00, 43.00, 46.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:27:28', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6128, 136, 95, '8886461238518', 1, 'simple', 'حافظة ابل ايرتاغ من شركة فيفا مدريد لون بنفسجي', 'Viva Madrid Airtrax Flexo Silicone Case For AirTag - Purple', '<ul>\n	<li>حافظة مقاومة للصدمات المصنوعة&nbsp; من السيليكون مع حلقة للتعليق معدنية (بالاضافة الى طبقة شفافة مضادة للخدش)</li>\n	<li>تحمي قطعة الاير تاغ الخاصة بك من الخدوش والغبار&nbsp;و التلف.</li>\n	<li>مزودة بالتعليقه ( لتثبيت الاير تاغ في الحقيبة او الجيب..إلخ&nbsp;</li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Shockproof silicone case with metal hanging loop (plus clear anti-scratch coating)</span></li>\n	<li><span style=\"font-size:16px\">Protects your Air Tag from scratches, dust and damage.</span></li>\n	<li><span style=\"font-size:16px\">Supplied with the suspension (to install the Air Tag in the bag or pocket..etc.</span></li>\n</ul>', 'Protective case with hanging.', 'حافظة للحماية مع تعليقه.', '1625680665B0542449-2F2E-45FD-A63D-7DCEBC10550C.jpeg', 60, 0.00, 30.00, 32.00, 34.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:27:37', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6129, 136, 95, '8886461238549', 1, 'simple', 'حافظة ابل ايرتاغ من شركة فيفا مدريد لون وردي', 'Viva Madrid Airtrax Flexo Silicone Case For AirTag - Pink', '<ul>\n	<li><span style=\"font-size:16px\">حافظة مقاومة للصدمات المصنوعة&nbsp; من السيليكون مع حلقة للتعليق معدنية (بالاضافة الى طبقة شفافة مضادة للخدش)</span></li>\n	<li><span style=\"font-size:16px\">تحمي قطعة الاير تاغ الخاصة بك من الخدوش والغبار&nbsp;و التلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بالتعليقه ( لتثبيت الاير تاغ في الحقيبة او الجيب..إلخ&nbsp;</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Shockproof silicone case with metal hanging loop (plus clear anti-scratch coating)</span></li>\n	<li><span style=\"font-size:16px\">Protects your Air Tag from scratches, dust and damage.</span></li>\n	<li><span style=\"font-size:16px\">Supplied with the suspension (to install the Air Tag in the bag or pocket..etc.</span></li>\n</ul>', 'Protective case with hanging.', 'حافظة للحماية مع تعليقه.', '16256806905A36034E-F215-4E3C-BC69-FF7059F47210.jpeg', 60, 0.00, 30.00, 32.00, 34.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:27:44', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6130, 136, 95, '8886461238501', 1, 'simple', 'حافظة ابل ايرتاغ من شركة فيفا مدريد لون ازرق', 'Viva Madrid Airtrax Flexo Silicone Case For AirTag - Blue', '<ul>\n	<li><span style=\"font-size:16px\">حافظة مقاومة للصدمات المصنوعة&nbsp; من السيليكون مع حلقة للتعليق معدنية (بالاضافة الى طبقة شفافة مضادة للخدش)</span></li>\n	<li><span style=\"font-size:16px\">تحمي قطعة الاير تاغ الخاصة بك من الخدوش والغبار&nbsp;و التلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بالتعليقه ( لتثبيت الاير تاغ في الحقيبة او الجيب..إلخ&nbsp;</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Shockproof silicone case with metal hanging loop (plus clear anti-scratch coating)</span></li>\n	<li><span style=\"font-size:16px\">Protects your Air Tag from scratches, dust and damage.</span></li>\n	<li><span style=\"font-size:16px\">Supplied with the suspension (to install the Air Tag in the bag or pocket..etc.</span></li>\n</ul>', 'Protective case with hanging.', 'حافظة للحماية مع تعليقه.', '16257543468886461238501.jpg', 60, 0.00, 30.00, 32.00, 34.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:27:50', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6131, 136, 95, '8886461238525', 1, 'simple', 'حافظة ابل ايرتاغ من شركة فيفا مدريد لون بيج', 'Viva Madrid Airtrax Flexo Silicone Case For AirTag - Beige', '<ul>\n	<li><span style=\"font-size:16px\">حافظة مقاومة للصدمات المصنوعة&nbsp; من السيليكون مع حلقة للتعليق معدنية (بالاضافة الى طبقة شفافة مضادة للخدش)</span></li>\n	<li><span style=\"font-size:16px\">تحمي قطعة الاير تاغ الخاصة بك من الخدوش والغبار&nbsp;و التلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بالتعليقه ( لتثبيت الاير تاغ في الحقيبة او الجيب..إلخ&nbsp;</span></li>\n</ul>', NULL, NULL, 'حافظة للحماية مع تعليقه.', '1625680766A6D3724F-FD94-421D-B169-EA2F780D53DC.jpeg', 60, 0.00, 30.00, 32.00, 34.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:27:57', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6132, 136, 95, '8886461238532', 1, 'simple', 'حافظة ابل ايرتاغ من شركة فيفا مدريد لون برتقالي', 'Viva Madrid Airtrax Flexo Silicone Case For AirTag - Orange', '<ul>\n	<li><span style=\"font-size:16px\">حافظة مقاومة للصدمات المصنوعة&nbsp; من السيليكون مع حلقة للتعليق معدنية (بالاضافة الى طبقة شفافة مضادة للخدش)</span></li>\n	<li><span style=\"font-size:16px\">تحمي قطعة الاير تاغ الخاصة بك من الخدوش والغبار&nbsp;و التلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بالتعليقه ( لتثبيت الاير تاغ في الحقيبة او الجيب..إلخ&nbsp;</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Shockproof silicone case with metal hanging loop (plus clear anti-scratch coating)</span></li>\n	<li><span style=\"font-size:16px\">Protects your Air Tag from scratches, dust and damage.</span></li>\n	<li><span style=\"font-size:16px\">Supplied with the suspension (to install the Air Tag in the bag or pocket..etc.</span></li>\n</ul>', 'Protective case with hanging.', 'حافظة للحماية مع تعليقه.', '16256808029A56489D-F0E2-48DC-B3D8-1619B1A6C34F.jpeg', 60, 0.00, 30.00, 32.00, 34.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:28:03', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6133, 136, 95, '8886461238495', 1, 'simple', 'حافظة ابل ايرتاغ من شركة فيفا مدريد لون اسود', 'Viva Madrid Airtrax Flexo Silicone Case For AirTag - Black', '<ul>\n	<li><span style=\"font-size:16px\">حافظة مقاومة للصدمات المصنوعة&nbsp; من السيليكون مع حلقة للتعليق معدنية (بالاضافة الى طبقة شفافة مضادة للخدش)</span></li>\n	<li><span style=\"font-size:16px\">تحمي قطعة الاير تاغ الخاصة بك من الخدوش والغبار&nbsp;و التلف.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بالتعليقه ( لتثبيت الاير تاغ في الحقيبة او الجيب..إلخ&nbsp;</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Shockproof silicone case with metal hanging loop (plus clear anti-scratch coating)</span></li>\n	<li><span style=\"font-size:16px\">Protects your Air Tag from scratches, dust and damage.</span></li>\n	<li><span style=\"font-size:16px\">Supplied with the suspension (to install the Air Tag in the bag or pocket..etc.</span></li>\n</ul>', 'Protective case with hanging.', 'حافظة للحماية مع تعليقه.', '1625680826D814E41C-5221-4623-AE29-BB957EF7EE0F.jpeg', 60, 0.00, 30.00, 32.00, 34.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:28:08', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6134, 129, 74, '6297000886770', 1, 'simple', 'سماعة لاسلكية برودو ساوندتك اسود مايكرو', 'Porodo Soundtec Deep Sound Wireless Over-Ear Headphone - Black', '<ul>\n	<li><span style=\"font-size:16px\"><strong>&nbsp;</strong>توفر صوت نقي محيطي&nbsp; وعالية الوضوح&nbsp;</span></li>\n	<li>\n	<p><span style=\"font-size:16px\">16&nbsp; تردد المدى : 20 ~ 20 كيلو هرتز</span></p>\n	</li>\n	<li><span style=\"font-size:16px\">اشحن 10 دقائق فقط واستخدمها لساعة كاملة</span></li>\n	<li><span style=\"font-size:16px\">بدون تعقيدات الأسلاك</span></li>\n	<li><span style=\"font-size:16px\">الحساسية: 108 &plusmn; 3dB</span></li>\n	<li><span style=\"font-size:16px\">زر متعدد الوظائف</span></li>\n	<li><span style=\"font-size:16px\">بطارية سعة 200mAh</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Provides pure surround sound and high definition</span></li>\n	<li><span style=\"font-size:16px\">16 Frequency range: 20 ~ 20 kHz</span></li>\n	<li><span style=\"font-size:16px\">Only charge 10 minutes and use it for an hour</span></li>\n	<li><span style=\"font-size:16px\">Without the complications of wiring</span></li>\n	<li><span style=\"font-size:16px\">Sensitivity: 108 &plusmn; 3dB</span></li>\n	<li><span style=\"font-size:16px\">Multifunction button</span></li>\n	<li><span style=\"font-size:16px\">200mAh . Battery</span></li>\n</ul>', 'Charge only 10 minutes and use it for an hour', 'اشحن 10 دقائق فقط واستخدمها لساعة كاملة.', '1625680865DB74CCE6-7F2B-4715-90B1-85E62A550C9B.jpeg', 129.56, 0.00, 68.00, 69.00, 72.00, 190, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:28:29', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6135, 129, 74, '6297000886787', 1, 'simple', 'سماعة لاسلكية برودو ساوندتك اخضر مايكرو', 'Porodo Soundtec Deep Sound Wireless Over-Ear Headphone - Green', '<ul>\n	<li><span style=\"font-size:16px\"><strong>&nbsp;</strong>توفر صوت نقي محيطي&nbsp; وعالية الوضوح&nbsp;</span></li>\n	<li>\n	<p><span style=\"font-size:16px\">16&nbsp; تردد المدى : 20 ~ 20 كيلو هرتز</span></p>\n	</li>\n	<li><span style=\"font-size:16px\">اشحن 10 دقائق فقط واستخدمها لساعة كاملة</span></li>\n	<li><span style=\"font-size:16px\">بدون تعقيدات الأسلاك</span></li>\n	<li><span style=\"font-size:16px\">الحساسية: 108 &plusmn; 3dB</span></li>\n	<li><span style=\"font-size:16px\">زر متعدد الوظائف</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Provides pure surround sound and high definition</span></li>\n	<li><span style=\"font-size:16px\">16 Frequency range: 20 ~ 20 kHz</span></li>\n	<li><span style=\"font-size:16px\">Only charge 10 minutes and use it for an hour</span></li>\n	<li><span style=\"font-size:16px\">Without the complications of wiring</span></li>\n	<li><span style=\"font-size:16px\">Sensitivity: 108 &plusmn; 3dB</span></li>\n	<li><span style=\"font-size:16px\">Multifunction button</span></li>\n	<li><span style=\"font-size:16px\">200mAh . Battery</span></li>\n</ul>', 'Charge only 10 minutes and use it for an hour', 'اشحن 10 دقائق فقط واستخدمها لساعة كاملة.', '1625680912EBF92733-5065-4F4E-929B-15B606EC594B.jpeg', 129.56, 0.00, 68.00, 69.00, 72.00, 90, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:28:36', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6136, 129, 74, '2155387373440', 1, 'simple', 'سماعة لاسلكية برودو ساوندتك احمر مايكرو', 'Porodo Soundtec Deep Sound Wireless Over-Ear Headphone - Red', '<ul>\n	<li><span style=\"font-size:16px\"><strong>&nbsp;</strong>توفر صوت نقي محيطي&nbsp; وعالية الوضوح&nbsp;</span></li>\n	<li>\n	<p><span style=\"font-size:16px\">16&nbsp; تردد المدى : 20 ~ 20 كيلو هرتز</span></p>\n	</li>\n	<li><span style=\"font-size:16px\">اشحن 10 دقائق فقط واستخدمها لساعة كاملة</span></li>\n	<li><span style=\"font-size:16px\">بدون تعقيدات الأسلاك</span></li>\n	<li><span style=\"font-size:16px\">الحساسية: 108 &plusmn; 3dB</span></li>\n	<li><span style=\"font-size:16px\">زر متعدد الوظائف</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Provides pure surround sound and high definition</span></li>\n	<li><span style=\"font-size:16px\">16 Frequency range: 20 ~ 20 kHz</span></li>\n	<li><span style=\"font-size:16px\">Only charge 10 minutes and use it for an hour</span></li>\n	<li><span style=\"font-size:16px\">Without the complications of wiring</span></li>\n	<li><span style=\"font-size:16px\">Sensitivity: 108 &plusmn; 3dB</span></li>\n	<li><span style=\"font-size:16px\">Multifunction button</span></li>\n	<li><span style=\"font-size:16px\">200mAh . Battery</span></li>\n</ul>', 'Charge only 10 minutes and use it for an hour', 'اشحن 10 دقائق فقط واستخدمها لساعة كاملة.', '16256809716F30BE2B-A086-4FB8-BC0D-BF30210C0CB1.jpeg', 129.56, 0.00, 68.00, 69.00, 72.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:28:43', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6138, 124, 74, '2155387368040', 1, 'simple', 'مثبت جوال مغناطيسي في السيارة من برودو رمادي', 'Porodo Aluminum Magnetic Car Mount ( Air Vent + Stick-On Holder ) - Gray', '<p><span style=\"font-size:16px\"><strong>قاعدة مغناطيس قوية مع لاصق 3M للتثبيت على السيارة</strong></span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\"><strong>محتويات المنتج :</strong></span></li>\n	<li><span style=\"font-size:16px\">قطعة ستاند تثبت خلف الهاتف</span></li>\n	<li><span style=\"font-size:16px\">قطعة تثبت في الديكور مع امكانية الدوران 360 درجة</span></li>\n	<li><span style=\"font-size:16px\">قعطة اضافية تثبت في ريش المكيف مع امانية الدوران 360 درجة</span></li>\n	<li><span style=\"font-size:16px\">لاصق من شركة ثري ام العالمية</span></li>\n	<li><span style=\"font-size:16px\">قطع معدن احتياط</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Strong magnet base with 3M adhesive to mount on the car</span></p>\n\n<p dir=\"ltr\"><span style=\"font-size:16px\">Product Contents:<br />\nA piece of stand is attached to the back of the phone<br />\nA piece installed in the decor with the possibility of rotation 360 degrees<br />\nAn extra piece is installed in the air conditioner blades with 360 degree rotation safety الدوران<br />\n3M adhesive tape<br />\nspare metal parts</span></p>', 'Strong magnet base with 3M adhesive to mount on the car', 'قاعدة مغناطيس قوية مع لاصق 3M للتثبيت على السيارة', '1625693225E6D1579E-24C8-4048-9487-13BD9BE72278.jpeg', 51.3, 0.00, 21.00, 23.00, 26.00, 200, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:28:49', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6139, 136, 73, '6083749655902', 1, 'simple', 'قلم لمس ذكي 2في1 من باوراولوجي - رمادي', 'Powerology Universal 2 in 1 Smart Pencil Gray', '<p><span style=\"font-size:16px\">قلم لمس&nbsp; عالمي متعدد الاستخدام :&nbsp;</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">يستخدم للتصميم و التصفح اليومي .</span></li>\n	<li><span style=\"font-size:16px\">عالية الاحساسية و الاستجابة&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مدة الشحن : ساعة واحدة</span></li>\n	<li><span style=\"font-size:16px\">يعمل لمدة : 7 ساعات متوصلة&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">وضع الضوء الاخضر : يتيح الاستخدام جميع اجهزة ابل و معظم اجهزة الاندوريد&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">وضع الضوء الازرق&nbsp; : يتيح الاستخدام لاجهزة الايباد ( 2018 - 2020 )</span></li>\n	<li><span style=\"font-size:16px\">&nbsp;مناسب لجميع أجهزة الشاشات التي تعمل باللمس بسلاسة ويستجيب مع دقة كبيرة.&nbsp;متوافق مع أجهزة ipad و iphone و kindle و Samsung و android والأجهزة اللوحية والكمبيوتر المحمول والمزيد.</span></li>\n	<li><span style=\"font-size:16px\">* مريح في الإمساك - مصمم &nbsp;مانع للانزلاق مما يجعل القلم سهلًا ومريحًا في الإمساك به وبدون الشعور بالتعب.&nbsp;مثالي للفنانين والمصممين والطلاب والمدرسين للقيام بالإبداع على iPad.</span></li>\n	<li><span style=\"font-size:16px\">&nbsp;يسمح لك االمؤشر&nbsp;برؤية المكان الذي ترسم&nbsp;فيه بدقة أكبر&nbsp;ومثالي للعمل التفصيلي.&nbsp;</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li>Universal multi-use stylus pen:</li>\n	<li>It is used for design and daily browsing.</li>\n	<li>High sensitivity and responsiveness</li>\n	<li>Charging time: 1 hour</li>\n	<li>Runs for: 7 continuous hours</li>\n	<li>Green light mode: Allows use of all Apple devices and most Android devices</li>\n	<li>Blue light mode: Allows use for iPad devices (2018 - 2020)</li>\n	<li>Suitable for all touch screen devices smoothly and responds with great accuracy. Compatible with ipad, iphone, kindle, Samsung, android, tablets, laptop and more.</li>\n	<li>Comfortable to Hold - Non-slip design makes the pen easy and comfortable to hold and without feeling tired. Perfect for artists, designers, students and teachers to get creative on the iPad.</li>\n	<li>The pointer allows you to see where you&#39;re drawing with greater precision and is ideal for detailed work.</li>\n</ul>', 'Perfect for artists, designers, teachers, educators and every creative.', 'مثالي للفنانين والمصممين والطلاب والمدرسين ولكل مبدع.', '162569328574C9CB3F-856A-47BF-9705-6925A3A4EA94.jpeg', 129.56, 0.00, 86.00, 88.00, 92.00, 200, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:29:15', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6140, 115, 73, '6083749655452', 1, 'simple', 'كيبل باوراولوقي لايتنينج - تايب سي 2.0م احمر', 'Powerology Braided USB-C to Lightning Cable 2M - Red', '<ul>\n	<li><span style=\"font-size:16px\">مغطى بمادة PVC المتينة والمقاومة للحريق تضمن السلامة من التسخين الزائد والتيار الزائد.</span></li>\n	<li><span style=\"font-size:16px\">مزامنة وشحن سريع للبيانات: تيار 3 أمبير لشحن جهازك بأقصى سرعة.</span></li>\n	<li><span style=\"font-size:16px\">عند الاستخدام فيش (ادابتر) بمدخل PD تشحن جهازك الايفون من 0% الى 60% خلال 35 دقيقة.</span></li>\n	<li>مغطى بالقماش مما يساعده على مقاومة القطع&nbsp;</li>\n	<li><span style=\"font-size:16px\">معتمد من ابل</span></li>\n	<li><span style=\"font-size:16px\">&nbsp;ضمان سنتين&nbsp;</span></li>\n</ul>\n\n<p>&nbsp;</p>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Coated with durable and fire retardant PVC that ensures safety from overheating and overcurrent.</span></li>\n	<li><span style=\"font-size:16px\">Fast data sync and charge: 3A current to charge your device at full speed.</span></li>\n	<li><span style=\"font-size:16px\">When using a socket (adapter) with a PD port, it charges your iPhone from 0% to 60% within 35 minutes.</span></li>\n	<li><span style=\"font-size:16px\">Apple certified&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">2 years warranty</span></li>\n</ul>', 'Fast data sync and charge: 3A current to charge your device at full speed.', 'مزامنة وشحن سريع للبيانات: تيار 3 أمبير لشحن جهازك بأقصى سرعة.', '16256933002077931A-2223-450D-99C7-900885CE4DA9.jpeg', 86.08, 0.00, 46.00, 48.00, 50.00, 250, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:29:24', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6141, 115, 73, '6083749655216', 1, 'simple', 'كيبل باوراولوقي لايتنينج - تايب سي 2.0م ازرق', 'Powerology Braided USB-C to Lightning Cable 2M - Blue', '<ul>\n	<li><span style=\"font-size:16px\">مغطى بمادة PVC المتينة والمقاومة للحريق تضمن السلامة من التسخين الزائد والتيار الزائد.</span></li>\n	<li><span style=\"font-size:16px\">مزامنة وشحن سريع للبيانات: تيار 3 أمبير لشحن جهازك بأقصى سرعة.</span></li>\n	<li><span style=\"font-size:16px\">عند الاستخدام فيش (ادابتر) بمدخل PD تشحن جهازك الايفون من 0% الى 60% خلال 35 دقيقة.</span></li>\n	<li><span style=\"font-size:16px\">مغطى بالقماش مما يساعده على مقاومة القطع&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">معتمد من ابل</span></li>\n	<li><span style=\"font-size:16px\">&nbsp;ضمان سنتين&nbsp;</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Coated with durable and fire retardant PVC that ensures safety from overheating and overcurrent.</span></li>\n	<li><span style=\"font-size:16px\">Fast data sync and charge: 3A current to charge your device at full speed.</span></li>\n	<li><span style=\"font-size:16px\">When using a socket (adapter) with a PD port, it charges your iPhone from 0% to 60% within 35 minutes.</span></li>\n	<li><span style=\"font-size:16px\">Apple certified&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">2 years warranty</span></li>\n</ul>', 'Fast data sync and charge: 3A current to charge your device at full speed.', 'مزامنة وشحن سريع للبيانات: تيار 3 أمبير لشحن جهازك بأقصى سرعة.', '162569332122F58A89-176C-400B-9653-3D64D10BFDD3.jpeg', 86.08, 0.00, 46.00, 48.00, 50.00, 250, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:29:48', NULL, NULL, '1_2_3_4', NULL, NULL, 1);
INSERT INTO `products` (`id`, `parent_id`, `brand_id`, `product_code`, `status`, `type`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `short_desc_en`, `short_desc_ar`, `product_photo`, `product_price`, `product_price1`, `product_price2`, `product_price3`, `product_price4`, `product_quantity`, `length`, `width`, `height`, `length_class`, `weight`, `weight_class`, `created_at`, `updated_at`, `details_ar`, `details_en`, `viewed_levels`, `video`, `yt_video`, `sort`) VALUES
(6142, 115, 73, '6083749655148', 1, 'simple', 'كيبل باوراولوقي لايتنينج - تايب سي 2.0م اسود', 'Powerology Braided USB-C to Lightning Cable 2M - Black', '<ul>\n	<li><span style=\"font-size:16px\">مغطى بمادة PVC المتينة والمقاومة للحريق تضمن السلامة من التسخين الزائد والتيار الزائد.</span></li>\n	<li><span style=\"font-size:16px\">مزامنة وشحن سريع للبيانات: تيار 3 أمبير لشحن جهازك بأقصى سرعة.</span></li>\n	<li><span style=\"font-size:16px\">عند الاستخدام فيش (ادابتر) بمدخل PD تشحن جهازك الايفون من 0% الى 60% خلال 35 دقيقة.</span></li>\n	<li><span style=\"font-size:16px\">مغطى بالقماش مما يساعده على مقاومة القطع&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">معتمد من ابل</span></li>\n	<li><span style=\"font-size:16px\">&nbsp;ضمان سنتين&nbsp;</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Coated with durable and fire retardant PVC that ensures safety from overheating and overcurrent.</span></li>\n	<li><span style=\"font-size:16px\">Fast data sync and charge: 3A current to charge your device at full speed.</span></li>\n	<li><span style=\"font-size:16px\">When using a socket (adapter) with a PD port, it charges your iPhone from 0% to 60% within 35 minutes.</span></li>\n	<li><span style=\"font-size:16px\">Apple certified&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">2 years warranty</span></li>\n</ul>', 'Fast data sync and charge: 3A current to charge your device at full speed.', 'مزامنة وشحن سريع للبيانات: تيار 3 أمبير لشحن جهازك بأقصى سرعة.', '162569338377B5F65D-E33F-4EA1-90FD-7B1A34A715F5.jpeg', 86.08, 0.00, 46.00, 48.00, 50.00, 250, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:29:56', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6143, 115, 73, '6083749654844', 1, 'simple', 'كيبل باوراولوقي لايتنينج - تايب سي 1.2م ازرق', 'Powerology Braided USB-C to Lightning Cable 1.2M - Blue', NULL, NULL, NULL, NULL, '16257007317C9653D4-4039-47E0-88AC-D412A1F5E0E9.jpeg', 77.39, 0.00, 38.00, 39.00, 42.00, 500, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:30:04', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6144, 115, 73, '6083749654776', 1, 'simple', 'كيبل باوراولوقي لايتنينج - تايب سي 1.2م اسود', 'Powerology Braided USB-C to Lightning Cable 1.2M - Blue', NULL, NULL, NULL, NULL, '162569348618C3B27C-82AB-4956-BA7D-A604D882DE2E.jpeg', 77.39, 0.00, 38.00, 39.00, 42.00, 500, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:30:10', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6145, 115, 73, '6083749654912', 1, 'simple', 'كيبل باوراولوقي لايتنينج - تايب سي 1.2م ابيض', 'Powerology Braided USB-C to Lightning Cable 1.2M - White', NULL, NULL, NULL, NULL, '1625693530E870B032-46FF-4A4F-A321-47DC4314A2ED.jpeg', 77.39, 0.00, 38.00, 39.00, 42.00, 466, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:30:16', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6146, 115, 73, '6083749655520', 1, 'simple', 'كيبل باوراولوقي لايتنينج - يو اس بي 1.2م اسود', 'Powerology Braided USB-A to Lightning Cable 1.2M - Black', NULL, NULL, NULL, NULL, '162570082688018DEA-844F-4B07-9D18-B3AC2ED81A95.jpeg', 68.69, 0.00, 32.00, 34.00, 37.00, 498, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-11-02 14:02:48', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6147, 129, 83, '6925281976872', 1, 'simple', 'سماعة لاسلكية للاطفال JR310BT - من جي بي ال - ازرق', 'JBL JR310BT Kids Wireless On-Ear Headphones - Blue', '<ul>\n	<li><span style=\"font-size:16px\">آمنة وخفيفة الوزن مخصصة للأطفال ، توفر سماعات الرأس اللاسلكية JBL Jr310BT بأمان ما يصل إلى 30 ساعة من صوت JBL النقي والمرح لأصغر عشاق الموسيقى.</span></li>\n	<li><span style=\"font-size:16px\">مناسبة للدراسة و الاستماع للموسيقى والتصفح مع الحماية الامنة للاستماع .</span></li>\n	<li><span style=\"font-size:16px\">تم تصميم سماعات الرأس بحيث لا تتجاوز أبدًا 85 ديسيبل لحماية السمع ، مع أدوات تحكم يمكن للأطفال أنفسهم تشغيلها بسهولة.</span></li>\n	<li><span style=\"font-size:16px\">&nbsp;مبطنة من الداخل و ناعمة و مصممة خصيصًا ووسائد أذن لملاءمة ناعمة.</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li>Safe and lightweight for kids, the JBL Jr310BT Wireless Headphones safely deliver up to 30 hours of pure JBL sound and fun for the youngest music lovers.</li>\n	<li>Suitable for studying, listening to music and browsing with safe protection for listening.</li>\n	<li>The headphones are designed to never exceed 85 decibels for hearing protection, with controls that children themselves can easily operate.</li>\n	<li>Soft padded interior and specially designed ear cushions for a smooth fit.</li>\n</ul>', 'Suitable for studying, listening to music and browsing with safe protection for listening.', 'مناسبة للدراسة و الاستماع للموسيقى مع الحماية الامنة للسمع .', '16256936189D664317-57AE-4414-8723-33C519DF4D69.jpeg', 199.13, 0.00, 138.00, 140.00, 160.00, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:30:46', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6148, 129, 83, '6925281976896', 1, 'simple', 'سماعة لاسلكية للاطفال JR310BT - من جي بي ال - اخضر', 'JBL JR310BT Kids Wireless On-Ear Headphones - Green', '<ul>\n	<li><span style=\"font-size:16px\">آمنة وخفيفة الوزن مخصصة للأطفال ، توفر سماعات الرأس اللاسلكية JBL Jr310BT بأمان ما يصل إلى 30 ساعة من صوت JBL النقي والمرح لأصغر عشاق الموسيقى.</span></li>\n	<li><span style=\"font-size:16px\">مناسبة للدراسة و الاستماع للموسيقى والتصفح مع الحماية الامنة للاستماع .</span></li>\n	<li><span style=\"font-size:16px\">تم تصميم سماعات الرأس بحيث لا تتجاوز أبدًا 85 ديسيبل لحماية السمع ، مع أدوات تحكم يمكن للأطفال أنفسهم تشغيلها بسهولة.</span></li>\n	<li><span style=\"font-size:16px\">&nbsp;مبطنة من الداخل و ناعمة و مصممة خصيصًا ووسائد أذن لملاءمة ناعمة.</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Safe and lightweight for kids, the JBL Jr310BT Wireless Headphones safely deliver up to 30 hours of pure JBL sound and fun for the youngest music lovers.</span></li>\n	<li><span style=\"font-size:16px\">Suitable for studying, listening to music and browsing with safe protection for listening.</span></li>\n	<li><span style=\"font-size:16px\">The headphones are designed to never exceed 85 decibels for hearing protection, with controls that children themselves can easily operate.</span></li>\n	<li><span style=\"font-size:16px\">Soft padded interior and specially designed ear cushions for a smooth fit.</span></li>\n</ul>', 'Suitable for studying, listening to music and browsing with safe protection for listening.', 'مناسبة للدراسة و الاستماع للموسيقى مع الحماية الامنة للسمع .', '1625693681B3BAD16B-DB2A-420E-B04A-3B20081901ED.jpeg', 199.13, 0.00, 138.00, 140.00, 160.00, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:30:53', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6149, 120, 83, '6925281976933', 1, 'simple', 'سماعة JR310 سلكية للاطفال من جي بي ال - ازرق', 'JBL JR310 Kids On-Ear headphones - Blue', '<ul dir=\"ltr\">\n	<li>آمنة وخفيفة الوزن مخصصة للأطفال ، توفر سماعات الرأس اللاسلكية JBL Jr310BT بأمان ما يصل إلى 30 ساعة من صوت JBL النقي والمرح لأصغر عشاق الموسيقى.</li>\n	<li>مناسبة للدراسة و الاستماع للموسيقى والتصفح مع الحماية الامنة للاستماع .</li>\n	<li>تم تصميم سماعات الرأس بحيث لا تتجاوز أبدًا 85 ديسيبل لحماية السمع ، مع أدوات تحكم يمكن للأطفال أنفسهم تشغيلها بسهولة.</li>\n	<li>&nbsp;مبطنة من الداخل و ناعمة و مصممة خصيصًا ووسائد أذن لملاءمة ناعمة.</li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Safe and lightweight for kids, the JBL Jr310BT Wireless Headphones safely deliver up to 30 hours of pure JBL sound and fun for the youngest music lovers.</span></li>\n	<li><span style=\"font-size:16px\">Suitable for studying, listening to music and browsing with safe protection for listening.</span></li>\n	<li><span style=\"font-size:16px\">The headphones are designed to never exceed 85 decibels for hearing protection, with controls that children themselves can easily operate.</span></li>\n	<li><span style=\"font-size:16px\">Soft padded interior and specially designed ear cushions for a smooth fit.</span></li>\n</ul>', 'Suitable for studying, listening to music and browsing with safe protection for listening.', 'مناسبة للدراسة و الاستماع للموسيقى مع الحماية الامنة للسمع .', '1625693747CBBEFD6A-5485-4798-8B09-2B1E5232615B.jpeg', 129.56, 0.00, 85.00, 87.00, 92.00, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:31:00', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6150, 120, 83, '6925281976919', 1, 'simple', 'سماعة JR310 سلكية للاطفال من جي بي ال - احمر', 'JBL JR310 Kids On-Ear headphones - Red', '<ul>\n	<li><span style=\"font-size:16px\">آمنة وخفيفة الوزن مخصصة للأطفال ، توفر سماعات الرأس اللاسلكية JBL Jr310BT بأمان ما يصل إلى 30 ساعة من صوت JBL النقي والمرح لأصغر عشاق الموسيقى.</span></li>\n	<li><span style=\"font-size:16px\">مناسبة للدراسة و الاستماع للموسيقى والتصفح مع الحماية الامنة للاستماع .</span></li>\n	<li><span style=\"font-size:16px\">تم تصميم سماعات الرأس بحيث لا تتجاوز أبدًا 85 ديسيبل لحماية السمع ، مع أدوات تحكم يمكن للأطفال أنفسهم تشغيلها بسهولة.</span></li>\n	<li><span style=\"font-size:16px\">&nbsp;مبطنة من الداخل و ناعمة و مصممة خصيصًا ووسائد أذن لملاءمة ناعمة.</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Safe and lightweight for kids, the JBL Jr310BT Wireless Headphones safely deliver up to 30 hours of pure JBL sound and fun for the youngest music lovers.</span></li>\n	<li><span style=\"font-size:16px\">Suitable for studying, listening to music and browsing with safe protection for listening.</span></li>\n	<li><span style=\"font-size:16px\">The headphones are designed to never exceed 85 decibels for hearing protection, with controls that children themselves can easily operate.</span></li>\n	<li><span style=\"font-size:16px\">Soft padded interior and specially designed ear cushions for a smooth fit.</span></li>\n</ul>', 'Suitable for studying, listening to music and browsing with safe protection for listening.', 'مناسبة للدراسة و الاستماع للموسيقى مع الحماية الامنة للسمع .', '1625693830049621A9-ABCC-4975-ABB0-84D11825F649.jpeg', 129.56, 0.00, 85.00, 87.00, 92.00, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:31:07', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6151, 129, 83, '6925281939976', 1, 'simple', 'سماعة راس لاسلكية تون 500 من جي بي ال - ازرق', 'JBL T500 Wireless On-Ear Headphones with Mic - Blue', '<p><span style=\"font-size:16px\">سماعات رأس لاسلكية&nbsp; مدمجة ميكروفون t500&nbsp;&nbsp;تتميز بالتصميم الجذاب والجودة العالية واللون الأنيق، كما أنها مريحة للاستخدام اليومي وسهلة الحمل.</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">تتميز بصوت واضح ونقي</span></li>\n	<li><span style=\"font-size:16px\">سهلة التحكم والاستخدام</span></li>\n	<li><span style=\"font-size:16px\">مزودة بميكروفون يمكنك من إجراء المكالمات الهاتفية بسهولة</span></li>\n	<li><span style=\"font-size:16px\">تصميم عصري</span></li>\n	<li><span style=\"font-size:16px\">وزن خفيف</span></li>\n	<li><span style=\"font-size:16px\">سهلة الحمل</span></li>\n</ul>', '<p><span style=\"font-size:16px\">Wireless Headphones Built-in Microphone T500 Featuring an attractive design, high quality and elegant color, it is convenient for everyday use and easy to carry.</span></p>\n\n<p><span style=\"font-size:16px\">It has a clear and pure sound<br />\nEasy to control and use<br />\nEquipped with a microphone that enables you to make phone calls easily<br />\nmodern design<br />\nLightweight<br />\neasy to carry</span></p>', 'Suitable for daily use.', 'مناسبة للاستخدام اليومي.', '1625693847757996D2-6349-42A7-9593-563A4C092180.jpeg', 199.13, 0.00, 145.00, 148.00, 152.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:31:15', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6152, 129, 83, '6925281939969', 1, 'simple', 'سماعة راس لاسلكية تون 500 من جي بي ال - ابيض', 'JBL T500 Wireless On-Ear Headphones with Mic - White', '<p><span style=\"font-size:16px\">سماعات رأس لاسلكية&nbsp; مدمجة ميكروفون t500&nbsp;&nbsp;تتميز بالتصميم الجذاب والجودة العالية واللون الأنيق، كما أنها مريحة للاستخدام اليومي وسهلة الحمل.</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">تتميز بصوت واضح ونقي</span></li>\n	<li><span style=\"font-size:16px\">سهلة التحكم والاستخدام</span></li>\n	<li><span style=\"font-size:16px\">مزودة بميكروفون يمكنك من إجراء المكالمات الهاتفية بسهولة</span></li>\n	<li><span style=\"font-size:16px\">تصميم عصري</span></li>\n	<li><span style=\"font-size:16px\">وزن خفيف</span></li>\n	<li><span style=\"font-size:16px\">سهلة الحمل</span></li>\n</ul>', '<p><span style=\"font-size:16px\">Wireless Headphones Built-in Microphone T500 Featuring an attractive design, high quality and elegant color, it is convenient for everyday use and easy to carry.</span></p>\n\n<p><span style=\"font-size:16px\">It has a clear and pure sound<br />\nEasy to control and use<br />\nEquipped with a microphone that enables you to make phone calls easily<br />\nmodern design<br />\nLightweight<br />\neasy to carry</span></p>', 'Suitable for daily use.', 'مناسبة للاستخدام اليومي.', '162569390034188B18-CF0F-4DA8-8BB9-F56EDF19F999.jpeg', 199.13, 0.00, 145.00, 148.00, 152.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:31:22', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6153, 129, 83, '6925281945151', 1, 'simple', 'سماعة راس لاسلكية تون 500 من جي بي ال - وردي', 'JBL T500 Wireless On-Ear Headphones with Mic - Pink', '<p><span style=\"font-size:16px\">سماعات رأس لاسلكية&nbsp; مدمجة ميكروفون t500&nbsp;&nbsp;تتميز بالتصميم الجذاب والجودة العالية واللون الأنيق، كما أنها مريحة للاستخدام اليومي وسهلة الحمل.</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">تتميز بصوت واضح ونقي</span></li>\n	<li><span style=\"font-size:16px\">سهلة التحكم والاستخدام</span></li>\n	<li><span style=\"font-size:16px\">مزودة بميكروفون يمكنك من إجراء المكالمات الهاتفية بسهولة</span></li>\n	<li><span style=\"font-size:16px\">تصميم عصري</span></li>\n	<li><span style=\"font-size:16px\">وزن خفيف</span></li>\n	<li><span style=\"font-size:16px\">سهلة الحمل</span></li>\n</ul>', '<p><span style=\"font-size:16px\">Wireless Headphones Built-in Microphone T500 Featuring an attractive design, high quality and elegant color, it is convenient for everyday use and easy to carry.</span></p>\n\n<p><span style=\"font-size:16px\">It has a clear and pure sound<br />\nEasy to control and use<br />\nEquipped with a microphone that enables you to make phone calls easily<br />\nmodern design<br />\nLightweight<br />\neasy to carry</span></p>', 'Suitable for daily use.', 'مناسبة للاستخدام اليومي.', '1625693956E57A004C-837D-415D-BC97-B259C6E2192B.jpeg', 199.13, 0.00, 145.00, 148.00, 152.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:31:29', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6154, 129, 83, '6925281939952', 1, 'simple', 'سماعة راس لاسلكية تون 500 من جي بي ال - اسود', 'JBL T500 Wireless On-Ear Headphones with Mic - Black', '<p><span style=\"font-size:16px\">سماعات رأس لاسلكية&nbsp; مدمجة ميكروفون t500&nbsp;&nbsp;تتميز بالتصميم الجذاب والجودة العالية واللون الأنيق، كما أنها مريحة للاستخدام اليومي وسهلة الحمل.</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">تتميز بصوت واضح ونقي</span></li>\n	<li><span style=\"font-size:16px\">سهلة التحكم والاستخدام</span></li>\n	<li><span style=\"font-size:16px\">مزودة بميكروفون يمكنك من إجراء المكالمات الهاتفية بسهولة</span></li>\n	<li><span style=\"font-size:16px\">تصميم عصري</span></li>\n	<li><span style=\"font-size:16px\">وزن خفيف</span></li>\n	<li><span style=\"font-size:16px\">سهلة الحمل</span></li>\n</ul>', '<p><span style=\"font-size:16px\">Wireless Headphones Built-in Microphone T500 Featuring an attractive design, high quality and elegant color, it is convenient for everyday use and easy to carry.</span></p>\n\n<p><span style=\"font-size:16px\">It has a clear and pure sound<br />\nEasy to control and use<br />\nEquipped with a microphone that enables you to make phone calls easily<br />\nmodern design<br />\nLightweight<br />\neasy to carry</span></p>', 'Suitable for daily use.', 'مناسبة للاستخدام اليومي.', '16256940641AB7788F-CFCE-4307-B056-06A5A0C1C032.jpeg', 199.13, 0.00, 145.00, 148.00, 152.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:31:36', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6155, 117, 83, '6925281979293', 1, 'simple', 'سبيكر جي بي ال كليب4 ازرق مقاوم للماء 5واط', 'JBL Clip 4 Portable Wireless Speaker - Blue', '<h2 dir=\"ltr\" style=\"text-align:right\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Helvetica Neue&quot;,Arial,sans-serif\"><span style=\"background-color:#ffffff\">JBL CLIP4BLU BT-LOUDSPEAKER</span></span></span></span></h2>\n\n<ul>\n	<li><strong>صوت JBL Original Pro صوت :</strong></li>\n</ul>\n\n<p>قوي بشكل مدهش&nbsp;صوت&nbsp;JBL Pro على الرغم من الحجم الصغير للمقطع 4.</p>\n\n<ul>\n	<li><strong>أسلوب رائع وتصميم سهل الحمل للغاية</strong><br />\n	يتناسب تصميم JBL Clip 4 القابل للحمل بشكل جيد مع أحدث أنماط الموضة.&nbsp;المواد الملونة والتفاصيل المدهشة تجعلها تبدو رائعة كما تبدو.</li>\n	<li><strong>مزود بمقبض لتثبيت و تعليق&nbsp; السماعات في اي مكان وفي اي وقت .&nbsp;</strong></li>\n</ul>\n\n<p>&nbsp;المدمج في مكبر الصوت نفسه لتوفير حماية إضافية ، يمكنك اصطحاب JBL Clip 4 معك في كل مكان.&nbsp;ما عليك سوى إرفاقه بحزام أو حزام أو إبزيم واستكشاف العالم.</p>\n\n<ul>\n	<li><strong>IP67 مقاوم للماء والغبار</strong><br />\n	للمسبح.&nbsp;للحديقة.&nbsp;JBL Clip 4 مقاوم للماء والغبار وفقًا لمعيار IP67 ، بحيث يمكنك اصطحابه في كل مكان.</li>\n	<li><strong>Bluetooth لاسلكي</strong></li>\n	<li><strong>10 ساعات من عمر البطارية</strong></li>\n</ul>\n\n<p>لا تقلق بشأن الأشياء الصغيرة مثل شحن البطارية.&nbsp;يوفر JBL Clip 4 وقت تشغيل يصل إلى 10 ساعات بشحنة واحدة.</p>\n\n<ul style=\"list-style-type:none\">\n	<li>10 ساعات من عمر البطارية</li>\n	<li>خيارات الألوان الرائعة</li>\n	<li>مشغل مكبر الصوت: 40 مم</li>\n	<li>قدرة الخرج: 5 واط RMS</li>\n	<li>استجابة التردد: 100 هرتز - 20 كيلو هرتز</li>\n	<li>إشارة إلى ضوضاء:&nbsp;85 ديسيبل</li>\n	<li>نوع البطارية: بطارية ليثيوم أيون 3.885 واط</li>\n	<li>مدة شحن البطارية: 3 ساعات (5 فولت / 500 مللي أمبير)</li>\n	<li>مدة تشغيل الموسيقى: حتى 10 ساعات</li>\n	<li>&nbsp;</li>\n	<li>إصدار Bluetooth&reg;: 5.1</li>\n	<li>&nbsp;</li>\n</ul>', '<p>JBL CLIP4BLU BT-LOUDSPEAKER<br />\nJBL Original Pro Audio<br />\nThe JBL Pro sound is surprisingly powerful despite the small clip size 4.</p>\n\n<p>Gorgeous style and ultra-portable design<br />\nJBL Clip 4&#39;s portable design matches well with the latest fashion styles. Colorful materials and amazing details make it look as good as it looks.<br />\nEquipped with a handle to install and hang the headphones anywhere and at any time.<br />\nBuilt into the speaker itself for added protection, you can take the JBL Clip 4 with you everywhere. Simply attach it to a belt, belt or buckle and explore the world.</p>\n\n<p>IP67 waterproof and dustproof<br />\nfor the pool. for the garden. JBL Clip 4 is IP67 waterproof and dustproof, so you can take it everywhere.<br />\nBluetooth wireless<br />\n10 hours of battery life<br />\nDon&#39;t worry about the little things like charging the battery. The JBL Clip 4 offers up to 10 hours of playtime on a single charge.</p>\n\n<p>10 hours of battery life<br />\nGreat color options&nbsp;<br />\nSpeaker Driver: 40mm<br />\nOutput power: 5W RMS<br />\nFrequency response: 100Hz-20KHz<br />\nSignal to Noise: 85 dB<br />\nBattery type: Li-ion battery 3.885 watts<br />\nBattery charging time: 3 hours (5V/500mAh)<br />\nMusic playing time: up to 10 hours</p>\n\n<p>Bluetooth&reg; Version: 5.1</p>', 'Equipped with a handle to install and hang the headphones anywhere and at any time.', 'مزود بمقبض لتثبيت و تعليق  السماعات في اي مكان وفي اي وقت.', '16257681926925281979293 - 0.jpg', 216.52, 0.00, 180.00, 182.00, 185.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:31:43', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6156, 117, 83, '6925281979385', 1, 'simple', 'سبيكر جي بي ال كليب4 ابيض مقاوم للماء 5واط', 'JBL Clip 4 Portable Wireless Speaker - White', '<h2 dir=\"ltr\"><span style=\"font-size:16px\">JBL CLIP4BLU BT-LOUDSPEAKER</span></h2>\n\n<ul>\n	<li><span style=\"font-size:16px\"><strong>صوت JBL Original Pro صوت :</strong></span></li>\n</ul>\n\n<p><span style=\"font-size:16px\">قوي بشكل مدهش&nbsp;صوت&nbsp;JBL Pro على الرغم من الحجم الصغير للمقطع 4.</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\"><strong>أسلوب رائع وتصميم سهل الحمل للغاية</strong><br />\n	يتناسب تصميم JBL Clip 4 القابل للحمل بشكل جيد مع أحدث أنماط الموضة.&nbsp;المواد الملونة والتفاصيل المدهشة تجعلها تبدو رائعة كما تبدو.</span></li>\n	<li><span style=\"font-size:16px\"><strong>مزود بمقبض لتثبيت و تعليق&nbsp; السماعات في اي مكان وفي اي وقت .&nbsp;</strong></span></li>\n</ul>\n\n<p><span style=\"font-size:16px\">&nbsp;المدمج في مكبر الصوت نفسه لتوفير حماية إضافية ، يمكنك اصطحاب JBL Clip 4 معك في كل مكان.&nbsp;ما عليك سوى إرفاقه بحزام أو حزام أو إبزيم واستكشاف العالم.</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\"><strong>IP67 مقاوم للماء والغبار</strong><br />\n	للمسبح.&nbsp;للحديقة.&nbsp;JBL Clip 4 مقاوم للماء والغبار وفقًا لمعيار IP67 ، بحيث يمكنك اصطحابه في كل مكان.</span></li>\n	<li><span style=\"font-size:16px\"><strong>Bluetooth لاسلكي</strong></span></li>\n	<li><span style=\"font-size:16px\">​​​​​​​<strong>10 ساعات من عمر البطارية</strong></span></li>\n</ul>\n\n<p><span style=\"font-size:16px\">لا تقلق بشأن الأشياء الصغيرة مثل شحن البطارية.&nbsp;يوفر JBL Clip 4 وقت تشغيل يصل إلى 10 ساعات بشحنة واحدة.</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">10 ساعات من عمر البطارية</span></li>\n	<li><span style=\"font-size:16px\">خيارات الألوان الرائعة</span></li>\n	<li><span style=\"font-size:16px\">مشغل مكبر الصوت: 40 مم</span></li>\n	<li><span style=\"font-size:16px\">قدرة الخرج: 5 واط RMS</span></li>\n	<li><span style=\"font-size:16px\">استجابة التردد: 100 هرتز - 20 كيلو هرتز</span></li>\n	<li><span style=\"font-size:16px\">إشارة إلى ضوضاء:&nbsp;85 ديسيبل</span></li>\n	<li><span style=\"font-size:16px\">نوع البطارية: بطارية ليثيوم أيون 3.885 واط</span></li>\n	<li><span style=\"font-size:16px\">مدة شحن البطارية: 3 ساعات (5 فولت / 500 مللي أمبير)</span></li>\n	<li><span style=\"font-size:16px\">مدة تشغيل الموسيقى: حتى 10 ساعات</span></li>\n	<li>&nbsp;</li>\n	<li><span style=\"font-size:16px\">إصدار Bluetooth&reg;: 5.1</span></li>\n	<li>&nbsp;</li>\n</ul>\n\n<p>&nbsp;</p>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">JBL CLIP4BLU BT-LOUDSPEAKER</span></li>\n	<li><span style=\"font-size:16px\">JBL Original Pro Audio</span></li>\n	<li><span style=\"font-size:16px\">The JBL Pro sound is surprisingly powerful despite the small clip size 4.</span></li>\n	<li><span style=\"font-size:16px\">Gorgeous style and ultra-portable design</span></li>\n	<li><span style=\"font-size:16px\">JBL Clip 4&#39;s portable design matches well with the latest fashion styles. Colorful materials and amazing details make it look as good as it looks.</span></li>\n	<li><span style=\"font-size:16px\">Equipped with a handle to install and hang the headphones anywhere and at any time.</span></li>\n	<li><span style=\"font-size:16px\">Built into the speaker itself for added protection, you can take the JBL Clip 4 with you everywhere. Simply attach it to a belt, belt or buckle and explore the world.</span></li>\n	<li><span style=\"font-size:16px\">IP67 waterproof and dustproof</span></li>\n	<li><span style=\"font-size:16px\">for the pool. for the garden. JBL Clip 4 is IP67 waterproof and dustproof, so you can take it everywhere.</span></li>\n	<li><span style=\"font-size:16px\">Bluetooth wireless</span></li>\n	<li><span style=\"font-size:16px\">10 hours of battery life</span></li>\n	<li><span style=\"font-size:16px\">Don&#39;t worry about the little things like charging the battery. The JBL Clip 4 offers up to 10 hours of playtime on a single charge.</span></li>\n	<li><span style=\"font-size:16px\">10 hours of battery life</span></li>\n	<li><span style=\"font-size:16px\">Great color options&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">Speaker Driver: 40mm</span></li>\n	<li><span style=\"font-size:16px\">Output power: 5W RMS</span></li>\n	<li><span style=\"font-size:16px\">Frequency response: 100Hz-20KHz</span></li>\n	<li><span style=\"font-size:16px\">Signal to Noise: 85 dB</span></li>\n	<li><span style=\"font-size:16px\">Battery type: Li-ion battery 3.885 watts</span></li>\n	<li><span style=\"font-size:16px\">Battery charging time: 3 hours (5V/500mAh)</span></li>\n	<li><span style=\"font-size:16px\">Music playing time: up to 10 hours</span></li>\n	<li><span style=\"font-size:16px\">Bluetooth&reg; Version: 5.1</span></li>\n</ul>', 'Equipped with a handle to install and hang the headphones anywhere and at any time.', 'مزود بمقبض لتثبيت و تعليق  السماعات في اي مكان وفي اي وقت.', '16257769846925281979385.jpg', 216.52, 0.00, 180.00, 182.00, 185.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:31:50', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6157, 117, 83, '6925281979279', 1, 'simple', 'سبيكر جي بي ال كليب4 اسود مقاوم للماء 5واط', 'JBL Clip 4 Portable Wireless Speaker - Black', '<h2 dir=\"ltr\">JBL CLIP4BLU BT-LOUDSPEAKER</h2>\n\n<ul>\n	<li><strong>صوت JBL Original Pro صوت :</strong></li>\n</ul>\n\n<p>قوي بشكل مدهش&nbsp;صوت&nbsp;JBL Pro على الرغم من الحجم الصغير للمقطع 4.</p>\n\n<ul>\n	<li><strong>أسلوب رائع وتصميم سهل الحمل للغاية</strong><br />\n	يتناسب تصميم JBL Clip 4 القابل للحمل بشكل جيد مع أحدث أنماط الموضة.&nbsp;المواد الملونة والتفاصيل المدهشة تجعلها تبدو رائعة كما تبدو.</li>\n	<li><strong>مزود بمقبض لتثبيت و تعليق&nbsp; السماعات في اي مكان وفي اي وقت .&nbsp;</strong></li>\n</ul>\n\n<p>&nbsp;المدمج في مكبر الصوت نفسه لتوفير حماية إضافية ، يمكنك اصطحاب JBL Clip 4 معك في كل مكان.&nbsp;ما عليك سوى إرفاقه بحزام أو حزام أو إبزيم واستكشاف العالم.</p>\n\n<ul>\n	<li><strong>IP67 مقاوم للماء والغبار</strong><br />\n	للمسبح.&nbsp;للحديقة.&nbsp;JBL Clip 4 مقاوم للماء والغبار وفقًا لمعيار IP67 ، بحيث يمكنك اصطحابه في كل مكان.</li>\n	<li><strong>Bluetooth لاسلكي</strong></li>\n	<li><strong>10 ساعات من عمر البطارية</strong></li>\n</ul>\n\n<p>لا تقلق بشأن الأشياء الصغيرة مثل شحن البطارية.&nbsp;يوفر JBL Clip 4 وقت تشغيل يصل إلى 10 ساعات بشحنة واحدة.</p>\n\n<ul>\n	<li>10 ساعات من عمر البطارية</li>\n	<li>خيارات الألوان الرائعة</li>\n	<li>مشغل مكبر الصوت: 40 مم</li>\n	<li>قدرة الخرج: 5 واط RMS</li>\n	<li>استجابة التردد: 100 هرتز - 20 كيلو هرتز</li>\n	<li>إشارة إلى ضوضاء:&nbsp;85 ديسيبل</li>\n	<li>نوع البطارية: بطارية ليثيوم أيون 3.885 واط</li>\n	<li>مدة شحن البطارية: 3 ساعات (5 فولت / 500 مللي أمبير)</li>\n	<li>مدة تشغيل الموسيقى: حتى 10 ساعات</li>\n	<li>&nbsp;</li>\n	<li>إصدار Bluetooth&reg;: 5.1</li>\n	<li>&nbsp;</li>\n</ul>\n\n<p>​​​​​​​</p>', '<ul dir=\"ltr\">\n	<li>JBL CLIP4BLU BT-LOUDSPEAKER</li>\n	<li>JBL Original Pro Audio</li>\n	<li>The JBL Pro sound is surprisingly powerful despite the small clip size 4.</li>\n	<li>Gorgeous style and ultra-portable design</li>\n	<li>JBL Clip 4&#39;s portable design matches well with the latest fashion styles. Colorful materials and amazing details make it look as good as it looks.</li>\n	<li>Equipped with a handle to install and hang the headphones anywhere and at any time.</li>\n	<li>Built into the speaker itself for added protection, you can take the JBL Clip 4 with you everywhere. Simply attach it to a belt, belt or buckle and explore the world.</li>\n	<li>IP67 waterproof and dustproof</li>\n	<li>for the pool. for the garden. JBL Clip 4 is IP67 waterproof and dustproof, so you can take it everywhere.</li>\n	<li>Bluetooth wireless</li>\n	<li>10 hours of battery life</li>\n	<li>Don&#39;t worry about the little things like charging the battery. The JBL Clip 4 offers up to 10 hours of playtime on a single charge.</li>\n	<li>10 hours of battery life</li>\n	<li>Great color options&nbsp;</li>\n	<li>Speaker Driver: 40mm</li>\n	<li>Output power: 5W RMS</li>\n	<li>Frequency response: 100Hz-20KHz</li>\n	<li>Signal to Noise: 85 dB</li>\n	<li>Battery type: Li-ion battery 3.885 watts</li>\n	<li>Battery charging time: 3 hours (5V/500mAh)</li>\n	<li>Music playing time: up to 10 hours</li>\n	<li>Bluetooth&reg; Version: 5.1</li>\n</ul>', 'Equipped with a handle to install and hang the headphones anywhere and at any time.', 'مزود بمقبض لتثبيت و تعليق  السماعات في اي مكان وفي اي وقت.', '16257776186925281979279.jpg', 216.52, 0.00, 180.00, 182.00, 185.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:31:56', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6158, 117, 83, '6925281979354', 1, 'simple', 'سبيكر جي بي ال كليب4 وردي مقاوم للماء 5واط', 'JBL Clip 4 Portable Wireless Speaker - Pink', '<h2 dir=\"ltr\">JBL CLIP4BLU BT-LOUDSPEAKER</h2>\n\n<ul>\n	<li><strong>صوت JBL Original Pro صوت :</strong></li>\n</ul>\n\n<p>قوي بشكل مدهش&nbsp;صوت&nbsp;JBL Pro على الرغم من الحجم الصغير للمقطع 4.</p>\n\n<ul>\n	<li><strong>أسلوب رائع وتصميم سهل الحمل للغاية</strong><br />\n	يتناسب تصميم JBL Clip 4 القابل للحمل بشكل جيد مع أحدث أنماط الموضة.&nbsp;المواد الملونة والتفاصيل المدهشة تجعلها تبدو رائعة كما تبدو.</li>\n	<li><strong>مزود بمقبض لتثبيت و تعليق&nbsp; السماعات في اي مكان وفي اي وقت .&nbsp;</strong></li>\n</ul>\n\n<p>&nbsp;المدمج في مكبر الصوت نفسه لتوفير حماية إضافية ، يمكنك اصطحاب JBL Clip 4 معك في كل مكان.&nbsp;ما عليك سوى إرفاقه بحزام أو حزام أو إبزيم واستكشاف العالم.</p>\n\n<ul>\n	<li><strong>IP67 مقاوم للماء والغبار</strong><br />\n	للمسبح.&nbsp;للحديقة.&nbsp;JBL Clip 4 مقاوم للماء والغبار وفقًا لمعيار IP67 ، بحيث يمكنك اصطحابه في كل مكان.</li>\n	<li><strong>Bluetooth لاسلكي</strong></li>\n	<li><strong>10 ساعات من عمر البطارية</strong></li>\n</ul>\n\n<p>لا تقلق بشأن الأشياء الصغيرة مثل شحن البطارية.&nbsp;يوفر JBL Clip 4 وقت تشغيل يصل إلى 10 ساعات بشحنة واحدة.</p>\n\n<ul>\n	<li>10 ساعات من عمر البطارية</li>\n	<li>خيارات الألوان الرائعة</li>\n	<li>مشغل مكبر الصوت: 40 مم</li>\n	<li>قدرة الخرج: 5 واط RMS</li>\n	<li>استجابة التردد: 100 هرتز - 20 كيلو هرتز</li>\n	<li>إشارة إلى ضوضاء:&nbsp;85 ديسيبل</li>\n	<li>نوع البطارية: بطارية ليثيوم أيون 3.885 واط</li>\n	<li>مدة شحن البطارية: 3 ساعات (5 فولت / 500 مللي أمبير)</li>\n	<li>مدة تشغيل الموسيقى: حتى 10 ساعات</li>\n	<li>إصدار Bluetooth&reg;: 5.1</li>\n</ul>', '<p>JBL CLIP4BLU BT-LOUDSPEAKER<br />\nJBL Original Pro Audio<br />\nThe JBL Pro sound is surprisingly powerful despite the small clip size 4.</p>\n\n<p>Gorgeous style and ultra-portable design<br />\nJBL Clip 4&#39;s portable design matches well with the latest fashion styles. Colorful materials and amazing details make it look as good as it looks.<br />\nEquipped with a handle to install and hang the headphones anywhere and at any time.<br />\nBuilt into the speaker itself for added protection, you can take the JBL Clip 4 with you everywhere. Simply attach it to a belt, belt or buckle and explore the world.</p>\n\n<p>IP67 waterproof and dustproof<br />\nfor the pool. for the garden. JBL Clip 4 is IP67 waterproof and dustproof, so you can take it everywhere.<br />\nBluetooth wireless<br />\n10 hours of battery life<br />\nDon&#39;t worry about the little things like charging the battery. The JBL Clip 4 offers up to 10 hours of playtime on a single charge.</p>\n\n<p>10 hours of battery life<br />\nGreat color options&nbsp;<br />\nSpeaker Driver: 40mm<br />\nOutput power: 5W RMS<br />\nFrequency response: 100Hz-20KHz<br />\nSignal to Noise: 85 dB<br />\nBattery type: Li-ion battery 3.885 watts<br />\nBattery charging time: 3 hours (5V/500mAh)<br />\nMusic playing time: up to 10 hours</p>\n\n<p>Bluetooth&reg; Version: 5.1</p>', 'Equipped with a handle to install and hang the headphones anywhere and at any time.', 'مزود بمقبض لتثبيت و تعليق  السماعات في اي مكان وفي اي وقت.', '16260116306925281979354.jpg', 216.52, 0.00, 180.00, 182.00, 185.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:32:03', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6159, 117, 83, '6925281979309', 1, 'simple', 'سبيكر جي بي ال كليب4 ازرق ووردي  مقاوم للماء 5واط', 'JBL Clip 4 Portable Wireless Speaker - Blue/Pink', '<h2 dir=\"ltr\">JBL CLIP4BLU BT-LOUDSPEAKER</h2>\n\n<ul>\n	<li><strong>صوت JBL Original Pro صوت :</strong></li>\n</ul>\n\n<p>قوي بشكل مدهش&nbsp;صوت&nbsp;JBL Pro على الرغم من الحجم الصغير للمقطع 4.</p>\n\n<ul>\n	<li><strong>أسلوب رائع وتصميم سهل الحمل للغاية</strong><br />\n	يتناسب تصميم JBL Clip 4 القابل للحمل بشكل جيد مع أحدث أنماط الموضة.&nbsp;المواد الملونة والتفاصيل المدهشة تجعلها تبدو رائعة كما تبدو.</li>\n	<li><strong>مزود بمقبض لتثبيت و تعليق&nbsp; السماعات في اي مكان وفي اي وقت .&nbsp;</strong></li>\n</ul>\n\n<p>&nbsp;المدمج في مكبر الصوت نفسه لتوفير حماية إضافية ، يمكنك اصطحاب JBL Clip 4 معك في كل مكان.&nbsp;ما عليك سوى إرفاقه بحزام أو حزام أو إبزيم واستكشاف العالم.</p>\n\n<ul>\n	<li><strong>IP67 مقاوم للماء والغبار</strong><br />\n	للمسبح.&nbsp;للحديقة.&nbsp;JBL Clip 4 مقاوم للماء والغبار وفقًا لمعيار IP67 ، بحيث يمكنك اصطحابه في كل مكان.</li>\n	<li><strong>Bluetooth لاسلكي</strong></li>\n	<li><strong>10 ساعات من عمر البطارية</strong></li>\n</ul>\n\n<p>لا تقلق بشأن الأشياء الصغيرة مثل شحن البطارية.&nbsp;يوفر JBL Clip 4 وقت تشغيل يصل إلى 10 ساعات بشحنة واحدة.</p>\n\n<ul>\n	<li>10 ساعات من عمر البطارية</li>\n	<li>خيارات الألوان الرائعة</li>\n	<li>مشغل مكبر الصوت: 40 مم</li>\n	<li>قدرة الخرج: 5 واط RMS</li>\n	<li>استجابة التردد: 100 هرتز - 20 كيلو هرتز</li>\n	<li>إشارة إلى ضوضاء:&nbsp;85 ديسيبل</li>\n	<li>نوع البطارية: بطارية ليثيوم أيون 3.885 واط</li>\n	<li>مدة شحن البطارية: 3 ساعات (5 فولت / 500 مللي أمبير)</li>\n	<li>مدة تشغيل الموسيقى: حتى 10 ساعات</li>\n	<li>إصدار Bluetooth&reg;: 5.1</li>\n</ul>', '<p>JBL CLIP4BLU BT-LOUDSPEAKER<br />\nJBL Original Pro Audio<br />\nThe JBL Pro sound is surprisingly powerful despite the small clip size 4.</p>\n\n<p>Gorgeous style and ultra-portable design<br />\nJBL Clip 4&#39;s portable design matches well with the latest fashion styles. Colorful materials and amazing details make it look as good as it looks.<br />\nEquipped with a handle to install and hang the headphones anywhere and at any time.<br />\nBuilt into the speaker itself for added protection, you can take the JBL Clip 4 with you everywhere. Simply attach it to a belt, belt or buckle and explore the world.</p>\n\n<p>IP67 waterproof and dustproof<br />\nfor the pool. for the garden. JBL Clip 4 is IP67 waterproof and dustproof, so you can take it everywhere.<br />\nBluetooth wireless<br />\n10 hours of battery life<br />\nDon&#39;t worry about the little things like charging the battery. The JBL Clip 4 offers up to 10 hours of playtime on a single charge.</p>\n\n<p>10 hours of battery life<br />\nGreat color options الألوان<br />\nSpeaker Driver: 40mm<br />\nOutput power: 5W RMS<br />\nFrequency response: 100Hz-20KHz<br />\nSignal to Noise: 85 dB<br />\nBattery type: Li-ion battery 3.885 watts<br />\nBattery charging time: 3 hours (5V/500mAh)<br />\nMusic playing time: up to 10 hours</p>\n\n<p>Bluetooth&reg; Version: 5.1</p>', 'Equipped with a handle to install and hang the headphones anywhere and at any time.', 'مزود بمقبض لتثبيت و تعليق  السماعات في اي مكان وفي اي وقت.', '16260121376925281979309.jpg', 216.52, 0.00, 180.00, 182.00, 185.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:32:10', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6160, 117, 83, '6925281979316', 1, 'simple', 'سبيكر جي بي ال كليب4 احمر مقاوم للماء 5واط', 'JBL Clip 4 Portable Wireless Speaker - Red', '<h2 dir=\"ltr\"><span style=\"font-size:16px\">JBL CLIP4BLU BT-LOUDSPEAKER</span></h2>\n\n<ul>\n	<li><span style=\"font-size:16px\"><strong>صوت JBL Original Pro صوت :</strong></span></li>\n</ul>\n\n<p><span style=\"font-size:16px\">قوي بشكل مدهش&nbsp;صوت&nbsp;JBL Pro على الرغم من الحجم الصغير للمقطع 4.</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\"><strong>أسلوب رائع وتصميم سهل الحمل للغاية</strong><br />\n	يتناسب تصميم JBL Clip 4 القابل للحمل بشكل جيد مع أحدث أنماط الموضة.&nbsp;المواد الملونة والتفاصيل المدهشة تجعلها تبدو رائعة كما تبدو.</span></li>\n	<li><span style=\"font-size:16px\"><strong>مزود بمقبض لتثبيت و تعليق&nbsp; السماعات في اي مكان وفي اي وقت .&nbsp;</strong></span></li>\n</ul>\n\n<p><span style=\"font-size:16px\">&nbsp;المدمج في مكبر الصوت نفسه لتوفير حماية إضافية ، يمكنك اصطحاب JBL Clip 4 معك في كل مكان.&nbsp;ما عليك سوى إرفاقه بحزام أو حزام أو إبزيم واستكشاف العالم.</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\"><strong>IP67 مقاوم للماء والغبار</strong><br />\n	للمسبح.&nbsp;للحديقة.&nbsp;JBL Clip 4 مقاوم للماء والغبار وفقًا لمعيار IP67 ، بحيث يمكنك اصطحابه في كل مكان.</span></li>\n	<li><span style=\"font-size:16px\"><strong>Bluetooth لاسلكي</strong></span></li>\n	<li><span style=\"font-size:16px\"><strong>10 ساعات من عمر البطارية</strong></span></li>\n</ul>\n\n<p><span style=\"font-size:16px\">لا تقلق بشأن الأشياء الصغيرة مثل شحن البطارية.&nbsp;يوفر JBL Clip 4 وقت تشغيل يصل إلى 10 ساعات بشحنة واحدة.</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">10 ساعات من عمر البطارية</span></li>\n	<li><span style=\"font-size:16px\">خيارات الألوان الرائعة</span></li>\n	<li><span style=\"font-size:16px\">مشغل مكبر الصوت: 40 مم</span></li>\n	<li><span style=\"font-size:16px\">قدرة الخرج: 5 واط RMS</span></li>\n	<li><span style=\"font-size:16px\">استجابة التردد: 100 هرتز - 20 كيلو هرتز</span></li>\n	<li><span style=\"font-size:16px\">إشارة إلى ضوضاء:&nbsp;85 ديسيبل</span></li>\n	<li><span style=\"font-size:16px\">نوع البطارية: بطارية ليثيوم أيون 3.885 واط</span></li>\n	<li><span style=\"font-size:16px\">مدة شحن البطارية: 3 ساعات (5 فولت / 500 مللي أمبير)</span></li>\n	<li><span style=\"font-size:16px\">مدة تشغيل الموسيقى: حتى 10 ساعات</span></li>\n	<li><span style=\"font-size:16px\">إصدار Bluetooth&reg;: 5.1</span></li>\n</ul>', '<p>JBL CLIP4BLU BT-LOUDSPEAKER<br />\nJBL Original Pro Audio<br />\nThe JBL Pro sound is surprisingly powerful despite the small clip size 4.</p>\n\n<p>Gorgeous style and ultra-portable design<br />\nJBL Clip 4&#39;s portable design matches well with the latest fashion styles. Colorful materials and amazing details make it look as good as it looks.<br />\nEquipped with a handle to install and hang the headphones anywhere and at any time.<br />\nBuilt into the speaker itself for added protection, you can take the JBL Clip 4 with you everywhere. Simply attach it to a belt, belt or buckle and explore the world.</p>\n\n<p>IP67 waterproof and dustproof<br />\nfor the pool. for the garden. JBL Clip 4 is IP67 waterproof and dustproof, so you can take it everywhere.<br />\nBluetooth wireless<br />\n10 hours of battery life<br />\nDon&#39;t worry about the little things like charging the battery. The JBL Clip 4 offers up to 10 hours of playtime on a single charge.</p>\n\n<p>10 hours of battery life<br />\nGreat color options&nbsp;<br />\nSpeaker Driver: 40mm<br />\nOutput power: 5W RMS<br />\nFrequency response: 100Hz-20KHz<br />\nSignal to Noise: 85 dB<br />\nBattery type: Li-ion battery 3.885 watts<br />\nBattery charging time: 3 hours (5V/500mAh)<br />\nMusic playing time: up to 10 hours</p>\n\n<p>Bluetooth&reg; Version: 5.1</p>', 'Equipped with a handle to install and hang the headphones anywhere and at any time.', 'مزود بمقبض لتثبيت و تعليق  السماعات في اي مكان وفي اي وقت.', '16260130126925281979316.jpg', 216.52, 0.00, 180.00, 182.00, 185.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:32:17', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6161, 117, 83, '6925281979392', 1, 'simple', 'سبيكر جي بي ال كليب4 جيشي اخضر مقاوم للماء 5واط', 'JBL Clip 4 Portable Wireless Speaker - Squad', '<h2 dir=\"ltr\">JBL CLIP4BLU BT-LOUDSPEAKER</h2>\n\n<ul>\n	<li><strong>صوت JBL Original Pro صوت :</strong></li>\n</ul>\n\n<p>قوي بشكل مدهش&nbsp;صوت&nbsp;JBL Pro على الرغم من الحجم الصغير للمقطع 4.</p>\n\n<ul>\n	<li><strong>أسلوب رائع وتصميم سهل الحمل للغاية</strong><br />\n	يتناسب تصميم JBL Clip 4 القابل للحمل بشكل جيد مع أحدث أنماط الموضة.&nbsp;المواد الملونة والتفاصيل المدهشة تجعلها تبدو رائعة كما تبدو.</li>\n	<li><strong>مزود بمقبض لتثبيت و تعليق&nbsp; السماعات في اي مكان وفي اي وقت .&nbsp;</strong></li>\n</ul>\n\n<p>&nbsp;المدمج في مكبر الصوت نفسه لتوفير حماية إضافية ، يمكنك اصطحاب JBL Clip 4 معك في كل مكان.&nbsp;ما عليك سوى إرفاقه بحزام أو حزام أو إبزيم واستكشاف العالم.</p>\n\n<ul>\n	<li><strong>IP67 مقاوم للماء والغبار</strong><br />\n	للمسبح.&nbsp;للحديقة.&nbsp;JBL Clip 4 مقاوم للماء والغبار وفقًا لمعيار IP67 ، بحيث يمكنك اصطحابه في كل مكان.</li>\n	<li><strong>Bluetooth لاسلكي</strong></li>\n	<li><strong>10 ساعات من عمر البطارية</strong></li>\n</ul>\n\n<p>لا تقلق بشأن الأشياء الصغيرة مثل شحن البطارية.&nbsp;يوفر JBL Clip 4 وقت تشغيل يصل إلى 10 ساعات بشحنة واحدة.</p>\n\n<ul>\n	<li>10 ساعات من عمر البطارية</li>\n	<li>خيارات الألوان الرائعة</li>\n	<li>مشغل مكبر الصوت: 40 مم</li>\n	<li>قدرة الخرج: 5 واط RMS</li>\n	<li>استجابة التردد: 100 هرتز - 20 كيلو هرتز</li>\n	<li>إشارة إلى ضوضاء:&nbsp;85 ديسيبل</li>\n	<li>نوع البطارية: بطارية ليثيوم أيون 3.885 واط</li>\n	<li>مدة شحن البطارية: 3 ساعات (5 فولت / 500 مللي أمبير)</li>\n	<li>مدة تشغيل الموسيقى: حتى 10 ساعات</li>\n	<li>&nbsp;</li>\n	<li>إصدار Bluetooth&reg;: 5.1</li>\n</ul>\n\n<p>&nbsp;</p>', '<p>JBL CLIP4BLU BT-LOUDSPEAKER<br />\nJBL Original Pro Audio<br />\nThe JBL Pro sound is surprisingly powerful despite the small clip size 4.</p>\n\n<p>Gorgeous style and ultra-portable design<br />\nJBL Clip 4&#39;s portable design matches well with the latest fashion styles. Colorful materials and amazing details make it look as good as it looks.<br />\nEquipped with a handle to install and hang the headphones anywhere and at any time.<br />\nBuilt into the speaker itself for added protection, you can take the JBL Clip 4 with you everywhere. Simply attach it to a belt, belt or buckle and explore the world.</p>\n\n<p>IP67 waterproof and dustproof<br />\nfor the pool. for the garden. JBL Clip 4 is IP67 waterproof and dustproof, so you can take it everywhere.<br />\nBluetooth wireless<br />\n10 hours of battery life<br />\nDon&#39;t worry about the little things like charging the battery. The JBL Clip 4 offers up to 10 hours of playtime on a single charge.</p>\n\n<p>10 hours of battery life<br />\nGreat color options الألوان<br />\nSpeaker Driver: 40mm<br />\nOutput power: 5W RMS<br />\nFrequency response: 100Hz-20KHz<br />\nSignal to Noise: 85 dB<br />\nBattery type: Li-ion battery 3.885 watts<br />\nBattery charging time: 3 hours (5V/500mAh)<br />\nMusic playing time: up to 10 hours</p>\n\n<p>Bluetooth&reg; Version: 5.1</p>', 'Equipped with a handle to install and hang the headphones anywhere and at any time.', 'مزود بمقبض لتثبيت و تعليق  السماعات في اي مكان وفي اي وقت.', '16260134176925281979392.jpg', 216.52, 0.00, 180.00, 182.00, 185.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:32:24', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6162, 117, 83, '6925281979378', 1, 'simple', 'سبيكر جي بي ال كليب4 اخضر مقاوم للماء 5واط', 'JBL Clip 4 Portable Wireless Speaker - Green', NULL, NULL, NULL, NULL, '16260149046925281979378.jpg', 216.52, 0.00, 180.00, 182.00, 185.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:32:30', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6163, 117, 83, '6925281979286', 1, 'simple', 'سبيكر جي بي ال كليب4 اسود وبرتقالي مقاوم للماء 5واط', 'JBL Clip 4 Portable Wireless Speaker - Black / Orange', '<h2 dir=\"ltr\">JBL CLIP4BLU BT-LOUDSPEAKER</h2>\n\n<ul>\n	<li><strong>صوت JBL Original Pro صوت :</strong></li>\n</ul>\n\n<p>قوي بشكل مدهش&nbsp;صوت&nbsp;JBL Pro على الرغم من الحجم الصغير للمقطع 4.</p>\n\n<ul>\n	<li><strong>أسلوب رائع وتصميم سهل الحمل للغاية</strong><br />\n	يتناسب تصميم JBL Clip 4 القابل للحمل بشكل جيد مع أحدث أنماط الموضة.&nbsp;المواد الملونة والتفاصيل المدهشة تجعلها تبدو رائعة كما تبدو.</li>\n	<li><strong>مزود بمقبض لتثبيت و تعليق&nbsp; السماعات في اي مكان وفي اي وقت .&nbsp;</strong></li>\n</ul>\n\n<p>&nbsp;المدمج في مكبر الصوت نفسه لتوفير حماية إضافية ، يمكنك اصطحاب JBL Clip 4 معك في كل مكان.&nbsp;ما عليك سوى إرفاقه بحزام أو حزام أو إبزيم واستكشاف العالم.</p>\n\n<ul>\n	<li><strong>IP67 مقاوم للماء والغبار</strong><br />\n	للمسبح.&nbsp;للحديقة.&nbsp;JBL Clip 4 مقاوم للماء والغبار وفقًا لمعيار IP67 ، بحيث يمكنك اصطحابه في كل مكان.</li>\n	<li><strong>Bluetooth لاسلكي</strong></li>\n	<li><strong>10 ساعات من عمر البطارية</strong></li>\n</ul>\n\n<p>لا تقلق بشأن الأشياء الصغيرة مثل شحن البطارية.&nbsp;يوفر JBL Clip 4 وقت تشغيل يصل إلى 10 ساعات بشحنة واحدة.</p>\n\n<ul>\n	<li>10 ساعات من عمر البطارية</li>\n	<li>خيارات الألوان الرائعة</li>\n	<li>مشغل مكبر الصوت: 40 مم</li>\n	<li>قدرة الخرج: 5 واط RMS</li>\n	<li>استجابة التردد: 100 هرتز - 20 كيلو هرتز</li>\n	<li>إشارة إلى ضوضاء:&nbsp;85 ديسيبل</li>\n	<li>نوع البطارية: بطارية ليثيوم أيون 3.885 واط</li>\n	<li>مدة شحن البطارية: 3 ساعات (5 فولت / 500 مللي أمبير)</li>\n	<li>مدة تشغيل الموسيقى: حتى 10 ساعات</li>\n	<li>&nbsp;</li>\n	<li>إصدار Bluetooth&reg;: 5.1</li>\n</ul>\n\n<p>​​​​​​​</p>', '<p>JBL CLIP4BLU BT-LOUDSPEAKER<br />\nJBL Original Pro Audio<br />\nThe JBL Pro sound is surprisingly powerful despite the small clip size 4.</p>\n\n<p>Gorgeous style and ultra-portable design<br />\nJBL Clip 4&#39;s portable design matches well with the latest fashion styles. Colorful materials and amazing details make it look as good as it looks.<br />\nEquipped with a handle to install and hang the headphones anywhere and at any time.<br />\nBuilt into the speaker itself for added protection, you can take the JBL Clip 4 with you everywhere. Simply attach it to a belt, belt or buckle and explore the world.</p>\n\n<p>IP67 waterproof and dustproof<br />\nfor the pool. for the garden. JBL Clip 4 is IP67 waterproof and dustproof, so you can take it everywhere.<br />\nBluetooth wireless<br />\n10 hours of battery life<br />\nDon&#39;t worry about the little things like charging the battery. The JBL Clip 4 offers up to 10 hours of playtime on a single charge.</p>\n\n<p>10 hours of battery life<br />\nGreat color options&nbsp;<br />\nSpeaker Driver: 40mm<br />\nOutput power: 5W RMS<br />\nFrequency response: 100Hz-20KHz<br />\nSignal to Noise: 85 dB<br />\nBattery type: Li-ion battery 3.885 watts<br />\nBattery charging time: 3 hours (5V/500mAh)<br />\nMusic playing time: up to 10 hours</p>\n\n<p>Bluetooth&reg; Version: 5.1</p>', 'Equipped with a handle to install and hang the headphones anywhere and at any time.', 'مزود بمقبض لتثبيت و تعليق  السماعات في اي مكان وفي اي وقت.', '16260152346925281979286.jpg', 216.52, 0.00, 180.00, 182.00, 185.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:32:37', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6164, 125, 76, '1234567', 1, 'simple', 'ادابتر ابل 20واط بمنفذ بي دي ابيض', 'Apple 20W USB-C Power Adapter', '<p><span style=\"font-size:16px\">يوفر لك محول الطاقة USBC بقدرة 20 واط من Apple إمكانية الشحن بسرعة وكفاءة عالية في المنزل أو في المكتب أو أثناء التنقل. </span></p>\n\n<p><span style=\"font-size:16px\">وعلى الرغم من توافق محول الطاقة مع أي جهاز يدعم USBC، توصي Apple بإقرانه مع iPhone 12 وiPhone 12 Pro للحصول على أداء شحن مثالي.</span></p>\n\n<p>&nbsp;</p>', '<ul dir=\"ltr\">\n	<li>The USBC 20-watt adapter provides you with the power that&#39;s achieved in a single shot at the office or on the go.</li>\n	<li>And on any compatibility, the power adapter with any USBC-enabled device, compatibility with iPhone 12 and iPhone 12 Pro for optimum performance.</li>\n</ul>', 'The ability to charge quickly and efficiently at home, in the office or on the go.', 'إمكانية الشحن بسرعة وكفاءة عالية في المنزل أو في المكتب أو أثناء التنقل.', '16260156951234567.jpg', 77.39, 0.00, 68.00, 69.00, 70.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:33:24', NULL, NULL, '1_2_3_4', NULL, NULL, 1);
INSERT INTO `products` (`id`, `parent_id`, `brand_id`, `product_code`, `status`, `type`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `short_desc_en`, `short_desc_ar`, `product_photo`, `product_price`, `product_price1`, `product_price2`, `product_price3`, `product_price4`, `product_quantity`, `length`, `width`, `height`, `length_class`, `weight`, `weight_class`, `created_at`, `updated_at`, `details_ar`, `details_en`, `viewed_levels`, `video`, `yt_video`, `sort`) VALUES
(6165, 136, 113, '8532021001138', 1, 'simple', 'كوب ذكي لوكسار لون رمادي', 'Loksar smart cup, grey color', '<p>حافظة للذكية للسوائل من لوكسار :&nbsp;</p>\n\n<ul>\n	<li>حافظ على درجة حرارة مشروبك الحار و البارد لمدة تصل الى 10 ساعات.</li>\n	<li>مزودة بشاشة تعمل باللمس <strong>LED </strong>لمعرفة حرارة مشروبك الحار او البارد.</li>\n	<li>مزودة بصفاية قابلة للإزالة مصنوعة من الاستيل المقاوم للصدأ مناسبة لتصفية المشروبات الحارة من الشوائب.&nbsp;</li>\n	<li>لاتحتاج الى شحن.</li>\n	<li>بطارية طويلة المدى ( عمر البطارية ما يقارب سنة وسهلة التغيير)</li>\n	<li>الشاشة واضحة ومضيئة تعمل تحت اشعة اشمس او في المكان المظلم.&nbsp;</li>\n	<li>الحافظة مصنوعة بطبقة خارجية وداخلية من الستيل عازل للحرارة و غير قابلة للصدأ.&nbsp;</li>\n	<li>بتكون معاك فياي مكان في المنزل او المكتب او في السفر&nbsp;</li>\n	<li>مزودة بقاعدة بالاسفل مصنوعة من الجلد مما يمنع تحرك الكوب او انزلاقة في الاسطح الناعمة.</li>\n	<li>السعة 500 مل.&nbsp;</li>\n	<li>متوفرة بعدة الوان.&nbsp;</li>\n</ul>', '<p dir=\"ltr\">Loksar smart liquid keeper:</p>\n\n<ul dir=\"ltr\">\n	<li>Keep your drink hot and cold for up to 10 hours.</li>\n	<li>Equipped with a LED touch screen to know the temperature of your hot or cold drink.</li>\n	<li>Equipped with a removable filter made of stainless steel suitable for filtering hot drinks from impurities.</li>\n	<li>No need to charge.</li>\n	<li>Long life battery (battery life is about a year and easy to change)</li>\n	<li>The screen is clear and bright, it works under the sun&#39;s rays or in the dark.</li>\n	<li>The case is made of an outer and inner layer of heat-insulating and stainless steel.</li>\n	<li>The capacity is 500 ml.</li>\n	<li>Available in several colours.</li>\n</ul>', 'By touch you can know the temperature of your drink', 'باللمس تعرف درجة حرارة مشروبك.', '16257780868532021001138.jpg', 112.17, 0.00, 43.00, 43.00, 48.00, 965, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:21:07', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6166, 136, 113, '8542021001144', 1, 'simple', 'كوب ذكي لوكسار لون سماوي', 'Loksar smart cup, Light blue color', '<p>حافظة للذكية للسوائل من لوكسار :&nbsp;</p>\n\n<ul>\n	<li>حافظ على درجة حرارة مشروبك الحار و البارد لمدة تصل الى 10 ساعات.</li>\n	<li>مزودة بشاشة تعمل باللمس <strong>LED </strong>لمعرفة حرارة مشروبك الحار او البارد.</li>\n	<li>مزودة بصفاية قابلة للإزالة مصنوعة من الاستيل المقاوم للصدأ مناسبة لتصفية المشروبات الحارة من الشوائب.&nbsp;</li>\n	<li>لاتحتاج الى شحن.</li>\n	<li>بطارية طويلة المدى ( عمر البطارية ما يقارب سنة وسهلة التغيير)</li>\n	<li>الشاشة واضحة ومضيئة تعمل تحت اشعة اشمس او في المكان المظلم.&nbsp;</li>\n	<li>الحافظة مصنوعة بطبقة خارجية وداخلية من الستيل عازل للحرارة و غير قابلة للصدأ.&nbsp;</li>\n	<li>بتكون معاك فياي مكان في المنزل او المكتب او في السفر&nbsp;</li>\n	<li>مزودة بقاعدة بالاسفل مصنوعة من الجلد مما يمنع تحرك الكوب او انزلاقة في الاسطح الناعمة.</li>\n	<li>السعة 500 مل.&nbsp;</li>\n	<li>متوفرة بعدة الوان.&nbsp;</li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Loksar smart liquid keeper:</span></p>\n\n<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Keep your drink hot and cold for up to 10 hours.</span></li>\n	<li><span style=\"font-size:16px\">Equipped with a LED touch screen to know the temperature of your hot or cold drink.</span></li>\n	<li><span style=\"font-size:16px\">Equipped with a removable filter made of stainless steel suitable for filtering hot drinks from impurities.</span></li>\n	<li><span style=\"font-size:16px\">No need to charge.</span></li>\n	<li><span style=\"font-size:16px\">Long life battery (battery life is about a year and easy to change)</span></li>\n	<li><span style=\"font-size:16px\">The screen is clear and bright, it works under the sun&#39;s rays or in the dark.</span></li>\n	<li><span style=\"font-size:16px\">The case is made of an outer and inner layer of heat-insulating and stainless steel.</span></li>\n	<li><span style=\"font-size:16px\">The capacity is 500 ml.</span></li>\n	<li><span style=\"font-size:16px\">Available in several colours.</span></li>\n</ul>', 'By touch you can know the temperature of your drink', 'باللمس تعرف درجة حرارة مشروبك.', '16257688968542021001144.jpg', 112.17, 0.00, 43.00, 43.00, 48.00, 470, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:21:16', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6167, 136, 113, '8552021001150', 1, 'simple', 'كوب ذكي لوكسار لون احمر', 'Loksar smart cup, Red color', '<p><span style=\"font-size:16px\">حافظة للذكية للسوائل من لوكسار :&nbsp;</span></p>\n\n<ul>\n	<li><span style=\"font-size:16px\">حافظ على درجة حرارة مشروبك الحار و البارد لمدة تصل الى 10 ساعات.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بشاشة تعمل باللمس <strong>LED </strong>لمعرفة حرارة مشروبك الحار او البارد.</span></li>\n	<li><span style=\"font-size:16px\">مزودة بصفاية قابلة للإزالة مصنوعة من الاستيل المقاوم للصدأ مناسبة لتصفية المشروبات الحارة من الشوائب.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">لاتحتاج الى شحن.</span></li>\n	<li><span style=\"font-size:16px\">بطارية طويلة المدى ( عمر البطارية ما يقارب سنة وسهلة التغيير)</span></li>\n	<li><span style=\"font-size:16px\">الشاشة واضحة ومضيئة تعمل تحت اشعة اشمس او في المكان المظلم.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">الحافظة مصنوعة بطبقة خارجية وداخلية من الستيل عازل للحرارة و غير قابلة للصدأ.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">بتكون معاك فياي مكان في المنزل او المكتب او في السفر&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">مزودة بقاعدة بالاسفل مصنوعة من الجلد مما يمنع تحرك الكوب او انزلاقة في الاسطح الناعمة.</span></li>\n	<li><span style=\"font-size:16px\">السعة 500 مل.&nbsp;</span></li>\n	<li><span style=\"font-size:16px\">متوفرة بعدة الوان.&nbsp;</span></li>\n</ul>', '<p dir=\"ltr\"><span style=\"font-size:16px\">Loksar smart liquid keeper:</span></p>\n\n<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Keep your drink hot and cold for up to 10 hours.</span></li>\n	<li><span style=\"font-size:16px\">Equipped with a LED touch screen to know the temperature of your hot or cold drink.</span></li>\n	<li><span style=\"font-size:16px\">Equipped with a removable filter made of stainless steel suitable for filtering hot drinks from impurities.</span></li>\n	<li><span style=\"font-size:16px\">No need to charge.</span></li>\n	<li><span style=\"font-size:16px\">Long life battery (battery life is about a year and easy to change)</span></li>\n	<li><span style=\"font-size:16px\">The screen is clear and bright, it works under the sun&#39;s rays or in the dark.</span></li>\n	<li><span style=\"font-size:16px\">The case is made of an outer and inner layer of heat-insulating and stainless steel.</span></li>\n	<li><span style=\"font-size:16px\">The capacity is 500 ml.</span></li>\n	<li><span style=\"font-size:16px\">Available in several colours.</span></li>\n</ul>', 'By touch you can know the temperature of your drink', 'باللمس تعرف درجة حرارة مشروبك.', '16261167028552021001150.jpg', 112.17, 0.00, 43.00, 43.00, 48.00, 490, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:21:21', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6168, 133, 113, '855202100115', 1, 'simple', 'حقيبة لوكسار جلد اسود بخاصية البصمه', 'Loksar smart handprint bag', '<ul>\n	<li><span style=\"font-size:16px\">صُممت خصيصًا لحماية اغراضك</span></li>\n	<li><span style=\"font-size:16px\">مصنوعة من الجلد الطبيعي ، الياف البوليستر</span></li>\n	<li><span style=\"font-size:16px\">تحتوي على اربعة جيوب داخلية</span></li>\n	<li><span style=\"font-size:16px\">تحتوي على حزام جانبي لحمل الحقيبة</span></li>\n	<li><span style=\"font-size:16px\">تحتوي على بطارية قابلة لاعادة الشحن : ( نوع المنفذ 5V 200mA ) ، يمكنك فتح الحقيبه 800-1000 مره قبل اعادة شحنها</span></li>\n	<li><span style=\"font-size:16px\">سرعة فتح الحقيبة : 0.5 ثانية</span></li>\n	<li><span style=\"font-size:16px\">القدرة على مسح بصمة الاصبع في 360 درجة .</span></li>\n	<li><span style=\"font-size:16px\">امكانية تخزين 10 بصمات</span></li>\n	<li><span style=\"font-size:16px\">الابعاد : 24.5x60x14.5 cm</span></li>\n</ul>', '<ul dir=\"ltr\">\n	<li><span style=\"font-size:16px\">Designed to protect your belongings</span></li>\n	<li><span style=\"font-size:16px\">Made of genuine leather, polyester fibres</span></li>\n	<li><span style=\"font-size:16px\">It has four interior pockets</span></li>\n	<li><span style=\"font-size:16px\">It has a side strap to carry the bag</span></li>\n	<li><span style=\"font-size:16px\">Contains a rechargeable battery: (port type 5V 200mA), you can open the case 800-1000 times before recharging it</span></li>\n	<li><span style=\"font-size:16px\">Bag opening speed: 0.5 seconds</span></li>\n	<li><span style=\"font-size:16px\">The ability to scan the fingerprint in 360 degrees.</span></li>\n	<li><span style=\"font-size:16px\">The ability to store 10 fingerprints</span></li>\n	<li><span style=\"font-size:16px\">Dimensions: 24.5 x 60 x 14.5 cm</span></li>\n</ul>', 'It is specially designed to protect your belongings.', 'صُممت خصيصًا لحماية اغراضك.', '1625773229855202100115.jpg', 346.95, 230.00, 240.00, 260.00, 280.00, 190, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:06:08', '2021-07-13 20:21:28', NULL, NULL, '1_2_3_4', NULL, NULL, 1),
(6169, 125, 73, '6297000886855', 0, 'simple', 'بكج ادابتر منزلي  + كيبل  تايب سي - لايتنينج من باوراولوجي 30 واط', 'powerology dual port wall charge 30w USB 2.4 + PD with Type-c to Mfi lighting cable 1.2m - Black', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 65.00, 70.00, 75.00, 219, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6170, 115, 73, '7946044829104', 0, 'simple', 'كابلين باوراولوجي لايتنينج - تايب سي 0.25 , 0.9م اسود', 'powerology USB-C to lightning combo cable (0.25 + 0.9) - black', NULL, NULL, NULL, NULL, '', 120.87, 0.00, 57.00, 59.00, 62.00, 447, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6171, 115, 91, '745883788644', 0, 'simple', 'كيبل بيلكن لايتننيج - يو اس بي - 1م اسود', 'Belkin Boost Charge Lightning to USB-A Cable 1m - Black', NULL, NULL, NULL, NULL, '', 68.7, 0.00, 27.00, 28.00, 32.00, 1002, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6172, 136, 95, '8886461236323', 0, 'simple', 'بخاخ منظف للشاشة مضاد للميكروبات من فيفا مدريد - رمادي غامق', 'Viva Madrid Vanguard Vapor All in One Anti-Microbial Screen Cleaner - Dark Gray', NULL, NULL, NULL, NULL, '', 42.61, 0.00, 25.00, 26.00, 27.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6173, 136, 95, '8886461236347', 0, 'simple', 'بخاخ منظف للشاشة مضاد للميكروبات من فيفا مدريد - احمر', 'Viva Madrid Vanguard Vapor All in One Anti-Microbial Screen Cleaner - Red', NULL, NULL, NULL, NULL, '', 42.61, 0.00, 25.00, 26.00, 27.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6174, 136, 95, '8886461236330', 0, 'simple', 'بخاخ منظف للشاشة مضاد للميكروبات من فيفا مدريد - ازرق', 'Viva Madrid Vanguard Vapor All in One Anti-Microbial Screen Cleaner - Blue', NULL, NULL, NULL, NULL, '', 42.61, 0.00, 25.00, 26.00, 27.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6175, 115, 73, '6083749654080', 0, 'simple', 'كيبل باوراولوجي تايب سي تو تايب سي - 2 متر اسود', 'Powerology PVC Type-C to Type-C PD Cable 2M - Black', NULL, NULL, NULL, NULL, '', 68.7, 0.00, 22.00, 24.00, 26.00, 300, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6176, 129, 73, '7267547460480', 0, 'simple', 'سماعة ترو ستريو بودز - لاسلكية من باوراولوجي - ابيض', 'Powerology True Wireless Stereo Buds - White', NULL, NULL, NULL, NULL, '', 138.27, 0.00, 100.00, 105.00, 110.00, 120, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6177, 126, 73, '0', 0, 'simple', ' تغليف حراري شفاف ( مطفي ) للجوالات من باوراولوجي ( بكج 50 قطعة )', 'Powerology Film for Cutting Machine (50pc per pack) 18X12CM - Matte', NULL, NULL, NULL, NULL, '', 0, 0.00, 300.00, 300.00, 330.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6178, 126, 73, '0', 0, 'simple', ' تغليف حراري شفاف ( للخصوصية ) للجوالات من باوراولوجي ( بكج 50 قطعة )', 'Powerology Film for Cutting Machine (50pc per pack) 18X12CM - Privacy', NULL, NULL, NULL, NULL, '', 0, 0.00, 540.00, 540.00, 590.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6179, 115, 91, '745883797851', 0, 'simple', 'كيبل بيلكن لايتنينج - يو اس بي - 1م اخضر غامق', 'Belkin Boost Charge Lightning to USB-A Cable 1m - Midnight Green', NULL, NULL, NULL, NULL, '', 68.7, 0.00, 27.00, 28.00, 32.00, 504, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6180, 115, 91, '745883788651', 0, 'simple', 'كيبل بيلكن لايتنينج - يو اس بي - 1م - ابيض', 'Belkin Boost Charge Lightning to USB-A Cable 1m - White', NULL, NULL, NULL, NULL, '', 68.7, 0.00, 27.00, 28.00, 32.00, 500, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6181, 125, 91, '745883793761', 0, 'simple', 'ادابتر منزلي بيلكن بمنفذين يو اس بي 24 واط + كيبل بيلكن لايتنينج - يو اس بي - ابيض', 'Belkin Dual USB-A Wall Charger 24W with USB-A to USB-C Cable 1M - White', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 65.00, 68.00, 70.00, 252, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6182, 117, 102, '6935100156286', 0, 'simple', 'ميني سبيكر بلوتوث من جرين 3 واط - اسود', 'Green Mini Speaker - Black', NULL, NULL, NULL, NULL, '', 51.31, 0.00, 37.00, 38.00, 42.00, 200, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6183, 115, 91, '745883788491', 0, 'simple', 'كيبل بيلكن تايب سي - يو اس بي - 1م - ابيض', 'Belkin Charging Cable USB to Type-C 1M - White', NULL, NULL, NULL, NULL, '', 60, 0.00, 20.00, 22.00, 26.00, 87, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6184, 115, 91, '745883788484', 0, 'simple', 'كيبل بيلكن تايب سي - يو اس بي - 1م - اسود', 'Belkin Charging Cable USB to Type-C 1M - Black', NULL, NULL, NULL, NULL, '', 60, 0.00, 20.00, 22.00, 26.00, 127, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 20:23:32', '2021-08-22 20:23:32', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6185, 113, 76, '0123456789', 1, 'simple', 'ابل ايفون 12، 128 جيجابايت، الجيل الخامس', 'ابل ايفون 12، 128 جيجابايت، الجيل الخامس', '<h1>ابل ايفون 12، 128 جيجابايت، الجيل الخامس</h1>', '<h1>ابل ايفون 12، 128 جيجابايت، الجيل الخامس</h1>', 'ابل ايفون 12، 128 جيجابايت، الجيل الخامس', 'شاشة Super Retina XDR مقاس 6.1 إنش2\r\nCeramic Shield، أقوى من زجاج أي هاتف ذكي\r\nشبكة 5G لسرعات تنزيل فائقة وتشغيل عبر الإنترنت عالي الجودة1\r\nشريحة A14 Bionic، أسرع شريحة في هاتف ذكي على الإطلاق\r\nنظام كاميرا مزدوجة ‏متطور 12MP مع كاميرا واسعة للغاية وكاميرا واسعة، ونمط الليل، وDeep Fusion، وميزة HDR 3 الذكية، وتسجيل 4K HDR مع Dolby Vision', '1629731337apple_iphone-12_new-design_geo_10132020.jpg.news_app_ed.jpg', 120, 120.00, 120.00, 120.00, 120.00, 120, NULL, NULL, NULL, 'Centimeter', NULL, 'Kilogram', '2021-08-23 16:08:59', '2021-08-23 16:08:59', NULL, NULL, '1_2_3_4_5', '', NULL, 1),
(6186, 126, 113, 'E-0004', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - E-0004', 'Colorful thermal packaging for Loksar mobiles - E-0004\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6187, 126, 113, 'M-0023', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - M-0023', 'Colorful thermal packaging for Loksar mobiles - M-0023\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6188, 126, 113, 'A-0041', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0041', 'Colorful thermal packaging for Loksar mobiles - A-0041\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6189, 126, 113, 'PM-5020', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - PM-5020', 'Colorful thermal packaging for Loksar mobiles - PM-5020\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6190, 126, 113, 'SJ-1571', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - SJ-1571', 'Colorful thermal packaging for Loksar mobiles - SJ-1571\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6191, 126, 113, 'PM-5053', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - PM-5053', 'Colorful thermal packaging for Loksar mobiles -PM-5053\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6192, 126, 113, 'PM-5023', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - PM-5023', 'Colorful thermal packaging for Loksar mobiles -PM-5023\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6193, 126, 113, 'FD-0193', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - FD-0193', 'Colorful thermal packaging for Loksar mobiles -FD-0193\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6194, 126, 113, 'JS-0116', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - JS-0116', 'Colorful thermal packaging for Loksar mobiles - JS-0116\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6195, 126, 113, 'SJ-0842', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - SJ-0842', 'Colorful thermal packaging for Loksar mobiles -SJ-0842\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6196, 126, 113, 'PM-0030', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - PM-0030', 'Colorful thermal packaging for Loksar mobiles -PM-0030\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6197, 126, 113, 'FD-0357', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - FD-0357', 'Colorful thermal packaging for Loksar mobiles - FD-0357\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6198, 126, 113, 'BQGD-0131', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0131', 'Colorful thermal packaging for Loksar mobiles - BQGD-0131\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6199, 126, 113, 'A-0239', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0239', 'Colorful thermal packaging for Loksar mobiles -A-0239\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6200, 126, 113, 'BQGD-0051', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0051', 'Colorful thermal packaging for Loksar mobiles -BQGD-0051\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6201, 126, 113, 'BQGD-0067', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0067', 'Colorful thermal packaging for Loksar mobiles - BQGD-0067\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6202, 126, 113, 'BQGD-0037 ', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0037 ', 'Colorful thermal packaging for Loksar mobiles - BQGD-0037 \n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6203, 126, 113, 'Y-0024', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - Y-0024', 'Colorful thermal packaging for Loksar mobiles -Y-0024\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6204, 126, 113, 'A-0073', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0073', 'Colorful thermal packaging for Loksar mobiles -A-0073\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6205, 126, 113, 'A-0044', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0044', 'Colorful thermal packaging for Loksar mobiles -A-0044\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6206, 126, 113, 'A-0235', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0235', 'Colorful thermal packaging for Loksar mobiles -A-0235\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6207, 126, 113, 'A-0174', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0174', 'Colorful thermal packaging for Loksar mobiles -A-0174\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6208, 126, 113, 'A-0049', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0049', 'Colorful thermal packaging for Loksar mobiles - A-0049\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6209, 126, 113, 'A-0171', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0171', 'Colorful thermal packaging for Loksar mobiles - A-0171\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6210, 126, 113, 'A-0164', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0164', 'Colorful thermal packaging for Loksar mobiles - A-0164\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6211, 126, 113, 'A-0184', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0184', 'Colorful thermal packaging for Loksar mobiles - A-0184\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6212, 126, 113, 'A-0162', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0162', 'Colorful thermal packaging for Loksar mobiles - A-0162\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6213, 126, 113, 'A-0034', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0034', 'Colorful thermal packaging for Loksar mobiles - A-0034\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6214, 126, 113, 'A-0043', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0043', 'Colorful thermal packaging for Loksar mobiles - A-0043\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6215, 126, 113, 'A-0032', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0032', 'Colorful thermal packaging for Loksar mobiles - A-0032\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6216, 126, 113, 'BQGD-0128', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0128', 'Colorful thermal packaging for Loksar mobiles -BQGD-0128\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6217, 126, 113, 'BQGD-0078', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0078', 'Colorful thermal packaging for Loksar mobiles - BQGD-0078\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6218, 126, 113, 'BQGD-0075', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0075', 'Colorful thermal packaging for Loksar mobiles - BQGD-0075\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6219, 126, 113, 'BQGD-0132', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0132', 'Colorful thermal packaging for Loksar mobiles -BQGD-0132\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6220, 126, 113, 'BQGD-0058', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0058', 'Colorful thermal packaging for Loksar mobiles - BQGD-0058\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6221, 126, 113, 'BQGD-0127', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0127', 'Colorful thermal packaging for Loksar mobiles - BQGD-0127\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6222, 126, 113, 'BQGD-0246', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0246', 'Colorful thermal packaging for Loksar mobiles - BQGD-0246\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6223, 126, 113, 'BQGD-0059', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0059', 'Colorful thermal packaging for Loksar mobiles -BQGD-0059\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6224, 126, 113, 'BQGD-0062', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0062', 'Colorful thermal packaging for Loksar mobiles -BQGD-0062\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6225, 126, 113, 'BQGD-0035', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0035', 'Colorful thermal packaging for Loksar mobiles - BQGD-0035\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6226, 126, 113, 'BQGD-0252', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0252', 'Colorful thermal packaging for Loksar mobiles - BQGD-0252\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 18:55:40', '2021-11-07 18:55:40', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6268, 126, 113, 'E-0004', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - E-0004', 'Colorful thermal packaging for Loksar mobiles - E-0004\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:49', '2021-11-07 19:09:49', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6269, 126, 113, 'M-0023', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - M-0023', 'Colorful thermal packaging for Loksar mobiles - M-0023\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:49', '2021-11-07 19:09:49', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6270, 126, 113, 'A-0041', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0041', 'Colorful thermal packaging for Loksar mobiles - A-0041\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:49', '2021-11-07 19:09:49', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6271, 126, 113, 'PM-5020', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - PM-5020', 'Colorful thermal packaging for Loksar mobiles - PM-5020\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:49', '2021-11-07 19:09:49', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6272, 126, 113, 'SJ-1571', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - SJ-1571', 'Colorful thermal packaging for Loksar mobiles - SJ-1571\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:49', '2021-11-07 19:09:49', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6273, 126, 113, 'PM-5053', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - PM-5053', 'Colorful thermal packaging for Loksar mobiles -PM-5053\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:49', '2021-11-07 19:09:49', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6274, 126, 113, 'PM-5023', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - PM-5023', 'Colorful thermal packaging for Loksar mobiles -PM-5023\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:49', '2021-11-07 19:09:49', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6275, 126, 113, 'FD-0193', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - FD-0193', 'Colorful thermal packaging for Loksar mobiles -FD-0193\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:49', '2021-11-07 19:09:49', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6276, 126, 113, 'JS-0116', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - JS-0116', 'Colorful thermal packaging for Loksar mobiles - JS-0116\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:49', '2021-11-07 19:09:49', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6277, 126, 113, 'SJ-0842', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - SJ-0842', 'Colorful thermal packaging for Loksar mobiles -SJ-0842\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6278, 126, 113, 'PM-0030', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - PM-0030', 'Colorful thermal packaging for Loksar mobiles -PM-0030\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6279, 126, 113, 'FD-0357', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - FD-0357', 'Colorful thermal packaging for Loksar mobiles - FD-0357\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6280, 126, 113, 'BQGD-0131', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0131', 'Colorful thermal packaging for Loksar mobiles - BQGD-0131\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6281, 126, 113, 'A-0239', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0239', 'Colorful thermal packaging for Loksar mobiles -A-0239\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6282, 126, 113, 'BQGD-0051', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0051', 'Colorful thermal packaging for Loksar mobiles -BQGD-0051\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6283, 126, 113, 'BQGD-0067', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0067', 'Colorful thermal packaging for Loksar mobiles - BQGD-0067\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6284, 126, 113, 'BQGD-0037 ', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0037 ', 'Colorful thermal packaging for Loksar mobiles - BQGD-0037 \n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6285, 126, 113, 'Y-0024', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - Y-0024', 'Colorful thermal packaging for Loksar mobiles -Y-0024\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6286, 126, 113, 'A-0073', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0073', 'Colorful thermal packaging for Loksar mobiles -A-0073\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6287, 126, 113, 'A-0044', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0044', 'Colorful thermal packaging for Loksar mobiles -A-0044\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6288, 126, 113, 'A-0235', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0235', 'Colorful thermal packaging for Loksar mobiles -A-0235\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6289, 126, 113, 'A-0174', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0174', 'Colorful thermal packaging for Loksar mobiles -A-0174\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6290, 126, 113, 'A-0049', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0049', 'Colorful thermal packaging for Loksar mobiles - A-0049\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6291, 126, 113, 'A-0171', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0171', 'Colorful thermal packaging for Loksar mobiles - A-0171\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6292, 126, 113, 'A-0164', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0164', 'Colorful thermal packaging for Loksar mobiles - A-0164\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6293, 126, 113, 'A-0184', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0184', 'Colorful thermal packaging for Loksar mobiles - A-0184\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6294, 126, 113, 'A-0162', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0162', 'Colorful thermal packaging for Loksar mobiles - A-0162\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6295, 126, 113, 'A-0034', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0034', 'Colorful thermal packaging for Loksar mobiles - A-0034\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6296, 126, 113, 'A-0043', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0043', 'Colorful thermal packaging for Loksar mobiles - A-0043\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6297, 126, 113, 'A-0032', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - A-0032', 'Colorful thermal packaging for Loksar mobiles - A-0032\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6298, 126, 113, 'BQGD-0128', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0128', 'Colorful thermal packaging for Loksar mobiles -BQGD-0128\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6299, 126, 113, 'BQGD-0078', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0078', 'Colorful thermal packaging for Loksar mobiles - BQGD-0078\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6300, 126, 113, 'BQGD-0075', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0075', 'Colorful thermal packaging for Loksar mobiles - BQGD-0075\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6301, 126, 113, 'BQGD-0132', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0132', 'Colorful thermal packaging for Loksar mobiles -BQGD-0132\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6302, 126, 113, 'BQGD-0058', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0058', 'Colorful thermal packaging for Loksar mobiles - BQGD-0058\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6303, 126, 113, 'BQGD-0127', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0127', 'Colorful thermal packaging for Loksar mobiles - BQGD-0127\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6304, 126, 113, 'BQGD-0246', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0246', 'Colorful thermal packaging for Loksar mobiles - BQGD-0246\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6305, 126, 113, 'BQGD-0059', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0059', 'Colorful thermal packaging for Loksar mobiles -BQGD-0059\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6306, 126, 113, 'BQGD-0062', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0062', 'Colorful thermal packaging for Loksar mobiles -BQGD-0062\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6307, 126, 113, 'BQGD-0035', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0035', 'Colorful thermal packaging for Loksar mobiles - BQGD-0035\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6308, 126, 113, 'BQGD-0252', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار - BQGD-0252', 'Colorful thermal packaging for Loksar mobiles - BQGD-0252\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1);
INSERT INTO `products` (`id`, `parent_id`, `brand_id`, `product_code`, `status`, `type`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `short_desc_en`, `short_desc_ar`, `product_photo`, `product_price`, `product_price1`, `product_price2`, `product_price3`, `product_price4`, `product_quantity`, `length`, `width`, `height`, `length_class`, `weight`, `weight_class`, `created_at`, `updated_at`, `details_ar`, `details_en`, `viewed_levels`, `video`, `yt_video`, `sort`) VALUES
(6309, 126, 113, 'BQGD-0254', 0, 'simple', 'تغليف حراري ملون  للجوالات لوكسار -BQGD-0254', 'Colorful thermal packaging for Loksar mobiles - BQGD-0254\n', NULL, NULL, 'Your device deserves protection and elegance.\n', 'جهازك يستحق الحماية و الاناقة . ', '', 86.09, 0.00, 11.00, 11.00, 15.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-07 19:09:50', '2021-11-07 19:09:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6338, 116, 95, '8886461238846', 0, 'simple', 'حافظة لاب توب من فيفا مدريد Rever لجهاز Macbook Pro مقاس 16 بوصة - رمادي غامق', 'Viva Madrid Rever Multi-Functional Laptop Sleeve for Macbook Pro 16\" - Dark Gray', NULL, NULL, NULL, NULL, '', 173.05, 0.00, 110.00, 120.00, 130.00, 49, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6339, 131, 95, '8886461239737', 0, 'simple', 'سوار ساعة ابل مقاس 42- 44 مم من فيفا مدريد (جهتين ازرق و رمادي)', 'Viva Madrid Cosmo Magnetic Watch Strap For Apple Watch 42/44MM - Blue/Grey', NULL, NULL, NULL, NULL, '', 103.48, 0.00, 67.00, 68.00, 70.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6340, 131, 95, '8886461239720', 0, 'simple', 'سوار ساعة ابل مقاس 42- 44 مم من فيفا مدريد (جهتين  اخضر و اسود )', 'Viva Madrid Cosmo Magnetic Watch Strap For Apple Watch 42/44MM - Black/Green', NULL, NULL, NULL, NULL, '', 103.48, 0.00, 67.00, 68.00, 70.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6341, 116, 95, '8886461239478', 0, 'simple', 'غطاء (كفر)  فيفا مدريد مورفيكس ايفون 13 برو ماكس - أزرق باسيفيك', 'Viva Madrid Morphix Case For iPhone 13 Pro Max (6.7\") - pacific Blue', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6342, 116, 95, '8886461239492', 0, 'simple', 'غطاء (كفر) فيفا مدريد مورفيكس ايفون 13 برو ماكس - احمر', 'Viva Madrid Morphix Case For iPhone 13 Pro Max (6.7\") - Carmine', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6343, 116, 95, '8886461239461', 0, 'simple', 'غطاء (كفر) فيفا مدريد مورفيكس ايفون 13 برو ماكس - اسود', 'Viva Madrid Morphix Case For iPhone 13 Pro Max (6.7\") - Midnight', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6344, 116, 95, '8886461239485', 0, 'simple', 'غطاء (كفر) فيفا مدريد مورفيكس + ستاند ايفون 13 برو ماكس - اخضر و اسود', 'Viva Madrid Morphix Case For iPhone 13 Pro Max (6.7\") - Pacific Green', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6345, 116, 95, '8886461239423', 0, 'simple', 'غطاء (كفر) فيفا مدريد مورفيكس + ستاند ايفون 13 برو - أزرق باسيفيك', 'Viva Madrid Morphix Case For iPhone 13 Pro (6.1\") - Pacific Blue', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6346, 116, 95, '8886461239447', 0, 'simple', 'غطاء (كفر) فيفا مدريد مورفيكس + ستاند ايفون 13 برو -  اسود و احمر', 'Viva Madrid Morphix Case For iPhone 13 Pro (6.1\") - Carmine', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6347, 116, 95, '8886461239430', 0, 'simple', 'غطاء (كفر) فيفا مدريد مورفيكس + ستاند ايفون 13 برو - اخضر', 'Viva Madrid Morphix Case For iPhone 13 Pro (6.1\") - Pacific Green', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6348, 116, 95, '8886461239881', 0, 'simple', 'غطاء (كفر) فيفا مدريد مورفيكس + ستاند ايفون 13 برو - اخضر', 'Viva Madrid Morphix Case For iPhone 13 Pro (6.1\") - Forest Green', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6349, 116, 95, '8886461239416', 0, 'simple', 'غطاء (كفر) فيفا مدريد مورفيكس + ستاند ايفون 13 برو - اسود', 'Viva Madrid Morphix Case For iPhone 13 Pro (6.1\") - Midnight', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6350, 116, 95, '8886461239454', 0, 'simple', 'غطاء (كفر) فيفا مدريد مورفيكس + ستاند ايفون 13 برو -  اسود و برتقالي', 'VIva Madrid Morephix Case For iPhone 13 Pro (6.1\") - Amber', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6351, 116, 95, '8886461240405', 0, 'simple', 'غطاء (كفر )  فيفا مدريد لوبي + قبضة ايفون 13 برو ماكس - خط اخضر - شفاف', 'Viva Madrid Loope TPU/PC Clear Case With Extra Grip For iPhone 13 Pro Max (6.7\") - Forest Green', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6352, 116, 95, '8886461240382', 0, 'simple', 'غطاء (كفر )  فيفا مدريد لوبي + قبضة ايفون 13 برو ماكس - خط احمر - شفاف', 'Viva Madrid Loope TPU/PC Clear Case With Extra Grip For iPhone 13 Pro Max (6.7\") - Sundown', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6353, 116, 95, '8886461240399', 0, 'simple', 'غطاء (كفر )  فيفا مدريد لوبي + قبضة ايفون 13 برو ماكس - خط ازرق - شفاف', 'Viva Madrid Loope TPU/PC Clear Case With Extra Grip For iPhone 13 Pro Max (6.7\") - Colbat', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6354, 116, 95, '8886461240375', 0, 'simple', 'غطاء (كفر )  فيفا مدريد لوبي + قبضة ايفون 13 برو  - خط ابيض - شفاف', 'Viva Madrid Loope TPU/PC Clear Case With Extra Grip For iPhone 13 Pro (6.1\") - Pure', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 30, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6355, 116, 95, '8886461240368', 0, 'simple', 'غطاء (كفر )  فيفا مدريد لوبي + قبضة ايفون 13 برو  - خط اخضر - شفاف', 'Viva Madrid Loope TPU/PC Clear Case With Extra Grip for iPhone 13 Pro (6.1\") - Forest Green', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6356, 116, 95, '8886461240344', 0, 'simple', 'غطاء (كفر )  فيفا مدريد لوبي + قبضة ايفون 13 برو  - خط احمر - شفاف', 'Viva Madrid Loope TPU/PC Clear Case With Extra Grip For iPhone 13 Pro (6.1\") - Sundown', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6357, 116, 95, '8886461240351', 0, 'simple', 'غطاء (كفر )  فيفا مدريد لوبي + قبضة ايفون 13 برو  - خط ازرق - شفاف', 'Viva Madrid Loope TPU/PC Clear Case With Extra Grip For iPhone 13 Pro (6.1\") - Colbat', NULL, NULL, NULL, NULL, '', 86.09, 0.00, 60.00, 62.00, 65.00, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6358, 136, 73, '6083749658040', 0, 'simple', 'خلاط  ( عصارة فواكة )  محمول 6 شفرات  بسعة 450 مل - 126 واط من باوراولجي - اسود', 'Powerology 6-Blade Portable Juicer 450mL 126W - Black', NULL, NULL, NULL, NULL, '', 146.96, 0.00, 115.00, 118.00, 120.00, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6359, 125, 73, '6083749658286', 0, 'simple', ' شاحن جداري وايرلس مدمج مع بطارية  10000 مللي  أمبير PD 20 واط باور اولجي - اسود', 'Powerology Magsafe Wall Charger 10000mAh PD 20W - Black', NULL, NULL, NULL, NULL, '', 173.05, 0.00, 110.00, 115.00, 120.00, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6360, 120, 74, '2155387372115', 0, 'simple', 'سماعة سلكية اذن استريو من برودو ساوندتك 3.5 ملم مع ميكروفون  - ابيض', 'Porodo Soundtec Stereo Earphones 3.5mm with High-Clarify Mic - White', NULL, NULL, NULL, NULL, '', 42.61, 0.00, 12.00, 14.00, 18.00, 900, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6361, 132, 102, '6935100157566', 0, 'simple', 'مسكة 4*1 جلد مغناطيسي من جرين لايون - اسود', 'Green Magsafe Leather Phone Stand - Black', NULL, NULL, NULL, NULL, '', 42.61, 0.00, 22.00, 25.00, 28.00, 44, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(6362, 132, 102, '6935100157573', 0, 'simple', 'مسكة 4*1 جلد مغناطيسي من جرين لايون - ازرق', 'Green Magsafe Leather Phone Stand - Blue', NULL, NULL, NULL, NULL, '', 42.61, 0.00, 22.00, 25.00, 28.00, 54, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 14:14:48', '2022-01-05 14:14:48', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_combinations`
--

CREATE TABLE `product_combinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `combination` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `combination_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `combination_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `combination_values` text COLLATE utf8mb4_unicode_ci,
  `combination_names` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `options_ids` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_discounts`
--

CREATE TABLE `product_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `offer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(37, 5295, '1625497263856076007005.jpg', '2021-07-05 18:01:03', '2021-07-05 18:01:03'),
(38, 5295, '1625497263856076007005-1-01.jpg', '2021-07-05 18:01:03', '2021-07-05 18:01:03'),
(39, 5295, '1625497263856076007005-2-01.jpg', '2021-07-05 18:01:03', '2021-07-05 18:01:03'),
(40, 5296, '1625497952856076007012.jpg', '2021-07-05 18:12:33', '2021-07-05 18:12:33'),
(43, 5296, '1625498025856076007012-1.jpg', '2021-07-05 18:13:45', '2021-07-05 18:13:45'),
(44, 5297, '1625498723matt-01.jpg', '2021-07-05 18:25:23', '2021-07-05 18:25:23'),
(45, 5297, '1625498723matt-2-01.jpg', '2021-07-05 18:25:23', '2021-07-05 18:25:23'),
(46, 5297, '1625498775matt-01.jpg', '2021-07-05 18:26:15', '2021-07-05 18:26:15'),
(47, 5297, '1625498775matt-2-01.jpg', '2021-07-05 18:26:15', '2021-07-05 18:26:15'),
(69, 6002, '1625502038855821005075.jpg', '2021-07-05 19:20:38', '2021-07-05 19:20:38'),
(70, 6002, NULL, '2021-07-05 19:20:38', '2021-07-05 19:20:38'),
(71, 6002, '1625502038855821005280.jpg', '2021-07-05 19:20:38', '2021-07-05 19:20:38'),
(72, 6011, '16255106817946043887006-2.jpg', '2021-07-05 21:44:41', '2021-07-05 21:44:41'),
(73, 6013, '16255111437946044826448-2.jpg', '2021-07-05 21:52:24', '2021-07-05 21:52:24'),
(74, 6013, '16255111437946044826448-3.jpg', '2021-07-05 21:52:24', '2021-07-05 21:52:24'),
(75, 6013, '16255111437946044826448-4.jpg', '2021-07-05 21:52:24', '2021-07-05 21:52:24'),
(76, 6014, '16255112657946043886702-2.jpg', '2021-07-05 21:54:25', '2021-07-05 21:54:25'),
(77, 6014, '16255112657946043886702-3.jpg', '2021-07-05 21:54:25', '2021-07-05 21:54:25'),
(78, 6015, '16255114707946043889154-1.jpg', '2021-07-05 21:57:50', '2021-07-05 21:57:50'),
(79, 6015, '16255116217946043889154-1.jpg', '2021-07-05 22:00:21', '2021-07-05 22:00:21'),
(80, 6018, '16255119856297000886244-2.jpg', '2021-07-05 22:06:25', '2021-07-05 22:06:25'),
(81, 6016, '16255120116297000886244-2.jpg', '2021-07-05 22:06:51', '2021-07-05 22:06:51'),
(82, 6016, '16255120346297000886244-2.jpg', '2021-07-05 22:07:14', '2021-07-05 22:07:14'),
(83, 6021, '1625512165190198107022-2.jpg', '2021-07-05 22:09:25', '2021-07-05 22:09:25'),
(84, 6023, '1625512483190199370388-2.jpg', '2021-07-05 22:14:43', '2021-07-05 22:14:43'),
(85, 6023, '1625512590190199370388-2.jpg', '2021-07-05 22:16:30', '2021-07-05 22:16:30'),
(86, 6027, '1625513281848061070132-2.jpg', '2021-07-05 22:28:01', '2021-07-05 22:28:01'),
(87, 6028, '1625513419848061070132-2.jpg', '2021-07-05 22:30:19', '2021-07-05 22:30:19'),
(88, 6035, '1625513928848061049756-2.jpg', '2021-07-05 22:38:48', '2021-07-05 22:38:48'),
(89, 6036, '16255142098806085692701-2.jpg', '2021-07-05 22:43:29', '2021-07-05 22:43:29'),
(90, 6036, '16255142098806085692701-3.jpg', '2021-07-05 22:43:29', '2021-07-05 22:43:29'),
(91, 6036, '16255142098806085692701-4.jpg', '2021-07-05 22:43:29', '2021-07-05 22:43:29'),
(92, 6037, '16255143248806085692701-2.jpg', '2021-07-05 22:45:24', '2021-07-05 22:45:24'),
(93, 6037, '16255143248806085692701-3.jpg', '2021-07-05 22:45:24', '2021-07-05 22:45:24'),
(94, 6038, '16255144736297000886626-2.jpg', '2021-07-05 22:47:53', '2021-07-05 22:47:53'),
(95, 6041, '162551520417817755023-2.jpg', '2021-07-05 23:00:04', '2021-07-05 23:00:04'),
(96, 6041, '162551520417817755023-3.jpg', '2021-07-05 23:00:04', '2021-07-05 23:00:04'),
(97, 6041, '162551520417817755023-4.jpg', '2021-07-05 23:00:04', '2021-07-05 23:00:04'),
(98, 6041, '162551520417817755023-5.jpg', '2021-07-05 23:00:04', '2021-07-05 23:00:04'),
(99, 6041, '162551538517817755023-2.jpg', '2021-07-05 23:03:05', '2021-07-05 23:03:05'),
(100, 6041, '162551538517817755023-3.jpg', '2021-07-05 23:03:05', '2021-07-05 23:03:05'),
(101, 6041, '162551538517817755023-4.jpg', '2021-07-05 23:03:05', '2021-07-05 23:03:05'),
(102, 6041, '162551538517817755023-5.jpg', '2021-07-05 23:03:05', '2021-07-05 23:03:05'),
(103, 6041, '162551544817817755023-2.jpg', '2021-07-05 23:04:09', '2021-07-05 23:04:09'),
(104, 6041, '162551544917817755023-3.jpg', '2021-07-05 23:04:09', '2021-07-05 23:04:09'),
(105, 6041, '162551544917817755023-4.jpg', '2021-07-05 23:04:09', '2021-07-05 23:04:09'),
(106, 6041, '162551544917817755023-5.jpg', '2021-07-05 23:04:09', '2021-07-05 23:04:09'),
(107, 6042, '162551569317817731324-1.jpg', '2021-07-05 23:08:13', '2021-07-05 23:08:13'),
(108, 6042, '162551569317817731324-3.jpg', '2021-07-05 23:08:13', '2021-07-05 23:08:13'),
(109, 6043, '1625515823841351172943-1.jpg', '2021-07-05 23:10:23', '2021-07-05 23:10:23'),
(110, 6043, '1625515929841351172943-1.jpg', '2021-07-05 23:12:09', '2021-07-05 23:12:09'),
(111, 6043, '1625515951841351172943-1.jpg', '2021-07-05 23:12:31', '2021-07-05 23:12:31'),
(112, 6044, '1625516040841351156028.jpg', '2021-07-05 23:14:00', '2021-07-05 23:14:00'),
(113, 6045, '1625516109841351160193-1.jpg', '2021-07-05 23:15:09', '2021-07-05 23:15:09'),
(114, 6045, '1625516109841351160193-2.jpg', '2021-07-05 23:15:09', '2021-07-05 23:15:09'),
(115, 6045, '1625516173841351160193-1.jpg', '2021-07-05 23:16:14', '2021-07-05 23:16:14'),
(116, 6045, '1625516174841351160193-2.jpg', '2021-07-05 23:16:14', '2021-07-05 23:16:14'),
(117, 6047, '1625516496841351168731-1.jpg', '2021-07-05 23:21:36', '2021-07-05 23:21:36'),
(118, 6047, '1625516496841351168731-2.jpg', '2021-07-05 23:21:36', '2021-07-05 23:21:36'),
(119, 6047, '1625516509841351168731-1.jpg', '2021-07-05 23:21:49', '2021-07-05 23:21:49'),
(120, 6047, '1625516509841351168731-2.jpg', '2021-07-05 23:21:49', '2021-07-05 23:21:49'),
(121, 6047, '1625516544841351168731-1.jpg', '2021-07-05 23:22:24', '2021-07-05 23:22:24'),
(122, 6047, '1625516544841351168731-2.jpg', '2021-07-05 23:22:24', '2021-07-05 23:22:24'),
(123, 6048, '1625516604841351160315-1.jpg', '2021-07-05 23:23:24', '2021-07-05 23:23:24'),
(124, 6048, '1625516604841351160315-3.jpg', '2021-07-05 23:23:24', '2021-07-05 23:23:24'),
(125, 6048, '1625516662841351160315-1.jpg', '2021-07-05 23:24:22', '2021-07-05 23:24:22'),
(126, 6048, '1625516662841351160315-3.jpg', '2021-07-05 23:24:22', '2021-07-05 23:24:22'),
(127, 6052, '1625517173841351168779.jpg', '2021-07-05 23:32:53', '2021-07-05 23:32:53'),
(128, 6053, '1625517322841351168809-2.jpg', '2021-07-05 23:35:22', '2021-07-05 23:35:22'),
(129, 6053, '1625517338841351168809-2.jpg', '2021-07-05 23:35:38', '2021-07-05 23:35:38'),
(130, 6054, '1625517423841351168762-2.jpg', '2021-07-05 23:37:03', '2021-07-05 23:37:03'),
(131, 6055, '1625517501841351168786-2.jpg', '2021-07-05 23:38:21', '2021-07-05 23:38:21'),
(132, 6056, '1625517576841351168663-1.jpg', '2021-07-05 23:39:36', '2021-07-05 23:39:36'),
(133, 6056, '1625517576841351168663-2.jpg', '2021-07-05 23:39:36', '2021-07-05 23:39:36'),
(134, 6056, '1625517624841351168663-1.jpg', '2021-07-05 23:40:24', '2021-07-05 23:40:24'),
(135, 6056, '1625517624841351168663-2.jpg', '2021-07-05 23:40:24', '2021-07-05 23:40:24'),
(136, 6056, '1625517641841351168663-1.jpg', '2021-07-05 23:40:41', '2021-07-05 23:40:41'),
(137, 6056, '1625517641841351168663-2.jpg', '2021-07-05 23:40:41', '2021-07-05 23:40:41'),
(138, 6059, '1625517872841351160216.jpg', '2021-07-05 23:44:32', '2021-07-05 23:44:32'),
(139, 6059, '1625517910841351160216.jpg', '2021-07-05 23:45:10', '2021-07-05 23:45:10'),
(140, 6061, '1625518270841351160292-1.jpg', '2021-07-05 23:51:10', '2021-07-05 23:51:10'),
(141, 6062, '1625518448841351172936.jpg', '2021-07-05 23:54:08', '2021-07-05 23:54:08'),
(142, 6063, '1625518557841351160285-1.jpg', '2021-07-05 23:55:57', '2021-07-05 23:55:57'),
(143, 6069, '16255249737946044829173-1.jpg', '2021-07-06 01:42:53', '2021-07-06 01:42:53'),
(149, 6083, '1625529908848061041088-1.jpg', '2021-07-06 03:05:08', '2021-07-06 03:05:08'),
(150, 6084, '1625529948848061016826-1.jpg', '2021-07-06 03:05:48', '2021-07-06 03:05:48'),
(151, 6086, '1625530006848061038835 -1.jpg', '2021-07-06 03:06:46', '2021-07-06 03:06:46'),
(152, 6086, '1625530006848061038835-1.jpg', '2021-07-06 03:06:46', '2021-07-06 03:06:46'),
(153, 6087, '1625531647848061054620 - 3.jpg', '2021-07-06 03:34:07', '2021-07-06 03:34:07'),
(154, 6087, '1625531647848061054620 - 2.jpg', '2021-07-06 03:34:07', '2021-07-06 03:34:07'),
(155, 6088, '1625531729848061070156-1.jpg', '2021-07-06 03:35:29', '2021-07-06 03:35:29'),
(156, 6089, '1625531796848061010640-1.jpg', '2021-07-06 03:36:36', '2021-07-06 03:36:36'),
(157, 6091, '1625531990848061016864-1.jpg', '2021-07-06 03:39:50', '2021-07-06 03:39:50'),
(158, 6064, '1625578730841351168717.jpg', '2021-07-06 16:38:50', '2021-07-06 16:38:50'),
(159, 6065, '1625578901841351167741.jpg', '2021-07-06 16:41:41', '2021-07-06 16:41:41'),
(160, 6065, '1625578901841351167741-3.jpg', '2021-07-06 16:41:41', '2021-07-06 16:41:41'),
(161, 6066, '16255789662155387372849-1.jpg', '2021-07-06 16:42:46', '2021-07-06 16:42:46'),
(162, 6066, '16255789662155387372849-2.jpg', '2021-07-06 16:42:46', '2021-07-06 16:42:46'),
(163, 6067, '16255790262155387372849-1.jpg', '2021-07-06 16:43:46', '2021-07-06 16:43:46'),
(164, 6067, '16255790262155387372849-2.jpg', '2021-07-06 16:43:46', '2021-07-06 16:43:46'),
(165, 6068, '1625579285811013032786-1.jpg', '2021-07-06 16:48:05', '2021-07-06 16:48:05'),
(166, 6068, '1625579285811013032786-2.jpg', '2021-07-06 16:48:05', '2021-07-06 16:48:05'),
(167, 6068, '1625579285811013032786-3.jpg', '2021-07-06 16:48:05', '2021-07-06 16:48:05'),
(168, 6070, '16255829906297000886725-1.jpg', '2021-07-06 17:49:51', '2021-07-06 17:49:51'),
(169, 6070, '16255829916297000886725-2.jpg', '2021-07-06 17:49:51', '2021-07-06 17:49:51'),
(170, 6070, '16255829916297000886725-3.jpg', '2021-07-06 17:49:51', '2021-07-06 17:49:51'),
(171, 6070, '16255829916297000886725-4.jpg', '2021-07-06 17:49:51', '2021-07-06 17:49:51'),
(172, 6070, '16255829916297000886725-5.jpg', '2021-07-06 17:49:51', '2021-07-06 17:49:51'),
(173, 6070, '16255829916297000886725-6.jpg', '2021-07-06 17:49:51', '2021-07-06 17:49:51'),
(174, 6070, '16255829916297000886725-7.jpg', '2021-07-06 17:49:51', '2021-07-06 17:49:51'),
(175, 6070, '16255829916297000886725-8.jpg', '2021-07-06 17:49:51', '2021-07-06 17:49:51'),
(176, 6075, '1625585340745760770519.jpg', '2021-07-06 18:29:00', '2021-07-06 18:29:00'),
(178, 6075, '1625585673745760770519-1.jpg', '2021-07-06 18:34:33', '2021-07-06 18:34:33'),
(179, 6076, '1625586544745760770540.jpg', '2021-07-06 18:49:04', '2021-07-06 18:49:04'),
(180, 6076, '1625586544745760770540-1.jpg', '2021-07-06 18:49:04', '2021-07-06 18:49:04'),
(181, 6077, '1625587156745760770526.jpg', '2021-07-06 18:59:16', '2021-07-06 18:59:16'),
(182, 6077, '1625587156745760770526-1.jpg', '2021-07-06 18:59:16', '2021-07-06 18:59:16'),
(183, 6077, '1625587263745760770526.jpg', '2021-07-06 19:01:03', '2021-07-06 19:01:03'),
(184, 6077, '1625587263745760770526-1.jpg', '2021-07-06 19:01:03', '2021-07-06 19:01:03'),
(185, 6078, '1625587839745760770533.jpg', '2021-07-06 19:10:39', '2021-07-06 19:10:39'),
(186, 6078, '1625587862745760770533.jpg', '2021-07-06 19:11:02', '2021-07-06 19:11:02'),
(187, 6078, '1625587924745760770533.jpg', '2021-07-06 19:12:04', '2021-07-06 19:12:04'),
(188, 6080, '1625590285matt-01.jpg', '2021-07-06 19:51:26', '2021-07-06 19:51:26'),
(189, 6080, '1625590286Matt02-01.jpg', '2021-07-06 19:51:26', '2021-07-06 19:51:26'),
(190, 6080, '1625590306850005443575-01.jpg', '2021-07-06 19:51:46', '2021-07-06 19:51:46'),
(191, 6082, NULL, '2021-07-06 20:17:06', '2021-07-06 20:17:06'),
(192, 6082, NULL, '2021-07-06 20:17:06', '2021-07-06 20:17:06'),
(193, 6082, NULL, '2021-07-06 20:17:53', '2021-07-06 20:17:53'),
(194, 6082, NULL, '2021-07-06 20:17:53', '2021-07-06 20:17:53'),
(195, 6081, '1625592765L MATT-04.png', '2021-07-06 20:32:45', '2021-07-06 20:32:45'),
(197, 6081, '1625593014L MATT-5-04-04.png', '2021-07-06 20:36:54', '2021-07-06 20:36:54'),
(198, 6085, '1625596602848061041460-01.jpg', '2021-07-06 21:36:43', '2021-07-06 21:36:43'),
(199, 6085, '1625596603848061041460-02.jpg', '2021-07-06 21:36:43', '2021-07-06 21:36:43'),
(200, 6085, '1625596603848061041460-03.jpg', '2021-07-06 21:36:43', '2021-07-06 21:36:43'),
(201, 6085, '1625596882848061041460-01.jpg', '2021-07-06 21:41:22', '2021-07-06 21:41:22'),
(202, 6085, '1625596882848061041460-02.jpg', '2021-07-06 21:41:22', '2021-07-06 21:41:22'),
(203, 6085, '1625596882848061041460-03.jpg', '2021-07-06 21:41:22', '2021-07-06 21:41:22'),
(204, 6090, '1625598425848061038712-1.jpg', '2021-07-06 22:07:05', '2021-07-06 22:07:05'),
(205, 6092, '1625599086848061043150-1.jpg', '2021-07-06 22:18:06', '2021-07-06 22:18:06'),
(206, 6092, '1625599167848061043150-1.jpg', '2021-07-06 22:19:27', '2021-07-06 22:19:27'),
(208, 6094, '1625601179855202100101-3.jpg', '2021-07-06 22:53:00', '2021-07-06 22:53:00'),
(209, 6094, '1625602039855202100101-2-04-01.jpg', '2021-07-06 23:07:19', '2021-07-06 23:07:19'),
(210, 6094, '1625603307PHOTO-2021-05-11-02-09-00.jpg', '2021-07-06 23:28:27', '2021-07-06 23:28:27'),
(212, 6095, '1625603429PHOTO-2021-05-11-02-09-00.jpg', '2021-07-06 23:30:29', '2021-07-06 23:30:29'),
(214, 6095, '1625603488855202100101-1-01.jpg', '2021-07-06 23:31:29', '2021-07-06 23:31:29'),
(215, 6095, '1625603510855202100101-3.jpg', '2021-07-06 23:31:50', '2021-07-06 23:31:50'),
(216, 6096, '1625603770855202100101-2-04-01.jpg', '2021-07-06 23:36:10', '2021-07-06 23:36:10'),
(217, 6096, '1625603770855202100101-3.jpg', '2021-07-06 23:36:10', '2021-07-06 23:36:10'),
(220, 6096, '1625603929PHOTO-2021-05-11-02-09-00.jpg', '2021-07-06 23:38:49', '2021-07-06 23:38:49'),
(221, 6096, '1625603933PHOTO-2021-05-11-02-09-00.jpg', '2021-07-06 23:38:53', '2021-07-06 23:38:53'),
(222, 6003, '1625671891857325008231-01-01.jpg', '2021-07-07 18:31:31', '2021-07-07 18:31:31'),
(223, 6097, '1625674603855202100101-2-04-01.jpg', '2021-07-07 19:16:43', '2021-07-07 19:16:43'),
(224, 6097, '1625674603855202100101-3.jpg', '2021-07-07 19:16:43', '2021-07-07 19:16:43'),
(225, 6097, '1625674707PHOTO-2021-05-11-02-09-00.jpg', '2021-07-07 19:18:27', '2021-07-07 19:18:27'),
(228, 6098, '1625674939855202100101-1-01.jpg', '2021-07-07 19:22:19', '2021-07-07 19:22:19'),
(229, 6098, '1625674978PHOTO-2021-05-11-02-09-00.jpg', '2021-07-07 19:22:58', '2021-07-07 19:22:58'),
(230, 6098, '1625674978PHOTO-2021-05-11-02-08-59 (1).jpg', '2021-07-07 19:22:58', '2021-07-07 19:22:58'),
(232, 6112, '1625679438D6470448-4978-4A75-9497-53A5C4976E85.jpeg', '2021-07-07 20:37:18', '2021-07-07 20:37:18'),
(233, 6112, '16256794384067566B-F7A5-4C02-815A-9848E07233DF.jpeg', '2021-07-07 20:37:18', '2021-07-07 20:37:18'),
(234, 6113, '16256794819C2BB1FF-C98D-4558-9E78-D4460898349F.jpeg', '2021-07-07 20:38:01', '2021-07-07 20:38:01'),
(235, 6113, '1625679481B7DDFBB8-7808-4054-B35B-0201F4D8A4A2.jpeg', '2021-07-07 20:38:01', '2021-07-07 20:38:01'),
(236, 6114, '1625679525AAFA088F-5D29-44E0-BE2D-8CEA80201CC3.jpeg', '2021-07-07 20:38:45', '2021-07-07 20:38:45'),
(237, 6114, '16256795257AEB54EA-9558-465C-BCBF-541337176E6C.jpeg', '2021-07-07 20:38:45', '2021-07-07 20:38:45'),
(238, 6115, '1625679591E44E4C64-D9B2-4588-9600-F49C92B59217.jpeg', '2021-07-07 20:39:51', '2021-07-07 20:39:51'),
(239, 6116, '16256796409C2C2822-1E59-4C57-9C99-DCAC54DF08E2.jpeg', '2021-07-07 20:40:40', '2021-07-07 20:40:40'),
(240, 6117, '162567968662100C3B-1B7A-4CF3-8442-D0E23088BCB0.jpeg', '2021-07-07 20:41:26', '2021-07-07 20:41:26'),
(241, 6122, '16256798482AC43567-C54C-4007-BC1C-339784BBC980.jpeg', '2021-07-07 20:44:08', '2021-07-07 20:44:08'),
(242, 6123, '16256798887CFFCCE5-CF83-4F0A-9BDB-D16DE918AF4C.jpeg', '2021-07-07 20:44:48', '2021-07-07 20:44:48'),
(243, 6134, '1625680865308DE51C-7F0F-40F1-8A28-23DD3FDA7CF9.jpeg', '2021-07-07 21:01:05', '2021-07-07 21:01:05'),
(244, 6135, '162568091279ADF8F0-6670-4A13-8B44-9F14211B6734.jpeg', '2021-07-07 21:01:52', '2021-07-07 21:01:52'),
(245, 6136, '1625680971F82C1E5E-5FEF-4461-9F0F-6169280D71A6.jpeg', '2021-07-07 21:02:51', '2021-07-07 21:02:51'),
(247, 6093, '1625681113850017782303.png', '2021-07-07 21:05:13', '2021-07-07 21:05:13'),
(248, 6093, '1625681113850017782303-01.jpg', '2021-07-07 21:05:13', '2021-07-07 21:05:13'),
(249, 6099, '1625681289855202100101-1-01.jpg', '2021-07-07 21:08:09', '2021-07-07 21:08:09'),
(250, 6099, '1625681311PHOTO-2021-05-11-02-08-59 (1).jpg', '2021-07-07 21:08:31', '2021-07-07 21:08:31'),
(252, 6100, '1625681419855202100101-1-01.jpg', '2021-07-07 21:10:19', '2021-07-07 21:10:19'),
(253, 6100, '1625681430PHOTO-2021-05-11-02-08-59 (1).jpg', '2021-07-07 21:10:30', '2021-07-07 21:10:30'),
(256, 6101, '1625681984855202100101-1-01.jpg', '2021-07-07 21:19:44', '2021-07-07 21:19:44'),
(258, 6101, '1625682015PHOTO-2021-05-11-02-08-59 (1).jpg', '2021-07-07 21:20:15', '2021-07-07 21:20:15'),
(259, 6106, '16256833956083749655698-1.jpg', '2021-07-07 21:43:15', '2021-07-07 21:43:15'),
(260, 6106, '16256834246083749655698-1.jpg', '2021-07-07 21:43:44', '2021-07-07 21:43:44'),
(261, 6107, '16256837166083749655070-1.jpg', '2021-07-07 21:48:36', '2021-07-07 21:48:36'),
(262, 6108, '16256840026083749655384.jpg', '2021-07-07 21:53:22', '2021-07-07 21:53:22'),
(263, 6109, '16256843526083749655766-1.jpg', '2021-07-07 21:59:12', '2021-07-07 21:59:12'),
(264, 6110, '16256845146083749655834.jpg', '2021-07-07 22:01:54', '2021-07-07 22:01:54'),
(265, 6110, '16256845226083749655834.jpg', '2021-07-07 22:02:02', '2021-07-07 22:02:02'),
(266, 6111, '16256852272.jpg', '2021-07-07 22:13:47', '2021-07-07 22:13:47'),
(267, 6111, '16256852273.jpg', '2021-07-07 22:13:47', '2021-07-07 22:13:47'),
(268, 6111, '16256852274.jpg', '2021-07-07 22:13:47', '2021-07-07 22:13:47'),
(269, 6111, '16256852275.jpg', '2021-07-07 22:13:47', '2021-07-07 22:13:47'),
(270, 6111, '16256852422.jpg', '2021-07-07 22:14:02', '2021-07-07 22:14:02'),
(271, 6111, '16256852423.jpg', '2021-07-07 22:14:02', '2021-07-07 22:14:02'),
(272, 6111, '16256852424.jpg', '2021-07-07 22:14:02', '2021-07-07 22:14:02'),
(273, 6111, '16256852425.jpg', '2021-07-07 22:14:02', '2021-07-07 22:14:02'),
(274, 6115, '16256875646972103463294 -2.jpg', '2021-07-07 22:52:44', '2021-07-07 22:52:44'),
(275, 6141, '16256933216B52FDEC-11E3-4859-A703-FED1D3683C9B.jpeg', '2021-07-08 00:28:41', '2021-07-08 00:28:41'),
(276, 6142, '1625693383510EF1FE-CDB0-42AB-93A1-0003104BB9D8.jpeg', '2021-07-08 00:29:43', '2021-07-08 00:29:43'),
(277, 6144, '1625693486599ED029-04BA-40C6-A975-17FECE2A5C69.jpeg', '2021-07-08 00:31:26', '2021-07-08 00:31:26'),
(278, 6147, '16256936188FBA7BFB-22E0-44A8-B5F0-13B8B014DAAF.jpeg', '2021-07-08 00:33:38', '2021-07-08 00:33:38'),
(279, 6147, '1625693618BEE1ACDC-C221-45A1-A85F-68D4235B5E40.jpeg', '2021-07-08 00:33:38', '2021-07-08 00:33:38'),
(280, 6147, '1625693618B65D9FB4-91EE-4EF5-ABDA-33B62C53E515.jpeg', '2021-07-08 00:33:38', '2021-07-08 00:33:38'),
(281, 6147, '1625693618DECF36F7-32DE-4C6E-881F-349BAB89A362.jpeg', '2021-07-08 00:33:38', '2021-07-08 00:33:38'),
(282, 6148, '1625693681190CC7BA-18B4-463A-95FC-3D3FBC67752B.jpeg', '2021-07-08 00:34:41', '2021-07-08 00:34:41'),
(283, 6149, '16256937477627C69E-5939-40BB-A772-667E398C962E.jpeg', '2021-07-08 00:35:47', '2021-07-08 00:35:47'),
(284, 6149, '1625693747ED7CA219-7ECC-4D51-9655-23A8468FB6F1.jpeg', '2021-07-08 00:35:47', '2021-07-08 00:35:47'),
(285, 6150, '1625693830B299A202-4278-4F48-9B34-9B726364E8F9.jpeg', '2021-07-08 00:37:10', '2021-07-08 00:37:10'),
(286, 6150, '1625693830260BB621-DD3C-4763-8953-0AD5E9D22CE6.jpeg', '2021-07-08 00:37:10', '2021-07-08 00:37:10'),
(287, 6151, '1625693847A6F50238-9EA9-4632-83DA-33FE6DDC75DF.jpeg', '2021-07-08 00:37:27', '2021-07-08 00:37:27'),
(288, 6151, '1625693847CDAE37A7-A1C8-4DC2-9FA8-2F112730B769.jpeg', '2021-07-08 00:37:27', '2021-07-08 00:37:27'),
(289, 6151, '16256938477264EBEB-E8D4-4A77-BAB9-370FC4BE1284.jpeg', '2021-07-08 00:37:27', '2021-07-08 00:37:27'),
(290, 6152, '1625693900201A7DEA-2328-4D4A-BE54-754506D9D344.jpeg', '2021-07-08 00:38:20', '2021-07-08 00:38:20'),
(291, 6152, '16256939005C129595-C1BC-4898-92A6-CBC931A423D5.jpeg', '2021-07-08 00:38:20', '2021-07-08 00:38:20'),
(292, 6153, '1625693956AFD32046-746C-4D36-BA50-5A73D7E1A171.jpeg', '2021-07-08 00:39:16', '2021-07-08 00:39:16'),
(293, 6153, '162569395695658942-45AF-4518-8EB1-CF3914B6FB58.jpeg', '2021-07-08 00:39:16', '2021-07-08 00:39:16'),
(294, 6153, '1625693956C9579FC9-B19D-46E7-B0C8-C9EBA92A7AB7.jpeg', '2021-07-08 00:39:16', '2021-07-08 00:39:16'),
(295, 6154, '1625694064399BEE24-43E8-4B21-AF44-949A70E3718D.jpeg', '2021-07-08 00:41:04', '2021-07-08 00:41:04'),
(296, 6154, '16256940641AB50B11-1643-4FF4-9EC2-D5C84F62DC62.jpeg', '2021-07-08 00:41:04', '2021-07-08 00:41:04'),
(297, 6154, '162569406436EB8209-409A-4631-98D6-816608A00952.jpeg', '2021-07-08 00:41:04', '2021-07-08 00:41:04'),
(302, 6019, '16256989052.jpg', '2021-07-08 02:01:45', '2021-07-08 02:01:45'),
(304, 6157, '16256993165.jpg', '2021-07-08 02:08:36', '2021-07-08 02:08:36'),
(305, 6157, '1625699316image_template_500x500_px_-_2021-06-22t121825.216.jpg', '2021-07-08 02:08:36', '2021-07-08 02:08:36'),
(306, 6157, '16256993162.jpg', '2021-07-08 02:08:36', '2021-07-08 02:08:36'),
(307, 6157, '16256993164.jpg', '2021-07-08 02:08:36', '2021-07-08 02:08:36'),
(337, 6143, '1625700731909F149F-168D-4F96-A1FF-5C9BDFA8E65B.jpeg', '2021-07-08 02:32:11', '2021-07-08 02:32:11'),
(338, 6146, '16257008269A0DC394-5F3C-4E14-A030-E0A59EABC461.jpeg', '2021-07-08 02:33:46', '2021-07-08 02:33:46'),
(339, 6135, '16257557056297000886770-1.jpg', '2021-07-08 17:48:25', '2021-07-08 17:48:25'),
(340, 6135, '16257557356297000886770-1.jpg', '2021-07-08 17:48:55', '2021-07-08 17:48:55'),
(341, 6136, '16257557916297000886770-1.jpg', '2021-07-08 17:49:51', '2021-07-08 17:49:51'),
(343, 6138, '162575629816255120346297000886244-2.jpg', '2021-07-08 17:58:18', '2021-07-08 17:58:18'),
(344, 6138, '162575635816255120346297000886244-2.jpg', '2021-07-08 17:59:18', '2021-07-08 17:59:18'),
(345, 6139, '16257580346083749655902 - 1.jpg', '2021-07-08 18:27:14', '2021-07-08 18:27:14'),
(346, 6140, '16257588546083749655452-1.jpg', '2021-07-08 18:40:54', '2021-07-08 18:40:54'),
(347, 6155, '16257613946925281979293 - 1.jpg', '2021-07-08 19:23:14', '2021-07-08 19:23:14'),
(348, 6155, '16257613946925281979293 - 2.jpg', '2021-07-08 19:23:14', '2021-07-08 19:23:14'),
(349, 6155, '16257613946925281979293 - 3.jpg', '2021-07-08 19:23:14', '2021-07-08 19:23:14'),
(350, 6155, '16257613946925281979293 - 4.jpg', '2021-07-08 19:23:14', '2021-07-08 19:23:14'),
(351, 6155, '16257613946925281979293.jpg', '2021-07-08 19:23:14', '2021-07-08 19:23:14'),
(352, 6155, '16257681926925281979293 - 1.jpg', '2021-07-08 21:16:32', '2021-07-08 21:16:32'),
(353, 6155, '16257681926925281979293 - 2.jpg', '2021-07-08 21:16:32', '2021-07-08 21:16:32'),
(354, 6155, '16257681926925281979293 - 3.jpg', '2021-07-08 21:16:32', '2021-07-08 21:16:32'),
(355, 6155, '16257681926925281979293 - 4.jpg', '2021-07-08 21:16:32', '2021-07-08 21:16:32'),
(356, 6155, '16257681926925281979293.jpg', '2021-07-08 21:16:32', '2021-07-08 21:16:32'),
(357, 6094, '1625771516يسي.jpg', '2021-07-08 22:11:56', '2021-07-08 22:11:56'),
(358, 6095, '1625771565يسي.jpg', '2021-07-08 22:12:45', '2021-07-08 22:12:45'),
(359, 6096, '1625771605يسي.jpg', '2021-07-08 22:13:25', '2021-07-08 22:13:25'),
(360, 6097, '1625771646يسي.jpg', '2021-07-08 22:14:06', '2021-07-08 22:14:06'),
(361, 6098, '1625771683يسي.jpg', '2021-07-08 22:14:43', '2021-07-08 22:14:43'),
(362, 6099, '1625772061يسي.jpg', '2021-07-08 22:21:01', '2021-07-08 22:21:01'),
(363, 6099, '1625772084يسي.jpg', '2021-07-08 22:21:24', '2021-07-08 22:21:24'),
(364, 6100, '1625772126يسي.jpg', '2021-07-08 22:22:07', '2021-07-08 22:22:07'),
(365, 6101, '1625772175يسي.jpg', '2021-07-08 22:22:55', '2021-07-08 22:22:55'),
(366, 6168, '1625772986855202100115-1.jpg', '2021-07-08 22:36:26', '2021-07-08 22:36:26'),
(367, 6168, '1625772986855202100115-2.jpg', '2021-07-08 22:36:26', '2021-07-08 22:36:26'),
(368, 6168, '1625772986855202100115-3.jpg', '2021-07-08 22:36:26', '2021-07-08 22:36:26'),
(369, 6168, '1625773229855202100115-4.jpg', '2021-07-08 22:40:29', '2021-07-08 22:40:29'),
(370, 6168, '1625773847855202100115-5.jpg', '2021-07-08 22:50:47', '2021-07-08 22:50:47'),
(371, 6157, '16257776186925281979293-11.jpg', '2021-07-08 23:53:38', '2021-07-08 23:53:38'),
(372, 6157, '16257776186925281979293-12.jpg', '2021-07-08 23:53:38', '2021-07-08 23:53:38'),
(373, 6157, '16257776186925281979293-13.jpg', '2021-07-08 23:53:38', '2021-07-08 23:53:38'),
(374, 6157, '16257776186925281979293-14.jpg', '2021-07-08 23:53:38', '2021-07-08 23:53:38'),
(375, 6158, '16260115666925281979354-1.jpg', '2021-07-11 16:52:46', '2021-07-11 16:52:46'),
(376, 6158, '16260115666925281979354-2.jpg', '2021-07-11 16:52:46', '2021-07-11 16:52:46'),
(377, 6158, '16260115666925281979354-3.jpg', '2021-07-11 16:52:46', '2021-07-11 16:52:46'),
(378, 6158, '16260116306925281979354-1.jpg', '2021-07-11 16:53:50', '2021-07-11 16:53:50'),
(379, 6158, '16260116306925281979354-2.jpg', '2021-07-11 16:53:50', '2021-07-11 16:53:50'),
(380, 6158, '16260116306925281979354-3.jpg', '2021-07-11 16:53:50', '2021-07-11 16:53:50'),
(381, 6158, '16260116736925281979293-11.jpg', '2021-07-11 16:54:33', '2021-07-11 16:54:33'),
(382, 6158, '16260116736925281979293-12.jpg', '2021-07-11 16:54:33', '2021-07-11 16:54:33'),
(383, 6158, '16260116736925281979293-13.jpg', '2021-07-11 16:54:33', '2021-07-11 16:54:33'),
(384, 6158, '16260116736925281979293-14.jpg', '2021-07-11 16:54:33', '2021-07-11 16:54:33'),
(385, 6159, '16260121006925281979309-1.jpg', '2021-07-11 17:01:40', '2021-07-11 17:01:40'),
(386, 6159, '16260121006925281979309-2.jpg', '2021-07-11 17:01:40', '2021-07-11 17:01:40'),
(387, 6159, '16260121006925281979309-3.jpg', '2021-07-11 17:01:40', '2021-07-11 17:01:40'),
(388, 6159, '16260121376925281979293-11.jpg', '2021-07-11 17:02:17', '2021-07-11 17:02:17'),
(389, 6159, '16260121376925281979293-12.jpg', '2021-07-11 17:02:17', '2021-07-11 17:02:17'),
(390, 6159, '16260121376925281979293-13.jpg', '2021-07-11 17:02:17', '2021-07-11 17:02:17'),
(391, 6159, '16260121376925281979293-14.jpg', '2021-07-11 17:02:17', '2021-07-11 17:02:17'),
(392, 6160, '16260124816925281979316-1.jpg', '2021-07-11 17:08:01', '2021-07-11 17:08:01'),
(393, 6160, '16260124816925281979316-2.jpg', '2021-07-11 17:08:01', '2021-07-11 17:08:01'),
(394, 6160, '16260124816925281979316-3.jpg', '2021-07-11 17:08:01', '2021-07-11 17:08:01'),
(395, 6160, '16260128596925281979293-11.jpg', '2021-07-11 17:14:20', '2021-07-11 17:14:20'),
(396, 6160, '16260128596925281979293-12.jpg', '2021-07-11 17:14:20', '2021-07-11 17:14:20'),
(397, 6160, '16260128606925281979293-13.jpg', '2021-07-11 17:14:20', '2021-07-11 17:14:20'),
(398, 6160, '16260128606925281979293-14.jpg', '2021-07-11 17:14:20', '2021-07-11 17:14:20'),
(399, 6160, '16260130126925281979293-11.jpg', '2021-07-11 17:16:52', '2021-07-11 17:16:52'),
(400, 6160, '16260130126925281979293-12.jpg', '2021-07-11 17:16:52', '2021-07-11 17:16:52'),
(401, 6160, '16260130126925281979293-13.jpg', '2021-07-11 17:16:52', '2021-07-11 17:16:52'),
(402, 6160, '16260130126925281979293-14.jpg', '2021-07-11 17:16:52', '2021-07-11 17:16:52'),
(403, 6161, '16260134176925281979392-1.jpg', '2021-07-11 17:23:37', '2021-07-11 17:23:37'),
(404, 6161, '16260134176925281979392-2.jpg', '2021-07-11 17:23:37', '2021-07-11 17:23:37'),
(405, 6161, '16260134176925281979392-3.jpg', '2021-07-11 17:23:37', '2021-07-11 17:23:37'),
(406, 6161, '16260134176925281979392-4.jpg', '2021-07-11 17:23:37', '2021-07-11 17:23:37'),
(407, 6161, '16260134656925281979293-11.jpg', '2021-07-11 17:24:26', '2021-07-11 17:24:26'),
(408, 6161, '16260134656925281979293-12.jpg', '2021-07-11 17:24:26', '2021-07-11 17:24:26'),
(409, 6161, '16260134656925281979293-13.jpg', '2021-07-11 17:24:26', '2021-07-11 17:24:26'),
(410, 6161, '16260134666925281979293-14.jpg', '2021-07-11 17:24:26', '2021-07-11 17:24:26'),
(411, 6162, '16260148046925281979378-1.jpg', '2021-07-11 17:46:44', '2021-07-11 17:46:44'),
(412, 6162, '16260148046925281979378-2.jpg', '2021-07-11 17:46:44', '2021-07-11 17:46:44'),
(413, 6162, '16260148046925281979378-3.jpg', '2021-07-11 17:46:44', '2021-07-11 17:46:44'),
(414, 6162, '16260148636925281979378-1.jpg', '2021-07-11 17:47:43', '2021-07-11 17:47:43'),
(415, 6162, '16260148636925281979378-2.jpg', '2021-07-11 17:47:43', '2021-07-11 17:47:43'),
(416, 6162, '16260148636925281979378-3.jpg', '2021-07-11 17:47:43', '2021-07-11 17:47:43'),
(417, 6162, '16260149046925281979293-11.jpg', '2021-07-11 17:48:24', '2021-07-11 17:48:24'),
(418, 6162, '16260149046925281979293-12.jpg', '2021-07-11 17:48:24', '2021-07-11 17:48:24'),
(419, 6162, '16260149046925281979293-13.jpg', '2021-07-11 17:48:24', '2021-07-11 17:48:24'),
(420, 6162, '16260149046925281979293-14.jpg', '2021-07-11 17:48:24', '2021-07-11 17:48:24'),
(421, 6163, '16260152346925281979286-1.jpg', '2021-07-11 17:53:54', '2021-07-11 17:53:54'),
(422, 6163, '16260152346925281979286-2.jpg', '2021-07-11 17:53:54', '2021-07-11 17:53:54'),
(423, 6163, '16260152346925281979286-3.jpg', '2021-07-11 17:53:54', '2021-07-11 17:53:54'),
(424, 6163, '16260153476925281979293-11.jpg', '2021-07-11 17:55:47', '2021-07-11 17:55:47'),
(425, 6163, '16260153476925281979293-12.jpg', '2021-07-11 17:55:47', '2021-07-11 17:55:47'),
(426, 6163, '16260153476925281979293-13.jpg', '2021-07-11 17:55:47', '2021-07-11 17:55:47'),
(427, 6163, '16260153476925281979293-14.jpg', '2021-07-11 17:55:47', '2021-07-11 17:55:47'),
(428, 6164, '16260156941234567-1.jpg', '2021-07-11 18:01:35', '2021-07-11 18:01:35'),
(429, 6164, '16260156951234567-2.jpg', '2021-07-11 18:01:35', '2021-07-11 18:01:35'),
(430, 6165, '162602238212.jpg', '2021-07-11 19:53:02', '2021-07-11 19:53:02'),
(431, 6165, '16260224691.jpg', '2021-07-11 19:54:29', '2021-07-11 19:54:29'),
(432, 6165, '16260224692.jpg', '2021-07-11 19:54:29', '2021-07-11 19:54:29'),
(433, 6165, '16260224693.jpg', '2021-07-11 19:54:29', '2021-07-11 19:54:29'),
(434, 6165, '16260224694.jpg', '2021-07-11 19:54:29', '2021-07-11 19:54:29'),
(435, 6165, '16260224695.jpg', '2021-07-11 19:54:29', '2021-07-11 19:54:29'),
(436, 6165, '16260224696.jpg', '2021-07-11 19:54:29', '2021-07-11 19:54:29'),
(437, 6165, '16260224697.jpg', '2021-07-11 19:54:29', '2021-07-11 19:54:29'),
(438, 6165, NULL, '2021-07-11 19:54:29', '2021-07-11 19:54:29'),
(439, 6166, '162602253613.jpg', '2021-07-11 19:55:36', '2021-07-11 19:55:36'),
(440, 6166, '16260225771.jpg', '2021-07-11 19:56:17', '2021-07-11 19:56:17'),
(441, 6166, '16260225772.jpg', '2021-07-11 19:56:17', '2021-07-11 19:56:17'),
(442, 6166, '16260225773.jpg', '2021-07-11 19:56:17', '2021-07-11 19:56:17'),
(443, 6166, '16260225774.jpg', '2021-07-11 19:56:17', '2021-07-11 19:56:17'),
(444, 6166, '16260225775.jpg', '2021-07-11 19:56:17', '2021-07-11 19:56:17'),
(445, 6166, '16260225776.jpg', '2021-07-11 19:56:17', '2021-07-11 19:56:17'),
(446, 6166, '16260225777.jpg', '2021-07-11 19:56:17', '2021-07-11 19:56:17'),
(447, 6166, NULL, '2021-07-11 19:56:17', '2021-07-11 19:56:17'),
(448, 6166, NULL, '2021-07-11 19:56:51', '2021-07-11 19:56:51'),
(458, 6103, '16260228559.jpg', '2021-07-11 20:00:55', '2021-07-11 20:00:55'),
(459, 6103, '16260228971.jpg', '2021-07-11 20:01:38', '2021-07-11 20:01:38'),
(460, 6103, '16260228972.jpg', '2021-07-11 20:01:38', '2021-07-11 20:01:38'),
(461, 6103, '16260228973.jpg', '2021-07-11 20:01:38', '2021-07-11 20:01:38'),
(462, 6103, '16260228984.jpg', '2021-07-11 20:01:38', '2021-07-11 20:01:38'),
(463, 6103, '16260228985.jpg', '2021-07-11 20:01:38', '2021-07-11 20:01:38'),
(464, 6103, '16260228986.jpg', '2021-07-11 20:01:38', '2021-07-11 20:01:38'),
(465, 6103, '16260228987.jpg', '2021-07-11 20:01:38', '2021-07-11 20:01:38'),
(466, 6103, NULL, '2021-07-11 20:01:38', '2021-07-11 20:01:38'),
(467, 6104, '162602296410.jpg', '2021-07-11 20:02:44', '2021-07-11 20:02:44'),
(468, 6104, '16260230061.jpg', '2021-07-11 20:03:26', '2021-07-11 20:03:26'),
(469, 6104, '16260230062.jpg', '2021-07-11 20:03:26', '2021-07-11 20:03:26'),
(470, 6104, '16260230063.jpg', '2021-07-11 20:03:26', '2021-07-11 20:03:26'),
(471, 6104, '16260230064.jpg', '2021-07-11 20:03:26', '2021-07-11 20:03:26'),
(472, 6104, '16260230065.jpg', '2021-07-11 20:03:26', '2021-07-11 20:03:26'),
(473, 6104, '16260230066.jpg', '2021-07-11 20:03:26', '2021-07-11 20:03:26'),
(474, 6104, '16260230067.jpg', '2021-07-11 20:03:26', '2021-07-11 20:03:26'),
(475, 6104, NULL, '2021-07-11 20:03:26', '2021-07-11 20:03:26'),
(476, 6105, '162602305711.jpg', '2021-07-11 20:04:17', '2021-07-11 20:04:17'),
(477, 6105, '16260231011.jpg', '2021-07-11 20:05:01', '2021-07-11 20:05:01'),
(478, 6105, '16260231012.jpg', '2021-07-11 20:05:01', '2021-07-11 20:05:01'),
(479, 6105, '16260231013.jpg', '2021-07-11 20:05:01', '2021-07-11 20:05:01'),
(480, 6105, '16260231014.jpg', '2021-07-11 20:05:01', '2021-07-11 20:05:01'),
(481, 6105, '16260231015.jpg', '2021-07-11 20:05:01', '2021-07-11 20:05:01'),
(482, 6105, '16260231016.jpg', '2021-07-11 20:05:01', '2021-07-11 20:05:01'),
(483, 6105, '16260231017.jpg', '2021-07-11 20:05:01', '2021-07-11 20:05:01'),
(484, 6105, NULL, '2021-07-11 20:05:01', '2021-07-11 20:05:01'),
(485, 6167, '162611697214.jpg', '2021-07-12 22:09:32', '2021-07-12 22:09:32'),
(486, 6167, '16261172121.jpg', '2021-07-12 22:13:32', '2021-07-12 22:13:32'),
(487, 6167, '16261172122.jpg', '2021-07-12 22:13:32', '2021-07-12 22:13:32'),
(488, 6167, '16261172123.jpg', '2021-07-12 22:13:32', '2021-07-12 22:13:32'),
(489, 6167, '16261172124.jpg', '2021-07-12 22:13:32', '2021-07-12 22:13:32'),
(490, 6167, '16261172125.jpg', '2021-07-12 22:13:32', '2021-07-12 22:13:32'),
(491, 6167, '16261172126.jpg', '2021-07-12 22:13:32', '2021-07-12 22:13:32'),
(492, 6167, '16261172127.jpg', '2021-07-12 22:13:32', '2021-07-12 22:13:32'),
(493, 6167, NULL, '2021-07-12 22:13:32', '2021-07-12 22:13:32'),
(494, 5711, '16293079170123.jpg', '2021-08-18 18:31:58', '2021-08-18 18:31:58'),
(495, 5711, '16293079342.jpg', '2021-08-18 18:32:16', '2021-08-18 18:32:16'),
(496, 5711, '16293079353.jpg', '2021-08-18 18:32:16', '2021-08-18 18:32:16'),
(497, 5711, '16293079354.jpg', '2021-08-18 18:32:16', '2021-08-18 18:32:16'),
(498, 5711, '16293079842.jpg', '2021-08-18 18:33:06', '2021-08-18 18:33:06'),
(499, 5711, '16293079853.jpg', '2021-08-18 18:33:06', '2021-08-18 18:33:06'),
(500, 5711, '16293079854.jpg', '2021-08-18 18:33:06', '2021-08-18 18:33:06'),
(501, 5711, '16293080372.jpg', '2021-08-18 18:33:59', '2021-08-18 18:33:59'),
(502, 5711, '16293080383.jpg', '2021-08-18 18:33:59', '2021-08-18 18:33:59'),
(503, 5711, '16293080394.jpg', '2021-08-18 18:34:00', '2021-08-18 18:34:00'),
(510, 6185, '1629731532iphone-12-blue-select-2020_1_1.png', '2021-08-23 16:12:12', '2021-08-23 16:12:12'),
(511, 6185, '1629731532bV2hddt1W4IQZ5Qjk8wL7bvRzoZtZqnFrGlWc6lW.png', '2021-08-23 16:12:12', '2021-08-23 16:12:12'),
(512, 6185, '1629731532iPhone-12-mini.jpg', '2021-08-23 16:12:12', '2021-08-23 16:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE `product_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_option_values`
--

CREATE TABLE `product_option_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `option_value_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_shown` tinyint(1) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `seen_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `product_id`, `name`, `review`, `stars`, `created_at`, `updated_at`, `is_shown`, `user_id`, `seen_at`) VALUES
(1, 6185, 'ششش ششش سسس', 'لللللللللللللللل', '100', '2021-09-29 16:47:12', '2021-10-26 11:54:07', NULL, 284, '2021-10-26 13:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `reset_passwords`
--

CREATE TABLE `reset_passwords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_in` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reset_passwords`
--

INSERT INTO `reset_passwords` (`id`, `email`, `token`, `expire_in`, `created_at`, `updated_at`) VALUES
(1, '3li@ajmalalhawatif.com', '355ea8fe8e10ad558b8e446e246d031c754f54fc', '2021-02-18', '2021-02-18 10:12:09', '2021-02-18 10:13:25'),
(2, 'q@q.q', '3f786f1bfd770461f9791569242b4c0021d654f2', '2021-05-04', '2021-03-23 23:44:41', '2021-05-04 10:46:29'),
(3, 'mazen@pioneers-solutions.com', '149f07833fee51919f9bc9953b83426069cef0d6', '2021-06-28', '2021-05-04 09:08:49', '2021-06-28 08:54:32'),
(4, '3loosh7000@gmail.com', '7047732c163c040b9b4d472ac9a23a41942438a2', '2021-07-01', '2021-05-04 09:37:41', '2021-07-01 06:18:05'),
(5, 'cust@cust.com', '537f86523ec9f4e025b11c516c12faf432df190e', '2021-05-04', '2021-05-04 10:02:55', '2021-05-04 10:18:20'),
(6, 'd@dd.d', '6fbda3567727375d81ed86d70c4981d51039548d', '2021-06-28', '2021-06-28 10:02:49', '2021-06-28 10:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_address_id` int(10) UNSIGNED DEFAULT NULL,
  `order_product_id` bigint(20) UNSIGNED NOT NULL,
  `return_reason_id` int(10) UNSIGNED DEFAULT NULL,
  `group_stamp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seen_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`id`, `user_id`, `user_address_id`, `order_product_id`, `return_reason_id`, `group_stamp`, `created_at`, `updated_at`, `seen_at`) VALUES
(1, 284, 193, 1844, 1, '94839fb1-8ae3-4ce0-a1b7-8230f26a171b', '2021-09-29 16:46:49', '2021-10-11 14:28:57', '2021-10-11 16:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `return_reasons`
--

CREATE TABLE `return_reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_reasons`
--

INSERT INTO `return_reasons` (`id`, `name_ar`, `name_en`, `view_for`, `created_at`, `updated_at`) VALUES
(1, 'المنتج لا يعمل - يوجدبه خلل مصنعي', 'المنتج لا يعمل - يوجدبه خلل مصنعي', '1,0', '2021-04-07 16:34:35', '2021-04-07 16:36:46'),
(3, 'المنتج غير مطابق كما في تفاصيل المنتج', 'المنتج غير مطابق كما في تفاصيل المنتج', '1,0', '2021-05-19 18:02:45', '2021-05-19 18:02:45'),
(4, 'لا ارغب في هذا المنتج', 'لا ارغب في هذا المنتج', '1,0', '2021-05-19 18:06:03', '2021-05-19 18:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `guard_name`, `created_at`, `updated_at`) VALUES
(28, 'الادارة', 'المناديب', 'admin', '2019-08-28 10:47:17', '2021-08-09 19:33:44'),
(29, 'مشرفي المبيعات', 'مشرفي المبيعات في المناطق', 'admin', '2020-09-07 05:44:57', '2021-04-14 21:40:37'),
(30, 'مناديب المبيعات', 'مناديب المبيعات في المناطق', 'admin', '2020-09-07 05:51:15', '2021-04-14 21:40:26'),
(31, 'ادارة التصميم', 'ادارة التصميم', 'admin', '2020-09-12 04:19:28', '2020-09-12 04:19:28'),
(32, 'خدمة العملاء', 'خدمة العملاء', 'admin', '2021-04-14 21:44:37', '2021-04-14 21:44:37'),
(33, 'الادارة المالية', 'الادارة المالية', 'admin', '2021-06-19 19:28:46', '2021-06-19 19:28:46'),
(34, 'تجربة', 'تجربة', 'admin', '2021-08-09 19:32:42', '2021-08-09 19:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(9, 28),
(10, 28),
(11, 28),
(12, 28),
(13, 28),
(14, 28),
(15, 28),
(16, 28),
(17, 28),
(18, 28),
(19, 28),
(20, 28),
(21, 28),
(22, 28),
(23, 28),
(24, 28),
(25, 28),
(26, 28),
(27, 28),
(28, 28),
(29, 28),
(30, 28),
(31, 28),
(32, 28),
(33, 28),
(34, 28),
(35, 28),
(36, 28),
(37, 28),
(38, 28),
(39, 28),
(40, 28),
(41, 28),
(42, 28),
(43, 28),
(44, 28),
(45, 28),
(46, 28),
(47, 28),
(48, 28),
(49, 28),
(50, 28),
(51, 28),
(52, 28),
(53, 28),
(54, 28),
(55, 28),
(56, 28),
(73, 28),
(74, 28),
(75, 28),
(76, 28),
(77, 28),
(78, 28),
(79, 28),
(80, 28),
(81, 28),
(82, 28),
(83, 28),
(84, 28),
(85, 28),
(86, 28),
(87, 28),
(88, 28),
(89, 28),
(90, 28),
(91, 28),
(92, 28),
(93, 28),
(94, 28),
(95, 28),
(96, 28),
(97, 28),
(98, 28),
(99, 28),
(100, 28),
(101, 28),
(102, 28),
(107, 28),
(108, 28),
(109, 28),
(110, 28),
(111, 28),
(112, 28),
(113, 28),
(114, 28),
(115, 28),
(116, 28),
(117, 28),
(118, 28),
(119, 28),
(120, 28),
(121, 28),
(122, 28),
(123, 28),
(124, 28),
(125, 28),
(126, 28),
(127, 28),
(128, 28),
(129, 28),
(130, 28),
(131, 28),
(132, 28),
(133, 28),
(134, 28),
(135, 28),
(137, 28),
(138, 28),
(139, 28),
(140, 28),
(141, 28),
(142, 28),
(143, 28),
(144, 28),
(145, 28),
(162, 28),
(163, 28),
(164, 28),
(165, 28),
(166, 28),
(167, 28),
(168, 28),
(169, 28),
(170, 28),
(171, 28),
(172, 28),
(173, 28),
(95, 29),
(100, 29),
(102, 29),
(109, 29),
(110, 29),
(114, 29),
(131, 29),
(95, 30),
(102, 30),
(107, 30),
(109, 30),
(110, 30),
(114, 30),
(131, 30),
(9, 31),
(10, 31),
(11, 31),
(12, 31),
(13, 31),
(14, 31),
(15, 31),
(16, 31),
(17, 31),
(18, 31),
(19, 31),
(20, 31),
(21, 31),
(22, 31),
(23, 31),
(24, 31),
(29, 31),
(31, 31),
(32, 31),
(45, 31),
(46, 31),
(47, 31),
(48, 31),
(49, 31),
(50, 31),
(51, 31),
(52, 31),
(96, 31),
(97, 31),
(98, 31),
(113, 31),
(124, 31),
(129, 31),
(11, 32),
(12, 32),
(44, 32),
(95, 32),
(98, 32),
(100, 32),
(101, 32),
(102, 32),
(107, 32),
(109, 32),
(110, 32),
(111, 32),
(112, 32),
(113, 32),
(114, 32),
(121, 32),
(122, 32),
(129, 32),
(131, 32),
(133, 32),
(137, 32),
(138, 32),
(140, 32),
(141, 32),
(145, 32),
(165, 32),
(166, 32),
(167, 32),
(168, 32),
(12, 33),
(40, 33),
(56, 33),
(92, 33),
(95, 33),
(100, 33),
(10, 34),
(17, 34),
(27, 34),
(33, 34),
(38, 34),
(93, 34),
(94, 34),
(133, 34),
(144, 34);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keys_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keys_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `script_header` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `script_footer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`id`, `image`, `created_at`, `updated_at`) VALUES
(12, '1616075302dhl (1).png', '2021-03-18 14:48:22', '2021-03-18 14:48:22'),
(13, '1616075390aramex.png', '2021-03-18 14:49:50', '2021-03-18 14:49:50'),
(14, '1616075624quick.png', '2021-03-18 14:53:44', '2021-03-18 14:53:44'),
(15, '1616075930logo.png', '2021-03-18 14:58:50', '2021-03-18 14:58:50'),
(19, '162555056521E4AA85-38E5-4380-B7EA-CD8142A5C98D.png', '2021-07-06 08:49:26', '2021-07-06 08:49:26'),
(20, '16255506184CC87543-3E86-48E0-B963-E2CE777C741E.png', '2021-07-06 08:50:18', '2021-07-06 08:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image_ar`, `link`, `created_at`, `updated_at`, `image_en`) VALUES
(50, '16260254621-01-01-01.jpg', 'https://ajmalalhawatif.com/category/126', '2021-03-23 16:53:18', '2021-07-11 20:44:23', '162602546220202-01-01.jpg'),
(57, '1626028471يسيسيشب-01.jpg', 'https://ajmalalhawatif.com/brand-products/83', '2021-05-06 07:37:31', '2021-07-11 21:35:13', '1626028471يبسل]لأسلسلأ-01.jpg'),
(58, '1626030313fgfgfgfg-01.jpg', 'https://ajmalalhawatif.com/product-details/6168', '2021-05-27 18:51:55', '2021-07-11 22:07:04', '1626030418سشبضصرؤ-01.jpg'),
(59, '1626037631خهغعهخ-01.jpg', 'https://ajmalalhawatif.com/product-details/6117', '2021-07-11 22:17:55', '2021-07-12 00:07:11', '1626037591خهغعهخ-01.jpg'),
(60, '1626032456يسيبتلنامت-01.jpg', 'https://ajmalalhawatif.com/category/136', '2021-07-11 22:40:56', '2021-07-11 22:40:56', '1626032456يسيبتلنامت-01.jpg'),
(61, '1626185217يبؤءر-01.jpg', 'https://ajmalalhawatif.com/product-details/6070', '2021-07-12 17:58:56', '2021-07-13 17:06:57', '16261019361.jpg'),
(62, '1626122360qewrtyiui-02.jpg', 'https://ajmalalhawatif.com/product-details/6134', '2021-07-12 18:20:01', '2021-07-12 23:39:20', '16261032014.jpg'),
(63, '1626121717ثعفغهعخ-01.jpg', 'https://ajmalalhawatif.com/brand-products/113', '2021-07-12 19:03:31', '2021-07-12 23:28:37', '1626121717ثعفغهعخ-01.jpg'),
(64, '1626185110ضصثقفغعه-01.jpg', 'https://ajmalalhawatif.com/all_products', '2021-07-12 19:38:26', '2021-07-13 17:05:10', '1626185110ضصثقفغعه-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_type_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `title`, `status_type_id`) VALUES
(1, 'جديد', 1),
(2, 'جارى التجهيز', 1),
(3, 'جاهز', 1),
(4, 'جارى التوصيل / الشحن', 1),
(6, 'مكتمل', 2),
(7, 'تم الالغاء', 3),
(9, 'معلق', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status_types`
--

CREATE TABLE `status_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_types`
--

INSERT INTO `status_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'مفتوح', NULL, NULL),
(2, 'منتهى', NULL, NULL),
(3, 'ملغى', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suggesstion_replies`
--

CREATE TABLE `suggesstion_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suggesstion_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `show` int(11) NOT NULL DEFAULT '0' COMMENT '1:show - 0:hide',
  `reply_type` int(11) NOT NULL DEFAULT '0' COMMENT '1:user - 0:admin',
  `reply` text COLLATE utf8mb4_unicode_ci,
  `file` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suggesstion_replies`
--

INSERT INTO `suggesstion_replies` (`id`, `suggesstion_id`, `user_id`, `show`, `reply_type`, `reply`, `file`, `created_at`, `updated_at`) VALUES
(1, 14, 218, 0, 0, 'أهلا و', '1621943260.jpg', '2021-05-25 12:47:40', '2021-05-25 12:47:40'),
(2, 14, 218, 0, 1, '987', '1621943324.png', '2021-05-25 12:48:44', '2021-05-25 12:48:44'),
(3, 15, 242, 0, 0, 'ليش ما ت', '1621943813.png', '2021-05-25 12:56:53', '2021-05-25 12:56:53'),
(4, 16, 242, 0, 0, 'تااا', '1621943935.png', '2021-05-25 12:58:55', '2021-05-25 12:58:55'),
(5, 17, 242, 0, 0, 'البببلةىىبل', NULL, '2021-05-25 13:21:05', '2021-05-25 13:21:05'),
(6, 17, 242, 0, 1, 'hgggggggg', '1621948759.png', '2021-05-25 14:19:19', '2021-05-25 14:19:19'),
(7, 17, 242, 0, 0, 'hgltjvq', NULL, '2021-05-25 14:19:56', '2021-05-25 14:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete` int(11) NOT NULL DEFAULT '0' COMMENT '1:complete - 0 : not complete',
  `show` int(11) NOT NULL DEFAULT '0' COMMENT '1:show - 0 : hide',
  `reply_type` int(11) NOT NULL DEFAULT '0' COMMENT '1:reply to user - 0 : reply to admin',
  `generate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `seen_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `name`, `phone`, `type`, `message`, `created_at`, `updated_at`, `subject`, `complete`, `show`, `reply_type`, `generate`, `user_id`, `seen_at`) VALUES
(1, 'غغعغغ', '5966566795', 'suggestion', 'للل', '2021-09-29 16:47:42', '2021-10-27 11:36:40', 'للل', 0, 0, 0, 'ARyrEY', 284, '2021-10-27 13:36:40'),
(2, 'للل', '4578457854', 'complaint', 'للل', '2021-09-29 16:49:13', '2021-10-27 11:36:40', 'للل', 0, 0, 0, 'GsbEpn', 284, '2021-10-27 13:36:40'),
(3, 'يييي', '7845986554', 'message', 'ببب', '2021-09-29 16:49:29', '2021-10-27 11:36:40', 'ببب', 0, 0, 0, 'yqMn5T', 284, '2021-10-27 13:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_shipping` int(11) NOT NULL,
  `tax_product` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `country_tax` int(11) NOT NULL,
  `other_country_tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `tax_shipping`, `tax_product`, `country_id`, `country_tax`, `other_country_tax`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 15, '15', 1, NULL, '2021-06-17 06:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_data` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `txn_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `payment_method`, `user_id`, `amount`, `currency_id`, `payload`, `invoice_id`, `invoice_data`, `status`, `txn_id`, `processed_at`, `created_at`, `updated_at`) VALUES
('0612f4a8-47a3-4673-b40e-c085e0b2ab41', 'my_fatoorah', 266, 193.1, 4, '{\"user\": {\"id\": 266, \"email\": \"ajjj@a.a\", \"phone\": \"0599865163\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 64, \"zone_id\": 106, \"is_active\": 1, \"last_name\": \"ajjj\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-05-04 10:49:25\", \"first_name\": \"ajjj\", \"updated_at\": \"2021-05-04 10:49:25\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 14, \"phone_code_id\": 157, \"account_number\": null, \"authorized_person\": null, \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 193.1, \"address\": {\"address\": \"الر\", \"city_id\": \"64\", \"user_id\": 266, \"zone_id\": \"106\", \"country_id\": \"1\", \"government_id\": \"14\"}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للهواتف من بروتكشن برو\", \"item_photo\": \"1614279988للهواتف-01-01.jpg\", \"item_price\": 113.85, \"product_id\": 653, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 113.85, \"gift_cost\": 39, \"send_gift\": 1, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"21\", \"shipping_price\": 40.25, \"tax_percentage\": 15, \"is_address_saved\": false}', NULL, NULL, 'pending', NULL, NULL, '2021-05-04 08:51:15', '2021-05-04 08:51:15'),
('090529e9-e57a-4bab-9eeb-9518662e1077', 'my_fatoorah', 262, 143.75, 4, '{\"user\": {\"id\": 262, \"email\": \"p@p.p\", \"phone\": \"0599865163\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 62, \"zone_id\": 180, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-28 18:07:23\", \"first_name\": null, \"updated_at\": \"2021-03-28 19:15:30\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة تجربة\", \"prices_level\": 2, \"government_id\": 15, \"phone_code_id\": 157, \"account_number\": \"457777\", \"authorized_person\": \"علي احمد\", \"is_newsletter_subscripe\": 0}, \"total\": 143.75, \"address\": {\"id\": 172, \"address\": \"الاسكان\", \"city_id\": 63, \"user_id\": 262, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-28 19:05:17\", \"updated_at\": \"2021-03-28 19:05:17\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 2, \"item_name\": \"باورولوجي كيبل شحن يو اس بي - سي إلى لايتنغ 1.2 متر (أسود)\", \"item_photo\": \"16157509101605605047_0001 (4)-650x650.jpg\", \"item_price\": 34.5, \"product_id\": 1416, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أبيض)\", \"item_photo\": \"16157506091605605447_0001 (6)-650x650.jpg\", \"item_price\": 23, \"product_id\": 1414, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل سمعيات يو اس بي - سي إلى أيه يو أكس (1.2 م)\", \"item_photo\": \"16157507781605606057_0001 (9)-650x650.jpg\", \"item_price\": 51.75, \"product_id\": 1415, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 143.75, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"19\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true}', '602742', NULL, 'pending', NULL, NULL, '2021-03-28 20:00:17', '2021-03-28 20:00:17'),
('15d7d1f2-dc34-4c63-a58c-e642abac5307', 'my_fatoorah', 242, 2.3, 4, '{\"user\": {\"id\": 242, \"email\": \"q@q.q\", \"phone\": \"0596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23 21:21:29\", \"first_name\": null, \"updated_at\": \"2021-03-28 00:19:53\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 1, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"is_newsletter_subscripe\": 0}, \"total\": 2.3, \"address\": {\"id\": 171, \"address\": \"المنورة\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-24 01:43:32\", \"updated_at\": \"2021-03-24 01:43:32\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 2, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 2.3, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"21\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true}', '602675', NULL, 'pending', NULL, NULL, '2021-03-28 16:18:09', '2021-03-28 16:18:09'),
('185180d2-aad2-49db-8ffc-0861a9bdb9f8', 'my_fatoorah', 225, 14175.57, 4, '{\"user\": {\"id\": 225, \"email\": \"cust@cust.com\", \"phone\": \"01020750779\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 47, \"is_active\": 1, \"last_name\": \"test\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-28 17:50:02\", \"first_name\": \"etazm\", \"updated_at\": \"2021-03-21 18:15:31\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"is_newsletter_subscripe\": 0}, \"total\": 14175.57, \"address\": {\"address\": \"test\", \"city_id\": \"56\", \"user_id\": 225, \"zone_id\": \"47\", \"country_id\": \"1\", \"government_id\": \"11\"}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للتابلت و الاجهزة اللوحية من بروتكشن برو\", \"item_photo\": \"1614282346Untitled-طمكتختحخعت-03.jpg\", \"item_price\": 26.45, \"product_id\": 656, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"تغليف حراري شفاف للابتوب و الاجهزة المحمولة من بروتكشن برو\", \"item_photo\": \"1614281917lfpihawpf[o [-02.jpg\", \"item_price\": 40.25, \"product_id\": 655, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري للكاميرات من بروتكشن برو\", \"item_photo\": \"1614282898Untitled-y-04.jpg\", \"item_price\": 113.85, \"product_id\": 629, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للسماعات من بروتكشن برو\", \"item_photo\": \"1614283843rt-04.jpg\", \"item_price\": 113.85, \"product_id\": 630, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من نمبر ون\", \"item_photo\": \"1614281289ماكينة نمبر ون الامريكية.jpg\", \"item_price\": 4023.85, \"product_id\": 654, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"ماكينة للتغليف الحراري من بروتكشن برو (صغيرة)\", \"item_photo\": \"1614278322الصغيرة.jpg\", \"item_price\": 4271.4335, \"product_id\": 628, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 4, \"item_name\": \"تغليف حراري شفاف للهواتف من بروتكشن برو\", \"item_photo\": \"1614279988للهواتف-01-01.jpg\", \"item_price\": 28.75, \"product_id\": 653, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري خشبي محروق من نمبر ون\", \"item_photo\": \"1614285810خشبي محروق-01.jpg\", \"item_price\": 171.35, \"product_id\": 632, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 5, \"item_name\": \"باورلوجي شاحن حائط 65 واط بـ3 منافذ (أسود)\", \"item_photo\": \"16157499291608122858_Powerol222-650x650.jpg\", \"item_price\": 171.35, \"product_id\": 1408, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 90.85, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 14135.317, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"21\", \"shipping_price\": 40.25, \"tax_percentage\": 15, \"is_address_saved\": false}', NULL, NULL, 'pending', NULL, NULL, '2021-03-28 15:45:32', '2021-03-28 15:45:32'),
('26d50a30-1889-4ff9-9978-04df35174e50', 'my_fatoorah', 225, 5403.85, 4, '{\"user\": {\"id\": 225, \"email\": \"cust@cust.com\", \"phone\": \"01020750779\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 47, \"is_active\": 1, \"last_name\": \"test\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-28 17:50:02\", \"first_name\": \"etazm\", \"updated_at\": \"2021-03-21 18:15:31\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"is_newsletter_subscripe\": 0}, \"total\": 5403.85, \"address\": {\"address\": \"test\", \"city_id\": \"56\", \"user_id\": 225, \"zone_id\": \"47\", \"country_id\": \"1\", \"government_id\": \"11\"}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للتابلت و الاجهزة اللوحية من بروتكشن برو\", \"item_photo\": \"1614282346Untitled-طمكتختحخعت-03.jpg\", \"item_price\": 26.45, \"product_id\": 656, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"تغليف حراري شفاف للابتوب و الاجهزة المحمولة من بروتكشن برو\", \"item_photo\": \"1614281917lfpihawpf[o [-02.jpg\", \"item_price\": 40.25, \"product_id\": 655, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للسماعات من بروتكشن برو\", \"item_photo\": \"1614283843rt-04.jpg\", \"item_price\": 113.85, \"product_id\": 630, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من نمبر ون\", \"item_photo\": \"1614281289ماكينة نمبر ون الامريكية.jpg\", \"item_price\": 4023.85, \"product_id\": 654, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري خشبي محروق من نمبر ون\", \"item_photo\": \"1614285810خشبي محروق-01.jpg\", \"item_price\": 171.35, \"product_id\": 632, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 5, \"item_name\": \"باورلوجي شاحن حائط 65 واط بـ3 منافذ (أسود)\", \"item_photo\": \"16157499291608122858_Powerol222-650x650.jpg\", \"item_price\": 171.35, \"product_id\": 1408, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 90.85, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 5363.6, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"21\", \"shipping_price\": 40.25, \"tax_percentage\": 15, \"is_address_saved\": false}', '602659', NULL, 'pending', NULL, NULL, '2021-03-28 15:52:23', '2021-03-28 15:52:23'),
('2c62a392-8c5a-46b1-a8df-3f1ad2512786', 'my_fatoorah', 242, 159081.23, 4, '{\"user\": {\"id\": 242, \"logo\": \"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\", \"email\": \"q@q.q\", \"phone\": \"8596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"can_cash\": 1, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23 21:21:29\", \"first_name\": null, \"tax_number\": \"30097655446886545\", \"updated_at\": \"2021-05-25 13:15:12\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 1, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"commercial_register\": \"4123456789\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 159081.23, \"address\": {\"id\": 171, \"address\": \"المنورةااا\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-24 01:43:32\", \"updated_at\": \"2021-05-04 12:47:53\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"سماعة من شركة بيلكن بمنفذ لايتنينج\", \"item_photo\": \"1617755147ERZ64UHAChBhoFWDUXKet863y0nLLMCTfPesMtAI.jpg\", \"item_price\": 44.85, \"product_id\": 2913, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 551, \"item_name\": \"سماعة من شركة بيلكن بمنفذ لايتنينج  - ابيض\", \"item_photo\": \"16177552683f5VyUkfKsI2maxOdRC3fJVBsX17dWncSB8PobCg.jpg\", \"item_price\": 286.35, \"product_id\": 2914, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"شاحن صغير  لسيارة 4.8أمبير 24 واط Powerology  - أسود\", \"item_photo\": \"1617829719dt5cCKElbBw8sQ3MCuU6Mbb4rfm0gm4eukom5Rkw.png\", \"item_price\": 171.35, \"product_id\": 3119, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"شاحن جداري ثلاثي بمدخل PD بقوة 61 وات   من باور اولجي\", \"item_photo\": \"1617829579Uo3oE98Vu4VhqvRHfy0ZaqqpNaPeZLLfSpeQvuI0.png\", \"item_price\": 171.35, \"product_id\": 3118, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"شاحن جداري من راف باور  برايم بمنفذين USB وبقوة 17 وات\", \"item_photo\": \"1617755420ay8fLgBpauyKLQvfHUmnHJkNQeIGulBRr7mPyphO.jpg\", \"item_price\": 286.35, \"product_id\": 2916, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"شاحن سفر متعدد الاستخدامات 2.4 امبير + بي دي 45 واط - اسود، من باورولوجي\", \"item_photo\": \"16157498191608122858_Powerol222-650x650.jpg\", \"item_price\": 101.2, \"product_id\": 1407, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورلوجي شاحن حائط 65 واط بـ3 منافذ (أسود)\", \"item_photo\": \"16157499291608122858_Powerol222-650x650.jpg\", \"item_price\": 112.7, \"product_id\": 1408, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورلوجي شاحن حائط 156 واط بـ4 منافذ (أسود)\", \"item_photo\": \"16157500851608122858_Powerol222-650x650.jpg\", \"item_price\": 184, \"product_id\": 1410, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"تغليف حراري للكاميرات من بروتكشن برو\", \"item_photo\": \"1614282898Untitled-y-04.jpg\", \"item_price\": 34.5, \"product_id\": 629, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للسماعات من بروتكشن برو\", \"item_photo\": \"1614283843rt-04.jpg\", \"item_price\": 43.125, \"product_id\": 630, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري خشبي محروق من نمبر ون\", \"item_photo\": \"1614285810خشبي محروق-01.jpg\", \"item_price\": 85.1, \"product_id\": 632, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 159047.87500000006, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"21\", \"shipping_price\": 33.35, \"tax_percentage\": 15, \"is_address_saved\": true}', NULL, NULL, 'pending', NULL, NULL, '2021-05-30 14:40:31', '2021-05-30 14:40:31'),
('3dfecc49-6672-4eb1-8ce1-ce4b70a5a945', 'my_fatoorah', 262, 24.15, 4, '{\"user\": {\"id\": 262, \"email\": \"p@p.p\", \"phone\": \"0599865163\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 62, \"zone_id\": 180, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-28 18:07:23\", \"first_name\": null, \"updated_at\": \"2021-03-28 19:15:30\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة تجربة\", \"prices_level\": 2, \"government_id\": 15, \"phone_code_id\": 157, \"account_number\": \"457777\", \"authorized_person\": \"علي احمد\", \"is_newsletter_subscripe\": 0}, \"total\": 24.15, \"address\": {\"id\": 172, \"address\": \"الاسكان\", \"city_id\": 63, \"user_id\": 262, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-28 19:05:17\", \"updated_at\": \"2021-03-28 19:05:17\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أبيض)\", \"item_photo\": \"16157506091605605447_0001 (6)-650x650.jpg\", \"item_price\": 23, \"product_id\": 1414, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 24.15, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"19\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true}', '602879', NULL, 'pending', NULL, NULL, '2021-03-29 06:31:15', '2021-03-29 06:31:15'),
('4f566f7b-d0bc-427c-92d7-45c92dff35d9', 'my_fatoorah', 262, 14313.61, 4, '{\"user\": {\"id\": 262, \"email\": \"p@p.p\", \"phone\": \"0599865163\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-28 18:07:23\", \"first_name\": null, \"updated_at\": \"2021-04-05 16:12:42\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة تجربة\", \"prices_level\": 1, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"457777\", \"authorized_person\": \"علي احمد\", \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 14313.61, \"address\": {\"id\": 172, \"address\": \"الاسكان\", \"city_id\": 63, \"user_id\": 262, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-28 19:05:17\", \"updated_at\": \"2021-03-28 19:05:17\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورلوجي شاحن حائط 65 واط بـ3 منافذ (أسود)\", \"item_photo\": \"16157499291608122858_Powerol222-650x650.jpg\", \"item_price\": 112.7, \"product_id\": 1408, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من نمبر ون\", \"item_photo\": \"1614281289ماكينة نمبر ون الامريكية.jpg\", \"item_price\": 3448.85, \"product_id\": 654, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من بروتكشن برو (صغيرة)\", \"item_photo\": \"1614278322الصغيرة.jpg\", \"item_price\": 4271.4335, \"product_id\": 628, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من بروتكشن برو (وسط)\", \"item_photo\": \"1614277949الوسط.jpg\", \"item_price\": 6133.3295, \"product_id\": 627, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للهواتف من بروتكشن برو\", \"item_photo\": \"1614279988للهواتف-01-01.jpg\", \"item_price\": 43.125, \"product_id\": 653, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"التغليف الحراري للساعات والاساور من بروتكشن برو\", \"item_photo\": \"1614282648التغليف الحراري للساعات من بروتكشن-04.jpg\", \"item_price\": 26.45, \"product_id\": 647, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري ليد التحكم و الكونسل من بروتكشن برو\", \"item_photo\": \"1614283511dfd-04.jpg\", \"item_price\": 115, \"product_id\": 633, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري خشبي محروق من نمبر ون\", \"item_photo\": \"1614285810خشبي محروق-01.jpg\", \"item_price\": 85.1, \"product_id\": 632, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للسماعات من بروتكشن برو\", \"item_photo\": \"1614283843rt-04.jpg\", \"item_price\": 43.125, \"product_id\": 630, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري للكاميرات من بروتكشن برو\", \"item_photo\": \"1614282898Untitled-y-04.jpg\", \"item_price\": 34.5, \"product_id\": 629, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 14313.613, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"18\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true}', NULL, NULL, 'pending', NULL, NULL, '2021-04-05 15:36:32', '2021-04-05 15:36:32'),
('58f6aa2a-4e52-4ff3-b40b-50ed1452f3b6', 'my_fatoorah', 242, 1.15, 4, '{\"user\": {\"id\": 242, \"email\": \"q@q.q\", \"phone\": \"0596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23 21:21:29\", \"first_name\": null, \"updated_at\": \"2021-04-17 04:51:24\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 1, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 1.15, \"address\": {\"id\": 171, \"address\": \"المنورة\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-24 01:43:32\", \"updated_at\": \"2021-03-24 01:43:32\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 1.15, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"21\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true}', '628552', NULL, 'pending', NULL, NULL, '2021-04-20 23:43:35', '2021-04-20 23:43:36'),
('5b6d4ef8-145e-4605-8664-e4509ee4edca', 'my_fatoorah', 262, 230, 4, '{\"user\": {\"id\": 262, \"email\": \"p@p.p\", \"phone\": \"0599865163\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 62, \"zone_id\": 180, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-28 18:07:23\", \"first_name\": null, \"updated_at\": \"2021-03-28 19:15:30\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة تجربة\", \"prices_level\": 2, \"government_id\": 15, \"phone_code_id\": 157, \"account_number\": \"457777\", \"authorized_person\": \"علي احمد\", \"is_newsletter_subscripe\": 0}, \"total\": 230, \"address\": {\"id\": 172, \"address\": \"الاسكان\", \"city_id\": 63, \"user_id\": 262, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-28 19:05:17\", \"updated_at\": \"2021-03-28 19:05:17\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورلوجي شاحن حائط 65 واط بـ3 منافذ (أسود)\", \"item_photo\": \"16157499291608122858_Powerol222-650x650.jpg\", \"item_price\": 120.75, \"product_id\": 1408, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"شاحن سفر متعدد الاستخدامات 2.4 امبير + بي دي 45 واط - اسود، من باورولوجي\", \"item_photo\": \"16157498191608122858_Powerol222-650x650.jpg\", \"item_price\": 109.25, \"product_id\": 1407, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 230, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"19\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true}', '603265', NULL, 'pending', NULL, NULL, '2021-03-29 12:24:45', '2021-03-29 12:24:45'),
('6d049946-543f-49d8-a7fb-393d27d748a1', 'my_fatoorah', 266, 193.1, 4, '{\"user\": {\"id\": 266, \"email\": \"ajjj@a.a\", \"phone\": \"0599865163\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 64, \"zone_id\": 106, \"is_active\": 1, \"last_name\": \"ajjj\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-05-04 10:49:25\", \"first_name\": \"ajjj\", \"updated_at\": \"2021-05-04 10:49:25\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 14, \"phone_code_id\": 157, \"account_number\": null, \"authorized_person\": null, \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 193.1, \"address\": {\"address\": \"حي الاتصالات\", \"city_id\": \"64\", \"user_id\": 266, \"zone_id\": \"106\", \"country_id\": \"1\", \"government_id\": \"14\"}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للهواتف من بروتكشن برو\", \"item_photo\": \"1614279988للهواتف-01-01.jpg\", \"item_price\": 113.85, \"product_id\": 653, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 113.85, \"gift_cost\": 39, \"send_gift\": 1, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"21\", \"shipping_price\": 40.25, \"tax_percentage\": 15, \"is_address_saved\": false}', NULL, NULL, 'pending', NULL, NULL, '2021-05-04 08:50:51', '2021-05-04 08:50:51'),
('71f1a336-c047-4861-b8d8-307302af77be', 'my_fatoorah', 225, 14175.57, 4, '{\"user\": {\"id\": 225, \"email\": \"cust@cust.com\", \"phone\": \"01020750779\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 47, \"is_active\": 1, \"last_name\": \"test\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-28 17:50:02\", \"first_name\": \"etazm\", \"updated_at\": \"2021-03-21 18:15:31\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"is_newsletter_subscripe\": 0}, \"total\": 14175.57, \"address\": {\"address\": \"test\", \"city_id\": \"56\", \"user_id\": 225, \"zone_id\": \"47\", \"country_id\": \"1\", \"government_id\": \"11\"}, \"currency\": {\"id\": 4, \"code\": \"SR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للتابلت و الاجهزة اللوحية من بروتكشن برو\", \"item_photo\": \"1614282346Untitled-طمكتختحخعت-03.jpg\", \"item_price\": 26.45, \"product_id\": 656, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"تغليف حراري شفاف للابتوب و الاجهزة المحمولة من بروتكشن برو\", \"item_photo\": \"1614281917lfpihawpf[o [-02.jpg\", \"item_price\": 40.25, \"product_id\": 655, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري للكاميرات من بروتكشن برو\", \"item_photo\": \"1614282898Untitled-y-04.jpg\", \"item_price\": 113.85, \"product_id\": 629, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للسماعات من بروتكشن برو\", \"item_photo\": \"1614283843rt-04.jpg\", \"item_price\": 113.85, \"product_id\": 630, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من نمبر ون\", \"item_photo\": \"1614281289ماكينة نمبر ون الامريكية.jpg\", \"item_price\": 4023.85, \"product_id\": 654, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"ماكينة للتغليف الحراري من بروتكشن برو (صغيرة)\", \"item_photo\": \"1614278322الصغيرة.jpg\", \"item_price\": 4271.4335, \"product_id\": 628, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 4, \"item_name\": \"تغليف حراري شفاف للهواتف من بروتكشن برو\", \"item_photo\": \"1614279988للهواتف-01-01.jpg\", \"item_price\": 28.75, \"product_id\": 653, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري خشبي محروق من نمبر ون\", \"item_photo\": \"1614285810خشبي محروق-01.jpg\", \"item_price\": 171.35, \"product_id\": 632, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 5, \"item_name\": \"باورلوجي شاحن حائط 65 واط بـ3 منافذ (أسود)\", \"item_photo\": \"16157499291608122858_Powerol222-650x650.jpg\", \"item_price\": 171.35, \"product_id\": 1408, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 90.85, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 14135.317, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"21\", \"shipping_price\": 40.25, \"tax_percentage\": 15, \"is_address_saved\": false}', NULL, NULL, 'pending', NULL, NULL, '2021-03-28 15:43:05', '2021-03-28 15:43:05'),
('739e7d7b-ff32-4c2e-b25a-e453ff4dab7c', 'my_fatoorah', 262, 63.25, 4, '{\"user\": {\"id\": 262, \"email\": \"p@p.p\", \"phone\": \"0599865163\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 62, \"zone_id\": 67, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-28 18:07:23\", \"first_name\": null, \"updated_at\": \"2021-03-28 18:07:44\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة تجربة\", \"prices_level\": 2, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"457777\", \"authorized_person\": \"علي احمد\", \"is_newsletter_subscripe\": 0}, \"total\": 63.25, \"address\": {\"address\": \"الاسكان\", \"city_id\": \"63\", \"user_id\": 262, \"zone_id\": \"84\", \"country_id\": \"1\", \"government_id\": \"13\"}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أبيض)\", \"item_photo\": \"16157506091605605447_0001 (6)-650x650.jpg\", \"item_price\": 23, \"product_id\": 1414, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 23, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"19\", \"shipping_price\": 40.25, \"tax_percentage\": 15, \"is_address_saved\": false}', '602671', NULL, 'pending', NULL, NULL, '2021-03-28 16:12:55', '2021-03-28 16:12:55'),
('93c7e415-69bd-4092-9f20-0ec289cb2251', 'my_fatoorah', 218, 358.7, 4, '{\"user\": {\"id\": 218, \"logo\": null, \"email\": \"mazen@pioneers-solutions.com\", \"phone\": \"1020800367\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 56, \"can_cash\": 1, \"is_active\": 1, \"last_name\": \"El-Hefnawy\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-25T14:24:04.000000Z\", \"first_name\": \"Mazen\", \"tax_number\": null, \"updated_at\": \"2021-06-28T07:54:20.000000Z\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"commercial_register\": null, \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 358.7, \"address\": {\"id\": 176, \"address\": \"asasasas\", \"city_id\": 56, \"user_id\": 218, \"zone_id\": 49, \"country_id\": 1, \"created_at\": \"2021-04-08T08:35:18.000000Z\", \"updated_at\": \"2021-04-08T08:35:18.000000Z\", \"government_id\": 11}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"سوار ساعة ابل سيلكون وي وو - اخضر\", \"item_photo\": \"1623022467iBrfRgthTdZjt92dZjSI1YcoWTZ6300W75OUS7wV.jpg\", \"item_price\": 171.35, \"product_id\": 4355, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"سوار ساعة ابل سيلكون وي وو - احمر\", \"item_photo\": \"16230225002wH6NhPysGJ7xVYs7G85nRaGaEXo8Rm7Kejad8bK.jpg\", \"item_price\": 148.35, \"product_id\": 4356, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 319.7, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 39.0011, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 33.914}', NULL, NULL, 'pending', NULL, NULL, '2021-06-28 09:02:23', '2021-06-28 09:02:23'),
('93c7e474-ca8c-4629-94c3-ff5c38dada36', 'my_fatoorah', 218, 397.7, 4, '{\"user\": {\"id\": 218, \"logo\": null, \"email\": \"mazen@pioneers-solutions.com\", \"phone\": \"1020800367\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 56, \"can_cash\": 1, \"is_active\": 1, \"last_name\": \"El-Hefnawy\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-25T14:24:04.000000Z\", \"first_name\": \"Mazen\", \"tax_number\": null, \"updated_at\": \"2021-06-28T07:54:20.000000Z\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"commercial_register\": null, \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 397.7, \"address\": {\"id\": 176, \"address\": \"asasasas\", \"city_id\": 56, \"user_id\": 218, \"zone_id\": 49, \"country_id\": 1, \"created_at\": \"2021-04-08T08:35:18.000000Z\", \"updated_at\": \"2021-04-08T08:35:18.000000Z\", \"government_id\": 11}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"سوار ساعة ابل سيلكون وي وو - اخضر\", \"item_photo\": \"1623022467iBrfRgthTdZjt92dZjSI1YcoWTZ6300W75OUS7wV.jpg\", \"item_price\": 171.35, \"product_id\": 4355, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"سوار ساعة ابل سيلكون وي وو - احمر\", \"item_photo\": \"16230225002wH6NhPysGJ7xVYs7G85nRaGaEXo8Rm7Kejad8bK.jpg\", \"item_price\": 148.35, \"product_id\": 4356, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 319.7, \"gift_cost\": 39, \"send_gift\": 1, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 39.0011, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 33.914}', NULL, NULL, 'pending', NULL, NULL, '2021-06-28 09:03:26', '2021-06-28 09:03:26'),
('93c7e60e-182d-43ab-8d06-e1873a5728e0', 'my_fatoorah', 218, 397.7, 4, '{\"user\": {\"id\": 218, \"logo\": null, \"email\": \"mazen@pioneers-solutions.com\", \"phone\": \"1020800367\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 56, \"can_cash\": 1, \"is_active\": 1, \"last_name\": \"El-Hefnawy\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-25T14:24:04.000000Z\", \"first_name\": \"Mazen\", \"tax_number\": null, \"updated_at\": \"2021-06-28T07:54:20.000000Z\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"commercial_register\": null, \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 397.7, \"address\": {\"id\": 176, \"address\": \"asasasas\", \"city_id\": 56, \"user_id\": 218, \"zone_id\": 49, \"country_id\": 1, \"created_at\": \"2021-04-08T08:35:18.000000Z\", \"updated_at\": \"2021-04-08T08:35:18.000000Z\", \"government_id\": 11}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"سوار ساعة ابل سيلكون وي وو - اخضر\", \"item_photo\": \"1623022467iBrfRgthTdZjt92dZjSI1YcoWTZ6300W75OUS7wV.jpg\", \"item_price\": 171.35, \"product_id\": 4355, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"سوار ساعة ابل سيلكون وي وو - احمر\", \"item_photo\": \"16230225002wH6NhPysGJ7xVYs7G85nRaGaEXo8Rm7Kejad8bK.jpg\", \"item_price\": 148.35, \"product_id\": 4356, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 319.7, \"gift_cost\": 39, \"send_gift\": 1, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 39.0011, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 33.914}', NULL, NULL, 'pending', NULL, NULL, '2021-06-28 09:07:54', '2021-06-28 09:07:54'),
('93c7e639-a899-4182-af2f-e51592d1f7c6', 'my_fatoorah', 218, 358.7, 4, '{\"user\": {\"id\": 218, \"logo\": null, \"email\": \"mazen@pioneers-solutions.com\", \"phone\": \"1020800367\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 56, \"can_cash\": 1, \"is_active\": 1, \"last_name\": \"El-Hefnawy\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-25T14:24:04.000000Z\", \"first_name\": \"Mazen\", \"tax_number\": null, \"updated_at\": \"2021-06-28T07:54:20.000000Z\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"commercial_register\": null, \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 358.7, \"address\": {\"id\": 176, \"address\": \"asasasas\", \"city_id\": 56, \"user_id\": 218, \"zone_id\": 49, \"country_id\": 1, \"created_at\": \"2021-04-08T08:35:18.000000Z\", \"updated_at\": \"2021-04-08T08:35:18.000000Z\", \"government_id\": 11}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"سوار ساعة ابل سيلكون وي وو - اخضر\", \"item_photo\": \"1623022467iBrfRgthTdZjt92dZjSI1YcoWTZ6300W75OUS7wV.jpg\", \"item_price\": 171.35, \"product_id\": 4355, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"سوار ساعة ابل سيلكون وي وو - احمر\", \"item_photo\": \"16230225002wH6NhPysGJ7xVYs7G85nRaGaEXo8Rm7Kejad8bK.jpg\", \"item_price\": 148.35, \"product_id\": 4356, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 319.7, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 39.0011, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 33.914}', NULL, NULL, 'pending', NULL, NULL, '2021-06-28 09:08:23', '2021-06-28 09:08:23'),
('93c7e9a3-6702-4266-b4e2-9bfd9547c4ba', 'my_fatoorah', 225, 5773.95, 4, '{\"user\": {\"id\": 225, \"logo\": null, \"email\": \"cust@cust.com\", \"phone\": \"01020750779\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 47, \"can_cash\": 1, \"is_active\": 1, \"last_name\": \"test\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-28T14:50:02.000000Z\", \"first_name\": \"etazm\", \"tax_number\": null, \"updated_at\": \"2021-05-19T14:20:26.000000Z\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"commercial_register\": null, \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 5773.95, \"address\": {\"id\": 175, \"address\": \"test\", \"city_id\": 56, \"user_id\": 225, \"zone_id\": 49, \"country_id\": 1, \"created_at\": \"2021-04-08T08:17:17.000000Z\", \"updated_at\": \"2021-04-08T08:17:17.000000Z\", \"government_id\": 11}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"ايباد برو 2020، 12.9 بوصة، واي فاي، 512 جيجا، فضي\", \"item_photo\": \"1617885527cClUaKP8Q3He583DEBMM1vFGPQGIdeYG4fzzf7Ks.jpg\", \"item_price\": 67.85, \"product_id\": 3130, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 5, \"item_name\": \"حافظة السوائل الذكية من برودو 500 مل - خيارات متعددة\", \"item_photo\": \"1617830160YYuZZUUokN7McrYTfQKfDGkaVugODmK0nUMfsC6s.jpg\", \"item_price\": 67.85, \"product_id\": 3121, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ايفون 12 128 جيجا ابيض\", \"item_photo\": \"16230205621a6696b1-c041-4b7b-b4a1-6c144134e57b.jpeg\", \"item_price\": 5060, \"product_id\": 4243, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ايفون 12 128 جيجا اسود\", \"item_photo\": \"162302077838d83366-1133-4cbb-9736-fd5c9555d670.png\", \"item_price\": 228.85, \"product_id\": 4244, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 5695.950000000001, \"gift_cost\": 39, \"send_gift\": 1, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 39.0011, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 33.914}', NULL, NULL, 'pending', NULL, NULL, '2021-06-28 09:17:55', '2021-06-28 09:17:55'),
('93c7f5bd-8c30-40a4-a29b-af3242a2e58c', 'my_fatoorah', 225, 5773.95, 4, '{\"user\": {\"id\": 225, \"logo\": null, \"email\": \"cust@cust.com\", \"phone\": \"01020750779\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 47, \"can_cash\": 1, \"is_active\": 1, \"last_name\": \"test\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-28T14:50:02.000000Z\", \"first_name\": \"etazm\", \"tax_number\": null, \"updated_at\": \"2021-05-19T14:20:26.000000Z\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"commercial_register\": null, \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 5773.95, \"address\": {\"id\": 175, \"address\": \"test\", \"city_id\": 56, \"user_id\": 225, \"zone_id\": 49, \"country_id\": 1, \"created_at\": \"2021-04-08T08:17:17.000000Z\", \"updated_at\": \"2021-04-08T08:17:17.000000Z\", \"government_id\": 11}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"ايباد برو 2020، 12.9 بوصة، واي فاي، 512 جيجا، فضي\", \"item_photo\": \"1617885527cClUaKP8Q3He583DEBMM1vFGPQGIdeYG4fzzf7Ks.jpg\", \"item_price\": 67.85, \"product_id\": 3130, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 5, \"item_name\": \"حافظة السوائل الذكية من برودو 500 مل - خيارات متعددة\", \"item_photo\": \"1617830160YYuZZUUokN7McrYTfQKfDGkaVugODmK0nUMfsC6s.jpg\", \"item_price\": 67.85, \"product_id\": 3121, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ايفون 12 128 جيجا ابيض\", \"item_photo\": \"16230205621a6696b1-c041-4b7b-b4a1-6c144134e57b.jpeg\", \"item_price\": 5060, \"product_id\": 4243, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ايفون 12 128 جيجا اسود\", \"item_photo\": \"162302077838d83366-1133-4cbb-9736-fd5c9555d670.png\", \"item_price\": 228.85, \"product_id\": 4244, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 5695.950000000001, \"gift_cost\": 39, \"send_gift\": 1, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 39.0011, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 33.914}', NULL, NULL, 'pending', NULL, NULL, '2021-06-28 09:51:46', '2021-06-28 09:51:46');
INSERT INTO `transactions` (`id`, `payment_method`, `user_id`, `amount`, `currency_id`, `payload`, `invoice_id`, `invoice_data`, `status`, `txn_id`, `processed_at`, `created_at`, `updated_at`) VALUES
('93c7f809-3608-4650-9f45-23046c305d50', 'my_fatoorah', 218, 358.7, 4, '{\"user\": {\"id\": 218, \"logo\": null, \"email\": \"mazen@pioneers-solutions.com\", \"phone\": \"1020800367\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 56, \"can_cash\": 1, \"is_active\": 1, \"last_name\": \"El-Hefnawy\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-25T14:24:04.000000Z\", \"first_name\": \"Mazen\", \"tax_number\": null, \"updated_at\": \"2021-06-28T07:54:20.000000Z\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"commercial_register\": null, \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 358.7, \"address\": {\"id\": 176, \"address\": \"asasasas\", \"city_id\": 56, \"user_id\": 218, \"zone_id\": 49, \"country_id\": 1, \"created_at\": \"2021-04-08T08:35:18.000000Z\", \"updated_at\": \"2021-04-08T08:35:18.000000Z\", \"government_id\": 11}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"سوار ساعة ابل سيلكون وي وو - اخضر\", \"item_photo\": \"1623022467iBrfRgthTdZjt92dZjSI1YcoWTZ6300W75OUS7wV.jpg\", \"item_price\": 171.35, \"product_id\": 4355, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"سوار ساعة ابل سيلكون وي وو - احمر\", \"item_photo\": \"16230225002wH6NhPysGJ7xVYs7G85nRaGaEXo8Rm7Kejad8bK.jpg\", \"item_price\": 148.35, \"product_id\": 4356, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 319.7, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 39, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 33.91}', '683678', '\"{\\\"InvoiceId\\\":683678,\\\"InvoiceStatus\\\":\\\"Paid\\\",\\\"InvoiceReference\\\":\\\"2021079854\\\",\\\"CustomerReference\\\":null,\\\"CreatedDate\\\":\\\"2021-06-28T12:00:27.79\\\",\\\"ExpiryDate\\\":\\\"July 1, 2021\\\",\\\"InvoiceValue\\\":29.068,\\\"Comments\\\":null,\\\"CustomerName\\\":\\\"Mazen El-Hefnawy\\\",\\\"CustomerMobile\\\":\\\"+201020800367\\\",\\\"CustomerEmail\\\":\\\"mazen@pioneers-solutions.com\\\",\\\"UserDefinedField\\\":null,\\\"InvoiceDisplayValue\\\":\\\"358.700 SR\\\",\\\"InvoiceItems\\\":[{\\\"ItemName\\\":\\\"\\\\u0633\\\\u0648\\\\u0627\\\\u0631 \\\\u0633\\\\u0627\\\\u0639\\\\u0629 \\\\u0627\\\\u0628\\\\u0644 \\\\u0633\\\\u064a\\\\u0644\\\\u0643\\\\u0648\\\\u0646 \\\\u0648\\\\u064a \\\\u0648\\\\u0648 - \\\\u0627\\\\u062e\\\\u0636\\\\u0631\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":13.886,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u0633\\\\u0648\\\\u0627\\\\u0631 \\\\u0633\\\\u0627\\\\u0639\\\\u0629 \\\\u0627\\\\u0628\\\\u0644 \\\\u0633\\\\u064a\\\\u0644\\\\u0643\\\\u0648\\\\u0646 \\\\u0648\\\\u064a \\\\u0648\\\\u0648 - \\\\u0627\\\\u062d\\\\u0645\\\\u0631\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":12.022,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u062a\\\\u0643\\\\u0627\\\\u0644\\\\u064a\\\\u0641 \\\\u0627\\\\u0644\\\\u0634\\\\u062d\\\\u0646\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":3.16,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null}],\\\"InvoiceTransactions\\\":[{\\\"TransactionDate\\\":\\\"2021-06-28T12:01:43.58\\\",\\\"PaymentGateway\\\":\\\"VISA\\\\/MASTER\\\",\\\"ReferenceId\\\":\\\"060668367854751464_3D\\\",\\\"TrackId\\\":\\\"28-06-2021_547514\\\",\\\"TransactionId\\\":\\\"060668367854751464\\\",\\\"PaymentId\\\":\\\"060668367854751464\\\",\\\"AuthorizationId\\\":\\\"091663\\\",\\\"TransactionStatus\\\":\\\"Succss\\\",\\\"TransationValue\\\":\\\"29.068\\\",\\\"CustomerServiceCharge\\\":\\\"0.000\\\",\\\"DueValue\\\":\\\"29.070\\\",\\\"PaidCurrency\\\":\\\"KD\\\",\\\"PaidCurrencyValue\\\":\\\"29.070\\\",\\\"Currency\\\":\\\"KD\\\",\\\"Error\\\":null,\\\"CardNumber\\\":\\\"545301xxxxxx5539\\\"}],\\\"Suppliers\\\":[]}\"', 'paid', '060668367854751464', '2021-06-28 11:59:28', '2021-06-28 09:58:11', '2021-06-28 09:59:28'),
('93c7f90d-7cad-4b0d-a549-9928f5c80200', 'my_fatoorah', 225, 5773.95, 4, '{\"user\": {\"id\": 225, \"logo\": null, \"email\": \"cust@cust.com\", \"phone\": \"01020750779\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 47, \"can_cash\": 1, \"is_active\": 1, \"last_name\": \"test\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-28T14:50:02.000000Z\", \"first_name\": \"etazm\", \"tax_number\": null, \"updated_at\": \"2021-05-19T14:20:26.000000Z\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"commercial_register\": null, \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 5773.95, \"address\": {\"id\": 175, \"address\": \"test\", \"city_id\": 56, \"user_id\": 225, \"zone_id\": 49, \"country_id\": 1, \"created_at\": \"2021-04-08T08:17:17.000000Z\", \"updated_at\": \"2021-04-08T08:17:17.000000Z\", \"government_id\": 11}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"ايباد برو 2020، 12.9 بوصة، واي فاي، 512 جيجا، فضي\", \"item_photo\": \"1617885527cClUaKP8Q3He583DEBMM1vFGPQGIdeYG4fzzf7Ks.jpg\", \"item_price\": 67.85, \"product_id\": 3130, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 5, \"item_name\": \"حافظة السوائل الذكية من برودو 500 مل - خيارات متعددة\", \"item_photo\": \"1617830160YYuZZUUokN7McrYTfQKfDGkaVugODmK0nUMfsC6s.jpg\", \"item_price\": 67.85, \"product_id\": 3121, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ايفون 12 128 جيجا ابيض\", \"item_photo\": \"16230205621a6696b1-c041-4b7b-b4a1-6c144134e57b.jpeg\", \"item_price\": 5060, \"product_id\": 4243, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ايفون 12 128 جيجا اسود\", \"item_photo\": \"162302077838d83366-1133-4cbb-9736-fd5c9555d670.png\", \"item_price\": 228.85, \"product_id\": 4244, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 5695.950000000001, \"gift_cost\": 39, \"send_gift\": 1, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 39, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 33.91}', '683683', '\"{\\\"InvoiceId\\\":683683,\\\"InvoiceStatus\\\":\\\"Paid\\\",\\\"InvoiceReference\\\":\\\"2021079858\\\",\\\"CustomerReference\\\":null,\\\"CreatedDate\\\":\\\"2021-06-28T12:03:18.267\\\",\\\"ExpiryDate\\\":\\\"July 1, 2021\\\",\\\"InvoiceValue\\\":467.902,\\\"Comments\\\":null,\\\"CustomerName\\\":\\\"etazm test\\\",\\\"CustomerMobile\\\":\\\"+2001020750779\\\",\\\"CustomerEmail\\\":\\\"cust@cust.com\\\",\\\"UserDefinedField\\\":null,\\\"InvoiceDisplayValue\\\":\\\"5,773.950 SR\\\",\\\"InvoiceItems\\\":[{\\\"ItemName\\\":\\\"\\\\u0627\\\\u064a\\\\u0628\\\\u0627\\\\u062f \\\\u0628\\\\u0631\\\\u0648 2020\\\\u060c 12.9 \\\\u0628\\\\u0648\\\\u0635\\\\u0629\\\\u060c \\\\u0648\\\\u0627\\\\u064a \\\\u0641\\\\u0627\\\\u064a\\\\u060c 512 \\\\u062c\\\\u064a\\\\u062c\\\\u0627\\\\u060c \\\\u0641\\\\u0636\\\\u064a\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":5.498,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u062d\\\\u0627\\\\u0641\\\\u0638\\\\u0629 \\\\u0627\\\\u0644\\\\u0633\\\\u0648\\\\u0627\\\\u0626\\\\u0644 \\\\u0627\\\\u0644\\\\u0630\\\\u0643\\\\u064a\\\\u0629 \\\\u0645\\\\u0646 \\\\u0628\\\\u0631\\\\u0648\\\\u062f\\\\u0648 500 \\\\u0645\\\\u0644 - \\\\u062e\\\\u064a\\\\u0627\\\\u0631\\\\u0627\\\\u062a \\\\u0645\\\\u062a\\\\u0639\\\\u062f\\\\u062f\\\\u0629\\\",\\\"Quantity\\\":5,\\\"UnitPrice\\\":5.498,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u0627\\\\u064a\\\\u0641\\\\u0648\\\\u0646 12 128 \\\\u062c\\\\u064a\\\\u062c\\\\u0627 \\\\u0627\\\\u0628\\\\u064a\\\\u0636\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":410.049,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u0627\\\\u064a\\\\u0641\\\\u0648\\\\u0646 12 128 \\\\u062c\\\\u064a\\\\u062c\\\\u0627 \\\\u0627\\\\u0633\\\\u0648\\\\u062f\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":18.545,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u062a\\\\u0643\\\\u0627\\\\u0644\\\\u064a\\\\u0641 \\\\u0627\\\\u0644\\\\u0634\\\\u062d\\\\u0646\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":3.16,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u062a\\\\u0643\\\\u0644\\\\u0641\\\\u0629 \\\\u0627\\\\u0644\\\\u0647\\\\u062f\\\\u064a\\\\u0629\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":3.16,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null}],\\\"InvoiceTransactions\\\":[{\\\"TransactionDate\\\":\\\"2021-06-28T12:03:43.047\\\",\\\"PaymentGateway\\\":\\\"KNET\\\",\\\"ReferenceId\\\":\\\"060668368354752163\\\",\\\"TrackId\\\":\\\"28-06-2021_547521\\\",\\\"TransactionId\\\":\\\"060668368354752163\\\",\\\"PaymentId\\\":\\\"060668368354752163\\\",\\\"AuthorizationId\\\":\\\"060668368354752163\\\",\\\"TransactionStatus\\\":\\\"InProgress\\\",\\\"TransationValue\\\":\\\"467.902\\\",\\\"CustomerServiceCharge\\\":\\\"0.000\\\",\\\"DueValue\\\":\\\"467.910\\\",\\\"PaidCurrency\\\":\\\"KD\\\",\\\"PaidCurrencyValue\\\":\\\"467.910\\\",\\\"Currency\\\":\\\"KD\\\",\\\"Error\\\":null,\\\"CardNumber\\\":null},{\\\"TransactionDate\\\":\\\"2021-06-28T12:04:51.41\\\",\\\"PaymentGateway\\\":\\\"Visa\\\\/Master Direct 3DS Flow\\\",\\\"ReferenceId\\\":\\\"060668368354752463_3D\\\",\\\"TrackId\\\":\\\"28-06-2021_547524\\\",\\\"TransactionId\\\":\\\"060668368354752463\\\",\\\"PaymentId\\\":\\\"060668368354752463\\\",\\\"AuthorizationId\\\":\\\"162368\\\",\\\"TransactionStatus\\\":\\\"Succss\\\",\\\"TransationValue\\\":\\\"467.902\\\",\\\"CustomerServiceCharge\\\":\\\"11.798\\\",\\\"DueValue\\\":\\\"479.700\\\",\\\"PaidCurrency\\\":\\\"KD\\\",\\\"PaidCurrencyValue\\\":\\\"479.700\\\",\\\"Currency\\\":\\\"KD\\\",\\\"Error\\\":null,\\\"CardNumber\\\":\\\"545301xxxxxx5539\\\"}],\\\"Suppliers\\\":[]}\"', 'paid', '060668368354752463', '2021-06-28 12:02:36', '2021-06-28 10:01:01', '2021-06-28 10:02:36'),
('93c7fc74-5825-4c53-a76b-f68b183b5290', 'my_fatoorah', 242, 1.15, 4, '{\"user\": {\"id\": 242, \"logo\": \"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\", \"email\": \"q@q.q\", \"phone\": \"8596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"can_cash\": 1, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23T18:21:29.000000Z\", \"first_name\": null, \"tax_number\": \"30097655446886545\", \"updated_at\": \"2021-06-17T05:36:40.000000Z\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 3, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"commercial_register\": \"4123456789\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 1.15, \"address\": {\"id\": 171, \"address\": \"المنورةااا\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-23T22:43:32.000000Z\", \"updated_at\": \"2021-05-04T09:47:53.000000Z\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 1.15, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 0}', '683694', NULL, 'pending', NULL, NULL, '2021-06-28 10:10:32', '2021-06-28 10:10:33'),
('93c81431-e249-4ad7-b216-465442d2b53f', 'my_fatoorah', 242, 1.15, 4, '{\"user\": {\"id\": 242, \"logo\": \"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\", \"email\": \"q@q.q\", \"phone\": \"8596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"can_cash\": 1, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23T18:21:29.000000Z\", \"first_name\": null, \"tax_number\": \"30097655446886545\", \"updated_at\": \"2021-06-17T05:36:40.000000Z\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 3, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"commercial_register\": \"4123456789\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 1.15, \"address\": {\"id\": 171, \"address\": \"المنورةااا\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-23T22:43:32.000000Z\", \"updated_at\": \"2021-05-04T09:47:53.000000Z\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 1.15, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 0}', '683785', '\"{\\\"InvoiceId\\\":683785,\\\"InvoiceStatus\\\":\\\"Pending\\\",\\\"InvoiceReference\\\":\\\"2021079934\\\",\\\"CustomerReference\\\":null,\\\"CreatedDate\\\":\\\"2021-06-28T13:19:12.047\\\",\\\"ExpiryDate\\\":\\\"July 1, 2021\\\",\\\"InvoiceValue\\\":0.093,\\\"Comments\\\":null,\\\"CustomerName\\\":\\\"\\\\u0634\\\\u0631\\\\u0643\\\\u0629 \\\\u0633\\\\u064a\\\\u0646 \\\\u0627\\\\u0644\\\\u062a\\\\u062c\\\\u0627\\\\u0631\\\\u0629\\\",\\\"CustomerMobile\\\":\\\"+9668596656679\\\",\\\"CustomerEmail\\\":\\\"q@q.q\\\",\\\"UserDefinedField\\\":null,\\\"InvoiceDisplayValue\\\":\\\"1.150 SR\\\",\\\"InvoiceItems\\\":[{\\\"ItemName\\\":\\\"\\\\u0628\\\\u0627\\\\u0648\\\\u0631\\\\u0648\\\\u0644\\\\u0648\\\\u062c\\\\u064a \\\\u0643\\\\u064a\\\\u0628\\\\u0644 \\\\u0644\\\\u0627\\\\u064a\\\\u062a\\\\u0646\\\\u063a 1.2 \\\\u0645\\\\u062a\\\\u0631 (\\\\u0623\\\\u062d\\\\u0645\\\\u0631)\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":0.093,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u062a\\\\u0643\\\\u0627\\\\u0644\\\\u064a\\\\u0641 \\\\u0627\\\\u0644\\\\u0634\\\\u062d\\\\u0646\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":0,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null}],\\\"InvoiceTransactions\\\":[{\\\"TransactionDate\\\":\\\"2021-06-28T13:19:29.677\\\",\\\"PaymentGateway\\\":\\\"MADA\\\",\\\"ReferenceId\\\":\\\"060668378554760664\\\",\\\"TrackId\\\":\\\"28-06-2021_547606\\\",\\\"TransactionId\\\":\\\"060668378554760664\\\",\\\"PaymentId\\\":\\\"060668378554760664\\\",\\\"AuthorizationId\\\":\\\"060668378554760664\\\",\\\"TransactionStatus\\\":\\\"Failed\\\",\\\"TransationValue\\\":\\\"0.093\\\",\\\"CustomerServiceCharge\\\":\\\"0.000\\\",\\\"DueValue\\\":\\\"0.100\\\",\\\"PaidCurrency\\\":\\\"SR\\\",\\\"PaidCurrencyValue\\\":\\\"1.240\\\",\\\"Currency\\\":\\\"KD\\\",\\\"Error\\\":\\\"3DS authentication failed due to: .\\\",\\\"CardNumber\\\":null}],\\\"Suppliers\\\":[]}\"', 'pending', '060668378554760664', '2021-06-28 13:19:00', '2021-06-28 11:16:55', '2021-06-28 11:19:00'),
('93c832be-72a3-4df6-a7ab-2b88b01863d0', 'my_fatoorah', 218, 5138, 4, '{\"user\": {\"id\": 218, \"logo\": null, \"email\": \"mazen@pioneers-solutions.com\", \"phone\": \"1020800367\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 56, \"can_cash\": 1, \"is_active\": 1, \"last_name\": \"El-Hefnawy\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-25T14:24:04.000000Z\", \"first_name\": \"Mazen\", \"tax_number\": null, \"updated_at\": \"2021-06-28T07:54:20.000000Z\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"commercial_register\": null, \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 5138, \"address\": {\"id\": 176, \"address\": \"asasasas\", \"city_id\": 56, \"user_id\": 218, \"zone_id\": 49, \"country_id\": 1, \"created_at\": \"2021-04-08T08:35:18.000000Z\", \"updated_at\": \"2021-04-08T08:35:18.000000Z\", \"government_id\": 11}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"ايفون 12 128 جيجا ابيض\", \"item_photo\": \"16230205621a6696b1-c041-4b7b-b4a1-6c144134e57b.jpeg\", \"item_price\": 5060, \"product_id\": 4243, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 5060, \"gift_cost\": 39, \"send_gift\": 1, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 39, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 33.91}', '683894', '\"{\\\"InvoiceId\\\":683894,\\\"InvoiceStatus\\\":\\\"Paid\\\",\\\"InvoiceReference\\\":\\\"2021080034\\\",\\\"CustomerReference\\\":null,\\\"CreatedDate\\\":\\\"2021-06-28T14:44:37.513\\\",\\\"ExpiryDate\\\":\\\"July 1, 2021\\\",\\\"InvoiceValue\\\":416.369,\\\"Comments\\\":null,\\\"CustomerName\\\":\\\"Mazen El-Hefnawy\\\",\\\"CustomerMobile\\\":\\\"+201020800367\\\",\\\"CustomerEmail\\\":\\\"mazen@pioneers-solutions.com\\\",\\\"UserDefinedField\\\":null,\\\"InvoiceDisplayValue\\\":\\\"5,138.000 SR\\\",\\\"InvoiceItems\\\":[{\\\"ItemName\\\":\\\"\\\\u0627\\\\u064a\\\\u0641\\\\u0648\\\\u0646 12 128 \\\\u062c\\\\u064a\\\\u062c\\\\u0627 \\\\u0627\\\\u0628\\\\u064a\\\\u0636\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":410.049,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u062a\\\\u0643\\\\u0627\\\\u0644\\\\u064a\\\\u0641 \\\\u0627\\\\u0644\\\\u0634\\\\u062d\\\\u0646\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":3.16,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u062a\\\\u0643\\\\u0644\\\\u0641\\\\u0629 \\\\u0627\\\\u0644\\\\u0647\\\\u062f\\\\u064a\\\\u0629\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":3.16,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null}],\\\"InvoiceTransactions\\\":[{\\\"TransactionDate\\\":\\\"2021-06-28T14:45:19.243\\\",\\\"PaymentGateway\\\":\\\"Visa\\\\/Master Direct 3DS Flow\\\",\\\"ReferenceId\\\":\\\"060668389454771163_3D\\\",\\\"TrackId\\\":\\\"28-06-2021_547711\\\",\\\"TransactionId\\\":\\\"060668389454771163\\\",\\\"PaymentId\\\":\\\"060668389454771163\\\",\\\"AuthorizationId\\\":\\\"194648\\\",\\\"TransactionStatus\\\":\\\"Succss\\\",\\\"TransationValue\\\":\\\"416.369\\\",\\\"CustomerServiceCharge\\\":\\\"10.510\\\",\\\"DueValue\\\":\\\"426.880\\\",\\\"PaidCurrency\\\":\\\"KD\\\",\\\"PaidCurrencyValue\\\":\\\"426.880\\\",\\\"Currency\\\":\\\"KD\\\",\\\"Error\\\":null,\\\"CardNumber\\\":\\\"545301xxxxxx5539\\\"}],\\\"Suppliers\\\":[]}\"', 'paid', '060668389454771163', '2021-06-28 14:43:04', '2021-06-28 12:42:20', '2021-06-28 12:43:04'),
('93ca19bd-96a8-43e8-8d55-db1369af2aea', 'my_fatoorah', 242, 1.15, 4, '{\"user\": {\"id\": 242, \"logo\": \"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\", \"email\": \"q@q.q\", \"phone\": \"8596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"can_cash\": 1, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23T18:21:29.000000Z\", \"first_name\": null, \"tax_number\": \"30097655446886545\", \"updated_at\": \"2021-06-17T05:36:40.000000Z\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 3, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"commercial_register\": \"4123456789\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 1.15, \"address\": {\"id\": 171, \"address\": \"المنورةااا\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-23T22:43:32.000000Z\", \"updated_at\": \"2021-05-04T09:47:53.000000Z\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 1.15, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 0}', '2663316', '\"{\\\"InvoiceId\\\":2663316,\\\"InvoiceStatus\\\":\\\"Paid\\\",\\\"InvoiceReference\\\":\\\"2021000007\\\",\\\"CustomerReference\\\":null,\\\"CreatedDate\\\":\\\"2021-06-29T13:26:23\\\",\\\"ExpiryDate\\\":\\\"July 2, 2021\\\",\\\"InvoiceValue\\\":1.15,\\\"Comments\\\":null,\\\"CustomerName\\\":\\\"\\\\u0634\\\\u0631\\\\u0643\\\\u0629 \\\\u0633\\\\u064a\\\\u0646 \\\\u0627\\\\u0644\\\\u062a\\\\u062c\\\\u0627\\\\u0631\\\\u0629\\\",\\\"CustomerMobile\\\":\\\"+9668596656679\\\",\\\"CustomerEmail\\\":\\\"q@q.q\\\",\\\"UserDefinedField\\\":null,\\\"InvoiceDisplayValue\\\":\\\"1.150 SR\\\",\\\"InvoiceItems\\\":[{\\\"ItemName\\\":\\\"\\\\u0628\\\\u0627\\\\u0648\\\\u0631\\\\u0648\\\\u0644\\\\u0648\\\\u062c\\\\u064a \\\\u0643\\\\u064a\\\\u0628\\\\u0644 \\\\u0644\\\\u0627\\\\u064a\\\\u062a\\\\u0646\\\\u063a 1.2 \\\\u0645\\\\u062a\\\\u0631 (\\\\u0623\\\\u062d\\\\u0645\\\\u0631)\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":1.15,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u062a\\\\u0643\\\\u0627\\\\u0644\\\\u064a\\\\u0641 \\\\u0627\\\\u0644\\\\u0634\\\\u062d\\\\u0646\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":0,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null}],\\\"InvoiceTransactions\\\":[{\\\"TransactionDate\\\":\\\"2021-06-29T13:26:38.423\\\",\\\"PaymentGateway\\\":\\\"Apple Pay (Mada)\\\",\\\"ReferenceId\\\":\\\"07072663316274890973\\\",\\\"TrackId\\\":\\\"29-06-2021_2748909\\\",\\\"TransactionId\\\":\\\"07072663316274890973\\\",\\\"PaymentId\\\":\\\"07072663316274890973\\\",\\\"AuthorizationId\\\":\\\"07072663316274890973\\\",\\\"TransactionStatus\\\":\\\"InProgress\\\",\\\"TransationValue\\\":\\\"1.150\\\",\\\"CustomerServiceCharge\\\":\\\"0.000\\\",\\\"DueValue\\\":\\\"1.150\\\",\\\"PaidCurrency\\\":\\\"SR\\\",\\\"PaidCurrencyValue\\\":\\\"1.150\\\",\\\"Currency\\\":\\\"SR\\\",\\\"Error\\\":null,\\\"CardNumber\\\":null},{\\\"TransactionDate\\\":\\\"2021-06-29T13:27:43.8\\\",\\\"PaymentGateway\\\":\\\"Apple Pay (Mada)\\\",\\\"ReferenceId\\\":\\\"07072663316274891973\\\",\\\"TrackId\\\":\\\"29-06-2021_2748919\\\",\\\"TransactionId\\\":\\\"07072663316274891973\\\",\\\"PaymentId\\\":\\\"07072663316274891973\\\",\\\"AuthorizationId\\\":\\\"07072663316274891973\\\",\\\"TransactionStatus\\\":\\\"InProgress\\\",\\\"TransationValue\\\":\\\"1.150\\\",\\\"CustomerServiceCharge\\\":\\\"0.000\\\",\\\"DueValue\\\":\\\"1.150\\\",\\\"PaidCurrency\\\":\\\"SR\\\",\\\"PaidCurrencyValue\\\":\\\"1.150\\\",\\\"Currency\\\":\\\"SR\\\",\\\"Error\\\":null,\\\"CardNumber\\\":null},{\\\"TransactionDate\\\":\\\"2021-06-29T13:26:40.877\\\",\\\"PaymentGateway\\\":\\\"Apple Pay (Mada)\\\",\\\"ReferenceId\\\":\\\"07072663316274891073\\\",\\\"TrackId\\\":\\\"29-06-2021_2748910\\\",\\\"TransactionId\\\":\\\"07072663316274891073\\\",\\\"PaymentId\\\":\\\"07072663316274891073\\\",\\\"AuthorizationId\\\":\\\"07072663316274891073\\\",\\\"TransactionStatus\\\":\\\"Failed\\\",\\\"TransationValue\\\":\\\"1.150\\\",\\\"CustomerServiceCharge\\\":\\\"0.000\\\",\\\"DueValue\\\":\\\"1.150\\\",\\\"PaidCurrency\\\":\\\"SR\\\",\\\"PaidCurrencyValue\\\":\\\"1.150\\\",\\\"Currency\\\":\\\"SR\\\",\\\"Error\\\":\\\"Value \'3000000478\' is invalid. No valid Merchant Acquirer Relationship available\\\",\\\"CardNumber\\\":null},{\\\"TransactionDate\\\":\\\"2021-06-29T13:27:15.737\\\",\\\"PaymentGateway\\\":\\\"Apple Pay (Mada)\\\",\\\"ReferenceId\\\":\\\"07072663316274891173\\\",\\\"TrackId\\\":\\\"29-06-2021_2748911\\\",\\\"TransactionId\\\":\\\"07072663316274891173\\\",\\\"PaymentId\\\":\\\"07072663316274891173\\\",\\\"AuthorizationId\\\":\\\"07072663316274891173\\\",\\\"TransactionStatus\\\":\\\"Failed\\\",\\\"TransationValue\\\":\\\"1.150\\\",\\\"CustomerServiceCharge\\\":\\\"0.000\\\",\\\"DueValue\\\":\\\"1.150\\\",\\\"PaidCurrency\\\":\\\"SR\\\",\\\"PaidCurrencyValue\\\":\\\"1.150\\\",\\\"Currency\\\":\\\"SR\\\",\\\"Error\\\":\\\"Value \'3000000478\' is invalid. No valid Merchant Acquirer Relationship available\\\",\\\"CardNumber\\\":null},{\\\"TransactionDate\\\":\\\"2021-06-29T13:27:47.72\\\",\\\"PaymentGateway\\\":\\\"Apple Pay\\\",\\\"ReferenceId\\\":\\\"07072663316274892073\\\",\\\"TrackId\\\":\\\"29-06-2021_2748920\\\",\\\"TransactionId\\\":\\\"07072663316274892073\\\",\\\"PaymentId\\\":\\\"07072663316274892073\\\",\\\"AuthorizationId\\\":\\\"07072663316274892073\\\",\\\"TransactionStatus\\\":\\\"InProgress\\\",\\\"TransationValue\\\":\\\"1.150\\\",\\\"CustomerServiceCharge\\\":\\\"0.000\\\",\\\"DueValue\\\":\\\"1.150\\\",\\\"PaidCurrency\\\":\\\"SR\\\",\\\"PaidCurrencyValue\\\":\\\"1.150\\\",\\\"Currency\\\":\\\"SR\\\",\\\"Error\\\":null,\\\"CardNumber\\\":null},{\\\"TransactionDate\\\":\\\"2021-06-29T13:28:11.19\\\",\\\"PaymentGateway\\\":\\\"Apple Pay\\\",\\\"ReferenceId\\\":\\\"07072663316274892173\\\",\\\"TrackId\\\":\\\"29-06-2021_2748921\\\",\\\"TransactionId\\\":\\\"R5Z6J2\\\",\\\"PaymentId\\\":\\\"07072663316274892173\\\",\\\"AuthorizationId\\\":\\\"912899\\\",\\\"TransactionStatus\\\":\\\"Succss\\\",\\\"TransationValue\\\":\\\"1.150\\\",\\\"CustomerServiceCharge\\\":\\\"0.000\\\",\\\"DueValue\\\":\\\"1.150\\\",\\\"PaidCurrency\\\":\\\"SR\\\",\\\"PaidCurrencyValue\\\":\\\"1.150\\\",\\\"Currency\\\":\\\"SR\\\",\\\"Error\\\":null,\\\"CardNumber\\\":null}],\\\"Suppliers\\\":[]}\"', 'paid', '07072663316274892173', '2021-06-29 13:25:59', '2021-06-29 11:24:05', '2021-06-29 11:25:59'),
('93ca1eda-670f-40ac-9e5d-9d996e622c80', 'my_fatoorah', 242, 1.15, 4, '{\"user\": {\"id\": 242, \"logo\": \"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\", \"email\": \"q@q.q\", \"phone\": \"8596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"can_cash\": 1, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23T18:21:29.000000Z\", \"first_name\": null, \"tax_number\": \"30097655446886545\", \"updated_at\": \"2021-06-17T05:36:40.000000Z\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 3, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"commercial_register\": \"4123456789\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 1.15, \"address\": {\"id\": 171, \"address\": \"المنورةااا\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-23T22:43:32.000000Z\", \"updated_at\": \"2021-05-04T09:47:53.000000Z\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 1.15, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 0}', '2663503', NULL, 'pending', NULL, NULL, '2021-06-29 11:38:23', '2021-06-29 11:38:25'),
('93ca2e7b-757a-4558-855e-ab70c202c4ed', 'my_fatoorah', 242, 1.15, 4, '{\"user\": {\"id\": 242, \"logo\": \"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\", \"email\": \"q@q.q\", \"phone\": \"8596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"can_cash\": 1, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23T18:21:29.000000Z\", \"first_name\": null, \"tax_number\": \"30097655446886545\", \"updated_at\": \"2021-06-17T05:36:40.000000Z\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 3, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"commercial_register\": \"4123456789\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 1.15, \"address\": {\"id\": 171, \"address\": \"المنورةااا\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-23T22:43:32.000000Z\", \"updated_at\": \"2021-05-04T09:47:53.000000Z\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 1.15, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 0}', '2663801', NULL, 'pending', NULL, NULL, '2021-06-29 12:22:05', '2021-06-29 12:22:08'),
('93ca89e2-562f-4dd4-bb28-909c822bc427', 'my_fatoorah', 242, 1.15, 4, '{\"user\": {\"id\": 242, \"logo\": \"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\", \"email\": \"q@q.q\", \"phone\": \"8596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"can_cash\": 1, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23T18:21:29.000000Z\", \"first_name\": null, \"tax_number\": \"30097655446886545\", \"updated_at\": \"2021-06-17T05:36:40.000000Z\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 3, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"commercial_register\": \"4123456789\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 1.15, \"address\": {\"id\": 171, \"address\": \"المنورةااا\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-23T22:43:32.000000Z\", \"updated_at\": \"2021-05-04T09:47:53.000000Z\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 1.15, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 0}', '2666224', NULL, 'pending', NULL, NULL, '2021-06-29 16:37:39', '2021-06-29 16:37:42'),
('93ca9ef9-8372-46bd-bd12-1b76eb251869', 'my_fatoorah', 242, 1.15, 4, '{\"user\": {\"id\": 242, \"logo\": \"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\", \"email\": \"q@q.q\", \"phone\": \"8596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"can_cash\": 1, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23T18:21:29.000000Z\", \"first_name\": null, \"tax_number\": \"30097655446886545\", \"updated_at\": \"2021-06-17T05:36:40.000000Z\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 3, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"commercial_register\": \"4123456789\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 1.15, \"address\": {\"id\": 171, \"address\": \"المنورةااا\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-23T22:43:32.000000Z\", \"updated_at\": \"2021-05-04T09:47:53.000000Z\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 1.15, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 0}', '2666817', NULL, 'pending', NULL, NULL, '2021-06-29 17:36:38', '2021-06-29 17:36:41'),
('93cb1e85-c139-45b9-a4f9-82d9790c129f', 'my_fatoorah', 272, 5214, 4, '{\"user\": {\"id\": 272, \"logo\": null, \"email\": \"d@dd.d\", \"phone\": \"596656679\", \"gender\": null, \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 47, \"can_cash\": 1, \"is_active\": 1, \"last_name\": \"ddd\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-05-25T13:29:38.000000Z\", \"first_name\": \"ddd\", \"tax_number\": null, \"updated_at\": \"2021-05-25T13:29:38.000000Z\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 157, \"account_number\": null, \"authorized_person\": null, \"commercial_register\": null, \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 5214, \"address\": {\"id\": 184, \"address\": \"ggg\", \"city_id\": 56, \"user_id\": 272, \"zone_id\": 47, \"country_id\": 1, \"created_at\": \"2021-05-25T13:31:27.000000Z\", \"updated_at\": \"2021-05-25T13:31:27.000000Z\", \"government_id\": 11}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"ايفون 12 برو 128 جيجا ذهبي\", \"item_photo\": \"1623020259a57a845f-a76e-43a4-a391-8d58dd3058c6.png\", \"item_price\": 5060, \"product_id\": 4240, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للهواتف من بروتكشن برو\", \"item_photo\": \"1614279988للهواتف-01-01.jpg\", \"item_price\": 113.85, \"product_id\": 653, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 5175, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 39, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 33.91}', '2670760', NULL, 'pending', NULL, NULL, '2021-06-29 23:33:17', '2021-06-29 23:33:20'),
('93cc0205-6f54-4123-9fa6-b3a9437894d7', 'my_fatoorah', 242, 1.15, 4, '{\"user\": {\"id\": 242, \"logo\": \"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\", \"email\": \"q@q.q\", \"phone\": \"8596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"can_cash\": 1, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23T18:21:29.000000Z\", \"first_name\": null, \"tax_number\": \"30097655446886545\", \"updated_at\": \"2021-06-17T05:36:40.000000Z\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 3, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"commercial_register\": \"4123456789\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 1.15, \"address\": {\"id\": 171, \"address\": \"المنورةااا\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-23T22:43:32.000000Z\", \"updated_at\": \"2021-05-04T09:47:53.000000Z\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 1.15, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 0}', '2673941', NULL, 'pending', NULL, NULL, '2021-06-30 10:09:25', '2021-06-30 10:09:28'),
('93cc0a97-f893-4c74-a259-4bfd8d71065b', 'my_fatoorah', 242, 4830, 4, '{\"user\": {\"id\": 242, \"logo\": \"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\", \"email\": \"q@q.q\", \"phone\": \"8596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"can_cash\": 1, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23T18:21:29.000000Z\", \"first_name\": null, \"tax_number\": \"30097655446886545\", \"updated_at\": \"2021-06-17T05:36:40.000000Z\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 3, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"commercial_register\": \"4123456789\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 4830, \"address\": {\"id\": 171, \"address\": \"المنورةااا\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-23T22:43:32.000000Z\", \"updated_at\": \"2021-05-04T09:47:53.000000Z\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"ايفون 12 برو 128 جيجا ذهبي\", \"item_photo\": \"1623020259a57a845f-a76e-43a4-a391-8d58dd3058c6.png\", \"item_price\": 4830, \"product_id\": 4240, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 4830, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 0}', '2674074', NULL, 'pending', NULL, NULL, '2021-06-30 10:33:23', '2021-06-30 10:33:26'),
('93cc1a59-014d-437c-922f-fd15cf45937a', 'my_fatoorah', 242, 33.35, 4, '{\"user\": {\"id\": 242, \"logo\": \"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\", \"email\": \"q@q.q\", \"phone\": \"8596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"can_cash\": 1, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23T18:21:29.000000Z\", \"first_name\": null, \"tax_number\": \"30097655446886545\", \"updated_at\": \"2021-06-17T05:36:40.000000Z\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 3, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"commercial_register\": \"4123456789\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 33.35, \"address\": {\"id\": 171, \"address\": \"المنورةااا\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-23T22:43:32.000000Z\", \"updated_at\": \"2021-05-04T09:47:53.000000Z\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15T19:28:08.000000Z\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03T04:51:00.000000Z\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"ايباد برو 2020، 12.9 بوصة، واي فاي، 512 جيجا، فضي\", \"item_photo\": \"1617885527cClUaKP8Q3He583DEBMM1vFGPQGIdeYG4fzzf7Ks.jpg\", \"item_price\": 33.35, \"product_id\": 3130, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 33.35, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true, \"untaxed_shipping\": 0}', '2674350', NULL, 'pending', NULL, NULL, '2021-06-30 11:17:26', '2021-06-30 11:17:29'),
('941d6660-ef1e-4455-a06f-aaf7f31984cb', 'my_fatoorah', 242, 273.7, 4, '{\"is_address_saved\":true,\"is_valid\":true,\"user\":{\"id\":242,\"first_name\":null,\"last_name\":null,\"email\":\"q@q.q\",\"phone\":\"596656679\",\"phone_code_id\":157,\"gender\":\"1\",\"birth_date\":null,\"user_status\":null,\"country_id\":1,\"city_id\":63,\"zone_id\":84,\"government_id\":13,\"created_at\":\"2021-03-23T18:21:29.000000Z\",\"updated_at\":\"2021-07-10T12:22:13.000000Z\",\"is_newsletter_subscripe\":0,\"address\":null,\"is_active\":1,\"is_ban\":0,\"provider_id\":null,\"is_merchant\":1,\"company_name\":\"\\u0634\\u0631\\u0643\\u0629 Test\",\"authorized_person\":\"\\u0639\\u0644\\u064a \\u062d\\u0633\\u0646 \\u0627\\u0644\\u0634\\u0645\\u0631\\u0627\\u0646\\u064a\",\"account_number\":\"121111\",\"prices_level\":2,\"has_forward_account\":1,\"commercial_register\":\"1111111111\",\"tax_number\":\"00001111000011111\",\"logo\":\"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\",\"can_cash\":1},\"payment_type\":\"my_fatoorah\",\"address\":{\"id\":171,\"address\":\"\\u0634\\u0627\\u0631\\u0639 \\u0627\\u0644\\u0627\\u0645\\u0627\\u0645 \\u0628\\u062e\\u0627\\u0631\\u064a\",\"user_id\":242,\"country_id\":1,\"government_id\":13,\"city_id\":63,\"zone_id\":84,\"created_at\":\"2021-03-23T22:43:32.000000Z\",\"updated_at\":\"2021-08-08T14:17:48.000000Z\"},\"products\":[{\"product_id\":6020,\"item_photo\":\"1625680102788DFCE9-DD1D-4309-B3DC-4663A740E378.jpeg\",\"item_name\":\"\\u0633\\u0645\\u0627\\u0639\\u0629 \\u0633\\u0644\\u0643\\u064a\\u0629 \\u0627\\u0628\\u0644 \\u0627\\u0628\\u064a\\u0636 \\u0644\\u0627\\u064a\\u062a\\u0646\\u064a\\u0646\\u062c\",\"quantity\":1,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":102.35},{\"product_id\":6027,\"item_photo\":\"1625513281848061070132.jpg\",\"item_name\":\"\\u0628\\u0637\\u0627\\u0631\\u064a\\u0629 \\u0645\\u062a\\u0646\\u0642\\u0644\\u0647 20100 \\u0645\\u0644\\u064a \\u0627\\u0645\\u0628\\u064a\\u0631 \\u0627\\u0646\\u0643\\u0631 \\u0627\\u0633\\u0648\\u062f \\u0645\\u0646\\u0641\\u0630\\u064a\\u0646\",\"quantity\":1,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":126.5}],\"discount\":0,\"shipping_price\":44.85,\"coupon_code\":\"\",\"subtotal\":228.85,\"tax_percentage\":15,\"untaxed_shipping\":39,\"currency\":{\"id\":4,\"name_ar\":\"\\u0631.\\u0633 \\ud83c\\uddf8\\ud83c\\udde6\",\"name_en\":\"SR \\ud83c\\uddf8\\ud83c\\udde6\",\"code\":\"SAR\",\"symbol\":\"SR\",\"value\":1,\"status\":1,\"is_deafult\":1,\"created_at\":\"2020-06-15T19:28:08.000000Z\",\"updated_at\":\"2021-06-30T19:25:34.000000Z\"},\"total\":273.7}', '3103036', NULL, 'pending', NULL, NULL, '2021-08-09 21:12:07', '2021-08-09 21:12:07'),
('941d68aa-61a8-4d37-97a2-37ac8daea135', 'my_fatoorah', 242, 139.15, 4, '{\"is_address_saved\":true,\"is_valid\":true,\"user\":{\"id\":242,\"first_name\":null,\"last_name\":null,\"email\":\"q@q.q\",\"phone\":\"596656679\",\"phone_code_id\":157,\"gender\":\"1\",\"birth_date\":null,\"user_status\":null,\"country_id\":1,\"city_id\":63,\"zone_id\":84,\"government_id\":13,\"created_at\":\"2021-03-23T18:21:29.000000Z\",\"updated_at\":\"2021-07-10T12:22:13.000000Z\",\"is_newsletter_subscripe\":0,\"address\":null,\"is_active\":1,\"is_ban\":0,\"provider_id\":null,\"is_merchant\":1,\"company_name\":\"\\u0634\\u0631\\u0643\\u0629 Test\",\"authorized_person\":\"\\u0639\\u0644\\u064a \\u062d\\u0633\\u0646 \\u0627\\u0644\\u0634\\u0645\\u0631\\u0627\\u0646\\u064a\",\"account_number\":\"121111\",\"prices_level\":2,\"has_forward_account\":1,\"commercial_register\":\"1111111111\",\"tax_number\":\"00001111000011111\",\"logo\":\"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\",\"can_cash\":1},\"payment_type\":\"my_fatoorah\",\"address\":{\"id\":171,\"address\":\"\\u0634\\u0627\\u0631\\u0639 \\u0627\\u0644\\u0627\\u0645\\u0627\\u0645 \\u0628\\u062e\\u0627\\u0631\\u064a\",\"user_id\":242,\"country_id\":1,\"government_id\":13,\"city_id\":63,\"zone_id\":84,\"created_at\":\"2021-03-23T22:43:32.000000Z\",\"updated_at\":\"2021-08-08T14:17:48.000000Z\"},\"products\":[{\"product_id\":6013,\"item_photo\":\"16255111447946044826448.jpg\",\"item_name\":\"\\u0628\\u0637\\u0627\\u0631\\u064a\\u0629 \\u0645\\u062a\\u0646\\u0642\\u0644\\u0647 10000\\u0645\\u0644\\u064a \\u0627\\u0645\\u0628\\u064a\\u0631 \\u0628\\u0627\\u0648\\u0631\\u0627\\u0648\\u0644\\u0648\\u0642\\u064a \\u0627\\u0633\\u0648\\u062f \\u0628\\u0645\\u0646\\u0641\\u0630\\u064a\\u0646\",\"quantity\":1,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":94.3}],\"discount\":0,\"shipping_price\":44.85,\"coupon_code\":\"\",\"subtotal\":94.3,\"tax_percentage\":15,\"untaxed_shipping\":39,\"currency\":{\"id\":4,\"name_ar\":\"\\u0631.\\u0633 \\ud83c\\uddf8\\ud83c\\udde6\",\"name_en\":\"SR \\ud83c\\uddf8\\ud83c\\udde6\",\"code\":\"SAR\",\"symbol\":\"SR\",\"value\":1,\"status\":1,\"is_deafult\":1,\"created_at\":\"2020-06-15T19:28:08.000000Z\",\"updated_at\":\"2021-06-30T19:25:34.000000Z\"},\"total\":139.15}', '3103078', NULL, 'pending', NULL, NULL, '2021-08-09 21:18:29', '2021-08-09 21:18:29');
INSERT INTO `transactions` (`id`, `payment_method`, `user_id`, `amount`, `currency_id`, `payload`, `invoice_id`, `invoice_data`, `status`, `txn_id`, `processed_at`, `created_at`, `updated_at`) VALUES
('941e7e36-c06a-4144-9d59-999263b8904c', 'my_fatoorah', 242, 63.25, 4, '{\"is_address_saved\":true,\"is_valid\":true,\"user\":{\"id\":242,\"first_name\":null,\"last_name\":null,\"email\":\"q@q.q\",\"phone\":\"596656679\",\"phone_code_id\":157,\"gender\":\"1\",\"birth_date\":null,\"user_status\":null,\"country_id\":1,\"city_id\":63,\"zone_id\":84,\"government_id\":13,\"created_at\":\"2021-03-23T18:21:29.000000Z\",\"updated_at\":\"2021-07-10T12:22:13.000000Z\",\"is_newsletter_subscripe\":0,\"address\":null,\"is_active\":1,\"is_ban\":0,\"provider_id\":null,\"is_merchant\":1,\"company_name\":\"\\u0634\\u0631\\u0643\\u0629 Test\",\"authorized_person\":\"\\u0639\\u0644\\u064a \\u062d\\u0633\\u0646 \\u0627\\u0644\\u0634\\u0645\\u0631\\u0627\\u0646\\u064a\",\"account_number\":\"121111\",\"prices_level\":2,\"has_forward_account\":1,\"commercial_register\":\"1111111111\",\"tax_number\":\"00001111000011111\",\"logo\":\"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\",\"can_cash\":1},\"payment_type\":\"my_fatoorah\",\"address\":{\"id\":171,\"address\":\"\\u0634\\u0627\\u0631\\u0639 \\u0627\\u0644\\u0627\\u0645\\u0627\\u0645 \\u0628\\u062e\\u0627\\u0631\\u064a\",\"user_id\":242,\"country_id\":1,\"government_id\":13,\"city_id\":63,\"zone_id\":84,\"created_at\":\"2021-03-23T22:43:32.000000Z\",\"updated_at\":\"2021-08-08T14:17:48.000000Z\"},\"products\":[{\"product_id\":6109,\"item_photo\":\"16256843526083749655766.jpg\",\"item_name\":\"\\u0643\\u064a\\u0628\\u0644 \\u0628\\u0627\\u0648\\u0631\\u0627\\u0648\\u0644\\u0648\\u062c\\u064a \\u0642\\u0645\\u0627\\u0634 \\u064a\\u0648 \\u0627\\u0633 \\u0628\\u064a - \\u062a\\u0627\\u064a\\u0628 \\u0633\\u064a 1.2\\u0645 - \\u0627\\u0633\\u0648\\u062f\",\"quantity\":1,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":18.4}],\"discount\":0,\"shipping_price\":44.85,\"coupon_code\":\"\",\"subtotal\":18.4,\"tax_percentage\":15,\"untaxed_shipping\":39,\"currency\":{\"id\":4,\"name_ar\":\"\\u0631.\\u0633 \\ud83c\\uddf8\\ud83c\\udde6\",\"name_en\":\"SR \\ud83c\\uddf8\\ud83c\\udde6\",\"code\":\"SAR\",\"symbol\":\"SR\",\"value\":1,\"status\":1,\"is_deafult\":1,\"created_at\":\"2020-06-15T19:28:08.000000Z\",\"updated_at\":\"2021-06-30T19:25:34.000000Z\"},\"total\":63.25}', '3106823', NULL, 'pending', NULL, NULL, '2021-08-10 10:14:34', '2021-08-10 10:14:35'),
('941e99d5-3868-4f19-a981-e3098aa1c297', 'my_fatoorah', 242, 46, 4, '{\"is_address_saved\":true,\"is_valid\":true,\"user\":{\"id\":242,\"first_name\":null,\"last_name\":null,\"email\":\"q@q.q\",\"phone\":\"596656679\",\"phone_code_id\":157,\"gender\":\"1\",\"birth_date\":null,\"user_status\":null,\"country_id\":1,\"city_id\":63,\"zone_id\":84,\"government_id\":13,\"created_at\":\"2021-03-23T18:21:29.000000Z\",\"updated_at\":\"2021-07-10T12:22:13.000000Z\",\"is_newsletter_subscripe\":0,\"address\":null,\"is_active\":1,\"is_ban\":0,\"provider_id\":null,\"is_merchant\":1,\"company_name\":\"\\u0634\\u0631\\u0643\\u0629 Test\",\"authorized_person\":\"\\u0639\\u0644\\u064a \\u062d\\u0633\\u0646 \\u0627\\u0644\\u0634\\u0645\\u0631\\u0627\\u0646\\u064a\",\"account_number\":\"121111\",\"prices_level\":2,\"has_forward_account\":1,\"commercial_register\":\"1111111111\",\"tax_number\":\"00001111000011111\",\"logo\":\"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\",\"can_cash\":1},\"payment_type\":\"my_fatoorah\",\"address\":{\"id\":171,\"address\":\"\\u0634\\u0627\\u0631\\u0639 \\u0627\\u0644\\u0627\\u0645\\u0627\\u0645 \\u0628\\u062e\\u0627\\u0631\\u064a\",\"user_id\":242,\"country_id\":1,\"government_id\":13,\"city_id\":63,\"zone_id\":84,\"created_at\":\"2021-03-23T22:43:32.000000Z\",\"updated_at\":\"2021-08-08T14:17:48.000000Z\"},\"products\":[{\"product_id\":6093,\"item_photo\":\"1625681113850017782303-3.png\",\"item_name\":\"\\u0645\\u0644\\u0642\\u0637 \\u0644\\u0644\\u062a\\u0631\\u0643\\u064a\\u0628\",\"quantity\":1,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":1.15}],\"discount\":0,\"shipping_price\":44.85,\"coupon_code\":\"\",\"subtotal\":1.15,\"tax_percentage\":15,\"untaxed_shipping\":39,\"currency\":{\"id\":4,\"name_ar\":\"\\u0631.\\u0633 \\ud83c\\uddf8\\ud83c\\udde6\",\"name_en\":\"SR \\ud83c\\uddf8\\ud83c\\udde6\",\"code\":\"SAR\",\"symbol\":\"SR\",\"value\":1,\"status\":1,\"is_deafult\":1,\"created_at\":\"2020-06-15T19:28:08.000000Z\",\"updated_at\":\"2021-06-30T19:25:34.000000Z\"},\"total\":46}', '3107315', NULL, 'pending', NULL, NULL, '2021-08-10 11:31:48', '2021-08-10 11:31:48'),
('941e9a7c-855a-41d7-9915-0b4bb410f2a9', 'my_fatoorah', 242, 1.15, 4, '{\"is_address_saved\":false,\"is_valid\":true,\"user\":{\"id\":242,\"first_name\":null,\"last_name\":null,\"email\":\"q@q.q\",\"phone\":\"596656679\",\"phone_code_id\":157,\"gender\":\"1\",\"birth_date\":null,\"user_status\":null,\"country_id\":1,\"city_id\":63,\"zone_id\":84,\"government_id\":13,\"created_at\":\"2021-03-23T18:21:29.000000Z\",\"updated_at\":\"2021-07-10T12:22:13.000000Z\",\"is_newsletter_subscripe\":0,\"address\":null,\"is_active\":1,\"is_ban\":0,\"provider_id\":null,\"is_merchant\":1,\"company_name\":\"\\u0634\\u0631\\u0643\\u0629 Test\",\"authorized_person\":\"\\u0639\\u0644\\u064a \\u062d\\u0633\\u0646 \\u0627\\u0644\\u0634\\u0645\\u0631\\u0627\\u0646\\u064a\",\"account_number\":\"121111\",\"prices_level\":2,\"has_forward_account\":1,\"commercial_register\":\"1111111111\",\"tax_number\":\"00001111000011111\",\"logo\":\"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\",\"can_cash\":1},\"payment_type\":\"my_fatoorah\",\"address\":{\"user_id\":242,\"country_id\":\"7\",\"government_id\":\"21\",\"city_id\":\"74\",\"zone_id\":\"198\",\"address\":\"\\u062a\\u0627\\u0632\"},\"products\":[{\"product_id\":6093,\"item_photo\":\"1625681113850017782303-3.png\",\"item_name\":\"\\u0645\\u0644\\u0642\\u0637 \\u0644\\u0644\\u062a\\u0631\\u0643\\u064a\\u0628\",\"quantity\":1,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":1.15}],\"discount\":0,\"shipping_price\":0,\"coupon_code\":\"\",\"subtotal\":1.15,\"tax_percentage\":\"15\",\"untaxed_shipping\":0,\"currency\":{\"id\":4,\"name_ar\":\"\\u0631.\\u0633 \\ud83c\\uddf8\\ud83c\\udde6\",\"name_en\":\"SR \\ud83c\\uddf8\\ud83c\\udde6\",\"code\":\"SAR\",\"symbol\":\"SR\",\"value\":1,\"status\":1,\"is_deafult\":1,\"created_at\":\"2020-06-15T19:28:08.000000Z\",\"updated_at\":\"2021-06-30T19:25:34.000000Z\"},\"total\":1.15}', '3107329', '\"{\\\"InvoiceId\\\":3107329,\\\"InvoiceStatus\\\":\\\"Paid\\\",\\\"InvoiceReference\\\":\\\"2021000032\\\",\\\"CustomerReference\\\":null,\\\"CreatedDate\\\":\\\"2021-08-10T13:37:06.89\\\",\\\"ExpiryDate\\\":\\\"August 13, 2021\\\",\\\"InvoiceValue\\\":1.15,\\\"Comments\\\":null,\\\"CustomerName\\\":\\\"\\\\u0634\\\\u0631\\\\u0643\\\\u0629 Test\\\",\\\"CustomerMobile\\\":\\\"+966596656679\\\",\\\"CustomerEmail\\\":\\\"q@q.q\\\",\\\"UserDefinedField\\\":null,\\\"InvoiceDisplayValue\\\":\\\"1.150 SR\\\",\\\"InvoiceItems\\\":[{\\\"ItemName\\\":\\\"\\\\u0645\\\\u0644\\\\u0642\\\\u0637 \\\\u0644\\\\u0644\\\\u062a\\\\u0631\\\\u0643\\\\u064a\\\\u0628\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":1.15,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u062a\\\\u0643\\\\u0627\\\\u0644\\\\u064a\\\\u0641 \\\\u0627\\\\u0644\\\\u0634\\\\u062d\\\\u0646\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":0,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null}],\\\"InvoiceTransactions\\\":[{\\\"TransactionDate\\\":\\\"2021-08-10T13:37:12.953\\\",\\\"PaymentGateway\\\":\\\"Apple Pay (Mada)\\\",\\\"ReferenceId\\\":\\\"07073107329323613872\\\",\\\"TrackId\\\":\\\"10-08-2021_3236138\\\",\\\"TransactionId\\\":\\\"07073107329323613872\\\",\\\"PaymentId\\\":\\\"07073107329323613872\\\",\\\"AuthorizationId\\\":\\\"07073107329323613872\\\",\\\"TransactionStatus\\\":\\\"InProgress\\\",\\\"TransationValue\\\":\\\"1.150\\\",\\\"CustomerServiceCharge\\\":\\\"0.000\\\",\\\"DueValue\\\":\\\"1.150\\\",\\\"PaidCurrency\\\":\\\"SR\\\",\\\"PaidCurrencyValue\\\":\\\"1.150\\\",\\\"Currency\\\":\\\"SR\\\",\\\"Error\\\":null,\\\"CardNumber\\\":null,\\\"ErrorCode\\\":\\\"\\\"},{\\\"TransactionDate\\\":\\\"2021-08-10T13:37:27.5\\\",\\\"PaymentGateway\\\":\\\"Apple Pay (Mada)\\\",\\\"ReferenceId\\\":\\\"07073107329323614171\\\",\\\"TrackId\\\":\\\"10-08-2021_3236141\\\",\\\"TransactionId\\\":\\\"SCGS91\\\",\\\"PaymentId\\\":\\\"07073107329323614171\\\",\\\"AuthorizationId\\\":\\\"732659\\\",\\\"TransactionStatus\\\":\\\"Succss\\\",\\\"TransationValue\\\":\\\"1.150\\\",\\\"CustomerServiceCharge\\\":\\\"0.000\\\",\\\"DueValue\\\":\\\"1.150\\\",\\\"PaidCurrency\\\":\\\"SR\\\",\\\"PaidCurrencyValue\\\":\\\"1.150\\\",\\\"Currency\\\":\\\"SR\\\",\\\"Error\\\":null,\\\"CardNumber\\\":null,\\\"ErrorCode\\\":\\\"\\\"}],\\\"Suppliers\\\":[]}\"', 'paid', '07073107329323614171', '2021-08-10 13:33:59', '2021-08-10 11:33:37', '2021-08-10 11:34:00'),
('941e9d1b-ecac-422f-b342-989eec8ee8f0', 'my_fatoorah', 242, 1.15, 4, '{\"is_address_saved\":true,\"is_valid\":true,\"user\":{\"id\":242,\"first_name\":null,\"last_name\":null,\"email\":\"q@q.q\",\"phone\":\"596656679\",\"phone_code_id\":157,\"gender\":\"1\",\"birth_date\":null,\"user_status\":null,\"country_id\":1,\"city_id\":63,\"zone_id\":84,\"government_id\":13,\"created_at\":\"2021-03-23T18:21:29.000000Z\",\"updated_at\":\"2021-07-10T12:22:13.000000Z\",\"is_newsletter_subscripe\":0,\"address\":null,\"is_active\":1,\"is_ban\":0,\"provider_id\":null,\"is_merchant\":1,\"company_name\":\"\\u0634\\u0631\\u0643\\u0629 Test\",\"authorized_person\":\"\\u0639\\u0644\\u064a \\u062d\\u0633\\u0646 \\u0627\\u0644\\u0634\\u0645\\u0631\\u0627\\u0646\\u064a\",\"account_number\":\"121111\",\"prices_level\":2,\"has_forward_account\":1,\"commercial_register\":\"1111111111\",\"tax_number\":\"00001111000011111\",\"logo\":\"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\",\"can_cash\":1},\"payment_type\":\"my_fatoorah\",\"address\":{\"id\":192,\"address\":\"\\u062a\\u0627\\u0632\",\"user_id\":242,\"country_id\":7,\"government_id\":21,\"city_id\":74,\"zone_id\":198,\"created_at\":\"2021-08-10T10:34:00.000000Z\",\"updated_at\":\"2021-08-10T10:34:00.000000Z\"},\"products\":[{\"product_id\":6093,\"item_photo\":\"1625681113850017782303-3.png\",\"item_name\":\"\\u0645\\u0644\\u0642\\u0637 \\u0644\\u0644\\u062a\\u0631\\u0643\\u064a\\u0628\",\"quantity\":1,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":1.15}],\"discount\":0,\"shipping_price\":0,\"coupon_code\":\"\",\"subtotal\":1.15,\"tax_percentage\":\"15\",\"untaxed_shipping\":0,\"currency\":{\"id\":4,\"name_ar\":\"\\u0631.\\u0633 \\ud83c\\uddf8\\ud83c\\udde6\",\"name_en\":\"SR \\ud83c\\uddf8\\ud83c\\udde6\",\"code\":\"SAR\",\"symbol\":\"SR\",\"value\":1,\"status\":1,\"is_deafult\":1,\"created_at\":\"2020-06-15T19:28:08.000000Z\",\"updated_at\":\"2021-06-30T19:25:34.000000Z\"},\"total\":1.15}', '3107387', '\"{\\\"InvoiceId\\\":3107387,\\\"InvoiceStatus\\\":\\\"Paid\\\",\\\"InvoiceReference\\\":\\\"2021000033\\\",\\\"CustomerReference\\\":null,\\\"CreatedDate\\\":\\\"2021-08-10T13:44:26.92\\\",\\\"ExpiryDate\\\":\\\"August 13, 2021\\\",\\\"InvoiceValue\\\":1.15,\\\"Comments\\\":null,\\\"CustomerName\\\":\\\"\\\\u0634\\\\u0631\\\\u0643\\\\u0629 Test\\\",\\\"CustomerMobile\\\":\\\"+966596656679\\\",\\\"CustomerEmail\\\":\\\"q@q.q\\\",\\\"UserDefinedField\\\":null,\\\"InvoiceDisplayValue\\\":\\\"1.150 SR\\\",\\\"InvoiceItems\\\":[{\\\"ItemName\\\":\\\"\\\\u0645\\\\u0644\\\\u0642\\\\u0637 \\\\u0644\\\\u0644\\\\u062a\\\\u0631\\\\u0643\\\\u064a\\\\u0628\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":1.15,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u062a\\\\u0643\\\\u0627\\\\u0644\\\\u064a\\\\u0641 \\\\u0627\\\\u0644\\\\u0634\\\\u062d\\\\u0646\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":0,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null}],\\\"InvoiceTransactions\\\":[{\\\"TransactionDate\\\":\\\"2021-08-10T13:44:33.8\\\",\\\"PaymentGateway\\\":\\\"Apple Pay (Mada)\\\",\\\"ReferenceId\\\":\\\"07073107387323621772\\\",\\\"TrackId\\\":\\\"10-08-2021_3236217\\\",\\\"TransactionId\\\":\\\"07073107387323621772\\\",\\\"PaymentId\\\":\\\"07073107387323621772\\\",\\\"AuthorizationId\\\":\\\"07073107387323621772\\\",\\\"TransactionStatus\\\":\\\"InProgress\\\",\\\"TransationValue\\\":\\\"1.150\\\",\\\"CustomerServiceCharge\\\":\\\"0.000\\\",\\\"DueValue\\\":\\\"1.150\\\",\\\"PaidCurrency\\\":\\\"SR\\\",\\\"PaidCurrencyValue\\\":\\\"1.150\\\",\\\"Currency\\\":\\\"SR\\\",\\\"Error\\\":null,\\\"CardNumber\\\":null,\\\"ErrorCode\\\":\\\"\\\"},{\\\"TransactionDate\\\":\\\"2021-08-10T13:44:46.367\\\",\\\"PaymentGateway\\\":\\\"Apple Pay (Mada)\\\",\\\"ReferenceId\\\":\\\"07073107387323621872\\\",\\\"TrackId\\\":\\\"10-08-2021_3236218\\\",\\\"TransactionId\\\":\\\"SCKR20\\\",\\\"PaymentId\\\":\\\"07073107387323621872\\\",\\\"AuthorizationId\\\":\\\"748900\\\",\\\"TransactionStatus\\\":\\\"Succss\\\",\\\"TransationValue\\\":\\\"1.150\\\",\\\"CustomerServiceCharge\\\":\\\"0.000\\\",\\\"DueValue\\\":\\\"1.150\\\",\\\"PaidCurrency\\\":\\\"SR\\\",\\\"PaidCurrencyValue\\\":\\\"1.150\\\",\\\"Currency\\\":\\\"SR\\\",\\\"Error\\\":null,\\\"CardNumber\\\":null,\\\"ErrorCode\\\":\\\"\\\"}],\\\"Suppliers\\\":[]}\"', 'paid', '07073107387323621872', '2021-08-10 13:41:18', '2021-08-10 11:40:57', '2021-08-10 11:41:18'),
('b724c0fa-5139-4143-a07b-07ce9d121751', 'my_fatoorah', 262, 1.15, 4, '{\"user\": {\"id\": 262, \"email\": \"p@p.p\", \"phone\": \"0599865163\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-28 18:07:23\", \"first_name\": null, \"updated_at\": \"2021-04-08 18:25:12\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة تجربة\", \"prices_level\": 1, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"457777\", \"authorized_person\": \"علي احمد\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 1.15, \"address\": {\"id\": 172, \"address\": \"الاسكان\", \"city_id\": 63, \"user_id\": 262, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-28 19:05:17\", \"updated_at\": \"2021-03-28 19:05:17\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 1.15, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"18\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true}', '612437', NULL, 'pending', NULL, NULL, '2021-04-11 14:07:53', '2021-04-11 14:07:53'),
('c486a9ea-81f7-4d4b-a23e-b14640ad8b6f', 'my_fatoorah', 242, 278.3, 4, '{\"user\": {\"id\": 242, \"email\": \"q@q.q\", \"phone\": \"0596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23 21:21:29\", \"first_name\": null, \"updated_at\": \"2021-04-04 20:38:33\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 1, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 278.3, \"address\": {\"address\": \"ال\", \"city_id\": \"62\", \"user_id\": 242, \"zone_id\": \"83\", \"country_id\": \"1\", \"government_id\": \"13\"}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"كيبل للايفون بمدخل PD  من شركة موفي\", \"item_photo\": \"1617829391s7oULNI1MBLWqWA4yk1O2LTX1LSl6BDTYuGFAY3Q.jpg\", \"item_price\": 113.85, \"product_id\": 3117, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل شحن يو اس بي - سي إلى لايتنغ 1.2 متر (أسود)\", \"item_photo\": \"16157509101605605047_0001 (4)-650x650.jpg\", \"item_price\": 31.05, \"product_id\": 1416, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أبيض)\", \"item_photo\": \"16157506091605605447_0001 (6)-650x650.jpg\", \"item_price\": 20.7, \"product_id\": 1414, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل سمعيات يو اس بي - سي إلى أيه يو أكس (1.2 م)\", \"item_photo\": \"16157507781605606057_0001 (9)-650x650.jpg\", \"item_price\": 40.25, \"product_id\": 1415, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل شحن يو اس بي - سي إلى لايتنغ 1.2 متر (أسود)\", \"item_photo\": \"16157509101605605047_0001 (4)-650x650.jpg\", \"item_price\": 31.05, \"product_id\": 1419, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 238.05, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"19\", \"shipping_price\": 40.25, \"tax_percentage\": 15, \"is_address_saved\": false}', '615957', NULL, 'pending', NULL, NULL, '2021-04-16 12:30:15', '2021-04-16 12:30:15'),
('c568f8ad-85b7-4d70-a93c-d76172e9524f', 'my_fatoorah', 262, 63.25, 4, '{\"user\": {\"id\": 262, \"email\": \"p@p.p\", \"phone\": \"0599865163\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 62, \"zone_id\": 67, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-28 18:07:23\", \"first_name\": null, \"updated_at\": \"2021-03-28 18:07:44\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة تجربة\", \"prices_level\": 2, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"457777\", \"authorized_person\": \"علي احمد\", \"is_newsletter_subscripe\": 0}, \"total\": 63.25, \"address\": {\"address\": \"bbbb\", \"city_id\": \"56\", \"user_id\": 262, \"zone_id\": \"48\", \"country_id\": \"1\", \"government_id\": \"11\"}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أبيض)\", \"item_photo\": \"16157506091605605447_0001 (6)-650x650.jpg\", \"item_price\": 23, \"product_id\": 1414, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 23, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"18\", \"shipping_price\": 40.25, \"tax_percentage\": 15, \"is_address_saved\": false}', '602702', NULL, 'pending', NULL, NULL, '2021-03-28 16:51:34', '2021-03-28 16:51:34'),
('c8350071-9e5c-4c76-b07b-165aa5bab221', 'my_fatoorah', 225, 14175.57, 4, '{\"user\": {\"id\": 225, \"email\": \"cust@cust.com\", \"phone\": \"01020750779\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 47, \"is_active\": 1, \"last_name\": \"test\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-28 17:50:02\", \"first_name\": \"etazm\", \"updated_at\": \"2021-03-21 18:15:31\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"is_newsletter_subscripe\": 0}, \"total\": 14175.57, \"address\": {\"address\": \"test\", \"city_id\": \"56\", \"user_id\": 225, \"zone_id\": \"47\", \"country_id\": \"1\", \"government_id\": \"11\"}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للتابلت و الاجهزة اللوحية من بروتكشن برو\", \"item_photo\": \"1614282346Untitled-طمكتختحخعت-03.jpg\", \"item_price\": 26.45, \"product_id\": 656, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"تغليف حراري شفاف للابتوب و الاجهزة المحمولة من بروتكشن برو\", \"item_photo\": \"1614281917lfpihawpf[o [-02.jpg\", \"item_price\": 40.25, \"product_id\": 655, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري للكاميرات من بروتكشن برو\", \"item_photo\": \"1614282898Untitled-y-04.jpg\", \"item_price\": 113.85, \"product_id\": 629, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للسماعات من بروتكشن برو\", \"item_photo\": \"1614283843rt-04.jpg\", \"item_price\": 113.85, \"product_id\": 630, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من نمبر ون\", \"item_photo\": \"1614281289ماكينة نمبر ون الامريكية.jpg\", \"item_price\": 4023.85, \"product_id\": 654, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"ماكينة للتغليف الحراري من بروتكشن برو (صغيرة)\", \"item_photo\": \"1614278322الصغيرة.jpg\", \"item_price\": 4271.4335, \"product_id\": 628, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 4, \"item_name\": \"تغليف حراري شفاف للهواتف من بروتكشن برو\", \"item_photo\": \"1614279988للهواتف-01-01.jpg\", \"item_price\": 28.75, \"product_id\": 653, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري خشبي محروق من نمبر ون\", \"item_photo\": \"1614285810خشبي محروق-01.jpg\", \"item_price\": 171.35, \"product_id\": 632, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 5, \"item_name\": \"باورلوجي شاحن حائط 65 واط بـ3 منافذ (أسود)\", \"item_photo\": \"16157499291608122858_Powerol222-650x650.jpg\", \"item_price\": 171.35, \"product_id\": 1408, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 90.85, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 14135.317, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"21\", \"shipping_price\": 40.25, \"tax_percentage\": 15, \"is_address_saved\": false}', NULL, NULL, 'pending', NULL, NULL, '2021-03-28 15:44:53', '2021-03-28 15:44:53'),
('d2b519ac-c065-4a8e-bcdc-414427df2b76', 'my_fatoorah', 262, 1.15, 4, '{\"user\": {\"id\": 262, \"email\": \"p@p.p\", \"phone\": \"0599865163\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-28 18:07:23\", \"first_name\": null, \"updated_at\": \"2021-04-05 16:12:42\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة تجربة\", \"prices_level\": 1, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"457777\", \"authorized_person\": \"علي احمد\", \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 1.15, \"address\": {\"id\": 172, \"address\": \"الاسكان\", \"city_id\": 63, \"user_id\": 262, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-28 19:05:17\", \"updated_at\": \"2021-03-28 19:05:17\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 1.15, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"20\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true}', '608116', NULL, 'pending', NULL, NULL, '2021-04-05 14:24:34', '2021-04-05 14:24:35'),
('dc857f6a-1c64-4834-8bd3-ccb02a96daa0', 'my_fatoorah', 242, 1.15, 4, '{\"user\": {\"id\": 242, \"email\": \"q@q.q\", \"phone\": \"0596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23 21:21:29\", \"first_name\": null, \"updated_at\": \"2021-04-17 04:51:24\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 1, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 1.15, \"address\": {\"id\": 171, \"address\": \"المنورة\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-24 01:43:32\", \"updated_at\": \"2021-03-24 01:43:32\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 1.15, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"21\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true}', '628554', NULL, 'pending', NULL, NULL, '2021-04-20 23:44:18', '2021-04-20 23:44:19'),
('e1c0c424-5b3c-4801-bb28-b06780657ccf', 'my_fatoorah', 262, 42.55, 4, '{\"user\": {\"id\": 262, \"email\": \"p@p.p\", \"phone\": \"0599865163\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 62, \"zone_id\": 67, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-28 18:07:23\", \"first_name\": null, \"updated_at\": \"2021-03-28 18:07:44\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة تجربة\", \"prices_level\": 2, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"457777\", \"authorized_person\": \"علي احمد\", \"is_newsletter_subscripe\": 0}, \"total\": 42.55, \"address\": {\"address\": \"الاسكان\", \"city_id\": \"63\", \"user_id\": 262, \"zone_id\": \"84\", \"country_id\": \"1\", \"government_id\": \"13\"}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أبيض)\", \"item_photo\": \"16157506091605605447_0001 (6)-650x650.jpg\", \"item_price\": 2.3, \"product_id\": 1414, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 2.3, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"19\", \"shipping_price\": 40.25, \"tax_percentage\": 15, \"is_address_saved\": false}', '602672', NULL, 'pending', NULL, NULL, '2021-03-28 16:14:50', '2021-03-28 16:14:50'),
('e263c2c7-5450-4b20-826e-1991f543f0c1', 'my_fatoorah', 242, 60639.32, 4, '{\"user\": {\"id\": 242, \"logo\": \"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\", \"email\": \"q@q.q\", \"phone\": \"8596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"can_cash\": 0, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23 21:21:29\", \"first_name\": null, \"tax_number\": \"30097655446886545\", \"updated_at\": \"2021-05-20 18:58:14\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 1, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"commercial_register\": \"4123456789\", \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 60639.32, \"address\": {\"id\": 171, \"address\": \"المنورةااا\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-24 01:43:32\", \"updated_at\": \"2021-05-04 12:47:53\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"abc18\", \"item_photo\": \"1617885527cClUaKP8Q3He583DEBMM1vFGPQGIdeYG4fzzf7Ks.jpg\", \"item_price\": 10.35, \"product_id\": 3130, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"abc07\", \"item_photo\": \"1617829719dt5cCKElbBw8sQ3MCuU6Mbb4rfm0gm4eukom5Rkw.png\", \"item_price\": 171.35, \"product_id\": 3119, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورلوجي شاحن حائط 65 واط بـ3 منافذ (أسود)\", \"item_photo\": \"16157499291608122858_Powerol222-650x650.jpg\", \"item_price\": 112.7, \"product_id\": 1408, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"Powerology Universal Travel Adapter with Power Delivery 2.4A + PD 18W ( Black )\", \"item_photo\": \"161720011616157499291608122858_Powerol222-650x650.jpg\", \"item_price\": 86.25, \"product_id\": 1409, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للسماعات من بروتكشن برو\", \"item_photo\": \"1614283843rt-04.jpg\", \"item_price\": 43.125, \"product_id\": 630, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"Starter Kit hhggtttyyy\", \"item_photo\": \"1614277587الكبيرة.jpg\", \"item_price\": 17961.9075, \"product_id\": 626, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"Express Starter Kit\", \"item_photo\": \"1614277949الوسط.jpg\", \"item_price\": 6133.3295, \"product_id\": 627, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"Lite Starter Kit\", \"item_photo\": \"1614278322الصغيرة.jpg\", \"item_price\": 4271.4335, \"product_id\": 628, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"Elephant  Cover\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4336, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من نمبر ون\", \"item_photo\": \"1614281289ماكينة نمبر ون الامريكية.jpg\", \"item_price\": 3448.85, \"product_id\": 654, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 60605.966, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 33.35, \"tax_percentage\": 15, \"is_address_saved\": true}', NULL, NULL, 'pending', NULL, NULL, '2021-05-23 10:25:39', '2021-05-23 10:25:39'),
('e419ef21-3bdb-4314-8e80-d4bb540ed73e', 'my_fatoorah', 242, 1.15, 4, '{\"user\": {\"id\": 242, \"email\": \"q@q.q\", \"phone\": \"0596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23 21:21:29\", \"first_name\": null, \"updated_at\": \"2021-03-28 00:19:53\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 1, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"is_newsletter_subscripe\": 0}, \"total\": 1.15, \"address\": {\"id\": 171, \"address\": \"المنورة\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-24 01:43:32\", \"updated_at\": \"2021-03-24 01:43:32\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 1.15, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"18\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true}', '602758', NULL, 'pending', NULL, NULL, '2021-03-28 21:14:56', '2021-03-28 21:14:56'),
('e8f96706-b337-43bc-8132-6f5859594193', 'my_fatoorah', 225, 108.1, 4, '{\"user\": {\"id\": 225, \"email\": \"cust@cust.com\", \"phone\": \"01020750779\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 47, \"is_active\": 1, \"last_name\": \"test\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-28 17:50:02\", \"first_name\": \"etazm\", \"updated_at\": \"2021-03-21 18:15:31\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 108.1, \"address\": {\"id\": 175, \"address\": \"test\", \"city_id\": 56, \"user_id\": 225, \"zone_id\": 49, \"country_id\": 1, \"created_at\": \"2021-04-08 11:17:17\", \"updated_at\": \"2021-04-08 11:17:17\", \"government_id\": 11}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"حافظة السوائل الذكية من برودو 500 مل - خيارات متعددة\", \"item_photo\": \"1617830160YYuZZUUokN7McrYTfQKfDGkaVugODmK0nUMfsC6s.jpg\", \"item_price\": 67.85, \"product_id\": 3121, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 67.85, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"21\", \"shipping_price\": 40.25, \"tax_percentage\": 15, \"is_address_saved\": true}', '610814', NULL, 'pending', NULL, NULL, '2021-04-08 19:40:21', '2021-04-08 19:40:26'),
('eb4cc760-f5d1-4a21-9a2d-08e6f5ca067e', 'my_fatoorah', 262, 34.5, 4, '{\"user\": {\"id\": 262, \"email\": \"p@p.p\", \"phone\": \"0599865163\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-28 18:07:23\", \"first_name\": null, \"updated_at\": \"2021-04-05 17:37:42\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة تجربة\", \"prices_level\": 1, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"457777\", \"authorized_person\": \"علي احمد\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 34.5, \"address\": {\"id\": 172, \"address\": \"الاسكان\", \"city_id\": 63, \"user_id\": 262, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-28 19:05:17\", \"updated_at\": \"2021-03-28 19:05:17\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"تغليف حراري للكاميرات من بروتكشن برو\", \"item_photo\": \"1614282898Untitled-y-04.jpg\", \"item_price\": 34.5, \"product_id\": 629, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 34.5, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"21\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true}', '609427', NULL, 'pending', NULL, NULL, '2021-04-07 11:11:39', '2021-04-07 11:11:39');
INSERT INTO `transactions` (`id`, `payment_method`, `user_id`, `amount`, `currency_id`, `payload`, `invoice_id`, `invoice_data`, `status`, `txn_id`, `processed_at`, `created_at`, `updated_at`) VALUES
('ed48fb25-e995-4066-baf7-68f1b261c257', 'my_fatoorah', 242, 40116.6, 4, '{\"user\": {\"id\": 242, \"logo\": \"16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg\", \"email\": \"q@q.q\", \"phone\": \"8596656679\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"can_cash\": 0, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-23 21:21:29\", \"first_name\": null, \"tax_number\": \"30097655446886545\", \"updated_at\": \"2021-05-20 18:58:14\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة سين التجارة\", \"prices_level\": 1, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"121111\", \"authorized_person\": \"علي احمد محمد\", \"commercial_register\": \"4123456789\", \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 40116.6, \"address\": {\"id\": 171, \"address\": \"المنورةااا\", \"city_id\": 63, \"user_id\": 242, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-24 01:43:32\", \"updated_at\": \"2021-05-04 12:47:53\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 2, \"item_name\": \"ماكينة للتغليف الحراري من بروتكشن برو (وسط)\", \"item_photo\": \"1614277949الوسط.jpg\", \"item_price\": 6133.3295, \"product_id\": 627, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"شاحن ساعة ابل مغناطيسي - 1متر من آبل - ابيض\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4353, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"كيبل لايتنينج من باوراولجي -1.2 متر - جلد اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4352, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"سوار تتبع اللياقة البدنية من شركة شاومي - مي باند 4  - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4355, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"كيبل شركة انكر مايكرو يو اس بي 0.90 متر - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4354, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"طابعة كوداك مع قاعدة  لهواتف الأندرويد و IOS\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4357, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"سوار تتبع اللياقة البدنية من شركة شاومي - مي باند 3  - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4356, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"كيبل  من وولنيت تايب سي تو تايب سي ابيض 1.2م\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4359, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 3, \"item_name\": \"بطارية متنقلة من شركة وولنيت 10000ملي امبير اسود لماع\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4358, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 3, \"item_name\": \"كيبل باوراولجي تايب سي تو تايب سي 1.2م\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4361, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"بطارية متنقلة من وولنيت 20000 ملي امبير\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4360, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 3, \"item_name\": \"بطارية متنقلة من فيفا مدريد 20000ملي امبير\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4363, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"بطارية متنقلة من فيفا مدريد 10000ملي امبير\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4362, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"حقيبة تخزين  من برودو- جيشي اخضر غامق\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4366, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"حقيبة تخزين  من برودو- اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4365, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"حقيبة تخزين  من برودو- رمادي\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4368, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"حقيبة تخزين  من برودو- جيشي اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4367, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"حقيبة تخزين  من برودو-  جيشي ازرق\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4370, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"حقيبة تخزين  من برودو- جيشي اخضر\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4369, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كابل مايكرو يو اس بي من وولنيت مترين - ابيض\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4372, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كابل مايكرو يو اس بي من وولنيت مترين - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4371, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كابل مايكرو يو اس بي من وولنيت 1.2م - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4374, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كابل مايكرو يو اس بي من وولنيت 1.2م - ابيض\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4373, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"شاحن متنقل وايرلس من وولنيت 10000ملي امبير  (بي - دي)\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4376, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كابل يو اس بي - تايب سي من وولنيت 1.2م - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4375, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بطارية متنقلة من شركة انكر باور كور 15600 مللى امبير\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4342, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بطارية متنقلة من شركة أنكر باور كور 2 20000 مللى امبير- ابيض\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4341, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بطارية متنقلة راف باور 10050 مللي أمبير مع آي سمارت , لون اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4344, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بطارية متنقلة من شركة انكر باور كور 13000 مللى امبير - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4343, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بطارية متنقلة من شركة وولنيت 10000 ملي امبير\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4346, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بطارية متنقلة من شركة وولنيت  20000 مللى امبير\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4345, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كيبل من شركة وولنيت تايب سي - تايب سي 1.2 م (اسود)\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4348, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بطارية متنقلة من شركة وولنيت  12000 مللى امبير\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4347, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بكج 3 كيابل لايتنينج  من راف باور - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4350, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كيبل شركة راف بور  لايتنينج - 1 متر - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4349, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"محول سماعات اذن بمنفذ جاك يو اس بي من نوع سي 3.5 ملم من هواوي\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4351, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"حقيبة تخزين  من برودو - ازرق\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4364, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كيبل  يو اس بي تو تايب سي -  من باور اولجي 1.2 متر\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4378, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"موماكس مرآة وشاحن لاسلكي مع سبيكر\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4377, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك فليكس تايب سي تو لايتنينج – 30 سم - احمر\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4380, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك هالو كيبل لايتنينق مع منظم لأجهزة الايفون بطول 1.2 - احمر\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4379, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك- بطارية متنقلة 10000 ملي امبير - شحن لاسلكي - بمنفذ - يو اس بي - تايب سي-  بتقنية PD-اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4382, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك فليكس تايب سي تو لايتنينج – 30 سم – ازرق\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4381, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك هايد - بطارية متنقلة  بسعة 10000 ملي امبير بمنفذ - يو اس بي - تايب سي  بتقنية PD - ازرق\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4384, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك - بطارية متنقلة 10000 ملي امبير - شحن لاسلكي - بمنفذ - يو اس بي - تايب سي-  بتقنية - ازرق\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4383, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك هالو كيبل USB-C مع منظم بطول 1.2 متر – اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4386, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك هالو كيبل USB-C مع منظم بطول 1.2 متر – ازرق\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4385, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك فليكس تايب سي تو لايتنينج – 30 سم – رمادي\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4388, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك- بطارية متنقلة 10000 ملي امبير - شحن لاسلكي - بمنفذ - يو اس بي - تايب سي-  بتقنية PD-احمر\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4387, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ميزان باوراولوجي الذكي مع شاشة عرض - ابيض\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4414, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كابل تايب سي تو أي يو اكس من باوراولوقي بطول 1.2م - رمادي\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4413, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"برودو حافظة السوائل الذكية بسعة 500 مل -  اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4416, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كابل من شركة موفي تايب سي - لايتنينج قماش - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4415, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"برودو حافظة السوائل الذكية بسعة 500 مل - احمر\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4418, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"برودو حافظة السوائل الذكية بسعة 500 مل - اخضر\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4417, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"برودو حافظة السوائل الذكية بسعة 500 مل برتقالي\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4420, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"برودو حافظة السوائل الذكية بسعة 500 مل ازرق سماوي\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4419, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بكج اكس بانثر VIP للايفون 12\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4422, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كابل يو أس بي تو لايتينينج من باور اولوقي بطول 3 متر - ابيض\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4421, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بكج اكس بانثر VIP للايفون 12 ميني\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4424, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بكج اكس بانثر VIP للايفون 12 برو\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4423, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك هالو كيبل USB-C - lighting مع منظم بطول 1.2 متر – اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4390, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك هالو كيبل USB-C - lighting مع منظم بطول 1.2 متر – ازرق\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4389, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك هالو كيبل USB - lighting  مع منظم بطول 1.2 متر – اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4392, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك هالو كيبل USB - lighting  مع منظم بطول 1.2 متر – ازرق\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4391, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك هالو كيبل USB-C - lighting  بطول 1.2 متر – احمر\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4394, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك هالو كيبل USB-C - lighting  بطول 1.2 متر – وردي\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4393, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كابل اتش دي الى اتش دي بطول 1.2 من برودو\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4396, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"يونيك هالو كيبل USB-C - lighting  بطول 1.2 متر – اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4395, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ستكر للشاشة من شركة Green 2.5 خصوصية لايفون 11 برو\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4398, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ستكر للشاشة من شركة Green 2.5 خصوصية لايفون 11\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4397, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ستكر للشاشة من شركة Green 3D خصوصية لايفون 11\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4400, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ستكر للشاشة من شركة Green 2.5 خصوصية لايفون 11 برو ماكس\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4399, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كيبل شركة راف بور  مايكرو يو اس بي - 1 متر - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4426, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بكج اكس بانثر VIP للايفون 12 برو ماكس\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4425, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بكج 5 كيابل مايكرو يو اس بي  من راف باور - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4428, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كيبل شركة راف بور تايب سي تو يو اس بي - 1 متر - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4427, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كابل من شركة بيلكن بطول مترين مايكرو يو اس بي - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4429, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أبيض)\", \"item_photo\": \"16157506091605605447_0001 (6)-650x650.jpg\", \"item_price\": 20.7, \"product_id\": 1414, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ايباد برو 2020، 12.9 بوصة، واي فاي، 512 جيجا، فضي\", \"item_photo\": \"1617885527cClUaKP8Q3He583DEBMM1vFGPQGIdeYG4fzzf7Ks.jpg\", \"item_price\": 10.35, \"product_id\": 3130, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للتابلت و الاجهزة اللوحية من بروتكشن برو\", \"item_photo\": \"1614282346Untitled-طمكتختحخعت-03.jpg\", \"item_price\": 26.45, \"product_id\": 656, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"التغليف الحراري للساعات والاساور من بروتكشن برو\", \"item_photo\": \"1614282648التغليف الحراري للساعات من بروتكشن-04.jpg\", \"item_price\": 26.45, \"product_id\": 647, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل شحن يو اس بي - سي إلى لايتنغ 1.2 متر (أسود)\", \"item_photo\": \"16157509101605605047_0001 (4)-650x650.jpg\", \"item_price\": 31.05, \"product_id\": 1416, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري كاربون فايبر احمر من نمبر ون\", \"item_photo\": \"1614285171كاربون فايبر احمر-01.jpg\", \"item_price\": 27.6, \"product_id\": 658, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ستكر للشاشة من شركة Green لايفون 11\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4402, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ستكر للشاشة من شركة Green 3D خصوصية لايفون 11 برو\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4401, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ستكر للشاشة من شركة Green لايفون 11 برو ماكس\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4404, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ستكر للشاشة من شركة Green لايفون 11 برو\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4403, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بطارية متنقلة من شركة برودو 10000 ملي امبير 18 واط مع منفذPD - فضي\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4406, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بطارية متنقلة من شركة برودو 10000 ملي امبير 18 واط مع منفذPD - احمر\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4405, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"حقيبة من شركة باوراولوقي 8 ف1 شاحن 10000ملي امبير لا سلكي + كابل تايب سي يو اس بي +كابل تايب سي - لايتينينج+ كابل تايب سي تو تايب سي + ادابتر بيت وادابتر سيارة\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4408, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بطارية متنقلة من شركة برودو 10000 ملي امبير 18 واط مع منفذPD - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4407, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كابل تايب سي تو لايتينينج من باور اولوقي بطول 3 متر - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4410, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كابل يو أس بي تو لايتينينج من باور اولوقي بطول 3 متر - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4409, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كابل لايتنينج تو أي يو اكس من باوراولوقي بطول 1.2م - رمادي\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4412, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"بكج من باور اولوقي كابلين تايب سي بطول ( 0.25 +0.9 ) - اسود\", \"item_photo\": \"\", \"item_price\": 0, \"product_id\": 4411, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"شاحن جداري ثلاثي بمدخل PD بقوة 61 وات   من باور اولجي\", \"item_photo\": \"1617829579Uo3oE98Vu4VhqvRHfy0ZaqqpNaPeZLLfSpeQvuI0.png\", \"item_price\": 171.35, \"product_id\": 3118, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري ليد التحكم و الكونسل من بروتكشن برو\", \"item_photo\": \"1614283511dfd-04.jpg\", \"item_price\": 115, \"product_id\": 633, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورلوجي شاحن حائط 156 واط بـ4 منافذ (أسود)\", \"item_photo\": \"16157500851608122858_Powerol222-650x650.jpg\", \"item_price\": 184, \"product_id\": 1410, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"شاحن صغير  لسيارة 4.8أمبير 24 واط Powerology  - أسود\", \"item_photo\": \"1617829719dt5cCKElbBw8sQ3MCuU6Mbb4rfm0gm4eukom5Rkw.png\", \"item_price\": 171.35, \"product_id\": 3119, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"شاحن جداري من راف باور  برايم بمنفذين USB وبقوة 17 وات\", \"item_photo\": \"1617755420ay8fLgBpauyKLQvfHUmnHJkNQeIGulBRr7mPyphO.jpg\", \"item_price\": 286.35, \"product_id\": 2916, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"سماعة من شركة بيلكن بمنفذ لايتنينج  - ابيض\", \"item_photo\": \"16177552683f5VyUkfKsI2maxOdRC3fJVBsX17dWncSB8PobCg.jpg\", \"item_price\": 286.35, \"product_id\": 2914, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من بروتكشن برو (صغيرة)\", \"item_photo\": \"1614278322الصغيرة.jpg\", \"item_price\": 4271.4335, \"product_id\": 628, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من نمبر ون\", \"item_photo\": \"1614281289ماكينة نمبر ون الامريكية.jpg\", \"item_price\": 3448.85, \"product_id\": 654, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من بروتكشن برو ( كبيرة)\", \"item_photo\": \"1614277587الكبيرة.jpg\", \"item_price\": 17961.9075, \"product_id\": 626, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري للكاميرات من بروتكشن برو\", \"item_photo\": \"1614282898Untitled-y-04.jpg\", \"item_price\": 34.5, \"product_id\": 629, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل شحن يو اس بي - سي إلى لايتنغ 1.2 متر (أسود)\", \"item_photo\": \"16157509101605605047_0001 (4)-650x650.jpg\", \"item_price\": 31.05, \"product_id\": 1419, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل سمعيات يو اس بي - سي إلى أيه يو أكس (1.2 م)\", \"item_photo\": \"16157507781605606057_0001 (9)-650x650.jpg\", \"item_price\": 40.25, \"product_id\": 1415, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للابتوب و الاجهزة المحمولة من بروتكشن برو\", \"item_photo\": \"1614281917lfpihawpf[o [-02.jpg\", \"item_price\": 40.25, \"product_id\": 655, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للهواتف من بروتكشن برو\", \"item_photo\": \"1614279988للهواتف-01-01.jpg\", \"item_price\": 43.125, \"product_id\": 653, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للسماعات من بروتكشن برو\", \"item_photo\": \"1614283843rt-04.jpg\", \"item_price\": 43.125, \"product_id\": 630, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري خشبي محروق من نمبر ون\", \"item_photo\": \"1614285810خشبي محروق-01.jpg\", \"item_price\": 85.1, \"product_id\": 632, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"سماعة من شركة بيلكن بمنفذ لايتنينج\", \"item_photo\": \"1617755147ERZ64UHAChBhoFWDUXKet863y0nLLMCTfPesMtAI.jpg\", \"item_price\": 44.85, \"product_id\": 2913, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"شاحن سفر متعدد الاستخدامات 2.4 امبير + بي دي 45 واط - اسود، من باورولوجي\", \"item_photo\": \"16157498191608122858_Powerol222-650x650.jpg\", \"item_price\": 101.2, \"product_id\": 1407, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"محول السفر العالمي باورولوجي مع توصيل طاقة 2.4 أمبير + PD 18 وات (أسود)\", \"item_photo\": \"161720011616157499291608122858_Powerol222-650x650.jpg\", \"item_price\": 86.25, \"product_id\": 1409, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كيبل للايفون بمدخل PD  من شركة موفي\", \"item_photo\": \"1617829391s7oULNI1MBLWqWA4yk1O2LTX1LSl6BDTYuGFAY3Q.jpg\", \"item_price\": 113.85, \"product_id\": 3117, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورلوجي شاحن حائط 65 واط بـ3 منافذ (أسود)\", \"item_photo\": \"16157499291608122858_Powerol222-650x650.jpg\", \"item_price\": 112.7, \"product_id\": 1408, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 40083.24999999999, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"shipping_price\": 33.35, \"tax_percentage\": 15, \"is_address_saved\": true}', '648252', NULL, 'pending', NULL, NULL, '2021-05-20 16:58:29', '2021-05-20 16:58:30'),
('efad66b8-95a1-46a1-9aa2-6c6cb7554d53', 'my_fatoorah', 225, 14175.57, 4, '{\"user\": {\"id\": 225, \"email\": \"cust@cust.com\", \"phone\": \"01020750779\", \"gender\": \"ذكر\", \"is_ban\": 0, \"address\": null, \"city_id\": 56, \"zone_id\": 47, \"is_active\": 1, \"last_name\": \"test\", \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-02-28 17:50:02\", \"first_name\": \"etazm\", \"updated_at\": \"2021-03-21 18:15:31\", \"is_merchant\": 0, \"provider_id\": null, \"user_status\": null, \"company_name\": null, \"prices_level\": 5, \"government_id\": 11, \"phone_code_id\": 57, \"account_number\": null, \"authorized_person\": null, \"is_newsletter_subscripe\": 0}, \"total\": 14175.57, \"address\": {\"address\": \"test\", \"city_id\": \"56\", \"user_id\": 225, \"zone_id\": \"47\", \"country_id\": \"1\", \"government_id\": \"11\"}, \"currency\": {\"id\": 4, \"code\": \"SR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للتابلت و الاجهزة اللوحية من بروتكشن برو\", \"item_photo\": \"1614282346Untitled-طمكتختحخعت-03.jpg\", \"item_price\": 26.45, \"product_id\": 656, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"تغليف حراري شفاف للابتوب و الاجهزة المحمولة من بروتكشن برو\", \"item_photo\": \"1614281917lfpihawpf[o [-02.jpg\", \"item_price\": 40.25, \"product_id\": 655, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري للكاميرات من بروتكشن برو\", \"item_photo\": \"1614282898Untitled-y-04.jpg\", \"item_price\": 113.85, \"product_id\": 629, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للسماعات من بروتكشن برو\", \"item_photo\": \"1614283843rt-04.jpg\", \"item_price\": 113.85, \"product_id\": 630, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من نمبر ون\", \"item_photo\": \"1614281289ماكينة نمبر ون الامريكية.jpg\", \"item_price\": 4023.85, \"product_id\": 654, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 2, \"item_name\": \"ماكينة للتغليف الحراري من بروتكشن برو (صغيرة)\", \"item_photo\": \"1614278322الصغيرة.jpg\", \"item_price\": 4271.4335, \"product_id\": 628, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 4, \"item_name\": \"تغليف حراري شفاف للهواتف من بروتكشن برو\", \"item_photo\": \"1614279988للهواتف-01-01.jpg\", \"item_price\": 28.75, \"product_id\": 653, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري خشبي محروق من نمبر ون\", \"item_photo\": \"1614285810خشبي محروق-01.jpg\", \"item_price\": 171.35, \"product_id\": 632, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 5, \"item_name\": \"باورلوجي شاحن حائط 65 واط بـ3 منافذ (أسود)\", \"item_photo\": \"16157499291608122858_Powerol222-650x650.jpg\", \"item_price\": 171.35, \"product_id\": 1408, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 90.85, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 14135.317, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"21\", \"shipping_price\": 40.25, \"tax_percentage\": 15, \"is_address_saved\": false}', NULL, NULL, 'pending', NULL, NULL, '2021-03-28 15:41:59', '2021-03-28 15:41:59'),
('f3454cfc-0a39-40a0-a79d-0901bafcda55', 'my_fatoorah', 262, 503.7, 4, '{\"user\": {\"id\": 262, \"email\": \"p@p.p\", \"phone\": \"0599865163\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-28 18:07:23\", \"first_name\": null, \"updated_at\": \"2021-04-08 18:25:12\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة تجربة\", \"prices_level\": 1, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"457777\", \"authorized_person\": \"علي احمد\", \"has_forward_account\": 1, \"is_newsletter_subscripe\": 0}, \"total\": 503.7, \"address\": {\"id\": 172, \"address\": \"الاسكان\", \"city_id\": 63, \"user_id\": 262, \"zone_id\": 84, \"country_id\": 1, \"created_at\": \"2021-03-28 19:05:17\", \"updated_at\": \"2021-03-28 19:05:17\", \"government_id\": 13}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورولوجي كيبل لايتنغ 1.2 متر (أحمر)\", \"item_photo\": \"16157505671608122858_Powerol222-650x650.jpg\", \"item_price\": 1.15, \"product_id\": 1413, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"كيبل للايفون بمدخل PD  من شركة موفي\", \"item_photo\": \"1617829391s7oULNI1MBLWqWA4yk1O2LTX1LSl6BDTYuGFAY3Q.jpg\", \"item_price\": 113.85, \"product_id\": 3117, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل شحن يو اس بي - سي إلى لايتنغ 1.2 متر (أسود)\", \"item_photo\": \"16157509101605605047_0001 (4)-650x650.jpg\", \"item_price\": 31.05, \"product_id\": 1416, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل شحن يو اس بي - سي إلى لايتنغ 1.2 متر (أسود)\", \"item_photo\": \"16157509101605605047_0001 (4)-650x650.jpg\", \"item_price\": 31.05, \"product_id\": 1419, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"باورولوجي كيبل سمعيات يو اس بي - سي إلى أيه يو أكس (1.2 م)\", \"item_photo\": \"16157507781605606057_0001 (9)-650x650.jpg\", \"item_price\": 40.25, \"product_id\": 1415, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"سماعة من شركة بيلكن بمنفذ لايتنينج  - ابيض\", \"item_photo\": \"16177552683f5VyUkfKsI2maxOdRC3fJVBsX17dWncSB8PobCg.jpg\", \"item_price\": 286.35, \"product_id\": 2914, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 503.7000000000001, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"19\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": true}', '612436', NULL, 'pending', NULL, NULL, '2021-04-11 14:07:26', '2021-04-11 14:07:27'),
('fd84693c-087b-4361-9779-3da44ea64ea4', 'my_fatoorah', 262, 14313.61, 4, '{\"user\": {\"id\": 262, \"email\": \"p@p.p\", \"phone\": \"0599865163\", \"gender\": \"1\", \"is_ban\": 0, \"address\": null, \"city_id\": 63, \"zone_id\": 84, \"is_active\": 1, \"last_name\": null, \"birth_date\": null, \"country_id\": 1, \"created_at\": \"2021-03-28 18:07:23\", \"first_name\": null, \"updated_at\": \"2021-04-05 16:12:42\", \"is_merchant\": 1, \"provider_id\": null, \"user_status\": null, \"company_name\": \"شركة تجربة\", \"prices_level\": 1, \"government_id\": 13, \"phone_code_id\": 157, \"account_number\": \"457777\", \"authorized_person\": \"علي احمد\", \"has_forward_account\": 0, \"is_newsletter_subscripe\": 0}, \"total\": 14313.61, \"address\": {\"address\": \"احمد بن ابي الخير\", \"city_id\": \"65\", \"user_id\": 262, \"zone_id\": \"119\", \"country_id\": \"1\", \"government_id\": \"15\"}, \"currency\": {\"id\": 4, \"code\": \"SAR\", \"value\": 1, \"status\": 1, \"symbol\": \"SR\", \"name_ar\": \"ر.س\", \"name_en\": \"SR\", \"created_at\": \"2020-06-15 22:28:08\", \"is_deafult\": 1, \"updated_at\": \"2021-02-03 07:51:00\"}, \"discount\": 0, \"is_valid\": true, \"products\": [{\"quantity\": 1, \"item_name\": \"باورلوجي شاحن حائط 65 واط بـ3 منافذ (أسود)\", \"item_photo\": \"16157499291608122858_Powerol222-650x650.jpg\", \"item_price\": 112.7, \"product_id\": 1408, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من نمبر ون\", \"item_photo\": \"1614281289ماكينة نمبر ون الامريكية.jpg\", \"item_price\": 3448.85, \"product_id\": 654, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من بروتكشن برو (صغيرة)\", \"item_photo\": \"1614278322الصغيرة.jpg\", \"item_price\": 4271.4335, \"product_id\": 628, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"ماكينة للتغليف الحراري من بروتكشن برو (وسط)\", \"item_photo\": \"1614277949الوسط.jpg\", \"item_price\": 6133.3295, \"product_id\": 627, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للهواتف من بروتكشن برو\", \"item_photo\": \"1614279988للهواتف-01-01.jpg\", \"item_price\": 43.125, \"product_id\": 653, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"التغليف الحراري للساعات والاساور من بروتكشن برو\", \"item_photo\": \"1614282648التغليف الحراري للساعات من بروتكشن-04.jpg\", \"item_price\": 26.45, \"product_id\": 647, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري ليد التحكم و الكونسل من بروتكشن برو\", \"item_photo\": \"1614283511dfd-04.jpg\", \"item_price\": 115, \"product_id\": 633, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري خشبي محروق من نمبر ون\", \"item_photo\": \"1614285810خشبي محروق-01.jpg\", \"item_price\": 85.1, \"product_id\": 632, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري شفاف للسماعات من بروتكشن برو\", \"item_photo\": \"1614283843rt-04.jpg\", \"item_price\": 43.125, \"product_id\": 630, \"combination_id\": null, \"item_combination_name\": null}, {\"quantity\": 1, \"item_name\": \"تغليف حراري للكاميرات من بروتكشن برو\", \"item_photo\": \"1614282898Untitled-y-04.jpg\", \"item_price\": 34.5, \"product_id\": 629, \"combination_id\": null, \"item_combination_name\": null}], \"subtotal\": 14313.613, \"coupon_code\": \"\", \"payment_type\": \"my_fatoorah\", \"delivery_time\": \"20\", \"shipping_price\": 0, \"tax_percentage\": 15, \"is_address_saved\": false}', NULL, NULL, 'pending', NULL, NULL, '2021-04-05 15:37:31', '2021-04-05 15:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code_id` int(11) UNSIGNED DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `zone_id` int(10) UNSIGNED DEFAULT NULL,
  `government_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_newsletter_subscripe` tinyint(1) NOT NULL DEFAULT '0',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_ban` tinyint(1) NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_merchant` int(11) NOT NULL DEFAULT '0',
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authorized_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prices_level` int(11) DEFAULT '5',
  `has_forward_account` tinyint(1) NOT NULL DEFAULT '0',
  `commercial_register` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `can_cash` tinyint(1) NOT NULL DEFAULT '1',
  `seen_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `phone_code_id`, `gender`, `birth_date`, `user_status`, `password`, `country_id`, `city_id`, `zone_id`, `government_id`, `remember_token`, `created_at`, `updated_at`, `is_newsletter_subscripe`, `address`, `is_active`, `is_ban`, `provider_id`, `is_merchant`, `company_name`, `authorized_person`, `account_number`, `prices_level`, `has_forward_account`, `commercial_register`, `tax_number`, `logo`, `can_cash`, `seen_at`) VALUES
(242, NULL, NULL, 'q@q.q', '599865163', 157, '1', NULL, NULL, '$2y$10$Wxe2636ybr/1V2pL5PGy1.d5rX0AVqjygUBGmwaxgBHwMIyqyngGS', 1, 63, 84, 13, 'kgQUPJyZZxH5Mf7GbzYeLyt0JSgJokgBWUAawldPdpZQ24s4tGPQ74KQ7Say', '2021-03-23 19:21:29', '2021-10-06 17:02:26', 0, NULL, 1, 0, NULL, 1, 'شركة Test', 'علي حسن الشمراني', '121111', 2, 1, '1111111111', '00001111000011111', '16207432316235DA20-4E9C-444C-AF13-FE4C0E7ED572.jpeg', 1, '2021-09-28 15:50:13'),
(284, 'ششش ششش سسس', 'سسس', 'q22@q.q', '590099820', 157, NULL, NULL, NULL, '$2y$10$SX8qeRrvp/odEe4UM6N5RuFEkdwphjhaZ4d1fGwI1fH20/DiSpM5u', 1, 56, 47, 11, NULL, '2021-09-29 16:43:21', '2021-09-29 16:43:21', 0, NULL, 1, 0, NULL, 0, NULL, NULL, NULL, 5, 0, NULL, NULL, NULL, 1, NULL),
(287, NULL, NULL, '3li@ajmalalhawatif.com', '596656679', 157, NULL, NULL, NULL, '$2y$10$Tsy90Y34XH/OtuwF9Rbwk.PWvvaBLYtj8c/p9cnEalGuQfoHXkGE.', 1, 63, 84, 13, '7WUWoR2MMyzYCC9ftA9y37tPqvNVsimToDTdXDtS2Q1nia4vmxelxMnU3aFV', '2021-11-10 09:28:43', '2022-02-12 14:32:28', 0, NULL, 1, 0, NULL, 1, 'شركة سين للاتصالات', 'يوسف محمد خالد', '123654', 3, 0, NULL, NULL, NULL, 0, '2021-11-10 11:29:47'),
(288, 'ali', 'alaa', 'alialaa@gmail.com', '1015310144', 57, NULL, NULL, NULL, '$2y$10$EF3SpwMVIj6eUYQzWTUVAeHiqwQZ0LmRIxOSfYjtG0pyDL4L0ZzDS', 7, 74, 198, 21, NULL, '2022-03-16 10:38:32', '2022-03-16 10:38:32', 0, NULL, 1, 0, NULL, 0, NULL, NULL, NULL, 5, 0, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `government_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `zone_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `address`, `user_id`, `country_id`, `government_id`, `city_id`, `zone_id`, `created_at`, `updated_at`) VALUES
(171, 'شارع الامام بخاري', 242, 1, 13, 63, 84, '2021-03-23 23:43:32', '2021-08-08 15:17:48'),
(191, 'عبدالله بن سرجس', 242, 1, 11, 56, 47, '2021-08-08 14:59:42', '2021-08-08 15:28:51'),
(192, 'تاز', 242, 7, 21, 74, 198, '2021-08-10 11:34:00', '2021-08-10 11:34:00'),
(193, 'ااا', 284, 1, 11, 56, 47, '2021-09-29 16:45:49', '2021-09-29 16:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `is_merchant` tinyint(4) NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `user_id`, `is_merchant`, `count`, `created_at`, `updated_at`) VALUES
(80, 242, 1, 2, '2021-03-24', '2021-03-24 00:23:05'),
(98, 242, 1, 2, '2021-04-13', '2021-04-13 20:18:18'),
(99, 242, 1, 4, '2021-04-14', '2021-04-14 20:02:17'),
(101, 242, 1, 1, '2021-04-15', '2021-04-14 22:17:35'),
(103, 242, 1, 2, '2021-04-16', '2021-04-16 18:31:27'),
(104, 242, 1, 2, '2021-04-17', '2021-04-17 02:45:19'),
(105, 242, 1, 2, '2021-04-18', '2021-04-18 17:45:31'),
(107, 242, 1, 1, '2021-04-20', '2021-04-20 00:39:51'),
(109, 242, 1, 1, '2021-04-23', '2021-04-23 05:00:06'),
(110, 242, 1, 1, '2021-04-24', '2021-04-24 21:38:47'),
(111, 242, 1, 1, '2021-04-26', '2021-04-26 19:05:55'),
(113, 242, 1, 1, '2021-05-01', '2021-05-01 06:13:25'),
(115, 242, 1, 7, '2021-05-04', '2021-05-04 10:56:32'),
(119, 242, 1, 2, '2021-05-05', '2021-05-05 21:13:22'),
(121, 242, 1, 3, '2021-05-06', '2021-05-06 09:29:38'),
(123, 242, 1, 1, '2021-05-11', '2021-05-11 15:23:32'),
(124, 242, 1, 2, '2021-05-12', '2021-05-12 00:33:46'),
(126, 242, 1, 3, '2021-05-14', '2021-05-14 12:01:32'),
(127, 242, 1, 1, '2021-05-17', '2021-05-17 12:29:46'),
(128, 242, 1, 2, '2021-05-18', '2021-05-18 15:44:13'),
(131, 242, 1, 5, '2021-05-19', '2021-05-19 17:03:14'),
(133, 242, 1, 2, '2021-05-20', '2021-05-20 15:21:30'),
(134, 242, 1, 1, '2021-05-23', '2021-05-23 10:17:04'),
(135, 242, 1, 7, '2021-05-25', '2021-05-25 15:02:17'),
(139, 242, 1, 3, '2021-05-26', '2021-05-26 16:35:04'),
(140, 242, 1, 4, '2021-05-27', '2021-05-27 16:24:02'),
(143, 242, 1, 2, '2021-05-28', '2021-05-28 02:03:08'),
(144, 242, 1, 4, '2021-05-30', '2021-05-30 18:57:32'),
(146, 242, 1, 2, '2021-06-05', '2021-06-05 18:03:11'),
(147, 242, 1, 1, '2021-06-07', '2021-06-07 18:58:39'),
(148, 242, 1, 1, '2021-06-11', '2021-06-11 04:16:04'),
(149, 242, 1, 1, '2021-06-13', '2021-06-13 20:02:57'),
(150, 242, 1, 1, '2021-06-14', '2021-06-13 23:48:08'),
(152, 242, 1, 6, '2021-06-15', '2021-06-15 15:59:03'),
(155, 242, 1, 6, '2021-06-16', '2021-06-16 20:13:02'),
(157, 242, 1, 3, '2021-06-17', '2021-06-17 06:36:11'),
(158, 242, 1, 1, '2021-06-20', '2021-06-20 10:22:14'),
(160, 242, 1, 1, '2021-06-22', '2021-06-22 14:15:26'),
(161, 242, 1, 3, '2021-06-23', '2021-06-23 20:04:07'),
(165, 242, 1, 7, '2021-06-28', '2021-06-28 13:07:35'),
(166, 242, 1, 3, '2021-06-29', '2021-06-29 16:37:30'),
(167, 242, 1, 3, '2021-06-30', '2021-06-30 10:32:56'),
(168, 242, 1, 2, '2021-07-06', '2021-07-06 05:02:29'),
(169, 242, 1, 1, '2021-07-08', '2021-07-08 04:22:39'),
(170, 242, 1, 2, '2021-07-09', '2021-07-09 04:14:50'),
(173, 242, 1, 2, '2021-07-10', '2021-07-10 23:23:07'),
(174, 242, 1, 2, '2021-07-11', '2021-07-11 23:35:06'),
(176, 242, 1, 2, '2021-07-12', '2021-07-12 03:08:54'),
(177, 242, 1, 2, '2021-07-13', '2021-07-13 20:33:42'),
(178, 242, 1, 6, '2021-07-14', '2021-07-14 12:20:22'),
(179, 242, 1, 8, '2021-07-15', '2021-07-15 14:21:35'),
(180, 242, 1, 1, '2021-08-04', '2021-08-04 20:04:40'),
(181, 242, 1, 1, '2021-08-05', '2021-08-05 17:45:53'),
(182, 242, 1, 1, '2021-08-08', '2021-08-08 14:58:58'),
(183, 242, 1, 4, '2021-08-09', '2021-08-09 21:18:05'),
(184, 242, 1, 5, '2021-08-10', '2021-08-10 16:04:56'),
(185, 242, 1, 1, '2021-08-11', '2021-08-11 21:03:48'),
(186, 242, 1, 1, '2021-08-19', '2021-08-19 16:08:21'),
(187, 242, 1, 4, '2021-08-23', '2021-08-23 21:35:23'),
(188, 242, 1, 2, '2021-08-24', '2021-08-24 20:14:35'),
(189, 242, 1, 2, '2021-08-25', '2021-08-25 15:50:35'),
(190, 242, 1, 1, '2021-08-26', '2021-08-26 02:30:11'),
(191, 242, 1, 1, '2021-09-09', '2021-09-09 10:38:22'),
(192, 242, 1, 5, '2021-09-23', '2021-09-23 20:01:39'),
(193, 242, 1, 1, '2021-09-26', '2021-09-26 14:58:34'),
(194, 242, 1, 1, '2021-09-27', '2021-09-27 15:11:38'),
(196, 242, 1, 2, '2021-09-28', '2021-09-28 20:04:29'),
(198, 242, 1, 2, '2021-09-29', '2021-09-29 16:38:07'),
(199, 242, 1, 1, '2021-10-03', '2021-10-03 13:34:44'),
(200, 242, 1, 1, '2021-10-04', '2021-10-04 09:17:42'),
(201, 242, 1, 4, '2021-10-06', '2021-10-06 16:38:26'),
(202, 242, 1, 1, '2021-10-07', '2021-10-07 13:40:13'),
(203, 242, 1, 1, '2021-10-09', '2021-10-09 17:47:34'),
(204, 242, 1, 4, '2021-10-10', '2021-10-10 16:02:05'),
(205, 242, 1, 6, '2021-10-11', '2021-10-11 14:41:40'),
(206, 242, 1, 4, '2021-10-12', '2021-10-12 16:07:18'),
(207, 242, 1, 3, '2021-10-13', '2021-10-13 10:51:45'),
(208, 242, 1, 1, '2021-10-16', '2021-10-16 18:44:45'),
(209, 242, 1, 1, '2021-10-20', '2021-10-20 12:24:13'),
(210, 242, 1, 1, '2021-10-24', '2021-10-24 10:05:09'),
(211, 242, 1, 13, '2021-10-26', '2021-10-26 21:58:49'),
(212, 242, 1, 5, '2021-10-27', '2021-10-27 18:37:32'),
(213, 242, 1, 2, '2021-10-28', '2021-10-28 21:33:45'),
(214, 242, 1, 1, '2021-10-30', '2021-10-30 17:25:28'),
(215, 242, 1, 7, '2021-10-31', '2021-10-31 18:44:21'),
(216, 242, 1, 7, '2021-11-01', '2021-11-01 15:27:27'),
(217, 242, 1, 6, '2021-11-02', '2021-11-02 21:41:53'),
(218, 242, 1, 1, '2021-11-03', '2021-11-03 10:02:17'),
(219, 242, 1, 1, '2021-11-06', '2021-11-06 17:46:51'),
(220, 242, 1, 1, '2021-11-08', '2021-11-08 17:50:16'),
(221, 287, 1, 1, '2021-11-14', '2021-11-14 17:15:14'),
(222, 242, 1, 1, '2022-03-15', '2022-03-15 19:41:58'),
(223, 288, 0, 1, '2022-03-16', '2022-03-16 10:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `verification_codes`
--

CREATE TABLE `verification_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_in` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verification_codes`
--

INSERT INTO `verification_codes` (`id`, `email`, `code`, `expire_in`, `created_at`, `updated_at`) VALUES
(2, '01020800367', '1616', '2021-02-25 17:53:01', '2021-02-25 15:33:53', '2021-02-25 15:53:01'),
(3, '01020750779', '6295', '2021-04-08 21:37:09', '2021-02-25 15:37:09', '2021-04-08 19:37:09'),
(4, '596656679', '1465', '2021-07-10 07:39:07', '2021-02-25 16:17:12', '2021-07-10 07:39:07'),
(5, '594710425', '3476', '2021-11-04 20:27:41', '2021-02-25 18:25:42', '2021-11-04 18:27:41'),
(6, '590099819', '1377', '2021-03-02 16:34:57', '2021-02-25 23:53:19', '2021-03-02 14:34:57'),
(7, '0596656679', '8455', '2021-05-17 14:20:43', '2021-03-03 14:17:46', '2021-05-17 12:20:43'),
(8, '0581701716', '7467', '2021-03-18 17:46:50', '2021-03-18 15:46:28', '2021-03-18 15:46:50'),
(9, '0533050884', '1870', '2021-03-30 22:04:05', '2021-03-30 20:03:50', '2021-03-30 20:04:05'),
(10, '0583888813', '3128', '2021-05-06 02:03:27', '2021-05-06 00:03:00', '2021-05-06 00:03:27'),
(11, '555124487', '1252', '2021-05-06 06:01:40', '2021-05-06 03:01:40', '2021-05-06 03:01:40'),
(12, '581701716', '7315', '2021-11-14 20:01:24', '2021-06-15 21:42:21', '2021-11-14 17:01:24'),
(13, '560353340', '5231', '2021-06-29 05:18:17', '2021-06-29 03:18:02', '2021-06-29 03:18:17'),
(14, '540855559', '2354', '2021-07-09 01:24:15', '2021-07-09 01:23:59', '2021-07-09 01:24:15'),
(15, '540400810', '4409', '2021-07-10 22:54:19', '2021-07-10 22:54:06', '2021-07-10 22:54:19'),
(16, '594710420', '9052', '2021-11-04 18:17:44', '2021-11-04 15:17:44', '2021-11-04 15:17:44'),
(17, '507814481', '6949', '2021-12-14 19:45:01', '2021-12-14 17:34:53', '2021-12-14 17:45:01'),
(18, 'xgate.store@gmail.com', '6350', '2021-12-14 00:00:00', '2021-12-14 17:40:15', '2021-12-14 17:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_total` int(11) NOT NULL DEFAULT '0',
  `is_shipping` tinyint(1) DEFAULT NULL,
  `max_num_of_use` int(11) NOT NULL DEFAULT '0',
  `num_of_use` int(11) NOT NULL DEFAULT '0',
  `voucher_type` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `from`, `to`, `amount`, `percentage`, `status`, `min_total`, `is_shipping`, `max_num_of_use`, `num_of_use`, `voucher_type`, `created_at`, `updated_at`) VALUES
(1, 'AAA', '2022-03-13', '2022-03-31', '100', NULL, 'enabled', 10, NULL, 5, 1, 1, '2022-03-15 19:41:31', '2022-03-16 10:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `warranties`
--

CREATE TABLE `warranties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `front_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `back_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_notes` text COLLATE utf8mb4_unicode_ci,
  `usage_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent_at` datetime DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dummy_text_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dummy_text_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dummy_text_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code_id` int(10) UNSIGNED DEFAULT NULL,
  `device_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_applicable` tinyint(1) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `replied_at` datetime DEFAULT NULL,
  `application_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `read_at` datetime DEFAULT NULL,
  `type` enum('sms','card') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'card',
  `store_reason` text COLLATE utf8mb4_unicode_ci,
  `seen_at` datetime DEFAULT NULL,
  `insurance_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warranties`
--

INSERT INTO `warranties` (`id`, `user_id`, `front_image`, `back_image`, `warranty_image`, `warranty_number`, `user_notes`, `usage_date`, `sent_at`, `user_name`, `phone`, `dummy_text_1`, `dummy_text_2`, `dummy_text_3`, `phone_code_id`, `device_name_ar`, `device_name_en`, `is_applicable`, `value`, `currency_id`, `reason`, `admin_id`, `replied_at`, `application_number`, `created_at`, `updated_at`, `read_at`, `type`, `store_reason`, `seen_at`, `insurance_id`) VALUES
(19, 242, '1633534946615dc3e28c946B4FD1145-3FD2-4FD6-B69A-F9FA07B7F17E.png', '1633534946615dc3e29cd01C8BE0320-CE83-4EA3-A94F-20120F8C3982.png', '1633534946615dc3e29d479F419E93D-C4AD-45C9-9E8E-FBE8897DAD67.png', NULL, NULL, '2021-10-06 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 400, 4, NULL, 1, '2021-10-06 18:43:49', '1', '2021-10-06 16:42:26', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'card', NULL, '2021-10-06 18:42:32', NULL),
(20, 242, '1633536482615dc9e23f2aaimage.jpg', NULL, NULL, NULL, NULL, '2021-10-06 00:00:00', NULL, 'سعد حسن الشمراني', '590099819', NULL, NULL, NULL, 157, NULL, NULL, 1, 500, 4, NULL, 1, '2021-10-06 19:08:24', '47', '2021-10-06 17:08:02', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', 'غير واضح', '2021-10-06 19:08:07', 43),
(21, 242, '1633879746616306c220231image.jpg', NULL, '1633879746616306c220824image.jpg', NULL, NULL, '2021-10-10 00:00:00', NULL, 'علي حسن الشمراني', '596656679', NULL, NULL, NULL, 157, NULL, NULL, 1, 400, 4, NULL, 1, '2021-10-10 18:29:49', '137', '2021-10-10 16:29:06', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', 'مو واضح', '2021-10-10 18:29:36', 45),
(22, 242, '1633943959616401972fa0d739BF2C3-9C68-4C3E-AD57-0C409FF3D67A.jpeg', NULL, '16339439596164019730225127124D5-5F5E-455D-8683-215EF8F772CE.jpeg', NULL, NULL, '2021-10-11 00:00:00', NULL, 'حسن علي الشمراني', '596656679', NULL, NULL, NULL, 157, NULL, NULL, 1, 500, 4, NULL, 1, '2021-10-11 12:21:19', '1976', '2021-10-11 10:19:19', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', NULL, '2021-10-11 12:20:07', 46),
(23, 242, '163395983161643f97cbcdbimage.jpg', '163395983161643f97cc599image.jpg', '163395983161643f97cca03image.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 400, 4, NULL, 1, '2021-10-11 16:44:15', '1547', '2021-10-11 14:43:51', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'card', NULL, '2021-10-11 16:43:57', NULL),
(24, 242, '1633960430616441eee9211image.jpg', NULL, NULL, NULL, NULL, '2021-10-11 00:00:00', NULL, 'علي حسن احمد', '596656679', NULL, NULL, NULL, 157, NULL, NULL, 1, 600, 4, NULL, 1, '2021-10-11 16:54:17', '45444', '2021-10-11 14:53:50', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', NULL, '2021-10-11 16:54:03', 47),
(25, 242, '1634043849616587c93a155image.jpg', NULL, NULL, NULL, NULL, '2021-10-12 00:00:00', NULL, 'علي حسن خالد', '596656679', NULL, NULL, NULL, 157, NULL, NULL, 0, NULL, NULL, 'gff', 1, '2021-10-12 16:04:45', NULL, '2021-10-12 14:04:09', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', 'الصور غير واضحه', '2021-10-12 16:04:17', 48),
(26, 242, '16340752476166026f5f41b00027a89-f86c-4a2b-959b-0b79b8799de2.jpg', NULL, NULL, NULL, NULL, '2021-10-12 00:00:00', NULL, 'اريج حسنن الشمراني', '560353340', NULL, NULL, NULL, 157, NULL, NULL, 1, 400, 4, NULL, 1, '2021-10-13 00:50:50', '8272', '2021-10-12 22:47:27', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', 'الصور غير واضحة', '2021-10-13 00:47:45', 50),
(27, 242, '163407604961660591db07000027a89-f86c-4a2b-959b-0b79b8799de2.jpg', '163407604961660591db64200027a89-f86c-4a2b-959b-0b79b8799de2.jpg', '163407604961660591dba0b00027a89-f86c-4a2b-959b-0b79b8799de2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 300, 4, NULL, 1, '2021-10-13 01:02:05', '3797', '2021-10-12 23:00:49', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'card', NULL, '2021-10-13 01:01:09', NULL),
(28, 242, '1635066805617523b50e44fimage.jpg', NULL, NULL, NULL, NULL, '2021-10-24 00:00:00', NULL, 'Ali hassan alshamrani', '596656679', NULL, NULL, NULL, 157, NULL, NULL, 0, NULL, NULL, 'ال', 1, '2021-10-24 12:15:30', NULL, '2021-10-24 10:13:25', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', NULL, '2021-10-24 12:13:59', 51),
(29, 242, '16352434966177d5e86c770ACE618E7-BDDC-4762-AD34-5AFA0E2E2B5C.jpeg', NULL, '16352434966177d5e86cd87078B20F3-9C15-42FF-88C2-2F9D971F514F.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 400, 4, NULL, 1, '2021-10-26 13:19:05', '577', '2021-10-26 11:18:16', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'card', NULL, '2021-10-26 13:18:38', NULL),
(30, 242, '16352481676177e827ae4aaindex.jpg', NULL, '16352481676177e827ae9b7He44f89c10854485ba6c66c59426b7894X.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'لا يشمل', 1, '2021-10-26 14:37:20', NULL, '2021-10-26 12:36:07', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'card', NULL, '2021-10-26 14:36:47', NULL),
(33, 242, '1635254712617801b8021642.jpg', NULL, '1635254712617801b80284fqr code.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 10, 4, NULL, 1, '2021-10-26 16:26:06', '1234', '2021-10-26 14:25:12', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'card', '123', '2021-10-26 16:25:53', NULL),
(34, 242, '163525512661780356618f1image.jpg', NULL, '16352551266178035662091image.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 456, 4, NULL, 1, '2021-10-26 16:35:16', '3456', '2021-10-26 14:32:06', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'card', NULL, '2021-10-26 16:35:02', NULL),
(35, 242, '163525701161780ab34bd12test.png', '163525701161780ab34c32e2.jpg', '163525701161780ab34c6b21.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-26 15:03:31', '2021-10-26 15:07:04', NULL, 'card', NULL, '2021-10-26 17:07:04', NULL),
(36, 242, '163525725561780ba7476d8image.jpg', '163525725561780ba747c75image.jpg', '163525725561780ba747fd0image.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-26 15:07:35', '2021-10-26 15:08:35', NULL, 'card', NULL, '2021-10-26 17:08:35', NULL),
(37, 242, '163533915261794b9083ddd3EE952B2-DE9B-41FA-B8A2-985963E87C48.jpeg', NULL, NULL, NULL, NULL, '2021-10-26 00:00:00', NULL, 'اريج حسن الشمراني', '560353340', NULL, NULL, NULL, 157, NULL, NULL, 1, 700, 4, NULL, 1, '2021-10-27 15:53:42', '789', '2021-10-27 13:52:32', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', NULL, '2021-10-27 15:52:41', 60),
(38, 242, '163533952161794d012452cEF75E29D-7A50-4B38-A60F-76D1CCDEB858.jpeg', NULL, NULL, NULL, NULL, '2021-10-25 00:00:00', NULL, 'محمد سعيد محمد', '105090801', NULL, NULL, NULL, 157, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-27 15:59:12', NULL, '2021-10-27 13:58:41', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', 'تال', '2021-10-27 15:58:49', 58),
(39, 242, '163535656761798f97425aa84E528EB-24E5-42B0-B180-F3B6FE457B44.jpeg', '163535656761798f9742c9bimage.jpg', '163535656761798f9742fd3D2742D2D-FB62-430C-BE52-74D2B9BAF86B.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-27 20:43:15', NULL, '2021-10-27 18:42:47', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'card', 'اعد رفع الصور مرة اخرى', '2021-10-27 20:42:58', NULL),
(41, 242, '163535723261799230620bbimage.jpg', NULL, NULL, NULL, NULL, '2021-10-27 00:00:00', NULL, 'علي حسن الشمراني', '590099819', NULL, NULL, NULL, 157, NULL, NULL, 1, 877, 4, NULL, 1, '2021-10-27 20:54:19', '666', '2021-10-27 18:53:52', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', NULL, '2021-10-27 20:54:02', 61),
(42, 242, '1635453650617b0ad2f3855image.jpg', NULL, NULL, NULL, NULL, '2021-10-28 00:00:00', NULL, 'عبدالعزيز محمد علي', '546469338', NULL, NULL, NULL, 157, NULL, NULL, 1, 400, 4, NULL, 1, '2021-10-30 19:34:15', '458745', '2021-10-28 21:40:51', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', NULL, '2021-10-30 19:33:07', 62),
(43, 242, '1635611587617d73c3be995image.jpg', NULL, NULL, NULL, NULL, '2021-10-30 00:00:00', NULL, 'خالد محمد القاضي', '507753771', NULL, NULL, NULL, 157, NULL, NULL, 1, 478, 4, NULL, 1, '2021-10-30 19:34:58', '4578', '2021-10-30 17:33:07', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', NULL, '2021-10-30 19:33:17', 63),
(46, 242, '1635685218617e9362689bcBE4CDE47-D4BE-4681-AF5F-6616AC8BCD33.jpeg', NULL, NULL, NULL, NULL, '2021-10-26 00:00:00', NULL, 'حسن محمد حسن', '105090801', NULL, NULL, NULL, 157, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-31 14:00:18', '2021-10-31 14:00:25', NULL, 'sms', NULL, '2021-10-31 16:00:25', 57),
(47, 242, '1635699011617ec9432328bimage.jpg', '1635699011617ec943239c9image.jpg', '1635699011617ec94323e2bimage.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 477, 4, NULL, 1, '2021-10-31 19:51:01', '658', '2021-10-31 17:50:11', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'card', NULL, '2021-10-31 19:50:35', NULL),
(48, 242, '1635699471617ecb0f13939image.jpg', NULL, NULL, NULL, NULL, '2021-10-31 00:00:00', NULL, 'خالد محمد احمد', '596656679', NULL, NULL, NULL, 157, NULL, NULL, 0, NULL, NULL, 'الكسر خارج حدود الشاشة المضيئة', 1, '2021-10-31 19:59:35', NULL, '2021-10-31 17:57:51', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', NULL, '2021-10-31 19:59:00', 65),
(49, 242, '1635702843617ed83bb309500027a89-f86c-4a2b-959b-0b79b8799de2.jpg', NULL, NULL, NULL, NULL, '2021-10-31 00:00:00', NULL, 'اريج حسن الشمراني', '560353340', NULL, NULL, NULL, 157, NULL, NULL, 1, 890, 4, NULL, 1, '2021-10-31 20:55:02', '45678', '2021-10-31 18:54:03', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', NULL, '2021-10-31 20:54:14', 72),
(50, 242, '1635857374618133de655cf65755016764__409DC146-29A1-4316-95E6-007BE5876AB8.MOV', NULL, NULL, NULL, NULL, '2021-11-02 00:00:00', NULL, 'ع ا ا', '596656679', NULL, NULL, NULL, 157, NULL, NULL, 0, NULL, NULL, 'ال', 1, '2021-11-02 15:50:17', NULL, '2021-11-02 13:49:34', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', NULL, '2021-11-02 15:49:48', 76),
(51, 242, '16358865256181a5bda5f271.jpg', '16358865256181a5bda6b4c1.jpg', '16358865256181a5bda71721.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 500, 4, NULL, 1, '2021-11-02 23:55:45', '2345', '2021-11-02 21:55:25', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'card', NULL, '2021-11-02 23:55:32', NULL),
(52, 242, '16358866516181a63be50801.jpg', NULL, NULL, NULL, NULL, '2021-11-02 00:00:00', NULL, 'علي حسن علي', '596656679', NULL, NULL, NULL, 157, NULL, NULL, 1, 400, 4, NULL, 1, '2021-11-02 23:58:05', '8645', '2021-11-02 21:57:31', '2021-11-02 21:58:37', '2021-11-02 23:58:37', 'sms', NULL, '2021-11-02 23:57:41', 77),
(54, 286, '1636258248618751c81b733402FF9E5-E106-41D0-8C3E-8780B07E788F.jpeg', NULL, NULL, NULL, NULL, '2021-11-07 00:00:00', NULL, 'يوسف محمد خالد', '581701716', NULL, NULL, NULL, 157, NULL, NULL, 1, 300, 4, NULL, 11, '2021-11-07 07:12:02', '1', '2021-11-07 05:10:48', '2021-11-07 05:19:24', '2021-11-07 07:19:24', 'sms', NULL, '2021-11-07 07:11:03', NULL),
(57, 287, '1636909485619141ad922577A7445A1-FE30-4BB4-B435-CAA9B14EBC71.jpeg', '1636909485619141ad92bdaA7988DE9-FDDD-44E6-A3A6-51F9F3E8E105.jpeg', '1636909485619141ad930639EAD95B8-2665-4353-814A-7430A189F790.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, 'iPhone 11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-14 18:04:45', '2021-11-14 18:04:45', NULL, 'card', NULL, '2021-11-14 20:04:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 242, 6014, '2021-08-05 17:50:26', '2021-08-05 17:50:26'),
(2, 242, 6013, '2021-08-05 17:50:27', '2021-08-05 17:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `government_id` int(10) UNSIGNED DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name_en`, `name_ar`, `city_id`, `government_id`, `country_id`, `created_at`, `updated_at`) VALUES
(47, 'الرياض', 'الرياض', 56, 11, 1, '2021-01-06 08:02:12', '2021-01-06 08:02:12'),
(48, 'alkharaj', 'الخرج', 56, 11, 1, '2021-01-06 08:02:12', '2021-01-06 08:02:12'),
(49, 'Dawadmi', 'الدوادمي', 56, 11, 1, '2021-01-06 08:02:12', '2021-01-06 08:02:12'),
(50, 'almujmaea', 'المجمعة', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(51, 'Quwaiyah', 'القويعية', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(52, 'Alaflaj', 'الأفلاج', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(53, 'Wadi Al-Dawasir', 'وادي الدواسر', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(54, 'Zulfi', 'الزلفي', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(55, 'shuqara', 'شقراء', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(56, 'Hotat Bani Tamim', 'حوطة بني تميم', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(57, 'Afif', 'عفيف', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(58, 'Ghat', 'الغاط', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(59, 'alsalil', 'السليل', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(60, 'Darma', 'ضرما', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(61, 'Muzahimiyah', 'المزاحمية', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(62, 'ramah', 'رماح', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(63, 'thadiq', 'ثادق', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(64, 'Haremla', 'حريملاء', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(65, 'alhariq', 'الحريق', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(66, 'marrat', 'مرات', 56, 11, 1, '2021-01-06 08:02:13', '2021-01-06 08:02:13'),
(67, 'Jeddah ', 'جدة', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(68, 'Taif', 'الطائف', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(69, 'Al-Qunfudhah', 'القنفذة', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(70, 'alliyth', 'الليث', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(71, 'Rabigh', 'رابغ', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(72, 'khalis', 'خليص', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(73, 'alkharma', 'الخرمة', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(74, 'runiya', 'رنية', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(75, 'turba', 'تربة', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(76, 'aljumum', 'الجموم', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(77, 'alkamil', 'الكامل', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(78, 'almawiyuh', 'المويه', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(79, 'Maysan', 'ميسان', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(80, 'adum', 'أضم', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(81, 'alerdiat', 'العرضيات', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(82, 'Bahra', 'بحرة', 62, 13, 1, '2021-01-06 08:07:17', '2021-01-06 08:07:17'),
(83, 'Mecca', 'مكة المكرمة', 62, 13, 1, '2021-01-06 08:08:33', '2021-01-06 08:08:33'),
(84, 'Medina', 'المدينة المنورة', 63, 13, 1, '2021-01-06 08:14:28', '2021-01-06 08:14:28'),
(85, 'yanbae', 'ينبع', 63, 13, 1, '2021-01-06 08:14:28', '2021-01-06 08:14:28'),
(86, 'aleulla', 'العلا', 63, 13, 1, '2021-01-06 08:14:28', '2021-01-06 08:14:28'),
(87, 'mahd aldhahab', 'مهد الذهب', 63, 13, 1, '2021-01-06 08:14:28', '2021-01-06 08:14:28'),
(88, 'alhinakia', 'الحناكية', 63, 13, 1, '2021-01-06 08:14:28', '2021-01-06 08:14:28'),
(89, 'Badr', 'بدر', 63, 13, 1, '2021-01-06 08:14:28', '2021-01-06 08:14:28'),
(90, 'Khaibar', 'خيبر', 63, 13, 1, '2021-01-06 08:14:28', '2021-01-06 08:14:28'),
(91, 'aleays', 'العيص', 63, 13, 1, '2021-01-06 08:14:28', '2021-01-06 08:14:28'),
(92, 'wadi alfare', 'وادي الفرع', 63, 13, 1, '2021-01-06 08:14:28', '2021-01-06 08:14:28'),
(93, 'Buraydah', 'بريدة', 57, 12, 1, '2021-01-06 08:16:15', '2021-01-06 08:16:15'),
(94, 'Onaizah', 'عنيزة', 57, 12, 1, '2021-01-06 08:16:15', '2021-01-06 08:16:15'),
(95, 'Alrass', 'الرس', 57, 12, 1, '2021-01-06 08:16:15', '2021-01-06 08:16:15'),
(96, 'almudhanib', 'المذنب', 57, 12, 1, '2021-01-06 08:16:15', '2021-01-06 08:16:15'),
(97, 'Bukayriyah', 'البكيرية', 57, 12, 1, '2021-01-06 08:16:15', '2021-01-06 08:16:15'),
(98, 'albadayie', 'البدائع', 57, 12, 1, '2021-01-06 08:16:15', '2021-01-06 08:16:15'),
(99, 'al\'asyah', 'الأسياح', 57, 12, 1, '2021-01-06 08:16:15', '2021-01-06 08:16:15'),
(100, 'alnubhania', 'النبهانية', 57, 12, 1, '2021-01-06 08:16:15', '2021-01-06 08:16:15'),
(101, 'alshamasia', 'الشماسية', 57, 12, 1, '2021-01-06 08:16:15', '2021-01-06 08:16:15'),
(102, 'euyun aljawa', 'عيون الجواء', 57, 12, 1, '2021-01-06 08:16:15', '2021-01-06 08:16:15'),
(103, 'riad alkhubara\'', 'رياض الخبراء', 57, 12, 1, '2021-01-06 08:16:15', '2021-01-06 08:16:15'),
(104, 'euqlat alsuqur', 'عقلة الصقور', 57, 12, 1, '2021-01-06 08:16:15', '2021-01-06 08:16:15'),
(105, 'duriya', 'ضرية', 57, 12, 1, '2021-01-06 08:16:15', '2021-01-06 08:16:15'),
(106, 'Dammam', 'الدمام', 64, 14, 1, '2021-01-06 08:34:01', '2021-01-06 08:47:32'),
(107, 'alahsa', 'الأحساء', 64, 14, 1, '2021-01-06 08:34:01', '2021-01-06 08:34:01'),
(108, 'Hafar Al-Batin', 'حفر الباطن', 64, 14, 1, '2021-01-06 08:34:01', '2021-01-06 08:34:01'),
(109, 'Jubail', 'الجبيل', 64, 14, 1, '2021-01-06 08:34:01', '2021-01-06 08:34:01'),
(110, 'Qatif', 'القطيف', 64, 14, 1, '2021-01-06 08:34:01', '2021-01-06 08:34:01'),
(111, 'alkhobar', 'الخبر', 64, 14, 1, '2021-01-06 08:34:01', '2021-01-06 08:34:01'),
(112, 'Khafji', 'الخفجي', 64, 14, 1, '2021-01-06 08:34:01', '2021-01-06 08:34:01'),
(113, 'ras tanwra', 'رأس تنورة', 64, 14, 1, '2021-01-06 08:34:01', '2021-01-06 08:34:01'),
(114, 'baqiq', 'بقيق', 64, 14, 1, '2021-01-06 08:34:01', '2021-01-06 08:34:01'),
(115, 'alnaeyria', 'النعيرية', 64, 14, 1, '2021-01-06 08:34:01', '2021-01-06 08:34:01'),
(116, 'qaryat aleulya', 'قرية العليا', 64, 14, 1, '2021-01-06 08:34:01', '2021-01-06 08:34:01'),
(117, 'aledyd', 'العديد', 64, 14, 1, '2021-01-06 08:34:01', '2021-01-06 08:34:01'),
(118, 'Abha', 'ابها', 65, 15, 1, '2021-01-06 08:37:35', '2021-01-06 08:37:35'),
(119, 'Khamis Mushait', 'خميس مشيط', 65, 15, 1, '2021-01-06 08:37:35', '2021-01-06 08:37:35'),
(120, 'Bisha', 'بيشة', 65, 15, 1, '2021-01-06 08:37:35', '2021-01-06 08:37:35'),
(121, 'Al-Namas', 'النماص', 65, 15, 1, '2021-01-06 08:37:35', '2021-01-06 08:37:35'),
(122, 'Mahayel Aseer', 'محايل عسير', 65, 15, 1, '2021-01-06 08:37:35', '2021-01-06 08:37:35'),
(123, 'Dhahran aljanub', 'ظهران الجنوب', 65, 15, 1, '2021-01-06 08:37:35', '2021-01-06 08:37:35'),
(124, 'tathlith', 'تثليث', 65, 15, 1, '2021-01-06 08:37:35', '2021-01-06 08:37:35'),
(125, 'Obeida', 'سراة عبيدة', 65, 15, 1, '2021-01-06 08:37:35', '2021-01-06 08:37:35'),
(126, 'rijal \'almae', 'رجال ألمع', 65, 15, 1, '2021-01-06 08:37:35', '2021-01-06 08:37:35'),
(127, 'Belqarn', 'بلقرن', 65, 15, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(128, 'Ahad Rufaida', 'أحد رفيدة', 65, 15, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(129, 'Majarda', 'المجاردة', 65, 15, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(130, 'albarik', 'البرك', 65, 15, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(131, 'bariq', 'بارق', 65, 15, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(132, 'tanawma', 'تنومة', 65, 15, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(133, 'trib', 'طريب', 65, 15, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(134, 'Tabuk', 'تبوك', 58, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(135, 'alwajh', 'الوجه', 58, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(136, 'dabaa', 'ضبأ', 58, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(137, 'Taima', 'تيماء', 58, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(138, 'amlaj', 'أملج', 58, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(139, 'haql', 'حقل', 58, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(140, 'albadae', 'البدع', 58, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(141, 'Hail', 'حائل', 59, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(142, 'biqaea', 'بقعاء', 59, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(143, 'alghazala', 'الغزالة', 59, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(144, 'alshannan', 'الشنان', 59, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(145, 'alhayit', 'الحائط', 59, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(146, 'alsalimi', 'السليمي', 59, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(147, 'alshamli', 'الشملي', 59, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(148, 'mawqiq', 'موقق', 59, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(149, 'smira', 'سميراء', 59, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(150, 'Arar', 'عرعر', 60, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(151, 'Rafha', 'رفحاء', 60, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(152, 'tarif', 'طريف', 60, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(153, 'alewyqila', 'العويقيلة', 60, 12, 1, '2021-01-06 08:37:36', '2021-01-06 08:37:36'),
(154, 'jazan', 'جازان', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(155, 'sabia', 'صبيا', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(156, 'Abu Arish', 'أبو عريش', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(157, 'samita', 'صامطة', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(158, 'Bish', 'بيش', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(159, 'aldarb', 'الدرب', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(160, 'alharth', 'الحرث', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(161, 'damad', 'ضمد', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(162, 'alriyth', 'الريث', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(163, 'juzur fursan', 'جزر فرسان', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(164, 'alddayir', 'الدائر', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(165, 'alearida', 'العارضة	', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(166, 'ahd almusaraha', 'أحد المسارحة', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(167, 'Al-Eidabi', 'العيدابي', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(168, 'Fifa', 'فيفاء', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(169, 'altwal', 'الطوال', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(170, 'harub', 'هروب', 66, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(171, 'Najran', 'نجران', 67, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(172, 'Sharurah', 'شرورة', 67, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(173, 'hubuwnana', 'حبونا', 67, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(174, 'Badr aljanub', 'بدر الجنوب', 67, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(175, 'yadamuh', 'يدمه', 67, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(176, 'thar', 'ثار', 67, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(177, 'khabash', 'خباش', 67, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(178, 'alkharkhir', 'الخرخير', 67, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(179, 'albaha', 'الباحة', 68, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(180, 'Baljurashi', 'بلجرشي', 68, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(181, 'almunadiq', 'المندق', 68, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(182, 'almakhawa', 'المخواة ', 68, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(183, 'qulua', 'قلوة', 68, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(184, 'aleaqiq', 'العقيق', 68, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(185, 'alquraa', 'القرى', 68, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(186, 'ghamid alzinad', 'غامد الزناد', 68, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(187, 'alhajra', 'الحجرة', 68, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(188, 'bani hasan', 'بني حسن', 68, 15, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(189, 'Skaka', 'سكاكا', 61, 12, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(190, 'Qurayyat', 'القريات', 61, 12, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(191, 'dawmat aljundal', 'دومة الجندل', 61, 12, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(192, 'tabirajl', 'طبرجل', 61, 12, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24'),
(193, 'Emirates', 'الامارات', 69, 16, 2, '2021-07-10 22:14:31', '2021-07-10 22:14:31'),
(194, 'Kuwait', 'الكويت', 70, 17, 3, '2021-07-10 22:14:49', '2021-07-10 22:14:49'),
(195, 'Bahrain', 'البحرين', 71, 18, 4, '2021-07-10 22:15:00', '2021-07-10 22:15:00'),
(196, 'Oman', 'عمان', 72, 19, 5, '2021-07-10 22:15:13', '2021-07-10 22:15:13'),
(197, 'Qatar', 'قطر', 73, 20, 6, '2021-07-10 22:15:29', '2021-07-10 22:15:29'),
(198, 'Egypt', 'مصر', 74, 21, 7, '2021-07-10 22:15:48', '2021-07-10 22:15:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`),
  ADD KEY `admins_phone_code_id_foreign` (`phone_code_id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertise_setttings`
--
ALTER TABLE `advertise_setttings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalogs_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `catalog_categories`
--
ALTER TABLE `catalog_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalog_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_options`
--
ALTER TABLE `category_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_options_category_id_foreign` (`category_id`),
  ADD KEY `category_options_option_id_foreign` (`option_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_government_id_foreign` (`government_id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key` (`key`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `configs_category_id_foreign` (`category_id`);

--
-- Indexes for table `config_categories`
--
ALTER TABLE `config_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactuses`
--
ALTER TABLE `contactuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverytimes`
--
ALTER TABLE `deliverytimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `governments`
--
ALTER TABLE `governments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `governments_country_id_foreign` (`country_id`);

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insurances_admin_id_foreign` (`admin_id`),
  ADD KEY `insurances_phone_code_id_foreign` (`phone_code_id`),
  ADD KEY `insurances_user_id_foreign` (`user_id`);

--
-- Indexes for table `menu_links`
--
ALTER TABLE `menu_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_links_key_unique` (`key`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `merchants_email_unique` (`email`),
  ADD UNIQUE KEY `merchants_phone_unique` (`phone`),
  ADD KEY `merchants_country_id_foreign` (`country_id`),
  ADD KEY `merchants_city_id_foreign` (`city_id`),
  ADD KEY `merchants_zone_id_foreign` (`zone_id`),
  ADD KEY `merchants_government_id_foreign` (`government_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_messages`
--
ALTER TABLE `newsletter_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `notification_bodies`
--
ALTER TABLE `notification_bodies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_bodies_key_index` (`key`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_values`
--
ALTER TABLE `option_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_values_option_id_foreign` (`option_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_current_status_type_id_foreign` (`current_status_type_id`),
  ADD KEY `orders_user_address_id_foreign` (`user_address_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`),
  ADD KEY `order_products_combination_id_foreign` (`combination_id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_statuses_order_id_foreign` (`order_id`),
  ADD KEY `order_statuses_status_id_foreign` (`status_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions_catrgory`
--
ALTER TABLE `permissions_catrgory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone_codes`
--
ALTER TABLE `phone_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poduct_attributes`
--
ALTER TABLE `poduct_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poduct_attributes_product_id_foreign` (`product_id`),
  ADD KEY `poduct_attributes_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_parent_id_foreign` (`parent_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_combinations`
--
ALTER TABLE `product_combinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_combinations_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_discounts`
--
ALTER TABLE `product_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_discounts_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_options_product_id_foreign` (`product_id`),
  ADD KEY `product_options_option_id_foreign` (`option_id`);

--
-- Indexes for table `product_option_values`
--
ALTER TABLE `product_option_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_option_values_product_id_foreign` (`product_id`),
  ADD KEY `product_option_values_option_value_id_foreign` (`option_value_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `reset_passwords`
--
ALTER TABLE `reset_passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `returns_user_address_id_foreign` (`user_address_id`),
  ADD KEY `returns_user_id_foreign` (`user_id`),
  ADD KEY `returns_order_product_id_foreign` (`order_product_id`),
  ADD KEY `returns_return_reason_id_foreign` (`return_reason_id`);

--
-- Indexes for table `return_reasons`
--
ALTER TABLE `return_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statuses_status_type_id_foreign` (`status_type_id`);

--
-- Indexes for table `status_types`
--
ALTER TABLE `status_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggesstion_replies`
--
ALTER TABLE `suggesstion_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_city_id_foreign` (`city_id`),
  ADD KEY `users_zone_id_foreign` (`zone_id`),
  ADD KEY `users_government_id_foreign` (`government_id`),
  ADD KEY `users_phone_code_id_foreign` (`phone_code_id`),
  ADD KEY `users_country_id_foreign` (`country_id`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_user_id_foreign` (`user_id`),
  ADD KEY `user_addresses_city_id_foreign` (`city_id`),
  ADD KEY `user_addresses_zone_id_foreign` (`zone_id`),
  ADD KEY `user_addresses_government_id_foreign` (`government_id`),
  ADD KEY `user_addresses_country_id_foreign` (`country_id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `verification_codes`
--
ALTER TABLE `verification_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_code_unique` (`code`);

--
-- Indexes for table `warranties`
--
ALTER TABLE `warranties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warranties_user_id_foreign` (`user_id`),
  ADD KEY `warranties_admin_id_foreign` (`admin_id`),
  ADD KEY `warranties_currency_id_foreign` (`currency_id`),
  ADD KEY `warranties_phone_code_id_foreign` (`phone_code_id`),
  ADD KEY `warranties_insurance_id_foreign` (`insurance_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zones_city_id_foreign` (`city_id`),
  ADD KEY `zones_government_id_foreign` (`government_id`),
  ADD KEY `zones_country_id_foreign` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `advertise_setttings`
--
ALTER TABLE `advertise_setttings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catalog_categories`
--
ALTER TABLE `catalog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `category_options`
--
ALTER TABLE `category_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `config_categories`
--
ALTER TABLE `config_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contactuses`
--
ALTER TABLE `contactuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deliverytimes`
--
ALTER TABLE `deliverytimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governments`
--
ALTER TABLE `governments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `menu_links`
--
ALTER TABLE `menu_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `newsletter_messages`
--
ALTER TABLE `newsletter_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notification_bodies`
--
ALTER TABLE `notification_bodies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `option_values`
--
ALTER TABLE `option_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=547;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1855;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=747;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `permissions_catrgory`
--
ALTER TABLE `permissions_catrgory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phone_codes`
--
ALTER TABLE `phone_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `poduct_attributes`
--
ALTER TABLE `poduct_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10411;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6363;

--
-- AUTO_INCREMENT for table `product_combinations`
--
ALTER TABLE `product_combinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_discounts`
--
ALTER TABLE `product_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;

--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_option_values`
--
ALTER TABLE `product_option_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reset_passwords`
--
ALTER TABLE `reset_passwords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `return_reasons`
--
ALTER TABLE `return_reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status_types`
--
ALTER TABLE `status_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suggesstion_replies`
--
ALTER TABLE `suggesstion_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `verification_codes`
--
ALTER TABLE `verification_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warranties`
--
ALTER TABLE `warranties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_phone_code_id_foreign` FOREIGN KEY (`phone_code_id`) REFERENCES `phone_codes` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD CONSTRAINT `catalogs_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `catalog_categories`
--
ALTER TABLE `catalog_categories`
  ADD CONSTRAINT `catalog_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `catalog_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_options`
--
ALTER TABLE `category_options`
  ADD CONSTRAINT `category_options_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_options_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `cities_government_id_foreign` FOREIGN KEY (`government_id`) REFERENCES `governments` (`id`);

--
-- Constraints for table `configs`
--
ALTER TABLE `configs`
  ADD CONSTRAINT `configs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `config_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `governments`
--
ALTER TABLE `governments`
  ADD CONSTRAINT `governments_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `insurances`
--
ALTER TABLE `insurances`
  ADD CONSTRAINT `insurances_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `insurances_phone_code_id_foreign` FOREIGN KEY (`phone_code_id`) REFERENCES `phone_codes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `insurances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `merchants`
--
ALTER TABLE `merchants`
  ADD CONSTRAINT `merchants_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `merchants_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `merchants_government_id_foreign` FOREIGN KEY (`government_id`) REFERENCES `governments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `merchants_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `option_values`
--
ALTER TABLE `option_values`
  ADD CONSTRAINT `option_values_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_current_status_type_id_foreign` FOREIGN KEY (`current_status_type_id`) REFERENCES `status_types` (`id`),
  ADD CONSTRAINT `orders_user_address_id_foreign` FOREIGN KEY (`user_address_id`) REFERENCES `user_addresses` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_combination_id_foreign` FOREIGN KEY (`combination_id`) REFERENCES `product_combinations` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD CONSTRAINT `order_statuses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_statuses_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `poduct_attributes`
--
ALTER TABLE `poduct_attributes`
  ADD CONSTRAINT `poduct_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `poduct_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_combinations`
--
ALTER TABLE `product_combinations`
  ADD CONSTRAINT `product_combinations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_discounts`
--
ALTER TABLE `product_discounts`
  ADD CONSTRAINT `product_discounts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_options_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_option_values`
--
ALTER TABLE `product_option_values`
  ADD CONSTRAINT `product_option_values_option_value_id_foreign` FOREIGN KEY (`option_value_id`) REFERENCES `option_values` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_option_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `returns`
--
ALTER TABLE `returns`
  ADD CONSTRAINT `returns_order_product_id_foreign` FOREIGN KEY (`order_product_id`) REFERENCES `order_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `returns_return_reason_id_foreign` FOREIGN KEY (`return_reason_id`) REFERENCES `return_reasons` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `returns_user_address_id_foreign` FOREIGN KEY (`user_address_id`) REFERENCES `user_addresses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `returns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `statuses`
--
ALTER TABLE `statuses`
  ADD CONSTRAINT `statuses_status_type_id_foreign` FOREIGN KEY (`status_type_id`) REFERENCES `status_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_government_id_foreign` FOREIGN KEY (`government_id`) REFERENCES `governments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_phone_code_id_foreign` FOREIGN KEY (`phone_code_id`) REFERENCES `phone_codes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_addresses_government_id_foreign` FOREIGN KEY (`government_id`) REFERENCES `governments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_addresses_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD CONSTRAINT `user_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
