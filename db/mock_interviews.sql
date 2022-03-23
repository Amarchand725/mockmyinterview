-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 02:57 PM
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
-- Database: `mock_interviews`
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
  `category_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `created_by`, `category_id`, `title`, `slug`, `description`, `post`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Neque omnis autem ul', NULL, 'Irure iste pariatur Sapiente dolor aut pariatur Eaque laboriosam ad odit', NULL, 1, NULL, NULL, NULL, NULL, '2022-03-13 07:27:47', '2022-03-13 07:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `categories` (`id`, `created_by`, `name`, `description`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, 'Kiona Kane', 'Quo nesciunt earum iste dignissimos est sunt', 1, NULL, NULL, NULL, NULL, '2022-03-13 06:52:45', '2022-03-13 06:52:45'),
(3, 1, 'Zena Horton', 'Rerum qui quibusdam id et ut quis', 1, NULL, NULL, NULL, NULL, '2022-03-13 06:52:56', '2022-03-13 06:52:56');

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
(34, '2022_03_16_095716_create_work_processes_table', 22),
(35, '2022_03_09_150554_create_packages_table', 23),
(38, '2022_03_09_150411_create_teams_table', 24);

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
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4);

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
(1, 1, 'Home', 'home', '<p>Lorem ipsm&nbsp;</p>', NULL, NULL, NULL, 1, NULL, '2022-03-14 10:12:22', '2022-03-14 10:14:35'),
(2, 1, 'About', 'about', '<p>Lorem ipsum&nbsp;</p>', NULL, NULL, NULL, 1, NULL, '2022-03-15 10:58:57', '2022-03-15 10:58:57'),
(3, 1, 'Service', 'service', '<p>Lorem ipsum&nbsp;</p>', NULL, NULL, NULL, 1, NULL, '2022-03-16 03:04:59', '2022-03-16 03:04:59'),
(4, 1, 'Contact', 'contact', '<p>Lorem ipsum&nbsp;</p>', NULL, NULL, NULL, 1, NULL, '2022-03-16 03:08:47', '2022-03-16 03:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `page_abouts`
--

CREATE TABLE `page_abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mt_about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mk_about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `md_about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_abouts`
--

INSERT INTO `page_abouts` (`id`, `about_heading`, `about_content`, `mt_about`, `mk_about`, `md_about`, `created_at`, `updated_at`) VALUES
(1, 'fujydifa@mailinator.com', 'Dolorum deserunt ea', 'nyfumaxed@mailinator.com', 'Quis velit officia r', 'Corrupti sint quia', NULL, '2022-03-14 05:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `page_blogs`
--

CREATE TABLE `page_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mt_blog` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mk_blog` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `md_blog` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_blogs`
--

INSERT INTO `page_blogs` (`id`, `blog_heading`, `mt_blog`, `mk_blog`, `md_blog`, `created_at`, `updated_at`) VALUES
(1, 'fewobiwi@mailinator.com', 'loxe@mailinator.com', 'Adipisicing cillum q', 'Perspiciatis quam d', NULL, '2022-03-14 05:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `page_contacts`
--

CREATE TABLE `page_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mt_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mk_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `md_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contacts`
--

INSERT INTO `page_contacts` (`id`, `contact_heading`, `contact_address`, `contact_email`, `contact_phone`, `contact_map`, `mt_contact`, `mk_contact`, `md_contact`, `created_at`, `updated_at`) VALUES
(1, 'zecav@mailinator.com', 'Tempora culpa laudan', 'Irure aperiam obcaec', 'Vero exercitation op', 'Incididunt ea labore', 'mawyruceqy@mailinator.com', 'Veniam labore dicta', 'Ipsum exercitation', NULL, '2022-03-14 05:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `page_home`
--

CREATE TABLE `page_home` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_sec_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_sec_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_sec_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_sec_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_sec_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_sec_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_sec_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_sec_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottom_sec_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottom_sec_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottom_sec_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottom_sec_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_banner_status` tinyint(1) NOT NULL DEFAULT 0,
  `home_service_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_service_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_service_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_team_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_team_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_why_choose_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_why_choose_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_why_choose_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_testimonial_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_testimonial_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_testimonial_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_mock_advantage_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_mock_advantage_subtitle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_mock_advantage_status` tinyint(1) DEFAULT 1,
  `home_mock_advantage_bottom_first_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_mock_advantage_bottom_first_counter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_mock_advantage_bottom_second_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_mock_advantage_bottom_second_counter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_mock_advantage_bottom_third_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_mock_advantage_bottom_fourth_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_mock_advantage_bottom_third_counter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_mock_advantage_bottom_fourth_counter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_mock_advantage_counter_status` tinyint(1) NOT NULL DEFAULT 1,
  `home_real_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_first_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_first_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_first_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_second_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_second_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_second_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_third_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_third_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_third_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_fourth_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_fourth_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_fourth_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_fifth_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_fifth_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_fifth_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_sixth_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_sixth_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_real_bottom_sixth_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_signup_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_signup_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_signup_btn_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_signup_status` tinyint(1) NOT NULL DEFAULT 1,
  `home_real_status` tinyint(1) NOT NULL DEFAULT 1,
  `home_blog_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_blog_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_blog_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_blog_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_home`
--

INSERT INTO `page_home` (`id`, `title`, `meta_keyword`, `meta_description`, `banner_heading`, `top_sec_heading`, `top_sec_title`, `top_sec_description`, `top_sec_image`, `middle_sec_heading`, `middle_sec_title`, `middle_sec_description`, `middle_sec_image`, `bottom_sec_heading`, `bottom_sec_title`, `bottom_sec_description`, `bottom_sec_image`, `home_banner_status`, `home_service_title`, `home_service_subtitle`, `home_service_status`, `home_team_title`, `home_team_subtitle`, `home_why_choose_title`, `home_why_choose_subtitle`, `home_why_choose_status`, `home_testimonial_title`, `home_testimonial_subtitle`, `home_testimonial_status`, `home_mock_advantage_title`, `home_mock_advantage_subtitle`, `home_mock_advantage_status`, `home_mock_advantage_bottom_first_label`, `home_mock_advantage_bottom_first_counter`, `home_mock_advantage_bottom_second_label`, `home_mock_advantage_bottom_second_counter`, `home_mock_advantage_bottom_third_label`, `home_mock_advantage_bottom_fourth_label`, `home_mock_advantage_bottom_third_counter`, `home_mock_advantage_bottom_fourth_counter`, `home_mock_advantage_counter_status`, `home_real_title`, `home_real_subtitle`, `home_real_bottom_first_title`, `home_real_bottom_first_description`, `home_real_bottom_first_icon`, `home_real_bottom_second_title`, `home_real_bottom_second_description`, `home_real_bottom_second_icon`, `home_real_bottom_third_title`, `home_real_bottom_third_description`, `home_real_bottom_third_icon`, `home_real_bottom_fourth_title`, `home_real_bottom_fourth_description`, `home_real_bottom_fourth_icon`, `home_real_bottom_fifth_title`, `home_real_bottom_fifth_description`, `home_real_bottom_fifth_icon`, `home_real_bottom_sixth_title`, `home_real_bottom_sixth_description`, `home_real_bottom_sixth_icon`, `home_signup_title`, `home_signup_description`, `home_signup_btn_label`, `home_signup_status`, `home_real_status`, `home_blog_title`, `home_blog_subtitle`, `home_blog_item`, `home_blog_status`, `created_at`, `updated_at`) VALUES
(1, 'gygokocev@mailinator.com', 'Eiusmod eos omnis v', 'Repudiandae ut et ne', 'FAST, FREE AND SIMPLE', 'Candidate', 'Enter a few details about your Interviewer.', 'It\'s easy, and only takes a couple of minutes.', 'desk-start@1x-min.png', 'Interviewer', 'Compare your Interviewer side by side', 'Comfortably compare interviewer fees and service information online.', 'desk-compare@1x-min.png', 'Connect', 'You decide which Interviewer to connect with', 'Contact the interviewer you like, and pass on the ones you don\'t. It\'s that simple.', 'desk-connect@1x-min.png', 0, 'jonyma@mailinator.com', 'hihybyvo@mailinator.com', 'Show', 'lebud@mailinator.com', 'Dolore similique lau', 'kykuvelu@mailinator.com', 'mupeporytu@mailinator.com', 'Show', 'TESTIMONIALS', 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias', 'Show', 'ADVANTAGES OF MOCK INTERVIEWS', 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias', 1, 'Candidate', '232', 'interviewer', '521', 'Hours Of Support', 'Hard Workers', '1463', '15', 1, 'REAL PEOPLE, REAL SERVICE', 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias', 'Customer care team', 'Our dedicated customer care team is ready to review your property preferences or help out any way we can.', NULL, 'Interviewer', 'Our comparison service is without bias. We provide you with Interviewer purely on your property requirements and preferences.', NULL, 'Free service', 'Our service is free for homeowners, with no obligation. Use it at your own leisure - no strings attached!', NULL, 'Nemo Enim', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis', NULL, 'Dele cardo', 'Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur', NULL, 'Divera don', 'Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur', NULL, 'Sign-Up Now!', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Sign-Up Now!', 1, 1, 'dyjunan@mailinator.com', 'Amet aut aut facili', 'midykijor@mailinator.com', 'Show', NULL, '2022-03-15 05:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `page_services`
--

CREATE TABLE `page_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mt_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mk_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `md_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_services`
--

INSERT INTO `page_services` (`id`, `service_heading`, `service_description`, `mt_service`, `mk_service`, `md_service`, `created_at`, `updated_at`) VALUES
(1, 'libihaty@mailinator.com', 'Exercitationem exped', 'mevovywi@mailinator.com', 'Est et irure simili', 'Officia voluptas exe', NULL, '2022-03-14 05:46:40');

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
(1, 'home', '_token', 'AtObO55a1FfbWgNUtyhBGdyh0v5B0EV7ERjnU56C', '2022-03-15 10:52:44', '2022-03-16 02:22:13'),
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
(16, 'home', 'home_banner_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(17, 'home', 'home_why_choose_title', 'Why choose title', '2022-03-15 10:52:44', '2022-03-15 10:54:33'),
(18, 'home', 'home_why_choose_subtitle', 'Why choose sub-title', '2022-03-15 10:52:44', '2022-03-15 10:54:33'),
(19, 'home', 'home_why_choose_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(20, 'home', 'home_testimonial_title', 'TESTIMONIALS', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(21, 'home', 'home_testimonial_subtitle', 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(22, 'home', 'home_testimonial_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(23, 'home', 'home_contact_title', 'Contact Updated', '2022-03-15 10:52:44', '2022-03-16 02:22:13'),
(24, 'home', 'home_contact_description', 'Contact Section Updated', '2022-03-15 10:52:44', '2022-03-16 02:22:13'),
(25, 'home', 'home_contact_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(26, 'home', 'home_mock_advantage_title', 'ADVANTAGES OF MOCK INTERVIEWS', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(27, 'home', 'home_mock_advantage_subtitle', 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(28, 'home', 'home_mock_advantage_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(29, 'home', 'home_mock_advantage_bottom_first_label', 'Candidate', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(30, 'home', 'home_mock_advantage_bottom_first_counter', '232', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(31, 'home', 'home_mock_advantage_bottom_second_label', 'interviewer', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(32, 'home', 'home_mock_advantage_bottom_second_counter', '521', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(33, 'home', 'home_mock_advantage_bottom_third_label', 'Hours Of Support', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(34, 'home', 'home_mock_advantage_bottom_third_counter', '1463', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(35, 'home', 'home_mock_advantage_bottom_fourth_label', 'Hard Workers', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(36, 'home', 'home_mock_advantage_bottom_fourth_counter', '15', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(37, 'home', 'home_mock_advantage_counter_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(38, 'home', 'home_signup_title', 'Sign-Up Now!', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(39, 'home', 'home_signup_description', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(40, 'home', 'home_signup_btn_label', 'Sign-Up Now!', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(41, 'home', 'home_signup_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(42, 'home', 'home_real_title', 'REAL PEOPLE, REAL SERVICE', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(43, 'home', 'home_real_description', 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(44, 'home', 'home_real_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(45, 'home', 'home_how_title', 'HOW DOES IT WORK?', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(46, 'home', 'home_how_description', 'It helps students and job seekers crack interviews & land their dream jobs!', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(47, 'home', 'home_how_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(48, 'home', 'home_pricing_title', 'PRICING', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(49, 'home', 'home_pricing_description', NULL, '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(50, 'home', 'home_pricing_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(51, 'home', 'home_team_title', 'TEAM', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(52, 'home', 'home_team_description', 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(53, 'home', 'home_team_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(54, 'home', 'home_help_title', 'WANT SOME HELP TO HIRE AN INTERVIEWER', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(55, 'home', 'home_help_description', 'Our team of experts have developed tools and resources to assist you along the way.', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(56, 'home', 'home_help_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(57, 'home', 'home_tips_title', 'CONTACT', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(58, 'home', 'home_tips_description', 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias', '2022-03-15 10:52:44', '2022-03-15 10:58:19'),
(59, 'home', 'home_tips_status', '1', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(60, 'home', 'form_home_blog', NULL, '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(61, 'home', 'banner_bg_image', '15032022155244.jpg', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(62, 'home', 'top_sec_image', '15032022160152.png', '2022-03-15 10:52:44', '2022-03-15 11:01:52'),
(63, 'home', 'middle_sec_image', '15032022160221.png', '2022-03-15 10:52:44', '2022-03-15 11:02:21'),
(64, 'home', 'bottom_sec_image', '15032022155244.png', '2022-03-15 10:52:44', '2022-03-15 10:52:44'),
(65, 'about', '_token', 'AtObO55a1FfbWgNUtyhBGdyh0v5B0EV7ERjnU56C', '2022-03-16 02:43:59', '2022-03-16 02:43:59'),
(66, 'about', 'parent_slug', 'about', '2022-03-16 02:43:59', '2022-03-16 02:43:59'),
(67, 'about', 'mt_about', 'Quibusdam omnis aper updated', '2022-03-16 02:43:59', '2022-03-16 03:03:16'),
(68, 'about', 'mk_about', 'Et excepteur aut quo updated', '2022-03-16 02:43:59', '2022-03-16 03:03:16'),
(69, 'about', 'md_about', 'Corporis veritatis o updated', '2022-03-16 02:43:59', '2022-03-16 03:03:16'),
(70, 'about', 'about_heading', 'ABOUT MOCK MY INTERVIEW TM', '2022-03-16 02:43:59', '2022-03-16 03:22:52'),
(71, 'about', 'about_content', '<div class=\"col-lg-6 pt-4 pt-lg-0 content\">\r\n<p class=\"fst-italic\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n<ul>\r\n<li>&nbsp;Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>\r\n<li>&nbsp;Duis aute irure dolor in reprehenderit in voluptate velit</li>\r\n<li>&nbsp;Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda</li>\r\n</ul>\r\n<p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n</div>\r\n<div class=\"col-lg-6 pt-4 pt-lg-0 content\">\r\n<p class=\"fst-italic\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n<ul>\r\n<li>&nbsp;Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>\r\n<li>&nbsp;Duis aute irure dolor in reprehenderit in voluptate velit</li>\r\n<li>&nbsp;Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda</li>\r\n</ul>\r\n<p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n</div>', '2022-03-16 02:43:59', '2022-03-16 03:23:43'),
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
(89, 'contact', 'contact_phone', '+1 5589 55488 55s', '2022-03-16 03:18:35', '2022-03-16 03:18:35'),
(90, 'contact', 'contact_map', NULL, '2022-03-16 03:18:35', '2022-03-16 03:18:35'),
(91, 'contact', 'form_contact', NULL, '2022-03-16 03:18:35', '2022-03-16 03:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(79, 'team-delete', 'web', NULL, '2022-03-16 07:27:03', '2022-03-16 07:27:03');

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
(3, 'User', 'web', 'Norm user', NULL, '2022-03-09 08:45:36', '2022-03-09 08:45:36');

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
(79, 1);

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
(1, 1, 'Aut ad ut magna elit', '<p>Minima sequi neque i</p>', '<p>Lorem ipsm&nbsp;</p>', '413-536x354.jpg', 'Qui fugiat doloribu', 'Ut ab sit sed deser', 'Voluptate omnis exer', 'Est quis optio sint', 'http://localhost/mock_interview/slider/1/edit', 1, NULL, '2022-03-14 08:01:28', '2022-03-14 08:10:38');

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
(1, 1, 'Walter', 'White', 'walter', 'Chief Executive Officer', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '<p>Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut</p>', 'team-1.jpg', 1, NULL, '2022-03-16 08:02:55', '2022-03-16 08:06:14');

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
(2, 'George Baldwin', 'george-baldwin', 'Sandra Ayers', '413-536x354.jpg', 'Enim consequat Veli', 1, '2022-03-09 14:50:06', '2022-03-09 09:49:53', '2022-03-09 09:50:06'),
(3, 'Petra Lee', 'petra-lee', 'Stone Stafford', '413-536x354.jpg', 'Rerum aliqua Offici', 1, '2022-03-09 14:51:30', '2022-03-09 09:50:32', '2022-03-09 09:51:30'),
(4, 'Brielle Lawrence', 'brielle-lawrence', 'Guinevere Blackburn', '413-536x354.jpg', '<p>Perspiciatis et ips</p>', 1, NULL, '2022-03-09 09:52:31', '2022-03-13 02:25:43'),
(5, 'Kiayada Avila', 'kiayada-avila', 'Prescott Brennan', 'IMG-20211128-WA0036.jpg', '<p>Lorem ipsum&nbsp;</p>', 1, '2022-03-13 11:11:35', '2022-03-13 02:26:30', '2022-03-13 06:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `meta_title`, `meta_keyword`, `meta_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Hardik', 'admin@gmail.com', NULL, '$2y$10$qaBzU0.oxK2m0kkIcqcV8e.2VGzoRGark5M1f6XWBqzXl0i74AJkW', NULL, NULL, NULL, NULL, NULL, '2022-03-09 11:01:24', '2022-03-09 11:01:24'),
(3, 'pelopysa@mailinator.com', 'hyjaqu@mailinator.com', NULL, '$2y$10$o1aBj3wYuCVmNAgMlmKKGuOtBRf0J5HVsFqFarj0JwHlY3qyQLkKa', NULL, NULL, NULL, NULL, '2022-03-13 10:19:46', '2022-03-13 02:50:01', '2022-03-13 05:19:46'),
(4, 'jopoq@mailinator.com', 'felu@mailinator.com', NULL, '$2y$10$fWboqyp8X23iA4F.Z5MFhOdV9whIaZI3sUE0e851LxoSrIKZe8GE2', NULL, NULL, NULL, NULL, NULL, '2022-03-13 02:52:38', '2022-03-13 02:52:38');

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
(2, 'IMG-20211128-WA0036.jpg', 'Brian Vang', '<p>Lorem ipsum&nbsp;</p>', 'IMG-20211128-WA0036.jpg', 1, NULL, NULL, NULL, NULL, '2022-03-13 02:05:02', '2022-03-13 02:05:02'),
(3, 'IMG-20211128-WA0036.jpg', 'Brian Vang', '<p>Lorem ipsum&nbsp;</p>', 'IMG-20211128-WA0036.jpg', 1, NULL, NULL, NULL, NULL, '2022-03-13 02:05:31', '2022-03-13 02:05:31'),
(4, 'IMG-20211128-WA0036.jpg', 'Brian Vang', '<p>Lorem ipsum&nbsp;</p>', 'IMG-20211128-WA0036.jpg', 1, NULL, NULL, NULL, NULL, '2022-03-13 02:05:58', '2022-03-13 02:05:58'),
(5, 'IMG-20211128-WA0036.jpg', 'Deanna Odonnell', '<p>Lorem ispsum&nbsp;</p>', 'IMG-20211128-WA0036.jpg', 1, NULL, NULL, NULL, NULL, '2022-03-13 02:27:19', '2022-03-13 02:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `work_processes`
--

CREATE TABLE `work_processes` (
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
-- Dumping data for table `work_processes`
--

INSERT INTO `work_processes` (`id`, `created_by`, `title`, `slug`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'CREATE AN ACCOUNT', 'create-an-account', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor gravida aliquam. Morbi orci urna, iaculis in ligula et, posuere interdum lectus.</p>', 1, NULL, '2022-03-16 05:33:17', '2022-03-16 05:33:17'),
(2, 1, 'COMPLETE PROFILE', 'complete-profile', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor gravida aliquam. Morbi orci urna, iaculis in ligula et, posuere interdum lectus.</p>', 1, NULL, '2022-03-16 05:33:30', '2022-03-16 05:33:30'),
(3, 1, 'SCHEDULE ONE-ON-ONE Interview', 'schedule-one-on-one-interview', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor gravida aliquam. Morbi orci urna, iaculis in ligula et, posuere interdum lectus.</p>', 1, NULL, '2022-03-16 05:33:49', '2022-03-16 05:33:49'),
(4, 1, 'PERFORMANCE FEEDBACK', 'performance-feedback', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor gravida aliquam. Morbi orci urna, iaculis in ligula et, posuere interdum lectus.</p>', 1, NULL, '2022-03-16 05:34:08', '2022-03-16 05:34:08');

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `page_abouts`
--
ALTER TABLE `page_abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_blogs`
--
ALTER TABLE `page_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_contacts`
--
ALTER TABLE `page_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_home`
--
ALTER TABLE `page_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_services`
--
ALTER TABLE `page_services`
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
-- Indexes for table `whychooses`
--
ALTER TABLE `whychooses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_processes`
--
ALTER TABLE `work_processes`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_abouts`
--
ALTER TABLE `page_abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_blogs`
--
ALTER TABLE `page_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_contacts`
--
ALTER TABLE `page_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_home`
--
ALTER TABLE `page_home`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_services`
--
ALTER TABLE `page_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `whychooses`
--
ALTER TABLE `whychooses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `work_processes`
--
ALTER TABLE `work_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
