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
