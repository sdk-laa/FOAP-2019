-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2019 a las 01:34:26
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
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `numclie` int(4) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `limitcredit` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`numclie`, `nom`, `limitcredit`) VALUES
(2101, 'Luís García Antón', '65000.00'),
(2102, 'Álvaro Rodríguez', '65000.00'),
(2103, 'Jaime Llorens', '50000.00'),
(2105, 'Antonio Canales', '45000.00'),
(2106, 'Juan Suárez', '65000.00'),
(2107, 'Julian López', '35000.00'),
(2108, 'Julia Antequera', '55000.00'),
(2109, 'Alberto Juanes', '25000.00'),
(2111, 'Cristóbal García', '50000.00'),
(2112, 'María Silva', '50000.00'),
(2113, 'Luisa Maron', '20000.00'),
(2114, 'Cristina Bulini', '20000.00'),
(2115, 'Vicente Martínez', '20000.00'),
(2117, 'Carlos Tena', '35000.00'),
(2118, 'Junípero Alvarez', '60000.00'),
(2119, 'Salomon Bueno', '25000.00'),
(2120, 'Juan Malo', '50000.00'),
(2121, 'Vicente Ríos', '45000.00'),
(2122, 'José Marchante', '30000.00'),
(2123, 'José Libros', '40000.00'),
(2124, 'Juan Bolto', '40000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comanda`
--

CREATE TABLE `comanda` (
  `numcomanda` int(6) NOT NULL,
  `data` date NOT NULL,
  `clie` int(4) NOT NULL,
  `rep_ven` int(3) NOT NULL,
  `import_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comanda`
--

INSERT INTO `comanda` (`numcomanda`, `data`, `clie`, `rep_ven`, `import_total`) VALUES
(110036, '1997-01-02', 2107, 110, '54000.00'),
(112963, '1997-05-10', 2103, 105, '3276.00'),
(112968, '1990-01-11', 2102, 101, '3978.00'),
(112975, '1997-02-11', 2111, 103, '17100.00'),
(112979, '1989-10-12', 2114, 108, '15000.00'),
(112983, '1997-05-10', 2103, 105, '702.00'),
(112987, '1997-01-01', 2103, 105, '28958.00'),
(112989, '1997-12-10', 2101, 106, '2218.00'),
(112992, '1990-04-15', 2118, 108, '760.00'),
(112993, '1997-03-10', 2106, 102, '8173.00'),
(112997, '1997-04-04', 2124, 107, '6277.00'),
(113003, '1997-02-05', 2108, 109, '5625.00'),
(113007, '1997-01-01', 2112, 108, '6670.00'),
(113012, '1997-05-05', 2111, 105, '4397.00'),
(113013, '1997-08-06', 2118, 108, '56856.00'),
(113024, '1997-07-04', 2114, 108, '7100.00'),
(113027, '1997-02-05', 2103, 105, '4736.00'),
(113034, '1997-11-05', 2107, 110, '632.00'),
(113042, '1997-01-01', 2113, 101, '22500.00'),
(113045, '1997-07-02', 2112, 108, '48750.00'),
(113048, '1997-02-02', 2120, 102, '4526.00'),
(113049, '1997-04-04', 2118, 108, '776.00'),
(113051, '1997-07-06', 2118, 108, '1420.00'),
(113055, '1997-04-01', 2108, 101, '150.00'),
(113057, '1997-11-01', 2111, 103, '2080.00'),
(113058, '1989-07-04', 2108, 109, '1480.00'),
(113062, '1997-07-04', 2124, 107, '2430.00'),
(113065, '1997-06-03', 2106, 102, '33480.00'),
(113069, '1997-08-01', 2109, 107, '31350.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleats`
--

CREATE TABLE `empleats` (
  `numemp` int(3) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `edat` int(3) DEFAULT NULL,
  `oficina` int(2) DEFAULT NULL,
  `titol` varchar(20) DEFAULT NULL,
  `contracte` date DEFAULT NULL,
  `cap` int(3) DEFAULT NULL,
  `salari` decimal(10,2) DEFAULT NULL,
  `vendes` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleats`
--

INSERT INTO `empleats` (`numemp`, `nom`, `edat`, `oficina`, `titol`, `contracte`, `cap`, `salari`, `vendes`) VALUES
(101, 'Antonio Viguer', 45, 12, 'representant', '1986-10-20', 104, '400000.00', '0.00'),
(102, 'Alvaro Jaumes', 48, 21, 'representant', '1986-12-20', 108, '362500.00', '474000.00'),
(103, 'Juan Rovira', 29, 12, 'representant', '1987-03-01', 104, '400000.00', '0.00'),
(104, 'Jose González', 33, 12, 'dir vendes', '1987-03-01', 106, '400000.00', '0.00'),
(105, 'Vicente Pantalla', 37, 13, 'representant', '1988-02-12', 104, '175000.00', '368000.00'),
(106, 'Luis Antonio', 52, 11, 'dir general', '1988-06-14', NULL, '287500.00', '299000.00'),
(107, 'Jorge Gutiérrez', 49, 22, 'representant', '1988-11-14', 108, '150000.00', '186000.00'),
(108, 'Ana Bustamante', 62, 21, 'dir vendes', '1989-10-12', 106, '362500.00', '361000.00'),
(109, 'Maria Sunta', 31, 11, 'representant', '1999-10-12', 106, '287500.00', '392000.00'),
(110, 'Juan Victor', 41, NULL, 'representant', '1990-01-13', 104, NULL, '76000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linia_comanda`
--

CREATE TABLE `linia_comanda` (
  `numcomanda` int(6) NOT NULL,
  `lin_com` int(2) NOT NULL,
  `codfab` varchar(10) NOT NULL,
  `codprod` varchar(15) NOT NULL,
  `quant` int(3) NOT NULL,
  `import` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `linia_comanda`
--

INSERT INTO `linia_comanda` (`numcomanda`, `lin_com`, `codfab`, `codprod`, `quant`, `import`) VALUES
(110036, 1, 'aci', '4100z', 9, '22500.00'),
(110036, 2, 'rei', '2a44l', 7, '31500.00'),
(112963, 1, 'aci', '41004', 28, '3276.00'),
(112968, 1, 'aci', '41004', 34, '3978.00'),
(112975, 1, 'rei', '2a44g', 6, '2100.00'),
(112975, 2, 'aci', '4100z', 6, '15000.00'),
(112979, 1, 'aci', '4100z', 6, '15000.00'),
(112983, 1, 'aci', '41004', 6, '702.00'),
(112987, 1, 'aci', '4100y', 11, '27500.00'),
(112987, 2, 'fea', '114', 6, '1458.00'),
(112989, 1, 'fea', '114', 6, '1458.00'),
(112989, 2, 'aci', '41002', 10, '760.00'),
(112992, 1, 'aci', '41002', 10, '760.00'),
(112993, 1, 'rei', '2a45c', 24, '1896.00'),
(112993, 2, 'bic', '41003', 1, '652.00'),
(112993, 3, 'imm', '779c', 3, '5625.00'),
(112997, 1, 'bic', '41003', 1, '652.00'),
(112997, 2, 'imm', '779c', 3, '5625.00'),
(113003, 1, 'imm', '779c', 3, '5625.00'),
(113007, 1, 'imm', '773c', 3, '2925.00'),
(113007, 2, 'aci', '41003', 35, '3745.00'),
(113012, 1, 'aci', '41003', 35, '3745.00'),
(113012, 2, 'bic', '41003', 1, '652.00'),
(113013, 1, 'bic', '41003', 1, '652.00'),
(113013, 2, 'qsa', 'xk47', 20, '7100.00'),
(113013, 3, 'aci', '41002', 54, '4104.00'),
(113013, 4, 'rei', '2a44r', 10, '45000.00'),
(113024, 1, 'qsa', 'xk47', 20, '7100.00'),
(113027, 1, 'aci', '41002', 54, '4104.00'),
(113027, 2, 'rei', '2a45c', 8, '632.00'),
(113034, 1, 'rei', '2a45c', 8, '632.00'),
(113042, 1, 'rei', '2a44r', 5, '22500.00'),
(113045, 1, 'rei', '2a44r', 10, '45000.00'),
(113045, 2, 'imm', '779c', 2, '3750.00'),
(113048, 1, 'imm', '779c', 2, '3750.00'),
(113048, 2, 'qsa', 'xk47', 2, '776.00'),
(113049, 1, 'qsa', 'xk47', 2, '776.00'),
(113051, 1, 'qsa', 'xk47', 4, '1420.00'),
(113055, 1, 'aci', '4100x', 6, '150.00'),
(113057, 1, 'aci', '4100x', 24, '600.00'),
(113057, 2, 'fea', '112', 10, '1480.00'),
(113058, 1, 'fea', '112', 10, '1480.00'),
(113062, 1, 'bic', '41003', 10, '2430.00'),
(113065, 1, 'qsa', 'xk47', 6, '2130.00'),
(113065, 2, 'imm', '773c', 22, '31350.00'),
(113069, 1, 'imm', '773c', 22, '31350.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficines`
--

CREATE TABLE `oficines` (
  `oficina` int(2) NOT NULL,
  `ciutat` varchar(40) DEFAULT NULL,
  `regio` varchar(20) DEFAULT NULL,
  `dir` int(3) DEFAULT NULL,
  `objectiu` decimal(10,2) DEFAULT NULL,
  `vendes` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficines`
--

INSERT INTO `oficines` (`oficina`, `ciutat`, `regio`, `dir`, `objectiu`, `vendes`) VALUES
(11, 'Valencia', 'este', 106, '575000.00', '693000.00'),
(12, 'Alicante', 'este', 104, '800000.00', '735000.00'),
(13, 'Castellón', 'este', 105, '350000.00', '368000.00'),
(21, 'Badajoz', 'oeste', 108, '725000.00', '836000.00'),
(22, 'A Coruña', 'oeste', 108, '300000.00', '186000.00'),
(23, 'Madrid', 'centro', 108, NULL, NULL),
(24, 'Madrid', 'centro', 108, '250000.00', '150000.00'),
(26, 'Pamplona', 'norte', 108, NULL, NULL),
(28, 'Valencia', 'este', 108, '900000.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productes`
--

CREATE TABLE `productes` (
  `codfab` varchar(10) NOT NULL,
  `codprod` varchar(15) NOT NULL,
  `descr` varchar(20) DEFAULT NULL,
  `preu` decimal(10,2) DEFAULT NULL,
  `existencies` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productes`
--

INSERT INTO `productes` (`codfab`, `codprod`, `descr`, `preu`, `existencies`) VALUES
('aci', '41001', 'arandela', '58.00', 277),
('aci', '41002', 'bisagra', '80.00', 167),
('aci', '41003', 'art t3', '112.00', 207),
('aci', '41004', 'art t4', '123.00', 139),
('aci', '4100x', 'junta', '26.00', 37),
('aci', '4100y', 'extractor', '2888.00', 25),
('aci', '4100z', 'mont', '2625.00', 28),
('bic', '41003', 'manivela', '652.00', 3),
('bic', '41089', 'rodamiento', '225.00', 78),
('bic', '41672', 'plato', '180.00', 0),
('fea', '112', 'cubo', '148.00', 115),
('fea', '114', 'cubo', '243.00', 15),
('imm', '773c', 'reostato', '975.00', 28),
('imm', '775c', 'reostato 2', '1425.00', 5),
('imm', '779c', 'reostato 3', '1875.00', 0),
('imm', '887h', 'caja clavos', '54.00', 223),
('imm', '887p', 'perno', '25.00', 24),
('imm', '887x', 'manivela', '475.00', 32),
('qsa', 'xk47', 'red', '355.00', 38),
('qsa', 'xk48', 'red', '134.00', 203),
('qsa', 'xk48a', 'red', '117.00', 37),
('rei', '2a44g', 'pas', '350.00', 14),
('rei', '2a44l', 'bomba l', '4500.00', 12),
('rei', '2a44r', 'bomba r', '4500.00', 12),
('rei', '2a45c', 'junta', '79.00', 210);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`numclie`);

--
-- Indices de la tabla `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`numcomanda`),
  ADD KEY `FK_comanda_empl` (`rep_ven`),
  ADD KEY `FK_comanda_client` (`clie`);

--
-- Indices de la tabla `empleats`
--
ALTER TABLE `empleats`
  ADD PRIMARY KEY (`numemp`),
  ADD KEY `FK_empl_empl` (`cap`),
  ADD KEY `FK_empl_ofic` (`oficina`);

--
-- Indices de la tabla `linia_comanda`
--
ALTER TABLE `linia_comanda`
  ADD PRIMARY KEY (`numcomanda`,`lin_com`),
  ADD KEY `FK_lincomanda_prod` (`codfab`,`codprod`);

--
-- Indices de la tabla `oficines`
--
ALTER TABLE `oficines`
  ADD PRIMARY KEY (`oficina`),
  ADD KEY `FK_ofic_empl` (`dir`);

--
-- Indices de la tabla `productes`
--
ALTER TABLE `productes`
  ADD PRIMARY KEY (`codfab`,`codprod`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `FK_comanda_client` FOREIGN KEY (`clie`) REFERENCES `clients` (`numclie`),
  ADD CONSTRAINT `FK_comanda_empl` FOREIGN KEY (`rep_ven`) REFERENCES `empleats` (`numemp`);

--
-- Filtros para la tabla `empleats`
--
ALTER TABLE `empleats`
  ADD CONSTRAINT `FK_empl_empl` FOREIGN KEY (`cap`) REFERENCES `empleats` (`numemp`),
  ADD CONSTRAINT `FK_empl_ofic` FOREIGN KEY (`oficina`) REFERENCES `oficines` (`oficina`) ON DELETE SET NULL;

--
-- Filtros para la tabla `linia_comanda`
--
ALTER TABLE `linia_comanda`
  ADD CONSTRAINT `FK_lincomanda_com` FOREIGN KEY (`numcomanda`) REFERENCES `comanda` (`numcomanda`),
  ADD CONSTRAINT `FK_lincomanda_prod` FOREIGN KEY (`codfab`,`codprod`) REFERENCES `productes` (`codfab`, `codprod`);

--
-- Filtros para la tabla `oficines`
--
ALTER TABLE `oficines`
  ADD CONSTRAINT `FK_ofic_empl` FOREIGN KEY (`dir`) REFERENCES `empleats` (`numemp`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
