-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2023 a las 20:44:36
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
-- Base de datos: `mountainpanama`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `imagen`, `precio`, `stock`) VALUES
(95, 'Linterna', ' Linterna amarilla con batería blutu', '1687994443_linterna.jpg', 30, 2),
(96, 'capote amarillo', ' capote de color amarillo usado, talla XL', '1687994672_capote amarillo.jpg', 75, 4),
(97, 'Capotes para amigos', 'Dos capotes rosas, tallas XL y M para dama y varón.  ', '1688011437_capote rosa de pareja.jpg', 100, 6),
(99, 'Botas', ' perfectas para caminar en zonas lodosas y lluvia. ', '1688040914_WhatsApp Image 2023-06-28 at 6.37.35 PM (4).jpeg', 79, 8),
(106, 'Mochila Go Hike', 'Capacidad 65 Litros/ Gtech / 1kg / dimensiones 22x81', '1688218462_mochila go hike.webp', 89, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `contrasena` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellido`, `correo`, `usuario`, `contrasena`) VALUES
('Axel', 'Garcia', 'axel.garcia19@gmail.com', 'axel.garcia19', 654321),
('Jose', 'Garcia', 'jose.garcia26@utp.ac.pa', 'j.daniel26', 123456),
('jose', 'garcia', 'jose.garcia26@utp.ac.pa', 'jose.garcia', 123456);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
