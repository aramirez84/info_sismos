SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `sismos` DEFAULT CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci ;

USE `sismos`;

CREATE  TABLE IF NOT EXISTS `sismos`.`Nivel_dano` (
  `idNivel_dano` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre_dano` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`idNivel_dano`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = ucs2
COLLATE = ucs2_spanish2_ci;

CREATE  TABLE IF NOT EXISTS `sismos`.`Vivienda` (
  `idVivienda` INT(11) NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(45) NULL DEFAULT NULL ,
  `Nivel_dano_idNivel_dano` INT(11) NOT NULL ,
  `Tipo_dano_idTipo_dano` INT(11) NOT NULL ,
  `Marcadores_idMarcadores` INT(11) NOT NULL ,
  `Municipio_idMunicipio` INT(11) NOT NULL ,
  `Delegacion_idDelegacion` INT(11) NOT NULL ,
  `nombre` VARCHAR(60) NULL DEFAULT NULL ,
  `direccion` VARCHAR(45) NULL DEFAULT NULL ,
  `latitud` FLOAT(10,6) NULL DEFAULT NULL ,
  `longuitud` FLOAT(10,6) NULL DEFAULT NULL ,
  `tipo_comercio` VARCHAR(100) NULL DEFAULT NULL ,
  `descripcon` TEXT NULL DEFAULT NULL ,
  `Zona_idZona` INT(11) NOT NULL ,
  PRIMARY KEY (`idVivienda`) ,
  INDEX `fk_Vivienda_Nivel_dano_idx` (`Nivel_dano_idNivel_dano` ASC) ,
  INDEX `fk_Vivienda_Tipo_dano1_idx` (`Tipo_dano_idTipo_dano` ASC) ,
  INDEX `fk_Vivienda_Delegacion1_idx` (`Delegacion_idDelegacion` ASC) ,
  INDEX `fk_Vivienda_Zona1_idx` (`Zona_idZona` ASC) ,
  CONSTRAINT `fk_Vivienda_Nivel_dano`
    FOREIGN KEY (`Nivel_dano_idNivel_dano` )
    REFERENCES `sismos`.`Nivel_dano` (`idNivel_dano` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vivienda_Tipo_dano1`
    FOREIGN KEY (`Tipo_dano_idTipo_dano` )
    REFERENCES `sismos`.`Tipo_dano` (`idTipo_dano` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vivienda_Delegacion1`
    FOREIGN KEY (`Delegacion_idDelegacion` )
    REFERENCES `sismos`.`Deleg_Mun` (`idDelegacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vivienda_Zona1`
    FOREIGN KEY (`Zona_idZona` )
    REFERENCES `sismos`.`Zona` (`idZona` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = ucs2
COLLATE = ucs2_spanish2_ci;

CREATE  TABLE IF NOT EXISTS `sismos`.`Tipo_dano` (
  `idTipo_dano` INT(11) NOT NULL AUTO_INCREMENT ,
  `Tipo_dano` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`idTipo_dano`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = ucs2
COLLATE = ucs2_spanish2_ci;

CREATE  TABLE IF NOT EXISTS `sismos`.`Estados` (
  `idEstados` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre_estado` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idEstados`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = ucs2
COLLATE = ucs2_spanish2_ci;

CREATE  TABLE IF NOT EXISTS `sismos`.`Deleg_Mun` (
  `idDelegacion` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre_delegacion` VARCHAR(45) NULL DEFAULT NULL ,
  `Estados_idEstados` INT(11) NOT NULL ,
  PRIMARY KEY (`idDelegacion`) ,
  INDEX `fk_Delegacion_Estados1_idx` (`Estados_idEstados` ASC) ,
  CONSTRAINT `fk_Delegacion_Estados1`
    FOREIGN KEY (`Estados_idEstados` )
    REFERENCES `sismos`.`Estados` (`idEstados` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = ucs2
COLLATE = ucs2_spanish2_ci;

CREATE  TABLE IF NOT EXISTS `sismos`.`Zona` (
  `idZona` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`idZona`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = ucs2
COLLATE = ucs2_spanish2_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
