-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: sysvenda
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_caixa`
--

DROP TABLE IF EXISTS `tb_caixa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_caixa` (
  `valor_caixa` decimal(10,2) NOT NULL,
  `data_caixa` date NOT NULL,
  `valor_inicial` decimal(10,2) DEFAULT NULL,
  `tipo_movimento` int NOT NULL,
  PRIMARY KEY (`data_caixa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_caixa`
--

LOCK TABLES `tb_caixa` WRITE;
/*!40000 ALTER TABLE `tb_caixa` DISABLE KEYS */;
INSERT INTO `tb_caixa` VALUES (2000.00,'2022-04-11',NULL,0),(2000.00,'2022-04-12',NULL,0),(3089.79,'2022-04-13',100.00,1),(4334.00,'2022-04-14',100.00,1),(1729.88,'2022-04-18',100.00,0),(100.00,'2022-04-28',100.00,0),(250.00,'2022-04-29',100.00,0),(0.00,'2022-05-05',100.00,1),(1528.00,'2022-05-17',100.00,0),(700.00,'2022-06-03',100.00,0),(250.00,'2022-06-08',100.00,0),(1565.04,'2022-06-10',1000.00,0),(3588.21,'2022-06-27',100.00,1),(0.00,'2022-06-28',100.00,0),(6243.70,'2022-06-29',100.00,0);
/*!40000 ALTER TABLE `tb_caixa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cargo`
--

DROP TABLE IF EXISTS `tb_cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_cargo` (
  `id_cargo` int NOT NULL AUTO_INCREMENT,
  `nome_cargo` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `descricao_cargo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `id_empresa` int NOT NULL,
  PRIMARY KEY (`id_cargo`),
  KEY `fk_tb_cargo_tb_empresa_idx` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cargo`
--

LOCK TABLES `tb_cargo` WRITE;
/*!40000 ALTER TABLE `tb_cargo` DISABLE KEYS */;
INSERT INTO `tb_cargo` VALUES (3,'Administrador','O Administrador pode cadastrar Cargos',1),(4,'Cargo De Homologador','Cargo De Homologador',1),(7,'Cargo Gerente','Gerente da loja',1),(8,'Desenvolvedor','Desenvolver Aplicações',1),(11,'Funcionário','Realiza Cadastro de Clientes',1);
/*!40000 ALTER TABLE `tb_cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categoria`
--

DROP TABLE IF EXISTS `tb_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_categoria` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `id_funcionario` int NOT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `fk_tb_categoria_tb_funcionario1_idx` (`id_funcionario`),
  CONSTRAINT `fk_tb_categoria_tb_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoria`
--

LOCK TABLES `tb_categoria` WRITE;
/*!40000 ALTER TABLE `tb_categoria` DISABLE KEYS */;
INSERT INTO `tb_categoria` VALUES (1,'Acessórios',1),(2,'Eletronicos',1),(4,'Concerto de Celulares',1),(14,'Serviços',1),(17,'CAIXA DE SOM',1),(18,'CABOS',1),(19,'SUPORTE VEICULAR',1),(20,'HEADPHONE',1),(21,'FONE INTRA AURICULAR',1),(22,'CARREGADOR COM CABO',1),(23,'CARREGADOR',1),(24,'ARMAZENAMENTO',1),(25,'Cordas',1),(26,'na tela',1);
/*!40000 ALTER TABLE `tb_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categoria_conta`
--

DROP TABLE IF EXISTS `tb_categoria_conta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_categoria_conta` (
  `id_cat_conta` int NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `id_funcionario` int NOT NULL,
  PRIMARY KEY (`id_cat_conta`),
  KEY `fk_tb_categoria_conta_1_idx` (`id_funcionario`),
  CONSTRAINT `fk_tb_categoria_conta_1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoria_conta`
--

LOCK TABLES `tb_categoria_conta` WRITE;
/*!40000 ALTER TABLE `tb_categoria_conta` DISABLE KEYS */;
INSERT INTO `tb_categoria_conta` VALUES (2,'Movimentação de Conta',1),(3,'TEste',1),(4,'Despesa com Mercadoria',1),(5,'Boleto',1);
/*!40000 ALTER TABLE `tb_categoria_conta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `rua_cliente` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `bairro_cliente` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `cep_cliente` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `cidade_cliente` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `estado_cliente` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `data_nascimento` date NOT NULL,
  `obs_cliente` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_bin DEFAULT NULL,
  `cpf_cliente` varchar(14) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `restricao` int DEFAULT NULL,
  `id_funcionario` int NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_tb_cliente_tb_funcionario1_idx` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cliente`
--

LOCK TABLES `tb_cliente` WRITE;
/*!40000 ALTER TABLE `tb_cliente` DISABLE KEYS */;
INSERT INTO `tb_cliente` VALUES (2,'Luciana Alessandra Lúcia da Cruz','Travessa Rio Maracá,651','Fortaleza','','Santana','AP','1992-01-24','luciana_dacruz@controtel.com.br','',NULL,1),(3,'Wladmir Barros','Av Maringa, 123','Centro','84040022','Londrina','Parana','1985-02-13','Professor TOP','',NULL,1),(6,'Lara Flávia Isabel da Mota','Avenida Paraíba','Jardim Santa Clara I','78718-010','Rondonópolis','MT','1963-03-06','','777.300.496-00',0,1),(7,'Bárbara e Lívia Marketing Ltda','Rua Major Estanislau Grossmann','Aviação','83045-380','São José dos Pinhais','Paraná','2017-07-02','Empresa do Ramo de Marketing','',NULL,1),(8,'JOSE TADEU ROSA','RUA JOSE PAVAN, 100','CENTRO','','Jacarezinho','PR','1976-06-12','','',NULL,1),(9,'Keila Mendes','Rua Marize Benato Cruz Trento, 50','Jardim Pequena Londres','','Londrina','PR','1988-12-01','Cliente','066.772.619-56',NULL,1),(10,'Venda sem Cliente','Rua Marize Benato Cruz Trento','Jardim Pequena Londres','86040-022','Londrina','PR','2021-01-01','Contato para vender','',NULL,1),(11,'JOSE TADEU ROSA JUNIOR','Rua Marize Benato Cruz Trento ,50','Jardim Pequena Londres','86040-022','Londrina','PR','1987-06-03','CLIENTE FIEL','010.273.869-62',NULL,1),(12,'fggddf','Rua Marize Benato Cruz Trento','Jardim Pequena Londres','86040-022','Londrina','PR','2022-04-08','4353453453453','549.464.654-56',1,1),(13,'teste','Rua Marize Benato Cruz Trento','Jardim Pequena Londres','86040-022','Londrina','PR','2022-04-04','adsasadsadsad','455.445.454-54',1,1);
/*!40000 ALTER TABLE `tb_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_conta`
--

DROP TABLE IF EXISTS `tb_conta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_conta` (
  `id_conta` int NOT NULL AUTO_INCREMENT,
  `banco_conta` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `agencia_conta` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `numero_conta` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `saldo_conta` decimal(10,2) NOT NULL,
  `id_funcionario` int NOT NULL,
  PRIMARY KEY (`id_conta`),
  KEY `fk_tb_conta_1_idx` (`id_funcionario`),
  CONSTRAINT `fk_tb_conta_1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_conta`
--

LOCK TABLES `tb_conta` WRITE;
/*!40000 ALTER TABLE `tb_conta` DISABLE KEYS */;
INSERT INTO `tb_conta` VALUES (1,'Banco do Brasil','3509-2','32400-0',45.00,1);
/*!40000 ALTER TABLE `tb_conta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_devolucao`
--

DROP TABLE IF EXISTS `tb_devolucao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_devolucao` (
  `dvlID` int NOT NULL AUTO_INCREMENT,
  `dvlProdValor` decimal(10,2) NOT NULL,
  `dvlDT` date NOT NULL,
  `dvlDescricao` text COLLATE utf8_bin,
  `dvlStatus` char(1) COLLATE utf8_bin DEFAULT 'L',
  `id_produto` int NOT NULL,
  `id_cliente` int NOT NULL,
  `id_funcionario` int NOT NULL,
  `dvlTipo` char(1) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`dvlID`),
  KEY `fk_tb_devolucao_1_idx` (`id_produto`),
  KEY `fk_tb_devolucao_2_idx` (`id_cliente`),
  KEY `fk_tb_devolucao_3_idx` (`id_funcionario`),
  CONSTRAINT `fk_tb_devolucao_1` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`),
  CONSTRAINT `fk_tb_devolucao_2` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`),
  CONSTRAINT `fk_tb_devolucao_3` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_devolucao`
--

LOCK TABLES `tb_devolucao` WRITE;
/*!40000 ALTER TABLE `tb_devolucao` DISABLE KEYS */;
INSERT INTO `tb_devolucao` VALUES (1,30.00,'2022-06-28','asdasdasdasda','U',10,9,1,'1'),(2,51.88,'2022-06-29','asdasasdadas','U',6,9,1,'1'),(3,51.88,'2022-06-29','iguyguyguyguygyu','U',6,8,1,'1');
/*!40000 ALTER TABLE `tb_devolucao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_empresa`
--

DROP TABLE IF EXISTS `tb_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_empresa` (
  `id_empresa` int NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `cnpj_empresa` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `descricao_empresa` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_bin DEFAULT NULL,
  `data_abertura` date NOT NULL,
  `email_empresa` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `senha_empresa` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_empresa`
--

LOCK TABLES `tb_empresa` WRITE;
/*!40000 ALTER TABLE `tb_empresa` DISABLE KEYS */;
INSERT INTO `tb_empresa` VALUES (1,'Rondoncell Assistencia Tecnica e Acessorios','43.225.798/0001-82','Empresa especializada em vendas de produtos e assistência técnica em celulares','2021-08-22','empresa@gmail.com','admin123');
/*!40000 ALTER TABLE `tb_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_empresa_conta`
--

DROP TABLE IF EXISTS `tb_empresa_conta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_empresa_conta` (
  `id_empresa` int NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `telefone_empresa` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `email_empresa` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `id_funcionario` int NOT NULL,
  PRIMARY KEY (`id_empresa`),
  UNIQUE KEY `nome_empresa_UNIQUE` (`nome_empresa`),
  KEY `fk_tb_empresa_conta_1_idx` (`id_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_empresa_conta`
--

LOCK TABLES `tb_empresa_conta` WRITE;
/*!40000 ALTER TABLE `tb_empresa_conta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_empresa_conta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_estoque`
--

DROP TABLE IF EXISTS `tb_estoque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_estoque` (
  `id_estoque` int NOT NULL AUTO_INCREMENT,
  `qtd_estoque` int NOT NULL,
  `id_produto` int NOT NULL,
  PRIMARY KEY (`id_estoque`),
  KEY `fk_tb_estoque_1_idx` (`id_produto`),
  CONSTRAINT `fk_tb_estoque_1` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_estoque`
--

LOCK TABLES `tb_estoque` WRITE;
/*!40000 ALTER TABLE `tb_estoque` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_estoque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_fornecedor`
--

DROP TABLE IF EXISTS `tb_fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_fornecedor` (
  `id_fornecedor` int NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `telefone_fornecedor` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `email_fornecedor` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `rua_fornecedor` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `cep_fornecedor` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `bairro_fornecedor` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `cidade_fornecedor` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `estado_fornecedor` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `cnpj_fornecedor` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `id_funcionario` int NOT NULL,
  PRIMARY KEY (`id_fornecedor`,`id_funcionario`),
  KEY `fk_fornecedor_tb_funcionario1_idx` (`id_funcionario`),
  CONSTRAINT `fk_fornecedor_tb_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_fornecedor`
--

LOCK TABLES `tb_fornecedor` WRITE;
/*!40000 ALTER TABLE `tb_fornecedor` DISABLE KEYS */;
INSERT INTO `tb_fornecedor` VALUES (2,'Kaique e Adriana Assessoria Jurídica Ltda','4139545093','ti@kaiqueeadrianaassessoriajuridicaltda.com.br','Avenida Victor Ferreira do Amaral 2940','82800900','Capão da Imbuia','Curitiba','PR','03330242000131',1),(4,'Lúcia e Betina Limpeza ME','4127983773','treinamento@luciaebetinalimpezame.com.br','Rua Vicêncio Benato','83514220','Areias','Almirante Tamandaré','São Paulo','15193498000123',1),(5,'Alice e Carla Financeira Ltda','(41) 98166-5748','fiscal@aliceecarlafinanceiraltda.com.br','Rua João Golemba, 310','82300-260','Santo Inácio','Curitiba','PR','27.440.835/0001-19',1),(7,'JOSE TADEU ROSA','(43) 3525-0306','jose.tadeu@congregacao.org.br','RUA JOSÉ PAVAN, 300','86400-000','VILA RONDON','Jacarezinho','PR','43.225.798/0001-82',1);
/*!40000 ALTER TABLE `tb_fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_funcionario`
--

DROP TABLE IF EXISTS `tb_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_funcionario` (
  `id_funcionario` int NOT NULL AUTO_INCREMENT,
  `nome_funcionario` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `data_admissao` date NOT NULL,
  `data_demissao` date DEFAULT NULL,
  `funcionario_email` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `funcionario_senha` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `id_empresa` int NOT NULL,
  `id_cargo` int NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `fk_tb_funcionario_tb_empresa1_idx` (`id_empresa`),
  KEY `fk_tb_funcionario_tb_cargo1_idx` (`id_cargo`),
  CONSTRAINT `fk_tb_funcionario_tb_empresa1` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_funcionario`
--

LOCK TABLES `tb_funcionario` WRITE;
/*!40000 ALTER TABLE `tb_funcionario` DISABLE KEYS */;
INSERT INTO `tb_funcionario` VALUES (1,'jose.junior','2022-02-01','2022-03-11','jose.junior@acessorias.com','@Jtrj121221',1,8),(2,'Abner','2021-10-11',NULL,'login','123456',1,4),(4,'Nicolas','2022-03-15',NULL,'admin1234','admin123',1,4),(6,'Gabriel','2020-11-23',NULL,'gab123','123456',1,8),(7,'Osni','2022-03-23',NULL,'osni123','123',1,8),(12,'Leonardo','2022-04-04',NULL,'admin123','123456',1,4);
/*!40000 ALTER TABLE `tb_funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_item_venda`
--

DROP TABLE IF EXISTS `tb_item_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_item_venda` (
  `id_item_venda` int NOT NULL AUTO_INCREMENT,
  `id_venda` int NOT NULL,
  `id_produto` int NOT NULL,
  `qtd_produto` int NOT NULL,
  `item_valor` decimal(10,2) NOT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `item_valor_fim` decimal(10,2) NOT NULL,
  `dvlID` int DEFAULT NULL,
  PRIMARY KEY (`id_item_venda`),
  KEY `fk_tb_item_venda_1_idx` (`id_venda`),
  KEY `fk_tb_item_venda_2_idx` (`id_produto`),
  CONSTRAINT `fk_tb_item_venda_1` FOREIGN KEY (`id_venda`) REFERENCES `tb_venda` (`id_venda`),
  CONSTRAINT `fk_tb_item_venda_2` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_item_venda`
--

LOCK TABLES `tb_item_venda` WRITE;
/*!40000 ALTER TABLE `tb_item_venda` DISABLE KEYS */;
INSERT INTO `tb_item_venda` VALUES (115,94,4,2,3956.30,NULL,0.00,NULL),(116,94,10,1,30.00,NULL,0.00,NULL),(117,94,6,1,51.88,NULL,0.00,NULL),(118,95,4,1,1978.15,NULL,0.00,NULL),(119,96,5,1,1428.00,NULL,0.00,NULL),(120,96,10,1,30.00,NULL,0.00,NULL),(121,96,6,1,51.88,NULL,0.00,NULL),(122,97,4,1,1978.15,NULL,0.00,NULL),(123,98,4,1,1978.15,NULL,0.00,NULL),(124,98,6,1,51.88,NULL,0.00,NULL),(125,99,4,1,1978.15,NULL,0.00,NULL),(126,100,4,1,1978.15,NULL,0.00,NULL),(127,101,4,1,1978.15,50.00,0.00,NULL),(131,103,4,1,1978.15,NULL,0.00,NULL),(133,105,8,1,150.00,NULL,0.00,NULL),(137,109,6,1,51.88,30.00,21.88,NULL),(142,112,4,1,1978.15,30.00,1948.15,NULL),(143,113,5,1,1428.00,NULL,1428.00,NULL),(144,113,6,1,51.88,NULL,0.00,NULL),(145,114,8,2,300.00,NULL,300.00,NULL),(146,114,6,1,51.88,NULL,0.00,NULL),(147,117,6,1,51.88,NULL,51.88,0),(148,117,8,1,150.00,51.88,98.12,2),(149,118,6,1,51.88,51.88,0.00,3);
/*!40000 ALTER TABLE `tb_item_venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_movimento`
--

DROP TABLE IF EXISTS `tb_movimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_movimento` (
  `id_movimento` int NOT NULL AUTO_INCREMENT,
  `tipo_movimento` smallint NOT NULL,
  `data_movimento` date NOT NULL,
  `valor_movimento` decimal(10,2) NOT NULL,
  `observacao_movimento` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_bin DEFAULT NULL,
  `id_fornecedor` int NOT NULL,
  `id_conta` int NOT NULL,
  `id_cat_conta` int NOT NULL,
  `id_funcionario` int NOT NULL,
  PRIMARY KEY (`id_movimento`),
  KEY `fk_tb_movimento_1_idx` (`id_fornecedor`),
  KEY `fk_tb_movimento_2_idx` (`id_conta`),
  KEY `fk_tb_movimento_3_idx` (`id_cat_conta`),
  KEY `fk_tb_movimento_4_idx` (`id_funcionario`),
  CONSTRAINT `fk_tb_movimento_2` FOREIGN KEY (`id_conta`) REFERENCES `tb_conta` (`id_conta`),
  CONSTRAINT `fk_tb_movimento_3` FOREIGN KEY (`id_cat_conta`) REFERENCES `tb_categoria_conta` (`id_cat_conta`),
  CONSTRAINT `fk_tb_movimento_4` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`),
  CONSTRAINT `fk_tb_movimento_5` FOREIGN KEY (`id_fornecedor`) REFERENCES `tb_fornecedor` (`id_fornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_movimento`
--

LOCK TABLES `tb_movimento` WRITE;
/*!40000 ALTER TABLE `tb_movimento` DISABLE KEYS */;
INSERT INTO `tb_movimento` VALUES (1,1,'2022-04-13',1000.00,'asddas',5,1,2,1),(2,2,'2022-04-18',1000.00,'',5,1,4,1),(3,2,'2022-04-25',1500.00,'asdsadas',7,1,4,1),(5,2,'2022-05-05',150.00,'BOLETO PARA HOJE',7,1,4,1),(6,2,'2022-05-06',100.00,'QWDASDASD',4,1,4,1),(8,2,'2022-05-24',155.00,'vai vencer',2,1,2,1),(9,2,'2022-06-11',50.00,'pagamento de boleto',7,1,5,1);
/*!40000 ALTER TABLE `tb_movimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_produto` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `cod_produto` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `nome_produto` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `descricao_produto` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `valor_produto` decimal(10,2) NOT NULL,
  `data_cadastro` date NOT NULL,
  `estoque` int NOT NULL,
  `custo` decimal(10,2) DEFAULT NULL,
  `unidade` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8_bin DEFAULT NULL,
  `ativo` int DEFAULT NULL,
  `id_funcionario` int NOT NULL,
  `id_fornecedor` int NOT NULL,
  `id_categoria` int NOT NULL,
  `id_subCategoria` int NOT NULL,
  `nome_arquivo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_bin DEFAULT NULL,
  `path` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `fk_tb_produto_tb_funcionario1_idx` (`id_funcionario`),
  KEY `fk_tb_produto_tb_fornecedor1_idx` (`id_fornecedor`),
  KEY `fk_tb_produto_1_idx` (`id_categoria`),
  KEY `fk_tb_produto_2_idx` (`id_subCategoria`),
  CONSTRAINT `fk_tb_produto_1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id_categoria`),
  CONSTRAINT `fk_tb_produto_2` FOREIGN KEY (`id_subCategoria`) REFERENCES `tb_sub_categoria` (`id_subCategoria`),
  CONSTRAINT `fk_tb_produto_tb_fornecedor1` FOREIGN KEY (`id_fornecedor`) REFERENCES `tb_fornecedor` (`id_fornecedor`),
  CONSTRAINT `fk_tb_produto_tb_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produto`
--

LOCK TABLES `tb_produto` WRITE;
/*!40000 ALTER TABLE `tb_produto` DISABLE KEYS */;
INSERT INTO `tb_produto` VALUES (4,'0123','Smartphone Moto G20 64GB','Smartphone Moto G20 64GB 4G Wi-Fi Tela 6.5\'\' Dual Chip 4GB RAM Câmera Quádrupla + Selfie 13MP - Pink',1978.15,'2022-03-30',0,899.00,'un',NULL,1,2,2,3,'WhatsApp Image 2022-03-18 at 9.04.21 AM.jpeg','arquivos/62579e3068f2e.jpeg'),(5,'1233','Smartphone Samsung Galaxy A32 128GB','Smartphone Samsung Galaxy A32 128GB 4G Wi-Fi Tela 6.4\'\' Dual Chip 4GB RAM Câmera Quádrupla + Selfie 20MP - Azul',1428.00,'2022-03-30',8,950.00,'',NULL,1,4,2,3,'WhatsApp Image 2022-03-18 at 9.04.21 AM (1).jpeg','arquivos/62579cc29b9df.jpeg'),(6,'789123','Cabo de Celular tipo C','Cabo Tipo C, com extensão',51.88,'2021-01-01',4,10.00,'Un',NULL,1,4,1,5,'','arquivos/62a371a1e4016.'),(8,'42423','CAIXA DE SOM 101-B','dasdadasdsa',150.00,'2022-03-14',6,100.00,'un',NULL,1,2,1,2,'','arquivos/6298fbc6b9464.'),(10,'7898535506059','CARREGADOR MOTOROLLA AUTHENTIC','',30.00,'2022-04-14',9,20.00,'',NULL,1,2,1,5,'','arquivos/62b4b1af7c41a.');
/*!40000 ALTER TABLE `tb_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_sub_categoria`
--

DROP TABLE IF EXISTS `tb_sub_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_sub_categoria` (
  `id_subCategoria` int NOT NULL AUTO_INCREMENT,
  `nome_subcategoria` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `id_categoria` int NOT NULL,
  PRIMARY KEY (`id_subCategoria`,`id_categoria`),
  KEY `fk_subCategoria_Categoria1_idx` (`id_categoria`),
  CONSTRAINT `fk_subCategoria_Categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sub_categoria`
--

LOCK TABLES `tb_sub_categoria` WRITE;
/*!40000 ALTER TABLE `tb_sub_categoria` DISABLE KEYS */;
INSERT INTO `tb_sub_categoria` VALUES (1,'Cabo de Celular',4),(2,'Caixa de Som',2),(3,'Celular',2),(5,'Carregador Tipo C',1),(6,'Violino',1),(7,'CINTO MASCULINO',14),(8,'LIMPEZA DE PC',14);
/*!40000 ALTER TABLE `tb_sub_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_venda`
--

DROP TABLE IF EXISTS `tb_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_venda` (
  `id_venda` int NOT NULL AUTO_INCREMENT,
  `data_venda` date NOT NULL,
  `id_cliente` int NOT NULL,
  `id_funcionario` int NOT NULL,
  PRIMARY KEY (`id_venda`),
  KEY `fk_tb_venda_2_idx` (`id_cliente`),
  KEY `fk_tb_venda_1_idx` (`id_funcionario`),
  CONSTRAINT `fk_tb_venda_1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`),
  CONSTRAINT `fk_tb_venda_2` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_venda`
--

LOCK TABLES `tb_venda` WRITE;
/*!40000 ALTER TABLE `tb_venda` DISABLE KEYS */;
INSERT INTO `tb_venda` VALUES (94,'2022-06-27',6,1),(95,'2022-06-27',6,1),(96,'2022-06-27',7,1),(97,'2022-06-28',7,1),(98,'2022-06-28',8,1),(99,'2022-06-28',7,1),(100,'2022-06-28',6,1),(101,'2022-06-28',7,1),(102,'2022-06-29',7,1),(103,'2022-06-29',6,1),(104,'2022-06-29',8,1),(105,'2022-06-29',10,1),(106,'2022-06-29',10,1),(107,'2022-06-29',9,1),(109,'2022-06-29',7,1),(111,'2022-06-29',7,1),(112,'2022-06-29',8,1),(113,'2022-06-29',7,1),(114,'2022-06-29',6,1),(117,'2022-06-29',6,1),(118,'2022-06-29',8,1);
/*!40000 ALTER TABLE `tb_venda` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-29 18:10:22
