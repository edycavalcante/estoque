-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jul-2018 às 22:17
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `baixa_estoque`
--

CREATE TABLE `baixa_estoque` (
  `id_baixa` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_baixa` date DEFAULT NULL,
  `fk_local_id` int(11) DEFAULT NULL,
  `fk_equipamento_id` int(11) DEFAULT NULL,
  `fk_setor_id` int(11) DEFAULT NULL,
  `descricao` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `baixa_estoque`
--

INSERT INTO `baixa_estoque` (`id_baixa`, `quantidade`, `data_baixa`, `fk_local_id`, `fk_equipamento_id`, `fk_setor_id`, `descricao`) VALUES
(1, 1, NULL, NULL, 5, NULL, 'teste baixa'),
(2, 1, '2018-07-12', NULL, 5, 1, 'teste baixa 2'),
(3, 1, '2018-07-12', NULL, 5, 5, 'teste baixa 3'),
(4, 1, '2018-07-12', NULL, 5, 5, 'teste baixa 3'),
(5, 2, '2018-07-12', 1, 11, 7, '2 mouses para ser utilizado na coordenção de mecânica.'),
(6, 5, '2018-07-11', 1, 11, 2, 'baixe de 5'),
(7, 2, '2018-07-06', 2, 11, 2, 'baixa 2, vai para 8'),
(8, 1, '2018-07-10', NULL, 11, 4, 'baixa de 1 '),
(9, 5, '2018-07-11', NULL, 11, 4, 'baixa de 2'),
(10, 2, '2018-07-06', NULL, 11, 2, '2 para dti'),
(11, 2, '2018-07-19', NULL, 11, 6, 'asdasdas '),
(12, 400, '2018-07-12', 5, 11, 1, 'fica com 100'),
(13, 5, '2018-07-11', NULL, 11, 3, 'dasdasdasd'),
(14, 1, '2018-07-10', NULL, 12, 4, 'teste consumo o equipamento, baixou 1 para x unidades'),
(15, 1, '2018-07-01', 2, 5, 1, 'cmsi teste'),
(16, 101, '2018-07-10', 2, 11, 1, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id_emprestimo` int(11) NOT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `situacao` text,
  `quantidade` int(11) DEFAULT NULL,
  `fk_setor_id` int(11) DEFAULT NULL,
  `fk_usuario_id` int(11) DEFAULT NULL,
  `fk_equipamento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id_emprestimo`, `data_inicio`, `data_fim`, `situacao`, `quantidade`, `fk_setor_id`, `fk_usuario_id`, `fk_equipamento_id`) VALUES
(16, '2018-07-11', '2018-07-18', 'evento design jkdjskjdksj', 1, 3, NULL, 7),
(17, '2018-07-05', '2018-07-19', 'patrimonio 5001', 1, 1, NULL, 5),
(18, '2018-07-06', '2018-07-26', 'asdasda 1 ', 1, 1, NULL, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `id_equipamento` int(11) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `nome_equipamento` varchar(255) DEFAULT NULL,
  `patrimonio` int(255) DEFAULT NULL,
  `fk_fabricante_id` int(11) DEFAULT NULL,
  `fk_usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`id_equipamento`, `tipo`, `nome_equipamento`, `patrimonio`, `fk_fabricante_id`, `fk_usuario_id`) VALUES
(5, 'permanente', 'Computador', 5001, 2, NULL),
(7, 'permanente', 'Computador', 123456789, 2, NULL),
(8, 'permanente', 'Impressora', 500400, 4, NULL),
(9, 'permanente', 'Impressora', 789456, 4, NULL),
(10, 'permanente', 'Monitor', 456321, 6, NULL),
(11, 'consumo', 'Mouse pad', 0, 6, NULL),
(12, 'consumo', 'Teste consumo', 0, 4, NULL),
(15, 'consumo', 'teste edy user', 0, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque_gerencia`
--

CREATE TABLE `estoque_gerencia` (
  `id_estoque` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `data_estoque` date DEFAULT NULL,
  `fk_equipamento_id` int(11) DEFAULT NULL,
  `fk_local_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque_gerencia`
--

INSERT INTO `estoque_gerencia` (`id_estoque`, `quantidade`, `data_estoque`, `fk_equipamento_id`, `fk_local_id`) VALUES
(5, 1, NULL, 7, 2),
(9, 1, NULL, 8, 4),
(12, 1, NULL, 9, 4),
(13, 25, NULL, 11, 2),
(14, 25, NULL, 11, 4),
(20, 1, NULL, 10, 5),
(21, 9, NULL, 12, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricante`
--

CREATE TABLE `fabricante` (
  `id_fabricante` int(11) NOT NULL,
  `nome_fabricante` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fabricante`
--

INSERT INTO `fabricante` (`id_fabricante`, `nome_fabricante`) VALUES
(2, 'Dell'),
(4, 'HP'),
(5, 'Sem fabricante'),
(6, 'Multilaser');

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE `local` (
  `id_local` int(11) NOT NULL,
  `nome_local` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`id_local`, `nome_local`) VALUES
(1, 'Caixa 1 '),
(2, 'Caixa 2 '),
(3, 'Caixa 3'),
(4, 'CMSI Manutenção'),
(5, 'CMSI Supervisão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id_setor` int(11) NOT NULL,
  `nome_setor` varchar(255) DEFAULT NULL,
  `responsavel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id_setor`, `nome_setor`, `responsavel`) VALUES
(1, 'CMSI', 'Clarineide Batista'),
(2, 'DTI', 'Anselmo Redes'),
(3, 'Coordenação de Design', 'Professora Roberta'),
(4, 'COPEX', 'Elaine Cristina'),
(5, 'DECON', 'Raphaela Moura'),
(6, 'Coordenação Construção de Edificio', 'Roberta Paiva'),
(7, 'Coordenação de Mecânica', 'Francisco França');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `nome_usuario` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `nome_usuario`, `senha`) VALUES
(2, 'teste2', 'Diane Lucena', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'edy', 'Edy Cavalcante ', 'f75f761c049dced5d7eb5028ac04174a'),
(4, 'admin', 'Clarineide Batista', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baixa_estoque`
--
ALTER TABLE `baixa_estoque`
  ADD PRIMARY KEY (`id_baixa`),
  ADD UNIQUE KEY `FK_Baixa_gerencia_ID_Local` (`id_baixa`) USING BTREE,
  ADD KEY `FK_Baixa_gerencia_ID_Equipamento` (`fk_equipamento_id`),
  ADD KEY `FK_Baixa_gerencia_ID_Setor` (`fk_setor_id`),
  ADD KEY `FK_Baixa_ID_Local` (`fk_local_id`);

--
-- Indexes for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id_emprestimo`),
  ADD KEY `FK_Emprestimo_ID_Setor` (`fk_setor_id`),
  ADD KEY `FK_Emprestimo_ID_Usuario` (`fk_usuario_id`),
  ADD KEY `FK_Emprestimo_ID_Equipamento` (`fk_equipamento_id`);

--
-- Indexes for table `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`id_equipamento`),
  ADD KEY `FK_Equipamento_ID_Fabricante` (`fk_fabricante_id`),
  ADD KEY `FK_Equipamento_ID_Usuario` (`fk_usuario_id`);

--
-- Indexes for table `estoque_gerencia`
--
ALTER TABLE `estoque_gerencia`
  ADD PRIMARY KEY (`id_estoque`),
  ADD KEY `FK_Estoque_gerencia_ID_Equipamento` (`fk_equipamento_id`),
  ADD KEY `FK_Estoque_gerencia_ID_Local` (`fk_local_id`);

--
-- Indexes for table `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`id_fabricante`);

--
-- Indexes for table `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id_local`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id_setor`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baixa_estoque`
--
ALTER TABLE `baixa_estoque`
  MODIFY `id_baixa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `id_equipamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `estoque_gerencia`
--
ALTER TABLE `estoque_gerencia`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `id_fabricante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `local`
--
ALTER TABLE `local`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `id_setor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `baixa_estoque`
--
ALTER TABLE `baixa_estoque`
  ADD CONSTRAINT `FK_Baixa_ID_Equipamento` FOREIGN KEY (`fk_equipamento_id`) REFERENCES `equipamento` (`id_equipamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Baixa_ID_Local` FOREIGN KEY (`fk_local_id`) REFERENCES `local` (`id_local`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Baixa_ID_Setor` FOREIGN KEY (`fk_setor_id`) REFERENCES `setor` (`id_setor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `FK_Emprestimo_ID_Equipamento` FOREIGN KEY (`fk_equipamento_id`) REFERENCES `equipamento` (`id_equipamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Emprestimo_ID_Setor` FOREIGN KEY (`fk_setor_id`) REFERENCES `setor` (`id_setor`),
  ADD CONSTRAINT `FK_Emprestimo_ID_Usuario` FOREIGN KEY (`fk_usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD CONSTRAINT `FK_Equipamento_ID_Fabricante` FOREIGN KEY (`fk_fabricante_id`) REFERENCES `fabricante` (`id_fabricante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Equipamento_ID_Usuario` FOREIGN KEY (`fk_usuario_id`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `estoque_gerencia`
--
ALTER TABLE `estoque_gerencia`
  ADD CONSTRAINT `FK_Estoque_gerencia_ID_Equipamento` FOREIGN KEY (`fk_equipamento_id`) REFERENCES `equipamento` (`id_equipamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Estoque_gerencia_ID_Local` FOREIGN KEY (`fk_local_id`) REFERENCES `local` (`id_local`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
