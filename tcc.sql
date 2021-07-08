-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jul-2021 às 22:26
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
  `email` varchar(64) NOT NULL,
  `senha` varchar(42) NOT NULL,
  `tipo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo_u`, `nome`, `email`, `senha`, `tipo`) VALUES
(14, 'leocom', 'leo@hotmail.com', '25575', 'aluno'),
(15, 'leocom', 'leo@hotmail.com', '12545', 'aluno'),
(16, 'leocom', 'leo@hotmail.com', '&#039;1414413', 'professor'),
(17, 'leocom', 'leo@hotmail.com', 'c5a43905546da8e87163c5ad28c5f68d', 'professor'),
(18, 'leocom', 'leo@hotmail.com', 'ecd4232a467c3085d7fa1302a827caa9', 'professor'),
(19, 'leocom', 'leo@hotmail.com', 'd4924c2f1902351aaf7664a53a32d0c5', 'professor'),
(20, 'Max', 'max@gmail.com', 'a722c63db8ec8625af6cf71cb8c2d939', 'aluno');

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
  MODIFY `codigo_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
