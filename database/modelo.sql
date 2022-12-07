-- Para cargar la data desde este archivo modelo.sql
-- cat modelo.sql | sudo mysql

-- Aplicar para crear la base de datos, usuario y dar privilegios
CREATE DATABASE IF NOT EXISTS multilab_database;

CREATE USER IF NOT EXISTS 'user_0d_1'@'localhost' IDENTIFIED BY 'Test123+';
GRANT ALL PRIVILEGES ON *.* TO 'user_0d_1'@'localhost';

SHOW GRANTS FOR 'user_0d_1'@'localhost';

USE multilab_database;

-- CREACION DE TABLAS RELACIONALES

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

CREATE TABLE medical_test (
    pk_medical_test INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description TEXT NULL,
    price FLOAT(7,2) NOT NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY (pk_medical_test)
);

CREATE TABLE orders_details (
    pk_order_detail INT(11) NOT NULL AUTO_INCREMENT,
    fk_order INT(11) NOT NULL,
    fk_medical_test INT(11) NOT NULL,
    price FLOAT(7,2) NOT NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY (pk_order_detail),
    FOREIGN KEY (fk_order) REFERENCES orders(pk_order),
    FOREIGN KEY (fk_medical_test) REFERENCES medical_test(pk_medical_test)
);