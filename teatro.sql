-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2022 a las 18:55:16
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `teatro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `id` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Apellido` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `altura` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`id`, `Nombre`, `Apellido`, `fecha_nacimiento`, `nacionalidad`, `altura`) VALUES
(1, 'Julian', 'Roman', '1977-11-23', 'Colombiano', 1.58),
(2, 'Carlos', 'Benjumea', '1941-01-23', 'Colombiano', 1.5),
(3, 'Jorge Enrique', 'Abello', '1968-02-28', 'Colombiano', 1.8),
(4, 'Valentina', 'Acosta', '1982-07-23', 'Colombiano', 1.68),
(5, 'Lina', 'Tejeiro', '1991-10-08', 'Colombiano', 1.6),
(6, 'Ivan', 'Lopez', '1980-08-25', 'Colombiano', 1.78),
(7, 'Santiago', 'Alarcon', '1979-11-23', 'Colombiano', 1.8),
(8, 'Carolina', 'Gaitan', '1984-03-04', 'Colombiano', 1.68);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores_peliculas`
--

CREATE TABLE `actores_peliculas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `actor_id` int(10) UNSIGNED NOT NULL,
  `pelicula_id` int(10) UNSIGNED NOT NULL,
  `papel` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `personaje` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `costo` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `actores_peliculas`
--

INSERT INTO `actores_peliculas` (`id`, `actor_id`, `pelicula_id`, `papel`, `personaje`, `costo`) VALUES
(1, 1, 3, 'protagonista', 'treinta y ocho', '30,000.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `nacionalidad` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `url_foto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`id`, `nombre`, `nacionalidad`, `fecha_nacimiento`, `url_foto`) VALUES
(1, 'Guillermo Del Toro', 'mexicano', '1964-10-09', 'https://media.glamour.mx/photos/61961e14dd26e0d8fb30a4db/master/w_1600%2Cc_limit/200360.jpg'),
(2, 'Taika Waititi', 'neozelandes', '1975-08-16', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/Taika_Waititi_by_Gage_Skidmore_2.jpg/640px-Taika_Waititi_by_Gage_Skidmore_2.jpg'),
(3, 'Guillermo Del Toro', 'mexicano', '1964-10-09', 'https://media.glamour.mx/photos/61961e14dd26e0d8fb30a4db/master/w_1600%2Cc_limit/200360.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `episodios`
--

CREATE TABLE `episodios` (
  `id` int(10) UNSIGNED NOT NULL,
  `n_episodio` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_episodio` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `duracion_epi` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `descrip_episodio` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `temporada_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Activo` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `Nombre`, `Activo`) VALUES
(1, 'Acción', b'1'),
(2, 'Aventuras', b'1'),
(3, 'Ciencia Ficción', b'1'),
(4, 'Comedia', b'1'),
(5, 'No- Ficción / documental', b'1'),
(6, 'Animacion', b'1'),
(7, 'Romance', b'1'),
(8, 'Thriller Psicologico', b'1'),
(9, 'Drama', b'1'),
(10, 'Suspenso', b'1'),
(11, 'llorona', b'0'),
(12, 'terror', b'0'),
(15, '', b'0'),
(16, '', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sipnosis` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `puntaje_imd` float DEFAULT NULL,
  `portada` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `director_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `sipnosis`, `puntaje_imd`, `portada`, `director_id`) VALUES
(3, 'La forma del agua', 'En un centro de investigación de alto secreto en la década de 1960, una solitaria conserje entabla una relación única con una criatura anfibia que est', 7.3, 'https://www.imdb.com/title/tt5580390/mediaviewer/rm2574145024/?ref_=tt_ov_i', 1),
(4, 'Thor:Ragnarok', 'Thor está cautivo en el planeta Sakaar, y debe embarcarse en una carrera contra reloj para volver a Asgard y detener Ragnarök, la destrucción del mund', 3.9, 'https://www.imdb.com/title/tt3501632/mediaviewer/rm459174912/?ref_=tt_ov_i', 2),
(11, 'detras del ultimo no hay nadie', 'no hay nadie aniah aniah ', 6.6, '', 1),
(12, 'la patada mortal del mocho', 'un mocho con un mocholon', 5.6, '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rating_peliculas`
--

CREATE TABLE `rating_peliculas` (
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `pelicula_id` int(10) UNSIGNED NOT NULL,
  `puntaje` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id` int(10) UNSIGNED NOT NULL,
  `tit_serie` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sinop_serie` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `img_serie` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `director_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--

CREATE TABLE `temporadas` (
  `id` int(10) UNSIGNED NOT NULL,
  `ntemporada` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `inf_temporada` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `img_temporada` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `serie_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Apellidos` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Correo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Celular` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Nombres`, `Apellidos`, `Correo`, `Celular`) VALUES
(1, 'Julian', 'Castro', 'juan.cuero@unillanos.edu.co', '3215578963'),
(2, 'Andres', 'Rengifo', 'Jcastro25@hotmail.com', '3124099328'),
(3, 'Mario', 'Vargas', 'renegifo@gmail', '3008882569'),
(4, 'Maribel', 'Hernanez', 'mariobross@yahoo.com', '3118824567');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `actores_peliculas`
--
ALTER TABLE `actores_peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actor_id` (`actor_id`),
  ADD KEY `pelicula_id` (`pelicula_id`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `episodios`
--
ALTER TABLE `episodios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temporada_id` (`temporada_id`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `director_id` (`director_id`);

--
-- Indices de la tabla `rating_peliculas`
--
ALTER TABLE `rating_peliculas`
  ADD PRIMARY KEY (`usuario_id`,`pelicula_id`),
  ADD KEY `pelicula_id` (`pelicula_id`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `director_id` (`director_id`);

--
-- Indices de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serie_id` (`serie_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Correo` (`Correo`),
  ADD UNIQUE KEY `UC_CORREO` (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `actores_peliculas`
--
ALTER TABLE `actores_peliculas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `episodios`
--
ALTER TABLE `episodios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actores_peliculas`
--
ALTER TABLE `actores_peliculas`
  ADD CONSTRAINT `actores_peliculas_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actores` (`id`),
  ADD CONSTRAINT `actores_peliculas_ibfk_2` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`id`);

--
-- Filtros para la tabla `episodios`
--
ALTER TABLE `episodios`
  ADD CONSTRAINT `episodios_ibfk_1` FOREIGN KEY (`temporada_id`) REFERENCES `temporadas` (`id`);

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `directores` (`id`);

--
-- Filtros para la tabla `rating_peliculas`
--
ALTER TABLE `rating_peliculas`
  ADD CONSTRAINT `rating_peliculas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `rating_peliculas_ibfk_2` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`id`);

--
-- Filtros para la tabla `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `directores` (`id`);

--
-- Filtros para la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD CONSTRAINT `temporadas_ibfk_1` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
