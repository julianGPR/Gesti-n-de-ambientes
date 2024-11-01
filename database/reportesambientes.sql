-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
<<<<<<< HEAD
-- Tiempo de generación: 30-10-2024 a las 07:58:07
=======
-- Tiempo de generación: 30-06-2024 a las 03:52:22
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
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
<<<<<<< HEAD
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
(2, 'Area dobladora', 3, 'seccion 5', 'Edgar Agilar', 'Tuberia', 'dobladora', 'Inhabilitado', '2024-10-26', 'nada');

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
  `fecha_entrada` date DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `proveedor_id` int(11) DEFAULT NULL,
  `usuario_registro` int(11) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
=======
-- Estructura de tabla para la tabla `t_ambientes`
--

CREATE TABLE `t_ambientes` (
  `Id_ambiente` int(50) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Torre` enum('Oriental','Occidental') NOT NULL,
  `Especialidad` varchar(100) DEFAULT NULL,
  `Computadores` int(50) DEFAULT NULL,
  `CheckPcs` tinyint(1) NOT NULL DEFAULT 1,
  `Tvs` int(50) DEFAULT NULL,
  `CheckTvs` tinyint(1) NOT NULL DEFAULT 1,
  `Sillas` int(50) DEFAULT NULL,
  `CheckSillas` tinyint(1) NOT NULL DEFAULT 1,
  `Mesas` int(50) DEFAULT NULL,
  `CheckMesas` tinyint(1) NOT NULL DEFAULT 1,
  `Tableros` int(50) DEFAULT NULL,
  `CheckTableros` tinyint(1) NOT NULL DEFAULT 1,
  `Nineras` int(50) DEFAULT NULL,
  `CheckNineras` tinyint(1) NOT NULL DEFAULT 1,
  `CheckInfraestructura` tinyint(1) NOT NULL DEFAULT 1,
  `Estado` varchar(255) NOT NULL DEFAULT 'Habilitado',
  `Observaciones` varchar(500) DEFAULT NULL,
  `Estado_Ambiente` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_ambientes`
--

INSERT INTO `t_ambientes` (`Id_ambiente`, `Nombre`, `Torre`, `Especialidad`, `Computadores`, `CheckPcs`, `Tvs`, `CheckTvs`, `Sillas`, `CheckSillas`, `Mesas`, `CheckMesas`, `Tableros`, `CheckTableros`, `Nineras`, `CheckNineras`, `CheckInfraestructura`, `Estado`, `Observaciones`, `Estado_Ambiente`) VALUES
(1, 'Bodega', 'Occidental', NULL, 2, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, 1, 'Habilitado', NULL, NULL),
(2, 'Ambiente 104', 'Oriental', NULL, 18, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(4, 'Ambiente 114', 'Oriental', NULL, 16, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(5, 'Ambiente 115', 'Oriental', NULL, 19, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(6, 'Ambiente 116', 'Oriental', NULL, 15, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(7, 'Ambiente 119', 'Oriental', NULL, 17, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(8, 'Ambiente 122', 'Oriental', NULL, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(9, 'Ambiente 201', 'Oriental', NULL, 21, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(10, 'Ambiente 202', 'Oriental', NULL, 21, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(11, 'Ambiente 203', 'Oriental', NULL, 30, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(12, 'Ambiente 204', 'Oriental', NULL, 18, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(13, 'Ambiente Festo', 'Oriental', NULL, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(14, 'Ambiente Lego', 'Oriental', NULL, 20, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(15, 'Ambiente Órtesis', 'Oriental', NULL, 19, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(16, 'Ambiente 301', 'Occidental', NULL, 22, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(17, 'Ambiente 302', 'Occidental', NULL, 22, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(18, 'Ambiente 303', 'Occidental', NULL, 26, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(19, 'Ambiente 304', 'Occidental', NULL, 25, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(20, 'Ambiente 305', 'Occidental', NULL, 25, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', NULL, 1),
(41, 'ejemplo1', 'Oriental', NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL),
(42, 'ejemplo1', 'Oriental', NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL),
(43, 'ejemplo1', 'Oriental', NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '0', '0', NULL),
(44, 'ejemplo1', 'Oriental', NULL, NULL, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 'Habilitado', '', NULL),
(45, 'ejemplo1', 'Oriental', NULL, NULL, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', '', NULL),
(46, 'ejemplo1', 'Occidental', NULL, NULL, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 'Habilitado', '', NULL),
(47, 'ejemplo1', 'Occidental', NULL, NULL, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Habilitado', '', NULL),
(48, 'ejemplo1', 'Oriental', NULL, NULL, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 'Habilitado', '', NULL),
(49, 'Julian David Garcia Piñeros', 'Oriental', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', '', NULL),
(50, 'cdscsdcsd', 'Occidental', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', '', NULL),
(51, 'ejemplo1rweqrwqerq', 'Oriental', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', '', NULL),
(52, 'pollos', 'Oriental', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', '', NULL),
(53, 'Diego', 'Oriental', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', '', NULL),
(54, 'cqsceqqw', 'Oriental', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', '', NULL),
(55, 'cqsceqqw', 'Oriental', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', '', NULL),
(56, 'sdasdjiuoend', 'Oriental', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', '', NULL),
(57, 'sdasdas f ', 'Oriental', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', '', NULL),
(58, 'mdiashdnnnn...', 'Oriental', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', '', NULL);

--
-- Disparadores `t_ambientes`
--
DELIMITER $$
CREATE TRIGGER `borrarAmbiente` BEFORE DELETE ON `t_ambientes` FOR EACH ROW BEGIN
    DELETE FROM t_infraestructura WHERE id_ambiente = OLD.id_ambiente;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertaAmbiente` AFTER INSERT ON `t_ambientes` FOR EACH ROW BEGIN
    INSERT INTO t_infraestructura (Id_ambiente)
    VALUES
    (NEW.id_ambiente);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `observacionAmbientes` AFTER UPDATE ON `t_ambientes` FOR EACH ROW BEGIN
    DECLARE nuevaObservacion VARCHAR(500);
    IF (NEW.Observaciones IS NOT NULL AND (OLD.Observaciones != NEW.Observaciones OR OLD.Observaciones is NULL)) THEN
        SET nuevaObservacion = CONCAT('El ',NEW.Nombre, ': ', NEW.Observaciones);
        INSERT INTO t_reportes (FechaHora, Id_usuario, Id_ambiente, Observaciones)
        VALUES (NOW(), NULL, NEW.Id_ambiente, nuevaObservacion);
    END IF;
END
$$
DELIMITER ;
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06

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
<<<<<<< HEAD
  `Id_area` int(50) DEFAULT NULL,
=======
  `Id_ambiente` int(50) DEFAULT NULL,
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
  `CheckPc` tinyint(1) NOT NULL DEFAULT 1,
  `Hardware` tinyint(1) NOT NULL DEFAULT 1,
  `Software` tinyint(1) NOT NULL DEFAULT 1,
  `Observaciones` varchar(500) DEFAULT NULL,
  `Estado_PC` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_computadores`
--

<<<<<<< HEAD
INSERT INTO `t_computadores` (`Id_computador`, `Tipo`, `Marca`, `Modelo`, `Serial`, `PlacaInventario`, `Id_area`, `CheckPc`, `Hardware`, `Software`, `Observaciones`, `Estado_PC`) VALUES
(351, 'Laptop', 'Mac', 'pro 2017', '1000', '987654321', 1, 1, 1, 1, 'nada', 1);
=======
INSERT INTO `t_computadores` (`Id_computador`, `Tipo`, `Marca`, `Modelo`, `Serial`, `PlacaInventario`, `Id_ambiente`, `CheckPc`, `Hardware`, `Software`, `Observaciones`, `Estado_PC`) VALUES
(1, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MTL', '9216108660', 2, 0, 1, 1, '', 0),
(2, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493T5M', '9216108724', 18, 1, 1, 1, '', 0),
(3, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '33PYS13', '9216108838', 2, 1, 1, 1, NULL, 1),
(4, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '373WS13', '9216109087', 2, 1, 1, 1, NULL, 1),
(5, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65GWS13', '9216108934', 2, 1, 1, 1, NULL, 1),
(6, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65QWS13', '9216109069', 2, 1, 1, 1, NULL, 1),
(7, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65QZS13', '9216109066', 2, 1, 1, 1, NULL, 1),
(8, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '696ZS13', '9216109354', 2, 1, 1, 1, NULL, 1),
(9, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '69RRS13', '9216108820', 2, 1, 1, 1, NULL, 1),
(10, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '83HTS13', '9216109228', 2, 1, 1, 1, NULL, 1),
(11, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '856TS13', '9216109102', 2, 1, 1, 1, NULL, 1),
(12, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '859VS13', '9216108796', 2, 1, 1, 1, NULL, 1),
(13, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85MYS13', '9216109351', 2, 1, 1, 1, NULL, 1),
(14, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85N0T13', '9216108814', 2, 1, 1, 1, NULL, 1),
(15, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85YRS13', '9216108844', 2, 1, 1, 1, NULL, 1),
(16, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85ZXS13', '9216108829', 2, 1, 1, 1, NULL, 1),
(17, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86DYS13', '9216109042', 2, 1, 1, 1, NULL, 1),
(18, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86NTS13', '9216108994', 2, 1, 1, 1, NULL, 1),
(19, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86T0T13', '9216109111', 2, 1, 1, 1, NULL, 1),
(20, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '66MVS13', '9216108940', 3, 1, 1, 1, NULL, 1),
(21, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65QSS13', '9216109072', 3, 1, 1, 1, NULL, 1),
(22, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '857YS13', '9216109093', 3, 1, 1, 1, NULL, 1),
(23, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65NSS13', '9216109084', 4, 1, 1, 1, NULL, 1),
(24, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860K6', '9216109674', 4, 1, 1, 1, NULL, 1),
(25, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860PB', '9216109688', 4, 1, 1, 1, NULL, 1),
(26, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860N3', '9216109689', 4, 1, 1, 1, NULL, 1),
(27, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860QB', '9216109734', 4, 1, 1, 1, NULL, 1),
(28, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860P6', '9216109755', 4, 1, 1, 1, NULL, 1),
(29, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BL5', '9216109760', 4, 1, 1, 1, NULL, 1),
(30, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BHB', '9216109761', 4, 1, 1, 1, NULL, 1),
(31, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485B8X', '9216109786', 4, 1, 1, 1, NULL, 1),
(32, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BJB', '9216109787', 4, 1, 1, 1, NULL, 1),
(33, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BGL', '9216109788', 4, 1, 1, 1, NULL, 1),
(34, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BL6', '9216109791', 4, 1, 1, 1, NULL, 1),
(35, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860N7', '9216109794', 4, 1, 1, 1, NULL, 1),
(36, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BLP', '9216109798', 4, 1, 1, 1, NULL, 1),
(37, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BLN', '9216109802', 4, 1, 1, 1, NULL, 1),
(38, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860ST', '9216109853', 4, 1, 1, 1, NULL, 1),
(39, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86H1T13', '9216109330', 5, 1, 1, 1, NULL, 1),
(40, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860FP', '9216109665', 5, 1, 1, 1, NULL, 1),
(41, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860J4', '9216109667', 5, 1, 1, 1, NULL, 1),
(42, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860LB', '9216109673', 5, 1, 1, 1, NULL, 1),
(43, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860JG', '9216109676', 5, 1, 1, 1, NULL, 1),
(44, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860LW', '9216109687', 5, 1, 1, 1, NULL, 1),
(45, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BL9', '9216109745', 5, 1, 1, 1, NULL, 1),
(46, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BKW', '9216109751', 5, 1, 1, 1, NULL, 1),
(47, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BLF', '9216109757', 5, 1, 1, 1, NULL, 1),
(48, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860VQ', '9216109759', 5, 1, 1, 1, NULL, 1),
(49, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860NY', '9216109766', 5, 1, 1, 1, NULL, 1),
(50, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485B5W', '9216109785', 5, 1, 1, 1, NULL, 1),
(51, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860RN', '9216109811', 5, 1, 1, 1, NULL, 1),
(52, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860SP', '9216109819', 5, 1, 1, 1, NULL, 1),
(53, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860Q0', '9216109820', 5, 1, 1, 1, NULL, 1),
(54, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860NQ', '9216109821', 5, 1, 1, 1, NULL, 1),
(55, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860RB', '9216109825', 5, 1, 1, 1, NULL, 1),
(56, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BL1', '9216109844', 5, 1, 1, 1, NULL, 1),
(57, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BL3', '9216109845', 5, 1, 1, 1, NULL, 1),
(58, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86LVS13', '9216109258', 6, 1, 1, 1, NULL, 1),
(59, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '850SS13', '9216109294', 6, 1, 1, 1, NULL, 1),
(60, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860LN', '9216109664', 6, 1, 1, 1, NULL, 1),
(61, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94862B7', '9216109684', 6, 1, 1, 1, NULL, 1),
(62, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860JS', '9216109699', 6, 1, 1, 1, NULL, 1),
(63, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860JF', '9216109707', 6, 1, 1, 1, NULL, 1),
(64, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860JV', '9216109717', 6, 1, 1, 1, NULL, 1),
(65, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860J5', '9216109737', 6, 1, 1, 1, NULL, 1),
(66, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860JX', '9216109738', 6, 1, 1, 1, NULL, 1),
(67, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD948627Y', '9216109741', 6, 1, 1, 1, NULL, 1),
(68, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BDC', '9216109765', 6, 1, 1, 1, NULL, 1),
(69, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9486059', '9216109771', 6, 1, 1, 1, NULL, 1),
(70, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BLM', '9216109789', 6, 1, 1, 1, NULL, 1),
(71, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860RY', '9216109823', 6, 1, 1, 1, NULL, 1),
(72, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BBV', '9216109849', 6, 1, 1, 1, NULL, 1),
(73, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '33KWS13', '9216108871', 7, 1, 1, 1, NULL, 1),
(74, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '4GFWS13', '9216108913', 7, 1, 1, 1, NULL, 1),
(75, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65GVS13', '9216108928', 7, 1, 1, 1, 'dañado', 1),
(76, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '68WWS13', '9216108778', 7, 1, 1, 1, NULL, 1),
(77, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '6971T13', '9216108772', 7, 1, 1, 1, NULL, 1),
(78, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '69Q0T13', '9216108868', 7, 1, 1, 1, NULL, 1),
(79, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '84WZS13', '9216109099', 7, 1, 1, 1, NULL, 1),
(80, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '856ZS13', '9216109174', 7, 1, 1, 1, NULL, 1),
(81, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85H1T13', '9216108967', 7, 1, 1, 1, NULL, 1),
(82, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85QVS13', '9216108832', 7, 1, 1, 1, NULL, 1),
(83, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85TVS13', '9216108835', 7, 1, 1, 1, NULL, 1),
(84, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85ZYS13', '9216108856', 7, 1, 1, 1, NULL, 1),
(85, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '8612T13', '9216108847', 7, 1, 1, 1, NULL, 1),
(86, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86DXS13', '9216109039', 7, 1, 1, 1, NULL, 1),
(87, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86JZS13', '9216109054', 7, 1, 1, 1, NULL, 1),
(88, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86T1T13', '9216109114', 7, 1, 1, 1, NULL, 1),
(89, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '87F0T13', '9216108853', 7, 1, 1, 1, NULL, 1),
(90, 'Desktop', 'DELL', 'AIO OPTIPLEX 7471', '65QXS13', '9216109078', 8, 1, 1, 1, NULL, 1),
(91, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '6981T13', '9216108811', 9, 1, 1, 1, NULL, 1),
(92, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860JN', '9216109669', 9, 1, 1, 1, NULL, 1),
(93, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860JC', '9216109670', 9, 1, 1, 1, NULL, 1),
(94, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860JW', '9216109671', 9, 1, 1, 1, NULL, 1),
(95, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD948629L', '9216109679', 9, 1, 1, 1, NULL, 1),
(96, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD948629T', '9216109682', 9, 1, 1, 1, NULL, 1),
(97, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD948629H', '9216109683', 9, 1, 1, 1, NULL, 1),
(98, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860MP', '9216109724', 9, 1, 1, 1, NULL, 1),
(99, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860MX', '9216109725', 9, 1, 1, 1, NULL, 1),
(100, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860NC', '9216109729', 9, 1, 1, 1, NULL, 1),
(101, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860R2', '9216109740', 9, 1, 1, 1, NULL, 1),
(102, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94861L4', '9216109742', 9, 1, 1, 1, NULL, 1),
(103, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BJP', '9216109743', 9, 1, 1, 1, NULL, 1),
(104, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BKV', '9216109758', 9, 1, 1, 1, NULL, 1),
(105, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860PY', '9216109768', 9, 1, 1, 1, NULL, 1),
(106, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BJ5', '9216109797', 9, 1, 1, 1, NULL, 1),
(107, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BCM', '9216109805', 9, 1, 1, 1, NULL, 1),
(108, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BGR', '9216109806', 9, 1, 1, 1, NULL, 1),
(109, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860RP', '9216109818', 9, 1, 1, 1, NULL, 1),
(110, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860R5', '9216109836', 9, 1, 1, 1, NULL, 1),
(111, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BHD', '9216109839', 9, 1, 1, 1, NULL, 1),
(112, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '340ZS13', '9216108916', 10, 1, 1, 1, NULL, 1),
(113, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '354TS13', '9216108898', 10, 1, 1, 1, NULL, 1),
(114, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '4G4XS13', '9216108874', 10, 1, 1, 1, NULL, 1),
(115, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '4GFVS13', '9216108877', 10, 1, 1, 1, NULL, 1),
(116, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65KVS13', '9216108931', 10, 1, 1, 1, NULL, 1),
(117, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65SRS13', '9216109063', 10, 1, 1, 1, NULL, 1),
(118, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '698WS13', '9216109363', 10, 1, 1, 1, NULL, 1),
(119, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85N1T13', '9216108823', 10, 1, 1, 1, NULL, 1),
(120, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85QTS13', '9216108808', 10, 1, 1, 1, NULL, 1),
(121, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85TZS13', '9216108910', 10, 1, 1, 1, NULL, 1),
(122, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '860WS13', '9216108901', 10, 1, 1, 1, NULL, 1),
(123, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '8610T13', '9216108886', 10, 1, 1, 1, NULL, 1),
(124, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '869WS13', '9216109351', 10, 1, 1, 1, NULL, 1),
(125, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86FYS13', '9216109048', 10, 1, 1, 1, NULL, 1),
(126, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86GTS13', '9216109051', 10, 1, 1, 1, NULL, 1),
(127, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86GVS13', '9216109033', 10, 1, 1, 1, NULL, 1),
(128, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86NXS13', '9216109369', 10, 1, 1, 1, NULL, 1),
(129, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86QXS13', '9216109108', 10, 1, 1, 1, NULL, 1),
(130, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86RRS13', '9216109117', 10, 1, 1, 1, NULL, 1),
(131, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '872ZS13', '9216108976', 10, 1, 1, 1, NULL, 1),
(132, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '874VS13', '9216109312', 10, 1, 1, 1, NULL, 1),
(133, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65T1T13', '9216109060', 11, 1, 1, 1, NULL, 1),
(134, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '666SS13', '9216109156', 11, 1, 1, 1, NULL, 1),
(135, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '84MTS13', '9216109324', 11, 1, 1, 1, NULL, 1),
(136, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '868YS13', '9216109366', 11, 1, 1, 1, NULL, 1),
(137, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86DWS13', '9216109090', 11, 1, 1, 1, NULL, 1),
(138, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86GRS13', '9216109207', 11, 1, 1, 1, NULL, 1),
(139, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '874ZS13', '9216109261', 11, 1, 1, 1, NULL, 1),
(140, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '87D1T13', '9216109321', 11, 1, 1, 1, NULL, 1),
(141, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '87DYS13', '9216109339', 11, 1, 1, 1, NULL, 1),
(142, 'Desktop', 'DELL', 'AIO OPTIPLEX 7474', '84PTS13', '9216109105', 11, 1, 1, 1, NULL, 1),
(143, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860P9', '9216109666', 11, 1, 1, 1, NULL, 1),
(144, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD948629C', '9216109680', 11, 1, 1, 1, NULL, 1),
(145, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860L0', '9216109697', 11, 1, 1, 1, NULL, 1),
(146, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860DF', '9216109698', 11, 1, 1, 1, NULL, 1),
(147, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860K1', '9216109706', 11, 1, 1, 1, NULL, 1),
(148, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94862BQ', '9216109723', 11, 1, 1, 1, NULL, 1),
(149, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860Q7', '9216109730', 11, 1, 1, 1, NULL, 1),
(150, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860RH', '9216109731', 11, 1, 1, 1, NULL, 1),
(151, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BLG', '9216109746', 11, 1, 1, 1, NULL, 1),
(152, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BLQ', '9216109749', 11, 1, 1, 1, NULL, 1),
(153, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BKD', '9216109754', 11, 1, 1, 1, NULL, 1),
(154, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94862FT', '9216109773', 11, 1, 1, 1, NULL, 1),
(155, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860JP', '9216109779', 11, 1, 1, 1, NULL, 1),
(156, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860P4', '9216109783', 11, 1, 1, 1, NULL, 1),
(157, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BJQ', '9216109803', 11, 1, 1, 1, NULL, 1),
(158, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BL2', '9216109804', 11, 1, 1, 1, NULL, 1),
(159, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BBX', '9216109834', 11, 1, 1, 1, NULL, 1),
(160, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BJH', '9216109841', 11, 1, 1, 1, NULL, 1),
(161, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860LT', '9216109857', 11, 1, 1, 1, NULL, 1),
(162, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94862Q8', '9216109862', 11, 1, 1, 1, NULL, 1),
(163, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MC1', '9216108636', 12, 1, 1, 1, 'Dañado', 1),
(164, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MD5', '9216108640', 12, 1, 1, 1, NULL, 1),
(165, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MF9', '9216108644', 12, 1, 1, 1, NULL, 1),
(166, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MMW', '9216108652', 12, 1, 1, 1, NULL, 1),
(167, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MPD', '9216108656', 12, 1, 1, 1, NULL, 1),
(168, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MW6', '9216108668', 12, 1, 1, 1, NULL, 1),
(169, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MZF', '9216108684', 12, 1, 1, 1, NULL, 1),
(170, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MZG', '9216108688', 12, 1, 1, 1, NULL, 1),
(171, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MZR', '9216108692', 12, 1, 1, 1, NULL, 1),
(172, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493NB9', '9216108696', 12, 1, 1, 1, NULL, 1),
(173, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493ND6', '9216108704', 12, 1, 1, 1, NULL, 1),
(174, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493T32', '9216108708', 12, 1, 1, 1, NULL, 1),
(175, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493T4X', '9216108712', 12, 1, 1, 1, NULL, 1),
(176, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493T56', '9216108716', 12, 1, 1, 1, NULL, 1),
(177, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493T5B', '9216108720', 12, 1, 1, 1, NULL, 1),
(178, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493T5Q', '9216108728', 12, 1, 1, 1, NULL, 1),
(179, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493TS0', '9216108752', 12, 1, 1, 1, NULL, 1),
(180, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493TS5', '9216108756', 12, 1, 1, 1, NULL, 1),
(181, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860K3', '9216109675', 13, 1, 1, 1, NULL, 1),
(182, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD948629Z', '9216109663', 14, 1, 1, 1, NULL, 1),
(183, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94862FW', '9216109692', 14, 1, 1, 1, NULL, 1),
(184, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860LR', '9216109715', 14, 1, 1, 1, NULL, 1),
(185, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860QG', '9216109769', 14, 1, 1, 1, NULL, 1),
(186, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94858KN', '9216109808', 14, 1, 1, 1, NULL, 1),
(187, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BHM', '9216109810', 14, 1, 1, 1, NULL, 1),
(188, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860S6', '9216109824', 14, 1, 1, 1, NULL, 1),
(189, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860P0', '9216109832', 14, 1, 1, 1, NULL, 1),
(190, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BJJ', '9216109840', 14, 1, 1, 1, NULL, 1),
(191, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860S0', '9216109854', 14, 1, 1, 1, NULL, 1),
(192, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94862Q4', '9216109696', 14, 1, 1, 1, NULL, 1),
(193, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860K4', '9216109678', 14, 1, 1, 1, NULL, 1),
(194, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860KS', '9216109695', 14, 1, 1, 1, NULL, 1),
(195, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD948629B', '9216109704', 14, 1, 1, 1, NULL, 1),
(196, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860PQ', '9216109726', 14, 1, 1, 1, NULL, 1),
(197, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860L1', '9216109781', 14, 1, 1, 1, NULL, 1),
(198, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860ND', '9216109782', 14, 1, 1, 1, NULL, 1),
(199, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860MZ', '9216109784', 14, 1, 1, 1, NULL, 1),
(200, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860KP', '9216109855', 14, 1, 1, 1, NULL, 1),
(201, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94862B3', '9216109856', 14, 1, 1, 1, NULL, 1),
(202, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860LY', '9216109668', 15, 1, 1, 1, NULL, 1),
(203, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860MB', '9216109685', 15, 1, 1, 1, NULL, 1),
(204, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860LS', '9216109702', 15, 1, 1, 1, NULL, 1),
(205, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860MN', '9216109705', 15, 1, 1, 1, NULL, 1),
(206, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9486242', '9216109709', 15, 1, 1, 1, NULL, 1),
(207, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860K7', '9216109711', 15, 1, 1, 1, NULL, 1),
(208, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860JQ', '9216109713', 15, 1, 1, 1, NULL, 1),
(209, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860LK', '9216109721', 15, 1, 1, 1, NULL, 1),
(210, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', 'BCD9485BKL', '9216109762', 15, 1, 1, 1, NULL, 1),
(211, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BG8', '9216109828', 15, 1, 1, 1, NULL, 1),
(212, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860QP', '9216109833', 15, 1, 1, 1, NULL, 1),
(213, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860J9', '9216109708', 15, 1, 1, 1, NULL, 1),
(214, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860KG', '9216109722', 15, 1, 1, 1, NULL, 1),
(215, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860PG', '9216109728', 15, 1, 1, 1, NULL, 1),
(216, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9485BK4', '9216109846', 15, 1, 1, 1, NULL, 1),
(217, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860SW', '9216109777', 15, 1, 1, 1, NULL, 1),
(218, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD9486247', '9216109710', 15, 1, 1, 1, NULL, 1),
(219, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD948628L', '9216109691', 15, 1, 1, 1, NULL, 1),
(220, 'Laptop', 'HEWLETT_PACKARD', 'HP PROBOOK445R G6', '5CD94860R8', '9216109693', 15, 1, 1, 1, NULL, 1),
(221, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '33NWS13', '9216108892', 16, 1, 1, 1, NULL, 1),
(222, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '34XZS13', '9216108889', 16, 1, 1, 1, NULL, 1),
(223, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '374YS13', '9216108784', 16, 1, 1, 1, NULL, 1),
(224, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '37WZS13', '9216109204', 16, 1, 1, 1, NULL, 1),
(225, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65RYS13', '9216109057', 16, 1, 1, 1, NULL, 1),
(226, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65RZS13', '9216109081', 16, 1, 1, 1, NULL, 1),
(227, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '857ZS13', '9216109288', 16, 1, 1, 1, NULL, 1),
(228, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85XXS13', '9216108850', 16, 1, 1, 1, NULL, 1),
(229, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '860YS13', '9216108907', 16, 1, 1, 1, NULL, 1),
(230, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '8661T13', '9216109249', 16, 1, 1, 1, NULL, 1),
(231, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '8670T13', '9216108979', 16, 1, 1, 1, NULL, 1),
(232, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '8681T13', '9216109342', 16, 1, 1, 1, NULL, 1),
(233, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86KTS13', '9216109273', 16, 1, 1, 1, NULL, 1),
(234, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86P1T13', '9216109237', 16, 1, 1, 1, NULL, 1),
(235, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86PXS13', '9216109336', 16, 1, 1, 1, NULL, 1),
(236, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86RTS13', '9216109147', 16, 1, 1, 1, NULL, 1),
(237, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86TTS13', '9216109297', 16, 1, 1, 1, NULL, 1),
(238, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '878XS13', '9216108988', 16, 1, 1, 1, NULL, 1),
(239, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '87D0T13', '9216109300', 16, 1, 1, 1, NULL, 1),
(240, 'Desktop', 'DELL', 'AIO OPTIPLEX 7473', '84MXS13', '9216109333', 16, 1, 1, 1, NULL, 1),
(241, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '656SS13', '9216109138', 16, 1, 1, 1, NULL, 1),
(242, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65DYS13', '9216108943', 16, 1, 1, 1, NULL, 1),
(243, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '4GVRS13', '9216108883', 17, 1, 1, 1, NULL, 1),
(244, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '665ZS13', '9216109198', 17, 1, 1, 1, NULL, 1),
(245, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '69QXS13', '9216108859', 17, 1, 1, 1, NULL, 1),
(246, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '84PRS13', '9216109096', 17, 1, 1, 1, NULL, 1),
(247, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '8512T13', '9216109282', 17, 1, 1, 1, NULL, 1),
(248, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '858YS13', '9216109192', 17, 1, 1, 1, NULL, 1),
(249, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85PRS13', '9216108790', 17, 1, 1, 1, NULL, 1),
(250, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85TSS13', '9216108826', 17, 1, 1, 1, NULL, 1),
(251, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85YWS13', '9216108865', 17, 1, 1, 1, NULL, 1),
(252, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '867ZS13', '9216109345', 17, 1, 1, 1, NULL, 1),
(253, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '868XS13', '9216109318', 17, 1, 1, 1, NULL, 1),
(254, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '869SS13', '9216109354', 17, 1, 1, 1, NULL, 1),
(255, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '869TS13', '9216109357', 17, 1, 1, 1, NULL, 1),
(256, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '869VS13', '9216109009', 17, 1, 1, 1, NULL, 1),
(257, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86CVS13', '9216109246', 17, 1, 1, 1, NULL, 1),
(258, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86JXS13', '9216109234', 17, 1, 1, 1, NULL, 1),
(259, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86KSS13', '9216109264', 17, 1, 1, 1, NULL, 1),
(260, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86N1T13', '9216108982', 17, 1, 1, 1, NULL, 1),
(261, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86NZS13', '9216109360', 17, 1, 1, 1, NULL, 1),
(262, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86Q1T13', '9216109021', 17, 1, 1, 1, NULL, 1),
(263, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86SYS13', '9216109213', 17, 1, 1, 1, NULL, 1),
(264, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '6530T13', '9216108787', 17, 1, 1, 1, NULL, 1),
(265, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '344XS13', '9216108904', 18, 1, 1, 1, NULL, 1),
(266, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '346TS13', '9216108961', 18, 1, 1, 1, NULL, 1),
(267, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '37X0T13', '9216109168', 18, 1, 1, 1, NULL, 1),
(268, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '4G6YS13', '9216108925', 18, 1, 1, 1, NULL, 1),
(269, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '656XS13', '9216109141', 18, 1, 1, 1, NULL, 1),
(270, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65CWS13', '9216108937', 18, 1, 1, 1, NULL, 1),
(271, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65DZS13', '9216108949', 18, 1, 1, 1, NULL, 1),
(272, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65GRS13', '9216109123', 18, 1, 1, 1, NULL, 1),
(273, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '65HYS13', '9216108919', 18, 1, 1, 1, NULL, 1),
(274, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '661XS13', '9216109159', 18, 1, 1, 1, NULL, 1),
(275, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '662YS13', '9216109144', 18, 1, 1, 1, NULL, 1),
(276, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '665XS13', '9216109165', 18, 1, 1, 1, NULL, 1),
(277, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '667ZS13', '9216109162', 18, 1, 1, 1, NULL, 1),
(278, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '6961T13', '9216109171', 18, 1, 1, 1, NULL, 1),
(279, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '696WS13', '9216109177', 18, 1, 1, 1, NULL, 1),
(280, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '84MRS13', '9216109120', 18, 1, 1, 1, NULL, 1),
(281, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '850YS13', '9216109150', 18, 1, 1, 1, NULL, 1),
(282, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '866SS13', '9216109252', 18, 1, 1, 1, NULL, 1),
(283, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86B0T13', '9216109012', 18, 1, 1, 1, NULL, 1),
(284, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86MZS13', '9216108985', 18, 1, 1, 1, NULL, 1),
(285, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86QVS13', '9216108997', 18, 1, 1, 1, NULL, 1),
(286, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86R1T13', '9216109210', 18, 1, 1, 1, NULL, 1),
(287, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86VXS13', '9216109186', 18, 1, 1, 1, NULL, 1),
(288, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86VZS13', '9216109189', 18, 1, 1, 1, NULL, 1),
(289, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '8771T13', '9216109291', 18, 1, 1, 1, NULL, 1),
(290, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MHM', '9216108536', 19, 1, 1, 1, NULL, 1),
(291, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MN2', '9216108540', 19, 1, 1, 1, NULL, 1),
(292, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MV5', '9216108544', 19, 1, 1, 1, NULL, 1),
(293, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MVQ', '9216108548', 19, 1, 1, 1, NULL, 1),
(294, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MWN', '9216108552', 19, 1, 1, 1, NULL, 1),
(295, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493MY8', '9216108556', 19, 1, 1, 1, NULL, 1),
(296, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493N0L', '9216108560', 19, 1, 1, 1, NULL, 1),
(297, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493NC4', '9216108564', 19, 1, 1, 1, NULL, 1),
(298, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493NCK', '9216108568', 19, 1, 1, 1, NULL, 1),
(299, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493ND8', '9216108572', 19, 1, 1, 1, NULL, 1),
(300, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493NF8', '9216108576', 19, 1, 1, 1, NULL, 1),
(301, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493NFQ', '9216108580', 19, 1, 1, 1, NULL, 1),
(302, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493NHD', '9216108584', 19, 1, 1, 1, NULL, 1),
(303, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493T25', '9216108588', 19, 1, 1, 1, NULL, 1),
(304, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493T3Q', '9216108592', 19, 1, 1, 1, NULL, 1),
(305, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493T59', '9216108596', 19, 1, 1, 1, NULL, 1),
(306, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493T5V', '9216108600', 19, 1, 1, 1, NULL, 1),
(307, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493T6N', '9216108604', 19, 1, 1, 1, NULL, 1),
(308, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493T6X', '9216108608', 19, 1, 1, 1, NULL, 1),
(309, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493TPL', '9216108612', 19, 1, 1, 1, NULL, 1),
(310, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493TRK', '9216108616', 19, 1, 1, 1, NULL, 1),
(311, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493TSY', '9216108620', 19, 1, 1, 1, NULL, 1),
(312, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493TW8', '9216108624', 19, 1, 1, 1, NULL, 1),
(313, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9494B3J', '9216108628', 19, 1, 1, 1, NULL, 1),
(314, 'Desktop', 'HEWLETT_PACKARD', 'HP Z4 G4 WORKSTATION', 'MXL9493M9G', '9216108532', 19, 1, 1, 1, NULL, 1),
(315, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '4G4ZS13', '9216108895', 20, 1, 1, 1, NULL, 1),
(316, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '4GRSS13', '9216108880', 20, 1, 1, 1, NULL, 1),
(317, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '6551T13', '9216108922', 20, 1, 1, 1, NULL, 1),
(318, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '83HZS13', '9216109225', 20, 1, 1, 1, NULL, 1),
(319, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '84KXS13', '9216108781', 20, 1, 1, 1, NULL, 1),
(320, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '8510T13', '9216109135', 20, 1, 1, 1, NULL, 1),
(321, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85RRS13', '9216108862', 20, 1, 1, 1, NULL, 1),
(322, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86DZS13', '9216109045', 20, 1, 1, 1, NULL, 1),
(323, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86FXS13', '9216109036', 20, 1, 1, 1, NULL, 1),
(324, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '871TS13', '9216109243', 20, 1, 1, 1, NULL, 1),
(325, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '37XSS13', '9216108775', 20, 1, 1, 1, NULL, 1),
(326, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '656VS13', '9216108946', 20, 1, 1, 1, NULL, 1),
(327, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '84M1T13', '9216109153', 20, 1, 1, 1, NULL, 1),
(328, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '8581T13', '9216109309', 20, 1, 1, 1, NULL, 1),
(329, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85H0T13', '9216108958', 20, 1, 1, 1, NULL, 1),
(330, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85JWS13', '9216108964', 20, 1, 1, 1, NULL, 1),
(331, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85KYS13', '9216109018', 20, 1, 1, 1, NULL, 1),
(332, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85LVS13', '9216109327', 20, 1, 1, 1, NULL, 1),
(333, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '85LXS13', '9216108805', 20, 1, 1, 1, NULL, 1),
(334, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '8630T13', '9216109015', 20, 1, 1, 1, NULL, 1),
(335, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '869ZS13', '9216109348', 20, 1, 1, 1, NULL, 1),
(336, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86L0T13', '9216109240', 20, 1, 1, 1, NULL, 1),
(337, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '86WSS13', '9216109201', 20, 1, 1, 1, NULL, 1),
(338, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '879SS13', '9216109303', 20, 1, 1, 1, NULL, 1),
(339, 'Desktop', 'DELL', 'AIO OPTIPLEX 7470', '850WS13', '9216109285', 20, 1, 1, 1, NULL, 1),
(349, 'Desktop', 'ejemplo1', 'ejemplo1', 'ejemplo1', 'ejemplo1', 1, 0, 1, 1, '', 1),
(350, 'Laptop', 'ejemplo2', 'ejemplo2', 'ejemplo2', 'ejemplo2', 1, 0, 1, 1, '', 1);
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06

--
-- Disparadores `t_computadores`
--
DELIMITER $$
<<<<<<< HEAD
=======
CREATE TRIGGER `actualizaComputador` AFTER UPDATE ON `t_computadores` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Computadores = (
    SELECT COUNT(*)
    FROM t_computadores AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eliminaComputador` AFTER DELETE ON `t_computadores` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Computadores = (
    SELECT COUNT(*)
    FROM t_computadores AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertaComputador` AFTER INSERT ON `t_computadores` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Computadores = (
    SELECT COUNT(*)
    FROM t_computadores AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
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
<<<<<<< HEAD
=======
-- Estructura de tabla para la tabla `t_infraestructura`
--

CREATE TABLE `t_infraestructura` (
  `Id_infraestructura` int(50) NOT NULL,
  `Id_ambiente` int(50) NOT NULL,
  `CheckPisos` tinyint(1) NOT NULL DEFAULT 1,
  `CheckTechos` tinyint(1) NOT NULL DEFAULT 1,
  `CheckParedes` tinyint(1) NOT NULL DEFAULT 1,
  `CheckVentaneria` tinyint(1) NOT NULL DEFAULT 1,
  `CheckLuz` tinyint(1) NOT NULL DEFAULT 1,
  `Observaciones` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_infraestructura`
--

INSERT INTO `t_infraestructura` (`Id_infraestructura`, `Id_ambiente`, `CheckPisos`, `CheckTechos`, `CheckParedes`, `CheckVentaneria`, `CheckLuz`, `Observaciones`) VALUES
(2, 2, 1, 1, 1, 1, 1, NULL),
(4, 4, 1, 1, 1, 1, 1, NULL),
(5, 5, 1, 1, 1, 1, 1, NULL),
(6, 6, 1, 1, 1, 1, 1, NULL),
(7, 7, 1, 1, 1, 1, 1, NULL),
(8, 8, 1, 1, 1, 1, 1, NULL),
(9, 9, 1, 1, 1, 1, 1, NULL),
(10, 10, 1, 1, 1, 1, 1, NULL),
(11, 11, 1, 1, 1, 1, 1, NULL),
(12, 12, 1, 1, 1, 1, 1, NULL),
(13, 13, 1, 1, 1, 1, 1, NULL),
(14, 14, 1, 1, 1, 1, 1, NULL),
(15, 15, 1, 1, 1, 1, 1, NULL),
(16, 16, 1, 1, 1, 1, 1, NULL),
(17, 17, 1, 1, 1, 1, 1, NULL),
(18, 18, 1, 1, 1, 1, 1, NULL),
(19, 19, 1, 1, 1, 1, 1, NULL),
(20, 20, 1, 1, 1, 1, 1, NULL),
(0, 1, 1, 1, 1, 1, 1, NULL),
(0, 41, 1, 1, 1, 1, 1, NULL),
(0, 42, 1, 1, 1, 1, 1, NULL),
(0, 43, 1, 1, 1, 1, 1, NULL),
(0, 44, 1, 1, 1, 1, 1, NULL),
(0, 45, 1, 1, 1, 1, 1, NULL),
(0, 46, 1, 1, 1, 1, 1, NULL),
(0, 47, 1, 1, 1, 1, 1, NULL),
(0, 48, 1, 1, 1, 1, 1, NULL),
(0, 49, 1, 1, 1, 1, 1, NULL),
(0, 50, 1, 1, 1, 1, 1, NULL),
(0, 51, 1, 1, 1, 1, 1, NULL),
(0, 52, 1, 1, 1, 1, 1, NULL),
(0, 53, 1, 1, 1, 1, 1, NULL),
(0, 54, 1, 1, 1, 1, 1, NULL),
(0, 55, 1, 1, 1, 1, 1, NULL),
(0, 56, 1, 1, 1, 1, 1, NULL),
(0, 57, 1, 1, 1, 1, 1, NULL),
(0, 58, 1, 1, 1, 1, 1, NULL);

--
-- Disparadores `t_infraestructura`
--
DELIMITER $$
CREATE TRIGGER `observacionInfraestructura` AFTER UPDATE ON `t_infraestructura` FOR EACH ROW BEGIN
    DECLARE nuevaObservacion VARCHAR(500);
    DECLARE nombreAmbiente VARCHAR(100);
    SELECT Nombre INTO nombreAmbiente FROM t_ambientes WHERE Id_ambiente = NEW.Id_ambiente;
    IF (NEW.Observaciones IS NOT NULL AND (OLD.Observaciones != NEW.Observaciones OR OLD.Observaciones is NULL)) THEN
        SET nuevaObservacion = CONCAT('La Infraestructura del ', nombreAmbiente, ': ', NEW.Observaciones);
        INSERT INTO t_reportes (FechaHora, Id_usuario, Id_ambiente, Observaciones)
        VALUES (NOW(), NULL, NEW.Id_ambiente, nuevaObservacion);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_mesas`
--

CREATE TABLE `t_mesas` (
  `Id_mesa` int(50) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `PlacaInventario` varchar(100) NOT NULL,
  `Id_ambiente` int(50) DEFAULT NULL,
  `CheckMesa` tinyint(1) NOT NULL DEFAULT 1,
  `Observaciones` varchar(500) DEFAULT NULL,
  `Estado_Mesa` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `t_mesas`
--
DELIMITER $$
CREATE TRIGGER `actualizaMesa` AFTER UPDATE ON `t_mesas` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Mesas = (
    SELECT COUNT(*)
    FROM t_mesas AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eliminaMesa` AFTER DELETE ON `t_mesas` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Mesas = (
    SELECT COUNT(*)
    FROM t_mesas AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertaMesa` AFTER INSERT ON `t_mesas` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Mesas = (
    SELECT COUNT(*)
    FROM t_mesas AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `observacionMesa` AFTER UPDATE ON `t_mesas` FOR EACH ROW BEGIN
    DECLARE nuevaObservacion VARCHAR(500);
    DECLARE nombreAmbiente VARCHAR(100);
    SELECT Nombre INTO nombreAmbiente FROM t_ambientes WHERE Id_ambiente = NEW.Id_ambiente;
    IF (NEW.Observaciones IS NOT NULL AND (OLD.Observaciones != NEW.Observaciones OR OLD.Observaciones is NULL)) THEN
        SET nuevaObservacion = CONCAT('En el ', nombreAmbiente,'; La Mesa con Placa de Inventario ', NEW.PlacaInventario, ': ', NEW.Observaciones);
        INSERT INTO t_reportes (FechaHora, Id_usuario, Id_ambiente, Observaciones)
        VALUES (NOW(), NULL, NEW.Id_ambiente, nuevaObservacion);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_nineras`
--

CREATE TABLE `t_nineras` (
  `Id_ninera` int(50) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `PlacaInventario` varchar(100) NOT NULL,
  `Id_ambiente` int(50) DEFAULT NULL,
  `CheckNinera` tinyint(1) NOT NULL DEFAULT 1,
  `Observaciones` varchar(500) DEFAULT NULL,
  `Estado_Ninera` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `t_nineras`
--
DELIMITER $$
CREATE TRIGGER `actualizaNinera` AFTER UPDATE ON `t_nineras` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Nineras = (
    SELECT COUNT(*)
    FROM t_nineras AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eliminaNinera` AFTER DELETE ON `t_nineras` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Nineras = (
    SELECT COUNT(*)
    FROM t_nineras AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertaNinera` AFTER INSERT ON `t_nineras` FOR EACH ROW BEGIN
    UPDATE t_ambientes AS a
    SET a.Nineras = (
    SELECT COUNT(*)
    FROM t_nineras AS t
    WHERE a.Id_ambiente = t.Id_ambiente
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `observacionNinera` AFTER UPDATE ON `t_nineras` FOR EACH ROW BEGIN
    DECLARE nuevaObservacion VARCHAR(500);
    DECLARE nombreAmbiente VARCHAR(100);
    SELECT Nombre INTO nombreAmbiente FROM t_ambientes WHERE Id_ambiente = NEW.Id_ambiente;
    IF (NEW.Observaciones IS NOT NULL AND (OLD.Observaciones != NEW.Observaciones OR OLD.Observaciones is NULL)) THEN
        SET nuevaObservacion = CONCAT('En el ', nombreAmbiente,'; La Niñera con Placa de Inventario ', NEW.PlacaInventario, ': ', NEW.Observaciones);
        INSERT INTO t_reportes (FechaHora, Id_usuario, Id_ambiente, Observaciones)
        VALUES (NOW(), NULL, NEW.Id_ambiente, nuevaObservacion);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
-- Estructura de tabla para la tabla `t_reportes`
--

CREATE TABLE `t_reportes` (
  `Id_reporte` int(4) NOT NULL,
  `FechaHora` datetime DEFAULT NULL,
  `Id_usuario` int(2) DEFAULT NULL,
<<<<<<< HEAD
  `Id_area` int(2) DEFAULT NULL,
=======
  `Id_ambiente` int(2) DEFAULT NULL,
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
  `Estado` varchar(1) DEFAULT NULL,
  `Estado_Reporte` tinyint(1) NOT NULL DEFAULT 0,
  `Fecha_Solucion` datetime DEFAULT NULL,
  `Observaciones` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_reportes`
--

<<<<<<< HEAD
INSERT INTO `t_reportes` (`Id_reporte`, `FechaHora`, `Id_usuario`, `Id_area`, `Estado`, `Estado_Reporte`, `Fecha_Solucion`, `Observaciones`) VALUES
(28, '2024-10-28 00:33:18', 107, 1, '2', 0, NULL, '1000: dañao'),
(29, '2024-10-28 01:19:08', 107, 1, '2', 0, NULL, ''),
(30, '2024-10-28 01:19:57', 107, 1, '2', 0, NULL, '1000: pollo'),
(31, '2024-10-28 01:20:08', 107, 1, '2', 0, NULL, '1000: mas pollo'),
(32, '2024-10-28 01:20:41', 107, 1, '2', 0, NULL, ''),
(33, '2024-10-28 01:20:44', 107, 1, '2', 0, NULL, ''),
(34, '2024-10-28 01:20:45', 107, 1, '2', 0, NULL, ''),
(35, '2024-10-28 01:20:46', 107, 1, '2', 0, NULL, '');
=======
INSERT INTO `t_reportes` (`Id_reporte`, `FechaHora`, `Id_usuario`, `Id_ambiente`, `Estado`, `Estado_Reporte`, `Fecha_Solucion`, `Observaciones`) VALUES
(17, '2024-05-27 11:27:36', 34, 15, '2', 1, '2024-05-31 01:24:04', '5CD94860LK: Computador Extraviado.'),
(18, '2024-05-27 12:21:35', 42, 15, '2', 0, NULL, '5CD94860LY: Perdido'),
(19, '2024-02-29 19:11:43', 1, 2, '0', 1, '2024-03-01 00:00:00', NULL),
(20, '2024-03-01 19:11:43', 1, 2, '0', 1, '2024-03-02 00:00:00', NULL),
(21, '2024-06-10 11:41:35', 2, 12, '2', 0, NULL, 'MXL9493MC1: Dañado'),
(22, '2024-06-10 11:41:35', NULL, 12, NULL, 0, NULL, 'En el Ambiente 204; El computador con número de serie MXL9493MC1 y Placa de Inventario 9216108636: Dañado'),
(23, '2024-06-10 12:08:26', 5, 7, '2', 0, NULL, '65GVS13: dañado'),
(24, '2024-06-10 12:08:26', NULL, 7, NULL, 0, NULL, 'En el Ambiente 119; El computador con número de serie 65GVS13 y Placa de Inventario 9216108928: dañado'),
(25, '2024-06-19 20:20:00', NULL, 2, NULL, 0, NULL, 'En el Ambiente 104; El computador con número de serie MXL9493MTL y Placa de Inventario 9216108660: ');

--
-- Disparadores `t_reportes`
--
DELIMITER $$
CREATE TRIGGER `fecha_solucion` BEFORE UPDATE ON `t_reportes` FOR EACH ROW BEGIN
    -- Verifica si el campo 'Estado_Reporte' está siendo actualizado
    IF NEW.Estado_Reporte <> OLD.Estado_Reporte THEN
        -- Actualiza el campo 'Fecha_Solucion' con la fecha y hora actuales
        SET NEW.Fecha_Solucion = NOW();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_sillas`
--

CREATE TABLE `t_sillas` (
  `Id_silla` int(50) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `PlacaInventario` varchar(100) NOT NULL,
  `Id_ambiente` int(50) DEFAULT NULL,
  `CheckSilla` tinyint(1) NOT NULL DEFAULT 1,
  `Observaciones` varchar(500) DEFAULT NULL,
  `Estado_Silla` tinyint(1) NOT NULL DEFAULT 1
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
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

<<<<<<< HEAD
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
=======
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
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`Id_usuario`, `Nombres`, `Apellidos`, `Correo`, `Clave`, `Rol`, `Especialidad`, `Estado`) VALUES
<<<<<<< HEAD
(106, 'julian', 'Garcia', 'diaz@gmail.com', '5949', 'Administrador', NULL, 'Habilitado'),
(107, 'camilo', 'Guzman', 'Guz@gamil.com', '9188', 'Instructor', NULL, 'Habilitado');
=======
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
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06

--
-- Índices para tablas volcadas
--

--
<<<<<<< HEAD
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
  ADD KEY `usuario_registro` (`usuario_registro`);

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
=======
-- Indices de la tabla `t_ambientes`
--
ALTER TABLE `t_ambientes`
  ADD PRIMARY KEY (`Id_ambiente`);
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06

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
<<<<<<< HEAD
  ADD KEY `id_area` (`Id_area`) USING BTREE;
=======
  ADD KEY `Id_ambiente` (`Id_ambiente`);
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
<<<<<<< HEAD
-- AUTO_INCREMENT de la tabla `AreaTrabajo`
--
ALTER TABLE `AreaTrabajo`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT;

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
=======
-- AUTO_INCREMENT de la tabla `t_ambientes`
--
ALTER TABLE `t_ambientes`
  MODIFY `Id_ambiente` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06

--
-- AUTO_INCREMENT de la tabla `t_computadores`
--
ALTER TABLE `t_computadores`
<<<<<<< HEAD
  MODIFY `Id_computador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;
=======
  MODIFY `Id_computador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06

--
-- AUTO_INCREMENT de la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
<<<<<<< HEAD
  MODIFY `Id_reporte` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
=======
  MODIFY `Id_reporte` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
<<<<<<< HEAD
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
=======
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06

--
-- Restricciones para tablas volcadas
--

--
<<<<<<< HEAD
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
  ADD CONSTRAINT `inventario_entrada_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `inventario_entrada_ibfk_2` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id_proveedor`),
  ADD CONSTRAINT `inventario_entrada_ibfk_3` FOREIGN KEY (`usuario_registro`) REFERENCES `t_usuarios` (`Id_usuario`);

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
=======
-- Filtros para la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
  ADD CONSTRAINT `t_reportes_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `t_usuarios` (`Id_usuario`),
  ADD CONSTRAINT `t_reportes_ibfk_2` FOREIGN KEY (`Id_ambiente`) REFERENCES `t_ambientes` (`Id_ambiente`);
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
