<?php

namespace Database\PDO;

// PDO es un driver que tiene PHP para conectarse a una base de datos pero que soporta más bases de datos que MySQLi

// Utilizamos el patron de diseño Singletton de los patrones creacionales
// Para que solo se pueda instanciar una sola vez la base de datos asi solo creamos una vez la conexión a la base de datos
class Connection {

    // Son estáticas para que puedan ser accedidas sin necesidad de instanciar la clase
    // Y privadas para que solo se puedan usar desde dentro la clase
    private static $instance;
    private $connection;

    // Este constructor privado es para evitar que nadie pueda instanciar esta clase por fuera
    // La unica forma de instancia esta clase es adentro de esta clase con el método getInstance
    private function __construct() {
        $this->make_connection();
    }

    // Esta es la instancia que debería retornarme la instancia en forma Singletton
    public static function getInstance() {
        // Si la propiedad $instance no es una instancia de mi misma entonces creo la instancia
        if(!self::$instance instanceof self)
            self::$instance = new self();
        // Pero si ya existe solo retorno la instancia
        return self::$instance;
    }

    // Este metodo es un getter que retorna la conexión que ya esta lista
    public function get_database_instance() {
        return $this->connection;
    }

    private function make_connection() {
        $server = "localhost";
        $database = "multilab_database";
        $username = "user_0d_1";
        $password = "Test123+";

        // PDO se coloca el slash para que reconozca que esta en el namespace global
        $connection = new \PDO("mysql:host=$server;dbname=$database", $username, $password);

        // Este zeteo de utf-8 hace que podamos usar cualquier caracter en nuestras querys
        $setnames = $connection->prepare("SET NAMES 'utf8'");
        $setnames->execute();

        // Se guarda la conexión en la variable privada $connection
        $this->connection = $connection;
    }

}

