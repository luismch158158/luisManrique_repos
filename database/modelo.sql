-- Aplicar para crear la base de datos
-- CREATE DATABASE model_multilab;

-- Para cargar la data desde este archivo modelo.sql
-- cat modelo.sql | sudo mysql model_multilab

CREATE TABLE medical_center (
    pk_medical_center INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    address VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NOT NULL,
    PRIMARY KEY (pk_medical_center)
);

CREATE TABLE doctors (
    pk_doctor INT(11) NOT NULL AUTO_INCREMENT,
    fk_medical_center INT(11) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    code CHAR(6) NOT NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY (pk_doctor),
    FOREIGN KEY (fk_medical_center) REFERENCES medical_center(pk_medical_center)
);