<?php

require_once './controller/conexion.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $insercion = $conexion->prepare("
    INSERT INTO alumnos(nombre, apellido, carrera, semestre) 
    VALUES (:nombre, :apellido, :carrera, :semestre)
  "); 

  $insercion->bindParam(":nombre", $_POST['nombre']); 
  $insercion->bindParam(":apellido", $_POST['apellido']); 
  $insercion->bindParam(":carrera", $_POST['carrera']);
  $insercion->bindParam(":semestre", $_POST['semestre']);

  $insercion->execute();

  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/fondo.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Añadir</title>
</head>
<body>
  
  <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                
                <form  class="container mt-5 border shadow p-4 login-card" style="max-width: 400px;" action="agregar.php" method="POST">

                    <h1 class="text-success text-center mb-4 display-6"  >Añadir Alumno </h1>
                    <hr class = "text-primary"> 

                    <label for="nombre">Nombre del alumno:</label>
                    <input name= "nombre" class= "form-control mb-3" type="text" placeholder="Ingrese el nombre del alumno">

                    <label for="apellido">Apellido del alumno:</label>
                    <input name= "apellido" class= "form-control mb-3" type="text" placeholder="Ingrese el apellido del alumno">

                    <label for="carrera">Carrera:</label>
                    <input name= "carrera" class= "form-control mb-3" type="text" placeholder="Nombre de carrera">

                    <label for="semestre">Semestre:</label>
                    <input name= "semestre" class= "form-control mb-3" type="number" placeholder="No de semestre">
                    
            
                    <button type = "submit" class="btn btn-outline-success w-100 mb-3" >Añadir Alumno</button>
                    <a href="index.php" class = "btn btn-outline-danger w-100 mb-3" >Cancelar</a>      
                </form>
            </div>
        </div>
  </div>
  
</body>
</html>
