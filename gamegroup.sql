-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/10/2023 às 10:57
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gamegroup`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `discussion_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `discussion_id`, `comment`) VALUES
(151, 10, 267, 'Tudo certo!'),
(154, 4, 267, 'TESTE'),
(155, 4, 296, 'comenasd\n'),
(156, 11, 298, 'asdasdf'),
(157, 11, 298, 'sdasdas'),
(158, 11, 298, 'dasdas'),
(159, 11, 298, 'dasdas'),
(160, 11, 298, 'asdasdas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `discussions`
--

CREATE TABLE `discussions` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `discussion` varchar(255) DEFAULT NULL,
  `game` varchar(100) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `discussions`
--

INSERT INTO `discussions` (`id`, `user_id`, `discussion`, `game`, `image`) VALUES
(267, '10', 'Testando', 'Nenhum jogo específico', ''),
(295, '4', 'Peguei Esmeralda III ontem!!!', 'League Of Legends', ''),
(296, '4', 'oxi\n', 'Nenhum jogo específico', ''),
(298, '4', 'haskjdhkajshd', 'Fortnite', ''),
(300, '11', '', 'Nenhum jogo específico', ''),
(301, '11', '', 'Nenhum jogo específico', ''),
(302, '11', '', 'Nenhum jogo específico', ''),
(304, '11', 'teste', 'Nenhum jogo específico', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `relevance`
--

CREATE TABLE `relevance` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `discussion_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `situation` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `relevance`
--

INSERT INTO `relevance` (`id`, `user_id`, `discussion_id`, `comment_id`, `situation`) VALUES
(279, '4', 119, NULL, 1),
(317, '10', 267, NULL, 1),
(325, '4', 267, NULL, 0),
(326, '4', NULL, 151, 1),
(330, '11', 304, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `topic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `topics`
--

INSERT INTO `topics` (`id`, `topic`) VALUES
(1, 'Counter-Strike'),
(2, 'Valorant'),
(3, 'League Of Legends'),
(4, 'Fortnite'),
(5, 'Dota 2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `icon`) VALUES
(1, 'eduardomarionucci', '25d55ad283aa400af464c76d713c07ad', 'perfilBase.jpg'),
(2, 'eduardo', '25d55ad283aa400af464c76d713c07ad', 'perfilBase.jpg'),
(3, 'eduardoam', '$2y$10$VMsXyH5abQ1ACWZHIxPt0OgyEUtyE6JFnOIe6k9pE7STo3KQpe.7G', 'perfilBase.jpg'),
(4, 'brayanb', '$2y$10$th8ZydbV7ZmVPcsQ/uuU9.rhn6rORcGEigRXvqvcSuoJwDWTQLnt.', 'perfilBase.jpg'),
(10, 'new_test', '$2y$10$th8ZydbV7ZmVPcsQ/uuU9.rhn6rORcGEigRXvqvcSuoJwDWTQLnt.', 'skn.png'),
(11, 'luan004', '$2y$10$i7NIzB/PL7SXLg7xadUfTuWbrPOHLu1zhaKAXCZOF4PVi9ssFSiSe', 'perfilBase.jpg'),
(12, 'testeteste', '$2y$10$bDHvTM8Fqihq41TIJs88DOaN7iS9i/3vswOJ5FPbAvc9y7Mw.8lbS', 'perfilBase.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `relevance`
--
ALTER TABLE `relevance`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de tabela `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT de tabela `relevance`
--
ALTER TABLE `relevance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT de tabela `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
