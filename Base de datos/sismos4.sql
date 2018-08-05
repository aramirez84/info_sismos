-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2018 a las 23:00:29
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sismos`
--
CREATE DATABASE IF NOT EXISTS `sismos` DEFAULT CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci;
USE `sismos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deleg_mun`
--

DROP TABLE IF EXISTS `deleg_mun`;
CREATE TABLE IF NOT EXISTS `deleg_mun` (
  `idDelegacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_delegacion` varchar(45) COLLATE ucs2_spanish2_ci DEFAULT NULL,
  `zona_idZona` int(11) NOT NULL,
  `estados_idEstados` int(11) NOT NULL,
  PRIMARY KEY (`idDelegacion`),
  KEY `fk_deleg_mun_zona1_idx` (`zona_idZona`),
  KEY `fk_deleg_mun_estados1_idx` (`estados_idEstados`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `deleg_mun`
--

INSERT INTO `deleg_mun` (`idDelegacion`, `nombre_delegacion`, `zona_idZona`, `estados_idEstados`) VALUES
(1, 'Álvaro Obregón', 3, 7),
(2, 'Azcapotzalco', 3, 7),
(3, 'Benito Juárez', 2, 7),
(4, 'Coyoacán', 2, 7),
(5, 'Cuajimalpa de Morelos', 3, 7),
(6, 'Cuauhtémoc', 3, 7),
(7, 'Gustavo A. Madero', 1, 7),
(8, 'Iztacalco', 1, 7),
(9, 'Iztapalapa', 4, 7),
(10, 'Magdalena Contreras', 2, 7),
(11, 'Miguel Hidalgo', 3, 7),
(12, 'Milpa Alta', 4, 7),
(13, 'Tláhuac', 4, 7),
(14, 'Tlalpan', 2, 7),
(15, 'Venustiano Carranza', 1, 7),
(16, 'Xochimilco', 4, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `idEstados` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(45) COLLATE ucs2_spanish2_ci NOT NULL,
  PRIMARY KEY (`idEstados`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`idEstados`, `nombre_estado`) VALUES
(1, 'Aguascalientes'),
(2, 'Baja California'),
(3, 'Baja California Sur'),
(4, 'Campeche'),
(5, 'Chiapas'),
(6, 'Chihuahua'),
(7, 'Ciudad de México'),
(8, 'Coahuila'),
(9, 'Colima'),
(10, 'Durango'),
(11, 'Guanajuato'),
(12, 'Guerrero'),
(13, 'Hidalgo'),
(14, 'Jalisco'),
(15, 'México'),
(16, 'Michoacán'),
(17, 'Morelos'),
(18, 'Nayarit'),
(19, 'Nuevo León'),
(20, 'Oaxaca'),
(21, 'Puebla'),
(22, 'Querétaro'),
(23, 'Quintana Roo'),
(24, 'San Luis Potosí'),
(25, 'Sinaloa'),
(26, 'Sonora'),
(27, 'Tabasco'),
(28, 'Tamaulipas'),
(29, 'Tlaxcala'),
(30, 'Veracruz'),
(31, 'Yucatán'),
(32, 'Zacatecas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_dano`
--

DROP TABLE IF EXISTS `nivel_dano`;
CREATE TABLE IF NOT EXISTS `nivel_dano` (
  `idNivel_dano` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_dano` varchar(45) COLLATE ucs2_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idNivel_dano`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `nivel_dano`
--

INSERT INTO `nivel_dano` (`idNivel_dano`, `nombre_dano`) VALUES
(1, 'Alto'),
(2, 'Medio'),
(3, 'Bajo'),
(4, 'Crítico'),
(5, 'Reparable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_dano`
--

DROP TABLE IF EXISTS `tipo_dano`;
CREATE TABLE IF NOT EXISTS `tipo_dano` (
  `idTipo_dano` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo_dano` varchar(45) COLLATE ucs2_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idTipo_dano`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_dano`
--

INSERT INTO `tipo_dano` (`idTipo_dano`, `Tipo_dano`) VALUES
(1, 'Grietas'),
(2, 'Cosmetico'),
(3, 'Estructural'),
(4, 'Muros de carga'),
(5, 'Cadena'),
(6, 'Escaleras'),
(7, 'Muro de concreto'),
(8, 'Losas'),
(9, 'Columnas'),
(10, 'Vigas o trabes'),
(11, 'Cimentación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vivienda`
--

DROP TABLE IF EXISTS `vivienda`;
CREATE TABLE IF NOT EXISTS `vivienda` (
  `idVivienda` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) COLLATE ucs2_spanish2_ci DEFAULT NULL,
  `Nivel_dano_idNivel_dano` int(11) NOT NULL,
  `Tipo_dano_idTipo_dano` int(11) NOT NULL,
  `Delegacion_idDelegacion` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE ucs2_spanish2_ci DEFAULT NULL,
  `direccion` varchar(45) COLLATE ucs2_spanish2_ci DEFAULT NULL,
  `latitud` float(10,6) DEFAULT NULL,
  `longuitud` float(10,6) DEFAULT NULL,
  `tipo_comercio` varchar(100) COLLATE ucs2_spanish2_ci DEFAULT NULL,
  `descripcon` text COLLATE ucs2_spanish2_ci,
  PRIMARY KEY (`idVivienda`),
  KEY `fk_Vivienda_Nivel_dano_idx` (`Nivel_dano_idNivel_dano`),
  KEY `fk_Vivienda_Tipo_dano1_idx` (`Tipo_dano_idTipo_dano`),
  KEY `fk_Vivienda_Delegacion1_idx` (`Delegacion_idDelegacion`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

DROP TABLE IF EXISTS `zona`;
CREATE TABLE IF NOT EXISTS `zona` (
  `idZona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE ucs2_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idZona`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`idZona`, `nombre`) VALUES
(1, 'Norte'),
(2, 'Sur'),
(3, 'Centro Poniente'),
(4, 'Oriente');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `deleg_mun`
--
ALTER TABLE `deleg_mun`
  ADD CONSTRAINT `fk_deleg_mun_estados1` FOREIGN KEY (`estados_idEstados`) REFERENCES `estados` (`idEstados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_deleg_mun_zona1` FOREIGN KEY (`zona_idZona`) REFERENCES `zona` (`idZona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vivienda`
--
ALTER TABLE `vivienda`
  ADD CONSTRAINT `fk_Vivienda_Delegacion1` FOREIGN KEY (`Delegacion_idDelegacion`) REFERENCES `deleg_mun` (`idDelegacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vivienda_Nivel_dano` FOREIGN KEY (`Nivel_dano_idNivel_dano`) REFERENCES `nivel_dano` (`idNivel_dano`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vivienda_Tipo_dano1` FOREIGN KEY (`Tipo_dano_idTipo_dano`) REFERENCES `tipo_dano` (`idTipo_dano`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
