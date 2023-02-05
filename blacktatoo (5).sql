-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Fev-2023 às 03:44
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

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

CREATE USER IF NOT EXISTS 'tatoo'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON blacktatoo.* TO 'tatoo'@'localhost';

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
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
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`cod_admin`, `nome`, `senha`, `email`, `data_nasc`, `permissao`) VALUES
(1, 'black_adm', '$2y$10$wrmriMXv8TlN4k/FF3hVu.Ylz8H9navNly.n7gYFghs4Yr7IwEvRG', 'blacktatto@gmail.com', '01-01-2022', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agendamento`
--

INSERT INTO `agendamento` (`cod_agendamento`, `autor`, `contato`, `cod_fun`, `data_agenda`, `estilo_valor`, `cod_cliente`, `nome_cliente`) VALUES
(1, 'Funcionario A', '123456789', '1', '1111-11-21', '', '2', 'Cliente 1'),
(2, 'Funcionario A', '1234567897', '1', '2023-02-07', 'OLD SCHOOL - R$160', '1', 'Funcionari'),
(3, 'Funcionario A', '(21)9911-22798', '1', '2023-02-26', 'TINTA BRANCA - R$400', '2', 'Funcionari');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `usuario`, `nome`, `email`, `data_nasc`, `senha`, `permissao`) VALUES
(2, 'Cliente 1', 'Cliente 1', 'cliente1@gmail.com', '2003-10-21', '$2y$10$jwgW0gO0zJ1.eLjcnumCHOpDljFDa2REkXjP8fg2LreBMBbMD7Mte', 0),
(3, 'Cliente 2', 'Cliente 2', 'cliente2@gmail.com', '1999-09-07', '$2y$10$nkzisDkngtnKmUhHxY5w4OYWxbyn50IsRLfepl7Jm1vaxXWyLPrD.', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`cod_func`, `apelido`, `nome`, `senha`, `cpf`, `tel`, `email`, `data_nasc`, `permissao`) VALUES
(1, 'Funcionario A', 'Funcionario A', '$2y$10$6fmMYKk2QiS55NmXrPK1penGUozalbHWHXx96ah4u8QD5jdu3jUba', '12345678910', '998877664', 'funcionarioa@gmail.com', '1980-01-07', 2),
(2, 'Funcionario B', 'Funcionario B', '$2y$10$yX6l4ngTJsfyS3O0JtxrUe1g7oFu8DzUIePjPX8THlWMh3LyemhE.', '12345678910', '998877664', 'funcionarioB@gmail.com', '1991-03-28', 2),
(4, 'Funcionário C', 'Funcionario C', '$2y$10$icjp8tk5JkyAJjuU411IrurujtleoTUQQIMNeZfTE1oocCvssGTrm', '13987654321', '44444452', 'funcionarioc@gmail.com', '1991-11-11', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tatuagem`
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tatuagem`
--

INSERT INTO `tatuagem` (`cod_tatto`, `estilo`, `preco`, `autor`, `link`, `cod_func`) VALUES
(1, 'TINTA BRANCA', '400', 'Funcionario A', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:AN', 0),
(2, 'OLD SCHOOL', '160', 'Funcionario A', 'https://i.pinimg.com/236x/d0/77/fe/d077fe74cc94591', 0),
(3, 'SINGLE LINE', '60', 'Funcionario A', 'https://i.pinimg.com/564x/6b/d7/9e/6bd79e77a00d52e', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
