<?php

require_once 'config.php';

abstract class Model {
        protected $db;

        function __construct() {
            $this->db = new PDO('mysql:host='. MYSQL['HOST']  .';dbname='. MYSQL['DB'] .';charset=utf8', MYSQL['USER'], MYSQL['PASS']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->deploy();
        }

        function deploy() {
          $yV = '$yV';
          $sG4HbTDACZfxhrAWLP7a9ewE8Nt3ImhUxymQaMFNt8b2p1bB = '$sG4HbTDACZfxhrAWLP7a9ewE8Nt3ImhUxymQaMFNt8b2p1bB';
            // Chequear si hay tablas
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll(); // Nos devuelve todas las tablas de la db
            if(count($tables)==0) {
                // Si no hay crearlas
                $sql =<<<END
                                  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
                  START TRANSACTION;
                  SET time_zone = "+00:00";

                  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
                  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
                  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
                  /*!40101 SET NAMES utf8mb4 */;

                  CREATE DATABASE IF NOT EXISTS `bdd-simuladores` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
                  USE `bdd-simuladores`;

                  DROP TABLE IF EXISTS `capitulos`;
                  CREATE TABLE `capitulos` (
                    `idcap` varchar(255) NOT NULL,
                    `nombrecap` varchar(255) DEFAULT NULL,
                    `descripcion` text DEFAULT NULL,
                    `temporada` int(11) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                  INSERT INTO `capitulos` (`idcap`, `nombrecap`, `descripcion`, `temporada`) VALUES
                  ('8ZWr8hQIO8U', 'Colonoscopia', 'Otro capítulo que no sé de qué trata.', 5),
                  ('DGwyQiWsw38', 'Recursos humanos', 'Una descripción copada', 5),
                  ('P6aamBnFuY4', 'Bloopers y errores varios', 'Un conjunto de bloopers y errores varios.', 8),
                  ('qFPKcgaGCrI', 'Resumen de Te Lo Resumo Así Nomás', 'Una descripción sobre el video', 8),
                  ('V8FCZ_ULnKM', 'Segunda oportunidad', 'Este capítulo no sé de qué trata, vi la versión de Argentina.', 5),
                  ('XwRheRUUDG4', 'La Ajedrecista', 'Otra descripción picante del capítulo', 10),
                  ('ZnnNNiJ5J3Y', '¿Te acordás cómo empezaron Los Simuladores?', 'La serie estaba basada en un grupo de cuatro socios o colegas que se dedican al negocio de la simulación, operan desde el año 1989 resolviendo los problemas y necesidades de sus clientes mediante lo que ellos denominan «operativos de \r\nsimulacro», que solían consistir en engañar a quienes generaban los problemas de sus clientes, ya fueran jefes, criminales, esposas, viudas, comerciantes inescrupulosos, etc.', 8);

                  DROP TABLE IF EXISTS `cast`;
                  CREATE TABLE `cast` (
                    `idcast` int(11) NOT NULL,
                    `nombrecast` varchar(255) NOT NULL,
                    `apellido` varchar(255) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                  INSERT INTO `cast` (`idcast`, `nombrecast`, `apellido`) VALUES
                  (1, 'Luka', 'Saldivia'),
                  (4, 'Lautaro', 'Zjilstra');

                  DROP TABLE IF EXISTS `castxcapitulo`;
                  CREATE TABLE `castxcapitulo` (
                    `id_cast` int(11) DEFAULT NULL,
                    `id_capitulo` varchar(255) DEFAULT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                  INSERT INTO `castxcapitulo` (`id_cast`, `id_capitulo`) VALUES
                  (4, 'P6aamBnFuY4'),
                  (1, 'P6aamBnFuY4'),
                  (1, '8ZWr8hQIO8U'),
                  (4, '8ZWr8hQIO8U'),
                  (4, 'DGwyQiWsw38'),
                  (1, 'DGwyQiWsw38'),
                  (1, 'ZnnNNiJ5J3Y'),
                  (4, 'ZnnNNiJ5J3Y'),
                  (1, 'qFPKcgaGCrI'),
                  (4, 'qFPKcgaGCrI'),
                  (1, 'V8FCZ_ULnKM'),
                  (4, 'XwRheRUUDG4');

                  DROP TABLE IF EXISTS `temporadas`;
                  CREATE TABLE `temporadas` (
                    `idtemp` int(255) NOT NULL,
                    `nombretemp` varchar(255) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                  INSERT INTO `temporadas` (`idtemp`, `nombretemp`) VALUES
                  (5, ' Temporada 1 - ESP'),
                  (8, 'Extra'),
                  (10, 'Temporada 2 - MEX');

                  DROP TABLE IF EXISTS `usuarios`;
                  CREATE TABLE `usuarios` (
                    `idusuario` int(11) NOT NULL,
                    `username` varchar(20) NOT NULL,
                    `password` varchar(255) NOT NULL,
                    `admin` tinyint(1) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                  INSERT INTO `usuarios` (`idusuario`, `username`, `password`, `admin`) VALUES
                  (3, 'webadmin', '$2y$10$yV/i3g64TdaWC2to1fhRU.0k4XtkRYegNk8E3xrt8wNCj7ZNUHXf6', 0),
                  (4, 'lukasaldivia', '$2y$10$sG4HbTDACZfxhrAWLP7a9ewE8Nt3ImhUxymQaMFNt8b2p1bB.q332', 0);


                  ALTER TABLE `capitulos`
                    ADD PRIMARY KEY (`idcap`),
                    ADD KEY `fk_temporada` (`temporada`);

                  ALTER TABLE `cast`
                    ADD PRIMARY KEY (`idcast`);

                  ALTER TABLE `castxcapitulo`
                    ADD KEY `fk_cast` (`id_cast`),
                    ADD KEY `fk_capitulo` (`id_capitulo`);

                  ALTER TABLE `temporadas`
                    ADD PRIMARY KEY (`idtemp`),
                    ADD UNIQUE KEY `nombre_temporada_unica` (`nombretemp`);

                  ALTER TABLE `usuarios`
                    ADD PRIMARY KEY (`idusuario`);


                  ALTER TABLE `cast`
                    MODIFY `idcast` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

                  ALTER TABLE `temporadas`
                    MODIFY `idtemp` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

                  ALTER TABLE `usuarios`
                    MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


                  ALTER TABLE `capitulos`
                    ADD CONSTRAINT `fk_temporada` FOREIGN KEY (`temporada`) REFERENCES `temporadas` (`idtemp`) ON DELETE CASCADE;

                  ALTER TABLE `castxcapitulo`
                    ADD CONSTRAINT `fk_capitulo` FOREIGN KEY (`id_capitulo`) REFERENCES `capitulos` (`idcap`) ON DELETE CASCADE,
                    ADD CONSTRAINT `fk_cast` FOREIGN KEY (`id_cast`) REFERENCES `cast` (`idcast`) ON DELETE CASCADE;
                  COMMIT;

                  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
                  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
                  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
                END;
                $this->db->query($sql);
            }
            
        }
    }