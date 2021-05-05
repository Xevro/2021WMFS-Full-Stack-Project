-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mysqldb
-- Gegenereerd op: 05 mei 2021 om 20:46
-- Serverversie: 5.7.33
-- PHP-versie: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stagetool`
--
CREATE DATABASE IF NOT EXISTS `stagetool` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `stagetool`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kbo_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `kbo_number`, `name`, `profile_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 3, '182722', 'BVBA E&Y', NULL, NULL, '2021-04-09 14:56:23', '2021-04-09 14:56:23'),
(2, 4, '192827', 'Fleetmaster', NULL, NULL, '2021-04-09 14:56:23', '2021-04-09 14:56:23');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `proposal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `likes`
--

INSERT INTO `likes` (`student_id`, `proposal_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL),
(2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mentors`
--

DROP TABLE IF EXISTS `mentors`;
CREATE TABLE `mentors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `mentors`
--

INSERT INTO `mentors` (`id`, `user_id`, `firstname`, `lastname`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Joris', 'Maervoet', NULL, '2021-04-09 14:56:23', '2021-04-09 14:56:23'),
(2, 2, 'Sven', 'knockaert', NULL, '2021-04-09 14:56:23', '2021-04-09 14:56:23'),
(3, 7, 'Johan', 'Donne', NULL, '2021-04-09 14:56:23', '2021-04-09 14:56:23');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_02_24_115017_create_companies_table', 1),
(6, '2021_02_24_115048_create_mentors_table', 1),
(7, '2021_02_24_115104_create_proposals_table', 1),
(8, '2021_02_24_115116_create_students_table', 1),
(9, '2021_02_24_115134_create_tasks_table', 1),
(10, '2021_02_24_115416_create_likes_table', 1),
(11, '2021_02_24_115531_create_traineeship_days_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `proposals`
--

DROP TABLE IF EXISTS `proposals`;
CREATE TABLE `proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In afwachting',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_period` date NOT NULL,
  `end_period` date NOT NULL,
  `contract_file_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `proposals`
--

INSERT INTO `proposals` (`id`, `visibility`, `status`, `description`, `start_period`, `end_period`, `contract_file_location`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 0, 'In afwachting', 'een stage tool ontwikkelen.', '2021-04-09', '2021-04-09', '/', 1, '2021-04-09 14:56:23', '2021-04-09 14:56:23'),
(2, 1, 'Goedgekeurd', 'een stage tool ontwikkelen voor studenten.', '2021-04-09', '2021-04-09', '/', 2, '2021-04-09 14:56:23', '2021-04-09 14:56:23'),
(3, 0, 'In afwachting', 'een stage tool ontwikkelen.', '2021-04-09', '2021-04-09', '/', 2, '2021-04-09 14:56:23', '2021-04-09 14:56:23');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allowed` int(11) NOT NULL DEFAULT '0',
  `approved` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In afwachting',
  `proposal_id` int(11) DEFAULT NULL,
  `completed_days` int(11) NOT NULL DEFAULT '0',
  `mentor_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `students`
--

INSERT INTO `students` (`id`, `user_id`, `firstname`, `lastname`, `r_number`, `allowed`, `approved`, `proposal_id`, `completed_days`, `mentor_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 5, 'Louis', 'D\'Hont', 'r1039382', 1, 'not approved', 0, 0, 1, NULL, '2021-04-09 14:56:23', '2021-04-09 14:56:23'),
(2, 6, 'Guido', 'Pallemans', 'r0284739', 1, 'not approved', 0, 0, 2, NULL, '2021-04-09 14:56:23', '2021-04-09 14:56:23');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `date`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'Vandaag de migrations en seeder geschreven', '2021-04-09', 1, '2021-04-09 14:56:23', '2021-04-09 14:56:23'),
(2, 'Een serverfout gefixed in de seeder', '2021-04-09', 1, '2021-04-09 14:56:23', '2021-04-09 14:56:23'),
(3, 'Een nieuwe API gebouwd', '2021-04-09', 2, '2021-04-09 14:56:23', '2021-04-09 14:56:23');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('mentor','coordinator','company','student') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'joris.maervoet@odisee.be', '$2y$10$D7l4fqop97eWGjNXbyQvJ.0nuYVlglyPjwcH4FYfoK22cUpaMYpey', 'mentor', NULL, '2021-04-09 14:56:23', '2021-04-09 14:56:23'),
(2, 'sven.knockaert@odisee.be', '$2y$10$25TkBV0djUypRZitgewxbex9Ilfjp6/GOdjhJ9f5NUr.7fOXLrFZO', 'coordinator', NULL, '2021-04-09 14:56:23', '2021-04-09 14:56:23'),
(3, 'company@comp.com', '$2y$10$Qp4s4yypp7VSS.nD.TcQYOWv1Kqeacz61xFnS8Xsz2dv2jvgCtnUu', 'company', NULL, '2021-04-09 14:56:23', '2021-04-09 14:56:23'),
(4, 'hr@fleetmaster.com', '$2y$10$nuQedMb7cniOF1SlCIxQ1eeHt3b/fC/zKlwihbXofk6.gdy0I7BkO', 'company', NULL, '2021-04-09 14:56:23', '2021-04-09 14:56:23'),
(5, 'louis.dhont@student.odisee.be', '$2y$10$z40FKTQ6rXTiZdc50uO6guhxz1QbQ6VMO6rf7MONDnYLyDDHXRPjm', 'student', NULL, '2021-04-09 14:56:23', '2021-04-09 14:56:23'),
(6, 'guido.pallemans@student.odisee.be', '$2y$10$/6mhK0OZHO7UhCaMsDg6xu6ZGSmQiRdv0.X.jPiow1Mz9LUvTa/J2', 'student', NULL, '2021-04-09 14:56:23', '2021-04-09 14:56:23'),
(7, 'johan.donne@odisee.be', '$2y$10$5/Gbp39qpI6.Ouy9PWOlBu4KUMXDd9BkGdepzgGMGe3CSMCk8u.UW', 'mentor', NULL, '2021-04-09 14:56:23', '2021-04-09 14:56:23');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_kbo_number_unique` (`kbo_number`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indexen voor tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexen voor tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`student_id`,`proposal_id`),
  ADD KEY `likes_student_id_index` (`student_id`),
  ADD KEY `likes_proposal_id_index` (`proposal_id`);

--
-- Indexen voor tabel `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentors_user_id_foreign` (`user_id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexen voor tabel `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposals_company_id_foreign` (`company_id`);

--
-- Indexen voor tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_mentor_id_foreign` (`mentor_id`);

--
-- Indexen voor tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_student_id_foreign` (`student_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_proposal_id_foreign` FOREIGN KEY (`proposal_id`) REFERENCES `proposals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `mentors`
--
ALTER TABLE `mentors`
  ADD CONSTRAINT `mentors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `proposals_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Beperkingen voor tabel `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `mentors` (`id`),
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
