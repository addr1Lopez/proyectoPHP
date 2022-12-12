-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2022 a las 00:08:54
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidades`
--

CREATE TABLE `comunidades` (
  `codComunidad` int(4) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comunidades`
--

INSERT INTO `comunidades` (`codComunidad`, `nombre`) VALUES
(1, 'Andalucía'),
(2, 'Aragón'),
(3, 'Asturias (Principado de)'),
(4, 'Balears (IIles)'),
(5, 'Canarias'),
(6, 'Cantabria'),
(7, 'Castilla-La Mancha'),
(8, 'Castilla y León'),
(9, 'Cataluña'),
(10, 'Comunidad Valenciana'),
(11, 'Extremadura'),
(12, 'Galicia'),
(13, 'Madrid (Comunidad de)'),
(14, 'Murcia (Región de)'),
(15, 'Navarra (Comunidad Foral de)'),
(16, 'País Vasco'),
(17, 'Rioja (La)'),
(18, 'Ceuta'),
(19, 'Melilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `codPoblacion` int(5) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `codComunidad` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`codPoblacion`, `nombre`, `codComunidad`) VALUES
(1, 'Alava', 16),
(2, 'Albacete', 7),
(3, 'Alicante', 10),
(4, 'Almería', 1),
(5, 'Avila', 8),
(6, 'Badajoz', 11),
(7, 'Balears (Illes)', 4),
(8, 'Barcelona', 9),
(9, 'Burgos', 8),
(10, 'Cáceres', 11),
(11, 'Cádiz', 1),
(12, 'Castellón', 10),
(13, 'Ciudad Real', 7),
(14, 'Córdoba', 1),
(15, 'Coruña (A)', 12),
(16, 'Cuenca', 7),
(17, 'Girona', 9),
(18, 'Granada', 1),
(19, 'Guadalajara', 7),
(20, 'Guipzcoa', 16),
(21, 'Huelva', 1),
(22, 'Huesca', 2),
(23, 'Jaén', 1),
(24, 'León', 8),
(25, 'Lleida', 9),
(26, 'Rioja (La)', 17),
(27, 'Lugo', 12),
(28, 'Madrid', 13),
(29, 'Málaga', 1),
(30, 'Murcia', 14),
(31, 'Navarra', 15),
(32, 'Ourense', 12),
(33, 'Asturias', 3),
(34, 'Palencia', 8),
(35, 'Palmas (Las)', 5),
(36, 'Pontevedra', 12),
(37, 'Salamanca', 8),
(38, 'Santa Cruz de Tenerife', 5),
(39, 'Cantabria', 6),
(40, 'Segovia', 8),
(41, 'Sevilla', 1),
(42, 'Soria', 8),
(43, 'Tarragona', 9),
(44, 'Teruel', 2),
(45, 'Toledo', 7),
(46, 'Valencia', 10),
(47, 'Valladolid', 8),
(48, 'Vizcaya', 16),
(49, 'Zamora', 8),
(50, 'Zaragoza', 2),
(51, 'Ceuta', 18),
(52, 'Melilla', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(5) NOT NULL,
  `nif_cif` varchar(9) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `textoDescripcion` text DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `poblacion` varchar(30) DEFAULT NULL,
  `codigoPostal` int(5) DEFAULT NULL,
  `provincias` int(5) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL,
  `operario_encargado` varchar(30) DEFAULT NULL,
  `fechaRealizacion` date DEFAULT NULL,
  `anotacionesAnt` text NOT NULL,
  `anotacionesPos` text NOT NULL,
  `fichResumen` varchar(100) NOT NULL,
  `fotos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `nif_cif`, `nombre`, `apellidos`, `telefono`, `textoDescripcion`, `correo`, `direccion`, `poblacion`, `codigoPostal`, `provincias`, `estado`, `fechaCreacion`, `operario_encargado`, `fechaRealizacion`, `anotacionesAnt`, `anotacionesPos`, `fichResumen`, `fotos`) VALUES
(41, 'W4376609F', 'pepe', 'martinez', '675908790', 'gregregre', 'pepe@gmail.com', 'avenida grande 4', 'Guadalajara', 23789, 22, 'C', '2022-12-05', '50568279L', '2022-12-16', 'ddddddddddddd', 'regreg', '', ''),
(42, 'W4376609F', 'pepe', 'martinez', '643786578', 'gegrtg', 'pepe@gmail.com', 'avenida grande 4', 'Guadalajara', 21530, 19, 'R', '2022-12-05', '50568279L', '2022-12-16', 'AAAAAAAAAAAAAAAAAAAAA', 'trhgrth', '', ''),
(45, 'S0184203H', 'francisco', 'roman', '643091672', 'dddddddddddd', 'fran@gmail.com', 'avenida grande 4', 'Barcelona', 25678, 8, 'P', '2022-12-07', '50568279L', '2022-12-09', 'antes', 'antes', '', ''),
(46, 'W4376609F', 'francisco', 'roman', '643091672', 'TONTO EL QUE LO LEA', 'fran@gmail.com', 'avenida grande 4', 'Barcelona', 25678, 8, 'P', '2022-12-07', '50568279L', '2022-12-09', 'antes', 'antes', '', ''),
(48, 'S0184203H', 'martin', 'jimenez', '689432156', 'rgrgtrbgtrbtr', 'martin@gmail.com', 'avenida grande 4', 'Barcelona', 23789, 8, 'B', '2022-12-07', '15922387Q', '2022-12-09', 'aaaaaaaaaaa', 'bbbbbbbbbbbb', '', ''),
(49, 'S0184203H', 'martin', 'jimenez', '689432156', 'rgrgtrbgtrbtr', 'martin@gmail.com', 'avenida grande 4', 'Barcelona', 23789, 8, 'P', '2022-12-07', '15922387Q', '2022-12-11', 'AAAAAAAAAAAAAAAAA', 'AAAAAAAAAAAAAAAAA', '', ''),
(51, 'S0184203H', 'martin', 'jimenez', '689432156', 'rgrgtrbgtrbtr', 'martin@gmail.com', 'avenida grande 4', 'Barcelona', 23789, 8, 'B', '2022-12-07', '15922387Q', '2022-12-08', 'rbrtbtrbtrbtr', 'aaaa', '', ''),
(52, 'S0184203H', 'martin', 'jimenez', '689432156', 'HOLA SOY TONTO', 'martin@gmail.com', 'avenida grande 4', 'Barcelona', 23789, 8, 'B', '2022-12-07', '15922387Q', '2022-12-09', 'rbrtbtrbtrbtr', 'rbrtbtrbtrbtr', '', ''),
(53, 'S0184203H', 'martin', 'jimenez', '689432156', 'rgrgtrbgtrbtr', 'martin@gmail.com', 'avenida grande 4', 'Barcelona', 23789, 8, 'B', '2022-12-07', '15922387Q', '2022-12-08', 'rbrtbtrbtrbtr', 'rtbtrbrtbtr', '', ''),
(54, 'S0184203H', 'martin', 'jimenez', '689432156', 'rgrgtrbgtrbtr', 'martin@gmail.com', 'avenida grande 4', 'Barcelona', 23789, 8, 'B', '2022-12-07', '15922387Q', '2022-12-08', 'rbrtbtrbtrbtr', 'rtbtrbrtbtr', '', ''),
(55, 'S0184203H', 'martin', 'jimenez', '689432156', 'rgrgtrbgtrbtr', 'martin@gmail.com', 'avenida grande 4', 'Barcelona', 23789, 8, 'B', '2022-12-07', '15922387Q', '2022-12-08', 'rbrtbtrbtrbtr', 'rtbtrbrtbtr', '', ''),
(56, 'S0184203H', 'martin', 'jimenez', '689432156', 'rgrgtrbgtrbtr', 'martin@gmail.com', 'avenida grande 4', 'Barcelona', 23789, 8, 'B', '2022-12-07', '15922387Q', '2022-12-09', 'rbrtbtrbtrbtr', 'rbrtbtrbtrbtr', '', ''),
(57, 'S0184203H', 'martin', 'martinez', '685432167', 'AAAAAAAAAAAAAA', 'martin@gmail.com', 'avenida grande 4', 'Huelva', 23789, 8, 'P', '2022-12-08', '50568279L', '2022-12-09', '', '', '', ''),
(58, 'S0184203H', 'pepe', 'jimenez', '685432189', 'gggggggggggggg', 'juan@gmail.com', 'avenida grande 4', 'Huelva', 21530, 21, 'P', '2022-12-08', '15922387Q', '2022-12-09', '', '', '', '');

--
-- Disparadores `tareas`
--
DELIMITER $$
CREATE TRIGGER `inserta_fecha` BEFORE INSERT ON `tareas` FOR EACH ROW SET new.fechaCreacion = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nif` varchar(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `esAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nif`, `nombre`, `contraseña`, `correo`, `telefono`, `esAdmin`) VALUES
('50568279L', 'Juan Antonio Sanchez Martinez', '5555', 'juananto@gmail.com', '678453021', 0),
('67450684X', 'adri', '0000', 'adri@gmail.com', '645093743', 1),
('89462764D', 'Nicolae', '4567', 'nicolae@gmail.com', '654287156', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comunidades`
--
ALTER TABLE `comunidades`
  ADD PRIMARY KEY (`codComunidad`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`codPoblacion`),
  ADD KEY `comAutonoma_fk` (`codComunidad`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operarioEncargado` (`operario_encargado`),
  ADD KEY `provincias` (`provincias`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nif`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `comAutonoma_fk` FOREIGN KEY (`codComunidad`) REFERENCES `comunidades` (`codComunidad`);

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_2` FOREIGN KEY (`provincias`) REFERENCES `provincias` (`codPoblacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
