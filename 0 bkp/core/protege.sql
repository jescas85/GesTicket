-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para db_protege
CREATE DATABASE IF NOT EXISTS `db_protege` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_protege`;

-- Volcando estructura para tabla db_protege.contactos
CREATE TABLE IF NOT EXISTS `contactos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `seccion` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `asunto` varchar(50) NOT NULL DEFAULT '',
  `empresa_persona` varchar(50) NOT NULL DEFAULT '',
  `ciudad` char(50) NOT NULL DEFAULT '',
  `telefono` varchar(10) NOT NULL DEFAULT '0',
  `mensaje` text NOT NULL,
  `pais` varchar(50) NOT NULL DEFAULT '',
  `ip_address` varchar(15) NOT NULL DEFAULT '0.0.0.0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_protege.tickets
CREATE TABLE IF NOT EXISTS `tickets` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `folio` int(6) unsigned zerofill NOT NULL DEFAULT '000000',
  `serie` varchar(4) NOT NULL DEFAULT 'TWEB',
  `cliente` varchar(50) NOT NULL DEFAULT '',
  `sucursal` varchar(50) NOT NULL DEFAULT '',
  `tipo_servicio` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `empresa` varchar(50) NOT NULL DEFAULT '',
  `ciudad` varchar(50) NOT NULL DEFAULT '',
  `telefono` varchar(10) NOT NULL DEFAULT '',
  `mensaje` text NOT NULL,
  `pais` varchar(50) NOT NULL DEFAULT '',
  `ip_address` varchar(15) NOT NULL DEFAULT '0.0.0.0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
