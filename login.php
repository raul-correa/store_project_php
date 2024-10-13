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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        .bx-show-alt{
            font-size: 30px;
            cursor: pointer;
            transform: translateY(-35px);
        }

        .bx-hide{
            font-size: 30px;
            cursor: pointer;
            transform: translateY(-35px);
        }
    </style>

    <title>ISIL GAMER</title>
</head>
<body>
    <!-- header.php -->

    <?php include 'header.php'; ?>


    <!-- formulario login -->

    <div class="container text-center mt-4 mb-4">
        <h2>Login</h2>
        <p>Ingresa tus datos para ingresar al sistema</p>
    </div>
    <div class="container">

        <form class="form" action="process.php" method="post">
            <div class="form-group">
                <label class="form-label">Usuario: </label>
                <input class="form-control" id="user" name="user" type="text" maxlength="8" required >
            </div>

            <div class="form-group">
                <label class="form-label">Contraseña: </label>
                <input class="form-control" id="pass" name="pass" type="password" required >
                <i style="display: flex; justify-content: flex-end;" class="bx bx-show-alt"></i>
            </div>

            <div class="form-group mt-2 mb-2">
                <input type="checkbox"> Recordar cuenta
            </div>

            <input class="btn btn-dark mt-2 mb-2" type="submit" value="Ingresar">

            <p class="text-center">¿Todavía no tienes una cuenta? <strong><ins><a href="registro.php">¡Registrate ahora!</a></ins></strong> </p>
        </form>
    </div>

    <!-- footer.php -->

    <?php include 'footer.php'; ?>

    <script>
        const pass = document.getElementById("pass");
        const icon = document.querySelector(".bx");

        icon.addEventListener("click", e=>{
            if(pass.type =="password"){
                pass.type="text";
                icon.classList.remove("bx-show-alt");
                icon.classList.add("bx-hide");
            } else{
                pass.type="password";
                icon.classList.add("bx-show-alt");
                icon.classList.remove("bx-hide");
            }
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>