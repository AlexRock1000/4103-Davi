-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para sistema_estoque
CREATE DATABASE IF NOT EXISTS `sistema_estoque` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sistema_estoque`;

-- Copiando estrutura para tabela sistema_estoque.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `responsavel` varchar(100) NOT NULL,
  `nome_fantasia` varchar(100) NOT NULL,
  `tipo` enum('CPF','CNP') NOT NULL,
  `documento` varchar(20) NOT NULL,
  `endereco` text NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `documento` (`documento`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela sistema_estoque.clientes: ~2 rows (aproximadamente)
INSERT IGNORE INTO `clientes` (`id`, `responsavel`, `nome_fantasia`, `tipo`, `documento`, `endereco`, `telefone`, `email`, `data_cadastro`) VALUES
	(4, 'hsfpiwed´h´fj', 'qnhoeddef', 'CPF', '2321355', 'sqdoehjodhewq', '21342454', 'jqwegdhueg@gmail.com', '2025-04-25 16:25:11'),
	(5, 'eu', 'pue', 'CPF', '956211+81+98', 'papspokdóaks', '4799999999', 'palsap@gmail.com', '2025-04-25 16:25:40'),
	(6, 'Luiz Fernando Alves', 'LuTECH', 'CPF', '42.161.610/0001-17', 'Rua da Assembleia, 20 - JardimJardim das Acácias', '(15) 3333-3333', 'lutech@gmail.com', '2026-06-03 14:08:24'),
	(7, 'Jojo&#039;s', 'Jojo&#039;s', 'CPF', '321.654.987-78', 'Alameda yayá 212 - Alameda dos anjos', '(15) 2222-2222', 'rodrigosouto@gmail.com', '2026-06-03 15:01:33');

-- Copiando estrutura para tabela sistema_estoque.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela sistema_estoque.usuarios: ~1 rows (aproximadamente)
INSERT IGNORE INTO `usuarios` (`id`, `username`, `password`, `is_admin`) VALUES
	(1, 'davi', '123456', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
