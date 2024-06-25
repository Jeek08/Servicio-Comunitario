/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `inventarioo` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `inventarioo`;

CREATE TABLE IF NOT EXISTS `cdi` (
  `lote` varchar(50) NOT NULL DEFAULT '',
  `medicamento` varchar(250) NOT NULL DEFAULT '',
  `ml_mg` varchar(150) DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `cantidad` int(10) NOT NULL,
  PRIMARY KEY (`lote`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE IF NOT EXISTS `donaciones` (
  `lote` varchar(50) NOT NULL DEFAULT '',
  `medicamento` varchar(250) NOT NULL DEFAULT '',
  `ml_mg` varchar(150) DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `cantidad` int(10) NOT NULL,
  PRIMARY KEY (`lote`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE IF NOT EXISTS `ministerio` (
  `lote` varchar(50) NOT NULL DEFAULT '',
  `medicamento` varchar(250) NOT NULL DEFAULT '',
  `ml_mg` varchar(150) DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `cantidad` int(10) NOT NULL,
  PRIMARY KEY (`lote`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE IF NOT EXISTS `otros` (
  `lote` varchar(50) NOT NULL DEFAULT '',
  `medicamento` varchar(250) NOT NULL DEFAULT '',
  `ml_mg` varchar(150) DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `cantidad` int(10) NOT NULL,
  PRIMARY KEY (`lote`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE IF NOT EXISTS `seguro_social` (
  `lote` varchar(50) NOT NULL DEFAULT '',
  `medicamento` varchar(250) NOT NULL DEFAULT '',
  `ml_mg` varchar(150) DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `cantidad` int(10) NOT NULL,
  PRIMARY KEY (`lote`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `seguro_social` (`lote`, `medicamento`, `ml_mg`, `vencimiento`, `cantidad`) VALUES
	(' 00030', 'ampollas de complegel NF', '500mg/2ml', '2021-09-12', 15),
	('04BH0419', 'Haloperidol', '5mg/5ml', '2022-05-23', 20),
	('0GL111235', 'glicina 1.5%', '3000ml', '2022-11-11', 1),
	('131313', 'acetaminofen', '20mg', '2018-06-05', 12),
	('150411', ' Ampollas de aminofilina', '240mg/10ml', '2025-03-14', 140),
	('1816A', 'Tramadol', '100mg/2ml', '2021-09-13', 14),
	('190303', 'Termometro Digital', '-', '2024-06-06', 2),
	('1924', 'lidocaina', '2ml', '2026-10-18', 32),
	('20110120', 'magnesium sulfate ', '500mg/500ml', '2025-04-01', 19),
	('20130403', 'Dilatador Vaginal Talla:M', '-', '2021-10-12', 1),
	('20130405', 'Dilatador Vaginal Talla:S', '-', '2024-04-04', 1),
	('20150714', 'Agujas hipodermicas 20G', '-', '2024-04-04', 100),
	('20171115', 'Agujas hipodermicas 22G', '-', '2025-05-05', 200),
	('20190905', 'Especulo vaginal Grande', '-', '2025-05-05', 4);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
