-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema prova
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema prova
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `prova` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `prova` ;

-- -----------------------------------------------------
-- Table `prova`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prova`.`usuarios` (
  `id` INT(6) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(30) NOT NULL,
  `Surname` VARCHAR(30) NOT NULL,
  `Birthdate` DATE NOT NULL,
  `Email` VARCHAR(50) NOT NULL,
  `User` VARCHAR(30) NOT NULL,
  `Password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `prova`.`noticias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prova`.`noticias` (
  `id_noticia` INT(12) NOT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Descripcion` VARCHAR(500) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `RutaImagen` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Autor` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `usuarios_id` INT(6) NOT NULL,
  PRIMARY KEY (`id_noticia`),
  INDEX `fk_noticias_usuarios1_idx` (`usuarios_id` ASC) VISIBLE,
  CONSTRAINT `fk_noticias_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `prova`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `prova`.`tokens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prova`.`tokens` (
  `token` VARCHAR(30) NOT NULL,
  `id_usuarios` INT(6) NOT NULL,
  `Hora` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`token`),
  INDEX `fk_id_usuarios` (`id_usuarios` ASC) VISIBLE,
  CONSTRAINT `fk_id_usuarios`
    FOREIGN KEY (`id_usuarios`)
    REFERENCES `prova`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
