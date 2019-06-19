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
  `id` INT(6) NOT NULL,
  `Name` VARCHAR(30) NULL,
  `Surname` VARCHAR(30) NULL,
  `Birthdate` DATE NULL,
  `Email` VARCHAR(45) NULL,
  `User` VARCHAR(30) NULL,
  `Password` VARCHAR(30) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
