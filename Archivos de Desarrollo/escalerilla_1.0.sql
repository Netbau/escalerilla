SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `escalerilla` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `escalerilla` ;

-- -----------------------------------------------------
-- Table `escalerilla`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `escalerilla`.`usuarios` (
  `idUsuarios` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `segundoNombre` VARCHAR(45) NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  `segundoApellido` VARCHAR(45) NULL ,
  `correo` VARCHAR(45) NOT NULL ,
  `telefono` INT(8) NOT NULL ,
  `telefono2` INT(8) NULL ,
  `nivel` VARCHAR(45) NOT NULL DEFAULT '1' ,
  `foto` VARCHAR(250) NOT NULL DEFAULT 'http://www.theprprofessional.com/wp-content/uploads/2011/11/facebook-profile-picture.jpg' ,
  `password` VARCHAR(45) NOT NULL ,
  `fechaRegistro` DATETIME NOT NULL DEFAULT NOW() ,
  `edad` INT NOT NULL ,
  `sexo` BINARY NOT NULL ,
  PRIMARY KEY (`idUsuarios`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escalerilla`.`jugadores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `escalerilla`.`jugadores` (
  `idJugadores` INT NOT NULL AUTO_INCREMENT ,
  `ranking` INT NOT NULL ,
  `categoria` CHAR(1) NOT NULL ,
  `idUsuarios` INT NOT NULL ,
  `alDia` BINARY NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`idJugadores`) ,
  INDEX `fk_Jugadores_usuarios_idx` (`idUsuarios` ASC) ,
  CONSTRAINT `fk_Jugadores_usuarios`
    FOREIGN KEY (`idUsuarios` )
    REFERENCES `escalerilla`.`usuarios` (`idUsuarios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escalerilla`.`desafio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `escalerilla`.`desafio` (
  `idJugadores` INT NOT NULL ,
  `idJugadores1` INT NOT NULL ,
  `fecha` DATETIME NOT NULL ,
  `estado` ENUM('Pendiente','Concretado','WO') NOT NULL ,
  PRIMARY KEY (`idJugadores`, `idJugadores1`, `fecha`) ,
  INDEX `fk_Jugadores_has_Jugadores_Jugadores2_idx` (`idJugadores1` ASC) ,
  INDEX `fk_Jugadores_has_Jugadores_Jugadores1_idx` (`idJugadores` ASC) ,
  CONSTRAINT `fk_Jugadores_has_Jugadores_Jugadores1`
    FOREIGN KEY (`idJugadores` )
    REFERENCES `escalerilla`.`jugadores` (`idJugadores` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jugadores_has_Jugadores_Jugadores2`
    FOREIGN KEY (`idJugadores1` )
    REFERENCES `escalerilla`.`jugadores` (`idJugadores` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escalerilla`.`partido`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `escalerilla`.`partido` (
  `idPartido` INT NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`idPartido`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escalerilla`.`canchas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `escalerilla`.`canchas` (
  `idCanchas` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(60) NOT NULL ,
  PRIMARY KEY (`idCanchas`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escalerilla`.`resultadoEncuentro`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `escalerilla`.`resultadoEncuentro` (
  `idJugadores` INT NOT NULL ,
  `idJugadores1` INT NOT NULL ,
  `set1` VARCHAR(10) NOT NULL DEFAULT '0-0' ,
  `set2` VARCHAR(10) NOT NULL DEFAULT '0-0' ,
  `set3` VARCHAR(10) NULL ,
  `fecha` DATETIME NOT NULL ,
  `canchas_idCanchas` INT NOT NULL ,
  PRIMARY KEY (`idJugadores`, `idJugadores1`) ,
  INDEX `fk_jugadores_has_jugadores_jugadores2_idx` (`idJugadores1` ASC) ,
  INDEX `fk_jugadores_has_jugadores_jugadores1_idx` (`idJugadores` ASC) ,
  INDEX `fk_resultadoEncuentro_canchas1_idx` (`canchas_idCanchas` ASC) ,
  CONSTRAINT `fk_jugadores_has_jugadores_jugadores1`
    FOREIGN KEY (`idJugadores` )
    REFERENCES `escalerilla`.`jugadores` (`idJugadores` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jugadores_has_jugadores_jugadores2`
    FOREIGN KEY (`idJugadores1` )
    REFERENCES `escalerilla`.`jugadores` (`idJugadores` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resultadoEncuentro_canchas1`
    FOREIGN KEY (`canchas_idCanchas` )
    REFERENCES `escalerilla`.`canchas` (`idCanchas` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `escalerilla` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
