-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-12-2022 a las 02:57:05
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
-- Base de datos: `sistema_reporte`
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
  `direccion` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `denunciante_cod` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_tipo_maltrato` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagenes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_denuncia`
--

INSERT INTO `lista_denuncia` (`lista_denuncia_id`, `nombre_denunciante`, `celular`, `direccion`, `fecha`, `denunciante_cod`, `id_estado`, `id_tipo_maltrato`, `titulo`, `imagenes`) VALUES
(1, 'detalle', 98545123, 'jeronimo franco', '2022-12-06', 200, 1, 2, 'foto', '[{\"foto\":\"img/foto/animal maltrato.jpg\"}]'),
(167, 'DETALLE', 985451256, 'jeronimo franco', '2022-12-08', 200, 1, 1, 'foto', '[{\"foto\":\"img/foto/animal maltrato.jpg\"},{\"foto\":\"img/foto/animal.jpg\"}]');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_maltrato`
--

CREATE TABLE `tipo_maltrato` (
  `id_tipo_maltrato` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_maltrato`
--

INSERT INTO `tipo_maltrato` (`id_tipo_maltrato`, `nombres`) VALUES
(1, 'Abandono'),
(2, 'Mala alimentacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `denunciante_id` int(11) NOT NULL,
  `denunciante_cod` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `clavev` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`denunciante_id`, `denunciante_cod`, `nombre`, `apellido`, `correo`, `clave`, `clavev`, `id_rol`) VALUES
(1, 100, 'Pamela', 'Medina', '', '827ccb0eea8a706c4c34a16891f84e7b', '', 1),
(2, 200, 'carlos', 'larramendia', '', '827ccb0eea8a706c4c34a16891f84e7b', '', 2),
(179, 23, 'lucas', 'medina', 'pamelagonzalez@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

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
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_tipo_maltrato` (`id_tipo_maltrato`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_maltrato`
--
ALTER TABLE `tipo_maltrato`
  ADD PRIMARY KEY (`id_tipo_maltrato`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`denunciante_id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lista_denuncia`
--
ALTER TABLE `lista_denuncia`
  MODIFY `lista_denuncia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `denunciante_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lista_denuncia`
--
ALTER TABLE `lista_denuncia`
  ADD CONSTRAINT `lista_denuncia_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lista_denuncia_ibfk_2` FOREIGN KEY (`id_tipo_maltrato`) REFERENCES `tipo_maltrato` (`id_tipo_maltrato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
