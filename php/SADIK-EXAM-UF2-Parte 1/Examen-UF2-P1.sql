-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Pisos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Pisos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Pisos` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci ;
-- -----------------------------------------------------
-- Schema pisos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pisos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pisos` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci ;
USE `Pisos` ;

-- -----------------------------------------------------
-- Table `pisos`.`agencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pisos`.`agencia` (
  `id` INT(5) NOT NULL,
  `zona` VARCHAR(40) CHARACTER SET 'latin1' NULL,
  `Adresa` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `telefonos` INT(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `Pisos`.`Propietario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Pisos`.`Propietario` (
  `idPropietario` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(30) NULL,
  `adresa` VARCHAR(45) NULL,
  `telefono` DECIMAL(9) NULL,
  PRIMARY KEY (`idPropietario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Pisos`.`Piso-Alquiler`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Pisos`.`Piso-Alquiler` (
  `idPiso-Alquiler` INT NOT NULL AUTO_INCREMENT,
  `preu-alq` INT NULL,
  `fianza-alq` INT NULL,
  `m2` INT NULL,
  `N-Habitaciones` INT NULL,
  `N-Lavabos` INT NULL,
  `tipo-gas` VARCHAR(45) NULL,
  `Int-Ext` VARCHAR(45) NULL,
  `agencia_id` INT(5) NOT NULL,
  `Propietario_idPropietario` INT NOT NULL,
  PRIMARY KEY (`idPiso-Alquiler`, `agencia_id`, `Propietario_idPropietario`),
  INDEX `fk_Piso-Alquiler_agencia_idx` (`agencia_id` ASC) VISIBLE,
  INDEX `fk_Piso-Alquiler_Propietario1_idx` (`Propietario_idPropietario` ASC) VISIBLE,
  CONSTRAINT `fk_Piso-Alquiler_agencia`
    FOREIGN KEY (`agencia_id`)
    REFERENCES `pisos`.`agencia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Piso-Alquiler_Propietario1`
    FOREIGN KEY (`Propietario_idPropietario`)
    REFERENCES `Pisos`.`Propietario` (`idPropietario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Pisos`.`Piso-venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Pisos`.`Piso-venta` (
  `idPiso-Alquiler` INT NOT NULL AUTO_INCREMENT,
  `preu-ven` INT NULL,
  `Indicador` INT NULL,
  `m2` INT NULL,
  `N-Habitaciones` INT NULL,
  `N-Lavabos` INT NULL,
  `tipo-gas` VARCHAR(45) NULL,
  `Int-Ext` VARCHAR(45) NULL,
  `agencia_id` INT(5) NOT NULL,
  `Propietario_idPropietario` INT NOT NULL,
  PRIMARY KEY (`idPiso-Alquiler`, `agencia_id`, `Propietario_idPropietario`),
  INDEX `fk_Piso-venta_agencia1_idx` (`agencia_id` ASC) VISIBLE,
  INDEX `fk_Piso-venta_Propietario1_idx` (`Propietario_idPropietario` ASC) VISIBLE,
  CONSTRAINT `fk_Piso-venta_agencia1`
    FOREIGN KEY (`agencia_id`)
    REFERENCES `pisos`.`agencia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Piso-venta_Propietario1`
    FOREIGN KEY (`Propietario_idPropietario`)
    REFERENCES `Pisos`.`Propietario` (`idPropietario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pisos`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pisos`.`cliente` (
  `idcliente` INT(5) NOT NULL,
  `nom` VARCHAR(30) NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `Pisos`.`Piso-Alquiler_has_cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Pisos`.`Piso-Alquiler_has_cliente` (
  `Piso-Alquiler_idPiso-Alquiler` INT NOT NULL,
  `Piso-Alquiler_agencia_id` INT(5) NOT NULL,
  `cliente_idcliente` INT(5) NOT NULL,
  PRIMARY KEY (`Piso-Alquiler_idPiso-Alquiler`, `Piso-Alquiler_agencia_id`, `cliente_idcliente`),
  INDEX `fk_Piso-Alquiler_has_cliente_cliente1_idx` (`cliente_idcliente` ASC) VISIBLE,
  INDEX `fk_Piso-Alquiler_has_cliente_Piso-Alquiler1_idx` (`Piso-Alquiler_idPiso-Alquiler` ASC, `Piso-Alquiler_agencia_id` ASC) VISIBLE,
  CONSTRAINT `fk_Piso-Alquiler_has_cliente_Piso-Alquiler1`
    FOREIGN KEY (`Piso-Alquiler_idPiso-Alquiler` , `Piso-Alquiler_agencia_id`)
    REFERENCES `Pisos`.`Piso-Alquiler` (`idPiso-Alquiler` , `agencia_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Piso-Alquiler_has_cliente_cliente1`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `pisos`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `pisos` ;

-- -----------------------------------------------------
-- Table `pisos`.`vendedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pisos`.`vendedor` (
  `codi` INT(5) NOT NULL,
  `nom` VARCHAR(30) NULL,
  PRIMARY KEY (`codi`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `pisos`.`vendedor_has_cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pisos`.`vendedor_has_cliente` (
  `vendedor_codi` INT(5) NOT NULL,
  `cliente_idcliente` INT(5) NOT NULL,
  `agencia_id` INT(5) NULL,
  PRIMARY KEY (`vendedor_codi`, `cliente_idcliente`),
  INDEX `fk_vendedor_has_cliente_cliente1_idx` (`cliente_idcliente` ASC) VISIBLE,
  INDEX `fk_vendedor_has_cliente_agencia1_idx` (`agencia_id` ASC) VISIBLE,
  CONSTRAINT `fk_vendedor_has_cliente_vendedor`
    FOREIGN KEY (`vendedor_codi`)
    REFERENCES `pisos`.`vendedor` (`codi`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vendedor_has_cliente_cliente1`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `pisos`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vendedor_has_cliente_agencia1`
    FOREIGN KEY (`agencia_id`)
    REFERENCES `pisos`.`agencia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `pisos`.`cliente_has_Piso-venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pisos`.`cliente_has_Piso-venta` (
  `cliente_idcliente` INT(5) NOT NULL,
  `Piso-venta_idPiso-Alquiler` INT NOT NULL,
  `Piso-venta_agencia_id` INT(5) NOT NULL,
  PRIMARY KEY (`cliente_idcliente`, `Piso-venta_idPiso-Alquiler`, `Piso-venta_agencia_id`),
  INDEX `fk_cliente_has_Piso-venta_Piso-venta1_idx` (`Piso-venta_idPiso-Alquiler` ASC, `Piso-venta_agencia_id` ASC) VISIBLE,
  INDEX `fk_cliente_has_Piso-venta_cliente1_idx` (`cliente_idcliente` ASC) VISIBLE,
  CONSTRAINT `fk_cliente_has_Piso-venta_cliente1`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `pisos`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_has_Piso-venta_Piso-venta1`
    FOREIGN KEY (`Piso-venta_idPiso-Alquiler` , `Piso-venta_agencia_id`)
    REFERENCES `Pisos`.`Piso-venta` (`idPiso-Alquiler` , `agencia_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
