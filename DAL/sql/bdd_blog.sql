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
  ADD CONSTRAINT `COMMENT_NEWS` FOREIGN KEY (`idNews`) REFERENCES `news` (`idNews`);
