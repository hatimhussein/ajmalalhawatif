-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 02:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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
  `orders_zones` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_type` int(11) NOT NULL,
  `status_levels` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `orders_zones`, `order_type`, `status_levels`) VALUES
(1, 'ajmal', 'ajmal@ajmalalhawatif.com', 'ajmal@ajmalalhawatif.com', '$2y$10$RLJnS4yZecUTp8h0DPCIOeS4dZfB8Rg0J8A32R6vDxUr3erOW0yq6', NULL, '2019-08-04 22:00:00', '2021-03-17 12:46:58', '47,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108', 2, '1,2,3,4,6,7,9'),
(3, 'Eslam', 'Eslam Tarek', 'eslam@admin.com', '$2y$10$h6plshibdTp8sPEBuHbg4enWSGWgOuVvavwbofMaPeCzES/Z9/6pm', NULL, '2020-08-24 21:21:22', '2021-03-17 13:09:44', '47,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192', 2, '1,2,3,4,6,7'),
(4, 'علي حسن الشمراني', 'ali', '3li@ajmalalhawatif.com', '$2y$10$MIMiqxwqx9GrhF6vUlu/WuqUCEFMCY0O.UlH3dhUigZSP1x8iLeK6', NULL, '2020-09-07 05:43:41', '2021-01-06 09:21:56', '47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,', 2, ''),
(5, 'حسن علي الشمراني', 'hassan', 'hahwash19@gmail.com', '$2y$10$Mau20c4RO3rHasDhnqSaLuiK2JXwAalSVfL/97Ch6G0Lyh.3dbOJS', NULL, '2020-09-12 02:46:10', '2021-01-06 09:21:25', '47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,', 2, ''),
(6, 'ادارة المنطقة الشرقية', 'Eastern', 'Eastern@ajmalalhawatif.com', '$2y$10$LnaUdGL8oou0EJS7Cm6gVO1ulJv2ZiLTVndLdzkRoFeQ9Syfp.lFS', NULL, '2020-09-12 02:49:10', '2021-01-29 19:26:11', '106,107,108,109,110,111,112,113,114,115,116,117', 1, '1,2,3'),
(7, 'ادارة المنطقة الغربية', 'Western', 'Western@ajmalalhawatif.com', '$2y$10$k3b0GGKu.XSvNLxOfrWo0.vGGvjNRjS4Vd6FMTmGq856PDf/dVEIi', NULL, '2020-09-12 02:51:35', '2021-01-06 09:18:45', '67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92', 1, ''),
(8, 'ادارة المنطقة الشمالية', 'Northern', 'Northern@ajmalalhawatif.com', '$2y$10$7jq.i7vfQtLYH6bJa/PzW.h6p7fbAQK.4iyHgy.pJ5kAX4f46Zyxe', NULL, '2020-09-12 02:52:25', '2021-01-06 09:08:05', '93,94,95,96,97,98,99,100,101,102,103,104,105,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,189,190,191,192', 1, ''),
(9, 'ادارة المنطقة الجنوبية', 'Southern', 'Southern@ajmalalhawatif.com', '$2y$10$vAtzIn7CCZwfY9JMyMTEn.yKkMD4hbmHxDFN4ixErzvE4puN0dzFS', NULL, '2020-09-12 03:05:13', '2021-01-21 02:30:43', '118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185', 1, ''),
(10, 'ادارة المنطقة الوسطى', 'Riyadh', 'Riyadh@ajmalalhawatif.com', '$2y$10$hDczLTfs0A073yUZ858Z2eNUGm2bqLwgTgJNKRFzVn0CMlKT0Q/F.', NULL, '2020-09-12 03:06:13', '2021-01-06 09:20:45', '47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66', 1, ''),
(11, 'ادارة التصميم', 'Designer', 'Designer@ajmalalhawatif.com', '$2y$10$QdKjRQJFZ322nJ75kA7/8.vj9mV375psLd60IK5lV8m3MDM1Fo4Ea', NULL, '2020-09-12 03:07:09', '2021-02-22 17:04:12', '47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107', 2, '1,2,3,4,6,7');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `image`, `link`, `position`, `title`, `created_at`, `updated_at`) VALUES
(1, '1614272712ع قعقفعقفعثفع ع قفع ع-01.png', 'http://protection2.pioneers-solutions.org/category/47', 1, 'الرئيسية تحت الاسليدر', NULL, '2021-02-25 18:05:12'),
(2, '1614198415بيب-01.png', 'http://wagdystoreha.com/product-details/20', 2, 'الرئيسية تحت الاسليدر', NULL, '2021-02-24 21:26:55'),
(3, '1614272728ع قعقفعقفعثفع ع قفع ع-01.png', 'http://protection2.pioneers-solutions.org/category/47', 3, 'اسفل الرئيسية', NULL, '2021-02-25 18:05:28'),
(4, '1614199008بشثقثصقثق-01.png', 'http://wagdystoreha.com/product-details/27', 4, 'اسفل الرئيسية', NULL, '2021-02-24 21:36:48');

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
(1, 'اول اعلانين', 'the first two announcements', 0, NULL, '2021-03-14 20:43:09'),
(2, 'ثانى اعلانين', 'the second two announcement', 0, NULL, '2021-03-02 15:37:17');

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
(74, 'بورودو', 'Porodo', '1609875180z6NLfWaSvt7Fv9oSfHnQzd6eUa85r2RxasMtb2SH.png', 4, '2021-01-05 20:30:04', '2021-01-05 20:33:00'),
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
(88, 'ايلاقو', 'elago', '1609875087ئ.png', 18, '2021-01-05 20:30:04', '2021-01-05 20:31:27'),
(89, 'راف باور', 'Ravepower', '1609912723bkleTa40Yqv9sM6NvXZ9o2PQwe16wyw8vLJ3MR3s.png', 19, '2021-01-05 20:30:04', '2021-01-06 06:58:43'),
(90, 'كوداك', 'Kodak', '1609912767Xbp5viMcg6ktsaBJXf8B2OGQjZHIrxocrZRKY3yY.png', 20, '2021-01-05 20:30:04', '2021-01-06 06:59:27'),
(91, 'بيلكن', 'Belkin', '1609875259ضض.png', 21, '2021-01-05 20:30:04', '2021-01-05 20:34:19'),
(92, 'بلانيت رونيكس', 'Plantronics', '1609875222ييي.png', 22, '2021-01-05 20:30:04', '2021-01-05 20:33:42'),
(93, 'هونر', 'honor', '1609913466تنزيل.png', 23, '2021-01-05 20:30:04', '2021-01-06 07:11:06'),
(94, 'اوبو', 'OPPO', '1609913634تنزيل (2).png', 24, '2021-01-05 20:30:04', '2021-01-06 07:13:54'),
(95, 'فيفا مدرير', 'VIVA MADRID', '1609912890zTgPPO9Ohl6it70FfNaJKGsN0GgBszXcvjVFc8ko.png', 25, '2021-01-05 20:30:04', '2021-01-06 07:01:30'),
(96, 'باور بيتس', 'Powerbeats', '1609913586تنزيل (1).png', 26, '2021-01-05 20:30:04', '2021-01-06 07:13:06'),
(98, 'يونيك', 'Uniq', '1609913501q3H2We1CUUm32b7OEW1LgzRStJ8Zy8uOlaLcTs1r.jpeg', 28, '2021-01-05 20:30:04', '2021-01-06 07:11:41'),
(99, 'موماكس', 'Momax', '1609912794anqbwRgb9mDWzx2aAPCRhgoYYMYw8Bg7I2ZSr9Bl.png', 29, '2021-01-05 20:30:04', '2021-01-06 06:59:54'),
(100, 'نوكيس', 'Nuckees', '1609911993LrahVI68LiUmfCrHl1zBhA06RMlZ4OTluK0sEp9A.png', 30, '2021-01-05 20:30:04', '2021-01-06 06:46:34'),
(101, 'دي جي اي', 'dji', '1609914312Tc05ERV9Q8vy8HJ3UVaOicmvyNglnZtN6oiISArF.png', 31, '2021-01-05 21:22:38', '2021-01-06 07:25:12'),
(102, 'جريين', 'Green', '1609914378IMvn63EJ1ad6DyTqrovmFpCsSb2lqHX5RWadOVg3.png', 32, '2021-01-06 07:26:18', '2021-01-06 07:26:18'),
(103, 'بوز', 'Bose', '1609914406Yv95pEpv5MYiD2kTyvvxMy2UmnqubHSi5HStyQrk.png', 33, '2021-01-06 07:26:46', '2021-01-06 07:26:46'),
(104, 'هاندل', 'Handel', '1609914440C8e0dtcgF59OStOIODzFobDkajktBF9YhSt9N3Q4.png', 34, '2021-01-06 07:27:20', '2021-01-06 07:27:20'),
(105, 'موفي', 'mophie', '1609914468CdchC6QOJ3FZIQKMZUarSkR4YZHenDwyfZXiC9Lj.png', 37, '2021-01-06 07:27:48', '2021-01-06 07:27:48'),
(106, 'بانزر قلاس', 'Panzer Glass', '1609914521تنزيل.png', 38, '2021-01-06 07:28:41', '2021-01-06 07:28:41'),
(107, 'جير فور', 'Gear 4', '1609914569xjbQRCeb.jpg', 39, '2021-01-06 07:29:29', '2021-01-06 07:29:29'),
(108, 'تيك 21', 'tec21', '1609914637brands-logods--324x324.jpg', 40, '2021-01-06 07:30:37', '2021-01-06 07:30:37'),
(109, 'اكس بانثر', 'X Panther', '1609914797iYlLzjqJ_400x400.jpg', 41, '2021-01-06 07:31:13', '2021-02-23 21:56:26'),
(110, 'سوني', 'Sony', '1609914743تنزيل (1).png', 42, '2021-01-06 07:32:23', '2021-01-06 07:32:23'),
(111, 'نمبر ون', 'Number One', '1610043722smoothX_.png', 35, '2021-01-07 19:22:02', '2021-01-07 19:22:02'),
(112, 'لوكسار', 'Loksar', '1612383901dsdsdA-01.png', 43, '2021-02-02 15:02:43', '2021-02-03 21:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `item_combination` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `offer_price` double NOT NULL DEFAULT 0,
  `offer_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'value',
  `offer_end_time` datetime NOT NULL DEFAULT current_timestamp(),
  `offer_send_time` datetime DEFAULT NULL,
  `is_sent` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `item_combination`, `quantity`, `offer_price`, `offer_type`, `offer_end_time`, `offer_send_time`, `is_sent`, `created_at`, `updated_at`) VALUES
(159, 218, 628, NULL, 6, 0, 'value', '2021-02-25 16:44:07', NULL, 1, '2021-02-25 15:44:07', '2021-02-28 14:34:54'),
(160, 218, 627, NULL, 12, 0, 'value', '2021-02-25 16:44:07', NULL, 1, '2021-02-25 15:44:07', '2021-02-28 14:34:56'),
(161, 218, 626, NULL, 2, 0, 'value', '2021-02-25 16:44:07', NULL, 1, '2021-02-25 15:44:07', '2021-02-28 14:34:57'),
(162, 218, 630, NULL, 1, 0, 'value', '2021-02-25 16:44:07', NULL, 1, '2021-02-25 15:44:07', '2021-02-25 15:44:07'),
(205, 218, 654, NULL, 1, 0, 'value', '2021-02-28 15:35:00', NULL, 1, '2021-02-28 14:35:00', '2021-02-28 14:35:00'),
(282, 219, 627, NULL, 2, 0, 'value', '2021-03-11 14:17:50', NULL, 1, '2021-03-11 13:17:50', '2021-03-14 20:43:42'),
(283, 219, 626, NULL, 1, 0, 'value', '2021-03-11 14:17:53', NULL, 1, '2021-03-11 13:17:53', '2021-03-11 13:17:53'),
(284, 219, 628, NULL, 1, 0, 'value', '2021-03-11 14:17:54', NULL, 1, '2021-03-11 13:17:54', '2021-03-11 13:17:54'),
(285, 219, 654, NULL, 1, 0, 'value', '2021-03-11 14:17:56', NULL, 1, '2021-03-11 13:17:56', '2021-03-11 13:17:56'),
(312, 225, 1412, NULL, 1, 0, 'value', '2021-04-04 10:49:44', NULL, 1, '2021-04-04 09:49:44', '2021-04-04 09:49:44');

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
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `viewed_levels` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `name_en`, `name_ar`, `desc_en`, `desc_ar`, `file`, `brand_id`, `viewed_levels`, `created_at`, `updated_at`) VALUES
(3, 'zx2', 'te2', 'zx22', 'te22', '1616333769.pdf', 73, '1,5', '2021-03-21 14:27:30', '2021-03-23 13:58:35'),
(4, 'testen', 'test', 'testen testen', 'test', '1616504294.pdf', 72, '1,2,3,4,5', '2021-03-23 13:58:14', '2021-03-23 13:58:14');

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
  `sort_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `photo`, `status`, `created_at`, `updated_at`, `in_home_page`, `sort_order`) VALUES
(62, NULL, 'الهواتف الذكية', 'Mobiles', 'الهواتف الذكية', 'Mobiles', '1614191827ي-12.png', 1, '2021-01-05 15:40:23', '2021-03-16 10:45:34', 0, 1),
(63, NULL, 'البطاريات', 'batteries', 'البطاريات', 'batteries', '1614191812ي-11.png', 1, '2021-01-05 15:41:03', '2021-03-16 10:45:34', 0, 2),
(64, NULL, 'الكيابل', 'Cable', 'الكيابل', 'Cable', '1614191788ي-10.png', 1, '2021-01-05 15:41:48', '2021-03-16 10:45:34', 1, 3),
(65, NULL, 'الكفرات', 'Covers', 'الكفرات', 'Covers', '16098577391.png', 0, '2021-01-05 15:42:19', '2021-03-16 10:45:22', 0, 4),
(66, NULL, 'مكبرات الصوت (سبيكرات)', 'Speakers', 'مكبرات الصوت (سبيكرات)', 'Speakers', '16098577816.png', 1, '2021-01-05 15:43:01', '2021-03-07 11:59:02', 0, 5),
(67, NULL, 'حماية الشاشة', 'Protection Screen', 'حماية الشاشة', 'Protection Screen', '16142217981614191827ي-12.png', 1, '2021-01-05 15:43:33', '2021-03-07 11:59:02', 0, 6),
(69, NULL, 'السماعات السلكية', 'Headphone', 'السماعات السلكية', 'Headphone', '1614192132بياسب-09.png', 1, '2021-01-05 15:44:24', '2021-03-07 11:56:53', 0, 8),
(70, NULL, 'الطابعات', 'Printer', 'الطابعات', 'Printer', '1609857898pngtree-camera-icon-png-image_1033544.jpg', 0, '2021-01-05 15:44:58', '2021-01-05 15:54:04', 0, 9),
(71, NULL, 'الراوترات', 'Router', 'الراوترات', 'Router', '1609857924تنزيل (1).png', 0, '2021-01-05 15:45:24', '2021-01-05 15:54:12', 0, 10),
(72, NULL, 'الكاميرات', 'Camera', 'الكاميرات', 'Camera', '1609858504pngtree-camera-icon-png-image_1033544.jpg', 1, '2021-01-05 15:53:17', '2021-03-07 11:56:34', 0, 11),
(73, NULL, 'مستلزمات السيارة', 'Car Charger', 'مستلزمات السيارة', 'Car Charger', '1614186646لا-08.png', 1, '2021-01-05 15:55:34', '2021-03-14 20:42:23', 0, 12),
(74, NULL, 'الشواحن المنزليه', 'Home Charger', 'الشواحن المنزليه', 'Home Charger', '16098590921598304610شواحن-ومنصات-small.png', 1, '2021-01-05 15:56:15', '2021-03-14 20:22:38', 1, 13),
(75, NULL, 'مكائن التغليف الحراري', 'Machine', 'المكائن', 'Machine', '1614191753ي-07.png', 1, '2021-01-05 15:57:09', '2021-02-25 21:57:41', 1, 14),
(76, NULL, 'التغليف الحراري', 'Packaging', 'التغليف', 'Packaging', '1614191740ي-06.png', 1, '2021-01-05 15:57:37', '2021-02-25 20:03:47', 1, 15),
(77, NULL, 'قطع الغيار', 'Spare parts', 'قطع الغيار', 'Spare parts', '1609858683iconfinder_11_171503.png', 1, '2021-01-05 15:58:03', '2021-03-07 11:55:53', 0, 16),
(78, NULL, 'سماعات بلوتوث', 'Bluetooth headphones', 'سماعات بلوتوث', 'Bluetooth headphones', '16098587196.png', 1, '2021-01-05 15:58:39', '2021-03-07 11:56:03', 0, 17),
(79, NULL, 'ستاند (مثبت الجوال)', 'Mobile Holder', 'ستاند (مثبت الجوال)', 'Mobile Holder', '1609858750grip-150x150.png', 1, '2021-01-05 15:59:10', '2021-03-07 11:56:03', 0, 18),
(80, NULL, 'الساعات و الاساور', 'Smart watch accessories', 'الساعات و الاساور (الذكية)', 'Smart watch accessories', '1614192010بيبيب-05.png', 1, '2021-01-05 15:59:33', '2021-03-14 20:21:31', 0, 19),
(81, NULL, 'المساكات و المقابض', 'Grips', 'مسكات وقبضات', 'Grips', '1614191709ي-04.png', 1, '2021-01-05 16:00:02', '2021-03-07 11:55:49', 0, 20),
(82, NULL, 'الحقائب', 'bags', 'حقائب', 'bags', '16141922533201-03.png', 1, '2021-01-05 16:00:29', '2021-03-14 20:21:23', 0, 21),
(83, NULL, 'ملحقات الالعاب', 'Games', 'العاب', 'Games', '1614192201لبلبل-02.png', 1, '2021-01-05 16:00:50', '2021-03-07 15:07:59', 0, 22),
(84, NULL, 'ملحقات التصوير', 'Photo accessories', 'ملحقات تصوير', 'Photo accessories', '1614186615لا-01.png', 1, '2021-01-05 16:01:13', '2021-03-07 15:07:59', 0, 23),
(85, NULL, 'عام', 'Public', 'عام', 'Public', '1610859679C5892802-792D-4DD8-BBDE-E224033D679C.png', 0, '2021-01-07 19:36:54', '2021-02-16 07:23:36', 0, 24);

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
(56, 'Riyadh', 'الرياض', 11, 1, '2021-01-06 07:48:26', '2021-01-06 07:48:55', 35),
(57, 'Qassim', 'القصيم', 12, 1, '2021-01-06 07:48:26', '2021-01-06 07:49:55', 35),
(58, 'Tabuk', 'تبوك', 12, 1, '2021-01-06 07:48:26', '2021-01-06 07:52:01', 35),
(59, 'Hail', 'حائل', 12, 1, '2021-01-06 07:48:26', '2021-01-06 07:52:13', 35),
(60, 'alhudud alshamalia', 'الحدود الشمالية', 12, 1, '2021-01-06 07:48:26', '2021-01-06 07:52:30', 35),
(61, 'aljawf', 'الجوف', 12, 1, '2021-01-06 07:48:26', '2021-01-06 07:53:55', 35),
(62, 'Mecca', 'مكة المكرمة', 13, 1, '2021-01-06 07:50:35', '2021-01-06 07:50:35', 35),
(63, 'Medina', 'المدينة المنورة', 13, 1, '2021-01-06 07:50:58', '2021-01-06 07:50:58', 35),
(64, 'Dammam', 'الدمام', 14, 1, '2021-01-06 07:51:24', '2021-01-06 08:33:29', 35),
(65, 'easir', 'عسير', 15, 1, '2021-01-06 07:51:47', '2021-01-06 07:51:47', 35),
(66, 'Jazan', 'جازان', 15, 1, '2021-01-06 07:52:54', '2021-01-06 07:52:54', 35),
(67, 'Najran', 'نجران', 15, 1, '2021-01-06 07:53:19', '2021-01-06 07:53:19', 35),
(68, 'albaha', 'الباحه', 15, 1, '2021-01-06 07:53:43', '2021-01-06 07:53:43', 35);

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
  `ex_value` text DEFAULT NULL,
  `type` varchar(191) NOT NULL DEFAULT 'color',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `key`, `name_ar`, `name_en`, `value`, `ex_value`, `type`, `updated_at`, `created_at`) VALUES
(1, 'btn-primary-bg', 'الزر الرئيسى', 'Primary Button', '#585651', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(2, 'btn-primary-color', 'خط الزر الرئيسى', 'Primary Button Text', '#ffffff', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(3, 'btn-secondary-bg', 'الزر الثانوى', 'Secondary Button', '#1fd6c1', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(4, 'btn-secondary-color', 'خط الزر الثانوى', 'Secondary Button Text', '#ffffff', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(5, 'navbar-bg', 'شريط اعلى الصفحة', 'NavBar', '#1fd6c1', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(6, 'navbar-color', 'نص شريط اعلى الصفحة', 'NavBar Text', '#000000', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(7, 'brands-bg', 'العلامات التجارية', 'Brands', '#ffffff', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(8, 'newsletter-bg', 'خلفية القائمة البريدية', 'Newsletter Background', '#1f1f1f', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(9, 'footer-bg', 'اسفل الصفحة', 'Footer', '#000000', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(10, 'footer-color', 'نص اسفل الصفحة', 'Footer Text', '#ffffff', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(11, 'primary-color', 'اللون الرئيسى', 'Primary Color', '#000000', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(12, 'secondary-color', 'اللون الثانوى', 'Secondary Color', '#d1d1d1', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(13, 'cart-bg', 'اضف للسلة', 'Add to Cart', '#000000', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(14, 'cart-color', 'نص اضف للسلة', 'Add to Cart text', '#ffffff', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(15, 'cart-hover', 'تفعيل اضف للسلة', 'Add to cart hover', '#1fd6c1', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(16, 'font-ar', 'الخط العربى', 'Arabic Font', 'Cairo, sans-serif', 'https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap', 'font', '2021-04-28 11:49:44', '2020-11-29 09:01:43'),
(17, 'font-en', 'الخط الانجليزى', 'English Font', 'Roboto', '/assets/front/assets/fonts/Roboto-Bold.ttf', 'font', '2021-04-28 11:49:44', '2020-11-29 09:01:43'),
(18, 'header-bg', 'اعلى الصفحة', 'Header', '#000000', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(19, 'header-color', 'نص اعلى الصفحة', 'Header Text', '#ffffff', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(26, 'Icon-cart', 'لون مربع ايقونة السلة', 'Color Cart icon', '#000000', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(27, 'Cart-icon', 'لون ايقونة السلة', 'Color Cart icon', '#000000', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(28, 'Search-icon', 'لون زر المكبر البحث', 'Search Icon', '#ffffff', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(29, 'Login_text', 'نص تسجيل الدخول وحسابي', 'Login Text', '#ffffff', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(30, 'menu_color', 'لون خلفية القائمة', 'Menu Color', '#1f1f1f', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(31, 'menu_text_color', 'لون نص القائمة', 'Menu Text Color', '#ffffff', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(32, 'mobile_menu_color', 'لون خلفية قائمة الجوال', 'Mobile Menu Color', '#ffffff', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(33, 'mobile_menu_text_color', 'لون نص قائمة الجوال', 'Mobile Menu Text Color', '#000000', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43'),
(34, 'brands-color', 'نص العلامات التجارية', 'Brands Text', '#ff0000', NULL, 'color', '2021-03-17 12:04:01', '2020-11-29 09:01:43');

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
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `key`, `display_name_ar`, `display_name_en`, `value_ar`, `value_en`, `category_id`, `photo`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'about', 'عن الشركة', 'About US', '<p dir=\"RTL\" style=\"margin-right:48px; text-align:right\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>&nbsp;</strong><strong><span style=\"font-size:13.5pt\"><span style=\"color:black\">شركة أجمل الهواتف (</span></span></strong><strong><span dir=\"LTR\" style=\"font-size:13.5pt\"><span style=\"color:black\">Ajmal Alhawatif</span></span></strong><strong><span style=\"font-size:13.5pt\"><span style=\"color:black\">) للاتصالات وتقنية المعلومات&nbsp;</span></span></strong></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:48px; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">هي إحدى الشركات الرائدة فى السوق السعودي&nbsp;فى مجال الاتصالات وتقنية المعلومات .</span></span></span></span></p>\r\n\r\n<ul style=\"list-style-type:square\">\r\n	<li dir=\"RTL\" style=\"text-align:right\">\r\n	<ul style=\"list-style-type:square\">\r\n		<li dir=\"RTL\" style=\"text-align:right\">\r\n		<ul style=\"list-style-type:square\">\r\n			<li dir=\"RTL\" style=\"text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">- انشئت الشركة فى مطلع عام 2008 م على يد نخبة من المتخصصين لتبدأ نشاطها وتنافس فى الريادة .</span></span></span></span></li>\r\n			<li dir=\"RTL\" style=\"text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">- حققت العديد من الإنجازات فى تلك الفترة القصيرة واستحوذت على ثقة العملاء وأصبح لدينا عملاء نعتز بهم من مختلف مناطق المملكة .</span></span></span></span></li>\r\n			<li dir=\"RTL\" style=\"text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">- هدفنا تمكين ودعم قطاعات الاتصالات وتقنية المعلومات&nbsp;فى الشرق الأوسط وتغيير مفهوم الشراء والبيع لدى التجار&nbsp;بطرق حديثه .</span></span></span></span></li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:144px; text-align:right\">&nbsp;</p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:144px; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:13.5pt\"><span style=\"background-color:#f39c12\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"color:black\">تهدف رسالة الشركة الى دعم نمو قطاع الأعمال من خلال :-</span></span></span></span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"list-style-type:none\">\r\n	<ul>\r\n		<li style=\"list-style-type:none\">\r\n		<ul>\r\n			<li style=\"list-style-type:none\">\r\n			<ul style=\"list-style-type:square\">\r\n				<li dir=\"RTL\" style=\"text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">- توفير منتجات ذات جوده عالية وخدمات&nbsp;متكاملة تبدأ من الطلب حتى استلام المنتج عبر لوحه تحكم&nbsp;كامله ومتابعة حالة الطلب حتى الاستلام .&nbsp;</span></span></span></span></li>\r\n				<li dir=\"RTL\" style=\"text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">- التطوير والتحديث الدائم للعملاء بما يلائم احتياجاتهم وتطلعاتهم لاستخدام أفضل وأحدث التقنيات</span></span><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"> لتسهيل اعمال التجاره لهم .</span></span></span></span></li>\r\n				<li dir=\"RTL\" style=\"text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">- مراعاة التكامل والجودة فى كل مانقوم بتطويره لتقديم أفضل النتائج لعملائنا</span></span></span></span></li>\r\n				<li dir=\"RTL\" style=\"text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">- تقديم أفضل خدمات مابعد البيع لتحقيق أقصى استفادة من استخدام منتجاتنا وتسهيل إدارة وتطوير أعمال عملائنا</span></span><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"> .</span></span></span></span></li>\r\n			</ul>\r\n			</li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n</ul>', '<pre>\r\nAjmal Alhawatif is one of the leading companies in the Saudi market in the field of communications and information technology.\r\n- It was established in early 2008 by a group of specialists to start its activity and compete in leadership.\r\n- It achieved many achievements in that short period and gained the confidence of customers, and we have clients that we cherish from different regions of the Kingdom.\r\nOur goal is to empower and support the telecommunications and information technology sectors in the Middle East and to change the concept of buying and selling with merchants in modern ways to manage integrated resources.\r\nThe company&#39;s mission aims to support the growth of the business sector through: -\r\nProviding high-quality products and integrated services starting from ordering until receiving the product with a control panel to manage their resources and develop their business\r\n</pre>\r\n\r\n<pre>\r\nContinuous development and modernization to suit their needs and aspirations to use the best and latest technologies\r\n- Taking into account integrity and quality in everything we develop to provide the best results for our clients\r\nProviding the best technical support and consulting services to make the most of the use of our applications and software solutions in managing and developing our clients&#39; businesses</pre>', 2, NULL, NULL, NULL, '2020-11-30 09:49:37'),
(2, 'map', 'خريطة الموقع', 'Site Map', '<div class=\"static-contain\">\r\n<h4>.</h4>\r\n</div>', '<div class=\"static-contain\">\r\n<h4>.</h4>\r\n</div>', 2, NULL, NULL, NULL, '2020-11-20 02:39:13'),
(3, 'return', 'سياسة الاسترجاع', 'Return Policy', '<h1 dir=\"LTR\" style=\"text-align:right\"><strong><span style=\"font-size:24pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span dir=\"RTL\" lang=\"AR-SA\" style=\"font-size:26.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">سياسة الضمان والإستبدال والإسترجاع&nbsp; :&nbsp; &nbsp; &nbsp;</span></span></span>&nbsp;&nbsp;</span></span></span></strong></h1>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">1- الجهاز المراد استبداله يكون بحالته الأصليه بدون أي استخدام بكامل اكسسواراته وبالتعبئه الأصليه له وبكامل اكسسوارات التغليف .</span></span></span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">2- يحق للعميل الإستبدال خلال ثلاثة أيام (3)&nbsp; من تاريخ الاستلام كحد أقصى والإسترجاع خلال يوم واحد (1) من تاريخ الاستلام كحد أقصى .</span></span></span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">3- للإستفاده من خدمة الضمان يلزم إحضار المنتج مع أصل فاتورة الشراء للمنتجات التي عليها ضمان فقط .&nbsp;</span></span></span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">4- الضمان لا يغطي أي اضرار ناتجه عن حدوث ( الحوادث - سوء الاستخدام - الرطوبه - الصدأ- الاضرار الناتجه عن طول مدة الاستخدام - التعديلات - استخدام جهد كهربائي غير متوافق او بطريقه لا تتوافق مع تعليمات الشركة المصنعه - الاضرار الناتجه عن السقوط او التعرض للسوائل )</span></span></span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">5- الضمان يعتبر لاغي في حال تم إزالة او تعديل او طمس او تحريف بأي شكل من الاشكال الرقم التسلسلي للمنتج او فاتورة الشراء .</span></span></span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">6- ينبغي على العميل تسليم المنتج ان كان به ضرر في مده لا تتجاوز 48 ساعه من تاريخ استلامه للتأكد وفحص المنتج ان كان به عطل مصنعي او سوء استخدام ويتم ارساله للشركة او الوكيل ويستغرق ذلك مده اقصاها 15&nbsp; يوم من تاريخ استلام المنتج من شركة الشحن .&nbsp;</span></span></span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">7- المشتريات المدفوعه بقسائم شرائيه او بطاقات ائتمانيه او نقاط لا يمكن ارجاعها نقداً .</span></span></span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:24px; text-align:right\"><strong><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"background-color:white\">8- يمكنك التواصل معنا عبر البريد الإلكتروني Ajmal</span></span>@Ajmalalhawatif.com<span style=\"font-size:11.0pt\"><span style=\"background-color:white\">&nbsp; أو عبر مواقع التواصل الإجتماعي الخاصة بنا&nbsp; او واتساب&nbsp;&nbsp;</span></span><u><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><a href=\"https://api.whatsapp.com/send?phone=+966%2059%20987%205347&amp;text=&amp;source=&amp;data=&amp;app_absent=\" style=\"box-sizing:border-box; text-rendering:optimizelegibility; -webkit-font-smoothing:antialiased; transition:color 0.3s ease 0s; color:blue; text-decoration:underline\">اضغط هنا</a></span></span></u></span></span></span></strong></p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:right\">&nbsp;</p>\r\n\r\n<div class=\"row\" style=\"-webkit-text-stroke-width:0px; margin-left:-15px; margin-right:-15px; text-align:right; text-indent:0px\">\r\n<div class=\"panel-group\" style=\"margin-bottom:16px\">\r\n<div class=\"panel\" style=\"border-radius:0px\">\r\n<div class=\"panel-body text-gray\" style=\"padding:0px 20px 20px 0px\">\r\n<p dir=\"RTL\" style=\"margin-right:24px\">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '<pre>\r\nWarranty, Exchange and Return Policy:\r\nWarranty, Exchange and Return Policy:\r\n\r\n\r\n\r\n1- The device to be replaced shall be in its original condition without any use with all its accessories, its original packaging and complete packaging accessories.\r\n\r\n\r\n\r\n2- The customer is entitled to exchange within three (3) days from the date of receipt as a maximum, and to return within one (1) day from the date of receipt as a maximum.\r\n\r\n\r\n\r\n3- To benefit from the warranty service, it is necessary to bring the product with the original purchase invoice for the products that have a guarantee only.</pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n4- The warranty does not cover any damages resulting from the occurrence of (accidents - misuse - dampness - rust - damage resulting from prolonged use - modifications - use of incompatible electrical voltage or in a way that does not comply with the manufacturer&#39;s instructions - damage resulting from falling or exposure to liquids. )\r\n\r\n\r\n\r\n5- The warranty is considered invalid if the serial number of the product or the purchase invoice is removed, modified, obscured, or corrupted in any way.\r\n\r\n\r\n\r\n6- The customer should deliver the product if it is damaged within a period not exceeding 48 hours from the date of receiving it to make sure and examine the product if it has a manufacturing defect or misuse and it is sent to the company and this takes a maximum of 21 days from receiving the product from the shipping company.</pre>\r\n\r\n<pre>\r\n\r\n&nbsp;</pre>\r\n\r\n<pre>\r\n7- Purchases paid with vouchers, credit cards, or points that cannot be returned for cash.\r\n\r\n\r\n\r\n8- You can contact us via e-mail info@Ajmalalhawatif.com or via our social media sites or WhatsApp, click here.</pre>\r\n\r\n<p>&nbsp;</p>', 1, NULL, NULL, NULL, '2021-02-16 14:36:08'),
(4, 'aman', 'سياسة الامان', 'Security Policy', '<p>سياسة الامان</p>', '<p>سياسة الامان</p>', 1, NULL, NULL, NULL, '2019-11-13 05:33:46'),
(5, 'privacy', 'سياسة الخصوصية', 'Privacy Policy', '<h1>سياسة الخصوصية</h1>\r\n\r\n<h2>من نحن</h2>\r\n\r\n<p>عنوان موقعنا على الويب: Ajmalalhawatif.com</p>\r\n\r\n<h2>ما البيانات الشخصية التي نجمعها ولماذا نقوم بجمعها</h2>\r\n\r\n<h3>تعليقات</h3>\r\n\r\n<p>عندما يترك الزائرون تعليقاتهم على الموقع، نجمع البيانات الموضحة في نموذج التعليقات، وكذلك عنوان IP الخاص بالزائر وسلسلة وكلاء متصفح المستخدم للمساعدة في اكتشاف الرسائل غير المرغوب فيها.</p>\r\n\r\n<p>قد يتم توفير سلسلة مجهولة المصدر تم إنشاؤها من عنوان بريدك الإلكتروني (وتسمى أيضًا hash) إلى خدمة Gravatar لمعرفة ما إذا كنت تستخدمها. سياسة خصوصية خدمة Gravatar متوفرة هنا: //automattic.com/privacy/. بعد الموافقة على تعليقك، ستكون صورة ملفك الشخصي مرئية للعامة في سياق تعليقك.</p>\r\n\r\n<h3>وسائط</h3>\r\n\r\n<p>إذا قمت بتحميل الصور إلى موقع الويب، يجب تجنب تحميل الصور مع بيانات الموقع المضمنة (EXIF GPS). يمكن لزوّار الموقع تنزيل واستخراج أي بيانات موقع من الصور على موقع الويب.</p>\r\n\r\n<h3>نماذج الاتصال</h3>\r\n\r\n<h3>ملفات تعريف الارتباط</h3>\r\n\r\n<p>إذا تركت تعليقًا على موقعنا، فيمكنك تمكين حفظ اسمك وعنوان بريدك الإلكتروني وموقعك الإلكتروني في ملفات تعريف الارتباط. هذه هي لراحتك حتى لا تضطر إلى ملء التفاصيل الخاصة بك مرة أخرى عند ترك تعليق آخر. ستستمر ملفات تعريف الارتباط هذه لمدة عام واحد.</p>\r\n\r\n<p>إذا قمت بزيارة صفحة تسجيل الدخول الخاصة بنا، فسنهيئ ملف تعريف ارتباط مؤقت لتحديد ما إذا كان مستعرضك يقبل هذه الملفات. لايحوي ملف تعريف الارتباط هذا أي بيانات شخصية كما يتم التخلص منه عندما تقوم بإغلاق متصفحك.</p>\r\n\r\n<p>عندما تسجّل الدخول نقوم أيضاً بتهيئة ملفات عديدة لتعريف الارتباط من أجل حفظ معلومات دخولك وخيارات شاشة العرض الخاصة بك. ملفات تعريف الارتباط لمعلومات الدخول تبقى ليومين، بينما تبقى ملفات تعريف ارتباط خيارات شاشة العرض لمدة سنة. سيستمر تسجيل دخولك طيلة أسبوعين عندما تختار \\&rdquo;تذكرني\\&rdquo;، وإذا قمت بتسجيل خروجك من الحساب، سيتم حذف ملفات تعريف ارتباط تسجيل الدخول.</p>\r\n\r\n<p>سيُحفظ ملف إضافي لتعريف الارتباط في مستعرضك إذا قمت بتحرير أو نشر مقال. وهذا الملف لايتضمن أي بيانات شخصية فكل ما في الأمر أنه يشير إلى معرّف المقالة التي حررتها. وستنتهي صلاحيته بعد يوم واحد.</p>\r\n\r\n<h3>المحتوى المضمّن من مواقع ويب أخرى</h3>\r\n\r\n<p>المقالات على هذا الموقع قد تشمل محتوى مضمّناً (على سبيل المثال: كمقاطع الفيديو، الصور، المقالات .. الخ). يتصرّف المحتوى المضمَّن من مواقع ويب أخرى بالطريقة نفسها تماماً كما لو أن الزائر زار الموقع الآخر.</p>\r\n\r\n<p>قد تجمع مواقع الويب هذه بيانات عنك، وتستخدم ملفات تعريف الارتباط، وتقوم بضمين تتبعًا إضافيًا &ndash; تابعًا لجهة ثالثة خارجية، وتراقب تفاعلك مع هذا المحتوى المضمّن، بما في ذلك تتبع تفاعلك مع المحتوى المضمن إذا كان لديك حساب وتم تسجيل دخولك إلى ذلك الموقع.</p>\r\n\r\n<h3>التحليلات</h3>\r\n\r\n<h2>مع من نشارك بياناتك</h2>\r\n\r\n<h2>ماهي مدة احتفاظنا ببياناتك</h2>\r\n\r\n<p>إذا تركت تعليقاً، فسيتم الاحتفاظ بالتعليق والبيانات الوصفية الخاصة به إلى أجل غير مسمى. وهذا حتى يمكننا التعرّف على أي تعليقات متتابعة والموافقة عليها تلقائياً بدلاً من الاحتفاظ بها في قائمة انتظار المراجعة للموافقة عليها.</p>\r\n\r\n<p>بالنسبة للمستخدمين الذين قاموا بالتسجيل على موقعنا (إن وجد)، نقوم أيضًا بتخزين المعلومات الشخصية التي يقدمونها في ملف تعريف المستخدم الخاص بهم. يمكن لجميع المستخدمين الاطلاع على معلوماتهم الشخصية أو تعديلها أو حذفها في أي وقت (باستثناء أنه لا يمكنهم تغيير اسم المستخدم الخاص بهم). يمكن لمسؤولي مواقع الويب أيضًا رؤية هذه المعلومات وتحريرها.</p>\r\n\r\n<h2>ماهي الحقوق العائدة لك على بياناتك</h2>\r\n\r\n<p>إذا كان لديك حساب على هذا الموقع، أو تركت تعليقات، يمكنك طلب الحصول على ملف يتم تصديره من البيانات الشخصية التي نحتفظ بها عنك، بما في ذلك أي بيانات قدمتها لنا. يمكنك أيضًا طلب حذف أي بيانات شخصية نحتفظ بها عنك. هذا لا يشمل أي بيانات نحن ملزمون بالحفاظ عليها لأغراض إدارية أو قانونية أو أمنية.</p>\r\n\r\n<h2>إلى أين نرسل بياناتك</h2>\r\n\r\n<p>يمكن التحقق من تعليقات الزوار من خلال خدمة الكشف عن الرسائل غير المرغوب فيها تلقائيًا.</p>\r\n\r\n<h2>معلومات الاتصال بك</h2>\r\n\r\n<h2>معلومات إضافية</h2>\r\n\r\n<h3>كيف نحمي بياناتك</h3>\r\n\r\n<h3>ماهي الإجراءات السارية تجاه الإخلال بالبيانات</h3>\r\n\r\n<h3>ماهي الأطراف الثالثة التي نستلم منها البيانات</h3>\r\n\r\n<h3>ماهي آلية صنع القرار و/أو التوصيف الذي نقوم به مع بيانات المستخدم</h3>\r\n\r\n<h3>متطلبات الإفصاح من الجهة المنظمة للصناعة</h3>', '<p>Privcy</p>', 1, NULL, NULL, NULL, '2020-11-30 09:54:46'),
(6, 'fb', 'الفيس بوك', 'Facebook', '', 'fa fa-facebook', 3, '161375220615712208374828d02c9352ee0183c596106a49a952.png', NULL, NULL, '2021-03-03 15:42:27'),
(7, 'tw', 'تويتر', 'Twitter', 'https://www.snapchat.com/add/ajmal.alhawatif', 'fa fa-facebook', 3, '1614197699twt-01.png', NULL, NULL, '2021-03-03 15:42:27'),
(8, 'googleplus', 'جوجل بلس', 'Google Plus', '', 'https://plus.google.com/', 3, 'fb.com', NULL, NULL, '2021-03-03 15:42:27'),
(9, 'rss', 'rss', 'Rss', '', 'https://www.facebook.com/', 3, 'fb.com', NULL, NULL, '2021-03-03 15:42:27'),
(10, 'pintrest', 'بينترست', 'Pintrest', 'https://www.snapchat.com/add/ajmal.alhawatif', 'https://www.pinterest.com/', 3, '1614197620vvv-01-01.png', NULL, NULL, '2021-03-03 15:42:27'),
(11, 'linkedin', 'لينكد ان', 'Linkedin', '', 'https://www.linkedin.com/', 3, 'fb.com', NULL, NULL, '2021-03-03 15:42:27'),
(12, 'youtube', 'يوتيوب', 'Youtube', 'https://www.youtube.com/channel/UCQZ21WNrdF3J1Lkid25IF5Q', 'https://www.youtube.com/', 3, '1614197409you-01.png', NULL, NULL, '2021-03-03 15:42:27'),
(13, 'hotline', 'الرقم الموحد', 'Unified number', '9200998777 , رقم المنطقة الشرقية 0590099819 , رقم المنطقة الغربية 0987659988 , رقم المنطقة الشمالية 0597788776 , رقم المنطقة الجنوبية 0567890987,رقم منطقة المدينة المنورة 0590099820 ,', '19919', 4, '', NULL, NULL, '2021-03-23 12:04:27'),
(14, 'email', 'البريد الالكترونى', 'E-mail', 'خدمة العملاء و المبيعات : sales@ajmalalhawatif.com , الشحن واللوجستيك : Logistic@ajmalalhawatif.com', 'mostafa@yahoo.com', 4, '', NULL, NULL, '2021-03-23 12:04:27'),
(16, 'lng', 'lat', 'lng', '39.65719869678723', '30.10021', 5, '', NULL, NULL, '2021-01-19 02:00:52'),
(19, 'lat', 'lat', 'lng', '24.453340106390208', '30.10021', 5, '', NULL, NULL, '2021-01-19 02:00:52'),
(20, 'seo_script', 'Seo Header', 'Seo Footer', '', '', 6, '', NULL, NULL, '2019-12-04 10:40:39'),
(22, 'site_name', 'اسم الموقع', 'Site Name', 'Ajmal Alhawatif', 'Wagdy store', 4, '', NULL, NULL, '2021-03-23 12:04:27'),
(23, 'timezone', 'Timezone', 'Timezone', 'Asia/Riyadh', '', 4, '', NULL, NULL, '2021-03-23 12:04:27'),
(24, 'driver', 'Driver', 'Driver', 'smtp', 'stmp', 7, '', NULL, NULL, '2021-04-05 11:48:00'),
(25, 'host', 'Host', 'Host', 'smtp.mailgun.org', 'Host', 7, '', NULL, NULL, '2021-04-05 11:48:00'),
(26, 'port', 'port', 'port', '587', 'port', 7, '', NULL, NULL, '2021-04-05 11:48:00'),
(27, 'from_email', 'from_email', 'from_email', 'btates@ajmalalhawatif.com', 'from_email', 7, '', NULL, NULL, '2021-04-05 11:48:00'),
(28, 'encryption', 'encryption', 'encryption', '', 'encryption', 7, '', NULL, NULL, '2021-04-05 11:48:00'),
(29, 'username', 'username', 'username', 'postmaster@sandboxe75bba6b131c431dbf6e73f4c2668fe7.mailgun.org', 'username', 7, '', NULL, NULL, '2021-04-05 11:48:00'),
(30, 'password', 'password', 'password', '46edf05ef90a7ab549e9989e55bb5e21-77751bfc-6402a6d4', 'password', 7, '', NULL, NULL, '2021-04-05 11:48:00'),
(31, 'logo', 'شعار الموقع', 'website logo', 'logo', 'logo', 4, '1614520737اجمل الهواتف علامة تجارية 2.jpg', NULL, NULL, '2021-02-28 14:58:58'),
(32, 'whatsapp', 'واتس اب', 'WhatsApp', 'https://api.whatsapp.com/send?phone=+201030154879', '+201040563015', 3, '1614197596vvv-01.png', NULL, '2020-11-04 09:04:02', '2021-03-03 15:42:27'),
(33, 'instagram', 'انستجرام', 'Instagram', 'https://instagram.com/ajmal.alhawatif?igshid=1aefsrpobw7rw', 'https://www.instagram.com/', 3, '1614197145instagra-01.png', NULL, '2020-11-04 09:01:57', '2021-03-03 15:42:27'),
(34, 'cancel_order', 'الغاء الطلب', 'Cancel Order', '0', '1', 4, '', NULL, '2020-11-24 09:47:44', '2021-04-11 13:35:37'),
(35, 'gift_price', 'سعر طلب الهدية', 'order Gift Price', '40', '0', 4, '', '{\"user_active\":\"0\",\"merchant_active\":\"1\"}', '2020-11-12 07:44:22', '2021-03-15 13:26:34'),
(36, 'favicon', 'ايقونة الموقع', 'website Favicon', 'favicon', 'favicon', 4, '16157963201611046198fav-icon.png', NULL, NULL, '2021-03-15 09:18:41'),
(37, 'sms_driver', 'مزود الخدمة', 'Driver', 'MSEGAT', 'Driver', 8, NULL, NULL, '2021-02-09 15:58:37', '2021-03-15 15:41:58'),
(38, 'sms_username', 'username', 'username', 'ajmal', 'username', 8, '', NULL, '2021-02-09 15:58:37', '2021-03-15 15:41:58'),
(39, 'sms_password', 'password', 'password', 'ajmal alhawatif', 'password', 8, '', NULL, '2021-02-09 15:58:37', '2021-03-15 15:41:58'),
(40, 'sms_api_key', 'API KEY', 'API KEY', '1e4e05390c2f726b6592377ffacf4ce6', 'API KEY', 8, NULL, NULL, '2021-02-09 15:58:37', '2021-03-15 15:41:58'),
(41, 'sms_sender_name', 'senderName', 'senderName', 'Tec', 'senderName', 8, '', NULL, '2021-02-09 15:58:37', '2021-03-15 15:41:58'),
(42, 'sms_sender_phone', 'senderPhone', 'senderPhone', 'Ajmal Tec', '', 8, '', NULL, '2021-02-09 15:58:37', '2021-03-15 15:41:58'),
(44, 'logo_footer', 'لوجو الفوتر', 'logo footer', 'logo_footer', 'logo_footer', 4, '16159911571607014292اجمل الهواتف..png', NULL, NULL, '2021-03-23 12:04:27'),
(45, 'forward_account', 'حساب آجل', 'Forward account', '1', '1', 4, '', NULL, '2020-11-24 09:47:44', '2021-03-23 12:04:27'),
(46, 'warranty', 'المطالبه والضمان', 'Warranty', '1', '1', 9, NULL, NULL, NULL, '2021-04-11 13:35:37'),
(47, 'front_image', 'صورة الجهاز من الامام', 'Device Front Image', '1', 'file', 9, NULL, NULL, NULL, '2021-04-11 13:35:37'),
(48, 'back_image', 'صورة الجهاز من الخلف', 'Device Back Image', '1', 'file', 9, NULL, NULL, NULL, '2021-04-11 13:35:37'),
(49, 'warranty_image', 'صورة بطاقة الضمان', 'Warranty Card Image', '1', 'file', 9, NULL, NULL, NULL, '2021-04-11 13:35:37'),
(50, 'warranty_number', 'رقم بطاقة الضمان', 'Warranty Card Number', '1', 'text', 9, NULL, NULL, NULL, '2021-04-11 13:35:37'),
(51, 'user_notes', 'الملاحظات', 'Notes', '1', 'textarea', 9, NULL, NULL, NULL, '2021-04-11 13:35:37'),
(52, 'usage_date', 'تاريخ التركيب', 'Usage Date', '1', 'date', 9, NULL, NULL, NULL, '2021-04-11 13:35:37');

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
(9, 'اعدادت الضمان', 'Warranty Settings', 'warranty', '2021-04-11 08:15:28', '2021-04-11 08:15:28', 'flaticon-wallet');

-- --------------------------------------------------------

--
-- Table structure for table `contactuses`
--

CREATE TABLE `contactuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, 'السعوديه', 'السعودية', '0255', '255', NULL, NULL, NULL);

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
(4, 'ر.س', 'SR', 'SAR', 'SR', 1, 1, 1, '2020-06-15 20:28:08', '2021-02-03 05:51:00'),
(5, 'دولار امريكي', 'American dollar', 'USD', '$', 0.267, 1, 0, '2020-06-15 20:29:00', '2021-02-17 08:16:10'),
(6, 'درهم اماراتي', 'AED', 'AED', 'AED', 0.98, 1, 0, '2020-06-15 20:29:47', '2021-02-22 16:29:59'),
(7, 'دينار كويتي', 'Kuwaiti Dinar', 'KWD', 'KWD', 0.082, 1, 0, '2020-06-15 20:35:19', '2021-02-03 05:49:15'),
(8, 'دينار بحريني', 'Bahraini dinar', 'BHD', 'BHD', 0.1, 1, 0, '2020-06-15 20:37:57', '2021-02-03 05:49:25'),
(9, 'ريال عماني', 'ريال عماني', 'OMR', 'ريال عماني', 0.1, 1, 0, '2020-06-15 20:41:02', '2021-02-03 05:49:40'),
(10, 'جنيه مصري', 'Egyptian Pound', 'EGP', 'جنيه مصري', 4.31, 1, 0, '2020-06-15 20:42:25', '2021-02-03 05:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `deliverytimes`
--

CREATE TABLE `deliverytimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deliverytime_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliverytime_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `for_user` tinyint(1) NOT NULL DEFAULT 1,
  `for_merchant` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliverytimes`
--

INSERT INTO `deliverytimes` (`id`, `deliverytime_ar`, `deliverytime_en`, `sort_order`, `for_user`, `for_merchant`, `created_at`, `updated_at`) VALUES
(17, 'مساءً من 8-10 م', 'Evening from 8-10 pm', 1, 0, 0, '2021-01-04 19:54:15', '2021-04-28 12:24:20'),
(18, 'مساءً من 5-8 م', 'Evening from 5-8 pm', 2, 0, 0, '2021-01-04 19:54:30', '2021-04-28 12:24:09'),
(19, 'مساءً من 2-5 م', 'Evening from 2-5 pm', 3, 0, 0, '2021-01-04 19:54:57', '2021-04-28 12:23:57'),
(20, 'صباحاً من 10-12 م', 'In the morning from 10-12 pm', 4, 0, 0, '2021-01-04 19:55:13', '2021-04-28 12:23:45'),
(21, 'صباحاً من 8-10 ص', 'In the morning from 8-10 am', 5, 0, 0, '2021-01-04 19:55:29', '2021-04-28 12:23:33');

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
(15, 'Southern area', 'المنطقة الجنوبية', 1, '2020-09-12 03:11:16', '2020-09-12 03:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `menu_links`
--

CREATE TABLE `menu_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/',
  `sort` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_links`
--

INSERT INTO `menu_links` (`id`, `key`, `name`, `url`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'home', 'fronthomemodule::home.home', '/', 1, 1, '2021-02-01 14:58:31', '2021-03-14 16:56:26'),
(2, 'about', 'fronthomemodule::home.about', '/config/1', 7, 0, '2021-02-01 14:58:31', '2021-03-14 20:08:35'),
(3, 'latest_products', 'fronthomemodule::home.latest_products', '/latest_products', 3, 0, '2021-02-01 14:58:31', '2021-03-14 19:48:05'),
(4, 'offers', 'fronthomemodule::home.offers', '/discount-products', 3, 1, '2021-02-01 14:58:31', '2021-03-14 16:47:21'),
(5, 'suggestions', 'fronthomemodule::home.suggestions', '/suggestions', 8, 0, '2021-02-01 14:58:31', '2021-03-14 19:48:09'),
(6, 'contact_us', 'fronthomemodule::home.contact_us', '/contact_us', 4, 1, '2021-02-01 14:58:31', '2021-03-14 20:08:40'),
(7, 'all_products', 'fronthomemodule::home.all_products', '/all_products', 2, 1, '2021-02-01 14:58:31', '2021-03-14 16:58:35'),
(8, 'brands', 'fronthomemodule::home.brands', '/brands', 4, 1, '2021-02-01 14:58:31', '2021-03-14 16:47:22');

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
  `status` int(11) NOT NULL DEFAULT 0,
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
(148, '2021_03_25_160312_create_transactions_table', 59),
(149, '2021_03_28_154739_add_transaction_column_id_to_orders_table', 60),
(154, '2021_04_06_125410_create_return_reasons_table', 61),
(155, '2021_04_06_125417_create_returns_table', 61),
(159, '2021_04_08_123246_create_warranties_table', 62),
(161, '2021_04_14_133352_add_seen_at_column_to_warranties_table', 63);

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
(28, 'Modules\\AdminModule\\Entities\\Admin', 11),
(29, 'Modules\\AdminModule\\Entities\\Admin', 6),
(29, 'Modules\\AdminModule\\Entities\\Admin', 7),
(29, 'Modules\\AdminModule\\Entities\\Admin', 8),
(29, 'Modules\\AdminModule\\Entities\\Admin', 9),
(29, 'Modules\\AdminModule\\Entities\\Admin', 10);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `viewed_levels` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `desc_ar`, `desc_en`, `status`, `viewed_levels`, `created_at`, `updated_at`) VALUES
(2, 'ستتوفر اجهزة ايفون 12 برو ماكس يوم الجمعة القادم للحجز المسبق يرجى الطلب والدفع وسيتم الشحن يوم الاثنين', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex', 0, NULL, '2020-11-25 10:23:58', '2021-02-24 21:56:15'),
(3, 'تنوه ادارة الشركه الى انه ابتداءً من يوم 01/12/2020 م لن يتم استلام اي مبالغ نقدية من العملاء وسيتم التعامل عبر التحويل البنكي او عبر جهاز نقاط البيع (الشبكة) وشكراً لتعاونكم', 'تنوه ادارة الشركه الى انه ابتداءً من يوم 01/12/2020 م لن يتم استلام اي مبالغ نقدية من العملاء وسيتم التعامل عبر التحويل البنكي او عبر جهاز نقاط البيع (الشبكة) وشكراً لتعاونكم .', 0, NULL, '2020-12-08 09:01:54', '2021-02-24 21:55:57'),
(4, '🛠.. عملائنا الكرام الموقع تحت الصيانة نعتذر على ازعاجكم ..🛠', '🛠..Dear customers, the website is under maintenance. We apologize for inconveniencing you ..🛠', 1, '1', '2020-12-08 09:03:41', '2021-03-29 09:35:31');

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
(16, 'eslam.tarek@pioneers-solutions.com', '2021-04-05 12:26:58', '2021-04-05 12:27:01'),
(17, 'test@test.com', '2021-04-05 12:27:04', '2021-04-05 12:27:06'),
(18, 'test2@text.com', NULL, NULL);

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
(3, NULL, 'عرروض خاصة عرروض خاصة عرروض خاصة', NULL, '2021-04-05 12:00:31', '2021-04-05 12:00:31'),
(4, NULL, 'عروض خاصة جدا جدا جدا\r\nعروض خاصة جدا جدا جدا', NULL, '2021-04-05 12:03:39', '2021-04-05 12:03:39'),
(5, NULL, 'عرروض خاصة عرروض خاصة عرروض خاصة	\r\nعرروض خاصة عرروض خاصة عرروض خاصة', NULL, '2021-04-05 13:12:09', '2021-04-05 13:12:09'),
(6, NULL, 'عرروض خاصة عرروض خاصة', NULL, '2021-04-05 13:21:16', '2021-04-05 13:21:16'),
(7, NULL, 'عرروض خاصة عرروض خاصة', NULL, '2021-04-05 13:22:10', '2021-04-05 13:22:10'),
(8, 'عرروض خاصة', 'عرروض خاصة عرروض خاصة عرروض خاصة عرروض خاصة عرروض خاصة عرروض خاصة', '1617628738.jpg', '2021-04-05 14:19:01', '2021-04-05 14:19:01');

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
('066e8420-744f-4515-a9f9-7aae7112df9b', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:42:57', '2021-02-14 09:42:57'),
('0cf0953f-58e3-4d9a-80f3-95468cbcbe1a', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 197, '{\"offer_send_time\":\"2021-03-14 22:46:00\",\"offer_end_time\":\"2021-03-14 23:46:00\",\"offer_price\":15,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u0633\\u0628\\u064a\\u0633 \\u0645\\u0648\\u0628\\u0627\\u064a\\u0644 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Mar-14 22:03 pm  \\u062d\\u062a\\u0649 2021-Mar-14 23:03 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-03-14 20:48:13', '2021-03-14 20:48:13'),
('110982cd-8769-46be-b213-59163cf454c9', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 209, '{\"offer_send_time\":\"2021-02-17 13:00:00\",\"offer_end_time\":\"2021-02-17 14:00:00\",\"offer_price\":30,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u062a\\u064a\\u0644\\u064a\\u0645\\u064a\\u062f\\u064a\\u0627 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Feb-17 13:02 pm  \\u062d\\u062a\\u0649 2021-Feb-17 14:02 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-02-17 11:00:39', '2021-02-17 11:00:39'),
('15d754d7-e4d3-4d27-af29-285c3b654916', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:46:11', '2021-02-14 09:46:11'),
('17f667cc-f9a3-4e6f-8470-e194dd11d44b', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 207, '{\"offer_send_time\":\"2021-02-17 11:39:00\",\"offer_end_time\":\"2021-02-17 12:39:00\",\"offer_price\":80,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 11:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 12:02 pm\"}', NULL, '2021-02-17 09:47:24', '2021-02-17 09:47:24'),
('1d3e2cd4-5f3e-4ef7-9c3b-e6f7e5dbc75e', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 204, '{\"offer_send_time\":\"2021-02-17 07:49:00\",\"offer_end_time\":\"2021-02-17 07:51:00\",\"offer_price\":12,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 ali hassan \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 07:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 07:02 am\"}', NULL, '2021-02-17 05:50:24', '2021-02-17 05:50:24'),
('1eb2b0f4-9cfc-4b0f-95fe-8db29694f5a3', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 207, '{\"offer_send_time\":\"2021-02-17 11:39:00\",\"offer_end_time\":\"2021-02-17 12:39:00\",\"offer_price\":89,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 11:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 12:02 pm\"}', NULL, '2021-02-17 09:39:44', '2021-02-17 09:39:44'),
('217120fb-8483-40e3-add1-f46ab76d5443', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:47:26', '2021-02-14 09:47:26'),
('25cd42b9-a5bf-4a95-a734-351822798440', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:29:00\",\"offer_end_time\":\"2021-02-14 12:29:00\",\"offer_price\":60}', NULL, '2021-02-14 09:30:08', '2021-02-14 09:30:08'),
('29de5301-e0ff-45d2-a3ff-8207a4658ff2', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 209, '{\"offer_send_time\":\"2021-02-18 13:26:00\",\"offer_end_time\":\"2021-02-18 14:26:00\",\"offer_price\":2245,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u062a\\u064a\\u0644\\u064a\\u0645\\u064a\\u062f\\u064a\\u0627 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Feb-18 13:02 pm  \\u062d\\u062a\\u0649 2021-Feb-18 14:02 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-02-18 11:26:47', '2021-02-18 11:26:47'),
('31264c82-aed6-4dbe-898b-9556142ed717', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:56:04', '2021-02-14 09:56:04'),
('31633900-15f3-40a8-9272-ba621bff0b67', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 207, '{\"offer_send_time\":\"2021-02-17 12:19:00\",\"offer_end_time\":\"2021-02-17 13:19:00\",\"offer_price\":3700,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 12:02 pm \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 13:02 pm\"}', NULL, '2021-02-17 10:20:09', '2021-02-17 10:20:09'),
('367b2d40-694a-45f4-b7e4-d49ea4d6be3d', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 204, '{\"offer_send_time\":\"2021-02-17 08:15:00\",\"offer_end_time\":\"2021-02-17 09:15:00\",\"offer_price\":22,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 ali hassan \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 08:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 09:02 am\"}', NULL, '2021-02-17 06:15:45', '2021-02-17 06:15:45'),
('3ad7c83a-7625-4d4c-a0be-6a249db997ab', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:54:55', '2021-02-14 09:54:55'),
('44b20cb3-d0f0-44e1-b147-5771a774fbfb', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 207, '{\"offer_send_time\":\"2021-02-17 12:03:00\",\"offer_end_time\":\"2021-02-25 13:01:00\",\"offer_price\":40,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 12:02 pm \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-25 13:02 pm\"}', NULL, '2021-02-17 10:05:40', '2021-02-17 10:05:40'),
('4b472b95-3cf2-4657-af10-dfeb29c1eb38', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:50:10', '2021-02-14 09:50:10'),
('4eca44bb-f782-46f3-ad21-4baa5f0ebab2', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:33:56', '2021-02-14 09:33:56'),
('51080597-7db2-4cee-bf4d-258d6ad01cd0', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:49:53', '2021-02-14 09:49:53'),
('52dfa4fd-8eca-423b-bf1f-0ebf851468b9', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 211, '{\"offer_send_time\":\"2021-02-18 04:31:00\",\"offer_end_time\":\"2021-02-18 05:31:00\",\"offer_price\":25,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 Fatima \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Feb-18 04:02 am  \\u062d\\u062a\\u0649 2021-Feb-18 05:02 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-02-18 02:32:01', '2021-02-18 02:32:01'),
('5686c20a-486e-442a-b492-6086455633d2', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":99}', NULL, '2021-02-14 09:49:38', '2021-02-14 09:49:38'),
('59e5e839-6ce7-4377-8148-8cf5333776d5', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-10 16:56:00\",\"offer_end_time\":\"2021-02-10 17:56:00\",\"offer_price\":60}', NULL, '2021-02-10 14:57:13', '2021-02-10 14:57:13'),
('5bbc472b-006d-4a53-9efc-5ed38c68d333', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 115, '{\"offer_send_time\":\"2021-02-10 16:59:00\",\"offer_end_time\":\"2021-02-10 17:01:00\",\"offer_price\":10}', NULL, '2021-02-10 14:00:24', '2021-02-10 14:00:24'),
('5e775c26-19c8-417d-8cd1-c9105e1d1fc1', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-15 14:37:00\",\"offer_end_time\":\"2021-02-15 15:37:00\",\"offer_price\":60}', NULL, '2021-02-15 12:41:20', '2021-02-15 12:41:20'),
('5e94fcfe-32c6-40b4-8315-089a5fc6fcee', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:45:17', '2021-02-14 09:45:17'),
('6295ed5e-8ef9-4ded-bbbd-0fbe3a1a9806', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:52:28', '2021-02-14 09:52:28'),
('62e0152b-c9c2-418d-bb75-e5370ea19413', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 216, '{\"offer_send_time\":\"2021-02-21 01:13:00\",\"offer_end_time\":\"2021-02-21 02:13:00\",\"offer_price\":35,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u0633\\u0639\\u062f \\u062d\\u0633\\u0646 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Feb-21 01:02 am  \\u062d\\u062a\\u0649 2021-Feb-21 02:02 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-02-20 23:14:04', '2021-02-20 23:14:04'),
('6dabba87-52b6-46e9-850f-1ad6ca8bf865', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:54:40', '2021-02-14 09:54:40'),
('726f8423-b18e-4021-8315-524ac266e10f', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 209, '{\"offer_send_time\":\"2021-02-17 12:51:00\",\"offer_end_time\":\"2021-02-17 13:51:00\",\"offer_price\":122,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u062a\\u064a\\u0644\\u064a\\u0645\\u064a\\u062f\\u064a\\u0627 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0644\\u0641\\u062a\\u0631\\u0629 \\u0645\\u062d\\u062f\\u0648\\u062f\\u0629 \\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Feb-17 12:02 pm  \\u062d\\u062a\\u0649 2021-Feb-17 13:02 pm\\r\\n\\u0633\\u0627\\u0631\\u0639 \\u0628\\u0627\\u0644\\u062f\\u062e\\u0648\\u0644 \\u0644\\u062d\\u0633\\u0627\\u0628\\u0643 \\u0648 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0639\\u0645\\u0644\\u064a\\u0629 \\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645\"}', NULL, '2021-02-17 10:51:24', '2021-02-17 10:51:24'),
('73369027-bfe0-4ee6-9e6f-40edaee17737', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:50:33', '2021-02-14 09:50:33'),
('737b7796-559f-4f05-ab8a-a72a2f2ca4bb', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:50:53', '2021-02-14 09:50:53'),
('7dd09480-dbb9-49b6-ac8f-095cce2f8b49', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:51:24', '2021-02-14 09:51:24'),
('83b99a52-098b-400b-b7b6-b0e06dbf06de', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:34:32', '2021-02-14 09:34:32'),
('8f94fe18-84e0-4d2a-aed8-e6191fa16a14', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 207, '{\"offer_send_time\":\"2021-02-17 11:39:00\",\"offer_end_time\":\"2021-02-17 12:39:00\",\"offer_price\":89,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 11:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 12:02 pm\"}', NULL, '2021-02-17 09:40:47', '2021-02-17 09:40:47'),
('98531487-942f-4e27-8684-a4bf17954ec2', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 209, '{\"offer_send_time\":\"2021-02-18 05:12:00\",\"offer_end_time\":\"2021-02-18 06:12:00\",\"offer_price\":280,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0634\\u0631\\u0643\\u0629 \\u062a\\u064a\\u0644\\u064a\\u0645\\u064a\\u062f\\u064a\\u0627 \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Feb-18 05:02 am  \\u062d\\u062a\\u0649 2021-Feb-18 06:02 am \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-02-18 03:12:32', '2021-02-18 03:12:32'),
('99885303-8881-4286-a2fe-4aeb66179b1e', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 207, '{\"offer_send_time\":\"2021-02-17 12:01:00\",\"offer_end_time\":\"2021-02-17 13:01:00\",\"offer_price\":90,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 12:02 pm \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 13:02 pm\"}', NULL, '2021-02-17 10:01:32', '2021-02-17 10:01:32'),
('99d677f2-556a-4a0e-8ea7-afec2f7cdc0c', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:51:55', '2021-02-14 09:51:55'),
('9fd488fa-42d4-4126-b841-7e2f85be9f89', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 204, '{\"offer_send_time\":\"2021-02-17 08:14:00\",\"offer_end_time\":\"2021-02-17 09:14:00\",\"offer_price\":33,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 ali hassan \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 08:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 09:02 am\"}', NULL, '2021-02-17 06:15:04', '2021-02-17 06:15:04'),
('a419fde3-affc-44db-a94c-10878d0d8deb', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 212, '{\"offer_send_time\":\"2021-02-18 21:19:00\",\"offer_end_time\":\"2021-02-18 22:19:00\",\"offer_price\":4000,\"body\":\"\\u0639\\u0645\\u064a\\u0644\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0632\\u064a\\u0632 \\u0633\\u0646\\u062f \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\u0627\\u0628\\u062a\\u062f\\u0627\\u0621\\u064b \\u0645\\u0646 2021-Feb-18 21:02 pm  \\u062d\\u062a\\u0649 2021-Feb-18 22:02 pm \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0644\\u0644\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u062e\\u0635\\u0645 .\\r\\n\\r\\n\\u0634\\u0631\\u0643\\u0629 \\u0627\\u062c\\u0645\\u0644 \\u0627\\u0644\\u0647\\u0648\\u0627\\u062a\\u0641 , \\u0646\\u062a\\u0634\\u0631\\u0641 \\u0628\\u062e\\u062f\\u0645\\u062a\\u0643\\u0645 .\"}', NULL, '2021-02-18 19:20:11', '2021-02-18 19:20:11'),
('a7334207-e6d0-4ebc-8d76-d13fb13dad1c', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-15 14:37:00\",\"offer_end_time\":\"2021-02-15 15:37:00\",\"offer_price\":45}', NULL, '2021-02-15 12:57:59', '2021-02-15 12:57:59'),
('a799d6bf-5c05-4f26-85ae-cf9e4d6b8f03', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 207, '{\"offer_send_time\":\"2021-02-17 12:03:00\",\"offer_end_time\":\"2021-02-25 13:01:00\",\"offer_price\":65,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 mazen \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 12:02 pm \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-25 13:02 pm\"}', NULL, '2021-02-17 10:03:15', '2021-02-17 10:03:15'),
('aa539650-ae9b-4702-9792-acbd1407ff25', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:45:27', '2021-02-14 09:45:27'),
('ac9f5ce1-8262-4f15-8706-3ed2dd603b30', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-10 17:04:00\",\"offer_end_time\":\"2021-02-10 17:07:00\",\"offer_price\":50}', NULL, '2021-02-10 14:04:23', '2021-02-10 14:04:23'),
('b2bdd7da-49ea-48b7-ba2b-271491b7d47b', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:55:29', '2021-02-14 09:55:29'),
('b52d5770-b321-4641-bcb6-e89451959fba', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":65}', NULL, '2021-02-14 09:48:20', '2021-02-14 09:48:20'),
('b9a5570f-5f24-4314-ae15-9c13d0bc8205', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:46:44', '2021-02-14 09:46:44'),
('bfa56812-190e-4b3e-ac7c-53beeb94c328', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-10 17:00:00\",\"offer_end_time\":\"2021-02-10 18:00:00\",\"offer_price\":66}', NULL, '2021-02-10 15:00:51', '2021-02-10 15:00:51'),
('c222d23f-ad78-403f-8e1e-c8bc25e27194', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:51:06', '2021-02-14 09:51:06'),
('c73869ab-703f-409e-9574-c84084cb8e29', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:35:26', '2021-02-14 09:35:26'),
('c8805c8b-c94c-4fd9-b62c-594f3d5c89bb', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:34:43', '2021-02-14 09:34:43'),
('d0d52ee5-07ce-4b31-8e79-c1ec00c8f8f3', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:54:20', '2021-02-14 09:54:20'),
('d43f97f9-fb41-4457-97c1-8c12c8d7bce2', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:38:14', '2021-02-14 09:38:14'),
('d62a0bd5-41d8-4b53-9a53-a9f12b7337a6', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 204, '{\"offer_send_time\":\"2021-02-17 07:52:00\",\"offer_end_time\":\"2021-02-17 07:53:00\",\"offer_price\":10,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 ali hassan \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 07:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 07:02 am\"}', NULL, '2021-02-17 05:52:18', '2021-02-17 05:52:18'),
('db06ccac-6140-4936-b308-d3810abcc9e7', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-15 14:37:00\",\"offer_end_time\":\"2021-02-15 15:37:00\",\"offer_price\":50}', NULL, '2021-02-15 12:46:35', '2021-02-15 12:46:35'),
('db5a22ef-2a30-4f01-b304-0da08f35f723', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 204, '{\"offer_send_time\":\"2021-02-17 08:13:00\",\"offer_end_time\":\"2021-02-17 09:13:00\",\"offer_price\":44,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 ali hassan \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 08:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 09:02 am\"}', NULL, '2021-02-17 06:14:08', '2021-02-17 06:14:08'),
('dc64d439-00b8-4af4-a64c-08f8e7944e86', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:52:03', '2021-02-14 09:52:03'),
('dd1b2c87-6e9f-403c-9921-3f291135f887', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-15 14:37:00\",\"offer_end_time\":\"2021-02-15 15:37:00\",\"offer_price\":100}', NULL, '2021-02-15 13:07:10', '2021-02-15 13:07:10'),
('e226d203-8ac3-4972-aa19-aa46ae1eada8', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:47:07', '2021-02-14 09:47:07'),
('e2485b47-8943-4a80-bb39-a5e4b5a188c4', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":61}', NULL, '2021-02-14 09:45:51', '2021-02-14 09:45:51'),
('e3cd417e-f42a-4af5-b222-4413e76bfdd7', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":65}', NULL, '2021-02-14 09:49:31', '2021-02-14 09:49:31'),
('e50c0bef-501d-4b58-af5c-8730fc6fa715', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:33:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:55:07', '2021-02-14 09:55:07'),
('e5d0dbb2-47b0-481a-b27a-1a2e4327b8e0', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-14 11:35:00\",\"offer_end_time\":\"2021-02-14 12:33:00\",\"offer_price\":30}', NULL, '2021-02-14 09:58:25', '2021-02-14 09:58:25'),
('ea1cff4b-39fa-4118-aa0e-512b5d80453f', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 204, '{\"offer_send_time\":\"2021-02-17 07:49:00\",\"offer_end_time\":\"2021-02-17 07:52:00\",\"offer_price\":12,\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 ali hassan \\u0644\\u0642\\u062f \\u062d\\u0635\\u0644\\u062a \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u0639\\u0644\\u0649 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0633\\u0644\\u062a\\u0643 \\r\\n\\r\\n\\u0645\\u0646 2021-Feb-17 07:02 am \\r\\n\\r\\n\\u0627\\u0644\\u0649 2021-Feb-17 07:02 am\"}', NULL, '2021-02-17 05:49:49', '2021-02-17 05:49:49'),
('fae98de0-d82c-42cd-aa54-38c496159984', 'Modules\\OrderModule\\Notifications\\CartOfferNotification', 'Modules\\UserModule\\Entities\\User', 194, '{\"offer_send_time\":\"2021-02-10 17:04:00\",\"offer_end_time\":\"2021-02-10 18:05:00\",\"offer_price\":60}', NULL, '2021-02-10 14:55:55', '2021-02-10 14:55:55'),
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
  `send_sms` tinyint(1) NOT NULL DEFAULT 1,
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
(4, 'employee_order_status', 'تغيير حالة الطلب لموظف', 'Status Change to Employee', 'الطلب رقم #{order_id} اصبح {status}', 'Order #{order_id} is {status}', '{username},{order_id},{status}', 1, '2021-02-15 13:00:51', '2021-02-16 09:26:51'),
(5, 'merchant_register', 'تفعيل تاجر', 'Merchant Activation', 'عملينا العزيز {username} مرحبا بك  في شركة أجمل الهواتف لقد تم تفعيل الحساب الخاص بك رقم {account_number} يرجى تسجيل الدخول للاستفاده من اسعار الجملة . 🤩', 'Dear Customer {username} Welcome to Ajmal Alhawatif Company, the account has been activated\r\nYour number {account_number} Please login to take advantage of wholesale prices. 🤩', '{username},{email},{account_number}', 1, '2021-02-15 13:00:51', '2021-02-28 19:46:42'),
(6, 'user_login', 'تسجيل دخول', 'user Login', '{code} هو رمز التفعيل الخاص بك \r\nمرحبا بك في شركة أجمل الهواتف .', 'Welcome {username} In Ajmal Alhawatif.\r\nYour Code is: {code}', '{username},{email},{code}', 1, '2021-02-15 13:00:51', '2021-03-11 11:18:18'),
(7, 'forgot_password', 'نسيت الرقم السرى', 'Forgot Password', 'عميلنا العزيز {username}, يمكنك استعادة كلمة السر من الرابط التالى: ', 'Dear {username}, Reset Your Account Password From This Link: ', '{username},{email}', 1, '2021-02-15 13:00:51', '2021-02-25 20:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_ids` bigint(20) DEFAULT NULL,
  `currency_id` bigint(20) DEFAULT NULL,
  `deliverytime_id` int(11) NOT NULL,
  `current_status_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `current_status_type_id` int(10) UNSIGNED DEFAULT 1,
  `is_merchant` int(11) NOT NULL DEFAULT 0,
  `prices_level` int(11) NOT NULL DEFAULT 5,
  `currency_value` double NOT NULL DEFAULT 1,
  `send_gift` tinyint(4) NOT NULL DEFAULT 0,
  `gift_cost` double NOT NULL DEFAULT 0,
  `tax_percentage` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_ids` varchar(191) CHARACTER SET utf8mb4 DEFAULT NULL,
  `last_modifier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_address_id`, `payment_type`, `sub_total`, `discount`, `shipping`, `tax`, `total`, `delivery_time`, `comment`, `coupon_code`, `created_at`, `updated_at`, `order_currency`, `currency_ids`, `currency_id`, `deliverytime_id`, `current_status_id`, `current_status_type_id`, `is_merchant`, `prices_level`, `currency_value`, `send_gift`, `gift_cost`, `tax_percentage`, `assigned_ids`, `last_modifier_id`, `transaction_id`) VALUES
(418, 226, 163, 'cash_on_delivery', 27.6, 0, 40.25, NULL, 67.85, '20', NULL, '', '2021-03-03 02:21:56', '2021-03-03 02:22:43', 'ر.س', NULL, 4, 0, 7, 3, 0, 5, 1, 0, 0, '15', NULL, 11, NULL),
(419, 225, 163, 'cash_on_delivery', 27.6, 0, 40.25, NULL, 67.85, '21', NULL, '', '2021-03-03 02:25:31', '2021-03-03 02:25:31', 'ر.س', NULL, 4, 0, 1, 1, 1, 1, 1, 0, 0, '15', NULL, NULL, NULL),
(427, 226, 163, 'cash_on_delivery', 227.7, 0, 40.25, NULL, 307.95, '21', NULL, '', '2021-03-15 13:21:20', '2021-03-15 13:21:20', 'ر.س', NULL, 4, 0, 6, 2, 0, 5, 1, 1, 40, '15', NULL, NULL, NULL),
(428, 226, 163, 'cash_on_delivery', 635.95, 0, 40.25, NULL, 676.2, '21', NULL, '', '2021-03-17 12:28:46', '2021-03-17 12:28:46', 'ر.س', NULL, 4, 0, 6, 2, 0, 5, 1, 0, 0, '15', NULL, NULL, NULL),
(429, 226, 163, 'cash_on_delivery', 113.85, 0, 40.25, NULL, 154.1, '21', NULL, '', '2021-03-18 09:35:33', '2021-03-18 09:35:33', 'ر.س', NULL, 4, 0, 1, 1, 0, 5, 1, 0, 0, '15', NULL, NULL, NULL),
(430, 226, 163, 'cash_on_delivery', 2386.25, 0, 40.25, NULL, 2426.5, '21', NULL, '', '2021-03-22 10:08:04', '2021-03-22 10:08:04', 'ر.س', NULL, 4, 0, 1, 1, 0, 5, 1, 0, 0, '15', NULL, NULL, NULL),
(431, 226, 166, 'cash_on_delivery', 3098.1, 0, 40.25, NULL, 3138.35, '19', NULL, '', '2021-03-23 08:59:11', '2021-03-23 08:59:11', 'ر.س', NULL, 4, 0, 1, 1, 0, 5, 1, 0, 0, '15', NULL, NULL, NULL),
(432, 225, 168, 'forward_account', 12176.292, 0, 35, NULL, 12211.292, '21', NULL, '', '2021-03-23 12:57:11', '2021-03-23 13:35:36', 'ر.س', NULL, 4, 0, 1, 1, 1, 1, 1, 0, 0, '15', NULL, NULL, NULL),
(433, 226, 173, 'cash_on_delivery', 216.2, 0, 40.25, NULL, 256.45, '21', NULL, '', '2021-03-25 15:36:10', '2021-03-25 15:36:10', 'ر.س', NULL, 4, 0, 1, 1, 0, 5, 1, 0, 0, '15', NULL, NULL, NULL),
(434, 226, 163, 'my_fatoorah', 113.85, 0, 40.25, NULL, 154.1, '21', NULL, '', '2021-03-28 13:58:29', '2021-03-28 13:58:29', 'ر.س', NULL, 4, 0, 1, 1, 0, 5, 1, 0, 0, '15', NULL, NULL, 'd441fcaa-e02d-4094-a7c9-95cd1c237a70'),
(435, 226, 163, 'cash_on_delivery', 727.95, 0, 40.25, NULL, 768.2, NULL, NULL, '', '2021-04-28 12:28:51', '2021-04-28 12:28:51', 'ر.س', NULL, 4, 0, 1, 1, 0, 5, 1, 0, 0, '15', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `combination_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `item_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_combination_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `combination_id`, `quantity`, `item_price`, `created_at`, `updated_at`, `item_combination_name`) VALUES
(882, 418, 658, NULL, 1, 27.6, '2021-03-03 02:21:56', '2021-03-03 02:21:56', NULL),
(883, 419, 658, NULL, 1, 27.6, '2021-03-03 02:25:31', '2021-03-03 02:25:31', NULL),
(920, 427, 1412, NULL, 1, 90.85, '2021-03-15 13:21:20', '2021-03-15 13:21:20', NULL),
(921, 427, 1409, NULL, 1, 136.85, '2021-03-15 13:21:20', '2021-03-15 13:21:20', NULL),
(922, 428, 1412, NULL, 7, 90.85, '2021-03-17 12:28:47', '2021-03-17 12:28:47', NULL),
(923, 429, 1417, NULL, 1, 23, '2021-03-18 09:35:33', '2021-03-18 09:35:33', NULL),
(924, 429, 1414, NULL, 1, 90.85, '2021-03-18 09:35:33', '2021-03-18 09:35:33', NULL),
(925, 430, 1417, NULL, 6, 23, '2021-03-22 10:08:04', '2021-03-22 13:19:21', NULL),
(926, 430, 1412, NULL, 25, 90.85, '2021-03-22 10:08:04', '2021-03-22 10:08:04', NULL),
(927, 431, 630, NULL, 1, 113.85, '2021-03-23 08:59:11', '2021-03-23 08:59:11', NULL),
(928, 431, 633, NULL, 5, 115, '2021-03-23 08:59:11', '2021-03-23 08:59:11', NULL),
(929, 431, 1417, NULL, 6, 23, '2021-03-23 08:59:11', '2021-03-23 08:59:11', NULL),
(930, 431, 1412, NULL, 25, 90.85, '2021-03-23 08:59:11', '2021-03-23 08:59:11', NULL),
(931, 432, 656, NULL, 1, 26.45, '2021-03-23 12:57:12', '2021-03-23 12:57:12', NULL),
(932, 432, 655, NULL, 2, 40.25, '2021-03-23 12:57:12', '2021-03-23 12:57:12', NULL),
(933, 432, 629, NULL, 1, 34.5, '2021-03-23 12:57:12', '2021-03-23 12:57:12', NULL),
(934, 432, 630, NULL, 1, 43.125, '2021-03-23 12:57:12', '2021-03-23 12:57:12', NULL),
(935, 432, 654, NULL, 1, 3448.85, '2021-03-23 12:57:12', '2021-03-23 12:57:12', NULL),
(936, 432, 628, NULL, 2, 4271.4335, '2021-03-23 12:57:12', '2021-03-23 12:57:12', NULL),
(937, 433, 1417, NULL, 1, 23, '2021-03-25 15:36:10', '2021-03-25 15:36:10', NULL),
(938, 433, 1415, NULL, 1, 102.35, '2021-03-25 15:36:10', '2021-03-25 15:36:10', NULL),
(939, 433, 1414, NULL, 1, 90.85, '2021-03-25 15:36:10', '2021-03-25 15:36:10', NULL),
(940, 434, 1417, NULL, 1, 23, '2021-03-28 13:58:29', '2021-03-28 13:58:29', NULL),
(941, 434, 1412, NULL, 1, 90.85, '2021-03-28 13:58:29', '2021-03-28 13:58:29', NULL),
(942, 435, 1413, NULL, 4, 90.85, '2021-04-28 12:28:51', '2021-04-28 12:28:51', NULL),
(943, 435, 1412, NULL, 1, 90.85, '2021-04-28 12:28:51', '2021-04-28 12:28:51', NULL),
(944, 435, 632, NULL, 1, 171.35, '2021-04-28 12:28:51', '2021-04-28 12:28:51', NULL),
(945, 435, 1416, NULL, 1, 102.35, '2021-04-28 12:28:51', '2021-04-28 12:28:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT 1,
  `status_type_id` int(10) UNSIGNED DEFAULT 1,
  `status_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `order_id`, `status_id`, `status_type_id`, `status_comment`, `created_at`, `updated_at`) VALUES
(541, 418, 1, 1, 'جديد', '2021-03-03 02:21:56', '2021-03-03 02:21:56'),
(542, 418, 7, 3, 'تم الالغاء من جانب العميل', '2021-03-03 02:22:43', '2021-03-03 02:22:43'),
(543, 419, 1, 1, 'جديد', '2021-03-03 02:25:31', '2021-03-03 02:25:31'),
(553, 427, 1, 1, 'جديد', '2021-03-15 13:21:20', '2021-03-15 13:21:20'),
(554, 428, 1, 1, 'جديد', '2021-03-17 12:28:47', '2021-03-17 12:28:47'),
(555, 429, 1, 1, 'جديد', '2021-03-18 09:35:33', '2021-03-18 09:35:33'),
(556, 430, 1, 1, 'جديد', '2021-03-22 10:08:04', '2021-03-22 10:08:04'),
(557, 431, 1, 1, 'جديد', '2021-03-23 08:59:11', '2021-03-23 08:59:11'),
(558, 432, 1, 1, 'جديد', '2021-03-23 12:57:12', '2021-03-23 12:57:12'),
(559, 433, 1, 1, 'جديد', '2021-03-25 15:36:10', '2021-03-25 15:36:10'),
(560, 434, 1, 1, 'جديد', '2021-03-28 13:58:29', '2021-03-28 13:58:29'),
(561, 435, 1, 1, 'جديد', '2021-04-28 12:28:51', '2021-04-28 12:28:51');

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
(2, '1574161728payment-4.png', '2019-11-19 09:08:48', '2019-11-19 09:08:48'),
(3, '1574161742payment.png', '2019-11-19 09:09:02', '2019-11-19 09:09:02'),
(4, '1574161752payment-1.png', '2019-11-19 09:09:12', '2019-11-19 09:09:12'),
(5, '1574161768payment-2.png', '2019-11-19 09:09:28', '2019-11-19 09:09:28');

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
(146, 1, 'add_catalog', 'الكتالوجات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(147, 1, 'delete_catalog', 'الكتالوجات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(148, 1, 'update_catalog', 'الكتالوجات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(149, 1, 'show_catalog', 'الكتالوجات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(150, 2, 'returns', 'المرتجعات', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(151, 2, 'return_reason', 'اسباب الارجاع', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54'),
(152, 2, 'warranty', 'المطالبة والضمان', 'admin', '2019-08-26 07:42:54', '2019-08-26 07:42:54');

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
  `sort` int(11) NOT NULL DEFAULT 999,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone_codes`
--

INSERT INTO `phone_codes` (`id`, `name`, `iso`, `code`, `sort`, `status`) VALUES
(1, 'Palastine', 'PSE', '+970', 999, 0),
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
(242, 'Virgin Islands, U.S.', ' VI ', '+1 340', 999, 0);

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
(2, 626, 19, 'كيبل USB ', NULL, NULL),
(3, 626, 27, ' اسود ', NULL, NULL),
(4, 626, 31, '80 سم ', NULL, NULL),
(5, 626, 32, '65 سم ', NULL, NULL),
(6, 626, 33, '12 كجم ', NULL, NULL),
(7, 626, 34, '24', NULL, NULL),
(8, 626, 44, '1.5 م ', NULL, NULL),
(9, 626, 45, ' ثلاثي ', NULL, NULL),
(723, 1349, 31, '200', NULL, NULL),
(724, 1350, 31, '200', NULL, NULL),
(725, 1351, 31, '200', NULL, NULL),
(726, 1352, 31, '200', NULL, NULL),
(727, 1353, 31, '200', NULL, NULL),
(728, 1354, 31, '200', NULL, NULL),
(729, 1355, 31, '200', NULL, NULL),
(730, 1356, 31, '200', NULL, NULL),
(731, 1357, 31, '200', NULL, NULL),
(732, 1358, 31, '200', NULL, NULL),
(733, 1359, 31, '200', NULL, NULL),
(734, 1360, 31, '200', NULL, NULL),
(735, 1361, 31, '200', NULL, NULL),
(736, 1362, 31, '200', NULL, NULL),
(737, 1363, 31, '200', NULL, NULL),
(738, 1364, 31, '200', NULL, NULL),
(739, 1365, 31, '200', NULL, NULL),
(740, 1366, 31, '200', NULL, NULL),
(741, 1367, 31, '200', NULL, NULL),
(742, 1368, 31, '200', NULL, NULL),
(743, 1369, 31, '200', NULL, NULL),
(744, 1370, 31, '200', NULL, NULL),
(745, 1371, 31, '200', NULL, NULL),
(746, 1372, 31, '200', NULL, NULL),
(747, 1373, 31, '200', NULL, NULL),
(748, 1374, 31, '200', NULL, NULL),
(749, 1375, 31, '200', NULL, NULL),
(750, 1376, 31, '200', NULL, NULL),
(751, 1377, 31, '200', NULL, NULL),
(752, 1378, 31, '200', NULL, NULL),
(753, 1379, 31, '200', NULL, NULL),
(754, 1380, 31, '200', NULL, NULL),
(755, 1381, 31, '200', NULL, NULL),
(756, 1382, 31, '200', NULL, NULL),
(757, 1418, 31, '15619.05', NULL, NULL),
(758, 1419, 31, '15619.05', NULL, NULL),
(759, 1421, 31, '15619.05', NULL, NULL);

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
  `desc_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_price1` double(8,2) NOT NULL DEFAULT 0.00,
  `product_price2` double(8,2) NOT NULL DEFAULT 0.00,
  `product_price3` double(8,2) NOT NULL DEFAULT 0.00,
  `product_price4` double(8,2) NOT NULL DEFAULT 0.00,
  `product_quantity` int(11) DEFAULT NULL,
  `length` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewed_levels` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' 1_2_3_4_5 ',
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yt_video` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `parent_id`, `brand_id`, `product_code`, `status`, `type`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `product_photo`, `product_price`, `product_price1`, `product_price2`, `product_price3`, `product_price4`, `product_quantity`, `length`, `width`, `height`, `length_class`, `weight`, `weight_class`, `created_at`, `updated_at`, `details_ar`, `details_en`, `viewed_levels`, `video`, `yt_video`, `sort`) VALUES
(626, 75, 71, '855821005723', 1, 'simple', ' ماكينة للتغليف الحراري من بروتكشن برو ( كبيرة)', ' Starter Kit ', NULL, NULL, '1614285304كاربون فايبر  ابيض-01.jpg', 15619.05, 15619.05, 15619.05, 15619.05, 15619.05, 2147483605, NULL, NULL, NULL, ' selected ', NULL, ' selected ', '2021-01-08 21:08:32', '2021-03-17 10:33:21', NULL, NULL, '1_2_3_4_5 ', '', 'xJX8qXLRPZM', 6),
(627, 75, 71, '855821005730', 1, 'simple', ' ماكينة للتغليف الحراري من بروتكشن برو (وسط)', ' Express Starter Kit ', NULL, NULL, '1614285171كاربون فايبر احمر-01.jpg', 5333.33, 5333.33, 5333.33, 5333.33, 5333.33, 2147483628, NULL, NULL, NULL, ' Centimeter ', NULL, ' Kilogram ', '2021-01-08 21:10:29', '2021-03-16 12:49:48', NULL, NULL, '1_2_3_4_5 ', '', NULL, 1),
(628, 75, 71, '858163005895', 1, 'simple', ' ماكينة للتغليف الحراري من بروتكشن برو (صغيرة)', ' Lite Starter Kit ', NULL, NULL, '1614281289ماكينة نمبر ون الامريكية.jpg', 3714.29, 3714.29, 3714.29, 3714.29, 3714.29, 2147483613, NULL, NULL, NULL, ' Centimeter ', NULL, ' Kilogram ', '2021-01-08 21:12:25', '2021-03-23 12:57:12', NULL, NULL, '1_2_3_4_5 ', '', NULL, 1),
(629, 76, 71, '858163005673', 1, 'simple', ' تغليف حراري للكاميرات من بروتكشن برو ', ' تغليف حراري للكاميرات من بروتكشن برو ', NULL, NULL, '1614281289ماكينة نمبر ون الامريكية.jpg', 99, 30.00, 30.00, 36.00, 36.00, 2147483607, NULL, NULL, NULL, ' Centimeter ', NULL, ' Kilogram ', '2021-01-08 21:15:16', '2021-03-23 12:57:11', NULL, NULL, '1_2_3_4_5 ', '', NULL, 1),
(630, 76, 71, '855821005037', 1, 'simple', ' تغليف حراري شفاف للسماعات من بروتكشن برو ', ' تغليف حراري شفاف للسماعات من بروتكشن برو ', NULL, NULL, '1614279085الوسط.jpg', 99, 37.50, 37.50, 45.00, 45.00, 2147483457, NULL, NULL, NULL, ' Centimeter ', NULL, ' Kilogram ', '2021-01-08 21:17:04', '2021-03-23 12:57:11', NULL, NULL, '1_2_3_4_5 ', '', NULL, 1),
(632, 76, 71, '855821005280', 1, 'simple', ' تغليف حراري خشبي محروق من نمبر ون ', ' تغليف حراري خشبي محروق من نمبر ون ', NULL, NULL, '1614282648التغليف الحراري للساعات من بروتكشن-04.jpg', 149, 74.00, 74.00, 80.00, 80.00, 2147483602, NULL, NULL, NULL, ' Centimeter ', NULL, ' Kilogram ', '2021-01-08 21:21:21', '2021-04-28 12:28:51', NULL, NULL, '1_2_3_4_5 ', '', NULL, 1),
(633, 76, 71, '855821005075', 1, 'simple', ' تغليف حراري ليد التحكم و الكونسل من بروتكشن برو ', ' تغليف حراري ليد التحكم و الكونسل من بروتكشن برو ', NULL, NULL, '1614282898Untitled-y-04.jpg', 100, 100.00, 100.00, 100.00, 100.00, 2147483578, NULL, NULL, NULL, ' Centimeter ', NULL, ' Kilogram ', '2021-01-08 21:23:31', '2021-04-12 09:01:44', NULL, NULL, '1_2_3_4_5 ', '', NULL, 1),
(647, 76, 71, '3456787654', 1, 'simple', ' التغليف الحراري للساعات والاساور من بروتكشن برو ', ' التغليف الحراري للساعات والاساور من بروتكشن برو ', NULL, NULL, '1614223641hm6M5x8Z1AYzY92UuIvSWV5SIhm2pfoL0VJgWD0K.jpeg', 23, 23.00, 23.00, 23.00, 23.00, 2147483643, NULL, NULL, NULL, ' Centimeter ', NULL, ' Kilogram ', '2021-02-25 04:24:40', '2021-03-15 00:25:42', NULL, NULL, '1_2_3_4_5 ', '', NULL, 1),
(650, 84, 71, '0102', 1, 'simple', ' ماكينة للتغليف الحراري من بروتكشن برو ( كبيرة)', ' ماكينة للتغليف الحراري من بروتكشن برو ( كبيرة) ', NULL, NULL, '16142236054403704cv11d_result.jpg', 15619.05, 15619.05, 15619.05, 15619.05, 15619.05, 5, NULL, NULL, NULL, ' Centimeter ', NULL, ' Kilogram ', '2021-02-25 19:49:40', '2021-03-15 00:25:43', NULL, NULL, '1_2_3_4_5 ', '', NULL, 1),
(654, 75, 111, '0132', 1, 'simple', ' ماكينة للتغليف الحراري من نمبر ون ', ' ماكينة للتغليف الحراري من نمبر ون ', NULL, NULL, '1614278981الكبيرة.jpg', 3499, 2999.00, 3499.00, 3499.00, 3499.00, 22, NULL, NULL, NULL, ' Centimeter ', NULL, ' Kilogram ', '2021-02-25 20:28:09', '2021-03-23 12:57:12', NULL, NULL, '1_2_3_4_5 ', '', NULL, 1),
(655, 76, 71, '012', 1, 'simple', ' تغليف حراري شفاف للابتوب و الاجهزة المحمولة من بروتكشن برو ', ' تغليف حراري شفاف للابتوب و الاجهزة المحمولة من بروتكشن برو ', NULL, NULL, '1614278322الصغيرة.jpg', 35, 35.00, 35.00, 35.00, 0.00, 20, NULL, NULL, NULL, ' Centimeter ', NULL, ' Kilogram ', '2021-02-25 20:38:37', '2021-03-23 12:57:11', NULL, NULL, '1_2_3_4_5 ', '', NULL, 1),
(656, 76, 71, '0123', 1, 'simple', ' تغليف حراري شفاف للتابلت و الاجهزة اللوحية من بروتكشن برو ', ' تغليف حراري شفاف للتابلت و الاجهزة اللوحية من بروتكشن برو ', NULL, NULL, '1614281917lfpihawpf[o [-02.jpg', 23, 23.00, 23.00, 23.00, 23.00, 19, NULL, NULL, NULL, ' Centimeter ', NULL, ' Kilogram ', '2021-02-25 20:45:46', '2021-03-23 12:57:11', NULL, NULL, '1_2_3_4_5 ', '', NULL, 1),
(658, 76, 111, '123', 1, 'simple', ' تغليف حراري كاربون فايبر احمر من نمبر ون ', ' تغليف حراري كاربون فايبر احمر من نمبر ون ', '<p>التغليف الحراري الملون من شركة نمبر ون ، كاريون فايبر باللون الاحمر الذي يعطي جهازك الفخامة و القوة.&nbsp;\r\n</p>', NULL, '1614285810خشبي محروق-01.jpg', 24, 24.00, 24.00, 24.00, 24.00, 0, NULL, NULL, NULL, 'Centimeter', NULL, 'Kilogram', '2021-02-25 21:32:51', '2021-03-11 13:10:13', NULL, NULL, '1_2_3_4_5', '', NULL, 1),
(1349, 75, 111, '456897795', 0, 'simple', 'تغليف  حراري ملون جلد ثعبان اسود من نمبر ون ', 'Lite Starter Kit123466', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 80, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-07 14:19:50', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1350, 75, 111, '456897796', 0, 'simple', 'تغليف  حراري ملون ليكوت منقط ابيض من نمبر ن ', 'Lite Starter Kit123467', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 8999, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:29', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1351, 75, 111, '456897797', 0, 'simple', 'تغليف  حراري ملون سبلاش اسود و ابيض من نمبر ون ', 'Lite Starter Kit123468', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 8999, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:30', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1352, 75, 111, '456897798', 0, 'simple', 'تغليف  حراري ملون خشببي من نمبر ون ', 'Lite Starter Kit123469', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 8999, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:31', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1353, 75, 111, '456897799', 0, 'simple', 'تغليف  حراري ملون اسود جلد من نمبر ون ', 'Lite Starter Kit123470', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 8994, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:34', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1354, 75, 111, '456897800', 0, 'simple', 'تغليف حراري نقش جداري من نمبر ون ', 'Lite Starter Kit123471', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9001, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:35', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1355, 75, 111, '456897801', 0, 'simple', 'تغليف  حراري ملون نقش جداري بني من نمبر ون ', 'Lite Starter Kit123472', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:17', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1356, 75, 111, '456897802', 0, 'simple', 'تغليف  حراري ملون باركية بني من نمبر ون ', 'Lite Starter Kit123473', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:16', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1357, 75, 111, '456897803', 0, 'simple', 'تغليف  حراري ملون جلد اسود ثعبان منقط من نمبر ون  ', 'Lite Starter Kit123474', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:15', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1358, 75, 111, '456897804', 0, 'simple', 'تغليف  حراري ملون باركية تيفاني من نمبر ون ', 'Lite Starter Kit123475', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:14', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1359, 75, 111, '456897805', 0, 'simple', 'تغليف  حراري ملون لامع ذهبي من نمبر ون ', 'Lite Starter Kit123476', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:14', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1360, 75, 111, '456897806', 0, 'simple', 'تغليف  حراري ملون ازرق مطفي من نمبر ون ', 'Lite Starter Kit123477', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:13', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1361, 75, 111, '456897807', 0, 'simple', 'تغليف  حراري ملون كاربون فايبر بنفسجي من نمبر ون ', 'Lite Starter Kit123478', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:11', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1362, 75, 111, '456897808', 0, 'simple', 'تغليف  حراري ملون جلد ثعبان (ابيض) من نمبر ون ', 'Lite Starter Kit123479', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:09', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1363, 75, 111, '456897809', 0, 'simple', 'تغليف حراري ملون كابون فايبر (اخضر) من نمبر ون ', 'Lite Starter Kit123480', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:09', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1364, 75, 111, '456897810', 0, 'simple', 'تغليف  حراري ملون كاربون فايبر (اصفر) من نمبر ون ', 'Lite Starter Kit123481', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:08', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1365, 75, 111, '456897811', 0, 'simple', 'تغليف  حراري ملون اسود (جلد ثعبان)  من نمبر  ون ', 'Lite Starter Kit123482', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:07', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1366, 75, 111, '456897812', 0, 'simple', 'تغليف  حراري ملون احمر لامع من نمبر ون ', 'Lite Starter Kit123483', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:06', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1367, 75, 111, '456897813', 0, 'simple', 'تغليف  حراري ملون ابيض لامع من نمبر ون ', 'Lite Starter Kit123484', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:03', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1368, 75, 111, '456897814', 0, 'simple', 'تغليف  حراري شفاف (كلير) للجوالات من نمبر ون ', 'Lite Starter Kit123485', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:02', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1369, 75, 111, '456897815', 0, 'simple', 'تغليف  حراري شفاف للابتوب و الأجهزة المحمولة من نمبر ون ', 'Lite Starter Kit123486', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:01:00', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1370, 75, 111, '456897816', 0, 'simple', 'تغليف  حراري شفاف للايباد و الأجهزة اللوحية من نمبر ون ', 'Lite Starter Kit123487', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:00:57', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1371, 75, 111, '456897817', 0, 'simple', 'تغليف  شفاف لأجهزة الألعاب الكونسل و يد التحكم من نمبر ون ', 'Lite Starter Kit123488', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:00:56', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1372, 75, 111, '456897818', 0, 'simple', 'تغليف  شفاف للساعات و الاساور الذكية من نمبر ون ', 'Lite Starter Kit123489', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:00:51', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1373, 75, 111, '456897819', 0, 'simple', 'تغليف شفاف لعلبة سماعات الايربودز من نمبر ون ', 'Lite Starter Kit123490', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:00:53', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1374, 75, 111, '456897820', 0, 'simple', 'تغليف حراري شفاف لشاشة الكاميرات الاحترافية من نمبر ون ', 'Lite Starter Kit123491', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 9000, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:00:41', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1375, 75, 111, '456897821', 0, 'simple', 'تغليف حراري شفاف لشاشة السيارة من نمبر ون ', 'Lite Starter Kit123492', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-03-11 14:19:21', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1376, 75, 111, '456897822', 0, 'simple', 'ماكينة التغليف  الحراري الملون والشفاف من شركة نمبرون الامريكية   ', 'Lite Starter Kit123493', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-03-11 14:19:21', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1377, 75, 71, '456897823', 0, 'simple', 'تغليف حراري  شفاف  (كلير) للجوالات من شركة بروتكشن برو ', 'Lite Starter Kit123494', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-03-11 14:19:21', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1378, 75, 71, '456897824', 0, 'simple', 'تغليف  حراري  شفاف ( المطفي) للجوالات من شركة بروتكشن برو ', 'Lite Starter Kit123495', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-03-11 14:19:21', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1379, 75, 71, '456897825', 0, 'simple', 'تغليف حراري  شفاف للابتوب و الأجهزة المحمولة من شركة بروتكشن برو ', 'Lite Starter Kit123496', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-03-11 14:19:21', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1380, 75, 71, '456897826', 0, 'simple', 'تغليف حراري شفاف للايباد والأجهزة اللوحية من شركة بروتكشن برو  ', 'Lite Starter Kit123497', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-03-11 14:19:21', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1381, 75, 71, '456897827', 0, 'simple', 'تغليف حراري شفاف لألعاب الكونسل و ويد التحكم من شركة بروتكشن برو ', 'Lite Starter Kit123498', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-03-11 14:19:21', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1382, 75, 71, '456897828', 0, 'simple', 'تغليف حراري شفاف للساعات و  والاساور الذكية من شركة بروتكشن برو ', 'Lite Starter Kit123499', NULL, NULL, '', 500, 100.00, 200.00, 300.00, 400.00, 900, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 14:19:21', '2021-04-12 09:00:37', NULL, NULL, '1_2_3_4_5', NULL, NULL, 1),
(1407, 74, 73, '15444555555', 1, 'simple', 'شاحن سفر متعدد الاستخدامات 2.4 امبير + بي دي 45 واط - اسود، من باورولوجي', 'شاحن سفر متعدد الاستخدامات 2.4 امبير + بي دي 45 واط - اسود، من باورولوجي', NULL, NULL, '16157498191608122858_Powerol222-650x650.jpg', 149, 88.00, 95.00, 97.00, 105.00, 2147483646, NULL, NULL, NULL, 'Centimeter', NULL, 'Kilogram', '2021-03-14 20:20:19', '2021-03-15 00:25:41', NULL, NULL, '1_2_3_4_5', '', NULL, 1),
(1408, 74, 73, 'P65PDWUKBK', 1, 'simple', 'باورلوجي شاحن حائط 65 واط بـ3 منافذ (أسود)', 'باورلوجي شاحن حائط 65 واط بـ3 منافذ (أسود)', NULL, NULL, '16157499291608122858_Powerol222-650x650.jpg', 149, 98.00, 105.00, 107.00, 110.00, 2147483647, NULL, NULL, NULL, 'Centimeter', NULL, 'Kilogram', '2021-03-14 20:25:30', '2021-03-15 10:29:59', NULL, NULL, '1_2_3_4_5', '', NULL, 1),
(1409, 74, 73, 'PTVPD2BK', 1, 'simple', 'محول السفر العالمي باورولوجي مع توصيل طاقة 2.4 أمبير + PD 18 وات (أسود)', 'Powerology Universal Travel Adapter with Power Delivery 2.4A + PD 18W ( Black )', NULL, NULL, '16157500111608122858_Powerol222-650x650.jpg', 119, 75.00, 80.00, 85.00, 95.00, 2147483645, NULL, NULL, NULL, 'Centimeter', NULL, 'Kilogram', '2021-03-14 20:26:51', '2021-03-15 13:21:20', NULL, NULL, '1_2_3_4_5', '', NULL, 1),
(1410, 74, 73, 'P156PDQCUKBK', 1, 'simple', 'باورلوجي شاحن حائط 156 واط بـ4 منافذ (أسود)', 'Powerlogy 156W 4-Port Wall Charger (Black)', NULL, NULL, '16157500851608122858_Powerol222-650x650.jpg', 199, 160.00, 165.00, 170.00, 175.00, 2147483646, NULL, NULL, NULL, 'Centimeter', NULL, 'Kilogram', '2021-03-14 20:28:05', '2021-03-15 00:25:41', NULL, NULL, '1_2_3_4_5', '', NULL, 1),
(1411, 74, 73, 'PPDUKLBK', 1, 'simple', 'باورولوجي ألترا كويك شاحن حائط مع كيبل تايب سي إلى لايتنغ 1.2 متر (أسود)', 'Powerology UltraQuick Wall Charger With Cable Type C To Lightning 1.2 Meter (Black)', NULL, NULL, '16157501651608122858_Powerol222-650x650.jpg', 89, 50.00, 55.00, 60.00, 65.00, -2147483648, NULL, NULL, NULL, 'Centimeter', NULL, 'Kilogram', '2021-03-14 20:29:25', '2021-03-15 10:33:44', NULL, NULL, '1_2_3_4_5', '', NULL, 1),
(1412, 64, 73, 'PTVPD2BK78', 1, 'simple', 'باورولوجي كيبل لايتنغ 1.2 متر (أزرق)', 'Powerology Lightning Cable 1.2m (Blue)', NULL, NULL, '16157503721608122858_Powerol222-650x650.jpg', 79, 18.00, 20.00, 23.00, 26.00, 2147483586, NULL, NULL, NULL, 'Centimeter', NULL, 'Kilogram', '2021-03-14 20:32:52', '2021-04-28 12:28:51', NULL, NULL, '1_2_3_4_5', '', NULL, 1),
(1413, 64, 73, 'PTVPD2BK98', 1, 'simple', 'باورولوجي كيبل لايتنغ 1.2 متر (أحمر)', 'باورولوجي كيبل لايتنغ 1.2 متر (أحمر)', NULL, NULL, '16157505671608122858_Powerol222-650x650.jpg', 79, 18.00, 20.00, 23.00, 26.00, 2147483642, NULL, NULL, NULL, 'Centimeter', NULL, 'Kilogram', '2021-03-14 20:36:07', '2021-04-28 12:28:51', NULL, NULL, '1_2_3_4_5', '', NULL, 1),
(1414, 64, 73, 'PTV854D2BK', 1, 'simple', 'باورولوجي كيبل لايتنغ 1.2 متر (أبيض)', 'باورولوجي كيبل لايتنغ 1.2 متر (أبيض)', NULL, NULL, '16157506091605605447_0001 (6)-650x650.jpg', 79, 18.00, 20.00, 23.00, 26.00, 2147483644, NULL, NULL, NULL, 'Centimeter', NULL, 'Kilogram', '2021-03-14 20:36:50', '2021-03-25 15:36:10', NULL, NULL, '1_2_3_4_5', '', NULL, 1),
(1415, 64, 73, '445554544', 1, 'simple', 'باورولوجي كيبل سمعيات يو اس بي - سي إلى أيه يو أكس (1.2 م)', 'باورولوجي كيبل سمعيات يو اس بي - سي إلى أيه يو أكس (1.2 م)', NULL, NULL, '16157507781605606057_0001 (9)-650x650.jpg', 89, 35.00, 45.00, 55.00, 65.00, 2147483645, NULL, NULL, NULL, 'Centimeter', NULL, 'Kilogram', '2021-03-14 20:39:38', '2021-03-25 15:36:10', NULL, NULL, '1_2_3_4_5', '', NULL, 1),
(1416, 64, 73, 'PTV3D2BK', 1, 'simple', 'باورولوجي كيبل شحن يو اس بي - سي إلى لايتنغ 1.2 متر (أسود)', 'باورولوجي كيبل شحن يو اس بي - سي إلى لايتنغ 1.2 متر (أسود)', NULL, NULL, '16157509101605605047_0001 (4)-650x650.jpg', 89, 27.00, 30.00, 35.00, 38.00, 2147483645, NULL, NULL, NULL, 'Centimeter', NULL, 'Kilogram', '2021-03-14 20:41:50', '2021-04-28 12:28:51', NULL, NULL, '1_2_3_4_5', '', NULL, 1),
(1417, 62, 72, '1535', 1, 'simple', 'test', 'test', '<p>test</p>', '<p>test</p>', '16159734951614579838ديفندر-مخطط-416x520.jpg', 25, 20.00, 20.00, 20.00, 20.00, 485, NULL, NULL, NULL, 'Centimeter', NULL, 'Kilogram', '2021-03-17 10:31:35', '2021-03-28 13:58:29', NULL, NULL, '1_2_3_4_5', '', 'xJX8qXLRPZM', 5),
(1418, 84, 71, '0102', 0, 'simple', ' ماكينة للتغليف الحراري من بروتكشن برو ( كبيرة)', ' ماكينة للتغليف الحراري من بروتكشن برو ( كبيرة) ', NULL, NULL, '', 15619.05, 15619.05, 15619.05, 15619.05, 15619.05, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-28 10:33:03', '2021-04-28 10:33:03', NULL, NULL, ' 1_2_3_4_5 ', NULL, NULL, 1),
(1419, 84, 71, '0102', 0, 'simple', ' ماكينة للتغليف الحراري من بروتكشن برو ( كبيرة)', ' ماكينة للتغليف الحراري من بروتكشن برو ( كبيرة) ', NULL, NULL, '', 15619.05, 15619.05, 15619.05, 15619.05, 15619.05, 555555, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-28 10:33:30', '2021-04-28 10:33:30', NULL, NULL, ' 1_2_3_4_5 ', NULL, NULL, 1),
(1421, 84, 71, '0102', 0, 'simple', ' ماكينة للتغليف الحراري من بروتكشن برو ( كبيرة)', ' ماكينة للتغليف الحراري من بروتكشن برو ( كبيرة) ', NULL, NULL, '', 15619.05, 15619.05, 15619.05, 15619.05, 15619.05, 555555, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-28 10:37:18', '2021-04-28 10:37:18', NULL, NULL, ' 1_2_3_4_5 ', NULL, NULL, 1);

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
  `combination_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

--
-- Dumping data for table `product_discounts`
--

INSERT INTO `product_discounts` (`id`, `product_id`, `discount_type`, `discount_value`, `discount_quantity`, `start_date`, `end_date`, `created_at`, `updated_at`, `offer_id`) VALUES
(1, 1417, 'percentage', '20', '1', '2021-03-17', '2021-03-30', '2021-03-17 10:31:35', '2021-03-17 10:31:35', NULL);

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
(3, 650, '1614278981الكبيرة.jpg', '2021-02-25 19:49:41', '2021-02-25 19:49:41'),
(7, 655, '1614281917lfpihawpf[o [-02.jpg', '2021-02-25 20:38:37', '2021-02-25 20:38:37'),
(8, 656, '1614282346Untitled-طمكتختحخعت-03.jpg', '2021-02-25 20:45:46', '2021-02-25 20:45:46'),
(9, 647, '1614282648التغليف الحراري للساعات من بروتكشن-04.jpg', '2021-02-25 20:50:48', '2021-02-25 20:50:48'),
(10, 629, '1614282898Untitled-y-04.jpg', '2021-02-25 20:54:58', '2021-02-25 20:54:58'),
(11, 633, '1614283511dfd-04.jpg', '2021-02-25 21:05:11', '2021-02-25 21:05:11'),
(12, 630, '1614283843rt-04.jpg', '2021-02-25 21:10:43', '2021-02-25 21:10:43'),
(14, 658, '1614285171كاربون فايبر احمر-01.jpg', '2021-02-25 21:32:51', '2021-02-25 21:32:51'),
(17, 632, '1614285810خشبي محروق-01.jpg', '2021-02-25 21:43:30', '2021-02-25 21:43:30');

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
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `product_id`, `name`, `review`, `stars`, `created_at`, `updated_at`, `is_shown`, `user_id`) VALUES
(1, 626, 'اللل', 'تلاا', '100', '2021-01-19 05:22:19', '2021-01-19 05:22:19', NULL, 0),
(26, 1408, 'المحمد', 'ممتاز', '100', '2021-03-15 01:11:46', '2021-03-15 01:11:46', NULL, 0),
(27, 654, 'ju', 'u', '100', '2021-03-17 09:29:05', '2021-03-17 09:29:33', 1, 0),
(28, 654, 'hj', 'jh', '100', '2021-03-17 09:29:13', '2021-03-17 09:29:32', 1, 0),
(29, 654, 'tjh', 'tjh', '100', '2021-03-17 09:29:18', '2021-03-17 09:29:26', 1, 0);

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
(2, 'et.azm112@gmail.com', 'c8b1d61ca27fd586f70a4ab616e05094b6cf35c1', '2021-05-04', '2021-04-28 14:07:47', '2021-05-04 09:55:23');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'الفرع الرئيسى', 'Your One Source', '1,0', '2021-04-07 15:26:24', '2021-04-07 15:26:45');

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
(28, 'الادارة', 'المناديب', 'admin', '2019-08-28 10:47:17', '2019-09-05 06:00:45'),
(29, 'مشرفي المبيعات في المناطق', 'مشرفي المبيعات في المناطق', 'admin', '2020-09-07 05:44:57', '2020-09-07 05:44:57'),
(30, 'موظفين تجهيز الطلبات في المناطق', 'مناديب المبيعات في المناطق', 'admin', '2020-09-07 05:51:15', '2020-12-30 15:54:19'),
(31, 'ادارة التصميم', 'ادارة التصميم', 'admin', '2020-09-12 04:19:28', '2020-09-12 04:19:28');

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
(9, 31),
(10, 28),
(10, 31),
(11, 28),
(11, 31),
(12, 28),
(12, 31),
(13, 28),
(13, 31),
(14, 28),
(14, 31),
(15, 28),
(15, 31),
(16, 28),
(16, 31),
(17, 28),
(17, 31),
(18, 28),
(18, 31),
(19, 28),
(19, 31),
(20, 28),
(20, 31),
(21, 28),
(21, 31),
(22, 28),
(22, 31),
(23, 28),
(23, 31),
(24, 28),
(24, 31),
(25, 28),
(26, 28),
(27, 28),
(28, 28),
(29, 28),
(29, 31),
(30, 28),
(31, 28),
(31, 31),
(32, 28),
(32, 31),
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
(45, 31),
(46, 28),
(46, 31),
(47, 28),
(47, 31),
(48, 28),
(48, 31),
(49, 28),
(49, 31),
(50, 28),
(50, 31),
(51, 28),
(51, 31),
(52, 28),
(52, 31),
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
(95, 29),
(95, 30),
(96, 28),
(96, 31),
(97, 28),
(97, 31),
(98, 28),
(98, 31),
(99, 28),
(100, 28),
(100, 29),
(101, 28),
(102, 28),
(102, 29),
(102, 30),
(107, 28),
(107, 30),
(108, 28),
(109, 28),
(109, 29),
(109, 30),
(110, 28),
(110, 29),
(110, 30),
(111, 28),
(112, 28),
(113, 28),
(113, 31),
(114, 28),
(114, 29),
(114, 30),
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
(124, 31),
(125, 28),
(126, 28),
(127, 28),
(128, 28),
(129, 28),
(129, 31),
(130, 28),
(131, 28),
(131, 29),
(131, 30),
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
(146, 28),
(147, 28),
(148, 28),
(149, 28),
(150, 28),
(151, 28),
(152, 28);

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
(2, '1574161728payment-4.png', '2019-11-19 09:08:48', '2019-11-19 09:08:48'),
(3, '1574161742payment.png', '2019-11-19 09:09:02', '2019-11-19 09:09:02'),
(5, '1574161768payment-2.png', '2019-11-19 09:09:28', '2019-11-19 09:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `link`, `created_at`, `updated_at`) VALUES
(48, '16145238771-01.png', NULL, '2021-02-28 15:51:17', '2021-02-28 15:51:17'),
(49, '16145238871-02.png', NULL, '2021-02-28 15:51:27', '2021-02-28 15:51:27');

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
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `name`, `phone`, `type`, `message`, `created_at`, `updated_at`) VALUES
(1, 'احمد', '0566557654', 'suggestion', 'السلام عليكم \r\nنرغب في شراء منتجات ولكن الموقع يتأخر في اظهار بعض المنتجات ماهو الحل لإظهارها مع العلم اننا سنشتري منكم 50 قطعة . شكراً لتعاونكم معنا \r\nادارة شركة ناصرالسلام عليكم \r\nنرغب في شراء منتجات ولكن الموقع يتأخر في اظهار بعض المنتجات ماهو الحل لإظهارها مع العلم اننا سنشتري منكم 50 قطعة . شكراً لتعاونكم معنا \r\nادارة شركة ناصرالسلام عليكم \r\nنرغب في شراء منتجات ولكن الموقع يتأخر في اظهار بعض المنتجات ماهو الحل لإظهارها مع العلم اننا سنشتري منكم 50 قطعة . شكراً لتعاونكم معنا \r\nادارة شركة ناصرالسلام عليكم \r\nنرغب في شراء منتجات ولكن الموقع يتأخر في اظهار بعض المنتجات ماهو الحل لإظهارها مع العلم اننا سنشتري منكم 50 قطعة . شكراً لتعاونكم معنا \r\nادارة شركة ناصرالسلام عليكم \r\nنرغب في شراء منتجات ولكن الموقع يتأخر في اظهار بعض المنتجات ماهو الحل لإظهارها مع العلم اننا سنشتري منكم 50 قطعة . شكراً لتعاونكم معنا \r\nادارة شركة ناصرالسلام عليكم \r\nنرغب في شراء منتجات ولكن الموقع يتأخر في اظهار بعض المنتجات ماهو الحل لإظهارها مع العلم اننا سنشتري منكم 50 قطعة . شكراً لتعاونكم معنا \r\nادارة شركة ناصرالسلام عليكم \r\nنرغب في شراء منتجات ولكن الموقع يتأخر في اظهار بعض المنتجات ماهو الحل لإظهارها مع العلم اننا سنشتري منكم 50 قطعة . شكراً لتعاونكم معنا \r\nادارة شركة ناصرالسلام عليكم \r\nنرغب في شراء منتجات ولكن الموقع يتأخر في اظهار بعض المنتجات ماهو الحل لإظهارها مع العلم اننا سنشتري منكم 50 قطعة . شكراً لتعاونكم معنا \r\nادارة شركة ناصرالسلام عليكم \r\nنرغب في شراء منتجات ولكن الموقع يتأخر في اظهار بعض المنتجات ماهو الحل لإظهارها مع العلم اننا سنشتري منكم 50 قطعة . شكراً لتعاونكم معنا \r\nادارة شركة ناصرالسلام عليكم \r\nنرغب في شراء منتجات ولكن الموقع يتأخر في اظهار بعض المنتجات ماهو الحل لإظهارها مع العلم اننا سنشتري منكم 50 قطعة . شكراً لتعاونكم معنا \r\nادارة شركة ناصر', '2020-11-06 04:10:30', '2020-11-06 04:10:30'),
(2, 'ااحددكقم', '0398765432', 'complaint', 'السلام عليكم \r\nنرغب في شراء منتجات ولكن الموقع يتأخر في اظهار بعض المنتجات ماهو الحل لإظهارها مع العلم اننا سنشتري منكم 50 قطعة . شكراً لتعاونكم معنا \r\nادارة شركة ناصر', '2020-11-06 04:11:26', '2020-11-06 04:11:26'),
(3, 'رينيز', '09725282716', 'complaint', 'ربريري', '2020-11-11 09:07:17', '2020-11-11 09:07:17'),
(4, 'علي حسن الشمراني', '0596656679', 'complaint', 'نتمنى منكم توفير المنتج السابق من الحماية', '2021-02-01 02:28:24', '2021-02-01 02:28:24'),
(5, 'تاب', '8363635252', 'suggestion', 'ريتيزي', '2021-02-01 02:28:35', '2021-02-01 02:28:35'),
(6, 'Ali hassan', '0596656679', 'suggestion', 'Bdgs', '2021-02-03 05:43:44', '2021-02-03 05:43:44'),
(7, 'ربري', '0372736252', 'complaint', 'اقدم شكوى', '2021-02-03 05:43:57', '2021-02-03 05:43:57'),
(8, '122', '12345678978', 'suggestion', '1447', '2021-02-17 10:39:55', '2021-02-17 10:39:55');

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
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `tax_shipping`, `tax_product`, `country_id`, `country_tax`, `other_country_tax`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 15, '30', 1, NULL, '2021-02-28 18:51:15');

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
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`payload`)),
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`invoice_data`)),
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
('05857354-0f5f-4e55-936d-156a47a42d1b', 'my_fatoorah', 226, 63.25, 4, '{\"is_address_saved\":false,\"is_valid\":true,\"user\":{\"id\":226,\"first_name\":\"etazm\",\"last_name\":\"Test\",\"email\":\"et.azm112@gmail.com\",\"phone\":\"1020750779\",\"phone_code_id\":57,\"gender\":\"\\u0630\\u0643\\u0631\",\"birth_date\":null,\"user_status\":null,\"country_id\":1,\"city_id\":63,\"zone_id\":84,\"government_id\":13,\"created_at\":\"2021-02-28 22:35:31\",\"updated_at\":\"2021-03-23 11:25:58\",\"is_newsletter_subscripe\":0,\"address\":\"ghghghgh\",\"is_active\":1,\"is_ban\":0,\"provider_id\":null,\"is_merchant\":0,\"company_name\":null,\"authorized_person\":null,\"account_number\":null,\"prices_level\":5},\"delivery_time\":\"20\",\"payment_type\":\"my_fatoorah\",\"address\":{\"user_id\":226,\"country_id\":\"1\",\"government_id\":\"11\",\"city_id\":\"56\",\"zone_id\":\"49\",\"address\":null},\"products\":[{\"product_id\":1417,\"item_photo\":\"16159734951614579838\\u062f\\u064a\\u0641\\u0646\\u062f\\u0631-\\u0645\\u062e\\u0637\\u0637-416x520.jpg\",\"item_name\":\"test\",\"quantity\":1,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":23}],\"discount\":0,\"shipping_price\":40.25,\"coupon_code\":\"\",\"subtotal\":23,\"tax_percentage\":15,\"currency\":{\"id\":4,\"name_ar\":\"\\u0631.\\u0633\",\"name_en\":\"SR\",\"code\":\"SAR\",\"symbol\":\"SR\",\"value\":1,\"status\":1,\"is_deafult\":1,\"created_at\":\"2020-06-15 22:28:08\",\"updated_at\":\"2021-02-03 07:51:00\"},\"total\":63.25}', NULL, NULL, 'pending', NULL, NULL, '2021-03-28 15:51:18', '2021-03-28 15:51:18'),
('6faf667c-7d2c-4a3a-9bc5-dcaa64f2aa73', 'my_fatoorah', 226, 408.25, 4, '\"{\\\"is_address_saved\\\":true,\\\"is_valid\\\":true,\\\"user\\\":{\\\"id\\\":226,\\\"first_name\\\":\\\"etazm\\\",\\\"last_name\\\":\\\"Test\\\",\\\"email\\\":\\\"et.azm112@gmail.com\\\",\\\"phone\\\":\\\"1020750779\\\",\\\"phone_code_id\\\":57,\\\"gender\\\":\\\"\\\\u0630\\\\u0643\\\\u0631\\\",\\\"birth_date\\\":null,\\\"user_status\\\":null,\\\"country_id\\\":1,\\\"city_id\\\":63,\\\"zone_id\\\":84,\\\"government_id\\\":13,\\\"created_at\\\":\\\"2021-02-28 22:35:31\\\",\\\"updated_at\\\":\\\"2021-03-23 11:25:58\\\",\\\"is_newsletter_subscripe\\\":0,\\\"address\\\":\\\"ghghghgh\\\",\\\"is_active\\\":1,\\\"is_ban\\\":0,\\\"provider_id\\\":null,\\\"is_merchant\\\":0,\\\"company_name\\\":null,\\\"authorized_person\\\":null,\\\"account_number\\\":null,\\\"prices_level\\\":5},\\\"delivery_time\\\":\\\"21\\\",\\\"payment_type\\\":\\\"my_fatoorah\\\",\\\"address\\\":{\\\"id\\\":163,\\\"address\\\":\\\"10258\\\",\\\"user_id\\\":226,\\\"country_id\\\":1,\\\"government_id\\\":12,\\\"city_id\\\":60,\\\"zone_id\\\":152,\\\"created_at\\\":\\\"2021-03-03 04:21:56\\\",\\\"updated_at\\\":\\\"2021-03-23 11:27:00\\\"},\\\"products\\\":[{\\\"product_id\\\":1417,\\\"item_photo\\\":\\\"16159734951614579838\\\\u062f\\\\u064a\\\\u0641\\\\u0646\\\\u062f\\\\u0631-\\\\u0645\\\\u062e\\\\u0637\\\\u0637-416x520.jpg\\\",\\\"item_name\\\":\\\"test\\\",\\\"quantity\\\":1,\\\"item_combination_name\\\":null,\\\"combination_id\\\":null,\\\"item_price\\\":23},{\\\"product_id\\\":1412,\\\"item_photo\\\":\\\"16157503721608122858_Powerol222-650x650.jpg\\\",\\\"item_name\\\":\\\"\\\\u0628\\\\u0627\\\\u0648\\\\u0631\\\\u0648\\\\u0644\\\\u0648\\\\u062c\\\\u064a \\\\u0643\\\\u064a\\\\u0628\\\\u0644 \\\\u0644\\\\u0627\\\\u064a\\\\u062a\\\\u0646\\\\u063a 1.2 \\\\u0645\\\\u062a\\\\u0631 (\\\\u0623\\\\u0632\\\\u0631\\\\u0642)\\\",\\\"quantity\\\":1,\\\"item_combination_name\\\":null,\\\"combination_id\\\":null,\\\"item_price\\\":90.85},{\\\"product_id\\\":1414,\\\"item_photo\\\":\\\"16157506091605605447_0001 (6)-650x650.jpg\\\",\\\"item_name\\\":\\\"\\\\u0628\\\\u0627\\\\u0648\\\\u0631\\\\u0648\\\\u0644\\\\u0648\\\\u062c\\\\u064a \\\\u0643\\\\u064a\\\\u0628\\\\u0644 \\\\u0644\\\\u0627\\\\u064a\\\\u062a\\\\u0646\\\\u063a 1.2 \\\\u0645\\\\u062a\\\\u0631 (\\\\u0623\\\\u0628\\\\u064a\\\\u0636)\\\",\\\"quantity\\\":1,\\\"item_combination_name\\\":null,\\\"combination_id\\\":null,\\\"item_price\\\":90.85},{\\\"product_id\\\":1409,\\\"item_photo\\\":\\\"16157500111608122858_Powerol222-650x650.jpg\\\",\\\"item_name\\\":\\\"\\\\u0645\\\\u062d\\\\u0648\\\\u0644 \\\\u0627\\\\u0644\\\\u0633\\\\u0641\\\\u0631 \\\\u0627\\\\u0644\\\\u0639\\\\u0627\\\\u0644\\\\u0645\\\\u064a \\\\u0628\\\\u0627\\\\u0648\\\\u0631\\\\u0648\\\\u0644\\\\u0648\\\\u062c\\\\u064a \\\\u0645\\\\u0639 \\\\u062a\\\\u0648\\\\u0635\\\\u064a\\\\u0644 \\\\u0637\\\\u0627\\\\u0642\\\\u0629 2.4 \\\\u0623\\\\u0645\\\\u0628\\\\u064a\\\\u0631 + PD 18 \\\\u0648\\\\u0627\\\\u062a (\\\\u0623\\\\u0633\\\\u0648\\\\u062f)\\\",\\\"quantity\\\":1,\\\"item_combination_name\\\":null,\\\"combination_id\\\":null,\\\"item_price\\\":136.85},{\\\"product_id\\\":647,\\\"item_photo\\\":\\\"1614223641hm6M5x8Z1AYzY92UuIvSWV5SIhm2pfoL0VJgWD0K.jpeg\\\",\\\"item_name\\\":\\\"\\\\u0627\\\\u0644\\\\u062a\\\\u063a\\\\u0644\\\\u064a\\\\u0641 \\\\u0627\\\\u0644\\\\u062d\\\\u0631\\\\u0627\\\\u0631\\\\u064a \\\\u0644\\\\u0644\\\\u0633\\\\u0627\\\\u0639\\\\u0627\\\\u062a \\\\u0648\\\\u0627\\\\u0644\\\\u0627\\\\u0633\\\\u0627\\\\u0648\\\\u0631 \\\\u0645\\\\u0646 \\\\u0628\\\\u0631\\\\u0648\\\\u062a\\\\u0643\\\\u0634\\\\u0646 \\\\u0628\\\\u0631\\\\u0648\\\",\\\"quantity\\\":1,\\\"item_combination_name\\\":null,\\\"combination_id\\\":null,\\\"item_price\\\":26.45}],\\\"discount\\\":0,\\\"shipping_price\\\":40.25,\\\"coupon_code\\\":\\\"\\\",\\\"subtotal\\\":367.99999999999994,\\\"tax_percentage\\\":15,\\\"currency\\\":{\\\"id\\\":4,\\\"name_ar\\\":\\\"\\\\u0631.\\\\u0633\\\",\\\"name_en\\\":\\\"SR\\\",\\\"code\\\":\\\"SAR\\\",\\\"symbol\\\":\\\"SR\\\",\\\"value\\\":1,\\\"status\\\":1,\\\"is_deafult\\\":1,\\\"created_at\\\":\\\"2020-06-15 22:28:08\\\",\\\"updated_at\\\":\\\"2021-02-03 07:51:00\\\"},\\\"total\\\":408.25}\"', '602302', NULL, 'pending', NULL, NULL, '2021-03-28 13:17:35', '2021-03-28 13:17:35'),
('86f4f72d-1710-4789-aa85-d97771a8ed2a', 'my_fatoorah', 226, 114774.6, 4, '{\"is_address_saved\":true,\"is_valid\":true,\"user\":{\"id\":226,\"first_name\":\"etazm\",\"last_name\":\"Test\",\"email\":\"et.azm112@gmail.com\",\"phone\":\"1020750779\",\"phone_code_id\":57,\"gender\":\"\\u0630\\u0643\\u0631\",\"birth_date\":null,\"user_status\":null,\"country_id\":1,\"city_id\":63,\"zone_id\":84,\"government_id\":13,\"created_at\":\"2021-02-28T19:35:31.000000Z\",\"updated_at\":\"2021-03-23T08:25:58.000000Z\",\"is_newsletter_subscripe\":0,\"address\":\"ghghghgh\",\"is_active\":1,\"is_ban\":0,\"provider_id\":null,\"is_merchant\":0,\"company_name\":null,\"authorized_person\":null,\"account_number\":null,\"prices_level\":5,\"has_forward_account\":0},\"delivery_time\":\"21\",\"payment_type\":\"my_fatoorah\",\"address\":{\"id\":166,\"address\":\"test2\",\"user_id\":226,\"country_id\":1,\"government_id\":13,\"city_id\":62,\"zone_id\":70,\"created_at\":\"2021-03-23T07:59:11.000000Z\",\"updated_at\":\"2021-03-23T07:59:11.000000Z\"},\"products\":[{\"product_id\":1416,\"item_photo\":\"16157509101605605047_0001 (4)-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0634\\u062d\\u0646 \\u064a\\u0648 \\u0627\\u0633 \\u0628\\u064a - \\u0633\\u064a \\u0625\\u0644\\u0649 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u0633\\u0648\\u062f)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":102.35},{\"product_id\":1415,\"item_photo\":\"16157507781605606057_0001 (9)-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0633\\u0645\\u0639\\u064a\\u0627\\u062a \\u064a\\u0648 \\u0627\\u0633 \\u0628\\u064a - \\u0633\\u064a \\u0625\\u0644\\u0649 \\u0623\\u064a\\u0647 \\u064a\\u0648 \\u0623\\u0643\\u0633 (1.2 \\u0645)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":102.35},{\"product_id\":1414,\"item_photo\":\"16157506091605605447_0001 (6)-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u0628\\u064a\\u0636)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":90.85},{\"product_id\":1413,\"item_photo\":\"16157505671608122858_Powerol222-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u062d\\u0645\\u0631)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":90.85},{\"product_id\":1412,\"item_photo\":\"16157503721608122858_Powerol222-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u0632\\u0631\\u0642)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":90.85},{\"product_id\":627,\"item_photo\":\"1614285171\\u0643\\u0627\\u0631\\u0628\\u0648\\u0646 \\u0641\\u0627\\u064a\\u0628\\u0631 \\u0627\\u062d\\u0645\\u0631-01.jpg\",\"item_name\":\"\\u0645\\u0627\\u0643\\u064a\\u0646\\u0629 \\u0644\\u0644\\u062a\\u063a\\u0644\\u064a\\u0641 \\u0627\\u0644\\u062d\\u0631\\u0627\\u0631\\u064a \\u0645\\u0646 \\u0628\\u0631\\u0648\\u062a\\u0643\\u0634\\u0646 \\u0628\\u0631\\u0648 (\\u0648\\u0633\\u0637)\",\"quantity\":15,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":6133.3295},{\"product_id\":626,\"item_photo\":\"1614285304\\u0643\\u0627\\u0631\\u0628\\u0648\\u0646 \\u0641\\u0627\\u064a\\u0628\\u0631  \\u0627\\u0628\\u064a\\u0636-01.jpg\",\"item_name\":\"\\u0645\\u0627\\u0643\\u064a\\u0646\\u0629 \\u0644\\u0644\\u062a\\u063a\\u0644\\u064a\\u0641 \\u0627\\u0644\\u062d\\u0631\\u0627\\u0631\\u064a \\u0645\\u0646 \\u0628\\u0631\\u0648\\u062a\\u0643\\u0634\\u0646 \\u0628\\u0631\\u0648 ( \\u0643\\u0628\\u064a\\u0631\\u0629)\",\"quantity\":1,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":17961.9075}],\"discount\":0,\"shipping_price\":40.25,\"coupon_code\":\"\",\"subtotal\":114734.35,\"tax_percentage\":15,\"currency\":{\"id\":4,\"name_ar\":\"\\u0631.\\u0633\",\"name_en\":\"SR\",\"code\":\"SAR\",\"symbol\":\"SR\",\"value\":1,\"status\":1,\"is_deafult\":1,\"created_at\":\"2020-06-15T19:28:08.000000Z\",\"updated_at\":\"2021-02-03T04:51:00.000000Z\"},\"total\":114774.6}', NULL, NULL, 'pending', NULL, NULL, '2021-04-14 14:33:37', '2021-04-14 14:33:37'),
('a6bec35a-02f3-4758-915a-91df7d816e1c', 'my_fatoorah', 226, 114774.6, 4, '{\"is_address_saved\":true,\"is_valid\":true,\"user\":{\"id\":226,\"first_name\":\"etazm\",\"last_name\":\"Test\",\"email\":\"et.azm112@gmail.com\",\"phone\":\"1020750779\",\"phone_code_id\":57,\"gender\":\"\\u0630\\u0643\\u0631\",\"birth_date\":null,\"user_status\":null,\"country_id\":1,\"city_id\":63,\"zone_id\":84,\"government_id\":13,\"created_at\":\"2021-02-28T19:35:31.000000Z\",\"updated_at\":\"2021-03-23T08:25:58.000000Z\",\"is_newsletter_subscripe\":0,\"address\":\"ghghghgh\",\"is_active\":1,\"is_ban\":0,\"provider_id\":null,\"is_merchant\":0,\"company_name\":null,\"authorized_person\":null,\"account_number\":null,\"prices_level\":5,\"has_forward_account\":0},\"delivery_time\":\"21\",\"payment_type\":\"my_fatoorah\",\"address\":{\"id\":166,\"address\":\"test2\",\"user_id\":226,\"country_id\":1,\"government_id\":13,\"city_id\":62,\"zone_id\":70,\"created_at\":\"2021-03-23T07:59:11.000000Z\",\"updated_at\":\"2021-03-23T07:59:11.000000Z\"},\"products\":[{\"product_id\":1416,\"item_photo\":\"16157509101605605047_0001 (4)-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0634\\u062d\\u0646 \\u064a\\u0648 \\u0627\\u0633 \\u0628\\u064a - \\u0633\\u064a \\u0625\\u0644\\u0649 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u0633\\u0648\\u062f)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":102.35},{\"product_id\":1415,\"item_photo\":\"16157507781605606057_0001 (9)-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0633\\u0645\\u0639\\u064a\\u0627\\u062a \\u064a\\u0648 \\u0627\\u0633 \\u0628\\u064a - \\u0633\\u064a \\u0625\\u0644\\u0649 \\u0623\\u064a\\u0647 \\u064a\\u0648 \\u0623\\u0643\\u0633 (1.2 \\u0645)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":102.35},{\"product_id\":1414,\"item_photo\":\"16157506091605605447_0001 (6)-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u0628\\u064a\\u0636)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":90.85},{\"product_id\":1413,\"item_photo\":\"16157505671608122858_Powerol222-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u062d\\u0645\\u0631)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":90.85},{\"product_id\":1412,\"item_photo\":\"16157503721608122858_Powerol222-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u0632\\u0631\\u0642)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":90.85},{\"product_id\":627,\"item_photo\":\"1614285171\\u0643\\u0627\\u0631\\u0628\\u0648\\u0646 \\u0641\\u0627\\u064a\\u0628\\u0631 \\u0627\\u062d\\u0645\\u0631-01.jpg\",\"item_name\":\"\\u0645\\u0627\\u0643\\u064a\\u0646\\u0629 \\u0644\\u0644\\u062a\\u063a\\u0644\\u064a\\u0641 \\u0627\\u0644\\u062d\\u0631\\u0627\\u0631\\u064a \\u0645\\u0646 \\u0628\\u0631\\u0648\\u062a\\u0643\\u0634\\u0646 \\u0628\\u0631\\u0648 (\\u0648\\u0633\\u0637)\",\"quantity\":15,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":6133.3295},{\"product_id\":626,\"item_photo\":\"1614285304\\u0643\\u0627\\u0631\\u0628\\u0648\\u0646 \\u0641\\u0627\\u064a\\u0628\\u0631  \\u0627\\u0628\\u064a\\u0636-01.jpg\",\"item_name\":\"\\u0645\\u0627\\u0643\\u064a\\u0646\\u0629 \\u0644\\u0644\\u062a\\u063a\\u0644\\u064a\\u0641 \\u0627\\u0644\\u062d\\u0631\\u0627\\u0631\\u064a \\u0645\\u0646 \\u0628\\u0631\\u0648\\u062a\\u0643\\u0634\\u0646 \\u0628\\u0631\\u0648 ( \\u0643\\u0628\\u064a\\u0631\\u0629)\",\"quantity\":1,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":17961.9075}],\"discount\":0,\"shipping_price\":40.25,\"coupon_code\":\"\",\"subtotal\":114734.35,\"tax_percentage\":15,\"currency\":{\"id\":4,\"name_ar\":\"\\u0631.\\u0633\",\"name_en\":\"SR\",\"code\":\"SAR\",\"symbol\":\"SR\",\"value\":1,\"status\":1,\"is_deafult\":1,\"created_at\":\"2020-06-15T19:28:08.000000Z\",\"updated_at\":\"2021-02-03T04:51:00.000000Z\"},\"total\":114774.6}', NULL, NULL, 'pending', NULL, NULL, '2021-04-14 14:32:57', '2021-04-14 14:32:57'),
('c8c33b24-6b9a-4cb8-88a3-31fb9289bb1c', 'my_fatoorah', 226, 114774.6, 4, '{\"is_address_saved\":true,\"is_valid\":true,\"user\":{\"id\":226,\"first_name\":\"etazm\",\"last_name\":\"Test\",\"email\":\"et.azm112@gmail.com\",\"phone\":\"1020750779\",\"phone_code_id\":57,\"gender\":\"\\u0630\\u0643\\u0631\",\"birth_date\":null,\"user_status\":null,\"country_id\":1,\"city_id\":63,\"zone_id\":84,\"government_id\":13,\"created_at\":\"2021-02-28T19:35:31.000000Z\",\"updated_at\":\"2021-03-23T08:25:58.000000Z\",\"is_newsletter_subscripe\":0,\"address\":\"ghghghgh\",\"is_active\":1,\"is_ban\":0,\"provider_id\":null,\"is_merchant\":0,\"company_name\":null,\"authorized_person\":null,\"account_number\":null,\"prices_level\":5,\"has_forward_account\":0},\"delivery_time\":\"21\",\"payment_type\":\"my_fatoorah\",\"address\":{\"id\":163,\"address\":\"10258\",\"user_id\":226,\"country_id\":1,\"government_id\":12,\"city_id\":60,\"zone_id\":152,\"created_at\":\"2021-03-03T01:21:56.000000Z\",\"updated_at\":\"2021-03-23T08:27:00.000000Z\"},\"products\":[{\"product_id\":1416,\"item_photo\":\"16157509101605605047_0001 (4)-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0634\\u062d\\u0646 \\u064a\\u0648 \\u0627\\u0633 \\u0628\\u064a - \\u0633\\u064a \\u0625\\u0644\\u0649 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u0633\\u0648\\u062f)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":102.35},{\"product_id\":1415,\"item_photo\":\"16157507781605606057_0001 (9)-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0633\\u0645\\u0639\\u064a\\u0627\\u062a \\u064a\\u0648 \\u0627\\u0633 \\u0628\\u064a - \\u0633\\u064a \\u0625\\u0644\\u0649 \\u0623\\u064a\\u0647 \\u064a\\u0648 \\u0623\\u0643\\u0633 (1.2 \\u0645)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":102.35},{\"product_id\":1414,\"item_photo\":\"16157506091605605447_0001 (6)-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u0628\\u064a\\u0636)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":90.85},{\"product_id\":1413,\"item_photo\":\"16157505671608122858_Powerol222-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u062d\\u0645\\u0631)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":90.85},{\"product_id\":1412,\"item_photo\":\"16157503721608122858_Powerol222-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u0632\\u0631\\u0642)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":90.85},{\"product_id\":627,\"item_photo\":\"1614285171\\u0643\\u0627\\u0631\\u0628\\u0648\\u0646 \\u0641\\u0627\\u064a\\u0628\\u0631 \\u0627\\u062d\\u0645\\u0631-01.jpg\",\"item_name\":\"\\u0645\\u0627\\u0643\\u064a\\u0646\\u0629 \\u0644\\u0644\\u062a\\u063a\\u0644\\u064a\\u0641 \\u0627\\u0644\\u062d\\u0631\\u0627\\u0631\\u064a \\u0645\\u0646 \\u0628\\u0631\\u0648\\u062a\\u0643\\u0634\\u0646 \\u0628\\u0631\\u0648 (\\u0648\\u0633\\u0637)\",\"quantity\":15,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":6133.3295},{\"product_id\":626,\"item_photo\":\"1614285304\\u0643\\u0627\\u0631\\u0628\\u0648\\u0646 \\u0641\\u0627\\u064a\\u0628\\u0631  \\u0627\\u0628\\u064a\\u0636-01.jpg\",\"item_name\":\"\\u0645\\u0627\\u0643\\u064a\\u0646\\u0629 \\u0644\\u0644\\u062a\\u063a\\u0644\\u064a\\u0641 \\u0627\\u0644\\u062d\\u0631\\u0627\\u0631\\u064a \\u0645\\u0646 \\u0628\\u0631\\u0648\\u062a\\u0643\\u0634\\u0646 \\u0628\\u0631\\u0648 ( \\u0643\\u0628\\u064a\\u0631\\u0629)\",\"quantity\":1,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":17961.9075}],\"discount\":0,\"shipping_price\":40.25,\"coupon_code\":\"\",\"subtotal\":114734.35,\"tax_percentage\":15,\"currency\":{\"id\":4,\"name_ar\":\"\\u0631.\\u0633\",\"name_en\":\"SR\",\"code\":\"SAR\",\"symbol\":\"SR\",\"value\":1,\"status\":1,\"is_deafult\":1,\"created_at\":\"2020-06-15T19:28:08.000000Z\",\"updated_at\":\"2021-02-03T04:51:00.000000Z\"},\"total\":114774.6}', NULL, NULL, 'pending', NULL, NULL, '2021-04-14 14:14:46', '2021-04-14 14:14:46'),
('d441fcaa-e02d-4094-a7c9-95cd1c237a70', 'my_fatoorah', 226, 154.1, 4, '{\"is_address_saved\":true,\"is_valid\":true,\"user\":{\"id\":226,\"first_name\":\"etazm\",\"last_name\":\"Test\",\"email\":\"et.azm112@gmail.com\",\"phone\":\"1020750779\",\"phone_code_id\":57,\"gender\":\"\\u0630\\u0643\\u0631\",\"birth_date\":null,\"user_status\":null,\"country_id\":1,\"city_id\":63,\"zone_id\":84,\"government_id\":13,\"created_at\":\"2021-02-28 22:35:31\",\"updated_at\":\"2021-03-23 11:25:58\",\"is_newsletter_subscripe\":0,\"address\":\"ghghghgh\",\"is_active\":1,\"is_ban\":0,\"provider_id\":null,\"is_merchant\":0,\"company_name\":null,\"authorized_person\":null,\"account_number\":null,\"prices_level\":5},\"delivery_time\":\"21\",\"payment_type\":\"my_fatoorah\",\"address\":{\"id\":163,\"address\":\"10258\",\"user_id\":226,\"country_id\":1,\"government_id\":12,\"city_id\":60,\"zone_id\":152,\"created_at\":\"2021-03-03 04:21:56\",\"updated_at\":\"2021-03-23 11:27:00\"},\"products\":[{\"product_id\":1417,\"item_photo\":\"16159734951614579838\\u062f\\u064a\\u0641\\u0646\\u062f\\u0631-\\u0645\\u062e\\u0637\\u0637-416x520.jpg\",\"item_name\":\"test\",\"quantity\":1,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":23},{\"product_id\":1412,\"item_photo\":\"16157503721608122858_Powerol222-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u0632\\u0631\\u0642)\",\"quantity\":1,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":90.85}],\"discount\":0,\"shipping_price\":40.25,\"coupon_code\":\"\",\"subtotal\":113.85,\"tax_percentage\":15,\"currency\":{\"id\":4,\"name_ar\":\"\\u0631.\\u0633\",\"name_en\":\"SR\",\"code\":\"SAR\",\"symbol\":\"SR\",\"value\":1,\"status\":1,\"is_deafult\":1,\"created_at\":\"2020-06-15 22:28:08\",\"updated_at\":\"2021-02-03 07:51:00\"},\"total\":154.1}', '602302', '\"{\\\"InvoiceId\\\":602302,\\\"InvoiceStatus\\\":\\\"Pending\\\",\\\"InvoiceReference\\\":\\\"2021035991\\\",\\\"CustomerReference\\\":null,\\\"CreatedDate\\\":\\\"2021-03-28T14:16:58\\\",\\\"ExpiryDate\\\":\\\"March 31, 2021\\\",\\\"InvoiceValue\\\":27.902,\\\"Comments\\\":null,\\\"CustomerName\\\":\\\"etazm Test\\\",\\\"CustomerMobile\\\":\\\"+201020750779\\\",\\\"CustomerEmail\\\":\\\"et.azm112@gmail.com\\\",\\\"UserDefinedField\\\":null,\\\"InvoiceDisplayValue\\\":\\\"408.250 SR\\\",\\\"InvoiceItems\\\":[{\\\"ItemName\\\":\\\"test\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":1.572,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u0628\\\\u0627\\\\u0648\\\\u0631\\\\u0648\\\\u0644\\\\u0648\\\\u062c\\\\u064a \\\\u0643\\\\u064a\\\\u0628\\\\u0644 \\\\u0644\\\\u0627\\\\u064a\\\\u062a\\\\u0646\\\\u063a 1.2 \\\\u0645\\\\u062a\\\\u0631 (\\\\u0623\\\\u0632\\\\u0631\\\\u0642)\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":6.209,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u0628\\\\u0627\\\\u0648\\\\u0631\\\\u0648\\\\u0644\\\\u0648\\\\u062c\\\\u064a \\\\u0643\\\\u064a\\\\u0628\\\\u0644 \\\\u0644\\\\u0627\\\\u064a\\\\u062a\\\\u0646\\\\u063a 1.2 \\\\u0645\\\\u062a\\\\u0631 (\\\\u0623\\\\u0628\\\\u064a\\\\u0636)\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":6.209,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u0645\\\\u062d\\\\u0648\\\\u0644 \\\\u0627\\\\u0644\\\\u0633\\\\u0641\\\\u0631 \\\\u0627\\\\u0644\\\\u0639\\\\u0627\\\\u0644\\\\u0645\\\\u064a \\\\u0628\\\\u0627\\\\u0648\\\\u0631\\\\u0648\\\\u0644\\\\u0648\\\\u062c\\\\u064a \\\\u0645\\\\u0639 \\\\u062a\\\\u0648\\\\u0635\\\\u064a\\\\u0644 \\\\u0637\\\\u0627\\\\u0642\\\\u0629 2.4 \\\\u0623\\\\u0645\\\\u0628\\\\u064a\\\\u0631 + PD 18 \\\\u0648\\\\u0627\\\\u062a (\\\\u0623\\\\u0633\\\\u0648\\\\u062f)\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":9.353,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"\\\\u0627\\\\u0644\\\\u062a\\\\u063a\\\\u0644\\\\u064a\\\\u0641 \\\\u0627\\\\u0644\\\\u062d\\\\u0631\\\\u0627\\\\u0631\\\\u064a \\\\u0644\\\\u0644\\\\u0633\\\\u0627\\\\u0639\\\\u0627\\\\u062a \\\\u0648\\\\u0627\\\\u0644\\\\u0627\\\\u0633\\\\u0627\\\\u0648\\\\u0631 \\\\u0645\\\\u0646 \\\\u0628\\\\u0631\\\\u0648\\\\u062a\\\\u0643\\\\u0634\\\\u0646 \\\\u0628\\\\u0631\\\\u0648\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":1.808,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null},{\\\"ItemName\\\":\\\"ordermodule.checkout.shipping_cost\\\",\\\"Quantity\\\":1,\\\"UnitPrice\\\":2.751,\\\"Weight\\\":null,\\\"Width\\\":null,\\\"Height\\\":null,\\\"Depth\\\":null}],\\\"InvoiceTransactions\\\":[{\\\"TransactionDate\\\":\\\"2021-03-28T14:17:23.453\\\",\\\"PaymentGateway\\\":\\\"VISA\\\\\\/MASTER\\\",\\\"ReferenceId\\\":\\\"060660230248939662\\\",\\\"TrackId\\\":\\\"28-03-2021_489396\\\",\\\"TransactionId\\\":\\\"060660230248939662\\\",\\\"PaymentId\\\":\\\"060660230248939662\\\",\\\"AuthorizationId\\\":\\\"060660230248939662\\\",\\\"TransactionStatus\\\":\\\"Failed\\\",\\\"TransationValue\\\":\\\"27.902\\\",\\\"CustomerServiceCharge\\\":\\\"0.000\\\",\\\"DueValue\\\":\\\"27.910\\\",\\\"PaidCurrency\\\":\\\"KD\\\",\\\"PaidCurrencyValue\\\":\\\"27.910\\\",\\\"Currency\\\":\\\"KD\\\",\\\"Error\\\":\\\"TIMED_OUT\\\",\\\"CardNumber\\\":null}],\\\"Suppliers\\\":[]}\"', 'pending', '060660230248939662', '2021-03-28 15:58:29', '2021-03-28 13:36:56', '2021-03-28 13:58:29'),
('eb1c59b9-8ac2-47a0-9abe-155a3d547381', 'my_fatoorah', 226, 114774.6, 4, '{\"is_address_saved\":true,\"is_valid\":true,\"user\":{\"id\":226,\"first_name\":\"etazm\",\"last_name\":\"Test\",\"email\":\"et.azm112@gmail.com\",\"phone\":\"1020750779\",\"phone_code_id\":57,\"gender\":\"\\u0630\\u0643\\u0631\",\"birth_date\":null,\"user_status\":null,\"country_id\":1,\"city_id\":63,\"zone_id\":84,\"government_id\":13,\"created_at\":\"2021-02-28T19:35:31.000000Z\",\"updated_at\":\"2021-03-23T08:25:58.000000Z\",\"is_newsletter_subscripe\":0,\"address\":\"ghghghgh\",\"is_active\":1,\"is_ban\":0,\"provider_id\":null,\"is_merchant\":0,\"company_name\":null,\"authorized_person\":null,\"account_number\":null,\"prices_level\":5,\"has_forward_account\":0},\"delivery_time\":\"21\",\"payment_type\":\"my_fatoorah\",\"address\":{\"id\":163,\"address\":\"10258\",\"user_id\":226,\"country_id\":1,\"government_id\":12,\"city_id\":60,\"zone_id\":152,\"created_at\":\"2021-03-03T01:21:56.000000Z\",\"updated_at\":\"2021-03-23T08:27:00.000000Z\"},\"products\":[{\"product_id\":1416,\"item_photo\":\"16157509101605605047_0001 (4)-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0634\\u062d\\u0646 \\u064a\\u0648 \\u0627\\u0633 \\u0628\\u064a - \\u0633\\u064a \\u0625\\u0644\\u0649 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u0633\\u0648\\u062f)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":102.35},{\"product_id\":1415,\"item_photo\":\"16157507781605606057_0001 (9)-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0633\\u0645\\u0639\\u064a\\u0627\\u062a \\u064a\\u0648 \\u0627\\u0633 \\u0628\\u064a - \\u0633\\u064a \\u0625\\u0644\\u0649 \\u0623\\u064a\\u0647 \\u064a\\u0648 \\u0623\\u0643\\u0633 (1.2 \\u0645)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":102.35},{\"product_id\":1414,\"item_photo\":\"16157506091605605447_0001 (6)-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u0628\\u064a\\u0636)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":90.85},{\"product_id\":1413,\"item_photo\":\"16157505671608122858_Powerol222-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u062d\\u0645\\u0631)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":90.85},{\"product_id\":1412,\"item_photo\":\"16157503721608122858_Powerol222-650x650.jpg\",\"item_name\":\"\\u0628\\u0627\\u0648\\u0631\\u0648\\u0644\\u0648\\u062c\\u064a \\u0643\\u064a\\u0628\\u0644 \\u0644\\u0627\\u064a\\u062a\\u0646\\u063a 1.2 \\u0645\\u062a\\u0631 (\\u0623\\u0632\\u0631\\u0642)\",\"quantity\":10,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":90.85},{\"product_id\":627,\"item_photo\":\"1614285171\\u0643\\u0627\\u0631\\u0628\\u0648\\u0646 \\u0641\\u0627\\u064a\\u0628\\u0631 \\u0627\\u062d\\u0645\\u0631-01.jpg\",\"item_name\":\"\\u0645\\u0627\\u0643\\u064a\\u0646\\u0629 \\u0644\\u0644\\u062a\\u063a\\u0644\\u064a\\u0641 \\u0627\\u0644\\u062d\\u0631\\u0627\\u0631\\u064a \\u0645\\u0646 \\u0628\\u0631\\u0648\\u062a\\u0643\\u0634\\u0646 \\u0628\\u0631\\u0648 (\\u0648\\u0633\\u0637)\",\"quantity\":15,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":6133.3295},{\"product_id\":626,\"item_photo\":\"1614285304\\u0643\\u0627\\u0631\\u0628\\u0648\\u0646 \\u0641\\u0627\\u064a\\u0628\\u0631  \\u0627\\u0628\\u064a\\u0636-01.jpg\",\"item_name\":\"\\u0645\\u0627\\u0643\\u064a\\u0646\\u0629 \\u0644\\u0644\\u062a\\u063a\\u0644\\u064a\\u0641 \\u0627\\u0644\\u062d\\u0631\\u0627\\u0631\\u064a \\u0645\\u0646 \\u0628\\u0631\\u0648\\u062a\\u0643\\u0634\\u0646 \\u0628\\u0631\\u0648 ( \\u0643\\u0628\\u064a\\u0631\\u0629)\",\"quantity\":1,\"item_combination_name\":null,\"combination_id\":null,\"item_price\":17961.9075}],\"discount\":0,\"shipping_price\":40.25,\"coupon_code\":\"\",\"subtotal\":114734.35,\"tax_percentage\":15,\"currency\":{\"id\":4,\"name_ar\":\"\\u0631.\\u0633\",\"name_en\":\"SR\",\"code\":\"SAR\",\"symbol\":\"SR\",\"value\":1,\"status\":1,\"is_deafult\":1,\"created_at\":\"2020-06-15T19:28:08.000000Z\",\"updated_at\":\"2021-02-03T04:51:00.000000Z\"},\"total\":114774.6}', NULL, NULL, 'pending', NULL, NULL, '2021-04-14 14:15:33', '2021-04-14 14:15:33');

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
  `is_newsletter_subscripe` tinyint(1) NOT NULL DEFAULT 0,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_ban` tinyint(1) NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_merchant` int(11) NOT NULL DEFAULT 0,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authorized_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prices_level` int(11) DEFAULT 5,
  `has_forward_account` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `phone_code_id`, `gender`, `birth_date`, `user_status`, `password`, `country_id`, `city_id`, `zone_id`, `government_id`, `remember_token`, `created_at`, `updated_at`, `is_newsletter_subscripe`, `address`, `is_active`, `is_ban`, `provider_id`, `is_merchant`, `company_name`, `authorized_person`, `account_number`, `prices_level`, `has_forward_account`) VALUES
(197, NULL, NULL, 'S@s.s', '0587777453', 157, '1', NULL, NULL, '$2y$10$w7RB7tNHO6pfNrExdE6DJeaWk22PyQ.3ygBIF7gFxz8UdG1DykhVq', 1, 63, 84, 13, '76PLa7RrkLYqeA9nupWBOtZxfeTcAXqsq5qHQIfCrN4TKJBVCNgjThAMySiD', '2021-01-29 02:52:41', '2021-03-16 14:10:08', 0, NULL, 1, 0, NULL, 1, 'شركة سبيس موبايل', 'حسن علي الشمراني', '2147', 1, 0),
(211, 'Fatima', 'HASSAN', 'girlsfat@gmail.com', '509271407', 157, 'انثى', NULL, NULL, '$2y$10$o10md9ttrCikKbipa7H8segVqJw8HSJ9IUYzfk2SBsJbwf.Bn4nX2', 1, 56, 47, 11, NULL, '2021-02-18 02:28:44', '2021-03-16 14:01:17', 0, NULL, 1, 0, NULL, 0, NULL, NULL, NULL, 5, 0),
(218, 'Mazen', 'El-Hefnawy', 'mazen@pioneers-solutions.com', '01020800367', 57, 'ذكر', NULL, NULL, '$2y$10$T4xks4fvBnolvpho52RxSu1J3HBAvJpBGx17rx8vSZgVTBbAtgE0e', 1, 56, 56, 11, 'Am5vQ0FzDvQTawq8RZ2iPBNwaPohp0tSrdEYoDuFuuzg013SKTn8hpBuTndH', '2021-02-25 15:24:04', '2021-03-16 14:01:17', 0, NULL, 1, 0, NULL, 0, NULL, NULL, NULL, 5, 0),
(219, NULL, NULL, 'ajmal@ajmalalhawatif.com', '599865263', 157, '1', NULL, NULL, '$2y$10$k3pw2HAYZtzlOsC72DsS0.tUv9Yc8aRBEW/L7BVoHzkzGzc.AmbAa', 1, 63, 84, 13, NULL, '2021-02-25 17:16:31', '2021-03-16 14:10:08', 0, NULL, 1, 0, NULL, 1, 'تيلي', 'علي', '45444', 1, 0),
(222, 'لجين', 'عبدالرحمن', 'lujainabdulrhman@gmail.com', '534287737', 157, 'انثى', NULL, NULL, '$2y$10$2OqYY.5Y2pzjy5kw.5jjoulk2PPd4f.HiW3wJ8u9U6APP.DOCaNW2', 1, 62, 67, 13, NULL, '2021-02-25 23:42:32', '2021-03-16 14:01:17', 0, NULL, 1, 0, NULL, 0, NULL, NULL, NULL, 5, 0),
(223, 'سعد', 'الشمراني', 'saad.has1422@gmail.com', '554579912', 157, 'ذكر', NULL, NULL, '$2y$10$UN1bTjz7RRy7xWTa4ijY/.V2Qcq4vk7rAdlqGKYCMfUhIM0CRHJA.', 1, 63, 84, 13, NULL, '2021-02-26 21:12:27', '2021-03-16 14:01:17', 0, NULL, 1, 0, NULL, 0, NULL, NULL, NULL, 5, 0),
(224, 'حسن', 'الش', 'hahwash@hotmail.com', '0580307744', 157, 'ذكر', NULL, NULL, '$2y$10$1Ivuc6v/8kS4wAp51JWm0eApZNjWkp/4npLgX8Aea/TzOJBmdS1ZG', 1, 63, 84, 13, NULL, '2021-02-27 20:33:21', '2021-03-16 14:01:17', 0, NULL, 1, 0, NULL, 0, NULL, NULL, NULL, 5, 0),
(225, 'hewedy', 'test', 'cust@cust.com', '1020750778', 57, '0', NULL, NULL, '$2y$10$RHUb9o52EfoMcGTIz.CmzOzznxRO1209EOeWNxokoAIQjR3WJPsEi', 1, 56, 47, 11, '0mePk710bsSAsFpMqxDWJI22rbzPl7vYKnPFKRPhsyiroFaTFnUehWScCLBX', '2021-02-28 15:50:02', '2021-05-04 09:52:15', 0, 'teeeet', 1, 0, NULL, 1, 'Hewedy Corp', 'حسن علي الشمراني', '2142', 1, 0),
(226, 'etazm', 'Test', 'et.azm112@gmail.com', '1020750779', 57, 'ذكر', NULL, NULL, '$2y$10$.lz3.B4.3XN1z8Nbcl.Pteyz59LyE2hZtGjTcz.H0JOC/evJ5CwvO', 1, 63, 84, 13, 'mMsv7nI4cYPLdwH4LL8Y1eeyMdoCOe1A1NUTg0Qz0supl9NNaIa9eWqAB5o3', '2021-02-28 20:35:31', '2021-04-28 10:39:16', 0, 'ghghghgh', 1, 0, NULL, 0, NULL, NULL, NULL, 5, 0),
(227, 'hgfds', 'ghjk', 'sdjd@aks.com', '0596656679', 157, 'ذكر', NULL, NULL, '$2y$10$2bgXmVnpYbXTWMGjmMpVpOL0R9GTkshXQkYmtc9NVXsppTXDv3Sqq', 1, 63, 84, 13, 'RfFLnmarlJYXulblVBRiVdfHrovMq4ySyvnLmTnoEoiAt9Ip791ya37cq6AP', '2021-03-03 10:12:33', '2021-03-16 14:01:17', 0, NULL, 1, 0, NULL, 0, NULL, NULL, NULL, 5, 0);

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
(140, 'As', 197, 1, 12, 57, 93, '2021-01-29 02:55:52', '2021-01-29 02:55:52'),
(144, 'بعد مخبز صحاري ب 200 متر', 197, 1, 13, 63, 84, '2021-02-10 03:07:07', '2021-02-10 03:07:07'),
(155, 'Alyarmook', 211, 1, 11, 56, 47, '2021-02-18 02:34:43', '2021-02-18 02:34:43'),
(159, 'مجموعه ٧ عماره ١٢ شقه ١٣', 222, 1, 13, 62, 67, '2021-02-26 00:02:47', '2021-02-26 00:02:47'),
(160, NULL, 197, 1, 13, 63, 84, '2021-02-26 06:28:27', '2021-02-26 06:28:27'),
(161, 'الاسكان', 223, 1, 13, 63, 84, '2021-02-26 21:19:09', '2021-02-26 21:19:09'),
(162, '42317', 224, 1, 13, 63, 84, '2021-02-27 20:37:59', '2021-02-27 20:37:59'),
(163, '10258', 226, 1, 12, 60, 152, '2021-03-03 02:21:56', '2021-03-23 09:27:00'),
(164, 'نتالبيبلات', 227, 1, 13, 63, 84, '2021-03-03 16:33:46', '2021-03-03 16:33:46'),
(165, 'بعد مخبز صحاري ب 200 متر', 219, 1, 13, 63, 84, '2021-03-11 11:36:28', '2021-03-11 11:36:28'),
(166, 'test2', 226, 1, 13, 62, 70, '2021-03-23 08:59:11', '2021-03-23 08:59:11'),
(167, 'test2', 226, 1, 11, 56, 47, '2021-03-23 09:27:08', '2021-03-23 09:27:08'),
(168, 'teeeet', 225, 1, 11, 56, 49, '2021-03-23 12:57:11', '2021-03-23 12:57:11'),
(169, 'teeeet', 226, 1, 11, 56, 47, '2021-03-25 15:23:20', '2021-03-25 15:23:20'),
(173, 'teeeet', 226, 1, 11, 56, 49, '2021-03-25 15:36:10', '2021-03-25 15:36:10');

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
(33, 197, 1, 1, '2021-01-29', '2021-01-29 02:54:38'),
(42, 197, 1, 1, '2021-02-10', '2021-02-10 03:05:16'),
(46, 197, 1, 1, '2021-02-17', '2021-02-17 06:24:16'),
(57, 197, 1, 2, '2021-02-25', '2021-02-25 04:38:58'),
(58, 197, 1, 1, '2021-02-26', '2021-02-26 06:27:19'),
(59, 226, 0, 1, '2021-03-03', '2021-03-03 02:07:45'),
(60, 225, 0, 1, '2021-03-03', '2021-03-03 18:56:09'),
(61, 219, 1, 1, '2021-03-07', '2021-03-07 10:48:27'),
(62, 219, 1, 2, '2021-03-11', '2021-03-11 13:14:25'),
(64, 225, 0, 1, '2021-03-14', '2021-03-14 15:13:40'),
(66, 197, 1, 2, '2021-03-14', '2021-03-14 20:46:13'),
(67, 226, 0, 1, '2021-03-15', '2021-03-15 13:11:04'),
(68, 226, 0, 2, '2021-03-17', '2021-03-17 14:28:13'),
(69, 226, 0, 1, '2021-03-18', '2021-03-18 09:35:24'),
(70, 226, 0, 1, '2021-03-21', '2021-03-21 11:11:31'),
(71, 226, 0, 2, '2021-03-22', '2021-03-22 12:56:40'),
(72, 226, 0, 4, '2021-03-23', '2021-03-23 12:06:38'),
(73, 225, 1, 1, '2021-03-23', '2021-03-23 12:07:05'),
(74, 226, 0, 1, '2021-03-24', '2021-03-24 12:58:03'),
(75, 226, 0, 2, '2021-03-25', '2021-03-25 15:18:13'),
(76, 226, 0, 2, '2021-03-28', '2021-03-28 15:29:59'),
(77, 225, 1, 1, '2021-03-29', '2021-03-29 09:32:12'),
(78, 225, 1, 2, '2021-04-04', '2021-04-04 12:53:26'),
(79, 226, 0, 2, '2021-04-06', '2021-04-06 13:07:13'),
(80, 226, 0, 1, '2021-04-07', '2021-04-07 09:09:18'),
(81, 226, 0, 1, '2021-04-08', '2021-04-08 10:47:59'),
(82, 226, 0, 1, '2021-04-11', '2021-04-11 12:02:54'),
(83, 226, 0, 1, '2021-04-13', '2021-04-13 09:39:20'),
(84, 226, 0, 2, '2021-04-14', '2021-04-14 13:46:27'),
(85, 226, 0, 3, '2021-04-15', '2021-04-15 13:57:23'),
(86, 226, 0, 1, '2021-04-18', '2021-04-18 10:35:18'),
(87, 226, 0, 1, '2021-04-20', '2021-04-20 09:25:13'),
(88, 226, 0, 1, '2021-04-22', '2021-04-22 10:17:28'),
(89, 226, 0, 4, '2021-04-28', '2021-04-28 11:45:05'),
(90, 225, 1, 1, '2021-05-04', '2021-05-04 09:34:38');

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
(3, '01020750779', '9467', '2021-03-02 13:09:51', '2021-02-25 15:37:09', '2021-03-02 11:09:51'),
(4, '596656679', '7059', '2021-02-26 01:24:02', '2021-02-25 16:17:12', '2021-02-25 23:24:02'),
(5, '594710425', '1115', '2021-02-25 20:26:12', '2021-02-25 18:25:42', '2021-02-25 18:26:12'),
(6, '590099819', '1377', '2021-03-02 16:34:57', '2021-02-25 23:53:19', '2021-03-02 14:34:57'),
(7, '0596656679', '8289', '2021-03-15 02:23:18', '2021-03-03 14:17:46', '2021-03-15 00:23:18');

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
  `min_total` int(11) NOT NULL DEFAULT 0,
  `is_shipping` tinyint(1) DEFAULT NULL,
  `max_num_of_use` int(11) NOT NULL DEFAULT 0,
  `num_of_use` int(11) NOT NULL DEFAULT 0,
  `voucher_type` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `from`, `to`, `amount`, `percentage`, `status`, `min_total`, `is_shipping`, `max_num_of_use`, `num_of_use`, `voucher_type`, `created_at`, `updated_at`) VALUES
(3, 'uiyiyui', '2021-03-16', '2021-03-25', NULL, '50', 'enabled', 50, NULL, 50, 0, 2, '2021-03-16 13:35:32', '2021-03-16 13:35:32');

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
  `user_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usage_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_applicable` tinyint(1) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `replied_at` datetime DEFAULT NULL,
  `application_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `read_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warranties`
--

INSERT INTO `warranties` (`id`, `user_id`, `front_image`, `back_image`, `warranty_image`, `warranty_number`, `user_notes`, `usage_date`, `device_name_ar`, `device_name_en`, `is_applicable`, `value`, `currency_id`, `reason`, `admin_id`, `replied_at`, `application_number`, `created_at`, `updated_at`, `read_at`) VALUES
(2, 226, '1618303352p1.jpg', '1618303352p2.jpg', '1618303352p3.jpg', '4568-9632-8741-5236', NULL, '2021-02-24', 'تيست', 'test', 1, 200, 4, NULL, 3, '2021-04-13 13:58:42', '666-999-555-111', '2021-04-13 09:42:32', '2021-04-18 10:35:18', '2021-04-18 12:35:18'),
(3, 226, '1618311466p15.jpg', '1618311467p13.jpg', '1618311467p14.jpg', '9998-8887-6665-4441', NULL, '2021-03-09', 'تيست2', 'test2', 0, NULL, NULL, 'عيوب غير مقبوله', 3, '2021-04-13 13:59:13', '11-222-3333-4444', '2021-04-13 11:57:47', '2021-04-18 10:35:18', '2021-04-18 12:35:18'),
(4, 226, '1618313886p14.jpg', '1618313886p12.jpg', '1618313886p4.jpg', '999-999-999-99', NULL, '2021-04-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-13 12:38:06', '2021-04-14 11:40:52', NULL),
(5, 226, '1618399825.mp4', '1618399827.jpg', '1618399827.mp4', '999-858-5-52-651', NULL, '2021-04-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-14 12:30:27', '2021-04-14 12:30:27', NULL),
(6, 226, '1618488066.mov', '1618488067.jpg', '1618488067.mp4', 'nj', NULL, '2021-04-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-15 13:01:07', '2021-04-15 13:01:07', NULL);

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
(62, 226, 1417, '2021-04-20 10:41:09', '2021-04-20 10:41:09');

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
(192, 'tabirajl', 'طبرجل', 61, 12, 1, '2021-01-06 08:43:24', '2021-01-06 08:43:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `governments`
--
ALTER TABLE `governments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `governments_country_id_foreign` (`country_id`);

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
  ADD KEY `warranties_currency_id_foreign` (`currency_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `category_options`
--
ALTER TABLE `category_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `config_categories`
--
ALTER TABLE `config_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contactuses`
--
ALTER TABLE `contactuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `governments`
--
ALTER TABLE `governments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `newsletter_messages`
--
ALTER TABLE `newsletter_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notification_bodies`
--
ALTER TABLE `notification_bodies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `option_values`
--
ALTER TABLE `option_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=436;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=946;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=562;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=760;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1422;

--
-- AUTO_INCREMENT for table `product_combinations`
--
ALTER TABLE `product_combinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_discounts`
--
ALTER TABLE `product_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reset_passwords`
--
ALTER TABLE `reset_passwords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_reasons`
--
ALTER TABLE `return_reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `verification_codes`
--
ALTER TABLE `verification_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warranties`
--
ALTER TABLE `warranties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `warranties`
--
ALTER TABLE `warranties`
  ADD CONSTRAINT `warranties_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `warranties_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `warranties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `zones_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `zones_government_id_foreign` FOREIGN KEY (`government_id`) REFERENCES `governments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
