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
) ENGINE=MyISAM AUTO_INCREMENT=435 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alunos`
--

LOCK TABLES `alunos` WRITE;
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` VALUES (381,'1',2,'ARTHUR FELIPE PAIVA BARBOSA',1,'2016-06-18','ADRIANA DA SILVA PAIVA BARBOSA','',2,'33271035 87616427 91208072','','EDSON BARBOSA JUNIOR','Gerente','986586830 / 92279840','IMBUÍ','junior.show1@hotmail.com','',2,1,0,0,0,0,0,0,0,'PICADA DE MOSQUITO',0,'DOCES',0,'',0,'','AVÓ MARIA 33090459 86458619','RUA MADUREIRA DE PINHO','64A','EDF ITAPICURÚ','CAIXA D AGUA','SALVADOR','40323080','BA','','','0000-00-00',0,1,54),(390,'2',1,'JoséDiogo Gomes Beltrão',1,'2014-08-20','Sandra Regina Santos Gomes','',5,'trab 32584170 cel 86783412','Tel Telemática','Diego Beltrão Da Silva','','cel 986060983','orto Cotegipe','aurisio@yahoo.com.br','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','Mãe, Pai ou Avó Sônia','Rua Desembargador Julio De Brito','14a','9 travessa','Baixa De Quintas','Salvador','40300160','BA','','','2018-05-18',0,1,54),(396,'3',1,'YOSHIMI NASCIMENTO KANZAKI',1,'2015-08-15','MARIA FABIANA SANTOS NASCIMENTO','MERCADÓLOGA',2,'TR 988041552 CEL 988473965','','KAZUMI KANZAKI','SUPORTE','988040427','ZCR INFORMATICA','KAZUMIKANZAKI1000@GMAIL.COM','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','RUA CARLOS GOMES','698','AP 1104 EDF . ANABELA','CENTRO','SALVADOR','40060330','BA','','','2018-06-07',0,1,54),(399,'4',2,'NICOLAS DA PAZ XAVIER',1,'2016-07-15','LEIA MARIA DA PAZ XAVIER','administradora',6,'987061304','SEC. MUN. - LAURO DE','JEFERSON XAVIER PINHEIRO DOS SANTOS','ENFERMEIRO','988471061/TRAB 21024419','HOSPITAL COT','jeferson.xavierps@gmail.com','',1,1,0,0,0,0,0,0,0,'atópica',0,'',0,'',0,'','Mãe ou Pai','CONJ. ASTECA , LAD DO PAIVA','40','AP 303 B- B2','CAIXA D AGUA','Salvador','40320720','BA','','','2018-06-19',0,1,54),(400,'5',2,'PEDRO PEREIRA MENESES E SILVA',1,'2015-10-17','ANA DEISE PEREIRA DA SILVA','COMERCIARIA',2,'988622084/991382887/','HONDA AUTOMOVEIS ','PÉRICLES MENESES E SILVA','BOMBEIRO MILITAR','987935735/33865182','','deisemaquely@gmail.com','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','pai, mãe ou avó materna','Rua Vitor Serra','45','1 andar','Pero VAz','Salvador','40340290','BA','avó materna : 988058906','','2018-06-19',0,1,54),(401,'6',2,'DAVI MARBACK SANTOS DA SILVA',1,'2015-12-23','ROQUINEIA SANTOS DA SILVA','TURISMOLOGA',6,'32338448/983877152','CRIA RUMO CONSULTORI','CLAUDIO MARBACK DOS SANTOS','TEC DE ENFERMAGEM','988254187','HOSPITAL SANTA ISABE','aurisio@yahoo.com.br','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','mãe','TV PARAISO','40','EDF VILA GUIMARES AP 302A','CAIXA D AGUA','Salvador','40320200','BA','','','2018-06-19',0,1,54),(402,'7',1,'MARIA LUIZA PEREIRA LIMA',1,'2015-09-20','FERNANDA PEREIRA','AUTONOMA',4,'991512333/32580299','','PERIVALDO LIMA CONCEIÇÃO','COMERCIANTE','983696697/33131992','FEIRA DE SÃO JOAQUIM','aurisio@yahoo.com.br','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','Mãe ou Pai','RUA FREITAS HENRIQUE DE CIMA','78A','','CAIXA D AGUA','Salvador','40320150','BA','','','2018-06-19',0,1,54),(403,'8',1,'PYETRO BALDOK SANTOS DE JESUS',1,'2016-05-03','ISABEL CRISTINA SANTOS DE JESUS','ENFERMEIRA',2,'987066689','CENTRO DE SALVADOR','MANOEL MESSIAS NEVES DE JESUS','VIGILANTE','988829254','LE PARCK','SEM EMAIL','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','pai, mãe ou avós','RUA VINTE DE AGOSTO','84','','PAU MIUDO','Salvador','40310610','BA','AVÓ FLORIANO 988530790  AVÓ JACIRA 988771164','','2018-06-19',0,1,54),(404,'9',1,'ISABELLE OLIVEIRA DOS SANTOS',1,'2015-10-14','REBECA EMANUELLE PEDREIRA OLIVEIRA','OPERADORA DE TELEMARKETING',2,'987232547/33860065','ATENTO','ELSON BOMFIM DOS SANTOS','SERVIÇOS GERAIS','986231922','PELOURINHO','bel-linda400@hotmail.com','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','pai, mãe ou avó Sueli','TV 1 NOSSA SENHORA DAS CANDEIAS','9A','','PERO VAZ','Salvador','40335301','BA','','','2018-06-19',0,1,54),(405,'10',1,'BENJAMIM DA CONCEIÇÃO SILVA DE OLIV',1,'2016-10-25','CLAUDILANDIA DA CONCEIÇÃO SILVA','CONTADORA',6,'988873422/991049181','','TIAGO JESUS DE OLIVEIRA','MOTORISTA','999634274','belov engenharia LTD','claudilandia@yahoo.com.br','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','Av Santiago','20','1 andar','Caixa D água','Salvador','40320360','BA','','','2018-06-19',0,1,54),(406,'11',1,'ARTHUR EMA. J. MIRANDA CABRAL MORAI',1,'2014-04-09','ROSANGELA JESUS MIRANDA','MONITORA DE SERVIÇP',6,'33880872/993498115','','RICARDO CABRAL MORAIS','OPERADOR DE MAQUINAS','985563391','MRV ENG.','rosa.miranda25@hotmail.com','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','Mãe ou Pai','RUA MARQUES DE SOUZA','90','','CAIXA D AGUA','Salvador','40321025','BA','','','2018-06-19',0,1,54),(407,'13',1,'KAUÃ LOPES MENEZES TEIXEIRA',1,'2014-10-26','KALINE LOPES RIBEIRO','AUXILIAR DE PESSOAL',6,'986069029','','HEYDER MARTINS MENEZES TEIXEIRA','APOSENTADO','987768409','','kabybeiro@hotmail.com','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','Mãe ou Pai','RUA VILA BARLETA','63','casa','MACAÚBAS','Salvador','40302380','BA','AVÓ EVA - 33157370','','2018-06-20',0,1,54),(408,'14',1,'LARA VITÓRIA PEREIRA DE SOUSA',1,'2014-09-14','MARINA PEREIRA DOS SANTOS','APOSENTADA',6,'986802082/30524789','','ANDERSON SOUSA DOS SANTOS','ESTUDANTE','988462401','','NÃO TEM','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','Mãe ou Pai','RUA PADRE ARRENIO DA FONSECA','46','','BARROS REIS','Salvador','40315510','BA','AVÓ FÁTIMA: 33827736/ TIO CARLOS: 987189868/ TIA MILENA: 988468382','','2018-06-20',0,1,54),(409,'15',1,'ENZO BRITO DOS SANTOS',1,'2014-08-10','ANELIZIA BRITO DOS SANTOS','TEC EM ENFERMAGEM',6,'988490488/33886577','LABORATÓRIO VITALAB','FABIO SANTANA DOS SANTOS','ATENDENTE','986831979','','aneliziabrito@hotmail.com','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','MÃE, PAI OU AVÓ','AV SANTIAGO','44','','CAIXA D AGUA','Salvador','40320360','BA','','','2018-06-20',0,1,54),(410,'16',1,'JOAQUIM DE JESUS TAVARES NETO',1,'2015-02-21','SOANE OLIVEIRA DE SANTANA','PRODUTORA DE EVENTOS',6,'986160917','','LUIZ EDUARDO DE OLIVEIRA TAVARES','VENDEDOR','988747825','AMBEV','eduardo-tavares@hotmail.com','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','Mãe ou Pai','VILA MARGÔ','65','2 ANDAR, LADEIRA DO PAIVA','CAIXA D AGUA','Salvador','40323070','BA','','','2018-06-20',0,1,54),(411,'17',1,'HELOISA CATARINA PEREZ RIBEIRO',1,'2015-01-19','THAIS PEREZ RIBEIRO','ENFERMEIRA',2,'999282818','H. ERNESTO SIMOES','ADEMILSON DO E. S. RIBEIRO DOS SANT','CONTADOR','999997999','RESIDÊNCIA','ademilson_ribeiro7@yahoo.com.b','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','RUA DOMINGOS PEREIRA BAIAO','36','','CAIXA D AGUA','Salvador','40320080','BA','','','2018-06-20',0,1,54),(412,'18',1,'CARLOS EDUARDO QUERINO CAZUMBA',1,'2014-12-07','CARLA JOSEANE QUERINO CAZUMBA','CARLA JOSEANE QUERINO CAZUMBA',8,'987759807/987759807','RESIDÊNCIA','JEFERSON','VIGILANTE','987102203','PITUBA','caljoseane','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','RUA AGOSTINHO SHIMIDTH','18','1 andar','CAIXA D AGUA','Salvador','40323020','BA','AVO SELMA: 987065336 / TIO ANDRÉ: 987373454','','2018-06-20',0,1,54),(413,'19',1,'BENJAMIN FRAGA CAMPOS',1,'2015-02-15','VIVIAN DOS SANTOS FRAGA','TELEMARKETING',5,'986763727/32349318','LEGIAO DA BOA VONTAD','RAMON ALMEIDA CAMPOS','TEC. EM REFRIGERAÇÃO','986534503','HOSPITAL SAO RAFAEL','fraga21@hotmail.com','',2,1,0,0,0,0,0,0,0,'DEFICIÊNCIA EM GGPD',0,'CORANTE, GRÃO DE FAVA, VITAMIN',0,'',0,'','','RUA MANOEL DRUMIND CX D AGUA','80','','CAIXA D AGUA','Salvador','40320670','BA','','','2018-06-20',0,1,54),(414,'20',1,'ENZO SALE DE OLIVEIRA REIS',1,'2014-10-09','ADRIANA SALES DOS SANTOS','COMERCIARIA',6,'996298193/30334287','','JAYR DE OLIVEIRA REIS','INDUSTRIARIO','996319904','CANDEIAS P ARATU','NAO TEM','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','Mãe ou Pai','RUA FREITAS HENRIQUE ','00','','CAIXA D AGUA','Salvador','40320165','BA','','','2018-06-20',0,1,54),(415,'21',1,'AMANDA GABRIELA DA CRUZ SILVA',1,'2015-02-11','VERA LUCIA DA CRUZ','POLICIAL MILITAR',6,'987491252 / 31176225','QUARTEL BARRIS','ROBERTO CONCEIÇÃO SILVA','COMERCIARIO','999929602/981762029','SAO CAETANO','verinha34@hotmail.com','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','Mãe ou Pai','AV ALIOMAR BALEIRO','80','COND MORADA BELA','PAU DA LIMA','Salvador','41385160','BA','','','2018-06-20',0,1,54),(416,'23',1,'DAVI MANUEL ALMEIDA ASSUNÇÃO',1,'2014-09-24','VIVIANE ALMEIDA DA LUZ','OPR. DE TELEMARKETING',5,'987938095','COMERCIO','DIEGO SANTOS DE ASSUNÇÃO','SEGURANÇA','988645108','PROSSEGUR','vivyanealmeida@hotmail.com','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','Mãe ou Pai','RUA JUAZEIRO','26','','CAIXA D AGUA','Salvador','40321055','BA','MARIA DE FATIMA: 34500792/ VERA LUCIA: 32362268/ DANIELA: 986394613','','2018-06-21',0,1,54),(417,'24',1,'ANA CLARA ANUNCIAÇÃO GUIMARÃES',1,'2014-09-30','TERESA CRISTINA DA ANUNCIAÇÃO SOUSA','TEC. EM ALIMENTOS',2,'987430114/992535557','CONTAX','EDOSN SANT\\\'ANNA GUIMARAES NETO','TEC EM PETROLEO E GA','988328692','','tcristina2809@gmail.com','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','mãe ou avó','TRAVESSA VIRGINIA','1','','Baixa De Quintas','Salvador','41032022','BA','','','2018-06-21',0,1,54),(418,'25',1,'KAUA NEIVA REIS LIMA',1,'2015-02-11','PRISCILA NEIVA REIS','administradora',6,'387064454/34064763/4764','UNEB','SILVIO MARIO DOS SANTOS LIMA JUNIOR','SOLDADOR','992528685','','NAO TEM','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','Mãe ou Pai','AVENIDA CONCEICAO','7','1 andar','CAIXA D AGUA','Salvador','40320510','BA','','','2018-06-21',0,1,54),(419,'26',1,'SOPHIA LARA PESSOA SANTOS',1,'2014-07-11','MICHELEN PESSOA DE JESUS','TEC ENFERMAGEM',6,'993456862','HOME CARE','UILTON GUEDES SANTOS','ELETRICISTA','987662481','','chelenpessoa@hotmail.com','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','RUA SAO TOME','26','avó Landina 32563286','CAIXA D AGUA','Salvador','40320485','BA','Em relação ao uso do medicamento deve ser por via supositória, pois a aluna vom','','2018-06-21',0,1,54),(420,'27',2,'DAVID PRAXEDES BANDEIRA',1,'2015-04-29','GESSICARLA MOURA PRAXEDES','DONA DE CASA',8,'32439424/987140564','','PAULO VIRGILIO ALVES BANDEIRA JUNIO','TEC EM ELETROMECANIC','991007000','SOVITEC DO BRASL','pbandeirajr@gmail.com','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','Mãe ou Pai','RUA CORONEL FELISBERTO','24','APT 1','MACAÚBAS','Salvador','40300730','BA','','','2018-06-21',0,1,54),(421,'28',1,'LARISSA RAMOS VERISSIMO',1,'2015-02-03','VANESSA RAMOS VIEIRA DOS SANTOS','AUTONOMA',5,'90175635/981595635','','DAVI VERISSIMO DA SILVA SANTOS','GERENTE DE LOJA','984053614','LOJA DIPPY','daviverissimocabal@hotmail.com','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','RUA MANOEL MARIO DE LIMA','2','AP 402','CAIXA D AGUA','Salvador','40320290','BA','','','2018-06-21',0,1,54),(422,'29',2,'LORENA CRISTINE RODRIGUES SANTOS',1,'2014-12-16','TAISA CRISTINA RODRIGUES SANTOS','AUTONOMA',8,'31425000/996442398','','CARLOS ALBERTO DE JESUS SANTOS','ENC EM LOGISTICA','982547321/33902353','PORTO SECO PIRAJA','NAO TEM','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','RUA MARQUES DE SOUZA','25','','CAIXA D AGUA','Salvador','40321025','BA','','','2018-06-21',0,1,54),(423,'30',1,'ANA LUIZA DOS SANTOS CRUZ',1,'2014-05-18','MARILUCIA PEREIRA DOS SANTOS CRUZ','TEC EM ENFERMAGEM',2,'987199642/32360821','HGE','LUIZ CLAUDIO SOUZA CRUZ','OPE. DE SISTEMA','988387114','','NAO TEM','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','RUA LIVIA GIFFONE','83','BLOCO C APT 101 COND SOLAR DAS','SANTA TEREZA','Salvador','40265040','BA','','','2018-06-21',0,1,54),(424,'31',1,'LUIZ FELIPE CONCEIÇÃO BORGES BARRET',1,'2014-12-06','LUISE CONCEIÇÃO BORGES','ENG. AMBIENTAL',6,'987246720','','GLEBIO DIEGO LONGUINHO BARRETO','AUTONOMO','987015139','','luisecborges@gmail.com','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','RUA SALDANHA MARINHO','6','','CAIXA D AGUA','Salvador','40323010','BA','AVÓ MARITELMA: 988667816/TIO RAFAEL: 987767693','','2018-06-21',0,1,54),(425,'32',1,'ISABELLA DUARTE TOMÉ',1,'2014-08-20','JUCIMARA SILVA NUNES DUARTE','DONA DE CASA',5,'988747571','','DENILSON PEREIRA JOSE TOMÉ','AUX. CONTÁBIL','32216043/985250092','NARTEC CONTABILIDADE','denilsonpereira.ba@gmail.com','',1,1,0,0,0,0,0,0,0,'',0,'GOIABA',0,'',0,'','','RUA SALDANHA MARINHO','204','APT 102','CAIXA D AGUA','Salvador','40323010','BA','TIO JUCIMAR: 986517955','','2018-06-21',0,1,54),(426,'33',1,'RAYSSA VICTORIS FARIAS LONGUINHOS',1,'2015-04-24','ROQUELINE DE SOUZA FARIAS','AUX. ADMINISTRATIVO',6,'987141222/33830345','','AURINO MARTINS LONGUINHOS NETO','COMPRADOR E VENDEDOR','988892212/988396824','','NAO TEM','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','Mãe ou Pai','RUA VINTE DE AGOSTO','141','','PAU MIUDO','Salvador','40310610','BA','PADRINHO ANTONIO: 987737423','','2018-06-21',0,1,54),(427,'35',1,'NOEMY VICTORIA JESUS DOS SANTOS',1,'2014-11-12','ROSE CLEIDE CARMO DE JESUS','BALCONISTA',5,'985041482','','HELIO SOUZA DOS SANTOS','PADEIRO','988342345/32445451','PADARIA PARQUE','NÃO TEM','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','RUA DIRETA MANDCHURIA','12','','CAIXA D AGUA','Salvador','40320620','BA','TIA LUCIA: 987466334/TIO VAL: 985021866','','2018-06-21',0,1,54),(428,'34',1,'MIGUEL LINO PENA',1,'0000-00-00','CARLA TEREZA PENA BISPO','CONSULTORA DE VENDAS',2,'988348694/32569478','FRUTOSDIAS','ROBERTO LINO OLIVEIRA','CONSULTOR DE VENDAS','986508489/31665589','FRUTOSDIAS','carla.pink.18@hotmail.com','',1,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','RUA RODRIGO DE EMNEZES ','20','','CAIXA D AGUA','Salvador','40315507','BA','','','2018-06-21',0,1,54),(430,'63',1,'FELIPE AZEVEDO ANDRADE',1,'2014-03-15','ELISANGELA DE SOUSA DE AZEVEDO','TEC EM ENFERMAGEM',2,'993257695','HGE/HGESF','EDUARDO ANDRADE SILVA','TEC EM MANUTENCAO','992082315','','elisangelasaster@gmail.com','',2,1,0,0,0,0,0,0,0,'PICADA DE INSETO',0,'',0,'',0,'','','AV TELES','07','','CAIXA D AGUA','SALVADOR','40320300','BA','','','2018-06-28',0,1,54),(431,'62',1,'LIS GOMES LIMA',1,'2014-04-05','FERNANDA CAROLINE FONSECA GOMES','GESTORA DE RH',6,'993276530','LEBRE TECNOLOGIA','JOSE JANDER LIMA','EMPRESARIO','996619754','','fcgl0592@gmail.com','',2,1,0,0,0,0,0,0,0,'RINITE ALÉRICA',0,'',0,'',0,'','','RUA BENTO SABINO','9','','CAIXA D AGUA','SALVADOR','40320040','BA','','','2018-06-28',0,1,54),(432,'61',2,'SARAH AYSHA REQUIAO SACRAMENTO',2,'2013-04-15','EDIANE MARIA LOPES REQUIAO','POLICIAL MILITAR',2,'30422246/987267453','12 CPM','ANDERSON SACRAMENTO DA SILVA','CARTEIRO','986073897','CDD FREDERICO PONTES','edirequiao@hotmail.com','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','AV QUEIROZ ','27','SUBDISTRITO DA LIBERDADE','SOLEDADE','SALVADOR','40327195','BA','','','2018-06-29',0,1,54),(433,'60',2,'JOSUÉ DE JESUS NEVES',1,'2013-07-18','INDAIA ALBERGARIA DE JESUS NEVES','TEC EM ENFERMAGEM',1,'987158044','HGESF','ROBSON CONCEICAO NEVES','APOSENTADO','988765606','','NAO TEM','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','RUA SALDANHA MARINHO','139','','CAIXA D AGUA','SALVADOR','40323010','BA','','','2018-06-29',0,1,54),(434,'59',2,'MARIA LUISA MIRANDA GOMES SOUSA',2,'2013-12-05','PATRCIA MIRANDA GOMES SOUSA','GERENTE DE NEGOCIOS',6,'992526037/33886346','OI TELEMAR','AILTON DOS SANTOS SOUSA FILHO','ASS FINANCEIRO','991307699','SANTENO','patifbb@hotmail.com','',2,1,0,0,0,0,0,0,0,'',0,'',0,'',0,'','','RUA PERO VAZ','434','','PERO VAZ','SALVADOR','40335000','BA','','','2018-06-29',0,1,54);
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
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matriculas`
--

LOCK TABLES `matriculas` WRITE;
/*!40000 ALTER TABLE `matriculas` DISABLE KEYS */;
INSERT INTO `matriculas` VALUES (87,0,'81690258500','749385847',381,3,2,1,1,'652.69',2018,'','2018-05-07',0,0,54),(88,0,'94266204515','0660035804',390,1,2,2,2,'3222.00',2018,'','2018-05-18',0,0,54),(90,0,'50513281568','0658359720',396,3,2,1,1,'7179.60',2018,'','2018-06-07',0,0,54),(93,0,'00697783537','0801612861',399,3,1,1,1,'7179.60',2018,'','2018-06-19',0,0,54),(94,0,'01298474531','0859361381',400,3,1,2,1,'7356.00',2018,'','2018-06-19',0,0,54),(95,0,'95852816515','0776476610',401,3,1,2,1,'6951.16',2018,'','2018-06-19',0,0,54),(96,0,'01011734583','0887316000',402,1,2,2,1,'3499.92',2018,'','2018-06-19',0,0,54),(97,0,'82951772572','783707010',403,3,1,1,1,'7832.28',2018,'','2018-06-19',0,0,54),(98,0,'06873125580','1442072300',404,1,2,2,1,'3889.44',2018,'','2018-06-19',0,0,54),(99,0,'01678925500','849203511',405,3,1,2,1,'3889.44',2018,'','2018-06-19',0,0,54),(100,0,'91707870500','0860426610',406,2,2,1,2,'351.48',2018,'','2018-06-19',0,0,54),(101,0,'68915608534','0750199490',407,1,2,2,2,'3222.00',2018,'','2018-06-20',0,0,54),(102,0,'02032290537','1140565524',408,2,2,1,2,'3222.00',2018,'','2018-06-20',0,0,54),(105,0,'85053007500','0950362107',409,3,1,2,2,'6954.00',2018,'','2018-06-20',0,0,54),(106,0,'92074162553','0848256930',410,2,2,2,2,'3222.00',2018,'','2018-06-20',0,0,54),(107,0,'02131266561','0939251310',411,1,1,1,2,'3222.00',2018,'','2018-06-20',0,0,54),(108,0,'02381864580','961221615',412,1,2,2,2,'3222.00',2018,'','2018-06-20',0,0,54),(109,0,'04201631583','1177443449',413,3,1,3,2,'6954.00',2018,'','2018-06-20',0,1,54),(110,0,'45859442572','320715078',414,1,1,1,2,'3508.80',2018,'','2018-06-20',0,0,54),(111,0,'66976359591','0381107175',415,3,1,2,2,'6954.00',2018,'','2018-06-20',0,0,54),(112,0,'02330575521','1017575738',416,1,2,1,2,'3222.00',2018,'','2018-06-21',0,0,54),(113,0,'03704237558','1470069539',417,3,1,2,2,'6954.00',2018,'','2018-06-21',0,0,54),(114,0,'02963091508','1206126906',418,3,1,1,2,'6954.00',2018,'','2018-06-21',0,0,54),(115,0,'02787408559','1164447203',419,1,2,2,2,'3222.00',2018,'','2018-06-21',0,0,54),(116,0,'00679966552','0843089237',420,1,2,1,2,'3222.00',2018,'','2018-06-21',0,0,54),(117,0,'05217680555','1394519869',421,2,2,1,2,'3222.00',2018,'','2018-06-21',0,0,54),(118,0,'80851274587','0763262412',422,2,2,2,2,'3222.00',2018,'','2018-06-21',0,0,54),(119,0,'58714405504','347214325',423,2,2,1,2,'3222.00',2018,'','2018-06-21',0,0,54),(120,0,'03316123563','1148287760',424,2,2,2,2,'3222.00',2018,'','2018-06-21',0,0,54),(121,0,'03661007505','1458866890',425,2,2,1,2,'3222.00',2018,'','2018-06-21',0,0,54),(122,0,'21399247549','0276516818',426,2,2,1,2,'3528.00',2018,'','2018-06-21',0,0,54),(123,0,'04639524560','1527685993',427,2,2,2,2,'3028.68',2018,'','2018-06-21',0,0,54),(124,0,'03765122530','1281644250',428,1,2,1,2,'3222.00',2018,'','2018-06-21',0,0,54),(125,0,'78897483534','0641277024',430,1,1,2,4,'3222.00',2018,'','2018-06-28',0,0,54),(126,0,'05361123552','1403910294',431,2,2,2,4,'3864.00',2018,'','2018-06-28',0,0,54),(127,0,'80514715553','0692040048',432,3,1,2,5,'6954.00',2018,'','2018-06-29',0,0,54),(128,0,'92053017520','0568647874',433,1,2,2,4,'2973.12',2018,'','2018-06-29',0,0,54),(129,0,'78710960520','0591618680',434,3,1,2,4,'6954.00',2018,'','2018-06-29',0,0,54);
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
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsaveis`
--

LOCK TABLES `responsaveis` WRITE;
/*!40000 ALTER TABLE `responsaveis` DISABLE KEYS */;
INSERT INTO `responsaveis` VALUES (47,'EDSON BARBOSA JUNIOR',7,87,381,'33271035 87616427 91208072','Advogado(a)','','junior.show1@hotmail.com','RUA MADUREIRA DE PINHO','64A','EDF ITAPICURÚ','40323080','','','',54),(53,'Sandra Regina Santos Gomes',6,88,390,'cel 986060983','Soldador(a)','orto Cotegipe','aurisio@yahoo.com.br','Rua Desembargador Julio De Brito','','9 travessa','40300160','','','',54),(54,'Alinaldo Pereira',6,89,391,'(71) 98777766','engeheiro','','','Rua Joaquim Nambuco De Almeida','44','','41320480','','','',54),(55,'KAZUMI KANZAKI',6,90,396,'TR 988041552 CEL 988473965','SUPORTE','','KAZUMIKANZAKI1000@GMAIL.COM','RUA CARLOS GOMES','698','AP 1104 EDF . ANABEL','40060330','','','',54),(58,'JEFERSON XAVIER PINHEIRO DOS SANTOS',6,93,399,'987061304','ENFERMEIRO','SEC. MUN. - LAURO DE','jeferson.xavierps@gmail.com','CONJ. ASTECA , LAD DO PAIVA','40','AP 303 B- B2','40320720','','','',54),(59,'ANA DEISE PEREIRA DA SILVA',7,94,400,'987935735/33865182','COMERCIARIA','','deisemaquely@gmail.com','Rua Vitor Serra','45','1 andar','40340290','','','',54),(60,'ROQUINEIA SANTOS DA SILVA',7,95,401,'988254187','TURISMOLOGA','HOSPITAL SANTA ISABE','aurisio@yahoo.com.br','TV PARAISO','40','EDF VILA GUIMARES AP','40320200','','','',54),(61,'FERNANDA PEREIRA',7,96,402,'983696697/33131992','AUTONOMA','FEIRA DE SÃO JOAQUIM','aurisio@yahoo.com.br','RUA FREITAS HENRIQUE DE CIMA','78A','','40320150','','','',54),(62,'MANOEL MESSIAS NEVES DE JESUS',6,97,403,'987066689','VIGILANTE','CENTRO DE SALVADOR','SEM EMAIL','RUA VINTE DE AGOSTO','84','','40310610','','','',54),(63,'REBECA EMANUELLE PEDREIRA OLIVEIRA',7,98,404,'986231922','OPERADORA DE TELEMARKETING','PELOURINHO','bel-linda400@hotmail.com','TV 1 NOSSA SENHORA DAS CANDEIAS','9A','','40335301','','','',54),(64,'CLAUDILANDIA DA CONCEIÇÃO SILVA',7,99,405,'999634274','CONTADORA','belov engenharia LTD','claudilandia@yahoo.com.br','Av Santiago','20','1 andar','40320360','','','',54),(65,'RICARDO CABRAL MORAIS',6,100,406,'33880872/993498115','OPERADOR DE MAQUINAS','','rosa.miranda25@hotmail.com','RUA MARQUES DE SOUZA','90','','40321025','','','',54),(66,'KALINE LOPES RIBEIRO',7,101,407,'987768409','AUXILIAR DE PESSOAL','','kabybeiro@hotmail.com','RUA VILA BARLETA','63','casa','40302380','','','',54),(67,'ANELIZIA BRITO DOS SANTOS',7,105,409,'986831979','TEC EM ENFERMAGEM','','aneliziabrito@hotmail.com','AV SANTIAGO','44','','40320360','','','',54),(68,'SOANE OLIVEIRA DE SANTANA',7,106,410,'988747825','PRODUTORA DE EVENTOS','AMBEV','eduardo-tavares@hotmail.com','VILA MARGÔ','65','2 ANDAR, LADEIRA DO ','40323070','','','',54),(69,'ADEMILSON DO E. S. RIBEIRO DOS SANT',6,107,411,'999282818','CONTADOR','H. ERNESTO SIMOES','ademilson_ribeiro7@yahoo.com.b','RUA DOMINGOS PEREIRA BAIAO','36','','40320080','','','',54),(70,'CARLA JOSEANE QUERINO CAZUMBA',7,108,412,'987102203','CARLA JOSEANE QUERINO CAZUMBA','PITUBA','caljoseane','RUA AGOSTINHO SHIMIDTH','18','1 andar','40323020','','','',54),(71,'VIVIANE DOS SANTOS FRAGA',1,109,413,'985506375','ESTOQUISTA','AVON','SEM EMIAL','RUA MANOEL DRUMOND','80','','40320670','CAIXA D AGUA','Salvador','BA',54),(72,'JAYR DE OLIVEIRA REIS',6,110,414,'996298193/30334287','INDUSTRIARIO','','NAO TEM','RUA FREITAS HENRIQUE ','00','','40320165','','','',54),(73,'VERA LUCIA DA CRUZ',7,111,415,'999929602/981762029','POLICIAL MILITAR','SAO CAETANO','verinha34@hotmail.com','AV ALIOMAR BALEIRO','80','COND MORADA BELA','41385160','','','',54),(74,'DIEGO SANTOS DE ASSUNÇÃO',6,112,416,'987938095','SEGURANÇA','COMERCIO','vivyanealmeida@hotmail.com','RUA JUAZEIRO','26','','40321055','','','',54),(75,'TERESA CRISTINA DA ANUNCIAÇÃO SOUSA',7,113,417,'988328692','TEC. EM ALIMENTOS','','tcristina2809@gmail.com','TRAVESSA VIRGINIA','1','','41032022','','','',54),(76,'SILVIO MARIO DOS SANTOS LIMA JUNIOR',6,114,418,'387064454/34064763/4764','SOLDADOR','UNEB','NAO TEM','AVENIDA CONCEICAO','7','1 andar','40320510','','','',54),(77,'MICHELEN PESSOA DE JESUS',7,115,419,'987662481','TEC ENFERMAGEM','','chelenpessoa@hotmail.com','RUA SAO TOME','26','avó Landina 32563286','40320485','','','',54),(78,'PAULO VIRGILIO ALVES BANDEIRA JUNIO',6,116,420,'32439424/987140564','TEC EM ELETROMECANIC','','pbandeirajr@gmail.com','RUA CORONEL FELISBERTO','24','APT 1','40300730','','','',54),(79,'DAVI VERISSIMO DA SILVA SANTOS',6,117,421,'90175635/981595635','GERENTE DE LOJA','','daviverissimocabal@hotmail.com','RUA MANOEL MARIO DE LIMA','2','AP 402','40320290','','','',54),(80,'TAISA CRISTINA RODRIGUES SANTOS',7,118,422,'982547321/33902353','AUTONOMA','PORTO SECO PIRAJA','NAO TEM','RUA MARQUES DE SOUZA','25','','40321025','','','',54),(81,'LUIZ CLAUDIO SOUZA CRUZ',6,119,423,'987199642/32360821','OPE. DE SISTEMA','HGE','NAO TEM','RUA LIVIA GIFFONE','83','BLOCO C APT 101 COND','40265040','','','',54),(82,'LUISE CONCEIÇÃO BORGES',7,120,424,'987015139','ENG. AMBIENTAL','','luisecborges@gmail.com','RUA SALDANHA MARINHO','6','','40323010','','','',54),(83,'DENILSON PEREIRA JOSE TOMÉ',6,121,425,'988747571','AUX. CONTÁBIL','','denilsonpereira.ba@gmail.com','RUA SALDANHA MARINHO','204','APT 102','40323010','','','',54),(84,'AURINO MARTINS LONGUINHOS NETO',6,122,426,'987141222/33830345','COMPRADOR E VENDEDOR','','NAO TEM','RUA VINTE DE AGOSTO','141','','40310610','','','',54),(85,'ROSE CLEIDE CARMO DE JESUS',7,123,427,'988342345/32445451','BALCONISTA','PADARIA PARQUE','NÃO TEM','RUA DIRETA MANDCHURIA','12','','40320620','','','',54),(86,'ROBERTO LINO OLIVEIRA',6,124,428,'988348694/32569478','CONSULTOR DE VENDAS','FRUTOSDIAS','carla.pink.18@hotmail.com','RUA RODRIGO DE EMNEZES ','20','','40315507','','','',54),(87,'ELISANGELA DE SOUSA DE AZEVEDO',7,125,430,'992082315','TEC EM ENFERMAGEM','','elisangelasaster@gmail.com','AV TELES','07','','40320300','','','',54),(88,'FERNANDA CAROLINE FONSECA GOMES',7,126,431,'996619754','GESTORA DE RH','','fcgl0592@gmail.com','RUA BENTO SABINO','9','','40320040','','','',54),(89,'EDIANE MARIA LOPES REQUIAO',7,127,432,'986073897','POLICIAL MILITAR','CDD FREDERICO PONTES','edirequiao@hotmail.com','AV QUEIROZ ','27','SUBDISTRITO DA LIBER','40327195','','','',54),(90,'INDAIA ALBERGARIA DE JESUS NEVES',7,128,433,'988765606','TEC EM ENFERMAGEM','','NAO TEM','RUA SALDANHA MARINHO','139','','40323010','','','',54),(91,'PATRCIA MIRANDA GOMES SOUSA',7,129,434,'991307699','GERENTE DE NEGOCIOS','SANTENO','patifbb@hotmail.com','RUA PERO VAZ','434','','40335000','','','',54);
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

-- Dump completed on 2018-07-10  9:42:28
