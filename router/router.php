<?php

$matches=[];

// Este le dice si nuestra URL coincide con este patrón
if(preg_match('/\/([^\/]+)\/([^\/]+)/',$_SERVER["REQUEST_URI"],$matches))
{
    $_GET['resource_type']=$matches[1];
    $_GET['resource_id']=$matches[2];
    error_log(print_r($matches,1));

    // Luego derivo el control al server.php para que continue como si la llamada se hubiera hecho pasandole los parámetros por la URL
    require 'public/index.php';
    // Y este es igual el mismo regex pero para una colección y no para un recurso particular
}else if(preg_match('/\/([^\/]+)\/?/',$_SERVER["REQUEST_URI"],$matches))
{
    $_GET['resource_type']=$matches[1];
    error_log(print_r($matches,1));

    require 'public/index.php';
}else
{
    error_log('No matches');
    http_response_code(404);
    echo "404 PAGE NOT FOUND ";
}

?>