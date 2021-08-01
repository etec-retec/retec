-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Ago-2021 às 23:00
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `repositorio`
--

CREATE TABLE `repositorio` (
  `codigo_r` int(11) NOT NULL,
  `turma` varchar(64) NOT NULL,
  `curso` varchar(64) NOT NULL,
  `ano` year(4) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `resumo` text NOT NULL,
  `autores` varchar(256) NOT NULL,
  `orientadores` varchar(128) NOT NULL,
  `arquivos` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codigo_u` int(11) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `instituicao` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `email_rec` varchar(64) NOT NULL,
  `senha` varchar(42) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo_u`, `nome`, `instituicao`, `email`, `email_rec`, `senha`, `tipo`) VALUES
(16, 'Leonardo Vasconcelos', 'ETEC Doutor Celso Giglio', 'leo@hotmail.com', 'leo2@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(23, 'Maxwell Alves', 'ETEC Doutor Celso Giglio', 'max@gmail.com', 'max2@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(35, 'Jo&atilde;o Little Head', 'ETEC Doutor Celso Giglio', 'cabecinha@hotmail.com', 'cabecinha2@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `repositorio`
--
ALTER TABLE `repositorio`
  ADD PRIMARY KEY (`codigo_r`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo_u`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `repositorio`
--
ALTER TABLE `repositorio`
  MODIFY `codigo_r` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
