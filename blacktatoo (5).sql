-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05/02/2023 às 01:23
-- Versão do servidor: 10.4.22-MariaDB
-- Versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blacktatoo`
--
CREATE DATABASE IF NOT EXISTS `blacktatoo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blacktatoo`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `cod_admin` int(50) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_nasc` varchar(11) NOT NULL,
  `permissao` int(50) NOT NULL,
  PRIMARY KEY (`cod_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `administrador`:
--

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`cod_admin`, `nome`, `senha`, `email`, `data_nasc`, `permissao`) VALUES
(1, 'black_adm', '$2y$10$wrmriMXv8TlN4k/FF3hVu.Ylz8H9navNly.n7gYFghs4Yr7IwEvRG', 'blacktatto@gmail.com', '01-01-2022', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento`
--

DROP TABLE IF EXISTS `agendamento`;
CREATE TABLE IF NOT EXISTS `agendamento` (
  `cod_agendamento` int(50) NOT NULL AUTO_INCREMENT,
  `autor` varchar(50) NOT NULL,
  `contato` varchar(50) NOT NULL,
  `cod_fun` varchar(50) NOT NULL,
  `data_agenda` varchar(10) NOT NULL,
  `estilo_valor` varchar(30) NOT NULL,
  `cod_cliente` varchar(10) NOT NULL,
  `nome_cliente` varchar(10) NOT NULL,
  PRIMARY KEY (`cod_agendamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `agendamento`:
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cod_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_nasc` varchar(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `permissao` int(50) NOT NULL,
  PRIMARY KEY (`cod_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- RELACIONAMENTOS PARA TABELAS `cliente`:
--

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `usuario`, `nome`, `email`, `data_nasc`, `senha`, `permissao`) VALUES
(1, '', 'yago a', 'mimsay003@gmail.com', '2003-10-21', '$2y$10$BF9fPLBwNQaTC4Ab5hm5l.DRTkQ0ZfB0s8TqeLMOsnV4d4fdNuyjK', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `cod_func` int(50) NOT NULL AUTO_INCREMENT,
  `apelido` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(16) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_nasc` varchar(10) NOT NULL,
  `permissao` int(50) NOT NULL,
  PRIMARY KEY (`cod_func`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `funcionario`:
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tatuagem`
--

DROP TABLE IF EXISTS `tatuagem`;
CREATE TABLE IF NOT EXISTS `tatuagem` (
  `cod_tatto` int(50) NOT NULL AUTO_INCREMENT,
  `estilo` varchar(50) NOT NULL,
  `preco` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `cod_func` int(50) NOT NULL,
  PRIMARY KEY (`cod_tatto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `tatuagem`:
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
