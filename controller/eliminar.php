<?php
require_once '../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['id']) && !empty($_POST['id'])) {

        $eliminacion = $conexion->prepare(
            "DELETE FROM alumnos WHERE id = :id"
        );

        $eliminacion->bindParam(":id", $_POST['id'], PDO::PARAM_INT);
        $eliminacion->execute();

        header("Location: ../index.php");
        exit();

    } else {
        echo "ID no válido";
    }

} else {
    header("Location: ../index.php");
    exit();
}
?>

