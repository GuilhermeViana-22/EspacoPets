-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Ago-2021 às 01:00
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
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL,
  `nome_animal` varchar(300) NOT NULL,
  `idade` varchar(300) NOT NULL,
  `rga` varchar(300) NOT NULL,
  `raca` varchar(300) NOT NULL,
  `sexo` varchar(300) NOT NULL,
  `observacao` varchar(300) NOT NULL,
  `tipo` varchar(300) NOT NULL,
  `ativo` varchar(2) NOT NULL,
  `imagem` varchar(300) NOT NULL,
  `id_usuario` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`id_animal`, `nome_animal`, `idade`, `rga`, `raca`, `sexo`, `observacao`, `tipo`, `ativo`, `imagem`, `id_usuario`) VALUES
(6, 'maxff', '2', '125-66', 'pitibull', 'M', 'csc', 'Cachorro', 'S', '', 14),
(7, 'maple', '2', '125-66', 'pitibull', 'M', 'csc', 'Cachorro', 'S', '6c2e53d079947b0ee0f2d1c27d83a883.jpeg', 14);

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
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `id_imagen` int(11) NOT NULL,
  `nome_imagem` varchar(300) NOT NULL,
  `id_animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(14, '', '', '', '', ' ong', 'elton16cdz@gmail.com', '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `FK_Cliente_endereco` (`id_usuario`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `FK_animal_foto` (`id_animal`);

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
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `FK_Cliente_endereco` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `FK_animal_foto` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
