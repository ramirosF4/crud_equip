<?php

// Conexión a la bd
include_once 'controller/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sentencia = $conexion->prepare("SELECT * FROM alumnos WHERE id = ?;");
    $sentencia->execute([$id]);
    // Usamos FETCH_OBJ para acceder como $alumno->nombre
    $alumno = $sentencia->fetch(PDO::FETCH_OBJ);

    if (!$alumno) {
        header('Location: index.php');
        exit();
    }
}

// Aquí actualizamos los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_alumno = $_POST['id_alumno']; 
    $nombre    = $_POST['nombre'];
    $apellido  = $_POST['apellido'];
    $carrera   = $_POST['carrera'];
    $semestre  = $_POST['semestre'];

    $sql = "UPDATE alumnos SET nombre = ?, apellido = ?, carrera = ?, semestre = ? WHERE id = ?;";
    $sentencia = $conexion->prepare($sql);
    $resultado = $sentencia->execute([$nombre, $apellido, $carrera, $semestre, $id_alumno]);

    if ($resultado) {
        header('Location: index.php?status=success');
        exit();
    } else {
        echo "Error al actualizar.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>E D I T A R</title>
</head>
<body class="bg-light p-5">
    <div class="container card shadow p-4" style="max-width: 500px;">
        <h2 class="text-center text-success">Editar Alumno</h2>
        <hr>
        <form action="editar.php" method="POST">
            
            <input type="hidden" name="id_alumno" value="<?= $alumno->id ?>">

            <label class="form-label">Nombre:</label>
            <input name="nombre" value="<?= $alumno->nombre ?>" class="form-control mb-3" type="text" required>

            <label class="form-label">Apellido:</label>
            <input name="apellido" value="<?= $alumno->apellido ?>" class="form-control mb-3" type="text" required>

            <label class="form-label">Carrera:</label>
            <input name="carrera" value="<?= $alumno->carrera ?>" class="form-control mb-3" type="text" required>

            <label class="form-label">Semestre:</label>
            <input name="semestre" value="<?= $alumno->semestre ?>" class="form-control mb-3" type="number" required>
            
            <button type="submit" class="btn btn-success w-100 mb-2">Guardar Cambios</button>
            <a href="index.php" class="btn btn-secondary w-100">Cancelar</a>
        </form>
    </div>
</body>
</html>