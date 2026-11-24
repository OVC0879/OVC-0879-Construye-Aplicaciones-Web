-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2026 a las 04:13:11
-- Versión del servidor: 10.11.16-MariaDB
-- Versión de PHP: 8.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica-1-ovc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`) VALUES
(1, 'iPhone'),
(2, 'Samsung'),
(3, 'Xiaomi'),
(4, 'Motorola'),
(5, 'Google');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `marca_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `stock`, `marca_id`) VALUES
(1, 'iPhone 15 Pro Max', 28999.00, 8, 1),
(2, 'iPhone 15 Pro', 23999.00, 10, 1),
(3, 'iPhone 15 Plus', 21499.00, 12, 1),
(4, 'iPhone 15', 19499.00, 15, 1),
(5, 'iPhone 14 Pro Max', 24999.00, 6, 1),
(6, 'iPhone 14', 16999.00, 14, 1),
(7, 'iPhone 13 Pro', 17999.00, 9, 1),
(8, 'iPhone 13', 13999.00, 18, 1),
(9, 'iPhone 12', 10999.00, 20, 1),
(10, 'iPhone SE (3ra gen)', 8499.00, 25, 1),
(11, 'Galaxy S24 Ultra', 28999.00, 8, 2),
(12, 'Galaxy S24+', 23499.00, 10, 2),
(13, 'Galaxy S24', 19499.00, 12, 2),
(14, 'Galaxy Z Fold5', 32999.00, 5, 2),
(15, 'Galaxy Z Flip5', 20999.00, 7, 2),
(16, 'Galaxy S23 FE', 12999.00, 15, 2),
(17, 'Galaxy A55 5G', 8999.00, 18, 2),
(18, 'Galaxy A54', 7499.00, 20, 2),
(19, 'Galaxy A35', 5999.00, 22, 2),
(20, 'Galaxy A15', 3699.00, 30, 2),
(21, 'Xiaomi 14 Ultra', 26999.00, 4, 3),
(22, 'Xiaomi 14', 21499.00, 5, 3),
(23, 'Xiaomi 13T Pro', 14999.00, 9, 3),
(24, 'POCO F6 Pro', 11499.00, 12, 3),
(25, 'POCO X6 Pro', 7999.00, 15, 3),
(26, 'Redmi Note 13 Pro+', 9999.00, 14, 3),
(27, 'Redmi Note 13 Pro', 7499.00, 18, 3),
(28, 'Redmi Note 13', 4899.00, 25, 3),
(29, 'Redmi 13C', 3199.00, 30, 3),
(30, 'POCO M6 Pro', 4299.00, 20, 3),
(31, 'Razr 40 Ultra', 22999.00, 6, 4),
(32, 'Edge 50 Pro', 12999.00, 10, 4),
(33, 'Edge 40 Pro', 15499.00, 8, 4),
(34, 'Edge 40 Neo', 7999.00, 12, 4),
(35, 'Edge 30 Ultra', 13999.00, 7, 4),
(36, 'Moto G84 5G', 5499.00, 18, 4),
(37, 'Moto G54 5G', 4299.00, 22, 4),
(38, 'Moto G24 Power', 3499.00, 25, 4),
(39, 'Moto G14', 2899.00, 30, 4),
(40, 'Moto E13', 1999.00, 35, 4),
(41, 'Pixel Fold', 31999.00, 3, 5),
(42, 'Pixel 8 Pro', 21999.00, 7, 5),
(43, 'Pixel 8', 15999.00, 10, 5),
(44, 'Pixel 8a', 10999.00, 12, 5),
(45, 'Pixel 7 Pro', 14499.00, 8, 5),
(46, 'Pixel 7', 10499.00, 11, 5),
(47, 'Pixel 7a', 8499.00, 14, 5),
(48, 'Pixel 6 Pro', 9999.00, 6, 5),
(49, 'Pixel 6', 7299.00, 15, 5),
(50, 'Pixel 6a', 5899.00, 18, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca_id` (`marca_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
