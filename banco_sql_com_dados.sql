-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.31 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para livraria
CREATE DATABASE IF NOT EXISTS `livraria` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `livraria`;

-- Copiando estrutura para tabela livraria.financeiro
CREATE TABLE IF NOT EXISTS `financeiro` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` int(2) NOT NULL,
  `descricao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela livraria.financeiro: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `financeiro` DISABLE KEYS */;
INSERT INTO `financeiro` (`id`, `tipo`, `descricao`, `valor`) VALUES
	(28, 1, 'agua', 200),
	(29, 0, 'energia', 400),
	(30, 0, 'aluguel', 999),
	(31, 0, 'adas', 2000),
	(32, 0, 'adas', 2000),
	(33, 0, 'Emprestimo', 2000),
	(34, 0, 'livro novo completo', 10000),
	(35, 0, 'livro novo completo', 10000),
	(36, 0, 'livro novo completo', 10000),
	(37, 0, 'livro novo completo', 10000),
	(38, 0, 'livro novo completo', 10000),
	(39, 0, 'energia eletrica', 100000),
	(40, 0, 'energia eletrica', 100000),
	(41, 0, 'energia eletrica', 100000),
	(42, 0, 'aluguel', 1000000),
	(43, 0, 'aluguel', 1000000),
	(44, 0, 'adas', 10000000),
	(45, 1, 'adas', 999999999);
/*!40000 ALTER TABLE `financeiro` ENABLE KEYS */;

-- Copiando estrutura para tabela livraria.livros
CREATE TABLE IF NOT EXISTS `livros` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_compra` int(11) NOT NULL,
  `valor_venda` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela livraria.livros: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `livros` DISABLE KEYS */;
INSERT INTO `livros` (`id`, `nome`, `descricao`, `quantidade`, `valor_compra`, `valor_venda`) VALUES
	(24, 'harry poter', 'bom livro', 1000, 999, 1000),
	(25, 'joao', 'pé de feijão', 999, 123213, 1200),
	(26, 'jose', 'adsadsamasnd,mansdnsa,mdnm', 0, 12, 12);
/*!40000 ALTER TABLE `livros` ENABLE KEYS */;

-- Copiando estrutura para tabela livraria.transacoes
CREATE TABLE IF NOT EXISTS `transacoes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` int(2) NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela livraria.transacoes: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `transacoes` DISABLE KEYS */;
INSERT INTO `transacoes` (`id`, `tipo`, `valor`) VALUES
	(28, 0, 100),
	(29, 1, 300),
	(30, 1, 300),
	(31, 1, 400),
	(32, 1, 600),
	(33, 0, 300),
	(34, 0, 400),
	(35, 0, 600),
	(36, 1, 3000),
	(37, 1, 3000),
	(38, 1, 5000),
	(39, 0, 2100),
	(40, 0, 9990),
	(41, 1, 1200),
	(42, 0, 999),
	(43, 0, 10000),
	(44, 0, 999),
	(45, 1, 2000);
/*!40000 ALTER TABLE `transacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela livraria.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela livraria.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `login`, `senha`) VALUES
	(2, 'admin', 'admin');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
