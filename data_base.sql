-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.6081
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para test-nexura-int
DROP DATABASE IF EXISTS `test-nexura-int`;
CREATE DATABASE IF NOT EXISTS `test-nexura-int` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `test-nexura-int`;

-- Volcando estructura para tabla test-nexura-int.areas
DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla test-nexura-int.areas: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
REPLACE INTO `areas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Administración', '2020-08-11 15:33:40', '2020-08-11 15:33:40'),
	(2, 'Contabilidad', '2020-08-11 15:33:44', '2020-08-11 15:33:44'),
	(3, 'Sistemas', '2020-08-11 15:33:51', '2020-08-11 15:33:51'),
	(4, 'Gerencia', '2020-08-11 15:33:55', '2020-08-11 15:33:55'),
	(5, 'Compras', '2020-08-11 15:33:58', '2020-08-11 15:33:58'),
	(6, 'Talento Humano', '2020-08-11 15:34:02', '2020-08-11 15:34:02'),
	(7, 'Auditoría', '2020-08-11 15:34:07', '2020-08-11 15:34:07'),
	(8, 'Tesorería', '2020-08-11 15:34:15', '2020-08-11 15:34:15'),
	(9, 'Cartera', '2020-08-11 15:34:20', '2020-08-11 15:34:20'),
	(10, 'Ventas', '2020-08-11 15:40:51', '2020-08-11 15:40:51'),
	(11, 'Calidad', '2020-08-11 15:40:55', '2020-08-11 15:40:55'),
	(12, 'Producción', '2020-08-11 15:41:00', '2020-08-11 15:41:00');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;

-- Volcando estructura para tabla test-nexura-int.empleados
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexo` char(1) NOT NULL,
  `area_id` int(11) unsigned NOT NULL,
  `boletin` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_areas_emple_area_id` (`area_id`),
  CONSTRAINT `fk_areas_emple_area_id` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  CONSTRAINT `ck_empl_sexo` CHECK (`sexo` in ('F','M')),
  CONSTRAINT `ck_empl_boletin` CHECK (`boletin` in (0,1))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla test-nexura-int.empleados: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
REPLACE INTO `empleados` (`id`, `nombre`, `email`, `sexo`, `area_id`, `boletin`, `descripcion`, `created_at`, `updated_at`) VALUES
	(1, 'Cristian Loaiza', 'cloaiza@cloaiza.com', 'M', 3, 1, 'Desarrollador', '2020-08-11 20:21:31', '2020-08-11 20:21:31');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;

-- Volcando estructura para tabla test-nexura-int.empleado_rol
DROP TABLE IF EXISTS `empleado_rol`;
CREATE TABLE IF NOT EXISTS `empleado_rol` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `empleado_id` int(11) unsigned NOT NULL,
  `rol_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_empl_empl_rol_empleado_id` (`empleado_id`),
  KEY `fk_roles_emple_rol` (`rol_id`),
  CONSTRAINT `fk_empl_empl_rol_empleado_id` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  CONSTRAINT `fk_roles_emple_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla test-nexura-int.empleado_rol: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `empleado_rol` DISABLE KEYS */;
REPLACE INTO `empleado_rol` (`id`, `empleado_id`, `rol_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2020-08-11 20:21:31', '2020-08-11 20:21:31');
/*!40000 ALTER TABLE `empleado_rol` ENABLE KEYS */;

-- Volcando estructura para tabla test-nexura-int.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla test-nexura-int.roles: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
REPLACE INTO `roles` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Profesional de proyectos - Desarrollador', '2020-08-11 15:33:01', '2020-08-11 15:33:01'),
	(2, 'Gerente estratégico', '2020-08-11 15:33:09', '2020-08-11 15:33:09'),
	(3, 'Auxiliar administrativo', '2020-08-11 15:33:15', '2020-08-11 15:33:15');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
