<?php

namespace App\Controllers;

use Database\PDO\Connection;

class patientController {

    private $connection;

    // Cada vez que mi clase sea instanciada se llamará al constructor
    // El constructor asignará a la propiedad connection la instancia de la conexión a mi base de datos
    public function __construct()
    {
        $this->connection = Connection::getInstance()->get_database_instance();
    }

    // Muestra una lista de pacientes
    public function index() {

        // Usamos el metodo prepare para hacer la consulta para evitar que me hagan SQL Injection
        // Este prepara una sentencia para su ejecución y devuelve un objeto sentencia
        // Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

        $stmt = $this->connection->prepare("SELECT * FROM patient");
        $stmt->execute();

        $finalArray = [];

        while($row = $stmt->fetch(\PDO::FETCH_ASSOC))
            array_push($finalArray, $row);

        return $finalArray;
    }

    public function showindex($patients) {
        $json_patients = json_encode($patients);
        echo $json_patients;
    }

    public function showindexid($resourceid, $patients){

        foreach($patients as $patient) {
            if ($patient["pk_patient"] == $resourceid ){
                $json_patients_id = json_encode($patient);
                echo $json_patients_id;
                break;
            }
        }
    }
}