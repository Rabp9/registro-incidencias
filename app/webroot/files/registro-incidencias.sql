CREATE DATABASE  IF NOT EXISTS `registro-incidencias` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `registro-incidencias`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: registro-incidencias
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_acos_lft_rght` (`lft`,`rght`),
  KEY `idx_acos_alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acos`
--
-- ORDER BY:  `id`

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` VALUES (1,NULL,NULL,NULL,'controllers',1,114),(2,1,NULL,NULL,'Componentes',2,15),(3,2,NULL,NULL,'index',3,4),(4,2,NULL,NULL,'add',5,6),(5,2,NULL,NULL,'view',7,8),(6,2,NULL,NULL,'edit',9,10),(7,2,NULL,NULL,'delete',11,12),(8,2,NULL,NULL,'getImagenByIdComponente',13,14),(9,1,NULL,NULL,'Cruces',16,29),(10,9,NULL,NULL,'index',17,18),(11,9,NULL,NULL,'view',19,20),(12,9,NULL,NULL,'add',21,22),(13,9,NULL,NULL,'edit',23,24),(14,9,NULL,NULL,'delete',25,26),(15,9,NULL,NULL,'get_cruces',27,28),(16,1,NULL,NULL,'Groups',30,37),(17,16,NULL,NULL,'index',31,32),(18,16,NULL,NULL,'view',33,34),(19,16,NULL,NULL,'add',35,36),(20,1,NULL,NULL,'Incidencias',38,47),(21,20,NULL,NULL,'index',39,40),(22,20,NULL,NULL,'add',41,42),(23,20,NULL,NULL,'view',43,44),(24,20,NULL,NULL,'delete',45,46),(25,1,NULL,NULL,'Pages',48,53),(26,25,NULL,NULL,'home',49,50),(27,25,NULL,NULL,'login',51,52),(28,1,NULL,NULL,'Reportes',54,71),(29,28,NULL,NULL,'index',55,56),(30,28,NULL,NULL,'cruce',57,58),(31,28,NULL,NULL,'getByCruce',59,60),(32,28,NULL,NULL,'tipo',61,62),(33,28,NULL,NULL,'getByTipo',63,64),(34,28,NULL,NULL,'componente',65,66),(35,28,NULL,NULL,'getByComponente',67,68),(36,28,NULL,NULL,'estadisticas',69,70),(37,1,NULL,NULL,'Tipos',72,83),(38,37,NULL,NULL,'index',73,74),(39,37,NULL,NULL,'add',75,76),(40,37,NULL,NULL,'view',77,78),(41,37,NULL,NULL,'edit',79,80),(42,37,NULL,NULL,'delete',81,82),(43,1,NULL,NULL,'Trabajadores',84,95),(44,43,NULL,NULL,'index',85,86),(45,43,NULL,NULL,'add',87,88),(46,43,NULL,NULL,'view',89,90),(47,43,NULL,NULL,'edit',91,92),(48,43,NULL,NULL,'delete',93,94),(49,1,NULL,NULL,'Users',96,111),(50,49,NULL,NULL,'initDB',97,98),(51,49,NULL,NULL,'add',99,100),(52,49,NULL,NULL,'login',101,102),(53,49,NULL,NULL,'logout',103,104),(54,49,NULL,NULL,'data',105,106),(55,49,NULL,NULL,'change_pass',107,108),(56,49,NULL,NULL,'datos',109,110),(57,1,NULL,NULL,'AclExtras',112,113);
/*!40000 ALTER TABLE `acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_aros_lft_rght` (`lft`,`rght`),
  KEY `idx_aros_alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros`
--
-- ORDER BY:  `id`

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` VALUES (1,NULL,'Group',1,NULL,1,2),(2,NULL,'Group',2,NULL,3,4);
/*!40000 ALTER TABLE `aros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`),
  KEY `idx_aco_id` (`aco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros_acos`
--
-- ORDER BY:  `id`

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` VALUES (1,1,1,'1','1','1','1'),(2,2,1,'1','1','1','1');
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `componentes`
--

DROP TABLE IF EXISTS `componentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `componentes` (
  `idComponente` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `observacion` varchar(500) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idComponente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `componentes`
--
-- ORDER BY:  `idComponente`

LOCK TABLES `componentes` WRITE;
/*!40000 ALTER TABLE `componentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `componentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `componentes_incidencias`
--

DROP TABLE IF EXISTS `componentes_incidencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `componentes_incidencias` (
  `idComponente` int(11) NOT NULL,
  `idIncidencia` int(11) NOT NULL,
  PRIMARY KEY (`idComponente`,`idIncidencia`),
  KEY `fk_detalleIncidenciasComponentes_componentes1_idx` (`idComponente`),
  KEY `fk_detalleIncidenciasComponentes_incidencias1_idx` (`idIncidencia`),
  CONSTRAINT `fk_detalleIncidenciasComponentes_componentes1` FOREIGN KEY (`idComponente`) REFERENCES `componentes` (`idComponente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalleIncidenciasComponentes_incidencias1` FOREIGN KEY (`idIncidencia`) REFERENCES `incidencias` (`idIncidencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `componentes_incidencias`
--
-- ORDER BY:  `idComponente`,`idIncidencia`

LOCK TABLES `componentes_incidencias` WRITE;
/*!40000 ALTER TABLE `componentes_incidencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `componentes_incidencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cruces`
--

DROP TABLE IF EXISTS `cruces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cruces` (
  `idCruce` varchar(4) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `observacion` varchar(800) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idCruce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cruces`
--
-- ORDER BY:  `idCruce`

LOCK TABLES `cruces` WRITE;
/*!40000 ALTER TABLE `cruces` DISABLE KEYS */;
/*!40000 ALTER TABLE `cruces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `idGroup` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idGroup`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--
-- ORDER BY:  `idGroup`

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Administrador','1'),(2,'Usuario','1');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidencias`
--

DROP TABLE IF EXISTS `incidencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencias` (
  `idIncidencia` int(11) NOT NULL AUTO_INCREMENT,
  `idCruce` varchar(4) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `fecha` date DEFAULT NULL,
  `diagnostico` varchar(900) NOT NULL,
  `accion` varchar(900) NOT NULL,
  `resultado` varchar(900) NOT NULL,
  `observacion` varchar(900) DEFAULT NULL,
  `created` date NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idIncidencia`,`idCruce`,`idUsuario`),
  KEY `fk_incidencias_cruces1_idx` (`idCruce`),
  KEY `fk_incidencias_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `fk_incidencias_cruces1` FOREIGN KEY (`idCruce`) REFERENCES `cruces` (`idCruce`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencias_usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencias`
--
-- ORDER BY:  `idIncidencia`,`idCruce`,`idUsuario`

LOCK TABLES `incidencias` WRITE;
/*!40000 ALTER TABLE `incidencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `incidencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidencias_tipos`
--

DROP TABLE IF EXISTS `incidencias_tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencias_tipos` (
  `idTipo` int(11) NOT NULL,
  `idIncidencia` int(11) NOT NULL,
  PRIMARY KEY (`idTipo`,`idIncidencia`),
  KEY `fk_detalleIncidenciasTipos_incidencias1_idx` (`idIncidencia`),
  CONSTRAINT `fk_detalleIncidenciasTipos_incidencias1` FOREIGN KEY (`idIncidencia`) REFERENCES `incidencias` (`idIncidencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalleIncidenciasTipos_tipos1` FOREIGN KEY (`idTipo`) REFERENCES `tipos` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencias_tipos`
--
-- ORDER BY:  `idTipo`,`idIncidencia`

LOCK TABLES `incidencias_tipos` WRITE;
/*!40000 ALTER TABLE `incidencias_tipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `incidencias_tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidencias_trabajadores`
--

DROP TABLE IF EXISTS `incidencias_trabajadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencias_trabajadores` (
  `idTrabajador` int(11) NOT NULL,
  `idIncidencia` int(11) NOT NULL,
  PRIMARY KEY (`idTrabajador`,`idIncidencia`),
  KEY `fk_trabajadores_has_incidencias_incidencias1_idx` (`idIncidencia`),
  KEY `fk_trabajadores_has_incidencias_trabajadores1_idx` (`idTrabajador`),
  CONSTRAINT `fk_trabajadores_has_incidencias_incidencias1` FOREIGN KEY (`idIncidencia`) REFERENCES `incidencias` (`idIncidencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_trabajadores_has_incidencias_trabajadores1` FOREIGN KEY (`idTrabajador`) REFERENCES `trabajadores` (`idTrabajador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencias_trabajadores`
--
-- ORDER BY:  `idTrabajador`,`idIncidencia`

LOCK TABLES `incidencias_trabajadores` WRITE;
/*!40000 ALTER TABLE `incidencias_trabajadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `incidencias_trabajadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos`
--

DROP TABLE IF EXISTS `tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos`
--
-- ORDER BY:  `idTipo`

LOCK TABLES `tipos` WRITE;
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajadores`
--

DROP TABLE IF EXISTS `trabajadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajadores` (
  `idTrabajador` int(11) NOT NULL AUTO_INCREMENT,
  `dni` char(8) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidoPaterno` varchar(100) NOT NULL,
  `apellidoMaterno` varchar(100) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idTrabajador`),
  UNIQUE KEY `dni_UNIQUE` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajadores`
--
-- ORDER BY:  `idTrabajador`

LOCK TABLES `trabajadores` WRITE;
/*!40000 ALTER TABLE `trabajadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idGroup` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(120) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idUsuario`,`idGroup`),
  KEY `fk_users_groups1_idx` (`idGroup`),
  CONSTRAINT `fk_users_groups1` FOREIGN KEY (`idGroup`) REFERENCES `groups` (`idGroup`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--
-- ORDER BY:  `idUsuario`,`idGroup`

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin','$2a$10$MYmrboPap4XtCyvTEkKlAuxwDdZFEGeu9BYHceinP8nCrv9nvFEwm','1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-27  8:58:06
