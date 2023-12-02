-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3029
-- Tiempo de generación: 02-12-2023 a las 06:37:25
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
-- Base de datos: `botanical`
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
  `Bloqueo` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`ID`, `Usuario`, `Correo`, `Contraseña`, `Pregunta`, `Respuesta`, `Nombre`, `Bloqueo`) VALUES
(1, 'BryanM', 'jalkemmorales@gmail.com', 'owo', '¿Nombre de tu primera mascota?', 'Rufi', 'Bryan Misael Morales Martin', 0);

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
(13, 'Hortensia', 'Hermosa planta nativas del sur y el este de Asia​ y de América', 'Sombra', 31, 235, 10, 'hortensia.jpg', 211.5),
(14, 'Rosal', 'El rosal es una de las plantas más populares de los jardines, perfecta para el hogar', 'Sol', 15, 210, 0, 'rosal.jpg', 210),
(15, 'Citronelas', 'La citronela es una planta natural de Sri Lanka y la costa Malabar.', 'Sol', 10, 240, 17, 'citronela.jpg', 199.2),
(16, 'Astilbe', 'El astilbe florece en verano llenando de color esta estación', 'Sombra', 14, 315, 0, 'astilbe.jpg', 315),
(17, 'Buganvilla', 'Una de las flores más bonitas y vistosas para elegir en verano', 'Sol', 32, 280, 0, 'bougainvillea.jpg', 280),
(18, 'Cactus', 'Son plantas muy demandadas, fáciles de cuidar, de especies muy variadas', 'Sol', 27, 250, 0, 'cactus.jpg', 250),
(19, 'Petunia', 'Flor famosa debido a sus hermosas flores multicolores en forma de trompeta', 'Sombra', 25, 95, 0, 'petunia.jpg', 95),
(20, 'Ficus', 'Una de las plantas más bonitas para decorar el hogar.', 'Sombra', 23, 235, 7, 'ficus.jpg', 218.55);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
