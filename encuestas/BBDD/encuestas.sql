-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-04-2019 a las 10:14:18
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `alqueriaforms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

DROP TABLE IF EXISTS `encuestas`;
CREATE TABLE IF NOT EXISTS `encuestas` (
`id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `tipo_encuesta` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id`, `nombre`, `fecha_creacion`, `tipo_encuesta`) VALUES
(1, 'Encuesta CAMPUS NAVIDAD', '2019-01-11', 'normal'),
(2, 'Aficionados', '2019-04-05', '-'),
(3, 'Entrenadores', '2019-04-05', '-'),
(4, 'Jugadores', '2019-04-05', '-'),
(5, 'Proveedores', '2019-04-05', '-'),
(6, 'Patrocinadores', '2019-04-05', '-'),
(7, 'Staff', '2019-04-05', '-'),
(8, 'Instituciones Públicas', '2019-04-05', '-'),
(9, 'Instituciones deportivas', '2019-04-05', '-'),
(10, 'Otros clubes/coles', '2019-04-05', '-'),
(11, 'Padres', '2019-04-05', '-'),
(12, 'Medios de comunicacion', '2019-04-05', '-');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
