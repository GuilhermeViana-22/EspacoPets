-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jul-2021 às 18:31
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
  `cep` text NOT NULL,
  `telefone` varchar(300) NOT NULL,
  `regiao` varchar(300) NOT NULL,
  `ativo` varchar(300) NOT NULL,
  `id_usuario` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `logradouro`, `num`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `telefone`, `regiao`, `ativo`, `id_usuario`) VALUES
(1, 'Rua Igarapé Água Azul', '456', '949', 'santa etelvina2', 'São Paulo', 'SP', '08485310', '(11)99016-2908', 'Leste', 'S', 11),
(2, 'Rua Igarapé Água Azul', '949', '41', 'santa etelvina2', 'São Paulo', 'SP', '08485310', '(11)99016-2908', 'Leste', 'S', 2),
(3, 'Rua Igarapé Água Azul', '58', '949', 'santa etelvina2', 'São Paulo', 'SP', '08485310', '(11)99016-2908', 'Oeste', 'S', 2),
(4, 'Rua Igarapé Água Azul', '69', '949', 'santa etelvina2', 'São Paulo', 'SP', '08485310', '(11)99016-2908', 'Oeste', 'S', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `id_plano` int(11) NOT NULL,
  `nome_plano` varchar(300) NOT NULL,
  `Descricao` varchar(300) NOT NULL,
  `tempo` varchar(300) NOT NULL,
  `ativo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`id_plano`, `nome_plano`, `Descricao`, `tempo`, `ativo`) VALUES
(1, 'mensal', 'plano mensal	', 'Mensal', 'N'),
(5, 'semestral', 'plano semestral', 'Semestral', 'N');

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
(2, 'elton', '25461258', 'elton', '1222155213651', 'gerente', 'teste@teste.com', '123456'),
(11, 'PetMania LTDA', '10.254.896/0001-58', 'elton Kelvin', '(11)25332-5466', ' cliente ', 'elton13cdz@gmail.com', '123456'),
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
-- Índices para tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id_plano`);

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
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
