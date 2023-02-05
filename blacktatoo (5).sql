-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05/02/2023 às 03:03
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
CREATE TABLE `administrador` (
  `cod_admin` int(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_nasc` varchar(11) NOT NULL,
  `permissao` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
CREATE TABLE `agendamento` (
  `cod_agendamento` int(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `contato` varchar(50) NOT NULL,
  `cod_fun` varchar(50) NOT NULL,
  `data_agenda` varchar(10) NOT NULL,
  `estilo_valor` varchar(30) NOT NULL,
  `cod_cliente` varchar(10) NOT NULL,
  `nome_cliente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `agendamento`
--

INSERT INTO `agendamento` (`cod_agendamento`, `autor`, `contato`, `cod_fun`, `data_agenda`, `estilo_valor`, `cod_cliente`, `nome_cliente`) VALUES
(1, 'Funcionario A', '123456789', '1', '1111-11-21', '', '2', 'Cliente 1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `cod_cliente` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_nasc` varchar(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `permissao` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `usuario`, `nome`, `email`, `data_nasc`, `senha`, `permissao`) VALUES
(2, 'Cliente 1', 'Cliente 1', 'cliente1@gmail.com', '2003-10-21', '$2y$10$jwgW0gO0zJ1.eLjcnumCHOpDljFDa2REkXjP8fg2LreBMBbMD7Mte', 0),
(3, 'Cliente 2', 'Cliente 2', 'cliente2@gmail.com', '1999-09-07', '$2y$10$nkzisDkngtnKmUhHxY5w4OYWxbyn50IsRLfepl7Jm1vaxXWyLPrD.', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE `funcionario` (
  `cod_func` int(50) NOT NULL,
  `apelido` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(16) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_nasc` varchar(10) NOT NULL,
  `permissao` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`cod_func`, `apelido`, `nome`, `senha`, `cpf`, `tel`, `email`, `data_nasc`, `permissao`) VALUES
(1, 'Funcionario A', 'Funcionario A', '$2y$10$6fmMYKk2QiS55NmXrPK1penGUozalbHWHXx96ah4u8QD5jdu3jUba', '12345678910', '998877664', 'funcionarioa@gmail.com', '1980-01-07', 2),
(2, 'Funcionario B', 'Funcionario B', '$2y$10$yX6l4ngTJsfyS3O0JtxrUe1g7oFu8DzUIePjPX8THlWMh3LyemhE.', '12345678910', '998877664', 'funcionarioB@gmail.com', '1991-03-28', 2),
(4, 'Funcionário C', 'Funcionario C', '$2y$10$icjp8tk5JkyAJjuU411IrurujtleoTUQQIMNeZfTE1oocCvssGTrm', '13987654321', '44444452', 'funcionarioc@gmail.com', '1991-11-11', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tatuagem`
--

DROP TABLE IF EXISTS `tatuagem`;
CREATE TABLE `tatuagem` (
  `cod_tatto` int(50) NOT NULL,
  `estilo` varchar(50) NOT NULL,
  `preco` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `cod_func` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`cod_admin`);

--
-- Índices de tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`cod_agendamento`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cod_func`);

--
-- Índices de tabela `tatuagem`
--
ALTER TABLE `tatuagem`
  ADD PRIMARY KEY (`cod_tatto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `cod_admin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `cod_agendamento` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `cod_func` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tatuagem`
--
ALTER TABLE `tatuagem`
  MODIFY `cod_tatto` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
