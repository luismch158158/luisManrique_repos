<a name="readme-top"></a>


<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/luismch158158/Assignment_by_projects">
    <img src="images/ingenieria.png" alt="Logo" width="80" height="80">
  </a>

<h3 align="center">Practical Exercise</h3>


</div>

## To initialize
---
To create the user, the database and the project tables, run the following command from the project root

- `cat database/modelo.sql | sudo mysql`

To load the initial data of the project execute the following command

- `cat database/dump.sql | sudo mysql multilab_database`

To initialize composer to load composer.json
- `composer install`

## To run
---
For run the program you must use the following command from the root of the project.
- `php -S localhost:8000 router/routes.php`


### Relational Database
---
The database was made in Mysql. What is shown below is the entity relationship model diagram




<img src="images/database_mysql.JPG" alt="Logo">






### CRUD (Create, read, update and delete)
---

- GET /centrosmedicos --> list medical centers


<img src="images/ejercicio_1.JPG" alt="Logo">

- GET /pacientes --> list patients

<img src="images/pacientes.JPG" alt="Logo">

- GET /pacientes/:id --> list patients by id

<img src="images/pacientes_by_id.JPG" alt="Logo">


- POST /pacientes --> create a patient

Before
---
<img src="images/pacientes.JPG" alt="Logo">

<img src="images/agregar_nuevo_paciente.JPG" alt="Logo">

<img src="images/agregar_nuevo_paciente_2.JPG" alt="Logo">


After
---
<img src="images/agregar_nuevo_paciente_3.JPG" alt="Logo">


- PUT /pacientes/:id --> update data of a specific patient

Before
---
<img src="images/agregar_nuevo_paciente_3.JPG" alt="Logo">

<img src="images/actualizar_paciente.JPG" alt="Logo">

After
---
<img src="images/actualizar_paciente_2.JPG" alt="Logo">


- DELETE /pacientes/:id --> delete a specific patient

Before
---
<img src="images/eliminar_paciente.JPG" alt="Logo">

After
---
<img src="images/eliminar_paciente_2.JPG" alt="Logo">


## Authors
---

- Luis Manrique - <luismanrique158158@gmail.com> [![LinkedIn][linkedin-shield]][linkedin-url-luis]

[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url-luis]: https://www.linkedin.com/in/luis-manrique158158/