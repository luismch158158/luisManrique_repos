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

CREATE TABLE users (
    pk_user INT(11) NOT NULL AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    name VARCHAR(50) NULL,
    password VARCHAR(50) NOT NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY (pk_user)
);

CREATE TABLE patient (
    pk_patient INT(11) NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    birth_date DATE NOT NULL,
    phone_number CHAR(9) NULL,
    email VARCHAR(50) NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY (pk_patient)
);

CREATE TABLE orders (
    pk_order INT(11) NOT NULL AUTO_INCREMENT,
    fk_doctor INT(11) NULL,
    fk_patient INT(11) NOT NULL,
    fk_user INT(11) NOT NULL,
    code CHAR(8) NOT NULL,
    is_active BOOL NOT NULL DEFAULT TRUE,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY (pk_order),
    FOREIGN KEY (fk_doctor) REFERENCES doctors(pk_doctor),
    FOREIGN KEY (fk_user) REFERENCES users(pk_user),
    FOREIGN KEY (fk_patient) REFERENCES patient(pk_patient)
);