-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2026 at 04:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `el_salon_del_disco`
--

-- --------------------------------------------------------

--
-- Table structure for table `artistas`
--

CREATE TABLE `artistas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_artistico` varchar(256) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(256) NOT NULL,
  `pais_de_origen` enum('Estados Unidos','Reino Unido','Argentina','Italia') NOT NULL,
  `ano_de_formacion` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artistas`
--

INSERT INTO `artistas` (`id`, `nombre_artistico`, `descripcion`, `imagen`, `pais_de_origen`, `ano_de_formacion`) VALUES
(1, 'Lana Del Rey', 'Lana Del Rey es una cantante de pop alternativo conocida por su estilo melancólico, estética vintage y letras sobre amor, nostalgia y drama. Su voz suave y cinematográfica es su sello distintivo.', 'lana_del_rey.webp', 'Estados Unidos', '2005'),
(2, 'Arctic Monkeys', 'Arctic Monkeys es una banda británica de indie rock formada en Sheffield. Se caracteriza por un estilo que mezcla indie rock con elementos de garage y rock alternativo, con letras observacionales y un sonido que ha ido cambiando y volviéndose más experimental con el tiempo.', 'arctic_monkeys.webp', 'Reino Unido', '2002'),
(3, 'Eminem', 'Eminem es un rapero, compositor y productor reconocido por su técnica sobresaliente, su flow versátil y sus letras intensas y personales. Su obra combina rap crudo con narrativas provocadoras, humor ácido y crítica social, y se caracteriza por juegos de palabras complejos y gran velocidad al rapear.', 'eminem.webp', 'Estados Unidos', '1996'),
(4, 'Babasónicos', 'Babasónicos es una banda de rock alternativo conocida por su estilo ecléctico, letras provocadoras y constante búsqueda de innovación sonora. Su música combina distintos géneros y destaca por una estética cuidada y una identidad artística muy marcada.', 'babasonicos.webp', 'Argentina', '1991'),
(5, 'Nirvana', 'Nirvana fue una banda de rock alternativo conocida por su sonido crudo y emocional, con una fuerte influencia del grunge. Sus canciones combinan intensidad, distorsión y sensibilidad melódica, y reflejan una actitud rebelde y auténtica que marcó a toda una generación.', 'nirvana.webp', 'Estados Unidos', '1987'),
(6, 'Ed Sheeran', 'Ed Sheeran es un cantautor conocido por sus baladas emotivas, su estilo pop acústico y su habilidad para mezclar géneros como pop, folk y R&B. Sus canciones suelen destacar por letras personales y melodías sencillas pero muy pegadizas.', 'ed_sheeran.webp', 'Reino Unido', '2004'),
(7, 'Taylor Swift', 'Taylor Swift es una cantante y compositora conocida por sus letras narrativas y personales, que abordan relaciones, emociones y experiencias de vida. Su estilo ha evolucionado a lo largo del tiempo, explorando distintos géneros dentro del pop y la música contemporánea.', 'taylor_swift.webp', 'Estados Unidos', '2006'),
(8, 'Lady Gaga', 'Lady Gaga es una cantante, compositora y actriz estadounidense conocida por su estilo pop teatral, su estética provocadora y sus presentaciones visuales impactantes. Su música combina pop, dance, electrónica y baladas, con una identidad artística fuerte y cambiante.', 'lady_gaga.webp', 'Estados Unidos', '2001'),
(9, 'Ludovico Einaudi', 'Ludovico Einaudi es un compositor y pianista italiano conocido por su estilo minimalista y emocional. Su música combina elementos de la música clásica contemporánea con influencias ambientales, creando composiciones íntimas y evocadoras.', 'ludovico_einaudi.webp', 'Italia', '1982'),
(10, 'Metallica', 'Metallica es una banda estadounidense de heavy metal conocida por su sonido potente, riffs agresivos y gran influencia en la música metal. Sus composiciones combinan velocidad, técnica y letras intensas, convirtiéndolos en una de las bandas más importantes del género.', 'metallica.webp', 'Estados Unidos', '1981'),
(11, 'The Beatles', 'The Beatles fue una banda británica considerada una de las más influyentes de la historia de la música. Su sonido evolucionó desde el pop rock hacia composiciones más experimentales, marcando generaciones con melodías icónicas y una creatividad innovadora.', 'the_beatles.webp', 'Reino Unido', '1960');

-- --------------------------------------------------------

--
-- Table structure for table `discos`
--

CREATE TABLE `discos` (
  `id` int(10) UNSIGNED NOT NULL,
  `artista_id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `lanzamiento` date NOT NULL,
  `portada` varchar(256) NOT NULL,
  `precio` decimal(11,0) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discos`
--

INSERT INTO `discos` (`id`, `artista_id`, `titulo`, `lanzamiento`, `portada`, `precio`, `stock`) VALUES
(1, 1, 'Born to die', '2012-12-27', 'born_to_die.webp', 30000, 10),
(2, 1, 'Honeymoon', '2015-09-18', 'honeymoon.webp', 35000, 17),
(3, 2, 'AM', '2013-09-06', 'am.webp', 38000, 25),
(4, 3, 'Encore', '2004-11-12', 'encore.webp', 42000, 20),
(5, 4, 'Infame', '2003-10-19', 'infame.webp', 32000, 15),
(6, 5, 'Nevermind', '1991-09-24', 'nevermind.webp', 38000, 6),
(7, 6, '+', '2011-09-09', '+.webp', 32000, 12),
(8, 7, 'Red', '2012-10-22', 'red.webp', 37000, 23),
(9, 8, 'Born This Way', '2011-05-23', 'born_this_way.webp', 28000, 20),
(10, 9, 'Solo Piano', '2004-01-01', 'solo_piano.webp', 40000, 15),
(11, 10, 'Master of Puppets', '1986-03-03', 'master_of_puppets.webp', 28500, 5),
(12, 11, 'Abbey Road', '1969-09-26', 'abbey_road.webp', 34000, 25),
(13, 7, '1989', '2014-10-27', '1989.webp', 29700, 32),
(14, 5, 'In Utero', '1993-09-21', 'in_utero.webp', 40000, 7),
(15, 11, 'Yellow Submarine', '1969-01-17', 'yellow_submarine.webp', 35000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `discos_x_generos`
--

CREATE TABLE `discos_x_generos` (
  `id` int(10) UNSIGNED NOT NULL,
  `disco_id` int(10) UNSIGNED NOT NULL,
  `genero_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discos_x_generos`
--

INSERT INTO `discos_x_generos` (`id`, `disco_id`, `genero_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 3, 3),
(6, 3, 2),
(7, 4, 5),
(8, 4, 6),
(9, 5, 1),
(10, 5, 3),
(11, 6, 3),
(12, 6, 7),
(13, 7, 1),
(14, 7, 8),
(15, 8, 1),
(16, 9, 1),
(17, 10, 9),
(18, 11, 10),
(19, 12, 1),
(20, 12, 3),
(21, 13, 1),
(22, 14, 3),
(23, 14, 7),
(24, 15, 3),
(25, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `generos`
--

CREATE TABLE `generos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generos`
--

INSERT INTO `generos` (`id`, `nombre`) VALUES
(1, 'Pop'),
(2, 'Indie'),
(3, 'Rock'),
(5, 'Rap'),
(6, 'Hip Hop'),
(7, 'Grunge'),
(8, 'Folk'),
(9, 'Clásica'),
(10, 'Metal');

-- --------------------------------------------------------

--
-- Table structure for table `musicos`
--

CREATE TABLE `musicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `artista_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `musicos`
--

INSERT INTO `musicos` (`id`, `nombre`, `artista_id`) VALUES
(28, 'Elizabeth Woolridge Grant', 1),
(29, 'Alex Turner', 2),
(30, 'Jamie Cook', 2),
(31, 'Nick O\'Malley', 2),
(32, 'Matt Helders', 2),
(33, 'Marshall Bruce Mathers III', 3),
(34, 'Adrián Dárgelos', 4),
(35, 'Diego Tuñón', 4),
(36, 'Diego Uma', 4),
(37, 'Mariano Roger', 4),
(38, 'Gabriel Manelli', 4),
(39, 'Diego Castellano', 4),
(40, 'Kurt Cobain', 5),
(41, 'Krist Novoselic', 5),
(42, 'Dave Grohl', 5),
(43, 'Edward Christopher Sheeran', 6),
(44, 'Taylor Alison Swift', 7),
(45, 'Stefani Joanne Angelina Germanotta', 8),
(46, 'Ludovico Einaudi', 9),
(47, 'James Hetfield', 10),
(48, 'Lars Ulrich', 10),
(49, 'Kirk Hammett', 10),
(50, 'Robert Trujillo', 10),
(51, 'John Lennon', 11),
(52, 'Paul McCartney', 11),
(53, 'George Harrison', 11),
(54, 'Ringo Starr', 11);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(256) NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `rol` enum('superadmin','admin','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vistas`
--

CREATE TABLE `vistas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `activa` tinyint(4) NOT NULL,
  `restrengida` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_id` (`artista_id`);

--
-- Indexes for table `discos_x_generos`
--
ALTER TABLE `discos_x_generos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genero_id` (`genero_id`),
  ADD KEY `fk_discos_x_generos_discos` (`disco_id`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `musicos`
--
ALTER TABLE `musicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_musicos_artistas` (`artista_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);

--
-- Indexes for table `vistas`
--
ALTER TABLE `vistas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `discos`
--
ALTER TABLE `discos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `discos_x_generos`
--
ALTER TABLE `discos_x_generos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `musicos`
--
ALTER TABLE `musicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vistas`
--
ALTER TABLE `vistas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `discos`
--
ALTER TABLE `discos`
  ADD CONSTRAINT `discos_ibfk_1` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `discos_x_generos`
--
ALTER TABLE `discos_x_generos`
  ADD CONSTRAINT `discos_x_generos_ibfk_1` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_discos_x_generos_discos` FOREIGN KEY (`disco_id`) REFERENCES `discos` (`id`);

--
-- Constraints for table `musicos`
--
ALTER TABLE `musicos`
  ADD CONSTRAINT `fk_musicos_artistas` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
