-- Crear base de datos:
CREATE DATABASE IF NOT EXISTS restaurante; 

-- Empezar a usar una base de datos que ya existe:
use restaurante;  


-- Tabla de Plato:
CREATE TABLE plato(    
	id_plato CHAR(4) PRIMARY KEY,
	nom VARCHAR(30) NOT NULL,
	tipo VARCHAR(30)
);

-- Tabla de distruibidor:
CREATE TABLE distruibidor(    
	id_distruibidor CHAR(4) PRIMARY KEY,
	nom VARCHAR(30) NOT NULL,
	telefono int(9) NOT NULL

);

-- Tabla de Vino:
CREATE TABLE vino(    
	id_vino CHAR(4) PRIMARY KEY,
	nom VARCHAR(30) NOT NULL,
	precio float(10),
	vin_dist CHAR(4),
	FOREIGN KEY (vin_dist) REFERENCES distruibidor(id_distruibidor)
	ON UPDATE CASCADE
	ON DELETE RESTRICT
);


-- Tabla de Relacion entre Plato y Vino:
 CREATE TABLE plat_vin(    
	plat_vin CHAR(4),
	vin_plat CHAR(4),
	FOREIGN KEY (plat_vin) REFERENCES plato(id_plato)
	ON UPDATE CASCADE
	ON DELETE RESTRICT,
	FOREIGN KEY (vin_plat) REFERENCES vino(id_vino)
	ON UPDATE CASCADE
	ON DELETE RESTRICT,
	PRIMARY KEY(plat_vin, vin_plat)

);


