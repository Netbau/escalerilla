SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `netbau_escalerillas` ;
CREATE SCHEMA IF NOT EXISTS `netbau_escalerillas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `netbau_escalerillas` ;

-- -----------------------------------------------------
-- Table `netbau_escalerillas`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `netbau_escalerillas`.`usuarios` ;

CREATE  TABLE IF NOT EXISTS `netbau_escalerillas`.`usuarios` (
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
  `fechaRegistro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `edad` INT NOT NULL ,
  `sexo` BINARY NOT NULL ,
  PRIMARY KEY (`idUsuarios`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `netbau_escalerillas`.`jugadores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `netbau_escalerillas`.`jugadores` ;

CREATE  TABLE IF NOT EXISTS `netbau_escalerillas`.`jugadores` (
  `idJugadores` INT NOT NULL AUTO_INCREMENT ,
  `ranking` INT NOT NULL ,
  `categoria` CHAR(1) NOT NULL ,
  `idUsuarios` INT NOT NULL ,
  `alDia` BINARY NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`idJugadores`) ,
  INDEX `fk_Jugadores_usuarios_idx` (`idUsuarios` ASC) ,
  CONSTRAINT `fk_Jugadores_usuarios`
    FOREIGN KEY (`idUsuarios` )
    REFERENCES `netbau_escalerillas`.`usuarios` (`idUsuarios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `netbau_escalerillas`.`desafio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `netbau_escalerillas`.`desafio` ;

CREATE  TABLE IF NOT EXISTS `netbau_escalerillas`.`desafio` (
  `idJugadores` INT NOT NULL ,
  `idJugadores1` INT NOT NULL ,
  `fecha` DATETIME NOT NULL ,
  `estado` ENUM('Pendiente','Concretado','WO') NOT NULL ,
  PRIMARY KEY (`idJugadores`, `idJugadores1`, `fecha`) ,
  INDEX `desafio_jugador2` (`idJugadores1` ASC) ,
  INDEX `desafio_jugador1` (`idJugadores` ASC) ,
  CONSTRAINT `desafio_jugador1`
    FOREIGN KEY (`idJugadores` )
    REFERENCES `netbau_escalerillas`.`jugadores` (`idJugadores` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `desafio_jugador2`
    FOREIGN KEY (`idJugadores1` )
    REFERENCES `netbau_escalerillas`.`jugadores` (`idJugadores` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `netbau_escalerillas`.`canchas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `netbau_escalerillas`.`canchas` ;

CREATE  TABLE IF NOT EXISTS `netbau_escalerillas`.`canchas` (
  `idCanchas` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(60) NOT NULL ,
  PRIMARY KEY (`idCanchas`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `netbau_escalerillas`.`resultadoEncuentro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `netbau_escalerillas`.`resultadoEncuentro` ;

CREATE  TABLE IF NOT EXISTS `netbau_escalerillas`.`resultadoEncuentro` (
  `idJugadores` INT NOT NULL ,
  `idJugadores1` INT NOT NULL ,
  `set1` VARCHAR(10) NOT NULL ,
  `set2` VARCHAR(10) NOT NULL ,
  `set3` VARCHAR(10) NULL ,
  `fecha` DATETIME NOT NULL ,
  `canchas_idCanchas` INT NOT NULL ,
  PRIMARY KEY (`idJugadores1`, `idJugadores`) ,
  INDEX `jugador1` (`idJugadores1` ASC) ,
  INDEX `jugador2` (`idJugadores` ASC) ,
  INDEX `cancha` (`canchas_idCanchas` ASC) ,
  CONSTRAINT `encuentro_jugador1`
    FOREIGN KEY (`idJugadores` )
    REFERENCES `netbau_escalerillas`.`jugadores` (`idJugadores` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `encuentro_jugador2`
    FOREIGN KEY (`idJugadores1` )
    REFERENCES `netbau_escalerillas`.`jugadores` (`idJugadores` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cancha`
    FOREIGN KEY (`canchas_idCanchas` )
    REFERENCES `netbau_escalerillas`.`canchas` (`idCanchas` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `netbau_escalerillas` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
