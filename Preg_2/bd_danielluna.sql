-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-11-2022 a las 22:59:21
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_danielluna`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujoproceso`
--

CREATE TABLE `flujoproceso` (
  `Flujo` varchar(3) DEFAULT NULL,
  `Proceso` varchar(3) DEFAULT NULL,
  `ProcesoSiguiente` varchar(3) DEFAULT NULL,
  `Tipo` varchar(1) DEFAULT NULL,
  `Pantalla` varchar(20) DEFAULT NULL,
  `Rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `flujoproceso`
--

INSERT INTO `flujoproceso` (`Flujo`, `Proceso`, `ProcesoSiguiente`, `Tipo`, `Pantalla`, `Rol`) VALUES
('F1', 'P1', 'P2', 'I', 'PreparaDocumentos', 'estudiante'),
('F1', 'P2', 'P3', 'P', 'Formulario', 'estudiante'),
('F1', 'P3', '-', 'F', 'Enviado', 'postulante'),
('F1', 'P4', '-', 'C', 'Verifica', 'Kardex'),
('F1', 'P5', '-', 'F', 'DatosGuardados', 'Kardex'),
('F1', 'P6', '-', 'F', 'Rechazo', 'Kardex');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujoprocesocondicionante`
--

CREATE TABLE `flujoprocesocondicionante` (
  `Flujo` varchar(3) DEFAULT NULL,
  `Proceso` varchar(3) DEFAULT NULL,
  `ProcesoSI` varchar(3) DEFAULT NULL,
  `ProcesoNO` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `flujoprocesocondicionante`
--

INSERT INTO `flujoprocesocondicionante` (`Flujo`, `Proceso`, `ProcesoSI`, `ProcesoNO`) VALUES
('F1', 'P4', 'P5', 'P6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujoprocesoseguimiento`
--

CREATE TABLE `flujoprocesoseguimiento` (
  `id` int(11) NOT NULL,
  `Flujo` varchar(3) DEFAULT NULL,
  `Proceso` varchar(3) DEFAULT NULL,
  `Usuario` varchar(10) DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL,
  `rechazo` varchar(10) DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `flujoprocesoseguimiento`
--

INSERT INTO `flujoprocesoseguimiento` (`id`, `Flujo`, `Proceso`, `Usuario`, `FechaInicio`, `FechaFin`, `rechazo`) VALUES
(1, 'F1', 'P2', 'benjamin', '2022-11-26', '2022-11-26', 'Rechazado'),
(2, 'F1', 'P2', 'noemi', '2022-11-26', '2022-11-26', 'Pendiente'),
(3, 'F1', 'P2', 'josue', '2022-11-26', '2022-11-26', 'Pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `flujoprocesoseguimiento`
--
ALTER TABLE `flujoprocesoseguimiento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `flujoprocesoseguimiento`
--
ALTER TABLE `flujoprocesoseguimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
