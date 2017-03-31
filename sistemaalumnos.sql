#
# Structure for table "alumnos"
#

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE `alumnos` (
  `IdAlumnos` int(11) NOT NULL AUTO_INCREMENT,
  `Identidad` varchar(20) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  PRIMARY KEY (`IdAlumnos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "alumnos"
#

INSERT INTO `alumnos` VALUES (1,'1503','Luis Funez','9988-9988','luisfunez@gmail.com'),(2,'1519199000751','Jairo S. Galeas','88477528','jairogaleas@gmail.com');

#
# Structure for table "materias"
#

DROP TABLE IF EXISTS `materias`;
CREATE TABLE `materias` (
  `idmateria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(30) NOT NULL,
  `unidades` int(20) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmateria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "materias"
#

INSERT INTO `materias` VALUES (1,'Programacion I',4,3);

#
# Structure for table "tipo_usuario"
#

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario` (
  `idTipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`idTipousuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "tipo_usuario"
#

INSERT INTO `tipo_usuario` VALUES (1,'Administrador'),(2,'Usuario');

#
# Structure for table "usuarios"
#

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_tipousuario` int(11) NOT NULL,
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "usuarios"
#

INSERT INTO `usuarios` VALUES (2,'admin','d033e22ae348aeb5660fc2140aec35850c4da997',2,1),(3,'alumno','684b10ab8da41b83690bd96f9a846b9814d8a288',1,2);
