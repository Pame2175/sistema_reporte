-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2023 a las 23:41:17
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `auditoria_eliminar_usuario` (IN `id_usuario` VARCHAR(255), IN `id_administrador` VARCHAR(255))   BEGIN

INSERT INTO auditoria_eliminar_usu(id_usuario,id_administrador) VALUES(id_usu,id,admin);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificar` (IN `estados` VARCHAR(255), IN `lista_denuncia` VARCHAR(255), IN `id_usuario` VARCHAR(255))   BEGIN

INSERT INTO auditoria_estado(id_denuncia,id_usuario,id_estado) VALUES(lista_denuncia,id_usuario,estados);

END$$

DELIMITER ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`user_id`, `nombre`, `username`, `clave`, `estado`) VALUES
(1, 'Administrador', 'admin', '12345', 'administrador'),
(2, 'Administrador', 'admin', '12345', 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_eliminar_usu`
--

CREATE TABLE `auditoria_eliminar_usu` (
  `id_auditoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_administrador` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `auditoria_eliminar_usu`
--

INSERT INTO `auditoria_eliminar_usu` (`id_auditoria`, `id_usuario`, `id_administrador`, `fecha`) VALUES
(59, 5258613, 600, '2023-02-04 01:49:20'),
(60, 700, 600, '2023-02-04 15:21:07'),
(61, 52586132, 600, '2023-02-04 15:24:26'),
(62, 52586132, 600, '2023-02-04 15:24:35'),
(63, 60033, 600, '2023-02-04 15:43:26'),
(64, 6003, 600, '2023-02-04 15:47:21'),
(65, 6002, 600, '2023-02-04 16:06:41'),
(66, 300, 600, '2023-02-04 16:07:13'),
(67, 122, 600, '2023-02-04 16:13:22'),
(68, 22, 600, '2023-02-04 16:14:38'),
(69, 5258613, 600, '2023-02-04 16:17:33'),
(70, 350, 600, '2023-02-04 17:36:40'),
(71, 6002, 600, '2023-02-04 17:36:50'),
(72, 2022, 600, '2023-02-04 18:13:23'),
(73, 30023, 200, '2023-02-04 19:15:29'),
(74, 3002, 200, '2023-02-04 19:15:36'),
(75, 300, 200, '2023-02-04 19:39:56'),
(76, 600, 200, '2023-02-04 19:40:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_estado`
--

CREATE TABLE `auditoria_estado` (
  `id_auditoria` int(11) NOT NULL,
  `id_denuncia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `auditoria_estado`
--

INSERT INTO `auditoria_estado` (`id_auditoria`, `id_denuncia`, `id_usuario`, `id_estado`, `fecha`) VALUES
(245, 1, 3, 209, '2023-02-01 13:11:37'),
(246, 606, 2, 209, '2023-02-04 22:38:02'),
(247, 606, 2, 214, '2023-02-04 22:38:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre`) VALUES
(1, 'Pendiente'),
(2, 'En proceso'),
(3, 'Finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `id_denuncia` int(11) NOT NULL,
  `enlace` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `id_denuncia`, `enlace`) VALUES
(104, 209, '[{\"foto\":\"img//animal maltrato.jpg\"}]'),
(105, 209, '[{\"foto\":\"img//animal.jpg\"}]'),
(106, 209, '[{\"foto\":\"img//javaScript.jpg\"}]'),
(107, 210, '[{\"foto\":\"img//animal.jpg\"}]'),
(108, 213, '[{\"foto\":\"img//animal.jpg\"}]'),
(109, 214, '[{\"foto\":\"img//animal maltrato.jpg\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_denuncia`
--

CREATE TABLE `lista_denuncia` (
  `lista_denuncia_id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `celular` int(10) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `latitud` varchar(255) NOT NULL,
  `longitud` varchar(255) NOT NULL,
  `usuario_cod` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_tipo_maltrato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lista_denuncia`
--

INSERT INTO `lista_denuncia` (`lista_denuncia_id`, `descripcion`, `celular`, `direccion`, `fecha`, `latitud`, `longitud`, `usuario_cod`, `id_estado`, `id_tipo_maltrato`) VALUES
(209, 'hola', 985425632, 'jeronimo franco', '2023-02-15', '-27.332999961025987', '-55.86761413757324', 200, 2, 2),
(210, 'e', 3, 'ff', '2023-02-15', '-27.331932484685144', '-55.871734010620116', 200, 2, 2),
(211, 'fff', 4, 'd', '2023-02-13', '-27.331322493589507', '-55.8681291217041', 200, 1, 1),
(212, 'ww', 33, 'fff', '2023-02-06', '-27.332084981934607', '-55.87010322753906', 100, 1, 2),
(213, 'cerca del poste', 434, ' 12-02-2023', '2023-02-12', '-27.33116999529115', '-55.85611282531738', 300, 1, 2),
(214, 'asas', 3443, ' 08-02-2023', '2023-02-08', '-27.332694968834662', '-55.87096153442383', 300, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(39, 1582908467, 1622688038, 'HOLA'),
(40, 1622688038, 340066300, 'HOLA'),
(41, 1622688038, 340066300, 'BUENAS'),
(42, 1582908467, 1622688038, 'BUENAS'),
(43, 1582908467, 1622688038, 'OK'),
(44, 1622688038, 340066300, 'dale'),
(45, 1582908467, 1622688038, 'holi'),
(46, 1582908467, 1622688038, 'hola'),
(47, 1582908467, 1622688038, 'buenas tardes'),
(48, 440971575, 1622688038, 'hola'),
(49, 1582908467, 1245236, 'hola'),
(50, 1245236, 1582908467, 'buenas tardes'),
(51, 440971575, 1622688038, 'holi'),
(52, 1622688038, 440971575, 'podrias pasarme la foto con mejor calidad'),
(53, 1622688038, 340066300, 'buenas tardes'),
(54, 340066300, 1622688038, 'hi'),
(55, 340066300, 1622688038, 'buenas tarde'),
(56, 1622688038, 340066300, 'le paso la foto'),
(57, 340066300, 1622688038, 'sii'),
(58, 1582908467, 1622688038, 'hola'),
(59, 881706276, 539480897, 'hola'),
(60, 881706276, 539480897, 'hola quetal_'),
(61, 881706276, 539480897, 'hol'),
(62, 539480897, 881706276, 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_maltrato`
--

INSERT INTO `tipo_maltrato` (`id_tipo_maltrato`, `nombres`) VALUES
(1, 'Abandono'),
(2, 'Mala alimentacion'),
(3, 'Recojido'),
(4, 'hOLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `usuario_cod` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `clavev` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `unique_id`, `usuario_cod`, `nombre`, `apellido`, `status`, `correo`, `clave`, `clavev`, `id_rol`) VALUES
(601, 881706276, 300, 'lorena', 'medina', 'Offline now', 'lucas@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(606, 539480897, 200, 'lucas', 'medina', 'Offline now', 'lorqe15@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(607, 0, 5258614, 'lorena', 'medina', '', 'lore1s5@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `auditoria_eliminar_usu`
--
ALTER TABLE `auditoria_eliminar_usu`
  ADD PRIMARY KEY (`id_auditoria`);

--
-- Indices de la tabla `auditoria_estado`
--
ALTER TABLE `auditoria_estado`
  ADD PRIMARY KEY (`id_auditoria`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_denuncia` (`id_denuncia`);

--
-- Indices de la tabla `lista_denuncia`
--
ALTER TABLE `lista_denuncia`
  ADD PRIMARY KEY (`lista_denuncia_id`),
  ADD KEY `denuciante_cod` (`usuario_cod`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_tipo_maltrato` (`id_tipo_maltrato`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

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
  ADD PRIMARY KEY (`usuario_id`),
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
-- AUTO_INCREMENT de la tabla `auditoria_eliminar_usu`
--
ALTER TABLE `auditoria_eliminar_usu`
  MODIFY `id_auditoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `auditoria_estado`
--
ALTER TABLE `auditoria_estado`
  MODIFY `id_auditoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `lista_denuncia`
--
ALTER TABLE `lista_denuncia`
  MODIFY `lista_denuncia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=608;

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
