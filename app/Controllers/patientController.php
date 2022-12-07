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
        header('Content-Type: text/html');

        require("resources/views/patient/index.php");
        return $json_patients;
    }

    public function showindexid($resourceid, $patients){

        header('Content-Type: application/json');
        foreach($patients as $patient) {
            if ($patient["pk_patient"] == $resourceid ){

                $json_patients_id = json_encode($patient);
                echo $json_patients_id;
                break;
            }
        }
    }

    // Muestra un formulario para crear un nuevo paciente
    public function create() {
        header('Content-Type: text/html');
        require("resources/views/patient/create.php");
    }

    public function store($data){
        // Este metodo prepare va a preparar la consulta pero no la va a ejecutar, esto evita el sql injection
        $stmt = $this->connection->prepare("INSERT INTO patient (first_name, last_name, birth_date, phone_number, email, created_at, updated_at) VALUES (:first_name, :last_name, :birth_date, :phone_number, :email,:created_at , :updated_at)");

        $is_empty = array_search("", $data);
        if ($is_empty){
            echo "Faltan datos por rellenar";
            http_response_code( 400 );
        }
        else {

            $first_name = strtoupper($data["first_name"]);
            $last_name = strtoupper($data["last_name"]);
            $birth_date = $data["birth_date"];
            $phone_number = $data["phone_number"];
            $email = $data["email"];
            $created_at = date("Y-m-d H:i:s", time());
            $updated_at = date("Y-m-d H:i:s", time());

            $array_created = array(
                "first_name"=> $first_name,
                "last_name"=> $last_name,
                "birth_date"=> $birth_date,
                "phone_number"=> $phone_number,
                "email"=> $email,
                "created_at"=> $created_at,
                "updated_at"=> $updated_at
            );

            $stmt->bindValue(":first_name", $first_name);
            $stmt->bindValue(":last_name", $last_name);
            $stmt->bindValue(":birth_date", $birth_date);
            $stmt->bindValue(":phone_number", $phone_number);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":created_at", $created_at);
            $stmt->bindValue(":updated_at", $updated_at);


            $stmt->execute();

            http_response_code( 204 );
            header("location: pacientes");
            return (json_encode($array_created));
        }
    }

    // Muestra un formulario para crear un nuevo paciente

    public function showupdate($data, $id, $all_resources) {

        foreach($all_resources as $patient) {
            if ($patient["pk_patient"] == $id ){

                $specify_patient = $patient;
                break;
            }
        }

        header('Content-Type: text/html');

        require("resources/views/patient/update_patient.php");
    }

    public function update($data, $idToChange) {

        $stmt = $this->connection->prepare("UPDATE patient SET
            first_name = :first_name,
            last_name = :last_name,
            birth_date = :birth_date,
            phone_number = :phone_number,
            email = :email,
            updated_at = :updated_at
        WHERE pk_patient=:id;");

        $is_empty = array_search("", $data);
        if ($is_empty){
            echo "Faltan datos por rellenar";
            http_response_code( 400 );
        }
        else {
            $stmt->bindValue(":first_name", strtoupper($data["first_name"]));
            $stmt->bindValue(":last_name", strtoupper($data["last_name"]));
            $stmt->bindValue(":birth_date", $data["birth_date"]);
            $stmt->bindValue(":phone_number", $data["phone_number"]);
            $stmt->bindValue(":email", $data["email"]);
            $stmt->bindValue(":updated_at", date("Y-m-d H:i:s", time()));
            $stmt->bindValue(":id", intval($idToChange));

            $stmt->execute();

            http_response_code( 204 );
            header("location: pacientes");
            return ([]);
        }

    }


    public function delete($id){

        $idToDelete = intval($id);
        $stmt = $this->connection->prepare("DELETE FROM patient WHERE pk_patient= :id");

        $stmt->bindValue(":id", $idToDelete);

        $stmt->execute();

        http_response_code( 204 );
        header("location: pacientes");
    }
}