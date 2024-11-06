-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-11-2024 a las 07:14:23
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
-- Estructura de tabla para la tabla `AreaTrabajo`
--

CREATE TABLE `AreaTrabajo` (
  `id_area` int(11) NOT NULL,
  `nombre_area` varchar(100) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `responsable` varchar(100) DEFAULT NULL,
  `tipo_area` enum('Tuberia','Ensamble','Corte','Satelite') NOT NULL,
  `equipo_disponible` text DEFAULT NULL,
  `estado_area` varchar(255) NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp(),
  `comentarios` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `AreaTrabajo`
--

INSERT INTO `AreaTrabajo` (`id_area`, `nombre_area`, `capacidad`, `ubicacion`, `responsable`, `tipo_area`, `equipo_disponible`, `estado_area`, `fecha_creacion`, `comentarios`) VALUES
(1, 'Tuberia', 10, 'Piso 1', 'Julian', 'Tuberia', 'Todo', 'Habilitado', '2024-10-26', 'nada'),
(2, 'Area dobladora', 3, 'seccion 5', 'Edgar Agilar', 'Tuberia', 'dobladora', 'Habilitado', '2024-10-26', 'nada'),
(3, 'sCd', 32, '', '', 'Tuberia', 'si', 'Habilitado', '2024-10-30', 'casd'),
(4, 'sCd', 32, '', '', 'Tuberia', 'si', 'Habilitado', '2024-10-30', 'casd'),
(5, 'sCd', 32, '', '', 'Tuberia', 'si', 'Habilitado', '2024-10-30', 'casd'),
(6, 'pollo', 2, '', '', 'Corte', 'si', 'Habilitado', '2024-10-30', '12312e'),
(7, 'dedwefwde', 123, '', '', 'Corte', 'si', 'Habilitado', '2024-10-30', ''),
(8, 'pollo', 23, ' Bogota', 'nadie ', 'Ensamble', 'si', 'Habilitado', '2024-10-30', 'sss'),
(9, 'dasdasd', 2, ' Bogota', ' sdasd', 'Ensamble', 'si', 'Inhabilitado', '2024-10-30', 'sdaasd c sda'),
(10, 'xdexed', 222, ' Bogota', '106', 'Ensamble', 'si', 'Habilitado', '2024-10-30', 'aza'),
(11, 'aaaa', 23, ' Bogota', '106', 'Tuberia', 'Todo', 'Habilitado', '2024-10-31', '2312dewf'),
(12, 'aaaa', 122, ' Bogota', '107', 'Corte', 'si', 'Habilitado', '2024-10-31', 'w21xax'),
(13, 'pollo', 4, ' Bogota', '115', 'Satelite', 'si', 'Habilitado', '2024-11-03', 'nada que comentar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_factura`
--

CREATE TABLE `detalles_factura` (
  `id` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_entrada`
--

CREATE TABLE `inventario_entrada` (
  `id_entrada` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `unidad_medida` varchar(50) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `fecha_entrada` date NOT NULL,
  `observaciones` text DEFAULT NULL,
  `Id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario_entrada`
--

INSERT INTO `inventario_entrada` (`id_entrada`, `proveedor_id`, `cantidad`, `precio_unitario`, `unidad_medida`, `ubicacion`, `fecha_entrada`, `observaciones`, `Id_usuario`) VALUES
(1, 1, 1000, 10000.00, 'unitario', ' Bogota', '2024-11-03', 'nada', 112),
(2, 2, 500, 100.00, 'millares', 'Medellin', '2024-11-03', 'nada', 113),
(3, 2, 27, 1000.00, 'unitario', ' Bogota', '2024-11-04', 'nada', 112);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_salida`
--

CREATE TABLE `inventario_salida` (
  `id_salida` int(11) NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `usuario_registro` int(11) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `stock`, `fecha_creacion`) VALUES
(1, 'Tuberiasss', '3/8', 54000.00, 21, '2024-10-30'),
(2, 'Tornillo', '3J', 321100.00, 10, '2024-10-29'),
(3, 'Colchonetas', 'ssssss', 234444.00, 23, '2024-10-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(255) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `direccion`, `telefono`, `email`) VALUES
(1, 'Juan Gimenez', 'calle 1234 # 3', '1112223344', 'juan@gmail.com'),
(2, 'camilo', 'Calle136a#112a13', '3183893999', 'garciajulian1002@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_computadores`
--

CREATE TABLE `t_computadores` (
  `Id_computador` int(11) NOT NULL,
  `Tipo` enum('Laptop','Desktop') NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `Modelo` varchar(100) NOT NULL,
  `Serial` varchar(100) NOT NULL,
  `PlacaInventario` varchar(100) NOT NULL,
  `Id_area` int(50) DEFAULT NULL,
  `CheckPc` tinyint(1) NOT NULL DEFAULT 1,
  `Hardware` tinyint(1) NOT NULL DEFAULT 1,
  `Software` tinyint(1) NOT NULL DEFAULT 1,
  `Observaciones` varchar(500) DEFAULT NULL,
  `Estado_PC` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_computadores`
--

INSERT INTO `t_computadores` (`Id_computador`, `Tipo`, `Marca`, `Modelo`, `Serial`, `PlacaInventario`, `Id_area`, `CheckPc`, `Hardware`, `Software`, `Observaciones`, `Estado_PC`) VALUES
(351, 'Laptop', 'Mac', 'pro 2017', '1000', '987654321', 1, 1, 1, 1, 'nada', 1);

--
-- Disparadores `t_computadores`
--
DELIMITER $$
CREATE TRIGGER `observacionComputador` AFTER UPDATE ON `t_computadores` FOR EACH ROW BEGIN
    DECLARE nuevaObservacion VARCHAR(500);
    DECLARE nombreAmbiente VARCHAR(100);
    SELECT Nombre INTO nombreAmbiente FROM t_ambientes WHERE Id_ambiente = NEW.Id_ambiente;
    IF (NEW.Observaciones IS NOT NULL AND (OLD.Observaciones != NEW.Observaciones OR OLD.Observaciones is NULL)) THEN
        SET nuevaObservacion = CONCAT('En el ', nombreAmbiente,'; El computador con número de serie ', NEW.Serial, ' y Placa de Inventario ', NEW.PlacaInventario, ': ', NEW.Observaciones);
        INSERT INTO t_reportes (FechaHora, Id_usuario, Id_ambiente, Observaciones)
        VALUES (NOW(), NULL, NEW.Id_ambiente, nuevaObservacion);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_reportes`
--

CREATE TABLE `t_reportes` (
  `Id_reporte` int(4) NOT NULL,
  `FechaHora` datetime DEFAULT NULL,
  `Id_usuario` int(11) DEFAULT NULL,
  `Id_area` int(2) DEFAULT NULL,
  `Estado` varchar(1) DEFAULT NULL,
  `Estado_Reporte` tinyint(1) NOT NULL DEFAULT 0,
  `Fecha_Solucion` datetime DEFAULT NULL,
  `Observaciones` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_reportes`
--

INSERT INTO `t_reportes` (`Id_reporte`, `FechaHora`, `Id_usuario`, `Id_area`, `Estado`, `Estado_Reporte`, `Fecha_Solucion`, `Observaciones`) VALUES
(28, '2024-10-28 00:33:18', 107, 1, '2', 0, NULL, '1000: dañao'),
(29, '2024-10-28 01:19:08', 107, 1, '2', 0, NULL, ''),
(30, '2024-10-28 01:19:57', 107, 1, '2', 0, NULL, '1000: pollo'),
(31, '2024-10-28 01:20:08', 107, 1, '2', 0, NULL, '1000: mas pollo'),
(32, '2024-10-28 01:20:41', 107, 1, '2', 0, NULL, ''),
(33, '2024-10-28 01:20:44', 107, 1, '2', 0, NULL, ''),
(34, '2024-10-28 01:20:45', 107, 1, '2', 0, NULL, ''),
(35, '2024-10-28 01:20:46', 112, 1, '2', 0, NULL, ''),
(36, '2024-10-31 21:47:51', 112, 10, '2', 0, NULL, 'nada'),
(79, '2024-11-02 00:31:29', 112, 11, '2', 0, '2024-11-09 00:31:29', 'nsadoihfao'),
(85, '2024-11-03 06:08:41', 112, 3, '2', 0, '2024-11-03 00:08:00', '1231231fedvdsc'),
(86, '2024-11-03 06:34:18', 112, 1, '2', 0, '2024-11-03 00:34:00', 'nada que repprtar '),
(87, '2024-11-03 07:04:53', 113, 3, '2', 0, '2024-11-03 01:04:00', 'la b¡vida'),
(88, '2024-11-03 07:21:55', 113, 8, '2', 0, '2024-11-03 01:21:00', 'nadajsfansf '),
(89, '2024-11-03 07:29:32', 115, 2, '2', 0, '2024-11-03 01:29:00', 'se necesitan tubo de media quedan pocas cantidades'),
(90, '2024-11-03 07:36:05', 115, 6, '2', 0, '2024-11-03 01:35:00', 'prueba 1'),
(91, '2024-11-03 07:36:30', 115, 13, '2', 0, '2024-11-03 01:36:00', 'prueba 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Clave` varchar(255) DEFAULT NULL,
  `Rol` enum('Administrador','Encargado') NOT NULL,
  `Especialidad` varchar(100) DEFAULT NULL,
  `Estado` varchar(255) NOT NULL DEFAULT 'Habilitado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`Id_usuario`, `Nombres`, `Apellidos`, `Correo`, `Clave`, `Rol`, `Especialidad`, `Estado`) VALUES
(106, 'julian', 'Garcia', 'diaz@gmail.com', '5949', 'Administrador', NULL, 'Habilitado'),
(107, 'camilo', 'Guzman', 'pepe@gamil.com', '9188', 'Encargado', NULL, 'Habilitado'),
(108, 'DAmian', 'gomez', 'd@gmail.com', '3646', 'Administrador', NULL, 'Habilitado'),
(110, 'jose', 'dqddd', 'zxs@gmail.com', '1184', 'Administrador', NULL, 'Habilitado'),
(111, 'Dianuchis', 'Sachez', 'sanchez@gmail.com', '0573', 'Administrador', NULL, 'Habilitado'),
(112, 'diana', 'sanchez', 'sa@gmail.com', '1233', 'Encargado', NULL, 'Habilitado'),
(113, 'luna', 'g', 'lg@.com', '3735', 'Encargado', NULL, 'Habilitado'),
(114, 'bob', 's', 'bob@vf.com', '2680', 'Administrador', NULL, 'Habilitado'),
(115, 'danilo', 'garzon', 'da@.com', '4418', 'Encargado', NULL, 'Habilitado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `AreaTrabajo`
--
ALTER TABLE `AreaTrabajo`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_factura` (`id_factura`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `inventario_entrada`
--
ALTER TABLE `inventario_entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `proveedor_id` (`proveedor_id`),
  ADD KEY `fk_usuario_modificacion` (`Id_usuario`);

--
-- Indices de la tabla `inventario_salida`
--
ALTER TABLE `inventario_salida`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `usuario_registro` (`usuario_registro`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `t_computadores`
--
ALTER TABLE `t_computadores`
  ADD PRIMARY KEY (`Id_computador`);

--
-- Indices de la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
  ADD PRIMARY KEY (`Id_reporte`),
  ADD KEY `Id_usuario` (`Id_usuario`),
  ADD KEY `id_area` (`Id_area`) USING BTREE;

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `AreaTrabajo`
--
ALTER TABLE `AreaTrabajo`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_entrada`
--
ALTER TABLE `inventario_entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inventario_salida`
--
ALTER TABLE `inventario_salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_computadores`
--
ALTER TABLE `t_computadores`
  MODIFY `Id_computador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- AUTO_INCREMENT de la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
  MODIFY `Id_reporte` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD CONSTRAINT `detalles_factura_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`id`),
  ADD CONSTRAINT `detalles_factura_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `inventario_entrada`
--
ALTER TABLE `inventario_entrada`
  ADD CONSTRAINT `fk_usuario_modificacion` FOREIGN KEY (`Id_usuario`) REFERENCES `t_usuarios` (`Id_usuario`),
  ADD CONSTRAINT `inventario_entrada_ibfk_1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `inventario_salida`
--
ALTER TABLE `inventario_salida`
  ADD CONSTRAINT `inventario_salida_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `inventario_salida_ibfk_2` FOREIGN KEY (`usuario_registro`) REFERENCES `t_usuarios` (`Id_usuario`);

--
-- Filtros para la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
  ADD CONSTRAINT `t_reportes_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `t_usuarios` (`Id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
