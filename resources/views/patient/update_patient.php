<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualiza un paciente</title>
    <style>
        :root {
            font-family:Arial, Helvetica, sans-serif;
        }
        body{
            background: #CFD2D3;
        }
        header h1 {
            text-align: center;
            padding-top: 28px;
        }

        .button_modified{
            border-radius: .5rem;
            border: none;
            background: white;
            padding: 0.8rem;
            cursor: pointer;
            font-weight: bold;
            margin: 0 auto;
            width: 115px;
        }

        .button_modified:hover {
            background: #B0B7B9;
            color: white;
        }

        header{
            height: 100px;
        }
        .formulario{
            display: flex;
            flex-direction: column;
            row-gap: 30px;
            height: 605px;
            justify-content: center;
            width: 40%;
            margin: 0 auto;
        }

        .formulario input{
            border: none;
            border-radius: .5rem;
            padding: 0.5rem;
        }

        .formulario label{
            padding-top: 10px;
        }

        .label-input{
            display: flex;
            flex-direction: column;
            row-gap: 11px;
        }

        footer {
            display: flex;
            justify-content: center;
        }

    </style>
</head>
<body>
    <header>
        <h1>Actualiza los datos del paciente</h1>
    </header>
    <main>
        <form class="formulario" action="/pacientes" method="post">
    
            <div class="label-input">
                <label for="first_name">Nombres:</label>
                <input name="first_name" id="first_name" type="text" value="<?= $specify_patient["first_name"] ?>">
            </div>
    
            <div class="label-input">
                <label for="last_name">Apellidos:</label>
                <input name="last_name" id="last_name" type="text" value="<?= $specify_patient["last_name"] ?>">
            </div>

            <div class="label-input">
                <label for="birth_date">Fecha de Cumpleaños:</label>
                <input name="birth_date" id="birth_date" type="text" value="<?= $specify_patient["birth_date"] ?>">
            </div>
    
            <div class="label-input">
                <label for="phone_number">Celular:</label>
                <input name="phone_number" id="phone_number" type="text" value="<?= $specify_patient["phone_number"] ?>">
            </div>
    
            <div class="label-input">
                <label for="email">Email:</label>
                <input name="email" id="email" type="text" value="<?= $specify_patient["email"] ?>">
            </div>
    
            <input type="hidden" name="method" value="put">
            <input type="hidden" name="mode" value="update">
            <input type="hidden" name="id" value="<?= $specify_patient["pk_patient"] ?>">
    
            <button class="button_modified" type="submit">Actualizar</button>
    
        </form>
    </main>
</body>
</html>