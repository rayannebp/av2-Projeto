-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 20-Maio-2021 às 02:20
-- Versão do servidor: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefone` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `nome`, `email`, `telefone`) VALUES
(1, 'Carlos Morais', 'carlos@gmail.com', '991705845'),
(2, 'Rayanne', 'rayanne@gmail.com', '998153565'),
(3, 'Roseany Lobato', 'roseany@gmail.com', '987981456'),
(4, 'El Anara', 'elanara@gmail.com', '991143293');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

DROP TABLE IF EXISTS `despesas`;
CREATE TABLE IF NOT EXISTS `despesas` (
  `id_despesa` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(10) DEFAULT NULL,
  `despesa` varchar(30) DEFAULT NULL,
  `valor` varchar(10) DEFAULT NULL,
  `data` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_despesa`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`id_despesa`, `id_cliente`, `despesa`, `valor`, `data`) VALUES
(21, '2', 'Hamburger', '99.01', '2021-04-26'),
(20, '2', 'Internet', '99.90', '2021-04-26'),
(19, '2', 'Telefone', '170', '2021-04-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

DROP TABLE IF EXISTS `receitas`;
CREATE TABLE IF NOT EXISTS `receitas` (
  `id_receita` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(10) DEFAULT NULL,
  `receita` varchar(30) DEFAULT NULL,
  `valor` varchar(10) DEFAULT NULL,
  `data` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_receita`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `receitas`
--

INSERT INTO `receitas` (`id_receita`, `id_cliente`, `receita`, `valor`, `data`) VALUES
(1, '02', 'Salário', '1500', '20-04-26'),
(2, '02', 'Salário', '1500', '20-04-26'),
(19, '5', 'gasto deletar', '1000', '2021-05-20'),
(4, '2', 'Venda camisa', '50', '2021-04-26'),
(5, '2', 'Venda calça', '60', '2021-04-26'),
(6, '2', 'Venda sutien', '39', '2021-04-26'),
(7, '2', 'venda celular', '200', '2021-04-26'),
(8, '2', 'venda calcinha', '30', '2021-04-26'),
(9, '2', 'Venda sutien', '39', '2021-04-26'),
(10, '3', 'Salário', '2000', '2021-04-26'),
(11, '7', 'Salário', '3000', '2021-04-26'),
(12, '5', 'Salário', '2500', '2021-04-26'),
(13, '5', 'Venda sutien', '53', '2021-04-26'),
(14, '2', 'venda celular', '640', '2021-04-26'),
(15, '3', 'Venda camisa', '66', '2021-04-26'),
(16, '5', 'venda calcinha', '55', '2021-04-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorios`
--

DROP TABLE IF EXISTS `relatorios`;
CREATE TABLE IF NOT EXISTS `relatorios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `mes` varchar(9) NOT NULL,
  `ano` int(4) NOT NULL,
  `valor` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relatorios`
--

INSERT INTO `relatorios` (`id`, `id_cliente`, `mes`, `ano`, `valor`) VALUES
(1, 2, 'Janeiro', 2021, 100),
(2, 2, 'Fevereiro', 2021, 200),
(3, 2, 'Março', 2021, 50),
(4, 2, 'Abril', 2021, 70),
(5, 2, 'Maio', 2021, 100),
(6, 2, 'Junho', 2021, 500),
(7, 2, 'Julho', 2021, 9001);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `telefone` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`) VALUES
(2, 'Raline', '981129099', 'raline@gmail.com'),
(3, 'Rosário', '991143293', 'rosário@gmail.com'),
(10, 'El Hazard', '991457912', 'elhazard@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
