CREATE DATABASE bd_poliguaicaipuro DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE bd_poliguaicaipuro;

CREATE TABLE Persona
(
	codigo_per INTEGER NOT NULL AUTO_INCREMENT,
	cedula_per INTEGER NOT NULL,
	nombre1_per VARCHAR(50) NOT NULL,
	nombre2_per VARCHAR(50),
	apellido1_per VARCHAR(50) NOT NULL,
	apellido2_per VARCHAR(50),
	PRIMARY KEY (codigo_per)
)
;

CREATE TABLE Usuario
(
	codigo_usu INTEGER NOT NULL AUTO_INCREMENT,
	nombre1_usu varchar(100) NOT NULL,
  	apellido1_usu varchar(100) NOT NULL,
	correo_usu VARCHAR(50) NOT NULL,
	clave_usu VARCHAR(50) NOT NULL,
	tipo_usu VARCHAR(50) NOT NULL,
    ruta varchar(200) NOT NULL,
	PRIMARY KEY (codigo_usu)
) 
;

CREATE TABLE Multado
(
	codigo_mul INTEGER  AUTO_INCREMENT,
	cod_per INTEGER NOT NULL,
	PRIMARY KEY (codigo_mul),
	FOREIGN KEY (cod_per) REFERENCES Persona (codigo_per)
) 
;


CREATE TABLE Procedimiento
(
	codigo_pro INTEGER NOT NULL AUTO_INCREMENT,
	numero_pro INTEGER NOT NULL,
	nombre_pro VARCHAR(50) NOT NULL,
	puntaje_pro INTEGER NOT NULL,
	PRIMARY KEY (codigo_pro)
) 
;

CREATE TABLE Vehiculo
(
	codigo_veh INTEGER NOT NULL AUTO_INCREMENT,
	placa_veh VARCHAR(50) NOT NULL,
	marca_veh VARCHAR(50) NOT NULL,
	modelo_veh VARCHAR(50) NOT NULL,
	tipo_veh VARCHAR(50) NOT NULL,
	PRIMARY KEY (codigo_veh)
) 
;

CREATE TABLE Detencion
(
	codigo_det INTEGER NOT NULL AUTO_INCREMENT,
	fecha_det DATE NOT NULL,
	hora_det TIME NOT NULL,
	PRIMARY KEY (codigo_det)
) 
;

CREATE TABLE Funcionario
(
	codigo_fun INTEGER NOT NULL AUTO_INCREMENT,
	credencial_fun VARCHAR(50) NOT NULL,
	status_fun VARCHAR(10) NOT NULL,
	cod_per INTEGER NOT NULL,
	PRIMARY KEY (codigo_fun),
	FOREIGN KEY (cod_per) REFERENCES Persona (codigo_per)
) 
;

CREATE TABLE Detenido
(
	cod_det INTEGER NOT NULL AUTO_INCREMENT,
	fecha_nac_det DATE NOT NULL ,
	direccion_det TEXT NOT NULL,
	cod_per INTEGER NOT NULL,
	PRIMARY KEY (cod_det),
	FOREIGN KEY (cod_per) REFERENCES Persona (codigo_per)
) 
;

CREATE TABLE Mer_Dem
(
	codigo_mer_dem INTEGER NOT NULL AUTO_INCREMENT,
	tipo_mer_dem VARCHAR(50) NOT NULL,
	categoria_mer_dem VARCHAR(50) NOT NULL,
	PRIMARY KEY (codigo_mer_dem)
) 
;

CREATE TABLE Acta
(
	codigo_act INTEGER NOT NULL AUTO_INCREMENT,
	numero_act INTEGER NOT NULL,
	fecha_act VARCHAR(10) NOT NULL,
	tipo_act VARCHAR(50) NOT NULL,
	comentario_act TEXT ,
	unidad_act VARCHAR(50) NOT NULL,
	sector_act VARCHAR(50) NOT NULL,
	dependencia_act VARCHAR(50) NOT NULL,
	cod_pro INTEGER NOT NULL,
	PRIMARY KEY (codigo_act),
	FOREIGN KEY (cod_pro) REFERENCES Procedimiento (codigo_pro)
) 
;


CREATE TABLE Bitacora
(
	codigo_bit INTEGER NOT NULL AUTO_INCREMENT,
	fecha_bit DATE NOT NULL,
	hora_bit TIME NOT NULL,
	proceso_bit VARCHAR(255) NOT NULL,
	cod_usu INTEGER NOT NULL,
	PRIMARY KEY (codigo_bit),
	FOREIGN KEY (cod_usu) REFERENCES Usuario (codigo_usu)
) 
;


CREATE TABLE Detenido_Detencion
(
	cod_det_det INTEGER NOT NULL AUTO_INCREMENT,
	cod_detenido INTEGER NOT NULL,
	cod_detencion INTEGER NOT NULL,
	PRIMARY KEY (cod_det_det),
	FOREIGN KEY (cod_detencion) REFERENCES Detencion (codigo_det),
	FOREIGN KEY (cod_detenido) REFERENCES Detenido (cod_det)
) 
;


CREATE TABLE Especificacion
(
	codigo_esp INTEGER NOT NULL AUTO_INCREMENT,
	tipo_esp VARCHAR(50) NOT NULL,
	cod_mer_dem INTEGER NOT NULL,
	PRIMARY KEY (codigo_esp),
	FOREIGN KEY (cod_mer_dem) REFERENCES Mer_Dem (codigo_mer_dem)
) 
;


CREATE TABLE Acta_Per
(
	codigo_fun_act INTEGER NOT NULL AUTO_INCREMENT,
	cod_per INTEGER NOT NULL,
	cod_act INTEGER NOT NULL,
	PRIMARY KEY (codigo_fun_act),
	FOREIGN KEY (cod_act) REFERENCES Acta (codigo_act),
	FOREIGN KEY (cod_per) REFERENCES Persona (codigo_per)
) 
;


CREATE TABLE Fun_Mer_Dem
(
	codigo_fun_mer INTEGER NOT NULL AUTO_INCREMENT,
	cod_mer_dem INTEGER NOT NULL,
	cod_per INTEGER NOT NULL,
	PRIMARY KEY (codigo_fun_mer),
	FOREIGN KEY (cod_per) REFERENCES Persona (codigo_per),
	FOREIGN KEY (cod_mer_dem) REFERENCES Mer_Dem (codigo_mer_dem)
) 
;


CREATE TABLE Multa
(
	codigo_mul INTEGER NOT NULL AUTO_INCREMENT,
	numero_mul INTEGER NOT NULL,
	fecha_mul VARCHAR(10) NOT NULL,
	ut_mul INTEGER NOT NULL,
	monto_mul FLOAT(0) NOT NULL,
	comentario_mul TEXT NOT NULL,
	status_mul VARCHAR(10) NOT NULL,
	cod_veh INTEGER NOT NULL,
	PRIMARY KEY (codigo_mul),
	FOREIGN KEY (cod_veh) REFERENCES Vehiculo (codigo_veh)
	
) 
;


CREATE TABLE Multa_Persona
(
	codigo_mul_per INTEGER NOT NULL AUTO_INCREMENT,
	cod_mul INTEGER NOT NULL,
	cod_per INTEGER NOT NULL,
	PRIMARY KEY (codigo_mul_per),
	FOREIGN KEY (cod_mul) REFERENCES Multa (codigo_mul),
	FOREIGN KEY (cod_per) REFERENCES Persona (codigo_per)
	
) 
;









/*

SELECT CONCAT('drop table ',table_name,'; ')
FROM information_schema.tables
WHERE table_schema = 'tuBaseDeDatos';

*/