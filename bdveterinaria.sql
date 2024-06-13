-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/05/2024 às 08:07
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
-- Banco de dados: `bdveterinaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbanimal`
--

CREATE TABLE `tbanimal` (
  `codAnimal` int(11) NOT NULL,
  `nomeAnimal` varchar(100) NOT NULL,
  `fotoAnimal` varchar(255) DEFAULT NULL,
  `codTipoAnimal` int(11) DEFAULT NULL,
  `codcliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbanimal`
--

INSERT INTO `tbanimal` (`codAnimal`, `nomeAnimal`, `fotoAnimal`, `codTipoAnimal`, `codcliente`) VALUES
(2, 'Marley', 'marley.png', 2, 1),
(3, 'Pelúcio', 'pelúcio.png', 4, 1),
(4, 'Gatinha', 'gdjoqwjnb.png', 4, 2),
(5, 'Yara', 'yara.png', 8, 2),
(6, 'Eloy', 'eloy.jpeg', 7, 1),
(7, 'Amando', 'amando.jpeg', 6, 3),
(8, 'Peninha', 'peninha.jpg', 8, 3),
(9, 'Gotinha', 'gota.png', 7, 5),
(10, 'Pedra', NULL, 2, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbatendimento`
--

CREATE TABLE `tbatendimento` (
  `codAtendimento` int(11) NOT NULL,
  `DataAtendimento` date NOT NULL,
  `HoraAtendimento` time NOT NULL,
  `codAnimal` int(11) DEFAULT NULL,
  `codVet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbatendimento`
--

INSERT INTO `tbatendimento` (`codAtendimento`, `DataAtendimento`, `HoraAtendimento`, `codAnimal`, `codVet`) VALUES
(7, '2024-05-11', '15:45:00', 3, 6),
(8, '2024-06-04', '14:00:00', 8, 8),
(9, '2024-05-30', '10:00:00', 5, 4),
(10, '2024-06-12', '15:30:00', 6, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `codCliente` int(11) NOT NULL,
  `nomeCliente` varchar(100) NOT NULL,
  `telefoneCliente` varchar(20) DEFAULT NULL,
  `EmailCliente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbcliente`
--

INSERT INTO `tbcliente` (`codCliente`, `nomeCliente`, `telefoneCliente`, `EmailCliente`) VALUES
(1, 'Regina', '11 89481914', 'regina-banana@hotmail.com'),
(2, 'Rodrigo Faro', '11 57691-3254', 'r0dr1g0@gmail,com'),
(3, 'Alice Sousa Barbosa', '11 5498-4984', 'alicesouza2011@outlook.com'),
(4, 'Julia Martins Melo', '11 58963-8542', 'm4tins072@gmail.com'),
(5, 'Gilmar Reis', '11 45895-3456', 'gilmar@gmail.com'),
(6, 'Fefé Gonçalves', '15 5487-2165', 'fefepele@hotmail.com'),
(7, 'Dudu', '11 12121-1212', 'dudu@dudu.com'),
(8, 'Zezinho', '11 49894-2184', 'zezucamargo@zezu.com'),
(9, 'Pedrinho', '11 5483-2534', 'pedroodrep@predo.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtipoanimal`
--

CREATE TABLE `tbtipoanimal` (
  `codTipoAnimal` int(11) NOT NULL,
  `tipoAnimal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbtipoanimal`
--

INSERT INTO `tbtipoanimal` (`codTipoAnimal`, `tipoAnimal`) VALUES
(2, 'Cachorro'),
(3, 'Onça Pintada'),
(4, 'Gato'),
(6, 'Iguana'),
(7, 'Papagaio'),
(8, 'Passarinho'),
(9, 'Furão'),
(10, 'Cobra'),
(11, 'Hamert'),
(12, 'Demônio da Tasmânia'),
(13, 'Cadelo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbveterinario`
--

CREATE TABLE `tbveterinario` (
  `codVet` int(11) NOT NULL,
  `nomeVet` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbveterinario`
--

INSERT INTO `tbveterinario` (`codVet`, `nomeVet`) VALUES
(1, 'Henrique'),
(2, 'Regina'),
(3, 'Onça Pintada'),
(4, 'David J. Bradley'),
(5, 'Raissa Dias Gomes'),
(6, 'Letícia Costa Gomes'),
(7, 'Luis Barros Santos'),
(8, 'Thaís Ribeiro Almeida'),
(9, 'Roberto Almeida'),
(10, 'Sergio Berranteiro'),
(11, 'Bastiãp');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD PRIMARY KEY (`codAnimal`),
  ADD KEY `codTipoAnimal` (`codTipoAnimal`),
  ADD KEY `codcliente` (`codcliente`);

--
-- Índices de tabela `tbatendimento`
--
ALTER TABLE `tbatendimento`
  ADD PRIMARY KEY (`codAtendimento`),
  ADD KEY `codAnimal` (`codAnimal`),
  ADD KEY `codVet` (`codVet`);

--
-- Índices de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`codCliente`);

--
-- Índices de tabela `tbtipoanimal`
--
ALTER TABLE `tbtipoanimal`
  ADD PRIMARY KEY (`codTipoAnimal`);

--
-- Índices de tabela `tbveterinario`
--
ALTER TABLE `tbveterinario`
  ADD PRIMARY KEY (`codVet`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  MODIFY `codAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbatendimento`
--
ALTER TABLE `tbatendimento`
  MODIFY `codAtendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `codCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbtipoanimal`
--
ALTER TABLE `tbtipoanimal`
  MODIFY `codTipoAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tbveterinario`
--
ALTER TABLE `tbveterinario`
  MODIFY `codVet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD CONSTRAINT `tbanimal_ibfk_1` FOREIGN KEY (`codTipoAnimal`) REFERENCES `tbtipoanimal` (`codTipoAnimal`),
  ADD CONSTRAINT `tbanimal_ibfk_2` FOREIGN KEY (`codcliente`) REFERENCES `tbcliente` (`codCliente`);

--
-- Restrições para tabelas `tbatendimento`
--
ALTER TABLE `tbatendimento`
  ADD CONSTRAINT `tbatendimento_ibfk_1` FOREIGN KEY (`codAnimal`) REFERENCES `tbanimal` (`codAnimal`),
  ADD CONSTRAINT `tbatendimento_ibfk_2` FOREIGN KEY (`codVet`) REFERENCES `tbveterinario` (`codVet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
