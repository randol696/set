-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 14, 2023 at 01:45 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_set`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cursos`
--

CREATE TABLE `tb_cursos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `horas` varchar(255) DEFAULT NULL,
  `activo` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_cursos`
--

INSERT INTO `tb_cursos` (`id`, `codigo`, `nombre`, `horas`, `activo`, `foto`) VALUES
(1, '0203C0013', 'CONFECCION DE MUNDILLO', '288', 'Activo', 'mundillo.jpg'),
(2, '0203H0005', 'MANUALIDADES DE NAVIDAD', '60', 'Activo', 'navidad.jpg'),
(3, '9945', 'Soldadura ', '8', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_estadistica`
--

CREATE TABLE `tb_estadistica` (
  `id_est` int(25) NOT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `cantidad` int(255) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_estadistica`
--

INSERT INTO `tb_estadistica` (`id_est`, `curso`, `cantidad`, `fecha`) VALUES
(10, 'CONFECCION DE MUNDILLO', 2, '2023-04-13'),
(11, 'MANUALIDADES DE NAVIDAD', 1, '2023-04-13'),
(12, 'CONFECCION DE MUNDILLO', 7, '2023-04-11'),
(13, 'CONFECCION DE MUNDILLO', 9, '2023-04-10'),
(14, 'MANUALIDADES DE NAVIDAD', 1, '2023-04-9'),
(15, 'MANUALIDADES DE NAVIDAD', 5, '2023-04-10'),
(16, 'MANUALIDADES DE NAVIDAD', 7, '2023-04-11'),
(17, 'MANUALIDADES DE NAVIDAD', 10, '2023-04-12'),
(18, 'MANUALIDADES DE NAVIDAD', 14, '2023-04-14'),
(19, 'MANUALIDADES DE NAVIDAD', 14, '2023-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_misCursos`
--

CREATE TABLE `tb_misCursos` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(255) DEFAULT NULL,
  `nombre_usuario` varchar(255) DEFAULT NULL,
  `apellido_usuario` varchar(255) DEFAULT NULL,
  `id_curso` varchar(255) DEFAULT NULL,
  `nombre_curso` varchar(255) DEFAULT NULL,
  `codigo_curso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_misCursos`
--

INSERT INTO `tb_misCursos` (`id`, `id_usuario`, `nombre_usuario`, `apellido_usuario`, `id_curso`, `nombre_curso`, `codigo_curso`) VALUES
(14, '1', 'Manuel', 'Figueroa', '1', 'CONFECCION DE MUNDILLO', '0203C0013'),
(15, '1', 'Manuel', 'Figueroa', '1', 'CONFECCION DE MUNDILLO', '0203C0013'),
(16, '1', 'Manuel', 'Figueroa', '2', 'MANUALIDADES DE NAVIDAD', '0203H0005'),
(17, '1', 'Manuel', 'Figueroa', '1', 'CONFECCION DE MUNDILLO', '0203C0013'),
(18, '1', 'Manuel', 'Figueroa', '1', 'CONFECCION DE MUNDILLO', '0203C0013'),
(19, '1', 'Manuel', 'Figueroa', '2', 'MANUALIDADES DE NAVIDAD', '0203H0005'),
(20, '1', 'Manuel', 'Figueroa', '3', 'Soldadura ', '9945');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `roll_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `nombre`, `apellido`, `correo`, `password`, `roll_id`) VALUES
(1, 'Manuel', 'Figueroa', 'mg@test.com', 'test', 2),
(2, 'Luis', 'Fernandez', 'admin@test.com', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_wishlist`
--

CREATE TABLE `tb_wishlist` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(255) DEFAULT NULL,
  `nombre_usuario` varchar(255) DEFAULT NULL,
  `apellido_usuario` varchar(255) DEFAULT NULL,
  `id_curso` varchar(255) DEFAULT NULL,
  `nombre_curso` varchar(255) DEFAULT NULL,
  `codigo_curso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_wishlist`
--

INSERT INTO `tb_wishlist` (`id`, `id_usuario`, `nombre_usuario`, `apellido_usuario`, `id_curso`, `nombre_curso`, `codigo_curso`) VALUES
(1, '1', 'Manuel', 'Figueroa', '2', 'MANUALIDADES DE NAVIDAD', '0203H0005'),
(2, '1', 'Manuel', 'Figueroa', '1', 'CONFECCION DE MUNDILLO', '0203C0013'),
(3, '1', 'Manuel', 'Figueroa', '1', 'CONFECCION DE MUNDILLO', '0203C0013');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cursos`
--
ALTER TABLE `tb_cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_estadistica`
--
ALTER TABLE `tb_estadistica`
  ADD PRIMARY KEY (`id_est`);

--
-- Indexes for table `tb_misCursos`
--
ALTER TABLE `tb_misCursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cursos`
--
ALTER TABLE `tb_cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_estadistica`
--
ALTER TABLE `tb_estadistica`
  MODIFY `id_est` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_misCursos`
--
ALTER TABLE `tb_misCursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
