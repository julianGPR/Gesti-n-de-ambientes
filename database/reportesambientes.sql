-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2024 a las 01:04:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reportesambientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_ambientes`
--

CREATE TABLE `t_ambientes` (
  `Id_ambiente` int(50) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `Computadores` tinyint(1) NOT NULL,
  `Tv` tinyint(1) NOT NULL,
  `Sillas` tinyint(1) NOT NULL,
  `Mesas` tinyint(1) NOT NULL,
  `Tablero` tinyint(1) NOT NULL,
  `Archivador` tinyint(1) NOT NULL,
  `Infraestructura` tinyint(1) NOT NULL,
  `Observacion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_computadores`
--

CREATE TABLE `t_computadores` (
  `Id_computador` int(50) NOT NULL,
  `Hardware` tinyint(1) NOT NULL,
  `Software` tinyint(1) NOT NULL,
  `Observacion` varchar(500) DEFAULT NULL,
  `Id_ambiente` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_reportes`
--

CREATE TABLE `t_reportes` (
  `Id_reporte` int(50) NOT NULL,
  `FechaHora` datetime NOT NULL,
  `Id_usuario` int(50) NOT NULL,
  `Id_ambiente` int(50) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  `Observaciones` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `Id_usuario` int(50) NOT NULL,
  `Nombres` varchar(250) NOT NULL,
  `Apellidos` varchar(250) NOT NULL,
  `Correo` varchar(250) NOT NULL,
  `Clave` int(50) NOT NULL,
  `Rol` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_ambientes`
--
ALTER TABLE `t_ambientes`
  ADD PRIMARY KEY (`Id_ambiente`);

--
-- Indices de la tabla `t_computadores`
--
ALTER TABLE `t_computadores`
  ADD PRIMARY KEY (`Id_computador`),
  ADD KEY `FK_computadotes_ambientes` (`Id_ambiente`);

--
-- Indices de la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
  ADD PRIMARY KEY (`Id_reporte`),
  ADD KEY `FK_reportes_usuarios` (`Id_usuario`),
  ADD KEY `Id_ambiente` (`Id_ambiente`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_ambientes`
--
ALTER TABLE `t_ambientes`
  MODIFY `Id_ambiente` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_computadores`
--
ALTER TABLE `t_computadores`
  MODIFY `Id_computador` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
  MODIFY `Id_reporte` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `Id_usuario` int(50) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_computadores`
--
ALTER TABLE `t_computadores`
  ADD CONSTRAINT `FK_computadotes_ambientes` FOREIGN KEY (`Id_ambiente`) REFERENCES `t_ambientes` (`Id_ambiente`);

--
-- Filtros para la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
  ADD CONSTRAINT `FK_reportes_usuarios` FOREIGN KEY (`Id_usuario`) REFERENCES `t_usuarios` (`Id_usuario`),
  ADD CONSTRAINT `t_reportes_ibfk_1` FOREIGN KEY (`Id_ambiente`) REFERENCES `t_ambientes` (`Id_ambiente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
