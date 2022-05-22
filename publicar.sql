-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2022 a las 18:36:10
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
-- Estructura de tabla para la tabla `capitulo`
--

CREATE TABLE `capitulo` (
  `cod_capitulo` int(11) NOT NULL,
  `titu_capitulo` varchar(100) DEFAULT NULL,
  `cont_capitulo` varchar(1000) DEFAULT NULL,
  `img_capitulo` varchar(2000) DEFAULT NULL,
  `vid_capitulo` varchar(2000) DEFAULT NULL,
  `fec_capitulo` datetime DEFAULT NULL,
  `carac_capitulo` varchar(1000) DEFAULT NULL,
  `cod_usu` int(11) NOT NULL,
  `cod_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `capitulo`
--

INSERT INTO `capitulo` (`cod_capitulo`, `titu_capitulo`, `cont_capitulo`, `img_capitulo`, `vid_capitulo`, `fec_capitulo`, `carac_capitulo`, `cod_usu`, `cod_curso`) VALUES
(22, 'Capítulo 1 - Condicionales', 'Los condicionales en C++, son una estructura de control esencial al momento de programar y aprender a programar. Tanto C como C++ y la mayoría de los lenguajes de programación utilizados actualmente, nos permiten hacer uso de estas estructuras parea definir ciertas acciones condiciones especificas en nuestro algoritmo. ', 'c-2.jpg', 'Capitulo_1.mp4', '2022-05-20 01:24:17', 'Existen diferentes tipos de condicionales, cada uno tiene una utilidad y funcionalidad diferente, que consideran diferentes situaciones que se pueden llegar a presentar durante la ejecución de un algoritmo. Depende entonces del conocimiento que tengamos acerca de cada uno de los condicionales saber determinar correctamente cuando es necesario implementar uno u otro. Tenemos a nuestra disposición los siguientes tipos de condicionales en C++:\r\n\r\nCondicional If en C++\r\nCondicional if-else en C++\r\nCondicional Switch en C++', 1, 34),
(23, 'Capitulo 2 - Ciclos ', 'Los ciclos o también conocidos como bucles, son una estructura de control esencial al momento de programar. Tanto C como C++ y la mayoría de los lenguajes utilizados actualmente, nos permiten hacer uso de estas estructuras. Un ciclo o bucle permite repetir una o varias instrucciones cuantas veces lo necesitemos, por ejemplo, si quisiéramos escribir los números del uno al cien no tendría sentido escribir cien líneas mostrando un numero en cada una, para esto y para muchísimas cosas más, es útil un ciclo, permitiéndonos hacer una misma tarea en una cantidad de líneas muy pequeña y de forma prácticamente automática.', 'c-2.jpg', 'Capitulo_2.mp4', '2022-05-20 01:37:30', 'Aprendera todo sobre los ciclos en c++', 1, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `cod_curso` int(11) NOT NULL,
  `titu_curso` varchar(100) DEFAULT NULL,
  `cont_curso` varchar(10000) DEFAULT NULL,
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
(34, 'Aprenda C++', 'C++ es un lenguaje de programación diseñado en 1979 por Bjarne Stroustrup. La intención de su creación fue extender al lenguaje de programación C mecanismos que permiten la manipulación de objetos. En ese sentido, desde el punto de vista de los lenguajes orientados a objetos, C++ es un lenguaje híbrido. Posteriormente se añadieron facilidades de programación genérica, que se sumaron a los paradigmas de programación estructurada y programación orientada a objetos. Por esto se suele decir que el C++ es un lenguaje de programación multiparadigma. Actualmente existe un estándar, denominado ISO C++, al que se han adherido la mayoría de los fabricantes de compiladores más modernos. Existen también algunos intérpretes, tales como ROOT. El nombre \"C++\" fue propuesto por Rick Mascitti en el año 1983, cuando el lenguaje fue utilizado por primera vez fuera de un laboratorio científico. Antes se había usado el nombre \"C con clases\". En C++, la expresión \"C++\" significa \"incremento de C\" y se refiere a que C++ es una extensión de C.\r\nPosteriormente se añadieron facilidades de programación genérica, que se sumaron a los paradigmas de programación estructurada y programación orientada a objetos. Por esto se suele decir que el C++ es un lenguaje de programación multiparadigma. Para comenzar a estudiar cualquier lenguaje de programación se debe conocer cuales son los\r\nconceptos que soporta, es decir, el tipo de programación que vamos a poder realizar con él.\r\nComo el C++ incorpora características nuevas respecto a lenguajes como Pascal o C, en primer\r\nlugar daremos una descripción a los conceptos a los que este lenguaje da soporte, repasando los\r\nparadigmas de programación y centrándonos en la evolución desde la programación Funcional a\r\nla programación Orientada a Objetos. Más adelante estudiaremos el lenguaje de la misma\r\nmanera, primero veremos sus características funcionales (realmente la parte que el lenguaje\r\nhereda de C) y después estudiaremos las extensiones que dan soporte Para comenzar a estudiar cualquier lenguaje de programación se debe conocer cuales son los\r\nconceptos que soporta, es decir, el tipo de programación que vamos a poder realizar con él.\r\nComo el C++ incorpora características nuevas respecto a lenguajes como Pascal o C, en primer\r\nlugar daremos una descripción a los conceptos a los que este lenguaje da soporte, repasando los\r\nparadigmas de programación y centrándonos en la evolución desde la programación Funcional a\r\nla programación Orientada a Objetos. Más adelante estudiaremos el lenguaje de la misma\r\nmanera, primero veremos sus características funcionales (realmente la parte que el lenguaje\r\nhereda de C) y después estudiaremos las extensiones que dan soporte a la programación\r\norientada a objetos (el ++ de C++).', 'c-2.jpg', 'aprende-programacion-en-c.mp4', '2022-05-08 13:40:26', 'Aprenda de forma practica las nociones básicas de c++', 1, 50000, 'Duban Steven Estupiñan', 'profe_1.jpg', 'Docente con mas de 12 años de experiencia dictando cursos de programación en universidades');

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
(80, 'Duban', 'Steven', '1023025848', '1023025848', '2yoy9Mfp', 'duvan.15.97@hotmail.com', 2001246, 0),
(81, 'Perez', 'Parra', '10223315878', '10223315878', 'LNPowc1f', 'duvan.15.97@hotmail.com', 2001246, 0);

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
  `cod_capitulo` int(11) NOT NULL,
  `horas_leccion` int(20) NOT NULL,
  `pregunta` varchar(100) NOT NULL,
  `correcta` varchar(100) NOT NULL,
  `incorrecta_1` varchar(100) NOT NULL,
  `incorrecta_2` varchar(100) NOT NULL,
  `incorrecta_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `leccion`
--

INSERT INTO `leccion` (`cod_leccion`, `titu_leccion`, `objetivo_leccion`, `vid_leccion`, `apoyo_leccion`, `lectura_leccion`, `links_leccion`, `teoria_leccion`, `ejemplo_leccion`, `fec_leccion`, `cod_curso`, `cod_usu`, `cod_capitulo`, `horas_leccion`, `pregunta`, `correcta`, `incorrecta_1`, `incorrecta_2`, `incorrecta_3`) VALUES
(95, 'Condicional If', 'Aprender como se implementa el condicional IF', 'If.mp4', 'Material_apoyo.pdf', 'Lecturas_apoyo.pdf', 'https://www.programarya.com/Cursos/C++/Condicionales/Condicional-if', 'Para comprender mejor cómo funciona el condicional if, una muy buena forma es partiendo de un ejemplo. Supongamos que queremos verificar si el resultado de una suma ingresada por el usuario es correcto o no. Para este ejemplo, el condicional if, es el encargado de verificar si el resultado ingresado corresponde o no a la respuesta correcta de la suma. El condicional if, funciona verificando la condición ingresada y de acuerdo a su valor de verdad (falso o verdadero) lleva a cabo o no una serie de instrucciones.\r\n\r\nEspero haber sido claro, sino, no te preocupes, pues veremos ya mismo algunos ejemplos para entender todo mejor.', 'if(condición a evaluar) //Por ejemplo X <= 10\r\n{\r\n        ....\r\n        ....\r\n    Bloque de Instrucciones si se cumple la condición....\r\n        ....\r\n        ....\r\n}\r\n....\r\nBloque de Instrucciones restante DEL ALGORITMO....\r\n....', '2022-05-20 01:28:00', 34, 1, 22, 10, 'El condicional utilizado en la lección es', 'if', 'ifelse', 'switch', 'for'),
(96, 'Condicional  if else', 'Aprendera a utilizar el condicional  if else', 'if-else.mp4', 'Material_apoyo.pdf', 'Lecturas_apoyo.pdf', 'https://www.programarya.com/Cursos/C++/Condicionales/Condicional-if-else', 'Los condicionales if-else, son una estructura de control, que nos permiten tomar cierta decisión al interior de nuestro algoritmo, es decir, nos permiten determinar que acciones tomar dada o no cierta condición, por ejemplo determinar si la contraseña ingresada por el usuario es válida o no y de acuerdo a esto darle acceso al sistema o mostrar un mensaje de error.\r\n\r\nSe les conoce también como estructuras selectivas de casos dobles (porque definen ambas posibilidades en la ejecución --si se cumple y si no se cumple --).\r\n\r\nEn resumen, un condicional if-else es una estructura que nos posibilita definir las acciones que se deben llevar a cabo si se cumple cierta condición y también determinar las acciones que se deben ejecutar en caso de que no se cumpla; generando así una separación o bifurcación en la ejecución del programa, ejecutando ciertas acciones u otras a partir de la evaluación de una condición dada.', '\r\nif(condición a evaluar) //Por ejemplo 50 <= 10\r\n{\r\n        ....\r\n        ....\r\n    Bloque de Instrucciones si se cumple la condición....\r\n        ....\r\n        ....\r\n}\r\nelse\r\n{\r\n        ....\r\n        ....\r\n    Bloque de Instrucciones si NO se cumple la condición....\r\n        ....\r\n        ....\r\n}', '2022-05-20 01:30:43', 34, 1, 22, 8, 'El condicional utilizado en la lección es', 'ifelse', 'if', 'switch', 'for'),
(97, 'Condicional  Switch', 'Aprender como se implementa el condicional Switch', 'switch.mp4', 'Material_apoyo.pdf', 'Lecturas_apoyo.pdf', 'https://www.programarya.com/Cursos/C++/Condicionales/Condicional-switch', 'La mejor forma de entender el funcionamiento de algo, es viendo un ejemplo de esto, de este modo, me parece que para comprender de forma adecuada como funciona un condicional Switch, es bueno hacerlo poniendo un ejemplo. Imaginemos entonces que nuestro programa consta de un menú de opciones digamos 3 opciones, cada una representada con un número correspondiente, es decir la opción uno corresponde al número 1, la dos al 2 y así sucesivamente, queremos entonces que de acuerdo a un número ingresado por el usuario ejecutemos una acción correspondiente y en caso de que no corresponda a ninguna de las posibles opciones, mostrar un mensaje de error cualquiera. De este modo, podemos identificar 3 casos distintos para nuestro switch o en otras palabras, hemos identificado tres condiciones posibles que puede llegar a cumplir nuestra variable: el caso uno corresponde a que el valor ingresado por el usuario sea el 1, es decir ejecutar la opción 1, el caso 2 el número 2, etc. adicionalmente hemos e', 'switch(opción) //donde opción es la variable a comparar\r\n{\r\n    case valor1: //Bloque de instrucciones 1;\r\n    break;\r\n    case valor2: //Bloque de instrucciones 2;\r\n    break;\r\n    case valor3: //Bloque de instrucciones 3;\r\n    break;\r\n    //Nótese que valor 1 2 y 3 son los valores que puede tomar la opción\r\n    //la instrucción break es necesaria, para no ejecutar todos los casos.\r\n    default: //Bloque de instrucciones por defecto;\r\n    //default, es el bloque que se ejecuta en caso de que no se de ningún caso\r\n}', '2022-05-20 01:34:17', 34, 1, 22, 15, 'El condicional utilizado en la lección es', 'switch', 'if', 'ifelse', 'for'),
(98, 'Ciclo for en C++', 'Apendera a utilizar el ciclo for', 'for.mp4', 'Material_apoyo.pdf', 'Lecturas_apoyo.pdf', 'https://www.programarya.com/Cursos/C++/Ciclos', 'Los ciclos for son lo que se conoce como estructuras de control de flujo cíclicas o simplemente estructuras cíclicas, estos ciclos, como su nombre lo sugiere, nos permiten ejecutar una o varias líneas de código de forma iterativa, conociendo un valor especifico inicial y otro valor final, además nos permiten determinar el tamaño del paso entre cada \"giro\" o iteración del ciclo.\r\n\r\nEn resumen, un ciclo for es una estructura de control iterativa, que nos permite ejecutar de manera repetitiva un bloque de instrucciones, conociendo previamente un valor de inicio, un tamaño de paso y un valor final para el ciclo.\r\n\r\n¿Cómo funciona un Ciclo For?\r\nPara comprender mejor el funcionamiento del ciclo for, pongamos un ejemplo, supongamos que queremos mostrar los números pares entre el 50 y el 100, si imaginamos un poco como seria esto, podremos darnos cuenta que nuestro ciclo deberá mostrar una serie de números como la siguiente: 50 52 54 56 58 60 ... 96 98 100. Como podemos verificar, tenemos ent', 'for(int i = valor inicial; i <= valor final; i = i + paso)\r\n{\r\n        ....\r\n        ....\r\n    Bloque de Instrucciones....\r\n        ....\r\n        ....\r\n}', '2022-05-20 01:40:33', 34, 1, 23, 10, 'El ciclo utilizado en la lección es', 'for', 'if', 'while', 'do while'),
(99, 'Ciclo While en C++', 'Apendera a utilizar el ciclo While', 'while.mp4', 'Material_apoyo.pdf', 'Lecturas_apoyo.pdf', 'https://www.programarya.com/Cursos/C++/Ciclos/Ciclo-while', 'Los ciclos while son también una estructura cíclica, que nos permite ejecutar una o varias líneas de código de manera repetitiva sin necesidad de tener un valor inicial e incluso a veces sin siquiera conocer cuando se va a dar el valor final que esperamos, los ciclos while, no dependen directamente de valores numéricos, sino de valores booleanos, es decir su ejecución depende del valor de verdad de una condición dada, verdadera o falso, nada más. De este modo los ciclos while, son mucho más efectivos para condiciones indeterminadas, que no conocemos cuando se van a dar a diferencia de los ciclos for, con los cuales se debe tener claro un principio, un final y un tamaño de paso.\r\n\r\n¿Cómo funciona un Ciclo While?\r\nPara comprender mejor el funcionamiento del ciclo while, pongamos un buen ejemplo, imaginemos que por algún motivo, queremos pedirle a un usuario una serie de números cualquiera y que solo dejaremos de hacerlo cuando el usuario ingrese un número mayor a 100. ', '\r\nwhile(condición de finalización) //por ejemplo numero == 100\r\n{\r\n        ....\r\n        ....\r\n    Bloque de Instrucciones....\r\n        ....\r\n        ....\r\n}', '2022-05-20 01:42:29', 34, 1, 23, 7, 'El ciclo utilizado en la lección es', 'while', 'elseif', 'for', 'do while'),
(100, 'Ciclo Do-While en C++', 'Apendera a utilizar el ciclo Do-While', 'Do-while.mp4', 'Material_apoyo.pdf', 'Lecturas_apoyo.pdf', 'https://www.programarya.com/Cursos/C++/Ciclos/Ciclo-do-while', 'Los ciclos do-while son una estructura de control cíclica, los cuales nos permiten ejecutar una o varias líneas de código de forma repetitiva sin necesidad de tener un valor inicial e incluso a veces sin siquiera conocer cuando se va a dar el valor final, hasta aquí son similares a los ciclos while, sin embargo el ciclo do-while nos permite añadir cierta ventaja adicional y esta consiste que nos da la posibilidad de ejecutar primero el bloque de instrucciones antes de evaluar la condición necesaria, de este modo los ciclos do-while, son más efectivos para algunas situaciones especificas. En resumen un ciclo do-while, es una estructura de control cíclica que permite ejecutar de manera repetitiva un bloque de instrucciones sin evaluar de forma inmediata una condición especifica, sino evaluándola justo después de ejecutar por primera vez el bloque de instrucciones\r\n\r\n¿Cómo funciona un Ciclo Do-While?\r\nPara comprender mejor el funcionamiento del ciclo while, usemos de nuevo el ejemplo de l', 'do\r\n{\r\n        ....\r\n        ....\r\n    Bloque de Instrucciones....\r\n        ....\r\n        ....\r\n}\r\nwhile(condición de finalización); //por ejemplo numero != 23', '2022-05-20 01:43:59', 34, 1, 23, 10, 'El ciclo utilizado en la lección es', 'do while', 'switch', 'while', 'for');

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
(16, 34, 80, 'Banco prueba', 'Aprobado'),
(18, 34, 81, 'Banco prueba', 'Aprobado');

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
(99, 34, 80, 95, 'Aprobado'),
(100, 34, 80, 96, 'Aprobado'),
(101, 34, 80, 97, 'Aprobado'),
(102, 34, 80, 98, 'Aprobado'),
(103, 34, 81, 95, 'Aprobado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capitulo`
--
ALTER TABLE `capitulo`
  ADD PRIMARY KEY (`cod_capitulo`),
  ADD KEY `cod_usu` (`cod_usu`),
  ADD KEY `cod_curso` (`cod_curso`);

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
  ADD KEY `cod_curso` (`cod_curso`),
  ADD KEY `cod_capitulo` (`cod_capitulo`);

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
-- AUTO_INCREMENT de la tabla `capitulo`
--
ALTER TABLE `capitulo`
  MODIFY `cod_capitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `cod_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `ingresar`
--
ALTER TABLE `ingresar`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `leccion`
--
ALTER TABLE `leccion`
  MODIFY `cod_leccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `progreso`
--
ALTER TABLE `progreso`
  MODIFY `id_progreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capitulo`
--
ALTER TABLE `capitulo`
  ADD CONSTRAINT `capitulo_ibfk_2` FOREIGN KEY (`cod_usu`) REFERENCES `ingresar` (`cod_usu`),
  ADD CONSTRAINT `capitulo_ibfk_3` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`);

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
  ADD CONSTRAINT `leccion_ibfk_2` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`),
  ADD CONSTRAINT `leccion_ibfk_3` FOREIGN KEY (`cod_capitulo`) REFERENCES `capitulo` (`cod_capitulo`);

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
