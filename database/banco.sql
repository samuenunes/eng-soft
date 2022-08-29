-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: book
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aluguel`
--

DROP TABLE IF EXISTS `aluguel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluguel` (
  `liv_codigo` int(6) unsigned zerofill NOT NULL,
  `cli_cpf` char(11) NOT NULL,
  `alu_codigo` int(7) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `alu_preco` float NOT NULL,
  `alu_datini` date NOT NULL,
  `alu_datfim` date NOT NULL,
  `alu_datdev` date DEFAULT NULL,
  PRIMARY KEY (`alu_codigo`,`liv_codigo`,`cli_cpf`),
  KEY `fk_livro_has_cliente_cliente1` (`cli_cpf`),
  KEY `fk_livro_has_cliente_livro` (`liv_codigo`),
  CONSTRAINT `fk_livro_has_cliente_cliente1` FOREIGN KEY (`cli_cpf`) REFERENCES `cliente` (`cli_cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_livro_has_cliente_livro` FOREIGN KEY (`liv_codigo`) REFERENCES `livro` (`liv_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluguel`
--

LOCK TABLES `aluguel` WRITE;
/*!40000 ALTER TABLE `aluguel` DISABLE KEYS */;
INSERT INTO `aluguel` VALUES (000003,'14865522100',0000001,12,'2022-08-30','2022-08-31','2022-08-31'),(000003,'47514777835',0000002,12.012,'2022-08-28','2022-08-29',NULL);
/*!40000 ALTER TABLE `aluguel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `cli_codigo` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `cli_cpf` char(11) NOT NULL,
  `cli_nomcli` varchar(100) NOT NULL,
  `cli_celular` varchar(11) NOT NULL,
  `cli_phone` varchar(10) DEFAULT NULL,
  `cli_rua` varchar(100) NOT NULL,
  `cli_numend` varchar(10) NOT NULL,
  `cli_bairro` varchar(50) NOT NULL,
  `cli_compl` varchar(100) DEFAULT NULL,
  `cli_cidade` varchar(100) NOT NULL,
  `cli_estado` varchar(25) NOT NULL,
  `cli_ativo` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`cli_cpf`),
  KEY `cli_codigo` (`cli_codigo`),
  KEY `cli_codigo_2` (`cli_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (000001,'04675218994','samuel','99999999999','','rua abc','10','centro','qd 25, lt 30','anapolis','goiás','S'),(000003,'14865522100','Jair Messias Bolsonaro','22922222222','','Rua 22','22','centro','complemento','anapolis','goiás','S'),(000002,'47514777835','Luís Inácio Lula da Silva','13013131313','','Rua PT','13','centro','complemento','anapolis','go','S');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livro` (
  `liv_codigo` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `liv_titulo` varchar(100) NOT NULL,
  `liv_autor` varchar(100) NOT NULL,
  `liv_autor2` varchar(100) DEFAULT NULL,
  `liv_edicao` varchar(3) NOT NULL,
  `liv_editora` varchar(50) NOT NULL,
  `liv_preco` float NOT NULL,
  `liv_ativo` char(1) NOT NULL DEFAULT 'S',
  `qtd_estoque` int(5) NOT NULL,
  PRIMARY KEY (`liv_codigo`),
  KEY `liv_codigo` (`liv_codigo`),
  KEY `liv_codigo_2` (`liv_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
INSERT INTO `livro` VALUES (000001,'portugues','jao','jao 2 ','1','port',10,'S',10),(000002,'matematica','samuel','nunes','1','mat',10,'S',10),(000003,'java','autor1','autor2','1','javaditora',12,'S',32);
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `usu_codusu` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `usu_nomusu` varchar(50) NOT NULL,
  `usu_cpf` char(11) NOT NULL,
  `usu_celular` varchar(15) NOT NULL,
  `usu_email` varchar(100) NOT NULL,
  `usu_login` varchar(50) NOT NULL,
  `usu_senha` varchar(60) NOT NULL,
  `usu_ativo` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`usu_codusu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (000001,'Administrador','00000000000','62999999999','adm@adm.com','admin','21232f297a57a5a743894a0e4a801fc3','S');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-28 22:19:23
