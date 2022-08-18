SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS serviciosocial;

USE serviciosocial;

DROP TABLE IF EXISTS administrador;

CREATE TABLE `administrador` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(50) DEFAULT NULL,
  `correoAdmin` varchar(50) DEFAULT NULL,
  `passwordAdmin` varchar(150) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO administrador VALUES("1","admin","admin@gmail.com","$2y$10$.u5MTdENjvKawhhOnCM5qeWsAuTIbpd7LQliKcBz7VBG/afBwJixe","1");



DROP TABLE IF EXISTS altalumno;

CREATE TABLE `altalumno` (
  `idAlta` int(11) NOT NULL AUTO_INCREMENT,
  `matriculaProfesor` varchar(50) DEFAULT NULL,
  `matriculaAlumno` varchar(50) DEFAULT NULL,
  `estadoliberacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAlta`),
  KEY `matriculaProfesor` (`matriculaProfesor`),
  KEY `matriculaAlumno` (`matriculaAlumno`),
  CONSTRAINT `altalumno_ibfk_1` FOREIGN KEY (`matriculaProfesor`) REFERENCES `profesores` (`matriculaProfesor`),
  CONSTRAINT `altalumno_ibfk_2` FOREIGN KEY (`matriculaAlumno`) REFERENCES `alumnos` (`matriculaAlumno`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO altalumno VALUES("2","SHJU84","VVFH22SERSO","1");
INSERT INTO altalumno VALUES("3","SHJU84","GVEH22SERSO","0");
INSERT INTO altalumno VALUES("6","SHJU84","MVAH22SERSO","0");
INSERT INTO altalumno VALUES("8","LSSA22","JHGM22SERSO","0");



DROP TABLE IF EXISTS alumnos;

CREATE TABLE `alumnos` (
  `matriculaAlumno` varchar(50) NOT NULL,
  `nombreAlumno` varchar(50) DEFAULT NULL,
  `apellidoPpaterno` varchar(30) DEFAULT NULL,
  `apellidoMaterno` varchar(30) DEFAULT NULL,
  `correAlumno` varchar(50) DEFAULT NULL,
  `passwordAlumno` varchar(100) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `telefonoAlumno` varchar(50) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `proceso` varchar(50) DEFAULT NULL,
  `idPrograma` int(11) DEFAULT NULL,
  `cuatrimestre` int(11) DEFAULT NULL,
  `grupo` varchar(1) DEFAULT NULL,
  `generacion` varchar(50) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`matriculaAlumno`),
  KEY `idPrograma` (`idPrograma`),
  CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`idPrograma`) REFERENCES `programaeducativo` (`idPrograma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO alumnos VALUES("GVEH22SERSO","Eliel","Gonzalez","Velazquez","gveh22serso@upemor.edu.mx","GVEH22SERSO","2022-08-04","2022-09-09","7771523625","Hombre","Servicio social","1","10","C","2018-2022","3");
INSERT INTO alumnos VALUES("JHGM22SERSO","Gloria Noemi","López","Hernandez","jhgm22serso@upemor.edu.mx","JHGM22SERSO","2022-02-02","2022-05-02","7775912717","Mujer","Servicio social","2","8","A","2018-2021","3");
INSERT INTO alumnos VALUES("MVAH22SERSO","Axel","Mazanares","Valladares","mvah22serso@upemor.edu.mx","MVAH22SERSO","2022-08-01","2022-08-27","7772564895","Hombre","Servicio social","2","1","A","2018-2021","3");
INSERT INTO alumnos VALUES("OMRM22SERSO","Rocio Arely","Oviedo","Marquina","omrm22serso@upemor.edu.mx","OMRM22SERSO","2022-08-01","2022-09-03","7772564895","Mujer","Servicio social","1","12","B","2018-2021","3");
INSERT INTO alumnos VALUES("VVFH22SERSO","Fernando","Villegas","Vazquez","vvfh22serso@upemor.edu.mx","$2y$10$QGRNBsnW9pw1zJlj3yZkQu/6XDCTS/fBPB/EOUSwLDXmuZbUTM6T6","2022-05-02","2022-09-10","7772564895","Hombre","Servicio social","1","9","C","2020-2023","3");



DROP TABLE IF EXISTS asignacion;

CREATE TABLE `asignacion` (
  `idAsignacion` int(11) NOT NULL AUTO_INCREMENT,
  `actividadRealizar` varchar(500) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `idAlta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAsignacion`),
  KEY `idAlta` (`idAlta`),
  CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`idAlta`) REFERENCES `altalumno` (`idAlta`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO asignacion VALUES("7","Realizar copias de los formatos de asistencia","2022-08-30","100","2");
INSERT INTO asignacion VALUES("8","Organizar archivero","2022-08-31","100","2");
INSERT INTO asignacion VALUES("9","Realizar mantenimiento a la impresora","2022-09-02","0","3");
INSERT INTO asignacion VALUES("10","Mantenimiento a equipos de computo","2022-08-22","0","2");



DROP TABLE IF EXISTS evaluacionalumno;

CREATE TABLE `evaluacionalumno` (
  `idEvaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `ev1` varchar(10) DEFAULT NULL,
  `ev2` varchar(10) DEFAULT NULL,
  `ev3` varchar(10) DEFAULT NULL,
  `ev4` varchar(10) DEFAULT NULL,
  `ev5` varchar(10) DEFAULT NULL,
  `ev6` varchar(10) DEFAULT NULL,
  `ev7` varchar(10) DEFAULT NULL,
  `ev8` varchar(10) DEFAULT NULL,
  `ev9` varchar(10) DEFAULT NULL,
  `ev10` varchar(10) DEFAULT NULL,
  `ev11` varchar(10) DEFAULT NULL,
  `ev12` varchar(10) DEFAULT NULL,
  `ev13` varchar(10) DEFAULT NULL,
  `ev14` varchar(10) DEFAULT NULL,
  `ev15` varchar(50) DEFAULT NULL,
  `ev16` varchar(10) DEFAULT NULL,
  `ev17` varchar(10) DEFAULT NULL,
  `ev18` varchar(50) DEFAULT NULL,
  `ev19` varchar(50) DEFAULT NULL,
  `idAlta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEvaluacion`),
  KEY `idAlta` (`idAlta`),
  CONSTRAINT `evaluacionalumno_ibfk_1` FOREIGN KEY (`idAlta`) REFERENCES `altalumno` (`idAlta`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO evaluacionalumno VALUES("9","6","6","6","6","6","6","6","6","6","6","6","6","6","6","Preparar futuro profesional","Si","Si","por que si","ninguno","2");



DROP TABLE IF EXISTS evaluacionunidad;

CREATE TABLE `evaluacionunidad` (
  `idEvaluacionUnidad` int(11) NOT NULL AUTO_INCREMENT,
  `pre1` varchar(10) DEFAULT NULL,
  `pre2` varchar(10) DEFAULT NULL,
  `pre3` varchar(10) DEFAULT NULL,
  `pre4` varchar(10) DEFAULT NULL,
  `pre5` varchar(10) DEFAULT NULL,
  `pre6` varchar(10) DEFAULT NULL,
  `pre7` varchar(10) DEFAULT NULL,
  `pre8` varchar(10) DEFAULT NULL,
  `pre9` varchar(10) DEFAULT NULL,
  `idUnidad` int(11) DEFAULT NULL,
  `matriculaAlumno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idEvaluacionUnidad`),
  KEY `matriculaAlumno` (`matriculaAlumno`),
  KEY `idUnidad` (`idUnidad`),
  CONSTRAINT `evaluacionunidad_ibfk_1` FOREIGN KEY (`matriculaAlumno`) REFERENCES `alumnos` (`matriculaAlumno`),
  CONSTRAINT `evaluacionunidad_ibfk_2` FOREIGN KEY (`idUnidad`) REFERENCES `unidadreceptora` (`idUnidad`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS imagenes;

CREATE TABLE `imagenes` (
  `idImg` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `lugarImg` varchar(30) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idImg`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO imagenes VALUES("1","Lobos rojos","logotipo","1","../vista/imagenes/images.png");
INSERT INTO imagenes VALUES("2","Oferta educativa","Primera","1","../vista/imagenes/upemor-1.jpg");
INSERT INTO imagenes VALUES("3","Instalaciones","Segunda","1","../vista/imagenes/Upemor_2.jpg");
INSERT INTO imagenes VALUES("4","Laboratorios","Tercera","1","../vista/imagenes/upemor.jpg");
INSERT INTO imagenes VALUES("5","Logo upemor","logotipo","0","../vista/imagenes/jose.jpg");



DROP TABLE IF EXISTS profesores;

CREATE TABLE `profesores` (
  `matriculaProfesor` varchar(50) NOT NULL,
  `nombreProfesor` varchar(50) DEFAULT NULL,
  `apellidoPaterno` varchar(50) DEFAULT NULL,
  `apellidoMmaterno` varchar(50) DEFAULT NULL,
  `correProfesor` varchar(50) DEFAULT NULL,
  `passwordProfesor` varchar(100) DEFAULT NULL,
  `generoProfesor` varchar(50) DEFAULT NULL,
  `puestoProfesor` varchar(50) DEFAULT NULL,
  `fechaNacProfesor` date DEFAULT NULL,
  `idUnidad` int(11) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`matriculaProfesor`),
  KEY `idUnidad` (`idUnidad`),
  CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`idUnidad`) REFERENCES `unidadreceptora` (`idUnidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO profesores VALUES("LSSA22","Sandra Elizabeth","Leon","Sosa","lssa22@upemor.edu.mx","LSSA22","Mujer","Profesor de tiempo completo","2022-08-23","4","2");
INSERT INTO profesores VALUES("SHJU84","Juan Paulo","Sanchez","Hernandez","shju84@upemor.edu.mx","$2y$10$ldYzyG5HuQQtxnu5o4g49OLiwx1XDr4BjiXFlLNTP/gpUphXEPNaW","Hombre","Profesor de tiempo completo","1984-05-14","1","2");



DROP TABLE IF EXISTS programaeducativo;

CREATE TABLE `programaeducativo` (
  `idPrograma` int(11) NOT NULL AUTO_INCREMENT,
  `carrera` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idPrograma`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO programaeducativo VALUES("1","Ingeniería en tecnologías de la información");
INSERT INTO programaeducativo VALUES("2","Ingeniería en tecnología ambiental");
INSERT INTO programaeducativo VALUES("5","Ingeniería en electrónica y telecomunicaciones");



DROP TABLE IF EXISTS registroactividades;

CREATE TABLE `registroactividades` (
  `idReActividad` int(11) NOT NULL AUTO_INCREMENT,
  `resumen` varchar(1000) DEFAULT NULL,
  `apoyo` varchar(50) DEFAULT NULL,
  `medio` varchar(50) DEFAULT NULL,
  `idAlta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idReActividad`),
  KEY `idAlta` (`idAlta`),
  CONSTRAINT `registroactividades_ibfk_1` FOREIGN KEY (`idAlta`) REFERENCES `altalumno` (`idAlta`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO registroactividades VALUES("4","Apoyo en el area adimistrativa","No","Un Amigo o familiar","3");
INSERT INTO registroactividades VALUES("13","Apoyo en el área de laboratorios de computación ","No","Un amigo o familiar","2");



DROP TABLE IF EXISTS unidadreceptora;

CREATE TABLE `unidadreceptora` (
  `idUnidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUnidad` varchar(50) DEFAULT NULL,
  `domicilioUni` varchar(70) DEFAULT NULL,
  `telefonoUni` varchar(10) DEFAULT NULL,
  `giroEmpresarial` varchar(50) DEFAULT NULL,
  `numTrabajadores` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idUnidad`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO unidadreceptora VALUES("1","Instituto Nacional Electoral","Pedregal de las fuentes","7771256459","Grande","251");
INSERT INTO unidadreceptora VALUES("2","MTC Center","Av domingo diez","7771458956","Mediana","51-250");
INSERT INTO unidadreceptora VALUES("4","Universidad Politécnica del estado de Morelos","Texcal jiutepec","7772345689","Mediana","51-250");
INSERT INTO unidadreceptora VALUES("8","NISSAN","Civac","7771234567","Grande","300");



SET FOREIGN_KEY_CHECKS=1;