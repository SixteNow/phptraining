-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 20 mai 2024 à 10:19
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `training`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `idpost` int NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  `date` text NOT NULL,
  `auteur` text NOT NULL,
  PRIMARY KEY (`idpost`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`idpost`, `titre`, `contenu`, `date`, `auteur`) VALUES
(2, 'Un nouveau post', 'LOOOOL', '20242024AprAprTueTue', 'Sixtenow'),
(3, 'Un autre post', 'Go', 'TueApr2024', 'Sixtenow'),
(4, 'Allez', 'Go', 'Tue/Apr/2024', 'Sixtenow'),
(5, 'Salut', 'Article', '2024-05-13 09:13:21', 'Sixtenow'),
(7, 'Salut', 'Ici', '2024-05-13 10:56:14', 'Alexi'),
(8, 'Article sur UPDATE', 'PHP MySQL Update Data\nUpdate Data In a MySQL Table Using MySQLi and PDO\nThe UPDATE statement is used to update existing records in a table:\n\nUPDATE table_name\nSET column1=value, column2=value2,...\nWHERE some_column=some_value \nNotice the WHERE clause in the UPDATE syntax: The WHERE clause specifies which record or records that should be updated. If you omit the WHERE clause, all records will be updated!\n\nTo learn more about SQL, please visit our SQL tutorial.\n\nLet\'s look at the \"MyGuests\" table:\n\nid	firstname	lastname	email	reg_date\n1	John	Doe	john@example.com	2014-10-22 14:26:15\n2	Mary	Moe	mary@example.com	2014-10-23 10:22:30\nThe following examples update the record with id=2 in the \"MyGuests\" table:\n\nExample (MySQLi Object-oriented)\n', '2024-05-13 12:06:02', 'Sixtenow'),
(9, 'Article', 'PHP MySQL Update Data Update Data In a MySQL Table \r\nUsing MySQLi and PDO \r\nThe UPDATE statement is used to update existing records in a table: UPDATE table_name SET column1=value, column2=value2,... WHERE some_column=some_value \r\nNotice the WHERE clause in the UPDATE syntax: \r\nThe WHERE clause specifies which record or records that should be updated. \r\nIf you omit the WHERE clause, all records will be updated! \r\nTo learn more about SQL, please visit our SQL tutorial. \r\nLet\'s look at the \"MyGuests\" table: id firstname lastname email reg_date 1 John Doe john@example.com 2014-10-22 14:26:15 2 Mary Moe mary@example.com 2014-10-23 10:22:30 \r\nThe following examples update the record with id=2 in the \"MyGuests\" table: Example (MySQLi Object-oriented)', '2024-05-13 12:11:04', 'Sixtenow');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int NOT NULL AUTO_INCREMENT,
  `id_post` int NOT NULL,
  `pseudo` text NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id_comment`, `id_post`, `pseudo`, `contenu`) VALUES
(1, 9, 'Sixtenow', 'Bonjour'),
(2, 9, 'Sixtenow', 'Salut les kheys'),
(3, 8, 'Sixtenow', 'J\'ai souvent essayé d\'utiliser UPDATE sans succès, merci!!!'),
(4, 8, 'Alexi', 'Un nouveau');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mdp` text NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `bio` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `nom`, `prenom`, `mdp`, `photo`, `bio`) VALUES
(10, 'Jos', 'Josue', 'Nothing', '0000', './images/090420240900.jpg', NULL),
(9, 'Alexi', 'Kormora', 'Alligator', '0000', './images/090420240848.jpg', 'I am the Bone of my Sword Steel is my Body and Fire is my Blood I have created over a Thousand Blades Unaware of Loss, Nor aware of Gain. Withstood Pain to create Weapons, Waiting for one’s Arrival I have no Regrets. This is the only Path My whole life was Unlimited Blade Works! \n\nIt is what is is buddy!!'),
(8, 'Sixtenow', 'Sixte', 'Nothin\'', '0000', './images/090420240449.jpg', 'Pas de bio');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
