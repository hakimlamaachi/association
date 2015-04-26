-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2015 at 06:06 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assoc_musul`
--

-- --------------------------------------------------------

--
-- Table structure for table `adherent`
--

CREATE TABLE IF NOT EXISTS `adherent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text,
  `prenom` text,
  `email` text,
  `date_naissance` date DEFAULT NULL,
  `date_adhesion` date DEFAULT NULL,
  `photo` text,
  `paiment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text,
  `prenom` text,
  `email` text,
  `username` text,
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text,
  `contenu` text,
  `date_pub` date DEFAULT NULL,
  `image` text,
  `statut` tinyint(1) DEFAULT NULL,
  `auteur` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `date_pub`, `image`, `statut`, `auteur`) VALUES
(1, 'lamaaa', 'tfuygiojpkl', '2010-02-01', 'Penguins.jpg', 0, 'fghj'),
(2, 'rduygiojpk^l', 's(drtfyguhijopk', NULL, 'Tulips.jpg', NULL, 'rdftgyh'),
(3, 'rdfghj', '-''d(èf-_gèçhjkl', NULL, 'Jellyfish.jpg', NULL, 'rttyui'),
(4, 'hakim', 'lamaachi', '2011-03-02', 'Lighthouse.jpg', NULL, 'fghjkl'),
(5, 'fgyuijokpl', 'vuybin,l;ùm:', '2010-01-01', '1.jpg', NULL, 'lamaachi hakim');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text,
  `prenom` text,
  `email` text,
  `objet` text,
  `contenu` text,
  `reponse` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` text,
  `objet` text,
  `date` date DEFAULT NULL,
  `somme` text,
  `type` text,
  `file` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `galerie`
--

CREATE TABLE IF NOT EXISTS `galerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text,
  `titre` text,
  `description` text,
  `lien` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text,
  `description` text,
  `contenu` text,
  `date_modefication` date DEFAULT NULL,
  `image` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text,
  `prenom` text,
  `email` text,
  `date_naissance` date DEFAULT NULL,
  `photo` text,
  `fonction` text,
  `role` text,
  `verouillage` tinyint(1) DEFAULT NULL,
  `username` longtext NOT NULL,
  `password` longtext NOT NULL,
  `adresse` text,
  `telephone` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id`, `nom`, `prenom`, `email`, `date_naissance`, `photo`, `fonction`, `role`, `verouillage`, `username`, `password`, `adresse`, `telephone`) VALUES
(4, 'lamaachi', 'hakim', 'lakzpfjz@gmail.com', '2015-04-22', '1.jpg', 'hakim', NULL, 1, 'brahim', '$2y$10$qYU4GEotRG8qZlGpTCV0jeqoYevxQo7MlFdP9KrXkwDNm8ldML9fC', 'lamaachi12', '0667469603'),
(6, 'elkhyati', 'mohsin', 'mohsin@gmail.com', '1991-04-13', '1.jpg', 'jnol^p^p;ghjkl', NULL, 0, 'hosa', '$2y$10$bAfpVMmkFpTGPRKsTOn4BO4Ka8c8Oxd0XXqN1EPlCllFsS9Fsr4MC', 'zerhoun meknes', '0677485266');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
