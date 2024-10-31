-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2024 a las 21:14:18
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
-- Base de datos: `sistema_usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `created_at`) VALUES
(1, 1, 1, 'como estas\r\n', '2024-10-27 04:27:36'),
(2, 5, 8, 'hola', '2024-10-27 06:02:08'),
(3, 4, 8, 'holo', '2024-10-27 06:09:30'),
(4, 4, 8, 'holo', '2024-10-27 06:10:51'),
(5, 4, 8, 'holo', '2024-10-27 06:12:40'),
(6, 4, 8, 'holo', '2024-10-27 06:14:02'),
(7, 4, 8, 'holo', '2024-10-27 06:17:53'),
(8, 4, 8, 'holo', '2024-10-27 06:19:02'),
(9, 11, 8, 'hola', '2024-10-27 06:27:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compania`
--

CREATE TABLE `compania` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `VIP` enum('si','no') NOT NULL,
  `Provincia` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `created_at`) VALUES
(1, 1, 'comunidad.', '2024-10-27 04:27:28'),
(2, 1, 'buen dia para un viaje', '2024-10-27 04:27:51'),
(3, 1, 'holo\r\n', '2024-10-27 04:28:42'),
(4, 1, 'buen dia para un viaje', '2024-10-27 04:28:49'),
(5, 8, 'hola buen dia', '2024-10-27 06:02:01'),
(6, 8, 'holo', '2024-10-27 06:19:30'),
(7, 8, 'holo', '2024-10-27 06:20:35'),
(8, 8, 'holo', '2024-10-27 06:21:43'),
(9, 8, 'holo', '2024-10-27 06:21:49'),
(10, 8, 'holo', '2024-10-27 06:22:57'),
(11, 8, 'holo', '2024-10-27 06:24:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `contenido` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id`, `usuario_id`, `contenido`, `fecha`) VALUES
(4, 1, '\"Volar con esta aerolínea fue una experiencia muy buena. El personal fue amable, los asientos cómodos, y todo estuvo en orden y a tiempo. El embarque fue rápido y la atención a bordo excelente. Definitivamente volvería a viajar con ellos.\"', '2024-10-27 03:17:12'),
(6, 8, 'Acabo de volar con [nombre de la aerolínea] y la experiencia fue excepcional. Desde el momento del check-in, el personal fue amable y eficiente, haciendo que el proceso fuera rápido y sin complicaciones. El vuelo salió a tiempo, y la tripulación a bordo fue muy atenta, asegurándose de que todos los pasajeros estuvieran cómodos. La comodidad del asiento fue una grata sorpresa, especialmente en un vuelo de larga duración. Además, la selección de entretenimiento a bordo era amplia, lo que hizo que el tiempo pasara volando. Sin duda, recomiendo [nombre de la aerolínea] y estoy ansioso por volar con ellos nuevamente en mi próximo viaje', '2024-10-27 06:01:22'),
(7, 1, 'holo', '2024-10-31 18:16:05'),
(8, 1, 'holo', '2024-10-31 19:38:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `password`, `fecha_registro`) VALUES
(1, 'holo', '$2y$10$obOJKc8YdnsiA1TALcriwuv.EWjV5A4idCS.lh.ycXPZ1zjoWbrlS', '2024-10-26 23:16:06'),
(8, 'dani', '$2y$10$WwC3bIJyTxv52sEmCVqU7u/q1gE5toJad9LtsPdcCgVIUBJsss2m2', '2024-10-27 06:00:23'),
(9, 'care', '$2y$10$24l73MK9O1b.Z6vr19NXH.sGQl6MJvWq8Mq/q0vNhWIohOUiDRifS', '2024-10-31 19:50:20'),
(10, 'core', '$2y$10$0tueC5NcJ/y6ItkfYDA7O.eu5YSV/dI3Z7b/b6z9spxjDeacIGr5y', '2024-10-31 19:51:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `compania`
--
ALTER TABLE `compania`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `compania`
--
ALTER TABLE `compania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD CONSTRAINT `testimonios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
