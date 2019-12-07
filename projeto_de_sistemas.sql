-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Dez-2019 às 21:00
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_de_sistemas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultor`
--

CREATE TABLE `consultor` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `consultor`
--

INSERT INTO `consultor` (`id`, `nome`, `telefone`, `email`) VALUES
(2, 'teste', 'teste', 'teste12341234'),
(3, 'Lucas de Aguiar', '(31) 996424955', 'de.lucas73@gmail.com'),
(4, 'teste', 'teste', 'teste'),
(5, 'Cdf', 'CXV', 'VXCV');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato_emp`
--

CREATE TABLE `contato_emp` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `endereco`, `cnpj`) VALUES
(3, 'lindomar', 'paracatu', '123456'),
(7, 'igor', 'aafsadfasdaf', 'fasdfasdfasd'),
(9, 'teste', 'teste', 'teste'),
(13, 'testeFinal', 'testefinal', 'testefinal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escritorio`
--

CREATE TABLE `escritorio` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `uf` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `escritorio`
--

INSERT INTO `escritorio` (`id`, `nome`, `uf`) VALUES
(1, 'Avanco', 'MG'),
(2, 'RH 2D', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone_fixo` varchar(255) NOT NULL,
  `telefone_celular` varchar(255) NOT NULL,
  `cargo_id` int(11) NOT NULL,
  `data_admissao` date NOT NULL,
  `area_trabalho` varchar(255) NOT NULL,
  `gestor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerente`
--

CREATE TABLE `gerente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gerente`
--

INSERT INTO `gerente` (`id`, `nome`, `email`, `telefone`) VALUES
(1, 'Lucas Aguiar', 'de.lucas73@gmail.com', '(31) 99642-4959'),
(2, 'César Augusto', 'cesar@gmail.com', '(31) 99998-7845');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor`
--

CREATE TABLE `gestor` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `area_trabalho` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `caracteristicas` varchar(255) NOT NULL,
  `cronograma` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `escritorio_id` int(11) NOT NULL,
  `gerente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id`, `nome`, `caracteristicas`, `cronograma`, `telefone`, `escritorio_id`, `gerente_id`) VALUES
(11, 'teste final', 'teste final', 'teste final', '412341234', 2, 2),
(12, 'SUS', 'Definir perfil dos médicos para contratar', '2 meses', '134234123', 1, 2),
(14, 'ADSFSF', 'FASDFAS', 'FASD', 'FSD', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relac_emp_cont`
--

CREATE TABLE `relac_emp_cont` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `contato_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relac_emp_func`
--

CREATE TABLE `relac_emp_func` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relac_esc_consult`
--

CREATE TABLE `relac_esc_consult` (
  `id` int(11) NOT NULL,
  `escritorio_id` int(11) NOT NULL,
  `consultor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relac_proj_emp`
--

CREATE TABLE `relac_proj_emp` (
  `id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relac_proj_emp`
--

INSERT INTO `relac_proj_emp` (`id`, `projeto_id`, `empresa_id`) VALUES
(4, 12, 7),
(6, 12, 3),
(7, 11, 9),
(8, 14, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `consultor`
--
ALTER TABLE `consultor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contato_emp`
--
ALTER TABLE `contato_emp`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `escritorio`
--
ALTER TABLE `escritorio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cargo_id` (`cargo_id`),
  ADD KEY `gestor_id` (`gestor_id`);

--
-- Índices para tabela `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `gestor`
--
ALTER TABLE `gestor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escritorio_id` (`escritorio_id`),
  ADD KEY `gerente_id` (`gerente_id`);

--
-- Índices para tabela `relac_emp_cont`
--
ALTER TABLE `relac_emp_cont`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_id` (`empresa_id`),
  ADD KEY `contato_id` (`contato_id`);

--
-- Índices para tabela `relac_emp_func`
--
ALTER TABLE `relac_emp_func`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_id` (`empresa_id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `relac_esc_consult`
--
ALTER TABLE `relac_esc_consult`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escritorio_id` (`escritorio_id`),
  ADD KEY `consultor_id` (`consultor_id`);

--
-- Índices para tabela `relac_proj_emp`
--
ALTER TABLE `relac_proj_emp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projeto_id` (`projeto_id`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `consultor`
--
ALTER TABLE `consultor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `contato_emp`
--
ALTER TABLE `contato_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `escritorio`
--
ALTER TABLE `escritorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `gerente`
--
ALTER TABLE `gerente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `gestor`
--
ALTER TABLE `gestor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `relac_emp_cont`
--
ALTER TABLE `relac_emp_cont`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `relac_emp_func`
--
ALTER TABLE `relac_emp_func`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `relac_esc_consult`
--
ALTER TABLE `relac_esc_consult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `relac_proj_emp`
--
ALTER TABLE `relac_proj_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`),
  ADD CONSTRAINT `funcionarios_ibfk_2` FOREIGN KEY (`gestor_id`) REFERENCES `gestor` (`id`);

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`escritorio_id`) REFERENCES `escritorio` (`id`),
  ADD CONSTRAINT `projeto_ibfk_2` FOREIGN KEY (`gerente_id`) REFERENCES `gerente` (`id`);

--
-- Limitadores para a tabela `relac_emp_cont`
--
ALTER TABLE `relac_emp_cont`
  ADD CONSTRAINT `relac_emp_cont_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `relac_emp_cont_ibfk_2` FOREIGN KEY (`contato_id`) REFERENCES `contato_emp` (`id`);

--
-- Limitadores para a tabela `relac_emp_func`
--
ALTER TABLE `relac_emp_func`
  ADD CONSTRAINT `relac_emp_func_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `relac_emp_func_ibfk_2` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`);

--
-- Limitadores para a tabela `relac_esc_consult`
--
ALTER TABLE `relac_esc_consult`
  ADD CONSTRAINT `relac_esc_consult_ibfk_1` FOREIGN KEY (`consultor_id`) REFERENCES `consultor` (`id`),
  ADD CONSTRAINT `relac_esc_consult_ibfk_2` FOREIGN KEY (`escritorio_id`) REFERENCES `escritorio` (`id`);

--
-- Limitadores para a tabela `relac_proj_emp`
--
ALTER TABLE `relac_proj_emp`
  ADD CONSTRAINT `relac_proj_emp_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `relac_proj_emp_ibfk_2` FOREIGN KEY (`projeto_id`) REFERENCES `projeto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
