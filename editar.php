<?php
// Conectamos a la base de datos
include_once 'controller/conexion.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// BLOQUE DE SEGURIDAD
// Si no hay ID en la URL y tampoco se está guardando info...
if (!isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    // ... mándalo de regreso al inicio para evitar el Error 500
    header('Location: index.php');
    exit();
}

// Cargar datos del alumno
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sentencia = $conexion->prepare("SELECT * FROM alumnos WHERE id = ?");
    $sentencia->execute([$id]);
    $alumno = $sentencia->fetch(PDO::FETCH_OBJ);

    // Si el alumno no existe nos regresamos
    if (!$alumno) {
        header('Location: index.php');
        exit();
    }
}

// Guardar los cambios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_alumno'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $carrera = $_POST['carrera'];
    $semestre = $_POST['semestre'];

    $sentencia = $conexion->prepare("UPDATE alumnos SET nombre = ?, apellido = ?, carrera = ?, semestre = ? WHERE id = ?");
    $resultado = $sentencia->execute([$nombre, $apellido, $carrera, $semestre, $id]);

    if ($resultado) {
        header('Location: index.php');
    } else {
        echo "Error al guardar cambios.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/fondo.css">
  <title>E D I T A R</title>
</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
            
                <form  class="container mt-5 border shadow p-4 login-card" style="max-width: 400px;" action="" method="POST">

                    <h1 class="text-success text-center mb-4 display-6"  >Editar Alumno </h1>
                    <hr class = "text-primary"> 

                    <input name="id_alumno" type="hidden" >

                    <label for="nombre">Nombre del alumno:</label>
                    <input name= "nombre" class= "form-control mb-3" type="text">

                    <label for="apellido">Apellido del alumno:</label>
                    <input name= "apellido" class= "form-control mb-3" type="text" >

                    <label for="carrera">Carrera:</label>
                    <input name= "carrera" class= "form-control mb-3" type="text">

                    <label for="semestre">Semestre:</label>
                    <input name= "semestre" class= "form-control mb-3" type="number">
                    
            
                    <button type = "submit" class="btn btn-outline-success w-100 mb-3" >Editar Alumno</button>
                    <a href="index.php" class = "btn btn-outline-danger w-100 mb-3" >Cancelar</a>

                </form>
            </div>
        </div>
    </div>

</body>
</html>