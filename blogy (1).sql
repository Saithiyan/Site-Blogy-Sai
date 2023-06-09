-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 09 juin 2023 à 14:59
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogy`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `postID` int NOT NULL,
  `contenuCom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `userID`, `postID`, `contenuCom`) VALUES
(1, 4, 26, 'Premier com de sai le CHat GPT !'),
(2, 4, 26, 'Deuxieme Commentaire de SAI le CHAT GPT4'),
(3, 4, 9, 'YO\r\n'),
(4, 3, 26, 'NEW COM du NEW DEV FULLSTACK !'),
(5, 3, 26, 'Salut');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `titre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contenu` text NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `userID`, `titre`, `contenu`, `img`, `date`) VALUES
(25, 6, 'aaaaaa', 'aaaaa', NULL, '2023-06-09 08:22:01'),
(26, 4, 'How to center a fucking div ?', ' different methods to center a &lt;div&gt; element. Here are five additional methods you can use:\r\n\r\nMethod 1 - Using Auto Margins:\r\nhtml:\r\n &lt;div class=&quot;center-div&quot;&gt;\r\n   &lt;!-- Content of the div goes here - -&gt;\r\n &lt;/div&gt;\r\n\r\ncss:\r\n.center-div {\r\n  margin-left: auto;\r\n  margin-right: auto;\r\n  width: /* specify a width */;\r\n}\r\n\r\nThis method horizontally centers the &lt;div&gt; by setting both left and right margins to &quot;auto&quot;. You will need to specify a width for the &lt;div&gt;.\r\n', '/img/PostImg/b7e5636d4440b03db4e06f4e8b7a0c335a9ba094.gif', '2023-06-09 09:25:22'),
(9, 3, 'Deuxieme Post', 'test com2', '/img/PostImg/aeb17ce649b2b28293deab5896b9fa422313458b.gif', '2023-06-08 10:27:41'),
(10, 3, 'Troisieme Post', 'test com3', '/img/PostImg/c11837491b9f393c6a2bcabcdbb6d81b6d5b21a9.gif', '2023-06-08 10:28:16'),
(11, 3, 'Quatrieme Post', 'TEST COM4', '/img/PostImg/c49380e2df82ee369fdc9e24301638a988655093.gif', '2023-06-08 10:29:55'),
(12, 3, 'azertyu', 'vljsfnvùl snvùlsfjvnsùfljvnsùlvjn ljk kljzfs', '/img/PostImg/b389b0f0aa1dc16129b0f7399e5d022763e5f768.gif', '2023-06-08 12:17:15'),
(27, 4, 'How to center a fucking div ?', 'Method 2: Using Absolute Positioning and Transform:\r\n\r\ncss:\r\n.center-div {\r\n  position: absolute;\r\n  top: 50%;\r\n  left: 50%;\r\n  transform: translate(-50%, -50%);\r\n}\r\n\r\nThis method positions the &lt;div&gt; absolutely, then uses top: 50% and left: 50% to move it to the center. The transform property with translate(-50%, -50%) is used to adjust the position precisely.', '/img/PostImg/1092a48076985474606232e8a99f2571b1f97dcd.gif', '2023-06-09 09:26:33'),
(28, 4, 'How to center a fucking div ?', 'Method 3 - Using Grid:\r\n\r\ncss:\r\n.container {\r\n  display: grid;\r\n  place-items: center;\r\n  height: 100vh; /* Adjust this value as needed */\r\n}\r\n\r\nWrap the &lt;div&gt; with a container element and apply the CSS to the container. This method uses CSS Grid\'s place-items: center property to center the &lt;div&gt; both horizontally and vertically.\r\n', '/img/PostImg/3125b05c068214749e9be4a7196879958a7d5dad.gif', '2023-06-09 09:29:51'),
(22, 4, 'Chat GPT', 'Je suis un chat dev !', '/img/PostImg/361fd431166e0ce8c999d355f8c904aaeaa4d840.gif', '2023-06-08 19:27:07'),
(29, 4, 'How to center a fucking div ?', ' Method 4 - Using Flexbox and Margin Auto:\r\n\r\ncss:\r\n.container {\r\n  display: flex;\r\n  justify-content: center;\r\n  align-items: center;\r\n  height: 100vh; /* Adjust this value as needed */\r\n}\r\n.center-div {\r\n  margin: auto;\r\n}\r\n\r\nSimilar to the first method, this approach uses Flexbox to center the contents of a container element, while applying margin: auto to the centered &lt;div&gt;.', '/img/PostImg/b79c819de758c973649fd1ebcae639b902f7e291.gif', '2023-06-09 09:30:53'),
(30, 4, 'How to center a fucking div ?', 'Method 5 - Using Table Display:\r\n\r\ncss:\r\n.container {\r\n  display: table;\r\n  width: 100%;\r\n  height: 100vh; /* Adjust this value as needed */\r\n}\r\n.center-div {\r\n  display: table-cell;\r\n  vertical-align: middle;\r\n  text-align: center;\r\n}\r\n\r\nThis method uses the display: table property on the container and display: table-cell on the centered &lt;div&gt;. The vertical-align: middle property helps to vertically center the content, and text-align: center centers it horizontally.\r\n\r\nRemember to replace .center-div and .container with appropriate class or ID names in your HTML markup.\r\n\r\nI hope you find these alternative methods helpful!', '/img/PostImg/5ead5af141eb425210cbb6f359e1c62dd0f5037d.gif', '2023-06-09 09:32:08'),
(18, 5, 'Salut les Chatons InShape !', 'Rien à foutre !', '/img/PostImg/6af952a4ef8b990b778ce153550ec6d5bca359a7.gif', '2023-06-08 17:42:47'),
(19, 5, 'MMMH DAAAMN Les GENS !', 'tortank tortank tortank; muscle muscle muscle; ...', '/img/PostImg/3e9a69a847c7ebf80e8fc4bdb3cd140d25b3da57.gif', '2023-06-08 17:44:30');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `img`, `name`, `firstname`) VALUES
(3, 'sai@mail.com', '$2y$10$dFwX7QVFiua4QX4dvH3o4.oMru5YABN6ZCfrLkqsbIWL1bZQtAj0O', '/img/userPP/3.', 'le new dev', 'Full-Stack  !'),
(4, 'sai2@mail.com', '$2y$10$VxmHtB2Z4UCW74PEbHsV7ueBu7L9GRzto0Ccg99LKDhKgfYZKhQHW', '/img/userPP/4.gif', 'Chat', 'GPT'),
(5, 'sai3@mail.com', '$2y$10$1GrWt/EVVbM1NTjgSF8ig.PBq271PCrywEZMbJMoOs2u07w9j0MVy', '/img/userPP/5.gif', 'meow', '-tivation');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
