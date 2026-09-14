-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Set-2026 às 23:41
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `cadastro_produtos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_produtos`
--

CREATE TABLE IF NOT EXISTS `cadastro_produtos` (
  `cod_prod` int(5) NOT NULL AUTO_INCREMENT,
  `descricao_prod` varchar(36) NOT NULL,
  `categ_prod` varchar(36) NOT NULL,
  `valor_compra` int(7) NOT NULL,
  `valor_venda` int(7) NOT NULL,
  `estoque` int(5) NOT NULL,
  PRIMARY KEY (`cod_prod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `cadastro_produtos`
--

INSERT INTO `cadastro_produtos` (`cod_prod`, `descricao_prod`, `categ_prod`, `valor_compra`, `valor_venda`, `estoque`) VALUES
(2, 'IPhone 15', 'Informática', 1500, 2000, 5),
(3, 'IPhone 15', 'Informática', 1500, 2000, 50),
(4, 'IPhone 15', 'Informática', 1500, 2000, 50),
(5, 'IPhone 15', 'Informática', 1500, 2000, 50);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
