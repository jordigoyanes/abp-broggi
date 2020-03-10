-- MariaDB dump 10.17  Distrib 10.4.6-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: broggiv3
-- ------------------------------------------------------
-- Server version	10.4.6-MariaDB

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
-- Table structure for table `afectats`
--
CREATE DATABASE  IF NOT EXISTS `broggi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE broggi;

DROP TABLE IF EXISTS `afectats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afectats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cip` varchar(14) DEFAULT NULL,
  `telefon` int(15) NOT NULL,
  `edat` int(11) DEFAULT NULL,
  `sexe` varchar(8) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `cognoms` varchar(45) DEFAULT NULL,
  `tenir_tarjeta` tinyint(4) DEFAULT NULL,
  `municipis_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_afectats_municipis1_idx` (`municipis_id`),
  CONSTRAINT `fk_afectats_municipis1` FOREIGN KEY (`municipis_id`) REFERENCES `municipis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afectats`
--

LOCK TABLES `afectats` WRITE;
/*!40000 ALTER TABLE `afectats` DISABLE KEYS */;
/*!40000 ALTER TABLE `afectats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alertants`
--

DROP TABLE IF EXISTS `alertants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alertants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `cognoms` varchar(150) NOT NULL,
  `adreca` varchar(150) NOT NULL,
  `municipis_id` int(11) NOT NULL,
  `telefon` varchar(45) NOT NULL,
  `tipus_alertant_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_alertants_tipus_alertant_idx` (`tipus_alertant_id`),
  KEY `fk_alertants_municipis1_idx` (`municipis_id`),
  CONSTRAINT `fk_alertants_municipis1` FOREIGN KEY (`municipis_id`) REFERENCES `municipis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alertants_tipus_alertant` FOREIGN KEY (`tipus_alertant_id`) REFERENCES `tipus_alertant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alertants`
--

LOCK TABLES `alertants` WRITE;
/*!40000 ALTER TABLE `alertants` DISABLE KEYS */;
INSERT INTO `alertants` VALUES (1,'Fundació Sant Hospital','','Pg. de Joan Brudieu, 8',782,'973350050',1),(2,'Hospital de Puigcerdà','','Pl. de Santa Maria, 1',592,'972880150',1),(3,'Hospital Comarcal del Pallars','','Pau Casals, 5',851,'973652255',1),(4,'Espitau Val d\'Aran','','Espitau, 8',891,'973640004',1),(5,'Clínica de Ponent','','Prat de la Riba, 79',386,'973232943',1),(6,'Hospital Santa Maria','','Av. Alcalde Rovira Roure, 44',386,'973727222',1),(7,'Hospital Universitari Arnau de Vilanova de Lleida','','Av. Alcalde Rovira Roure, 80',386,'973248100',1),(8,'Pius Hospital de Valls','','Pl. Sant Francesc, s/n',877,'977613000',1),(9,'Centre Mèdic Quirúrgic Reus','','Antoni Gaudí, 26',610,'977010800',1),(10,'Hospital Sant Joan de Reus','','Josep Laporte, s/n',610,'977337303',1),(11,'Hospital del Vendrell','','Carretera de Barcelona, s/n',883,'977257900',1),(12,'Hospital Sant Pau i Santa Tecla','','Rambla Vella, 14',807,'977259900',1),(13,'Hospital Universitari Joan XXIII de Tarragona','','Dr. Mallafré i Guasch, 4',807,'977295800',1),(14,'Hospital Verge de la Cinta de Tortosa','','Esplanetes, 44-58',848,'977519100',1),(15,'Clínica Terres de l\'Ebre','','Pl. Joaquim Bau, 6-8',848,'977588200',1),(16,'Hospital Comarcal d\'Amposta','','Jacint Verdaguer, 11',52,'977700050',1),(17,'Hospital Comarcal Móra d\'Ebre','','Benet i Messeguer, s/n',472,'977401674',1),(18,'Hospital de Figueres','','Ronda del Rector Arolas, s/n',290,'972501400',1),(19,'Hospital de Palamós','','Hospital, 36',515,'972600160',1),(20,'Hospital Sant Jaume d\'Olot','','Mulleras, 15',498,'972261800',1),(21,'Clínica Girona','','Joan Maragall, 26',330,'972204500',1),(22,'ICO Girona','','Av. de França, s/n',330,'972225833',1),(23,'Hospital Universitari Doctor Josep Trueta de Girona','','Av. de França, s/n',330,'972940200',1),(24,'Hospital Santa Caterina','','Dr. Castany, s/n (Parc Hospitalari Martí i Julià)',651,'972182500',1),(25,'Hospital Comarcal Sant Jaume de Calella','','Sant Jaume, 209',161,'937690201',1),(26,'Clínica Salus Infirmorum','','Av. Mossèn Lluís Constans, 130',87,'972570208',1),(27,'Hospital de Campdevànol','','Ctra. de Gombrèn, 20',170,'972730013',1),(28,'Hospital Comarcal de Blanes','','Accés cala Sant Francesc, 5',125,'972353264',1),(29,'Hospital d\'Igualada','','Av. Catalunya, 11',360,'938075500',1),(30,'Centre Hospitalari','','Av. de les Bases de Manresa, 6-8',410,'938732550',1),(31,'Hospital Sant Joan de Déu','','Dr. Joan Soler, s/n',410,'938742112',1),(32,'Hospital Comarcal Sant Bernabé','','Ctra. de Ribes, s/n',114,'938243400',1),(33,'Hospital General de Vic','','Francesc Pla El Vigatà, 1',888,'938891111',1),(34,'Hospital Comarcal de l\'Alt Penedès','','Espirall, s/n',903,'938180440',1),(35,'Hospital Sant Joan de Déu','','Av. Mancomunitats Comarcals, 1',414,'937742020',1),(36,'Hospital General. Parc Sanitari Sant Joan de Déu','','Camí Vell de la Colònia, 25',661,'936615208',1),(37,'Hospital de Viladecans','','Av. de Gavà, 38',898,'936590111',1),(38,'Hospital Sant Joan de Déu','','Pg. de Sant Joan de Déu, 2',270,'932532100',1),(39,'Hospital de Sant Joan Despí Moisès Broggi','','Jacint Verdaguer, 90',695,'935531200',1),(40,'Hospital del Mar','','Pg. Marítim, 25-29',91,'932483000',1),(41,'Hospital Plató','','Plató, 21',91,'933069900',1),(42,'Hospital de l\'Esperança','','Sant Josep de la Muntanya, 12',91,'933674100',1),(43,'Fundació Puigvert / Iuna','','Cartagena, 340',91,'934169700',1),(44,'Hospital Dos de Maig','','Dos de Maig, 301',91,'935072700',1),(45,'Hospital Casa Maternitat','','Sabino de Arana, 1',91,'932275600',1),(46,'Hospital Universitari Sagrat Cor','','Viladomat, 288',91,'933221111',1),(47,'Hospital Universitari General de la Vall d\'Hebron','','Pg. de la Vall d\'Hebron, 119-129',91,'934893000',1),(48,'Hospital Sant Rafael','','Pg. de la Vall d\'Hebron, 107',91,'932112508',1),(49,'Hospital Universitari Maternoinfantil de la Vall d\'Hebron','','Pg. de la Vall d\'Hebron, 119-129',91,'934893000',1),(50,'Hospital Universitari de Traumatologia i Rehabilitació de la Vall d\'Hebron','','Pg. de la Vall d\'Hebron, 119-129',91,'934893000',1),(51,'Hospital Clínic i Provincial de Barcelona','','Villarroel, 170',91,'932275400',1),(52,'Hospital de la Santa Creu i Sant Pau','','Sant Quintí, 89',91,'935537160',1),(53,'Hospital General de l\'Hospitalet','','Josep Molins, 29',357,'934407500',1),(54,'ICO L\'Hospitalet','','Av. de la Granvia, s/n km 2,7 (Hospital Duran i Reynals)',357,'932607733',1),(55,'Hospital Universitari de Bellvitge','','Feixa Llarga, s/n',357,'932607500',1),(56,'Hospital Municipal Badalona','','Via Augusta, 9-13',79,'934648300',1),(57,'Institut Guttmann','','Camí de Can Ruti, s/n',79,'934977700',1),(58,'ICO Badalona','','Ctra. de Canyet, s/n',79,'934978710',1),(59,'Hospital Universitari Germans Trias i Pujol de Badalona','','Ctra. de Canyet, s/n',79,'934651200',1),(60,'Fundació Hospital de l\'Esperit Sant','','Av. de Mossèn Josep Pons i Robadà, s/n',743,'933860202',1),(61,'Fundació Hospital Comarcal Sant Antoni Abat','','Rambla de Sant Josep, 21',926,'938931616',1),(62,'Fundació Hospital Residència Sant Camil','','Ctra. de Puigmoltó, km 0,8',720,'938960025',1),(63,'Hospital de Mataró','','Ctra. de Cirera, s/n',431,'937417700',1),(64,'Hospital de Sabadell','','Parc Taulí, s/n',643,'937231010',1),(65,'Hospital Mútua Terrassa','','Pl. Dr. Robert, 5',816,'937365050',1),(66,'Hospital de Terrassa','','Ctra. de Torrebonica, s/n',816,'937310007',1),(67,'Fundació Privada Hospital de Mollet','','Sant Llorenç, 39',444,'935760300',1),(68,'Hospital General de Granollers','','Av. de Francesc Ribas, s/n',341,'938425000',1),(69,'Hospital de Sant Celoni','','Av. de l\'Hospital, 19',665,'938670617',1);
/*!40000 ALTER TABLE `alertants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comarques`
--

DROP TABLE IF EXISTS `comarques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comarques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `provincies_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comarques_provincies1_idx` (`provincies_id`),
  CONSTRAINT `fk_comarques_provincies1` FOREIGN KEY (`provincies_id`) REFERENCES `provincies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comarques`
--

LOCK TABLES `comarques` WRITE;
/*!40000 ALTER TABLE `comarques` DISABLE KEYS */;
INSERT INTO `comarques` VALUES (1,'Alt Camp',4),(2,'Alt Empordà',2),(3,'Alt Penedès',1),(4,'Alt Urgell',3),(5,'Alta Ribagorça',3),(6,'Anoia',1),(7,'Aran',3),(8,'Bages',1),(9,'Baix Camp',4),(10,'Baix Ebre',4),(11,'Baix Empordà',2),(12,'Baix Llobregat',1),(13,'Baix Penedès',4),(14,'Barcelonès',1),(16,'Berguedà',1),(17,'Cerdanya',2),(18,'Cerdanya',3),(19,'Conca de Barberà',4),(20,'Garraf',1),(21,'Garrigues',3),(22,'Garrotxa',2),(23,'Gironès',2),(24,'Maresme',1),(25,'Moianès',1),(26,'Montsià',4),(27,'Noguera',3),(28,'Osona',1),(29,'Osona',2),(30,'Pallars Jussà',3),(31,'Pla de l\'Estany',2),(32,'Pla d\'Urgell',3),(33,'Priorat',4),(34,'Ribera d\'Ebre',4),(35,'Ripollès',2),(36,'Segarra',3),(37,'Segrià',3),(38,'Selva',2),(39,'Solsonès',3),(40,'Tarragonès',4),(41,'Terra Alta',4),(42,'Urgell',3),(43,'Vallès Occidental',1),(44,'Vallès Oriental',1),(45,'Pallars Sobirà',3);
/*!40000 ALTER TABLE `comarques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estats_incidencia`
--

DROP TABLE IF EXISTS `estats_incidencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estats_incidencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estat` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `estat_UNIQUE` (`estat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estats_incidencia`
--

LOCK TABLES `estats_incidencia` WRITE;
/*!40000 ALTER TABLE `estats_incidencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `estats_incidencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidencies`
--

DROP TABLE IF EXISTS `incidencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_incidencia` int(11) NOT NULL,
  `telefon_alertant` int(15) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `adreca` varchar(150) NOT NULL,
  `complement_adreca` varchar(150) DEFAULT NULL,
  `descripcio` varchar(256) DEFAULT NULL,
  `municipis_id` int(11) NOT NULL,
  `tipus_incident_id` int(11) NOT NULL,
  `estats_incidencia_id` int(11) NOT NULL,
  `tipus_alertant_id` int(11) NOT NULL,
  `alertants_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_incidencies_municipis1_idx` (`municipis_id`),
  KEY `fk_incidencies_tipus_incident1_idx` (`tipus_incident_id`),
  KEY `fk_incidencies_estats_incidencia1_idx` (`estats_incidencia_id`),
  KEY `fk_incidencies_tipus_alertant1_idx` (`tipus_alertant_id`),
  KEY `fk_incidencies_alertants1_idx` (`alertants_id`),
  CONSTRAINT `fk_incidencies_alertants1` FOREIGN KEY (`alertants_id`) REFERENCES `alertants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_estats_incidencia1` FOREIGN KEY (`estats_incidencia_id`) REFERENCES `estats_incidencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_municipis1` FOREIGN KEY (`municipis_id`) REFERENCES `municipis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_tipus_alertant1` FOREIGN KEY (`tipus_alertant_id`) REFERENCES `tipus_alertant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_tipus_incident1` FOREIGN KEY (`tipus_incident_id`) REFERENCES `tipus_incident` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencies`
--

LOCK TABLES `incidencies` WRITE;
/*!40000 ALTER TABLE `incidencies` DISABLE KEYS */;
/*!40000 ALTER TABLE `incidencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidencies_has_afectats`
--

DROP TABLE IF EXISTS `incidencies_has_afectats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencies_has_afectats` (
  `incidencies_id` int(11) NOT NULL,
  `afectats_id` int(11) NOT NULL,
  PRIMARY KEY (`incidencies_id`,`afectats_id`),
  KEY `fk_incidencies_has_afectats_afectats1_idx` (`afectats_id`),
  KEY `fk_incidencies_has_afectats_incidencies1_idx` (`incidencies_id`),
  CONSTRAINT `fk_incidencies_has_afectats_afectats1` FOREIGN KEY (`afectats_id`) REFERENCES `afectats` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_has_afectats_incidencies1` FOREIGN KEY (`incidencies_id`) REFERENCES `incidencies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencies_has_afectats`
--

LOCK TABLES `incidencies_has_afectats` WRITE;
/*!40000 ALTER TABLE `incidencies_has_afectats` DISABLE KEYS */;
/*!40000 ALTER TABLE `incidencies_has_afectats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidencies_has_recursos`
--

DROP TABLE IF EXISTS `incidencies_has_recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencies_has_recursos` (
  `incidencies_id` int(11) NOT NULL,
  `recursos_id` int(11) NOT NULL,
  `prioritat` int(11) NOT NULL,
  `hora_acitvacio` datetime DEFAULT NULL,
  `hora_mobilitzacio` datetime DEFAULT NULL,
  `hora_assistencia` datetime DEFAULT NULL,
  `hora_transport` datetime DEFAULT NULL,
  `hora_arribada_hospital` datetime DEFAULT NULL,
  `hora_transferencia` datetime DEFAULT NULL,
  `hora_finalitzacio` datetime DEFAULT NULL,
  PRIMARY KEY (`incidencies_id`,`recursos_id`),
  KEY `fk_incidencies_has_recursos_recursos1_idx` (`recursos_id`),
  KEY `fk_incidencies_has_recursos_incidencies1_idx` (`incidencies_id`),
  CONSTRAINT `fk_incidencies_has_recursos_incidencies1` FOREIGN KEY (`incidencies_id`) REFERENCES `incidencies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_has_recursos_recursos1` FOREIGN KEY (`recursos_id`) REFERENCES `recursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencies_has_recursos`
--

LOCK TABLES `incidencies_has_recursos` WRITE;
/*!40000 ALTER TABLE `incidencies_has_recursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `incidencies_has_recursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidencies_has_usuaris`
--

DROP TABLE IF EXISTS `incidencies_has_usuaris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencies_has_usuaris` (
  `incidencies_id` int(11) NOT NULL,
  `usuaris_id` int(11) NOT NULL,
  PRIMARY KEY (`incidencies_id`,`usuaris_id`),
  KEY `fk_incidencies_has_usuaris_usuaris1_idx` (`usuaris_id`),
  KEY `fk_incidencies_has_usuaris_incidencies1_idx` (`incidencies_id`),
  CONSTRAINT `fk_incidencies_has_usuaris_incidencies1` FOREIGN KEY (`incidencies_id`) REFERENCES `incidencies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_has_usuaris_usuaris1` FOREIGN KEY (`usuaris_id`) REFERENCES `usuaris` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencies_has_usuaris`
--

LOCK TABLES `incidencies_has_usuaris` WRITE;
/*!40000 ALTER TABLE `incidencies_has_usuaris` DISABLE KEYS */;
/*!40000 ALTER TABLE `incidencies_has_usuaris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipis`
--

DROP TABLE IF EXISTS `municipis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `comarques_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_municipis_comarques1_idx` (`comarques_id`),
  CONSTRAINT `fk_municipis_comarques1` FOREIGN KEY (`comarques_id`) REFERENCES `comarques` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=948 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipis`
--

LOCK TABLES `municipis` WRITE;
/*!40000 ALTER TABLE `municipis` DISABLE KEYS */;
INSERT INTO `municipis` VALUES (1,'Abella de la Conca',30),(2,'Abrera',12),(3,'Àger',27),(4,'Agramunt',42),(5,'Aguilar de Segarra',8),(6,'Agullana',2),(7,'Aiguafreda',44),(8,'Aiguamúrcia',1),(9,'Aiguaviva',23),(10,'Aitona',37),(11,'Els Alamús',37),(12,'Alàs i Cerc',4),(13,'L\'Albagés',21),(14,'Albanyà',2),(15,'Albatàrrec',37),(16,'Albesa',27),(17,'L\'Albi',21),(18,'Albinyana',13),(19,'L\'Albiol',9),(20,'Albons',11),(21,'Alcanar',26),(22,'Alcanó',37),(23,'Alcarràs',37),(24,'Alcoletge',37),(25,'Alcover',1),(26,'L\'Aldea',10),(27,'Aldover',10),(28,'L\'Aleixar',9),(29,'Alella',24),(30,'Alfara de Carles',10),(31,'Alfarràs',37),(32,'Alfés',37),(33,'Alforja',9),(34,'Algerri',27),(35,'Alguaire',37),(36,'Alins',45),(37,'Alió',1),(38,'Almacelles',37),(39,'Almatret',37),(40,'Almenar',37),(41,'Almoster',9),(42,'Alòs de Balaguer',27),(43,'Alp',17),(44,'Alpens',28),(45,'Alpicat',37),(46,'Alt Àneu',45),(47,'Altafulla',40),(48,'Amer',38),(49,'L\'Ametlla de Mar',10),(50,'L\'Ametlla del Vallès',44),(51,'L\'Ampolla',10),(52,'Amposta',26),(53,'Anglès',38),(54,'Anglesola',42),(55,'Arbeca',21),(56,'L\'Arboç',13),(57,'Arbolí',9),(58,'Arbúcies',38),(59,'Arenys de Mar',24),(60,'Arenys de Munt',24),(61,'Argelaguer',22),(62,'Argençola',6),(63,'L\'Argentera',9),(64,'Argentona',24),(65,'L\'Armentera',2),(66,'Arnes',41),(67,'Arres',7),(68,'Arsèguel',4),(69,'Artés',8),(70,'Artesa de Lleida',37),(71,'Artesa de Segre',27),(72,'Ascó',34),(73,'Aspa',37),(74,'Les Avellanes i Santa Linya',27),(75,'Avià',16),(76,'Avinyó',8),(77,'Avinyonet de Puigventós',2),(78,'Avinyonet del Penedès',3),(79,'Badalona',14),(80,'Badia del Vallès',43),(81,'Bagà',16),(82,'Baix Pallars',45),(83,'Balaguer',27),(84,'Balenyà',28),(85,'Balsareny',8),(86,'Banyeres del Penedès',13),(87,'Banyoles',31),(88,'Barbens',32),(89,'Barberà de la Conca',19),(90,'Barberà del Vallès',43),(91,'Barcelona',14),(92,'La Baronia de Rialb',27),(93,'Bàscara',2),(94,'Bassella',4),(95,'Batea',41),(96,'Bausen',7),(97,'Begues',12),(98,'Begur',11),(99,'Belianes',42),(100,'Bellaguarda',21),(101,'Bellcaire d\'Empordà',11),(102,'Bellcaire d\'Urgell',27),(103,'Bell-lloc d\'Urgell',32),(104,'Bellmunt del Priorat',33),(105,'Bellmunt d\'Urgell',27),(106,'Bellprat',6),(107,'Bellpuig',42),(108,'Bellvei',13),(109,'Bellver de Cerdanya',18),(110,'Bellvís',32),(111,'Benavent de Segrià',37),(112,'Benifallet',10),(113,'Benissanet',34),(114,'Berga',16),(115,'Besalú',22),(116,'Bescanó',23),(117,'Beuda',22),(118,'Bigues i Riells',44),(119,'Biosca',36),(120,'La Bisbal de Falset',33),(121,'La Bisbal del Penedès',13),(122,'La Bisbal d\'Empordà',11),(123,'Biure',2),(124,'Blancafort',19),(125,'Blanes',38),(126,'Boadella i les Escaules',2),(127,'Bolvir',17),(128,'Bonastre',13),(129,'Es Bòrdes',7),(130,'Bordils',23),(131,'Les Borges Blanques',21),(132,'Les Borges del Camp',9),(133,'Borrassà',2),(134,'Borredà',16),(135,'Bossòst',7),(136,'Bot',41),(137,'Botarell',9),(138,'Bovera',21),(139,'Bràfim',1),(140,'Breda',38),(141,'El Bruc',6),(142,'El Brull',28),(143,'Brunyola i Sant Martí Sapresa',38),(144,'Cabacés',33),(145,'Cabanabona',27),(146,'Cabanelles',2),(147,'Cabanes',2),(148,'Les Cabanyes',3),(149,'Cabó',4),(150,'Cabra del Camp',1),(151,'Cabrera d\'Anoia',6),(152,'Cabrera de Mar',24),(153,'Cabrils',24),(154,'Cadaqués',2),(155,'Calaf',6),(156,'Calafell',13),(157,'Calders',25),(158,'Caldes de Malavella',38),(159,'Caldes de Montbui',44),(160,'Caldes d\'Estrac',24),(161,'Calella',24),(162,'Calldetenes',28),(163,'Callús',8),(164,'Calonge de Segarra',6),(165,'Calonge i Sant Antoni',11),(166,'Camarasa',27),(167,'Camarles',10),(168,'Cambrils',9),(169,'Camós',31),(170,'Campdevànol',35),(171,'Campelles',35),(172,'Campins',44),(173,'Campllong',23),(174,'Camprodon',35),(175,'Canejan',7),(176,'Canet d\'Adri',23),(177,'Canet de Mar',24),(178,'La Canonja',40),(179,'Canovelles',44),(180,'Cànoves i Samalús',44),(181,'Cantallops',2),(182,'Canyelles',20),(183,'Capafonts',9),(184,'Capçanes',33),(185,'Capellades',6),(186,'Capmany',2),(187,'Capolat',16),(188,'Cardedeu',44),(189,'Cardona',8),(190,'Carme',6),(191,'Caseres',41),(192,'Cassà de la Selva',23),(193,'Casserres',16),(194,'Castell de l\'Areny',16),(195,'Castell de Mur',30),(196,'Castellar de la Ribera',39),(197,'Castellar de n\'Hug',16),(198,'Castellar del Riu',16),(199,'Castellar del Vallès',43),(200,'Castellbell i el Vilar',8),(201,'Castellbisbal',43),(202,'Castellcir',25),(203,'Castelldans',21),(204,'Castelldefels',12),(205,'Castellet i la Gornal',3),(206,'Castellfollit de la Roca',22),(207,'Castellfollit de Riubregós',6),(208,'Castellfollit del Boix',8),(209,'Castellgalí',8),(210,'Castellnou de Bages',8),(211,'Castellnou de Seana',32),(212,'Castelló de Farfanya',27),(213,'Castelló d\'Empúries',2),(214,'Castellolí',6),(215,'Castell-Platja d\'Aro',11),(216,'Castellserà',42),(217,'Castellterçol',25),(218,'Castellvell del Camp',9),(219,'Castellví de la Marca',3),(220,'Castellví de Rosanes',12),(221,'El Catllar',40),(222,'Cava',4),(223,'La Cellera de Ter',38),(224,'Celrà',23),(225,'Centelles',28),(226,'Cercs',16),(227,'Cerdanyola del Vallès',43),(228,'Cervelló',12),(229,'Cervera',36),(230,'Cervià de les Garrigues',21),(231,'Cervià de Ter',23),(232,'Cistella',2),(233,'Ciutadilla',42),(234,'Clariana de Cardener',39),(235,'El Cogul',21),(236,'Colera',2),(237,'Coll de Nargó',4),(238,'Collbató',12),(239,'Colldejou',9),(240,'Collsuspina',25),(241,'Colomers',11),(242,'La Coma i la Pedra',39),(243,'Conca de Dalt',30),(244,'Conesa',19),(245,'Constantí',40),(246,'Copons',6),(247,'Corbera de Llobregat',12),(248,'Corbera d\'Ebre',41),(249,'Corbins',37),(250,'Corçà',11),(251,'Cornellà de Llobregat',12),(252,'Cornellà del Terri',31),(253,'Cornudella de Montsant',33),(254,'Creixell',40),(255,'Crespià',31),(256,'Cruïlles, Monells i Sant Sadurní de l\'Heura',11),(257,'Cubelles',20),(258,'Cubells',27),(259,'Cunit',13),(260,'Darnius',2),(261,'Das',17),(262,'Deltebre',10),(263,'Dosrius',24),(264,'Duesaigües',9),(265,'L\'Escala',2),(266,'Esparreguera',12),(267,'Espinelves',29),(268,'L\'Espluga Calba',21),(269,'L\'Espluga de Francolí',19),(270,'Esplugues de Llobregat',12),(271,'Espolla',2),(272,'Esponellà',31),(273,'Espot',45),(274,'L\'Espunyola',16),(275,'L\'Esquirol',28),(276,'Estamariu',4),(277,'L\'Estany',25),(278,'Estaràs',36),(279,'Esterri d\'Àneu',45),(280,'Esterri de Cardós',45),(281,'Falset',33),(282,'El Far d\'Empordà',2),(283,'Farrera',45),(284,'La Fatarella',41),(285,'La Febró',9),(286,'Figaró-Montmany',44),(287,'Fígols',16),(288,'Fígols i Alinyà',4),(289,'La Figuera',33),(290,'Figueres',2),(291,'Figuerola del Camp',1),(292,'Flaçà',23),(293,'Flix',34),(294,'La Floresta',21),(295,'Fogars de la Selva',38),(296,'Fogars de Montclús',44),(297,'Foixà',11),(298,'Folgueroles',28),(299,'Fondarella',32),(300,'Fonollosa',8),(301,'Fontanals de Cerdanya',17),(302,'Fontanilles',11),(303,'Fontcoberta',31),(304,'Font-rubí',3),(305,'Foradada',27),(306,'Forallac',11),(307,'Forès',19),(308,'Fornells de la Selva',23),(309,'Fortià',2),(310,'Les Franqueses del Vallès',44),(311,'Freginals',26),(312,'La Fuliola',42),(313,'Fulleda',21),(314,'Gaià',8),(315,'La Galera',26),(316,'Gallifa',43),(317,'Gandesa',41),(318,'Garcia',34),(319,'Els Garidells',1),(320,'La Garriga',44),(321,'Garrigàs',2),(322,'Garrigoles',11),(323,'Garriguella',2),(324,'Gavà',12),(325,'Gavet de la Conca',30),(326,'Gelida',3),(327,'Ger',17),(328,'Gimenells i el Pla de la Font',37),(329,'Ginestar',34),(330,'Girona',23),(331,'Gironella',16),(332,'Gisclareny',16),(333,'Godall',26),(334,'Golmés',32),(335,'Gombrèn',35),(336,'Gósol',16),(337,'La Granada',3),(338,'La Granadella',21),(339,'Granera',25),(340,'La Granja d\'Escarp',37),(341,'Granollers',44),(342,'Granyanella',36),(343,'Granyena de les Garrigues',21),(344,'Granyena de Segarra',36),(345,'Gratallops',33),(346,'Gualba',44),(347,'Gualta',11),(348,'Guardiola de Berguedà',16),(349,'Els Guiamets',33),(350,'Guils de Cerdanya',17),(351,'Guimerà',42),(352,'La Guingueta d\'Àneu',45),(353,'Guissona',36),(354,'Guixers',39),(355,'Gurb',28),(356,'Horta de Sant Joan',41),(357,'L\'Hospitalet de Llobregat',14),(358,'Els Hostalets de Pierola',6),(359,'Hostalric',38),(360,'Igualada',6),(361,'Isona i Conca Dellà',30),(362,'Isòvol',17),(363,'Ivars de Noguera',27),(364,'Ivars d\'Urgell',32),(365,'Ivorra',36),(366,'Jafre',11),(367,'La Jonquera',2),(368,'Jorba',6),(369,'Josa i Tuixén',4),(370,'Juià',23),(371,'Juncosa',21),(372,'Juneda',21),(373,'Les',7),(374,'Linyola',32),(375,'La Llacuna',6),(376,'Lladó',2),(377,'Lladorre',45),(378,'Lladurs',39),(379,'La Llagosta',44),(380,'Llagostera',23),(381,'Llambilles',23),(382,'Llanars',35),(383,'Llançà',2),(384,'Llardecans',37),(385,'Llavorsí',45),(386,'Lleida',37),(387,'Llers',2),(388,'Lles de Cerdanya',18),(389,'Lliçà d\'Amunt',44),(390,'Lliçà de Vall',44),(391,'Llimiana',30),(392,'Llinars del Vallès',44),(393,'Llívia',17),(394,'El Lloar',33),(395,'Llobera',39),(396,'Llorac',19),(397,'Llorenç del Penedès',13),(398,'Lloret de Mar',38),(399,'Les Llosses',35),(400,'Lluçà',28),(401,'Maçanet de Cabrenys',2),(402,'Maçanet de la Selva',38),(403,'Madremanya',23),(404,'Maià de Montcal',22),(405,'Maials',37),(406,'Maldà',42),(407,'Malgrat de Mar',24),(408,'Malla',28),(409,'Manlleu',28),(410,'Manresa',8),(411,'Marçà',33),(412,'Margalef',33),(413,'Marganell',8),(414,'Martorell',12),(415,'Martorelles',44),(416,'Mas de Barberans',26),(417,'Masarac',2),(418,'Masdenverge',26),(419,'Les Masies de Roda',28),(420,'Les Masies de Voltregà',28),(421,'Masllorenç',13),(422,'El Masnou',24),(423,'La Masó',1),(424,'Maspujols',9),(425,'Masquefa',6),(426,'El Masroig',33),(427,'Massalcoreig',37),(428,'Massanes',38),(429,'Massoteres',36),(430,'Matadepera',43),(431,'Mataró',24),(432,'Mediona',3),(433,'Menàrguens',27),(434,'Meranges',17),(435,'Mieres',22),(436,'El Milà',1),(437,'Miralcamp',32),(438,'Miravet',34),(439,'Moià',25),(440,'El Molar',33),(441,'Molins de Rei',12),(442,'Mollerussa',32),(443,'Mollet de Peralada',2),(444,'Mollet del Vallès',44),(445,'Molló',35),(446,'La Molsosa',39),(447,'Monistrol de Calders',25),(448,'Monistrol de Montserrat',8),(449,'Montagut i Oix',22),(450,'Montblanc',19),(451,'Montbrió del Camp',9),(452,'Montcada i Reixac',43),(453,'Montclar',16),(454,'Montellà i Martinet',18),(455,'Montesquiu',28),(456,'Montferrer i Castellbò',4),(457,'Montferri',1),(458,'Montgai',27),(459,'Montgat',24),(460,'Montmajor',16),(461,'Montmaneu',6),(462,'El Montmell',13),(463,'Montmeló',44),(464,'Montoliu de Lleida',37),(465,'Montoliu de Segarra',36),(466,'Montornès de Segarra',36),(467,'Montornès del Vallès',44),(468,'Mont-ral',1),(469,'Mont-ras',11),(470,'Mont-roig del Camp',9),(471,'Montseny',44),(472,'Móra d\'Ebre',34),(473,'Móra la Nova',34),(474,'El Morell',40),(475,'La Morera de Montsant',33),(476,'Muntanyola',28),(477,'Mura',8),(478,'Nalec',42),(479,'Naut Aran',7),(480,'Navarcles',8),(481,'Navàs',8),(482,'Navata',2),(483,'Navès',39),(484,'La Nou de Berguedà',16),(485,'La Nou de Gaià',40),(486,'Nulles',1),(487,'Odèn',39),(488,'Òdena',6),(489,'Ogassa',35),(490,'Olèrdola',3),(491,'Olesa de Bonesvalls',3),(492,'Olesa de Montserrat',12),(493,'Oliana',4),(494,'Oliola',27),(495,'Olius',39),(496,'Olivella',20),(497,'Olost',28),(498,'Olot',22),(499,'Les Oluges',36),(500,'Olvan',16),(501,'Els Omellons',21),(502,'Els Omells de na Gaia',42),(503,'Ordis',2),(504,'Organyà',4),(505,'Orís',28),(506,'Oristà',28),(507,'Orpí',6),(508,'Òrrius',24),(509,'Os de Balaguer',27),(510,'Osor',38),(511,'Ossó de Sió',42),(512,'Pacs del Penedès',3),(513,'Palafolls',24),(514,'Palafrugell',11),(515,'Palamós',11),(516,'El Palau d\'Anglesola',32),(517,'Palau de Santa Eulàlia',2),(518,'Palau-sator',11),(519,'Palau-saverdera',2),(520,'Palau-solità i Plegamans',43),(521,'Els Pallaresos',40),(522,'Pallejà',12),(523,'La Palma de Cervelló',12),(524,'La Palma d\'Ebre',34),(525,'Palol de Revardit',31),(526,'Pals',11),(527,'El Papiol',12),(528,'Pardines',35),(529,'Parets del Vallès',44),(530,'Parlavà',11),(531,'Passanant i Belltall',19),(532,'Pau',2),(533,'Paüls',10),(534,'Pedret i Marzà',2),(535,'Penelles',27),(536,'La Pera',11),(537,'Perafita',28),(538,'Perafort',40),(539,'Peralada',2),(540,'Peramola',4),(541,'El Perelló',10),(542,'Piera',6),(543,'Les Piles',19),(544,'Pineda de Mar',24),(545,'El Pinell de Brai',41),(546,'Pinell de Solsonès',39),(547,'Pinós',39),(548,'Pira',19),(549,'El Pla de Santa Maria',1),(550,'El Pla del Penedès',3),(551,'Les Planes d\'Hostoles',22),(552,'Planoles',35),(553,'Els Plans de Sió',36),(554,'El Poal',32),(555,'La Pobla de Cérvoles',21),(556,'La Pobla de Claramunt',6),(557,'La Pobla de Lillet',16),(558,'La Pobla de Mafumet',40),(559,'La Pobla de Massaluca',41),(560,'La Pobla de Montornès',40),(561,'La Pobla de Segur',30),(562,'Poboleda',33),(563,'Polinyà',43),(564,'El Pont d\'Armentera',1),(565,'El Pont de Bar',4),(566,'Pont de Molins',2),(567,'El Pont de Suert',5),(568,'El Pont de Vilomara i Rocafort',8),(569,'Pontils',19),(570,'Pontons',3),(571,'Pontós',2),(572,'Ponts',27),(573,'Porqueres',31),(574,'Porrera',33),(575,'El Port de la Selva',2),(576,'Portbou',2),(577,'La Portella',37),(578,'Pradell de la Teixeta',33),(579,'Prades',9),(580,'Prat de Comte',41),(581,'El Prat de Llobregat',12),(582,'Pratdip',9),(583,'Prats de Lluçanès',28),(584,'Els Prats de Rei',6),(585,'Prats i Sansor',18),(586,'Preixana',42),(587,'Preixens',27),(588,'Premià de Dalt',24),(589,'Premià de Mar',24),(590,'Les Preses',22),(591,'Prullans',18),(592,'Puigcerdà',17),(593,'Puigdàlber',3),(594,'Puiggròs',21),(595,'Puigpelat',1),(596,'Puig-reig',16),(597,'Puigverd d\'Agramunt',42),(598,'Puigverd de Lleida',37),(599,'Pujalt',6),(600,'La Quar',16),(601,'Quart',23),(602,'Queralbs',35),(603,'Querol',1),(604,'Rabós',2),(605,'Rajadell',8),(606,'Rasquera',34),(607,'Regencós',11),(608,'Rellinars',43),(609,'Renau',40),(610,'Reus',9),(611,'Rialp',45),(612,'La Riba',1),(613,'Riba-roja d\'Ebre',34),(614,'Ribera d\'Ondara',36),(615,'Ribera d\'Urgellet',4),(616,'Ribes de Freser',35),(617,'Riells i Viabrea',38),(618,'La Riera de Gaià',40),(619,'Riner',39),(620,'Ripoll',35),(621,'Ripollet',43),(622,'Riu de Cerdanya',18),(623,'Riudarenes',38),(624,'Riudaura',22),(625,'Riudecanyes',9),(626,'Riudecols',9),(627,'Riudellots de la Selva',38),(628,'Riudoms',9),(629,'Riumors',2),(630,'La Roca del Vallès',44),(631,'Rocafort de Queralt',19),(632,'Roda de Berà',40),(633,'Roda de Ter',28),(634,'Rodonyà',1),(635,'Roquetes',10),(636,'Roses',2),(637,'Rosselló',37),(638,'El Rourell',1),(639,'Rubí',43),(640,'Rubió',6),(641,'Rupià',11),(642,'Rupit i Pruit',28),(643,'Sabadell',43),(644,'Sagàs',16),(645,'Salàs de Pallars',30),(646,'Saldes',16),(647,'Sales de Llierca',22),(648,'Sallent',8),(649,'Salomó',40),(650,'Salou',40),(651,'Salt',23),(652,'Sanaüja',36),(653,'Sant Adrià de Besòs',14),(654,'Sant Agustí de Lluçanès',28),(655,'Sant Andreu de la Barca',12),(656,'Sant Andreu de Llavaneres',24),(657,'Sant Andreu Salou',23),(658,'Sant Aniol de Finestres',22),(659,'Sant Antoni de Vilamajor',44),(660,'Sant Bartomeu del Grau',28),(661,'Sant Boi de Llobregat',12),(662,'Sant Boi de Lluçanès',28),(663,'Sant Carles de la Ràpita',26),(664,'Sant Cebrià de Vallalta',24),(665,'Sant Celoni',44),(666,'Sant Climent de Llobregat',12),(667,'Sant Climent Sescebes',2),(668,'Sant Cugat del Vallès',43),(669,'Sant Cugat Sesgarrigues',3),(670,'Sant Esteve de la Sarga',30),(671,'Sant Esteve de Palautordera',44),(672,'Sant Esteve Sesrovires',12),(673,'Sant Feliu de Buixalleu',38),(674,'Sant Feliu de Codines',44),(675,'Sant Feliu de Guíxols',11),(676,'Sant Feliu de Llobregat',12),(677,'Sant Feliu de Pallerols',22),(678,'Sant Feliu Sasserra',8),(679,'Sant Ferriol',22),(680,'Sant Fost de Campsentelles',44),(681,'Sant Fruitós de Bages',8),(682,'Sant Gregori',23),(683,'Sant Guim de Freixenet',36),(684,'Sant Guim de la Plana',36),(685,'Sant Hilari Sacalm',38),(686,'Sant Hipòlit de Voltregà',28),(687,'Sant Iscle de Vallalta',24),(688,'Sant Jaume de Frontanyà',16),(689,'Sant Jaume de Llierca',22),(690,'Sant Jaume dels Domenys',13),(691,'Sant Jaume d\'Enveja',26),(692,'Sant Joan de les Abadesses',35),(693,'Sant Joan de Mollet',23),(694,'Sant Joan de Vilatorrada',8),(695,'Sant Joan Despí',12),(696,'Sant Joan les Fonts',22),(697,'Sant Jordi Desvalls',23),(698,'Sant Julià de Cerdanyola',16),(699,'Sant Julià de Ramis',23),(700,'Sant Julià de Vilatorta',28),(701,'Sant Julià del Llor i Bonmatí',38),(702,'Sant Just Desvern',12),(703,'Sant Llorenç de la Muga',2),(704,'Sant Llorenç de Morunys',39),(705,'Sant Llorenç d\'Hortons',3),(706,'Sant Llorenç Savall',43),(707,'Sant Martí d\'Albars',28),(708,'Sant Martí de Centelles',28),(709,'Sant Martí de Llémena',23),(710,'Sant Martí de Riucorb',42),(711,'Sant Martí de Tous',6),(712,'Sant Martí Sarroca',3),(713,'Sant Martí Sesgueioles',6),(714,'Sant Martí Vell',23),(715,'Sant Mateu de Bages',8),(716,'Sant Miquel de Campmajor',31),(717,'Sant Miquel de Fluvià',2),(718,'Sant Mori',2),(719,'Sant Pau de Segúries',35),(720,'Sant Pere de Ribes',20),(721,'Sant Pere de Riudebitlles',3),(722,'Sant Pere de Torelló',28),(723,'Sant Pere de Vilamajor',44),(724,'Sant Pere Pescador',2),(725,'Sant Pere Sallavinera',6),(726,'Sant Pol de Mar',24),(727,'Sant Quintí de Mediona',3),(728,'Sant Quirze de Besora',28),(729,'Sant Quirze del Vallès',43),(730,'Sant Quirze Safaja',25),(731,'Sant Ramon',36),(732,'Sant Sadurní d\'Anoia',3),(733,'Sant Sadurní d\'Osormort',28),(734,'Sant Salvador de Guardiola',8),(735,'Sant Vicenç de Castellet',8),(736,'Sant Vicenç de Montalt',24),(737,'Sant Vicenç de Torelló',28),(738,'Sant Vicenç dels Horts',12),(739,'Santa Bàrbara',26),(740,'Santa Cecília de Voltregà',28),(741,'Santa Coloma de Cervelló',12),(742,'Santa Coloma de Farners',38),(743,'Santa Coloma de Gramenet',14),(744,'Santa Coloma de Queralt',19),(745,'Santa Cristina d\'Aro',11),(746,'Santa Eugènia de Berga',28),(747,'Santa Eulàlia de Riuprimer',28),(748,'Santa Eulàlia de Ronçana',44),(749,'Santa Fe del Penedès',3),(750,'Santa Llogaia d\'Àlguema',2),(751,'Santa Margarida de Montbui',6),(752,'Santa Margarida i els Monjos',3),(753,'Santa Maria de Besora',28),(754,'Santa Maria de Martorelles',44),(755,'Santa Maria de Merlès',16),(756,'Santa Maria de Miralles',6),(757,'Santa Maria de Palautordera',44),(758,'Santa Maria d\'Oló',25),(759,'Santa Oliva',13),(760,'Santa Pau',22),(761,'Santa Perpètua de Mogoda',43),(762,'Santa Susanna',24),(763,'Santpedor',8),(764,'Sarral',19),(765,'Sarrià de Ter',23),(766,'Sarroca de Bellera',30),(767,'Sarroca de Lleida',37),(768,'Saus, Camallera i Llampaies',2),(769,'Savallà del Comtat',19),(770,'La Secuita',40),(771,'La Selva de Mar',2),(772,'La Selva del Camp',9),(773,'Senan',19),(774,'La Sénia',26),(775,'Senterada',30),(776,'La Sentiu de Sió',27),(777,'Sentmenat',43),(778,'Serinyà',31),(779,'Seròs',37),(780,'Serra de Daró',11),(781,'Setcases',35),(782,'La Seu d\'Urgell',4),(783,'Seva',28),(784,'Sidamon',32),(785,'Sils',38),(786,'Sitges',20),(787,'Siurana',2),(788,'Sobremunt',28),(789,'El Soleràs',21),(790,'Solivella',19),(791,'Solsona',39),(792,'Sora',28),(793,'Soriguera',45),(794,'Sort',45),(795,'Soses',37),(796,'Subirats',3),(797,'Sudanell',37),(798,'Sunyer',37),(799,'Súria',8),(800,'Susqueda',38),(801,'Tagamanent',44),(802,'Talamanca',8),(803,'Talarn',30),(804,'Talavera',36),(805,'La Tallada d\'Empordà',11),(806,'Taradell',28),(807,'Tarragona',40),(808,'Tàrrega',42),(809,'Tarrés',21),(810,'Tarroja de Segarra',36),(811,'Tavèrnoles',28),(812,'Tavertet',28),(813,'Teià',24),(814,'Térmens',27),(815,'Terrades',2),(816,'Terrassa',43),(817,'Tiana',24),(818,'Tírvia',45),(819,'Tiurana',27),(820,'Tivenys',10),(821,'Tivissa',34),(822,'Tona',28),(823,'Torà',36),(824,'Tordera',24),(825,'Torelló',28),(826,'Els Torms',21),(827,'Tornabous',42),(828,'La Torre de Cabdella',30),(829,'La Torre de Claramunt',6),(830,'La Torre de Fontaubella',33),(831,'La Torre de l\'Espanyol',34),(832,'Torrebesses',37),(833,'Torredembarra',40),(834,'Torrefarrera',37),(835,'Torrefeta i Florejacs',36),(836,'Torregrossa',32),(837,'Torrelameu',27),(838,'Torrelavit',3),(839,'Torrelles de Foix',3),(840,'Torrelles de Llobregat',12),(841,'Torrent',11),(842,'Torres de Segre',37),(843,'Torre-serona',37),(844,'Torroella de Fluvià',2),(845,'Torroella de Montgrí',11),(846,'Torroja del Priorat',33),(847,'Tortellà',22),(848,'Tortosa',10),(849,'Toses',35),(850,'Tossa de Mar',38),(851,'Tremp',30),(852,'Ullà',11),(853,'Ullastrell',43),(854,'Ullastret',11),(855,'Ulldecona',26),(856,'Ulldemolins',33),(857,'Ultramort',11),(858,'Urús',17),(859,'Vacarisses',43),(860,'La Vajol',2),(861,'La Vall de Bianya',22),(862,'La Vall de Boí',5),(863,'Vall de Cardós',45),(864,'La Vall d\'en Bas',22),(865,'Vallbona d\'Anoia',6),(866,'Vallbona de les Monges',42),(867,'Vallcebre',16),(868,'Vallclara',19),(869,'Vallfogona de Balaguer',27),(870,'Vallfogona de Ripollès',35),(871,'Vallfogona de Riucorb',19),(872,'Vallgorguina',44),(873,'Vallirana',12),(874,'Vall-llobrega',11),(875,'Vallmoll',1),(876,'Vallromanes',44),(877,'Valls',1),(878,'Les Valls d\'Aguilar',4),(879,'Les Valls de Valira',4),(880,'Vandellòs i l\'Hospitalet de l\'Infant',9),(881,'La Vansa i Fórnols',4),(882,'Veciana',6),(883,'El Vendrell',13),(884,'Ventalló',2),(885,'Verdú',42),(886,'Verges',11),(887,'Vespella de Gaià',40),(888,'Vic',28),(889,'Vidrà',29),(890,'Vidreres',38),(891,'Vielha e Mijaran',7),(892,'Vilabella',1),(893,'Vilabertran',2),(894,'Vilablareix',23),(895,'Vilada',16),(896,'Viladamat',2),(897,'Viladasens',23),(898,'Viladecans',12),(899,'Viladecavalls',43),(900,'Vilademuls',31),(901,'Viladrau',29),(902,'Vilafant',2),(903,'Vilafranca del Penedès',3),(904,'Vilagrassa',42),(905,'Vilajuïga',2),(906,'Vilalba dels Arcs',41),(907,'Vilalba Sasserra',44),(908,'Vilaller',5),(909,'Vilallonga de Ter',35),(910,'Vilallonga del Camp',40),(911,'Vilamacolum',2),(912,'Vilamalla',2),(913,'Vilamaniscle',2),(914,'Vilamòs',7),(915,'Vilanant',2),(916,'Vilanova de Bellpuig',32),(917,'Vilanova de la Barca',37),(918,'Vilanova de l\'Aguda',27),(919,'Vilanova de Meià',27),(920,'Vilanova de Prades',19),(921,'Vilanova de Sau',28),(922,'Vilanova de Segrià',37),(923,'Vilanova del Camí',6),(924,'Vilanova del Vallès',44),(925,'Vilanova d\'Escornalbou',9),(926,'Vilanova i la Geltrú',20),(927,'Vilaplana',9),(928,'Vila-rodona',1),(929,'Vila-sacra',2),(930,'Vila-sana',32),(931,'Vila-seca',40),(932,'Vilassar de Dalt',24),(933,'Vilassar de Mar',24),(934,'Vilaür',2),(935,'Vilaverd',19),(936,'La Vilella Alta',33),(937,'La Vilella Baixa',33),(938,'Vilobí del Penedès',3),(939,'Vilobí d\'Onyar',38),(940,'Vilopriu',11),(941,'El Vilosell',21),(942,'Vimbodí i Poblet',19),(943,'Vinaixa',21),(944,'Vinebre',34),(945,'Vinyols i els Arcs',9),(946,'Viver i Serrateix',16),(947,'Xerta',10);
/*!40000 ALTER TABLE `municipis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincies`
--

DROP TABLE IF EXISTS `provincies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom_UNIQUE` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincies`
--

LOCK TABLES `provincies` WRITE;
/*!40000 ALTER TABLE `provincies` DISABLE KEYS */;
INSERT INTO `provincies` VALUES (1,'Barcelona'),(2,'Girona'),(3,'Lleida'),(4,'Tarragona');
/*!40000 ALTER TABLE `provincies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recursos`
--

DROP TABLE IF EXISTS `recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codi` varchar(45) DEFAULT NULL,
  `tipus_recurs_id` int(11) NOT NULL,
  `id_usuario` int(11),
  PRIMARY KEY (`id`),
  KEY `fk_recursos_tipus_recurs1_idx` (`tipus_recurs_id`),
  CONSTRAINT `fk_recursos_tipus_recurs1` FOREIGN KEY (`tipus_recurs_id`) REFERENCES `tipus_recurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_recursos_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuaris` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recursos`
--

LOCK TABLES `recursos` WRITE;
/*!40000 ALTER TABLE `recursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `recursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rols`
--

DROP TABLE IF EXISTS `rols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rols` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rols`
--

LOCK TABLES `rols` WRITE;
/*!40000 ALTER TABLE `rols` DISABLE KEYS */;
/*!40000 ALTER TABLE `rols` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipus_alertant`
--

DROP TABLE IF EXISTS `tipus_alertant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipus_alertant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipus` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipus_alertant`
--

LOCK TABLES `tipus_alertant` WRITE;
/*!40000 ALTER TABLE `tipus_alertant` DISABLE KEYS */;
INSERT INTO `tipus_alertant` VALUES (1,'Centre sanitari'),(2,'El propi afectat'),(3,'Entorn de l\'afectat'),(4,'Alertant VIP'),(5,'Alertant accidental');
/*!40000 ALTER TABLE `tipus_alertant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipus_incident`
--

DROP TABLE IF EXISTS `tipus_incident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipus_incident` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipus` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipus_UNIQUE` (`tipus`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipus_incident`
--

LOCK TABLES `tipus_incident` WRITE;
/*!40000 ALTER TABLE `tipus_incident` DISABLE KEYS */;
INSERT INTO `tipus_incident` VALUES (1,'Accidents i traumatismes'),(4,'Consulta mèdica'),(3,'Malaltia a domicili'),(2,'Malaltia a un lloc públic'),(5,'Transport sanitari');
/*!40000 ALTER TABLE `tipus_incident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipus_recurs`
--

DROP TABLE IF EXISTS `tipus_recurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipus_recurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipus` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipus_recurs`
--

LOCK TABLES `tipus_recurs` WRITE;
/*!40000 ALTER TABLE `tipus_recurs` DISABLE KEYS */;
INSERT INTO `tipus_recurs` VALUES (1,'Amb. Medicalitzada-Mike'),(2,'Amb. Sanitaritzada-India'),(3,'Amb. Assitencial-Tango'),(4,'Helicopter medicalitzat');
/*!40000 ALTER TABLE `tipus_recurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuaris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codi` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `contrasenya` varchar(256) DEFAULT NULL,
  `rols_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuaris_rols1_idx` (`rols_id`),
  CONSTRAINT `fk_usuaris_rols1` FOREIGN KEY (`rols_id`) REFERENCES `rols` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuaris`
--

LOCK TABLES `usuaris` WRITE;
/*!40000 ALTER TABLE `usuaris` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuaris` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-16  9:16:03
