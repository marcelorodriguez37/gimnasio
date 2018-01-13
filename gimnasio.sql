-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2018 a las 19:31:12
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono`
--

CREATE TABLE `abono` (
  `id` int(11) NOT NULL,
  `idPack` int(15) NOT NULL,
  `idCliente` int(20) NOT NULL,
  `fecha` date NOT NULL,
  `monto` int(30) NOT NULL,
  `habilitado` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `habilitado` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `nombre`, `habilitado`) VALUES
(10, 'GAP', 1),
(11, 'Spinning', 1),
(12, 'Prueba', 0),
(13, 'MusculaciÃ³n', 1),
(14, 'AXE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `idCliente` int(30) NOT NULL,
  `fecha` datetime NOT NULL,
  `habilitado` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(6) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `dni` int(10) NOT NULL,
  `fechaNac` date DEFAULT NULL,
  `telefono` int(11) NOT NULL,
  `fechaInscripcion` date NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `observaciones` text,
  `habilitado` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `direccion`, `dni`, `fechaNac`, `telefono`, `fechaInscripcion`, `imagen`, `observaciones`, `habilitado`) VALUES
(1, 'Brenda', 'Dominguez aaa', 'la merced 29', 2147483647, '2299-09-23', 2147483647, '2018-01-13', NULL, 'no quiere trabajar!!', 1),
(2, 'unNuevo', 'Cliente', 'un direccion cualquiera 123', 229392929, '2001-02-12', 29121212, '2017-11-09', '20170322_113143-01.jpeg', 'una observaciÃ³n cualquiera', 1),
(3, 'roo', 'roooo', 'eoo', 1212, '0000-00-00', 2323, '2018-01-03', NULL, '', 1),
(4, 'Rodrigo ', 'Torales', 'paraguay', 919291, '1994-09-13', 19919292, '2018-01-03', 'eeaf4436-4bb9-4fe6-90e0-d2b4bd1fbd90.jpg', 'nos abandono', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pack`
--

CREATE TABLE `pack` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` text,
  `habilitado` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pack`
--

INSERT INTO `pack` (`id`, `nombre`, `precio`, `descripcion`, `habilitado`) VALUES
(15, 'Promo 1', 420, 'Lunes a miercoles 18 hs', 1),
(31, 'Promo 2', 230, 'Lunes a Viernes 20 hs', 1),
(32, 'nuevo pack', 120, 'descripcion del nuevo pack', 1),
(33, 'nueva promo ', 299, 'descripcion nueva promo ', 1),
(34, 'prueba 3', 2000, 'decripcion de prueba 3, bren se durmio. wacha! ', 1),
(35, 'prueba 4 ', 200, 'descripcion oreuba 4', 1),
(36, 'prueba de pack 123', 123, 'descripcion de prueba de pack 123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pack_actividad`
--

CREATE TABLE `pack_actividad` (
  `id` int(11) NOT NULL,
  `id_pack` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pack_actividad`
--

INSERT INTO `pack_actividad` (`id`, `id_pack`, `id_actividad`) VALUES
(1, 15, 10),
(2, 15, 13),
(3, 31, 13),
(4, 31, 11),
(5, 35, 10),
(6, 35, 11),
(7, 36, 11),
(8, 36, 13),
(9, 32, 1),
(10, 33, 1),
(11, 34, 1),
(12, 33, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abono`
--
ALTER TABLE `abono`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPack` (`idPack`);

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pack`
--
ALTER TABLE `pack`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pack_actividad`
--
ALTER TABLE `pack_actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pack` (`id_pack`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abono`
--
ALTER TABLE `abono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pack`
--
ALTER TABLE `pack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `pack_actividad`
--
ALTER TABLE `pack_actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abono`
--
ALTER TABLE `abono`
  ADD CONSTRAINT `abono_ibfk_1` FOREIGN KEY (`idPack`) REFERENCES `pack` (`id`);

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
