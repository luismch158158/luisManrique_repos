<?php

namespace App\Controllers;

use Database\PDO\Connection;

class medicalCenterController {

    private $connection;

    // Cada vez que mi clase sea instanciada se llamará al constructor
    // El constructor asignará a la propiedad connection la instancia de la conexión a mi base de datos
    public function __construct()
    {
        $this->connection = Connection::getInstance()->get_database_instance();
    }

    // Muestra una lista de centros médicos
    public function index() {

        // Usamos el metodo prepare para hacer la consulta para evitar que me hagan SQL Injection
        // Este prepara una sentencia para su ejecución y devuelve un objeto sentencia
        // Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

        $stmt = $this->connection->prepare("SELECT * FROM medical_center");
        $stmt->execute();

        $finalArray = [];

        while($row = $stmt->fetch(\PDO::FETCH_ASSOC))
            array_push($finalArray, $row);

        return $finalArray;
    }

    public function showindex($medicalcenters) {
        $json_medicalcenters = json_encode($medicalcenters);
        // header('Content-Type: text/html');
        header('Content-Type: application/json');

        echo $json_medicalcenters;

        // Como estamos requiriendo desde acá entonces acceso desde esta vista a la variable $medicalcenters
        // Para poder renderizar la vista
        // Solo tendria que descomentar la linea del require y linea del content-type text/html y comentar json para acceder a la vista html
        // require("resources/views/medicalCenter/index.php");
    }

    public function showindexid($resourceid, $medicalcenters){

        header('Content-Type: application/json');
        foreach($medicalcenters as $center) {
            if ($center["pk_medical_center"] == $resourceid ){
                $json_medicalcenters_id = json_encode($center);
                echo $json_medicalcenters_id;
                break;
            }
        }
    }
}