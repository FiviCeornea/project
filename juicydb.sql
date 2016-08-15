

CREATE TABLE IF NOT EXISTS `categorii` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(32) NOT NULL,
  `imagine` varchar(64) NOT NULL,
  `stoc` int(11) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `categorii` (`idCategorie`, `nume`, `imagine`, `stoc`) VALUES
(1, 'Bauturi carbogazoase', 'carbogazoase.jpg', 1245);



CREATE TABLE IF NOT EXISTS `facturi` (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`idFactura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `produse` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `nume` varchar(32) DEFAULT NULL,
  `descriere` varchar(255) NOT NULL,
  `pret` float NOT NULL,
  `continut` varchar(255) NOT NULL,
  `stoc` int(5) NOT NULL,
  `categorie` varchar(32) NOT NULL,
  `imagine1` varchar(64) NOT NULL,
  `imagine2` varchar(64) NOT NULL,
  `imagine3` varchar(64) NOT NULL,
  `idFurnizor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


INSERT INTO `produse` (`id`, `nume`, `descriere`, `pret`, `continut`, `stoc`, `categorie`, `imagine1`, `imagine2`, `imagine3`, `idFurnizor`) VALUES
(2, 'Coca-Cola 2.5L', 'Bautura racoritoare carbogazoasa. Ambalaj de unica folosinta.', 5.85, 'Apa, zahar, dioxid de carbon, colorant caramel E150d, acidifiant acid fosforic, arome naturale, cafeina.', 532, 'Bauturi carbogazoase', 'cocacola.jpg', '', '', 2);


CREATE TABLE IF NOT EXISTS `produsefactura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idFactura` int(11) NOT NULL,
  `idProdus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `parola` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `adresa` varchar(128) NOT NULL,
  `telefon` varchar(16) NOT NULL,
  `imagine` varchar(64) NOT NULL,
  `data_inregistrarii` varchar(32) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;


INSERT INTO `users` (`idUser`, `nume`, `username`, `parola`, `email`, `adresa`, `telefon`, `imagine`, `data_inregistrarii`) VALUES
(1, 'Dina Gavriliuc', 'dinagavriliuc', 'rucurucu', 'dina@gavriliuc.com', 'Strada smechera, Iasington', '123456789', 'gavri.jpg', '2015-05-29 00:00:00'),
(4, 'Banu', 'Boss', 'ceb8447cc4ab78d2ec34cd9f11e4bed2', 'boss@shemcheire.ro', 'strada', '123456', '', '2015-05-30 12:42:32');

