-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 01:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cad_cliente`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_caixa`
--

CREATE TABLE `tb_caixa` (
  `valor_caixa` decimal(10,2) NOT NULL,
  `data_caixa` date NOT NULL,
  `valor_inicial` decimal(10,2) DEFAULT NULL,
  `tipo_movimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_caixa`
--

INSERT INTO `tb_caixa` (`valor_caixa`, `data_caixa`, `valor_inicial`, `tipo_movimento`) VALUES
('2000.00', '2022-04-11', NULL, 0),
('2000.00', '2022-04-12', NULL, 0),
('3089.79', '2022-04-13', '100.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cargo`
--

CREATE TABLE `tb_cargo` (
  `id_cargo` int(11) NOT NULL,
  `nome_cargo` varchar(45) COLLATE utf8_bin NOT NULL,
  `descricao_cargo` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_cargo`
--

INSERT INTO `tb_cargo` (`id_cargo`, `nome_cargo`, `descricao_cargo`, `id_empresa`) VALUES
(3, 'Administrador', 'O Administrador pode cadastrar Cargos', 1),
(4, 'Cargo De Homologador', 'Cargo De Homologador', 1),
(7, 'Cargo Gerente', 'Gerente da loja', 1),
(8, 'Desenvolvedor', 'Desenvolver Aplicações', 1),
(11, 'Funcionário', 'Realiza Cadastro de Clientes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_categoria`
--

INSERT INTO `tb_categoria` (`id_categoria`, `nome_categoria`, `id_funcionario`) VALUES
(1, 'Acessórios', 1),
(2, 'Eletronicos', 1),
(4, 'Concerto de Celulares', 1),
(14, 'Serviços', 1),
(17, 'CAIXA DE SOM', 1),
(18, 'CABOS', 1),
(19, 'SUPORTE VEICULAR', 1),
(20, 'HEADPHONE', 1),
(21, 'FONE INTRA AURICULAR', 1),
(22, 'CARREGADOR COM CABO', 1),
(23, 'CARREGADOR', 1),
(24, 'ARMAZENAMENTO', 1),
(25, 'Cordas', 1),
(26, 'na tela', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_categoria_conta`
--

CREATE TABLE `tb_categoria_conta` (
  `id_cat_conta` int(11) NOT NULL,
  `nome_categoria` varchar(45) COLLATE utf8_bin NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_categoria_conta`
--

INSERT INTO `tb_categoria_conta` (`id_cat_conta`, `nome_categoria`, `id_funcionario`) VALUES
(2, 'Movimentação de Conta', 1),
(3, 'TEste', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(100) COLLATE utf8_bin NOT NULL,
  `rua_cliente` varchar(200) COLLATE utf8_bin NOT NULL,
  `bairro_cliente` varchar(200) COLLATE utf8_bin NOT NULL,
  `cep_cliente` varchar(45) COLLATE utf8_bin NOT NULL,
  `cidade_cliente` varchar(100) COLLATE utf8_bin NOT NULL,
  `estado_cliente` varchar(45) COLLATE utf8_bin NOT NULL,
  `data_nascimento` date NOT NULL,
  `obs_cliente` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `cpf_cliente` varchar(14) COLLATE utf8_bin NOT NULL,
  `restricao` int(11) DEFAULT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_cliente`
--

INSERT INTO `tb_cliente` (`id_cliente`, `nome_cliente`, `rua_cliente`, `bairro_cliente`, `cep_cliente`, `cidade_cliente`, `estado_cliente`, `data_nascimento`, `obs_cliente`, `cpf_cliente`, `restricao`, `id_funcionario`) VALUES
(2, 'Luciana Alessandra Lúcia da Cruz', 'Travessa Rio Maracá,651', 'Fortaleza', '', 'Santana', 'AP', '1992-01-24', 'luciana_dacruz@controtel.com.br', '', NULL, 1),
(3, 'Wladmir Barros', 'Av Maringa, 123', 'Centro', '84040022', 'Londrina', 'Parana', '1985-02-13', 'Professor TOP', '', NULL, 1),
(6, 'Lara Flávia Isabel da Mota', 'Avenida Paraíba', 'Jardim Santa Clara I', '78718-010', 'Rondonópolis', 'MT', '1963-03-06', '', '777.300.496-00', 0, 1),
(7, 'Bárbara e Lívia Marketing Ltda', 'Rua Major Estanislau Grossmann', 'Aviação', '83045-380', 'São José dos Pinhais', 'Paraná', '2017-07-02', 'Empresa do Ramo de Marketing', '', NULL, 1),
(8, 'JOSE TADEU ROSA', 'RUA JOSE PAVAN, 100', 'CENTRO', '', 'Jacarezinho', 'PR', '1976-06-12', '', '', NULL, 1),
(9, 'Keila Mendes', 'Rua Marize Benato Cruz Trento, 50', 'Jardim Pequena Londres', '', 'Londrina', 'PR', '1988-12-01', 'Cliente', '066.772.619-56', NULL, 1),
(10, 'Venda sem Cliente', 'Rua Marize Benato Cruz Trento', 'Jardim Pequena Londres', '86040-022', 'Londrina', 'PR', '2021-01-01', 'Contato para vender', '', NULL, 1),
(11, 'JOSE TADEU ROSA JUNIOR', 'Rua Marize Benato Cruz Trento ,50', 'Jardim Pequena Londres', '86040-022', 'Londrina', 'PR', '1987-06-03', 'CLIENTE FIEL', '010.273.869-62', NULL, 1),
(12, 'fggddf', 'Rua Marize Benato Cruz Trento', 'Jardim Pequena Londres', '86040-022', 'Londrina', 'PR', '2022-04-08', '4353453453453', '549.464.654-56', 1, 1),
(13, 'teste', 'Rua Marize Benato Cruz Trento', 'Jardim Pequena Londres', '86040-022', 'Londrina', 'PR', '2022-04-04', 'adsasadsadsad', '455.445.454-54', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_conta`
--

CREATE TABLE `tb_conta` (
  `id_conta` int(11) NOT NULL,
  `banco_conta` varchar(45) COLLATE utf8_bin NOT NULL,
  `agencia_conta` varchar(45) COLLATE utf8_bin NOT NULL,
  `numero_conta` varchar(45) COLLATE utf8_bin NOT NULL,
  `saldo_conta` decimal(10,2) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_conta`
--

INSERT INTO `tb_conta` (`id_conta`, `banco_conta`, `agencia_conta`, `numero_conta`, `saldo_conta`, `id_funcionario`) VALUES
(1, 'Banco do Brasil', '3509-2', '32400-0', '3000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_empresa`
--

CREATE TABLE `tb_empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(150) COLLATE utf8_bin NOT NULL,
  `cnpj_empresa` varchar(45) COLLATE utf8_bin NOT NULL,
  `descricao_empresa` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `data_abertura` date NOT NULL,
  `email_empresa` varchar(45) COLLATE utf8_bin NOT NULL,
  `senha_empresa` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_empresa`
--

INSERT INTO `tb_empresa` (`id_empresa`, `nome_empresa`, `cnpj_empresa`, `descricao_empresa`, `data_abertura`, `email_empresa`, `senha_empresa`) VALUES
(1, 'Rondoncell Assistencia Tecnica e Acessorios', '43.225.798/0001-82', 'Empresa especializada em vendas de produtos e assistência técnica em celulares', '2021-08-22', 'empresa@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_empresa_conta`
--

CREATE TABLE `tb_empresa_conta` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(150) COLLATE utf8_bin NOT NULL,
  `telefone_empresa` varchar(45) COLLATE utf8_bin NOT NULL,
  `email_empresa` varchar(150) COLLATE utf8_bin NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tb_estoque`
--

CREATE TABLE `tb_estoque` (
  `id_estoque` int(11) NOT NULL,
  `qtd_estoque` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tb_fornecedor`
--

CREATE TABLE `tb_fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `nome_fornecedor` varchar(200) COLLATE utf8_bin NOT NULL,
  `telefone_fornecedor` varchar(45) COLLATE utf8_bin NOT NULL,
  `email_fornecedor` varchar(100) COLLATE utf8_bin NOT NULL,
  `rua_fornecedor` varchar(150) COLLATE utf8_bin NOT NULL,
  `cep_fornecedor` varchar(150) COLLATE utf8_bin NOT NULL,
  `bairro_fornecedor` varchar(45) COLLATE utf8_bin NOT NULL,
  `cidade_fornecedor` varchar(100) COLLATE utf8_bin NOT NULL,
  `estado_fornecedor` varchar(150) COLLATE utf8_bin NOT NULL,
  `cnpj_fornecedor` varchar(45) COLLATE utf8_bin NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_fornecedor`
--

INSERT INTO `tb_fornecedor` (`id_fornecedor`, `nome_fornecedor`, `telefone_fornecedor`, `email_fornecedor`, `rua_fornecedor`, `cep_fornecedor`, `bairro_fornecedor`, `cidade_fornecedor`, `estado_fornecedor`, `cnpj_fornecedor`, `id_funcionario`) VALUES
(2, 'Kaique e Adriana Assessoria Jurídica Ltda', '4139545093', 'ti@kaiqueeadrianaassessoriajuridicaltda.com.br', 'Avenida Victor Ferreira do Amaral 2940', '82800900', 'Capão da Imbuia', 'Curitiba', 'PR', '03330242000131', 1),
(4, 'Lúcia e Betina Limpeza ME', '4127983773', 'treinamento@luciaebetinalimpezame.com.br', 'Rua Vicêncio Benato', '83514220', 'Areias', 'Almirante Tamandaré', 'São Paulo', '15193498000123', 1),
(5, 'Alice e Carla Financeira Ltda', '(41) 98166-5748', 'fiscal@aliceecarlafinanceiraltda.com.br', 'Rua João Golemba, 310', '82300-260', 'Santo Inácio', 'Curitiba', 'PR', '27.440.835/0001-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome_funcionario` varchar(100) COLLATE utf8_bin NOT NULL,
  `data_admissao` date NOT NULL,
  `data_demissao` date DEFAULT NULL,
  `funcionario_email` varchar(45) COLLATE utf8_bin NOT NULL,
  `funcionario_senha` varchar(45) COLLATE utf8_bin NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id_funcionario`, `nome_funcionario`, `data_admissao`, `data_demissao`, `funcionario_email`, `funcionario_senha`, `id_empresa`, `id_cargo`) VALUES
(1, 'jose.junior', '2022-02-01', '2022-03-11', 'jose.junior@acessorias.com', '@Jtrj121221', 1, 8),
(2, 'Abner', '2021-10-11', NULL, 'login', '123456', 1, 4),
(4, 'Nicolas', '2022-03-15', NULL, 'admin1234', 'admin123', 1, 4),
(6, 'Gabriel', '2020-11-23', NULL, 'gab123', '123456', 1, 8),
(7, 'Osni', '2022-03-23', NULL, 'osni123', '123', 1, 8),
(12, 'Leonardo', '2022-04-04', NULL, 'admin123', '123456', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_item_venda`
--

CREATE TABLE `tb_item_venda` (
  `id_item_venda` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtd_produto` int(11) NOT NULL,
  `item_valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_item_venda`
--

INSERT INTO `tb_item_venda` (`id_item_venda`, `id_venda`, `id_produto`, `qtd_produto`, `item_valor`) VALUES
(77, 67, 4, 1, '1079.00'),
(78, 67, 5, 1, '1428.00'),
(79, 68, 4, 1, '1079.00'),
(80, 69, 6, 1, '51.88'),
(81, 70, 4, 1, '1978.15'),
(82, 71, 6, 1, '51.88'),
(83, 72, 5, 2, '2856.00'),
(85, 72, 6, 1, '51.88');

-- --------------------------------------------------------

--
-- Table structure for table `tb_movimento`
--

CREATE TABLE `tb_movimento` (
  `id_movimento` int(11) NOT NULL,
  `tipo_movimento` smallint(6) NOT NULL,
  `data_movimento` date NOT NULL,
  `valor_movimento` decimal(10,2) NOT NULL,
  `observacao_movimento` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `id_cat_conta` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_movimento`
--

INSERT INTO `tb_movimento` (`id_movimento`, `tipo_movimento`, `data_movimento`, `valor_movimento`, `observacao_movimento`, `id_fornecedor`, `id_conta`, `id_cat_conta`, `id_funcionario`) VALUES
(1, 1, '2022-04-13', '1000.00', 'asddas', 5, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id_produto` int(11) NOT NULL,
  `cod_produto` varchar(100) COLLATE utf8_bin NOT NULL,
  `nome_produto` varchar(100) COLLATE utf8_bin NOT NULL,
  `descricao_produto` varchar(250) COLLATE utf8_bin NOT NULL,
  `valor_produto` decimal(10,2) NOT NULL,
  `data_cadastro` date NOT NULL,
  `estoque` int(11) NOT NULL,
  `custo` decimal(10,2) DEFAULT NULL,
  `unidade` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subCategoria` int(11) NOT NULL,
  `nome_arquivo` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `path` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `cod_produto`, `nome_produto`, `descricao_produto`, `valor_produto`, `data_cadastro`, `estoque`, `custo`, `unidade`, `ativo`, `id_funcionario`, `id_fornecedor`, `id_categoria`, `id_subCategoria`, `nome_arquivo`, `path`) VALUES
(4, '0123', 'Smartphone Moto G20 64GB', 'Smartphone Moto G20 64GB 4G Wi-Fi Tela 6.5\'\' Dual Chip 4GB RAM Câmera Quádrupla + Selfie 13MP - Pink', '1978.15', '2022-03-30', 0, '899.00', 'un', NULL, 1, 2, 2, 3, 'WhatsApp Image 2022-03-18 at 9.04.21 AM.jpeg', 'arquivos/62579e3068f2e.jpeg'),
(5, '1233', 'Smartphone Samsung Galaxy A32 128GB', 'Smartphone Samsung Galaxy A32 128GB 4G Wi-Fi Tela 6.4\'\' Dual Chip 4GB RAM Câmera Quádrupla + Selfie 20MP - Azul', '1428.00', '2022-03-30', 6, '950.00', '', NULL, 1, 4, 2, 3, 'WhatsApp Image 2022-03-18 at 9.04.21 AM (1).jpeg', 'arquivos/62579cc29b9df.jpeg'),
(6, '789123', 'Cabo de Celular tipo C', 'Cabo Tipo C, com extensão', '51.88', '2021-01-01', 2, '20.00', 'Un', NULL, 1, 4, 1, 5, 'WhatsApp Image 2022-03-18 at 9.04.35 AM (2).jpeg', 'arquivos/625799cb93c61.jpeg'),
(8, '42423', 'CAIXA DE SOM 101-B', 'dasdadasdsa', '150.00', '2022-03-14', 1, '100.00', 'un', NULL, 1, 2, 1, 2, 'WhatsApp Image 2022-03-18 at 9.04.11 AM.jpeg', 'arquivos/62579a97811ab.jpeg'),
(10, 'd234234', 'CARREGADOR MOTOROLLA AUTHENTIC', '', '30.00', '2022-04-14', 1, '20.00', '', NULL, 1, 2, 1, 5, 'WhatsApp Image 2022-03-18 at 9.04.15 AM (1).jpeg', 'arquivos/62579acf98daa.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_categoria`
--

CREATE TABLE `tb_sub_categoria` (
  `id_subCategoria` int(11) NOT NULL,
  `nome_subcategoria` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_sub_categoria`
--

INSERT INTO `tb_sub_categoria` (`id_subCategoria`, `nome_subcategoria`, `id_categoria`) VALUES
(1, 'Cabo de Celular', 4),
(2, 'Caixa de Som', 2),
(3, 'Celular', 2),
(5, 'Carregador Tipo C', 1),
(6, 'Violino', 1),
(7, 'CINTO MASCULINO', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tb_venda`
--

CREATE TABLE `tb_venda` (
  `id_venda` int(11) NOT NULL,
  `data_venda` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_venda`
--

INSERT INTO `tb_venda` (`id_venda`, `data_venda`, `id_cliente`, `id_funcionario`) VALUES
(67, '2022-04-12', 8, 1),
(68, '2022-04-12', 7, 1),
(69, '2022-04-13', 7, 1),
(70, '2022-04-13', 10, 1),
(71, '2022-04-13', 8, 1),
(72, '2022-04-13', 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_caixa`
--
ALTER TABLE `tb_caixa`
  ADD PRIMARY KEY (`data_caixa`);

--
-- Indexes for table `tb_cargo`
--
ALTER TABLE `tb_cargo`
  ADD PRIMARY KEY (`id_cargo`),
  ADD KEY `fk_tb_cargo_tb_empresa_idx` (`id_empresa`);

--
-- Indexes for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `fk_tb_categoria_tb_funcionario1_idx` (`id_funcionario`);

--
-- Indexes for table `tb_categoria_conta`
--
ALTER TABLE `tb_categoria_conta`
  ADD PRIMARY KEY (`id_cat_conta`),
  ADD KEY `fk_tb_categoria_conta_1_idx` (`id_funcionario`);

--
-- Indexes for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_tb_cliente_tb_funcionario1_idx` (`id_funcionario`);

--
-- Indexes for table `tb_conta`
--
ALTER TABLE `tb_conta`
  ADD PRIMARY KEY (`id_conta`),
  ADD KEY `fk_tb_conta_1_idx` (`id_funcionario`);

--
-- Indexes for table `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `tb_empresa_conta`
--
ALTER TABLE `tb_empresa_conta`
  ADD PRIMARY KEY (`id_empresa`),
  ADD UNIQUE KEY `nome_empresa_UNIQUE` (`nome_empresa`),
  ADD KEY `fk_tb_empresa_conta_1_idx` (`id_funcionario`);

--
-- Indexes for table `tb_estoque`
--
ALTER TABLE `tb_estoque`
  ADD PRIMARY KEY (`id_estoque`),
  ADD KEY `fk_tb_estoque_1_idx` (`id_produto`);

--
-- Indexes for table `tb_fornecedor`
--
ALTER TABLE `tb_fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`,`id_funcionario`),
  ADD KEY `fk_fornecedor_tb_funcionario1_idx` (`id_funcionario`);

--
-- Indexes for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `fk_tb_funcionario_tb_empresa1_idx` (`id_empresa`),
  ADD KEY `fk_tb_funcionario_tb_cargo1_idx` (`id_cargo`);

--
-- Indexes for table `tb_item_venda`
--
ALTER TABLE `tb_item_venda`
  ADD PRIMARY KEY (`id_item_venda`),
  ADD KEY `fk_tb_item_venda_1_idx` (`id_venda`),
  ADD KEY `fk_tb_item_venda_2_idx` (`id_produto`);

--
-- Indexes for table `tb_movimento`
--
ALTER TABLE `tb_movimento`
  ADD PRIMARY KEY (`id_movimento`),
  ADD KEY `fk_tb_movimento_1_idx` (`id_fornecedor`),
  ADD KEY `fk_tb_movimento_2_idx` (`id_conta`),
  ADD KEY `fk_tb_movimento_3_idx` (`id_cat_conta`),
  ADD KEY `fk_tb_movimento_4_idx` (`id_funcionario`);

--
-- Indexes for table `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `fk_tb_produto_tb_funcionario1_idx` (`id_funcionario`),
  ADD KEY `fk_tb_produto_tb_fornecedor1_idx` (`id_fornecedor`),
  ADD KEY `fk_tb_produto_1_idx` (`id_categoria`),
  ADD KEY `fk_tb_produto_2_idx` (`id_subCategoria`);

--
-- Indexes for table `tb_sub_categoria`
--
ALTER TABLE `tb_sub_categoria`
  ADD PRIMARY KEY (`id_subCategoria`,`id_categoria`),
  ADD KEY `fk_subCategoria_Categoria1_idx` (`id_categoria`);

--
-- Indexes for table `tb_venda`
--
ALTER TABLE `tb_venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `fk_tb_venda_2_idx` (`id_cliente`),
  ADD KEY `fk_tb_venda_1_idx` (`id_funcionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cargo`
--
ALTER TABLE `tb_cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_categoria_conta`
--
ALTER TABLE `tb_categoria_conta`
  MODIFY `id_cat_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_conta`
--
ALTER TABLE `tb_conta`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_empresa_conta`
--
ALTER TABLE `tb_empresa_conta`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_estoque`
--
ALTER TABLE `tb_estoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_fornecedor`
--
ALTER TABLE `tb_fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_item_venda`
--
ALTER TABLE `tb_item_venda`
  MODIFY `id_item_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tb_movimento`
--
ALTER TABLE `tb_movimento`
  MODIFY `id_movimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_sub_categoria`
--
ALTER TABLE `tb_sub_categoria`
  MODIFY `id_subCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_venda`
--
ALTER TABLE `tb_venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD CONSTRAINT `fk_tb_categoria_tb_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`);

--
-- Constraints for table `tb_categoria_conta`
--
ALTER TABLE `tb_categoria_conta`
  ADD CONSTRAINT `fk_tb_categoria_conta_1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`);

--
-- Constraints for table `tb_conta`
--
ALTER TABLE `tb_conta`
  ADD CONSTRAINT `fk_tb_conta_1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`);

--
-- Constraints for table `tb_estoque`
--
ALTER TABLE `tb_estoque`
  ADD CONSTRAINT `fk_tb_estoque_1` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`);

--
-- Constraints for table `tb_fornecedor`
--
ALTER TABLE `tb_fornecedor`
  ADD CONSTRAINT `fk_fornecedor_tb_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`);

--
-- Constraints for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD CONSTRAINT `fk_tb_funcionario_tb_empresa1` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`);

--
-- Constraints for table `tb_item_venda`
--
ALTER TABLE `tb_item_venda`
  ADD CONSTRAINT `fk_tb_item_venda_1` FOREIGN KEY (`id_venda`) REFERENCES `tb_venda` (`id_venda`),
  ADD CONSTRAINT `fk_tb_item_venda_2` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`);

--
-- Constraints for table `tb_movimento`
--
ALTER TABLE `tb_movimento`
  ADD CONSTRAINT `fk_tb_movimento_2` FOREIGN KEY (`id_conta`) REFERENCES `tb_conta` (`id_conta`),
  ADD CONSTRAINT `fk_tb_movimento_3` FOREIGN KEY (`id_cat_conta`) REFERENCES `tb_categoria_conta` (`id_cat_conta`),
  ADD CONSTRAINT `fk_tb_movimento_4` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`),
  ADD CONSTRAINT `fk_tb_movimento_5` FOREIGN KEY (`id_fornecedor`) REFERENCES `tb_fornecedor` (`id_fornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD CONSTRAINT `fk_tb_produto_1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id_categoria`),
  ADD CONSTRAINT `fk_tb_produto_2` FOREIGN KEY (`id_subCategoria`) REFERENCES `tb_sub_categoria` (`id_subCategoria`),
  ADD CONSTRAINT `fk_tb_produto_tb_fornecedor1` FOREIGN KEY (`id_fornecedor`) REFERENCES `tb_fornecedor` (`id_fornecedor`),
  ADD CONSTRAINT `fk_tb_produto_tb_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`);

--
-- Constraints for table `tb_sub_categoria`
--
ALTER TABLE `tb_sub_categoria`
  ADD CONSTRAINT `fk_subCategoria_Categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id_categoria`);

--
-- Constraints for table `tb_venda`
--
ALTER TABLE `tb_venda`
  ADD CONSTRAINT `fk_tb_venda_1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`),
  ADD CONSTRAINT `fk_tb_venda_2` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
