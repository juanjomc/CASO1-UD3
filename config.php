<?php
// defino las constantes de la base de datos

define('DB_SERVER', 'localhost');
define('DB_USERNAME', '3capas');
define('DB_PASSWORD', '3capas');
define('DB_NAME', 'Juegos');

// Función para conectarse a la base de datos
function getDBConnection() {
    
    // Crear la conexión
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    return $conn;
}
?>