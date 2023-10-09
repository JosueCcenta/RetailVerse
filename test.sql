-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2023 a las 19:11:26
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(20) NOT NULL,
  `titulo` varchar(25) NOT NULL,
  `categoria` varchar(15) NOT NULL,
  `precio` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `categoria`, `precio`, `cantidad`, `imagen`) VALUES
(1, 'Pantalon Cargo adidas	', 'Pantalones', 25, 12, 'http://localhost/inicio/gestion/funciones/img/650c5b74a0852.jpg'),
(2, 'Polo azul', 'Ropa', 15, 32, 'http://localhost/inicio/gestion/funciones/img/650c6d14672b3.jpg'),
(3, 'Polo amarillo el pato Don', 'Ropa', 154, 12, 'http://localhost/inicio/gestion/funciones/img/65204261239a0.jpg'),
(4, 'Zapatilla Adidas Northfac', 'Calzado', 230, 40, 'http://localhost/inicio/gestion/funciones/img/65236fc330da4.png'),
(5, 'Casaca Ralph Dino	', 'Ropa', 150, 24, 'http://localhost/inicio/gestion/funciones/img/65237009db92f.png'),
(6, 'Zapatillas yeezy', 'Calzado', 150, 10, 'http://localhost/inicio/gestion/funciones/img/652370af293d4.png'),
(7, 'Zapatilla reebok original', 'Calzado', 340, 15, 'http://localhost/inicio/gestion/funciones/img/65237068dff39.png'),
(8, 'Pantalon de vestir hombre', 'Pantalones', 50, 35, 'http://localhost/inicio/gestion/funciones/img/65237106d65b5.png'),
(9, 'Polo normal con etiqueta ', 'Ropa', 341, 21, 'http://localhost/inicio/gestion/funciones/img/652371c2ce859.png'),
(10, 'Zapatilla Nike originals', 'Calzado', 400, 5, 'http://localhost/inicio/gestion/funciones/img/652371f8aedc2.png'),
(11, '	Pantalon de vestir dama', 'Pantalones', 50, 32, 'http://localhost/inicio/gestion/funciones/img/65237158d90dc.png'),
(18, 'Pantalon de etiqueta', 'Pantalones', 40, 80, 'http://localhost/inicio/gestion/funciones/img/6523724a10bae.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_tallas`
--

CREATE TABLE `producto_tallas` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `XS` int(11) NOT NULL,
  `S` int(11) NOT NULL,
  `M` int(11) NOT NULL,
  `L` int(11) NOT NULL,
  `XL` int(11) NOT NULL,
  `numeroZapatilla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `producto_tallas`
--

INSERT INTO `producto_tallas` (`id`, `producto_id`, `XS`, `S`, `M`, `L`, `XL`, `numeroZapatilla`) VALUES
(1, 1, 6, 4, 2, 0, 0, 0),
(2, 2, 0, 0, 6, 6, 0, 0),
(3, 3, 13, 0, 0, 0, 0, 0),
(4, 4, 0, 0, 0, 0, 0, 40),
(5, 5, 25, 0, 23, 0, 0, 0),
(6, 6, 0, 0, 0, 12, 0, 0),
(7, 7, 0, 12, 0, 0, 0, 0),
(8, 8, 0, 0, 233, 0, 0, 0),
(9, 9, 0, 3, 0, 0, 0, 0),
(10, 10, 21, 0, 0, 0, 0, 0),
(11, 11, 21, 0, 0, 0, 0, 0),
(18, 18, 0, 0, 0, 0, 24, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `correoElectronico` varchar(30) NOT NULL,
  `token` varchar(100) NOT NULL,
  `expiracionToken` datetime(6) NOT NULL,
  `idCargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `contrasena`, `correoElectronico`, `token`, `expiracionToken`, `idCargo`) VALUES
(1, 'root', 'root', 'root', '123', 'root@gmail.com', '', '0000-00-00 00:00:00.000000', 1),
(8, 'User', 'User', 'User_1', 'nuevaContra', 'user@gmail.com', '', '0000-00-00 00:00:00.000000', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_tallas`
--
ALTER TABLE `producto_tallas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_tallas_ibfk_2` (`producto_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCargo` (`idCargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `producto_tallas`
--
ALTER TABLE `producto_tallas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto_tallas`
--
ALTER TABLE `producto_tallas`
  ADD CONSTRAINT `producto_tallas_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `producto_tallas_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idCargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
