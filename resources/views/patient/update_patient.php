<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualiza un paciente</title>
</head>
<body>

    <h1>Actualiza los datos del paciente</h1>

    <form action="/pacientes" method="post">

        <label for="first_name">Nombres:</label>
        <input name="first_name" id="first_name" type="text" value="<?= $specify_patient["first_name"] ?>">

        <label for="last_name">Apellidos:</label>
        <input name="last_name" id="last_name" type="text" value="<?= $specify_patient["last_name"] ?>">

        <label for="birth_date">Fecha de Cumpleaños:</label>
        <input name="birth_date" id="birth_date" type="text" value="<?= $specify_patient["birth_date"] ?>">

        <label for="phone_number">Celular:</label>
        <input name="phone_number" id="phone_number" type="text" value="<?= $specify_patient["phone_number"] ?>">

        <label for="email">Email:</label>
        <input name="email" id="email" type="text" value="<?= $specify_patient["email"] ?>">

        <input type="hidden" name="method" value="put">
        <input type="hidden" name="mode" value="update">
        <input type="hidden" name="id" value="<?= $specify_patient["pk_patient"] ?>">

        <button type="submit">Actualizar</button>

    </form>

</body>
</html>