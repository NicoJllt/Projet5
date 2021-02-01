-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: db5001238059.hosting-data.io
-- Generation Time: Feb 01, 2021 at 11:16 AM
-- Server version: 5.7.30-log
-- PHP Version: 7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs1059006`
--

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `id` int(11) NOT NULL COMMENT 'ID autre',
  `description` text NOT NULL COMMENT 'Nom autre',
  `price` double NOT NULL COMMENT 'Prix autre',
  `category` enum('Entrée','Dessert','Glace','Vin','Boisson') DEFAULT NULL COMMENT 'Catégorie',
  `idAdmin` int(11) NOT NULL COMMENT 'ID admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`id`, `description`, `price`, `category`, `idAdmin`) VALUES
(1, 'Burrata nature ou fumée (125gr) et ses légumes grillés	', 10, 'Entrée', 1),
(2, 'Mousse de mascarpone avec spéculoos et framboises', 7, 'Dessert', 1),
(3, 'Tiramisu au café', 7, 'Dessert', 1),
(4, 'Clémentine Corse', 7, 'Glace', 1),
(5, 'Vanille Canistrelli', 7, 'Glace', 1),
(6, 'Praliné nocciola', 7, 'Glace', 1),
(7, 'Clos Ornaca, Ajaccio (Rouge)', 26, 'Vin', 1),
(8, 'Chianti Leonardo (Rouge)', 28, 'Vin', 1),
(9, 'Sant Armettu (Rouge) - 50cl', 18, 'Vin', 1),
(10, 'Clos Ornasca, Ajaccio (Blanc)', 26, 'Vin', 1),
(11, 'Prosecco (Blanc pétillant) ou Lambrusco (Rouge pétillant)', 23, 'Vin', 1),
(12, 'Coca-Cola ou Coca-Cola zéro', 2.5, 'Boisson', 1),
(13, 'Ice Tea Pêche', 2.5, 'Boisson', 1),
(14, 'Perrier', 2.5, 'Boisson', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL COMMENT 'ID pizza',
  `name` varchar(50) NOT NULL COMMENT 'Nom pizza',
  `description` text NOT NULL COMMENT 'Description pizza',
  `priceSmall` int(11) NOT NULL COMMENT 'Prix demi-lune',
  `priceBig` int(11) DEFAULT NULL COMMENT 'Prix grande',
  `idAdmin` int(11) NOT NULL COMMENT 'ID admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `description`, `priceSmall`, `priceBig`, `idAdmin`) VALUES
(1, 'Royale', 'Sauce tomate, jambon, champignons, cantal', 12, 22, 1),
(2, 'Chef', 'Crème fraîche, jambon, champignons, cantal', 12, 22, 1),
(3, 'Mozzarella', 'Sauce tomate, mozzarella, basilic frais', 12, 20, 1),
(4, 'Légumes', 'Sauce tomate, oignons caramélisés, poivrons, aubergines, champignons, artichauts', 14, 26, 1),
(5, 'Thon', 'Sauce tomate, thon, oignons caramélisés, cantal	', 12, 20, 1),
(6, 'Peperoni', 'Sauce tomate, poivrons, chorizo, chèvre', 13, 24, 1),
(7, '4 fromages', 'Sauce tomate, cantal, mozzarella, chèvre, roquefort', 14, 26, 1),
(8, 'Calzone (Chausson)', 'Crème fraîche, jambon, œuf, cantal', 14, 0, 1),
(9, 'Papacionu (Chausson)', 'Crème fraîche, jambon, œuf, cantal, pignons, cognac', 15, 0, 1),
(10, 'Reblochon', 'Sauce tomate, reblochon, cantal, jambon de parme (24 mois d\'affinage)', 14, 26, 1),
(11, 'Saumon', 'Crème fraîche, saumon, mozzarella, ciboulette, citron, tzatziki', 16, 30, 1),
(12, 'Fumée', 'Sauce tomate, burrata fumée, oignons caramélisés, speck', 14, 26, 1),
(13, 'Parma', 'Sauce tomate, mozzarella di buffala (125gr) posée fraîche, jambon de parme (24 mois d\'affinage), tomates séchées, basilic frais', 15, 30, 1),
(14, 'Chèvre miel', 'Sauce tomate, chèvre, guanciale, mâche, miel', 14, 26, 1),
(15, 'Burrata', 'Sauce tomate, mozzarella, poivrons, mâche, burrata (125gr), sauce maison', 15, 29, 1),
(16, 'Sicilienne', 'Sauce tomate, anchois, câpres, olives', 11, 20, 1),
(17, 'Fêta', 'Sauce tomate, fêta, chèvre, roquette, tomates séchées, sauce maison', 14, 26, 1),
(18, 'Papacionetta', 'Sauce tomate, mozzarella, tomates cerises, pignons, roquette', 14, 26, 1),
(19, 'Calabraise', 'Sauce tomate, saucisse épicée calabraise (Nduya), fior di latte, burrata fumée, oignons caramélisés, roquette', 16, 30, 1),
(20, 'Spuntinetta', 'Pâte semi-épaisse, pancetta, tomme Corse, roquette, crème de balsamique, copeaux de tomme Corse, émulsion de figues', 16, 0, 1),
(21, 'Castagna', 'Crème fraîche, burrata fumée, speck en cuisson, mâche, émulsion de châtaignes', 17, 32, 1),
(22, 'Scarmozza', 'Crème fraîche, fromage de bufflonne fumé, fior di latte, lamelles de figues séchées, émulsion de figues', 15, 28, 1),
(23, 'Carciofi', 'Crème d\'artichauts, comté, oignons caramélisés, tomates cerises, bresaola', 16, 30, 1),
(24, 'Zucchina', 'Comté, courgettes grillées, guanciale, crème de betterave', 16, 32, 1),
(25, 'Truffe', 'Sauce tomate, pecorino truffé, burrata (125gr) à la truffe, crème de balsamique', 17, 32, 1),
(26, 'Foie gras', 'Crème fraîche, foie gras, oignons caramélisés, mâche, tomates cerises, tranches de magret de canard fumé, confiture de figues, perles de vinaigre balsamique', 17, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `content` text NOT NULL COMMENT 'Contenu contact',
  `idAdmin` int(11) NOT NULL COMMENT 'ID admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'ID utilisateur',
  `username` varchar(50) NOT NULL COMMENT 'Nom utilisateur',
  `password` varchar(100) NOT NULL COMMENT 'Mot de passe utilisateur',
  `registrationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date d''inscription',
  `isActive` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Utilisateur actif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `registrationDate`, `isActive`) VALUES
(1, 'Magali', '$2y$10$rq8jqzMvwrN3xvOJur5PROCgRi8v9FeZ3oWx/wX/5TL73z18YQgru', '2020-12-03 12:43:06', 1),
(2, 'Don-Pierre', '$2y$10$oPEu2eSKRG4NMMp0KkrFhuPYNrW0prLTWTcl1MjkX4WOUCNnGrCMq', '2021-01-21 16:07:27', 1),
(19, 'nico', '$2y$10$kZDiR0TC8xRcAJeJcMPzo.J4DJ6uDOezm2AnGrw3qqlQW8yKNCSje', '2021-01-26 11:20:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`idAdmin`) USING BTREE;

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`idAdmin`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_login` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID autre', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID pizza', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID utilisateur', AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pizza`
--
ALTER TABLE `pizza`
  ADD CONSTRAINT `id_admin` FOREIGN KEY (`idAdmin`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
