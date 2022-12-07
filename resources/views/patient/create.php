<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea un nuevo paciente</title>
</head>
<body>
    <h1>Agrega un nuevo paciente</h1>

    <form action="/pacientes" method="post">

        <label for="first_name">Nombres:</label>
        <input name="first_name" id="first_name" type="text">

        <label for="last_name">Apellidos:</label>
        <input name="last_name" id="last_name" type="text">

        <label for="birth_date">Fecha de Cumpleaños:</label>
        <input name="birth_date" id="birth_date" type="text" placeholder="Ex: 1992-04-13">

        <label for="phone_number">Celular:</label>
        <input name="phone_number" id="phone_number" type="text">

        <label for="email">Email:</label>
        <input name="email" id="email" type="text">

        <input type="hidden" name="method" value="post">

        <button type="submit">Guardar</button>

    </form>

</body>
</html>