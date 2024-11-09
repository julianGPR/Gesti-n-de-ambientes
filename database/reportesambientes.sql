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
-- Disparadores `t_sillas`
--
DELIMITER $$
CREATE TRIGGER `actualizaSilla` AFTER UPDATE ON `t_sillas` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Sillas = (
        SELECT COUNT(*)
        FROM t_sillas AS t
        WHERE a.Id_ambiente = t.Id_ambiente);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eliminaSilla` AFTER DELETE ON `t_sillas` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Sillas = (
    SELECT COUNT(*)
    FROM t_sillas AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertaSilla` AFTER INSERT ON `t_sillas` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Sillas = (
    SELECT COUNT(*)
    FROM t_sillas AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `observacionSilla` AFTER UPDATE ON `t_sillas` FOR EACH ROW BEGIN
    DECLARE nuevaObservacion VARCHAR(500);
    DECLARE nombreAmbiente VARCHAR(100);
    
    IF (NEW.Observaciones IS NOT NULL AND (OLD.Observaciones != NEW.Observaciones OR OLD.Observaciones is NULL)) THEN
        SELECT Nombre INTO nombreAmbiente FROM t_ambientes WHERE Id_ambiente = NEW.Id_ambiente;
        SET nuevaObservacion = CONCAT('En el ', nombreAmbiente,'; La Silla con Placa de Inventario ', NEW.PlacaInventario, ': ', NEW.Observaciones);
        INSERT INTO t_reportes (FechaHora, Id_usuario, Id_ambiente, Observaciones)
        VALUES (NOW(), NULL, NEW.Id_ambiente, nuevaObservacion);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tableros`
--

CREATE TABLE `t_tableros` (
  `Id_tablero` int(50) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `PlacaInventario` varchar(100) NOT NULL,
  `Id_ambiente` int(50) DEFAULT NULL,
  `CheckTablero` tinyint(1) NOT NULL DEFAULT 1,
  `Observaciones` varchar(500) DEFAULT NULL,
  `Estado_Tablero` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `t_tableros`
--
DELIMITER $$
CREATE TRIGGER `actualizaTablero` AFTER UPDATE ON `t_tableros` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Tableros = (
    SELECT COUNT(*)
    FROM t_tableros AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eliminaTablero` AFTER DELETE ON `t_tableros` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Tableros = (
    SELECT COUNT(*)
    FROM t_tableros AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertaTablero` AFTER INSERT ON `t_tableros` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Tableros = (
    SELECT COUNT(*)
    FROM t_tableros AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `observacionTablero` AFTER UPDATE ON `t_tableros` FOR EACH ROW BEGIN
    DECLARE nuevaObservacion VARCHAR(500);
    DECLARE nombreAmbiente VARCHAR(100);
    SELECT Nombre INTO nombreAmbiente FROM t_ambientes WHERE Id_ambiente = NEW.Id_ambiente;
    IF (NEW.Observaciones IS NOT NULL AND (OLD.Observaciones != NEW.Observaciones OR OLD.Observaciones is NULL)) THEN
        SET nuevaObservacion = CONCAT('En el ', nombreAmbiente,'; El Tablero con Placa de Inventario ', NEW.PlacaInventario, ': ', NEW.Observaciones);
        INSERT INTO t_reportes (FechaHora, Id_usuario, Id_ambiente, Observaciones)
        VALUES (NOW(), NULL, NEW.Id_ambiente, nuevaObservacion);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_televisores`
--

CREATE TABLE `t_televisores` (
  `Id_televisor` int(50) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `Modelo` varchar(100) NOT NULL,
  `Serial` varchar(100) NOT NULL,
  `PlacaInventario` varchar(100) NOT NULL,
  `Id_ambiente` int(50) DEFAULT NULL,
  `CheckTv` tinyint(1) NOT NULL DEFAULT 1,
  `Observaciones` varchar(500) DEFAULT NULL,
  `Estado_TV` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `t_televisores`
--
DELIMITER $$
CREATE TRIGGER `actualizaTelevisor` AFTER UPDATE ON `t_televisores` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Tvs = (
    SELECT COUNT(*)
    FROM t_televisores AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eliminaTelevisor` AFTER DELETE ON `t_televisores` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Tvs = (
    SELECT COUNT(*)
    FROM t_televisores AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertaTelevisor` AFTER INSERT ON `t_televisores` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Tvs = (
    SELECT COUNT(*)
    FROM t_televisores AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `observacionTelevisor` AFTER UPDATE ON `t_televisores` FOR EACH ROW BEGIN
    DECLARE nuevaObservacion VARCHAR(500);
    DECLARE nombreAmbiente VARCHAR(100);
    SELECT Nombre INTO nombreAmbiente FROM t_ambientes WHERE Id_ambiente = NEW.Id_ambiente;
    IF (NEW.Observaciones IS NOT NULL AND (OLD.Observaciones != NEW.Observaciones OR OLD.Observaciones is NULL)) THEN
        SET nuevaObservacion = CONCAT('En el ', nombreAmbiente,'; El Televisor con Número de Serie ', NEW.Serial, ' y Placa de Inventario ', NEW.PlacaInventario, ': ', NEW.Observaciones);
        INSERT INTO t_reportes (FechaHora, Id_usuario, Id_ambiente, Observaciones)
        VALUES (NOW(), NULL, NEW.Id_ambiente, nuevaObservacion);
    END IF;
END
$$
DELIMITER ;

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
  `Rol` enum('Administrador','Instructor','Encargado') NOT NULL,
  `Especialidad` varchar(100) DEFAULT NULL,
  `Estado` varchar(255) NOT NULL DEFAULT 'Habilitado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`Id_usuario`, `Nombres`, `Apellidos`, `Correo`, `Clave`, `Rol`, `Especialidad`, `Estado`) VALUES
(1, 'ALVARO', 'BUSTOS JEREZ', 'abustosj@sena.edu.co', '4720', 'Instructor', NULL, 'Habilitado'),
(2, 'CARLOS ANDRES', 'INFANTE NIÑO', 'cinfante@sena.edu.co', '8877', 'Instructor', NULL, 'Habilitado'),
(3, 'DEIVYS GUILLERMO', 'MORALES URIBE', 'dmorales@sena.edu.co', '3652', 'Instructor', NULL, 'Habilitado'),
(4, 'EDGAR AURELIO', 'GELVES ALBARRACIN', 'egelvesa@sena.edu.co', '2017', 'Administrador', NULL, 'Habilitado'),
(5, 'EDGAR', 'MORALES CORTES', 'emoralesc@sena.edu.co', '1901', 'Encargado', NULL, 'Habilitado'),
(6, 'EDGAR', 'RAMOS PERILLA', 'edramosp@sena.edu.co', '9064', 'Instructor', NULL, 'Habilitado'),
(7, 'FRAN EDWARD', 'PEREZ ORTIZ', 'frperezo@sena.edu.co', '7670', 'Instructor', NULL, 'Habilitado'),
(8, 'GABRIEL RAMIRO', 'DELGADO CAVIATIVA', 'delgadoc@sena.edu.co', '8406', 'Instructor', NULL, 'Habilitado'),
(9, 'GLORIA STELLA', 'MORA GUTIERREZ', 'gmora@sena.edu.co', '7153', 'Instructor', NULL, 'Habilitado'),
(10, 'HUGO ALEXANDER', 'MEDINA ULLOA', 'hmedinau@sena.edu.co', '3346', 'Instructor', NULL, 'Habilitado'),
(11, 'IVAN', 'MARTINEZ MORA', 'imartinezm@sena.edu.co', '1399', 'Instructor', NULL, 'Habilitado'),
(12, 'IVAN RAMIRO', 'RODRIGUEZ CAMACHO', 'irrodriguez@sena.edu.co', '2758', 'Instructor', NULL, 'Habilitado'),
(13, 'JHON JAIRO', 'RODRIGUEZ TORRES', 'jjrodriguezt@sena.edu.co', '8950', 'Instructor', NULL, 'Habilitado'),
(14, 'JOSÉ MANUEL', 'PERILLA', 'jperillar@sena.edu.co', '9192', 'Instructor', NULL, 'Habilitado'),
(15, 'JULIAN CAMILO', 'CELIS FISCAL', 'jccelis@sena.edu.co', '3165', 'Instructor', NULL, 'Habilitado'),
(16, 'JULIO GREGORIO', 'BLANCO BELTRAN', 'jublancob@sena.edu.co', '9505', 'Instructor', NULL, 'Habilitado'),
(17, 'LINA MARCELA', 'FLOREZ BOTERO', 'lflorezb@sena.edu.co', '2958', 'Instructor', NULL, 'Habilitado'),
(18, 'LUIS ANTONIO', 'MORENO', 'lamorenom@sena.edu.co', '8078', 'Instructor', NULL, 'Habilitado'),
(19, 'LUIS HERNANDO', 'PRIETO OLIVARES', 'lhprieto@sena.edu.co', '1659', 'Instructor', NULL, 'Habilitado'),
(20, 'MARIA CAROLINA', 'MARTINEZ REYES', 'mcmartinezr@sena.edu.co', '6440', 'Instructor', NULL, 'Habilitado'),
(21, 'MIGUEL ANTONIO', 'MORALES HIGUERA', 'mamoralesh@sena.edu.co', '5994', 'Instructor', NULL, 'Habilitado'),
(22, 'NANCY CONSTANZA', 'ROMERO', 'ncromero@sena.edu.co', '4048', 'Instructor', NULL, 'Habilitado'),
(23, 'NELSON IGNACIO', 'CORREA DIAZ', 'ncorread@sena.edu.co', '7616', 'Instructor', NULL, 'Habilitado'),
(24, 'ORLANDO IGNACIO', 'MORALES MORALES', 'oimoralesm@sena.edu.co', '5668', 'Instructor', NULL, 'Habilitado'),
(25, 'OSCAR RICARDO', 'RIVEROS AGUIRRE', 'oriverosa@sena.edu.co', '3723', 'Instructor', NULL, 'Habilitado'),
(26, 'OSWALDO ENRIQUE', 'VERGARA PEREZ', 'oevergarap@sena.edu.co', '4633', 'Instructor', NULL, 'Habilitado'),
(27, 'PEDRO ELADIO', 'GARCIA BENAVIDES', 'pegarcia@sena.edu.co', '9103', 'Instructor', NULL, 'Habilitado'),
(28, 'SANDRA VIANEY', 'VEGA VEGA', 'svegav@sena.edu.co', '9288', 'Instructor', NULL, 'Habilitado'),
(29, 'SANDRA YANNETH', 'RODRIGUEZ RODRIGUEZ', 'syrodriguezr@sena.edu.co', '9096', 'Instructor', NULL, 'Habilitado'),
(30, 'SAÚL', 'SANTAMARÍA GUTIÉRREZ', 'ssantamariag@sena.edu.co', '9196', 'Instructor', NULL, 'Habilitado'),
(31, 'WILLIAM DAVID', 'VARGAS', 'wvargasp@sena.edu.co', '3569', 'Instructor', NULL, 'Habilitado'),
(32, 'ABRAHAM JOSE', 'DE LA BARRERA GUTIERREZ', 'jadelabarrera@sena.edu.co', '5533', 'Instructor', NULL, 'Habilitado'),
(33, 'ADRIAN ORLANDO', 'CLAVIJO ROMERO', 'aoclavijo@sena.edu.co', '8356', 'Instructor', NULL, 'Habilitado'),
(34, 'ALBA ISABEL', 'LOPEZ RUBIANO', 'ailopez@sena.edu.co', '8482', 'Instructor', NULL, 'Habilitado'),
(35, 'ALEX ALBERTO', 'ALZATE JAIMES', 'aalzatej@sena.edu.co', '8702', 'Instructor', NULL, 'Habilitado'),
(36, 'AMILCAR', 'PALACIO MOSQUERA', 'apalacios@sena.edu.co', '9462', 'Instructor', NULL, 'Habilitado'),
(37, 'ANDRÉS EDUARDO', 'CHÁVEZ GUARDO', 'aechavez@sena.edu.co', '2000', 'Instructor', NULL, 'Habilitado'),
(38, 'ANGÉLICA MARÍA', 'TRIANA GUARNIZO', 'atrianag@sena.edu.co', '1598', 'Instructor', NULL, 'Habilitado'),
(39, 'ASTRID', 'SEGURA', 'astrid.segura@sena.edu.co', '4092', 'Instructor', NULL, 'Habilitado'),
(40, 'BLANCA ESTRELLA', 'MENDIETA BAUTISTA', 'blmendietaes@sena.edu.co', '5052', 'Instructor', NULL, 'Habilitado'),
(41, 'CARLOS ANDRES', 'ECHE LOPEZ', 'cechel@sena.edu.co', '8617', 'Instructor', NULL, 'Habilitado'),
(42, 'CARLOS HUMBERTO', 'OLIVELLA ZULETA', 'cholivella@sena.edu.co', '3244', 'Instructor', NULL, 'Habilitado'),
(43, 'CAROLINA', 'MENDOZA VIVAS', 'cmendozav@sena.edu.co', '6210', 'Instructor', NULL, 'Habilitado'),
(44, 'CESAR AUGUSTO', 'PEÑA MATEUS', 'capena@sena.edu.co', '4542', 'Instructor', NULL, 'Habilitado'),
(45, 'CESAR AUGUSTO', 'SUAREZ BUITRAGO', 'casuarezb@sena.edu.co', '3574', 'Instructor', NULL, 'Habilitado'),
(46, 'CLAUDIA', 'CLAUDIA BELTRAN RODRIGUEZ', 'clbeltran@sena.edu.co', '9094', 'Instructor', NULL, 'Habilitado'),
(47, 'CLAUDIA CATHERINE', 'GARZÓN ORJUELA', 'ccgarzon@sena.edu.co', '5799', 'Instructor', NULL, 'Habilitado'),
(48, 'DANIEL ALFONSO', 'ORJUELA DIAZ', 'dorjuela@sena.edu.co', '1469', 'Instructor', NULL, 'Habilitado'),
(49, 'DEIVID ENRIQUE', 'TRIVIÑO', 'dtrivinolo@sena.edu.co', '6052', 'Instructor', NULL, 'Habilitado'),
(50, 'DIANA ROCIO', 'DELGADO QUINTERO', 'drdelgado@sena.edu.co', '6243', 'Instructor', NULL, 'Habilitado'),
(51, 'DOMINIQUE DIDYME', 'DOME FUENTES', 'dddome@sena.edu.co', '7115', 'Instructor', NULL, 'Habilitado'),
(52, 'EDWIN ALEXANDER', 'DURAN GARCIA', 'eaduran@sena.edu.co', '1011', 'Instructor', NULL, 'Habilitado'),
(53, 'FABIAN RICARDO', 'MESTRE SOCARRAS', 'frmestre@sena.edu.co', '6697', 'Instructor', NULL, 'Habilitado'),
(54, 'FABIO HERNAN', 'ESPEJO COBOS', 'fespejoc@sena.edu.co', '2587', 'Instructor', NULL, 'Habilitado'),
(55, 'FERNANDO ANDRES', 'SALGUERO CRUZ', 'fsalgueroc@sena.edu.co', '4888', 'Instructor', NULL, 'Habilitado'),
(56, 'FERNELLY', 'ROJAS CHIA', 'frojasch@sena.edu.co', '5825', 'Instructor', NULL, 'Habilitado'),
(57, 'GEORGE ANTONY', 'SUARIQUE ARENAS', 'gasuarique@sena.edu.co', '3878', 'Instructor', NULL, 'Habilitado'),
(58, 'GERMAN DARIO', 'ROJAS FRANCO', 'grojas@sena.edu.co', '5966', 'Instructor', NULL, 'Habilitado'),
(59, 'GIOVANNI ESTEBAN', 'OSPINA ROJAS', 'geospinar@sena.edu.co', '6865', 'Instructor', NULL, 'Habilitado'),
(60, 'GUILLERMO', 'SANCHEZ ISAZA', 'gsanchezis@sena.edu.co', '9160', 'Instructor', NULL, 'Habilitado'),
(61, 'ISAI ANDRES', 'DOCTOR', 'itorresd@sena.edu.co', '5283', 'Instructor', NULL, 'Habilitado'),
(62, 'JAIME', 'MOGOLLON RODRIGUEZ', 'jamogollon@sena.edu.co', '4057', 'Instructor', NULL, 'Habilitado'),
(63, 'JAIME ALEJANDRO', 'GAMBA REYES', 'jagamba@sena.edu.co', '7641', 'Instructor', NULL, 'Habilitado'),
(64, 'JAIME HERNANDO', 'TORRES VASQUEZ', 'jtorresva@sena.edu.co', '3878', 'Instructor', NULL, 'Habilitado'),
(65, 'JAIRO ALBERTO', 'ROMERO GUTIERREZ', 'jromerog@sena.edu.co', '6286', 'Instructor', NULL, 'Habilitado'),
(66, 'JANNEZ MILSON', 'URREGO', 'jurregoq@sena.edu.co', '2210', 'Instructor', NULL, 'Habilitado'),
(67, 'JAVIER LEONARDO', 'CHAPARRO PESCA', 'jchaparrop@sena.edu.co', '7411', 'Instructor', NULL, 'Habilitado'),
(68, 'JAVIER ORLANDO', 'RODRIGUEZ RODRIGUEZ', 'javrodriguez@sena.edu.co', '1515', 'Instructor', NULL, 'Habilitado'),
(69, 'JESÚS ANTONIO', 'MORENO HERRERA', 'jmorenoh@sena.edu.co', '2384', 'Instructor', NULL, 'Habilitado'),
(70, 'JHON ALBERTO', 'ALTAMAR RENDON', 'jaaltamar@sena.edu.co', '4827', 'Instructor', NULL, 'Habilitado'),
(71, 'JOHN HAROLD', 'PEREZ CALDERON', 'jharoldperez@sena.edu.co', '7017', 'Instructor', NULL, 'Habilitado'),
(72, 'JOHN JAIME', 'RUIZ GUZMAN', 'jjruizg@sena.edu.co', '9735', 'Instructor', NULL, 'Habilitado'),
(73, 'JORGE LUIS', 'URIBE PARRA', 'joluribep@sena.edu.co', '1725', 'Instructor', NULL, 'Habilitado'),
(74, 'JOSE ANDRES', 'ZAMBRANO DIAZ', 'jazambrano@sena.edu.co', '3844', 'Instructor', NULL, 'Habilitado'),
(75, 'JOSE MIGUEL', 'GOMEZ HURTADO', 'jmgomezh@sena.edu.co', '3126', 'Instructor', NULL, 'Habilitado'),
(76, 'JUAN CARLOS', 'HERNÁNDEZ PRIETO', 'jchernandezp@sena.edu.co', '1651', 'Instructor', NULL, 'Habilitado'),
(77, 'JUAN JOSÉ', 'BOTELLO CASTELLANOS', 'jbotelloc@sena.edu.co', '2850', 'Instructor', NULL, 'Habilitado'),
(78, 'JULIO ROBERTO', 'GALVIS CARDOZO', 'jgalvisc@sena.edu.co', '3527', 'Instructor', NULL, 'Habilitado'),
(79, 'LEIDY MARCELA', 'MANRIQUE OBREGON', 'lmmanriqueo@sena.edu.co', '9833', 'Instructor', NULL, 'Habilitado'),
(80, 'LEONARDO', 'LASTRA SALGUERO', 'llastras@sena.edu.co', '5971', 'Instructor', NULL, 'Habilitado'),
(81, 'LIBARDO', 'GÓMEZ DÍAZ', 'lgomezd@sena.edu.co', '8851', 'Instructor', NULL, 'Habilitado'),
(82, 'LUIS ENRIQUE', 'ARIAS CHAVARRO', 'learias@sena.edu.co', '2807', 'Instructor', NULL, 'Habilitado'),
(83, 'LUIS FELIPE', 'RESTREPO  ARGUELLO', 'lfrestrepo@sena.edu.co', '9578', 'Instructor', NULL, 'Habilitado'),
(84, 'LUIS GABRIEL', 'NOREÑA TRIGOS', 'lgnorena@sena.edu.co', '4291', 'Instructor', NULL, 'Habilitado'),
(85, 'LUISA FERNANDA', 'ROSAS CARDENAS', 'lfrosas@sena.edu.co', '2863', 'Instructor', NULL, 'Habilitado'),
(86, 'LUZ MIRIAM', 'GARCIA QUIVANO', 'lmgarciaq@sena.edu.co', '8308', 'Instructor', NULL, 'Habilitado'),
(87, 'LYDA PATRICIA', 'CAICEDO MONROY', 'lpcaicedo@sena.edu.co', '5420', 'Instructor', NULL, 'Habilitado'),
(88, 'MAURICIO ANDRES', 'UMBARILA FIGUEROA', 'mumbarilaf@sena.edu.co', '2207', 'Instructor', NULL, 'Habilitado'),
(89, 'MILCON', 'MONTENEGRO GAMBA', 'mmontenegrog@sena.edu.co', '2819', 'Instructor', NULL, 'Habilitado'),
(90, 'NESTOR GUILLERMO', 'MONTAÑO GOMEZ', 'ngmontano@sena.edu.co', '9418', 'Instructor', NULL, 'Habilitado'),
(91, 'OMAR OSWALDO', 'ZAMBRANO AREVALO', 'oozambrano@sena.edu.co', '7790', 'Instructor', NULL, 'Habilitado'),
(92, 'OSCAR HELI', 'BEJARANO', 'obejarano@sena.edu.co', '7119', 'Instructor', NULL, 'Habilitado'),
(93, 'RAMON EMILIO', 'GONZALEZ RODRIGUEZ', 'regonzalezr@sena.edu.co', '9380', 'Instructor', NULL, 'Habilitado'),
(94, 'ROBINSON LEONARDO', 'PIMIENTO', 'rpimiento@sena.edu.co', '2866', 'Instructor', NULL, 'Habilitado'),
(95, 'SANDRA AYDEE', 'LOPEZ CONTOR', 'slopezc@sena.edu.co', '1887', 'Instructor', NULL, 'Habilitado'),
(96, 'VICTOR DANIEL', 'LOPEZ MUÑOZ', 'vdlpez@sena.edu.co', '2298', 'Instructor', NULL, 'Habilitado'),
(97, 'VICTOR JULIO', 'RODRIGUEZ PRADA', 'vrodriguezp@sena.edu.co', '1419', 'Instructor', NULL, 'Habilitado'),
(98, 'WASHINGTON', 'NIETO ARCE', 'wnieto@sena.edu.co', '6091', 'Instructor', NULL, 'Habilitado'),
(99, 'WILLIAM', 'MAYORGA GARZON', 'wmayorgag@sena.edu.co', '4862', 'Instructor', NULL, 'Habilitado'),
(100, 'YUDI', 'TIMANA CELIS', 'ytimanace@sena.edu.co', '6930', 'Instructor', NULL, 'Habilitado'),
(101, 'YULIETH FERNANDA', 'GUTIÉRREZ LEÓN', 'yfgutierrez@sena.edu.co', '8278', 'Instructor', NULL, 'Habilitado'),
(102, 'ALFONSO', 'VARGAS', NULL, '1799', 'Instructor', NULL, 'Habilitado'),
(103, 'JUAN DAVID', 'VASQUEZ VILLALBA', NULL, '6432', 'Instructor', NULL, 'Habilitado'),
(104, 'Juan Manuel', 'Infante Quiroga', 'juanmainqui123@gmail.com', '1211', 'Administrador', NULL, 'Habilitado'),
(105, 'julian', 'garcia', 'garciajulian1002@gmail.com', '9608', 'Administrador', NULL, 'Habilitado');

--
-- Índices para tablas volcadas
--

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
