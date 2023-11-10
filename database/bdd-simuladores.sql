SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `bdd-simuladores`
--
CREATE DATABASE IF NOT EXISTS `bdd-simuladores` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bdd-simuladores`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulos`
--

CREATE TABLE IF NOT EXISTS `capitulos` (
  `idcap` varchar(255) NOT NULL,
  `nombrecap` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `temporada` int(11) NOT NULL,
  PRIMARY KEY (`idcap`),
  KEY `fk_temporada` (`temporada`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `capitulos`
--

INSERT INTO `capitulos` (`idcap`, `nombrecap`, `descripcion`, `temporada`) VALUES
('3Ru6sHh7IPw', 'Los Disimuladores', 'Descripción del capítulo complementaria', 8),
('8ZWr8hQIO8U', 'Colonoscopia', 'Otro capítulo que no sé de qué trata.', 5),
('DGwyQiWsw38', 'Recursos humanos', 'Una descripción copada', 5),
('gZbWadnSmv8', 'Los Simuladores - TOP 50 Curiosidades', 'Descripción del capítulo complementaria', 8),
('Ic7S-COTIvE', 'MOMENTOS GRACIOSOS DE LOS SIMULADORES | COMPILADO', 'Divertidos momentos durante la grabación de la serie.', 8),
('oZLk_s0FbTM', 'Las DIVERTIDAS ANÉCDOTAS de FEDE D\'ELIA en LOS SIMULADORES', 'El actor recordó varias situaciones que vivió grabando la serie.', 8),
('P6aamBnFuY4', 'Bloopers y errores varios', 'Un conjunto de bloopers y errores varios.', 8),
('qFPKcgaGCrI', 'Resumen de Te Lo Resumo Así Nomás', 'Una descripción sobre el video', 8),
('V8FCZ_ULnKM', 'Segunda oportunidad', 'Este capítulo no sé de qué trata, vi la versión de Argentina.', 5),
('XwRheRUUDG4', 'La Ajedrecista', 'Otra descripción picante del capítulo', 10),
('ZnnNNiJ5J3Y', 'Tarjeta de navidad', 'Una pareja está a punto de divorciarse, pero el hombre de la pareja, Bernardo Galván, no está en absoluto de acuerdo con ello, ya que pese a las diferencias y entredichos, está muy apegado a su mujer, Claudia. Galván está al borde del colapso hasta que su vecina le recomienda \"un grupo de personas\" que resuelve problemas cotidianos, Los simuladores. Este operativo consiste en hacer una investigación exhaustiva sobre Claudia y sus necesidades, para convertir a Galván en su hombre ideal.', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cast`
--

CREATE TABLE IF NOT EXISTS `cast` (
  `idcast` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecast` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  PRIMARY KEY (`idcast`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cast`
--

INSERT INTO `cast` (`idcast`, `nombrecast`, `apellido`) VALUES
(1, 'Luka', 'Saldivia'),
(4, 'Lautaro', 'Zjilstra'),
(6, 'Federico', 'D\'Elía'),
(8, 'Alejandro', 'Fiore'),
(9, 'Diego', 'Peretti');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `castxcapitulo`
--

CREATE TABLE IF NOT EXISTS `castxcapitulo` (
  `id_cast` int(11) DEFAULT NULL,
  `id_capitulo` varchar(255) DEFAULT NULL,
  KEY `fk_cast` (`id_cast`),
  KEY `fk_capitulo` (`id_capitulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `castxcapitulo`
--

INSERT INTO `castxcapitulo` (`id_cast`, `id_capitulo`) VALUES
(4, 'P6aamBnFuY4'),
(1, 'P6aamBnFuY4'),
(1, '8ZWr8hQIO8U'),
(4, '8ZWr8hQIO8U'),
(1, 'qFPKcgaGCrI'),
(4, 'qFPKcgaGCrI'),
(1, 'V8FCZ_ULnKM'),
(4, 'XwRheRUUDG4'),
(6, 'DGwyQiWsw38'),
(1, 'ZnnNNiJ5J3Y'),
(6, 'ZnnNNiJ5J3Y'),
(4, '3Ru6sHh7IPw'),
(6, '3Ru6sHh7IPw'),
(4, 'gZbWadnSmv8'),
(6, 'gZbWadnSmv8'),
(6, 'oZLk_s0FbTM'),
(6, 'Ic7S-COTIvE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--

CREATE TABLE IF NOT EXISTS `temporadas` (
  `idtemp` int(255) NOT NULL AUTO_INCREMENT,
  `nombretemp` varchar(255) NOT NULL,
  PRIMARY KEY (`idtemp`),
  UNIQUE KEY `nombre_temporada_unica` (`nombretemp`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temporadas`
--

INSERT INTO `temporadas` (`idtemp`, `nombretemp`) VALUES
(8, 'Extra'),
(11, 'Temporada 1 - ARG'),
(5, 'Temporada 1 - ESP'),
(15, 'Temporada 1 - MEX'),
(13, 'Temporada 2 - ARG'),
(14, 'Temporada 2 - ESP'),
(10, 'Temporada 2 - MEX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `username`, `password`, `admin`) VALUES
(3, 'webadmin', '$2y$10$yV/i3g64TdaWC2to1fhRU.0k4XtkRYegNk8E3xrt8wNCj7ZNUHXf6', 0),
(4, 'lukasaldivia', '$2y$10$sG4HbTDACZfxhrAWLP7a9ewE8Nt3ImhUxymQaMFNt8b2p1bB.q332', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capitulos`
--
ALTER TABLE `capitulos`
  ADD CONSTRAINT `fk_temporada` FOREIGN KEY (`temporada`) REFERENCES `temporadas` (`idtemp`) ON DELETE CASCADE;

--
-- Filtros para la tabla `castxcapitulo`
--
ALTER TABLE `castxcapitulo`
  ADD CONSTRAINT `fk_capitulo` FOREIGN KEY (`id_capitulo`) REFERENCES `capitulos` (`idcap`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cast` FOREIGN KEY (`id_cast`) REFERENCES `cast` (`idcast`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
