-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.6.13-MariaDB - MariaDB package
-- Server OS:                    Linux
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for zomosvip
CREATE DATABASE IF NOT EXISTS `zomosvip` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `zomosvip`;

-- Dumping structure for table zomosvip.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table zomosvip.clientes: ~2 rows (approximately)
DELETE FROM `clientes`;
INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `telefono`) VALUES
	(10, 'adeleimar', 'salad', '04247055630'),
	(14, 'elisa', 'medina', '1854152102'),
	(15, 'maria', 'fuentes', '04247859200');

-- Dumping structure for table zomosvip.cuenta
CREATE TABLE IF NOT EXISTS `cuenta` (
  `id_cuenta` int(10) NOT NULL AUTO_INCREMENT,
  `id_servicio` int(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `fecha_vence` date DEFAULT NULL,
  `perfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table zomosvip.cuenta: 1 rows
DELETE FROM `cuenta`;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` (`id_cuenta`, `id_servicio`, `correo`, `contrasena`, `fecha_vence`, `perfil`) VALUES
	(1, 1, 'zomosvip@gmail.com', '12345678', '2023-08-03', 1);
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;

-- Dumping structure for view zomosvip.gastos
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `gastos` (
	`id_servicio` INT(10) NOT NULL,
	`total_gasto` DECIMAL(41,2) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for table zomosvip.perfil
CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(10) NOT NULL AUTO_INCREMENT,
  `id_cuenta` int(10) NOT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `pin` int(4) NOT NULL,
  `fecha_vence` date NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table zomosvip.perfil: 1 rows
DELETE FROM `perfil`;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` (`id_perfil`, `id_cuenta`, `id_cliente`, `nombre`, `pin`, `fecha_vence`) VALUES
	(6, 1, 10, 'ade', 3434, '2023-09-11');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;

-- Dumping structure for table zomosvip.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `id_servicio` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `costo` decimal(20,2) NOT NULL DEFAULT 0.00,
  `precio` decimal(20,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id_servicio`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table zomosvip.servicios: 3 rows
DELETE FROM `servicios`;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` (`id_servicio`, `nombre`, `costo`, `precio`) VALUES
	(1, 'NETFLIX', 2.50, 3.20),
	(2, 'Prime Video', 1.00, 2.00),
	(4, 'Star+', 1.50, 2.00);
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;

-- Dumping structure for table zomosvip.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table zomosvip.usuarios: 2 rows
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `password`, `tipo`) VALUES
	(1, 'admin', '1234', 'ADMINISTRADOR'),
	(2, 'vd', '1234', 'VENDEDOR');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Dumping structure for table zomosvip.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(10) NOT NULL AUTO_INCREMENT,
  `id_servicio` int(11) DEFAULT NULL,
  `id_cuenta` int(10) DEFAULT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_vence` date DEFAULT NULL,
  `monto` decimal(20,2) DEFAULT NULL,
  `nperfil` int(10) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table zomosvip.ventas: 2 rows
DELETE FROM `ventas`;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` (`id_venta`, `id_servicio`, `id_cuenta`, `id_cliente`, `descripcion`, `fecha_inicio`, `fecha_vence`, `monto`, `nperfil`, `id_perfil`) VALUES
	(36, 1, 1, 10, 'ventanetflix', '2023-08-11', '2023-09-11', 3.20, 1, 6),
	(38, 1, 1, 14, 'venta netflix', '2023-07-01', '2023-08-07', 6.40, 2, NULL),
	(40, 1, 1, 15, 'venta 1 pantalla netflix', '2023-07-11', '2023-08-11', 3.20, 1, NULL);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

-- Dumping structure for view zomosvip.gastos
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `gastos`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `gastos` AS select `s`.`id_servicio` AS `id_servicio`,`s`.`costo` * count(`c`.`id_cuenta`) * 5 AS `total_gasto` from (`cuenta` `c` join `servicios` `s` on(`c`.`id_servicio` = `s`.`id_servicio`)) group by `s`.`id_servicio`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
