-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2023 a las 04:52:43
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
(179, 7, 6, '2023-02-17 06:06:31'),
(180, 8, 6, '2023-02-17 06:16:33'),
(181, 9, 6, '2023-02-17 06:27:55'),
(182, 11, 6, '2023-02-20 07:42:41'),
(183, 12, 6, '2023-02-22 21:02:51'),
(184, 10, 6, '2023-02-22 21:08:14'),
(185, 19, 6, '2023-02-22 22:25:12'),
(186, 4, 6, '2023-02-23 16:50:48'),
(187, 4, 6, '2023-02-23 17:12:29'),
(188, 29, 6, '2023-05-31 20:30:51'),
(189, 30, 6, '2023-05-31 20:30:59'),
(190, 28, 6, '2023-05-31 20:31:20'),
(191, 26, 6, '2023-05-31 20:31:24'),
(192, 25, 6, '2023-05-31 20:31:57'),
(193, 27, 6, '2023-05-31 20:32:00'),
(194, 24, 6, '2023-05-31 20:32:04'),
(195, 23, 6, '2023-05-31 20:32:07'),
(196, 22, 6, '2023-05-31 20:32:24'),
(197, 20, 6, '2023-05-31 20:33:24'),
(198, 31, 6, '2023-08-19 22:05:44'),
(199, 33, 6, '2023-08-19 22:05:56'),
(200, 34, 6, '2023-08-19 22:06:00'),
(201, 35, 6, '2023-08-19 22:06:02'),
(202, 36, 6, '2023-08-19 22:06:05'),
(203, 32, 6, '2023-08-19 22:06:26'),
(204, 15, 6, '2023-08-19 22:10:30'),
(205, 37, 6, '2023-08-22 00:49:36'),
(206, 38, 6, '2023-08-22 00:49:54'),
(207, 39, 6, '2023-08-22 00:49:58'),
(208, 39, 6, '2023-08-22 00:50:07'),
(209, 40, 6, '2023-08-22 01:05:17'),
(210, 43, 6, '2023-08-22 01:20:52'),
(211, 42, 6, '2023-08-22 01:20:57'),
(212, 41, 6, '2023-08-22 01:44:04');

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
(380, 358, 6, 21, '2023-08-22 01:44:22'),
(381, 358, 6, 1, '2023-08-22 02:10:02'),
(382, 358, 6, 21, '2023-08-22 02:10:26'),
(383, 358, 6, 22, '2023-08-22 02:19:12'),
(384, 359, 6, 22, '2023-08-22 02:19:32'),
(385, 359, 6, 22, '2023-08-22 02:21:18'),
(386, 360, 6, 21, '2023-08-22 02:39:33');

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
(21, 'Aprobado'),
(22, 'Rechazado'),
(23, 'Finalizado');

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
(164, 358, '[{\"foto\":\"img//Captura de pantalla 2023-08-15 182009.png\"}]'),
(165, 359, '[{\"foto\":\"img//animal.jpg\"}]'),
(166, 360, '[{\"foto\":\"img//animal.jpg\"}]'),
(167, 361, '[{\"foto\":\"img//animal.jpg\"}]'),
(168, 362, '[{\"foto\":\"img//animal.jpg\"},{\"foto\":\"img//animal maltrato.jpg\"}]'),
(169, 362, '[{\"foto\":\"img//Captura de pantalla 2023-08-15 194752.png\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_denuncia`
--

CREATE TABLE `lista_denuncia` (
  `lista_denuncia_id` int(11) NOT NULL,
  `estado_denuncia` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `celular` int(10) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `observacion` varchar(225) NOT NULL,
  `latitud` varchar(255) NOT NULL,
  `longitud` varchar(255) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_tipo_maltrato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lista_denuncia`
--

INSERT INTO `lista_denuncia` (`lista_denuncia_id`, `estado_denuncia`, `descripcion`, `celular`, `fecha`, `observacion`, `latitud`, `longitud`, `usuario_id`, `id_estado`, `id_tipo_maltrato`) VALUES
(358, 0, 'golpes', 985412569, '2023-08-22 02:19:12', '', '-27.333686190388384', '-55.86658416931152', 44, 22, 43),
(359, 0, 'golpes en el cuello', 985412567, '2023-08-22 02:41:16', 'cbdf', '-27.33109374606331', '-55.86632667724609', 45, 22, 43),
(360, 0, 'golpes en la cara', 985412564, '2023-08-22 02:39:33', '', '-27.33101749678303', '-55.863751756591796', 46, 21, 17),
(361, 0, 'gdaa', 985412563, '2023-08-22 02:40:44', '', '-27.33170373841761', '-55.86632667724609', 45, 1, 43),
(362, 0, 'asdasadasd', 985412563, '2023-08-22 02:45:47', '', '-27.3236210673463', '-55.873793947143554', 47, 1, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `hora`) VALUES
(78, 804748826, 251345984, 'hora', '2023-02-20 04:40:38'),
(79, 251345984, 804748826, 'hora', '2023-02-20 04:41:26'),
(80, 251345984, 804748826, 'hola', '2023-02-20 04:52:03'),
(81, 804748826, 251345984, 'ff', '2023-02-20 05:09:54'),
(82, 251345984, 804748826, 'asdasdasdsadasdas', '2023-02-20 05:10:30'),
(83, 251345984, 804748826, 'sadasdasdaeqdaaaaaaaaaaaaaaaaasaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2023-02-20 05:10:50'),
(84, 251345984, 804748826, 'ds', '2023-02-20 05:12:14'),
(85, 251345984, 804748826, 'sd', '2023-02-20 05:13:42'),
(86, 251345984, 804748826, 'asssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssassssssaaaaaaaaaaaaaaaaaaaaaaaasasaa', '2023-02-20 05:13:58'),
(87, 251345984, 804748826, 'hola', '2023-02-20 05:16:01'),
(88, 804748826, 251345984, 'sdddddddddddddddddddddddddddddddddddddddddddddddddddd', '2023-02-20 05:19:31'),
(89, 804748826, 251345984, 'byenas tarde ', '2023-02-20 05:24:08'),
(90, 804748826, 251345984, 'buenas tarde', '2023-02-20 05:24:17'),
(91, 804748826, 251345984, 'queta', '2023-02-20 05:24:45'),
(92, 804748826, 251345984, 'buenas tardes', '2023-02-20 05:24:52'),
(93, 804748826, 251345984, 'aaaaaaaaaaaaaaaaaaaaa', '2023-02-20 05:24:58'),
(94, 804748826, 251345984, 'buenass', '2023-02-20 05:25:07'),
(95, 804748826, 251345984, 'assssssssss', '2023-02-20 05:25:11'),
(96, 804748826, 251345984, 'buenas tardes', '2023-02-20 05:26:40'),
(97, 804748826, 251345984, 'buenas ', '2023-02-20 05:27:04'),
(98, 804748826, 251345984, 'buenas tarde ', '2023-02-20 05:28:29'),
(99, 804748826, 251345984, 'sbds;djhsjkdhsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', '2023-02-20 05:28:35'),
(100, 804748826, 251345984, 'jjassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2023-02-20 05:28:40'),
(101, 804748826, 251345984, 'buenas', '2023-02-20 05:31:05'),
(102, 804748826, 251345984, 'buenas tardes', '2023-02-20 05:31:11'),
(103, 804748826, 251345984, 'hola', '2023-02-20 05:31:58'),
(104, 317961109, 251345984, 'hola', '2023-02-20 06:07:39'),
(105, 804748826, 251345984, 'hola', '2023-02-20 06:56:19'),
(106, 804748826, 251345984, 'hola', '2023-02-21 04:34:44'),
(107, 1195640258, 804748826, 'hola', '2023-02-22 19:17:05'),
(108, 251345984, 804748826, 'buenas tardes', '2023-02-22 19:33:53'),
(109, 251345984, 804748826, 'Un texto es una composición de signos codificados en un sistema de escritura que forma una unidad de sentido. También es una composición de caracteres imprimibles generados por un algoritmo de cifrado que, aunque no tienen sentido para cualquier persona, sí puede ser descifrado por su destinatario original. ', '2023-02-22 19:34:08'),
(110, 317961109, 251345984, 'hola', '2023-02-22 20:36:56'),
(111, 251345984, 1557803432, 'g', '2023-02-22 22:15:14'),
(112, 1239731509, 251345984, 'buenas', '2023-02-23 18:48:13'),
(113, 1557803432, 251345984, 'buenas', '2023-02-23 18:48:34'),
(114, 251345984, 595481431, 'buenas', '2023-02-23 21:41:47'),
(115, 595481431, 251345984, 'hola', '2023-02-23 21:46:52'),
(116, 251345984, 402777453, 'hol', '2023-05-16 17:05:21'),
(117, 459557466, 251345984, 'hola', '2023-05-22 21:53:48'),
(118, 1557803432, 251345984, 'buenas tardes', '2023-08-05 20:04:44'),
(119, 1557803432, 251345984, 'hols', '2023-08-19 17:33:03'),
(120, 615761252, 251345984, 'jo', '2023-08-19 17:33:11'),
(121, 251345984, 1557803432, 'hola', '2023-08-19 17:36:18'),
(122, 251345984, 1226875009, 'hola', '2023-08-19 21:14:45'),
(123, 251345984, 513644303, 'buenas tarde', '2023-08-19 21:51:31'),
(124, 251345984, 543972698, 'buenas tardes', '2023-08-19 22:00:14'),
(125, 251345984, 975109742, 'buenas tardes', '2023-08-19 22:08:29'),
(126, 975109742, 251345984, 'buenas', '2023-08-19 22:11:34'),
(127, 975109742, 251345984, 'hola', '2023-08-19 22:11:40'),
(128, 251345984, 1529069206, 'buenas', '2023-08-22 01:07:59'),
(129, 429286474, 251345984, 'buenas', '2023-08-22 01:18:43'),
(130, 251345984, 880598728, 'hola', '2023-08-22 01:32:49'),
(131, 880598728, 251345984, 'hola', '2023-08-22 01:34:15'),
(132, 251345984, 484550455, 'hola', '2023-08-22 01:43:39'),
(133, 484550455, 251345984, 'hola', '2023-08-22 01:44:53'),
(134, 251345984, 224033021, 'hola', '2023-08-22 02:09:31'),
(135, 880598728, 251345984, 'hola', '2023-08-22 02:11:16'),
(136, 251345984, 484550455, 'hola', '2023-08-22 02:42:50'),
(137, 224033021, 251345984, 'holç', '2023-08-22 02:43:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(255) DEFAULT NULL,
  `leido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(17, 'Abandono'),
(43, 'Utilización en actividades'),
(44, 'Secuestro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `usuario_cod` int(10) NOT NULL,
  `nombre_usu` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `clavev` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `unique_id`, `usuario_cod`, `nombre_usu`, `apellido`, `status`, `correo`, `clave`, `clavev`, `id_rol`, `estado`) VALUES
(6, 251345984, 5258613, 'lucas', 'lopez', 'Offline now', 'lore15@gmail.com', '432f45b44c432414d2f97df0e5743818', '432f45b44c432414d2f97df0e5743818', 1, 2),
(44, 880598728, 5258619, 'anto', 'garcia', 'En línea', 'paspok@gmail.com', '432f45b44c432414d2f97df0e5743818', '432f45b44c432414d2f97df0e5743818', 2, 1),
(45, 484550455, 5258617, 'javier', 'vera', 'Offline now', 'paspo@gmail.com', '432f45b44c432414d2f97df0e5743818', '432f45b44c432414d2f97df0e5743818', 2, 1),
(46, 224033021, 5258616, 'martin', 'mendoza', 'Offline now', 'pasp2@gmail.com', '432f45b44c432414d2f97df0e5743818', '432f45b44c432414d2f97df0e5743818', 2, 1),
(47, 1422761770, 5258610, ' lorenas', ' perezs', 'Offline now', 'pesamegonza.98.pg@gmail.com', '432f45b44c432414d2f97df0e5743818', '432f45b44c432414d2f97df0e5743818', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria_eliminar_usu`
--
ALTER TABLE `auditoria_eliminar_usu`
  ADD PRIMARY KEY (`id_auditoria`),
  ADD KEY `id_administrador` (`id_administrador`);

--
-- Indices de la tabla `auditoria_estado`
--
ALTER TABLE `auditoria_estado`
  ADD PRIMARY KEY (`id_auditoria`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_denuncia` (`id_denuncia`);

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
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_tipo_maltrato` (`id_tipo_maltrato`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `auditoria_eliminar_usu`
--
ALTER TABLE `auditoria_eliminar_usu`
  MODIFY `id_auditoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT de la tabla `auditoria_estado`
--
ALTER TABLE `auditoria_estado`
  MODIFY `id_auditoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT de la tabla `lista_denuncia`
--
ALTER TABLE `lista_denuncia`
  MODIFY `lista_denuncia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_maltrato`
--
ALTER TABLE `tipo_maltrato`
  MODIFY `id_tipo_maltrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auditoria_eliminar_usu`
--
ALTER TABLE `auditoria_eliminar_usu`
  ADD CONSTRAINT `auditoria_eliminar_usu_ibfk_1` FOREIGN KEY (`id_administrador`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auditoria_estado`
--
ALTER TABLE `auditoria_estado`
  ADD CONSTRAINT `auditoria_estado_ibfk_1` FOREIGN KEY (`id_denuncia`) REFERENCES `lista_denuncia` (`lista_denuncia_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auditoria_estado_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`id_denuncia`) REFERENCES `lista_denuncia` (`lista_denuncia_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista_denuncia`
--
ALTER TABLE `lista_denuncia`
  ADD CONSTRAINT `lista_denuncia_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lista_denuncia_ibfk_4` FOREIGN KEY (`id_tipo_maltrato`) REFERENCES `tipo_maltrato` (`id_tipo_maltrato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
