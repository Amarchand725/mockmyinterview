-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 05:45 PM
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
-- Table structure for table `available_slots`
--

CREATE TABLE `available_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `available_date_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `available_slot_dates`
--

CREATE TABLE `available_slot_dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `interviewer_id` bigint(20) NOT NULL,
  `interview_type` bigint(20) DEFAULT NULL,
  `slot_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `available_slot_dates`
--

INSERT INTO `available_slot_dates` (`id`, `interviewer_id`, `interview_type`, `slot_type`, `start_date`, `end_date`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 7, 5, 'weekdays', '2022-06-22', '2022-06-25', 0, NULL, '2022-06-20 08:14:18', '2022-06-20 08:14:18'),
(3, 7, NULL, 'weekdays', '2022-06-18', '2022-06-20', 0, NULL, '2022-06-22 10:12:34', '2022-06-22 10:12:34'),
(4, 7, NULL, 'weekdays', '2022-06-18', '2022-06-20', 0, NULL, '2022-06-22 10:13:17', '2022-06-22 10:13:17'),
(5, 7, NULL, 'weekdays', '2022-07-08', '2022-07-10', 0, NULL, '2022-07-06 16:52:24', '2022-07-06 16:52:24'),
(6, 7, NULL, 'weekdays', '2022-07-09', '2022-07-16', 0, NULL, '2022-07-07 08:31:31', '2022-07-07 08:31:31');

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
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `created_by`, `category_slug`, `title`, `slug`, `description`, `post`, `mime_type`, `is_paid`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'career-management', 'Nifty Ways to Touch Up Your Non-Verbal Communication Skills', 'nifty-ways-to-touch-up-your-non-verbal-communication-skills', '<div>\r\n<div>What you often tend to forget is the fact that your body can speak louder than your words. Your resume may be impressive and your verbal skills even more so, but unless your body lang</div>\r\n</div>', NULL, NULL, 1, 1, NULL, '2022-04-26 02:04:42', '2022-04-26 02:04:42'),
(2, 1, 'technology', 'Typical Blunders to Evade At Job Interviews', 'typical-blunders-to-evade-at-job-interviews', '<div>\r\n<div>It may seem self-evident that you need to convey a good first impression for your interview. If you are too stressed out though, you might end up committing any of the following blun</div>\r\n</div>', NULL, NULL, 0, 1, NULL, '2022-04-26 02:05:23', '2022-04-26 02:05:23'),
(3, 1, 'job', 'How to Nail Your Next Interview?', 'how-to-nail-your-next-interview', '<div>\r\n<div>Below are seven lessons every person should keep in mind before his or her next job interview:</div>\r\n</div>', NULL, NULL, 1, 1, NULL, '2022-04-26 02:06:01', '2022-04-26 02:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `booking_priorities`
--

CREATE TABLE `booking_priorities` (
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
-- Dumping data for table `booking_priorities`
--

INSERT INTO `booking_priorities` (`id`, `created_by`, `title`, `slug`, `color`, `credits`, `type`, `price`, `currency_code`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Priority Booking', 'priority-booking', '#e64757', '1899', 'uno', 18.90, 'USD', 'Voluptatem Dolores', 1, NULL, '2022-03-31 09:04:41', '2022-05-12 07:50:31'),
(2, 1, 'Standard Booking', 'standard-booking', '#3b8712', '1599', 'duo', 31.99, 'USD', 'Lorem ipsum', 1, NULL, '2022-03-31 09:33:34', '2022-05-12 07:50:08'),
(3, 1, 'Tentative Booking', 'tentative-booking', '#9f9d9d', '1299', 'trio', 10.00, 'USD', 'Lorem ipsum', 1, NULL, '2022-03-31 09:38:20', '2022-05-12 07:49:52'),
(4, 1, 'Aut saepe perspiciat', 'aut-saepe-perspiciat', '#7ab731', '26', 'uno', 523.00, '233', 'Eiusmod ratione qui', 1, '2022-05-09 08:33:42', '2022-05-09 03:33:25', '2022-05-09 03:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `book_interviews`
--

CREATE TABLE `book_interviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meeting_id` bigint(20) NOT NULL,
  `interviewer_id` bigint(20) NOT NULL,
  `candidate_id` bigint(20) NOT NULL,
  `parent_interview_type_id` bigint(20) DEFAULT NULL,
  `child_interview_type_id` bigint(20) DEFAULT NULL,
  `booking_type_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credits` float DEFAULT NULL,
  `date` date NOT NULL,
  `slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` datetime NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'minutes',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'metting password',
  `start_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=confirmed, 3:rejected, 4=completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_interviews`
--

INSERT INTO `book_interviews` (`id`, `meeting_id`, `interviewer_id`, `candidate_id`, `parent_interview_type_id`, `child_interview_type_id`, `booking_type_slug`, `credits`, `date`, `slot`, `start_at`, `duration`, `password`, `start_url`, `join_url`, `review`, `status`, `created_at`, `updated_at`) VALUES
(1, 89690070398, 7, 5, NULL, NULL, 'standard-booking', 1599, '2022-06-01', '12:30', '2022-01-06 12:30:00', 30, '12345', 'https://us05web.zoom.us/s/89690070398?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IllkVzdqRFJZU2dlcFpSTkhpbDM4eVEiLCJpc3MiOiJ3ZWIiLCJzayI6IjY5NzYyNzE5ODE3NTU0Mzk0OTIiLCJzdHkiOjEwMCwid2NkIjoidXMwNSIsImNsdCI6MCwibW51bSI6Ijg5NjkwMDcwMzk4IiwiZXhwIjoxNjU0MDg2MTk0LCJpYXQiOjE2NTQwNzg5OTQsImFpZCI6ImdDMXBKbE5aUTNteEVha1FWTVpOdWciLCJjaWQiOiIifQ.bFsYPNOI7ZsZvPH7BaalmK4jB7hQHkLB_21QDZ7XIvI', 'https://us05web.zoom.us/j/89690070398?pwd=L09QU1hkRFp1UDd3MVJ3QnhHZndpUT09', NULL, 0, '2022-06-01 05:23:13', '2022-06-01 05:23:13'),
(2, 87319067046, 7, 5, NULL, NULL, 'standard-booking', 1599, '2022-06-01', '12:00', '2022-01-06 12:00:00', 30, '12345', 'https://us05web.zoom.us/s/87319067046?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IllkVzdqRFJZU2dlcFpSTkhpbDM4eVEiLCJpc3MiOiJ3ZWIiLCJzayI6IjY5NzYyNzE5ODE3NTU0Mzk0OTIiLCJzdHkiOjEwMCwid2NkIjoidXMwNSIsImNsdCI6MCwibW51bSI6Ijg3MzE5MDY3MDQ2IiwiZXhwIjoxNjU0MDg2MzI0LCJpYXQiOjE2NTQwNzkxMjQsImFpZCI6ImdDMXBKbE5aUTNteEVha1FWTVpOdWciLCJjaWQiOiIifQ.efQvoakYuhc6jSVZFyYgGtAxmeaHoPmpgC_ayDQTBD8', 'https://us05web.zoom.us/j/87319067046?pwd=ai80cnQyTzJOaFFPSkozcGRUeSt3QT09', NULL, 0, '2022-06-01 05:25:24', '2022-06-01 05:25:24'),
(3, 81354282987, 7, 5, NULL, NULL, 'standard-booking', 1599, '2022-06-01', '12:30', '2022-01-06 12:30:00', 30, '12345', 'https://us05web.zoom.us/s/81354282987?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IllkVzdqRFJZU2dlcFpSTkhpbDM4eVEiLCJpc3MiOiJ3ZWIiLCJzayI6IjY5NzYyNzE5ODE3NTU0Mzk0OTIiLCJzdHkiOjEwMCwid2NkIjoidXMwNSIsImNsdCI6MCwibW51bSI6IjgxMzU0MjgyOTg3IiwiZXhwIjoxNjU0MDg2NDIyLCJpYXQiOjE2NTQwNzkyMjIsImFpZCI6ImdDMXBKbE5aUTNteEVha1FWTVpOdWciLCJjaWQiOiIifQ.v5dS6WbpF33zocbnIxzuhk56BpCsxXBhyfjLa0HwWZE', 'https://us05web.zoom.us/j/81354282987?pwd=a0o2M09NdjQwTEJoNlp2R1BxTGlldz09', NULL, 4, '2022-06-01 05:27:03', '2022-06-01 08:00:01'),
(4, 88648565133, 7, 5, 1, 5, 'standard-booking', 1599, '2022-06-24', '11:00', '2022-06-24 11:00:00', 30, '12345', 'https://us05web.zoom.us/s/88648565133?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IllkVzdqRFJZU2dlcFpSTkhpbDM4eVEiLCJpc3MiOiJ3ZWIiLCJzayI6IjY5NzYyNzE5ODE3NTU0Mzk0OTIiLCJzdHkiOjEwMCwid2NkIjoidXMwNSIsImNsdCI6MCwibW51bSI6Ijg4NjQ4NTY1MTMzIiwiZXhwIjoxNjU2MDg0NjQ2LCJpYXQiOjE2NTYwNzc0NDYsImFpZCI6ImdDMXBKbE5aUTNteEVha1FWTVpOdWciLCJjaWQiOiIifQ.6UYW1seVXCkDSb4IJRdcDsD3A5Z6QrI1PjqAoDa-OBI', 'https://us05web.zoom.us/j/88648565133?pwd=dmpaSzY4OEh3elhUZnREVnNRSG90QT09', NULL, 0, '2022-06-24 08:30:46', '2022-06-24 08:30:46'),
(5, 87550439126, 7, 5, 1, 5, 'standard-booking', 1599, '2022-06-24', '11:30', '2022-06-24 11:30:00', 30, '12345', 'https://us05web.zoom.us/s/87550439126?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IllkVzdqRFJZU2dlcFpSTkhpbDM4eVEiLCJpc3MiOiJ3ZWIiLCJzayI6IjY5NzYyNzE5ODE3NTU0Mzk0OTIiLCJzdHkiOjEwMCwid2NkIjoidXMwNSIsImNsdCI6MCwibW51bSI6Ijg3NTUwNDM5MTI2IiwiZXhwIjoxNjU2MDg0Nzk4LCJpYXQiOjE2NTYwNzc1OTgsImFpZCI6ImdDMXBKbE5aUTNteEVha1FWTVpOdWciLCJjaWQiOiIifQ.N9RkYnajiMIITj5ds4UVbfCpncflnFfM_eFh4ARs_4k', 'https://us05web.zoom.us/j/87550439126?pwd=c2VXbzVRU2JGRXZadi9BSnBRcExQdz09', NULL, 0, '2022-06-24 08:33:18', '2022-06-24 08:33:18'),
(6, 82593673088, 7, 5, 1, 5, 'standard-booking', 1599, '2022-06-24', '12:00', '2022-06-24 12:00:00', 30, '12345', 'https://us05web.zoom.us/s/82593673088?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IllkVzdqRFJZU2dlcFpSTkhpbDM4eVEiLCJpc3MiOiJ3ZWIiLCJzayI6IjY5NzYyNzE5ODE3NTU0Mzk0OTIiLCJzdHkiOjEwMCwid2NkIjoidXMwNSIsImNsdCI6MCwibW51bSI6IjgyNTkzNjczMDg4IiwiZXhwIjoxNjU2MDg0ODc2LCJpYXQiOjE2NTYwNzc2NzYsImFpZCI6ImdDMXBKbE5aUTNteEVha1FWTVpOdWciLCJjaWQiOiIifQ.db8dNL1o6NhtPX9YNq5EHg9057BTrBLUaFD18gwapBk', 'https://us05web.zoom.us/j/82593673088?pwd=akNkZEFXUmdKdXcrR05nM0VWQ2tqdz09', NULL, 0, '2022-06-24 08:34:36', '2022-06-24 08:34:36'),
(7, 88005171340, 7, 5, 1, 5, 'standard-booking', 1599, '2022-06-24', '12:30', '2022-06-24 12:30:00', 30, '12345', 'https://us05web.zoom.us/s/88005171340?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IllkVzdqRFJZU2dlcFpSTkhpbDM4eVEiLCJpc3MiOiJ3ZWIiLCJzayI6IjY5NzYyNzE5ODE3NTU0Mzk0OTIiLCJzdHkiOjEwMCwid2NkIjoidXMwNSIsImNsdCI6MCwibW51bSI6Ijg4MDA1MTcxMzQwIiwiZXhwIjoxNjU2MDg0OTEyLCJpYXQiOjE2NTYwNzc3MTIsImFpZCI6ImdDMXBKbE5aUTNteEVha1FWTVpOdWciLCJjaWQiOiIifQ.m2aNXIxee-fYN4QJ5y6XQEn5NiPFjTURqiVslpo82lo', 'https://us05web.zoom.us/j/88005171340?pwd=T0oySW5lOXFTamI0ekRtNDBTUmxMUT09', NULL, 0, '2022-06-24 08:35:12', '2022-06-24 08:35:12'),
(8, 85344388503, 7, 5, 1, 5, 'standard-booking', 1599, '2022-06-24', '17:30', '2022-06-24 17:30:00', 30, '12345', 'https://us05web.zoom.us/s/85344388503?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IllkVzdqRFJZU2dlcFpSTkhpbDM4eVEiLCJpc3MiOiJ3ZWIiLCJzayI6IjY5NzYyNzE5ODE3NTU0Mzk0OTIiLCJzdHkiOjEwMCwid2NkIjoidXMwNSIsImNsdCI6MCwibW51bSI6Ijg1MzQ0Mzg4NTAzIiwiZXhwIjoxNjU2MDg4MDM1LCJpYXQiOjE2NTYwODA4MzUsImFpZCI6ImdDMXBKbE5aUTNteEVha1FWTVpOdWciLCJjaWQiOiIifQ.7_EKwporQXPRkfQTIxy_GWrWkiFrYmfhQ0ISXfzGPRU', 'https://us05web.zoom.us/j/85344388503?pwd=TG1HVURBblhvb3lQVEMvdTdGQ2RMQT09', NULL, 0, '2022-06-24 09:27:14', '2022-06-24 09:27:14'),
(9, 89299481122, 7, 43, 1, 5, 'standard-booking', 1599, '2022-07-06', '11:30', '2022-07-06 11:30:00', 30, '12345', 'https://us05web.zoom.us/s/89299481122?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IllkVzdqRFJZU2dlcFpSTkhpbDM4eVEiLCJpc3MiOiJ3ZWIiLCJzayI6IjY5NzYyNzE5ODE3NTU0Mzk0OTIiLCJzdHkiOjEwMCwid2NkIjoidXMwNSIsImNsdCI6MCwibW51bSI6Ijg5Mjk5NDgxMTIyIiwiZXhwIjoxNjU3MTE5MzQ1LCJpYXQiOjE2NTcxMTIxNDUsImFpZCI6ImdDMXBKbE5aUTNteEVha1FWTVpOdWciLCJjaWQiOiIifQ.a7xNpoFfTJWcvQoNBEknVmqpsURRuWG7uUjiXI11br8', 'https://us05web.zoom.us/j/89299481122?pwd=cy9TUExab1A2SzBVUVVtcWJUZ0lMQT09', NULL, 1, '2022-07-06 16:55:45', '2022-07-06 17:11:26'),
(10, 89165184716, 7, 43, 2, 8, 'standard-booking', 1599, '2022-07-07', '11:00', '2022-07-07 11:00:00', 30, '12345', 'https://us05web.zoom.us/s/89165184716?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IllkVzdqRFJZU2dlcFpSTkhpbDM4eVEiLCJpc3MiOiJ3ZWIiLCJzayI6IjY5NzYyNzE5ODE3NTU0Mzk0OTIiLCJzdHkiOjEwMCwid2NkIjoidXMwNSIsImNsdCI6MCwibW51bSI6Ijg5MTY1MTg0NzE2IiwiZXhwIjoxNjU3MTc1NjA5LCJpYXQiOjE2NTcxNjg0MDksImFpZCI6ImdDMXBKbE5aUTNteEVha1FWTVpOdWciLCJjaWQiOiIifQ.VrkLPcdfjTAXP-T937O4VhumwaLgTQ-LcNiN8IMCyT0', 'https://us05web.zoom.us/j/89165184716?pwd=Q09nM2ZXMVRVN2ZCeUhLY2FuUUMxdz09', NULL, 1, '2022-07-07 08:33:29', '2022-07-07 08:34:23');

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
(1, 1, 'Career Management', 'career-management', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 1, NULL, NULL, NULL, NULL, '2022-04-26 02:01:36', '2022-04-26 02:01:36'),
(2, 1, 'Job', 'job', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five', 1, NULL, NULL, NULL, NULL, '2022-04-26 02:02:14', '2022-04-26 02:03:21'),
(3, 1, 'Technology', 'technology', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five', 1, NULL, NULL, NULL, NULL, '2022-04-26 02:04:00', '2022-04-26 02:04:00');

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
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` bigint(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `max_usages` int(11) NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `created_by`, `name`, `slug`, `type`, `coupon_code`, `discount`, `start_date`, `end_date`, `max_usages`, `banner`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, 'Levi Mayo', 'levi-mayo', 'fix', 'n3XiOY', 4, '2022-05-13', '2022-05-18', 1, '13-05-2022-141229.png', 'Porro qui et do nece', 1, NULL, '2022-05-13 09:12:29', '2022-05-13 09:12:40'),
(3, 1, 'Gil Branch', 'gil-branch', 'percent', 'Qq7L5A', 10, '2022-05-13', '2022-05-18', 1, NULL, 'Sit quam animi com', 1, NULL, '2022-05-13 09:14:33', '2022-05-13 09:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_usages`
--

CREATE TABLE `coupon_usages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) NOT NULL,
  `coupon_id` bigint(20) NOT NULL,
  `usages` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_usages`
--

INSERT INTO `coupon_usages` (`id`, `candidate_id`, `coupon_id`, `usages`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 1, '2022-05-16 10:00:34', '2022-05-16 10:00:34');

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
(9, 7, 'Mid Level Developer', 'Company 2', '2020-09-03', '2022-10-03', 2.00, '2022-03-29 08:23:12', '2022-03-29 08:23:12'),
(10, 48, 'asd', 'asdas', '1899-11-01', '2022-07-16', NULL, '2022-07-06 17:44:39', '2022-07-06 17:44:39');

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
(2, 7, '6.4', 'My summary', 'Laravel framework of php.\r\nmysql\r\ncss3', '2022-03-29 08:21:24', '2022-03-29 08:21:24'),
(3, 48, '0', 'asdasd', 'asdasda', '2022-07-06 17:44:39', '2022-07-06 17:44:39');

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
-- Table structure for table `interviewer_interview_types`
--

CREATE TABLE `interviewer_interview_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `interviewer_id` bigint(20) NOT NULL,
  `parent_interview_type_id` bigint(20) NOT NULL,
  `child__interview_type_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interviewer_interview_types`
--

INSERT INTO `interviewer_interview_types` (`id`, `interviewer_id`, `parent_interview_type_id`, `child__interview_type_id`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 5, '2022-06-22 10:13:17', '2022-06-22 10:13:17'),
(2, 7, 1, 6, '2022-06-22 10:13:17', '2022-06-22 10:13:17'),
(3, 7, 1, 5, '2022-07-06 16:52:24', '2022-07-06 16:52:24'),
(4, 7, 2, 8, '2022-07-07 08:31:31', '2022-07-07 08:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `interviewer_wallets`
--

CREATE TABLE `interviewer_wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `interviewer_id` bigint(20) NOT NULL,
  `booking_id` bigint(20) NOT NULL,
  `last_balance_credits` bigint(20) NOT NULL DEFAULT 0,
  `total_credits` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interviewer_wallets`
--

INSERT INTO `interviewer_wallets` (`id`, `interviewer_id`, `booking_id`, `last_balance_credits`, `total_credits`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 3, 19188, 20787, 1, '2022-06-01 06:42:55', '2022-06-01 08:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `interview_categories`
--

CREATE TABLE `interview_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interview_categories`
--

INSERT INTO `interview_categories` (`id`, `created_by`, `parent_id`, `name`, `slug`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Technical', 'technical', 'Lorem ipsum', 1, NULL, '2022-06-20 04:02:51', '2022-06-20 04:02:51'),
(2, 1, NULL, 'Management', 'management', 'Lorem ipsum', 1, NULL, '2022-06-20 04:03:10', '2022-06-20 04:03:10'),
(3, 1, NULL, 'Soft skill', 'soft-skill', 'Lorem ipsum', 1, NULL, '2022-06-20 04:03:30', '2022-06-20 04:03:30'),
(4, 1, NULL, 'Others', 'others', 'Lorem ipsum', 1, NULL, '2022-06-20 04:03:47', '2022-06-20 04:03:47'),
(5, 1, 1, 'Windows', 'windows', 'Lorem ipsum', 1, NULL, '2022-06-20 04:09:37', '2022-06-20 04:14:37'),
(6, 1, 1, 'Linux', 'linux', 'Lorem ipsum', 1, NULL, '2022-06-20 04:33:26', '2022-06-20 04:33:26'),
(7, 1, 1, 'database', 'database', 'Lorem ipsum', 1, NULL, '2022-06-20 04:33:44', '2022-06-20 04:33:44'),
(8, 1, 2, 'Project Mangement', 'project-mangement', 'Lorem ipsum', 1, NULL, '2022-06-20 04:34:18', '2022-06-20 04:34:18'),
(9, 1, 2, 'Leadership', 'leadership', 'Lorem ipsum', 1, NULL, '2022-06-20 04:34:33', '2022-06-20 04:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `interview_types`
--

CREATE TABLE `interview_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interview_types`
--

INSERT INTO `interview_types` (`id`, `created_by`, `parent_id`, `name`, `slug`, `description`, `deleted_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Technical', 'technical', 'Lorem ipsum', NULL, 1, '2022-06-20 05:52:43', '2022-06-20 05:52:43'),
(2, 1, NULL, 'Management', 'management', 'Lorem ipsum', NULL, 1, '2022-06-20 05:53:01', '2022-06-20 05:53:01'),
(3, 1, NULL, 'Soft skill', 'soft-skill', 'Lorem ipusm', NULL, 1, '2022-06-20 05:53:23', '2022-06-20 05:53:23'),
(4, 1, NULL, 'Others', 'others', 'Lorem ipsum', NULL, 1, '2022-06-20 05:53:39', '2022-06-20 05:53:39'),
(5, 1, 1, 'Windows', 'windows', 'Lorem ipusm', NULL, 1, '2022-06-20 05:53:54', '2022-06-20 05:53:54'),
(6, 1, 1, 'Linux', 'linux', 'Lorem ipsum', NULL, 1, '2022-06-20 05:54:07', '2022-06-20 05:54:07'),
(7, 1, 1, 'Database', 'database', 'Lorem ipsum', NULL, 1, '2022-06-20 05:54:26', '2022-06-20 05:54:26'),
(8, 1, 2, 'Project Mangement', 'project-mangement', 'Lorem ipsum', NULL, 1, '2022-06-20 05:54:50', '2022-06-20 05:54:50'),
(9, 1, 2, 'Leadership', 'leadership', 'Lorem ipsum', NULL, 1, '2022-06-20 05:55:00', '2022-06-20 05:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `invited_users`
--

CREATE TABLE `invited_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invite_id` bigint(20) NOT NULL,
  `invited_user_token` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invited_users`
--

INSERT INTO `invited_users` (`id`, `invite_id`, `invited_user_token`, `email`, `registered`, `created_at`, `updated_at`) VALUES
(1, 1, 4534, 'testweb@mailinator.com', 1, '2022-05-17 10:28:50', '2022-05-17 10:28:50'),
(2, 1, 5355, 'ligiqikuva@mailinator.com', 1, '2022-05-18 03:56:16', '2022-05-18 03:56:16'),
(3, 1, 1025, 'chandamar725@gmail.com', 1, '2022-05-18 04:13:50', '2022-05-18 04:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `invites`
--

CREATE TABLE `invites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) NOT NULL,
  `referral_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invites`
--

INSERT INTO `invites` (`id`, `candidate_id`, `referral_id`, `created_at`, `updated_at`) VALUES
(1, 6, '2', '2022-05-17 10:28:50', '2022-05-17 10:28:50');

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
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booked_interview_id` bigint(20) NOT NULL,
  `interviewer_id` bigint(20) NOT NULL COMMENT 'intervewer',
  `candidate_id` bigint(20) NOT NULL COMMENT 'candidate id',
  `credits` double(8,2) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'charged or returned credits',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `booked_interview_id`, `interviewer_id`, `candidate_id`, `credits`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 7, 5, 1599.00, 'charged', 'Charged credits from candidate wallet.', '2022-06-01 05:27:03', '2022-06-01 05:27:03'),
(2, 3, 7, 7, 1599.00, 'returned', 'Return credits due to rejection.', '2022-06-01 07:07:46', '2022-06-01 07:07:46'),
(3, 3, 7, 7, 1599.00, 'returned', 'Return credits due to rejection.', '2022-06-01 07:08:38', '2022-06-01 07:08:38'),
(4, 3, 7, 7, 1599.00, 'returned', 'Return credits due to rejection.', '2022-06-01 07:09:16', '2022-06-01 07:09:16'),
(5, 3, 7, 7, 1599.00, 'returned', 'Return credits due to rejection.', '2022-06-01 08:00:01', '2022-06-01 08:00:01'),
(6, 4, 7, 5, 1599.00, 'charged', 'Charged credits from candidate wallet.', '2022-06-24 08:30:46', '2022-06-24 08:30:46'),
(7, 5, 7, 5, 1599.00, 'charged', 'Charged credits from candidate wallet.', '2022-06-24 08:33:18', '2022-06-24 08:33:18'),
(8, 6, 7, 5, 1599.00, 'charged', 'Charged credits from candidate wallet.', '2022-06-24 08:34:36', '2022-06-24 08:34:36'),
(9, 7, 7, 5, 1599.00, 'charged', 'Charged credits from candidate wallet.', '2022-06-24 08:35:12', '2022-06-24 08:35:12'),
(10, 8, 7, 5, 1599.00, 'charged', 'Charged credits from candidate wallet.', '2022-06-24 09:27:14', '2022-06-24 09:27:14'),
(11, 9, 7, 43, 1599.00, 'charged', 'Charged credits from candidate wallet.', '2022-07-06 16:55:45', '2022-07-06 16:55:45'),
(12, 10, 7, 43, 1599.00, 'charged', 'Charged credits from candidate wallet.', '2022-07-07 08:33:29', '2022-07-07 08:33:29');

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
(75, '2022_03_31_113222_create_booking_priorities_table', 47),
(87, '2022_03_31_144514_create_book_interviews_table', 56),
(96, '2022_05_13_105809_create_coupons_table', 62),
(100, '2022_05_13_092451_payment_logs', 65),
(102, '2022_05_12_125806_create_payments_table', 66),
(103, '2022_05_12_130148_create_wallets_table', 67),
(104, '2022_05_13_105833_create_coupon_usages_table', 68),
(107, '2022_05_17_082929_create_referrals_table', 69),
(113, '2022_05_17_083604_create_invites_table', 74),
(117, '2022_05_17_084617_create_invited_users_table', 75),
(118, '2022_05_20_145309_create_interviewer_wallets_table', 76),
(121, '2022_05_25_080100_create_logs_table', 77),
(123, '2022_05_26_103941_create_read_notifications_table', 79),
(124, '2022_05_26_103403_create_notifications_table', 80),
(127, '2022_06_20_082505_create_interview_categories_table', 81),
(130, '2022_04_07_072048_create_interview_types_table', 82),
(131, '2022_04_05_101251_create_available_slot_dates_table', 83),
(135, '2022_06_22_143536_create_interviewer_interview_types_table', 85),
(136, '2022_04_05_101315_create_available_slots_table', 86);

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
(3, 'App\\Models\\User', 48),
(3, 'App\\Models\\User', 50),
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
(6, 'App\\Models\\User', 34),
(6, 'App\\Models\\User', 37),
(6, 'App\\Models\\User', 38),
(6, 'App\\Models\\User', 39),
(6, 'App\\Models\\User', 40),
(6, 'App\\Models\\User', 41),
(6, 'App\\Models\\User', 42),
(6, 'App\\Models\\User', 43),
(6, 'App\\Models\\User', 44),
(6, 'App\\Models\\User', 45),
(6, 'App\\Models\\User', 46),
(6, 'App\\Models\\User', 47),
(6, 'App\\Models\\User', 49);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `notify_id` bigint(20) NOT NULL,
  `notify_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'inserted, updated',
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `created_by`, `notify_id`, `notify_type`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'blog', 'Published new blog.', '2022-05-26 11:38:47', '2022-05-26 11:38:47');

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
(5, 1, 'Why Choose Us', 'why-choose-us', '<p>describe here</p>', NULL, NULL, NULL, 1, '2022-04-08 08:28:43', '2022-03-21 02:44:58', '2022-04-08 03:28:43'),
(6, 1, 'Footer', 'footer', '<p>Description</p>', NULL, NULL, NULL, 1, NULL, '2022-03-21 06:20:34', '2022-03-21 06:20:34'),
(7, 1, 'Header', 'header', '<p>Describe here</p>', NULL, NULL, NULL, 1, NULL, '2022-03-21 06:37:20', '2022-03-21 06:37:20'),
(8, 1, 'testedd', 'testedd', NULL, 'teste', 'adsf', 'asd', 1, '2022-04-08 08:20:10', '2022-04-08 03:18:29', '2022-04-08 03:20:10'),
(9, 1, 'Interview Terms', 'interview-terms', '<p>Lorem ipsum&nbsp;</p>', NULL, NULL, NULL, 1, NULL, '2022-05-12 09:52:46', '2022-05-12 09:52:46');

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
(1, 'home', '_token', 'M7J1SE9QPLm0Q6vau3sqsWMsk0lru95rhFeD7Ecv', '2022-03-15 10:52:44', '2022-05-26 04:26:14'),
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
(65, 'about', '_token', 'iNM3xlHIAwzUkpZPbVC9GgbCr7tphhOmegXjd18i', '2022-03-16 02:43:59', '2022-06-20 04:48:05'),
(66, 'about', 'parent_slug', 'about', '2022-03-16 02:43:59', '2022-03-16 02:43:59'),
(67, 'about', 'mt_about', 'Quibusdam omnis aper updated', '2022-03-16 02:43:59', '2022-03-16 03:03:16'),
(68, 'about', 'mk_about', 'Et excepteur aut quo updated', '2022-03-16 02:43:59', '2022-03-16 03:03:16'),
(69, 'about', 'md_about', 'Corporis veritatis o updated', '2022-03-16 02:43:59', '2022-03-16 03:03:16'),
(70, 'about', 'about_heading', 'ABOUT MOCK MY INTERVIEW TM', '2022-03-16 02:43:59', '2022-03-16 03:22:52'),
(71, 'about', 'about_content', '<div class=\"col-lg-6 pt-4 pt-lg-0 content\">\r\n<p class=\"fst-italic\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n<ul>\r\n<li>&nbsp;Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>\r\n<li>&nbsp;Duis aute irure dolor in reprehenderit in voluptate velit</li>\r\n<li>&nbsp;Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda</li>\r\n</ul>\r\n<p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n</div>\r\n<div class=\"col-lg-6 pt-4 pt-lg-0 content\">\r\n<p class=\"fst-italic\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n<ul>\r\n<li>&nbsp;Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>\r\n<li>&nbsp;Duis aute irure dolor in reprehenderit in voluptate velit</li>\r\n<li>&nbsp;Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda</li>\r\n</ul>\r\n<p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n</div>', '2022-03-16 02:43:59', '2022-05-26 04:41:47'),
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
(122, 'header', '_token', 'M7J1SE9QPLm0Q6vau3sqsWMsk0lru95rhFeD7Ecv', '2022-03-21 06:53:09', '2022-05-26 04:55:52'),
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
(146, 'header', 'weekends_evening_to_time', '23:00', '2022-03-31 10:54:25', '2022-03-31 10:54:25'),
(147, 'interview-terms', '_token', 'YUF2p1ZOLae8A2920LS9lWI6E4283vAnGfqdw9hX', '2022-05-12 10:02:02', '2022-05-20 09:49:07'),
(148, 'interview-terms', 'parent_slug', 'interview-terms', '2022-05-12 10:02:02', '2022-05-12 10:02:02'),
(149, 'interview-terms', 'terms', '<ul class=\"list-styled\">\r\n<li>Number of Regular Interviews: 3</li>\r\n<li>Standard Waiting Period: 48 Hours</li>\r\n<li>Duration of Each Interview: 30 minutes</li>\r\n<li>Expert&rsquo;s Feedback: Yes</li>\r\n</ul>', '2022-05-12 10:02:02', '2022-05-12 10:02:02'),
(150, 'interview-terms', 'form_contact', NULL, '2022-05-12 10:02:02', '2022-05-12 10:02:02'),
(151, 'interview-terms', 'fee_percent', '20', '2022-05-20 09:49:07', '2022-05-20 09:49:07'),
(152, 'interview-terms', 'interview_terms', '<ul class=\"list-styled\">\r\n<li>Number of Regular Interviews: 3</li>\r\n<li>Standard Waiting Period: 48 Hours</li>\r\n<li>Duration of Each Interview: 30 minutes</li>\r\n<li>Expert&rsquo;s Feedback: Yes</li>\r\n</ul>', '2022-05-20 09:49:07', '2022-05-20 09:49:07'),
(153, 'home', 'home_left_heading', 'Compare Interviewers including their fees', '2022-05-26 04:26:14', '2022-05-26 04:26:14'),
(154, 'home', 'home_left_description', 'leading comparison service and the only place you can compare Interviewers/candidates fees side-by-side.', '2022-05-26 04:26:14', '2022-05-26 04:26:14'),
(155, 'home', 'home_left_bottom_label', 'Be confident. Compare Interviewers.', '2022-05-26 04:26:14', '2022-05-26 04:26:14'),
(156, 'home', 'home_right_title', 'Virtual Face-to-Face Mock Interviews with industry Experts', '2022-05-26 04:26:14', '2022-05-26 04:26:14'),
(157, 'home', 'home_right_sub_title', 'Live | On-demand | Anywhere', '2022-05-26 04:26:14', '2022-05-26 04:26:14'),
(158, 'home', 'home_right_video', 'https://www.youtube.com/watch?v=jDDaplaOz7Q', '2022-05-26 04:26:14', '2022-05-26 04:26:14'),
(159, 'home', 'home_section', '1', '2022-05-26 04:26:14', '2022-05-26 04:26:14'),
(160, 'home', 'home_background_image', '26052022092614.jpg', '2022-05-26 04:26:14', '2022-05-26 04:26:14'),
(161, 'about', 'about_left_content', '<p><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</em></p>\r\n<ul style=\"list-style-type: circle;\">\r\n<li>Ullamco laboris nisi ut aliquip ex ea commodo consequat,</li>\r\n<li>&nbsp;Duis aute irure dolor in reprehenderit in voluptate velit</li>\r\n<li>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda</li>\r\n</ul>\r\n<p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', '2022-05-26 04:49:20', '2022-06-20 04:52:11'),
(162, 'about', 'right_left_content', '<p><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</em></p>\r\n<ul style=\"list-style-type: circle;\">\r\n<li>&nbsp;Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>\r\n<li>&nbsp;Duis aute irure dolor in reprehenderit in voluptate velit</li>\r\n<li><em>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda</em></li>\r\n</ul>\r\n<p><em>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</em></p>', '2022-05-26 04:49:20', '2022-05-26 04:49:20'),
(163, 'header', 'header_currency', 'Euro', '2022-05-26 04:55:52', '2022-05-26 04:55:52'),
(164, 'header', 'header_currency_symbol', '€', '2022-05-26 04:55:52', '2022-05-26 04:58:24');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) NOT NULL,
  `payment_log_id` bigint(20) NOT NULL,
  `priority_id` bigint(20) NOT NULL,
  `coupon_id` bigint(20) DEFAULT NULL,
  `sub_total` double(8,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `grand_total` double(8,2) DEFAULT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=confirmed, 2=rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `candidate_id`, `payment_log_id`, `priority_id`, `coupon_id`, `sub_total`, `discount`, `grand_total`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1, 2, 18.90, 4.00, 14.90, '2022-05-16', 0, '2022-05-16 10:00:34', '2022-05-16 10:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `payment_logs`
--

CREATE TABLE `payment_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `name_on_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_logs`
--

INSERT INTO `payment_logs` (`id`, `amount`, `name_on_card`, `response_code`, `transaction_id`, `auth_id`, `message_code`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 14.00, 'Simon', '1', '40092419633', 'Q3TBVV', '1', 1, '2022-05-16 10:00:34', '2022-05-16 10:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `permission`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', 'list', NULL, '2022-03-01 03:28:29', '2022-03-01 03:28:29'),
(2, 'role-create', 'web', 'create', NULL, '2022-03-01 03:28:29', '2022-03-01 03:28:29'),
(3, 'role-edit', 'web', 'edit', NULL, '2022-03-01 03:28:29', '2022-03-01 03:28:29'),
(4, 'role-delete', 'web', 'delete', NULL, '2022-03-01 03:28:29', '2022-03-01 03:28:29'),
(10, 'permission-list', 'web', 'list', NULL, '2022-03-08 08:15:44', '2022-03-08 08:15:44'),
(11, 'permission-create', 'web', 'create', NULL, '2022-03-08 08:15:44', '2022-03-08 08:15:44'),
(12, 'permission-edit', 'web', 'edit', NULL, '2022-03-08 08:15:44', '2022-03-08 08:15:44'),
(14, 'permission-delete', 'web', 'delete', NULL, '2022-03-08 08:16:56', '2022-03-08 08:16:56'),
(15, 'user-list', 'web', 'list', NULL, '2022-03-08 08:23:13', '2022-03-08 08:23:13'),
(16, 'user-create', 'web', 'create', NULL, '2022-03-08 08:23:13', '2022-03-08 08:23:13'),
(17, 'user-edit', 'web', 'edit', NULL, '2022-03-08 08:23:13', '2022-03-08 08:23:13'),
(18, 'user-delete', 'web', 'delete', NULL, '2022-03-08 08:23:13', '2022-03-08 08:23:13'),
(27, 'slider-list', 'web', 'list', NULL, '2022-03-08 08:24:32', '2022-03-08 08:24:32'),
(28, 'slider-create', 'web', 'create', NULL, '2022-03-08 08:24:32', '2022-03-08 08:24:32'),
(29, 'slider-edit', 'web', 'edit', NULL, '2022-03-08 08:24:32', '2022-03-08 08:24:32'),
(30, 'slider-delete', 'web', 'delete', NULL, '2022-03-08 08:24:32', '2022-03-08 08:24:32'),
(31, 'service-list', 'web', 'list', NULL, '2022-03-08 08:25:03', '2022-03-08 08:25:03'),
(32, 'service-create', 'web', 'create', NULL, '2022-03-08 08:25:03', '2022-03-08 08:25:03'),
(33, 'service-edit', 'web', 'edit', NULL, '2022-03-08 08:25:03', '2022-03-08 08:25:03'),
(34, 'service-delete', 'web', 'delete', NULL, '2022-03-08 08:25:03', '2022-03-08 08:25:03'),
(35, 'testimonial-list', 'web', 'list', NULL, '2022-03-09 06:50:31', '2022-03-09 06:50:31'),
(36, 'testimonial-create', 'web', 'create', NULL, '2022-03-09 06:50:31', '2022-03-09 06:50:31'),
(37, 'testimonial-edit', 'web', 'edit', NULL, '2022-03-09 06:50:31', '2022-03-09 06:50:31'),
(38, 'testimonial-delete', 'web', 'delete', NULL, '2022-03-09 06:50:31', '2022-03-09 06:50:31'),
(39, 'why_choose-list', 'web', 'list', NULL, '2022-03-09 06:51:05', '2022-03-09 06:51:05'),
(40, 'why_choose-create', 'web', 'create', NULL, '2022-03-09 06:51:05', '2022-03-09 06:51:05'),
(41, 'why_choose-edit', 'web', 'edit', NULL, '2022-03-09 06:51:05', '2022-03-09 06:51:05'),
(42, 'why_choose-delete', 'web', 'delete', NULL, '2022-03-09 06:51:05', '2022-03-09 06:51:05'),
(43, 'social media-list', 'web', 'list', NULL, '2022-03-09 06:51:20', '2022-03-09 06:51:20'),
(44, 'social media-create', 'web', 'create', NULL, '2022-03-09 06:51:20', '2022-03-09 06:51:20'),
(45, 'social media-edit', 'web', 'edit', NULL, '2022-03-09 06:51:20', '2022-03-09 06:51:20'),
(46, 'social media-delete', 'web', 'delete', NULL, '2022-03-09 06:51:20', '2022-03-09 06:51:20'),
(47, 'setting-list', 'web', 'list', NULL, '2022-03-09 06:54:53', '2022-03-09 06:54:53'),
(48, 'setting-create', 'web', 'create', NULL, '2022-03-09 06:54:53', '2022-03-09 06:54:53'),
(49, 'setting-edit', 'web', 'edit', NULL, '2022-03-09 06:54:53', '2022-03-09 06:54:53'),
(50, 'setting-delete', 'web', 'delete', NULL, '2022-03-09 06:54:53', '2022-03-09 06:54:53'),
(51, 'page-list', 'web', 'list', NULL, '2022-03-09 06:56:33', '2022-03-09 06:56:33'),
(52, 'page-create', 'web', 'create', NULL, '2022-03-09 06:56:33', '2022-03-09 06:56:33'),
(54, 'page-delete', 'web', 'delete', NULL, '2022-03-09 06:56:33', '2022-03-09 06:56:33'),
(55, 'category-list', 'web', 'list', NULL, '2022-03-13 06:34:30', '2022-03-13 06:34:30'),
(56, 'category-create', 'web', 'create', NULL, '2022-03-13 06:34:30', '2022-03-13 06:34:30'),
(57, 'category-edit', 'web', 'edit', NULL, '2022-03-13 06:34:30', '2022-03-13 06:34:30'),
(58, 'category-delete', 'web', 'delete', NULL, '2022-03-13 06:34:30', '2022-03-13 06:34:30'),
(59, 'blog-list', 'web', 'list', NULL, '2022-03-13 06:54:38', '2022-03-13 06:54:38'),
(60, 'blog-create', 'web', 'create', NULL, '2022-03-13 06:54:38', '2022-03-13 06:54:38'),
(61, 'blog-edit', 'web', 'edit', NULL, '2022-03-13 06:54:38', '2022-03-13 06:54:38'),
(62, 'blog-delete', 'web', 'delete', NULL, '2022-03-13 06:54:38', '2022-03-13 06:54:38'),
(63, 'page-edit', 'web', 'edit', NULL, '2022-03-14 04:22:01', '2022-03-14 04:22:01'),
(64, 'advantage-list', 'web', 'list', NULL, '2022-03-16 03:55:46', '2022-03-16 03:55:46'),
(65, 'advantage-create', 'web', 'create', NULL, '2022-03-16 03:55:47', '2022-03-16 03:55:47'),
(66, 'advantage-edit', 'web', 'edit', NULL, '2022-03-16 03:55:47', '2022-03-16 03:55:47'),
(67, 'advantage-delete', 'web', 'delete', NULL, '2022-03-16 03:55:47', '2022-03-16 03:55:47'),
(68, 'work-process-list', 'web', 'list', NULL, '2022-03-16 04:59:15', '2022-03-16 04:59:15'),
(69, 'work-process-create', 'web', 'create', NULL, '2022-03-16 04:59:15', '2022-03-16 04:59:15'),
(70, 'work-process-edit', 'web', 'edit', NULL, '2022-03-16 04:59:15', '2022-03-16 04:59:15'),
(71, 'work-process-delete', 'web', 'delete', NULL, '2022-03-16 04:59:15', '2022-03-16 04:59:15'),
(72, 'package-list', 'web', 'list', NULL, '2022-03-16 05:35:41', '2022-03-16 05:35:41'),
(73, 'package-create', 'web', 'create', NULL, '2022-03-16 05:35:41', '2022-03-16 05:35:41'),
(74, 'package-edit', 'web', 'edit', NULL, '2022-03-16 05:35:41', '2022-03-16 05:35:41'),
(75, 'package-delete', 'web', 'delete', NULL, '2022-03-16 05:35:41', '2022-03-16 05:35:41'),
(76, 'team-list', 'web', 'list', NULL, '2022-03-16 07:27:03', '2022-03-16 07:27:03'),
(77, 'team-create', 'web', 'create', NULL, '2022-03-16 07:27:03', '2022-03-16 07:27:03'),
(78, 'team-edit', 'web', 'edit', NULL, '2022-03-16 07:27:03', '2022-03-16 07:27:03'),
(79, 'team-delete', 'web', 'delete', NULL, '2022-03-16 07:27:03', '2022-03-16 07:27:03'),
(80, 'help-list', 'web', 'list', NULL, '2022-03-16 09:16:57', '2022-03-16 09:16:57'),
(81, 'help-create', 'web', 'create', NULL, '2022-03-16 09:16:57', '2022-03-16 09:16:57'),
(82, 'help-edit', 'web', 'edit', NULL, '2022-03-16 09:16:57', '2022-03-16 09:16:57'),
(83, 'help-delete', 'web', 'delete', NULL, '2022-03-16 09:16:57', '2022-03-16 09:16:57'),
(84, 'schedule interview-list', 'web', 'list', NULL, '2022-03-22 10:39:14', '2022-03-22 10:39:14'),
(85, 'schedule interview-create', 'web', 'create', NULL, '2022-03-22 10:39:14', '2022-03-22 10:39:14'),
(86, 'report-list', 'web', 'list', NULL, '2022-03-22 10:39:29', '2022-03-22 10:39:29'),
(87, 'test setup-list', 'web', 'list', NULL, '2022-03-22 10:40:37', '2022-03-22 10:40:37'),
(88, 'notifications-list', 'web', 'list', NULL, '2022-03-22 10:40:59', '2022-03-22 10:40:59'),
(89, 'notifications-create', 'web', 'create', NULL, '2022-03-22 10:40:59', '2022-03-22 10:40:59'),
(90, 'notifications-edit', 'web', 'edit', NULL, '2022-03-22 10:40:59', '2022-03-22 10:40:59'),
(91, 'notifications-delete', 'web', 'delete', NULL, '2022-03-22 10:40:59', '2022-03-22 10:40:59'),
(92, 'book interview-list', 'web', 'list', NULL, '2022-03-22 10:41:13', '2022-04-04 05:48:56'),
(93, 'resources-list', 'web', 'list', NULL, '2022-03-22 10:41:24', '2022-03-22 10:41:24'),
(94, 'buy & credits-list', 'web', 'list', NULL, '2022-03-22 10:41:50', '2022-03-22 10:41:50'),
(95, 'buy & credits-create', 'web', 'create', NULL, '2022-03-22 10:41:50', '2022-03-22 10:41:50'),
(96, 'refer & earn-list', 'web', 'list', NULL, '2022-03-22 10:42:03', '2022-03-22 10:42:03'),
(97, 'refer & earn-create', 'web', 'create', NULL, '2022-03-22 10:42:03', '2022-03-22 10:42:03'),
(98, 'language-list', 'web', 'list', NULL, '2022-03-25 06:42:42', '2022-03-25 06:42:42'),
(99, 'language-create', 'web', 'create', NULL, '2022-03-25 06:42:42', '2022-03-25 06:42:42'),
(100, 'language-edit', 'web', 'edit', NULL, '2022-03-25 06:42:42', '2022-03-25 06:42:42'),
(101, 'language-delete', 'web', 'delete', NULL, '2022-03-25 06:42:42', '2022-03-25 06:42:42'),
(102, 'degree-list', 'web', 'list', NULL, '2022-03-25 06:42:51', '2022-03-25 06:42:51'),
(103, 'degree-create', 'web', 'create', NULL, '2022-03-25 06:42:51', '2022-03-25 06:42:51'),
(104, 'degree-edit', 'web', 'edit', NULL, '2022-03-25 06:42:51', '2022-03-25 06:42:51'),
(105, 'degree-delete', 'web', 'delete', NULL, '2022-03-25 06:42:51', '2022-03-25 06:42:51'),
(106, 'course-list', 'web', 'list', NULL, '2022-03-25 06:43:00', '2022-03-25 06:43:00'),
(107, 'course-create', 'web', 'create', NULL, '2022-03-25 06:43:00', '2022-03-25 06:43:00'),
(108, 'course-edit', 'web', 'edit', NULL, '2022-03-25 06:43:00', '2022-03-25 06:43:00'),
(109, 'course-delete', 'web', 'delete', NULL, '2022-03-25 06:43:00', '2022-03-25 06:43:00'),
(110, 'booking_type-list', 'web', 'list', NULL, '2022-03-31 08:01:28', '2022-03-31 08:01:28'),
(111, 'booking_type-create', 'web', 'create', NULL, '2022-03-31 08:01:28', '2022-03-31 08:01:28'),
(112, 'booking_type-edit', 'web', 'edit', NULL, '2022-03-31 08:01:28', '2022-03-31 08:01:28'),
(113, 'booking_type-delete', 'web', 'delete', NULL, '2022-03-31 08:01:28', '2022-03-31 08:01:28'),
(114, 'interview_type-list', 'web', 'list', NULL, '2022-04-07 02:32:34', '2022-04-07 02:34:18'),
(115, 'interview_type-create', 'web', 'create', NULL, '2022-04-07 02:32:34', '2022-04-07 02:34:07'),
(116, 'interview_type-edit', 'web', 'edit', NULL, '2022-04-07 02:32:34', '2022-04-07 02:33:58'),
(121, 'coupon-list', 'web', 'list', NULL, '2022-05-13 06:37:11', '2022-05-13 06:37:11'),
(122, 'coupon-create', 'web', 'create', NULL, '2022-05-13 06:37:11', '2022-05-13 06:37:11'),
(123, 'coupon-edit', 'web', 'edit', NULL, '2022-05-13 06:37:11', '2022-05-13 06:37:11'),
(124, 'coupon-delete', 'web', 'delete', NULL, '2022-05-13 06:37:11', '2022-05-13 06:37:11'),
(125, 'referral-list', 'web', 'list', NULL, '2022-05-17 04:05:02', '2022-05-17 04:05:02'),
(126, 'referral-create', 'web', 'create', NULL, '2022-05-17 04:05:02', '2022-05-17 04:05:02'),
(127, 'referral-edit', 'web', 'edit', NULL, '2022-05-17 04:05:02', '2022-05-17 04:05:02'),
(128, 'referral-delete', 'web', 'delete', NULL, '2022-05-17 04:05:02', '2022-05-17 04:05:02'),
(129, 'how_work-list', 'web', 'list', NULL, '2022-05-20 10:23:20', '2022-05-20 10:23:20'),
(130, 'how_work-create', 'web', 'create', NULL, '2022-05-20 10:23:20', '2022-05-20 10:23:20'),
(131, 'how_work-edit', 'web', 'edit', NULL, '2022-05-20 10:23:20', '2022-05-20 10:23:20'),
(132, 'how_work-delete', 'web', 'delete', NULL, '2022-05-20 10:23:20', '2022-05-20 10:23:20'),
(133, 'interview-category-list', 'web', 'list', NULL, '2022-06-20 03:32:16', '2022-06-20 03:32:16'),
(134, 'interview-category-create', 'web', 'create', NULL, '2022-06-20 03:32:16', '2022-06-20 03:32:16'),
(135, 'interview-category-edit', 'web', 'edit', NULL, '2022-06-20 03:32:16', '2022-06-20 03:32:16'),
(136, 'interview-category-delete', 'web', 'delete', NULL, '2022-06-20 03:32:16', '2022-06-20 03:32:16'),
(137, 'interview-type-list', 'web', 'list', NULL, '2022-06-20 05:07:02', '2022-06-20 05:07:02'),
(138, 'interview-type-create', 'web', 'create', NULL, '2022-06-20 05:07:02', '2022-06-20 05:07:02'),
(139, 'interview-type-edit', 'web', 'edit', NULL, '2022-06-20 05:07:02', '2022-06-20 05:07:02'),
(140, 'interview-type-delete', 'web', 'delete', NULL, '2022-06-20 05:07:02', '2022-06-20 05:07:02');

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
(1, 6, 'My Projects', '2022-03-30 08:16:06', '2022-03-30 08:16:06'),
(2, 5, 'LMS, CRM', '2022-05-09 04:38:17', '2022-05-09 04:38:17');

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
(15, 6, 'Institute 2', 'btech', 'civil-engineering', '1985', '2022-03-30 08:16:06', '2022-03-30 08:16:06'),
(16, 5, 'Deleniti consequatur', 'btech', 'computer-science-engineering', '1994', '2022-05-09 04:38:17', '2022-05-09 04:38:17'),
(17, 48, 'sdkfj', 'btech', 'electronics-communication-engineering', '2000', '2022-07-06 17:43:59', '2022-07-06 17:43:59');

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
(2, 6, NULL, NULL, NULL, '2022-03-30 08:06:55', '2022-03-30 08:06:55'),
(3, 48, 'sdfs', 'sdfsd', 'sdfsdf', '2022-07-06 17:43:59', '2022-07-06 17:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `read_notifications`
--

CREATE TABLE `read_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_id` bigint(20) NOT NULL,
  `read_by` bigint(20) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `offer_credits` bigint(20) NOT NULL,
  `offer_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_credits_both` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `created_by`, `offer_credits`, `offer_message`, `offer_credits_both`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, 100, 'When a friend of you joins through your invite and books first interview, both of you will get 100 Credits.', 1, 1, NULL, '2022-05-17 05:02:14', '2022-05-17 05:02:47');

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
(1, 7, 1, 0, NULL, 'sample.pdf', 'file_example_MP4_480_1_5MG.mp4', '2022-03-29 09:00:51', '2022-03-29 10:14:54'),
(2, 6, 0, 0, NULL, '30-03-2022-130928.pdf', '30-03-2022-130928.mp4', '2022-03-30 08:09:28', '2022-03-30 08:09:28'),
(3, 48, 0, 0, 'sfdsfsd', NULL, NULL, '2022-07-06 17:44:58', '2022-07-06 17:44:58');

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
(59, 6),
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
(84, 3),
(85, 3),
(86, 3),
(87, 3),
(87, 6),
(92, 6),
(93, 6),
(94, 6),
(95, 6),
(96, 6),
(97, 6),
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
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1);

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
(1, 6, 'My Skills', '2022-03-30 08:16:06', '2022-03-30 08:16:06'),
(2, 5, 'Programming', '2022-05-09 04:38:17', '2022-05-09 04:38:17');

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
  `referral_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `user_id`, `referral_code`, `name`, `last_name`, `phone`, `promo_code`, `email`, `temprary_email`, `email_verified_at`, `password`, `remember_token`, `verify_token`, `status`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4046, 'BG7kf4qV', 'Hardik tested', NULL, NULL, NULL, 'admin@gmail.com', NULL, NULL, '$2y$10$TrSMTkdqZ4CkZe8zLOz/AuMG5CYt3vVpO4dHwUN.ecPMsAorlD416', 'INkOZPVgBILahhmxpLwaXmGRxaeHClRwyTHNjGr2mLK6V0jpXHdGX9mugJFW', NULL, 1, NULL, NULL, '2022-03-09 11:01:24', '2022-03-25 05:12:33'),
(5, 5465, 'RnnJ5saS', 'Alika Avila', NULL, NULL, NULL, 'lawukobov@mailinator.com', NULL, NULL, '$2y$10$/MR9SKwPqOJbVU0uHvd1MOzLwrsQDeUy4aiC1dM3/vnCqF5HFUBKO', NULL, NULL, 1, NULL, NULL, '2022-03-22 03:43:24', '2022-03-22 03:43:24'),
(6, 2964, 'DeSDyqsv', 'Yvette Glover', 'Cash', '1234567800', NULL, 'testweb@mailinator.com', 'chandamar725@gmail.com', '2022-03-30 09:34:14', '$2y$10$FipZvMlM.AsqEoPvqF8PHOdl7DN43JYgAm4IZRevIZEBwZVLlV6/.', NULL, '627e13ffd2356', 1, '30-03-2022-112134.jpg', NULL, '2022-03-22 06:02:18', '2022-05-13 03:17:03'),
(7, 5461, 'BuaUhPzS', 'Sydnee Langley', 'Ratliff', '12345678', NULL, 'dudaguhu@interviewer.com', NULL, NULL, '$2y$10$QTyniXWr19HZSfcdvVtvSuWR5c9qde9MmS.D7qiQ.SYSrPOp8Vf8a', NULL, NULL, 1, NULL, NULL, '2022-03-22 06:04:59', '2022-03-31 03:39:09'),
(8, 8002, 'gzejzmGB', 'Quail Spence', 'Foley', '12345678', NULL, 'xytudip@mailinator.com', NULL, NULL, '$2y$10$QnJbTYfCsFklwp3sSS9njue.6Z0dZhofmCOh8JUSRps2gGPq8gArG', NULL, '623c97c42c7c5', 1, NULL, NULL, '2022-03-24 05:11:51', '2022-03-25 02:18:42'),
(9, 8261, 'rHkpKl0y', 'Kibo Bryan', 'Martinez', '3333333', NULL, 'xanytabaki@mailinator.com', NULL, NULL, '$2y$10$NqsSaD8g/gS.dUG1ld3jXeocINr2AACWC0KzWkMlp49XVR7DEFp2m', NULL, NULL, 1, NULL, NULL, '2022-03-24 06:29:39', '2022-03-24 06:29:39'),
(10, 7074, 'MglQUbN3', 'Reuben Barry', 'Torres', '34343343', NULL, 'viqytujehy@mailinator.com', NULL, NULL, '$2y$10$YfFUjBeeyy0Zos/laTDfR.As6L8Ks4NOsV2XDNhGEDGladKGgKP8q', NULL, '623c568702ce1', 1, NULL, NULL, '2022-03-24 06:31:19', '2022-03-24 06:31:19'),
(11, 1410, 'Hx0p7sC6', 'Georgia Brock', 'Rutledge', '2222222', NULL, 'cesyxi@mailinator.com', NULL, NULL, '$2y$10$lCMuQ1gcYGzuJ7wzR9Ijwu1JExN7Of.oI8Y/9bSQd7PmuUUP6rpme', NULL, '623c5719ceffa', 1, NULL, NULL, '2022-03-24 06:33:45', '2022-03-24 10:04:19'),
(34, 5362, '0A6kEVNc', 'Farhan', NULL, NULL, NULL, 'farhandigtandigtal@gmail.com', NULL, NULL, '$2y$10$/Y1cOHddN8DyfpYxMBtaKOEaGHspmUeo7j4RpEBY2C.IYuVV6djxy', NULL, NULL, 1, NULL, NULL, '2022-03-24 09:18:22', '2022-03-25 04:28:38'),
(39, 5589, '7CKPWJFk', 'Aphrodite Joseph', 'Wooten', 'sizulyz@mailinator.com', 'Enim non sint archi', 'ligiqikuva@mailinator.com', NULL, NULL, '$2y$10$1G.KGmgWm8vBAFRgjsoSRe83E15EBvLzOHTvkPIp12xUcsGufkIg6', NULL, '6284b4b09f1f5', 0, NULL, NULL, '2022-05-18 03:56:16', '2022-05-18 03:56:16'),
(42, 2230, 'Kuo7FBmK', 'Registeration', 'Mcgowan', NULL, NULL, 'chandamar725@gmail.com', NULL, NULL, '$2y$10$2cHbNy55wECWScuChY52buQYdZGsZJ.bd4mZoPs.foHARoXv.bSoO', NULL, '62ab3ae019ac5', 0, NULL, NULL, '2022-06-16 09:14:56', '2022-06-16 09:14:56'),
(43, 9896, 'yc158DAl', 'Aman', 'Singh', '0403717283', NULL, 'amanpreet.india@gmail.com', NULL, '2022-07-06 16:31:19', '$2y$10$QTyniXWr19HZSfcdvVtvSuWR5c9qde9MmS.D7qiQ.SYSrPOp8Vf8a', NULL, NULL, 1, NULL, NULL, '2022-07-06 16:31:04', '2022-07-06 16:31:19'),
(44, 2801, '2gM5y5wp', 'Aman', 'Interviewer', '09936319660', NULL, 'aman_preet@hotmail.com', NULL, '2022-07-06 16:41:03', '$2y$10$QTyniXWr19HZSfcdvVtvSuWR5c9qde9MmS.D7qiQ.SYSrPOp8Vf8a', NULL, NULL, 1, NULL, NULL, '2022-07-06 16:40:40', '2022-07-06 16:41:03'),
(45, 5052, 'AiRUAaPu', 'Ahsan', 'Abid', '+923133255662', NULL, 'ahsankk1sd26@gmail.com', NULL, '2022-07-06 17:27:10', '$2y$10$gq1V7nWkccXMTj7X0foFluuyKvfhiAUIHdI3dEyv4YqHTs9M7/1Ra', NULL, NULL, 0, NULL, NULL, '2022-07-06 17:26:50', '2022-07-06 17:27:10'),
(46, 5462, 'lK8H21cV', 'Ahsan', 'kk', '+923133255662', NULL, 'ahsankk126@gmail.com', NULL, '2022-07-06 17:28:40', '$2y$10$vOgjsF2enmOP1EFQE3tgyufcyyeRNml5I8hDvlE1MMjZsc5UmXYDu', NULL, NULL, 1, NULL, NULL, '2022-07-06 17:28:20', '2022-07-06 17:28:40'),
(48, 6577, '0TaewRZb', 'Ahsan', 'ali', '03133255662', NULL, 'digtandigital20@gmail.com', NULL, '2022-07-06 17:40:31', '$2y$10$GXBhAJLQGYw3kmOAdFU0F.0zkU49exBzt7StG0YiCJGuGJ5s9nwc2', NULL, NULL, 1, NULL, NULL, '2022-07-06 17:38:23', '2022-07-06 17:41:27'),
(49, 6377, 'PEpaydtR', 'Ahsan', 'Abid', '03133255662', NULL, 'digtndigitalfiver@gmail.com', NULL, NULL, '$2y$10$5BlBx5xUWFgKtErEfGX02OfwZjGuk.rshnd/2qSsXUgd3hrw2Xx/q', NULL, '62c6a4e0155ee', 0, NULL, NULL, '2022-07-07 13:18:24', '2022-07-07 13:18:24'),
(50, 4575, 'ocwbL55y', 'Ahsan', 'kk', '+923133255662', NULL, 'digtandigital18@gmail.com', NULL, NULL, '$2y$10$c32Yb3X56TAiD36i0/5InObkr/bRgUMJwD.7gAURbKGm6XCVZ/S1C', NULL, '62c6a51d24034', 0, NULL, NULL, '2022-07-07 13:19:25', '2022-07-07 13:19:25');

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
(1, 7, '2022-03-28', 'male', 'Address tested', 'hindi', '12222222', '2022-03-28 07:36:41', '2022-03-28 08:05:32'),
(2, 48, '2022-07-14', 'male', 'Flat # 303/4 sulehra appartment gulistan-e-johar\r\n3534534', 'french', '1231312', '2022-07-06 17:43:21', '2022-07-06 17:43:21');

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
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) NOT NULL,
  `payment_id` bigint(20) DEFAULT NULL,
  `referral_id` bigint(20) DEFAULT NULL,
  `last_added_credits` bigint(20) NOT NULL,
  `balance_credits` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `candidate_id`, `payment_id`, `referral_id`, `last_added_credits`, `balance_credits`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 2, 389, 1800, 1, '2022-05-16', '2022-05-16 10:00:34', '2022-05-25 04:12:27'),
(3, 39, NULL, 2, 0, 100, 1, '2022-05-18', '2022-05-18 03:56:16', '2022-05-18 03:56:16'),
(4, 40, NULL, 2, 0, 100, 1, '2022-05-18', '2022-05-18 04:14:37', '2022-05-18 04:14:37');

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
-- Indexes for table `available_slots`
--
ALTER TABLE `available_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `available_slots_available_date_id_foreign` (`available_date_id`);

--
-- Indexes for table `available_slot_dates`
--
ALTER TABLE `available_slot_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_priorities`
--
ALTER TABLE `booking_priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_interviews`
--
ALTER TABLE `book_interviews`
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
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
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
-- Indexes for table `interviewer_interview_types`
--
ALTER TABLE `interviewer_interview_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interviewer_wallets`
--
ALTER TABLE `interviewer_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview_categories`
--
ALTER TABLE `interview_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview_types`
--
ALTER TABLE `interview_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invited_users`
--
ALTER TABLE `invited_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invites`
--
ALTER TABLE `invites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_logs`
--
ALTER TABLE `payment_logs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `read_notifications`
--
ALTER TABLE `read_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
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
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
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
-- AUTO_INCREMENT for table `available_slots`
--
ALTER TABLE `available_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `available_slot_dates`
--
ALTER TABLE `available_slot_dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking_priorities`
--
ALTER TABLE `booking_priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `book_interviews`
--
ALTER TABLE `book_interviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `experience_details`
--
ALTER TABLE `experience_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `interviewer_interview_types`
--
ALTER TABLE `interviewer_interview_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `interviewer_wallets`
--
ALTER TABLE `interviewer_wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interview_categories`
--
ALTER TABLE `interview_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `interview_types`
--
ALTER TABLE `interview_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invited_users`
--
ALTER TABLE `invited_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invites`
--
ALTER TABLE `invites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_logs`
--
ALTER TABLE `payment_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `qualification_details`
--
ALTER TABLE `qualification_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `read_notifications`
--
ALTER TABLE `read_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_know_languages`
--
ALTER TABLE `user_know_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `whychooses`
--
ALTER TABLE `whychooses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `available_slots`
--
ALTER TABLE `available_slots`
  ADD CONSTRAINT `available_slots_available_date_id_foreign` FOREIGN KEY (`available_date_id`) REFERENCES `available_slot_dates` (`id`) ON DELETE CASCADE;

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
