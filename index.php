<?php
require_once './config/conexion.php';

$consulta = $conexion->prepare("SELECT * FROM alumnos");
$consulta->execute();
$alumnos = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alumnos</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/fondo.css">
</head>
<body>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 table-card">

            <div class="border rounded p-3 shadow">

                <p class="display-6 text-center">Alumnos</p>

                <a href="agregar.php" class="btn btn-outline-success mb-3">
                    Añadir alumno
                </a>

                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Carrera</th>
                            <th>Semestre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach($alumnos as $persona): ?>
                        <tr>
                            <td><?= $persona['id'] ?></td>
                            <td><?= $persona['nombre'] ?></td>
                            <td><?= $persona['apellido'] ?></td>
                            <td><?= $persona['carrera'] ?></td>
                            <td><?= $persona['semestre'] ?></td>
                            <td>
                                <a href="editar.php?id=<?= $persona['id'] ?>" 
                                   class="btn btn-outline-success btn-sm">
                                   Editar
                                </a>
                                <form action="controller/eliminar.php" 
                                      method="POST" 
                                      style="display:inline;">
                                      
                                    <input type="hidden" 
                                           name="id" 
                                           value="<?= $persona['id'] ?>">

                                    <button type="submit"
                                            class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('¿Estás seguro de eliminar este alumno?');">
                                        Eliminar
                                    </button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>

</body>
</html>
