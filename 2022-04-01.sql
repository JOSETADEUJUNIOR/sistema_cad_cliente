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
  KEY `fk_tb_cargo_tb_empresa_idx` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
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
  `nome_categoria` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_funcionario` int NOT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `fk_tb_categoria_tb_funcionario1_idx` (`id_funcionario`),
  CONSTRAINT `fk_tb_categoria_tb_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoria`
--

LOCK TABLES `tb_categoria` WRITE;
/*!40000 ALTER TABLE `tb_categoria` DISABLE KEYS */;
INSERT INTO `tb_categoria` VALUES (1,'Acessórios',1),(2,'Eletronicos',1),(4,'Concerto de Celulares',1);
/*!40000 ALTER TABLE `tb_categoria` ENABLE KEYS */;
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
  KEY `fk_tb_cliente_tb_funcionario1_idx` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cliente`
--

LOCK TABLES `tb_cliente` WRITE;
/*!40000 ALTER TABLE `tb_cliente` DISABLE KEYS */;
INSERT INTO `tb_cliente` VALUES (2,'Casas Bahias','Rua 1','Centro','86040022','Londrina','Paraná','2022-03-14','fsdfsfsdfsd',1),(3,'Wladmir Barros','Av Maringa, 123','Centro','84040022','Londrina','Parana','1985-02-13','Professor TOP',1),(6,'Arthur e Lavínia Marcenaria ME','Rua Mariana Choma','Cidade Industrial','81170-328','Curitiba','Paraná','2017-02-18','testando o comentário',1),(7,'Bárbara e Lívia Marketing Ltda','Rua Major Estanislau Grossmann','Aviação','83045-380','São José dos Pinhais','Paraná','2017-07-02','Empresa do Ramo de Marketing',1),(8,'JOSE TADEU ROSA','RUA JOSE PAVAN, 100','CENTRO','86400-000','Jacarezinho','PR','2022-04-12','ASDASDSADAS',1),(9,'Keila Mendes','Rua Marize Benato Cruz Trento, 50','Jardim Pequena Londres','86040-022','Londrina','PR','1988-12-01','Cliente',1),(10,'Venda sem Cliente','Rua Marize Benato Cruz Trento','Jardim Pequena Londres','86040-022','Londrina','PR','2021-01-01','Contato para vender',1);
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
  `nome_empresa` varchar(150) COLLATE utf8_bin NOT NULL,
  `cnpj_empresa` varchar(45) COLLATE utf8_bin NOT NULL,
  `descricao_empresa` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `data_abertura` date NOT NULL,
  `email_empresa` varchar(45) COLLATE utf8_bin NOT NULL,
  `senha_empresa` varchar(45) COLLATE utf8_bin NOT NULL,
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
  `nome_fornecedor` varchar(200) COLLATE utf8_bin NOT NULL,
  `telefone_fornecedor` varchar(45) COLLATE utf8_bin NOT NULL,
  `email_fornecedor` varchar(100) COLLATE utf8_bin NOT NULL,
  `rua_fornecedor` varchar(150) COLLATE utf8_bin NOT NULL,
  `cep_fornecedor` varchar(150) COLLATE utf8_bin NOT NULL,
  `bairro_fornecedor` varchar(45) COLLATE utf8_bin NOT NULL,
  `cidade_fornecedor` varchar(100) COLLATE utf8_bin NOT NULL,
  `estado_fornecedor` varchar(150) COLLATE utf8_bin NOT NULL,
  `cnpj_fornecedor` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_funcionario` int NOT NULL,
  PRIMARY KEY (`id_fornecedor`,`id_funcionario`),
  KEY `fk_fornecedor_tb_funcionario1_idx` (`id_funcionario`),
  CONSTRAINT `fk_fornecedor_tb_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_fornecedor`
--

LOCK TABLES `tb_fornecedor` WRITE;
/*!40000 ALTER TABLE `tb_fornecedor` DISABLE KEYS */;
INSERT INTO `tb_fornecedor` VALUES (2,'Kaique e Adriana Assessoria Jurídica Ltda','4139545093','ti@kaiqueeadrianaassessoriajuridicaltda.com.br','Avenida Victor Ferreira do Amaral 2940','82800900','Capão da Imbuia','Curitiba','PR','03330242000131',1),(4,'Lúcia e Betina Limpeza ME','4127983773','treinamento@luciaebetinalimpezame.com.br','Rua Vicêncio Benato','83514220','Areias','Almirante Tamandaré','São Paulo','15193498000123',1);
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
  `nome_funcionario` varchar(100) COLLATE utf8_bin NOT NULL,
  `data_admissao` date NOT NULL,
  `data_demissao` date DEFAULT NULL,
  `funcionario_email` varchar(45) COLLATE utf8_bin NOT NULL,
  `funcionario_senha` varchar(45) COLLATE utf8_bin NOT NULL,
  `id_empresa` int NOT NULL,
  `id_cargo` int NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `fk_tb_funcionario_tb_empresa1_idx` (`id_empresa`),
  KEY `fk_tb_funcionario_tb_cargo1_idx` (`id_cargo`),
  CONSTRAINT `fk_tb_funcionario_tb_empresa1` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_funcionario`
--

LOCK TABLES `tb_funcionario` WRITE;
/*!40000 ALTER TABLE `tb_funcionario` DISABLE KEYS */;
INSERT INTO `tb_funcionario` VALUES (1,'jose.junior','2022-02-01','2022-03-11','jose.junior@acessorias.com','@Jtrj121221',1,8),(2,'Abner','2021-10-11',NULL,'login','123456',1,4),(4,'Nicolas','2022-03-15',NULL,'admin1234','admin123',1,4),(6,'Gabriel','2020-11-23',NULL,'gab123','123456',1,8),(7,'Osni','2022-03-23',NULL,'osni123','123',1,8);
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
  PRIMARY KEY (`id_item_venda`),
  KEY `fk_tb_item_venda_1_idx` (`id_venda`),
  KEY `fk_tb_item_venda_2_idx` (`id_produto`),
  CONSTRAINT `fk_tb_item_venda_1` FOREIGN KEY (`id_venda`) REFERENCES `tb_venda` (`id_venda`),
  CONSTRAINT `fk_tb_item_venda_2` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_item_venda`
--

LOCK TABLES `tb_item_venda` WRITE;
/*!40000 ALTER TABLE `tb_item_venda` DISABLE KEYS */;
INSERT INTO `tb_item_venda` VALUES (1,19,5,5,1500.00),(2,20,5,6,1500.00),(3,21,4,10,50.00),(4,22,4,10,50.00),(5,23,4,111,50.00),(6,24,4,10,50.00),(7,25,4,10,50.00),(8,26,4,10,50.00),(9,27,4,10,50.00),(10,28,4,10,50.00),(11,29,4,10,50.00),(12,30,4,10,50.00),(13,31,4,10,50.00),(14,32,4,1,50.00),(15,33,4,10,50.00),(16,34,4,10,50.00),(17,35,4,10,50.00),(18,36,4,10,50.00),(19,36,5,5,1500.00),(20,36,5,5,1500.00),(21,36,6,1,50.00),(22,37,4,4,50.00),(23,38,4,1,50.00),(24,38,5,1,1500.00),(25,38,5,1,1500.00),(26,39,4,1,50.00),(27,39,5,2,1500.00);
/*!40000 ALTER TABLE `tb_item_venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_produto` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `cod_produto` varchar(100) COLLATE utf8_bin NOT NULL,
  `nome_produto` varchar(100) COLLATE utf8_bin NOT NULL,
  `descricao_produto` varchar(250) COLLATE utf8_bin NOT NULL,
  `valor_produto` decimal(10,2) NOT NULL,
  `data_cadastro` date NOT NULL,
  `estoque` int NOT NULL,
  `id_funcionario` int NOT NULL,
  `id_fornecedor` int NOT NULL,
  `id_categoria` int NOT NULL,
  `id_subCategoria` int NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `fk_tb_produto_tb_funcionario1_idx` (`id_funcionario`),
  KEY `fk_tb_produto_tb_fornecedor1_idx` (`id_fornecedor`),
  KEY `fk_tb_produto_1_idx` (`id_categoria`),
  KEY `fk_tb_produto_2_idx` (`id_subCategoria`),
  CONSTRAINT `fk_tb_produto_1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id_categoria`),
  CONSTRAINT `fk_tb_produto_2` FOREIGN KEY (`id_subCategoria`) REFERENCES `tb_sub_categoria` (`id_subCategoria`),
  CONSTRAINT `fk_tb_produto_tb_fornecedor1` FOREIGN KEY (`id_fornecedor`) REFERENCES `tb_fornecedor` (`id_fornecedor`),
  CONSTRAINT `fk_tb_produto_tb_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produto`
--

LOCK TABLES `tb_produto` WRITE;
/*!40000 ALTER TABLE `tb_produto` DISABLE KEYS */;
INSERT INTO `tb_produto` VALUES (4,'0123','Celular Motorola teste','asdasdsasadsdsa',50.00,'2022-03-30',10,1,2,1,5),(5,'1233','Smartphone Samsung Galaxy A03 Core 32GB','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h',1500.00,'2022-03-30',2,1,4,4,2),(6,'43455454','teste','asdsadsasaasdasd',50.00,'2021-01-01',2,1,4,1,2);
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
  `nome_subcategoria` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_categoria` int NOT NULL,
  PRIMARY KEY (`id_subCategoria`,`id_categoria`),
  KEY `fk_subCategoria_Categoria1_idx` (`id_categoria`),
  CONSTRAINT `fk_subCategoria_Categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sub_categoria`
--

LOCK TABLES `tb_sub_categoria` WRITE;
/*!40000 ALTER TABLE `tb_sub_categoria` DISABLE KEYS */;
INSERT INTO `tb_sub_categoria` VALUES (1,'Cabo de Celular',4),(2,'Caixa de Som',2),(3,'Celular',2),(5,'Carregador Tipo C',1);
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
  PRIMARY KEY (`id_venda`),
  KEY `fk_tb_venda_2_idx` (`id_cliente`),
  CONSTRAINT `fk_tb_venda_2` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_venda`
--

LOCK TABLES `tb_venda` WRITE;
/*!40000 ALTER TABLE `tb_venda` DISABLE KEYS */;
INSERT INTO `tb_venda` VALUES (1,'2022-04-01',2),(2,'2022-04-07',3),(3,'2022-04-01',2),(4,'2022-04-07',6),(5,'2022-04-07',6),(6,'2022-04-01',3),(7,'2022-04-06',2),(8,'2022-04-01',6),(9,'2022-04-26',3),(10,'2022-04-22',7),(11,'2022-04-13',6),(12,'2022-04-19',6),(13,'2022-04-19',6),(14,'2022-04-07',3),(15,'2022-04-06',3),(16,'2022-04-13',3),(17,'2022-04-13',3),(18,'2022-04-05',3),(19,'2022-04-13',3),(20,'2022-04-20',3),(21,'2022-04-13',2),(22,'2021-01-01',8),(23,'2021-01-01',3),(24,'2021-01-01',2),(25,'2021-01-01',2),(26,'2021-01-01',2),(27,'2021-01-01',2),(28,'2021-01-01',2),(29,'2021-01-01',2),(30,'2021-01-01',2),(31,'2022-04-21',3),(32,'2022-01-01',9),(33,'2021-01-01',9),(34,'2021-01-01',9),(35,'2022-01-01',3),(36,'2022-01-01',2),(37,'2022-04-01',10),(38,'2022-04-01',2),(39,'2022-04-01',10);
/*!40000 ALTER TABLE `tb_venda` ENABLE KEYS */;
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

-- Dump completed on 2022-04-01 18:04:37
