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
  `id_profissao` int(11) NOT NULL,
  `nu_telefone_mae` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nm_trabalho_mae` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nm_pai` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `id_profissao_pai` int(11) NOT NULL,
  `nm_profissao_pai` varchar(30) COLLATE latin1_general_ci NOT NULL,
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
  `id_status` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `id_religiao` (`id_religiao`),
  KEY `id_profissao_pai` (`id_profissao_pai`),
  KEY `id_status` (`id_status`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_profissao` (`id_profissao`)
) ENGINE=MyISAM AUTO_INCREMENT=380 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alunos`
--

LOCK TABLES `alunos` WRITE;
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` VALUES (378,'01',4,'Gabriel De Macedo Nunes Teixeira',1,'1978-06-09','Josefa Maria',63,'','','Alinaldo Pereira',0,'Analista De Suporte','','','','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','Rua Joaquim Nambuco De Almeida','44','','Cabula','Salvador','','PI','','foto.jpg',0,41),(379,'03',2,'Milena Machado Silva',2,'2011-08-12','Josefa Maria',39,'(71) 98777766','embasa','Reginaldo Alcantara Santos',0,'Desaposentado','','','','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','Rua Joaquim Nambuco De Almeida','44','casa','Cabula','Salvador','','PI','','',0,41);
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;
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
INSERT INTO `funcionarios` VALUES (21,'Emily Silva De Sousa ','Bahiano',3,3,'','06395603507','1439228078','SSP/BA','','',3,'','','1996-04-25','F','991965910','0000-00-00','manoel inácio da costa','46','casa','40320030','Caixa D Agua','Salvador','BA','',0,54);
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
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_matricula`),
  KEY `id_aluno` (`id_aluno`),
  KEY `id_status` (`id_status`,`id_usuario`),
  KEY `id_serie` (`id_serie`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matriculas`
--

LOCK TABLES `matriculas` WRITE;
/*!40000 ALTER TABLE `matriculas` DISABLE KEYS */;
INSERT INTO `matriculas` VALUES (82,0,'02350499561','',378,1,0,3,8,'4567.77',2018,'','2018-05-05',0,41);
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
-- Table structure for table `profissoes`
--

DROP TABLE IF EXISTS `profissoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profissoes` (
  `pk_profissao` int(11) NOT NULL AUTO_INCREMENT,
  `nm_profissao` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`pk_profissao`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profissoes`
--

LOCK TABLES `profissoes` WRITE;
/*!40000 ALTER TABLE `profissoes` DISABLE KEYS */;
INSERT INTO `profissoes` VALUES (1,'Padeiro(a)'),(2,'Administrador(a)'),(3,'Médico(a)'),(4,'Enfermeiro(a)'),(5,'Analista de Sistemas'),(6,'Mecanico(a)'),(7,'Contador(a)'),(8,'Soldador(a)'),(9,'Professor(a)'),(10,'Advogado(a)'),(11,'Autônomo(a)'),(12,'Comerciario(a)'),(13,'Industriário(a)'),(14,'Militar'),(15,'Vigilante'),(16,'Agricultor(a)'),(17,'Empresário(a)'),(18,'Engenheiro(a)'),(19,'Pastor(a)'),(20,'Recepcionista'),(21,'Ascensorista'),(22,'Assessor(a)'),(23,'Zelador(a)'),(24,'Babá'),(25,'Domestica(o)'),(26,'Funcionário(a) Público(a)'),(27,'Agente Publico(a)'),(28,'Comerciante'),(29,'Motorista'),(30,'Quimico(a)'),(31,'Eletricista'),(32,'Alfaiate'),(33,'Pescador(a)'),(34,'Marisqueiro(a)'),(35,'Outros(a)'),(36,'Estudante'),(37,'Secretário(a)'),(38,'Dona de casa'),(39,'Aposentado(a)'),(40,'Contabilista'),(41,'Tecnico Segurança Trabalho'),(42,'Pedagogo(a)'),(43,'Turismologo(a)'),(44,'Gestão Recursos Humanos'),(45,'Dentista'),(46,'Tecnico enfermagem'),(47,'Técnico laboratorio'),(48,'Assistente farmacia'),(49,'Almoxarife'),(50,'Nutricionista'),(51,'Vendedor(a)'),(52,'Assistente Administrativo'),(53,'Jornalista'),(54,'Operador telemarketing'),(55,'Ajudante impressão'),(56,'Tecnico contabilidade'),(57,'Florista'),(58,'Cabeleireiro(a)'),(59,'Cobrador - rodoviario'),(60,'Agente de portaria'),(61,'Marcineiro(a)'),(62,'Pintor(a)'),(63,'Analista de suporte'),(64,'Bancário(a)'),(65,'Protetico(a)'),(66,'Atendente'),(67,'Promotor(a) venda'),(68,'Operador(a) caixa'),(69,'Ajudante (pedreiro)'),(70,'Costureiro(a)'),(71,'Carteiro(a)'),(72,'Assistente Financeiro'),(73,'Gerente-vendas'),(74,'Tecnico(a) patologia'),(75,'Bibliotecario(a)'),(76,'Educador(a) Religioso(a)'),(77,'Doceiro(a)'),(78,'Eletrotecnico'),(79,'Tecnico eletromecanica'),(81,'TECNICA DE ENFERMAGEM'),(82,'ANALISTA DE MATERIAIS'),(84,'DECORADORA'),(85,'SUPERVISORA DE CENTRAL'),(99,'FISIOTERAPEUTA'),(88,'Técnico em Telecomunicação'),(89,'Estoquista'),(102,'REPRESENTANTE COMERCIAL'),(100,'Pedreiro(a)'),(93,'Auxiliar de escritório'),(103,'GERENTE COMERCIAL'),(95,'Corretora de seguros'),(97,'Auxiliar de serviços gerais'),(111,'DECORADOR(A)'),(108,'Não informado'),(112,'Gestor Recursos Humanos'),(116,'AUXILIAR DE RH'),(117,'AUXILIAR DE PRODUÇAO'),(118,'PROMOTER'),(119,'Designer Gráfico'),(121,'TECNÓLOGO EM MARKETING');
/*!40000 ALTER TABLE `profissoes` ENABLE KEYS */;
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
  `nm_trabalho` varchar(30) NOT NULL,
  `id_profissao` int(11) NOT NULL,
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
  KEY `id_profissao` (`id_profissao`),
  KEY `id_matricula` (`id_matricula`),
  KEY `id_aluno` (`id_aluno`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsaveis`
--

LOCK TABLES `responsaveis` WRITE;
/*!40000 ALTER TABLE `responsaveis` DISABLE KEYS */;
INSERT INTO `responsaveis` VALUES (43,'Paulo Rorr',5,82,378,'999387669','',22,'carlos@gmail.com','rua joaquim nambuco de almeida','44','','41320480','cabula','salvador','BA',41);
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
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (40,'Administrador','admin','*2AF5EFAC0B14C5132BCD3D297954B53E634D160F','','','','',1,'2017-11-04'),(41,'jairo vitorino','jairo.vitorino@gmail.com','*CAC926C90985FC48783145FD428E3F0EBDCF43A5','::1','','','',1,'2017-11-04'),(53,'lucimary','luci@gmail.com','','127.0.0.1','','','',1,'2018-04-25'),(54,'Emily Silva de Sousa','millyssousa20@gmail.com','*DBA4DDC6C85A1382046870B5204E10F996A94D6F','::1','','','',1,'2018-05-04');
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

-- Dump completed on 2018-05-06 18:07:09
