#
# DUMP FILE
#
# Database is ported from MS Access
#------------------------------------------------------------------
# Created using "MS Access to MySQL" form http://www.bullzip.com
# Program Version 5.4.274
#
# OPTIONS:
#   sourcefilename=C:\Users\aibar\Desktop\BD_bases.accdb
#   sourceusername=
#   sourcepassword=
#   sourcesystemdatabase=
#   destinationdatabase=movedb
#   storageengine=MyISAM
#   dropdatabase=0
#   createtables=1
#   unicode=1
#   autocommit=1
#   transferdefaultvalues=1
#   transferindexes=1
#   transferautonumbers=1
#   transferrecords=1
#   columnlist=1
#   tableprefix=
#   negativeboolean=0
#   ignorelargeblobs=0
#   memotype=LONGTEXT
#   datetimetype=DATETIME
#

CREATE DATABASE IF NOT EXISTS `movedb`;
USE `movedb`;

#
# Table structure for table 'especialidad'
#

DROP TABLE IF EXISTS `especialidad`;

CREATE TABLE `especialidad` (
  `idEspecialidad` INTEGER NOT NULL AUTO_INCREMENT, 
  `especialidad` VARCHAR(50), 
  PRIMARY KEY (`idEspecialidad`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'especialidad'
#

# 0 records

#
# Table structure for table 'estadoequipos'
#

DROP TABLE IF EXISTS `estadoequipos`;

CREATE TABLE `estadoequipos` (
  `idestado` INTEGER NOT NULL AUTO_INCREMENT, 
  `estado` VARCHAR(10), 
  PRIMARY KEY (`idestado`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'estadoequipos'
#

# 0 records

#
# Table structure for table 'impresoras'
#

DROP TABLE IF EXISTS `impresoras`;

CREATE TABLE `impresoras` (
  `idreferencia` INTEGER NOT NULL DEFAULT 0, 
  `tipo` VARCHAR(255), 
  `consumible` VARCHAR(255), 
  `numserie` VARCHAR(255), 
  `numinterno` VARCHAR(255), 
  `fechaentrada` DATETIME, 
  `fechabaja` DATETIME, 
  `garantia` TINYINT(3) UNSIGNED DEFAULT 0, 
  `idestado` INTEGER DEFAULT 0, 
  PRIMARY KEY (`idreferencia`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'impresoras'
#

# 0 records

#
# Table structure for table 'incidencias'
#

DROP TABLE IF EXISTS `incidencias`;

CREATE TABLE `incidencias` (
  `idincidencia` INTEGER NOT NULL AUTO_INCREMENT, 
  `idreferencia` INTEGER DEFAULT 0, 
  `fechaincidencia` DATETIME, 
  `incidencia` LONGTEXT, 
  `fechasolucion` DATETIME, 
  `solucion` LONGTEXT, 
  INDEX (`idreferencia`), 
  PRIMARY KEY (`idincidencia`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'incidencias'
#

# 0 records

#
# Table structure for table 'licencia'
#

DROP TABLE IF EXISTS `licencia`;

CREATE TABLE `licencia` (
  `idlicencia` INTEGER NOT NULL AUTO_INCREMENT, 
  `licencia` VARCHAR(50), 
  PRIMARY KEY (`idlicencia`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'licencia'
#

# 0 records

#
# Table structure for table 'marca'
#

DROP TABLE IF EXISTS `marca`;

CREATE TABLE `marca` (
  `idmarca` INTEGER NOT NULL AUTO_INCREMENT, 
  `marca` VARCHAR(100), 
  `idproveedor` INTEGER DEFAULT 0, 
  INDEX (`idproveedor`), 
  PRIMARY KEY (`idmarca`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'marca'
#

# 0 records

#
# Table structure for table 'marcaproveedor'
#

DROP TABLE IF EXISTS `marcaproveedor`;

CREATE TABLE `marcaproveedor` (
  `idmarca` INTEGER NOT NULL DEFAULT 0, 
  `idproveedor` INTEGER NOT NULL DEFAULT 0, 
  INDEX (`idproveedor`), 
  PRIMARY KEY (`idmarca`, `idproveedor`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'marcaproveedor'
#

# 0 records

#
# Table structure for table 'material'
#

DROP TABLE IF EXISTS `material`;

CREATE TABLE `material` (
  `idreferencia` INTEGER NOT NULL AUTO_INCREMENT, 
  `modelo` VARCHAR(255), 
  `idmarca` INTEGER DEFAULT 0, 
  `idusuario` INTEGER DEFAULT 0, 
  `idubicacion` INTEGER DEFAULT 0, 
  `observaciones` LONGTEXT, 
  INDEX (`idmarca`), 
  INDEX (`idubicacion`), 
  INDEX (`idusuario`), 
  PRIMARY KEY (`idreferencia`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'material'
#

# 0 records

#
# Table structure for table 'monitores'
#

DROP TABLE IF EXISTS `monitores`;

CREATE TABLE `monitores` (
  `idreferencia` INTEGER NOT NULL DEFAULT 0, 
  `tipo` VARCHAR(255), 
  `tamaño` VARCHAR(255), 
  `numserie` VARCHAR(255), 
  `numinterno` VARCHAR(255), 
  `fechaentrada` DATETIME, 
  `fechabaja` DATETIME, 
  `garantia` TINYINT(3) UNSIGNED DEFAULT 0, 
  `idestado` INTEGER DEFAULT 0, 
  PRIMARY KEY (`idreferencia`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'monitores'
#

# 0 records

#
# Table structure for table 'ordenadores'
#

DROP TABLE IF EXISTS `ordenadores`;

CREATE TABLE `ordenadores` (
  `idreferencia` INTEGER NOT NULL DEFAULT 0, 
  `placa` VARCHAR(255), 
  `procesador` VARCHAR(255), 
  `ram` VARCHAR(255), 
  `discoduro` VARCHAR(255), 
  `tarjetas` VARCHAR(255), 
  `ip` VARCHAR(255), 
  `dominio` VARCHAR(255), 
  `numserie` VARCHAR(255), 
  `numinterno` VARCHAR(255), 
  `fechaentrada` DATETIME, 
  `fechabaja` DATETIME, 
  `garantia` TINYINT(3) UNSIGNED DEFAULT 0, 
  `idestado` INTEGER DEFAULT 0, 
  PRIMARY KEY (`idreferencia`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'ordenadores'
#

# 0 records

#
# Table structure for table 'proveedores'
#

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `idproveedor` INTEGER NOT NULL AUTO_INCREMENT, 
  `proveedor` VARCHAR(100), 
  PRIMARY KEY (`idproveedor`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'proveedores'
#

# 0 records

#
# Table structure for table 'revisiones'
#

DROP TABLE IF EXISTS `revisiones`;

CREATE TABLE `revisiones` (
  `idrevision` INTEGER NOT NULL AUTO_INCREMENT, 
  `idreferencia` INTEGER DEFAULT 0, 
  `revisor` VARCHAR(255), 
  `fecharevision` DATETIME, 
  `observaciones` LONGTEXT, 
  INDEX (`idreferencia`), 
  INDEX (`revisor`), 
  PRIMARY KEY (`idrevision`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'revisiones'
#

# 0 records

#
# Table structure for table 'software'
#

DROP TABLE IF EXISTS `software`;

CREATE TABLE `software` (
  `idsoftware` INTEGER NOT NULL AUTO_INCREMENT, 
  `software` VARCHAR(100), 
  `idlicencia` INTEGER, 
  `codigolicencia` VARCHAR(16), 
  `cantidad` INTEGER DEFAULT 0, 
  `fechafin` DATETIME, 
  `observaciones` LONGTEXT, 
  PRIMARY KEY (`idsoftware`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'software'
#

# 0 records

#
# Table structure for table 'softwareinstalado'
#

DROP TABLE IF EXISTS `softwareinstalado`;

CREATE TABLE `softwareinstalado` (
  `idreferencia` INTEGER NOT NULL DEFAULT 0, 
  `idsoftware` INTEGER NOT NULL DEFAULT 0, 
  INDEX (`idsoftware`), 
  PRIMARY KEY (`idreferencia`, `idsoftware`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'softwareinstalado'
#

# 0 records

#
# Table structure for table 'ubicacion'
#

DROP TABLE IF EXISTS `ubicacion`;

CREATE TABLE `ubicacion` (
  `idubicacion` INTEGER NOT NULL AUTO_INCREMENT, 
  `ubicacion` VARCHAR(60), 
  PRIMARY KEY (`idubicacion`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'ubicacion'
#

# 0 records

#
# Table structure for table 'usuarios'
#

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idusuario` INTEGER NOT NULL AUTO_INCREMENT, 
  `nombre` VARCHAR(60), 
  `apellidos` VARCHAR(60), 
  `clave` VARCHAR(8), 
  `idespecialidad` INTEGER DEFAULT 0, 
  INDEX (`clave`), 
  INDEX (`idespecialidad`), 
  PRIMARY KEY (`idusuario`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'usuarios'
#

# 0 records

