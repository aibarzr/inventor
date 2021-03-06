-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2017 a las 08:48:18
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idEspecialidad` int(11) NOT NULL,
  `especialidad` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idEspecialidad`, `especialidad`) VALUES
(1, 'SAT'),
(2, 'Admin'),
(3, 'Profesores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoequipos`
--

CREATE TABLE `estadoequipos` (
  `idestado` int(11) NOT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadoequipos`
--

INSERT INTO `estadoequipos` (`idestado`, `estado`) VALUES
(1, 'Nuevo'),
(2, 'Restaurado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresoras`
--

CREATE TABLE `impresoras` (
  `idreferencia` int(11) NOT NULL DEFAULT '0',
  `tipo` varchar(255) DEFAULT NULL,
  `consumible` varchar(255) DEFAULT NULL,
  `numserie` varchar(255) DEFAULT NULL,
  `numinterno` varchar(255) DEFAULT NULL,
  `fechaentrada` date DEFAULT NULL,
  `fechabaja` date DEFAULT '0000-00-00',
  `garantia` tinyint(3) UNSIGNED DEFAULT '0',
  `idestado` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Disparadores `impresoras`
--
DELIMITER $$
CREATE TRIGGER `impresoras` BEFORE DELETE ON `impresoras` FOR EACH ROW INSERT INTO historialimpresoras
SELECT *
FROM impresoras
WHERE idreferencia=old.idreferencia
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `idincidencia` int(11) NOT NULL,
  `idreferencia` int(11) DEFAULT '0',
  `fechaincidencia` date DEFAULT NULL,
  `incidencia` longtext,
  `usuario` varchar(80) NOT NULL,
  `fechasolucion` date DEFAULT NULL,
  `solucion` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`idincidencia`, `idreferencia`, `fechaincidencia`, `incidencia`, `usuario`, `fechasolucion`, `solucion`) VALUES
(33, 1, '2017-05-01', 'incidencia1', '  ', '0000-00-00', ' '),
(34, 1, '2017-05-01', 'incidencia', 'Lydia Abril Cedillo', '0000-00-00', ' ');

--
-- Disparadores `incidencias`
--
DELIMITER $$
CREATE TRIGGER `solucionIncidencias` BEFORE DELETE ON `incidencias` FOR EACH ROW INSERT INTO historialincidencias
SELECT *
FROM incidencias
WHERE idincidencia=old.idincidencia
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia`
--

CREATE TABLE `licencia` (
  `idlicencia` int(11) NOT NULL,
  `licencia` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `licencia`
--

INSERT INTO `licencia` (`idlicencia`, `licencia`) VALUES
(1, 'Única'),
(2, 'Por volumen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL,
  `marca` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idmarca`, `marca`) VALUES
(46, 'PRUEBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcaproveedor`
--

CREATE TABLE `marcaproveedor` (
  `idmarca` int(11) NOT NULL DEFAULT '0',
  `idproveedor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcaproveedor`
--

INSERT INTO `marcaproveedor` (`idmarca`, `idproveedor`) VALUES
(46, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `idreferencia` int(11) NOT NULL,
  `material` varchar(100) NOT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `idmarca` int(11) DEFAULT '0',
  `idproveedor` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT '0',
  `idubicacion` int(11) DEFAULT '0',
  `observaciones` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Disparadores `material`
--
DELIMITER $$
CREATE TRIGGER `materiales` BEFORE DELETE ON `material` FOR EACH ROW INSERT INTO historialmateriales
SELECT *
FROM material
WHERE idreferencia=old.idreferencia
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitores`
--

CREATE TABLE `monitores` (
  `idreferencia` int(11) NOT NULL DEFAULT '0',
  `tipo` varchar(255) DEFAULT NULL,
  `tamano` varchar(255) DEFAULT NULL,
  `numserie` varchar(255) DEFAULT NULL,
  `numinterno` varchar(255) DEFAULT NULL,
  `fechaentrada` date DEFAULT NULL,
  `fechabaja` date DEFAULT '0000-00-00',
  `garantia` tinyint(3) UNSIGNED DEFAULT '0',
  `idestado` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Disparadores `monitores`
--
DELIMITER $$
CREATE TRIGGER `monitores` BEFORE DELETE ON `monitores` FOR EACH ROW INSERT INTO historialmonitores
SELECT *
FROM monitores
WHERE idreferencia=old.idreferencia
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenadores`
--

CREATE TABLE `ordenadores` (
  `idreferencia` int(11) NOT NULL DEFAULT '0',
  `placa` varchar(255) DEFAULT NULL,
  `procesador` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `discoduro` varchar(255) DEFAULT NULL,
  `tarjetas` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `dominio` varchar(255) DEFAULT NULL,
  `numserie` varchar(255) DEFAULT NULL,
  `numinterno` varchar(255) DEFAULT NULL,
  `fechaentrada` date DEFAULT NULL,
  `fechabaja` date DEFAULT '0000-00-00',
  `garantia` tinyint(3) UNSIGNED DEFAULT '0',
  `idestado` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Disparadores `ordenadores`
--
DELIMITER $$
CREATE TRIGGER `ordenadores` BEFORE DELETE ON `ordenadores` FOR EACH ROW INSERT INTO historialordenadores
SELECT *
FROM ordenadores
WHERE idreferencia=old.idreferencia
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedor` int(11) NOT NULL,
  `proveedor` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedor`, `proveedor`) VALUES
(8, 'pro1'),
(9, 'pro3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisiones`
--

CREATE TABLE `revisiones` (
  `idrevision` int(11) NOT NULL,
  `idreferencia` int(11) DEFAULT '0',
  `revisor` varchar(255) DEFAULT NULL,
  `fecharevision` date DEFAULT NULL,
  `observaciones` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software`
--

CREATE TABLE `software` (
  `idsoftware` int(11) NOT NULL,
  `software` varchar(100) DEFAULT NULL,
  `idlicencia` int(11) DEFAULT NULL,
  `codigolicencia` varchar(16) DEFAULT NULL,
  `cantidad` int(11) DEFAULT '0',
  `fechafin` date DEFAULT NULL,
  `observaciones` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `software`
--

INSERT INTO `software` (`idsoftware`, `software`, `idlicencia`, `codigolicencia`, `cantidad`, `fechafin`, `observaciones`) VALUES
(5, 'software2', 1, '0202', 1, '2017-05-23', 'soft2'),
(4, 'software1', 1, '0101', 1, '2017-05-01', 'soft1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `softwareinstalado`
--

CREATE TABLE `softwareinstalado` (
  `idreferencia` int(11) NOT NULL DEFAULT '0',
  `idsoftware` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `softwareinstalado`
--

INSERT INTO `softwareinstalado` (`idreferencia`, `idsoftware`) VALUES
(4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `idubicacion` int(11) NOT NULL,
  `ubicacion` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`idubicacion`, `ubicacion`) VALUES
(6, 'ubicacion2'),
(5, 'ubicacion1'),
(7, 'ULTIMA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `primerapellido` varchar(20) NOT NULL,
  `segundoapellido` varchar(20) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(8) DEFAULT NULL,
  `idespecialidad` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `primerapellido`, `segundoapellido`, `usuario`, `clave`, `idespecialidad`) VALUES
(11, 'Lydia', 'Abril', 'Cedillo', 'labril', '66fb4d00', 2),
(10, 'Mia', 'Mac', 'Donals', 'mmac', 'b9b124da', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idEspecialidad`);

--
-- Indices de la tabla `estadoequipos`
--
ALTER TABLE `estadoequipos`
  ADD PRIMARY KEY (`idestado`);

--
-- Indices de la tabla `impresoras`
--
ALTER TABLE `impresoras`
  ADD PRIMARY KEY (`idreferencia`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`idincidencia`),
  ADD KEY `idreferencia` (`idreferencia`);

--
-- Indices de la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD PRIMARY KEY (`idlicencia`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`);

--
-- Indices de la tabla `marcaproveedor`
--
ALTER TABLE `marcaproveedor`
  ADD PRIMARY KEY (`idmarca`,`idproveedor`),
  ADD UNIQUE KEY `idmarca` (`idmarca`,`idproveedor`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idreferencia`),
  ADD KEY `idmarca` (`idmarca`),
  ADD KEY `idubicacion` (`idubicacion`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idproveedor` (`idproveedor`);

--
-- Indices de la tabla `monitores`
--
ALTER TABLE `monitores`
  ADD PRIMARY KEY (`idreferencia`);

--
-- Indices de la tabla `ordenadores`
--
ALTER TABLE `ordenadores`
  ADD PRIMARY KEY (`idreferencia`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `revisiones`
--
ALTER TABLE `revisiones`
  ADD PRIMARY KEY (`idrevision`),
  ADD KEY `idreferencia` (`idreferencia`),
  ADD KEY `revisor` (`revisor`);

--
-- Indices de la tabla `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`idsoftware`);

--
-- Indices de la tabla `softwareinstalado`
--
ALTER TABLE `softwareinstalado`
  ADD PRIMARY KEY (`idreferencia`,`idsoftware`),
  ADD KEY `idsoftware` (`idsoftware`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`idubicacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `clave` (`clave`),
  ADD KEY `idespecialidad` (`idespecialidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `estadoequipos`
--
ALTER TABLE `estadoequipos`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `idincidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `licencia`
--
ALTER TABLE `licencia`
  MODIFY `idlicencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `idreferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `revisiones`
--
ALTER TABLE `revisiones`
  MODIFY `idrevision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `software`
--
ALTER TABLE `software`
  MODIFY `idsoftware` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `idubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
