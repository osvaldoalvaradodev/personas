-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2017 a las 22:40:29
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ingresos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombre`) VALUES
(1, 'Administración'),
(2, 'Transportes'),
(3, 'Armadores'),
(4, 'Descargadores'),
(5, 'Tripulacion'),
(6, 'Salud'),
(7, 'Tripulacion'),
(8, 'Salud'),
(9, 'Sernapesca'),
(10, 'IFOP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `rut` varchar(60) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `telefono` varchar(60) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `id_area` int(11) DEFAULT NULL,
  `notas` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`rut`, `nombre`, `apellido`, `telefono`, `direccion`, `email`, `estado`, `id_area`, `notas`) VALUES
('', '', '', '', '', '', 1, 1, NULL),
('1', '', '', '', '', '', 1, 1, NULL),
('1111', '', '', '', '', '', 1, 1, NULL),
('11111', '', '', '', '', '', 1, 1, NULL),
('123', 'Test', 'Test', 'Test', 'Test', 'Test', 1, 1, NULL),
('17123321', 'awd', 'asd', '', 'asd', 'asd', 1, 1, NULL),
('17889219', 'Johana', 'Navarrete', '', '', '', 1, 1, NULL),
('17999388', 'Pedrito', 'Nsndndnd', '', '', '', 1, 1, NULL),
('2', '', '', '', '', '', 1, 1, NULL),
('aa', 'aa', 'Aaa', 'asa', 'aa', 'aaa', 1, 1, NULL),
('aaa', '', '', '', '', '', 1, 1, NULL),
('bbbb', '', '', '', '', '', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `registro` datetime NOT NULL,
  `rut` varchar(60) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `registro`, `rut`, `tipo`) VALUES
(1, '2017-03-03 08:41:21', '17999388', 0),
(2, '2017-03-20 07:32:43', '17999388', 1),
(3, '2017-03-20 07:44:17', '17889219', 1),
(4, '2017-03-20 07:47:20', '17123321', 1),
(5, '2017-03-20 07:57:54', '17999388', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `id_rol_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`, `mail`, `id_rol_usuario`) VALUES
('admin', 'admin123*', 'osvaldo.alvarado.dev@gmail.com', 0),
('admin2', 'admin2', 'admin2@gmail.com', 99);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`rut`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
