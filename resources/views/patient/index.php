<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
</head>
<body>

    <h1>Lista de Pacientes</h1>

    <ul>
        <?php foreach($patients as $result): ?>

        <li>El Paciente <?= $result["first_name"] ?> con Apellido <?= $result["last_name"] ?> tiene el siguiente email: <?= $result["email"] ?></li>

        <form action="/pacientes" method="post">
            <input type="hidden" name="method" value="put">
            <input type="hidden" name="id" value="<?= $result["pk_patient"] ?>">
            <button type="submit">Editar</button>
        </form>

        <form action="/pacientes" method="post">
            <input type="hidden" name="method" value="delete">
            <input type="hidden" name="id" value="<?= $result["pk_patient"] ?>">
            <button type="submit">Eliminar</button>
        </form>

        <?php endforeach; ?>

    </ul>

    <a href="/pacientes/create">Agregar nuevo paciente</a>

</body>
</html>