-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 05:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ibcs_primax_assignment`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_15_184048_create_projects_table', 2),
(7, '2023_11_16_033049_create_tasks_table', 3),
(8, '2023_11_16_062141_add_status_to_tasks', 4),
(9, '2023_11_17_142050_create_task_dependencies_table', 5),
(10, '2023_11_17_145840_add_start_time_end_time_to_task_dependencies', 6);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('akash@gmail.com', '$2y$12$0DjAmnGDJolBKN3w2sUBQub94eFUzCAZNG1O6t.eo0h5Fp9Ofq0wm', '2023-11-15 08:39:56');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `start_date`, `end_date`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HRM Project Management - 1', '2023-11-20', '2023-11-22', 'I know that it is a question about Laravel 4 BUT if you are using Laravel 5.3 now you can use something like', '2023-11-15 12:51:46', '2023-11-16 04:08:04', '2023-11-16 04:08:04'),
(2, 'ERP Management system - 01', '2023-11-20', '2023-11-27', '9\r\n\r\nI know that it is a question about Laravel 4 BUT if you are using Laravel 5.3 now you can use something like', '2023-11-15 12:51:46', '2023-11-17 09:43:31', NULL),
(3, 'POS-System Management - 02', '2023-11-20', '2023-11-22', '9\r\n\r\nI know that it is a question about Laravel 4 BUT if you are using Laravel 5.3 now you can use something like', '2023-11-15 12:51:46', '2023-11-16 04:12:50', NULL),
(4, 'E-learning Management System', '2023-11-20', '2023-11-22', '9\r\n\r\nI know that it is a question about Laravel 4 BUT if you are using Laravel 5.3 now you can use something like', '2023-11-15 12:51:46', '2023-11-16 04:13:32', NULL),
(5, 'HRM Project Management', '2023-11-20', '2023-11-22', '9\r\n\r\nI know that it is a question about Laravel 4 BUT if you are using Laravel 5.3 now you can use something like', '2023-11-15 12:51:46', '2023-11-15 12:51:46', NULL),
(6, 'HRM Project Management', '2023-11-20', '2023-11-22', '9\r\n\r\nI know that it is a question about Laravel 4 BUT if you are using Laravel 5.3 now you can use something like', '2023-11-15 12:51:46', '2023-11-15 13:09:37', '2023-11-15 13:09:37'),
(7, 'School Management sytem', '2023-11-20', '2023-11-22', '9\r\n\r\nI know that it is a question about Laravel 4 BUT if you are using Laravel 5.3 now you can use something like', '2023-11-15 12:51:46', '2023-11-16 04:13:56', NULL),
(8, 'HRM Project Management', '2023-11-20', '2023-11-22', '9\r\n\r\nI know that it is a question about Laravel 4 BUT if you are using Laravel 5.3 now you can use something like', '2023-11-15 12:51:46', '2023-11-15 13:10:45', '2023-11-15 13:10:45'),
(9, 'Office Management system', '2023-11-01', '2023-12-30', NULL, '2023-11-16 04:14:22', '2023-11-16 04:14:22', NULL),
(10, 'Tax Software', '2023-11-01', '2023-11-29', 'fsd', '2023-11-16 04:14:50', '2023-11-16 04:14:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=create task, 1=progress, 2=done',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `title`, `start_date`, `end_date`, `status`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'User Management', '2023-11-01', '2023-11-30', 0, 's', '2023-11-15 22:02:58', '2023-11-15 22:10:45', '2023-11-15 22:10:45'),
(2, 2, 'User Management', '2023-11-01', '2023-11-30', 2, 'fsd', '2023-11-15 22:03:52', '2023-11-16 04:25:18', NULL),
(3, 1, 'test', '2023-11-01', '2023-11-30', 0, 'fs', '2023-11-15 22:08:36', '2023-11-15 22:08:36', NULL),
(4, 2, 'User Role and Permission', '1974-12-15', '1978-09-22', 2, 'N/A', '2023-11-16 02:57:13', '2023-11-16 08:12:03', NULL),
(5, 2, 'Multiple languages  Add', '2023-11-01', '2023-11-30', 1, NULL, '2023-11-16 04:21:09', '2023-11-16 06:05:25', NULL),
(6, 2, 'Multiple Currency add', '2024-01-01', '2024-02-01', 1, NULL, '2023-11-16 04:21:44', '2023-11-17 06:48:43', NULL),
(7, 2, 'Customer Create', '2023-11-22', '2023-11-30', 2, 'xc', '2023-11-16 04:22:15', '2023-11-16 06:05:14', NULL),
(8, 2, 'Supplier mange', '2023-12-09', '2023-12-15', 1, NULL, '2023-11-16 04:22:38', '2023-11-16 08:12:00', NULL),
(9, 2, 'Purchase System', '2023-11-16', '2023-11-23', 0, 'd', '2023-11-16 04:23:10', '2023-11-16 06:05:23', NULL),
(10, 2, 'Sales System', '2023-11-21', '2023-12-12', 0, NULL, '2023-11-16 04:23:30', '2023-11-16 04:24:57', NULL),
(11, 2, 'Challan Create', '2023-11-21', '2023-12-19', 0, 'ds', '2023-11-16 04:24:12', '2023-11-16 06:03:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_dependencies`
--

CREATE TABLE `task_dependencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_dependencies`
--

INSERT INTO `task_dependencies` (`id`, `task_id`, `project_id`, `title`, `start_date`, `end_date`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 2, 'test dependency 10', '2023-11-17', '2023-11-19', 'fsd', '2023-11-17 09:18:02', '2023-11-17 09:43:31', NULL),
(2, 1, 2, 'dependency 2', '2023-11-23', '2023-11-23', 'fsd', '2023-11-17 09:18:30', '2023-11-17 09:18:30', NULL),
(3, 1, 2, 'dependency  2', '2023-11-17', '2023-11-18', 'fs', '2023-11-17 09:19:35', '2023-11-17 09:19:35', NULL),
(4, 1, 2, 'Dependency 3', '2023-11-02', '2023-11-17', 'sda', '2023-11-17 09:24:12', '2023-11-17 09:24:12', NULL),
(5, 2, 2, 'Dependency 2', '2023-11-17', '2023-11-24', 's', '2023-11-17 09:26:56', '2023-11-17 09:26:56', NULL),
(6, 2, 2, 'test', '2023-11-17', '2023-11-18', 'sd', '2023-11-17 09:27:39', '2023-11-17 09:27:47', '2023-11-17 09:27:47'),
(7, 4, 2, 'Officia inventore qu', '2001-01-15', '2001-01-18', 'In ut ex itaque rem', '2023-11-17 09:29:00', '2023-11-17 09:29:00', NULL),
(8, 2, 2, 'ds', '2023-11-17', '2023-11-20', 'fsd', '2023-11-17 09:41:12', '2023-11-17 09:41:12', NULL),
(9, 2, 2, 'ds', '2023-11-17', '2023-11-20', 'fsd', '2023-11-17 09:41:34', '2023-11-17 09:41:34', NULL),
(10, 2, 2, 'ds', '2023-11-17', '2023-11-20', 'fsd', '2023-11-17 09:41:50', '2023-11-17 09:41:50', NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Akash', 'akash@gmail.com', NULL, '$2y$12$rEv5tgA87KslczrPrhgQVOyxxOWeGAqZZ04yyBnJDFt1x6RTUNjE.', NULL, '2023-11-15 07:25:15', '2023-11-15 07:25:15');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_project_id_foreign` (`project_id`);

--
-- Indexes for table `task_dependencies`
--
ALTER TABLE `task_dependencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_dependencies_task_id_foreign` (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task_dependencies`
--
ALTER TABLE `task_dependencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_dependencies`
--
ALTER TABLE `task_dependencies`
  ADD CONSTRAINT `task_dependencies_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
