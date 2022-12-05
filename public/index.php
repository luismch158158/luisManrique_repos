<?php

use App\Controllers\medicalCenterController;
use App\Controllers\patientController;

require("vendor/autoload.php");


// Definimos los recursos disponibles
$allowedResourcesTypes = [
    'centrosmedicos',
    'pacientes'
];

// Validamos que el recurso este disponible
$resourceType = $_GET['resource_type'];
if ( !in_array( $resourceType, $allowedResourcesTypes ) ){
    die;
}

// Si no tiene ningun id, entonces quiero que me lo defina como vacío
// Existe la key 'resource_id' en el array $_GET en caso exista zetearlo y si no lo dejamos vacío
$resourceId = array_key_exists('resource_id', $_GET) ? $_GET["resource_id"] : '';

// Se indica al cliente que lo que recibirá es un json
header('Content-Type: application/json');



// Generamos la respuesta asumiendo que el pedido es correcto
switch ( strtoupper($_SERVER['REQUEST_METHOD'])) {
    case 'GET':
        if ($resourceType == "centrosmedicos") {
            // Instancio los Centros Médicos de la base de datos
            $medicalCenter_controller = new medicalCenterController;
            $all_medicalcenters = $medicalCenter_controller->index();
            if (empty( $resourceId ))
                $medicalCenter_controller->showindex($all_medicalcenters);
            else {
                if ( $resourceId <= count($all_medicalcenters) && $resourceId > 0 ) {
                    $medicalCenter_controller->showindexid($resourceId, $all_medicalcenters);
                }
            }
        }
        else if ($resourceType == "pacientes") {
            // Instancio los Pacientes de la base de datos
            $patients_controller = new patientController;
            $all_patients = $patients_controller->index();
            if (empty( $resourceId ))
                $patients_controller->showindex($all_patients);
            else {
                if ( $resourceId <= count($all_patients) && $resourceId > 0 ) {
                    $patients_controller->showindexid($resourceId, $all_patients);
                }
            }
        }
        break;
    case 'POST':
        break;
    case 'PUT':
        break;
    case 'DELETE':
        break;
}


