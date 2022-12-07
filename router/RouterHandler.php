<?php

namespace Router;

// Este Router simple logra conectarme a los métodos que queremos manejar
class RouterHandler {

    // Este sera el metodo de la petición HTTP
    protected $method;
    // Esta sera la información que se mande
    protected $data;
    private $verified;

    // Genero los setters
    public function set_method($method) {
        $this->method = $method;
    }

    public function set_data($data) {
        $this->data = $data;
    }

    // Esta función verifica si el id se encuentra en el array buscado
    // Retorna true si existe y retorna false si no.
    private function verifiedId ($id, $all_resources) {
        $this->verified = 0;
        foreach ($all_resources as $resource) {
            if (array_search($id, $resource) == "pk_patient")
                return 1;
        }
    }



    // Este será mi método principal que será mi enrutador tal cual
    // Esta clase va a recibir la clase de nuestro controlador como medicalCenterController o patientController
    public function route($controller, $id, $idToChange) {

        $resource = new $controller();
        $all_resources = $resource->index();
        $verifyid = $this->verifiedId($id, $all_resources);
        $verifyidchange = $this->verifiedId($idToChange, $all_resources);

        // Segun el método por el cual se haya llamado
        switch( strtoupper($this-> method)) {

            case "GET":
                if ( empty($id) ) {
                    if (count($all_resources) == 0){
                        header('Content-Type: application/json');
                        http_response_code( 200 );
                        $arrayempty = json_encode([]);
                        echo $arrayempty;
                        return $arrayempty;
                    }
                    $resource->showindex($all_resources);
                    http_response_code( 200 );
                }
                else if ($id == "create") {
                    $resource->create();
                }
                else if( $verifyid ) {
                    $resource->showindexid($id, $all_resources);
                }
                else {
                    http_response_code( 404 );
                }
                break;

            case "POST":
                $resource->store($this->data);
                break;

            case "PUT":
                if ($this->data["mode"] == "update" && $verifyidchange)
                    $resource->update($this->data, $idToChange);
                else if ( $verifyidchange ){
                    $resource->showupdate($this->data, $idToChange, $all_resources);
                }
                else {
                    echo "Id no es válido";
                    http_response_code( 404 );
                }
                break;

            case "DELETE":
                if ( $verifyidchange )
                    $resource->delete($idToChange);
                else {
                    echo "Id no es válido";
                    http_response_code( 404 );
                }
                break;

        }
    }
}