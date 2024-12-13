-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2024 a las 03:35:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gym`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_usuario` (IN `p_nombre` VARCHAR(50), IN `p_apellido` VARCHAR(50), IN `p_direccion` VARCHAR(100), IN `p_telefono` INT, IN `p_email` VARCHAR(100), IN `p_clave` VARCHAR(100), IN `p_id_membresia` INT)   BEGIN
    INSERT INTO Usuario (Nombre, Apellido, Dirección, Teléfono, Email, Clave, ID_Membresía)
    VALUES (p_nombre, p_apellido, p_direccion, p_telefono, p_email, p_clave, p_id_membresia);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_factura_cliente` (IN `p_id_cliente` INT)   BEGIN
    SELECT * FROM Factura WHERE ID_Cliente = p_id_cliente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_productos_en_stock` ()   BEGIN
    SELECT * FROM Producto WHERE Stock > 0;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `ID_Carrito` int(11) NOT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `Fecha_Creación` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`ID_Carrito`, `ID_Cliente`, `Fecha_Creación`) VALUES
(1, 1, '2024-01-10'),
(2, 2, '2024-01-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `ID_Venta` int(11) DEFAULT NULL,
  `ID_Suplemento` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Precio_Unitario` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`ID_Venta`, `ID_Suplemento`, `Cantidad`, `Precio_Unitario`) VALUES
(1, 1, 1, 70000.00),
(1, 14, 1, 54990.00),
(1, 15, 1, 90000.00),
(2, 2, 1, 50000.00),
(2, 10, 1, 60000.00),
(3, 1, 1, 70000.00),
(3, 2, 1, 50000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_Factura` int(11) NOT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Subtotal` decimal(10,2) DEFAULT NULL,
  `Medio_Pago` varchar(50) DEFAULT NULL,
  `Dirección_Envio` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`ID_Factura`, `ID_Cliente`, `Fecha`, `Subtotal`, `Medio_Pago`, `Dirección_Envio`) VALUES
(1, 8, '2024-11-27', 214990.00, 'Debito', 'Calle Falsa 123'),
(2, 9, '2024-11-27', 110000.00, 'Efectivo', ''),
(3, 9, '2024-11-27', 120000.00, 'Transferencia', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_Suplemento` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Marca` varchar(50) DEFAULT NULL,
  `Precio_Venta` decimal(10,2) DEFAULT NULL,
  `Precio_Compra` decimal(10,2) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `ruta` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_Suplemento`, `Nombre`, `Marca`, `Precio_Venta`, `Precio_Compra`, `Descripcion`, `Stock`, `ruta`) VALUES
(1, 'Energy X Megaplex', 'Megaplex', 70000.00, 50000.00, 'Bebida energizante, contiene cafeína y taurina', 100, 'ASSETS/img/Productos/Energy X Megaplex.png'),
(2, 'Atomic Smartmuscle', 'Smartmuscle', 50000.00, 28000.00, ' Energía sostenida y glutamina para tu entrenamiento', 50, 'ASSETS/img/Productos/Atomic Smartmuscle.png'),
(10, 'Gluta Stack', 'Stack', 60000.00, 50000.00, 'glutamina, sulfato de zinc y vitamina c', 100, 'ASSETS/img/Productos/Gluta Stack.png'),
(11, 'Legend Fitmafia', 'Legend Fitmafia', 150000.00, 110000.00, 'Legend es la combinación de Polidextrosa', 10, 'ASSETS/img/Productos/Legend Fitmafia.png'),
(12, 'Mass Evolution Smart Nutrition', 'Smart Nutrition', 80000.00, 65000.00, 'mezcla en polvo para preparar bebida', 10, 'ASSETS/img/Productos/Mass Evolution Smart Nutrition.png'),
(13, 'Mega Gainer GMN', 'GMN', 80000.00, 60000.00, 'polvo a base de proteína aislada', 10, 'ASSETS/img/Productos/Mega Gainer GMN.png'),
(14, 'Megaplex Creatine Power', 'Creatine Power', 54990.00, 50000.00, 'la mejor proteína de suero, hipercalórica ', 10, 'ASSETS/img/Productos/Megaplex Creatine Power.png'),
(15, 'Monohydrate Ultimate', 'Monohydrate Ultimate', 90000.00, 80000.00, ' creatina de Ultimate Nutritio', 10, 'ASSETS/img/Productos/Monohydrate Ultimate.png'),
(16, 'Nitrox Smart Nutrition', 'Smart Nutrition', 50000.00, 30000.00, 'polvo para preparar una bebida energizante', 10, 'ASSETS/img/Productos/Nitrox Smart Nutrition.png'),
(17, 'Pase Fitmafia', 'Fitmafia', 99000.00, 70000.00, 'Pre-entreno  te proporciona un impulso de energía', 10, 'ASSETS/img/Productos/Pase Fitmafia.png'),
(18, 'Super Mega Gainer GMN', 'Gainer GMN', 160000.00, 130000.00, 'alimento en polvo a base de carbohidratos y proteína concentrada', 10, 'ASSETS/img/Productos/Super Mega Gainer GMN.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `ID_Membresía` int(11) NOT NULL,
  `Tipo_Membresía` varchar(50) DEFAULT NULL,
  `Fecha_Inicio` date DEFAULT NULL,
  `Fecha_Fin` date DEFAULT NULL,
  `ID_Cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`ID_Membresía`, `Tipo_Membresía`, `Fecha_Inicio`, `Fecha_Fin`, `ID_Cliente`) VALUES
(1, 'Mensual', '2024-01-01', '2024-01-31', NULL),
(2, 'Anual', '2024-01-01', '2024-12-31', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Cliente` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Dirección` varchar(100) DEFAULT NULL,
  `Teléfono` int(11) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Clave` varchar(100) DEFAULT NULL,
  `rol` varchar(100) DEFAULT NULL,
  `StateUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Cliente`, `Nombre`, `Apellido`, `Dirección`, `Teléfono`, `Email`, `Clave`, `rol`, `StateUser`) VALUES
(1, ':userName', ':apellido', ':direccion', 1, ':correoUser', ':passwordUser', 'Usuario', 1),
(2, 'Juan', 'Pérez', 'Calle 1', 1234567890, 'juan.perez@example.com', 'clave123', 'admin', 1),
(8, 'Jimmy', 'Morales', 'Calle Falsa 123', 123456789, 'admin@gmail.com', 'contraseña123', 'admin', 1),
(9, 'Firelord5678', '', '', 0, 'santiago36766@gmail.com', 'Clave123@', 'usuario', 1),
(10, 'felipe', 'Morales', 'CL 42 B SUR 6 A ESTE 48', 2147483647, 'Pajaro@gmail.com', 'clave123', 'usuario', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`ID_Carrito`),
  ADD KEY `ID_Cliente` (`ID_Cliente`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD KEY `ID_Venta` (`ID_Venta`),
  ADD KEY `ID_Suplemento` (`ID_Suplemento`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_Factura`),
  ADD KEY `ID_Cliente` (`ID_Cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_Suplemento`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`ID_Membresía`),
  ADD KEY `ID_Cliente` (`ID_Cliente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Cliente`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `ID_Carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ID_Factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_Suplemento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `ID_Membresía` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `usuario` (`ID_Cliente`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`ID_Venta`) REFERENCES `factura` (`ID_Factura`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`ID_Suplemento`) REFERENCES `producto` (`ID_Suplemento`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `usuario` (`ID_Cliente`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `usuario` (`ID_Cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
