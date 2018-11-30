

CREATE DATABASE IF NOT EXISTS crud;
USE crud;



DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE `pessoa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


