-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2022 a las 03:19:43
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`user_id`, `nombre`, `username`, `clave`, `estado`) VALUES
(1, 'Administrador', 'admin', '12345', 'administrador'),
(2, 'Administrador', 'admin', '12345', 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denunciante`
--

CREATE TABLE `denunciante` (
  `denunciante_id` int(11) NOT NULL,
  `denunciante_cod` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `denunciante`
--

INSERT INTO `denunciante` (`denunciante_id`, `denunciante_cod`, `nombre`, `apellido`, `clave`, `id_rol`) VALUES
(1, 200, 'pamela', 'gonzalez', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(156, 72, 'mercedes', '', 'd41d8cd98f00b204e9800998ecf8427e', 2),
(158, 233, 'maria', 'd', '934b535800b1cba8f96a5d72f72f1611', 2),
(159, 500, 'pedro', 'villalba', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(160, 600, 'lucas', 'gonzalez', '827ccb0eea8a706c4c34a16891f84e7b', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre`) VALUES
(1, 'Pendiente'),
(2, 'En proceso'),
(3, 'Finzalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_denuncia`
--

CREATE TABLE `lista_denuncia` (
  `lista_denuncia_id` int(11) NOT NULL,
  `nombre_denunciante` varchar(255) NOT NULL,
  `celular` int(10) NOT NULL,
  `cedula` int(8) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `denunciante_cod` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagenes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_denuncia`
--

INSERT INTO `lista_denuncia` (`lista_denuncia_id`, `nombre_denunciante`, `celular`, `cedula`, `direccion`, `fecha`, `denunciante_cod`, `id_estado`, `titulo`, `imagenes`) VALUES
(101, 'pamela', 98512335, 5254523, 'jeronimo franco', '2022-11-29', 500, 3, 'foto', '[{\"foto\":\"img/foto/animal maltrato.jpg\"},{\"foto\":\"img/foto/facat logo - copia.png\"},{\"foto\":\"img/foto/facat logo.png\"}]'),
(104, 'lolo', 45, 65, 'gr', '2022-11-29', 500, 1, 'g', '[{\"foto\":\"img/g/animal maltrato.jpg\"},{\"foto\":\"img/g/facat logo.png\"},{\"foto\":\"img/g/facat logo - copia.png\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(2, 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `denunciante`
--
ALTER TABLE `denunciante`
  ADD PRIMARY KEY (`denunciante_id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `lista_denuncia`
--
ALTER TABLE `lista_denuncia`
  ADD PRIMARY KEY (`lista_denuncia_id`),
  ADD KEY `denuciante_cod` (`denunciante_cod`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `denunciante`
--
ALTER TABLE `denunciante`
  MODIFY `denunciante_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lista_denuncia`
--
ALTER TABLE `lista_denuncia`
  MODIFY `lista_denuncia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `denunciante`
--
ALTER TABLE `denunciante`
  ADD CONSTRAINT `denunciante_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista_denuncia`
--
ALTER TABLE `lista_denuncia`
  ADD CONSTRAINT `lista_denuncia_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
