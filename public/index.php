<?php

require("vendor/autoload.php");

use App\Controllers\medicalCenterController;
use App\Controllers\patientController;
use Router\RouterHandler;



// Definimos los recursos disponibles
$allowedResourcesTypes = [
    'centrosmedicos',
    'pacientes'
];

// Validamos que el recurso este disponible
$resourceType = $_GET['resource_type'];
if ( !in_array( $resourceType, $allowedResourcesTypes ) ){
    http_response_code( 400 );
    die;
}

// Si no tiene ningun id, entonces quiero que me lo defina como vacío
// Existe la key 'resource_id' en el array $_GET en caso exista zetearlo y si no lo dejamos vacío
$resourceId = array_key_exists('resource_id', $_GET) ? $_GET["resource_id"] : '';
$idToChange = array_key_exists('id', $_POST) ? $_POST["id"] : '';

// Se indica al cliente que lo que recibirá es un json
// header('Content-Type: text/html');

// Hacemos la instancia del RouterHandler
$router = new RouterHandler;

switch ($resourceType) {
    case "centrosmedicos";
        // Este toma el metodo por el que esta siendo enviado sea: post, put o delete
        // y si no tiene se considera que es método get
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        // Toda la información que viene desde un formulario viene desde un POST
        $router->set_data($_POST);
        $router->route(medicalCenterController::class, $resourceId, $idToChange);
        break;

    case "pacientes";
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        // Toda la información que viene desde un formulario viene desde un POST
        $router->set_data($_POST);
        $router->route(patientController::class, $resourceId, $idToChange);
        break;
}
