-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/12/2024 às 00:30
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vicentemecanico`
--
CREATE DATABASE IF NOT EXISTS `vicentemecanico` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `vicentemecanico`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `mensagem` text NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `nome`, `email`, `assunto`, `mensagem`, `data_envio`) VALUES
(1, 'Calebe', 'calebearcilio@gmail.com', 'Teste', 'oi oi oi\r\n', '2024-12-29 02:45:16'),
(2, 'Calebe', 'calebearcilio@gmail.com', 'Teste2', 'ei ei ei', '2024-12-29 03:29:28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 0,
  `categoria` varchar(50) DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `quantidade`, `categoria`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Pneu Dianteiro 80/100-18', 'Pneu dianteiro para motos de 150cc, alta durabilidade e resistência.', 250.00, 20, 'Pneus', '2024-12-21 15:52:31', '2024-12-21 15:52:31'),
(2, 'Pneu Traseiro 90/90-18', 'Pneu traseiro esportivo, ideal para motos de alta performance.', 300.00, 15, 'Pneus', '2024-12-21 15:52:31', '2024-12-21 15:52:31'),
(3, 'Pastilha de Freio', 'Pastilha de freio de alta qualidade para diversos modelos de motos.', 45.00, 50, 'Freios', '2024-12-21 15:52:31', '2024-12-21 15:52:31'),
(4, 'Coroa e Pinhão', 'Kit coroa e pinhão reforçado para transmissão eficiente.', 120.00, 25, 'Transmissão', '2024-12-21 15:52:31', '2024-12-21 15:52:31'),
(5, 'Velas de Ignição NGK', 'Velas de ignição NGK originais para máxima performance.', 35.00, 100, 'Elétrica', '2024-12-21 15:52:31', '2024-12-21 15:52:31'),
(6, 'Kit de Relação Completo', 'Kit de relação completo para motos de 150cc.', 220.00, 30, 'Transmissão', '2024-12-21 15:52:31', '2024-12-21 15:52:31'),
(7, 'Bateria Selada 12V', 'Bateria selada de alta durabilidade, livre de manutenção.', 280.00, 10, 'Elétrica', '2024-12-21 15:52:31', '2024-12-21 15:52:31'),
(8, 'Manopla Esportiva', 'Manopla esportiva de silicone com maior aderência.', 60.00, 40, 'Acessórios', '2024-12-21 15:52:31', '2024-12-21 15:52:31'),
(9, 'Óleo Lubrificante 20W50', 'Óleo lubrificante premium para motores de 4 tempos.', 35.00, 200, 'Lubrificantes', '2024-12-21 15:52:31', '2024-12-21 15:52:31'),
(10, 'Retrovisor Universal', 'Retrovisor universal com design esportivo, ideal para customização.', 50.00, 30, 'Acessórios', '2024-12-21 15:52:31', '2024-12-21 15:52:31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `acesso_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_cadastro`, `acesso_admin`) VALUES
(1, 'User1', 'user1@gmail.com', '12345', '2024-12-16 23:41:54', 0),
(2, 'User2', 'user2@gmail.com', '12345', '2024-12-24 23:21:07', 0),
(3, 'admin', 'admin@vicentemecanico.com', 'admin123', '2024-12-29 20:35:22', 1);
--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
