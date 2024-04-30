-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2024 a las 23:43:30
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
  `Observacion` varchar(500) DEFAULT NULL,
  `Estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_ambientes`
--

INSERT INTO `t_ambientes` (`Id_ambiente`, `Nombre`, `Computadores`, `Tv`, `Sillas`, `Mesas`, `Tablero`, `Archivador`, `Infraestructura`, `Observacion`, `Estado`) VALUES
(1, 'Lego', 10, 1, 15, 10, 1, 1, 1, 'Nada que reportar.\r\n', 'Habilitado'),
(2, 'Sala de conferencias', 0, 1, 50, 10, 1, 0, 1, 'Sala grande con pantalla de proyección', 'Disponible'),
(3, 'Aula 101', 30, 0, 25, 25, 1, 1, 1, 'Aula equipada con escritorios y sillas cómodas', 'Ocupado'),
(4, 'Laboratorio de Informática', 50, 0, 30, 30, 0, 0, 1, 'Laboratorio con equipos de última generación', 'Disponible'),
(5, 'Sala de Reuniones', 0, 1, 20, 10, 1, 0, 1, 'Sala para reuniones de equipo', 'Disponible'),
(6, 'Aula 102', 40, 0, 30, 30, 1, 1, 1, 'Aula amplia con pizarra y proyector', 'Disponible'),
(7, 'Oficina 1', 5, 0, 5, 5, 1, 1, 1, 'Oficina pequeña para uso individual', 'Disponible'),
(8, 'Sala de espera', 0, 1, 15, 5, 0, 0, 1, 'Área para esperar a los visitantes', 'Disponible'),
(9, 'Auditorio principal', 0, 1, 127, 100, 1, 0, 1, 'Gran auditorio con asientos para cientos de personas', 'Disponible'),
(10, 'Aula magna', 100, 0, 127, 50, 1, 1, 1, 'Aula con capacidad para eventos especiales', 'Disponible'),
(11, 'Oficina de administración', 10, 0, 10, 10, 1, 1, 1, 'Oficina para el personal administrativo', 'Disponible'),
(12, 'Aula 101', 20, 1, 40, 40, 1, 1, 1, 'Buena infraestructura', 'Disponible'),
(13, 'Aula 102', 15, 1, 30, 30, 1, 1, 1, 'Falta mantenimiento en algunas sillas', 'Disponible'),
(14, 'Aula 103', 25, 1, 35, 35, 1, 1, 1, 'Excelente ambiente', 'Disponible'),
(15, 'Aula 104', 30, 1, 45, 45, 1, 1, 1, 'Ambiente espacioso', 'Disponible'),
(16, 'Aula 105', 18, 1, 28, 28, 1, 1, 1, 'Buen ambiente para clases', 'Disponible'),
(17, 'Aula 106', 22, 1, 32, 32, 1, 1, 1, 'Equipada con TV', 'Disponible'),
(18, 'Aula 107', 20, 1, 40, 40, 1, 1, 1, 'Necesita reparación en el tablero', 'No disponible'),
(19, 'Aula 108', 25, 1, 35, 35, 1, 1, 1, 'Sillas nuevas', 'Disponible'),
(20, 'Aula 109', 30, 1, 45, 45, 1, 1, 1, 'Tablero en mal estado', 'No disponible'),
(21, 'Aula 110', 18, 1, 28, 28, 1, 1, 1, 'Ambiente tranquilo', 'Disponible'),
(22, 'Aula 111', 22, 1, 32, 32, 1, 1, 1, 'Buena iluminación', 'Disponible'),
(23, 'Aula 112', 20, 1, 40, 40, 1, 1, 1, 'Equipada con proyector', 'Disponible'),
(24, 'Aula 113', 15, 1, 30, 30, 1, 1, 1, 'Necesita mantenimiento en las mesas', 'No disponible'),
(25, 'Aula 114', 25, 1, 35, 35, 1, 1, 1, 'Excelente ambiente para estudio', 'Disponible'),
(26, 'Aula 115', 30, 1, 45, 45, 1, 1, 1, 'Ambiente amplio', 'Disponible'),
(27, 'Aula 116', 18, 1, 28, 28, 1, 1, 1, 'Sillas cómodas', 'Disponible'),
(28, 'Aula 117', 22, 1, 32, 32, 1, 1, 1, 'Buena ventilación', 'Disponible'),
(29, 'Aula 118', 20, 1, 40, 40, 1, 1, 1, 'Ambiente climatizado', 'Disponible'),
(30, 'Aula 119', 15, 1, 30, 30, 1, 1, 1, 'Espacio para trabajo en equipo', 'Disponible'),
(31, 'Aula 120', 25, 1, 35, 35, 1, 1, 1, 'Buena conexión a internet', 'Disponible'),
(32, 'Aula 121', 30, 1, 45, 45, 1, 1, 1, 'Ambiente adecuado para conferencias', 'Disponible'),
(33, 'Aula 122', 18, 1, 28, 28, 1, 1, 1, 'Buena ubicación', 'Disponible'),
(34, 'Aula 123', 22, 1, 32, 32, 1, 1, 1, 'Equipada con pizarrón', 'Disponible'),
(35, 'Aula 124', 20, 1, 40, 40, 1, 1, 1, 'Ambiente tranquilo', 'Disponible'),
(36, 'Aula 125', 15, 1, 30, 30, 1, 1, 1, 'Excelente iluminación', 'Disponible'),
(37, 'Aula 126', 25, 1, 35, 35, 1, 1, 1, 'Buena acústica', 'Disponible'),
(38, 'Aula 127', 30, 1, 45, 45, 1, 1, 1, 'Ambiente adaptado para personas con discapacidad', 'Disponible'),
(39, 'Aula 128', 18, 1, 28, 28, 1, 1, 1, 'Equipada con TV y proyector', 'Disponible'),
(40, 'Aula 129', 22, 1, 32, 32, 1, 1, 1, 'Ambiente confortable', 'Disponible'),
(41, 'Aula 130', 20, 1, 40, 40, 1, 1, 1, 'Ambiente adecuado para seminarios', 'Disponible'),
(42, 'Aula 131', 15, 1, 30, 30, 1, 1, 1, 'Mesas en buen estado', 'Disponible'),
(43, 'Aula 132', 25, 1, 35, 35, 1, 1, 1, 'Ambiente moderno', 'Disponible'),
(44, 'Aula 133', 30, 1, 45, 45, 1, 1, 1, 'Equipada con sistemas audiovisuales', 'Disponible'),
(45, 'Aula 134', 18, 1, 28, 28, 1, 1, 1, 'Espacio para trabajo individual', 'Disponible'),
(46, 'Aula 135', 22, 1, 32, 32, 1, 1, 1, 'Ambiente seguro', 'Disponible'),
(47, 'Aula 136', 20, 1, 40, 40, 1, 1, 1, 'Ambiente apto para talleres', 'Disponible'),
(48, 'Aula 137', 15, 1, 30, 30, 1, 1, 1, 'Buena disposición de las sillas', 'Disponible'),
(49, 'Aula 138', 25, 1, 35, 35, 1, 1, 1, 'Excelente ventilación', 'Disponible'),
(50, 'Aula 139', 30, 1, 45, 45, 1, 1, 1, 'Ambiente con buena temperatura', 'Disponible'),
(51, 'Aula 140', 18, 1, 28, 28, 1, 1, 1, 'Ambiente silencioso', 'Disponible');

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
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`Id_usuario`, `Nombres`, `Apellidos`, `Correo`, `Clave`, `Rol`) VALUES
(1, 'Daniel', 'Buitrago', 'buitrago@gmail.com', 1234, 'Usuario'),
(2, 'Juan', 'Martinez', 'juan@example.com', 1234, 'Administrador'),
(3, 'Maria', 'Gonzalez', 'maria@example.com', 6543, 'Usuario'),
(4, 'Carlos', 'Lopez', 'carlos@example.com', 9876, 'Usuario'),
(5, 'Laura', 'Perez', 'laura@example.com', 4567, 'Administrador'),
(6, 'Pedro', 'Sanchez', 'pedro@example.com', 3216, 'Usuario'),
(7, 'Ana', 'Rodriguez', 'ana@example.com', 7891, 'Usuario'),
(8, 'Luis', 'Fernandez', 'luis@example.com', 1593, 'Administrador'),
(9, 'Elena', 'Garcia', 'elena@example.com', 8529, 'Usuario'),
(10, 'Sergio', 'Martinez', 'sergio@example.com', 3698, 'Usuario'),
(11, 'Monica', 'Diaz', 'monica@example.com', 1472, 'Administrador'),
(12, 'Roberto', 'Alvarez', 'roberto@example.com', 2583, 'Usuario'),
(13, 'Carmen', 'Romero', 'carmen@example.com', 9638, 'Usuario'),
(14, 'Daniel', 'Jimenez', 'daniel@example.com', 6547, 'Administrador'),
(15, 'Sara', 'Moreno', 'sara@example.com', 1237, 'Usuario'),
(16, 'Pablo', 'Hernandez', 'pablo@example.com', 7896, 'Usuario'),
(17, 'Eva', 'Torres', 'eva@example.com', 8521, 'Administrador'),
(18, 'Antonio', 'Ruiz', 'antonio@example.com', 3691, 'Usuario'),
(19, 'Isabel', 'Gomez', 'isabel@example.com', 1473, 'Usuario'),
(20, 'Diego', 'Vazquez', 'diego@example.com', 6541, 'Administrador'),
(21, 'Sonia', 'Serrano', 'sonia@example.com', 3217, 'Usuario'),
(22, 'Raul', 'Iglesias', 'raul@example.com', 7893, 'Usuario'),
(23, 'Beatriz', 'Ortega', 'beatriz@example.com', 8523, 'Administrador'),
(24, 'Marcos', 'Navarro', 'marcos@example.com', 3698, 'Usuario'),
(25, 'Elena', 'Vidal', 'elena2@example.com', 6547, 'Usuario'),
(26, 'Javier', 'Molina', 'javier@example.com', 1233, 'Administrador'),
(27, 'Laura', 'Silva', 'laura2@example.com', 7891, 'Usuario'),
(28, 'Fernando', 'Gutierrez', 'fernando@example.com', 3216, 'Usuario'),
(29, 'Lucia', 'Aguilar', 'lucia@example.com', 4567, 'Administrador'),
(30, 'Adrian', 'Castro', 'adrian@example.com', 9876, 'Usuario'),
(31, 'Cristina', 'Santos', 'cristina@example.com', 1593, 'Usuario'),
(32, 'Alejandro', 'Vega', 'alejandro@example.com', 6543, 'Administrador'),
(33, 'Natalia', 'Blanco', 'natalia@example.com', 8529, 'Usuario'),
(34, 'Andres', 'Mendez', 'andres@example.com', 3698, 'Usuario'),
(35, 'Patricia', 'Leon', 'patricia@example.com', 1472, 'Administrador'),
(36, 'Roberta', 'Cruz', 'roberta@example.com', 2583, 'Usuario'),
(37, 'Miguel', 'Torres', 'miguel@example.com', 9638, 'Usuario'),
(38, 'Esther', 'Ramirez', 'esther@example.com', 6547, 'Administrador'),
(39, 'Jorge', 'Dominguez', 'jorge@example.com', 1237, 'Usuario'),
(40, 'Gloria', 'Herrera', 'gloria@example.com', 7896, 'Usuario'),
(41, 'Ivan', 'Castillo', 'ivan@example.com', 8521, 'Administrador'),
(42, 'Lorena', 'Arias', 'lorena@example.com', 3691, 'Usuario'),
(43, 'Pilar', 'Montoya', 'pilar@example.com', 1473, 'Usuario'),
(44, 'Rosa', 'Guerrero', 'rosa@example.com', 6541, 'Administrador'),
(45, 'Cesar', 'Soto', 'cesar@example.com', 3217, 'Usuario'),
(46, 'Vanessa', 'Cabrera', 'vanessa@example.com', 7893, 'Usuario'),
(47, 'Oscar', 'Calvo', 'oscar@example.com', 8523, 'Administrador');

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
  MODIFY `Id_ambiente` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
  MODIFY `Id_usuario` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
