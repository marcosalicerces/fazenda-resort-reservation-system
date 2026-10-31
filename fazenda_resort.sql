-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 16-Jul-2026 às 01:38
-- Versão do servidor: 12.3.2-MariaDB
-- versão do PHP: 8.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dados: `fazenda_resort`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `nif` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `telefone`, `email`, `nif`) VALUES
(1, 'Amavel Marcos Lando ALicerces', '922820182', 'amavelalicerces', 334455678),
(2, 'Ali', '931655549', 'amavellando02@gmail.com', 23232323),
(3, 'Ali', '931655549', 'amavellando02@gmail.com', 23232323),
(4, 'VM', '12', 'MV@gmail.com', 32),
(5, 'Amável Marcos Lando Alicerces', '931655549', 'amavellando02@gmail.com', 23232323),
(6, 'Amável Marcos Lando Alicerces', '931655549', 'amavellando02@gmail.com', 23232323),
(7, 'Bruno Chivemba', '931655549', 'bruno@gmail.com', 23232323);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quartos`
--

CREATE TABLE `quartos` (
  `id_quarto` int(11) NOT NULL,
  `numero_quarto` int(11) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `preco_noite` decimal(10,2) NOT NULL,
  `capacidade` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT 'quarto_padrao.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `quartos`
--

INSERT INTO `quartos` (`id_quarto`, `numero_quarto`, `tipo`, `preco_noite`, `capacidade`, `imagem`) VALUES
(1, 100, 'Simples', 50.00, 2, 'quarto-simples.jpg'),
(2, 110, 'Quarto duplo', 135.00, 3, 'quarto-duplo.jpg'),
(3, 120, 'Quarto duplo com vista', 170.00, 3, 'quarto-duplo-vista.jpg'),
(4, 130, 'Suite Master', 255.00, 2, 'suite-master.jpg'),
(7, 135, 'Bungalows ', 275.00, 4, 'bungalow-simples.jpg'),
(8, 145, 'Bungalows privativo', 325.00, 6, 'bungalow-privativo.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_quarto` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `quantidade_pessoas` tinyint(11) NOT NULL,
  `preco_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_cliente`, `id_quarto`, `check_in`, `check_out`, `quantidade_pessoas`, `preco_total`) VALUES
(1, 1, 1, '2026-07-19', '2026-07-22', 2, 50.00),
(2, 4, 3, '2026-12-10', '2026-12-11', 1, 175.00),
(3, 5, 8, '2026-07-19', '2026-07-22', 4, 980.00),
(4, 6, 8, '2026-07-19', '2026-07-22', 4, 980.00),
(5, 7, 4, '2026-08-05', '2026-08-10', 2, 1280.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `quartos`
--
ALTER TABLE `quartos`
  ADD PRIMARY KEY (`id_quarto`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_quarto` (`id_quarto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `quartos`
--
ALTER TABLE `quartos`
  MODIFY `id_quarto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `2` FOREIGN KEY (`id_quarto`) REFERENCES `quartos` (`id_quarto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
