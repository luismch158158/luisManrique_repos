<?php

use App\Controllers\medicalCenterController;

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

// Se indica al cliente que lo que recibirá es un json
header('Content-Type: application/json');

// Instancio los Centros Médicos de la base de datos
$medicalCenter_controller = new medicalCenterController;

// Generamos la respuesta asumiendo que el pedido es correcto
switch ( strtoupper($_SERVER['REQUEST_METHOD'])) {
    case 'GET':
        $medicalCenter_controller->index();
        break;
    case 'POST':
        break;
    case 'PUT':
        break;
    case 'DELETE':
        break;
}


