-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-12-2023 a las 18:34:31
-- Versión del servidor: 10.6.16-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u690567133_botanical`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `ID` int(11) NOT NULL,
  `Usuario` varchar(20) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Contraseña` varchar(255) DEFAULT NULL,
  `Pregunta` varchar(50) DEFAULT NULL,
  `Respuesta` varchar(255) DEFAULT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `Bloqueo` int(2) DEFAULT 0,
  `suscrito` tinyint(1) DEFAULT NULL,
  `registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`ID`, `Usuario`, `Correo`, `Contraseña`, `Pregunta`, `Respuesta`, `Nombre`, `Bloqueo`, `suscrito`, `registro`) VALUES
(0, 'admin', 'botanicalgarden000@gmail.com', '$2y$10$615iY85obJoJezozzRowTenUiFnsBf2My8A0XIg2352QGiLl0gF0u', '¿Nombre de tu primera mascota?', 'owo', 'admin', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupones`
--

CREATE TABLE `cupones` (
  `ID` int(11) NOT NULL,
  `Codigo` varchar(10) DEFAULT NULL,
  `Descuento` int(11) DEFAULT NULL,
  `FechaTermino` date DEFAULT NULL,
  `Metodo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cupones`
--

INSERT INTO `cupones` (`ID`, `Codigo`, `Descuento`, `FechaTermino`, `Metodo`) VALUES
(1, 'BGARDEN', 15, '2024-01-15', 0),
(2, 'NAVIDAD20', 20, '2024-01-15', 1),
(3, 'GREENBG', 10, '2024-01-15', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  `Descripcion` varchar(80) DEFAULT NULL,
  `Categoria` varchar(25) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Descuento` int(11) DEFAULT NULL,
  `imagen` varchar(80) DEFAULT NULL,
  `PrecioN` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `Nombre`, `Descripcion`, `Categoria`, `Cantidad`, `Precio`, `Descuento`, `imagen`, `PrecioN`) VALUES
(1, 'Helecho', 'Hermosa planta de sombra, perfecta para decoración, combte la sequedad', 'Sombra', 7, 160, 5, 'helecho.png', 152),
(2, 'Calatea Crocata', 'Planta de sombra, destaca por sus flores anaranjadas ideal para decorar', 'Sombra', 15, 220, 0, 'calatea.jpg', 220),
(3, 'Boca de Dragón', 'Florece desde la primavera al otoño, mejor en climas templados, se al sol', 'Sol', 20, 180, 0, 'dragon.jpg', 180),
(4, 'Azalea', 'Requiere bastantes cuidados, la azalea filtra el aire, sobre todos los químicos', 'Sombra', 9, 145, 10, 'azalea.jpg', 130.5),
(5, 'Girasol', 'El Girasol es una planta bonita, elegante y muy colorida', 'Sol', 35, 110, 0, 'girasol.jpg', 110),
(6, 'Hibisco', 'De la familia de las malváceas, es una planta procedente de Asia', 'Sol', 12, 215, 15, 'hibisco.jpg', 182.75),
(7, 'Tulipán', 'El hermoso tulipán, ideal para darle una vista elegante a tu jardín', 'Sol', 27, 120, 0, 'tulipan.jpg', 120),
(8, 'Echeveria elegans', 'Es una especie de planta suculenta de la familia de las crasuláceas', 'Sombra', 20, 140, 0, 'suculenta.jpg', 140),
(9, 'Pensamiento', 'Perfecta para decorar jardines por su gran colorido y resistencia al clima', 'Sol', 13, 165, 8, 'pensamiento.jpg', 151.8),
(12, 'Begonia Híbrida', 'Cultivada en el interior, planta de origen tropical, no tolera bien el frio.', 'Sombra', 25, 175, 12, 'begonia.jpg', 154),
(13, 'Hortensia', 'Hermosa planta nativas del sur y el este de Asia​ y de América', 'Sombra', 30, 235, 10, 'hortensia.jpg', 211.5),
(14, 'Rosal', 'El rosal es una de las plantas más populares de los jardines, perfecta para el h', 'Sol', 15, 210, 0, 'rosal.jpg', 210),
(15, 'Citronelas', 'La citronela es una planta natural de Sri Lanka y la costa Malabar.', 'Sol', 9, 240, 17, 'citronela.jpg', 199.2),
(16, 'Astilbe', 'El astilbe florece en verano llenando de color esta estación', 'Sombra', 14, 315, 0, 'astilbe.jpg', 315),
(17, 'Buganvilla', 'Una de las flores más bonitas y vistosas para elegir en verano', 'Sol', 32, 280, 0, 'bougainvillea.jpg', 280),
(18, 'Cactus', 'Son plantas muy demandadas, fáciles de cuidar, de especies muy variadas', 'Sol', 25, 250, 0, 'cactus.jpg', 250),
(19, 'Petunia', 'Flor famosa debido a sus hermosas flores multicolores en forma de trompeta', 'Sombra', 25, 95, 0, 'petunia.jpg', 95),
(20, 'Ficus', 'Una de las plantas más bonitas para decorar el hogar.', 'Sombra', 23, 235, 7, 'ficus.jpg', 218.55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usado`
--

CREATE TABLE `usado` (
  `IDCliente` int(11) DEFAULT NULL,
  `IDCupon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `IDcliente` int(11) DEFAULT NULL,
  `IDproducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `cupones`
--
ALTER TABLE `cupones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usado`
--
ALTER TABLE `usado`
  ADD KEY `IDCliente` (`IDCliente`),
  ADD KEY `IDCupon` (`IDCupon`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD KEY `IDcliente` (`IDcliente`),
  ADD KEY `IDproducto` (`IDproducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cupones`
--
ALTER TABLE `cupones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usado`
--
ALTER TABLE `usado`
  ADD CONSTRAINT `usado_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `cuenta` (`ID`),
  ADD CONSTRAINT `usado_ibfk_2` FOREIGN KEY (`IDCupon`) REFERENCES `cupones` (`ID`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`IDcliente`) REFERENCES `cuenta` (`ID`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`IDproducto`) REFERENCES `productos` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
