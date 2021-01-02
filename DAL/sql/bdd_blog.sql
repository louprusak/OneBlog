-- BASE DE DONNEES PROJET BLOG PHP | LEVY-VALENSI & RUSAK G3


DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `comment`;
DROP TABLE IF EXISTS `news`;


--CREATION DE LA TABLE USER (UTILISATEURS)

CREATE TABLE IF NOT EXISTS `user` (
  `login` varchar(30) NOT NULL COMMENT 'Login de l''utilisateur',
  `password` varchar(60) NOT NULL COMMENT 'Mot de passe de l''utilisateur',
  `role` tinyint(1) NOT NULL COMMENT 'Role de l''utilisateur: 0=user,1=admin',
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Table ModelNews du blog';
ALTER TABLE `news`
  ADD CONSTRAINT `NEWS_AUTEUR` FOREIGN KEY (`auteur`) REFERENCES `user` (`login`);

INSERT INTO `news` (`idNews`, `date`, `titre`, `description`, `auteur`) VALUES
(1, '2021-01-02', 'Covid-19 : l’est de la France bascule dans le couvre-feu à 18 heures', 'En Bourgogne-Franche-Comté, nul ne se berçait d’illusions. ' ||
 'Le « durcissement » annoncé du couvre-feu, pour reprendre une expression du préfet de région, Fabien Sudry, était inévitable. ' ||
  'Pour Besançon, l’ancienne capitale franc-comtoise, les chiffres publiés par l’agence régionale de santé, vendredi 1er janvier 2021, ' ||
   'parlaient d’eux-mêmes. Les taux d’incidence (nombre de tests, RT-PCR ou antigéniques, positifs par tranche de 100 000 habitants),' ||
    ' en population générale et pour les personnes de plus de 65 ans, étaient respectivement de 266,9 et de 301,3 dans le Doubs, alors ' ||
     'que le seuil de déclenchement du passage du couvre-feu de 20 heures à 18 heures était fixé à 200 par le gouvernement.', 'admin'),
(2, '2021-01-02', 'Le bitcoin dépasse les 30 000 dollars pour la première fois de son histoire', 'Le bitcoin, première cryptomonnaie ' ||
 'décentralisée, a vu son prix dépasser les 30 000 dollars, samedi 2 janvier, pour la première fois de son histoire. Vers 14 heures ' ||
  '(heure française), le bitcoin valait exactement 31 502,77 dollars, selon les données compilées par l’agence Bloomberg.\r\n\r\nIl ' ||
   'avait franchi pour la première fois le seuil des 20 000 dollars le 16 décembre dernier et avait atteint de nouveaux records ces ' ||
    'derniers jours en se rapprochant de la barre de 30 000 dollars.\r\n\r\n« L’appétit pour le risque » qui se reflète dans les achats ' ||
     'de cette cryptomonnaie « reste indomptable », a estimé, dans une note, l’analyste indépendant basé en Allemagne Timo Emden, directeur' ||
      ' de Emden Research. Pour lui, « à la vue de la dynamique du cours, plus de sommets historiques pourraient suivre ».', 'admin'),
(3, '2021-01-02', 'Gendarmes tués dans le Puy-de-Dôme : « Je vais être un killeur de keufs »', 'Frederik Limol, l’homme qui a tué trois ' ||
 'gendarmes à Saint-Just, le soir du 22 décembre, était radicalisé et violent de longue date. « Le Monde » a eu accès au dernier audio ' ||
  'réalisé par sa compagne, qui avait pris l’habitude de l’enregistrer, juste avant la tuerie.', 'admin');




--CREATION DE LA TABLE COMMENT (COMMENTAIRES)

CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du commentaire',
  `idNews` int(11) NOT NULL COMMENT 'identifiant de la news concernées par le commentaire',
  `auteur` varchar(30) NOT NULL COMMENT 'auteur du commentaire',
  `message` varchar(300) NOT NULL COMMENT 'commentaire',
  PRIMARY KEY (`idComment`),
  KEY `COMMENT_AUTEUR` (`auteur`),
  KEY `COMMENT_NEWS` (`idNews`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `comment`
  ADD CONSTRAINT `COMMENT_AUTEUR` FOREIGN KEY (`auteur`) REFERENCES `user` (`login`),
  ADD CONSTRAINT `COMMENT_NEWS` FOREIGN KEY (`idNews`) REFERENCES `news` (`idNews`);
