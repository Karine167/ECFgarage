-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : lun. 19 fév. 2024 à 15:42
-- Version du serveur : 11.2.2-MariaDB
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecfgarage`
--

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'Ford'),
(2, 'Renault'),
(3, 'Peugeot'),
(4, 'Fiat'),
(5, 'BMW'),
(6, 'skoda'),
(7, 'Tesla'),
(8, 'Opel'),
(9, 'Land-Rover'),
(10, 'Mitsubishi'),
(11, 'Chrysler'),
(12, 'Audi'),
(13, 'Honda'),
(14, 'Seat'),
(15, 'Volkswagen'),
(16, 'Dacia'),
(17, 'Aston Martin');

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(1, 'Bleu'),
(2, 'Noir'),
(3, 'Blanc'),
(4, 'Rouge'),
(5, 'Gris'),
(6, 'Argent'),
(7, 'Beige'),
(8, 'Bordeau'),
(9, 'Vert'),
(10, 'Violet');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephon` varchar(20) NOT NULL,
  `content` longtext NOT NULL,
  `acceptance` tinyint(1) NOT NULL,
  `comment` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `telephon`, `content`, `acceptance`, `comment`) VALUES
(1, 'FirstName0', 'LastName0', 'email0@test.com', '0035604800', 'Demande de contact n°1', 1, 'Pas réussi à le joindre.'),
(5, 'FirstName4', 'LastName4', 'email4@test.com', '0435644804', 'Demande de contact n°5', 1, NULL),
(6, 'Jean', 'Laroche', 'jean.laroche@test.com', '0321536245', 'Bonjour, j\'aimerai avoir des informations sur ...', 1, NULL),
(7, 'Jacques', 'Langues', 'jl@test.com', '0125656891', '1FordFiesta : Bonjour, je voudrais...', 1, NULL),
(8, 'Jeanne', 'Martin', 'jm@test.com', '0532659815', '2FordMustang : Bonjour, j\'aimerai avoir plus d\'informations dur ce véhicule.', 1, NULL),
(9, 'Karine', 'Galois', 'rg@test.com', '0235689545', 'contact : Bonjour, ...', 1, NULL),
(10, 'Noémie', 'Campbell', 'nc@test.com', '1253232121', 'Entretien_Revision : Bonjour, ...', 1, NULL),
(11, 'Théo', 'Alpes', 'ta@test.com', '1346578765433131', 'Mecanique : Salut, ....', 1, 'n° de tel incorrect, envoyé un mail le 14/02/24'),
(12, 'François', 'Advent', 'fa@test.com', '0235689856', 'Ventes : Salut, ...', 1, NULL),
(13, 'Benoit', 'Grand', 'bg@test.com', '0425356984', 'Entretien_Revision : Bonjour, ...', 1, NULL),
(15, 'René', 'Dupond', 'rd@test.com', '0125364589', 'Entretien_Revision : Bonjour, ...', 1, NULL),
(16, 'Stéphanie', 'Duby', 'sd@test.com', '0523649876', '3Fiat500 : Bonjour, ..', 1, NULL),
(17, 'Alexis', 'Dubois', 'ad@test.com', '0504263589', 'contact : Bonjour, ...', 1, NULL),
(18, 'Sylvie', 'Durand', 'sd@test.com', '0235563865', 'Mecanique : Bonjour, ...', 1, NULL),
(19, 'Arnaud', 'Paris', 'ap@test.com', '0632456895', '1FordFiesta : Salut, ...', 1, 'Demande en cours de traitement : viendra essayer le véhicule vendredi soir'),
(20, 'Bertrand', 'Herso', 'bh@test.com', '0235614875', '3Fiat500 : Bonjour, ....', 1, NULL),
(22, 'Richard', 'Coeur de Lion', 'rc@test.com', '0213456524', 'Bonjour, ...', 1, NULL),
(23, 'Thierry', 'Lhermite', 'tl@test.com', '0315264645', 'Salut,  ...', 1, NULL),
(24, 'Christelle', 'Joser', 'cj@test.com', '0325641532', 'formContact : Bonjour, ...', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact_user`
--

DROP TABLE IF EXISTS `contact_user`;
CREATE TABLE IF NOT EXISTS `contact_user` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`contact_id`,`user_id`),
  KEY `IDX_A56C54B6E7A1254A` (`contact_id`),
  KEY `IDX_A56C54B6A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact_user`
--

INSERT INTO `contact_user` (`contact_id`, `user_id`) VALUES
(1, 3),
(11, 3),
(19, 3);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240201172237', '2024-02-01 17:27:03', 55),
('DoctrineMigrations\\Version20240203093009', '2024-02-03 09:31:30', 49),
('DoctrineMigrations\\Version20240203101903', '2024-02-03 10:19:16', 301),
('DoctrineMigrations\\Version20240203104238', '2024-02-03 10:42:46', 78),
('DoctrineMigrations\\Version20240203111857', '2024-02-03 11:19:04', 90),
('DoctrineMigrations\\Version20240203133850', '2024-02-03 13:39:22', 118),
('DoctrineMigrations\\Version20240203144756', '2024-02-03 14:48:06', 26),
('DoctrineMigrations\\Version20240204104634', '2024-02-04 10:47:21', 86),
('DoctrineMigrations\\Version20240205081338', '2024-02-05 08:14:11', 33),
('DoctrineMigrations\\Version20240208105124', '2024-02-08 10:52:03', 1060),
('DoctrineMigrations\\Version20240208132418', '2024-02-08 13:24:44', 33),
('DoctrineMigrations\\Version20240208153614', '2024-02-08 15:36:46', 57),
('DoctrineMigrations\\Version20240208171245', '2024-02-08 17:13:16', 59),
('DoctrineMigrations\\Version20240208175805', '2024-02-08 17:58:13', 106),
('DoctrineMigrations\\Version20240208180803', '2024-02-08 18:08:13', 166),
('DoctrineMigrations\\Version20240209093357', '2024-02-09 09:34:09', 169),
('DoctrineMigrations\\Version20240209094818', '2024-02-09 09:48:23', 61),
('DoctrineMigrations\\Version20240209095058', '2024-02-09 09:51:04', 123),
('DoctrineMigrations\\Version20240209095651', '2024-02-09 09:56:57', 322),
('DoctrineMigrations\\Version20240217134439', '2024-02-17 13:45:25', 64);

-- --------------------------------------------------------

--
-- Structure de la table `energy`
--

DROP TABLE IF EXISTS `energy`;
CREATE TABLE IF NOT EXISTS `energy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `energy` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `energy`
--

INSERT INTO `energy` (`id`, `energy`) VALUES
(1, 'Essence'),
(2, 'Diesel'),
(3, 'GPL'),
(4, 'Electrique'),
(5, 'Hybride');

-- --------------------------------------------------------

--
-- Structure de la table `equipments`
--

DROP TABLE IF EXISTS `equipments`;
CREATE TABLE IF NOT EXISTS `equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipments`
--

INSERT INTO `equipments` (`id`, `equipment`) VALUES
(1, 'Direction assistée'),
(2, 'ABS'),
(3, 'Vitres électriques'),
(4, 'Fermeture centralisée des portes'),
(5, 'Ordinateur de bord'),
(6, 'Régulateur de vitesse'),
(7, 'Climatisation'),
(9, 'Airbags'),
(10, 'Projecteurs antibrouillard'),
(11, 'Phares LED'),
(12, 'Sécurité enfant sur les vitres arrières');

-- --------------------------------------------------------

--
-- Structure de la table `galery`
--

DROP TABLE IF EXISTS `galery`;
CREATE TABLE IF NOT EXISTS `galery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `vehicle_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B5D5320545317D1` (`vehicle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `galery`
--

INSERT INTO `galery` (`id`, `image_name`, `image_size`, `updated_at`, `vehicle_id`) VALUES
(1, 'ford-fiesta-5567676-640-65ca47f2dbc1d445976872.jpg', 138360, '2024-02-12 16:31:46', 1),
(2, 'mustang-1703538-640-65cdf02f498f1494729941.jpg', 89631, '2024-02-15 11:06:23', 2),
(3, 'ford-mustang-2342343-640-65ca489ea2795278117752.jpg', 39044, '2024-02-12 16:34:38', 2),
(4, 'car-6969508-640-65ca48ae2a66b743782861.jpg', 90996, '2024-02-12 16:34:54', 2),
(5, 'car-3319816-640-65ca48031f8d7631998095.jpg', 71916, '2024-02-12 16:32:03', 1),
(6, 'rim-5060652-640-65ca481265085832225596.jpg', 89142, '2024-02-12 16:32:18', 1),
(7, 'fiat-500-466107-640-65ca49f5921b2297180761.jpg', 114434, '2024-02-12 16:40:21', 3),
(8, 'automobile-3292496-640-65ca4a03918ac064058514.jpg', 68777, '2024-02-12 16:40:35', 3),
(10, 'bmw-3-series-4129326-640-65ca4e821ce32881968817.jpg', 87370, '2024-02-12 16:59:46', 4),
(11, 'bmw-416687-1280-65ca4e8f902f2734342460.jpg', 331759, '2024-02-12 16:59:59', 4),
(12, 'bmw-6686533-640-65ca4ea3d8113026114847.jpg', 62449, '2024-02-12 17:00:19', 4),
(13, 'ford-440863-640-65cdc99411e55941996055.jpg', 110208, '2024-02-15 08:21:40', 5),
(15, 'ford-440858-640-65cdc9b9d735e928560409.jpg', 95279, '2024-02-15 08:22:17', 5),
(16, 'ford-440876-640-65cdc9c9c4ee3047094735.jpg', 77343, '2024-02-15 08:22:33', 5),
(17, 'fall-3413578-640-65cf777183e77391021185.jpg', 170823, '2024-02-16 14:55:45', 6),
(18, 'ford-5067886-640-65cf777e7f01b134437634.jpg', 63711, '2024-02-16 14:55:58', 6),
(19, 'vw-4332807-640-65d099bde42f9456296406.jpg', 93386, '2024-02-17 11:34:21', 7);

-- --------------------------------------------------------

--
-- Structure de la table `infos`
--

DROP TABLE IF EXISTS `infos`;
CREATE TABLE IF NOT EXISTS `infos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `content` longtext DEFAULT NULL,
  `hide` tinyint(1) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_EECA826D64D218E` (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `infos`
--

INSERT INTO `infos` (`id`, `location_id`, `label`, `content`, `hide`, `image_name`, `image_size`, `updated_at`) VALUES
(1, 1, 'Entre vous et nous', '<h1>Confiez nous votre véhicule sans aucune crainte, elle est entre de bonnes mains !</h1>', 0, 'ford-mustang-gt-drawing-60-65c0aac5da867946631443.jpg', 62848, '2024-02-05 09:30:45'),
(2, 3, 'Horaires d\'ouverture :', '<div><strong>Du lundi au vendredi :</strong><br>&nbsp; &nbsp; &nbsp; 8h30 - 12h00 et 14h-18h30<br><strong>Le samedi : </strong><br>&nbsp; &nbsp; &nbsp; 8h30 -12h et 14h-16h30<br><br></div>', 0, NULL, NULL, '2024-02-05 09:00:36'),
(5, 4, 'Horaires d\'ouverture :', '<div><strong>Lundi :</strong> 8h30-12h&nbsp; et 14h-18h30<br><strong>Mardi :</strong> 8h30-12h&nbsp; et 14h-18h30<br><strong>Mercredi : </strong>8h30-12h&nbsp; et 14h-18h30<br><strong>Jeudi : </strong>8h30-12h&nbsp; et 14h-18h30<br><strong>Vendredi :</strong> 8h30-12h&nbsp; et 14h-18h30<br><strong>Samedi :</strong> 8h30-12h&nbsp; et 14h-16h30<br><strong>Dimanche :</strong> fermé</div>', 0, NULL, NULL, NULL),
(6, 6, 'Nous Contacter :', '<div><strong><em>Adresse :</em></strong><strong> </strong><br>Garage Vincent Parrot,<br>80 rue du parc des princes, <br>32561 GarageVilles<br><br><strong><em>N° de téléphone :</em></strong> 0165826525</div>', 0, NULL, NULL, NULL),
(7, 5, 'Contact :', '<div><strong><em>Adresse :&nbsp;</em></strong>Garage Vincent Parrot,<br>80 rue du parc des princes, 32561 GarageVilles<br><strong><em>N° de téléphone :</em></strong> 0165826525</div>', 0, NULL, NULL, NULL),
(9, 2, 'Entre vous et nous', '<div><strong>N\'hésitez pas à nous confier votre voiture, elle est entre de bonnes mains !</strong></div><div><br></div><div>Nous sommes une petite entreprise familiale et la satisfaction de nos clients est notre priorité. Vous trouverez ci-dessous quelques témoignages qui vous convaincront, j\'en suis certain, du sérieux de nos techniciens.</div>', 0, 'ford-mustang-gt-drawing-60-65c3973727733747202081.jpg', 62848, '2024-02-07 14:44:07'),
(12, 8, 'Entretien / Révision', '<div>Nous assurons l\'entretien régulier de votre véhicule grâce à des révisions annuelles, et en suivant scrupuleusement des recommandations des constructeurs.<br>Nous pouvons également prévoir une visite pour préparer le contrôle technique afin d\'éviter toute mauvaise surprise et même nous charger de faire passer le contrôle technique à votre véhicule.</div>', 0, 'workshop-2304745-640-65c3a08f4e229730976540.jpg', 108491, '2024-02-07 15:23:59'),
(13, 10, 'Réparation Carrosserie', '<div>Un petit choc, un accident, de la grêle... C\'est si vite arrivé !<br>La carrosserie de votre véhicule peut facilement être réparée, redressée, refaite, ou si besoin repeinte et vous retrouverez rapidement un véhicule aussi beau que lorsque vous l\'avez acheté !&nbsp;</div>', 0, 'sheet-metal-repair-1749671-640-65c3a48401b99751527854.jpg', 55355, '2024-02-07 15:40:52'),
(14, 12, 'Réparation mécanique', '<div>Un démarrage difficile, un petit bruit de claquement, une vitesse qui accroche... Forcément, avec le temps, certaines pièces mécaniques s\'usent et doivent être réparées ou changées. C\'est là que notre équipe de mécaniciens entre en jeu.&nbsp;</div>', 0, 'mechanical-engineering-2993233-640-65c3a8cf55822284571725.jpg', 38935, '2024-02-07 15:59:11'),
(15, 7, 'Entretien / Révision', '<div>Nous assurons l\'entretien régulier de votre véhicule grâce à des révisions périodiques.<br>Nous pouvons également&nbsp; nous occuper du contrôle technique de votre véhicule.</div>', 0, 'workshop-2304745-640-65c3ab1b7732f453909638.jpg', 108491, '2024-02-07 16:08:59'),
(16, 9, 'Réparation Carrosserie', '<div>Un petit choc, un accident, de la grêle... C\'est si vite arrivé !<br>La carrosserie de votre véhicule peut facilement être réparée, redressée, refaite, ou si besoin repeinte !</div>', 0, 'sheet-metal-repair-1749671-640-65c3ab60685df259269609.jpg', 55355, '2024-02-07 16:10:08'),
(17, 11, 'Réparation mécanique', '<div>Un démarrage difficile, un petit bruit de claquement, une vitesse qui accroche... Forcément, avec le temps, certaines pièces mécaniques s\'usent et doivent être réparées ou changées.&nbsp;</div>', 0, 'mechanical-engineering-2993233-640-65c3ab95c1b85856183883.jpg', 38935, '2024-02-07 16:11:01'),
(18, 13, 'Vente de véhicules d\'occasion', '<div>Nous vous proposons une large gamme de véhicules d\'occasion, venez les voir de plus près et même les essayer ! &nbsp;</div>', 0, 'car-63930-640-65c3b813301b0988123952.jpg', 89581, '2024-02-07 17:04:19'),
(19, 14, 'Vente de véhicules d\'occasion', '<div>Nous vous proposons une large gamme de véhicules d\'occasion, venez les voir de plus près et même les essayer ! &nbsp;<br>Vous trouverez sur la section dédiée, une liste de tous les véhicules que nous avons en stock et pour chaque véhicule une fiche détaillée de ses caractéristiques techniques.</div>', 0, 'car-63930-640-65c3b84b8a2e4628596930.jpg', 89581, '2024-02-07 17:05:15'),
(20, 15, 'Logo', NULL, 0, 'logo-65c4a0a6c9468848754981.png', 110140, '2024-02-08 09:36:38'),
(23, 4, 'En vacances', '<div>Le garage sera fermé du 5 au 12 juillet.</div>', 1, 'construction-site-3279650_640.jpg', NULL, NULL),
(24, 2, 'Promotion', '<div>En ce moment, nous vous proposons une promotion sur nos filtres à air !&nbsp;</div>', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id`, `position`) VALUES
(1, 'warningM'),
(2, 'warningD'),
(3, 'scheduleM'),
(4, 'scheduleD'),
(5, 'contactM'),
(6, 'contactD'),
(7, 'info1M'),
(8, 'info1D'),
(9, 'info2M'),
(10, 'info2D'),
(11, 'info3M'),
(12, 'info3D'),
(13, 'info4M'),
(14, 'info4D'),
(15, 'logo');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D79572D944F5D008` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model`
--

INSERT INTO `model` (`id`, `brand_id`, `model`) VALUES
(1, 1, 'Mustang'),
(2, 3, '504'),
(3, 4, 'Tipo'),
(4, 1, 'Fiesta'),
(5, 4, '500'),
(6, 5, 'Série 3'),
(7, 1, 'Mondéo'),
(8, 15, 'Golf'),
(9, 2, 'Megane');

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id`, `option_name`) VALUES
(1, 'Becquet arrière'),
(2, 'prise USB'),
(3, 'Aide au freinage d\'urgence'),
(4, 'Aide au stationnement'),
(5, 'Lecteur DVD'),
(6, 'Jantes Alliage'),
(7, 'Système de surveillance d\'angle mort'),
(8, 'Aide au maintien de trajectoire'),
(9, 'Caméra de recul'),
(10, 'Banquette rabattable'),
(11, 'Attache remorque'),
(12, 'Toit ouvrant'),
(14, 'Vitres teintées');

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `rate` smallint(6) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_794381C6A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `review`
--

INSERT INTO `review` (`id`, `user_id`, `username`, `content`, `rate`, `approved`) VALUES
(1, 3, 'jose', 'je trouve ce garage très professionnel', 5, 1),
(3, 3, 'Fanfan', 'Je suis heureux d\'avoir trouvé mon nouveau véhicule dans ce garage. Les conseils du vendeur ont été très utiles.', 4, 1),
(4, 3, 'Jean', 'J\'ai dû attendre plus d\'une semaine avant que ma voiture ne me soit rendue, alors qu\'il ne s\'agissait que de changer la batterie !', 2, 1),
(5, 3, 'René', 'J\'aime beaucoup ce garage dans lequel l\'intérêt du client prime avant tout.', 4, 1),
(6, 3, 'Corinne', 'Très déçue par les prestations de ce garage', 1, 1),
(7, 7, 'Chloé', 'J\'adore faire entretenir ma voiture dans ce garage', 5, 1),
(8, NULL, 'Elsa', 'Ce garage est convenable', 3, 0),
(9, 7, 'Dédé', 'Je fais entièrement confiance aux professionnels de ce garage', 4, 1),
(10, NULL, 'Boris', 'Bonjour, ....', 4, 0),
(11, NULL, 'Christelle', 'Bonjour, j\'ai déjà plusieurs fois fait révisé ma voiture dans ce garage....', 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `second_hand_car`
--

DROP TABLE IF EXISTS `second_hand_car`;
CREATE TABLE IF NOT EXISTS `second_hand_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `price` decimal(12,2) NOT NULL,
  `kilometers` int(11) NOT NULL,
  `circulation_year` date NOT NULL,
  `fiscal_power` smallint(6) DEFAULT NULL,
  `din_power` smallint(6) DEFAULT NULL,
  `doors` smallint(6) DEFAULT NULL,
  `seats` smallint(6) DEFAULT NULL,
  `auto_gear_box` tinyint(1) NOT NULL,
  `critair_nb` smallint(6) DEFAULT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3DA7E38FA76ED395` (`user_id`),
  KEY `IDX_3DA7E38FC54C8C93` (`type_id`),
  KEY `IDX_3DA7E38F7975B7E7` (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `second_hand_car`
--

INSERT INTO `second_hand_car` (`id`, `user_id`, `type_id`, `model_id`, `reference`, `price`, `kilometers`, `circulation_year`, `fiscal_power`, `din_power`, `doors`, `seats`, `auto_gear_box`, `critair_nb`, `create_date`) VALUES
(1, 5, 1, 4, 'FordFiesta1', 12300.00, 125000, '2018-06-08', 3, 100, 4, 5, 0, 2, '2024-02-08'),
(2, 5, 1, 1, 'FordMustang2', 27500.00, 68000, '2022-02-17', 5, 130, 4, 4, 1, 2, '2024-02-08'),
(3, 5, 1, 5, 'Fiat127-3', 4200.00, 251000, '1991-06-19', 3, 120, 4, 4, 0, 4, '2024-02-08'),
(4, 3, 1, 6, 'BMWserie3-4', 38000.00, 25000, '2023-02-10', 5, 180, 4, 5, 1, 1, '2024-02-12'),
(5, 3, 1, 7, 'FordMondéo-5', 28000.00, 104000, '2022-12-15', 5, 140, 4, 5, 1, 1, '2024-02-15'),
(6, 3, 1, 4, 'FordFiesta-6', 8500.00, 170000, '2015-06-16', 4, 100, 4, 4, 0, 3, '2024-02-16'),
(7, 1, 5, 8, 'VolkswagenGolf-7', 6700.00, 210000, '2014-02-17', 5, 120, 4, 4, 0, 3, '2024-02-17'),
(8, NULL, 5, 5, NULL, 12300.00, 125000, '2002-03-06', NULL, NULL, 4, 4, 0, NULL, '2024-02-21'),
(9, NULL, 1, 3, NULL, 5500.00, 56000, '1990-11-17', NULL, NULL, 4, 4, 0, NULL, '2024-02-06'),
(10, NULL, 5, 5, NULL, 6700.00, 125000, '2010-08-17', NULL, NULL, NULL, NULL, 0, NULL, '2024-02-08');

-- --------------------------------------------------------

--
-- Structure de la table `second_hand_car_color`
--

DROP TABLE IF EXISTS `second_hand_car_color`;
CREATE TABLE IF NOT EXISTS `second_hand_car_color` (
  `second_hand_car_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  PRIMARY KEY (`second_hand_car_id`,`color_id`),
  KEY `IDX_90F3E808B1C90FD4` (`second_hand_car_id`),
  KEY `IDX_90F3E8087ADA1FB5` (`color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `second_hand_car_color`
--

INSERT INTO `second_hand_car_color` (`second_hand_car_id`, `color_id`) VALUES
(1, 4),
(2, 1),
(2, 3),
(4, 5),
(5, 5),
(6, 2),
(7, 5);

-- --------------------------------------------------------

--
-- Structure de la table `second_hand_car_energy`
--

DROP TABLE IF EXISTS `second_hand_car_energy`;
CREATE TABLE IF NOT EXISTS `second_hand_car_energy` (
  `second_hand_car_id` int(11) NOT NULL,
  `energy_id` int(11) NOT NULL,
  PRIMARY KEY (`second_hand_car_id`,`energy_id`),
  KEY `IDX_40EA0EDFB1C90FD4` (`second_hand_car_id`),
  KEY `IDX_40EA0EDFEDDF52D` (`energy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `second_hand_car_energy`
--

INSERT INTO `second_hand_car_energy` (`second_hand_car_id`, `energy_id`) VALUES
(1, 2),
(2, 1),
(2, 4),
(2, 5),
(4, 1),
(5, 1),
(5, 4),
(5, 5),
(6, 2),
(7, 1),
(9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `second_hand_car_equipments`
--

DROP TABLE IF EXISTS `second_hand_car_equipments`;
CREATE TABLE IF NOT EXISTS `second_hand_car_equipments` (
  `second_hand_car_id` int(11) NOT NULL,
  `equipments_id` int(11) NOT NULL,
  PRIMARY KEY (`second_hand_car_id`,`equipments_id`),
  KEY `IDX_AAE60B9EB1C90FD4` (`second_hand_car_id`),
  KEY `IDX_AAE60B9EBD251DD7` (`equipments_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `second_hand_car_equipments`
--

INSERT INTO `second_hand_car_equipments` (`second_hand_car_id`, `equipments_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(7, 1),
(7, 2),
(7, 3),
(7, 7),
(7, 9);

-- --------------------------------------------------------

--
-- Structure de la table `second_hand_car_options`
--

DROP TABLE IF EXISTS `second_hand_car_options`;
CREATE TABLE IF NOT EXISTS `second_hand_car_options` (
  `second_hand_car_id` int(11) NOT NULL,
  `options_id` int(11) NOT NULL,
  PRIMARY KEY (`second_hand_car_id`,`options_id`),
  KEY `IDX_41866D67B1C90FD4` (`second_hand_car_id`),
  KEY `IDX_41866D673ADB05F1` (`options_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `second_hand_car_options`
--

INSERT INTO `second_hand_car_options` (`second_hand_car_id`, `options_id`) VALUES
(1, 3),
(1, 6),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(6, 5),
(7, 11);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'Berline'),
(2, 'Coupé'),
(3, 'SUV'),
(4, 'Break'),
(5, 'Citadine'),
(6, 'Monospace'),
(7, 'Utilitaire'),
(8, 'Compacte'),
(9, '4x4');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `telephon` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`, `telephon`, `address`) VALUES
(1, 'vparrot@test.com', '[\"ROLE_ADMIN\",\"ROLE_EMPLOYEE\"]', '$2y$13$mjZqq0JUpAACaX3AK05pf.pLd/DoygN7iyoFzjfrdsDfuPegDsHlO', 'Vincent', 'Parrot', '0526351423', '25 allée du château 32561 GarageVilles'),
(3, 'johndoe@test.com', '[\"ROLE_EMPLOYEE\"]', '$2y$13$iW42aZN4VFvFurVRK7WF4udZfDZbsrw7caCXxwiHlLyqOAwTw24di', 'John', 'Doe', '0256354896', '36 rue du parc 32561 GarageVilles'),
(5, 'jeannedarc@test.com', '[\"ROLE_EMPLOYEE\"]', '$2y$13$qZ1QHqI1CVA1NiJ12D/n5e7HSHx5bGeFxYQM/wIGVSBx4uxAmf0M2', 'Jeanne', 'Darc', '0526483658', '125 avenue de Saint-Exupéry 32561 GarageVilles'),
(7, 'patrickroy@test.com', '[\"ROLE_EMPLOYEE\"]', '$2y$13$/t3q3.9dIHZzNcHbxp4/1u6EQAPT.nvzNv0UmBgCqjm54ueA2CCMm', 'Patrick', 'Roy', '0526349871', '152 rue du marché 32561 GarageVilles'),
(8, 'jacquesdupond@test.com', '[\"ROLE_EMPLOYEE\"]', '$2y$13$79kcaw7E8s9rjNwuTVQWkusniS1mHrNKSurX8KYUBFafGprrfnziy', 'Jacques', 'Dupond', '0256489632', '256 rue des étoiles 32561 GarageVilles'),
(9, 'theodavid@test.com', '[\"ROLE_EMPLOYEE\"]', '$2y$13$miCg06X6X.FNmlmqKidvxeUOnoZGM35W/vCyfk/zCynTvORacot1.', 'Théo', 'David', '0523614789', '562 allée des peupliers 32561 GarageVilles'),
(10, 'elsajery@test.com', '[\"ROLE_EMPLOYEE\"]', '$2y$13$CQGNYGY/9L//RNuchpuuEen8kJYOVN5h1mwI7qwomnGptEPRYbR5q', 'Elsa', 'Jery', '0125364895', '415 rue des fleurs 32561 GarageVilles');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact_user`
--
ALTER TABLE `contact_user`
  ADD CONSTRAINT `FK_A56C54B6A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A56C54B6E7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `FK_B5D5320545317D1` FOREIGN KEY (`vehicle_id`) REFERENCES `second_hand_car` (`id`);

--
-- Contraintes pour la table `infos`
--
ALTER TABLE `infos`
  ADD CONSTRAINT `FK_EECA826D64D218E` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`);

--
-- Contraintes pour la table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `FK_D79572D944F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);

--
-- Contraintes pour la table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_794381C6A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `second_hand_car`
--
ALTER TABLE `second_hand_car`
  ADD CONSTRAINT `FK_3DA7E38F7975B7E7` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  ADD CONSTRAINT `FK_3DA7E38FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_3DA7E38FC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

--
-- Contraintes pour la table `second_hand_car_color`
--
ALTER TABLE `second_hand_car_color`
  ADD CONSTRAINT `FK_90F3E8087ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_90F3E808B1C90FD4` FOREIGN KEY (`second_hand_car_id`) REFERENCES `second_hand_car` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `second_hand_car_energy`
--
ALTER TABLE `second_hand_car_energy`
  ADD CONSTRAINT `FK_40EA0EDFB1C90FD4` FOREIGN KEY (`second_hand_car_id`) REFERENCES `second_hand_car` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_40EA0EDFEDDF52D` FOREIGN KEY (`energy_id`) REFERENCES `energy` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `second_hand_car_equipments`
--
ALTER TABLE `second_hand_car_equipments`
  ADD CONSTRAINT `FK_AAE60B9EB1C90FD4` FOREIGN KEY (`second_hand_car_id`) REFERENCES `second_hand_car` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AAE60B9EBD251DD7` FOREIGN KEY (`equipments_id`) REFERENCES `equipments` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `second_hand_car_options`
--
ALTER TABLE `second_hand_car_options`
  ADD CONSTRAINT `FK_41866D673ADB05F1` FOREIGN KEY (`options_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_41866D67B1C90FD4` FOREIGN KEY (`second_hand_car_id`) REFERENCES `second_hand_car` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
