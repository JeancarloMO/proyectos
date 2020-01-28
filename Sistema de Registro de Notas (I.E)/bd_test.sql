-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2019 a las 07:13:08
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apafa`
--

CREATE TABLE `apafa` (
  `cod_apafa` int(11) NOT NULL,
  `apoderado` varchar(10) NOT NULL,
  `alumno` varchar(10) NOT NULL,
  `obs` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apafa`
--

INSERT INTO `apafa` (`cod_apafa`, `apoderado`, `alumno`, `obs`, `estado`) VALUES
(1, '55555555', '88888888', '', 1),
(2, '12121212', '99999999', '', 1),
(3, '23232323', '77777777', '', 1),
(4, '34343434', '66666666', '', 1),
(5, '55555555', '66666666', '', 1),
(6, '23232323', '99999999', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `cod_curso` varchar(8) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`cod_curso`, `descripcion`) VALUES
('101', 'MATEMATICA I'),
('102', 'FISICA I'),
('103', 'PERSONAL SOCIAL'),
('104', 'HISTORIA I'),
('105', 'QUIMICA I'),
('201', 'MATEMATICA II'),
('202', 'FISICA II'),
('203', 'RECURSOS HUMANOS'),
('204', 'HISTORIA II'),
('205', 'QUIMICA II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_curso`
--

CREATE TABLE `docente_curso` (
  `cod_doc_curso` int(11) NOT NULL,
  `docente` varchar(10) NOT NULL,
  `aula` varchar(5) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `cod_curso` varchar(8) NOT NULL,
  `periodo` varchar(6) NOT NULL,
  `obs` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docente_curso`
--

INSERT INTO `docente_curso` (`cod_doc_curso`, `docente`, `aula`, `nivel`, `turno`, `cod_curso`, `periodo`, `obs`, `estado`) VALUES
(1, '11111111', '1A', 'PRIMARIA', 'M', '101', '2019', '', 1),
(2, '11111111', '2A', 'SECUNDARIA', 'T', '201', '2019', '', 1),
(3, '22222222', '1A', 'PRIMARIA', 'M', '102', '2019', '', 1),
(4, '22222222', '2A', 'SECUNDARIA', 'T', '202', '2019', '', 1),
(5, '33333333', '1A', 'PRIMARIA', 'M', '103', '2019', '', 1),
(6, '33333333', '2A', 'SECUNDARIA', 'T', '203', '2019', '', 1),
(7, '44444444', '1A', 'PRIMARIA', 'M', '104', '2019', '', 1),
(8, '44444444', '2A', 'SECUNDARIA', 'T', '204', '2019', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `cod_matricula` int(11) NOT NULL,
  `alumno` varchar(10) NOT NULL,
  `aula` varchar(5) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `cod_curso` varchar(8) NOT NULL,
  `periodo` varchar(6) NOT NULL,
  `obs` varchar(1000) NOT NULL,
  `estado` int(11) NOT NULL,
  `T1` varchar(2) NOT NULL,
  `T2` varchar(2) NOT NULL,
  `T3` varchar(2) NOT NULL,
  `promedio` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`cod_matricula`, `alumno`, `aula`, `nivel`, `turno`, `cod_curso`, `periodo`, `obs`, `estado`, `T1`, `T2`, `T3`, `promedio`) VALUES
(1, '88888888', '1A', 'PRIMARIA', 'M', '101', '2019', 'Juicio, opinión u observación personal que se hace o se expresa acerca de algo o alguien. \"comentario político; comentario deportivo; la cantante no quiso hacer ningún comentario sobre su vida privada; el clima suele ser un gran tema objeto de comentarios banales\".', 1, '20', '19', '11', ''),
(2, '88888888', '1A', 'PRIMARIA', 'M', '102', '2019', ':v', 1, '17', '08', '19', ''),
(3, '88888888', '1A', 'PRIMARIA', 'M', '103', '2019', '', 1, '16', '19', '11', ''),
(4, '88888888', '1A', 'PRIMARIA', 'M', '104', '2019', '', 1, '14', '17', '11', ''),
(5, '88888888', '1A', 'PRIMARIA', 'M', '105', '2019', '', 1, '17', '', '', ''),
(6, '99999999', '1A', 'PRIMARIA', 'M', '101', '2019', 'Amador, Raysa.-oitaturAproximación histórica a los comentarios reales, Madrid, Pliegos, 1984.\n\nArnaldich, Lluís.-Los estudios bíblicos en España..., Madrid, C.S.I.C., 1957.', 1, '20', '18', '16', ''),
(7, '99999999', '1A', 'PRIMARIA', 'M', '102', '2019', '???', 1, '19', '13', '17', ''),
(8, '99999999', '1A', 'PRIMARIA', 'M', '103', '2019', '', 1, '18', '08', '18', ''),
(9, '99999999', '1A', 'PRIMARIA', 'M', '104', '2019', '', 1, '13', '18', '20', ''),
(10, '99999999', '1A', 'PRIMARIA', 'M', '105', '2019', '', 1, '16', '', '', ''),
(11, '77777777', '2A', 'SECUNDARIA', 'T', '201', '2019', 'prueba de comentario:\n1. no presta atencion en clase.\n2. no presenta los trabajos asignados.\n3. se comporta de manera irrespetuosa.\nbuenas tardes.', 1, '19', '10', '11', ''),
(12, '77777777', '2A', 'SECUNDARIA', 'T', '202', '2019', 'good !!!', 1, '20', '16', '11', ''),
(13, '77777777', '2A', 'SECUNDARIA', 'T', '203', '2019', '', 1, '11', '14', '20', ''),
(14, '77777777', '2A', 'SECUNDARIA', 'T', '204', '2019', '', 1, '12', '16', '19', ''),
(15, '77777777', '2A', 'SECUNDARIA', 'T', '205', '2019', '', 1, '19', '', '', ''),
(16, '66666666', '2A', 'SECUNDARIA', 'T', '201', '2019', ': ) ', 1, '18', '11', '20', ''),
(17, '66666666', '2A', 'SECUNDARIA', 'T', '202', '2019', 'very good !!! mmm...', 1, '15', '19', '19', ''),
(18, '66666666', '2A', 'SECUNDARIA', 'T', '203', '2019', '', 1, '07', '11', '18', ''),
(19, '66666666', '2A', 'SECUNDARIA', 'T', '204', '2019', '', 1, '19', '11', '15', ''),
(20, '66666666', '2A', 'SECUNDARIA', 'T', '205', '2019', '', 1, '05', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `cod_persona` int(11) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `documento` varchar(10) NOT NULL,
  `tipo_persona` varchar(30) NOT NULL,
  `obs` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`cod_persona`, `paterno`, `materno`, `nombres`, `documento`, `tipo_persona`, `obs`, `estado`) VALUES
(1, 'SANTOS', 'QUISPE', 'Juan Pedro', '88888888', 'ALUMNO', '', 1),
(2, 'TORRES', 'SALVADOR', 'Nathaly Maria', '99999999', 'ALUMNO', '', 1),
(3, 'RAMIREZ', 'OSORIO', 'Kevin Ricardo', '77777777', 'ALUMNO', '', 1),
(4, 'LOPEZ', 'JIMENEZ', 'Pamela Xiomara', '66666666', 'ALUMNO', '', 1),
(5, 'DAVILA', 'CAMPOS', 'Luis Jose', '11111111', 'DOCENTE', '', 1),
(6, 'OSORIO', 'BRAVO', 'Melissa Julia', '22222222', 'DOCENTE', '', 1),
(7, 'FLORES', 'QUIROZ', 'Milagros Betzabe', '33333333', 'DOCENTE', '', 1),
(8, 'DANTE', 'CARRERA', 'Aaron Piero', '44444444', 'DOCENTE', '', 1),
(9, 'ZAPATA', 'VALDEZ', 'Rodrigo Jaime', '55555555', 'APODERADO', '', 1),
(10, 'HILARIS', 'MONTALVO', 'Cristina Fiorella', '12121212', 'APODERADO', '', 1),
(11, 'EBRAUN', 'SILVA', 'Alexandra Rocio', '23232323', 'APODERADO', '', 1),
(12, 'ESMERALDA', 'BLANCO', 'Mayte Vanessa', '34343434', 'APODERADO', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `documento` varchar(10) NOT NULL,
  `tipo_usuario` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `documento`, `tipo_usuario`, `usuario`, `clave`, `estado`) VALUES
(1, '11111111', 'DOCENTE', 'ma1234', '123456', 1),
(2, '22222222', 'DOCENTE', 'mb1234', '123456', 1),
(3, '33333333', 'DOCENTE', 'mc1234', '123456', 1),
(4, '44444444', 'DOCENTE', 'md1234', '123456', 1),
(5, '55555555', 'APODERADO', 'mz1234', '123456', 1),
(6, '12121212', 'APODERADO', 'mx1234', '123456', 1),
(7, '23232323', 'APODERADO', 'my1234', '123456', 1),
(8, '34343434', 'APODERADO', 'mv1234', '123456', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apafa`
--
ALTER TABLE `apafa`
  ADD PRIMARY KEY (`cod_apafa`);

--
-- Indices de la tabla `docente_curso`
--
ALTER TABLE `docente_curso`
  ADD PRIMARY KEY (`cod_doc_curso`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`cod_matricula`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`cod_persona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apafa`
--
ALTER TABLE `apafa`
  MODIFY `cod_apafa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `docente_curso`
--
ALTER TABLE `docente_curso`
  MODIFY `cod_doc_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `cod_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `cod_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
