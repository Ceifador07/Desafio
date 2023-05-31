-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Maio-2023 às 23:03
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `desafio_otimo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nomeCategoria` varchar(40) NOT NULL,
  `descricao` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nomeCategoria`, `descricao`, `status`, `date_created`) VALUES
(1, 'Sapatos', 'sapatilhas para todo tipo de pe', 1, '2023-05-24'),
(2, 'Calçados', 'Aqui temos todo tipo de calças de criaças e adultos', 1, '2023-05-24'),
(5, 'Casacos', 'Casacos de Pele para frio', 1, '2023-05-27'),
(8, 'Calças', 'Calcas para todo tipo de eventos', 1, '2023-05-30'),
(9, 'Boxes', 'Boxes para Homens de todas as idades', 1, '2023-05-31'),
(10, 'Meias sm', 'Meias smal para o inverno', 1, '2023-05-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `apelido` varchar(50) NOT NULL,
  `sexo` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `Nivel_acesso` varchar(50) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `data_created` date DEFAULT NULL,
  `data_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `apelido`, `sexo`, `email`, `senha`, `Nivel_acesso`, `status`, `data_created`, `data_deleted`) VALUES
(1, 'Chester', 'Macoda', 'M', 'chestermacoda@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 1, '2023-05-30', NULL),
(2, 'Gaspar', 'Melice', 'M', 'melice@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'cliente', 1, '2023-05-23', NULL),
(3, 'Marta', 'Mabota', 'F', 'marta@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'cliente', 1, '2023-05-23', NULL),
(4, 'Eunice Matsinhe', 'Matsinhe', 'F', 'eunice@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'cliente', 1, '2023-05-23', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `images` varchar(200) NOT NULL,
  `produtos` int(11) NOT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `produtos` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `quantidade` varchar(50) NOT NULL,
  `status` varchar(300) NOT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `produtos`, `cliente`, `quantidade`, `status`, `data`) VALUES
(4, 17, 3, '6', 'Pago', '2023-05-30'),
(36, 20, 2, '2', 'Em Aberto', '2023-05-31'),
(37, 19, 3, '1', 'Em Aberto', '2023-05-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `categoria` int(11) NOT NULL,
  `preco` varchar(100) NOT NULL,
  `quantidade` varchar(40) NOT NULL,
  `descricao` text NOT NULL,
  `images` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `data_created` date DEFAULT NULL,
  `data_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `categoria`, `preco`, `quantidade`, `descricao`, `images`, `status`, `data_created`, `data_deleted`) VALUES
(13, 'Sapatos', 1, '12122', '39', 'Sapatos para todo tipo de eventos', '81963780ad30f357b5bd15ec1113553f.png', 0, '2023-05-27', NULL),
(17, 'Sapatilha', 1, '1500', '19', 'Sapatilhas para todo tipo de caminhada eventos de carridade entre outros ', '014fc10ed5c254b3b52e903f94cc03daf8265e11671e77e2f5c0ea99d4a0bb00.png', 0, '2023-05-27', NULL),
(18, 'jeans bonitos', 8, '1500', '10', 'Calcas jean preco limitado', '57a33efc3c75a21bf8ae41be10b4300694e77c6e3d2d6438aa2d7c24f06ebebd.jpg', 1, '2023-05-30', NULL),
(19, 'casacos Da Marca Cizento', 5, '1230', '4', 'Casaco para jovens', '359be6a81717a804bbb0a12f74783f0ecasacos.jpg', 1, '2023-05-30', NULL),
(20, 'Sapatilha Rasa', 1, '1500', '99', 'Sapatilhas rasas para eventos longo', '53f3694e83bb5f263033b34a2f806b85cf041517dffa0974c4bb531cef93f637.jpg', 1, '2023-05-31', NULL),
(21, 'Jacket Regata', 5, '1500', '123', 'Casacos para o inverno veja!', 'cbb3380bfc8d4a431dbb47c5ef862c73D_NQ_NP_600034-MLB31116913686_062019-O.jpg', 1, '2023-05-31', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `apelido` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `sexo` varchar(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `Nivel_acesso` varchar(20) NOT NULL,
  `data_created` date DEFAULT NULL,
  `data_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `apelido`, `email`, `senha`, `sexo`, `status`, `Nivel_acesso`, `data_created`, `data_deleted`) VALUES
(1, 'chester', 'Macoda', 'chestermacoda@gmail.com', '1234', 'M', 1, 'Admin', '2023-05-30', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produtos` (`produtos`),
  ADD KEY `cliente` (`cliente`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`produtos`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
