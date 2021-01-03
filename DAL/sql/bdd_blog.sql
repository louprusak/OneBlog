/*-- BASE DE DONNEES PROJET BLOG PHP | LEVY-VALENSI & RUSAK G3


DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `comment`;
DROP TABLE IF EXISTS `news`;


--CREATION DE LA TABLE USER (UTILISATEURS)

CREATE TABLE IF NOT EXISTS `user` (
  `login` varchar(30) NOT NULL COMMENT 'Login de l''utilisateur',
  `password` varchar(60) NOT NULL COMMENT 'Mot de passe de l''utilisateur',
  `role` tinyint(1) NOT NULL COMMENT 'Role de l''utilisateur: 0=user,1=admin',
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `user`(`login`, `password`, `role`) VALUES ("admin","$2y$10$VDcoBkq5f6WnI95oXGuHleua4gNwNCjfkTOmEKIJHCPRI3o.UzaXS",true);


--CREATION DE LA TABLE NEWS

CREATE TABLE IF NOT EXISTS `news` (
  `idNews` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la news',
  `date` date NOT NULL COMMENT 'date d''ajout de la news',
  `titre` varchar(400) NOT NULL COMMENT 'titre de la news',
  `description` mediumtext NOT NULL COMMENT 'description de la news',
  `auteur` varchar(30) NOT NULL COMMENT 'Auteur de la news',
  PRIMARY KEY (`idNews`),
  UNIQUE KEY `UNIQUE_TITRE` (`titre`),
  KEY `NEWS_AUTEUR` (`auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='Table ModelNews du blog';
ALTER TABLE `news`
  ADD CONSTRAINT `NEWS_AUTEUR` FOREIGN KEY (`auteur`) REFERENCES `user` (`login`);

INSERT INTO `news` (`idNews`, `date`, `titre`, `description`, `auteur`) VALUES
(1, '2021-01-02', 'Covid-19 : l’est de la France bascule dans le couvre-feu à 18 heures', 'kdjertgkdjhrutukhjediurtjhiqejroitejiounvuiopnzoiuedhbn' ||
 'truihnudishtuiboiuduithyuibiudtuyibpdftyiubnttruihnudishtuiboiuduithyuibiudtuyibpdftyiubnttruihnudishtuiboiuduithyuibiudtuyibpdftyiubnttruihnudishtuiboiuduithyuibiudtuyibpdftyiubnt', 'admin'),
(2, '2021-01-02', 'Le bitcoin dépasse les 30 000 dollars pour la première fois de son histoire', 'oidrvuitudshrjhntvuoidiryhtupvqenriutyvpiudnrpitnunyvepirutypvinrytiuqveynriutpveiurntypvienyriptuvynepirutnyvipueryntive' ||
 'iqenrviuptniueruitviuernptpviuenrtpiuvnqepritnvpierntpiuvenrptvqeouirtunypoqenvtêrntpvoeynrtiuvyenitpeirnytpvertv' ||
  'eiuqbvrtiuyepiurtyvnpeqnidjnvrhijthenrvuiotyheuirvyhtoiuenyriutvypeuinrnytuivnyeuriytiuvey', 'admin'),
(3, '2021-01-02', 'Gendarmes tués dans le Puy-de-Dôme : « Je vais être un killeur de keufs »', 'truihnudishtuiboiuduithyuibiudtuyibpdftyiubnttruihnudishtuiboiuduithyuibiu' ||
 'dtuyibpdftyiubnttruihnudishtuiboiuduithyuibiud' ||
 'tuyibpdftyiubnttruihnudishtuiboiuduithyuibiudtuyibpdftyiubnttruihnudishtuib' ||
  'oiuduithyuibiudtuyibpdftyiubnttruihnudishtuiboiuduithyuibiudtuyibpdftyiubnt', 'admin');




--CREATION DE LA TABLE COMMENT (COMMENTAIRES)

CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du commentaire',
  `idNews` int(11) NOT NULL COMMENT 'identifiant de la news concernées par le commentaire',
  `auteur` varchar(30) NOT NULL COMMENT 'auteur du commentaire',
  `message` varchar(300) NOT NULL COMMENT 'commentaire',
  PRIMARY KEY (`idComment`),
  KEY `COMMENT_AUTEUR` (`auteur`),
  KEY `COMMENT_NEWS` (`idNews`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `comment`
  ADD CONSTRAINT `COMMENT_AUTEUR` FOREIGN KEY (`auteur`) REFERENCES `user` (`login`),
  ADD CONSTRAINT `COMMENT_NEWS` FOREIGN KEY (`idNews`) REFERENCES `news` (`idNews`);*/

  -- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 03 jan. 2021 à 22:48
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du commentaire',
  `idNews` int(11) NOT NULL COMMENT 'identifiant de la news concernées par le commentaire',
  `auteur` varchar(30) NOT NULL COMMENT 'auteur du commentaire',
  `message` varchar(300) NOT NULL COMMENT 'commentaire',
  PRIMARY KEY (`idComment`),
  KEY `COMMENT_AUTEUR` (`auteur`),
  KEY `COMMENT_NEWS` (`idNews`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`idComment`, `idNews`, `auteur`, `message`) VALUES
(10, 19, 'loup', 'Ouai moi je suis pas fan de me faire vacciner maintenant...'),
(11, 19, 'manoah', 'Je sui bien d&#39;accord avec toi Loup, pour moi le vaccin n&#39;est pas encore prÃªt...'),
(12, 20, 'manoah', 'C&#39;est vraiment terrible ce qui se passe lÃ  bas ...'),
(13, 20, 'loup', 'Oui effectivement ...'),
(14, 21, 'admin', 'Super news merci beaucoup Manoah !');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `idNews` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la news',
  `date` date NOT NULL COMMENT 'date d''ajout de la news',
  `titre` varchar(400) NOT NULL COMMENT 'titre de la news',
  `description` mediumtext NOT NULL COMMENT 'description de la news',
  `auteur` varchar(30) NOT NULL COMMENT 'Auteur de la news',
  PRIMARY KEY (`idNews`),
  UNIQUE KEY `UNIQUE_TITRE` (`titre`),
  KEY `NEWS_AUTEUR` (`auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COMMENT='Table ModelNews du blog';

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`idNews`, `date`, `titre`, `description`, `auteur`) VALUES
(19, '2021-01-03', 'Covid-19 en France : sous le feu des critiques, le gouvernement promet dâ€™accÃ©lÃ©rer la campagne de vaccination', 'Le porte-parole du gouvernement, Gabriel Attal, a assurÃ© que Â« lâ€™accÃ©lÃ©ration Â» de la politique de vaccination demandÃ©e par le prÃ©sident Ã©tait Â« dÃ©jÃ  engagÃ©e Â». Dans les Ã©tablissements scolaires, le protocole sanitaire pourra Ãªtre renforcÃ©.\r\nLe premier week-end de lâ€™annÃ©e 2021 nâ€™apporte pas de bonnes nouvelles sur le plan de lâ€™Ã©pidÃ©mie due au coronavirus. Alors que le gouvernement essuie de nombreuses critiques Ã  propos dâ€™une campagne vaccinale jugÃ©e trop lente, le directeur gÃ©nÃ©ral de la santÃ©, JÃ©rÃ´me Salomon, juge que Â« la tendance est dÃ©jÃ  prÃ©occupante Â». Â« On a une augmentation progressive depuis dÃ©but dÃ©cembre Â» alors mÃªme que les consÃ©quences des rÃ©unions pour les fÃªtes de fin dâ€™annÃ©e ne seront connues que la semaine prochaine.\r\nDans les colonnes du JDD, dimanche 3 janvier, M. Salomon sâ€™inquiÃ¨te Ã  la fois des consÃ©quences des vacances, du froid qui favorise les transmissions, des deux variants identifiÃ©s au Royaume-Uni et en Afrique du Sud dÃ©jÃ  dÃ©tectÃ©s en France, mais aussi du brassage dâ€™Ã©lÃ¨ves avec la rentrÃ©e. Â« De faÃ§on gÃ©nÃ©rale, rapporte-t-il, lâ€™incidence est de nouveau en hausse aprÃ¨s un plateau assez long. Â»\r\n\r\nDimanche, lâ€™agence sanitaire SantÃ© publique France faisait Ã©tat de plus de 12 500 cas et de 116 dÃ©cÃ¨s supplÃ©mentaires confirmÃ©s en vingt-quatre heures. Le Covid-19 a entraÃ®nÃ© la mort de 65 000 FranÃ§ais depuis le dÃ©but de lâ€™Ã©pidÃ©mie.', 'admin'),
(20, '2021-01-03', 'Au Niger, cent morts dans les attaques de deux villages de lâ€™Ouest', 'Il sâ€™agit de lâ€™un des pires massacres de civils dans ce pays rÃ©guliÃ¨rement visÃ© par des groupes djihadistes et qui est en pleine Ã©lection prÃ©sidentielle.\r\nCent personnes ont Ã©tÃ© tuÃ©es, samedi 2 janvier, dans les attaques de deux villages de lâ€™ouest du Niger, un des pires massacres de civils dans ce pays rÃ©guliÃ¨rement visÃ© par des groupes djihadistes et qui est en pleine Ã©lection prÃ©sidentielle.\r\n\r\nÂ« Nous venons juste de rentrer des lieux des attaques Â» perpÃ©trÃ©es samedi. Â« A Tchoma Bangou, il y a eu jusquâ€™Ã  70 morts, et Ã  Zaroumadareye 30 morts Â», a dÃ©clarÃ© dimanche Ã  lâ€™Agence France-Presse (AFP) Almou Hassane, le maire de Tondikiwindi, commune qui administre les deux villages, situÃ©s dans le dÃ©partement dâ€™Ouallam. Â« Il y a eu Ã©galement 25 blessÃ©s dont certains ont Ã©tÃ© Ã©vacuÃ©s Ã  Niamey et Ã  Ouallam pour des soins Â», a-t-il ajoutÃ©.\r\n\r\nLâ€™attaque, qui nâ€™a pas Ã©tÃ© revendiquÃ©e, a Ã©tÃ© perpÃ©trÃ©e Â« par des terroristes venus Ã  bord dâ€™une centaine de motos Â». Pour attaquer les deux villages, distants de 7 kilomÃ¨tres, les assaillants Â« se sont divisÃ©s en deux colonnes : pendant que lâ€™une attaquait Zaroumadareye, les autres ont attaquÃ© Tchoma Bangou Â», a prÃ©cisÃ© le maire.\r\n\r\nUne rÃ©gion rÃ©guliÃ¨rement visÃ©e par les attaques\r\nLes deux villages sont situÃ©s Ã  environ 120 kilomÃ¨tres au nord de la capitale, Niamey, dans la rÃ©gion de TillabÃ©ri, frontaliÃ¨re du Mali et du Burkina Faso. Cette rÃ©gion dite Â« des trois frontiÃ¨res Â» est rÃ©guliÃ¨rement visÃ©e depuis des annÃ©es par des attaques de groupes djihadistes.\r\n\r\nCette double attaque avait Ã©tÃ© annoncÃ©e samedi mais sans bilan prÃ©cis par des Ã©lus locaux. Dâ€™aprÃ¨s un haut responsable de la rÃ©gion de TillabÃ©ri, elle a Ã©tÃ© commise en plein jour, vers midi, au mÃªme moment que la proclamation des rÃ©sultats du premier tour de lâ€™Ã©lection prÃ©sidentielle du 27 dÃ©cembre donnant largement en tÃªte (39,33 %) le candidat du parti au pouvoir, Mohamed Bazoum, ancien ministre de lâ€™intÃ©rieur, qui a promis de renforcer la lutte contre les groupes djihadistes.\r\n\r\nLe prÃ©sident sortant, Mahamadou Issoufou, a fait part dimanche dans un tweet de ses Â« condolÃ©ances les plus Ã©mues aux populations de Tchoma Bangou et Zaroumadareye, suite Ã  lâ€™attaque lÃ¢che et barbare de leurs villages Â». Un Conseil national de sÃ©curitÃ© exceptionnel est prÃ©vu lundi matin.\r\n\r\nDans une vidÃ©o, M. Bazoum a indiquÃ© avoir une Â« pensÃ©e pieuse Â» pour les populations touchÃ©es par ce Â« drame (qui) rappelle que les groupes terroristes constituent une menace grave pour la cohÃ©sion au sein de nos communautÃ©s et un danger Ã  aucun autre comparable Â».\r\n\r\nSept soldats avaient Ã©tÃ© tuÃ©s le 21 dÃ©cembre dans lâ€™Ouest, oÃ¹ sÃ©vit rÃ©guliÃ¨rement lâ€™Etat islamique dans le grand Sahara (EIGS). Et trente-quatre personnes avaient Ã©tÃ© massacrÃ©es le 12 dÃ©cembre dans le village de Toumour, dans le Sud-Est, une attaque revendiquÃ©e par Boko Haram.\r\n\r\nPrÃ¨s de 500 000 rÃ©fugiÃ©s et dÃ©placÃ©s\r\nLe Niger a organisÃ© en dÃ©cembre une sÃ©rie dâ€™Ã©lections, dâ€™abord municipales et rÃ©gionales le 13 dÃ©cembre, puis prÃ©sidentielle et lÃ©gislatives couplÃ©es le 27 dÃ©cembre. Le second tour de la prÃ©sidentielle doit se dÃ©rouler Ã  la fin de fÃ©vrier.\r\n\r\nLa rÃ©gion de TillabÃ©ri est placÃ©e sous Ã©tat dâ€™urgence depuis 2017. Pour lutter contre les djihadistes, les autoritÃ©s ont interdit en janvier 2020 la circulation Ã  moto de jour comme de nuit et la fermeture de certains marchÃ©s qui alimentent Â« les terroristes Â» selon elles.\r\n\r\nPays parmi les plus pauvres du monde, le Niger lutte depuis des annÃ©es contre des groupes djihadistes sahÃ©liens dans sa partie occidentale et les islamistes du groupe nigÃ©rian Boko Haram dans le Sud-Est, sans parvenir Ã  les vaincre, malgrÃ© la coopÃ©ration rÃ©gionale et lâ€™aide militaire occidentale.\r\n\r\nLâ€™armÃ©e nigÃ©rienne avait subi dans lâ€™Ouest deux dÃ©faites dÃ©sastreuses il y a un an, contre les camps militaires dâ€™Inates (71 morts Ã  la fin de 2019), et ChinÃ©godar (89 morts au dÃ©but de 2020). Les attaques djihadistes dans lâ€™Ouest et le Sud-Est ont fait des centaines de morts depuis 2010, et fait fuir de leurs foyers environ 500 000  rÃ©fugiÃ©s et dÃ©placÃ©s (dont 160 000 dans lâ€™Ouest), selon lâ€™ONU.', 'loup'),
(21, '2021-01-03', 'Couvre-feu Ã  18 heures, rave-party illÃ©gale, Brexit, claque pour Trump au CongrÃ¨sâ€¦ les cinq infos Ã  retenir du week-end', 'Le couperet est tombÃ© : pour faire face Ã  une tendance inquiÃ©tante dans lâ€™est du pays et Ã©viter une nouvelle flambÃ©e de lâ€™Ã©pidÃ©mie, le couvre-feu est dÃ©sormais passÃ© Ã  18 heures dans quinze dÃ©partements, samedi 2 janvier, contre 20 heures dans le reste du pays.\r\n\r\nHautes-Alpes, Alpes-Maritimes, Ardennes, Doubs, Jura, Marne, Haute-Marne, Meurthe-et-Moselle, Meuse, Moselle, NiÃ¨vre, Haute-SaÃ´ne, SaÃ´ne-et-Loire, Vosges et Territoire de Belfortâ€¦ ce sont environ 6 millions de FranÃ§ais qui ne peuvent plus sortir de chez eux aprÃ¨s cette heure. Certains Ã©lus du Grand-Est rÃ©clamaient des mesures plus restrictives, jusquâ€™Ã  des reconfinements locaux.', 'manoah');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `login` varchar(30) NOT NULL COMMENT 'Login de l''utilisateur',
  `password` varchar(60) NOT NULL COMMENT 'Mot de passe de l''utilisateur',
  `role` tinyint(1) NOT NULL COMMENT 'Role de l''utilisateur: 0=user,1=admin',
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`login`, `password`, `role`) VALUES
('admin', '$2y$10$VDcoBkq5f6WnI95oXGuHleua4gNwNCjfkTOmEKIJHCPRI3o.UzaXS', 1),
('loup', '$2y$10$J.MiRffZxbxv9.GHfzeei.dDzChJYPIbv38iI7hc0.2hQsZ20XdAi', 0),
('manoah', '$2y$10$iEQMzUtPyyhkTrRk091yC.MjSp1yJ3v0nrACf46.65xr.190iisle', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `COMMENT_AUTEUR` FOREIGN KEY (`auteur`) REFERENCES `user` (`login`),
  ADD CONSTRAINT `COMMENT_NEWS` FOREIGN KEY (`idNews`) REFERENCES `news` (`idNews`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `NEWS_AUTEUR` FOREIGN KEY (`auteur`) REFERENCES `user` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

