-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2019 a las 11:35:31
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `museosinfronteras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acervo`
--

CREATE TABLE `acervo` (
  `id` int(10) NOT NULL,
  `nome_peca` varchar(20) DEFAULT NULL,
  `nome_peca_ES` varchar(200) DEFAULT NULL,
  `descricao` varchar(20) DEFAULT NULL,
  `descricao_ES` varchar(200) DEFAULT NULL,
  `data_catalogada` date NOT NULL,
  `periodo` varchar(20) DEFAULT NULL,
  `periodo_ES` varchar(1000) DEFAULT NULL,
  `id_user` int(10) NOT NULL,
  `id_categoria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acervo`
--

INSERT INTO `acervo` (`id`, `nome_peca`, `nome_peca_ES`, `descricao`, `descricao_ES`, `data_catalogada`, `periodo`, `periodo_ES`, `id_user`, `id_categoria`) VALUES
(1, 'Rompecabezas de dos ', NULL, 'Descripcion', NULL, '2019-02-13', 'Periodo', NULL, 1, 1),
(2, 'Pipa de manufactura ', NULL, 'Pipa de manufactura ', NULL, '2019-02-13', 'Periodo', NULL, 1, 1),
(3, 'Detalle de una espue', NULL, 'También recuperada e', NULL, '2019-02-13', 'Periodo', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(10) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `nome_ES` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `nome_ES`) VALUES
(1, 'Artefatos Indigenas', NULL),
(2, 'Farroupilha', NULL),
(3, 'Revolucao Do Uruguay', NULL),
(4, 'Revolucao do Brasil', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exposicao`
--

CREATE TABLE `exposicao` (
  `id` int(10) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `nome_ES` varchar(500) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `descricao_ES` varchar(500) DEFAULT NULL,
  `local` varchar(20) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_final` date NOT NULL,
  `banner` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exposicao`
--

INSERT INTO `exposicao` (`id`, `nome`, `nome_ES`, `descricao`, `descricao_ES`, `local`, `data_inicio`, `data_final`, `banner`) VALUES
(1, 'Expo 1', NULL, NULL, 'descripción', 'local', '2019-02-01', '2019-02-02', 'banner.png'),
(2, 'Expo 2', NULL, NULL, 'descripcion', 'local', '2019-02-01', '2019-02-02', 'banner.png'),
(3, 'Expo 3', NULL, NULL, 'descripcion', 'local', '2019-02-01', '2019-02-02', 'banner.png'),
(4, 'EXP11', NULL, NULL, 'vfedgerger', 'Local', '2019-03-01', '2019-03-02', '2.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagems_acervo`
--

CREATE TABLE `imagems_acervo` (
  `id` int(10) NOT NULL,
  `id_aservo` int(10) NOT NULL,
  `imagem` varchar(20) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `nome_ES` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagems_expo`
--

CREATE TABLE `imagems_expo` (
  `id` int(10) NOT NULL,
  `id_exposicao` int(10) NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `nome_ES` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `avatar`) VALUES
(1, 'Jordan', 'jordan@gmail.com', 'nano123', 'ola.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acervo`
--
ALTER TABLE `acervo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `exposicao`
--
ALTER TABLE `exposicao`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagems_acervo`
--
ALTER TABLE `imagems_acervo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aservo` (`id_aservo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acervo`
--
ALTER TABLE `acervo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `exposicao`
--
ALTER TABLE `exposicao`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `imagems_acervo`
--
ALTER TABLE `imagems_acervo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acervo`
--
ALTER TABLE `acervo`
  ADD CONSTRAINT `acervo_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `acervo_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `imagems_acervo`
--
ALTER TABLE `imagems_acervo`
  ADD CONSTRAINT `imagems_acervo_ibfk_1` FOREIGN KEY (`id_aservo`) REFERENCES `acervo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
