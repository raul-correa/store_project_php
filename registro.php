<?php

session_start();

//codigo que valida si existe sessión abierta
if(isset($_SESSION["user"])){
    header("Location: welcome.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>ISIL GAMER</title>
</head>
<body>
    <!-- header.php -->

    <?php include 'header.php'; ?>


    <!-- formulario login -->

    <div class="container text-center mt-4 mb-4">
        <h2>Registro</h2>
        <p>Completa los siguientes campos para registrar</p>
    </div>
    <div class="container">

        <form class="form" action="registrando.php" method="post">
            <label class="form-label">Usuario: </label>
            <input class="form-control" id="user" name="user" type="text" maxlength="8" required >

            <label class="form-label">Email: </label>
            <input class="form-control" id="email" name="email" type="email" required >

            <label class="form-label">Contraseña: </label>
            <input class="form-control" id="pass" name="pass" type="password" required >

            <input class="btn btn-dark mt-2 mb-2" type="submit" value="Registrar">

            <p class="text-center">¿Tiendas una cuenta? <strong><ins><a href="login.php">¡Ingresar ahora!</a></ins></strong> </p>
        </form>
    </div>

    <!-- footer.php -->

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>