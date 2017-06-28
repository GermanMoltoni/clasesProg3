-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2017 a las 02:18:13
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farmacia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `laboratorio` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` float NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`laboratorio`, `nombre`, `precio`, `id`) VALUES
('utn', 'ibuprofeno', 100, 1),
('bayer', 'aspirina', 50, 5),
('z', 'aspirina', 50, 23),
('z', 'aspirina', 666, 333);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `clave`, `mail`) VALUES
(1, 'martin', '123', 'martin@martin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `nombreCliente` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `pathFoto` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `idMedicamento` int(11) NOT NULL,
  `nombreMed` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `laboratorio` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVenta`, `nombreCliente`, `pathFoto`, `idMedicamento`, `nombreMed`, `precio`, `laboratorio`) VALUES
(1, 'german', '1.jpg', 1, 'ibuprofeno', 100, 'utn'),
(2, 'german', '1.jpg', 1, 'ibuprofeno', 100, 'utn'),
(3, 'german', '1.jpg', 1, 'ibuprofeno', 100, 'utn'),
(4, 'german', '2.jpg', 2, 'aspirina', 50, 'utn'),
(5, 'german', '1.jpg', 1, 'ibuprofeno', 100, 'utn'),
(6, 'german', '5.jpg', 5, 'aspirina', 50, 'bayer'),
(7, 'german', '5.jpg', 5, 'aspirina', 50, 'bayer'),
(8, 'german', '5.jpg', 5, 'aspirina', 50, 'bayer'),
(9, 'juan', '1.jpg', 1, 'ibuprofeno', 100, 'utn'),
(10, 'juan', '1.jpg', 1, 'ibuprofeno', 100, 'utn'),
(11, 'juan', '1.jpg', 1, 'ibuprofeno', 100, 'utn'),
(12, 'juan', '1.jpg', 1, 'ibuprofeno', 100, 'utn'),
(13, 'juan', '1.jpg', 1, 'ibuprofeno', 100, 'utn'),
(14, 'juan', '5.jpg', 5, 'aspirina', 50, 'bayer'),
(15, 'juan', '5.jpg', 5, 'aspirina', 50, 'bayer'),
(16, 'juan', '5.jpg', 5, 'aspirina', 50, 'bayer'),
(17, 'juan', '5.jpg', 5, 'aspirina', 50, 'bayer'),
(18, 'juan', '23.jpg', 23, 'aspirina', 50, 'z'),
(19, 'juan', '333.jpg', 333, 'aspirina', 666, 'z');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
