-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 05:50 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mockmyinterview`
--

-- --------------------------------------------------------

--
-- Table structure for table `advantage_mocks`
--

CREATE TABLE `advantage_mocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advantage_mocks`
--

INSERT INTO `advantage_mocks` (`id`, `created_by`, `title`, `slug`, `description`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'REDUCE STRESS & ANXIETY', 'reduce-stress-anxiety', '<p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>', 'reduce stress.png', 1, '2022-03-16 09:26:38', '2022-03-16 04:16:01', '2022-03-16 04:26:38'),
(2, 1, 'REDUCE STRESS & ANXIETY', 'reduce-stress-anxiety', '<p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>', 'reduce stress.png', 1, NULL, '2022-03-16 04:27:13', '2022-03-16 04:27:13'),
(3, 1, 'BOOST CONFIDENCE', 'boost-confidence', '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>', 'confidence.png', 1, NULL, '2022-03-16 04:27:41', '2022-03-16 04:27:41'),
(4, 1, 'CONSTRUCTIVE FEEDBACK', 'constructive-feedback', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>', 'reduce stress.png', 1, NULL, '2022-03-16 04:28:04', '2022-03-16 04:28:04'),
(5, 1, 'REDUCE STRESS & ANXIETY', 'reduce-stress-anxiety', '<p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>', 'reduce stress.png', 1, NULL, '2022-03-16 04:28:24', '2022-03-16 04:28:24'),
(6, 1, 'BOOST CONFIDENCE', 'boost-confidence', '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>', 'confidence.png', 1, NULL, '2022-03-16 04:28:46', '2022-03-16 04:28:46'),
(7, 1, 'CONSTRUCTIVE FEEDBACK', 'constructive-feedback', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>', 'reduce stress.png', 1, NULL, '2022-03-16 04:29:13', '2022-03-16 04:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_free` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `created_by`, `category_slug`, `title`, `slug`, `description`, `post`, `paid_free`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'zena-horton', 'Neque omnis autem ul', 'neque-omnis-autem-ul', 'Irure iste pariatur Sapiente dolor aut pariatur Eaque laboriosam ad odit', NULL, 1, 1, NULL, '2022-03-13 07:27:47', '2022-03-13 07:27:47'),
(2, 1, 'zena-horton', 'In magnam ea qui cil', 'in-magnam-ea-qui-cil', '<p>tested</p>', NULL, 0, 1, NULL, '2022-03-28 02:54:46', '2022-03-28 02:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `booking_types`
--

CREATE TABLE `booking_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credits` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_types`
--

INSERT INTO `booking_types` (`id`, `created_by`, `title`, `slug`, `color`, `credits`, `type`, `price`, `currency_code`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Priority Booking', 'priority-booking', '#e64757', '1299', 'uno', 18.90, 'USD', 'Voluptatem Dolores', 1, NULL, '2022-03-31 09:04:41', '2022-03-31 09:31:00'),
(2, 1, 'Standard Booking', 'standard-booking', '#3b8712', '2199', 'duo', 31.99, 'USD', 'Lorem ipsum', 1, NULL, '2022-03-31 09:33:34', '2022-03-31 09:33:34'),
(3, 1, 'Tentative Booking', 'tentative-booking', '#9f9d9d', NULL, 'trio', NULL, 'USD', 'Lorem ipsum', 1, NULL, '2022-03-31 09:38:20', '2022-03-31 09:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_by`, `name`, `slug`, `description`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, 'Kiona Kane', 'kiona-kane', 'Quo nesciunt earum iste dignissimos est sunt', 1, NULL, NULL, NULL, NULL, '2022-03-13 06:52:45', '2022-03-13 06:52:45'),
(3, 1, 'Zena Horton', 'zena-horton', 'Rerum qui quibusdam id et ut quis', 1, NULL, NULL, NULL, NULL, '2022-03-13 06:52:56', '2022-03-13 06:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `code_body`, `created_at`, `updated_at`) VALUES
(1, 'asdasd', '2022-02-08 05:49:47', '2022-02-10 08:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `degree_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `created_by`, `degree_slug`, `title`, `slug`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'btech', 'Information Technology', 'information-technology', 'IT', 1, NULL, '2022-03-25 09:51:24', '2022-03-25 09:51:24'),
(2, 1, 'btech', 'Computer Science & Engineering', 'computer-science-engineering', 'CSE', 1, NULL, '2022-03-25 09:51:49', '2022-03-25 09:51:49'),
(3, 1, 'btech', 'Electronics & Communication Engineering', 'electronics-communication-engineering', 'ECE', 1, NULL, '2022-03-25 09:52:26', '2022-03-25 09:52:26'),
(4, 1, 'btech', 'Electrical & Electronics Engineering', 'electrical-electronics-engineering', 'EEE', 1, NULL, '2022-03-25 09:53:06', '2022-03-25 09:53:06'),
(5, 1, 'btech', 'Mechanical Engineering', 'mechanical-engineering', 'ME', 1, NULL, '2022-03-25 09:53:37', '2022-03-25 09:53:37'),
(6, 1, 'btech', 'Civil Engineering', 'civil-engineering', 'CE', 1, NULL, '2022-03-25 09:53:57', '2022-03-25 09:53:57'),
(7, 1, 'btech', 'Chemical Engineering', 'chemical-engineering', 'CE', 1, NULL, '2022-03-25 09:54:15', '2022-03-25 09:54:15'),
(8, 1, 'btech', 'Auto Mobile Engineering', 'auto-mobile-engineering', 'AME', 1, NULL, '2022-03-25 09:54:40', '2022-03-25 09:54:40'),
(9, 1, 'btech', 'Others', 'others', 'Others course', 1, NULL, '2022-03-25 09:55:04', '2022-03-25 09:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `created_by`, `title`, `slug`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'BTech', 'btech', 'Bachelor in Technology', 1, NULL, '2022-03-25 09:48:12', '2022-03-25 09:48:12'),
(2, 1, 'BE', 'be', 'Bachelor in Engineering', 1, NULL, '2022-03-25 09:48:32', '2022-03-25 09:48:32'),
(3, 1, 'MCA', 'mca', 'Master of Computer Applications', 1, NULL, '2022-03-25 09:49:17', '2022-03-25 09:49:17'),
(4, 1, 'MBA', 'mba', 'Master of Business Administrations', 1, NULL, '2022-03-25 09:49:38', '2022-03-25 09:49:38'),
(5, 1, 'MTech', 'mtech', 'Master of Technology', 1, NULL, '2022-03-25 09:50:00', '2022-03-25 09:50:00'),
(6, 1, 'ME', 'me', 'Master of Engineerings', 1, NULL, '2022-03-25 09:50:15', '2022-03-25 09:50:15'),
(7, 1, 'Others', 'others', 'Any other degree', 1, NULL, '2022-03-25 09:50:49', '2022-03-25 09:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joining_date` date NOT NULL,
  `leaving_date` date DEFAULT NULL,
  `experiences` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `position`, `company`, `joining_date`, `leaving_date`, `experiences`, `created_at`, `updated_at`) VALUES
(8, 7, 'Junior Developer', 'Company 1', '2018-06-10', '2022-11-03', 4.40, '2022-03-29 08:23:12', '2022-03-29 08:23:12'),
(9, 7, 'Mid Level Developer', 'Company 2', '2020-09-03', '2022-10-03', 2.00, '2022-03-29 08:23:12', '2022-03-29 08:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `experience_details`
--

CREATE TABLE `experience_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `total_experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expertise` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experience_details`
--

INSERT INTO `experience_details` (`id`, `user_id`, `total_experience`, `summary`, `expertise`, `created_at`, `updated_at`) VALUES
(1, 7, '6.4', 'My summary -updated', 'Laravel framework of php. updated\r\nmysql\r\ncss3', '2022-03-29 06:24:50', '2022-03-29 08:23:12'),
(2, 7, '6.4', 'My summary', 'Laravel framework of php.\r\nmysql\r\ncss3', '2022-03-29 08:21:24', '2022-03-29 08:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `help_hires`
--

CREATE TABLE `help_hires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `help_hires`
--

INSERT INTO `help_hires` (`id`, `created_by`, `title`, `slug`, `description`, `icon`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Interviewer Fees and Commissions', 'interviewer-fees-and-commissions', '<p>Our dedicated customer care team is ready to review your property preferences or help out any way we can.</p>', NULL, 1, NULL, '2022-03-16 09:29:46', '2022-03-16 09:29:46'),
(2, 1, 'Interviewer in Your Area', 'interviewer-in-your-area', '<p>Our dedicated customer care team is ready to review your property preferences or help out any way we can.</p>', NULL, 1, NULL, '2022-03-16 09:30:02', '2022-03-16 09:30:02'),
(3, 1, 'Interviewer Commissions Calculator', 'interviewer-commissions-calculator', '<p>Our dedicated customer care team is ready to review your property preferences or help out any way we can.</p>', NULL, 1, NULL, '2022-03-16 09:30:15', '2022-03-16 09:30:15'),
(4, 1, 'Cost of Selling Calculator', 'cost-of-selling-calculator', '<p>Our dedicated customer care team is ready to review your property preferences or help out any way we can.</p>', NULL, 1, NULL, '2022-03-16 09:30:30', '2022-03-16 09:30:30'),
(5, 1, 'Blog', 'blog', '<p>Our dedicated customer care team is ready to review your property preferences or help out any way we can.</p>', NULL, 1, NULL, '2022-03-16 09:30:45', '2022-03-16 09:30:45'),
(6, 1, 'Reviews', 'reviews', '<p>Our dedicated customer care team is ready to review your property preferences or help out any way we can.</p>', NULL, 1, NULL, '2022-03-16 09:30:57', '2022-03-16 09:30:57'),
(7, 1, 'Agent Awards', 'agent-awards', '<p>Our dedicated customer care team is ready to review your property preferences or help out any way we can.</p>', NULL, 1, NULL, '2022-03-16 09:31:12', '2022-03-16 09:31:12'),
(8, 1, 'LocalAgentFinder Newsroom', 'localagentfinder-newsroom', '<p>Our dedicated customer care team is ready to review your property preferences or help out any way we can.</p>', NULL, 1, NULL, '2022-03-16 09:31:26', '2022-03-16 09:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `how_works`
--

CREATE TABLE `how_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `how_works`
--

INSERT INTO `how_works` (`id`, `created_by`, `title`, `slug`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'CREATE AN ACCOUNT', 'create-an-account', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor gravida aliquam. Morbi orci urna, iaculis in ligula et, posuere interdum lectus.</p>', 1, NULL, '2022-03-16 05:33:17', '2022-03-16 05:33:17'),
(2, 1, 'COMPLETE PROFILE', 'complete-profile', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor gravida aliquam. Morbi orci urna, iaculis in ligula et, posuere interdum lectus.</p>', 1, NULL, '2022-03-16 05:33:30', '2022-03-16 05:33:30'),
(3, 1, 'SCHEDULE ONE-ON-ONE Interview', 'schedule-one-on-one-interview', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor gravida aliquam. Morbi orci urna, iaculis in ligula et, posuere interdum lectus.</p>', 1, NULL, '2022-03-16 05:33:49', '2022-03-16 05:33:49'),
(4, 1, 'PERFORMANCE FEEDBACK', 'performance-feedback', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor gravida aliquam. Morbi orci urna, iaculis in ligula et, posuere interdum lectus.</p>', 1, NULL, '2022-03-16 05:34:08', '2022-03-16 05:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `created_by`, `title`, `slug`, `code`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'English', 'english', 'en', 'International language', 1, NULL, '2022-03-25 09:43:51', '2022-03-25 09:43:51'),
(2, 1, 'French', 'french', 'fr', 'Lorem ipsum', 1, NULL, '2022-03-25 09:44:21', '2022-03-25 09:44:21'),
(3, 1, 'Hindi', 'hindi', 'hi', 'Hindi language', 1, NULL, '2022-03-25 09:44:53', '2022-03-25 09:44:53'),
(4, 1, 'Italian', 'italian', 'it', 'Italian language', 1, NULL, '2022-03-25 09:45:22', '2022-03-25 09:45:22'),
(5, 1, 'Latin', 'latin', 'la', 'Latin Language', 1, NULL, '2022-03-25 09:45:51', '2022-03-25 09:45:51'),
(6, 1, 'Urdu', 'urdu', 'ur', 'Urdu Language', 1, NULL, '2022-03-25 09:46:43', '2022-03-25 09:46:43'),
(7, 1, 'Arabic', 'arabic', 'ar', 'Arabic Language', 1, NULL, '2022-03-25 09:47:23', '2022-03-25 09:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_01_081902_create_permission_tables', 1),
(9, '2022_02_03_082236_create_testimonials_table', 3),
(15, '2014_10_12_000000_create_users_table', 7),
(16, '2022_02_03_082331_create_whychooses_table', 8),
(17, '2022_03_09_150337_create_blogs_table', 9),
(20, '2022_03_09_150353_create_categories_table', 12),
(26, '2022_02_03_082221_create_sliders_table', 18),
(28, '2022_03_14_143426_create_page_settings_table', 19),
(30, '2022_03_16_082713_create_advantage_mocks_table', 20),
(32, '2022_02_03_082316_create_services_table', 21),
(34, '2022_03_16_095716_create_how_works_table', 22),
(35, '2022_03_09_150554_create_packages_table', 23),
(38, '2022_03_09_150411_create_teams_table', 24),
(39, '2022_03_16_140653_create_help_hires_table', 25),
(40, '2022_03_25_103211_create_user_details_table', 26),
(44, '2022_03_25_104218_create_user_know_languages_table', 30),
(47, '2022_03_25_111536_create_qualification_details_table', 33),
(54, '2022_03_25_113514_create_languages_table', 37),
(55, '2022_03_25_113435_create_degrees_table', 38),
(58, '2022_03_25_113456_create_courses_table', 39),
(60, '2022_03_25_103607_create_qualifications_table', 41),
(62, '2022_03_28_145241_create_experience_details_table', 42),
(64, '2022_03_25_103632_create_experiences_table', 43),
(65, '2022_03_25_103702_create_resumes_table', 44),
(66, '2022_03_25_110315_create_skills_table', 45),
(67, '2022_03_25_110427_create_projects_table', 46),
(75, '2022_03_31_113222_create_booking_types_table', 47);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 7),
(6, 'App\\Models\\User', 5),
(6, 'App\\Models\\User', 6),
(6, 'App\\Models\\User', 8),
(6, 'App\\Models\\User', 9),
(6, 'App\\Models\\User', 10),
(6, 'App\\Models\\User', 11),
(6, 'App\\Models\\User', 12),
(6, 'App\\Models\\User', 13),
(6, 'App\\Models\\User', 14),
(6, 'App\\Models\\User', 15),
(6, 'App\\Models\\User', 16),
(6, 'App\\Models\\User', 17),
(6, 'App\\Models\\User', 18),
(6, 'App\\Models\\User', 19),
(6, 'App\\Models\\User', 20),
(6, 'App\\Models\\User', 21),
(6, 'App\\Models\\User', 22),
(6, 'App\\Models\\User', 23),
(6, 'App\\Models\\User', 24),
(6, 'App\\Models\\User', 25),
(6, 'App\\Models\\User', 26),
(6, 'App\\Models\\User', 27),
(6, 'App\\Models\\User', 28),
(6, 'App\\Models\\User', 29),
(6, 'App\\Models\\User', 30),
(6, 'App\\Models\\User', 31),
(6, 'App\\Models\\User', 32),
(6, 'App\\Models\\User', 33),
(6, 'App\\Models\\User', 34);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `created_by`, `name`, `slug`, `price`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Starter', 'starter', '25', '<ul class=\"list-unstyled mt-3 mb-4\">\r\n<li class=\"pl-3 pr-3\">30 users included</li>\r\n<li class=\"pl-3 pr-3\">15 GB of storage</li>\r\n<li class=\"pl-3 pr-3\">Phone and email support</li>\r\n<li class=\"pl-3 pr-3\">Help center access</li>\r\n</ul>', 1, NULL, '2022-03-16 07:12:34', '2022-03-16 07:12:34'),
(2, 1, 'Intermediate', 'intermediate', '50', '<ul class=\"list-unstyled mt-3 mb-4\">\r\n<li class=\"pl-3 pr-3\">30 users included</li>\r\n<li class=\"pl-3 pr-3\">15 GB of storage</li>\r\n<li class=\"pl-3 pr-3\">Phone and email support</li>\r\n<li class=\"pl-3 pr-3\">Help center access</li>\r\n</ul>', 1, NULL, '2022-03-16 07:13:15', '2022-03-16 07:13:15'),
(3, 1, 'Professional', 'professional', '125', '<ul class=\"list-unstyled mt-3 mb-4\">\r\n<li class=\"pl-3 pr-3\">30 users included</li>\r\n<li class=\"pl-3 pr-3\">15 GB of storage</li>\r\n<li class=\"pl-3 pr-3\">Phone and email support</li>\r\n<li class=\"pl-3 pr-3\">Help center access</li>\r\n</ul>', 1, NULL, '2022-03-16 07:16:46', '2022-03-16 07:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `created_by`, `title`, `slug`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Home', 'home', '<p>Lorem ipsm&nbsp;</p>', 'meta title', 'meta keyword', 'meta description', 1, NULL, '2022-03-14 10:12:22', '2022-03-21 02:34:06'),
(2, 1, 'About', 'about', '<p>Lorem ipsum&nbsp;</p>', NULL, NULL, NULL, 1, NULL, '2022-03-15 10:58:57', '2022-03-15 10:58:57'),
(3, 1, 'Service', 'service', '<p>Lorem ipsum&nbsp;</p>', NULL, NULL, NULL, 1, NULL, '2022-03-16 03:04:59', '2022-03-16 03:04:59'),
(4, 1, 'Contact', 'contact', '<p>Lorem ipsum&nbsp;</p>', NULL, NULL, NULL, 1, NULL, '2022-03-16 03:08:47', '2022-03-16 03:08:47'),
(5, 1, 'Why Choose Us', 'why-choose-us', '<p>describe here</p>', NULL, NULL, NULL, 1, NULL, '2022-03-21 02:44:58', '2022-03-21 02:44:58'),
(6, 1, 'Footer', 'footer', '<p>Description</p>', NULL, NULL, NULL, 1, NULL, '2022-03-21 06:20:34', '2022-03-21 06:20:34'),
(7, 1, 'Header', 'header', '<p>Describe here</p>', NULL, NULL, NULL, 1, NULL, '2022-03-21 06:37:20', '2022-03-21 06:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `page_settings`
--

CREATE TABLE `page_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_settings`
--

INSERT INTO `page_settings` (`id`, `parent_slug`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'home', '_token', '9I64zkdwB3n0l4djkzvJWdKXbebFl2wVMuYLuqBx', '2022-03-15 10:52:44', '2022-03-21 03:14:33'),
(2, 'home', 'parent_slug', 'home', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(3, 'home', 'home_meta', 'Home meta', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(4, 'home', 'home_meta_keyword', 'Home meta keyword', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(5, 'home', 'home_meta_description', 'Home description', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(6, 'home', 'banner_heading', 'FAST, FREE AND SIMPLE', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(7, 'home', 'top_sec_heading', 'Candidate', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(8, 'home', 'top_sec_title', 'Enter a few details about your Interviewer.', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(9, 'home', 'top_sec_description', 'It\'s easy, and only takes a couple of minutes.', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(10, 'home', 'middle_sec_heading', 'Interviewer', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(11, 'home', 'middle_sec_title', 'Compare your Interviewer side by side', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(12, 'home', 'middle_sec_description', 'Comfortably compare interviewer fees and service information online.', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(13, 'home', 'bottom_sec_heading', 'Connect', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(14, 'home', 'bottom_sec_title', 'You decide which Interviewer to connect with', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(15, 'home', 'bottom_sec_description', 'Contact the interviewer you like, and pass on the ones you don\'t. It\'s that simple.', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(16, 'home', 'home_banner_status', '1', '2022-03-15 10:52:44', '2022-03-21 03:14:49'),
(17, 'home', 'home_why_choose_title', 'Why choose title', '2022-03-15 10:52:44', '2022-03-15 10:54:33'),
(18, 'home', 'home_why_choose_subtitle', 'Why choose sub-title', '2022-03-15 10:52:44', '2022-03-15 10:54:33'),
(19, 'home', 'home_why_choose_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(20, 'home', 'home_testimonial_title', 'TESTIMONIALS', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(21, 'home', 'home_testimonial_subtitle', 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(22, 'home', 'home_testimonial_status', '1', '2022-03-15 10:52:44', '2022-03-21 03:17:08'),
(23, 'home', 'home_contact_title', 'Contact', '2022-03-15 10:52:44', '2022-03-21 05:47:07'),
(24, 'home', 'home_contact_description', 'Contact Section', '2022-03-15 10:52:44', '2022-03-21 05:47:07'),
(25, 'home', 'home_contact_status', '1', '2022-03-15 10:52:44', '2022-03-21 03:40:30'),
(26, 'home', 'home_mock_advantage_title', 'ADVANTAGES OF MOCK INTERVIEWS', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(27, 'home', 'home_mock_advantage_subtitle', 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(28, 'home', 'home_mock_advantage_status', '1', '2022-03-15 10:52:44', '2022-03-21 03:21:11'),
(29, 'home', 'home_mock_advantage_bottom_first_label', 'Candidate', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(30, 'home', 'home_mock_advantage_bottom_first_counter', '232', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(31, 'home', 'home_mock_advantage_bottom_second_label', 'interviewer', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(32, 'home', 'home_mock_advantage_bottom_second_counter', '521', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(33, 'home', 'home_mock_advantage_bottom_third_label', 'Hours Of Support', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(34, 'home', 'home_mock_advantage_bottom_third_counter', '1463', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(35, 'home', 'home_mock_advantage_bottom_fourth_label', 'Hard Workers', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(36, 'home', 'home_mock_advantage_bottom_fourth_counter', '15', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(37, 'home', 'home_mock_advantage_counter_status', '1', '2022-03-15 10:52:44', '2022-03-21 03:23:05'),
(38, 'home', 'home_signup_title', 'Sign-Up Now!', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(39, 'home', 'home_signup_description', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(40, 'home', 'home_signup_btn_label', 'Sign-Up Now!', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(41, 'home', 'home_signup_status', '1', '2022-03-15 10:52:44', '2022-03-21 03:31:32'),
(42, 'home', 'home_real_title', 'REAL PEOPLE, REAL SERVICE', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(43, 'home', 'home_real_description', 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(44, 'home', 'home_real_status', '1', '2022-03-15 10:52:44', '2022-03-21 03:27:13'),
(45, 'home', 'home_how_title', 'HOW DOES IT WORK?', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(46, 'home', 'home_how_description', 'It helps students and job seekers crack interviews & land their dream jobs!', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(47, 'home', 'home_how_status', '1', '2022-03-15 10:52:44', '2022-03-21 03:38:20'),
(48, 'home', 'home_pricing_title', 'PRICING', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(49, 'home', 'home_pricing_description', NULL, '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(50, 'home', 'home_pricing_status', '1', '2022-03-15 10:52:44', '2022-03-21 03:35:03'),
(51, 'home', 'home_team_title', 'TEAM', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(52, 'home', 'home_team_description', 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(53, 'home', 'home_team_status', '1', '2022-03-15 10:52:44', '2022-03-21 03:36:30'),
(54, 'home', 'home_help_title', 'WANT SOME HELP TO HIRE AN INTERVIEWER', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(55, 'home', 'home_help_description', 'Our team of experts have developed tools and resources to assist you along the way.', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(56, 'home', 'home_help_status', '1', '2022-03-15 10:52:44', '2022-03-21 03:38:44'),
(57, 'home', 'home_tips_title', 'CONTACT', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(58, 'home', 'home_tips_description', 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(59, 'home', 'home_tips_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(60, 'home', 'form_home_blog', NULL, '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(61, 'home', 'banner_bg_image', '15032022155244.jpg', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(62, 'home', 'top_sec_image', '15032022160152.png', '2022-03-15 10:52:44', '2022-03-15 11:01:52'),
(63, 'home', 'middle_sec_image', '15032022160221.png', '2022-03-15 10:52:44', '2022-03-15 11:02:21'),
(64, 'home', 'bottom_sec_image', '15032022155244.png', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(65, 'about', '_token', '9I64zkdwB3n0l4djkzvJWdKXbebFl2wVMuYLuqBx', '2022-03-16 02:43:59', '2022-03-21 03:09:20'),
(66, 'about', 'parent_slug', 'about', '2022-03-16 02:43:59', '2022-03-16 02:43:59'),
(67, 'about', 'mt_about', 'Quibusdam omnis aper updated', '2022-03-16 02:43:59', '2022-03-16 03:03:16'),
(68, 'about', 'mk_about', 'Et excepteur aut quo updated', '2022-03-16 02:43:59', '2022-03-16 03:03:16'),
(69, 'about', 'md_about', 'Corporis veritatis o updated', '2022-03-16 02:43:59', '2022-03-16 03:03:16'),
(70, 'about', 'about_heading', 'ABOUT MOCK MY INTERVIEW TM', '2022-03-16 02:43:59', '2022-03-16 03:22:52'),
(71, 'about', 'about_content', '<h1><span style=\"background-color: #008000;\"><strong>hello brother</strong></span></h1>', '2022-03-16 02:43:59', '2022-03-16 10:30:12'),
(72, 'about', 'form_about', NULL, '2022-03-16 02:43:59', '2022-03-16 02:43:59'),
(73, 'service', '_token', 'AtObO55a1FfbWgNUtyhBGdyh0v5B0EV7ERjnU56C', '2022-03-16 03:07:22', '2022-03-16 03:07:22'),
(74, 'service', 'parent_slug', 'service', '2022-03-16 03:07:22', '2022-03-16 03:07:22'),
(75, 'service', 'mt_service', 'Ea qui officia asper', '2022-03-16 03:07:22', '2022-03-16 03:07:22'),
(76, 'service', 'mk_service', 'Nostrum pariatur Vo', '2022-03-16 03:07:22', '2022-03-16 03:07:22'),
(77, 'service', 'md_service', 'Fugiat quis dolorem', '2022-03-16 03:07:22', '2022-03-16 03:07:22'),
(78, 'service', 'service_heading', 'Ea est animi ullam', '2022-03-16 03:07:22', '2022-03-16 03:07:22'),
(79, 'service', 'service_content', '<p>Lorem ipusm&nbsp;</p>', '2022-03-16 03:07:22', '2022-03-16 03:07:22'),
(80, 'service', 'form_service', NULL, '2022-03-16 03:07:22', '2022-03-16 03:07:22'),
(81, 'contact', '_token', 'AtObO55a1FfbWgNUtyhBGdyh0v5B0EV7ERjnU56C', '2022-03-16 03:18:35', '2022-03-16 03:18:35'),
(82, 'contact', 'parent_slug', 'contact', '2022-03-16 03:18:35', '2022-03-16 03:18:35'),
(83, 'contact', 'mt_contact', 'meta title', '2022-03-16 03:18:35', '2022-03-16 03:18:35'),
(84, 'contact', 'mk_contact', 'meta keyword', '2022-03-16 03:18:35', '2022-03-16 03:18:35'),
(85, 'contact', 'md_contact', 'meta description', '2022-03-16 03:18:35', '2022-03-16 03:18:35'),
(86, 'contact', 'contact_heading', 'Contact', '2022-03-16 03:18:35', '2022-03-16 03:18:35'),
(87, 'contact', 'contact_address', 'A108 Adam Street, New York, NY 535022', '2022-03-16 03:18:35', '2022-03-16 03:18:35'),
(88, 'contact', 'contact_email', 'info@example.com', '2022-03-16 03:18:35', '2022-03-16 03:18:35'),
(89, 'contact', 'contact_phone', '+1 5589 55488 55', '2022-03-16 03:18:35', '2022-03-16 03:18:35'),
(90, 'contact', 'contact_map', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621', '2022-03-16 03:18:35', '2022-03-16 03:18:35'),
(91, 'contact', 'form_contact', NULL, '2022-03-16 03:18:35', '2022-03-16 03:18:35'),
(92, 'home', 'home_footer_email', 'info@example.com', '2022-03-16 09:51:21', '2022-03-16 09:51:21'),
(93, 'home', 'home_footer_phone', '+91-9999878398', '2022-03-16 09:51:21', '2022-03-16 09:51:21'),
(94, 'home', 'home_footer_twitter', NULL, '2022-03-16 09:51:21', '2022-03-16 09:51:21'),
(95, 'home', 'home_footer_facebook', NULL, '2022-03-16 09:51:21', '2022-03-16 09:51:21'),
(96, 'home', 'home_footer_instagram', NULL, '2022-03-16 09:51:21', '2022-03-16 09:51:21'),
(97, 'home', 'home_footer_skype', NULL, '2022-03-16 09:51:21', '2022-03-16 09:51:21'),
(98, 'home', 'home_footer_linkedin', NULL, '2022-03-16 09:51:21', '2022-03-16 09:51:21'),
(99, 'home', 'home_footer_address', '9878/25 sec 9 rohini 35', '2022-03-16 09:51:21', '2022-03-16 09:51:21'),
(100, 'home', 'home_footer_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2022-03-16 09:51:21', '2022-03-16 09:51:21'),
(101, 'home', 'home_footer_status', '1', '2022-03-16 09:51:21', '2022-03-16 09:51:21'),
(102, 'home', 'home_footer_app_image', '16032022145121.png', '2022-03-16 09:51:21', '2022-03-16 09:51:21'),
(103, 'about', 'about_status', '1', '2022-03-21 03:09:20', '2022-03-21 03:12:27'),
(104, 'home', 'home_footer_title', 'INTERVIEW TIPS IN YOUR INBOX', '2022-03-21 06:02:27', '2022-03-21 06:02:27'),
(105, 'home', 'home_footer_sub_title', 'Online face-to-face mock interviews with experts help you train & prepare for job interviews in a no pressure, stress-free environment simulating a real job interview. Stay ahead of the competition with expert mentoring & feedback!', '2022-03-21 06:02:27', '2022-03-21 06:02:27'),
(106, 'footer', '_token', '9I64zkdwB3n0l4djkzvJWdKXbebFl2wVMuYLuqBx', '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(107, 'footer', 'parent_slug', 'footer', '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(108, 'footer', 'footer_title', 'INTERVIEW TIPS IN YOUR INBOX', '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(109, 'footer', 'footer_sub_title', 'Online face-to-face mock interviews with experts help you train & prepare for job interviews in a no pressure, stress-free environment simulating a real job interview. Stay ahead of the competition with expert mentoring & feedback!', '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(110, 'footer', 'footer_email', 'info@example.com', '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(111, 'footer', 'footer_copy_right', '© Copyright Mock. All Rights Reserved', '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(112, 'footer', 'footer_phone', '+91-9999878398', '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(113, 'footer', 'footer_twitter', NULL, '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(114, 'footer', 'footer_facebook', NULL, '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(115, 'footer', 'footer_instagram', NULL, '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(116, 'footer', 'footer_skype', NULL, '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(117, 'footer', 'footer_linkedin', NULL, '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(118, 'footer', 'footer_address', '9878/25 sec 9 rohini 35', '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(119, 'footer', 'footer_description', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>', '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(120, 'footer', 'form_blog', NULL, '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(121, 'footer', 'footer_app_image', '21032022113649.png', '2022-03-21 06:36:49', '2022-03-21 06:36:49'),
(122, 'header', '_token', 'wh7riChaXAC2NZ2qSeO3Y933vw5EulCDtVrQKRKh', '2022-03-21 06:53:09', '2022-03-31 10:48:46'),
(123, 'header', 'parent_slug', 'header', '2022-03-21 06:53:09', '2022-03-21 06:53:09'),
(124, 'header', 'header_email', 'info@example.com', '2022-03-21 06:53:09', '2022-03-21 06:53:09'),
(125, 'header', 'header_phone', '+91-9999878398', '2022-03-21 06:53:09', '2022-03-21 06:53:09'),
(126, 'header', 'form_blog', NULL, '2022-03-21 06:53:09', '2022-03-21 06:53:09'),
(127, 'header', 'header_logo', '21032022115356.png', '2022-03-21 06:53:09', '2022-03-21 06:53:56'),
(128, 'header', 'header_favicon', '21032022115309.png', '2022-03-21 06:53:09', '2022-03-21 06:53:09'),
(139, 'header', 'weekdays_morning_from_time', '11:00', '2022-03-31 10:54:25', '2022-03-31 10:54:25'),
(140, 'header', 'weekdays_morning_to_time', '13:00', '2022-03-31 10:54:25', '2022-03-31 10:54:25'),
(141, 'header', 'weekdays_evening_from_time', '17:00', '2022-03-31 10:54:25', '2022-03-31 10:54:25'),
(142, 'header', 'weekdays_evening_to_time', '23:00', '2022-03-31 10:54:25', '2022-03-31 10:54:25'),
(143, 'header', 'weekends_morning_from_time', '10:00', '2022-03-31 10:54:25', '2022-03-31 10:54:25'),
(144, 'header', 'weekends_morning_to_time', '17:00', '2022-03-31 10:54:25', '2022-03-31 10:54:25'),
(145, 'header', 'weekends_evening_from_time', '17:30', '2022-03-31 10:54:25', '2022-03-31 10:54:25'),
(146, 'header', 'weekends_evening_to_time', '23:00', '2022-03-31 10:54:25', '2022-03-31 10:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$fRS5diiggPCYLFz8Umegl.pbd8AcsbePifZcho7hJ.uJO7Xt3UIu2', '2022-03-25 02:34:06'),
('chandamar725@gmail.com', '$2y$10$dkjMZ4dj0fpOsUqq5ZjgI.XanDRaLTQRTJwm/ia.pMXQ3j/fGk/aO', '2022-03-25 04:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', NULL, '2022-03-01 03:28:29', '2022-03-01 03:28:29'),
(2, 'role-create', 'web', NULL, '2022-03-01 03:28:29', '2022-03-01 03:28:29'),
(3, 'role-edit', 'web', NULL, '2022-03-01 03:28:29', '2022-03-01 03:28:29'),
(4, 'role-delete', 'web', NULL, '2022-03-01 03:28:29', '2022-03-01 03:28:29'),
(10, 'permission-list', 'web', NULL, '2022-03-08 08:15:44', '2022-03-08 08:15:44'),
(11, 'permission-create', 'web', NULL, '2022-03-08 08:15:44', '2022-03-08 08:15:44'),
(12, 'permission-edit', 'web', NULL, '2022-03-08 08:15:44', '2022-03-08 08:15:44'),
(14, 'permission-delete', 'web', NULL, '2022-03-08 08:16:56', '2022-03-08 08:16:56'),
(15, 'user-list', 'web', NULL, '2022-03-08 08:23:13', '2022-03-08 08:23:13'),
(16, 'user-create', 'web', NULL, '2022-03-08 08:23:13', '2022-03-08 08:23:13'),
(17, 'user-edit', 'web', NULL, '2022-03-08 08:23:13', '2022-03-08 08:23:13'),
(18, 'user-delete', 'web', NULL, '2022-03-08 08:23:13', '2022-03-08 08:23:13'),
(27, 'slider-list', 'web', NULL, '2022-03-08 08:24:32', '2022-03-08 08:24:32'),
(28, 'slider-create', 'web', NULL, '2022-03-08 08:24:32', '2022-03-08 08:24:32'),
(29, 'slider-edit', 'web', NULL, '2022-03-08 08:24:32', '2022-03-08 08:24:32'),
(30, 'slider-delete', 'web', NULL, '2022-03-08 08:24:32', '2022-03-08 08:24:32'),
(31, 'service-list', 'web', NULL, '2022-03-08 08:25:03', '2022-03-08 08:25:03'),
(32, 'service-create', 'web', NULL, '2022-03-08 08:25:03', '2022-03-08 08:25:03'),
(33, 'service-edit', 'web', NULL, '2022-03-08 08:25:03', '2022-03-08 08:25:03'),
(34, 'service-delete', 'web', NULL, '2022-03-08 08:25:03', '2022-03-08 08:25:03'),
(35, 'testimonial-list', 'web', NULL, '2022-03-09 06:50:31', '2022-03-09 06:50:31'),
(36, 'testimonial-create', 'web', NULL, '2022-03-09 06:50:31', '2022-03-09 06:50:31'),
(37, 'testimonial-edit', 'web', NULL, '2022-03-09 06:50:31', '2022-03-09 06:50:31'),
(38, 'testimonial-delete', 'web', NULL, '2022-03-09 06:50:31', '2022-03-09 06:50:31'),
(39, 'why_choose-list', 'web', NULL, '2022-03-09 06:51:05', '2022-03-09 06:51:05'),
(40, 'why_choose-create', 'web', NULL, '2022-03-09 06:51:05', '2022-03-09 06:51:05'),
(41, 'why_choose-edit', 'web', NULL, '2022-03-09 06:51:05', '2022-03-09 06:51:05'),
(42, 'why_choose-delete', 'web', NULL, '2022-03-09 06:51:05', '2022-03-09 06:51:05'),
(43, 'social media-list', 'web', NULL, '2022-03-09 06:51:20', '2022-03-09 06:51:20'),
(44, 'social media-create', 'web', NULL, '2022-03-09 06:51:20', '2022-03-09 06:51:20'),
(45, 'social media-edit', 'web', NULL, '2022-03-09 06:51:20', '2022-03-09 06:51:20'),
(46, 'social media-delete', 'web', NULL, '2022-03-09 06:51:20', '2022-03-09 06:51:20'),
(47, 'setting-list', 'web', NULL, '2022-03-09 06:54:53', '2022-03-09 06:54:53'),
(48, 'setting-create', 'web', NULL, '2022-03-09 06:54:53', '2022-03-09 06:54:53'),
(49, 'setting-edit', 'web', NULL, '2022-03-09 06:54:53', '2022-03-09 06:54:53'),
(50, 'setting-delete', 'web', NULL, '2022-03-09 06:54:53', '2022-03-09 06:54:53'),
(51, 'page-list', 'web', NULL, '2022-03-09 06:56:33', '2022-03-09 06:56:33'),
(52, 'page-create', 'web', NULL, '2022-03-09 06:56:33', '2022-03-09 06:56:33'),
(54, 'page-delete', 'web', NULL, '2022-03-09 06:56:33', '2022-03-09 06:56:33'),
(55, 'category-list', 'web', NULL, '2022-03-13 06:34:30', '2022-03-13 06:34:30'),
(56, 'category-create', 'web', NULL, '2022-03-13 06:34:30', '2022-03-13 06:34:30'),
(57, 'category-edit', 'web', NULL, '2022-03-13 06:34:30', '2022-03-13 06:34:30'),
(58, 'category-delete', 'web', NULL, '2022-03-13 06:34:30', '2022-03-13 06:34:30'),
(59, 'blog-list', 'web', NULL, '2022-03-13 06:54:38', '2022-03-13 06:54:38'),
(60, 'blog-create', 'web', NULL, '2022-03-13 06:54:38', '2022-03-13 06:54:38'),
(61, 'blog-edit', 'web', NULL, '2022-03-13 06:54:38', '2022-03-13 06:54:38'),
(62, 'blog-delete', 'web', NULL, '2022-03-13 06:54:38', '2022-03-13 06:54:38'),
(63, 'page-edit', 'web', NULL, '2022-03-14 04:22:01', '2022-03-14 04:22:01'),
(64, 'advantage-list', 'web', NULL, '2022-03-16 03:55:46', '2022-03-16 03:55:46'),
(65, 'advantage-create', 'web', NULL, '2022-03-16 03:55:47', '2022-03-16 03:55:47'),
(66, 'advantage-edit', 'web', NULL, '2022-03-16 03:55:47', '2022-03-16 03:55:47'),
(67, 'advantage-delete', 'web', NULL, '2022-03-16 03:55:47', '2022-03-16 03:55:47'),
(68, 'work-process-list', 'web', NULL, '2022-03-16 04:59:15', '2022-03-16 04:59:15'),
(69, 'work-process-create', 'web', NULL, '2022-03-16 04:59:15', '2022-03-16 04:59:15'),
(70, 'work-process-edit', 'web', NULL, '2022-03-16 04:59:15', '2022-03-16 04:59:15'),
(71, 'work-process-delete', 'web', NULL, '2022-03-16 04:59:15', '2022-03-16 04:59:15'),
(72, 'package-list', 'web', NULL, '2022-03-16 05:35:41', '2022-03-16 05:35:41'),
(73, 'package-create', 'web', NULL, '2022-03-16 05:35:41', '2022-03-16 05:35:41'),
(74, 'package-edit', 'web', NULL, '2022-03-16 05:35:41', '2022-03-16 05:35:41'),
(75, 'package-delete', 'web', NULL, '2022-03-16 05:35:41', '2022-03-16 05:35:41'),
(76, 'team-list', 'web', NULL, '2022-03-16 07:27:03', '2022-03-16 07:27:03'),
(77, 'team-create', 'web', NULL, '2022-03-16 07:27:03', '2022-03-16 07:27:03'),
(78, 'team-edit', 'web', NULL, '2022-03-16 07:27:03', '2022-03-16 07:27:03'),
(79, 'team-delete', 'web', NULL, '2022-03-16 07:27:03', '2022-03-16 07:27:03'),
(80, 'help-list', 'web', NULL, '2022-03-16 09:16:57', '2022-03-16 09:16:57'),
(81, 'help-create', 'web', NULL, '2022-03-16 09:16:57', '2022-03-16 09:16:57'),
(82, 'help-edit', 'web', NULL, '2022-03-16 09:16:57', '2022-03-16 09:16:57'),
(83, 'help-delete', 'web', NULL, '2022-03-16 09:16:57', '2022-03-16 09:16:57'),
(84, 'schedule interview-list', 'web', NULL, '2022-03-22 10:39:14', '2022-03-22 10:39:14'),
(85, 'schedule interview-create', 'web', NULL, '2022-03-22 10:39:14', '2022-03-22 10:39:14'),
(86, 'report-list', 'web', NULL, '2022-03-22 10:39:29', '2022-03-22 10:39:29'),
(87, 'test setup-list', 'web', NULL, '2022-03-22 10:40:37', '2022-03-22 10:40:37'),
(88, 'notifications-list', 'web', NULL, '2022-03-22 10:40:59', '2022-03-22 10:40:59'),
(89, 'notifications-create', 'web', NULL, '2022-03-22 10:40:59', '2022-03-22 10:40:59'),
(90, 'notifications-edit', 'web', NULL, '2022-03-22 10:40:59', '2022-03-22 10:40:59'),
(91, 'notifications-delete', 'web', NULL, '2022-03-22 10:40:59', '2022-03-22 10:40:59'),
(92, 'booked interviews-list', 'web', NULL, '2022-03-22 10:41:13', '2022-03-22 10:41:13'),
(93, 'resources-list', 'web', NULL, '2022-03-22 10:41:24', '2022-03-22 10:41:24'),
(94, 'buy & credits-list', 'web', NULL, '2022-03-22 10:41:50', '2022-03-22 10:41:50'),
(95, 'buy & credits-create', 'web', NULL, '2022-03-22 10:41:50', '2022-03-22 10:41:50'),
(96, 'refer & earn-list', 'web', NULL, '2022-03-22 10:42:03', '2022-03-22 10:42:03'),
(97, 'refer & earn-create', 'web', NULL, '2022-03-22 10:42:03', '2022-03-22 10:42:03'),
(98, 'language-list', 'web', NULL, '2022-03-25 06:42:42', '2022-03-25 06:42:42'),
(99, 'language-create', 'web', NULL, '2022-03-25 06:42:42', '2022-03-25 06:42:42'),
(100, 'language-edit', 'web', NULL, '2022-03-25 06:42:42', '2022-03-25 06:42:42'),
(101, 'language-delete', 'web', NULL, '2022-03-25 06:42:42', '2022-03-25 06:42:42'),
(102, 'degree-list', 'web', NULL, '2022-03-25 06:42:51', '2022-03-25 06:42:51'),
(103, 'degree-create', 'web', NULL, '2022-03-25 06:42:51', '2022-03-25 06:42:51'),
(104, 'degree-edit', 'web', NULL, '2022-03-25 06:42:51', '2022-03-25 06:42:51'),
(105, 'degree-delete', 'web', NULL, '2022-03-25 06:42:51', '2022-03-25 06:42:51'),
(106, 'course-list', 'web', NULL, '2022-03-25 06:43:00', '2022-03-25 06:43:00'),
(107, 'course-create', 'web', NULL, '2022-03-25 06:43:00', '2022-03-25 06:43:00'),
(108, 'course-edit', 'web', NULL, '2022-03-25 06:43:00', '2022-03-25 06:43:00'),
(109, 'course-delete', 'web', NULL, '2022-03-25 06:43:00', '2022-03-25 06:43:00'),
(110, 'booking_type-list', 'web', NULL, '2022-03-31 08:01:28', '2022-03-31 08:01:28'),
(111, 'booking_type-create', 'web', NULL, '2022-03-31 08:01:28', '2022-03-31 08:01:28'),
(112, 'booking_type-edit', 'web', NULL, '2022-03-31 08:01:28', '2022-03-31 08:01:28'),
(113, 'booking_type-delete', 'web', NULL, '2022-03-31 08:01:28', '2022-03-31 08:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricingtables`
--

CREATE TABLE `pricingtables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricingtables`
--

INSERT INTO `pricingtables` (`id`, `title`, `icon`, `price`, `subtitle`, `text`, `button_text`, `button_url`, `created_at`, `updated_at`) VALUES
(1, 'mk', 'mk', '456456', 'mk', '<p>mkmkmk</p>', 'mk', 'mk', '2022-02-08 06:47:08', '2022-02-09 06:27:08'),
(5, 'asd', 'asd', 'asd', 'asd', '<p>asd</p>', 'asd', 'asd', '2022-02-08 06:47:34', '2022-02-08 06:47:34'),
(6, 'mk', 'sdfsdf', '1231', 'sdfs', '<p>hello mk</p>', '1', '2', '2022-02-08 06:50:06', '2022-02-08 06:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `projects` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `projects`, `created_at`, `updated_at`) VALUES
(1, 6, 'My Projects', '2022-03-30 08:16:06', '2022-03-30 08:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passing_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `user_id`, `institute`, `degree_slug`, `course_slug`, `passing_year`, `created_at`, `updated_at`) VALUES
(9, 7, 'Deleniti consequatur', 'btech', 'chemical-engineering', '1985', '2022-03-28 09:51:10', '2022-03-28 09:51:10'),
(10, 7, 'Inventore omnis quas', 'btech', 'others', '2012', '2022-03-28 09:51:10', '2022-03-28 09:51:10'),
(11, 7, 'testedd', 'btech', 'electronics-communication-engineering', '1994', '2022-03-28 09:51:10', '2022-03-28 09:51:10'),
(14, 6, 'Institute 1', 'btech', 'electrical-electronics-engineering', '1994', '2022-03-30 08:16:06', '2022-03-30 08:16:06'),
(15, 6, 'Institute 2', 'btech', 'civil-engineering', '1985', '2022-03-30 08:16:06', '2022-03-30 08:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `qualification_details`
--

CREATE TABLE `qualification_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `achievements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `awards` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualification_details`
--

INSERT INTO `qualification_details` (`id`, `user_id`, `achievements`, `awards`, `additional_data`, `created_at`, `updated_at`) VALUES
(1, 7, 'achievements update', 'Award update', 'Additional update', '2022-03-28 09:05:26', '2022-03-28 09:50:48'),
(2, 6, NULL, NULL, NULL, '2022-03-30 08:06:55', '2022-03-30 08:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `technical` tinyint(1) DEFAULT 0,
  `hr` tinyint(1) NOT NULL DEFAULT 0,
  `linkedin_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduction_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `user_id`, `technical`, `hr`, `linkedin_url`, `resume`, `introduction_video`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, NULL, 'sample.pdf', 'file_example_MP4_480_1_5MG.mp4', '2022-03-29 09:00:51', '2022-03-29 10:14:54'),
(2, 6, 0, 0, NULL, '30-03-2022-130928.pdf', '30-03-2022-130928.mp4', '2022-03-30 08:09:28', '2022-03-30 08:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', 'Updated', NULL, '2022-03-01 03:29:11', '2022-03-02 06:20:21'),
(3, 'Interviewer', 'web', 'Interviewer', NULL, '2022-03-09 08:45:36', '2022-03-21 08:57:34'),
(6, 'Candidate', 'web', 'Condidate description', NULL, '2022-03-21 08:57:54', '2022-03-21 08:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(10, 1),
(11, 1),
(12, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(31, 3),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 6),
(85, 6),
(86, 6),
(87, 6),
(88, 6),
(92, 3),
(93, 3),
(94, 3),
(95, 3),
(96, 3),
(97, 3),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `created_by`, `name`, `slug`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Customer care team', 'customer-care-team', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 0, '2022-03-16 09:48:25', '2022-03-16 04:37:47', '2022-03-16 04:48:25'),
(2, 1, 'Customer care team', 'customer-care-team', '<p>Our dedicated customer care team is ready to review your property preferences or help out any way we can.</p>', 1, NULL, '2022-03-16 04:49:07', '2022-03-16 04:49:07'),
(3, 1, 'Interviewer', 'interviewer', '<p>Our comparison service is without bias. We provide you with Interviewer purely on your property requirements and preferences.</p>', 1, NULL, '2022-03-16 04:49:19', '2022-03-16 04:49:19'),
(4, 1, 'Free service', 'free-service', '<p>Our service is free for homeowners, with no obligation. Use it at your own leisure - no strings attached!</p>', 1, NULL, '2022-03-16 04:49:34', '2022-03-16 04:49:34'),
(5, 1, 'Nemo Enim', 'nemo-enim', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>', 1, NULL, '2022-03-16 04:49:50', '2022-03-16 04:49:50'),
(6, 1, 'Dele cardo', 'dele-cardo', '<p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>', 1, NULL, '2022-03-16 04:50:06', '2022-03-16 04:50:06'),
(7, 1, 'Divera don', 'divera-don', '<p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>', 1, NULL, '2022-03-16 04:51:01', '2022-03-16 04:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_bar_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_bar_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_col1_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_col2_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_col3_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_col4_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_copyright` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_recent_news_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_recent_portfolio_item` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newsletter_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_button_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_button_url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_background_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receive_email_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo11` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo12` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo13` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo14` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo15` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_total_recent_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_news_heading_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_news_heading_recent_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_total_upcoming_event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_total_past_event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_event_heading_upcoming` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_event_heading_past` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_service_heading_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_service_heading_quick_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_portfolio_heading_project_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_portfolio_heading_quick_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_end_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `photo_logo`, `photo_favicon`, `top_bar_email`, `top_bar_phone`, `footer_col1_title`, `footer_col2_title`, `footer_col3_title`, `footer_col4_title`, `footer_copyright`, `footer_address`, `footer_email`, `footer_phone`, `footer_recent_news_item`, `footer_recent_portfolio_item`, `newsletter_text`, `cta_text`, `cta_button_text`, `cta_button_url`, `cta_background_photo`, `send_email_from`, `receive_email_to`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`, `photo6`, `photo7`, `photo8`, `photo9`, `photo10`, `photo11`, `photo12`, `photo13`, `photo14`, `photo15`, `sidebar_total_recent_post`, `sidebar_news_heading_category`, `sidebar_news_heading_recent_post`, `sidebar_total_upcoming_event`, `sidebar_total_past_event`, `sidebar_event_heading_upcoming`, `sidebar_event_heading_past`, `sidebar_service_heading_service`, `sidebar_service_heading_quick_contact`, `sidebar_portfolio_heading_project_detail`, `sidebar_portfolio_heading_quick_contact`, `front_end_color`, `created_at`, `updated_at`) VALUES
(1, 'logo1.png', '02032022074219logo1.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-08 03:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `skills`, `created_at`, `updated_at`) VALUES
(1, 6, 'My Skills', '2022-03-30 08:16:06', '2022-03-30 08:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `left_sec_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left_sec_sub_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left_sec_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left_sec_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_sect_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_sec_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_sec_left_btn_lbl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_sec_right_btn_lbl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_sec_video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `created_by`, `left_sec_title`, `left_sec_sub_description`, `left_sec_description`, `left_sec_image`, `right_sect_title`, `right_sec_description`, `right_sec_left_btn_lbl`, `right_sec_right_btn_lbl`, `right_sec_video_link`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Compare Interviewers including their fees', '<h4 class=\"font-weight-normal\">Be confident. Compare Interviewers.</h4>', '<h2 class=\"col-12\">leading comparison service and the only place you can compare Interviewers/candidates fees side-by-side.</h2>', 'bg1.jpg', 'Virtual Face-to-Face Mock Interviews with industry Experts', 'Live | On-demand | Anywhere', 'Learn More', 'Sign Up', 'https://www.youtube.com/watch?v=jDDaplaOz7Q', 1, NULL, '2022-03-14 08:01:28', '2022-03-16 09:59:23'),
(2, 1, 'Delectus eum ullam', 'Doloremque magni cum', '<p>tested</p>', 'download.png', 'At at aut ab dolor i', 'Culpa unde proident', 'Eum sed quis incidun', 'Assumenda rerum minu', NULL, 1, NULL, '2022-03-28 02:47:52', '2022-03-28 02:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googleplus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tumblr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flickr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reddit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stumbleupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delicious` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `digg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `facebook`, `twitter`, `linkedin`, `googleplus`, `pinterest`, `youtube`, `instagram`, `tumblr`, `flickr`, `reddit`, `snapchat`, `whatsapp`, `quora`, `stumbleupon`, `delicious`, `digg`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.linkedin.com/signup', 'google-plus', 'Pinterest', 'https://www.youtube.com/', 'https://www.instagram.com/accounts/login/', 'Tumblr', 'Flickr', 'Reddit', 'Snapchat', 'www.whatsapp.com', 'Quora', 'StumbleUpon', 'Delicious', 'Digg', NULL, NULL, '2022-03-09 04:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `created_by`, `first_name`, `last_name`, `slug`, `designation`, `twitter_link`, `facebook_link`, `instagram_link`, `linkedin_link`, `description`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Walter', 'White', 'walter', 'Chief Executive Officer', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '<p>Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut</p>', 'team-1.jpg', 1, NULL, '2022-03-16 08:02:55', '2022-03-16 08:06:14'),
(2, 1, 'Sarah', 'Jhinson', 'sarah', 'Product Manager', NULL, NULL, NULL, NULL, '<p>Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus</p>', 'team-2.jpg', 1, NULL, '2022-03-16 09:04:36', '2022-03-16 09:04:36'),
(3, 1, 'William', 'Anderson', 'william', 'CTO', NULL, NULL, NULL, NULL, '<p>Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara</p>', 'team-3.jpg', 1, NULL, '2022-03-16 09:05:22', '2022-03-16 09:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `slug`, `designation`, `image`, `comment`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Saul Goodman', 'saul-goodman', 'Ceo & Founder', 'testimonials-1.jpg', '<p>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</p>', 1, NULL, '2022-03-16 10:43:50', '2022-03-16 10:43:50'),
(2, 'Sara Wilsson', 'sara-wilsson', 'Designer', 'testimonials-2.jpg', '<p>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</p>', 1, NULL, '2022-03-16 10:45:02', '2022-03-16 10:45:02'),
(3, 'Jena Karlis', 'jena-karlis', 'Store Owner', 'testimonials-3.jpg', '<p>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</p>', 1, NULL, '2022-03-16 10:46:16', '2022-03-16 10:46:16'),
(4, 'Matt Brandon', 'matt-brandon', 'Freelancer', 'testimonials-4.jpg', '<p>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</p>', 1, NULL, '2022-03-16 10:47:12', '2022-03-16 10:47:12'),
(5, 'John Larson', 'john-larson', 'Entrepreneur', 'testimonials-5.jpg', '<p>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</p>', 1, NULL, '2022-03-16 10:48:07', '2022-03-16 10:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temprary_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `last_name`, `phone`, `promo_code`, `email`, `temprary_email`, `email_verified_at`, `password`, `remember_token`, `verify_token`, `status`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4046, 'Hardik tested', NULL, NULL, NULL, 'admin@gmail.com', NULL, NULL, '$2y$10$TrSMTkdqZ4CkZe8zLOz/AuMG5CYt3vVpO4dHwUN.ecPMsAorlD416', NULL, NULL, 1, NULL, NULL, '2022-03-09 11:01:24', '2022-03-25 05:12:33'),
(5, 5465, 'Alika Avila', NULL, NULL, NULL, 'lawukobov@mailinator.com', NULL, NULL, '$2y$10$/MR9SKwPqOJbVU0uHvd1MOzLwrsQDeUy4aiC1dM3/vnCqF5HFUBKO', NULL, NULL, 1, NULL, NULL, '2022-03-22 03:43:24', '2022-03-22 03:43:24'),
(6, 2964, 'Yvette Glover', 'Cash', '1234567800', NULL, 'chandamar725@gmail.com', NULL, '2022-03-30 09:34:14', '$2y$10$FipZvMlM.AsqEoPvqF8PHOdl7DN43JYgAm4IZRevIZEBwZVLlV6/.', NULL, NULL, 1, '30-03-2022-112134.jpg', NULL, '2022-03-22 06:02:18', '2022-03-31 03:32:33'),
(7, 5461, 'Sydnee Langley', 'Ratliff', '12345678', NULL, 'dudaguhu@interviewer.com', NULL, NULL, '$2y$10$0YqFHYTffC4jMVOzF9oL3.o2AFDbqifo/eWT/FSQlQxTQmI8KIZ6i', NULL, NULL, 1, NULL, NULL, '2022-03-22 06:04:59', '2022-03-31 03:39:09'),
(8, 8002, 'Quail Spence', 'Foley', '12345678', NULL, 'xytudip@mailinator.com', NULL, NULL, '$2y$10$QnJbTYfCsFklwp3sSS9njue.6Z0dZhofmCOh8JUSRps2gGPq8gArG', NULL, '623c97c42c7c5', 1, NULL, NULL, '2022-03-24 05:11:51', '2022-03-25 02:18:42'),
(9, 8261, 'Kibo Bryan', 'Martinez', '3333333', NULL, 'xanytabaki@mailinator.com', NULL, NULL, '$2y$10$NqsSaD8g/gS.dUG1ld3jXeocINr2AACWC0KzWkMlp49XVR7DEFp2m', NULL, NULL, 1, NULL, NULL, '2022-03-24 06:29:39', '2022-03-24 06:29:39'),
(10, 7074, 'Reuben Barry', 'Torres', '34343343', NULL, 'viqytujehy@mailinator.com', NULL, NULL, '$2y$10$YfFUjBeeyy0Zos/laTDfR.As6L8Ks4NOsV2XDNhGEDGladKGgKP8q', NULL, '623c568702ce1', 1, NULL, NULL, '2022-03-24 06:31:19', '2022-03-24 06:31:19'),
(11, 1410, 'Georgia Brock', 'Rutledge', '2222222', NULL, 'cesyxi@mailinator.com', NULL, NULL, '$2y$10$lCMuQ1gcYGzuJ7wzR9Ijwu1JExN7Of.oI8Y/9bSQd7PmuUUP6rpme', NULL, '623c5719ceffa', 1, NULL, NULL, '2022-03-24 06:33:45', '2022-03-24 10:04:19'),
(34, 5362, 'Farhan', NULL, NULL, NULL, 'farhandigtandigtal@gmail.com', NULL, NULL, '$2y$10$/Y1cOHddN8DyfpYxMBtaKOEaGHspmUeo7j4RpEBY2C.IYuVV6djxy', NULL, NULL, 1, NULL, NULL, '2022-03-24 09:18:22', '2022-03-25 04:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `date_of_birth`, `gender`, `address`, `language_slug`, `skype_id`, `created_at`, `updated_at`) VALUES
(1, 7, '2022-03-28', 'male', 'Address tested', 'hindi', '12222222', '2022-03-28 07:36:41', '2022-03-28 08:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_know_languages`
--

CREATE TABLE `user_know_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `language_id` bigint(20) NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `whychooses`
--

CREATE TABLE `whychooses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whychooses`
--

INSERT INTO `whychooses` (`id`, `image`, `name`, `content`, `icon`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'IMG-20211128-WA0036.jpg', 'Brian Vang', '<p>Lorem ipsum </p>', 'IMG-20211128-WA0036.jpg', 1, NULL, NULL, NULL, '2022-03-13 11:14:18', '2022-03-13 02:04:26', '2022-03-13 06:14:18'),
(2, 'IMG-20211128-WA0036.jpg', 'Brian Vang', '<p>Lorem ipsum&nbsp;</p>', 'IMG-20211128-WA0036.jpg', 1, NULL, NULL, NULL, '2022-03-21 13:32:04', '2022-03-13 02:05:02', '2022-03-21 08:32:04'),
(3, 'IMG-20211128-WA0036.jpg', 'Brian Vang', '<p>Lorem ipsum&nbsp;</p>', 'IMG-20211128-WA0036.jpg', 1, NULL, NULL, NULL, '2022-03-21 13:32:08', '2022-03-13 02:05:31', '2022-03-21 08:32:08'),
(4, 'IMG-20211128-WA0036.jpg', 'Brian Vang', '<p>Lorem ipsum&nbsp;</p>', 'IMG-20211128-WA0036.jpg', 1, NULL, NULL, NULL, NULL, '2022-03-13 02:05:58', '2022-03-13 02:05:58'),
(5, 'IMG-20211128-WA0036.jpg', 'Deanna Odonnell', '<p>Lorem ispsum&nbsp;</p>', 'IMG-20211128-WA0036.jpg', 1, NULL, NULL, NULL, NULL, '2022-03-13 02:27:19', '2022-03-13 02:27:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advantage_mocks`
--
ALTER TABLE `advantage_mocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_types`
--
ALTER TABLE `booking_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience_details`
--
ALTER TABLE `experience_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `help_hires`
--
ALTER TABLE `help_hires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_works`
--
ALTER TABLE `how_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_settings`
--
ALTER TABLE `page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pricingtables`
--
ALTER TABLE `pricingtables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualification_details`
--
ALTER TABLE `qualification_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_know_languages`
--
ALTER TABLE `user_know_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whychooses`
--
ALTER TABLE `whychooses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advantage_mocks`
--
ALTER TABLE `advantage_mocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_types`
--
ALTER TABLE `booking_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `experience_details`
--
ALTER TABLE `experience_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `help_hires`
--
ALTER TABLE `help_hires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `how_works`
--
ALTER TABLE `how_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricingtables`
--
ALTER TABLE `pricingtables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `qualification_details`
--
ALTER TABLE `qualification_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_know_languages`
--
ALTER TABLE `user_know_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `whychooses`
--
ALTER TABLE `whychooses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;