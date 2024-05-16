-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 16, 2024 at 03:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toptech`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2024_05_08_095039_create_sites_table', 1),
(3, '2024_05_08_095112_create_responsables_table', 1),
(4, '2024_05_08_095136_create_techniciens_table', 1),
(5, '2024_05_08_095145_create_notes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id_note` bigint(20) UNSIGNED NOT NULL,
  `performance` int(11) NOT NULL DEFAULT 0,
  `qualite_travail` int(11) NOT NULL DEFAULT 0,
  `tenue_poste` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  `semaine` date NOT NULL,
  `id_fk_tech` bigint(20) UNSIGNED NOT NULL,
  `id_fk_resp` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id_note`, `performance`, `qualite_travail`, `tenue_poste`, `total`, `semaine`, `id_fk_tech`, `id_fk_resp`) VALUES
(23, 19, 17, 0, 12, '2024-05-13', 99, 16),
(25, 14, 14, 14, 14, '2024-05-13', 98, 16),
(26, 19, 18, 19, 19, '2024-05-13', 103, 16),
(27, 20, 20, 12, 17, '2024-05-13', 100, 16),
(28, 16, 12, 20, 16, '2024-05-13', 52, 37);

-- --------------------------------------------------------

--
-- Table structure for table `responsables`
--

CREATE TABLE `responsables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `login_resp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_fk_site` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `responsables`
--

INSERT INTO `responsables` (`id`, `nom`, `login_resp`, `password`, `id_fk_site`) VALUES
(16, 'Responsable sav Meknes 2', 'respo16', 'respo16', 16),
(17, 'Responsable sav Fés 2', 'respo17', 'respo17', 17),
(18, 'Responsable sav Fés', 'respo18', 'respo18', 18),
(19, 'Responsable sav Agadir 2', 'respo19', 'respo19', 19),
(20, 'Responsable sav Tiznit', 'respo20', 'respo20', 20),
(21, 'Responsable sav Agadir', 'respo21', 'respo21', 21),
(22, 'Responsable sav Safi 2', 'respo22', 'respo22', 22),
(23, 'Responsable sav Béni Mellal', 'respo23', 'respo23', 23),
(24, 'Responsable sav Tétouan', 'respo24', 'respo24', 24),
(25, 'Responsable sav Oujda', 'respo25', 'respo25', 25),
(26, 'Responsable sav Oujda 2', 'respo26', 'respo26', 26),
(27, 'Responsable sav Berkane', 'respo27', 'respo27', 27),
(28, 'Responsable sav Taroudant', 'respo28', 'respo28', 28),
(29, 'Responsable sav Errachidia', 'respo29', 'respo29', 29),
(30, 'Responsable sav Dakhla', 'respo30', 'respo30', 30),
(31, 'Responsable sav Tanger 1', 'respo31', 'respo31', 31),
(32, 'Responsable sav Tanger 2', 'respo32', 'respo32', 32),
(33, 'Responsable sav Al Hoceima', 'respo33', 'respo33', 33),
(34, 'Responsable sav Karia', 'respo34', 'respo34', 34),
(35, 'Responsable sav Ait Melloul', 'respo35', 'respo35', 35),
(36, 'Responsable sav SMVN Siège', 'respo36', 'respo36', 36),
(37, 'Responsable sav Diamond Motors Siège', 'respo37', 'respo37', 37),
(38, 'Responsable sav Khouribga', 'respo38', 'respo38', 38),
(39, 'Responsable sav Rabat 3', 'respo39', 'respo39', 39),
(40, 'Responsable sav Somma Siège', 'respo40', 'respo40', 40),
(41, 'Responsable sav Ex Soberma', 'respo41', 'respo41', 41),
(42, 'Responsable sav Auto Hall Occasion', 'respo42', 'respo42', 42);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('T9qnriFn1TvSVSq7kuNWEcsQQ66VwP8T8pt4bOes', 37, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0', 'YTo0OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL0Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJVSVpWeHhSblZBMEd5dTE2QzEzV0ttQngwd2c3TGdhb2l6TXZqWVhQIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozNzt9', 1715856923),
('te4W4L0GDfCXNyCmSW3FOXdG11AbqZvAsd7aypwO', 16, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL1RlY2huaWNpZW5zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IkpJMTNISm02Y0RNNno4VlNkS3c0eFBFUTZ2aUZ3bmZaVWxPUDg3NXQiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE2O30=', 1715864737);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id_site` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id_site`, `nom`) VALUES
(1, 'Scama Unité I'),
(2, 'Scama Unité II'),
(3, 'Auto Hall Lalla Yacout'),
(4, 'Auto Hall Moulay Ismail'),
(5, 'Auto Hall Rabat'),
(6, 'Auto Hall Rabat 2'),
(7, 'Auto Hall Salé'),
(8, 'Auto Hall Settat'),
(9, 'Auto Hall Nador'),
(10, 'Auto Hall Marrakech 2'),
(11, 'Auto Hall Kénitra 2'),
(12, 'Auto Hall Kénitra 3'),
(13, 'Auto Hall Marrakech 1'),
(14, 'Auto Hall Jorf Lasfar'),
(15, 'Auto Hall Méknes'),
(16, 'Auto Hall Méknes 2'),
(17, 'Auto Hall Fés 2'),
(18, 'Auto Hall Fés'),
(19, 'Auto Hall Agadir 2'),
(20, 'Auto Hall Tiznit'),
(21, 'Auto Hall Agadir'),
(22, 'Auto Hall Safi 2'),
(23, 'Auto Hall Béni Mellal'),
(24, 'Auto Hall Tétouan'),
(25, 'Auto Hall Oujda'),
(26, 'Auto Hall Oujda 2'),
(27, 'Auto Hall Berkane'),
(28, 'Auto Hall Taroudant'),
(29, 'Auto Hall Errachidia'),
(30, 'Auto Hall Dakhla'),
(31, 'Auto Hall Tanger 1'),
(32, 'Auto Hall Tanger 2'),
(33, 'Auto Hall Al Hoceima'),
(34, 'Auto Hall Karia'),
(35, 'Auto Hall Ait Melloul'),
(36, 'SMVN Siège'),
(37, 'Diamond Motors Siège'),
(38, 'Auto Hall Khouribga'),
(39, 'Auto Hall Rabat 3'),
(40, 'Somma Siège'),
(41, 'Ex Soberma'),
(42, 'Auto Hall Occasion');

-- --------------------------------------------------------

--
-- Table structure for table `techniciens`
--

CREATE TABLE `techniciens` (
  `id_tech` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `matricule_tech` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `id_fk_resp` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `techniciens`
--

INSERT INTO `techniciens` (`id_tech`, `nom`, `matricule_tech`, `status`, `id_fk_resp`) VALUES
(47, 'FARCHAKH Ayoub DM', '003128DM', 'active', 37),
(48, 'Sabri Moussa DM', '003010DM', 'active', 37),
(49, 'MOUCHAYAD Achraf DM', '003417DM', 'active', 37),
(50, 'AABIDA Youness DM', '002921DM', 'active', 37),
(51, 'SEFFIANI Youssef DM', '002922DM', 'active', 37),
(52, 'BOUTOUIL Mohammed (DM)', '001492DM', 'active', 37),
(53, 'ABDELOUAHHAB Amine DM', '002649DM', 'active', 37),
(54, 'ABSSI Mohamed  DM', '001961DM', 'active', 37),
(55, 'ABARA Hassan DM', '002370DM', 'active', 37),
(56, 'SABER Abderrazak DM', '002356DM', 'active', 37),
(57, 'JAIT Mokhtar DM', '002373DM', 'active', 37),
(58, 'EL ASSLOUJ Mounir DM', '002362DM', 'active', 37),
(59, 'HAYSSOUK Said DM', '002363DM', 'active', 37),
(60, 'DARI Laarbi DM', '002775DM', 'active', 37),
(61, 'YOUSSFI Nouredin DM', '002355DM', 'active', 37),
(62, 'BOUYA Hicham DM', '001941DM', 'active', 37),
(63, 'ACHOURAFI Abdelilah', '999149', 'active', 38),
(64, 'LAKHZINE Aziz', '999148', 'active', 38),
(65, 'ET-THAIJI Said', '211029', 'active', 38),
(66, 'AMINE Anas', '999121', 'active', 38),
(67, 'HARROUQ Salaheddine', '211012', 'active', 38),
(68, 'KHOULKHALI Abdellah', '999117', 'active', 38),
(69, 'TOUIJER Amine', '999135', 'active', 38),
(70, 'Sbitti Rida', '111785', 'active', 39),
(71, 'Laglalfa Walid', '999122', 'active', 39),
(72, 'Maiti Abdellah', '111740', 'active', 39),
(73, 'Sedraoui Youssef', '111656', 'active', 39),
(74, 'ABDELLATIF MAANAOUI', '111780', 'active', 39),
(75, 'Ouayachi Abdellah Rb3', '111741', 'active', 39),
(76, 'HANA HAYAT', '111768', 'active', 39),
(77, 'Tahiri Abdelhaque', 'ATahiri', 'active', 40),
(78, 'El Hilali Abdelaziz', '000331', 'active', 40),
(79, 'Messoud Yassine', '001911', 'active', 40),
(80, 'Thami Mohaddab', '001772', 'active', 40),
(81, 'Echaouch Mohammed', '001807', 'active', 40),
(82, 'Rabhi Abdelali', '171452', 'active', 40),
(83, 'Meskaoui Bouchaib', '001830', 'active', 41),
(84, 'Biaz Abdelhakim', '001872', 'active', 41),
(85, 'Biaz Khalid', '002227', 'active', 41),
(86, 'Machaoui Oualid', '003161', 'active', 41),
(87, 'Gamaro Abdelkrim', '000896', 'active', 41),
(88, 'SERGHANI El Jilali', '002009', 'active', 42),
(89, 'MERRAS Mourad', '002308', 'active', 42),
(90, 'JERDANE Mustapha', '002129', 'active', 42),
(98, 'Anass Rwichi', '44634DG', 'active', 16),
(99, 'Ali jlol', '457874DH', 'active', 16),
(100, 'Ammrani Youssef', '324235DH', 'active', 16),
(101, 'Ammrani Youssef', '344634DG', 'inactive', 30),
(102, 'Ammrani Youssef', '457874DH', 'active', 31),
(103, 'Mehdi hajab', '344634DG', 'inactive', 16),
(104, 'Anass Makhlok', '4634DG', 'inactive', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `notes_id_fk_tech_foreign` (`id_fk_tech`),
  ADD KEY `notes_id_fk_resp_foreign` (`id_fk_resp`);

--
-- Indexes for table `responsables`
--
ALTER TABLE `responsables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `responsables_login_resp_unique` (`login_resp`),
  ADD KEY `responsables_id_fk_site_foreign` (`id_fk_site`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id_site`);

--
-- Indexes for table `techniciens`
--
ALTER TABLE `techniciens`
  ADD PRIMARY KEY (`id_tech`),
  ADD KEY `techniciens_id_fk_resp_foreign` (`id_fk_resp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_note` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `responsables`
--
ALTER TABLE `responsables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id_site` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `techniciens`
--
ALTER TABLE `techniciens`
  MODIFY `id_tech` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_id_fk_resp_foreign` FOREIGN KEY (`id_fk_resp`) REFERENCES `responsables` (`id`),
  ADD CONSTRAINT `notes_id_fk_tech_foreign` FOREIGN KEY (`id_fk_tech`) REFERENCES `techniciens` (`id_tech`);

--
-- Constraints for table `responsables`
--
ALTER TABLE `responsables`
  ADD CONSTRAINT `responsables_id_fk_site_foreign` FOREIGN KEY (`id_fk_site`) REFERENCES `sites` (`id_site`);

--
-- Constraints for table `techniciens`
--
ALTER TABLE `techniciens`
  ADD CONSTRAINT `techniciens_id_fk_resp_foreign` FOREIGN KEY (`id_fk_resp`) REFERENCES `responsables` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
