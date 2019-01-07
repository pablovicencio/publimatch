-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-12-2018 a las 01:48:30
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `publimatch`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

DROP TABLE IF EXISTS `anuncios`;
CREATE TABLE IF NOT EXISTS `anuncios` (
  `id_anuncio` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad_anuncio` int(11) DEFAULT NULL,
  `comuna_anuncio` int(11) DEFAULT NULL,
  `nom_anuncio` varchar(100) DEFAULT NULL,
  `cat_anuncio` int(11) DEFAULT NULL,
  `fono1_anuncio` int(11) DEFAULT NULL,
  `fono2_anuncio` int(11) DEFAULT NULL,
  `desc_anuncio` varchar(350) DEFAULT NULL,
  `fb_anuncio` varchar(100) DEFAULT NULL,
  `ig_anuncio` varchar(100) DEFAULT NULL,
  `tw_anuncio` varchar(100) DEFAULT NULL,
  `ws_anuncio` varchar(100) DEFAULT NULL,
  `vig_anuncio` int(11) DEFAULT NULL,
  `hdesde_anuncio` time DEFAULT NULL,
  `hhasta_anuncio` time DEFAULT NULL,
  `maps_anuncio` varchar(1000) DEFAULT NULL,
  `dir_anuncio` varchar(150) DEFAULT NULL,
  `fec_termino_anuncio` date DEFAULT NULL,
  PRIMARY KEY (`id_anuncio`),
  KEY `fk_ciudad_idx` (`ciudad_anuncio`),
  KEY `fk_comuna_idx` (`comuna_anuncio`),
  KEY `fk_cat_idx` (`cat_anuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id_anuncio`, `ciudad_anuncio`, `comuna_anuncio`, `nom_anuncio`, `cat_anuncio`, `fono1_anuncio`, `fono2_anuncio`, `desc_anuncio`, `fb_anuncio`, `ig_anuncio`, `tw_anuncio`, `ws_anuncio`, `vig_anuncio`, `hdesde_anuncio`, `hhasta_anuncio`, `maps_anuncio`, `dir_anuncio`, `fec_termino_anuncio`) VALUES
(1, 0, 0, 'Centro Dental Alicia Cardozo', 5, 34182407, 0, 'Centro Dental con un servicio integral de salud dental, con atención a domicilio en cualquier horario', NULL, NULL, NULL, NULL, 1, '02:50:00', '03:00:00', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d107335.69007071936!2d-70.75557231002708!3d-32.785886726629556!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x968816c7e2491d55%3A0xa1d6a2e3250fee07!2sValle+Aconcagua!5e0!3m2!1ses!2scl!4v1541367973951\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Atención a domicilio en todo el Valle de Aconcagua', '2018-12-31'),
(2, 1, 1, 'Botilleria San Nicolas', 2, 97053625, 0, 'Botilleria con una gran cantidad de vinos, licores. bebidas y snack para tu carrete', NULL, NULL, NULL, NULL, 1, '18:00:00', '02:00:00', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.132319387441!2d-70.57935745964319!3d-32.79975070942361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96880576c8f5d309%3A0xc7d651d0fde51bb!2sBotilleria+San+Nicol%C3%A1s!5e0!3m2!1ses!2scl!4v1541370777412\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Av. 26 De Diciembre, Frente a la plaza de San Esteban', '2018-12-31'),
(3, 1, 1, 'D-REX Comida Rapida', 6, 30725341, 0, 'Disfruta de los mas ricos completos, papas fritas, sandwich y mucho mas.Visita Nuestro Facebook. Contamos con Delivery', 'https://www.facebook.com/bajon.rex', NULL, NULL, NULL, 1, '18:00:00', '02:00:00', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3353.788741118759!2d-70.58443211699831!3d-32.79785781075701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x968805706eb4d0e5%3A0x83a2a778d703271e!2sCarnes+Max!5e0!3m2!1ses-419!2scl!4v1541371809455\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Av. 26 De Diciembre #140', '2018-12-31'),
(4, 1, 1, 'Caza y Pesca Ramon Osorio', 3, 74367537, 0, 'Encuentra gran variedad de accesorios para las actividades de caza y pesca', NULL, NULL, NULL, NULL, 1, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d914.32064360401!2d-70.5814365200068!3d-32.79907365973249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96880571278935ab%3A0xe926af746b7ac058!2sArmeria+Osorio+Cortez!5e0!3m2!1ses-419!2scl!4v1541372914354\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Los Copihues #13 ', '2018-12-31'),
(5, 1, 1, 'Semilleria Felipe', 2, 480653, 0, 'En Semilleria Felipe encontras la mejor relacion precio y calidad tanto de las distintas comidad de tus mascota como de variados productos como frutos secos, semillas en general y accesorios para tus compañeros animales', NULL, NULL, NULL, NULL, 1, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d838.4280930439386!2d-70.57963417081166!3d-32.799884998810334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzLCsDQ3JzU5LjYiUyA3MMKwMzQnNDQuNyJX!5e0!3m2!1ses-419!2scl!4v1541374278486\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Av. 26 De Diciembre #776', '2018-12-31'),
(6, 1, 3, 'Hostal Berta', 4, 71880560, 0, 'Nuestro servicio de alojamiento ofrece vista a la montaña y cuentan con lavadora, cocina totalmente equipada y baño compartido con artículos de aseo gratuitos y secador de pelo. También hay horno, tostadora y cafetera.', NULL, NULL, NULL, 'https://www.booking.com/hotel/cl/hostal-berta.es.html', 1, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13405.475973567467!2d-70.4338887!3d-32.8619552!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc34de29cfa97b509!2sHostel+Berta!5e0!3m2!1ses-419!2scl!4v1541375007358\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Ruta 60 Villa Aconcagua', '2018-12-31'),
(7, 0, 0, 'DVR Servicios Especilizados', 5, 997147129, 94513849, 'Somos especialistas en soldadura de termóplasticos y en obras de construcción en general. Realizamos trabajos de termófusión  en HDPE y PPR, ofrecemos servicios de construcción de obras menores, como albañileria, carpinteria, gasfiteria, pintura, electricidad, estructuras metálicas, etc. Ofrecemos soluciones y reparaciones de emergencia en terreno.', NULL, NULL, NULL, NULL, 1, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d107335.69007071936!2d-70.75557231002708!3d-32.785886726629556!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x968816c7e2491d55%3A0xa1d6a2e3250fee07!2sValle+Aconcagua!5e0!3m2!1ses!2scl!4v1541367973951\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Realizamos trabajos en todo el Valle de Aconcagua', '2018-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_anuncio`
--

DROP TABLE IF EXISTS `cat_anuncio`;
CREATE TABLE IF NOT EXISTS `cat_anuncio` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(100) DEFAULT NULL,
  `vig_cat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_anuncio`
--

INSERT INTO `cat_anuncio` (`id_cat`, `nom_cat`, `vig_cat`) VALUES
(1, 'Ecoturismo', 1),
(2, 'Restaurantes', 1),
(3, 'Deportes', 1),
(4, 'Hoteleria', 1),
(5, 'Servicios', 1),
(6, 'Delivery', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad_cl`
--

DROP TABLE IF EXISTS `ciudad_cl`;
CREATE TABLE IF NOT EXISTS `ciudad_cl` (
  `id_ciudad` int(11) NOT NULL,
  `nom_ciudad` varchar(50) DEFAULT NULL,
  `vig_ciudad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad_cl`
--

INSERT INTO `ciudad_cl` (`id_ciudad`, `nom_ciudad`, `vig_ciudad`) VALUES
(0, 'Todo el Valle de Aconcagua', 1),
(1, 'Los Andes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas_cl`
--

DROP TABLE IF EXISTS `comunas_cl`;
CREATE TABLE IF NOT EXISTS `comunas_cl` (
  `id_comuna` int(11) NOT NULL,
  `nom_comuna` varchar(50) DEFAULT NULL,
  `vig_comuna` int(11) DEFAULT NULL,
  `fk_id_ciudad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_comuna`),
  KEY `fk_ciu_com_idx` (`fk_id_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comunas_cl`
--

INSERT INTO `comunas_cl` (`id_comuna`, `nom_comuna`, `vig_comuna`, `fk_id_ciudad`) VALUES
(0, 'Todas las Comunas', 1, 0),
(1, 'San Esteban', 1, 1),
(2, 'Calle Larga', 1, 1),
(3, 'Los Andes', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `dia_horario` int(11) NOT NULL,
  `hdesde_horario` time NOT NULL,
  `hhasta_horario` time NOT NULL,
  `vig_horario` int(11) NOT NULL,
  `fk_id_anuncio` int(11) NOT NULL,
  PRIMARY KEY (`id_horario`),
  KEY `fk_anuncio_horario` (`fk_id_anuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `dia_horario`, `hdesde_horario`, `hhasta_horario`, `vig_horario`, `fk_id_anuncio`) VALUES
(1, 0, '00:00:00', '00:00:00', 0, 1),
(2, 1, '00:00:00', '23:59:00', 1, 1),
(3, 2, '00:00:00', '23:59:00', 1, 1),
(4, 4, '00:00:00', '23:59:00', 1, 1),
(5, 5, '00:00:00', '23:59:00', 1, 1),
(6, 6, '00:00:00', '23:59:00', 1, 1),
(7, 7, '00:00:00', '23:59:00', 1, 1),
(8, 3, '00:00:00', '23:59:00', 1, 1),
(9, 1, '19:00:00', '00:00:00', 1, 2),
(10, 2, '19:00:00', '00:00:00', 1, 2),
(11, 3, '19:00:00', '00:00:00', 1, 2),
(12, 4, '19:00:00', '00:00:00', 1, 2),
(13, 5, '19:00:00', '03:00:00', 1, 2),
(14, 6, '19:00:00', '03:00:00', 1, 2),
(15, 7, '11:00:00', '20:00:00', 1, 2),
(16, 1, '12:00:00', '23:59:00', 1, 3),
(17, 2, '12:00:00', '23:59:00', 1, 3),
(18, 3, '12:00:00', '23:59:00', 1, 3),
(19, 4, '12:00:00', '23:59:00', 1, 3),
(20, 5, '12:00:00', '02:00:00', 1, 3),
(21, 6, '12:00:00', '02:00:00', 1, 3),
(22, 7, '12:00:00', '23:59:00', 1, 3),
(23, 1, '10:00:00', '21:00:00', 1, 4),
(24, 2, '10:00:00', '21:00:00', 1, 4),
(25, 3, '10:00:00', '21:00:00', 1, 4),
(26, 4, '10:00:00', '21:00:00', 1, 4),
(27, 5, '10:00:00', '21:00:00', 1, 4),
(28, 6, '10:00:00', '21:00:00', 1, 4),
(29, 7, '00:00:00', '00:00:00', 1, 4),
(30, 1, '10:00:00', '20:00:00', 1, 5),
(31, 2, '10:00:00', '20:00:00', 1, 5),
(32, 3, '10:00:00', '20:00:00', 1, 5),
(33, 4, '10:00:00', '20:00:00', 1, 5),
(34, 5, '10:00:00', '20:00:00', 1, 5),
(35, 6, '10:00:00', '14:00:00', 1, 5),
(36, 7, '00:00:00', '00:00:00', 1, 5),
(37, 1, '00:00:00', '23:59:00', 1, 6),
(38, 2, '00:00:00', '23:59:00', 1, 6),
(39, 3, '00:00:00', '23:59:00', 1, 6),
(40, 4, '00:00:00', '23:59:00', 1, 6),
(41, 5, '00:00:00', '23:59:00', 1, 6),
(42, 6, '00:00:00', '23:59:00', 1, 6),
(43, 7, '00:00:00', '23:59:00', 1, 6),
(44, 1, '08:00:00', '20:00:00', 1, 7),
(45, 2, '08:00:00', '20:00:00', 1, 7),
(46, 3, '08:00:00', '20:00:00', 1, 7),
(47, 4, '08:00:00', '20:00:00', 1, 7),
(48, 5, '08:00:00', '20:00:00', 1, 7),
(49, 6, '08:00:00', '14:00:00', 1, 7),
(50, 7, '00:00:00', '00:00:00', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_anuncio`
--

DROP TABLE IF EXISTS `img_anuncio`;
CREATE TABLE IF NOT EXISTS `img_anuncio` (
  `fk_id_anuncio` int(11) NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_img`),
  KEY `fk_img_anuncio_idx` (`fk_id_anuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `img_anuncio`
--

INSERT INTO `img_anuncio` (`fk_id_anuncio`, `img`, `id_img`) VALUES
(1, '../img/anuncios/1/1.jpg', 1),
(1, '../img/anuncios/1/2.jpg', 2),
(1, '../img/anuncios/1/3.jpg', 3),
(2, '../img/anuncios/2/1.jpg', 4),
(2, '../img/anuncios/2/2.jpg', 5),
(2, '../img/anuncios/2/3.jpg', 6),
(3, '../img/anuncios/3/1.jpg', 7),
(3, '../img/anuncios/3/2.jpg', 8),
(4, '../img/anuncios/4/1.jpg', 9),
(4, '../img/anuncios/4/2.jpg', 10),
(4, '../img/anuncios/4/3.jpg', 11),
(4, '../img/anuncios/4/4.jpg', 12),
(5, '../img/anuncios/5/1.jpg', 13),
(6, '../img/anuncios/6/1.jpg', 14),
(6, '../img/anuncios/6/2.jpg', 15),
(6, '../img/anuncios/6/3.jpg', 16),
(6, '../img/anuncios/6/4.jpg', 17),
(7, '../img/anuncios/7/1.jpg', 18),
(7, '../img/anuncios/7/2.jpg', 19),
(7, '../img/anuncios/7/3.jpg', 20),
(7, '../img/anuncios/7/4.jpg', 21),
(7, '../img/anuncios/7/5.jpg', 22),
(7, '../img/anuncios/7/6.jpg', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE IF NOT EXISTS `promo` (
  `id_promo` int(11) NOT NULL AUTO_INCREMENT,
  `desc_promo` varchar(350) NOT NULL,
  `qr_promo` varchar(250) NOT NULL,
  `img_promo` varchar(350) NOT NULL,
  `fec_reg_promo` datetime NOT NULL,
  `vig_promo` int(11) NOT NULL DEFAULT '0',
  `fk_id_anuncio` int(11) DEFAULT NULL,
  `duracion_promo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_promo`),
  KEY `fk_promo_anuncio_idx` (`fk_id_anuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `promo`
--

INSERT INTO `promo` (`id_promo`, `desc_promo`, `qr_promo`, `img_promo`, `fec_reg_promo`, `vig_promo`, `fk_id_anuncio`, `duracion_promo`) VALUES
(1, 'pisco mas bebida $3500', '<img class=\"img-fluid\" src=\"http://www.codigos-qr.com/qr/php/qr_img.php?d=http%3A%2F%2Fseaconcagua.cl%2Fcontroles%2FcontrolGuardarPromo.php%3Fid_promo%3D1&s=4&e=m\" alt=\"Generador de Códigos QR Codes\"/>', 'https://www.copetexpress.cl/wp-content/uploads/2018/07/Promo-Capel-35-1000cc-bebida-1.5-lt-600x765.jpg', '2018-11-05 16:19:23', 1, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntaje`
--

DROP TABLE IF EXISTS `puntaje`;
CREATE TABLE IF NOT EXISTS `puntaje` (
  `id_puntaje` int(11) NOT NULL AUTO_INCREMENT,
  `nota_puntaje` int(11) DEFAULT NULL,
  `vig_puntaje` int(11) DEFAULT NULL,
  `fk_anuncio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_puntaje`),
  KEY `fk_puntaje_anuncio_idx` (`fk_anuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntaje`
--

INSERT INTO `puntaje` (`id_puntaje`, `nota_puntaje`, `vig_puntaje`, `fk_anuncio`) VALUES
(1, 7, 1, 5),
(2, 7, 1, 1),
(3, 7, 1, 7),
(4, 7, 1, 7),
(5, 7, 1, 7),
(6, 1, 1, 7),
(7, 7, 1, 5),
(8, 7, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uso_promo`
--

DROP TABLE IF EXISTS `uso_promo`;
CREATE TABLE IF NOT EXISTS `uso_promo` (
  `id_uso_promo` int(11) NOT NULL AUTO_INCREMENT,
  `fec_uso_promo` datetime NOT NULL,
  `fk_id_promo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_uso_promo`),
  KEY `fk_uso_promo_idx` (`fk_id_promo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `uso_promo`
--

INSERT INTO `uso_promo` (`id_uso_promo`, `fec_uso_promo`, `fk_id_promo`) VALUES
(2, '2018-11-08 04:06:12', 1),
(3, '2018-11-08 07:28:46', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`cat_anuncio`) REFERENCES `cat_anuncio` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ciudad` FOREIGN KEY (`ciudad_anuncio`) REFERENCES `ciudad_cl` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comuna` FOREIGN KEY (`comuna_anuncio`) REFERENCES `comunas_cl` (`id_comuna`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comunas_cl`
--
ALTER TABLE `comunas_cl`
  ADD CONSTRAINT `fk_comuna_ciudad` FOREIGN KEY (`fk_id_ciudad`) REFERENCES `ciudad_cl` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_anuncio_horario` FOREIGN KEY (`fk_id_anuncio`) REFERENCES `anuncios` (`id_anuncio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `img_anuncio`
--
ALTER TABLE `img_anuncio`
  ADD CONSTRAINT `fk_img_anuncio` FOREIGN KEY (`fk_id_anuncio`) REFERENCES `anuncios` (`id_anuncio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `fk_promo_anuncio` FOREIGN KEY (`fk_id_anuncio`) REFERENCES `anuncios` (`id_anuncio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `puntaje`
--
ALTER TABLE `puntaje`
  ADD CONSTRAINT `fk_puntaje_anuncio` FOREIGN KEY (`fk_anuncio`) REFERENCES `anuncios` (`id_anuncio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `uso_promo`
--
ALTER TABLE `uso_promo`
  ADD CONSTRAINT `fk_uso_promo` FOREIGN KEY (`fk_id_promo`) REFERENCES `promo` (`id_promo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
