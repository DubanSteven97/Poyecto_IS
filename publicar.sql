-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2019 a las 20:01:51
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `publicar`
--

create database publicar;

use publicar;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `cod_cont` int(11) NOT NULL,
  `titu_cont` varchar(50) DEFAULT NULL,
  `cont_cont` varchar(1000) DEFAULT NULL,
  `fec_cont` datetime DEFAULT NULL,
  `img_cont` varchar(2000) DEFAULT NULL,
  `cod_usu` int(11) DEFAULT NULL,
  `cod_tema` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`cod_cont`, `titu_cont`, `cont_cont`, `fec_cont`, `img_cont`, `cod_usu`, `cod_tema`) VALUES
(21, 'Interesante', 'la pelicula es muy interesante', '2018-09-28 17:30:39', 'Like.png', 1, 13),
(22, '123', '123', '2018-09-28 17:53:44', 'firma.jpg', 1, 14),
(23, 'pepe', 'el grillo', '2018-10-01 12:51:09', 'documento.jpg', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresar`
--

CREATE TABLE `ingresar` (
  `cod_usu` int(11) NOT NULL,
  `nom_usu` varchar(50) DEFAULT NULL,
  `ape_usu` varchar(50) DEFAULT NULL,
  `id_usu` varchar(50) DEFAULT NULL,
  `pas_usu` varchar(50) DEFAULT NULL,
  `ema_usu` varchar(50) DEFAULT NULL,
  `tel_usu` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingresar`
--

INSERT INTO `ingresar` (`cod_usu`, `nom_usu`, `ape_usu`, `id_usu`, `pas_usu`, `ema_usu`, `tel_usu`) VALUES
(1, 'duban', 'estupinan', '123', '123', 'duvan.15.97@hotmail.com', 2659047),
(17, 'alejandro', 'florez', 'alejo123', '123', 'alejo@hotmail.com', 123456);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `cod_tema` int(11) NOT NULL,
  `titu_tema` varchar(100) DEFAULT NULL,
  `cont_tema` varchar(1000) DEFAULT NULL,
  `img_tema` varchar(2000) DEFAULT NULL,
  `fec_tema` datetime DEFAULT NULL,
  `cod_usu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`cod_tema`, `titu_tema`, `cont_tema`, `img_tema`, `fec_tema`, `cod_usu`) VALUES
(13, 'advenger', 'prueba de tema', 'images.jpg', '2018-09-28 17:29:19', 17),
(14, 'prueba tema 2', '123', 'foto-solicitud.jpg', '2018-09-28 17:53:00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`cod_cont`),
  ADD KEY `cod_usu` (`cod_usu`),
  ADD KEY `cod_tema` (`cod_tema`);

--
-- Indices de la tabla `ingresar`
--
ALTER TABLE `ingresar`
  ADD PRIMARY KEY (`cod_usu`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`cod_tema`),
  ADD KEY `cod_usu` (`cod_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `cod_cont` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ingresar`
--
ALTER TABLE `ingresar`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `cod_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `ingresar` (`cod_usu`),
  ADD CONSTRAINT `contenido_ibfk_2` FOREIGN KEY (`cod_tema`) REFERENCES `tema` (`cod_tema`);

--
-- Filtros para la tabla `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `tema_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `ingresar` (`cod_usu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
