-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 10:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--
CREATE DATABASE IF NOT EXISTS `hotel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hotel`;

-- --------------------------------------------------------

--
-- Table structure for table `agendamento`
--

CREATE TABLE `agendamento` (
  `ID_AGENDAMENTO` int(11) NOT NULL,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `CHECK_IN` date NOT NULL,
  `CHECK_OUT` date NOT NULL,
  `OBS` text DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `ID_QUARTO` int(11) DEFAULT NULL,
  `ID_FUNCIONARIO` int(11) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deletedat` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agendamento`
--

INSERT INTO `agendamento` (`ID_AGENDAMENTO`, `ID_CLIENTE`, `CHECK_IN`, `CHECK_OUT`, `OBS`, `STATUS`, `ID_QUARTO`, `ID_FUNCIONARIO`, `createdat`, `updatedat`, `deletedat`) VALUES
(1, 1, '2025-05-18', '2025-05-20', 'Agendamento teste', 1, 5, 2, '2025-05-19 18:57:23', '2025-05-19 18:57:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agendamentoproduto`
--

CREATE TABLE `agendamentoproduto` (
  `ID_PRODUTO` int(11) NOT NULL,
  `ID_AGENDAMENTO` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deletedat` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agendamentoservico`
--

CREATE TABLE `agendamentoservico` (
  `ID_SERVICO` int(11) NOT NULL,
  `ID_AGENDAMENTO` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deletedat` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `ID_CLIENTE` int(11) NOT NULL,
  `NOME` varchar(255) NOT NULL,
  `DATA_NASCIMENTO` date NOT NULL,
  `FIADOR` varchar(255) DEFAULT NULL,
  `CONTATO` varchar(255) DEFAULT NULL,
  `DOCUMENTO` varchar(50) DEFAULT NULL,
  `TIPO_DOCUMENTO` varchar(50) DEFAULT NULL,
  `OBS` text DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deletedat` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`ID_CLIENTE`, `NOME`, `DATA_NASCIMENTO`, `FIADOR`, `CONTATO`, `DOCUMENTO`, `TIPO_DOCUMENTO`, `OBS`, `createdat`, `updatedat`, `deletedat`) VALUES
(1, 'Joãozinho da Silva', '2015-05-01', 'Carlos Silveira', '(17) 12345-1234', '12312312390', 'CPF', 'Teste', '2025-05-19 18:14:09', '2025-05-19 18:14:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `ID_FUNCIONARIO` int(11) NOT NULL,
  `USUARIO` varchar(255) NOT NULL,
  `SENHA` varchar(255) NOT NULL,
  `ID_NIVELACESSO` int(11) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deletedat` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`ID_FUNCIONARIO`, `USUARIO`, `SENHA`, `ID_NIVELACESSO`, `createdat`, `updatedat`, `deletedat`) VALUES
(2, 'Lennon Jesus', 'lennonsenha1', NULL, '2025-05-06 00:58:23', '2025-05-06 00:58:23', NULL),
(3, 'Nathielly Oliveira', 'nathisenha1', 1, '2025-05-19 19:50:26', '2025-05-19 19:50:26', NULL),
(4, 'Lucas de Paula', 'lucassenha1', NULL, '2025-05-19 19:51:03', '2025-05-19 19:51:03', NULL),
(5, 'Gabriel Biasi', 'biasisenha1', 1, '2025-05-19 19:51:03', '2025-05-19 19:51:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `ID_LOG` int(11) NOT NULL,
  `ACAO` varchar(255) NOT NULL,
  `METODO` varchar(255) NOT NULL,
  `DATA_LOG` varchar(255) NOT NULL,
  `ID_FUNCIONARIO` int(11) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonio`
--

CREATE TABLE `patrimonio` (
  `ID_PATRIMONIO` int(11) NOT NULL,
  `NOME` varchar(255) NOT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  `STATUS` int(11) NOT NULL,
  `ID_QUARTO` int(11) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deletedat` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patrimonio`
--

INSERT INTO `patrimonio` (`ID_PATRIMONIO`, `NOME`, `VALOR`, `STATUS`, `ID_QUARTO`, `createdat`, `updatedat`, `deletedat`) VALUES
(1, 'Toalha Azul', 10.90, 0, 6, '2025-05-19 19:58:37', '2025-05-19 19:58:37', NULL),
(2, 'Taça de Vidro', 3.99, 1, 7, '2025-05-19 19:58:37', '2025-05-19 19:59:37', NULL),
(3, 'Caneca de Porcelana', 4.50, 2, 4, '2025-05-19 19:59:28', '2025-05-19 19:59:28', NULL),
(4, 'Tapete de Boas vindas', 30.00, 1, 1, '2025-05-19 19:59:28', '2025-05-19 19:59:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissao`
--

CREATE TABLE `permissao` (
  `ID_PERMISSAO` int(11) NOT NULL,
  `NIVELACESSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `ID_PRODUTO` int(11) NOT NULL,
  `NOME` varchar(255) NOT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deletedat` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`ID_PRODUTO`, `NOME`, `VALOR`, `createdat`, `updatedat`, `deletedat`) VALUES
(1, 'Miojo Talharim de Frango', 15.00, '2025-05-19 19:46:41', '2025-05-19 19:46:41', NULL),
(2, 'Cup Noodles Tomate', 13.00, '2025-05-19 19:46:41', '2025-05-19 19:46:41', NULL),
(3, 'Salame Sadia', 10.50, '2025-05-19 19:47:11', '2025-05-19 19:47:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quarto`
--

CREATE TABLE `quarto` (
  `ID_QUARTO` int(11) NOT NULL,
  `NUMERACAO` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deletedat` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quarto`
--

INSERT INTO `quarto` (`ID_QUARTO`, `NUMERACAO`, `STATUS`, `createdat`, `updatedat`, `deletedat`) VALUES
(1, 1, 1, '2025-05-06 01:00:06', '2025-05-06 01:00:06', NULL),
(2, 2, 1, '2025-05-06 01:00:06', '2025-05-06 01:00:06', NULL),
(3, 3, 0, '2025-05-06 01:00:21', '2025-05-06 01:00:21', NULL),
(4, 4, 1, '2025-05-06 01:00:25', '2025-05-06 01:00:25', NULL),
(5, 5, 0, '2025-05-06 01:00:29', '2025-05-06 01:00:29', NULL),
(6, 6, 0, '2025-05-06 01:00:33', '2025-05-06 01:00:33', NULL),
(7, 7, 0, '2025-05-06 01:00:37', '2025-05-06 01:00:37', NULL),
(8, 8, 1, '2025-05-06 01:00:41', '2025-05-06 01:00:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servico`
--

CREATE TABLE `servico` (
  `ID_SERVICO` int(11) NOT NULL,
  `TIPO` varchar(255) NOT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deletedat` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`ID_AGENDAMENTO`),
  ADD KEY `ID_CLIENTE` (`ID_CLIENTE`),
  ADD KEY `ID_QUARTO` (`ID_QUARTO`),
  ADD KEY `ID_FUNCIONARIO` (`ID_FUNCIONARIO`);

--
-- Indexes for table `agendamentoproduto`
--
ALTER TABLE `agendamentoproduto`
  ADD PRIMARY KEY (`ID_PRODUTO`,`ID_AGENDAMENTO`),
  ADD KEY `ID_AGENDAMENTO` (`ID_AGENDAMENTO`);

--
-- Indexes for table `agendamentoservico`
--
ALTER TABLE `agendamentoservico`
  ADD PRIMARY KEY (`ID_SERVICO`,`ID_AGENDAMENTO`),
  ADD KEY `ID_AGENDAMENTO` (`ID_AGENDAMENTO`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_CLIENTE`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`ID_FUNCIONARIO`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`ID_LOG`),
  ADD KEY `ID_FUNCIONARIO` (`ID_FUNCIONARIO`);

--
-- Indexes for table `patrimonio`
--
ALTER TABLE `patrimonio`
  ADD PRIMARY KEY (`ID_PATRIMONIO`),
  ADD KEY `ID_QUARTO` (`ID_QUARTO`);

--
-- Indexes for table `permissao`
--
ALTER TABLE `permissao`
  ADD PRIMARY KEY (`ID_PERMISSAO`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`ID_PRODUTO`);

--
-- Indexes for table `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`ID_QUARTO`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`ID_SERVICO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `ID_AGENDAMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `ID_FUNCIONARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `ID_LOG` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patrimonio`
--
ALTER TABLE `patrimonio`
  MODIFY `ID_PATRIMONIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissao`
--
ALTER TABLE `permissao`
  MODIFY `ID_PERMISSAO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `ID_PRODUTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quarto`
--
ALTER TABLE `quarto`
  MODIFY `ID_QUARTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `ID_SERVICO` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `agendamento_ibfk_1` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`),
  ADD CONSTRAINT `agendamento_ibfk_2` FOREIGN KEY (`ID_QUARTO`) REFERENCES `quarto` (`ID_QUARTO`),
  ADD CONSTRAINT `agendamento_ibfk_3` FOREIGN KEY (`ID_FUNCIONARIO`) REFERENCES `funcionario` (`ID_FUNCIONARIO`);

--
-- Constraints for table `agendamentoproduto`
--
ALTER TABLE `agendamentoproduto`
  ADD CONSTRAINT `agendamentoproduto_ibfk_1` FOREIGN KEY (`ID_PRODUTO`) REFERENCES `produto` (`ID_PRODUTO`),
  ADD CONSTRAINT `agendamentoproduto_ibfk_2` FOREIGN KEY (`ID_AGENDAMENTO`) REFERENCES `agendamento` (`ID_AGENDAMENTO`);

--
-- Constraints for table `agendamentoservico`
--
ALTER TABLE `agendamentoservico`
  ADD CONSTRAINT `agendamentoservico_ibfk_1` FOREIGN KEY (`ID_SERVICO`) REFERENCES `servico` (`ID_SERVICO`),
  ADD CONSTRAINT `agendamentoservico_ibfk_2` FOREIGN KEY (`ID_AGENDAMENTO`) REFERENCES `agendamento` (`ID_AGENDAMENTO`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`ID_FUNCIONARIO`) REFERENCES `funcionario` (`ID_FUNCIONARIO`);

--
-- Constraints for table `patrimonio`
--
ALTER TABLE `patrimonio`
  ADD CONSTRAINT `patrimonio_ibfk_1` FOREIGN KEY (`ID_QUARTO`) REFERENCES `quarto` (`ID_QUARTO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
