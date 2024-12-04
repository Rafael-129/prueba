CREATE DATABASE eduplusx;
USE eduplusx;

-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: eduplus5
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno` (
  `idAlumno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idAlumno`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnocurso`
--

DROP TABLE IF EXISTS `alumnocurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnocurso` (
  `idAlumno` int(10) unsigned NOT NULL,
  `idCurso` int(10) unsigned NOT NULL,
  `añoEscolar` date NOT NULL,
  `estado` varchar(255) NOT NULL,
  PRIMARY KEY (`idAlumno`,`idCurso`),
  KEY `idCurso` (`idCurso`),
  CONSTRAINT `alumnocurso_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`idAlumno`),
  CONSTRAINT `alumnocurso_ibfk_2` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`idCursos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnocurso`
--

LOCK TABLES `alumnocurso` WRITE;
/*!40000 ALTER TABLE `alumnocurso` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumnocurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anuncios`
--

DROP TABLE IF EXISTS `anuncios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anuncios` (
  `idAnuncio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fechaPublicada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idProfesor` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idAnuncio`),
  KEY `idProfesor` (`idProfesor`),
  CONSTRAINT `anuncios_ibfk_1` FOREIGN KEY (`idProfesor`) REFERENCES `profesor` (`idProfesor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anuncios`
--

LOCK TABLES `anuncios` WRITE;
/*!40000 ALTER TABLE `anuncios` DISABLE KEYS */;
/*!40000 ALTER TABLE `anuncios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consultas` (
  `idConsultas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `fechaEnvio` timestamp NOT NULL DEFAULT current_timestamp(),
  `respuesta` text NOT NULL,
  `fechaRespuesta` timestamp NOT NULL DEFAULT current_timestamp(),
  `idEstadoConsulta` int(10) unsigned NOT NULL,
  `idProfesor` int(10) unsigned NOT NULL,
  `idAlumno` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idConsultas`),
  KEY `idEstadoConsulta` (`idEstadoConsulta`),
  KEY `idProfesor` (`idProfesor`),
  KEY `idAlumno` (`idAlumno`),
  CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`idEstadoConsulta`) REFERENCES `estadoconsulta` (`idEstadoConsulta`),
  CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`idProfesor`) REFERENCES `profesor` (`idProfesor`),
  CONSTRAINT `consultas_ibfk_3` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`idAlumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursos` (
  `idCursos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombreCurso` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idCursos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dia`
--

DROP TABLE IF EXISTS `dia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dia` (
  `idDia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idDia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dia`
--

LOCK TABLES `dia` WRITE;
/*!40000 ALTER TABLE `dia` DISABLE KEYS */;
/*!40000 ALTER TABLE `dia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disponibilidadprof`
--

DROP TABLE IF EXISTS `disponibilidadprof`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `disponibilidadprof` (
  `idDisponibilidadProf` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idDia` int(10) unsigned NOT NULL,
  `idProfesor` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idDisponibilidadProf`),
  KEY `idDia` (`idDia`),
  KEY `idProfesor` (`idProfesor`),
  CONSTRAINT `disponibilidadprof_ibfk_1` FOREIGN KEY (`idDia`) REFERENCES `dia` (`idDia`),
  CONSTRAINT `disponibilidadprof_ibfk_2` FOREIGN KEY (`idProfesor`) REFERENCES `profesor` (`idProfesor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disponibilidadprof`
--

LOCK TABLES `disponibilidadprof` WRITE;
/*!40000 ALTER TABLE `disponibilidadprof` DISABLE KEYS */;
/*!40000 ALTER TABLE `disponibilidadprof` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadoconsulta`
--

DROP TABLE IF EXISTS `estadoconsulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estadoconsulta` (
  `idEstadoConsulta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) NOT NULL,
  PRIMARY KEY (`idEstadoConsulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadoconsulta`
--

LOCK TABLES `estadoconsulta` WRITE;
/*!40000 ALTER TABLE `estadoconsulta` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadoconsulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadoreserva`
--

DROP TABLE IF EXISTS `estadoreserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estadoreserva` (
  `idEstadoReserva` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) NOT NULL,
  PRIMARY KEY (`idEstadoReserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadoreserva`
--

LOCK TABLES `estadoreserva` WRITE;
/*!40000 ALTER TABLE `estadoreserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadoreserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horario` (
  `idHorario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seccion` varchar(255) NOT NULL,
  `horarioInicio` time NOT NULL,
  `horarioFin` time NOT NULL,
  `aula` varchar(255) NOT NULL,
  `idDia` int(10) unsigned NOT NULL,
  `idAlumno` int(10) unsigned NOT NULL,
  `idProfesor` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idHorario`),
  KEY `idDia` (`idDia`),
  KEY `idAlumno` (`idAlumno`),
  KEY `idProfesor` (`idProfesor`),
  CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`idDia`) REFERENCES `dia` (`idDia`),
  CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`idAlumno`),
  CONSTRAINT `horario_ibfk_3` FOREIGN KEY (`idProfesor`) REFERENCES `profesor` (`idProfesor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notas` (
  `idNotas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `materia` varchar(255) NOT NULL,
  `nota` decimal(8,2) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idProfesor` int(10) unsigned NOT NULL,
  `idAlumnos` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idNotas`),
  KEY `idProfesor` (`idProfesor`),
  KEY `idAlumnos` (`idAlumnos`),
  CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`idProfesor`) REFERENCES `profesor` (`idProfesor`),
  CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`idAlumnos`) REFERENCES `alumno` (`idAlumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profesor` (
  `idProfesor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departamento` varchar(255) NOT NULL,
  `especialidad` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idProfesor`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reserva` (
  `idReservas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fechaReserva` date NOT NULL,
  `horaReserva` time NOT NULL,
  `idEstadoReserva` int(10) unsigned NOT NULL,
  `idProfesor` int(10) unsigned NOT NULL,
  `idAlumno` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idReservas`),
  KEY `idEstadoReserva` (`idEstadoReserva`),
  KEY `idProfesor` (`idProfesor`),
  KEY `idAlumno` (`idAlumno`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`idEstadoReserva`) REFERENCES `estadoreserva` (`idEstadoReserva`),
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`idProfesor`) REFERENCES `profesor` (`idProfesor`),
  CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`idAlumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `idRol` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DNI` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idRol` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idRol` (`idRol`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
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

-- Dump completed on 2024-11-14 16:37:29

DROP TABLE IF EXISTS `grado`;
CREATE TABLE grado (
    idGrado VARCHAR(50) PRIMARY KEY
);

ALTER TABLE alumno
ADD COLUMN idGrado VARCHAR(50),
ADD CONSTRAINT fk_grado_alumno FOREIGN KEY (idGrado) REFERENCES grado(idGrado);

ALTER TABLE profesor
ADD COLUMN idGrado VARCHAR(50),
ADD CONSTRAINT fk_grado_profesor FOREIGN KEY (idGrado) REFERENCES grado(idGrado);