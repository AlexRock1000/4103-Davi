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

-- Copiando estrutura para tabela sistema_estoque.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `resposavel` varchar(100) NOT NULL,
  `nome_fantasia` varchar(100) NOT NULL,
  `tipo` enum('CPF','CNPJ') NOT NULL,
  `documento` varchar(20) NOT NULL,
  `endereço` text NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `documento` (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela sistema_estoque.cliente: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sistema_estoque.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `responsavel` varchar(50) NOT NULL,
  `nome_fantasia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `documento` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela sistema_estoque.clientes: ~2 rows (aproximadamente)
INSERT IGNORE INTO `clientes` (`id`, `responsavel`, `nome_fantasia`, `tipo`, `documento`, `endereco`, `telefone`, `email`, `data_cadastro`) VALUES
	(1, 'José', 'Zézinho', 'CPF', '12345678910', 'Rua teste', '99999999', 'ze@email.com', '2025-07-28 17:40:19'),
	(2, 'João', 'Jão', 'CPF', '33322211155', 'Rua teste', '4733333333', 'joao@email.com', '2025-08-04 08:34:29'),
	(3, 'Pé', 'Sobre Pé', 'CPF', '123456789', 'rua Sei Lá - 02', '31 65123449', 'da@gmail.com', '2026-06-12 14:23:17');

-- Copiando estrutura para tabela sistema_estoque.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `quantidade` int NOT NULL,
  `valor_compra` decimal(10,2) NOT NULL,
  `valor_venda` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela sistema_estoque.produtos: ~2 rows (aproximadamente)
INSERT IGNORE INTO `produtos` (`id`, `codigo`, `nome`, `categoria`, `quantidade`, `valor_compra`, `valor_venda`, `imagem`, `data_cadastro`) VALUES
	(5, '001', 'console', 'game', 0, 1500.00, 3000.00, '6a2c40d79b77f.jpg', '2026-06-12 14:24:39'),
	(6, '002', 'controle', 'game', 70, 150.00, 300.00, '6a2c410237b85.png', '2026-06-12 14:25:22'),
	(7, '003', 'mão', 'corpo', 13, 50.00, 200.00, '6a2c418a47989.jpg', '2026-06-12 14:27:24');

-- Copiando estrutura para tabela sistema_estoque.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela sistema_estoque.usuarios: ~0 rows (aproximadamente)
INSERT IGNORE INTO `usuarios` (`id`, `username`, `password`, `is_admin`) VALUES
	(2, 'davi', '123456', 1);

-- Copiando estrutura para tabela sistema_estoque.vendas
CREATE TABLE IF NOT EXISTS `vendas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int NOT NULL,
  `data_venda` datetime DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela sistema_estoque.vendas: ~4 rows (aproximadamente)
INSERT IGNORE INTO `vendas` (`id`, `cliente_id`, `data_venda`, `total`) VALUES
	(6, 1, '2026-06-12 16:00:29', 3000.00),
	(7, 2, '2026-06-12 16:01:19', 132000.00),
	(8, 1, '2026-06-12 16:10:30', 200.00),
	(9, 1, '2026-06-12 16:12:16', 200.00),
	(10, 1, '2026-06-16 13:37:36', 3000.00);

-- Copiando estrutura para tabela sistema_estoque.vendas_itens
CREATE TABLE IF NOT EXISTS `vendas_itens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `venda_id` int NOT NULL,
  `produto_id` int NOT NULL,
  `quantidade` int NOT NULL,
  `preco_unitario` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `venda_id` (`venda_id`),
  KEY `produto_id` (`produto_id`),
  CONSTRAINT `vendas_itens_ibfk_1` FOREIGN KEY (`venda_id`) REFERENCES `vendas` (`id`),
  CONSTRAINT `vendas_itens_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela sistema_estoque.vendas_itens: ~4 rows (aproximadamente)
INSERT IGNORE INTO `vendas_itens` (`id`, `venda_id`, `produto_id`, `quantidade`, `preco_unitario`) VALUES
	(3, 6, 5, 1, 3000.00),
	(4, 7, 5, 44, 3000.00),
	(5, 8, 7, 1, 200.00),
	(6, 9, 7, 1, 200.00),
	(7, 10, 6, 10, 300.00);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
