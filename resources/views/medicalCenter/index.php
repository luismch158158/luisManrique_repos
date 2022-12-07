<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Centros Médicos</title>
</head>
<body>

    <h1>Lista de Centros Médicos</h1>

    <ul>
        <?php foreach($medicalcenters as $result): ?>

        <li>La clínica <?= $result["name"] ?> esta ubicada en la dirección: <?= $result["address"] ?></li>

        <?php endforeach; ?>
    </ul>

</body>
</html>