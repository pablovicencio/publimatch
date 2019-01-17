-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-01-2019 a las 18:33:08
-- Versión del servidor: 5.7.23
-- Versión de PHP: 5.6.38

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
-- Estructura de tabla para la tabla `reg_visita`
--

DROP TABLE IF EXISTS `reg_visita`;
CREATE TABLE IF NOT EXISTS `reg_visita` (
  `id_anuncio` int(11) DEFAULT NULL,
  `id_promo` int(11) DEFAULT NULL,
  `touch` varchar(1) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nav` varchar(25) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fec` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `reg_visita`
--

INSERT INTO `reg_visita` (`id_anuncio`, `id_promo`, `touch`, `nav`, `fec`) VALUES
(1, NULL, 'N', 'Mozilla', '2019-01-17 06:31:52'),
(1, NULL, 'N', 'Desk-Mozilla', '2019-01-17 06:32:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
