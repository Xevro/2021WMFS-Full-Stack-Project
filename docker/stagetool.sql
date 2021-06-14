-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mysqldb
-- Gegenereerd op: 14 jun 2021 om 18:45
-- Serverversie: 5.7.34
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
(1, 3, '0312.349.292', 'Apple', NULL, NULL, '2021-06-14 10:28:07', '2021-06-14 10:28:07'),
(2, 4, '0192.482.192', 'ML6', NULL, NULL, '2021-06-14 10:28:07', '2021-06-14 10:28:07'),
(3, 5, '0481.128.838', 'Fleetmaster', NULL, NULL, '2021-06-14 10:28:07', '2021-06-14 10:28:07'),
(4, 9, '0129.232.222', 'test', NULL, NULL, '2021-06-14 10:58:42', '2021-06-14 10:58:42');

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
(1, 3, '2021-06-14 12:52:55', '2021-06-14 12:52:55'),
(1, 5, '2021-06-14 10:43:08', '2021-06-14 10:43:08'),
(1, 6, '2021-06-14 15:12:23', '2021-06-14 15:12:23'),
(2, 4, '2021-06-14 18:34:49', '2021-06-14 18:34:49');

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
(1, 1, 'Joris', 'Maervoet', NULL, '2021-06-14 10:28:07', '2021-06-14 10:28:07'),
(2, 2, 'Sven', 'knockaert', NULL, '2021-06-14 10:28:07', '2021-06-14 10:28:07'),
(3, 8, 'Johan', 'Donne', NULL, '2021-06-14 10:28:07', '2021-06-14 10:28:07');

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
(10, '2021_02_24_115416_create_likes_table', 1);

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
(1, 0, 'In afwachting', 'De Remote Sensing unit van VITO ontwikkelt en opereert innovatieve aardobservatiesystemen die helpen om grip te krijgen op de grote maatschappelijke en economische uitdagingen waar onze planeet voor staat. Onze projecten bevinden zich in de sfeer van data distributie, on-demand beeldverwerking op grote en schaalbare platformen en Big Data analytics om informatie uit satelliet en airborne (UAV, drones) gegevens te halen waarbij deze datasets enorm snel in omvang groeien (van terabytes tot petabytes).\n\nDe resulterende informatie wordt vandaag via verschillende online applicaties aangeboden aan onze eindgebruikers. Door de stijgende vraag naar interactieve visualisaties en cross platform integraties, zijn we op zoek naar iemand die een actieve rol kan spelen in het ontwerpen en ontwikkelen van online applicaties en bijhorende backend systemen. De wereld van remote sensing biedt hierin verschillende uitdagingen die vragen voor creatieve oplossingen met een rechtstreekse impact op een breed spectrum van eindgebruikers.', '2021-06-14', '2021-06-14', '/', 1, '2021-06-14 10:28:07', '2021-06-14 10:28:07'),
(3, 1, 'Goedgekeurd', 'Voor onze software factory in Kortrijk zijn we op zoek naar een Junior Java Developer. Als Junior Java Developer maak je deel uit van een dynamisch team dat op een Agile / Scrum manier is georganiseerd: beheer van een product backlog, pokerplanningsessies, dagelijkse stand-up meetings, opsplitsing van het werk in sprints van 2 tot 3 weken, retrospectives, ...\nDeze manier van werken laat elk teamlid toe sterk bij het project betrokken te zijn en bij te dragen aan de richtingen die bepaald worden.\nJe neemt deel aan de ontwikkeling van nieuwe toepassingen op basis van de bestaande ontwikkelingsstandaarden en frameworks.\nOp basis van de functionele analysedocumenten, opgesteld door de analisten en de technische richtlijnen van de architecten, zorg je voor de ontwikkeling, de testing en de documentatie van de ontwikkelde toepassingen.\nJe bent ook verantwoordelijk voor het oplossen van bugs in de code, evolutief onderhoud en voor het ontwikkelen van nieuwe functies.', '2021-06-14', '2021-06-14', '/', 1, '2021-06-14 10:28:07', '2021-06-14 10:28:07'),
(4, 1, 'Goedgekeurd', 'Is data-analyse één van jouw sterktes en ben je vertrouwd met de principes van datawarehousing en data science? Heb je interesse in het Vlaamse gezondheidsbeleid? Werk je graag in teamverband? Het Departement WVG en het agentschap Zorg en Gezondheid zijn op zoek naar een leergierige data-analist die zelfstandig aan de slag gaat met zijn data technische kennis.\n\nAls data-analist zet je de beschikbare data om in bruikbare en bevattelijke informatie en kennis voor je collega\'s die het gezondheidsbeleid ondersteunen.. Met jouw inlevingsvermogen ben je in staat om de organisatiebehoeften te detecteren en daarop in te spelen. Wij zoeken een nieuwe collega met kennis van relationele databanken, (NO)SQL, data science en datawarehouse concepten, een teamplayer die gestructureerd te werk gaat en een initiatiefnemer die het aandurft om projecten te leiden.', '2021-06-14', '2021-06-14', '/', 2, '2021-06-14 10:28:07', '2021-06-14 10:28:07'),
(5, 1, 'Goedgekeurd', 'Als Data Analyst vertaal je de business behoeften om nieuwe interoperabiliteitsstandaarden, nieuwe transacties en nieuwe procedures te kunnen uitwerken. Je modelleert, standaardiseert en vereenvoudigt de gegevensuitwisseling tussen de verschillende actoren van de gezondheidszorg. Je werkt nieuwe HL7 FHIR technische artefacten uit en legt deze vast. Tevens zal je ook werken rond het onderhoud van KMEHR berichten.\nJe neemt deel aan de onderhandelingen en promoot bij alle actoren van de gezondheidszorg de standaarden die het eHealth-platform heeft ontwikkeld.\nJe onderhoudt de grammatica van de berichten inzake interoperabiliteitsstandaarden en laat ze evalueren (onderhoud FHIR artefacten, XSD, XML, ...). Hiervoor werk je samen met andere instanties verantwoordelijk voor de nationale en internationale standaarden.', '2021-06-14', '2021-06-14', '/', 2, '2021-06-14 10:28:07', '2021-06-14 10:28:07'),
(6, 1, 'Goedgekeurd', 'Als Data Architect speel je een centrale rol in het ontwerp en de ontwikkeling van het platform voor gegevensanalyse. Je neemt actief deel aan de invoering van een strategie met als doel om naar een meer datagerichte organisatie te evolueren.\nJe superviseert het ontwerp van de gegevensarchitectuur en de technische architectuur van het gegevensplatform, met inbegrip van de verwerving en de integratie van de gegevens, de gegevensmodellering, het transformatie- en kwaliteitsproces, het beheer van de masterdata, de gegevensopslag en de datamarts.\nJe creëert een robuuste en duurzame architectuur die rekening houdt met de huidige en toekomstige businessbehoeften, met de budgettaire voorwaarden, de beschikbaarheid van de gegevens en de nodige resources.\nJe evalueert en selecteert de nodige tools en componenten die nodig zijn voor een optimaal beheer van de gegevens (aankoop van gegevens, opslag van gegevens, gegevenskwaliteit, governance van gegevens, visualisatie van de gegevens en advanced analytics).\nJe superviseert de ontwikkeling van conceptuele, logische en fysieke gegevensmodellen, van ETL-scripts, van definities van metagegevens, van modellen voor businessgegevens, van requests en rapporten, van werkprocessen en van onderhoudsprocedures.\nJe zorgt ervoor dat de technische architectuur (van de gegevensopslag, met inbegrip van de fysieke componenten en hun functionaliteiten) correct gedocumenteerd wordt.\nJe coördineert het werk van de data- en BI-architecten alsook de technische verantwoordelijken van de ontwikkelteams.\nJe evalueert tot slot de huidige technische architectuur en schat de capaciteit van het systeem in om te beantwoorden aan de verwerkingsbehoeften op korte en lange termijn.', '2021-06-14', '2021-06-14', '/', 3, '2021-06-14 10:28:07', '2021-06-14 10:28:07'),
(7, 0, 'In afwachting', 'Je werkt samen met de softwarearchitecten en de verschillende infrastructuurteams om de ontwikkelde toepassingen en systemen in het ecosysteem van Smals te integreren. Je zorgt ervoor dat de IT-oplossingen ontworpen en geïmplementeerd worden in overeenstemming met de business- en technische vereisten en in lijn met de IT-strategie.\nJe documenteert je keuzes en communiceert die met de verschillende betrokken teams. Je publiceert \"best practices\" en kan de ontwikkelingsteams begeleiden.\nAls deel van de infrastructuurteams ontwerp en onderhoud je kostenefficiënte en duurzame architecturen in lijn met de bedrijfsdoelstellingen.\nAls facilitator vorm je de link tussen de ontwikkelingsteams en de operationele teams. Je bent dus betrokken bij het begrijpen van de behoeften en beperkingen van de business.\nJe neemt deel aan de implementatie en promotie van CI/CD (Continuous Integration / Continuous Delivery) en IaC (Infrastructure as Code) praktijken. Je integreert de ontwikkelings-, test- en operationele aspecten in je visie.\nJe komt tussen in de review van de technische architecturen van applicaties (infrastructuurlaag), op basis van de niet-functionele behoeften van de klant (Service Level) en de catalogus van diensten die door de operationele teams worden ondersteund.', '2021-06-14', '2021-06-14', '/', 3, '2021-06-14 10:28:07', '2021-06-14 10:28:07');

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
(1, 6, 'Louis', 'D\'Hont', 'r1039382', 1, 'Goedgekeurd', 3, 0, 1, NULL, '2021-06-14 10:28:07', '2021-06-14 10:28:07'),
(2, 7, 'Guido', 'Pallemans', 'r0284739', 1, 'In afwachting', 0, 0, 2, NULL, '2021-06-14 10:28:07', '2021-06-14 10:28:07');

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
(4, 'qsddqdsdsddsqd', '2021-07-22', 1, '2021-06-14 13:50:25', '2021-06-14 13:50:25'),
(5, 'qsdqdqdsdqdqsd', '2021-06-10', 2, '2021-06-14 18:35:04', '2021-06-14 18:35:04');

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
(1, 'joris.maervoet@odisee.be', '$2y$10$uN8Ty.bNOp82oc7N0EBbGuIKE95jW4seHH7Rn8/5M0eB4mXHGhOde', 'mentor', NULL, '2021-06-14 10:28:06', '2021-06-14 10:28:06'),
(2, 'sven.knockaert@odisee.be', '$2y$10$iJ2fQiSB0BPlSbEexgk9TuDKEztEzzgSx019SH7C57JmJlgiimzWe', 'coordinator', NULL, '2021-06-14 10:28:06', '2021-06-14 10:28:06'),
(3, 'info@apple.com', '$2y$10$cYNY8jzLH04IsjaBuwJgEuwxVeWSXgrNRV.fNTitu7EUOaZv1m/HS', 'company', NULL, '2021-06-14 10:28:06', '2021-06-14 10:28:06'),
(4, 'hr@ml6.com', '$2y$10$d/v3MtuqCR9K084vmulTnOL569VNz8XgPAju6Yle/i.oye2M4J/uK', 'company', NULL, '2021-06-14 10:28:06', '2021-06-14 10:28:06'),
(5, 'hr@fleetmaster.com', '$2y$10$.IuityanOaDkBTCeUHl6X.XTXCQ1ypNo/18YUr3J4qaj72ev03bf2', 'company', NULL, '2021-06-14 10:28:06', '2021-06-14 10:28:06'),
(6, 'louis.dhont@student.odisee.be', '$2y$10$ROiN9vWL2pQZz07he/1RFOk3mPUla859rKttFBueGJP3Fahk7tuBO', 'student', NULL, '2021-06-14 10:28:07', '2021-06-14 10:28:07'),
(7, 'guido.pallemans@student.odisee.be', '$2y$10$VbUz3mNYPszLGpFJQDPAK.z42H4Wj4Q0kjUvnrS5xzwmsU23WK6z6', 'student', NULL, '2021-06-14 10:28:07', '2021-06-14 10:28:07'),
(8, 'johan.donne@odisee.be', '$2y$10$TkJct9MfokrlBcVHviLIReKQzkTQkdPK5Sib.9xlvIMW5zX3Xl/Ee', 'mentor', NULL, '2021-06-14 10:28:07', '2021-06-14 10:28:07'),
(9, 'test@test.be', '$2y$10$PaIP4fHZTiGQLNsD/ljFseAMO3PHUUN19TTKln5Tr4n/8lSpqygAi', 'company', NULL, '2021-06-14 10:58:42', '2021-06-14 10:58:42');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
