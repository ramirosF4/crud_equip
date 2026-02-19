<?php
try {
    $servidor = "localhost";
    $bd   = "escuela";
    $user = "crud";
    $password = "1234";
    $conexion = new PDO("mysql:host=$servidor;dbname=$bd"; $user, $password);

    
} catch (PDOException $th) {
    echo "Error: ". $th ->getMessage();
}

?>
