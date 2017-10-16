-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-07-2017 a las 21:43:53
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `archivero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE IF NOT EXISTS `archivos` (
  `id_docto` int(11) NOT NULL AUTO_INCREMENT,
  `name_docto` varchar(100) CHARACTER SET utf8 NOT NULL,
  `oficio` varchar(50) CHARACTER SET utf8 NOT NULL,
  `num_archive` int(11) NOT NULL,
  `num_gabeta` int(11) NOT NULL,
  `num_fila` int(11) NOT NULL,
  `repository` varchar(100) CHARACTER SET utf8 NOT NULL,
  `archive` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fecha` date NOT NULL,
  `fechai` date NOT NULL,
  `asignado` varchar(50) CHARACTER SET utf8 NOT NULL,
  `estado` varchar(20) CHARACTER SET utf8 NOT NULL,
  `obs` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_docto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id_docto`, `name_docto`, `oficio`, `num_archive`, `num_gabeta`, `num_fila`, `repository`, `archive`, `fecha`, `fechai`, `asignado`, `estado`, `obs`) VALUES
(2, 'esquema', 'SEDS-1-2017', 5, 2, 15, '../archivospdf/SEDS-1-2017/', 'esquema.pdf', '2017-07-10', '2017-07-11', 'jimenez', '', ''),
(4, 'aclaratoria', 'DNVT-05-2017', 5, 2, 1, '../archivospdf/DNVT-05-2017/', 'aclaratoria.pdf', '2017-07-06', '2017-07-10', 'alejandro', '', ''),
(5, 'nota ', 'telematica-01', 0, 1, 1, '../archivospdf/telematica-01/', 'nota .pdf', '2017-07-05', '2017-07-07', 'telematica', 'Enviado', 'primera prueba'),
(6, 'prueba1', 'SEDS-1-2017', 20, 1, 5, '../archivospdf/SEDS-1-2017/', 'prueba1.pdf', '2017-07-03', '2017-07-04', 'Jorge', '', 'pppp'),
(7, 'INVESTIGACION Y DESARROLLO', 'IDT-0045', 2, 5, 10, '../archivospdf/IDT-0045/', 'INVESTIGACION Y DESARROLLO.pdf', '2017-07-09', '2017-07-11', 'AVILA', 'Enviado', 'SE INGRESO EL DOC.'),
(8, 'fsgwg', 'fdwq', 0, 1, 1, '../archivospdf/fdwq/', 'fsgwg.pdf', '2017-07-11', '2017-07-11', '1', 'Enviado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 NOT NULL,
  `permisos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `name`, `last_name`, `user`, `password`, `permisos`) VALUES
(1, 'Jorge Eduardo', 'Henriquez Godoy', 'jorgeh', 'prueba', 1),
(2, 'Janeth', 'Ponce', 'jponce', 'jponcedt', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE IF NOT EXISTS `respuesta` (
  `id_resp` int(11) NOT NULL AUTO_INCREMENT,
  `id_docto` int(11) NOT NULL,
  `name_docto` varchar(50) CHARACTER SET utf8 NOT NULL,
  `oficio` varchar(50) CHARACTER SET utf8 NOT NULL,
  `num_archive` int(11) NOT NULL,
  `num_gabeta` int(11) NOT NULL,
  `num_fila` int(11) NOT NULL,
  `repository` varchar(100) CHARACTER SET utf8 NOT NULL,
  `archive` varchar(50) CHARACTER SET utf8 NOT NULL,
  `fecha` date NOT NULL,
  `fechai` date NOT NULL,
  `asignado` varchar(50) CHARACTER SET utf8 NOT NULL,
  `estado` varchar(20) CHARACTER SET utf8 NOT NULL,
  `obs` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_resp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id_resp`, `id_docto`, `name_docto`, `oficio`, `num_archive`, `num_gabeta`, `num_fila`, `repository`, `archive`, `fecha`, `fechai`, `asignado`, `estado`, `obs`) VALUES
(1, 1, 'respuesta', 'CO-2-2017', 5, 2, 1, '../archivospdf/CO-2-2017/', 'respuesta.pdf', '2017-06-28', '0000-00-00', 'jorge', 'Resuelto', ''),
(2, 2, 'Respuesta Esquema AD Policia NAcional', 'DC-20-2017', 5, 4, 3, '../archivospdf/DC-20-2017/', 'Respuesta Esquema AD Policia NAcional.pdf', '2017-06-30', '0000-00-00', '1', 'Resuelto', ''),
(3, 1, 'respuesta licitacion', 'DICEP-2-2017', 5, 24, 1, '../archivospdf/DICEP-2-2017/', 'respuesta licitacion.pdf', '2017-07-03', '0000-00-00', 'jorge', 'Pendiente', ''),
(4, 4, 'enmienda aclaratoria', 'UCP-02-2017', 5, 4, 2, '../archivospdf/UCP-02-2017/', 'enmienda aclaratoria.pdf', '2017-07-05', '0000-00-00', 'alejandro', 'Enviado', 'ddsfweq'),
(5, 6, 'resp', 'DICEP-2-2017', 20, 4, 1, '../archivospdf/DICEP-2-2017/', 'resp.pdf', '2017-07-10', '0000-00-00', 'alejandro', 'Resuelto', ''),
(6, 6, 'respuesta licitacion', 'DNVT-05-2017', 20, 5, 1, '../archivospdf/DNVT-05-2017/', 'respuesta licitacion.pdf', '2017-07-10', '2017-07-12', 'alejandro', 'Enviado', 'fff');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
