-- BASE DE DONNEES PROJET BLOG PHP | LEVY-VALENSI & RUSAK G3


DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `comment`;
DROP TABLE IF EXISTS `news`;


--CREATION DE LA TABLE USER (UTILISATEURS)

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant de l''utilisateur',
  `login` varchar(30) NOT NULL COMMENT 'Login de l''utilisateur',
  `password` varchar(30) NOT NULL COMMENT 'Mot de passe de l''utilisateur',
  `role` tinyint(1) NOT NULL COMMENT 'Role de l''utilisateur: 0=user,1=admin',
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `user`(`login`, `password`, `role`) VALUES ("admin","admin",1);


--CREATION DE LA TABLE NEWS

CREATE TABLE IF NOT EXISTS `news` (
  `idNews` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la news',
  `date` date NOT NULL COMMENT 'date d''ajout de la news',
  `titre` varchar(400) NOT NULL COMMENT 'titre de la news',
  `description` text NOT NULL COMMENT 'description de la news',
  `auteur` int(11) NOT NULL COMMENT 'Auteur de la news',
  PRIMARY KEY (`idnews`),
  UNIQUE KEY `UNIQUE_TITRE` (`titre`),
  KEY `NEWS_AUTEUR` (`auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table ModelNews du blog';
ALTER TABLE `news`
  ADD CONSTRAINT `NEWS_AUTEUR` FOREIGN KEY (`auteur`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

INSERT INTO `news`(`date`, `titre`, `description`, `auteur`) VALUES (to_date(current_date),'Que pouvons nous faire le soir du nouvel an ?',
'Vous ne savez pas ce qui est interdit ou autorisé ?Vous ne savez pas ce qui est interdit ou autorisé ?' ||
 'Vous ne savez pas ce qui est interdit ou autorisé ?Vous ne savez pas ce qui est interdit ou autorisé ?' ||
  'Vous ne savez pas ce qui est interdit ou autorisé ?Vous ne savez pas ce qui est interdit ou autorisé ?' ||
   'Vous ne savez pas ce qui est interdit ou autorisé ?Vous ne savez pas ce qui est interdit ou autorisé ?',
   1);

INSERT INTO `news`(`date`, `titre`, `description`, `auteur`) VALUES (to_date(current_date),'Que pouvons nous ne pas faire le soir du nouvel an ?',
'Vous ne savez pas ce qui est interdit ou autorisé ?Vous ne savez pas ce qui est interdit ou autorisé ?' ||
 'Vous ne savez pas ce qui est interdit ou autorisé ?Vous ne savez pas ce qui est interdit ou autorisé ?' ||
  'Vous ne savez pas ce qui est interdit ou autorisé ?Vous ne savez pas ce qui est interdit ou autorisé ?' ||
   'Vous ne savez pas ce qui est interdit ou autorisé ?Vous ne savez pas ce qui est interdit ou autorisé ?',
    1);


--CREATION DE LA TABLE COMMENT (COMMENTAIRES)

CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du commentaire',
  `idNews` int(11) NOT NULL COMMENT 'identifiant de la news concernées par le commentaire',
  `auteur` int(11) NOT NULL COMMENT 'identifiant de l''auteur du commentaire',
  `message` varchar(300) NOT NULL COMMENT 'commentaire',
  PRIMARY KEY (`idComment`),
  KEY `COMMENT_AUTEUR` (`auteur`),
  KEY `COMMENT_NEWS` (`idNews`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `comment`
  ADD CONSTRAINT `COMMENT_AUTEUR` FOREIGN KEY (`auteur`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `COMMENT_NEWS` FOREIGN KEY (`idNews`) REFERENCES `news` (`idnews`) ON DELETE NO ACTION ON UPDATE NO ACTION;
