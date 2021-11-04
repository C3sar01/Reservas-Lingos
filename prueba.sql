-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2021 a las 17:05:45
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `img`, `fecha`) VALUES
(1, 'vistas/img/banner/banner01.jpg', '2021-06-17 17:13:38'),
(2, 'vistas/img/banner/banner02.jpg', '2021-06-17 17:13:38'),
(3, 'vistas/img/banner/banner03.png', '2021-11-01 20:31:31'),
(4, 'vistas/img/banner/banner04.jpeg', '2021-08-16 02:21:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafe`
--

CREATE TABLE `cafe` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cafe`
--

INSERT INTO `cafe` (`id`, `img`, `descripcion`, `fecha`) VALUES
(1, 'vistas/img/cafe/img1.jpg', 'lorem ipsum', '2021-11-01 20:32:38'),
(2, 'vistas/img/cafe/img2.jpg', 'lorem ipsum', '2021-11-01 20:32:44'),
(3, 'vistas/img/cafe/img3.jpg', 'lorem ipsum', '2021-11-01 20:32:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `color` text NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `incluye` text NOT NULL,
  `hora_baja` float NOT NULL,
  `hora_alta` float NOT NULL,
  `plan16` float NOT NULL,
  `plan32` float NOT NULL,
  `plan64` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `ruta`, `color`, `tipo`, `img`, `descripcion`, `incluye`, `hora_baja`, `hora_alta`, `plan16`, `plan32`, `plan64`, `fecha`) VALUES
(1, 'habitacion-tipo-grande', '#131513', 'Grande', 'vistas/img/grande/img1.jpg', 'Salas de capacidad de 10 a 20 personas', '[{ \"item\": \"Aire acondicionado\", \"icono\": \"fas fa-fan\"},\r\n{ \"item\": \"TV de 42 Pulg\", \"icono\": \"fas fa-tv\"},\r\n{ \"item\": \"Agua Caliente\", \"icono\": \"fas fa-tint\"},\r\n{ \"item\": \"Jacuzzi\", \"icono\": \"fas fa-water\"},\r\n{ \"item\": \"Baño privado\", \"icono\": \"fas fa-toilet\"},\r\n{ \"item\": \"Sofá\", \"icono\": \"fas fa-couch\"},\r\n{ \"item\": \"Balcón\", \"icono\": \"far fa-image\"},\r\n{ \"item\": \"Servicio Wifi\", \"icono\": \"fas fa-wifi\"}]', 8000, 8000, 72000, 125000, 220000, '2021-11-01 20:44:56'),
(2, 'habitacion-tipo-estandar', '#131513', 'Estandar', 'vistas/img/estandar/rio/img1.jpg', 'Salas de capacidad de 5 a 10 personas', '[{ \"item\": \"Aire acondicionado\", \"icono\": \"fas fa-fan\"},\r\n{ \"item\": \"TV de 42 Pulg\", \"icono\": \"fas fa-tv\"},\r\n{ \"item\": \"Agua Caliente\", \"icono\": \"fas fa-tint\"},\r\n{ \"item\": \"Jacuzzi\", \"icono\": \"fas fa-water\"},\r\n{ \"item\": \"Baño privado\", \"icono\": \"fas fa-toilet\"},\r\n{ \"item\": \"Sofá\", \"icono\": \"fas fa-couch\"},\r\n{ \"item\": \"Balcón\", \"icono\": \"far fa-image\"},\r\n{ \"item\": \"Servicio Wifi\", \"icono\": \"fas fa-wifi\"}]', 5000, 5000, 55000, 95000, 170000, '2021-11-01 20:45:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inferior`
--

CREATE TABLE `inferior` (
  `id` int(11) NOT NULL,
  `foto_grande` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inferior`
--

INSERT INTO `inferior` (`id`, `foto_grande`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 'vistas/img/bann_inf/img2.jpg', 'Lingo\'s', 'Espacios de trabajo para idear tu nuevo emprendimiento, trabajar junto a tu equipo o realizar talleres que aporten a tu crecimiento personal.', '2021-11-01 20:34:20'),
(2, 'vistas/img/bann_inf/img1.jpg', 'KAFFE', 'Acompaña tu tarde de trabajo junto a un rico café, disponible en el primer piso de nuestro local', '2021-11-01 20:34:26'),
(3, 'vistas/img/bann_inf/img3.jpg', 'PLANEA TU FUTURO', 'Espacios de trabajo para idear tu nuevo emprendimiento, trabajar junto a tu equipo o realizar talleres que aporten a tu crecimiento personal.', '2021-11-01 20:34:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `tipo`, `img`, `descripcion`, `precio`, `fecha`) VALUES
(1, 'Plan 16 horas mensuales', 'vistas/img/planes/plan16h.jpg', 'Plan que incluye 16 horas mensuales que podrán ser usadas al gusto del cliente como estime conveniente a lo largo de este periodo de tiempo.', 10000, '2021-06-24 18:12:28'),
(2, 'Plan 32 horas mensuales', 'vistas/img/planes/plan32h.jpg', 'Plan que incluye 32 horas mensuales que podrán ser usadas al gusto del cliente como estime conveniente a lo largo de este periodo de tiempo.', 6000, '2021-06-24 18:13:39'),
(3, 'Plan 64 horas mensuales', 'vistas/img/planes/plan64h.jpg', 'Plan que incluye 64 horas mensuales que podrán ser usadas al gusto del cliente como estime conveniente a lo largo de este periodo de tiempo.', 6000, '2021-06-24 18:11:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_salas` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pago_reserva` float NOT NULL,
  `numero_transaccion` text NOT NULL,
  `codigo_reserva` text NOT NULL,
  `descripcion_reserva` text NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL,
  `fecha_reserva` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_salas`, `id_usuario`, `pago_reserva`, `numero_transaccion`, `codigo_reserva`, `descripcion_reserva`, `fecha_ingreso`, `fecha_salida`, `fecha_reserva`) VALUES
(15, 8, 7, 18000, '1239598366', '', 'Sala Estandar New York - Precio Hora - Precio plan -', '2021-08-09 17:00:00', '2021-08-09 20:00:00', '2021-08-09 20:16:04'),
(16, 2, 6, 30000, '1239600535', '', 'Sala Grande Londres - Precio Hora - Precio plan -', '2021-08-09 17:00:00', '2021-08-09 20:00:00', '2021-08-09 20:45:09'),
(17, 1, 7, 42000, '1239698168', '', 'Sala Estandar Rio - Precio Hora - Precio plan -', '2021-08-12 10:00:00', '2021-08-12 17:00:00', '2021-08-12 00:18:42'),
(18, 9, 7, 12000, '1239734794', '', 'Sala Estandar Paris - Precio Hora - Precio plan -', '2021-08-12 18:00:00', '2021-08-12 20:00:00', '2021-08-12 21:38:43'),
(19, 8, 7, 36000, '1239739450', '', 'Sala Estandar New York - Precio Hora - Precio plan -', '2021-08-13 10:00:00', '2021-08-13 16:00:00', '2021-08-13 00:46:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `id_s` int(11) NOT NULL,
  `tipo_s` int(11) NOT NULL,
  `estilo` text NOT NULL,
  `galeria` text NOT NULL,
  `descripcion_s` text NOT NULL,
  `fecha_s` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id_s`, `tipo_s`, `estilo`, `galeria`, `descripcion_s`, `fecha_s`) VALUES
(1, 2, 'Rio', '[\"vistas/img/grande/img1.jpg\", \"vistas/img/grande/img2.jpg\", \"vistas/img/grande/img3.jpg\",\n\"vistas/img/grande/img4.jpg\",\n\"vistas/img/grande/img5.png\"]', '\r\n<p>Sala estándar con capacidad de 5 a 10 personas, ideal para realizar trabajo remoto en un ambiente tranquilo, trabajar con tu equipo de trabajo en un nuevo proyecto o en deberes de la universidad junto a tus compañeros.\r\nPosee unos 18 mt2 (aprox) equipada con un escritorio, silla de escritorio, silla de visitas, pizarra, perchero y una mesa de trabajo con sillas para más espacio. Perfecto para una oficina, reuniones o uso como sala de clase. Cada sala viene con amplia luz natural, acondicionado (frio y caliente), wifi y acceso a los baños y sala de espera. También se puede agregar el uso de un data show, un coffee break, o pedido de nuestra carta del Kaffe Café (todo con un valor agregado)  </p>\r\n\r\n<br>\r\n<b>\r\n					<h3>Valor por hora</h3>\r\n\r\n					<p>(Precios)<br>\r\n					Early bird (Antes de las 16:00): $3.000 CLP<br>\r\n					Hora Peak: $6.000 CLP</p>\r\n					<br>\r\n\r\n<h3>Plan 16 HRS Mensuales</h3>\r\n<br>\r\n					Valor: $55.000CLP<br>\r\n<br>\r\n<h3>Plan 32 HRS Mensuales</h3>\r\n<br>\r\n					Valor: $95.000CLP<br>\r\n<br>\r\n<h3>Plan 64 HRS Mensuales</h3>\r\n<br>\r\n					Valor: $170.000CLP<br>\r\n\r\n</b>', '2021-11-01 20:35:49'),
(2, 1, 'Londres', '[\"vistas/img/estandar/rio/img1.jpg\", \"vistas/img/estandar/rio/img2.jpg\",\n\"vistas/img/estandar/rio/img3.jpg\"]\n', '\r\n<p>La sala Londres es la más grande de todas, está pensada para la realización de talleres en grupos, ya que esta tiene una capacidad aproximada de 10 a 20 personas. Está completamente equipada con sillas, mesones, pizarrón y aire acondicionado para mantener un grato ambiente dentro de la sala, además de hacer alusión a su nombre a través de la decoración que esta posee.\r\nPosee unos 22 mts (aprox), equipada con  un escritorio, silla de escritorio, pizarra y  lección de mesas y sillas de visita o sillas universitarios. Perfecto para reuniones, capacitaciones, presentaciones o talleres mas grandes.  Cada sala viene con amplia luz natural, acondicionado (frio y caliente), wifi y acceso a los baños y sala de espera. También se puede agregar el uso de un data show, un coffee break, o pedido de nuestra carta del Kaffe Café (todo con un valor agregado)  \r\n</p>\r\n\r\n<br>\r\n<b>\r\n					<h3>Valor por hora</h3>\r\n\r\n					<p><br>\r\n					Early bird (Antes de las 16:00): $8.000 CLP<br>\r\n					Hora Peak: $10.000 CLP</p>\r\n					<br>\r\n\r\n<h3>Plan 16 HRS Mensuales</h3>\r\n<br>\r\n					Valor: $72.000CLP<br>\r\n\r\n<br>\r\n<h3>Plan 32 HRS Mensuales</h3>\r\n<br>					Valor: $125.000CLP<br>\r\n<br>\r\n<h3>Plan 64 HRS Mensuales</h3>\r\n\r\n<br>\r\nValor: $220.000CLP<br>\r\n</b>\r\n					\r\n', '2021-11-01 20:36:03'),
(8, 2, 'New York', '[\"vistas/img/estandar/newyork/img1.jpg\", \"vistas/img/estandar/newyork/img2.jpg\",\n\"vistas/img/estandar/newyork/img3.jpg\",\n\"vistas/img/estandar/newyork/img4.jpg\",\n\"vistas/img/estandar/newyork/img5.jpg\"]\n\n', '\r\n<p>Sala estándar con capacidad de 5 a 10 personas, ideal para realizar trabajo remoto en un ambiente tranquilo, trabajar con tu equipo de trabajo en un nuevo proyecto o en deberes de la universidad junto a tus compañeros.\r\nPosee unos 18 mt2 (aprox) equipada con un escritorio, silla de escritorio, sillas de visitas, pizarra, perchero y una cómoda esquina con sillones, alfombra, mesita, plantas y pinturas. Perfecto para una oficina con atención al clientes o reuniones pequeñas.  Cada sala viene con amplia luz natural, acondicionado (frio y caliente), wi-fi y acceso a los baños y sala de espera. También se puede agregar el uso de un data show, un coffee break, o pedido de nuestra carta del Kaffe Café (todo con un valor agregado)</p>\r\n\r\n<br>\r\n<b>\r\n					<h3>Valor por hora</h3>\r\n\r\n					<p>(Precios)<br>\r\n					Early bird (Antes de las 16:00): $3.000 CLP<br>\r\n					Hora Peak: $6.000 CLP</p>\r\n					<br>\r\n\r\n<h3>Plan 16 HRS Mensuales</h3>\r\n<br>\r\n					Valor: $55.000CLP<br>\r\n<br>\r\n<h3>Plan 32 HRS Mensuales</h3>\r\n<br>\r\n					Valor: $95.000CLP<br>\r\n<br>\r\n<h3>Plan 64 HRS Mensuales</h3>\r\n<br>\r\n					Valor: $170.000CLP<br>\r\n\r\n</b>', '2021-11-01 20:36:28'),
(9, 2, 'Paris', '[\"vistas/img/estandar/paris/img1.jpg\", \"vistas/img/estandar/paris/img2.jpg\", \"vistas/img/estandar/paris/img3.jpg\",\n\"vistas/img/estandar/paris/img4.jpg\",\n\"vistas/img/estandar/paris/img5.jpg\",\n\"vistas/img/estandar/paris/img6.png\"]', '\r\n<p>Sala estándar con capacidad de 5 a 10 personas, ideal para realizar trabajo remoto en un ambiente tranquilo, trabajar con tu equipo de trabajo en un nuevo proyecto o en deberes de la universidad junto a tus compañeros.\r\nPosee unos 18 mt2 (aprox) equipada con un escritorio, silla de escritorio, sillas de visitas, pizarra, perchero y una cómoda esquina con sillones, alfombra, mesita, plantas y pinturas. Perfecto para una oficina con atención al clientes o reuniones pequeñas.  Cada sala viene con amplia luz natural, acondicionado (frio y caliente), wi-fi y acceso a los baños y sala de espera. También se puede agregar el uso de un data show, un coffee break, o pedido de nuestra carta del Kaffe Café (todo con un valor agregado)</p>\r\n\r\n<br>\r\n<b>\r\n					<h3>Valor por hora</h3>\r\n\r\n					<p>(Precios)<br>\r\n					Early bird (Antes de las 16:00): $3.000 CLP<br>\r\n					Hora Peak: $6.000 CLP</p>\r\n					<br>\r\n\r\n<h3>Plan 16 HRS Mensuales</h3>\r\n<br>\r\n					Valor: $55.000CLP<br>\r\n<br>\r\n<h3>Plan 32 HRS Mensuales</h3>\r\n<br>\r\n					Valor: $95.000CLP<br>\r\n<br>\r\n<h3>Plan 64 HRS Mensuales</h3>\r\n<br>\r\n					Valor: $170.000CLP<br>\r\n\r\n</b>', '2021-11-01 20:36:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_u` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `foto` text NOT NULL,
  `modo` text NOT NULL,
  `verificacion` int(11) NOT NULL,
  `email_encriptado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_u`, `nombre`, `password`, `email`, `foto`, `modo`, `verificacion`, `email_encriptado`, `fecha`) VALUES
(4, 'César', '$2a$07$asxx54ahjppf45sd87a5au3TNP/GsA6Bj/x8Vd1l6KGGzcgxnay.y', 'cesar@gmail.com', '', 'directo', 1, '927bdbe73c948e989741edb3280c73ba', '2021-08-08 19:37:25'),
(5, 'César', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'cesar1@gmail.com', '', 'directo', 1, '76365749660a989c923e9a181c4a1d54', '2021-08-09 00:52:41'),
(6, 'Alexis', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'alexis@gmail.com', '', 'directo', 1, '02ea1162fc426e0235da202ce53638a6', '2021-08-16 00:58:31'),
(7, 'César Soto', 'null', 'cesar_17soto@outlook.com', 'http://graph.facebook.com/4778337868860561/picture?type=large', 'facebook', 1, 'null', '2021-08-09 02:39:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inferior`
--
ALTER TABLE `inferior`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id_s`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cafe`
--
ALTER TABLE `cafe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inferior`
--
ALTER TABLE `inferior`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
