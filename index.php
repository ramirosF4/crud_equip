<?php
require_once './controller/conexion.php'; 
$consulta = $conexion->prepare("SELECT * FROM alumnos");
$consulta -> execute();
$alumno = $consulta ->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/fondo.css">

  <title>A l u m n o s</title>
</head>
<body>


  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-6 mb-3 me-3 table-card">
            <div class="border rounded">
            <p class="display-6 text-center">Alumnos</p>
            <a href="agregar.php" class="btn btn-outline-success">Añadir alumno</a>
            
                    
            
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Carrera</th>
                        <th>Semestre</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($alumno as $persona): ?>
                    <tr>
                        <td><?= $persona['id'] ?></td>
                        <td><?= $persona['nombre'] ?></td>
                        <td><?= $persona['apellido'] ?></td>
                        <td><?= $persona['carrera'] ?></td>
                        <td><?= $persona['semestre'] ?></td>
                        <td>
                            <a href="editar.php" class="btn btn-outline-success">Editar</a>
                            <a href="eliminar.php" class="btn btn-outline-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </table>        
            </div>        
      </div>     
    </div>
  
</div>
</body>
</html>
