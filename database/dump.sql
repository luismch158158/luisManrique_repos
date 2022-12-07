-- Para cargar la data desde este archivo modelo.sql
-- cat dump.sql | sudo mysql multilab_database

-- Añadiendo Centros Médicos
INSERT INTO medical_center (name, address, created_at) VALUES ("CLINICA MONTEVIDEO", "Jr. Montevideo 448, Surco", "2022-05-27 12:07:17");
INSERT INTO medical_center (name, address, created_at) VALUES ("CLINICA JAVIER PRADO", "Av. Javier Prado 708, San Isidro", "2022-08-27 12:07:17");

-- Añadiendo Pacientes
INSERT INTO patient (first_name, last_name, birth_date, phone_number, email, created_at, updated_at) VALUES ("JOSE LUIS", "PERALES MONTERO", "1992-04-13", "95652125", "jose.peraleS@gmail.com", "2022-04-27 12:07:17", "2022-04-27 12:07:17");
INSERT INTO patient (first_name, last_name, birth_date, phone_number, email, created_at, updated_at) VALUES ("LUIS FERNANDO", "MORALES DUAREZ", "1990-07-20", "95635125", "luis.morales@gmail.com", "2022-04-28 10:07:17", "2022-04-28 10:07:17");
INSERT INTO patient (first_name, last_name, birth_date, phone_number, email, created_at, updated_at) VALUES ("MARIO", "LOPEZ MORALES", "1991-04-15", "92335124", "mario.lopez@gmail.com", "2022-04-25 11:07:17", "2022-04-25 11:07:17");
INSERT INTO patient (first_name, last_name, birth_date, phone_number, email, created_at, updated_at) VALUES ("JORGE", "PALOMINO SUAREZ", "1990-02-20", "92335451", "jorge.palomino@gmail.com", "2021-06-19 10:10:17", "2021-06-19 10:10:17");
INSERT INTO patient (first_name, last_name, birth_date, phone_number, email, created_at, updated_at) VALUES ("LEONARDO", "JUAREZ PEREZ", "1992-01-10", "92345851", "leonardo.juarez@gmail.com", "2022-05-05 09:10:17", "2022-05-05 09:10:17");