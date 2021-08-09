-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Ago-2021 às 15:02
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
-- Estrutura da tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `ID` int(11) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `email_rec` varchar(64) NOT NULL,
  `matricula` varchar(6) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `senha` varchar(42) NOT NULL,
  `instituicao` varchar(64) NOT NULL
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
  `matricula` varchar(6) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo_u`, `nome`, `instituicao`, `email`, `email_rec`, `senha`, `matricula`, `rg`, `tipo`) VALUES
(1, 'ETEC 242', 'ETEC Doutor Celso Giglio', 'etec242@etec.sp.gov.br', 'admin.etec242@etec.sp.gov.br', 'e10adc3949ba59abbe56e057f20f883e', 'NULL', '', 0),
(16, 'Leonardo Vasconcelos', 'ETEC Doutor Celso Giglio', 'leo@hotmail.com', 'leo2@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '111111', '111111', 1),
(23, 'Maxwell Alves', 'ETEC Doutor Celso Giglio', 'max@gmail.com', 'max2@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '222222', '222222', 1),
(42, 'Alberto Marques', 'ETEC Doutor Celso Giglio', 'alberto@hotmail.com', 'alberto2@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '333333', '444444', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `repositorio`
--
ALTER TABLE `repositorio`
  ADD PRIMARY KEY (`codigo_r`);

--
-- Índices para tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
