-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2022 a las 04:05:42
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `publicar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `cod_curso` int(11) NOT NULL,
  `titu_curso` varchar(100) DEFAULT NULL,
  `cont_curso` varchar(1000) DEFAULT NULL,
  `img_curso` varchar(2000) DEFAULT NULL,
  `vid_curso` varchar(2000) DEFAULT NULL,
  `fec_curso` datetime DEFAULT NULL,
  `carac_curso` varchar(1000) DEFAULT NULL,
  `cod_usu` int(11) DEFAULT NULL,
  `costo_curso` float NOT NULL,
  `nombre_profesor` varchar(100) NOT NULL,
  `img_profesor` varchar(500) NOT NULL,
  `descripcion_profesor` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`cod_curso`, `titu_curso`, `cont_curso`, `img_curso`, `vid_curso`, `fec_curso`, `carac_curso`, `cod_usu`, `costo_curso`, `nombre_profesor`, `img_profesor`, `descripcion_profesor`) VALUES
(34, 'Aprenda C++', 'En este curso podrá aprender la nociones básica de c++', 'c-2.jpg', 'title-artist.mp4', '2022-05-08 13:40:26', 'Aprenda de forma practica las nociones básicas de c++', 1, 0, '', '', ''),
(35, 'Aprenda Python ', 'Aquí encontrara los fundamentos de python', 'python-lenguaje.jpg', 'curso-python-video-1.mp4', '2022-05-08 19:35:16', 'Python es un lenguaje de alto nivel de programación interpretado cuya filosofía hace hincapié en la legibilidad de su código, se utiliza para desarrollar aplicaciones de todo tipo, ejemplos: Instagram, Netflix, Panda 3D, entre otros.​', 1, 0, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresar`
--

CREATE TABLE `ingresar` (
  `cod_usu` int(11) NOT NULL,
  `nom_usu` varchar(50) DEFAULT NULL,
  `ape_usu` varchar(50) DEFAULT NULL,
  `numero_documento` varchar(100) DEFAULT NULL,
  `id_usu` varchar(50) DEFAULT NULL,
  `pas_usu` varchar(50) DEFAULT NULL,
  `ema_usu` varchar(50) DEFAULT NULL,
  `tel_usu` int(10) DEFAULT NULL,
  `admin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingresar`
--

INSERT INTO `ingresar` (`cod_usu`, `nom_usu`, `ape_usu`, `numero_documento`, `id_usu`, `pas_usu`, `ema_usu`, `tel_usu`, `admin`) VALUES
(1, 'duban', 'estupinan', NULL, '123', '123', 'duvan.15.97@hotmail.com', 2659047, 1),
(72, 'Duban', 'Steven', '10245896', '10245896', 'IKfhzTPQ', 'derlyvargast@hotmail.com', 1023025848, 0),
(73, 'Peres', 'Pacheco', '102301478', '102301478', 'D+Q65JRg', 'duvan.15.97@hotmail.com', 2001246, 0),
(74, '', '', '145247896', '145247896', 'NphpC25C', 'duvan.15.97@hotmail.com', 2001246, 0),
(76, '', '', '102305978', '102305978', '9bJ1Uys6', 'duvan.15.97@hotmail.com', 20012145, 0),
(77, '', '', '101478954', '101478954', 'KGvR0doY', 'duvan.15.97@hotmail.com', 2001236, 0),
(78, '', '', '102302147', '102302147', 'lpF8upHI', 'duvan.15.97@hotmail.com', 2001246, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leccion`
--

CREATE TABLE `leccion` (
  `cod_leccion` int(11) NOT NULL,
  `titu_leccion` varchar(100) DEFAULT NULL,
  `objetivo_leccion` varchar(1000) DEFAULT NULL,
  `vid_leccion` varchar(2000) DEFAULT NULL,
  `apoyo_leccion` varchar(2000) DEFAULT NULL,
  `lectura_leccion` varchar(2000) DEFAULT NULL,
  `links_leccion` varchar(1000) DEFAULT NULL,
  `teoria_leccion` varchar(1000) DEFAULT NULL,
  `ejemplo_leccion` varchar(1000) DEFAULT NULL,
  `fec_leccion` datetime DEFAULT NULL,
  `cod_curso` int(11) DEFAULT NULL,
  `cod_usu` int(11) DEFAULT NULL,
  `horas_leccion` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `leccion`
--

INSERT INTO `leccion` (`cod_leccion`, `titu_leccion`, `objetivo_leccion`, `vid_leccion`, `apoyo_leccion`, `lectura_leccion`, `links_leccion`, `teoria_leccion`, `ejemplo_leccion`, `fec_leccion`, `cod_curso`, `cod_usu`, `horas_leccion`) VALUES
(86, 'Leccion #1', 'Identificar los tipos de datos que tiene c++', 'aprende-programacion-en-c.mp4', 'Materia apoyo.pdf', 'Lecturas.pdf', 'https://www.youtube.com/watch?v=DTmMjJ-cd00\r\nhttps://www.youtube.com/watch?v=vHKWMR2WaIQ', 'En matemáticas y en lógica, una variable es un símbolo constituyente de un predicado, fórmula, algoritmo o de una proposición. El término «variable» se utiliza aun fuera del ámbito matemático para designar una cantidad susceptible de tomar distintos valores numéricos dentro de un conjunto de números especificado.​', '	int numero;	/* crea la variable numero, de tipo número entero */\r\n	char letra;	/* crea la variable letra, de tipo carácter*/\r\n	float a, b;	/* crea dos variables a y b, de tipo número de coma flotante */', '2022-05-08 13:43:02', 34, 1, 0),
(87, 'Leccion #2', 'Aprenderá a utilizar los ciclos de c++', 'Ciclos.mp4', 'Lecturas - ciclos.pdf', 'Materia apoyo - ciclos.pdf', 'https://www.programarya.com/Cursos/C++/Ciclos', 'Los ciclos o también conocidos como bucles, son una estructura de control esencial al momento de programar. Tanto C como C++ y la mayoría de los lenguajes utilizados actualmente, nos permiten hacer uso de estas estructuras.', 'for(int i = valor inicial; i <= valor final; i = i + paso)\r\n{\r\n        ....\r\n        ....\r\n    Bloque de Instrucciones....\r\n        ....\r\n        ....\r\n}', '2022-05-08 19:20:59', 34, 1, 0),
(88, 'Prueba Python variables', 'Aprender python', 'Ciclos_python.mp4', 'Lecturas - python.pdf', 'Materia python.pdf', 'Prueba', 'Prueba', 'prueba', '2022-05-15 19:40:23', 35, 1, 20),
(89, 'Leccion #3', 'Aprenderá a utilizar los ciclos de c++', 'Ciclos.mp4', 'Lecturas - ciclos.pdf', 'Materia apoyo - ciclos.pdf', 'https://www.programarya.com/Cursos/C++/Ciclos', 'Los ciclos o también conocidos como bucles, son una estructura de control esencial al momento de programar. Tanto C como C++ y la mayoría de los lenguajes utilizados actualmente, nos permiten hacer uso de estas estructuras.', 'for(int i = valor inicial; i <= valor final; i = i + paso)\r\n{\r\n        ....\r\n        ....\r\n    Bloque de Instrucciones....\r\n        ....\r\n        ....\r\n}', '2022-05-08 19:20:59', 34, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `cod_curso` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `banco` varchar(100) NOT NULL,
  `estado_pago` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `cod_curso`, `cod_usu`, `banco`, `estado_pago`) VALUES
(9, 34, 72, 'Banco prueba', 'Aprobado'),
(12, 35, 72, 'Banco prueba', 'Aprobado'),
(13, 34, 73, 'Banco prueba', 'Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progreso`
--

CREATE TABLE `progreso` (
  `id_progreso` int(11) NOT NULL,
  `cod_curso` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cod_leccion` int(11) NOT NULL,
  `estado_leccion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `progreso`
--

INSERT INTO `progreso` (`id_progreso`, `cod_curso`, `cod_usu`, `cod_leccion`, `estado_leccion`) VALUES
(66, 35, 72, 88, 'Aprobado'),
(67, 34, 72, 86, 'Aprobado'),
(68, 34, 72, 87, 'Aprobado'),
(69, 34, 72, 89, 'Aprobado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod_curso`),
  ADD KEY `cod_usu` (`cod_usu`);

--
-- Indices de la tabla `ingresar`
--
ALTER TABLE `ingresar`
  ADD PRIMARY KEY (`cod_usu`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `leccion`
--
ALTER TABLE `leccion`
  ADD PRIMARY KEY (`cod_leccion`),
  ADD KEY `cod_usu` (`cod_usu`),
  ADD KEY `cod_curso` (`cod_curso`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `cod_curso` (`cod_curso`,`cod_usu`),
  ADD KEY `cod_usu` (`cod_usu`);

--
-- Indices de la tabla `progreso`
--
ALTER TABLE `progreso`
  ADD PRIMARY KEY (`id_progreso`),
  ADD KEY `cod_curso` (`cod_curso`,`cod_usu`,`cod_leccion`),
  ADD KEY `cod_usu` (`cod_usu`),
  ADD KEY `cod_leccion` (`cod_leccion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `cod_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `ingresar`
--
ALTER TABLE `ingresar`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `leccion`
--
ALTER TABLE `leccion`
  MODIFY `cod_leccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `progreso`
--
ALTER TABLE `progreso`
  MODIFY `id_progreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `ingresar` (`cod_usu`);

--
-- Filtros para la tabla `leccion`
--
ALTER TABLE `leccion`
  ADD CONSTRAINT `leccion_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `ingresar` (`cod_usu`),
  ADD CONSTRAINT `leccion_ibfk_2` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`),
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`cod_usu`) REFERENCES `ingresar` (`cod_usu`);

--
-- Filtros para la tabla `progreso`
--
ALTER TABLE `progreso`
  ADD CONSTRAINT `progreso_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`),
  ADD CONSTRAINT `progreso_ibfk_2` FOREIGN KEY (`cod_usu`) REFERENCES `ingresar` (`cod_usu`),
  ADD CONSTRAINT `progreso_ibfk_3` FOREIGN KEY (`cod_leccion`) REFERENCES `leccion` (`cod_leccion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
