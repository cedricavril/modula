DROP TABLE IF EXISTS `modula_users`;
CREATE TABLE IF NOT EXISTS `modula_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` mediumtext NOT NULL,
  `prenom` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `message` longtext NOT NULL,
  `ip` varchar(45) NOT NULL,
  `date_envoi` timestamp NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `modula_administrators`;
CREATE TABLE IF NOT EXISTS `modula_administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` mediumtext NOT NULL,
  `pass` mediumtext NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
);


INSERT INTO `modula_administrators` (`nom`, `pass`) 
VALUES ('admin', '$1$Ae4Q7OdQ$VOYEYAUOMSPPoxXpcUd9A/');