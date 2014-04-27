-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.36-community-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema ozono
--

CREATE DATABASE IF NOT EXISTS ozono;
USE ozono;

--
-- Definition of table `banco`
--

DROP TABLE IF EXISTS `banco`;
CREATE TABLE `banco` (
  `id_banco` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `snombre` varchar(45) DEFAULT NULL,
  `sdireccion` varchar(45) DEFAULT NULL,
  `stelefono` varchar(45) DEFAULT NULL,
  `bstatus` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_banco`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banco`
--

/*!40000 ALTER TABLE `banco` DISABLE KEYS */;
INSERT INTO `banco` (`id_banco`,`snombre`,`sdireccion`,`stelefono`,`bstatus`) VALUES 
 (1,'Banco Industrial','Plaza Industrial zona 4','8273649',1),
 (2,'Banco Agromercantil','7ma av. zona 4. guatemala','987654-89-16',1),
 (4,'Banco G&T','guatemala','0909897',1);
/*!40000 ALTER TABLE `banco` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `snombre` varchar(45) DEFAULT NULL,
  `sdireccion` varchar(45) DEFAULT NULL,
  `stelefono` varchar(45) DEFAULT NULL,
  `snit` varchar(45) DEFAULT NULL,
  `semail` varchar(45) DEFAULT NULL,
  `bstatus` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(255) DEFAULT NULL,
  `contacto` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `activo` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`,`cliente`,`contacto`,`direccion`,`email`,`activo`) VALUES 
 (1,'Sender Flores','Sender Flores','Guatemala','safcrace@hotmail.com',1),
 (2,'Wilver Gonzalez','52014069','direccion','waga@gmail.com',1),
 (3,'yeimy','yeimy','direccion','correo',1),
 (4,'','','','',0);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;


--
-- Definition of table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
CREATE TABLE `cuenta` (
  `id_cuenta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_banco` int(10) unsigned NOT NULL,
  `stipo` varchar(45) DEFAULT NULL,
  `smoneda` varchar(5) DEFAULT NULL,
  `saldo` float DEFAULT NULL,
  `snocuenta` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cuenta`
--

/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` (`id_cuenta`,`id_banco`,`stipo`,`smoneda`,`saldo`,`snocuenta`) VALUES 
 (1,2,'Monetaria','Q',1000,'12-0987-23'),
 (2,0,'Ahorro','Q.',2000,'1111'),
 (3,0,'Monetaria','USD',1125.75,''),
 (4,0,'Ahorro','Q.',2000,'gyt-98883763-9'),
 (7,2,'monetario','USD',1245.23,'49-098798-2'),
 (8,4,'agro ahorro','USD',1231.23,'GYT 123'),
 (9,4,'monetario','USD',2000.54,'12-456456-98');
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;


--
-- Definition of table `documento`
--

DROP TABLE IF EXISTS `documento`;
CREATE TABLE `documento` (
  `id_doc` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `snombre` varchar(45) DEFAULT NULL,
  `sdescripcion` varchar(45) DEFAULT NULL,
  `id_ctacontable` int(10) unsigned DEFAULT NULL,
  `id_cliente` int(10) unsigned DEFAULT NULL,
  `id_proveedor` int(10) unsigned DEFAULT NULL,
  `id_tipodoc` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documento`
--

/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;


--
-- Definition of table `me_categorias`
--

DROP TABLE IF EXISTS `me_categorias`;
CREATE TABLE `me_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` char(75) NOT NULL,
  `tipo_menu` char(5) NOT NULL,
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `me_categorias`
--

/*!40000 ALTER TABLE `me_categorias` DISABLE KEYS */;
INSERT INTO `me_categorias` (`id`,`categoria`,`tipo_menu`,`orden`) VALUES 
 (32,'Catálogos','ME',1),
 (33,'Clientes','ME',2),
 (34,'Menú','ME',3),
 (35,'Usuarios','ME',4),
 (36,'Reportes','ME',6),
 (37,'Pacientes','ME',6);
/*!40000 ALTER TABLE `me_categorias` ENABLE KEYS */;


--
-- Definition of table `me_opciones`
--

DROP TABLE IF EXISTS `me_opciones`;
CREATE TABLE `me_opciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opcion` char(255) DEFAULT NULL,
  `link` char(255) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `activo` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `me_opciones`
--

/*!40000 ALTER TABLE `me_opciones` DISABLE KEYS */;
INSERT INTO `me_opciones` (`id`,`opcion`,`link`,`categoria`,`orden`,`activo`) VALUES 
 (121,'Autores','index1.php?op=frm_autor',32,1,'S'),
 (122,'Complementos de noticias','index1.php?op=frm_complemento',32,2,'S'),
 (124,'Categorías','index1.php?op=frm_categoria',32,3,'S'),
 (125,'Secciones','index1.php?op=frm_seccion',32,4,'S'),
 (126,'Clientes','index1.php?op=frm_cliente',32,5,'S'),
 (127,'Admón. de Noticias','index1.php?op=frm_noticia',33,1,'S'),
 (128,'Admón. del Menú','index1.php?op=frm_menu_categoria',34,1,'S'),
 (129,'Permisos de usuarios','index1.php?op=frm_usuario_permisos',35,2,'S'),
 (130,'Usuarios','index1.php?op=frm_usuario',35,1,'S'),
 (131,'Videos','index1.php?op=frm_video',33,2,'S'),
 (132,'Crear','link',36,1,'S'),
 (133,'Buscar','link',36,2,'S'),
 (134,'Historico por Paciente','link',36,3,'S'),
 (135,'Directorio','link',36,4,'S'),
 (136,'Admin. Pacientes','index1.php?op=frm_paciente',37,1,'S'),
 (137,'Buscar','link',37,2,'S'),
 (138,'Directorio Pacientes','link',37,4,'S'),
 (139,'Historico por Paciente','link',37,3,'S');
INSERT INTO `me_opciones` (`id`,`opcion`,`link`,`categoria`,`orden`,`activo`) VALUES 
 (140,'Bancos','index1.php?op=frm_bancos',32,6,'S'),
 (141,'Cuentas','index1.php?op=frm_cuentas',32,7,'S');
/*!40000 ALTER TABLE `me_opciones` ENABLE KEYS */;


--
-- Definition of table `me_permisos`
--

DROP TABLE IF EXISTS `me_permisos`;
CREATE TABLE `me_permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` char(25) DEFAULT NULL,
  `opcion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6375 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `me_permisos`
--

/*!40000 ALTER TABLE `me_permisos` DISABLE KEYS */;
INSERT INTO `me_permisos` (`id`,`usuario`,`opcion`) VALUES 
 (6373,'waga',139),
 (6372,'waga',137),
 (6371,'waga',136),
 (6370,'waga',135),
 (6369,'waga',134),
 (6368,'waga',133),
 (6367,'waga',132),
 (6366,'waga',129),
 (6365,'waga',130),
 (6364,'waga',128),
 (6363,'waga',131),
 (6362,'waga',127),
 (6361,'waga',141),
 (6360,'waga',140),
 (6359,'waga',126),
 (6358,'waga',125),
 (6357,'waga',124),
 (6356,'waga',122),
 (6355,'waga',121),
 (6374,'waga',138);
/*!40000 ALTER TABLE `me_permisos` ENABLE KEYS */;


--
-- Definition of table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `snombre` varchar(45) DEFAULT NULL,
  `sdescripcion` varchar(500) DEFAULT NULL,
  `slink` varchar(200) DEFAULT NULL,
  `starget` varchar(45) DEFAULT NULL,
  `bhijos` tinyint(1) DEFAULT NULL,
  `id_padre` int(10) unsigned DEFAULT NULL,
  `bstatus` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


--
-- Definition of table `menuxrol`
--

DROP TABLE IF EXISTS `menuxrol`;
CREATE TABLE `menuxrol` (
  `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_rol` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuxrol`
--

/*!40000 ALTER TABLE `menuxrol` DISABLE KEYS */;
/*!40000 ALTER TABLE `menuxrol` ENABLE KEYS */;


--
-- Definition of table `movimiento`
--

DROP TABLE IF EXISTS `movimiento`;
CREATE TABLE `movimiento` (
  `id_mov` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_doc` varchar(45) NOT NULL,
  `fmov` varchar(45) NOT NULL,
  `monto` float NOT NULL,
  `id_ctacontable` int(10) unsigned NOT NULL,
  `id_cliente` int(10) unsigned NOT NULL,
  `bstatus` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id_mov`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movimiento`
--

/*!40000 ALTER TABLE `movimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimiento` ENABLE KEYS */;


--
-- Definition of table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fnac` datetime DEFAULT NULL,
  `activo` int(1) DEFAULT '0',
  `telmobil` varchar(45) DEFAULT NULL,
  `telcasa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paciente`
--

/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` (`id`,`nombres`,`apellidos`,`direccion`,`email`,`fnac`,`activo`,`telmobil`,`telcasa`) VALUES 
 (6,'wilver','gonzalez','','','0000-00-00 00:00:00',1,NULL,NULL),
 (7,'sender','flores','','','0000-00-00 00:00:00',1,NULL,NULL);
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;


--
-- Definition of table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `id_proveedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `snombre` varchar(45) DEFAULT NULL,
  `sdireccion` varchar(45) DEFAULT NULL,
  `stelefono` varchar(45) DEFAULT NULL,
  `snit` varchar(45) DEFAULT NULL,
  `semail` varchar(45) DEFAULT NULL,
  `bstatus` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveedor`
--

/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;


--
-- Definition of table `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id_rol` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `snombre` varchar(45) DEFAULT NULL,
  `sdescripcion` varchar(45) DEFAULT NULL,
  `bstatus` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--

/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;


--
-- Definition of table `tipodoc`
--

DROP TABLE IF EXISTS `tipodoc`;
CREATE TABLE `tipodoc` (
  `id_tipodoc` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `snombre` varchar(45) DEFAULT NULL,
  `sdescripcion` varchar(45) DEFAULT NULL,
  `bstatus` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_tipodoc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipodoc`
--

/*!40000 ALTER TABLE `tipodoc` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipodoc` ENABLE KEYS */;


--
-- Definition of table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `usuario` varchar(25) NOT NULL DEFAULT '',
  `clave` varchar(255) DEFAULT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `apellido` varchar(75) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `activo` int(1) DEFAULT '0',
  `u_acceso` datetime DEFAULT NULL,
  `ip_uacceso` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`usuario`,`clave`,`nombre`,`apellido`,`email`,`telefono`,`activo`,`u_acceso`,`ip_uacceso`) VALUES 
 ('waga','waga','Wilver','Gonzalez',NULL,NULL,1,'2009-12-21 14:39:24','127.0.0.1');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
