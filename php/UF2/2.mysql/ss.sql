-- MySQL Workbench Forward Engineering

-- -----------------------------------------------------
-- Schema restaurante
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema restaurante
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `restaurante` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `restaurante` ;

-- -----------------------------------------------------
-- Table `restaurante`.`plato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurante`.`plato` (
  `id_plato` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`id_plato`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `restaurante`.`distruibidor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurante`.`distruibidor` (
  `id_distruibidor` INT NOT NULL,
  `nombre` VARCHAR(30) NULL,
  `telefono` INT(9) NULL,
  PRIMARY KEY (`id_distruibidor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `restaurante`.`vino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurante`.`vino` (
  `id_vino` INT NOT NULL,
  `nombre` VARCHAR(30) NULL,
  `precio` DECIMAL(10) NULL,
  `distruibidor_id_distruibidor` INT NOT NULL,
  PRIMARY KEY (`id_vino`),
  CONSTRAINT `fk_vino_distruibidor1`
    FOREIGN KEY (`distruibidor_id_distruibidor`)
    REFERENCES `restaurante`.`distruibidor` (`id_distruibidor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `restaurante`.`plato_has_vino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurante`.`plato_has_vino` (
  `plato_id_plato` INT NOT NULL,
  `vino_id_vino` INT NOT NULL,
  PRIMARY KEY (`plato_id_plato`, `vino_id_vino`),
  CONSTRAINT `fk_plato_has_vino_plato`
    FOREIGN KEY (`plato_id_plato`)
    REFERENCES `restaurante`.`plato` (`id_plato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plato_has_vino_vino1`
    FOREIGN KEY (`vino_id_vino`)
    REFERENCES `restaurante`.`vino` (`id_vino`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

