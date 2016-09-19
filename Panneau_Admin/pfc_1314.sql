-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2014 at 12:08 AM
-- Server version: 5.1.72-community
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pfc_1314`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda_patient`
--

CREATE TABLE IF NOT EXISTS `agenda_patient` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `id_patient` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `agenda_patient`
--

INSERT INTO `agenda_patient` (`id_agenda`, `id_patient`, `date`, `description`) VALUES
(1, 1, '2014-03-31', '-Rdv chez Dr Dabebi Mounir'),
(2, 1, '2015-03-01', '  test de da'),
(3, 1, '2014-04-02', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sujet` varchar(30) CHARACTER SET utf8 NOT NULL,
  `auteur` varchar(50) CHARACTER SET utf8 NOT NULL,
  `contenu` longtext CHARACTER SET utf8 NOT NULL,
  `etat_admin` varchar(20) CHARACTER SET utf8 NOT NULL,
  `date_publication` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idArticle`),
  UNIQUE KEY `titre` (`titre`),
  KEY `auteur` (`auteur`),
  KEY `auteur_2` (`auteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`idArticle`, `titre`, `sujet`, `auteur`, `contenu`, `etat_admin`, `date_publication`, `updated_on`) VALUES
(2, 'test', 'test', 'mahmoud.amri@gmail.com', '<p style="font-family: ambleregular; font-size: medium; font-style: normal; font-variant: normal; line-height: normal;"><font face="trebuchet ms" size="5">This </font><font color="#ff0099">is</font> <a href="http://www.google.com/" title="Google" target="">a</a> <font face="comic sans ms">test</font></p><div style="font-family: ambleregular; font-size: medium; font-style: normal; font-variant: normal; line-height: normal;"><font face="arial">Ordered list:</font></div><div style="font-family: ambleregular; font-size: medium; font-style: normal; font-variant: normal; line-height: normal;"><ol><li>Bold</li><li>Italic</li><li><u>Under</u></li><li><u>Bold and Under</u></li><li>Bold and Italic</li><li><u>Italic and Under</u></li></ol><font face="impact">Unordered list:</font></div><div style="font-family: ambleregular; font-size: medium; font-style: normal; font-variant: normal; line-height: normal;"><ul><li>Bold</li><li>Italic</li><li><u>Under</u></li><li><u>Bold and Under</u></li><li>Bold and <strike>Italic</strike></li><li><u>Italic and Under</u></li></ul></div><div style="font-family: ambleregular; font-size: medium; font-style: normal; font-variant: normal; line-height: normal;"><img src="http://gabrielecirulli.github.io/2048/meta/icon_bitcoin.svg" alt="" align="right"></div>', 'Validé', '2014-05-27 11:41:01', '2014-05-28 21:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `associations`
--

CREATE TABLE IF NOT EXISTS `associations` (
  `idAssociation` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(20) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `date_creation` date NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `adresse_mail` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `fax` int(11) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `poste` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  `note` float NOT NULL DEFAULT '0',
  `nb_vote` int(11) NOT NULL,
  `etat_compte` varchar(20) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `guide_test` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idAssociation`),
  UNIQUE KEY `matricule` (`matricule`),
  UNIQUE KEY `login_2` (`mdp`),
  UNIQUE KEY `login_3` (`mdp`),
  UNIQUE KEY `adresse_mail` (`adresse_mail`),
  KEY `login` (`mdp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `associations`
--

INSERT INTO `associations` (`idAssociation`, `matricule`, `nom`, `mdp`, `date_creation`, `adresse`, `adresse_mail`, `telephone`, `fax`, `categorie`, `poste`, `description`, `note`, `nb_vote`, `etat_compte`, `created_on`, `updated_on`, `guide_test`) VALUES
(25, 'zdzdzdzd', 'Association nationale de prévention en alcoologie et addictologie', 'dqzdqzd', '0003-02-04', 'vvvvvvvvvvvvv', 'mahmoud.amri@esprit.tn', 52887339, 2525258, 'Bien être', 'Secrétaire Général', 'dzadzad', 0, 0, '', '2014-03-30 12:10:32', '2014-04-22 17:36:25', 0),
(26, 'vzevzev', 'rvvzev', 'ssddddddd', '2014-03-03', 'vzevze', 'hedi.mejri@outlook.com', 58722525, 58520295, 'Nutrition', 'Vice-Président', ' cscsdvc', 0, 0, '', '2014-03-30 12:13:05', '0000-00-00 00:00:00', 0),
(27, '05c5zrverb8', 'Association Tunisienne de la Santé', 'mahmoud', '2014-03-04', '01,Rue el Malahi, 2022 Manouba', 'mahmoud.amri@gmail.com', 52232388, 74511318, 'Santé', 'Président', 'Une association qui lutte pour le droit de la santé', 0, 0, 'valide', '2014-04-22 17:34:00', '2014-05-29 14:27:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
  `id_patient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `maladie` varchar(100) NOT NULL,
  `medicament` varchar(100) NOT NULL,
  `dose` int(11) NOT NULL,
  PRIMARY KEY (`id_patient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`id_patient`, `nom`, `prenom`, `maladie`, `medicament`, `dose`) VALUES
(1, 'khairi', 'chmengui', 'gripe', 'dssfsd', 1),
(2, 'amira', 'sdasds', 'asdasdas', 'asdasdasd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `evenements`
--

CREATE TABLE IF NOT EXISTS `evenements` (
  `idEvenement` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `theme` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `public` varchar(70) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(150) NOT NULL,
  `hote` varchar(50) NOT NULL,
  `etat_admin` varchar(20) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idEvenement`),
  KEY `idAssociation` (`hote`),
  KEY `hote` (`hote`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `evenements`
--

INSERT INTO `evenements` (`idEvenement`, `nom`, `theme`, `type`, `public`, `lieu`, `date`, `description`, `hote`, `etat_admin`, `created_on`, `updated_on`) VALUES
(1, 'zdz', 'dzdzd', 'Conférence', '0', 'dzdz', '2014-05-30', 'dzdzd', 'mahmoud.amri@gmail.com', 'Validé', '2014-05-29 11:12:28', '2014-05-29 11:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `maladie`
--

CREATE TABLE IF NOT EXISTS `maladie` (
  `id_maladie` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `symptomes` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  PRIMARY KEY (`id_maladie`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(46, 'Pan Africa Market', '1521 1st Ave, Seattle, WA', 47.608940, -122.340141, 'restaurant'),
(47, 'Buddha Thai & Bar', '2222 2nd Ave, Seattle, WA', 47.613590, -122.344391, 'bar'),
(48, 'The Melting Pot', '14 Mercer St, Seattle, WA', 47.624561, -122.356445, 'restaurant'),
(49, 'Ipanema Grill', '1225 1st Ave, Seattle, WA', 47.606365, -122.337654, 'restaurant'),
(50, 'Sake House', '2230 1st Ave, Seattle, WA', 47.612823, -122.345673, 'bar'),
(51, 'Crab Pot', '1301 Alaskan Way, Seattle, WA', 47.605961, -122.340363, 'restaurant'),
(52, 'Mama''s Mexican Kitchen', '2234 2nd Ave, Seattle, WA', 47.613976, -122.345467, 'bar'),
(53, 'Wingdome', '1416 E Olive Way, Seattle, WA', 47.617214, -122.326584, 'bar'),
(54, 'Piroshky Piroshky', '1908 Pike pl, Seattle, WA', 47.610126, -122.342834, 'restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

CREATE TABLE IF NOT EXISTS `medecin` (
  `id_medecin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `adresse_mail` varchar(40) NOT NULL,
  `mdp` varchar(11) NOT NULL,
  `telephone` varchar(8) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `gouvernorat` varchar(30) NOT NULL,
  `specialite` varchar(20) NOT NULL,
  `biographie` mediumtext NOT NULL,
  `note` int(11) NOT NULL DEFAULT '0',
  `nb_vote` int(11) NOT NULL DEFAULT '0',
  `guide_test` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_medecin`),
  UNIQUE KEY `adresse_mail` (`adresse_mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `medecin`
--

INSERT INTO `medecin` (`id_medecin`, `nom`, `prenom`, `adresse`, `adresse_mail`, `mdp`, `telephone`, `fax`, `type`, `gouvernorat`, `specialite`, `biographie`, `note`, `nb_vote`, `guide_test`) VALUES
(1, 'Dabebi', 'mounir', 'lllllll', 'dddd@llll.fr', '', '71548695', '71548005', 'eeee', '', 'Dentiste', 'gggggggggggggg', 5, 1, 0),
(2, 'Ben achour', 'omar', 'lllllll', 'dddd@llmll.fr', '', '71541495', '71544405', 'eeee', '', 'Neurologue', 'gggggggggggggg', 5, 1, 0),
(3, 'Mejri', 'mounir', 'lllllll', 'ddgdd@llmll.fr', '', '71441495', '71744405', 'eeee', '', 'Psychiatre', 'gggggggggggggg', 5, 1, 0),
(4, 'khairi', 'chmengui', 'rue il bleda', 'khairi@hotmail.fr', 'khairi', '456', '456', 'bliiiiiid', '', 'Cardiologue', 'lkjkljlkjkjl        ', 5, 1, 1),
(5, 'test', 'test', 'test', 'd;jv', 'hvl', 'hjvl', 'hv', 'hvlh', '', 'Cancérologue', 'lhvl', 0, 0, 0),
(7, 'dqd', 'sc', 'csdcsd', 'sdc', 'sdc', 'csdc', 'sdcs', 'csd', 'Mahdia', 'Dentiste', 'csdcds', 0, 0, 0),
(8, 'zef', 'fzef', 'fzef', 'zfef', 'zefzef', 'zefzef', 'zfzef', 'zefz', 'Zaghouan', 'Dentiste', 'fzfe', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicaments`
--

CREATE TABLE IF NOT EXISTS `medicaments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `description` longtext NOT NULL,
  `chemin_image` varchar(60) NOT NULL,
  `visites` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `medicaments`
--

INSERT INTO `medicaments` (`id`, `nom`, `categorie`, `description`, `chemin_image`, `visites`) VALUES
(14, 'Doliprane', 'Sédatifs', 'Traitement symptomatique des douleurs à intensité légère ou modérée et/ou des états fébriles.', 'doliprane.JPG', 1),
(15, 'Maxilase', 'Sédatifs', 'Medicament pour traiter les maux de gorge', 'maxilase.jpg', 7),
(20, 'EFFERALGAN 500', 'Antibiotiques', 'Traitement symptomatique des douleurs à intensité légère ou modérée et/ou des états fébriles. ', 'efferalgan.jpg', 6),
(21, 'GAVISCON 250', 'Laxatifs', ' Traitement symptomatique du reflux gastro-oesophagien. ', 'Gaviscon-Tablets.png', 6),
(22, 'CLAMOXYL 1g', 'Antibiotiques', ' Elles sont limitées aux infections dues aux germes définis comme sensibles : pneumopathies aiguës, surinfections de bronchites aiguës et exacerbations de bronchites chroniques, infections ORL (otite, sinusite, angine) et stomatologiques, infections urinaires, infections génitales masculines et infections gynécologiques, infections digestives et biliaires,. endocardites, septicémies,,méningites, maladie de Lyme : traitement de la phase primaire (érythème chronique migrant) et de la phase primosecondaire (érythème chronique migrant associé à des signes généraux : asthénie, céphalées, fièvre, arthralgies...).', 'clamox10.png', 9),
(23, 'DEROXAT', 'Antidepresseurs', ' Traitement de : Episode dépressif majeur, Troubles Obsessionnels Compulsifs, Trouble Panique avec ou sans agoraphobie, Trouble Anxiété Sociale / Phobie sociale, Trouble Anxiété Généralisée, Etat de stress post-traumatique. ', 'deroxat.png', 5),
(24, 'CELEBREX', 'Anti-inflamatoires', 'Soulagement des symptômes dans le traitement de l arthrose, de la polyarthrite rhumatoïde et de la spondylarthrite ankylosante. ', 'celebrex-200.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `messagerie`
--

CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET latin1 NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `message` varchar(255) CHARACTER SET latin1 NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `messagerie`
--

INSERT INTO `messagerie` (`id`, `nom`, `email`, `message`, `etat`) VALUES
(1, 'dfgdfg', 'jnklnkln', 'qmksdf,skld,ngskd,gvsd', 0),
(2, 'hello', 'hello.com', 'sdfsdfsd', 0),
(3, 'nouri', 'noura@sdfsdf.com', 'sdfksdkjngfqkjsdhgqjsdgqsdg', 0),
(4, 'sdgfsdg', 'qsdfsqdf@sfqsdf.qsdf', 'sdfqsdgfsdg', 0),
(5, 'Hedi', 'hedi@live.fr', 'contactez moi', 0),
(6, 'rym', 'rym@sdfsd.com', 'sdfsdfsd', 0),
(7, 'hbhjbj', 'bjnjn@sss.com', 'lk,klnk,', 0),
(8, 'Hedi Mejri', 'hedi.mejri@esprit.tn', 'Ceci est un test', 0),
(9, 'mahmoud', 'mahmoud.amri@esprit.tn', 'medicament', 0),
(10, 'sdfsdf', 'hedi.mejri@esprit.tn', 'sdfsdf', 0),
(11, 'faycel', 'faycel@esprit.tn', 'hello', 1),
(12, 'reznov', 'hedii.mejrii@outlook.com', 'sdfsdfsdgsqdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partenaires`
--

CREATE TABLE IF NOT EXISTS `partenaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `chemin_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `partenaires`
--

INSERT INTO `partenaires` (`id`, `nom`, `description`, `adresse`, `chemin_image`) VALUES
(21, 'EGD', 'Club de jeux videos', '11 Rue Batata', 'Metro-Last-Light-Logo-HD-Video-Games-Wallpapers.jpg'),
(23, 'Carrefour', 'Medicament pour traiter les maux de tete', '11 Rue Batata', 'ROG.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id_patient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mdp` varchar(8) NOT NULL,
  `cin` varchar(8) NOT NULL,
  `telephone` varchar(8) NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `date_naissance` varchar(10) NOT NULL,
  `rue` varchar(300) NOT NULL,
  `gouvernorat` varchar(30) NOT NULL,
  `bonus` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `guide_test` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_patient`),
  UNIQUE KEY `email` (`email`,`cin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id_patient`, `nom`, `prenom`, `email`, `mdp`, `cin`, `telephone`, `sexe`, `date_naissance`, `rue`, `gouvernorat`, `bonus`, `etat`, `guide_test`) VALUES
(1, 'Hannachi', 'Ghassen', 'gaston.hannachi@live.fr', 'admin', '05949438', '98478523', 'Homme', '1993-05-24', 'rue des olives Laouina', 'Tunis', 0, 0, 1),
(3, 'mohsen', 'mohamed', 'ghassen.hannachi@esprit.tn', 'test123', '07892213', '21121212', 'Homme', '2009-04-8', '1562', 'Ben Arous', 0, 0, 0),
(4, 'testlllll', 'test', 'test2@gmail.com', '1234', '123456', '123456', 'Homme', '1981-03-05', 'marsa', 'Tunis', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacie`
--

CREATE TABLE IF NOT EXISTS `pharmacie` (
  `id_pharmacie` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `adresse_mail` varchar(20) NOT NULL,
  `telephone` int(11) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id_pharmacie`),
  UNIQUE KEY `adresse_mail` (`adresse_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rdv`
--

CREATE TABLE IF NOT EXISTS `rdv` (
  `id_rdv` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `id_personne` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `commentaire` mediumtext NOT NULL,
  PRIMARY KEY (`id_rdv`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rdv`
--

INSERT INTO `rdv` (`id_rdv`, `date`, `heure`, `id_personne`, `id_medecin`, `commentaire`) VALUES
(1, '2014-02-10', '10:00:00', 1, 1, 'J''accepte votre rendez-vous'),
(3, '2014-04-14', '12:25:00', 3, 3, ''),
(4, '2016-01-02', '12:58:00', 3, 3, ''),
(5, '2014-04-15', '10:00:00', 1, 4, 'Est ce que il a possibilité à 14:00 ?contactez-moi');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) CHARACTER SET utf8 NOT NULL,
  `mdp` varchar(30) CHARACTER SET utf8 NOT NULL,
  `type` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `mdp`, `type`) VALUES
(1, 'reznov', 'reznov1', 'admin'),
(2, 'ghassen', 'ghassen1', 'admin'),
(3, 'mahmoud', 'mahmoud', 'admin_association'),
(4, 'khairi', 'khairi', 'admin_medecin'),
(6, 'Carrefour', 'Carrefour_123', 'admin_part');

-- --------------------------------------------------------

--
-- Table structure for table `visites`
--

CREATE TABLE IF NOT EXISTS `visites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visite_pharmacie` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `visites`
--

INSERT INTO `visites` (`id`, `visite_pharmacie`) VALUES
(1, 217);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `associations` (`adresse_mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evenements`
--
ALTER TABLE `evenements`
  ADD CONSTRAINT `evenements_ibfk_1` FOREIGN KEY (`hote`) REFERENCES `associations` (`adresse_mail`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
