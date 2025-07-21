-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 juin 2025 à 09:42
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `adhesion`
--

-- --------------------------------------------------------

--
-- Structure de la table `adhesions`
--

CREATE TABLE `adhesions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `etablissement_id` bigint(20) UNSIGNED NOT NULL,
  `Titre_Adhesion` varchar(255) NOT NULL,
  `type_adhesion_id` bigint(20) UNSIGNED NOT NULL,
  `Date_Debut` date NOT NULL,
  `Date_Fin` date NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Actif',
  `Description` varchar(255) DEFAULT NULL,
  `Montant` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Admin_Name` varchar(255) NOT NULL,
  `Admin_Email` varchar(255) NOT NULL,
  `Admin_Phone` varchar(255) NOT NULL,
  `Admin_Role` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adhesions`
--

INSERT INTO `adhesions` (`id`, `etablissement_id`, `Titre_Adhesion`, `type_adhesion_id`, `Date_Debut`, `Date_Fin`, `Status`, `Description`, `Montant`, `Image`, `Admin_Name`, `Admin_Email`, `Admin_Phone`, `Admin_Role`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 11, 'Molestiae consequatur autem omnis.', 3, '2001-10-25', '1982-04-03', 'Inactif', 'Amet repudiandae nemo sit accusantium earum quia. Aut iusto quisquam quidem quam quidem unde. Est veritatis qui quos accusantium vel accusamus pariatur.', '507.79', 'https://via.placeholder.com/640x480.png/009900?text=business+adhesion+aliquam', 'Mr. Walton Rutherford', 'hsporer@example.net', '+1-607-614-8588', 'directeur', 1, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(2, 30, 'Tempore deleniti nihil.', 2, '2025-01-18', '2022-08-14', 'Inactif', 'Non ut quae architecto voluptas. Rerum voluptas harum provident. Voluptates quibusdam doloremque deserunt qui est laudantium. Temporibus ut suscipit id beatae officia delectus totam aut. Voluptas quaerat culpa autem modi quo in aut.', '785.79', 'https://via.placeholder.com/640x480.png/00bbbb?text=business+adhesion+ex', 'Zane King', 'willow.streich@example.org', '(972) 730-5983', 'formateur', 1, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(3, 20, 'Id repellat beatae ut.', 2, '2017-05-14', '2022-06-29', 'Inactif', 'Aut dignissimos ut sunt quaerat. Numquam laboriosam autem rerum molestiae quas maxime inventore. Aliquid ipsam perspiciatis debitis quibusdam unde quibusdam. Omnis ut ut et consectetur qui et et.', '553.38', 'https://via.placeholder.com/640x480.png/0011dd?text=business+adhesion+recusandae', 'Tatyana Robel', 'queenie29@example.org', '(534) 571-9949', 'administrateur', 1, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(4, 12, 'Laudantium atque ad illo.', 3, '1986-08-31', '2007-08-15', 'Inactif', 'Ut nostrum earum dolore minus maxime et et. Iusto nisi voluptatem deleniti sit quam. Et ex libero autem voluptatem. Voluptatibus eum sit adipisci voluptatibus debitis id illo repellendus.', '793.89', 'https://via.placeholder.com/640x480.png/00ccff?text=business+adhesion+voluptas', 'Juvenal Gutmann', 'alene.hessel@example.com', '+1-941-480-5625', 'autre', 1, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(5, 2, 'Possimus quidem nostrum.', 4, '1981-01-26', '1978-12-13', 'Inactif', 'Quae natus sunt illum reiciendis. Similique ut officiis dolorem soluta velit ex sed. Quo quod ab blanditiis rerum nulla.', '248.74', 'https://via.placeholder.com/640x480.png/00ff66?text=business+adhesion+ut', 'Hubert Erdman', 'frankie.konopelski@example.net', '+1-406-726-9467', 'formateur', 1, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(6, 26, 'Qui assumenda alias.', 5, '1983-10-18', '2016-10-14', 'Actif', 'Nemo velit quia temporibus in maiores. Ipsum eligendi ut recusandae maxime sit quas ullam. Aut recusandae alias labore quia sit sit voluptatem.', '904.36', 'https://via.placeholder.com/640x480.png/00ee99?text=business+adhesion+hic', 'Jettie Kertzmann', 'tkertzmann@example.org', '(347) 853-7325', 'directeur', 1, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(7, 23, 'Quasi omnis esse.', 2, '2002-07-30', '1972-06-26', 'Actif', 'Dolore et cumque itaque quia repellat quo et. Est nemo alias eveniet dolorem inventore quia. Vitae rem accusamus laborum.', '269.67', 'https://via.placeholder.com/640x480.png/0011dd?text=business+adhesion+modi', 'Eulah Johns', 'annette75@example.com', '1-820-620-6300', 'autre', 1, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(8, 15, 'Id quasi.', 2, '2006-04-16', '1992-11-22', 'Inactif', 'Magnam aliquam et doloremque vel inventore. Ut sunt rerum ut dolore est harum incidunt. Incidunt rerum soluta consequatur quia corrupti.', '496.77', 'https://via.placeholder.com/640x480.png/0077bb?text=business+adhesion+explicabo', 'Kole Lebsack', 'lora21@example.net', '1-469-390-8998', 'formateur', 1, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(9, 29, 'Quibusdam adipisci sint.', 1, '1980-08-29', '1994-06-04', 'Inactif', 'Voluptas autem fugiat consectetur voluptas exercitationem vitae quia veniam. At minima voluptas necessitatibus optio. Sed at amet laborum in dolorem.', '801.63', 'https://via.placeholder.com/640x480.png/000044?text=business+adhesion+officia', 'Margarette Kautzer', 'silas12@example.net', '(445) 728-6118', 'formateur', 1, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(10, 12, 'Quia reprehenderit cupiditate.', 3, '2013-04-25', '1987-06-15', 'Actif', 'Ut voluptatem vitae alias voluptatem qui. Quis consectetur reiciendis sed adipisci voluptatibus cum. Sit soluta quidem ex sapiente necessitatibus. Voluptas quidem deserunt sit molestiae quos optio.', '414.28', 'https://via.placeholder.com/640x480.png/00dddd?text=business+adhesion+accusamus', 'Dr. Scarlett Block IV', 'ooconnell@example.net', '520.498.7858', 'administrateur', 1, '2025-06-16 10:52:42', '2025-06-16 10:52:42');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etablissements`
--

CREATE TABLE `etablissements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_etablissement` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `region` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etablissements`
--

INSERT INTO `etablissements` (`id`, `nom_etablissement`, `adresse`, `ville`, `region`, `telephone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'ISTA Hay Hassani', NULL, 'Casablanca', 'Casablanca-Settat', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(2, 'ISTA Moulay Rachid', NULL, 'Casablanca', 'Casablanca-Settat', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(3, 'ISTA Sidi Bernoussi', NULL, 'Casablanca', 'Casablanca-Settat', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(4, 'ISTA Derb Ghallef', NULL, 'Casablanca', 'Casablanca-Settat', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(5, 'ISTA Lissasfa', NULL, 'Casablanca', 'Casablanca-Settat', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(6, 'ISGI Casablanca', NULL, 'Casablanca', 'Casablanca-Settat', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(7, 'ISTA El Jadida', NULL, 'El Jadida', 'Casablanca-Settat', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(8, 'ISTA Settat', NULL, 'Settat', 'Casablanca-Settat', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(9, 'ISTA Agdal', NULL, 'Rabat', 'Rabat-Salé-Kénitra', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(10, 'ISGI Rabat', NULL, 'Rabat', 'Rabat-Salé-Kénitra', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(11, 'CFM Rabat Yacoub El Mansour', NULL, 'Rabat', 'Rabat-Salé-Kénitra', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(12, 'CFM Témara', NULL, 'Témara', 'Rabat-Salé-Kénitra', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(13, 'ISTA Salé Tabriquet', NULL, 'Salé', 'Rabat-Salé-Kénitra', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(14, 'ISTA Kenitra', NULL, 'Kénitra', 'Rabat-Salé-Kénitra', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(15, 'ISTA Fès', NULL, 'Fès', 'Fès-Meknès', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(16, 'ISGI Fès', NULL, 'Fès', 'Fès-Meknès', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(17, 'ISTA Meknès', NULL, 'Meknès', 'Fès-Meknès', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(18, 'ISTA Ifrane', NULL, 'Ifrane', 'Fès-Meknès', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(19, 'ISTA Taza', NULL, 'Taza', 'Fès-Meknès', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(20, 'ISTA Marrakech Mhamid', NULL, 'Marrakech', 'Marrakech-Safi', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(21, 'ISTA Marrakech Daoudiate', NULL, 'Marrakech', 'Marrakech-Safi', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(22, 'ISTA Essaouira', NULL, 'Essaouira', 'Marrakech-Safi', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(23, 'ISTA Safi', NULL, 'Safi', 'Marrakech-Safi', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(24, 'ISTA Béni Mellal', NULL, 'Béni Mellal', 'Béni Mellal-Khénifra', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(25, 'ISTA Khouribga', NULL, 'Khouribga', 'Béni Mellal-Khénifra', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(26, 'ISTA Oujda', NULL, 'Oujda', 'Oriental', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(27, 'ISTA Nador', NULL, 'Nador', 'Oriental', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(28, 'ISTA Al Hoceima', NULL, 'Al Hoceima', 'Tanger-Tétouan-Al Hoceima', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(29, 'ISTA Tanger Beni Makada', NULL, 'Tanger', 'Tanger-Tétouan-Al Hoceima', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(30, 'ISTA Tétouan', NULL, 'Tétouan', 'Tanger-Tétouan-Al Hoceima', NULL, NULL, '2025-06-16 10:52:41', '2025-06-16 10:52:41');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nom_membre` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Actif',
  `Join_Date` date NOT NULL DEFAULT '2025-06-16',
  `Image` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `region` varchar(255) NOT NULL,
  `etablissement_id` bigint(20) UNSIGNED NOT NULL,
  `adhesion_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `Nom_membre`, `Email`, `Telephone`, `Status`, `Join_Date`, `Image`, `role`, `description`, `region`, `etablissement_id`, `adhesion_id`, `created_at`, `updated_at`) VALUES
(1, 'Jayda Padberg I', 'franecki.vincenzo@example.net', '+1-423-469-1935', 'Actif', '2019-06-11', 'https://via.placeholder.com/640x480.png/005588?text=people+Membre+et', 'administrateur', 'Dolore dolorem dolor dolorum ut et fuga.', 'Louisiana', 2, 7, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(2, 'Saul Lynch', 'mustafa.boehm@example.com', '+1-727-656-6803', 'Inactif', '2020-01-06', 'https://via.placeholder.com/640x480.png/001177?text=people+Membre+velit', 'directeur', 'Aliquid ea et ipsum rem in tempora dolorem.', 'Florida', 16, 1, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(3, 'Dr. Laurel Langworth', 'everett47@example.com', '1-906-625-0060', 'Inactif', '1970-08-05', 'https://via.placeholder.com/640x480.png/007788?text=people+Membre+ex', 'administrateur', 'Natus libero impedit quia qui.', 'Maryland', 17, 10, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(4, 'Prof. Michelle Goldner V', 'mmedhurst@example.com', '(984) 660-6088', 'Actif', '2019-10-01', 'https://via.placeholder.com/640x480.png/00aa44?text=people+Membre+accusamus', 'administrateur', 'Sint voluptates odit excepturi beatae magni.', 'Michigan', 26, 3, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(5, 'Mrs. Christiana Erdman Sr.', 'eleanore.glover@example.org', '(586) 959-7226', 'Actif', '1978-12-01', 'https://via.placeholder.com/640x480.png/000044?text=people+Membre+qui', 'formateur', 'Voluptas sit facere laboriosam in ducimus.', 'Maine', 4, 4, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(6, 'Priscilla Hermiston PhD', 'mcclure.margot@example.com', '(772) 591-2528', 'Actif', '1996-06-11', 'https://via.placeholder.com/640x480.png/000033?text=people+Membre+deserunt', 'formateur', 'Odio rerum mollitia optio velit error expedita excepturi.', 'California', 6, 4, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(7, 'Aurelia Jacobs', 'qgaylord@example.org', '1-252-303-3645', 'Inactif', '1983-01-17', 'https://via.placeholder.com/640x480.png/00ff55?text=people+Membre+excepturi', 'autre', 'Eaque aut voluptatum labore et officia.', 'Indiana', 10, 8, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(8, 'Laverna Harris', 'esperanza44@example.org', '+1 (910) 980-5360', 'Actif', '1997-01-15', 'https://via.placeholder.com/640x480.png/005566?text=people+Membre+omnis', 'administrateur', 'Fugiat voluptas eligendi quam illum doloremque.', 'Missouri', 15, 7, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(9, 'Leland Rippin', 'wmertz@example.org', '+1.520.576.2414', 'Actif', '1992-07-06', 'https://via.placeholder.com/640x480.png/00ffff?text=people+Membre+delectus', 'administrateur', 'Quasi distinctio voluptas quisquam harum facilis voluptate sit.', 'Mississippi', 18, 2, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(10, 'Ms. Makayla Kozey', 'wanda.harris@example.org', '310-524-6402', 'Actif', '2007-03-29', 'https://via.placeholder.com/640x480.png/008888?text=people+Membre+qui', 'autre', 'Magni quaerat occaecati esse et molestias recusandae aut.', 'Hawaii', 10, 2, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(11, 'Adrienne Borer', 'wunsch.ron@example.net', '+16507952556', 'Actif', '2025-01-24', 'https://via.placeholder.com/640x480.png/008833?text=people+Membre+aspernatur', 'formateur', 'Ullam voluptate sequi et illo.', 'Pennsylvania', 20, 1, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(12, 'Bennett Lemke', 'alvena.grady@example.com', '+1-762-518-8454', 'Actif', '1980-10-09', 'https://via.placeholder.com/640x480.png/0044ff?text=people+Membre+ducimus', 'directeur', 'Architecto incidunt omnis consequuntur quaerat hic assumenda et est.', 'North Dakota', 6, 6, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(13, 'Adrianna Wiza', 'brown.dylan@example.com', '+1 (346) 694-9490', 'Actif', '1995-10-02', 'https://via.placeholder.com/640x480.png/002211?text=people+Membre+possimus', 'directeur', 'Dolorem fugit maxime expedita labore fugit consequuntur voluptatem.', 'Oklahoma', 10, 10, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(14, 'Austyn Schimmel', 'trantow.angelica@example.com', '1-724-686-4960', 'Actif', '2021-12-11', 'https://via.placeholder.com/640x480.png/0055aa?text=people+Membre+tenetur', 'directeur', 'Velit est sed molestias soluta et ducimus aliquid.', 'South Dakota', 12, 7, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(15, 'Monty Raynor', 'dana.mills@example.org', '1-430-407-4432', 'Actif', '1991-11-11', 'https://via.placeholder.com/640x480.png/002233?text=people+Membre+aut', 'directeur', 'Accusantium cum exercitationem voluptate vel molestias a.', 'Arkansas', 3, 2, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(16, 'Sammie Brown Sr.', 'kallie.gislason@example.net', '612-537-7662', 'Inactif', '1975-03-16', 'https://via.placeholder.com/640x480.png/00ccdd?text=people+Membre+aliquid', 'formateur', 'Ex deserunt sint iusto magni molestiae explicabo rerum.', 'South Dakota', 20, 2, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(17, 'Dr. Shawn Morissette DDS', 'liliana75@example.org', '(947) 615-9465', 'Actif', '1993-04-15', 'https://via.placeholder.com/640x480.png/0055cc?text=people+Membre+reiciendis', 'formateur', 'Voluptatem sit impedit voluptatum modi aperiam.', 'Colorado', 7, 10, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(18, 'Katheryn Lebsack', 'amir04@example.net', '+1.906.379.7257', 'Actif', '2009-03-17', 'https://via.placeholder.com/640x480.png/0099ee?text=people+Membre+aliquid', 'directeur', 'Illum et dolorem voluptatem rerum ea saepe.', 'Pennsylvania', 19, 5, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(19, 'Leda Mohr', 'nayeli.turcotte@example.net', '+1-253-498-0283', 'Inactif', '1990-05-03', 'https://via.placeholder.com/640x480.png/004466?text=people+Membre+iste', 'directeur', 'Commodi autem dolorum quis temporibus et.', 'Iowa', 3, 1, '2025-06-16 10:52:42', '2025-06-16 10:52:42'),
(20, 'Darius Raynor', 'dpagac@example.com', '872.332.4052', 'Actif', '2020-08-07', 'https://via.placeholder.com/640x480.png/006644?text=people+Membre+dolore', 'administrateur', 'Velit ad dignissimos expedita est ipsa omnis minus.', 'Colorado', 15, 4, '2025-06-16 10:52:42', '2025-06-16 10:52:42');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_11_112433_create_personal_access_tokens_table', 1),
(5, '2025_06_11_125944_add_role_to_users_table', 1),
(6, '2025_06_11_133642_create_adhesions_table', 1),
(7, '2025_06_11_133909_create_type__adhesions_table', 1),
(8, '2025_06_11_135315_add_type_adhesion_id_to_adhesions_table', 1),
(9, '2025_06_14_085312_create_etablissements_table', 1),
(10, '2025_06_14_090427_add_etablissement_id_to_users_table', 1),
(11, '2025_06_14_090505_add_etablissement_id_to_adhesions_table', 1),
(12, '2025_06_15_111839_create_membres_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'react-app', '5d5cfba2c92415e54965a5218a0c8bd8fa0dd29617f0fe0e68e57747fef30b67', '[\"*\"]', '2025-06-16 16:58:16', NULL, '2025-06-16 10:53:15', '2025-06-16 16:58:16'),
(2, 'App\\Models\\User', 1, 'react-app', '9b54bba7f22f706c0cec5edd58dd5bb8b9048b1b061a39f8a3f95bb18ee98139', '[\"*\"]', '2025-06-16 17:36:51', NULL, '2025-06-16 16:58:35', '2025-06-16 17:36:51'),
(3, 'App\\Models\\User', 1, 'react-app', '17ae162f49d035db25097d8acb76b90866b94835ceb8259018462e21728134f4', '[\"*\"]', '2025-06-16 19:26:45', NULL, '2025-06-16 17:14:38', '2025-06-16 19:26:45'),
(4, 'App\\Models\\User', 1, 'react-app', '6db266abb364bfe22b72acafb019bc467cd8ce7325bf8ccebc6cd0919ef40d39', '[\"*\"]', '2025-06-16 20:29:19', NULL, '2025-06-16 17:37:44', '2025-06-16 20:29:19'),
(5, 'App\\Models\\User', 1, 'react-app', '85cdfd5e98f71766ef0f1c4fcdd84810de1a5ba0dc7114793aa1ececc96a0d0f', '[\"*\"]', NULL, NULL, '2025-06-16 21:19:42', '2025-06-16 21:19:42'),
(6, 'App\\Models\\User', 1, 'react-app', '8be122d59bd3a7da5ca87e88d4c5fd12c47a7cdf2fd7cbf605eb6b738e0d6ed2', '[\"*\"]', NULL, NULL, '2025-06-16 21:19:52', '2025-06-16 21:19:52'),
(7, 'App\\Models\\User', 1, 'react-app', 'c67259746bc164a1d1e7708c5db67b35c5ad390f6ce067e67b98b908152da320', '[\"*\"]', NULL, NULL, '2025-06-16 21:20:07', '2025-06-16 21:20:07'),
(8, 'App\\Models\\User', 1, 'react-app', '260f1d3b660bb4c02651e3933eaad60facc6d4d3e938261e491971c0ac67866e', '[\"*\"]', NULL, NULL, '2025-06-16 21:33:33', '2025-06-16 21:33:33'),
(9, 'App\\Models\\User', 1, 'react-app', '16f139cfed5843344a6ec13d55fccad4109c964f97f93d145b6c3bacbfa614bb', '[\"*\"]', NULL, NULL, '2025-06-16 21:34:18', '2025-06-16 21:34:18'),
(10, 'App\\Models\\User', 1, 'react-app', '6c3a8297394e8f5d3ee68132f3e31d273c1e4223732f087c6522a2d7a4e34890', '[\"*\"]', NULL, NULL, '2025-06-16 21:34:28', '2025-06-16 21:34:28'),
(11, 'App\\Models\\User', 1, 'react-app', 'db0b6d3c1c2870df7eecee91cb9d965ebd2e46d01b99f879aca9309372ddc1f1', '[\"*\"]', NULL, NULL, '2025-06-16 21:35:34', '2025-06-16 21:35:34'),
(12, 'App\\Models\\User', 1, 'react-app', 'e76f5a5f27701cd8acf88b6152d22f56cd97bb1ca723ee1cbfe15714ebb9d9d1', '[\"*\"]', NULL, NULL, '2025-06-16 21:40:33', '2025-06-16 21:40:33'),
(13, 'App\\Models\\User', 1, 'react-app', '41781c49aaf6e844fb4841e355fd266699050f1d286b90218e55279e68431162', '[\"*\"]', '2025-06-16 22:28:10', NULL, '2025-06-16 22:23:48', '2025-06-16 22:28:10');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_adhesions`
--

CREATE TABLE `type_adhesions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Type_Adhesion` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_adhesions`
--

INSERT INTO `type_adhesions` (`id`, `Type_Adhesion`, `Description`, `created_at`, `updated_at`) VALUES
(1, 'ut', 'Enim ipsum ducimus eos ea.', '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(2, 'sint', 'Nesciunt modi fugit et omnis ut voluptates repellendus.', '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(3, 'ut', 'Et voluptatibus nesciunt sunt expedita facilis voluptatem at.', '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(4, 'quibusdam', 'Adipisci perspiciatis aut incidunt.', '2025-06-16 10:52:41', '2025-06-16 10:52:41'),
(5, 'officiis', 'Quam pariatur omnis qui eligendi commodi omnis.', '2025-06-16 10:52:41', '2025-06-16 10:52:41');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `etablissement_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `etablissement_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 3, 'admin', 'el@adm.com', '2025-06-16 10:52:41', '$2y$12$UVdCtJOfTUqg6jirHWL4pONK8wwg4XMqzvkvnzNzuh8D7ur9UbNbu', 'ixgjOE4UeF', '2025-06-16 10:52:41', '2025-06-16 10:52:41', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adhesions`
--
ALTER TABLE `adhesions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adhesions_user_id_foreign` (`user_id`),
  ADD KEY `adhesions_type_adhesion_id_foreign` (`type_adhesion_id`),
  ADD KEY `adhesions_etablissement_id_foreign` (`etablissement_id`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `etablissements`
--
ALTER TABLE `etablissements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `membres_email_unique` (`Email`),
  ADD KEY `membres_etablissement_id_foreign` (`etablissement_id`),
  ADD KEY `membres_adhesion_id_foreign` (`adhesion_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `type_adhesions`
--
ALTER TABLE `type_adhesions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_etablissement_id_foreign` (`etablissement_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adhesions`
--
ALTER TABLE `adhesions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `etablissements`
--
ALTER TABLE `etablissements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `type_adhesions`
--
ALTER TABLE `type_adhesions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adhesions`
--
ALTER TABLE `adhesions`
  ADD CONSTRAINT `adhesions_etablissement_id_foreign` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `adhesions_type_adhesion_id_foreign` FOREIGN KEY (`type_adhesion_id`) REFERENCES `type_adhesions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `adhesions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `membres_adhesion_id_foreign` FOREIGN KEY (`adhesion_id`) REFERENCES `adhesions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `membres_etablissement_id_foreign` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissements` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_etablissement_id_foreign` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissements` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
