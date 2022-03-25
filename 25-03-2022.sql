-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: db_cadcliente_dtx
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
-- Table structure for table `Categoria`
--

DROP TABLE IF EXISTS `Categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Categoria` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_funcionario` int NOT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `fk_Categoria_tb_funcionario1_idx` (`id_funcionario`),
  CONSTRAINT `fk_Categoria_tb_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categoria`
--

LOCK TABLES `Categoria` WRITE;
/*!40000 ALTER TABLE `Categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `Categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estoque`
--

DROP TABLE IF EXISTS `estoque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estoque` (
  `id_estoque` int NOT NULL AUTO_INCREMENT,
  `qtd_estoque` int NOT NULL,
  PRIMARY KEY (`id_estoque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estoque`
--

LOCK TABLES `estoque` WRITE;
/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
/*!40000 ALTER TABLE `estoque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fornecedor` (
  `id_fornecedor` int NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` varchar(200) COLLATE utf8_bin NOT NULL,
  `telefone_fornecedor` varchar(45) COLLATE utf8_bin NOT NULL,
  `email_fornecedor` varchar(100) COLLATE utf8_bin NOT NULL,
  `endereco_fornecedor` varchar(150) COLLATE utf8_bin NOT NULL,
  `rua_fornecedor` varchar(150) COLLATE utf8_bin NOT NULL,
  `bairro_fornecedor` varchar(45) COLLATE utf8_bin NOT NULL,
  `cidade_fornecedor` varchar(100) COLLATE utf8_bin NOT NULL,
  `cnpj_fornecedor` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_funcionario` int NOT NULL,
  PRIMARY KEY (`id_fornecedor`),
  KEY `fk_fornecedor_tb_funcionario1_idx` (`id_funcionario`),
  CONSTRAINT `fk_fornecedor_tb_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `cod_produto` varchar(100) COLLATE utf8_bin NOT NULL,
  `nome_produto` varchar(100) COLLATE utf8_bin NOT NULL,
  `descricao_produto` varchar(250) COLLATE utf8_bin NOT NULL,
  `valor_produto` decimal(10,2) NOT NULL,
  `data_cadastro` date NOT NULL,
  `id_estoque` int NOT NULL,
  `id_fornecedor` int NOT NULL,
  `id_funcionario` int NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `fk_produto_estoque1_idx` (`id_estoque`),
  KEY `fk_produto_fornecedor1_idx` (`id_fornecedor`),
  KEY `fk_produto_tb_funcionario1_idx` (`id_funcionario`),
  CONSTRAINT `fk_produto_estoque1` FOREIGN KEY (`id_estoque`) REFERENCES `estoque` (`id_estoque`),
  CONSTRAINT `fk_produto_fornecedor1` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`),
  CONSTRAINT `fk_produto_tb_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subCategoria`
--

DROP TABLE IF EXISTS `subCategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subCategoria` (
  `id_sub_categoria` int NOT NULL AUTO_INCREMENT,
  `nome_subcategoria` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_categoria` int NOT NULL,
  PRIMARY KEY (`id_sub_categoria`),
  KEY `fk_subCategoria_Categoria1_idx` (`id_categoria`),
  CONSTRAINT `fk_subCategoria_Categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `Categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subCategoria`
--

LOCK TABLES `subCategoria` WRITE;
/*!40000 ALTER TABLE `subCategoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `subCategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cargo`
--

DROP TABLE IF EXISTS `tb_cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_cargo` (
  `id_cargo` int NOT NULL AUTO_INCREMENT,
  `nome_cargo` varchar(45) COLLATE utf8_bin NOT NULL,
  `descricao_cargo` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_empresa` int NOT NULL,
  PRIMARY KEY (`id_cargo`),
  KEY `fk_tb_cargo_tb_empresa_idx` (`id_empresa`),
  CONSTRAINT `fk_tb_cargo_tb_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cargo`
--

LOCK TABLES `tb_cargo` WRITE;
/*!40000 ALTER TABLE `tb_cargo` DISABLE KEYS */;
INSERT INTO `tb_cargo` VALUES (3,'Administrador','O Administrador pode cadastrar Cargos e Funcionários',1),(4,'Cargo De Homologador','Cargo De Homologador',1),(6,'Professor','Professor para demonstração do sistema',1),(7,'Cargo Gerente','Gerente da loja',1),(8,'Desenvolvedor','Desenvolver Aplicações com Tecnologias atuais',1),(9,'Coordenador Geral','Coordenar equipe geral',1),(11,'Funcionário','Realiza Cadastro de Clientes',1);
/*!40000 ALTER TABLE `tb_cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) COLLATE utf8_bin NOT NULL,
  `rua_cliente` varchar(200) COLLATE utf8_bin NOT NULL,
  `bairro_cliente` varchar(200) COLLATE utf8_bin NOT NULL,
  `cep_cliente` varchar(45) COLLATE utf8_bin NOT NULL,
  `cidade_cliente` varchar(100) COLLATE utf8_bin NOT NULL,
  `estado_cliente` varchar(45) COLLATE utf8_bin NOT NULL,
  `data_nascimento` date NOT NULL,
  `obs_cliente` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `id_funcionario` int NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_tb_cliente_tb_funcionario1_idx` (`id_funcionario`),
  CONSTRAINT `fk_tb_cliente_tb_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cliente`
--

LOCK TABLES `tb_cliente` WRITE;
/*!40000 ALTER TABLE `tb_cliente` DISABLE KEYS */;
INSERT INTO `tb_cliente` VALUES (2,'Casas Bahias','Rua 1','Centro','86040022','Londrina','Paraná','2022-03-14','fsdfsfsdfsd',1),(3,'Wladmir Barros','Av Maringa, 123','Centro','84040022','Londrina','Parana','1985-02-13','Professor TOP',1),(6,'Arthur e Lavínia Marcenaria ME','Rua Mariana Choma','Cidade Industrial','81170-328','Curitiba','Paraná','2017-02-18','testando o comentário',1),(7,'Bárbara e Lívia Marketing Ltda','Rua Major Estanislau Grossmann','Aviação','83045-380','São José dos Pinhais','Paraná','2017-07-02','Empresa do Ramo de Marketing',1);
/*!40000 ALTER TABLE `tb_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_empresa`
--

DROP TABLE IF EXISTS `tb_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_empresa` (
  `id_empresa` int NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(45) COLLATE utf8_bin NOT NULL,
  `cnpj_empresa` varchar(45) COLLATE utf8_bin NOT NULL,
  `descricao_empresa` varchar(250) COLLATE utf8_bin NOT NULL,
  `data_abertura` date NOT NULL,
  `login_empresa` varchar(45) COLLATE utf8_bin NOT NULL,
  `senha_empresa` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_empresa`
--

LOCK TABLES `tb_empresa` WRITE;
/*!40000 ALTER TABLE `tb_empresa` DISABLE KEYS */;
INSERT INTO `tb_empresa` VALUES (1,'Rondoncell Assistencia Tecnica e Acessorios','43.225.798/0001-82','Empresa especializada em vendas de produtos e assistência técnica em celulares','2021-08-22','admin123','admin123');
/*!40000 ALTER TABLE `tb_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_funcionario`
--

DROP TABLE IF EXISTS `tb_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_funcionario` (
  `id_funcionario` int NOT NULL AUTO_INCREMENT,
  `nome_funcionario` varchar(100) COLLATE utf8_bin NOT NULL,
  `data_admissao` date NOT NULL,
  `data_demissao` date DEFAULT NULL,
  `funcionario_login` varchar(45) COLLATE utf8_bin NOT NULL,
  `funcionario_senha` varchar(8) COLLATE utf8_bin NOT NULL,
  `id_empresa` int NOT NULL,
  `id_cargo` int NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `fk_tb_funcionario_tb_empresa1_idx` (`id_empresa`),
  KEY `fk_tb_funcionario_tb_cargo1_idx` (`id_cargo`),
  CONSTRAINT `fk_tb_funcionario_tb_cargo1` FOREIGN KEY (`id_cargo`) REFERENCES `tb_cargo` (`id_cargo`),
  CONSTRAINT `fk_tb_funcionario_tb_empresa1` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_funcionario`
--

LOCK TABLES `tb_funcionario` WRITE;
/*!40000 ALTER TABLE `tb_funcionario` DISABLE KEYS */;
INSERT INTO `tb_funcionario` VALUES (1,'Reginaldo','2022-02-01','2022-03-11','regi123','regi1234',1,4),(2,'Abner','2021-10-11',NULL,'login123','123456',1,8),(4,'Nicolas','2022-03-15',NULL,'admin1234','admin123',1,4),(6,'Gabriel Simôes','2020-11-23',NULL,'gab123','123456',1,8),(7,'Usuario de teste','2022-03-23',NULL,'teste123','teste123',1,11);
/*!40000 ALTER TABLE `tb_funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_cadcliente_dtx'
--

--
-- Dumping routines for database 'db_cadcliente_dtx'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-25 18:10:16
