-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2019 a las 01:30:50
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prova`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(12) NOT NULL,
  `Titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Descripcion` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `RutaImagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Autor` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `Titulo`, `Descripcion`, `RutaImagen`, `Autor`) VALUES
(1, 'Luis Suárez se pierde la final de Copa', 'El club azulgrana emitió un comunicado en el que aseguraba que la intervención había sido un éxito\r\ny que el uruguayo no podrá estar en Sevilla.', '../imgs/Suarez.jpg', 'admin'),
(2, 'El Barça acelera los contactos finales por De Ligt', 'Tras el KO del Ajax en la Champions, el Barça quiere dejarlo todo lista para abordar su contratación cuando termine la Eredivise.', '../imgs/DeLigt.jpg', 'admin'),
(3, 'Griezmann rumbo a Barcelona', 'El francés concita el quorum en el área técnica del Barça por su calidad, experiencia y precio. La debacle en Champions refuerza la idea de poner competencia y fichar gol en la delantera.', '../imgs/Griezman.jpg', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokens`
--

CREATE TABLE `tokens` (
  `token` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_usuarios` int(6) NOT NULL,
  `Hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tokens`
--

INSERT INTO `tokens` (`token`, `id_usuarios`, `Hora`) VALUES
('7L2QzFbZBzS7BWN0qW0U', 3, '2019-06-20 11:44:28'),
('AJfGZKvgeE7GNLWhAxhP', 3, '2019-06-20 11:45:13'),
('dKWADaSUrgUItVrXQHAB', 3, '2019-06-21 11:14:17'),
('nGAP1rnbkZY977WwToJ0', 3, '2019-06-21 11:20:59'),
('r2rv5tMPLTBaVqEyw3Oy', 3, '2019-06-20 11:42:40'),
('yfzobsYksoInABFrbPcv', 3, '2019-06-20 11:41:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(6) NOT NULL,
  `Name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Surname` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Birthdate` date NOT NULL,
  `Email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `User` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Name`, `Surname`, `Birthdate`, `Email`, `User`, `Password`) VALUES
(1, 'admin', 'admin', '1988-01-03', 'admin@admin.es', 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'profe', 'profe', '1988-01-03', 'profe@profe.es', 'profe', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Sadik', 'Laar', '1992-06-10', 'sadik.laaroussii@gmail.com', 'sdk', 'f5dc83a8070639e2df4a82d2eea0a93a'),
(4, 'ali', 'eq', '1993-06-16', 'ali@eq.es', 'ali', '4f34e0948c0d4ac96ebec47a17fdfe8e'),
(5, 'Pau', 'Perez', '1986-06-04', 'pau@pe.es', 'pau', 'f1aa26ae1a4e2f484363d5c13e40c2b2'),
(6, 'ss', 'ss', '1993-07-08', 'ss@ss.es', 'ss', 'a7653fad4df83288ed8888663f8ff585'),
(7, 'dd', 'dd', '1974-06-14', 'dd@dd.es', 'dd', '4777e2ff0ba86ecce9d278d92cc48045'),
(8, 'cc', 'cc', '1994-05-09', 'cc@cc.es', 'cc', '9996c63ad8050e1a5ef443b362103866');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`token`),
  ADD KEY `fk_id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `fk_id_usuarios` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
