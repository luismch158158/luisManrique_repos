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

