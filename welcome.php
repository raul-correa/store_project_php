<?php
session_start();

//Verificamos que la sesión esté creada
if(!isset($_SESSION["user"])){
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome</title>
</head>
<body>

    <!-- header.php -->

    <?php include 'header.php'; ?>

   
    <div class="container mt-4 mb-4 text-center">
        <h2>¡Hola, <?php echo $_SESSION["user"]; ?>! 👋</h2>

        <div class="row text-center mt-4 mb-4">
            <div class="col-4">
                <img src="images/employees.png" class="img-fluid pb-3" width="100" alt="">
                <h3><a href="gestionar_empleados.php">Gestionar Empleados</a></h3>
            </div>

            <div class="col-4">
                <img src="images/projects.png" class="img-fluid pb-3" width="100" alt="">
                <h3><a href="gestionar_proyectos.php">Gestionar Proyectos</a></h3>
            </div>

            <div class="col-4">
                <img src="images/department.png" class="img-fluid pb-3" width="100" alt="">
                <h3><a href="gestionar_departamentos.php">Gestionar Departamentos</a></h3>
            </div>
        </div>
    </div>
   

    <!-- footer.php -->

    <?php include 'footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>