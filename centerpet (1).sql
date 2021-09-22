-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jun-2021 às 14:47
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `centerpet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `logradouro` varchar(300) NOT NULL,
  `num` varchar(300) NOT NULL,
  `complemento` varchar(300) NOT NULL,
  `bairro` varchar(300) NOT NULL,
  `cidade` varchar(300) NOT NULL,
  `estado` varchar(300) NOT NULL,
  `telefone` varchar(300) NOT NULL,
  `regiao` varchar(300) NOT NULL,
  `ativo` varchar(300) NOT NULL,
  `id_usuario` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_fantasia` varchar(300) NOT NULL,
  `cnpj` varchar(300) NOT NULL,
  `nome_responsavel` varchar(300) DEFAULT NULL,
  `telefone` varchar(25) DEFAULT NULL,
  `tipo_usuario` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_fantasia`, `cnpj`, `nome_responsavel`, `telefone`, `tipo_usuario`, `email`, `senha`) VALUES
(2, 'elton', '25461258', '', '', 'gerente', 'teste@teste.com', '123456'),
(11, 'PetMania LTDA', '123455252654', 'elton Kelvin', '22221514', ' cliente ', 'elton13cdz@gmail.com', 'cc30d7'),
(12, 'pet show', '1224556225254', NULL, NULL, 'gerente', 'elton14cdz@gmail.com', '123456'),
(13, 'Elton Kelvin Ferreira Justino da Silva', '12356489652', NULL, NULL, ' cliente ', 'elton15cdz@gmail.com', '123456'),
(14, 'Elton Kelvin Ferreira Justino da Silva', '12356489652', NULL, NULL, ' cliente ', 'elton16cdz@gmail.com', '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `FK_Cliente_endereco` (`id_usuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `FK_Cliente_endereco` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
