-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2021 a las 21:50:14
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `greenbuddiesbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_blog`
--

CREATE TABLE `articulos_blog` (
  `idArticulos_Blog` int(11) NOT NULL,
  `titulo` varchar(45) CHARACTER SET utf8 NOT NULL,
  `contenidoHTML` varchar(45) CHARACTER SET utf8 NOT NULL,
  `Imagenes_id` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_has_productos`
--

CREATE TABLE `carrito_has_productos` (
  `Carrito_idCarrito` int(11) NOT NULL,
  `Productos_idProductos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategorias` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 NOT NULL,
  `descripcion` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `Imagenes_id` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_postales`
--

CREATE TABLE `codigos_postales` (
  `idCodigos_Postales` int(11) NOT NULL,
  `codigoPostal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `codigos_postales`
--

INSERT INTO `codigos_postales` (`idCodigos_Postales`, `codigoPostal`) VALUES
(1, 5000),
(2, 5870);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `idEtiquetas` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas_has_articulos_blog`
--

CREATE TABLE `etiquetas_has_articulos_blog` (
  `Etiquetas_idEtiquetas` int(11) NOT NULL,
  `Articulos_Blog_idArticulos_Blog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idImagenes` int(11) NOT NULL,
  `imagenSrc` varchar(45) CHARACTER SET utf8 NOT NULL,
  `Productos_idProductos` int(11) NOT NULL,
  `Articulos_Blog_idArticulos_Blog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `idPaises` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idPaises`, `nombre`) VALUES
(1, 'Argentina'),
(2, 'Bolivia'),
(3, 'Brasil'),
(4, 'Chile'),
(5, 'Paraguay'),
(6, 'Uruguay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` mediumtext CHARACTER SET utf8 DEFAULT NULL,
  `Categorias_idCategorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `idProvincias` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`idProvincias`, `nombre`) VALUES
(24, 'Buenos Aires'),
(25, 'Catamarca'),
(26, 'Chaco'),
(27, 'Chubut'),
(28, 'Córdoba'),
(29, 'Corrientes'),
(30, 'Entre Ríos'),
(31, 'Formosa'),
(32, 'Jujuy'),
(33, 'La Pampa'),
(34, 'La Rioja'),
(35, 'Mendoza'),
(36, 'Neuquén'),
(37, 'Chubut'),
(38, 'Río Negro'),
(39, 'Salta'),
(40, 'San Juan'),
(41, 'San Luis'),
(42, 'Santa Cruz'),
(43, 'Santa Fe'),
(44, 'Santiago del Estero'),
(45, 'Tierra del Fuego'),
(46, 'Tucumán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `apellido` varchar(45) CHARACTER SET utf8 NOT NULL,
  `contrasenia` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fechaNacimiento` varchar(45) CHARACTER SET utf8 NOT NULL,
  `Paises_idPaises` int(11) DEFAULT NULL,
  `Provincias_idProvincias` int(11) DEFAULT NULL,
  `Codigos_Postales_idCodigos_Postales` int(11) DEFAULT NULL,
  `Carrito_idCarrito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nombre`, `email`, `apellido`, `contrasenia`, `fechaNacimiento`, `Paises_idPaises`, `Provincias_idProvincias`, `Codigos_Postales_idCodigos_Postales`, `Carrito_idCarrito`) VALUES
(1, 'Gustavo', 'gustavo@cerati.com', 'Cerati', '$2y$10$oM5TV3ghFZ4vRLTUwsZc3.1p79lrmV0cTN1dfIBYS16a8jl3oKDye', '1958-06-24', 1, NULL, NULL, NULL),
(2, 'Lionel Andrés', 'lionel@messi.com', 'Messi', '$2y$10$sSW88tE6JHw1wWnAsV.zYOJmiFzReFQUIXMIloTEWta0e5uPkF89a', '1987-06-24', 1, NULL, NULL, NULL),
(3, 'Susana', 'susana@gimenez.com', 'Gimenez', '$2y$10$9jRoPzWkqiHZMf5RtQ5D/.w6GDSYGDEUYspy5kqBhdJ9OZquckH/S', '1944-01-29', 1, NULL, NULL, NULL),
(4, 'Luis Alberto', 'luis@suarez.com', 'Suárez', '$2y$10$.l6DXmaHFdrLipNaS8lDo.YI3qdt4t2owNpY.DkNmdAJNBl6YvB02', '1987-01-24', 6, NULL, NULL, NULL),
(5, 'Jair', 'bolsonaro@brasil.com', 'Bolsonaro', '$2y$10$vxrEUZ3XZAG6SskV.du/w.xi28whkE36BKWF0YUzUU3U.CuvFrWUa', '1955-04-24', 3, NULL, NULL, NULL),
(6, 'Juan', 'juan@perez.com', 'Perez', '$2y$10$oZZ98KhOzPZPAH1Fgsp0LeGMkHeaLvBG3qwZhzCWYq4K1ClsENn.G', '2001-01-01', 1, NULL, NULL, NULL),
(7, 'Pedro', 'pedro@picapiedras.com', 'Picapiedras', '$2y$10$Mjkdn60qKA7jrgLCaIDl0eUHXeforKZuF2IbdXe3U6rNo03sTbztC', '1966-06-06', 2, NULL, NULL, NULL),
(8, 'María ', 'maria@becerra.com', 'Becerra', '$2y$10$2U2E4pd1gBplnMiIwWwyeeyUooWD/WkgpWVZ28M.vDaXVi23X1v6e', '2000-09-05', 1, NULL, NULL, NULL),
(9, 'Pablo', 'pablo@marmol.com', 'Marmol', '$2y$10$wpthlW7.QbIG.4tEGlOmdubIL22UXvcyzUbnUcG7WVssH4XvO8J9G', '1986-08-08', 5, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos_blog`
--
ALTER TABLE `articulos_blog`
  ADD PRIMARY KEY (`idArticulos_Blog`),
  ADD UNIQUE KEY `idArticulos_Blog_UNIQUE` (`idArticulos_Blog`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idCarrito`),
  ADD UNIQUE KEY `idCarrito_UNIQUE` (`idCarrito`);

--
-- Indices de la tabla `carrito_has_productos`
--
ALTER TABLE `carrito_has_productos`
  ADD PRIMARY KEY (`Carrito_idCarrito`,`Productos_idProductos`),
  ADD KEY `fk_Carrito_has_Productos_Productos1_idx` (`Productos_idProductos`),
  ADD KEY `fk_Carrito_has_Productos_Carrito1_idx` (`Carrito_idCarrito`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategorias`),
  ADD UNIQUE KEY `idCategorias_UNIQUE` (`idCategorias`);

--
-- Indices de la tabla `codigos_postales`
--
ALTER TABLE `codigos_postales`
  ADD PRIMARY KEY (`idCodigos_Postales`),
  ADD UNIQUE KEY `idCodigos_Postales_UNIQUE` (`idCodigos_Postales`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`idEtiquetas`),
  ADD UNIQUE KEY `idEtiquetas_UNIQUE` (`idEtiquetas`);

--
-- Indices de la tabla `etiquetas_has_articulos_blog`
--
ALTER TABLE `etiquetas_has_articulos_blog`
  ADD PRIMARY KEY (`Etiquetas_idEtiquetas`,`Articulos_Blog_idArticulos_Blog`),
  ADD KEY `fk_Etiquetas_has_Articulos_Blog_Articulos_Blog1_idx` (`Articulos_Blog_idArticulos_Blog`),
  ADD KEY `fk_Etiquetas_has_Articulos_Blog_Etiquetas1_idx` (`Etiquetas_idEtiquetas`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`idImagenes`),
  ADD UNIQUE KEY `idImagenes_UNIQUE` (`idImagenes`),
  ADD KEY `fk_Imagenes_Productos1_idx` (`Productos_idProductos`),
  ADD KEY `fk_Imagenes_Articulos_Blog1_idx` (`Articulos_Blog_idArticulos_Blog`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`idPaises`),
  ADD UNIQUE KEY `idPaises_UNIQUE` (`idPaises`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`),
  ADD UNIQUE KEY `idProductos_UNIQUE` (`idProductos`),
  ADD KEY `fk_Productos_Categorias1_idx` (`Categorias_idCategorias`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`idProvincias`),
  ADD UNIQUE KEY `idProvincias_UNIQUE` (`idProvincias`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD UNIQUE KEY `idUsuarios_UNIQUE` (`idUsuarios`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_Usuarios_Paises_idx` (`Paises_idPaises`),
  ADD KEY `fk_Usuarios_Provincias1_idx` (`Provincias_idProvincias`),
  ADD KEY `fk_Usuarios_Codigos_Postales1_idx` (`Codigos_Postales_idCodigos_Postales`),
  ADD KEY `fk_Usuarios_Carrito1_idx` (`Carrito_idCarrito`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos_blog`
--
ALTER TABLE `articulos_blog`
  MODIFY `idArticulos_Blog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idCarrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `codigos_postales`
--
ALTER TABLE `codigos_postales`
  MODIFY `idCodigos_Postales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `idEtiquetas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idImagenes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `idPaises` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `idProvincias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito_has_productos`
--
ALTER TABLE `carrito_has_productos`
  ADD CONSTRAINT `fk_Carrito_has_Productos_Carrito1` FOREIGN KEY (`Carrito_idCarrito`) REFERENCES `carrito` (`idCarrito`),
  ADD CONSTRAINT `fk_Carrito_has_Productos_Productos1` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`);

--
-- Filtros para la tabla `etiquetas_has_articulos_blog`
--
ALTER TABLE `etiquetas_has_articulos_blog`
  ADD CONSTRAINT `fk_Etiquetas_has_Articulos_Blog_Articulos_Blog1` FOREIGN KEY (`Articulos_Blog_idArticulos_Blog`) REFERENCES `articulos_blog` (`idArticulos_Blog`),
  ADD CONSTRAINT `fk_Etiquetas_has_Articulos_Blog_Etiquetas1` FOREIGN KEY (`Etiquetas_idEtiquetas`) REFERENCES `etiquetas` (`idEtiquetas`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_Imagenes_Articulos_Blog1` FOREIGN KEY (`Articulos_Blog_idArticulos_Blog`) REFERENCES `articulos_blog` (`idArticulos_Blog`),
  ADD CONSTRAINT `fk_Imagenes_Productos1` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_Productos_Categorias1` FOREIGN KEY (`Categorias_idCategorias`) REFERENCES `categorias` (`idCategorias`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuarios_Carrito1` FOREIGN KEY (`Carrito_idCarrito`) REFERENCES `carrito` (`idCarrito`),
  ADD CONSTRAINT `fk_Usuarios_Codigos_Postales1` FOREIGN KEY (`Codigos_Postales_idCodigos_Postales`) REFERENCES `codigos_postales` (`idCodigos_Postales`),
  ADD CONSTRAINT `fk_Usuarios_Paises` FOREIGN KEY (`Paises_idPaises`) REFERENCES `paises` (`idPaises`),
  ADD CONSTRAINT `fk_Usuarios_Provincias1` FOREIGN KEY (`Provincias_idProvincias`) REFERENCES `provincias` (`idProvincias`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
