-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25/08/2021 às 13:40
-- Versão do servidor: 10.4.14-MariaDB-cll-lve
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u820427911_gtarp_fac`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `passport` int(11) DEFAULT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `farm` varchar(20) NOT NULL DEFAULT 'Pendente',
  `availability` int(2) NOT NULL DEFAULT 1,
  `add-date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `passport`, `user`, `password`, `farm`, `availability`, `add-date`) VALUES
(52, 'Adrian', 15211, 'Shelby', '90a4897b4d6e39e8208325fe9765eef415211\r\n    ', 'Pendente', 1, '2021-08-15 19:02:02'),
(51, 'Danilo Gulone', 127, 'Dell', '1be6bbb3f9cb9c81b25391e05c3a1ab2', 'Pendente', 0, '2021-06-20 04:37:07'),
(50, 'Nikolai Santacruz', 70, 'Careca', '89befd1102aeaead24cfe2b9fa9997f9', 'Pendente', 0, '2021-06-19 19:23:11'),
(49, 'Gusta Santacruz', 61, 'Belga', '761b00dd00830d9ea4713c27591907ae', 'Pendente', 0, '2021-06-19 19:22:35'),
(48, 'Altair Nowak', 54, 'Dan', 'a2e11098af33e21d1418187dc541246b', 'Pendente', 0, '2021-06-19 19:22:05'),
(47, 'Adrian Knapp', 62, 'Shelby', '3dde226fa1afb02c0d39d95ac5855b42', 'Pendente', 0, '2021-06-19 19:20:17');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
