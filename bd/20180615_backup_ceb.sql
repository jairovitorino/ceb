-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: mysql.lauraware.com.br    Database: lauraware04
-- ------------------------------------------------------
-- Server version	5.5.40-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `lauraware04`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `lauraware04` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `lauraware04`;

--
-- Table structure for table `alunos`
--

DROP TABLE IF EXISTS `alunos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `nu_termo` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `id_religiao` int(11) NOT NULL,
  `nm_aluno` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `id_sexo` int(11) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `nm_mae` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `te_profissao_mae` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `id_analgesico` int(11) NOT NULL,
  `nu_telefone_mae` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nm_trabalho_mae` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nm_pai` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `te_profissao_pai` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `nu_telefone_pai` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nm_trabalho_pai` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `te_email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nm_emergencia` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `in_antigo` int(11) NOT NULL,
  `in_emergencia` int(11) NOT NULL,
  `in_aas` int(11) NOT NULL,
  `in_novalgina` int(11) NOT NULL,
  `in_anador` int(11) NOT NULL,
  `in_melhoral` int(11) NOT NULL,
  `in_tylenol` int(11) NOT NULL,
  `in_doril` int(11) NOT NULL,
  `in_alergia` int(11) NOT NULL,
  `nm_alergia` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `in_restricao` int(11) NOT NULL,
  `nm_restricao` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `in_doenca` int(11) NOT NULL,
  `nm_doenca` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `in_plano` int(11) NOT NULL,
  `nm_plano` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nm_acidente` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nm_logra` varchar(70) COLLATE latin1_general_ci NOT NULL,
  `nu_logra` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `nm_compl` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `nm_bairro` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `nm_cidade` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nu_cep` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `nm_uf` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `te_obs` text COLLATE latin1_general_ci NOT NULL,
  `te_imagem` text COLLATE latin1_general_ci NOT NULL,
  `dt_cadastro` date NOT NULL,
  `id_status` int(11) NOT NULL,
  `st_controle` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `id_religiao` (`id_religiao`),
  KEY `id_status` (`id_status`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_analgesico` (`id_analgesico`)
) ENGINE=MyISAM AUTO_INCREMENT=398 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alunos`
--

LOCK TABLES `alunos` WRITE;
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` VALUES (381,'1',2,'ARTHUR FELIPE PAIVA BARBOSA',1,'2016-06-18','ADRIANA DA SILVA PAIVA BARBOSA','',2,'33271035 87616427 91208072','','EDSON BARBOSA JUNIOR','Gerente','986586830 / 92279840','IMBUÍ','junior.show1@hotmail.com','',2,1,0,0,0,0,0,0,0,'PICADA DE MOSQUITO',0,'DOCES',0,'',0,'','AVÓ MARIA 33090459 86458619','RUA MADUREIRA DE PINHO','64A','EDF ITAPICURÚ','CAIXA D AGUA','SALVADOR','40323080','BA','','','0000-00-00',0,1,54),(390,'2',1,'JoséDiogo Gomes Beltrão',1,'2014-08-20','Sandra Regina Santos Gomes','',5,'trab 32584170 cel 86783412','Tel Telemática','Diego Beltrão Da Silva','','cel 986060983','orto Cotegipe','aurisio@yahoo.com.br','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','Mãe, Pai ou Avó Sônia','Rua Desembargador Julio De Brito','14a','9 travessa','Baixa De Quintas','Salvador','40300160','BA','','','2018-05-18',0,1,54),(396,'3',1,'YOSHIMI NASCIMENTO KANZAKI',1,'2015-08-15','MARIA FABIANA SANTOS NASCIMENTO','MERCADÓLOGA',2,'TR 988041552 CEL 988473965','','KAZUMI KANZAKI','SUPORTE','988040427','ZCR INFORMATICA','KAZUMIKANZAKI1000@GMAIL.COM','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','RUA CARLOS GOMES','698','AP 1104 EDF . ANABELA','CENTRO','SALVADOR','40060330','BA','','','2018-06-07',0,1,54);
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `analgesicos`
--

DROP TABLE IF EXISTS `analgesicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analgesicos` (
  `id_analgesico` int(11) NOT NULL AUTO_INCREMENT,
  `nm_analgesico` varchar(20) NOT NULL,
  PRIMARY KEY (`id_analgesico`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analgesicos`
--

LOCK TABLES `analgesicos` WRITE;
/*!40000 ALTER TABLE `analgesicos` DISABLE KEYS */;
INSERT INTO `analgesicos` VALUES (1,'Anador'),(2,'Tylenol'),(3,'Doril'),(4,'AAS'),(5,'Outro'),(6,'Novalgina'),(7,'Melhoral'),(8,'Dipirona');
/*!40000 ALTER TABLE `analgesicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nm_cargo` varchar(30) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Professor'),(2,'Auxiliar de Classe'),(3,'Secretária'),(4,'Administrador'),(5,'Dirertor(a)'),(6,'Coordenador(a)'),(7,'Porteiro'),(8,'Aux. de Limpeza'),(9,'Cozinheiro(a)'),(10,'Aux. de Cozinha'),(11,'Estagiário(a)');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_civil`
--

DROP TABLE IF EXISTS `estado_civil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_civil` (
  `id_estado_civil` int(11) NOT NULL AUTO_INCREMENT,
  `nm_estado_civil` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado_civil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_civil`
--

LOCK TABLES `estado_civil` WRITE;
/*!40000 ALTER TABLE `estado_civil` DISABLE KEYS */;
INSERT INTO `estado_civil` VALUES (1,'Casado'),(2,'Divorciado'),(3,'Solteiro'),(4,'Separado'),(5,'Viuvo');
/*!40000 ALTER TABLE `estado_civil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `nm_funcionario` varchar(50) NOT NULL,
  `nm_natural` varchar(30) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_estado_civil` int(11) NOT NULL,
  `nm_conjugue` varchar(50) NOT NULL,
  `nu_cpf` varchar(15) NOT NULL,
  `nu_rg` varchar(30) NOT NULL,
  `nm_orgao` varchar(10) NOT NULL,
  `nu_carteira` varchar(10) NOT NULL,
  `nu_serie` varchar(5) NOT NULL,
  `id_graduacao` int(11) NOT NULL,
  `nm_experiencia` varchar(100) NOT NULL,
  `te_email` varchar(50) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `id_sexo` varchar(1) NOT NULL,
  `nu_telefone` varchar(30) NOT NULL,
  `dt_admissao` date NOT NULL,
  `nm_logra` varchar(50) NOT NULL,
  `nu_logra` varchar(6) NOT NULL,
  `nm_compl` varchar(16) NOT NULL,
  `nu_cep` varchar(8) NOT NULL,
  `nm_bairro` varchar(30) NOT NULL,
  `nm_cidade` varchar(30) NOT NULL,
  `nm_uf` varchar(2) NOT NULL,
  `te_obs` varchar(100) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `id_status` (`id_status`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_estado` (`id_estado_civil`),
  KEY `id_cargo` (`id_cargo`),
  KEY `id_graduacao` (`id_graduacao`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` VALUES (21,'Emily Silva De Sousa ','Bahiano',3,3,'','06395603507','1439228078','SSP/BA','','',3,'','','1996-04-25','F','991965910','0000-00-00','Manoel Inácio Da Costa','46','casa','40320030','Caixa D Agua','Salvador','BA','',0,54);
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `graduacoes`
--

DROP TABLE IF EXISTS `graduacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `graduacoes` (
  `id_graduacao` int(11) NOT NULL AUTO_INCREMENT,
  `nm_graduacao` varchar(30) NOT NULL,
  PRIMARY KEY (`id_graduacao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `graduacoes`
--

LOCK TABLES `graduacoes` WRITE;
/*!40000 ALTER TABLE `graduacoes` DISABLE KEYS */;
INSERT INTO `graduacoes` VALUES (1,'Fundamental'),(2,'Medio'),(3,'Superior'),(4,'Pós-graduado');
/*!40000 ALTER TABLE `graduacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matriculas` (
  `id_matricula` int(11) NOT NULL AUTO_INCREMENT,
  `nu_matricula` int(11) NOT NULL,
  `nu_cpf` varchar(11) NOT NULL,
  `nu_rg` varchar(20) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `in_almoco` int(11) NOT NULL,
  `in_responsavel` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL,
  `vl_matricula` varchar(10) NOT NULL,
  `nu_ano` int(11) NOT NULL,
  `te_obs` varchar(100) NOT NULL,
  `dt_matricula` date NOT NULL,
  `id_status` int(11) NOT NULL,
  `st_controle` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_matricula`),
  KEY `id_aluno` (`id_aluno`),
  KEY `id_status` (`id_status`,`id_usuario`),
  KEY `id_serie` (`id_serie`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matriculas`
--

LOCK TABLES `matriculas` WRITE;
/*!40000 ALTER TABLE `matriculas` DISABLE KEYS */;
INSERT INTO `matriculas` VALUES (87,0,'81690258500','749385847',381,3,2,1,1,'652.69',2018,'','2018-05-07',0,0,54),(88,0,'94266204515','0660035804',390,1,2,2,2,'3222.00',2018,'','2018-05-18',0,0,54),(90,0,'50513281568','0658359720',396,3,2,1,1,'7179.60',2018,'','2018-06-07',0,0,54);
/*!40000 ALTER TABLE `matriculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parentescos`
--

DROP TABLE IF EXISTS `parentescos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parentescos` (
  `id_parentesco` int(11) NOT NULL AUTO_INCREMENT,
  `nm_parentesco` varchar(30) NOT NULL,
  PRIMARY KEY (`id_parentesco`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parentescos`
--

LOCK TABLES `parentescos` WRITE;
/*!40000 ALTER TABLE `parentescos` DISABLE KEYS */;
INSERT INTO `parentescos` VALUES (1,'Tio (a)'),(2,'Avô (ó)'),(3,'Primo (a)'),(4,'Padrinho'),(5,'Amigo (a)'),(6,'Pai'),(7,'Máe'),(8,'Madrinha'),(9,'Padrasto'),(10,'Madrasta');
/*!40000 ALTER TABLE `parentescos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `religioes`
--

DROP TABLE IF EXISTS `religioes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `religioes` (
  `id_religiao` int(11) NOT NULL AUTO_INCREMENT,
  `nm_religiao` varchar(50) NOT NULL,
  PRIMARY KEY (`id_religiao`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `religioes`
--

LOCK TABLES `religioes` WRITE;
/*!40000 ALTER TABLE `religioes` DISABLE KEYS */;
INSERT INTO `religioes` VALUES (1,'Catolica'),(2,'Protestante'),(3,'Muçulmano'),(4,'Espírita'),(5,'Ubanda'),(6,'Messiânica');
/*!40000 ALTER TABLE `religioes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsaveis`
--

DROP TABLE IF EXISTS `responsaveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsaveis` (
  `id_responsavel` int(11) NOT NULL AUTO_INCREMENT,
  `nm_responsavel` varchar(40) NOT NULL,
  `id_parentesco` int(11) NOT NULL,
  `id_matricula` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `nu_telefone` varchar(30) NOT NULL,
  `te_profissao` varchar(30) NOT NULL,
  `nm_trabalho` varchar(30) NOT NULL,
  `te_email` varchar(50) NOT NULL,
  `nm_logra` varchar(50) NOT NULL,
  `nu_logra` varchar(6) NOT NULL,
  `nm_compl` varchar(20) NOT NULL,
  `nu_cep` varchar(8) NOT NULL,
  `nm_bairro` varchar(30) NOT NULL,
  `nm_cidade` varchar(30) NOT NULL,
  `nm_uf` varchar(2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_responsavel`),
  KEY `id_parentesco` (`id_parentesco`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_matricula` (`id_matricula`),
  KEY `id_aluno` (`id_aluno`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsaveis`
--

LOCK TABLES `responsaveis` WRITE;
/*!40000 ALTER TABLE `responsaveis` DISABLE KEYS */;
INSERT INTO `responsaveis` VALUES (47,'EDSON BARBOSA JUNIOR',7,87,381,'33271035 87616427 91208072','Advogado(a)','','junior.show1@hotmail.com','RUA MADUREIRA DE PINHO','64A','EDF ITAPICURÚ','40323080','','','',54),(53,'Sandra Regina Santos Gomes',6,88,390,'cel 986060983','Soldador(a)','orto Cotegipe','aurisio@yahoo.com.br','Rua Desembargador Julio De Brito','','9 travessa','40300160','','','',54),(54,'Alinaldo Pereira',6,89,391,'(71) 98777766','engeheiro','','','Rua Joaquim Nambuco De Almeida','44','','41320480','','','',54),(55,'KAZUMI KANZAKI',6,90,396,'TR 988041552 CEL 988473965','SUPORTE','','KAZUMIKANZAKI1000@GMAIL.COM','RUA CARLOS GOMES','698','AP 1104 EDF . ANABEL','40060330','','','',54);
/*!40000 ALTER TABLE `responsaveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `series` (
  `id_serie` int(11) NOT NULL AUTO_INCREMENT,
  `nm_serie` varchar(20) NOT NULL,
  PRIMARY KEY (`id_serie`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `series`
--

LOCK TABLES `series` WRITE;
/*!40000 ALTER TABLE `series` DISABLE KEYS */;
INSERT INTO `series` VALUES (1,'Grupo II'),(2,'Grupo III'),(3,'Grupo I'),(4,'Grupo IV'),(5,'Grupo V'),(6,'4 ano'),(7,'5 ano'),(8,'1 ano'),(9,'2 ano'),(10,'3 ano');
/*!40000 ALTER TABLE `series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nm_status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'supervisor'),(2,'operador'),(3,'visitante'),(4,'desligado'),(5,'novo');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nm_usuario` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nm_login` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nm_senha` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `nu_ip` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `id_sexo` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `nu_matricula` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nu_telefone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT '3',
  `dt_cadastro` date NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_status` (`id_status`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (40,'Administrador','admin','*2AF5EFAC0B14C5132BCD3D297954B53E634D160F','','','','',1,'2017-11-04'),(53,'lucimary','luci@gmail.com','*23AE809DDACAF96AF0FD78ED04B6A265E05AA257','127.0.0.1','','','',2,'2018-04-25'),(54,'Emily Silva de Sousa','millyssousa20@gmail.com','*2944B49A5DE139C0CCB3BBC6AAA201CE61FCD927','::1','','','',1,'2018-05-04'),(56,'jairo vitorino','jairo.vitorino@gmail.com','*CAC926C90985FC48783145FD428E3F0EBDCF43A5','200.216.105.190','','','',1,'2018-05-20');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-15 21:29:09
