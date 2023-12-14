-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2023 a las 23:42:55
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
-- Base de datos: `sexto`
--
CREATE DATABASE IF NOT EXISTS `sexto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sexto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

DROP TABLE IF EXISTS `autores`;
CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `autores`:
--

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `nombre`, `nacionalidad`, `fecha_nacimiento`) VALUES
(33, 'Paulo Cohello', 'Colombiano', '1993-02-03'),
(34, 'David Lopez', 'Ecuatoriano', '1985-04-17'),
(36, 'David Lopez', 'Peruano', '2023-12-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `libros`:
--   `id_autor`
--       `autores` -> `id_autor`
--

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `id_autor`, `genero`, `fecha_publicacion`) VALUES
(21, 'Hola', 33, 'Ficcion', '2023-12-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `UsuarioId` int(11) NOT NULL,
  `Cedula` varchar(17) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Telefono` varchar(17) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Contrasenia` text NOT NULL,
  `Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- RELACIONES PARA LA TABLA `usuarios`:
--

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioId`, `Cedula`, `Nombres`, `Apellidos`, `Telefono`, `Correo`, `Contrasenia`, `Rol`) VALUES
(2, '0604899732', 'kev', 'sa', '099789', 'qwe1@gmail.com', '123', 'Administrador'),
(3, '0602626004', 'sa', 'ff', '0962789892', 'kevinsan16@gmail.com', '123', 'Administrador'),
(4, '0602559817', 'dsd', 'sd', '2222222222', 'kevinsan2323@gmail.com', '123', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id_autor`);


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla autores
--

--
-- Metadatos para la tabla libros
--

--
-- Metadatos para la tabla usuarios
--

--
-- Metadatos para la base de datos sexto
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
