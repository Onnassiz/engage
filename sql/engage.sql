-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2016 at 03:46 PM
-- Server version: 5.6.30
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `filter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_of_origin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `rank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `current_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `current_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `periodicity` enum('Daily','Weekly','Monthly','Annually') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts_tags`
--

CREATE TABLE IF NOT EXISTS `contacts_tags` (
  `id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts_temp`
--

CREATE TABLE IF NOT EXISTS `contacts_temp` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `number` int(10) unsigned NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_of_origin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `function` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `periodicity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_organizations`
--

CREATE TABLE IF NOT EXISTS `contact_organizations` (
  `id` int(10) unsigned NOT NULL,
  `organization_id` int(10) unsigned NOT NULL,
  `contact_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL,
  `media` enum('Print','Tv','Web','Blog','Radio') COLLATE utf8_unicode_ci NOT NULL,
  `contact_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_26_144748_create_admin_table', 1),
('2016_07_05_204923_add_avater_to_users_table', 1),
('2016_07_10_081126_create_states_table', 1),
('2016_07_11_093300_create_tags_table', 2),
('2016_07_11_104445_create_tags_foreign', 2),
('2016_07_11_150942_create_contacts_table', 2),
('2016_07_11_153628_add_foreign_contact_table', 2),
('2016_07_13_092151_create_contacts_tags', 2),
('2016_07_13_092737_create_foreigns_in_contacts_tags', 2),
('2016_07_14_123807_create_media_table', 2),
('2016_07_16_153651_create_organization_table', 2),
('2016_07_16_154313_create_contact_organization', 2),
('2016_07_31_180305_create_temp_contact_table', 2),
('2016_08_16_153306_create_publication_table', 2),
('2016_08_16_153442_create_publication_contact_list', 2);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(10) unsigned NOT NULL,
  `organization` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publication` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publication_contact_list`
--

CREATE TABLE IF NOT EXISTS `publication_contact_list` (
  `id` int(10) unsigned NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  `publication_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(10) unsigned NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(4, 'Akwa Ibom'),
(3, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(13, 'Edo'),
(14, 'Ekiti'),
(12, 'Enugu'),
(15, 'Gombe'),
(16, 'Imo'),
(17, 'Jigawa'),
(18, 'Kaduna'),
(19, 'Kano'),
(20, 'Katsina'),
(21, 'Kebbi'),
(22, 'Kogi'),
(23, 'Kwara'),
(24, 'Lagos'),
(25, 'Nasarawa'),
(26, 'Niger'),
(27, 'Ogun'),
(28, 'Ondo'),
(29, 'Osun'),
(30, 'Oyo'),
(31, 'Plateau'),
(32, 'Rivers'),
(33, 'Sokoto'),
(34, 'Taraba'),
(35, 'Yobe'),
(36, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `surname`, `email`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ben', 'Onah', 'onnassiz@gmail.com', '$2y$10$8xKIauucgX14A2kOsqoorenDWMyLnr826h9pQHgYZWqm6lduAAJUS', '1468688328.JPG', 'PQZzsucwD7szvm2QgnDj00j1FkjYvbUwKZcV9T9YVehoLy7m8HnIER3nIdU4', '2016-07-16 15:58:33', '2016-08-17 17:25:28'),
(2, 'Emmanuel', 'Chigbo', 'chigbo@gmail.com', '$2y$10$zUv3EjWXhK6/cRwZ9n9wge235CNEh5WtD1XQmrmBiXd7dQ9GR7Vvm', '1469706497.png', 'EDXSJyy5l8PbEpCRXMOvMHnmmR7pkf7dcj2qKig1QtkzzDstNppmy81Y1o78', '2016-07-21 05:31:46', '2016-07-30 08:01:36'),
(3, 'Derick', 'Ogbejesi', 'tester@gmail.com', '$2y$10$KMgIw90/2hWqqp.GjCbfXO1R7LYPt1seORtpeIumQCzBQ74YGMAv2', '1471458469.png', NULL, '2016-08-17 17:27:20', '2016-08-17 17:27:50'),
(4, 'chinedu', 'okonta', 'chiokonta@gmail.com', '$2y$10$7WeZbtkExfLs0MqbUGUkPOvuTX.QjgNbSUSQk/tXmTEE118zrXy/O', 'default.jpg', '8m5THUWixpIVoxr6wuvTarG2gYrgTZMa9EJrr9BBahio8XTDse8JEnDQq7FB', '2016-08-18 08:14:39', '2016-08-18 08:29:38'),
(5, 'derick', 'ekene', 'chine@yahoo.com', '$2y$10$0C/NWNSl5ndfk1lQlJFkyuzNYuaiHTC4R5GuCsfMqBsXJ0jCsLNcm', 'default.jpg', NULL, '2016-08-18 09:08:00', '2016-08-18 09:08:00');

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_key_unique` (`key`),
  ADD KEY `contacts_user_id_foreign` (`user_id`),
  ADD KEY `contacts_state_of_origin_foreign` (`state_of_origin`),
  ADD KEY `contacts_current_state_foreign` (`current_state`);

--
-- Indexes for table `contacts_tags`
--
ALTER TABLE `contacts_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_tags_tag_id_foreign` (`tag_id`),
  ADD KEY `contacts_tags_contact_id_foreign` (`contact_id`);

--
-- Indexes for table `contacts_temp`
--
ALTER TABLE `contacts_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_temp_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact_organizations`
--
ALTER TABLE `contact_organizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_organizations_organization_id_foreign` (`organization_id`),
  ADD KEY `contact_organizations_contact_id_foreign` (`contact_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_contact_id_foreign` (`contact_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD UNIQUE KEY `migration` (`migration`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizations_organization_unique` (`organization`),
  ADD KEY `organizations_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publications_user_id_foreign` (`user_id`);

--
-- Indexes for table `publication_contact_list`
--
ALTER TABLE `publication_contact_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publication_contact_list_contact_id_foreign` (`contact_id`),
  ADD KEY `publication_contact_list_publication_id_foreign` (`publication_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `states_state_unique` (`state`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_tags_unique` (`tags`),
  ADD KEY `tags_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts_tags`
--
ALTER TABLE `contacts_tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts_temp`
--
ALTER TABLE `contacts_temp`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_organizations`
--
ALTER TABLE `contact_organizations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `publication_contact_list`
--
ALTER TABLE `publication_contact_list`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_current_state_foreign` FOREIGN KEY (`current_state`) REFERENCES `states` (`state`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contacts_state_of_origin_foreign` FOREIGN KEY (`state_of_origin`) REFERENCES `states` (`state`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `contacts_tags`
--
ALTER TABLE `contacts_tags`
  ADD CONSTRAINT `contacts_tags_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contacts_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts_temp`
--
ALTER TABLE `contacts_temp`
  ADD CONSTRAINT `contacts_temp_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `contact_organizations`
--
ALTER TABLE `contact_organizations`
  ADD CONSTRAINT `contact_organizations_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`),
  ADD CONSTRAINT `contact_organizations_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `organizations`
--
ALTER TABLE `organizations`
  ADD CONSTRAINT `organizations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `publication_contact_list`
--
ALTER TABLE `publication_contact_list`
  ADD CONSTRAINT `publication_contact_list_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`),
  ADD CONSTRAINT `publication_contact_list_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`);

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
