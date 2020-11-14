-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Nov-2020 às 18:08
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_atividades`
--

CREATE TABLE `tb_atividades` (
  `idatividade` int(11) NOT NULL,
  `ativ_materia` varchar(256) NOT NULL,
  `ativ_vencimento` date NOT NULL,
  `ativ_descricao` varchar(524) NOT NULL,
  `ativ_conclusao` varchar(20) DEFAULT NULL,
  `ativ_conclusao_data` date DEFAULT NULL,
  `ativ_conclusao_hora` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_materias`
--

CREATE TABLE `tb_materias` (
  `idmateria` int(11) NOT NULL,
  `mat_descricao` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `idusuario` int(11) NOT NULL,
  `us_nome` varchar(256) NOT NULL,
  `us_login` varchar(256) NOT NULL,
  `us_senha` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_atividades`
--
ALTER TABLE `tb_atividades`
  ADD PRIMARY KEY (`idatividade`);

--
-- Índices para tabela `tb_materias`
--
ALTER TABLE `tb_materias`
  ADD PRIMARY KEY (`idmateria`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_atividades`
--
ALTER TABLE `tb_atividades`
  MODIFY `idatividade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_materias`
--
ALTER TABLE `tb_materias`
  MODIFY `idmateria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
