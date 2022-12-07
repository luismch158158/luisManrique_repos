<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
    <style>
        :root {
            font-family:Arial, Helvetica, sans-serif;
        }
        body{
            background: #CFD2D3;
        }
        header h1 {
            text-align: center;
            padding-top: 55px;
        }

        .button_create{
            text-decoration: none;
            color: black;
            background: white;
            border-radius: .5rem;
            padding: 1rem;
            font-weight: bold;
        }

        .button_create:hover{
            background: #B0B7B9;
            color: white;
        }

        .button_modified{
            width: 80px;
            border-radius: .5rem;
            border: none;
            background: white;
            padding: 0.5rem;
            cursor: pointer;
            font-weight: bold;
            margin-left: 17px;
        }

        .button_modified:hover {
            background: #B0B7B9;
            color: white;
        }
        table {
            text-align: center;
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            width: 25%;
            border: 1px solid #000;
            border-spacing: 0;
            border-collapse: collapse;
            padding: 0.3em;
        }

        .options {
            border: none;
        }
        header{
            height: 100px;
        }
        main{
            display: flex;
            flex-direction: column;
            row-gap: 30px;
            align-items: center;
            height: 455px;
            justify-content: center;
        }
        footer {
            display: flex;
            justify-content: center;
        }

    </style>
</head>
<body>
    <header>
        <h1>Lista de Pacientes</h1>
    </header>
    <main>
        <div class="tabla">
            <table class="default">
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Nacimiento</th>
                    <th>Celular</th>
                    <th>email</th>
                    <th>Ultima modificación</th>
                </tr>
                <?php foreach($patients as $result): ?>
                <tr>
                    <td>
                        <?= $result["first_name"] ?>
                    </td>
                    <td>
                        <?= $result["last_name"] ?>
                    </td>
                    <td>
                        <?= $result["birth_date"] ?>
                    </td>
                    <td>
                        <?= $result["phone_number"] ?>
                    </td>
                    <td>
                        <?= $result["email"] ?>
                    </td>
                    <td>
                        <?= $result["updated_at"] ?>
                    </td>
    
                    <td class="options">
                        <form action="/pacientes" method="post">
                            <input type="hidden" name="method" value="put">
                            <input type="hidden" name="id" value="<?= $result["pk_patient"] ?>">
                            <button class="button_modified" type="submit">Editar</button>
                        </form>
                    </td>
                    <td class="options">
                        <form action="/pacientes" method="post">
                            <input type="hidden" name="method" value="delete">
                            <input type="hidden" name="id" value="<?= $result["pk_patient"] ?>">
                            <button class="button_modified" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </main>
    <footer>
        <div class="boton_crear">
            <a class="button_create" href="/pacientes/create">Agregar nuevo paciente</a>
        </div>
    </footer>

</body>
</html>